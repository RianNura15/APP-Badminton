-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2024 pada 18.18
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
-- Database: `appbadminton`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datauser`
--

CREATE TABLE `datauser` (
  `id_datauser` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `gambar_ktp` varchar(255) DEFAULT NULL,
  `alamat_penyewa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datauser`
--

INSERT INTO `datauser` (`id_datauser`, `user_id`, `username`, `no_telp`, `jenis_kelamin`, `ktp`, `gambar_ktp`, `alamat_penyewa`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'ariiiii', '0877665523677', 'Laki-Laki', '979879879719823', NULL, 'pare', NULL, NULL),
(7, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 13, 'Arisucipto', '085344567283', 'Laki-Laki', '888877887878347', NULL, 'Kediri', NULL, NULL),
(13, 17, 'mahen gokil', '087766273238', 'Laki-Laki', '8001246809035002', '62e805a5bcb86stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Trenggalek', NULL, NULL),
(14, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 23, 'lukmanhkm', '08989871135', 'Laki-Laki', '8800112364454001', '630236f49fa5cstock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Jl. Tosaren 2 Kec. Pesantren Kota Kediri', NULL, NULL),
(20, 24, 'mandynurk', '08877666556', 'Laki-Laki', '8800984367654891', '62e802de83fc7stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Warujayeng, Nganjuk', NULL, NULL),
(21, 25, 'RianZzZ', '082244745603', 'Laki-Laki', '8002240108175007', '62f7b6d73d6c1stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Bendo Pare', NULL, NULL),
(23, 27, 'Nura', '082244745603', 'Laki-Laki', '88299237878', '65bc586dc3528stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Bendo', NULL, NULL),
(24, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 29, 'akbar', '082244745603', 'Laki-Laki', '9899788677565', '66385291a6dc4WhatsApp Image 2022-01-22 at 14.02.45.jpeg', 'Pare', NULL, NULL),
(26, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 31, 'annura', '082244745603', 'Laki-Laki', '9898882399823', '66449a8fbb051ktp.jpg', 'Pare', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jadwal`
--

CREATE TABLE `data_jadwal` (
  `id_jadwal` bigint(11) UNSIGNED NOT NULL,
  `id_datasewa` bigint(11) UNSIGNED DEFAULT NULL,
  `id_lap` bigint(11) UNSIGNED DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `expired` time DEFAULT NULL,
  `tanggalmain` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_jadwal`
--

INSERT INTO `data_jadwal` (`id_jadwal`, `id_datasewa`, `id_lap`, `hari`, `expired`, `tanggalmain`, `jam_mulai`, `jam_selesai`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Hari 1', '19:30:14', '2024-03-13', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 12:20:15', '2024-05-14 06:40:38'),
(2, 2, 5, 'Hari 1', '19:30:53', '2024-05-14', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 12:20:53', '2024-05-14 06:28:28'),
(3, 3, 5, 'Hari 1', '19:32:08', '2024-05-13', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 12:22:08', '2024-05-14 06:42:14'),
(4, 4, 5, 'Hari 1', '19:33:12', '2024-05-14', '14:00:00', '16:00:00', 'Expired', '0', '2024-03-11 12:23:12', '2024-05-14 06:44:49'),
(5, 5, 5, 'Hari 1', '19:33:44', '2024-05-28', '12:00:00', '14:00:00', 'Expired', '0', '2024-03-11 12:23:44', '2024-05-14 06:35:06'),
(6, 6, 5, 'Hari 1', '19:34:01', '2024-05-14', '11:00:00', '13:00:00', 'Expired', '0', '2024-03-11 12:24:01', '2024-05-14 06:44:56'),
(7, 7, 5, 'Hari 1', '19:34:14', '2024-03-12', '12:00:00', '13:00:00', 'Expired', '0', '2024-03-11 12:24:14', '2024-05-14 06:45:05'),
(8, 8, 5, 'Hari 1', '19:34:25', '2024-03-12', '13:00:00', '14:00:00', 'Expired', '0', '2024-03-11 12:24:25', '2024-05-14 06:45:11'),
(9, 9, 5, 'Hari 1', '19:36:42', '2024-03-12', '14:00:00', '15:00:00', 'Expired', '0', '2024-03-11 12:26:42', '2024-05-14 06:45:17'),
(10, 10, 11, 'Hari 1', '20:00:27', '2024-03-12', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 12:50:28', '2024-05-14 06:45:23'),
(11, 11, 11, 'Hari 1', '20:00:59', '2024-03-12', '09:00:00', '10:00:00', 'Expired', '0', '2024-03-11 12:50:59', '2024-05-14 06:45:29'),
(12, 12, 11, 'Hari 1', '20:44:56', '2024-03-22', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 13:34:56', '2024-05-14 06:45:35'),
(13, 13, 11, 'Hari 1', '20:45:16', '2024-03-22', '09:00:00', '10:00:00', 'Expired', '0', '2024-03-11 13:35:16', '2024-05-14 06:45:40'),
(14, 14, 11, 'Hari 1', '20:45:31', '2024-03-22', '10:00:00', '11:00:00', 'Expired', '0', '2024-03-11 13:35:31', '2024-05-14 06:45:46'),
(15, 15, 5, 'Hari 1', '20:47:50', '2024-03-17', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 13:37:50', '2024-05-14 06:45:51'),
(16, 16, 11, 'Hari 1', '21:01:14', '2024-03-16', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 13:51:14', '2024-05-14 06:45:56'),
(17, 17, 11, 'Hari 1', '21:03:37', '2024-03-15', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 13:53:37', '2024-05-14 06:46:01'),
(18, 18, 12, 'Hari 1', '21:12:19', '2024-03-15', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 14:02:20', '2024-05-14 06:46:08'),
(19, 19, 12, 'Hari 1', '21:18:59', '2024-03-14', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 14:08:59', '2024-05-14 06:46:13'),
(20, 20, 12, 'Hari 1', '21:21:53', '2024-03-21', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 14:11:53', '2024-05-14 06:46:19'),
(21, 21, 13, 'Hari 1', '21:25:30', '2024-03-13', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 14:15:30', '2024-05-14 06:46:25'),
(22, 22, 13, 'Hari 1', '22:09:47', '2024-03-20', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 14:59:47', '2024-05-14 06:46:30'),
(23, 23, 13, 'Hari 1', '22:10:07', '2024-03-20', '09:00:00', '10:00:00', 'Expired', '0', '2024-03-11 15:00:07', '2024-05-14 06:46:35'),
(24, 24, 13, 'Hari 1', '22:32:57', '2024-03-29', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 15:22:57', '2024-05-14 06:46:40'),
(25, 25, 13, 'Hari 1', '22:40:35', '2024-03-21', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 15:30:35', '2024-05-14 06:46:45'),
(26, 26, 13, 'Hari 1', '22:45:20', '2024-03-25', '08:00:00', '09:00:00', 'Expired', '0', '2024-03-11 15:35:20', '2024-05-14 06:46:51'),
(27, 27, 13, 'Hari 1', '22:45:37', '2024-03-25', '09:00:00', '10:00:00', 'Expired', '0', '2024-03-11 15:35:37', '2024-05-14 06:46:56'),
(28, 28, 13, 'Hari 1', '22:45:51', '2024-03-25', '10:00:00', '11:00:00', 'Expired', '0', '2024-03-11 15:35:51', '2024-05-14 06:47:02'),
(29, 29, 13, 'Hari 1', '22:46:07', '2024-03-25', '12:00:00', '13:00:00', 'Expired', '0', '2024-03-11 15:36:07', '2024-03-11 15:36:07'),
(30, 30, 13, 'Hari 1', '23:01:33', '2024-03-31', '08:00:00', '09:00:00', 'Selesai', '0', '2024-03-11 15:51:33', '2024-05-14 09:55:31'),
(31, 31, 12, 'Hari 1', '15:20:04', '2024-03-13', '08:00:00', '09:00:00', 'Di Batalkan Pelanggan', '0', '2024-03-12 08:10:05', '2024-03-12 13:56:07'),
(32, 32, 12, 'Hari 1', '15:20:24', '2024-03-13', '09:00:00', '10:00:00', 'Di Batalkan Admin', '0', '2024-03-12 08:10:24', '2024-03-12 13:55:27'),
(33, 33, 12, 'Hari 1', '15:20:39', '2024-03-13', '10:00:00', '11:00:00', 'Selesai', '0', '2024-03-12 08:10:39', '2024-05-14 09:55:25'),
(34, 34, 12, 'Hari 1', '15:24:49', '2024-03-30', '08:00:00', '09:00:00', 'Selesai', '0', '2024-03-12 08:14:50', '2024-05-14 09:55:20'),
(35, 35, 11, 'Hari 1', '21:50:37', '2024-04-04', '08:00:00', '09:00:00', 'Selesai', '0', '2024-03-12 14:40:37', '2024-05-14 09:55:14'),
(36, 36, 13, 'Hari 1', '21:53:03', '2024-04-05', '08:00:00', '09:00:00', 'Selesai', '0', '2024-03-12 14:43:03', '2024-05-14 09:55:09'),
(37, 37, 13, 'Hari 1', '14:05:23', '2024-03-13', '14:00:00', '15:00:00', 'Selesai', '0', '2024-03-13 06:55:23', '2024-03-13 08:00:02'),
(38, 38, 13, 'Hari 1', '14:06:56', '2024-03-13', '15:00:00', '16:00:00', 'Expired', '0', '2024-03-13 06:56:56', '2024-03-13 07:07:03'),
(39, 39, 12, 'Hari 1', '16:31:31', '2024-04-06', '08:00:00', '12:00:00', 'Expired', '0', '2024-03-13 09:21:31', '2024-03-13 09:32:02'),
(40, 40, 11, 'Hari 1', '21:01:14', '2024-03-15', '14:00:00', '15:00:00', 'Selesai', '0', '2024-03-14 13:56:14', '2024-05-14 09:54:59'),
(41, 41, 11, 'Hari 1', '21:03:01', '2024-03-15', '15:00:00', '16:00:00', 'Selesai', '0', '2024-03-14 13:58:01', '2024-05-14 09:54:40'),
(42, 42, 12, 'Hari 1', '21:24:32', '2024-03-15', '14:00:00', '15:00:00', 'Expired', '0', '2024-03-14 14:19:32', '2024-05-14 06:47:15'),
(43, 43, 13, 'Hari 1', '14:35:08', '2024-03-15', '15:00:00', '16:00:00', 'Selesai', '0', '2024-03-15 07:30:08', '2024-05-14 09:52:04'),
(44, 44, 12, 'Hari 1', '13:16:47', '2024-05-02', '15:00:00', '17:00:00', 'Expired', '0', '2024-04-30 06:11:47', '2024-04-30 06:17:06'),
(45, 45, 12, 'Hari 1', '13:27:37', '2024-05-02', '15:00:00', '17:00:00', 'Expired', '0', '2024-04-30 06:22:37', '2024-04-30 06:28:04'),
(46, 46, 12, 'Hari 1', '13:30:58', '2024-05-03', '15:00:00', '17:00:00', 'Expired', '0', '2024-04-30 06:25:58', '2024-04-30 06:31:02'),
(47, 47, 12, 'Hari 1', '13:35:27', '2024-05-04', '15:00:00', '17:00:00', 'Selesai', '0', '2024-04-30 06:30:27', '2024-05-14 10:01:12'),
(48, 48, 12, 'Hari 1', '13:37:44', '2024-05-05', '08:00:00', '09:00:00', 'Selesai', '0', '2024-04-30 06:32:44', '2024-05-14 10:01:18'),
(49, 49, 12, 'Hari 1', '22:51:14', '2024-05-31', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-05 15:46:14', '2024-05-14 06:47:23'),
(50, 50, 13, 'Hari 1', '22:52:41', '2024-05-30', '08:00:00', '09:00:00', 'Aktif', '1', '2024-05-05 15:47:41', '2024-05-05 15:48:46'),
(51, 51, 13, 'Hari 1', '10:35:56', '2024-05-22', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:34:56', '2024-05-06 03:36:02'),
(52, 52, 12, 'Hari 1', '10:38:46', '2024-05-26', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:37:46', '2024-05-06 03:39:04'),
(53, 53, 5, 'Hari 1', '10:45:35', '2024-05-26', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:40:35', '2024-05-06 03:46:02'),
(54, 54, 5, 'Hari 1', '10:47:26', '2024-05-28', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:42:26', '2024-05-06 03:48:05'),
(55, 55, 5, 'Hari 1', '10:51:48', '2024-05-24', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:46:48', '2024-05-06 03:52:03'),
(56, 56, 5, 'Hari 1', '10:49:19', '2024-05-23', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:48:19', '2024-05-06 03:50:04'),
(57, 57, 5, 'Hari 1', '10:55:48', '2024-05-18', '08:00:00', '09:00:00', 'Expired', '0', '2024-05-06 03:52:48', '2024-05-06 03:56:02'),
(58, 58, 5, 'Hari 1', '18:48:11', '2024-05-28', '08:00:00', '12:00:00', 'Expired', '0', '2024-05-13 11:45:11', '2024-05-13 11:45:11'),
(59, 59, 5, 'Hari 1', '18:50:17', '2024-05-28', '15:00:00', '16:00:00', 'Expired', '0', '2024-05-13 11:47:17', '2024-05-14 06:44:21'),
(60, 60, 5, 'Hari 1', '12:38:13', '2024-05-29', '08:00:00', '10:00:00', 'Expired', '0', '2024-05-14 05:35:13', '2024-05-14 05:39:02'),
(61, 61, 5, 'Hari 1', '10:27:46', '2024-05-16', '08:00:00', '12:00:00', 'Selesai', '0', '2024-05-15 03:24:46', '2024-05-16 05:00:02'),
(62, 62, 5, 'Hari 1', '13:09:50', '2024-05-16', '18:00:00', '21:00:00', 'Selesai', '0', '2024-05-15 06:06:50', '2024-05-16 14:00:02'),
(63, 63, 5, 'Hari 1', '18:24:39', '2024-05-17', '10:00:00', '12:00:00', 'Selesai', '0', '2024-05-15 11:21:39', '2024-05-17 05:00:02'),
(64, 64, 5, 'Hari 1', '18:26:57', '2024-05-15', '20:00:00', '21:00:00', 'Selesai', '0', '2024-05-15 11:23:57', '2024-05-15 14:00:02'),
(65, 65, 5, 'Hari 1', '18:49:08', '2024-05-15', '19:00:00', '22:00:00', 'Expired', '0', '2024-05-15 11:46:08', '2024-05-15 11:50:02'),
(66, 66, 5, 'Hari 1', '19:08:50', '2024-05-16', '12:00:00', '13:00:00', 'Selesai', '0', '2024-05-15 12:05:50', '2024-05-16 06:00:02'),
(67, 67, 5, 'Hari 1', '19:14:56', '2024-05-16', '17:00:00', '18:00:00', 'Selesai', '0', '2024-05-15 12:11:56', '2024-05-16 11:00:02'),
(68, 68, 13, 'Hari 1', '15:04:33', '2024-05-17', '16:00:00', '18:00:00', 'Selesai', '0', '2024-05-17 08:01:34', '2024-05-17 11:00:02'),
(69, 69, 12, 'Hari 1', '17:22:33', '2024-05-17', '18:00:00', '23:00:00', 'Selesai', '0', '2024-05-17 10:19:33', '2024-05-17 16:00:02'),
(70, 70, 11, 'Hari 1', '20:11:05', '2024-05-18', '10:00:00', '12:00:00', 'Aktif', '1', '2024-05-17 13:08:05', '2024-05-17 13:08:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pb`
--

CREATE TABLE `data_pb` (
  `id_pb` bigint(11) NOT NULL,
  `nama_pb` varchar(255) NOT NULL,
  `nama_ketua` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pb`
--

INSERT INTO `data_pb` (`id_pb`, `nama_pb`, `nama_ketua`, `created_at`, `updated_at`) VALUES
(1, 'PB Parkit', 'Bu Lis', '2022-07-31 14:57:00', '2022-07-31 14:57:00'),
(2, 'PB Brantas', 'Pak Lukman', '2022-07-31 14:58:04', '2022-07-31 14:58:04'),
(3, 'PB Mbahkung', 'Pak Gede', '2022-07-31 14:58:45', '2022-07-31 14:58:45'),
(4, 'PB Porgu', 'Pak Laji', '2022-07-31 14:59:10', '2022-07-31 14:59:10'),
(5, 'PB RSUD Pelem', 'Pak Arif', '2022-07-31 14:59:39', '2022-07-31 14:59:39'),
(6, 'PB Pondok', 'Pak Ari', '2022-07-31 15:00:19', '2022-07-31 15:00:19'),
(7, 'PB Surya Birawa', 'Mas Reza', '2022-07-31 15:01:02', '2022-07-31 15:01:02'),
(8, 'PB Inti Komputer', 'Pak Tri', '2022-07-31 15:01:30', '2022-07-31 15:01:30'),
(9, 'PB Proton', 'Pak Sis', '2022-07-31 15:01:55', '2022-07-31 15:01:55'),
(13, 'PB Karang Taruna', 'Mas Imam', '2022-08-21 09:38:35', '2022-08-21 09:38:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sewa`
--

CREATE TABLE `data_sewa` (
  `id_sewa` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `lap_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_payment` bigint(20) UNSIGNED DEFAULT NULL,
  `namapb` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `bukti_tf` varchar(255) DEFAULT NULL,
  `dp` int(11) DEFAULT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_sewa`
--

INSERT INTO `data_sewa` (`id_sewa`, `id_user`, `lap_id`, `id_payment`, `namapb`, `tanggal`, `tempo`, `keterangan`, `total`, `bukti_tf`, `dp`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, 25, 5, 2, 'Nyoba Midtrans', '2024-03-11', '19:30:14', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:20:14', '2024-05-14 06:40:38'),
(2, 25, 5, 1, 'Nyoba midtrans 2', '2024-03-11', '19:30:53', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:20:53', '2024-05-14 06:28:28'),
(3, 25, 5, 2, 'hallo', '2024-03-11', '19:32:08', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:22:08', '2024-05-14 06:42:14'),
(4, 25, 5, 2, 'hallo', '2024-03-11', '19:33:12', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:23:12', '2024-05-14 06:44:49'),
(5, 25, 5, 1, 'Polinema', '2024-03-11', '19:33:44', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:23:44', '2024-05-14 06:35:06'),
(6, 25, 5, 1, 'kjlkjlkjasd', '2024-03-11', '19:34:01', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:24:01', '2024-05-14 06:44:56'),
(7, 25, 5, 1, 'kjlkjlkjasd', '2024-03-11', '19:34:14', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:24:14', '2024-05-14 06:45:05'),
(8, 25, 5, 1, 'kjlkjlkjasd', '2024-03-11', '19:34:25', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:24:25', '2024-05-14 06:45:11'),
(9, 25, 5, 1, 'kjlkjlkjasd', '2024-03-11', '19:36:42', 'Expired', 35000, 'Belum di Bayar', NULL, '1dfc2935-29ab-4238-9436-4bcdfb7d9d30', '2024-03-11 12:26:42', '2024-05-14 06:45:17'),
(10, 25, 11, 1, 'kjjklhljj', '2024-03-11', '20:00:27', 'Expired', 35000, 'Belum di Bayar', NULL, NULL, '2024-03-11 12:50:27', '2024-05-14 06:45:23'),
(11, 25, 11, 1, 'kjjklhljj', '2024-03-11', '20:00:59', 'Expired', 35000, 'Belum di Bayar', NULL, '87f50117-7653-4af0-b29c-534038a35314', '2024-03-11 12:50:59', '2024-05-14 06:45:29'),
(12, 25, 11, 1, 'nyoba midtrans nih', '2024-03-11', '20:44:56', 'Expired', 35, 'Belum di Bayar', NULL, NULL, '2024-03-11 13:34:56', '2024-05-14 06:45:35'),
(13, 25, 11, 1, 'nyoba midtrans nih2', '2024-03-11', '20:45:16', 'Expired', 35, 'Belum di Bayar', NULL, NULL, '2024-03-11 13:35:16', '2024-05-14 06:45:40'),
(14, 25, 11, 1, 'nyoba midtrans nih3', '2024-03-11', '20:45:31', 'Expired', 35, 'Belum di Bayar', NULL, '8304e529-d2ce-4b87-b298-5474f85dde6e', '2024-03-11 13:35:31', '2024-05-14 06:45:46'),
(15, 25, 5, 1, 'nyoba neh', '2024-03-11', '20:47:50', 'Expired', 35, 'Belum di Bayar', NULL, '0c4823ec-fc70-45c5-b758-67e7ff29eadb', '2024-03-11 13:37:50', '2024-05-14 06:45:51'),
(16, 25, 11, 1, 'haduuuhh', '2024-03-11', '21:01:14', 'Expired', 5, 'Belum di Bayar', NULL, '5d831f32-2a50-44bf-9f65-8e2b18de6a1b', '2024-03-11 13:51:14', '2024-05-14 06:45:56'),
(17, 25, 11, 1, 'pehh pehh', '2024-03-11', '21:03:37', 'Expired', 5, 'Belum di Bayar', NULL, '95e92ca4-b5a4-4a7f-95a5-81c242ca2ea8', '2024-03-11 13:53:37', '2024-05-14 06:46:01'),
(18, 25, 12, 1, 'kjkhkjhkuh', '2024-03-11', '21:12:19', 'Expired', 5, 'Belum di Bayar', NULL, 'd88b3e73-c967-4aed-8a51-93eee4f2ff36', '2024-03-11 14:02:19', '2024-05-14 06:46:08'),
(19, 25, 12, 1, 'peh haduh', '2024-03-11', '21:18:59', 'Expired', 5, 'Belum di Bayar', NULL, '010dda51-7425-4541-8565-746ddfd426f4', '2024-03-11 14:08:59', '2024-05-14 06:46:13'),
(20, 25, 12, 1, 'sdfsdfsdf', '2024-03-11', '21:21:53', 'Expired', 5, 'Belum di Bayar', NULL, 'af7b060f-a1b9-4849-a368-76f3b7c30396', '2024-03-11 14:11:53', '2024-05-14 06:46:19'),
(21, 25, 13, 1, 'hallloooo peh', '2024-03-11', '21:25:30', 'Expired', 5, 'Belum di Bayar', NULL, '76e045a3-fbd8-4844-8234-c5bd814a0d44', '2024-03-11 14:15:30', '2024-05-14 06:46:25'),
(22, 25, 13, 1, 'nyoba neh iki', '2024-03-11', '22:09:47', 'Expired', 5, 'Belum di Bayar', NULL, NULL, '2024-03-11 14:59:47', '2024-05-14 06:46:30'),
(23, 25, 13, 1, 'nyoba neh iki', '2024-03-11', '22:10:07', 'Expired', 5, 'Belum di Bayar', NULL, 'c83a3466-7af8-4ba3-907d-a5b1e837210d', '2024-03-11 15:00:07', '2024-05-14 06:46:35'),
(24, 25, 13, 1, 'kllklk;lkads', '2024-03-11', '22:32:57', 'Expired', 5, 'Belum di Bayar', NULL, '14f38bf9-892d-4156-9a52-7b9778cd0e28', '2024-03-11 15:22:57', '2024-05-14 06:46:40'),
(25, 25, 13, 2, 'bismillah', '2024-03-11', '22:40:35', 'Expired', 5, 'Belum di Bayar', NULL, 'e4e6c6f5-f098-4837-9a97-56aadd1f96bc', '2024-03-11 15:30:35', '2024-05-14 06:46:45'),
(26, 25, 13, 1, 'peh peh', '2024-03-11', '22:45:20', 'Expired', 5, 'Belum di Bayar', NULL, NULL, '2024-03-11 15:35:20', '2024-05-14 06:46:51'),
(27, 25, 13, 1, 'peh peh', '2024-03-11', '22:45:37', 'Expired', 5, 'Belum di Bayar', NULL, NULL, '2024-03-11 15:35:37', '2024-05-14 06:46:56'),
(28, 25, 13, 1, 'peh peh', '2024-03-11', '22:45:51', 'Expired', 5, 'Belum di Bayar', NULL, NULL, '2024-03-11 15:35:51', '2024-05-14 06:47:02'),
(29, 25, 13, 1, 'peh peh', '2024-03-11', '22:46:07', 'Expired', 5, 'Belum di Bayar', NULL, 'c3570528-4072-427c-b36f-4a8222419da1', '2024-03-11 15:36:07', '2024-03-11 15:36:42'),
(30, 25, 13, 1, 'Bismillah iki Clear', '2024-03-11', '23:01:33', 'Clear', 5, 'Terbayar', NULL, '41c51f56-3f19-437a-98ad-eca25642ecf5', '2024-03-11 15:51:33', '2024-03-11 15:52:04'),
(31, 25, 12, 1, 'Nyoba dp 1', '2024-03-12', '15:20:04', 'Di Batalkan Pelanggan', 5, 'Belum di Bayar', 1, NULL, '2024-03-12 08:10:05', '2024-03-12 13:56:07'),
(32, 25, 12, 1, 'Nyoba dp 1', '2024-03-12', '15:20:24', 'Di Batalkan Admin', 5, 'Belum di Bayar', 1, NULL, '2024-03-12 08:10:24', '2024-03-12 13:55:27'),
(33, 25, 12, 1, 'Nyoba dp 1', '2024-03-12', '15:20:39', 'Clear', 5, 'Terbayar', 1, '71831a21-f05c-42d4-9941-5e76c6579092', '2024-03-12 08:10:39', '2024-03-12 08:11:41'),
(34, 25, 12, 2, 'Nyoba tanpa DP', '2024-03-12', '15:24:49', 'Clear', 5, 'Terbayar', 0, 'c25c09b9-490f-4410-97d6-a8e1adb8c38f', '2024-03-12 08:14:49', '2024-03-12 08:15:47'),
(35, 25, 11, 2, 'Nyoba tanggal lunas', '2024-03-12', '21:50:37', 'Clear', 5, 'Terbayar', 0, '3bc52850-f507-4500-90f2-b5ce0c8f349a', '2024-03-12 14:40:37', '2024-03-12 14:41:23'),
(36, 25, 13, 1, 'nyoba tanggal dp', '2024-03-12', '21:53:03', 'Clear', 5, 'Terbayar', 1, 'e148c2d3-a212-45b3-8257-66b1d48a1fbe', '2024-03-12 14:43:03', '2024-03-12 14:43:24'),
(37, 25, 13, 2, 'Nyoba Command', '2024-03-13', '14:05:23', 'Clear', 5, 'Terbayar', 0, '20bfd201-aa44-4c53-aff9-a3d68e89186c', '2024-03-13 06:55:23', '2024-03-13 06:56:03'),
(38, 25, 13, 1, 'Nyoba Command 2', '2024-03-13', '14:06:56', 'Expired', 5, 'Belum di Bayar', 1, 'c956dcde-33f2-4da3-90b1-5190e9182a7c', '2024-03-13 06:56:56', '2024-03-13 07:07:01'),
(39, 25, 12, 2, 'Nyoba cek jadwal', '2024-03-13', '16:31:31', 'Expired', 20, 'Belum di Bayar', 0, '18714cae-d5a1-47c7-b3bb-f634cdc0b1b8', '2024-03-13 09:21:31', '2024-03-13 09:32:00'),
(40, 25, 11, 1, 'Nyoba pesan berhasil', '2024-03-14', '21:01:14', 'Clear', 5, 'Terbayar', 1, '2ec722b3-0329-4d0a-9f61-c42a441030f3', '2024-03-14 13:56:14', '2024-03-14 13:56:49'),
(41, 25, 11, 1, 'nyoba lagi', '2024-03-14', '21:03:01', 'Clear', 5, 'Terbayar', 1, '9005c078-83ff-438a-b69d-9052edb639a7', '2024-03-14 13:58:01', '2024-03-14 13:58:36'),
(42, 25, 12, 1, 'nyoba dp', '2024-03-14', '21:24:32', 'Expired', 5, 'Belum di Bayar', 3, NULL, '2024-03-14 14:19:32', '2024-05-14 06:47:15'),
(43, 25, 13, 1, 'Nyoba button', '2024-03-15', '14:35:08', 'Clear', 5, 'Terbayar', 1, 'b90959f9-9141-4eef-bbf7-9e31c2c463de', '2024-03-15 07:30:08', '2024-03-15 07:32:24'),
(44, 25, 12, 1, 'nyoba info', '2024-04-30', '13:16:47', 'Expired', 15, 'Belum di Bayar', 3, 'f2a094b0-3361-44c9-8424-1a230b05748e', '2024-04-30 06:11:47', '2024-04-30 06:17:01'),
(45, 25, 12, 1, 'Nyoba info lagi', '2024-04-30', '13:27:37', 'Expired', 15, 'Belum di Bayar', 3, '0838d725-5470-4096-8c61-e20e211dd56b', '2024-04-30 06:22:37', '2024-04-30 06:28:02'),
(46, 25, 12, 1, 'Nyoba info 3', '2024-04-30', '13:30:58', 'Expired', 15, 'Belum di Bayar', 3, 'ef68e425-5ab4-4c3d-b28a-62c6679c5073', '2024-04-30 06:25:58', '2024-04-30 06:31:00'),
(47, 25, 12, 1, 'Nyoba info 4', '2024-04-30', '13:35:27', 'Clear', 15, 'Terbayar', 3, '36404c20-246b-46f0-8dd1-bccaa796bc27', '2024-04-30 06:30:27', '2024-04-30 06:30:53'),
(48, 25, 12, 2, 'Nyoba lgi', '2024-04-30', '13:37:44', 'Clear', 5, 'Terbayar', 0, '8cf2882f-d5d3-40c1-96b8-e5e2ad2c9370', '2024-04-30 06:32:44', '2024-04-30 06:33:11'),
(49, 25, 12, 2, 'testing 1', '2024-05-05', '22:51:14', 'Expired', 5, 'Belum di Bayar', 0, '264c6561-5e0b-4d22-848a-6c80d6c1947c', '2024-05-05 15:46:14', '2024-05-14 06:47:23'),
(50, 27, 13, 2, 'testing 2', '2024-05-05', '22:52:41', 'Clear', 10, 'Terbayar', 0, '9ca39210-4025-4189-90e3-8c08c9456847', '2024-05-05 15:47:41', '2024-05-05 15:48:46'),
(51, 25, 13, 1, 'testing', '2024-05-06', '10:35:56', 'Expired', 5, 'Belum di Bayar', 1, 'e019f6ae-c9f0-4b29-a926-93f1ffb419c8', '2024-05-06 03:34:56', '2024-05-06 03:36:00'),
(52, 25, 12, 1, 'testing 4', '2024-05-06', '10:38:46', 'Expired', 5, 'Belum di Bayar', 1, '6af7db80-8297-44a5-be16-e33b240b1f04', '2024-05-06 03:37:46', '2024-05-06 03:39:01'),
(53, 27, 5, 2, 'testing 4', '2024-05-06', '10:45:35', 'Expired', 10, 'Belum di Bayar', 0, '136417d7-da6e-4c37-a0b7-8d1032ea4691', '2024-05-06 03:40:35', '2024-05-06 03:46:01'),
(54, 27, 5, 1, 'testing 5', '2024-05-06', '10:47:26', 'Expired', 10, 'Belum di Bayar', 2, '3c29e81d-8423-4609-b281-d7967a2fe4bb', '2024-05-06 03:42:26', '2024-05-06 03:48:02'),
(55, 29, 5, 2, 'tes', '2024-05-06', '10:51:48', 'Expired', 10, 'Belum di Bayar', 0, '5fdc71c6-1791-4296-9de3-a7f25fb4d04f', '2024-05-06 03:46:48', '2024-05-06 03:52:01'),
(56, 29, 5, 2, 'tes', '2024-05-06', '10:49:19', 'Expired', 10, 'Belum di Bayar', 0, 'c3a05e5c-febc-4deb-9c4f-0ddc4ad3bf8f', '2024-05-06 03:48:19', '2024-05-06 03:50:01'),
(57, 27, 5, 2, 'ts', '2024-05-06', '10:55:48', 'Expired', 10, 'Belum di Bayar', 0, 'f701faa8-c05e-4158-a9a3-a08e3e3b92a3', '2024-05-06 03:52:48', '2024-05-06 03:56:00'),
(58, 25, 5, 1, 'PSDKU', '2024-05-13', '18:48:11', 'Expired', 5, 'Belum di Bayar', 0, 'b2ffa4f6-acfc-44f0-afe2-5c1fcecbccea', '2024-05-13 11:45:11', '2024-05-13 11:45:12'),
(59, 25, 5, 1, 'PB Kediri', '2024-05-13', '18:50:17', 'Expired', 5, 'Belum di Bayar', 1, '568fc72f-5358-40b4-84f6-eb82a77f11c8', '2024-05-13 11:47:17', '2024-05-14 06:44:21'),
(60, 27, 5, 2, 'Nyoba jadwal', '2024-05-14', '12:38:13', 'Expired', 20, 'Belum di Bayar', 0, '79a2c5f9-cbdc-4acf-9db4-df6774ef0678', '2024-05-14 05:35:13', '2024-05-14 05:39:01'),
(61, 25, 5, 2, 'PSDKU Kediri', '2024-05-15', '10:27:46', 'Clear', 20, 'Terbayar', 0, '4145ca9e-1504-4253-a1d5-cdd9828d0e1b', '2024-05-15 03:24:46', '2024-05-15 03:26:00'),
(62, 25, 5, 2, 'PB Pare', '2024-05-15', '13:09:50', 'Clear', 30, 'Terbayar', 0, '71145d9a-8c74-44a8-8988-cf3523542696', '2024-05-15 06:06:50', '2024-05-15 06:07:55'),
(63, 31, 5, 2, 'PB Hide', '2024-05-15', '18:24:39', 'Clear', 20, 'Terbayar', 0, '11f77765-4be7-437c-8b8a-ccfb5c392b3e', '2024-05-15 11:21:39', '2024-05-15 11:22:04'),
(64, 31, 5, 2, 'PB Hide', '2024-05-15', '18:26:57', 'Clear', 15, 'Terbayar', 0, '56c9945c-f1b1-4d8b-881c-e68ea3c2c940', '2024-05-15 11:23:57', '2024-05-15 11:24:54'),
(65, 31, 5, 1, 'PB Hide', '2024-05-15', '18:49:08', 'Expired', 45, 'Belum di Bayar', 9, '34a7570e-f164-4414-9897-f70cedfd37bc', '2024-05-15 11:46:08', '2024-05-15 11:50:01'),
(66, 31, 5, 2, 'PB Hide', '2024-05-15', '19:08:50', 'Clear', 10, 'Terbayar', 0, '27427cbd-2355-474d-a8c8-4c5dcd6856a1', '2024-05-15 12:05:50', '2024-05-15 12:06:20'),
(67, 31, 5, 2, 'PB Hide', '2024-05-15', '19:14:56', 'Clear', 15, 'Terbayar', 0, '1276df4c-ea9c-4114-9feb-c5157586560b', '2024-05-15 12:11:56', '2024-05-15 12:12:16'),
(68, 31, 13, 2, 'PB Nusantara', '2024-05-17', '15:04:33', 'Clear', 30, 'Terbayar', 0, '4e00cf2f-4b80-419e-8a5b-b0219c300e12', '2024-05-17 08:01:34', '2024-05-17 08:02:10'),
(69, 25, 12, 2, 'PB Garuda', '2024-05-17', '17:22:33', 'Clear', 50, 'Terbayar', 0, '22052ae7-82a4-4584-9e24-21df8895fad2', '2024-05-17 10:19:33', '2024-05-17 10:19:52'),
(70, 25, 11, 2, 'PB Gajayana', '2024-05-17', '20:11:05', 'Clear', 10, 'Terbayar', 0, '9964b54d-f873-4ff3-869e-3a6492e6b2c4', '2024-05-17 13:08:05', '2024-05-17 13:08:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskons`
--

CREATE TABLE `diskons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_diskon` varchar(255) DEFAULT NULL,
  `hargadiskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskons`
--

INSERT INTO `diskons` (`id`, `nama_diskon`, `hargadiskon`, `created_at`, `updated_at`) VALUES
(1, 'Member / Pelajar', 5, '2024-02-29 04:53:36', '2024-02-29 04:53:36');

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
-- Struktur dari tabel `image_lapangan`
--

CREATE TABLE `image_lapangan` (
  `id_image` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_lapangan`
--

INSERT INTO `image_lapangan` (`id_image`, `lapangan_id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(2, 5, 'a034fb9dde1b90a0a6e465b3b1abfd61', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\bulutangkis/public/image\\a034fb9dde1b90a0a6e465b3b1abfd61', NULL, NULL),
(3, 5, 'a034fb9dde1b90a0a6e465b3b1abfd61', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\bulutangkis/public/image\\a034fb9dde1b90a0a6e465b3b1abfd61', NULL, NULL),
(4, 5, 'f04215fd528fc2fe0b1cf4eefdaabac5', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\bulutangkis/public/image\\f04215fd528fc2fe0b1cf4eefdaabac5', NULL, NULL),
(5, 5, 'd09e0f7f04811a267bc40c922afa57a9', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\bulutangkis/public/image\\d09e0f7f04811a267bc40c922afa57a9', NULL, NULL),
(6, 5, 'e85b22486a1375cd0f2523e027370889', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\bulutangkis/public/image\\e85b22486a1375cd0f2523e027370889', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `lapangan_id`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`) VALUES
(27, 5, '08:00:00', '09:00:00', '2022-07-31 16:25:30', '2022-07-31 16:25:30'),
(28, 5, '09:00:00', '10:00:00', '2022-08-01 00:32:04', '2022-08-01 00:32:04'),
(29, 5, '10:00:00', '11:00:00', '2022-08-01 00:32:16', '2022-08-01 00:32:16'),
(30, 5, '11:00:00', '12:00:00', '2022-08-01 00:32:28', '2022-08-01 00:32:28'),
(31, 5, '12:00:00', '13:00:00', '2022-08-01 07:38:46', '2022-08-01 07:38:46'),
(32, 5, '13:00:00', '14:00:00', '2022-08-01 07:38:57', '2022-08-01 07:38:57'),
(33, 5, '14:00:00', '15:00:00', '2022-08-01 07:39:10', '2022-08-01 07:39:10'),
(34, 5, '15:00:00', '16:00:00', '2022-08-01 07:39:21', '2022-08-01 07:39:21'),
(35, 5, '16:00:00', '17:00:00', '2022-08-01 07:39:36', '2022-08-01 07:39:36'),
(36, 5, '17:00:00', '18:00:00', '2022-08-01 07:39:50', '2022-08-01 07:39:50'),
(37, 5, '18:00:00', '19:00:00', '2022-08-01 07:40:02', '2022-08-01 07:40:02'),
(38, 5, '19:00:00', '20:00:00', '2022-08-01 07:40:15', '2022-08-01 07:40:15'),
(39, 5, '20:00:00', '21:00:00', '2022-08-01 07:40:27', '2022-08-01 07:40:27'),
(40, 5, '21:00:00', '22:00:00', '2022-08-01 07:40:47', '2022-08-01 07:40:47'),
(41, 5, '22:00:00', '23:00:00', '2022-08-01 07:40:59', '2022-08-01 07:40:59'),
(49, 11, '08:00:00', '09:00:00', '2024-03-02 17:14:06', '2024-03-02 17:14:06'),
(50, 11, '09:00:00', '10:00:00', '2024-03-02 17:14:15', '2024-03-02 17:14:15'),
(51, 11, '10:00:00', '11:00:00', '2024-03-02 17:14:25', '2024-03-02 17:14:25'),
(52, 11, '11:00:00', '12:00:00', '2024-03-02 17:14:47', '2024-03-02 17:14:47'),
(53, 11, '12:00:00', '13:00:00', '2024-03-02 17:14:55', '2024-03-02 17:14:55'),
(54, 11, '13:00:00', '14:00:00', '2024-03-02 17:15:03', '2024-03-02 17:15:03'),
(55, 11, '14:00:00', '15:00:00', '2024-03-02 17:15:11', '2024-03-02 17:15:11'),
(56, 11, '15:00:00', '16:00:00', '2024-03-02 17:15:22', '2024-03-02 17:15:22'),
(57, 11, '16:00:00', '17:00:00', '2024-03-02 17:15:31', '2024-03-02 17:15:31'),
(58, 11, '17:00:00', '18:00:00', '2024-03-02 17:15:39', '2024-03-02 17:15:39'),
(59, 11, '18:00:00', '19:00:00', '2024-03-02 17:15:46', '2024-03-02 17:15:46'),
(60, 11, '19:00:00', '20:00:00', '2024-03-02 17:15:57', '2024-03-02 17:15:57'),
(61, 11, '20:00:00', '21:00:00', '2024-03-02 17:16:04', '2024-03-02 17:16:04'),
(62, 11, '21:00:00', '22:00:00', '2024-03-02 17:16:17', '2024-03-02 17:16:17'),
(63, 11, '22:00:00', '23:00:00', '2024-03-02 17:16:28', '2024-03-02 17:16:28'),
(64, 12, '08:00:00', '09:00:00', '2024-03-02 17:17:14', '2024-03-02 17:17:14'),
(65, 12, '09:00:00', '10:00:00', '2024-03-02 17:17:53', '2024-03-02 17:17:53'),
(66, 12, '10:00:00', '11:00:00', '2024-03-02 17:18:01', '2024-03-02 17:18:01'),
(67, 12, '11:00:00', '12:00:00', '2024-03-02 17:18:08', '2024-03-02 17:18:08'),
(68, 12, '12:00:00', '13:00:00', '2024-03-02 17:18:16', '2024-03-02 17:18:16'),
(69, 12, '13:00:00', '14:00:00', '2024-03-02 17:18:25', '2024-03-02 17:18:25'),
(70, 12, '14:00:00', '15:00:00', '2024-03-02 17:18:33', '2024-03-02 17:18:33'),
(71, 12, '15:00:00', '16:00:00', '2024-03-02 17:18:45', '2024-03-02 17:18:45'),
(72, 12, '16:00:00', '17:00:00', '2024-03-02 17:18:52', '2024-03-02 17:18:52'),
(73, 12, '17:00:00', '18:00:00', '2024-03-02 17:18:59', '2024-03-02 17:18:59'),
(74, 12, '18:00:00', '19:00:00', '2024-03-02 17:19:05', '2024-03-02 17:19:05'),
(75, 12, '19:00:00', '20:00:00', '2024-03-02 17:19:35', '2024-03-02 17:19:35'),
(76, 12, '20:00:00', '21:00:00', '2024-03-02 17:19:48', '2024-03-02 17:19:48'),
(77, 12, '21:00:00', '22:00:00', '2024-03-02 17:19:57', '2024-03-02 17:19:57'),
(78, 12, '22:00:00', '23:00:00', '2024-03-02 17:20:04', '2024-03-02 17:20:04'),
(79, 13, '08:00:00', '09:00:00', '2024-03-02 17:20:39', '2024-03-02 17:20:39'),
(80, 13, '09:00:00', '10:00:00', '2024-03-02 17:21:00', '2024-03-02 17:21:00'),
(81, 13, '10:00:00', '11:00:00', '2024-03-02 17:21:07', '2024-03-02 17:21:07'),
(82, 13, '11:00:00', '12:00:00', '2024-03-02 17:21:15', '2024-03-02 17:21:15'),
(83, 13, '12:00:00', '13:00:00', '2024-03-02 17:21:20', '2024-03-02 17:21:20'),
(84, 13, '13:00:00', '14:00:00', '2024-03-02 17:21:27', '2024-03-02 17:21:27'),
(85, 13, '14:00:00', '15:00:00', '2024-03-02 17:21:34', '2024-03-02 17:21:34'),
(86, 13, '15:00:00', '16:00:00', '2024-03-02 17:21:47', '2024-03-02 17:21:47'),
(87, 13, '16:00:00', '17:00:00', '2024-03-02 17:21:55', '2024-03-02 17:21:55'),
(88, 13, '17:00:00', '18:00:00', '2024-03-02 17:22:05', '2024-03-02 17:22:05'),
(89, 13, '18:00:00', '19:00:00', '2024-03-02 17:22:13', '2024-03-02 17:22:13'),
(90, 13, '19:00:00', '20:00:00', '2024-03-02 17:22:19', '2024-03-02 17:22:19'),
(91, 13, '20:00:00', '21:00:00', '2024-03-02 17:22:19', '2024-03-02 17:22:19'),
(92, 13, '21:00:00', '22:00:00', '2024-03-02 17:22:26', '2024-03-02 17:22:26'),
(93, 13, '22:00:00', '23:00:00', '2024-03-02 17:23:16', '2024-03-02 17:23:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lapangan`
--

CREATE TABLE `jenis_lapangan` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_lapangan`
--

INSERT INTO `jenis_lapangan` (`id_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Lantai Vinyl', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `notlp` varchar(255) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `bagian`, `alamat`, `notlp`, `ktp`, `created_at`, `updated_at`) VALUES
(1, 'Rian Nura', 'Administrasi', 'Bendo', '084455366232', '62cccd2c39b05stock-vector-ktp-indonesia-id-card-1628461459.jpg', '2022-07-11 03:05:45', '2022-07-11 03:05:45'),
(3, 'Rian Nura A.S', 'Administrasi', 'Pare', '082244665789', '62cc307dbfa2dstock-vector-ktp-indonesia-id-card-1628461459.jpg', '2022-07-11 07:15:25', '2022-07-11 07:15:25'),
(4, 'Bagas Adi Nugroho', 'Administrasi', 'Mojokerto', '085577623893', '62d744894cac7stock-vector-ktp-indonesia-id-card-1628461459.jpg', '2022-07-19 23:55:53', '2022-07-19 23:55:53');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_05_114007_create_diskons_table', 1),
(6, '2022_07_05_114123_create_jenis_lapangans_table', 1),
(7, '2022_07_05_114231_create_nama_lapangans_table', 1),
(8, '2022_07_05_114305_create_payments_table', 1),
(9, '2022_07_05_115805_create_jams_table', 1),
(10, '2022_07_05_123915_create_data_sewas_table', 1),
(11, '2022_07_05_124048_create_image_lapangans_table', 1),
(12, '2022_07_05_124327_create_pembayarans_table', 1),
(13, '2022_07_05_124422_create_peralatans_table', 1),
(14, '2022_07_05_124455_create_profils_table', 1),
(15, '2022_07_05_124628_create_karyawans_table', 1),
(16, '2022_07_05_133607_create_datausers_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_lapangan`
--

CREATE TABLE `nama_lapangan` (
  `id_lapangan` bigint(20) UNSIGNED NOT NULL,
  `nama_lap` varchar(255) DEFAULT NULL,
  `jenis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `harga_pagi` int(11) DEFAULT NULL,
  `harga_malam` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `det_lapangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nama_lapangan`
--

INSERT INTO `nama_lapangan` (`id_lapangan`, `nama_lap`, `jenis_id`, `harga_pagi`, `harga_malam`, `gambar`, `kegiatan`, `det_lapangan`, `created_at`, `updated_at`) VALUES
(5, 'Lapangan Bulutangkis', 1, 10, 15, '6642fac6d567clap 1.jpg', 'Bulutangkis', 'Penerangan Bagus, Lapangan Bagus, Ukuran Memenuhi Standart', NULL, NULL),
(11, 'Lapangan Bulutangkis 2', 1, 10, 15, '6642fad06a67elap 2.jpg', 'Bulutangkis', 'Lapangan Standard Nasional', NULL, NULL),
(12, 'Lapangan Bulutangkis 3', 1, 10, 15, '6642fadd52c97lap 3.jpeg', 'Bulutangkis', 'Lapangan Standard Nasional', NULL, NULL),
(13, 'Lapangan Bulutangkis 4', 1, 10, 15, '6642fae5aa66clap 4.jpg', 'Bulutangkis', 'Lapangan Standard Nasional', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` bigint(20) UNSIGNED NOT NULL,
  `metode_payment` varchar(255) DEFAULT NULL,
  `dp` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `metode_payment`, `dp`, `created_at`, `updated_at`) VALUES
(1, 'Bayar di Tempat', 0.20, NULL, '2024-03-14 14:20:42'),
(2, 'Bayar Online', 0.00, NULL, '2024-03-11 04:44:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `sewa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `sewa_id`, `nominal`, `tanggal`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 30, '5.00', '2024-03-11', 'Lunas', '2024-03-11 15:52:04', '2024-03-11 15:52:04'),
(2, 34, '5.00', '2024-03-12', 'Lunas', '2024-03-12 08:15:47', '2024-03-12 08:15:47'),
(3, 33, '5', '2024-03-12', 'Lunas', '2024-03-12 14:11:25', '2024-03-12 14:11:25'),
(4, 35, '5.00', '2024-03-12', 'Lunas', '2024-03-12 14:41:23', '2024-03-12 14:41:23'),
(5, 36, '5', '2024-03-12', 'Lunas', '2024-03-12 14:44:12', '2024-03-12 14:44:12'),
(6, 37, '5.00', '2024-03-13', 'Lunas', '2024-03-13 06:56:03', '2024-03-13 06:56:03'),
(7, 48, '5.00', '2024-04-30', 'Lunas', '2024-04-30 06:33:11', '2024-04-30 06:33:11'),
(8, 50, '10.00', '2024-05-05', 'Lunas', '2024-05-05 15:48:46', '2024-05-05 15:48:46'),
(9, 47, '15', '2024-05-14', 'Lunas', '2024-05-14 09:06:36', '2024-05-14 09:06:36'),
(10, 43, '5', '2024-05-14', 'Lunas', '2024-05-14 09:06:51', '2024-05-14 09:06:51'),
(11, 41, '5', '2024-05-14', 'Lunas', '2024-05-14 09:06:59', '2024-05-14 09:06:59'),
(12, 40, '5', '2024-05-14', 'Lunas', '2024-05-14 09:07:13', '2024-05-14 09:07:13'),
(13, 61, '20.00', '2024-05-15', 'Lunas', '2024-05-15 03:26:00', '2024-05-15 03:26:00'),
(14, 62, '30.00', '2024-05-15', 'Lunas', '2024-05-15 06:07:55', '2024-05-15 06:07:55'),
(15, 63, '20.00', '2024-05-15', 'Lunas', '2024-05-15 11:22:04', '2024-05-15 11:22:04'),
(16, 64, '15.00', '2024-05-15', 'Lunas', '2024-05-15 11:24:54', '2024-05-15 11:24:54'),
(17, 66, '10.00', '2024-05-15', 'Lunas', '2024-05-15 12:06:20', '2024-05-15 12:06:20'),
(18, 67, '15.00', '2024-05-15', 'Lunas', '2024-05-15 12:12:16', '2024-05-15 12:12:16'),
(19, 68, '30.00', '2024-05-17', 'Lunas', '2024-05-17 08:02:10', '2024-05-17 08:02:10'),
(20, 69, '50.00', '2024-05-17', 'Lunas', '2024-05-17 10:19:52', '2024-05-17 10:19:52'),
(21, 70, '10.00', '2024-05-17', 'Lunas', '2024-05-17 13:08:33', '2024-05-17 13:08:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id`, `nama`, `jumlah`, `tempat`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Sapu', '1', 'Tembok Utara', 'Berwarna Hijau dan Orange', '630200c605fe0WhatsApp Image 2022-07-31 at 22.33.52.jpeg', '2022-08-21 09:54:14', '2022-08-21 09:54:14'),
(2, 'Serok Sampah / Cikrak', '1', 'Dekat Pintu Masuk', 'Berwarna Hijau dan Putih', '630200fc9c886WhatsApp Image 2022-07-31 at 22.33.56.jpeg', '2022-08-21 09:55:08', '2022-08-21 09:55:08'),
(3, 'Pel pelan', '1', 'Luar Ruangan', 'Berwarna Putih', '6302012775eddWhatsApp Image 2022-07-31 at 22.33.50.jpeg', '2022-08-21 09:55:51', '2022-08-21 09:55:51'),
(4, 'Tempat Sampah', '1', 'Dekat Pintu Masuk', 'Berwarna Hijau', '6302014fa684eWhatsApp Image 2022-07-31 at 22.33.55 (1).jpeg', '2022-08-21 09:56:31', '2022-08-21 09:56:31'),
(5, 'Kursi', '15', 'Dalam Ruangan', 'Berbahan Plastik Berwarna Hijau', '630201837651eWhatsApp Image 2022-07-31 at 22.33.55.jpeg', '2022-08-21 09:57:23', '2022-08-21 09:57:23'),
(6, 'Papan Tulis', '1', 'Tembok Utara', 'Berwarna Putih', '630201d6d7954WhatsApp Image 2022-07-31 at 22.33.53 (1).jpeg', '2022-08-21 09:58:46', '2022-08-21 09:58:46'),
(7, 'Kursi Wasit', '1', 'Sebelah Utara Dekat dengan Net', 'Terbuat dari besi berwarna abu - abu', '63020226bdc80WhatsApp Image 2022-07-31 at 22.33.53.jpeg', '2022-08-21 10:00:06', '2022-08-21 10:00:06'),
(8, 'Botol Antiseptik', '1', 'Sebelah selatan di tiang net', 'Berbahan plastik berwarna putih', '63020273d2f04WhatsApp Image 2022-07-31 at 22.33.54 (1).jpeg', '2022-08-21 10:01:23', '2022-08-21 10:01:23'),
(9, 'Meja', '3', 'Didalam dan diluar ruangan', 'Berbahan Kayu Berwarna Coklat', '630202ae6e88cWhatsApp Image 2022-07-31 at 22.33.51.jpeg', '2022-08-21 10:02:22', '2022-08-21 10:02:22'),
(10, 'Meja Besar', '1', 'Sebelah Timur Pojok Ruangan', 'Berbahan kayu berwarna coklat', '630202e28e469WhatsApp Image 2022-07-31 at 22.33.50 (1).jpeg', '2022-08-21 10:03:14', '2022-08-21 10:03:14'),
(11, 'Papan Jadwal', '1', 'Tembok Sebelah Utara', 'Berwarna Putih', '63020336723ebWhatsApp Image 2022-07-31 at 22.33.53 (2).jpeg', '2022-08-21 10:04:38', '2022-08-21 10:04:38');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` bigint(20) UNSIGNED NOT NULL,
  `nama_profil` varchar(255) DEFAULT NULL,
  `jenis_apk` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `no_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_profil`, `jenis_apk`, `lokasi`, `no_profil`, `created_at`, `updated_at`) VALUES
(1, 'GOR Balai Desa Bendo', 'Penyewaan Lapangan Bulutangkis', 'Jl. Soekarno-Hatta 102, Bendo Asari, Bendo, Kec. Pare, Kabupaten Kediri, Jawa Timur 64225, Indonesia', '082244745603', NULL, NULL);

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
  `level` varchar(255) DEFAULT NULL,
  `status_user` varchar(255) DEFAULT NULL,
  `member` int(11) DEFAULT NULL,
  `pengajuan_member` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `status_user`, `member`, `pengajuan_member`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$dZCopQ.gUyY7qnfYYIcA4uQab6a/XRakoYpS4WBZwho9cDsjAN27q', 'Admin', 'Aktif', 0, 0, NULL, '2022-07-08 20:45:37', '2022-07-08 20:45:37'),
(4, 'Ari', 'ari@gmail.com', NULL, '$2y$10$XsHQFRZcC8fv4It.N5VDk.f6TaElJs/eL6Amf7cxskVpYeVT.1UrK', 'Pelanggan', 'Aktif', 0, 0, NULL, '2022-07-10 19:57:12', '2022-07-10 19:57:12'),
(11, 'Rian Nura', 'riannura@gmail.com', NULL, '$2y$10$OdHnGiZCCeQCOkJ4SkkccOEnE303q7VMctv0yxD/PVIu7OQkIwg9W', 'Admin', 'Aktif', 0, 0, NULL, '2022-07-11 06:33:47', '2022-07-11 06:33:47'),
(13, 'Ari Sucipto', 'arisucipto@gmail.com', NULL, '$2y$10$QXIFLFsx0LzCMdEsJgr.lOTha0rKGve5SCa/I.aFUNPV.OQGFHd22', 'Pelanggan', 'Aktif', 0, 0, NULL, '2022-07-11 07:51:35', '2022-07-11 07:51:35'),
(17, 'Dwi Mahendra Putra', 'mahen@gmail.com', NULL, '$2y$10$5fpgeURKZjdMlxEc.Phcku//vUpfDXbuf8y88jXmFZMLfQB73D35O', 'Pelanggan', 'Aktif', 0, 0, NULL, '2022-07-19 01:02:52', '2022-07-19 07:35:56'),
(18, 'TT', 'tt@gmail.com', NULL, '$2y$10$GzQ/I2nCB68vRYdEvHKuoefr3cd9NlK.cy./oHZN906aq7Ze9UNsK', 'Admin', 'Aktif', 0, 0, NULL, '2022-07-19 14:06:20', '2022-07-19 14:06:20'),
(21, 'RN', 'rn@gmail.com', NULL, '$2y$10$YLkPfJQlJOKkSu8bwkByVeW366wvXVjV7IjQuPCWOnPTbuPJxSqVy', 'Admin', 'Aktif', 0, 0, NULL, '2022-08-01 01:41:58', '2022-08-01 01:41:58'),
(22, 'Reza', 'reza@gmail.com', NULL, '$2y$10$OT3Unz/O1DzlDOAjRyonzuz7u59/jBzr2ClvUvD6nZZ09IAqv9dOO', 'Admin', 'Aktif', 0, 0, NULL, '2022-08-01 08:23:27', '2022-08-01 08:23:27'),
(23, 'Muhammad Lukman Hakim', 'lukman@gmail.com', NULL, '$2y$10$tBnjOh6LI.Gvr49sf149y.VoT2/IeYttN5QtbiJ0BH4pHAt5AmLAO', 'Pelanggan', 'Aktif', 0, 0, NULL, '2022-08-01 08:52:01', '2022-08-01 08:52:01'),
(24, 'M. Andy Nur Kautsar', 'andy@gmail.com', NULL, '$2y$10$6Xh/OyHicCIhmOGO2d0BTeIYA7Ggh/jsvhIUki3guptHGaV0zriKq', 'Pelanggan', 'Aktif', 0, 0, NULL, '2022-08-01 14:37:57', '2022-08-01 14:37:57'),
(25, 'Rian Nura Ari Sucipto', 'rian@gmail.com', NULL, '$2y$10$ubgTcwJzUXh5bO/fsUpZ8OBxjsj0WLz2BXWVzhv1FydiEcT1GmGue', 'Pelanggan', 'Aktif', 1, 1, NULL, '2022-08-13 14:34:42', '2024-03-01 13:02:01'),
(27, 'Nura', 'nura@gmail.com', NULL, '$2y$10$aixQLjn8Vs1ATpOBU5o0cOevquqZBp/6sIzYIZGRk3jwD0BhK/mdS', 'Pelanggan', 'Aktif', 0, 0, NULL, '2024-02-02 02:45:57', '2024-02-02 02:45:57'),
(28, 'nyoba', 'nyoba@gmail.com', NULL, '$2y$10$0f8k9CAez8oBC1cZd2n6quE3Hj/boOimwr1zpiQKCEsDhz5UjJZKO', 'Pelanggan', 'Aktif', 0, 0, NULL, '2024-02-29 06:18:48', '2024-02-29 06:18:48'),
(29, 'Muhammad Akbar', 'akbar@gmail.com', NULL, '$2y$10$lYl.mTdFUc3oxJyHMnKIseSPURm5PDzTgNa/xRS0rCIky9wOKr.gi', 'Pelanggan', 'Aktif', 0, 0, NULL, '2024-05-06 03:44:51', '2024-05-06 03:44:51'),
(30, 'Anis', 'anis@gmail.com', NULL, '$2y$10$Uc5q5uhaZsyfhr8OA9KBJ.t6MVAlUtoW2ltmQdLVdKnxUbEm5p31S', 'Pelanggan', 'Aktif', 0, 0, NULL, '2024-05-06 03:45:17', '2024-05-06 03:45:17'),
(31, 'AnNura', 'annura00015@gmail.com', NULL, '$2y$10$p2GzthQR9Nus7i7vQU6NV.CUxVd43GVjraj5bh9dEzA3H2uXrgbEy', 'Pelanggan', 'Aktif', 0, 0, NULL, '2024-05-15 11:18:12', '2024-05-15 11:18:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`id_datauser`),
  ADD KEY `datauser_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_datasewa` (`id_datasewa`),
  ADD KEY `id_lap` (`id_lap`);

--
-- Indeks untuk tabel `data_pb`
--
ALTER TABLE `data_pb`
  ADD PRIMARY KEY (`id_pb`);

--
-- Indeks untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `data_sewa_id_user_foreign` (`id_user`),
  ADD KEY `data_sewa_lap_id_foreign` (`lap_id`),
  ADD KEY `data_sewa_id_payment_foreign` (`id_payment`);

--
-- Indeks untuk tabel `diskons`
--
ALTER TABLE `diskons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image_lapangan`
--
ALTER TABLE `image_lapangan`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `image_lapangan_lapangan_id_foreign` (`lapangan_id`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`),
  ADD KEY `jam_lapangan_id_foreign` (`lapangan_id`);

--
-- Indeks untuk tabel `jenis_lapangan`
--
ALTER TABLE `jenis_lapangan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nama_lapangan`
--
ALTER TABLE `nama_lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `nama_lapangan_jenis_id_foreign` (`jenis_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_sewa_id_foreign` (`sewa_id`);

--
-- Indeks untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

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
-- AUTO_INCREMENT untuk tabel `datauser`
--
ALTER TABLE `datauser`
  MODIFY `id_datauser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `data_jadwal`
--
ALTER TABLE `data_jadwal`
  MODIFY `id_jadwal` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `data_pb`
--
ALTER TABLE `data_pb`
  MODIFY `id_pb` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `diskons`
--
ALTER TABLE `diskons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_lapangan`
--
ALTER TABLE `image_lapangan`
  MODIFY `id_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `jenis_lapangan`
--
ALTER TABLE `jenis_lapangan`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nama_lapangan`
--
ALTER TABLE `nama_lapangan`
  MODIFY `id_lapangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datauser`
--
ALTER TABLE `datauser`
  ADD CONSTRAINT `datauser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_jadwal`
--
ALTER TABLE `data_jadwal`
  ADD CONSTRAINT `data_jadwal_ibfk_1` FOREIGN KEY (`id_datasewa`) REFERENCES `data_sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_jadwal_ibfk_2` FOREIGN KEY (`id_lap`) REFERENCES `nama_lapangan` (`id_lapangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  ADD CONSTRAINT `data_sewa_id_payment_foreign` FOREIGN KEY (`id_payment`) REFERENCES `payment` (`id_payment`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_sewa_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_sewa_lap_id_foreign` FOREIGN KEY (`lap_id`) REFERENCES `nama_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `image_lapangan`
--
ALTER TABLE `image_lapangan`
  ADD CONSTRAINT `image_lapangan_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `nama_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD CONSTRAINT `jam_lapangan_id_foreign` FOREIGN KEY (`lapangan_id`) REFERENCES `nama_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nama_lapangan`
--
ALTER TABLE `nama_lapangan`
  ADD CONSTRAINT `nama_lapangan_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_lapangan` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_sewa_id_foreign` FOREIGN KEY (`sewa_id`) REFERENCES `data_sewa` (`id_sewa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
