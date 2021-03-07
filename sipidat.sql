-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Feb 2020 pada 21.12
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipidat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adk_kamtib`
--

CREATE TABLE `adk_kamtib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ad_perkes`
--

CREATE TABLE `ad_perkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ad_rap`
--

CREATE TABLE `ad_rap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dd_rap`
--

CREATE TABLE `dd_rap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_deteni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blok` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pelanggaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_kiriman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpb_kamtib`
--

CREATE TABLE `dpb_kamtib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` bigint(20) NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` bigint(20) NOT NULL,
  `nama_deteni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blok` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pelanggaran` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kasus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpm_rap`
--

CREATE TABLE `dpm_rap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_pengungsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_register` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_unchcr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_registrasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dpm_rap`
--

INSERT INTO `dpm_rap` (`id`, `id_user`, `nama_pengungsi`, `nomor_register`, `no_unchcr`, `jenis_kelamin`, `tanggal`, `bulan`, `tahun`, `alamat`, `kewarganegaraan`, `tahun_registrasi`, `foto`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nafick Maula Hakim', 'MAN-001', '25011999', 'Laki - laki', '2020-01-20', NULL, NULL, 'adasdasd', 'Afganistan', '1999', '201810130311037.JPG', 'MAN-001.png', '2020-01-30 21:32:49', '2020-01-31 02:56:21'),
(2, 1, 'Muhammad nafi maula hakim mantab jiwa', 'MAN-002', '25011999', 'Laki - laki', '2020-01-07', NULL, NULL, 'Perumahan Muara sarana Indah Blok B21, Kecamatan Dau, Kabupaten Malang', 'Afganistan', '2020', '201810130311015.JPG', 'MAN-002.png', '2020-01-31 03:19:34', '2020-01-31 03:19:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dp_rap`
--

CREATE TABLE `dp_rap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_pengungsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_register` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_unchcr` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_penampungan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_registrasi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kamar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dp_rap`
--

INSERT INTO `dp_rap` (`id`, `id_user`, `nama_pengungsi`, `nomor_register`, `no_unchcr`, `jenis_kelamin`, `tanggal`, `bulan`, `tahun`, `tempat_penampungan`, `tahun_registrasi`, `kamar`, `kewarganegaraan`, `foto`, `barcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bustomi', 'PA-001', '12345', 'Laki - laki', '2000-11-13', NULL, NULL, 'Puspa Agro', '2019', 'A123', 'Afganistan', '201810130311012.JPG', 'PA-001.png', '2020-01-30 21:18:56', '2020-01-30 21:18:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtp_kamtib`
--

CREATE TABLE `dtp_kamtib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` bigint(20) NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` bigint(20) NOT NULL,
  `nama_petugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_perkes`
--

CREATE TABLE `kd_perkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_penerima` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kebutuhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ko_out_perkes`
--

CREATE TABLE `ko_out_perkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ko_perkes`
--

CREATE TABLE `ko_perkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpj_kamtib`
--

CREATE TABLE `lpj_kamtib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menit_mulai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menit_selesai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lp_rap`
--

CREATE TABLE `lp_rap` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengungsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lapor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_rap_id` bigint(20) DEFAULT NULL,
  `dpm_rap_id` bigint(20) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(72, '2019_12_25_020619_create_ad_perkes_table', 2),
(73, '2019_12_25_020833_create_kd_perkes_table', 2),
(411, '2014_10_12_000000_create_users_table', 3),
(412, '2014_10_12_100000_create_password_resets_table', 3),
(413, '2019_08_19_000000_create_failed_jobs_table', 3),
(414, '2019_12_07_115829_create_lpj_kamtib_table', 3),
(415, '2019_12_15_163553_create_dpb_kamtib_table', 3),
(416, '2019_12_17_010605_create_dtp_kamtib_table', 3),
(417, '2019_12_21_180734_create_adk_kamtib_table', 3),
(418, '2019_12_25_082330_create_kd_perkes_table', 3),
(419, '2019_12_28_084131_create_ad_perkes_table', 3),
(420, '2020_01_03_074716_create_dp_rap_table', 3),
(421, '2020_01_06_081546_create_dd_rap_table', 3),
(422, '2020_01_06_170622_create_ad_rap_table', 3),
(423, '2020_01_08_091831_create_tk_pimpinan_table', 3),
(424, '2020_01_13_195630_create_dpm_rap_table', 3),
(425, '2020_01_17_154303_create_ptk_pimpinan_table', 3),
(426, '2020_01_17_175753_create_pws_pimpinan_table', 3),
(427, '2020_01_21_091530_create_ko_perkes_table', 3),
(428, '2020_01_21_100156_create_ko_out_perkes_table', 3),
(429, '2020_01_21_163752_create_lp_rap_table', 3),
(430, '2020_01_22_175519_riwayat_lapor', 3),
(431, '2020_01_25_082619_catatan_admin', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptk_pimpinan`
--

CREATE TABLE `ptk_pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persiapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pws_pimpinan`
--

CREATE TABLE `pws_pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_kegiatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menit_mulai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menit_selesai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_lapor`
--

CREATE TABLE `riwayat_lapor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tk_pimpinan`
--

CREATE TABLE `tk_pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konsep` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `is_admin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`is_admin`, `id`, `name`, `username`, `password`, `foto`, `jabatan`, `remember_token`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Muhammad Nafi\' Maula Hakim', 'nafick25', '$2y$10$6VcwUcujQrTNAvu2QGKpvuq5qcCdPhoy1mJN2JQb/4j79hsQ24t.S', NULL, 'humas', NULL, '2020-01-30 14:17:48', '2020-01-30 14:17:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adk_kamtib`
--
ALTER TABLE `adk_kamtib`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adk_kamtib_nama_unique` (`nama`);

--
-- Indeks untuk tabel `ad_perkes`
--
ALTER TABLE `ad_perkes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ad_rap`
--
ALTER TABLE `ad_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dd_rap`
--
ALTER TABLE `dd_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dpb_kamtib`
--
ALTER TABLE `dpb_kamtib`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dpm_rap`
--
ALTER TABLE `dpm_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dp_rap`
--
ALTER TABLE `dp_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtp_kamtib`
--
ALTER TABLE `dtp_kamtib`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kd_perkes`
--
ALTER TABLE `kd_perkes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ko_out_perkes`
--
ALTER TABLE `ko_out_perkes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ko_perkes`
--
ALTER TABLE `ko_perkes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lpj_kamtib`
--
ALTER TABLE `lpj_kamtib`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lp_rap`
--
ALTER TABLE `lp_rap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `ptk_pimpinan`
--
ALTER TABLE `ptk_pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pws_pimpinan`
--
ALTER TABLE `pws_pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_lapor`
--
ALTER TABLE `riwayat_lapor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riwayat_lapor_tanggal_unique` (`tanggal`);

--
-- Indeks untuk tabel `tk_pimpinan`
--
ALTER TABLE `tk_pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `adk_kamtib`
--
ALTER TABLE `adk_kamtib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ad_perkes`
--
ALTER TABLE `ad_perkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ad_rap`
--
ALTER TABLE `ad_rap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dd_rap`
--
ALTER TABLE `dd_rap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dpb_kamtib`
--
ALTER TABLE `dpb_kamtib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dpm_rap`
--
ALTER TABLE `dpm_rap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dp_rap`
--
ALTER TABLE `dp_rap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dtp_kamtib`
--
ALTER TABLE `dtp_kamtib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kd_perkes`
--
ALTER TABLE `kd_perkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ko_out_perkes`
--
ALTER TABLE `ko_out_perkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ko_perkes`
--
ALTER TABLE `ko_perkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lpj_kamtib`
--
ALTER TABLE `lpj_kamtib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lp_rap`
--
ALTER TABLE `lp_rap`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT untuk tabel `ptk_pimpinan`
--
ALTER TABLE `ptk_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pws_pimpinan`
--
ALTER TABLE `pws_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_lapor`
--
ALTER TABLE `riwayat_lapor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tk_pimpinan`
--
ALTER TABLE `tk_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
