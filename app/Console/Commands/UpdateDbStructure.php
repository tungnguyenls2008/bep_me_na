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
        $dbs = getOrganizationDbs();
        foreach ($dbs as $key => $db) {
            $dbs[$key] = $db->Database;
        }
        $tables = DB::select("SHOW TABLES FROM core_db");
        $tables_names = [];
        $column_key = 'group_concat(COLUMN_NAME)';
        foreach ($tables as $table) {
            $tables_names[] = $table->Tables_in_core_db;
        }
        foreach ($dbs as $key => $db) {
            $db_tables=DB::select("SHOW TABLES FROM $db");
            $db_obj_key='Tables_in_'.$db;
            $db_tables_names=[];
            foreach ($db_tables as $db_table){
                $db_tables_names[]=$db_table->$db_obj_key;
            }
            $table_diffs=array_values(array_diff($tables_names, $db_tables_names));
            foreach ($table_diffs as $table_diff){
                DB::statement('CREATE TABLE ' . $db . '.' . $table_diff . ' LIKE core_db.' . $table_diff);
                DB::statement('INSERT INTO ' . $db . '.' . $table_diff . ' SELECT * FROM core_db.' . $table_diff);
            }
            foreach ($tables_names as $tables_name) {

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
                    foreach ($column_diffs as $column_diff){
                        $column_to_add=DB::select('SHOW COLUMNS FROM core_db.'.$tables_name.' LIKE \''.$column_diff.'\';');
                        if ($column_to_add[0]->Null=='NO'){
                            $null= 'NOT NULL';
                        }else{
                            $null='NULL';
                        }
                        if ($column_to_add[0]->Default==''){
                            $default= '';
                        }else{
                            $default='DEFAULT(\''.$column_to_add[0]->Default.'\')';
                        }
                        DB::statement('ALTER TABLE '.$db.'.'.$tables_name.' ADD '.$column_diff.' '.$column_to_add[0]->Type.' '.$null.' '.$default);
                    }
                }
            }
        }
        echo 'All databases updated successfully!';
    }
}
