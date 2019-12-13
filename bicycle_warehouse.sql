-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2019 at 11:37 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bicycle_warehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(2, 'Great', 'Admin', 'great.admin@gmail.com', 'great.admin', '$2y$10$yGbMdFxWZfz58sHilVlN/ubv4QHNdHJuf0kHVco9wBOmdEdtgx.j6'),
(4, 'Best', 'Admin', 'best.admin@mail.io', 'best.admin', '$2y$10$8N3Gjt9/IUQSWu2rLPRrDOVU6K.06EjKvUltDRSewIRJXYi0/xbvO');

-- --------------------------------------------------------

--
-- Table structure for table `bicycles`
--

CREATE TABLE `bicycles` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `weight_kg` decimal(9,5) NOT NULL,
  `condition_id` tinyint(3) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bicycles`
--

INSERT INTO `bicycles` (`id`, `author`, `brand`, `model`, `year`, `category`, `gender`, `color`, `price`, `weight_kg`, `condition_id`, `description`) VALUES
(1, 'great.admin', 'Trek', 'Emonda', 2016, 'Hybrid', 'Unisex', 'black', '1495.00', '1.50000', 5, ''),
(2, 'great.admin', 'Cannondale', 'Synapse', 2016, 'Road', 'Unisex', 'matte black', '1999.99', '10.54000', 5, ''),
(3, 'great.admin', 'Schwinn', 'Cutter', 2016, 'City', 'Unisex', 'white', '450.00', '18.00000', 4, 'It is comfortable and beautiful bicycle.  '),
(4, 'great.admin', 'Mongoose', 'Switchback Sport', 2015, 'Mountain', 'Mens', 'blue', '399.00', '24.00000', 2, ''),
(5, 'great.admin', 'Diamondback', 'Overdrive', 2016, 'Mountain', 'Unisex', 'dark green', '565.00', '23.70000', 3, ''),
(19, 'great.admin', 'Mongooses', '21-Speed Suburban CS', 2002, 'Hybrid', 'Womens', 'blue', '50.00', '25.00000', 2, ''),
(20, 'temp.user', 'Radon', 'ZR Team Hybrid 6.0 500Wh', 2019, 'Hybrid', 'Unisex', 'deep black', '1900.00', '21.20000', 5, 'If you suddenly find you\'re moving too fast, just grip the brake lever, and let Shimano\'s hydraulic disk brake come to the rescue and alleviate your Speed King mania. For extensive tours, the Selle Italia X! saddle and the Ergon GA30 grips come in very handy. Bumpy forest tracks are no barrier to this bike. The 29-inch wheels, supported by a Suntour suspension fork, hepls you overcome any hurdles.'),
(22, 'temp.user', 'Chromos', 'XP - R10', 2016, 'Cruiser', 'Mens', 'silver dark', '1549.99', '25.00000', 3, 'Elite bike...');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar` varchar(550) DEFAULT 'images/default.jpg',
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `avatar`,`provider`,`provider_id`, `hashed_password`, `created_at`) VALUES
(1, 'Ersten', 'Nutzer', 'ersten@nu.mail', 'ersten-nutzer', 'images/default.jpg', NULL, NULL, 'Aa?1111111111', '2018-08-21 00:57:30'),
(2, 'Dritten', 'Nutezer', 'dritten@nutz.com', 'dritten-nuzter', 'images/default.jpg', NULL, NULL, '$2y$10$uiROAfJsZmMSa4JANLSm/uQiZ79Y18Om7XaITmT077aAk79ofYCXm', '2018-08-22 04:22:00'),
(3, 'Zweitenscs', 'asdaerge', 'ersten@nu.ma', 'aoaoaoaoa', 'images/default.jpg', NULL, NULL, '$2y$10$n5IbfKRpreX1Z8bDqRYLqe306YwtU4hyDXpVF2TpKpQXYd3jiGGee', '2018-08-24 05:25:42'),
(4, 'Pawel', 'Rotar', 'pawel.rotar@gmail.com', 'pawel.rotar', 'images/default.jpg', NULL, NULL, '$2y$10$uUDrDBNrBewe1QR2mWk/E.nGwGNgEeRkaH8.NDPDTT.5yjAffKuDS', '2019-05-17 20:56:08'),
(5, 'temp', 'user', 'temp.user@gmail.com', 'temp.user', 'images/default.jpg', NULL, NULL, '$2y$10$p.AC1mOS81lc1UQ.uJHa7eBLQTXNdVwnzN0MJeLk/F75I2IqOUY7S', '2019-05-17 21:03:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_username` (`username`);

--
-- Indexes for table `bicycles`
--
ALTER TABLE `bicycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bicycles`
--
ALTER TABLE `bicycles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
