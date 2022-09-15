-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2022 pada 15.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujicoba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datauser`
--

CREATE TABLE `datauser` (
  `id_datauser` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datauser`
--

INSERT INTO `datauser` (`id_datauser`, `user_id`, `username`, `no_telp`, `jenis_kelamin`, `ktp`, `gambar_ktp`, `alamat_penyewa`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'RIannnn', '0866655443523', 'Laki-Laki', '88898574567345', '62ccae9794f9bstock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Pare', NULL, NULL),
(3, 3, 'nurraaaa', '0833552667234', 'Laki-Laki', '897767623472834', '62cccb3fcd7a1stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Bendo', NULL, NULL),
(4, 4, 'ariiiii', '0877665523677', 'Laki-Laki', '979879879719823', '62cce06ce37e9stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'pare', NULL, NULL),
(7, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 12, 'Nurarian', '086677554537', 'Laki-Laki', '8978899887238', '62ccddd82b659stock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Pare', NULL, NULL),
(9, 13, 'Arisucipto', '085344567283', 'Laki-Laki', '888877887878347', '62ccdf477114fstock-vector-ktp-indonesia-id-card-1628461459.jpg', 'Kediri', NULL, NULL),
(10, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sewa`
--

CREATE TABLE `data_sewa` (
  `id_sewa` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `lap_id` bigint(20) UNSIGNED DEFAULT NULL,
  `id_payment` bigint(20) UNSIGNED DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `hargasewa` int(11) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totaljam` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) NOT NULL,
  `bukti_tf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_sewa`
--

INSERT INTO `data_sewa` (`id_sewa`, `id_user`, `lap_id`, `id_payment`, `diskon`, `hargasewa`, `tempo`, `tanggal`, `jam_mulai`, `jam_selesai`, `totaljam`, `keterangan`, `konfirmasi`, `total`, `bukti_tf`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 1, 0, 50000, NULL, '2022-07-12', '09:00', '10:00', 1, 'Selesai', 'Sudah di Konfirmasi', 50000, '62cac95c67d03WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 05:37:49', '2022-07-14 09:02:35'),
(28, 3, 1, 1, 0, 50000, NULL, '2022-07-14', '08:00', '09:00', 1, 'Selesai', 'Sudah di Konfirmasi', 50000, '62cbb227d4544WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 06:11:30', '2022-07-16 11:36:01'),
(29, 2, 1, 1, 0, 50000, NULL, '2022-07-13', '08:00', '09:00', 1, 'Selesai', 'Sudah di Konfirmasi', 50000, '62cae48be1958WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 06:12:02', '2022-07-16 11:44:01'),
(30, 2, 1, 1, 0, 50000, NULL, '2022-07-14', '10:00', '11:00', 1, 'Selesai', 'Sudah di Konfirmasi', 50000, '62cae4ae161ebWhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 06:23:17', '2022-07-16 11:44:23'),
(31, 2, 1, 1, 0, 75000, NULL, '2022-07-16', '10:00', '11:00', 1, 'Aktif', 'Sudah di Konfirmasi', 75000, '62cae4bd20e40WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 06:27:53', '2022-07-10 06:27:53'),
(32, 2, 1, 1, 0, 75000, NULL, '2022-07-15', '10:00', '11:00', 1, 'Aktif', 'Sudah di Konfirmasi', 75000, '62cae4c9bea35WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 06:46:28', '2022-07-10 06:46:28'),
(34, 4, 1, 1, 15000, 75000, NULL, '2022-07-19', '10:00', '11:00', 1, 'Aktif', 'Sudah di Konfirmasi', 60000, '62cb935678a01WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 20:04:31', '2022-07-10 20:04:31'),
(35, 2, 2, 1, 0, 50000, NULL, '2022-07-15', '08:00', '09:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62cc2d525b488WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 20:57:56', '2022-07-10 20:57:56'),
(36, 3, 2, 1, 0, 50000, NULL, '2022-07-16', '09:00', '10:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62cbb21609f2aWhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 22:15:45', '2022-07-10 22:15:45'),
(37, 3, 2, 1, 0, 50000, NULL, '2022-07-27', '09:00', '10:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62cbb24ceed78WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-10 22:16:45', '2022-07-10 22:16:45'),
(38, 12, 1, 1, 0, 50000, NULL, '2022-07-29', '09:00', '10:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62cc35ee053aaWhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-11 07:35:36', '2022-07-11 07:35:36'),
(39, 13, 2, 1, 20000, 50000, NULL, '2022-07-21', '09:00', '10:00', 1, 'Aktif', 'Sudah di Konfirmasi', 30000, '62cc3d384d1a5WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-11 08:02:43', '2022-07-11 08:02:43'),
(40, 2, 1, 1, 0, 75000, NULL, '2022-07-21', '10:00', '11:00', 1, 'Aktif', 'Sudah di Konfirmasi', 75000, '62cd3c334a6e9WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-12 01:51:45', '2022-07-12 01:51:45'),
(41, 2, 2, 1, 0, 50000, NULL, '2022-07-22', '09:00', '10:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62cd3cd53c86cWhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-12 02:19:53', '2022-07-12 02:19:53'),
(48, 2, 1, 1, 0, 65000, '22:15:00', '2022-07-30', '16:00', '17:00', 1, 'Aktif', 'Sudah di Konfirmasi', 65000, '62d167a191668WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-15 05:15:15', '2022-07-15 05:15:15'),
(50, 2, 1, 1, 0, 50000, '21:43:39', '2022-07-17', '12:00', '13:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62d16df42c339WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-15 05:43:39', '2022-07-15 05:43:39'),
(51, 2, 1, 1, 0, 50000, '22:52:02', '2022-07-18', '15:00', '16:00', 1, 'Aktif', 'Sudah di Konfirmasi', 50000, '62d17377cac57WhatsApp Image 2022-07-04 at 14.12.51.jpeg', '2022-07-15 05:52:02', '2022-07-15 05:52:02'),
(52, 2, 1, 1, 0, 65000, '00:06:35', '2022-07-19', '16:00', '17:00', 1, 'Expired', 'Belum di Konfirmasi', 65000, '-', '2022-07-15 07:06:35', '2022-07-16 06:01:01'),
(53, 2, 2, 1, 0, 50000, '13:06:36', '2022-07-20', '09:00', '10:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-15 20:06:36', '2022-07-16 06:01:01'),
(54, 2, 1, 1, 0, 50000, '23:01:15', '2022-07-16', '14:00', '15:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 06:01:15', '2022-07-16 06:02:01'),
(63, 2, 1, 1, 0, 65000, '16:09:11', '2022-07-17', '16:00', '17:00', 1, 'Expired', 'Belum di Konfirmasi', 65000, '-', '2022-07-16 09:08:11', '2022-07-16 09:10:01'),
(64, 2, 1, 1, 0, 50000, '16:12:22', '2022-07-17', '15:00', '16:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 09:11:22', '2022-07-16 09:13:00'),
(65, 2, 1, 1, 0, 50000, '16:20:18', '2022-07-18', '12:00', '13:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 09:15:18', '2022-07-16 09:21:01'),
(66, 2, 2, 1, 0, 50000, '16:38:11', '2022-07-17', '09:00', '10:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 09:33:11', '2022-07-16 09:39:01'),
(67, 2, 2, 1, 0, 50000, '18:28:35', '2022-07-18', '09:00', '10:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 10:28:35', '2022-07-16 11:29:01'),
(68, 2, 1, 1, 0, 50000, '20:29:58', '2022-07-18', '12:00', '13:00', 1, 'Expired', 'Belum di Konfirmasi', 50000, '-', '2022-07-16 11:29:58', '2022-07-16 13:30:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskons`
--

CREATE TABLE `diskons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_diskon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hargadiskon` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskons`
--

INSERT INTO `diskons` (`id`, `nama_diskon`, `hargadiskon`, `created_at`, `updated_at`) VALUES
(1, 'Member Setia', 15000, '2022-07-08 23:00:22', '2022-07-08 23:00:22'),
(2, 'Spesial Idul Adha', 20000, '2022-07-11 07:00:00', '2022-07-11 07:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `image_lapangan`
--

CREATE TABLE `image_lapangan` (
  `id_image` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_lapangan`
--

INSERT INTO `image_lapangan` (`id_image`, `lapangan_id`, `filename`, `path`, `created_at`, `updated_at`) VALUES
(1, 1, 'd3406d5e6c905a4b08fd099002d5479e', 'C:\\Users\\dell\\Documents\\Proposal Laporan Akhir\\Proposal TA\\Aplikasi\\pengujian\\bulutangkis/public/image\\d3406d5e6c905a4b08fd099002d5479e', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `id_jam` bigint(20) UNSIGNED NOT NULL,
  `lapangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jam_mulai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargajam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jam`
--

INSERT INTO `jam` (`id_jam`, `lapangan_id`, `jam_mulai`, `jam_selesai`, `hargajam`, `created_at`, `updated_at`) VALUES
(1, 1, '08:00', '09:00', 50000, '2022-07-10 00:03:02', '2022-07-10 00:03:02'),
(2, 2, '08:00', '09:00', 50000, '2022-07-10 00:08:58', '2022-07-10 00:08:58'),
(3, 2, '09:00', '10:00', 50000, '2022-07-10 00:10:11', '2022-07-10 00:10:11'),
(4, 1, '09:00', '10:00', 50000, '2022-07-10 00:14:46', '2022-07-10 00:14:46'),
(5, 1, '10:00', '11:00', 50000, '2022-07-10 06:22:35', '2022-07-10 06:22:35'),
(6, 1, '11:00', '12:00', 50000, '2022-07-12 06:21:58', '2022-07-12 06:21:58'),
(7, 1, '12:00', '13:00', 50000, '2022-07-12 06:22:15', '2022-07-12 06:22:15'),
(8, 1, '13:00', '14:00', 50000, '2022-07-12 06:22:34', '2022-07-12 06:22:34'),
(9, 1, '14:00', '15:00', 50000, '2022-07-12 06:22:48', '2022-07-12 06:22:48'),
(10, 1, '15:00', '16:00', 50000, '2022-07-12 06:23:04', '2022-07-12 06:23:04'),
(11, 1, '16:00', '17:00', 65000, '2022-07-12 06:41:13', '2022-07-12 06:41:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_lapangan`
--

CREATE TABLE `jenis_lapangan` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_lapangan`
--

INSERT INTO `jenis_lapangan` (`id_jenis`, `nama_jenis`, `created_at`, `updated_at`) VALUES
(1, 'Synthetic Floor', NULL, NULL),
(2, 'Wooden Floor', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notlp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `bagian`, `alamat`, `notlp`, `ktp`, `created_at`, `updated_at`) VALUES
(1, 'Rian Nura', 'Administrasi', 'Bendo', '084455366232', '62cccd2c39b05stock-vector-ktp-indonesia-id-card-1628461459.jpg', '2022-07-11 03:05:45', '2022-07-11 03:05:45'),
(3, 'Rian Nura A.S', 'Administrasi', 'Pare', '0822446657893', '62cc307dbfa2dstock-vector-ktp-indonesia-id-card-1628461459.jpg', '2022-07-11 07:15:25', '2022-07-11 07:15:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `nama_lap` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `det_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nama_lapangan`
--

INSERT INTO `nama_lapangan` (`id_lapangan`, `nama_lap`, `jenis_id`, `harga`, `gambar`, `kegiatan`, `det_lapangan`, `created_at`, `updated_at`) VALUES
(1, 'Lapangan 01', 1, 50000, '62c8fa6d9bf2aLapangan-Bulu-Tangkis-Sesuai-Standar-Internasional.jpg', 'Bulutangkis', 'Good', NULL, NULL),
(2, 'Lapangan 02', 1, 50000, '62ca206a86d83Lapangan-Bulu-Tangkis-Sesuai-Standar-Internasional.jpg', 'Bulutangkis', 'Good', NULL, NULL),
(3, 'Lapangan 03', 1, 50000, '62cc27e5ad78cLapangan-Bulu-Tangkis-Sesuai-Standar-Internasional.jpg', 'Bulutangkis', 'Berbahan dasar karet yang lembut dan sangat kuat serta berstandar internasional', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` bigint(20) UNSIGNED NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_rek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id_payment`, `no_rek`, `nama_rek`, `created_at`, `updated_at`) VALUES
(1, '8789887812387871', 'Rian Nura (BRI)', NULL, NULL),
(2, '987987897698273498', 'Nura Rian (BNI)', NULL, NULL),
(3, '89878888777887', 'Rian NAS (BCA)', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `sewa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `sewa_id`, `tanggal`, `nominal`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(2, 6, '2022-07-12', '50000', 'Lunas', NULL, NULL),
(3, 32, '2022-07-15', '75000', 'Lunas', NULL, NULL),
(4, 31, '2022-07-16', '75000', 'Lunas', NULL, NULL),
(5, 30, '2022-07-14', '50000', 'Lunas', NULL, NULL),
(6, 29, '2022-07-13', '50000', 'Lunas', NULL, NULL),
(7, 34, '2022-07-19', '60000', 'Lunas', NULL, NULL),
(8, 28, '2022-07-14', '50000', 'Lunas', NULL, NULL),
(9, 36, '2022-07-16', '50000', 'Lunas', NULL, NULL),
(10, 37, '2022-07-27', '50000', 'Lunas', NULL, NULL),
(11, 35, '2022-07-15', '50000', 'Lunas', NULL, NULL),
(12, 38, '2022-07-29', '50000', 'Lunas', NULL, NULL),
(13, 39, '2022-07-21', '30000', 'Lunas', NULL, NULL),
(14, 40, '2022-07-21', '75000', 'Lunas', NULL, NULL),
(15, 40, '2022-07-21', '75000', 'Lunas', NULL, NULL),
(16, 41, '2022-07-22', '50000', 'Lunas', NULL, NULL),
(17, 50, '2022-07-17', '50000', 'Lunas', NULL, NULL),
(18, 48, '2022-07-30', '65000', 'Lunas', NULL, NULL),
(19, 51, '2022-07-18', '50000', 'Lunas', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan`
--

CREATE TABLE `peralatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peralatan`
--

INSERT INTO `peralatan` (`id`, `nama`, `jumlah`, `tempat`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Sapu', '5', 'Lemari Kaca', 'Berwarna Orange', '62cbf688114aba76cc1b6577e190f02f49d0e33f83096.jfif', NULL, NULL),
(2, 'Pel pelan', '6', 'Lemari Kaca', 'Berwarna Hijau', '62cc31360ae3ailsqk2chosxxyzpkpm33.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `nama_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_apk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_profil`, `jenis_apk`, `lokasi`, `no_profil`, `created_at`, `updated_at`) VALUES
(1, 'RN SPORT', 'Penyewaan Lapangan Bulutangkis', 'Kediri', '082244745603', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$dZCopQ.gUyY7qnfYYIcA4uQab6a/XRakoYpS4WBZwho9cDsjAN27q', 'Admin', 'Aktif', NULL, '2022-07-08 20:45:37', '2022-07-08 20:45:37'),
(2, 'Rian', 'rian@gmail.com', NULL, '$2y$10$Y96UQZNvSaU/QNSZrOtSDOLG6YgG22DE53BBwILE1pjDf4bO0EtuW', 'Pelanggan', 'Aktif', NULL, '2022-07-08 22:21:18', '2022-07-08 22:21:18'),
(3, 'Nura', 'nuraa@gmail.com', NULL, '$2y$10$85PYf0Uod.hE8II2WxCIBOk0SZaQ2gSR/vA4CcUDZor.poVIGnHdy', 'Pelanggan', 'Aktif', NULL, '2022-07-09 02:34:40', '2022-07-09 02:34:40'),
(4, 'Ari', 'ari@gmail.com', NULL, '$2y$10$XsHQFRZcC8fv4It.N5VDk.f6TaElJs/eL6Amf7cxskVpYeVT.1UrK', 'Member', 'Aktif', NULL, '2022-07-10 19:57:12', '2022-07-10 19:57:12'),
(11, 'Rian Nura', 'riannura@gmail.com', NULL, '$2y$10$OdHnGiZCCeQCOkJ4SkkccOEnE303q7VMctv0yxD/PVIu7OQkIwg9W', 'Admin', 'Aktif', NULL, '2022-07-11 06:33:47', '2022-07-11 06:33:47'),
(12, 'Nura Rian', 'nurarian@gmail.com', NULL, '$2y$10$YCTOlSCD/rYk7L83nVPQBOoZcHj4JxfPQhvc.mTmuJckEyvBKPCa6', 'Pelanggan', 'Aktif', NULL, '2022-07-11 07:27:06', '2022-07-11 07:27:06'),
(13, 'Ari Sucipto', 'arisucipto@gmail.com', NULL, '$2y$10$QXIFLFsx0LzCMdEsJgr.lOTha0rKGve5SCa/I.aFUNPV.OQGFHd22', 'Member', 'Aktif', NULL, '2022-07-11 07:51:35', '2022-07-11 07:51:35'),
(14, 'siu', 'siu@gmail.com', NULL, '$2y$10$VJ3VHI7ohe3srcWw37Y9.uP/3FNxGXkdDzK7zUEQ16oVksa0ARtJu', 'Admin', 'Aktif', NULL, '2022-07-11 18:29:39', '2022-07-11 18:29:39'),
(15, 'fff', 'fff@gmail.com', NULL, '$2y$10$A9pnfP/mIOfve/htzMuEK.PuKtkgolXqTHb0gc2uKiXPM6PbfJ5mS', 'Admin', 'Aktif', NULL, '2022-07-11 18:31:53', '2022-07-11 18:31:53'),
(16, 'ss', 'ss@gmail.com', NULL, '$2y$10$9NdfZW3i.gdS.mg4pC.rleyVSlqnP4SOUyidUmPjdKS2aqAHddUCG', 'Member', 'Aktif', NULL, '2022-07-12 09:36:25', '2022-07-12 09:36:25');

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
  MODIFY `id_datauser` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_sewa`
--
ALTER TABLE `data_sewa`
  MODIFY `id_sewa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `diskons`
--
ALTER TABLE `diskons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_lapangan`
--
ALTER TABLE `image_lapangan`
  MODIFY `id_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis_lapangan`
--
ALTER TABLE `jenis_lapangan`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nama_lapangan`
--
ALTER TABLE `nama_lapangan`
  MODIFY `id_lapangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `peralatan`
--
ALTER TABLE `peralatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datauser`
--
ALTER TABLE `datauser`
  ADD CONSTRAINT `datauser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
