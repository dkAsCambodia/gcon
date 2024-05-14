-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:43 AM
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
(1, 'Khun Chao', 1, NULL, '2024-04-23 01:00:23'),
(2, 'Owner', 1, NULL, '2024-04-23 01:00:09'),
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
(1, 1, 1, 'images/concertTable/tzlbHEIesxiRPsbRwSXKI3mvfDN1Ya-metac21hbGwuanBn-.jpg', NULL, '300', '3', NULL, '10', 0, 1, 0, '2024-03-26 08:13:50', '2024-05-06 00:40:17'),
(2, 1, 2, 'images/concertTable/3NhJziOgyTXBqzr7qxksnk3ZjSYnA1-metac21hbGwyLmpwZw==-.jpg', NULL, '500', '3', NULL, '10', 1, 1, 0, '2024-03-26 08:13:50', '2024-05-06 00:40:06'),
(4, 1, 5, 'images/concertTable/CFeF9p4LjiLRLFTKy8xWF4xSguY3Sb-metaYmlnMS5qcGc=-.jpg', NULL, '700', '3', NULL, '5', 2, 1, 0, NULL, '2024-05-06 00:39:58'),
(5, 1, 6, 'images/concertTable/ggoi4pb5cmoW8tZ3nykvFrpBl8fauF-metadmlwMS5qcGc=-.jpg', NULL, '1000', '3', NULL, '5', 3, 1, 0, NULL, '2024-05-06 00:40:39'),
(6, 1, 6, 'images/concertTable/VA5FTNZnLghLQ8DPlFh9uFf0IrRjlo-metacGhvdG9fMjAyNC0wMi0yNl8xMy00MC0yMi5qcGc=-.jpg', NULL, '1000', '3', NULL, '10', 1, 1, 0, '2024-04-26 23:35:03', '2024-05-06 01:59:36'),
(7, 1, 6, 'images/concertTable/rpqoc9suzoyCFohLPgBrXXjovzHacG-metacGhvdG9fMjAyNC0wMi0yNl8xMy00MS0xMS5qcGc=-.jpg', NULL, '100', '1', NULL, '6', 7, 1, 0, '2024-04-26 23:43:01', '2024-05-06 00:39:18');

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
(12, 5, 2, 'nam thai', 'dgdfg', NULL, NULL, '2024-04-27 01:21:11', '2024-04-27 01:21:11');

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
  `paymentType` varchar(255) DEFAULT NULL,
  `concert_booking_date` varchar(255) DEFAULT NULL,
  `concert_arrival_time` varchar(255) DEFAULT NULL,
  `future_payment_custId` varchar(255) DEFAULT NULL,
  `payment_timezone` varchar(255) DEFAULT NULL,
  `payment_time` varchar(255) DEFAULT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concert_tbl_transactions`
--

INSERT INTO `concert_tbl_transactions` (`id`, `user_id`, `GBooking_id`, `cat_id`, `tableId`, `transaction_id`, `quantity`, `total_amount`, `currency`, `currency_symbol`, `response_all`, `receipt_url`, `message`, `name`, `phone`, `email`, `address`, `no_of_people`, `paymentType`, `concert_booking_date`, `concert_arrival_time`, `future_payment_custId`, `payment_timezone`, `payment_time`, `gateway_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '1', '2', '2', NULL, '3', '฿‎1500', 'THB', '฿‎', NULL, NULL, NULL, 'er', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'online', '2024-04-12', '02:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-05 04:41:47', '2024-04-05 04:41:47'),
(2, '', '1', '2', '2', NULL, '2', '1000', 'THB', '฿‎', NULL, NULL, NULL, 'df', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '32', 'online', '2024-04-18', '03:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-05 04:44:12', '2024-04-05 04:44:12'),
(3, '', '1', '2', '2', NULL, '1', '500', 'THB', '฿‎', NULL, NULL, NULL, 'dd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '23', 'online', '2024-04-17', '01:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-05 04:45:54', '2024-04-05 04:45:54'),
(4, '', '1', '2', '2', 'PAYID-MYHYEPY1SU13319NB9485915', '3', '1500', 'THB', '฿‎', '{\"id\":\"PAYID-MYHYEPY1SU13319NB9485915\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"0E560429ST232283T\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"5HN51205A8081764X\",\"state\":\"completed\",\"amount\":{\"total\":\"1500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"67.35\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"44.41\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MYHYEPY1SU13319NB9485915\",\"create_time\":\"2024-04-05T04:47:22Z\",\"update_time\":\"2024-04-05T04:47:22Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/5HN51205A8081764X\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/5HN51205A8081764X\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYHYEPY1SU13319NB9485915\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-04-05T04:46:54Z\",\"update_time\":\"2024-04-05T04:47:22Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYHYEPY1SU13319NB9485915\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-0E560429ST232283T', 'Donation with Paypal', 'dsfd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '34', 'online', '2024-04-18', '02:00 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-04-05 11:47:24', 'Paypal', 'success', '2024-04-05 04:46:39', '2024-04-05 04:47:24'),
(5, '', '1', '2', '2', NULL, '1', '500', 'THB', '฿‎', NULL, NULL, NULL, 'dsfsd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '23', 'online', '2024-04-11', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-04 18:27:09', '2024-04-05 06:27:09'),
(6, '', '1', '2', '2', 'ch_3P26SNKyHXidWMBJ2VZG1pGY', '5', '2500', 'THB', '฿‎', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3P26SNKyHXidWMBJ2VZG1pGY\",\n    \"object\": \"charge\",\n    \"amount\": 250000,\n    \"amount_captured\": 250000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3P26SNKyHXidWMBJ2m8BWUzV\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1712299259,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 5,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1P26SGKyHXidWMBJ6CcdRniM\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 250000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 250000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPy5vrAGMgbzoplGE946LBYjZuYdW8JZW2Ms1Erxzg0KhjXJojrEBhjvtj5aBfxOow9MidH5AQXQtW_l\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1P26SGKyHXidWMBJ6CcdRniM\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPy5vrAGMgbzoplGE946LBYjZuYdW8JZW2Ms1Erxzg0KhjXJojrEBhjvtj5aBfxOow9MidH5AQXQtW_l', 'Donation with Striipe', 'dfgd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '23', 'online', '2024-04-11', '02:00 PM', NULL, 'Asia/Bangkok', '2024-04-05 13:41:02', 'Stripe', 'success', '2024-04-04 18:40:33', '2024-04-05 06:41:02'),
(7, '14', '1', '6', '5', 'ch_3P27UyKyHXidWMBJ1BaQwEYF', '3', '3000', 'THB', '฿‎', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3P27UyKyHXidWMBJ1BaQwEYF\",\n    \"object\": \"charge\",\n    \"amount\": 300000,\n    \"amount_captured\": 300000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3P27UyKyHXidWMBJ1d8x1MSo\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1712303264,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 64,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1P27UrKyHXidWMBJZDlf3Iq3\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 300000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 300000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKKHZvrAGMga7Qf529Ks6LBY3R4rY2hfOPtl_i6oc82gJkZTrI91TUEK1l0q4IeHJeoBlWxGOHdxaoCEi\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1P27UrKyHXidWMBJZDlf3Iq3\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKKHZvrAGMga7Qf529Ks6LBY3R4rY2hfOPtl_i6oc82gJkZTrI91TUEK1l0q4IeHJeoBlWxGOHdxaoCEi', 'Donation with Striipe', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'online', '2024-04-14', '08:30 PM', NULL, 'Asia/Bangkok', '2024-04-05 14:47:47', 'Stripe', 'success', '2024-04-04 19:46:57', '2024-04-05 07:47:47'),
(8, '14', '1', '2', '2', 'PAYID-MYH3LPY60155811YK573384N', '3', '1500', 'THB', '฿‎', '{\"id\":\"PAYID-MYH3LPY60155811YK573384N\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"6K523041F97965828\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"16F86814J0749440S\",\"state\":\"completed\",\"amount\":{\"total\":\"1500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"67.35\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"44.41\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MYH3LPY60155811YK573384N\",\"create_time\":\"2024-04-05T08:27:16Z\",\"update_time\":\"2024-04-05T08:27:16Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/16F86814J0749440S\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/16F86814J0749440S\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYH3LPY60155811YK573384N\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-04-05T08:26:39Z\",\"update_time\":\"2024-04-05T08:27:16Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYH3LPY60155811YK573384N\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-6K523041F97965828', 'Donation with Paypal', 'dsfd', '765675675676', 'dilip@gmail.com', NULL, '2', 'online', '2024-04-12', '02:30 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-04-05 15:27:19', 'Paypal', 'success', '2024-04-04 20:25:30', '2024-04-05 08:27:19'),
(9, '14', '1', '2', '2', 'PAYID-MYJ4WLA2B825783WP1488457', '2', '1000', 'THB', '฿‎', '{\"id\":\"PAYID-MYJ4WLA2B825783WP1488457\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"4LR323313A642323N\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"9HM090467T370620K\",\"state\":\"completed\",\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"49.90\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"29.45\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MYJ4WLA2B825783WP1488457\",\"create_time\":\"2024-04-08T10:47:34Z\",\"update_time\":\"2024-04-08T10:47:34Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/9HM090467T370620K\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/9HM090467T370620K\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYJ4WLA2B825783WP1488457\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-04-08T10:47:08Z\",\"update_time\":\"2024-04-08T10:47:34Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYJ4WLA2B825783WP1488457\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4LR323313A642323N', 'Donation with Paypal', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '10', 'online', '2024-04-25', '03:00 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-04-08 17:47:35', 'Paypal', 'success', '2024-04-07 22:46:59', '2024-04-08 10:47:35'),
(10, '18', '1', '6', '5', 'PAYID-MYMPZOQ1C945877192620256', '1', '1000', 'THB', '฿‎', '{\"id\":\"PAYID-MYMPZOQ1C945877192620256\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"8D230871WR654783R\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"1XE74889SR2793607\",\"state\":\"completed\",\"amount\":{\"total\":\"1000.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1000.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"49.90\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"29.45\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MYMPZOQ1C945877192620256\",\"create_time\":\"2024-04-12T09:20:40Z\",\"update_time\":\"2024-04-12T09:20:40Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/1XE74889SR2793607\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/1XE74889SR2793607\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYMPZOQ1C945877192620256\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-04-12T09:19:53Z\",\"update_time\":\"2024-04-12T09:20:40Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYMPZOQ1C945877192620256\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-8D230871WR654783R', 'Donation with Paypal', 'jack', '7234567890', 'jack@gmail.com', '25A Alpha', '2', 'online', '2024-04-14', '07:30 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-04-12 16:20:42', 'Paypal', 'success', '2024-04-11 21:18:56', '2024-04-12 09:20:42'),
(11, '19', '1', '2', '2', NULL, '5', '2500', 'THB', '฿‎', NULL, NULL, NULL, 'lulu', '7234567890', 'lulu@gmail.com', '25A Alpha', '2', 'cash', '2024-04-30', '03:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-11 21:45:46', '2024-04-12 09:45:46'),
(12, '20', '1', '5', '4', NULL, '2', '1400', 'THB', '฿‎', NULL, NULL, NULL, 'kheng', '7234567890', 'kheng@gmail.com', '25A Alpha', '2', 'cash', '2024-04-12', '02:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-11 22:34:06', '2024-04-12 10:34:06'),
(13, '14', '1', '1', '1', 'ch_3P6RflKyHXidWMBJ2bwLb24c', '1', '200', 'THB', '฿‎', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3P6RflKyHXidWMBJ2bwLb24c\",\n    \"object\": \"charge\",\n    \"amount\": 20000,\n    \"amount_captured\": 20000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3P6RflKyHXidWMBJ2ZuBDWdB\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1713334125,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 21,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1P6RfhKyHXidWMBJWox1nMVF\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 20000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2024,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 20000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKO7O_bAGMgb2vqy-wbU6LBagyISPrAqpU_bOXCe7l4mdHjR1weGT5qvwwncHuyYUax5VFsI7W37gbjM3\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1P6RfhKyHXidWMBJWox1nMVF\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2024,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKO7O_bAGMgb2vqy-wbU6LBagyISPrAqpU_bOXCe7l4mdHjR1weGT5qvwwncHuyYUax5VFsI7W37gbjM3', 'Donation with Striipe', 'sk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'online', '2024-04-17', '07:00 PM', NULL, 'Asia/Bangkok', '2024-04-17 13:08:46', 'Stripe', 'success', '2024-04-16 18:08:27', '2024-04-17 06:08:46'),
(14, '22', '1', '1', '1', NULL, '3', '600', 'THB', '฿‎', NULL, NULL, NULL, 'bom', '7234567890', 'bom@gmail.com', '25A Alpha', '2', 'cash', '2024-04-19', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-04-18 03:09:33', '2024-04-18 03:09:33'),
(15, '22', '1', '5', '4', 'PAYID-MYQI6XY3KE94088BD3280907', '2', '1400', 'THB', '฿‎', '{\"id\":\"PAYID-MYQI6XY3KE94088BD3280907\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"132465903K695871T\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"1400.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1400.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"8LS42157AT999240K\",\"state\":\"completed\",\"amount\":{\"total\":\"1400.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"1400.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"63.86\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"41.42\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MYQI6XY3KE94088BD3280907\",\"create_time\":\"2024-04-18T03:11:44Z\",\"update_time\":\"2024-04-18T03:11:44Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/8LS42157AT999240K\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/8LS42157AT999240K\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYQI6XY3KE94088BD3280907\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-04-18T03:11:26Z\",\"update_time\":\"2024-04-18T03:11:44Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MYQI6XY3KE94088BD3280907\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-132465903K695871T', 'Donation with Paypal', 'bom', '7234567890', 'bom@gmail.com', '25A Alpha', '2', 'online', '2024-04-18', '03:30 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-04-18 10:11:46', 'Paypal', 'success', '2024-04-18 03:11:21', '2024-04-18 03:11:46'),
(16, '14', '1', '6', '6', NULL, '2', '200', 'USD', '$', NULL, NULL, NULL, 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'cash', '2024-05-23', '09:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-02 03:54:50', '2024-05-02 03:54:50'),
(17, '27', '1', '6', '5', NULL, '1', '1000', 'THB', '฿‎', NULL, NULL, NULL, 'sefsf', '7234567890', '', '25A Alpha', '2', 'cash', '2024-05-09', '02:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-01 20:02:15', '2024-05-02 08:02:15'),
(18, '14', '1', '1', '1', NULL, '1', '300', 'THB', '฿‎', NULL, NULL, NULL, 'cxg', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'cash on delivery', '2024-05-03', '02:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-01 21:04:25', '2024-05-02 09:04:25'),
(19, '14', '1', '2', '2', NULL, '1', '500', 'USD', '฿‎', NULL, NULL, NULL, 'fdgd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'cash on delivery', '2024-05-03', '02:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-01 21:06:17', '2024-05-02 09:06:17'),
(20, '1', '1', '6', '7', NULL, '1', '100', 'USD', '$', NULL, NULL, NULL, 'fdsf', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'online', '2024-05-10', '02:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 21:00:25', '2024-05-06 09:00:25'),
(21, '1', '1', '6', '7', NULL, '1', '100', 'USD', '$', NULL, NULL, NULL, 'fsdf', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'online', '2024-05-10', '01:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 21:01:58', '2024-05-06 09:01:58'),
(22, '1', '1', '6', '5', 'ch_3PDNbCKyHXidWMBJ1aHpf5cV', '1', '1000', 'THB', '฿', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PDNbCKyHXidWMBJ1aHpf5cV\",\n    \"object\": \"charge\",\n    \"amount\": 100000,\n    \"amount_captured\": 100000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PDNbCKyHXidWMBJ14LwBGlQ\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1714986762,\n    \"currency\": \"thb\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 27,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PDNb8KyHXidWMBJIMDEYXpJ\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 100000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2025,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 100000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKIu-4rEGMgYcOGiFKeg6LBZ10dKSP1k8ZucX6g6PswrpE2RA1daWiC6_GmyOfaOpB9maESalMfxbErIm\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PDNb8KyHXidWMBJIMDEYXpJ\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2025,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKIu-4rEGMgYcOGiFKeg6LBZ10dKSP1k8ZucX6g6PswrpE2RA1daWiC6_GmyOfaOpB9maESalMfxbErIm', 'Donation with Striipe', 'jknhkj', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '7', 'online', '2024-05-10', '01:30 PM', NULL, 'Asia/Bangkok', '2024-05-06 16:12:44', 'Stripe', 'success', '2024-05-05 21:09:06', '2024-05-06 09:12:44'),
(23, '1', '1', '1', '1', NULL, '1', '300', 'THB', '฿', NULL, NULL, NULL, 'jnbkj', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'cash on delivery', '2024-05-16', '01:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 21:14:10', '2024-05-06 09:14:10'),
(24, '1', '1', '2', '2', 'PAYID-MY4J7MY8AC33753C9078270J', '1', '500', 'THB', '฿', '{\"id\":\"PAYID-MY4J7MY8AC33753C9078270J\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"4NB73296RB877094W\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"3E264260YB183853W\",\"state\":\"completed\",\"amount\":{\"total\":\"500.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"500.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"32.45\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"14.49\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MY4J7MY8AC33753C9078270J\",\"create_time\":\"2024-05-06T09:15:51Z\",\"update_time\":\"2024-05-06T09:15:51Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/3E264260YB183853W\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/3E264260YB183853W\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MY4J7MY8AC33753C9078270J\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-05-06T09:15:31Z\",\"update_time\":\"2024-05-06T09:15:51Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MY4J7MY8AC33753C9078270J\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-4NB73296RB877094W', 'Donation with Paypal', 'bbvhj', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '5', 'online', '2024-06-17', '04:00 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-05-06 16:15:53', 'Paypal', 'success', '2024-05-05 21:15:24', '2024-05-06 09:15:53'),
(25, '1', '1', '6', '7', 'ch_3PDPONKyHXidWMBJ062oMi3w', '1', '100', 'USD', '$', 'Stripe\\Charge JSON: {\n    \"id\": \"ch_3PDPONKyHXidWMBJ062oMi3w\",\n    \"object\": \"charge\",\n    \"amount\": 10000,\n    \"amount_captured\": 10000,\n    \"amount_refunded\": 0,\n    \"application\": null,\n    \"application_fee\": null,\n    \"application_fee_amount\": null,\n    \"balance_transaction\": \"txn_3PDPONKyHXidWMBJ0n9I1TDi\",\n    \"billing_details\": {\n        \"address\": {\n            \"city\": null,\n            \"country\": null,\n            \"line1\": null,\n            \"line2\": null,\n            \"postal_code\": null,\n            \"state\": null\n        },\n        \"email\": null,\n        \"name\": \"gconofficial@mail.com\",\n        \"phone\": null\n    },\n    \"calculated_statement_descriptor\": \"Stripe\",\n    \"captured\": true,\n    \"created\": 1714993655,\n    \"currency\": \"usd\",\n    \"customer\": null,\n    \"description\": \"Global Payment Gateway created by DK\",\n    \"destination\": null,\n    \"dispute\": null,\n    \"disputed\": false,\n    \"failure_balance_transaction\": null,\n    \"failure_code\": null,\n    \"failure_message\": null,\n    \"fraud_details\": [],\n    \"invoice\": null,\n    \"livemode\": false,\n    \"metadata\": [],\n    \"on_behalf_of\": null,\n    \"order\": null,\n    \"outcome\": {\n        \"network_status\": \"approved_by_network\",\n        \"reason\": null,\n        \"risk_level\": \"normal\",\n        \"risk_score\": 43,\n        \"seller_message\": \"Payment complete.\",\n        \"type\": \"authorized\"\n    },\n    \"paid\": true,\n    \"payment_intent\": null,\n    \"payment_method\": \"card_1PDPOKKyHXidWMBJb4X3ORWR\",\n    \"payment_method_details\": {\n        \"card\": {\n            \"amount_authorized\": 10000,\n            \"brand\": \"visa\",\n            \"checks\": {\n                \"address_line1_check\": null,\n                \"address_postal_code_check\": null,\n                \"cvc_check\": \"pass\"\n            },\n            \"country\": \"US\",\n            \"exp_month\": 11,\n            \"exp_year\": 2027,\n            \"extended_authorization\": {\n                \"status\": \"disabled\"\n            },\n            \"fingerprint\": \"P9se3K90jTsYtugK\",\n            \"funding\": \"credit\",\n            \"incremental_authorization\": {\n                \"status\": \"unavailable\"\n            },\n            \"installments\": null,\n            \"last4\": \"1111\",\n            \"mandate\": null,\n            \"multicapture\": {\n                \"status\": \"unavailable\"\n            },\n            \"network\": \"visa\",\n            \"network_token\": {\n                \"used\": false\n            },\n            \"overcapture\": {\n                \"maximum_amount_capturable\": 10000,\n                \"status\": \"unavailable\"\n            },\n            \"three_d_secure\": null,\n            \"wallet\": null\n        },\n        \"type\": \"card\"\n    },\n    \"receipt_email\": null,\n    \"receipt_number\": null,\n    \"receipt_url\": \"https:\\/\\/pay.stripe.com\\/receipts\\/payment\\/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPjz4rEGMgba6EB9_Ek6LBa9N7KIWqrQoZ3S8qf8uvGLbdgvucXFnbCYcPhToYMsGu4CmQO7n_TclfdD\",\n    \"refunded\": false,\n    \"review\": null,\n    \"shipping\": null,\n    \"source\": {\n        \"id\": \"card_1PDPOKKyHXidWMBJb4X3ORWR\",\n        \"object\": \"card\",\n        \"address_city\": null,\n        \"address_country\": null,\n        \"address_line1\": null,\n        \"address_line1_check\": null,\n        \"address_line2\": null,\n        \"address_state\": null,\n        \"address_zip\": null,\n        \"address_zip_check\": null,\n        \"brand\": \"Visa\",\n        \"country\": \"US\",\n        \"customer\": null,\n        \"cvc_check\": \"pass\",\n        \"dynamic_last4\": null,\n        \"exp_month\": 11,\n        \"exp_year\": 2027,\n        \"fingerprint\": \"P9se3K90jTsYtugK\",\n        \"funding\": \"credit\",\n        \"last4\": \"1111\",\n        \"metadata\": [],\n        \"name\": \"gconofficial@mail.com\",\n        \"tokenization_method\": null,\n        \"wallet\": null\n    },\n    \"source_transfer\": null,\n    \"statement_descriptor\": null,\n    \"statement_descriptor_suffix\": null,\n    \"status\": \"succeeded\",\n    \"transfer_data\": null,\n    \"transfer_group\": null\n}', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xT21UZjBLeUhYaWRXTUJKKPjz4rEGMgba6EB9_Ek6LBa9N7KIWqrQoZ3S8qf8uvGLbdgvucXFnbCYcPhToYMsGu4CmQO7n_TclfdD', 'Donation with Striipe', 'ghfchf', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '4', 'online', '2024-05-10', '02:00 PM', NULL, 'Asia/Bangkok', '2024-05-06 18:07:38', 'Stripe', 'success', '2024-05-05 23:07:21', '2024-05-06 11:07:38'),
(26, '1', '1', '5', '4', NULL, '1', '700', 'THB', '฿', NULL, NULL, NULL, 'pk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'cash on delivery', '2024-05-16', '01:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:14:16', '2024-05-06 11:14:16'),
(27, '1', '1', '1', '1', NULL, '1', '300', 'THB', '฿', NULL, NULL, NULL, 'dddddd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'cash on delivery', '2024-05-15', '02:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:25:54', '2024-05-06 11:25:54'),
(28, '1', '1', '1', '1', NULL, '1', '300', 'THB', '฿', NULL, NULL, NULL, 'dgdfg', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'cash on delivery', '2024-05-09', '02:30 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:28:36', '2024-05-06 11:28:36'),
(29, '1', '1', '2', '2', NULL, '1', '500', 'THB', '฿', NULL, NULL, NULL, 'dgfd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '2', 'cash on delivery', '2024-05-08', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:29:28', '2024-05-06 11:29:28'),
(30, '1', '1', '6', '6', NULL, '1', '1000', 'THB', '฿', NULL, NULL, NULL, 'dgd', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'cash on delivery', '2024-05-24', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:30:57', '2024-05-06 11:30:57'),
(31, '1', '1', '6', '6', NULL, '1', '1000', 'THB', '฿', NULL, NULL, NULL, 'ssss', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'cash on delivery', '2024-05-16', '03:00 PM', NULL, NULL, NULL, NULL, 'pending', '2024-05-05 23:36:11', '2024-05-06 11:36:11');
INSERT INTO `concert_tbl_transactions` (`id`, `user_id`, `GBooking_id`, `cat_id`, `tableId`, `transaction_id`, `quantity`, `total_amount`, `currency`, `currency_symbol`, `response_all`, `receipt_url`, `message`, `name`, `phone`, `email`, `address`, `no_of_people`, `paymentType`, `concert_booking_date`, `concert_arrival_time`, `future_payment_custId`, `payment_timezone`, `payment_time`, `gateway_name`, `status`, `created_at`, `updated_at`) VALUES
(32, '1', '1', '5', '4', 'PAYID-MZBOU3I5HA47245AC929252B', '3', '2100', 'THB', '฿', '{\"id\":\"PAYID-MZBOU3I5HA47245AC929252B\",\"intent\":\"sale\",\"state\":\"approved\",\"cart\":\"29P38288DT9500215\",\"payer\":{\"payment_method\":\"paypal\",\"status\":\"VERIFIED\",\"payer_info\":{\"email\":\"sb-a0xcu29988399@personal.example.com\",\"first_name\":\"DK\",\"last_name\":\"Gupta\",\"payer_id\":\"CJEW9GJ4SFFZN\",\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"},\"country_code\":\"US\"}},\"transactions\":[{\"amount\":{\"total\":\"2100.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"2100.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payee\":{\"merchant_id\":\"PLVAQ4NRYMUJ2\",\"email\":\"sb-4ocvf30023489@business.example.com\"},\"item_list\":{\"shipping_address\":{\"recipient_name\":\"DK Gupta\",\"line1\":\"1 Main St\",\"city\":\"San Jose\",\"state\":\"CA\",\"postal_code\":\"95131\",\"country_code\":\"US\"}},\"related_resources\":[{\"sale\":{\"id\":\"78191252P7732040L\",\"state\":\"completed\",\"amount\":{\"total\":\"2100.00\",\"currency\":\"THB\",\"details\":{\"subtotal\":\"2100.00\",\"shipping\":\"0.00\",\"insurance\":\"0.00\",\"handling_fee\":\"0.00\",\"shipping_discount\":\"0.00\",\"discount\":\"0.00\"}},\"payment_mode\":\"INSTANT_TRANSFER\",\"protection_eligibility\":\"ELIGIBLE\",\"protection_eligibility_type\":\"ITEM_NOT_RECEIVED_ELIGIBLE,UNAUTHORIZED_PAYMENT_ELIGIBLE\",\"transaction_fee\":{\"value\":\"88.29\",\"currency\":\"THB\"},\"receivable_amount\":{\"value\":\"62.37\",\"currency\":\"USD\"},\"exchange_rate\":\"0.031001589825119\",\"parent_payment\":\"PAYID-MZBOU3I5HA47245AC929252B\",\"create_time\":\"2024-05-14T04:37:15Z\",\"update_time\":\"2024-05-14T04:37:15Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/78191252P7732040L\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/sale\\/78191252P7732040L\\/refund\",\"rel\":\"refund\",\"method\":\"POST\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MZBOU3I5HA47245AC929252B\",\"rel\":\"parent_payment\",\"method\":\"GET\"}]}}]}],\"failed_transactions\":[],\"create_time\":\"2024-05-14T04:37:01Z\",\"update_time\":\"2024-05-14T04:37:15Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/payments\\/payment\\/PAYID-MZBOU3I5HA47245AC929252B\",\"rel\":\"self\",\"method\":\"GET\"}]}', 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=EC-29P38288DT9500215', 'Donation with Paypal', 'dk', '7234567890', 'dilipkumargupta631@gmail.com', '25A Alpha', '3', 'online', '2024-05-16', '02:00 PM', 'CJEW9GJ4SFFZN', 'Asia/Bangkok', '2024-05-14 11:37:18', 'Paypal', 'success', '2024-05-14 04:36:58', '2024-05-14 04:37:18');

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
(4, 'KHR - Cambodian riel', 'KHR', '៛', NULL, '2024-05-05 23:19:43', '2024-05-05 23:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
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

INSERT INTO `customers` (`id`, `card_number`, `name`, `email`, `phone`, `member_type`, `address`, `city`, `state`, `country`, `issue_by`, `password`, `line_id`, `facebook_id`, `instagram`, `status`, `created_at`, `updated_at`) VALUES
(1, 'G00001', 'dk', 'dilipkumargupta631@gmail.com', '7234567890', '1', '25A Alpha', 'poipet', 'sfsdfsdf', 'KH', '1', 'enp6enp6eno=', NULL, NULL, NULL, 1, '2024-01-17 03:32:07', '2024-02-17 03:32:07'),
(2, 'G00002', 'dkk', 'dilipkumargupt631@gmail.com', '7234567891', '1', '25A Alpha', 'poipet', 'zcfxzdvfxdzvf', 'KH', '1', '$2y$12$p15yjrHMH7cBQgOe..Ry/u9EhZblhzLq3fURso0pi1wv73P3iEyPS', NULL, NULL, NULL, 1, '2024-02-16 23:05:05', '2024-02-17 11:05:06'),
(3, 'D00001', 'gh', 'payment@gtechz.com', '8888888888', '1', 'Customer Address Line 1', 'Bangkok', 'Bangkok', 'TH', '3', '$2y$12$t095xOENgfAZ03l44tkESustgVF7IA.2YlbjjPn9T62QKuXtUbhNy', NULL, NULL, NULL, 1, '2024-02-16 23:40:57', '2024-02-17 11:40:57'),
(4, 'D00002', 'dd', 'dilipkumarpta631@gmail.com', '7234567892', '2', 'Lucknow', 'Lucknow', 'Udfgdrgd', 'TH', '2', '$2y$12$C/AHqYzIG94/QpQPliUM/.hrKatBUyzaHOyy7Xtcygg0M8P35xOkW', NULL, NULL, NULL, 1, '2024-02-16 23:43:54', '2024-02-17 11:43:54'),
(5, 'D00003', 'gg', 'dilipkumarg631@gmail.com', '7234567877', '1', 'Lucknow', 'Lucknow', 'Up', 'TH', '4', '$2y$12$07c.h5SGqaQnVjE.hvVNOOzU9dotZVv8AVe0q1OaMLWuPi3rQJx5W', NULL, NULL, NULL, 1, '2024-02-16 23:45:25', '2024-02-17 11:45:25'),
(6, 'G00004', 'gg', 'payent@gtechz.com', '8888888877', '1', 'Customer Address Line 1', 'Bangkok', 'Bangkok', 'TH', '4', '$2y$12$vF2xsHhu72O2sgbbYHFZjelOpJAooF4ni7UDn0.yw8AyCUZmKzYPa', NULL, NULL, NULL, 1, '2024-02-16 23:48:32', '2024-02-17 11:48:32'),
(7, 'D00005', 'dh', 'dilipkargupta631@gmail.com', '7234567856', '2', '25A Alpha', 'poipet', 'dxfgbfhg', 'KH', '4', '$2y$12$OHh93DYa7RtcLj1nbeFfxe3wjr1rK1UGLEtZXX8E1VCCa/Vd0ayw.', NULL, NULL, NULL, 0, '2024-02-16 23:54:22', '2024-04-23 00:34:01'),
(8, 'G00005', 'sk', 'sak631@gmail.com', '7234567899', '1', '25A Alpha', 'poipet', 'poipet', 'KH', '1', '$2y$12$.Ni0mMLRaYrH1EAZ.K6G.OHT2VTaMJYPJPuWOo.fNpLl6DLzIb2p2', NULL, NULL, NULL, 1, '2024-02-19 02:59:22', '2024-04-18 03:47:37'),
(9, 'G00006', 'dd', 'dd@gmail.com', '7234567896', '1', 'Lucknow', 'Lucknow', 'Up', 'TH', '1', '$2y$12$CMlmqAf4XiBNG2KnUIKKVuCZWQJmm6geaAyHzG4NOS.HONq98f6lq', NULL, NULL, NULL, 0, '2024-02-18 19:44:04', '2024-02-19 07:44:04'),
(11, 'G00008', 'aa', 'aa@gmail.com', '7234567895', '1', 'Lucknow', 'Lucknow', 'Up', 'TH', '1', 'YWFhYWFhYWE=', NULL, NULL, NULL, 1, '2024-02-18 21:55:17', '2024-02-19 09:55:17'),
(12, 'D00004', 'pk', 'pk@gmail.com', '7234567777', '2', '25A Alpha', 'poipet', 'fdhfdhfh', 'KH', '1', 'cHBwcHBwcHA=', NULL, NULL, NULL, 0, '2024-02-20 03:14:20', '2024-04-23 00:33:46'),
(13, 'G00009', 'dk', 'gcon@gmail.com', '723455676575', '1', '25A Alpha', 'poipet', 'dgdfgdf', 'KH', '3', 'cGFzc3dvcmQ=', NULL, NULL, NULL, 1, '2024-03-19 03:00:42', '2024-03-19 03:00:42'),
(14, 'G00010', 'aaaa', 'aa@mail.com', '72345678789 ', '1', 'poipet', 'poipet', 'fdhgfh', 'KH', '4', 'YWFhYWFhYWFhYQ==', 'aaaa', 'dfgdfg', '', 1, '2024-04-04 22:10:27', '2024-05-01 20:32:43'),
(22, 'G00015', 'bom', 'bom@gmail.com', '7234567890', '1', '25A Alpha', 'ghfh', 'gfhfhfgh', 'IN', '5', 'cGFzc3dvcmQ=', NULL, NULL, NULL, 1, '2024-04-17 20:09:33', '2024-04-23 00:33:27');

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
(2, 'Thai', 'th', 1, 1, 'images/flages/33E2eZn55Ma8kPwuqhz4Muy52Vg7L9-metadGgucG5n-.png', NULL, '2024-04-24 01:48:11'),
(3, 'Khmer', 'kh', 2, 1, 'images/flages/VgUUq8v5doC7vRvr2iVJmbXSLGAXkr-metaa2gucG5n-.png', NULL, '2024-04-24 01:47:59'),
(4, 'dkfgdfg', 'dk', 3, 0, 'images/flages/V7yk46TlJ38DhxtMSdTmFvv60RDmiO-metaZ3IucG5n-.png', '2024-04-23 21:30:00', '2024-04-24 01:48:45'),
(5, 'China', 'ch', 5, 0, 'images/flages/01HWVR17VE50NX6TKRKZ8WFF0Q.jpg', '2024-05-01 21:12:07', '2024-05-02 00:07:38');

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
(1, 'Gold', '10', 1, NULL, NULL),
(2, 'Diamond', '20', 1, NULL, NULL),
(3, 'Normal', '2', 1, NULL, '2024-05-02 21:18:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
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
(29, '2024_05_06_044656_create_currencies_table', 26);

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
('c03f3a9e-9409-4828-899a-7928e0ad0a0d', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 2, '{\"actions\":[],\"body\":null,\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Saved successfully By DK\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-05-05 21:31:42', '2024-05-05 21:31:42');

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
('gconadmin@gmail.com', '$2y$12$OaClDGvGIpUNV.YENYTaGO.fmGZNihKg4Ng8PV1F57vyUC8Dz750.', '2024-04-20 00:24:42');

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
(1, 1, 0, 1, '2024-03-07 07:08:15', '2024-04-25 21:15:32'),
(2, 1, 1, 1, '2024-03-27 07:08:15', '2024-03-27 07:08:15'),
(5, 1, 3, 1, '2024-03-25 06:18:03', '2024-04-25 21:14:49'),
(6, 1, 2, 1, '2024-03-26 06:18:03', '2024-04-26 01:05:49');

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
(10, 6, 1, 'VIP', '2024-03-26 06:19:25', '2024-04-26 01:02:38'),
(11, 6, 2, 'วีไอพี', '2024-03-17 06:22:23', '2024-03-24 06:22:23'),
(12, 6, 3, 'វីអាយភី', '2024-03-17 06:22:23', '2024-03-24 06:22:23');

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
(13, 'images/services/eh7lPc5NTfxOXemzyjfJZuKMHUp7jj-metaNS5qcGc=-.jpg', NULL, '5', 'hgd', 'GEntertainment', 0, 0, 2, '2024-04-24 23:28:22', '2024-04-25 02:25:46');

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
(4, NULL, '01:30', 'PM', 3, 1, '2024-04-18 07:36:19', '2024-04-18 07:36:19'),
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
  `email_verified_at` mediumtext DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'G-CON Admin', 'gconadmin@gmail.com', NULL, '$2y$12$3DQuDCnngh/nQGvdulr8CeizWUqjOQrom7mET4nKkfm64nkZkM3G2', 'WihmKqUXBnyUS2WxtJeCO0rKZS3lYxGxO8cUI5wc0Im5aJ599fk2Bq443M5e', '2024-04-17 21:33:13', '2024-04-29 20:18:13'),
(4, 'dk', 'dk@gmail.com', NULL, '$2y$12$Mx6CUYoZ3BsQuhbUq09V2Obk8gYJsqJbs5/3.jesPMNo2g2hUTTmq', NULL, '2024-04-22 00:09:38', '2024-04-22 00:09:58');

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
-- Indexes for table `concert_tbl_transactions`
--
ALTER TABLE `concert_tbl_transactions`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bookingtable_translations`
--
ALTER TABLE `bookingtable_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `concert_tbl_transactions`
--
ALTER TABLE `concert_tbl_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_categories`
--
ALTER TABLE `table_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_category_translations`
--
ALTER TABLE `table_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `gbooking_translations`
--
ALTER TABLE `gbooking_translations`
  ADD CONSTRAINT `gbooking_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gbooking_translations_tbl_gbooking_id_foreign` FOREIGN KEY (`tbl_gbooking_id`) REFERENCES `tbl_gbookings` (`id`) ON DELETE CASCADE;

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
