-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 23 2016 р., 15:01
-- Версія сервера: 5.5.41-log
-- Версія PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `AlatarDB`
--

-- --------------------------------------------------------

--
-- Структура таблиці `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map_link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп даних таблиці `map`
--

INSERT INTO `map` (`id`, `map_link`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2536.074294014141!2d30.655526715925653!3d50.53278888930928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4d0ce20231741%3A0xca69712404996798!2zMUEsINCy0YPQuy4g0J_Rg9GF0ZbQstGB0YzQutCwLCAx0JAsINCa0LjRl9Cy!5e0!3m2!1sru!2sua!4v1465644540733');

-- --------------------------------------------------------

--
-- Структура таблиці `menu_en`
--

CREATE TABLE IF NOT EXISTS `menu_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caption` (`caption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `menu_en`
--

INSERT INTO `menu_en` (`id`, `caption`) VALUES
(2, 'Containers and packaging'),
(1, 'Lumber an workpiece');

-- --------------------------------------------------------

--
-- Структура таблиці `menu_ukr`
--

CREATE TABLE IF NOT EXISTS `menu_ukr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caption` (`caption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `menu_ukr`
--

INSERT INTO `menu_ukr` (`id`, `caption`) VALUES
(1, 'Пиломатеріали і заготовки'),
(2, 'Тара і упаковка');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `telNumber` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `name`, `telNumber`, `email`, `info`, `date`, `done`) VALUES
(7, 'Никита', '063-940-57-73', 'kovdrish@gmail.com', 'Бруса мне фугованого и побольше!', '2016-01-27 10:54:00', 1),
(11, 'Алёна', '063-105-19-98', 'alyona@gmail.com', 'alksdjlkajsdkvqev', '2016-01-27 11:02:00', 1),
(12, '', '5350694', '', '', '2016-01-27 13:58:00', 1),
(13, '', '1111', '', '', '2016-01-27 13:58:00', 1),
(14, 'Владислав', '0639405773', 'ждьыдвлм', '&lt;p&gt;Брус 100х520 20 шт&lt;/p&gt;\r\n', '2016-02-01 14:52:00', 1),
(16, 'Юрий Валериевич', '+38067-555-34-29', NULL, '&lt;p&gt;ыаыва&lt;/p&gt;\r\n', '2016-06-10 13:27:00', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `pages_en`
--

CREATE TABLE IF NOT EXISTS `pages_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `caption` text,
  `content` text,
  `isContainer` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп даних таблиці `pages_en`
--

INSERT INTO `pages_en` (`id`, `code`, `caption`, `content`, `isContainer`) VALUES
(1, 'main', 'ТОВ "АЛАТАР" купить пиломатериалы недорого Киев', '<p>Ищете качественные пиломатериалы? Наш ассортимент - это десятки наименований продуктов распила древесины по отличным ценам. Специалисты нашей компании сделают все возможное, чтобы Вы остались довольны сотрудничеством с нами. Они непременно предложат Вам:\r\n	                </p>\r\n	                <p><strong>Индивидуальный подход</strong></p>\r\n	                <p>\r\n	                У Вас есть особые требования к размерам пиломатериалов?  Мы легко изготовим продукцию нужных форм и габаритов. Наши специалисты выполнят работу в срок, строго придерживаясь всех оговоренных деталей заказа.\r\n	                </p>\r\n	                <p><strong>\r\n	                Отличный ассортимент\r\n	                </strong> </p>\r\n	                <p>\r\n	                Широкий выбор продуктов распила древесины – еще одно преимущество сотрудничества с нами. Половая доска, доска обрезная и не обрезная, брус, вагонка, рейка, плинтус, блок-хауз, наличник, лестницы, двери и короба для них, подоконники и столешницы – только часть нашего ассортимента. Мы предложим Вашему вниманию пиломатериалы из бука, дуба, сосны, липы или ольхи.\r\n	                </p>\r\n	                <p><strong>\r\n	                Контроль качества\r\n	                </strong></p>\r\n	                <p>\r\n	                О каком наименовании товара не шла бы речь, мы гарантируем его качество. При изготовлении пиломатериалов, все производственные процессы тщательно контролируются квалифицированными специалистами.\r\n	                </p>\r\n	                <p><strong>\r\n	                Система бонусов и скидок\r\n	                </strong></p>\r\n	                <p>\r\n	                Мы всегда открыты к сотрудничеству, поэтому для постоянных покупателей у нас действуют специальные предложения, приятные бонусы и выгодные скидки.\r\n	                </p>\r\n	                <p><strong>\r\n	                Профессиональная консультация\r\n	                </strong></p>\r\n	                <p>\r\n	                Наши сотрудники грамотно ответят на любые вопросы о продукции компании, помогут правильно подобрать материал и сориентироваться в  ассортименте. Позвоните или напишите, чтобы получить подробную информацию об интересующем Вас товаре.\r\n	                </p>\r\n	                <p><strong>\r\n	                Приятные цены\r\n	                </strong></p>\r\n	                <p>\r\n	                Покупайте качественные материалы по выгодной цене! Мы не делаем неоправданных «накруток», поэтому стоимость нашей продукции всегда остается демократичной. Вам понравятся наши выгодные ценовые предложения!\r\n	                </p>\r\n	                <p><strong>\r\n	                Удобная доставка\r\n	                </strong></p>\r\n	                <p>\r\n	                Желаете купить пиломатериалы в Киеве, или хотите заказать их в любой другой регион Украины? География наших поставок охватывает всю страну. Компания сотрудничает сразу с несколькими крупными перевозчиками, а доставка пиломатериалов по Киеву и области может осуществляться нашим транспортом. Также возможен вариант самовывоза.\r\n	                </p>', 1),
(2, 'contacts', 'Контактна інформація ТОВ "АЛАТАР" Київ', NULL, 1),
(3, 'product', 'Products - the best lumber in Kyiv, Alatar LTD', NULL, 1),
(4, 'order', 'Замовлення пиломатеріалів, Київ ТОВ "АЛАТАР"', NULL, 1),
(5, 'admin', 'Сторінка адміністратора ТОВ "АЛАТАР"', NULL, 1),
(6, 'map_change', 'Зміна інформації про мапу ТОВ "АЛАТАР"', NULL, NULL),
(7, 'orders', NULL, NULL, 1),
(8, 'about', NULL, NULL, 1),
(9, 'vacancy', NULL, NULL, 1),
(10, 'vacancy-change', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `pages_ukr`
--

CREATE TABLE IF NOT EXISTS `pages_ukr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `caption` text,
  `content` text,
  `isContainer` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп даних таблиці `pages_ukr`
--

INSERT INTO `pages_ukr` (`id`, `code`, `caption`, `content`, `isContainer`) VALUES
(1, 'main', 'ТОВ &quot;АЛАТАР&quot; купить пиломатериалы недорого Киев', '&lt;p&gt;Ищете качественные пиломатериалы? Наш ассортимент - это десятки наименований продуктов распила древесины по отличным ценам. Специалисты нашей компании сделают все возможное, чтобы Вы остались довольны сотрудничеством с нами. Они непременно предложат Вам:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Индивидуальный подход&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;У Вас есть особые требования к размерам пиломатериалов? Мы легко изготовим продукцию нужных форм и габаритов. Наши специалисты выполнят работу в срок, строго придерживаясь всех оговоренных деталей заказа.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Отличный ассортимент &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Широкий выбор продуктов распила древесины &amp;ndash; еще одно преимущество сотрудничества с нами. Половая доска, доска обрезная и не обрезная, брус, вагонка, рейка, плинтус, блок-хауз, наличник, лестницы, двери и короба для них, подоконники и столешницы &amp;ndash; только часть нашего ассортимента. Мы предложим Вашему вниманию пиломатериалы из бука, дуба, сосны, липы или ольхи.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Контроль качества &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;О каком наименовании товара не шла бы речь, мы гарантируем его качество. При изготовлении пиломатериалов, все производственные процессы тщательно контролируются квалифицированными специалистами.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Система бонусов и скидок &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Мы всегда открыты к сотрудничеству, поэтому для постоянных покупателей у нас действуют специальные предложения, приятные бонусы и выгодные скидки.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Профессиональная консультация &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Наши сотрудники грамотно ответят на любые вопросы о продукции компании, помогут правильно подобрать материал и сориентироваться в ассортименте. Позвоните или напишите, чтобы получить подробную информацию об интересующем Вас товаре.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Приятные цены &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Покупайте качественные материалы по выгодной цене! Мы не делаем неоправданных &amp;laquo;накруток&amp;raquo;, поэтому стоимость нашей продукции всегда остается демократичной. Вам понравятся наши выгодные ценовые предложения!&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Удобная доставка &lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Желаете купить пиломатериалы в Киеве, или хотите заказать их в любой другой регион Украины? География наших поставок охватывает всю страну. Компания сотрудничает сразу с несколькими крупными перевозчиками, а доставка пиломатериалов по Киеву и области может осуществляться нашим транспортом. Также возможен вариант самовывоза.&lt;/p&gt;\r\n', 1),
(3, 'contacts', 'Контактна інформація ТОВ "АЛАТАР" Київ', NULL, 1),
(4, 'product', 'Товари - найкращі пиломатеріали в Києві, ТОВ "АЛАТАР"', NULL, 1),
(5, 'order', 'Замовлення пиломатеріалів, Київ ТОВ "АЛАТАР"', NULL, 1),
(8, 'admin', 'Сторінка адміністратора ТОВ "АЛАТАР"', NULL, 1),
(12, 'map_change', 'Зміна інформації про мапу ТОВ "АЛАТАР"', NULL, NULL),
(13, 'orders', NULL, NULL, 1),
(15, 'about', NULL, NULL, 1),
(16, 'vacancy', NULL, NULL, 1),
(17, 'vacancy-change', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `products_en`
--

CREATE TABLE IF NOT EXISTS `products_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `menu_type` varchar(50) NOT NULL,
  `measure` text NOT NULL,
  `price` float DEFAULT NULL,
  `info` text,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `caption` (`caption`),
  KEY `menu_type` (`menu_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп даних таблиці `products_en`
--

INSERT INTO `products_en` (`id`, `caption`, `menu_type`, `measure`, `price`, `info`, `image`) VALUES
(1, 'Brus', 'Lumber an workpiece', 'cub.m.', 100, NULL, 'brus.jpg'),
(2, 'Building board', 'Lumber an workpiece', 'cub.m.', 100, NULL, 'doska_svizhopyl.jpg'),
(3, 'Cropped board', 'Lumber an workpiece', 'cub.m.', 100, NULL, 'doshka_obrizna.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `products_ukr`
--

CREATE TABLE IF NOT EXISTS `products_ukr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `menu_type` varchar(30) NOT NULL,
  `measure` text NOT NULL,
  `price` float DEFAULT NULL,
  `info` text,
  `image` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `caption` (`caption`),
  KEY `menu_type` (`menu_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп даних таблиці `products_ukr`
--

INSERT INTO `products_ukr` (`id`, `caption`, `menu_type`, `measure`, `price`, `info`, `image`) VALUES
(7, 'Брус', 'Пиломатеріали і заготовки', 'куб.м', 140, NULL, 'brus.jpg'),
(19, 'Будівна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doska_svizhopyl.jpg'),
(20, 'Обрізна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka_obrizna.jpg'),
(21, 'Дошка необрізна', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka_neobrizna.jpg'),
(22, 'Лаги', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'lagi.jpg'),
(23, 'Рейка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'reika.jpg'),
(24, 'Шпала', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'shpala.jpg'),
(25, 'Дрова паливні', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'drova.jpg'),
(26, 'Дерев''яна тирса', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'tursa.jpg'),
(27, 'Піддон', 'Тара і упаковка', 'шт', 100, NULL, 'poddon.jpg'),
(28, 'Ящик', 'Тара і упаковка', 'шт', 100, NULL, 'yashik.jpg'),
(29, 'Тарна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka-tvirna.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `vacancies_en`
--

CREATE TABLE IF NOT EXISTS `vacancies_en` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  `image` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `vacancies_en`
--

INSERT INTO `vacancies_en` (`id`, `caption`, `info`, `image`) VALUES
(1, 'Knocking of the pallets', '<p>Knocking the pallets.</p>', 'poddon.jpg'),
(2, 'Driver', '<p>Driving the truck.</p>', 'our_transport.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `vacancies_ukr`
--

CREATE TABLE IF NOT EXISTS `vacancies_ukr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп даних таблиці `vacancies_ukr`
--

INSERT INTO `vacancies_ukr` (`id`, `caption`, `info`, `image`) VALUES
(1, 'Сбивщик поддонов', 'Сбивка поддонов.', 'poddon.jpg'),
(2, 'Водій', '<p>Водити грузову машину</p>\r\n', 'our_transport.jpg');

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `products_en`
--
ALTER TABLE `products_en`
  ADD CONSTRAINT `products_en_ibfk_1` FOREIGN KEY (`menu_type`) REFERENCES `menu_en` (`caption`);

--
-- Обмеження зовнішнього ключа таблиці `products_ukr`
--
ALTER TABLE `products_ukr`
  ADD CONSTRAINT `products_ukr_ibfk_1` FOREIGN KEY (`menu_type`) REFERENCES `menu_ukr` (`caption`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
