-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 03:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesiszt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL DEFAULT 0,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `confirmed_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `rooms_id` int(6) NOT NULL,
  `Total` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `guest_id`, `adult`, `children`, `check_in_date`, `check_out_date`, `payment_id`, `confirmed_by`, `rooms_id`, `Total`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 0, '2020-03-28', '2020-04-01', 2, 'pending', 102, 6400, NULL, '2020-03-27 18:34:50', '2020-03-27 18:34:59'),
(3, 3, 3, 2, '2020-03-28', '2020-03-29', 1, 'pending', 109, 4500, NULL, '2020-03-27 14:28:01', '2020-03-27 17:33:43'),
(4, 4, 1, 0, '2020-04-01', '2020-04-02', 3, 'pending', 104, 2500, NULL, '2020-03-27 18:32:25', '2020-03-27 18:33:12'),
(5, 5, 2, 0, '2020-03-28', '2020-03-29', 4, 'mick', 101, 1600, NULL, '2020-03-27 15:26:17', '2020-03-27 17:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `firstname`, `lastname`, `birthdate`, `email`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'michael', 'jays', '1995-09-16', 'michael@jay.com', 'Barra,Opol', '09099900909090', '2020-03-27 13:44:30', '2020-03-27 13:44:30'),
(2, 'dominic', 'amista', '1986-03-12', 'dominic@amista.com', 'Patag,Cagayan de Oro City', '0934829384', '2020-03-27 13:46:58', '2020-03-27 13:46:58'),
(3, 'test1', 'tes', '1982-03-09', 'test@email.com', 'march,uk', '23123123123', '2020-03-27 14:28:01', '2020-03-27 14:28:01'),
(4, 'mick', 'oliver', '1965-03-17', 'oliver@email.com', 'march,uk', '2312312312', '2020-03-27 15:01:58', '2020-03-27 15:01:58'),
(5, 'mmmm', 'iiiii', '1955-03-16', 'mmmm@mmmm.com', 'yorkshire,uk', '3423423423', '2020-03-27 15:26:17', '2020-03-27 15:26:17');

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
(3, '2019_12_19_134411_create_role_table', 1),
(4, '2019_12_19_135521_add_role_to_role_table', 1),
(5, '2020_01_31_175319_create_bookings_table', 1),
(6, '2020_02_02_163605_create_guests_table', 1),
(7, '2020_02_08_054741_rooms', 1),
(8, '2020_02_08_055801_room_category', 1),
(9, '2020_02_08_060049_add_room_category', 1),
(10, '2020_02_08_060734_payment', 1),
(11, '2020_02_08_061542_type_of_payment', 1),
(12, '2020_02_08_061821_add_type_of_payment', 1),
(13, '2020_02_08_062754_payment_status', 1),
(14, '2020_02_08_062924_add_payment_status', 1);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TypeOfPayment_id` int(11) NOT NULL DEFAULT 1,
  `status_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `TypeOfPayment_id`, `status_id`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `status`) VALUES
(1, 'Paid'),
(2, 'Un-paid');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor`, `description`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(101, 1, 'junior room asdasdamsdansda  maskdasd', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 1),
(102, 1, 'junior roo 2', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 1),
(103, 2, 'junior 3 roomasda', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 1),
(104, 2, 'standard room sdawda asd ', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 2),
(105, 2, 'standard 2', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 2),
(106, 2, 'superior room asdasd', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 3),
(107, 2, 'superior 2as asda ', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 3),
(108, 2, 'superior 3 sadasads', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 3),
(109, 1, 'family room asdasd', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 4),
(110, 2, 'family 2', '2020-02-10 16:00:00', '2020-02-10 16:00:00', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `category`, `price`) VALUES
(1, 'junior', 1600),
(2, 'standard', 2500),
(3, 'superior', 3000),
(4, 'family', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_payment`
--

CREATE TABLE `type_of_payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TypeOfPayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_of_payment`
--

INSERT INTO `type_of_payment` (`id`, `TypeOfPayment`) VALUES
(1, 'cash'),
(2, 'card');

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
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 'user2', 'user3@user.com', NULL, '$2y$10$jnJdKn2ptGWry8XZvj4BFOQXkUCkruBpeSbm4By1elBPZSFGm8zK6', '3', NULL, '2020-01-05 23:42:34', '2020-01-05 23:42:34'),
(29, 'wwww', 'wwww@gmail.com', NULL, '$2y$10$SrCvUp5inb7pbLCK/ZZa8OjKGien0yRtsS56pMiL19b252koZ0GCK', '1', NULL, '2020-01-06 02:01:25', '2020-01-06 02:01:25'),
(30, 'mick', 'mick@gmail.com', NULL, '$2y$10$/PrHSFWRtkyQcpnPknKuY.nV9I1jHxqI6PAtxaZbFFI5LTTUbvtwe', '1', NULL, '2020-02-13 02:30:53', '2020-03-25 02:57:52'),
(31, 'jelai llenes', 'llenes@email.com', NULL, '$2y$10$tfX2r8IeYAKnuorZJRD8N.rti/EJ/pnLcboJ75FluHqumSuSsDQGm', '1', NULL, '2020-03-25 03:21:19', '2020-03-25 03:21:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_payment`
--
ALTER TABLE `type_of_payment`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_of_payment`
--
ALTER TABLE `type_of_payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
