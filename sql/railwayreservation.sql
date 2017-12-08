-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2017 at 05:40 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railwayreservation`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `deleteQuery`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteQuery` (IN `deleteID` INT(15))  BEGIN
DELETE FROM bookings WHERE bookid = deleteID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `bookid` int(15) NOT NULL AUTO_INCREMENT,
  `journeydate` varchar(255) NOT NULL,
  `fromstn` varchar(255) NOT NULL,
  `tostn` varchar(255) NOT NULL,
  `traintype` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `seatnumber` int(15) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=10046 DEFAULT CHARSET=latin1;

--
-- Triggers `bookings`
--
DROP TRIGGER IF EXISTS `booktime`;
DELIMITER $$
CREATE TRIGGER `booktime` BEFORE INSERT ON `bookings` FOR EACH ROW SET NEW.created = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class` varchar(255) NOT NULL,
  `classid` int(15) NOT NULL AUTO_INCREMENT,
  `price` int(15) NOT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class`, `classid`, `price`) VALUES
('General', 1, 50),
('Chair Car', 2, 100),
('Sleeper', 3, 200),
('AC Three Tier', 4, 300),
('AC Two Tier', 5, 500),
('AC First Class', 6, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `farechart`
--

DROP TABLE IF EXISTS `farechart`;
CREATE TABLE IF NOT EXISTS `farechart` (
  `routeid` int(15) NOT NULL AUTO_INCREMENT,
  `fromstn` varchar(255) NOT NULL,
  `tostn` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  PRIMARY KEY (`routeid`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farechart`
--

INSERT INTO `farechart` (`routeid`, `fromstn`, `tostn`, `price`) VALUES
(1, 'Bangalore', 'Chennai', 100),
(2, 'Bangalore', 'Hyderabad', 200),
(3, 'Bangalore', 'Kolkata', 300),
(4, 'Bangalore', 'Mumbai', 300),
(5, 'Bangalore', 'New Delhi', 500),
(6, 'Chennai', 'Bangalore', 100),
(7, 'Chennai', 'Hyderabad', 200),
(8, 'Chennai', 'Kolkata', 300),
(9, 'Chennai', 'Mumbai', 400),
(10, 'Chennai', 'New Delhi', 500),
(11, 'Hyderabad', 'Bangalore', 200),
(12, 'Hyderabad', 'Chennai', 200),
(13, 'Hyderabad', 'Kolkata', 100),
(14, 'Hyderabad', 'Mumbai', 200),
(15, 'Hyderabad', 'New Delhi', 400),
(16, 'Kolkata', 'Bangalore', 300),
(17, 'Kolkata', 'Chennai', 300),
(18, 'Kolkata', 'Hyderabad', 100),
(19, 'Kolkata', 'Mumbai', 300),
(20, 'Kolkata', 'New Delhi', 200),
(21, 'Mumbai', 'Bangalore', 300),
(22, 'Mumbai', 'Chennai', 400),
(23, 'Mumbai', 'Hyderabad', 200),
(24, 'Mumbai', 'Kolkata', 300),
(25, 'Mumbai', 'New Delhi', 200),
(26, 'New Delhi', 'Bangalore', 500),
(27, 'New Delhi', 'Chennai', 500),
(28, 'New Delhi', 'Hyderabad', 400),
(29, 'New Delhi', 'Kolkata', 200),
(30, 'New Delhi', 'Mumbai', 200);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

DROP TABLE IF EXISTS `passengers`;
CREATE TABLE IF NOT EXISTS `passengers` (
  `passid` int(15) NOT NULL AUTO_INCREMENT,
  `passname` varchar(255) NOT NULL,
  `passage` int(15) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `bookid` int(15) NOT NULL,
  PRIMARY KEY (`passid`),
  KEY `passengers_ibfk_1` (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=1050 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

DROP TABLE IF EXISTS `trains`;
CREATE TABLE IF NOT EXISTS `trains` (
  `trainid` int(15) NOT NULL AUTO_INCREMENT,
  `traintype` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  PRIMARY KEY (`trainid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`trainid`, `traintype`, `price`) VALUES
(1, 'Rajdhani', 300),
(2, 'Jan Shatabdi', 200),
(3, 'Express', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Digvijay', 'Digvijay@email.com', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `bookings` (`bookid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
