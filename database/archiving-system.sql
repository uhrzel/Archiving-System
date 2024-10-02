-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Oct 02, 2024 at 03:34 PM
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
-- Database: `archiving-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` text NOT NULL,
  `course_status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_description`, `course_status`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to Cybersecurity', 'Fundamentals of cybersecurity. Students will learn about various types of cyber threats, security protocols, and best practices for protecting sensitive information.', 'active', '2024-09-29 15:47:24', '2024-09-29 15:48:50'),
(2, 'Web Development Essentials', 'The basics of web development, including HTML, CSS, and JavaScript. Students will learn how to create responsive and visually appealing websites from scratch.', 'active', '2024-09-29 15:47:44', '2024-09-29 15:47:44'),
(3, 'Data Analysis and Visualization', 'This course focuses on the skills needed to analyze and visualize data using tools like Excel, Python, and Tableau.', 'active', '2024-09-29 15:47:58', '2024-09-29 15:47:58'),
(4, 'Cloud Computing Fundamentals', 'Students will explore different cloud service models (IaaS, PaaS, SaaS) and learn how to deploy and manage applications in the cloud.', 'active', '2024-09-29 15:48:14', '2024-09-29 15:48:14'),
(5, 'Mobile App Development', 'Students will learn about the development lifecycle, user interface design, and app deployment. The course includes hands-on projects, allowing participants to create functional mobile apps by the end of the program.', 'active', '2024-09-29 15:48:33', '2024-09-29 15:48:33');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_03_25_030544_create_failed_jobs_table', 1),
(4, '2024_09_25_150729_create_courses_table', 1),
(5, '2024_09_27_112141_create_thesis_table', 1),
(6, '2024_09_30_055328_add_status_to_thesis_table', 1),
(7, '2024_09_30_065556_add_foreignkey_to_thesis_table', 1),
(8, '2024_10_02_082219_add_columns_to_users_table', 1),
(9, '2024_10_02_085340_add_course_id_to_users_table', 1),
(10, '2024_10_02_112620_add_avatar_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('a2jr7UZDKyE5aGCwsHPazgVQAvHGgb2CzpQW63GG', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT2lXc0lTY3VxeWdaQXJma2o2RWtEbEtSYVF6bUh6UlJSdVFCdFd5dCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50cy9lZGl0LzE4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjc4NzUyMjc7fX0=', 1727875526);

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thesis_title` varchar(255) NOT NULL,
  `thesis_file` varchar(255) NOT NULL,
  `thesis_course` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `status` enum('pending','published','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `user_id`, `thesis_title`, `thesis_file`, `thesis_course`, `abstract`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Progesterone Effects in the Nervous System', 'public/thesis/CnrCAvxPASEvmIomvsX2LN8Q9PINAWCyUEiruDF6.pdf', 'Introduction to Cybersecurity', 'The sex hormone progesterone is mainly known as a key factor in establishing and maintaining pregnancy. In addition, progesterone has been shown to induce morphological changes in the central and peripheral nervous system by increasing dendrito-, spino-, and synaptogenesis in Purkinje cells (Wessel et al.: Cell Mol Life Sci (2014a) 1723–1740) and increasing axonal outgrowth in dorsal root ganglia (Olbrich et al.: Endocrinology (2013) 3784–3795).', 'pending', '2024-10-02 03:52:33', '2024-10-02 04:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` enum('pending','approved','banned') NOT NULL DEFAULT 'pending',
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `coe_file` varchar(255) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `avatar`, `remember_token`, `created_at`, `updated_at`, `coe_file`, `course_id`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$12$beqoL2WBqyOpFEJ/iTUwe.rlYg/lS56bhY7xqazehzagtpPQAgj6O', 'admin', 'approved', NULL, NULL, '2024-10-02 01:08:25', '2024-10-02 01:08:25', NULL, NULL),
(2, '2020-01431', 'Arzel John Zolina', 'arzeljrz17@gmail.com', NULL, '$2y$12$oG6CDNWqzsuUM13GeK6Xz.In.RuqidnNwgdz0C5hhAskhCKzrpGnG', 'user', 'approved', 'avatars/i92R9iG5tY7aJrelJIQ9ejK8F66WPnScDITC1wan.jpg', NULL, '2024-10-02 01:09:34', '2024-10-02 03:49:20', 'coe_files/XprZWEwBk7JGTuiXRMlvlwZPxKCfl5eM0BWdXyC8.jpg', 1),
(18, '21000', 'Reynald Agustin', 'ok@gmail.com', NULL, '$2y$12$jD0Qih2AWkB2sP5a./ycjO/UpEK7Cden1qwjwwO5upMvHLZOBMHg.', 'user', 'pending', NULL, NULL, '2024-10-02 01:57:31', '2024-10-02 01:57:31', '', 2),
(22, '2020-01432', 'John Doe', 'ajmixrhyme@gmail.com', NULL, '$2y$12$DdhW6TUCWy9SojPOLzpNuuhYJBCBonidIP4pa6UWmbOK7Xpp6MAeu', 'user', 'approved', NULL, NULL, '2024-10-02 05:20:05', '2024-10-02 05:22:28', 'coe_files/gglyfahKLvSLsbmXPC20CZVpUgEJo57KIpOOiCwU.jpg', 1);

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_course_id_foreign` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `thesis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
