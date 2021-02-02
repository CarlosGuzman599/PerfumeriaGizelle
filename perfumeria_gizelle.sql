-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 06:41 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfumeria_gizelle`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` tinyint(3) NOT NULL,
  `nombre_categoria` varchar(25) NOT NULL,
  `icono_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `icono_categoria`) VALUES
(1, 'reloj', 'img/categoria/watch.png'),
(2, 'crema', 'img/categoria/body_lotion.png'),
(3, 'perfume', 'img/categoria/fragance.png'),
(4, 'set', 'img/categoria/set.png'),
(5, 'fragancia', 'img/categoria/fragance_2.png'),
(6, 'mix', 'img/categoria/mix.png');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(4) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `precio_producto` decimal(10,0) NOT NULL,
  `categoria_producto` tinyint(3) NOT NULL,
  `descri_producto` text NOT NULL,
  `img_producto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `precio_producto`, `categoria_producto`, `descri_producto`, `img_producto`) VALUES
(1, 'Reloj dama morado', '150', 1, 'reloj para dama color morado', 'img/productos/1.jpg'),
(2, 'set victoria s', '450', 4, 'crema y fragancia victoria secret', 'img/productos/2.jpg'),
(3, 'crema orchi  236ml', '180', 2, 'crema perrona que huele chido', 'img/productos/3.jpg'),
(4, 'daviddoff cool water100ml', '1500', 3, 'daviddoff cool water100ml', 'img/productos/4.jpg'),
(5, 'Estuche rosa 3pzs', '1500', 4, 'Estuche rosa 3pzs', 'img/productos/5.jpg'),
(6, 'vv love hello 250ml', '150', 5, 'fragancia vv love hello 250ml', 'img/productos/6.jpg'),
(7, 'esto es una prueva de nombre a', '150', 6, 'gfdgfdgfd', 'img/productos/1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_producto` (`categoria_producto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_producto`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
