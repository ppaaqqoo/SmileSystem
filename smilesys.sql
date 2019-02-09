-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2019 a las 05:07:10
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smilesys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `edad` int(3) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `diagnostico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atm`
--

CREATE TABLE `atm` (
  `idAtm` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `linMedia` varchar(60) DEFAULT NULL,
  `habitos` varchar(60) DEFAULT NULL,
  `bruxismo` varchar(60) DEFAULT NULL,
  `chaArriba` tinyint(11) DEFAULT NULL,
  `chaAbajo` tinyint(11) DEFAULT NULL,
  `infChasquido` varchar(45) DEFAULT NULL,
  `crepitacion` varchar(60) DEFAULT NULL,
  `dolDerecha` tinyint(11) DEFAULT NULL,
  `dolIzquierda` tinyint(11) DEFAULT NULL,
  `infDolor` varchar(45) DEFAULT NULL,
  `maxAbertura` varchar(10) DEFAULT NULL,
  `derecho` varchar(10) NOT NULL,
  `izquierdo` varchar(10) NOT NULL,
  `potrusion` varchar(10) DEFAULT NULL,
  `regresion` varchar(10) DEFAULT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `temp` varchar(10) DEFAULT NULL,
  `pa` varchar(10) DEFAULT NULL,
  `pulso` varchar(10) DEFAULT NULL,
  `fr` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `atm`
--

INSERT INTO `atm` (`idAtm`, `idPaciente`, `linMedia`, `habitos`, `bruxismo`, `chaArriba`, `chaAbajo`, `infChasquido`, `crepitacion`, `dolDerecha`, `dolIzquierda`, `infDolor`, `maxAbertura`, `derecho`, `izquierdo`, `potrusion`, `regresion`, `peso`, `talla`, `temp`, `pa`, `pulso`, `fr`) VALUES
(26, 15, '', '', '', 0, 0, '', '', 0, 0, '', '50', '', '', '2', '', '', '', '', '', '', ''),
(27, 16, '', '', '', 0, 0, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 16, '', '', '', 0, 0, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 17, '', '', '', 0, 0, '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `diagnostico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histclinico`
--

CREATE TABLE `histclinico` (
  `idClinico` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `esmalte` tinyint(11) DEFAULT NULL,
  `dentina` tinyint(11) DEFAULT NULL,
  `raiz` tinyint(11) DEFAULT NULL,
  `huesos` tinyint(11) DEFAULT NULL,
  `encia` tinyint(11) DEFAULT NULL,
  `inEpil` tinyint(11) DEFAULT NULL,
  `lengua` tinyint(11) DEFAULT NULL,
  `pulpo` tinyint(11) DEFAULT NULL,
  `velPal` tinyint(11) DEFAULT NULL,
  `carrillo` tinyint(11) DEFAULT NULL,
  `soMordidaH` tinyint(11) DEFAULT NULL,
  `soMordidaV` tinyint(11) DEFAULT NULL,
  `morAbierta` tinyint(11) DEFAULT NULL,
  `desBruxismo` tinyint(11) DEFAULT NULL,
  `anoclusion` tinyint(11) DEFAULT NULL,
  `simetrica` tinyint(11) DEFAULT NULL,
  `asimetrica` tinyint(11) DEFAULT NULL,
  `braquicefalo` tinyint(11) DEFAULT NULL,
  `mesocefalo` tinyint(11) DEFAULT NULL,
  `dolicefalo` tinyint(11) DEFAULT NULL,
  `recto` tinyint(11) DEFAULT NULL,
  `concavo` tinyint(11) DEFAULT NULL,
  `convexo` tinyint(11) DEFAULT NULL,
  `sarampion` tinyint(11) DEFAULT NULL,
  `viruela` tinyint(11) DEFAULT NULL,
  `parotidis` tinyint(11) DEFAULT NULL,
  `diabetes` tinyint(11) DEFAULT NULL,
  `hipertension` tinyint(11) DEFAULT NULL,
  `tiroides` tinyint(11) DEFAULT NULL,
  `hipotiroidismo` tinyint(11) DEFAULT NULL,
  `proCoagulacion` tinyint(11) DEFAULT NULL,
  `alergias` tinyint(11) DEFAULT NULL,
  `descAlergias` varchar(45) DEFAULT NULL,
  `emergencia` tinyint(11) DEFAULT NULL,
  `revision` tinyint(11) DEFAULT NULL,
  `limpieza` tinyint(11) DEFAULT NULL,
  `canes` tinyint(11) DEFAULT NULL,
  `puente` tinyint(11) DEFAULT NULL,
  `extraccion` tinyint(11) DEFAULT NULL,
  `prostodoncia` tinyint(11) DEFAULT NULL,
  `buena` tinyint(11) DEFAULT NULL,
  `mala` tinyint(11) DEFAULT NULL,
  `tomAlcohol` tinyint(11) DEFAULT NULL,
  `fuma` tinyint(11) DEFAULT NULL,
  `apRespiratorio` tinyint(11) DEFAULT NULL,
  `apCardiovascular` tinyint(11) DEFAULT NULL,
  `apDigestivo` tinyint(11) DEFAULT NULL,
  `sisNervioso` tinyint(11) DEFAULT NULL,
  `apUrinario` tinyint(11) DEFAULT NULL,
  `cicMestrual` tinyint(11) DEFAULT NULL,
  `infCicMes` varchar(45) DEFAULT NULL,
  `embarazo` tinyint(11) DEFAULT NULL,
  `meses` varchar(45) DEFAULT NULL,
  `prg1` tinyint(11) DEFAULT NULL,
  `prg2` varchar(45) DEFAULT NULL,
  `prg3` tinyint(11) DEFAULT NULL,
  `infPrg3` tinyint(11) DEFAULT NULL,
  `prg4` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histpagos`
--

CREATE TABLE `histpagos` (
  `idTx` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `costo` tinyint(11) DEFAULT NULL,
  `cantidad` tinyint(11) DEFAULT NULL,
  `subtotal` tinyint(11) DEFAULT NULL,
  `total` tinyint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `idOdontograma` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `od11` varchar(25) NOT NULL,
  `od12` varchar(25) NOT NULL,
  `od13` varchar(25) NOT NULL,
  `od14` varchar(25) NOT NULL,
  `od15` varchar(25) NOT NULL,
  `od16` varchar(25) NOT NULL,
  `od17` varchar(25) NOT NULL,
  `od18` varchar(25) NOT NULL,
  `od21` varchar(25) NOT NULL,
  `od22` varchar(25) NOT NULL,
  `od23` varchar(25) NOT NULL,
  `od24` varchar(25) NOT NULL,
  `od25` varchar(25) NOT NULL,
  `od26` varchar(25) NOT NULL,
  `od27` varchar(25) NOT NULL,
  `od28` varchar(25) NOT NULL,
  `od31` varchar(25) NOT NULL,
  `od32` varchar(25) NOT NULL,
  `od33` varchar(25) NOT NULL,
  `od34` varchar(25) NOT NULL,
  `od35` varchar(25) NOT NULL,
  `od36` varchar(25) NOT NULL,
  `od37` varchar(25) NOT NULL,
  `od38` varchar(25) NOT NULL,
  `od41` varchar(25) NOT NULL,
  `od42` varchar(25) NOT NULL,
  `od43` varchar(25) NOT NULL,
  `od44` varchar(25) NOT NULL,
  `od45` varchar(25) NOT NULL,
  `od46` varchar(25) NOT NULL,
  `od47` varchar(25) NOT NULL,
  `od48` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL,
  `folio` int(11) NOT NULL,
  `fecIngreso` date NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apePat` varchar(20) NOT NULL,
  `apeMat` varchar(20) DEFAULT NULL,
  `calle` varchar(60) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `colonia` varchar(60) NOT NULL,
  `codPos` varchar(10) NOT NULL,
  `localidad` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `telCasa` varchar(14) NOT NULL,
  `telCel` varchar(14) DEFAULT NULL,
  `fecNacimiento` date NOT NULL,
  `lugNacimiento` varchar(60) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `estCivil` varchar(60) NOT NULL,
  `perResp` varchar(60) DEFAULT NULL,
  `motConsulta` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `abono` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radiografia`
--

CREATE TABLE `radiografia` (
  `idRadiografia` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `path1` varchar(100) DEFAULT NULL,
  `path2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radiografias`
--

CREATE TABLE `radiografias` (
  `idRadiografia` int(10) NOT NULL,
  `idPaciente` int(10) NOT NULL,
  `observaciones` text NOT NULL,
  `img1` varchar(45) NOT NULL,
  `img2` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tx`
--

CREATE TABLE `tx` (
  `idTx` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `costo` float NOT NULL,
  `cantidad` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipoUsuario` int(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `password`, `tipoUsuario`, `direccion`) VALUES
(6, 'admin', '2d3d7304ab1ffd229f2f7f58d091f8234bdfde8d', 1, 'DIRECCIÓN DE AGROINDUSTRIA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`);

--
-- Indices de la tabla `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`idAtm`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idcita`),
  ADD KEY `fk_pac_cita` (`idPaciente`);

--
-- Indices de la tabla `histclinico`
--
ALTER TABLE `histclinico`
  ADD PRIMARY KEY (`idClinico`);

--
-- Indices de la tabla `histpagos`
--
ALTER TABLE `histpagos`
  ADD PRIMARY KEY (`idTx`),
  ADD KEY `fk_pac_histpag` (`idPaciente`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`idOdontograma`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`);

--
-- Indices de la tabla `radiografia`
--
ALTER TABLE `radiografia`
  ADD PRIMARY KEY (`idRadiografia`),
  ADD KEY `fk_pac_radio` (`idPaciente`);

--
-- Indices de la tabla `radiografias`
--
ALTER TABLE `radiografias`
  ADD PRIMARY KEY (`idRadiografia`);

--
-- Indices de la tabla `tx`
--
ALTER TABLE `tx`
  ADD PRIMARY KEY (`idTx`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `atm`
--
ALTER TABLE `atm`
  MODIFY `idAtm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idcita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `histclinico`
--
ALTER TABLE `histclinico`
  MODIFY `idClinico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `histpagos`
--
ALTER TABLE `histpagos`
  MODIFY `idTx` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `idOdontograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `radiografia`
--
ALTER TABLE `radiografia`
  MODIFY `idRadiografia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `radiografias`
--
ALTER TABLE `radiografias`
  MODIFY `idRadiografia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `tx`
--
ALTER TABLE `tx`
  MODIFY `idTx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cita_pac` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `histpagos`
--
ALTER TABLE `histpagos`
  ADD CONSTRAINT `fk_hist_pago` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `radiografia`
--
ALTER TABLE `radiografia`
  ADD CONSTRAINT `fk_radio_pac` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
