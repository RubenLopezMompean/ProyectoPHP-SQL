-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2016 a las 08:30:22
-- Versión del servidor: 5.7.16-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoDaw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idmensaje` int(100) NOT NULL,
  `emisor` varchar(90) COLLATE utf8_bin NOT NULL,
  `receptor` varchar(90) COLLATE utf8_bin NOT NULL,
  `asunto` varchar(50) COLLATE utf8_bin NOT NULL,
  `mensajes` blob NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `emisor`, `receptor`, `asunto`, `mensajes`, `estado`) VALUES
(1, '123', '123', 'ssss', 0x636f6a6f, 0),
(2, '123', '123', 'ssss', 0x636f6a6f, 0),
(3, '123', 'juan', 'topopoptopo', 0x686f6c612071756520617365, 0),
(14, '123', '', '', '', 0),
(15, '123', 'admin', 'probando', 0x6573746f2066756e63696f6e61, 0),
(16, '123', 'admin', 'tonto', 0x686f6c61207175652074616c, 0),
(17, '123', 'federico', 'topo', 0x74616d61647265, 0),
(19, '', '123', 'eo', 0x656f65, 0),
(20, '', '123', 'patata', 0x686f6c61207175652074616c2065737461206c612070617461746120766f6c61646f7261, 0),
(21, '', '123', 'jr', 0x736f79206a756e696f724a524a52, 0),
(22, '123', '123', 'probando', 0x6573746f2066756e63696f6e61, 0),
(23, '123', '123', 'ws', 0x6173647361736461736461c3a7, 0),
(24, '123', 'charlie', 'topo', 0x6572657320756e206761796572, 0),
(25, 'mari', 'admin', 'admin', 0x706f72717565207369, 0),
(26, 'admin', 'mari', 'leee', 0x6c6573206f206e6f206c656573, 0),
(27, 'admin', 'admin', 'admin', 0x6573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e616573746f2066756e63696f6e61, 0),
(28, 'admin', '123', 'hola que tal', 0x6573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e206f206573746173206269656e, 0),
(29, 'admin', 'federico', 'hola', 0x71756520617365, 0),
(30, '123', '123', 'sdsadas', 0x737373737373, 0),
(31, '123', 'admin', 'MVC', 0x6372656f207175652066756e63696f6e61206573746f, 0),
(32, '123', '123', 'final', '', 0),
(33, '123', '123', 'final', '', 0),
(34, '123', '123', 'termino', 0x7465726d696e61646f, 0),
(35, 'perete', 'admin', 'va', 0x6e6f207661, 0),
(36, '123', 'admin', 'yo', 0x796f206d69736d6f, 0),
(37, 'ru', '123', 'hahaha', 0x647361646173647361646173, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` varchar(30) COLLATE utf8_bin NOT NULL,
  `password` varchar(30) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_bin NOT NULL,
  `correo` varchar(100) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `tipousuario` varchar(10) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `password`, `nombre`, `apellidos`, `correo`, `direccion`, `telefono`, `tipousuario`) VALUES
('123', '123', '123', '123', '123', '123', '123', NULL),
('admin', 'admin', 'admin', 'admin', 'admin', NULL, NULL, 'admin'),
('arroyito', 'usuario', 'Jose Antonio', 'Arroyo', 'jjj@jjj.jjj', NULL, NULL, NULL),
('azdaw', 'usuario', 'Alejandro', 'Zambrana', 'aaa@aaa.aaa', NULL, NULL, NULL),
('camel', '123', 'camel', 'camel', 'camel@camel.com', NULL, NULL, NULL),
('deserter', 'usuario', 'Antonio', 'Martin', 'ddd@ddd.ddd', '', '', NULL),
('federico', '123', 'federico', 'alonso', 'federic@alonso.com', 'sadasd', '123', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idmensaje`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idmensaje` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
