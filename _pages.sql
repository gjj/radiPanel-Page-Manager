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
-- Table structure for table `_pages`
--

CREATE TABLE IF NOT EXISTS `_pages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `_pages`
--

INSERT INTO `_pages` (`id`, `page`, `content`) VALUES
(1, 'newRules.php', '&lt;div class=\\&quot;box\\&quot;&gt;\r\n&lt;div class=\\&quot;square title\\&quot;&gt;&lt;strong&gt;Panel Rules&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div class=\\&quot;content\\&quot;&gt;You can edit it &lt;a href=\\&quot;webmaster.add?id=1\\&quot;&gt;here&lt;/a&gt;. &lt;br /&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;This is a rule.&lt;/li&gt;\r\n&lt;li&gt;Hope it works?&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;');
