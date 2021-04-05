-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-03-2021 a las 09:53:12
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisrat`
--
CREATE DATABASE IF NOT EXISTS `sisrat` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `sisrat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actEcon`
--

CREATE TABLE `actEcon` (
  `id` int NOT NULL,
  `fk_grupo` int NOT NULL,
  `fk_subGrup` int NOT NULL,
  `codAct` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actEcon`
--

INSERT INTO `actEcon` (`id`, `fk_grupo`, `fk_subGrup`, `codAct`, `nombre`) VALUES
(3, 1, 1, 123123, 'asdasd'),
(4, 1, 1, 12312, 'asdasdasdsad'),
(5, 1, 2, 12312312, 'asdasdasd'),
(6, 1, 1, 4343, 'asdqweqw'),
(7, 1, 1, 565, 'asdasdasd'),
(8, 1, 1, 1231, 'asdasda'),
(9, 1, 1, 123, 'asdasd'),
(10, 1, 1, 12314, 'asdasd'),
(11, 1, 2, 121, 'asdasd'),
(12, 1, 2, 123, 'asdqwe'),
(13, 1, 1, 125, 'asdas'),
(14, 1, 2, 546, 'QWEQWE'),
(15, 1, 1, 5435, 'tyutyuty'),
(16, 1, 2, 123456, 'qweqw'),
(17, 1, 2, 1231, 'qweqweqwe'),
(18, 1, 2, 7897, 'ghfhfg'),
(19, 1, 1, 789, 'fghfghf'),
(20, 1, 2, 456, 'ASDASDAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_propietario` int DEFAULT NULL,
  `fk_sector` int DEFAULT NULL,
  `fk_datComer` int DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_recaudos` int DEFAULT NULL,
  `fk_grupo` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `nombre`, `fk_propietario`, `fk_sector`, `fk_datComer`, `tipo`, `fk_recaudos`, `fk_grupo`) VALUES
(1, 'asdasdasdsa', 7, 1231, 3, 'Único', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datcomer`
--

CREATE TABLE `datcomer` (
  `id` int NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rif` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cambDomi` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capSusc` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capPag` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telef` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipProp` text COLLATE utf8_spanish2_ci NOT NULL,
  `identFisc` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `datcomer`
--

INSERT INTO `datcomer` (`id`, `direccion`, `rif`, `cambDomi`, `capSusc`, `capPag`, `telef`, `tipProp`, `identFisc`) VALUES
(1, 'asdasdasd', 'V|342342', 'Si', '234234', '234234', '21312312', 'Único', '2234234'),
(2, 'asdasdasdasd', 'V|231231', 'Si', '1231231231', '123123', '12312312312', 'Único', '123123123'),
(3, 'asdasdasdasdasd', 'V|231231', 'Si', '1231231231', '12312312312', '12312312312', 'Único', '12312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int NOT NULL,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `codigo`, `nombre`) VALUES
(1, '254', 'BODEGAS'),
(2, '121', 'VERDURERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licactecon`
--

CREATE TABLE `licactecon` (
  `id` int NOT NULL,
  `fk_comercio` int DEFAULT NULL,
  `fechaEminc` date DEFAULT NULL,
  `fk_pago` int DEFAULT NULL,
  `fechaVenci` date DEFAULT NULL,
  `codContribuyente` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagocomer`
--

CREATE TABLE `pagocomer` (
  `id` int NOT NULL,
  `fk_comer` int DEFAULT NULL,
  `montopago` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `numerorecib` int DEFAULT NULL,
  `formapago` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `periodo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id` int NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estCivil` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciudadResid` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telef` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `nombre`, `apellido`, `cedula`, `estCivil`, `ciudadResid`, `direccion`, `telef`) VALUES
(1, '', '', '0|', '0', '', '', ''),
(2, 'asdasdasdasd', 'asdasdasdas', '0|12312312', 'Soltera(o)', 'asdasdasd', 'asdasdasdasdasd', '12312312'),
(3, 'asdasdasdas', 'asdasdasd', '0|12312312', 'Soltera(o)', 'asdasdasd', 'asdasdasdasdasd', '12312312'),
(4, 'asdasdasdas', 'asdasdasd', '0|12312312', 'Soltera(o)', 'asdasdasd', 'asdasdasdasdasd', '12312312312'),
(5, 'asdasdasdsa', 'asdasdasd', '0|12312312', 'Soltera(o)', 'asdasdasd', 'asdasdasdasdasd', '12312312312'),
(6, 'asdasdasdas', 'asdasdasd', '0|1231231', 'Casado(a)', 'asdasdasd', 'asdasdasdasdasd', '12312312312'),
(7, 'asdasdasdas', 'asdasdasd', '0|12312312', 'Soltera(o)', 'asdasdasd', 'asdasdasdasdasd', '12312312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recaudos`
--

CREATE TABLE `recaudos` (
  `id` int NOT NULL,
  `regComer` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `docProp` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `permisoBom` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CopRif` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cartSoli` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `copiaCed` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `permiSant` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carpMarr` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recaudos`
--

INSERT INTO `recaudos` (`id`, `regComer`, `docProp`, `permisoBom`, `CopRif`, `cartSoli`, `copiaCed`, `permiSant`, `carpMarr`) VALUES
(1, 'undefined', 'nada', 'nada', 'Si', 'nada', 'Si', 'Si', 'nada'),
(2, 'undefined', 'nada', 'nada', 'Si', 'nada', 'Si', 'Si', 'nada'),
(3, 'undefined', 'Si', 'nada', 'Si', 'nada', 'Si', 'nada', 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int NOT NULL,
  `codSect` int DEFAULT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `codSect`, `nombre`) VALUES
(1, 1231, 'asdasdasd'),
(2, 1, 'El Piñal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrupo`
--

CREATE TABLE `subgrupo` (
  `id` int NOT NULL,
  `codigo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_grupos` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subgrupo`
--

INSERT INTO `subgrupo` (`id`, `codigo`, `nombre`, `fk_grupos`) VALUES
(1, '123', 'asdasdasd', 1),
(2, '12312', 'asdasdasd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `depart` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nivel` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nick` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `depart`, `nivel`, `pass`, `nick`, `nombre`, `apellido`) VALUES
(1, 'Archivo', '1', '19970321', 'che234', 'Jose', 'Millan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actEcon`
--
ALTER TABLE `actEcon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_datComer` (`fk_datComer`),
  ADD KEY `FK_prop` (`fk_propietario`),
  ADD KEY `FK_recaudos` (`fk_recaudos`),
  ADD KEY `FK_sector_idx` (`fk_sector`),
  ADD KEY `FK_grupo_idx` (`fk_grupo`);

--
-- Indices de la tabla `datcomer`
--
ALTER TABLE `datcomer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licactecon`
--
ALTER TABLE `licactecon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comercio_idx` (`fk_comercio`),
  ADD KEY `FK_pago_idx` (`fk_pago`);

--
-- Indices de la tabla `pagocomer`
--
ALTER TABLE `pagocomer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comer_idx` (`fk_comer`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recaudos`
--
ALTER TABLE `recaudos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subgrupo`
--
ALTER TABLE `subgrupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_grupo` (`fk_grupos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actEcon`
--
ALTER TABLE `actEcon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datcomer`
--
ALTER TABLE `datcomer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `licactecon`
--
ALTER TABLE `licactecon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagocomer`
--
ALTER TABLE `pagocomer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recaudos`
--
ALTER TABLE `recaudos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subgrupo`
--
ALTER TABLE `subgrupo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comercio`
--
ALTER TABLE `comercio`
  ADD CONSTRAINT `FK_datComer` FOREIGN KEY (`fk_datComer`) REFERENCES `datcomer` (`id`),
  ADD CONSTRAINT `FK_prop` FOREIGN KEY (`fk_propietario`) REFERENCES `propietario` (`id`),
  ADD CONSTRAINT `FK_recaudos` FOREIGN KEY (`fk_recaudos`) REFERENCES `recaudos` (`id`);

--
-- Filtros para la tabla `licactecon`
--
ALTER TABLE `licactecon`
  ADD CONSTRAINT `FK_comercio` FOREIGN KEY (`fk_comercio`) REFERENCES `comercio` (`id`),
  ADD CONSTRAINT `FK_pago` FOREIGN KEY (`fk_pago`) REFERENCES `pagocomer` (`id`);

--
-- Filtros para la tabla `pagocomer`
--
ALTER TABLE `pagocomer`
  ADD CONSTRAINT `FK_comer` FOREIGN KEY (`fk_comer`) REFERENCES `comercio` (`id`);

--
-- Filtros para la tabla `subgrupo`
--
ALTER TABLE `subgrupo`
  ADD CONSTRAINT `FK_grupo` FOREIGN KEY (`fk_grupos`) REFERENCES `grupo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
