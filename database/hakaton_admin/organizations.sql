-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2016 г., 16:01
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
(1, 'First Organization', 'FO', 'Head of the first organizations', 'Kiev', 'Ukraine', 4835554447111, 'first@gmail.com', 'views\\main\\img\\org_image\\Dancing-300x300.jpg'),
(2, 'Third Organization', 'THO', 'Emilia Clarck', 'City of the Dragon', 'Mifia', 2147483647, 'dragons@gmail.com', 'views/main/img/org_image/pic.jpg'),
(3, 'Julia Roberts Organization', 'JROrg', 'Julia Roberts', 'San-Francisko', 'USA', 77747483647, 'juli_rob@gmail.com', 'views/main/img/org_image/Julia-Roberts-150x150.jpg'),
(4, 'Оля Корпорейшен', 'ОК', 'Гордова Ольгаadsf', 'Нежин', 'Украина', 51551831, 'olia@gmailcom', 'views/main/img/org_image/Olia.jpg'),
(5, 'Sixth Organization', 'SEX', 'Avral', 'New York city', 'USA', 2147483647, 'org_6_six@emali.non', 'views/main/img/org_image/sixth_org_img.jpg'),
(6, 'Mime Organization', 'MIM', 'Teodor Crack', 'Parisss', 'Francer', 2147483647, 'mime@gmddk.com', 'views/main/img/org_image/Mime-150x150.jpg'),
(7, 'Indian''s dances', 'IDNS', 'Harbit Tin', 'Deli', 'Indiya', 780256485232, 'indi@gmai.com', 'views/main/img/org_image/161002-indian-movies.jpg'),
(8, 'Blues-Dancing', 'BD', 'Mario la Belle', 'Rome', 'Italy', 5468465468, 'blues_dances@gmail.com', 'views/main/img/org_image/Blues-Dancing-300x300.jpg'),
(9, 'Club Music Dances', 'CMD', 'Ron Dig', 'New Solt', 'Canada', 77777888886, 'clubik@gmailik.com', 'views/main/img/org_image/new150x150.jpg'),
(10, 'Moon dances', 'MDCS', 'Hulio Vendorio', 'Moonlight-city', 'Moonplace', 99999944445, 'dances_in_the_moon@i.ua', 'views/main/img/org_image/vPWn2BYuQ3Q.jpg'),
(11, 'Poetry dances', 'POETD', 'Agata Milina', 'Sunset-town', 'Geodoria', 8153518543, 'sunny_place@i.com', 'views/main/img/org_image/WEZPMsB6iYQ.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_name` (`org_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
