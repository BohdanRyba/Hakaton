-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2016 at 06:26 
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
-- Table structure for table `dance_groups`
--

CREATE TABLE `dance_groups` (
  `id` int(11) NOT NULL,
  `dance_group_name` varchar(255) NOT NULL,
  `d_program` text NOT NULL,
  `d_age_category` text NOT NULL,
  `d_nomination` text NOT NULL,
  `d_league` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dance_groups`
--

INSERT INTO `dance_groups` (`id`, `dance_group_name`, `d_program`, `d_age_category`, `d_nomination`, `d_league`) VALUES
(1, 'Сучасні танці', 'a:2:{s:13:"Хіп-хоп";a:0:{}s:3:"B&B";a:0:{}}', 'a:2:{s:8:"Діти";a:2:{s:25:"age-category-rule-age-min";s:4:"2005";s:25:"age-category-rule-age-max";s:4:"2006";}s:14:"Дорослі";a:2:{s:25:"age-category-rule-age-min";s:4:"1995";s:25:"age-category-rule-age-max";s:4:"1997";}}', 'a:2:{s:44:"Краща техніка виконання";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"2";}s:60:"Кращий виспут за думкою глядачів";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"3";}}', 'a:2:{s:10:"Профі";a:1:{s:31:"league-rule-participation-years";s:2:"15";}s:20:"Початківці";a:1:{s:31:"league-rule-participation-years";s:1:"2";}}'),
(2, 'New Dance Program', 'a:2:{s:15:"Dance program 1";a:0:{}s:7:"Dance 2";a:0:{}}', 'a:1:{s:14:"Age category 1";a:2:{s:25:"age-category-rule-age-min";s:4:"1123";s:25:"age-category-rule-age-max";s:4:"1125";}}', 'a:1:{s:12:"Nomination 1";a:1:{s:39:"nomination-rule-participants-number-min";s:2:"23";}}', 'a:1:{s:8:"League 1";a:1:{s:31:"league-rule-participation-years";s:1:"5";}}'),
(3, 'Programma', 'a:1:{s:8:"qqqqqqqq";a:0:{}}', 'a:2:{s:13:"wwwwwwwwwwwww";a:2:{s:25:"age-category-rule-age-min";s:8:"11111111";s:25:"age-category-rule-age-max";s:9:"222222222";}s:18:"eeeeeeeeeeeeeeeeee";a:2:{s:25:"age-category-rule-age-min";s:7:"3333333";s:25:"age-category-rule-age-max";s:8:"44444444";}}', 'a:1:{s:20:"rrrrrrrrrrrrrrrrrrrr";a:1:{s:39:"nomination-rule-participants-number-min";s:8:"55555555";}}', 'a:1:{s:17:"ttttttttttttttttt";a:1:{s:31:"league-rule-participation-years";s:14:"66666666666666";}}'),
(4, 'Modern', 'a:1:{s:4:"asdf";a:0:{}}', 'a:1:{s:9:"kjhafklsd";a:2:{s:25:"age-category-rule-age-min";s:3:"212";s:25:"age-category-rule-age-max";s:3:"123";}}', 'a:1:{s:5:"sklfj";a:1:{s:39:"nomination-rule-participants-number-min";s:2:"55";}}', 'a:1:{s:7:"dsklfjl";a:1:{s:31:"league-rule-participation-years";s:3:"221";}}'),
(5, 'SUPER DANCES', 'a:1:{s:5:"Dance";a:0:{}}', 'a:1:{s:5:"Ojusd";a:2:{s:25:"age-category-rule-age-min";s:2:"12";s:25:"age-category-rule-age-max";s:2:"13";}}', 'a:1:{s:4:"Name";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"3";}}', 'a:1:{s:4:"Lihj";a:1:{s:31:"league-rule-participation-years";s:2:"23";}}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dance_groups`
--
ALTER TABLE `dance_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dance_groups`
--
ALTER TABLE `dance_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
