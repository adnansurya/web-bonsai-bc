-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sabira_bonleaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 11, 2, 3, '2024-05-18 10:54:37', '2024-05-18 10:55:14'),
(2, 11, 3, 1, '2024-05-18 10:56:15', '2024-05-18 10:56:15'),
(3, 13, 3, 1, '2024-05-25 02:29:25', '2024-05-25 02:29:25'),
(4, 13, 1, 2, '2024-05-25 02:29:42', '2024-05-26 19:56:29'),
(5, 14, 1, 1, '2024-08-18 22:43:35', '2024-08-18 22:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Tanaman Gantung', 'Tanaman yang cocok untuk diletakkan di tempat yang tergantung, seperti pot gantung atau rak. Contohnya adalah potos, spider plant, dan string of pearls', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(3, 'Tanaman Air', 'Tanaman yang tumbuh di dalam air, baik dalam wadah khusus atau akuarium, seperti pakis air, anubias, dan java moss', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(5, 'Floor Plant', '<p>Floor Plant adalah tanaman hias yang ditempatkan di lantai untuk mengisi ruang kosong di sudut-sudut ruangan atau sebagai elemen dekoratif utama di suatu area.</p>', '2024-05-25 01:42:37', '2024-05-25 01:42:37'),
(6, 'Table Plant', '<p>Table Plant adalah tanaman hias yang ditempatkan di permukaan yang lebih tinggi dari lantai untuk menghias meja kerja, meja makan, rak buku, atau jendela.</p>', '2024-05-25 01:44:01', '2024-05-25 01:44:01');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_13_120118_create_categories_table', 1),
(6, '2024_05_13_121643_create_products_table', 1),
(7, '2024_05_13_123148_create_sales_table', 1),
(8, '2024_05_16_062003_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bonsai Bougenville', '<p style=\"text-align: justify;\">Tanaman bougainvillea yang dibentuk menjadi bonsai yaitu tanaman kerdil yang ditanam dalam pot dan dipangkas untuk menyerupai pohon dewasa dalam ukuran miniatur. Bougainvillea adalah tanaman yang berasal dari daerah tropis dan sub-tropis, terkenal dengan bunganya yang indah dan berwarna-warni.</p>\r\n<p><strong><br />Detail Tanaman</strong></p>\r\n<ul>\r\n<li>Ukuran Tanaman&nbsp; : 20 - 100 cm</li>\r\n<li>Intensitas Cahaya : Sinar matahari penuh</li>\r\n<li>Bunga&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Berbunga</li>\r\n<li>Penempatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Luar Ruangan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 292000, 6, 16, 'produk-images/UNic7rmfexUqAjQxXWkDfnqipvkkhja6nHYhlkWp.webp', '2024-05-18 10:31:43', '2024-05-25 02:22:05'),
(2, 'Ficus Retusa', '<p>Ficus retusa juga dikenal sebagai \"<em>Chinese Banyan</em>\" atau \"<em>Indian Laurel Fig</em>\" adalah spesies pohon dalam keluarga Moraceae yang merupakan tanaman populer untuk bonsai karena daya tahannya, daun yang lebat, dan kemudahan dalam pembentukan.<br /><br /><strong>Detail Tanaman</strong></p>\r\n<ul>\r\n<li>Ukuran Tanaman&nbsp; : 20 cm hingga &gt;1 meter</li>\r\n<li>Intensitas Cahaya : Terang, tidak langsung</li>\r\n<li>Bunga&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Tidak berbunga</li>\r\n<li>Penempatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Di area yang mendapat cahaya terang namun tidak langsung</li>\r\n</ul>', 1100000, 6, 9, 'produk-images/aHxMroUPDuq5S0eO0yJmv0JXpVrr9x9Z3Cs482Fu.jpg', '2024-05-18 10:31:43', '2024-05-25 02:11:57'),
(3, 'Mustam', '<p>Diospyros montana yang dikenal sebagai Mustam adalah spesies pohon dari keluarga Ebenaceae. Ini adalah tanaman yang tumbuh di daerah tropis dan subtropis dan dikenal karena kayunya yang keras dan buah yang menarik.<br /><br /></p>\r\n<p><strong>Detail Tanaman</strong></p>\r\n<ul>\r\n<li>Ukuran Tanaman&nbsp; : 10 - 20 meter</li>\r\n<li>Intensitas Cahaya : Terang, tidak langsung</li>\r\n<li>Bunga&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Berbunga</li>\r\n<li>Penempatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Di area yang mendapat cahaya terang namun tidak langsung</li>\r\n</ul>', 807500, 5, 10, 'produk-images/CxGQnmTiwTkzpS93jPV4uTqQ4wlItny6jq4I5ojn.jpg', '2024-05-18 10:31:43', '2024-05-25 02:19:34'),
(5, 'Lagerstroemia Indica', '<p>Bonsai Lagerstroemia indica adalah bonsai yang dibentuk dari spesies tanaman Lagerstroemia indica, yang juga dikenal sebagai Crepe Myrtle.</p>\r\n<p><br /><strong>Detail Tanaman<br /></strong></p>\r\n<ul>\r\n<li>Ukuran Tanaman&nbsp; : 20 - 60 cm</li>\r\n<li>Intensitas Cahaya : Sinar matahari yang cukup</li>\r\n<li>Bunga&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Berbunga</li>\r\n<li>Penempatan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Di area yang terkena sinar matahari langsung</li>\r\n</ul>\r\n<p><strong>&nbsp;</strong></p>', 310000, 6, 4, 'produk-images/MzgBUtSaRErhRptccCLSkoxlrhV3ORUk9FEopUQA.jpg', '2024-05-18 10:31:43', '2024-05-25 02:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total_price`, `date`, `created_at`, `updated_at`) VALUES
(2, 1, 30, 759800, '2016-08-14', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(3, 1, 30, 479854, '1999-08-07', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(4, 2, 35, 577238, '2003-07-26', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(5, 5, 47, 556608, '1974-09-29', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(6, 1, 10, 854073, '1974-03-22', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(8, 3, 49, 581214, '1999-07-13', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(9, 3, 21, 454897, '1971-07-18', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(10, 1, 21, 878457, '1991-10-07', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(12, 5, 21, 859425, '2021-07-16', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(13, 2, 8, 195874, '2008-04-05', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(14, 1, 2, 880172, '2012-03-11', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(15, 3, 28, 973947, '2008-08-09', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(16, 5, 14, 116069, '2007-01-10', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(17, 5, 4, 450973, '1991-09-08', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(18, 1, 27, 105921, '1981-12-05', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(20, 1, 1, 277687, '2020-10-16', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(21, 3, 37, 999007, '2012-12-17', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(22, 5, 42, 914755, '1978-08-07', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(23, 1, 39, 300580, '1993-07-20', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(25, 3, 27, 58113, '1999-08-06', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(27, 5, 25, 151554, '2019-08-31', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(28, 1, 29, 252958, '1976-09-03', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(29, 3, 15, 464226, '1975-11-15', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(30, 3, 8, 573536, '1977-04-02', '2024-05-18 10:31:43', '2024-05-18 10:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `wa_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_seller` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `wa_number`, `email`, `email_verified_at`, `password`, `is_seller`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eva Permata S.H.', '(+62) 562 0117 662', 'maryati.daliman@example.com', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 1, 'NweYaPFnOfODrfXhqjiTYs8yXloXCl5GSlmxIPgtFfNSlpNKBwKhkswZMwAn', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(2, 'Yusuf Samosir', '(+62) 26 1372 517', 'galur83@example.org', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, 'QKauphVqr4', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(3, 'Setya Siregar', '(+62) 325 0111 827', 'karen.hartati@example.com', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, 'iDNpYVIJjP', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(4, 'Puji Janet Mardhiyah S.H.', '(+62) 971 9758 4220', 'iwinarsih@example.com', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, '95HxHtqMZx', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(5, 'Gada Suwarno', '(+62) 546 9176 3607', 'diah88@example.org', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, '3T8zdDfKTG', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(6, 'Hardana Cengkal Wacana S.IP', '0779 8460 883', 'ika.nurdiyanti@example.org', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, 'ocdasXeGLR', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(7, 'Ulva Samiah Lailasari', '0310 9641 7531', 'simon25@example.com', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, '8cJCYjhC3b', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(8, 'Jelita Susanti', '0226 7045 3956', 'wasita.karen@example.com', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, '1uQsVHomYD', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(9, 'Hendra Harimurti Permadi', '0348 0079 1875', 'cinthia.uwais@example.org', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, 'JJsUt9CSMY', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(10, 'Tiara Nasyiah M.Pd', '(+62) 838 2518 998', 'psuryatmi@example.org', '2024-05-18 10:31:43', '$2y$12$xkAp1PSwxK9Gr2j.DofB7e5fPPL6FdU0IqwHO17wtUQsGK.NPHTrO', 0, 'SyXpUz6ryU', '2024-05-18 10:31:43', '2024-05-18 10:31:43'),
(11, 'Sasa', '088971698605', 'usersasa30@gmail.com', NULL, '$2y$12$8aPc3YwfmKL6ytoel6PJiOEGt47AOnzjWx4Odag6g6G3xEGXJDhKW', 1, NULL, '2024-05-18 10:52:44', '2024-05-18 10:52:44'),
(12, 'Daliman', '081344658907', 'daliman.mar@example.org', NULL, '$2y$12$7QeCbxRE29YGcugHkln6SOI/9atRZF9RVWZ01UDJeCc9WBrJqA.RO', 1, NULL, '2024-05-21 05:53:39', '2024-05-21 05:53:39'),
(13, 'Tata', '082123809067', 'usertata30@gmail.com', NULL, '$2y$12$xuYx6Hpn56xY5Dlk2.xBtOE3R1cs/VDulYYw2rpGtJPX1KHE3jQZK', 0, NULL, '2024-05-25 02:28:36', '2024-05-25 02:28:36'),
(14, 'Alifa', '081325538140', 'accalifa11@gmail.com', NULL, '$2y$12$GWRyAhYfQxpkDN4G5UTgxOXDPoHvnRUGIIUcsOXiAiwnivmYRMh02', 1, NULL, '2024-08-18 19:21:18', '2024-08-18 19:21:18'),
(15, 'sabira', '081325594705', 'sabiram@gmail.com', NULL, '$2y$12$1rkrbZgmBJ4nMCPPbkayOee003VhEcK7efqmbsAW4xl3fZS4XUM0G', 0, NULL, '2024-08-20 19:46:37', '2024-08-20 19:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
