-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2020 a las 01:36:40
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

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

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`idclinica`, `nombre`, `telefono`, `direccion`, `cant_insumos`, `NIT`) VALUES
(1, 'Americas', '5607856', 'Av56B70', NULL, NULL),
(4, 'SBJ', NULL, 'Av56B80', NULL, NULL);

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
  `nombreP` varchar(30) DEFAULT NULL,
  `idpaciente` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `gravedad`, `notificacion`, `recomendacion`, `fecha_suceso`, `nombreP`, `idpaciente`) VALUES
(12, 'Alta', 'Gustavo', 'Tomar pastillas cada 8 horas       ', '2020-06-23 12:09:30', 'Andres Caro', 0),
(17, 'Alta', 'Lee', 'Tomar Pastillas', '2020-10-12 02:29:55', 'Gustavo', 16),
(18, 'Alta', 'Lee', 'hujakbdjhxm', '2020-10-12 02:30:06', 'Gustavo', 16);

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

--
-- Volcado de datos para la tabla `familiar`
--

INSERT INTO `familiar` (`idfamiliar`, `nombres`, `apellidos`, `documento_id`, `telefono`, `movil`, `correo`, `direccion_residencia`, `direccion_laboral`, `idpaciente`, `contrasena`) VALUES
(103, 'Pablo', 'Caro', '123', '3196218923', '123', 'andres@gmail.com', '123', '123', 2, '202cb962ac59075b964b07152d234b70');

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
  `bpm` int(3) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `iddispositivo` int(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monitoreo`
--

INSERT INTO `monitoreo` (`idmonitoreo`, `bpm`, `fecha`, `iddispositivo`) VALUES
(129, 86, '2020-10-12 05:49:43', NULL),
(128, 67, '2020-10-12 05:49:33', NULL);

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
  `tokens` varchar(50) NOT NULL,
  `tipoUsuario` varchar(20) NOT NULL,
  `req-contrasena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nombres`, `apellidos`, `correo`, `contrasena`, `tokens`, `tipoUsuario`, `req-contrasena`) VALUES
(13, 'Medico', 'Medico', 'medico@gmail.com', 'dc04583277667809f8cc8858275c5992', '', '3', 0),
(14, 'Familiar', 'Familiar', 'familiar@gmail.com', '70e0b8023fa9c77bfc688d96b72068c6', '', '2', 0),
(15, 'Paciente', 'Paciente', 'paciente@gmail.com', '8fd2a23c562064352e82366beea55c23', '', '1', 0),
(16, 'Prueba', 'Prueba', 'spamyrecuperacion@gmail.com', '0391393dc1fffa3708b60efc4b3cea92', '5f84a884eed55', '1', 0);

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
  ADD PRIMARY KEY (`idpaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idclinica` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `familiar`
--
ALTER TABLE `familiar`
  MODIFY `idfamiliar` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `monitoreo`
--
ALTER TABLE `monitoreo`
  MODIFY `idmonitoreo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
