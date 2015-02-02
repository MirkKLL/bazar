-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 02 2015 г., 19:58
-- Версия сервера: 5.5.41-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `baza`
--
DROP DATABASE `baza`;

-- --------------------------------------------------------

--
-- Структура таблицы `food`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `food`
--

INSERT INTO `food` (`id`, `name`, `description`, `photo_id`, `amount`, `measure`, `category`, `last_price`, `prod_date`, `expire_date`) VALUES
(1, 'Молоко домашнее', 'С села', 1, 1, 'л.', 2, 9.53, '2015-01-26', '2015-01-31'),
(2, 'Синеглазка', 'Картошка синяя', 2, 1, 'кг.', 1, 4.4, '2015-01-01', '2015-03-31');

-- --------------------------------------------------------

--
-- Структура таблицы `food__category`
--

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
(1, 0, 'Балаклея', 'Макароны | Макароны элит | Рис | Рис элит | Гречка | Манка | Пшено | Ячневая | Кукурузная | Пшеничная | Перловка | Бобовые | Мука | Мучные смеси | Хлопья | Мюсли | Полуфабрикаты: завтраки | Полуфабрикаты: каша | Полуфабрикаты: пюре | Полуфабрикаты: супы | Полуфабрикаты: вермишель | Полуфабрикаты: попкорн | Полуфабрикаты: другое | Кондитерские ингредиенты | Желе, кисель | Дрожжи | Сахар | Соль | Сахар раф., пресс.'),
(2, 0, 'Молочные продукты', 'Молоко | Кефир | Ряжанка | Сметана | Сливки | Закваска | Коктейли | Йогурт | Йогурт питьевой | Творог | Творожные | Сырок глазированный | Другие м/продукты | Сыр импорт | Сыр Украина | Сыр мягкий'),
(3, 0, 'Мясо, мясопродукты', 'Птица | Свинина | Говядина | Баранина | Кролик | Фарш | Мясные полуфабрикаты | Колбаса вареная | Сосиски | Сардельки | Колбаски | Колбаса варено-копченая | Колбаса полукопченая | Колбаса сыровяленная | Колбаса сырокопченая | Ветчина | Балыки | Бекон | Буженина | Птица готовая | Готовое мясо другое | Нарезка | Тушенка, мясные консервы | Мясные паштеты'),
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

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(5) NOT NULL,
  `address` char(255) NOT NULL,
  `user_id` int(5) NOT NULL,
  `apt` int(11) NOT NULL,
  `lat` int(11) NOT NULL,
  `photo` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `locations`
--

INSERT INTO `locations` (`id`, `address`, `user_id`, `apt`, `lat`, `photo`) VALUES
(1, 'Ленина 52-а 14\r\nДомофон', 1, 544, 445, 0),
(2, 'Ленина 56 19\r\nДомофон', 1, 555, 555, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coments` varchar(254) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order__detail`
--

CREATE TABLE IF NOT EXISTS `order__detail` (
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order__status`
--

CREATE TABLE IF NOT EXISTS `order__status` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `short` varchar(54) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `path` varchar(256) NOT NULL,
  `alt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `food_id` int(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price_history`
--

CREATE TABLE IF NOT EXISTS `price_history` (
  `food_id` int(5) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `phone`, `first_name`, `last_name`, `email`, `photo`, `role_id`, `blocked`, `bonus`, `notes`, `password`) VALUES
(1, '0938787172', 'Yevgeniy', 'Sidelnikov', 'to.MegBeg@gmail.com', NULL, 3, 0, 0.00, NULL, '202cb962ac59075b964b07152d234b70');

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
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `food`
--
ALTER TABLE `food`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `food__category`
--
ALTER TABLE `food__category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;