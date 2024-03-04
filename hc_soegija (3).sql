-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Mar 2024 pada 04.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hc_soegija`
--

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
-- Struktur dari tabel `message_history`
--

CREATE TABLE `message_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tiket_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `chat` text NOT NULL,
  `is_flagged` tinyint(1) NOT NULL DEFAULT 0,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2013_03_01_112038_create_role_table', 2),
(6, '2013_03_01_112102_create_topic_table', 2),
(7, '2024_03_01_112046_create_ticket_table', 3),
(8, '2024_03_01_112056_create_ticket_participants_table', 3),
(9, '2014_10_12_000001_create_users_table', 4),
(10, '2024_03_03_003846_create_message_history', 5);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'Chatbot', NULL, NULL),
(1, 'Admin', NULL, NULL),
(2, 'Mahasiswa', NULL, NULL),
(3, 'Keuangan', NULL, NULL),
(4, 'Akademik', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deskripsi` varchar(125) DEFAULT NULL,
  `topik_id` bigint(20) UNSIGNED NOT NULL,
  `status_layanan` varchar(255) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `takeover_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT 1,
  `chat_api_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `topic`
--

CREATE TABLE `topic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `cs_assigned` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `topic`
--

INSERT INTO `topic` (`id`, `nama`, `cs_assigned`, `created_at`, `updated_at`) VALUES
(1, 'Proposal Sponsorship', 3, NULL, NULL),
(2, 'Peminjaman SarPras Ditmawa-PPKU', 3, NULL, NULL),
(3, 'Penandatanganan Sertifikat', 4, NULL, NULL),
(4, 'Surat Izin Akademik', 4, NULL, NULL),
(5, 'Transkrip', 3, NULL, NULL),
(6, 'Surat Keterangan', 3, NULL, NULL),
(7, 'Legalisir Ijazah Bahasa Indonesia', 4, NULL, NULL),
(8, 'Beasiswa', 3, NULL, NULL),
(9, 'Bantuan Pendidikan Non Beasiswa', 3, NULL, NULL),
(10, 'Bantuan Kuota Internet', 3, NULL, NULL),
(11, 'Pengganti Ijazah/Transkrip Akhir', 4, NULL, NULL);

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
  `level` int(11) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `role_id`, `nim`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'Chatbot', 'chatbot@gmail.com', NULL, 'chatbot', NULL, 0, NULL, NULL, NULL, NULL),
(1, 'admin', 'admin@gmail.com', '2024-03-01 04:43:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, NULL, 'CAvlNQSOqdeFwoZ7G1svwDDgxAVAwXMVaECVSLC5bYqsIm93QLnwgWrGohzA', '2024-03-01 04:43:23', '2024-03-01 04:43:23'),
(3, 'Luthfi Dika Chandra', 'mahasiswa2@gmail.com', '2024-03-01 04:45:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 2, 'J03904092093', 'SIMSPVGHqqRVkSBkUGTH9BpbeagNDBwiqI5tUJ9lc4AnOioC0FbMSQISDMuA', '2024-03-01 04:45:24', '2024-03-02 04:01:02'),
(4, 'pimpinan_keuangan', 'pimpinan_keuangan@gmail.com', '2024-03-01 04:45:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 3, NULL, 'lT1wSce38L', '2024-03-01 04:45:24', '2024-03-01 04:45:24'),
(5, 'keuangan', 'keuangan@gmail.com', '2024-03-01 04:45:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, 3, NULL, 'zW3349C1MnzyYNVKTVemlelZiA3ZKtzQVhjNNRdSXFXDuI9yXGeINMQ7Izkg', '2024-03-01 04:45:24', '2024-03-01 04:45:24'),
(7, 'Ekky Mulia Lasardi', 'ekky@gmail.com', NULL, '$2y$10$ocJpV59Pa4XDhOuArNvl5OF.VFmgSSKLLw5Yn3sVQ3M93YPH2V.Yi', NULL, 2, 'J0403229932', NULL, '2024-03-03 00:39:48', '2024-03-03 00:39:48'),
(8, 'rahmani', 'rahmani@gmail.com', NULL, '$2y$10$fq84TtlIYbGumWxQm3VFyeuV75ef1/uxSFJEX6t/JMUJGj4HH7klC', NULL, 3, NULL, NULL, '2024-03-03 00:43:26', '2024-03-03 00:43:26'),
(16, 'pimpinan_akademik', 'pimpinan_akademik@gmail.com', NULL, '$2y$10$ZxVr0XO2TB196kQJHckozeqix2GXVSv5sBA0APms5/ogmJ2W1s1O.', 1, 4, NULL, NULL, '2024-03-03 19:44:49', '2024-03-03 19:44:49'),
(17, 'akademik', 'akademik@gmail.com', NULL, '$2y$10$gonYlxyBcg5mGPDpJHDjKuITvk9eqDnuGPdMDqliFOHavK8R1O4Zu', 2, 4, NULL, NULL, '2024-03-03 19:45:07', '2024-03-03 19:45:07');

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
-- Indeks untuk tabel `message_history`
--
ALTER TABLE `message_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_history_tiket_id_foreign` (`tiket_id`),
  ADD KEY `message_history_role_id_foreign` (`role_id`),
  ADD KEY `message_history_sender_id_foreign` (`sender_id`);

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
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_topik_id_foreign` (`topik_id`);

--
-- Indeks untuk tabel `topic`
--
ALTER TABLE `topic`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `message_history`
--
ALTER TABLE `message_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `topic`
--
ALTER TABLE `topic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `message_history`
--
ALTER TABLE `message_history`
  ADD CONSTRAINT `message_history_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_history_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_history_tiket_id_foreign` FOREIGN KEY (`tiket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_topik_id_foreign` FOREIGN KEY (`topik_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
