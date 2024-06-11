-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 21:19:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_nat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Especialidad` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`ID`, `Nombre`, `Especialidad`, `Email`, `Telefono`, `Foto`) VALUES
(1, 'Ana López', 'Técnica', 'ana@example.com', '123456789', '../img/upload/entrenadores/ana_lopez.jpg'),
(2, 'Juan Martínez', 'Resistencia', 'juan@example.com', '987654321', '../img/upload/entrenadores/juan_martinez.jpg'),
(3, 'María Rodríguez', 'Velocidad', 'maria@example.com', '567891234', '../img/upload/entrenadores/maria_rodriguez.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposnatacion`
--

CREATE TABLE `equiposnatacion` (
  `ID` int(11) NOT NULL,
  `NombreEquipo` varchar(100) DEFAULT NULL,
  `Entrenador` varchar(100) DEFAULT NULL,
  `NumNadadores` int(11) DEFAULT NULL,
  `Categoria` varchar(50) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equiposnatacion`
--

INSERT INTO `equiposnatacion` (`ID`, `NombreEquipo`, `Entrenador`, `NumNadadores`, `Categoria`, `Foto`) VALUES
(1, 'Tiburones', 'Juan Martínez', 15, 'Juvenil', '../img/upload/equipos/tiburones.jpg'),
(2, 'Delfines', 'María Rodríguez', 12, 'Infantil', '../img/upload/equipos/delfines.jpg'),
(3, 'Orcas', 'Pedro García', 18, 'Adulto', '../img/upload/equipos/orcas.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nadadores`
--

CREATE TABLE `nadadores` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Sexo` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nadadores`
--

INSERT INTO `nadadores` (`ID`, `Nombre`, `Edad`, `Sexo`, `Email`, `Foto`) VALUES
(6, 'Juan Pérez', 25, 'Masculino', 'juan@example.com', '../img/upload/nadadores/juan_perez.jpg'),
(7, 'María García', 28, 'Femenino', 'maria@example.com', '../img/upload/nadadores/maria_garcia.jpg'),
(8, 'Carlos Rodríguez', 30, 'Masculino', 'carlos@example.com', '../img/upload/nadadores/carlos_rodriguez.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscinas`
--

CREATE TABLE `piscinas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  `MetrosCuadrados` int(50) DEFAULT NULL,
  `Profundidad` decimal(50,0) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `piscinas`
--

INSERT INTO `piscinas` (`ID`, `Nombre`, `Ubicacion`, `MetrosCuadrados`, `Profundidad`, `Imagen`) VALUES
(1, 'Piscina Olímpica', 'Av. Principal, Ciudad A', 1250, 3, '../img/upload/piscinas/piscina_olimpica.jpg'),
(2, 'Piscina de Entrenamiento', 'Calle Central, Ciudad A', 300, 2, '../img/upload/piscinas/piscina_entrenamiento.jpg'),
(3, 'Piscina Recreativa', 'Av. Recreativa, Ciudad A', 600, 2, '../img/upload/piscinas/piscina_recreativa.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `equiposnatacion`
--
ALTER TABLE `equiposnatacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `nadadores`
--
ALTER TABLE `nadadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equiposnatacion`
--
ALTER TABLE `equiposnatacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nadadores`
--
ALTER TABLE `nadadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
