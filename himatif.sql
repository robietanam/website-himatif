-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 02:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himatif`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Event Tahunan', 'event-tahunan'),
(2, 'Proker Himatif', 'proker-himatif'),
(3, 'Kegiatan Harian', 'kegiatan-harian');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Tidak Aktif, 1 Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `name_slug`, `description`, `status`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 'Badan Pengurus Harian', 'BPH', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, NULL),
(2, 'Pengembangan Sumber Daya Mahasiswa', 'PSDM', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, NULL),
(3, 'Penelitian dan Pengembangan', 'Litbang', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, NULL),
(4, 'Hubungan Masyarakat', 'Humas', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, NULL),
(5, 'Hubungan Luar', 'Hublu', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, 4),
(6, 'Media Sosial', 'Medsos', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, 4),
(7, 'Media Teknologi', 'Mediatek', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, NULL),
(8, 'Media Informasi', 'Medfo', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, 7),
(9, 'Pengembangan Teknologi', 'Pemtek', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_22_081058_create_roles_table', 1),
(4, '2021_04_22_081100_create_divisions_table', 1),
(5, '2021_04_22_081155_create_users_table', 1),
(6, '2021_06_03_142209_create_categories_table', 1),
(7, '2021_06_03_142315_create_posts_table', 1),
(8, '2021_11_18_142327_create_page_contents_table', 1),
(9, '2021_11_22_180026_create_prokers_table', 1),
(10, '2021_11_22_180349_create_proker_divisions_table', 1),
(11, '2021_11_22_180501_create_proker_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo_example` varchar(255) NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `name`, `slug`, `photo_example`, `data`, `created_at`, `updated_at`) VALUES
(1, 'Konten Header', 'header-homepage', 'photo/page-contents/content_header.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul Header\",\"content\":\"HIMPUNAN MAHASISWA TEKNOLOGI INFORMASI\"},\"2-text2\":{\"type\":\"text\",\"name\":\"Deskripsi Header\",\"content\":\"HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah salah satu organisasi mahasiswa di Fakultas Ilmu Komputer, Universitas Jember yang memiliki tujuan pokok meningkatkan kualitas Sumber Daya Mahasiswa Teknologi Informasi.\"},\"3-photo\":{\"type\":\"image\",\"name\":\"Image\",\"content\":\"photo\\/sections\\/header-homepage.png\"},\"4-marquee_tag\":{\"type\":\"string\",\"name\":\"Marquee Info\",\"content\":\"info\"},\"5-marquee_info\":{\"type\":\"mediumtext\",\"name\":\"Marquee Konten\",\"content\":\"<p>Open Recruitment Pengurus Baru HIMATIF Periode 2021\\/2022. <a href=\\\"https:\\/\\/bit.ly\\/OprecHMTF\\\" target=\\\"_blank\\\"><b>Join now!<\\/b><\\/a><\\/p>\"}}', NULL, NULL),
(2, 'Konten Header Tentang', 'header-about', 'photo/page-contents/content_header_about.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul Header\",\"content\":\"TENTANG HIMATIF\"},\"2-text2\":{\"type\":\"text\",\"name\":\"Deskripsi Header\",\"content\":\"HIMATIF (Himpunan Mahasiswa Teknologi Informasi) adalah Salah satu Organisasi Mahasiswa di Fakultas Ilmu Komputer Universitas Jember. Terbentuknya HIMATIF dirintis oleh 7 Orang Mahasiswa Teknologi Informasi pada tanggal 6 Agustus 2017.\"}}', NULL, NULL),
(3, 'Konten Header Divisi & Pengurus', 'header-pengurus', 'photo/page-contents/content_header_pengurus.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul Header\",\"content\":\"DIVISI DAN PENGURUS\"},\"2-text2\":{\"type\":\"text\",\"name\":\"Deskripsi Header\",\"content\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat elementum consequat magna eu volutpat orci. Lacus bibendum vivamus nulla aliquet sed imperdiet id viverra. Lobortis aliquet est integer nibh ut elementumusto, in.\"}}', NULL, NULL),
(4, 'Konten Header Proker', 'header-proker', 'photo/page-contents/content_header_proker.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul Header\",\"content\":\"PROKER HIMATIF\"},\"2-text2\":{\"type\":\"text\",\"name\":\"Deskripsi Header\",\"content\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta quia non libero accusantium odio aspernatur. Consequuntur ipsa voluptatibus rerum hic ab aliquam inventore, pariatur doloribus. Saepe odit cumque quia facilis.\"}}', NULL, NULL),
(5, 'Konten Section 2', 'section2-homepage', 'photo/page-contents/content_section2.jpg', '{\"text\":{\"type\":\"string\",\"name\":\"Judul\",\"content\":\"APA YANG KAMI LAKUKAN\"},\"text2\":{\"type\":\"string\",\"name\":\"Sub Judul\",\"content\":\"Kami Berfokus pada pengembangan kualitas Sumber Daya Mahasiswa Teknologi Informasi\"},\"card1_text\":{\"type\":\"string\",\"name\":\"Card 1 Judul\",\"content\":\"Menyusun Proker\"},\"card1_text2\":{\"type\":\"text\",\"name\":\"Card 1 Teks\",\"content\":\"Program kerja dibuat dan dikelola oleh masing-masing divisi di HIMATIF sesuai ruang lingkup masing masing\"},\"card2_text\":{\"type\":\"string\",\"name\":\"Card 2 Judul\",\"content\":\"Melaksanakan Proker\"},\"card2_text2\":{\"type\":\"text\",\"name\":\"Card 2 Teks\",\"content\":\"Program kerja yang telah dirancang, dilaksanakan dan diikuti oleh seluruh elemen di HIMATIF\"},\"card3_text\":{\"type\":\"string\",\"name\":\"Card 3 Judul\",\"content\":\"Meningkatkan Kualitas Sumber Daya Mahasiswa\"},\"card3_text2\":{\"type\":\"text\",\"name\":\"Card 3 Teks\",\"content\":\"Output yang diharapkan pada setiap proker yaitu meningkatnya kualitas Sumber Daya Mahasiswa HIMATIF\"}}', NULL, NULL),
(6, 'Konten Section 3', 'section3-homepage', 'photo/page-contents/content_section3.jpg', '{\"image1\":{\"type\":\"image\",\"name\":\"Image 1\",\"content\":\"photo\\/sections\\/about-1.png\"},\"image2\":{\"type\":\"image\",\"name\":\"Image 2\",\"content\":\"photo\\/sections\\/about-2.png\"},\"image3\":{\"type\":\"image\",\"name\":\"Image 3\",\"content\":\"photo\\/sections\\/about-3.png\"}}', NULL, NULL),
(7, 'Konten Visi Misi', 'section-vision-mission', 'photo/page-contents/content_vision_mission.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul\",\"content\":\"VISI DAN MISI\"},\"2-text2\":{\"type\":\"string\",\"name\":\"Sub Judul\",\"content\":\"Visi dan Misi Himpunan Mahasiswa Teknologi Informasi\"},\"3-vision_photo\":{\"type\":\"image\",\"name\":\"Gambar Visi\",\"content\":\"photo\\/sections\\/vision.png\"},\"3-vision_text\":{\"type\":\"string\",\"name\":\"Judul Visi\",\"content\":\"VISI\"},\"3-vision_text2\":{\"type\":\"mediumtext\",\"name\":\"Teks Visi\",\"content\":\"Unggul dalam pengembangan ilmu pengetahuan dan teknologi bidang teknologi informasi untuk menunjang pertanian industrial pada tahun 2035\"},\"4-mission_photo\":{\"type\":\"image\",\"name\":\"Gambar Misi\",\"content\":\"photo\\/sections\\/mission.png\"},\"4-mission_text\":{\"type\":\"string\",\"name\":\"Judul Misi\",\"content\":\"MISI\"},\"4-mission_text2\":{\"type\":\"mediumtext\",\"name\":\"Teks Misi\",\"content\":\"<p><span style=\\\\\\\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\\\\\\\">1. Menyelenggarakan pendidikan program sarjana bidang teknologi informasi secara profesional<\\/span><br><span style=\\\\\\\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\\\\\\\">2. Menyiapkan sumber daya manusia yang berkualitas dalam penguasaan kompetensi materi teknologi informasi terutama pada pengembangan pertanian industrial<\\/span><br><span style=\\\\\\\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\\\\\\\">3. Mengembangkan ilmu pengetahuan dan teknologi informasi bagi kepentingan kemanusiaan<\\/span><br><span style=\\\\\\\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\\\\\\\">4. Memberdayakan masyarakat melalui penerapan teknologi informasi dan komunikasi<\\/span><br><span style=\\\\\\\"color:rgb(120,125,145);font-family:Nunito, sans-serif;\\\\\\\">5. Mengembangkan jaringan kerjasama dengan pemangku kepentingan (Stakeholders) dalam bidang teknologi informasi<\\/span><\\/p>\"}}', NULL, NULL),
(8, 'Konten Gallery Homepage', 'section-gallery-homepage', 'photo/page-contents/content_gallery_homepage.jpg', '{\"1-image1\":{\"type\":\"image\",\"name\":\"Galeri 1\",\"content\":\"photo\\/sections\\/gallery-1.jpg\"},\"2-image2\":{\"type\":\"image\",\"name\":\"Galeri 2\",\"content\":\"photo\\/sections\\/gallery-2.jpg\"},\"3-image3\":{\"type\":\"image\",\"name\":\"Galeri 3\",\"content\":\"photo\\/sections\\/gallery-3.jpg\"},\"4-image4\":{\"type\":\"image\",\"name\":\"Galeri 4\",\"content\":\"photo\\/sections\\/gallery-4.jpg\"},\"5-image5\":{\"type\":\"image\",\"name\":\"Galeri 5\",\"content\":\"photo\\/sections\\/gallery-5.jpg\"}}', NULL, NULL),
(9, 'Konten Slogan Himatif', 'section-slogan', 'photo/page-contents/content_slogan.jpg', '{\"1-text\":{\"type\":\"string\",\"name\":\"Judul\",\"content\":\"Slogan HIMATIF\"},\"2-text2\":{\"type\":\"string\",\"name\":\"Sub Judul\",\"content\":\"Slogan Himpunan Mahasiswa Teknologi Informasi\"},\"3-slogan\":{\"type\":\"string\",\"name\":\"Slogan Himatif\",\"content\":\"\\u201c MUDA, TIDAK MENYERAH! \\u201d\"}}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `body` mediumtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Draft, 1 Publish',
  `is_featured` enum('0','1') DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `photo`, `body`, `status`, `is_featured`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(1, 'sunt aut facere repellat provident occaecati excepturi optio reprehenderit', 'sunt-aut-facere-repellat-provident-occaecati-excepturi-optio-reprehenderit', NULL, 'quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(2, 'qui est esse', 'qui-est-esse', NULL, 'est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(3, 'ea molestias quasi exercitationem repellat qui ipsa sit aut', 'ea-molestias-quasi-exercitationem-repellat-qui-ipsa-sit-aut', NULL, 'et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(4, 'eum et est occaecati', 'eum-et-est-occaecati', NULL, 'ullam et saepe reiciendis voluptatem adipisci\nsit amet autem assumenda provident rerum culpa\nquis hic commodi nesciunt rem tenetur doloremque ipsam iure\nquis sunt voluptatem rerum illo velit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(5, 'nesciunt quas odio', 'nesciunt-quas-odio', NULL, 'repudiandae veniam quaerat sunt sed\nalias aut fugiat sit autem sed est\nvoluptatem omnis possimus esse voluptatibus quis\nest aut tenetur dolor neque', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(6, 'dolorem eum magni eos aperiam quia', 'dolorem-eum-magni-eos-aperiam-quia', NULL, 'ut aspernatur corporis harum nihil quis provident sequi\nmollitia nobis aliquid molestiae\nperspiciatis et ea nemo ab reprehenderit accusantium quas\nvoluptate dolores velit et doloremque molestiae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(7, 'magnam facilis autem', 'magnam-facilis-autem', NULL, 'dolore placeat quibusdam ea quo vitae\nmagni quis enim qui quis quo nemo aut saepe\nquidem repellat excepturi ut quia\nsunt ut sequi eos ea sed quas', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(8, 'dolorem dolore est ipsam', 'dolorem-dolore-est-ipsam', NULL, 'dignissimos aperiam dolorem qui eum\nfacilis quibusdam animi sint suscipit qui sint possimus cum\nquaerat magni maiores excepturi\nipsam ut commodi dolor voluptatum modi aut vitae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(9, 'nesciunt iure omnis dolorem tempora et accusantium', 'nesciunt-iure-omnis-dolorem-tempora-et-accusantium', NULL, 'consectetur animi nesciunt iure dolore\nenim quia ad\nveniam autem ut quam aut nobis\net est aut quod aut provident voluptas autem voluptas', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(10, 'optio molestias id quia eum', 'optio-molestias-id-quia-eum', NULL, 'quo et expedita modi cum officia vel magni\ndoloribus qui repudiandae\nvero nisi sit\nquos veniam quod sed accusamus veritatis error', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(11, 'et ea vero quia laudantium autem', 'et-ea-vero-quia-laudantium-autem', NULL, 'delectus reiciendis molestiae occaecati non minima eveniet qui voluptatibus\naccusamus in eum beatae sit\nvel qui neque voluptates ut commodi qui incidunt\nut animi commodi', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(12, 'in quibusdam tempore odit est dolorem', 'in-quibusdam-tempore-odit-est-dolorem', NULL, 'itaque id aut magnam\npraesentium quia et ea odit et ea voluptas et\nsapiente quia nihil amet occaecati quia id voluptatem\nincidunt ea est distinctio odio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(13, 'dolorum ut in voluptas mollitia et saepe quo animi', 'dolorum-ut-in-voluptas-mollitia-et-saepe-quo-animi', NULL, 'aut dicta possimus sint mollitia voluptas commodi quo doloremque\niste corrupti reiciendis voluptatem eius rerum\nsit cumque quod eligendi laborum minima\nperferendis recusandae assumenda consectetur porro architecto ipsum ipsam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(14, 'voluptatem eligendi optio', 'voluptatem-eligendi-optio', NULL, 'fuga et accusamus dolorum perferendis illo voluptas\nnon doloremque neque facere\nad qui dolorum molestiae beatae\nsed aut voluptas totam sit illum', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(15, 'eveniet quod temporibus', 'eveniet-quod-temporibus', NULL, 'reprehenderit quos placeat\nvelit minima officia dolores impedit repudiandae molestiae nam\nvoluptas recusandae quis delectus\nofficiis harum fugiat vitae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(16, 'sint suscipit perspiciatis velit dolorum rerum ipsa laboriosam odio', 'sint-suscipit-perspiciatis-velit-dolorum-rerum-ipsa-laboriosam-odio', NULL, 'suscipit nam nisi quo aperiam aut\nasperiores eos fugit maiores voluptatibus quia\nvoluptatem quis ullam qui in alias quia est\nconsequatur magni mollitia accusamus ea nisi voluptate dicta', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(17, 'fugit voluptas sed molestias voluptatem provident', 'fugit-voluptas-sed-molestias-voluptatem-provident', NULL, 'eos voluptas et aut odit natus earum\naspernatur fuga molestiae ullam\ndeserunt ratione qui eos\nqui nihil ratione nemo velit ut aut id quo', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(18, 'voluptate et itaque vero tempora molestiae', 'voluptate-et-itaque-vero-tempora-molestiae', NULL, 'eveniet quo quis\nlaborum totam consequatur non dolor\nut et est repudiandae\nest voluptatem vel debitis et magnam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(19, 'adipisci placeat illum aut reiciendis qui', 'adipisci-placeat-illum-aut-reiciendis-qui', NULL, 'illum quis cupiditate provident sit magnam\nea sed aut omnis\nveniam maiores ullam consequatur atque\nadipisci quo iste expedita sit quos voluptas', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(20, 'doloribus ad provident suscipit at', 'doloribus-ad-provident-suscipit-at', NULL, 'qui consequuntur ducimus possimus quisquam amet similique\nsuscipit porro ipsam amet\neos veritatis officiis exercitationem vel fugit aut necessitatibus totam\nomnis rerum consequatur expedita quidem cumque explicabo', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(21, 'asperiores ea ipsam voluptatibus modi minima quia sint', 'asperiores-ea-ipsam-voluptatibus-modi-minima-quia-sint', NULL, 'repellat aliquid praesentium dolorem quo\nsed totam minus non itaque\nnihil labore molestiae sunt dolor eveniet hic recusandae veniam\ntempora et tenetur expedita sunt', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(22, 'dolor sint quo a velit explicabo quia nam', 'dolor-sint-quo-a-velit-explicabo-quia-nam', NULL, 'eos qui et ipsum ipsam suscipit aut\nsed omnis non odio\nexpedita earum mollitia molestiae aut atque rem suscipit\nnam impedit esse', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(23, 'maxime id vitae nihil numquam', 'maxime-id-vitae-nihil-numquam', NULL, 'veritatis unde neque eligendi\nquae quod architecto quo neque vitae\nest illo sit tempora doloremque fugit quod\net et vel beatae sequi ullam sed tenetur perspiciatis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(24, 'autem hic labore sunt dolores incidunt', 'autem-hic-labore-sunt-dolores-incidunt', NULL, 'enim et ex nulla\nomnis voluptas quia qui\nvoluptatem consequatur numquam aliquam sunt\ntotam recusandae id dignissimos aut sed asperiores deserunt', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(25, 'rem alias distinctio quo quis', 'rem-alias-distinctio-quo-quis', NULL, 'ullam consequatur ut\nomnis quis sit vel consequuntur\nipsa eligendi ipsum molestiae et omnis error nostrum\nmolestiae illo tempore quia et distinctio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(26, 'est et quae odit qui non', 'est-et-quae-odit-qui-non', NULL, 'similique esse doloribus nihil accusamus\nomnis dolorem fuga consequuntur reprehenderit fugit recusandae temporibus\nperspiciatis cum ut laudantium\nomnis aut molestiae vel vero', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(27, 'quasi id et eos tenetur aut quo autem', 'quasi-id-et-eos-tenetur-aut-quo-autem', NULL, 'eum sed dolores ipsam sint possimus debitis occaecati\ndebitis qui qui et\nut placeat enim earum aut odit facilis\nconsequatur suscipit necessitatibus rerum sed inventore temporibus consequatur', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(28, 'delectus ullam et corporis nulla voluptas sequi', 'delectus-ullam-et-corporis-nulla-voluptas-sequi', NULL, 'non et quaerat ex quae ad maiores\nmaiores recusandae totam aut blanditiis mollitia quas illo\nut voluptatibus voluptatem\nsimilique nostrum eum', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(29, 'iusto eius quod necessitatibus culpa ea', 'iusto-eius-quod-necessitatibus-culpa-ea', NULL, 'odit magnam ut saepe sed non qui\ntempora atque nihil\naccusamus illum doloribus illo dolor\neligendi repudiandae odit magni similique sed cum maiores', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(30, 'a quo magni similique perferendis', 'a-quo-magni-similique-perferendis', NULL, 'alias dolor cumque\nimpedit blanditiis non eveniet odio maxime\nblanditiis amet eius quis tempora quia autem rem\na provident perspiciatis quia', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(31, 'ullam ut quidem id aut vel consequuntur', 'ullam-ut-quidem-id-aut-vel-consequuntur', NULL, 'debitis eius sed quibusdam non quis consectetur vitae\nimpedit ut qui consequatur sed aut in\nquidem sit nostrum et maiores adipisci atque\nquaerat voluptatem adipisci repudiandae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(32, 'doloremque illum aliquid sunt', 'doloremque-illum-aliquid-sunt', NULL, 'deserunt eos nobis asperiores et hic\nest debitis repellat molestiae optio\nnihil ratione ut eos beatae quibusdam distinctio maiores\nearum voluptates et aut adipisci ea maiores voluptas maxime', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(33, 'qui explicabo molestiae dolorem', 'qui-explicabo-molestiae-dolorem', NULL, 'rerum ut et numquam laborum odit est sit\nid qui sint in\nquasi tenetur tempore aperiam et quaerat qui in\nrerum officiis sequi cumque quod', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(34, 'magnam ut rerum iure', 'magnam-ut-rerum-iure', NULL, 'ea velit perferendis earum ut voluptatem voluptate itaque iusto\ntotam pariatur in\nnemo voluptatem voluptatem autem magni tempora minima in\nest distinctio qui assumenda accusamus dignissimos officia nesciunt nobis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(35, 'id nihil consequatur molestias animi provident', 'id-nihil-consequatur-molestias-animi-provident', NULL, 'nisi error delectus possimus ut eligendi vitae\nplaceat eos harum cupiditate facilis reprehenderit voluptatem beatae\nmodi ducimus quo illum voluptas eligendi\net nobis quia fugit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(36, 'fuga nam accusamus voluptas reiciendis itaque', 'fuga-nam-accusamus-voluptas-reiciendis-itaque', NULL, 'ad mollitia et omnis minus architecto odit\nvoluptas doloremque maxime aut non ipsa qui alias veniam\nblanditiis culpa aut quia nihil cumque facere et occaecati\nqui aspernatur quia eaque ut aperiam inventore', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(37, 'provident vel ut sit ratione est', 'provident-vel-ut-sit-ratione-est', NULL, 'debitis et eaque non officia sed nesciunt pariatur vel\nvoluptatem iste vero et ea\nnumquam aut expedita ipsum nulla in\nvoluptates omnis consequatur aut enim officiis in quam qui', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(38, 'explicabo et eos deleniti nostrum ab id repellendus', 'explicabo-et-eos-deleniti-nostrum-ab-id-repellendus', NULL, 'animi esse sit aut sit nesciunt assumenda eum voluptas\nquia voluptatibus provident quia necessitatibus ea\nrerum repudiandae quia voluptatem delectus fugit aut id quia\nratione optio eos iusto veniam iure', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(39, 'eos dolorem iste accusantium est eaque quam', 'eos-dolorem-iste-accusantium-est-eaque-quam', NULL, 'corporis rerum ducimus vel eum accusantium\nmaxime aspernatur a porro possimus iste omnis\nest in deleniti asperiores fuga aut\nvoluptas sapiente vel dolore minus voluptatem incidunt ex', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(40, 'enim quo cumque', 'enim-quo-cumque', NULL, 'ut voluptatum aliquid illo tenetur nemo sequi quo facilis\nipsum rem optio mollitia quas\nvoluptatem eum voluptas qui\nunde omnis voluptatem iure quasi maxime voluptas nam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(41, 'non est facere', 'non-est-facere', NULL, 'molestias id nostrum\nexcepturi molestiae dolore omnis repellendus quaerat saepe\nconsectetur iste quaerat tenetur asperiores accusamus ex ut\nnam quidem est ducimus sunt debitis saepe', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(42, 'commodi ullam sint et excepturi error explicabo praesentium voluptas', 'commodi-ullam-sint-et-excepturi-error-explicabo-praesentium-voluptas', NULL, 'odio fugit voluptatum ducimus earum autem est incidunt voluptatem\nodit reiciendis aliquam sunt sequi nulla dolorem\nnon facere repellendus voluptates quia\nratione harum vitae ut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(43, 'eligendi iste nostrum consequuntur adipisci praesentium sit beatae perferendis', 'eligendi-iste-nostrum-consequuntur-adipisci-praesentium-sit-beatae-perferendis', NULL, 'similique fugit est\nillum et dolorum harum et voluptate eaque quidem\nexercitationem quos nam commodi possimus cum odio nihil nulla\ndolorum exercitationem magnam ex et a et distinctio debitis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(44, 'optio dolor molestias sit', 'optio-dolor-molestias-sit', NULL, 'temporibus est consectetur dolore\net libero debitis vel velit laboriosam quia\nipsum quibusdam qui itaque fuga rem aut\nea et iure quam sed maxime ut distinctio quae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(45, 'ut numquam possimus omnis eius suscipit laudantium iure', 'ut-numquam-possimus-omnis-eius-suscipit-laudantium-iure', NULL, 'est natus reiciendis nihil possimus aut provident\nex et dolor\nrepellat pariatur est\nnobis rerum repellendus dolorem autem', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(46, 'aut quo modi neque nostrum ducimus', 'aut-quo-modi-neque-nostrum-ducimus', NULL, 'voluptatem quisquam iste\nvoluptatibus natus officiis facilis dolorem\nquis quas ipsam\nvel et voluptatum in aliquid', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(47, 'quibusdam cumque rem aut deserunt', 'quibusdam-cumque-rem-aut-deserunt', NULL, 'voluptatem assumenda ut qui ut cupiditate aut impedit veniam\noccaecati nemo illum voluptatem laudantium\nmolestiae beatae rerum ea iure soluta nostrum\neligendi et voluptate', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(48, 'ut voluptatem illum ea doloribus itaque eos', 'ut-voluptatem-illum-ea-doloribus-itaque-eos', NULL, 'voluptates quo voluptatem facilis iure occaecati\nvel assumenda rerum officia et\nillum perspiciatis ab deleniti\nlaudantium repellat ad ut et autem reprehenderit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(49, 'laborum non sunt aut ut assumenda perspiciatis voluptas', 'laborum-non-sunt-aut-ut-assumenda-perspiciatis-voluptas', NULL, 'inventore ab sint\nnatus fugit id nulla sequi architecto nihil quaerat\neos tenetur in in eum veritatis non\nquibusdam officiis aspernatur cumque aut commodi aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(50, 'repellendus qui recusandae incidunt voluptates tenetur qui omnis exercitationem', 'repellendus-qui-recusandae-incidunt-voluptates-tenetur-qui-omnis-exercitationem', NULL, 'error suscipit maxime adipisci consequuntur recusandae\nvoluptas eligendi et est et voluptates\nquia distinctio ab amet quaerat molestiae et vitae\nadipisci impedit sequi nesciunt quis consectetur', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(51, 'soluta aliquam aperiam consequatur illo quis voluptas', 'soluta-aliquam-aperiam-consequatur-illo-quis-voluptas', NULL, 'sunt dolores aut doloribus\ndolore doloribus voluptates tempora et\ndoloremque et quo\ncum asperiores sit consectetur dolorem', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(52, 'qui enim et consequuntur quia animi quis voluptate quibusdam', 'qui-enim-et-consequuntur-quia-animi-quis-voluptate-quibusdam', NULL, 'iusto est quibusdam fuga quas quaerat molestias\na enim ut sit accusamus enim\ntemporibus iusto accusantium provident architecto\nsoluta esse reprehenderit qui laborum', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(53, 'ut quo aut ducimus alias', 'ut-quo-aut-ducimus-alias', NULL, 'minima harum praesentium eum rerum illo dolore\nquasi exercitationem rerum nam\nporro quis neque quo\nconsequatur minus dolor quidem veritatis sunt non explicabo similique', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(54, 'sit asperiores ipsam eveniet odio non quia', 'sit-asperiores-ipsam-eveniet-odio-non-quia', NULL, 'totam corporis dignissimos\nvitae dolorem ut occaecati accusamus\nex velit deserunt\net exercitationem vero incidunt corrupti mollitia', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(55, 'sit vel voluptatem et non libero', 'sit-vel-voluptatem-et-non-libero', NULL, 'debitis excepturi ea perferendis harum libero optio\neos accusamus cum fuga ut sapiente repudiandae\net ut incidunt omnis molestiae\nnihil ut eum odit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(56, 'qui et at rerum necessitatibus', 'qui-et-at-rerum-necessitatibus', NULL, 'aut est omnis dolores\nneque rerum quod ea rerum velit pariatur beatae excepturi\net provident voluptas corrupti\ncorporis harum reprehenderit dolores eligendi', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(57, 'sed ab est est', 'sed-ab-est-est', NULL, 'at pariatur consequuntur earum quidem\nquo est laudantium soluta voluptatem\nqui ullam et est\net cum voluptas voluptatum repellat est', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(58, 'voluptatum itaque dolores nisi et quasi', 'voluptatum-itaque-dolores-nisi-et-quasi', NULL, 'veniam voluptatum quae adipisci id\net id quia eos ad et dolorem\naliquam quo nisi sunt eos impedit error\nad similique veniam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(59, 'qui commodi dolor at maiores et quis id accusantium', 'qui-commodi-dolor-at-maiores-et-quis-id-accusantium', NULL, 'perspiciatis et quam ea autem temporibus non voluptatibus qui\nbeatae a earum officia nesciunt dolores suscipit voluptas et\nanimi doloribus cum rerum quas et magni\net hic ut ut commodi expedita sunt', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(60, 'consequatur placeat omnis quisquam quia reprehenderit fugit veritatis facere', 'consequatur-placeat-omnis-quisquam-quia-reprehenderit-fugit-veritatis-facere', NULL, 'asperiores sunt ab assumenda cumque modi velit\nqui esse omnis\nvoluptate et fuga perferendis voluptas\nillo ratione amet aut et omnis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(61, 'voluptatem doloribus consectetur est ut ducimus', 'voluptatem-doloribus-consectetur-est-ut-ducimus', NULL, 'ab nemo optio odio\ndelectus tenetur corporis similique nobis repellendus rerum omnis facilis\nvero blanditiis debitis in nesciunt doloribus dicta dolores\nmagnam minus velit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(62, 'beatae enim quia vel', 'beatae-enim-quia-vel', NULL, 'enim aspernatur illo distinctio quae praesentium\nbeatae alias amet delectus qui voluptate distinctio\nodit sint accusantium autem omnis\nquo molestiae omnis ea eveniet optio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(63, 'voluptas blanditiis repellendus animi ducimus error sapiente et suscipit', 'voluptas-blanditiis-repellendus-animi-ducimus-error-sapiente-et-suscipit', NULL, 'enim adipisci aspernatur nemo\nnumquam omnis facere dolorem dolor ex quis temporibus incidunt\nab delectus culpa quo reprehenderit blanditiis asperiores\naccusantium ut quam in voluptatibus voluptas ipsam dicta', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(64, 'et fugit quas eum in in aperiam quod', 'et-fugit-quas-eum-in-in-aperiam-quod', NULL, 'id velit blanditiis\neum ea voluptatem\nmolestiae sint occaecati est eos perspiciatis\nincidunt a error provident eaque aut aut qui', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(65, 'consequatur id enim sunt et et', 'consequatur-id-enim-sunt-et-et', NULL, 'voluptatibus ex esse\nsint explicabo est aliquid cumque adipisci fuga repellat labore\nmolestiae corrupti ex saepe at asperiores et perferendis\nnatus id esse incidunt pariatur', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(66, 'repudiandae ea animi iusto', 'repudiandae-ea-animi-iusto', NULL, 'officia veritatis tenetur vero qui itaque\nsint non ratione\nsed et ut asperiores iusto eos molestiae nostrum\nveritatis quibusdam et nemo iusto saepe', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(67, 'aliquid eos sed fuga est maxime repellendus', 'aliquid-eos-sed-fuga-est-maxime-repellendus', NULL, 'reprehenderit id nostrum\nvoluptas doloremque pariatur sint et accusantium quia quod aspernatur\net fugiat amet\nnon sapiente et consequatur necessitatibus molestiae', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(68, 'odio quis facere architecto reiciendis optio', 'odio-quis-facere-architecto-reiciendis-optio', NULL, 'magnam molestiae perferendis quisquam\nqui cum reiciendis\nquaerat animi amet hic inventore\nea quia deleniti quidem saepe porro velit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(69, 'fugiat quod pariatur odit minima', 'fugiat-quod-pariatur-odit-minima', NULL, 'officiis error culpa consequatur modi asperiores et\ndolorum assumenda voluptas et vel qui aut vel rerum\nvoluptatum quisquam perspiciatis quia rerum consequatur totam quas\nsequi commodi repudiandae asperiores et saepe a', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(70, 'voluptatem laborum magni', 'voluptatem-laborum-magni', NULL, 'sunt repellendus quae\nest asperiores aut deleniti esse accusamus repellendus quia aut\nquia dolorem unde\neum tempora esse dolore', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(71, 'et iusto veniam et illum aut fuga', 'et-iusto-veniam-et-illum-aut-fuga', NULL, 'occaecati a doloribus\niste saepe consectetur placeat eum voluptate dolorem et\nqui quo quia voluptas\nrerum ut id enim velit est perferendis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(72, 'sint hic doloribus consequatur eos non id', 'sint-hic-doloribus-consequatur-eos-non-id', NULL, 'quam occaecati qui deleniti consectetur\nconsequatur aut facere quas exercitationem aliquam hic voluptas\nneque id sunt ut aut accusamus\nsunt consectetur expedita inventore velit', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(73, 'consequuntur deleniti eos quia temporibus ab aliquid at', 'consequuntur-deleniti-eos-quia-temporibus-ab-aliquid-at', NULL, 'voluptatem cumque tenetur consequatur expedita ipsum nemo quia explicabo\naut eum minima consequatur\ntempore cumque quae est et\net in consequuntur voluptatem voluptates aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(74, 'enim unde ratione doloribus quas enim ut sit sapiente', 'enim-unde-ratione-doloribus-quas-enim-ut-sit-sapiente', NULL, 'odit qui et et necessitatibus sint veniam\nmollitia amet doloremque molestiae commodi similique magnam et quam\nblanditiis est itaque\nquo et tenetur ratione occaecati molestiae tempora', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(75, 'dignissimos eum dolor ut enim et delectus in', 'dignissimos-eum-dolor-ut-enim-et-delectus-in', NULL, 'commodi non non omnis et voluptas sit\nautem aut nobis magnam et sapiente voluptatem\net laborum repellat qui delectus facilis temporibus\nrerum amet et nemo voluptate expedita adipisci error dolorem', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(76, 'doloremque officiis ad et non perferendis', 'doloremque-officiis-ad-et-non-perferendis', NULL, 'ut animi facere\ntotam iusto tempore\nmolestiae eum aut et dolorem aperiam\nquaerat recusandae totam odio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(77, 'necessitatibus quasi exercitationem odio', 'necessitatibus-quasi-exercitationem-odio', NULL, 'modi ut in nulla repudiandae dolorum nostrum eos\naut consequatur omnis\nut incidunt est omnis iste et quam\nvoluptates sapiente aliquam asperiores nobis amet corrupti repudiandae provident', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(78, 'quam voluptatibus rerum veritatis', 'quam-voluptatibus-rerum-veritatis', NULL, 'nobis facilis odit tempore cupiditate quia\nassumenda doloribus rerum qui ea\nillum et qui totam\naut veniam repellendus', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(79, 'pariatur consequatur quia magnam autem omnis non amet', 'pariatur-consequatur-quia-magnam-autem-omnis-non-amet', NULL, 'libero accusantium et et facere incidunt sit dolorem\nnon excepturi qui quia sed laudantium\nquisquam molestiae ducimus est\nofficiis esse molestiae iste et quos', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(80, 'labore in ex et explicabo corporis aut quas', 'labore-in-ex-et-explicabo-corporis-aut-quas', NULL, 'ex quod dolorem ea eum iure qui provident amet\nquia qui facere excepturi et repudiandae\nasperiores molestias provident\nminus incidunt vero fugit rerum sint sunt excepturi provident', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(81, 'tempora rem veritatis voluptas quo dolores vero', 'tempora-rem-veritatis-voluptas-quo-dolores-vero', NULL, 'facere qui nesciunt est voluptatum voluptatem nisi\nsequi eligendi necessitatibus ea at rerum itaque\nharum non ratione velit laboriosam quis consequuntur\nex officiis minima doloremque voluptas ut aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(82, 'laudantium voluptate suscipit sunt enim enim', 'laudantium-voluptate-suscipit-sunt-enim-enim', NULL, 'ut libero sit aut totam inventore sunt\nporro sint qui sunt molestiae\nconsequatur cupiditate qui iste ducimus adipisci\ndolor enim assumenda soluta laboriosam amet iste delectus hic', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(83, 'odit et voluptates doloribus alias odio et', 'odit-et-voluptates-doloribus-alias-odio-et', NULL, 'est molestiae facilis quis tempora numquam nihil qui\nvoluptate sapiente consequatur est qui\nnecessitatibus autem aut ipsa aperiam modi dolore numquam\nreprehenderit eius rem quibusdam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(84, 'optio ipsam molestias necessitatibus occaecati facilis veritatis dolores aut', 'optio-ipsam-molestias-necessitatibus-occaecati-facilis-veritatis-dolores-aut', NULL, 'sint molestiae magni a et quos\neaque et quasi\nut rerum debitis similique veniam\nrecusandae dignissimos dolor incidunt consequatur odio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(85, 'dolore veritatis porro provident adipisci blanditiis et sunt', 'dolore-veritatis-porro-provident-adipisci-blanditiis-et-sunt', NULL, 'similique sed nisi voluptas iusto omnis\nmollitia et quo\nassumenda suscipit officia magnam sint sed tempora\nenim provident pariatur praesentium atque animi amet ratione', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(86, 'placeat quia et porro iste', 'placeat-quia-et-porro-iste', NULL, 'quasi excepturi consequatur iste autem temporibus sed molestiae beatae\net quaerat et esse ut\nvoluptatem occaecati et vel explicabo autem\nasperiores pariatur deserunt optio', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(87, 'nostrum quis quasi placeat', 'nostrum-quis-quasi-placeat', NULL, 'eos et molestiae\nnesciunt ut a\ndolores perspiciatis repellendus repellat aliquid\nmagnam sint rem ipsum est', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(88, 'sapiente omnis fugit eos', 'sapiente-omnis-fugit-eos', NULL, 'consequatur omnis est praesentium\nducimus non iste\nneque hic deserunt\nvoluptatibus veniam cum et rerum sed', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(89, 'sint soluta et vel magnam aut ut sed qui', 'sint-soluta-et-vel-magnam-aut-ut-sed-qui', NULL, 'repellat aut aperiam totam temporibus autem et\narchitecto magnam ut\nconsequatur qui cupiditate rerum quia soluta dignissimos nihil iure\ntempore quas est', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(90, 'ad iusto omnis odit dolor voluptatibus', 'ad-iusto-omnis-odit-dolor-voluptatibus', NULL, 'minus omnis soluta quia\nqui sed adipisci voluptates illum ipsam voluptatem\neligendi officia ut in\neos soluta similique molestias praesentium blanditiis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(91, 'aut amet sed', 'aut-amet-sed', NULL, 'libero voluptate eveniet aperiam sed\nsunt placeat suscipit molestias\nsimilique fugit nam natus\nexpedita consequatur consequatur dolores quia eos et placeat', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(92, 'ratione ex tenetur perferendis', 'ratione-ex-tenetur-perferendis', NULL, 'aut et excepturi dicta laudantium sint rerum nihil\nlaudantium et at\na neque minima officia et similique libero et\ncommodi voluptate qui', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(93, 'beatae soluta recusandae', 'beatae-soluta-recusandae', NULL, 'dolorem quibusdam ducimus consequuntur dicta aut quo laboriosam\nvoluptatem quis enim recusandae ut sed sunt\nnostrum est odit totam\nsit error sed sunt eveniet provident qui nulla', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(94, 'qui qui voluptates illo iste minima', 'qui-qui-voluptates-illo-iste-minima', NULL, 'aspernatur expedita soluta quo ab ut similique\nexpedita dolores amet\nsed temporibus distinctio magnam saepe deleniti\nomnis facilis nam ipsum natus sint similique omnis', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(95, 'id minus libero illum nam ad officiis', 'id-minus-libero-illum-nam-ad-officiis', NULL, 'earum voluptatem facere provident blanditiis velit laboriosam\npariatur accusamus odio saepe\ncumque dolor qui a dicta ab doloribus consequatur omnis\ncorporis cupiditate eaque assumenda ad nesciunt', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(96, 'quaerat velit veniam amet cupiditate aut numquam ut sequi', 'quaerat-velit-veniam-amet-cupiditate-aut-numquam-ut-sequi', NULL, 'in non odio excepturi sint eum\nlabore voluptates vitae quia qui et\ninventore itaque rerum\nveniam non exercitationem delectus aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(97, 'quas fugiat ut perspiciatis vero provident', 'quas-fugiat-ut-perspiciatis-vero-provident', NULL, 'eum non blanditiis soluta porro quibusdam voluptas\nvel voluptatem qui placeat dolores qui velit aut\nvel inventore aut cumque culpa explicabo aliquid at\nperspiciatis est et voluptatem dignissimos dolor itaque sit nam', '1', '0', '2022-12-20 04:55:27', NULL, 1, 2),
(98, 'laboriosam dolor voluptates', 'laboriosam-dolor-voluptates', NULL, 'doloremque ex facilis sit sint culpa\nsoluta assumenda eligendi non ut eius\nsequi ducimus vel quasi\nveritatis est dolores', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(99, 'temporibus sit alias delectus eligendi possimus magni', 'temporibus-sit-alias-delectus-eligendi-possimus-magni', NULL, 'quo deleniti praesentium dicta non quod\naut est molestias\nmolestias et officia quis nihil\nitaque dolorem quia', '1', '0', '2022-12-20 04:55:27', NULL, 1, 1),
(100, 'at nam consequatur ea labore ea harum', 'at-nam-consequatur-ea-labore-ea-harum', NULL, 'cupiditate quo est a modi nesciunt soluta\nipsa voluptas error itaque dicta in\nautem qui minus magnam et distinctio eum\naccusamus ratione error aut', '1', '0', '2022-12-20 04:55:27', NULL, 1, 3),
(101, 'How is it', 'how-is-it', 'photo/post/yd7DzfcyMgcdmU2XpfFQd4mmwND3kDqq9PBvtP0X.png', '<p>asdasd</p>', '1', '0', '2024-01-07 06:24:14', '2024-01-07 06:24:14', 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prokers`
--

CREATE TABLE `prokers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_registration_open` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 Not Open, 1 Open',
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 Tidak Aktif, 1 Aktif',
  `link_registration` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_storage_document` varchar(255) DEFAULT NULL,
  `link_storage_certificate` varchar(255) DEFAULT NULL,
  `link_storage_pdd_documentation` varchar(255) DEFAULT NULL,
  `link_contact_person` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prokers`
--

INSERT INTO `prokers` (`id`, `name`, `logo`, `description`, `is_registration_open`, `status`, `link_registration`, `link_instagram`, `link_storage_document`, `link_storage_certificate`, `link_storage_pdd_documentation`, `link_contact_person`, `created_at`, `updated_at`) VALUES
(1, 'Proker Himatif', NULL, 'Proker himatif adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius necessitatibus quod qui, maiores eum nam repellendus quasi, soluta hic architecto fugiat illo? Dolor magni dolorem veritatis dicta minus tenetur delectus ratione magnam, rem eveniet eligendi illum enim libero animi eius hic at aliquam dolore ipsa harum fugiat quas! Expedita, aperiam?', '1', '1', 'https://www.google.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Proker Himatif 2', NULL, 'Proker himatif adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius necessitatibus quod qui, maiores eum nam repellendus quasi, soluta hic architecto fugiat illo? Dolor magni dolorem veritatis dicta minus tenetur delectus ratione magnam, rem eveniet eligendi illum enim libero animi eius hic at aliquam dolore ipsa harum fugiat quas! Expedita, aperiam?', '0', '0', 'https://www.google.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proker_divisions`
--

CREATE TABLE `proker_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0 Tidak Aktif, 1 Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proker_divisions`
--

INSERT INTO `proker_divisions` (`id`, `name`, `name_slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ketua', 'ketua', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(2, 'Sekretaris', 'sekretaris', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(3, 'Bendahara', 'bendahara', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(4, 'CO. Acara', 'co-acara', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(5, 'SIE. Acara', 'sie-acara', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(6, 'CO. Humas', 'co-humas', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(7, 'SIE. Humas', 'sie-humas', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(8, 'CO. Publikasi dan Dokumentasi', 'co-pdd', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(9, 'SIE. Publikasi dan Dokumentasi', 'sie-pdd', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(10, 'CO. Perlengkapan', 'co-perlengkapan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL),
(11, 'SIE. Perlengkapan', 'sie-perlengkapan', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus cupiditate aspernatur quam quas neque ea possimus nostrum rem magni iure!', '1', '2022-12-20 04:55:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proker_users`
--

CREATE TABLE `proker_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `proker_id` bigint(20) UNSIGNED NOT NULL,
  `proker_division_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proker_users`
--

INSERT INTO `proker_users` (`id`, `name`, `nim`, `phone`, `note`, `created_at`, `updated_at`, `user_id`, `proker_id`, `proker_division_id`) VALUES
(1, 'Aditya Ari Fikri', '182410102002', '081231512512', NULL, '2022-12-20 04:55:27', NULL, 1, 1, 1),
(2, 'Alif Rachman', '182410102099', '081231512512', NULL, '2022-12-20 04:55:27', NULL, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2022-12-20 04:55:22', NULL),
(2, 'Pengurus', 'pengurus', '2022-12-20 04:55:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `position` enum('Ketua Umum','Sekretaris','Bendahara','Kepala Divisi','Kepala Subdivisi','Anggota','Demisioner') DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 Tidak Aktif, 1 Aktif',
  `year_entry` year(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `password`, `phone`, `photo`, `position`, `status`, `year_entry`, `created_at`, `updated_at`, `remember_token`, `division_id`, `role_id`) VALUES
(1, 'Aditya Ari Fikri', '182410102002', 'adit@gmail.com', '$2y$10$4202ofT1G2.pWkRQY9GoBesE8o2qMXRdDNY1jMvQcEVhpdbLZKcFe', NULL, NULL, 'Ketua Umum', '1', 2018, NULL, NULL, NULL, 1, 2),
(2, 'Aulia Nurul Ilma', '182410102020', 'aulia@gmail.com', '$2y$10$COTie9HFJuYyyGRExQ8I.OY21MwtWi7BSyz76GXUZra2sUFetRiba', NULL, NULL, 'Sekretaris', '1', 2018, NULL, NULL, NULL, 1, 2),
(3, 'Linda Fitri Dwi W', '182410102040', 'linda@gmail.com', '$2y$10$AlsVTg2yyEQ/ExNQ//TvRuUbZd0AM1/B4BX1dwd97gaGHQIf73HFK', NULL, NULL, 'Bendahara', '1', 2018, NULL, NULL, NULL, 1, 2),
(4, 'Edo Tri Wicaksono', '182410102047', 'edo@gmail.com', '$2y$10$mkOIlmUMv/hubCb.or3m3uRBiHy84V34V7m5VBSeOsUXVbaedjeLC', NULL, NULL, 'Kepala Divisi', '1', 2018, NULL, NULL, NULL, 2, 2),
(5, 'Arinda Vika Nur Hanifah', '182410102005', 'arinda@gmail.com', '$2y$10$qucha0TSSfvdV8XLzFPRru88h5CtQx3c3cmMcwLlFeS1hD96fFML.', NULL, NULL, 'Anggota', '1', 2018, NULL, NULL, NULL, 2, 2),
(6, 'Alife Zinedine Riza', '192410102013', 'zinedine@gmail.com', '$2y$10$hClUT1bVyc4.Bm3h8nvW8u3M8ancvo0DqQ7rty5.KynbM7seoq906', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 2, 2),
(7, 'Mahesa Riski Pratama', '192410102054', 'mahesa@gmail.com', '$2y$10$4OJPf1754sdVkf2grd4S2.NqA8NTHU6crbirNLTR9gXoV9/oRqYWa', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 2, 2),
(8, 'Roberto Carlos Harie O', '202410102007', 'roberto@gmail.com', '$2y$10$I.Dh68bfDqZk8.Gq1QTjNun3zXnQS7UAfpEsIaGy7oUsJA5NqJ1sy', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 2, 2),
(9, 'Laila Nur Fardah', '202410102018', 'fardah@gmail.com', '$2y$10$IgKBVBTy4ekveAN6cwQQI.3F8I1uakjmegGc/C288NmoTuSyXBKEW', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 2, 2),
(10, 'Laida Lavenia. H', '202410102041', 'lavenia@gmail.com', '$2y$10$LJHr0EepPyKgzQMD0u8ej.1LnI2xSImxk4mib/a7ucgRx0G4oIjh2', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 2, 2),
(11, 'Luthfi Aulia Akbar', '202410102085', 'luthfi@gmail.com', '$2y$10$UWFN5kErhb05sXD4AUSobeoqsem6yPVdHd40GYeT2ZMWpoHHyMbDG', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 2, 2),
(12, 'Saifur Rifqi Ali', '182410102033 ', 'ali@gmail.com', '$2y$10$zx5DTOxc2Q4DdXkksP8h6O0Du0s3NJPktE4cU/3QUcU97FfYNLaE6', NULL, NULL, 'Kepala Divisi', '1', 2018, NULL, NULL, NULL, 3, 2),
(13, 'Dios Nur Firdaus', '182410102065', 'dios@gmail.com', '$2y$10$N0QTyJRDauT3b8QObsIoSuBjs9aZtH7X6yyuSdgybw3zaYDEzJUT.', NULL, NULL, 'Anggota', '1', 2018, NULL, NULL, NULL, 3, 2),
(14, 'Sofyatul Masykuroh', '192410102001', 'sofyatul@gmail.com', '$2y$10$9yFvM0tRHIakDXguawpA7efd.K1D2e2Ov0.UVXUkjZKlUfXme3AL.', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 3, 2),
(15, 'Fahrian Ramaditiya', '192410102011', 'fahrian@gmail.com', '$2y$10$Qx2So6c5wZKpbUrZH6zVH.dvn9YKNN0yxYi8O6Osap0Kttnxzr092', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 3, 2),
(16, 'Ahmad Zidni Zainul I', '192410102044', 'zidni@gmail.com', '$2y$10$HhcWaMiabycYxBaG88/uM.H0XV.YVk4mD8pYx6YVgEimQu0UiOKsm', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 3, 2),
(17, 'Wahyu Agus Indrawati', '202410102064', 'wahyua@gmail.com', '$2y$10$dRlDHBSTt.8KeZk8Te37leXZhG0ALnCof41FPRRGVGNmY/4gBGpse', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 3, 2),
(18, 'Viqi Rafif Setya Putra', '202410102069', 'viqi@gmail.com', '$2y$10$c9/AYCXL.mqkfeVkf7zFA.BScCVXbEtmDTf1eI4lVx0IOugPqvJgq', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 3, 2),
(19, 'Hafizhah Wihdatul U', '202410102095', 'hafizhah@gmail.com', '$2y$10$PgPFdXlewpZVG1dkWcNG4eFqeQcoSqr03zoOyuttpYo.tCiYp9IUO', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 3, 2),
(20, 'Muhammad Arya R', '182410102035', 'arya@gmail.com', '$2y$10$ajY4lMnasfFCAVWjEQoUuuHYlgrEmqz/r0gMxhNLGbbjAJU3.x4uW', NULL, NULL, 'Kepala Divisi', '1', 2018, NULL, NULL, NULL, 4, 2),
(21, 'Dinda Dikrima Adi', '182410102009', 'dinda@gmail.com', '$2y$10$0E6V25co1A/keQRy1JeSD.7nnm2smreaMNwhKU3KpiqeHuR5uomIS', NULL, NULL, 'Kepala Subdivisi', '1', 2018, NULL, NULL, NULL, 5, 2),
(22, 'I’zaz Dhiya ‘Ulhaq', '192410102033', 'izaz@gmail.com', '$2y$10$eZvoAkwuuvKqlrwTwCWjyeFS19fCSRgNc7KyH90/Kkz/nS3h8PFDm', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 5, 2),
(23, 'Dhia Hayyu Syahirah', '192410102008', 'dhiahayyu@gmail.com', '$2y$10$wFgcxIJPz9pVmZgMFaUN0uV9WYfwjSXAgllitvj7bw8dDBc3Q5iUG', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 5, 2),
(24, 'Nurun Nazmi Qomariah', '202410102031', 'nurun@gmail.com', '$2y$10$BASaqNBF94Nu7BbxC8v5W.WjBfoCTW9Lf5ZHme9QT0wbH5QL4xrie', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 5, 2),
(25, 'Widya Setya Ningrum', '192410102003', 'widya@gmail.com', '$2y$10$0QZNbfGiVKOkq0btCXlZW.LPm.7nS7YZ6CKUvGs1QiUEycuxEh5B.', NULL, NULL, 'Kepala Subdivisi', '1', 2019, NULL, NULL, NULL, 6, 2),
(26, 'Alfi Nuriya Hizriatin', '192410102004', 'alfi@gmail.com', '$2y$10$.nJ5irt9MTq5rShZaKuNy.ivY1MEsQKY8wDz62UoresvctGYghUNi', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 6, 2),
(27, 'Dini Aulia Hidayati', '202410102072', 'dini@gmail.com', '$2y$10$gBgRN0k0uVIQ21e6A5Hy2..QzCBgFm8N.ZyBD4RD2aOfeRZUNRtfy', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 6, 2),
(28, 'Muhammad Fathony R', '182410102019', 'fathony@gmail.com', '$2y$10$MdZ9m6YQuBjxPRfmaIMcEeKTRQEU/9.5JW/r21moIBeiIQRAIYClm', NULL, NULL, 'Kepala Divisi', '1', 2018, NULL, NULL, NULL, 7, 2),
(29, 'Arif Nurul Rahman H', '182410102015', 'arif@gmail.com', '$2y$10$l31N5vWiak.AeC1Br7vWze9pfpyPY6iqUD6NIQp4gQ03lhcOACThi', NULL, NULL, 'Kepala Subdivisi', '1', 2018, NULL, NULL, NULL, 8, 2),
(30, 'Firratus Saadah', '182410102004', 'firratus@gmail.com', '$2y$10$R/L376SznfO1hABXZPlr0exMOAgcUNrykWgtN71MrGzixsbvvMOEK', NULL, NULL, 'Anggota', '1', 2018, NULL, NULL, NULL, 8, 2),
(31, 'Achmad Nur Hidayat', '192410102063', 'hidayat@gmail.com', '$2y$10$SxKxY9GOLUOPXzSsGtDNvux/jQt4lNcEPbCoRYuPBLChJM3GZ4XFO', NULL, NULL, 'Anggota', '1', 2019, NULL, NULL, NULL, 8, 2),
(32, 'Ardin Nugraha', '202410102012', 'ardin@gmail.com', '$2y$10$ImVvXfcGKEyssfCUycMyeu1du5dIOkdkLIc43Ew3IiCxE7lAUEse.', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 8, 2),
(33, 'Fadhli Nur Himawan', '202410102039', 'fadhli@gmail.com', '$2y$10$ypI5yru3dAtfHc.KY1kEmOg5Rpva2TD0WcBN6pkN/zniNB9J2o0ia', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 8, 2),
(34, 'Rahmad Firmansyah', '182410102024', 'fsyah7052@gmail.com', '$2y$10$ILL.iJmZr5tbCcKb3W9Gtu9qQhYlftLmSvuyyrFAl7sty93EuiZaS', NULL, NULL, 'Kepala Subdivisi', '1', 2018, NULL, NULL, NULL, 9, 1),
(35, 'Dingga Apris Rahmat K', '182410102006', 'dingga27@gmail.com', '$2y$10$4me4i.8UJXpUgNg66F8GqOIpC9SuI/ygX/Xeu1K88F/mKcj1F4ayS', NULL, NULL, 'Anggota', '1', 2018, NULL, NULL, NULL, 9, 1),
(36, 'Alif Rachman Saputro', '182410102058', 'alifrachman@gmail.com', '$2y$10$evqo2sxLN5lcU5LhzM9mrOh7wxoF9M8ptFwqJ48vx40ZNUEgxK.TK', NULL, NULL, 'Anggota', '1', 2018, NULL, NULL, NULL, 9, 1),
(37, 'Arman Maulana Saputra', '202410102026', 'armanmaulana@gmail.com', '$2y$10$X37Udbth1rVvVgI9CMcjk.C27lbVAUfuS1agnf.bUNz8RefzOotP.', NULL, NULL, 'Anggota', '1', 2020, NULL, NULL, NULL, 9, 1),
(38, 'robit', '212410102067', '123@gmail.com', '$2a$12$DtfkH3ko9rdSgQaTAZpiWegVwvGLD9EvLPPhnK/NYlDmX.vNoqHA6', NULL, NULL, 'Anggota', '1', 2022, '2022-12-22 05:29:37', '2022-12-22 05:29:37', NULL, 9, 1),
(41, '123', '123', 'abc@gmail.com', '$2y$10$PJvnDT6IXIow5Kw4GyQpi.3kX4X8tL2NaU0j/eMK7EjsRFG5X7FJ.', '123', 'himatif_1671694039.jpg', 'Kepala Subdivisi', '1', 2022, '2022-12-22 07:27:19', '2022-12-22 07:27:19', NULL, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `prokers`
--
ALTER TABLE `prokers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proker_divisions`
--
ALTER TABLE `proker_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proker_users`
--
ALTER TABLE `proker_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proker_users_user_id_foreign` (`user_id`),
  ADD KEY `proker_users_proker_id_foreign` (`proker_id`),
  ADD KEY `proker_users_proker_division_id_foreign` (`proker_division_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_division_id_foreign` (`division_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `prokers`
--
ALTER TABLE `prokers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proker_divisions`
--
ALTER TABLE `proker_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proker_users`
--
ALTER TABLE `proker_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `proker_users`
--
ALTER TABLE `proker_users`
  ADD CONSTRAINT `proker_users_proker_division_id_foreign` FOREIGN KEY (`proker_division_id`) REFERENCES `proker_divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proker_users_proker_id_foreign` FOREIGN KEY (`proker_id`) REFERENCES `prokers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proker_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
