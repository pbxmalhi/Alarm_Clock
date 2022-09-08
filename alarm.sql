-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 11:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alarms`
--

CREATE TABLE `alarms` (
  `id` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `reptype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alarms`
--

INSERT INTO `alarms` (`id`, `time`, `label`, `reptype`) VALUES
(4, '23:23', 'Wake Up', 'Once'),
(5, '22:22', 'Gym Time', 'Weekdays'),
(7, '22:22', 'Gym Time', 'Weekdays'),
(8, '22:22', 'Wake Up', 'Weekdays'),
(9, '22:32', 'Wake Up', 'Once'),
(10, '23:23', 'Wake Up', 'Once'),
(11, '23:23', 'Wake Up', 'Weekdays'),
(12, '', '', ''),
(13, '23:23', 'Wake Up', 'Once'),
(14, '13:08', 'Wake Up', 'Everyday'),
(17, '22:22', 'Gym Time', 'Weekdays'),
(18, '11:11', 'Wake Up', 'Weekdays'),
(19, '11:12', 'Wake Up', 'Once');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `continent` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `continent`, `city`) VALUES
(1, 'ASIA', 'Asia/Kolkata'),
(3, 'AMERICA', 'America/Santo_Domingo'),
(8, 'AMERICA', 'America/Toronto'),
(9, 'ASIA', 'Asia/Hong_Kong'),
(11, 'EUROPE', 'Europe/Helsinki'),
(12, 'AMERICA', 'America/Winnipeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alarms`
--
ALTER TABLE `alarms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alarms`
--
ALTER TABLE `alarms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
