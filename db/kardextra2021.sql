-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2021 a las 22:08:17
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
(1, '001', 'FILTROS AIRE', 1),
(2, '002', 'FAJAS', 1),
(3, '003', 'ACEITES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CTE` int(11) NOT NULL,
  `NOMB_CTE` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `DIR_CTE` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `NIT` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `TELEFONO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `ID_DETALLE` int(11) NOT NULL,
  `ID_FACT` int(11) NOT NULL,
  `ID_CTE` int(11) NOT NULL,
  `COD_PROD` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `CTDAD` int(11) NOT NULL,
  `PRECIO` float NOT NULL,
  `PRCT_DESC` float NOT NULL,
  `PRECIO_DESC` float NOT NULL,
  `SUB-TOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACT` int(11) NOT NULL,
  `ID_CTE` int(11) NOT NULL,
  `ID_DETALLE` int(20) NOT NULL,
  `FECHA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TOTAL_VENTA` int(25) NOT NULL,
  `ESTATUS` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'EFE', 'EFECTIVO', 1),
(2, 'CHQ', 'CHEQUE', 1);

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
(1, 'FHL', 1),
(2, 'CASTROL', 1),
(3, 'STANLEY', 1),
(4, 'MOTUL', 1),
(5, 'MOPAR', 1),
(6, 'LUNA', 1),
(7, 'COLIMA', 1),
(8, 'QUAKER', 1),
(9, 'TEXACO', 1),
(10, 'SHELL', 1),
(11, 'SHELL CON TECRON', 1);

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
(4, 'PLG', 1),
(5, 'CM', 1),
(6, 'DOC', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDPRODUCTO` bigint(20) NOT NULL,
  `CODIGO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `COD_PROD` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
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
  `EXACTUAL` int(11) NOT NULL,
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

INSERT INTO `productos` (`IDPRODUCTO`, `CODIGO`, `COD_PROD`, `NOMBRE`, `CATEGORIA`, `SECCION`, `MARCA`, `MEDIDA`, `SERIE`, `NUMEROORIGINAL`, `EMINIMA`, `CANTAPEDIR`, `COSTOUNITARIO`, `PCTUTILIDAD`, `VENTAUNITARIO`, `PCTUTILIDAD2`, `VENTAUNITARIO2`, `PCTUTILIDAD3`, `VENTAUNITARIO3`, `PCTUTILIDAD4`, `VENTAUNITARIO4`, `EINICIAL`, `ENTRADAS`, `SALIDAS`, `EXACTUAL`, `COSTOANTERIOR`, `PCTDESCUENTO`, `PROVEEDOR`, `APLICACIONES`, `SACARSINEXITENCIA`, `ESTATUS`) VALUES
(1, '001', '003001', 'ACEITE 20W50', '003', 'NIVEL ', 'FHL', 'UN', '052220154654', '12021', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 10, 25, 15, 20, 70, 7, 'ACEITES DE GUAT', 'ACEITE DE MOTOR 4 TIEMPOS', 'SI', 1),
(2, '002', '003002', 'ACEITE 10W50', '003', 'NIVEL 2', 'CASTROL', 'UN', '052220154654', '12021', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 15, 70, 7, 'ACEITES DE GUAT', 'ACEITE DE MOTOR 4 TIEMPOS', 'SI', 1),
(3, '001', '001001', 'ACEITE 20W50', '001', 'NIVEL ', 'FHL', 'UN', '052220154654', '12021', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 0, 70, 7, 'ACEITES DE GUAT', 'ACEITE DE MOTOR 4 TIEMPOS', 'SI', 0),
(4, '001', '002001', 'ACEITE 20W50', '002', 'NIVEL ', 'FHL', 'UN', '052220154654', '12021', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 0, 70, 7, 'ACEITES DE GUAT', 'ACEITE DE MOTOR 4 TIEMPOS', 'SI', 0),
(5, '002', '002002', 'FAJA ALTERNAOR', '002', 'BASE OPERACIONES', 'MOPAR', 'UN', '05222015465423', '1202123', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 12, 70, 7, 'FAJAS DE GUATE,', 'FAJA DE ALTERNADOR DE 12*125*25', 'SI', 1),
(6, '002', '001002', 'FILTRO 12AR', '001', 'PISOS Y AZULEJOS', 'MOPAR', 'UN', '0522201546344', '2', 3, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 8, 70, 7, 'FILTROS Y FAJAS', 'FILTRO DE GASOLINA DE 12\"', 'SI', 1),
(7, '003', '002003', 'FAJA 152X145X58', '002', 'BASES', 'MOPAR', 'UN', '05222015465423', ' 3122344', 5, 25, 75, 3, 70, 4, 75, 5, 78, 8, 81, 0, 0, 0, 4, 70, 7, 'FAJAS DE GUATE,', 'FAJA DE DISTRIBUIDOR FORD 1990', 'SI', 1);

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
(1, 'NV0', 'NIVEL ', 1),
(2, 'NV2', 'NIVEL 2', 1),
(3, 'B02', 'BASES', 1),
(4, 'B03', 'BASE OPERACIONES', 1),
(5, 'C05', 'PISOS Y AZULEJOS', 1),
(6, 'M05', 'MDF NIVEL 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdemovto`
--

CREATE TABLE `tiposdemovto` (
  `IDTIPOMOVTO` bigint(20) NOT NULL,
  `TIPOMOVTO` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDCATEGORIA`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CTE`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`ID_DETALLE`),
  ADD KEY `DETALLE-FACTURA` (`ID_FACT`),
  ADD KEY `DETALLE-CTE` (`ID_CTE`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACT`);

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
  MODIFY `IDCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CTE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `ID_DETALLE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_FACT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formasdepago`
--
ALTER TABLE `formasdepago`
  MODIFY `IDFORMADEPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `IDMARCA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `IDMEDIDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDPRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `IDSECCIONES` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tiposdemovto`
--
ALTER TABLE `tiposdemovto`
  MODIFY `IDTIPOMOVTO` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `DETALLE-CTE` FOREIGN KEY (`ID_CTE`) REFERENCES `cliente` (`ID_CTE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DETALLE-FACTURA` FOREIGN KEY (`ID_FACT`) REFERENCES `factura` (`ID_FACT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
