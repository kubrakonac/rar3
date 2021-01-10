-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 09 Oca 2021, 04:30:24
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `e-commerce`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(3, 1, 14);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

DROP TABLE IF EXISTS `marka`;
CREATE TABLE IF NOT EXISTS `marka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marka_ad` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `marka`
--

INSERT INTO `marka` (`id`, `marka_ad`) VALUES
(1, 'Samsung'),
(2, 'Xiaomi'),
(3, 'Apple'),
(4, 'Oppo'),
(7, 'Huawei');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Galaxy A21S', 750.00, './assets/products/galaxy-a21s.png', '2021-01-09 06:11:19'),
(2, 'Samsung', 'Galaxy A51s', 799.00, './assets/products/galaxy-a51.png', '2021-01-09 06:11:44'),
(3, 'Xiaomi', 'Mi Note 10 Lite', 900.00, './assets/products/mi-note-10-lite.png', '2021-01-09 06:12:49'),
(4, 'Apple', 'Iphone 11', 550.00, './assets/products/iphone-11.png', '2021-01-09 06:14:09'),
(5, 'Apple', 'Iphone 12  Pro', 799.00, './assets/products/iphone-12-pro.png', '2021-01-09 06:14:39'),
(6, 'Xiaomi', 'Redmi Note 8', 499.00, './assets/products/redmi-note-8.png', '2021-01-09 06:15:08'),
(7, 'Xiaomi', 'Redmi Note 8 Pro', 535.00, './assets/products/redmi-note-8-pro.png', '2021-01-09 06:15:24'),
(8, 'Samsung', 'Galaxy A71', 600.00, './assets/products/galaxy-a71.png', '2021-01-09 06:15:50'),
(9, 'Samsung', 'Galaxy Note 10 Lite', 650.00, './assets/products/galaxy-note-10-lite.png', '2021-01-09 06:16:07'),
(10, 'Apple', 'Iphone 11 Pro', 780.00, './assets/products/iphone-11-pro.png', '2021-01-09 06:16:32'),
(11, 'Apple', 'Iphone X', 499.00, './assets/products/iphone-x.png', '2021-01-09 06:16:49'),
(12, 'Oppo', 'Oppo A72', 699.00, './assets/products/oppo-a72.png', '2021-01-09 06:17:15'),
(13, 'Apple', 'Iphone 12 Pro Max', 1300.00, './assets/products/iphone-12-pro-max.png', '2021-01-09 06:17:35'),
(14, 'Xiaomi', 'Redmi 9C', 250.00, './assets/products/redmi-9c.png', '2021-01-09 06:17:53'),
(15, 'Xiaomi', 'Redmi Note 9', 450.00, './assets/products/redmi-note-9.png', '2021-01-09 06:18:17'),
(16, 'Samsung', 'Galaxy S20', 850.00, './assets/products/galaxy-s20.png', '2021-01-09 06:18:43'),
(17, 'Oppo', 'Oppo A91', 750.00, './assets/products/oppo-a91.png', '2021-01-09 06:19:01'),
(18, 'Huawei', 'Huawei P Smart', 350.00, './assets/products/huawei-psmart.png', '2021-01-09 06:40:09'),
(19, 'Huawei', 'Huawei P40', 800.00, './assets/products/huawei-p40.png', '2021-01-09 06:40:32'),
(20, 'Huawei', 'Huawei P40 Pro', 950.00, './assets/products/huawei-p40-pro.png', '2021-01-09 06:40:48');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `register_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `register_date`) VALUES
(1, 'User', '1', '2021-01-09 01:21:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
