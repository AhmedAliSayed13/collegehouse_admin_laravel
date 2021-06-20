-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 04:44 PM
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
  `register_vote` tinyint(1) NOT NULL,
  `both_parents_signing` tinyint(1) NOT NULL,
  `parent_information2_id` bigint(20) UNSIGNED NOT NULL,
  `parents_sign_not_other_reasons` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_information1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason_sign_parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `have_rental_history` tinyint(1) NOT NULL,
  `have_employment_history` tinyint(1) NOT NULL,
  `applicant_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_and_conditions` tinyint(1) NOT NULL,
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

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alpha Delta Phi (IFC)', NULL, NULL),
(2, 'Alpha Epsilon Pi (IFC)', NULL, NULL),
(3, 'Alpha Phi Alpha Fraternity, Inc. (NPHC)', NULL, NULL),
(4, 'Alpha Sigma Phi (IFC)', NULL, NULL),
(5, 'Alpha Tau Omega (IFC)', NULL, NULL),
(6, 'Beta Theta Pi (IFC)', NULL, NULL),
(7, 'Chi Phi (IFC)', NULL, NULL),
(8, 'Delta Sigma Phi (IFC)', NULL, NULL),
(9, 'Delta Upsilon (IFC)', NULL, NULL),
(10, 'Iota Nu Delta Fraternity, Inc. (MGC)', NULL, NULL),
(11, 'Kappa Alpha Order (IFC)', NULL, NULL),
(12, 'Kappa Alpha Psi Fraternity, Inc. (NPHC)', NULL, NULL),
(13, 'Lambda Chi Alpha (IFC)', NULL, NULL),
(14, 'Lambda Upsilon Lambda Fraternity, Inc. (MGC)', NULL, NULL),
(15, 'Phi Delta Sigma Fraternity, Inc. (MGC)', NULL, NULL),
(16, 'Phi Delta Theta (IFC)', NULL, NULL),
(17, 'Phi Kappa Psi (IFC)', NULL, NULL),
(18, 'Phi Kappa Tau (IFC)', NULL, NULL),
(19, 'Phi Sigma Kappa (IFC)', NULL, NULL),
(20, 'Pi Kappa Alpha (IFC)', NULL, NULL),
(21, 'Sigma Alpha Epsilon (IFC)', NULL, NULL),
(22, 'Sigma Alpha Mu (IFC)', NULL, NULL),
(23, 'Sigma Chi (IFC)', NULL, NULL),
(24, 'Sigma Nu (IFC)', NULL, NULL),
(25, 'Sigma Phi Epsilon (IFC)', NULL, NULL),
(26, 'Tau Epsilon Phi (IFC)', NULL, NULL),
(27, 'Theta Chi (IFC)', NULL, NULL),
(28, 'Zeta Beta Tau (IFC)', NULL, NULL),
(29, 'Zeta Psi (IFC)', NULL, NULL),
(30, 'Alpha Chi Omega (PHA)', NULL, NULL),
(31, 'Alpha Delta Pi (PHA)', NULL, NULL),
(32, 'Alpha Epsilon Phi (PHA)', NULL, NULL),
(33, 'Alpha Kappa Alpha Sorority, Inc. (NPHC)', NULL, NULL),
(34, 'Alpha Omicron Pi (PHA)', NULL, NULL),
(35, 'Alpha Phi (PHA)', NULL, NULL),
(36, 'Alpha Xi Delta (PHA)', NULL, NULL),
(37, 'Delta Delta Delta (PHA)', NULL, NULL),
(38, 'Delta Gamma (PHA)', NULL, NULL),
(39, 'Delta Phi Epsilon (PHA)', NULL, NULL),
(40, 'Delta Sigma Theta Sorority, Inc. (NPHC)', NULL, NULL),
(41, 'Gamma Phi Beta (PHA)', NULL, NULL),
(42, 'Hermandad de Sigma Iota Alpha, Inc. (MGC)', NULL, NULL),
(43, 'Kappa Alpha Theta (PHA)', NULL, NULL),
(44, 'Kappa Delta (PHA)', NULL, NULL),
(45, 'Kappa Lambda Xi Multicultural Sorority, Inc. (MGC)', NULL, NULL),
(46, 'Kappa Phi Lambda Sorority, Inc. (MGC)', NULL, NULL),
(47, 'Lambda Theta Alpha Latin Sorority, Inc. (MGC)', NULL, NULL),
(48, 'Phi Sigma Sigma (PHA)', NULL, NULL),
(49, 'Sigma Delta Tau (PHA)', NULL, NULL),
(50, 'Sigma Kappa (PHA)', NULL, NULL),
(51, 'Sigma Psi Zeta Sorority, Inc. (MGC)', NULL, NULL),
(52, 'Zeta Tau Alpha (PHA)', NULL, NULL),
(53, 'alpha Kappa Delta Phi Sorority, Inc. (MGC)', NULL, NULL),
(54, 'N/A', NULL, NULL);

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
(1, 'Adak', NULL, NULL),
(2, 'Akiachak', NULL, NULL),
(5, 'Akiak', NULL, NULL),
(6, 'Akutan', NULL, NULL),
(7, 'Alakanuk', NULL, NULL),
(8, 'Aleknagik', NULL, NULL),
(9, 'Allakaket', NULL, NULL),
(10, 'Ambler', NULL, NULL),
(11, 'Anaktuvuk Pass', NULL, NULL),
(12, 'Anchor Point', NULL, NULL),
(13, 'Anchorage', NULL, NULL),
(14, 'Anderson', NULL, NULL),
(15, 'Angoon', NULL, NULL),
(16, 'Aniak', NULL, NULL),
(17, 'Anvik', NULL, NULL),
(18, 'Arctic Village', NULL, NULL),
(19, 'Atka', NULL, NULL),
(20, 'Atqasuk', NULL, NULL),
(21, 'Auke Bay', NULL, NULL),
(22, 'Barrow', NULL, NULL),
(23, 'Beaver', NULL, NULL),
(24, 'Bethel', NULL, NULL),
(25, 'Bettles Field', NULL, NULL),
(26, 'Big Lake', NULL, NULL),
(27, 'Brevig Mission', NULL, NULL),
(28, 'Buckland', NULL, NULL),
(29, 'Cantwell', NULL, NULL),
(30, 'Central', NULL, NULL),
(31, 'Chalkyitsik', NULL, NULL),
(32, 'Chefornak', NULL, NULL),
(33, 'Chevak', NULL, NULL),
(34, 'Chicken', NULL, NULL),
(35, 'Chignik', NULL, NULL),
(36, 'Chignik Lagoon', NULL, NULL),
(37, 'Chignik Lake', NULL, NULL),
(38, 'Chitina', NULL, NULL),
(39, 'Chugiak', NULL, NULL),
(40, 'Circle', NULL, NULL),
(41, 'Clam Gulch', NULL, NULL),
(42, 'Clarks Point', NULL, NULL),
(43, 'Clear', NULL, NULL),
(44, 'Coffman Cove', NULL, NULL),
(45, 'Cold Bay', NULL, NULL),
(46, 'Cooper Landing', NULL, NULL),
(47, 'Copper Center', NULL, NULL),
(48, 'Cordova', NULL, NULL),
(49, 'Craig', NULL, NULL),
(50, 'Crooked Creek', NULL, NULL),
(51, 'Deering', NULL, NULL),
(52, 'Delta Junction', NULL, NULL),
(53, 'Denali National Park', NULL, NULL),
(54, 'Dillingham', NULL, NULL),
(55, 'Douglas', NULL, NULL),
(56, 'Dutch Harbor', NULL, NULL),
(57, 'Eagle', NULL, NULL),
(58, 'Eagle River', NULL, NULL),
(59, 'Eek', NULL, NULL),
(60, 'Egegik', NULL, NULL),
(61, 'Eielson Afb', NULL, NULL),
(62, 'Ekwok', NULL, NULL),
(63, 'Elfin Cove', NULL, NULL),
(64, 'Elim', NULL, NULL),
(65, 'Elmendorf Afb', NULL, NULL),
(66, 'Emmonak', NULL, NULL),
(67, 'Ester', NULL, NULL),
(68, 'Fairbanks', NULL, NULL),
(69, 'False Pass', NULL, NULL),
(70, 'Fort Greely', NULL, NULL),
(71, 'Fort Richardson', NULL, NULL),
(72, 'Fort Wainwright', NULL, NULL),
(73, 'Fort Yukon', NULL, NULL),
(74, 'Gakona', NULL, NULL),
(75, 'Galena', NULL, NULL),
(76, 'Gambell', NULL, NULL),
(77, 'Girdwood', NULL, NULL),
(78, 'Glennallen', NULL, NULL),
(79, 'Goodnews Bay', NULL, NULL),
(80, 'Grayling', NULL, NULL),
(81, 'Gustavus', NULL, NULL),
(82, 'Haines', NULL, NULL),
(83, 'Healy', NULL, NULL),
(84, 'Holy Cross', NULL, NULL),
(85, 'Homer', NULL, NULL),
(86, 'Hoonah', NULL, NULL),
(87, 'Hooper Bay', NULL, NULL),
(88, 'Hope', NULL, NULL),
(89, 'Houston', NULL, NULL),
(90, 'Hughes', NULL, NULL),
(91, 'Huslia', NULL, NULL),
(92, 'Hydaburg', NULL, NULL),
(93, 'Hyder', NULL, NULL),
(94, 'Iliamna', NULL, NULL),
(95, 'Indian', NULL, NULL),
(96, 'Juneau', NULL, NULL),
(97, 'Kake', NULL, NULL),
(98, 'Kaktovik', NULL, NULL),
(99, 'Kalskag', NULL, NULL),
(100, 'Kaltag', NULL, NULL),
(101, 'Karluk', NULL, NULL),
(102, 'Kasigluk', NULL, NULL),
(103, 'Kasilof', NULL, NULL),
(104, 'Kenai', NULL, NULL),
(105, 'Ketchikan', NULL, NULL),
(106, 'Kiana', NULL, NULL),
(107, 'King Cove', NULL, NULL),
(108, 'King Salmon', NULL, NULL),
(109, 'Kipnuk', NULL, NULL),
(110, 'Kivalina', NULL, NULL),
(111, 'Klawock', NULL, NULL),
(112, 'Kobuk', NULL, NULL),
(113, 'Kodiak', NULL, NULL),
(114, 'Kongiganak', NULL, NULL),
(115, 'Kotlik', NULL, NULL),
(116, 'Kotzebue', NULL, NULL),
(117, 'Koyuk', NULL, NULL),
(118, 'Koyukuk', NULL, NULL),
(119, 'Kwethluk', NULL, NULL),
(120, 'Kwigillingok', NULL, NULL),
(121, 'Lake Minchumina', NULL, NULL),
(122, 'Larsen Bay', NULL, NULL),
(123, 'Levelock', NULL, NULL),
(124, 'Lower Kalskag', NULL, NULL),
(125, 'Manley Hot Springs', NULL, NULL),
(126, 'Manokotak', NULL, NULL),
(127, 'Marshall', NULL, NULL),
(128, 'Mc Grath', NULL, NULL),
(129, 'Mekoryuk', NULL, NULL),
(130, 'Metlakatla', NULL, NULL),
(131, 'Meyers Chuck', NULL, NULL),
(132, 'Minto', NULL, NULL),
(133, 'Moose Pass', NULL, NULL),
(134, 'Mountain Village', NULL, NULL),
(135, 'Naknek', NULL, NULL),
(136, 'Napakiak', NULL, NULL),
(137, 'Nenana', NULL, NULL),
(138, 'New Stuyahok', NULL, NULL),
(139, 'Nightmute', NULL, NULL),
(140, 'Nikiski', NULL, NULL),
(141, 'Nikolai', NULL, NULL),
(142, 'Nikolski', NULL, NULL),
(143, 'Ninilchik', NULL, NULL),
(144, 'Noatak', NULL, NULL),
(145, 'Nome', NULL, NULL),
(146, 'Nondalton', NULL, NULL),
(147, 'Noorvik', NULL, NULL),
(148, 'North Pole', NULL, NULL),
(149, 'Northway', NULL, NULL),
(150, 'Nuiqsut', NULL, NULL),
(151, 'Nulato', NULL, NULL),
(152, 'Nunam Iqua', NULL, NULL),
(153, 'Nunapitchuk', NULL, NULL),
(154, 'Old Harbor', NULL, NULL),
(155, 'Ouzinkie', NULL, NULL),
(156, 'Palmer', NULL, NULL),
(157, 'Pedro Bay', NULL, NULL),
(158, 'Pelican', NULL, NULL),
(159, 'Perryville', NULL, NULL),
(160, 'Petersburg', NULL, NULL);

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
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_gross_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_work` tinyint(1) DEFAULT NULL,
  `employment_date_start` date NOT NULL,
  `employment_date_end` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- Dumping data for table `flooers`
--

INSERT INTO `flooers` (`id`, `size`, `bathroom`, `room`, `describe`, `image`, `house_id`, `created_at`, `updated_at`) VALUES
(23, 926, 1, 1, 'Exterior Details The first floor has three rooms, a large living space, dining area, open kitchen, and a bathroom, with plenty of closets.', '16241995880room_image.png', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(24, 774, 2, 4, 'Exterior Details The first floor has three rooms, a large living space, dining area, open kitchen, and a bathroom, with plenty of closets.', '16241995881room_image.png', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(25, 1070, 1, 3, 'Exterior Details The first floor has three rooms, a large living space, dining area, open kitchen, and a bathroom, with plenty of closets.', '16242001670room_image.png', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47'),
(26, 684, 1, 3, 'Exterior Details The first floor has three rooms, a large living space, dining area, open kitchen, and a bathroom, with plenty of closets.', '16242001671room_image.png', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47'),
(27, 571, 1, 3, 'Exterior Details The first floor has three rooms, a large living space, dining area, open kitchen, and a bathroom, with plenty of closets.', '16242001672room_image.png', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47');

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
(48, '16241995880front_house_image.jpg', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(49, '16241995881front_house_image.jpg', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(50, '16241995882front_house_image.jpg', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(51, '16241995883front_house_image.jpg', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(52, '16241995884front_house_image.jpg', 8, '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(53, '16242001660front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(54, '16242001661front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(55, '16242001662front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(56, '16242001663front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(57, '16242001664front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(58, '16242001665front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(59, '16242001666front_house_image.jpg', 9, '2021-06-20 12:42:46', '2021-06-20 12:42:46'),
(60, '16242001677front_house_image.jpg', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47'),
(61, '16242001678front_house_image.jpg', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47'),
(62, '16242001679front_house_image.jpg', 9, '2021-06-20 12:42:47', '2021-06-20 12:42:47');

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

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owner_id`, `address`, `status`, `city_id`, `name`, `house_type_id`, `num_rooms`, `num_residents`, `num_bathrooms`, `num_flooers`, `num_parkings`, `total_size`, `num_kitchens`, `annual_reset`, `payment_method_id`, `image_ownership`, `image_lease`, `description`, `about`, `excellent_location`, `safety_security`, `professional_maintenance`, `resident_account`, `video`, `pdf`, `created_at`, `updated_at`) VALUES
(8, 2, '4620 College Ave', 'Maryland', 19, '4620 College Ave', 1, 5, 25, 2, 3, 1, 1700, 1, '6000', 1, '1624199588image_ownership.png', '1624199588image_lease.png', 'Spacious off-campus college house for rent near University of Maryland, College Park. An excellent choice for your next school year only 3 minutes away from your campus!', 'Spacious off-campus college house for rent near University of Maryland, College Park. An excellent choice for your next school year only 3 minutes away from your campus!', 'Just under half a mile from campus!', 'The City of College Park public safety and code enforcement patrol officers patrol the neighborhood regularly and our maintenance team is available 24/7 for maintenance emergencies.', 'All routine house maintenance and your repair needs are addressed by our professional maintenance team.', 'One online account to access your lease information, balance, see important announcements, submit maintenance requests, and more.', '1624199588video.mp4', '1624199588pdf.pdf', '2021-06-20 12:33:08', '2021-06-20 12:33:08'),
(9, 5, '4603 Knox Road', 'Maryland', 5, '4603 Knox Road', 1, 6, 3, 3, 3, 3, 2505, 3, '6100', 4, '1624200166image_ownership.png', '1624200166image_lease.png', 'Awesome Location and Awesome House! New, spacious off-campus college rental near University of Maryland, College Park. An excellent choice for your next school year only a few minutes away from your campus!', '4603 Knox Road is an ideal house for your off-campus residence! With six rooms, three bathrooms, porch room and a lot of living space. Semi furnished including all your kitchen items plus lots of build-ins that eliminates furniture needs.', 'Just under half a mile from campus!', 'The City of College Park public safety and code enforcement patrol officers patrol the neighborhood regularly and our maintenance team is available 24/7 for maintenance emergencies.', 'All routine house maintenance and your repair needs are addressed by our professional maintenance team.', 'One online account to access your lease information, balance, see important announcements, submit maintenance requests, and more.', '1624200166video.mp4', '1624200166pdf.pdf', '2021-06-20 12:42:46', '2021-06-20 12:42:46');

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
(31, '2021_06_14_084929_create_reason_sign_parents_table', 27),
(36, '2021_06_10_193622_create_applications_table', 28),
(37, '2021_06_12_100742_create_rental_histories_table', 29),
(38, '2021_06_11_113246_create_parent_informations_table', 30),
(39, '2021_06_12_101908_create_employments_table', 31);

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

--
-- Dumping data for table `paying_rents`
--

INSERT INTO `paying_rents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Self', NULL, NULL),
(2, 'Parents', NULL, NULL),
(3, 'Scholarships', NULL, NULL),
(4, 'Others', NULL, NULL);

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
(1, 'Quarterly', NULL, NULL),
(2, 'Biannual', NULL, NULL),
(3, 'Yearly', NULL, NULL),
(4, 'Monthly', NULL, NULL),
(5, 'Bimonthly', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reason_sign_parents`
--

CREATE TABLE `reason_sign_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reason_sign_parents`
--

INSERT INTO `reason_sign_parents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Passed away', NULL, NULL),
(2, 'Have no contact', NULL, NULL),
(3, 'Financially independent', NULL, NULL),
(4, 'Other', NULL, NULL);

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
(2, 'ahmed', 'ali sayed', '01112912233', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'qwde', 2, 'eqd', 'owner@gmail.com', NULL, '$2y$10$QQL2.pY56aS.am4QzhpwO.SCv0OF4tNX2MeuBpiaXb4PgZvkIFaM6', 2, NULL, '2021-06-02 06:42:20', '2021-06-09 16:16:42'),
(3, 'ahmed', 'mostafa ali', '01112912244', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'rerbd', 2, 'gredger', 'tenant@gmail.com', NULL, '$2y$10$kLx2oWvk52i6K5LSb1f1cOcUnVGvD3rfK0zGiT2Z/U1/eiD7ETGzm', 3, NULL, '2021-06-02 07:35:35', '2021-06-02 07:52:15'),
(4, 'ahmed', 'nour', '01112912211', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'wefcew', 2, 'ddwfcwe', 'admin@gmail.com', NULL, '$2y$10$wN/OoMc2sempSN8Kz3iFOOLSXz93UyJfkDahudqC39fXTSbWUID3e', 1, NULL, '2021-06-02 07:59:25', '2021-06-02 07:59:25'),
(5, 'ahmed', 'ali', '01112912999', '٤٢٩ المحور المركزى _ الحي الأول - 6 أكتوبر _ أمام جامعه 6 اكتوبر', 'dsds', 1, 'sdcsd', 'owner2@gmail.com', NULL, '$2y$10$FxDqg1eBjmL4p83UhM5A/uHOB0IIXoSmO7hIFc4.OaCDoNUj/z4P2', 2, NULL, '2021-06-02 09:37:23', '2021-06-02 09:37:23'),
(6, 'mostafa', 'adel', '43638248723', 'التوسعات الشمالية - قطعة 816', 'ergerge', 160, 'ergver', 'ahmednfdfour@gmail.com', NULL, '$2y$10$fwU5ATr2Wvir1rUGhTzWrOSOnLsIUJgzIXzQc6S4su8AzGsUTPOk.', 2, NULL, '2021-06-06 09:37:52', '2021-06-20 12:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applications_gender_id_foreign` (`gender_id`),
  ADD KEY `applications_city_id_foreign` (`city_id`),
  ADD KEY `applications_state_id_foreign` (`state_id`),
  ADD KEY `applications_house_type_id_foreign` (`house_type_id`),
  ADD KEY `applications_chapter_id_foreign` (`chapter_id`),
  ADD KEY `applications_payment_method_id_foreign` (`payment_method_id`),
  ADD KEY `applications_paying_rent_id_foreign` (`paying_rent_id`),
  ADD KEY `applications_room_type_id_foreign` (`room_type_id`),
  ADD KEY `applications_room_id_foreign` (`room_id`),
  ADD KEY `applications_parent_information2_id_foreign` (`parent_information2_id`),
  ADD KEY `applications_parent_information1_id_foreign` (`parent_information1_id`),
  ADD KEY `applications_reason_sign_parent_id_foreign` (`reason_sign_parent_id`);

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
-- Indexes for table `reason_sign_parents`
--
ALTER TABLE `reason_sign_parents`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flooers`
--
ALTER TABLE `flooers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `front_house_images`
--
ALTER TABLE `front_house_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `house_types`
--
ALTER TABLE `house_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `parent_informations`
--
ALTER TABLE `parent_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paying_rents`
--
ALTER TABLE `paying_rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reason_sign_parents`
--
ALTER TABLE `reason_sign_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rental_histories`
--
ALTER TABLE `rental_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `applications_reason_sign_parent_id_foreign` FOREIGN KEY (`reason_sign_parent_id`) REFERENCES `reason_sign_parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
