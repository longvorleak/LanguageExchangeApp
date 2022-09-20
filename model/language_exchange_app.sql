-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 04:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `language_exchange_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0,
  `chatroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `id` int(11) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `chat_type` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `known_language`
--

CREATE TABLE `known_language` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `proficiency` tinyint(4) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `known_language`
--

INSERT INTO `known_language` (`id`, `user_id`, `language_id`, `proficiency`) VALUES
(1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `abbrevetion` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`, `abbrevetion`) VALUES
(1, 'English', 'en'),
(2, 'German', 'de'),
(3, 'French', 'fr'),
(4, 'Dutch', 'nl'),
(5, 'Italian', 'it'),
(6, 'Spanish', 'es'),
(7, 'Polish', 'pl'),
(8, 'Russian', 'ru'),
(9, 'Japanese', 'ja'),
(10, 'Portuguese', 'pt'),
(11, 'Swedish', 'sv'),
(12, 'Chinese', 'zh'),
(13, 'Catalan', 'ca'),
(14, 'Ukrainian', 'uk'),
(15, 'Norwegian', 'no'),
(16, 'Finnish', 'fi'),
(17, 'Vietnamese', 'vi'),
(18, 'Czech', 'cs'),
(19, 'Hungarian', 'hu'),
(20, 'Korean', 'ko'),
(21, 'Indonesian', 'id'),
(22, 'Turkish', 'tr'),
(23, 'Romanian', 'ro'),
(24, 'Persian', 'fa'),
(25, 'Arabic', 'ar'),
(26, 'Danish', 'da'),
(27, 'Esperanto', 'eo'),
(28, 'Serbian', 'sr'),
(29, 'Lithuanian', 'lt'),
(30, 'Slovak', 'sk'),
(31, 'Malay', 'ms'),
(32, 'Hebrew', 'he'),
(33, 'Bulgarian', 'bg'),
(34, 'Slovenian', 'sl'),
(35, 'VolapÃ¼k', 'vo'),
(36, 'Kazakh', 'kk'),
(37, 'Waray-Waray', 'war'),
(38, 'Basque', 'eu'),
(39, 'Croatian', 'hr'),
(40, 'Hindi', 'hi'),
(41, 'Estonian', 'et'),
(42, 'Azerbaijani', 'az'),
(43, 'Galician', 'gl'),
(44, 'Simple English', 'simple'),
(45, 'Norwegian (Nynorsk)', 'nn'),
(46, 'Thai', 'th'),
(47, 'Newar / Nepal Bhasa', 'new'),
(48, 'Greek', 'el'),
(49, 'Aromanian', 'roa-rup'),
(50, 'Latin', 'la'),
(51, 'Occitan', 'oc'),
(52, 'Tagalog', 'tl'),
(53, 'Haitian', 'ht'),
(54, 'Macedonian', 'mk'),
(55, 'Georgian', 'ka'),
(56, 'Serbo-Croatian', 'sh'),
(57, 'Telugu', 'te'),
(58, 'Piedmontese', 'pms'),
(59, 'Cebuano', 'ceb'),
(60, 'Tamil', 'ta'),
(61, 'Belarusian (TaraÅ¡kievica)', 'be-x-old'),
(62, 'Breton', 'br'),
(63, 'Latvian', 'lv'),
(64, 'Javanese', 'jv'),
(65, 'Albanian', 'sq'),
(66, 'Belarusian', 'be'),
(67, 'Marathi', 'mr'),
(68, 'Welsh', 'cy'),
(69, 'Luxembourgish', 'lb'),
(70, 'Icelandic', 'is'),
(71, 'Bosnian', 'bs'),
(72, 'Yoruba', 'yo'),
(73, 'Malagasy', 'mg'),
(74, 'Aragonese', 'an'),
(75, 'Bishnupriya Manipuri', 'bpy'),
(76, 'Lombard', 'lmo'),
(77, 'West Frisian', 'fy'),
(78, 'Bengali', 'bn'),
(79, 'Ido', 'io'),
(80, 'Swahili', 'sw'),
(81, 'Gujarati', 'gu'),
(82, 'Malayalam', 'ml'),
(83, 'Western Panjabi', 'pnb'),
(84, 'Afrikaans', 'af'),
(85, 'Low Saxon', 'nds'),
(86, 'Sicilian', 'scn'),
(87, 'Urdu', 'ur'),
(88, 'Kurdish', 'ku'),
(89, 'Cantonese', 'zh-yue'),
(90, 'Armenian', 'hy'),
(91, 'Quechua', 'qu'),
(92, 'Sundanese', 'su'),
(93, 'Nepali', 'ne'),
(94, 'Zazaki', 'diq'),
(95, 'Asturian', 'ast'),
(96, 'Tatar', 'tt'),
(97, 'Neapolitan', 'nap'),
(98, 'Irish', 'ga'),
(99, 'Chuvash', 'cv'),
(100, 'Samogitian', 'bat-smg'),
(101, 'Walloon', 'wa'),
(102, 'Amharic', 'am'),
(103, 'Kannada', 'kn'),
(104, 'Alemannic', 'als'),
(105, 'Buginese', 'bug'),
(106, 'Burmese', 'my'),
(107, 'Interlingua', 'ia');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chatroom_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `target_language`
--

CREATE TABLE `target_language` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `proficiency` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target_language`
--

INSERT INTO `target_language` (`id`, `user_id`, `language_id`, `proficiency`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 3),
(3, 1, 4, 4),
(4, 2, 1, 2),
(5, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `gender` tinyint(4) NOT NULL,
  `city_id` int(11) NOT NULL,
  `premium_id` int(11) DEFAULT NULL,
  `interests` text NOT NULL,
  `hometown` int(11) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `introduction` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `firstname`, `lastname`, `username`, `email`, `password`, `dob`, `date_created`, `last_login`, `gender`, `city_id`, `premium_id`, `interests`, `hometown`, `profilepic`, `introduction`, `is_active`) VALUES
(1, 'F2ShTDW5wS', 'd', 'd', 'ds', 's@ss.com', '$2y$10$.Zk92NMkYEqSCBTR94uq5.T48bQFt/usJu9.LjG6iwsbYb8NgrXQG', '0000-00-00', '2022-09-14 16:30:05', '2022-09-14 16:30:05', 0, 0, NULL, '', 0, '', '', 1),
(2, 'xZMhFUKyg9', 'second', 'a', 'aa', 'a@aa.com', '$2y$10$cP7jm3ZhD2i8hgq3SePOpu5WkMyC4WDxSSQwZWfT6aIpvwWkT91P2', '0000-00-00', '2022-09-14 16:51:22', '2022-09-14 16:51:22', 0, 0, NULL, '', 0, '', '', 1),
(3, 'rKnQCF1uzT', 'thirr', 's', 'oo', 'oo@oo.com', '$2y$10$AMfTFImAvZ/olRQMDsl8gu4rHqpZcSejKKCQHOTH0dBEAnPpuP8M2', '0000-00-00', '2022-09-14 17:02:37', '2022-09-14 17:02:37', 0, 0, NULL, '', 0, '', '', 1),
(4, 'uMtMW9TprQ', '', '', 'four', 'four@four.com', '$2y$10$iGP7gLyVuYKzmWFGQV3jNuIpAGQzccZYsrE6cx/bPCcy8NFQl64rW', '2022-09-20', '2022-09-20 16:15:16', '2022-09-20 16:15:16', 0, 0, NULL, '', 0, '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `known_language`
--
ALTER TABLE `known_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_language`
--
ALTER TABLE `target_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `known_language`
--
ALTER TABLE `known_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `target_language`
--
ALTER TABLE `target_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
