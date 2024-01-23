<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportSqlController extends Controller
{
    public function importSql()
{
    try {
        // Check if the database is connected
        if (DB::connection()->getPdo() == null) {
            return view('import-sql')->with('error', 'Database is not connected. Please check your database connection settings.');
        }

        // Get the path to the SQL file in the storage directory
        $sqlFilePath = storage_path('app/1.sql');

        // Run Raw SQL
        DB::unprepared(file_get_contents($sqlFilePath));

        return view('import-sql')->with('message', 'SQL file imported successfully!');
    } catch (\Exception $e) {
        Log::error('Error importing SQL file: ' . $e->getMessage());

        return view('import-sql')->with('error', 'Error importing SQL file. Check the logs for details.');
    }
}
}
