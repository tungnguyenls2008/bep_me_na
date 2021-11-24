-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 10:55 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bep_me_na`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout_order`
--

CREATE TABLE `checkout_order` (
  `id` int(11) NOT NULL,
  `bill_code` varchar(12) NOT NULL,
  `menu_id` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `checkout_order`
--

INSERT INTO `checkout_order` (`id`, `bill_code`, `menu_id`, `quantity`, `price`, `type`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BILL-000001', '[\"7\",\"8\",\"4\",\"6\"]', '[\"1\",\"2\",\"1\",\"1\"]', '[\"450000\",\"450000\",\"45000\",\"0\"]', '[0,0,0,1]', 2, '2021-11-23 18:39:00', '2021-11-23 18:39:00', NULL),
(2, 'BILL-000002', '[\"7\",\"9\",\"1\",\"8\"]', '[\"2\",\"1\",\"1\",\"1\"]', '[\"450000\",\"500000\",\"0\",\"450000\"]', '[0,0,1,0]', 2, '2021-11-23 19:23:27', '2021-11-23 19:23:27', NULL),
(3, 'BILL-000003', '[\"6\",\"4\",\"8\",\"1\"]', '[\"1\",\"3\",\"1\",\"1\"]', '[\"35000\",\"45000\",\"450000\",\"0\"]', '[0,0,0,1]', 2, '2021-11-23 19:26:01', '2021-11-23 19:26:01', NULL),
(4, 'BILL-000004', '[\"4\",\"7\",\"5\",\"6\"]', '[\"2\",\"1\",\"3\",\"1\"]', '[\"45000\",\"450000\",\"55000\",\"0\"]', '[0,0,0,1]', 2, '2021-11-24 03:24:05', '2021-11-24 03:24:05', NULL),
(5, 'BILL-000005', '[\"4\",\"5\",\"7\"]', '[\"2\",\"2\",\"1\"]', '[\"45000\",\"55000\",\"0\"]', '[0,0,1]', 2, '2021-11-24 07:14:00', '2021-11-24 07:14:00', NULL),
(6, 'BILL-000006', '[\"4\"]', '[\"1\"]', '[\"45000\"]', '[0]', 2, '2021-11-24 07:28:53', '2021-11-24 07:28:53', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(24) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` timestamp NULL DEFAULT NULL,
  `favorites` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `dob`, `favorites`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tung nguyen', '0945555555', 'hanoi', '1989-10-30 17:00:00', '[\"5\",\"8\"]', 'asdasasda', '2021-11-24 08:58:58', '2021-11-24 08:58:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bún hải sản', 50000, '2021-11-22 21:10:02', '2021-11-22 21:10:02', NULL),
(2, 'Bún hải sản', 50000, '2021-11-22 21:38:26', '2021-11-22 21:46:07', '2021-11-22 21:46:07'),
(3, 'Bún hải sản', 50000, '2021-11-22 21:38:45', '2021-11-22 21:46:04', '2021-11-22 21:46:04'),
(4, 'Bún giả cầy', 45000, '2021-11-22 21:46:19', '2021-11-22 21:46:19', NULL),
(5, 'Bún cá lăng', 55000, '2021-11-22 21:46:30', '2021-11-22 21:46:30', NULL),
(6, 'Bún đậu', 35000, '2021-11-22 21:46:46', '2021-11-22 21:46:46', NULL),
(7, 'Lẩu bò nhúng ớt', 450000, '2021-11-22 21:46:59', '2021-11-22 21:46:59', NULL),
(8, 'Lẩu cá lăng', 450000, '2021-11-22 21:47:09', '2021-11-22 21:47:09', NULL),
(9, 'Lẩu giả cầy', 500000, '2021-11-22 21:47:24', '2021-11-22 21:47:24', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `note`
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
-- Đang đổ dữ liệu cho bảng `note`
--

INSERT INTO `note` (`id`, `bill_code`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BILL-000006', 'chưa chuyển khoản', '2021-11-24 07:28:53', '2021-11-24 08:41:15', NULL),
(2, 'BILL-000005', 'trả tiền mặt V nhận', '2021-11-24 08:31:28', '2021-11-24 08:41:25', NULL),
(3, 'BILL-000004', 'ghjghjghj', '2021-11-24 08:31:34', '2021-11-24 08:31:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `raw_material_import`
--

CREATE TABLE `raw_material_import` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `raw_material_import`
--

INSERT INTO `raw_material_import` (`id`, `name`, `quantity`, `unit`, `price`, `total`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cá lăng', 2, 1, 100000, 200000, 1, '2021-11-22 23:04:30', '2021-11-22 23:04:30', NULL),
(2, 'Bún', 15, 1, 10000, 150000, 2, '2021-11-24 09:47:00', '2021-11-24 09:47:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eagan Frost', 'fyjejedovu@mailinator.com', NULL, '$2y$10$6unmrGOPphBWxjtI/wn7t.hXv4SLbfgfOvNCWBfU/lzHpE.wP/Urm', NULL, '2021-11-22 23:58:26', '2021-11-22 23:58:26'),
(2, 'Brittany Mays', 'mepi@mailinator.com', NULL, '$2y$10$1r1mYfzgM.MKKDaMMM3enOrB/LTiARtOdZgNaPVhGJXJLdyIvt3dK', NULL, '2021-11-23 18:06:50', '2021-11-23 18:06:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `checkout_order`
--
ALTER TABLE `checkout_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `raw_material_import`
--
ALTER TABLE `raw_material_import`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `checkout_order`
--
ALTER TABLE `checkout_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `raw_material_import`
--
ALTER TABLE `raw_material_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
