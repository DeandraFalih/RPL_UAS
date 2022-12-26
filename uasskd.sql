-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 02:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uasskd`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(5) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `depresiasi` int(20) NOT NULL,
  `lama` int(4) NOT NULL,
  `harga` int(20) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode`, `nama`, `merk`, `satuan`, `keterangan`, `kondisi`, `depresiasi`, `lama`, `harga`, `lokasi`, `jumlah`, `tgl_input`, `updated_at`, `created_at`) VALUES
(1, 'SV1', 'Laptop', 'Asus', 'Unit', 'Asus ROG', 'Baik', 18000000, 12, 220000000, 'Ruang 1', 5, '2022-12-21 13:12:15', '2022-12-21', NULL),
(4, 'SV2', 'ESP32', 'Espressif Systems', 'Unit', 'ESP32', 'Baik', 70000, 1, 75000, 'Ruang 2', 21, '2022-10-26 07:11:38', NULL, NULL),
(9, 'SV3', 'Monitor', ' Dell', 'Unit', 'Monitor Dell 22 Inch', 'Kurang Baik', 1200000, 24, 1500000, 'Ruang 1', 2, '2022-10-26 07:10:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fitrahf87@gmail.com', '$2y$10$ZCU1TcELPJmvJRLvwTlsrukeCGdyJM3C7cN8bZuiiGHnEgNHzot/O', '2022-12-18 02:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(6) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `id_peminjam` int(5) NOT NULL,
  `jumlah_pinjam` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `batas` date NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `kondisi_awal` varchar(15) DEFAULT NULL,
  `kondisi_kembali` varchar(15) DEFAULT NULL,
  `terlambat` int(3) DEFAULT NULL,
  `denda` int(20) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_barang`, `id_peminjam`, `jumlah_pinjam`, `tgl_pinjam`, `batas`, `tgl_kembali`, `kondisi_awal`, `kondisi_kembali`, `terlambat`, `denda`, `status`, `updated_at`, `created_at`) VALUES
(7, 'SV1', 3, 1, '2022-06-23', '2022-10-26', '2022-10-26 12:08:14', 'Baik', 'Baik', NULL, NULL, 'Completed', '0000-00-00', '0000-00-00'),
(8, 'SV1', 2, 1, '2022-10-23', '2022-10-26', NULL, 'Baik', NULL, NULL, NULL, 'Process', '0000-00-00', '0000-00-00'),
(9, 'SV2', 6, 1, '2022-10-23', '2022-10-26', NULL, '', NULL, NULL, NULL, 'Rejected', '0000-00-00', '0000-00-00'),
(10, 'SV2', 7, 3, '2022-10-23', '2022-10-26', '2022-10-26 14:11:38', 'Baik', 'Baik', NULL, NULL, 'Completed', '0000-00-00', '0000-00-00'),
(12, 'SV1', 2, 2, '2022-12-21', '2022-12-21', NULL, NULL, NULL, NULL, NULL, 'Canceled', '2022-12-21', '2022-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Dandi Supriatna Fauzi', 'fitrahhfirdauss@gmail.com', '2022-12-18 06:24:01', '$2y$10$Fq8Ggh8dymeRHZVYRb72g.jYO5P5MoPniMjtZFyO8brgtclFtROwu', NULL, '2022-12-18 06:23:44', '2022-12-18 06:24:01', NULL),
(6, 'Citra Dewi', 'ruruuchia@gmail.com', NULL, '$2y$10$r6RBXBIvwROgD7ALm9BTXOmCQ8FPRo3vqbzeu4W7W4nszxF.OOg7K', NULL, '2022-12-18 06:29:12', '2022-12-18 06:29:55', NULL),
(7, 'Fitrah Firdaus', 'fitrahf87@gmail.com', '2022-12-17 22:41:32', '$2y$10$M.4Sj8GzKdimTDWkMEkpbu065co.h16Vt/eH2OueIBcdDC8ctdKNy', NULL, '2022-12-17 22:41:09', '2022-12-17 22:41:32', 'admin'),
(11, 'Deandra', 'kheichiro@gmail.com', '2022-12-19 21:01:51', '$2y$10$kX4nR0IVhs3iMQasQAAx7eMvgAaUA/qI0Eqc/oKtiWXT3c8oApciG', NULL, '2022-12-19 21:01:30', '2022-12-19 21:01:51', 'admin'),
(12, 'Dewa', 'fitorafirdause@gmail.com', '2022-12-21 07:06:11', '$2y$10$FxxvaXhZ32TbE33BHLN07efXK.Ty7GJO4vKJbnN9IX0K3TNGu.r9.', 'HIpBcJKW1jjl7sNE0B8fuqR7jNGet9vgfjINqOgZPwPZkmQw57yyxQSYtFWK', '2022-12-21 07:05:42', '2022-12-21 07:06:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodde` (`kode`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_peminjam` (`id_peminjam`),
  ADD KEY `kodebarang` (`kode_barang`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
