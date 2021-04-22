<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $divisions = [];
        $divisions[] = [
            'name' => 'Ketua - Badan Pengurus Harian',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Ketua Subdivisi - Media Teknologi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('divisions')->insert($divisions);
        $this->command->info("Data Dummy Roles berhasil diinsert");
    }
}
