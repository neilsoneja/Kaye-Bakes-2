-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 05:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaye_bakes`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `products` (
  `product_id` int(15) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `cake_type` varchar(20),
  `cake_flavor` varchar(20),
  `icing_flavor` varchar(20),
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 


-- --------------------------------------------------------

-- Table structure for table `orders`


CREATE TABLE `orders` (
  `order_id`int(15) NOT NULL,
  `customer_id` int(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment` varchar(15) NOT NULL,
  `order_type` varchar(15) NOT NULL,
  `datetime_delivery` datetime NOT NULL,
  `delivery_options` varchar(20) NOT NULL,
  `shipping_fee` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `dedications` varchar(300) NOT NULL,
  `requests_details` varchar(300) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` varchar(25) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

-- Table structure for table `cart`--

CREATE TABLE `cart` (
  `item_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `order_id` int(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id`int(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `mobile` bigint(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ------------------------------------------------------
--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item_id`);
  


-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);


-- --------------------------------------------------
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `products`
  MODIFY `product_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- ------------------------------------------------------------------------------------------
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

COMMIT;


-- ------------------------------------------------------------------------------------------
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `price`, `Customized`, `image_url`, `cake_type`, `cake_flavor`, `icing_flavor`, `deleted`) VALUES
(27, 'Red Velvet Cupcakes', 'A dozen of soft, velvety cake with smooth cream cheese frosting and crushed Oreo cookies on top.', 430, 0, 'Red-Velvet-Cupcakes.jpg', NULL, NULL, NULL, 0),
(28, 'Dutch Chocolate Cupcakes', 'A dozen of moist, chocolate sponge cake highlighted by lemon icing on top.', 310, 0, 'Double-Dutch-Cupcakes.jpg', NULL, NULL, NULL, 0),
(29, 'Classic New York Cheesecake (small)', 'New York-style cheesecake with tasty and complementing crust. (6 inches)', 490, 0, 'Cheesecake(Small).jpg', NULL, NULL, NULL, 0),
(30, 'Cookies and Cream Cheesecake (Small)', 'New York cheesecake with Oreo cookies on its base, cake, and top. (6 inches)', 500, 0, 'Cookies-and-Cream-Cheesecake(small).jpg', NULL, NULL, NULL, 0),
(31, 'Cookies and Cream Cheesecake (Big)', 'New York cheesecake with Oreo cookies on its base, cake, and top. (6 inches)', 1000, 0, 'Cookies-and-Cream-Cheesecake(big).jpg', NULL, NULL, NULL, 0),
(32, 'Strawberry Cheesecake', 'New York cheesecake with a strawberry puree on top. (9 inches)', 1210, 0, 'Strawberry-Cheesecake(Big).jpg', NULL, NULL, NULL, 0),
(33, 'Blueberry Cheesecake', 'New York cheesecake with a Blueberry puree on top. (9 inches)', 1210, 0, 'Blueberry-Cheesecake(Big).jpg', NULL, NULL, NULL, 0),
(34, 'Oreo Cake (Small)', '3 layers of Oreo Chiffon Cake covered with Oreo Buttercream icing, drizzled with melted chocolate and topped with Oreos. (6 inches)', 650, 0, 'Oreo-Cake(small).jpg', NULL, NULL, NULL, 0),
(35, 'Oreo Cake (Big)', '3 layers of Oreo Chiffon Cake covered with Oreo Buttercream icing, drizzled with melted chocolate and topped with Oreos.(9 inches)', 1150, 0, 'Oreo-Cake(big).jpg', NULL, NULL, NULL, 0),
(36, 'Carrot Cake (Small)', 'A chunky Flavorful cake made with fresh carrots and real walnuts frosted with cream cheese icing. (9 inches)', 650, 0, 'Carrot-Cake(Small).jpg', NULL, NULL, NULL, 0),
(37, 'Carrot Cake (big)', 'A chunky Flavorful cake made with fresh carrots and real walnuts frosted with cream cheese icing. (9 inches)', 1050, 0, 'Carrot-Cake(big).jpg', NULL, NULL, NULL, 0),
(38, 'Strawberry Shortcake', 'Layers of Vanilla Chiffon filled with strawberry flavored buttercream, beautifully topped with fresh strawberries and florals. (9 inches)', 1200, 0, 'Strawberry-Shortcake.jpg', NULL, NULL, NULL, 0),
(39, 'Sans Rival (Small)', 'Layers of tender cashew Gateau filled with French Buttercream and more toasted cashews (6 inches)', 650, 0, 'Sans-Rival(small).jpg', NULL, NULL, NULL, 0),
(40, 'Sans Rival (big)', 'Layers of tender cashew Gateau filled with French Buttercream and more toasted cashews (9 inches)', 1350, 0, 'Sans-Rival(big).jpg', NULL, NULL, NULL, 0),
(41, 'Classic Crinkles', '60 Pieces of bite-sized crinkles loaded with chocolatey goodness.', 200, 0, 'Classic-Crinkles.jpg', NULL, NULL, NULL, 0),
(42, 'Red Velvet Crinkles', '15 sandwiches of delightful velvety crinkles filled with cream cheese frosting.', 265, 0, 'Red-Velvet-crinkles.jpg', NULL, NULL, NULL, 0),
(43, 'Double Choco Cookies', '15 chunky and chewy premium chocolate cookies loaded with chunks of dark chocolate.', 265, 0, 'Double-Dutch-Cookies.jpg', NULL, NULL, NULL, 0),
(44, 'Smores Bars', '15 Smore bars made with thick, tasty crust, premium chocolate, toasted mallows and Hershey chocolate on top.', 265, 0, 'Smores.jpg', NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


