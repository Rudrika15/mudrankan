-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 02:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mudrankan`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `country`, `email`, `firstname`, `lastname`, `company`, `address`, `apartment`, `city`, `state`, `pin`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'India', 'rudrika@gmail.com', 'Rudrika', 'Dave', 'My Company', 'Ahmedabad', 'Opp. Abc', 'Mehsana', 'India', '363020', '987654321', '2022-08-03 04:41:30', '2022-08-03 04:41:30'),
(2, 1, 'Canada', 'ravirajsinh.m.gohil@gmail.com', 'Ravirajsinh', 'Gohil', 'My Company', 'Ahmedabad', 'Opp. Abc', 'Ahmedabad', 'India', '363020', '9876543210', '2022-08-04 00:31:35', '2022-08-04 00:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 3, '54-48-10-A4-50-4F', 5, '2022-08-04 00:05:55', '2022-08-04 00:05:55'),
(14, 3, '54-48-10-A4-50-4F', 6, '2022-08-04 03:48:34', '2022-08-04 03:48:34'),
(15, 9, '', 2, '2022-08-10 06:23:11', '2022-08-10 06:23:11'),
(16, 9, '', 2, '2022-08-10 06:23:36', '2022-08-10 06:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(28, 'Wall Decor', '<p><strong>Wall Decor</strong></p>', '11.jpg', '2022-03-28 03:08:41', '2022-03-28 03:08:41'),
(29, 'Home Decor', '<p><strong>Home Decor</strong></p>', '12.jpg', '2022-03-28 03:09:03', '2022-03-28 03:09:03'),
(30, 'CRAFT', '<p><strong>CRAFT</strong></p>', '13.jpg', '2022-03-28 03:09:22', '2022-03-28 03:09:22'),
(31, 'Stationery', '<p><strong>Stationery</strong></p>', '14.jpg', '2022-04-22 12:10:51', '2022-04-22 12:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharcard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partnership` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `name`, `address`, `city`, `aadharcard`, `pancard`, `contact`, `partnership`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Rudrika', 'niawdihawdb', 'Wadhwan', '98765432106544', '2654921230', '9876543210', '25%', 'abc', '2022-04-28 01:19:37', '2022-04-28 01:19:37'),
(2, 'Ravi', 'biab ciqacd', 'Wadhwan', '98765432106544', '2654921230', '9876543210', '25%', 'abc', '2022-04-28 01:21:47', '2022-04-28 06:55:33'),
(3, 'Amit', 'ahmedabad', 'Wadhwan', '98765432106544', '2654921230', '9876543210', '25%', 'abc', '2022-04-28 01:23:19', '2022-04-28 06:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `address_id`, `o_id`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 6, '2022-08-04 00:22:33', '2022-08-04 00:22:33'),
(2, 14, 1, 7, '2022-08-04 00:24:43', '2022-08-04 00:24:43'),
(3, 14, 2, 11, '2022-08-04 01:38:16', '2022-08-04 01:38:16'),
(4, 14, 2, 12, '2022-08-04 03:36:25', '2022-08-04 03:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'kkl', 'knknkn', 'klnknknk', 'nnkn', '2022-06-15 05:39:31', '2022-06-15 05:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `discription`, `expires_at`, `created_at`, `updated_at`) VALUES
(16, 'FREE', 8, 'free', '<p><em><strong>free coupon</strong></em></p>', '2024-04-03', '2022-03-28 04:17:36', '2022-03-28 04:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_digits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rounding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discountables`
--

CREATE TABLE `discountables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `discountable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discountable_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discountables`
--

INSERT INTO `discountables` (`id`, `coupon_id`, `discountable_type`, `discountable_id`, `created_at`, `updated_at`) VALUES
(7, 15, 'market', 3, '2022-03-21 23:09:42', '2022-03-21 23:09:42'),
(8, 15, 'product', 14, '2022-03-21 23:09:42', '2022-03-21 23:09:42'),
(9, 15, 'product', 15, '2022-03-21 23:09:42', '2022-03-21 23:09:42'),
(10, 15, 'category', 23, '2022-03-21 23:09:42', '2022-03-21 23:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(6, 'Store', '<p><strong>Store</strong></p>', '2022-03-28 01:54:19', '2022-03-28 01:55:46'),
(7, 'Restaurant', '<p><strong>Restaurant</strong></p>', '2022-03-28 01:54:29', '2022-03-28 01:55:39'),
(8, 'Pharmacy', '<p><strong>Pharmacy</strong></p>', '2022-03-28 01:54:40', '2022-03-28 01:55:32'),
(9, 'Grocery', '<p><strong>Grocery</strong></p>', '2022-03-28 01:54:56', '2022-03-28 01:54:56'),
(10, 'Furniture', '<p><strong>Furniture</strong></p>', '2022-03-28 01:55:10', '2022-03-28 01:55:10'),
(11, 'Electronics', '<p><strong>Electronics</strong></p>', '2022-03-28 01:55:21', '2022-03-28 01:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `information` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_commision` double NOT NULL,
  `delivery_fee` double NOT NULL,
  `delivery_range` double NOT NULL,
  `default_tax` double NOT NULL,
  `close` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_for_delivery` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `name`, `description`, `address`, `longitude`, `latitude`, `phone`, `mobile`, `information`, `admin_commision`, `delivery_fee`, `delivery_range`, `default_tax`, `close`, `active`, `available_for_delivery`, `created_at`, `updated_at`) VALUES
(5, 'Mudrankan Exclusive Store', '<p><small><strong>Mudrankan Exclusive Store</strong></small></p>', '<p>4700 Roosevelt LightsWest Timothyland, DE 40077</p>', '43.555323', '9.204217', 88496836, 88496836, '<p><em>Mudrankan Exclusive Store</em></p>', 564987, 1546, 564, 564982, 'No', 'Yes', 'Yes', '2022-03-28 04:21:21', '2022-03-28 04:21:21'),
(6, 'Furniture Hills, Labadie and Kessler', '<p>Furniture Hills, Labadie and Kessler</p>', '<p>1712 McDermott Forge Wendyberg, RI 30281-9327</p>', '43.555323', '9.204217', 78945612, 88496836, '<p>Furniture Hills, Labadie and Kessler</p>', 564987, 500, 564, 654, 'No', 'Yes', 'Yes', '2022-03-28 04:23:55', '2022-03-28 04:23:55');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_15_045740_create_categories_table', 1),
(6, '2022_03_15_045755_create_products_table', 1),
(8, '2022_03_15_045827_create_options_table', 1),
(9, '2022_03_15_045850_create_productgalleries_table', 1),
(12, '2022_03_15_111047_create_optiongroups_table', 2),
(13, '2022_03_17_045336_create_markets_table', 3),
(14, '2022_03_17_045425_create_fields_table', 3),
(16, '2022_03_21_063206_create_slides_table', 4),
(17, '2022_03_21_094202_create_currencies_table', 5),
(18, '2022_03_21_112459_create_coupons_table', 6),
(19, '2022_03_21_115715_create_discountables_table', 7),
(20, '2022_03_22_054601_create_voucharmasters_table', 8),
(21, '2022_03_22_055844_create_vouchardetails_table', 9),
(22, '2022_03_24_101658_create_roles_table', 10),
(23, '2022_03_24_101952_create_role_users_table', 10),
(24, '2022_03_24_122003_create_posts_table', 11),
(25, '2022_03_25_055016_create_permission_tables', 12),
(26, '2022_03_28_100357_create_permission_tables', 13),
(28, '2014_10_12_000000_create_users_table', 14),
(29, '2022_05_07_091347_create_carts_table', 15),
(30, '2022_05_07_101212_create_wishlists_table', 16),
(32, '2022_05_26_043316_create_orders_table', 17),
(33, '2022_06_08_041513_create_contacts_table', 17),
(34, '2022_06_15_041012_create_reviews_table', 17),
(35, '2022_06_15_044629_create_reviews_table', 18),
(36, '2022_06_15_044745_create_reviews_table', 19),
(37, '2022_08_03_080214_create_addresses_table', 20),
(38, '2022_05_25_085533_create_checkouts_table', 21);

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
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 12),
(5, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 18);

-- --------------------------------------------------------

--
-- Table structure for table `optiongroups`
--

CREATE TABLE `optiongroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `optiongroups`
--

INSERT INTO `optiongroups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(10, 'Taste', '2022-03-28 04:14:12', '2022-03-28 04:14:12'),
(11, 'Size', '2022-03-28 04:14:20', '2022-03-28 04:14:20'),
(12, 'Parfum', '2022-03-28 04:14:27', '2022-03-28 04:14:27'),
(13, 'Color', '2022-03-28 04:14:34', '2022-03-28 04:14:34'),
(14, 'test', '2022-04-28 01:22:35', '2022-04-28 01:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '2022-06-16 03:51:54', '2022-06-16 03:51:54'),
(2, 8, 1, 1, '2022-06-16 03:51:54', '2022-06-16 03:51:54'),
(3, 3, 14, 5, '2022-08-04 00:20:26', '2022-08-04 00:20:26'),
(4, 3, 14, 5, '2022-08-04 00:21:43', '2022-08-04 00:21:43'),
(5, 3, 14, 5, '2022-08-04 00:22:26', '2022-08-04 00:22:26'),
(6, 3, 14, 5, '2022-08-04 00:22:33', '2022-08-04 00:22:33'),
(7, 3, 14, 5, '2022-08-04 00:24:43', '2022-08-04 00:24:43'),
(8, 3, 14, 5, '2022-08-04 01:34:23', '2022-08-04 01:34:23'),
(9, 3, 14, 5, '2022-08-04 01:37:12', '2022-08-04 01:37:12'),
(10, 3, 14, 5, '2022-08-04 01:37:50', '2022-08-04 01:37:50'),
(11, 3, 14, 5, '2022-08-04 01:38:15', '2022-08-04 01:38:15'),
(12, 3, 14, 5, '2022-08-04 03:36:25', '2022-08-04 03:36:25');

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
(1, 'register.show', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(2, 'register.perform', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(3, 'login.show', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(4, 'login.perform', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(5, 'category.show', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(6, 'category.create', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(7, 'category.edit', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(8, 'category.code', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(9, 'category.delete', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(10, 'category.edit_code', 'web', '2022-03-28 05:14:16', '2022-03-28 05:14:16'),
(11, 'roles.index', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(12, 'roles.create', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(13, 'roles.store', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(14, 'roles.show', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(15, 'roles.edit', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(16, 'roles.update', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(17, 'roles.destroy', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(18, 'permissions.index', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(19, 'permissions.create', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(20, 'permissions.store', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(21, 'permissions.show', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(22, 'permissions.edit', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(23, 'permissions.update', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(24, 'permissions.destroy', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(25, 'product.show', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(26, 'product.create', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(27, 'product.edit', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(28, 'product.code', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(29, 'product.delete', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(30, 'product.edit_code', 'web', '2022-03-28 05:14:17', '2022-03-28 05:14:17'),
(31, 'option.show', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(32, 'option.create', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(33, 'option.edit', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(34, 'option.code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(35, 'option.delete', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(36, 'option.edit_code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(37, 'optiongroup.show', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(38, 'optiongroup.create', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(39, 'optiongroup.edit', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(40, 'optiongroup.code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(41, 'optiongroup.delete', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(42, 'optiongroup.edit_code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(43, 'productgallery.show', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(44, 'productgallery.create', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(45, 'productgallery.edit', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(46, 'productgallery.code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(47, 'productgallery.delete', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(48, 'productgallery.edit_code', 'web', '2022-03-28 05:14:18', '2022-03-28 05:14:18'),
(49, 'market.show', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(50, 'market.create', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(51, 'market.edit', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(52, 'market.code', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(53, 'market.delete', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(54, 'market.edit_code', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(55, 'field.show', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(56, 'field.create', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(57, 'field.edit', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(58, 'field.code', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(59, 'field.delete', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(60, 'field.edit_code', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(61, 'slide.show', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(62, 'slide.create', 'web', '2022-03-28 05:14:19', '2022-03-28 05:14:19'),
(63, 'slide.edit', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(64, 'slide.code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(65, 'slide.delete', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(66, 'slide.edit_code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(67, 'currency.show', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(68, 'currency.create', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(69, 'currency.edit', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(70, 'currency.code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(71, 'currency.delete', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(72, 'currency.edit_code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(73, 'coupon.show', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(74, 'coupon.create', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(75, 'coupon.edit', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(76, 'coupon.code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(77, 'coupon.delete', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(78, 'coupon.edit_code', 'web', '2022-03-28 05:14:20', '2022-03-28 05:14:20'),
(79, 'voucharmaster.show', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(80, 'voucharmaster.create', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(81, 'voucharmaster.edit', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(82, 'voucharmaster.code', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(83, 'voucharmaster.delete', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(84, 'voucharmaster.edit_code', 'web', '2022-03-28 05:14:21', '2022-03-28 05:14:21'),
(85, 'users.create', 'web', '2022-03-29 07:06:48', '2022-03-29 07:06:48'),
(86, 'users.show', 'web', '2022-03-29 07:06:48', '2022-03-29 07:06:48'),
(88, 'users.edit', 'web', '2022-03-29 07:12:48', '2022-03-29 07:12:48'),
(89, 'users.code', 'web', '2022-03-29 06:34:48', '2022-03-29 07:13:48'),
(90, 'users.delete', 'web', '2022-03-29 07:13:48', '2022-03-29 07:13:48'),
(91, 'users.index', 'web', '2022-03-29 10:02:11', '2022-03-29 10:02:11'),
(92, 'users.update', 'web', '2022-03-29 10:15:32', '2022-03-29 10:15:32'),
(94, 'users.destroy', 'web', '2022-04-26 23:32:25', '2022-04-26 23:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 20, 'MyApp', 'd1a1fe301d3ab2e5d5bc07a48bda7fb0f593ac7b2d2b71f2e96329d36e56509e', '[\"*\"]', NULL, '2022-06-03 00:04:22', '2022-06-03 00:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `productgalleries`
--

CREATE TABLE `productgalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productgalleries`
--

INSERT INTO `productgalleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 13, 0x313634373638383031322e6a7067, '2022-03-19 05:29:47', '2022-03-19 05:36:52'),
(19, 26, 0x313634383435383934322e313233373631383334372e6a7067, '2022-03-28 03:45:42', '2022-03-28 03:45:42'),
(20, 26, 0x313634383435383934322e3737383830313336302e6a7067, '2022-03-28 03:45:42', '2022-03-28 03:45:42'),
(21, 26, 0x313634383435383934332e313834333133313534302e6a7067, '2022-03-28 03:45:43', '2022-03-28 03:45:43'),
(22, 26, 0x313634383435383934332e313335373535393331322e6a7067, '2022-03-28 03:45:43', '2022-03-28 03:45:43'),
(23, 27, 0x313634383435393433362e3339313031333333352e6a7067, '2022-03-28 03:53:56', '2022-03-28 03:53:56'),
(24, 27, 0x313634383435393433362e313634323638393731342e6a7067, '2022-03-28 03:53:56', '2022-03-28 03:53:56'),
(25, 27, 0x313634383435393433362e323131363331353736382e6a7067, '2022-03-28 03:53:56', '2022-03-28 03:53:56'),
(26, 27, 0x313634383435393433372e313536383634343633392e6a7067, '2022-03-28 03:53:57', '2022-03-28 03:53:57'),
(27, 28, 0x313634383435393531332e3530383430323737302e6a7067, '2022-03-28 03:55:13', '2022-03-28 03:55:13'),
(28, 28, 0x313634383435393531332e313639343935343635342e6a7067, '2022-03-28 03:55:13', '2022-03-28 03:55:13'),
(29, 28, 0x313634383435393531332e313731343436323034332e6a7067, '2022-03-28 03:55:13', '2022-03-28 03:55:13'),
(30, 28, 0x313634383435393531332e3636313035343530372e6a7067, '2022-03-28 03:55:13', '2022-03-28 03:55:13'),
(31, 29, 0x313634383435393739372e35343535373934302e6a7067, '2022-03-28 03:59:57', '2022-03-28 03:59:57'),
(32, 29, 0x313634383435393739372e313132303236323336312e6a7067, '2022-03-28 03:59:57', '2022-03-28 03:59:57'),
(33, 29, 0x313634383435393739372e313130383831363036362e6a7067, '2022-03-28 03:59:57', '2022-03-28 03:59:57'),
(34, 1, 0x313634383535353738362e3134313939313139372e6a7067, '2022-03-29 06:39:46', '2022-03-29 06:39:46'),
(35, 1, 0x313634383535353738362e3934303437303033372e6a7067, '2022-03-29 06:39:46', '2022-03-29 06:39:46'),
(36, 1, 0x313634383535353738362e3832313439303635372e6a7067, '2022-03-29 06:39:46', '2022-03-29 06:39:46'),
(37, 1, 0x313634383535353738362e3533303634353132322e6a7067, '2022-03-29 06:39:46', '2022-03-29 06:39:46'),
(38, 2, 0x313635303635303937322e313938353839373834362e6a7067, '2022-04-22 12:39:32', '2022-04-22 12:39:32'),
(39, 2, 0x313635303635303937322e3333353337323737372e6a7067, '2022-04-22 12:39:32', '2022-04-22 12:39:32'),
(40, 2, 0x313635303635303937332e313138373334373337362e6a7067, '2022-04-22 12:39:33', '2022-04-22 12:39:33'),
(41, 2, 0x313635303635303937332e313532333134383330352e6a7067, '2022-04-22 12:39:33', '2022-04-22 12:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `market` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deliverable_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discount_price`, `description`, `capacity`, `unit`, `package_count`, `category`, `market`, `featured`, `deliverable_product`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Acrylic on canvas 1 (30″x40″)', 20000, 10000, '<p>Delve deep in the mystery of the abstract face art with this 30&Prime;x40&rdquo; hand painted acrylic on Canvas The lines of a face speaks the unspoken&mdash; they can be an open book, the deepest mystery or both! Hence, the choice of an abstract face art is thus the fittest one for your guest room delights where every human is charmed by the display of such mysterious openness!&quot;</p>', 0, '11', '2', '29', '5', 'yes', 'yes', '1658922010.jpg', NULL, '2022-07-27 06:10:10'),
(4, 'Acrylic on canvas 10 (36″x48″)', 14200, 13200, '<p>Tree Themed Meditating Buddha&ndash; Duo-toned, modern art, acrylic on Canvas 36&Prime;x48&Prime;. Let this art be a reminder to believe in the roots of our existence, to acknowledge it as the composition of nature and that- it is our quality to be calm, meditative and all-accepting!&quot;</p>', 0, '11', '2', '30', '6', 'yes', 'yes', '1658922031.jpg', NULL, '2022-07-27 06:10:31'),
(5, 'Acrylic on canvas 11 (36″x36″)', 9900, 9900, '<p>Portraying the love birds might seem romantic but lovers can dwell on different branches of the same tree- this vintage aspect of every love story is brought out through this artwork to show that lovers may at times, turn their faces but still dwell in the same space.&quot;</p>', 0, '11', '2', '29', '5', 'yes', 'yes', '1658922062.jpg', NULL, '2022-07-27 06:11:02'),
(6, 'Acrylic on canvas 12 (36″x36″)', 9900, 0, '<p>The depth of our essence is determined by what we choose to reflect- the welcoming of darkness or the advent of a new beginning? Hence, this artwork is proof that endings can be beautiful too!&quot;</p>\r\n\r\n<p>&quot;</p>\r\n\r\n<p>&quot;</p>', 0, '12', '15', '28', '6', 'yes', 'yes', '1658924113.jpg', NULL, '2022-07-27 06:45:13'),
(7, 'Acrylic on canvas 13 (36″x36″)', 9900, 0, '<p>We all have a savage self hidden under the veil of civilization, where such display of tribal women push us to acknowledge the cultural elegance of our clan!&quot;</p>', 0, '151', '15', '29', '5', 'yes', 'yes', '1658922226.jpg', NULL, '2022-07-27 06:13:46'),
(8, 'Acrylic on canvas 14 (36″x36″)', 9900, 0, '<p>cat is is 29 Cherry holds the time long erotic symbolism for a lover&rsquo;s lips which reddens as a juicy ripened cherry on being bitten under the impulse of a wild seduction- a perfect portrait to express the wild innermost desires to your beloved isn&rsquo;t it?&quot;</p>', 0, '45', '20', '28', '6', 'yes', 'yes', '1658922247.jpg', NULL, '2022-07-27 06:14:07'),
(9, 'Acrylic on canvas 15 (24″x36″)', 6600, 0, '<p>The symbolism of these doodled deers exhale the awareness of differences even while painted in the same hue with the same brush by the same hand- just like people do!&quot;</p>\r\n\r\n<p>&quot;</p>', 0, '11', '2', '28', '5', 'yes', 'yes', '1658924165.jpg', NULL, '2022-07-27 06:46:05'),
(10, 'Acrylic on canvas 16 (24″x36″)', 6600, 0, '<p>The Tiger&rsquo;s Vision&ndash; monochromatic abstract acrylic hand painting on 24&Prime;x36&Prime; Canvas. When the comparison of power and ambition comes into the picture, a portrait of such calm fixed gaze serves the platter! Your target might not make sense to the rest, but one must take a Cheetah&rsquo;s leap to succeed!&quot;</p>', 0, '11', '2', '29', '6', 'yes', 'yes', '1658924184.jpg', NULL, '2022-07-27 06:46:24'),
(11, 'Acrylic on canvas 17 (24″x36″)', 6600, 0, '<p>The artist has aptly mixed the feminine symbolism of the delicate hibiscus with the metallic masculinity in his artwork to bring out the modern womanhood who balances her female bloom with a lad&rsquo;s hand equally mastering the home and work spheres at par!&quot;</p>', 0, '11', '2', '28', '5', 'yes', 'yes', '1658924204.jpg', NULL, '2022-07-27 06:46:44'),
(12, 'Acrylic on canvas 18 (20″x20″)', 6600, 0, '<p>&quot;</p>', 0, '11', '2', '29', '6', 'yes', 'yes', '1658924227.jpg', NULL, '2022-07-27 06:47:07'),
(13, 'Acrylic on canvas 19 (20″x20″)', 6600, 0, '<p>&quot;</p>', 0, '151', '20', '28', '5', 'yes', 'yes', '1658924403.jpg', NULL, '2022-07-27 06:50:03'),
(14, 'Acrylic on canvas 2 (30″x40″)', 10000, 0, '<p>&quot;</p>', 0, '1223', '15', '28', '6', 'yes', 'yes', '1658924436.jpg', NULL, '2022-07-27 06:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `email`, `message`, `created_at`, `updated_at`) VALUES
(9, 'DEV SHAH', 'DEV@GMIAL.COM', 'YES THIS PRODUCTS ARE VERY INTERESTING', '2022-06-15 00:05:54', '2022-06-15 00:05:54');

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
(1, 'admin', 'web', '2022-03-28 05:27:08', '2022-03-28 05:27:08'),
(4, 'Marketing manager', 'web', '2022-04-22 07:04:56', '2022-04-22 07:04:56'),
(5, 'shopkeeper', 'web', '2022-06-11 00:59:06', '2022-06-11 00:59:06'),
(6, 'Caller', 'web', '2022-07-27 03:22:27', '2022-07-27 03:22:27');

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
(1, 1),
(1, 4),
(1, 6),
(2, 1),
(2, 4),
(2, 6),
(3, 1),
(3, 4),
(3, 6),
(4, 1),
(4, 4),
(4, 6),
(5, 1),
(5, 4),
(5, 6),
(6, 1),
(6, 4),
(6, 6),
(7, 1),
(7, 4),
(7, 6),
(8, 1),
(8, 4),
(8, 6),
(9, 1),
(9, 4),
(9, 6),
(10, 1),
(10, 4),
(10, 6),
(11, 1),
(11, 4),
(11, 6),
(12, 1),
(12, 4),
(12, 6),
(13, 1),
(13, 4),
(13, 6),
(14, 1),
(14, 4),
(14, 6),
(15, 1),
(15, 4),
(15, 6),
(16, 1),
(16, 4),
(16, 6),
(17, 1),
(17, 4),
(17, 6),
(18, 1),
(18, 4),
(18, 6),
(19, 1),
(19, 4),
(19, 6),
(20, 1),
(20, 4),
(20, 6),
(21, 1),
(21, 4),
(21, 6),
(22, 1),
(22, 4),
(22, 6),
(23, 1),
(23, 4),
(23, 6),
(24, 1),
(24, 4),
(24, 6),
(25, 1),
(25, 4),
(25, 5),
(25, 6),
(26, 1),
(26, 4),
(26, 5),
(26, 6),
(27, 1),
(27, 4),
(27, 5),
(27, 6),
(28, 1),
(28, 4),
(28, 5),
(28, 6),
(29, 1),
(29, 4),
(29, 5),
(29, 6),
(30, 1),
(30, 4),
(30, 5),
(30, 6),
(31, 1),
(31, 4),
(31, 6),
(32, 1),
(32, 4),
(32, 6),
(33, 1),
(33, 4),
(33, 6),
(34, 1),
(34, 4),
(34, 6),
(35, 1),
(35, 4),
(35, 6),
(36, 1),
(36, 4),
(36, 6),
(37, 1),
(37, 4),
(37, 6),
(38, 1),
(38, 4),
(38, 6),
(39, 1),
(39, 4),
(39, 6),
(40, 1),
(40, 4),
(40, 6),
(41, 1),
(41, 4),
(41, 6),
(42, 1),
(42, 4),
(42, 6),
(43, 1),
(43, 4),
(43, 6),
(44, 1),
(44, 4),
(44, 6),
(45, 1),
(45, 4),
(45, 6),
(46, 1),
(46, 4),
(46, 6),
(47, 1),
(47, 4),
(47, 6),
(48, 1),
(48, 4),
(48, 6),
(49, 1),
(49, 4),
(49, 6),
(50, 1),
(50, 4),
(50, 6),
(51, 1),
(51, 4),
(51, 6),
(52, 1),
(52, 4),
(52, 6),
(53, 1),
(53, 4),
(53, 6),
(54, 1),
(54, 4),
(54, 6),
(55, 1),
(55, 4),
(55, 6),
(56, 1),
(56, 4),
(56, 6),
(57, 1),
(57, 4),
(57, 6),
(58, 1),
(58, 4),
(58, 6),
(59, 1),
(59, 4),
(59, 6),
(60, 1),
(60, 4),
(60, 6),
(61, 1),
(61, 4),
(61, 6),
(62, 1),
(62, 4),
(62, 6),
(63, 1),
(63, 4),
(63, 6),
(64, 1),
(64, 4),
(64, 6),
(65, 1),
(65, 4),
(65, 6),
(66, 1),
(66, 4),
(66, 6),
(67, 1),
(67, 4),
(67, 6),
(68, 1),
(68, 4),
(68, 6),
(69, 1),
(69, 4),
(69, 6),
(70, 1),
(70, 4),
(70, 6),
(71, 1),
(71, 4),
(71, 6),
(72, 1),
(72, 4),
(72, 6),
(73, 1),
(73, 4),
(73, 6),
(74, 1),
(74, 4),
(74, 6),
(75, 1),
(75, 4),
(75, 6),
(76, 1),
(76, 4),
(76, 6),
(77, 1),
(77, 4),
(77, 6),
(78, 1),
(78, 4),
(78, 6),
(79, 1),
(79, 4),
(79, 6),
(80, 1),
(80, 4),
(80, 6),
(81, 1),
(81, 4),
(81, 6),
(82, 1),
(82, 4),
(82, 6),
(83, 1),
(83, 4),
(83, 6),
(84, 1),
(84, 4),
(84, 6),
(85, 1),
(85, 4),
(85, 6),
(86, 1),
(86, 4),
(86, 6),
(88, 1),
(88, 4),
(89, 1),
(89, 4),
(90, 1),
(90, 4),
(90, 6),
(91, 1),
(91, 4),
(92, 1),
(92, 4),
(92, 6),
(94, 6);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicator_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `image_fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `market_id` int(11) NOT NULL,
  `enabled` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `order_id`, `text`, `button`, `text_position`, `text_color`, `button_color`, `background_color`, `indicator_color`, `image`, `image_fit`, `product_id`, `market_id`, `enabled`, `created_at`, `updated_at`) VALUES
(2, 41, 'qaaaa', 'this is button', 'right', 'black', 'blue', 'red', 'yellow', 0x313634373835323035302e6a7067, 'gray', 15, 4, 'on', '2022-03-21 03:10:50', '2022-03-21 03:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JIgar', 'admin@gmail.com', 'admin', NULL, NULL, '$2y$10$N1CMrl9BkHZod0HR1ZsXVOLaKzzD2ORJA6DgMW0ySuYNXzQfrLSa2', NULL, '2022-03-28 05:29:31', '2022-03-28 05:29:31'),
(12, 'ravi', 'ravi@gmail.com', 'ravi', NULL, NULL, '$2y$10$aKAdvlKOSkh62KsV3jHz5O8kzgmnuocouuCBQ.RsLo0wnotc1MRp2', NULL, '2022-04-22 07:00:50', '2022-04-22 07:00:50'),
(14, 'rudrika', 'rudrika@gmail.com', 'rudrika', NULL, NULL, '$2y$10$u/2VVJ0qNzupFYLZtKWnXupKzFTbfQQdoBO4EZKYH.8JXyYqqq0Qy', NULL, '2022-04-22 07:02:14', '2022-04-22 07:02:14'),
(15, 'Dev', 'dev@gmail.com', 'dev', NULL, NULL, '$2y$10$6TdSFYgIXMUvSJXSXpUcA.7y56hLLB5UTtn83eYN.sm2SHEGWjLBm', NULL, '2022-06-11 01:01:32', '2022-06-11 01:01:32'),
(16, 'Admin', 'admin@demo.com', 'admin', NULL, 1, '$2y$10$lxzRfYyr0qdliSgxVlQx4eIbMlGAWm1kI9RtsyK9rDx3FoIRye9HS', NULL, '2022-06-14 01:08:49', '2022-06-14 01:08:49'),
(17, 'User', 'user@demo.com', 'user', NULL, 0, '$2y$10$.bhGHL47aauyU4LG5CuJYOGqE2ysjimPIDZndS84YJUSc5Pl1FBmK', NULL, '2022-06-14 01:08:49', '2022-06-14 01:08:49'),
(18, 'Bharat', 'bharat@gmail.com', 'bharat', NULL, NULL, '$2y$10$cdRDHFqdIdV7qZjOx2c/o.wylPp3xsrorkxxJB0K0KrCTaig8GMDK', NULL, '2022-07-27 03:23:29', '2022-07-27 03:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `vouchardetails`
--

CREATE TABLE `vouchardetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vouchar_id` int(11) NOT NULL,
  `vouchar_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchardetails`
--

INSERT INTO `vouchardetails` (`id`, `vouchar_id`, `vouchar_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '1605949281', 'Active', '2022-03-22 03:54:40', '2022-03-22 03:54:40'),
(2, 2, '747614947', 'Active', '2022-03-22 03:54:40', '2022-03-22 03:54:40'),
(3, 2, '528404302', 'Active', '2022-03-22 03:54:40', '2022-03-22 03:54:40'),
(4, 2, '1937428967', 'Active', '2022-03-22 03:54:40', '2022-03-22 03:54:40'),
(5, 2, '1370544502', 'Active', '2022-03-22 03:54:40', '2022-03-22 03:54:40'),
(6, 10, '1', 'Active', '2022-03-22 04:21:26', '2022-03-22 04:21:26'),
(7, 10, '7', 'Active', '2022-03-22 04:21:26', '2022-03-22 04:21:26'),
(8, 10, '5', 'Active', '2022-03-22 04:21:26', '2022-03-22 04:21:26'),
(9, 10, '5', 'Active', '2022-03-22 04:21:26', '2022-03-22 04:21:26'),
(10, 10, '1', 'Active', '2022-03-22 04:21:26', '2022-03-22 04:21:26'),
(11, 11, '0', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(12, 11, '0', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(13, 11, '1', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(14, 11, '5', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(15, 11, '0', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(16, 11, '3', 'Active', '2022-03-22 04:22:21', '2022-03-22 04:22:21'),
(17, 13, '7', 'Active', '2022-03-22 04:24:36', '2022-03-22 04:24:36'),
(18, 13, '7', 'Active', '2022-03-22 04:24:36', '2022-03-22 04:24:36'),
(19, 13, '7', 'Active', '2022-03-22 04:24:36', '2022-03-22 04:24:36'),
(20, 13, '7', 'Active', '2022-03-22 04:24:36', '2022-03-22 04:24:36'),
(21, 15, '88abdc66-876e-4de8-92f3-81b7f3bf7bcf', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(22, 15, '2e619cd1-b2eb-4164-baa8-5f276e5fac26', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(23, 15, 'dadf90f1-aba0-47b7-935f-b35620789951', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(24, 15, '9da6b4f9-4264-4753-a5da-6a3f748576d5', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(25, 15, 'bd18429d-ce74-4643-a04c-417ba6e4bc66', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(26, 15, '7e6ca6a3-0800-4645-b9ba-053ad0b0b133', 'Active', '2022-03-22 06:25:10', '2022-03-22 06:25:10'),
(27, 15, '15a8e82d-c74d-4f64-8e65-ab4cdaf5000a', 'Active', '2022-03-22 06:25:11', '2022-03-22 06:25:11'),
(28, 15, '05a5a367-1f09-4d12-b8df-dfbe94ca7ce4', 'Active', '2022-03-22 06:25:11', '2022-03-22 06:25:11'),
(29, 15, 'a1a9edbb-b8ec-423e-890f-4510e4ed25af', 'Active', '2022-03-22 06:25:11', '2022-03-22 06:25:11'),
(30, 15, '3f18774c-50c0-4e34-9de9-4fcebcad8ce1', 'Active', '2022-03-22 06:25:11', '2022-03-22 06:25:11'),
(31, 16, 'fbd7caae-899f-497b-8619-a27eb1f703a5', 'Active', '2022-03-22 06:25:43', '2022-03-22 06:25:43'),
(32, 24, '66aca5a5-9e07-4ed3-b0fc-f60f25b2efcd', 'Active', '2022-03-22 06:56:02', '2022-03-22 06:56:02'),
(33, 25, 'f4414952-614a-4fdb-a05d-f4b24a7868b0', 'Active', '2022-03-22 06:56:26', '2022-03-22 06:56:26'),
(34, 26, '2c9b8e0b-740b-4915-9546-cdaac84efcba', 'Active', '2022-03-28 04:15:37', '2022-03-28 04:15:37'),
(35, 26, '264414ef-2901-4026-9701-7352fede4f5f', 'Active', '2022-03-28 04:15:37', '2022-03-28 04:15:37'),
(36, 26, '7ca6e1b7-ce62-421a-9fb3-7756c2e89ebf', 'Active', '2022-03-28 04:15:37', '2022-03-28 04:15:37'),
(37, 27, '8cb4a545-75ff-46b4-82fe-7fc6aa5b6b15', 'Active', '2022-03-28 04:16:06', '2022-03-28 04:16:06'),
(38, 27, '66aebae4-e4ec-4e1b-b6c9-15223235df65', 'Active', '2022-03-28 04:16:06', '2022-03-28 04:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `voucharmasters`
--

CREATE TABLE `voucharmasters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vouchar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vouchar_prize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vouchar_expiry` date NOT NULL,
  `vouchar_associated_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `vouchar_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucharmasters`
--

INSERT INTO `voucharmasters` (`id`, `vouchar_name`, `vouchar_prize`, `vouchar_expiry`, `vouchar_associated_mobile`, `quantity`, `vouchar_status`, `created_at`, `updated_at`) VALUES
(26, 'test vouchar', '1500', '2022-12-14', '99999999', 3, 'active', '2022-03-28 04:15:37', '2022-03-28 04:15:37'),
(27, 'demo vouchar', '2000', '2026-06-04', '98989898', 2, 'active', '2022-03-28 04:16:06', '2022-03-28 04:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(10, 1, 4, '2022-06-15 05:47:23', '2022-06-15 05:47:23'),
(11, 1, 4, '2022-06-15 05:48:17', '2022-06-15 05:48:17'),
(12, 1, 4, '2022-06-15 05:48:47', '2022-06-15 05:48:47'),
(13, 1, 6, '2022-06-15 22:44:15', '2022-06-15 22:44:15'),
(14, 1, 3, '2022-08-02 02:54:07', '2022-08-02 02:54:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discountables`
--
ALTER TABLE `discountables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
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
-- Indexes for table `optiongroups`
--
ALTER TABLE `optiongroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productgalleries`
--
ALTER TABLE `productgalleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchardetails`
--
ALTER TABLE `vouchardetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucharmasters`
--
ALTER TABLE `voucharmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discountables`
--
ALTER TABLE `discountables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `optiongroups`
--
ALTER TABLE `optiongroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productgalleries`
--
ALTER TABLE `productgalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vouchardetails`
--
ALTER TABLE `vouchardetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `voucharmasters`
--
ALTER TABLE `voucharmasters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
