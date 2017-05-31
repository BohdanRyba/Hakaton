-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 31 2017 р., 18:36
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
-- Структура таблиці `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_abbreviation` varchar(255) NOT NULL,
  `org_head_fio` varchar(255) NOT NULL,
  `org_city` varchar(255) NOT NULL,
  `org_country` varchar(255) NOT NULL,
  `org_phone` varchar(25) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pic_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_abbreviation`, `org_head_fio`, `org_city`, `org_country`, `org_phone`, `org_email`, `org_pic_path`) VALUES
(1, 'DreamTeam', 'DT\'s', 'I\'m not the one, bu we all are', 'Khmelnytskyi', 'Ukraine', '+38 (097) 097-97-97', 'dt@gmail.com', 'views/main/img/org_image/dreamTeam.jpg'),
(3, 'Test', 'TST', 'Romario', 'Grun', 'Neverlend', '+380671234567', 'test@i.ua', 'views/main/img/org_image/IMG_8387.JPG');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_name` (`org_name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
