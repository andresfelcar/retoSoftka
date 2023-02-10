-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2023 a las 01:36:41
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `naves_espaciales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naves_no_tripuladas`
--

CREATE TABLE `naves_no_tripuladas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `ano_lanzamiento` date NOT NULL,
  `capacidad_mision` varchar(50) NOT NULL,
  `sistema_comunicaciones` varchar(50) NOT NULL,
  `sistema_control_navegacion` varchar(50) NOT NULL,
  `durabilidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `naves_no_tripuladas`
--

INSERT INTO `naves_no_tripuladas` (`id`, `nombre`, `fabricante`, `ano_lanzamiento`, `capacidad_mision`, `sistema_comunicaciones`, `sistema_control_navegacion`, `durabilidad`) VALUES
(1, 'Kathelen', 'China', '2023-02-09', 'Investigacion', 'Tigo', 'Satelital', '4000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naves_tripuladas`
--

CREATE TABLE `naves_tripuladas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `ano_lanzamiento` date NOT NULL,
  `capacidad_tripulacion` int(11) NOT NULL,
  `sistema_suministro` varchar(50) NOT NULL,
  `sistema_propulsion` varchar(50) NOT NULL,
  `equipos_medicos` varchar(50) NOT NULL,
  `sistema_aterrizaje` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `naves_tripuladas`
--

INSERT INTO `naves_tripuladas` (`id`, `nombre`, `fabricante`, `ano_lanzamiento`, `capacidad_tripulacion`, `sistema_suministro`, `sistema_propulsion`, `equipos_medicos`, `sistema_aterrizaje`) VALUES
(1, 'DeadPool Vaves', 'USA', '2023-02-08', 3, 'Manual', 'Solucion Quimica', 'USA Medical Equipment', 'Automatico'),
(2, 'Andres Felipe', 'China', '2023-02-09', 100, 'Mecanico', 'Automatico', 'Sura', 'Manual'),
(3, 'Andres Felipe', 'Rusia', '2023-02-09', 100, 'Mecanico', 'Automatico', 'Sura', 'Manual'),
(4, 'Kathelen', 'China', '2023-02-09', 100, 'Mecanico', 'Automatico', 'Sura', 'Manual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_lanzadera`
--

CREATE TABLE `vehiculos_lanzadera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fabricante` varchar(50) NOT NULL,
  `ano_lanzamiento` date NOT NULL,
  `capacidad` int(11) NOT NULL,
  `sistema_propulsion` varchar(50) NOT NULL,
  `sistema_reentrada` varchar(50) NOT NULL,
  `sistema_aterrizaje` varchar(50) NOT NULL,
  `sistema_control_vuelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos_lanzadera`
--

INSERT INTO `vehiculos_lanzadera` (`id`, `nombre`, `fabricante`, `ano_lanzamiento`, `capacidad`, `sistema_propulsion`, `sistema_reentrada`, `sistema_aterrizaje`, `sistema_control_vuelo`) VALUES
(1, 'Andres Felipe', 'China', '2023-02-09', 100, 'Automatico', 'Quimico', 'Manual', 'Ala');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `naves_no_tripuladas`
--
ALTER TABLE `naves_no_tripuladas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `naves_tripuladas`
--
ALTER TABLE `naves_tripuladas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos_lanzadera`
--
ALTER TABLE `vehiculos_lanzadera`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `naves_no_tripuladas`
--
ALTER TABLE `naves_no_tripuladas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `naves_tripuladas`
--
ALTER TABLE `naves_tripuladas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos_lanzadera`
--
ALTER TABLE `vehiculos_lanzadera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
