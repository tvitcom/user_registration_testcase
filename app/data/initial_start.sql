-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 21 2015 г., 21:00
-- Версия сервера: 5.5.44-0ubuntu0.12.04.1
-- Версия PHP: 5.3.10-1ubuntu3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `off`
--

-- --------------------------------------------------------

--
-- Структура таблицы `app_session`
--

CREATE TABLE IF NOT EXISTS `app_session` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(21) DEFAULT NULL,
  `sid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `security`
--

CREATE TABLE IF NOT EXISTS `security` (
  `user_id` bigint(21) unsigned NOT NULL,
  `email_salt` varchar(128) DEFAULT NULL,
  `login_salt` int(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(21) unsigned NOT NULL AUTO_INCREMENT COMMENT '#',
  `fio` varchar(128) DEFAULT NULL COMMENT 'name lastname',
  `whois` varchar(128) DEFAULT NULL COMMENT 'whois',
  `email` varchar(40) NOT NULL,
  `passhash` varchar(128) NOT NULL,
  `credit_card` varchar(19) DEFAULT NULL,
  `card_expire` date DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `photo` varchar(1024) DEFAULT NULL,
  `rights` text,
  `t_passhash` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time last setting password',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='User with porfile and rights' AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `whois`, `email`, `passhash`, `credit_card`, `card_expire`, `sex`, `photo`, `rights`, `t_passhash`, `is_active`) VALUES
(1, 'Carl Cox', 'admin apps', 'admin@mail.ruru', '$2y$kgWUMsHxJofimelHWZKe/AjhpB00YcNfvFu9r/k6qCHWCmotHJ+NZX78VnfT6hxMKle3T7ccKSUdhJZY7WtwdA', '0001-0002-0003-0004', '2015-12-01', 1, 'none', 'all', '2015-09-15 13:47:43', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
