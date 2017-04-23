-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 10:23 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phoana`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(11) NOT NULL,
  `user_login_time` int(11) NOT NULL COMMENT 'how many hours user can login'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `user_login_time`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `email` char(35) NOT NULL,
  `password` char(250) NOT NULL,
  `type` int(11) NOT NULL,
  `remember_token` varchar(250) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_super_admin` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Rajkot', 1, NULL, NULL, NULL),
(2, 'Ahemdabad', 1, NULL, NULL, NULL),
(3, 'Indeore', 2, NULL, NULL, NULL),
(4, 'Bhopal', 2, NULL, NULL, NULL),
(5, 'Mumbai', 3, NULL, NULL, NULL),
(6, 'Nagpur', 3, NULL, NULL, NULL),
(7, 'Karnal', 4, NULL, NULL, NULL),
(8, 'Sonipat', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'India', NULL, NULL, NULL),
(2, 'Nepal', NULL, NULL, NULL),
(3, 'Bhutan', NULL, NULL, NULL),
(4, 'Bangladesh', NULL, NULL, NULL),
(5, 'Sri Lanka', NULL, NULL, NULL),
(6, 'China', NULL, NULL, NULL),
(7, 'Russia', NULL, NULL, NULL),
(8, 'United States of America', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Gujarat', 1, NULL, NULL, NULL),
(2, 'Madhya Pradesh', 1, NULL, NULL, NULL),
(3, 'Maharashtra', 1, NULL, NULL, NULL),
(4, 'Haryana', 1, NULL, NULL, NULL),
(5, 'Panjab', 2, NULL, NULL, NULL),
(6, 'State #2', 2, NULL, NULL, NULL),
(7, 'State #3', 3, NULL, NULL, NULL),
(8, 'State #4', 3, NULL, NULL, NULL),
(9, 'State #5', 4, NULL, NULL, NULL),
(10, 'State #6', 4, NULL, NULL, NULL),
(11, 'State #7', 5, NULL, NULL, NULL),
(12, 'State #8', 5, NULL, NULL, NULL),
(13, 'State #9', 6, NULL, NULL, NULL),
(14, 'State #10', 6, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `verified_user` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `profile_type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL COMMENT '1 = Regular',
  `type` enum('0','1','2','3','4') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 = site user',
  `fbid` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `gmailid` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 = Inactive',
  `app_version` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `device_type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = web',
  `device_id` char(250) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` char(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_mobile_verify_code` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `forgottoken` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usertoken` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `expire_at` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `mobile`, `verified_user`, `profile_type`, `type`, `fbid`, `gmailid`, `status`, `app_version`, `device_type`, `device_id`, `device_token`, `email_mobile_verify_code`, `forgottoken`, `usertoken`, `remember_token`, `expire_at`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 'kkk', 'kk@gmail.com', '$2y$10$wTHm5b6x6zS7JoS3kjsnSuWmUxd0gUWvsBUxsbr8RUw1Fd0yQTQIu', '9714235022', '1', '1', '3', '', '', '1', '1.0', '1', 'ksdghds49432903efksldfh4982efkh324ot', 'asfklshafashfaskfas', '729638', '', '', '', '2017-04-24 02:01:19', '2017-04-23 19:54:25', '2017-04-23 10:31:19', '2017-04-23 14:24:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile_detail`
--

CREATE TABLE `users_profile_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` char(35) COLLATE utf8_unicode_ci NOT NULL,
  `image` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `alternative_mobile` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `userwebsite` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `usernotification` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `latitude` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_profile_detail`
--

INSERT INTO `users_profile_detail` (`id`, `user_id`, `first_name`, `last_name`, `image`, `alternative_mobile`, `userwebsite`, `address`, `birthday`, `usernotification`, `latitude`, `longitude`, `city`, `state`, `country`, `pincode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 'kaushik', 'kothiya', '', '', '', '', '0000-00-00', '1', '90345', '09376309673', '', '', '', '', NULL, '2017-04-23 14:22:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `users_profile_detail`
--
ALTER TABLE `users_profile_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users_profile_detail`
--
ALTER TABLE `users_profile_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
