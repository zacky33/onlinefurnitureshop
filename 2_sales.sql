-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2019 at 03:54 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2_sales`
--
CREATE DATABASE IF NOT EXISTS `2_sales` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2_sales`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_purchase` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `total_amount` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_purchase`, `product_quantity`, `date_added`, `day`, `month`, `year`, `total_amount`) VALUES
(1, 'Cocacola', 50, 45, 14, '2019-05-14 07:35:48', 12, 5, 2019, 700),
(3, 'Pizza', 800, 770, 20, '2019-05-14 07:55:59', 14, 5, 2019, 16000),
(4, 'Dell N5040 Laptop', 40500, 38000, 4, '2019-05-14 08:05:40', 14, 5, 2019, 162000),
(5, '4GB Ram chip intel', 3400, 3000, 14, '2019-05-14 09:15:51', 14, 5, 2019, 47600),
(6, 'Duo Core CPU', 5400, 5000, 10, '2019-05-14 09:16:45', 14, 5, 2019, 54000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `product_id`, `quantity`, `total_price`, `date_added`, `day`, `month`, `year`) VALUES
(5, 1, 10, 500, '2019-05-14 07:39:03', 14, 5, 2019),
(6, 3, 1, 800, '2019-05-14 07:57:08', 14, 5, 2019),
(7, 3, 4, 3200, '2019-05-14 07:57:46', 14, 5, 2019),
(8, 4, 1, 40500, '2019-05-14 08:13:42', 14, 5, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `role` text NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `role`, `password`) VALUES
('Admin', 'Admin', '0c7540eb7e65b553ec1ba6b20de79608'),
('Saler', 'Saler', '46d713c23fef5791bfe199fe4d08f12e '),
('user', 'Saler', '68f32b5f0943904f5eac13096f25d756');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
