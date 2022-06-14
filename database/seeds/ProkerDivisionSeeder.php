<?php

use Illuminate\Database\Seeder;

class ProkerDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proker_divisions = [];
        $proker_divisions[] = [
            'name' => 'Ketua',
            'name_slug' => 'ketua',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'Sekretaris',
            'name_slug' => 'sekretaris',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'Bendahara',
            'name_slug' => 'bendahara',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'CO. Acara',
            'name_slug' => 'co-acara',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'SIE. Acara',
            'name_slug' => 'sie-acara',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'CO. Humas',
            'name_slug' => 'co-humas',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'SIE. Humas',
            'name_slug' => 'sie-humas',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'CO. Publikasi dan Dokumentasi',
            'name_slug' => 'co-pdd',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'SIE. Publikasi dan Dokumentasi',
            'name_slug' => 'sie-pdd',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'CO. Perlengkapan',
            'name_slug' => 'co-perlengkapan',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        $proker_divisions[] = [
            'name' => 'SIE. Perlengkapan',
            'name_slug' => 'sie-perlengkapan',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => now(),
        ];
        DB::table('proker_divisions')->insert($proker_divisions);
        $this->command->info("Data Dummy Proker Divisions berhasil diinsert");
    }
}
