-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Eyl 2018, 19:51:30
-- Sunucu sürümü: 10.1.33-MariaDB
-- PHP Sürümü: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `d1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(82, 'silme', 'silmeeeeeeeeee', 0, '2018-08-08 10:04:15', '2018-08-08 10:04:15'),
(84, 'sil ÅŸunu', 'sil yav', 0, '2018-08-08 11:45:08', '2018-08-08 11:45:08'),
(85, 'deneyelim', 'hadi bakalÄ±m              ', 1, '2018-08-14 13:38:48', '2018-08-14 13:38:48'),
(86, 'denemeeee', 'dene       ', 1, '2018-08-17 09:34:30', '2018-08-17 09:34:30'),
(87, 'Yeni', 'departman', 0, '2018-08-27 06:59:06', '2018-08-27 06:59:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todos`
--

CREATE TABLE `todos` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_user` int(11) DEFAULT NULL,
  `done_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `is_done`, `content`, `created_user`, `done_at`, `created_at`, `updated_at`, `expiry_date`) VALUES
(1, 5, 1, 'admin sayfasi', 1, '2018-08-14 13:45:41', '2018-08-05 16:38:00', NULL, '2018-08-13 07:37:22'),
(3, 8, 1, 'database1', 1, '2018-08-13 07:31:36', '2018-08-03 12:39:58', NULL, '2018-08-13 07:31:36'),
(4, 5, 1, 'hallettt', NULL, '2018-08-27 06:19:36', '2018-08-12 20:40:30', NULL, '2018-08-12 20:37:26'),
(5, 4, 0, 'hallet kesin halletmelisin', NULL, '2018-08-13 07:09:59', '2018-08-12 20:40:30', NULL, '2018-08-13 07:09:59'),
(6, 5, 1, 'hallettt', NULL, '2018-08-27 06:19:36', '2018-08-12 20:40:30', NULL, '2018-08-12 20:40:04'),
(8, 2, 0, 'hadi', NULL, '2018-08-12 20:41:19', '2018-08-12 20:41:19', NULL, '2018-08-12 20:41:19'),
(9, 2, 0, 'hallettt', NULL, '2018-08-13 12:55:33', '2018-08-13 12:55:33', NULL, '2018-08-13 12:55:33'),
(10, 2, 0, 'deneme', NULL, '2018-08-13 12:56:17', '2018-08-13 12:56:17', NULL, '2018-08-13 12:56:17'),
(11, 2, 1, 'deneme2', NULL, '2018-08-13 12:56:36', '2018-08-13 12:56:24', NULL, '2018-08-13 12:56:24'),
(12, 9, 0, 'deneme', NULL, '2018-08-14 12:11:44', '2018-08-14 12:11:44', NULL, '2018-08-14 12:11:44'),
(13, 5, 1, 'deneme user', NULL, '2018-08-27 06:19:36', '2018-08-16 06:44:13', NULL, '2018-08-16 06:44:13'),
(14, 5, 1, 'olacak mÄ± acabaaaa', NULL, '2018-08-27 06:19:36', '2018-08-16 06:44:39', NULL, '2018-08-16 06:44:39'),
(15, 5, 1, 'deneme', NULL, '2018-08-27 06:19:36', '2018-08-16 06:45:57', NULL, '2018-08-16 06:45:57'),
(16, 5, 1, 'llololo', NULL, '2018-08-27 06:19:36', '2018-08-16 11:58:56', NULL, '2018-08-16 11:58:56'),
(17, 5, 1, 'lalalal', NULL, '2018-08-27 06:19:36', '2018-08-16 12:13:59', NULL, '2018-08-16 12:13:59'),
(20, 8, 1, 'detay', NULL, '2018-08-17 08:39:45', '2018-08-17 08:39:19', NULL, '2018-08-17 08:39:19'),
(21, 8, 1, 'detay2', NULL, '2018-08-17 08:39:51', '2018-08-17 08:39:26', NULL, '2018-08-17 08:39:26'),
(22, 5, 1, 'detay3', NULL, '2018-08-17 08:39:56', '2018-08-17 08:39:33', NULL, '2018-08-17 08:39:33'),
(23, 8, 0, 'bakalÄ±m', 8, '2018-08-17 10:50:14', '2018-08-17 10:50:14', NULL, '2018-08-17 10:50:14'),
(24, 5, 0, 'check', 5, '2018-08-27 07:04:16', '2018-08-27 07:04:16', NULL, '2018-08-27 07:04:16'),
(26, 5, 0, 'bit', 5, '2018-08-31 12:24:57', '2018-08-31 12:24:57', NULL, '2018-08-31 12:24:57');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `hiredate` date DEFAULT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `department_id`, `name`, `last_name`, `email`, `phone`, `address`, `image`, `birthdate`, `hiredate`, `gender`, `password`, `is_manager`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 1, 'John', 'Locke', 'johnlocke@gmail.com', '95116592378', 'falan filan filan falan', 'Ekran Resmi 2018-07-26 12.20.37.png', '2018-08-02', '2018-08-02', 'Male', '$1$1055moya$uNg/fvLIUgdEpek7FF9jG1', 1, 0, '2018-08-02 13:33:59', '2018-08-02 13:33:59'),
(8, 3, 'Christian', 'Shephard', 'christians@hotmail.com', '8976541321', 'ada', 'Ekran Resmi 2018-07-26 12.25.06.png', '2018-08-06', '2018-08-06', 'Male', 'jack', 0, 0, '2018-08-06 07:36:51', '2018-08-06 07:36:51'),
(9, 2, 'Charlie', 'Pace', 'pacecharlie@gmail.com', '95116592378', 'ada', 'Ekran Resmi 2018-07-26 12.20.53.png', '2018-08-06', '2018-08-06', 'Male', 'fate', 0, 0, '2018-08-06 08:21:19', '2018-08-06 08:21:19'),
(21, 4, 'Sayid', 'Jarrah', 'sayidd@gmail.com', '95116592378', 'Iran', '', '2018-08-06', '2018-08-06', 'Male', '*0', 0, 1, '2018-08-06 10:02:54', '2018-08-06 10:02:54'),
(24, 3, 'Kate', 'Austin', 'kateaustin@gmail.com', '456258753159', 'ada', '', '2018-08-07', '2018-08-07', 'Female', '$1$1055moya$/qUbeWYx0q08SZrRFLKkW1', 0, 1, '2018-08-07 06:39:19', '2018-08-07 06:39:19'),
(50, 3, 'Nescafe', 'Gold', 'Nescafe@gold.com', '894562130', 'oda', '', '2018-08-14', '2018-08-14', 'Male', '$1$1055moya$QcjhX8osu136xIutCh5eL0', 1, 0, '2018-08-14 13:02:04', '2018-08-14 13:02:04'),
(52, 85, 'Erikli', 'Su', 'su@gmail.com', '444 0 222', 'uludaÄŸÄ±n zirvesi', '', '2018-08-27', '2018-08-27', 'Female', '$1$1055moya$ocx4r484VXjqXPZLjjyDB1', 0, 1, '2018-08-27 06:58:46', '2018-08-27 06:58:46'),
(53, 87, 'DinÃ§su', 'DoÄŸal', 'dogal@dincsu.com', '', 'Uludag', '', '2018-08-31', '2018-08-31', 'Female', '$1$1055moya$tWl/ncOkyQusAh3yrzdiH/', 1, 0, '2018-08-31 08:59:14', '2018-08-31 08:59:14'),
(54, 86, 'ppppp', '', 'pppp@pppp.com', '', '', '', '2018-08-31', '2018-08-31', 'Male', '$1$1055moya$lA6WFdOx.QiishGikXK08.', 0, 0, '2018-08-31 11:11:53', '2018-08-31 11:11:53'),
(55, 87, 'Efsina', '', 'deniz@tuzu.com', '', '', '', '2018-08-31', '2018-08-31', 'Male', '110g', 0, 0, '2018-08-31 11:14:31', '2018-08-31 11:14:31');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_name` (`department_name`);

--
-- Tablo için indeksler `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Tablo için AUTO_INCREMENT değeri `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
