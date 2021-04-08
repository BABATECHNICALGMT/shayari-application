-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 08:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logoapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `shayari_code`
--

CREATE TABLE `shayari_code` (
  `cid` int(255) NOT NULL,
  `shayari_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shayari_code`
--

INSERT INTO `shayari_code` (`cid`, `shayari_name`) VALUES
(1, 'love'),
(2, 'attiute'),
(3, 'goodMorning'),
(4, 'sad'),
(5, 'mood off');

-- --------------------------------------------------------

--
-- Table structure for table `shayari_viwe`
--

CREATE TABLE `shayari_viwe` (
  `id` int(255) NOT NULL,
  `shayari` varchar(255) DEFAULT NULL,
  `cid` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shayari_viwe`
--

INSERT INTO `shayari_viwe` (`id`, `shayari`, `cid`) VALUES
(2, 'thapas', 2),
(5, 'ieioeui', 3),
(6, 'ieioeui', 3),
(7, 'ieioeui', 3),
(8, 'ram', 4),
(9, 'hisadjis', 3),
(10, 'hisadjis', 3),
(11, 'hisadjis', 3),
(12, 'sad1', 4),
(15, 'hellow', 1),
(16, 'wdwkd', 1),
(17, 'hhh', 1),
(18, 'iby ili', 1),
(19, 'dsckshdklc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shayari_code`
--
ALTER TABLE `shayari_code`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `shayari_viwe`
--
ALTER TABLE `shayari_viwe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shayari_code`
--
ALTER TABLE `shayari_code`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shayari_viwe`
--
ALTER TABLE `shayari_viwe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
