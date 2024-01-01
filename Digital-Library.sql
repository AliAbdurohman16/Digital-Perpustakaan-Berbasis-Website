-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 01:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Digital-Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 12,
  `file_book` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cover`, `title`, `category_id`, `user_id`, `description`, `amount`, `file_book`, `created_at`, `updated_at`) VALUES
(1, 'NelF8CzbEdTDVRzx8Nd3Ociuc8CGxqRFgQy4klgU.png', 'Laut Bercerita', 2, 1, '<p>Buku ini terdiri atas dua bagian. Bagian pertama mengambil sudut pandang\r\n seorang mahasiswa aktivis bernama Laut, menceritakan bagaimana Laut dan\r\n kawan-kawannya menyusun rencana, berpindah-pindah dalam pelarian, \r\nhingga tertangkap oleh pasukan rahasia. Sedangkan bagian kedua \r\ndikisahkan oleh Asmara, adik Laut. Bagian kedua mewakili perasaan \r\nkeluarga korban penghilangan paksa, bagaimana pencarian mereka terhadap \r\nkerabat mereka yang tak pernah kembali.\r\nBuku ini ditulis sebagai bentuk tribute bagi para aktivis yang diculik, \r\nyang kembali, dan yang tak kembali dan keluarga yang terus menerus \r\nsampai sekarang mencari-cari jawaban. \r\n</p><p><br></p><p>Novel ini merupakan perwujudan dalam bentuk fiksi bahwa kita sebagai \r\nbangsa Indonesia tidak boleh melupakan sejarah yang telah membentuk \r\nsekaligus menjadi tumpuan bangsa Ini. Novel ini juga mengajak pembaca \r\nmenguak misteri-misteri bangsa ini yang mana tidak diajarkan di sekolah.\r\n Walaupun novel ini adalah fiksi, laut bercerita menunjukkan kepada \r\npembaca bahwa negeri ini pernah memasuki masa pemerintahan yang kelam.</p><p><br></p><p>Sinopsis\r\n</p><p>Laut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah \r\nkeluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan \r\ndi dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, \r\nsejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang \r\ncinta yang tak akan luntur.\r\n</p>', 10, 'hflZuTDG9adyB7mFNrk89gzzHulhc5kNCCufVmJ2.pdf', '2023-07-22 03:40:37', '2023-07-22 03:41:20'),
(2, 'PBYYQuIvdRkz0n2tFIIowINWicPDhNZgzBTu9Yno.jpg', 'BUKU MENULIS NOVEL DENGAN BAHAGIA', 1, 2, '<p>Ya, menulis itu mudah dan membahagiakan. Menulis itu mudah, terutama \r\nbagi mereka yang suka membaca. Menulis itu membahagiakan diri dan orang \r\nlain, terutama bagi mereka yang terbiasa mencoba menulis karena dorongan\r\n hati yang kuat.</p><p><br></p><p>Bagi mereka yang sudah jatuh cinta pada kata-kata, membaca dan menulis, \r\nsama membahagiakannya dengan pergi ke tempat-tempat indah, makan makanan\r\n enak, naik kendaraan yang bagus, ataupun mendapatkan kado istimewa yang\r\n menyenangkan.</p><p><br></p><p>Sangat banyak orang yang ingin menulis, tetapi mengalami kesulitan. \r\nMungkin, hal ini seperti orang yang sangat banyak uang, tetapi bingung \r\nuntuk menginvestasikannya. Terutama jika berhubungan dengan keraguan \r\nberinvestasi yang tepat dan tepercaya. Namun, sesungguhnya menulis tidak\r\n sesulit mencari orang jujur dan tidak perlu merasa ragu untuk \r\nmenuliskannya.</p><p><br></p><p>Jangan membaca buku ini, jika merasa hanya membuang-buang waktu. \r\nLangsung saja menulis novel, lalu baca buku ini. Setelah itu, revisi \r\nkembali novelnya.</p><p>Selamat menulis novel dengan bahagia!</p>', 9, 'cIfL0dx8PRbtW7DoNEtlXUqy1L9Perme4SLxHZ31.pdf', '2023-07-22 03:47:22', '2023-07-22 03:47:22'),
(3, 'O6OtQZTidZNphOTI3W759yJHIaLo1gGNxWT8UiFQ.jpg', 'Malioboro at Midnight', 1, 3, '<p>Tengah malam bagi kebanyakan orang adalah waktu terbaik untuk \r\nberistirahat dan tidur lelap. Tapi untuk Serana Nighita, itu adalah \r\nwaktu untuk menangisi hidup dan meratapi hubungannya dengan sang \r\npenyanyi terkenal, Jan Ichard. Popularitas membawa lelaki itu jauh \r\ndarinya, Ichard di Jakarta, meninggalkan Sera di Jogja.\r\n</p><p><br></p><p>Bagi Sera, tengah malam selalu menakutkan.\r\n</p><p><br></p><p>Namun, semua berubah setelah Malioboro Hartigan tidak sengaja mendobrak \r\npintu kamarnya pada sebuah malam. Malio datang dan menawarkan pertemanan\r\n agar Sera tidak sendiri, agar Sera bisa berbagi sedihnya.\r\n</p><p><br></p><p>Lantas bagaimana dengan hubungan Sera dan Jan Ichard yang semakin rumit?\r\n Dan benarkah tanpa sadar, Malio sudah menjadi \'Midnight\' terbaik Sera?\r\n</p><p><br></p><p>Tentang Penulis\r\nHai aku Skysphire, si pecinta langit beserta segala isinya seperti \r\nbulan, bintang, matahari, awan, hujan, dan juga petir. Aku lahir di \r\nJakarta pada 27 September 2001. Nama Sky bukan semata-mata diambil \r\nkarena aku suka langit, tapi karena aku juga suka SKY (Sehun, Kai, Yeol)\r\n hehe.\r\n</p><p><br></p><p>Malioboro at Midnight adalah buku kelima yang diterbitkan sejak aku \r\naktif menulis dua tahun lalu. Bagiku, menulis adalah cara kita memandang\r\n dunia dari sisi yang tak terduga. Di dunia ini banyak hal mustahil \r\nterjadi, maka itu aku suka menciptakan segala hal mustahil itu lewat \r\ntulisanku, karena hanya dari tiap goresan kata yang tertulislah semua \r\nyang mustahil bisa terjadi.\r\n</p>', 11, 'FVKyGW6qFTzxOyQhR7VcGooJiV7MirBBk43Y4Ajx.pdf', '2023-07-22 03:54:00', '2023-07-22 03:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Novel', 'novel', '2023-07-22 03:38:03', '2023-07-22 03:38:03'),
(2, 'Cerita', 'cerita', '2023-07-22 03:38:11', '2023-07-22 03:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_21_022747_create_permission_tables', 1),
(6, '2023_07_21_031231_create_categories_table', 1),
(7, '2023_07_21_031247_create_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-07-22 03:37:12', '2023-07-22 03:37:12'),
(2, 'user', 'web', '2023-07-22 03:37:12', '2023-07-22 03:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default/user.png',
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `fullname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'default/user.png', 'Admin', 'admin@gmail.com', '2023-07-22 03:37:12', '$2y$10$r1em1IovX4LDoWxxFItvkOdAjUtiWzUz0eavGBJxO4Cv8V4kHK6Ei', NULL, '2023-07-22 03:37:13', '2023-07-22 03:37:13'),
(2, 'default/user.png', 'User', 'user@gmail.com', '2023-07-22 03:37:15', '$2y$10$yiQM5lQcg6222JZ0BOxAIOwx620S1tdJUCDvfxSilUBPb6xtHCb0W', NULL, '2023-07-22 03:37:15', '2023-07-22 03:37:15'),
(3, 'default/user.png', 'Ali Abdurohman', 'aliabdurohman@gmail.com', NULL, '$2y$10$CmC7FjTqojOKNunukU.XQe9gGY6KArqF49k9kgoT3.4b6eZ0PY4cq', NULL, '2023-07-22 03:51:06', '2023-07-22 03:51:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
