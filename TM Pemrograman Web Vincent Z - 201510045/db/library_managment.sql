-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2022 at 09:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'Admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookpic` varchar(25) NOT NULL,
  `bookname` varchar(25) NOT NULL,
  `bookdetail` varchar(110) NOT NULL,
  `bookaudor` varchar(25) NOT NULL,
  `bookpub` varchar(25) NOT NULL,
  `branch` varchar(110) NOT NULL,
  `bookprice` varchar(25) NOT NULL,
  `bookquantity` varchar(25) NOT NULL,
  `bookava` int(11) NOT NULL,
  `bookrent` int(11) NOT NULL,
  `isbnno` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `bookpic`, `bookname`, `bookdetail`, `bookaudor`, `bookpub`, `branch`, `bookprice`, `bookquantity`, `bookava`, `bookrent`, `isbnno`) VALUES
(4, 'Picture1.png', 'PHP', '1st edition', 'no idea', 'Suscipit', 'IT', '100', '20', -1, 1, ''),
(5, 'Picture1.png', 'Advanced Java', '2nd edition ', 'Herbert Schildt', 'no idea', 'IT', '', '100', -1, 1, ''),
(7, 'Picture1.png', 'Advanced C#', '2nd edition ', 'Herbert Schildt', 'no idea', 'IT', '', '100', -1, 1, ''),
(8, 'WhatsApp Image 2021-12-31', 'test1', '2nd edition ', 'author 1', 'Suscipit', '', '', '100', 100, 0, ''),
(9, 'vector-illustration-kids-', 'testbb', '2nd edition ', 'user2', 'no idea', '', '', '20', 20, 0, ''),
(10, 'a1', 'WhatsApp Image 2021-12-31', 'test2', '2nd edition ', 'Herbert Schildt', 'Suscipit', '100', '', 0, 0, '100'),
(11, 'a2', 'WhatsApp Image 2021-12-31', 'test3', '2nd edition ', 'Herbert Schildt', 'Suscipit', '', '', 0, 0, '23'),
(12, '00001', '360_F_268802298_B6r3fMQIy', 'it', 'test deta', 'tharindu', '2nd ', '', '', 0, 0, '100');

-- --------------------------------------------------------

--
-- Table structure for table `book2`
--

DROP TABLE IF EXISTS `book2`;
CREATE TABLE IF NOT EXISTS `book2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbnno` varchar(100) NOT NULL,
  `bookpic` varchar(25) NOT NULL,
  `bookname` varchar(25) NOT NULL,
  `bookdetail` varchar(110) NOT NULL,
  `bookaudor` varchar(25) NOT NULL,
  `bookpub` varchar(25) NOT NULL,
  `branch` varchar(25) NOT NULL,
  `bookprice` varchar(25) NOT NULL,
  `bookquantity` varchar(25) NOT NULL,
  `bookava` int(11) NOT NULL,
  `bookrent` int(11) NOT NULL,
  PRIMARY KEY (`id`,`isbnno`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book2`
--

INSERT INTO `book2` (`id`, `isbnno`, `bookpic`, `bookname`, `bookdetail`, `bookaudor`, `bookpub`, `branch`, `bookprice`, `bookquantity`, `bookava`, `bookrent`) VALUES
(3, '00001', '360_F_268802298_B6r3fMQIy', 'it', 'test deta', 'tharindu', '2nd ', '', '', '100', 100, 0),
(4, '0002', 'amazing-beautiful-breatht', 'abc', 'test deta', 'Namal', '2nd ', '100', '', '25', 24, 1),
(5, '00003', 'black-marble-concrete-bac', 'aaa', 'test deta', 'Namal', '2nd ', '200', '', '30', 30, 0),
(6, '00004', 'videoblocks-mystical-horr', 'bbb', 'test data', 'Namal', '1st', '300', '', '35', 35, 0),
(7, '00005', '360_F_268802298_B6r3fMQIy', 'ccc', 'test data', 'Namal', '1st', '400', '', '30', 29, 1),
(8, '00006', 'amazing-beautiful-breatht', 'ddd', 'test data', 'Namal', '1st', '500', '', '20', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

DROP TABLE IF EXISTS `issuebook`;
CREATE TABLE IF NOT EXISTS `issuebook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `issuename` varchar(25) NOT NULL,
  `issuebook` varchar(25) NOT NULL,
  `issuetype` varchar(25) NOT NULL,
  `issuedays` int(11) NOT NULL,
  `issuedate` varchar(25) NOT NULL,
  `issuereturn` varchar(25) NOT NULL,
  `fine` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_fk` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `memberid`, `userid`, `issuename`, `issuebook`, `issuetype`, `issuedays`, `issuedate`, `issuereturn`, `fine`) VALUES
(2, '', 1, 'Tharindu', 'PHP', 'student', 7, '11/05/2022', '18/05/2021', 0),
(13, '', 7, 'kasun', 'Advanced C#', 'student', 7, '06/06/2022', '13/06/2022', 0),
(14, '', 1, 'Tharindu', 'PHP', 'student', 7, '06/06/2022', '13/06/2022', 0),
(16, '', 9, 'Namal', 'Advanced Java', 'Staff Member', 0, '08/06/2022', '08/06/2022', 0),
(17, '', 0, 'A001', '00005', 'Staff Member', 7, '19/09/2022', '26/09/2022', 0),
(18, '', 0, 'A001', '0002', 'Staff Member', 4, '19/09/2022', '23/09/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `msg` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `msg`, `date`) VALUES
(8, 'Member meeting held on 2022 - 11 - 20 at 11am. please all members come and seat.  ', '2022-09-17'),
(9, 'abcd', '2022-09-17'),
(10, 'fffffffffffff  ', '2022-09-17'),
(11, 'aaaaaaaaaaaaaaaa', '2022-09-17'),
(12, 'fdgd', '2022-09-17'),
(13, 'NNN', '2022-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
  `pid` varchar(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pauthor` varchar(50) NOT NULL,
  `bpdf` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`pid`, `pname`, `pauthor`, `bpdf`) VALUES
('p001', 'abcd', 'namal', 'HAPPY BIRTHDAY.pdf'),
('p002', 'bbb', 'namal', 'Untitled-2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `requestbook`
--

DROP TABLE IF EXISTS `requestbook`;
CREATE TABLE IF NOT EXISTS `requestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbnno` varchar(100) NOT NULL,
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `bookname` varchar(25) NOT NULL,
  `issuedays` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `pk_fk_book` (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestbook`
--

INSERT INTO `requestbook` (`id`, `isbnno`, `bookid`, `userid`, `username`, `usertype`, `bookname`, `issuedays`, `status`) VALUES
(1, '0002', 4, 9, 'Namal', 'Staff Member', 'PHP', '7', 'pending'),
(2, '00003', 5, 9, 'Namal', 'Staff Member', 'Advanced Java', '7', 'pending'),
(4, '00006', 8, 9, 'Namal', 'Staff Member', 'ddd', '7', 'pending'),
(5, '00001', 3, 9, 'Namal', 'Staff Member', 'it', '7', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL,
  `pauthor` varchar(50) NOT NULL,
  `fname` text NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `memberid` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `name`, `email`, `pass`, `type`, `telephone`, `address`, `memberid`, `gender`, `age`, `occupation`) VALUES
(9, 'Namal', 'namal@gmail.com', 'n123', 'Staff Member', '0702014690', 'Nikaweratiya', 'A001', 'M', 26, 'Chairmen');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
