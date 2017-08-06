-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: hakaton_admin
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category_parameters`
--

DROP TABLE IF EXISTS `category_parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c_p_programs` text NOT NULL,
  `c_p_age_categories` text NOT NULL,
  `c_p_nominations` text NOT NULL,
  `c_p_leagues` text NOT NULL,
  `id_dance_group` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_parameters`
--

LOCK TABLES `category_parameters` WRITE;
/*!40000 ALTER TABLE `category_parameters` DISABLE KEYS */;
INSERT INTO `category_parameters` VALUES (1,'a:2:{i:0;a:2:{s:4:\"name\";s:15:\"Dance program 1\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:7:\"Dance 2\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:14:\"Age category 1\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Nomination 1\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:8:\"League 1\";s:5:\"value\";s:2:\"on\";}}',2,1),(2,'a:1:{i:0;a:2:{s:4:\"name\";s:8:\"qqqqqqqq\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:13:\"wwwwwwwwwwwww\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:20:\"rrrrrrrrrrrrrrrrrrrr\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:17:\"ttttttttttttttttt\";s:5:\"value\";s:2:\"on\";}}',3,1),(3,'a:2:{i:0;a:2:{s:4:\"name\";s:13:\"Хіп-хоп\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:3:\"B&B\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:14:\"Дорослі\";s:5:\"value\";s:2:\"on\";}}','a:2:{i:0;a:2:{s:4:\"name\";s:44:\"Краща техніка виконання\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:60:\"Кращий виспут за думкою глядачів\";s:5:\"value\";s:2:\"on\";}}','a:2:{i:0;a:2:{s:4:\"name\";s:10:\"Профі\";s:5:\"value\";s:2:\"on\";}i:1;a:2:{s:4:\"name\";s:20:\"Початківці\";s:5:\"value\";s:2:\"on\";}}',1,1),(5,'a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Бачата\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:24:\"Напівдорослі\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:29:\"Лучшие движения\";s:5:\"value\";s:2:\"on\";}}','a:1:{i:0;a:2:{s:4:\"name\";s:12:\"Высшая\";s:5:\"value\";s:2:\"on\";}}',5,1);
/*!40000 ALTER TABLE `category_parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clubs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `coaches` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `club_name` (`club_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clubs`
--

LOCK TABLES `clubs` WRITE;
/*!40000 ALTER TABLE `clubs` DISABLE KEYS */;
INSERT INTO `clubs` VALUES (1,'Wither Club','views/main/img/club_img/roma.jpg','Ukraine','Khmelnytski','Roma Slobodeniuk','380673800836','romsl@i.ua','21232f297a57a5a743894a0e4a801fc3',4,1,1,''),(2,'LivLegend','views/main/img/club_img/gena.jpg','Украина','Хмельницкий','Геннадий Федосов','380671234567','gena@i.ua','e0a7bf6b3b6eb370828d29888d4805bc',4,1,1,'Дима&Саша&Petro&Sergey&Lesya&Kira'),(3,'New club test','views/main/img/club_img/IMG_7846.JPG','Good mordor','Frozen','Merik','0971123344','rio@gmail.com','99059631864310dd1421a6a432aa2c7c',1,1,1,'Turok'),(4,'My new Club','views/main/img/club_img/men_summer_pants-1.jpg','Uganda','Golden Gates','Moa','(098) 897-1212','title@gmail.com','e5fc07ae8cbbda0273495b50ff9b057e',1,1,1,'Tyldor&Rabok'),(5,'Club','views/main/img/club_img/IMG_8386.JPG','Fortuna','Luck','Griobani luckery','(067) 321-0011','clubdance@i.ua','a25e9b5b9b704b13af47bc17630e7a78',1,1,0,'Trener&Trener one');
/*!40000 ALTER TABLE `clubs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coach_name` varchar(255) NOT NULL,
  `club_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
INSERT INTO `coaches` VALUES (1,'Петя',2),(2,'Вася',2);
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dance_categories`
--

DROP TABLE IF EXISTS `dance_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dance_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d_c_program` varchar(255) NOT NULL,
  `d_c_age_category` varchar(255) NOT NULL,
  `d_c_nomination` varchar(255) NOT NULL,
  `d_c_league` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `id_dance_group` int(11) NOT NULL,
  `is_full` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dance_categories`
--

LOCK TABLES `dance_categories` WRITE;
/*!40000 ALTER TABLE `dance_categories` DISABLE KEYS */;
INSERT INTO `dance_categories` VALUES (1,'Dance program 1','Age category 1','Nomination 1','League 1',1,111,0,1),(2,'Dance 2','Age category 1','Nomination 1','League 1',1,222,0,1),(3,'qqqqqqqq','wwwwwwwwwwwww','rrrrrrrrrrrrrrrrrrrr','ttttttttttttttttt',1,333,0,1),(4,'Хіп-хоп','Дорослі','Краща техніка виконання','Профі',1,444,0,1),(5,'Хіп-хоп','Дорослі','Краща техніка виконання','Початківці',1,555,0,1),(6,'B&B','Дорослі','Краща техніка виконання','Профі',1,666,0,0),(7,'B&B','Дорослі','Краща техніка виконання','Початківці',1,777,0,1),(8,'Хіп-хоп','Дорослі','Кращий виспут за думкою глядачів','Профі',1,888,0,0),(9,'Хіп-хоп','Дорослі','Кращий виспут за думкою глядачів','Початківці',1,999,0,1),(10,'Бачата','Напівдорослі','Лучшие движения','Высшая',1,77770,0,1),(11,'B&B','Дорослі','Кращий виспут за думкою глядачів','Початківці',1,9099,0,0);
/*!40000 ALTER TABLE `dance_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dance_groups`
--

DROP TABLE IF EXISTS `dance_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dance_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dance_group_name` varchar(255) NOT NULL,
  `d_program` text NOT NULL,
  `d_age_category` text NOT NULL,
  `d_nomination` text NOT NULL,
  `d_league` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dance_groups`
--

LOCK TABLES `dance_groups` WRITE;
/*!40000 ALTER TABLE `dance_groups` DISABLE KEYS */;
INSERT INTO `dance_groups` VALUES (1,'Сучасні танці','a:2:{s:13:\"Хіп-хоп\";a:0:{}s:3:\"B&B\";a:0:{}}','a:2:{s:8:\"Діти\";a:2:{s:25:\"age-category-rule-age-min\";s:4:\"2005\";s:25:\"age-category-rule-age-max\";s:4:\"2006\";}s:14:\"Дорослі\";a:2:{s:25:\"age-category-rule-age-min\";s:4:\"1995\";s:25:\"age-category-rule-age-max\";s:4:\"1997\";}}','a:2:{s:44:\"Краща техніка виконання\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:1:\"2\";}s:60:\"Кращий виспут за думкою глядачів\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:1:\"3\";}}','a:2:{s:10:\"Профі\";a:1:{s:31:\"league-rule-participation-years\";s:2:\"15\";}s:20:\"Початківці\";a:1:{s:31:\"league-rule-participation-years\";s:1:\"2\";}}'),(2,'New Dance Program','a:2:{s:15:\"Dance program 1\";a:0:{}s:7:\"Dance 2\";a:0:{}}','a:1:{s:14:\"Age category 1\";a:2:{s:25:\"age-category-rule-age-min\";s:4:\"1123\";s:25:\"age-category-rule-age-max\";s:4:\"1125\";}}','a:1:{s:12:\"Nomination 1\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:2:\"23\";}}','a:1:{s:8:\"League 1\";a:1:{s:31:\"league-rule-participation-years\";s:1:\"5\";}}'),(3,'Programma','a:1:{s:8:\"qqqqqqqq\";a:0:{}}','a:2:{s:13:\"wwwwwwwwwwwww\";a:2:{s:25:\"age-category-rule-age-min\";s:8:\"11111111\";s:25:\"age-category-rule-age-max\";s:9:\"222222222\";}s:18:\"eeeeeeeeeeeeeeeeee\";a:2:{s:25:\"age-category-rule-age-min\";s:7:\"3333333\";s:25:\"age-category-rule-age-max\";s:8:\"44444444\";}}','a:1:{s:20:\"rrrrrrrrrrrrrrrrrrrr\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:8:\"55555555\";}}','a:1:{s:17:\"ttttttttttttttttt\";a:1:{s:31:\"league-rule-participation-years\";s:14:\"66666666666666\";}}'),(4,'GROUP DANCE','a:1:{s:4:\"asdf\";a:0:{}}','a:1:{s:9:\"kjhafklsd\";a:2:{s:25:\"age-category-rule-age-min\";s:3:\"212\";s:25:\"age-category-rule-age-max\";s:3:\"123\";}}','a:1:{s:5:\"sklfj\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:2:\"55\";}}','a:1:{s:7:\"dsklfjl\";a:1:{s:31:\"league-rule-participation-years\";s:3:\"221\";}}'),(5,'Латиноамериканские танцы','a:1:{s:12:\"Бачата\";a:0:{}}','a:1:{s:24:\"Напівдорослі\";a:2:{s:25:\"age-category-rule-age-min\";s:2:\"16\";s:25:\"age-category-rule-age-max\";s:2:\"20\";}}','a:1:{s:29:\"Лучшие движения\";a:1:{s:39:\"nomination-rule-participants-number-min\";s:1:\"2\";}}','a:1:{s:12:\"Высшая\";a:1:{s:31:\"league-rule-participation-years\";s:1:\"4\";}}');
/*!40000 ALTER TABLE `dance_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (3,'Нищеброды',1),(4,'Второе отделение',1),(5,'Нормас отделение',1);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments_categories`
--

DROP TABLE IF EXISTS `departments_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `sort_order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments_categories`
--

LOCK TABLES `departments_categories` WRITE;
/*!40000 ALTER TABLE `departments_categories` DISABLE KEYS */;
INSERT INTO `departments_categories` VALUES (49,5,2,0),(38,4,5,0),(46,5,3,0),(44,3,10,1),(47,3,1,3),(37,3,9,2),(45,4,4,0);
/*!40000 ALTER TABLE `departments_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `event_status` varchar(255) NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `event_city` varchar(255) NOT NULL,
  `event_country` varchar(255) NOT NULL,
  `event_referee` varchar(255) NOT NULL,
  `event_skutiner` varchar(255) NOT NULL,
  `org_id_for_event` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Our event 1','views/main/img/event_img/dances.jpg','Regional','2017-06-07','2017-06-08','Khmelnytskyi','Ukraine','Gordon Bayron','Suhishvili',1);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_categories`
--

DROP TABLE IF EXISTS `events_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_categories`
--

LOCK TABLES `events_categories` WRITE;
/*!40000 ALTER TABLE `events_categories` DISABLE KEYS */;
INSERT INTO `events_categories` VALUES (16,1,1),(29,1,5),(23,1,10),(6,2,3),(7,2,5),(30,1,9),(21,1,6),(24,1,2),(26,1,3),(27,1,4),(31,1,8);
/*!40000 ALTER TABLE `events_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `short_content` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_name` varchar(64) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_content` (`short_content`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Swimming with dolphins may be banned','2016-08-31','Authorities in Hawaii are proposing a ban on the popular tourist activity of swimming with dolphins off the Hawaiian coast.','CONTENT of article 1','David','../../views/main/img/news/1.jpg','NewsPublication'),(2,'Colombia and FARC rebels sign peace deal','2016-08-28','Colombias government signed a peace deal with the rebel group FARC. The deal ends 52 years of fighting.','CONTENT of article 2','April','../../views/main/img/news/2.jpg','NewsPublication'),(3,'Study shows there are two divorce seasons','2016-08-25','Couples might want to put a little extra effort into their marriage just before March and August every year.','CONTENT of article 3','George','../../views/main/img/news/3.jpg','ArticlePublication'),(4,'What the 5,300-year-old Iceman wore','2016-08-22','Scientists studied the pieces of material that were on the body of a man who died in Europe 5,300 years ago.','CONTENT of article 4','Mikel','../../views/main/img/news/4.jpg','ArticlePublication'),(5,'July was hottest month in recorded history','2016-08-19','It is official – July was the hottest month on Earth since scientists started recording the planets temperatures.','CONTENT of article 5','Sonia','../../views/main/img/news/5.jpg','PhotoReportPublication'),(6,'Slain black youth\'s BB gun called \'almost identical\' to real weapon','2016-09-18','COLUMBUS, Ohio (Reuters) - The mayor of Columbus, Ohio, said on Friday that the air pistol brandished at police by a black, 13-year-old boy as he was shot dead by a white officer this week was nearly indistinguishable from weapons carried by members of th','COLUMBUS, Ohio (Reuters) - The mayor of Columbus, Ohio, said on Friday that the air pistol brandished at police by a black, 13-year-old boy as he was shot dead by a white officer this week was nearly indistinguishable from weapons carried by members of the city\'s police force.  Mayor Andrew Ginther appeared with Police Chief Kim Jacobs for a tense community meeting of more than 200 people, most of them African-American, who were invited to ask questions of city officials at the church gathering for just over an hour.  But Ginther and Jacobs, who are both white, along with the city\'s public safety director, Ned Pettus, who is black, had few new details to offer about circumstances leading to the fatal shooting on Wednesday of Tyre King.  The officials appealed for patience on the part of the public while investigations of the incident continue.','By Tyler Behm','../../views/main/img/news/6.jpg','article'),(7,'Ohio police officers indicted in shooting death and beating case','2016-09-17','CLEVELAND (Reuters) - A Cleveland police officer was indicted for negligent homicide in the shooting death of an unarmed black man on Friday and two former officers in nearby East Cleveland were indicted for kidnapping and assault for beating a black man ','CLEVELAND (Reuters) - A Cleveland police officer was indicted for negligent homicide in the shooting death of an unarmed black man on Friday and two former officers in nearby East Cleveland were indicted for kidnapping and assault for beating a black man who was under arrest.\r\n\r\nThe indictments by a Cuyahoga County grand jury came amid increased scrutiny of the use of force by police in Ohio, where an officer in Columbus this week shot and killed a thirteen-year-old who was carrying a pellet gun.\r\n\r\nIn the Cleveland case, officer Alan Buford, who is black, was indicted for misdemeanor negligent homicide in the 2015 death of unarmed-breaking and entering suspect Brandon Jones, 18, Cuyahoga County Prosecutor Timothy J. McGinty said in a statement Friday.','By Kim Palmer','../../views/main/img/news/7.jpg','article'),(8,'Florida man found guilty of attempted murder of George Zimmerman: reports','2016-09-19','ORLANDO, Fla. (Reuters) - A Florida man was found guilty on Friday of attempted murder for shooting at George Zimmerman during a roadside confrontation ','ORLANDO, Fla. (Reuters) - A Florida man was found guilty on Friday of attempted murder for shooting at George Zimmerman during a roadside confrontation with the ex-neighborhood watch captain widely known for killing unarmed black teenager Trayvon Martin, local media reported.\r\nMatthew Apperson, 37, who according to prosecutors has a history of mental illness, was convicted in a jury trial in the Orlando suburb of Sanford, Florida, according to accounts by the Orlando Sentinel newspaper and 24-hour Orlando television news channel News 13.\r\nA Sanford jury in 2013 acquitted Zimmerman, 32, of murder in the fatal 2012 shooting of 17-year-old Martin, a case that helped spark the Black Lives Matter movement and overshadowed both Apperson\'s prosecution and his defense.','Barbara Liston','../../views/main/img/news/8.jpg','article'),(9,'Breaking news','2016-09-20','The wolf has gone crazy!','This one wolf is really out of his mind! He has said wooooooooooo to the moon!','Roma Slobodeniuk','../../views/main/img/news/vPWn2BYuQ3Q.jpg','article'),(10,'Экстренные новости!','2016-09-21','Ассассин убивает Тамплиеров!','Ассассин убил Тамплиера прям среди бегого дня на площади!','Roma Slobodeniuk','../../views/main/img/news/2762.jpg','article'),(11,'Новости на западе!','2016-09-21','Они свободно разгуливают улицами городов...','Пик влияния хашшашинов приходится на конец XII века. Это связано с возвышением государства турок-мамлюков во главе с султаном Юсуфом ибн Айюбом по прозвищу «Салах ад-Дин»[16]. С лёгкостью захватив прогнивший Фатимидский халифат, с которым у крестоносцев был заключён длительный мирный договор, Салах ад-Дин объявил себя единственным истинным защитником ислама. Отныне ближневосточным христианским государствам крестоносцев угрожала опасность с юга. Длительные переговоры с Салах ад-Дином, который видел своё предназначение в том, чтобы изгнать христиан с мусульманского Востока, не привели к существенным результатам. С 1171 года для крестоносцев начинается тяжелейший период войн с Салах ад-Дином. На этот раз над Иерусалимом, оплотом христианства на Ближнем Востоке, нависла неминуемая угроза…','Roma Slobodeniuk','../../views/main/img/news/243763.jpg','article'),(12,'Наконец-то дождались!','2016-09-21','Госслужащие получили зарплату !','Госслужащие получили крошечную зарплату!','Roma Slobodeniuk','../../views/main/img/news/10-dollary-makro-oboi-1366x768.jpg','article'),(13,'Pakistan cinemas ban Indian movies','2016-10-03','Pakistan\'s major cinemas have banned Indian movies in Pakistan\'s biggest cities.','India and Pakistan do not have very good relations at the moment. The two countries have argued for many years over where the borders should be in Kashmir. There is also the possibility that India could limit the amount of water Pakistan gets from the Indus River. The latest disagreement is over movies and actors. Pakistan\'s major cinemas have banned Indian movies in Pakistan\'s biggest cities - Lahore, Karachi and Islamabad. The cinema owners say the ban is to show support for Pakistani soldiers who are risking their lives in Kashmir. The ban comes after a group of Indian moviemakers banned Pakistani actors from working in India\'s famous Bollywood movie studios in Mumbai.','Roma Slobodeniuk','../../views/main/img/news/161002-indian-movies.jpg','article');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) NOT NULL,
  `org_abbreviation` varchar(255) NOT NULL,
  `org_head_fio` varchar(255) NOT NULL,
  `org_city` varchar(255) NOT NULL,
  `org_country` varchar(255) NOT NULL,
  `org_phone` varchar(25) NOT NULL,
  `org_email` varchar(255) NOT NULL,
  `org_pic_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `org_name` (`org_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'DreamTeam','DT','I\'m not the one, bu we all Are','Khmelnytskyi','Ukraine','+38 (097) 097-97-97','dt@gmail.com','views/main/img/org_image/dreamTeam.jpg');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `link` varchar(64) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) DEFAULT '1',
  `grant` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Главная','home','without_popup',1,0,''),(7,'Создать событие','addevent','without_popup',0,4,'evant_animate'),(8,'Создать новость','addnews','without_popup',0,4,'news_animate'),(2,'Новости','news/page/1','without_popup',1,0,''),(3,'События','events','without_popup',1,1,''),(4,'Связь с нами','#','popup',1,2,'connect'),(5,'Вход','#','popup',1,2,'log_animate'),(6,'Выход','out','without_popup',1,1,''),(10,'Профиль','profile','without_popup',1,1,''),(9,'Регистрация','home#registration_form','without_popup',0,1,''),(11,'Админ панель','admin/organizations/page/1','without_popup',1,4,'');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participant`
--

DROP TABLE IF EXISTS `participant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) CHARACTER SET utf32 NOT NULL,
  `third_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `club_id` int(11) NOT NULL,
  `coach` text NOT NULL,
  PRIMARY KEY (`id_participant`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participant`
--

LOCK TABLES `participant` WRITE;
/*!40000 ALTER TABLE `participant` DISABLE KEYS */;
INSERT INTO `participant` VALUES (1,'Bogdan','Ryba','Oleks','1998-02-11',2,'superman'),(2,'Bogdan','Ryba','Oleks','1998-02-11',2,'supergirl'),(3,'Hello!','Boda','Lol','1999-12-02',2,'deadpool'),(4,'Hello!','Boda','Lol','1999-12-02',2,'me'),(5,'Hello!','Boda','Lol','1999-12-02',2,'dude'),(6,'Hello!','Boda','Lol','1999-12-02',2,'trainer'),(7,'Hello!','Boda','Lol','1999-12-02',2,'fucker'),(8,'Hello!','Boda','Lol','1999-12-02',2,'okay'),(9,'Hello!','Boda','Lol','1999-12-02',2,'Olia'),(10,'Hello!','Ryba','Oleks','1998-02-11',2,'Geralt'),(11,'Hello!','Ryba','Oleks','1998-02-11',2,'Francisko'),(12,'Hello!','Boda','Oleks','1998-02-11',2,'Fedelini'),(13,'Hello!','Boda','Oleks','1998-02-11',2,'Orest'),(14,'Bogdan','Rybchynskiy','Oleksandrovych','1998-04-24',2,'Pikachu'),(27,'Hello!','Ryba','Oleks','1999-12-02',2,'Seryj'),(28,'Hello!','Ryba','123456111111','1998-02-11',2,'Sirok'),(29,'Bogdan1111','Ryba1111','Oleks1111','1998-02-11',2,'Morok'),(30,'You','Not','Give up','1999-12-02',2,'Urva'),(31,'Hello!','Ryba','Lol','1998-02-11',2,'Grisha'),(32,'Bogdan','Boda','Oleksandrovych1111111111111111111','1998-02-11',2,'Saniok'),(33,'Eeeee','LLL','jnfrjlngjkn','1999-12-02',2,'Fucio'),(34,'Last Test','Boda','Lol','1998-02-11',2,'Cibab'),(35,'Andrey','Slotvinskiy','Vv','1998-08-01',2,'Oleg'),(36,'The_Name','surname','third name','1990-12-25',3,'Trener1'),(37,'Gosha','Tvoiu','Mat','2000-11-23',5,'Trener ubijca');
/*!40000 ALTER TABLE `participant` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-06 23:29:16
