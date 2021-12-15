-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2021 a las 23:33:38
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IDCATEGORIA` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `CATEGORIA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCATEGORIA`, `CODIGO`, `CATEGORIA`, `ESTATUS`) VALUES
(1, '001', 'FILTROS', 1),
(2, '002', 'FAJAS', 1),
(3, '101', 'FERRETERIA', 1),
(4, '111', 'CINCHOS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formasdepago`
--

CREATE TABLE `formasdepago` (
  `IDFORMADEPAGO` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `FORMADEPAGO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `formasdepago`
--

INSERT INTO `formasdepago` (`IDFORMADEPAGO`, `CODIGO`, `FORMADEPAGO`, `ESTATUS`) VALUES
(1, 'FP1', 'EFECTIVO', 1),
(2, 'FP2', 'TARJETA DE CREDITO', 1),
(3, 'FR3', 'CHEQUE', 1),
(4, 'FR4', '', 0),
(5, 'FR5', 'CREDITO', 1),
(6, 'FP5', 'DEBITO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `IDMARCA` bigint(20) NOT NULL,
  `MARCA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`IDMARCA`, `MARCA`, `ESTATUS`) VALUES
(1, 'PROTUL', 1),
(2, 'STANLEY', 1),
(3, 'COLIMA', 1),
(4, 'LUNA', 0),
(5, 'ROTOPLAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `IDMEDIDA` bigint(20) NOT NULL,
  `MEDIDA` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`IDMEDIDA`, `MEDIDA`, `ESTATUS`) VALUES
(1, 'UN', 1),
(2, 'LTR', 1),
(3, 'GLN', 1),
(4, 'TONEL', 1),
(5, 'CUBETA', 1),
(6, '12 OZ', 1),
(7, 'LB', 1),
(8, 'ONZ', 1),
(9, 'PIE', 1),
(10, 'MT', 1),
(11, 'Centimetro', 1),
(12, 'PLG', 1),
(13, 'pie3', 0),
(14, 'Paquete', 1),
(15, 'Kilo', 1),
(16, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDPRODUCTO` bigint(20) NOT NULL,
  `CODIGO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `CATEGORIA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `SECCION` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `MARCA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `MEDIDA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `SERIE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NUMEROORIGINAL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `EMINIMA` int(11) NOT NULL,
  `CANTAPEDIR` int(11) NOT NULL,
  `COSTOUNITARIO` int(11) NOT NULL,
  `PCTUTILIDAD` int(11) NOT NULL,
  `VENTAUNITARIO` int(11) NOT NULL,
  `PCTUTILIDAD2` int(11) NOT NULL,
  `VENTAUNITARIO2` int(11) NOT NULL,
  `PCTUTILIDAD3` int(11) NOT NULL,
  `VENTAUNITARIO3` int(11) NOT NULL,
  `PCTUTILIDAD4` int(11) NOT NULL,
  `VENTAUNITARIO4` int(11) NOT NULL,
  `EINICIAL` int(11) NOT NULL,
  `ENTRADAS` int(11) NOT NULL,
  `SALIDAS` int(11) NOT NULL,
  `COSTOANTERIOR` int(11) NOT NULL,
  `PCTDESCUENTO` int(11) NOT NULL,
  `PROVEEDOR` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `APLICACIONES` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `SACARSINEXITENCIA` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDPRODUCTO`, `CODIGO`, `NOMBRE`, `CATEGORIA`, `SECCION`, `MARCA`, `MEDIDA`, `SERIE`, `NUMEROORIGINAL`, `EMINIMA`, `CANTAPEDIR`, `COSTOUNITARIO`, `PCTUTILIDAD`, `VENTAUNITARIO`, `PCTUTILIDAD2`, `VENTAUNITARIO2`, `PCTUTILIDAD3`, `VENTAUNITARIO3`, `PCTUTILIDAD4`, `VENTAUNITARIO4`, `EINICIAL`, `ENTRADAS`, `SALIDAS`, `COSTOANTERIOR`, `PCTDESCUENTO`, `PROVEEDOR`, `APLICACIONES`, `SACARSINEXITENCIA`, `ESTATUS`) VALUES
(1, '00100001', 'Faja f0154', '001', 'F25', 'FHL', '123X125X35', '1201001410', '154', 4, 25, 75, 50, 125, 12, 125, 15, 130, 10, 110, 15, 25, 10, 65, 7, 'FHL FAJAS', 'FAJA DE ALTERNADOR', '1', 1),
(2, '00100002', 'FILTRO DE AIRE', '001', 'F25', 'PROTUL', 'UN', '1201001578', '155', 4, 25, 75, 50, 125, 12, 125, 15, 130, 10, 110, 15, 25, 10, 65, 7, 'FHL FAJAS', 'FILTRO PARA AUTOMOVIL ', '1', 1),
(3, '00200001', 'FAJA DE ALTERNADOR', '002', 'F15', 'FAJAS ', 'UN', '1201001789', '155', 4, 25, 75, 50, 125, 12, 125, 15, 130, 10, 110, 15, 25, 10, 65, 7, 'FHL FAJAS', 'FAJA DE ALTERNADOR ', '1', 1),
(4, '00100003', 'Filtro Aire', '001', 'F25', 'PROTUL', 'UN', '120100141158', '125', 4, 25, 75, 50, 125, 12, 125, 15, 130, 10, 110, 15, 25, 10, 65, 7, 'FHL FAJAS', 'Filtro de aire plastico 12\"', 'si', 1),
(5, '100004', 'Filtro AR345', '001', 'PLANTA BAJA Numero 3', 'LUNA', 'UN', '55224875574434', '145', 5, 45, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', 1),
(6, '1', 'Martillo de 12\"', '101', 'SEGUNDO NIVEL', 'PROTUL', 'UN', '552244585744', '12025', 5, 45, 75, 10, 75, 12, 77, 15, 79, 17, 80, 12, 28, 20, 22, 5, 'PROTUL S.A.', 'Martillo mango de madera', 'si', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `IDSECCIONES` bigint(20) NOT NULL,
  `CODIGO` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `SECCION` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`IDSECCIONES`, `CODIGO`, `SECCION`, `ESTATUS`) VALUES
(1, 'P2B', 'PLANTA BAJA', 1),
(2, 'P3B', 'PLANTA BAJA Numero 3', 1),
(3, '2NP', 'SEGUNDO NIVEL', 1),
(4, '2NB', '2 NIVEL ANTERIOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdemovto`
--

CREATE TABLE `tiposdemovto` (
  `IDTIPOMOVTO` bigint(20) NOT NULL,
  `TIPOMOVTO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tiposdemovto`
--

INSERT INTO `tiposdemovto` (`IDTIPOMOVTO`, `TIPOMOVTO`) VALUES
(1, 'VENTA'),
(2, 'COMPRA'),
(3, 'PEDIDO'),
(4, 'AJUSTES'),
(5, 'NOTA DE DEBITO'),
(6, 'NOTA DE CREDITO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDCATEGORIA`);

--
-- Indices de la tabla `formasdepago`
--
ALTER TABLE `formasdepago`
  ADD PRIMARY KEY (`IDFORMADEPAGO`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`IDMARCA`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`IDMEDIDA`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDPRODUCTO`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`IDSECCIONES`);

--
-- Indices de la tabla `tiposdemovto`
--
ALTER TABLE `tiposdemovto`
  ADD PRIMARY KEY (`IDTIPOMOVTO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IDCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formasdepago`
--
ALTER TABLE `formasdepago`
  MODIFY `IDFORMADEPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `IDMARCA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `IDMEDIDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDPRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `IDSECCIONES` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiposdemovto`
--
ALTER TABLE `tiposdemovto`
  MODIFY `IDTIPOMOVTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
