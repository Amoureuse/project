-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 25 2019 г., 18:16
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(15,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `disc` int(11) NOT NULL,
  `image` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `price`, `stock`, `disc`, `image`) VALUES
(1, 'Монитор', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1200.00', 5, 10, 'https://c.radikal.ru/c31/1901/61/845ca0bec2d4.jpg'),
(2, 'Компьютер', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '4200.00', 7, 10, 'https://d.radikal.ru/d17/1812/9f/ca893de8f555.jpg'),
(3, 'Ноутбук', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '7700.00', 2, 10, 'https://c.radikal.ru/c09/1812/dc/3e953e8da20d.jpg'),
(4, 'Принтер', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1800.00', 1, 10, 'https://d.radikal.ru/d17/1812/07/849f6c4a6485.jpg'),
(5, 'Стол', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1100.00', 0, 20, ''),
(6, 'Стул', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '2200.00', 0, 20, ''),
(7, 'Шкаф', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '1260.00', 8, 20, 'https://i.ibb.co/ZGdGZX9/wardrobe.png'),
(8, 'Кресло', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '4250.00', 9, 20, 'https://c.radikal.ru/c42/1812/c1/d7d291dc65f0.jpg'),
(9, 'Диван', 'Some quick example text to build on the card title and make up the bulk of the card\'s content.', '9800.00', 1, 30, ''),
(10, 'Телефон', 'onePlus v2.0', '12000.00', 4, 15, 'https://a.radikal.ru/a10/1901/e6/f4305856edf7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `avatar`, `role`) VALUES
(1, 'Dreams', 'Dead_dreams21@mail.ru', '$2y$10$yiMYm0fwSeMPscT2REF7Zus6jsNgXhXpXZorPpU0gKb4ck4IDDG.O', 'c4ca4238a0b923820dcc509a6f75849b.jpg', 'user'),
(2, 'Amoureuse', 'Amoureuse@mail.ru', '$2y$10$T0xg91gjklRGTh7QIKn4Ou.ELIR06x8gW3.EcykizhwrApJsTuW5y', 'c81e728d9d4c2f636f067f89cc14862c.jpg', 'admin'),
(17, 'Amoure', 'Amoureuse111@mail.ru', '$2y$10$5MdO7brCGmK3RhtZNp4Rr.C9n4vT0h2.G8V0sd0mY7Vx69xJfq77m', '', 'user'),
(18, 'Amoureuse', 'natysikpw1@gmail.com', '$2y$10$MgZdErkjnlXfJGk6CHMdIOQN67hJa1EYv2lPlXWmfvboY2DemkqXq', '', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
