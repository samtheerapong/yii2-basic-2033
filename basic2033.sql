-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2023 at 09:38 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic2033`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('actor', '3', 1681872855),
('actor', '4', 1681874053),
('actor', '5', 1681896390),
('actor', '6', 1681875596),
('super admin', '1', 1681873162),
('user', '2', 1681872848),
('user', '5', 1681875589);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1681873065, 1681873065),
('/admin/*', 2, NULL, NULL, NULL, 1681873042, 1681873042),
('/gii/*', 2, NULL, NULL, NULL, 1681873056, 1681873056),
('/tickets/*', 2, NULL, NULL, NULL, 1681872566, 1681872566),
('/tickets/tickets/*', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/tickets/tickets/create', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/tickets/tickets/delete', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/tickets/tickets/index', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/tickets/tickets/update', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/tickets/tickets/view', 2, NULL, NULL, NULL, 1681872784, 1681872784),
('/user/*', 2, NULL, NULL, NULL, 1681873033, 1681873033),
('/user/settings/account', 2, NULL, NULL, NULL, 1681874217, 1681874217),
('/user/settings/profile', 2, NULL, NULL, NULL, 1681874217, 1681874217),
('actor', 1, NULL, NULL, NULL, 1681872762, 1681872762),
('admin', 1, NULL, NULL, NULL, 1681872599, 1681872607),
('super admin', 1, NULL, NULL, NULL, 1681873100, 1681873100),
('user', 1, NULL, NULL, NULL, 1681872770, 1681872770);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('super admin', '/*'),
('admin', '/admin/*'),
('admin', '/tickets/*'),
('actor', '/tickets/tickets/create'),
('user', '/tickets/tickets/create'),
('actor', '/tickets/tickets/index'),
('user', '/tickets/tickets/index'),
('actor', '/tickets/tickets/update'),
('actor', '/tickets/tickets/view'),
('user', '/tickets/tickets/view'),
('admin', '/user/*'),
('actor', '/user/settings/account'),
('user', '/user/settings/account'),
('actor', '/user/settings/profile'),
('user', '/user/settings/profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `location` varchar(100) DEFAULT NULL COMMENT 'สถานที่',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `code`, `location`, `color`) VALUES
(1, 'B10201', 'ห้องผู้จัดการ', NULL),
(2, 'B10202', 'ห้องบัญชี', NULL),
(3, 'B10101', 'ห้องไอที', NULL),
(4, 'B10102', 'ห้องฝ่ายผลิต', NULL),
(5, 'B10103', 'ห้องบุคคล', NULL),
(6, 'B10104', 'ห้องจัดซื้อ', NULL),
(7, 'EN0201', 'ห้องวิศวกรรม', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1681800426),
('m140209_132017_init', 1681800815),
('m140403_174025_create_account_table', 1681800815),
('m140504_113157_update_tables', 1681800816),
('m140504_130429_create_token_table', 1681800816),
('m140830_171933_fix_ip_field', 1681800816),
('m140830_172703_change_account_table_name', 1681800816),
('m141222_110026_update_ip_field', 1681800816),
('m141222_135246_alter_username_length', 1681800816),
('m150614_103145_update_social_account_table', 1681800816),
('m150623_212711_fix_username_notnull', 1681800816),
('m151218_234654_add_timezone_to_profile', 1681800816),
('m160929_103127_add_last_login_at_to_user_table', 1681800816),
('m140506_102106_rbac_init', 1681801132),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1681801132),
('m180523_151638_rbac_updates_indexes_without_prefix', 1681801132),
('m200409_110543_rbac_update_mssql_trigger', 1681801132);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'แอดมิน', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Pacific/Kiritimati'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'สาวิกา พินิจ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL),
(6, 'สราวุฒิ โฆษิตเกียรติคุณ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_sources`
--

DROP TABLE IF EXISTS `request_sources`;
CREATE TABLE IF NOT EXISTS `request_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_sources` varchar(45) DEFAULT NULL COMMENT 'แหล่งที่มา',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request_sources`
--

INSERT INTO `request_sources` (`id`, `request_sources`, `color`) VALUES
(1, 'ระบบแจ้งงาน', NULL),
(2, 'โทรศัพท์', NULL),
(3, 'อีเมล', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_id` int(11) DEFAULT NULL COMMENT 'Ticket No.',
  `started_at` varchar(45) DEFAULT NULL COMMENT 'วันที่เริ่ม',
  `finished_at` varchar(45) DEFAULT NULL COMMENT 'วันที่เสร็จ',
  `details` text COMMENT 'รายละเอียด',
  `actor` varchar(200) DEFAULT NULL COMMENT 'ผู้ดำเนินการ',
  `image` text COMMENT 'รูปภาพ',
  PRIMARY KEY (`id`),
  KEY `fk_tasks_tickets1_idx` (`tickets_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `tickets_id`, `started_at`, `finished_at`, `details`, `actor`, `image`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 10, NULL, NULL, NULL, NULL, NULL),
(5, 11, NULL, NULL, NULL, NULL, NULL),
(6, 12, NULL, NULL, NULL, NULL, NULL),
(7, 13, NULL, NULL, NULL, NULL, NULL),
(8, 14, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_at` varchar(45) DEFAULT NULL COMMENT 'วันที่เปิด',
  `request_by` varchar(100) DEFAULT NULL COMMENT 'ผู้แจ้ง',
  `updated_by` varchar(45) DEFAULT NULL COMMENT 'ผู้ปรับปรุง',
  `created_at` varchar(45) DEFAULT NULL COMMENT 'วันที่สร้าง',
  `updated_at` varchar(45) DEFAULT NULL COMMENT 'วันที่ปรับปรุง',
  `tickets_number` varchar(45) DEFAULT NULL COMMENT 'เลขที่',
  `items` text COMMENT 'อุปกรณ์/เครื่องจักร',
  `descriptions` text COMMENT 'รายละเอียด',
  `tickets_type_id` int(11) DEFAULT NULL COMMENT 'ประเภท',
  `tickets_status_id` int(11) DEFAULT NULL COMMENT 'สถานะ',
  `request_sources_id` int(11) DEFAULT NULL COMMENT 'แหล่งที่มา',
  `tickets_urgency_id` int(11) DEFAULT NULL COMMENT 'ความเร่งรีบ',
  `tickets_impact_id` int(11) DEFAULT NULL COMMENT 'ผลกระทบ',
  `tickets_priority_id` int(11) DEFAULT NULL COMMENT 'ความสำคัญ',
  `location_id` int(11) DEFAULT NULL COMMENT 'สถานที่',
  `image` text COMMENT 'รูปภาพ',
  PRIMARY KEY (`id`),
  KEY `fk_tickets_tickets_type1_idx` (`tickets_type_id`),
  KEY `fk_tickets_tickets_status1_idx` (`tickets_status_id`),
  KEY `fk_tickets_request_sources1_idx` (`request_sources_id`),
  KEY `fk_tickets_tickets_urgency1_idx` (`tickets_urgency_id`),
  KEY `fk_tickets_tickets_impact1_idx` (`tickets_impact_id`),
  KEY `fk_tickets_location1_idx` (`location_id`),
  KEY `fk_tickets_tickets_priority1_idx` (`tickets_priority_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `request_at`, `request_by`, `updated_by`, `created_at`, `updated_at`, `tickets_number`, `items`, `descriptions`, `tickets_type_id`, `tickets_status_id`, `request_sources_id`, `tickets_urgency_id`, `tickets_impact_id`, `tickets_priority_id`, `location_id`, `image`) VALUES
(2, '2023-04-18', NULL, '6', NULL, '1681896408', NULL, NULL, NULL, 1, 2, 1, 2, 1, 1, 3, ''),
(3, '2023-04-19', NULL, '5', NULL, '1681896514', NULL, NULL, NULL, 1, 3, 3, 2, 3, 2, 2, ''),
(4, '2023-04-20', NULL, '1', NULL, '1681896229', NULL, NULL, NULL, 2, 2, 2, 1, 1, 3, 4, ''),
(5, '2023-04-20', NULL, '1', NULL, '1681896233', NULL, NULL, NULL, 2, 4, 3, 3, 3, 3, 5, ''),
(6, '2023-04-19', NULL, '5', NULL, '1681896522', NULL, NULL, NULL, 1, 1, 1, 3, 2, 2, 2, ''),
(7, '2023-04-19', NULL, '1', NULL, '1681896240', NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 3, ''),
(8, '2023-04-06', NULL, '1', NULL, '1681896298', NULL, NULL, NULL, 2, 2, 2, 1, 1, 1, 3, ''),
(9, '2023-04-07', NULL, '6', NULL, '1681896447', NULL, NULL, NULL, 2, 2, 2, 1, 1, 1, 4, ''),
(10, '2023-04-19', NULL, '6', NULL, '1681896429', NULL, NULL, NULL, 1, 3, 1, 1, 1, 1, 3, ''),
(11, '2023-04-20', NULL, '1', NULL, '1681896311', NULL, NULL, NULL, 2, 4, 2, 1, 1, 1, 2, ''),
(12, '2023-04-20', NULL, '5', NULL, '1681896530', NULL, NULL, NULL, 1, 4, 1, 1, 3, 1, 1, ''),
(13, '2023-04-14', NULL, '1', '1681895137', '1681895408', NULL, NULL, NULL, 1, 2, 2, 2, 3, 1, 3, ''),
(14, '2023-04-04', '1', '1', '1681896691', '1681896691', NULL, NULL, NULL, 1, 1, 2, 1, 3, 1, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_impact`
--

DROP TABLE IF EXISTS `tickets_impact`;
CREATE TABLE IF NOT EXISTS `tickets_impact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_impact` varchar(45) DEFAULT NULL COMMENT 'ผลกระทบ',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_impact`
--

INSERT INTO `tickets_impact` (`id`, `tickets_impact`, `color`) VALUES
(1, 'ผลกระทบมาก', '#f01313'),
(2, 'สูง', '#f06813'),
(3, 'ปกติ', '#f0cf13'),
(4, 'ไม่มีผลกระทบ', '#2ecc0e');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_priority`
--

DROP TABLE IF EXISTS `tickets_priority`;
CREATE TABLE IF NOT EXISTS `tickets_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_priority` varchar(45) DEFAULT NULL COMMENT 'ความสำคัญ',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_priority`
--

INSERT INTO `tickets_priority` (`id`, `tickets_priority`, `color`) VALUES
(1, 'สำคัญที่สุด', '#f01313'),
(2, 'สำคัญ', '#f06813'),
(3, 'ปกติ', '#f0cf13'),
(4, 'ไม่สำคัญ', '#2ecc0e');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_status`
--

DROP TABLE IF EXISTS `tickets_status`;
CREATE TABLE IF NOT EXISTS `tickets_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_status` varchar(45) DEFAULT NULL COMMENT 'สถานะ',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_status`
--

INSERT INTO `tickets_status` (`id`, `tickets_status`, `color`) VALUES
(1, 'แจ้ง', '#f01313'),
(2, 'ดำเนินการ', '#f06813'),
(3, 'เสร็จสิ้น', '#2ecc0e'),
(4, 'ยกเลิก', '#1A120B');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_type`
--

DROP TABLE IF EXISTS `tickets_type`;
CREATE TABLE IF NOT EXISTS `tickets_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_type` varchar(45) DEFAULT NULL COMMENT 'สถานะ',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_type`
--

INSERT INTO `tickets_type` (`id`, `tickets_type`, `color`) VALUES
(1, 'แจ้งซ่อม', '#070A52'),
(2, 'ร้องขอ', '#41644A');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_urgency`
--

DROP TABLE IF EXISTS `tickets_urgency`;
CREATE TABLE IF NOT EXISTS `tickets_urgency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tickets_urgency` varchar(45) DEFAULT NULL COMMENT 'ความเร่งรีบ',
  `color` varchar(10) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets_urgency`
--

INSERT INTO `tickets_urgency` (`id`, `tickets_urgency`, `color`) VALUES
(1, 'สูงมาก', '#f01313'),
(2, 'สูง', '#f06813'),
(3, 'ปลานกลาง', '#f0cf13'),
(4, 'ไม่รีบ', '#2ecc0e');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(5, 'B0NdNrXuOJPei0uQ7D9Uhxm8afhX0-g9', 1681875358, 0),
(6, 'vQrJPFv3HT6pFkUeI6fG2ty44AkrI1bS', 1681875443, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `status`, `role`) VALUES
(1, 'admin', 'sam47290800@gmail.com', '$2y$12$j/MmNOUbN3rI/SrHJnlZTOyFm8YuHsB3KbRqdwnFt0PayZcWcPECi', 'MVeu5xESZPupQjSOeeAHp5v452fQQkbp', 1681800947, NULL, NULL, '::1', 1681800900, 1681800900, 0, 1681896639, 10, 9),
(2, 'user', 'user@gmail.com', '$2y$12$zTXbEA76U8Vn5WRvoM4tA.eRwsA6qDuwGTrFnMN2TQRi8vyYBwMfK', 'K12hs9ifzJPvwwjf5Ikn-DnFZt3JM7IV', 1681801332, NULL, NULL, '::1', 1681801332, 1681801345, 0, 1681874280, 10, 1),
(3, 'actor', 'actor@gmail.com', '$2y$12$749x4yF9QieHXZDQF9HPTOJPwUyvyI762LRLt13jRPQboQouLX0CO', 'l5TJ90uIAxJqGP1JQ3b-SD3jWoLAMgX2', 1681801376, NULL, NULL, '::1', 1681801376, 1681801376, 0, 1681873755, 10, 2),
(4, 'theerapong', 'theerapong.khan@gmail.com', '$2y$12$KHl/5OYMKramaTPJKL4.N./SwbCT0hVdwakIcCNZ2oIq2QhykzMzK', 'AcwaebQlmk9XCSBTEhX-JXg0qjykK4Df', 1681873998, NULL, NULL, '::1', 1681873998, 1681873998, 0, 1681874085, 10, 1),
(5, 'sawika', 'sawika@nfc.com', '$2y$12$8DsilwgBW17g80fWdeKyMuIIDfZ1Ga/Uw.aHXkJLRXrpkOo5V25fO', '7Re2CJLDg4b2cAU2iSJujnQ1r9nRoxvD', 1681875396, NULL, NULL, '::1', 1681875358, 1681876835, 0, 1681896505, 10, 1),
(6, 'sarawut', 'sarawut@nfc.com', '$2y$12$uRutp0e7S7INLacL/Ntba.xoP1XvC8RYjdpL/va7VVymR3zSCcFxe', 'M3m3bd-S5t-C7pz0NhaiZFJKmxyqc6O8', 1681875478, NULL, NULL, '::1', 1681875443, 1681876817, 0, 1681896403, 10, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_tickets1` FOREIGN KEY (`tickets_id`) REFERENCES `tickets` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `fk_tickets_request_sources1` FOREIGN KEY (`request_sources_id`) REFERENCES `request_sources` (`id`),
  ADD CONSTRAINT `fk_tickets_tickets_impact1` FOREIGN KEY (`tickets_impact_id`) REFERENCES `tickets_impact` (`id`),
  ADD CONSTRAINT `fk_tickets_tickets_priority1` FOREIGN KEY (`tickets_priority_id`) REFERENCES `tickets_priority` (`id`),
  ADD CONSTRAINT `fk_tickets_tickets_status1` FOREIGN KEY (`tickets_status_id`) REFERENCES `tickets_status` (`id`),
  ADD CONSTRAINT `fk_tickets_tickets_type1` FOREIGN KEY (`tickets_type_id`) REFERENCES `tickets_type` (`id`),
  ADD CONSTRAINT `fk_tickets_tickets_urgency1` FOREIGN KEY (`tickets_urgency_id`) REFERENCES `tickets_urgency` (`id`);

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
