-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 11:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `megaparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(9, 18, 25, 1),
(10, 18, 27, 1),
(11, 18, 28, 1),
(12, 19, 29, 1),
(13, 19, 28, 1),
(14, 19, 30, 1),
(15, 19, 28, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `part_description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`user_id`, `product_id`, `part_name`, `img_url`, `part_description`, `category`, `price`, `created_at`) VALUES
(17, 25, 'Vintage mirror', 'https://c8.alamy.com/comp/RFE6DB/1958-plymouth-savoy-classic-american-saloon-car-from-the-fins-and-chrome-era-RFE6DB.jpg', 'Vintage mirror', 'Vintage', 200, '2023-09-12 08:23:27'),
(17, 27, 'Vintage mirror', 'https://c8.alamy.com/comp/CYHD48/citroen-11-traction-avant-car-was-a-very-popular-car-from-1934-to-CYHD48.jpg', 'Vintage mirror', 'Vintage', 300, '2023-09-12 08:25:12'),
(17, 28, 'Vintage mirror', 'https://c8.alamy.com/comp/MX2YW3/monochrome-picture-of-vintage-car-parts-MX2YW3.jpg', 'Vintage mirror', 'Vintage', 350, '2023-09-12 08:26:11'),
(18, 29, 'Classic auto parts', 'https://c8.alamy.com/comp/MX3007/vintage-car-featuring-muscle-engine-parts-MX3007.jpg', 'Classic auto parts', 'Auto parts', 150, '2023-09-12 08:30:23'),
(18, 30, 'Car engine', 'https://c8.alamy.com/comp/2GD890H/classic-car-engine-accompanied-by-a-huge-supercharger-2GD890H.jpg', 'Car engine', 'Engines', 1000, '2023-09-12 08:31:44'),
(18, 31, 'Rims', 'https://c8.alamy.com/comp/2D7XPCG/alloy-wheel-black-with-a-white-groove-6-beams-for-suvs-and-crossovers-close-up-on-a-black-background-2D7XPCG.jpg', 'Rims', 'Rims', 400, '2023-09-12 08:34:20'),
(19, 32, 'Rims', 'https://c8.alamy.com/comp/2JBKT84/black-beautiful-alloy-wheel-wheel-beautiful-design-auto-parts-car-2JBKT84.jpg', 'Rims', 'Rims', 220, '2023-09-12 08:39:53'),
(19, 33, 'Rims', 'https://c8.alamy.com/comp/2JBKT84/black-beautiful-alloy-wheel-wheel-beautiful-design-auto-parts-car-2JBKT84.jpg', 'Quality rims', 'Rims', 300, '2023-09-12 08:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(17, 'Mariya', 'mariya@gmail.com', '$2y$10$eM6b6P5bv9YYqzLCH3V50.3DYg86pR7N2HdRkTezPQPd6OzWFCgHK'),
(18, 'John', 'john@abv.bg', '$2y$10$zmygIHtvAmaBFpBdmnHwL.OLN0Ar7EzFZ6aziNVhbpW8Klimw87O.'),
(19, 'Peter', 'peter@gmail.com', '$2y$10$6Q8AH3B48.4ZQk9xCu4QZej2BUH99Q7mFffUdZf9W2h/qGtiHNaeW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
