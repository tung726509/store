/*
Navicat MySQL Data Transfer

Source Server         : local E
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : store1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-10-21 08:28:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) DEFAULT '',
  `pretty_name` varchar(191) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'vongco', 'Vòng Cổ', '1598607661.png', '2020-08-28 16:41:01', '2020-08-28 16:41:01', '1');
INSERT INTO `categories` VALUES ('2', 'nhan', 'Nhẫn', '1598607676.jpeg', '2020-08-28 16:41:16', '2020-08-28 16:41:16', '1');
INSERT INTO `categories` VALUES ('17', 'sip', 'Sịp', '1598607713.png', '2020-08-28 16:41:53', '2020-08-28 16:41:53', '1');
INSERT INTO `categories` VALUES ('19', 'ao', 'Áo', '1598608256.png', '2020-08-28 16:50:56', '2020-08-28 16:50:56', '1');

-- ----------------------------
-- Table structure for cities
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Hà Nội', '01', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('2', 'Thành phố Hồ Chí Minh', '79', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('3', 'Đà Nẵng', '48', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('4', 'Hải Phòng', '31', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('5', 'Cần Thơ', '92', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('6', 'An Giang', '89', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('7', 'Bắc Kạn', '06', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('8', 'Bình Định', '52', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('9', 'Bình Dương', '74', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('10', 'Bắc Giang', '24', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('11', 'Bạc Liêu', '95', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('12', 'Bắc Ninh', '27', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('13', 'Bình Phước', '70', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('14', 'Bình Thuận', '60', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('15', 'Bến Tre', '83', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('16', 'Cao Bằng', '04', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('17', 'Cà Mau', '96', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('18', 'Điện Biên', '11', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('19', 'Đắk Lắk', '66', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('20', 'Đồng Nai', '75', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('21', 'Đắk Nông', '67', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('22', 'Đồng Tháp', '87', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('23', 'Gia Lai', '64', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('24', 'Thừa Thiên Huế', '46', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('25', 'Hoà Bình', '17', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('26', 'Hải Dương', '30', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('27', 'Hà Giang', '02', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('28', 'Hậu Giang', '93', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('29', 'Hà Nam', '35', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('30', 'Hà Tĩnh', '42', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('31', 'Hưng Yên', '33', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('32', 'Kiên Giang', '91', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('33', 'Khánh Hoà', '56', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('34', 'Kon Tum', '62', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('35', 'Long An', '80', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('36', 'Lào Cai', '10', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('37', 'Lai Châu', '12', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('38', 'Lâm Đồng', '68', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('39', 'Lạng Sơn', '20', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('40', 'Nam Định', '36', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('41', 'Ninh Bình', '37', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('42', 'Nghệ An', '40', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('43', 'Ninh Thuận', '58', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('44', 'Phú Thọ', '25', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('45', 'Phú Yên', '54', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('46', 'Quảng Bình', '44', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('47', 'Quảng Nam', '49', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('48', 'Quảng Ngãi', '51', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('49', 'Quảng Trị', '45', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('50', 'Quảng Ninh', '22', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('51', 'Sơn La', '14', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('52', 'Sóc Trăng', '94', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('53', 'Thái Bình', '34', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('54', 'Tuyên Quang', '08', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('55', 'Thanh Hoá', '38', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('56', 'Tiền Giang', '82', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('57', 'Thái Nguyên', '19', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('58', 'Tây Ninh', '72', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('59', 'Trà Vinh', '84', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('60', 'Vĩnh Long', '86', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('61', 'Vĩnh Phúc', '26', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('62', 'Bà Rịa - Vũng Tàu', '77', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('63', 'Yên Bái', '15', '2019-06-26 00:18:21', null);
INSERT INTO `cities` VALUES ('64', 'Khác', '000', '2019-06-26 00:18:21', null);

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `d_o_b` timestamp NULL DEFAULT NULL,
  `total_money` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'khách tùng', '0329585709', 'ngã tư sở', '1995-08-16 00:00:00', '705500', '2020-06-11 10:17:51', '1', '2020-08-14 08:52:53', null, null, null);
INSERT INTO `customers` VALUES ('2', 'hà an cute', '0329585706', '140 đường láng', '2020-10-13 00:00:00', '637220', '2020-06-11 10:17:53', null, '2020-10-10 08:55:23', null, null, null);
INSERT INTO `customers` VALUES ('3', 'hà an 12', '0329585705', 'láng hạ ahi', '2020-06-30 00:00:00', '300000', '2020-06-11 10:17:53', null, '2020-07-17 11:39:59', null, null, null);
INSERT INTO `customers` VALUES ('14', 'tùng nạnh nùng', '0329585700', 'gôc đề', '2020-10-24 00:00:00', null, '2020-10-11 15:16:52', '1', '2020-10-11 15:16:52', null, null, null);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `origin_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('0', 'medium_banner_images', '1598426593.jpg', null, null, null);
INSERT INTO `images` VALUES ('1', 'b_b_i', '1598426500.jpg', 'big-banner1.jpg', '2020-08-26 14:20:16', '2020-08-26 14:29:44');
INSERT INTO `images` VALUES ('2', 'b_b_i', '1598426544.jpg', 'big-banner2.jpg', '2020-08-26 14:20:18', '2020-08-26 14:29:46');
INSERT INTO `images` VALUES ('4', 's_b_i', '1598426681.jpg', 'small-banner.jpg', '2020-08-26 14:25:05', '2020-08-26 14:29:50');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('3', '2020_04_27_065554_create_sessions_table', '2');
INSERT INTO `migrations` VALUES ('4', '2014_10_12_100000_create_password_resets_table', '3');
INSERT INTO `migrations` VALUES ('5', '2020_08_06_161446_create_permission_tables', '4');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('1', 'App\\User', '1');
INSERT INTO `model_has_roles` VALUES ('2', 'App\\User', '2');
INSERT INTO `model_has_roles` VALUES ('3', 'App\\User', '3');

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('1', 'use_birth_discount', 'công tắc sinh nhật', '{\"key\":1,\"value\":10}', '2020-06-19 09:01:38', '2020-10-18 17:52:10');
INSERT INTO `options` VALUES ('2', 'use_free_ship', 'công tắc freeship đơn hàng trên xxxk', '{\"key\":1,\"value\":200000}', '2020-06-19 09:15:13', '2020-10-18 17:46:22');
INSERT INTO `options` VALUES ('3', 'use_transfer_discount', 'chuyển khỏa giảm xx%', '{\"key\":1,\"value\":5}', '2020-08-13 09:12:18', '2020-10-18 17:42:12');
INSERT INTO `options` VALUES ('4', 'b_b_i', 'big banner', '{\"name\":[\"1598426544.jpg\",\"1598426500.jpg\",\"1599194392.png\",\"1599194656.png\",\"1599204679.png\"],\"text\":{\"1\":\"Finds\",\"2\":\"Summer Sale\",\"3\":\"70% OFF\",\"4\":\"Shop Now!\"}}', '2020-08-26 14:44:40', '2020-09-04 14:31:20');
INSERT INTO `options` VALUES ('5', 'm_b_i', 'medium banner', '{\"name\":[\"1599203759.jpeg\"],\"text\":{\"1\":\"TOP FASHION\",\"2\":\"VIEW SALE\",\"3\":\"Exclusive COUPON\",\"4\":null}}', '2020-08-26 14:44:40', '2020-09-04 14:15:59');
INSERT INTO `options` VALUES ('6', 's_b_i', 'small banner', '{\"name\":[\"1599203629.jpeg\"],\"text\":{\"1\":\"BIG SALE\",\"2\":\"ALL NEW FASHION BRANDS ITEMS UP TO 70% OFF\",\"3\":\"Online Purchases\",\"4\":null}}', '2020-08-26 14:44:40', '2020-09-04 14:13:49');
INSERT INTO `options` VALUES ('7', 'fb', 'facebook', 'https://www.facebook.com/tung726509', '2020-09-06 15:33:55', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('8', 'ins', 'instagram', 'https://www.instagram.com/tung.encode.97/?hl=vi', '2020-09-06 15:33:55', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('9', 'twt', 'twitter', 'https://www.twitter.com/tung726509', '2020-09-06 15:33:55', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('10', 'com_phone', 'sđt', '0329 585 709', '2020-09-06 15:39:34', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('11', 'com_address', 'địa chỉ', '19 nguyễn trãi , thanh xuân , hà nội', '2020-09-06 15:40:16', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('12', 'com_email', 'email', 'tungcntt@gmail.com', '2020-09-06 15:43:01', '2020-09-07 15:03:23');
INSERT INTO `options` VALUES ('13', 'open_time', 'thời gian hoạt động', 'Thứ Hai - Chủ Nhật / 9:00 AM - 8:00 PM', '2020-09-06 15:43:01', '2020-09-07 15:03:23');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  `types_of_fee` varchar(255) DEFAULT '',
  `ship_fee` decimal(30,0) DEFAULT NULL,
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
  `deleted_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', 'C2CDNGAFPD3FFVC1', null, '2', null, '105040', '{\"ubd\":10}', '10000', '140 đường láng hạ đang sửa', null, '1', '2020-10-11 16:10:00', 'khách nhận vào chủ nhật , ahihi đồ chó =))', null, null, '2020-06-14 09:16:28', null, '2020-10-11 16:17:57', null, null, null);
INSERT INTO `orders` VALUES ('2', 'C3CDDEPV101S4RU4', null, '3', '1', '340000', '[]', '200000', 'láng hạ ahi', null, '6', '2020-10-06 16:42:57', 'khách chỉ nhận trong giờ hành chính thôi nhé', '2020-07-16 00:00:00', '1', '2020-06-15 09:17:55', null, '2020-10-06 17:03:55', null, null, null);
INSERT INTO `orders` VALUES ('3', 'U1CDS03D6N51ARM9', '1', '1', '1', '256000', '{\"ufs\":200000}', '2000', 'ngã tư sở', null, '2', '2020-10-06 17:02:06', null, '2020-10-06 00:00:00', '1', '2020-10-06 17:02:06', null, '2020-10-11 17:50:35', null, null, null);
INSERT INTO `orders` VALUES ('34', 'U1CDV5A99TVRL6DG', '1', '2', '1', '229950', '{\"ubd\":10,\"ufs\":200000}', '1000', '140 đường láng', null, '4', '2020-10-11 15:15:35', null, '2020-10-07 00:00:00', '1', '2020-10-07 10:11:53', null, '2020-10-11 17:35:25', null, null, null);
INSERT INTO `orders` VALUES ('35', 'U1CD1DRYYQR2Y3BW', '1', '14', '1', '82000', '{\"ubd\":10}', '1000', 'gôc đề', null, '5', '2020-10-11 17:48:02', null, '2020-10-11 00:00:00', '1', '2020-10-11 15:16:52', null, '2020-10-11 17:48:06', null, null, null);
INSERT INTO `orders` VALUES ('36', 'U1CDDSSGPZ5ULOGP', '1', '1', '1', '4500000', '{\"ufs\":200000}', '100000', 'ngã tư sở', null, '3', '2020-10-16 11:41:56', null, '2020-10-11 00:00:00', '1', '2020-10-11 16:04:33', null, '2020-10-16 11:43:12', null, null, null);

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES ('1', '1', '1', '1', '12', '120000', 'true', '2020-06-11 09:12:41', null, '2020-10-11 16:08:37', null, null, null);
INSERT INTO `order_items` VALUES ('2', '1', '2', '0', '11', '110000', 'true', '2020-06-11 09:13:19', null, '2020-10-11 16:08:37', null, null, null);
INSERT INTO `order_items` VALUES ('3', '2', '3', '0', '10', '30000', 'true', '2020-06-11 09:19:10', null, '2020-07-17 16:23:04', null, null, null);
INSERT INTO `order_items` VALUES ('4', '2', '4', '5', '30', '40000', 'true', '2020-06-11 09:20:06', null, '2020-07-17 16:23:04', null, null, null);
INSERT INTO `order_items` VALUES ('5', '3', '1', '2', '20', '160000', 'false', '2020-10-06 17:02:06', null, '2020-10-06 17:02:06', null, null, null);
INSERT INTO `order_items` VALUES ('126', '34', '1', '1', '20', '160000', 'false', '2020-10-10 11:07:07', null, '2020-10-10 11:07:07', null, null, null);
INSERT INTO `order_items` VALUES ('127', '34', '2', '1', '15', '150000', 'false', '2020-10-10 11:07:07', null, '2020-10-10 11:07:07', null, null, null);
INSERT INTO `order_items` VALUES ('128', '35', '5', '2', '10', '50000', 'false', '2020-10-11 15:16:52', null, '2020-10-11 15:16:52', null, null, null);
INSERT INTO `order_items` VALUES ('129', '36', '5', '100', '10', '50000', 'false', '2020-10-11 16:04:33', null, '2020-10-11 16:04:33', null, null, null);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pretty_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` smallint(6) DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'order_list', 'Xem danh sách đơn hàng', 'order', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('2', 'order_add', 'Thêm mới đơn hàng', 'order', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('3', 'order_edit', 'Sửa đơn hàng', 'order', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('4', 'order_delete', 'Xóa đơn hàng', 'order', '1', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('5', 'order_restore', 'Khôi phục đơn đã xóa', 'order', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('6', 'order_detail', 'Chi tiết đơn hàng', 'order', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('7', 'customer_list', 'Xem danh sách khách hàng', 'customer', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('8', 'customer_add', 'Thêm mới khách hàng', 'customer', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('9', 'customer_edit', 'Sửa khách hàng', 'customer', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('10', 'customer_delete', 'Xóa khách hàng', 'customer', '1', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('11', 'customer_restore', 'Khôi phục khách hàng đã xóa', 'customer', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('12', 'customer_detail', 'Chi tiết khách hàng', 'customer', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('13', 'category_list', 'Xem danh sách danh mục', 'category', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('14', 'category_add', 'Thêm mới danh mục', 'category', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('15', 'category_edit', 'Sửa danh mục', 'category', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('16', 'category_delete', 'Xóa danh mục', 'category', '0', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('17', 'category_restore', 'Khôi phục danh mục đã xóa', 'category', '0', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('18', 'category_detail', 'Chi tiết danh mục', 'category', '0', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('19', 'product_list', 'Xem danh sách sản phẩm', 'product', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('20', 'product_add', 'Thêm mới sản phẩm', 'product', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('21', 'product_edit', 'Sửa sản phẩm', 'product', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('22', 'product_delete', 'Xóa sản phẩm', 'product', '0', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('23', 'product_restore', 'Khôi phục sản phẩm đã xóa', 'product', '0', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('24', 'product_detail', 'Chi tiết sản phẩm', 'product', '0', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('25', 'tag_list', 'Xem danh sách tag', 'tag', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('26', 'tag_add', 'Thêm mới tag', 'tag', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('27', 'tag_edit', 'Sửa tag', 'tag', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('28', 'tag_delete', 'Xóa tag', 'tag', '0', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('29', 'tag_restore', 'Khôi phục tag đã xóa', 'tag', '0', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('30', 'tag_detail', 'Chi tiết tag', 'tag', '0', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('31', 'wh_list', 'Xem danh sách kho hàng', 'wh', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('32', 'wh_add', 'Thêm mới kho hàng', 'wh', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('33', 'wh_edit', 'Sửa kho hàng', 'wh', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('34', 'wh_delete', 'Xóa kho hàng', 'wh', '1', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('35', 'wh_restore', 'Khôi phục kho hàng', 'wh', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('36', 'wh_detail', 'Chi tiết kho hàng', 'wh', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('37', 'wh_item_add', 'Nhập kho', 'wh', '1', 'web', '2020-09-15 16:39:20', '2020-09-15 16:39:21');
INSERT INTO `permissions` VALUES ('38', 'wh_item_edit', 'Sửa số lượng tồn kho', 'wh', '1', 'web', '2020-09-15 16:39:20', '2020-09-15 16:39:21');
INSERT INTO `permissions` VALUES ('39', 'user_list', 'Xem danh sách tài khoản', 'user', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('40', 'user_add', 'Thêm mới tài khoản', 'user', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('41', 'user_edit', 'Sửa tài khoản', 'user', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('42', 'user_delete', 'Khóa tài khoản', 'user', '1', 'web', '2020-09-15 16:04:36', '2020-09-15 16:04:37');
INSERT INTO `permissions` VALUES ('43', 'user_restore', 'Mở khóa tài khoản', 'user', '1', 'web', '2019-06-26 09:39:50', '2019-06-26 09:39:50');
INSERT INTO `permissions` VALUES ('44', 'user_detail', 'Chi tiết tài khoản', 'user', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('45', 'option_banner', 'Cài đặt > trang chủ > banner quảng cáo ', 'option', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('46', 'option_incentive', 'Cài đặt > trang chủ > ưu đãi khách hàng', 'option', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');
INSERT INTO `permissions` VALUES ('47', 'option_aboutus', 'Cài đặt > trang chủ > TT cửa hàng', 'option', '1', 'web', '2020-09-15 16:06:06', '2020-09-15 16:06:08');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_by` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'mbhIygYBnE', 'vongco01', 'Vòng Cổ 1', '90000', '160000', '20', 'cái', '1', '3', '2020-12-31 00:00:00', '1', '2020-04-13 15:07:20', '2020-10-17 09:32:35', null, null);
INSERT INTO `products` VALUES ('2', 'Wph5T2NoPf', 'vongco02', 'Vòng Cổ 2', '120000', '150000', '15', 'cái', '1', '5', '2020-09-17 00:00:00', '1', '2020-05-12 09:16:31', '2020-10-17 09:32:44', null, null);
INSERT INTO `products` VALUES ('3', 'yfMQSTQuNG', 'nhanbac01', 'Nhẫn Bạc 1', '10000', '30000', '10', 'cái', '2', '5', '2021-04-22 09:30:53', '1', '2020-06-03 15:09:33', '2020-08-08 11:07:03', null, null);
INSERT INTO `products` VALUES ('4', 'K1JyTguhlw', 'nhanbac02', 'Nhẫn Bạc 2', '15000', '40000', '30', 'cái', '2', '4', '2020-12-01 00:00:00', '1', '2020-07-04 15:37:20', '2020-10-17 09:32:49', null, null);
INSERT INTO `products` VALUES ('5', '0IEWD5uXWz', 'sipren1', 'Sịp ren 1', '10000', '50000', '10', null, '17', '4', '2022-08-08 00:00:00', '1', '2020-08-13 08:24:08', '2020-08-13 08:24:08', null, null);

-- ----------------------------
-- Table structure for product_descriptions
-- ----------------------------
DROP TABLE IF EXISTS `product_descriptions`;
CREATE TABLE `product_descriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trademark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_manual` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preservation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_descriptions_product_id_foreign` (`product_id`),
  CONSTRAINT `product_descriptions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_descriptions
-- ----------------------------
INSERT INTO `product_descriptions` VALUES ('2', '3', 'ÚC', 'ENSURE 1', 'bóc ra mà uống nhé', null, 'note sản phẩm nhẫn bạc 1', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', null, null, null, '2020-05-18 14:57:09', '2020-05-18 15:08:27', null, null);
INSERT INTO `product_descriptions` VALUES ('3', '5', 'Việt Nam', 'VietCheck', 'bóc ra mà uống', null, 'note sản phẩm sịp rên 1', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', null, null, null, '2020-05-18 15:35:14', '2020-05-18 15:37:20', null, null);
INSERT INTO `product_descriptions` VALUES ('10', '4', 'Việt Nam', 'VietCheck', null, null, 'note sản phẩm nhẫn bạc 2', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', null, null, null, '2020-05-18 16:47:32', '2020-05-18 16:48:11', null, null);
INSERT INTO `product_descriptions` VALUES ('11', '2', 'Việt Nam', 'Audi', '', '', 'note sản phẩm vòng ổ 2', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.', null, null, null, '2020-06-10 11:45:41', '2020-06-10 11:45:55', null, null);
INSERT INTO `product_descriptions` VALUES ('12', '1', 'Việt Nam', 'Audi', '<div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; clear: both; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Ch&agrave;o mừng đến với Haravan!</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Nh&agrave; b&aacute;n h&agrave;ng đang mở cửa h&agrave;ng trực tuyến mới hoặc muốn sử dụng Haravan l&agrave;m nền tảng Thương mại điện tử của m&igrave;nh, c&oacute; thể t&igrave;m hiểu th&ecirc;m th&ocirc;ng tin về c&aacute;c t&ugrave;y chọn ở đ&acirc;y.</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Sau khi đ&atilde; đăng k&yacute; d&ugrave;ng thử&nbsp;<a data-mce-href=\"https://www.haravan.com/pages/bang-gia\" href=\"#\" style=\"box-sizing: border-box; background: rgb(159, 159, 159); color: rgb(159, 159, 159); text-decoration: none; transition: all 0.5s ease-in-out 0s; font-family: brandon_textregular, sans-serif !important; padding: 1px; font-size: 1px;\" title=\"Bảng giá\">Kh&ocirc;ng bấm v&agrave;o v&ugrave;ng m&agrave;u đỏ n&agrave;y !</a>, h&atilde;y l&agrave;m theo&nbsp;<a data-mce-href=\"#\" href=\"#\" style=\"box-sizing: border-box; background: rgb(159, 159, 159); color: rgb(159, 159, 159); text-decoration: none; transition: all 0.5s ease-in-out 0s; font-family: brandon_textregular, sans-serif !important; padding: 1px; font-size: 1px;\" title=\"Thiết lập ban đầu\">Kh&ocirc;ng bấm v&agrave;o v&ugrave;ng m&agrave;u đỏ n&agrave;y !</a> để bắt đầu sử dụng Haravan. Hướng dẫn n&agrave;y sẽ hỗ trợ nh&agrave; b&aacute;n h&agrave;ng ho&agrave;n th&agrave;nh c&aacute;c bước ch&iacute;nh trước khi bắt đầu b&aacute;n.&nbsp;</div><div style=\"box-sizing: border-box; font-family: brandon_textregular, sans-serif; color: rgb(85, 85, 85); font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Nếu nh&agrave; b&aacute;n h&agrave;ng đang b&aacute;n tr&ecirc;n một nền tảng kh&aacute;c, nhưng muốn chuyển cửa h&agrave;ng đến Haravan, h&atilde;y di chuyển ngay h&ocirc;m nay.</div><p><br></p><p><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '<p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Sử dụng:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&ecirc;n bề mặt sạch, tr&ecirc;n b&agrave;n. Tr&aacute;nh đặt nơi đất bẩn.&nbsp;</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh treo t&uacute;i bằng quai v&igrave; trọng lượng c&oacute; thể phải hư quai v&agrave; d&aacute;ng t&uacute;i.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh để t&uacute;i tiếp x&uacute;c trực tiếp &aacute;nh mặt trời qu&aacute; l&acirc;u.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Kh&ocirc;ng để c&aacute;c vật sắc nhọn như dao, bấm m&oacute;ng tay v&agrave;o t&uacute;i.&nbsp;</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Tr&aacute;nh để trực tiếp c&aacute;c vật c&oacute; thể lem m&agrave;u (viết mực, mỹ phẩm) v&agrave;o l&ograve;ng t&uacute;i.&nbsp;</span></li></ul><p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Vệ sinh:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Lau t&uacute;i theo chiều dọc, nhẹ nh&agrave;ng, tr&aacute;nh chất tẩy mạnh, cồn, nước, khăn ướt v&igrave; khiến t&uacute;i phai m&agrave;u, kh&ocirc; da. &nbsp;</span></b></li><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">D&ugrave;ng dung dịch hỗ trợ chuy&ecirc;n dụng chống thấm dầu v&agrave; nước để giảm thiểu khả năng b&aacute;m bẩn.</span></li><li style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Kh&ocirc;ng mang t&uacute;i đi giặt v&agrave; sử dụng c&aacute;c dụng cụ c&oacute; nhiệt độ cao để l&agrave;m kh&ocirc; t&uacute;i.&nbsp;</span></li></ul><p style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; line-height: 21px; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><b style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 700;\">Cất giữ:&nbsp;</b></p><ul style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px 0px 10px; padding: 0px; list-style-type: none; color: rgb(37, 42, 43); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Th&aacute;o d&acirc;y đeo cất v&agrave;o b&ecirc;n trong t&uacute;i, cho v&agrave;o bao ch&acirc;n hoặc tủ, giữ t&uacute;i x&aacute;ch kh&ocirc;ng bị b&aacute;m bụi khi &iacute;t sử dụng.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">Giữ d&aacute;ng t&uacute;i bằng c&aacute;ch nhồi giấy hoặc t&uacute;i nilon. Lưu &yacute;, kh&ocirc;ng d&ugrave;ng giấy b&aacute;o v&igrave; mực c&oacute; thể d&iacute;nh v&agrave;o t&uacute;i v&agrave; g&acirc;y m&ugrave;i kh&oacute; chịu.</span></li><li data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\"><span data-mce-style=\"font-weight: 400;\" style=\"box-sizing: border-box; font-family: MuliDisplayVN, sans-serif; margin: 0px; padding: 0px; font-weight: 400;\">D&ugrave;ng g&oacute;i h&uacute;t ẩm c&oacute; sẵn trong t&uacute;i để ngăn chặn m&ugrave;i h&ocirc;i.</span></li></ul><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', null, '<p><span style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>&ldquo;</span><b style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\'>H&agrave; Nội</b><span style=\'color: rgb(0, 0, 0); font-family: Arial, \"Time New Roman\"; font-size: 14.6667px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\'>&rdquo;, &acirc;m thanh vang l&ecirc;n nghe thật trong trẻo, l&agrave;m động l&ograve;ng tr&aacute;i tim bao người con đất Việt. Trải qua biết bao thăng trầm lịch sử, H&agrave; Nội vẫn sừng sững ở đ&oacute;, nguy nga tr&aacute;ng lệ. N&oacute;i về H&agrave; Nội, người ta kh&ocirc;ng khỏi nghĩ đến một th&agrave;nh phố tấp nập, những c&ocirc;ng ti cao trọc trời, những trung t&acirc;m giải tr&iacute;, trung t&acirc;m thương mại rộng lớn. Nhưng bạn biết kh&ocirc;ng, b&ecirc;n cạnh vẻ đẹp hiện đại đấy, H&agrave; Nội vẫn giữ cho m&igrave;nh một n&eacute;t rất ri&ecirc;ng, rất H&agrave; Nội m&agrave; kh&ocirc;ng nơi đ&acirc;u c&oacute; được. B&agrave;i viết dưới đ&acirc;y sẽ đưa ta đi tham quan một v&ograve;ng H&agrave; Nội, mở rộng hiểu biết về những danh lam thắng cảnh, phong tục tập qu&aacute;n v&agrave; con người H&agrave; Nội.</span></p><p><img src=\"http://store1.min:81/admini/productImages/1602667276.jpeg\" style=\"width: 300px;\" class=\"fr-fic fr-dib\"></p><p><br></p><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', '<table style=\"width: 100%;\"><tbody><tr><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><br></td><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><span style=\"color: rgb(255, 255, 255);\">NAM</span></td><td style=\"width: 33.3333%; background-color: rgb(84, 172, 210);\"><span style=\"color: rgb(255, 255, 255);\">NỮ</span></td></tr><tr><td style=\"width: 33.3333%;\">1m4-1m5</td><td style=\"width: 33.3333%;\">S</td><td style=\"width: 33.3333%;\">S</td></tr><tr><td style=\"width: 33.3333%;\">1m5-1m6</td><td style=\"width: 33.3333%;\">M</td><td style=\"width: 33.3333%;\">M</td></tr><tr><td style=\"width: 33.3333%;\">1m6-1m7</td><td style=\"width: 33.3333%;\">L</td><td style=\"width: 33.3333%;\">L</td></tr><tr><td style=\"width: 33.3333%;\">1m7-1m8</td><td style=\"width: 33.3333%;\">XL</td><td style=\"width: 33.3333%;\">XL</td></tr><tr><td style=\"width: 33.3333%;\">1m8-1m9</td><td style=\"width: 33.3333%;\">XXL</td><td style=\"width: 33.3333%;\">XXL</td></tr><tr><td style=\"width: 33.3333%;\">1m9 trở l&ecirc;n</td><td style=\"width: 33.3333%;\">3XL</td><td style=\"width: 33.3333%;\">3XL</td></tr></tbody></table><p data-f-id=\"pbf\" style=\"text-align: center; font-size: 14px; margin-top: 30px; opacity: 0.65; font-family: sans-serif;\">Powered by <a href=\"https://www.froala.com/wysiwyg-editor?pb=1\" title=\"Froala Editor\">Froala Editor</a></p>', null, null, '2020-06-10 11:45:41', '2020-10-16 17:34:06', '0000-00-00 00:00:00', null);

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `origin_name` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(5) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('14', '1', '1591771361.png', 'product-1-1.png', null, '2020-06-10 13:42:42', '1', '2020-06-10 13:42:42', null, null, null);
INSERT INTO `product_images` VALUES ('27', '1', '1593229408.jpeg', 'product-1-2.jpg', null, '2020-06-27 10:43:29', '1', '2020-06-27 10:43:29', null, null, null);
INSERT INTO `product_images` VALUES ('30', '5', '1596594120.png', 'product-5-1.png', null, '2020-08-05 09:22:02', '1', '2020-08-05 09:22:02', null, null, null);
INSERT INTO `product_images` VALUES ('32', '3', '1596771352.png', 'product-3-1.png', null, '2020-08-07 10:35:55', '1', '2020-08-07 10:35:55', null, null, null);
INSERT INTO `product_images` VALUES ('33', '3', '1596771363.png', 'product-3-2.png', null, '2020-08-07 10:36:04', '1', '2020-08-07 10:36:04', null, null, null);
INSERT INTO `product_images` VALUES ('34', '4', '1596771386.jpeg', 'product-4-1.jpg', null, '2020-08-07 10:36:26', '1', '2020-08-07 10:36:27', null, null, null);
INSERT INTO `product_images` VALUES ('35', '4', '1596771398.png', 'product-4-2.png', null, '2020-08-07 10:36:39', '1', '2020-08-07 10:36:39', null, null, null);
INSERT INTO `product_images` VALUES ('37', '5', '1596771471.jpeg', 'product-5-2.jpg', null, '2020-08-07 10:37:51', '1', '2020-08-07 10:37:51', null, null, null);
INSERT INTO `product_images` VALUES ('46', '2', '1596858390.jpeg', 'product-2-1.jpg', null, '2020-08-08 10:46:30', '1', '2020-08-08 10:46:30', null, null, null);
INSERT INTO `product_images` VALUES ('47', '2', '1597132623.jpeg', 'product-2-2.jpg', null, '2020-08-11 14:57:04', '1', '2020-08-11 14:57:04', null, null, null);

-- ----------------------------
-- Table structure for product_tag
-- ----------------------------
DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `product_id` int(10) DEFAULT NULL,
  `tag_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product_tag
-- ----------------------------
INSERT INTO `product_tag` VALUES ('3', '3');
INSERT INTO `product_tag` VALUES ('4', '1');
INSERT INTO `product_tag` VALUES ('4', '2');
INSERT INTO `product_tag` VALUES ('3', '1');
INSERT INTO `product_tag` VALUES ('1', '2');
INSERT INTO `product_tag` VALUES ('1', '3');
INSERT INTO `product_tag` VALUES ('4', '3');
INSERT INTO `product_tag` VALUES ('4', '6');
INSERT INTO `product_tag` VALUES ('5', '1');
INSERT INTO `product_tag` VALUES ('5', '3');
INSERT INTO `product_tag` VALUES ('2', '2');
INSERT INTO `product_tag` VALUES ('1', '1');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pretty_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `css` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'QUẢN TRỊ', 'web', 'danger', '2020-09-08 11:33:26', '2020-09-08 11:33:29');
INSERT INTO `roles` VALUES ('2', 'staff', 'NHÂN VIÊN', 'web', 'primary', '2020-09-08 11:35:28', '2020-09-08 11:35:30');
INSERT INTO `roles` VALUES ('3', 'wh_staff', 'QL KHO', 'web', 'warning', '2020-09-15 11:27:06', '2020-09-15 11:27:08');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('1', '1');
INSERT INTO `role_has_permissions` VALUES ('1', '2');
INSERT INTO `role_has_permissions` VALUES ('2', '1');
INSERT INTO `role_has_permissions` VALUES ('2', '2');
INSERT INTO `role_has_permissions` VALUES ('3', '1');
INSERT INTO `role_has_permissions` VALUES ('3', '2');
INSERT INTO `role_has_permissions` VALUES ('4', '1');
INSERT INTO `role_has_permissions` VALUES ('4', '2');
INSERT INTO `role_has_permissions` VALUES ('5', '1');
INSERT INTO `role_has_permissions` VALUES ('5', '2');
INSERT INTO `role_has_permissions` VALUES ('6', '1');
INSERT INTO `role_has_permissions` VALUES ('6', '2');
INSERT INTO `role_has_permissions` VALUES ('7', '1');
INSERT INTO `role_has_permissions` VALUES ('7', '2');
INSERT INTO `role_has_permissions` VALUES ('8', '1');
INSERT INTO `role_has_permissions` VALUES ('8', '2');
INSERT INTO `role_has_permissions` VALUES ('9', '1');
INSERT INTO `role_has_permissions` VALUES ('9', '2');
INSERT INTO `role_has_permissions` VALUES ('10', '1');
INSERT INTO `role_has_permissions` VALUES ('10', '2');
INSERT INTO `role_has_permissions` VALUES ('11', '1');
INSERT INTO `role_has_permissions` VALUES ('11', '2');
INSERT INTO `role_has_permissions` VALUES ('12', '1');
INSERT INTO `role_has_permissions` VALUES ('12', '2');
INSERT INTO `role_has_permissions` VALUES ('13', '1');
INSERT INTO `role_has_permissions` VALUES ('14', '1');
INSERT INTO `role_has_permissions` VALUES ('15', '1');
INSERT INTO `role_has_permissions` VALUES ('19', '1');
INSERT INTO `role_has_permissions` VALUES ('20', '1');
INSERT INTO `role_has_permissions` VALUES ('21', '1');
INSERT INTO `role_has_permissions` VALUES ('25', '1');
INSERT INTO `role_has_permissions` VALUES ('26', '1');
INSERT INTO `role_has_permissions` VALUES ('27', '1');
INSERT INTO `role_has_permissions` VALUES ('31', '1');
INSERT INTO `role_has_permissions` VALUES ('31', '3');
INSERT INTO `role_has_permissions` VALUES ('32', '1');
INSERT INTO `role_has_permissions` VALUES ('32', '3');
INSERT INTO `role_has_permissions` VALUES ('33', '1');
INSERT INTO `role_has_permissions` VALUES ('33', '3');
INSERT INTO `role_has_permissions` VALUES ('34', '1');
INSERT INTO `role_has_permissions` VALUES ('34', '3');
INSERT INTO `role_has_permissions` VALUES ('35', '1');
INSERT INTO `role_has_permissions` VALUES ('35', '3');
INSERT INTO `role_has_permissions` VALUES ('36', '1');
INSERT INTO `role_has_permissions` VALUES ('36', '3');
INSERT INTO `role_has_permissions` VALUES ('37', '1');
INSERT INTO `role_has_permissions` VALUES ('37', '3');
INSERT INTO `role_has_permissions` VALUES ('38', '1');
INSERT INTO `role_has_permissions` VALUES ('38', '3');
INSERT INTO `role_has_permissions` VALUES ('39', '1');
INSERT INTO `role_has_permissions` VALUES ('40', '1');
INSERT INTO `role_has_permissions` VALUES ('41', '1');
INSERT INTO `role_has_permissions` VALUES ('42', '1');
INSERT INTO `role_has_permissions` VALUES ('43', '1');
INSERT INTO `role_has_permissions` VALUES ('44', '1');
INSERT INTO `role_has_permissions` VALUES ('45', '1');
INSERT INTO `role_has_permissions` VALUES ('46', '1');
INSERT INTO `role_has_permissions` VALUES ('47', '1');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT '',
  `pretty_name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('1', 'x5XEqJQlFL', 'Độc', '2020-05-16 09:26:36', '1', '2020-05-25 17:12:19', null);
INSERT INTO `tags` VALUES ('2', '4IVhKL5xLB', 'Limited', '2020-05-16 09:28:15', '1', null, null);
INSERT INTO `tags` VALUES ('3', 'JHW83a7Dsb', 'Thời Chang', '2020-05-16 09:30:36', '1', '2020-08-03 15:46:41', null);
INSERT INTO `tags` VALUES ('6', 'shFnDMH57h', 'Lạ', '2020-05-19 09:14:44', '1', '2020-05-24 14:08:28', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lock` tinyint(4) DEFAULT NULL,
  `social_network` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'Sơn Tùng', 'admin@gmail.com', '1', '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.instagram.com\\/tung.encode.97\\/?hl=vi\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung726509\"}', null, '$2y$10$nmS.rM5yB6icwi4TCBwvj.J2PCUocFwOLIGdUTyNzHtfIoBQSjMVC', '', '2020-04-28 22:45:22', '2020-09-20 15:34:53');
INSERT INTO `users` VALUES ('2', 'staff1', 'Tùng Sơn 1', 'staff@gmail.com', '0', '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.instagram.com\\/tung.encode.97\\/?hl=vi\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung727\"}', null, '$2y$10$3mHKoz5jkPIvHG4wA1Y37OApHIbj0gX/hxf7ZMdj0G9jahnjhwyAW', '', '2020-04-28 22:45:22', '2020-10-12 08:45:45');
INSERT INTO `users` VALUES ('3', 'han', 'hà an', 'an@gmail.com', '0', '{\"fb\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"ins\":\"https:\\/\\/www.facebook.com\\/tung726509\",\"skype\":\"https:\\/\\/www.facebook.com\\/tung726509\"}', null, '$2y$10$pB2wqyL/5GiFnP.HhqLiJeBc3HELAOg8JNBYhKY2iXzIPtV3pTjXO', null, '2020-09-13 13:47:07', '2020-09-30 11:21:06');

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `main` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of warehouses
-- ----------------------------
INSERT INTO `warehouses` VALUES ('1', 'kho ngã tư sở 1', '19 nguyễn trãi 1', '1', '2020-06-23 11:09:23', '1', '2020-06-23 11:09:23', null, null, null);
INSERT INTO `warehouses` VALUES ('2', 'kho minh khai', 'gốc đề , minh khai', null, '2020-05-28 09:26:35', '1', null, null, null, null);
INSERT INTO `warehouses` VALUES ('4', 'kho 1', null, null, '2020-05-29 10:50:15', '1', '2020-05-29 10:50:15', null, null, null);
INSERT INTO `warehouses` VALUES ('5', 'kho 2', 'kho 2 ngã tư sở', null, '2020-05-29 10:50:17', '1', '2020-05-29 10:50:17', null, null, null);

-- ----------------------------
-- Table structure for warehouse_items
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_items`;
CREATE TABLE `warehouse_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of warehouse_items
-- ----------------------------
INSERT INTO `warehouse_items` VALUES ('12', '1', '1', '49', '2020-10-11 17:35:25', '1', '2020-10-11 17:35:25', null, null, null);
INSERT INTO `warehouse_items` VALUES ('13', '2', '1', '29', '2020-10-11 17:35:25', '1', '2020-10-11 17:35:25', null, null, null);
INSERT INTO `warehouse_items` VALUES ('14', '4', '2', '150', '2020-06-10 15:25:02', '1', '2020-06-10 15:25:02', null, null, null);
INSERT INTO `warehouse_items` VALUES ('15', '3', '1', '150', '2020-07-24 16:56:56', '1', '2020-07-24 16:56:56', null, null, null);
INSERT INTO `warehouse_items` VALUES ('16', '4', '1', '200', '2020-06-23 14:35:35', '1', '2020-06-23 14:35:35', null, null, null);
INSERT INTO `warehouse_items` VALUES ('17', '5', '1', '300', '2020-10-16 11:42:59', '1', '2020-10-16 11:42:59', null, null, null);

-- ----------------------------
-- Table structure for warehouse_logs
-- ----------------------------
DROP TABLE IF EXISTS `warehouse_logs`;
CREATE TABLE `warehouse_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of warehouse_logs
-- ----------------------------
INSERT INTO `warehouse_logs` VALUES ('31', '12', '1', '50', '10', '1', '1', 'nhập thêm', '2020-10-06 15:05:14', null, '2020-10-06 15:05:14', null);
INSERT INTO `warehouse_logs` VALUES ('32', '13', '2', '10', '20', '1', '1', 'nhập thêm hàng', '2020-10-06 15:05:48', null, '2020-10-06 15:05:48', null);
INSERT INTO `warehouse_logs` VALUES ('33', '12', '1', '50', '60', '2', '1', 'cho mượn 10', '2020-10-06 15:06:23', null, '2020-10-06 15:06:23', null);
INSERT INTO `warehouse_logs` VALUES ('59', '12', '1', '1', '50', '3', '1', 'MzQ=', '2020-10-11 17:35:25', null, '2020-10-11 17:35:25', null);
INSERT INTO `warehouse_logs` VALUES ('60', '13', '2', '1', '30', '3', '1', 'MzQ=', '2020-10-11 17:35:25', null, '2020-10-11 17:35:25', null);
