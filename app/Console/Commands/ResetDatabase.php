<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetDatabase extends Command
{
    protected $signature = 'db:reset-full';
    protected $description = 'Completely reset the database by dropping all tables';

    public function handle()
    {
        if (!$this->confirm('Are you sure you want to drop all tables? This will destroy all data.')) {
            return;
        }

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Get all tables
        $tables = DB::select('SHOW TABLES');
        
        foreach ($tables as $table) {
            $tableName = $table->{'Tables_in_' . env('DB_DATABASE')};
            if ($tableName !== 'migrations') {
                $this->info("Dropping table: $tableName");
                Schema::dropIfExists($tableName);
            }
        }

        // Truncate migrations table
        DB::table('migrations')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('Database reset successfully. Now run: php artisan migrate');
    }
}