-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 05:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaravel`
--

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
(1, '2018_10_10_080058_create_tbl_admin_table', 1),
(2, '2018_10_16_073802_create_tbl_category_table', 2),
(3, '2018_10_23_171202_create_manufacture_table', 3),
(4, '2018_10_27_163113_create_tbl_products_table', 4),
(5, '2018_10_30_102545_create_tbl_slider_table', 5),
(6, '2018_11_03_053700_create_tbl_customer_table', 6),
(7, '2018_11_03_062925_create_tbl_shipping_table', 7),
(8, '2018_11_03_110823_create_tbl_payment_table', 8),
(9, '2018_11_03_111231_create_tbl_order_table', 8),
(10, '2018_11_03_111757_create_tbl_order_details_table', 8),
(11, '2018_11_04_065058_create_tbl_contact_table', 9),
(12, '2018_11_04_155130_create_tbl_review_table', 10),
(13, '2018_11_10_065816_create_tbl_subscribe_table', 11),
(14, '2018_11_11_052844_create_tbl_manager_table', 12),
(15, '2018_11_11_091417_create_tbl_viewer_table', 13),
(16, '2018_11_20_080613_create_tbl_wishlist_table', 14),
(17, '2018_12_24_072504_create_tbl_bkash_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'jewel@nibiz.com', '202cb962ac59075b964b07152d234b70', 'Fakhrul Islam', '01814766106', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bkash`
--

CREATE TABLE `tbl_bkash` (
  `bkash_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_bkash`
--

INSERT INTO `tbl_bkash` (`bkash_id`, `order_id`, `transaction`, `amount`, `created_at`, `updated_at`) VALUES
(1, 33, '0174535445555', 750000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(6, 'MENS', 'This is man category', 1, NULL, NULL),
(7, 'WOMENS', 'THIS IS WOMEN&nbsp; o', 1, NULL, NULL),
(8, 'SPORTSWEAR', 'THIS IS SPORTS WEAR', 1, NULL, NULL),
(9, 'KIDS', 'THIS IS KIDS', 1, NULL, NULL),
(11, 'CLOTHING', 'THIS IS CLOTHING', 1, NULL, NULL),
(12, 'BAGS', 'THIS IS BAGS', 1, NULL, NULL),
(13, 'SHOES', 'THIS IS SHOES', NULL, NULL, NULL),
(14, 'ELECTRONICS', 'THIS IS ELECTRONICS', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Shaan', 'fakhrulislam739@gmail.com', 'Your product is good', 'This is the good product', NULL, NULL),
(2, 'Shaan', 'shaan@gmail.com', 'This is good', 'your product is nice', '2018-12-11 15:16:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `password`, `mobile_number`, `created_at`, `updated_at`) VALUES
(2, 'Shaan Evan', 'shaanevan@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '01814766106', NULL, NULL),
(3, 'Saikat', 'saikat@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', '01814766106', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `manager_id` int(10) UNSIGNED NOT NULL,
  `manager_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`manager_id`, `manager_email`, `manager_password`, `manager_name`, `manager_phone`, `created_at`, `updated_at`) VALUES
(2, 'shimul@nibiz.com', '202cb962ac59075b964b07152d234b70', 'Shimul Khan', '01814766106', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'This is samsung brand', 1, NULL, NULL),
(2, 'Apple', 'This is apple brand is good', 1, NULL, NULL),
(3, 'Zara', 'This is zara brand', 1, NULL, NULL),
(4, 'Seven Rocs', 'This is Seven rocs', 1, NULL, NULL),
(5, 'Ben Marten', 'This is Ben Martin', 1, NULL, NULL),
(6, 'Symbol', 'This is Symbol Brand', 1, NULL, NULL),
(7, 'Indira Designer', 'This is Indira Designer', 1, NULL, NULL),
(8, 'Mayra', 'This is Mayra&nbsp;', 1, NULL, NULL),
(9, 'Sathiyas', 'This is sathiyas', 1, NULL, NULL),
(10, 'Leaderachi', 'This is leady rachi', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(19, 2, 23, '3000', 3, '2018-12-17 08:30:48', NULL),
(20, 3, 24, '75000', 4, '2018-12-17 08:41:11', NULL),
(21, 2, 32, '8000', 2, '2018-12-23 08:53:00', NULL),
(33, 2, 44, '75000', 4, '2018-12-24 06:56:45', NULL),
(38, 2, 49, '17600', 4, '2018-12-24 10:09:09', NULL),
(39, 2, 50, '8000', 1, '2019-06-19 12:06:52', NULL),
(40, 2, 51, '8000', 1, '2019-06-19 12:09:04', NULL),
(41, 2, 52, '8000', 1, '2019-06-19 12:10:01', NULL),
(42, 2, 53, '8000', 1, '2019-06-19 12:15:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(24, 19, 6, 'Set for Boys', '3000', '1', NULL, NULL),
(25, 20, 7, 'Samsung Galaxy S 9', '75000', '1', NULL, NULL),
(26, 21, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(27, 23, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(28, 24, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(29, 33, 7, 'Samsung Galaxy S 9', '75000', '1', NULL, NULL),
(30, 34, 3, 'Anarkali Kurti', '2400', '1', NULL, NULL),
(31, 35, 3, 'Anarkali Kurti', '2400', '1', NULL, NULL),
(32, 36, 6, 'Set for Boys', '3000', '1', NULL, NULL),
(33, 37, 6, 'Set for Boys', '3000', '1', NULL, NULL),
(34, 38, 3, 'Anarkali Kurti', '2400', '4', NULL, NULL),
(35, 38, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(36, 39, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(37, 40, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(38, 41, 1, 'Synthetic Saree', '8000', '1', NULL, NULL),
(39, 42, 1, 'Synthetic Saree', '8000', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'handcash', 'pending', '2018-11-03 16:40:37', NULL),
(2, 'handcash', 'pending', '2018-11-03 16:58:52', NULL),
(3, 'handcash', 'pending', '2018-11-03 16:59:52', NULL),
(4, 'bkash', 'pending', '2018-11-03 17:00:52', NULL),
(5, 'bkash', 'pending', '2018-11-03 17:03:38', NULL),
(6, 'handcash', 'pending', '2018-11-03 17:04:51', NULL),
(7, 'handcash', 'pending', '2018-11-03 17:06:03', NULL),
(8, 'handcash', 'pending', '2018-11-03 17:08:06', NULL),
(9, 'handcash', 'pending', '2018-11-03 17:22:41', NULL),
(10, 'handcash', 'pending', '2018-11-03 17:29:36', NULL),
(11, 'handcash', 'pending', '2018-11-03 17:35:17', NULL),
(12, 'bkash', 'pending', '2018-11-04 05:48:10', NULL),
(13, 'bkash', 'pending', '2018-11-05 10:42:55', NULL),
(14, 'handcash', 'pending', '2018-12-06 07:36:47', NULL),
(15, 'handcash', 'pending', '2018-12-11 07:33:36', NULL),
(16, 'handcash', 'pending', '2018-12-11 07:37:47', NULL),
(17, 'handcash', '1', '2018-12-12 06:12:08', NULL),
(18, 'handcash', 'pending', '2018-12-12 06:14:34', NULL),
(19, 'handcash', 'pending', '2018-12-12 06:58:17', NULL),
(20, 'handcash', 'pending', '2018-12-12 07:22:18', NULL),
(21, 'handcash', 'pending', '2018-12-17 06:54:07', NULL),
(22, 'handcash', 'pending', '2018-12-17 06:54:51', NULL),
(23, 'handcash', 'pending', '2018-12-17 08:30:48', NULL),
(24, 'handcash', 'pending', '2018-12-17 08:41:11', NULL),
(25, 'bkash', 'pending', '2018-12-23 08:45:32', NULL),
(26, 'handcash', 'pending', '2018-12-23 08:46:05', NULL),
(27, 'bkash', 'pending', '2018-12-23 08:47:13', NULL),
(28, 'bkash', 'pending', '2018-12-23 08:48:07', NULL),
(29, 'handcash', 'pending', '2018-12-23 08:48:20', NULL),
(30, 'handcash', 'pending', '2018-12-23 08:48:48', NULL),
(31, 'bkash', 'pending', '2018-12-23 08:51:18', NULL),
(32, 'bkash', 'pending', '2018-12-23 08:53:00', NULL),
(33, 'bkash', 'pending', '2018-12-23 08:53:29', NULL),
(34, 'handcash', 'pending', '2018-12-23 08:54:38', NULL),
(35, 'bkash', 'pending', '2018-12-23 08:58:49', NULL),
(36, 'bkash', 'pending', '2018-12-23 09:17:31', NULL),
(37, 'bkash', 'pending', '2018-12-23 09:19:14', NULL),
(38, 'bkash', 'pending', '2018-12-23 09:20:30', NULL),
(39, 'bkash', 'pending', '2018-12-23 09:21:14', NULL),
(40, 'bkash', 'pending', '2018-12-23 09:23:46', NULL),
(41, 'bkash', 'pending', '2018-12-23 09:23:49', NULL),
(42, 'bkash', 'pending', '2018-12-23 09:24:30', NULL),
(43, 'bkash', 'pending', '2018-12-23 09:25:16', NULL),
(44, 'bkash', 'pending', '2018-12-24 06:56:45', NULL),
(45, 'handcash', 'pending', '2018-12-24 07:31:07', NULL),
(46, 'bkash', 'pending', '2018-12-24 07:38:18', NULL),
(47, 'bkash', 'pending', '2018-12-24 07:42:52', NULL),
(48, 'bkash', 'pending', '2018-12-24 08:00:22', NULL),
(49, 'handcash', 'pending', '2018-12-24 10:09:09', NULL),
(50, 'bkash', 'pending', '2019-06-19 12:06:52', NULL),
(51, 'bkash', 'pending', '2019-06-19 12:09:04', NULL),
(52, 'bkash', 'pending', '2019-06-19 12:10:01', NULL),
(53, 'bkash', 'pending', '2019-06-19 12:15:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Synthetic Saree', 7, 7, 'Synthetic Saree with Blouse Piece', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">100% Synthetic</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">With blouse piece</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Hand wash</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">6 yards</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Printed: Floral</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Blouse Color: Pink</span></font></div>', 8000.00, 'image/xdKcO5lkRDaDhQOIAjdG.jpg', '5.50mtr', 'Off White & Pink', 1, NULL, NULL),
(3, 'Anarkali Kurti', 7, 3, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Women\'s Cotton Anarkali</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Model (height-5\'8\") is wearing size S.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Material: Cotton&nbsp;</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Neck Type: Round Neck; Sleeve Type: 3/4 Sleeve; Item Length: Calf Long</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Package Contents: 1 Anarkali Kurti</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Colour Declaration : There might be slight variation in the actual color of the product due to different screen resolutions</span></font></div>', 2400.00, 'image/mCDbouzjBPa0ZzHN31CC.jpg', 'small, large, x, xx', 'Blue', 1, NULL, NULL),
(4, 'Frock Dress', 9, 9, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Baby Girls Net Partywear&nbsp;</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Fabric: Net</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">It has sequined pattern bodice, flower motifs waistline</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sleeve: sleeveless | closure: zipper | item length: knee-length</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Its ideal for daily wear, all party occasions, birthday, festive and gifting</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Wash care: hand wash in cold water with mild detergent, do not tumble dry</span></font></div>', 1500.00, 'image/dpc0fiY8xpwgpywafipR.jpg', 'small, large, x, xx', 'Sky Blue', 1, NULL, NULL),
(5, 'Regular Fit Top', 11, 8, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Women\'s Plain Regular Fit Top</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Material: Rayon</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Regular fit</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Long sleeve</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Body Blouse</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Plain</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Hand wash</span></font></div>', 750.00, 'image/DBx9ehXfLGbj3Cx7PCCb.jpg', 'small, large, x, xx', 'Pink', 1, NULL, NULL),
(6, 'Set for Boys', 9, 9, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Kids Ethnic Wear Kurta Pyjama Waistcoat</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Comfortable for Kids</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Hand Picked Selection Kids Ethnic Wear for Boys</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Silk Cotton fabric for the most promising comfort</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sales Package-Kurta, Waistcoat and Breeches</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Ideal for Parties, Functions, Birthday party, Festival, Wedding and occasion</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Size: The product size and measurements might be different from other clothes children normally wear. For best fitting, please take measurements for your child and refer to size chart in the Image before purchase. Feel free to contact us by email if you have any question about size.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">WHAT YOU SEE IS WHAT YOU GET: We strive to make our colors as accurate as possible. There could be a slight variation in the colour shade due to screen brightness</span></font></div>', 3000.00, 'image/Gdb3Ru2dvBlM0Xa4aXbK.jpg', '1-10 yr', 'Gray, Blue, Maroon, Navy blue', 1, NULL, NULL),
(7, 'Samsung Galaxy S 9', 14, 1, 'The Freedom to do more', '<b>Class: </b><span style=\"font-weight: normal;\">Galaxy S</span><div><b>Technology:</b><span style=\"font-weight: normal;\"> Super AMOLED</span></div><div><b>Camera:</b><span style=\"font-weight: normal;\"> 13MP</span></div><div><b>Sim:</b><span style=\"font-weight: normal;\"> Dual Sim</span></div>', 75000.00, 'image/5flmlaouVO8nQ7ZFJH8A.jpg', '5.5\'', 'Blue, Black, Purple', 1, NULL, NULL),
(8, 'Messenger Bag', 12, 10, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Hunter Leather Messenger Bag</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">100% hunter vintage leather: crafted from tough, 100% semi full-grain boot leather, which takes hits well and looks even better with age. Full-grain leather is the top layer of the buffalo skin which is the most expensive and toughest part. The distinguishing feature of this leather is that the leather may have wrinkles, scratches that are inherent characteristics</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Craftmanship, stiches and parts: our products are handmade by professionally skilled craftsmen, because of which the bags have finishing in its class. Brass/ metal fitting buckles and holders are internally lined with strong green canvas make it durable. Every stress point on this bag is double-stitched and riveted or reinforced with hidden nylon strapping</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Perfect fo</span></font></div>', 5000.00, 'image/MgQ7PTWWPvCCLgw1EOZN.jpg', 'Standard', 'Chocolate', 1, NULL, NULL),
(9, 'Apple iPhone XS Max', 14, 2, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The most pricey iPhone release</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Class: Apple iPhone</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Processor: Hexacore</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Network: 2G, 3G, 4G</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">RAM: 4GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">ROM: 128GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Camera: 12+2 MP</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sim: Dual</span></font></div>', 156000.00, 'image/6qQ4zBcWzfCHW2UTlPZR.jpg', '6.5\'', 'Glass back, stainless steel frame', 1, NULL, NULL),
(13, 'Galaxy None9', 14, 1, 'The new Super powerful note', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Class: Galaxy Note9</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Technology: Super Anmold</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Memory: 128 GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Camera: 13 MP</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sim: Dual Sim</span></font></div>', 67500.00, 'image/NHmsSZi6ld05AiTCr5BV.jpg', '6\'', 'Blue, Black, Purple, Red', 1, NULL, NULL),
(14, 'Samsung Galaxy A6+', 14, 1, 'Capture your true Self', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Class: Galaxy A6+</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Technology:&nbsp; Super Amoled</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Memory: 64GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Camera: 16 MP</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sim: Dual Sim</span></font></div>', 33990.00, 'image/ljUK0UiwONrq1Hqa3QQa.png', '6\'', 'Blue, Black, Purple', 1, NULL, NULL),
(16, 'Apple iPhone X', 14, 2, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The smartphone of the future</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Class: iPhone</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Chipset: Apple A11 Bionic</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">RAM: 3GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">ROM: 256 GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Camera: 12+7 MP</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sim: Dual Sim</span></font></div>', 104990.00, 'image/WcIvrLk986T8O1a7LUPz.jpg', '5.8\'', 'Front & back glass, stainless steel frame', 1, NULL, NULL),
(17, 'Apple iPhone 8 Plus', 14, 2, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The legendary features</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Class: iPhone</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Chipset: Apple A11 Bionic</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">RAM: 3GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">ROM: 256 GB</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Camera: 12+7 MP</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sim: Dual Sim</span></font></div>', 94990.00, 'image/WHZkzKLgfw9EpBTs03Fb.jpg', '5.5\'', 'Front & back glass, stainless steel frame', 1, NULL, NULL),
(18, 'Cotton T-Shirt', 6, 4, '<font color=\"#111111\" face=\"Amazon Ember, Arial, sans-serif\"><span style=\"font-size: 19px;\">Seven Rocks Regular Fit Men\'s&nbsp;</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Shop for Polo T Shirts online at best prices in India. Choose from a wide range of T Shirts For Men.</span></font>', 700.00, 'image/uOgJJUNLfVTJG2Ye827w.jpg', 'x-small, small, large, xl, xxl', 'Charcoal Grey-Black', 1, NULL, NULL),
(21, 'Men\'s Cotton Kurtas', 6, 4, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Indus Route by Pantaloons Men\'s</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Fabric: Cotton</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Pattern: Plain / Solid</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Fit: Regular Fit</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Be a trendsetter by wearing this kurta, which has been designed to perfection. Wear it with denims or simple pajamas, compliment the attire by wearing a pair of smart slip-ons.</span></font></div>', 900.00, 'image/ESJ8jEjLSNm4FJ6ImFWe.jpg', 'x-small, small, large, xl, xxl', 'Gray', 1, NULL, NULL),
(23, 'Denim Jeans', 6, 5, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Ben Martin Men\'s Regular Fit</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Style - Casual wear. Material - Denim jeans. Wash care instructions: Do not bleach, dry in shade</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">What you see is what you get: We strive to make our colors as accurate as possible. due to monitor settings, monitor pixel definitions, we cannot guarantee that the colour you see on your screen as an exact colour of the product</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">This men\'s jeans is made with 100 % pre-shrunk and pill-resistant cotton. They are very stretchy. Still perfect fit even after the wash. Disclaimer - Kindly refer to the size chart (also in images) for fitting measurements</span></font></div>', 1250.00, 'image/o4AsrGtnLbC9nHr28vbX.jpg', '28-40', 'Black,Navy-Blue', 1, NULL, NULL),
(24, 'Slim Fit Chinos', 6, 5, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">John Players Men\'s Slim Fit&nbsp;</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">100% Cotton</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Slim fit</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Button fly with button closure</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Machine wash</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Made in Bangladesh</span></font></div>', 1300.00, 'image/fuRnTwI0jmWNjcbwXQOp.jpg', '28-40', 'Black,White,Red, Chocolate', 1, NULL, NULL),
(25, 'Sports Shorts', 8, 6, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Symbol Men\'s Sports</span></font>', '<div style=\"\"><span style=\"font-size: 13.3333px; font-family: Arial, Verdana;\">85% Polyester and 15% spandex</span></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Knitted athletic shorts with elastic waist band</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Regular fit</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Reflective branding detail stand out in low light</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Stretch fabric provides comfort and let you move naturally</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Moisture wicking technology helps to keep you dry and sweat free</span></font></div>', 700.00, 'image/d40BYMFyKhctILMt5Qf9.jpg', '28-40', 'Black', 1, NULL, NULL),
(26, 'Fit Jacket', 8, 6, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Men\'s Solid Regular Fit&nbsp;</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">100% Polyester</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Regular fit</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Long sleeve</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">TRUE</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Solid</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Machine wash</span></font></div>', 3500.00, 'image/ZWQW1ZRUkA9mtLIlW4nD.jpg', 'x-small, small, large, xl, xxl', 'Black', 1, NULL, NULL),
(28, 'Cotton Kurta', 7, 3, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Women\'s Cotton Kurta with Palazzo Pant Set</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The model (height 5\'7 inch) is wearing a size small ( 36). So choose perfect size before you get it</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Care instructions: -machine wash with like colours, low warm iron if needed</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Care instructions: -machine wash with like colours, low warm iron if needed</span></font></div>', 1800.00, 'image/g9xthsjJmKplWGdsp8dk.jpg', 'small, large, x, xx', 'Black', 1, NULL, NULL),
(29, 'Silk Western Gown', 7, 3, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Women\'s Jequard Silk Western Gown</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Fabric- Jacquard fabric Bottom Lehenga- Banglori Dupatta- Siffon</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Item Length: top length-46 inches, Bottom Lehenga-2 meter Flair, Dupatta- 2 meter</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">PartWear &amp; Casual Wear Premium quality &amp; Fancy look.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Gown is Semi Stitched and Sleeveless. Maximum you can adjust this dress upto 42 inch from Bust.</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Colour May Varies Due to Brightness of Your mobile Screen or Desktop Screen</span></font></div>', 4500.00, 'image/7k1clNZ1vxmajVJ3UeiM.jpg', 'small, large, x, xx', 'Red', 1, NULL, NULL),
(30, 'Women\'s Art Mysore', 7, 7, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Silk Saree With Blouse Piece&nbsp;</span></font>', '<ul class=\"a-unordered-list a-vertical a-spacing-none\" style=\"box-sizing: border-box; margin: 0px 0px 0px 18px; color: rgb(148, 148, 148); padding: 0px; font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\"><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); overflow-wrap: break-word; display: block;\">Saree Fabric : Mysore Silk, Blouse Fabric : Mysore Silk</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); overflow-wrap: break-word; display: block;\">Saree Color : Bloody Red</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); overflow-wrap: break-word; display: block;\">Saree length: 5.50 Mtr, Blouse Length : 0.80 Mtr</span></li><li style=\"box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\" style=\"box-sizing: border-box; color: rgb(17, 17, 17); overflow-wrap: break-word; display: block;\">Product colour may slightly vary due to photographic lighting sources on your monitor settings</span></li></ul>', 6000.00, 'image/g4E9T4sxMEOccnOVsIv2.jpg', '5.50mtr', 'Bloody Red', 1, NULL, NULL),
(31, 'Georgette Saree', 7, 7, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">&nbsp;Georgette Saree with Blouse Piece&nbsp;</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">50% Georgette and 50% dani</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">With blouse piece</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Machine wash</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">6 yards</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The color may vary due to screen setting</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Product is sold by Anand Sarees, one of the old manufacturing company of Surat, Anand Sarees offers the product at best quality because they do the end to end process to manufacture a saree, their belief is to provide, value for the product, customer satisfaction is the utmost priority of this compan</span></font></div>', 7200.00, 'image/9cuL9dQelFrBfNO61NdD.jpg', '5.50mtr', 'Multicoloured', 1, NULL, NULL),
(34, 'Women\'s Top', 11, 8, '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">White Women\'s Top</span></font>', '<div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Brand: Harpa</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Pattern:- Floral Print</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Color:- White</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Sleeve Length:- 3/4Th Sleeves</span></font></div><div style=\"\"><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Category:- Top</span></font></div>', 2000.00, 'image/Un52ad4kXzgjsUn4EFkX.jpg', 'small, large, x, xx', 'White', 1, NULL, NULL),
(35, '<b> name</b>', 11, 1, 'jjjjj<span style=\"white-space:pre\">	</span>', 'jjh', 575.00, 'image/NKFR97ehReMNFrPzRM7c.png', '45', 'ugn', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewer_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `product_id`, `reviewer_name`, `reviewer_feedback`, `created_at`, `updated_at`) VALUES
(2, 1, 'Shaan', 'I like this Product most', NULL, NULL),
(12, 3, 'Shaan', 'This is beautiful', NULL, NULL),
(13, 1, 'Synthiya', 'This is very good', NULL, NULL),
(14, 1, 'Synthiya', 'I love this', '2018-12-12 07:55:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `customer_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_mobile_number`, `shipping_city`, `created_at`, `updated_at`) VALUES
(20, 2, 'shaan@gmail.com', 'Shaan', 'Evan', 'uttara, dhaka', '01814766106', 'Dhaka', NULL, NULL),
(21, 3, 'supti@gmail.com', 'Supti', 'Evan', 'uttara, dhaka', '01814766106', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 'slider/S99RYeDyNDm9bNyN654F.jpg', 1, NULL, NULL),
(5, 'slider/ad9Ucr9qO7B8jt4Gd7zV.jpg', 1, NULL, NULL),
(6, 'slider/3MasF9f1JYlA5JrEF0XS.jpg', 1, NULL, NULL),
(8, 'slider/2RQWkyhgA9OQtaPSgQVY.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `subscribe_id` int(10) UNSIGNED NOT NULL,
  `subscriber_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`subscribe_id`, `subscriber_email`, `created_at`, `updated_at`) VALUES
(1, 'jewel@gmail.com', NULL, NULL),
(2, 'ab@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viewer`
--

CREATE TABLE `tbl_viewer` (
  `viewer_id` int(10) UNSIGNED NOT NULL,
  `viewer_number` int(200) NOT NULL,
  `notification` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_viewer`
--

INSERT INTO `tbl_viewer` (`viewer_id`, `viewer_number`, `notification`, `created_at`, `updated_at`) VALUES
(1, 501, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 2, 5, NULL, NULL),
(7, 2, 1, NULL, NULL),
(8, 2, 18, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bkash`
--
ALTER TABLE `tbl_bkash`
  ADD PRIMARY KEY (`bkash_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `tbl_viewer`
--
ALTER TABLE `tbl_viewer`
  ADD PRIMARY KEY (`viewer_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bkash`
--
ALTER TABLE `tbl_bkash`
  MODIFY `bkash_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  MODIFY `manager_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `subscribe_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
