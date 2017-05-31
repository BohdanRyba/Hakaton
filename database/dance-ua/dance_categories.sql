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
-- Структура таблиці `dance_categories`
--

CREATE TABLE `dance_categories` (
  `id` int(11) NOT NULL,
  `d_c_program` varchar(255) NOT NULL,
  `d_c_age_category` varchar(255) NOT NULL,
  `d_c_nomination` varchar(255) NOT NULL,
  `d_c_league` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `id_dance_group` int(11) NOT NULL,
  `event_ids` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `dance_categories`
--

INSERT INTO `dance_categories` (`id`, `d_c_program`, `d_c_age_category`, `d_c_nomination`, `d_c_league`, `org_id`, `extra_id`, `id_dance_group`, `event_ids`) VALUES
(1, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 1, 111, 0, '1&'),
(2, 'Dance 2', 'Age category 1', 'Nomination 1', 'League 1', 1, 222, 0, '1&'),
(3, 'qqqqqqqq', 'wwwwwwwwwwwww', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 1, 333, 0, '1&'),
(4, 'Хіп-хоп', 'Дорослі', 'Краща техніка виконання', 'Профі', 1, 444, 0, ''),
(5, 'Хіп-хоп', 'Дорослі', 'Краща техніка виконання', 'Початківці', 1, 555, 0, '1&'),
(6, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Профі', 1, 666, 0, '1&'),
(7, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Початківці', 1, 777, 0, ''),
(8, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Профі', 1, 888, 0, '1&'),
(9, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Початківці', 1, 999, 0, ''),
(12, 'Бачата', 'Напівдорослі', 'Лучшие движения', 'Высшая', 1, 77770, 0, '1&');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `dance_categories`
--
ALTER TABLE `dance_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `dance_categories`
--
ALTER TABLE `dance_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
