-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 03 2020 г., 19:22
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(10) UNSIGNED NOT NULL,
  `feed_login` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `feed_email` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`feed_id`, `feed_login`, `feed_email`, `subject`, `message`) VALUES
(1, 'edwardasnl@mail.ru', 'edwardasnl@mail.ru', 'Ну как там с деньгами', 'dfdf'),
(2, 'Эдуард', 'edwardasnl@mail.ru', 'Защищенность данных', 'хауди-хо'),
(3, 'edwardasnl', 'edwardasnl@mail.ru', 'dfdsf', 'fsdfdsf'),
(12, '', '', '', ''),
(13, 'edwardasnl', '', '', ''),
(14, 'edwardasnl', '', '', ''),
(15, 'EdwardASNL17', '', '', ''),
(16, 'EdwardASNL17', 'edwardasnl@mail.ru', 'Ну как там с деньгами', 'rdsfsdfdsfdsf'),
(17, 'EdwardASNL17', 'edwardasnl@mail.ru', 'Ну как там с деньгами', 'rdsfsdfdsfdsf'),
(18, 'EdwardASNL17', 'edwardasnl@mail.ru', 'Ну как там с деньгами', 'rdsfsdfdsfdsf'),
(19, 'EdwardASNL17', 'dfdsfdsf@mail.ru', 'fsdf', 'fdsf'),
(20, 'edwardasnl', 'dfdsfdsf@mail.ru', 'Ну как там с деньгами', 'fgsdfsdf'),
(21, 'edwardasnl@mail.ru', 'didenkovladislav@rambler.ru', 'fsdf', 'fdsfdsf'),
(22, 'e.tyan@zebragroup.ru', 'e.tyan@zebragroup.ru', 'Защищенность данных', 'vcgsfds'),
(23, 'ViP_ПуЛи_ОТ_ДеДюЛи', 'e.tyan@zebragroup.ru', 'Защищенность данных', 'кодировка'),
(24, 'ViP_ПуЛи_ОТ_ДеДюЛи', 'dfdsfdsf@mail.ru', 'Ну как там с деньгами', 'фаыва'),
(25, 'ViP_ПуЛи_ОТ_ДеДюЛи', 'didenkovladislav@rambler.ru', 'Защищенность данных', 'fdsfds');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `question_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_name`) VALUES
(1, 1, 'Вам сложно представить себя другим людям.'),
(2, 1, 'Вы очень часто так погружаетесь в свои мысли, что не замечаете или забываете об окружающих вас людях.'),
(3, 1, 'Вам легко оставаться уравновешенным и сконцентрированным даже в напряженной обстановке.'),
(5, 1, 'Вы, как правило, не начинаете разговор.');

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `name`, `comment`) VALUES
(1, 'Тест личности', 'Оценивает ваше психологическое состояние и те или иные склонности');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`) VALUES
(19, 'edwardasnl@mail.ru', 'EdwardASNL17', '25d55ad283aa400af464c76d713c07ad');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `feed_id` (`feed_id`),
  ADD KEY `feed_login` (`feed_login`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
