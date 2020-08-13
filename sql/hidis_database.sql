-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2020 a las 00:38:19
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hidis_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `idclinica` int(9) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `cant_insumos` int(10) DEFAULT NULL,
  `NIT` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `iddispositivo` int(9) NOT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `lectura_datos` int(11) DEFAULT NULL,
  `idpaciente` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idevento` int(9) NOT NULL,
  `gravedad` varchar(50) DEFAULT NULL,
  `notificacion` varchar(50) DEFAULT NULL,
  `recomendacion` text DEFAULT NULL,
  `fecha_suceso` datetime DEFAULT NULL,
  `nombreP` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `gravedad`, `notificacion`, `recomendacion`, `fecha_suceso`, `nombreP`) VALUES
(10, 'Urgente', 'Cuesito', 'Tome ague loco', '2020-05-31 05:23:49', 'Nairo Quintana'),
(9, 'Baja', 'Roberto', 'xxxxxxxxxxxxxxx', '2020-05-31 04:44:40', 'Gustavo Adolfo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar`
--

CREATE TABLE `familiar` (
  `idfamiliar` int(9) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `documento_id` varchar(50) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `movil` varchar(13) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `direccion_residencia` varchar(50) DEFAULT NULL,
  `direccion_laboral` varchar(50) DEFAULT NULL,
  `idpaciente` int(9) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `idmedico` int(9) NOT NULL,
  `documento_id` int(13) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `certificado` varchar(25) DEFAULT NULL,
  `idclinica` int(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitoreo`
--

CREATE TABLE `monitoreo` (
  `idmonitoreo` int(9) NOT NULL,
  `bpm` int(5) DEFAULT NULL,
  `iddispositivo` int(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `idmedico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nombres`, `apellidos`, `correo`, `contrasena`, `idmedico`) VALUES
(1, 'andres', 'felipe', 'afca@gmail.com', '333995175660fa13c4ef51172759d180', NULL),
(2, 'Prueba', 'Prueba', 'prueba@gmail.com', '0391393dc1fffa3708b60efc4b3cea92', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `tipoUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `CodigoUser` int(11) NOT NULL,
  `TipoUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`CodigoUser`, `TipoUsuario`) VALUES
(3, 'medico'),
(4, 'familiar'),
(5, 'paciente'),
(6, 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`idclinica`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`iddispositivo`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`);

--
-- Indices de la tabla `familiar`
--
ALTER TABLE `familiar`
  ADD PRIMARY KEY (`idfamiliar`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmedico`),
  ADD KEY `idclinica` (`idclinica`);

--
-- Indices de la tabla `monitoreo`
--
ALTER TABLE `monitoreo`
  ADD PRIMARY KEY (`idmonitoreo`),
  ADD KEY `iddispositivo` (`iddispositivo`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD KEY `idmedico` (`idmedico`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`CodigoUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `idfamiliar` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `CodigoUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
