-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2014 at 11:51 
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `english4fun`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessonplans`
--

CREATE TABLE IF NOT EXISTS `lessonplans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lessonplans`
--

INSERT INTO `lessonplans` (`id`, `title`, `content`, `name`) VALUES
(1, 'Find the irish man', 'bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum bacon ipsum ', 'find-the-irishman'),
(2, 'Pin the tail', 'asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd asldkjalksjd ', 'pin-the-tail'),
(3, 'Musical chairs', 'Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! Mayham! ', 'musical-chairs'),
(4, 'Change Places!', 'Do not try this in classroom after Alice in Wonderland viewing', 'change-places');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `hash` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userlevel` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `hash`, `userlevel`) VALUES
(1, 'admin', 'sha256:1000:5j0aO53BYD3JqO8TQHuY2yw7Zjm+v8Qw:zu+SN33PFDTIZ+ghcs0D31QJuXtC9sDW', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
