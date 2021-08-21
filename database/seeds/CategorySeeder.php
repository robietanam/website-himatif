<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $categories[] = [
            'name' => 'Event Tahunan',
            'slug' => 'event-tahunan',
        ];
        $categories[] = [
            'name' => 'Proker Himatif',
            'slug' => 'proker-himatif',
        ];
        $categories[] = [
            'name' => 'Kegiatan Harian',
            'slug' => 'kegiatan-harian',
        ];

        DB::table('categories')->insert($categories);
        $this->command->info("Data Dummy categories berhasil diinsert");
    }
}
