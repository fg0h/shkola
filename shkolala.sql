-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2025 г., 23:38
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shkolala`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complexity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `complexity`, `language`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Английский для начинающих', 'Начальный', 'Английский', '3 месяца', '2025-06-03 23:20:21', '2025-06-03 23:20:21'),
(2, 'Разговорный английский', 'Средний', 'Английский', '4 месяца', '2025-06-03 23:20:21', '2025-06-03 23:20:21'),
(4, 'Французский язык', 'Начальный', 'Французский', '5 месяцев', '2025-06-03 23:20:21', '2025-06-03 23:20:21'),
(5, 'Испанский для путешествий', 'Средний', 'Испанский', '3 месяца', '2025-06-03 23:20:21', '2025-06-03 23:20:21'),
(6, 'Французский язык', 'Средний', 'Французский', '4 месяца', '2025-06-04 00:05:02', '2025-06-04 00:05:02'),
(7, 'Китайский язык', 'Сложный', 'Китайский', '5 месяцев', '2025-06-04 00:05:02', '2025-06-04 00:05:02'),
(8, 'Деловой английский', 'Сложный', 'Английский', '6 месяцев', '2025-06-14 16:10:44', '2025-06-14 16:10:44'),
(9, 'Немецкий для начинающих', 'Начальный', 'Немецкий', '4 месяца', '2025-06-14 16:10:44', '2025-06-14 16:10:44'),
(10, 'Итальянский язык', 'Средний', 'Итальянский', '3 месяца', '2025-06-14 16:10:44', '2025-06-14 16:10:44');

-- --------------------------------------------------------

--
-- Структура таблицы `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `value` int(11) NOT NULL CHECK (`value` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `number`, `student_id`, `teacher_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Английский A1', '101', 19, 15, 1, '2025-06-18 07:00:00', '2025-06-18 07:00:00'),
(2, 'Разговорный английский B1', '102', 20, 15, 2, '2025-06-18 07:05:00', '2025-06-18 07:05:00'),
(3, 'Французский A1', '103', 21, 11, 4, '2025-06-18 07:10:00', '2025-06-18 07:10:00'),
(4, 'Испанский для путешествий', '104', 22, 12, 5, '2025-06-18 07:15:00', '2025-06-18 07:15:00');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1748991590),
('m250603_225753_create_shkolala_tables', 1748991713),
('m250603_231910_seed_language_school_data', 1748992821);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL CHECK (`status` in ('paid','pending','canceled')),
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `raspisanie`
--

CREATE TABLE `raspisanie` (
  `id` int(11) NOT NULL,
  `time` time(6) NOT NULL,
  `den_nedeli` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `raspisanie`
--

INSERT INTO `raspisanie` (`id`, `time`, `den_nedeli`, `group_id`, `user_id`) VALUES
(1, '10:00:00.000000', 'Понедельник', 1, 3),
(2, '12:00:00.000000', 'Среда', 2, 7),
(3, '14:00:00.000000', 'Вторник', 3, 9),
(4, '16:00:00.000000', 'Четверг', 4, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `user_id`, `email`, `country`, `city`) VALUES
(19, 12, 'maria.kov@example.com', 'Россия', 'Москва'),
(20, 13, 'ivan.orlov@example.com', 'Россия', 'Санкт-Петербург'),
(21, 14, 'daria.moroz@example.com', 'Россия', 'Новосибирск'),
(22, 15, 'nikita.sokolov@example.com', 'Россия', 'Екатеринбург');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `specialty`, `education`) VALUES
(9, 11, 'Английский язык', 'МГУ, факультет иностранных языков'),
(10, 10, 'Немецкий язык', 'СПбГУ, педагогический факультет'),
(11, 9, 'Французский язык', 'МГПУ, факультет гуманитарных наук'),
(12, 8, 'Испанский язык', 'РГГУ, кафедра лингвистики'),
(13, 5, 'Китайский язык', 'ДВФУ, факультет востоковедения'),
(14, 6, 'Японский язык', 'ТГУ, лингвистический факультет'),
(15, 7, 'Русский язык как иностранный', 'МПГУ, филологический факультет');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_birthd` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `date_birthd`, `phone`, `email`, `role`) VALUES
(1, 'fgh', '$2y$13$Wo8FL6cnAW2iRORfukrZa.rFu825BOZppEdNNnMkdFkPF6vPimMhO', 'Валерия', 'Грибанова', '2006-10-12', '+7 (951) 270 24 86', 'gribanovavaleria219@gmail.com', 0),
(2, 'fgh', '$2y$13$K9mIvEXWeQV8klgnD1iebuMzMxOZS2QZtX8e.0TW2TE8x.0crMVba', 'Admin', 'Admin', '2005-10-10', '+7 (951) 270 24 86', 'gribanovavaleria219@gmail.com', 0),
(3, 'alina', '$2y$13$MaOVZd0n5qbX0eh1s4duJeEILZkO.vkIm5BrLyjDxV6vXrnJaCIN6', 'Свиридова', 'Алина', '2006-11-30', '+7 (567) 865 43 34', 'alina@mail.ru', 2),
(4, 'danya', '$2y$13$/cK760rfkUOpdu6d1eeY5e3N5oSh7xKO/OfI47RRPfrRwisKECCR2', 'миа', 'авмавм', '2007-01-10', '+7 (434) 434 34 34', '43645@email.ru', 0),
(5, 'danya', '$2y$13$suu/6hc7oxzfrGLFKo3dpOAXmPCcKBd4b7oH959j8UCSsOWoMGIqC', 'Данил', 'Миронов', '2003-05-05', '+7 (434) 434 34 34', '43645@email.ru', 1),
(6, 'danya', '$2y$13$UPGnwcJ1A9Q.LFxO/zQSBebTVhwMDsJi8diGuR6IwcYJBumgLh1TC', 'Даниил', 'Абрамов', '2007-01-10', '+7 (434) 434 34 34', 'rgdf@email.ru', 1),
(7, 'teacher_anna', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Анна', 'Иванова', '1985-06-15', '+7 (999) 123 45 67', 'anna.ivanova@example.com', 1),
(8, 'teacher_oleg', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Олег', 'Петров', '1982-03-22', '+7 (999) 234 56 78', 'oleg.petrov@example.com', 1),
(9, 'teacher_elena', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Елена', 'Смирнова', '1990-09-10', '+7 (999) 345 67 89', 'elena.smirnova@example.com', 1),
(10, 'teacher_kirill', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Кирилл', 'Кузнецов', '1988-12-01', '+7 (999) 456 78 90', 'kirill.kuznetsov@example.com', 1),
(11, 'teacher_olga', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'Ольга', 'Новикова', '1983-07-25', '+7 (999) 567 89 01', 'olga.novikova@example.com', 1),
(12, 'student_maria', '703b0a3d6ad75b649a28adde7d83c6251da457549263bc7ff45ec709b0a8448b', 'Мария', 'Ковальчук', '2002-05-10', '+7 (900) 123 45 67', 'maria.kov@example.com', 0),
(13, 'student_ivan', '703b0a3d6ad75b649a28adde7d83c6251da457549263bc7ff45ec709b0a8448b', 'Иван', 'Орлов', '2001-08-21', '+7 (900) 234 56 78', 'ivan.orlov@example.com', 0),
(14, 'student_daria', '703b0a3d6ad75b649a28adde7d83c6251da457549263bc7ff45ec709b0a8448b', 'Дарья', 'Морозова', '2003-01-15', '+7 (900) 345 67 89', 'daria.moroz@example.com', 0),
(15, 'student_nikita', '703b0a3d6ad75b649a28adde7d83c6251da457549263bc7ff45ec709b0a8448b', 'Никита', 'Соколов', '2000-11-30', '+7 (900) 456 78 90', 'nikita.sokolov@example.com', 0),
(16, 'student_alina', '703b0a3d6ad75b649a28adde7d83c6251da457549263bc7ff45ec709b0a8448b', 'Алина', 'Попова', '2002-03-05', '+7 (900) 567 89 01', 'alina.popova@example.com', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `zapis`
--

CREATE TABLE `zapis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `strana` varchar(255) NOT NULL,
  `gorod` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `zapis`
--

INSERT INTO `zapis` (`id`, `user_id`, `strana`, `gorod`, `course_id`, `group_id`) VALUES
(4, 3, 'Россия', 'Курган', 8, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_enrollments_student_id` (`student_id`),
  ADD KEY `idx_enrollments_course_id` (`course_id`),
  ADD KEY `idx_enrollments_group_id` (`group_id`);

--
-- Индексы таблицы `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_grades_student_id` (`student_id`),
  ADD KEY `idx_grades_course_id` (`course_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `idx_groups_teacher_id` (`teacher_id`),
  ADD KEY `idx_groups_course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_payments_student_id` (`student_id`);

--
-- Индексы таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`,`user_id`),
  ADD KEY `student_id` (`user_id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zapis`
--
ALTER TABLE `zapis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`,`group_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `zapis`
--
ALTER TABLE `zapis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk_enrollments_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollments_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_enrollments_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `fk_grades_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grades_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_groups_course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_groups_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  ADD CONSTRAINT `raspisanie_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raspisanie_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zapis`
--
ALTER TABLE `zapis`
  ADD CONSTRAINT `zapis_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zapis_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zapis_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
