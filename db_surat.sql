-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2021 pada 10.13
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_surat` bigint(20) UNSIGNED NOT NULL,
  `id_pejabat` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `no_surat`, `status`, `tanggal`, `id_surat`, `id_pejabat`, `created_at`, `updated_at`) VALUES
(1, '001/C/FTI/2021', 'disetujui', '2021-11-30', 1, 1, '2021-11-30 06:39:49', '2021-11-30 06:44:43'),
(2, '001/D/FTI/2021', 'disetujui', '2021-11-30', 2, 1, '2021-11-30 06:50:31', '2021-11-30 07:00:47'),
(3, '001/B/FTI/2021', 'disetujui', '2021-11-30', 3, 1, '2021-11-30 07:03:11', '2021-11-30 07:03:44'),
(4, '001/E/FTI/2021', 'disetujui', '2021-11-30', 4, 1, '2021-11-30 07:04:53', '2021-11-30 07:05:22'),
(6, '001/A/FTI/2021', 'disetujui', '2021-11-30', 6, 1, '2021-11-30 07:41:20', '2021-11-30 07:42:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_surat`, `created_at`, `updated_at`) VALUES
(1, 'Surat Personalia & SK', NULL, NULL),
(2, 'Surat Kegiatan Mahasiswa', NULL, NULL),
(3, 'Surat Undangan', NULL, NULL),
(4, 'Surat Tugas', NULL, NULL),
(5, 'Surat Berita Acara Kegiatan', NULL, NULL);

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
(5, '2021_10_15_161705_create_jenis_table', 1),
(6, '2021_10_15_161846_create_surat_table', 1),
(7, '2021_10_15_161916_create_pejabat_table', 1),
(8, '2021_10_15_161942_create_informasi_table', 1);

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
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tamu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `perihal`, `kepada`, `keterangan`, `tanggal`, `waktu`, `tempat`, `kode`, `nama`, `penyelenggara`, `target`, `tamu`, `id_user`, `id_jenis`, `created_at`, `updated_at`) VALUES
(1, 'WEBINAR', 'Renaldi', 'Acara Penggalangan Dana', '2021-12-01', '15:45:00', 'Google Meet', NULL, NULL, NULL, NULL, NULL, 1, 3, '2021-11-30 06:39:49', '2021-11-30 06:39:49'),
(2, 'Jalan jalan', NULL, NULL, '2021-12-01', NULL, 'Dimana maana', '72190273,72190315', 'Yonathan Sebastian,Ferry', 'Gabriel', NULL, NULL, 1, 4, '2021-11-30 06:50:31', '2021-11-30 06:50:31'),
(3, 'Lomba', 'GEMASTIK', 'Holaa', '2021-12-02', '16:15:00', 'Kolong jembatan', NULL, NULL, NULL, NULL, NULL, 4, 2, '2021-11-30 07:03:11', '2021-11-30 07:03:11'),
(4, 'Misi Kemanusiaan', NULL, NULL, '2021-12-01', NULL, 'Google Meet', NULL, NULL, NULL, 'Mahasiswa FTI', 'Saya Sendiri', 1, 5, '2021-11-30 07:04:53', '2021-11-30 07:04:53'),
(6, 'PENGANGKATAN KOORDINATOR PENGELOLAAN', NULL, 'Terhitung mulai tanggal 31 Desember 2018 membebas tugaskan Umi Proboyekti, S.Kom., MLIS, sebagai Koordinator Laboratorium FTI UKDW, serta kepada beliau disampaikan penghargaan dan ucapan terima kasih atas jasa-jasanya selama menjalankan tugas tersebut.\r\n\r\n;Terhitung mulai tanggal 1 Januari 2019 - 31 Desember 2019 mengangkat Umi Proboyekti, S.Kom., MLIS, sebagai Koordinator Pengelolaan Tenaga Volunteer Laboratorium FTI UKDW.;Berkaitan dengan beban kerja yang ditugaskan, kepada Koordinator Laboratorium FTI UKDW diberikan penghargaan sebesar 1 SKS per semester.;Apabila di kemudian hari ternyata terdapat kekeliruan dalam surat keputusan ini, maka akan dilakukan perbaikan sebagaimana mestinya.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_tangan`
--

CREATE TABLE `tanda_tangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanda_tangan`
--

INSERT INTO `tanda_tangan` (`id`, `nidn`, `nama`, `jabatan`, `ttd`, `created_at`, `updated_at`) VALUES
(1, '72190349', 'Alex Septimand Gulo', 'Wakil HMSI', 'alex.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `kode`, `name`, `email`, `email_verified_at`, `password`, `telpon`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, '4DM1N', 'Admin', 'admin@gmail.com', '2021-11-30 06:34:28', '$2y$10$2iu28PNOzi0tDgkGUPEr2usRnRWtknDRePBETHhBH2dEk7IsGTQHG', '0812345678', NULL, 'admin', '2021-11-30 06:34:28', NULL),
(2, '72190315', 'Ferry', 'ferry@gmail.com', '2021-11-30 06:34:28', '$2y$10$9NkDYPxDx6RcaWFtTFuXOu458yQLPrICpebWHm1IDB61vgkgqSbAa', '0812345678', NULL, 'mahasiswa', '2021-11-30 06:34:28', NULL),
(3, '72190273', 'Yonathan Sebastian', 'yonas@gmail.com', '2021-11-30 06:34:28', '$2y$10$v69tOt5lTlko254YMyLbWOQFo0Kgml0u4rfgTAFWviwxxgtTKun7S', '0812345678', NULL, 'mahasiswa', '2021-11-30 06:34:28', NULL),
(4, '72190331', 'Gabriel Manaor', 'gabriel@gmail.com', '2021-11-30 06:34:28', '$2y$10$7KfGKXdgakhhy2dgSYPHO.hF/ElkSg8MQIXytQFp3W8c.jIGnUzsS', '0812345678', NULL, 'mahasiswa', '2021-11-30 06:34:28', NULL),
(5, 'D053N', 'Dosen', 'dosen@gmail.com', '2021-11-30 06:34:28', '$2y$10$U4.w1X3ujOGa5g.UIK.XR.4EcPNgultEMo9R7P1VY//zVOGjihPsG', '0812345678', NULL, 'dosen', '2021-11-30 06:34:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasi_id_surat_foreign` (`id_surat`),
  ADD KEY `informasi_id_pejabat_foreign` (`id_pejabat`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_id_user_foreign` (`id_user`),
  ADD KEY `surat_id_jenis_foreign` (`id_jenis`);

--
-- Indeks untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tanda_tangan_nidn_unique` (`nidn`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_kode_unique` (`kode`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_id_pejabat_foreign` FOREIGN KEY (`id_pejabat`) REFERENCES `tanda_tangan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `informasi_id_surat_foreign` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `surat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
