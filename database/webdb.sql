-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2022 at 11:46 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ottil_admin`
--

DROP TABLE IF EXISTS `ottil_admin`;
CREATE TABLE IF NOT EXISTS `ottil_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pass_key` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `type` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `ip` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ottil_admin`
--

INSERT INTO `ottil_admin` (`id`, `username`, `password`, `pass_key`, `email`, `name`, `logo`, `date_create`, `type`, `status`, `ip`) VALUES
(1, 'vRWfcODiqJ', 'c1BiMFRxOXk3VFE2NndXb2dONjRuQT09JiY1NjQ0MWNmZmYwNTA5ODY4M2M3MWMyODdmZDNmNWFhMg==', '3203130', 'vRWfcODiqJ@mail.com', 'vRWfcODiqJ', 'logo.png', '2022-02-08 17:33:17', 1, 1, 'local'),
(2, 'W8QrAsWQ3T', 'eXlSemJ5NndsYktNQ2JtZVRaQ2lkQT09JiZjZTVhY2U5Y2UzMTRlZGNhYTc2ZGM4MDNjY2FmYzQwZQ==', '7110590', 'W8QrAsWQ3T@mail.com', 'W8QrAsWQ3T', 'logo.png', '2022-02-08 17:34:08', 1, 1, 'local'),
(3, 'KWL4zwIcV4', 'RjY2ZE01YS93UlowZkpqbE9heE1XUT09JiZmMzhmZTE2OGYyZGY4NDEwYWE3OGYzZjhiNjM0MmU0YQ==', '1210479', 'KWL4zwIcV4@mail.com', 'KWL4zwIcV4', 'logo.png', '2022-02-08 17:34:43', 1, 1, 'local'),
(4, 'H4elohICcm', 'WUUwb1lEdVJMbERlWHprMnU4S09ZZz09JiY5OGNmYTZkMjZiZDQxMzVlZjMzYmFjNzNkMWZlNmE4Mg==', '3518621', 'H4elohICcm@mail.com', 'H4elohICcm', 'logo.png', '2022-02-08 17:35:01', 1, 1, 'local');

-- --------------------------------------------------------

--
-- Table structure for table `ottil_cms`
--

DROP TABLE IF EXISTS `ottil_cms`;
CREATE TABLE IF NOT EXISTS `ottil_cms` (
  `page_id` int(120) NOT NULL AUTO_INCREMENT,
  `order` int(120) NOT NULL,
  `level` int(20) NOT NULL,
  `parent` int(120) NOT NULL,
  `position` int(20) NOT NULL,
  `published` int(20) NOT NULL,
  `default` int(20) NOT NULL,
  `featured` int(20) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220202101449, 'AdminMigration', '2022-02-02 06:52:33', '2022-02-02 06:52:34', 0),
(20220202105351, 'Admin1Migration', '2022-02-02 07:10:29', '2022-02-02 07:10:30', 0),
(20220202111520, 'CmsMigration', '2022-02-02 07:25:56', '2022-02-02 07:25:57', 0),
(20220208061504, 'Admin2Migration', '2022-02-08 02:19:04', '2022-02-08 02:19:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_attempts`
--

DROP TABLE IF EXISTS `phpauth_attempts`;
CREATE TABLE IF NOT EXISTS `phpauth_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(39) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_config`
--

DROP TABLE IF EXISTS `phpauth_config`;
CREATE TABLE IF NOT EXISTS `phpauth_config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  UNIQUE KEY `setting` (`setting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpauth_config`
--

INSERT INTO `phpauth_config` (`setting`, `value`) VALUES
('allow_concurrent_sessions', '0'),
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+30 minutes'),
('cookie_http', '1'),
('cookie_name', 'phpauth_session_cookie'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_renew', '+5 minutes'),
('cookie_samesite', 'Strict'),
('cookie_secure', '1'),
('custom_datetime_format', 'Y-m-d H:i'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '3'),
('recaptcha_enabled', '0'),
('recaptcha_secret_key', ''),
('recaptcha_site_key', ''),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_activation_page_append_code', '0'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_language', 'en_GB'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_password_reset_page_append_code', '0'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_debug', '0'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'phpauth_attempts'),
('table_emails_banned', 'phpauth_emails_banned'),
('table_requests', 'phpauth_requests'),
('table_sessions', 'phpauth_sessions'),
('table_translations', 'phpauth_translation_dictionary'),
('table_users', 'phpauth_users'),
('translation_source', 'php'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_emails_banned`
--

DROP TABLE IF EXISTS `phpauth_emails_banned`;
CREATE TABLE IF NOT EXISTS `phpauth_emails_banned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_requests`
--

DROP TABLE IF EXISTS `phpauth_requests`;
CREATE TABLE IF NOT EXISTS `phpauth_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `token` char(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expire` datetime NOT NULL,
  `type` enum('activation','reset') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `token` (`token`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_sessions`
--

DROP TABLE IF EXISTS `phpauth_sessions`;
CREATE TABLE IF NOT EXISTS `phpauth_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `device_id` varchar(36) DEFAULT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` char(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phpauth_sessions`
--

INSERT INTO `phpauth_sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `device_id`, `agent`, `cookie_crc`) VALUES
(3, 1, '7e583ccf0774cfd8cd54c38941202ae06376f3d4', '2022-02-21 13:07:30', '::1', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.102 Safari/537.36', '00eac154972c4a79023f1440e75af2f906351150');

-- --------------------------------------------------------

--
-- Table structure for table `phpauth_users`
--

DROP TABLE IF EXISTS `phpauth_users`;
CREATE TABLE IF NOT EXISTS `phpauth_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phpauth_users`
--

INSERT INTO `phpauth_users` (`id`, `email`, `password`, `isactive`, `dt`) VALUES
(1, 'admin@admin.com', '$2y$10$OA4lcEKuH8zum6vBohclfOCIKG7R2O3EA41I3e2Wi4AsVh1dmwW4C', 1, '2022-02-21 10:13:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
