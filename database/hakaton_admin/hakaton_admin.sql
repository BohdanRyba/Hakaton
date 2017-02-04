-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 27 2017 г., 14:56
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.23

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
-- Структура таблицы `category_parameters`
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
-- Дамп данных таблицы `category_parameters`
--

INSERT INTO `category_parameters` (`id`, `c_p_programs`, `c_p_age_categories`, `c_p_nominations`, `c_p_leagues`, `id_dance_group`, `id_org`) VALUES
(1, 'a:2:{i:0;a:2:{s:4:"name";s:13:"Хіп-хоп";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:44:"Краща техніка виконання";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:20:"Початківці";s:5:"value";s:2:"on";}}', 1, 5),
(2, 'a:2:{i:0;a:2:{s:4:"name";s:6:"Хіп";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:44:"Краща техніка виконання";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:20:"Початківці";s:5:"value";s:2:"on";}}', 1, 6),
(3, 'a:2:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:7:"Dance 2";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 5),
(4, 'a:1:{i:0;a:2:{s:4:"name";s:4:"asdf";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:9:"kjhafklsd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"sklfj";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:7:"dsklfjl";s:5:"value";s:2:"on";}}', 4, 4),
(5, 'a:1:{i:0;a:2:{s:4:"name";s:8:"qqqqqqqq";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:18:"eeeeeeeeeeeeeeeeee";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 4),
(6, 'a:2:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:7:"Dance 2";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 4),
(7, 'a:1:{i:0;a:2:{s:4:"name";s:5:"Dance";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"Ojusd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Name";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Lihj";s:5:"value";s:2:"on";}}', 5, 5),
(8, 'a:1:{i:0;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}}', 1, 3),
(9, 'a:2:{i:0;a:2:{s:4:"name";s:13:"Хіп-хоп";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:44:"Краща техніка виконання";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:20:"Початківці";s:5:"value";s:2:"on";}}', 1, 4),
(10, 'a:1:{i:0;a:2:{s:4:"name";s:5:"Dance";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"Ojusd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Name";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Lihj";s:5:"value";s:2:"on";}}', 5, 4),
(11, 'a:1:{i:0;a:2:{s:4:"name";s:4:"asdf";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:9:"kjhafklsd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"sklfj";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:7:"dsklfjl";s:5:"value";s:2:"on";}}', 4, 3),
(12, 'a:1:{i:0;a:2:{s:4:"name";s:8:"qqqqqqqq";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 3),
(13, 'a:1:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 3),
(14, 'a:1:{i:0;a:2:{s:4:"name";s:17:"new dance program";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:18:"eeeeeeeeeeeeeeeeee";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 5),
(15, 'a:1:{i:0;a:2:{s:4:"name";s:4:"asdf";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:9:"kjhafklsd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"sklfj";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:7:"dsklfjl";s:5:"value";s:2:"on";}}', 4, 1),
(16, 'a:1:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 1),
(17, 'a:1:{i:0;a:2:{s:4:"name";s:8:"qqqqqqqq";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:18:"eeeeeeeeeeeeeeeeee";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 1),
(18, 'a:1:{i:0;a:2:{s:4:"name";s:5:"Dance";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"Ojusd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Name";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Lihj";s:5:"value";s:2:"on";}}', 5, 1),
(19, 'a:2:{i:0;a:2:{s:4:"name";s:13:"Хіп-хоп";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:44:"Краща техніка виконання";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:20:"Початківці";s:5:"value";s:2:"on";}}', 1, 1),
(21, 'a:2:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:7:"Dance 2";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 6),
(22, 'a:1:{i:0;a:2:{s:4:"name";s:17:"new dance program";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:18:"eeeeeeeeeeeeeeeeee";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 6),
(23, 'a:1:{i:0;a:2:{s:4:"name";s:5:"Dance";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"Ojusd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Name";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:4:"Lihj";s:5:"value";s:2:"on";}}', 5, 6),
(24, 'a:1:{i:0;a:2:{s:4:"name";s:4:"asdf";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:9:"kjhafklsd";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:5:"sklfj";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:7:"dsklfjl";s:5:"value";s:2:"on";}}', 4, 2),
(25, 'a:2:{i:0;a:2:{s:4:"name";s:12:"Бачата";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:10:"Танго";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:12:"Юніори";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:19:"Краща пара";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:19:"Краще соло";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:17:"Мала ліга";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:21:"Старша ліга";s:5:"value";s:2:"on";}}', 6, 5),
(26, 'a:3:{i:0;a:2:{s:4:"name";s:12:"Бачата";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:10:"Танго";s:5:"value";s:2:"on";}i:2;a:2:{s:4:"name";s:10:"Румба";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:8:"Діти";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:12:"Юніори";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:19:"Краще соло";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:25:"Краща команда";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:17:"Мала ліга";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:26:"Профессіонали";s:5:"value";s:2:"on";}}', 6, 6);

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
  `club_number` varchar(255) NOT NULL,
  `club_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grant` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `org_id_for_club` int(11) NOT NULL,
  `coaches` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_image`, `club_country`, `club_city`, `club_shief`, `club_number`, `club_mail`, `password`, `grant`, `active`, `org_id_for_club`, `coaches`) VALUES
(1, 'admin', '../../../views/main/img/club_img/', 'Ukraine', 'Khmelnytski', 'Roma Slobodeniuk', '380673800836', 'romsl@i.ua', '21232f297a57a5a743894a0e4a801fc3', 4, 1, 6, ''),
(2, 'LivLegend', '../../../views/main/img/club_img/', 'Ukraine', 'Khmelnytski', 'Гена', '48692600399', 'gena@mail.ua', 'f2f61c2ab367c3a99c9ec7306f222c7f', 4, 1, 6, ''),
(3, 'YoungLife', '../../../views/main/img/club_img/frontenddeveloper.jpg', 'dwfesgrthfyg', 'пквреноплгдш', 'qwertuki', '156325', 'Mail@MAIL.Mail', '143ded654a348786b74aef170ab4dcb5', 1, 1, 5, ''),
(35, 'Bogdan', '../../../views/main/img/club_img/0AvVCq9ATJA.jpg', 'Украина', 'Хмельницкий', 'Богдан', '(097) 216-9161', 'shekel_ua@i.ua', '5191c06ddb502579bd37687c5f1893e4', 1, 1, 6, 'Дима&Саша&Petro&Sergey&Lesya&Kira&&');

-- --------------------------------------------------------

--
-- Структура таблицы `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `coach_name` varchar(255) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `coaches`
--

INSERT INTO `coaches` (`id`, `coach_name`, `club_id`) VALUES
(1, 'Петя', 2),
(2, 'Вася', 2);

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
(24, 'qqqqqqqq', 'eeeeeeeeeeeeeeeeee', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 6, 0, 0, ''),
(4, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Профі', 5, 905567, 1, ''),
(16, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Початківці', 6, 234, 0, ''),
(25, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 6, 123321, 0, '22&'),
(7, 'Хіп-хоп', 'Діти', 'Кращий виспут за думкою глядачів', 'Початківці', 1, 1333, 1, ''),
(17, 'B&B', 'Діти', 'Кращий виспут за думкою глядачів', 'Профі', 6, 0, 0, ''),
(9, 'B&B', 'Діти', 'Краща техніка виконання', 'Початківці', 1, 7222, 1, ''),
(10, 'Хіп-хоп', 'Діти', 'Краща техніка виконання', 'Профі', 1, 7867, 1, ''),
(11, 'qqqqqqqq', 'wwwwwwwwwwwww', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 5, 0, 3, ''),
(14, 'aaaa', 'bbbb', 'ccc', 'vvvv', 6, 12332, 4, ''),
(15, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Профі', 5, 123, 1, ''),
(18, 'B&B', 'Діти', 'Кращий виспут за думкою глядачів', 'Початківці', 6, 0, 0, ''),
(19, 'B&B', 'Діти', 'Краща техніка виконання', 'Профі', 6, 0, 0, ''),
(20, 'Бачата', 'Юніори', 'Краще соло', 'Мала ліга', 5, 0, 0, ''),
(21, 'Бачата', 'Юніори', 'Краще соло', 'Старша ліга', 5, 0, 0, ''),
(22, 'Танго', 'Юніори', 'Краща пара', 'Мала ліга', 5, 0, 0, ''),
(23, 'Танго', 'Юніори', 'Краща пара', 'Старша ліга', 5, 0, 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `dance_groups`
--

CREATE TABLE `dance_groups` (
  `id` int(11) NOT NULL,
  `dance_group_name` varchar(255) NOT NULL,
  `d_program` text NOT NULL,
  `d_age_category` text NOT NULL,
  `d_nomination` text NOT NULL,
  `d_league` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dance_groups`
--

INSERT INTO `dance_groups` (`id`, `dance_group_name`, `d_program`, `d_age_category`, `d_nomination`, `d_league`) VALUES
(1, 'Сучасні танці', 'a:2:{s:6:"Хіп";a:0:{}s:3:"B&B";a:0:{}}', 'a:2:{s:8:"Діти";a:2:{s:25:"age-category-rule-age-min";s:4:"2005";s:25:"age-category-rule-age-max";s:4:"2006";}s:14:"Дорослі";a:2:{s:25:"age-category-rule-age-min";s:4:"1995";s:25:"age-category-rule-age-max";s:4:"1997";}}', 'a:2:{s:44:"Краща техніка виконання";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"2";}s:60:"Кращий виспут за думкою глядачів";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"3";}}', 'a:2:{s:10:"Профі";a:1:{s:31:"league-rule-participation-years";s:2:"15";}s:20:"Початківці";a:1:{s:31:"league-rule-participation-years";s:1:"2";}}'),
(3, 'Programas', 'a:1:{s:17:"new dance program";a:0:{}}', 'a:2:{s:13:"wwwwwwwwwwwww";a:2:{s:25:"age-category-rule-age-min";s:8:"11111111";s:25:"age-category-rule-age-max";s:9:"222222222";}s:18:"eeeeeeeeeeeeeeeeee";a:2:{s:25:"age-category-rule-age-min";s:7:"3333333";s:25:"age-category-rule-age-max";s:8:"44444444";}}', 'a:1:{s:20:"rrrrrrrrrrrrrrrrrrrr";a:1:{s:39:"nomination-rule-participants-number-min";s:8:"55555555";}}', 'a:1:{s:17:"ttttttttttttttttt";a:1:{s:31:"league-rule-participation-years";s:14:"66666666666666";}}');

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
  `event_skutiner` varchar(255) NOT NULL,
  `org_id_for_event` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_status`, `event_start`, `event_end`, `event_city`, `event_country`, `event_referee`, `event_skutiner`, `org_id_for_event`) VALUES
(1, 'First Club', '../../../views/main/img/event_img/111.jpg', 'Enable', '2000-12-12', '2001-02-02', 'Lviv', 'Ukraine', 'Bodya', 'Yana', 5),
(15, 'wdafesgrdht', '../../../views/main/img/event_img/te_2Qu4gjys.jpg', 'dwafegrhtjy', '0000-00-00', '0000-00-00', 'szfdgfhgh', 'fszgdhfng', 'szvdxbfngmh', 'ascdvfgnh', 5),
(16, 'qwertyqqqqq', '../../../views/main/img/event_img/', 'weqwrqw', '0000-00-00', '0000-00-00', 'eqweqwe', 'qweqweqwe', 'qweqweqwe', 'qweqweqeq', 5),
(17, 'wdfegrhtfrgsrdh', '../../../views/main/img/event_img/', 'dafesgrdhtfgaesrhd', '0000-00-00', '0000-00-00', 'fsdfbsadgfb', 'dvfgbfdfzdvsbfdfd', 'fsfdvfbddsvfdfsf', 'fadsgfdfngfgdsf', 6),
(18, 'Bagdashachka', '../../../views/main/img/event_img/backenddeveloper.jpg', 'qwertyuiop[', '0000-00-00', '0000-00-00', 'dfsgnmjh,', 'svdfbgn', 'vxfbgcnh', 'acsvdxfbcgn hmbj', 6),
(19, 'sdsfsdfs', '../../../views/main/img/event_img/222.jpg', 'вфцвфв', '0000-00-00', '0000-00-00', 'уцауыкпвиеатрм и', 'ымвчиасптмрьи оть', 'ыавпатоьрлтб', 'уапкреньпгбршоюлд.', 6),
(20, 'aaaa', '../../../views/main/img/event_img/', 'stat', '0000-00-00', '0000-00-00', 'kiev', 'ukrain', 'referee', 'skrutiner', 6),
(21, 'Our event', '../../../views/main/img/event_img/2762.jpg', 'scrum', '2017-12-06', '2017-12-07', 'Starling city', 'USA', 'Armenin', 'pimp', 6),
(22, 'Our event', '../../../views/main/img/event_img/2762.jpg', 'scrum', '2017-12-06', '2017-12-07', 'Starling city', 'USA', 'Armenin', 'pimp', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_abbreviation` varchar(255) NOT NULL,
  `org_head_fio` varchar(255) NOT NULL,
  `org_city` varchar(255) NOT NULL,
  `org_country` varchar(255) NOT NULL,
  `org_phone` bigint(20) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pic_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_abbreviation`, `org_head_fio`, `org_city`, `org_country`, `org_phone`, `org_email`, `org_pic_path`) VALUES
(1, 'First Organization', 'FOF', 'Head of the first organizations', 'Kiev', 'Ukraine', 4835554447112, 'first@gmail.com', 'views\\main\\img\\org_image\\Dancing-300x300.jpg'),
(3, 'Julia Roberts Organization', 'JROrg', 'Julia Roberts', 'San-Francisko', 'USA', 11111111111111, 'juli_rob@gmail.com', 'views/main/img/org_image/Julia-Roberts-150x150.jpg'),
(4, 'Оля Корпорейшен', 'ОК', 'Гордова Ольгаadsf', 'Нежин', 'Украина', 51551831, 'olia@gmailcom', 'views/main/img/org_image/Olia.jpg'),
(5, 'Sixth Organization', 'SEX', 'Avral', 'New York city', 'USA', 2147483647, 'org_6_six@emali.non', 'views/main/img/org_image/sixth_org_img.jpg'),
(6, 'My own dance organization', 'MOD', 'Roman', 'Kmelnytski', 'Ukraine', 3806735529, 'roma@i.ua', 'views/main/img/org_image/2016-11-08_16-24-15.jpg'),
(8, 'ldfkasj dkljfa ', 'dklasjf', 'Thouk', 'kdljasfklj', 'dfasklfjkl;', 8937489372894, 'idsahfi@djjkh.com', 'views/main/img/org_image/george.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `third_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participant`
--

INSERT INTO `participant` (`id_participant`, `first_name`, `second_name`, `third_name`, `birth_date`, `club_id`) VALUES
(1, 'Bogdan', 'Ryba', 'Oleks', '1998-02-11', 3),
(2, 'Bogdan', 'Ryba', 'Oleks', '1998-02-11', 3),
(3, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(4, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(5, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(6, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(7, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(8, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(9, 'Hello!', 'Boda', 'Lol', '1999-12-02', 3),
(10, 'Hello!', 'Ryba', 'Oleks', '1998-02-11', 3),
(11, 'Hello!', 'Ryba', 'Oleks', '1998-02-11', 3),
(12, 'Hello!', 'Boda', 'Oleks', '1998-02-11', 3),
(13, 'Hello!', 'Boda', 'Oleks', '1998-02-11', 0),
(14, 'Bogdan', 'Rybchynskiy', 'Oleksandrovych', '1998-04-24', 0),
(27, 'Hello!', 'Ryba', 'Oleks', '1999-12-02', 0),
(28, 'Hello!', 'Ryba', '123456111111', '1998-02-11', 0),
(29, 'Bogdan1111', 'Ryba1111', 'Oleks1111', '1998-02-11', 0),
(30, 'You', 'Not', 'Give up', '1999-12-02', 0),
(31, 'Hello!', 'Ryba', 'Lol', '1998-02-11', 0),
(32, 'Bogdan', 'Boda', 'Oleksandrovych1111111111111111111', '1998-02-11', 3),
(33, 'Eeeee', 'LLL', 'jnfrjlngjkn', '1999-12-02', 12),
(34, 'Last Test', 'Boda', 'Lol', '1998-02-11', 3),
(35, 'Andrey', 'Slotvinskiy', 'Vv', '1998-08-01', 0),
(36, 'Roman', 'SLL', 'YAAA', '0000-00-00', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category_parameters`
--
ALTER TABLE `category_parameters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_name` (`club_name`);

--
-- Индексы таблицы `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `dance_categories`
--
ALTER TABLE `dance_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dance_groups`
--
ALTER TABLE `dance_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_name` (`org_name`);

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_parameters`
--
ALTER TABLE `category_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT для таблицы `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `dance_categories`
--
ALTER TABLE `dance_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `dance_groups`
--
ALTER TABLE `dance_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
