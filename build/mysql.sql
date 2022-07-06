-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2021 at 03:03 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ysd_framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_demo`
--

CREATE TABLE `cms_demo` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_radio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `my_select` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logos` mediumtext COLLATE utf8mb4_unicode_ci,
  `url_slug` text COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_demo`
--

INSERT INTO `cms_demo` (`id`, `url`, `date`, `color`, `latitude`, `longitude`, `my_radio`, `my_select`, `logos`, `url_slug`, `arrange`, `is_show`, `publish_at`, `offline_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '{\"r\":146,\"g\":65,\"b\":65,\"a\":1}', NULL, NULL, '0', NULL, NULL, '1', 1, 1, '2021-07-27 06:54:08', NULL, 1, 1, '2021-07-27 06:54:08', '2021-07-27 06:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `cms_demo_description`
--

CREATE TABLE `cms_demo_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `editor` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_demo_description`
--

INSERT INTO `cms_demo_description` (`description_id`, `language_id`, `title`, `description`, `editor`, `address`) VALUES
(1, 1, '1', NULL, NULL, NULL),
(1, 2, '2', NULL, NULL, NULL),
(1, 3, '3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_demo_tag`
--

CREATE TABLE `cms_demo_tag` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `url_slug` text COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_demo_tag`
--

INSERT INTO `cms_demo_tag` (`id`, `url`, `url_slug`, `arrange`, `is_show`, `publish_at`, `offline_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'tag1', 1, 1, '2021-07-27 05:57:00', NULL, 1, 1, '2021-07-27 05:57:25', '2021-07-27 05:57:38'),
(2, NULL, 'tag2', 2, 1, '2021-07-27 05:57:00', NULL, 1, 1, '2021-07-27 05:57:32', '2021-07-27 05:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `cms_demo_tag_description`
--

CREATE TABLE `cms_demo_tag_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_demo_tag_description`
--

INSERT INTO `cms_demo_tag_description` (`description_id`, `language_id`, `title`, `description`) VALUES
(1, 1, 'Tag1', NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(2, 1, 'Tag2', NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_demo_tag_relation`
--

CREATE TABLE `cms_demo_tag_relation` (
  `cms_demo_id` int(11) NOT NULL,
  `cms_demo_tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE `home_banner` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `url_slug` text COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_banner_description`
--

CREATE TABLE `home_banner_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

CREATE TABLE `home_page` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci,
  `url_slug` text COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_description`
--

CREATE TABLE `home_page_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `arrange` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `display_name`, `code`, `arrange`, `active`) VALUES
(1, 'English', 'EN', 'en', 3, 1),
(2, '繁體中文', '繁', 'zh-hant', 2, 1),
(3, '简体中文', '简', 'zh-hans', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locked`
--

CREATE TABLE `locked` (
  `id` int(11) NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `file_name` text NOT NULL,
  `extension` varchar(255) NOT NULL,
  `disk` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_folder`
--

CREATE TABLE `media_folder` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2018_12_27_082255_create_home_banner_table', 1),
(12, '2018_12_27_082547_create_home_banner_description_table', 1),
(13, '2019_01_18_162733_create_media_table', 2),
(14, '2019_03_27_100136_create_password_securities_table', 3),
(15, '2018_08_08_100000_create_telescope_entries_table', 4),
(16, '2018_10_06_100234_create_media_manager_lock_list_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_securities`
--

CREATE TABLE `password_securities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `google2fa_enable` tinyint(1) NOT NULL DEFAULT '0',
  `google2fa_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_securities`
--

INSERT INTO `password_securities` (`id`, `user_id`, `google2fa_enable`, `google2fa_secret`, `created_at`, `updated_at`) VALUES
(5, 1, 0, 'P563VEYGB4ICL2X3', '2019-03-27 15:18:13', '2019-03-27 16:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

CREATE TABLE `post_media` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `is_repeater` tinyint(4) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `mediable_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `post_table` varchar(255) NOT NULL,
  `mediable_type` varchar(255) NOT NULL,
  `arrange` int(11) NOT NULL DEFAULT '0',
  `details` mediumtext,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `permissions` text,
  `is_super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `arrange` int(11) NOT NULL DEFAULT '0',
  `is_show` tinyint(4) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`, `permissions`, `is_super_admin`, `arrange`, `is_show`, `publish_at`, `offline_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', 1, 1, 1, NULL, NULL, 1, 1, '2019-02-19 13:53:23', '2019-02-19 14:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `auto_title` tinyint(4) DEFAULT '1',
  `auto_description` tinyint(4) DEFAULT '1',
  `post_id` int(11) NOT NULL,
  `post_table` varchar(255) NOT NULL,
  `title` text,
  `description` text,
  `keywords` text,
  `arrange` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seo_description`
--

CREATE TABLE `seo_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int(11) NOT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_setting`
--

INSERT INTO `system_setting` (`id`, `details`, `arrange`, `is_show`, `publish_at`, `offline_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '{\"enable_max_img_size\":\"1\",\"img_max_width\":\"2048\",\"img_max_height\":\"2048\",\"jpg_quality\":\"70\"}', 1, 1, NULL, NULL, 1, 1, '2019-03-26 11:51:04', '2021-01-13 04:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `system_setting_description`
--

CREATE TABLE `system_setting_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_setting_description`
--

INSERT INTO `system_setting_description` (`description_id`, `language_id`, `page_title`, `page_description`) VALUES
(1, 1, 'YSD x Laravel', NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translation`
--

CREATE TABLE `translation` (
  `id` int(11) NOT NULL,
  `string_key` text COLLATE utf8mb4_unicode_ci,
  `arrange` int(11) DEFAULT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translation_description`
--

CREATE TABLE `translation_description` (
  `description_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrange` int(11) NOT NULL,
  `is_show` tinyint(4) NOT NULL DEFAULT '1',
  `publish_at` timestamp NULL DEFAULT NULL,
  `offline_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `arrange`, `is_show`, `publish_at`, `offline_at`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wilson', 'ysd-wilson', 'wilson@ysd.hk', NULL, '$2y$10$q/z57/1FnW4ysnREn.GIp.3F6GLHq0HpspOzCiCmIdgnOtaiNIOkm', 'qZg4B7syuGC4g8RYxF3Pm1vHEFWkHBYiqdK7Oeapg1j3Q467695VqeLL6U6T', 0, 1, '2019-02-06 00:00:00', NULL, 0, 1, '2019-02-06 00:00:00', '2020-07-15 05:48:04'),
(6, 1, 'Vincent', 'ysd-vincent', 'vincent@ysd.hk', NULL, '$2y$10$1zMpXDGQQ.3xf.ldy4WSz.ev5CkSfNumqybkTdjX4VqkIbsJT./R2', NULL, 3, 1, '2019-05-06 17:36:00', NULL, 1, 1, '2019-05-06 17:36:50', '2019-05-06 17:36:50'),
(7, 1, 'Ivan', 'ysd-ivan', 'ck@ysd.hk', NULL, '$2y$10$cQnNgWkGsijCJ1JaX59DM.0EGTGF0aRbSfiM8/uw/4xwp/kpfnToS', NULL, 4, 1, '2019-05-06 17:37:00', NULL, 1, 1, '2019-05-06 17:37:35', '2019-05-06 17:37:35'),
(8, 1, 'Peter', 'ysd-peter', 'peter@ysd.hk', NULL, '$2y$10$V31Wr5o8o0bpaCDZDKvu4uJ6uP5wjUGgU/.WfeufYRzSfIzui11ve', NULL, 5, 1, '2019-06-24 16:57:00', NULL, 1, 1, '2019-06-24 16:57:36', '2019-06-24 16:57:36'),
(9, 1, 'William', 'ysd-william', 'william@ysd.hk', NULL, '$2y$10$f.DlN297gHA4cUojuGWpnO6pGfxKrKm2vGir4EFfDC3CP6.T1/K2i', NULL, 6, 1, '2019-06-24 16:57:00', NULL, 1, 1, '2019-06-24 16:58:21', '2019-06-24 16:58:21'),
(10, 1, 'Kwan', 'ysd-kwan', 'kwan@ysd.hk', NULL, '$2y$10$FWJGhNkT9pluNfFPd3OvluxY6IyAGsI8w5QXjE7i5oGdIeILiBV92', 'qyHhir2LaiGCpuoOj15MPIElCYVkyuuYsdi1nu3SkcTmFgZe6bc1a13ucKK4', 7, 1, '2019-06-24 16:58:00', NULL, 1, 1, '2019-06-24 16:59:03', '2019-06-24 16:59:03'),
(11, 1, 'Eddy', 'ysd-eddy', 'eddy@ysd.hk', NULL, '$2y$10$6qnxPHs1wRml1HbSwu56quiI41lm1XPgYYszvj17MzKBUfbsgZlVG', NULL, 8, 1, '2019-06-24 16:59:00', NULL, 1, 1, '2019-06-24 16:59:57', '2019-06-24 16:59:57'),
(12, 1, 'Chris', 'ysd-chris', 'chris@ysd.hk', NULL, '$2y$10$VNncPUe6ba0VMPI1Ba8.4uRp4CaigBUp9azCYYAx81s9D.zLcerVe', NULL, 9, 1, '2021-01-19 02:17:00', NULL, 1, 1, '2021-01-19 02:18:23', '2021-01-19 02:18:23'),
(13, 1, 'Yin', 'ysd-yin', 'yintsang@ysd.hk', NULL, '$2y$10$To/vhqctDfKsqhvq3228Y.2KZNnFkZuCCy0dMvjUq/VBKAgRtVWlS', NULL, 10, 1, '2021-07-27 02:36:00', NULL, 1, 1, '2021-07-27 02:37:35', '2021-07-27 02:37:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_demo`
--
ALTER TABLE `cms_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_demo_description`
--
ALTER TABLE `cms_demo_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `cms_demo_tag`
--
ALTER TABLE `cms_demo_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_demo_tag_description`
--
ALTER TABLE `cms_demo_tag_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `cms_demo_tag_relation`
--
ALTER TABLE `cms_demo_tag_relation`
  ADD PRIMARY KEY (`cms_demo_id`,`cms_demo_tag_id`);

--
-- Indexes for table `home_banner`
--
ALTER TABLE `home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_banner_description`
--
ALTER TABLE `home_banner_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `home_page`
--
ALTER TABLE `home_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_description`
--
ALTER TABLE `home_page_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_folder`
--
ALTER TABLE `media_folder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`parent_id`);

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
-- Indexes for table `password_securities`
--
ALTER TABLE `password_securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_media`
--
ALTER TABLE `post_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`,`post_table`);

--
-- Indexes for table `seo_description`
--
ALTER TABLE `seo_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_setting_description`
--
ALTER TABLE `system_setting_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

--
-- Indexes for table `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translation_description`
--
ALTER TABLE `translation_description`
  ADD PRIMARY KEY (`description_id`,`language_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_demo`
--
ALTER TABLE `cms_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_demo_tag`
--
ALTER TABLE `cms_demo_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_banner`
--
ALTER TABLE `home_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page`
--
ALTER TABLE `home_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_folder`
--
ALTER TABLE `media_folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `password_securities`
--
ALTER TABLE `password_securities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_media`
--
ALTER TABLE `post_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `translation`
--
ALTER TABLE `translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
