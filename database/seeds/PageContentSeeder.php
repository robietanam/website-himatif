<?php

use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page_contents = [];

        // header-homepage
        $page_contents[] = [
            'name' => 'Konten Header',
            'slug' => 'header-homepage',
            'photo_example' => 'photo/page-contents/content_header.jpg',
            'data' => json_encode([
                // string is input
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul Header',
                    'content' => 'HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI'
                ],
                // text is textarea
                '2-text2' => [
                    'type' => 'text',
                    'name' => 'Deskripsi Header',
                    'content' => 'HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah salah satu organisasi mahasiswa di Fakultas Ilmu Komputer, Universitas Jember yang memiliki tujuan pokok meningkatkan kualitas Sumber Daya Mahasiswa Teknologi Informasi.'
                ],
                // image is file
                '3-photo' => [
                    'type' => 'image',
                    'name' => 'Image',
                    'content' => 'photo/sections/header-homepage.png'
                ],
                '4-marquee_tag' => [
                    'type' => 'string',
                    'name' => 'Marquee Info',
                    'content' => 'info'
                ],
                // mediumtext is summernote
                '5-marquee_info' => [
                    'type' => 'mediumtext',
                    'name' => 'Marquee Konten',
                    'content' => '<p>Open Recruitment Pengurus Baru HIMATIF Periode 2021/2022. <a href="https://bit.ly/OprecHMTF" target="_blank"><b>Join now!</b></a></p>'
                ],
            ]),
        ];

        // header about
        $page_contents[] = [
            'name' => 'Konten Header Tentang',
            'slug' => 'header-about',
            'photo_example' => 'photo/page-contents/content_header_about.jpg',
            'data' => json_encode([
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul Header',
                    'content' => 'TENTANG HIMATIF'
                ],
                '2-text2' => [
                    'type' => 'text',
                    'name' => 'Deskripsi Header',
                    'content' => 'HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas Ilmu Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi Informasi pada tanggal 6 Agustus 2017.'
                ],
            ]),
        ];

        // header pengurus
        $page_contents[] = [
            'name' => 'Konten Header Divisi & Pengurus',
            'slug' => 'header-pengurus',
            'photo_example' => 'photo/page-contents/content_header_pengurus.jpg',
            'data' => json_encode([
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul Header',
                    'content' => 'DIVISI DAN PENGURUS'
                ],
                '2-text2' => [
                    'type' => 'text',
                    'name' => 'Deskripsi Header',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat elementum consequat magna eu volutpat orci. Lacus bibendum vivamus nulla aliquet sed imperdiet id viverra. Lobortis aliquet est integer nibh ut elementumusto, in.'
                ],
            ]),
        ];

        // header proker
        $page_contents[] = [
            'name' => 'Konten Header Proker',
            'slug' => 'header-proker',
            'photo_example' => 'photo/page-contents/content_header_proker.jpg',
            'data' => json_encode([
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul Header',
                    'content' => 'PROKER HIMATIF'
                ],
                '2-text2' => [
                    'type' => 'text',
                    'name' => 'Deskripsi Header',
                    'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta quia non libero accusantium odio aspernatur. Consequuntur ipsa voluptatibus rerum hic ab aliquam inventore, pariatur doloribus. Saepe odit cumque quia facilis.'
                ],
            ]),
        ];

        // section-2-homepage
        $page_contents[] = [
            'name' => 'Konten Section 2',
            'slug' => 'section2-homepage',
            'photo_example' => 'photo/page-contents/content_section2.jpg',
            'data' => json_encode([
                'text' => [
                    'type' => 'string',
                    'name' => 'Judul',
                    'content' => 'APA YANG KAMI LAKUKAN'
                ],
                'text2' => [
                    'type' => 'string',
                    'name' => 'Sub Judul',
                    'content' => 'Kami Berfokus pada pengembangan kualitas Sumber Daya Mahasiswa Teknologi Informasi'
                ],
                'card1_text' => [
                    'type' => 'string',
                    'name' => 'Card 1 Judul',
                    'content' => 'Menyusun Proker'
                ],
                'card1_text2' => [
                    'type' => 'text',
                    'name' => 'Card 1 Teks',
                    'content' => 'Program kerja dibuat dan dikelola oleh masing-masing divisi di HIMATIF sesuai ruang lingkup masing masing'
                ],
                'card2_text' => [
                    'type' => 'string',
                    'name' => 'Card 2 Judul',
                    'content' => 'Melaksanakan Proker'
                ],
                'card2_text2' => [
                    'type' => 'text',
                    'name' => 'Card 2 Teks',
                    'content' => 'Program kerja yang telah dirancang, dilaksanakan dan diikuti oleh seluruh elemen di HIMATIF'
                ],
                'card3_text' => [
                    'type' => 'string',
                    'name' => 'Card 3 Judul',
                    'content' => 'Meningkatkan Kualitas Sumber Daya Mahasiswa'
                ],
                'card3_text2' => [
                    'type' => 'text',
                    'name' => 'Card 3 Teks',
                    'content' => 'Output yang diharapkan pada setiap proker yaitu meningkatnya kualitas Sumber Daya Mahasiswa HIMATIF'
                ],
            ]),
        ];

        // section-3-homepage
        $page_contents[] = [
            'name' => 'Konten Section 3',
            'slug' => 'section3-homepage',
            'photo_example' => 'photo/page-contents/content_section3.jpg',
            'data' => json_encode([
                'image1' => [
                    'type' => 'image',
                    'name' => 'Image 1',
                    'content' => 'photo/sections/about-1.png'
                ],
                'image2' => [
                    'type' => 'image',
                    'name' => 'Image 2',
                    'content' => 'photo/sections/about-2.png'
                ],
                'image3' => [
                    'type' => 'image',
                    'name' => 'Image 3',
                    'content' => 'photo/sections/about-3.png'
                ],
            ]),
        ];

        // vision-mission
        $page_contents[] = [
            'name' => 'Konten Visi Misi',
            'slug' => 'section-vision-mission',
            'photo_example' => 'photo/page-contents/content_vision_mission.jpg',
            'data' => json_encode([
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul',
                    'content' => 'VISI DAN MISI'
                ],
                '2-text2' => [
                    'type' => 'string',
                    'name' => 'Sub Judul',
                    'content' => 'Visi dan Misi Himpunan Mahasiswa Teknologi Informasi'
                ],
                '3-vision_photo' => [
                    'type' => 'image',
                    'name' => 'Gambar Visi',
                    'content' => 'photo/sections/vision.png'
                ],
                '3-vision_text' => [
                    'type' => 'string',
                    'name' => 'Judul Visi',
                    'content' => 'VISI'
                ],
                '3-vision_text2' => [
                    'type' => 'mediumtext',
                    'name' => 'Teks Visi',
                    'content' => 'Unggul dalam pengembangan ilmu pengetahuan dan teknologi bidang teknologi informasi untuk menunjang pertanian industrial pada tahun 2035'
                ],
                '4-mission_photo' => [
                    'type' => 'image',
                    'name' => 'Gambar Misi',
                    'content' => 'photo/sections/mission.png'
                ],
                '4-mission_text' => [
                    'type' => 'string',
                    'name' => 'Judul Misi',
                    'content' => 'MISI'
                ],
                '4-mission_text2' => [
                    'type' => 'mediumtext',
                    'name' => 'Teks Misi',
                    'content' => '<p><span style=\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\">1. Menyelenggarakan pendidikan program sarjana bidang teknologi informasi secara profesional</span><br><span style=\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\">2. Menyiapkan sumber daya manusia yang berkualitas dalam penguasaan kompetensi materi teknologi informasi terutama pada pengembangan pertanian industrial</span><br><span style=\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\">3. Mengembangkan ilmu pengetahuan dan teknologi informasi bagi kepentingan kemanusiaan</span><br><span style=\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\">4. Memberdayakan masyarakat melalui penerapan teknologi informasi dan komunikasi</span><br><span style=\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\">5. Mengembangkan jaringan kerjasama dengan pemangku kepentingan (Stakeholders) dalam bidang teknologi informasi</span></p>'
                ],
            ]),
        ];

        // gallery
        $page_contents[] = [
            'name' => 'Konten Gallery Homepage',
            'slug' => 'section-gallery-homepage',
            'photo_example' => 'photo/page-contents/content_gallery_homepage.jpg',
            'data' => json_encode([
                '1-image1' => [
                    'type' => 'image',
                    'name' => 'Galeri 1',
                    'content' => 'photo/sections/gallery-1.jpg'
                ],
                '2-image2' => [
                    'type' => 'image',
                    'name' => 'Galeri 2',
                    'content' => 'photo/sections/gallery-2.jpg'
                ],
                '3-image3' => [
                    'type' => 'image',
                    'name' => 'Galeri 3',
                    'content' => 'photo/sections/gallery-3.jpg'
                ],
                '4-image4' => [
                    'type' => 'image',
                    'name' => 'Galeri 4',
                    'content' => 'photo/sections/gallery-4.jpg'
                ],
                '5-image5' => [
                    'type' => 'image',
                    'name' => 'Galeri 5',
                    'content' => 'photo/sections/gallery-5.jpg'
                ],
            ]),
        ];

        // slogan
        $page_contents[] = [
            'name' => 'Konten Slogan Himatif',
            'slug' => 'section-slogan',
            'photo_example' => 'photo/page-contents/content_slogan.jpg',
            'data' => json_encode([
                '1-text' => [
                    'type' => 'string',
                    'name' => 'Judul',
                    'content' => 'Slogan HIMATIF'
                ],
                '2-text2' => [
                    'type' => 'string',
                    'name' => 'Sub Judul',
                    'content' => 'Slogan Himpunan Mahasiswa Teknologi Informasi'
                ],
                '3-slogan' => [
                    'type' => 'string',
                    'name' => 'Slogan Himatif',
                    'content' => '“ MUDA, TIDAK MENYERAH! ”'
                ],
            ]),
        ];

        DB::table('page_contents')->insert($page_contents);
        $this->command->info("Data Dummy Pages berhasil diinsert");
    }
}
