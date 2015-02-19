-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 19 2015 г., 14:13
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `baza`
--

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(5) NOT NULL,
  `name` char(128) NOT NULL,
  `description` varchar(512) NOT NULL,
  `photo_id` int(5) NOT NULL,
  `amount` float NOT NULL,
  `measure` enum('л.','кг.','шт.') NOT NULL,
  `category` int(2) NOT NULL,
  `last_price` float NOT NULL,
  `prod_date` date NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `photo_id`, `amount`, `measure`, `category`, `last_price`, `prod_date`, `expire_date`) VALUES
(1, 'Молоко домашнее', 'С села', 1, 1, 'л.', 15, 9.53, '2015-01-26', '2015-01-31'),
(2, 'Синеглазка', 'Картошка синяя', 2, 1, 'кг.', 15, 4.4, '2015-01-01', '2015-03-31'),
(3, 'mirkill', 'ываыва', 0, 1, 'шт.', 16, 3, '2015-02-12', '2015-02-26'),
(4, 'mirkill', 'ываыва', 0, 1, 'шт.', 16, 3, '2015-02-12', '2015-02-26'),
(5, 'mirkill', 'ываыва', 0, 1, 'шт.', 16, 3, '2015-02-12', '2015-02-26'),
(6, 'Классный рис', 'Ну обалденный просто', 0, 1, 'кг.', 18, 77.8, '2015-02-01', '2018-02-01');

-- --------------------------------------------------------

--
-- Структура таблицы `food__category`
--

DROP TABLE IF EXISTS `food__category`;
CREATE TABLE IF NOT EXISTS `food__category` (
  `id` int(3) NOT NULL,
  `parent_id` int(5) unsigned NOT NULL DEFAULT '0',
  `name` char(254) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `food__category`
--

INSERT INTO `food__category` (`id`, `parent_id`, `name`, `description`) VALUES
(1, 0, 'Бакалея', 'Макароны | Макароны элит | Рис | Рис элит | Гречка | Манка | Пшено | Ячневая | Кукурузная | Пшеничная | Перловка | Бобовые | Мука | Мучные смеси | Хлопья | Мюсли | Полуфабрикаты: завтраки | Полуфабрикаты: каша | Полуфабрикаты: пюре | Полуфабрикаты: супы | Полуфабрикаты: вермишель | Полуфабрикаты: попкорн | Полуфабрикаты: другое | Кондитерские ингредиенты | Желе, кисель | Дрожжи | Сахар | Соль | Сахар раф., пресс.'),
(2, 0, 'Молочные продукты', 'Молоко | Кефир | Ряжанка | Сметана | Сливки | Закваска | Коктейли | Йогурт | Йогурт питьевой | Творог | Творожные | Сырок глазированный | Другие м/продукты | Сыр импорт | Сыр Украина | Сыр мягкий'),
(3, 0, 'Мясо', 'Птица | Свинина | Говядина | Баранина | Кролик | Фарш | Мясные полуфабрикаты | Колбаса вареная | Сосиски | Сардельки | Колбаски | Колбаса варено-копченая | Колбаса полукопченая | Колбаса сыровяленная | Колбаса сырокопченая | Ветчина | Балыки | Бекон | Буженина | Птица готовая | Готовое мясо другое | Нарезка | Тушенка, мясные консервы | Мясные паштеты'),
(4, 0, 'Масла, яйца', 'Подсолнечное | Оливковое | Растительное другое | Сливочное | Смалец (животный жир) | Спред | Маргарин | Яйца'),
(5, 0, 'Фрукты, овощи, грибы', 'Овощи | Грибы | Зелень | Фрукты | Цитрусовые | Ягоды | Экзотика | Сушеные\nЧай, кофе, какао\nЧай черный | Чай черный пакеты | Чай зеленый | Чай белый | Чай травяной | Каркаде | Матэ | Чайные смеси | Кофе зерно | Кофе молотый | Кофе растворимый | Кофе стики | Кофейные напитки | Какао | Шоколад | Наборы чая'),
(6, 0, 'Заморозка', 'Мороженое | Мороженое семейная упаковка | Пицца | Тесто | Пельмени | Вареники | Блинчики | Мясная | Овощная | Фрукты, ягоды'),
(7, 0, 'Соус, заправки, приправы', 'Кетчуп | Майонез | Аджика | Горчица | Хрен | Другие соусы | Десертные соусы | Заправки | Уксус | Перец | Приправы | Лавровый лист | Пряные травы | Кокосовое молоко'),
(8, 0, 'Консервация', 'Томаты | Огурцы | Баклажаны | Икра овощная | Другие овощные | Грибная | Горошек | Кукуруза | Фасоль | Маслины | Оливки | Ананасы | Варенья, джемы | Фруктовая, ягодная | Мед | Сгущенка'),
(9, 0, 'Рыба, морепродукты', 'Рыба охлажденная | Рыба морож. | Рыба соленая | Пресервы | Рыба копченая | Нарезка рыбная | Крабовые палочки | Креветки зам. | Морепродукты зам. | Рыбные полуфабрикаты | Рыбные консервы | Килька, бычки конс. | Сардина конс. | Шпроты | Треска | Тунец | Паштеты рыбные | Морепродукты консервы | Салаты | Икра | Икра элитная'),
(10, 0, 'Хлеб', 'Хлеб | Батон | Багет | Лаваш | Булочки | Сухари | Сушка, соломка | Хлебцы, галеты | Полуфабрикаты'),
(11, 0, 'Сладости', 'Новогодние подарки | Шоколад темный | Шоколад молочный | Шоколад белый | Батончики | Конфеты коробка | Конфеты фасованные | Конфеты вес. | Драже | Печенье | Крекер | Печенье вес. | Вафли | Пряники | Бисквит | Круассаны | Кекс | Рулеты | Пирожное | Торты | Мармелад | Зефир | Восток | Халва | Пасты, кремы | Жевательные конфеты | Жевательная резинка | Другие сладости\r\n'),
(12, 0, 'Соки, вода', 'Вода | Минералка | Сладкие газ. | Фруктовые напитки | Квас | Холодный чай | Соки | Нектары | Смузи | Детское шампанское | Сиропы, топинги'),
(13, 0, 'Цветы', 'Готовые букеты | Цветы поштучно | Для оформления букетов'),
(14, 0, 'Строй материалы', ''),
(15, 1, 'Макароны', ''),
(16, 1, 'Макароны элит', ''),
(17, 1, 'Рис', ''),
(18, 1, 'Рис элит', ''),
(19, 1, 'Гречка', '');

-- --------------------------------------------------------

--
-- Структура таблицы `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(5) NOT NULL,
  `address` char(255) NOT NULL,
  `user_id` int(5) NOT NULL,
  `apt` int(11) NOT NULL,
  `lat` int(11) NOT NULL,
  `photo` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `locations`
--

INSERT INTO `locations` (`id`, `address`, `user_id`, `apt`, `lat`, `photo`) VALUES
(1, 'Ленина 52-а 14\r\nДомофон', 1, 544, 445, 0),
(2, 'Ленина 56 19\r\nДомофон', 1, 555, 555, 1),
(3, 'no addresses', 3, 0, 0, 0),
(4, 'no addresses', 3, 0, 0, 0),
(5, 'no addresses', 3, 0, 0, 0),
(6, 'no addresses', 3, 0, 0, 0),
(7, 'no addresses', 3, 0, 0, 0),
(8, 'no addresses', 3, 0, 0, 0),
(9, 'no addresses', 3, 0, 0, 0),
(10, 'no addresses', 3, 0, 0, 0),
(11, 'no addresses', 3, 0, 0, 0),
(12, 'no addresses', 3, 0, 0, 0),
(13, 'no addresses', 3, 0, 0, 0),
(14, 'no addresses', 3, 0, 0, 0),
(15, 'no addresses', 3, 0, 0, 0),
(16, 'no addresses', 3, 0, 0, 0),
(17, 'no addresses', 3, 0, 0, 0),
(18, 'no addresses', 3, 0, 0, 0),
(19, 'no addresses', 3, 0, 0, 0),
(20, 'fsdfsd', 1, 0, 0, 0),
(21, 'fsdfsd', 1, 0, 0, 0),
(22, 'fsdfsd', 1, 0, 0, 0),
(23, 'fsdfsd', 1, 0, 0, 0),
(24, 'fffff', 1, 0, 0, 0),
(25, 'fffff', 1, 0, 0, 0),
(26, 'fffff', 1, 0, 0, 0),
(27, 'fffff', 1, 0, 0, 0),
(28, 'fffff', 1, 0, 0, 0),
(29, 'fffff', 1, 0, 0, 0),
(30, 'Kotikova str.', 4, 0, 0, 0),
(31, '', 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coments` varchar(254) NOT NULL,
  `price` float NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user`, `status`, `location`, `created_at`, `updated_at`, `coments`, `price`, `ip`) VALUES
(1, 1, 1, 1, '2015-02-05 00:00:00', '2015-02-05 19:13:58', '', 553, ''),
(2, 3, 1, 7, '0000-00-00 00:00:00', '2015-02-05 21:21:32', 'coment', 35.2, '127.0.0.1'),
(3, 3, 1, 8, '0000-00-00 00:00:00', '2015-02-05 21:22:34', 'coment', 35.2, '127.0.0.1'),
(4, 3, 1, 9, '0000-00-00 00:00:00', '2015-02-05 21:24:39', 'coment', 35.2, '127.0.0.1'),
(5, 3, 1, 12, '0000-00-00 00:00:00', '2015-02-05 21:27:03', 'coment', 35.2, '127.0.0.1'),
(6, 3, 1, 13, '0000-00-00 00:00:00', '2015-02-05 21:36:06', 'coment', 35.2, '127.0.0.1'),
(7, 3, 1, 16, '2015-02-05 23:37:11', '2015-02-05 21:37:11', 'coment', 35.2, '127.0.0.1'),
(8, 3, 1, 17, '2015-02-05 23:38:28', '2015-02-05 21:38:28', 'coment', 35.2, '127.0.0.1'),
(9, 3, 1, 18, '2015-02-05 23:49:07', '2015-02-05 21:49:07', 'coment', 35.2, '127.0.0.1'),
(10, 3, 1, 19, '2015-02-05 23:49:17', '2015-02-05 21:49:17', 'coment', 35.2, '127.0.0.1'),
(11, 1, 1, 20, '2015-02-05 23:50:22', '2015-02-05 21:50:22', 'test', 63.79, '127.0.0.1'),
(12, 1, 1, 21, '2015-02-05 23:54:07', '2015-02-05 21:54:07', 'test', 63.79, '127.0.0.1'),
(13, 1, 3, 22, '2015-02-05 23:54:11', '2015-02-05 21:54:11', 'test', 63.79, '127.0.0.1'),
(14, 1, 1, 23, '2015-02-05 23:55:17', '2015-02-05 21:55:17', 'test', 63.79, '127.0.0.1'),
(15, 1, 1, 24, '2015-02-05 23:55:56', '2015-02-05 21:55:56', 'no', 63.79, '127.0.0.1'),
(16, 1, 1, 25, '2015-02-05 23:56:54', '2015-02-05 21:56:54', 'no', 63.79, '127.0.0.1'),
(17, 1, 1, 26, '2015-02-05 23:56:57', '2015-02-05 21:56:57', 'no', 63.79, '127.0.0.1'),
(18, 1, 1, 27, '2015-02-05 23:57:10', '2015-02-05 21:57:10', 'no', 63.79, '127.0.0.1'),
(19, 1, 1, 28, '2015-02-05 23:57:31', '2015-02-05 21:57:31', 'no', 63.79, '127.0.0.1'),
(20, 1, 1, 29, '2015-02-05 23:57:52', '2015-02-05 21:57:52', 'no', 63.79, '127.0.0.1'),
(21, 4, 1, 30, '2015-02-06 16:38:06', '2015-02-06 14:38:06', 'все пучком', 108.5, '127.0.0.1'),
(22, 5, 1, 31, '2015-02-07 00:08:48', '2015-02-06 22:08:48', '', 60.12, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `order__detail`
--

DROP TABLE IF EXISTS `order__detail`;
CREATE TABLE IF NOT EXISTS `order__detail` (
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order__detail`
--

INSERT INTO `order__detail` (`order_id`, `food_id`, `qty`, `price`, `subtotal`) VALUES
(1, 1, 3, 33, 0),
(10, 2, 8, 4, 35),
(11, 2, 8, 4, 35),
(11, 1, 3, 10, 29),
(12, 2, 8, 4, 35),
(12, 1, 3, 10, 29),
(13, 2, 8, 4, 35),
(13, 1, 3, 10, 29),
(14, 2, 8, 4, 35),
(14, 1, 3, 10, 29),
(15, 2, 8, 4, 35),
(15, 1, 3, 10, 29),
(16, 2, 8, 4, 35),
(16, 1, 3, 10, 29),
(17, 2, 8, 4, 35),
(17, 1, 3, 10, 29),
(18, 2, 8, 4, 35),
(18, 1, 3, 10, 29),
(19, 2, 8, 4, 35),
(19, 1, 3, 10, 29),
(20, 2, 8, 4, 35),
(20, 1, 3, 10, 29),
(21, 1, 10, 10, 95),
(21, 2, 3, 4, 13),
(22, 1, 4, 10, 38),
(22, 2, 5, 4, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `order__status`
--

DROP TABLE IF EXISTS `order__status`;
CREATE TABLE IF NOT EXISTS `order__status` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `short` varchar(54) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order__status`
--

INSERT INTO `order__status` (`id`, `name`, `short`) VALUES
(1, 'Ожидает подтверждения', 'Ожидайте звонка оператора'),
(2, 'Формируется', 'Упаковщик формирует ваш заказ'),
(3, 'Ожидает отправки', 'Заказ сформирован и ожидает времени отправление'),
(4, 'Доставляется', 'Заказ в пути'),
(5, 'Завершен', 'Заказ успешно выполнен'),
(6, 'Отклонен', 'Пользователь отказался от заказа'),
(7, 'Отменен', 'Отменен администратором');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `path` varchar(256) NOT NULL,
  `alt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `food_id` int(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price_history`
--

DROP TABLE IF EXISTS `price_history`;
CREATE TABLE IF NOT EXISTS `price_history` (
  `food_id` int(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(4) NOT NULL,
  `phone` char(10) NOT NULL,
  `first_name` char(15) DEFAULT NULL,
  `last_name` char(15) DEFAULT NULL,
  `email` char(32) NOT NULL,
  `photo` char(128) DEFAULT NULL,
  `role_id` int(3) unsigned NOT NULL DEFAULT '1' COMMENT '0 user',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `bonus` decimal(2,2) NOT NULL DEFAULT '0.00',
  `notes` char(255) DEFAULT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `phone`, `first_name`, `last_name`, `email`, `photo`, `role_id`, `blocked`, `bonus`, `notes`, `password`) VALUES
(1, '0938787172', 'Yevgeniy', 'Sidelnikov', 'to.MegBeg@gmail.com', NULL, 3, 0, 0.00, NULL, '202cb962ac59075b964b07152d234b70'),
(2, '7777777776', 'ivan', 'testov', '', NULL, 0, 0, 0.00, NULL, ''),
(3, '7777777777', 'ivan', 'testov', '', NULL, 0, 0, 0.00, NULL, ''),
(4, '0934078494', 'Juls', 'Myrmiy', '', NULL, 0, 0, 0.00, NULL, ''),
(5, '', '', '', '', NULL, 0, 0, 0.00, NULL, '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(2) NOT NULL,
  `name` char(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'worker'),
(3, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `food__category`
--
ALTER TABLE `food__category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order__detail`
--
ALTER TABLE `order__detail`
  ADD KEY `order_id` (`order_id`,`food_id`);

--
-- Индексы таблицы `order__status`
--
ALTER TABLE `order__status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD KEY `food_id` (`food_id`,`updated_at`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `food__category`
--
ALTER TABLE `food__category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `order__status`
--
ALTER TABLE `order__status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;