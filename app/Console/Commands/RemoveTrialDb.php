<?php

namespace App\Console\Commands;

use App\Models\Models_be\Organization;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveTrialDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:remove-trials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove all trial organization databases after 1 week';

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
        $dayAgo = 7;
        $dayToCheck = Carbon::now()->subDays($dayAgo);
        $organizations = Organization::withoutTrashed()->whereIn('db_name', $dbs,)->where(['status' => 0])->whereDate("created_at", '<=', $dayToCheck)->get();
        foreach ($organizations as $organization) {
            deleteConnection($organization->db_name);
            $organization->delete();
            DB::statement("DROP DATABASE IF EXISTS `$organization->db_name`");
        }

        echo 'All trial databases wiped successfully!';
    }
}
