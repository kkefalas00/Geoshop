-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Μαρ 2022 στις 15:31:29
-- Έκδοση διακομιστή: 10.4.22-MariaDB
-- Έκδοση PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `db_shop`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `ps` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customer`
--

CREATE TABLE `customer` (
  `cuid` int(11) NOT NULL,
  `cuemail` varchar(50) DEFAULT NULL,
  `caddress` varchar(30) DEFAULT NULL,
  `afm` int(11) DEFAULT NULL,
  `fncustomer` tinytext DEFAULT NULL,
  `cphone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `kalathi`
--

CREATE TABLE `kalathi` (
  `idk` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `prid` int(11) DEFAULT NULL,
  `price` float(10,5) DEFAULT NULL,
  `q` float(10,5) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `ordid` int(11) NOT NULL,
  `orddate` date DEFAULT NULL,
  `ordsum` float(20,5) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `conf` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders_product`
--

CREATE TABLE `orders_product` (
  `prid` int(11) DEFAULT NULL,
  `ordid` int(11) DEFAULT NULL,
  `quan` float(10,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `product`
--

CREATE TABLE `product` (
  `prid` int(11) NOT NULL,
  `prtitle` varchar(30) DEFAULT NULL,
  `prdescr` varchar(30) DEFAULT NULL,
  `primg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop`
--

CREATE TABLE `shop` (
  `sid` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `vsaddress` varchar(30) DEFAULT NULL,
  `fullname` tinytext DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) DEFAULT NULL,
  `adid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop_product`
--

CREATE TABLE `shop_product` (
  `sid` int(11) DEFAULT NULL,
  `prid` int(11) DEFAULT NULL,
  `price` float(10,5) DEFAULT NULL,
  `prdesc` varchar(150) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `user`
--

CREATE TABLE `user` (
  `adid` int(11) NOT NULL,
  `adfname` text DEFAULT NULL,
  `adlname` text DEFAULT NULL,
  `adpass` varchar(100) DEFAULT NULL,
  `ademail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cuid`),
  ADD UNIQUE KEY `cuemail` (`cuemail`),
  ADD UNIQUE KEY `afm` (`afm`);

--
-- Ευρετήρια για πίνακα `kalathi`
--
ALTER TABLE `kalathi`
  ADD PRIMARY KEY (`idk`),
  ADD KEY `prid` (`prid`),
  ADD KEY `sid` (`sid`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordid`),
  ADD KEY `orders_ibfk_1` (`cuid`),
  ADD KEY `orders_ibfk_2` (`sid`);

--
-- Ευρετήρια για πίνακα `orders_product`
--
ALTER TABLE `orders_product`
  ADD KEY `orders_product_ibfk_1` (`prid`),
  ADD KEY `orders_product_ibfk_2` (`ordid`);

--
-- Ευρετήρια για πίνακα `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prid`);

--
-- Ευρετήρια για πίνακα `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `shop_ibfk_1` (`adid`);

--
-- Ευρετήρια για πίνακα `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_product_ibfk_1` (`sid`),
  ADD KEY `shop_product_ibfk_2` (`prid`);

--
-- Ευρετήρια για πίνακα `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`adid`),
  ADD UNIQUE KEY `adid` (`adid`) USING BTREE,
  ADD UNIQUE KEY `adid_2` (`adid`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `customer`
--
ALTER TABLE `customer`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `kalathi`
--
ALTER TABLE `kalathi`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `ordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT για πίνακα `product`
--
ALTER TABLE `product`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT για πίνακα `shop`
--
ALTER TABLE `shop`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT για πίνακα `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT για πίνακα `user`
--
ALTER TABLE `user`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `kalathi`
--
ALTER TABLE `kalathi`
  ADD CONSTRAINT `kalathi_ibfk_1` FOREIGN KEY (`prid`) REFERENCES `product` (`prid`),
  ADD CONSTRAINT `kalathi_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shop` (`sid`);

--
-- Περιορισμοί για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cuid`) REFERENCES `customer` (`cuid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `shop` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `orders_product`
--
ALTER TABLE `orders_product`
  ADD CONSTRAINT `orders_product_ibfk_1` FOREIGN KEY (`prid`) REFERENCES `product` (`prid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_product_ibfk_2` FOREIGN KEY (`ordid`) REFERENCES `orders` (`ordid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `shop_ibfk_1` FOREIGN KEY (`adid`) REFERENCES `user` (`adid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `shop_product`
--
ALTER TABLE `shop_product`
  ADD CONSTRAINT `shop_product_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `shop` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop_product_ibfk_2` FOREIGN KEY (`prid`) REFERENCES `product` (`prid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
