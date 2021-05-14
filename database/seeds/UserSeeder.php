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
            'nim' => '182410102024',
            'email' => 'fsyah7052@gmail.com',
            'password' =>  bcrypt('123123'),
            'phone' => '085748572354',
            'photo' => null,
            'status' => '1',
            'year_entry' => 2018,
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'role_id' => '1',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Dhimas Adrian',
            'nim' => '172410102034',
            'email' => 'dimas@gmail.com',
            'password' =>  bcrypt('123123'),
            'phone' => '08123456709',
            'photo' => null,
            'status' => '0',
            'year_entry' => 2017,
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null,
            'role_id' => '4',
            'division_id' => '2',
        ];
        DB::table('users')->insert($users);
        $this->command->info("Data Dummy Users berhasil diinsert");
    }
}
