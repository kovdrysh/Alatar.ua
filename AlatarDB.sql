-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2016 г., 15:02
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `AlatarDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `types` text NOT NULL,
  `info` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `types`, `info`, `icon`) VALUES
(3, 'Адреса', 'Україна, Київ, вул. Пухівська 1а', 'home'),
(4, 'Телефон', '093-238-32-62', 'phone'),
(5, 'E-mail', 'kraunik.vlad@gmail.com', 'envelope-o');

-- --------------------------------------------------------

--
-- Структура таблицы `deliveryInfo`
--

CREATE TABLE IF NOT EXISTS `deliveryInfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `info` text NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `deliveryInfo`
--

INSERT INTO `deliveryInfo` (`id`, `type`, `info`, `icon`, `image`) VALUES
(1, 'Самовивіз', 'Особисто забираєте товар з нашої бази', 'car', 'samovyviz.jpg'),
(2, 'Наш транспорт (м. Київ, Київська обл.)', 'Доставка по Києву та Київській області. Вартість розраховується індивідуально залежно від вантажу та відстані ', 'truck', 'our_transport.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(11) NOT NULL,
  `map_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `map`
--

INSERT INTO `map` (`id`, `map_link`) VALUES
(0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2536.07429401412!2d30.655526715667317!3d50.53278888930967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4d0ce20231741%3A0xca69712404996798!2z0LLRg9C7LiDQn9GD0YXRltCy0YHRjNC60LAsIDHQkCwgMUEsINCa0LjRl9Cy!5e0!3m2!1sru!2sua!4v1451816899627');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `caption` (`caption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `caption`) VALUES
(1, 'Пиломатеріали і заготовки'),
(2, 'Тара і упаковка');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `telNumber`, `email`, `info`, `date`, `done`) VALUES
(7, 'Никита', '063-940-57-73', 'kovdrish@gmail.com', 'Бруса мне фугованого и побольше!', '2016-01-27 10:54:00', 1),
(11, 'Алёна', '063-105-19-98', 'alyona@gmail.com', 'alksdjlkajsdkvqev', '2016-01-27 11:02:00', 1),
(12, '', '5350694', '', '', '2016-01-27 13:58:00', 1),
(13, '', '1111', '', '', '2016-01-27 13:58:00', 1),
(14, 'Владислав', '0639405773', 'ждьыдвлм', 'Брус 100х520 20 шт', '2016-02-01 14:52:00', 0),
(15, '', 'asdas', '', '', '2016-02-05 15:21:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `caption` text,
  `content` text,
  `parentCode` text,
  `isContainer` tinyint(1) DEFAULT NULL,
  `aliasOf` text,
  `productCode` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `productCode` (`productCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `code`, `caption`, `content`, `parentCode`, `isContainer`, `aliasOf`, `productCode`) VALUES
(1, 'main', 'ТОВ "АЛАТАР" купить пиломатериалы недорого Киев', '<p>Ищете качественные пиломатериалы? Наш ассортимент - это десятки наименований продуктов распила древесины по отличным ценам. Специалисты нашей компании сделают все возможное, чтобы Вы остались довольны сотрудничеством с нами. Они непременно предложат Вам:\r\n	                </p>\r\n	                <p><strong>Индивидуальный подход</strong></p>\r\n	                <p>\r\n	                У Вас есть особые требования к размерам пиломатериалов?  Мы легко изготовим продукцию нужных форм и габаритов. Наши специалисты выполнят работу в срок, строго придерживаясь всех оговоренных деталей заказа.\r\n	                </p>\r\n	                <p><strong>\r\n	                Отличный ассортимент\r\n	                </strong> </p>\r\n	                <p>\r\n	                Широкий выбор продуктов распила древесины – еще одно преимущество сотрудничества с нами. Половая доска, доска обрезная и не обрезная, брус, вагонка, рейка, плинтус, блок-хауз, наличник, лестницы, двери и короба для них, подоконники и столешницы – только часть нашего ассортимента. Мы предложим Вашему вниманию пиломатериалы из бука, дуба, сосны, липы или ольхи.\r\n	                </p>\r\n	                <p><strong>\r\n	                Контроль качества\r\n	                </strong></p>\r\n	                <p>\r\n	                О каком наименовании товара не шла бы речь, мы гарантируем его качество. При изготовлении пиломатериалов, все производственные процессы тщательно контролируются квалифицированными специалистами.\r\n	                </p>\r\n	                <p><strong>\r\n	                Система бонусов и скидок\r\n	                </strong></p>\r\n	                <p>\r\n	                Мы всегда открыты к сотрудничеству, поэтому для постоянных покупателей у нас действуют специальные предложения, приятные бонусы и выгодные скидки.\r\n	                </p>\r\n	                <p><strong>\r\n	                Профессиональная консультация\r\n	                </strong></p>\r\n	                <p>\r\n	                Наши сотрудники грамотно ответят на любые вопросы о продукции компании, помогут правильно подобрать материал и сориентироваться в  ассортименте. Позвоните или напишите, чтобы получить подробную информацию об интересующем Вас товаре.\r\n	                </p>\r\n	                <p><strong>\r\n	                Приятные цены\r\n	                </strong></p>\r\n	                <p>\r\n	                Покупайте качественные материалы по выгодной цене! Мы не делаем неоправданных «накруток», поэтому стоимость нашей продукции всегда остается демократичной. Вам понравятся наши выгодные ценовые предложения!\r\n	                </p>\r\n	                <p><strong>\r\n	                Удобная доставка\r\n	                </strong></p>\r\n	                <p>\r\n	                Желаете купить пиломатериалы в Киеве, или хотите заказать их в любой другой регион Украины? География наших поставок охватывает всю страну. Компания сотрудничает сразу с несколькими крупными перевозчиками, а доставка пиломатериалов по Киеву и области может осуществляться нашим транспортом. Также возможен вариант самовывоза.\r\n	                </p>', NULL, 1, NULL, NULL),
(2, 'delivery', 'Доставка пиломатеріалів ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(3, 'contacts', 'Контактна інформація ТОВ "АЛАТАР" Київ', NULL, NULL, 1, NULL, NULL),
(4, 'products', 'Товари - найкращі пиломатеріали в Києві, ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(5, 'order', 'Замовлення пиломатеріалів, Київ ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(6, 'brus-fugovanyi', NULL, NULL, NULL, 0, NULL, NULL),
(7, 'doshka-svizha', NULL, NULL, NULL, 0, NULL, NULL),
(8, 'admin', 'Сторінка адміністратора ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(9, 'add-product', 'Додати новий товар ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(10, 'add-product-type', 'Додати нову категорію товарів ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(11, 'contacts_change', 'Зміна контактної інформації ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(12, 'map_change', 'Зміна інформації про мапу ТОВ "АЛАТАР"', NULL, NULL, 1, NULL, NULL),
(13, 'orders', NULL, NULL, NULL, 1, NULL, NULL),
(14, 'delivery-change', NULL, NULL, NULL, 1, NULL, NULL),
(15, 'about', NULL, NULL, NULL, 1, NULL, NULL),
(16, 'vacancy', NULL, NULL, NULL, 1, NULL, NULL),
(17, 'vacancy-change', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `types` text NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `types`, `icon`) VALUES
(1, 'Готівкою', 'money'),
(2, 'Банківський переказ', 'bank');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(200) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `menu_type` varchar(30) NOT NULL,
  `measure` text NOT NULL,
  `price` float DEFAULT NULL,
  `info` text,
  `image` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `caption` (`caption`),
  UNIQUE KEY `code` (`code`),
  KEY `menu_type` (`menu_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `code`, `caption`, `menu_type`, `measure`, `price`, `info`, `image`) VALUES
(7, 'brus', 'Брус', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'brus.jpg'),
(19, 'budivna-doshka', 'Будівна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doska_svizhopyl.jpg'),
(20, 'obrizna-doshka', 'Обрізна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka_obrizna.jpg'),
(21, 'doshka-neobrizna', 'Дошка необрізна', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka_neobrizna.jpg'),
(22, 'lagy', 'Лаги', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'lagi.jpg'),
(23, 'reika', 'Рейка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'reika.jpg'),
(24, 'shpala', 'Шпала', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'shpala.jpg'),
(25, 'drova-palyvni', 'Дрова паливні', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'drova.jpg'),
(26, 'tursa', 'Дерев''яна тирса', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'tursa.jpg'),
(27, 'piddon', 'Піддон', 'Тара і упаковка', 'шт', 100, NULL, 'poddon.jpg'),
(28, 'yashik', 'Ящик', 'Тара і упаковка', 'шт', 100, NULL, 'yashik.jpg'),
(29, 'doshka-tvirna', 'Тарна дошка', 'Пиломатеріали і заготовки', 'куб.м', 100, NULL, 'doshka-tvirna.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `productsTypes`
--

CREATE TABLE IF NOT EXISTS `productsTypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `productsTypes`
--

INSERT INTO `productsTypes` (`id`, `type`) VALUES
(7, ''),
(5, 'arrrr'),
(1, 'Брус'),
(6, 'ввв'),
(2, 'Дошка'),
(3, 'Стовп'),
(8, 'фівцв'),
(4, 'ящик');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '1111');

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE IF NOT EXISTS `vacancies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) NOT NULL,
  `info` varchar(500) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `caption`, `info`, `image`) VALUES
(1, 'Сбивщик поддонов', 'Сбивка поддонов.', 'poddon.jpg');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`menu_type`) REFERENCES `menu` (`caption`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
