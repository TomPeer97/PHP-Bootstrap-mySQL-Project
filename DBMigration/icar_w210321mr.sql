-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2021 at 02:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icar_w210321mr`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `article`, `created_at`) VALUES
(6, 3, 'HELLOOOOO', 'fjlkjf. alkjjjf', '2021-10-28 15:53:31'),
(7, 3, 'kflkl', 'jadfj', '2021-10-28 15:59:30'),
(13, 7, 'YOU ARE UNDER ATTACK!!!', 'YOU ARE UNDER ATTACKKKKKK!!! PREPEAR TO DIE', '2021-10-31 03:34:46'),
(17, 12, 'My Post', 'sdlfjljk\r\nfff\r\nHelloooo', '2021-11-02 09:16:53'),
(18, 15, 'A Post', 'kjfva;\\\r\n\r\nasdfasdf', '2021-11-02 09:36:42'),
(20, 19, 'asdf', 'asdfdasf', '2021-11-02 12:08:06'),
(21, 20, 'HOOOOoooooooo', 'asdfads', '2021-11-02 12:25:41'),
(22, 21, 'Hiiiiiiiiiiiiieeeyyyy', 'dsganfk', '2021-11-02 12:28:21'),
(23, 22, 'Bottsss Curl Post', 'asdfa', '2021-11-02 14:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `profile_image`) VALUES
(2, 'user@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'John Doe', ''),
(3, 'user2@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 2 ', ''),
(4, 'user3@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 3', ''),
(6, 'user20@domain.ocm', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 20', '2021.10.31.02.29.50-apphill-logo-favicon.png'),
(7, 'user30@domain.com', '$2y$10$Y8UHEZoC0.rxlyKaNRsuJODDqikwzZ5HWH7/F6n1h8BhHGQsf9hl2', 'User 30', '2021.10.31.02.34.33-megaphone.png'),
(9, 'kevin@domain.com', '$2y$10$L8kZlvM3XRJFod3OPwJHI.0LdNzepE1WaVp5lsz717KuXwHsiImbK', 'Kevin Durant', 'default_profile.png'),
(10, 'lebron@domain.com', '$2y$10$L8kZlvM3XRJFod3OPwJHI.0LdNzepE1WaVp5lsz717KuXwHsiImbK', 'Lebron James', 'default_profile.png'),
(11, 'mj@domain.com', '$2y$10$gwcCTk2Hq3DoTGYuRPJYMug3b5Ft5IRhGAUDcVFwjIvU45T5Ym6RS', 'Michael Jordan', 'default_profile.png'),
(12, 'user4@domain.com', '$2y$10$IO3A5OpCwOz14BV4bLYAJeJRU7AQCMuFCg1iYcTlbtRSPv2xZa3i2', 'User 4', 'default_profile.png'),
(13, 'user5@domain.com', '$2y$10$ba18mvwy7/uiR0KR4sgd1uD5j8zdjgTUvmpNWOz80/zXce2Cj2zia', 'User 5', 'default_profile.png'),
(14, 'user6@domain.com', '$2y$10$nqFggsT/2vhz16BWHrULvei/uodtBXmYA74cI1zPNZPV2yd5CFCqa', 'User 6', 'default_profile.png'),
(15, 'user7@donain.com', '$2y$10$qpCq/iGUpwqAktadt0HQvOzZcefk7IQB2bkwZIGVyrMSPxPkM9.E6', 'User 7', 'default_profile.png'),
(16, 'user8@domain.com', '$2y$10$Ax4.uJXqC8raDsTA0WANJuC17/McPnBCX.rp1P.4JsXIlSWyjvEJG', 'User 8', 'default_profile.png'),
(17, 'sadf3@3gag', '$2y$10$rdzx1HYXnsjo4kETG.yHvuDTD2uHd.lwH3a2M2S5XrZ4/e6IlVntS', 'Uafsf', 'default_profile.png'),
(18, 'sdf@af', '$2y$10$T5z794ndg5rIsxG3R/pPNOyKdMDkIuzvV5mWGJLve53EJ5QdJUQ9K', 'adfsaf', 'default_profile.png'),
(19, 'user100@gmail.com', 'aA1234', 'user100', '2021.11.02.11.07.42-megaphone.png'),
(20, 'mega@domain.com', '$2y$10$89OQ1CH/xOSb2PhVwygM3.nKSFPj4ABSEJxa6UHptj915OE6HdWQC', 'Mega', '2021.11.02.11.25.31-megaphone.png'),
(21, 'mega2@domain.com', '$2y$10$xF/w94GxxO11WHgxt5IJluH.6gWai5Jm/ULFmbZy8GNlzGhlaytkO', 'Mega 2', '2021.11.02.11.27.54-megaphone.png'),
(22, 'bott@domain.com', '$2y$10$/Ym5dcTTj9vAZDHPmt29X.50JnqXl0V28izyU40mOPK7zSJIBJnA.', 'Bott', '1635855379_60.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
