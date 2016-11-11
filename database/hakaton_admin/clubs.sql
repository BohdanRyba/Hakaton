-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 11 2016 г., 19:22
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
  `club_number` bigint(20) NOT NULL,
  `club_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grant` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `org_id_for_club` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_image`, `club_country`, `club_city`, `club_shief`, `club_number`, `club_mail`, `password`, `grant`, `active`, `org_id_for_club`) VALUES
(1, 'admin', '../../../views/main/img/club_img/', 'Ukraine', 'Khmelnytski', 'Roma Slobodeniuk', 380673800836, 'romsl@i.ua', '21232f297a57a5a743894a0e4a801fc3', 4, 1, 0),
(2, 'LivLegend', '../../../views/main/img/club_img/', 'Ukraine', 'Khmelnytski', 'Гена', 48692600399, 'gena@mail.ua', 'f2f61c2ab367c3a99c9ec7306f222c7f', 1, 1, 0),
(3, 'YoungLife', '../../../views/main/img/club_img/frontenddeveloper.jpg', 'dwfesgrthfyg', 'пквреноплгдш', 'qwertuki', 156325, 'Mail@MAIL.Mail', '143ded654a348786b74aef170ab4dcb5', 1, 1, 5),
(6, 'ClubName', '../../../views/main/img/club_img/frontenddeveloper.jpg', 'dawsfvdrbzscdscz', 'asdasdasd', 'asdsadasd', 121231241214124, 'adsdw@i.a', 'b14e6dd681bf2819a5bf6ce8348f7db7', 1, 1, 4);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
