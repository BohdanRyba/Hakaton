-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2017 г., 10:20
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

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
-- Структура таблицы `dance_categories`
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
-- Дамп данных таблицы `dance_categories`
--

INSERT INTO `dance_categories` (`id`, `d_c_program`, `d_c_age_category`, `d_c_nomination`, `d_c_league`, `org_id`, `extra_id`, `id_dance_group`, `event_ids`) VALUES
(1, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Профі', 5, 31111, 1, ''),
(13, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 1, 4444, 2, ''),
(24, 'qqqqqqqq', 'eeeeeeeeeeeeeeeeee', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 6, 0, 0, '22&'),
(4, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Профі', 5, 905567, 1, ''),
(16, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Початківці', 6, 234, 0, '102&10&3&14&22&19'),
(25, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 6, 123321, 0, '37&67&22&19'),
(7, 'Хіп-хоп', 'Діти', 'Кращий виспут за думкою глядачів', 'Початківці', 1, 1333, 1, ''),
(17, 'B&B', 'Діти', 'Кращий виспут за думкою глядачів', 'Профі', 6, 1235, 0, '12&43&32&11&19'),
(9, 'B&B', 'Діти', 'Краща техніка виконання', 'Початківці', 1, 7222, 1, ''),
(10, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Профі', 1, 7867, 1, ''),
(11, 'qqqqqqqq', 'wwwwwwwwwwwww', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 5, 0, 3, ''),
(14, 'aaaa', 'bbbb', 'ccc', 'vvvv', 6, 12332, 4, '22&19'),
(15, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Профі', 5, 123, 1, ''),
(18, 'B&B', 'Діти', 'Кращий виспут за думкою глядачів', 'Початківці', 6, 0, 0, '23&7&8&32&66&57&22&19'),
(19, 'B&B', 'Діти', 'Краща техніка виконання', 'Профі', 6, 0, 0, '233&88&45&90&22&'),
(20, 'Бачата', 'Юніори', 'Краще соло', 'Мала ліга', 5, 0, 0, ''),
(21, 'Бачата', 'Юніори', 'Краще соло', 'Старша ліга', 5, 0, 0, ''),
(22, 'Танго', 'Юніори', 'Краща пара', 'Мала ліга', 5, 0, 0, ''),
(23, 'Танго', 'Юніори', 'Краща пара', 'Старша ліга', 5, 0, 0, ''),
(26, 'B&B', 'Діти', 'Краща техніка виконання', 'Початківці', 6, 0, 0, '19&'),
(27, 'qqqqqqqq', 'eeeeeeeeeeeeeeeeee', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 1, 22222, 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dance_categories`
--
ALTER TABLE `dance_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dance_categories`
--
ALTER TABLE `dance_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
