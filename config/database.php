<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'default' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port' => env('DB_PORT_DEFAULT', '3306'),
            'database' => env('DB_DATABASE_DEFAULT', 'forge'),
            'username' => env('DB_USERNAME_DEFAULT', 'forge'),
            'password' => env('DB_PASSWORD_DEFAULT', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
//====================organizations connections================
'YuriPrice' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'YuriPrice',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'AlanaGuerra' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'AlanaGuerra',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'UriahBlair' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'UriahBlair',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'GermaineWalker' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'GermaineWalker',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'CherokeeOrtega' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'CherokeeOrtega',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'GiselaCarlson' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'GiselaCarlson',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'NasimYoung' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'NasimYoung',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'RubySkinner' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'RubySkinner',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'JaimeFerguson' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'JaimeFerguson',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'KeikoCain' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'KeikoCain',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'PhoebeBennett' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'PhoebeBennett',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'sieu_thi_den' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'sieu_thi_den',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'sieu_thi_tim' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'sieu_thi_tim',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'sieu_thi_trang' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'sieu_thi_trang',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'sieu_thi_do' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'sieu_thi_do',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
        'sieu_thi_xanh' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'sieu_thi_xanh',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'bep_me_na' => [
            'driver'=>'mysql',
            'url'=>env('DATABASE_URL'),
            'host'=>env('DB_HOST_DEFAULT', '127.0.0.1'),
            'port'=>env('DB_PORT_DEFAULT', '3306'),
            'database'=>'bep_me_na',
            'username'=>env('DB_USERNAME_DEFAULT', 'forge'),
            'password'=>env('DB_PASSWORD_DEFAULT', 'forge'),
            'unix_socket'=>env('DB_SOCKET', ''),
            'charset'=>'utf8mb4',
            'collation'=>'utf8mb4_unicode_ci',
            'prefix'=>'',
            'prefix_indexes'=> true,
            'strict'=> true,
            'engine'=> null,
            'options'=> extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

//====================end======================================
        'backend' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST_BACKEND', '127.0.0.1'),
            'port' => env('DB_PORT_BACKEND', '3306'),
            'database' => env('DB_DATABASE_BACKEND', 'forge'),
            'username' => env('DB_USERNAME_BACKEND', 'forge'),
            'password' => env('DB_PASSWORD_BACKEND', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
