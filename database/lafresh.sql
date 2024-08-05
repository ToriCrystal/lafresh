-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 02:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lafresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` char(100) DEFAULT NULL,
  `fullname` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `roles` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `fullname`, `email`, `phone`, `birthday`, `gender`, `avatar`, `address`, `email_verified_at`, `password`, `remember_token`, `roles`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/m1ninAoJo3UJvNakQDUdOmuazi5FoK68pobVOpU1nT7EkdPM3IAC', 'QfNvkT0JKSkNeyO8zrzcQds1WhaHhpH1LFh5d9tFPWRF2LnQv1vLJn19mo3O', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_product_categories`
--

CREATE TABLE `admin_product_categories` (
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_policies`
--

CREATE TABLE `bonus_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_policies`
--

INSERT INTO `bonus_policies` (`id`, `unit`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_policy_details`
--

CREATE TABLE `bonus_policy_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bonus_policy_id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bonus_policy_details`
--

INSERT INTO `bonus_policy_details` (`id`, `bonus_policy_id`, `point`, `bonus`) VALUES
(1, 1, 100, 2000),
(2, 1, 300, 3000),
(3, 1, 600, 4000),
(4, 1, 800, 5000),
(5, 1, 1200, 6000),
(6, 1, 2400, 7000),
(7, 1, 4800, 8000),
(8, 2, 500, 3000),
(9, 2, 1000, 4000),
(10, 2, 2000, 5000),
(11, 2, 3000, 6000),
(12, 2, 4000, 7000),
(13, 2, 5000, 8000),
(14, 2, 6000, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_sales`
--

CREATE TABLE `bonus_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `month` date NOT NULL,
  `qty_pail` int(11) DEFAULT NULL,
  `qty_bottle` int(11) DEFAULT NULL,
  `reward` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price_selling` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `user_id`, `price_selling`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, 100000, '2024-08-02 14:23:48', '2024-08-02 14:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `icon` text DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `show_home` tinyint(4) NOT NULL DEFAULT 1,
  `desc` longtext DEFAULT NULL,
  `title_seo` varchar(191) DEFAULT NULL,
  `desc_seo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `_lft`, `_rgt`, `admin_id`, `parent_id`, `name`, `slug`, `icon`, `avatar`, `position`, `status`, `show_home`, `desc`, `title_seo`, `desc_seo`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 'Le Nhat', 'le-nhat', NULL, NULL, 0, 1, 1, NULL, '12', '12', '2024-06-28 04:44:30', '2024-06-28 04:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories_posts`
--

CREATE TABLE `categories_posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_posts`
--

INSERT INTO `categories_posts` (`post_id`, `category_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discount_agents`
--

CREATE TABLE `discount_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_agents`
--

INSERT INTO `discount_agents` (`id`, `discount_data`) VALUES
(1, '{\"level\":1,\"pail\":25,\"bottle\":35}'),
(2, '{\"level\":2,\"pail\":20,\"bottle\":30}');

-- --------------------------------------------------------

--
-- Table structure for table `discount_sellers`
--

CREATE TABLE `discount_sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `qty_donate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_type` varchar(60) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `icon_font` varchar(50) DEFAULT NULL,
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(191) DEFAULT NULL,
  `css_class` varchar(191) DEFAULT NULL,
  `target` varchar(20) NOT NULL DEFAULT '_self',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_locations`
--

CREATE TABLE `menu_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_13_150644_create_admins_table', 1),
(6, '2023_05_29_111623_create_settings_table', 1),
(7, '2023_06_07_094556_create_products_table', 1),
(8, '2023_06_07_095942_create_product_categories_table', 1),
(9, '2023_06_07_100537_create_product_categories_products_table', 1),
(10, '2023_06_07_102505_create_product_purchase_qty_table', 1),
(11, '2023_06_07_104641_create_shopping_carts_table', 1),
(12, '2023_06_07_105021_create_product_wishlists_table', 1),
(13, '2023_06_07_105129_create_user_levels_table', 1),
(14, '2023_06_07_110140_create_orders_table', 1),
(15, '2023_06_07_111253_create_order_details_table', 1),
(16, '2023_06_07_111832_create_pages_table', 1),
(17, '2023_06_07_112110_create_categories_table', 1),
(18, '2023_06_07_112504_create_posts_table', 1),
(19, '2023_06_07_113030_create_categories_posts_table', 1),
(20, '2023_06_20_150741_create_admin_product_categories_table', 1),
(21, '2023_06_30_135627_create_sliders_table', 1),
(22, '2023_06_30_135721_create_slider_items_table', 1),
(23, '2023_08_10_154221_create_reviews_table', 1),
(24, '2023_11_01_111836_update_products_table', 1),
(25, '2024_01_22_133807_create_discount_sellers_table', 1),
(26, '2024_01_22_134003_create_discount_agents_table', 1),
(27, '2024_01_23_153421_create_bonus_policy_table', 1),
(28, '2024_01_23_155517_create_bonus_policy_details_table', 1),
(29, '2024_01_25_092329_create_bonus_sales_table', 1),
(30, '2024_02_19_104448_create_menus_table', 1),
(31, '2024_04_03_131359_create_notifications_table', 1),
(32, '2024_04_03_131936_create_notification_user_table', 1),
(33, '2024_04_10_105224_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `desc` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_user`
--

CREATE TABLE `notification_user` (
  `notification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_email` varchar(191) DEFAULT NULL,
  `customer_fullname` varchar(191) DEFAULT NULL,
  `customer_phone` varchar(191) DEFAULT NULL,
  `customer_role` tinyint(4) DEFAULT NULL,
  `shipping_address` varchar(191) DEFAULT NULL,
  `shipping_method` tinyint(4) DEFAULT NULL,
  `payment_method` tinyint(4) NOT NULL DEFAULT 1,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_total` double NOT NULL,
  `discount` double NOT NULL,
  `bonus` double DEFAULT NULL,
  `total` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_email`, `customer_fullname`, `customer_phone`, `customer_role`, `shipping_address`, `shipping_method`, `payment_method`, `coupon_id`, `sub_total`, `discount`, `bonus`, `total`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 3, 'Nhatforgm@gmail.com', 'Le Nhat', '0971746382', 1, '12331', 2, 1, NULL, 1200000, 1, NULL, 200000, 1, NULL, '2024-08-02 12:50:01', '2024-08-02 12:50:01'),
(2, 3, 'Nhatforgm@gmail.com', 'Le Nhat', '0971746382', 1, '1231', 2, 1, NULL, 1200000, 1, NULL, 200000, 1, NULL, '2024-08-02 12:50:18', '2024-08-02 12:50:18'),
(3, 2, 'Nhatforgm@gmail.com', 'Le Nhat', '0971746382', 2, '1212', 2, 1, NULL, 100000, 1, NULL, 100000, 1, '121212', '2024-08-05 11:30:12', '2024-08-05 11:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` double NOT NULL,
  `unit` tinyint(4) NOT NULL,
  `unit_price_purchase_qty` double DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `qty_donate` int(11) DEFAULT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `unit_price`, `unit`, `unit_price_purchase_qty`, `qty`, `qty_donate`, `detail`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 100000, 1, NULL, 2, NULL, 'null', '2024-08-02 12:50:01', '2024-08-02 12:50:01'),
(2, 2, 2, 100000, 1, NULL, 2, NULL, 'null', '2024-08-02 12:50:18', '2024-08-02 12:50:18'),
(3, 3, 2, 100000, 1, NULL, 1, NULL, '\"121212\"', '2024-08-05 11:30:12', '2024-08-05 11:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `content` longtext NOT NULL,
  `title_seo` varchar(191) DEFAULT NULL,
  `desc_seo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'app-token-access', 'f2f6eafbcb358279b129008db20c7328dc78ada2febb97f6d10f600655e7d1e6', '[\"*\"]', '2023-07-04 09:36:49', NULL, '2023-07-04 09:33:52', '2023-07-04 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `feature_image` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `excerpt` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `title_seo` varchar(191) DEFAULT NULL,
  `desc_seo` text DEFAULT NULL,
  `viewed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `posted_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `title`, `slug`, `feature_image`, `status`, `excerpt`, `content`, `title_seo`, `desc_seo`, `viewed`, `posted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '12', '12', '/public/uploads/images/banner_VN_1.png', 1, '12', '<p>12</p>', '12', '12', 0, '2024-06-28 11:44:44', '2024-06-28 04:44:44', '2024-06-28 04:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `price_selling` double NOT NULL DEFAULT 0,
  `price_promotion` double NOT NULL DEFAULT 0,
  `sku` char(50) DEFAULT NULL,
  `manager_stock` tinyint(1) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `in_stock` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `feature_image` text DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `content_specification` longtext DEFAULT NULL,
  `content_application` longtext DEFAULT NULL,
  `content_download` longtext DEFAULT NULL,
  `brochure` text DEFAULT NULL,
  `datasheet` text DEFAULT NULL,
  `user_manual` text DEFAULT NULL,
  `unit` tinyint(4) NOT NULL DEFAULT 1,
  `feature` tinyint(4) NOT NULL DEFAULT 1,
  `new` tinyint(4) NOT NULL DEFAULT 1,
  `viewed` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title_seo` varchar(191) DEFAULT NULL,
  `desc_seo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `admin_id`, `name`, `slug`, `price`, `price_selling`, `price_promotion`, `sku`, `manager_stock`, `qty`, `in_stock`, `status`, `feature_image`, `gallery`, `short_desc`, `desc`, `content_specification`, `content_application`, `content_download`, `brochure`, `datasheet`, `user_manual`, `unit`, `feature`, `new`, `viewed`, `title_seo`, `desc_seo`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Iphone 11', 'iphone-11', 2000000, 0, 0, NULL, 0, 0, 1, 1, '/public/assets/images/default-image.png', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, NULL, NULL, '2023-07-04 08:19:06', '2024-08-02 12:43:31'),
(2, NULL, '12', '12', 1200000, 0, 100000, NULL, 0, 0, 1, 1, '/public/uploads/images/banner_VN_1.png', '[\"\\/public\\/uploads\\/images\\/banner_VN_1.png\"]', '12', '<p>12</p>', NULL, NULL, NULL, '#', '#', '#', 1, 1, 1, 6, '12', '1', '2024-06-28 04:41:55', '2024-08-02 14:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `_lft` int(11) NOT NULL,
  `_rgt` int(11) NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `avatar` text DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `show_home` tinyint(4) NOT NULL DEFAULT 1,
  `desc` longtext DEFAULT NULL,
  `title_seo` varchar(191) DEFAULT NULL,
  `desc_seo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `_lft`, `_rgt`, `admin_id`, `parent_id`, `name`, `slug`, `avatar`, `icon`, `position`, `status`, `show_home`, `desc`, `title_seo`, `desc_seo`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 'Iphone', 'iphone', '/public/assets/images/default-image.png', NULL, 0, 1, 1, NULL, NULL, NULL, '2023-07-04 08:26:10', '2023-07-04 08:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_products`
--

CREATE TABLE `product_categories_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories_products`
--

INSERT INTO `product_categories_products` (`product_id`, `category_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase_qty`
--

CREATE TABLE `product_purchase_qty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `qty` int(11) NOT NULL,
  `plain_value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_wishlists`
--

CREATE TABLE `product_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fullname` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `rating` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_key` varchar(191) NOT NULL,
  `setting_name` varchar(191) DEFAULT NULL,
  `plain_value` longtext DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `type_input` tinyint(4) DEFAULT NULL,
  `type_data` tinyint(4) DEFAULT NULL,
  `group` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_name`, `plain_value`, `desc`, `type_input`, `type_data`, `group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Tên site', 'Site name', 'Tên của website, shop, app', 1, NULL, 1, NULL, NULL),
(2, 'site_logo', 'Logo', '/public/assets/images/logo.png', 'Logo thương hiệu', 7, NULL, 1, NULL, NULL),
(3, 'site_favicon', 'Favicon', '/public/assets/images/logo.png', 'Favicon', 7, NULL, 1, NULL, NULL),
(4, 'email', 'Email', 'mevivu@gmail.com', 'Email liên hệ', 3, NULL, 1, NULL, NULL),
(5, 'hotline', 'Số điện thoại', '0999999999', 'Số điện thoại liên lạc.', 4, NULL, 1, NULL, NULL),
(6, 'address', 'Địa chỉ', '998/42/15 Quang Trung, GV', 'Địa chỉ liên lạc.', 1, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `plain_key` varchar(191) NOT NULL,
  `desc` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `plain_key`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Le Nhat', 'slider-1', '1', 2, '2024-06-28 04:43:16', '2024-08-02 12:39:03'),
(2, '1212', 'slider-2', '2121', 1, '2024-08-02 12:38:15', '2024-08-02 12:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `slider_items`
--

CREATE TABLE `slider_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `link` text NOT NULL,
  `position` tinyint(4) NOT NULL,
  `image` text NOT NULL,
  `mobile_image` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_items`
--

INSERT INTO `slider_items` (`id`, `slider_id`, `title`, `link`, `position`, `image`, `mobile_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '12', '#slider-1', 0, '/public/uploads/images/banner_VN_1.png', '/public/uploads/images/banner_VN_1.png', 1, '2024-06-28 04:43:48', '2024-06-28 04:43:48'),
(2, 1, 'Test', '#slider-2', 0, '/public/uploads/images/banner.jpg', '/public/uploads/images/banner_VN_1.png', 1, '2024-08-02 09:52:43', '2024-08-02 12:31:03'),
(3, 1, 'ads', '#slider-3', 0, '/public/uploads/images/customLogo.png', '/public/uploads/images/binh-nuoc-kiem.jpg', 1, '2024-08-02 12:31:41', '2024-08-02 12:31:51'),
(4, 2, '1213', '#slider-1', 0, '/public/uploads/images/nuoc-tinh-khiet-satori_596b655c0fa545838e845c58e7b174d2.jpg', '/public/uploads/images/nuoc-tinh-khiet-satori_596b655c0fa545838e845c58e7b174d2.jpg', 1, '2024-08-02 12:38:38', '2024-08-02 12:38:50'),
(5, 2, '213123', '#slider-2', 0, '/public/uploads/images/customLogo.png', '/public/uploads/images/binh-nuoc-tinh-khiet.jpg', 1, '2024-08-02 12:39:47', '2024-08-02 12:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` char(50) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `level_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` char(100) DEFAULT NULL,
  `fullname` varchar(191) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` char(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `roles` tinyint(4) DEFAULT NULL,
  `token_get_password` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `slug`, `level_id`, `username`, `fullname`, `email`, `phone`, `birthday`, `gender`, `avatar`, `address`, `password`, `status`, `active`, `roles`, `token_get_password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'U9858A041BDE52', 'ad8ffe7e-db9a-4c78-ae06-d44dc5703ee1-1688463221', NULL, '0999999999', 'test', 'test@gmail.com', '0999999999', NULL, 1, '/public/assets/images/avatar-user.png', NULL, '$2y$10$rQcDr0LrlL9mw0aGma.M3eBagGA/fDQ9FN6/GQHu9QfZ2enZdhI.q', 1, 1, NULL, NULL, NULL, NULL, '2023-07-04 09:33:41', '2023-07-04 09:33:41'),
(2, 'UF2EE168154A52', 'ea55834b-3e39-4ab7-bd2b-edd85f3be8ab-1722591223', NULL, 'adminaa@gmail.com', '122222', 'adminaa@gmail.com', '0971746382', '2024-08-01', NULL, 'public/storage/users/1722591255.png', NULL, '$2y$10$byFKSd0.2rzD8gQie5iCZONjoNWP63aafHNaoTMpUFhVQ27YeIvSy', 1, 1, 2, NULL, NULL, NULL, '2024-08-02 09:33:43', '2024-08-02 09:34:15'),
(3, 'UE835D82A43E31', '261a57be-9733-4a40-86d0-f39b8a4a7302-1722591312', NULL, 'adasdwd@gmail.com', '12121212', 'adasdwd@gmail.com', '0971746381', '2024-08-01', NULL, '/public/assets/images/avatar-user.png', NULL, '$2y$10$.kFudcGWqbh5Y/Y56oTwWe33uem28o1f6ijcPCmE1PzZonUP.2Jl.', 1, 1, 1, NULL, NULL, NULL, '2024-08-02 09:35:12', '2024-08-02 09:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE `user_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `type_discount` tinyint(4) NOT NULL,
  `min_amount` double NOT NULL,
  `plain_value` double NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `admin_product_categories`
--
ALTER TABLE `admin_product_categories`
  ADD PRIMARY KEY (`product_category_id`,`admin_id`),
  ADD KEY `admin_product_categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `bonus_policies`
--
ALTER TABLE `bonus_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_policy_details`
--
ALTER TABLE `bonus_policy_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonus_policy_details_bonus_policy_id_foreign` (`bonus_policy_id`);

--
-- Indexes for table `bonus_sales`
--
ALTER TABLE `bonus_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonus_sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `categories_posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `discount_agents`
--
ALTER TABLE `discount_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_sellers`
--
ALTER TABLE `discount_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_sellers_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_items_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menu_locations`
--
ALTER TABLE `menu_locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_locations_location_unique` (`location`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_user`
--
ALTER TABLE `notification_user`
  ADD KEY `notification_user_notification_id_foreign` (`notification_id`),
  ADD KEY `notification_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_parent_id_foreign` (`parent_id`),
  ADD KEY `product_categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `product_categories_products`
--
ALTER TABLE `product_categories_products`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `product_categories_products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_purchase_qty`
--
ALTER TABLE `product_purchase_qty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_purchase_qty_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_wishlists_product_id_foreign` (`product_id`),
  ADD KEY `product_wishlists_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_setting_key_unique` (`setting_key`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_product_id_foreign` (`product_id`),
  ADD KEY `shopping_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_items`
--
ALTER TABLE `slider_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_items_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bonus_policies`
--
ALTER TABLE `bonus_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bonus_policy_details`
--
ALTER TABLE `bonus_policy_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bonus_sales`
--
ALTER TABLE `bonus_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discount_agents`
--
ALTER TABLE `discount_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_sellers`
--
ALTER TABLE `discount_sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_locations`
--
ALTER TABLE `menu_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_purchase_qty`
--
ALTER TABLE `product_purchase_qty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_items`
--
ALTER TABLE `slider_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_product_categories`
--
ALTER TABLE `admin_product_categories`
  ADD CONSTRAINT `admin_product_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_product_categories_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bonus_policy_details`
--
ALTER TABLE `bonus_policy_details`
  ADD CONSTRAINT `bonus_policy_details_bonus_policy_id_foreign` FOREIGN KEY (`bonus_policy_id`) REFERENCES `bonus_policy_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bonus_sales`
--
ALTER TABLE `bonus_sales`
  ADD CONSTRAINT `bonus_sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories_posts`
--
ALTER TABLE `categories_posts`
  ADD CONSTRAINT `categories_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount_sellers`
--
ALTER TABLE `discount_sellers`
  ADD CONSTRAINT `discount_sellers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_user`
--
ALTER TABLE `notification_user`
  ADD CONSTRAINT `notification_user_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `product_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_categories_products`
--
ALTER TABLE `product_categories_products`
  ADD CONSTRAINT `product_categories_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_purchase_qty`
--
ALTER TABLE `product_purchase_qty`
  ADD CONSTRAINT `product_purchase_qty_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_wishlists`
--
ALTER TABLE `product_wishlists`
  ADD CONSTRAINT `product_wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slider_items`
--
ALTER TABLE `slider_items`
  ADD CONSTRAINT `slider_items_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
