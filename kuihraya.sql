-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 02:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuihraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `cookiesId` int(11) NOT NULL,
  `cookiesName` varchar(50) NOT NULL,
  `cookiesPrice` int(11) NOT NULL,
  `imageFile` varchar(50) NOT NULL,
  `staffId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`cookiesId`, `cookiesName`, `cookiesPrice`, `imageFile`, `staffId`) VALUES
(1, 'Almond London', 30, 'kuih1.png', 1),
(2, 'Tart Nenas', 30, 'kuih2.png', 1),
(8, 'Kuih Semperit', 30, 'kuih3.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `custName` varchar(50) NOT NULL,
  `custEmail` varchar(50) NOT NULL,
  `custPhone` varchar(50) NOT NULL,
  `custUsername` varchar(50) NOT NULL,
  `custPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `custName`, `custEmail`, `custPhone`, `custUsername`, `custPassword`) VALUES
(1, 'Amirah', 'amirah@gmail.com', '01121541993', 'Amirah', '1234'),
(2, 'Faizwan ', 'faizyaw@gmail.com', 'x012345874', ' Faizyaw', ' 1234'),
(3, 'Farhan', 'farhansb$gmail.com', '01239658741', ' Paan', ' 1234'),
(4, 'Aminah', 'aminah@gmail.com', '0123456789', ' minah', ' 1234'),
(5, 'Nurul Hidayah', 'nurul99@gmail.com', '123456987', ' nurul', ' 1234'),
(6, 'Nurul Huda', 'huda@gmail.com', '1236547', ' huda', ' 1234');

-- --------------------------------------------------------

--
-- Table structure for table `multilogin`
--

CREATE TABLE `multilogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multilogin`
--

INSERT INTO `multilogin` (`id`, `username`, `password`, `role`) VALUES
(1, 'mahmudowner', 'mahmudowner', 'adminstaff'),
(2, 'Faizyaw', '1234', 'user'),
(3, 'Amirah', '1234', 'user'),
(4, 'minah', '1234', 'user'),
(5, 'nurul', '1234', 'user'),
(6, 'huda', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `staffPhone` varchar(13) NOT NULL,
  `staffUsername` varchar(50) NOT NULL,
  `staffPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `staffName`, `staffPhone`, `staffUsername`, `staffPassword`) VALUES
(1, 'mahmudowner', 'mahmudowner', 'mahmudowner', 'mahmudowner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`cookiesId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `multilogin`
--
ALTER TABLE `multilogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `cookiesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `multilogin`
--
ALTER TABLE `multilogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
