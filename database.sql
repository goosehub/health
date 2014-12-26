-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2014 at 11:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE IF NOT EXISTS `foods` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_comment` text COLLATE utf8_bin NOT NULL,
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `serving_size` int(12) NOT NULL,
  `calories` int(12) NOT NULL,
  `calories_fat` int(12) NOT NULL,
  `total_fat` int(12) NOT NULL,
  `saturated_fat` int(12) NOT NULL,
  `trans_fat` int(12) NOT NULL,
  `cholesterol` int(12) NOT NULL,
  `sodium` int(12) NOT NULL,
  `total_carb` int(12) NOT NULL,
  `dietary_fiber` int(12) NOT NULL,
  `sugars` int(12) NOT NULL,
  `protein` int(12) NOT NULL,
  `calcium` int(12) NOT NULL,
  `folic_acid` int(12) NOT NULL,
  `iron` int(12) NOT NULL,
  `magnesium` int(12) NOT NULL,
  `niacin` int(12) NOT NULL,
  `potassium` int(12) NOT NULL,
  `riboflavin` int(12) NOT NULL,
  `vit_a` int(12) NOT NULL,
  `vit_b6` int(12) NOT NULL,
  `vit_b12` int(12) NOT NULL,
  `vit_c` int(12) NOT NULL,
  `vit_d` int(12) NOT NULL,
  `vit_e` int(12) NOT NULL,
  `zinc` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'users FK',
  `friend_key` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'users FK',
  `status` varchar(100) COLLATE utf8_bin NOT NULL COMMENT 'request/requested/accepted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `progress_key` int(12) NOT NULL COMMENT 'progress FK',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `filename` varchar(200) COLLATE utf8_bin NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `caption` text COLLATE utf8_bin NOT NULL,
  `filesize` int(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_comment` text COLLATE utf8_bin NOT NULL,
  `food_key_01` int(12) NOT NULL COMMENT 'All the following are foods FK',
  `food_key_02` int(12) NOT NULL,
  `food_key_03` int(12) NOT NULL,
  `food_key_04` int(12) NOT NULL,
  `food_key_05` int(12) NOT NULL,
  `food_key_06` int(12) NOT NULL,
  `food_key_07` int(12) NOT NULL,
  `food_key_08` int(12) NOT NULL,
  `food_key_09` int(12) NOT NULL,
  `food_key_10` int(12) NOT NULL,
  `food_key_11` int(12) NOT NULL,
  `food_key_12` int(12) NOT NULL,
  `food_key_13` int(12) NOT NULL,
  `food_key_14` int(12) NOT NULL,
  `food_key_15` int(12) NOT NULL,
  `food_key_16` int(12) NOT NULL,
  `food_key_17` int(12) NOT NULL,
  `food_key_18` int(12) NOT NULL,
  `food_key_19` int(12) NOT NULL,
  `food_key_20` int(12) NOT NULL,
  `food_key_21` int(12) NOT NULL,
  `food_key_22` int(12) NOT NULL,
  `food_key_23` int(12) NOT NULL,
  `food_key_24` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `friend_key` int(12) NOT NULL COMMENT 'users FK',
  `message` text COLLATE utf8_bin NOT NULL,
  `subject` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE IF NOT EXISTS `progress` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'timestamp',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_comment` text COLLATE utf8_bin NOT NULL,
  `images_exist` int(12) NOT NULL COMMENT 'true / false',
  `weight` int(12) NOT NULL,
  `height` int(12) NOT NULL,
  `arm` int(12) NOT NULL,
  `thigh` int(12) NOT NULL,
  `waist` int(12) NOT NULL,
  `chest` int(12) NOT NULL,
  `calves` int(12) NOT NULL,
  `forearms` int(12) NOT NULL,
  `neck` int(12) NOT NULL,
  `hips` int(12) NOT NULL,
  `bodyfat` int(12) NOT NULL,
  `squats` int(12) NOT NULL,
  `bench` int(12) NOT NULL,
  `deadlift` int(12) NOT NULL,
  `extra` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `progress_comments`
--

CREATE TABLE IF NOT EXISTS `progress_comments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `progress_key` int(12) NOT NULL COMMENT 'progress FK',
  `user_key` int(12) NOT NULL COMMENT 'users FK / owner of progress',
  `friend_key` int(12) NOT NULL COMMENT 'users FK / commenting on progress',
  `comment` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recipies`
--

CREATE TABLE IF NOT EXISTS `recipies` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `instructions` text COLLATE utf8_bin NOT NULL,
  `user_comment` text COLLATE utf8_bin NOT NULL,
  `food_key_01` int(12) NOT NULL COMMENT 'All the following are foods FK',
  `food_key_02` int(12) NOT NULL,
  `food_key_03` int(12) NOT NULL,
  `food_key_04` int(12) NOT NULL,
  `food_key_05` int(12) NOT NULL,
  `food_key_06` int(12) NOT NULL,
  `food_key_07` int(12) NOT NULL,
  `food_key_08` int(12) NOT NULL,
  `food_key_09` int(12) NOT NULL,
  `food_key_10` int(12) NOT NULL,
  `food_key_11` int(12) NOT NULL,
  `food_key_12` int(12) NOT NULL,
  `food_key_13` int(12) NOT NULL,
  `food_key_14` int(12) NOT NULL,
  `food_key_15` int(12) NOT NULL,
  `food_key_16` int(12) NOT NULL,
  `food_key_17` int(12) NOT NULL,
  `food_key_18` int(12) NOT NULL,
  `food_key_19` int(12) NOT NULL,
  `food_key_20` int(12) NOT NULL,
  `food_key_21` int(12) NOT NULL,
  `food_key_22` int(12) NOT NULL,
  `food_key_23` int(12) NOT NULL,
  `food_key_24` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE IF NOT EXISTS `routines` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `active` int(12) NOT NULL COMMENT 'true / false',
  `workout_key_01` int(12) NOT NULL COMMENT 'All the following are workouts FK',
  `workout_key_02` int(12) NOT NULL,
  `workout_key_03` int(12) NOT NULL,
  `workout_key_04` int(12) NOT NULL,
  `workout_key_05` int(12) NOT NULL,
  `workout_key_06` int(12) NOT NULL,
  `workout_key_07` int(12) NOT NULL,
  `workout_key_08` int(12) NOT NULL,
  `workout_key_09` int(12) NOT NULL,
  `workout_key_10` int(12) NOT NULL,
  `workout_key_11` int(12) NOT NULL,
  `workout_key_12` int(12) NOT NULL,
  `workout_key_13` int(12) NOT NULL,
  `workout_key_14` int(12) NOT NULL,
  `workout_key_15` int(12) NOT NULL,
  `workout_key_16` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `user_key` int(12) NOT NULL COMMENT 'users FK',
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status_comments`
--

CREATE TABLE IF NOT EXISTS `status_comments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `status_key` int(12) NOT NULL COMMENT 'statuses FK',
  `user_key` int(12) NOT NULL COMMENT 'users FK / owns status',
  `friend_key` int(12) NOT NULL COMMENT 'users FK / owns comment',
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(1000) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `location` varchar(200) COLLATE utf8_bin NOT NULL,
  `birthdate` int(12) NOT NULL COMMENT 'unix',
  `gender` varchar(100) COLLATE utf8_bin NOT NULL,
  `profile_picture_key` int(12) NOT NULL COMMENT 'images FK',
  `joined` int(12) NOT NULL COMMENT 'unix',
  `last_online` int(12) NOT NULL COMMENT 'unix',
  `private` int(12) NOT NULL COMMENT 'true/false',
  `goal` text COLLATE utf8_bin NOT NULL,
  `about` text COLLATE utf8_bin NOT NULL,
  `gym_partner` int(12) NOT NULL COMMENT 'true/false',
  `extra` text COLLATE utf8_bin NOT NULL COMMENT 'for admin notes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `location`, `birthdate`, `gender`, `profile_picture_key`, `joined`, `last_online`, `public_profile`, `goal`, `about`, `gym_partner`, `extra`) VALUES
(1, 'bob', '9a618248b64db62d15b300a07b00580b', '', '', '', '', 0, '', 0, 0, 0, 0, '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `wall`
--

CREATE TABLE IF NOT EXISTS `wall` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL,
  `user_key` int(12) NOT NULL COMMENT 'users FK / owns wall',
  `friend_key` int(12) NOT NULL COMMENT 'users FK / comments wall',
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) NOT NULL COMMENT 'unix',
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `sets` int(12) NOT NULL,
  `reps` int(12) NOT NULL,
  `information` text COLLATE utf8_bin NOT NULL,
  `muscle_01` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_02` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_03` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_04` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_05` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_06` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_07` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_08` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_09` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_10` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_11` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_12` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_13` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_14` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_15` varchar(100) COLLATE utf8_bin NOT NULL,
  `muscle_16` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;