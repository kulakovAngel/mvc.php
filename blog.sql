-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2020 г., 19:31
-- Версия сервера: 10.0.38-MariaDB
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
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`) VALUES
(1, 1, 'The First Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel odio ac lacus vulputate elementum. Praesent quis laoreet ipsum, vitae pulvinar magna. Aliquam congue, purus vel posuere gravida, lorem nibh hendrerit orci, viverra aliquam nunc arcu in nisl. Aliquam tincidunt magna non erat laoreet vehicula. Curabitur at accumsan arcu, rhoncus venenatis sem. Nulla facilisi. Proin auctor sodales dui ut egestas. Nunc commodo commodo sapien, nec porttitor dolor eleifend ac. Suspendisse consectetur neque id pulvinar vehicula. Nullam mollis ante sit amet dui viverra, porta accumsan est rutrum. Maecenas ac euismod dolor, et volutpat lorem.'),
(2, 1, 'Vasa\'s post', 'Quisque vestibulum metus et augue condimentum molestie. Curabitur porta blandit ultrices. Nam suscipit maximus ipsum ut dictum. Vivamus quis odio dolor. Vivamus ac urna quis lorem varius posuere. Sed risus augue, sagittis non ultricies quis, pretium eu lorem. Nam dapibus in dolor ac tincidunt. Morbi cursus convallis nibh id pharetra. Donec dapibus, leo quis cursus viverra, ligula tellus venenatis justo, eu volutpat ligula est nec felis. Integer egestas ipsum ut justo maximus maximus. Pellentesque non lobortis neque. Fusce ut lacus id felis hendrerit vulputate vitae non ipsum. Suspendisse ullamcorper pellentesque fringilla. Etiam est nisl, facilisis nec nunc vitae, malesuada venenatis tellus.'),
(5, 3, 'Posted By Admin', 'Quisque vestibulum metus et augue condimentum molestie. Curabitur porta blandit ultrices. Nam suscipit maximus ipsum ut dictum. Vivamus quis odio dolor. Vivamus ac urna quis lorem varius posuere. Sed risus augue, sagittis non ultricies quis, pretium eu lorem. Nam dapibus in dolor ac tincidunt. Morbi cursus convallis nibh id pharetra. Donec dapibus, leo quis cursus viverra, ligula tellus venenatis justo, eu volutpat ligula est nec felis. Integer egestas ipsum ut justo maximus maximus. Pellentesque non lobortis neque. Fusce ut lacus id felis hendrerit vulputate vitae non ipsum. Suspendisse ullamcorper pellentesque fringilla. Etiam est nisl, facilisis nec nunc vitae, malesuada venenatis tellus.'),
(6, 13, 'test', 'Aliquam metus libero, iaculis vestibulum ornare quis, porta ut massa. Donec congue magna ultricies tellus viverra, id ultricies sem congue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut ut dolor lacus. Integer consectetur imperdiet nibh ac ornare. Duis lobortis ipsum sit amet aliquet aliquet. Aenean feugiat nulla pretium tellus malesuada, in dapibus risus tempus. Proin tincidunt tellus quis nibh maximus pharetra. Phasellus iaculis aliquet facilisis.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rights` tinyint(3) UNSIGNED NOT NULL COMMENT '0 - unregistered, 1 - author, 2 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `rights`) VALUES
(1, 'vasa', 'vasa', 1),
(2, 'ivan', 'pass', 1),
(3, 'valery', '123', 2),
(13, 'a', 'a', 1),
(14, 'q', 'q', 1),
(15, 'z', 'z', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
