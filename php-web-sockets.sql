-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2021 at 04:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-web-sockets`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `md5` varchar(64) DEFAULT NULL,
  `sha512` varchar(64) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `file_version` float DEFAULT NULL,
  `file_ext` varchar(30) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `md5`, `sha512`, `date`, `file_version`, `file_ext`, `file_name`) VALUES
(1, 'md5', 'sha512', '2021-03-03 00:00:00', 1, 'file_ext', 'file_name'),
(2, '43252', '123', '2021-00-02 00:00:00', 12, 'txt', 'filename'),
(3, '345', '543', '2021-00-02 00:00:00', 13, 'txt1', 'filename1'),
(4, 'm1', 's1', '2021-00-02 00:00:00', 134, 'e1', 'f1'),
(5, 'm3', 's3', '2021-00-01 00:00:00', 3, 'e3', 'n3'),
(6, 'm5', 's5', '2021-00-22 00:00:00', 5, 'e5', 'n5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `md5` (`md5`),
  ADD UNIQUE KEY `SHA512` (`sha512`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
