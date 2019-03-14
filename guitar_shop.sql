-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2014 г., 00:29
-- Версия сервера: 5.5.29-log
-- Версия PHP: 5.3.20

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `guitar_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_ad` varchar(255) NOT NULL,
  `ad` text NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `instrument` varchar(50) NOT NULL,
  `date` int(11) NOT NULL,
  `count_com` int(11) NOT NULL DEFAULT '0',
  `date_last_com` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=147 ;

--
-- Дамп данных таблицы `ads`
--

INSERT INTO `ads` (`id`, `title_ad`, `ad`, `name_user`, `mail`, `id_user`, `city`, `instrument`, `date`, `count_com`, `date_last_com`) VALUES
(141, 'Morbi tellus metus', 'In porttitor erat id ornare dignissim.\r\nSed luctus mi id augue suscipit molestie\r\n arcu in, tempor enim. Sed vel vestibulum enim.', 'Admin', 'ender7@mail.ru', 47, 'Москва', 'Акустическая гитара', 1413875214, 0, 1413875214),
(142, 'In porttitor erat id ornare dignissim', 'In hac habitasse platea dictumst.\r\nMorbi in massa sit amet velit pharetra finibus\r\nDuis pulvinar velit eros', 'Admin', 'ender7@mail.ru', 47, 'Санкт-Петербург', 'Бас гитара', 1413875255, 0, 1413875255),
(138, 'Lorem ipsum', 'Praesent tempus justo egestas, cursus risus et, condimentum nisi.\r\nNam tempor eros non porttitor ullamcorper.\r\nDonec tempus ut enim ut viverra. Duis vestibulum ultricies dui', 'Admin', 'ender7@mail.ru', 47, 'Санкт-Петербург', 'Акустическая гитара', 1413874729, 1, 1414441674),
(143, 'In hac habitasse platea dictumst', 'Morbi in massa sit amet velit pharetra finibus in quis risus.\r\nDuis pulvinar velit eros, non sodales nunc ullamcorper vitae.\r\nDonec finibus turpis leo\r\nullamcorper vulputate quam malesuada eu', 'Admin', 'ender7@mail.ru', 47, 'Нижний Новгород', 'Электро гитара', 1413875315, 0, 1413875315),
(139, 'Curabitur sit amet luctus nibh', 'Fusce semper sem sit amet eleifend volutpa\r\nVestibulum lacinia nisl egestas\r\n Fusce eu ante metus.', 'Admin', 'ender7@mail.ru', 47, 'Санкт-Петербург', 'Бас гитара', 1413875052, 0, 1413875052),
(140, 'Cras placerat nulla', 'Cum sociis natoque penatibus et magnis dis\r\nNulla ac posuere felis\r\n Aliquam laoreet odio sit amet\r\n ultricies hendrerit.', 'Admin', 'ender7@mail.ru', 47, 'Нижний Новгород', 'Акустическая гитара', 1413875143, 0, 1413875143),
(144, 'Phasellus at tortor accumsan', 'Mauris ullamcorper volutpat era\r\n Etiam facilisis felis tincidunt\r\nVestibulum ante ipsum primis in faucibus\r\nQuisque sem erat', 'Admin', 'ender7@mail.ru', 47, 'Нижний Новгород', 'Акустическая гитара', 1413875381, 0, 1413875381);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `id_ad` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `title_ad` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ip_user` varchar(20) NOT NULL,
  PRIMARY KEY (`id_com`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id_com`, `comment`, `id_ad`, `date`, `title_ad`, `user`, `id_user`, `ip_user`) VALUES
(33, 'Первый комментарий', 138, 1414441674, 'Lorem ipsum', 'admin', 0, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(70) NOT NULL,
  `pswd` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `ip_reg` varchar(30) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `pswd`, `mail`, `ip_reg`, `date`) VALUES
(48, 'Виктор', '72a610e3bc7949bd50abbce749c182a0', 'vitek.86@mail.ru', '127.0.0.1', 1413683856),
(49, 'Илья', '72a610e3bc7949bd50abbce749c182a0', 'bender7@ааа.ru', '127.0.0.1', 1414438850),
(47, 'Admin', '72a610e3bc7949bd50abbce749c182a0', 'vitek.86@mail.ru', '127.0.0.1', 1413327499);

-- --------------------------------------------------------

--
-- Структура таблицы `users_tmp`
--

CREATE TABLE IF NOT EXISTS `users_tmp` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(70) NOT NULL,
  `pswd` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `ip_reg` varchar(30) NOT NULL,
  `date` int(11) NOT NULL,
  `date_finish` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
