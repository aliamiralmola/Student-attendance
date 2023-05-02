-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 01:53 PM
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
  `day` varchar(10) NOT NULL,
  `s_time` time NOT NULL,
  `l_time` time NOT NULL,
  `all_time` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `stage`, `devision`, `name`, `day`, `s_time`, `l_time`, `all_time`) VALUES
(1, 1, 'A', 'communication principles', 'الاحد', '12:00:00', '02:00:00', 70);

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
(8, 2, 'B');

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
  `TimeExchange` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `birth`, `stage`, `division`, `admin`, `insertDate`, `insertTime`, `exchangeHistory`, `DateExchange`, `TimeExchange`) VALUES
(1, 'احمد علي محمد', '2000-06-13', 1, 'A', 0, '2023-01-10', '14:50:47', '1A,2A,1A,', '2023-01-10', '15:01:02'),
(2, 'احمد محمد', '1999-06-10', 0, '', 9, '2023-02-05', '11:24:06', '1A,2A,', '2023-02-05', '11:24:06'),
(3, 'محمد احمد', '1999-11-11', 1, 'A', 0, '2023-02-05', '13:59:38', '1A,', '2023-02-05', '13:59:38'),
(4, 'عبدالحميد الثاني', '1900-10-10', 2, 'A', 0, '2023-02-06', '13:48:59', '2A,', '2023-02-06', '13:48:59'),
(5, 'علي عامر علي', '2000-06-13', 1, 'A', 0, '2023-02-12', '21:18:49', '1A,', '2023-02-12', '21:18:49'),
(6, 'محمد عبدالله', '2023-02-13', 1, 'A', 0, '2023-02-13', '13:59:54', '1A,', '2023-02-13', '13:59:54'),
(7, 'طارق زياد', '2023-02-03', 0, '', 1, '2023-02-13', '14:05:02', '1A,1B,3A,', '2023-02-13', '14:05:02'),
(8, 'سليمان الافندي', '1988-06-10', 0, '', 1, '2023-02-13', '22:12:24', '3A,4A,4B,', '2023-02-13', '22:12:24'),
(10, 'عبدالله ليث طلال', '2023-02-13', 3, 'B', 0, '2023-02-13', '22:15:13', '3B,', '2023-02-13', '22:15:13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
