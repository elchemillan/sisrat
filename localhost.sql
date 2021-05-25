-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-05-2021 a las 14:43:29
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.6

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
CREATE DATABASE IF NOT EXISTS `sisrat` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `sisrat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actEcon`
--

CREATE TABLE `actEcon` (
  `id` int(11) NOT NULL,
  `fk_grupo` int(11) NOT NULL,
  `fk_subGrup` int(11) NOT NULL,
  `codAct` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actEcon`
--

INSERT INTO `actEcon` (`id`, `fk_grupo`, `fk_subGrup`, `codAct`, `nombre`) VALUES
(1, 1, 1, 12, 'Programa radial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_propietario` int(11) DEFAULT NULL,
  `fk_sector` int(11) DEFAULT NULL,
  `fk_datComer` int(11) DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_recaudos` int(11) DEFAULT NULL,
  `fk_actEcon` int(11) DEFAULT NULL,
  `noExpe` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fk_cotizaciones` int(11) NOT NULL DEFAULT 0,
  `fk_liquid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comercio`
--

INSERT INTO `comercio` (`id`, `nombre`, `fk_propietario`, `fk_sector`, `fk_datComer`, `tipo`, `fk_recaudos`, `fk_actEcon`, `noExpe`, `fk_cotizaciones`, `fk_liquid`) VALUES
(1, 'asdasdasdasdas', 3, 1, 3, 'Único', 3, 1, '2334110001', 12, 163),
(2, 'asdasdasdasdas', 4, 1, 4, 'Único', 4, 1, '2334110002', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `minTrib` int(11) NOT NULL,
  `aforo` int(11) NOT NULL,
  `petro` int(11) NOT NULL,
  `plantaElec` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `actEconMont` int(11) NOT NULL,
  `certBomMont` int(11) NOT NULL,
  `SolvMont` int(11) NOT NULL,
  `PublicPropMont` int(11) NOT NULL,
  `renovLicoMont` int(11) NOT NULL,
  `aseoMont` int(11) NOT NULL,
  `usoConMont` int(11) NOT NULL,
  `catastMont` int(11) NOT NULL,
  `tasaAdminMont` int(11) NOT NULL,
  `fechaCot` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `minTrib`, `aforo`, `petro`, `plantaElec`, `actEconMont`, `certBomMont`, `SolvMont`, `PublicPropMont`, `renovLicoMont`, `aseoMont`, `usoConMont`, `catastMont`, `tasaAdminMont`, `fechaCot`) VALUES
(1, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(2, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(3, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(4, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(5, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(6, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(7, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(8, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-02-17'),
(9, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 66335235, 55254523, 6655223, 5544879, '2021-03-24'),
(10, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-03-24'),
(11, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-03-24'),
(12, 1, 2, 52125411, 'si', 2114412, 54412254, 1225412, 11122549, 66335235, 451215, 55254523, 6655223, 5544879, '2021-03-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datcomer`
--

CREATE TABLE `datcomer` (
  `id` int(11) NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rif` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cambDomi` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capSusc` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capPag` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telef` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipProp` text COLLATE utf8_spanish2_ci NOT NULL,
  `identFisc` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `datcomer`
--

INSERT INTO `datcomer` (`id`, `direccion`, `rif`, `cambDomi`, `capSusc`, `capPag`, `telef`, `tipProp`, `identFisc`) VALUES
(1, 'askldjaslkdjlaksjdlaksjd', 'V|12312312', 'Si', '12312312', '12312312321', '04120465213', 'Agencia', '12312312'),
(2, 'asdasdasdasdasdasd', 'V|12312312', 'Si', '12312312', '12312312321', '04120465213', 'Agencia', '12312312'),
(3, 'asdasdasdasdasdasd', 'V|12312312', 'Si', '12312312', '12312312321', '04120465213', 'Agencia', '12312312'),
(4, 'asdasdasdasdasdasd', 'V|12312312', 'Si', '12312312', '12312312321', '04120465213', 'Agencia', '12312312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `codigo`, `nombre`) VALUES
(1, '34', 'Comunicacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licactecon`
--

CREATE TABLE `licactecon` (
  `id` int(11) NOT NULL,
  `fk_comercio` int(11) DEFAULT NULL,
  `fechaEminc` date DEFAULT NULL,
  `fk_pago` int(11) DEFAULT NULL,
  `fechaVenci` date DEFAULT NULL,
  `codContribuyente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones`
--

CREATE TABLE `liquidaciones` (
  `id` int(11) NOT NULL,
  `ingreBrutos` int(11) NOT NULL,
  `otroIngre` int(11) NOT NULL,
  `totalIngre` int(11) NOT NULL,
  `porcenOrden` int(11) NOT NULL,
  `minTrib` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `liquidaciones`
--

INSERT INTO `liquidaciones` (`id`, `ingreBrutos`, `otroIngre`, `totalIngre`, `porcenOrden`, `minTrib`) VALUES
(1, 25855420, 54412541, 22541125, 25, 0),
(2, 25855420, 54412541, 22541125, 25, 0),
(3, 25855420, 54412541, 22541125, 25, 0),
(4, 25855420, 54412541, 22541125, 25, 0),
(5, 25855420, 54412541, 22541125, 25, 0),
(6, 25855420, 54412541, 22541125, 25, 0),
(7, 25855420, 54412541, 22541125, 25, 0),
(8, 25855420, 54412541, 22541125, 25, 0),
(9, 25855420, 54412541, 22541125, 25, 0),
(10, 25855420, 54412541, 22541125, 25, 0),
(11, 25855420, 54412541, 22541125, 25, 0),
(12, 25855420, 54412541, 22541125, 25, 0),
(13, 25855420, 54412541, 22541125, 25, 0),
(14, 25855420, 54412541, 22541125, 25, 0),
(15, 25855420, 54412541, 22541125, 25, 0),
(16, 25855420, 54412541, 22541125, 25, 0),
(17, 25855420, 54412541, 22541125, 25, 0),
(18, 25855420, 54412541, 22541125, 25, 0),
(19, 25855420, 54412541, 22541125, 25, 0),
(20, 25855420, 54412541, 22541125, 25, 0),
(21, 25855420, 54412541, 22541125, 25, 0),
(22, 25855420, 54412541, 22541125, 25, 0),
(23, 25855420, 54412541, 22541125, 25, 0),
(24, 25855420, 54412541, 22541125, 25, 0),
(25, 25855420, 54412541, 22541125, 25, 0),
(26, 25855420, 54412541, 22541125, 25, 0),
(27, 25855420, 54412541, 22541125, 25, 0),
(28, 25855420, 54412541, 22541125, 25, 0),
(29, 25855420, 54412541, 22541125, 25, 0),
(30, 25855420, 54412541, 22541125, 25, 0),
(31, 25855420, 54412541, 22541125, 25, 0),
(32, 25855420, 54412541, 22541125, 25, 0),
(33, 25855420, 54412541, 22541125, 25, 0),
(34, 25855420, 54412541, 22541125, 25, 0),
(35, 25855420, 54412541, 22541125, 25, 0),
(36, 25855420, 54412541, 22541125, 25, 0),
(37, 25855420, 54412541, 22541125, 25, 0),
(38, 25855420, 54412541, 22541125, 25, 0),
(39, 25855420, 54412541, 22541125, 25, 0),
(40, 25855420, 54412541, 22541125, 25, 0),
(41, 25855420, 54412541, 22541125, 25, 0),
(42, 25855420, 54412541, 22541125, 25, 0),
(43, 25855420, 54412541, 22541125, 25, 0),
(44, 25855420, 54412541, 22541125, 25, 0),
(45, 25855420, 54412541, 22541125, 25, 0),
(46, 25855420, 54412541, 22541125, 25, 0),
(47, 25855420, 54412541, 22541125, 25, 0),
(48, 25855420, 54412541, 22541125, 25, 0),
(49, 25855420, 54412541, 22541125, 25, 0),
(50, 25855420, 54412541, 22541125, 25, 0),
(51, 25855420, 54412541, 22541125, 25, 0),
(52, 25855420, 54412541, 22541125, 25, 0),
(53, 25855420, 54412541, 22541125, 25, 0),
(54, 25855420, 54412541, 22541125, 25, 0),
(55, 25855420, 54412541, 22541125, 25, 0),
(56, 25855420, 54412541, 22541125, 25, 0),
(57, 25855420, 54412541, 22541125, 25, 0),
(58, 25855420, 54412541, 22541125, 25, 0),
(59, 25855420, 54412541, 22541125, 25, 0),
(60, 25855420, 54412541, 22541125, 25, 0),
(61, 25855420, 54412541, 22541125, 25, 0),
(62, 25855420, 54412541, 22541125, 25, 0),
(63, 25855420, 54412541, 22541125, 25, 0),
(64, 25855420, 54412541, 22541125, 25, 0),
(65, 25855420, 54412541, 22541125, 25, 0),
(66, 25855420, 54412541, 22541125, 25, 0),
(67, 25855420, 54412541, 22541125, 25, 0),
(68, 25855420, 54412541, 22541125, 25, 0),
(69, 25855420, 54412541, 22541125, 25, 0),
(70, 25855420, 54412541, 22541125, 25, 0),
(71, 25855420, 54412541, 22541125, 25, 0),
(72, 25855420, 54412541, 22541125, 25, 0),
(73, 25855420, 54412541, 22541125, 25, 0),
(74, 25855420, 54412541, 22541125, 25, 0),
(75, 25855420, 54412541, 22541125, 25, 0),
(76, 25855420, 54412541, 22541125, 25, 0),
(77, 25855420, 54412541, 22541125, 25, 0),
(78, 25855420, 54412541, 22541125, 25, 0),
(79, 25855420, 54412541, 22541125, 25, 0),
(80, 25855420, 54412541, 22541125, 25, 0),
(81, 25855420, 54412541, 22541125, 25, 0),
(82, 25855420, 54412541, 22541125, 25, 0),
(83, 25855420, 54412541, 22541125, 25, 0),
(84, 25855420, 54412541, 22541125, 25, 0),
(85, 25855420, 54412541, 22541125, 25, 0),
(86, 25855420, 54412541, 22541125, 25, 0),
(87, 25855420, 54412541, 22541125, 25, 0),
(88, 25855420, 54412541, 22541125, 25, 0),
(89, 25855420, 54412541, 22541125, 25, 0),
(90, 25855420, 54412541, 22541125, 25, 0),
(91, 25855420, 54412541, 22541125, 25, 0),
(92, 25855420, 54412541, 22541125, 25, 0),
(93, 25855420, 54412541, 22541125, 25, 0),
(94, 25855420, 54412541, 22541125, 25, 0),
(95, 25855420, 54412541, 22541125, 25, 0),
(96, 25855420, 54412541, 22541125, 25, 0),
(97, 25855420, 54412541, 22541125, 25, 0),
(98, 25855420, 54412541, 22541125, 25, 0),
(99, 25855420, 54412541, 22541125, 25, 0),
(100, 25855420, 54412541, 22541125, 25, 0),
(101, 25855420, 54412541, 22541125, 25, 0),
(102, 25855420, 54412541, 22541125, 25, 0),
(103, 25855420, 54412541, 22541125, 25, 0),
(104, 25855420, 54412541, 22541125, 25, 0),
(105, 25855420, 54412541, 22541125, 25, 0),
(106, 25855420, 54412541, 22541125, 25, 0),
(107, 25855420, 54412541, 22541125, 25, 0),
(108, 25855420, 54412541, 22541125, 25, 0),
(109, 25855420, 54412541, 22541125, 25, 0),
(110, 25855420, 54412541, 22541125, 25, 0),
(111, 25855420, 54412541, 22541125, 25, 0),
(112, 25855420, 54412541, 22541125, 25, 0),
(113, 25855420, 54412541, 22541125, 25, 0),
(114, 25855420, 54412541, 22541125, 25, 0),
(115, 25855420, 54412541, 22541125, 25, 0),
(116, 25855420, 54412541, 22541125, 25, 0),
(117, 25855420, 54412541, 22541125, 25, 0),
(118, 25855420, 54412541, 22541125, 25, 0),
(119, 25855420, 54412541, 22541125, 25, 0),
(120, 25855420, 54412541, 22541125, 25, 0),
(121, 25855420, 54412541, 22541125, 25, 0),
(122, 25855420, 54412541, 22541125, 25, 0),
(123, 25855420, 54412541, 22541125, 25, 0),
(124, 25855420, 54412541, 22541125, 25, 0),
(125, 25855420, 54412541, 22541125, 25, 0),
(126, 25855420, 54412541, 22541125, 25, 0),
(127, 25855420, 54412541, 22541125, 25, 0),
(128, 25855420, 54412541, 22541125, 25, 0),
(129, 25855420, 54412541, 22541125, 25, 0),
(130, 25855420, 54412541, 22541125, 25, 0),
(131, 25855420, 54412541, 22541125, 25, 0),
(132, 25855420, 54412541, 22541125, 25, 0),
(133, 25855420, 54412541, 22541125, 25, 0),
(134, 25855420, 54412541, 22541125, 25, 0),
(135, 25855420, 54412541, 22541125, 25, 0),
(136, 25855420, 54412541, 22541125, 25, 0),
(137, 25855420, 54412541, 22541125, 25, 0),
(138, 25855420, 54412541, 22541125, 25, 0),
(139, 25855420, 54412541, 22541125, 25, 0),
(140, 25855420, 54412541, 22541125, 25, 0),
(141, 25855420, 54412541, 22541125, 25, 0),
(142, 25855420, 54412541, 22541125, 25, 0),
(143, 25855420, 54412541, 22541125, 25, 0),
(144, 25855420, 54412541, 22541125, 25, 0),
(145, 25855420, 54412541, 22541125, 25, 0),
(146, 25855420, 54412541, 22541125, 25, 0),
(147, 25855420, 54412541, 22541125, 25, 0),
(148, 25855420, 54412541, 22541125, 25, 0),
(149, 25855420, 54412541, 22541125, 25, 0),
(150, 25855420, 54412541, 22541125, 25, 0),
(151, 25855420, 54412541, 22541125, 25, 0),
(152, 25855420, 54412541, 22541125, 25, 0),
(153, 25855420, 54412541, 22541125, 25, 0),
(154, 25855420, 54412541, 22541125, 25, 0),
(155, 25855420, 54412541, 22541125, 25, 0),
(156, 25855420, 54412541, 22541125, 25, 0),
(157, 25855420, 54412541, 22541125, 25, 0),
(158, 25855420, 54412541, 22541125, 25, 0),
(159, 25855420, 54412541, 22541125, 25, 0),
(160, 25855420, 54412541, 22541125, 25, 0),
(161, 25855420, 54412541, 22541125, 25, 0),
(162, 25855420, 54412541, 22541125, 25, 0),
(163, 25855420, 54412541, 22541125, 25, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagocomer`
--

CREATE TABLE `pagocomer` (
  `id` int(11) NOT NULL,
  `fk_comer` int(11) DEFAULT NULL,
  `montopago` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `numerorecib` int(11) DEFAULT NULL,
  `formapago` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `periodo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estCivil` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciudadResid` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telef` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `nombre`, `apellido`, `cedula`, `estCivil`, `ciudadResid`, `direccion`, `telef`) VALUES
(1, 'aklsdjalksjdlkasdj', 'kkajsdlkkjasdlkjasl', 'V|546546', 'Soltera(o)', 'aasdasdas', 'asdasdasdasd', '5465465'),
(2, 'aklsdjalksjdlkasdj', 'kkajsdlkkjasdlkjasl', 'E|546546', 'Soltera(o)', 'aasdasdas', '5465465', '5465465'),
(3, 'aklsdjalksjdlkasdj', 'kkajsdlkkjasdlkjasl', 'V|546546', 'Soltera(o)', 'aasdasdas', 'aasdasdas', '5465465'),
(4, 'aklsdjalksjdlkasdj', 'aklsdjalksjdlkasdj', 'E|546546', 'Soltera(o)', 'aasdasdas', 'asdasdasdasd', '5465465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recaudos`
--

CREATE TABLE `recaudos` (
  `id` int(11) NOT NULL,
  `regComer` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `docProp` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `permisoBom` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CopRif` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cartSoli` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `copiaCed` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `permiSant` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carpMarr` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recaudos`
--

INSERT INTO `recaudos` (`id`, `regComer`, `docProp`, `permisoBom`, `CopRif`, `cartSoli`, `copiaCed`, `permiSant`, `carpMarr`) VALUES
(1, 'undefined', 'Si', 'nada', 'Si', 'nada', 'Si', 'Si', 'nada'),
(2, 'undefined', 'nada', 'nada', 'Si', 'nada', 'Si', 'nada', 'nada'),
(3, 'undefined', 'nada', 'nada', 'Si', 'Si', 'Si', 'Si', 'nada'),
(4, 'undefined', 'Si', 'nada', 'Si', 'nada', 'Si', 'nada', 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `codSect` int(11) DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `codSect`, `nombre`) VALUES
(1, 23, 'El piñal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrupo`
--

CREATE TABLE `subgrupo` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fk_grupos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `subgrupo`
--

INSERT INTO `subgrupo` (`id`, `codigo`, `nombre`, `fk_grupos`) VALUES
(1, '11', 'Radio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `depart` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nivel` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pass` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nick` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `depart`, `nivel`, `pass`, `nick`, `nombre`, `apellido`) VALUES
(1, 'Archivo', '1', '19970321', 'che234', 'Jose', 'Millan'),
(2, 'Tramitaciones', '1', '19970321che', 'jimco254', 'Jose Ignacio', 'Millan Colina');

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
  ADD KEY `FK_grupo_idx` (`fk_actEcon`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comercio`
--
ALTER TABLE `comercio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `datcomer`
--
ALTER TABLE `datcomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `licactecon`
--
ALTER TABLE `licactecon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidaciones`
--
ALTER TABLE `liquidaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `pagocomer`
--
ALTER TABLE `pagocomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recaudos`
--
ALTER TABLE `recaudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subgrupo`
--
ALTER TABLE `subgrupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
