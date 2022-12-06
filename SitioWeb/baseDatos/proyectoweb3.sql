-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 15:17:08
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoweb3`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `EncontrarServicio` (IN `FechaBuscada` DATE)   SELECT s.Fecha, s.Diezmo, s.Ofrenda ,a.ClvArticulo, a.NombreArticulo from servicio s join articulos a on s.Fecha=a.Fecha WHERE s.Fecha = FechaBuscada$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GenerarAsistencia` (IN `FechaBuscada` DATE)   SELECT s.Fecha, u.Nombre , u.APaterno ,u.Rol, u.Ministerio 
FROM servicio s 
JOIN asistencia a on s.Fecha = a.Fecha
JOIN usuario u on a.ClvUsuario = u.ClvUsuario
WHERE s.Fecha = FechaBuscada ORDER BY  u.Nombre$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `Fecha` date NOT NULL,
  `ClvArticulo` varchar(5) NOT NULL,
  `NombreArticulo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`Fecha`, `ClvArticulo`, `NombreArticulo`) VALUES
('2022-08-19', 'At3', 'Mentas'),
('2022-08-19', 'At4', 'Aceite'),
('2022-08-19', 'At5', 'Kleenex'),
('2022-11-18', 'At14', 'Manteles'),
('2022-11-18', 'At2', 'Agua'),
('2022-12-02', 'At1', 'Pulpo'),
('2022-12-02', 'At2', 'Agua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ClvUsuario` int(5) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`ClvUsuario`, `Fecha`, `Hora`) VALUES
(2, '2022-08-19', '02:23:00'),
(2, '2022-11-18', '13:01:00'),
(2, '2022-12-02', '23:12:00'),
(3, '2022-08-19', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Fecha` date NOT NULL,
  `Ofrenda` double NOT NULL,
  `Diezmo` double NOT NULL,
  `TotalRecaudaciones` double NOT NULL,
  `Tipo` varchar(1) NOT NULL,
  `AsisNinios` int(11) NOT NULL,
  `AsisPrejus` int(11) NOT NULL,
  `AsisAdultos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Fecha`, `Ofrenda`, `Diezmo`, `TotalRecaudaciones`, `Tipo`, `AsisNinios`, `AsisPrejus`, `AsisAdultos`) VALUES
('2022-06-21', 30, 250, 270, 'o', 5, 0, 15),
('2022-08-19', 100, 80, 180, 'x', 34, 37, 65),
('2022-11-06', 190, 200, 10, 'd', 10, 10, 10),
('2022-11-18', 233, 2190, 2423, 'x', 34, 90, 23),
('2022-11-23', 100, 1000, 1100, 'x', 10, 10, 10),
('2022-12-02', 90, 0, 90, 'x', 2, 0, 8);

--
-- Disparadores `servicio`
--
DELIMITER $$
CREATE TRIGGER `servicioEliminado` BEFORE DELETE ON `servicio` FOR EACH ROW BEGIN
INSERT INTO servicioeliminado SELECT * FROM servicio WHERE Fecha = old.Fecha;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioeliminado`
--

CREATE TABLE `servicioeliminado` (
  `Fecha` date NOT NULL,
  `Ofrenda` double NOT NULL,
  `Diezmo` double NOT NULL,
  `TotalRecaudaciones` double NOT NULL,
  `Tipo` varchar(1) NOT NULL,
  `AsisNinios` int(11) NOT NULL,
  `AsisPrejus` int(11) NOT NULL,
  `AsisAdultos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ClvUsuario` int(5) NOT NULL,
  `NombreUsu` varchar(15) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `Rol` varchar(1) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `APaterno` varchar(10) NOT NULL,
  `AMaterno` varchar(10) NOT NULL,
  `Celular` varchar(10) NOT NULL,
  `Ministerio` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ClvUsuario`, `NombreUsu`, `contrasena`, `Rol`, `Nombre`, `APaterno`, `AMaterno`, `Celular`, `Ministerio`) VALUES
(1, 'usuarioUno', '1234', 'p', 'Pastor Juan', 'Martinez', 'Pascal', '9991516104', 'A'),
(2, 'usuarioDos', '12345', 'l', 'Maria', 'Chi', 'Perez', '9991779876', 'v'),
(3, 'usuarioTres', '123', 'i', 'Jose', 'Escalante', 'Loria', '9898343444', 'i'),
(4, 'usuarioCuatro', '123456', 'i', 'Alejandra', 'Hu', 'Chavez', '9887653456', 'v'),
(5, 'usuarioCinco', '12345678', 'l', 'Karla', 'Gonzales', 'Havila', '9999999999', 'A');

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `usuarioEliminado` BEFORE DELETE ON `usuario` FOR EACH ROW BEGIN
INSERT INTO usuarioeliminado SELECT * FROM usuario WHERE ClvUsuario = old.ClvUsuario;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioeliminado`
--

CREATE TABLE `usuarioeliminado` (
  `ClvUsuario` int(5) NOT NULL,
  `NombreUsu` varchar(15) NOT NULL,
  `contrasena` varchar(10) NOT NULL,
  `Rol` varchar(1) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `APaterno` varchar(10) NOT NULL,
  `AMaterno` varchar(10) NOT NULL,
  `Celular` varchar(10) NOT NULL,
  `Ministerio` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`Fecha`,`ClvArticulo`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ClvUsuario`,`Fecha`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Fecha`);

--
-- Indices de la tabla `servicioeliminado`
--
ALTER TABLE `servicioeliminado`
  ADD PRIMARY KEY (`Fecha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ClvUsuario`);

--
-- Indices de la tabla `usuarioeliminado`
--
ALTER TABLE `usuarioeliminado`
  ADD PRIMARY KEY (`ClvUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ClvUsuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarioeliminado`
--
ALTER TABLE `usuarioeliminado`
  MODIFY `ClvUsuario` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `AtribuMulInventario` FOREIGN KEY (`Fecha`) REFERENCES `servicio` (`Fecha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `usuario_clave` FOREIGN KEY (`ClvUsuario`) REFERENCES `usuario` (`ClvUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
