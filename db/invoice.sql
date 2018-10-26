-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2018 at 10:33 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(12) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `edate` date NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `contact_no` varchar(14) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sub_total` varchar(15) NOT NULL,
  `sgst` varchar(15) NOT NULL,
  `cgst` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `invoice_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `cid`, `cname`, `date`, `edate`, `com_name`, `gstin`, `contact_no`, `address`, `sub_total`, `sgst`, `cgst`, `total`, `invoice_code`) VALUES
(11, '124', 'Sushant', '2018-10-04', '2018-10-05', 'xyz', '1234567890', '8884083203', 'Belagum', '15000', '1350', '1350', '17700', 'WCTS0711');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `invoice_id` int(11) NOT NULL,
  `item` varchar(20) NOT NULL,
  `hsn_no` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`invoice_id`, `item`, `hsn_no`, `description`, `amount`, `item_id`) VALUES
(11, 'gsuit', '14545', '5', '15000', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
