-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2016 at 06:02 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hakaton_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `dance_categories`
--

CREATE TABLE `dance_categories` (
  `id` int(11) NOT NULL,
  `d_c_program` varchar(255) NOT NULL,
  `d_c_age_category` varchar(255) NOT NULL,
  `d_c_nomination` varchar(255) NOT NULL,
  `d_c_league` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `extra_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dance_categories`
--

INSERT INTO `dance_categories` (`id`, `d_c_program`, `d_c_age_category`, `d_c_nomination`, `d_c_league`, `org_id`, `extra_id`) VALUES
(1, 'asdf', 'kjhafklsd', 'sklfj', 'dsklfjl', 4, 0),
(2, 'qqqqqqqq', 'wwwwwwwwwwwww', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 4, 0),
(3, 'qqqqqqqq', 'eeeeeeeeeeeeeeeeee', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 4, 0),
(4, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 4, 0),
(5, 'Dance 2', 'Age category 1', 'Nomination 1', 'League 1', 4, 0),
(6, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Профі', 4, 0),
(7, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Початківці', 4, 0),
(8, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Профі', 4, 0),
(9, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Початківці', 4, 0),
(10, 'B&B', 'Діти', 'Краща техніка виконання', 'Профі', 4, 0),
(11, 'B&B', 'Діти', 'Краща техніка виконання', 'Початківці', 4, 0),
(12, 'Dance', 'Ojusd', 'Name', 'Lihj', 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dance_categories`
--
ALTER TABLE `dance_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dance_categories`
--
ALTER TABLE `dance_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
