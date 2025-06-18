-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 03:32 PM
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
-- Database: `laravel_reminder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('andra@example.com|127.0.0.1', 'i:1;', 1735896415),
('andra@example.com|127.0.0.1:timer', 'i:1735896415;', 1735896415),
('budi01@gmail.com|127.0.0.1', 'i:1;', 1736172229),
('budi01@gmail.com|127.0.0.1:timer', 'i:1736172229;', 1736172229),
('dosen@example.com|127.0.0.1', 'i:1;', 1735949586),
('dosen@example.com|127.0.0.1:timer', 'i:1735949586;', 1735949586),
('firenze@gmail.com|127.0.0.1', 'i:1;', 1736172211),
('firenze@gmail.com|127.0.0.1:timer', 'i:1736172211;', 1736172211),
('firenzehiga@gmail.com|127.0.0.1', 'i:1;', 1741854007),
('firenzehiga@gmail.com|127.0.0.1:timer', 'i:1741854007;', 1741854007),
('higa@gmail.com|127.0.0.1', 'i:1;', 1735971394),
('higa@gmail.com|127.0.0.1:timer', 'i:1735971394;', 1735971394),
('mahasiswa@example.com|127.0.0.1', 'i:4;', 1749875785),
('mahasiswa@example.com|127.0.0.1:timer', 'i:1749875785;', 1749875785),
('raka@gmail.com|127.0.0.1', 'i:1;', 1736172244),
('raka@gmail.com|127.0.0.1:timer', 'i:1736172244;', 1736172244);

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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `alamat`, `telepon`, `jabatan`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', '08112233', 'Bogor Timur', '085894310722', 'Kemahasiswaan', 'budi01@gmail.com', NULL, '2025-01-04 12:11:04'),
(2, 'Asep Sucipto', '087225261', 'Bogor Raya', '08653435737', 'Kepala Jurusan', 'asep@gmail.com', NULL, '2025-01-04 00:18:36');

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
-- Table structure for table `jadwal_bimbingan`
--

CREATE TABLE `jadwal_bimbingan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Disetujui',
  `pesan` text DEFAULT NULL,
  `umpanBalik` text DEFAULT NULL,
  `tenggat_waktu` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsiBimbingan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_bimbingan`
--

INSERT INTO `jadwal_bimbingan` (`id`, `mahasiswa_id`, `dosen_id`, `tanggal`, `status`, `pesan`, `umpanBalik`, `tenggat_waktu`, `created_at`, `updated_at`, `deskripsiBimbingan`) VALUES
(29, 1, 1, '2025-05-24 13:24:00', 'Expired', NULL, NULL, NULL, '2025-05-23 05:09:14', '2025-06-14 06:29:30', 'Cihuy barihuy roblok kuy'),
(30, 28, 1, '2025-06-23 11:34:00', 'Bimbingan Selesai', NULL, 'aaaa', '2025-06-03 11:40:00', '2025-06-13 21:34:22', '2025-06-13 21:40:57', 'anjah cihuy'),
(31, 28, 1, '2025-06-15 12:18:00', 'Disetujui', NULL, NULL, NULL, '2025-06-13 22:18:16', '2025-06-14 16:31:54', 'Aku nak bimbingan lah'),
(32, 17, 2, '2025-06-15 12:20:00', 'Menunggu Disetujui', NULL, NULL, NULL, '2025-06-13 22:20:17', '2025-06-13 22:20:17', 'aku nak bimbiingan'),
(36, 16, 2, '2025-06-15 12:25:00', 'Menunggu Disetujui', NULL, NULL, NULL, '2025-06-13 22:25:46', '2025-06-13 22:25:46', 'apalah cikk'),
(37, 1, 1, '2025-06-14 06:27:00', 'Sedang Bimbingan', NULL, NULL, NULL, '2025-06-14 16:27:01', '2025-06-14 16:31:35', 'aku nak bimbinan');

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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `jurusan` enum('Teknik Informatika','Sistem Informasi','Bisnis Digital','') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jurusan`, `alamat`, `telepon`, `email`, `created_at`, `updated_at`, `dosen_id`) VALUES
(1, 'Firenze Higa', '0110223014', 'Teknik Informatika', 'Mutiara Venezia', '085894310722', 'firenze@gmail.com', '2024-12-29 06:30:16', '2025-01-04 06:40:27', 1),
(2, 'Wahyu Andrianto Wibowo', '0110223295', 'Teknik Informatika', 'Depok', '087788577459', 'wahyu@gmail.com', '2024-12-29 06:30:16', '2024-12-29 06:30:16', 2),
(5, 'Raka Muhammad Rabbani', '0110223050', 'Teknik Informatika', 'Bogor', '081213354184', 'raka@gmail.com', NULL, NULL, 1),
(6, 'Arya Sastra Digya', '0110223044', 'Teknik Informatika', 'Jakarta', '085894310722', 'arya@gmail.com', NULL, '2025-01-08 07:05:08', 1),
(9, 'Fahmi Romadhon', '0110223049', 'Teknik Informatika', 'Bogor', '089605232754', 'fahmi@gmail.com', NULL, NULL, 1),
(10, 'Nicky Fajaelani', '0110223045', 'Teknik Informatika', 'Bogor', '085710586529', 'niki@gmail.com', NULL, NULL, 2),
(11, 'M rizal fauzi', '0110223046', 'Teknik Informatika', 'Bogor', '085894317049', 'rizal@gmail.com\r\n', NULL, NULL, 2),
(12, 'Nanda Ilham Fadlika', '0110223051', 'Teknik Informatika', 'Bogor', '082298694585', 'nanda@gmail.com', NULL, NULL, 2),
(13, 'Muhammad Aris Naufal', '0110223020', 'Teknik Informatika', 'Cileungsi', '083804299088', 'aris@gmail.com', NULL, NULL, 2),
(14, 'Ryandra Athaya Saleh', '0110223013', 'Teknik Informatika', 'Depok', '081290616904', 'andra@gmail.com', NULL, NULL, 2),
(15, 'Shafhan Farizi ', '0110223019', 'Teknik Informatika', 'Bogor', '082192951031', 'sopyan@gmail.com', NULL, NULL, 1),
(16, 'Satria Tri Ferdiansyah ', '0110223039', 'Teknik Informatika', 'Depok', '082124456088', 'satria@gmail.com', NULL, NULL, 2),
(17, 'Muhammad Amir Al Aqwa', '0110223032', 'Teknik Informatika', 'Bekasi', '081908761118', 'aming@gmail.com', NULL, NULL, 2),
(18, 'Arrijal Abdul Kholik', '0110223043', 'Teknik Informatika', 'Depok', '081280343290', 'olik@gmail.com', NULL, NULL, 1),
(19, 'Roby Mulia', '0110223010', 'Teknik Informatika', 'Depok', '081398559241', 'ical@gmail.com', NULL, NULL, 1),
(20, 'Rano Alamsyah', '0110223024', 'Teknik Informatika', 'Depok', '085772307118', 'rano@gmail.com', NULL, NULL, 1),
(21, 'testing', '01102230111', 'Teknik Informatika', 'Blok A5 No. 1 Rt.001/Rw.014 Perum Mutiara Venezia Residence', '085894310722', 'testing@gmail.com', '2025-06-13 19:57:00', '2025-06-13 19:57:00', 1),
(28, 'Miftah', '3565456', 'Teknik Informatika', 'parung', '081282620077', 'miftah@example.com', '2025-06-13 20:13:26', '2025-06-13 20:13:26', 1);

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
(4, '2024_12_16_230230_create_mahasiswa_table', 1),
(5, '2024_12_16_230628_create_dosen_table', 1),
(6, '2024_12_16_230723_create_jadwal_bimbingan_table', 1),
(7, '2024_12_16_230757_create_riwayat_bimbingan_table', 1),
(8, '2024_12_16_230834_create_tenggat_waktu_table', 1),
(9, '2024_12_16_230937_create_umpan_balik_table', 1),
(10, '2024_12_17_231604_add_nim_nip_to_users_table', 2),
(11, '2024_12_20_121658_add_role_to_users_table', 3),
(12, '2024_12_20_232139_remove_pengingat_from_jadwal_bimbingan', 4),
(13, '2024_12_20_232220_remove_waktupengingat_from_jadwal_bimbingan', 5),
(14, '2024_12_20_233209_add_foreign_keys_to_users_table', 6),
(15, '2024_12_20_235520_remove_name_from_users_table', 7),
(16, '2024_12_21_021645_add_time_to_jadwal_bimbingan', 8),
(17, '2024_12_21_042700_update_tanggal_to_datetime_in_jadwalbimbingan_table', 9),
(18, '2024_12_27_030023_add_dosen_id_to_mahasiswa_table', 10),
(19, '2025_01_02_000939_add_deadline_to_jadwal_bimbingan_table', 10),
(20, '2025_01_02_052134_add_pesan_and_deskripsi_bimbingan_to_jadwal_bimbingan_table', 11);

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
('2LwXvTGGvcaIlubMsUO22PTQROOIkMZAsOwm8RPZ', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNUxBajFIMEZRd3Zqd2JjYkxBTmxpZ3FLU2k2UGs5UWsyZWxPbWlpeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yaXdheWF0QmltYmluZ2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1749904721),
('hBOYfEVzriSQLw9jrjuMcUt0A1ws11p0dSP8HqrF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoienR2MFBDa2toM2JDUFZZcVNaQnh0V05tSTNOZUZHQnMyRmJrd3B0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749946557),
('tw9kufN61BJ2MvszZwVSH0gBlIKupJzvyKLf34eo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidXpQOTc2S1V0Z1dxV0tKN0NvM01uYnJMbXVZVkpyb0VkWkM4RUwxbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kb3Nlbi9qYWR3YWxCaW1iaW5nYW4iO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjQzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZG9zZW4vamFkd2FsQmltYmluZ2FuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1749907793),
('tWDKp0QrryISrSAwEQRU7BAvnSr6vk6uDhVn5XoU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWVtVk1vbURIbE8yZkJKYXFGZnJrVllBRzI2eE5XcmVYU1JjaEp1SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1749946558),
('wcqK4L8F54g2swxWIPqKtLmZylzIo827S9HruteR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVo2SnpERjdsUE1QRUpUbkY5aEVkaDF5WUhmZ0FkMEk3eGtydzc0SyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1749944480);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i',
  `role` varchar(255) NOT NULL DEFAULT 'mahasiswa',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `dosen_id`, `mahasiswa_id`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `nim`, `nip`) VALUES
(1, 1, NULL, 'budi@gmail.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'dosen', NULL, '2024-12-17 16:22:27', '2024-12-25 01:41:02', NULL, NULL),
(2, 2, NULL, 'asep@gmail.com', NULL, '$2y$12$aZmuzESz2saNOzFpjdQlte4Cf1N2rgPGVCSisARregVgpc0m/YOOe', 'dosen', NULL, '2024-12-20 05:47:15', '2024-12-20 05:47:15', NULL, NULL),
(3, NULL, 1, 'higa@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, '2024-12-20 05:47:15', '2025-01-05 09:12:01', NULL, NULL),
(5, NULL, 2, 'wahyu@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, '0110223011', NULL),
(6, NULL, 5, 'raka@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(7, NULL, 6, 'arya@example.com', NULL, '$2y$12$4RR1Uc97nqMJQHCMFYN3bOM2Ku5oDYkNSsyzCWCpzcjhhfsfibc2i', 'mahasiswa', NULL, NULL, '2025-01-02 23:45:08', NULL, NULL),
(8, NULL, 9, 'fahmi@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(9, NULL, 10, 'nicky@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(10, NULL, 14, 'ryandra@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(11, NULL, 13, 'aris@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(12, NULL, 15, 'shafhan@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(13, NULL, 16, 'satria@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(14, NULL, 17, 'amir@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(15, NULL, 18, 'arrijal@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(16, NULL, 19, 'roby@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(17, NULL, 20, 'rano@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, NULL, NULL, NULL, NULL),
(18, NULL, 21, 'testing@gmail.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, '2025-06-13 19:57:00', '2025-06-13 19:57:00', NULL, NULL),
(21, NULL, 28, 'miftah@example.com', NULL, '$2y$12$Udce6zZd7Qk3KHlGjPLV2OUP5AaTBXMpwHTir/yplAS.tMlhc0u3i', 'mahasiswa', NULL, '2025-06-13 20:13:26', '2025-06-13 20:13:26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD UNIQUE KEY `dosen_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_bimbingan`
--
ALTER TABLE `jadwal_bimbingan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD KEY `users_dosen_id_foreign` (`dosen_id`),
  ADD KEY `users_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_bimbingan`
--
ALTER TABLE `jadwal_bimbingan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
