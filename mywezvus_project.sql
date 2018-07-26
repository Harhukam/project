-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2018 at 01:59 AM
-- Server version: 10.1.31-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywezvus_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `userid` text NOT NULL,
  `roomusernamepay` text NOT NULL,
  `roomuseremailpay` text NOT NULL,
  `checkinpay` text NOT NULL,
  `checkoutpay` text NOT NULL,
  `adultpay` text NOT NULL,
  `childpay` text NOT NULL,
  `roompay` text NOT NULL,
  `roomtypepay` text NOT NULL,
  `roomnumberpay` text NOT NULL,
  `roompricepay` text NOT NULL,
  `roomtotalpay` text NOT NULL,
  `roomstatuspay` text NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `card` text NOT NULL,
  `cardnumber` text NOT NULL,
  `bankname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `roomusernamepay`, `roomuseremailpay`, `checkinpay`, `checkoutpay`, `adultpay`, `childpay`, `roompay`, `roomtypepay`, `roomnumberpay`, `roompricepay`, `roomtotalpay`, `roomstatuspay`, `payment_date`, `card`, `cardnumber`, `bankname`) VALUES
(3, '123412341234', 'Harhukam Singh', 'hs@gmail.com', '2018-05-11', '2018-05-12', '2', '0', 'Double', 'Luxary', '12', '1500', '3000', 'Online', '2018-05-12 07:18:55', 'Credit Card', '12343214325413254', 'Axis Bank Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `roombooking`
--

CREATE TABLE `roombooking` (
  `id` bigint(20) NOT NULL,
  `adharid` text NOT NULL,
  `user` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `adult` text NOT NULL,
  `child` text NOT NULL,
  `rooms` text NOT NULL,
  `roomtype` text NOT NULL,
  `roomnumber` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `requirement` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `pincode` text NOT NULL,
  `totaldays` text NOT NULL,
  `roomrent` text NOT NULL,
  `roomrentcal` text NOT NULL,
  `roomtotalammount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombooking`
--

INSERT INTO `roombooking` (`id`, `adharid`, `user`, `checkin`, `checkout`, `adult`, `child`, `rooms`, `roomtype`, `roomnumber`, `name`, `email`, `phone`, `requirement`, `address`, `city`, `state`, `country`, `pincode`, `totaldays`, `roomrent`, `roomrentcal`, `roomtotalammount`) VALUES
(22, '123412341234', 'Admin', '2018-05-11', '2018-05-12', '2', '0', 'Double', 'Luxary', '12', 'Harhukam Singh', 'hs@gmail.com', '09463710716', 'none', 'japot', 'jalandhar', 'punjab', 'India', '144104', '1', '1500', '2', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `roomsandprice`
--

CREATE TABLE `roomsandprice` (
  `id` int(11) NOT NULL,
  `roomname` text NOT NULL,
  `roomtype` text NOT NULL,
  `roomprice` text NOT NULL,
  `roomdisplaytext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomsandprice`
--

INSERT INTO `roomsandprice` (`id`, `roomname`, `roomtype`, `roomprice`, `roomdisplaytext`) VALUES
(6, 'Single', 'Standard', '1500', 'Standard Room Rs. 1500'),
(7, 'Double', 'Luxary', '5000', 'Luxary Room Rs. 5000');

-- --------------------------------------------------------

--
-- Table structure for table `table_login`
--

CREATE TABLE `table_login` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_login`
--

INSERT INTO `table_login` (`id`, `username`, `password`, `email`) VALUES
(120056, 'Admin', 'admin', 'hs@gmail.com'),
(120057, 'user1', 'user1', 'user1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombooking`
--
ALTER TABLE `roombooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomsandprice`
--
ALTER TABLE `roomsandprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_login`
--
ALTER TABLE `table_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roombooking`
--
ALTER TABLE `roombooking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roomsandprice`
--
ALTER TABLE `roomsandprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_login`
--
ALTER TABLE `table_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120058;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
