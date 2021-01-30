-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2021 at 08:32 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15931832_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cimg` text NOT NULL,
  `cname` varchar(200) NOT NULL,
  `cdesc` text NOT NULL,
  `cprice` decimal(10,2) NOT NULL,
  `cqty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cimg`, `cname`, `cdesc`, `cprice`, `cqty`, `total_price`) VALUES
(15, 'innerscarf2.jpg', 'Diana Inner 2019', 'Coral Blue', 9.50, 1, 9.50),
(16, 'purdah3.jpg', 'Kartina Purdah 2018', 'Cream', 10.50, 1, 10.50),
(17, 'naylaa6.jpg', 'Naylaa Hijab 2020', 'Red', 18.90, 1, 18.90),
(18, 'naylaa10.jpg', 'Sofea Hijab 2021', 'Forest Green', 18.90, 1, 18.90),
(19, 'naylaa1.jpg', 'Naylaa Hijab 2021', 'Salmon Pink', 19.80, 1, 19.80);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Hijab'),
(2, 'Inner'),
(3, 'Purdah');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` date NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `quantity`, `img`, `date_added`, `category`) VALUES
(1, 'Naylaa Hijab 2020', 'Red', 18.90, 21, 'naylaa6.jpg', '2021-01-05', 1),
(2, 'Sofea Hijab 2021', 'Forest Green', 18.90, 9, 'naylaa10.jpg', '2021-01-07', 1),
(3, 'Kartina Purdah 2018', 'Cream', 10.50, 14, 'purdah3.jpg', '2021-01-10', 3),
(4, 'Diana Inner 2019', 'Coral Blue', 9.50, 7, 'innerscarf2.jpg', '2021-01-19', 2),
(5, 'Raysha Inner 2021', 'Light grey', 9.50, 11, 'innerscarf1.jpg', '2021-01-22', 2),
(6, 'Naylaa Hijab 2021', 'Salmon Pink', 19.80, 17, 'naylaa1.jpg', '2021-01-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(5) NOT NULL,
  `state` enum('Johor','Kedah','Kelantan','Melaka','Negeri Sembilan','Pulau Pinang','Pahang','Perak','Perlis','Sabah','Sarawak','Selangor','Terengganu','Wilayah Persekutuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `address1`, `address2`, `city`, `zip`, `state`, `email`, `user_name`, `password`) VALUES
(1, 'Amalin Husna', 'Mohd Azhar', 'No 42, Jalan Pandan Indah 1/14,', 'Pandan Indah', 'Kuala Lumpur', 55100, 'Wilayah Persekutuan', 'amalinhusna1@gmail.com', 'amalinazhar', 'kmk3393'),
(4, 'Nur Rabiatul Anis', 'Roslan', 'Kolej Cempaka', 'Universiti Malaysia Sarawak', 'Kota Samarahan', 93050, 'Sarawak', 'aniesroslan0@gmail.com', 'AnisRoslan', 'anisroslan98'),
(5, 'Siti Nurfarhanah binti', 'Muhammad Rashid', '65 Jalan Meranti 2', 'Bandar Utama Batang Kali', 'Batang Kali', 44300, 'Selangor', 'farhanahrashid98@gmail.com', 'fagh9998', '233231'),
(8, 'Sofea. Co', 'Admin', 'Universiti Malaysia Sarawak,', 'Jalan Datuk Mohammad Musa,', 'Kota Samarahan', 94300, 'Sarawak', 'adminsofea@gmail.com', 'admin', 'adminpassword');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
