-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2015 at 07:10 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs313`
--
CREATE DATABASE IF NOT EXISTS `cs313` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cs313`;

GRANT SELECT ON cs313.* TO 'cs313user'@'localhost' IDENTIFIED BY 'p@55w0rd';
GRANT SELECT ON cs313.* TO 'cs313user'@'127.10.138.2' IDENTIFIED BY 'p@55w0rd';
FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `Link`
--

DROP TABLE IF EXISTS `Link`;
CREATE TABLE IF NOT EXISTS `Link` (
  `link_ID` int(11) NOT NULL,
  `scriptures_ID` int(11) DEFAULT NULL,
  `topics_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Link`
--

INSERT INTO `Link` (`link_ID`, `scriptures_ID`, `topics_ID`) VALUES
(1, 5, 1),
(2, 6, 3),
(3, 6, 1),
(4, 6, 4),
(5, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Scriptures`
--

DROP TABLE IF EXISTS `Scriptures`;
CREATE TABLE IF NOT EXISTS `Scriptures` (
  `id` int(11) NOT NULL,
  `book` varchar(15) NOT NULL,
  `chapter` varchar(3) NOT NULL,
  `verse` varchar(3) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Scriptures`
--

INSERT INTO `Scriptures` (`id`, `book`, `chapter`, `verse`, `content`) VALUES
(1, 'John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.'),
(2, 'D&C', '88', '49', 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'),
(3, 'Mosiah', '16', '9', 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'),
(4, 'D&C', '93', '28', 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'),
(5, 'Hebrews', '11', '4', 'By faith Abel offered unto God a more excellent sacrifice than Cain, by which he obtained witness that he was righteous, God testifying of his gifts: and by it he being dead yet speaketh.'),
(6, '1 Corinthians', '13', '13', 'And now abideth faith, hope, charity, these three; but the greatest of these is charity.'),
(7, 'Moroni', '7', '47', 'But charity is the pure love of Christ, and it endureth forever; and whoso is found possessed of it at the last day, it shall be well with him.');

-- --------------------------------------------------------

--
-- Table structure for table `Topics`
--

DROP TABLE IF EXISTS `Topics`;
CREATE TABLE IF NOT EXISTS `Topics` (
  `topics_ID` int(11) NOT NULL,
  `topics_name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Topics`
--

INSERT INTO `Topics` (`topics_ID`, `topics_name`) VALUES
(1, 'Faith'),
(2, 'Sacrifice'),
(3, 'Charity'),
(4, 'Hope');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Link`
--
ALTER TABLE `Link`
  ADD PRIMARY KEY (`link_ID`),
  ADD KEY `fk_Link_Scriptures_idx` (`scriptures_ID`),
  ADD KEY `fk_Link_Topics1_idx` (`topics_ID`);

--
-- Indexes for table `Scriptures`
--
ALTER TABLE `Scriptures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Topics`
--
ALTER TABLE `Topics`
  ADD PRIMARY KEY (`topics_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Link`
--
ALTER TABLE `Link`
  MODIFY `link_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Scriptures`
--
ALTER TABLE `Scriptures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Topics`
--
ALTER TABLE `Topics`
  MODIFY `topics_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Link`
--
ALTER TABLE `Link`
  ADD CONSTRAINT `fk_Link_Scriptures` FOREIGN KEY (`scriptures_ID`) REFERENCES `Scriptures` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Link_Topics1` FOREIGN KEY (`topics_ID`) REFERENCES `Topics` (`topics_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
