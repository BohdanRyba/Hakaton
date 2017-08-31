-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 31 2017 г., 21:31
-- Версия сервера: 5.7.19-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

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
(1, 'a:2:{i:0;a:2:{s:4:"name";s:15:"Dance program 1";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:7:"Dance 2";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Age category 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Nomination 1";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:8:"League 1";s:5:"value";s:2:"on";}}', 2, 1),
(2, 'a:1:{i:0;a:2:{s:4:"name";s:8:"qqqqqqqq";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:13:"wwwwwwwwwwwww";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:20:"rrrrrrrrrrrrrrrrrrrr";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:17:"ttttttttttttttttt";s:5:"value";s:2:"on";}}', 3, 1),
(3, 'a:2:{i:0;a:2:{s:4:"name";s:13:"Хіп-хоп";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:3:"B&B";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:14:"Дорослі";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:44:"Краща техніка виконання";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:60:"Кращий виспут за думкою глядачів";s:5:"value";s:2:"on";}}', 'a:2:{i:0;a:2:{s:4:"name";s:10:"Профі";s:5:"value";s:2:"on";}i:1;a:2:{s:4:"name";s:20:"Початківці";s:5:"value";s:2:"on";}}', 1, 1),
(5, 'a:1:{i:0;a:2:{s:4:"name";s:12:"Бачата";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:24:"Напівдорослі";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:29:"Лучшие движения";s:5:"value";s:2:"on";}}', 'a:1:{i:0;a:2:{s:4:"name";s:12:"Высшая";s:5:"value";s:2:"on";}}', 5, 1);

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
  `club_number` varchar(20) NOT NULL,
  `club_mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `grant` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `org_id_for_club` int(11) NOT NULL,
  `coaches` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clubs`
--

INSERT INTO `clubs` (`id`, `club_name`, `club_image`, `club_country`, `club_city`, `club_shief`, `club_number`, `club_mail`, `password`, `grant`, `active`, `org_id_for_club`, `coaches`) VALUES
(1, 'Wither Club', 'views/main/img/club_img/roma.jpg', 'Ukraine', 'Khmelnytski', 'Roma Slobodeniuk', '380673800836', 'romsl@i.ua', '21232f297a57a5a743894a0e4a801fc3', 4, 1, 1, ''),
(2, 'LivLegend', 'views/main/img/club_img/gena.jpg', 'Украина', 'Хмельницкий', 'Геннадий Федосов', '380671234567', 'gena@i.ua', 'e0a7bf6b3b6eb370828d29888d4805bc', 4, 1, 1, 'Дима&Саша&Petro&Sergey&Lesya&Kira'),
(3, 'New club test', 'views/main/img/club_img/IMG_7846.JPG', 'Good mordor', 'Frozen', 'Merik', '0971123344', 'rio@gmail.com', '99059631864310dd1421a6a432aa2c7c', 1, 1, 1, 'Turok'),
(4, 'My new Club', 'views/main/img/club_img/men_summer_pants-1.jpg', 'Uganda', 'Golden Gates', 'Moa', '(098) 897-1212', 'title@gmail.com', 'e5fc07ae8cbbda0273495b50ff9b057e', 1, 1, 1, 'Tyldor&Rabok'),
(5, 'Club', 'views/main/img/club_img/IMG_8386.JPG', 'Fortuna', 'Luck', 'Griobani luckery', '(067) 321-0011', 'clubdance@i.ua', 'a25e9b5b9b704b13af47bc17630e7a78', 1, 1, 0, 'Trener&Trener one');

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
  `is_full` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dance_categories`
--

INSERT INTO `dance_categories` (`id`, `d_c_program`, `d_c_age_category`, `d_c_nomination`, `d_c_league`, `org_id`, `extra_id`, `id_dance_group`, `is_full`) VALUES
(1, 'Dance program 1', 'Age category 1', 'Nomination 1', 'League 1', 1, 111, 0, 1),
(2, 'Dance 2', 'Age category 1', 'Nomination 1', 'League 1', 1, 222, 0, 1),
(3, 'qqqqqqqq', 'wwwwwwwwwwwww', 'rrrrrrrrrrrrrrrrrrrr', 'ttttttttttttttttt', 1, 333, 0, 1),
(4, 'Хіп-хоп', 'Дорослі', 'Краща техніка виконання', 'Профі', 1, 444, 0, 1),
(5, 'Хіп-хоп', 'Дорослі', 'Краща техніка виконання', 'Початківці', 1, 555, 0, 1),
(6, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Профі', 1, 666, 0, 0),
(7, 'B&B', 'Дорослі', 'Краща техніка виконання', 'Початківці', 1, 777, 0, 1),
(8, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Профі', 1, 888, 0, 0),
(9, 'Хіп-хоп', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Початківці', 1, 999, 0, 1),
(10, 'Бачата', 'Напівдорослі', 'Лучшие движения', 'Высшая', 1, 77770, 0, 1),
(11, 'B&B', 'Дорослі', 'Кращий виспут за думкою глядачів', 'Початківці', 1, 9099, 0, 0);

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
(1, 'Сучасні танці', 'a:2:{s:13:"Хіп-хоп";a:0:{}s:3:"B&B";a:0:{}}', 'a:2:{s:8:"Діти";a:2:{s:25:"age-category-rule-age-min";s:4:"2005";s:25:"age-category-rule-age-max";s:4:"2006";}s:14:"Дорослі";a:2:{s:25:"age-category-rule-age-min";s:4:"1995";s:25:"age-category-rule-age-max";s:4:"1997";}}', 'a:2:{s:44:"Краща техніка виконання";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"2";}s:60:"Кращий виспут за думкою глядачів";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"3";}}', 'a:2:{s:10:"Профі";a:1:{s:31:"league-rule-participation-years";s:2:"15";}s:20:"Початківці";a:1:{s:31:"league-rule-participation-years";s:1:"2";}}'),
(2, 'New Dance Program', 'a:2:{s:15:"Dance program 1";a:0:{}s:7:"Dance 2";a:0:{}}', 'a:1:{s:14:"Age category 1";a:2:{s:25:"age-category-rule-age-min";s:4:"1123";s:25:"age-category-rule-age-max";s:4:"1125";}}', 'a:1:{s:12:"Nomination 1";a:1:{s:39:"nomination-rule-participants-number-min";s:2:"23";}}', 'a:1:{s:8:"League 1";a:1:{s:31:"league-rule-participation-years";s:1:"5";}}'),
(3, 'Programma', 'a:1:{s:8:"qqqqqqqq";a:0:{}}', 'a:2:{s:13:"wwwwwwwwwwwww";a:2:{s:25:"age-category-rule-age-min";s:8:"11111111";s:25:"age-category-rule-age-max";s:9:"222222222";}s:18:"eeeeeeeeeeeeeeeeee";a:2:{s:25:"age-category-rule-age-min";s:7:"3333333";s:25:"age-category-rule-age-max";s:8:"44444444";}}', 'a:1:{s:20:"rrrrrrrrrrrrrrrrrrrr";a:1:{s:39:"nomination-rule-participants-number-min";s:8:"55555555";}}', 'a:1:{s:17:"ttttttttttttttttt";a:1:{s:31:"league-rule-participation-years";s:14:"66666666666666";}}'),
(4, 'GROUP DANCE', 'a:1:{s:4:"asdf";a:0:{}}', 'a:1:{s:9:"kjhafklsd";a:2:{s:25:"age-category-rule-age-min";s:3:"212";s:25:"age-category-rule-age-max";s:3:"123";}}', 'a:1:{s:5:"sklfj";a:1:{s:39:"nomination-rule-participants-number-min";s:2:"55";}}', 'a:1:{s:7:"dsklfjl";a:1:{s:31:"league-rule-participation-years";s:3:"221";}}'),
(5, 'Латиноамериканские танцы', 'a:1:{s:12:"Бачата";a:0:{}}', 'a:1:{s:24:"Напівдорослі";a:2:{s:25:"age-category-rule-age-min";s:2:"16";s:25:"age-category-rule-age-max";s:2:"20";}}', 'a:1:{s:29:"Лучшие движения";a:1:{s:39:"nomination-rule-participants-number-min";s:1:"2";}}', 'a:1:{s:12:"Высшая";a:1:{s:31:"league-rule-participation-years";s:1:"4";}}');

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `event_id`) VALUES
(3, 'Нищеброды', 1),
(4, 'Второе отделение', 1),
(5, 'Нормас отделение', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `departments_categories`
--

CREATE TABLE `departments_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `sort_order` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `departments_categories`
--

INSERT INTO `departments_categories` (`id`, `department_id`, `category_id`, `sort_order`) VALUES
(1, 3, 1, 0),
(12, 4, 4, 0),
(18, 3, 2, 0),
(4, 4, 5, 0),
(16, 5, 3, 0),
(17, 5, 9, 0),
(7, 5, 7, 0),
(8, 5, 10, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_image`, `event_status`, `event_start`, `event_end`, `event_city`, `event_country`, `event_referee`, `event_skutiner`, `org_id_for_event`) VALUES
(1, 'Our event 1', 'views/main/img/event_img/dances.jpg', 'Regional', '2017-06-07', '2017-06-08', 'Khmelnytskyi', 'Ukraine', 'Gordon Bayron', 'Suhishvili', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `events_categories`
--

CREATE TABLE `events_categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `events_categories`
--

INSERT INTO `events_categories` (`id`, `event_id`, `category_id`) VALUES
(16, 1, 1),
(29, 1, 5),
(23, 1, 10),
(6, 2, 3),
(7, 2, 5),
(30, 1, 9),
(21, 1, 6),
(24, 1, 2),
(26, 1, 3),
(27, 1, 4),
(31, 1, 8),
(32, 1, 7),
(33, 1, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `short_content` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(64) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `short_content`, `content`, `author_name`, `preview`, `type`) VALUES
(1, 'Swimming with dolphins may be banned', '2016-08-31', 'Authorities in Hawaii are proposing a ban on the popular tourist activity of swimming with dolphins off the Hawaiian coast.', 'CONTENT of article 1', 'David', '../../views/main/img/news/1.jpg', 'NewsPublication'),
(2, 'Colombia and FARC rebels sign peace deal', '2016-08-28', 'Colombias government signed a peace deal with the rebel group FARC. The deal ends 52 years of fighting.', 'CONTENT of article 2', 'April', '../../views/main/img/news/2.jpg', 'NewsPublication'),
(3, 'Study shows there are two divorce seasons', '2016-08-25', 'Couples might want to put a little extra effort into their marriage just before March and August every year.', 'CONTENT of article 3', 'George', '../../views/main/img/news/3.jpg', 'ArticlePublication'),
(4, 'What the 5,300-year-old Iceman wore', '2016-08-22', 'Scientists studied the pieces of material that were on the body of a man who died in Europe 5,300 years ago.', 'CONTENT of article 4', 'Mikel', '../../views/main/img/news/4.jpg', 'ArticlePublication'),
(5, 'July was hottest month in recorded history', '2016-08-19', 'It is official – July was the hottest month on Earth since scientists started recording the planets temperatures.', 'CONTENT of article 5', 'Sonia', '../../views/main/img/news/5.jpg', 'PhotoReportPublication'),
(6, 'Slain black youth\'s BB gun called \'almost identical\' to real weapon', '2016-09-18', 'COLUMBUS, Ohio (Reuters) - The mayor of Columbus, Ohio, said on Friday that the air pistol brandished at police by a black, 13-year-old boy as he was shot dead by a white officer this week was nearly indistinguishable from weapons carried by members of th', 'COLUMBUS, Ohio (Reuters) - The mayor of Columbus, Ohio, said on Friday that the air pistol brandished at police by a black, 13-year-old boy as he was shot dead by a white officer this week was nearly indistinguishable from weapons carried by members of the city\'s police force.  Mayor Andrew Ginther appeared with Police Chief Kim Jacobs for a tense community meeting of more than 200 people, most of them African-American, who were invited to ask questions of city officials at the church gathering for just over an hour.  But Ginther and Jacobs, who are both white, along with the city\'s public safety director, Ned Pettus, who is black, had few new details to offer about circumstances leading to the fatal shooting on Wednesday of Tyre King.  The officials appealed for patience on the part of the public while investigations of the incident continue.', 'By Tyler Behm', '../../views/main/img/news/6.jpg', 'article'),
(7, 'Ohio police officers indicted in shooting death and beating case', '2016-09-17', 'CLEVELAND (Reuters) - A Cleveland police officer was indicted for negligent homicide in the shooting death of an unarmed black man on Friday and two former officers in nearby East Cleveland were indicted for kidnapping and assault for beating a black man ', 'CLEVELAND (Reuters) - A Cleveland police officer was indicted for negligent homicide in the shooting death of an unarmed black man on Friday and two former officers in nearby East Cleveland were indicted for kidnapping and assault for beating a black man who was under arrest.\r\n\r\nThe indictments by a Cuyahoga County grand jury came amid increased scrutiny of the use of force by police in Ohio, where an officer in Columbus this week shot and killed a thirteen-year-old who was carrying a pellet gun.\r\n\r\nIn the Cleveland case, officer Alan Buford, who is black, was indicted for misdemeanor negligent homicide in the 2015 death of unarmed-breaking and entering suspect Brandon Jones, 18, Cuyahoga County Prosecutor Timothy J. McGinty said in a statement Friday.', 'By Kim Palmer', '../../views/main/img/news/7.jpg', 'article'),
(8, 'Florida man found guilty of attempted murder of George Zimmerman: reports', '2016-09-19', 'ORLANDO, Fla. (Reuters) - A Florida man was found guilty on Friday of attempted murder for shooting at George Zimmerman during a roadside confrontation ', 'ORLANDO, Fla. (Reuters) - A Florida man was found guilty on Friday of attempted murder for shooting at George Zimmerman during a roadside confrontation with the ex-neighborhood watch captain widely known for killing unarmed black teenager Trayvon Martin, local media reported.\r\nMatthew Apperson, 37, who according to prosecutors has a history of mental illness, was convicted in a jury trial in the Orlando suburb of Sanford, Florida, according to accounts by the Orlando Sentinel newspaper and 24-hour Orlando television news channel News 13.\r\nA Sanford jury in 2013 acquitted Zimmerman, 32, of murder in the fatal 2012 shooting of 17-year-old Martin, a case that helped spark the Black Lives Matter movement and overshadowed both Apperson\'s prosecution and his defense.', 'Barbara Liston', '../../views/main/img/news/8.jpg', 'article'),
(9, 'Breaking news', '2016-09-20', 'The wolf has gone crazy!', 'This one wolf is really out of his mind! He has said wooooooooooo to the moon!', 'Roma Slobodeniuk', '../../views/main/img/news/vPWn2BYuQ3Q.jpg', 'article'),
(10, 'Экстренные новости!', '2016-09-21', 'Ассассин убивает Тамплиеров!', 'Ассассин убил Тамплиера прям среди бегого дня на площади!', 'Roma Slobodeniuk', '../../views/main/img/news/2762.jpg', 'article'),
(11, 'Новости на западе!', '2016-09-21', 'Они свободно разгуливают улицами городов...', 'Пик влияния хашшашинов приходится на конец XII века. Это связано с возвышением государства турок-мамлюков во главе с султаном Юсуфом ибн Айюбом по прозвищу «Салах ад-Дин»[16]. С лёгкостью захватив прогнивший Фатимидский халифат, с которым у крестоносцев был заключён длительный мирный договор, Салах ад-Дин объявил себя единственным истинным защитником ислама. Отныне ближневосточным христианским государствам крестоносцев угрожала опасность с юга. Длительные переговоры с Салах ад-Дином, который видел своё предназначение в том, чтобы изгнать христиан с мусульманского Востока, не привели к существенным результатам. С 1171 года для крестоносцев начинается тяжелейший период войн с Салах ад-Дином. На этот раз над Иерусалимом, оплотом христианства на Ближнем Востоке, нависла неминуемая угроза…', 'Roma Slobodeniuk', '../../views/main/img/news/243763.jpg', 'article'),
(12, 'Наконец-то дождались!', '2016-09-21', 'Госслужащие получили зарплату !', 'Госслужащие получили крошечную зарплату!', 'Roma Slobodeniuk', '../../views/main/img/news/10-dollary-makro-oboi-1366x768.jpg', 'article'),
(13, 'Pakistan cinemas ban Indian movies', '2016-10-03', 'Pakistan\'s major cinemas have banned Indian movies in Pakistan\'s biggest cities.', 'India and Pakistan do not have very good relations at the moment. The two countries have argued for many years over where the borders should be in Kashmir. There is also the possibility that India could limit the amount of water Pakistan gets from the Indus River. The latest disagreement is over movies and actors. Pakistan\'s major cinemas have banned Indian movies in Pakistan\'s biggest cities - Lahore, Karachi and Islamabad. The cinema owners say the ban is to show support for Pakistani soldiers who are risking their lives in Kashmir. The ban comes after a group of Indian moviemakers banned Pakistani actors from working in India\'s famous Bollywood movie studios in Mumbai.', 'Roma Slobodeniuk', '../../views/main/img/news/161002-indian-movies.jpg', 'article');

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
  `org_phone` varchar(25) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pic_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`id`, `org_name`, `org_abbreviation`, `org_head_fio`, `org_city`, `org_country`, `org_phone`, `org_email`, `org_pic_path`) VALUES
(1, 'DreamTeam', 'DT', 'I\'m not the one, bu we all are', 'Khmelnytskyi', 'Ukraine', '+38 (097) 097-97-97', 'dt@gmail.com', 'views/main/img/org_image/dreamTeam.jpg');

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
(4, 'Связь с нами', '#', 'popup', 1, 2, 'connect'),
(5, 'Вход', '#', 'popup', 1, 2, 'log_animate'),
(6, 'Выход', 'out', 'without_popup', 1, 1, ''),
(10, 'Профиль', 'profile', 'without_popup', 1, 1, ''),
(9, 'Регистрация', 'home#registration_form', 'without_popup', 0, 1, ''),
(11, 'Админ панель - Организации', 'admin/organizations/page/$1', 'without_popup', 1, 4, ''),
(13, 'Добавить организацию', 'admin/organizations/org_add', NULL, 0, 0, ''),
(14, 'Танцевальные группы', 'admin/dancing_groups/dance_list', NULL, 0, 0, ''),
(15, 'Добавить группу', 'admin/dancing_groups/add_dancing_groups', NULL, 0, 0, ''),
(16, 'Настройка организации', 'admin/organizations/org_settings/$1', NULL, 0, 0, ''),
(17, 'Страница клуба', 'admin/organizations/cabinet_club/$1', NULL, 0, 0, ''),
(18, 'Выбор категорий для события', 'admin/organizations/pick_categories_for_event/$1', NULL, 0, 0, ''),
(19, 'Выбранные категории', 'admin/organizations/picked_categories_for_event/$1', NULL, 0, 0, ''),
(20, 'Регистрация участников', 'admin/option_event/reg_part_for_event/$1', NULL, 0, 0, ''),
(21, 'Настройка отделений', 'admin/organizations/create_dancing_departments/$1', NULL, 1, 0, ''),
(22, 'Программа для печати', 'admin/organizations/event_program_print/$1', NULL, 0, 0, ''),
(23, 'Программа и оценивание', 'admin/organizations/event_program/$1', NULL, 0, 0, ''),
(24, 'Судьи', 'admin/organizations/judges/$1', NULL, 0, 0, '');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(35, 'Andrey', 'Slotvinskiy', 'Vv', '1998-08-01', 2, 'Oleg'),
(36, 'The_Name', 'surname', 'third name', '1990-12-25', 3, 'Trener1'),
(37, 'Gosha', 'Tvoiu', 'Mat', '2000-11-23', 5, 'Trener ubijca'),
(38, 'Roma', 'Slobodeniuk', 'Yaroslavovych', '0000-00-00', 1, 'Trener youpta');

-- --------------------------------------------------------

--
-- Структура таблицы `rounds`
--

CREATE TABLE `rounds` (
  `id` bigint(99) UNSIGNED NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `round_type` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `is_max` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rounds`
--

INSERT INTO `rounds` (`id`, `department_id`, `category_id`, `round_type`, `sort_order`, `is_max`) VALUES
(134, 5, 9, 16, 11, 1),
(138, 5, 9, 1, 15, 0),
(133, 5, 3, 1, 10, 0),
(132, 5, 3, 2, 9, 1),
(131, 5, 7, 1, 8, 0),
(130, 5, 7, 2, 7, 0),
(47, 4, 5, 1, 5, 0),
(46, 4, 5, 2, 4, 0),
(45, 4, 5, 4, 3, 0),
(44, 4, 5, 8, 2, 0),
(43, 4, 5, 16, 1, 1),
(42, 4, 4, 1, 10, 0),
(41, 4, 4, 2, 9, 0),
(40, 4, 4, 4, 8, 0),
(39, 4, 4, 8, 7, 0),
(38, 4, 4, 16, 6, 1),
(112, 3, 2, 1, 8, 0),
(111, 3, 2, 2, 7, 0),
(110, 3, 2, 4, 6, 0),
(109, 3, 2, 8, 5, 0),
(108, 3, 2, 16, 4, 0),
(107, 3, 2, 32, 3, 1),
(106, 3, 1, 1, 2, 0),
(105, 3, 1, 2, 1, 1),
(129, 5, 7, 4, 6, 0),
(128, 5, 7, 8, 5, 0),
(127, 5, 7, 16, 4, 1),
(126, 5, 10, 1, 3, 0),
(137, 5, 9, 2, 14, 0),
(136, 5, 9, 4, 13, 0),
(135, 5, 9, 8, 12, 0),
(125, 5, 10, 2, 2, 0),
(124, 5, 10, 4, 1, 1);

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
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `departments_categories`
--
ALTER TABLE `departments_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `events_categories`
--
ALTER TABLE `events_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_content` (`short_content`);

--
-- Индексы таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `org_name` (`org_name`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id_participant`);

--
-- Индексы таблицы `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category_parameters`
--
ALTER TABLE `category_parameters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `dance_categories`
--
ALTER TABLE `dance_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `dance_groups`
--
ALTER TABLE `dance_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `departments_categories`
--
ALTER TABLE `departments_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `events_categories`
--
ALTER TABLE `events_categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` bigint(99) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
