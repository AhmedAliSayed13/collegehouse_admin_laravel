-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 05:36 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegehouse_admin_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'option11', NULL, NULL),
(2, 'option22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flooers`
--

CREATE TABLE `flooers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `describe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flooers`
--

INSERT INTO `flooers` (`id`, `size`, `bathroom`, `room`, `describe`, `image`, `house_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 1, '1', '16231664850room_image.png', 5, '2021-06-08 13:34:45', '2021-06-08 13:34:45'),
(8, 2, 2, 2, '2', '16231664851room_image.png', 5, '2021-06-08 13:34:45', '2021-06-08 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `front_house_images`
--

CREATE TABLE `front_house_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_house_images`
--

INSERT INTO `front_house_images` (`id`, `name`, `house_id`, `created_at`, `updated_at`) VALUES
(10, '16231495581front_house_image.png', 1, '2021-06-08 08:52:38', '2021-06-08 08:52:38'),
(11, '16231495582front_house_image.png', 1, '2021-06-08 08:52:38', '2021-06-08 08:52:38'),
(12, '16231495593front_house_image.png', 1, '2021-06-08 08:52:39', '2021-06-08 08:52:39'),
(13, '16231509220front_house_image.png', 1, '2021-06-08 09:15:22', '2021-06-08 09:15:22'),
(14, '16231650000front_house_image.png', 2, '2021-06-08 13:10:00', '2021-06-08 13:10:00'),
(15, '16231652040front_house_image.png', 3, '2021-06-08 13:13:24', '2021-06-08 13:13:24'),
(20, '16231664850front_house_image.png', 5, '2021-06-08 13:34:45', '2021-06-08 13:34:45'),
(21, '16231664851front_house_image.png', 5, '2021-06-08 13:34:45', '2021-06-08 13:34:45'),
(22, '16231664852front_house_image.png', 5, '2021-06-08 13:34:45', '2021-06-08 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_type_id` bigint(20) UNSIGNED NOT NULL,
  `num_rooms` int(11) NOT NULL,
  `num_residents` int(11) NOT NULL,
  `num_bathrooms` int(11) NOT NULL,
  `num_flooers` int(11) NOT NULL,
  `num_parkings` int(11) NOT NULL,
  `total_size` int(11) NOT NULL,
  `num_kitchens` int(11) NOT NULL,
  `annual_reset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `image_ownership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_lease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excellent_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `safety_security` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `professional_maintenance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resident_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owner_id`, `address`, `status`, `city_id`, `name`, `house_type_id`, `num_rooms`, `num_residents`, `num_bathrooms`, `num_flooers`, `num_parkings`, `total_size`, `num_kitchens`, `annual_reset`, `payment_method_id`, `image_ownership`, `image_lease`, `description`, `about`, `excellent_location`, `safety_security`, `professional_maintenance`, `resident_account`, `created_at`, `updated_at`) VALUES
(5, 2, 'التوسعات الشمالية - قطعة 816', 'asd', 1, 'qwedqwd', 1, 12, 12, 12, 12, 12, 121, 12, 'qwdxas', 4, '1623166485image_ownership.png', '1623166485image_lease.png', 'You will be redirected to an external website to complete the download.', 'You will be redirected to an external website to complete the download.', 'You will be redirected to an external website to complete the download.', 'You will be redirected to an external website to complete the download.', 'You will be redirected to an external website to complete the download.', 'You will be redirected to an external website to complete the download.', '2021-06-08 13:34:45', '2021-06-08 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `house_types`
--

CREATE TABLE `house_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `house_types`
--

INSERT INTO `house_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'op1', NULL, NULL),
(2, 'op2', NULL, NULL),
(3, 'op3', NULL, NULL),
(4, 'op4', NULL, NULL);

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
(1, '2021_06_01_125359_create_roles_table', 1),
(2, '2021_06_01_125813_create_cities_table', 2),
(3, '2014_10_12_000000_create_users_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 4),
(5, '2021_06_06_123645_create_house_types_table', 5),
(6, '2021_06_06_124631_create_payment_methods_table', 6),
(10, '2021_06_06_142233_create_forent_house_images_table', 8),
(11, '2021_06_06_144121_create_froent_house_images_table', 9),
(12, '2021_06_06_144450_create_front_house_images_table', 10),
(14, '2021_06_06_123206_create_houses_table', 11),
(15, '2021_06_08_125338_create_flooers_table', 12);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'op1', NULL, NULL),
(2, 'op2', NULL, NULL),
(3, 'op3', NULL, NULL),
(4, 'op4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'owner', NULL, NULL),
(3, 'tenant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `address`, `state`, `city_id`, `zip`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ahmed', 'ali sayed', '01112912233', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'qwde', 1, 'eqd', 'owner@gmail.com', NULL, '$2y$10$J01pToCEgIkwXq4gwP2V4uwPEz/A5Fh.j0O7Om3Yb0sHyXlJzvHjS', 2, NULL, '2021-06-02 08:42:20', '2021-06-02 09:28:09'),
(3, 'ahmed', 'mostafa ali', '01112912244', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'rerbd', 2, 'gredger', 'tenant@gmail.com', NULL, '$2y$10$kLx2oWvk52i6K5LSb1f1cOcUnVGvD3rfK0zGiT2Z/U1/eiD7ETGzm', 3, NULL, '2021-06-02 09:35:35', '2021-06-02 09:52:15'),
(4, 'ahmed', 'nour', '01112912211', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'wefcew', 2, 'ddwfcwe', 'admin@gmail.com', NULL, '$2y$10$wN/OoMc2sempSN8Kz3iFOOLSXz93UyJfkDahudqC39fXTSbWUID3e', 1, NULL, '2021-06-02 09:59:25', '2021-06-02 09:59:25'),
(5, 'ahmed', 'ali', '01112912999', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'dsds', 1, 'sdcsd', 'owner2@gmail.com', NULL, '$2y$10$FxDqg1eBjmL4p83UhM5A/uHOB0IIXoSmO7hIFc4.OaCDoNUj/z4P2', 2, NULL, '2021-06-02 11:37:23', '2021-06-02 11:37:23'),
(6, 'nour1', 'qwede', '43638248723', 'التوسعات الشمالية - قطعة 816', 'ergerge', 1, 'ergver', 'ahmednfdfour@gmail.com', NULL, '$2y$10$fwU5ATr2Wvir1rUGhTzWrOSOnLsIUJgzIXzQc6S4su8AzGsUTPOk.', 2, NULL, '2021-06-06 11:37:52', '2021-06-06 11:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flooers`
--
ALTER TABLE `flooers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flooers_house_id_foreign` (`house_id`);

--
-- Indexes for table `front_house_images`
--
ALTER TABLE `front_house_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `front_house_images_house_id_foreign` (`house_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `houses_owner_id_foreign` (`owner_id`),
  ADD KEY `houses_city_id_foreign` (`city_id`),
  ADD KEY `houses_house_type_id_foreign` (`house_type_id`),
  ADD KEY `houses_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `house_types`
--
ALTER TABLE `house_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_city_id_foreign` (`city_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flooers`
--
ALTER TABLE `flooers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `front_house_images`
--
ALTER TABLE `front_house_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `house_types`
--
ALTER TABLE `house_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flooers`
--
ALTER TABLE `flooers`
  ADD CONSTRAINT `flooers_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `front_house_images`
--
ALTER TABLE `front_house_images`
  ADD CONSTRAINT `front_house_images_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_house_type_id_foreign` FOREIGN KEY (`house_type_id`) REFERENCES `house_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
