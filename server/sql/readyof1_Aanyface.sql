-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2024 at 09:09 AM
-- Server version: 8.0.36-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readyof1_Aanyface`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userimg` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `verifay` varchar(50) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `like` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `username`, `userimg`, `date`, `verifay`, `img`, `created_at`, `like`) VALUES
(12, '', 'sabbirrahman', '2e80c97f-5cb3-41b8-b686-5758a9796d1c (1).jpeg', '03 Oct 2024 - 11:54:48 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'msg6389762888-6573.jpg', '2024-10-06 05:28:13', NULL),
(13, '😍😍', 'Op Rafe', 'IMG_1794.jpeg', '03 Oct 2024 - 11:58:47 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'IMG_6352.jpeg', '2024-10-06 05:28:13', NULL),
(14, '🌸🦀', 'Hozaifa', NULL, '03 Oct 2024 - 11:19:02 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000095004.jpg', '2024-10-06 05:28:13', NULL),
(15, '', 'MD BADOL HASHEN', '1000031315.jpg', '02 Oct 2024 - 6:48:44 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000055669.jpg', '2024-10-06 05:28:13', NULL),
(16, '', 'Jafor', 'Screenshot_20240816-171729.jpg', '02 Oct 2024 - 5:16:20 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'Screenshot_20240816-171729.jpg', '2024-10-06 05:28:13', NULL),
(17, 'দৃষ্টিতে প্রেম জড়ে... 🌸 হাসিতে স্নিগ্ধতা 🙂 যতই দেখি তোমারে গিরে ধরে মুগ্ধতা 🌸🌼😍', 'Md. Omar Hasan', 'IMG_20241001_191942_207.jpg', '02 Oct 2024 - 3:30:05 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1727306138683.jpg', '2024-10-06 05:28:13', NULL),
(18, '', 'Md Maruf', 'GVQEsWbpdvOLhhuZrKProMqYVOK.jpg', '02 Oct 2024 - 12:25:29 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'Screenshot_20241001_193610.jpg', '2024-10-06 05:28:13', NULL),
(19, '', 'MD BADOL HASHEN', '1000031315.jpg', '02 Oct 2024 - 11:54:20 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000030921.jpg', '2024-10-06 05:28:13', NULL),
(20, '', 'Shaishob', '6508fc76c94bc94120ab051152dcb76f.png', '01 Oct 2024 - 12:45:23 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '4d8dece801e2b047afd53e57af775169.png', '2024-10-06 05:28:13', NULL),
(21, '', 'MD BADOL HASHEN', '1000031315.jpg', '01 Oct 2024 - 11:28:20 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000030926.jpg', '2024-10-06 05:28:13', NULL),
(22, 'Kop Soon 😆🤑🤑', 'MD JUBAER', '1000004846.jpg', '28 Sep 2024 - 7:31:58 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000004833.jpg', '2024-10-06 05:28:13', NULL),
(23, '', 'Md Rony', '1722756066490.jpg', '28 Sep 2024 - 5:54:20 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1727365469757.jpg', '2024-10-06 05:28:13', NULL),
(24, 'I don\'t know if the photo looks like a cartoon ?', 'Juthi Sultana', 'juthi.jpg', '28 Sep 2024 - 1:53:49 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '6d883b9dc44906d78c5b8653de96d2d9.jpg', '2024-10-06 05:28:13', NULL),
(25, '', 'Md Rubel', '1000034243.jpg', '28 Sep 2024 - 11:01:35 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000030821.jpg', '2024-10-06 05:28:13', NULL),
(26, '', 'sabbirrahman', '2e80c97f-5cb3-41b8-b686-5758a9796d1c (1).jpeg', '28 Sep 2024 - 10:09:27 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'd63f5aad-b761-4a79-9ba1-9f2edbefc934.jpeg', '2024-10-06 05:28:13', NULL),
(27, 'A new update will be made on this website\r\nThat is the notifistion system will be done. think You', 'AnyFace App', 'appicon.png', '28 Sep 2024 - 10:13:56 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'Purple Futuristic Technology Presentation.png', '2024-10-06 05:28:13', NULL),
(28, '<h1><a href=\"https://anyface.readyoffercareer.com/admin/\">Click To Open Admin Panel</a></h1>', 'Juthi Sultana', 'juthi.jpg', '26 Sep 2024 - 10:10:50 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'allgrp.gif', '2024-10-06 05:28:13', NULL),
(29, 'hi', 'alshahed_biswas', 'Untitled-1.png', '26 Sep 2024 - 9:06:27 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '441037628_297764543389291_4585970520463638296_n.jpg', '2024-10-06 05:28:13', NULL),
(30, 'ShaheDevise', 'alshahed_biswas', 'Untitled-1.png', '26 Sep 2024 - 8:11:27 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'Shahedevise.png', '2024-10-06 05:28:13', NULL),
(31, '', 'Md Mamun', '20240910_222135.jpg', '26 Sep 2024 - 7:05:27 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '190d704a-e5cf-4cd8-9f49-356ac77ea4f2.jpg', '2024-10-06 05:28:13', NULL),
(32, '', 'Sourov', '1723456337485.jpg', '26 Sep 2024 - 5:11:48 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1723614547483_1.jpg', '2024-10-06 05:28:13', NULL),
(33, '', 'Rubel hossen', '1725867729501.jpg', '26 Sep 2024 - 5:08:59 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1723807029754.jpg', '2024-10-06 05:28:13', NULL),
(34, '', 'MD Rifat', 'Screenshot_20240804_204704_TikTok.png', '26 Sep 2024 - 4:11:10 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'image_search_1706875952099.jpg', '2024-10-06 05:28:13', NULL),
(35, '', 'Md Rubel', '1000034243.jpg', '26 Sep 2024 - 4:03:37 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '1000033926.jpg', '2024-10-06 05:28:13', NULL),
(36, 'hi', 'sabbirrahman', '2e80c97f-5cb3-41b8-b686-5758a9796d1c (1).jpeg', '26 Sep 2024 - 10:47:31 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', '5eb6e841-4073-4f17-9449-ad497e203287.jpeg', '2024-10-06 05:28:13', NULL),
(37, 'I just edited photos with <b>AI</b>, I don\'t know how it is', 'Juthi Sultana', 'juthi.jpg', '26 Sep 2024 - 7:42:32 AM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'ai-generated-8703679_1920.jpg', '2024-10-06 05:28:13', NULL),
(38, '<h2>I only work in cyber</h2>', 'Nahid HK', 'lite-removebg-preview.png', '25 Sep 2024 - 5:01:29 PM', '<i class=\"bi bi-emoji-smile-upside-down\"></i>', 'hello anyface is security your photo and video in a don’t hack this is your account ... just update to next.gif', '2024-10-06 05:28:13', NULL),
(39, 'Im Just Verifay This Anyface Account', 'Nahid HK', 'lite.png', '06 Oct 2024 - 11:46:08 AM', '<i class=\"bi bi-patch-check-fill v\"></i>', 'Screenshot from 2024-10-06 11-45-59.png', '2024-10-06 05:46:57', NULL),
(41, '', 'Md Rubel', 'photo_2024-09-24_11-25-02.jpg', '07 Oct 2024 - 7:59:27 AM', '<i class=\"bi bi-patch-check-fill v\"></i>', 'photo_2024-09-27_14-18-35.jpg', '2024-10-07 01:59:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifay_user`
--

CREATE TABLE `verifay_user` (
  `id` int NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `userimg` varchar(255) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `userphone` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verifay_user`
--

INSERT INTO `verifay_user` (`id`, `username`, `userimg`, `useremail`, `userphone`, `password`) VALUES
(4, 'Nahid HK', 'lite.png', 'nahidhk2007@gmail.com', '01877357091', 'NAHID12345'),
(5, 'Juthi Sultana', 'juthi.jpg', 'juthi.developer@gmail.com', '01763279587', 'JUTHI12345'),
(6, 'AnyFace App', 'appicon.png', 'nahidhk2007@gmail.com', '01877357091', '516148'),
(10, 'Md Rubel', 'photo_2024-09-24_11-25-02.jpg', 'rubelzahid19107114@gmail.com', '01705599888', 'RUBEL12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifay_user`
--
ALTER TABLE `verifay_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `verifay_user`
--
ALTER TABLE `verifay_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
