-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2014 at 02:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `RacNikasUnda`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`news_id` int(11) NOT NULL,
  `news_text` varchar(400) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_text`, `user_id`) VALUES
(1, 'news 1', 5),
(2, 'news 2', 5),
(3, 'news 3', 5),
(4, 'news ', 6),
(5, 'dadam', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(100) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `rang_id` int(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `rang_id`) VALUES
(4, 'Levana', '4de6d7d376b1e439ff266c0f385ba471', 0),
(5, 'maria', '8822d2a2efe231fa6fce5b711df3dc7c', 0),
(6, '1', 'c4ca4238a0b923820dcc509a6f75849b', 0),
(7, '2', 'c81e728d9d4c2f636f067f89cc14862c', 0),
(8, 'tamta', '7c13aea47d6e6ddefd62d2c00653b2a4', 0),
(9, 'vaxo', '98be34c84b6a4eb940d134a422e2343e', 0),
(10, 'Keti', '0122e56376fb9bfa4d24f1b82a373c89', 0),
(11, 'khgkhg', '80960d89811e33da8770c5f3714569cf', 0),
(12, 'khgkhgáƒ°áƒ’', '96f6e35b0229e35594375acea4ac5f4a', 0),
(13, 'khkjh', 'c59ed14655a2eba608e37c26b7a34676', 0),
(14, 'adfasdf', '6a204bd89f3c8348afd5c77c717a097a', 0),
(15, 'sdasd', '912ec803b2ce49e4a541068d495ab570', 0),
(16, 'ds', '6226f7cbe59e99a90b5cef6f94f966fd', 0),
(17, 'sdasdfasd', 'a95c530a7af5f492a74499e70578d150', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`news_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
