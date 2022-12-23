-- phpMyAdmin SQL Dump
-- version 5.1.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2022 at 03:01 PM
-- Server version: 8.0.31-0ubuntu2
-- PHP Version: 8.1.7-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajax-crud`
--

CREATE TABLE `ajax-crud` (
  `id` int NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ajax-crud`
--

INSERT INTO `ajax-crud` (`id`, `firstname`, `lastname`, `emailid`, `mobileno`) VALUES
(1, 'Keval ', 'Bhanushali', 'bhanushalikeval51@gmail.com', '8347840284'),
(2, 'Dillip', 'Sahoo', 'dillipsahoo456@gmail.com', '123456789'),
(3, 'Vishal', 'Gohel', 'gohelvishal456@gmail.com', '234567890'),
(4, 'Khemraj', 'Sir', 'sir456@gmail.com', '23456789'),
(5, 'Chadni ', 'Majji', 'majjichadni456@gmail.com', '234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajax-crud`
--
ALTER TABLE `ajax-crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajax-crud`
--
ALTER TABLE `ajax-crud`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
