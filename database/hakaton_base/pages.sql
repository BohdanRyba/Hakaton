-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 19 2016 г., 12:36
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
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `link` varchar(64) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT '1',
  `grant` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `link`, `description`, `active`, `grant`, `class`) VALUES
(1, 'Главная', 'home', 'without_popup', 1, 0, ''),
(7, 'Создать событие', 'addevent', 'without_popup', 0, 4, 'evant_animate'),
(8, 'Создать новость', 'addnews', 'without_popup', 0, 4, 'news_animate'),
(2, 'Новости', 'news/page/1', 'without_popup', 1, 0, ''),
(3, 'События', 'events', 'without_popup', 1, 1, ''),
(4, 'Связь с нами', '#', 'popup', 1, 0, 'connect'),
(5, 'Вход', '#', 'popup', 1, 2, 'log_animate'),
(6, 'Выход', 'out', 'without_popup', 1, 1, ''),
(10, 'Профиль', 'profile', 'without_popup', 1, 1, ''),
(9, 'Регистрация', 'home#registration_form', 'without_popup', 0, 1, ''),
(11, 'Админ панель', 'admin/organizations/page/1', 'without_popup', 1, 4, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
