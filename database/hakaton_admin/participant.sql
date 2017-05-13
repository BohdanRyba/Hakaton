-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 13 2017 г., 02:59
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
-- Структура таблицы `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `third_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `club_id` int(11) NOT NULL,
  `coach` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participant`
--

INSERT INTO `participant` (`id_participant`, `first_name`, `second_name`, `third_name`, `birth_date`, `club_id`, `coach`) VALUES
(1, 'Bogdan', 'Ryba', 'Oleks', '1998-02-11', 2, 'superman'),
(2, 'Bogdan', 'Ryba', 'Oleks', '1998-02-11', 2, 'supergirl'),
(3, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'deadpool'),
(4, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'me'),
(5, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'dude'),
(6, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'trainer'),
(7, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'fucker'),
(8, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'okay'),
(9, 'Hello!', 'Boda', 'Lol', '1999-12-02', 2, 'Olia'),
(10, 'Hello!', 'Ryba', 'Oleks', '1998-02-11', 2, 'Geralt'),
(11, 'Hello!', 'Ryba', 'Oleks', '1998-02-11', 2, 'Francisko'),
(12, 'Hello!', 'Boda', 'Oleks', '1998-02-11', 2, 'Fedelini'),
(13, 'Hello!', 'Boda', 'Oleks', '1998-02-11', 2, 'Orest'),
(14, 'Bogdan', 'Rybchynskiy', 'Oleksandrovych', '1998-04-24', 2, 'Pikachu'),
(27, 'Hello!', 'Ryba', 'Oleks', '1999-12-02', 2, 'Seryj'),
(28, 'Hello!', 'Ryba', '123456111111', '1998-02-11', 2, 'Sirok'),
(29, 'Bogdan1111', 'Ryba1111', 'Oleks1111', '1998-02-11', 2, 'Morok'),
(30, 'You', 'Not', 'Give up', '1999-12-02', 2, 'Urva'),
(31, 'Hello!', 'Ryba', 'Lol', '1998-02-11', 2, 'Grisha'),
(32, 'Bogdan', 'Boda', 'Oleksandrovych1111111111111111111', '1998-02-11', 2, 'Saniok'),
(33, 'Eeeee', 'LLL', 'jnfrjlngjkn', '1999-12-02', 2, 'Fucio'),
(34, 'Last Test', 'Boda', 'Lol', '1998-02-11', 2, 'Cibab'),
(35, 'Andrey', 'Slotvinskiy', 'Vv', '1998-08-01', 2, 'Oleg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
