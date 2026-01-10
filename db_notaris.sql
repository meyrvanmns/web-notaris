-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 08:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin Notaris', 'admin@example.com', '$2y$12$o/CsKvmAK1T3vOFqEmCtC.t6OSm0FIx1yryXq8nPvAyG9B87oyN02', '2025-05-26 01:22:23', '2025-05-26 01:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `identity_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` enum('aktif','non-aktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `identity_number`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rido', '801280396', 'test', '0190283128798', 'ridhostwn@gmail.com', 'aktif', '2025-05-28 05:27:31', '2025-05-28 05:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `document_date` date NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `access_status` enum('privat','publik') NOT NULL DEFAULT 'privat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `document_type`, `client_name`, `document_date`, `file_path`, `notes`, `access_status`, `created_at`, `updated_at`) VALUES
(3, 'Akte', 'Ridho', '2025-06-01', 'documents/iL8yDxn1Y7ePn8gJ0di8486eVNOpO87huOIUfXm5.pdf', 'test', 'publik', '2025-05-28 08:03:38', '2025-05-28 08:03:38');

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
(4, '2025_05_23_141103_create_request_submissions_table', 1),
(5, '2025_05_23_151945_create_clients_table', 1),
(6, '2025_05_23_163646_create_ppat_services_table', 1),
(7, '2025_05_23_164212_create_notary_services_table', 1),
(8, '2025_05_23_164954_create_service_fees_table', 1),
(9, '2025_05_23_170010_create_documents_table', 1),
(10, '2025_05_24_031102_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notary_services`
--

CREATE TABLE `notary_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `document_type` enum('pendirian_pt','perubahan_ad','kuasa','dll') NOT NULL,
  `processing_date` date NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `draft_path` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notary_services`
--

INSERT INTO `notary_services` (`id`, `client_name`, `document_type`, `processing_date`, `document_number`, `draft_path`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'Ridho', 'kuasa', '2025-05-28', '61283712638123', 'drafts/wS0OikgNyJ5tGy7tn6l7BTcgQf9xY4ur54U4CXYD.pdf', 'test', '2025-05-30 09:30:41', '2025-05-30 09:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `ppat_services`
--

CREATE TABLE `ppat_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `service_type` enum('jual_beli','hibah','tukar_menukar','dll') NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `service_date` date NOT NULL,
  `object_address` text NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppat_services`
--

INSERT INTO `ppat_services` (`id`, `client_name`, `service_type`, `document_number`, `service_date`, `object_address`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Ridho', 'hibah', '9123091270', '2025-05-28', 'rumah', 'test', '2025-05-28 05:28:12', '2025-05-28 05:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `request_submissions`
--

CREATE TABLE `request_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `request_type` enum('sertifikat','ajb','waris','lainnya') NOT NULL,
  `submission_date` date NOT NULL,
  `status` enum('menunggu','diproses','selesai','ditolak') NOT NULL DEFAULT 'menunggu',
  `notes` text DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_submissions`
--

INSERT INTO `request_submissions` (`id`, `client_name`, `request_type`, `submission_date`, `status`, `notes`, `document_path`, `created_at`, `updated_at`) VALUES
(6, 'Ridho12', 'waris', '2025-05-31', 'selesai', 'test', 'documents/9ccO8PTtYuRTNDbfHe1zCoHml7ubB1EOJMCqixTD.pdf', '2025-05-30 09:21:26', '2025-05-30 09:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `service_fees`
--

CREATE TABLE `service_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `cost_details` text NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `payment_status` enum('belum_bayar','lunas') NOT NULL DEFAULT 'belum_bayar',
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_fees`
--

INSERT INTO `service_fees` (`id`, `client_name`, `service_type`, `cost_details`, `total_amount`, `payment_status`, `payment_method`, `payment_date`, `created_at`, `updated_at`) VALUES
(2, 'Ridho', 'hibah', 'test', 100000.00, 'lunas', 'Cash', '2025-05-31', '2025-05-28 05:30:37', '2025-05-28 05:30:37');

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
('sHg6viYNT3K4QoCgxGfGB2toVfLzCgFI9CW0HGCw', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibVNvcjljSFNhVGpZWXBqZE82UWJyZTI2QWRmZmZrTmxGTjBHVXZYYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1748671915);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `role` enum('admin','notaris') NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `role`, `email`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(5, 'User Test', 'notaris', 'test@example.com', 'testuser', '$2y$12$.Tl5tyt8DeNAU0asx2RZbONpR/BkmiHiAv7YLqfWFLHqdY4r1lfSK', 'aktif', '2025-05-28 04:32:19', '2025-05-28 04:32:19'),
(6, 'Notaris 2', 'notaris', 'test2@example.com', 'test2', '$2y$12$iudfdps8r.9vEgFk8CRk7OsoUe/IzCGjOYRpZDZCK4Hp27pxyyw0u', 'aktif', '2025-05-28 04:52:23', '2025-05-28 05:03:20'),
(7, 'Notaris 3', 'notaris', 'Notaris3@example.com', 'ntr3', '$2y$12$7alalvcKvLEUaXFOza7B8u2O84PMI.q.N1XBksYEzCoTT4JFPzQSy', 'aktif', '2025-05-28 05:03:58', '2025-05-28 05:04:14'),
(8, 'admin 1', 'admin', 'admin1@example.com', 'adm1', '$2y$12$FnBYwTmf5Ftr/BTQbJxZ4uGFrwT54/fh/K/YhPPMxSsDz.ELj6hxO', 'aktif', '2025-05-28 05:18:06', '2025-05-30 22:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notary_services`
--
ALTER TABLE `notary_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppat_services`
--
ALTER TABLE `ppat_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_submissions`
--
ALTER TABLE `request_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_fees`
--
ALTER TABLE `service_fees`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notary_services`
--
ALTER TABLE `notary_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ppat_services`
--
ALTER TABLE `ppat_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_submissions`
--
ALTER TABLE `request_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_fees`
--
ALTER TABLE `service_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
