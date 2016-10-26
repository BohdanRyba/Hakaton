-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 23 2016 г., 12:00
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
  `id` bigint(20) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name_meroprijatia` varchar(255) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `main_sudia` varchar(255) NOT NULL,
  `skutiner` varchar(255) NOT NULL,
  `afisha` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `sobytie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `organization`, `status`, `name_meroprijatia`, `date_begin`, `date_end`, `city`, `country`, `main_sudia`, `skutiner`, `afisha`, `image`, `sobytie`) VALUES
(1, 'dfesgrdhtdwaffn', 'dfsfg', 'fgfh,j', '0000-00-00', '0000-00-00', 'fesgrdhjh,k.l', 'rdhtjykguhlij;/k', 'fsgdhykgulhijkg', 'jfhgfsgdhykuhlihkjh', 'rfwdwfgdhfj,', 'путь к изображению ', 'First1');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
