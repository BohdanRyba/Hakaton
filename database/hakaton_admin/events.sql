-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 08:25 
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_status` varchar(255) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `event_city` varchar(255) NOT NULL,
  `event_country` varchar(255) NOT NULL,
  `event_referee` varchar(255) NOT NULL,
  `event_skutiner` varchar(255) NOT NULL,
  `org_id_for_event` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_status`, `event_start`, `event_end`, `event_city`, `event_country`, `event_referee`, `event_skutiner`, `org_id_for_event`) VALUES
(1, 'First Club', '../../../views/main/img/event_img/111.jpg', 'Enable', '2000-12-12', '2001-02-02', 'Lviv', 'Ukraine', 'Bodya', 'Yana', 5),
(15, 'wdafesgrdht', '../../../views/main/img/event_img/te_2Qu4gjys.jpg', 'dwafegrhtjy', '0000-00-00', '0000-00-00', 'szfdgfhgh', 'fszgdhfng', 'szvdxbfngmh', 'ascdvfgnh', 5),
(16, 'qwertyqqqqq', '../../../views/main/img/event_img/', 'weqwrqw', '0000-00-00', '0000-00-00', 'eqweqwe', 'qweqweqwe', 'qweqweqwe', 'qweqweqeq', 5),
(17, 'wdfegrhtfrgsrdh', '../../../views/main/img/event_img/', 'dafesgrdhtfgaesrhd', '0000-00-00', '0000-00-00', 'fsdfbsadgfb', 'dvfgbfdfzdvsbfdfd', 'fsfdvfbddsvfdfsf', 'fadsgfdfngfgdsf', 6),
(18, 'Bagdashachka', '../../../views/main/img/event_img/backenddeveloper.jpg', 'qwertyuiop[', '0000-00-00', '0000-00-00', 'dfsgnmjh,', 'svdfbgn', 'vxfbgcnh', 'acsvdxfbcgn hmbj', 6),
(19, 'sdsfsdfs', '../../../views/main/img/event_img/222.jpg', 'вфцвфв', '0000-00-00', '0000-00-00', 'уцауыкпвиеатрм и', 'ымвчиасптмрьи оть', 'ыавпатоьрлтб', 'уапкреньпгбршоюлд.', 6),
(20, '', '../../../views/main/img/event_img/', '', '0000-00-00', '0000-00-00', '', '', '', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
