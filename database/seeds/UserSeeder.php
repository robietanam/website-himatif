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
        //$users = [];
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
            'position' => GlobalConstant::DIVISION_POSITION_NAME['bendahara'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '1',
        ];
        $users[] = [
            'name' => 'Edo Tri Wicaksono',
            'nim' => '182410102047',
            'email' => 'edo@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-divisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Arinda Vika Nur Hanifah',
            'nim' => '182410102005',
            'email' => 'arinda@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Alife Zinedine Riza',
            'nim' => '192410102013',
            'email' => 'zinedine@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Mahesa Riski Pratama',
            'nim' => '192410102054',
            'email' => 'mahesa@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Roberto Carlos Harie O',
            'nim' => '202410102007',
            'email' => 'roberto@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Laila Nur Fardah',
            'nim' => '202410102018',
            'email' => 'fardah@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Laida Lavenia. H',
            'nim' => '202410102041',
            'email' => 'lavenia@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Luthfi Aulia Akbar',
            'nim' => '202410102085',
            'email' => 'luthfi@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '2',
        ];
        $users[] = [
            'name' => 'Saifur Rifqi Ali',
            'nim' => '182410102033 ',
            'email' => 'ali@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-divisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Dios Nur Firdaus',
            'nim' => '182410102065',
            'email' => 'dios@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Sofyatul Masykuroh',
            'nim' => '192410102001',
            'email' => 'sofyatul@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Fahrian Ramaditiya',
            'nim' => '192410102011',
            'email' => 'fahrian@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Ahmad Zidni Zainul I',
            'nim' => '192410102044',
            'email' => 'zidni@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Wahyu Agus Indrawati',
            'nim' => '202410102064',
            'email' => 'wahyua@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Viqi Rafif Setya Putra',
            'nim' => '202410102069',
            'email' => 'viqi@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Hafizhah Wihdatul U',
            'nim' => '202410102095',
            'email' => 'hafizhah@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '3',
        ];
        $users[] = [
            'name' => 'Muhammad Arya R',
            'nim' => '182410102035',
            'email' => 'arya@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-divisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '4',
        ];
        $users[] = [
            'name' => 'Dinda Dikrima Adi',
            'nim' => '182410102009',
            'email' => 'dinda@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-subdivisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '5',
        ];
        $users[] = [
            'name' => 'I’zaz Dhiya ‘Ulhaq',
            'nim' => '192410102033',
            'email' => 'izaz@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '5',
        ];
        $users[] = [
            'name' => 'Dhia Hayyu Syahirah',
            'nim' => '192410102008',
            'email' => 'dhiahayyu@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '5',
        ];
        $users[] = [
            'name' => 'Nurun Nazmi Qomariah',
            'nim' => '202410102031',
            'email' => 'nurun@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '5',
        ];
        $users[] = [
            'name' => 'Widya Setya Ningrum',
            'nim' => '192410102003',
            'email' => 'widya@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-subdivisi'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '6',
        ];
        $users[] = [
            'name' => 'Alfi Nuriya Hizriatin',
            'nim' => '192410102004',
            'email' => 'alfi@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '6',
        ];
        $users[] = [
            'name' => 'Dini Aulia Hidayati',
            'nim' => '202410102072',
            'email' => 'dini@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '6',
        ];
        $users[] = [
            'name' => 'Muhammad Fathony R',
            'nim' => '182410102019',
            'email' => 'fathony@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-divisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '7',
        ];
        $users[] = [
            'name' => 'Arif Nurul Rahman H',
            'nim' => '182410102015',
            'email' => 'arif@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-subdivisi'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '8',
        ];
        $users[] = [
            'name' => 'Firratus Saadah',
            'nim' => '182410102004',
            'email' => 'firratus@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2018,
            'role_id' => '2',
            'division_id' => '8',
        ];
        $users[] = [
            'name' => 'Achmad Nur Hidayat',
            'nim' => '192410102063',
            'email' => 'hidayat@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2019,
            'role_id' => '2',
            'division_id' => '8',
        ];
        $users[] = [
            'name' => 'Ardin Nugraha',
            'nim' => '202410102012',
            'email' => 'ardin@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '8',
        ];
        $users[] = [
            'name' => 'Fadhli Nur Himawan',
            'nim' => '202410102039',
            'email' => 'fadhli@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '2',
            'division_id' => '8',
        ];
        $users[] = [
            'name' => 'Rahmad Firmansyah',
            'nim' => '182410102024',
            'email' => 'fsyah7052@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['ketua-subdivisi'],
            'year_entry' => 2018,
            'role_id' => '1',
            'division_id' => '9',
        ];
        $users[] = [
            'name' => 'Dingga Apris Rahmat K',
            'nim' => '182410102006',
            'email' => 'dingga27@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2018,
            'role_id' => '1',
            'division_id' => '9',
        ];
        $users[] = [
            'name' => 'Alif Rachman Saputro',
            'nim' => '182410102058',
            'email' => 'alifrachman@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2018,
            'role_id' => '1',
            'division_id' => '9',
        ];
        $users[] = [
            'name' => 'Arman Maulana Saputra',
            'nim' => '202410102026',
            'email' => 'armanmaulana@gmail.com',
            'password' =>  bcrypt('123123'),
            'position' => GlobalConstant::DIVISION_POSITION_NAME['anggota'],
            'year_entry' => 2020,
            'role_id' => '1',
            'division_id' => '9',
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
