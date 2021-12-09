-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2021 a las 01:29:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kardextra2021`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIAS`
--

CREATE TABLE `CATEGORIAS` (
  `IDCATEGORIA` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `CATEGORIA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`IDCATEGORIA`, `CODIGO`, `CATEGORIA`, `ESTATUS`) VALUES
(1, '001', 'FERRETERIA', 1),
(2, '002', 'FONTANERIA', 1),
(3, '003', 'ELECTRICIDAD', 0),
(4, '004', 'TUBERIA', 1),
(5, '005', 'PISOS', 1),
(6, 'P3F', 'FONTANERIA EXTERNA', 1),
(7, 'F3R', 'FERRETERIA METAL', 1),
(8, 'FR2', 'FONTANERIA INTERNA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FORMASDEPAGO`
--

CREATE TABLE `FORMASDEPAGO` (
  `IDFORMADEPAGO` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `FORMADEPAGO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `FORMASDEPAGO`
--

INSERT INTO `FORMASDEPAGO` (`IDFORMADEPAGO`, `CODIGO`, `FORMADEPAGO`, `ESTATUS`) VALUES
(1, 'FP1', 'EFECTIVO', 1),
(2, 'FP2', 'TARJETA DE CREDITO', 1),
(3, 'FR3', '', 1),
(4, 'FR4', '', 1),
(5, 'FR5', 'CREDITO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MARCAS`
--

CREATE TABLE `MARCAS` (
  `IDMARCA` bigint(20) NOT NULL,
  `MARCA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MEDIDAS`
--

CREATE TABLE `MEDIDAS` (
  `IDMEDIDA` bigint(20) NOT NULL,
  `MEDIDA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SECCIONES`
--

CREATE TABLE `SECCIONES` (
  `IDSECCIONES` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `SECCION` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `SECCIONES`
--

INSERT INTO `SECCIONES` (`IDSECCIONES`, `CODIGO`, `SECCION`, `ESTATUS`) VALUES
(1, 'P2B', 'PLANTA BAJA', 1),
(2, 'P3B', 'PLANTA BAJA 3 B', 1),
(3, '2NP', 'SEGUNDO NIVEL', 1),
(4, '2NB', '2 NIVEL ANTERIOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPOSDEMOVTO`
--

CREATE TABLE `TIPOSDEMOVTO` (
  `IDTIPOMOVTO` bigint(20) NOT NULL,
  `TIPOMOVTO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`IDCATEGORIA`);

--
-- Indices de la tabla `FORMASDEPAGO`
--
ALTER TABLE `FORMASDEPAGO`
  ADD PRIMARY KEY (`IDFORMADEPAGO`);

--
-- Indices de la tabla `MARCAS`
--
ALTER TABLE `MARCAS`
  ADD PRIMARY KEY (`IDMARCA`);

--
-- Indices de la tabla `MEDIDAS`
--
ALTER TABLE `MEDIDAS`
  ADD PRIMARY KEY (`IDMEDIDA`);

--
-- Indices de la tabla `SECCIONES`
--
ALTER TABLE `SECCIONES`
  ADD PRIMARY KEY (`IDSECCIONES`);

--
-- Indices de la tabla `TIPOSDEMOVTO`
--
ALTER TABLE `TIPOSDEMOVTO`
  ADD PRIMARY KEY (`IDTIPOMOVTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `IDCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `FORMASDEPAGO`
--
ALTER TABLE `FORMASDEPAGO`
  MODIFY `IDFORMADEPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `MARCAS`
--
ALTER TABLE `MARCAS`
  MODIFY `IDMARCA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MEDIDAS`
--
ALTER TABLE `MEDIDAS`
  MODIFY `IDMEDIDA` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `SECCIONES`
--
ALTER TABLE `SECCIONES`
  MODIFY `IDSECCIONES` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `TIPOSDEMOVTO`
--
ALTER TABLE `TIPOSDEMOVTO`
  MODIFY `IDTIPOMOVTO` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
