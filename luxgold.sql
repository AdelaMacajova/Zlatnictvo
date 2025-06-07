-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 12.Máj 2025, 21:08
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
-- Databáza: `luxgold`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `data`
--

CREATE TABLE `data` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `data`
--

INSERT INTO `data` (`ID`, `name`, `email`, `subject`, `message`) VALUES
(25, 'Anetka', 'ani@gmail.com', 'zly prsten', 'pls refund');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `category`, `price`) VALUES
(2, 'Ruby Ring', 'assets/images/gemstoned_rings/ruby.png', 'ring gemstone', 180),
(4, 'Sapphire Ring', 'assets/images/gemstoned_rings/sapphire.png', 'ring gemstone', 190),
(5, 'Peridot Ring', 'assets/images/gemstoned_rings/peridot.png', 'ring gemstone', 200),
(6, 'Amethyst Ring', 'assets/images/gemstoned_rings/amethyst.png', 'ring gemstone', 190),
(7, 'Emerald Ring', 'assets/images/gemstoned_rings/emerald.png', 'ring gemstone', 220),
(8, 'Jade Ring', 'assets/images/gemstoned_rings/jade.png', 'ring gemstone', 210),
(9, 'Onyx Ring', 'assets/images/gemstoned_rings/onyx.png', 'ring gemstone', 250);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Adela', 'am@gmail.com', '$2y$10$a7eKRHoCb.Ax.4q4PYCVoeyqx5xg1KGAS89zaJkkBNUik1/K7QrZa', 0, '2025-05-10 15:17:00'),
(2, 'Matej', 'mat@gmail.com', '$2y$10$bQwufJC8kmaVXMN87h4XuOhEQ.lwpqkUvZp09o1Vq05lyNQcoOWT2', 0, '2025-05-10 15:18:13'),
(3, 'Jožko', 'joz@gmail.com', '$2y$10$WbtrBxvI0bMAAbxjSU0FJ.0Uw1ae8OZ8RJ3MHAj.jk1X54X/kqfjq', 1, '2025-05-10 15:19:43'),
(4, 'janci', 'janci@gmail.com', '$2y$10$L/qkls6TjX.RLg1wsysF0O3xXtXV32.2aBsOvl5HwKf8Hgx6msxb2', 0, '2025-05-10 17:14:36'),
(5, 'mateeeje', 'eemat@gmail.com', '$2y$10$6pB5QcUXTjPgxrGVGgDs/.Pu.NHnFxmNplGM6zR.M4EviLrwtI35m', 0, '2025-05-10 18:03:20');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexy pre tabuľku `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pre tabuľku `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
