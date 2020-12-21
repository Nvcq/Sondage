-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2020 at 06:18 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sondage`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `sondage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `choice` int(1) NOT NULL,
  `rep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `sondage_id`, `user_id`, `choice`, `rep`) VALUES
(101, 29, 31, 1, 'PSG'),
(102, 29, 32, 1, 'PSG'),
(103, 30, 27, 2, 'Des gauffres');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `msg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sondage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `content`, `msg_date`, `sondage_id`, `user_id`) VALUES
(28, 'Ici c\'est paris', '2020-12-02 19:10:44', 29, 31),
(29, 'FUCK L\'OM', '2020-12-02 19:11:11', 29, 27),
(30, 'Club de rats', '2020-12-02 19:11:38', 29, 32),
(31, 'Gauffre > crÃªpes', '2020-12-02 19:17:59', 30, 27);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `friend_asking` int(11) NOT NULL,
  `friend_asked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`friend_asking`, `friend_asked`) VALUES
(31, 27),
(27, 31),
(27, 32);

-- --------------------------------------------------------

--
-- Table structure for table `sondage`
--

CREATE TABLE `sondage` (
  `sondage_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `choice1` varchar(300) NOT NULL,
  `choice2` varchar(300) NOT NULL,
  `ending_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sondage`
--

INSERT INTO `sondage` (`sondage_id`, `user_id`, `question`, `choice1`, `choice2`, `ending_date`) VALUES
(24, 27, 'Je mange quoi ?', 'Mcdo', 'KFC', '2020-12-06 19:00:00'),
(25, 27, 'Je vais ou ?', 'Au sport ', 'Au cinÃ©', '2020-12-04 09:10:00'),
(26, 27, 'Je mange quoi ?', 'fast-food', 'healthy', '2020-12-02 22:00:00'),
(28, 27, 'Vous prÃ©fÃ©rez ?', 'Cours en prÃ©sentiel', 'Cours en distanciel ', '2020-12-10 22:10:00'),
(29, 27, 'Pour vous, qui gagne ?', 'PSG', 'OM', '2020-12-10 21:00:00'),
(30, 31, 'Je fait :', 'Des crÃªpes', 'Des gauffres', '2020-12-03 20:10:00'),
(31, 31, 'Je regarde ?', 'Koh-lantah', 'Fort boyard', '2020-12-08 19:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `pseudo`, `email`, `password`) VALUES
(27, 'Nicolas', 'Mopin', 'Nico', 'Nicolas.mopin@gmail.com', '$2y$10$/VfVyU.2g52cqvzzkMkv8e.2tCqHdPbR/3jWkFReOfHKlVpidlNY6'),
(31, 'Nicolas', 'Malsch', 'Gomar', 'margaux@m', '$2y$10$ytHc2QMkPjvfykQRweYky.ALILC559SZwsf67UX30vidRGok53ST6'),
(32, 'Saymaz', 'Ugur', 'Telasli', 'Ugur@u', '$2y$10$XJxohjzr4Nk0Aq/vEYkSCeaeMwYrh13bRXHSNz0cpUg/ZXKMBnLri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `sondage_id` (`sondage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `sondage_id` (`sondage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD KEY `friend_asking` (`friend_asking`),
  ADD KEY `friend_asked` (`friend_asked`);

--
-- Indexes for table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`sondage_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `sondage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`sondage_id`) REFERENCES `sondage` (`sondage_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`sondage_id`) REFERENCES `sondage` (`sondage_id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_1` FOREIGN KEY (`friend_asking`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `friend_ibfk_2` FOREIGN KEY (`friend_asked`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sondage`
--
ALTER TABLE `sondage`
  ADD CONSTRAINT `sondage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
