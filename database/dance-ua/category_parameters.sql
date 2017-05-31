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
-- Структура таблиці `category_parameters`
--

CREATE TABLE `category_parameters` (
  `id` int(11) NOT NULL,
  `c_p_programs` text NOT NULL,
  `c_p_age_categories` text NOT NULL,
  `c_p_nominations` text NOT NULL,
  `c_p_leagues` text NOT NULL,
  `id_dance_group` int(11) NOT NULL,
  `id_org` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `category_parameters`
--

INSERT INTO `category_parameters` (`id`, `c_p_programs`, `c_p_age_categories`, `c_p_nominations`, `c_p_leagues`, `id_dance_group`, `id_org`) VALUES
(1, 'a:2:{i:0;a:2:{s:4:\"name\";s:15:\"Dance program 1\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:7:\"Dance 2\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:14:\"Age category 1\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Nomination 1\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:8:\"League 1\";s:5:\"value\";s:2:\"on\";}}', 2, 1),
(2, 'a:1:{i:0;a:2:{s:4:\"name\";s:8:\"qqqqqqqq\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:13:\"wwwwwwwwwwwww\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:20:\"rrrrrrrrrrrrrrrrrrrr\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:17:\"ttttttttttttttttt\";s:5:\"value\";s:2:\"on\";}}', 3, 1),
(3, 'a:2:{i:0;a:2:{s:4:\"name\";s:13:\"Хіп-хоп\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:3:\"B&B\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:14:\"Дорослі\";s:5:\"value\";s:2:\"on\";}}', 'a:2:{i:0;a:2:{s:4:\"name\";s:44:\"Краща техніка виконання\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:60:\"Кращий виспут за думкою глядачів\";s:5:\"value\";s:2:\"on\";}}', 'a:2:{i:0;a:2:{s:4:\"name\";s:10:\"Профі\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:20:\"Початківці\";s:5:\"value\";s:2:\"on\";}}', 1, 1),
(5, 'a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Бачата\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:24:\"Напівдорослі\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:29:\"Лучшие движения\";s:5:\"value\";s:2:\"on\";}}', 'a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Высшая\";s:5:\"value\";s:2:\"on\";}}', 5, 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category_parameters`
--
ALTER TABLE `category_parameters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category_parameters`
--
ALTER TABLE `category_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
