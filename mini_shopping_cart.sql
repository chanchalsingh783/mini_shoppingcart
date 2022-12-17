-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 02:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails_tbl`
--

CREATE TABLE `orderdetails_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `net_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `total_product_amt` double(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `remark` varchar(100) NOT NULL,
  `insdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribtes`
--

CREATE TABLE `product_attribtes` (
  `id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attribtes`
--

INSERT INTO `product_attribtes` (`id`, `product_id`, `color`, `size`, `quantity`, `price`, `date`) VALUES
(1, 0, 'Red', '10', 10, 3000.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `quantity` int(4) NOT NULL,
  `description` varchar(200) NOT NULL,
  `insdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_name`, `image`, `price`, `color`, `size`, `quantity`, `description`, `insdate`) VALUES
(1, 'Shoes', 'https://m.media-amazon.com/images/I/61tFeSo6qoL._UY500_.jpg', 0, '', '', 0, 'This is Product Description', '2022-12-16'),
(2, 'test product', 'https://5.imimg.com/data5/BU/SA/JH/SELLER-19092161/womens-shoes-500x500.jpg', 2999, 'Red, Black, White,', '7,8,9', 10, 'This is Product Description', '2022-12-16'),
(3, 'test product', 'https://m.media-amazon.com/images/I/51qMYJEfdVL._UY500_.jpg', 2999, 'Red, Black, White,', '7,8,9', 10, 'This is Product Description', '2022-12-16'),
(4, 'Product NAme', 'https://5.imimg.com/data5/QS/CT/MY-1641408/sports-shoes-500x500.png', 15454, 'red,yello', '7,8,9', 9, 'hsgbsvbxvbnv', '2022-12-16'),
(5, 'Product NAme', 'BNBNMBNN,MB', 15454, 'red,yello', '7,8,9', 9, 'hsgbsvbxvbnv', '2022-12-16'),
(6, 'Product NAme', 'BNBNMBNN,MB', 15454, 'red,yello', '7,8,9', 9, 'hsgbsvbxvbnv', '2022-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `username`, `email`, `mobile`, `password`, `created_at`) VALUES
(1, 'admin', 'madhusmitasahoo756@gmail.com', '7845785897', '$2y$10$i2RdR9mKnSQ.ma5v7CVhvecfF0HnWP5OSKac6IqolF0GBrmvBef.S', '2022-12-16 12:07:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails_tbl`
--
ALTER TABLE `orderdetails_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_attribtes`
--
ALTER TABLE `product_attribtes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails_tbl`
--
ALTER TABLE `orderdetails_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_attribtes`
--
ALTER TABLE `product_attribtes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
