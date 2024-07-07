-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2024 г., 23:55
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_club`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name_tariff` varchar(255) DEFAULT NULL,
  `name_tar` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `use_not` enum('доступна','использован') DEFAULT 'доступна',
  `booked_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id`, `user_id`, `name_tariff`, `name_tar`, `time`, `use_not`, `booked_at`) VALUES
(1, 16, 'standart', NULL, '2024-06-04 21:16:19', 'доступна', '2024-06-09 18:41:53'),
(2, 16, 'standart', NULL, '2024-06-04 21:21:00', 'доступна', '2024-06-09 18:41:53'),
(3, 16, 'standart', NULL, '2024-06-04 21:21:04', 'доступна', '2024-06-09 18:41:53'),
(4, 16, 'standart', NULL, '2024-06-04 21:21:16', 'доступна', '2024-06-09 18:41:53'),
(5, 16, '', NULL, '2024-06-04 21:26:41', 'доступна', '2024-06-09 18:41:53'),
(6, 16, 'standart', NULL, '2024-06-04 21:27:30', 'доступна', '2024-06-09 18:41:53'),
(7, 16, 'standart', NULL, '2024-06-04 21:27:51', 'доступна', '2024-06-09 18:41:53'),
(8, 14, 'standart', NULL, '2024-06-04 21:28:30', 'доступна', '2024-06-09 18:41:53'),
(9, 14, 'standart', NULL, '2024-06-04 21:29:17', 'доступна', '2024-06-09 18:41:53'),
(10, 14, 'standart', NULL, '2024-06-04 21:29:46', 'доступна', '2024-06-09 18:41:53'),
(11, 14, 'standart', '2024-06-05 00:32:25', '2024-06-04 21:32:25', 'доступна', '2024-06-09 18:41:53'),
(12, 14, 'standart', NULL, '2024-06-04 21:34:19', 'доступна', '2024-06-09 18:41:53'),
(13, 11, 'vip', NULL, '2024-06-09 15:23:19', 'доступна', '2024-06-09 18:41:53'),
(14, 11, 'standart', NULL, '2024-06-09 15:37:01', 'доступна', '2024-06-09 18:41:53'),
(15, 16, 'standart', NULL, '2024-06-09 15:38:16', 'доступна', '2024-06-09 18:41:53'),
(16, 16, 'standart', NULL, '2024-06-09 20:55:24', 'доступна', '2024-06-09 23:55:24'),
(17, 16, 'standart', NULL, '2024-06-09 20:55:35', 'доступна', '2024-06-09 23:55:35'),
(18, 16, 'vip', NULL, '2024-06-09 20:57:11', 'доступна', '2024-06-09 23:57:11');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Не указано',
  `surname` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Не указано'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `Name`, `surname`) VALUES
(11, 'qsguk@mail.ru', '123', 'admin', 'Роман', 'мага'),
(14, 'qwe@qwe.ru', 'йфя', 'user', 'Влад', 'Рехаб'),
(15, 'qsguk@mail.ru', 'asd', 'user', 'Не указано', 'Не указано'),
(16, 'raz@mail.ru', 'qwe', 'user', 'Роман', 'Ярышкин'),
(17, 'qweqwe@mail.ru', 'qweasd', 'user', 'Роман', 'Огноь'),
(18, '123@123', '123', 'user', 'Не указано', 'Не указано');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
