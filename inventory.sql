-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2023 at 06:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `agros`
--

CREATE TABLE `agros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agros`
--

INSERT INTO `agros` (`id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 'upload/agro/75237535_428115274754821_5994352818415206400_n.jpg', '2023-08-09 00:13:31', NULL),
(2, 'upload/agro/75237535_428115274754821_5994352818415206400_n.jpg', '2023-08-09 00:17:54', NULL),
(3, 'upload/agro/fresh.jpg', '2023-08-09 00:18:10', NULL),
(4, 'upload/agro/fresh.jpg', '2023-08-09 00:18:51', NULL),
(5, 'upload/agro/340496114_890548162008641_2085912690934259212_n.jpg', '2023-08-09 00:19:17', NULL),
(6, 'upload/agro/340496114_890548162008641_2085912690934259212_n.jpg', '2023-08-09 00:19:24', NULL),
(7, 'upload/agro/fresh.jpg', '2023-08-09 00:25:57', NULL),
(8, 'upload/agro/67669307_2271994813116571_6365028798370414592_o.jpg', '2023-08-09 00:29:26', NULL),
(9, 'upload/agro/fresh.jpg', '2023-08-09 00:35:38', NULL),
(10, 'upload/agro/IMG20211121204101.jpg', '2023-08-09 00:38:27', NULL),
(11, 'upload/agro/fresh.jpg', '2023-08-09 00:49:14', NULL),
(12, 'upload/agro/fresh.jpg', '2023-08-09 00:51:54', NULL),
(13, 'upload/agro/fresh.jpg', '2023-08-13 03:35:04', NULL),
(14, 'upload/agro/fresh.jpg', '2023-08-13 03:41:42', NULL),
(15, 'upload/agro/fresh.jpg', '2023-08-13 03:44:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `api_models`
--

CREATE TABLE `api_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_confidence` double(8,2) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_models`
--

INSERT INTO `api_models` (`id`, `d_name`, `d_confidence`, `created_at`, `updated_at`) VALUES
(1, 'Healthy', 1.00, '2023-08-13 00:23:12', '2023-08-13 00:23:12'),
(2, 'Healthy', 1.00, NULL, NULL),
(3, 'Healthy', 1.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Drinks', 1, 6, NULL, '2023-05-06 13:32:42', NULL),
(3, 'Groceries', 1, 6, NULL, '2023-05-06 13:32:53', NULL),
(4, 'Electronics', 1, 6, NULL, '2023-05-10 09:33:30', NULL),
(5, 'Steel', 1, 6, NULL, '2023-05-10 09:43:57', NULL),
(6, 'Bevarage', 1, 6, NULL, '2023-05-10 09:44:14', NULL),
(7, 'Color', 1, 6, NULL, '2023-05-10 09:44:26', NULL),
(8, 'Home Appliance', 1, 6, NULL, '2023-05-10 09:44:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `customer_image`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Jaman', 'upload/customer/1764939617151022.png', '01524585745', 'jaman@mailinator.com', 'India', 1, 6, 6, '2023-05-03 22:46:05', '2023-05-03 23:19:42'),
(2, 'Rakib', 'upload/customer/1764937793132867.jpg', '01885795785', 'rakib@mailinator.com', 'Bangladesh', 1, 6, 6, '2023-05-03 22:50:43', '2023-05-03 23:17:26'),
(4, 'Shakib', 'upload/customer/1765173032304444.jpg', '5364545458245', 'hisamizik@mailinator.com', 'Sylhet', 1, 6, 6, '2023-05-06 13:09:45', '2023-05-10 09:48:25'),
(5, 'Rana', 'upload/customer/1765522376668673.jpg', '01758645852', 'rana@gmail.com', 'Netrokona', 1, 6, NULL, '2023-05-10 09:42:26', NULL),
(6, 'Niloy', 'upload/customer/1765522411372803.jpg', '024547584', 'niloy@gmail.com', 'Narshingdi', 1, 6, NULL, '2023-05-10 09:42:58', NULL);

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending , 1 = approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, '1', '2023-06-15', '2 Added at a time.', 1, 6, 6, '2023-06-15 12:39:10', '2023-06-20 06:59:54'),
(8, '2', '2023-06-15', 'Ricecooker added', 1, 6, 6, '2023-06-15 12:41:01', '2023-06-22 11:16:00'),
(10, '4', '2023-06-20', 'Perfect', 1, 6, 6, '2023-06-20 06:49:53', '2023-06-20 06:59:13'),
(11, '5', '2023-06-20', 'Sell', 1, 6, 6, '2023-06-20 07:03:19', '2023-06-20 07:03:32'),
(12, '6', '2023-07-21', 'New Rice Cooker Added', 1, 6, 6, '2023-07-21 02:26:43', '2023-07-21 21:32:17'),
(13, '7', '2023-07-26', NULL, 1, 6, 6, '2023-07-25 22:12:22', '2023-07-25 22:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `selling_qty` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `selling_price` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `category_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(5, '2023-06-14', 6, 2, 5, 20, 10, 200, 1, '2023-06-14 13:13:38', '2023-06-14 13:13:38'),
(6, '2023-06-15', 7, 2, 5, 50, 20, 1000, 1, '2023-06-15 12:39:10', '2023-06-15 12:39:10'),
(7, '2023-06-15', 7, 5, 4, 600, 20, 12000, 1, '2023-06-15 12:39:10', '2023-06-15 12:39:10'),
(8, '2023-06-15', 8, 4, 7, 1500, 20, 30000, 1, '2023-06-15 12:41:01', '2023-06-15 12:41:01'),
(9, '2023-06-20', 9, 2, 5, 80, 20, 1600, 1, '2023-06-20 06:48:30', '2023-06-20 06:48:30'),
(10, '2023-06-20', 10, 2, 5, 10, 20, 200, 1, '2023-06-20 06:49:53', '2023-06-20 06:49:53'),
(11, '2023-06-20', 11, 4, 8, 34, 7000, 238000, 1, '2023-06-20 07:03:19', '2023-06-20 07:03:19'),
(12, '2023-07-21', 12, 4, 7, 20, 1700, 34000, 1, '2023-07-21 02:26:43', '2023-07-21 02:26:43'),
(13, '2023-07-26', 13, 6, 6, 50, 30, 1500, 1, '2023-07-25 22:12:22', '2023-07-25 22:12:29');

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
(5, '2023_03_14_104809_create_suppliers_table', 2),
(6, '2023_04_06_083041_create_customers_table', 3),
(7, '2023_05_06_183915_create_units_table', 4),
(8, '2023_05_06_191453_create_categories_table', 5),
(9, '2023_05_09_161123_create_products_table', 6),
(10, '2023_05_14_105510_create_purchases_table', 7),
(11, '2023_06_08_065113_create_invoices_table', 8),
(12, '2023_06_08_065216_create_invoice_details_table', 8),
(13, '2023_06_08_065239_create_payments_table', 8),
(14, '2023_06_08_065301_create_payment_details_table', 8),
(15, '2023_08_06_150634_create_agros_table', 9),
(16, '2023_08_13_050330_create_api_models_table', 10);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `total_amount`, `discount_amount`, `created_at`, `updated_at`) VALUES
(6, 8, 6, 'full_paid', 29800, 0, 29800, 200, '2023-06-15 12:41:01', '2023-06-15 12:41:01'),
(8, 10, 4, 'partial_paid', 95, 100, 195, 5, '2023-06-20 06:49:53', '2023-07-26 05:59:50'),
(9, 11, 5, 'full_paid', 237900, 0, 237900, 100, '2023-06-20 07:03:19', '2023-06-20 07:03:19'),
(10, 12, 1, 'full_paid', 33500, 0, 33500, 500, '2023-07-21 02:26:43', '2023-07-26 06:01:26'),
(11, 7, 4, 'full_paid', 120, NULL, 120, 0, NULL, NULL),
(12, 13, 1, 'full_paid', 1490, 0, 1490, 10, '2023-07-25 22:12:22', '2023-07-25 22:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 6, 50, '2023-06-14', NULL, '2023-06-14 13:13:38', '2023-06-14 13:13:38'),
(5, 7, 12800, '2023-06-15', NULL, '2023-06-15 12:39:10', '2023-06-15 12:39:10'),
(6, 8, 29800, '2023-06-15', NULL, '2023-06-15 12:41:01', '2023-06-15 12:41:01'),
(7, 9, 1558, '2023-06-20', NULL, '2023-06-20 06:48:30', '2023-06-20 06:48:30'),
(8, 10, 195, '2023-06-20', NULL, '2023-06-20 06:49:53', '2023-06-20 06:49:53'),
(9, 11, 237900, '2023-06-20', NULL, '2023-06-20 07:03:19', '2023-06-20 07:03:19'),
(10, 12, 20000, '2023-07-21', NULL, '2023-07-21 02:26:43', '2023-07-21 02:26:43'),
(11, 13, 1490, '2023-07-26', NULL, '2023-07-25 22:12:22', '2023-07-25 22:12:22'),
(12, 10, 10, '2023-07-26', 6, '2023-07-26 05:59:28', '2023-07-26 05:59:28'),
(13, 10, 85, '2023-07-26', 6, '2023-07-26 05:59:50', '2023-07-26 05:59:50'),
(14, 12, 13500, '2023-07-26', 6, '2023-07-26 06:01:26', '2023-07-26 06:01:26');

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
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `unit_id`, `category_id`, `name`, `quantity`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 7, 5, 2, 'Pran Juice Mini', 0, 1, 6, NULL, '2023-05-10 09:47:21', '2023-06-20 06:59:54'),
(6, 8, 5, 6, 'Royal Tiger Energy Drinks', 250, 1, 6, 6, '2023-05-10 09:47:48', '2023-07-25 22:12:29'),
(7, 2, 7, 4, 'Rice Cooker', 100, 1, 6, NULL, '2023-05-14 06:45:34', '2023-07-21 21:32:17'),
(8, 9, 7, 4, 'Symphony ZVI', 21, 1, 6, NULL, '2023-05-14 06:46:00', '2023-07-25 22:39:51'),
(9, 6, 3, 5, 'Heavy Steel', 0, 1, 6, NULL, '2023-07-24 03:11:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = pending , 1 = approved',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `category_id`, `product_id`, `purchase_no`, `date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 8, 6, 6, 'ENV-04', '2022-04-29', 'Tiger', 200, 25, 5000, 1, 6, NULL, '2023-05-23 00:38:32', '2023-05-23 00:58:39'),
(8, 9, 4, 8, 'eaPro01', '2023-05-23', 'Mobile', 15, 15000, 225000, 1, 6, NULL, '2023-05-23 01:17:47', '2023-06-15 12:40:16'),
(10, 7, 2, 5, 'eaPro3', '2023-05-23', 'Juice', 60, 25, 1500, 1, 6, NULL, '2023-05-23 01:17:47', '2023-06-11 09:01:10'),
(11, 8, 6, 6, 'eaPro4', '2023-05-23', 'Drink', 100, 30, 3000, 1, 6, NULL, '2023-05-23 01:17:47', '2023-06-15 12:40:00'),
(14, 9, 4, 8, 'demo', '2023-07-26', 'demo', 20, 1500, 30000, 1, 6, NULL, '2023-07-25 22:39:42', '2023-07-25 22:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Walton', '858546', 'walton@gmail.com', 'Gorai,Tangail', 1, 6, NULL, '2023-03-29 01:15:46', NULL),
(6, 'KSRM', '8824547552', 'ksrm@gmail.com', 'Narayanganj', 1, 6, NULL, '2023-05-10 09:39:27', NULL),
(7, 'Pran RFL', '88575485488', 'pranrfl@gmail.com', 'Mymenshingh', 1, 6, NULL, '2023-05-10 09:40:03', NULL),
(8, 'Akij Food', '8856754415', 'akij@gmail.com', 'Dhaka', 1, 6, NULL, '2023-05-10 09:40:38', NULL),
(9, 'Symphony', '85758544', 'symphony@gmail.com', 'Sidstore', 1, 6, NULL, '2023-05-10 09:41:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'LITRE', 1, 6, 6, '2023-05-06 12:59:42', '2023-05-06 13:09:08'),
(3, 'KG', 1, 6, 6, '2023-05-06 13:05:26', '2023-05-06 13:08:57'),
(5, 'DOZEN', 1, 6, NULL, '2023-05-10 09:43:15', NULL),
(7, 'PCS', 1, 6, NULL, '2023-05-10 09:43:38', NULL);

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
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '2022-03-09 17:16:01', '$2y$10$rGET1JC4RHIml.EboWuABOxzgNGUB9EQZLTQsjOf2NkkKiOKlCEOi', 'user', '202203112055download.jpg', 'AEe7IjaEFf1qlITAqy3Ehgh0KQKtWPb7AFtyXynJ7IECGEaNKLlcXczBWYsS', '2022-03-09 16:27:03', '2022-03-11 15:08:45'),
(2, 'Kazi', 'kazi@gmail.com', '2022-03-09 17:14:32', '$2y$10$cdhHGJTOuPvl5jIlTKInWuk57U0fOnWuTpX8S4IU47H1jOYiMTa4C', 'kazi', '202203112033ariyan.jpg', NULL, '2022-03-09 17:12:44', '2022-03-11 15:57:21'),
(4, 'Demo', 'demo@gmail.com', '2022-03-09 17:54:03', '$2y$10$Ne1R842eJJw7VpVZ.jv31ulN12pHgAVKvx9JiB1nNfABYU/EwbvVy', 'demo', NULL, NULL, '2022-03-09 17:53:48', '2022-03-09 17:54:03'),
(5, 'TEST', 'test@gmail.com', '2022-03-10 14:14:10', '$2y$10$6pvyEf0zI1lnLrZLA8f2sO36IaTsRJizUrpT9Tp1IrZKRlZlCAYEO', 'test', NULL, NULL, '2022-03-10 13:52:07', '2022-03-10 14:14:10'),
(6, 'Rakib', 'admin@gmail.com', NULL, '$2y$10$yx8ykFh7IB1XhMM6pcpETu9zZfY/TjpbrIU46XRY1TtZn3kRKBX7S', 'admin', '20230723060267669307_2271994813116571_6365028798370414592_o.jpg', NULL, '2023-03-14 04:30:24', '2023-07-23 00:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agros`
--
ALTER TABLE `agros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_models`
--
ALTER TABLE `api_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agros`
--
ALTER TABLE `agros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `api_models`
--
ALTER TABLE `api_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
