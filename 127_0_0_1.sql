-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 08:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--
CREATE DATABASE IF NOT EXISTS `backend` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `backend`;

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE `ceo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `organization_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'May mặc - Thời trang', 'Sed tempora saepe aut quo molestiae animi laboris esse', '2021-12-09 04:00:29', '2021-12-13 09:23:31', NULL),
(2, 'Nhà hàng - Ẩm thực', 'Aliqua Sint nihil saepe qui amet tempora in quasi distinctio Consequatur autem officia exercitationem ullam', '2021-12-09 04:00:34', '2021-12-13 09:23:52', NULL),
(3, 'Phụ tùng - Cơ khí', 'Assumenda officiis itaque temporibus ipsum officia ea velit', '2021-12-09 04:00:38', '2021-12-13 09:24:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `ceo_id` int(11) DEFAULT NULL,
  `licence` varchar(36) NOT NULL,
  `db_name` varchar(24) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->trial\r\n1->active\r\n2->lock',
  `lock_status` int(11) NOT NULL DEFAULT 0 COMMENT '0-active\r\n1-lock',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `profile_id`, `name`, `logo`, `ceo_id`, `licence`, `db_name`, `status`, `lock_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 'Bếp mẹ Na', 'img/organization_logos/bep_me_na.png', 1, '5e48fb686765e99f79978a45165fd5f0ae22', 'bep_me_na', 1, 0, '2021-12-04 04:25:04', '2021-12-11 02:22:43', NULL),
(51, 159, 'Jael Mckenzie', 'img/organization_logos/CaseyMerrill.png', 1, '326331e6165f72823bab2f1af1f13a34e17d', 'CaseyMerrill', 0, 0, '2021-12-10 08:34:39', '2021-12-10 08:34:39', '2021-12-20 04:54:50'),
(52, 160, 'Edan Farmer', 'img/organization_logos/abc.png', 1, '90aa740a067532936c403c3085134853efd7', 'abc', 0, 0, '2021-12-01 06:57:50', '2021-12-20 08:30:25', '2021-12-20 08:30:25'),
(53, 161, 'Drake Carpenter', 'img/organization_logos/aaa.png', 1, '1baa46bd16f2263d82d7d7e8db0066e75c43', 'aaa', 0, 0, '2021-12-01 09:03:47', '2021-12-20 10:01:15', '2021-12-20 10:01:15'),
(54, 162, 'Ramona Gardner', 'img/organization_logos/qqq.png', 1, '34bd4dd7df728b266b64c8b14b7ae3fdd24e', 'qqq', 0, 0, '2021-12-20 10:24:44', '2021-12-20 10:24:45', '2021-12-19 10:29:07'),
(55, 163, 'Jakeem Hardin', 'img/organization_logos/rrr.png', 1, '455def06d940b9b7776c44e7d84a05465677', 'rrr', 0, 0, '2021-12-01 10:27:43', '2021-12-20 10:29:21', '2021-12-20 10:29:21'),
(56, 164, 'Ruth Hogan', 'img/organization_logos/FionaMcdaniel.png', 1, 'a932fa62234a5a69756bc11f5e09ce35fd47', 'FionaMcdaniel', 0, 0, '2021-12-01 10:30:39', '2021-12-20 10:31:32', '2021-12-20 10:31:32'),
(57, 165, 'Hu Holder', NULL, 1, '301a7519e3b28e4b252f50caf7cda0a0dbed', 'MaconLeach', 0, 0, '2021-12-01 10:30:51', '2021-12-20 10:31:32', '2021-12-20 10:31:32'),
(58, 166, 'Lee Colon', 'img/organization_logos/EleanorHolmes.png', 1, '36a49f3ffa8e18b3e74dec886877206da34a', 'EleanorHolmes', 0, 0, '2021-12-22 02:44:23', '2021-12-22 02:44:24', NULL);

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `industry_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `industry_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Deanna Glass', 'Est vitae quia perferendis quia omnis irure rerum occaecat tempora quibusdam dolore eum', 40, '2021-12-07 07:50:52', '2021-12-09 04:00:43', '2021-12-09 04:00:43'),
(2, 'Jayme Mitchell', 'Corporis quia sint aut totam id', 2, '2021-12-09 04:04:07', '2021-12-09 04:04:07', NULL),
(3, 'Rhiannon Lindsay', 'Qui ut repudiandae iste officia ratione ea', 3, '2021-12-09 04:04:11', '2021-12-09 04:04:11', NULL),
(4, 'Reagan Le', 'Facere ratione sit quam a ut consectetur nulla in et rerum', 2, '2021-12-09 04:04:16', '2021-12-09 04:04:16', NULL),
(5, 'Igor Wooten', 'Commodo dolores minus sunt magnam excepteur voluptatem in sequi', 2, '2021-12-09 04:04:21', '2021-12-09 04:04:21', NULL),
(6, 'Dane Mccullough', 'Quae ut ab aut ducimus exercitationem sint sint id impedit minim aliquid', 3, '2021-12-09 04:04:26', '2021-12-09 04:04:26', NULL),
(7, 'Jada Trujillo', 'Itaque magnam officia non consequatur omnis corporis', 2, '2021-12-09 04:04:31', '2021-12-09 04:04:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `ceo_id` int(11) DEFAULT NULL,
  `product_ids` varchar(500) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `tax_number` varchar(24) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `organization_id`, `ceo_id`, `product_ids`, `industry_id`, `tax_number`, `address`, `dob`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bếp mẹ Na', 5, 2, '[\"2\",\"4\",\"5\"]', 2, '191', 'Tempore et tempore dolorem sed', '2021-12-15 17:00:00', '602-8863', '2021-12-03 03:53:05', '2021-12-09 07:19:33', NULL),
(159, 'Jael Mckenzie', 51, 1, '[\"4\",\"7\"]', 2, '431', 'Numquam mollitia et iusto voluptatibus non dolore quis a in nisi cum quis velit obcaecati aliqua Ea adipisci', '2021-12-14 17:00:00', '132-6534', '2021-12-10 08:34:39', '2021-12-11 05:25:18', '2021-12-19 10:21:49'),
(160, 'Edan Farmer', 52, 1, NULL, 3, '666', 'Cupidatat eveniet dolor cillum quibusdam laborum ut qui ut quibusdam veritatis voluptatem sapiente fugiat saepe at non soluta', '2021-12-14 17:00:00', '335-5178', '2021-12-16 06:57:51', '2021-12-16 08:00:37', '2021-12-20 10:21:53'),
(161, 'Drake Carpenter', 53, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-16 09:03:47', '2021-12-16 09:03:47', '2021-12-20 10:21:57'),
(162, 'Ramona Gardner', 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 10:24:45', '2021-12-20 10:24:45', NULL),
(163, 'Jakeem Hardin', 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 10:27:43', '2021-12-20 10:29:21', '2021-12-20 10:29:21'),
(164, 'Ruth Hogan', 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 10:30:40', '2021-12-20 10:31:32', '2021-12-20 10:31:32'),
(165, 'Hu Holder', 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-20 10:30:51', '2021-12-20 10:31:32', '2021-12-20 10:31:32'),
(166, 'Lee Colon', 58, 1, NULL, 3, '875', 'Non eiusmod temporibus sint dolor nostrum laborum Nemo consectetur quod cupiditate', '2021-12-13 17:00:00', '227-1424', '2021-12-22 02:44:23', '2021-12-22 02:48:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `route` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=>active\r\n1=>lock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `route`, `description`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(6, '[\"menu-toggle-status\",\"menus.index\",\"menus.create\",\"menus.store\",\"menus.show\",\"menus.edit\",\"menus.update\",\"menus.destroy\"]', 'Toàn quyền quản lý sản phẩm', '2021-12-15 03:04:34', '2021-12-15 03:04:34', NULL, 0),
(7, '[\"menus.index\"]', 'Xem danh sách sản phẩm', '2021-12-15 03:06:22', '2021-12-15 03:06:22', NULL, 0),
(8, '[\"home\"]', 'Xem trang chủ (quyền mặc định)', '2021-12-15 03:33:21', '2021-12-15 03:33:21', NULL, 0),
(9, '[\"checkoutOrders.index\",\"checkoutOrders.create\",\"checkoutOrders.store\",\"checkoutOrders.show\",\"checkoutOrders.edit\",\"checkoutOrders.update\",\"checkoutOrders.destroy\"]', 'Toàn quyền quản lý doanh thu', '2021-12-15 04:12:17', '2021-12-15 04:12:17', NULL, 0);

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
(4, 'OverLord', 'admin@admin.admin', NULL, '$2y$10$Xm6oaVAXLlDtwGM9ewHGnumkyJAuEb8Yit8k/kORhcGWyRScj1mTS', NULL, '2021-12-01 04:11:15', '2021-12-01 04:11:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceo`
--
ALTER TABLE `ceo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `ceo`
--
ALTER TABLE `ceo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `bep_me_na`
--
CREATE DATABASE IF NOT EXISTS `bep_me_na` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bep_me_na`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>full\r\n1=>half\r\n2=>absent',
  `reason` varchar(500) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `status`, `reason`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, NULL, '2021-12-15 17:00:00', '2021-12-16 08:08:07', '2021-12-16 08:08:07', NULL),
(2, 2, 0, NULL, '2021-12-15 17:00:00', '2021-12-16 08:08:07', '2021-12-16 08:08:07', NULL),
(3, 3, 0, NULL, '2021-12-15 17:00:00', '2021-12-16 08:08:07', '2021-12-16 08:08:07', NULL),
(4, 4, 0, NULL, '2021-12-15 17:00:00', '2021-12-16 08:08:07', '2021-12-16 08:08:07', NULL),
(5, 5, 0, NULL, '2021-12-15 17:00:00', '2021-12-16 08:08:07', '2021-12-16 08:08:07', NULL),
(6, 1, 0, NULL, '2021-12-16 17:00:00', '2021-12-17 04:10:44', '2021-12-17 04:10:44', NULL),
(7, 2, 0, NULL, '2021-12-16 17:00:00', '2021-12-17 04:10:44', '2021-12-17 04:10:44', NULL),
(8, 3, 0, NULL, '2021-12-16 17:00:00', '2021-12-17 04:10:44', '2021-12-17 04:10:44', NULL),
(9, 4, 0, NULL, '2021-12-16 17:00:00', '2021-12-17 04:10:44', '2021-12-17 04:10:44', NULL),
(10, 5, 0, NULL, '2021-12-16 17:00:00', '2021-12-17 04:10:44', '2021-12-17 04:10:44', NULL),
(11, 1, 0, NULL, '2021-12-17 17:00:00', '2021-12-18 04:13:15', '2021-12-18 04:13:15', NULL),
(12, 2, 0, NULL, '2021-12-17 17:00:00', '2021-12-18 04:13:15', '2021-12-18 04:13:15', NULL),
(13, 3, 0, NULL, '2021-12-17 17:00:00', '2021-12-18 04:13:15', '2021-12-18 04:13:15', NULL),
(14, 4, 0, NULL, '2021-12-17 17:00:00', '2021-12-18 04:13:15', '2021-12-18 04:13:15', NULL),
(15, 5, 0, NULL, '2021-12-17 17:00:00', '2021-12-18 04:13:15', '2021-12-18 04:13:15', NULL),
(16, 1, 3, 'về quê', '2021-12-19 17:00:00', '2021-12-20 03:59:22', '2021-12-20 03:59:22', NULL),
(17, 2, 0, NULL, '2021-12-19 17:00:00', '2021-12-20 03:59:22', '2021-12-20 03:59:22', NULL),
(18, 3, 0, NULL, '2021-12-19 17:00:00', '2021-12-20 03:59:22', '2021-12-20 03:59:22', NULL),
(19, 4, 0, NULL, '2021-12-19 17:00:00', '2021-12-20 03:59:22', '2021-12-20 03:59:22', NULL),
(20, 5, 0, NULL, '2021-12-19 17:00:00', '2021-12-20 03:59:22', '2021-12-20 03:59:22', NULL),
(21, 1, 0, NULL, '2021-12-21 17:00:00', '2021-12-22 02:52:02', '2021-12-22 02:52:02', NULL),
(22, 2, 0, NULL, '2021-12-21 17:00:00', '2021-12-22 02:52:02', '2021-12-22 02:52:02', NULL),
(23, 3, 1, NULL, '2021-12-21 17:00:00', '2021-12-22 02:52:02', '2021-12-22 02:52:18', NULL),
(24, 4, 0, NULL, '2021-12-21 17:00:00', '2021-12-22 02:52:02', '2021-12-22 02:52:02', NULL),
(25, 5, 0, NULL, '2021-12-21 17:00:00', '2021-12-22 02:52:02', '2021-12-22 02:52:02', NULL),
(26, 1, 0, NULL, '2022-01-21 17:00:00', '2022-01-22 03:36:54', '2022-01-22 03:36:54', NULL),
(27, 2, 0, NULL, '2022-01-21 17:00:00', '2022-01-22 03:36:54', '2022-01-22 03:36:54', NULL),
(28, 3, 0, NULL, '2022-01-21 17:00:00', '2022-01-22 03:36:54', '2022-01-22 03:36:54', NULL),
(29, 4, 0, NULL, '2022-01-21 17:00:00', '2022-01-22 03:36:54', '2022-01-22 03:36:54', NULL),
(30, 5, 0, NULL, '2022-01-21 17:00:00', '2022-01-22 03:36:54', '2022-01-22 03:36:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkout_order`
--

CREATE TABLE `checkout_order` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(12) NOT NULL,
  `bill_path` varchar(255) DEFAULT NULL,
  `customer_info` varchar(255) DEFAULT NULL,
  `regular_customer_id` int(11) DEFAULT NULL,
  `menu_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=> Chưa thanh toán\r\n1=>Đã thanh toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout_order`
--

INSERT INTO `checkout_order` (`id`, `bill_code`, `bill_path`, `customer_info`, `regular_customer_id`, `menu_id`, `quantity`, `price`, `type`, `discount_percent`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BILL-000001', '/files/bep_me_na/BILL-000001-13-12-2021.xls', 'tung nguyen-0945555555-hanoi', 1, '[\"3\",\"9\",\"7\"]', '[\"12\",\"918\",\"109\"]', '[\"50000\",\"500000\",\"0\"]', '[0,0,1]', 18, 2, 1, '2021-12-13 07:44:28', '2021-12-16 08:35:32', NULL),
(2, 'BILL-000002', '/files/bep_me_na/BILL-000002-13-12-2021.xls', 'tung nguyen-0945555555-hanoi', 1, '[\"3\",\"6\",\"6\"]', '[\"9\",\"315\",\"85\"]', '[\"50000\",\"0\",\"35000\"]', '[0,1,0]', 0, 2, 0, '2021-12-13 10:13:28', '2021-12-13 10:13:38', '2021-12-13 10:13:38'),
(3, 'BILL-000003', '/files/bep_me_na/BILL-000003-13-12-2021.xls', 'Cum aspernatur tempo', NULL, '[\"7\",\"3\",\"9\"]', '[\"4\",\"3\",\"2\"]', '[\"450000\",\"50000\",\"500000\"]', '[0,0,0]', 48, 2, 1, '2021-12-13 10:14:01', '2021-12-22 03:00:48', NULL),
(4, 'BILL-000004', '/files/bep_me_na/BILL-000004-16-12-2021.xls', 'Hayden Mcintyre-923-6461-Iusto vel odio pariatur Tenetur suscipit maiores consectetur', 2, '[\"6\"]', '[\"4\"]', '[\"35000\"]', '[0]', 98, 2, 0, '2021-12-16 08:54:37', '2021-12-16 08:54:38', NULL),
(5, 'BILL-000005', '/files/bep_me_na/BILL-000005-20-12-2021.xls', 'Blanditiis est inven', NULL, '[\"10\"]', '[\"705\"]', '[\"24\"]', '[0]', 46, 2, 0, '2021-12-20 03:46:03', '2021-12-20 03:46:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `favorites` varchar(255) DEFAULT NULL,
  `order_count` int(11) DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `dob`, `favorites`, `order_count`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tung nguyen', '0945555555', 'hanoi', '1989-10-30 17:00:00', '[\"5\",\"8\"]', 8, 'asdasasda', '2021-11-24 08:58:58', '2021-12-13 10:13:38', NULL),
(2, 'Hayden Mcintyre', '923-6461', 'Iusto vel odio pariatur Tenetur suscipit maiores consectetur', NULL, '[\"3\",\"4\",\"7\",\"9\"]', 10, 'Ex ipsum corporis ma', '2021-12-07 10:21:10', '2021-12-16 08:54:37', NULL),
(3, 'Stewart Blackwell', '+1 (403) 262-1223', 'Tempora animi sed mollit consequuntur accusamus delectus soluta deleniti fugiat ut hic ipsum qui odio ipsam optio et', '1990-01-03 17:00:00', '[\"4\",\"7\",\"8\",\"10\"]', 0, 'Aut ut tempora delec', '2022-01-22 03:33:33', '2022-01-22 03:33:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `shift` int(11) DEFAULT NULL COMMENT '1=>''Sáng'',\r\n    2=>''Trưa'',\r\n    3=>''Chiều'',\r\n    4=>''Tối'',\r\n    5=>''Nửa ngày sáng'',\r\n    6=>''Nửa ngày tối'',\r\n    7=>''Cả ngày'',',
  `salary` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->working\r\n1->leave',
  `grade` int(11) NOT NULL DEFAULT 0 COMMENT '0->new\r\n1->good\r\n2->excellent\r\n3->bad',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `phone`, `address`, `position_id`, `shift`, `salary`, `unit`, `status`, `grade`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tung nguyen', '0945555555', 'hanoi', 2, 4, 15000, 1, 0, 0, '2021-11-30 10:11:05', '2021-12-08 08:00:16', NULL),
(2, 'Drake Mcbride', '961-5794', 'Esse laboriosam ut voluptas at aliquip obcaecati nisi eligendi reprehenderit mollit sit voluptates', 3, 1, 8, 3, 0, 0, '2021-12-08 01:21:55', '2021-12-08 01:21:55', NULL),
(3, 'Cadman Reid', '751-6626', 'Lorem provident quia consequatur A dolor suscipit commodo minima sit', 2, 3, 62, 2, 0, 0, '2021-12-08 01:22:02', '2021-12-08 01:22:02', NULL),
(4, 'Tanek Smith', '886-4093', 'Deserunt ipsum cupidatat soluta id cumque magna ad ipsa expedita commodo commodi unde omnis ea', 3, 1, 55, 4, 0, 0, '2021-12-08 01:22:08', '2021-12-08 08:10:12', NULL),
(5, 'Sarah Reed', '982-3179', 'Consequatur Fugiat quo esse incididunt irure quis do', 3, 3, 18, 2, 0, 0, '2021-12-08 09:49:08', '2021-12-08 09:49:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->active\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bún hải sản', 50000, 12, 1, '2021-11-22 21:10:02', '2021-12-07 09:04:47', NULL),
(2, 'Bún hải sản', 50000, 0, 1, '2021-11-22 21:38:26', '2021-11-30 08:08:39', NULL),
(3, 'Bún hải sản', 50000, 431, 0, '2021-11-22 21:38:45', '2021-12-13 10:14:02', NULL),
(4, 'Bún giả cầy', 45000, 1986, 0, '2021-11-22 21:46:19', '2021-12-09 07:35:59', NULL),
(5, 'Bún cá lăng', 55000, 895, 0, '2021-11-22 21:46:30', '2021-12-09 07:34:49', NULL),
(6, 'Bún đậu', 35000, 478, 0, '2021-11-22 21:46:46', '2021-12-16 08:54:38', NULL),
(7, 'Lẩu bò nhúng ớt', 450000, 1990, 0, '2021-11-22 21:46:59', '2021-12-13 10:14:02', NULL),
(8, 'Lẩu cá lăng', 450000, 1130, 0, '2021-11-22 21:47:09', '2021-12-09 07:34:49', NULL),
(9, 'Lẩu giả cầy', 500000, 2295, 0, '2021-11-22 21:47:24', '2021-12-13 10:14:02', NULL),
(10, 'Quentin Pruitt', 24, 705, 0, '2021-12-16 10:14:14', '2021-12-20 03:46:03', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `bill_code` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `bill_code`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BILL-000006', 'chưa chuyển khoản', '2021-11-24 07:28:53', '2021-11-24 08:41:15', NULL),
(2, 'BILL-000005', 'trả tiền mặt V nhận', '2021-11-24 08:31:28', '2021-11-24 08:41:25', NULL),
(3, 'BILL-000004', 'ghjghjghj', '2021-11-24 08:31:34', '2021-11-24 08:31:34', NULL),
(4, 'BILL-000007', 'dvbdfgdfgdfgdfg', '2021-11-24 10:34:11', '2021-11-24 10:34:11', NULL),
(5, 'BILL-000009', 'sdfsdf', '2021-11-25 01:56:02', '2021-11-25 01:56:02', NULL),
(6, 'BILL-000009', 'sdfsdf', '2021-11-25 01:57:27', '2021-11-25 01:57:27', NULL),
(7, 'BILL-000010', 'asdasdasd', '2021-11-25 03:19:00', '2021-11-25 03:19:00', NULL),
(8, 'BILL-000011', 'asdasdasd', '2021-11-25 03:19:48', '2021-11-25 03:19:48', NULL),
(9, 'BILL-000012', 'asdasdasd', '2021-11-25 03:21:36', '2021-11-25 03:21:36', NULL),
(10, 'BILL-000013', 'asdasdasd', '2021-11-25 03:21:49', '2021-11-25 03:21:49', NULL),
(11, 'BILL-000014', 'asdasdasd', '2021-11-25 03:21:56', '2021-11-25 03:21:56', NULL),
(12, 'BILL-000015', 'asdasdasd', '2021-11-25 03:22:23', '2021-11-25 03:22:23', NULL),
(13, 'BILL-000016', 'asdasdasd', '2021-11-25 03:22:30', '2021-11-25 03:22:30', NULL),
(14, 'BILL-000017', 'asdasdasd', '2021-11-25 03:23:26', '2021-11-25 03:23:26', NULL),
(15, 'BILL-000018', 'asdasdasd', '2021-11-25 03:23:44', '2021-11-25 03:23:44', NULL),
(16, 'BILL-000019', 'asdasdasd', '2021-11-25 03:24:12', '2021-11-25 03:24:12', NULL),
(17, 'BILL-000020', 'asdasdasd', '2021-11-25 03:24:16', '2021-11-25 03:24:16', NULL),
(18, 'BILL-000021', 'asdasdasd', '2021-11-25 03:25:16', '2021-11-25 03:25:16', NULL),
(19, 'BILL-000022', 'asdasdasd', '2021-11-25 03:26:09', '2021-11-25 03:26:09', NULL),
(20, 'BILL-000023', 'asdasdasd', '2021-11-25 03:26:40', '2021-11-25 03:26:40', NULL),
(21, 'BILL-000024', 'asdasdasd', '2021-11-25 03:26:55', '2021-11-25 03:26:55', NULL),
(22, 'BILL-000025', 'asdasdasd', '2021-11-25 03:27:41', '2021-11-25 03:27:41', NULL),
(23, 'BILL-000026', 'asdasdasd', '2021-11-25 03:28:44', '2021-11-25 03:28:44', NULL),
(24, 'BILL-000027', 'asdasdasd', '2021-11-25 03:29:47', '2021-11-25 03:29:47', NULL),
(25, 'BILL-000028', 'asddd', '2021-11-25 03:50:01', '2021-11-25 03:50:01', NULL),
(26, 'BILL-000029', 'asdasd', '2021-11-25 03:51:33', '2021-11-25 03:51:33', NULL),
(27, 'BILL-000030', 'asdasd', '2021-11-25 03:53:18', '2021-11-25 03:53:18', NULL),
(28, 'BILL-000031', 'asddad', '2021-11-25 03:55:17', '2021-11-25 03:55:17', NULL),
(29, 'BILL-000032', 'asddad', '2021-11-25 03:57:06', '2021-11-25 03:57:06', NULL),
(30, 'BILL-000033', 'asddad', '2021-11-25 03:57:25', '2021-11-25 03:57:25', NULL),
(31, 'BILL-000034', 'asddad', '2021-11-25 03:59:14', '2021-11-25 03:59:14', NULL),
(32, 'BILL-000035', 'asddad', '2021-11-25 04:00:39', '2021-11-25 04:00:39', NULL),
(33, 'BILL-000036', 'asddad', '2021-11-25 04:03:00', '2021-11-25 04:03:00', NULL),
(34, 'BILL-000037', 'asddad', '2021-11-25 04:03:25', '2021-11-25 04:03:25', NULL),
(35, 'BILL-000038', 'fghfgh', '2021-11-25 04:04:23', '2021-11-25 04:04:23', NULL),
(36, 'BILL-000039', 'fghfgh', '2021-11-25 04:04:59', '2021-11-25 04:04:59', NULL),
(37, 'BILL-000040', 'fghfgh', '2021-11-25 04:05:34', '2021-11-25 04:05:34', NULL),
(38, 'BILL-000041', 'fghfgh', '2021-11-25 04:06:00', '2021-11-25 04:06:00', NULL),
(39, 'BILL-000042', 'fghfgh', '2021-11-25 04:06:36', '2021-11-25 04:06:36', NULL),
(40, 'BILL-000043', 'fghfgh', '2021-11-25 04:07:04', '2021-11-25 04:07:04', NULL),
(41, 'BILL-000044', 'fghfgh', '2021-11-25 04:07:25', '2021-11-25 04:07:25', NULL),
(42, 'BILL-000045', 'fghfgh', '2021-11-25 04:08:06', '2021-11-25 04:08:06', NULL),
(43, 'BILL-000046', 'fghfgh', '2021-11-25 04:08:27', '2021-11-25 04:08:27', NULL),
(44, 'BILL-000047', 'fghfgh', '2021-11-25 04:10:27', '2021-11-25 04:10:27', NULL),
(45, 'BILL-000048', 'asdasd', '2021-11-25 04:12:18', '2021-11-25 04:12:18', NULL),
(46, 'BILL-000049', 'asdasd', '2021-11-25 04:12:49', '2021-11-25 04:12:49', NULL),
(47, 'BILL-000050', 'asdasddasd', '2021-11-25 04:14:47', '2021-11-25 04:14:47', NULL),
(48, 'BILL-000051', 'asdasddasd', '2021-11-25 04:19:34', '2021-11-25 04:19:34', NULL),
(49, 'BILL-000052', 'asdasddasd', '2021-11-25 04:28:13', '2021-11-25 04:28:13', NULL),
(50, 'BILL-000053', 'asdasddasd', '2021-11-25 04:28:47', '2021-11-25 04:28:47', NULL),
(51, 'BILL-000054', 'asdasddasd', '2021-11-25 04:29:01', '2021-11-25 04:29:01', NULL),
(52, 'BILL-000055', 'asdasddasd', '2021-11-25 04:29:56', '2021-11-25 04:29:56', NULL),
(53, 'BILL-000056', 'dfgdfg', '2021-11-25 07:13:33', '2021-11-25 07:13:33', NULL),
(54, 'BILL-000057', 'dfgdfg', '2021-11-25 07:13:48', '2021-11-25 07:13:48', NULL),
(55, 'BILL-000058', 'dfgdfg', '2021-11-25 07:15:26', '2021-11-25 07:15:26', NULL),
(56, 'BILL-000059', 'gjhghjghjg', '2021-11-25 07:18:59', '2021-11-25 07:18:59', NULL),
(57, 'BILL-000060', 'gjhghjghjg', '2021-11-25 07:19:16', '2021-11-25 07:19:16', NULL),
(58, 'BILL-000061', 'sdfsdfsdf', '2021-11-25 07:26:32', '2021-11-25 07:26:32', NULL),
(59, 'BILL-000062', 'sdfsdfsf', '2021-11-25 07:45:58', '2021-11-25 07:45:58', NULL),
(60, 'BILL-000063', 'sdfsdfsf', '2021-11-25 07:47:35', '2021-11-25 07:47:35', NULL),
(61, 'BILL-000064', 'sdfsdfsf', '2021-11-25 07:49:05', '2021-11-25 07:49:05', NULL),
(62, 'BILL-000065', 'sdfsdfsdf', '2021-11-25 07:54:17', '2021-11-25 07:54:17', NULL),
(63, 'BILL-000066', 'sdfsdfsdf', '2021-11-25 07:58:16', '2021-11-25 07:58:16', NULL),
(64, 'BILL-000067', 'sdfsdfsdf', '2021-11-25 07:58:39', '2021-11-25 07:58:39', NULL),
(65, 'BILL-000068', 'sdfsdfsdf', '2021-11-25 08:00:07', '2021-11-25 08:00:07', NULL),
(66, 'BILL-000069', 'sdfsdfsdf', '2021-11-25 08:00:26', '2021-11-25 08:00:26', NULL),
(67, 'BILL-000070', 'sdfsdfsdf', '2021-11-25 08:00:49', '2021-11-25 08:00:49', NULL),
(68, 'BILL-000071', 'sdfsdfsdf', '2021-11-25 08:00:57', '2021-11-25 08:00:57', NULL),
(69, 'BILL-000072', 'sdfsdfsdf', '2021-11-25 08:02:19', '2021-11-25 08:02:19', NULL),
(70, 'BILL-000073', 'sdfsdfsdf', '2021-11-25 08:02:32', '2021-11-25 08:02:32', NULL),
(71, 'BILL-000074', 'sdfsdfsdf', '2021-11-25 08:03:01', '2021-11-25 08:03:01', NULL),
(72, 'BILL-000075', 'dfgdfgdfg', '2021-11-25 08:03:48', '2021-11-25 08:03:48', NULL),
(73, 'BILL-000076', 'dasdasd', '2021-11-25 08:08:54', '2021-11-25 08:08:54', NULL),
(74, 'BILL-000077', 'asdadasdd', '2021-11-25 08:14:59', '2021-11-25 08:14:59', NULL),
(75, 'BILL-000078', 'asdadasdd', '2021-11-25 08:15:50', '2021-11-25 08:15:50', NULL),
(76, 'BILL-000079', 'sdfsdfsdfs', '2021-11-25 08:58:39', '2021-11-25 08:58:39', NULL),
(77, 'BILL-000080', 'sdfsdfsdfs', '2021-11-25 08:59:18', '2021-11-25 08:59:18', NULL),
(78, 'BILL-000081', 'sdfsdfsdfs', '2021-11-25 09:08:13', '2021-11-25 09:08:13', NULL),
(79, 'BILL-000082', 'sdfsdfsdfs', '2021-11-25 09:10:47', '2021-11-25 09:10:47', NULL),
(80, 'BILL-000083', 'sdfsdfsdfs', '2021-11-25 09:11:11', '2021-11-25 09:11:11', NULL),
(81, 'BILL-000084', 'sdfsdfsdfs', '2021-11-25 09:11:43', '2021-11-25 09:11:43', NULL),
(82, 'BILL-000085', 'sdfsdfsdfs', '2021-11-25 09:20:03', '2021-11-25 09:20:03', NULL),
(83, 'BILL-000086', 'sdfsdfsdfs', '2021-11-25 09:22:07', '2021-11-25 09:22:07', NULL),
(84, 'BILL-000087', 'sdfsdfsdfs', '2021-11-25 09:23:12', '2021-11-25 09:23:12', NULL),
(85, 'BILL-000088', 'sdfsdf', '2021-11-25 09:25:32', '2021-11-25 09:25:32', NULL),
(86, 'BILL-000089', 'sdfsdf', '2021-11-25 09:48:16', '2021-11-25 09:48:16', NULL),
(87, 'BILL-000090', 'sdfsdf', '2021-11-25 09:50:58', '2021-11-25 09:50:58', NULL),
(88, 'BILL-000091', 'sdfsdf', '2021-11-25 09:51:26', '2021-11-25 09:51:26', NULL),
(89, 'BILL-000092', 'asdasdasd', '2021-11-25 09:53:40', '2021-11-25 09:53:40', NULL),
(90, 'BILL-000093', 'asdasd', '2021-11-25 09:55:51', '2021-11-25 09:55:51', NULL),
(91, 'BILL-000094', 'sdfsdf', '2021-11-25 09:58:34', '2021-11-25 09:58:34', NULL),
(92, 'BILL-000095', 'sdfgsdfg', '2021-11-25 10:02:12', '2021-11-25 10:02:12', NULL),
(93, 'BILL-000096', 'fghfgh', '2021-11-25 10:02:59', '2021-11-25 10:02:59', NULL),
(94, 'BILL-000098', 'ghjghj', '2021-11-25 10:06:10', '2021-11-25 10:06:10', NULL),
(95, 'BILL-000106', 'asdasd', '2021-11-25 10:20:47', '2021-11-25 10:20:47', NULL),
(96, 'BILL-000107', 'asdasd', '2021-11-25 10:21:44', '2021-11-25 10:21:44', NULL),
(97, 'BILL-000108', 'asdasd', '2021-11-25 10:22:01', '2021-11-25 10:22:01', NULL),
(98, 'BILL-000109', 'asdasd', '2021-11-25 10:22:13', '2021-11-25 10:22:13', NULL),
(99, 'BILL-000110', 'asdasd', '2021-11-25 10:22:22', '2021-11-25 10:22:22', NULL),
(100, 'BILL-000111', 'asdasd', '2021-11-25 10:23:14', '2021-11-25 10:23:14', NULL),
(101, 'BILL-000112', 'asdasd', '2021-11-25 10:23:26', '2021-11-25 10:23:26', NULL),
(102, 'BILL-000113', 'asdasd', '2021-11-25 10:23:31', '2021-11-25 10:23:31', NULL),
(103, 'BILL-000119', 'asdfasd', '2021-11-25 10:30:58', '2021-11-25 10:30:58', NULL),
(104, 'BILL-000120', 'sdfsdf', '2021-11-25 10:32:46', '2021-11-25 10:32:46', NULL),
(105, 'BILL-000121', 'asdfasd', '2021-11-25 10:35:47', '2021-11-25 10:35:47', NULL),
(106, 'BILL-000122', 'asdfasd', '2021-11-25 10:36:41', '2021-11-25 10:36:41', NULL),
(107, 'BILL-000123', 'asdasd', '2021-11-25 10:40:20', '2021-11-25 10:40:20', NULL),
(108, 'BILL-000124', 'sdfsdf', '2021-11-25 10:41:28', '2021-11-25 10:41:28', NULL),
(109, 'BILL-000125', 'sadfsdf', '2021-11-25 10:43:34', '2021-11-25 10:43:34', NULL),
(110, 'BILL-000129', '2', '2021-11-25 11:06:04', '2021-11-25 11:06:04', NULL),
(111, 'BILL-000129', 'sdfsdf', '2021-11-26 09:39:04', '2021-11-26 09:39:04', NULL),
(112, 'BILL-000135', 'sdf', '2021-11-27 02:05:23', '2021-11-27 02:05:23', NULL),
(113, 'BILL-000136', 'sdf', '2021-11-27 02:05:48', '2021-11-27 02:05:48', NULL),
(114, 'BILL-000137', 'sdf', '2021-11-27 02:06:11', '2021-11-27 02:06:11', NULL),
(115, 'BILL-000138', 'sdf', '2021-11-27 02:07:01', '2021-11-27 02:07:01', NULL),
(116, 'BILL-000139', 'sdf', '2021-11-27 02:07:16', '2021-11-27 02:07:16', NULL),
(117, 'BILL-000140', 'sdf', '2021-11-27 02:07:28', '2021-11-27 02:07:28', NULL),
(118, 'BILL-000141', 'sdf', '2021-11-27 02:07:44', '2021-11-27 02:07:44', NULL),
(119, 'BILL-000142', 'sdf', '2021-11-27 02:08:07', '2021-11-27 02:08:07', NULL),
(120, 'BILL-000143', 'sdf', '2021-11-27 02:15:43', '2021-11-27 02:15:43', NULL),
(121, 'BILL-000144', 'sdf', '2021-11-27 02:16:06', '2021-11-27 02:16:06', NULL),
(122, 'BILL-000146', 'ck', '2021-11-27 04:36:29', '2021-11-27 04:36:29', NULL),
(123, 'BILL-000149', 'sesdfsdf', '2021-11-27 04:45:16', '2021-11-27 04:45:16', NULL),
(124, 'BILL-000150', 'cfgcfg', '2021-11-27 04:46:16', '2021-11-27 04:46:16', NULL),
(125, 'BILL-000151', 'sdfsdf', '2021-11-27 04:48:05', '2021-11-27 04:48:05', NULL),
(126, 'BILL-000152', 'asdsdf', '2021-11-27 04:49:03', '2021-11-27 04:49:03', NULL),
(127, 'BILL-000173', 'Expedita non sed ali', '2021-12-07 09:10:28', '2021-12-07 09:10:28', NULL),
(128, 'BILL-000172', 'asdasdasd', '2021-12-07 09:27:50', '2021-12-07 09:27:50', NULL),
(129, 'BILL-000175', 'Labore et ut quis am', '2021-12-08 10:01:08', '2021-12-08 10:01:08', NULL),
(130, 'BILL-000176', 'Dignissimos voluptat', '2021-12-08 10:16:59', '2021-12-08 10:16:59', NULL),
(131, 'BILL-000177', 'Repellendus Qui occ', '2021-12-08 10:20:47', '2021-12-08 10:20:47', NULL),
(132, 'BILL-000178', 'Nihil molestiae id e', '2021-12-08 10:23:42', '2021-12-08 10:23:42', NULL),
(133, 'BILL-000179', 'Quidem tenetur velit', '2021-12-08 10:24:36', '2021-12-08 10:24:36', NULL),
(134, 'BILL-000180', 'Fuga Sit magnam ea', '2021-12-09 03:14:38', '2021-12-09 03:14:38', NULL),
(135, 'BILL-000181', 'Unde asperiores eu a', '2021-12-09 07:25:54', '2021-12-09 07:25:54', NULL),
(136, 'BILL-000182', 'Unde asperiores eu a', '2021-12-09 07:27:09', '2021-12-09 07:27:09', NULL),
(137, 'BILL-000183', 'Unde asperiores eu a', '2021-12-09 07:29:23', '2021-12-09 07:29:23', NULL),
(138, 'BILL-000184', 'Eum non ullamco quib', '2021-12-09 07:30:32', '2021-12-09 07:30:32', NULL),
(139, 'BILL-000185', 'Eum non ullamco quib', '2021-12-09 07:31:59', '2021-12-09 07:31:59', NULL),
(140, 'BILL-000186', 'Eum non ullamco quib', '2021-12-09 07:32:16', '2021-12-09 07:32:16', NULL),
(141, 'BILL-000187', 'Iusto possimus in d', '2021-12-09 07:34:49', '2021-12-09 07:34:49', NULL),
(142, 'BILL-000188', 'Necessitatibus et ea', '2021-12-09 07:35:38', '2021-12-09 07:35:38', NULL),
(143, 'BILL-000189', 'Eos voluptas dolore', '2021-12-09 07:35:59', '2021-12-09 07:35:59', NULL),
(144, 'BILL-000190', 'Ut magnam corrupti', '2021-12-09 07:36:19', '2021-12-09 07:36:19', NULL),
(145, 'BILL-000191', 'Est ut laboriosam s', '2021-12-10 03:07:48', '2021-12-10 03:07:48', NULL),
(146, 'BILL-000192', 'Excepturi harum id', '2021-12-10 03:08:40', '2021-12-10 03:08:40', NULL),
(147, 'BILL-000193', 'Beatae voluptas aut', '2021-12-10 10:17:07', '2021-12-10 10:17:07', NULL),
(148, 'BILL-000001', 'Numquam nesciunt ex', '2021-12-13 07:44:28', '2021-12-13 07:44:28', NULL),
(149, 'BILL-000002', 'Dolores voluptatem a', '2021-12-13 10:13:28', '2021-12-13 10:13:28', NULL),
(150, 'BILL-000003', 'Ullamco officiis velghjghj', '2021-12-13 10:14:01', '2021-12-15 02:30:51', NULL),
(151, 'BILL-000004', 'Cumque animi blandi', '2021-12-16 08:54:37', '2021-12-16 08:54:37', NULL),
(152, 'BILL-000005', 'Dolorem ducimus duc', '2021-12-20 03:46:03', '2021-12-20 03:46:03', NULL);

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
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->available\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trưởng bếp', 1, '2021-11-30 09:59:09', '2021-11-30 10:00:19', NULL),
(2, 'Phụ bếp', 0, '2021-11-30 09:59:16', '2021-11-30 09:59:16', NULL),
(3, 'Shipper', 0, '2021-11-30 09:59:22', '2021-11-30 09:59:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->active\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `name`, `phone`, `address`, `note`, `count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tung nguyen', '0945555555', 'hanoi', 'dfghdfgdfgdfg', 7, 0, '2021-11-30 04:52:06', '2021-12-14 08:36:32', NULL),
(2, 'john doe', '3453453535', 'sdfsf', 'sdfsdfsf', 6, 0, '2021-11-30 08:51:36', '2021-12-10 08:16:55', '2021-12-07 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_import`
--

CREATE TABLE `raw_material_import` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(24) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw_material_import`
--

INSERT INTO `raw_material_import` (`id`, `bill_code`, `name`, `quantity`, `proof`, `unit`, `price`, `total`, `provider_id`, `user_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'Cá lăng', 2, NULL, 1, 100000, 200000, NULL, 1, 0, '2021-11-22 23:04:30', '2021-11-22 23:04:30', NULL),
(2, '', 'Bún', 15, NULL, 1, 10000, 150000, NULL, 2, 0, '2021-11-24 09:47:00', '2021-11-24 09:47:00', NULL),
(3, '', 'Trả lương nhân viên Long', 1, NULL, 7, 2000000, 2000000, NULL, 2, 1, '2021-11-24 10:26:51', '2021-12-09 02:15:07', NULL),
(4, '', 'mua rau', 2, NULL, 1, 30000, 60000, NULL, 3, 1, '2021-11-30 02:01:47', '2021-11-30 02:54:03', NULL),
(5, '', 'OverLord', 2, NULL, 1, 55000, 110000, NULL, 3, 1, '2021-11-30 06:37:41', '2021-12-07 09:15:11', NULL),
(8, '', 'mua thịt', 2, NULL, 1, 50000, 100000, 1, 3, 0, '2021-11-30 06:52:18', '2021-12-07 09:15:15', '2021-12-07 09:15:15'),
(9, '', 'asdasda', 2, NULL, 1, 333333, 666666, 2, 3, 0, '2021-11-30 08:53:26', '2021-11-30 08:53:26', NULL),
(10, 'BILL-000010', 'Hammett Rush', 459, '26840785_915220455314526_6214098657082264870_o.jpg', 8, 647, 296973, 2, 2, 0, '2021-12-10 02:48:15', '2021-12-10 02:48:15', NULL),
(11, 'BILL-000011', 'Jorden Perry', 88, '26840785_915220455314526_6214098657082264870_o.jpg', 9, 659, 57992, 1, 2, 0, '2021-12-10 02:50:02', '2021-12-10 02:50:02', NULL),
(12, 'BILL-000012', 'Libby Hooper', 351, '26840785_915220455314526_6214098657082264870_o.jpg', 2, 826, 289926, 1, 2, 0, '2021-12-10 02:50:47', '2021-12-10 02:50:47', NULL),
(13, 'BILL-000013', 'Willow Fulton', 707, '26840785_915220455314526_6214098657082264870_o.jpg', 3, 292, 206444, 1, 2, 0, '2021-12-10 02:57:33', '2021-12-10 02:57:33', NULL),
(14, 'BILL-000014', 'Noelle Whitfield', 481, 'img/import_proofs/bep_me_na/BILL-000014.png', 3, 622, 299182, 1, 2, 1, '2021-12-10 02:59:50', '2022-01-22 03:30:46', NULL),
(15, 'IMPORT-000015', 'Zephania Tillman', 31, 'img/import_proofs/bep_me_na/IMPORT-000015.png', 5, 318, 9858, 2, 2, 1, '2021-12-10 08:16:55', '2022-01-22 03:30:52', NULL),
(16, 'IMPORT-000016', 'Lucian Stewart', 568, 'img/import_proofs/bep_me_na/IMPORT-000016.png', 8, 472, 268096, 1, 1, 1, '2021-12-14 08:36:32', '2022-01-22 03:30:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kg', 'Kilogram', '2021-12-01 01:17:51', '2021-12-01 01:21:00', NULL),
(2, 'Mg', 'Milligram', '2021-12-01 01:21:12', '2021-12-01 01:21:12', NULL),
(3, 'Con', 'Dành cho động vật', '2021-12-01 01:21:28', '2021-12-01 01:21:28', NULL),
(4, 'Cái', NULL, '2021-12-01 01:21:40', '2021-12-01 01:21:40', NULL),
(5, 'Mớ', 'Dành cho thực vật', '2021-12-01 01:21:56', '2021-12-01 01:21:56', NULL),
(6, 'Ngày', 'Thời gian tính bằng ngày', '2021-12-01 01:22:13', '2021-12-01 01:22:13', NULL),
(7, 'Tháng', 'Thời gian tính bằng tháng', '2021-12-01 01:22:26', '2021-12-01 01:22:26', NULL),
(8, 'Thùng', 'Đồ vật tính bằng thùng', '2021-12-01 01:22:38', '2021-12-01 01:22:38', NULL),
(9, 'Chai', 'Chất lỏng tính bằng chai', '2021-12-01 01:22:51', '2021-12-01 01:22:51', NULL),
(10, 'Lít', 'Chất lỏng tính bằng lít', '2021-12-01 01:23:02', '2021-12-07 09:16:02', NULL);

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
  `is_ceo` int(11) NOT NULL DEFAULT 0,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '["8"]',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_ceo`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Eagan Frost', 'fyjejedovu@mailinator.com', NULL, '$2y$10$6unmrGOPphBWxjtI/wn7t.hXv4SLbfgfOvNCWBfU/lzHpE.wP/Urm', NULL, 0, '[\"6\",\"8\"]', '2021-11-22 23:58:26', '2021-12-15 03:34:08'),
(2, 'Brittany Mays', 'mepi@mailinator.com', NULL, '$2y$10$1r1mYfzgM.MKKDaMMM3enOrB/LTiARtOdZgNaPVhGJXJLdyIvt3dK', NULL, 1, '[\"8\"]', '2021-11-23 18:06:50', '2021-12-14 04:03:00'),
(3, 'Sigourney Cline', 'zaruci@mailinator.com', NULL, '$2y$10$xrmAOS1rGz4GkqoSpnRPHuefVzOZMWF8hU6iWxV93xfw4pWygDaua', NULL, 0, '[\"7\",\"8\"]', '2021-11-27 04:02:23', '2021-12-15 04:08:04'),
(5, 'Kiayada King', 'jozenun@mailinator.com', NULL, '$2y$10$NaoWhduCVSe/XIt5r06j.OTgYdRoFYHrevi1ky0gXpdB/clP.kx4a', NULL, 0, '[\"8\",\"9\"]', '2021-12-06 04:12:24', '2021-12-15 04:13:05'),
(6, 'Gary Lester', 'loje@mailinator.com', NULL, '$2y$10$RcNmxZm8Y7yiksJ7U.zxw.Jvq2BdW1cLxg/BR4gKsddqxQ6xtTjS.', NULL, 0, '[\"3\"]', '2021-12-14 04:03:51', '2021-12-14 04:03:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_order`
--
ALTER TABLE `checkout_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_import`
--
ALTER TABLE `raw_material_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `checkout_order`
--
ALTER TABLE `checkout_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raw_material_import`
--
ALTER TABLE `raw_material_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `core_db`
--
CREATE DATABASE IF NOT EXISTS `core_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `core_db`;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>full\r\n1=>half\r\n2=>absent',
  `reason` varchar(500) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout_order`
--

CREATE TABLE `checkout_order` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(12) NOT NULL,
  `bill_path` varchar(255) DEFAULT NULL,
  `customer_info` varchar(255) DEFAULT NULL,
  `regular_customer_id` int(11) DEFAULT NULL,
  `menu_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=> Chưa thanh toán\r\n1=>Đã thanh toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `favorites` varchar(255) DEFAULT NULL,
  `order_count` int(11) DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `shift` int(11) DEFAULT NULL COMMENT '1=>''Sáng'',\r\n    2=>''Trưa'',\r\n    3=>''Chiều'',\r\n    4=>''Tối'',\r\n    5=>''Nửa ngày sáng'',\r\n    6=>''Nửa ngày tối'',\r\n    7=>''Cả ngày'',',
  `salary` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->working\r\n1->leave',
  `grade` int(11) NOT NULL DEFAULT 0 COMMENT '0->new\r\n1->good\r\n2->excellent\r\n3->bad',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->active\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `bill_code` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->available\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0->active\r\n1->disabled',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_import`
--

CREATE TABLE `raw_material_import` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(24) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kg', 'Kilogram', '2021-12-01 01:17:51', '2021-12-01 01:21:00', NULL),
(2, 'Mg', 'Milligram', '2021-12-01 01:21:12', '2021-12-01 01:21:12', NULL),
(3, 'Con', 'Dành cho động vật', '2021-12-01 01:21:28', '2021-12-01 01:21:28', NULL),
(4, 'Cái', NULL, '2021-12-01 01:21:40', '2021-12-01 01:21:40', NULL),
(5, 'Mớ', 'Dành cho thực vật', '2021-12-01 01:21:56', '2021-12-01 01:21:56', NULL),
(6, 'Ngày', 'Thời gian tính bằng ngày', '2021-12-01 01:22:13', '2021-12-01 01:22:13', NULL),
(7, 'Tháng', 'Thời gian tính bằng tháng', '2021-12-01 01:22:26', '2021-12-01 01:22:26', NULL),
(8, 'Thùng', 'Đồ vật tính bằng thùng', '2021-12-01 01:22:38', '2021-12-01 01:22:38', NULL),
(9, 'Chai', 'Chất lỏng tính bằng chai', '2021-12-01 01:22:51', '2021-12-01 01:22:51', NULL),
(10, 'Lít', 'Chất lỏng tính bằng lít', '2021-12-01 01:23:02', '2021-12-07 09:16:02', NULL);

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
  `is_ceo` int(11) NOT NULL DEFAULT 0,
  `permissions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '["8"]',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout_order`
--
ALTER TABLE `checkout_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_material_import`
--
ALTER TABLE `raw_material_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout_order`
--
ALTER TABLE `checkout_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material_import`
--
ALTER TABLE `raw_material_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
