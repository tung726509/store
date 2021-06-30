-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 10:07 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `quantity`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 23, 1, '2020-11-13 08:24:22', NULL),
(2, 5, 10, 23, NULL, '2020-11-13 08:24:46', NULL),
(3, 1, 1, 23, NULL, '2020-11-13 08:25:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT '',
  `pretty_name` varchar(191) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `pretty_name`, `image_name`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'vongco', 'Vòng Cổ', '1598607661.png', '2020-08-28 09:41:01', '2020-08-28 09:41:01', 1),
(2, 'nhan', 'Nhẫn', '1598607676.jpeg', '2020-08-28 09:41:16', '2020-08-28 09:41:16', 1),
(17, 'sip', 'Sịp', '1598607713.png', '2020-08-28 09:41:53', '2020-08-28 09:41:53', 1),
(19, 'ao', 'Áo', '1598608256.png', '2020-08-28 09:50:56', '2020-08-28 09:50:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Hà Nội', '01', '2019-06-25 17:18:21', NULL),
(2, 'Thành phố Hồ Chí Minh', '79', '2019-06-25 17:18:21', NULL),
(3, 'Đà Nẵng', '48', '2019-06-25 17:18:21', NULL),
(4, 'Hải Phòng', '31', '2019-06-25 17:18:21', NULL),
(5, 'Cần Thơ', '92', '2019-06-25 17:18:21', NULL),
(6, 'An Giang', '89', '2019-06-25 17:18:21', NULL),
(7, 'Bắc Kạn', '06', '2019-06-25 17:18:21', NULL),
(8, 'Bình Định', '52', '2019-06-25 17:18:21', NULL),
(9, 'Bình Dương', '74', '2019-06-25 17:18:21', NULL),
(10, 'Bắc Giang', '24', '2019-06-25 17:18:21', NULL),
(11, 'Bạc Liêu', '95', '2019-06-25 17:18:21', NULL),
(12, 'Bắc Ninh', '27', '2019-06-25 17:18:21', NULL),
(13, 'Bình Phước', '70', '2019-06-25 17:18:21', NULL),
(14, 'Bình Thuận', '60', '2019-06-25 17:18:21', NULL),
(15, 'Bến Tre', '83', '2019-06-25 17:18:21', NULL),
(16, 'Cao Bằng', '04', '2019-06-25 17:18:21', NULL),
(17, 'Cà Mau', '96', '2019-06-25 17:18:21', NULL),
(18, 'Điện Biên', '11', '2019-06-25 17:18:21', NULL),
(19, 'Đắk Lắk', '66', '2019-06-25 17:18:21', NULL),
(20, 'Đồng Nai', '75', '2019-06-25 17:18:21', NULL),
(21, 'Đắk Nông', '67', '2019-06-25 17:18:21', NULL),
(22, 'Đồng Tháp', '87', '2019-06-25 17:18:21', NULL),
(23, 'Gia Lai', '64', '2019-06-25 17:18:21', NULL),
(24, 'Thừa Thiên Huế', '46', '2019-06-25 17:18:21', NULL),
(25, 'Hoà Bình', '17', '2019-06-25 17:18:21', NULL),
(26, 'Hải Dương', '30', '2019-06-25 17:18:21', NULL),
(27, 'Hà Giang', '02', '2019-06-25 17:18:21', NULL),
(28, 'Hậu Giang', '93', '2019-06-25 17:18:21', NULL),
(29, 'Hà Nam', '35', '2019-06-25 17:18:21', NULL),
(30, 'Hà Tĩnh', '42', '2019-06-25 17:18:21', NULL),
(31, 'Hưng Yên', '33', '2019-06-25 17:18:21', NULL),
(32, 'Kiên Giang', '91', '2019-06-25 17:18:21', NULL),
(33, 'Khánh Hoà', '56', '2019-06-25 17:18:21', NULL),
(34, 'Kon Tum', '62', '2019-06-25 17:18:21', NULL),
(35, 'Long An', '80', '2019-06-25 17:18:21', NULL),
(36, 'Lào Cai', '10', '2019-06-25 17:18:21', NULL),
(37, 'Lai Châu', '12', '2019-06-25 17:18:21', NULL),
(38, 'Lâm Đồng', '68', '2019-06-25 17:18:21', NULL),
(39, 'Lạng Sơn', '20', '2019-06-25 17:18:21', NULL),
(40, 'Nam Định', '36', '2019-06-25 17:18:21', NULL),
(41, 'Ninh Bình', '37', '2019-06-25 17:18:21', NULL),
(42, 'Nghệ An', '40', '2019-06-25 17:18:21', NULL),
(43, 'Ninh Thuận', '58', '2019-06-25 17:18:21', NULL),
(44, 'Phú Thọ', '25', '2019-06-25 17:18:21', NULL),
(45, 'Phú Yên', '54', '2019-06-25 17:18:21', NULL),
(46, 'Quảng Bình', '44', '2019-06-25 17:18:21', NULL),
(47, 'Quảng Nam', '49', '2019-06-25 17:18:21', NULL),
(48, 'Quảng Ngãi', '51', '2019-06-25 17:18:21', NULL),
(49, 'Quảng Trị', '45', '2019-06-25 17:18:21', NULL),
(50, 'Quảng Ninh', '22', '2019-06-25 17:18:21', NULL),
(51, 'Sơn La', '14', '2019-06-25 17:18:21', NULL),
(52, 'Sóc Trăng', '94', '2019-06-25 17:18:21', NULL),
(53, 'Thái Bình', '34', '2019-06-25 17:18:21', NULL),
(54, 'Tuyên Quang', '08', '2019-06-25 17:18:21', NULL),
(55, 'Thanh Hoá', '38', '2019-06-25 17:18:21', NULL),
(56, 'Tiền Giang', '82', '2019-06-25 17:18:21', NULL),
(57, 'Thái Nguyên', '19', '2019-06-25 17:18:21', NULL),
(58, 'Tây Ninh', '72', '2019-06-25 17:18:21', NULL),
(59, 'Trà Vinh', '84', '2019-06-25 17:18:21', NULL),
(60, 'Vĩnh Long', '86', '2019-06-25 17:18:21', NULL),
(61, 'Vĩnh Phúc', '26', '2019-06-25 17:18:21', NULL),
(62, 'Bà Rịa - Vũng Tàu', '77', '2019-06-25 17:18:21', NULL),
(63, 'Yên Bái', '15', '2019-06-25 17:18:21', NULL),
(64, 'Khác', '000', '2019-06-25 17:18:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cookiees`
--

CREATE TABLE `cookiees` (
  `id` int(10) UNSIGNED NOT NULL,
  `cookie_string` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookiees`
--

INSERT INTO `cookiees` (`id`, `cookie_string`, `customer_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(217, '16225388128YHY', 23, NULL, '2021-06-01 09:13:32', '2021-06-02 07:27:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `d_o_b` timestamp NULL DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `total_money` decimal(10,0) DEFAULT NULL,
  `total_payed` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `password`, `address`, `d_o_b`, `facebook`, `total_money`, `total_payed`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'tùng', '0329585709', NULL, '18 nguyễn trãi', '2021-05-11 17:00:00', NULL, '0', '499700', '2020-06-11 03:17:51', 1, '2021-05-22 01:23:32', NULL, NULL, NULL),
(2, 'hà an cute', '0329585706', NULL, '140 đường láng', '2020-10-12 17:00:00', NULL, '229950', NULL, '2020-06-11 03:17:53', NULL, '2020-11-17 01:26:46', NULL, NULL, NULL),
(3, 'hà an 12', '0329585705', NULL, 'láng hạ ahi', '2020-06-29 17:00:00', NULL, NULL, NULL, '2020-06-11 03:17:53', NULL, '2020-11-06 06:43:23', NULL, NULL, NULL),
(14, 'tùng nạnh nùng', '0329585700', NULL, 'gôc đề', NULL, NULL, NULL, NULL, '2020-10-11 08:16:52', 1, '2020-10-11 08:16:52', NULL, NULL, NULL),
(23, 'tùng', '0329585702', NULL, 'thanh xuân', '2021-05-31 17:00:00', NULL, NULL, NULL, '2021-05-21 06:53:30', NULL, '2021-06-01 09:20:01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `origin_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `slug`, `name`, `origin_name`, `created_at`, `updated_at`) VALUES
(0, 'medium_banner_images', '1598426593.jpg', NULL, NULL, NULL),
(1, 'b_b_i', '1598426500.jpg', 'big-banner1.jpg', '2020-08-26 07:20:16', '2020-08-26 07:29:44'),
(2, 'b_b_i', '1598426544.jpg', 'big-banner2.jpg', '2020-08-26 07:20:18', '2020-08-26 07:29:46'),
(4, 's_b_i', '1598426681.jpg', 'small-banner.jpg', '2020-08-26 07:25:05', '2020-08-26 07:29:50');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_27_065554_create_sessions_table', 2),
(4, '2014_10_12_100000_create_password_resets_table', 3),
(5, '2020_08_06_161446_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `slug`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'use_birth_discount', 'công tắc sinh nhật', '{\"key\":1,\"value\":10}', '2020-06-19 02:01:38', '2021-05-14 06:51:13'),
(2, 'use_free_ship', 'công tắc freeship đơn hàng trên xxxk', '{\"key\":1,\"value\":200000}', '2020-06-19 02:15:13', '2021-05-11 08:16:33'),
(3, 'use_transfer_discount', 'chuyển khỏa giảm xx%', '{\"key\":1,\"value\":4}', '2020-08-13 02:12:18', '2021-06-02 07:22:08'),
(4, 'b_b_i', 'big banner', '{\"name\":[\"1603531775.jpeg\"],\"text\":{\"1\":\"Finds\",\"2\":\"Summer Sale\",\"3\":\"OFF 70%\",\"4\":\"Shop Now!\"}}', '2020-08-26 07:44:40', '2020-10-26 07:31:30'),
(5, 'm_b_i', 'medium banner', '{\"name\":[\"1599203759.jpeg\"],\"text\":{\"1\":\"TOP FASHION\",\"2\":\"VIEW SALE\",\"3\":\"Exclusive COUPON\",\"4\":null}}', '2020-08-26 07:44:40', '2020-10-25 09:29:49'),
(6, 's_b_i', 'small banner', '{\"name\":[\"1603526438.jpeg\"],\"text\":{\"1\":\"BIG SALE\",\"2\":\"ALL NEW FASHION BRANDS ITEMS UP TO 70% OFF\",\"3\":\"Online Purchases\",\"4\":null}}', '2020-08-26 07:44:40', '2020-10-24 08:00:39'),
(7, 'fb', 'facebook', 'https://www.facebook.com/tung726509', '2020-09-06 08:33:55', '2020-09-07 08:03:23'),
(8, 'ins', 'instagram', 'https://www.instagram.com/tung.encode.97/?hl=vi', '2020-09-06 08:33:55', '2020-09-07 08:03:23'),
(9, 'twt', 'twitter', 'https://www.twitter.com/tung726509', '2020-09-06 08:33:55', '2020-09-07 08:03:23'),
(10, 'com_phone', 'sđt', '0329 585 709', '2020-09-06 08:39:34', '2020-09-07 08:03:23'),
(11, 'com_address', 'địa chỉ', '19 nguyễn trãi , thanh xuân , hà nội', '2020-09-06 08:40:16', '2020-09-07 08:03:23'),
(12, 'com_email', 'email', 'tungcntt@gmail.com', '2020-09-06 08:43:01', '2020-09-07 08:03:23'),
(13, 'open_time', 'thời gian hoạt động', 'Thứ Hai - Chủ Nhật / 9:00 AM - 8:00 PM', '2020-09-06 08:43:01', '2020-09-07 08:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  `types_of_fee` varchar(255) DEFAULT '',
  `ship_fee` decimal(30,0) DEFAULT NULL,
  `payed_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_at` timestamp NULL DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `export_at` timestamp NULL DEFAULT NULL,
  `export_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `user_id`, `customer_id`, `warehouse_id`, `price`, `types_of_fee`, `ship_fee`, `payed_at`, `address`, `reason`, `status`, `status_at`, `note`, `export_at`, `export_by`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'C2CDNGAFPD3FFVC1', NULL, 2, NULL, '105040', '{\"ubd\":10}', '10000', NULL, '140 đường láng hạ đang sửa', NULL, 1, '2020-10-11 09:10:00', 'khách nhận vào chủ nhật , ahihi đồ chó =))', NULL, NULL, '2020-06-14 02:16:28', NULL, '2020-11-05 10:23:40', NULL, NULL, NULL),
(2, 'C3CDDEPV101S4RU4', NULL, 3, 1, '340000', '[]', '200000', NULL, 'láng hạ ahi', NULL, 6, '2020-10-06 09:42:57', 'khách chỉ nhận trong giờ hành chính thôi nhé', '2020-07-15 17:00:00', 1, '2020-06-15 02:17:55', NULL, '2020-11-06 06:43:23', NULL, NULL, NULL),
(3, 'U1CDS03D6N51ARM9', 1, 1, 1, '256000', '{\"ufs\":200000}', '2000', NULL, 'ngã tư sở', NULL, 2, '2020-10-06 10:02:06', NULL, '2020-10-05 17:00:00', 1, '2020-10-06 10:02:06', NULL, '2021-05-19 01:23:41', NULL, NULL, NULL),
(34, 'U1CDV5A99TVRL6DG', 1, 2, 1, '229950', '{\"ubd\":10,\"ufs\":200000}', '1000', NULL, '140 đường láng', NULL, 4, '2020-10-11 08:15:35', NULL, '2020-10-06 17:00:00', 1, '2020-10-07 03:11:53', NULL, '2020-11-17 01:26:46', NULL, NULL, NULL),
(35, 'U1CD1DRYYQR2Y3BW', 1, 14, 1, '82000', '{\"ubd\":10}', '1000', NULL, 'gôc đề', NULL, 5, '2020-10-11 10:48:02', NULL, '2020-10-10 17:00:00', 1, '2020-10-11 08:16:52', NULL, '2020-11-05 04:49:30', NULL, NULL, NULL),
(36, 'U1CDDSSGPZ5ULOGP', NULL, 1, 1, '4275000', '{\"utd\":5,\"ufs\":200000}', '0', NULL, 'ngã tư sở', NULL, 3, '2020-11-06 08:18:30', 'khách hàng chỉ nhận hàng vào thứ bảy', '2020-11-04 17:00:00', 1, '2020-10-11 09:04:33', NULL, '2020-11-06 08:19:06', NULL, NULL, NULL),
(39, 'U1CDQTCAJ9SBMIBZ', NULL, 1, 1, '499700', '{\"utd\":5,\"ufs\":200000}', '5000', '2021-02-20 05:12:51', 'ngã tư sở', NULL, 3, '2020-12-14 08:16:22', NULL, '2020-11-04 17:00:00', 1, '2020-11-05 07:22:21', NULL, '2021-02-20 05:12:51', NULL, NULL, NULL),
(41, 'U1CDTDDXSR90TUH0', 1, 1, 1, '204000', '{\"ufs\":200000}', '50000', NULL, 'ngã tư sở chỗ fafim nhes', NULL, 3, '2021-04-13 03:13:22', NULL, '2020-12-13 17:00:00', 1, '2020-12-14 08:17:53', NULL, '2021-05-22 01:23:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `items_origin` varchar(5) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `discount`, `price`, `items_origin`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 1, 1, 12, '120000', 'true', '2020-06-11 02:12:41', NULL, '2020-10-11 09:08:37', NULL, NULL, NULL),
(2, 1, 2, 0, 11, '110000', 'true', '2020-06-11 02:13:19', NULL, '2020-10-11 09:08:37', NULL, NULL, NULL),
(3, 2, 3, 0, 10, '30000', 'true', '2020-06-11 02:19:10', NULL, '2020-07-17 09:23:04', NULL, NULL, NULL),
(4, 2, 4, 5, 30, '40000', 'true', '2020-06-11 02:20:06', NULL, '2020-07-17 09:23:04', NULL, NULL, NULL),
(5, 3, 1, 2, 20, '160000', 'false', '2020-10-06 10:02:06', NULL, '2020-10-06 10:02:06', NULL, NULL, NULL),
(126, 34, 1, 1, 20, '160000', 'false', '2020-10-10 04:07:07', NULL, '2020-10-10 04:07:07', NULL, NULL, NULL),
(127, 34, 2, 1, 15, '150000', 'false', '2020-10-10 04:07:07', NULL, '2020-10-10 04:07:07', NULL, NULL, NULL),
(128, 35, 5, 2, 10, '50000', 'false', '2020-10-11 08:16:52', NULL, '2020-10-11 08:16:52', NULL, NULL, NULL),
(133, 36, 5, 100, 10, '50000', 'true', '2020-10-27 08:37:13', NULL, '2020-11-05 07:16:01', NULL, NULL, NULL),
(172, 39, 3, 10, 10, '30000', 'false', '2020-12-14 08:16:22', NULL, '2020-12-14 08:16:22', NULL, NULL, NULL),
(173, 39, 1, 2, 20, '160000', 'false', '2020-12-14 08:16:22', NULL, '2020-12-14 08:16:22', NULL, NULL, NULL),
(175, 41, 2, 1, 0, '150000', 'false', '2021-02-23 08:22:55', NULL, '2021-02-23 08:22:55', NULL, NULL, NULL),
(176, 41, 3, 2, 10, '30000', 'false', '2021-02-23 08:22:55', NULL, '2021-02-23 08:22:55', NULL, NULL, NULL);

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
  `pretty_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` smallint(6) DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `pretty_name`, `group`, `show`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'order_list', 'Xem danh sách đơn hàng', 'order', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(2, 'order_add', 'Thêm mới đơn hàng', 'order', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(3, 'order_edit', 'Sửa đơn hàng', 'order', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(4, 'order_delete', 'Xóa đơn hàng', 'order', 1, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(5, 'order_restore', 'Khôi phục đơn đã xóa', 'order', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(6, 'order_detail', 'Chi tiết đơn hàng', 'order', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(7, 'customer_list', 'Xem danh sách khách hàng', 'customer', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(8, 'customer_add', 'Thêm mới khách hàng', 'customer', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(9, 'customer_edit', 'Sửa khách hàng', 'customer', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(10, 'customer_delete', 'Xóa khách hàng', 'customer', 1, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(11, 'customer_restore', 'Khôi phục khách hàng đã xóa', 'customer', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(12, 'customer_detail', 'Chi tiết khách hàng', 'customer', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(13, 'category_list', 'Xem danh sách danh mục', 'category', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(14, 'category_add', 'Thêm mới danh mục', 'category', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(15, 'category_edit', 'Sửa danh mục', 'category', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(16, 'category_delete', 'Xóa danh mục', 'category', 0, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(17, 'category_restore', 'Khôi phục danh mục đã xóa', 'category', 0, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(18, 'category_detail', 'Chi tiết danh mục', 'category', 0, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(19, 'product_list', 'Xem danh sách sản phẩm', 'product', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(20, 'product_add', 'Thêm mới sản phẩm', 'product', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(21, 'product_edit', 'Sửa sản phẩm', 'product', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(22, 'product_delete', 'Xóa sản phẩm', 'product', 0, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(23, 'product_restore', 'Khôi phục sản phẩm đã xóa', 'product', 0, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(24, 'product_detail', 'Chi tiết sản phẩm', 'product', 0, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(25, 'tag_list', 'Xem danh sách tag', 'tag', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(26, 'tag_add', 'Thêm mới tag', 'tag', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(27, 'tag_edit', 'Sửa tag', 'tag', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(28, 'tag_delete', 'Xóa tag', 'tag', 0, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(29, 'tag_restore', 'Khôi phục tag đã xóa', 'tag', 0, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(30, 'tag_detail', 'Chi tiết tag', 'tag', 0, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(31, 'wh_list', 'Xem danh sách kho hàng', 'wh', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(32, 'wh_add', 'Thêm mới kho hàng', 'wh', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(33, 'wh_edit', 'Sửa kho hàng', 'wh', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(34, 'wh_delete', 'Xóa kho hàng', 'wh', 1, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(35, 'wh_restore', 'Khôi phục kho hàng', 'wh', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(36, 'wh_detail', 'Chi tiết kho hàng', 'wh', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(37, 'wh_item_add', 'Nhập kho', 'wh', 1, 'web', '2020-09-15 09:39:20', '2020-09-15 09:39:21'),
(38, 'wh_item_edit', 'Sửa số lượng tồn kho', 'wh', 1, 'web', '2020-09-15 09:39:20', '2020-09-15 09:39:21'),
(39, 'user_list', 'Xem danh sách tài khoản', 'user', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(40, 'user_add', 'Thêm mới tài khoản', 'user', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(41, 'user_edit', 'Sửa tài khoản', 'user', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(42, 'user_delete', 'Khóa tài khoản', 'user', 1, 'web', '2020-09-15 09:04:36', '2020-09-15 09:04:37'),
(43, 'user_restore', 'Mở khóa tài khoản', 'user', 1, 'web', '2019-06-26 02:39:50', '2019-06-26 02:39:50'),
(44, 'user_detail', 'Chi tiết tài khoản', 'user', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(45, 'option_banner', 'Cài đặt > trang chủ > banner quảng cáo ', 'option', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(46, 'option_incentive', 'Cài đặt > trang chủ > ưu đãi khách hàng', 'option', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08'),
(47, 'option_aboutus', 'Cài đặt > trang chủ > TT cửa hàng', 'option', 1, 'web', '2020-09-15 09:06:06', '2020-09-15 09:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(30) NOT NULL,
  `sku` varchar(191) DEFAULT '',
  `pretty_name` varchar(191) DEFAULT NULL,
  `buy_into` decimal(15,0) DEFAULT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `discount` tinyint(4) DEFAULT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `star` int(1) DEFAULT NULL,
  `expired_discount` timestamp NULL DEFAULT NULL,
  `created_by` int(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `sku`, `pretty_name`, `buy_into`, `price`, `discount`, `unit`, `category_id`, `star`, `expired_discount`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(1, 'mbhIygYBnE', 'vongco01', 'Vòng Cổ 1', '90000', '160000', 20, 'cái', 1, 3, '2020-12-30 17:00:00', 1, '2020-04-13 08:07:20', '2020-10-17 02:32:35', NULL, NULL),
(2, 'Wph5T2NoPf', 'vongco02', 'Vòng Cổ 2', '120000', '150000', 15, 'cái', 1, 5, '2020-09-16 17:00:00', 1, '2020-05-12 02:16:31', '2020-10-17 02:32:44', NULL, NULL),
(3, 'yfMQSTQuNG', 'nhanbac01', 'Nhẫn Bạc 1', '10000', '30000', 10, 'cái', 2, 5, '2021-04-22 02:30:53', 1, '2020-06-03 08:09:33', '2020-08-08 04:07:03', NULL, NULL),
(4, 'K1JyTguhlw', 'nhanbac02', 'Nhẫn Bạc 2', '15000', '40000', 30, 'cái', 2, 4, '2020-11-30 17:00:00', 1, '2020-07-04 08:37:20', '2020-10-17 02:32:49', NULL, NULL),
(5, '0IEWD5uXWz', 'sipren1', 'Sịp ren 1', '10000', '50000', 10, NULL, 17, 4, '2022-08-07 17:00:00', 1, '2020-08-13 01:24:08', '2020-08-13 01:24:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trademark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_manual` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preservation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_descriptions`
--

INSERT INTO `product_descriptions` (`id`, `product_id`, `origin`, `trademark`, `user_manual`, `preservation`, `note`, `description`, `size`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`) VALUES
(2, 3, 'ÚC', 'ENSURE 1', 'bóc ra mà uống nhé', NULL, 'note sản phẩm nhẫn bạc 1', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', NULL, NULL, NULL, '2020-05-18 07:57:09', '2020-05-18 08:08:27', NULL, NULL),
(3, 5, 'Việt Nam', 'VietCheck', 'bóc ra mà uống', NULL, 'note sản phẩm sịp rên 1', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', NULL, NULL, NULL, '2020-05-18 08:35:14', '2020-05-18 08:37:20', NULL, NULL),
(10, 4, 'Việt Nam', 'VietCheck', NULL, NULL, 'note sản phẩm nhẫn bạc 2', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', NULL, NULL, NULL, '2020-05-18 09:47:32', '2020-05-18 09:48:11', NULL, NULL),
(11, 2, 'Việt Nam', 'Audi', '', '', 'note sản phẩm vòng ổ 2', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', NULL, NULL, NULL, '2020-06-10 04:45:41', '2020-06-10 04:45:55', NULL, NULL),
(12, 1, 'Việt Nam', 'Audi', '<div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; clear: both; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Ch&agrave;o mừng đến với Haravan!</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Nh&agrave; b&aacute;n h&agrave;ng đang mở cửa h&agrave;ng trực tuyến mới hoặc muốn sử dụng Haravan l&agrave;m nền tảng Thương mại điện tử của m&igrave;nh, c&oacute; thể t&igrave;m hiểu th&ecirc;m th&ocirc;ng tin về c&aacute;c t&ugrave;y chọn ở đ&acirc;y.</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Sau khi đ&atilde; đăng k&yacute; d&ugrave;ng thử&nbsp;<a data-mce-href=\"https://www.haravan.com/pages/bang-gia\" href=\"#\" style=\"box-sizing: border-box; background: rgb(159, 159, 159); color: rgb(159, 159, 159); text-decoration: none; transition: all 0.5s ease-in-out 0s; font-family: brandon_textregular, sans-serif !important; padding: 1px; font-size: 1px;\" title=\"Bảng giá\">Kh&ocirc;ng bấm v&agrave;o v&ugrave;ng m&agrave;u đỏ n&agrave;y !</a>, h&atilde;y l&agrave;m theo&nbsp;<a data-mce-href=\"#\" href=\"#\" style=\"box-sizing: border-box; background: rgb(159, 159, 159); color: rgb(159, 159, 159); text-decoration: none; transition: all 0.5s ease-in-out 0s; font-family: brandon_textregular, sans-serif !important; padding: 1px; font-size: 1px;\" title=\"Thiết lập ban đầu\">Kh&ocirc;ng bấm v&agrave;o v&ugrave;ng m&agrave;u đỏ n&agrave;y !</a> để bắt đầu sử dụng Haravan. Hướng dẫn n&agrave;y sẽ hỗ trợ nh&agrave; b&aacute;n h&agrave;ng ho&agrave;n th&agrave;nh c&aacute;c bước ch&iacute;nh trước khi bắt đầu b&aacute;n.&nbsp;</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Nếu nh&agrave; b&aacute;n h&agrave;ng đang b&aacute;n tr&ecirc;n một nền tảng kh&aacute;c, nhưng muốn chuyển cửa h&agrave;ng đến Haravan, h&atilde;y di chuyển ngay h&ocirc;m nay.</div><p><br></p><p><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '<p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Sử dụng:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&ecirc;n bề mặt sạch, tr&ecirc;n b&agrave;n. Tr&aacute;nh đặt nơi đất bẩn.&nbsp;</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh treo t&uacute;i bằng quai v&igrave; trọng lượng c&oacute; thể phải hư quai v&agrave; d&aacute;ng t&uacute;i.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh để t&uacute;i tiếp x&uacute;c trực tiếp &aacute;nh mặt trời qu&aacute; l&acirc;u.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Kh&ocirc;ng để c&aacute;c vật sắc nhọn như dao, bấm m&oacute;ng tay v&agrave;o t&uacute;i.&nbsp;</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh để trực tiếp c&aacute;c vật c&oacute; thể lem m&agrave;u (viết mực, mỹ phẩm) v&agrave;o l&ograve;ng t&uacute;i.&nbsp;</span></li></ul><p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Vệ sinh:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Lau t&uacute;i theo chiều dọc, nhẹ nh&agrave;ng, tr&aacute;nh chất tẩy mạnh, cồn, nước, khăn ướt v&igrave; khiến t&uacute;i phai m&agrave;u, kh&ocirc; da. &nbsp;</span></b></li><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">D&ugrave;ng dung dịch hỗ trợ chuy&ecirc;n dụng chống thấm dầu v&agrave; nước để giảm thiểu khả năng b&aacute;m bẩn.</span></li><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Kh&ocirc;ng mang t&uacute;i đi giặt v&agrave; sử dụng c&aacute;c dụng cụ c&oacute; nhiệt độ cao để l&agrave;m kh&ocirc; t&uacute;i.&nbsp;</span></li></ul><p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Cất giữ:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Th&aacute;o d&acirc;y đeo cất v&agrave;o b&ecirc;n trong t&uacute;i, cho v&agrave;o bao ch&acirc;n hoặc tủ, giữ t&uacute;i x&aacute;ch kh&ocirc;ng bị b&aacute;m bụi khi &iacute;t sử dụng.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Giữ d&aacute;ng t&uacute;i bằng c&aacute;ch nhồi giấy hoặc t&uacute;i nilon. Lưu &yacute;, kh&ocirc;ng d&ugrave;ng giấy b&aacute;o v&igrave; mực c&oacute; thể d&iacute;nh v&agrave;o t&uacute;i v&agrave; g&acirc;y m&ugrave;i kh&oacute; chịu.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">D&ugrave;ng g&oacute;i h&uacute;t ẩm c&oacute; sẵn trong t&uacute;i để ngăn chặn m&ugrave;i h&ocirc;i.</span></li></ul><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', NULL, '<p><span style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>&ldquo;</span><b style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\'>H&agrave; Nội</b><span style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>&rdquo;, &acirc;m thanh vang l&ecirc;n nghe thật trong trẻo, l&agrave;m động l&ograve;ng tr&aacute;i tim bao người con đất Việt. Trải qua biết bao thăng trầm lịch sử, H&agrave; Nội vẫn sừng sững ở đ&oacute;, nguy nga tr&aacute;ng lệ. N&oacute;i về H&agrave; Nội, người ta kh&ocirc;ng khỏi nghĩ đến một th&agrave;nh phố tấp nập, những c&ocirc;ng ti cao trọc trời, những trung t&acirc;m giải tr&iacute;, trung t&acirc;m thương mại rộng lớn. Nhưng bạn biết kh&ocirc;ng, b&ecirc;n cạnh vẻ đẹp hiện đại đấy, H&agrave; Nội vẫn giữ cho m&igrave;nh một n&eacute;t rất ri&ecirc;ng, rất H&agrave; Nội m&agrave; kh&ocirc;ng nơi đ&acirc;u c&oacute; được. B&agrave;i viết dưới đ&acirc;y sẽ đưa ta đi tham quan một v&ograve;ng H&agrave; Nội, mở rộng hiểu biết về những danh lam thắng cảnh, phong tục tập qu&aacute;n v&agrave; con người H&agrave; Nội.</span></p><p><img src=\"http://store1.min:81/admini/productImages/1602667276.jpeg\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '<table style=\"width: 100%;\"><tbody><tr><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><br></td><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><span style=\"color: rgb(255, 255, 255);\">NAM</span></td><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><span style=\"color: rgb(255, 255, 255);\">NỮ</span></td></tr><tr><td style=\"width: 33.3333%;\">1m4-1m5</td><td style=\"width: 33.3333%;\">S</td><td style=\"width: 33.3333%;\">S</td></tr><tr><td style=\"width: 33.3333%;\">1m5-1m6</td><td style=\"width: 33.3333%;\">M</td><td style=\"width: 33.3333%;\">M</td></tr><tr><td style=\"width: 33.3333%;\">1m6-1m7</td><td style=\"width: 33.3333%;\">L</td><td style=\"width: 33.3333%;\">L</td></tr><tr><td style=\"width: 33.3333%;\">1m7-1m8</td><td style=\"width: 33.3333%;\">XL</td><td style=\"width: 33.3333%;\">XL</td></tr><tr><td style=\"width: 33.3333%;\">1m8-1m9</td><td style=\"width: 33.3333%;\">XXL</td><td style=\"width: 33.3333%;\">XXL</td></tr><tr><td style=\"width: 33.3333%;\">1m9 trở l&ecirc;n</td><td style=\"width: 33.3333%;\">3XL</td><td style=\"width: 33.3333%;\">3XL</td></tr></tbody></table><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', NULL, NULL, '2020-06-10 04:45:41', '2020-10-16 10:34:06', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `origin_name` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(5) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `origin_name`, `size`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(14, 1, '1591771361.png', 'product-1-1.png', NULL, '2020-06-10 06:42:42', 1, '2020-06-10 06:42:42', NULL, NULL, NULL),
(27, 1, '1593229408.jpeg', 'product-1-2.jpg', NULL, '2020-06-27 03:43:29', 1, '2020-06-27 03:43:29', NULL, NULL, NULL),
(30, 5, '1596594120.png', 'product-5-1.png', NULL, '2020-08-05 02:22:02', 1, '2020-08-05 02:22:02', NULL, NULL, NULL),
(32, 3, '1596771352.png', 'product-3-1.png', NULL, '2020-08-07 03:35:55', 1, '2020-08-07 03:35:55', NULL, NULL, NULL),
(33, 3, '1596771363.png', 'product-3-2.png', NULL, '2020-08-07 03:36:04', 1, '2020-08-07 03:36:04', NULL, NULL, NULL),
(34, 4, '1596771386.jpeg', 'product-4-1.jpg', NULL, '2020-08-07 03:36:26', 1, '2020-08-07 03:36:27', NULL, NULL, NULL),
(35, 4, '1596771398.png', 'product-4-2.png', NULL, '2020-08-07 03:36:39', 1, '2020-08-07 03:36:39', NULL, NULL, NULL),
(37, 5, '1596771471.jpeg', 'product-5-2.jpg', NULL, '2020-08-07 03:37:51', 1, '2020-08-07 03:37:51', NULL, NULL, NULL),
(46, 2, '1596858390.jpeg', 'product-2-1.jpg', NULL, '2020-08-08 03:46:30', 1, '2020-08-08 03:46:30', NULL, NULL, NULL),
(47, 2, '1597132623.jpeg', 'product-2-2.jpg', NULL, '2020-08-11 07:57:04', 1, '2020-08-11 07:57:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(10) DEFAULT NULL,
  `tag_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`) VALUES
(3, 3),
(4, 1),
(4, 2),
(3, 1),
(1, 2),
(1, 3),
(4, 3),
(4, 6),
(5, 1),
(5, 3),
(2, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pretty_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `pretty_name`, `guard_name`, `css`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'QUẢN TRỊ', 'web', 'danger', '2020-09-08 04:33:26', '2020-09-08 04:33:29'),
(2, 'staff', 'NHÂN VIÊN', 'web', 'primary', '2020-09-08 04:35:28', '2020-09-08 04:35:30'),
(3, 'wh_staff', 'QL KHO', 'web', 'warning', '2020-09-15 04:27:06', '2020-09-15 04:27:08');

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
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(14, 1),
(15, 1),
(19, 1),
(20, 1),
(21, 1),
(25, 1),
(26, 1),
(27, 1),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) DEFAULT '',
  `pretty_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `code`, `pretty_name`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'x5XEqJQlFL', 'Độc', '2020-05-16 02:26:36', 1, '2020-05-25 10:12:19', NULL),
(2, '4IVhKL5xLB', 'Limited', '2020-05-16 02:28:15', 1, NULL, NULL),
(3, 'JHW83a7Dsb', 'Thời Chang', '2020-05-16 02:30:36', 1, '2020-08-03 08:46:41', NULL),
(6, 'shFnDMH57h', 'Lạ', '2020-05-19 02:14:44', 1, '2020-05-24 07:08:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lock` tinyint(4) DEFAULT NULL,
  `social_network` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `lock`, `social_network`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sơn Tùng', 'admin@gmail.com', 1, '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.instagram.com\\/tung.encode.97\\/?hl=vi\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung726509\"}', NULL, '$2y$10$nmS.rM5yB6icwi4TCBwvj.J2PCUocFwOLIGdUTyNzHtfIoBQSjMVC', '', '2020-04-28 15:45:22', '2021-02-25 09:59:21'),
(2, 'staff1', 'Tùng Sơn 1', 'staff@gmail.com', 0, '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.instagram.com\\/tung.encode.97\\/?hl=vi\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung727\"}', NULL, '$2y$10$3mHKoz5jkPIvHG4wA1Y37OApHIbj0gX/hxf7ZMdj0G9jahnjhwyAW', '', '2020-04-28 15:45:22', '2021-02-25 10:00:08'),
(3, 'han', 'hà an', 'an@gmail.com', 0, '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung726509\"}', NULL, '$2y$10$pB2wqyL/5GiFnP.HhqLiJeBc3HELAOg8JNBYhKY2iXzIPtV3pTjXO', NULL, '2020-09-13 06:47:07', '2021-02-25 10:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `main` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `main`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'kho ngã tư sở 1', '19 nguyễn trãi 1', 1, '2020-11-05 07:19:47', 1, '2020-11-05 07:19:47', NULL, NULL, NULL),
(2, 'kho minh khai', 'gốc đề , minh khai', NULL, '2020-11-05 07:19:49', 1, '2020-11-05 07:19:49', NULL, NULL, NULL),
(4, 'kho 1', NULL, NULL, '2020-05-29 03:50:15', 1, '2020-05-29 03:50:15', NULL, NULL, NULL),
(5, 'kho 2', 'kho 2 ngã tư sở', NULL, '2020-05-29 03:50:17', 1, '2020-05-29 03:50:17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_items`
--

CREATE TABLE `warehouse_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse_items`
--

INSERT INTO `warehouse_items` (`id`, `product_id`, `warehouse_id`, `quantity`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(12, 1, 1, 49, '2020-11-05 10:24:05', 1, '2020-11-05 10:24:05', NULL, NULL, NULL),
(13, 2, 1, 29, '2021-04-13 03:13:26', 1, '2021-04-13 03:13:26', NULL, NULL, NULL),
(14, 4, 2, 150, '2020-06-10 08:25:02', 1, '2020-06-10 08:25:02', NULL, NULL, NULL),
(15, 3, 1, 150, '2021-04-13 03:13:26', 1, '2021-04-13 03:13:26', NULL, NULL, NULL),
(16, 4, 1, 200, '2020-11-06 06:43:23', 1, '2020-11-06 06:43:23', NULL, NULL, NULL),
(17, 5, 1, 300, '2020-11-12 06:42:43', 1, '2020-11-12 06:42:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_logs`
--

CREATE TABLE `warehouse_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_item_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `old_quantity` int(11) DEFAULT NULL,
  `action` tinyint(4) DEFAULT NULL,
  `action_by` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse_logs`
--

INSERT INTO `warehouse_logs` (`id`, `warehouse_item_id`, `product_id`, `quantity`, `old_quantity`, `action`, `action_by`, `reason`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(31, 12, 1, 50, 10, 1, 1, 'nhập thêm', '2020-10-06 08:05:14', NULL, '2020-10-06 08:05:14', NULL),
(32, 13, 2, 10, 20, 1, 1, 'nhập thêm hàng', '2020-10-06 08:05:48', NULL, '2020-10-06 08:05:48', NULL),
(33, 12, 1, 50, 60, 2, 1, 'cho mượn 10', '2020-10-06 08:06:23', NULL, '2020-10-06 08:06:23', NULL),
(76, 12, 1, 1, 50, 3, 1, 'MzQ=', '2020-11-05 10:24:05', NULL, '2020-11-05 10:24:05', NULL),
(77, 13, 2, 1, 30, 3, 1, 'MzQ=', '2020-11-05 10:24:06', NULL, '2020-11-05 10:24:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookiees`
--
ALTER TABLE `cookiees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_descriptions_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_items`
--
ALTER TABLE `warehouse_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_logs`
--
ALTER TABLE `warehouse_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `cookiees`
--
ALTER TABLE `cookiees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warehouse_items`
--
ALTER TABLE `warehouse_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `warehouse_logs`
--
ALTER TABLE `warehouse_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

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
-- Constraints for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD CONSTRAINT `product_descriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

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
