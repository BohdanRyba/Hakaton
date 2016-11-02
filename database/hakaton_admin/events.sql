-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2016 г., 18:04
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
-- Структура таблицы `events`
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
  `event_skutiner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_status`, `event_start`, `event_end`, `event_city`, `event_country`, `event_referee`, `event_skutiner`) VALUES
(1, 'First Club', '../../views/main/img/event_img/B65GJLECduw.jpg', 'Enable', '2000-12-12', '2001-02-02', 'Lviv', 'Ukraine', 'Bodya', 'Yana'),
(2, 'Second', '../../views/main/img/event_img/B65GJLECduw.jpg', 'qwertyu', '2000-12-12', '2001-02-02', 'Lviv', 'Ukraine', 'Bodya', 'Yana'),
(3, 'Second', '../../views/main/img/event_img/img661907_cc10e581f742aec6.jpg', 'qwertyu', '2000-12-12', '2001-02-02', 'Lviv', 'Ukraine', 'Bodya', 'Yana'),
(4, 'Hello Image', '../../views/main/img/event_img/B65GJLECduw.jpg', 'Hello Image', '0000-00-00', '0000-00-00', 'Hello Image', 'Hello Image', 'Hello Image', 'Hello Image'),
(5, 'qwertyuiop', '../../views/main/img/event_img/img661907_cc10e581f742aec6.jpg', 'qwertyuiy', '0000-00-00', '0000-00-00', '.ldfch,jk./l', 'dxbfcngh,jk.l/,', 'vxdfbcgvnhbmj,nk.ml,', 'xvcbfvngbhm,n'),
(6, 'poiuytr', '../../views/main/img/event_img/img661907_cc10e581f742aec6.jpg', 'wefrghyujgr', '0000-00-00', '0000-00-00', 'sfdhjm', 'sfdhj', 'fsdghmj', 'sfdgfh');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
