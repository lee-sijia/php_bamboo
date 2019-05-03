-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2019 at 08:54 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bamboo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE `content_table` (
  `content_id` int(20) NOT NULL,
  `content_title` varchar(2550) DEFAULT NULL,
  `content_text` text,
  `content_comment` text,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`content_id`, `content_title`, `content_text`, `content_comment`, `user_id`) VALUES
(1, 'Learning Note Three - How to handle a final project like branch', '1. blabllblabalablablabalabalbalabalbalabalbalabalabalabalbalabalabalbal;\r\n2.Blabalbalablablabalablabalbalabalbalabalabalablaalbalalabalablabalalbalab;\r\n3.Blabalbalablablabalablabalbalabalbalabalabalablaalbalalabalablabalalbalab;\r\n4. blabllblabalablablabalabalbalabalbalabalbalabalabalabalbalabalabalbal.\r\n', 'This is the first note to learn php (php, mysql, jQuery) Date:04/17/19', 1),
(3, 'Learning Note Two - How to design a mySQL datebase', '1. blblblabalaabal;\r\n2. blblblblblblbalablabalablabalbalababalabalalb;\r\n3.blablablabalbalabalbalabalablabalabla', 'This is the first note to learn php (php, mysql, jQuery) Date:04/16/19', 1),
(4, '444', '666777', '666', 2),
(5, 'Learning Note one - How to create a CURD app', 'step One: balbalbala; \r\nstep Two: blablabal;\r\nstep three:blablabla;', 'This is the first note to learn php (php, mysql, jQuery) Date:04/15/19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `dashed_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `first_name`, `last_name`, `email`, `user_name`, `dashed_password`) VALUES
(1, 'sijia', 'li', 'sijiali@nowhere.com', 'sijia', 'Test123$'),
(2, 'bohan', 'su', 'bohan@nowhere.com', 'bohan', 'Test123$'),
(3, 'xiaomei', 'li', 'xiaomei@nowhere.com', 'xiaomei', 'li'),
(4, 'xiaopang', 'li', 'xiaopang@nowhere.com', 'xiaopang', 'Test123$'),
(5, 'xiaozhuzhu', 'li', 'xiaozhu@nowhere.com', 'xiaozhuzhu', 'Test123$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_table`
--
ALTER TABLE `content_table`
  MODIFY `content_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_table`
--
ALTER TABLE `content_table`
  ADD CONSTRAINT `content_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
