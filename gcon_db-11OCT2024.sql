-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 09:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorized_byes`
--

CREATE TABLE `authorized_byes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `authorized_by` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorized_byes`
--

INSERT INTO `authorized_byes` (`id`, `authorized_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khun Chao', 1, NULL, '2024-09-17 21:15:05'),
(2, 'Owner', 1, NULL, '2024-07-18 00:26:10'),
(3, 'Srichai B', 1, NULL, NULL),
(4, 'self', 1, NULL, NULL),
(5, 'HR Department', 1, NULL, NULL),
(6, 'IT Department', 1, NULL, NULL),
(7, 'Construction Department', 1, NULL, NULL),
(8, 'Maintenance Department', 1, NULL, NULL),
(9, 'Marketing Team', 1, NULL, NULL),
(10, 'Security Team', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookingtables`
--

CREATE TABLE `bookingtables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GBooking_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `tbl_img` varchar(255) DEFAULT NULL,
  `tbl_img_url` varchar(255) DEFAULT NULL,
  `tbl_price` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `tbl_status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteStatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtables`
--

INSERT INTO `bookingtables` (`id`, `GBooking_id`, `cat_id`, `tbl_img`, `tbl_img_url`, `tbl_price`, `currency`, `currency_symbol`, `discount`, `orderby`, `tbl_status`, `deleteStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'images/concertTable/tzlbHEIesxiRPsbRwSXKI3mvfDN1Ya-metac21hbGwuanBn-.jpg', NULL, '300', '3', '฿', '9', 0, 1, 0, '2024-03-26 08:13:50', '2024-10-03 21:53:45'),
(2, 1, 2, 'images/concertTable/3NhJziOgyTXBqzr7qxksnk3ZjSYnA1-metac21hbGwyLmpwZw==-.jpg', NULL, '500', '3', '฿', '9', 1, 1, 0, '2024-03-26 08:13:50', '2024-10-03 21:46:14'),
(4, 1, 5, 'images/concertTable/CFeF9p4LjiLRLFTKy8xWF4xSguY3Sb-metaYmlnMS5qcGc=-.jpg', NULL, '700', '3', NULL, '5', 2, 1, 0, NULL, '2024-05-06 00:39:58'),
(5, 1, 6, 'images/concertTable/ggoi4pb5cmoW8tZ3nykvFrpBl8fauF-metadmlwMS5qcGc=-.jpg', NULL, '1000', '3', '฿', '5', 3, 1, 0, NULL, '2024-10-04 00:03:25'),
(6, 1, 6, 'images/concertTable/VA5FTNZnLghLQ8DPlFh9uFf0IrRjlo-metacGhvdG9fMjAyNC0wMi0yNl8xMy00MC0yMi5qcGc=-.jpg', NULL, '1000', '3', NULL, '10', 1, 1, 0, '2024-04-26 23:35:03', '2024-05-06 01:59:36'),
(7, 1, 6, 'images/concertTable/01HYJDJ49VYPVDS2AZM91V511Y.jpg', NULL, '100', '1', '฿', '6', 7, 1, 0, '2024-04-26 23:43:01', '2024-10-03 23:58:13'),
(33, 1, 8, 'images/concertTable/01J9B9H2ZTTFBCAAHKSGXP8KVF.jpg', NULL, '10', '3', NULL, '1', 4, 0, 0, '2024-10-04 01:14:50', '2024-10-04 01:14:50'),
(34, 1, 8, 'images/concertTable/01J9B9KHBRNA2BKQ8DM56G1D54.jpg', NULL, '10', '3', NULL, '1', 4, 0, 0, '2024-10-04 01:16:11', '2024-10-04 01:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable_translations`
--

CREATE TABLE `bookingtable_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookingtable_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `tbl_name` varchar(255) DEFAULT NULL,
  `tbl_title` varchar(255) DEFAULT NULL,
  `tbl_address` varchar(255) DEFAULT NULL,
  `tbl_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtable_translations`
--

INSERT INTO `bookingtable_translations` (`id`, `bookingtable_id`, `language_id`, `tbl_name`, `tbl_title`, `tbl_address`, `tbl_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'small table', '4 people can sit comfortable', 'beach bar beer city', 'Good table for drink and enjoy', '2024-03-27 08:15:16', '2024-03-28 08:15:16'),
(2, 1, 2, 'small table', '4 people can sit comfortable', 'beach bar beer city', '', '2024-03-27 08:15:16', '2024-03-28 08:15:16'),
(3, 1, 3, NULL, NULL, 'beach bar beer city', NULL, NULL, NULL),
(4, 2, 1, 'middle table', '4', 'beach bar beer city', 'Good table for drink and enjoy', NULL, NULL),
(5, 2, 2, NULL, NULL, 'beach bar beer city', NULL, NULL, NULL),
(6, 2, 3, NULL, NULL, 'beach bar beer city', NULL, NULL, NULL),
(8, 4, 1, 'Big table', '8', 'beach bar beer city', 'Looking like family table', NULL, NULL),
(9, 4, 2, '', '8', NULL, NULL, NULL, NULL),
(10, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 5, 1, 'VIP table', '10', 'beach bar beer city', 'Grand table at the top of the beach', NULL, NULL),
(12, 5, 2, 'nam thai', 'dgdfg', NULL, NULL, '2024-04-27 01:21:11', '2024-04-27 01:21:11'),
(14, 6, 1, 'popular  table', '3', 'beer city zone 3', 'near beach bar', '2024-06-04 03:59:23', '2024-06-04 04:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `car_banners`
--

CREATE TABLE `car_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GBooking_id` bigint(20) UNSIGNED NOT NULL,
  `banner_img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_banners`
--

INSERT INTO `car_banners` (`id`, `GBooking_id`, `banner_img`, `title`, `desc`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'images/carwash//01J9R1PTV9M6W9RHSBN1YBE8DD.jpg', NULL, NULL, 1, 1, '2024-10-08 23:43:21', '2024-10-09 04:01:30'),
(2, 5, 'images/carwash//01J9R1P9N2N7JZKWMN40JSME8Y.jpg', NULL, NULL, 2, 1, '2024-10-09 00:08:00', '2024-10-09 00:08:00'),
(3, 5, 'images/carwash//01J9RAG9N0C3T0Z0S4J91P4T5W.jpg', NULL, NULL, 3, 1, '2024-10-09 02:42:01', '2024-10-09 02:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `concert_tbl_transactions`
--

CREATE TABLE `concert_tbl_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `GBooking_id` varchar(255) DEFAULT NULL,
  `cat_id` varchar(255) DEFAULT NULL,
  `tableId` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `response_all` longtext DEFAULT NULL,
  `receipt_url` longtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `no_of_people` varchar(255) DEFAULT NULL,
  `preferredSeats` varchar(255) DEFAULT NULL,
  `paymentType` varchar(255) DEFAULT NULL,
  `concert_booking_date` varchar(255) DEFAULT NULL,
  `concert_arrival_time` varchar(255) DEFAULT NULL,
  `future_payment_custId` varchar(255) DEFAULT NULL,
  `payment_timezone` varchar(255) DEFAULT NULL,
  `payment_time` varchar(255) DEFAULT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `cancelStatus` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concert_tbl_transactions`
--

INSERT INTO `concert_tbl_transactions` (`id`, `user_id`, `GBooking_id`, `cat_id`, `tableId`, `transaction_id`, `quantity`, `total_amount`, `currency`, `currency_symbol`, `response_all`, `receipt_url`, `message`, `name`, `phone`, `email`, `address`, `no_of_people`, `preferredSeats`, `paymentType`, `concert_booking_date`, `concert_arrival_time`, `future_payment_custId`, `payment_timezone`, `payment_time`, `gateway_name`, `status`, `cancelStatus`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '2', '2', 'ch_3PNRSlKyHXidWMBJ20T3k15m', '1', '500', 'THB', '฿', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PNRSlKyHXidWMBJ20T3k15m\",\n    \"object\": \"charge\",\n    \"amount\": 50000,\n    \"amount_captured\": 50000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PNRSlKyHXidWMBJ2mcmHS8y\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1717384895,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 15,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PNRShKyHXidWMBJyCyvhBrw\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 50000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 50000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKMDt9LIGMgYfpTwLxdU6LBblbhC1PGZz3TIwkq_kS3DLxZtXUm_jaWZC-RJ3XquW3B19kdZ-WOSIgWJ1\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PNRShKyHXidWMBJyCyvhBrw\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKMDt9LIGMgYfpTwLxdU6LBblbhC1PGZz3TIwkq_kS3DLxZtXUm_jaWZC-RJ3XquW3B19kdZ-WOSIgWJ1', 'Donation with Striipe', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'Birthday surprise', 'online', '2024-06-13', '03:00 PM', NULL, 'Asia/Bangkok', '2024-06-03 10:21:36', 'Stripe', 'success', '0', '2024-06-03 03:21:16', '2024-06-03 03:21:36'),
(3, '2', '1', '5', '4', NULL, '1', '700', 'THB', '฿', NULL, NULL, NULL, 'sk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'Birthday surprise', 'online', '2024-06-14', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '0', '2024-06-03 22:32:36', '2024-06-04 10:32:36'),
(4, '2', '1', '6', '6', 'PAYID-MZPPBDQ2YE57713K2335060R', '1', '1000', 'THB', '฿', '{\"id\":\"PAYID-MZPPBDQ2YE57713K2335060R\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"0LJ04957U2604582U\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"2U521062AN989384R\",\"state\":\"completed\",\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"49.90\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"25.10\",\"currency\":\"USD\"},\"exchange_rate\":\"0.026415605526957\",\"parent_payment\":\"PAYID-MZPPBDQ2YE57713K2335060R\",\"create_time\":\"2024-06-04T10:46:56Z\",\"update_time\":\"2024-06-04T10:46:56Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/2U521062AN989384R\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/2U521062AN989384R\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MZPPBDQ2YE57713K2335060R\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-06-04T10:46:38Z\",\"update_time\":\"2024-06-04T10:46:56Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MZPPBDQ2YE57713K2335060R\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-0LJ04957U2604582U', 'Donation with Paypal', 'gfjh', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'Other', 'online', '2024-06-04', '02:30 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-06-04 17:47:00', 'Paypal', 'success', '0', '2024-06-03 22:43:49', '2024-06-06 01:32:41'),
(5, '2', '1', '5', '4', 'ch_3PNvARKyHXidWMBJ0czk9Dxp', '1', '700', 'THB', '฿', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PNvARKyHXidWMBJ0czk9Dxp\",\n    \"object\": \"charge\",\n    \"amount\": 70000,\n    \"amount_captured\": 70000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PNvARKyHXidWMBJ0M1L0wre\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1717499079,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 62,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PNvANKyHXidWMBJAuOAKcUs\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 70000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 70000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKMfp-7IGMgbzjFAfqhs6LBbgJCnhrR4OG976bE_uovJKssTzQQ9UFqH5UG2uyNj-sVybtNCFgMvs-OLa\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PNvANKyHXidWMBJAuOAKcUs\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKMfp-7IGMgbzjFAfqhs6LBbgJCnhrR4OG976bE_uovJKssTzQQ9UFqH5UG2uyNj-sVybtNCFgMvs-OLa', 'Donation with Striipe', 'hj', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '6', 'Other', 'online', '2024-06-04', '02:30 PM', NULL, 'Asia/Bangkok', '2024-06-04 18:04:42', 'Stripe', 'success', '0', '2024-06-03 23:04:21', '2024-06-06 01:19:03'),
(6, '2', '1', '6', '5', NULL, '1', '1000', 'THB', '฿', NULL, NULL, NULL, 'hj', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '6', 'Birthday surprise', 'cash on delivery', '2024-06-21', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '1', '2024-06-03 23:06:30', '2024-06-06 03:19:03'),
(7, '2', '1', '2', '2', NULL, '1', '500', 'THB', '฿', NULL, NULL, NULL, 'bhjmbhh', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '8', 'Other', 'online', '2024-06-13', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '1', '2024-06-03 23:08:26', '2024-06-06 03:19:39'),
(8, '3', '1', '1', '1', 'ch_3PSrzaKyHXidWMBJ0VIDzLpa', '1', '300', 'THB', '฿', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PSrzaKyHXidWMBJ0VIDzLpa\",\n    \"object\": \"charge\",\n    \"amount\": 30000,\n    \"amount_captured\": 30000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PSrzaKyHXidWMBJ0qkTXAvH\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1718678514,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 55,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PSrzWKyHXidWMBJ3bzFjBtp\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 30000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 30000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPLnw7MGMgY1PqvHSOI6LBZk7MuAtyPki3XXPCie_B08_SkgxFRtfAn5E599762XjtR0SItPzsx8aoNk\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PSrzWKyHXidWMBJ3bzFjBtp\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPLnw7MGMgY1PqvHSOI6LBZk7MuAtyPki3XXPCie_B08_SkgxFRtfAn5E599762XjtR0SItPzsx8aoNk', 'Donation with Striipe', 'dk', '7234567890', 'gold631@gmail.com', '25A Alpha', '2', 'Other', 'online', '2024-06-18', '03:00 PM', NULL, 'Asia/Bangkok', '2024-06-18 09:41:55', 'Stripe', 'success', '0', '2024-06-18 02:41:29', '2024-06-18 02:41:55'),
(9, '3', '1', '1', '1', 'PAYID-M2NVXBI53U99450KY0454457', '1', '300', 'THB', '฿', '{\"id\":\"PAYID-M2NVXBI53U99450KY0454457\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"6FF72280RV802205A\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"300.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"300.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"5AK41443RU359544P\",\"state\":\"completed\",\"amount\":{\"total\":\"300.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"300.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"25.47\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"7.38\",\"currency\":\"USD\"},\"exchange_rate\":\"0.026892100617829\",\"parent_payment\":\"PAYID-M2NVXBI53U99450KY0454457\",\"create_time\":\"2024-07-20T06:39:17Z\",\"update_time\":\"2024-07-20T06:39:17Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/5AK41443RU359544P\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/5AK41443RU359544P\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M2NVXBI53U99450KY0454457\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-07-20T06:39:01Z\",\"update_time\":\"2024-07-20T06:39:17Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M2NVXBI53U99450KY0454457\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-6FF72280RV802205A', 'Donation with Paypal', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'Other', 'online', '2024-07-20', '05:30 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-07-20 13:39:19', 'Paypal', 'success', '0', '2024-07-19 18:38:52', '2024-07-20 06:39:19'),
(10, '3', '1', '2', '2', 'ch_3PeWyGKyHXidWMBJ1hPz1uDa', '1', '500', 'THB', '฿', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PeWyGKyHXidWMBJ1hPz1uDa\",\n    \"object\": \"charge\",\n    \"amount\": 50000,\n    \"amount_captured\": 50000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PeWyGKyHXidWMBJ1gBn4YTX\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1721457644,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 5,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PeWyCKyHXidWMBJ1OenwJNc\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 50000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 50000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKOy37bQGMgb5vNid0FE6LBY8_VOCoskGBiSXpCrqhN_Un6PI3ugvfXg9_zmVHPel6uaD3ZFw5YRHkrvS\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PeWyCKyHXidWMBJ1OenwJNc\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKOy37bQGMgb5vNid0FE6LBY8_VOCoskGBiSXpCrqhN_Un6PI3ugvfXg9_zmVHPel6uaD3ZFw5YRHkrvS', 'Donation with Striipe', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'Other', 'online', '2024-07-31', '08:30 PM', NULL, 'Asia/Bangkok', '2024-07-20 13:40:46', 'Stripe', 'success', '0', '2024-07-19 18:40:27', '2024-07-20 06:40:46'),
(11, '4', '1', '6', '5', NULL, '1', '1000', 'THB', '฿', NULL, NULL, NULL, 'srichaiB', '7234567890', 'scrichaiB@gmail.com', '25A Alpha', '2', 'Other', 'cash on delivery', '2024-07-25', '08:00 PM', NULL, NULL, NULL, NULL, 'pending', '1', '2024-07-22 04:19:58', '2024-09-19 04:12:54'),
(12, '1', '1', '1', '1', 'PAYID-M3CVX6Y5U917235HW512264E', '1', '300', 'THB', '฿', '{\"id\":\"PAYID-M3CVX6Y5U917235HW512264E\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"9GT07804D2963281B\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"300.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"300.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"0AH25143DS432540C\",\"state\":\"completed\",\"amount\":{\"total\":\"300.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"300.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"25.47\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"7.61\",\"currency\":\"USD\"},\"exchange_rate\":\"0.027715398391086\",\"parent_payment\":\"PAYID-M3CVX6Y5U917235HW512264E\",\"create_time\":\"2024-08-21T03:16:26Z\",\"update_time\":\"2024-08-21T03:16:26Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0AH25143DS432540C\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0AH25143DS432540C\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3CVX6Y5U917235HW512264E\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-08-21T03:16:11Z\",\"update_time\":\"2024-08-21T03:16:26Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3CVX6Y5U917235HW512264E\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-9GT07804D2963281B', 'Donation with Paypal', 'dkkkk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'Other', 'online', '2024-08-21', '02:00 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-08-21 10:16:28', 'Paypal', 'success', '0', '2024-08-21 03:15:59', '2024-08-21 03:16:28'),
(13, '1', '1', '6', '6', NULL, '1', '1000', 'THB', '฿', NULL, NULL, NULL, 'hfhfg', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'Other', 'cash on delivery', '2024-08-29', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '0', '2024-08-21 03:35:02', '2024-08-21 03:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `mobile_country_code` varchar(255) DEFAULT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `curency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `mobile_country_code`, `currency_name`, `curency_code`, `currency_symbol`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'United States', 'US', '+1', 'United States Dollars', 'USD', '$', '0', '1', '2024-05-11 06:50:12', '2024-05-11 06:50:12'),
(2, 'Thailand', 'TH', '+66', 'Thai Baht', 'THB', '฿', '1', '1', '2024-05-11 06:50:12', '2024-05-11 06:50:12'),
(3, 'India', 'IN', '+91', 'Indian Rupee', 'INR', '₹', '2', '1', '2024-05-11 06:51:12', '2024-05-11 06:51:12'),
(4, 'Cambodia', 'KH', '+855', 'Cambodian Riel', 'KHR', '៛', '3', '1', '2024-05-11 06:51:12', '2024-05-11 06:51:12'),
(5, 'Afghanistan', 'AF', '+93', 'Afghan Afghani', 'AFN', '؋', NULL, '1', '2024-05-13 10:06:06', '2024-05-13 10:06:06'),
(6, 'Australia', 'AU', '+61', 'Australian Dollar', 'AUD', 'AU$', NULL, '1', '2024-05-13 10:06:06', '2024-05-13 10:06:06'),
(7, 'Malaysia', 'MY', '+60', 'Malaysian Ringgit', 'MYR', 'RM', NULL, '1', '2024-05-13 10:16:03', '2024-05-13 10:16:03'),
(8, 'Brazil', 'BR', '+55', 'Brazilian Real', 'BRL', 'R$', NULL, '1', '2024-05-13 10:16:03', '2024-05-13 10:16:03'),
(9, 'Canada', 'CA', '+1', 'Canadian Dollar', 'CAD', '$', NULL, '1', '2024-05-13 10:32:43', '2024-05-13 10:32:43'),
(10, 'Philippines', 'PH', '+63', 'Philippine Peso', 'PHP', '₱', NULL, '1', '2024-05-13 10:32:43', '2024-05-13 10:32:43'),
(11, 'Indonesia', 'ID', '+62', 'Indonesian Rupiah', 'IDR', 'Rp', NULL, '1', '2024-05-13 10:44:38', '2024-05-13 10:44:38'),
(12, 'France', 'FR', '+33', 'France Euro', 'EUR', '€', NULL, '1', '2024-05-13 10:44:38', '2024-05-13 10:44:38'),
(13, 'China', 'CN', '+86', 'Chinese Yuan', 'CNY', '¥', NULL, '1', '2024-05-14 07:31:23', '2024-05-14 07:31:23'),
(14, 'Colombia', 'CO', '+57', 'Colombian Peso', 'COP', '$', NULL, '1', '2024-05-14 07:31:23', '2024-05-14 07:31:23'),
(15, 'Cook Islands', 'CK', '+682', 'New Zealand dollar', 'NZD', '$', NULL, '1', '2024-05-14 07:47:01', '2024-05-14 07:47:01'),
(16, 'Denmark', 'DNK', '+45', 'Danish krone', 'DKK', 'kr', NULL, '1', '2024-05-14 07:47:01', '2024-05-14 07:47:01'),
(17, 'Falkland Islands', 'FK', '+500', 'Falkland Islands Pound', 'FKP', '£', NULL, '1', '2024-05-14 07:54:05', '2024-05-14 07:54:05'),
(18, 'Faroe Islands', 'FO', '+298', 'Faroese króna', 'FRO', 'kr', NULL, '1', '2024-05-14 07:54:05', '2024-05-14 07:54:05'),
(19, 'Finland', 'FI', '+358', 'Finland euro', 'EUR', '€', NULL, '1', '2024-05-14 08:00:21', '2024-05-14 08:00:21'),
(20, 'Gambia', 'GM', '+220', 'Gambian Dalasi', 'GMD', 'D', NULL, '1', '2024-05-14 08:00:21', '2024-05-14 08:00:21'),
(21, 'Georgia', 'GE', '+995', 'Georgian Lari', 'GEL', '₾', NULL, '1', '2024-05-14 08:07:54', '2024-05-14 08:07:54'),
(22, 'Germany', 'DE', '+49', 'Euros', 'EUR', '€', NULL, '1', '2024-05-14 08:07:54', '2024-05-14 08:07:54'),
(23, 'Ethiopia', 'ET', '+251', 'Ethiopian Birr', 'ETB', 'Br', NULL, '1', '2024-05-14 08:38:46', '2024-05-14 08:38:46'),
(24, 'Greece', 'GR', '+30', 'Greece euro', 'GIP', '€', NULL, '1', '2024-05-14 08:38:46', '2024-05-14 08:38:46'),
(25, 'Greenland', 'GL', '+299', 'Danish krone', 'DKK', 'kr', NULL, '1', '2024-05-14 08:45:25', '2024-05-14 08:45:25'),
(26, 'Island and McDonald Islands', 'HM', '+672', 'Australian Dollar', 'AUD', '$', NULL, '1', '2024-05-14 08:45:25', '2024-05-14 08:45:25'),
(27, 'Hong Kong', 'HK', '+852', 'Hong Kong dollar', 'HKD', '$', NULL, '1', '2024-05-14 08:45:25', '2024-05-14 08:45:25'),
(28, 'Iceland', 'IS ', '+354', 'Iceland Krona', 'ISK', 'Íkr', NULL, '1', '2024-05-14 08:45:25', '2024-05-14 08:45:25'),
(29, 'Iran', 'IR', '+98', 'Iranian Rial', 'IRR', '﷼', NULL, '1', '2024-05-14 09:06:16', '2024-05-14 09:06:16'),
(30, 'Iraq', 'IQ', '+964', 'Iraqi Dinar', 'IQD', ' د. ع', NULL, '1', '2024-05-14 09:06:16', '2024-05-14 09:06:16'),
(31, 'Ireland', 'IE', '+353', 'Ireland euro', 'EUR', '€', NULL, '1', '2024-05-14 09:13:10', '2024-05-14 09:13:10'),
(32, 'Israel', 'IL', '+972', 'New Israeli Shekel', 'ILS', '₪', NULL, '1', '2024-05-14 09:13:10', '2024-05-14 09:13:10'),
(33, 'Italy', 'IT', '+39', 'Italy euro', 'EUR', '€', NULL, '1', '2024-05-14 09:13:10', '2024-05-14 09:13:10'),
(34, 'Jamaica', 'JM', '+1876', 'Jamaican dollar', 'JMD', 'J$', NULL, '1', '2024-05-14 09:13:10', '2024-05-14 09:13:10'),
(35, 'Japan', 'JP', '+81', 'Japanese Yen', 'JPY', '¥', NULL, '1', '2024-05-14 09:38:52', '2024-05-14 09:38:52'),
(36, 'Jersey', 'JE', '+44', 'Jersey Pound', 'JEP', '£', NULL, '1', '2024-05-14 09:38:52', '2024-05-14 09:38:52'),
(37, 'Jordan', 'JO', '+962', 'Jordanian Dinar', 'JOD', 'JD', NULL, '1', '2024-05-14 09:38:52', '2024-05-14 09:38:52'),
(38, 'Kazakhstan', 'KZ', '+7', 'Kazakhstani Tenge', 'KZT', '₸', NULL, '1', '2024-05-14 09:38:52', '2024-05-14 09:38:52'),
(39, 'Kuwait', 'KW', '+965', 'Kuwaiti Dinar', 'KWD', 'ك', NULL, '1', '2024-05-14 09:55:33', '2024-05-14 09:55:33'),
(40, 'Kyrgyzstan', 'KG', '+996', 'Kyrgystani Som', 'KGS', 'лв', NULL, '1', '2024-05-14 09:55:33', '2024-05-14 09:55:33'),
(41, 'Laos', 'LA', '+856', ' Laotian Kip', 'LAK', '₭', NULL, '1', '2024-05-14 09:55:33', '2024-05-14 09:55:33'),
(42, 'Liberia', 'LR', '+231', 'Liberian Dollar', 'LRD', 'L$', NULL, '1', '2024-05-14 09:55:33', '2024-05-14 09:55:33'),
(43, 'Libya', 'LY', '+218', 'Libyan dinar', 'LYD', 'ل.د', NULL, '1', '2024-05-14 10:07:23', '2024-05-14 10:07:23'),
(44, 'Macau', 'MO', '+853', 'Macanese pataca', 'MOP', 'MOP$', NULL, '1', '2024-05-14 10:07:23', '2024-05-14 10:07:23'),
(45, 'Malawi', 'MW', '+265', 'Malawian Kwacha', 'MWK', 'MK', NULL, '1', '2024-05-14 10:07:23', '2024-05-14 10:07:23'),
(46, 'Maldives', 'MV', '+960', 'Maldivian rufiyaa', 'MVR', 'Rf', NULL, '1', '2024-05-14 10:07:23', '2024-05-14 10:07:23'),
(47, 'Mexico', 'MX', '+52', 'Mexican peso', 'MXN', '$', NULL, '1', '2024-05-14 10:19:15', '2024-05-14 10:19:15'),
(48, 'Mongolia', 'MN', '+976', 'Mongolian Tugrik', 'MNT', '₮', NULL, '1', '2024-05-14 10:19:15', '2024-05-14 10:19:15'),
(49, 'Morocco', 'MA', '+212', 'Moroccan dirham', 'MAD', 'درهم', NULL, '1', '2024-05-14 10:19:15', '2024-05-14 10:19:15'),
(50, 'Myanmar', 'MM', '+95', 'Myanmar kyat', 'MMK', 'K', NULL, '1', '2024-05-14 10:19:15', '2024-05-14 10:19:15'),
(51, 'Nepal', 'NP', '+977', 'Nepalese rupee', 'NPR', 'रु', NULL, '1', '2024-05-14 10:35:46', '2024-05-14 10:35:46'),
(52, 'Netherlands', 'NL', '+31', 'Netherland euro', '	EUR', '€', NULL, '1', '2024-05-14 10:35:46', '2024-05-14 10:35:46'),
(53, 'New Zealand', 'NZ', '+64', 'New Zealand dollar', 'NZD', 'NZ$', NULL, '1', '2024-05-14 10:35:46', '2024-05-14 10:35:46'),
(54, 'North Korea', 'KP', '+850', 'North Korean Won', 'KPW', '₩', NULL, '1', '2024-05-14 10:35:46', '2024-05-14 10:35:46'),
(55, 'Norway', 'NO', '+47', 'Norwegian krone', 'NOK', 'kr', NULL, '1', '2024-05-14 11:14:07', '2024-05-14 11:14:07'),
(56, 'Oman', 'OM', '+968', 'Omani Rial', 'OMR', '﷼', NULL, '1', '2024-05-14 11:14:07', '2024-05-14 11:14:07'),
(57, 'Pakistan', 'PK', '+92', 'Pakistani rupee', 'PKR', 'Rs', NULL, '1', '2024-05-14 11:14:07', '2024-05-14 11:14:07'),
(58, 'Philippines', 'PH', '+63', 'Philippine peso', 'PHP', '₱', NULL, '1', '2024-05-14 11:14:07', '2024-05-14 11:14:07'),
(59, 'Poland', 'PL', '+48', 'Polish złoty', 'PLN', 'zł', NULL, '1', '2024-05-15 03:44:31', '2024-05-15 03:44:31'),
(60, 'Paraguay', 'PY', '+595', 'Paraguay guarani', 'PYG', '₲', NULL, '1', '2024-05-15 03:44:31', '2024-05-15 03:44:31'),
(61, 'Qatar', 'QA', '+974', 'Qatari Riyal', 'QAR', 'QR', NULL, '1', '2024-05-15 03:44:31', '2024-05-15 03:44:31'),
(62, 'Romania', 'RO', '+40', 'Romanian leu', 'RON', 'lei', NULL, '1', '2024-05-15 03:44:31', '2024-05-15 03:44:31'),
(63, 'Russia', 'RU', '+7', 'Russian ruble', 'RUB', '₽', NULL, '1', '2024-05-15 04:20:35', '2024-05-15 04:20:35'),
(64, 'Rwanda', 'RW', '+250', 'Rwandan Franc', 'RWF', 'R₣', NULL, '1', '2024-05-15 04:20:35', '2024-05-15 04:20:35'),
(65, 'Saudi Arabia', 'SA', '+966', 'Saudi Riyal', 'SAR', '﷼', NULL, '1', '2024-05-15 04:35:02', '2024-05-15 04:35:02'),
(66, 'Serbia', 'RS', '+381', 'Serbian dinar', 'RSD', 'РСД', NULL, '1', '2024-05-15 04:35:02', '2024-05-15 04:35:02'),
(67, 'Singapore', 'SG', '+65', 'Singapore dollar', 'SGD', 'S$', NULL, '1', '2024-05-15 04:35:02', '2024-05-15 04:35:02'),
(68, 'South Africa', 'ZA', '+27', 'South African rand', 'ZAR', 'R', NULL, '1', '2024-05-15 04:35:02', '2024-05-15 04:35:02'),
(69, 'South Korea', 'KR', '+82', 'Korean won', 'KRW', '₩', NULL, '1', '2024-05-15 06:37:40', '2024-05-15 06:37:40'),
(70, 'Spain', 'ES', '+34', 'Spain euro', 'EUR', '€', NULL, '1', '2024-05-15 06:37:40', '2024-05-15 06:37:40'),
(71, 'Sri Lanka', 'LK', '+94', 'Sri Lankan Rupee', 'LKR', 'Rs', NULL, '1', '2024-05-15 06:37:40', '2024-05-15 06:37:40'),
(72, 'Switzerland', 'CH', '+41', 'Swiss Franc', 'CHF', '₣', NULL, '1', '2024-05-15 06:37:40', '2024-05-15 06:37:40'),
(73, 'Syria', 'SY', '+963', 'Syrian Pound', 'SYP', '£', NULL, '1', '2024-05-15 06:57:34', '2024-05-15 06:57:34'),
(74, 'Swaziland', 'SZ', '+268', 'Swazi lilangeni', 'SZL', 'E', NULL, '1', '2024-05-15 06:57:34', '2024-05-15 06:57:34'),
(75, 'Tajikistan', 'TJ', '+992', ' Tajikistani Somoni', 'TJS', 'SM', NULL, '1', '2024-05-15 06:57:34', '2024-05-15 06:57:34'),
(76, 'Tanzania', 'TZ', '+255', 'Tanzanian Shilling', 'TZS', 'TSh', NULL, '1', '2024-05-15 06:57:34', '2024-05-15 06:57:34'),
(77, 'Turkey', 'TR', '+90', 'Turkish lira', 'TRY', '₺', NULL, '1', '2024-05-15 07:30:14', '2024-05-15 07:30:14'),
(78, 'Turkmenistan', 'TM', '+993', 'Turkmenistani Manat', 'TMT', 'm', NULL, '1', '2024-05-15 07:30:14', '2024-05-15 07:30:14'),
(79, 'Uganda', 'UG', '+256', 'Ugandan Shilling', 'UGX', 'USh', NULL, '1', '2024-05-15 07:30:14', '2024-05-15 07:30:14'),
(80, 'Ukraine', 'UA', '+380', 'Ukrainian hryvnia', 'UAH', '₴', NULL, '1', '2024-05-15 07:30:14', '2024-05-15 07:30:14'),
(81, 'United Arab Emirates', 'AE', '+971', 'United Arab Emirates Dirham', 'AED', 'د.إ', NULL, '1', '2024-05-15 09:45:34', '2024-05-15 09:45:34'),
(82, 'United Kingdom', 'GB', '+44', ' British Pound Sterling', 'GBP', '£', NULL, '1', '2024-05-15 09:45:34', '2024-05-15 09:45:34'),
(83, 'Uzbekistan', 'UZ', '+998', 'Uzbekistan Som', 'UZS', 'лв', NULL, '1', '2024-05-15 09:45:34', '2024-05-15 09:45:34'),
(84, 'Venezuela', 'VE', '+58', 'Venezuelan bolívar\n', 'VEF', 'Bs', NULL, '1', '2024-05-15 09:45:34', '2024-05-15 09:45:34'),
(85, 'Vietnam', 'VN', '+84', 'Vietnamese dong', 'VND', '₫', NULL, '1', '2024-05-15 10:03:49', '2024-05-15 10:03:49'),
(86, 'Wallis and Futuna', 'WF', '+681', 'CFP Franc', 'CFP', 'F', NULL, '1', '2024-05-15 10:03:49', '2024-05-15 10:03:49'),
(87, 'Western Sahara', 'EH', '+212', 'Moroccan dirham', 'MAD', '.د.م', NULL, '1', '2024-05-15 10:03:49', '2024-05-15 10:03:49'),
(88, 'Yemen', 'YE', '+967', 'Yemeni Rial', 'YER', '﷼', NULL, '1', '2024-05-15 10:03:49', '2024-05-15 10:03:49'),
(89, 'Zambia', 'ZM', '+260', 'Zambian Kwacha', 'ZMW', 'ZK', NULL, '1', '2024-05-15 10:13:35', '2024-05-15 10:13:35'),
(90, 'Zimbabwe', 'ZW', '+263', 'Zimbabwean dollar', 'ZWL', 'Z$', NULL, '1', '2024-05-15 10:13:35', '2024-05-15 10:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `currency_code`, `currency_symbol`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'USD - United States Dollar', 'USD', '$', NULL, '2024-05-06 06:05:31', '2024-05-05 23:18:06'),
(3, 'THB - Thai Baht', 'THB', '฿', NULL, '2024-05-05 23:18:47', '2024-05-05 23:18:47'),
(4, 'KHR - Cambodian riel', 'KHR', '៛', NULL, '2024-05-05 23:19:43', '2024-05-05 23:19:43'),
(5, 'indian rupee', 'INR', '%', NULL, '2024-05-17 01:10:00', '2024-05-17 01:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_country_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `member_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `issue_by` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `line_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `card_number`, `name`, `email`, `mobile_country_code`, `phone`, `member_type`, `address`, `city`, `state`, `country`, `issue_by`, `password`, `line_id`, `facebook_id`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(1, 'S00001', 'dk', 'dk@gmail.com', '+855', '69861400', '3', '25A Alpha beer city', NULL, NULL, 'KH', '4', 'ZGRkZGRkZGQ=', NULL, NULL, NULL, 1, '2024-05-31 21:21:46', '2024-09-24 00:35:29'),
(2, 'S00002', 'dk', 'dilipkumargupta631@gmail.com', NULL, '7234567890', NULL, '25A Alpha', NULL, NULL, NULL, NULL, 'cGFzc3dvcmQ=', NULL, NULL, NULL, 1, '2024-06-03 03:21:16', '2024-06-03 03:21:16'),
(3, 'G00001', 'dk', 'dkgold@gmail.com', '+855', '7234567898', '1', 'poipet', 'poipet', 'gfhfhfgh', 'KH', '4', 'ZGRkZGRkZGQ=', NULL, NULL, NULL, 1, '2024-06-18 02:40:25', '2024-07-18 00:24:42'),
(4, 'G00002', 'srichaiB', 'scrichaiB@gmail.com', NULL, '7234567890', NULL, '25A Alpha', NULL, NULL, NULL, NULL, 'cGFzc3dvcmQ=', NULL, NULL, NULL, 1, '2024-07-22 04:19:58', '2024-07-22 04:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BookingType` varchar(255) DEFAULT NULL,
  `DeleveryBoyLoginId` varchar(255) DEFAULT NULL,
  `DeliveryBoyId` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `available_for_delivery` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_boys`
--

INSERT INTO `delivery_boys` (`id`, `BookingType`, `DeleveryBoyLoginId`, `DeliveryBoyId`, `name`, `mobile`, `address`, `city`, `zip`, `state`, `country`, `landmark`, `location`, `lat`, `long`, `status`, `available_for_delivery`, `created_at`, `updated_at`) VALUES
(4, '2', '13', 'GCON2709202413', 'MK', '7234567888', '25A Alpha', 'poipet', '226022', 'BM', 'KH', 'dei themay', NULL, NULL, NULL, '1', '1', '2024-09-26 22:52:35', '2024-09-27 10:52:35'),
(6, '2', '15', 'GCON2809202415', 'monk', '723456666666', '25A Alpha', 'poipet', '226022', 'BM', 'KH', 'beer city', NULL, NULL, NULL, '1', '1', '2024-09-27 19:31:26', '2024-09-28 07:31:26'),
(7, '2', '16', 'GCON2809202416', 'tony', '723453333333', '25A Alpha', 'poipet', '226022', 'BM', 'KH', 'sakdal near ABA ATM', NULL, NULL, NULL, '1', '1', '2024-09-27 20:08:44', '2024-10-04 03:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GBooking_id` bigint(20) UNSIGNED NOT NULL,
  `event_img` varchar(255) DEFAULT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `event_address` varchar(255) DEFAULT NULL,
  `event_img_url` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `GBooking_id`, `event_img`, `event_date`, `event_address`, `event_img_url`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/concertTable/events/01J988K8G4NAG04JG0RT5N972X.jpg', '2024-10-31', 'akia thmey beer city, Zone 3', NULL, '10', 1, '2024-10-02 21:00:50', '2024-10-03 04:17:52'),
(2, 1, 'images/concertTable/events/01J988YW1GJSQM69Z6AARNDX0H.jpg', '2024-09-30', 'akia thmey beer city,  Zone 3 ', NULL, '6', 1, '2024-10-02 21:07:10', '2024-10-03 00:21:02'),
(3, 1, 'images/concertTable/events/01J98XQ9S92RYWARS7TK1HXVT5.png', '2024-05-23', 'Akiya thmey, beer city,  Zone 3 ', NULL, '5', 1, '2024-10-03 03:09:32', '2024-10-03 04:17:42'),
(4, 1, 'images/concertTable/events/01J98YPAZH5PQC1YAFDA693Y5S.png', '2024-04-15', 'Akiya thmey, beer city,  Zone 3 ', NULL, '5', 1, '2024-10-03 03:22:02', '2024-10-03 03:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gbooking_translations`
--

CREATE TABLE `gbooking_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tbl_gbooking_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `GBookingname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gbooking_translations`
--

INSERT INTO `gbooking_translations` (`id`, `tbl_gbooking_id`, `language_id`, `GBookingname`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Grand concert', 'G-Entertainment', 'Beer City', '2024-02-14 11:35:07', '2024-02-14 11:35:07'),
(2, 1, 2, 'เทศกาลคอนเสิร์ต', 'G-ความบันเทิง', 'เมืองเบียร์', '2024-02-14 11:35:07', '2024-02-14 11:35:07'),
(3, 1, 3, 'ពិធីបុណ្យប្រគុំតន្ត្រី', 'G-ការកំសាន្ត', 'ទីក្រុងស្រាបៀរ', '2024-02-14 11:35:07', '2024-02-14 11:35:07'),
(4, 2, 1, 'Restaurant', 'G-Booking', 'Beer City', '2024-02-14 11:35:07', '2024-02-14 11:35:07'),
(5, 2, 2, 'ร้านอาหาร', 'G-การจอง', 'เมืองเบียร์', '2024-02-14 11:42:28', '2024-02-14 11:42:28'),
(6, 2, 3, 'ភោជនីយដ្ឋាន', 'G-ការកក់ទុក', 'ទីក្រុងស្រាបៀរ', '2024-02-14 11:42:28', '2024-02-14 11:42:28'),
(7, 3, 1, 'movies', 'G-Entertainment', 'Beer City', '2024-02-21 07:23:20', '2024-02-21 07:23:20'),
(8, 3, 2, 'ภาพยนตร์', 'G-ความบันเทิง', 'เมืองเบียร์', '2024-02-21 07:23:20', '2024-02-21 07:23:20'),
(9, 3, 3, 'ភាពយន្ត', 'G-ការកំសាន្ត', 'ទីក្រុងស្រាបៀរ', '2024-02-21 07:23:20', '2024-02-21 07:23:20'),
(10, 4, 1, 'border pass', 'G-Service', 'Beer City', '2024-02-21 07:23:20', '2024-02-21 07:23:20'),
(11, 4, 2, 'ผ่านแดน', 'G-บริการ', 'เมืองเบียร์', '2024-02-21 08:21:43', '2024-02-21 08:21:43'),
(12, 4, 3, 'លិខិតឆ្លងដែន', 'G-សេវាកម្ម', 'ទីក្រុងស្រាបៀរ', '2024-02-21 08:21:43', '2024-02-21 08:21:43'),
(13, 5, 1, 'car wash', 'G-Booking', 'Beer City', '2024-02-21 08:52:36', '2024-02-21 08:52:36'),
(14, 5, 2, 'ล้างรถ', 'G-การจอง', 'เมืองเบียร์', '2024-02-21 08:52:36', '2024-02-21 08:52:36'),
(15, 5, 3, 'លាង​ឡាន', 'G-ការកក់ទុក', 'ទីក្រុងស្រាបៀរ', '2024-02-21 08:52:36', '2024-02-21 08:52:36'),
(16, 6, 1, 'Taxi  & motor service', 'G-Service', 'transportation', '2024-02-21 08:52:36', '2024-02-21 08:52:36'),
(17, 6, 2, 'บริการแท็กซี่และรถยนต์', 'G-บริการ', 'การขนส่ง', '2024-02-21 09:30:51', '2024-02-21 09:30:51'),
(18, 6, 3, 'សេវាតាក់ស៊ី និងម៉ូតូ', 'G-សេវាកម្ម', 'ការដឹកជញ្ជូន', '2024-02-21 09:31:16', '2024-02-21 09:31:16'),
(19, 7, 1, 'Grand Diamond Hotel', 'G-Booking', NULL, '2024-02-21 09:31:16', '2024-02-21 09:31:16'),
(20, 7, 2, 'โรงแรม Grand Diamond', 'G-การจอง', NULL, '2024-02-21 10:18:59', '2024-02-21 10:18:59'),
(21, 7, 3, 'សណ្ឋាគារ Grand Diamond', 'G-ការកក់ទុក', NULL, '2024-02-21 10:18:59', '2024-02-21 10:18:59'),
(22, 8, 1, 'logistic express', 'G-Service', NULL, '2024-02-21 11:02:29', '2024-02-21 11:02:29'),
(23, 8, 2, 'โลจิสติกด่วน', 'G-บริการ', NULL, '2024-02-21 11:02:29', '2024-02-21 11:02:29'),
(24, 8, 3, 'logistic express', 'G-សេវាកម្ម', NULL, '2024-02-21 11:04:58', '2024-02-21 11:04:58'),
(25, 9, 1, 'car park', 'G-Booking', NULL, '2024-02-21 11:25:56', '2024-02-21 11:25:56'),
(26, 9, 2, 'ที่จอดรถ', 'G-การจอง', NULL, '2024-02-21 11:25:56', '2024-02-21 11:25:56'),
(27, 9, 3, 'ចំណតរថយន្ត', 'G-ការកក់ទុក', NULL, '2024-02-21 11:25:56', '2024-02-21 11:25:56'),
(28, 10, 1, 'online Doctor', 'G-Service', NULL, '2024-02-21 11:25:56', '2024-02-21 11:25:56'),
(30, 10, 2, 'หมอออนไลน์', 'G-บริการ', NULL, '2024-02-21 11:35:42', '2024-02-21 11:35:42'),
(31, 10, 3, 'វេជ្ជបណ្ឌិតអនឡាញ', 'G-សេវាកម្ម', NULL, '2024-02-21 11:35:42', '2024-02-21 11:35:42'),
(32, 11, 1, 'Grand Diamond Hospital', 'G-Booking', NULL, '2024-02-21 11:45:10', '2024-02-21 11:45:10'),
(33, 11, 2, 'Grand Diamond โรงพยาบาล', 'G-การจอง', NULL, '2024-02-21 11:45:10', '2024-02-21 11:45:10'),
(34, 11, 3, 'មន្ទីរពេទ្យ Grand Diamond', 'G-ការកក់ទុក', NULL, '2024-02-21 11:45:41', '2024-02-21 11:45:41'),
(35, 13, 1, 'dk', 'dk title', 'dk desc', '2024-04-25 02:22:30', '2024-04-25 02:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `order`, `status`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 0, 1, 'images/flages/WMIk8oxvYBlENWZG7bLmLO2J0V55eP-metaZW4ucG5n-.png', NULL, '2024-04-24 01:51:49'),
(2, 'Thai', 'th-TH', 1, 1, 'images/flages/33E2eZn55Ma8kPwuqhz4Muy52Vg7L9-metadGgucG5n-.png', NULL, '2024-04-24 01:48:11'),
(3, 'Khmer', 'km', 2, 1, 'images/flages/VgUUq8v5doC7vRvr2iVJmbXSLGAXkr-metaa2gucG5n-.png', NULL, '2024-04-24 01:47:59'),
(4, 'dkfgdfg', 'dk', 3, 0, 'images/flages/V7yk46TlJ38DhxtMSdTmFvv60RDmiO-metaZ3IucG5n-.png', '2024-04-23 21:30:00', '2024-04-24 01:48:45'),
(5, 'China', 'ch', 5, 0, 'images/flages/01J7ZFVK3TPWTJDSKXKHP2HZQJ.png', '2024-05-01 21:12:07', '2024-09-17 00:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_type_name` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `member_type_name`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gold', '10', 1, NULL, '2024-09-17 21:25:46'),
(2, 'Diamond', '20', 1, NULL, '2024-09-17 21:25:32'),
(3, 'Silver', '5', 1, NULL, '2024-09-11 21:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_13_035113_create_tbl_gbookings_table', 2),
(6, '2024_02_14_104107_create_languages_table', 3),
(7, '2024_02_14_111429_create_tbl_gbookings_table', 4),
(8, '2024_02_14_112723_create_gbooking_translations_table', 5),
(9, '2024_02_17_042054_create_member_types_table', 6),
(10, '2024_02_17_042308_create_authorized_byes_table', 7),
(11, '2024_02_17_042821_create_authorized_byes_table', 8),
(12, '2024_02_17_042947_create_customer_table', 9),
(13, '2024_02_17_093618_create_customers_table', 10),
(14, '2024_03_26_062335_add_order_to_tbl_gbookings_table', 11),
(15, '2024_03_27_062759_create_table_caterories_table', 12),
(16, '2024_03_27_065307_create_table_caterories_table', 13),
(17, '2024_03_27_065540_create_table_categories_table', 14),
(18, '2024_03_27_070203_create_table_category_transalations_table', 15),
(19, '2024_03_30_031901_create_table_category_translations_table', 16),
(20, '2024_03_30_063917_create_bookingtables_table', 17),
(21, '2024_03_30_071534_create_timeslots_table', 18),
(22, '2024_03_30_074408_create_bookingtables_table', 19),
(23, '2024_03_30_080629_create_bookingtables_table', 20),
(24, '2024_03_30_080852_create_bookingtable_translations_table', 21),
(25, '2024_03_30_081243_create_bookingtable_translations_table', 22),
(26, '2024_04_02_060957_create_concert_tbl_transactions_table', 23),
(27, '2024_04_05_043858_create_concert_tbl_transactions_table', 24),
(28, '2024_05_04_061156_create_notifications_table', 25),
(29, '2024_05_06_044656_create_currencies_table', 26),
(30, '2024_05_16_100057_create_sellers_table', 27),
(31, '2024_05_20_084857_create_concert_tbl_transactions_table', 28),
(32, '2024_05_24_064024_create_restaurants_table', 29),
(33, '2024_05_27_093255_create_restaurants_table', 30),
(34, '2024_05_27_094705_create_restaurant_translations_table', 31),
(35, '2024_06_01_033412_create_customers_table', 32),
(36, '2024_06_03_030646_create_concert_tbl_transactions_table', 33),
(37, '2024_06_14_064004_create_sellers_table', 34),
(39, '2024_06_14_065350_add_phone_number_and_role_to_users_table', 35),
(42, '2014_10_12_000000_create_users_table', 36),
(43, '2024_07_04_044329_create_restaurant_category_table', 37),
(44, '2024_07_04_064953_create_restaurant_categories_table', 38),
(45, '2024_07_04_065508_create_restaurant_category_translations_table', 39),
(46, '2024_07_06_034949_create_restaurant_foods_table', 40),
(47, '2024_07_17_043437_create_restaurant_food_translations_table', 41),
(48, '2024_07_17_104517_add_currency_id_to_restaurant_foods_table', 42),
(49, '2024_07_23_070157_create_restaurant_carts_table', 43),
(50, '2024_07_23_093141_create_restaurant_carts_table', 44),
(51, '2024_08_08_101448_create_ship_addresses_table', 45),
(52, '2024_08_15_073314_create_restaurant_orders_table', 45),
(53, '2024_09_05_035218_create_restaurant_orders_table', 46),
(54, '2024_09_05_043827_create_delivery_boys_table', 47),
(55, '2024_09_05_061634_create_delivery_boys_table', 48),
(56, '2024_09_27_080451_create_delivery_boys_table', 49),
(57, '2024_09_27_080849_create_delivery_boys_table', 50),
(58, '2024_09_27_081114_create_delivery_boys_table', 51),
(59, '2024_10_01_100445_create_events_table', 52),
(60, '2024_10_09_031841_create_car_banners_table', 53);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('1ee592b8-976d-42ee-85c2-44909dbef960', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('2f12b035-bcf6-48f7-af5b-1f09b6ee4b3b', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 13, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('705481b7-235a-4f14-9e9e-53fe5847d937', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 5, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('8908a580-e3db-440e-bd3f-79bfdbbb64ed', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 16, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('9456dfac-b732-4e95-bb9f-cbab74f36d44', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 6, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('b0752f8f-73b5-448b-96c1-f82666e304bd', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 15, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('d509939e-1b5c-4e59-b953-fb4377aa0838', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 7, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('edf08a31-36b6-4b38-8e76-adb5595a2b82', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11'),
('f8a5c17e-3494-4a19-b546-0555c77eea74', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 3, '{\"actions\":[],\"body\":\"Concert Table has been created successfully!\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-ticket\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Concert Tables created\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 01:16:11', '2024-10-04 01:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('gconadmin@gmail.com', '$2y$12$OaClDGvGIpUNV.YENYTaGO.fmGZNihKg4Ng8PV1F57vyUC8Dz750.', '2024-04-20 00:24:42'),
('saiku@gmail.com', '$2y$12$DlOr6Bm0v5uc3g4Ad3t97ualzUB08bkv.Vrr574NEjRMwljOYi47K', '2024-07-05 20:31:12'),
('seller@gmail.com', '$2y$12$JqPi9z2NoVs2YHQfoWdzMe6CrTeqQSkJbkjcA.GN3jJFFaJ1SzBu.', '2024-06-14 03:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sellerId` varchar(255) DEFAULT NULL,
  `GBookingId` varchar(255) DEFAULT NULL,
  `restaurantName` varchar(255) DEFAULT NULL,
  `imgRestaurant` varchar(255) DEFAULT NULL,
  `openTime` varchar(255) DEFAULT NULL,
  `closedtime` varchar(255) DEFAULT NULL,
  `openingDay` varchar(255) DEFAULT NULL,
  `closingday` varchar(255) DEFAULT NULL,
  `Discount` longtext DEFAULT NULL,
  `lat` longtext DEFAULT NULL,
  `long` longtext DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `openStatus` varchar(255) NOT NULL DEFAULT '1',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `sellerId`, `GBookingId`, `restaurantName`, `imgRestaurant`, `openTime`, `closedtime`, `openingDay`, `closingday`, `Discount`, `lat`, `long`, `address`, `openStatus`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2', '2', 'Saikou', 'images/restaurant/01HYWS46054YM7SHBPAHM2BGGE.jpg', '10:00:25', '23:20:45', 'sunday', 'saturday', NULL, '13.650657608594', '102.56423950195', 'Beer city Poipet Zone 3', '1', '1', NULL, '2024-05-27 03:21:50', '2024-06-19 01:17:20'),
(2, '3', '2', 'Thai house restaurant', 'images/restaurant/01J0MMTTTTC3SHEXPY7QC66M3F.png', '10:00:00', '23:00:24', 'monday', 'sunday', '10', '13.650657608594', '102.56423950195', 'Beer city Zone 3 poipet', '1', '1', NULL, '2024-05-27 03:25:36', '2024-07-18 03:52:17'),
(3, '3', '2', 'Cafe in1', 'images/restaurant/01J0NFG3XMZQ4405DGPXYN4T6G.jpg', '08:00:00', '23:00:00', 'sunday', 'saturday', '10', '13.650657608594', '102.56423950195', 'Grand Diamond Poipet Resort', '1', '1', NULL, '2024-06-18 03:50:18', '2024-09-20 02:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_carts`
--

CREATE TABLE `restaurant_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `f_qty` int(11) DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `food_cart_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_carts`
--

INSERT INTO `restaurant_carts` (`id`, `customer_id`, `food_id`, `f_qty`, `order_status`, `food_cart_status`, `created_at`, `updated_at`) VALUES
(1, 230720241632, 2, 1, 0, 1, '2024-07-23 09:32:49', '2024-07-23 09:32:49'),
(2, 230720241632, 1, 1, 0, 1, '2024-07-23 02:36:03', '2024-07-23 02:36:03'),
(3, 230720241632, 1, 1, 0, 1, '2024-07-23 03:33:41', '2024-07-23 03:33:41'),
(4, 230720241632, 1, 1, 0, 1, '2024-07-23 03:33:44', '2024-07-23 03:33:44'),
(10, 1, 1, 2, 1, 0, '2024-08-19 21:13:57', '2024-10-04 09:03:06'),
(11, 1, 2, 2, 1, 0, '2024-08-19 21:14:01', '2024-10-04 09:03:06'),
(12, 1, 3, 2, 1, 0, '2024-08-20 01:17:42', '2024-10-04 09:03:06'),
(13, 1, 4, 3, 1, 0, '2024-08-20 02:18:58', '2024-10-04 09:03:06'),
(14, 1, 2, 2, 1, 0, '2024-08-21 04:17:49', '2024-10-04 09:03:06'),
(15, 1, 1, 2, 1, 0, '2024-08-21 04:17:52', '2024-10-04 09:03:06'),
(16, 1, 3, 2, 1, 0, '2024-08-21 21:41:31', '2024-10-04 09:03:06'),
(17, 30920241322, 3, 3, 0, 1, '2024-09-03 00:19:42', '2024-09-03 00:23:00'),
(18, 30920241322, 1, 1, 0, 1, '2024-09-03 02:10:32', '2024-09-03 02:10:32'),
(19, 1, 2, 2, 1, 0, '2024-09-03 20:29:43', '2024-10-04 09:03:06'),
(20, 1, 1, 2, 1, 0, '2024-09-03 20:29:57', '2024-10-04 09:03:06'),
(21, 1, 3, 2, 1, 0, '2024-09-04 20:56:07', '2024-10-04 09:03:06'),
(22, 1, 1, 2, 1, 0, '2024-09-04 20:58:06', '2024-10-04 09:03:06'),
(23, 1, 2, 2, 1, 0, '2024-09-04 20:58:07', '2024-10-04 09:03:06'),
(24, 1, 4, 3, 1, 0, '2024-09-04 21:00:59', '2024-10-04 09:03:06'),
(27, 1, 2, 1, 1, 0, '2024-09-30 02:06:18', '2024-10-04 09:03:06'),
(28, 1, 4, 1, 1, 0, '2024-10-04 02:00:38', '2024-10-04 09:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_categories`
--

CREATE TABLE `restaurant_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(255) DEFAULT NULL,
  `restaurant_id` varchar(255) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `cat_status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_categories`
--

INSERT INTO `restaurant_categories` (`id`, `seller_id`, `restaurant_id`, `cat_name`, `created_by`, `cat_status`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'Noodle', 'seller', '1', '2024-07-04 00:36:52', '2024-07-05 04:15:02'),
(2, '3', '2', 'Rosted Fish', 'seller', '1', '2024-07-04 03:13:02', '2024-07-18 04:03:54'),
(3, '3', '3', 'Green Tea', 'seller', '1', '2024-07-04 03:36:54', '2024-07-18 04:03:35'),
(6, '3', '3', 'Coffie', 'seller', '1', '2024-07-19 07:37:19', '2024-07-24 07:37:19'),
(7, '3', '2', 'Noodle', 'seller', '1', '2024-07-19 01:35:59', '2024-07-19 01:35:59'),
(8, '2', '1', 'fried rice', 'seller', '1', '2024-07-19 02:16:16', '2024-07-19 02:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_category_translations`
--

CREATE TABLE `restaurant_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_category_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `cat_translation_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_category_translations`
--

INSERT INTO `restaurant_category_translations` (`id`, `restaurant_category_id`, `language_id`, `cat_translation_name`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Rosted Fish', '2024-07-05 00:08:35', '2024-07-05 00:08:35'),
(2, 2, 2, 'ปลาเผา', '2024-07-05 00:53:54', '2024-07-05 00:53:54'),
(3, 1, 1, 'Noodles', '2024-07-05 02:54:04', '2024-07-05 02:54:04'),
(4, 1, 2, 'ก๋วยเตี๋ยว', '2024-07-05 02:57:20', '2024-07-05 02:57:20'),
(5, 1, 3, 'គុយទាវ', '2024-07-05 02:58:07', '2024-07-05 02:58:07'),
(6, 2, 3, 'ត្រីអាំង', '2024-07-19 01:32:11', '2024-07-19 01:32:11'),
(7, 7, 1, 'Noodles', '2024-07-19 01:36:40', '2024-07-19 01:36:40'),
(8, 7, 3, 'គុយទាវ', '2024-07-19 01:37:29', '2024-07-19 01:37:29'),
(9, 7, 2, 'ก๋วยเตี๋ยว', '2024-07-19 01:38:04', '2024-07-19 01:38:04'),
(10, 3, 2, 'ชาเขียว', '2024-07-19 02:12:58', '2024-07-19 02:12:58'),
(11, 3, 3, 'តែ​បៃតង', '2024-07-19 02:13:15', '2024-07-19 02:13:15'),
(12, 3, 1, 'Green tea', '2024-07-19 02:13:33', '2024-07-19 02:13:33'),
(13, 6, 3, 'កាហ្វេ', '2024-07-19 02:14:13', '2024-07-19 02:14:13'),
(14, 6, 1, 'coffie', '2024-07-19 02:14:22', '2024-07-19 02:14:22'),
(15, 6, 2, 'คอฟฟี่', '2024-07-19 02:14:43', '2024-07-19 02:14:43'),
(16, 8, 1, 'fried rice', '2024-07-19 02:16:35', '2024-07-19 02:16:35'),
(17, 8, 2, 'ข้าวผัด', '2024-07-19 02:16:50', '2024-07-19 02:16:50'),
(18, 8, 3, 'បាយ​ឆា', '2024-07-19 02:17:04', '2024-07-19 02:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_foods`
--

CREATE TABLE `restaurant_foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(255) DEFAULT NULL,
  `restaurant_id` varchar(255) DEFAULT NULL,
  `restaurant_cat_id` varchar(255) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `food_img` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `currency_id` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `created_by` longtext DEFAULT NULL,
  `food_status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_foods`
--

INSERT INTO `restaurant_foods` (`id`, `seller_id`, `restaurant_id`, `restaurant_cat_id`, `food_name`, `food_img`, `price`, `currency_id`, `discount`, `created_by`, `food_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '3', '2', '2', 'thai rosted fish', 'images/restaurant/food/01J3016QMPC2DPA12K5RXDGAQ5.jpg', '5', '3', '19', 'seller', '1', NULL, '2024-07-17 07:56:05', '2024-07-17 02:43:33'),
(2, '3', '2', '2', 'fish curry', 'images/restaurant/food/01J303HN416TX59S5SSVAY52BZ.jpg', '100', '3', '19', 'seller', '1', NULL, '2024-07-17 07:56:05', '2024-07-17 03:24:28'),
(3, '3', '3', '3', 'Green Tea', 'images/restaurant/food/01J305QRA26FRPDD7RDKWEXZMT.jpg', '20', '3', '3', 'seller', '1', NULL, '2024-07-17 04:02:45', '2024-07-18 03:55:54'),
(4, '2', '1', '1', 'Noodle with chicken', 'images/restaurant/food/01J306EKVP33WCM13BM3GF7K22.png', '100', '3', '10', 'seller', '1', NULL, '2024-07-17 04:15:14', '2024-09-13 04:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_food_translations`
--

CREATE TABLE `restaurant_food_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_food_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `food_translation_name` varchar(255) DEFAULT NULL,
  `translation_title` varchar(255) DEFAULT NULL,
  `translation_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_food_translations`
--

INSERT INTO `restaurant_food_translations` (`id`, `restaurant_food_id`, `language_id`, `food_translation_name`, `translation_title`, `translation_desc`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'green Tea', 'natural tea', 'green color with freshness', '2024-07-18 04:14:52', '2024-07-18 04:14:52'),
(2, 2, 1, 'fish curry with rice', 'delicious thai food', 'bestise thai fish curry and rice', '2024-07-18 04:19:00', '2024-07-19 04:22:41'),
(3, 4, 1, 'Noodle with chicken', 'Delicious Noodle with fried chicken', 'A Noodle with delicious chicken-fry and all of the ingredients and mixing sauce', '2024-07-19 04:00:51', '2024-07-19 04:13:42'),
(4, 4, 3, 'គុយទាវជាមួយសាច់មាន់', 'គុយទាវឆ្ងាញ់ជាមួយមាន់បំពង', 'គុយទាវជាមួយមាន់បំពងឆ្ងាញ់ៗ និងគ្រឿងផ្សំទាំងអស់ និងទឹកជ្រលក់លាយ', '2024-07-19 04:13:06', '2024-07-19 04:14:30'),
(5, 4, 2, 'ก๋วยเตี๋ยวไก่', 'บะหมี่อร่อยกับไก่ทอด', 'บะหมี่ไก่ทอดแสนอร่อยพร้อมส่วนผสมและซอสผสมทั้งหมด', '2024-07-19 04:13:24', '2024-07-19 04:14:42'),
(6, 1, 1, 'thai rosted fish', 'Sweet And Sour rosted Fish', 'Crispy fried fish served with a tangy and sweet sauce (For ref only)', '2024-07-19 04:18:17', '2024-07-19 04:18:17'),
(7, 1, 2, 'ปลาย่าง', 'ปลากระพงผัดเปรี้ยวหวาน', 'ปลาทอดกรอบเสิร์ฟพร้อมน้ำจิ้มรสเปรี้ยวอมหวาน (สำหรับการอ้างอิงเท่านั้น)', '2024-07-19 04:19:18', '2024-07-19 04:20:42'),
(8, 1, 3, 'ត្រីអាំង', 'ត្រីប្រៃផ្អែម និងជូរ', 'ត្រីប្រឡាក់ប្រឡាក់ជាមួយទឹកជ្រលក់ហឹរ និងផ្អែម (សម្រាប់តែចំណាំ)', '2024-07-19 04:19:43', '2024-07-19 04:20:53'),
(9, 2, 3, 'ការីត្រីជាមួយអង្ករ', 'ម្ហូបថៃឆ្ងាញ់', 'បាយត្រី និងបាយថៃល្អបំផុត', '2024-07-19 04:23:13', '2024-07-19 04:24:51'),
(10, 2, 2, 'แกงปลากับข้าว', 'อาหารไทยแสนอร่อย', 'เสริมแกงปลาไทยและข้าว', '2024-07-19 04:23:34', '2024-07-19 04:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_orders`
--

CREATE TABLE `restaurant_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(255) NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `order_key` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `subTotal` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `totalPayAmount` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) DEFAULT NULL,
  `TransactionId` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `response_all` longtext DEFAULT NULL,
  `receipt_url` longtext DEFAULT NULL,
  `future_payment_custId` varchar(255) DEFAULT NULL,
  `payment_time` varchar(255) DEFAULT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `order_date` varchar(255) DEFAULT NULL,
  `deliveryBoyId` varchar(255) DEFAULT NULL,
  `delivery_suggestion` longtext DEFAULT NULL,
  `assign_status` enum('pending','assigned','accepted','shipped','rejected','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `cancel_reason` longtext DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_orders`
--

INSERT INTO `restaurant_orders` (`id`, `restaurant_id`, `food_id`, `cart_id`, `seller_id`, `cust_id`, `address_id`, `order_key`, `quantity`, `subTotal`, `charge`, `totalPayAmount`, `currency`, `currency_symbol`, `TransactionId`, `payment_type`, `payment_status`, `response_all`, `receipt_url`, `future_payment_custId`, `payment_time`, `gateway_name`, `order_status`, `order_date`, `deliveryBoyId`, `delivery_suggestion`, `assign_status`, `cancel_reason`, `latitude`, `longitude`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 21, '3', 1, 1, 'GCON050924105641', '2', '40', '5', '45', 'THB', '฿', NULL, 'cash on delivery', 'pending', NULL, NULL, NULL, NULL, NULL, 'ordered', '2024-09-05 10:56:41', NULL, NULL, 'rejected', NULL, NULL, NULL, NULL, '2024-09-05 03:56:41', '2024-09-05 21:17:53'),
(2, 2, 1, 22, '3', 1, 1, 'GCON050924105821', '2', '210', '5', '215', 'THB', '฿', 'PAYID-M3MSYYY97H20879S75911840', 'online', 'success', '{\"id\":\"PAYID-M3MSYYY97H20879S75911840\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"61L61627DB936884Y\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"215.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"215.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"0W261698CV712492G\",\"state\":\"completed\",\"amount\":{\"total\":\"215.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"215.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"22.50\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"5.47\",\"currency\":\"USD\"},\"exchange_rate\":\"0.028396679772827\",\"parent_payment\":\"PAYID-M3MSYYY97H20879S75911840\",\"create_time\":\"2024-09-05T03:58:41Z\",\"update_time\":\"2024-09-05T03:58:41Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0W261698CV712492G\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0W261698CV712492G\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3MSYYY97H20879S75911840\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-09-05T03:58:27Z\",\"update_time\":\"2024-09-05T03:58:41Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3MSYYY97H20879S75911840\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-61L61627DB936884Y', 'CJEW9GJ4SFFZN', '2024-09-05 10:58:42', 'Paypal', 'ordered', '2024-09-05 10:58:21', '6', NULL, 'delivered', NULL, NULL, NULL, NULL, '2024-09-05 03:58:21', '2024-10-06 21:41:28'),
(3, 2, 2, 23, '3', 1, 1, 'GCON050924105821', '2', '210', '5', '215', 'THB', '฿', 'PAYID-M3MSYYY97H20879S75911840', 'online', 'success', '{\"id\":\"PAYID-M3MSYYY97H20879S75911840\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"61L61627DB936884Y\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"215.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"215.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"0W261698CV712492G\",\"state\":\"completed\",\"amount\":{\"total\":\"215.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"215.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"22.50\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"5.47\",\"currency\":\"USD\"},\"exchange_rate\":\"0.028396679772827\",\"parent_payment\":\"PAYID-M3MSYYY97H20879S75911840\",\"create_time\":\"2024-09-05T03:58:41Z\",\"update_time\":\"2024-09-05T03:58:41Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0W261698CV712492G\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/0W261698CV712492G\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3MSYYY97H20879S75911840\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-09-05T03:58:27Z\",\"update_time\":\"2024-09-05T03:58:41Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3MSYYY97H20879S75911840\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-61L61627DB936884Y', 'CJEW9GJ4SFFZN', '2024-09-05 10:58:42', 'Paypal', 'ordered', '2024-09-05 10:58:21', NULL, NULL, 'accepted', NULL, NULL, NULL, NULL, '2024-09-05 03:58:21', '2024-09-05 03:58:42'),
(4, 1, 4, 24, '2', 1, 1, 'GCON050924110110', '3', '300', '5', '305', 'THB', '฿', 'ch_3PvWsrKyHXidWMBJ0DltcTS3', 'online', 'success', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PvWsrKyHXidWMBJ0DltcTS3\",\n    \"object\": \"charge\",\n    \"amount\": 30500,\n    \"amount_captured\": 30500,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PvWsrKyHXidWMBJ0SmSVL0t\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1725508885,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 57,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PvWsnKyHXidWMBJjotXSG4X\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 30500,\n            \"authorization_code\": null,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2027,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 30500,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKJba5LYGMgYpcglyqns6LBZ4FQzKjV0r1TULesE-noc5-RBuYLC0s9h7JVodcfdMH5iNRrrBSUE-vMdF\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PvWsnKyHXidWMBJjotXSG4X\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2027,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKJba5LYGMgYpcglyqns6LBZ4FQzKjV0r1TULesE-noc5-RBuYLC0s9h7JVodcfdMH5iNRrrBSUE-vMdF', NULL, '2024-09-05 11:01:27', 'Stripe', 'ordered', '2024-09-05 11:01:10', '6', NULL, 'delivered', 'customer  money', NULL, NULL, NULL, '2024-09-05 04:01:10', '2024-10-04 04:19:40'),
(5, 2, 2, 27, '3', 1, 1, 'GCON300924161330', '1', '100', '5', '105', 'THB', '฿', NULL, 'cash on delivery', 'pending', NULL, NULL, NULL, NULL, NULL, 'ordered', '2024-09-30 04:13:30', '6', NULL, 'delivered', NULL, NULL, NULL, NULL, '2024-09-30 09:13:30', '2024-10-05 00:04:54'),
(6, 1, 4, 28, '2', 1, 1, 'GCON041024160107', '1', '100', '5', '105', 'THB', '฿', 'PAYID-M3725WA4NN828404A186933L', 'online', 'success', '{\"id\":\"PAYID-M3725WA4NN828404A186933L\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"79L73860MB730980L\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"105.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"105.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"22V76946E1645462J\",\"state\":\"completed\",\"amount\":{\"total\":\"105.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"105.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"18.66\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"2.58\",\"currency\":\"USD\"},\"exchange_rate\":\"0.029863089221722\",\"parent_payment\":\"PAYID-M3725WA4NN828404A186933L\",\"create_time\":\"2024-10-04T09:03:03Z\",\"update_time\":\"2024-10-04T09:03:03Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/22V76946E1645462J\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/22V76946E1645462J\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3725WA4NN828404A186933L\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-10-04T09:01:12Z\",\"update_time\":\"2024-10-04T09:03:03Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-M3725WA4NN828404A186933L\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-79L73860MB730980L', 'CJEW9GJ4SFFZN', '2024-10-04 16:03:06', 'Paypal', 'ordered', '2024-10-04 04:01:07', '7', NULL, 'cancelled', 'Learn what words mean as you search\nSelect words to get definitions & translations without leaving the page', NULL, NULL, NULL, '2024-10-04 09:01:07', '2024-10-05 00:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_translations`
--

CREATE TABLE `restaurant_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_translations`
--

INSERT INTO `restaurant_translations` (`id`, `restaurant_id`, `language_id`, `heading`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'our delicious', 'Saikou restaurant', '2024-05-27 04:02:29', '2024-05-27 04:07:16'),
(2, 1, 3, 'ឆ្ងាញ់របស់យើង។', 'Saikou ភោជនីយដ្ឋាន', '2024-05-27 04:05:53', '2024-05-27 04:06:58'),
(3, 1, 2, 'อร่อยของเรา', 'Thai ร้านอาหาร', '2024-05-27 04:08:21', '2024-05-27 04:08:21'),
(4, 2, 1, 'delicious thai food', 'Pad Thai: Stir-fried noodles', '2024-05-28 21:37:25', '2024-05-28 21:37:25'),
(5, 2, 2, 'อาหารไทยแสนอร่อย', 'ผัดไทย: ผัดหมี่', '2024-05-30 00:48:33', '2024-05-30 00:48:33'),
(6, 2, 3, 'ម្ហូបថៃឆ្ងាញ់', 'ផាតថៃ៖ មីឆា', '2024-05-30 00:49:13', '2024-05-30 00:49:13'),
(7, 3, 1, 'delicious thai cofee', 'delicious', '2024-06-19 01:13:55', '2024-06-19 01:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sellerLoginId` varchar(255) DEFAULT NULL,
  `shopName` varchar(255) DEFAULT NULL,
  `businessType` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `shopImage` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `additionalAddress` varchar(255) DEFAULT NULL,
  `contractStatus` varchar(255) NOT NULL DEFAULT 'pending',
  `status` varchar(255) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `sellerLoginId`, `shopName`, `businessType`, `cuisine`, `firstName`, `lastName`, `shopImage`, `address`, `city`, `country`, `additionalAddress`, `contractStatus`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '3', 'dfsdf', 'Restaurant', 'dfsd', 'gopal', 'pay', 'images/restaurant/shop/vF68VMHJri79Om56cxfPdmzyjpe715Nmh6jkCs1N.png', '25A Alpha\ntagore lane', 'poipet', 'KH', NULL, 'approved', '1', NULL, '2024-06-13 20:09:03', '2024-06-14 02:24:10'),
(2, '4', 'Saikou', 'Restaurant', 'thai food', 'khun', 'pk', 'images/restaurant/shop/ASaT8ZYWD4ckbjacvRPsU0WawTs4sTpdTD480Q9j.jpg', 'poipet\nPoipet is a city in Banteay Meanchey Province in western Cambodia,', 'poipet', 'KH', NULL, 'approved', '1', NULL, '2024-06-13 22:48:47', '2024-06-14 03:53:44'),
(3, '5', 'thai house', 'Restaurant', 'thai food', 'preta', 'khun', 'images/restaurant/shop/EtdyXQDydzzXIMaU6vCGvIaJj18K3dnimkmYsaK6.jpg', '25A Alpha\ntagore lane', 'poipet', 'KH', NULL, 'approved', '1', NULL, '2024-06-13 23:07:27', '2024-06-14 11:07:27'),
(4, '6', 'cafe In', 'Shop', 'coffie', 'khun', 'cafe', 'images/restaurant/shop/T4Q69VgSXhUMCn9FOHg9G5jw2uua7kXfSPnpVbHv.jpg', 'poipet\nPoipet is a city in Banteay Meanchey Province in western Cambodia,', 'poipet', 'KH', NULL, 'approved', '1', NULL, '2024-06-13 23:11:32', '2024-09-19 21:29:54'),
(5, '7', 'ddddd', 'Shop', 'ddddde', 'gopal', 'pay', 'images/restaurant/shop/RhPPWueV6mbT7OfaGmYVwj5Puf6Gi3SfT8TbgEfi.jpg', '25A Alpha\ntagore lane', 'poipet', 'KH', 'gconadmin@gmail.com', 'approved', '1', NULL, '2024-06-25 02:47:44', '2024-09-20 02:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `ship_addresses`
--

CREATE TABLE `ship_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `ship_status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_addresses`
--

INSERT INTO `ship_addresses` (`id`, `cust_id`, `name`, `mobile`, `address`, `city`, `zip`, `state`, `country`, `landmark`, `location`, `lat`, `long`, `ship_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'dk', '72345678989', '25A Alpha', 'poipet', '226022', 'Banteay Meanchey', 'Cambodia', 'beer city', 'ffghfh', NULL, NULL, 1, NULL, '2024-08-19 20:56:27', '2024-10-04 23:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `table_categories`
--

CREATE TABLE `table_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `GBooking_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_categories`
--

INSERT INTO `table_categories` (`id`, `GBooking_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, '2024-03-07 07:08:15', '2024-09-18 20:59:36'),
(2, 1, 1, 1, '2024-03-27 07:08:15', '2024-09-18 23:56:00'),
(5, 1, 3, 1, '2024-03-25 06:18:03', '2024-04-25 21:14:49'),
(6, 1, 2, 1, '2024-03-26 06:18:03', '2024-04-26 01:05:49'),
(8, 1, 5, 1, '2024-10-01 01:38:09', '2024-10-01 01:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `table_category_translations`
--

CREATE TABLE `table_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_category_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_category_translations`
--

INSERT INTO `table_category_translations` (`id`, `table_category_id`, `language_id`, `cat_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'small', '2024-03-30 03:20:46', '2024-03-30 03:20:46'),
(2, 1, 2, 'เล็ก', '2024-03-30 03:20:46', '2024-03-30 03:20:46'),
(3, 1, 3, 'តូច', '2024-03-30 03:20:46', '2024-03-30 03:20:46'),
(4, 2, 1, 'middle', '2024-03-30 03:20:46', '2024-03-30 03:20:46'),
(5, 2, 2, 'กลาง', '2024-03-30 03:22:10', '2024-03-30 03:22:10'),
(6, 2, 3, 'កណ្តាល', '2024-03-30 03:22:10', '2024-03-30 03:22:10'),
(7, 5, 1, 'big', '2024-03-18 06:19:25', '2024-03-20 06:19:25'),
(8, 5, 2, 'ใหญ่', '2024-03-26 06:19:25', '2024-03-29 06:19:25'),
(9, 5, 3, 'ធំ', '2024-03-18 06:19:25', '2024-03-20 06:19:25'),
(10, 6, 1, 'VIP', '2024-03-26 06:19:25', '2024-09-18 23:57:28'),
(11, 6, 2, 'วีไอพี', '2024-03-17 06:22:23', '2024-03-24 06:22:23'),
(12, 6, 3, 'វីអាយភី', '2024-03-17 06:22:23', '2024-03-24 06:22:23'),
(14, 8, 1, 'Special Events', '2024-10-01 01:38:42', '2024-10-01 01:38:42'),
(15, 8, 2, 'กิจกรรมพิเศษ', '2024-10-01 01:39:12', '2024-10-01 01:39:12'),
(16, 8, 3, 'ព្រឹត្តិការណ៍ពិសេស', '2024-10-01 01:39:34', '2024-10-01 01:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gbookings`
--

CREATE TABLE `tbl_gbookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext DEFAULT NULL,
  `img_url` longtext DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `BookingType` varchar(255) DEFAULT NULL,
  `recognize` varchar(255) DEFAULT NULL,
  `deleteStatus` int(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_gbookings`
--

INSERT INTO `tbl_gbookings` (`id`, `image`, `img_url`, `discount`, `BookingType`, `recognize`, `deleteStatus`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, 'images/services/Cbtg3amonPGmaIJZCWAfW5seIpxQko-metaY29uY2VydC5qcGc=-.jpg', 'http://127.0.0.1:8000/website/assets/images/sliders/1.jpg', '10', 'concert', 'GEntertainment', 0, 1, 0, '2024-02-14 11:16:17', '2024-04-24 23:21:22'),
(2, 'images/services/UuCdlL0CRA0b4ljnHUE12dBdLfO0mC-metac2Fpa3UxLmpwZw==-.jpg', 'http://127.0.0.1:8000/website/assets/images/sliders/2.jpg', '15', 'restaurant', 'GBooking', 0, 1, 0, '2024-02-14 11:16:17', '2024-04-24 23:17:47'),
(3, 'images/services/ful2IfNXVGpuKxzGqgVoek1UCxtXV9-metabW92aWUuanBn-.jpg', 'http://127.0.0.1:8000/website/assets/images/sliders/3.jpg', '5', 'movies', 'GEntertainment', 0, 1, 1, '2024-02-21 06:32:54', '2024-04-24 23:21:37'),
(4, 'images/services/doio6afbPQug8SLVZR3qZR4K6jAZcA-metaYm9yZGVycGFzcy5qcGc=-.jpg', 'http://127.0.0.1:8000/website/assets/images/services/borderpass.jpg', '5', 'borderPass', 'GService', 0, 1, 0, '2024-02-21 06:32:54', '2024-04-24 23:08:48'),
(5, 'images/services/DcAT366gRrNaCWDwk8drlrJK28HIXY-metaY2FyLXdhc2guanBn-.jpg', NULL, '5', 'carWash', 'GBooking', NULL, 1, 1, '2024-02-21 08:45:30', '2024-04-24 23:18:16'),
(6, 'images/services/ua0sJVujy1lQ2z1sRpErKZYp7zTPKp-metadGF4aS1ib29rLmpwZw==-.jpg', NULL, '5', 'transportation', 'GService', NULL, 1, 1, '2024-02-21 08:45:30', '2024-04-24 23:15:16'),
(7, 'images/services/P5BwVtbkT9RKRF9wDio3hHdBrwij5W-metaaG90ZWwucG5n-.png', NULL, '5', 'hotel', 'GBooking', NULL, 1, 2, '2024-02-21 10:16:03', '2024-04-24 23:18:44'),
(8, 'images/services/9sXO52rJweoXr1LUuL7VTlCwE8RkYf-metabG9naXN0aWMuanBn-.jpg', NULL, '5', 'logisticExpress', 'GService', NULL, 1, 3, '2024-02-21 10:16:03', '2024-04-24 23:16:21'),
(9, 'images/services/VYmCaHLGwkH8wgiym4Uovxl3nAfuJx-metaY2FyLXBhcmsuanBn-.png', NULL, '6', 'carPark', 'GBooking', NULL, 1, 3, '2024-02-21 11:16:46', '2024-04-24 23:19:23'),
(10, 'images/services/de4mTtD5rpFNSK01OaIbaX1H4oLpM0-metaY29uY2VydC1kb2N0b3IuanBn-.jpg', NULL, '5', 'onlineDoctor', 'GService', NULL, 1, 3, '2024-02-21 11:16:46', '2024-04-24 23:16:08'),
(11, 'images/services/dPjwt6BRzbvTrkkX3kvfiUZ6fj96v5-metaaG9zcGl0YWwuanBn-.webp', NULL, '10', 'hospital', 'GBooking', NULL, 1, 4, '2024-02-21 11:43:57', '2024-04-24 23:19:47'),
(13, 'images/services/eh7lPc5NTfxOXemzyjfJZuKMHUp7jj-metaNS5qcGc=-.jpg', NULL, '5', 'hgd', 'GEntertainment', 0, 0, 2, '2024-04-24 23:28:22', '2024-07-18 03:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookingtableId` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `interval` varchar(255) DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `bookingtableId`, `time`, `interval`, `orderby`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '12:00', 'PM', 0, 1, '2024-04-25 07:36:19', '2024-04-26 07:36:19'),
(2, NULL, '12:30', 'PM', 1, 1, '2024-04-18 07:36:19', '2024-04-18 07:36:19'),
(3, NULL, '01:00', 'PM', 2, 1, '2024-04-25 07:36:19', '2024-04-26 07:36:19'),
(4, NULL, '01:30', 'PM', 3, 1, '2024-04-18 07:36:19', '2024-09-18 03:19:45'),
(5, NULL, '02:00', 'PM', 4, 1, NULL, NULL),
(6, NULL, '02:30', 'PM', 5, 1, NULL, NULL),
(7, NULL, '03:00', 'PM', 6, 1, NULL, NULL),
(8, NULL, '03:30', 'PM', 7, 1, NULL, NULL),
(9, NULL, '04:00', 'PM', 8, 1, NULL, NULL),
(10, NULL, '04:30', 'PM', 9, 1, NULL, NULL),
(11, NULL, '05:00', 'PM', 10, 1, NULL, NULL),
(12, NULL, '05:30', 'PM', 11, 1, NULL, NULL),
(13, NULL, '06:00', 'PM', 12, 1, NULL, NULL),
(14, NULL, '06:30', 'PM', 13, 1, NULL, NULL),
(15, NULL, '07:00', 'PM', 14, 1, NULL, NULL),
(16, NULL, '07:30', 'PM', 15, 1, NULL, NULL),
(17, NULL, '08:00', 'PM', 16, 1, NULL, NULL),
(18, NULL, '08:30', 'PM', 17, 1, NULL, NULL),
(19, NULL, '09:00', 'PM', 18, 1, NULL, NULL),
(20, NULL, '09:30', 'PM', 19, 1, NULL, NULL),
(21, NULL, '10:00', 'PM', 20, 1, NULL, NULL),
(22, NULL, '10:30', 'PM', 21, 1, NULL, NULL),
(23, NULL, '11:00', 'PM', 22, 1, NULL, NULL),
(24, NULL, '11:30', 'PM', 23, 1, NULL, NULL),
(25, NULL, '12:00', 'AM', 24, 1, NULL, NULL),
(26, NULL, '12:30', 'AM', 25, 1, NULL, NULL),
(27, NULL, '01:00', 'AM', 26, 1, NULL, NULL),
(28, NULL, '01:30', 'AM', 27, 1, NULL, NULL),
(29, NULL, '02:00', 'AM', 28, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phoneNumber`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'G-CON Admin', 'gconadmin@gmail.com', '333333333333', 'admin', NULL, '$2y$12$RA1l02QcFf5YVVoxDX4PCeNNuC2IJ8D4kVXfhwV5SV12dSvJ0VQqO', NULL, '2024-06-26 10:22:51', '2024-09-17 01:51:10'),
(3, 'seller', 'seller@gmail.com', '543563454545', 'seller', NULL, '$2y$12$GGdX0rN9T.ONF4GjzZ.mq..2luk5Jw3suj59kVYMnuZcgcOF42DIu', NULL, '2024-06-26 10:22:51', '2024-06-14 03:28:42'),
(4, 'khun pk', 'saiku@gmail.com', '534254342423', 'seller', NULL, '$2y$12$2a.hZ1T4bO3BVKSkpm3b3uhwYYjVmR.QRDlj2Ah8Hf/KHaxDXlUkK', NULL, '2024-06-14 10:48:48', '2024-06-14 03:51:15'),
(5, 'preta khun', 'thaihouse@gmail.com', '7234567890', 'seller', NULL, '$2y$12$/flCpplitiwdixc6wYKGvu/wHBQxr4dQ4V2OGmck5JMKmjHsj.a9m', NULL, '2024-06-14 11:07:27', '2024-09-19 21:20:10'),
(6, 'khun cafe', 'cafein@gmail.com', '54645645645', 'seller', NULL, '$2y$12$nCoghuz3zqd1oDR4E2VlhedefBWL16LkZq9aB7EKUBfbAtwCgVW9K', NULL, '2024-06-14 11:11:32', '2024-06-14 11:11:32'),
(7, 'gopal pay', 'dddd@gmail.com', '723456888888', 'seller', NULL, '$2y$12$wnXNn8QiiV9ITt2NMECCauDd1D.DaGZIxBPnU728WCubJu.F8OcVe', 'qubymFYVDMxivgrGkC8A8O5vIMBCYid2L12T4JEPTyKBGFMIP5a7ZifODuFQ', '2024-06-25 02:47:44', '2024-06-24 20:00:45'),
(13, 'MK', 'mk@gmail.com', '7234567888', 'deliveryBoy', NULL, '$2y$12$He5dRp019lM886YmEp5RMOaYNGcM/wzdfg4n4YFhcapL9ioOlouxG', NULL, '2024-09-27 10:52:35', '2024-09-27 10:52:35'),
(15, 'monk', 'deliveryBoy@gmail.com', '723456666666', 'deliveryBoy', NULL, '$2y$12$n4A0MBwuXSgSyeD5udIvpOB1EI8Ukb4Lm8E9lvb5UpoQBobDOoqp6', NULL, '2024-09-28 07:31:26', '2024-09-28 01:04:09'),
(16, 'tony', 'tony@gmail.com', '723453333333', 'deliveryBoy', NULL, '$2y$12$QLGWx9VbmrOTmT.hUeBAOeRFXR9mFwENRaEK.nrX/aSh3Obs3.iuS', NULL, '2024-09-28 08:08:44', '2024-09-28 08:08:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorized_byes`
--
ALTER TABLE `authorized_byes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookingtables`
--
ALTER TABLE `bookingtables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookingtables_gbooking_id_foreign` (`GBooking_id`),
  ADD KEY `bookingtables_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `bookingtable_translations`
--
ALTER TABLE `bookingtable_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookingtable_translations_bookingtable_id_foreign` (`bookingtable_id`),
  ADD KEY `bookingtable_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `car_banners`
--
ALTER TABLE `car_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_banners_gbooking_id_foreign` (`GBooking_id`);

--
-- Indexes for table `concert_tbl_transactions`
--
ALTER TABLE `concert_tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_gbooking_id_foreign` (`GBooking_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gbooking_translations`
--
ALTER TABLE `gbooking_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gbooking_translations_tbl_gbooking_id_foreign` (`tbl_gbooking_id`),
  ADD KEY `gbooking_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_carts`
--
ALTER TABLE `restaurant_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_categories`
--
ALTER TABLE `restaurant_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_category_translations`
--
ALTER TABLE `restaurant_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_category_translations_restaurant_category_id_foreign` (`restaurant_category_id`),
  ADD KEY `restaurant_category_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `restaurant_foods`
--
ALTER TABLE `restaurant_foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_food_translations`
--
ALTER TABLE `restaurant_food_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_food_translations_restaurant_food_id_foreign` (`restaurant_food_id`),
  ADD KEY `restaurant_food_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_orders_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_orders_food_id_foreign` (`food_id`),
  ADD KEY `restaurant_orders_cart_id_foreign` (`cart_id`),
  ADD KEY `restaurant_orders_cust_id_foreign` (`cust_id`),
  ADD KEY `restaurant_orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `restaurant_translations`
--
ALTER TABLE `restaurant_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_translations_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_addresses`
--
ALTER TABLE `ship_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ship_addresses_cust_id_foreign` (`cust_id`);

--
-- Indexes for table `table_categories`
--
ALTER TABLE `table_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_categories_gbooking_id_foreign` (`GBooking_id`);

--
-- Indexes for table `table_category_translations`
--
ALTER TABLE `table_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_category_translations_table_category_id_foreign` (`table_category_id`),
  ADD KEY `table_category_translations_language_id_foreign` (`language_id`);

--
-- Indexes for table `tbl_gbookings`
--
ALTER TABLE `tbl_gbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
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
-- AUTO_INCREMENT for table `authorized_byes`
--
ALTER TABLE `authorized_byes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookingtables`
--
ALTER TABLE `bookingtables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bookingtable_translations`
--
ALTER TABLE `bookingtable_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `car_banners`
--
ALTER TABLE `car_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `concert_tbl_transactions`
--
ALTER TABLE `concert_tbl_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gbooking_translations`
--
ALTER TABLE `gbooking_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_carts`
--
ALTER TABLE `restaurant_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `restaurant_categories`
--
ALTER TABLE `restaurant_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurant_category_translations`
--
ALTER TABLE `restaurant_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `restaurant_foods`
--
ALTER TABLE `restaurant_foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant_food_translations`
--
ALTER TABLE `restaurant_food_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_translations`
--
ALTER TABLE `restaurant_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ship_addresses`
--
ALTER TABLE `ship_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_categories`
--
ALTER TABLE `table_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_category_translations`
--
ALTER TABLE `table_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_gbookings`
--
ALTER TABLE `tbl_gbookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtables`
--
ALTER TABLE `bookingtables`
  ADD CONSTRAINT `bookingtables_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `table_categories` (`id`),
  ADD CONSTRAINT `bookingtables_gbooking_id_foreign` FOREIGN KEY (`GBooking_id`) REFERENCES `tbl_gbookings` (`id`);

--
-- Constraints for table `bookingtable_translations`
--
ALTER TABLE `bookingtable_translations`
  ADD CONSTRAINT `bookingtable_translations_bookingtable_id_foreign` FOREIGN KEY (`bookingtable_id`) REFERENCES `bookingtables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookingtable_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `car_banners`
--
ALTER TABLE `car_banners`
  ADD CONSTRAINT `car_banners_gbooking_id_foreign` FOREIGN KEY (`GBooking_id`) REFERENCES `tbl_gbookings` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_gbooking_id_foreign` FOREIGN KEY (`GBooking_id`) REFERENCES `tbl_gbookings` (`id`);

--
-- Constraints for table `gbooking_translations`
--
ALTER TABLE `gbooking_translations`
  ADD CONSTRAINT `gbooking_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gbooking_translations_tbl_gbooking_id_foreign` FOREIGN KEY (`tbl_gbooking_id`) REFERENCES `tbl_gbookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_category_translations`
--
ALTER TABLE `restaurant_category_translations`
  ADD CONSTRAINT `restaurant_category_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_category_translations_restaurant_category_id_foreign` FOREIGN KEY (`restaurant_category_id`) REFERENCES `restaurant_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_food_translations`
--
ALTER TABLE `restaurant_food_translations`
  ADD CONSTRAINT `restaurant_food_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_food_translations_restaurant_food_id_foreign` FOREIGN KEY (`restaurant_food_id`) REFERENCES `restaurant_foods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  ADD CONSTRAINT `restaurant_orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `ship_addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `restaurant_carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_orders_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_orders_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `restaurant_foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant_translations`
--
ALTER TABLE `restaurant_translations`
  ADD CONSTRAINT `restaurant_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_translations_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ship_addresses`
--
ALTER TABLE `ship_addresses`
  ADD CONSTRAINT `ship_addresses_cust_id_foreign` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `table_categories`
--
ALTER TABLE `table_categories`
  ADD CONSTRAINT `table_categories_gbooking_id_foreign` FOREIGN KEY (`GBooking_id`) REFERENCES `tbl_gbookings` (`id`);

--
-- Constraints for table `table_category_translations`
--
ALTER TABLE `table_category_translations`
  ADD CONSTRAINT `table_category_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `table_category_translations_table_category_id_foreign` FOREIGN KEY (`table_category_id`) REFERENCES `table_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
