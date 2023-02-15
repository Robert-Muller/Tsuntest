-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 16, 2022 lúc 03:17 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mysqli`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment_method` varchar(50) NOT NULL DEFAULT '''cod'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `payment_method`) VALUES
(2, 'Nguyen', '0946', 'abc@gmail.com', 'Bac Ninh', 'bacs'),
(3, 'assc', '123345', 'avc@gmail.com', 'ascc', 'cod'),
(4, 'demo', '037580', 'abc@gmail.com', 'Ha Noi', 'bacs'),
(5, 'demo', '037580', 'abc@gmail.com', 'Bac Ninh', 'bacs'),
(7, 'demo', '037580', 'demo123@gmail.com', 'Ha Noi', 'cod'),
(8, 'demo', '037580', 'kienjok6@gmail.com', 'Ha Noi', 'bacs'),
(9, 'demo1233333333333', '037580', 'aaaa@aa.com', 'Hưng Yên', 'bacs'),
(10, 'demo', '037580', 'demo@gmail.com', 'Bac Ninh', 'bacs'),
(11, 'demo123', '03758012331231', 'demo@gmail.com', 'Bac Ninh', 'cod');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `size` varchar(50) NOT NULL,
  `Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `size`, `Number`) VALUES
(1, 2, 1, 1, 'S', 2),
(2, 2, 3, NULL, 'M', 1),
(4, 3, 2, NULL, 'XL', 3),
(5, 11, 1, 3, 'M', 4),
(6, 11, 2, 3, 'S', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price_Sale` int(10) DEFAULT NULL,
  `Price_default` int(10) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_name2` varchar(255) NOT NULL,
  `image_name3` varchar(255) NOT NULL,
  `image_name4` varchar(255) NOT NULL,
  `Class` int(10) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price_Sale`, `Price_default`, `image_name`, `image_name2`, `image_name3`, `image_name4`, `Class`, `Status`) VALUES
(1, 'Lit Mascot Polo', 385000, 420000, './productlist/Lit-Mascot-Polo-1.jpg', './productlist/Lit-Mascot-Polo-2.jpg', './productlist/Lit-Mascot-Polo-3.jpg', './productlist/Lit-Mascot-Polo-4.jpg', 1, 1),
(2, 'Marshmallow Tee - White', 315000, 350000, './productlist/Marshmallow-Tee - White-1.jpg', './productlist/Marshmallow-Tee - White-2.jpg', './productlist/Marshmallow-Tee - White-3.jpg', './productlist/Marshmallow-Tee - White-4.jpg', 1, 1),
(3, 'Paint Mascot Tee - Black', 285000, 320000, './productlist/Paint-Mascot-Tee - Black1.jpeg', './productlist/Paint-Mascot-Tee - Black2.jpeg', './productlist/Paint-Mascot-Tee - Black3.jpeg', './productlist/Paint-Mascot-Tee - Black4.jpeg', 1, 1),
(4, 'TSUN Fancy Tee - White', 315000, 350000, './productlist/Fancy-Tee - White1.jpg', './productlist/Fancy-Tee - White2.jpg', './productlist/Fancy-Tee - White3.jpg', './productlist/Fancy-Tee - White4.jpg', 1, 1),
(5, 'TSUN Minibag Heart Pattern - Black', 315000, 350000, './productlist/Minibag-Heart-Pattern - Black1.jpeg', './productlist/Minibag-Heart-Pattern - Black2.jpeg', './productlist/Minibag-Heart-Pattern - Black3.jpeg', './productlist/Minibag-Heart-Pattern - Black4.jpeg', 3, 1),
(6, 'TSUN Minibag Heart Pattern - White', 315000, 350000, './productlist/Minibag-Heart-Pattern - White1.jpeg', './productlist/Minibag-Heart-Pattern - White2.jpeg', './productlist/Minibag-Heart-Pattern - White3.jpeg', './productlist/Minibag-Heart-Pattern - White4.jpeg', 3, 1),
(7, 'TSUN Fleece Minibag', 245000, 280000, './productlist/Fleece-Minibag1.jpeg', './productlist/Fleece-Minibag2.jpeg', './productlist/Fleece-Minibag3.jpeg', './productlist/Fleece-Minibag4.jpeg', 3, 1),
(8, 'TSUN Fire Mascot Tee', 315000, 350000, './productlist/Fire-Mascot-Tee1.jpeg', './productlist/Fire-Mascot-Tee2.jpeg', './productlist/Fire-Mascot-Tee3.jpeg', './productlist/Fire-Mascot-Tee4.jpeg', 1, 1),
(9, 'TSUN Trousers', 415000, 450000, './productlist/Trousers1.jpeg', './productlist/Trousers2.jpeg', './productlist/Trousers3.png', './productlist/Trousers4.png', 4, 1),
(10, 'TSUN Sunrise Tee', 315000, 350000, './productlist/Sunrise-Tee1.jpeg', './productlist/Sunrise-Tee2.jpeg', './productlist/Sunrise-Tee3.jpeg', './productlist/Sunrise-Tee4.jpeg', 1, 1),
(11, 'TSUN Sunset Tee', 315000, 350000, './productlist/Sunset-Tee1.jpeg', './productlist/Sunset-Tee2.jpeg', './productlist/Sunset-Tee3.jpeg', './productlist/Sunset-Tee4.jpeg', 1, 1),
(12, 'Broken Wash Tee', 355000, 390000, './productlist/Broken-Wash-Tee1.jpeg', './productlist/Broken-Wash-Tee2.jpeg', './productlist/Broken-Wash-Tee3.jpeg', './productlist/Broken-Wash-Tee4.jpeg', 1, 1),
(13, 'Beachy Beachy Wash Tee', 355000, 390000, './productlist/Beachy-Beachy-Wash-Tee1.jpeg', './productlist/Beachy-Beachy-Wash-Tee2.jpeg', './productlist/Beachy-Beachy-Wash-Tee3.jpeg', './productlist/Beachy-Beachy-Wash-Tee4.jpeg', 1, 1),
(14, 'Chains Breaker Wash Tee', 355000, 390000, './productlist/Chains-Breaker-Wash-Tee1.jpeg', './productlist/Chains-Breaker-Wash-Tee2.jpeg', './productlist/Chains-Breaker-Wash-Tee3.jpeg', './productlist/Chains-Breaker-Wash-Tee4.jpeg', 1, 1),
(15, 'MSW Wash Tee', 355000, 390000, './productlist/MSW-Wash-Tee1.jpeg', './productlist/MSW-Wash-Tee2.jpeg', './productlist/MSW-Wash-Tee3.jpeg', './productlist/MSW-Wash-Tee4.jpeg', 1, 1),
(16, 'TSUN Mascot B/P Tee', 285000, 320000, './productlist/Mascot-BP-Tee1.jpeg', './productlist/Mascot-BP-Tee2.jpeg', './productlist/Mascot-BP-Tee3.jpeg', './productlist/Mascot-BP-Tee4.jpeg', 1, 1),
(17, 'TSUN PW Tee', 285000, 320000, './productlist/PW-Tee1.jpeg', './productlist/PW-Tee2.jpeg', './productlist/PW-Tee3.jpg', './productlist/PW-Tee4.jpg', 1, 1),
(18, 'Mascot Jacket - Black', 485000, 520000, './productlist/Mascot-Jacket - Black1.jpeg', './productlist/Mascot-Jacket - Black2.jpeg', './productlist/Mascot-Jacket - Black3.jpeg', './productlist/Mascot-Jacket - Black4.jpg', 2, 1),
(19, 'TSUN Mascot Hand Fan Jacket', 485000, 520000, './productlist/Mascot-Hand-Fan-Jacket1.jpeg', './productlist/Mascot-Hand-Fan-Jacket2.jpeg', './productlist/Mascot-Hand-Fan-Jacket3.jpeg', './productlist/Mascot-Hand-Fan-Jacket4.jpg', 2, 1),
(20, 'Reflective Line Pant', 415000, 450000, './productlist/Reflective-Line-Pant1.jpeg', './productlist/Reflective-Line-Pant2.jpeg', './productlist/Reflective-Line-Pant3.jpeg', './productlist/Reflective-Line-Pant4.jpg', 4, 1),
(21, 'TSUN Mascot Cupid Sweater', 435000, 470000, './productlist/Mascot-Cupid-Sweater1.jpeg', './productlist/Mascot-Cupid-Sweater2.jpeg', './productlist/Mascot-Cupid-Sweater3.jpeg', './productlist/Mascot-Cupid-Sweater4.jpeg', 6, 1),
(22, 'TSUN Paint Mascot Hoodie - Tan', 485000, 520000, './productlist/Paint-Mascot-Hoodie - Tan1.jpg', './productlist/Paint-Mascot-Hoodie - Tan2.jpg', './productlist/Paint-Mascot-Hoodie - Tan3.jpg', './productlist/Paint-Mascot-Hoodie - Tan4.jpg', 5, 1),
(23, 'Donut Zip Hoodie - Black', 485000, 520000, './productlist/Donut-Zip-Hoodie - Black1.jpg', './productlist/Donut-Zip-Hoodie - Black2.jpg', './productlist/Donut-Zip-Hoodie - Black3.jpeg', './productlist/Donut-Zip-Hoodie - Black1.jpeg', 5, 1),
(24, '8-Ball Hoodie - Black', 515000, 550000, './productlist/8-Ball-Hoodie - Black1.jpg', './productlist/8-Ball-Hoodie - Black2.jpg', './productlist/8-Ball-Hoodie - Black1.jpg', './productlist/8-Ball-Hoodie - Black2.jpg', 5, 1),
(25, 'TSUN Mascot Tattooss Hoodie - White', 485000, 520000, './productlist/Mascot-Tattooss-Hoodie - White1.jpg', './productlist/Mascot-Tattooss-Hoodie - White2.jpg', './productlist/Mascot-Tattooss-Hoodie - White1.jpg', './productlist/Mascot-Tattooss-Hoodie - White4.jpg', 5, 1),
(26, 'TSUN Mini Bag', 145000, 180000, './productlist/Mini-Bag1.jpg', './productlist/Mini-Bag2.jpg', './productlist/Mini-Bag3.jpg', './productlist/Mini-Bag1.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(28) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `password`, `phone`, `email`) VALUES
(1, 'Nguyễn Hà', 'ha123', '0911', 'baha@gmail.com'),
(2, 'Nguyen Van Vu', 'vusot2k2', '0357', 'vusot2002@gmail.com'),
(3, 'demo', '123456', '0369753159', 'demo@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `useradmin`
--

CREATE TABLE `useradmin` (
  `AdminId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `useradmin`
--

INSERT INTO `useradmin` (`AdminId`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`AdminId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`ID`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
