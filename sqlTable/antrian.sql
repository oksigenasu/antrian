-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 05:05 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE IF NOT EXISTS `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `ip_alamat` varchar(20) NOT NULL,
  `jam_ambilnomer` datetime NOT NULL,
  `nomor` int(11) NOT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=418 ;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `ip_alamat`, `jam_ambilnomer`, `nomor`) VALUES
(408, '::1', '2016-09-11 13:21:05', 1),
(409, '::1', '2016-09-11 13:22:05', 2),
(410, '::1', '2016-09-11 13:22:05', 3),
(411, '::1', '2016-09-11 13:22:05', 4),
(412, '::1', '2016-09-11 13:23:05', 5),
(413, '::1', '2016-09-11 13:23:05', 6),
(414, '::1', '2016-09-11 13:23:05', 7),
(415, '::1', '2016-09-11 13:24:05', 8),
(416, '::1', '2016-09-11 13:28:05', 9),
(417, '::1', '2016-09-11 13:29:05', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nokini`
--

CREATE TABLE IF NOT EXISTS `nokini` (
  `id_nokini` int(11) NOT NULL AUTO_INCREMENT,
  `no_kini` int(11) NOT NULL,
  `loket` int(11) NOT NULL,
  PRIMARY KEY (`id_nokini`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `nokini`
--

INSERT INTO `nokini` (`id_nokini`, `no_kini`, `loket`) VALUES
(147, 1, 1),
(148, 2, 1),
(149, 3, 2),
(150, 4, 1),
(151, 5, 2),
(152, 6, 1),
(153, 7, 1),
(154, 8, 1),
(155, 9, 2),
(156, 10, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
