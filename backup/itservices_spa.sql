-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2014 at 07:34 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_categories`
--

INSERT INTO `ci_categories` (`cid`, `cruser`, `mouser`, `name`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 0, 'Massage', '', 1410921583, 0, 1),
(2, 1, 0, 'Spa', '', 1410921622, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_employees`
--

CREATE TABLE IF NOT EXISTS `ci_employees` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `crdate` int(11) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_employees`
--

INSERT INTO `ci_employees` (`eid`, `firstname`, `lastname`, `sex`, `crdate`) VALUES
(1, 'Visal', 'Thorn', 0, 1411409720),
(2, 'Srey', 'Tey', 1, 1411409744);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ci_groups`
--

INSERT INTO `ci_groups` (`gid`, `name`, `discount`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 'Gold', '15', '', 0, 1410611852, 1),
(2, 'Silver', '10', '', 0, 0, 1),
(3, 'Premium', '5', '', 0, 0, 1),
(4, 'Diamond', '30', '', 1410611881, 0, 1),
(5, 'Specail', '20', '', 1410922108, 0, 1);

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
  `referrer_name` varchar(50) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ci_invoices`
--

INSERT INTO `ci_invoices` (`iid`, `invoice_number`, `chash`, `cruser`, `customer_phone`, `referrer_name`, `total`, `cash_receive`, `grand_total`, `cash_exchange`, `crdate`, `modate`, `report`, `status`) VALUES
(1, '000000000001', 'ef4788e79b999f6bd983b9293ae64d40', 1, '012 74 82 00', 'visal thorn', 70.00, 100.00, 63.00, 37.00, 1411919643, 0, 1, 1),
(2, '000000000002', '855816ffe149aba178f98abb44171578', 1, '011 748 200', 'jack son', 10.00, 20.00, 9.00, 11.00, 1411919771, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoice_details`
--

CREATE TABLE IF NOT EXISTS `ci_invoice_details` (
  `idid` int(11) NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `employee` varchar(130) NOT NULL,
  `room` varchar(130) NOT NULL,
  PRIMARY KEY (`idid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_invoice_details`
--

INSERT INTO `ci_invoice_details` (`idid`, `iid`, `name`, `employee`, `room`) VALUES
(1, 1, 'Massage body', 'Visal Thorn', 'Room 1 A'),
(2, 1, 'Hammam Spa', 'Visal Thorn', 'Room 1 A'),
(3, 2, 'Massage Leg', 'Srey Tey', 'Room 1 A');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ci_members`
--

INSERT INTO `ci_members` (`mid`, `gid`, `card_id`, `firstname`, `lastname`, `sex`, `phone`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 'visal', 'thorn', 0, '069 516 303', 3, 1409891268, 1),
(2, 2, 1, 'marn', 'mat', 0, '012 74 82 00', 14, 1409890482, 1),
(3, 2, 5, 'sreynita', 'thorn', 1, '011 748 200', 1409823831, 1409891250, 1),
(4, 3, 3, 'nita', 'thorn', 1, '097 97 89 369', 1409887835, 1409888819, 1),
(5, 4, 1234567, 'Marida', 'Hieng', 0, '0979243513', 1410457070, 1410612240, 1),
(8, 4, 0, 'hengheng', 'lyd', 0, '0978989877', 1410612213, 0, 1),
(9, 1, 0, 'gold', 'a', 0, '011 56 96 36', 1410727071, 1410727470, 1),
(10, 5, 0, 'Heang', 'Omuoy', 1, '012626511', 1410922182, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_referrers`
--

CREATE TABLE IF NOT EXISTS `ci_referrers` (
  `rfid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `crdate` int(11) NOT NULL,
  PRIMARY KEY (`rfid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_referrers`
--

INSERT INTO `ci_referrers` (`rfid`, `firstname`, `lastname`, `sex`, `phone`, `email`, `address`, `crdate`) VALUES
(1, 'visal', 'thorn', 0, '069 516 303', 'visalthorn.cf@gmail.com', 'Phnom Penh', 1411891121),
(2, 'Ou', 'Mouy', 0, '097 854 578', 'oumouy.heang@gmail.com', 'Phnom Penh', 1411891223),
(3, 'jack', 'son', 0, '096 889 09 93', 'jackson.123@gmail.com', 'Phnom Penh', 1411919812);

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
  `service_name` varchar(250) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `referrer_name` varchar(50) NOT NULL,
  `employee` varchar(130) NOT NULL,
  `room` varchar(130) NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount` char(3) NOT NULL,
  `amount` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_reports`
--

INSERT INTO `ci_reports` (`invoice_number`, `invoice_seller`, `invoice_date`, `invoice_day`, `invoice_month`, `invoice_year`, `service_name`, `category_name`, `referrer_name`, `employee`, `room`, `price`, `discount`, `amount`) VALUES
('000000000001', 'Man', '28-09-2014', '28', '09', 2014, 'Massage body', 'Massage', 'visal thorn', 'Visal Thorn', 'Room 1 A', 20.00, '10', 63.00),
('000000000001', 'Man', '28-09-2014', '28', '09', 2014, 'Hammam Spa', 'Spa', 'visal thorn', 'Visal Thorn', 'Room 1 A', 50.00, '10', 63.00),
('000000000002', 'Man', '28-09-2014', '28', '09', 2014, 'Massage Leg', 'Massage', 'jack son', 'Srey Tey', 'Room 1 A', 10.00, '10', 9.00);

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
  `mul_employees` tinyint(1) NOT NULL,
  `mul_referrers` tinyint(1) NOT NULL,
  `mul_rooms` tinyint(1) NOT NULL,
  `mul_users` tinyint(1) DEFAULT '0',
  `mul_settings` tinyint(1) DEFAULT '0',
  `crdate` int(11) NOT NULL DEFAULT '0',
  `modate` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ci_roles`
--

INSERT INTO `ci_roles` (`rid`, `name`, `description`, `mul_welcome`, `mul_sales`, `mul_deposits`, `mul_products`, `mul_categories`, `mul_reports`, `mul_members`, `mul_employees`, `mul_referrers`, `mul_rooms`, `mul_users`, `mul_settings`, `crdate`, `modate`, `status`) VALUES
(1, 'System Administrator', 'Super user in this systems, in which has full control permission to manage in the project systems.', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1406449163, 1411796501, 1),
(2, 'Cashier', '', 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1406449163, 1411220266, 1),
(4, 'employee', '', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1411148675, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_rooms`
--

CREATE TABLE IF NOT EXISTS `ci_rooms` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) NOT NULL,
  `crdate` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ci_rooms`
--

INSERT INTO `ci_rooms` (`rid`, `room_name`, `crdate`) VALUES
(1, 'Room 1 A', 1411196751),
(2, 'Room 2 A', 1411277152),
(3, 'Room 1 B', 1411277165);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ci_services`
--

INSERT INTO `ci_services` (`pid`, `cid`, `cruser`, `mouser`, `name`, `price`, `description`, `crdate`, `modate`, `status`) VALUES
(1, 1, 1, 0, 'Massage body', 20.00, '', 1410921672, 0, 1),
(2, 1, 1, 0, 'Massage Leg', 10.00, '', 1410921699, 0, 1),
(3, 2, 1, 0, 'Traditional Spa', 30.00, '', 1410921841, 0, 1),
(4, 2, 1, 0, 'Ayurvedic Spa', 40.00, '', 1410921889, 0, 1),
(5, 2, 1, 0, 'Hammam Spa', 50.00, '', 1410921931, 0, 1);

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
('9c79eea50b5758a45a9728c0c5fc8de1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411854940, ''),
('c3a5cb24e7d326fde7ab52e99230243b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411889544, 'a:19:{s:9:"user_data";s:0:"";s:5:"ci_id";s:1:"1";s:11:"ci_username";s:5:"admin";s:12:"ci_firstname";s:3:"Man";s:11:"ci_fullname";s:8:"Man Math";s:7:"ci_role";s:20:"System Administrator";s:11:"mul_welcome";s:1:"1";s:9:"mul_sales";s:1:"1";s:12:"mul_products";s:1:"1";s:14:"mul_categories";s:1:"1";s:11:"mul_reports";s:1:"1";s:12:"mul_deposits";s:1:"1";s:9:"mul_users";s:1:"1";s:11:"mul_members";s:1:"1";s:13:"mul_referrers";s:1:"1";s:13:"mul_employees";s:1:"1";s:9:"mul_rooms";s:1:"1";s:12:"mul_settings";s:1:"1";s:4:"type";s:5:"daily";}'),
('a99ad2043b9cdcf0806c6e6a62d757a6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411919401, ''),
('0fdf3f1dd6e12ada8a05c31101b628ba', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411919401, ''),
('9039decd6fb2ac1e4e0ea899b9f2ee88', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0', 1411919413, 'a:19:{s:9:"user_data";s:0:"";s:5:"ci_id";s:1:"1";s:11:"ci_username";s:5:"admin";s:12:"ci_firstname";s:3:"Man";s:11:"ci_fullname";s:8:"Man Math";s:7:"ci_role";s:20:"System Administrator";s:11:"mul_welcome";s:1:"1";s:9:"mul_sales";s:1:"1";s:12:"mul_products";s:1:"1";s:14:"mul_categories";s:1:"1";s:11:"mul_reports";s:1:"1";s:12:"mul_deposits";s:1:"1";s:9:"mul_users";s:1:"1";s:11:"mul_members";s:1:"1";s:13:"mul_referrers";s:1:"1";s:13:"mul_employees";s:1:"1";s:9:"mul_rooms";s:1:"1";s:12:"mul_settings";s:1:"1";s:4:"type";s:5:"daily";}');

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
(2, 2, 'visalthorn', '8918d61b22b490decd25971143130064', 'visal', 'thorn', 0, 'visal.pnc@gmail.com', '011748200', 1409823737, 1411148722, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
