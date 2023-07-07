-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 12:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oscafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quty` int(11) DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comic_id` int(100) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `quty`, `image`, `user_id`, `comic_id`, `qty`) VALUES
(161, 'spider man', '100.00', NULL, 'spider man.jpg', 2, 14, 2),
(162, 'captain america', '100.00', NULL, 'captain america.jpg', 2, 17, 6),
(164, 'and man', '120.00', NULL, 'ant man.jpg', 2, 15, 1),
(176, 'Deathstroke', '80.00', NULL, 'deathstroke.jpg', 17, 22, 11);

-- --------------------------------------------------------

--
-- Table structure for table `comic`
--

CREATE TABLE `comic` (
  `comic_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `franchise` varchar(7) NOT NULL,
  `quty` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comic`
--

INSERT INTO `comic` (`comic_id`, `name`, `price`, `franchise`, `quty`, `image`) VALUES
(14, 'spider man', '100.00', 'marvel', 0, 'spider man.jpg'),
(15, 'and man', '120.00', 'marvel', 0, 'ant man.jpg'),
(17, 'captain america', '100.00', 'marvel', 0, 'captain america.jpg'),
(20, 'Bat Man', '140.00', 'dceu', 0, 'bat man.jpg'),
(21, 'Joker', '120.00', 'dceu', 0, 'joker.jpg'),
(22, 'Deathstroke', '80.00', 'dceu', 0, 'deathstroke.jpg'),
(23, 'Flash', '100.00', 'dceu', 0, 'flash.jpg'),
(24, 'Wander Woman', '90.00', 'dceu', 0, 'wander woman.jpg'),
(25, 'Super Man', '110.00', 'dceu', 0, 'ACTIONCOMICS_Cv1033.jpg'),
(26, 'Harley Queen', '70.00', 'dceu', 0, 'harley queen.jpg'),
(27, 'Poison IV', '90.00', 'dceu', 0, 'poison iv.jpg'),
(28, 'Iron Man', '150.00', 'marvel', 0, 'iron man2.jpg'),
(29, 'Thor', '130.00', 'marvel', 0, 'thor1.jpg'),
(30, 'Avengers', '120.00', 'marvel', 0, 'avengers.jpg'),
(31, 'Scarlet Witch', '100.00', 'marvel', 0, 'scarlet witch.jpg'),
(32, 'Black Widow', '80.00', 'marvel', 0, 'black widow.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `descripion` varchar(225) DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `franchise` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `heros`
--

INSERT INTO `heros` (`id`, `name`, `descripion`, `image`, `franchise`) VALUES
(10, 'Super Man', '', 'super man.jpg', 'marvel'),
(11, 'Spider Man', '', '8f6d7d3d-dc71-4419-8bfc-5b87d9b4ff67.jpg', 'marvel'),
(12, 'Iron Man', '', 'iron man.jpg', 'marvel'),
(13, 'Thor', '', 'thor.jpg', 'marvel'),
(14, 'Captain America', '', 'captain maerica.jpg', 'marvel'),
(15, 'Hulk', '', 'hulk.jpg', 'marvel'),
(16, 'Bat Man', '', 'batman.jpg', 'dceu'),
(17, 'Flash', '', 'flash.png', 'dceu'),
(18, 'Wonder Woman', '', 'wonder woman.jpg', 'marvel'),
(19, 'Poison IV', '', 'DC Femme Fatales_ Poison Ivy by annecain on DeviantArt.jpg', 'dceu'),
(20, 'Harley Queen', '', 'HD wallpaper_ Harley Quinn, DC Comics, fictional character, twintails, licking lips.png', 'dceu'),
(21, 'Scarlet Witch', '', 'Scarlet Witch (Elizabeth Olsen), Logan Cure.png', 'marvel'),
(23, 'Black Widow', '', 'Black Widow Art XM Studio Statue by Artgerm on DeviantArt.png', 'marvel');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` int(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `post_code` varchar(8) NOT NULL,
  `total_products` varchar(5000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `paymnet_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `name`, `mobile_no`, `email`, `payment_method`, `address`, `post_code`, `total_products`, `total_price`, `placed_on`, `paymnet_status`) VALUES
(11, 13, 'Dhananjaya', 2147483647, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, Kaluthara, Sri Lanka', '10400', ', black widow , (1), Bat Man , (1), and man , (1)', 350, '06-Feb-2023', 'completed'),
(12, 13, 'Harith', 702537467, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, Colombo, Sri Lanka', '10400', ', black widow , (1), spider man , (1), hulk , (1)', 300, '06-Feb-2023', 'completed'),
(13, 16, 'osca', 702537467, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, colombo, Sri Lanka', '10400', ', and man , (1), black widow , (1), captain america , (1), hulk , (1), spider man , (1), Bat Man , (1)', 660, '09-Feb-2023', 'pending'),
(14, 17, 'Dhananjaya', 702537467, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, Colombo, Sri Lanka', '10400', ', and man , (1)', 120, '11-Feb-2023', 'pending'),
(15, 16, 'Dhananjaya', 702537467, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, Colombo, Sri Lanka', '10400', ', Wander Woman , ( 10 ), spider man , ( 1 ), Bat Man , ( 17 )', 3380, '11-Feb-2023', 'pending'),
(16, 17, 'Dana', 702537467, 'dananjayafdo04@gmail.com', 'cod', 'Street no. 39 Thissa Mn,, Horethuduwa, Panadura, Panadura, Colombo, Sri Lanka', '10400', ', and man , ( 6 ), captain america , ( 2 ), Bat Man , ( 2 ), Joker , ( 1 )', 1320, '11-Feb-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `id_from_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`id`, `id_from_user`, `email`, `password`) VALUES
(1, 0, '<br /><b>Warning</b>:  Trying to access array offset on value of type null in <b>C:xampphtdocsOSCAFE', NULL),
(2, 0, '<br /><b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsOSCAFEforgetPassword.php</b> on li', NULL),
(3, 0, '<br />\r\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsOSCAFEforgetPassword.php</b> on ', NULL),
(4, 0, '<br />\r\n<b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsOSCAFEforgetPassword.php</b> on ', NULL),
(5, 0, '<br /><b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsOSCAFEforgetPassword.php</b> on li', NULL),
(6, 0, '<br /><b>Warning</b>:  Undefined variable $row in <b>C:xampphtdocsOSCAFEforgetPassword.php</b> on li', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `join_date` varchar(12) DEFAULT NULL,
  `token` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `PASSWORD`, `type`, `join_date`, `token`) VALUES
(10, '1@gmail.com', 'a', '1234', 'admin', NULL, NULL),
(16, 'dhananjayafdo04@gmail.com', 'Dhananjaya', '1234', 'user', '09-Feb-2023', NULL),
(17, 'dananjayafdo04@gmail.com', 'dananjaya', '11111', 'user', '11-Feb-2023', 559);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`comic_id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `resetpassword`
--
ALTER TABLE `resetpassword`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `comic`
--
ALTER TABLE `comic`
  MODIFY `comic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
