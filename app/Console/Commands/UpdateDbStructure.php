<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateDbStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all organization databases to the latest core_db';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dbs = DB::select("SHOW DATABASES");
        $exceptions = ['backend', 'core_db', 'information_schema', 'mysql', 'performance_schema', 'phpmyadmin', 'test'];
        foreach ($dbs as $key => $db) {
            if (in_array($db->Database, $exceptions)) {
                unset($dbs[$key]);
            }

        }
        foreach ($dbs as $key => $db) {
            $dbs[$key] = $db->Database;
        }
        foreach ($dbs as $key => $db) {
            DB::statement('CREATE DATABASE IF NOT EXISTS ' . $db . '_backup CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;');
            //DB::statement('USE '.$input['db_name']);
            $tables = DB::select("SHOW TABLES FROM $db");
            $tables_names = [];
            foreach ($tables as $table) {
                $obj_key = 'Tables_in_' . $db;
                $tables_names[] = $table->$obj_key;
            }
            foreach ($tables_names as $tables_name) {
                $column_key = 'group_concat(COLUMN_NAME)';
                $core_columns = DB::select("SELECT group_concat(COLUMN_NAME)
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE TABLE_SCHEMA = 'core_db' AND TABLE_NAME = '$tables_name';");
                $core_columns = explode(',', $core_columns[0]->$column_key);

                $db_columns = DB::select("SELECT group_concat(COLUMN_NAME)
  FROM INFORMATION_SCHEMA.COLUMNS
  WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$tables_name';");
                $db_columns = explode(',', $db_columns[0]->$column_key);
                $column_diffs = array_values(array_diff($core_columns, $db_columns));
                if (!empty($column_diffs)) {
                    dd($column_diffs);

                }
                DB::statement('CREATE TABLE ' . $db . '_backup.' . $tables_name . ' LIKE ' . $db . '.' . $tables_name);
                DB::statement('INSERT INTO ' . $db . '_backup.' . $tables_name . ' SELECT * FROM ' . $db . '.' . $tables_name);
                DB::statement('DROP TABLE IF EXISTS ' . $db . '.' . $tables_name);
                DB::statement('CREATE TABLE ' . $db . '.' . $tables_name . ' LIKE core_db.' . $tables_name);

                DB::statement('INSERT INTO ' . $db . '.' . $tables_name . ' SELECT * FROM ' . $db . '_backup.' . $tables_name);
            }
            DB::statement('DROP DATABASE IF EXISTS ' . $db . '_backup');

        }
    }
}
