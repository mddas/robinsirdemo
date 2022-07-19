-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 10:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Role`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(5) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(9, 'Electronics', '202205222034electronics.jpeg', '2022-05-22 14:49:06', '2022-05-22 14:49:06'),
(10, 'Clothes', '202205222038clothes.jpg', '2022-05-22 14:53:45', '2022-05-22 14:53:45'),
(11, 'Accessories', '202205222048accessories.jpg', '2022-05-22 15:03:56', '2022-05-22 15:03:56'),
(12, 'Hardware Store', '202205222050hardware.jpg', '2022-05-22 15:05:13', '2022-05-22 15:05:13'),
(13, 'Food', '202205222053food.jpg', '2022-05-22 15:08:54', '2022-05-22 15:08:54'),
(14, 'Games', '202205222059game1.png', '2022-05-22 15:14:22', '2022-05-22 15:14:22'),
(15, 'Vegitables', '202205222239vegitable.jpeg', '2022-05-22 16:54:44', '2022-05-22 16:54:44'),
(16, 'Fashion', '202205222240fashion.jpg', '2022-05-22 16:55:21', '2022-05-22 16:55:21'),
(17, 'Furniture', '202205222240furniture.jpeg', '2022-05-22 16:55:53', '2022-05-22 16:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `categoryhassubcategories`
--

CREATE TABLE `categoryhassubcategories` (
  `id` int(11) NOT NULL,
  `category_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categoryhassubcategories`
--

INSERT INTO `categoryhassubcategories` (`id`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(12, '9', '13', '2022-05-22 14:49:48', '2022-05-22 14:49:48'),
(13, '9', '15', '2022-05-22 14:53:00', '2022-05-22 14:53:00'),
(14, '10', '16', '2022-05-22 14:54:15', '2022-05-22 14:54:15'),
(15, '10', '17', '2022-05-22 14:54:58', '2022-05-22 14:54:58'),
(16, '13', '18', '2022-05-25 15:07:32', '2022-05-25 15:07:32'),
(17, '11', '19', '2022-06-05 03:01:14', '2022-06-05 03:01:14'),
(18, '17', '20', '2022-06-06 14:19:19', '2022-06-06 14:19:19'),
(19, '15', '21', '2022-06-06 14:23:05', '2022-06-06 14:23:05');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_02_062654_create_permission_tables', 1),
(6, '2022_05_05_080537_create_products_table', 1),
(7, '2022_05_09_002019_create_categories_table', 1),
(8, '2022_05_09_002123_create_subcategories_table', 1),
(9, '2022_05_09_002246_create_categoryhassubcategories_table', 1),
(10, '2022_05_19_231835_create_carts_table', 2),
(11, '2022_05_19_232631_create_carts_table', 3),
(12, '2022_05_24_005952_create_shippingaddresses_table', 4),
(13, '2022_06_06_085431_create_orders_table', 5);

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
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `payment_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cancel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `products`, `payment_type`, `created_at`, `updated_at`, `cancel`) VALUES
(26, '20220607-2846', '1', '[{\"id\":95,\"user_id\":\"1\",\"product_id\":\"51\",\"quantity\":3,\"payment\":null,\"created_at\":\"2022-06-07T02:22:33.000000Z\",\"updated_at\":\"2022-06-07T22:56:41.000000Z\",\"get_product\":{\"id\":51,\"name\":\"samsung mobile\",\"category_id\":\"9\",\"subcategory_id\":\"13\",\"quantity\":5,\"brand\":null,\"unit_price\":\"pieces\",\"description\":\"this is mobile\",\"image\":\"[\\\"202206061959samsung-galaxy-a33-5g.jpg\\\",\\\"202206061959samsung-galaxy-a52s-5g.jpg\\\"]\",\"price\":3000,\"discount_type\":\"flat\",\"discount\":50,\"tax_type\":\"percent\",\"tax\":60,\"shipping_type\":null,\"shipping_cost\":null,\"show\":null,\"created_at\":\"2022-06-06T19:59:30.000000Z\",\"updated_at\":\"2022-06-06T19:59:30.000000Z\"},\"get_shipping_address\":{\"id\":17,\"name\":\"Md das\",\"number\":\"9808059156\",\"email\":\"mddasgudiya@gmail.com\",\"city_town_village\":\"KTM\",\"state\":\"Bagmati\",\"googleLocation\":\"location\",\"user_id\":\"1\",\"status\":null,\"created_at\":\"2022-06-07T20:59:41.000000Z\",\"updated_at\":\"2022-06-07T20:59:41.000000Z\"}},{\"id\":100,\"user_id\":\"1\",\"product_id\":\"50\",\"quantity\":1,\"payment\":null,\"created_at\":\"2022-06-07T22:56:18.000000Z\",\"updated_at\":\"2022-06-07T22:56:18.000000Z\",\"get_product\":{\"id\":50,\"name\":\"Sari\",\"category_id\":\"10\",\"subcategory_id\":\"16\",\"quantity\":4,\"brand\":null,\"unit_price\":\"pieces\",\"description\":\"this is saaro\",\"image\":\"[\\\"202206061958saari.jpg\\\",\\\"202206061958saari2.jpeg\\\"]\",\"price\":500,\"discount_type\":\"percent\",\"discount\":10,\"tax_type\":\"percent\",\"tax\":20,\"shipping_type\":null,\"shipping_cost\":null,\"show\":null,\"created_at\":\"2022-06-06T19:58:23.000000Z\",\"updated_at\":\"2022-06-06T19:58:23.000000Z\"},\"get_shipping_address\":{\"id\":17,\"name\":\"Md das\",\"number\":\"9808059156\",\"email\":\"mddasgudiya@gmail.com\",\"city_town_village\":\"KTM\",\"state\":\"Bagmati\",\"googleLocation\":\"location\",\"user_id\":\"1\",\"status\":null,\"created_at\":\"2022-06-07T20:59:41.000000Z\",\"updated_at\":\"2022-06-07T20:59:41.000000Z\"}},{\"id\":101,\"user_id\":\"1\",\"product_id\":\"53\",\"quantity\":2,\"payment\":null,\"created_at\":\"2022-06-07T22:56:27.000000Z\",\"updated_at\":\"2022-06-07T22:57:08.000000Z\",\"get_product\":{\"id\":53,\"name\":\"berger food\",\"category_id\":\"13\",\"subcategory_id\":\"18\",\"quantity\":5,\"brand\":null,\"unit_price\":\"pieces\",\"description\":\"veg berger\",\"image\":\"[\\\"202206062002food.jpg\\\"]\",\"price\":10,\"discount_type\":\"flat\",\"discount\":80,\"tax_type\":\"percent\",\"tax\":20,\"shipping_type\":null,\"shipping_cost\":null,\"show\":null,\"created_at\":\"2022-06-06T20:02:52.000000Z\",\"updated_at\":\"2022-06-06T20:02:52.000000Z\"},\"get_shipping_address\":{\"id\":17,\"name\":\"Md das\",\"number\":\"9808059156\",\"email\":\"mddasgudiya@gmail.com\",\"city_town_village\":\"KTM\",\"state\":\"Bagmati\",\"googleLocation\":\"location\",\"user_id\":\"1\",\"status\":null,\"created_at\":\"2022-06-07T20:59:41.000000Z\",\"updated_at\":\"2022-06-07T20:59:41.000000Z\"}}]', 'E-SEWA', '2022-06-07 17:12:33', '2022-06-12 20:39:18', 1),
(37, '20220613-3611', '1', '[{\"id\":116,\"user_id\":\"1\",\"product_id\":\"55\",\"quantity\":1,\"payment\":null,\"created_at\":\"2022-06-13T01:15:21.000000Z\",\"updated_at\":\"2022-06-13T01:15:21.000000Z\",\"get_product\":{\"id\":55,\"name\":\"saari\",\"category_id\":\"10\",\"subcategory_id\":\"16\",\"quantity\":20,\"brand\":null,\"unit_price\":\"pieces\",\"description\":\"latest saari\",\"image\":\"[\\\"202206062006saari2.jpeg\\\"]\",\"price\":1000,\"discount_type\":\"flat\",\"discount\":43,\"tax_type\":\"percent\",\"tax\":19,\"shipping_type\":null,\"shipping_cost\":0,\"show\":null,\"created_at\":\"2022-06-06T20:06:54.000000Z\",\"updated_at\":\"2022-06-06T20:06:54.000000Z\"},\"get_shipping_address\":{\"id\":21,\"name\":\"asd\",\"number\":\"1234\",\"email\":\"A@A.A\",\"city_town_village\":\"ASAd\",\"state\":\"ADS\",\"googleLocation\":\"ED\",\"user_id\":\"1\",\"status\":null,\"created_at\":\"2022-06-08T01:55:38.000000Z\",\"updated_at\":\"2022-06-08T01:55:38.000000Z\"}},{\"id\":117,\"user_id\":\"1\",\"product_id\":\"56\",\"quantity\":1,\"payment\":null,\"created_at\":\"2022-06-13T01:15:25.000000Z\",\"updated_at\":\"2022-06-13T01:15:25.000000Z\",\"get_product\":{\"id\":56,\"name\":\"green vegitable\",\"category_id\":\"15\",\"subcategory_id\":\"21\",\"quantity\":10,\"brand\":null,\"unit_price\":\"kg\",\"description\":\"vegitable\",\"image\":\"[\\\"202206062009vegitable.jpeg\\\"]\",\"price\":95,\"discount_type\":\"flat\",\"discount\":0,\"tax_type\":\"flat\",\"tax\":20,\"shipping_type\":null,\"shipping_cost\":0,\"show\":null,\"created_at\":\"2022-06-06T20:09:22.000000Z\",\"updated_at\":\"2022-06-06T20:09:22.000000Z\"},\"get_shipping_address\":{\"id\":21,\"name\":\"asd\",\"number\":\"1234\",\"email\":\"A@A.A\",\"city_town_village\":\"ASAd\",\"state\":\"ADS\",\"googleLocation\":\"ED\",\"user_id\":\"1\",\"status\":null,\"created_at\":\"2022-06-08T01:55:38.000000Z\",\"updated_at\":\"2022-06-08T01:55:38.000000Z\"}}]', 'E-SEWA', '2022-06-12 19:31:37', '2022-06-12 20:39:25', 0);

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
(1, 'edit', 'web', '2022-05-18 19:00:57', '2022-05-18 19:00:57'),
(2, 'create', 'web', NULL, NULL),
(3, 'delete', 'web', '2022-05-18 19:27:27', '2022-05-18 19:27:27'),
(4, 'view', 'web', '2022-05-18 19:28:08', '2022-05-18 19:28:08'),
(5, 'role', 'web', '2022-05-18 19:29:01', '2022-05-18 19:29:01'),
(6, 'user', 'web', '2022-06-06 03:40:43', '2022-06-06 03:40:43');

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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`image`)),
  `price` int(10) NOT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `tax_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` int(10) DEFAULT NULL,
  `shipping_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `shipping_cost` int(10) DEFAULT NULL,
  `show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `subcategory_id`, `quantity`, `brand`, `unit_price`, `description`, `image`, `price`, `discount_type`, `discount`, `tax_type`, `tax`, `shipping_type`, `shipping_cost`, `show`, `created_at`, `updated_at`) VALUES
(49, 'vest', '10', '17', 3, NULL, 'pieces', 'this is vest', '[\"202206060956vest.jpg\"]', 200, 'percent', 5, 'percent', 2, NULL, 0, NULL, '2022-06-06 04:11:17', '2022-06-06 04:11:17'),
(50, 'Sari', '10', '16', 4, NULL, 'pieces', 'this is saaro', '[\"202206061958saari.jpg\",\"202206061958saari2.jpeg\"]', 500, 'percent', 10, 'percent', 20, NULL, 0, NULL, '2022-06-06 14:13:23', '2022-06-06 14:13:23'),
(51, 'samsung mobile', '9', '13', 5, NULL, 'pieces', 'this is mobile', '[\"202206061959samsung-galaxy-a33-5g.jpg\",\"202206061959samsung-galaxy-a52s-5g.jpg\"]', 3000, 'flat', 50, 'percent', 60, NULL, 0, NULL, '2022-06-06 14:14:30', '2022-06-06 14:14:30'),
(52, 'laptop', '9', '15', 7, NULL, 'pieces', 'this is dell i5 vostro', '[\"202206062001laptop.png\"]', 100000, 'percent', 20, 'percent', 50, NULL, 0, NULL, '2022-06-06 14:16:10', '2022-06-06 14:16:10'),
(53, 'berger food', '13', '18', 5, NULL, 'pieces', 'veg berger', '[\"202206062002food.jpg\"]', 10, 'flat', 80, 'percent', 20, NULL, 0, NULL, '2022-06-06 14:17:52', '2022-06-06 14:17:52'),
(54, 'bed wood', '17', '20', 4, NULL, 'pieces', 'this is bed', '[\"202206062005furniture.jpeg\"]', 10, 'percent', 2, 'flat', 3, NULL, 0, NULL, '2022-06-06 14:20:20', '2022-06-06 14:20:20'),
(55, 'saari', '10', '16', 20, NULL, 'pieces', 'latest saari', '[\"202206062006saari2.jpeg\"]', 1000, 'flat', 43, 'percent', 19, NULL, 0, NULL, '2022-06-06 14:21:54', '2022-06-06 14:21:54'),
(56, 'green vegitable', '15', '21', 10, NULL, 'kg', 'vegitable', '[\"202206062009vegitable.jpeg\"]', 95, 'flat', 0, 'flat', 20, NULL, 0, NULL, '2022-06-06 14:24:22', '2022-06-06 14:24:22'),
(57, 'Dell vostro', '9', '15', 23, NULL, 'pieces', 'this is vostro', '[\"202206080138laptop.png\"]', 490000, 'flat', 230, 'flat', 23, '0', 0, NULL, '2022-06-07 19:53:53', '2022-06-07 19:53:53'),
(60, 'vest', '10', '17', 89, NULL, 'pieces', 'kjhjkjhkj', '[\"202206080659vest.jpg\"]', 4, 'flat', 98, 'flat', 89, '0', 78, NULL, '2022-06-08 01:14:31', '2022-06-08 01:14:31');

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
(2, 'admin', 'web', '2022-05-18 19:16:20', '2022-05-18 19:16:20'),
(3, 'user', 'web', '2022-05-20 10:28:30', '2022-05-20 10:28:30');

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
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(4, 3),
(5, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddresses`
--

CREATE TABLE `shippingaddresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_town_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `googleLocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingaddresses`
--

INSERT INTO `shippingaddresses` (`id`, `name`, `number`, `email`, `city_town_village`, `state`, `googleLocation`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(17, 'Md das', '9808059156', 'mddasgudiya@gmail.com', 'KTM', 'Bagmati', 'location', '1', NULL, '2022-06-07 15:14:41', '2022-06-07 15:14:41'),
(18, 'e', '213', 'qw!@d.x', 'afs', 'fd', 'wew', '1', NULL, '2022-06-07 17:34:51', '2022-06-07 17:34:51'),
(19, 'lksdddfl', '2332', 'customer@example.com', 'sdskfjl', 'sldkdf;lk', 'sdfdk', '1', NULL, '2022-06-07 17:59:19', '2022-06-07 17:59:19'),
(20, 'aksjhda', '2283098', 'customer@example.com', 'slkdd', 'lklasa', 'asalkdkl', '1', NULL, '2022-06-07 18:03:17', '2022-06-07 18:03:17'),
(21, 'asd', '1234', 'A@A.A', 'ASAd', 'ADS', 'ED', '1', NULL, '2022-06-07 20:10:38', '2022-06-07 20:10:38'),
(22, 'MD das', '9807704794', 'manojdas.py@gmail.com', 'rajbiraj', 'Mithla', 'location', '4', NULL, '2022-06-08 19:46:11', '2022-06-08 19:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(13, 'Mobiles', '202205222034apple-iphone-7-5.jpg', '2022-05-22 14:49:48', '2022-05-22 14:49:48'),
(15, 'Laptop', '202205222038laptop.png', '2022-05-22 14:53:00', '2022-05-22 14:53:00'),
(16, 'Saaries', '202205222039saari.jpg', '2022-05-22 14:54:14', '2022-05-22 14:54:14'),
(17, 'Male clothes', '202205222039vest.jpg', '2022-05-22 14:54:57', '2022-05-22 14:54:57'),
(18, 'veg food', '202205252052food.jpg', '2022-05-25 15:07:32', '2022-05-25 15:07:32'),
(19, 'glass', '202206050846glass.jpeg', '2022-06-05 03:01:14', '2022-06-05 03:01:14'),
(20, 'room_wood', '202206062004furniture.jpeg', '2022-06-06 14:19:18', '2022-06-06 14:19:18'),
(21, 'green vegitable', '202206062008vegitable.jpeg', '2022-06-06 14:23:04', '2022-06-06 14:23:04');

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
(1, 'Manmoj das', 'mddasgudiya@gmail.com', NULL, '$2y$10$ck0o1VVneDkSJfpcSe/DJeVz/UIqzSD2YBVFGeHy2h/XUXi6yCXAu', NULL, '2022-05-18 18:56:33', '2022-05-18 18:56:33'),
(3, 'Bipin sir', 'neplovip@gmail.com', NULL, '$2y$10$h5dwc1HtmPMwxHFW0EyW7Ofg8p9blntPDPd2WFIIxgZzQ9P9I0MN.', NULL, '2022-05-19 19:10:28', '2022-05-19 19:10:28'),
(4, 'Md', 'manojdas.py@gmail.com', NULL, '$2y$10$7jsArVwTjQwLxd7E.31GrOgW2fuunXdFuGTCLRmFnkWlnu5mVfH56', NULL, '2022-06-01 14:21:35', '2022-06-06 03:56:23');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categoryhassubcategories`
--
ALTER TABLE `categoryhassubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- Indexes for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categoryhassubcategories`
--
ALTER TABLE `categoryhassubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
