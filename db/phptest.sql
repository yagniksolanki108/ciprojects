-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `signal_light`
--

CREATE TABLE `signal_light` (
  `id` int(11) NOT NULL,
  `name` char(1) NOT NULL,
  `sequence` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signal_light`
--

INSERT INTO `signal_light` (`id`, `name`, `sequence`) VALUES
(1, 'A', NULL),
(2, 'B', NULL),
(3, 'C', NULL),
(4, 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `signal_light_interval`
--

CREATE TABLE `signal_light_interval` (
  `id` int(11) NOT NULL,
  `green_light_interval` int(11) DEFAULT NULL,
  `yellow_light_interval` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signal_light`
--
ALTER TABLE `signal_light`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signal_light_interval`
--
ALTER TABLE `signal_light_interval`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signal_light`
--
ALTER TABLE `signal_light`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signal_light_interval`
--
ALTER TABLE `signal_light_interval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `signal_light_interval`
--
ALTER TABLE `signal_light_interval`
  ADD CONSTRAINT `fk_signal_light` FOREIGN KEY (`id`) REFERENCES `signal_light` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
