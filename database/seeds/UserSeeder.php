<?php

use App\Constant\GlobalConstant;
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
        $users = [];
        $users[] = [
            'name' => 'Aditya Ari Fikri',
            'nim' => '182410102002',
            'email' => 'adit@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '1',
        ];
        $users[] = [
            'name' => 'Aulia Nurul Ilma',
            'nim' => '182410102020',
            'email' => 'aulia@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['sekretaris'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '1',
        ];
        $users[] = [
            'name' => 'Linda Fitri Dwi W',
            'nim' => '182410102040',
            'email' => 'linda@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['sekretaris'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '1',
        ];
        $users[] = [
            'name' => 'Rahmad Firmansyah',
            'nim' => '182410102024',
            'email' => 'fsyah7052@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-subdivisi'],
            'year_entry' => 2018,
            'role_id' => '1',
            'division_id' => '2',
        ];
        // $users[] = [
        //     'name' => 'Dhimas Adrian',
        //     'nim' => '172410102034',
        //     'email' => 'dimas@gmail.com',
        //     'password' =>  bcrypt('123123'),
        //     'phone' => '08123456709',
        //     'photo' => null,
        //     'status' => '0',
        //     'year_entry' => 2017,
        //     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
        //     'updated_at' => null,
        //     'role_id' => '4',
        //     'division_id' => '2',
        // ];
        DB::table('users')->insert($users);
        $this->command->info("Data Dummy Users berhasil diinsert");
    }
}
