-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2024 at 06:42 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u831079819_chat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_groups`
--

CREATE TABLE `chat_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `group_links` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_groups`
--

INSERT INTO `chat_groups` (`id`, `name`, `country`, `group_links`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(12, 'مجموعة فلسطين', 'فلسطين', 'مجموعة خاصة بمن هم في كلية الحاسابات والمعلومات في فلسطين', 'images/groups/1709813607.png', 1, '2024-03-07 11:50:51', '2024-03-08 14:15:51'),
(13, 'مجموعة المصريين', 'مصر', NULL, 'images/groups/1709900688.png', 1, '2024-03-08 14:24:48', '2024-03-08 14:25:39'),
(14, 'مجموعة فنزويلا', 'فنزويلا', 'https://www.alarabimag.com/\nhttps://www.kutubpdfbook.com/', 'images/groups/1709900792.png', 1, '2024-03-08 14:26:32', '2024-03-08 17:43:41'),
(15, 'مجموعة نيجيريا', 'نيجيريا', 'هذه المجموعة خاصة بدولة نيجيريا', 'images/groups/1709921891.png', 1, '2024-03-08 20:17:38', '2024-03-08 20:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `chat_guests`
--

CREATE TABLE `chat_guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_IP` varchar(45) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_guests`
--

INSERT INTO `chat_guests` (`id`, `sender_IP`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '41.236.217.113', 1, '2024-03-07 18:43:38', '2024-03-08 01:05:10'),
(2, '156.214.79.108', 1, '2024-03-07 20:50:03', '2024-03-07 20:50:03'),
(3, '102.43.47.171', 1, '2024-03-07 23:21:02', '2024-03-07 23:21:02'),
(4, '102.45.190.179', 1, '2024-03-07 23:39:26', '2024-03-07 23:39:26'),
(5, '41.35.202.222', 1, '2024-03-08 13:33:57', '2024-03-08 13:33:57'),
(6, '41.239.255.112', 1, '2024-03-08 17:27:31', '2024-03-08 17:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `chat_guest_messages`
--

CREATE TABLE `chat_guest_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_IP` varchar(45) NOT NULL,
  `messages` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_guest_messages`
--

INSERT INTO `chat_guest_messages` (`id`, `sender_IP`, `messages`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '41.236.217.113', 'السلام عليكم', 1, '2024-03-07 18:43:38', '2024-03-07 18:43:38'),
(2, '41.236.217.113', 'asfasgasd', 1, '2024-03-07 18:51:04', '2024-03-07 18:51:04'),
(3, '41.236.217.113', 'asgasdasd', 1, '2024-03-07 18:51:07', '2024-03-07 18:51:07'),
(4, '41.236.217.113', 'Gdcjjj', 1, '2024-03-07 19:22:18', '2024-03-07 19:22:18'),
(5, '41.236.217.113', 'اهلا ', 1, '2024-03-07 20:09:14', '2024-03-07 20:09:14'),
(6, '41.236.217.112', 'ههههههه', 1, '2024-03-07 20:22:52', '2024-03-07 20:22:52'),
(7, '41.236.217.113', 'السلام عليكم', 1, '2024-03-07 20:42:10', '2024-03-07 20:42:10'),
(8, '41.236.217.113', 'وعليكم السلام', 1, '2024-03-07 20:42:41', '2024-03-07 20:42:41'),
(9, '156.214.79.108', 'وعليكم السلام ', 1, '2024-03-07 20:50:03', '2024-03-07 20:50:03'),
(10, '41.236.217.113', 'files/images/1709838194.chat.png', 1, '2024-03-07 21:03:14', '2024-03-07 21:03:14'),
(11, '41.236.217.113', 'files/images/1709838377.country-flags-main.zip', 1, '2024-03-07 21:06:17', '2024-03-07 21:06:17'),
(12, '156.214.79.108', 'files/images/1709838542.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:09:02', '2024-03-07 21:09:02'),
(13, '156.214.79.108', 'files/images/1709838556.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:09:16', '2024-03-07 21:09:16'),
(14, '156.214.79.108', 'files/images/1709838560.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:09:20', '2024-03-07 21:09:20'),
(15, '156.214.79.108', 'files/images/1709838566.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:09:26', '2024-03-07 21:09:26'),
(16, '156.214.79.108', 'من', 1, '2024-03-07 21:10:19', '2024-03-07 21:10:19'),
(17, '156.214.79.108', '', 1, '2024-03-07 21:10:20', '2024-03-07 21:10:20'),
(18, '156.214.79.108', '', 1, '2024-03-07 21:10:24', '2024-03-07 21:10:24'),
(19, '156.214.79.108', '', 1, '2024-03-07 21:10:25', '2024-03-07 21:10:25'),
(20, '156.214.79.108', '', 1, '2024-03-07 21:10:26', '2024-03-07 21:10:26'),
(21, '156.214.79.108', '', 1, '2024-03-07 21:10:26', '2024-03-07 21:10:26'),
(22, '156.214.79.108', '', 1, '2024-03-07 21:10:27', '2024-03-07 21:10:27'),
(23, '156.214.79.108', 'رساله ترحيب', 1, '2024-03-07 21:11:34', '2024-03-07 21:11:34'),
(24, '156.214.79.108', '', 1, '2024-03-07 21:11:37', '2024-03-07 21:11:37'),
(25, '156.214.79.108', '', 1, '2024-03-07 21:11:40', '2024-03-07 21:11:40'),
(26, '156.214.79.108', '', 1, '2024-03-07 21:11:40', '2024-03-07 21:11:40'),
(27, '156.214.79.108', '', 1, '2024-03-07 21:11:41', '2024-03-07 21:11:41'),
(28, '156.214.79.108', '', 1, '2024-03-07 21:11:46', '2024-03-07 21:11:46'),
(29, '156.214.79.108', '', 1, '2024-03-07 21:11:48', '2024-03-07 21:11:48'),
(30, '156.214.79.108', '', 1, '2024-03-07 21:11:50', '2024-03-07 21:11:50'),
(31, '156.214.79.108', '', 1, '2024-03-07 21:12:04', '2024-03-07 21:12:04'),
(32, '41.236.217.113', 'files/images/1709838754.ad.png', 1, '2024-03-07 21:12:34', '2024-03-07 21:12:34'),
(33, '41.236.217.113', 'files/images/1709838761.ae.png', 1, '2024-03-07 21:12:41', '2024-03-07 21:12:41'),
(34, '41.236.217.113', 'تم حل المشكلة ', 1, '2024-03-07 21:12:55', '2024-03-07 21:12:55'),
(35, '156.214.79.108', 'files/images/1709838782.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:13:02', '2024-03-07 21:13:02'),
(36, '156.214.79.108', '', 1, '2024-03-07 21:13:05', '2024-03-07 21:13:05'),
(37, '156.214.79.108', 'مشكله لما ندوس علي send بيبعت رستله فاضيه', 1, '2024-03-07 21:13:39', '2024-03-07 21:13:39'),
(38, '156.214.79.108', '', 1, '2024-03-07 21:13:42', '2024-03-07 21:13:42'),
(39, '156.214.79.108', '', 1, '2024-03-07 21:13:43', '2024-03-07 21:13:43'),
(40, '156.214.79.108', 'زي كده', 1, '2024-03-07 21:13:49', '2024-03-07 21:13:49'),
(41, '156.214.79.108', '', 1, '2024-03-07 21:13:51', '2024-03-07 21:13:51'),
(42, '156.214.79.108', 'جرب تدوس علي send من غير ميكون في رسالة ', 1, '2024-03-07 21:16:37', '2024-03-07 21:16:37'),
(43, '41.236.217.113', 'جرب تاني', 1, '2024-03-07 21:17:17', '2024-03-07 21:17:17'),
(44, '41.236.217.113', 'منع إرسال رسالة فاضية خلاص ', 1, '2024-03-07 21:17:44', '2024-03-07 21:17:44'),
(45, '156.214.79.108', 'جرب تدوس send مرتين ', 1, '2024-03-07 21:17:55', '2024-03-07 21:17:55'),
(46, '41.236.217.113', 'جرب انت كدة تاني', 1, '2024-03-07 21:19:18', '2024-03-07 21:19:18'),
(47, '41.236.217.113', 'ها ', 1, '2024-03-07 21:20:00', '2024-03-07 21:20:00'),
(48, '41.236.217.113', 'تمام ', 1, '2024-03-07 21:20:03', '2024-03-07 21:20:03'),
(49, '41.236.217.113', 'ابعت من الهاتف بقي كدة ', 1, '2024-03-07 21:20:48', '2024-03-07 21:20:48'),
(50, '156.214.79.108', 'الله ينور ', 1, '2024-03-07 21:21:04', '2024-03-07 21:21:04'),
(51, '156.214.79.108', 'عمل فلديشن', 1, '2024-03-07 21:21:15', '2024-03-07 21:21:15'),
(52, '41.236.217.113', 'ابعت ملف pdf ', 1, '2024-03-07 21:21:27', '2024-03-07 21:21:27'),
(53, '41.236.217.113', 'لما ترفع ملف اكتب اى حاجة ', 1, '2024-03-07 21:21:46', '2024-03-07 21:21:46'),
(54, '156.214.79.108', 'انا مش عارف ارفع صوره', 1, '2024-03-07 21:22:05', '2024-03-07 21:22:05'),
(55, '156.214.79.108', 'ن', 1, '2024-03-07 21:22:17', '2024-03-07 21:22:17'),
(56, '156.214.79.108', 'ولا pdf', 1, '2024-03-07 21:22:28', '2024-03-07 21:22:28'),
(57, '41.236.217.113', 'ارفع دلوقتي ', 1, '2024-03-07 21:22:33', '2024-03-07 21:22:33'),
(58, '41.236.217.113', 'صورة أو pdf', 1, '2024-03-07 21:22:44', '2024-03-07 21:22:44'),
(59, '156.214.79.108', 'files/images/1709839393.Screenshot_2024-02-26-16-03-20-100_com.google.android.apps.docs.jpg', 1, '2024-03-07 21:23:13', '2024-03-07 21:23:13'),
(60, '156.214.79.108', 'اعمل علامع لل pdf', 1, '2024-03-07 21:23:36', '2024-03-07 21:23:36'),
(61, '156.214.79.108', 'متخليهوش مع الصوره', 1, '2024-03-07 21:23:47', '2024-03-07 21:23:47'),
(62, '41.236.217.113', 'ارفع ', 1, '2024-03-07 21:23:53', '2024-03-07 21:23:53'),
(63, '156.214.79.108', 'هو انا لازم اعمل اسكرول كل شويه ', 1, '2024-03-07 21:24:05', '2024-03-07 21:24:05'),
(64, '41.236.217.113', 'اى شات كدة ', 1, '2024-03-07 21:24:29', '2024-03-07 21:24:29'),
(65, '41.236.217.113', 'لازم سكرول ', 1, '2024-03-07 21:24:33', '2024-03-07 21:24:33'),
(66, '156.214.79.108', 'لما بخرج وارجع بلاقي الشات رجع من فوق مش من تحت', 1, '2024-03-07 21:24:38', '2024-03-07 21:24:38'),
(67, '41.236.217.113', 'ادخل علي الواتس وشوف ', 1, '2024-03-07 21:24:39', '2024-03-07 21:24:39'),
(68, '41.236.217.113', 'لئلا الرسائل مش هتظهر ', 1, '2024-03-07 21:24:55', '2024-03-07 21:24:55'),
(69, '156.214.79.108', 'كل مكتب رساله هفضل اسكرول ؟!', 1, '2024-03-07 21:25:01', '2024-03-07 21:25:01'),
(70, '41.236.217.113', 'افتح من التلفون الإستخدام من التلفون حالياً مريح جداً ', 1, '2024-03-07 21:25:13', '2024-03-07 21:25:13'),
(71, '156.214.79.108', '🤔', 1, '2024-03-07 21:25:24', '2024-03-07 21:25:24'),
(72, '156.214.79.108', 'انا فاتح من التلفون اصلا', 1, '2024-03-07 21:25:36', '2024-03-07 21:25:36'),
(73, '156.214.79.108', 'files/images/1709839580.18th SSMMID Prelim Program-1.pptx', 1, '2024-03-07 21:26:20', '2024-03-07 21:26:20'),
(74, '156.214.79.108', 'Pdf فين', 1, '2024-03-07 21:26:32', '2024-03-07 21:26:32'),
(75, '156.214.79.108', 'Test', 1, '2024-03-07 21:32:13', '2024-03-07 21:32:13'),
(76, '156.214.79.108', 'رساله الطالب هنا ملهاش اسم ليه هو مش gust', 1, '2024-03-07 21:32:33', '2024-03-07 21:32:33'),
(77, '41.236.217.113', 'files/pdf/1709840255.بحث عن العولمة.pdf', 1, '2024-03-07 21:37:35', '2024-03-07 21:37:35'),
(78, '41.236.217.113', 'safsdfds', 1, '2024-03-07 21:43:12', '2024-03-07 21:43:12'),
(79, '41.236.217.113', 'asfasf', 1, '2024-03-07 21:43:54', '2024-03-07 21:43:54'),
(80, '41.236.217.113', 'asfasf', 1, '2024-03-07 21:47:42', '2024-03-07 21:47:42'),
(81, '41.236.217.113', 'asfasfas', 1, '2024-03-07 21:58:14', '2024-03-07 21:58:14'),
(82, '41.236.217.113', 'asfasgadsfdsfcxvc', 1, '2024-03-07 22:04:54', '2024-03-07 22:04:54'),
(83, '41.236.217.113', 'asfasfas', 1, '2024-03-07 22:08:22', '2024-03-07 22:08:22'),
(84, '41.236.217.113', 'عايزه اندومى واحد كبير', 1, '2024-03-07 22:09:51', '2024-03-07 22:09:51'),
(85, '41.236.217.113', 'محتاجة ايه ', 1, '2024-03-07 22:10:07', '2024-03-07 22:10:07'),
(86, '41.236.217.113', 'محتاجة كام واحد ', 1, '2024-03-07 22:10:57', '2024-03-07 22:10:57'),
(87, '41.236.217.113', 'واحد بس كبير', 1, '2024-03-07 22:12:43', '2024-03-07 22:12:43'),
(88, '41.236.217.113', 'خضروات', 1, '2024-03-07 22:12:58', '2024-03-07 22:12:58'),
(89, '41.236.217.113', 'تمام ', 1, '2024-03-07 22:46:45', '2024-03-07 22:46:45'),
(90, '102.43.47.171', 'test', 1, '2024-03-07 23:21:02', '2024-03-07 23:21:02'),
(91, '102.43.47.171', 'السلام عليكم', 1, '2024-03-07 23:33:41', '2024-03-07 23:33:41'),
(92, '102.43.47.171', 'سلام عليكم', 1, '2024-03-07 23:39:04', '2024-03-07 23:39:04'),
(93, '102.45.190.179', 'Ok', 1, '2024-03-07 23:39:26', '2024-03-07 23:39:26'),
(94, '102.43.47.171', 'يب', 1, '2024-03-07 23:43:27', '2024-03-07 23:43:27'),
(95, '102.45.190.179', 'مرحبا ', 1, '2024-03-07 23:43:29', '2024-03-07 23:43:29'),
(96, '41.236.217.113', 'files/images/1709848600.2.png', 1, '2024-03-07 23:56:40', '2024-03-07 23:56:40'),
(97, '102.43.47.171', 'files/images/1709848709.Untitled-2 1.png', 1, '2024-03-07 23:58:29', '2024-03-07 23:58:29'),
(98, '102.45.190.179', 'files/images/1709848735.1709848713199393564220388916960.jpg', 1, '2024-03-07 23:58:55', '2024-03-07 23:58:55'),
(99, '102.45.190.179', 'Hff', 1, '2024-03-07 23:59:34', '2024-03-07 23:59:34'),
(100, '102.45.190.179', 'files/images/1709848811.17098487896937921969396306346585.jpg', 1, '2024-03-08 00:00:11', '2024-03-08 00:00:11'),
(101, '102.45.190.179', 'files/images/1709848851.17098488266848997907852143683855.jpg', 1, '2024-03-08 00:00:51', '2024-03-08 00:00:51'),
(102, '41.236.217.113', 'fsad', 1, '2024-03-08 00:45:09', '2024-03-08 00:45:09'),
(103, '41.236.217.113', 'asfasf', 1, '2024-03-08 00:45:38', '2024-03-08 00:45:38'),
(104, '41.236.217.113', 'dfsf', 1, '2024-03-08 00:45:59', '2024-03-08 00:45:59'),
(105, '41.239.255.112', 'السلام عليكم', 1, '2024-03-08 17:29:04', '2024-03-08 17:29:04'),
(106, '41.239.255.112', 'مرحباً بكم في برنامج Intermust ', 1, '2024-03-08 17:38:44', '2024-03-08 17:38:44'),
(107, '41.239.255.112', 'files/images/1709912348.chat.png', 1, '2024-03-08 17:39:08', '2024-03-08 17:39:08'),
(108, '41.239.255.112', 'files/pdf/1709912369.Laravel Back End.pdf', 1, '2024-03-08 17:39:29', '2024-03-08 17:39:29'),
(109, '41.239.255.112', 'تاىهماىهمناتهنخمات', 1, '2024-03-08 20:28:00', '2024-03-08 20:28:00'),
(110, '41.239.255.112', 'سشبشسبشس', 1, '2024-03-08 20:28:28', '2024-03-08 20:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `chat_members`
--

CREATE TABLE `chat_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_members`
--

INSERT INTO `chat_members` (`id`, `member_id`, `group_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(23, 6, 12, 1, NULL, '2024-03-07 21:27:43', '2024-03-07 23:47:44'),
(24, 34, 12, 1, NULL, '2024-03-07 23:29:50', '2024-03-07 23:47:42'),
(25, 32, 12, 1, NULL, '2024-03-07 23:45:48', '2024-03-07 23:47:38'),
(27, 35, 14, 0, NULL, '2024-03-08 17:40:18', '2024-03-08 17:40:18'),
(28, 37, 13, 0, '2024-03-08 20:19:46', '2024-03-08 20:11:48', '2024-03-08 20:19:46'),
(29, 37, 15, 1, NULL, '2024-03-08 20:19:10', '2024-03-08 20:19:33'),
(30, 38, 15, 1, NULL, '2024-03-08 20:23:51', '2024-03-08 20:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `chat_private_messages`
--

CREATE TABLE `chat_private_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_private_messages`
--

INSERT INTO `chat_private_messages` (`id`, `sender_id`, `group_id`, `message`, `is_active`, `created_at`, `updated_at`) VALUES
(62, 34, 12, 'السلام عليكم ورحمة الله وبركاته ', 1, '2024-03-07 23:47:55', '2024-03-07 23:47:55'),
(63, 34, 12, 'نيتيايم', 1, '2024-03-07 23:48:10', '2024-03-07 23:48:10'),
(64, 34, 12, 'وطتبتيت', 1, '2024-03-07 23:48:14', '2024-03-07 23:48:14'),
(65, 34, 12, 'نظنبتيتميه', 1, '2024-03-07 23:48:17', '2024-03-07 23:48:17'),
(66, 32, 12, 'و عليكم السلام', 1, '2024-03-07 23:48:21', '2024-03-07 23:48:21'),
(67, 34, 12, 'مينبتابين', 1, '2024-03-07 23:48:25', '2024-03-07 23:48:25'),
(68, 34, 12, 'مبعايتثمثهب', 1, '2024-03-07 23:48:33', '2024-03-07 23:48:33'),
(69, 34, 12, 'نتتيتمبلهعبني', 1, '2024-03-07 23:48:48', '2024-03-07 23:48:48'),
(70, 34, 12, 'تيتخيعثت', 1, '2024-03-07 23:48:58', '2024-03-07 23:48:58'),
(71, 34, 12, 'منيتمثثت', 1, '2024-03-07 23:49:01', '2024-03-07 23:49:01'),
(72, 34, 12, 'files/images/1709848910.17098488885484551349358596462881.jpg', 1, '2024-03-08 00:01:50', '2024-03-08 00:01:50'),
(73, 32, 12, 'files/images/1709848954.Untitled-2 1.png', 1, '2024-03-08 00:02:34', '2024-03-08 00:02:34'),
(75, 32, 12, 'kjlg', 1, '2024-03-08 00:11:46', '2024-03-08 00:11:46'),
(76, 37, 15, 'السلام عليكم', 1, '2024-03-08 20:20:40', '2024-03-08 20:20:40'),
(77, 37, 15, 'files/images/1709922086.02.jpg', 1, '2024-03-08 20:21:26', '2024-03-08 20:21:26'),
(78, 37, 15, 'files/pdf/1709922108.My Cv 2.pdf', 1, '2024-03-08 20:21:48', '2024-03-08 20:21:48'),
(79, 38, 15, 'وعليكم السلام ', 1, '2024-03-08 20:24:39', '2024-03-08 20:24:39'),
(80, 38, 15, 'files/images/1709922310.01.jpg', 1, '2024-03-08 20:25:10', '2024-03-08 20:25:10'),
(81, 38, 15, 'files/pdf/1709922341.Laravel Back End.pdf', 1, '2024-03-08 20:25:41', '2024-03-08 20:25:41');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `IDNum` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `Nation` varchar(255) DEFAULT NULL,
  `profileImg` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `IDNum`, `college`, `Nation`, `profileImg`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'test', 'admin@gmail.com', '77977', 'it', 'eg', 'images/users/1709577126.jpg', NULL, '$2y$12$5CXLRZfTR.Zs7lv/PHRHaunnwCovKxA.6RypkOSulDvg9Ty59K2WG', 1, NULL, '2024-03-04 18:32:07', '2024-03-04 18:32:07'),
(8, 'Anas Rabea', 'anas@gmail.com', '12345678', 'تكنولوحيا المعلومات', 'اليمن', 'images/users/1709578095.png', NULL, '$2y$12$CyVsJW.hZnWeXDqxbxCNN.8/G9HB0UNtt93nOzAV05qtTq30uorZq', 1, NULL, '2024-03-04 18:48:16', '2024-03-04 18:48:16'),
(9, 'Ahmed Badr', 'ahmed@gmail.com', '87654321', 'it', 'eg', 'images/users/1709578494.jpg', NULL, '$2y$12$hwv6LhkrDgGYh9B0bdzRv.jt0KdHtkRpiSvk.ApyhG5ivLI6JBVkW', 1, NULL, '2024-03-04 18:54:55', '2024-03-04 18:54:55'),
(10, 'Ammar Ahmed', 'Ammar@gmail.com', '98040', 'IT', 'يمني', '', NULL, '$2y$12$NFLJSXZQN8GUB4xdgOxtI.7xu6o7NiMhawj5e/MR6NRNiAktfwFhi', 1, NULL, '2024-03-04 21:19:50', '2024-03-04 22:15:38'),
(11, 'Hisham Mohammed', 'alawadhihisham88@gmail.com', '94247', 'IT', 'يمني', 'images/users/1709582501.jpg', NULL, '$2y$12$MTGJWJBkMnnY4MHEhSQuyuaDU/WS4WF3v/NXwZ.k.0qmZ9TD6y81C', 1, NULL, '2024-03-04 22:01:41', '2024-03-04 22:01:41'),
(12, 'Tariq', 'tariqms792@gmail.com', '90292', 'It', 'يمني', 'images/users/1709583417.jpg', NULL, '$2y$12$gKQTZBKfneKzX9Stf4GTR.jZ7hbmbJWNBTGyOwl1NpSskYQXANe4K', 1, NULL, '2024-03-04 22:16:58', '2024-03-04 22:16:58'),
(13, 'محمود', 'am@gmail.com', '200001', 'طب', 'oman', '', NULL, '$2y$12$CLmvU.YcobN6wwiRATd6M.eph97YjCZvqkMbDLwtZ1.NZSM36bw/2', 1, NULL, '2024-03-04 22:33:09', '2024-03-04 22:33:09'),
(14, 'aaaaaa', 'a@a.com', '246546', 'تكنولوحيا المعلومات', 'eg', '', NULL, '$2y$12$u3342qZVnvkIJuTUOjsFsuChSXeP6UMdUzvOxRtzRm/XEZHyXS3Ye', 1, NULL, '2024-03-05 00:23:24', '2024-03-05 00:23:24'),
(16, 'مني', 'Mysuccess1823@gmail.com', '50324', 'كلية اصول دين', 'مصرية', '', NULL, '$2y$12$UXGWY1TqXnFerNESRZ7au..kL6xmKT8Jba82Bpqfcx4AvVfPFvYQS', 1, NULL, '2024-03-06 01:53:39', '2024-03-06 01:53:39'),
(17, 'Abdul', 'Abdulrahman.fit@gmail.com', '94251', 'IT', 'Yemen', '', NULL, '$2y$12$h50krlXldrgcLjjkzp7.Fe3lHs2joNuswlteMSwQ1RnvZDC255N0e', 1, NULL, '2024-03-06 21:34:51', '2024-03-06 21:34:51'),
(20, 'عمار', 'ammar2@gmail.com', '98', 'It', 'يمني', '', NULL, '$2y$12$fg7o.WGUQjlmOyd7k.yiIe4gejnHHWUR7oj20QHAihNReZ1PkxRbe', 1, NULL, '2024-03-06 21:41:44', '2024-03-06 21:41:44'),
(21, 'Ammar', 'ammar3@gmail.com', '12', 'It', 'يمني', '', NULL, '$2y$12$kNwA8Mp1hmzcyDOBm9R0YujMTzC0f1fd.lmPUdTf2I0K.x5jrUhkC', 1, NULL, '2024-03-06 21:43:02', '2024-03-06 21:43:02'),
(22, 'Ali', 'Ali@gmail.com', '13', 'It', 'كويت', '', NULL, '$2y$12$6/Tms7/IuUCNdG8FWS8/2uyHFBD1PHZ1fB8OoIn3Fju/kc2dYlxn.', 1, NULL, '2024-03-06 21:44:48', '2024-03-06 21:44:48'),
(27, 'Amjad Mohammed', 'amgadalawadhi@gmail.com', '8899', 'It', 'يمني', '', NULL, '$2y$12$qRr84xqnDsinX3dOSwYCyOfqkX2WuYjobkGfIGwmTfEfhVxOzuL8.', 1, NULL, '2024-03-07 22:11:24', '2024-03-07 22:11:24'),
(29, 'Aa', 'ammar123456@gmail.com', '123456', 'طب', 'يمن', '', NULL, '$2y$12$f4KQX8fXUzwjCCKXi1Q3YeMGoEVsr0h.DnYZvVH4xAOg7yp9EW8G6', 1, NULL, '2024-03-07 23:20:54', '2024-03-07 23:20:54'),
(32, 'Anas', 'anas@cg.com', '779777', 'تكنولوحيا المعلومات', 'اليمن', 'images/users/1709847623.jpg', NULL, '$2y$12$GdzADriZ8xc/OWWx.OXU4u30UoYlAzzhtvONSIlPXRRLhg9j1rBSW', 1, NULL, '2024-03-07 23:26:03', '2024-03-07 23:40:23'),
(33, 'مغربي', 'm@gmail.com', '80', 'IT', 'المغرب', '', NULL, '$2y$12$bkX1eyuZdSbEJmDh1TUd4Ob9Z3noe5weeiGDEyJrufpl5BtUW7YAK', 1, NULL, '2024-03-07 23:26:13', '2024-03-07 23:26:13'),
(34, 'Ttt', 'ttt@gmail.com', '90', 'هندسه', 'تونس', 'images/users/1709847756.jpg', NULL, '$2y$12$hkiXEuymmB6C/O.sZlpqcuAcFEEf/qYkYBLL35UjQmJC8JDv70hS2', 1, NULL, '2024-03-07 23:29:01', '2024-03-07 23:42:36'),
(35, 'عبد الله', 'Student200@example.com', '20012342', 'كلية حاسبات ومعلومات', 'مصرى', 'images/users/1709912222.png', NULL, '$2y$12$4FTdMeiGP5/SVkJLZgMLQe3u/kcaPHHJFeseWHKoCkU39urHfjtsG', 1, NULL, '2024-03-08 17:37:02', '2024-03-08 17:42:53'),
(37, 'Abdallah Mohamad', 'st@example.com', '100246', 'كلية هندسة', 'مصرى', 'images/users/1709921428.jpg', NULL, '$2y$12$bEWLv02Bj6A.5UKtajSwIenaJAPikbsUOs.wjDxzH8srf6KiszJ..', 1, NULL, '2024-03-08 20:10:28', '2024-03-08 20:16:02'),
(38, 'محمد ياسر', 'st2@example.com', '100247', 'كلية أصول دين', 'مصرى', 'images/users/1709922199.png', NULL, '$2y$12$gnO/NrU1yblYjjPGhPuSZ.JnG/ruBK/KQQx4Qre1MomYF5KprFRmi', 1, NULL, '2024-03-08 20:23:20', '2024-03-08 20:23:20');

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
(8, '2024_02_26_170918_create_members_table', 2),
(9, '2024_02_26_203137_create_chat_groups_table', 2),
(14, '2024_03_01_140252_create_chat_members_table', 3),
(15, '2024_03_01_200515_create_chat_private_messages_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profileImg` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profileImg`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'admin@gmail.com', 'images/users/1709577747.png', NULL, '$2y$12$w8ZRyJcrkJqwgBtEirkMSeqn0PEbDfTjb.w5618vsfSoRm5D7HfHW', NULL, '2024-03-04 18:42:27', '2024-03-04 18:42:27'),
(7, 'عبد الله', 'abdallamohmad999@gmail.com', 'images/users/1709921655.jpg', NULL, '$2y$12$uVM72IgdRby4Ae7hzNFiLec2nByBYL43ZlyMpzyre/kQ9cx9Zgykq', NULL, '2024-03-05 13:28:50', '2024-03-08 20:14:15'),
(8, 'admin@admin.com', 'admin@admin.com', '', NULL, '$2y$12$jfLK/4orQGT616QaCnWUFOX5VOSaWEQ7mkmdAJ8dB9h3LMArViWmi', NULL, '2024-03-07 23:47:25', '2024-03-07 23:47:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_groups`
--
ALTER TABLE `chat_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_guests`
--
ALTER TABLE `chat_guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_guest_messages`
--
ALTER TABLE `chat_guest_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_members`
--
ALTER TABLE `chat_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_members_member_id_foreign` (`member_id`),
  ADD KEY `chat_members_group_id_foreign` (`group_id`);

--
-- Indexes for table `chat_private_messages`
--
ALTER TABLE `chat_private_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_private_messages_sender_id_foreign` (`sender_id`),
  ADD KEY `chat_private_messages_group_id_foreign` (`group_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`),
  ADD UNIQUE KEY `members_idnum_unique` (`IDNum`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_groups`
--
ALTER TABLE `chat_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat_guests`
--
ALTER TABLE `chat_guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_guest_messages`
--
ALTER TABLE `chat_guest_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `chat_members`
--
ALTER TABLE `chat_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chat_private_messages`
--
ALTER TABLE `chat_private_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_members`
--
ALTER TABLE `chat_members`
  ADD CONSTRAINT `chat_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `chat_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_members_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_private_messages`
--
ALTER TABLE `chat_private_messages`
  ADD CONSTRAINT `chat_private_messages_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `chat_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_private_messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
