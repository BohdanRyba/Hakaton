-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
<<<<<<< HEAD
-- Время создания: Окт 29 2016 г., 19:37
=======
-- Время создания: Окт 28 2016 г., 08:42
<<<<<<< HEAD
>>>>>>> origin/AgurSoft
=======
>>>>>>> 17191729b31ed5dce03a90a18560cd06fdbb9b9c
>>>>>>> 2abac4d8ced2b34ae352a4aac999b08b12289ab6
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
<<<<<<< HEAD
(1, 'First Organization', 'FO', 'Head of the first organizations', 'Kiev', 'Ukraine', 2147483647, 'first@gmail.com', 'views\\main\\img\\org_image\\Dancing-300x300.jpg'),
(2, 'Second Organization''s name', 'SO', 'Michael Jackson', 'Rio-de-Janejro', 'Brasil', 2147483647, 'michael_jackson@gmail.com', 'views\\main\\img\\org_image\\Blues-Dancing-300x300.jpg'),
(3, 'Third Organization', 'THO', 'Emilia Clarck', 'City of the Dragon', 'Mifia', 2147483647, 'dragons@gmail.com', 'views/main/img/org_image/pic.jpg'),
(4, 'Julia Roberts Organization', 'JROrg', 'Julia Roberts', 'San-Francisko', 'USA', 77747483647, 'juli_rob@gmail.com', 'views/main/img/org_image/Julia-Roberts-150x150.jpg'),
(5, 'Оля Корпорейшен', 'ОК', 'Гордова Ольгаadsf', 'Нежин', 'Украина', 515, 'olia@gmailcom', 'views/main/img/org_image/Olia.jpg'),
(6, 'Sixth Organization', 'SEX', 'Avral', 'New York city', 'USA', 2147483647, 'org_6_six@emali.non', 'views/main/img/org_image/sixth_org_img.jpg'),
(7, 'Mime Organization', 'MIM', 'Teodor Crack', 'Parisss', 'Francer', 2147483647, 'mime@gmddk.com', 'views/main/img/org_image/Mime-150x150.jpg'),
(9, 'New ORG', 'NOW', 'Admiral', 'Town', 'Country', 815313135, 'toekk@jjj.com', 'views/main/img/org_image/new150x150.jpg'),
(10, 'SAAAAAAAAAAAasdf', 'sdfadsf', 'dasfds', 'sadf', 'sdaf', 231651, 'afasdf@df.comdsf', 'views/main/img/org_image/WEZPMsB6iYQ.jpg');
=======
(1, 'First Organization', 'FO', 'Head of the first organization', 'Kiev', 'Ukraine', 804424735265, 'first@gmail.com', 'views\\main\\img\\org_image\\Dancing-300x300.jpg'),
(2, 'Second Organization''s name', 'SO', 'Michael Jackson', 'Rio-de-Janejro', 'Brasil', 38067382258, 'michael_jackson@gmail.com', 'views\\main\\img\\org_image\\Blues-Dancing-300x300.jpg'),
(3, 'Third Organization', 'THO', 'Emilia Clarck', 'City of the Dragon', 'Mifia', 80256485232, 'dragons@gmail.com', 'views/main/img/org_image/pic.jpg'),
(4, 'Julia Roberts Organization', 'JRO', 'Julia Roberts', 'San-Francisko', 'USA', 448852135135, 'juli_rob@gmail.com', 'views/main/img/org_image/Julia-Roberts-150x150.jpg'),
(5, 'Оля Корпорейшен', 'ОК', 'Гордова Ольга', 'Нежин', 'Украина', 80654735535, 'olia@gmail.com', 'views/main/img/org_image/Olia.jpg'),
(6, 'Sixth Organization', 'SEX', 'Avral', 'New York city', 'USA', 4845616516186, 'org_6_six@emali.non', 'views/main/img/org_image/sixth_org_img.jpg'),
(7, 'Mime Organization', 'MO', 'Teodor Crack', 'Paris', 'France', 2535516816, 'mime@gmk.com', 'views/main/img/org_image/Mime-150x150.jpg');
<<<<<<< HEAD
>>>>>>> origin/AgurSoft
=======
>>>>>>> 17191729b31ed5dce03a90a18560cd06fdbb9b9c
>>>>>>> 2abac4d8ced2b34ae352a4aac999b08b12289ab6

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
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
<<<<<<< HEAD
>>>>>>> origin/AgurSoft
=======
>>>>>>> 17191729b31ed5dce03a90a18560cd06fdbb9b9c
>>>>>>> 2abac4d8ced2b34ae352a4aac999b08b12289ab6
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
