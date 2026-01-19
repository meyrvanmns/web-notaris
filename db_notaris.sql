-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jan 2026 pada 15.19
-- Versi server: 8.0.30
-- Versi PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_notaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Admin Notaris', 'admin@example.com', '$2y$12$HZfEvArbdCBlIdLVUv0xae/sCYc/ZOKn5QXt7UOE.APPNN/YLVdJa', '2026-01-10 06:42:31', '2026-01-10 06:42:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `name`, `identity_number`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(8, 'biyan', '1203131', 'madkadaokadas', '1203103', 'biyan@example.com', 'aktif', '2026-01-19 08:18:17', '2026-01-19 08:18:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_date` date NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `access_status` enum('privat','publik') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'privat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `documents`
--

INSERT INTO `documents` (`id`, `document_type`, `client_name`, `document_date`, `file_path`, `notes`, `access_status`, `created_at`, `updated_at`) VALUES
(6, 'sertif', 'biyan', '2026-01-19', 'documents/6HfyGoYbarRJ6AUgeOF4pepSKpIO0l5iys0CQs1p.pdf', 'sadads', 'publik', '2026-01-19 08:17:43', '2026-01-19 08:17:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_23_141103_create_request_submissions_table', 1),
(5, '2025_05_23_151945_create_clients_table', 1),
(6, '2025_05_23_163646_create_ppat_services_table', 1),
(7, '2025_05_23_164212_create_notary_services_table', 1),
(8, '2025_05_23_164954_create_service_fees_table', 1),
(9, '2025_05_23_170010_create_documents_table', 1),
(10, '2025_05_24_031102_create_admins_table', 1),
(11, '2026_01_18_191917_alter_role_column_on_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notary_services`
--

CREATE TABLE `notary_services` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` enum('pendirian_pt','perubahan_ad','kuasa','dll') COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_date` date NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `draft_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notary_services`
--

INSERT INTO `notary_services` (`id`, `client_name`, `document_type`, `processing_date`, `document_number`, `draft_path`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'Ridho', 'kuasa', '2025-05-28', '61283712638123', 'drafts/wS0OikgNyJ5tGy7tn6l7BTcgQf9xY4ur54U4CXYD.pdf', 'test', '2025-05-30 09:30:41', '2025-05-30 09:34:24'),
(3, 'beeng', 'pendirian_pt', '2025-05-24', '123213932193212139', 'drafts/cB76R2pgCJze05Lbaa79qGrP33UZ9YbJAjVTXBwq.pdf', 'addasd', '2025-06-13 21:28:23', '2025-06-13 21:28:23'),
(4, 'biyan', 'pendirian_pt', '2026-01-16', '1', 'drafts/re4WZNY8eSlrMoOnxqYAwr0nGvBgZw6aUXaNEHIQ.pdf', '1', '2026-01-15 11:06:03', '2026-01-15 11:06:03'),
(5, 'biyan', 'pendirian_pt', '2026-01-19', '23', 'drafts/8RiOzosLmxxsfmlfeaoad6xIxGKnUDewX4C8Ct0g.pdf', 'asdas', '2026-01-18 21:14:48', '2026-01-18 21:14:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppat_services`
--

CREATE TABLE `ppat_services` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` enum('jual_beli','hibah','tukar_menukar','dll') COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_date` date NOT NULL,
  `object_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ppat_services`
--

INSERT INTO `ppat_services` (`id`, `client_name`, `service_type`, `document_number`, `service_date`, `object_address`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Ridho', 'hibah', '9123091270', '2025-05-28', 'rumah', 'test', '2025-05-28 05:28:12', '2025-05-28 05:28:12'),
(2, 'biyan', 'jual_beli', '1', '2026-01-16', '1', '1', '2026-01-15 11:05:39', '2026-01-15 11:05:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_submissions`
--

CREATE TABLE `request_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` enum('sertifikat','ajb','waris','lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_date` date NOT NULL,
  `status` enum('menunggu','diproses','selesai','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `document_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `service_fees`
--

CREATE TABLE `service_fees` (
  `id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_status` enum('belum_bayar','lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `service_fees`
--

INSERT INTO `service_fees` (`id`, `client_name`, `service_type`, `cost_details`, `total_amount`, `payment_status`, `payment_method`, `payment_date`, `created_at`, `updated_at`) VALUES
(6, 'asdasdsa', 'jual_beli', 'asdas', 1000000000.00, 'lunas', 'BCA', '2026-01-19', '2026-01-19 08:02:16', '2026-01-19 08:02:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x1U3Fi0LOIHNJGuXrnSxMDuwFkJAl2CyKhNwjOtt', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS3F4TGw5SEJXRjg5Q1NKZmgxZVV3MWdIbDhXRXFOUkxHZTZUVzh5VCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDt9', 1768835899);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','non-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `full_name`, `role`, `email`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(5, 'User Test', 'notaris', 'test@example.com', 'testuser', '$2y$12$.Tl5tyt8DeNAU0asx2RZbONpR/BkmiHiAv7YLqfWFLHqdY4r1lfSK', 'aktif', '2025-05-28 04:32:19', '2025-05-28 04:32:19'),
(6, 'Notaris 2', 'notaris', 'test2@example.com', 'test2', '$2y$12$iudfdps8r.9vEgFk8CRk7OsoUe/IzCGjOYRpZDZCK4Hp27pxyyw0u', 'aktif', '2025-05-28 04:52:23', '2025-05-28 05:03:20'),
(7, 'Notaris 3', 'notaris', 'Notaris3@example.com', 'ntr3', '$2y$12$7alalvcKvLEUaXFOza7B8u2O84PMI.q.N1XBksYEzCoTT4JFPzQSy', 'aktif', '2025-05-28 05:03:58', '2025-05-28 05:04:14'),
(8, 'admin 1', 'admin', 'admin1@example.com', 'adm1', '$2y$12$FnBYwTmf5Ftr/BTQbJxZ4uGFrwT54/fh/K/YhPPMxSsDz.ELj6hxO', 'aktif', '2025-05-28 05:18:06', '2025-05-30 22:46:35'),
(9, 'Administrator', 'admin', 'admin@notaris.test', 'admin', '$2y$12$LCXyzlLdKjBB.wBolApgausJzaxUbK8Gq9TSx8/UnhsqpXI/olUhq', 'aktif', '2026-01-18 08:54:18', '2026-01-18 09:44:25'),
(10, 'username@001', 'user', 'user1@example.com', 'user1', '$2y$12$mzRHvSitRUjE5vKV1fTAjuoZopRcjwXKF1lY.d/k66kxZxFM3iOQi', 'aktif', '2026-01-18 12:38:55', '2026-01-18 12:38:55'),
(11, 'staffnotaris@001', 'staff', 'staff1@example.com', 'staff1', '$2y$12$VwyJ5pvjPaSpHFUtOPgCd.grG9PiF24dgLxsVoUR4MMwmGkmBbANe', 'aktif', '2026-01-18 21:03:42', '2026-01-18 21:03:42'),
(12, 'username@002', 'user', 'user2@example.com', 'user2', '$2y$12$CoNEvZ0VHimAgJs3BN0.2.hfbGjh6w.ua0niV7.wkepvHb5dObVAq', 'aktif', '2026-01-18 21:04:39', '2026-01-18 21:04:39'),
(13, 'biyanfns', 'user', 'bynfns@example.com', 'bynfns', '$2y$12$pWiWK/5EgVrmF/OoScHoTOfJHyz8uddMUeHexHwoCs4fLnSgCkU3S', 'aktif', '2026-01-19 03:52:37', '2026-01-19 03:52:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notary_services`
--
ALTER TABLE `notary_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ppat_services`
--
ALTER TABLE `ppat_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_submissions`
--
ALTER TABLE `request_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `service_fees`
--
ALTER TABLE `service_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `notary_services`
--
ALTER TABLE `notary_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ppat_services`
--
ALTER TABLE `ppat_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `request_submissions`
--
ALTER TABLE `request_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
