-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 
-- Generation Time: Sep 18, 2011 at 02:13 AM
-- Server version: 5.0.91
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `y-osirys`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `section_tag` varchar(50) NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `pdf` int(11) NOT NULL,
  `rel_video` varchar(300) NOT NULL,
  `downloads` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `section` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `exploits`
--

CREATE TABLE `exploits` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `language` varchar(50) NOT NULL,
  `vuln` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `soft_link` varchar(200) NOT NULL,
  `soft_name` varchar(100) NOT NULL,
  `comments` int(11) NOT NULL,
  `rel_video` varchar(300) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exploits`
--



-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `from` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--


-- --------------------------------------------------------

--
-- Table structure for table `live_auditing`
--

CREATE TABLE `live_auditing` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `reported` varchar(3) NOT NULL,
  `fixed` varchar(3) NOT NULL,
  `important` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_auditing`
--



--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `ip` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `what` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `meta`
--

CREATE TABLE `meta` (
  `title` varchar(100) NOT NULL,
  `main_sec` varchar(60) NOT NULL,
  `tag_title` varchar(70) NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--



--
-- Table structure for table `softwares`
--

CREATE TABLE `softwares` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag_description` varchar(300) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `language` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `section_tag` varchar(50) NOT NULL,
  `big` int(11) NOT NULL,
  `rel_video` varchar(300) NOT NULL,
  `presentation` longtext NOT NULL,
  `comments` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `softwares`
--



--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texts`
--



--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `section_tag` varchar(50) NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `downloads` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL,
  `presentation` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--



--
-- Table structure for table `web_apps`
--

CREATE TABLE `web_apps` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tag_description` varchar(200) NOT NULL,
  `tag_keywords` varchar(200) NOT NULL,
  `language` varchar(50) NOT NULL,
  `views` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  `file_name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_apps`
--
