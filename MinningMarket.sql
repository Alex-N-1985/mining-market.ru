-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 18 2024 г., 01:26
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `MinningMarket`
--
CREATE DATABASE IF NOT EXISTS `MinningMarket` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `MinningMarket`;

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `preview` varchar(1000) NOT NULL,
  `author` varchar(25) NOT NULL,
  `published` int NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cat_type` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cats_articles`
--

DROP TABLE IF EXISTS `cats_articles`;
CREATE TABLE IF NOT EXISTS `cats_articles` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `article` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cats_images`
--

DROP TABLE IF EXISTS `cats_images`;
CREATE TABLE IF NOT EXISTS `cats_images` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `category` int NOT NULL,
  `image` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Clients`
--

DROP TABLE IF EXISTS `Clients`;
CREATE TABLE IF NOT EXISTS `Clients` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `client_type` varchar(50) NOT NULL,
  `login` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `uri` varchar(50) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `date_upload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_upload` int NOT NULL,
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `images_articles`
--

DROP TABLE IF EXISTS `images_articles`;
CREATE TABLE IF NOT EXISTS `images_articles` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `article` int NOT NULL,
  `image` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `images_statpages`
--

DROP TABLE IF EXISTS `images_statpages`;
CREATE TABLE IF NOT EXISTS `images_statpages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `statpage` int NOT NULL,
  `Image` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `measure_unit`
--

DROP TABLE IF EXISTS `measure_unit`;
CREATE TABLE IF NOT EXISTS `measure_unit` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `sender` int DEFAULT NULL,
  `receiver` int NOT NULL,
  `content` text NOT NULL,
  `date_send` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `client` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `decription` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `prod_type` int NOT NULL,
  `seller` int NOT NULL,
  `photo` int NOT NULL,
  `price` float NOT NULL,
  `available` int NOT NULL,
  `decription` varchar(1000) NOT NULL,
  `user_added` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products_orders`
--

DROP TABLE IF EXISTS `products_orders`;
CREATE TABLE IF NOT EXISTS `products_orders` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  `quantity` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Product_specifications`
--

DROP TABLE IF EXISTS `Product_specifications`;
CREATE TABLE IF NOT EXISTS `Product_specifications` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `product` int NOT NULL,
  `specification` int NOT NULL,
  `measure_unit` int NOT NULL,
  `value` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `specifications`
--

DROP TABLE IF EXISTS `specifications`;
CREATE TABLE IF NOT EXISTS `specifications` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statpages`
--

DROP TABLE IF EXISTS `statpages`;
CREATE TABLE IF NOT EXISTS `statpages` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `uri` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `avatar` int DEFAULT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_login` datetime DEFAULT NULL,
  `hash` varchar(25) DEFAULT NULL,
  `secure_level` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `login`, `password`, `email`, `avatar`, `date_reg`, `date_login`, `hash`, `secure_level`) VALUES
(1, 'siteAdmin', 'password', 'testemail@mail.ru', 0, '2024-10-18 01:25:31', NULL, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
