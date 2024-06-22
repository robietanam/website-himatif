<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // Replace 'users' with your actual table name
        $tableName = 'users';

        // Path to your CSV file
        $file = database_path('seeds/save.csv');

        // Read the CSV file
        $data = array_map('str_getcsv', file($file));

        // Remove headers from the CSV data
        $headers = array_shift($data);

        // Transform CSV rows into associative arrays
        $seedData = [];
        foreach ($data as $row) {
            $seedData[] = array_combine($headers, $row);
        }

        // Insert data into the table
        foreach ($seedData as $record) {
            unset($record['created_at']);
            unset($record['updated_at']);
            DB::table($tableName)->insert($record);
        }
    }
}
