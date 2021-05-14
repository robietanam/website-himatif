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
            'name' => 'Badan Pengurus Harian',
            'name_slug' => 'BPH',
            'name_position' => 'Ketua Umum',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Badan Pengurus Harian',
            'name_slug' => 'BPH',
            'name_position' => 'Sekretaris',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Badan Pengurus Harian',
            'name_slug' => 'BPH',
            'name_position' => 'Bendahara',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        // PSDM
        $divisions[] = [
            'name' => 'Pengembangan Sumber Daya Mahasiswa',
            'name_slug' => 'PSDM',
            'name_position' => 'Ketua Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Pengembangan Sumber Daya Mahasiswa',
            'name_slug' => 'PSDM',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        // Litbang
        $divisions[] = [
            'name' => 'Penelitian dan Pengembangan',
            'name_slug' => 'Litbang',
            'name_position' => 'Ketua Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Penelitian dan Pengembangan',
            'name_slug' => 'Litbang',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        // Humas
        $divisions[] = [
            'name' => 'Hubungan Masyarakat',
            'name_slug' => 'Humas',
            'name_position' => 'Ketua Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Hubungan Luar',
            'name_slug' => 'Hublu',
            'name_position' => 'Ketua Sub Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Hubungan Luar',
            'name_slug' => 'Hublu',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Media Sosial',
            'name_slug' => 'Medsos',
            'name_position' => 'Ketua Sub Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Media Sosial',
            'name_slug' => 'Medsos',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        // Mediatek
        $divisions[] = [
            'name' => 'Media Teknologi',
            'name_slug' => 'Mediatek',
            'name_position' => 'Ketua Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Media Informasi',
            'name_slug' => 'Medfo',
            'name_position' => 'Ketua Sub Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Media Informasi',
            'name_slug' => 'Medfo',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Pengembangan Teknologi',
            'name_slug' => 'Pemtek',
            'name_position' => 'Ketua Sub Divisi',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        $divisions[] = [
            'name' => 'Pengembangan Teknologi',
            'name_slug' => 'Pemtek',
            'name_position' => 'Anggota',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!',
            'created_at' => new DateTime(null, new DateTimeZone('Asia/Bangkok')),
            'updated_at' => null
        ];
        DB::table('divisions')->insert($divisions);
        $this->command->info("Data Dummy Roles berhasil diinsert");
    }
}
