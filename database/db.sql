-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table onionrings.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
	(3, 'admin', 'mhnZQmZZF6BbKWTNv6_Y58mZNHl_p5Ba', '$2y$13$6NjBW8khId9jZAqMiklfrulimlBAcPjlmng16dsJrgDr.PGXO6QCm', '', 'admin@admin.com', 10, 0, 1552942527, 1552942527);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table onionrings.album
CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_recipe` int(11) DEFAULT NULL,
  `album_name` varchar(15) NOT NULL,
  PRIMARY KEY (`album_id`),
  KEY `fk_album_recipe_idx` (`album_recipe`),
  CONSTRAINT `fk_album_recipe` FOREIGN KEY (`album_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.album: ~2 rows (approximately)
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` (`album_id`, `album_recipe`, `album_name`) VALUES
	(1, NULL, 'OnionRings'),
	(2, NULL, 'New Album');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;

-- Dumping structure for table onionrings.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `fk_auth_assignment_idx` (`item_name`),
  CONSTRAINT `fk_auth_assignment` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.auth_assignment: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping structure for table onionrings.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `fk_auth_item_auth_rule1_idx` (`rule_name`),
  CONSTRAINT `fk_auth_item_auth_rule1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.auth_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping structure for table onionrings.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `fk_auth_item_child_auth_item1_idx` (`parent`),
  KEY `fk_auth_item_child_auth_item2_idx` (`child`),
  CONSTRAINT `fk_auth_item_child_auth_item1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_item_child_auth_item2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.auth_item_child: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping structure for table onionrings.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.auth_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table onionrings.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(15) NOT NULL,
  `category_description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.category: ~0 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`category_id`, `category_name`, `category_description`) VALUES
	(1, 'Japanese', 'Japanese food');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table onionrings.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `comment_owner` int(11) NOT NULL,
  `comment_recipe` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_Comment_User1_idx` (`comment_owner`),
  KEY `fk_Comment_Recipe1_idx` (`comment_recipe`),
  CONSTRAINT `fk_Comment_Recipe1` FOREIGN KEY (`comment_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comment_User1` FOREIGN KEY (`comment_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.comment: ~0 rows (approximately)
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;

-- Dumping structure for table onionrings.ingredient
CREATE TABLE IF NOT EXISTS `ingredient` (
  `ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(15) NOT NULL,
  `ingredient_symbol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ingredient_id`),
  UNIQUE KEY `ingredient_name_UNIQUE` (`ingredient_name`),
  UNIQUE KEY `ingredient_symbol_UNIQUE` (`ingredient_symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.ingredient: ~0 rows (approximately)
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` (`ingredient_id`, `ingredient_name`, `ingredient_symbol`) VALUES
	(1, 'Onion', 'O');
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;

-- Dumping structure for table onionrings.like
CREATE TABLE IF NOT EXISTS `like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `like_owner` int(11) NOT NULL,
  `like_recipe` int(11) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `fk_Like_User1_idx` (`like_owner`),
  KEY `fk_Like_Recipe1_idx` (`like_recipe`),
  CONSTRAINT `fk_Like_Recipe1` FOREIGN KEY (`like_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Like_User1` FOREIGN KEY (`like_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.like: ~0 rows (approximately)
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
/*!40000 ALTER TABLE `like` ENABLE KEYS */;

-- Dumping structure for table onionrings.member
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` smallint(10) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.member: ~1 rows (approximately)
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Guest', '6oYCtjdPS6j_YAATAxoc7RlyfQehW6fj', '$2y$13$A0Q0lBmwrMWraVYXy9K1we7bWTkWeTiGQUiutPLIs7Ls.DimAxE7.', '', 'guest@onionrings.com', 10, 0, 1552494012, 1552494012),
	(3, 'admin', 'mhnZQmZZF6BbKWTNv6_Y58mZNHl_p5Ba', '$2y$13$6NjBW8khId9jZAqMiklfrulimlBAcPjlmng16dsJrgDr.PGXO6QCm', '', 'admin@admin.com', 10, 0, 1552942527, 1552942527);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;

-- Dumping structure for table onionrings.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.migration: ~2 rows (approximately)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1552493108),
	('m130524_201442_init', 1552493116);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Dumping structure for table onionrings.picture
CREATE TABLE IF NOT EXISTS `picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_title` varchar(45) DEFAULT NULL,
  `picture_path` varchar(45) NOT NULL,
  `picture_album` int(11) NOT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `fk_picture_album1_idx` (`picture_album`),
  CONSTRAINT `fk_picture_album1` FOREIGN KEY (`picture_album`) REFERENCES `album` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.picture: ~0 rows (approximately)
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;

-- Dumping structure for table onionrings.rates
CREATE TABLE IF NOT EXISTS `rates` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_owner` int(11) NOT NULL,
  `rate_recipe` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`),
  KEY `fk_Rates_User1_idx` (`rate_owner`),
  KEY `fk_Rates_Recipe1_idx` (`rate_recipe`),
  CONSTRAINT `fk_Rates_Recipe1` FOREIGN KEY (`rate_recipe`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rates_User1` FOREIGN KEY (`rate_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.rates: ~0 rows (approximately)
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;

-- Dumping structure for table onionrings.recipe
CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_title` varchar(45) NOT NULL,
  `recipe_picture` varchar(255) NOT NULL,
  `recipe_date` date NOT NULL,
  `recipe_owner` int(11) NOT NULL,
  `recipe_preparation` text,
  `recipe_category` int(11) NOT NULL,
  `recipe_album` int(11) DEFAULT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `fk_Recipe_User1_idx` (`recipe_owner`),
  KEY `fk_Recipe_Category1_idx` (`recipe_category`),
  KEY `recipe_album` (`recipe_album`),
  CONSTRAINT `fk_Recipe_Category1` FOREIGN KEY (`recipe_category`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recipe_User1` FOREIGN KEY (`recipe_owner`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recipe_ibfk_2` FOREIGN KEY (`recipe_album`) REFERENCES `album` (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.recipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;

-- Dumping structure for table onionrings.recipe_ingredient
CREATE TABLE IF NOT EXISTS `recipe_ingredient` (
  `recipe_ingredient_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `ingredient_quantity` int(11) DEFAULT NULL,
  `ingredient_unit` int(11) NOT NULL,
  `ingredient_desc` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`recipe_ingredient_id`),
  KEY `fk_Recipe_Ingredient_Recipe1_idx` (`recipe_id`),
  KEY `fk_Recipe_Ingredient_Ingredient1_idx` (`ingredient_id`),
  KEY `fk_Recipe_Ingredient_unit1_idx` (`ingredient_unit`),
  CONSTRAINT `fk_Recipe_Ingredient_Ingredient1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`ingredient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recipe_Ingredient_Recipe1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recipe_Ingredient_unit1` FOREIGN KEY (`ingredient_unit`) REFERENCES `unit` (`unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.recipe_ingredient: ~0 rows (approximately)
/*!40000 ALTER TABLE `recipe_ingredient` DISABLE KEYS */;
/*!40000 ALTER TABLE `recipe_ingredient` ENABLE KEYS */;

-- Dumping structure for table onionrings.unit
CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(5) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table onionrings.unit: ~0 rows (approximately)
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
