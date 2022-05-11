-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2022 at 03:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);


-- --------------------------------------------------------

--
-- Table structure for table `mst_customer`
--

CREATE TABLE `mst_customer` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_num` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_customer`
--

INSERT INTO `mst_customer` (`customer_id`, `customer_name`, `email`, `tel_num`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bin_10', 'Bin_10@bin.com', '0123451210', '10 Tan Quy TPHCM', 0, '2022-02-21 04:06:26', NULL),
(2, 'Bin_11', 'Bin_11@bin.com', '0123451211', '11 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(3, 'Bin_12', 'Bin_12@bin.com', '0123451212', '12 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(4, 'Bin_13', 'Bin_13@bin.com', '0123451213', '13 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(5, 'Bin_14', 'Bin_14@bin.com', '0123451214', '14 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(6, 'Bin_15', 'Bin_15@bin.com', '0123451215', '15 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(7, 'Bin_16', 'Bin_16@bin.com', '0123451216', '16 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(8, 'Bin_17', 'Bin_17@bin.com', '0123451217', '17 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(9, 'Bin_18', 'Bin_18@bin.com', '0123451218', '18 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(10, 'Bin_19', 'Bin_19@bin.com', '0123451219', '19 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(11, 'Bin_20', 'Bin_20@bin.com', '0123451220', '20 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(12, 'Bin_21', 'Bin_21@bin.com', '0123451221', '21 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(13, 'Bin_22', 'Bin_22@bin.com', '0123451222', '22 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(14, 'Bin_23', 'Bin_23@bin.com', '0123451223', '23 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(15, 'Bin_24', 'Bin_24@bin.com', '0123451224', '24 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(16, 'Bin_25', 'Bin_25@bin.com', '0123451225', '25 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(17, 'Bin_26', 'Bin_26@bin.com', '0123451226', '26 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(18, 'Bin_27', 'Bin_27@bin.com', '0123451227', '27 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(19, 'Bin_28', 'Bin_28@bin.com', '0123451228', '28 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(20, 'Bin_29', 'Bin_29@bin.com', '0123451229', '29 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(21, 'Bin_30', 'Bin_30@bin.com', '0123451230', '30 Tan Quy TPHCM', 1, '2022-02-21 04:06:26', NULL),
(52, 'binhnam5', 'binh@5.com', '9093350815', '127', NULL, '2022-02-21 14:45:17', '2022-02-21 14:45:17'),
(53, 'binhnam6', 'binh@6.com', '9093350816', '128', NULL, '2022-02-21 14:45:17', '2022-02-21 14:45:17'),
(54, 'binhnam7', 'binh@7.com', '9093350817', '129', NULL, '2022-02-21 14:45:17', '2022-02-21 14:45:17'),
(55, 'binhnam8', 'binh@8.com', '9093350818', '130', NULL, '2022-02-21 14:45:17', '2022-02-21 14:45:17'),
(103, '111aaaaaaaa777', 'binh@12q1.com', '9093350800', '12345', 1, '2022-02-22 04:03:05', '2022-02-22 09:12:04'),
(104, 'aaasdasdqd1', 'binh@1112q1.com', '0909335080', '123q122', 1, '2022-02-22 09:38:26', '2022-02-22 09:13:04'),
(105, 'aaaa222aaaaaa', 'binh@117.com', '0909112341', 'a', 1, '2022-02-22 03:31:39', '2022-02-22 09:12:22'),
(106, 'biasdas', 'binaa@sadas.com', '9093350800', '125', 1, '2022-02-23 02:24:26', '2022-02-23 02:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `mst_order`
--

CREATE TABLE `mst_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `ship_charge` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `shipment_date` datetime NOT NULL,
  `cancel_date` datetime NOT NULL,
  `note_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_code_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_order`
--

INSERT INTO `mst_order` (`order_id`, `order_shop`, `customer_id`, `total_price`, `payment_method`, `ship_charge`, `tax`, `order_date`, `shipment_date`, `cancel_date`, `note_customer`, `error_code_api`, `created_at`, `updated_at`) VALUES
(16, 'T00001', 52, 1000000, 1, 10000, 0, '2022-02-22 03:29:06', '2022-02-22 03:29:06', '2022-02-22 03:29:06', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_order_detail`
--

CREATE TABLE `mst_order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_product` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price_buy` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shop_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_order_detail`
--

INSERT INTO `mst_order_detail` (`id`, `order_id`, `product_id`, `detail_product`, `price_buy`, `quantity`, `shop_id`, `receiver_id`, `created_at`, `updated_at`) VALUES
(7, 16, '16', '{\"product_name\":\"Sản phẩm16\",\"product_image\":\"saurieng-dua.jpg\",\"product_price\":\"12316.00\",\"description\":\"Mô tả sản phẩm16\"}', 12316, 1, 'A001', 52, '2022-02-22 06:13:55', '2022-02-22 06:13:55'),
(8, 16, '13', '{\"product_name\":\"Sản phẩm13\",\"product_image\":\"Fruit-Cake_7976.jpg\",\"product_price\":\"12313.00\",\"description\":\"Mô tả sản phẩm13\"}', 12313, 1, 'A001', 52, '2022-02-22 06:31:36', '2022-02-22 06:31:36'),
(9, 16, '11', '{\"product_name\":\"Sản phẩm11\",\"product_image\":\"Fruit-Cake.png\",\"product_price\":\"12311.00\",\"description\":\"Mô tả sản phẩm11\"}', 12311, 1, 'A001', 52, '2022-02-22 06:31:39', '2022-02-22 06:31:39'),
(10, 16, '12', '{\"product_name\":\"Sản phẩm12\",\"product_image\":\"mango-mousse-cake.jpg\",\"product_price\":\"12312.00\",\"description\":\"Mô tả sản phẩm12\"}', 12312, 1, 'A001', 52, '2022-02-22 06:31:42', '2022-02-22 06:31:42'),
(11, 16, '5', '{\"product_name\":\"Sản phẩm5\",\"product_image\":\"210215-banh-sinh-nhat-rau-cau-body- (6).jpg\",\"product_price\":\"1235.00\",\"description\":\"Mô tả sản phẩm5\"}', 1235, 1, 'A001', 52, '2022-02-22 06:32:16', '2022-02-22 06:32:16'),
(12, 16, '6', '{\"product_name\":\"Sản phẩm6\",\"product_image\":\"50020041-combo-20-banh-su-que-pho-mai-9.jpg\",\"product_price\":\"1236.00\",\"description\":\"Mô tả sản phẩm6\"}', 1236, 1, 'A001', 52, '2022-02-22 06:32:18', '2022-02-22 06:32:18'),
(13, 16, '7', '{\"product_name\":\"Sản phẩm7\",\"product_image\":\"dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg\",\"product_price\":\"1237.00\",\"description\":\"Mô tả sản phẩm7\"}', 1237, 1, 'A001', 52, '2022-02-22 06:32:20', '2022-02-22 06:32:20'),
(14, 16, '8', '{\"product_name\":\"Sản phẩm8\",\"product_image\":\"flower-fruits636102461981788938.jpg\",\"product_price\":\"1238.00\",\"description\":\"Mô tả sản phẩm8\"}', 1238, 1, 'A001', 52, '2022-02-22 06:32:22', '2022-02-22 06:32:22'),
(15, 17, '2', '{\"product_name\":\"Sản phẩm2\",\"product_image\":\"544bc48782741.png\",\"product_price\":\"1232.00\",\"description\":\"Mô tả sản phẩm2\"}', 1232, 1, 'A001', 52, '2022-02-22 06:38:35', '2022-02-22 06:38:35'),
(16, 17, '3', '{\"product_name\":\"Sản phẩm3\",\"product_image\":\"1234.jpg\",\"product_price\":\"1233.00\",\"description\":\"Mô tả sản phẩm3\"}', 1233, 1, 'A001', 52, '2022-02-22 06:38:46', '2022-02-22 06:38:46'),
(17, 17, '4', '{\"product_name\":\"Sản phẩm4\",\"product_image\":\"40819_food_pizza.jpg\",\"product_price\":\"1234.00\",\"description\":\"Mô tả sản phẩm4\"}', 1234, 1, 'A001', 52, '2022-02-22 06:38:48', '2022-02-22 06:38:48'),
(18, 17, '5', '{\"product_name\":\"Sản phẩm5\",\"product_image\":\"210215-banh-sinh-nhat-rau-cau-body- (6).jpg\",\"product_price\":\"1235.00\",\"description\":\"Mô tả sản phẩm5\"}', 1235, 1, 'A001', 52, '2022-02-22 06:38:54', '2022-02-22 06:38:54'),
(19, 17, '6', '{\"product_name\":\"Sản phẩm6\",\"product_image\":\"50020041-combo-20-banh-su-que-pho-mai-9.jpg\",\"product_price\":\"1236.00\",\"description\":\"Mô tả sản phẩm6\"}', 1236, 1, 'A001', 52, '2022-02-22 06:38:56', '2022-02-22 06:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE `mst_product` (
  `product_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `is_sales` tinyint(4) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`product_id`, `product_name`, `product_image`, `product_price`, `is_sales`, `description`, `created_at`, `updated_at`) VALUES
('0', 'Sản phẩm0', '111.jpg', '1230.00', 1, 'Mô tả sản phẩm0', '2022-02-21 04:06:26', NULL),
('1', 'Sản phẩm1', '234.jpg', '1231.00', 1, 'Mô tả sản phẩm1', '2022-02-21 04:06:26', NULL),
('10', 'Sản phẩm10', 'Fruit-Cake.jpg', '12310.00', 1, 'Mô tả sản phẩm10', '2022-02-21 04:06:26', NULL),
('11', 'Sản phẩm11', 'Fruit-Cake.png', '12311.00', 1, 'Mô tả sản phẩm11', '2022-02-21 04:06:26', NULL),
('12', 'Sản phẩm12', 'mango-mousse-cake.jpg', '12312.00', 1, 'Mô tả sản phẩm12', '2022-02-21 04:06:26', NULL),
('13', 'Sản phẩm13', 'Fruit-Cake_7976.jpg', '12313.00', 1, 'Mô tả sản phẩm13', '2022-02-21 04:06:26', NULL),
('14', 'Sản phẩm14', 'MATCHA-MOUSSE.jpg', '12314.00', 1, 'Mô tả sản phẩm14', '2022-02-21 04:06:26', NULL),
('16', 'Sản phẩm16', 'saurieng-dua.jpg', '12316.00', 1, 'Mô tả sản phẩm16', '2022-02-21 04:06:27', NULL),
('2', 'Sản phẩm2', '544bc48782741.png', '1232.00', 1, 'Mô tả sản phẩm2', '2022-02-21 04:06:26', NULL),
('3', 'Sản phẩm3', '1234.jpg', '1233.00', 1, 'Mô tả sản phẩm3', '2022-02-21 04:06:26', NULL),
('4', 'Sản phẩm4', '40819_food_pizza.jpg', '1234.00', 1, 'Mô tả sản phẩm4', '2022-02-21 04:06:26', NULL),
('5', 'Sản phẩm5', '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', '1235.00', 1, 'Mô tả sản phẩm5', '2022-02-21 04:06:26', NULL),
('6', 'Sản phẩm6', '50020041-combo-20-banh-su-que-pho-mai-9.jpg', '1236.00', 1, 'Mô tả sản phẩm6', '2022-02-21 04:06:26', NULL),
('7', 'Sản phẩm7', 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', '1237.00', 1, 'Mô tả sản phẩm7', '2022-02-21 04:06:26', NULL),
('8', 'Sản phẩm8', 'flower-fruits636102461981788938.jpg', '1238.00', 1, 'Mô tả sản phẩm8', '2022-02-21 04:06:26', NULL),
('9', 'Sản phẩm9', 'foody-banh-su-que-635930347896369908.jpg', '1239.00', 1, 'Mô tả sản phẩm9', '2022-02-21 04:06:26', NULL),
('L0000000001', 'ly sứ nhựa', '1626229931_sprite.png', '123.00', 2, '<p>đẹp&nbsp;</p>', '2022-02-22 09:06:54', '2022-02-23 02:32:11'),
('S0000000001', 'Sản phẩm19', 'sukemdau.jpg', '12319.00', 1, 'Mô tả sản phẩm19', '2022-02-21 04:06:27', '2022-02-21 04:50:50'),
('T0000000011', 'tách 123', NULL, '121.00', 0, NULL, '2022-02-22 03:20:02', '2022-02-22 09:26:23');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `group_role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `email_verified_at`, `is_active`, `is_delete`, `group_role`, `last_login_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'Bin_1', 'Bin_1@bin.com', '$2y$10$SvRV9/mr21MIzH6OMqtBzuGv.Te0cj1jTOcyOvM6U/uUG0pxXAJuC', '7jeVrpugEjdMRJfchc8oAAR3ieKCM00tNWolygX12rgwjSQO1kig7UYbxLap', NULL, 1, 0, 'none', '2022-05-10 15:05:54', '::1', '2022-02-21 04:06:25', '2022-05-10 15:05:54'),
(2, 'Bin_2', 'Bin_2@bin.com', '$2y$10$IFe9Dhncmim19UBnVz3mkuqWPWUVHJ6gDw6xj9tDSm1iEUZ9oqb3W', NULL, NULL, 0, 1, 'none', '2022-02-21 04:06:25', 'none', '2022-02-21 04:06:25', '2022-02-22 01:46:53'),
(3, 'Bin_3', 'Bin_3@bin.com', '$2y$10$2mZyHXIUnXsLKBWmLiJUEu2eWdlke7AhOgdDW3sfPo67CJp2qr3ri', NULL, NULL, 1, 0, 'none', '2022-02-21 04:06:25', 'none', '2022-02-21 04:06:25', NULL),
(4, 'Bin_4', 'Bin_4@bin.com', '$2y$10$.mK6sRDqgJLMgByI6AhnA.GKOMTifGbhgGPSPRRnec16tjWwDUDS2', NULL, NULL, 1, 0, 'none', '2022-02-21 04:06:25', 'none', '2022-02-21 04:06:25', '2022-02-22 07:21:38'),
(5, 'Bin_5zzxcc', 'Bin_5@bin.com', '$2y$10$YY//mwW1DUFTyJpyVHANq..P5.N9N81G8JI6S1WroldXje3FTQDXq', NULL, NULL, 1, 0, 'admin', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 10:07:00'),
(6, 'Bin_6111', 'Bin_6@bin.com', '$2y$10$frWDFK5qH7f5KGzvzW5aseEgbTVqZ.2s.P/u8dKNbx4DJUzpa/QxW', NULL, NULL, 1, 0, 'admin', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 10:06:48'),
(7, 'Bin_7123', 'Bin_7@bin.com', '$2y$10$jI36iP2rebi/NDO5oE.bLOb2cAjtdkM2V1/HdrMiANB4qiBJXHeSG', NULL, NULL, 1, 0, 'reviewer', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 10:06:33'),
(8, 'Bin_81aa', 'Bin_8@bin.com', '$2y$10$N/vvnE8WdpFHfbtXMm18fuznKYOmoKsFY6Ak10jeWeiy/ghxWR9IK', NULL, NULL, 1, 0, 'admin', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 10:06:26'),
(9, 'Bin_912', 'Bin_9@bin.com', '$2y$10$T21ouC7aNhNZmSYQtPPvVuMetVkA/r6KSMhYmUDq/oL/tRvw/9Ixa', NULL, NULL, 1, 0, 'editor', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 10:06:19'),
(10, 'Bin_10', 'Bin_10@bin.com', '$2y$10$ni3y2D1tBysRPvTo87Op9u4DgBuk.lmDTO5xhb8AIUkk3AcBW13sS', NULL, NULL, 1, 0, 'reviewer', '2022-02-21 04:06:26', 'none', '2022-02-21 04:06:26', '2022-02-22 07:31:10'),
(11, 'binhadda', 'bin@123.com', '$2y$10$7ktUuBH1LKQXIK0wrnZrmeoTLMeGwilUO4rkQCi39r9ml..LnNX8.', NULL, NULL, 0, 1, 'admin', NULL, NULL, '2022-02-22 07:11:30', '2022-02-22 07:29:29'),
(12, 'binhaaddda', 'bin1@1.com', '$2y$10$eo4vP/fZ8kWr/8vhesEwju4BZlN8aEPwpBseHdfIr42nhBkeXBGsW', NULL, NULL, 1, 0, 'reviewer', NULL, NULL, '2022-02-22 07:31:48', '2022-02-22 07:31:48'),
(13, 'binhaaddda', 'bin21@1.com', '$2y$10$bgyXgLowNmEZcCum9gyXh.MW6th1yk7VUsjiD2r6DWIffnxmABrAC', NULL, NULL, 1, 1, 'reviewer', NULL, NULL, '2022-02-22 07:32:09', '2022-02-22 02:17:52'),
(14, 'baaaaaa', '12@ada.com', '$2y$10$Qi5Q0ZluoQN/CXzOE63XIO86ZxqszHxpH.LSJNhhAVu.70uKFNN/y', NULL, NULL, 0, 0, 'reviewer', NULL, NULL, '2022-02-22 02:00:56', '2022-02-22 02:37:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_customer`
--
ALTER TABLE `mst_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mst_order`
--
ALTER TABLE `mst_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mst_order_detail`
--
ALTER TABLE `mst_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mst_customer`
--
ALTER TABLE `mst_customer`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `mst_order`
--
ALTER TABLE `mst_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mst_order_detail`
--
ALTER TABLE `mst_order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
