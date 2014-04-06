-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2014 at 10:20 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_code` varchar(200) NOT NULL,
  `ques` varchar(1000) NOT NULL,
  `ans` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `quiz_code`, `ques`, `ans`, `option1`, `option2`, `option3`, `code`) VALUES
(11, 'garvitdelhid1165', 'hellp', 'ans', 'op1', 'op', 'op', 'c3ca72025f59582b9c25771807aa4e13');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_data`
--

CREATE TABLE IF NOT EXISTS `quiz_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `quiz_code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `no_ques` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quiz_data`
--

INSERT INTO `quiz_data` (`ID`, `quiz_code`, `name`, `description`, `no_ques`, `code`) VALUES
(8, 'garvitdelhid1165', 'Quiz', 'this is a quiz				', 1, 'c3ca72025f59582b9c25771807aa4e13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `code`, `email`) VALUES
(31, 'garvitdelhi', 'cb1a8e121921c16ffb9c87342c7c3536', 'c3ca72025f59582b9c25771807aa4e13', 'garvitdelhi@gmail.com'),
(32, 'test', '05a671c66aefea124cc08b76ea6d30bb', 'ea4ab09af234eaa30e965de21013ab93', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ID`, `name`, `email`, `code`) VALUES
(27, 'garvit', 'garvitdelhi@gmail.com', 'c3ca72025f59582b9c25771807aa4e13'),
(28, 'test', 'test@gmail.com', 'ea4ab09af234eaa30e965de21013ab93');

-- --------------------------------------------------------

--
-- Table structure for table `user_taken`
--

CREATE TABLE IF NOT EXISTS `user_taken` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `quiz_code` varchar(200) NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_taken`
--

INSERT INTO `user_taken` (`ID`, `code`, `quiz_code`, `result`) VALUES
(21, 'ea4ab09af234eaa30e965de21013ab93', 'garvitdelhid1165', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
