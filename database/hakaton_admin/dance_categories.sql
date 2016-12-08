-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2016 at 11:08 
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
  `extra_id` int(11) DEFAULT NULL,
  `id_dance_group` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dance_categories`
--

INSERT INTO `dance_categories` (`id`, `d_c_program`, `d_c_age_category`, `d_c_nomination`, `d_c_league`, `org_id`, `extra_id`, `id_dance_group`) VALUES
(1, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Профі', 5, 1111, 1),
(2, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Початківці', 5, 2222, 1),
(3, 'Хіп-хоп', 'Дорослі', 'Краща техніка виконання', 'Профі', 5, 3333, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
