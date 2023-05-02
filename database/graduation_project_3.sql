-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 09:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `lecture` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `day` varchar(10) NOT NULL,
  `s_time` time NOT NULL DEFAULT current_timestamp(),
  `e_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `devision` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int(3) NOT NULL,
  `day` varchar(10) NOT NULL,
  `s_time` time NOT NULL,
  `l_time` time NOT NULL,
  `all_time` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `stage`, `devision`, `name`, `code`, `day`, `s_time`, `l_time`, `all_time`) VALUES
(1, 1, 'A', 'communication principles', 1, '6', '08:30:00', '10:30:00', 70),
(2, 1, 'A', 'signals and systems', 2, '6', '21:00:21', '22:50:21', 70);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `stage` smallint(6) NOT NULL,
  `division` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `stage`, `division`) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 1, 'B'),
(4, 4, 'B'),
(5, 4, 'A'),
(6, 3, 'A'),
(7, 3, 'B'),
(8, 2, 'B'),
(9, 1, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `birth` varchar(14) NOT NULL,
  `stage` int(11) NOT NULL,
  `division` varchar(1) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0,
  `insertDate` date NOT NULL DEFAULT current_timestamp(),
  `insertTime` time NOT NULL DEFAULT current_timestamp(),
  `exchangeHistory` text NOT NULL DEFAULT '0',
  `DateExchange` date NOT NULL DEFAULT current_timestamp(),
  `TimeExchange` time NOT NULL DEFAULT current_timestamp(),
  `tags` char(11) NOT NULL DEFAULT '''0'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birth`, `stage`, `division`, `admin`, `insertDate`, `insertTime`, `exchangeHistory`, `DateExchange`, `TimeExchange`, `tags`) VALUES
(1, 'احمد علي محمد', '2000-06-13', 1, 'A', 0, '2023-01-10', '14:50:47', '1A,2A,1A,2A,', '2023-01-10', '22:35:00', '0'),
(2, 'احمد محمد', '1999-06-10', 1, 'A', 9, '2023-02-05', '11:24:06', '1A,2A,', '2023-02-05', '11:24:06', '0'),
(3, 'محمد احمد', '1999-11-11', 1, 'A', 0, '2023-02-05', '13:59:38', '1A,2A,1A,', '2023-02-05', '17:44:45', '0'),
(4, 'عبدالحميد عبدالله احمد', '1900-10-10', 1, 'A', 0, '2023-02-06', '13:48:59', '2A,1A,', '2023-02-06', '17:44:45', '0'),
(5, 'علي عامر علي', '2000-06-13', 1, 'A', 0, '2023-02-12', '21:18:49', '1A,2A,1A,2A,1A,', '2023-03-12', '22:38:47', '0'),
(6, 'محمد عبدالله', '2023-02-13', 1, 'A', 0, '2023-02-13', '13:59:54', '1A,2A,1A,', '2023-03-12', '22:35:28', '0'),
(7, 'طارق زياد', '2023-02-03', 0, '', 1, '2023-02-13', '14:05:02', '1A,1B,3A,', '2023-02-13', '14:05:02', '0'),
(8, 'سليمان الافندي', '1988-06-10', 0, '', 1, '2023-02-13', '22:12:24', '3A,4A,4B,', '2023-02-13', '22:12:24', '0'),
(10, 'عبدالله ليث طلال', '2023-02-13', 1, 'A', 0, '2023-02-13', '22:15:13', '3B,', '2023-02-13', '22:15:13', 'EAA47463'),
(11, 'احمد طلال ', '2001-05-04', 4, 'A', 0, '2023-02-26', '09:10:47', '4A,', '2023-02-26', '09:10:47', '0'),
(12, 'خالد عبدالله', '2023-03-12', 2, 'A', 0, '2023-03-12', '22:23:56', '1A,2A,1A,', '2023-03-12', '22:35:09', '3ACB26B0'),
(14, 'استاذ قصي', '2023-03-12', 2, 'A', 0, '2023-03-12', '22:43:04', '1A,', '2023-03-12', '22:43:04', '0'),
(15, 'دكتور محمود', '2023-03-12', 0, '', 9, '2023-03-12', '22:47:13', '4A,4B,', '2023-03-12', '22:47:13', '0'),
(16, 'احمد محمد حسين', '2000-06-13', 4, 'A', 0, '2023-03-17', '11:46:49', '4A,', '2023-03-17', '11:46:49', 'EFA47463');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
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
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
