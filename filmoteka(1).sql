-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2018 at 02:37 PM
-- Server version: 5.5.50
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmoteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `genre`, `year`, `description`, `photo`) VALUES
(1, 'Облачный атлас', 'драма', 2012, 'Шесть историй — пять реинкарнаций, происходящих в разное время, тесно переплетаются между собой…', ''),
(2, 'Такси 2', 'комедия', 2000, 'Министр обороны Франции принимает с визитом своего японского коллегу. Чиновникам предстоит подписание очень важного межправительственного договора. Но прежде, чтобы развлечь гостя, его хотят познакомить с методами работы знаменитого антитеррористического подразделения Марселя. Все бы ничего, вот только столь ответственное мероприятие поручили комиссару Жеберу. Ну что ждать от идиота, который не видит разницы между джакузи и якудзой? Японского министра похищают. Где его искать, полиция не представляет. Хорошо, что рядом снова оказывается веселый таксист Даниэль. ', ''),
(21, 'Аватар', 'драма', 2010, 'Джейк Салли — бывший морской пехотинец, прикованный к инвалидному креслу. Несмотря на немощное тело, Джейк в душе по-прежнему остается воином. Он получает задание совершить путешествие в несколько световых лет к базе землян на планете Пандора, где корпорации добывают редкий минерал, имеющий огромное значение для выхода Земли из энергетического кризиса.', ''),
(22, 'Пираты Карибского моря: На краю Света', 'приключения', 2007, 'Уилл, Элизабет и капитан Барбосса отправляются на край земли, чтобы вытащить Джека Воробья из тайника Дэйви Джонса. Но это только начало их очередного головокружительного приключения. Ведь прежде, чем Уилл и Элизабет дадут друг другу клятву верности, друзьям предстоит сразиться с Дэйви Джонсом и победить лорда Беккета.', ''),
(23, 'Пираты Карибского моря: Сундук мертвеца', 'приключения', 2006, 'Капитану Джеку Воробью, Уиллу Тернеру и его невесте Элизабет Суонн приходится отправиться в новое захватывающее дух приключение, потому что жизни Джека грозит опасность — за его головой охотятся сверхъестественные воины-фантомы во главе с легендарным Дэйви Джонсом. Все дело в том, что когда-то Джек задолжал Дэйви кое-что, а точнее душу. И теперь, чтобы не стать одним из его рабов, Джеку придется найти выход из сложившейся ситуации.', ''),
(25, '1+1', 'комедия', 2011, 'Филипп - пожилой богатый аристократ, который из-за несчастного случая оказывается прикованным к инвалидному креслу. Однако вместо того, чтобы нанять себе профессиональную сиделку, он нанимает Дрисса - мелкого преступника, отсидевшего свой срок в тюрьме. Эти два совершенно не похожих человека кардинально меняют жизнь друг друга.', ''),
(31, 'Дверь', 'триллер', 2009, 'Успешный живописец Дэвид переживает не лучшие времена. Он винит себя в гибели семилетней дочери, погибшей в результате неверно принятого им решения. Но однажды все меняется, когда герой обнаруживает таинственную дверь, которая дает ему возможность вернуться к прошлым ошибкам и все исправить, снова и снова… Однако то, что показалось счастьем все изменить, оборачивается форменным ужасом, ведущим к необратимым последствиям…', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;