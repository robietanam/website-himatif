<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $users = [];
        $users[] = [
            'name' => 'Rahmad Firmansyah',
            'email' => 'fsyah7052@gmail.com',
            'password' =>  bcrypt('123123'),
            'phone' => '085748572354',
            'photo' => 'photo/profile/default-admin.png',
            'status' => '1',
            'year_entry' => 2018,
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'role_id' => '1',
            'division_id' => '1',
        ];
        DB::table('users')->insert($users);
        $this->command->info("Data Dummy Users berhasil diinsert");
    }
}
