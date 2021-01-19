-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2021 a las 16:47:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `idCarrito` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `producto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `categoria` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `category`) VALUES
(1, 'Nikon z7 45.7MP', 'A005', 'img/product-images/nikon.jpg', 1500.00, 'Fotografia'),
(2, 'HDD Portable', 'HDDP1', 'img/product-images/hdd.jpg', 800.00, 'Componentes'),
(4, 'Portatil Intel Core 8GB RAM', 'PIC11', 'img/product-images/laptop.jpg', 800.00, 'Portatiles'),
(5, 'Acer XV272UP 26', 'A001', 'img/product-images/1.jpg', 360.00, 'Monitores'),
(6, 'Acer Nitro 5 Intel Core i7/16GB/512GB SSD/GTX 1650', 'A002', 'img/product-images/6.jpg', 899.99, 'Portatiles'),
(7, 'Xiaomi Redmi Note 8 Pro 6/64GB Libre', 'A003', 'img/product-images/3.jpg', 304.50, 'Smartphones'),
(8, 'HP 25mx 24.5\" LED FullHD 144Hz FreeSync', 'A004', 'img/product-images/4.jpg', 199.99, 'Monitores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` int(15) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nickname`, `password`, `fname`, `lname`, `email`, `age`, `phone`, `admin`) VALUES
(18, 'admin', '$2y$10$HQ3x3Et/IEXW3Gc7w6FbPOuFh15o0961s6wqnK4N9OMhUfNiu5UPC', 'Quim', 'Martínez', 'quiim2000@gmail.com', 20, 605273035, 1),
(19, 'Fonsi', '$2y$10$6TkmkO9jQp1BpGou/Ts4Su39tvm0SkF1lNzvMxRSy.KoshF.SrP6q', 'Alfonso', 'García', 'agarcia@ilerna.com', 28, 612541076, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD KEY `FK_idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `FK_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
