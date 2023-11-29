-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 02:58:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id_jefe` int(11) NOT NULL,
  `nom_jefe` varchar(50) DEFAULT NULL,
  `estado_jefe` enum('activo','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id_jefe`, `nom_jefe`, `estado_jefe`) VALUES
(1, 'jefe seguridad', 'activo'),
(3, 'jefe humanos', 'activo'),
(4, 'jefe sistemas', 'activo'),
(6, 'jefe Richi', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paz_salvo`
--

CREATE TABLE `paz_salvo` (
  `id_usuario` int(11) NOT NULL,
  `id_paz_salvo` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `estado` enum('activo','inactivo','','') DEFAULT 'activo',
  `aprobado_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `nom_tipo_documento` varchar(50) DEFAULT NULL,
  `tipo_estado` enum('activo','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo_documento`, `nom_tipo_documento`, `tipo_estado`) VALUES
(1, 'Cedula de ciudadanía', 'activo'),
(2, 'Cedula de Extranjeria ', 'activo'),
(3, 'Nit', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `cargo` int(11) NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `cargo`, `clave`, `created_at`, `estado`) VALUES
(29, 'brayan hernandez', 'bryam153@outlook.es', 1, '202cb962ac59075b964b07152d234b70', '2023-09-17 21:49:57', 1),
(31, 'daren martinez', 'datocarema@misena.edu.co', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-17 23:37:25', 0),
(32, 'brayan hernandez', 'bryam153@outlook.com', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 18:51:05', 0),
(34, 'david', 'david@gmail.com', 3, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 20:19:51', 0),
(35, 'ricardo', 'ricardo@outlook.com', 3, '202cb962ac59075b964b07152d234b70', '2023-09-18 22:26:57', 0),
(38, 'prueba', 'prueba@outlook.co', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-11-28 20:36:23', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id_jefe`);

--
-- Indices de la tabla `paz_salvo`
--
ALTER TABLE `paz_salvo`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jefes`
--
ALTER TABLE `jefes`
  MODIFY `id_jefe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
