-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2016 at 09:46 
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
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_abbreviation` varchar(255) NOT NULL,
  `org_head_fio` varchar(255) NOT NULL,
  `org_city` varchar(255) NOT NULL,
  `org_country` varchar(255) NOT NULL,
  `org_phone` bigint(20) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pic_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_abbreviation`, `org_head_fio`, `org_city`, `org_country`, `org_phone`, `org_email`, `org_pic_path`) VALUES
(1, 'First Organization', 'FO', 'Head of the first organizations', 'Kiev', 'Ukraine', 4835554447111, 'first@gmail.com', 'views\\main\\img\\org_image\\Dancing-300x300.jpg'),
(3, 'Julia Roberts Organization', 'JROrg', 'Julia Roberts', 'San-Francisko', 'USA', 11111111111111, 'juli_rob@gmail.com', 'views/main/img/org_image/Julia-Roberts-150x150.jpg'),
(4, 'Оля Корпорейшен', 'ОК', 'Гордова Ольгаadsf', 'Нежин', 'Украина', 51551831, 'olia@gmailcom', 'views/main/img/org_image/Olia.jpg'),
(5, 'Sixth Organization', 'SEX', 'Avral', 'New York city', 'USA', 2147483647, 'org_6_six@emali.non', 'views/main/img/org_image/sixth_org_img.jpg'),
(6, 'My own dance organization', 'MOD', 'Roman', 'Kmelnytski', 'Ukraine', 3806735521, 'roma@i.ua', 'views/main/img/org_image/2016-11-08_16-24-15.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_name` (`org_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
