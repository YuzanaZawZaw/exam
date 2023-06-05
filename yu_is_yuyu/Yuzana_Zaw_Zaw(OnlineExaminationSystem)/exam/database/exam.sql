-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 02, 2022 at 07:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(12) NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `user_id` int(12) NOT NULL,
  `status_id` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `user_id`, `status_id`, `created_at`, `updated_at`) VALUES
(12, 'Bootstrap MCQA', 1, 1, '2022-10-31 20:30:18', '2022-11-02 06:20:40'),
(27, 'Testing exam', 1, 1, '2022-11-01 11:33:25', '2022-11-01 11:33:25'),
(28, 'Testing by yuyu', 1, 1, '2022-11-01 23:51:00', '2022-11-02 06:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choices`
--

CREATE TABLE `multiple_choices` (
  `multiple_choice_id` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `choice_name` varchar(255) NOT NULL,
  `status_id` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `multiple_choices`
--

INSERT INTO `multiple_choices` (`multiple_choice_id`, `question_id`, `choice_name`, `status_id`, `created_at`, `updated_at`) VALUES
(2, 14, 'Choice B', 2, '2022-10-30 08:49:21', NULL),
(3, 25, 'Choice c', 2, '2022-10-30 08:49:34', NULL),
(4, 21, 'Choice D', 2, '2022-10-30 08:49:48', NULL),
(14, 31, 'James Gosling', 2, '2022-10-31 01:21:07', NULL),
(15, 31, 'Mark Otto and Jacob Thornton', 1, '2022-10-31 01:21:41', NULL),
(16, 31, 'Mark Jukervich', 2, '2022-10-31 01:21:22', NULL),
(17, 17, 'True', 1, '2022-10-30 13:58:38', NULL),
(18, 17, 'False', 2, '2022-10-30 13:58:54', NULL),
(19, 17, 'Can\'t say', 2, '2022-10-30 13:59:07', NULL),
(20, 17, 'May be', 2, '2022-10-30 13:59:16', NULL),
(21, 23, '<nav class=\"navigationbar navbar\">', 2, '2022-10-30 14:00:36', NULL),
(22, 23, '<nav class=\"nav navbar\">', 2, '2022-10-30 14:01:09', NULL),
(23, 23, '<nav class=\"navbar default\">', 2, '2022-10-30 14:01:19', NULL),
(24, 23, '<nav class=\"navbar navbar-default\">', 1, '2022-10-30 14:01:49', NULL),
(25, 32, 'slideshow', 2, '2022-10-30 18:43:40', NULL),
(26, 32, 'scrollspy', 2, '2022-10-30 18:43:51', NULL),
(27, 32, 'carousel', 1, '2022-10-30 18:44:00', NULL),
(28, 32, 'None of the above', 2, '2022-10-30 18:44:17', NULL),
(29, 22, '.box', 2, '2022-10-30 18:46:10', NULL),
(30, 22, '.container', 2, '2022-10-30 18:46:25', NULL),
(31, 22, '.container-fluid', 2, '2022-10-30 18:46:38', NULL),
(32, 22, '.jumbotron', 1, '2022-10-30 18:46:50', NULL),
(33, 21, '.container-fixed', 2, '2022-10-30 18:47:45', NULL),
(34, 21, '.container-fluid', 2, '2022-10-30 18:47:57', NULL),
(35, 21, '.container', 1, '2022-10-30 18:48:11', NULL),
(36, 14, '.navbar-default', 2, '2022-10-30 18:48:58', NULL),
(37, 14, '.navbar-inverse', 1, '2022-10-30 18:49:06', NULL),
(38, 14, '.navbar-black', 2, '2022-10-30 18:49:18', NULL),
(39, 25, '<ul class=\"navigation nav-tabs\">', 2, '2022-10-30 18:50:05', NULL),
(40, 25, '<ul class=\"nav tab\">', 2, '2022-10-30 18:50:15', NULL),
(41, 25, '<ul class=\"nav nav-tabs\">', 1, '2022-10-30 18:50:25', NULL),
(42, 25, '<ul class=\"navigation tabs\">', 2, '2022-10-30 18:50:35', NULL),
(43, 31, 'Dennis Ritchie', 2, '2022-10-30 18:51:30', NULL),
(44, 34, 'popup', 2, '2022-10-31 14:33:10', NULL),
(45, 34, 'alert', 2, '2022-10-31 14:33:20', NULL),
(46, 34, 'modal', 1, '2022-10-31 14:33:28', NULL),
(47, 34, 'window', 2, '2022-10-31 14:33:36', NULL),
(48, 35, '2', 2, '2022-11-01 09:25:09', '2022-11-01 15:58:24'),
(49, 35, '12', 1, '2022-11-01 09:25:44', '2022-11-01 15:58:19'),
(50, 35, '3', 2, '2022-11-01 09:25:56', '2022-11-01 09:25:56'),
(52, 35, '5', 2, '2022-11-01 09:27:10', '2022-11-01 09:27:10'),
(53, 36, 'Choice1', 1, '2022-11-01 11:39:17', '2022-11-01 11:39:17'),
(54, 36, 'Choice 2', 2, '2022-11-01 11:39:27', '2022-11-01 11:39:27'),
(55, 37, 'Choice 1', 2, '2022-11-01 11:39:56', '2022-11-01 11:39:56'),
(56, 37, 'Choice 2', 1, '2022-11-01 11:40:06', '2022-11-01 11:40:06'),
(57, 38, 'Choice 1', 1, '2022-11-01 23:56:18', '2022-11-01 23:56:18'),
(58, 38, 'Choice 2', 2, '2022-11-01 23:56:26', '2022-11-01 23:56:26'),
(60, 39, 'Choice 2', 2, '2022-11-02 00:02:25', '2022-11-02 00:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `exam_id` int(12) NOT NULL,
  `question_name` varchar(255) NOT NULL,
  `points` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `exam_id`, `question_name`, `points`, `created_at`, `updated_at`) VALUES
(14, 12, 'Which of the following class is used to create a black navigation bar?', 5, '2022-10-31 08:02:21', NULL),
(17, 12, 'Is Bootstrap3 mobile-first?', 5, '2022-10-31 08:02:27', NULL),
(21, 12, 'Which of the following class in Bootstrap is used to provide a responsive fixed width container!!!!!', 5, '2022-10-31 08:33:50', NULL),
(22, 12, 'Which of the following class in bootstrap is used to create a big box for calling extra attention?', 5, '2022-10-31 08:02:32', NULL),
(23, 12, 'The correct syntax of creating a standard navigation bar is -', 5, '2022-10-31 08:02:35', NULL),
(25, 12, 'Which of the following is the correct syntax of creating a standard navigation tab?', 5, '2022-10-31 08:02:37', NULL),
(31, 12, 'Who developed the bootstrap?', 5, '2022-10-31 08:02:40', NULL),
(32, 12, 'The plugin used to create a cycle through elements as a slideshow is -', 5, '2022-10-31 08:02:43', NULL),
(34, 12, 'Which of the following plugin in Bootstrap is used to create a modal window?', 6, '2022-10-31 21:02:44', NULL),
(35, 12, 'How many columns are allowed in a bootstrap grid system???', 5, '2022-11-01 09:17:13', '2022-11-01 15:54:00'),
(36, 27, 'Question 1', 2, '2022-11-01 11:33:48', '2022-11-01 11:33:48'),
(37, 27, 'Question 2', 2, '2022-11-01 11:38:32', '2022-11-01 11:38:32'),
(38, 27, 'Question 3', 5, '2022-11-01 23:55:56', '2022-11-01 23:55:56'),
(39, 12, 'Test by yuyu', 15, '2022-11-02 00:01:26', '2022-11-02 00:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `exam_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `total_mark` int(10) NOT NULL,
  `sum` double NOT NULL,
  `percentage` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `exam_id`, `user_id`, `total_mark`, `sum`, `percentage`, `created_at`, `updated_at`) VALUES
(23, 12, 2, 10, 51, 20, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(24, 27, 2, 2, 4, 50, '2022-11-01 23:42:33', '2022-11-01 23:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(12) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(12) NOT NULL,
  `status_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2022-11-01 14:50:23', '2022-11-01 14:50:23'),
(2, 'In-Active', '2022-11-01 14:50:37', '2022-11-01 14:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(12) NOT NULL,
  `role_id` int(12) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nrc` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `last_name`, `father_name`, `email`, `gender`, `nrc`, `phone_no`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Yu', 'Yu', 'Zaw Zaw', 'yuyu@gmail.com', 'Female', '14/MAMAKA(N)67252', '09-4532222222', 'Yangon', 'yuyu', '2022-11-01 17:35:55', '2022-11-01 17:35:55'),
(2, 2, 'Nu', 'Hla Phyu', 'U Min Min', 'nuhlaphyu@gmail.com', 'Female', '14/MAMAKA(N)672672', '09-453333333', 'Yangon', 'nuhlaphyu', '2022-11-01 17:36:00', '2022-11-01 17:36:00'),
(3, 2, 'Thet Htar', 'Zin', 'Aung', 'thethtarzin@gmail.com', 'Female', '14/MAMAKA(N)67259', '09-4532222227', 'Yangon', 'htar', '2022-11-01 17:36:14', '2022-11-01 17:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `answer_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `exam_id` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `answer` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`answer_id`, `user_id`, `exam_id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(175, 2, 12, 14, 36, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(176, 2, 12, 17, 19, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(177, 2, 12, 21, 33, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(178, 2, 12, 22, 29, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(179, 2, 12, 23, 21, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(180, 2, 12, 25, 39, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(181, 2, 12, 31, 15, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(182, 2, 12, 32, 25, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(183, 2, 12, 34, 44, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(184, 2, 12, 35, 49, '2022-11-01 23:42:20', '2022-11-01 23:42:20'),
(185, 2, 27, 36, 54, '2022-11-01 23:42:33', '2022-11-01 23:42:33'),
(186, 2, 27, 37, 56, '2022-11-01 23:42:33', '2022-11-01 23:42:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `fk_exam_status_id` (`status_id`),
  ADD KEY `fk_exam_user_id` (`user_id`);

--
-- Indexes for table `multiple_choices`
--
ALTER TABLE `multiple_choices`
  ADD PRIMARY KEY (`multiple_choice_id`),
  ADD KEY `fk_choice_question_id` (`question_id`),
  ADD KEY `fk_choice_status_id` (`status_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_questions_exam_id` (`exam_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `fk_result_exam_id` (`exam_id`),
  ADD KEY `fk_result_user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_role_id_fk` (`role_id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `fk_answers_exam_id` (`exam_id`),
  ADD KEY `fk_answers_question_id` (`question_id`),
  ADD KEY `fk_answers_user_id` (`user_id`),
  ADD KEY `fk_answers_choice_id` (`answer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `multiple_choices`
--
ALTER TABLE `multiple_choices`
  MODIFY `multiple_choice_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `answer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `fk_exam_status_id` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `fk_exam_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `multiple_choices`
--
ALTER TABLE `multiple_choices`
  ADD CONSTRAINT `fk_choice_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `fk_choice_status_id` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `fk_result_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `fk_result_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `fk_answers_choice_id` FOREIGN KEY (`answer`) REFERENCES `multiple_choices` (`multiple_choice_id`),
  ADD CONSTRAINT `fk_answers_exam_id` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `fk_answers_question_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
  ADD CONSTRAINT `fk_answers_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
