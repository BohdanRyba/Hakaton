-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2016 г., 18:03
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hakaton_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `club_image` text NOT NULL,
  `club_country` varchar(255) NOT NULL,
  `club_city` varchar(255) NOT NULL,
  `club_shief` varchar(255) NOT NULL,
  `club_first_trener` varchar(255) NOT NULL,
  `club_second_trener` varchar(255) NOT NULL,
  `club_third_trener` varchar(255) NOT NULL,
  `club_number` bigint(20) NOT NULL,
  `club_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_image`, `club_country`, `club_city`, `club_shief`, `club_first_trener`, `club_second_trener`, `club_third_trener`, `club_number`, `club_mail`) VALUES
(17, 'YoungLife', 'views/main/img/club_img/qqqq.jpg', 'Ukraine', 'Ternopil', 'Yana', 'Bodya', 'Roma', 'Sasha', 6666666, 'shekel_ua@i.ua'),
(18, 'Test', 'views/main/img/club_img/B65GJLECduw.jpg', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 12345, 'qwertyui@mail.ru'),
(19, 'Hello World', 'views/main/img/club_img/B65GJLECduw.jpg', 'Hello World', 'Hello World', 'Hello World', 'Hello World', 'Hello World', 'Hello World', 12345678, 'i@i.i'),
(20, '', 'views/main/img/club_img/', '', '', '', '', '', '', 0, ''),
(25, 'qwertyuio', 'views/main/img/club_img/img661907_cc10e581f742aec6.jpg', 'qwrtyui', 'adsdfyguh', 'qwertuki', 'hb,jxcnb,j', 'fdxfcnh,j.kl', 'aCSVdbfngh,j', 1234567, 'adsdw@i.a'),
(26, 'qwerty', 'views/main/img/club_img/B65GJLECduw.jpg', 'qwertyu', 'wertyui', 'wertyju', 'sfdgrhu', 'sfdgfhg', 'fhgjhkulji', 1245678, 'i@i.i'),
(44, 'poiuytre', 'views/main/img/club_img/img669771_c9b88db761dd1b77.jpg', 'Ukraine', 'Ternopil', 'qwertuki', 'qwertyu', 'Bodya', 'Hello World', 156325, 'qwerty@mail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
