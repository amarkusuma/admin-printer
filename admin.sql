-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2020 at 03:47 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `read_at` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message_id`, `session_id`, `user_id`, `read_at`, `type`, `created_at`, `updated_at`) VALUES
(69, 69, 50, 2, NULL, 0, '2020-04-13 22:34:33', '2020-04-13 22:34:33'),
(70, 69, 50, 9, NULL, 1, '2020-04-13 22:34:33', '2020-04-13 22:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `grub_messages`
--

CREATE TABLE `grub_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grub_messages`
--

INSERT INTO `grub_messages` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(2, 2, 'gg', '2020-04-09 00:20:33', '2020-04-09 00:20:33'),
(3, 9, 'd', '2020-04-09 00:20:42', '2020-04-09 00:20:42'),
(4, 2, 'x', '2020-04-09 00:21:31', '2020-04-09 00:21:31'),
(5, 2, 'x', '2020-04-12 23:50:44', '2020-04-12 23:50:44'),
(6, 2, 'b', '2020-04-13 09:46:06', '2020-04-13 09:46:06'),
(7, 2, 'h', '2020-04-13 09:46:10', '2020-04-13 09:46:10'),
(8, 2, 'g', '2020-04-13 09:46:17', '2020-04-13 09:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `session_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `session_id`, `created_at`, `updated_at`) VALUES
(69, 'mad', 50, '2020-04-13 22:34:33', '2020-04-13 22:34:33');

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
(4, '2020_03_23_055544_create_permission_tables', 2),
(5, '2020_03_31_132818_create_messages_table', 3),
(6, '2020_04_07_072100_ceate_session_table', 4),
(7, '2020_04_07_074234_ceate_chat_table', 4),
(8, '2020_04_09_065725_create_grub-message_table', 5),
(9, '2020_04_09_071830_create_grub_messages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(15, 'App\\User', 2),
(16, 'App\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(8, 'Create', 'web', '2020-03-23 22:29:56', '2020-03-23 22:29:56'),
(9, 'Read', 'web', '2020-03-23 22:29:56', '2020-03-23 22:29:56'),
(10, 'Update', 'web', '2020-03-23 22:29:56', '2020-03-23 22:29:56'),
(11, 'Delete', 'web', '2020-03-23 22:29:56', '2020-03-23 22:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `printers`
--

CREATE TABLE `printers` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `brand` varchar(60) DEFAULT NULL,
  `stock` int(6) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printers`
--

INSERT INTO `printers` (`id`, `name`, `image`, `brand`, `stock`, `price`, `created_at`, `updated_at`) VALUES
(69, 'epson L300', 'epsonL300.jpg', 'Epson', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(81, 'epson l300', 'epsonL300.jpg', 'Epson', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(89, 'epson L300', 'epsonL300.jpg', 'Epson', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(90, 'epson L120', 'epsonL120.jpeg', 'epson', 2, 100000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(91, 'epson L300', 'epsonL300.jpg', 'Epson', 0, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(92, 'epson L120', 'epsonL120.jpeg', 'epson', 2, 100000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(93, 'Hp LaserJet 1102 ', 'hp1102.jpeg', 'Hp', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(94, 'Hp LaserJet 1025', NULL, 'Hp', 0, 100000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(95, 'Hp LaserJet 1102 ', 'hp1102.jpeg', 'Hp', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(96, 'Printer Hp L1210', 'images.jpeg', 'Hp', 1, 100000, '2020-03-13 08:01:30', '2020-04-07 00:08:37'),
(97, 'epson L300', 'epsonL300.jpg', 'Epson', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(98, 'epson L120 ', 'epsonL120.jpg', 'epson', 2, 100000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(99, 'epson L300', 'epsonL300.jpg', 'Epson', 2, 150000, '2020-03-13 08:01:30', '2020-03-13 08:01:30'),
(100, 'epson L120', 'images.jpeg', 'epson', 0, 100000, '2020-03-13 08:01:30', '2020-03-21 19:08:54'),
(106, 'hp laserjet 1025', NULL, 'hp', 2, 200000, '2020-03-21 10:46:43', '2020-03-21 10:46:43'),
(108, 'epson L3111', 'images.jpeg', 'Epson', 0, 200000, '2020-03-21 19:18:58', '2020-03-23 19:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(15, 'Manager', 'web', '2020-03-26 10:52:05', '2020-03-26 10:52:05'),
(16, 'Karyawan', 'web', '2020-03-26 10:53:55', '2020-03-26 10:53:55'),
(17, 'User', 'web', '2020-03-26 10:54:12', '2020-03-26 10:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(8, 15),
(9, 15),
(10, 15),
(11, 15),
(8, 16),
(9, 16),
(10, 16),
(8, 17),
(9, 17);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user1_id` int(10) UNSIGNED NOT NULL,
  `user2_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`) VALUES
(50, 2, 9, '2020-04-13 22:34:27', '2020-04-13 22:34:27'),
(51, 2, 8, '2020-04-13 23:51:35', '2020-04-13 23:51:35'),
(52, 2, 7, '2020-04-13 23:51:39', '2020-04-13 23:51:39');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'amar Wirahadi Kusuma', 'amarkusuma53@gmail.com', NULL, '$2y$10$zpKTcVQvN.5I7QYXGQPYNuyJj1QueiP0Yz575i4rCS94xqeQsUrwC', NULL, '2020-02-06 10:28:21', '2020-02-06 10:28:21'),
(7, 'Amar ', 'amar@gmail.com', NULL, '$2y$10$mEgrRRYgS1DCVev4nTkDDOg6mm6tCrEWHajJClnoKvvDQYHgUnHsG', NULL, '2020-03-24 00:21:25', '2020-03-24 00:21:25'),
(8, 'zainun', 'zainun@gmail.com', NULL, '$2y$10$GujHfYN8O1.GB9UDx2wPlu.dqrkLNzs22Fn7Zd3P5RJ2etxOsXUt2', NULL, '2020-04-01 01:22:18', '2020-04-01 01:22:18'),
(9, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$10$7BuV//doKweAyBLUO5P8e..if9R2gFD3ahpjkX.7b6Fv5tE6FIaOy', NULL, '2020-04-01 02:22:30', '2020-04-01 02:22:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grub_messages`
--
ALTER TABLE `grub_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printers`
--
ALTER TABLE `printers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_user1_id_user2_id_unique` (`user1_id`,`user2_id`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grub_messages`
--
ALTER TABLE `grub_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `printers`
--
ALTER TABLE `printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
