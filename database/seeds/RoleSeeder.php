<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $roles = [];
        $roles[] = [
            'name' => 'Pengurus Admin',
            'slug' => 'pengurus_admin',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $roles[] = [
            'name' => 'Pengurus',
            'slug' => 'pengurus',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $roles[] = [
            'name' => 'Anggota',
            'slug' => 'anggota',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $roles[] = [
            'name' => 'Demisioner',
            'slug' => 'demis',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('roles')->insert($roles);
        $this->command->info("Data Dummy Roles berhasil diinsert");
    }
}
