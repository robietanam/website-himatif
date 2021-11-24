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
        $divisions = [];
        $divisions[] = [
            'name' => 'Badan Pengurus Harian',
            'name_slug' => 'BPH',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => null,
        ];
        // PSDM
        $divisions[] = [
            'name' => 'Pengembangan Sumber Daya Mahasiswa',
            'name_slug' => 'PSDM',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => null,
        ];
        // Litbang
        $divisions[] = [
            'name' => 'Penelitian dan Pengembangan',
            'name_slug' => 'Litbang',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => null,
        ];
        // Humas
        $divisions[] = [
            'name' => 'Hubungan Masyarakat',
            'name_slug' => 'Humas',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => null,
        ];
        $divisions[] = [
            'name' => 'Hubungan Luar',
            'name_slug' => 'Hublu',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => 4,
        ];
        $divisions[] = [
            'name' => 'Media Sosial',
            'name_slug' => 'Medsos',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => 4,
        ];
        // Mediatek
        $divisions[] = [
            'name' => 'Media Teknologi',
            'name_slug' => 'Mediatek',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => null,
        ];
        $divisions[] = [
            'name' => 'Media Informasi',
            'name_slug' => 'Medfo',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => 7,
        ];
        $divisions[] = [
            'name' => 'Pengembangan Teknologi',
            'name_slug' => 'Pemtek',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'parent_id' => 7,
        ];
        DB::table('divisions')->insert($divisions);
        $this->command->info("Data Dummy Divisions berhasil diinsert");
    }
}


// // PSDM
// $divisions[] = [
//     'name' => 'Pengembangan Sumber Daya Mahasiswa',
//     'name_slug' => 'PSDM',
//     'name_position' => 'Ketua Divisi',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Pengembangan Sumber Daya Mahasiswa',
//     'name_slug' => 'PSDM',
//     'name_position' => 'Anggota',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// // Litbang
// $divisions[] = [
//     'name' => 'Penelitian dan Pengembangan',
//     'name_slug' => 'Litbang',
//     'name_position' => 'Ketua Divisi',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Penelitian dan Pengembangan',
//     'name_slug' => 'Litbang',
//     'name_position' => 'Anggota',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// // Humas
// $divisions[] = [
//     'name' => 'Hubungan Masyarakat',
//     'name_slug' => 'Humas',
//     'name_position' => 'Ketua Divisi',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Hubungan Luar',
//     'name_slug' => 'Hublu',
//     'name_position' => 'Ketua Sub Divisi',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Hubungan Luar',
//     'name_slug' => 'Hublu',
//     'name_position' => 'Anggota',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Media Sosial',
//     'name_slug' => 'Medsos',
//     'name_position' => 'Ketua Sub Divisi',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
// $divisions[] = [
//     'name' => 'Media Sosial',
//     'name_slug' => 'Medsos',
//     'name_position' => 'Anggota',
//     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
//     'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
//     'updated_at' => null
// ];
