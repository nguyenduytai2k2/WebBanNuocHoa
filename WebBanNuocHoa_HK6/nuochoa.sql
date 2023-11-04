-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 01:21 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nuochoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ProdID` tinyint(4) NOT NULL auto_increment,
  `ProdName` varchar(100) NOT NULL,
  `ProdPrice` double NOT NULL,
  `ProdImage` varchar(100) NOT NULL,
  `ProdDescription` varchar(100) default NULL,
  `CompID` tinyint(4) NOT NULL,
  PRIMARY KEY  (`ProdID`),
  KEY `CompID` (`CompID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ProdID`, `ProdName`, `ProdPrice`, `ProdImage`, `ProdDescription`, `CompID`) VALUES
(1, 'Dior Addict Eau De Parfum', 1990000, 'dior1.jpg', NULL, 1),
(2, 'Dior Hypnotic Poison Eau De Toilette', 2990000, 'dior2.jpg', NULL, 1),
(3, 'Dior J’adore Eau De Parfum', 3990000, 'dior3.jpg', NULL, 1),
(4, 'Dior J’adore L’Absolu Absolue', 4990000, 'dior4.jpg', NULL, 1),
(5, 'Dior Joy Eau De Parfum Woman', 5990000, 'dior5.jpg', NULL, 1),
(6, 'Gucci A Song For The Rose EDP', 1990000, 'gucci1.jpg', NULL, 2),
(7, 'Gucci Guilty Black Pour Homme', 2990000, 'gucci2.jpg', NULL, 2),
(8, 'Gucci Guilty Intense Pour Homme', 3990000, 'gucci3.jpg', NULL, 2),
(9, 'Gucci Guilty Love Edition MMXXI EDT Men', 4990000, 'gucci4.jpg', NULL, 2),
(10, 'Gucci Guilty Love Edition Pour Homme', 5990000, 'gucci5.jpg', NULL, 2),
(11, 'Chanel Chance Eau De Parfum', 1990000, 'chanel1.jpg', NULL, 3),
(12, 'Chanel Chance Eau Fraiche', 2990000, 'chanel2.jpg', NULL, 3),
(13, 'Chanel Chance Eau Tendre Eau De Parfum', 3990000, 'chanel3.jpg', NULL, 3),
(14, 'Chanel Coco Mademoiselle', 4990000, 'chanel4.jpg', NULL, 3),
(15, 'Chanel Coco Mademoiselle Intense', 5990000, 'chanel5.jpg', NULL, 3),
(16, 'Versace Blue Jeans', 1990000, 'versace1.jpg', NULL, 4),
(17, 'Versace Dylan Blue Pour Homme', 2990000, 'versace2.jpg', NULL, 4),
(18, 'Versace Eros Flame Eau de Parfum Men', 3990000, 'versace3.jpg', NULL, 4),
(19, 'Versace Eros Men Eau de Parfum', 4990000, 'versace4.jpg', NULL, 4),
(20, 'Versace Pour Homme', 5990000, 'versace5.jpg', NULL, 4),
(21, 'Lacoste Eau De Lacoste Women', 1990000, 'lacoste1.jpg', NULL, 5),
(22, 'Lacoste L.12.12 pour Elle Elegant', 3990000, 'lacoste2.jpg', NULL, 5),
(23, 'Lacoste L.12.12 Pour Elle Natural', 5990000, 'lacoste3.jpg', NULL, 5),
(24, 'Lacoste L.12.12 Pour Elle Sparkling', 7990000, 'lacoste4.jpg', NULL, 5),
(25, 'Lacoste L.12.12 Sparkling Collector', 9990000, 'lacoste5.jpg', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `CompID` tinyint(4) NOT NULL auto_increment,
  `CompName` varchar(100) NOT NULL,
  `CompAddress` varchar(100) NOT NULL,
  `CompPhone` varchar(100) default NULL,
  `Email` varchar(100) default NULL,
  PRIMARY KEY  (`CompID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`CompID`, `CompName`, `CompAddress`, `CompPhone`, `Email`) VALUES
(1, 'Dior', '1 NgThaiSon', NULL, NULL),
(2, 'Gucci', '1 NgVanBao', NULL, NULL),
(3, 'Chanel', '1 LeLoi', NULL, NULL),
(4, 'Versace', '1 LeLai', NULL, NULL),
(5, 'Lacoste', '1 NgVanNghi', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`CompID`) REFERENCES `thuonghieu` (`CompID`) ON DELETE CASCADE ON UPDATE CASCADE;
