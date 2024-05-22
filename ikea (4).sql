-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 01:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikea`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_table`
--

CREATE TABLE `acc_table` (
  `acc_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acc_table`
--

INSERT INTO `acc_table` (`acc_id`, `f_name`, `l_name`, `email`, `position`, `username`, `password`, `phone`, `address`) VALUES
(1, 'ahmed', 'mohamed', 'ahmed@gmail.com', 'admin', 'ahmed', '000', 0, ''),
(3, 'ziad', 'temo', 'ziad@gmail.com', 'customer', 'zezo', '000', 0, ''),
(6, 'ahmed', 'alaraby', 'ahmedalaraby066@gmail.com', 'customer', 'ahmed066', '010', 1289321760, 'qualiup,qaliupia,21jumpstreet'),
(7, 'jana', 'ahmed', 'janaahmed@gmail.com', 'costumer', 'jana15', '123456', 1061107459, 'qualiup,qaliupia,dalia');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(2, 'tabels'),
(31, 'beds'),
(32, 'chairs'),
(33, 'sofas'),
(34, 'lighting'),
(35, 'kitchens'),
(36, 'mirrors'),
(37, 'bthroom accessories'),
(38, 'storage & organization'),
(39, 'cushions cover'),
(40, 'Home accessories');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `acc_id`, `order_date`, `total_price`) VALUES
(5, 6, '0000-00-00 00:00:00', 0),
(6, 6, '2023-12-24 22:00:00', 0),
(7, 6, '2023-12-25 08:29:22', 0),
(8, 6, '2023-12-25 12:20:05', 0),
(9, 6, '2023-12-25 13:32:51', 4120.76),
(10, 6, '2023-12-25 12:47:05', 0),
(11, 6, '2023-12-25 14:06:09', 3542.07),
(12, 6, '2023-12-25 13:13:28', 0),
(13, 6, '2023-12-25 14:18:46', 2059.5),
(14, 6, '2023-12-25 13:22:37', 0),
(15, 1, '2023-12-25 17:47:20', 0),
(16, 6, '2023-12-25 18:25:01', 0),
(17, 6, '2023-12-25 18:39:54', 0),
(18, 6, '2023-12-25 19:17:45', 0),
(19, 6, '2023-12-25 19:19:27', 0),
(20, 6, '2023-12-25 19:35:52', 0),
(21, 6, '2023-12-25 19:39:16', 0),
(22, 6, '2023-12-25 20:32:41', 0),
(23, 6, '2023-12-25 21:39:48', 4753.5),
(24, 6, '2023-12-25 22:08:39', 2331),
(25, 6, '2023-12-25 21:17:44', 0),
(26, 6, '2023-12-26 07:07:47', 783),
(27, 6, '2023-12-26 07:49:53', 0),
(28, 7, '2023-12-26 07:54:29', 0),
(29, 7, '2023-12-26 09:29:56', 900),
(30, 7, '2023-12-26 10:33:50', 12233.2),
(31, 6, '2023-12-26 10:45:21', 0),
(32, 6, '2023-12-26 12:39:01', 0),
(33, 6, '2023-12-27 04:29:16', 0),
(34, 6, '2023-12-27 05:48:57', 0),
(35, 6, '2023-12-27 06:33:56', 0),
(36, 6, '2023-12-27 06:39:45', 0),
(37, 6, '2023-12-27 06:44:54', 0),
(38, 6, '2023-12-27 08:42:11', 1017),
(39, 6, '2023-12-27 07:42:44', 0),
(40, 6, '2023-12-27 07:48:49', 0),
(41, 6, '2023-12-27 07:51:04', 0),
(42, 6, '2023-12-27 08:01:27', 0),
(44, 6, '2023-12-27 08:41:17', 4240),
(46, 6, '2023-12-27 08:31:27', 0),
(47, 6, '2023-12-27 08:41:22', 0),
(48, 6, '2023-12-27 08:45:06', 1640),
(49, 6, '2023-12-27 08:45:11', 0),
(50, 6, '2023-12-27 10:58:14', 0),
(51, 6, '2023-12-27 11:27:56', 2040),
(52, 6, '2023-12-27 11:28:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `price`, `quantity`, `discount`) VALUES
(30, 32, 4000, 3, 0.4),
(30, 28, 90, 1, 0.1),
(30, 23, 100, 1, 0),
(30, 19, 600, 1, 0.4),
(30, 41, 400, 1, 0.2),
(33, 42, 1000, 0, 0.1),
(34, 27, 700, 1, 0),
(35, 20, 950, 3, 0),
(35, 29, 250, 3, 0),
(38, 37, 780, 1, 0.1),
(38, 38, 450, 1, 0.3),
(44, 34, 600, 3, 0.2),
(44, 27, 700, 4, 0),
(48, 34, 600, 3, 0.2),
(48, 23, 100, 2, 0),
(51, 25, 500, 2, 0.4),
(51, 46, 600, 4, 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_id` int(11) NOT NULL,
  `Card_number` int(11) NOT NULL,
  `holder_name` varchar(40) NOT NULL,
  `experation` varchar(7) NOT NULL,
  `cvv` int(3) NOT NULL,
  `acc_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_id`, `Card_number`, `holder_name`, `experation`, `cvv`, `acc_Id`) VALUES
(1, 1231231231, 'jana', '22/2000', 10, 7),
(2, 1111111111, 'ahmed', '20/1998', 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL,
  `description` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `unit_in_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `cat_id`, `price`, `discount`, `description`, `img`, `unit_in_stock`) VALUES
(19, 'mickey mirror', 36, 600, 0.4, 'new mirror shape you must own it now !', 'mir5.jpg', 100),
(20, 'moon mirror', 36, 950, 0, 'limited edition mirror hurry up!', 'mir4.jpg', 5),
(22, 'oil containers', 38, 200, 0.7, 'affordable oil container', 'cont1.jpg', 90),
(23, ' food container', 38, 100, 0, 'strong food container keep food very well', 'cont5.jpg', 125),
(24, 'spices container', 38, 180, 0, 'high end containers', 'cont3.jpg', 70),
(25, 'wood table', 2, 500, 0.4, 'high quality wood table', 'table1 .jpg', 30),
(26, 'white table', 2, 890, 0.5, 'high end quality ', 'table3.jpg', 20),
(27, 'cute table', 2, 700, 0, 'limited edition table', 'table5.jpg', 5),
(28, 'white cover cushions', 39, 90, 0.1, 'soft cover', 'cosh1.jpg', 60),
(29, 'feathers cushions', 39, 250, 0, 'limited edition cover', 'cosh4.jpg', 6),
(30, 'offwhite cushions', 39, 220, 0.3, 'fashionable cushions', 'cosh5.jpg', 30),
(31, 'soft bed', 31, 1200, 0.7, 'high quality bed ', 'bed5.jpg', 200),
(32, 'comfy bed', 31, 4000, 0.4, 'very comfy bed you must own it!', 'bed2.jpg', 60),
(33, 'blue bed', 31, 4000, 0.3, 'high quality bed', 'bed4.jpg', 90),
(34, 'soft sofa', 33, 600, 0.2, 'very high quality sofa', 'sofa1.jpg', 125),
(35, 'pink sofa', 33, 550, 0.3, 'comfy pink sofa', 'sofa2.jpg', 113),
(36, 'mint green sofa', 33, 466, 0.4, 'comfy & very high quality sofa', 'sofa4.jpg', 454),
(37, 'fastionable chair', 32, 780, 0.1, 'limited eddtion you should buy it', 'chair1.jpg', 90),
(38, 'pink chair', 32, 450, 0.3, 'soft & comfy chair', 'chair2.jpg', 90),
(39, 'Bathroom', 37, 5000, 0.1, 'High quality bathroom accessories with a good matrial  ', 'bathroom1 (1).jpg', 10),
(40, 'Bathroom mirror', 37, 500, 0.1, 'High quality bathroom mirror for a luxerious look', 'bathroom2.jpg', 5),
(41, 'Bathroom lighting', 37, 400, 0.2, 'High quality Bathroom lighting ', 'bathroom3.jpg', 30),
(42, 'shower caoin', 37, 1000, 0.1, 'High quality shower cabin', 'bathroom4.jpg', 20),
(44, 'Lamp', 34, 90, 0.1, 'high quality lamp', 'lamp1.jpg', 30),
(45, 'lamp', 34, 300, 0.2, 'high quality lamp', 'lamp2.jpg', 30),
(46, 'lamp', 34, 600, 0.4, 'high quality lamp', 'lamp3.jpg', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_table`
--
ALTER TABLE `acc_table`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_id`),
  ADD KEY `acc_Id` (`acc_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_table`
--
ALTER TABLE `acc_table`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `acc_table` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`acc_Id`) REFERENCES `acc_table` (`acc_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
