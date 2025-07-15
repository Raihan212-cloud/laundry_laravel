-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2025 pada 11.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `counts`
--

CREATE TABLE `counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(25) DEFAULT NULL,
  `angka1` decimal(10,2) DEFAULT NULL,
  `angka2` decimal(10,2) DEFAULT NULL,
  `hasil` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `counts`
--

INSERT INTO `counts` (`id`, `jenis`, `angka1`, `angka2`, `hasil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'tambah', 12.50, 1.10, 13.60, '2025-06-22 21:01:40', '2025-06-23 01:33:17', NULL),
(4, 'tambah', 2.00, 5.00, 7.00, '2025-06-22 21:04:35', '2025-06-23 00:30:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'rey', '086674873245', 'manggarai', '2025-07-01 00:38:27', '2025-07-01 00:38:27'),
(2, 'ario', '089510947997', 'mangga dua', '2025-07-13 21:27:12', '2025-07-13 21:27:12'),
(3, 'dio', '0895799834', 'manggarai', '2025-07-15 00:02:57', '2025-07-15 00:02:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2025_06_23_022059_create_counts_table', 2),
(6, '2025_06_25_063805_create_services_table', 3),
(7, '2025_06_30_012530_create_levels_table', 4),
(8, '2025_06_30_072344_create_customers_table', 4),
(9, '2025_07_01_020027_create_trans_orders_table', 5),
(10, '2025_07_01_022136_create_trans_details_table', 6),
(11, '2025_07_03_041311_create_personal_access_tokens_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 13, 'api_token', '68c9ed882e1c5cc9a4261631003eb3f492f168f0c403ee7c604235c4e0482a28', '[\"*\"]', '2025-07-08 22:00:52', NULL, '2025-07-08 21:59:14', '2025-07-08 22:00:52'),
(2, 'App\\Models\\User', 7, 'api_token', '0ca053340d6ace36db8699f188d9b23b3d8bb01f1fa5f1589748416da513b475', '[\"*\"]', '2025-07-08 22:07:53', NULL, '2025-07-08 22:07:40', '2025-07-08 22:07:53'),
(3, 'App\\Models\\User', 7, 'api_token', 'c80c9d4f221aab87b54751931e2e54ec91e993d5e2bc939b422d4db72150457a', '[\"*\"]', '2025-07-09 19:32:59', NULL, '2025-07-09 19:32:34', '2025-07-09 19:32:59'),
(4, 'App\\Models\\User', 7, 'api_token', '3b17f47db1cc03174bbf2de302184a298553e683ccb1f99701c5ebf31cca3175', '[\"*\"]', '2025-07-09 21:04:21', NULL, '2025-07-09 21:00:23', '2025-07-09 21:04:21'),
(5, 'App\\Models\\User', 7, 'api_token', '8647c8f6c6b3759dc8bfd1b33d0ba605ff51cb486de6eb3fbe7300375994345d', '[\"*\"]', NULL, NULL, '2025-07-09 23:53:33', '2025-07-09 23:53:33'),
(6, 'App\\Models\\User', 7, 'api_token', 'bbde3cf13ac395f5968f77652772753f8e2f8be0218f50fcb9ccc07984d4c98d', '[\"*\"]', NULL, NULL, '2025-07-10 00:00:33', '2025-07-10 00:00:33'),
(7, 'App\\Models\\User', 7, 'api_token', '73268728eb4b9001716154a24706486f8ee02dffc7aa311e7d1ce79d19a9ae4f', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:35', '2025-07-10 00:13:35'),
(8, 'App\\Models\\User', 7, 'api_token', '056f977bc4e838d22eee34254138a95263b8de54e1afb0787517299d64e6cca6', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:37', '2025-07-10 00:13:37'),
(9, 'App\\Models\\User', 7, 'api_token', '9bd382c3adf088ea450c983f71c98de3598010c95841d11b2e9b81f2c55851a3', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:47', '2025-07-10 00:13:47'),
(10, 'App\\Models\\User', 7, 'api_token', 'e4bd66426feb1e77c6064d7fad4a7889e180ee657d47493d5db83a206f3da2d4', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:47', '2025-07-10 00:13:47'),
(11, 'App\\Models\\User', 7, 'api_token', '4ae5a8269e71653d0469944e7a2550891368e6b8d1fd30bcdb5245f04ba1240f', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:48', '2025-07-10 00:13:48'),
(12, 'App\\Models\\User', 7, 'api_token', '83aa1124b18c42c20a8c1f653af6cfbf9f305294f319b40461d613bb5adac569', '[\"*\"]', NULL, NULL, '2025-07-10 00:13:48', '2025-07-10 00:13:48'),
(13, 'App\\Models\\User', 7, 'api_token', '3269623a5eebeca10620068bd2ebc734e1a2dc77fdcfde8f8feeb01dbbf34d86', '[\"*\"]', NULL, NULL, '2025-07-10 00:15:21', '2025-07-10 00:15:21'),
(14, 'App\\Models\\User', 7, 'api_token', 'e370a435b475d325a61ec77ba7801da6fa85dc14dac043b49678dbea0a2dd3b0', '[\"*\"]', NULL, NULL, '2025-07-10 00:15:41', '2025-07-10 00:15:41'),
(15, 'App\\Models\\User', 7, 'api_token', 'dc97adf0b24b3de2e7b42667c7e8b5c48c7b2f65fbbb92b2078e6f33df5f4ac7', '[\"*\"]', '2025-07-10 00:18:43', NULL, '2025-07-10 00:15:54', '2025-07-10 00:18:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('sroWYW6whUPLSR4RFlX2pmtCHMMS1D8xtGU64nF2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2FDQWpTa2RLMnRVdzRnME5HcUpJRmhIYUVWQ1M5RW80empOMkRtWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFucyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1752569747);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_details`
--

CREATE TABLE `trans_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trans` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trans_details`
--

INSERT INTO `trans_details` (`id`, `id_trans`, `id_service`, `qty`, `subtotal`, `note`, `created_at`, `updated_at`) VALUES
(4, 5, 2, 2, 6000, NULL, '2025-07-01 22:10:10', '2025-07-01 22:10:10'),
(5, 5, 1, 1, 4000, NULL, '2025-07-01 22:10:10', '2025-07-01 22:10:10'),
(6, 6, 1, 3, 12000, NULL, '2025-07-14 23:42:52', '2025-07-14 23:42:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_orders`
--

CREATE TABLE `trans_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(30) NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(4) DEFAULT 0,
  `order_pay` int(11) DEFAULT NULL,
  `order_change` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `trans_orders`
--

INSERT INTO `trans_orders` (`id`, `id_customer`, `order_code`, `order_end_date`, `order_status`, `order_pay`, `order_change`, `total`, `created_at`, `updated_at`) VALUES
(5, 1, 'TR-02072025-002', '2025-07-17', 0, NULL, NULL, 10000, '2025-07-01 22:10:10', '2025-07-01 22:10:10'),
(6, 2, 'TR-15072025-001', '2025-07-17', 0, NULL, NULL, 12000, '2025-07-14 23:42:52', '2025-07-14 23:42:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_of_services`
--

CREATE TABLE `type_of_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(35) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `type_of_services`
--

INSERT INTO `type_of_services` (`id`, `service_name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cuci gosok', 4000, 'Bayar lahhhhhhhhhhhhhhhh', '2025-06-30 22:15:51', '2025-06-30 22:15:51', NULL),
(2, 'hanya cuci', 3000, '3rb/1kg', '2025-07-01 21:52:48', '2025-07-01 21:52:48', NULL),
(3, 'cuci tikar', 10000, '1kg/ 10000', '2025-07-15 01:39:38', '2025-07-15 01:39:38', NULL),
(4, 'cuci sarung', 5000, '5000/ kg', '2025-07-15 01:48:35', '2025-07-15 01:48:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$w0V3SNB3tYx8XHOdKJ1q8uD6cxREu8M1457KGSanZbfg1X/tx/usO', NULL, '2025-06-24 20:47:24', '2025-06-24 20:47:24'),
(4, 'rey', 'rey@gmail.com', '0000-00-00 00:00:00', '12345', NULL, NULL, NULL),
(7, 'bersky', 'ber@gmail.com', NULL, '$2y$12$8Mon/iqKxoCBjfSTEW.D1e5IANuW41tKPup.OiT98FigWdWU9VTO6', NULL, '2025-07-03 21:15:56', '2025-07-08 22:06:59'),
(8, 'reyy', 'reyyamon@gmail.com', NULL, '$2y$12$SoVt/KHM1Q1ptLDc6aIK1ufjyTPli2uUvnym2cHvBeB29QfqbSUle', NULL, '2025-07-03 21:48:13', '2025-07-03 21:48:13'),
(9, 'adimas pantat ayam', 'dimasnopiyanto12@gmail.com', NULL, '$2y$12$cKMm5xsFBpAH8EeRb36Hz.hgjcXYfK9I7e5vMjK.hj9Dw5cC/lrU2', NULL, '2025-07-03 21:50:05', '2025-07-03 21:50:05'),
(10, 'pak_ustad', 'pak_ustad@gmail.com', NULL, '$2y$12$9cz.SIHduixvsL4imT3Wb.Bhne8FSz.GCL4jcun.c6FwvF61yOeQG', NULL, '2025-07-03 21:55:17', '2025-07-03 21:55:17'),
(11, 'elon', 'masterelon@gmail.com', NULL, '$2y$12$FdhNjxh8JhJWjIskDKf8.eEQhs50PC/ir.IgmDBdr0y2kUSEgCxLS', NULL, '2025-07-03 21:58:19', '2025-07-03 21:58:19'),
(12, 'abdul12', 'abdul12@gmail.com', NULL, '$2y$12$dTkIDOx5tHj36uJygof.3OnEwJVJwU11RnMWyQ02KaawseP.FLbPG', NULL, '2025-07-03 22:02:35', '2025-07-03 22:02:35'),
(13, 'tirta', 'admin12@gmail.com', NULL, '$2y$12$rMhLVgEul.94zNmZste4NeHKXY0JqI3GkqwJrGWOigG77vicbhpdK', NULL, '2025-07-08 21:45:26', '2025-07-08 21:45:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `counts`
--
ALTER TABLE `counts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `trans_details`
--
ALTER TABLE `trans_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_details_id_trans_foreign` (`id_trans`),
  ADD KEY `trans_details_id_service_foreign` (`id_service`);

--
-- Indeks untuk tabel `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_orders_id_customer_foreign` (`id_customer`);

--
-- Indeks untuk tabel `type_of_services`
--
ALTER TABLE `type_of_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `counts`
--
ALTER TABLE `counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `trans_details`
--
ALTER TABLE `trans_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `trans_orders`
--
ALTER TABLE `trans_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `type_of_services`
--
ALTER TABLE `type_of_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans_details`
--
ALTER TABLE `trans_details`
  ADD CONSTRAINT `trans_details_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `type_of_services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trans_details_id_trans_foreign` FOREIGN KEY (`id_trans`) REFERENCES `trans_orders` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_orders`
--
ALTER TABLE `trans_orders`
  ADD CONSTRAINT `trans_orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
