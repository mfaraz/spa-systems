-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2014 at 09:18 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`cid`, `cruser`, `mouser`, `name`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 0, 'President', '', 1410877062, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ci_groups`
--

INSERT INTO `ci_groups` (`gid`, `name`, `discount`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 'Gold', '15', '', 0, 1410611852, 1),
(2, 'Silver', '10', '', 0, 0, 1),
(3, 'Premium', '5', '', 0, 0, 1),
(4, 'Diamond', '30', '', 1410611881, 0, 1);

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
  `card_id` varchar(30) DEFAULT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `cash_receive` double(10,2) DEFAULT '0.00',
  `discount` char(3) NOT NULL DEFAULT '0',
  `grand_total` double(10,2) DEFAULT '0.00',
  `cash_exchange` double(10,2) DEFAULT '0.00',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `report` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iid`),
  UNIQUE KEY `invoice_number_2` (`invoice_number`),
  KEY `invoice_number` (`invoice_number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoice_details`
--

CREATE TABLE IF NOT EXISTS `ci_invoice_details` (
  `idid` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`idid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_reports`
--

CREATE TABLE IF NOT EXISTS `ci_reports` (
  `invoice_number` char(12) NOT NULL,
  `invoice_seller` varchar(50) NOT NULL,
  `customer_card` varchar(30) NOT NULL,
  `customer_phone` char(30) NOT NULL,
  `invoice_date` char(10) NOT NULL,
  `invoice_day` char(2) NOT NULL,
  `invoice_month` char(2) NOT NULL,
  `invoice_year` smallint(4) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `invoice_total` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `mul_members` tinyint(1) NOT NULL,
  `mul_users` tinyint(1) DEFAULT '0',
  `mul_settings` tinyint(1) DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_roles`
--

INSERT INTO `ci_roles` (`rid`, `name`, `description`, `mul_welcome`, `mul_sales`, `mul_deposits`, `mul_products`, `mul_categories`, `mul_reports`, `mul_members`, `mul_users`, `mul_settings`, `crdate`, `modate`, `status`) VALUES
(1, 'System Administrator', 'Super user in this systems, in which has full control permission to manage in the project systems.', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1406449163, 1410832244, 1),
(2, 'Cashier', '', 1, 1, 1, 1, 0, 0, 0, 0, 0, 1406449163, 1410833613, 1),
(3, 'Test', 'Just for Test', 0, 0, 0, 0, 0, 0, 1, 0, 0, 1410833837, 0, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_services`
--

INSERT INTO `ci_services` (`pid`, `cid`, `cruser`, `mouser`, `name`, `price`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 0, 'Sona', 15.00, '', 1410877075, 0, 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('d172b09fb547545d0a8fec9147b728f8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411004453, 'a:17:{s:9:"user_data";s:0:"";s:5:"ci_id";s:1:"1";s:11:"ci_username";s:5:"admin";s:12:"ci_firstname";s:3:"Man";s:11:"ci_fullname";s:8:"Man Math";s:7:"ci_role";s:20:"System Administrator";s:11:"mul_welcome";s:1:"1";s:9:"mul_sales";s:1:"1";s:12:"mul_products";s:1:"1";s:14:"mul_categories";s:1:"1";s:11:"mul_reports";s:1:"1";s:12:"mul_deposits";s:1:"1";s:9:"mul_users";s:1:"1";s:11:"mul_members";s:1:"1";s:12:"mul_settings";s:1:"1";s:4:"type";s:6:"yearly";s:14:"cur_invoice_id";i:5;}'),
('800b42e2e0855caf0e6007d808a1e235', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36', 1410876083, 'a:16:{s:9:"user_data";s:0:"";s:5:"ci_id";s:1:"1";s:11:"ci_username";s:5:"admin";s:12:"ci_firstname";s:3:"Man";s:11:"ci_fullname";s:8:"Man Math";s:7:"ci_role";s:20:"System Administrator";s:11:"mul_welcome";s:1:"1";s:9:"mul_sales";s:1:"1";s:12:"mul_products";s:1:"1";s:14:"mul_categories";s:1:"1";s:11:"mul_reports";s:1:"1";s:12:"mul_deposits";s:1:"1";s:9:"mul_users";s:1:"1";s:11:"mul_members";s:1:"1";s:12:"mul_settings";s:1:"1";s:4:"type";s:5:"daily";}');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`uid`, `rid`, `username`, `password`, `firstname`, `lastname`, `sex`, `email`, `phone`, `crdate`, `modate`, `status`) VALUES
(1, 1, 'admin', 'df53c745fae51cb9b4a5ecef96e3fff7', 'Man', 'Math', 0, 'manmath4@gmail.com', '0978470847', 1406449163, 0, 1),
(2, 2, 'visalthorn', '8918d61b22b490decd25971143130064', 'visal', 'thorn', 0, 'visal.pnc@gmail.com', '011748200', 1409823737, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
