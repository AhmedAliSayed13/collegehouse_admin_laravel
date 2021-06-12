-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 01:28 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_type_id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa` int(11) NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `paying_rent_id` bigint(20) UNSIGNED NOT NULL,
  `bringing_Car` tinyint(1) NOT NULL,
  `requested_houses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_pay_dollars` int(11) NOT NULL,
  `car_make` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_license_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_property` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_lead_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_member_name_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_member_name_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_member_name_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_member_name_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem-with-both-parents-signing` tinyint(1) NOT NULL,
  `parents_sign_not` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_sign_not_other_reasons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_information1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_information2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `have_rental_history` tinyint(1) NOT NULL,
  `have_employment_history` tinyint(1) NOT NULL,
  `applicant-full-name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_gross_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_work` tinyint(1) NOT NULL,
  `employment_date_start` date NOT NULL,
  `employment_date_end` date DEFAULT NULL,
  `supervisor_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', NULL, NULL),
(2, 'feMale', NULL, NULL),
(3, 'Prefer not to say', NULL, NULL);

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
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Group House', NULL, NULL),
(2, 'Boarding House', NULL, NULL);

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
(15, '2021_06_08_125338_create_flooers_table', 12),
(16, '2021_06_06_123206_create_houses_table', 13),
(17, '2021_06_11_091808_create_genders_table', 14),
(18, '2021_06_11_092859_create_states_table', 15),
(19, '2021_06_11_093312_create_chapters_table', 16),
(20, '2021_06_11_093833_create_paying_rents_table', 17),
(21, '2021_06_11_094951_create_room_types_table', 18),
(22, '2021_06_11_094836_create_rooms_table', 19),
(24, '2021_06_11_113246_create_parent_informations_table', 21),
(27, '2021_06_12_101908_create_employments_table', 24),
(28, '2021_06_12_100742_create_rental_histories_table', 25),
(30, '2021_06_10_193622_create_applications_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `parent_informations`
--

CREATE TABLE `parent_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_employment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `paying_rents`
--

CREATE TABLE `paying_rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `rental_histories`
--

CREATE TABLE `rental_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_date` date NOT NULL,
  `monthly_rent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason_leaving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_id` bigint(20) UNSIGNED NOT NULL,
  `room_type_id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single', NULL, NULL),
(2, 'Double', NULL, NULL),
(3, 'Suite Single', NULL, NULL),
(4, 'Suite Double', NULL, NULL),
(5, 'Apartment', NULL, NULL),
(6, 'Basement Double', NULL, NULL),
(7, 'Basement Triple', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alabama', NULL, NULL),
(2, 'Alaska', NULL, NULL),
(3, 'Arizona', NULL, NULL),
(4, 'Arkansas', NULL, NULL),
(5, 'California', NULL, NULL),
(6, 'Colorado', NULL, NULL),
(7, 'Connecticut', NULL, NULL),
(8, 'Delaware', NULL, NULL),
(9, 'District Of Columbia', NULL, NULL),
(10, 'Florida', NULL, NULL),
(11, 'Georgia', NULL, NULL),
(12, 'Hawaii', NULL, NULL),
(13, 'Idaho', NULL, NULL),
(14, 'Illinois', NULL, NULL),
(15, 'Indiana', NULL, NULL),
(16, 'Iowa', NULL, NULL),
(17, 'Kansas', NULL, NULL),
(18, 'Kentucky', NULL, NULL),
(19, 'Louisiana', NULL, NULL),
(20, 'Maine', NULL, NULL),
(21, 'Maryland', NULL, NULL),
(22, 'Massachusetts', NULL, NULL),
(23, 'Michigan', NULL, NULL),
(24, 'Minnesota', NULL, NULL),
(25, 'Mississippi', NULL, NULL),
(26, 'Missouri', NULL, NULL),
(27, 'Montana', NULL, NULL),
(28, 'Nebraska', NULL, NULL),
(29, 'Nevada', NULL, NULL),
(30, 'New Hampshire', NULL, NULL),
(31, 'New Jersey', NULL, NULL),
(32, 'New Mexico', NULL, NULL),
(33, 'New York', NULL, NULL),
(34, 'North Carolina', NULL, NULL),
(35, 'North Dakota', NULL, NULL),
(36, 'Ohio', NULL, NULL),
(37, 'Oklahoma', NULL, NULL),
(38, 'Oregon', NULL, NULL),
(39, 'Pennsylvania', NULL, NULL),
(40, 'Rhode Island', NULL, NULL),
(41, 'South Carolina', NULL, NULL),
(42, 'South Dakota', NULL, NULL),
(43, 'Tennessee', NULL, NULL),
(44, 'Texas', NULL, NULL),
(45, 'Utah', NULL, NULL),
(46, 'Vermont', NULL, NULL),
(47, 'Virginia', NULL, NULL),
(48, 'Washington', NULL, NULL),
(49, 'West Virginia', NULL, NULL),
(50, 'Wisconsin', NULL, NULL),
(51, 'Wyoming', NULL, NULL);

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
(2, 'ahmed', 'ali sayed', '01112912233', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'qwde', 2, 'eqd', 'owner@gmail.com', NULL, '$2y$10$QQL2.pY56aS.am4QzhpwO.SCv0OF4tNX2MeuBpiaXb4PgZvkIFaM6', 2, NULL, '2021-06-02 08:42:20', '2021-06-09 18:16:42'),
(3, 'ahmed', 'mostafa ali', '01112912244', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'rerbd', 2, 'gredger', 'tenant@gmail.com', NULL, '$2y$10$kLx2oWvk52i6K5LSb1f1cOcUnVGvD3rfK0zGiT2Z/U1/eiD7ETGzm', 3, NULL, '2021-06-02 09:35:35', '2021-06-02 09:52:15'),
(4, 'ahmed', 'nour', '01112912211', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'wefcew', 2, 'ddwfcwe', 'admin@gmail.com', NULL, '$2y$10$wN/OoMc2sempSN8Kz3iFOOLSXz93UyJfkDahudqC39fXTSbWUID3e', 1, NULL, '2021-06-02 09:59:25', '2021-06-02 09:59:25'),
(5, 'ahmed', 'ali', '01112912999', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'dsds', 1, 'sdcsd', 'owner2@gmail.com', NULL, '$2y$10$FxDqg1eBjmL4p83UhM5A/uHOB0IIXoSmO7hIFc4.OaCDoNUj/z4P2', 2, NULL, '2021-06-02 11:37:23', '2021-06-02 11:37:23'),
(6, 'nour1', 'qwede', '43638248723', 'التوسعات الشمالية - قطعة 816', 'ergerge', 1, 'ergver', 'ahmednfdfour@gmail.com', NULL, '$2y$10$fwU5ATr2Wvir1rUGhTzWrOSOnLsIUJgzIXzQc6S4su8AzGsUTPOk.', 2, NULL, '2021-06-06 11:37:52', '2021-06-06 11:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_email_unique` (`email`),
  ADD KEY `applications_gender_id_foreign` (`gender_id`),
  ADD KEY `applications_city_id_foreign` (`city_id`),
  ADD KEY `applications_state_id_foreign` (`state_id`),
  ADD KEY `applications_house_type_id_foreign` (`house_type_id`),
  ADD KEY `applications_chapter_id_foreign` (`chapter_id`),
  ADD KEY `applications_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `applications_paying_rent_id_foreign` (`paying_rent_id`),
  ADD KEY `applications_room_type_id_foreign` (`room_type_id`),
  ADD KEY `applications_room_id_foreign` (`room_id`),
  ADD KEY `applications_parent_information1_id_foreign` (`parent_information1_id`),
  ADD KEY `applications_parent_information2_id_foreign` (`parent_information2_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employments_application_id_foreign` (`application_id`),
  ADD KEY `employments_city_id_foreign` (`city_id`),
  ADD KEY `employments_state_id_foreign` (`state_id`);

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
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `parent_informations`
--
ALTER TABLE `parent_informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parent_informations_email_unique` (`email`),
  ADD KEY `parent_informations_city_id_foreign` (`city_id`),
  ADD KEY `parent_informations_state_id_foreign` (`state_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paying_rents`
--
ALTER TABLE `paying_rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_histories`
--
ALTER TABLE `rental_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rental_histories_application_id_foreign` (`application_id`),
  ADD KEY `rental_histories_city_id_foreign` (`city_id`),
  ADD KEY `rental_histories_state_id_foreign` (`state_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_house_id_foreign` (`house_id`),
  ADD KEY `rooms_room_type_id_foreign` (`room_type_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flooers`
--
ALTER TABLE `flooers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `front_house_images`
--
ALTER TABLE `front_house_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `house_types`
--
ALTER TABLE `house_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `parent_informations`
--
ALTER TABLE `parent_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paying_rents`
--
ALTER TABLE `paying_rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rental_histories`
--
ALTER TABLE `rental_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_house_type_id_foreign` FOREIGN KEY (`house_type_id`) REFERENCES `house_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_parent_information1_id_foreign` FOREIGN KEY (`parent_information1_id`) REFERENCES `parent_informations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_parent_information2_id_foreign` FOREIGN KEY (`parent_information2_id`) REFERENCES `parent_informations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_paying_rent_id_foreign` FOREIGN KEY (`paying_rent_id`) REFERENCES `paying_rents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employments`
--
ALTER TABLE `employments`
  ADD CONSTRAINT `employments_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employments_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employments_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `parent_informations`
--
ALTER TABLE `parent_informations`
  ADD CONSTRAINT `parent_informations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_informations_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rental_histories`
--
ALTER TABLE `rental_histories`
  ADD CONSTRAINT `rental_histories_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_histories_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rental_histories_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_house_id_foreign` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
