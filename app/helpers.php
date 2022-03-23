<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
dd($path);
    if (file_exists($path)) {
       $db_config=file_get_contents($path);
        $line_start=strpos($db_config,'//start//');
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
function array_in_string($str, array $arr): bool
{
    foreach($arr as $arr_value) { //start looping the array
        if (stripos($str,$arr_value) !== false) return true; //if $arr_value is found in $str return true
    }
    return false; //else return false
}
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}
function checkIfMobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];

    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    {
        return true;
    }
        return false;

}
function deleteConnection($name){
    $path = base_path('config/database.php');

    if (file_exists($path)) {
        $db_config=file_get_contents($path);
        $str_connection='\''.$name.'\' => [
            \'driver\'=>\'mysql\',
            \'url\'=>env(\'DATABASE_URL\'),
            \'host\'=>env(\'DB_HOST_DEFAULT\', \'127.0.0.1\'),
            \'port\'=>env(\'DB_PORT_DEFAULT\', \'3306\'),
            \'database\'=>\''.$name.'\',
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
        $db_config=str_replace($str_connection,'',$db_config);
        file_put_contents($path,$db_config);
    }

}
