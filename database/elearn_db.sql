-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2025 at 02:00 PM
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
-- Database: `elearn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `due_date` datetime NOT NULL,
  `estimated_time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_analytics`
--

CREATE TABLE `daily_analytics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_study_time_seconds` int(11) DEFAULT 0,
  `total_focused_time_seconds` int(11) DEFAULT 0,
  `total_unfocused_time_seconds` int(11) DEFAULT 0,
  `session_count` int(11) DEFAULT 0,
  `average_focus_percentage` decimal(5,2) DEFAULT 0.00,
  `longest_session_seconds` int(11) DEFAULT 0,
  `modules_studied` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_analytics`
--

INSERT INTO `daily_analytics` (`id`, `user_id`, `date`, `total_study_time_seconds`, `total_focused_time_seconds`, `total_unfocused_time_seconds`, `session_count`, `average_focus_percentage`, `longest_session_seconds`, `modules_studied`, `created_at`, `updated_at`) VALUES
(1, 4, '2025-07-18', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(2, 4, '2025-07-19', 3600, 2880, 720, 1, 80.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(3, 4, '2025-07-20', 1800, 1350, 450, 1, 75.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(4, 4, '2025-07-21', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(5, 4, '2025-07-22', 1800, 1440, 360, 1, 80.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(6, 4, '2025-07-23', 3600, 2700, 900, 1, 75.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(7, 4, '2025-07-24', 3600, 2880, 720, 1, 80.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(8, 5, '2025-07-18', 3600, 2880, 720, 1, 80.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(9, 5, '2025-07-19', 1800, 1530, 270, 1, 85.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(10, 5, '2025-07-20', 3600, 3060, 540, 1, 85.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(11, 5, '2025-07-21', 3600, 2880, 720, 1, 80.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(12, 5, '2025-07-22', 1800, 1530, 270, 1, 85.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(13, 5, '2025-07-23', 3600, 3060, 540, 1, 85.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(14, 5, '2025-07-24', 3600, 2700, 900, 1, 75.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(15, 6, '2025-07-18', 1800, 1260, 540, 1, 70.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(16, 6, '2025-07-19', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(17, 6, '2025-07-20', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(18, 6, '2025-07-21', 1800, 1260, 540, 1, 70.00, 1800, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(19, 6, '2025-07-22', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(20, 6, '2025-07-23', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(21, 6, '2025-07-24', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:46:42', '2025-07-24 15:49:24'),
(32, 7, '2025-07-21', 3600, 2160, 1440, 1, 60.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(33, 7, '2025-07-22', 1800, 1080, 720, 1, 60.00, 1800, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(34, 7, '2025-07-23', 3600, 2160, 1440, 1, 60.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(35, 7, '2025-07-24', 1800, 1080, 720, 1, 60.00, 1800, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(36, 8, '2025-07-20', 3600, 3240, 360, 1, 90.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(37, 8, '2025-07-21', 1800, 1620, 180, 1, 90.00, 1800, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(38, 8, '2025-07-22', 3600, 3240, 360, 1, 90.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(39, 8, '2025-07-23', 3600, 3240, 360, 1, 90.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(40, 8, '2025-07-24', 3600, 3240, 360, 1, 90.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(41, 9, '2025-07-21', 900, 360, 540, 1, 40.00, 900, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(42, 9, '2025-07-23', 900, 360, 540, 1, 40.00, 900, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(43, 9, '2025-07-24', 900, 360, 540, 1, 40.00, 900, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(44, 10, '2025-07-19', 3600, 2880, 720, 1, 80.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(45, 10, '2025-07-22', 3600, 2520, 1080, 1, 70.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24'),
(46, 10, '2025-07-24', 3600, 1800, 1800, 1, 50.00, 3600, 1, '2025-07-24 15:49:24', '2025-07-24 15:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `eye_tracking_analytics`
--

CREATE TABLE `eye_tracking_analytics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `total_focus_time` int(11) DEFAULT 0,
  `session_count` int(11) DEFAULT 0,
  `average_session_time` int(11) DEFAULT 0,
  `max_continuous_time` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_focused_time` int(11) DEFAULT 0 COMMENT 'Total focused time in seconds',
  `total_unfocused_time` int(11) DEFAULT 0 COMMENT 'Total unfocused time in seconds',
  `focus_percentage` decimal(5,2) DEFAULT 0.00 COMMENT 'Percentage of time focused'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eye_tracking_analytics`
--

INSERT INTO `eye_tracking_analytics` (`id`, `user_id`, `module_id`, `section_id`, `date`, `total_focus_time`, `session_count`, `average_session_time`, `max_continuous_time`, `created_at`, `updated_at`, `total_focused_time`, `total_unfocused_time`, `focus_percentage`) VALUES
(1, 1, 14, 0, '2025-07-19', 10, 2, 5, 0, '2025-07-19 18:06:57', '2025-07-19 18:08:26', 0, 0, 0.00),
(2, 1, 14, 32, '2025-07-19', 19, 3, 6, 0, '2025-07-19 18:56:20', '2025-07-19 19:37:55', 0, 0, 0.00),
(3, 1, 14, 33, '2025-07-19', 4, 1, 4, 0, '2025-07-19 18:56:50', '2025-07-19 18:56:50', 0, 0, 0.00),
(4, 1, 14, 31, '2025-07-20', 17, 1, 17, 0, '2025-07-20 16:27:37', '2025-07-20 16:27:37', 0, 0, 0.00),
(5, 1, 14, 31, '2025-07-21', 127, 10, 12, 0, '2025-07-21 01:46:01', '2025-07-21 02:29:29', 0, 0, 0.00),
(20, 10, 14, 31, '2025-07-24', 1207, 37, 32, 0, '2025-07-24 04:40:06', '2025-07-24 12:17:28', 4557, 1555, 377.55),
(21, 10, 14, 32, '0000-00-00', 24, 1, 24, 0, '2025-07-24 04:54:57', '2025-07-24 04:54:57', 17, 7, 70.00),
(24, 7, 14, 31, '0000-00-00', 1, 1, 1, 0, '2025-07-24 05:00:39', '2025-07-24 05:00:39', 1, 0, 100.00),
(27, 7, 14, 35, '0000-00-00', 11, 1, 11, 0, '2025-07-24 05:02:10', '2025-07-24 05:02:10', 2, 8, 18.00),
(30, 7, 14, 34, '0000-00-00', 26, 1, 26, 0, '2025-07-24 05:04:12', '2025-07-24 05:04:12', 1, 25, 3.00),
(41, 7, 16, 1, '0000-00-00', 1, 1, 1, 0, '2025-07-24 11:36:47', '2025-07-24 11:36:47', 1, 0, 100.00),
(42, 7, 14, 32, '0000-00-00', 22, 1, 22, 0, '2025-07-24 11:37:53', '2025-07-24 11:37:53', 22, 0, 100.00),
(46, 10, 14, 34, '0000-00-00', 22, 1, 22, 0, '2025-07-24 12:03:30', '2025-07-24 12:03:30', 9, 13, 40.00),
(49, 1, 1, 1, '2025-07-26', 47, 4, 11, 0, '2025-07-26 18:33:24', '2025-07-26 18:35:09', 0, 0, 0.00),
(50, 1, 14, 0, '2025-07-26', 44, 1, 44, 0, '2025-07-26 18:34:39', '2025-07-26 18:34:39', 0, 0, 0.00),
(51, 10, 14, NULL, '2025-08-01', 43, 1, 60, 60, '2025-07-31 16:27:09', '2025-07-31 16:27:09', 0, 0, 0.00),
(52, 9, 14, NULL, '2025-08-01', 33, 1, 60, 60, '2025-07-31 16:30:41', '2025-07-31 16:30:41', 0, 0, 0.00),
(53, 10, 14, NULL, '2025-08-02', 35, 1, 60, 60, '2025-08-02 15:19:40', '2025-08-02 15:19:40', 0, 0, 0.00),
(54, 9, 14, 32, '2025-08-02', 31, 1, 60, 60, '2025-08-02 15:29:47', '2025-08-02 15:29:47', 0, 0, 0.00),
(55, 7, 14, NULL, '2025-08-02', 29, 1, 60, 60, '2025-08-02 15:33:24', '2025-08-02 15:33:24', 0, 0, 0.00),
(56, 7, 14, NULL, '2025-08-02', 49, 1, 120, 120, '2025-08-02 15:34:24', '2025-08-02 15:34:24', 0, 0, 0.00),
(57, 9, 16, NULL, '2025-08-02', 38, 1, 60, 60, '2025-08-02 15:42:11', '2025-08-02 15:42:11', 0, 0, 0.00),
(58, 9, 16, 41, '2025-08-02', 36, 1, 60, 60, '2025-08-02 15:43:38', '2025-08-02 15:43:38', 0, 0, 0.00),
(59, 10, 16, NULL, '2025-08-02', 21, 1, 60, 60, '2025-08-02 15:45:43', '2025-08-02 15:45:43', 0, 0, 0.00),
(60, 10, 16, NULL, '2025-08-02', 53, 1, 120, 120, '2025-08-02 15:46:43', '2025-08-02 15:46:43', 0, 0, 0.00),
(61, 10, 14, NULL, '2025-08-03', 40, 1, 60, 60, '2025-08-02 16:11:15', '2025-08-02 16:11:15', 0, 0, 0.00),
(62, 9, 14, NULL, '2025-08-03', 32, 1, 60, 60, '2025-08-02 16:14:38', '2025-08-02 16:14:38', 0, 0, 0.00),
(63, 9, 14, NULL, '2025-08-03', 81, 1, 120, 120, '2025-08-02 16:15:38', '2025-08-02 16:15:38', 0, 0, 0.00),
(64, 9, 14, NULL, '2025-08-03', 111, 1, 180, 180, '2025-08-02 16:16:38', '2025-08-02 16:16:38', 0, 0, 0.00),
(65, 9, 14, NULL, '2025-08-03', 128, 1, 240, 240, '2025-08-02 16:17:38', '2025-08-02 16:17:38', 0, 0, 0.00),
(66, 9, 14, NULL, '2025-08-04', 38, 1, 60, 60, '2025-08-03 16:53:11', '2025-08-03 16:53:11', 0, 0, 0.00),
(67, 7, 14, NULL, '2025-08-04', 40, 1, 60, 60, '2025-08-03 17:15:41', '2025-08-03 17:15:41', 0, 0, 0.00),
(68, 8, 14, NULL, '2025-08-04', 27, 1, 60, 60, '2025-08-03 17:46:57', '2025-08-03 17:46:57', 0, 0, 0.00),
(69, 8, 14, NULL, '2025-08-04', 29, 1, 120, 120, '2025-08-03 17:47:57', '2025-08-03 17:47:57', 0, 0, 0.00),
(70, 8, 14, 32, '2025-08-05', 12, 1, 60, 60, '2025-08-05 07:29:25', '2025-08-05 07:29:25', 0, 0, 0.00),
(71, 8, 14, NULL, '2025-08-05', 4, 1, 60, 60, '2025-08-05 07:44:12', '2025-08-05 07:44:12', 0, 0, 0.00),
(72, 7, 14, 35, '2025-08-05', 45, 1, 60, 60, '2025-08-05 07:48:28', '2025-08-05 07:48:28', 0, 0, 0.00),
(73, 1, 14, 38, '2025-08-08', 38, 1, 60, 60, '2025-08-08 04:40:21', '2025-08-08 04:40:21', 0, 0, 0.00),
(74, 1, 14, NULL, '2025-08-08', 49, 1, 60, 60, '2025-08-08 04:53:02', '2025-08-08 04:53:02', 0, 0, 0.00),
(75, 12, 17, NULL, '2025-08-29', 28, 1, 60, 60, '2025-08-29 13:02:00', '2025-08-29 13:02:00', 0, 0, 0.00),
(76, 13, 14, NULL, '2025-09-12', 24, 1, 60, 60, '2025-09-12 12:16:02', '2025-09-12 12:16:02', 0, 0, 0.00),
(77, 13, 14, NULL, '2025-09-12', 36, 1, 120, 120, '2025-09-12 12:17:02', '2025-09-12 12:17:02', 0, 0, 0.00),
(78, 14, 14, 32, '2025-09-19', 19, 1, 60, 60, '2025-09-19 14:42:33', '2025-09-19 14:42:33', 0, 0, 0.00),
(79, 14, 14, 35, '2025-09-19', 47, 2, 60, 60, '2025-09-19 14:44:55', '2025-09-19 14:47:44', 0, 0, 0.00),
(81, 14, 14, 38, '2025-09-19', 712, 21, 160, 420, '2025-09-19 14:51:07', '2025-09-19 15:17:41', 0, 0, 0.00),
(102, 15, 14, NULL, '2025-09-20', 37, 1, 60, 60, '2025-09-19 16:10:39', '2025-09-19 16:10:39', 0, 0, 0.00),
(103, 15, 14, NULL, '2025-09-20', 2, 1, 60, 60, '2025-09-19 16:22:00', '2025-09-19 16:22:00', 0, 0, 0.00),
(104, 16, 19, NULL, '2025-10-16', 12, 1, 60, 60, '2025-10-16 14:18:10', '2025-10-16 14:18:10', 0, 0, 0.00),
(105, 16, 19, 48, '2025-10-16', 45, 1, 60, 60, '2025-10-16 14:19:31', '2025-10-16 14:19:31', 0, 0, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `eye_tracking_data`
--

CREATE TABLE `eye_tracking_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `focus_score` decimal(5,2) NOT NULL,
  `reading_speed` decimal(6,2) NOT NULL,
  `retention_rate` decimal(5,2) NOT NULL,
  `reread_frequency` int(11) NOT NULL,
  `focus_duration` int(11) NOT NULL,
  `recorded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_tracking_focus_summary`
--

CREATE TABLE `eye_tracking_focus_summary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_session_time` int(11) DEFAULT 0,
  `total_focused_time` int(11) DEFAULT 0,
  `total_unfocused_time` int(11) DEFAULT 0,
  `focus_percentage` decimal(5,2) DEFAULT 0.00,
  `session_count` int(11) DEFAULT 0,
  `average_focus_duration` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_tracking_preferences`
--

CREATE TABLE `eye_tracking_preferences` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `eye_tracking_enabled` tinyint(1) DEFAULT 1,
  `camera_permission_granted` tinyint(1) DEFAULT 0,
  `agreement_date` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eye_tracking_sessions`
--

CREATE TABLE `eye_tracking_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `total_time_seconds` int(11) DEFAULT 0,
  `session_type` enum('viewing','pause','resume') DEFAULT 'viewing',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `focused_time_seconds` int(11) DEFAULT 0 COMMENT 'Time spent focused in seconds',
  `unfocused_time_seconds` int(11) DEFAULT 0 COMMENT 'Time spent unfocused in seconds',
  `session_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eye_tracking_sessions`
--

INSERT INTO `eye_tracking_sessions` (`id`, `user_id`, `module_id`, `section_id`, `total_time_seconds`, `session_type`, `created_at`, `last_updated`, `focused_time_seconds`, `unfocused_time_seconds`, `session_data`) VALUES
(1, 7, 14, 0, 19, 'viewing', '2025-07-19 17:17:11', '2025-07-19 17:18:43', 0, 0, NULL),
(2, 7, 14, 32, 3, 'viewing', '2025-07-19 17:17:16', '2025-07-19 17:17:16', 0, 0, NULL),
(3, 7, 14, 31, 4, 'viewing', '2025-07-19 17:17:27', '2025-07-19 17:17:27', 0, 0, NULL),
(4, 1, 14, 0, 9, '', '2025-07-19 18:06:57', '2025-07-19 18:06:57', 0, 0, NULL),
(5, 1, 14, 0, 1, '', '2025-07-19 18:08:26', '2025-07-19 18:08:26', 0, 0, NULL),
(6, 1, 14, 32, 9, '', '2025-07-19 18:56:20', '2025-07-19 18:56:20', 0, 0, NULL),
(7, 1, 14, 33, 4, '', '2025-07-19 18:56:50', '2025-07-19 18:56:50', 0, 0, NULL),
(8, 1, 14, 32, 5, '', '2025-07-19 19:01:11', '2025-07-19 19:01:11', 0, 0, NULL),
(9, 1, 14, 32, 5, '', '2025-07-19 19:37:55', '2025-07-19 19:37:55', 0, 0, NULL),
(10, 1, 14, 31, 17, '', '2025-07-20 16:27:37', '2025-07-20 16:27:37', 0, 0, NULL),
(11, 1, 14, 31, 30, '', '2025-07-21 01:46:01', '2025-07-21 01:46:01', 0, 0, NULL),
(12, 1, 14, 31, 30, '', '2025-07-21 01:46:31', '2025-07-21 01:46:31', 0, 0, NULL),
(13, 1, 14, 31, 30, '', '2025-07-21 01:55:49', '2025-07-21 01:55:49', 0, 0, NULL),
(14, 1, 14, 31, 2, '', '2025-07-21 01:56:20', '2025-07-21 01:56:20', 0, 0, NULL),
(15, 1, 14, 31, 4, '', '2025-07-21 01:56:50', '2025-07-21 01:56:50', 0, 0, NULL),
(16, 1, 14, 31, 1, '', '2025-07-21 01:57:20', '2025-07-21 01:57:20', 0, 0, NULL),
(17, 1, 14, 31, 5, '', '2025-07-21 01:58:21', '2025-07-21 01:58:21', 0, 0, NULL),
(18, 1, 14, 31, 5, '', '2025-07-21 01:58:51', '2025-07-21 01:58:51', 0, 0, NULL),
(19, 1, 14, 31, 9, '', '2025-07-21 02:28:59', '2025-07-21 02:28:59', 0, 0, NULL),
(20, 1, 14, 31, 11, '', '2025-07-21 02:29:29', '2025-07-21 02:29:29', 0, 0, NULL),
(21, 1, 14, 31, 30, '', '2025-07-23 18:23:53', '2025-07-23 18:23:53', 20, 10, NULL),
(22, 1, 14, 32, 60, '', '2025-07-23 18:30:17', '2025-07-23 18:30:17', 45, 15, NULL),
(23, 1, 15, 33, 90, '', '2025-07-23 18:30:18', '2025-07-23 18:30:18', 60, 30, NULL),
(24, 1, 14, 34, 45, '', '2025-07-23 18:30:19', '2025-07-23 18:30:19', 30, 15, NULL),
(25, 7, 14, 31, 3, '', '2025-07-24 03:39:22', '2025-07-24 03:39:22', 0, 3, NULL),
(26, 7, 14, 31, 30, '', '2025-07-24 03:39:52', '2025-07-24 03:39:52', 27, 6, NULL),
(27, 7, 14, 31, 30, '', '2025-07-24 03:40:22', '2025-07-24 03:40:22', 55, 8, NULL),
(28, 7, 14, 31, 30, '', '2025-07-24 03:40:53', '2025-07-24 03:40:53', 79, 14, NULL),
(29, 7, 14, 31, 30, '', '2025-07-24 03:41:23', '2025-07-24 03:41:23', 109, 14, NULL),
(30, 7, 14, 31, 30, '', '2025-07-24 03:41:53', '2025-07-24 03:41:53', 134, 19, NULL),
(31, 7, 14, 31, 30, '', '2025-07-24 03:42:23', '2025-07-24 03:42:23', 161, 22, NULL),
(32, 7, 14, 31, 30, '', '2025-07-24 03:42:53', '2025-07-24 03:42:53', 190, 24, NULL),
(33, 7, 14, 31, 30, '', '2025-07-24 03:43:23', '2025-07-24 03:43:23', 212, 32, NULL),
(34, 7, 14, 31, 305, '', '2025-07-24 03:43:53', '2025-07-24 11:41:20', 661, 194, NULL),
(35, 4, 14, NULL, 166, 'viewing', '2025-07-19 04:09:27', '2025-07-24 04:09:27', 83, 83, NULL),
(36, 4, 14, NULL, 180, 'viewing', '2025-07-21 04:09:27', '2025-07-24 04:09:27', 134, 46, NULL),
(37, 4, 14, NULL, 147, 'viewing', '2025-07-20 04:09:27', '2025-07-24 04:09:27', 107, 40, NULL),
(38, 5, 14, NULL, 296, 'viewing', '2025-07-18 04:09:27', '2025-07-24 04:09:27', 215, 81, NULL),
(39, 5, 14, NULL, 259, 'viewing', '2025-07-17 04:09:27', '2025-07-24 04:09:27', 157, 102, NULL),
(40, 5, 14, NULL, 364, 'viewing', '2025-07-23 04:09:27', '2025-07-24 04:09:27', 257, 107, NULL),
(41, 5, 14, NULL, 189, 'viewing', '2025-07-23 04:09:27', '2025-07-24 04:09:27', 92, 97, NULL),
(42, 6, 14, NULL, 262, 'viewing', '2025-07-22 04:09:27', '2025-07-24 04:09:27', 162, 100, NULL),
(43, 6, 14, NULL, 172, 'viewing', '2025-07-21 04:09:27', '2025-07-24 04:09:27', 90, 82, NULL),
(44, 6, 14, NULL, 315, 'viewing', '2025-07-18 04:09:27', '2025-07-24 04:09:27', 224, 91, NULL),
(45, 8, 14, NULL, 167, 'viewing', '2025-07-21 04:09:27', '2025-07-24 04:09:27', 143, 24, NULL),
(46, 8, 14, NULL, 365, 'viewing', '2025-07-23 04:09:27', '2025-07-24 04:09:27', 296, 69, NULL),
(47, 8, 14, NULL, 249, 'viewing', '2025-07-21 04:09:27', '2025-07-24 04:09:27', 227, 22, NULL),
(48, 8, 14, NULL, 126, 'viewing', '2025-07-19 04:09:27', '2025-07-24 04:09:27', 87, 39, NULL),
(49, 9, 14, NULL, 386, 'viewing', '2025-07-18 04:09:27', '2025-07-24 04:09:27', 279, 107, NULL),
(50, 9, 14, NULL, 327, 'viewing', '2025-07-19 04:09:27', '2025-07-24 04:09:27', 234, 93, NULL),
(51, 10, 14, 31, 1157, '', '2025-07-24 04:43:31', '2025-07-24 12:17:28', 4517, 1545, NULL),
(52, 10, 14, 32, 84, '', '2025-07-24 04:54:57', '2025-07-24 04:55:57', 57, 104, NULL),
(53, 7, 14, 35, 71, '', '2025-07-24 05:02:10', '2025-07-24 05:03:10', 45, 76, NULL),
(54, 7, 14, 34, 86, '', '2025-07-24 05:04:12', '2025-07-24 05:05:12', 14, 153, NULL),
(55, 7, 16, 1, 1, '', '2025-07-24 11:36:47', '2025-07-24 11:36:47', 1, 0, NULL),
(56, 7, 14, 32, 43, '', '2025-07-24 11:37:53', '2025-07-24 11:39:03', 42, 0, NULL),
(57, 10, 14, 34, 82, '', '2025-07-24 12:03:30', '2025-07-24 12:04:30', 27, 129, NULL),
(58, 1, 1, 1, 27, '', '2025-07-26 18:33:24', '2025-07-26 18:33:24', 0, 0, NULL),
(59, 1, 1, 1, 18, '', '2025-07-26 18:33:54', '2025-07-26 18:33:54', 0, 0, NULL),
(60, 1, 14, 0, 44, '', '2025-07-26 18:34:39', '2025-07-26 18:34:39', 0, 0, NULL),
(61, 1, 1, 1, 1, '', '2025-07-26 18:35:09', '2025-07-26 18:35:09', 0, 0, NULL),
(62, 1, 1, 1, 1, '', '2025-07-26 18:35:09', '2025-07-26 18:35:09', 0, 0, NULL),
(63, 1, 1, 1, 1, '', '2025-07-26 18:35:09', '2025-07-26 18:35:09', 0, 0, NULL),
(64, 10, 14, NULL, 60, 'viewing', '2025-07-31 16:27:09', '2025-07-31 16:27:09', 0, 0, NULL),
(65, 9, 14, NULL, 60, 'viewing', '2025-07-31 16:30:41', '2025-07-31 16:30:41', 0, 0, NULL),
(66, 10, 14, NULL, 60, 'viewing', '2025-08-02 15:19:40', '2025-08-02 15:19:40', 0, 0, NULL),
(67, 9, 14, 32, 60, 'viewing', '2025-08-02 15:29:47', '2025-08-02 15:29:47', 0, 0, NULL),
(68, 7, 14, NULL, 60, 'viewing', '2025-08-02 15:33:24', '2025-08-02 15:33:24', 0, 0, NULL),
(69, 7, 14, NULL, 120, 'viewing', '2025-08-02 15:34:24', '2025-08-02 15:34:24', 0, 0, NULL),
(70, 9, 16, NULL, 60, 'viewing', '2025-08-02 15:42:11', '2025-08-02 15:42:11', 0, 0, NULL),
(71, 9, 16, 41, 60, 'viewing', '2025-08-02 15:43:38', '2025-08-02 15:43:38', 0, 0, NULL),
(72, 10, 16, NULL, 60, 'viewing', '2025-08-02 15:45:43', '2025-08-02 15:45:43', 0, 0, NULL),
(73, 10, 16, NULL, 120, 'viewing', '2025-08-02 15:46:43', '2025-08-02 15:46:43', 0, 0, NULL),
(74, 10, 14, NULL, 60, 'viewing', '2025-08-02 16:11:15', '2025-08-02 16:11:15', 0, 0, NULL),
(75, 9, 14, NULL, 60, 'viewing', '2025-08-02 16:14:38', '2025-08-02 16:14:38', 0, 0, NULL),
(76, 9, 14, NULL, 120, 'viewing', '2025-08-02 16:15:38', '2025-08-02 16:15:38', 0, 0, NULL),
(77, 9, 14, NULL, 180, 'viewing', '2025-08-02 16:16:38', '2025-08-02 16:16:38', 0, 0, NULL),
(78, 9, 14, NULL, 240, 'viewing', '2025-08-02 16:17:38', '2025-08-02 16:17:38', 0, 0, NULL),
(79, 9, 14, NULL, 60, 'viewing', '2025-08-03 16:53:11', '2025-08-03 16:53:11', 0, 0, NULL),
(80, 7, 14, NULL, 60, 'viewing', '2025-08-03 17:15:41', '2025-08-03 17:15:41', 0, 0, NULL),
(81, 2, 1, NULL, 1800, 'viewing', '2025-08-03 17:20:43', '2025-08-03 17:20:43', 0, 0, NULL),
(82, 8, 14, NULL, 60, 'viewing', '2025-08-03 17:46:57', '2025-08-03 17:46:57', 0, 0, NULL),
(83, 8, 14, NULL, 120, 'viewing', '2025-08-03 17:47:57', '2025-08-03 17:47:57', 0, 0, NULL),
(84, 8, 14, 32, 60, 'viewing', '2025-08-05 07:29:25', '2025-08-05 07:29:25', 0, 0, NULL),
(85, 8, 14, NULL, 60, 'viewing', '2025-08-05 07:44:12', '2025-08-05 07:44:12', 0, 0, NULL),
(86, 7, 14, 35, 60, 'viewing', '2025-08-05 07:48:28', '2025-08-05 07:48:28', 0, 0, NULL),
(87, 1, 14, 38, 60, 'viewing', '2025-08-08 04:40:21', '2025-08-08 04:40:21', 0, 0, NULL),
(88, 1, 14, NULL, 60, 'viewing', '2025-08-08 04:53:02', '2025-08-08 04:53:02', 0, 0, NULL),
(89, 12, 17, NULL, 60, 'viewing', '2025-08-29 13:02:00', '2025-08-29 13:02:00', 0, 0, NULL),
(90, 13, 14, NULL, 60, 'viewing', '2025-09-12 12:16:02', '2025-09-12 12:16:02', 0, 0, NULL),
(91, 13, 14, NULL, 120, 'viewing', '2025-09-12 12:17:02', '2025-09-12 12:17:02', 0, 0, NULL),
(92, 14, 14, 32, 60, 'viewing', '2025-09-19 14:42:33', '2025-09-19 14:42:33', 0, 0, NULL),
(93, 14, 14, 35, 60, 'viewing', '2025-09-19 14:44:55', '2025-09-19 14:44:55', 0, 0, NULL),
(94, 14, 14, 35, 60, 'viewing', '2025-09-19 14:47:44', '2025-09-19 14:47:44', 0, 0, NULL),
(95, 14, 14, 38, 60, 'viewing', '2025-09-19 14:51:07', '2025-09-19 14:51:07', 0, 0, NULL),
(96, 14, 14, 38, 113, 'viewing', '2025-09-19 14:52:07', '2025-09-19 14:52:07', 0, 0, NULL),
(97, 14, 14, 38, 60, 'viewing', '2025-09-19 14:53:51', '2025-09-19 14:53:51', 0, 0, NULL),
(98, 14, 14, 38, 91, 'viewing', '2025-09-19 14:54:51', '2025-09-19 14:54:51', 0, 0, NULL),
(99, 14, 14, 38, 151, 'viewing', '2025-09-19 14:55:51', '2025-09-19 14:55:51', 0, 0, NULL),
(100, 14, 14, 38, 211, 'viewing', '2025-09-19 14:56:51', '2025-09-19 14:56:51', 0, 0, NULL),
(101, 14, 14, 38, 271, 'viewing', '2025-09-19 14:57:51', '2025-09-19 14:57:51', 0, 0, NULL),
(102, 14, 14, 38, 331, 'viewing', '2025-09-19 14:58:51', '2025-09-19 14:58:51', 0, 0, NULL),
(103, 14, 14, 38, 60, 'viewing', '2025-09-19 15:03:19', '2025-09-19 15:03:19', 0, 0, NULL),
(104, 14, 14, 38, 60, 'viewing', '2025-09-19 15:05:01', '2025-09-19 15:05:01', 0, 0, NULL),
(105, 14, 14, 38, 120, 'viewing', '2025-09-19 15:06:01', '2025-09-19 15:06:01', 0, 0, NULL),
(106, 14, 14, 38, 60, 'viewing', '2025-09-19 15:07:10', '2025-09-19 15:07:10', 0, 0, NULL),
(107, 14, 14, 38, 120, 'viewing', '2025-09-19 15:08:10', '2025-09-19 15:08:10', 0, 0, NULL),
(108, 14, 14, 38, 180, 'viewing', '2025-09-19 15:09:10', '2025-09-19 15:09:10', 0, 0, NULL),
(109, 14, 14, 38, 240, 'viewing', '2025-09-19 15:10:10', '2025-09-19 15:10:10', 0, 0, NULL),
(110, 14, 14, 38, 300, 'viewing', '2025-09-19 15:11:10', '2025-09-19 15:11:10', 0, 0, NULL),
(111, 14, 14, 38, 360, 'viewing', '2025-09-19 15:12:10', '2025-09-19 15:12:10', 0, 0, NULL),
(112, 14, 14, 38, 420, 'viewing', '2025-09-19 15:13:10', '2025-09-19 15:13:10', 0, 0, NULL),
(113, 14, 14, 38, 61, 'viewing', '2025-09-19 15:15:41', '2025-09-19 15:15:41', 0, 0, NULL),
(114, 14, 14, 38, 102, 'viewing', '2025-09-19 15:16:41', '2025-09-19 15:16:41', 0, 0, NULL),
(115, 14, 14, 38, 162, 'viewing', '2025-09-19 15:17:41', '2025-09-19 15:17:41', 0, 0, NULL),
(116, 15, 14, NULL, 60, 'viewing', '2025-09-19 16:10:39', '2025-09-19 16:10:39', 0, 0, NULL),
(117, 15, 14, NULL, 60, 'viewing', '2025-09-19 16:22:00', '2025-09-19 16:22:00', 0, 0, NULL),
(118, 16, 19, NULL, 60, 'viewing', '2025-10-16 14:18:10', '2025-10-16 14:18:10', 0, 0, NULL),
(119, 16, 19, 48, 60, 'viewing', '2025-10-16 14:19:31', '2025-10-16 14:19:31', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `final_quizzes`
--

CREATE TABLE `final_quizzes` (
  `id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_quizzes`
--

INSERT INTO `final_quizzes` (`id`, `module_id`, `title`, `created_at`) VALUES
(8, 19, 'Test Your Knowledge: Introduction to IT', '2025-10-16 14:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `final_quiz_questions`
--

CREATE TABLE `final_quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final_quiz_questions`
--

INSERT INTO `final_quiz_questions` (`id`, `quiz_id`, `question_text`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(4, 8, 'What is the main purpose of Information Technology?', 'To create entertainment only', 'To process, store, and communicate information', 'To replace teachers', 'To build robots only', 2),
(5, 8, 'Which career is responsible for building websites?', 'Database Administrator', 'Web Developer', 'Network Engineer', 'Data Analyst', 2),
(6, 8, 'What is the difference between IT and Computer Science?', 'IT is about using technology; Computer Science is about building it.', 'IT and Computer Science are the same.', 'IT focuses only on gaming.', 'Computer Science manages business operations.', 1),
(7, 8, 'What does a Database Administrator do?', 'Repairs printers', 'Manages and secures databases', 'Designs posters', 'Teaches math', 2),
(8, 8, 'Which technology improves the gaming experience through immersion?', 'Virtual Reality', 'Cryptocurrency', 'Telecommunication', 'Nanotechnology', 1),
(9, 8, 'What is one major benefit of an IT career?', 'No training required', 'High demand and flexibility', 'No stress', 'Limited growth', 2),
(10, 8, 'What is nanotechnology used for?', 'Building furniture', 'Treating diseases at microscopic levels', 'Designing websites', 'Creating social media posts', 2),
(11, 8, 'How does AI improve e-learning?', 'By making lessons harder', 'By personalizing learning experiences', 'By replacing students', 'By removing teachers completely', 2),
(12, 8, 'What is renewable energy technology used for?', 'Efficient and clean energy generation', 'Social media communication', 'Data encryption', 'Cryptocurrency mining', 1),
(13, 8, 'Which future technology focuses on solving complex problems faster?', 'Quantum Computing', 'Voice Recognition', 'Email Systems', 'Desktop Publishing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `focus_events`
--

CREATE TABLE `focus_events` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `event_type` enum('focus_start','focus_end','unfocus_start','unfocus_end') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `duration_seconds` int(11) DEFAULT NULL,
  `confidence_score` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('draft','published') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `description`, `image_path`, `created_at`, `updated_at`, `status`) VALUES
(19, 'MODULE1: Introduction to Information Technology Computing', 'This module introduces the foundational concepts of Information Technology (IT) and its importance in the modern world. It explores how computers, networks, and software systems work together to process, store, and communicate information. Students will learn about various IT careers, real-world applications of technology in multiple fields, and how IT continues to evolve with artificial intelligence (AI) and data-driven innovation.', '../modulephotoshow/module_68f0f8b4453bd.jpg', '2025-10-16 13:52:52', '2025-10-16 14:01:09', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `module_completions`
--

CREATE TABLE `module_completions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `completion_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `final_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_parts`
--

CREATE TABLE `module_parts` (
  `id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `has_subquiz` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_index` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module_parts`
--

INSERT INTO `module_parts` (`id`, `module_id`, `title`, `subtitle`, `content`, `has_subquiz`, `created_at`, `order_index`) VALUES
(37, 19, 'Understanding Information Technology', NULL, '', 0, '2025-10-16 14:09:29', 0),
(38, 19, 'Careers in Information Technology', NULL, '', 0, '2025-10-16 14:10:04', 0),
(39, 19, 'Computing Across Other Fields', NULL, '', 0, '2025-10-16 14:10:52', 0),
(40, 19, 'Future of Information Technology and Artificial Intelligence', NULL, '', 0, '2025-10-16 14:11:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_sections`
--

CREATE TABLE `module_sections` (
  `id` int(11) NOT NULL,
  `module_part_id` int(11) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `section_order` int(11) NOT NULL,
  `has_quiz` tinyint(1) DEFAULT 0,
  `order_index` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module_sections`
--

INSERT INTO `module_sections` (`id`, `module_part_id`, `subtitle`, `content`, `section_order`, `has_quiz`, `order_index`) VALUES
(48, 37, 'What is Information Technology?', '<p data-start=\"1917\" data-end=\"2180\">Information Technology (IT) is a broad term that refers to the <strong data-start=\"1980\" data-end=\"2088\">use of computers, networks, storage devices, and software to process, store, transmit, and retrieve data</strong>. It includes all the tools and methods that people use to handle information efficiently.</p>\r\n<p data-start=\"2182\" data-end=\"2404\">In the simplest sense, IT means using machines and programs to make our work faster, easier, and more accurate. Every time you browse the internet, type a document, or send a message through your phone, you are using IT.</p>\r\n<p data-start=\"2406\" data-end=\"2953\">The concept of IT began in the mid-20th century when the first computers were developed. These early machines were large, expensive, and used mainly for scientific or military purposes. As technology advanced, computers became smaller, cheaper, and more powerful, allowing ordinary people to use them at home, in schools, and at work. The development of the <strong data-start=\"2764\" data-end=\"2789\">Internet in the 1990s</strong> marked a turning point in IT history, connecting computers across the globe and making it possible to communicate instantly and share data anywhere in the world.</p>\r\n<p data-start=\"2955\" data-end=\"3240\">Modern IT includes many branches&mdash;such as <strong data-start=\"2996\" data-end=\"3017\">computer hardware</strong>, <strong data-start=\"3019\" data-end=\"3043\">software development</strong>, <strong data-start=\"3045\" data-end=\"3059\">networking</strong>, <strong data-start=\"3061\" data-end=\"3084\">database management</strong>, <strong data-start=\"3086\" data-end=\"3103\">cybersecurity</strong>, <strong data-start=\"3105\" data-end=\"3124\">cloud computing</strong>, and <strong data-start=\"3130\" data-end=\"3157\">artificial intelligence</strong>. All these elements work together to process and manage information efficiently.</p>\r\n<p data-start=\"3242\" data-end=\"3299\">The major <strong data-start=\"3252\" data-end=\"3292\">components of Information Technology</strong> are:</p>\r\n<ol data-start=\"3301\" data-end=\"4287\">\r\n<li data-start=\"3301\" data-end=\"3512\">\r\n<p data-start=\"3304\" data-end=\"3512\"><strong data-start=\"3304\" data-end=\"3316\">Hardware</strong> &ndash; the tangible parts of a computer system such as the monitor, keyboard, hard drive, printer, router, and smartphone. Hardware serves as the physical foundation that allows software to operate.</p>\r\n</li>\r\n<li data-start=\"3513\" data-end=\"3730\">\r\n<p data-start=\"3516\" data-end=\"3730\"><strong data-start=\"3516\" data-end=\"3528\">Software</strong> &ndash; the set of programs and instructions that tell the hardware what to do. Without software, a computer cannot function. Examples include Microsoft Word, web browsers, and learning management systems.</p>\r\n</li>\r\n<li data-start=\"3731\" data-end=\"3937\">\r\n<p data-start=\"3734\" data-end=\"3937\"><strong data-start=\"3734\" data-end=\"3745\">Network</strong> &ndash; a system that connects multiple devices together so they can share information and resources. The Internet is the largest example of a network that connects billions of devices worldwide.</p>\r\n</li>\r\n<li data-start=\"3938\" data-end=\"4121\">\r\n<p data-start=\"3941\" data-end=\"4121\"><strong data-start=\"3941\" data-end=\"3949\">Data</strong> &ndash; raw facts and figures that can be processed into meaningful information. Data can include numbers, text, images, videos, or any record that can be stored and analyzed.</p>\r\n</li>\r\n<li data-start=\"4122\" data-end=\"4287\">\r\n<p data-start=\"4125\" data-end=\"4287\"><strong data-start=\"4125\" data-end=\"4135\">People</strong> &ndash; the users, programmers, engineers, and administrators who operate and maintain the IT systems. Without people, technology cannot serve its purpose.</p>\r\n</li>\r\n</ol>\r\n<p data-start=\"4289\" data-end=\"4523\">In everyday life, IT allows students to attend virtual classes, employees to work from home, businesses to manage transactions, and governments to deliver services efficiently. It has become an essential part of modern civilization.</p>', 1, 0, 0),
(49, 37, 'Information and Technology', '<p data-start=\"4582\" data-end=\"4675\">To clearly understand Information Technology, we must define the two words that make it up.</p>\r\n<p data-start=\"4677\" data-end=\"5042\"><strong data-start=\"4677\" data-end=\"4692\">Information</strong> is knowledge or data that has meaning. It may come in the form of text, numbers, symbols, or sounds that communicate something useful. For instance, a student&rsquo;s grade of 95 is a piece of data, but when we understand that it represents excellent performance, it becomes information. Information helps people make decisions and understand the world.</p>\r\n<p data-start=\"5044\" data-end=\"5351\"><strong data-start=\"5044\" data-end=\"5058\">Technology</strong>, on the other hand, refers to the <strong data-start=\"5093\" data-end=\"5127\">tools, techniques, and methods</strong> that people create to solve problems or perform tasks more efficiently. Technology can be simple, like a pencil, or complex, like an artificial-intelligence system. It is the practical application of scientific knowledge.</p>\r\n<p data-start=\"5353\" data-end=\"5608\">When combined, the two words form <strong data-start=\"5387\" data-end=\"5418\">Information Technology (IT)</strong>, which means the use of technological tools to collect, process, store, and communicate information. IT converts raw data into meaningful information that can guide actions and decisions.</p>\r\n<p data-start=\"5610\" data-end=\"5934\">For example, in an e-learning platform, when a student answers an online quiz, the system records the raw data (the answers). The software then checks which items are correct, calculates the score, and presents it to both student and teacher. The raw data has been processed into meaningful information through technology.</p>\r\n<p data-start=\"5936\" data-end=\"6141\">This is how IT works everywhere&mdash;from hospitals managing patient records, to banks processing transactions, to governments collecting census data. It shortens time, reduces errors, and increases accuracy.</p>\r\n<p data-start=\"6143\" data-end=\"6154\">In short:</p>\r\n<ul data-start=\"6156\" data-end=\"6374\">\r\n<li data-start=\"6156\" data-end=\"6203\">\r\n<p data-start=\"6158\" data-end=\"6203\">Information = knowledge or meaningful data.</p>\r\n</li>\r\n<li data-start=\"6204\" data-end=\"6261\">\r\n<p data-start=\"6206\" data-end=\"6261\">Technology = tools and systems used to perform tasks.</p>\r\n</li>\r\n<li data-start=\"6262\" data-end=\"6374\">\r\n<p data-start=\"6264\" data-end=\"6374\">Information Technology = the intelligent use of technology to manage and distribute information effectively.</p>\r\n</li>\r\n</ul>', 2, 0, 0),
(50, 38, 'Common IT Professions', '<p data-start=\"6479\" data-end=\"6741\">The field of IT is vast and continuously growing. Because technology touches almost every aspect of human life, there is a high demand for skilled professionals who can design, operate, and secure computer systems. Below are some of the most common IT careers.</p>\r\n<p data-start=\"6743\" data-end=\"7096\"><strong data-start=\"6743\" data-end=\"6767\">1. Software Engineer</strong> &ndash; Software engineers create programs and applications that help people perform tasks. They write computer code using languages such as Python, Java, or C++. These programs can be as simple as a calculator or as complex as an artificial-intelligence system. They test and maintain software to ensure that it performs correctly.</p>\r\n<p data-start=\"7098\" data-end=\"7394\"><strong data-start=\"7098\" data-end=\"7118\">2. Web Developer</strong> &ndash; A web developer designs and builds websites and web applications. They use programming languages like HTML, CSS, and JavaScript to develop sites that are attractive and easy to navigate. Web developers ensure that websites work properly on different devices and browsers.</p>\r\n<p data-start=\"7396\" data-end=\"7732\"><strong data-start=\"7396\" data-end=\"7431\">3. Database Administrator (DBA)</strong> &ndash; A DBA is responsible for managing and protecting large collections of data. They ensure that databases are properly organized, secure, and accessible only to authorized users. In schools, for example, DBAs maintain student information systems that store grades, schedules, and attendance records.</p>\r\n<p data-start=\"7734\" data-end=\"7970\"><strong data-start=\"7734\" data-end=\"7762\">4. Network Administrator</strong> &ndash; Network administrators install, configure, and maintain computer networks. They make sure that servers, routers, and Wi-Fi connections work smoothly so that communication and data transfer remain stable.</p>\r\n<p data-start=\"7972\" data-end=\"8225\"><strong data-start=\"7972\" data-end=\"8000\">5. IT Support Specialist</strong> &ndash; IT Support Specialists help users troubleshoot computer problems. They provide guidance through phone, chat, or in-person assistance. They are often the first people to respond when computers malfunction or systems fail.</p>\r\n<p data-start=\"8227\" data-end=\"8549\"><strong data-start=\"8227\" data-end=\"8264\">6. AI Engineer and Data Scientist</strong> &ndash; These professionals develop systems that can think and learn. They use algorithms and data analysis to teach machines how to make decisions automatically. For example, AI engineers build programs that recommend movies, detect faces, or analyze student focus in e-learning systems.</p>\r\n<p data-start=\"8551\" data-end=\"8725\">Each IT profession plays an important role in maintaining the digital world. Together, they ensure that technology continues to run efficiently, securely, and innovatively.</p>', 1, 0, 0),
(51, 38, 'Benefits and Challenges in an IT Career', '<p data-start=\"8797\" data-end=\"8938\">The IT industry provides many opportunities for success, but it also comes with challenges that require dedication and continuous learning.</p>\r\n<p data-start=\"8940\" data-end=\"8971\"><strong data-start=\"8940\" data-end=\"8969\">Benefits of an IT Career:</strong></p>\r\n<ul data-start=\"8972\" data-end=\"9636\">\r\n<li data-start=\"8972\" data-end=\"9116\">\r\n<p data-start=\"8974\" data-end=\"9116\"><strong data-start=\"8974\" data-end=\"8990\">High Demand:</strong> Every organization today depends on technology. From small businesses to global corporations, IT experts are always needed.</p>\r\n</li>\r\n<li data-start=\"9117\" data-end=\"9253\">\r\n<p data-start=\"9119\" data-end=\"9253\"><strong data-start=\"9119\" data-end=\"9142\">Competitive Salary:</strong> Because of the specialized skills required, IT professionals are among the highest-paid employees worldwide.</p>\r\n</li>\r\n<li data-start=\"9254\" data-end=\"9363\">\r\n<p data-start=\"9256\" data-end=\"9363\"><strong data-start=\"9256\" data-end=\"9272\">Flexibility:</strong> Many IT jobs can be done remotely, allowing workers to balance personal life and career.</p>\r\n</li>\r\n<li data-start=\"9364\" data-end=\"9526\">\r\n<p data-start=\"9366\" data-end=\"9526\"><strong data-start=\"9366\" data-end=\"9388\">Continuous Growth:</strong> Technology evolves quickly, which means IT professionals constantly learn new tools and methods, keeping the work exciting and dynamic.</p>\r\n</li>\r\n<li data-start=\"9527\" data-end=\"9636\">\r\n<p data-start=\"9529\" data-end=\"9636\"><strong data-start=\"9529\" data-end=\"9554\">Global Opportunities:</strong> Since technology is universal, IT professionals can work anywhere in the world.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"9638\" data-end=\"9671\"><strong data-start=\"9638\" data-end=\"9669\">Challenges in an IT Career:</strong></p>\r\n<ul data-start=\"9672\" data-end=\"10166\">\r\n<li data-start=\"9672\" data-end=\"9814\">\r\n<p data-start=\"9674\" data-end=\"9814\"><strong data-start=\"9674\" data-end=\"9704\">Fast Technological Change:</strong> New tools and programming languages appear regularly, and professionals must keep updating their knowledge.</p>\r\n</li>\r\n<li data-start=\"9815\" data-end=\"9946\">\r\n<p data-start=\"9817\" data-end=\"9946\"><strong data-start=\"9817\" data-end=\"9840\">Long Working Hours:</strong> System maintenance or troubleshooting may require extended time, especially when critical systems fail.</p>\r\n</li>\r\n<li data-start=\"9947\" data-end=\"10049\">\r\n<p data-start=\"9949\" data-end=\"10049\"><strong data-start=\"9949\" data-end=\"9973\">Stress and Pressure:</strong> Meeting deadlines and resolving urgent technical issues can be demanding.</p>\r\n</li>\r\n<li data-start=\"10050\" data-end=\"10166\">\r\n<p data-start=\"10052\" data-end=\"10166\"><strong data-start=\"10052\" data-end=\"10071\">Security Risks:</strong> Cyber-attacks and data breaches are constant threats, requiring extra caution and awareness.</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"10168\" data-end=\"10340\">Despite these challenges, the rewards of an IT career outweigh the difficulties. Success in this field depends on passion, patience, and the willingness to keep learning.</p>', 2, 0, 0),
(52, 39, 'Information Technology in Biology and Medicine', '<p data-start=\"10466\" data-end=\"10645\">Information Technology has revolutionized the medical and biological sciences by allowing researchers and doctors to collect, store, and analyze data faster and more accurately.</p>\r\n<p data-start=\"10647\" data-end=\"10993\">In <strong data-start=\"10650\" data-end=\"10661\">Biology</strong>, IT helps scientists model complex biological systems and understand how organisms function. One example is <strong data-start=\"10770\" data-end=\"10788\">nanotechnology</strong>, which uses extremely small particles to deliver medicine directly to diseased cells. These nanoparticles can target specific areas of the body, improving treatment accuracy and minimizing side effects.</p>\r\n<p data-start=\"10995\" data-end=\"11354\"><strong data-start=\"10995\" data-end=\"11012\">Biotechnology</strong>, another related field, uses living organisms or their parts to produce useful products. Through IT, biotechnologists can store genetic data, simulate experiments, and develop new vaccines or energy sources. Databases that contain genetic information, such as the Human Genome Project, are products of computing power and IT collaboration.</p>\r\n<p data-start=\"11356\" data-end=\"11660\">In <strong data-start=\"11359\" data-end=\"11371\">Medicine</strong>, hospitals and clinics now use <strong data-start=\"11403\" data-end=\"11439\">Electronic Health Records (EHRs)</strong> instead of paper files. Doctors can instantly access a patient&rsquo;s medical history, test results, and prescriptions. IT also supports diagnostic equipment such as MRI scanners, which generate digital images for analysis.</p>\r\n<p data-start=\"11662\" data-end=\"11917\">Telemedicine allows doctors to consult patients remotely using video calls and online monitoring systems. This is especially useful for people who live far from hospitals. IT ensures accurate, fast, and secure communication between doctors and patients.</p>\r\n<p data-start=\"11919\" data-end=\"12045\">Through these innovations, IT has become a backbone of modern healthcare, improving accuracy, efficiency, and accessibility.</p>', 1, 0, 0),
(53, 39, 'Information Technology in Sociology and Business', '<p data-start=\"12126\" data-end=\"12478\">In Sociology, IT transforms how people interact and build communities. Social media platforms such as Facebook, Twitter, TikTok, and Instagram allow people to share opinions, organize events, and communicate across distances. Sociologists use IT to study human behavior through online data, helping them understand trends, culture, and social change.</p>\r\n<p data-start=\"12480\" data-end=\"12723\">IT also supports digital communication through <strong data-start=\"12527\" data-end=\"12556\">telecommunication systems</strong> that transmit data, voice, and video. Technologies such as 5G networks, cloud computing, and video conferencing have made global communication almost instantaneous.</p>\r\n<p data-start=\"12725\" data-end=\"12998\">In Business, IT has completely changed how companies operate. Businesses now rely on computers to manage inventories, record transactions, and communicate with customers. <strong data-start=\"12896\" data-end=\"12910\">E-commerce</strong> platforms like Shopee and Lazada use IT to allow online shopping and payment systems.</p>\r\n<p data-start=\"13000\" data-end=\"13246\">Companies analyze customer data using <strong data-start=\"13038\" data-end=\"13063\">Business Intelligence</strong> tools to understand buying habits and improve services. Banks depend on IT for secure transactions, while marketing teams use social media analytics to reach audiences effectively.</p>\r\n<p data-start=\"13248\" data-end=\"13489\">Moreover, <strong data-start=\"13258\" data-end=\"13276\">cryptocurrency</strong> and <strong data-start=\"13281\" data-end=\"13306\">blockchain technology</strong> have introduced a new era of digital money that operates without traditional banks. Blockchain records transactions securely and transparently, reducing fraud and increasing trust.</p>\r\n<p data-start=\"13491\" data-end=\"13643\">Without IT, modern communication, trade, and research would be slow and limited. It has made the world smaller and societies more connected than ever.</p>', 2, 0, 0),
(54, 39, 'Information Technology in Environment and Gaming', '<p data-start=\"13724\" data-end=\"13807\">IT is also helping protect the environment and improve entertainment experiences.</p>\r\n<p data-start=\"13809\" data-end=\"14133\">In environmental science, IT supports <strong data-start=\"13847\" data-end=\"13880\">renewable energy technologies</strong> such as solar and wind power. Sensors connected to computer systems measure sunlight, wind speed, and temperature to ensure that power plants operate efficiently. IT helps engineers monitor the energy flow, detect faults, and maintain sustainability.</p>\r\n<p data-start=\"14135\" data-end=\"14385\">Governments and environmental groups use <strong data-start=\"14176\" data-end=\"14216\">Geographic Information Systems (GIS)</strong> to track deforestation, pollution, and climate change. Satellite imagery processed by computers allows scientists to observe the Earth and plan conservation projects.</p>\r\n<p data-start=\"14387\" data-end=\"14825\">In gaming, IT has created one of the fastest-growing industries in the world. <strong data-start=\"14465\" data-end=\"14497\">Artificial Intelligence (AI)</strong> is used in games to make characters behave realistically. <strong data-start=\"14556\" data-end=\"14580\">Virtual Reality (VR)</strong> allows players to experience digital worlds as if they were physically inside them. <strong data-start=\"14665\" data-end=\"14684\">Gesture Control</strong> uses motion sensors to let players interact with the game using body movements, while <strong data-start=\"14771\" data-end=\"14792\">Voice Recognition</strong> allows control through speech.</p>\r\n<p data-start=\"14827\" data-end=\"15092\">These technologies are also finding their way into education. Gamified learning platforms use game mechanics like points, levels, and rewards to make studying more engaging and interactive. Students can now &ldquo;play to learn,&rdquo; combining entertainment with education.</p>', 3, 0, 0),
(55, 40, 'The Role of Artificial Intelligence in E-Learning', '<p data-start=\"15252\" data-end=\"15483\">Artificial Intelligence (AI) refers to the simulation of human intelligence by computers. It enables machines to think, learn, and make decisions. In education, AI is transforming how lessons are delivered and how students learn.</p>\r\n<p data-start=\"15485\" data-end=\"15771\">AI-powered e-learning platforms can analyze a student&rsquo;s progress and automatically adjust the difficulty of activities. They can track focus through webcam-based eye-tracking and pause lessons when students look away. Chatbots provide 24/7 assistance by answering questions instantly.</p>\r\n<p data-start=\"15773\" data-end=\"15982\">Teachers benefit as well. AI systems can grade quizzes, summarize student performance, and recommend additional materials for learners who need help. This reduces workload and ensures personalized attention.</p>\r\n<p data-start=\"15984\" data-end=\"16218\">By integrating AI with Information Technology, schools can create intelligent learning environments that adapt to each student&rsquo;s pace, style, and needs. This marks a major step toward inclusive, efficient, and data-driven education.</p>', 1, 0, 0),
(56, 40, 'The Future of Information Technology', '<p data-start=\"16287\" data-end=\"16453\">The future of IT is full of innovation and discovery. As digital transformation continues, new technologies are expected to emerge that will reshape every industry.</p>\r\n<p data-start=\"16455\" data-end=\"16824\"><strong data-start=\"16455\" data-end=\"16474\">Cloud Computing</strong> will make it easier to store and access data from anywhere without relying on personal devices. <strong data-start=\"16571\" data-end=\"16588\">Cybersecurity</strong> will become even more crucial as digital threats increase. The <strong data-start=\"16652\" data-end=\"16680\">Internet of Things (IoT)</strong> will connect everyday objects&mdash;such as cars, appliances, and medical devices&mdash;to the internet, allowing them to communicate and automate tasks.</p>\r\n<p data-start=\"16826\" data-end=\"17026\">Another breakthrough is <strong data-start=\"16850\" data-end=\"16871\">Quantum Computing</strong>, which uses quantum bits (qubits) to process data at unimaginable speeds. This technology will help solve problems that current computers cannot handle.</p>\r\n<p data-start=\"17028\" data-end=\"17225\">Furthermore, <strong data-start=\"17041\" data-end=\"17067\">Sustainable Technology</strong> aims to design energy-efficient devices and systems to minimize environmental damage. The focus will shift to greener computing and responsible innovation.</p>\r\n<p data-start=\"17227\" data-end=\"17426\">In summary, IT will continue to drive progress in every aspect of human life. For students and professionals, understanding IT is not just an academic requirement&mdash;it is a foundation for the future.</p>', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `module_part_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `completion_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_quiz_questions`
--

CREATE TABLE `section_quiz_questions` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL,
  `question_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `role` enum('admin','student') NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `camera_agreement_accepted` tinyint(1) DEFAULT 0,
  `camera_agreement_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `role`, `profile_img`, `created_at`, `updated_at`, `camera_agreement_accepted`, `camera_agreement_date`) VALUES
(1, 'Super', 'Admin', 'admin@admin.eyelearn', '$2y$10$5eql26ue0JmbvS6AAIQr/.pL8njF47sQ/.lDScg9/Gb..M.iZG1Ty', '', 'admin', 'default.png', '2025-04-21 15:01:17', '2025-04-21 16:07:51', 0, NULL),
(16, 'Mark Aljerick', 'De Castro', '0322-2068@lspu.edu.ph', '$2y$10$fM16ZUJPmGYNanYpkiNIn.jz0zyLNfzBHKG/Lh9YggxFxwAPdtzv6', 'Male', 'student', NULL, '2025-10-16 13:26:06', '2025-10-17 11:58:24', 1, '2025-10-17 19:58:24'),
(17, 'Maritess', 'De Castro', '0322-2067@lspu.edu.ph', '$2y$10$c3azPrNFjy61E4eHN9YtVuplALzOmO6LFW9Wf4DyjEPn6OELpEPW6', 'Female', 'student', NULL, '2025-10-16 14:50:29', '2025-10-16 14:50:36', 1, '2025-10-16 22:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_module_progress`
--

CREATE TABLE `user_module_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `completed_sections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT '[]' CHECK (json_valid(`completed_sections`)),
  `final_quiz_score` int(11) DEFAULT NULL,
  `last_section_quiz_score` int(11) DEFAULT NULL,
  `status` enum('in_progress','completed') DEFAULT 'in_progress',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_accessed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `score` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `completion_percentage` decimal(5,2) DEFAULT 0.00,
  `last_accessed` timestamp NOT NULL DEFAULT current_timestamp(),
  `completed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `session_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `session_end` timestamp NULL DEFAULT NULL,
  `total_duration_seconds` int(11) DEFAULT 0,
  `focused_duration_seconds` int(11) DEFAULT 0,
  `unfocused_duration_seconds` int(11) DEFAULT 0,
  `focus_percentage` decimal(5,2) DEFAULT 0.00,
  `session_type` enum('study','quiz','review') DEFAULT 'study',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `module_id`, `session_start`, `session_end`, `total_duration_seconds`, `focused_duration_seconds`, `unfocused_duration_seconds`, `focus_percentage`, `session_type`, `created_at`) VALUES
(1, 4, 1, '2025-07-24 13:46:42', '2025-07-24 14:46:42', 3600, 2880, 720, 80.00, 'study', '2025-07-24 15:46:42'),
(2, 4, 2, '2025-07-23 12:46:42', '2025-07-23 13:46:42', 3600, 2700, 900, 75.00, 'study', '2025-07-24 15:46:42'),
(3, 4, 1, '2025-07-22 14:46:42', '2025-07-22 15:16:42', 1800, 1440, 360, 80.00, 'quiz', '2025-07-24 15:46:42'),
(4, 4, 3, '2025-07-21 13:46:42', '2025-07-21 14:46:42', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:46:42'),
(5, 4, 2, '2025-07-20 14:46:42', '2025-07-20 15:16:42', 1800, 1350, 450, 75.00, 'review', '2025-07-24 15:46:42'),
(6, 4, 1, '2025-07-19 12:46:42', '2025-07-19 13:46:42', 3600, 2880, 720, 80.00, 'study', '2025-07-24 15:46:42'),
(7, 4, 3, '2025-07-18 13:46:42', '2025-07-18 14:46:42', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:46:42'),
(8, 5, 1, '2025-07-24 12:46:42', '2025-07-24 13:46:42', 3600, 2700, 900, 75.00, 'study', '2025-07-24 15:46:42'),
(9, 5, 2, '2025-07-23 13:46:42', '2025-07-23 14:46:42', 3600, 3060, 540, 85.00, 'study', '2025-07-24 15:46:42'),
(10, 5, 1, '2025-07-22 14:46:42', '2025-07-22 15:16:42', 1800, 1530, 270, 85.00, 'quiz', '2025-07-24 15:46:42'),
(11, 5, 3, '2025-07-21 12:46:42', '2025-07-21 13:46:42', 3600, 2880, 720, 80.00, 'study', '2025-07-24 15:46:42'),
(12, 5, 2, '2025-07-20 13:46:42', '2025-07-20 14:46:42', 3600, 3060, 540, 85.00, 'study', '2025-07-24 15:46:42'),
(13, 5, 1, '2025-07-19 14:46:42', '2025-07-19 15:16:42', 1800, 1530, 270, 85.00, 'review', '2025-07-24 15:46:42'),
(14, 5, 3, '2025-07-18 12:46:42', '2025-07-18 13:46:42', 3600, 2880, 720, 80.00, 'study', '2025-07-24 15:46:42'),
(15, 6, 1, '2025-07-24 13:46:42', '2025-07-24 14:46:42', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:46:42'),
(16, 6, 2, '2025-07-23 12:46:42', '2025-07-23 13:46:42', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:46:42'),
(17, 6, 1, '2025-07-22 13:46:42', '2025-07-22 14:46:42', 3600, 2520, 1080, 70.00, 'quiz', '2025-07-24 15:46:42'),
(18, 6, 3, '2025-07-21 14:46:42', '2025-07-21 15:16:42', 1800, 1260, 540, 70.00, 'study', '2025-07-24 15:46:42'),
(19, 6, 2, '2025-07-20 12:46:42', '2025-07-20 13:46:42', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:46:42'),
(20, 6, 1, '2025-07-19 13:46:42', '2025-07-19 14:46:42', 3600, 2520, 1080, 70.00, 'review', '2025-07-24 15:46:42'),
(21, 6, 3, '2025-07-18 14:46:42', '2025-07-18 15:16:42', 1800, 1260, 540, 70.00, 'study', '2025-07-24 15:46:42'),
(22, 7, 1, '2025-07-24 14:49:24', '2025-07-24 15:19:24', 1800, 1080, 720, 60.00, 'study', '2025-07-24 15:49:24'),
(23, 7, 2, '2025-07-23 13:49:24', '2025-07-23 14:49:24', 3600, 2160, 1440, 60.00, 'study', '2025-07-24 15:49:24'),
(24, 7, 1, '2025-07-22 14:49:24', '2025-07-22 15:19:24', 1800, 1080, 720, 60.00, 'quiz', '2025-07-24 15:49:24'),
(25, 7, 3, '2025-07-21 12:49:24', '2025-07-21 13:49:24', 3600, 2160, 1440, 60.00, 'study', '2025-07-24 15:49:24'),
(26, 8, 1, '2025-07-24 13:49:24', '2025-07-24 14:49:24', 3600, 3240, 360, 90.00, 'study', '2025-07-24 15:49:24'),
(27, 8, 2, '2025-07-23 12:49:24', '2025-07-23 13:49:24', 3600, 3240, 360, 90.00, 'study', '2025-07-24 15:49:24'),
(28, 8, 1, '2025-07-22 13:49:24', '2025-07-22 14:49:24', 3600, 3240, 360, 90.00, 'quiz', '2025-07-24 15:49:24'),
(29, 8, 3, '2025-07-21 14:49:24', '2025-07-21 15:19:24', 1800, 1620, 180, 90.00, 'study', '2025-07-24 15:49:24'),
(30, 8, 2, '2025-07-20 12:49:24', '2025-07-20 13:49:24', 3600, 3240, 360, 90.00, 'study', '2025-07-24 15:49:24'),
(31, 9, 1, '2025-07-24 14:49:24', '2025-07-24 15:04:24', 900, 360, 540, 40.00, 'study', '2025-07-24 15:49:24'),
(32, 9, 2, '2025-07-23 14:49:24', '2025-07-23 15:04:24', 900, 360, 540, 40.00, 'study', '2025-07-24 15:49:24'),
(33, 9, 1, '2025-07-21 14:49:24', '2025-07-21 15:04:24', 900, 360, 540, 40.00, 'study', '2025-07-24 15:49:24'),
(34, 10, 1, '2025-07-24 13:49:24', '2025-07-24 14:49:24', 3600, 1800, 1800, 50.00, 'study', '2025-07-24 15:49:24'),
(35, 10, 2, '2025-07-22 12:49:24', '2025-07-22 13:49:24', 3600, 2520, 1080, 70.00, 'study', '2025-07-24 15:49:24'),
(36, 10, 3, '2025-07-19 13:49:24', '2025-07-19 14:49:24', 3600, 2880, 720, 80.00, 'study', '2025-07-24 15:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_study_sessions`
--

CREATE TABLE `user_study_sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `focus_score` float NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `daily_analytics`
--
ALTER TABLE `daily_analytics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_date` (`user_id`,`date`),
  ADD KEY `idx_date` (`date`);

--
-- Indexes for table `eye_tracking_analytics`
--
ALTER TABLE `eye_tracking_analytics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_module_date` (`user_id`,`module_id`,`section_id`,`date`),
  ADD KEY `idx_user_date` (`user_id`,`date`),
  ADD KEY `idx_module_date` (`module_id`,`date`);

--
-- Indexes for table `eye_tracking_data`
--
ALTER TABLE `eye_tracking_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `eye_tracking_focus_summary`
--
ALTER TABLE `eye_tracking_focus_summary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_module_date` (`user_id`,`module_id`,`date`),
  ADD KEY `idx_user_date` (`user_id`,`date`),
  ADD KEY `idx_module_date` (`module_id`,`date`);

--
-- Indexes for table `eye_tracking_preferences`
--
ALTER TABLE `eye_tracking_preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `idx_user_id` (`user_id`);

--
-- Indexes for table `eye_tracking_sessions`
--
ALTER TABLE `eye_tracking_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_module` (`user_id`,`module_id`),
  ADD KEY `idx_user_section` (`user_id`,`section_id`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `final_quizzes`
--
ALTER TABLE `final_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `final_quiz_questions`
--
ALTER TABLE `final_quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `focus_events`
--
ALTER TABLE `focus_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_session_id` (`session_id`),
  ADD KEY `idx_timestamp` (`timestamp`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_completions`
--
ALTER TABLE `module_completions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_completion` (`user_id`,`module_id`);

--
-- Indexes for table `module_parts`
--
ALTER TABLE `module_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `module_sections`
--
ALTER TABLE `module_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_part_id` (`module_part_id`);

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_part_id` (`module_part_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `section_quiz_questions`
--
ALTER TABLE `section_quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_module_progress`
--
ALTER TABLE `user_module_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_module_unique` (`user_id`,`module_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_session_start` (`session_start`),
  ADD KEY `idx_user_date` (`user_id`,`session_start`);

--
-- Indexes for table `user_study_sessions`
--
ALTER TABLE `user_study_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_analytics`
--
ALTER TABLE `daily_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `eye_tracking_analytics`
--
ALTER TABLE `eye_tracking_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `eye_tracking_data`
--
ALTER TABLE `eye_tracking_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eye_tracking_focus_summary`
--
ALTER TABLE `eye_tracking_focus_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eye_tracking_preferences`
--
ALTER TABLE `eye_tracking_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eye_tracking_sessions`
--
ALTER TABLE `eye_tracking_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `final_quizzes`
--
ALTER TABLE `final_quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `final_quiz_questions`
--
ALTER TABLE `final_quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `focus_events`
--
ALTER TABLE `focus_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `module_completions`
--
ALTER TABLE `module_completions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_parts`
--
ALTER TABLE `module_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `module_sections`
--
ALTER TABLE `module_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `quiz_options`
--
ALTER TABLE `quiz_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_quiz_questions`
--
ALTER TABLE `section_quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_module_progress`
--
ALTER TABLE `user_module_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_study_sessions`
--
ALTER TABLE `user_study_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessments`
--
ALTER TABLE `assessments`
  ADD CONSTRAINT `assessments_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `eye_tracking_data`
--
ALTER TABLE `eye_tracking_data`
  ADD CONSTRAINT `eye_tracking_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `final_quizzes`
--
ALTER TABLE `final_quizzes`
  ADD CONSTRAINT `final_quizzes_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `final_quiz_questions`
--
ALTER TABLE `final_quiz_questions`
  ADD CONSTRAINT `final_quiz_questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `final_quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `module_parts`
--
ALTER TABLE `module_parts`
  ADD CONSTRAINT `module_parts_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `module_sections`
--
ALTER TABLE `module_sections`
  ADD CONSTRAINT `module_sections_ibfk_1` FOREIGN KEY (`module_part_id`) REFERENCES `module_parts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD CONSTRAINT `quiz_options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `quiz_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD CONSTRAINT `quiz_questions_ibfk_1` FOREIGN KEY (`module_part_id`) REFERENCES `module_parts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_questions_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `final_quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Constraints for table `section_quiz_questions`
--
ALTER TABLE `section_quiz_questions`
  ADD CONSTRAINT `section_quiz_questions_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `module_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_module_progress`
--
ALTER TABLE `user_module_progress`
  ADD CONSTRAINT `user_module_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_module_progress_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_study_sessions`
--
ALTER TABLE `user_study_sessions`
  ADD CONSTRAINT `user_study_sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
