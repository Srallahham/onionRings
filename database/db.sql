-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 03:32 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'mhnZQmZZF6BbKWTNv6_Y58mZNHl_p5Ba', '$2y$13$6NjBW8khId9jZAqMiklfrulimlBAcPjlmng16dsJrgDr.PGXO6QCm', '', 'admin@admin.com', 10, 0, 1552942527, 1552942527);

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_recipe` int(11) DEFAULT NULL,
  `album_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_recipe`, `album_name`) VALUES
(1, NULL, 'OnionRings'),
(2, NULL, 'New Album'),
(3, NULL, 'this'),
(4, NULL, 'Onion Album'),
(5, NULL, 'Rings Album'),
(6, NULL, 'Great'),
(7, NULL, 'fasldkfj;'),
(8, NULL, 'Really long');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(15) NOT NULL,
  `category_description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Japanese', 'Japanese food');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_owner` int(11) NOT NULL,
  `comment_recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_name` varchar(15) NOT NULL,
  `ingredient_symbol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`ingredient_id`, `ingredient_name`, `ingredient_symbol`) VALUES
(1, 'Onion', 'O'),
(2, 'Carrot', NULL),
(3, 'Tomato', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `like_id` int(11) NOT NULL,
  `like_owner` int(11) NOT NULL,
  `like_recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Guest', '6oYCtjdPS6j_YAATAxoc7RlyfQehW6fj', '$2y$13$A0Q0lBmwrMWraVYXy9K1we7bWTkWeTiGQUiutPLIs7Ls.DimAxE7.', '', 'guest@onionrings.com', 10, 0, 1552494012, 1552494012),
(3, 'admin', 'mhnZQmZZF6BbKWTNv6_Y58mZNHl_p5Ba', '$2y$13$6NjBW8khId9jZAqMiklfrulimlBAcPjlmng16dsJrgDr.PGXO6QCm', '', 'admin@admin.com', 10, 0, 1552942527, 1552942527),
(4, 'Sam', 'NED0jaFoX-C6X-syyJWOY7etIiVZingU', '$2y$13$dspdxDGwnBmOAm74KF5cqeAStF7ImuQHczqPQGSMwZorsc8QiS..a', '', 'sr.allahham@gmail.com', 10, 0, 1552948175, 1552948175);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1552493108),
('m130524_201442_init', 1552493116);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `picture_title` varchar(255) DEFAULT NULL,
  `picture_path` varchar(255) NOT NULL,
  `picture_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `picture_title`, `picture_path`, `picture_album`) VALUES
(1, 'baby2.jpg', 'uploads/baby2.jpg.jpg', 1),
(2, '15530903215c924711e69128.45418468.jpg', 'uploads/15530903215c924711e69128.45418468.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `rate_owner` int(11) NOT NULL,
  `rate_recipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `recipe_id` int(11) NOT NULL,
  `recipe_title` varchar(45) NOT NULL,
  `recipe_picture` varchar(255) NOT NULL,
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
(15, 'Sam', '15529482115c901bf399b561.38721207.jpg', '2019-03-19', 4, 'Sam\'s first Recipe', 1, 1),
(16, 'demo Ing.', '15530178685c912c0cb56552.53265292.jpg', '2019-03-19', 4, 'demo Ing.', 1, 1),
(17, 'demo Ing.', '15530179445c912c58d73fa1.22189712.jpg', '2019-03-19', 4, 'demo Ing.', 1, 1),
(18, 'demo Ing.', '15530180505c912cc2746b38.84556971.jpg', '2019-03-19', 4, 'demo Ing.', 1, 1),
(19, 'demo Ing.', '15530180735c912cd96a22e9.96973793.jpg', '2019-03-19', 4, 'demo Ing.', 1, 1),
(20, 'this', '15530183555c912df3c86429.51204383.jpg', '2019-03-19', 4, 'ahaaaaaaaaaaaaaaaaaaaa', 1, 1),
(21, 'Demo with Ingredients', '15530195725c9132b4b82f20.73354866.jpg', '2019-03-19', 4, 'Aha', 1, 1),
(22, 'Ingredient', '15530198525c9133cc375a36.56729456.jpg', '2019-03-19', 4, '5e5e5e', 1, 1),
(23, 'why', '15530202655c9135699679b7.56647150.jpg', '2019-03-19', 4, 'aha', 1, 1),
(24, 'please', '15530204045c9135f4e65151.41515371.jpg', '2019-03-19', 4, 'l;sdkfl;sadjf', 1, 1),
(25, 'please', '15530204225c9136068b3224.99562898.jpg', '2019-03-19', 4, 'l;sdkfl;sadjf', 1, 1),
(26, 'dsafasdf', '15530205985c9136b64d5e88.15741496.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(27, 'dsafasdf', '15530206425c9136e2eab3e3.13656770.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(28, 'dsfdsafsdaf', '15530206915c9137133807b5.66396274.jpg', '2019-03-19', 4, 'dfasdfsda', 1, 1),
(29, 'dsfdsafsdaf', '15530207125c913728f03671.75234842.jpg', '2019-03-19', 4, 'dfasdfsda', 1, 1),
(30, 'dsfdsafsdaf', '15530207265c913736076188.41925022.jpg', '2019-03-19', 4, 'dfasdfsda', 1, 1),
(31, 'sdfsadfsadf', '15530207505c91374e16a505.08277412.jpg', '2019-03-19', 4, 'sadfasdfasdfsadf', 1, 1),
(32, 'sdfasdfsadfa', '15530207905c91377658b498.28782372.jpg', '2019-03-19', 4, 'dsfasdfasdfsadf', 1, 1),
(33, 'sdfasdfasdfsadf', '15530208435c9137ab58ed66.43453124.jpg', '2019-03-19', 4, 'dsafasdfsadfa', 1, 1),
(34, 'sdfasdfasdfsadf', '15530210135c913855afae95.16860468.jpg', '2019-03-19', 4, 'dsafasdfsadfa', 1, 1),
(35, 'dsfasdfsadf', '15530210385c91386e82a5e6.74240706.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(36, 'dsfasdfsadf', '15530211505c9138debb9108.54639725.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(37, 'sdfsadasdf', '15530211685c9138f0781005.81318032.jpg', '2019-03-19', 4, 'sadfsadfasdfa', 1, 1),
(38, 'sdfsadasdf', '15530212255c9139294707f6.46625860.jpg', '2019-03-19', 4, 'sadfsadfasdfa', 1, 1),
(39, 'sdfsadasdf', '15530212465c91393e9431f6.78672447.jpg', '2019-03-19', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus nec feugiat in fermentum posuere urna nec tincidunt. Id aliquet risus feugiat in ante metus. Sit amet massa vitae tortor condimentum lacinia. Vel risus commodo viverra maecenas accumsan lacus vel. Netus et malesuada fames ac turpis egestas sed tempus urna. In cursus turpis massa tincidunt dui ut. Volutpat odio facilisis mauris sit. Maecenas pharetra convallis posuere morbi leo urna. Dictum non consectetur a erat nam at lectus urna. Quis viverra nibh cras pulvinar mattis nunc. Tempor nec feugiat nisl pretium fusce id velit ut. Condimentum lacinia quis vel eros. Felis bibendum ut tristique et egestas quis ipsum suspendisse. Aliquam malesuada bibendum arcu vitae elementum. Odio ut sem nulla pharetra diam sit amet nisl suscipit. Adipiscing elit ut aliquam purus. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque.', 1, 1),
(40, 'sdfsadasdf', '15530212985c9139723b7963.52348726.jpg', '2019-03-19', 4, 'sadfsadfasdfa', 1, 1),
(41, 'fdsafasdfasdf', '15530213195c91398750d264.06454903.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(42, 'fdsafasdfasdf', '15530213305c913992b80e77.64927429.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(43, 'fdsafasdfasdf', '15530213455c9139a11c49c1.73163995.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(44, 'fdsafasdfasdf', '15530214965c913a382ce420.90593405.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(45, 'fdsafasdfasdf', '15530215525c913a70c2f8d4.63943326.jpg', '2019-03-19', 4, 'sadfasdfasdf', 1, 1),
(46, 'sdfasdfasdfsadf', '15530215785c913a8a35d395.76452775.jpg', '2019-03-19', 4, 'asdfasdfasdf', 1, 1),
(47, 'dfsadfasdf', '15530216075c913aa71ab953.12918303.jpg', '2019-03-19', 4, 'sdfasdfsaf', 1, 2),
(48, 'dfsadfasdf', '15530218155c913b771aa349.42766491.jpg', '2019-03-19', 4, 'sdfasdfsaf', 1, 2),
(49, 'dfsadfasdf', '15530220745c913c7aede029.02274591.jpg', '2019-03-19', 4, 'sdfasdfsaf', 1, 2),
(50, 'dfsadfasdf', '15530225755c913e6fb0ab94.45016801.jpg', '2019-03-19', 4, 'sdfasdfsaf', 1, 2),
(51, 'fcvcxzvzxcv', '15530226155c913e97c27cf8.20494419.jpg', '2019-03-19', 4, 'zcxvzxcvzxcvxzv', 1, 1),
(52, 'sxddsafasdA', '15530226485c913eb8bdab78.87606028.jpg', '2019-03-19', 4, 'ASDasdasdasSDSADFAdsfgsdfg', 1, 1),
(53, 'sxddsafasdA', '15530226835c913edbb2cfb8.77234481.jpg', '2019-03-19', 4, 'ASDasdasdasSDSADFAdsfgsdfg', 1, 1),
(54, 'sxddsafasdA', '15530230025c91401a2fa247.15922777.jpg', '2019-03-19', 4, 'ASDasdasdasSDSADFAdsfgsdfg', 1, 1),
(55, 'sxddsafasdA', '15530230755c9140631c1818.43947759.jpg', '2019-03-19', 4, 'ASDasdasdasSDSADFAdsfgsdfg', 1, 1),
(56, 'sxddsafasdA', '15530230785c914066b28dc5.51501247.jpg', '2019-03-19', 4, 'ASDasdasdasSDSADFAdsfgsdfg', 1, 1),
(57, 'sdfasxcvzxrghjhgvfcx', '15530231035c91407f936ae7.51099916.jpg', '2019-03-19', 4, 'asdfasdfsadfsadfas', 1, 1),
(58, 'sdfasxcvzxrghjhgvfcx', '15530231285c914098766f21.86740007.jpg', '2019-03-19', 4, 'asdfasdfsadfsadfas', 1, 1),
(59, 's', '15530233255c91415d8732a3.70774557.jpg', '2019-03-19', 4, 'sssss', 1, 1),
(60, 's', '15530235255c914225cec3f1.77019423.jpg', '2019-03-19', 4, 'sssss', 1, 1),
(61, 's', '15530236775c9142bd6c6580.06481847.jpg', '2019-03-19', 4, 'sssss', 1, 1),
(62, 's', '15530236915c9142cb152db2.44398203.jpg', '2019-03-19', 4, 'sssss', 1, 1),
(63, 'dsfasdfasdfasf', '15530237625c914312cebb23.91621992.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(64, 'dsfasdfasdfasf', '15530239245c9143b491c1f9.82147333.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(65, 'dsfasdfasdfasf', '15530239775c9143e9923ff2.74639136.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(66, 'dsfasdfasdfasf', '15530240045c914404614cb5.31927927.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(67, 'dsfasdfasdfasf', '15530240185c91441220e6b0.90296988.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(68, 'Ingredient Demo', '15530241255c91447da24cd5.52890264.jpg', '2019-03-19', 4, 'dsafasdfsdaf', 1, 1),
(69, 'dfsdfXZC', '15530342195c916bebd15c24.64408200.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(70, 'dfsdfXZC', '15530343115c916c47d9f1b6.43394111.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(71, 'dfsdfXZC', '15530343625c916c7ae7db83.32847598.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(72, 'dfsdfXZC', '15530344485c916cd0a59482.37089399.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(73, 'dfsdfXZC', '15530344635c916cdf1ecc96.21909301.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(74, 'dfsdfXZC', '15530346585c916da2982454.22715820.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(75, 'dfsdfXZC', '15530346735c916db1648f02.92162837.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(76, 'dfsdfXZC', '15530346995c916dcb3e2e20.85291606.jpg', '2019-03-20', 4, 'xdfcsdfas', 1, 1),
(77, 'sdfasdfasdf', '15530898475c924537905b40.01134822.jpg', '2019-03-20', 1, 'dfasdfasdfasdf', 1, 6),
(78, 'sdfasdfasdf', '15530903215c924711e69128.45418468.jpg', '2019-03-20', 1, 'dfasdfasdfasdf', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredient`
--

CREATE TABLE `recipe_ingredient` (
  `recipe_ingredient_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `ingredient_quantity` int(11) DEFAULT NULL,
  `ingredient_unit` int(11) NOT NULL DEFAULT '1',
  `ingredient_desc` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipe_ingredient`
--

INSERT INTO `recipe_ingredient` (`recipe_ingredient_id`, `recipe_id`, `ingredient_id`, `ingredient_quantity`, `ingredient_unit`, `ingredient_desc`) VALUES
(2, 64, 1, NULL, 5, NULL),
(3, 65, 1, NULL, 5, NULL),
(4, 66, 1, NULL, 5, NULL),
(5, 67, 1, NULL, 5, NULL),
(6, 68, 1, NULL, 5, NULL),
(7, 68, 2, NULL, 5, NULL),
(8, 68, 3, NULL, 5, NULL),
(9, 75, 1, NULL, 5, NULL),
(10, 75, 2, NULL, 5, NULL),
(11, 75, 3, NULL, 5, NULL),
(12, 76, 1, NULL, 5, NULL),
(13, 76, 2, NULL, 5, NULL),
(14, 76, 3, NULL, 5, NULL),
(15, 77, 2, NULL, 5, NULL),
(16, 77, 3, NULL, 5, NULL),
(17, 78, 2, NULL, 5, NULL),
(18, 78, 3, NULL, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`) VALUES
(1, 'Kg'),
(2, 'G'),
(3, 'Li'),
(4, 'Ml'),
(5, 'pcs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `fk_album_recipe_idx` (`album_recipe`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `fk_auth_assignment_idx` (`item_name`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `fk_auth_item_auth_rule1_idx` (`rule_name`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `fk_auth_item_child_auth_item1_idx` (`parent`),
  ADD KEY `fk_auth_item_child_auth_item2_idx` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_Comment_User1_idx` (`comment_owner`),
  ADD KEY `fk_Comment_Recipe1_idx` (`comment_recipe`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`ingredient_id`),
  ADD UNIQUE KEY `ingredient_name_UNIQUE` (`ingredient_name`),
  ADD UNIQUE KEY `ingredient_symbol_UNIQUE` (`ingredient_symbol`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `fk_Like_User1_idx` (`like_owner`),
  ADD KEY `fk_Like_Recipe1_idx` (`like_recipe`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `fk_picture_album1_idx` (`picture_album`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `fk_Rates_User1_idx` (`rate_owner`),
  ADD KEY `fk_Rates_Recipe1_idx` (`rate_recipe`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `fk_Recipe_User1_idx` (`recipe_owner`),
  ADD KEY `fk_Recipe_Category1_idx` (`recipe_category`),
  ADD KEY `recipe_album` (`recipe_album`);

--
-- Indexes for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD PRIMARY KEY (`recipe_ingredient_id`),
  ADD KEY `fk_Recipe_Ingredient_Recipe1_idx` (`recipe_id`),
  ADD KEY `fk_Recipe_Ingredient_Ingredient1_idx` (`ingredient_id`),
  ADD KEY `fk_Recipe_Ingredient_unit1_idx` (`ingredient_unit`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  MODIFY `recipe_ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_album_recipe` FOREIGN KEY (`album_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `fk_auth_assignment` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `fk_auth_item_auth_rule1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `fk_auth_item_child_auth_item1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_auth_item_child_auth_item2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Comment_Recipe1` FOREIGN KEY (`comment_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`comment_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `fk_Like_Recipe1` FOREIGN KEY (`like_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Like_User1` FOREIGN KEY (`like_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `fk_picture_album1` FOREIGN KEY (`picture_album`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `fk_Rates_Recipe1` FOREIGN KEY (`rate_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rates_User1` FOREIGN KEY (`rate_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_Recipe_Category1` FOREIGN KEY (`recipe_category`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recipe_User1` FOREIGN KEY (`recipe_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`recipe_album`) REFERENCES `album` (`album_id`);

--
-- Constraints for table `recipe_ingredient`
--
ALTER TABLE `recipe_ingredient`
  ADD CONSTRAINT `fk_Recipe_Ingredient_Ingredient1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recipe_Ingredient_Recipe1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recipe_Ingredient_unit1` FOREIGN KEY (`ingredient_unit`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
