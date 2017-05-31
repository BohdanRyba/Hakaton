-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 31 2017 р., 18:35
-- Версія сервера: 10.0.30-MariaDB-30
-- Версія PHP: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `livlegends`
--

-- --------------------------------------------------------

--
-- Структура таблиці `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `club_image` text NOT NULL,
  `club_country` varchar(255) NOT NULL,
  `club_city` varchar(255) NOT NULL,
  `club_shief` varchar(255) NOT NULL,
  `club_number` varchar(20) NOT NULL,
  `club_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grant` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `org_id_for_club` int(11) NOT NULL,
  `coaches` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_image`, `club_country`, `club_city`, `club_shief`, `club_number`, `club_mail`, `password`, `grant`, `active`, `org_id_for_club`, `coaches`) VALUES
(1, 'Wither Club', 'views/main/img/club_img/roma.jpg', 'Ukraine', 'Khmelnytski', 'Roma Slobodeniuk', '380673800836', 'romsl@i.ua', '21232f297a57a5a743894a0e4a801fc3', 4, 1, 1, ''),
(2, 'LivLegend', 'views/main/img/club_img/gena.jpg', 'Украина', 'Хмельницкий', 'Геннадий Федосов', '380671234567', 'gena@i.ua', 'e0a7bf6b3b6eb370828d29888d4805bc', 4, 1, 1, 'Дима&Саша&Petro&Sergey&Lesya&Kira'),
(3, 'New club test', 'views/main/img/club_img/IMG_7846.JPG', 'Good mordor', 'Frozen', 'Merik', '0', 'rio@gmail.com', 'cc48ee4e3ba11933784f5327895a7bea', 1, 1, 1, 'Turok'),
(4, 'My new Club', 'views/main/img/club_img/men_summer_pants-1.jpg', 'Uganda', 'Golden Gates', 'Moa', '(098) 897-1212', 'title@gmail.com', 'e5fc07ae8cbbda0273495b50ff9b057e', 1, 1, 1, 'Tyldor&Rabok'),
(5, 'Club', 'views/main/img/club_img/IMG_8386.JPG', 'Fortuna', 'Luck', 'Griobani luckery', '(067) 321-0011', 'clubdance@i.ua', 'a25e9b5b9b704b13af47bc17630e7a78', 1, 1, 3, 'Trener&Trener one');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
