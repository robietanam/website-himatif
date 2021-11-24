<?php

use App\Constant\GlobalConstant;
use Illuminate\Database\Seeder;

class ProkerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proker_users[] = [
            'name' => 'Aditya Ari Fikri',
            'nim' => '182410102002',
            'phone' => '081231512512',
            'created_at' => now(),
            'proker_id' => '1',
            'proker_division_id' => '1',
        ];
        $proker_users[] = [
            'name' => 'Alif Rachman',
            'nim' => '182410102099',
            'phone' => '081231512512',
            'created_at' => now(),
            'proker_id' => '1',
            'proker_division_id' => '4',
        ];
        DB::table('proker_users')->insert($proker_users);
        $this->command->info("Data Dummy Proker Users berhasil diinsert");
    }
}
