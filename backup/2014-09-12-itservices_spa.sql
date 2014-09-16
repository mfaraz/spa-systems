-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 03:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `itservices_spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_categories`
--

CREATE TABLE IF NOT EXISTS `ci_categories` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cruser` int(11) NOT NULL DEFAULT '0',
  `mouser` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(250) DEFAULT '',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`cid`, `cruser`, `mouser`, `name`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 'President Service', '', 1406641477, 1410457684, 1),
(2, 1, 1, 'Product', '', 1406641506, 1409897692, 1),
(3, 1, 1, 'VIP', '', 1406641506, 1409897699, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_groups`
--

CREATE TABLE IF NOT EXISTS `ci_groups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `discount` char(3) NOT NULL,
  `description` varchar(250) NOT NULL,
  `crdate` int(11) NOT NULL,
  `modate` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_groups`
--

INSERT INTO `ci_groups` (`gid`, `name`, `discount`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 'Golden1', '15', 'abc', 0, 1410458043, 1),
(2, 'Silver', '10', '', 0, 0, 1),
(3, 'Premium', '5', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoices`
--

CREATE TABLE IF NOT EXISTS `ci_invoices` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_number` char(12) DEFAULT '000000000000',
  `chash` char(32) DEFAULT NULL,
  `cruser` int(11) NOT NULL DEFAULT '0',
  `customer_phone` varchar(30) DEFAULT '0',
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `cash_receive` double(10,2) DEFAULT '0.00',
  `grand_total` double(10,2) DEFAULT '0.00',
  `cash_exchange` double(10,2) DEFAULT '0.00',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `report` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  UNIQUE KEY `invoice_number_2` (`invoice_number`),
  KEY `invoice_number` (`invoice_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ci_invoices`
--

INSERT INTO `ci_invoices` (`iid`, `invoice_number`, `chash`, `cruser`, `customer_phone`, `total`, `cash_receive`, `grand_total`, `cash_exchange`, `crdate`, `modate`, `report`, `status`) VALUES
(1, '000000000001', 'ef4788e79b999f6bd983b9293ae64d40', 1, '0', 0.00, 0.00, 0.00, 0.00, 1409803597, 0, 0, 0),
(2, '000000000002', '855816ffe149aba178f98abb44171578', 1, '0', 0.00, 0.00, 0.00, 0.00, 1409824818, 0, 0, 0),
(3, '000000000003', 'bfc9687ee2ff86051cef907b8f79a9cb', 1, '0', 0.00, 0.00, 0.00, 0.00, 1409830306, 0, 0, 0),
(4, '000000000004', 'c756920f483355bc029d56e394058c77', 1, '0', 0.00, 0.00, 0.00, 0.00, 1409897285, 0, 0, 0),
(5, '000000000005', 'e1bbe9030590253dc1c87f25c9bc78e8', 1, '0', 0.00, 0.00, 0.00, 0.00, 1410463880, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoice_details`
--

CREATE TABLE IF NOT EXISTS `ci_invoice_details` (
  `idid` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ci_invoice_details`
--

INSERT INTO `ci_invoice_details` (`idid`, `iid`, `cid`, `name`) VALUES
(3, 1, 1, 'Spa'),
(4, 2, 1, 'Spa'),
(5, 3, 1, 'staff'),
(6, 4, 2, 'spa'),
(7, 4, 1, 'sfsa'),
(8, 5, 1, 'Product1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_members`
--

CREATE TABLE IF NOT EXISTS `ci_members` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `crdate` int(11) NOT NULL,
  `modate` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ci_members`
--

INSERT INTO `ci_members` (`mid`, `gid`, `card_id`, `firstname`, `lastname`, `sex`, `phone`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 'visal', 'thorn', 0, '069 516 303', 3, 1409891268, 1),
(2, 2, 1, 'marn', 'mat', 0, '012 74 82 00', 14, 1409890482, 1),
(3, 2, 5, 'sreynita', 'thorn', 1, '011 748 200', 1409823831, 1409891250, 1),
(4, 3, 3, 'nita', 'thorn', 1, '097 97 89 369', 1409887835, 1409888819, 1),
(5, 1, 1234567, 'Marida', 'Hieng', 0, '0979243513', 1410457070, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_reports`
--

CREATE TABLE IF NOT EXISTS `ci_reports` (
  `invoice_number` char(12) NOT NULL,
  `invoice_seller` varchar(50) NOT NULL,
  `invoice_date` char(10) NOT NULL,
  `invoice_day` char(2) NOT NULL,
  `invoice_month` char(2) NOT NULL,
  `invoice_year` smallint(4) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_qty` int(10) NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_total` double(10,2) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_reports`
--

INSERT INTO `ci_reports` (`invoice_number`, `invoice_seller`, `invoice_date`, `invoice_day`, `invoice_month`, `invoice_year`, `product_name`, `product_qty`, `product_price`, `product_total`, `category_name`) VALUES
('000000000001', 'Man', '02-09-2014', '02', '09', 2014, 'Product1', 5, 5.00, 25.00, 'Watches'),
('000000000002', 'Man', '03-09-2014', '03', '09', 2014, 'Product2', 5, 10.00, 50.00, 'Optic Glasses');

-- --------------------------------------------------------

--
-- Table structure for table `ci_roles`
--

CREATE TABLE IF NOT EXISTS `ci_roles` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(250) DEFAULT '',
  `mul_welcome` tinyint(1) DEFAULT '0',
  `mul_sales` tinyint(1) DEFAULT '0',
  `mul_deposits` tinyint(1) DEFAULT '0',
  `mul_products` tinyint(1) DEFAULT '0',
  `mul_categories` tinyint(1) DEFAULT '0',
  `mul_reports` tinyint(1) DEFAULT '0',
  `mul_users` tinyint(1) DEFAULT '0',
  `mul_settings` tinyint(1) DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_roles`
--

INSERT INTO `ci_roles` (`rid`, `name`, `description`, `mul_welcome`, `mul_sales`, `mul_deposits`, `mul_products`, `mul_categories`, `mul_reports`, `mul_users`, `mul_settings`, `crdate`, `modate`, `status`) VALUES
(1, 'System Administrator', 'Super user in this systems, in which has full control permission to manage in the project systems.', 1, 1, 1, 1, 1, 1, 1, 1, 1406449163, 0, 1),
(2, 'Cashier', '', 1, 1, 1, 1, 0, 0, 0, 0, 1406449163, 1410461794, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_services`
--

CREATE TABLE IF NOT EXISTS `ci_services` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '0',
  `cruser` int(11) NOT NULL DEFAULT '0',
  `mouser` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `description` varchar(250) DEFAULT '',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ci_services`
--

INSERT INTO `ci_services` (`pid`, `cid`, `cruser`, `mouser`, `name`, `price`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 1, 'Product1', 50.00, '', 1406953723, 1409824798, 1),
(2, 2, 1, 1, 'Product2', 40.00, '', 1406953746, 1408839137, 1),
(4, 1, 1, 0, 'Romanson', 29.00, '', 1409665712, 0, 1),
(5, 1, 1, 1, 'Swiss White', 5.00, '', 1409665729, 1409668252, 1),
(6, 3, 1, 1, 'Spa1', 15.00, '', 1409802932, 1410457570, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3aaf540f247a5b1cdf3dac56721aebed', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', 1410466092, ''),
('d511ff91051c0cda46d661103f0c6b0e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1410455147, 'a:16:{s:9:"user_data";s:0:"";s:5:"ci_id";s:1:"1";s:11:"ci_username";s:5:"admin";s:12:"ci_firstname";s:3:"Man";s:11:"ci_fullname";s:8:"Man Math";s:7:"ci_role";s:20:"System Administrator";s:11:"mul_welcome";s:1:"1";s:9:"mul_sales";s:1:"1";s:12:"mul_products";s:1:"1";s:14:"mul_categories";s:1:"1";s:11:"mul_reports";s:1:"1";s:12:"mul_deposits";s:1:"1";s:9:"mul_users";s:1:"1";s:11:"mul_members";s:1:"1";s:12:"mul_settings";s:1:"1";s:4:"type";s:7:"monthly";}');

-- --------------------------------------------------------

--
-- Table structure for table `ci_settings`
--

CREATE TABLE IF NOT EXISTS `ci_settings` (
  `DEFAULT_COMPANY_NAME` varchar(250) NOT NULL DEFAULT '',
  `DEFAULT_COMPANY_LOGO` varchar(250) NOT NULL,
  `DEFAULT_COMPANY_ADDRESS` tinytext NOT NULL,
  `DEFAULT_COMPANY_PHONE` varchar(250) NOT NULL DEFAULT '',
  `DEFAULT_COMPANY_EMAIL` varchar(250) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_settings`
--

INSERT INTO `ci_settings` (`DEFAULT_COMPANY_NAME`, `DEFAULT_COMPANY_LOGO`, `DEFAULT_COMPANY_ADDRESS`, `DEFAULT_COMPANY_PHONE`, `DEFAULT_COMPANY_EMAIL`) VALUES
('POS for spa', 'logo.jpg', 'Street 628, Sangkat Veal Spov, Khan Meanchey, Phnom Penh', '023 720 832', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `firstname` varchar(50) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '"0" => "Male", "1" => "Female"',
  `email` varchar(250) DEFAULT '',
  `phone` varchar(30) DEFAULT '',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`uid`, `rid`, `username`, `password`, `firstname`, `lastname`, `sex`, `email`, `phone`, `crdate`, `modate`, `status`) VALUES
(1, 1, 'admin', 'df53c745fae51cb9b4a5ecef96e3fff7', 'Man', 'Math', 0, 'manmath4@gmail.com', '0978470847', 1406449163, 0, 1),
(2, 2, 'visalthorn', '70834e0b31b8443a7cee844957d63864', 'visal', 'thorn', 0, 'visal.pnc@gmail.com', '011748200', 1409823737, 0, 1),
(3, 2, 'marida', 'd68599d99d0212b25a1fa761ac9419ed', 'Marida', 'Hieng', 0, 'maridahieng@yahoo.com', '0979243513', 1410461182, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
