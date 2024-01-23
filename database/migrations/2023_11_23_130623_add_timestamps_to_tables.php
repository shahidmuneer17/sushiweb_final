<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Get the list of all tables in the database
        $tables = \DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            // Check if the table already has the timestamps columns
            if (!Schema::hasColumn($tableName, 'created_at')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->timestamps();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // To rollback, you can remove timestamps from all tables
        // This is a simplified example, adjust it as needed
        $tables = \DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            Schema::table($tableName, function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
    }
};
