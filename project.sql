-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2018 at 02:41 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(5) NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_qnty` int(2) DEFAULT NULL,
  `prod_amt` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `Date`, `user_id`, `product_id`, `order_qnty`, `prod_amt`) VALUES
(1, '2018-11-28 03:12:10', 1, 12, 1, 1.29),
(2, '2018-11-28 03:16:44', 1, 1, 1, 6.99),
(3, '2018-11-28 03:30:45', 2, 12, 1, 1.29),
(4, '2018-11-28 03:30:45', 2, 15, 1, 0.99),
(5, '2018-11-28 14:37:29', 2, 15, 1, 0.99),
(6, '2018-11-28 14:37:29', 2, 16, 1, 0.49);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `product_img_name` varchar(100) NOT NULL DEFAULT 'no_image.jpg',
  `product_name` varchar(100) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `product_qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category`, `dept`, `product_img_name`, `product_name`, `price`, `product_qty`) VALUES
(1, 'chicken1   ', 'Meat & SeaFood   ', 'Chicken   ', 'chicken1   .png', 'Chicken Boneless   ', 6.99, 93),
(2, 'chicken2', 'Meat & SeaFood', 'Chicken', 'chicken2.png', 'Whole Chicken', 9.99, 99),
(3, 'chicken3', 'Meat & SeaFood', 'Chicken', 'chicken3.png', 'Chicken Drumsticks', 7.99, 99),
(4, 'red_meat1     ', 'Meat & SeaFood     ', 'Red Meat       ', 'red_meat1.png', 'Steak      ', 12.99, 99),
(5, 'red_meat2', 'Meat & SeaFood', 'Red Meat', 'red_meat2.png', 'Minced Meat', 13.99, 99),
(6, 'red_meat3', 'Meat & SeaFood', 'Red Meat', 'red_meat3.png', 'Beef Ribs', 10.99, 99),
(7, 'red_meat4', 'Meat & SeaFood', 'Red Meat', 'red_meat4.png', 'Ground Beef', 9.99, 99),
(8, 'red_meat5', 'Meat & SeaFood', 'Red Meat', 'red_meat5.png', 'Pork', 11.99, 99),
(9, 'fish1', 'Meat & SeaFood', 'Sea Food', 'fish1.png', 'Salmon', 6.99, 99),
(10, 'fish2', 'Meat & SeaFood', 'Sea Food', 'fish2.png', 'Tilapia', 7.99, 99),
(11, 'fish3', 'Meat & SeaFood', 'Sea Food', 'fish3.png', 'Shrimp', 11.99, 99),
(12, 'fruit1', 'Fruits & Vegetables', 'Fruits', 'fruit1.png', 'Banana', 1.29, 87),
(13, 'fruit2', 'Fruits & Vegetables', 'Fruits', 'fruit2.png', 'Raspberry', 5.99, 96),
(14, 'fruit3', 'Fruits & Vegetables', 'Fruits', 'fruit3.png', 'Strawberry', 4.99, 99),
(15, 'fruit4', 'Fruits & Vegetables', 'Fruits', 'fruit4.png', 'Apple', 0.99, 97),
(16, 'fruit5', 'Fruits & Vegetables', 'Fruits', 'fruit5.png', 'Kiwi', 0.49, 98),
(17, 'fruit6', 'Fruits & Vegetables', 'Fruits', 'fruit6.png', 'Pear', 0.79, 99),
(18, 'fruit7', 'Fruits & Vegetables', 'Fruits', 'fruit7.png', 'Grapes', 2.99, 99),
(19, 'fruit8', 'Fruits & Vegetables', 'Fruits', 'fruit8.png', 'Blackberry', 4.99, 99),
(20, 'fruit9', 'Fruits & Vegetables', 'Fruits', 'fruit9.png', 'Mango', 0.99, 99),
(21, 'fruit10', 'Fruits & Vegetables', 'Fruits', 'fruit10.png', 'Oranges', 7.99, 99),
(22, 'veg1', 'Fruits & Vegetables', 'Vegetables', 'veg1.png', 'Lemon', 0.25, 99),
(23, 'veg2', 'Fruits & Vegetables', 'Vegetables', 'veg2.png', 'Yellow Onion', 0.48, 99),
(24, 'veg3', 'Fruits & Vegetables', 'Vegetables', 'veg3.png', 'Avocado', 0.45, 98),
(25, 'veg4', 'Fruits & Vegetables', 'Vegetables', 'veg4.png', 'Carrots', 0.25, 99),
(26, 'veg5', 'Fruits & Vegetables', 'Vegetables', 'veg5.png', 'Cauliflower', 1.99, 99),
(27, 'veg6', 'Fruits & Vegetables', 'Vegetables', 'veg6.png', 'Green Bell Pepper', 0.49, 99),
(28, 'veg7', 'Fruits & Vegetables', 'Vegetables', 'veg7.png', 'Broccolli', 2.49, 99),
(29, 'veg8', 'Fruits & Vegetables', 'Vegetables', 'veg8.png', 'Scallion', 1.19, 99),
(30, 'veg9', 'Fruits & Vegetables', 'Vegetables', 'veg9.png', 'Cucumber', 0.55, 99),
(31, 'veg10', 'Fruits & Vegetables', 'Vegetables', 'veg10.png', 'Red Bell Pepper', 1.90, 99),
(32, 'veg11', 'Fruits & Vegetables', 'Vegetables', 'veg11.png', 'Cilantro', 0.59, 99),
(33, 'veg12', 'Fruits & Vegetables', 'Vegetables', 'veg12.png', 'Red Onion', 0.56, 99),
(34, 'veg13', 'Fruits & Vegetables', 'Vegetables', 'veg13.png', 'Tomato', 3.99, 99),
(35, 'veg14', 'Fruits & Vegetables', 'Vegetables', 'veg14.png', 'Spinach', 1.90, 99),
(36, 'veg15', 'Fruits & Vegetables', 'Vegetables', 'veg15.png', 'Yams', 2.99, 99),
(37, 'veg16', 'Fruits & Vegetables', 'Vegetables', 'veg16.png', 'Potato', 0.34, 99),
(38, 'veg17', 'Fruits & Vegetables', 'Vegetables', 'veg17.png', 'Ginger', 1.50, 99),
(39, 'veg18', 'Fruits & Vegetables', 'Vegetables', 'veg18.png', 'Mushrooms', 3.99, 99),
(40, 'bread1', 'Bakery & Dairy', 'Bread', 'bread1.png', 'Swirl Blueberry', 2.29, 91),
(41, 'bread2', 'Bakery & Dairy', 'Bread', 'bread2.png', 'White Bread', 1.99, 97),
(42, 'bread3', 'Bakery & Dairy', 'Bread', 'bread3.png', 'Wheat Bread', 0.88, 99),
(43, 'bread4', 'Bakery & Dairy', 'Bread', 'bread4.png', 'Whole Wheat Bread', 1.59, 99),
(44, 'egg1', 'Bakery & Dairy', 'Eggs', 'egg1.png', 'White Eggs', 0.15, 99),
(45, 'egg2', 'Bakery & Dairy', 'Eggs', 'egg2.png', 'Organic Brown Eggs', 0.25, 99),
(46, 'milk1', 'Bakery & Dairy', 'Milk', 'milk1.png', 'Great Value 2% Milk', 2.99, 99),
(47, 'milk2', 'Bakery & Dairy', 'Milk', 'milk2.png', 'Great Value Whole Milk', 4.99, 99),
(48, 'milk3', 'Bakery & Dairy', 'Milk', 'milk3.png', 'Great Value 1% Milk', 0.99, 99),
(49, 'milk4', 'Bakery & Dairy', 'Milk', 'milk4.png', 'Great Value 2% Milk 1/2 Gallon', 7.99, 99),
(50, 'milk5', 'Bakery & Dairy', 'Milk', 'milk5.png', 'Great Value 1% Milk 1/2 Gallon', 0.25, 99),
(51, 'milk6', 'Bakery & Dairy', 'Milk', 'milk6.png', 'Great Value 2% Organic Milk ', 3.25, 99),
(52, 'milk7', 'Bakery & Dairy', 'Milk', 'milk7.png', 'Great Value Organic Whole Milk', 5.68, 99),
(53, 'milk8', 'Bakery & Dairy', 'Milk', 'milk8.png', 'Great Value 0% Milk 1/2 Gallon', 0.98, 99),
(54, 'milk9', 'Bakery & Dairy', 'Milk', 'milk9.png', 'Great Value Chocolate Milk', 0.98, 99),
(55, 'milk10', 'Bakery & Dairy', 'Milk', 'milk10.png', 'Great Value Chocolate Milk 1/2 Gallon', 0.53, 99);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`) VALUES
(1, 'admin', 1234567897, 'admin@example.com', '$2y$10$vDlDh/bzpmFSBZKmj3f.L.oSvBqngDimUGgM2yTm5dIbw8uB0qNO6'),
(2, 'user', 1234543213, 'user@example.com', '$2y$10$MZ3El7D22IrdcF4qdc/Eeu/iSzsf6YiFnRr1IOG9b2MdtGrIniJDC'),
(3, 'ayushi', 1234567898, 'ayushi@example.com', '$2y$10$20fHQ3RxkTCEexivgf8yCeZoXsSQrePnEhTgAdIH235O2BFNSOL4K'),
(4, 'pallavi', 1234567895, 'pallavi@example.com', '$2y$10$IcTvDmRJsXtG/8HsYwz5duDsYBAvdOJGoGdoUcpk.QUtACYFHYa1a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
