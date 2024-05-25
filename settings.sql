-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:8889
-- Thời gian đã tạo: Th7 21, 2023 lúc 09:50 AM
-- Phiên bản máy phục vụ: 5.7.39
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_value` longtext COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `type_input` tinyint(4) DEFAULT NULL,
  `type_data` tinyint(4) DEFAULT NULL,
  `group` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_name`, `plain_value`, `desc`, `type_input`, `type_data`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Tên site', 'Site name', 'Tên của website, shop, app', 1, NULL, 1, NULL, NULL),
(2, 'site_logo', 'Logo', '/public/assets/images/logo.png', 'Logo thương hiệu', 7, NULL, 1, NULL, NULL),
(3, 'site_favicon', 'Favicon', '/public/assets/images/logo.png', 'Favicon', 7, NULL, 1, NULL, NULL),
(4, 'email', 'Email', 'mevivu@gmail.com', 'Email liên hệ', 3, NULL, 1, NULL, NULL),
(5, 'hotline', 'Số điện thoại', '0999999999', 'Số điện thoại liên lạc.', 4, NULL, 1, NULL, NULL),
(6, 'address', 'Địa chỉ', '998/42/15 Quang Trung, GV', 'Địa chỉ liên lạc.', 1, NULL, 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_setting_key_unique` (`setting_key`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
