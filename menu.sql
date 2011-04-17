-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2011 at 03:34 PM
-- Server version: 5.1.52
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jiajiann_hk`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `resource` varchar(255) NOT NULL,
  `usergroup` varchar(255) NOT NULL,
  `protected` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `hidden` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `text`, `url`, `resource`, `usergroup`, `protected`, `weight`, `hidden`) VALUES
(100, 'Home - Add Page', 'webmaster.add', '_res/webmaster/add.php', '12', '0', 20, '0'),
(101, 'Home - Modify Page', 'webmaster.modify', '_res/webmaster/modify.php', '12', '0', 21, '0'),
(115, 'Updated Panel Rules', 'core.newRule', '_res/_pages/newRules.php', '1', '0', 18, '0');
