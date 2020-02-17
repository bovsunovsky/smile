-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 17 2020 г., 10:12
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.0.33-14+0~20191218.25+debian9~1.gbpae1889

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `study_db2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(6) NOT NULL,
  `name_ru` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `name_en` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `description_ru` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name_ru`, `name_en`, `description_ru`, `description_en`, `status`) VALUES
(1, 'Категрия 1', 'Category 1', 'описание категории 1', 'description for category 1', 1),
(2, 'Категория 2', 'Category 2', '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(6) NOT NULL,
  `product_id` int(6) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(150) DEFAULT NULL,
  `created_at` int(12) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `product_id`, `user_name`, `user_email`, `created_at`, `status`, `comment`) VALUES
(1, 1, 'User111', 'asd@asd.sa', 1581866122, 1, '++'),
(14, 1, 'Кто-то', 'ggg@ddd.rr', 1581882256, 1, 'И ещё один коммент =))'),
(15, 1, 'Очередной', 'asd@dfg.tt', 1581926796, 1, 'Следующий  коментарий  !!');

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` smallint(6) NOT NULL DEFAULT '0',
  `date_update` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `url`, `local`, `name`, `default`, `date_update`, `date_create`) VALUES
(1, 'en', 'en-EN', 'EN', 0, 1499416277, 1499416277),
(2, 'ru', 'ru-RU', 'RU', 1, 1499416277, 1499416277);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(5) DEFAULT NULL,
  `name_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_ru` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description_ru` text CHARACTER SET utf8 NOT NULL,
  `description_en` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name_en`, `name_ru`, `description_ru`, `description_en`, `status`, `image`) VALUES
(1, 1, 'Product 1', 'Продукт 1', 'Описание продукта 1', 'Description for product 1', 1, 'demo_FDRWES.png'),
(2, 2, 'Product 2', 'Продукт 2', 'описание продукта 2', 'description for poduct 2', 1, 'w3logo_bwdsvF.jpeg'),
(3, 1, 'Product 3', 'Продукт 3', 'Описание для продукта 3', 'Description for product 3', 1, 'diahrama_xB3bAA.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
