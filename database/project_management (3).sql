-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 12, 2020 at 02:42 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `activity_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(11) UNSIGNED DEFAULT NULL,
  `activity_type_id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `waiting_on` varchar(70) DEFAULT NULL,
  `waiting_since` date DEFAULT NULL,
  `next_activity` varchar(300) DEFAULT NULL,
  `assigned_to_id` int(11) UNSIGNED DEFAULT NULL,
  `sponsor_id` int(11) UNSIGNED DEFAULT NULL,
  `percentage_completion` int(4) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status_id` int(11) UNSIGNED DEFAULT NULL,
  `priority_id` int(11) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime DEFAULT NULL,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `cost` decimal(22,2) DEFAULT '0.00',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `system_user_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `assigned_to` (`assigned_to_id`),
  KEY `priority_id` (`priority_id`),
  KEY `system_user_id` (`system_user_id`),
  KEY `project_id` (`project_id`),
  KEY `status_id` (`status_id`),
  KEY `activity_type_id` (`activity_type_id`),
  KEY `activity_ibfk_7` (`currency_id`),
  KEY `sponsor_id` (`sponsor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `project_id`, `activity_type_id`, `subject`, `waiting_on`, `waiting_since`, `next_activity`, `assigned_to_id`, `sponsor_id`, `percentage_completion`, `description`, `status_id`, `priority_id`, `start_date`, `end_date`, `currency_id`, `cost`, `created`, `system_user_id`) VALUES
(10, 2, 12, 'forecast of budget', NULL, NULL, 'Liaise with the PMO on additional funding.', 1, 1, 0, 'Based on our forecasts, we will run out of budget very soon.', 1, 4, '2020-05-08 10:47:15', NULL, 1, '43000.00', '2020-01-23 14:06:03', NULL),
(11, 1, 12, 'test', NULL, NULL, NULL, 1, NULL, NULL, 'test', NULL, 4, '2020-05-08 10:55:18', '2020-05-16 10:55:18', 1, '21340500.00', '2020-05-08 10:55:18', NULL),
(12, 1, 12, 'test2', NULL, NULL, NULL, 1, NULL, NULL, 'Test 2', NULL, 4, '2020-02-10 12:47:55', '2020-02-12 12:47:55', 1, '1234000.00', '2020-05-08 12:47:55', NULL),
(13, 1, 12, 'test', NULL, NULL, NULL, 1, NULL, NULL, 'Test', NULL, 5, '2020-02-02 00:00:00', '2020-02-05 00:00:00', 1, '4350600.00', '2020-05-08 20:45:52', NULL),
(14, 2, 12, 'test', NULL, NULL, NULL, 1, NULL, NULL, 'Test', NULL, 4, '2020-05-08 00:00:00', '2020-05-12 00:00:00', 1, '50000.00', '2020-05-08 21:03:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(11) NOT NULL,
  `symbol` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `code` varchar(3) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `code`, `created`, `modified`) VALUES
(1, 'Naira', '₦', 'NGN', '2020-04-08 10:32:42', '2020-04-08 10:32:42'),
(2, 'Dollar', '$', 'USD', '2020-04-08 10:38:01', '2020-04-08 10:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `milestones`
--

DROP TABLE IF EXISTS `milestones`;
CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_number` varchar(100) DEFAULT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` varchar(100) DEFAULT 'N',
  `status_id` int(11) UNSIGNED DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `achievement` varchar(100) DEFAULT NULL,
  `trigger_id` int(11) UNSIGNED DEFAULT NULL,
  `completed_date` date DEFAULT NULL,
  `expected_completion_date` date DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `project_id` (`project_id`),
  KEY `trigger_id` (`trigger_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `record_number`, `project_id`, `amount`, `payment`, `status_id`, `description`, `achievement`, `trigger_id`, `completed_date`, `expected_completion_date`, `created`, `modified`) VALUES
(25, '1-256RU', 1, 5000000, 'Y', 1, 'khibbj', '', NULL, NULL, '2020-02-15', '2020-02-06 17:36:17', '2020-02-06 17:36:17'),
(34, '45ad23e3', 3, 4300, 'Y', 1, 'Drilling of boreholes for all schools in Abeokuta', 'None', NULL, NULL, NULL, '2020-03-13 13:04:46', '2020-03-13 13:04:46'),
(35, '6655cb4b', 3, 4300, 'Y', 1, 'Drilling of boreholes for all schools in Abeokuta', 'None', NULL, NULL, NULL, '2020-03-13 13:06:53', '2020-03-13 13:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

DROP TABLE IF EXISTS `project_details`;
CREATE TABLE IF NOT EXISTS `project_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(11) UNSIGNED NOT NULL,
  `vendor_id` int(11) UNSIGNED DEFAULT NULL,
  `manager_id` int(11) UNSIGNED DEFAULT NULL,
  `sponsor_id` int(11) UNSIGNED DEFAULT NULL,
  `waiting_since` date DEFAULT NULL,
  `waiting_on_id` int(11) UNSIGNED DEFAULT NULL,
  `status_id` int(11) UNSIGNED DEFAULT NULL,
  `priority_id` int(11) UNSIGNED NOT NULL,
  `start_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `completed_percent` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `system_user_id` int(11) UNSIGNED DEFAULT NULL,
  `annotation_id` int(11) UNSIGNED DEFAULT NULL,
  `environmental_factors` longtext,
  `funding_agencies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `approval` tinyint(1) NOT NULL,
  `price_id` int(11) NOT NULL,
  `sub_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_id` (`project_id`),
  KEY `manager_id` (`manager_id`),
  KEY `sponsor_id` (`sponsor_id`),
  KEY `status_id` (`status_id`),
  KEY `system_user_id` (`system_user_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `waiting_on_id` (`waiting_on_id`),
  KEY `priority_id` (`priority_id`),
  KEY `annotation_id` (`annotation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `project_id`, `vendor_id`, `manager_id`, `sponsor_id`, `waiting_since`, `waiting_on_id`, `status_id`, `priority_id`, `start_dt`, `end_dt`, `completed_percent`, `created`, `system_user_id`, `annotation_id`, `environmental_factors`, `funding_agencies`, `approval`, `price_id`, `sub_status_id`) VALUES
(1, 1, 2, 1, NULL, NULL, 1, 1, 5, '2020-04-25', '2000-02-02', '', '2020-02-07 01:06:34', 2, NULL, '', '0', 0, 0, 0),
(2, 2, 1, 1, 1, '2020-01-15', 1, 3, 6, '2017-04-04', '2022-02-09', '', '2019-12-04 15:34:12', 2, NULL, '', '0', 0, 0, 0),
(3, 3, 1, 1, NULL, '2020-01-23', NULL, 1, 6, '2020-04-25', '2000-02-02', '', '2020-02-07 19:40:19', 1, NULL, '', '0', 0, 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`assigned_to_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_3` FOREIGN KEY (`priority_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_4` FOREIGN KEY (`system_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_6` FOREIGN KEY (`activity_type_id`) REFERENCES `lov` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `activity_ibfk_7` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `activity_ibfk_8` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `milestones`
--
ALTER TABLE `milestones`
  ADD CONSTRAINT `milestone_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milestone_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `milestone_ibfk_3` FOREIGN KEY (`trigger_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_details`
--
ALTER TABLE `project_details`
  ADD CONSTRAINT `project_detail_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_3` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_4` FOREIGN KEY (`system_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_5` FOREIGN KEY (`manager_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_6` FOREIGN KEY (`waiting_on_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_7` FOREIGN KEY (`priority_id`) REFERENCES `lov` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_detail_ibfk_8` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
