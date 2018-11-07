-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2018 at 07:58 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `regdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `family` varchar(100) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `housenum` varchar(20) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `account_owner` varchar(100) DEFAULT NULL,
  `IBAN` varchar(50) DEFAULT NULL,
  `paydata` varchar(300) DEFAULT NULL,
  `result` int(11) DEFAULT '0',
  `satus` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `tel`, `street`, `housenum`, `zip`, `city`, `account_owner`, `IBAN`, `paydata`, `result`, `satus`) VALUES
(1, 'mmmmm', 'nnnnnn', '235235235', '', '', '', '', '', '', '', 0, 1),
(2, 'mmmmm', 'nnnnn', '35345345', '', '', '', '', '', '', '', 0, 1),
(3, '<html><body><h1>SRV Server:</h1><br>Document Contains no data.</body></html>', '', '', 'fghfg', '345435', '345345', 'rtert', '', '', '', 0, 2),
(4, '<html><body><h1>SRV Server:</h1><br>Document Contains no data.</body></html>', '', '', 'fghfg', '345435', '345345', 'rtert', 'ghkhkg', '4574745', '', 0, 3),
(5, 'Mohsen', 'Gholami', ' 19113531775', '', '', '', '', '', '', '', 0, 1),
(6, 'Mohsen', 'Gholami', ' 19113531775', 'zand ave- shafa street', '3531775', '4813775575', 'sari', '', '', '', 0, 2),
(7, 'mmmm', 'nnnn', '43345', '', '', '', '', '', '', '', 0, 1),
(8, 'mmm', 'nnn', '444', 'cvb', '234234', 'werwer', 'erwer', '', '', '', 0, 2),
(9, 'yyy', 'yy', '566', '', '', '', '', '', '', '', 0, 1),
(10, 'yyy', 'yy', '566', 'dfg', 'dfg', '54345', 'dgd', '', '', '', 0, 2),
(11, 'yyy', 'yy', '566', 'dfg', 'dfg', '54345', 'dgd', '', '', '', 0, 1),
(12, 'yyy', 'yy', '566', 'dfg', 'dfg', '54345', 'dgd', '', '', '', 0, 1),
(13, 'yyy', 'yy', '566', 'dfg', 'dfg', '54345', 'dgd', '', '', '', 0, 1),
(14, 'hhh', 'bbbb', '87687', 'shafa', '767', '7687', 'sari', 'asdasdaSD', '123123123', '', 0, 0),
(15, 'asd', 'asd', '123123', 'qweqwe', 'qwe', '123123', 'qweqwe', 'qweqwe', '123123123123', '', 0, 3),
(16, 'asas', 'ASas', '1111', 'ASas', 'ASa', 'sASa', 'sASas', 'ASas', '123123123123', '', 0, 3),
(17, 'ASas', 'ASas', 'ASas', 'ASa', 'sASa', 'sASa', 'sASasAS', 'asAS', '12312123', '', 0, 3),
(18, 'XVZ', 'ZXV', '45435345', 'dfhdfh', 'dfhdfh', 'dfhdh', 'dfhdfh', 'dfhdfh', 'erery', '', 0, 3),
(19, 'Mohsen', 'Gholami', ' 19113531775', 'zand ave- shafa street', '3531775', '4813775575', 'sari', 'sari', '98989989898098098098098', '', 0, 3),
(20, 'Mohsen', 'Gholami', ' 19113531775', 'zand ave- shafa street', '3531775', '4813775575', 'sari', '', '', '', 0, 2),
(21, 'dthh', 'dhdh', 'dfhd', 'dfhh', 'dghdfh', 'dhf', 'dfhdh', 'asd', '123123', '', 0, 0),
(22, 'asd', 'asda', '123123', 'asd', 'asdas', '123123', '121212', 'asdfsadf', 'sdfsd13432', '', 0, 1),
(23, 'rrrr', 'bbbb', '3333', 'sss', 'hhh', 'zzz', 'ccc', 'aaaa', 'iiii', '', 0, 0),
(24, 'Ø¨Ø¨Ø¨', 'Ø¨Ø¨', '323', 'sdg', 'sdg', 'sdg', 'sgd', 'sdg', 'sdg', '', 0, 0),
(25, 'sds', 'sdsd', '222', 'sss', 'sss', 'sss', 'sss', 'sss', '123123123', '', 0, 0),
(26, 'h', 'h', 'h', 'c', 'c', 'c', 'c', 'ss', '444', '', 0, 0),
(27, 'asdASD', 'ASD', '123123', 'QWEQ', 'QWEQWE', 'QWE', 'QWEQWE', 'QWE12', '123123', '', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
