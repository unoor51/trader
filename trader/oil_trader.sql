-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 09:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oil_trader`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `vno` text NOT NULL,
  `narration` text NOT NULL,
  `de` int(11) NOT NULL,
  `cr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `cname`, `vno`, `narration`, `de`, `cr`) VALUES
(2, 'noor', 'leb 4649', 'cash given', 0, 2000),
(3, 'noor', 'leb 4649', 'Things Purchase', 2000, 0),
(4, 'noor', 'leb 4649', 'goods purchase ', 3000, 0),
(5, 'noor', 'leb 4649', 'pump purchase', 1200, 0),
(6, 'noor', 'leb 4649', 'cash given for purchasing goods', 0, 2000),
(7, 'noor', 'leb 4640', 'goods purchase', 2000, 0),
(8, 'noor ', 'leb 4640', 'cooler purchase', 0, 2000),
(9, 'arsalan', 'leb 4509', 'oil filter purchase on debit', 1000, 0),
(10, 'noor', 'leb 4649', 'cash given by the customer', 0, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `add_items`
--

CREATE TABLE IF NOT EXISTS `add_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `company_name` text NOT NULL,
  `stock` int(11) NOT NULL,
  `pfrcustomer` int(11) NOT NULL,
  `pfncustomer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `add_items`
--

INSERT INTO `add_items` (`id`, `item_id`, `item_name`, `company_name`, `stock`, `pfrcustomer`, `pfncustomer`) VALUES
(3, 3, 'Mobil Oil ', 'Shell', 199, 200, 300),
(4, 4, 'Air filter', 'Total', 119, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `itemsentry`
--

CREATE TABLE IF NOT EXISTS `itemsentry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Tamount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `date1` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `itemsentry`
--

INSERT INTO `itemsentry` (`id`, `invoice_id`, `item_name`, `quantity`, `price`, `Amount`, `Tamount`, `discount`, `balance`, `date1`) VALUES
(4, 1, 'Mobil Oil ', 100, 120, 12000, 12000, 0, 12000, '2018-04-13'),
(5, 2, 'Mobil Oil ', 1, 200, 200, 300, 10, 290, '2018-04-23'),
(6, 2, 'Air filter', 1, 100, 100, 300, 10, 290, '2018-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `service_record`
--

CREATE TABLE IF NOT EXISTS `service_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vno` text NOT NULL,
  `Dfilter` text NOT NULL,
  `Dfdue` text NOT NULL,
  `date1` text NOT NULL,
  `things` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
