-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 06:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `coin_tracker`
--
CREATE DATABASE IF NOT EXISTS `coin_tracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coin_tracker`;

GRANT SELECT ON coin_tracker.* TO 'cs313user'@'localhost' IDENTIFIED BY 'p@55w0rd';
GRANT SELECT ON coin_tracker.* TO 'cs313user'@'127.10.138.2' IDENTIFIED BY 'p@55w0rd';
FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
CREATE TABLE IF NOT EXISTS `Category` (
  `cat_ID` int(11) NOT NULL,
  `cat_name` varchar(45) DEFAULT NULL,
  `type_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`cat_ID`, `cat_name`, `type_ID`) VALUES
(1, 'Lupien', 1),
(2, 'Food', 2),
(3, 'Gas', 2),
(4, 'Electicity', 2),
(5, 'Car Maintenance', 2),
(6, 'Tips', 1),
(7, 'Tithing', 2),
(8, 'Fast offering', 2),
(9, 'Car Insurance', 2),
(10, 'test', 1),
(11, 'prueba', 1),
(12, 'otraprueba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
CREATE TABLE IF NOT EXISTS `Transactions` (
  `trans_ID` int(11) NOT NULL,
  `trans_date` date DEFAULT NULL,
  `type_ID` int(11) DEFAULT NULL,
  `cat_ID` int(11) DEFAULT NULL,
  `trans_amount` double DEFAULT NULL,
  `trans_note` varchar(45) DEFAULT NULL,
  `trans_record` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`trans_ID`, `trans_date`, `type_ID`, `cat_ID`, `trans_amount`, `trans_note`, `trans_record`) VALUES
(3, '2015-06-18', 1, NULL, 234, '', NULL),
(19, '2015-06-23', 2, 4, -100, '', '2015-06-02 17:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `Type`
--

DROP TABLE IF EXISTS `Type`;
CREATE TABLE IF NOT EXISTS `Type` (
  `type_ID` int(11) NOT NULL,
  `type_name` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Type`
--

INSERT INTO `Type` (`type_ID`, `type_name`) VALUES
(1, 'Income'),
(2, 'Expense');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`trans_ID`);

--
-- Indexes for table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `trans_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `Type`
--
ALTER TABLE `Type`
  MODIFY `type_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
