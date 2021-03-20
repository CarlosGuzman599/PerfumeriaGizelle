-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 11:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'RELOJ', 'img/categoria/watch.png'),
(2, 'CREMA', 'img/categoria/body_lotion.png'),
(3, 'PERFUME', 'img/categoria/fragance.png'),
(4, 'ESTUCHE', 'img/categoria/set.png'),
(5, 'FRAGANCIA', 'img/categoria/fragance_2.png'),
(6, 'MIX', 'img/categoria/mix.png');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(4) NOT NULL,
  `nombre_cliente` varchar(30) NOT NULL,
  `apellido_cliente` varchar(30) NOT NULL,
  `tel_cliente` varchar(10) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `fecha_cliente` date NOT NULL,
  `password_cliente` varchar(60) NOT NULL,
  `notifica_cliente` varchar(10) NOT NULL,
  `dir_pais_cliente` varchar(30) NOT NULL,
  `dir_estado_cliente` varchar(40) NOT NULL,
  `dir_municipio_cliente` varchar(50) NOT NULL,
  `dir_cp_cliente` varchar(5) NOT NULL,
  `dir_calle_cliente` varchar(50) NOT NULL,
  `dir_numext_cliente` varchar(6) NOT NULL,
  `dir_numint_cliente` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `tel_cliente`, `email_cliente`, `fecha_cliente`, `password_cliente`, `notifica_cliente`, `dir_pais_cliente`, `dir_estado_cliente`, `dir_municipio_cliente`, `dir_cp_cliente`, `dir_calle_cliente`, `dir_numext_cliente`, `dir_numint_cliente`) VALUES
(26, 'Carlos', 'Guzmán', '3411785798', 'carlilloz.599@gmail.com', '1995-07-15', '$2y$12$gNFReL..qmoGJ/iA.mtydus8d222s0h3NGaV6OAI80JOggxb5tiOy', 'on', '', '', '', '', '', '', ''),
(27, 'Mayra Azucena', 'Encarnacion', '3411455101', 'susy@gmail.com', '2000-09-20', '$2y$12$teKRWXUjVQIcqzQYKRhJu.dNt0bOKU5iESX8J035cekjQM0GgyZU2', 'on', '', '', '', '', '', '', ''),
(28, 'Celia', 'Garcia', '3411027771', 'celiagarcia1234@gmail.com', '1990-03-13', '$2y$12$5xIu30g8g3V9R1kTzOquLeJGYXzPs7mz2L1oHDCS2k1/h7DLI9XdW', 'on', '', '', '', '', '', '', ''),
(29, 'Gizelle', 'Garcia', '3411111111', 'guizelle@gmail.com', '2002-03-13', '$2y$12$1k1ABrtqNrzNjc4czP9YceAyiuSvfl3xXbQEgrYwETMqZQPVMxOFq', 'on', '', '', '', '', '', '', '');

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
(4, 'daviddoff cool water 100ml', '1500', 3, 'daviddoff cool water100ml', 'img/productos/4.jpg'),
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
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

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
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
