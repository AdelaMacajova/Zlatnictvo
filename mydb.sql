-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 10.Jún 2025, 23:35
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `mydb`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`) VALUES
(2, 4),
(3, 3),
(4, 0);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `cart_items`
--

CREATE TABLE `cart_items` (
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `cart_items`
--

INSERT INTO `cart_items` (`product_id`, `cart_id`, `quantity`) VALUES
(2, 4, 3),
(3, 3, 1),
(3, 4, 2);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `contacts`
--

INSERT INTO `contacts` (`ID`, `name`, `email`, `subject`, `message`) VALUES
(2, 'Adela Macajova', 'adela@gmail.com', 'aaaaa', 'aaae');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `shipping_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `payment_method`, `shipping_method`, `created_at`) VALUES
(10, 3, 'cash', 'pickup', '2025-06-06 13:44:41');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `order_items`
--

INSERT INTO `order_items` (`order_id`, `product_id`, `quantity`) VALUES
(9, 2, 1),
(9, 3, 1),
(10, 2, 2),
(10, 3, 2);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `url` varchar(250) NOT NULL,
  `material` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`product_id`, `name`, `url`, `material`, `type`, `price`) VALUES
(4, 'Glossy Diamond Ring', 'assets/images/diamond_rings/dia1.png', 'diamond', 'ring', 590),
(5, 'Lustrous Diamond Ring', 'assets/images/diamond_rings/dia2.png', 'diamond', 'ring', 555),
(6, 'Shiny Diamond Ring', 'assets/images/diamond_rings/dia3.png', 'diamond', 'ring', 580),
(7, 'Celestial Diamond Ring', 'assets/images/diamond_rings/dia4.png', 'diamond', 'ring', 540),
(8, 'Fine Diamond Ring', 'assets/images/diamond_rings/dia5.png', 'diamond', 'ring', 556),
(9, 'Emerald Ring', 'assets/images/gemstoned_rings/emerald.png', 'gemstone', 'ring', 580),
(10, 'Ruby Ring', 'assets/images/gemstoned_rings/ruby.png', 'gemstone', 'ring', 510),
(11, 'Aquamarine Ring', 'assets/images/gemstoned_rings/aquamarine.png', 'gemstone', 'ring', 480),
(12, 'Sapphire Ring', 'assets/images/gemstoned_rings/sapphire.png', 'gemstone', 'ring', 580),
(13, 'Citrine Ring', 'assets/images/gemstoned_rings/citrine.png', 'gemstone', 'ring', 570),
(14, 'Vanilla Earrings', 'assets/images/earrings/earrings1.png', 'other', 'earrings', 430),
(15, 'Treasure of the Sea', 'assets/images/earrings/earrings2.webp', 'other', 'earrings', 210),
(16, 'Magical Earrings', 'assets/images/earrings/earrings3.png', 'other', 'earrings', 230),
(17, 'Blooming Emerald Earrings', 'assets/images/earrings/earrings4.png', 'gemstone', 'earrings', 500),
(18, 'Glossy Emerald Earrings', 'assets/images/earrings/earrings5.webp', 'gemstone', 'earrings', 580),
(19, 'Bracelet of Infinity', 'assets/images/bracelets/bracelet1.png', 'other', 'bracelet', 500),
(20, 'Shiny Gold Bracelet', 'assets/images/bracelets/bracelet2.png', 'other', 'bracelet', 210),
(21, 'Ireland Bracelet', 'assets/images/bracelets/bracelet3.webp', 'diamond', 'bracelet', 450),
(22, 'Lustrous Bracelet', 'assets/images/bracelets/bracelet4.png', 'other', 'bracelet', 460),
(23, 'Sparkling Bracelet', 'assets/images/bracelets/bracelet5.png', 'diamond', 'bracelet', 750),
(24, 'Giant Necklace', 'assets/images/necklaces/necklace1.png', 'other', 'necklace', 895),
(25, 'Elegant Diamond Necklace', 'assets/images/necklaces/necklace2.webp', 'diamond', 'necklace', 450),
(26, 'Blooming Emerald Necklace', 'assets/images/necklaces/necklace3.webp', 'gemstone', 'necklace', 780),
(27, 'Blooming Sapphire Necklace', 'assets/images/necklaces/necklace4.webp', 'gemstone', 'necklace', 795),
(28, 'Greek Necklace', 'assets/images/necklaces/necklace5.png', 'gemstone', 'necklace', 749);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `email`, `password`, `role`, `created_at`) VALUES
(7, 'Adela', 'Macajova', 'am@gmail.com', '$2y$10$jPbSsUO3eW4Sus94ZSzzkutpA6UTPHXXr2tI6lsntLoVXwLzAkfvy', 0, '2025-06-10 21:16:50');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexy pre tabuľku `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`product_id`,`cart_id`);

--
-- Indexy pre tabuľku `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pre tabuľku `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexy pre tabuľku `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
