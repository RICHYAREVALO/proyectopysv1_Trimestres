-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2023 a las 05:35:58
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
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `clave` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `cargo`, `clave`, `created_at`, `updated_at`) VALUES
(29, 'brayan hernandez', 'bryam153@outlook.es', 1, '202cb962ac59075b964b07152d234b70', '2023-09-17 21:49:57', '2023-09-18 15:03:01'),
(31, 'daren martinez', 'datocarema@misena.edu.co', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-17 23:37:25', '2023-09-18 15:03:05'),
(32, 'brayan hernandez', 'bryam153@outlook.com', 2, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 18:51:05', '2023-09-18 19:10:21'),
(33, 'admin', 'bryam153@outlook.co', 1, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 19:45:19', '2023-09-18 19:45:37'),
(34, 'david', 'david@gmail.com', 3, '81dc9bdb52d04dc20036dbd8313ed055', '2023-09-18 20:19:51', '2023-09-18 20:20:07'),
(35, 'ricardo', 'ricardo@outlook.com', 3, '202cb962ac59075b964b07152d234b70', '2023-09-18 22:26:57', '2023-09-18 22:29:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
