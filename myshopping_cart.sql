-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2024 lúc 04:20 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshopping_cart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `type`) VALUES
(62, 'Crocs Hiker 2.0 Festival', 200, '1.png', 'crocs'),
(63, 'Crocs All Black', 150, '2.png', 'crocs'),
(64, 'Crocs Off Grid', 150, '4.png', 'crocs'),
(65, 'Crocs Basic Brown', 70, '3.png', 'crocs'),
(66, 'Crocs Camouflage', 200, '5.png', 'crocs'),
(68, 'Crocs All White', 100, '6.png', 'crocs'),
(69, 'Crocs Winter', 70, '7.png', 'crocs'),
(70, 'Crocs Rainbow', 70, '8.png', 'crocs'),
(71, 'Crocs Printed Camo', 150, '12.png', 'crocs'),
(72, 'Crocs All Blue', 120, '11.png', 'crocs'),
(73, 'Spiderman Hunter ', 250, 'hunter.jpg', 'hunter'),
(74, 'Future Hunter', 300, 'hunter2.jpg', 'hunter'),
(75, 'J Hunter', 200, 'hunter5.jpg', 'hunter'),
(76, 'All White Hunter', 200, 'hunter4.jpg', 'hunter'),
(77, 'Headphone', 450, 'headphone.jpg', 'tech'),
(78, 'Earbuds', 250, 'earbuds.jpg', 'tech'),
(79, 'Laptop', 500, 'laptop.jpg', 'tech'),
(80, 'Iphone', 1000, 'iphone.jpg', 'tech'),
(81, 'Hunter x Hunter', 350, 'hunter6.jpg', 'hunter');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`) VALUES
(2, '522h0110', 'trung@gmail.com', 22, 'redhoutrung3122004'),
(3, 'admin', 'admin@gmail.com', 20, '123'),
(4, '522h0123', '522h0123@student.tdtu.edu.vn', 20, '123'),
(5, '522h0141', '522h0141@student.tdtu.edu.vn', 20, '123'),
(6, 'client', 'client@gmail.com', 18, '123'),
(7, 'nhat', 'nhat@gmail.com', 200, '34521'),
(8, 'ka', 'ka@gmail.com', 22, '567'),
(9, 'sang', 'sang@gmail.com', 20, '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
