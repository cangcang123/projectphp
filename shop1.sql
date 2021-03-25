-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 25, 2021 lúc 02:01 PM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `idc` int NOT NULL AUTO_INCREMENT,
  `idcd` int NOT NULL,
  `iduser` int NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`idc`),
  KEY `FK_cart1` (`idcd`),
  KEY `FK_cart2` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`idc`, `idcd`, `iduser`, `status`) VALUES
(22, 27, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetal`
--

DROP TABLE IF EXISTS `cartdetal`;
CREATE TABLE IF NOT EXISTS `cartdetal` (
  `idcd` int NOT NULL AUTO_INCREMENT,
  `idsp` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`idcd`),
  KEY `FK_cd` (`idsp`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `cartdetal`
--

INSERT INTO `cartdetal` (`idcd`, `idsp`, `quantity`) VALUES
(26, 27, 1),
(27, 21, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namprod`
--

DROP TABLE IF EXISTS `namprod`;
CREATE TABLE IF NOT EXISTS `namprod` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `namprod`
--

INSERT INTO `namprod` (`id`, `name`) VALUES
(1, 'Điện Thoại'),
(2, 'Table'),
(3, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prodtype`
--

DROP TABLE IF EXISTS `prodtype`;
CREATE TABLE IF NOT EXISTS `prodtype` (
  `idp` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idname` int NOT NULL,
  PRIMARY KEY (`idp`),
  KEY `FK_pro` (`idname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `prodtype`
--

INSERT INTO `prodtype` (`idp`, `name`, `idname`) VALUES
(1, 'Điện Thoại iphone', 1),
(2, 'Điện Thoại Samsung', 1),
(3, 'Điện Thoại Oppo', 1),
(4, 'ipad', 2),
(5, 'table Samsung', 2),
(6, 'table oppo', 2),
(7, 'Phụ Kiện iphone', 3),
(8, 'Phụ Kiện Samsung', 3),
(9, 'Phụ Kiện oppo', 3),
(10, 'phụ kiện khác', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `idsp` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `price` int NOT NULL,
  `gb` int DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `idtype` int NOT NULL,
  `content` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  PRIMARY KEY (`idsp`),
  KEY `FK_sp` (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idsp`, `name`, `price`, `gb`, `color`, `type`, `idtype`, `content`, `image`) VALUES
(17, 'iphone 11 red newlike 99%', 14000000, 64, 'Đỏ', 'newlike 99%', 2, 'iphone 11 64GB newlike 99% . hàng bao mới , đảm bảo 100%', 'iphone11red1.png'),
(18, 'iphone 8plus newlike 99%', 7689000, 64, 'vàng', 'newlike 99%', 4, 'iphone 8 plus 64GB newlike 99% . hàng bao mới , đảm bảo 100%', 'ip8plus.png'),
(19, 'iphone X newlike 99%', 10589000, 256, 'Đen', 'newlike 99%', 3, 'iphone X 256GB newlike 99% . hàng bao mới , đảm bảo 100%', 'iphoneXden.png'),
(20, 'Samsung Galaxy A10s 32GB/2GB Mới', 2789000, 32, 'Đỏ', 'new 100%', 5, 'Samsung Galaxy A10s 32GB/2GB Mới 100%. hàng bao mới , đảm bảo 100%', 'samsungA10s.png'),
(21, 'Samsung Galaxy A11 32GB new 100%', 2989000, 32, 'Xanh Dương', 'new 100%', 5, 'Samsung Galaxy A11 32GB new 100%. hàng bao mới , đảm bảo 100%', 'samsunga11.png'),
(22, 'Oppo A92 (8GB/128GB) new 100%', 5590000, 128, 'Đen', 'new 100%', 10, 'Oppo A92 (8GB/128GB) new 100% . hàng bao mới , đảm bảo 100%', 'oppoA92png.png'),
(23, 'Oppo A93 (8GB/128GB) new 100%', 6690000, 128, 'Xanh Dương', 'new 100%', 10, 'Oppo A93 (8GB/128GB) new 100% . hàng bao mới , đảm bảo 100%', 'oppoA93.png'),
(24, 'ipad air 2 4G 64GB newlike 99%', 6000000, 64, 'vàng', 'newlike 99%', 6, 'ipad air 2 4G 64GB newlike 99%. hàng bao mới , đảm bảo 100%', 'ipad2.png'),
(25, 'ipad air 1 4G 16GB cũ', 4000000, 16, 'Đen', 'newlike 98%', 6, 'ipad air 1 4G 16GB cũ. hàng bao mới , đảm bảo 100%', 'ipad1.png'),
(27, 'iPhone X 64GB Cũ 99% ', 8389000, 64, 'Trắng', '99%', 3, '', 'iphone_x_64gb_3.jpg'),
(32, 'iPad Pro 12.9 inch 2020 Wifi 256GB Chính Hãng ', 26000000, 256, 'Silver', '100%', 11, '', 'ipad-pro-2020-12inch-256gb-4g-den.jpg'),
(33, 'iPad Pro 2020 11inch 128GB Wi-Fi & 4G Chính hãng', 23790000, 128, 'Silver', '100%', 11, '', 'ipad-pro-2020-12inch-256gb-4g-den.jpg'),
(34, 'iPad Pro 2020 11inch 128GB Wi-Fi Chính hãng', 20190000, 128, 'Silver', '100%', 11, '', 'ipad-pro-2020-12inch-256gb-4g-den.jpg'),
(35, 'iPad Gen 8 32GB Wifi Chính hãng', 8990000, 32, 'gold', '100%', 12, '', 'ipad-10-2inch-2020-mau-vang_1.jpg'),
(36, 'iPad Air 4 (2020) 64GB Wifi Chính hãng', 15390000, 64, 'Grey', '100%', 13, '', 'ipad-air-4-2020-xam.jpg'),
(37, 'iPad Air 4 (2020) 256GB Wifi Chính hãng', 19190000, 256, 'Xanh Lá Cây', '100%', 13, '', 'ipad-air-2020-256gb-xanh-la-cay_1.jpg'),
(38, 'Samsung Galaxy Tab A7 (2020)', 7290000, 64, 'Xám', '100%', 8, '', 'tab_a7_1.jpg'),
(39, 'Samsung Galaxy Tab S6 Lite 64GB Chính hãng', 8990000, 64, 'Đen', '100%', 8, '', 'samsung-galaxy-tab-s6-lite-den-didongviet_1_1.png'),
(40, 'Cáp Pisen Lightning Fast 1000mm AL05-1000', 150000, 0, 'Trắng', '100%', 14, '', 'cap-pisen-lightning-fast-al05_1.jpg'),
(41, 'Dây cáp sạc Micro USB Belkin MIXIT F2CU012bt04', 100000, 0, 'đen', '100%', 15, '', 'cap-belkin-micro-usb-den-didongviet_1.jpg'),
(42, 'Sạc dự phòng Energizer 10,000mAh', 550000, 0, 'đen', '100%', 16, '', 'sac-du-phong-energizer-10-000mah-3-7v-li-polymer-ue10054.jpg'),
(43, 'Loa Bluetooth JBL PULSE 4', 4990000, 0, 'Trắng', '100%', 17, '', 'jbl-pulse-4.jpg'),
(44, 'Loa Bluetooth JBL Flip 5', 239000, 0, 'đỏ', '100%', 17, '', 'loa-jbl-flip-5-do.jpg'),
(45, 'Loa Bluetooth Motorola Sonic Mini Boost 210', 790000, 0, 'Vàng', '100%', 17, '', 'loa-bluetooth-mini-motorola-sonic-boost-210.jpg'),
(46, 'Loa Bluetooth JBL Go Plus', 750000, 0, 'Đen', '100%', 17, '', 'loa-bluetooth-jbl-go-plus_1_1.jpg'),
(47, 'Loa Bluetooth Harman Kardon Aura Studio 3', 6900000, 0, 'Đen', '100%', 17, '', 'loa-harman-kardon-aura-studio-3_1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productype`
--

DROP TABLE IF EXISTS `productype`;
CREATE TABLE IF NOT EXISTS `productype` (
  `idt` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idpro` int NOT NULL,
  PRIMARY KEY (`idt`),
  KEY `FK_ty` (`idpro`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `productype`
--

INSERT INTO `productype` (`idt`, `name`, `idpro`) VALUES
(1, 'iphone 12', 1),
(2, 'iphone 11', 1),
(3, 'iphone X', 1),
(4, 'iphone 8', 1),
(5, 'samsung galaxy ', 2),
(6, 'ipad air 2', 4),
(8, 'Samsung Galaxy Tab', 5),
(9, 'oppo Reno', 3),
(10, 'oppo A', 3),
(11, 'ipad pro', 4),
(12, 'Ipad Gen', 4),
(13, 'Ipad Air', 4),
(14, 'Cáp Sạc iphone', 7),
(15, 'Cáp Sạc Samsung', 8),
(16, 'Sạc Dự Phòng', 10),
(17, 'loa', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test1`
--

DROP TABLE IF EXISTS `test1`;
CREATE TABLE IF NOT EXISTS `test1` (
  `idte` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idt` int NOT NULL,
  PRIMARY KEY (`idte`),
  KEY `FK_test` (`idt`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `test1`
--

INSERT INTO `test1` (`idte`, `name`, `idt`) VALUES
(1, 'iphone', 1),
(2, 'ip', 2),
(3, 'iphone X', 3),
(4, 'iphone X', 3),
(5, 'iphone 12 pro', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `phone` int NOT NULL,
  `adress` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `adgroup` int NOT NULL,
  `active` int NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`iduser`, `name`, `username`, `email`, `phone`, `adress`, `password`, `adgroup`, `active`) VALUES
(1, 'test4', 'test4', 'test4@gmail.com', 123123, '12312 3eqweqw', 'efd04db5757bcef0a8896458480b3240', 1, 1),
(2, 'test', 'test', 'test@gmail.com', 123123, '12312 3eqweqw', 'b9561bb14fdd61ad78b88cdc3c21e727', 0, 1),
(5, 'test3', 'test3', 'test3@gmail.com', 12312, '12312 3eqweqw', 'be5d718b3c21b56321c405e095dfb52a', 0, 0),
(6, 'test2', 'test2', 'test2@gmail.com', 12312, '12312 3eqweqw', '4df3495ef6d09e1424c2c0558325b758', 0, 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_cart1` FOREIGN KEY (`idcd`) REFERENCES `cartdetal` (`idcd`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_cart2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `cartdetal`
--
ALTER TABLE `cartdetal`
  ADD CONSTRAINT `FK_cd` FOREIGN KEY (`idsp`) REFERENCES `product` (`idsp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `namprod`
--
ALTER TABLE `namprod`
  ADD CONSTRAINT `FK_pr` FOREIGN KEY (`id`) REFERENCES `prodtype` (`idname`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `prodtype`
--
ALTER TABLE `prodtype`
  ADD CONSTRAINT `FK_pro` FOREIGN KEY (`idname`) REFERENCES `namprod` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_sp` FOREIGN KEY (`idtype`) REFERENCES `productype` (`idt`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `productype`
--
ALTER TABLE `productype`
  ADD CONSTRAINT `FK_ty` FOREIGN KEY (`idpro`) REFERENCES `prodtype` (`idp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `test1`
--
ALTER TABLE `test1`
  ADD CONSTRAINT `FK_test` FOREIGN KEY (`idt`) REFERENCES `productype` (`idt`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
