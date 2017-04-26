-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2017 г., 10:21
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
(35, 'Andrey', 'Slotvinskiy', 'Vv', '1998-08-01', 0);

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
