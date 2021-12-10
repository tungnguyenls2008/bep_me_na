<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

function idGenerator($prefix,$num): string
{
    return $prefix.'-'.str_pad($num,6,'0',STR_PAD_LEFT);
}
function uniqidReal($lenght = 13) {
    // uniqid gives 13 chars, but you could adjust it to your needs.
    if (function_exists("random_bytes")) {
        $bytes = random_bytes(ceil($lenght / 2));
    } elseif (function_exists("openssl_random_pseudo_bytes")) {
        $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
    } else {
        throw new Exception("no cryptographically secure random function available");
    }
    return substr(bin2hex($bytes), 0, $lenght);
}
function configureConnectionByName($connectionName)
{
    // Just get access to the config.
    $config = App::make('config');
    // Will contain the array of connections that appear in our database config file.
    $connections = $config->get('database.connections');
    // This line pulls out the default connection by key (by default it's `mysql`)
    $defaultConnection = $connections['default'];
    // Now we simply copy the default connection information to our new connection.
    $newConnection = $defaultConnection;

    // Override the database name.
    $newConnection['database'] = $connectionName;
    $path = base_path('config/database.php');

    if (file_exists($path)) {
       $db_config=file_get_contents($path);
        $line_start=3192+63+20;
        $rest_config=substr($db_config,$line_start,strlen($db_config));
        $newConnection_str= '\''.$connectionName.'\' => [
            \'driver\'=>\'mysql\',
            \'url\'=>env(\'DATABASE_URL\'),
            \'host\'=>env(\'DB_HOST_DEFAULT\', \'127.0.0.1\'),
            \'port\'=>env(\'DB_PORT_DEFAULT\', \'3306\'),
            \'database\'=>\''.$connectionName.'\',
            \'username\'=>env(\'DB_USERNAME_DEFAULT\', \'forge\'),
            \'password\'=>env(\'DB_PASSWORD_DEFAULT\', \'forge\'),
            \'unix_socket\'=>env(\'DB_SOCKET\', \'\'),
            \'charset\'=>\'utf8mb4\',
            \'collation\'=>\'utf8mb4_unicode_ci\',
            \'prefix\'=>\'\',
            \'prefix_indexes\'=> true,
            \'strict\'=> true,
            \'engine\'=> null,
            \'options\'=> extension_loaded(\'pdo_mysql\') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env(\'MYSQL_ATTR_SSL_CA\'),
            ]) : [],
        ],
        ';
        $db_config_new=substr_replace($db_config,$newConnection_str,$line_start).$rest_config;
        file_put_contents($path,$db_config_new);
    }
    // This will add our new connection to the run-time configuration for the duration of the request.
    Config::set('database.connections.'.$connectionName,$newConnection);
    //App::make('config')->set('database.connections.'.$connectionName, $newConnection);

}
function cloneCoreDb($db_name){
    configureConnectionByName($db_name);
    DB::statement('CREATE DATABASE IF NOT EXISTS ' . $db_name . ' CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;');
    //DB::statement('USE '.$input['db_name']);
    $tables = DB::select("SHOW TABLES FROM core_db");
    $tables_names = [];
    foreach ($tables as $table) {
        $tables_names[] = $table->Tables_in_core_db;
    }
    foreach ($tables_names as $tables_name) {
        DB::statement('CREATE TABLE ' . $db_name . '.' . $tables_name . ' LIKE core_db.' . $tables_name);
        DB::statement('INSERT INTO ' . $db_name . '.' . $tables_name . ' SELECT * FROM core_db.' . $tables_name);

    }
}
