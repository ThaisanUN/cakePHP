-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2015 at 01:02 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `norton2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(50) DEFAULT NULL,
  `st_tel` varchar(15) DEFAULT NULL,
  `st_major` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`st_id`, `st_name`, `st_tel`, `st_major`) VALUES
(8, 'Sao Tola', '099322123', 'Business'),
(7, 'Sok Sary', '012423243', 'Computer Science'),
(9, 'Mao Panha', '0232312', 'Medical'),
(10, 'Ty Sreyny', '04242122', 'Business'),
(11, 'Ros Sophorn', '0324423', 'Banking');
