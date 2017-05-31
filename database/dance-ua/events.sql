-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 31 2017 р., 18:36
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
-- Структура таблиці `events`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_status`, `event_start`, `event_end`, `event_city`, `event_country`, `event_referee`, `event_skutiner`, `org_id_for_event`) VALUES
(1, 'Our event 1', 'views/main/img/event_img/dances.jpg', 'Regional', '2017-06-07', '2017-06-08', 'Khmelnytskyi', 'Ukraine', 'Gordon Bayron', 'Suhishvili', 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
