-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 23 2016 г., 16:48
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hakaton_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `club_name` varchar(128) DEFAULT NULL,
  `club_city` varchar(255) NOT NULL,
  `club_country` varchar(255) NOT NULL,
  `club_head` varchar(256) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `club_phone` bigint(255) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `grant` tinyint(1) DEFAULT '1',
  `active` tinyint(1) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `club_name`, `club_city`, `club_country`, `club_head`, `email`, `club_phone`, `password`, `grant`, `active`) VALUES
(1, 'admin', '', 'Ukraine', 'Roma Slobodeniuk', 'romsl@i.ua', 380673800836, '21232f297a57a5a743894a0e4a801fc3', 4, 1),
(2, 'LivLegend', 'Khmelnytski', 'Ukraine', 'Гена', 'gena@mail.ua', 48692600399, 'f2f61c2ab367c3a99c9ec7306f222c7f', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`club_name`),
  ADD KEY `indSignIn` (`club_name`,`password`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
