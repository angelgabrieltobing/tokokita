-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2026 at 05:56 AM
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
-- Database: `db_tokokita`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `sampul_buku` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `pengarang`, `tahun`, `sinopsis`, `sampul_buku`, `created_at`, `updated_at`) VALUES
(2, 'Perahu Kertas', 'angel', '2019', 'sekelompok anak yang berjuang meraih mimpi dengan penuh harapan dan warna kehidupan.', 'sampul_buku/XDP7Yvk7hy8UQ7tw98lePVLv5P1e6lDdhgePDBKe.jpg', '2026-07-08 07:41:32', '2026-07-08 07:41:32'),
(3, 'Negri lima menara', 'angel', '2021', 'Ceritanya terinspirasi dari pengalaman Ahmad Fuadi saat menempuh pendidikan di sebuah pondok pesantren.', 'sampul_buku/zypYJ2IQnxeg47jtvydxAS7yRZVVFRCEY0MC3SMd.jpg', '2026-07-08 07:43:41', '2026-07-08 07:43:41'),
(4, 'Laskar Pelangi', 'angel', '2015', 'perjuangan 10 anak dari keluarga miskin yang bersekolah di SD Muhammadiyah di Belitung.', 'sampul_buku/jXlRq2JVVj4QO3TRI6cXsUFrmhk9Juxbp07MlNq2.jpg', '2026-07-08 07:45:27', '2026-07-08 07:45:27'),
(5, 'Bumi', 'angel', '2022', 'Novel sejarah tentang perjuangan pribumi di masa kolonial Belanda, kisah cinta dan perlawanan tokoh Minke.', 'sampul_buku/v7YO5UTLa5cEalKJ1ATMNKYpDzS00peTvOaXYxuF.jpg', '2026-07-08 07:46:39', '2026-07-08 08:25:58'),
(6, 'Edensor', 'angel', '2015', 'petualangan Ikal dan Arai yang melanjutkan studi ke Eropa, tepatnya di Prancis dan Belanda, di mana mereka menemukan warna baru kehidupan, cinta, dan perjuangan mempertahankan harga diri di tanah asing', 'sampul_buku/dHv1azPYgDc9N3J4YhTvYMs4IDSx9qqgkbmew9AJ.jpg', '2026-07-08 08:28:45', '2026-07-08 08:28:45'),
(7, 'Sang pemimpi', 'angel', '2016', 'kisah persahabatan Ikal, Arai, dan Jimbron yang merantau ke Pulau Belitung untuk menggapai mimpi-mimpi besar mereka, meskipun harus menghadapi berbagai rintangan dan keterbatasan ekonomi', 'sampul_buku/3h7XsRVPbzOGSDYxwaAQ6to24Yx602wXXj3RtMn1.jpg', '2026-07-08 08:30:17', '2026-07-08 08:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_14_092907_create_produks_table', 1),
(5, '2026_04_15_140535_create_bukus_table', 1),
(6, '2026_06_04_043542_add_role_to_users_table', 1),
(7, '2026_06_25_045138_create_personal_access_tokens_table', 1),
(8, '2026_06_30_031300_add_sampul_buku_to_bukus_table', 1),
(9, '2026_07_06_092859_create_peminjamen_table', 1),
(10, '2026_07_08_142125_add_tahun_terbit_to_bukus_table', 2),
(11, '2026_07_08_142718_drop_tahun_terbit_from_bukus_table', 3),
(12, '2026_07_08_154014_create_pesanans_table', 4);

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
-- Table structure for table `peminjamans`
--

CREATE TABLE `peminjamans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `durasi` int(11) NOT NULL,
  `biaya_sewa` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamans`
--

INSERT INTO `peminjamans` (`id`, `user_id`, `buku_id`, `durasi`, `biaya_sewa`, `status`, `tanggal_pinjam`, `tanggal_kembali`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 0, 'Menunggu Konfirmasi', '2026-07-08', NULL, '2026-07-08 07:47:35', '2026-07-08 07:47:35'),
(2, 2, 3, 5, 4000, 'Sudah Dikembalikan', '2026-07-08', '2026-07-08', '2026-07-08 07:47:55', '2026-07-08 07:50:22'),
(3, 2, 4, 3, 0, 'Sedang Dipinjam', '2026-07-08', NULL, '2026-07-08 07:48:09', '2026-07-08 07:49:01'),
(4, 2, 6, 9, 12000, 'Menunggu Konfirmasi', '2026-07-08', NULL, '2026-07-08 08:32:27', '2026-07-08 08:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'token_aplikasi_mobile', '31c70804d4fa87cffb32cefd8007605c8212622b5e15c5ee2d6c50e3eaa13253', '[\"*\"]', '2026-07-08 07:08:18', NULL, '2026-07-08 07:06:53', '2026-07-08 07:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paket` varchar(255) NOT NULL,
  `jumlah_sepatu` int(11) NOT NULL,
  `layanan_tambahan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`layanan_tambahan`)),
  `total_biaya` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Pembayaran',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `paket`, `jumlah_sepatu`, `layanan_tambahan`, `total_biaya`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'reguler', 2, '[\"repaint\"]', 140000, 'Menunggu Pembayaran', '2026-07-08 09:03:19', '2026-07-08 09:03:19'),
(2, 3, 'deep_clean', 4, '[\"repaint\",\"wangi_premium\"]', 290000, 'Menunggu Pembayaran', '2026-07-08 09:03:35', '2026-07-08 09:03:35'),
(3, 3, 'premium', 6, '[\"wangi_premium\"]', 610000, 'Menunggu Pembayaran', '2026-07-08 09:03:52', '2026-07-08 09:03:52'),
(4, 4, 'reguler', 8, '[\"repaint\"]', 320000, 'Menunggu Pembayaran', '2026-07-08 09:05:11', '2026-07-08 09:05:11'),
(5, 4, 'deep_clean', 2, '[\"wangi_premium\"]', 110000, 'Menunggu Pembayaran', '2026-07-08 09:05:21', '2026-07-08 09:05:21'),
(6, 4, 'premium', 4, '[\"repaint\",\"wangi_premium\"]', 490000, 'Menunggu Pembayaran', '2026-07-08 09:05:34', '2026-07-08 09:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `kategori`, `harga`, `deskripsi`, `stok`, `gambar_produk`, `created_at`, `updated_at`) VALUES
(1, 'Tumbler', NULL, 350000, 'bagus dan kece', 8, 'produk/1783520199_tumbler.jpg', '2026-07-08 06:47:08', '2026-07-08 07:16:39'),
(2, 'Sandal', NULL, 50000, 'sendal anti air', 10, 'produk/1783520251_sandal.jpg', '2026-07-08 06:47:08', '2026-07-08 07:17:31'),
(3, 'Laptop Asus', NULL, 5000000, 'laptop terbaru dan bagus', 25, 'produk/1783520266_laptop.png', '2026-07-08 06:47:08', '2026-07-08 07:17:46'),
(4, 'kipas angin mini', NULL, 50000, 'angin kencang seperti badai', 15, 'produk/1783520292_kipas.jpg', '2026-07-08 06:47:08', '2026-07-08 07:18:12'),
(5, 'Tas ransel', NULL, 250000, 'kuat dan ringan', 40, 'produk/1783520303_tas.jpg', '2026-07-08 06:47:08', '2026-07-08 07:18:23'),
(6, 'Topi', NULL, 60000, 'anti terbang', 35, 'produk/1783520315_topi.jpg', '2026-07-08 06:47:08', '2026-07-08 07:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bqq4ABdi6NCt7h8lEd2Eu8SWDw3Gifuu3xgWYkJg', 3, '127.0.0.1', 'Thunder Client (https://www.thunderclient.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMThLZTdFUTU5dTJ0aktzQUE5ZTJ4WTRDTXc0elBkT29KbVhQcTRtOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvcHJvZHVrIjtzOjU6InJvdXRlIjtzOjE2OiJhcGkucHJvZHVrLmluZGV4Ijt9fQ==', 1783519698),
('ooG6WgyQAWZMslvZmwsFAPyJxp8JjOt1Ob2Lqkeu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.128.0 Chrome/148.0.7778.271 Electron/42.5.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzdQMU9IcllYZUNMWkNBOU8wRUdic0FKaXFHTmV3bzlUN1JZN3dwcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1783526420),
('Op4UfzvMLMetNQ6RAHMstgu8rvVdgY6bYhgpaF9M', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36 Edg/150.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVE1SQ2F5ZkNmTm5jdExGbVhmSXdPRVJqMDY3UEhseVRPcU5XZDhZVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW1pbmphbWFuIjtzOjU6InJvdXRlIjtzOjE2OiJwZW1pbmphbWFuLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1783526798);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'anggota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Angel Tobing', 'pustakawan@kampus.ac.id', NULL, '$2y$12$G/xl9nmLyN3yH7E0n2d2JOKcecRJzxFcXIuC8BejAvjXt.qyU5Izu', NULL, '2026-07-08 06:18:56', '2026-07-08 06:18:56', 'pustakawan'),
(2, 'Anggota Perpustakaan', 'anggota@gmail.com', NULL, '$2y$12$JTh3riJIdKi/4KyNo3Z0Ze66Pj01rVi261lNx7D6cR9S3htNaDgaG', NULL, '2026-07-08 06:18:56', '2026-07-08 06:18:56', 'anggota'),
(3, 'Admin Produk', 'adminproduk@gmail.com', NULL, '$2y$12$IDX1plf38nsWTW00pkPoK.sJHJYDwE12Mxa8TR5c9/XDjLLEtIACi', NULL, '2026-07-08 07:06:04', '2026-07-08 07:06:04', 'admin_produk'),
(4, 'Customer Produk', 'customer@gmail.com', NULL, '$2y$12$QOtqakp8D4MYa9c2RZ9qn.c12YSJyC5Az27TsBfFp2zmImjZiig8.', NULL, '2026-07-08 07:06:05', '2026-07-08 07:06:05', 'customer_produk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamans_user_id_foreign` (`user_id`),
  ADD KEY `peminjamans_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjamans`
--
ALTER TABLE `peminjamans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjamans`
--
ALTER TABLE `peminjamans`
  ADD CONSTRAINT `peminjamans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
