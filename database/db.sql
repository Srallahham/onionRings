-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 09:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `recipe_title` varchar(45) NOT NULL,
  `recipe_picture` int(11) DEFAULT NULL,
  `recipe_date` date NOT NULL,
  `recipe_owner` int(11) NOT NULL,
  `recipe_preparation` text,
  `recipe_category` int(11) NOT NULL,
  `recipe_album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`recipe_id`, `recipe_title`, `recipe_picture`, `recipe_date`, `recipe_owner`, `recipe_preparation`, `recipe_category`, `recipe_album`) VALUES
(1, 'demo', NULL, '2019-03-18', 1, 'demo', 1, NULL),
(2, 'test', NULL, '2019-03-18', 1, 'testing123', 1, NULL),
(4, 'sdfadsf', NULL, '2019-03-18', 1, 'sdfasdfasdf', 1, NULL),
(5, 'gio', NULL, '2019-03-18', 1, 'gio', 1, NULL),
(6, 'dd', NULL, '2019-03-18', 1, 'dd', 1, NULL),
(7, 'ddسيب', 23, '2019-03-18', 1, 'ddبيسليبسل', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD UNIQUE KEY `recipe_title_UNIQUE` (`recipe_title`),
  ADD KEY `fk_Recipe_User1_idx` (`recipe_owner`),
  ADD KEY `fk_Recipe_Category1_idx` (`recipe_category`),
  ADD KEY `recipe_picture` (`recipe_picture`),
  ADD KEY `recipe_album` (`recipe_album`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_Recipe_Category1` FOREIGN KEY (`recipe_category`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recipe_User1` FOREIGN KEY (`recipe_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`recipe_picture`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`recipe_album`) REFERENCES `album` (`album_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
