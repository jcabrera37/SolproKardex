-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2022 a las 16:45:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

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
(4, '111', 'CINCHOS', 1),
(5, '003', 'BATERIAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` bigint(20) NOT NULL,
  `NIT` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `RAZONSOCIAL` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `DIASCREDITO` int(11) NOT NULL,
  `LIMITECREDITO` float NOT NULL,
  `TELEONOS` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `SERIE` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `NIT` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `FORMADEPAGO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TRANSACCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemovtos`
--

CREATE TABLE `detallemovtos` (
  `ID_MOVTOS` bigint(20) NOT NULL,
  `SERIE` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `COD_PROD` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `UNIDADES` float NOT NULL,
  `PRC_UNI` float NOT NULL,
  `PCT_DESC` float NOT NULL,
  `DESCUENTO` float NOT NULL,
  `COSTO_VENTA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_entradas` int(11) NOT NULL,
  `SERIE` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `USUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TRANSACCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fel`
--

CREATE TABLE `fel` (
  `id_fel` int(11) NOT NULL,
  `SERIE` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `FEL_FECHA` datetime NOT NULL,
  `FEL_SERIE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FEL_NUMERO` bigint(20) NOT NULL,
  `UUID` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `LINK` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MOTIVO` varchar(100) COLLATE utf8_spanish_ci NOT NULL
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
(1, 'FP1', 'EFECTIVO', 1),
(2, 'FP2', 'TARJETA DE CREDITO', 1),
(3, 'FR3', 'CHEQUE', 1),
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
(5, 'ROTOPLAS', 1),
(6, 'LTH', 1);

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
-- Estructura de tabla para la tabla `ncel`
--

CREATE TABLE `ncel` (
  `id_ncel` int(11) NOT NULL,
  `FEL_SERIE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FEL_NUMERO` bigint(20) NOT NULL,
  `NCEL_FECHA` datetime NOT NULL,
  `NCEL_SERIE` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `NCEL_NUMERO` bigint(20) NOT NULL,
  `UUID` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `LINK` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ESADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `MOTIVO` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

INSERT INTO `productos` (`IDPRODUCTO`, `CODIGO`, `COD_PROD`, `NOMBRE`, `CATEGORIA`, `SECCION`, `MARCA`, `MEDIDA`, `SERIE`, `NUMEROORIGINAL`, `EMINIMA`, `CANTAPEDIR`, `COSTOUNITARIO`, `PCTUTILIDAD`, `VENTAUNITARIO`, `PCTUTILIDAD2`, `VENTAUNITARIO2`, `PCTUTILIDAD3`, `VENTAUNITARIO3`, `PCTUTILIDAD4`, `VENTAUNITARIO4`, `EINICIAL`, `ENTRADAS`, `SALIDAS`, `COSTOANTERIOR`, `PCTDESCUENTO`, `PROVEEDOR`, `APLICACIONES`, `SACARSINEXITENCIA`, `ESTATUS`) VALUES
(1, '001', '001001', 'Filtro AR34558', '001', 'PLANTA BAJA', 'PROTUL', 'UN', '552248755896234', '1558', 5, 45, 25, 10, 75, 12, 77, 15, 79, 17, 80, 12, 28, 20, 22, 5, 'TAFiltros', 'Filtro de aceite', 'si', 1),
(2, '001', '003001', 'BATERIA 15X114', '003', 'PLANTA BAJA', 'PROTUL', 'UN', '55224875574434', '147', 5, 45, 25, 10, 75, 12, 77, 15, 79, 17, 80, 12, 28, 20, 22, 5, 'TAFiltros', 'Bateria de automovil', 'si', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `NIT` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `RAZONSOCIAL` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DIRECCION` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `LIMITECREDITO` int(11) NOT NULL,
  `TELEFONOS` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salidas` bigint(20) NOT NULL,
  `SERIE` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `USUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TRANSACCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` bigint(20) NOT NULL,
  `SERIE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `NUMERO` bigint(20) NOT NULL,
  `FECHA` datetime NOT NULL,
  `NIT` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `FORMADEPAGO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `COBRO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TRANSACCION` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDCATEGORIA`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`);

--
-- Indices de la tabla `detallemovtos`
--
ALTER TABLE `detallemovtos`
  ADD PRIMARY KEY (`ID_MOVTOS`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_entradas`);

--
-- Indices de la tabla `fel`
--
ALTER TABLE `fel`
  ADD PRIMARY KEY (`id_fel`);

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
-- Indices de la tabla `ncel`
--
ALTER TABLE `ncel`
  ADD PRIMARY KEY (`id_ncel`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDPRODUCTO`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salidas`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IDCATEGORIA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallemovtos`
--
ALTER TABLE `detallemovtos`
  MODIFY `ID_MOVTOS` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_entradas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fel`
--
ALTER TABLE `fel`
  MODIFY `id_fel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formasdepago`
--
ALTER TABLE `formasdepago`
  MODIFY `IDFORMADEPAGO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `IDMARCA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `IDMEDIDA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ncel`
--
ALTER TABLE `ncel`
  MODIFY `id_ncel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDPRODUCTO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salidas` bigint(20) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
