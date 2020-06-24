-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2020 г., 20:46
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoppp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(20) NOT NULL,
  `categories_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_categories`, `categories_name`) VALUES
(1, 'Велосипеды'),
(2, 'Защита'),
(3, 'Аксесуары'),
(4, 'Инструменты');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--
-- Структура чтения ошибок для таблицы shoppp.images: #1932 - Table 'shoppp.images' doesn't exist in engine
-- Ошибка считывания данных таблицы shoppp.images: #1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shoppp`.`images`' на строке 1

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_status` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `id_status`) VALUES
(41, 97, 4),
(44, 97, 4),
(54, 97, 3),
(55, 97, 3),
(56, 97, 3),
(57, 97, 1),
(58, 99, 1),
(59, 99, 1),
(60, 97, 1),
(61, 97, 1),
(62, 99, 4),
(63, 67, 3),
(64, 67, 4),
(65, 67, 3),
(66, 67, 3),
(67, 100, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_products`
--

CREATE TABLE `orders_products` (
  `id_order` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `count_product` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_products`
--

INSERT INTO `orders_products` (`id_order`, `id_product`, `count_product`) VALUES
(41, 1, 1),
(41, 2, 2),
(44, 1, 3),
(54, 2, 3),
(55, 1, 1),
(56, 2, 3),
(57, 1, 3),
(57, 2, 1),
(60, 1, 1),
(60, 4, 3),
(61, 1, 1),
(61, 3, 1),
(62, 1, 2),
(62, 3, 1),
(62, 4, 1),
(62, 5, 1),
(63, 1, 1),
(63, 2, 1),
(64, 1, 1),
(64, 2, 1),
(64, 3, 3),
(64, 4, 1),
(64, 5, 2),
(64, 6, 1),
(65, 1, 1),
(66, 1, 2),
(66, 6, 3),
(67, 3, 4),
(67, 4, 2),
(67, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `params`
--
-- Структура чтения ошибок для таблицы shoppp.params: #1932 - Table 'shoppp.params' doesn't exist in engine
-- Ошибка считывания данных таблицы shoppp.params: #1064 - У вас ошибка в запросе. Изучите документацию по используемой версии MariaDB на предмет корректного синтаксиса около 'FROM `shoppp`.`params`' на строке 1

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(20) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_added` datetime(6) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `id_categories`, `product_name`, `description`, `date_added`, `producer`, `price`) VALUES
(1, 1, 'Велосипед Тамогавк228', 'Уникальный алгоритм сборки, алюминевая рама', NULL, 'ОООГазпром', 14634),
(2, 1, 'Велосипед гномовед', 'Данный велосипед изготавливали опытнейшие гнобы фростхейма, из лучшей зачарованной стали, благодаря чему он имеет крайне малый вес и даже может летать о-о', NULL, 'ООО Фростхейм', 99999),
(3, 3, 'Перчатки спортивные Юла', 'Синие перчатки для настоящих спортсменов', NULL, 'ОООГазпром', 399),
(4, 3, 'Перчатки спортивные Матрёшка', 'Синие перчатки для настоящих спортсменов', NULL, 'ОООГазпром', 399),
(5, 3, 'Перчатки спортивные красная цена', 'Синие перчатки для настоящих спортсменов', NULL, 'ОООГазпром', 199),
(6, 1, 'Велосипед корона', 'Был хороший\r\nПока не начал продаваться', NULL, 'Китай', 100),
(7, 2, 'Защита', 'Защищает', NULL, 'ООО моя оборона', 10000),
(10, 1, '1234', '1234567', NULL, '15245', 1000),
(11, 1, 'йцукен', 'sgdsfg', NULL, '324', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(20) NOT NULL,
  `id_product` int(20) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `raiting` varchar(255) DEFAULT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id_review`, `id_product`, `text`, `raiting`, `username`) VALUES
(2, 6, 'Норм', '+', 'Sergey'),
(5, 1, 'Хороший тоовар', '+', 'Sergey');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id_status` int(20) NOT NULL,
  `name_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id_status`, `name_status`) VALUES
(1, 'Ожидает оплаты'),
(3, 'Оплачен'),
(4, 'Доставлено');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_user_type` int(20) NOT NULL,
  `phone_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `password`, `email`, `id_user_type`, `phone_number`) VALUES
(67, 'Sergey', 'Alekseev', '$2y$10$A0/X6UqbFHfX/DRyLTh1YeqIMEQ.z1kEuPtbWqv2IfqpDwvP2z/Tm', 'cepa99@yandex.ru', 2, '89206434252'),
(93, 'Сергей', 'Алексеев', '$2y$10$cRFNJ6xFhdDG9VPGgLPd..b2immf7vRxDTDutQBJizk41/3MBQEDe', 'cepa99@mail.ru', 1, '333178'),
(96, '1', '1', '$2y$10$aHGhatNzdlU2yA1.SOvrN.gXqTMvhUIsaLG7EwE3NN0fc8PS8sLqC', 'ce@sd.sdf', 1, '1'),
(97, 'Василий', 'Михайлов', '$2y$10$sGlUSN0aK0ytJFblJ/8YCexzvMqX/5Up8xTu3BT6DE1AG91xFaMsC', 'chippa99@mail.ru', 2, '8930381422'),
(98, 'ff', 'erdf', '$2y$10$PqbpRQlnVCtZwMh.w7Ob/us5R7YL99.FfS3R9atQHg3n4ncuN6GDC', 'vvvv@mail.ru', 1, '44444'),
(99, 'ff', 'erdf', '$2y$10$nCHVglni83avynWhLRENEuPZXLu/NkV6hZj35wlSpNG.oPw7OBt7S', 'hhhh@mail.ru', 1, '44444'),
(100, 'Сергей', 'Alekseev', '$2y$10$j5BAmW9xaVvcTD1zkRMGSeG2sjXhMVS4N/XMfvko1F3Ygpiv8uNUS', '99@u.r', 1, '333178');

-- --------------------------------------------------------

--
-- Структура таблицы `user_products`
--

CREATE TABLE `user_products` (
  `id_userproducts` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_products` int(20) NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_products`
--

INSERT INTO `user_products` (`id_userproducts`, `id_user`, `id_products`, `count`) VALUES
(86, 67, 2, 1),
(102, 100, 3, 1),
(103, 100, 3, 1),
(108, 67, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_types`
--

CREATE TABLE `user_types` (
  `id_user_type` int(20) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_types`
--

INSERT INTO `user_types` (`id_user_type`, `type_name`) VALUES
(1, 'user'),
(2, 'moder');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_type` (`id_user_type`);

--
-- Индексы таблицы `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id_userproducts`),
  ADD KEY `id_products` (`id_user`,`id_products`),
  ADD KEY `id_products_2` (`id_products`);

--
-- Индексы таблицы `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id_user_type`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT для таблицы `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id_userproducts` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT для таблицы `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id_user_type` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `orders_products_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `orders_products_ibfk_4` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_type`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_type`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_type`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_user_type`) REFERENCES `user_types` (`id_user_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
