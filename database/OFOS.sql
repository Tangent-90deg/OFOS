-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 28, 2023 at 08:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `productid` int(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pname`, `price`, `productid`, `userid`) VALUES
(66, 'Kadai Paneer', 150, 84, 24);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category`, `details`, `date`) VALUES
('Fruits', '', '2023-04-10'),
('Juice', '', '2023-04-10'),
('Low Cholestrol', '', '2023-04-10'),
('Non Veg', '', '2023-04-10'),
('Sweets', '', '2023-04-10'),
('Sweets Sugar Free', '', '2023-04-10'),
('Veg', '', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `orderid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `homeaddress` text NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `orderdate` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`orderid`, `fname`, `nickname`, `homeaddress`, `dob`, `gender`, `payment`, `productid`, `orderdate`, `status`) VALUES
(34, 'Abhishek kumar', 'kumar', 'kp4', '2023-04-28', 'Male', 'cash', 19, '2023-04-28', 'Pending'),
(35, 'Abhishek kumar', 'kumar', 'kp4', '2023-05-01', 'Male', 'cash', 18, '2023-04-28', 'Pending'),
(36, 'yu', 'ui', 'kp4', '2023-04-01', 'Male', 'cash', 18, '2023-04-28', 'Pending'),
(37, 'yu', 'ui', 'kp4', '2023-04-01', 'Male', 'cash', 18, '2023-04-28', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(7) NOT NULL,
  `image` varchar(100) NOT NULL,
  `categoryname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `price`, `image`, `categoryname`) VALUES
(18, 'Apple', 210, 'Apple.jpg', 'Fruits'),
(19, 'Orange', 140, 'Oranges.png', 'Fruits'),
(20, 'Grape', 90, 'Grape.png', 'Fruits'),
(21, 'Lychee', 390, 'Lychee.png', 'Fruits'),
(22, 'Mango', 230, 'Mango.jpg', 'Fruits'),
(23, 'Papaya', 240, 'Papaya.png', 'Fruits'),
(24, 'Pineapple', 180, 'Pineapple.png', 'Fruits'),
(25, 'Sitaphal', 260, 'Sitaphal.png', 'Fruits'),
(26, 'Apple Juice', 80, 'Apple Juice.png', 'Juice'),
(27, 'Lychee Juice', 100, 'Lychee Juice.jpg', 'Juice'),
(28, 'Mango Juice', 80, 'Mango Juice.png', 'Juice'),
(31, 'Orange Juice', 140, 'Orange Juice.png', 'Juice'),
(32, 'Papaya Juice', 170, 'Papaya Juice.jpg', 'Juice'),
(33, 'Apples', 200, 'Apples.jpg', 'Low Cholestrol'),
(34, 'Beans', 170, 'Beans.jpg', 'Low Cholestrol'),
(35, 'Oatmeal', 140, 'Oatmeal.jpg', 'Low Cholestrol'),
(36, 'Oranges', 200, 'Orangess.png', 'Low Cholestrol'),
(37, 'soyabean', 150, 'soyabean.jpg', 'Low Cholestrol'),
(38, 'Sweet Potato', 250, 'Sweet Potato.jpg', 'Low Cholestrol'),
(39, 'Walnuts', 150, 'Walnuts.jpg', 'Low Cholestrol'),
(40, 'Butter Chiken', 300, 'Butter Chiken.jpg', 'Non Veg'),
(41, 'Chapati', 30, 'Chapati.jpg', 'Non Veg'),
(42, 'Chiken Biryani', 150, 'Chiken Biryani.jpg', 'Non Veg'),
(43, 'Chiken Leg Piece', 140, 'Chiken Leg Piece.jpg', 'Non Veg'),
(44, 'Fish Fry', 150, 'Fish Fry.jpg', 'Non Veg'),
(45, 'Mutton Biryani', 180, 'Mutton Biryani.jpg', 'Non Veg'),
(46, 'Mutton Curry', 140, 'Mutton Curry.jpg', 'Non Veg'),
(47, 'Mutton Kasa', 180, 'Mutton Kasa.jpg', 'Non Veg'),
(48, 'Chicken Rice', 120, 'Rice.jpg', 'Non Veg'),
(49, 'Roasted Chicken', 160, 'Roasted Chiken.jpg', 'Non Veg'),
(50, 'Tanduri Chiken', 180, 'Tanduri Chiken.jpg', 'Non Veg'),
(51, 'Besan Laddu', 180, 'Besan Laddu.png', 'Sweets'),
(52, 'Boondi', 100, 'Boondi.jpg', 'Sweets'),
(53, 'Chana Barfi', 280, 'Chana Barfi.png', 'Sweets'),
(54, 'Gud Rasgulla', 180, 'Gud Rasgulla.png', 'Sweets'),
(55, 'Gulab Jamun', 250, 'Gulab Jamun.png', 'Sweets'),
(56, 'Kaju Katli', 170, 'Kaju Katli.png', 'Sweets'),
(57, 'Modak', 130, 'Modak.jpg', 'Sweets'),
(58, 'Rabdi', 190, 'Rabdi.jpg', 'Sweets'),
(59, 'Rasgulla', 200, 'Rasgulla.png', 'Sweets'),
(60, 'Sandesh', 180, 'Sandesh.png', 'Sweets'),
(62, 'Sohan Papdi', 140, 'Sohan Papdi.png', 'Sweets'),
(63, 'Anjeer Barfi', 120, 'Anjeer Barfi.jpg', 'Sweets Sugar Free'),
(64, 'Besan Ladoo', 230, 'Besan Ladoo.jpg', 'Sweets Sugar Free'),
(65, 'Carrot Ladoo', 240, 'Carrot Ladoo.jpg', 'Sweets Sugar Free'),
(66, 'Diet Pumpkin Halwa', 250, 'Diet Pumpkin Halwa.jpg', 'Sweets Sugar Free'),
(67, 'Faldhari Badam Barfi', 200, 'Faldhari Badam Barfi.jpg', 'Sweets Sugar Free'),
(68, 'Flax Seed Ladoo', 180, 'Flax Seed Ladoo.jpg', 'Sweets Sugar Free'),
(69, 'Fruit Payasam', 130, 'Fruit Payasam.jpg', 'Sweets Sugar Free'),
(70, 'Grilled Almond Barfi', 270, 'Grilled Almond Barfi.jpg', 'Sweets Sugar Free'),
(71, 'Mawa Malpua', 110, 'Mawa Malpua.jpg', 'Sweets Sugar Free'),
(72, 'Moong Dal Payasam', 160, 'Moong Dal Payasam.jpg', 'Sweets Sugar Free'),
(73, 'Oats Apple Phirni', 170, 'Oats Apple Phirni.jpg', 'Sweets Sugar Free'),
(74, 'Oats Kheer', 160, 'Oats Kheer.png', 'Sweets Sugar Free'),
(75, 'Paneer Kheer', 230, 'Paneer Kheer.jpg', 'Sweets Sugar Free'),
(76, 'Sugar Free Date & Apple Kheer', 260, 'Sugar Free Date & Apple Kheer.jpg', 'Sweets Sugar Free'),
(77, 'Sugar Free Kaju Katli', 190, 'Sugar Free Kaju Katli.jpg', 'Sweets Sugar Free'),
(78, 'Sugar Free Modak', 120, 'Sugar Free Modak.jpg', 'Sweets Sugar Free'),
(79, 'Sugar Free Peda', 140, 'Sugar Free Peda.jpg', 'Sweets Sugar Free'),
(80, 'Sugar Free Shrikhand', 210, 'Sugar Free Shrikhand.png', 'Sweets Sugar Free'),
(81, 'Sugar-Free Mango Curd Ice Cream', 200, 'Sugar-Free Mango Curd Ice Cream.jpg', 'Sweets Sugar Free'),
(82, 'Chapati', 45, 'Chapati.jpg', 'Veg'),
(83, 'Corn Mix Chat', 60, 'Corn Mix Chat.PNG', 'Veg'),
(84, 'Kadai Paneer', 150, 'Kadai Paneer.jpg', 'Veg'),
(85, 'Mix Badam With Vegetable', 130, 'Mix Badam With Vegetable.PNG', 'Veg'),
(86, 'Mix Panneer Pakoda With Vegetables', 90, 'Mix Panneer Pakoda With Vegetables.PNG', 'Veg'),
(87, 'Muri', 70, 'Muri.jpg', 'Veg'),
(88, 'Paneer Massala', 120, 'Paneer Massala.PNG', 'Veg'),
(89, 'Pani-Puri', 50, 'Pani-Puri.jpg', 'Veg'),
(91, 'Tommato Pizza', 160, 'Tommato Pizza.PNG', 'Veg'),
(92, 'Vada', 40, 'Vada.jpg', 'Veg'),
(93, 'Veg Roll', 80, 'Veg Roll.jpg', 'Veg'),
(94, 'Veg-Thali', 100, 'Veg-Thali.jpg', 'Veg'),
(96, '', 676, '2022-01-10 (1).png', 'Low Cholestrol');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usename` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `phone` int(13) NOT NULL,
  `profilepicture` int(11) NOT NULL,
  `address` text NOT NULL,
  `accounttype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usename`, `email`, `password`, `fullname`, `gender`, `phone`, `profilepicture`, `address`, `accounttype`) VALUES
(17, '', '2047001@kiit.ac.in', '25d55ad283aa400af464c76d713c07ad', 'Abhishek', 'f', 2147483647, 0, 'KP-4', 'Admin'),
(23, '', 'abhishekkumara92@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Abhishek Kumar', 'Ma', 2147483647, 0, 'KP_4', 'Admin'),
(24, '', 'abc@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Abhi', 'f', 2147483647, 0, 'KP-4', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
