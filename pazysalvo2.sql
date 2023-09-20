-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2023 a las 05:35:41
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
-- Base de datos: `pazysalvo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `acti_id` int(11) NOT NULL,
  `acti_description` varchar(50) DEFAULT NULL,
  `acti_order` tinyint(3) UNSIGNED DEFAULT NULL,
  `acti_activo` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`acti_id`, `acti_description`, `acti_order`, `acti_activo`) VALUES
(1, 'crear', 1, 1),
(2, 'actualizar', 2, 1),
(3, 'eliminar', 3, 0),
(4, 'buscar', 4, 1),
(5, 'permisos', 5, 1),
(6, 'inicio', 6, 1),
(7, 'imprimir', 7, 0),
(8, 'desbloquear', 8, 0),
(9, 'exportar', 9, 1),
(10, 'listar', 10, 1),
(11, 'importar', 11, 0),
(12, 'diligenciar', 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobaciones`
--

CREATE TABLE `aprobaciones` (
  `id_apro` int(11) NOT NULL,
  `estado_apro` enum('aprobado','rechazado') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `id_paz_salavo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nom_area` varchar(50) DEFAULT NULL,
  `estado_area` enum('activo','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nom_area`, `estado_area`) VALUES
(1, 'contabilidad', 'activo'),
(2, 'seguridad', 'activo'),
(3, 'sistemas', 'activo'),
(4, 'recursos humanos', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id_session` varchar(40) NOT NULL DEFAULT '0' COMMENT 'id_session codigo alfanumerico',
  `ip_address` varchar(45) NOT NULL DEFAULT '0' COMMENT 'ip_address hace referencia a la direccion ip la cual seesta el usario en el momento de conectrarse',
  `user` varchar(120) NOT NULL COMMENT 'user  id del usuario',
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'last activity tiempo de la session',
  `user_data` text NOT NULL COMMENT 'user data contiene toda la informacion del usurio conectado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='la tabla sessions se  gruarda la informaciond e cada inicio  de session realizado por un usuario de la aplicacion';

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`id_session`, `ip_address`, `user`, `last_activity`, `user_data`) VALUES
('10819dde376077fca87e70b1af08ecc9', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555952854, 'a:2:{s:9:\"user_data\";s:0:\"\";s:4:\"Auth\";a:3:{s:10:\"objUsuario\";a:20:{s:7:\"user_id\";s:2:\"18\";s:12:\"user_deleted\";s:1:\"0\";s:12:\"user_usuario\";s:11:\"amguacaneme\";s:12:\"user_nombres\";s:16:\"ANDRÉS MAURICIO\";s:14:\"user_apellidos\";s:15:\"GUACANEME HOYOS\";s:19:\"user_identificacion\";s:10:\"1014209016\";s:9:\"user_type\";s:7:\"Interno\";s:11:\"user_active\";s:1:\"1\";s:13:\"user_conected\";s:1:\"1\";s:13:\"user_password\";s:32:\"78460b3bea46779282e52e706ffbc674\";s:25:\"user_last_change_password\";N;s:24:\"user_is_default_password\";s:1:\"0\";s:21:\"user_password_expired\";s:1:\"0\";s:11:\"user_locked\";s:1:\"0\";s:16:\"user_sessions_id\";N;s:20:\"user_fechhoratimeout\";s:19:\"2019-04-09 17:53:52\";s:10:\"id_session\";s:32:\"4661e0dd6fa1eeda00873bc013104109\";s:9:\"user_lock\";N;s:9:\"lck_fecha\";N;s:12:\"lck_intentos\";N;}s:13:\"arrPermission\";a:8:{s:9:\"dashboard\";a:3:{s:4:\"main\";s:4:\"main\";s:10:\"visualizar\";s:10:\"visualizar\";s:8:\"exportar\";s:8:\"exportar\";}s:14:\"distribuidores\";a:4:{s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";s:5:\"crear\";s:5:\"crear\";s:10:\"actualizar\";s:10:\"actualizar\";}s:6:\"listas\";a:4:{s:5:\"crear\";s:5:\"crear\";s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";}s:11:\"paquetacion\";a:4:{s:5:\"crear\";s:5:\"crear\";s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";}s:9:\"planillas\";a:7:{s:8:\"imprimir\";s:8:\"imprimir\";s:8:\"importar\";s:8:\"importar\";s:5:\"crear\";s:5:\"crear\";s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";s:11:\"diligenciar\";s:11:\"diligenciar\";}s:5:\"roles\";a:4:{s:5:\"crear\";s:5:\"crear\";s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";}s:7:\"usuario\";a:5:{s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";s:11:\"desbloquear\";s:11:\"desbloquear\";s:5:\"crear\";s:5:\"crear\";}s:12:\"zonificacion\";a:4:{s:10:\"actualizar\";s:10:\"actualizar\";s:6:\"buscar\";s:6:\"buscar\";s:4:\"main\";s:4:\"main\";s:5:\"crear\";s:5:\"crear\";}}s:9:\"logged_in\";b:1;}}'),
('14d08760fa313a5264686a4e10fb5dc4', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1555948927, ''),
('2406ded0acdda8dd933868ade328efba', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555961866, ''),
('4a6e37ea6226d7e577ba5387f7e30d57', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1555948927, ''),
('818a363b8fedb0b4e6b2b6d43f602168', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555961866, ''),
('e4e743715e54638d37b21d53f62ab562', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1555961865, ''),
('f2789da8923810fd88de8c3c85ee057d', '192.168.1.53', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', 1555948927, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jefes`
--

CREATE TABLE `jefes` (
  `id_jefe` int(11) NOT NULL,
  `nom_jefe` varchar(50) DEFAULT NULL,
  `estado_jefe` enum('activo','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jefes`
--

INSERT INTO `jefes` (`id_jefe`, `nom_jefe`, `estado_jefe`) VALUES
(1, 'jefe seguridad', 'activo'),
(2, 'jefe contabilidad', 'activo'),
(3, 'jefe recursos humanos', 'activo'),
(4, 'jefe sistemas', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_login`
--

CREATE TABLE `log_login` (
  `Id` int(11) NOT NULL,
  `id_session` varchar(50) NOT NULL DEFAULT '0',
  `Id_usuario` int(11) DEFAULT NULL,
  `Ip_Usuario` varchar(50) DEFAULT NULL,
  `Fecha_ingreso` varchar(50) DEFAULT NULL,
  `Navegador` text DEFAULT NULL,
  `user_data` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `descrip` varchar(50) DEFAULT NULL,
  `id_areas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paz_salvo`
--

CREATE TABLE `paz_salvo` (
  `id_paz_salvo` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `aprobado_final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nom_perfil` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_perfil` enum('activo','inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nom_perfil`, `estado_perfil`) VALUES
(1, '1', 'activo'),
(2, '2', 'activo'),
(3, 'Empleados', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `cpe_id` int(11) UNSIGNED NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `vts_id` int(11) NOT NULL,
  `acti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL,
  `nom_tipo_documento` varchar(50) DEFAULT NULL,
  `tipo_estado` enum('activo','inactivo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_usuario` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_script_password_usuario` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documento_usuario` int(11) DEFAULT NULL,
  `id_tipo_doc_usuario` int(11) DEFAULT NULL,
  `estado_usuario` enum('activo','inactivo','despedido') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'activo',
  `id_perfil` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_jefe` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `id_usuario_resgistro` int(11) DEFAULT NULL,
  `fecha_actualizacion` timestamp NULL DEFAULT NULL,
  `id_usuario_actualizacion` int(11) DEFAULT NULL,
  `fecha_ingreso_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_restiro_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salario_usuario` decimal(20,2) DEFAULT NULL,
  `firma` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `password_usuario`, `no_script_password_usuario`, `documento_usuario`, `id_tipo_doc_usuario`, `estado_usuario`, `id_perfil`, `id_area`, `id_jefe`, `fecha_registro`, `id_usuario_resgistro`, `fecha_actualizacion`, `id_usuario_actualizacion`, `fecha_ingreso_usuario`, `fecha_restiro_usuario`, `salario_usuario`, `firma`) VALUES
(1, 'brayan', 'hernandez', 'bryam153@outlook.es', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 1023005383, 2, 'activo', 3, 2, 3, '2023-09-07 07:29:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'camilo', 'campos', 'c@our.com', '81b073de9370ea873f548e31b8adc081', '2345', 123455543, 2, 'activo', 3, 1, 1, '2023-09-07 17:48:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'edgar', 'hernandez', 'ed-andres28@hotmail.com', 'c37bf859faf392800d739a41fe5af151', '98765', 12334444, 1, 'activo', 3, 4, 2, '2023-09-08 23:06:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validar_usuario_olvidado`
--

CREATE TABLE `validar_usuario_olvidado` (
  `id` int(11) NOT NULL,
  `correo_usuario` varchar(50) DEFAULT NULL,
  `token_usuario` longtext DEFAULT NULL,
  `estado_validacion` enum('activo','usado') DEFAULT 'activo',
  `fecha_vencimiento` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `validar_usuario_olvidado`
--

INSERT INTO `validar_usuario_olvidado` (`id`, `correo_usuario`, `token_usuario`, `estado_validacion`, `fecha_vencimiento`) VALUES
(1, 'bry@ou.es', '01cfb0b6315126228d01e072a6718a08', '', '2023-09-08 11:41:00'),
(2, 'bry@ou.es', '96c83cf15d7a4b405fb1789a3392b9ed', '', '2023-09-08 11:41:01'),
(3, 'bry@ou.es', '96c83cf15d7a4b405fb1789a3392b9ed', '', '2023-09-08 11:41:01'),
(4, 'bry@ou.es', '51bbeedbaa76e8ec6a949e8c4d1a4d3e', 'activo', '2023-09-08 12:48:48'),
(5, 'ed-andres28@hotmail.com', 'f7cb5e63e9ea2e3eb8b7fb5352cbe6a8', '', '2023-09-09 08:07:46'),
(6, 'ed-andres28@hotmail.com', 'cd11db35ba431f7e79c4f6fc08685f72', '', '2023-09-09 08:07:52'),
(7, 'ed-andres28@hotmail.com', 'cd11db35ba431f7e79c4f6fc08685f72', '', '2023-09-09 08:07:52'),
(8, 'ed-andres28@hotmail.com', 'cd11db35ba431f7e79c4f6fc08685f72', '', '2023-09-09 08:07:52'),
(9, 'ed-andres28@hotmail.com', 'cd11db35ba431f7e79c4f6fc08685f72', '', '2023-09-09 08:07:52'),
(10, 'ed-andres28@hotmail.com', '3064ca82eb06b6550e4dd4edcf2ab277', '', '2023-09-09 08:07:58'),
(11, 'ed-andres28@hotmail.com', '3064ca82eb06b6550e4dd4edcf2ab277', '', '2023-09-09 08:07:58'),
(12, 'ed-andres28@hotmail.com', '3064ca82eb06b6550e4dd4edcf2ab277', '', '2023-09-09 08:07:58'),
(13, 'ed-andres28@hotmail.com', '3064ca82eb06b6550e4dd4edcf2ab277', '', '2023-09-09 08:07:58'),
(14, 'ed-andres28@hotmail.com', 'ed4da6347b7ac92cec45fc30b92af4be', '', '2023-09-09 08:07:59'),
(15, 'ed-andres28@hotmail.com', 'ed4da6347b7ac92cec45fc30b92af4be', '', '2023-09-09 08:07:59'),
(16, 'ed-andres28@hotmail.com', '97146ada82400938bad0a398ca39bbdf', '', '2023-09-09 08:08:19'),
(17, 'ed-andres28@hotmail.com', '97146ada82400938bad0a398ca39bbdf', '', '2023-09-09 08:08:19'),
(18, 'ed-andres28@hotmail.com', '97146ada82400938bad0a398ca39bbdf', '', '2023-09-09 08:08:19'),
(19, 'ed-andres28@hotmail.com', '7c9cd8a12a0c124fb0c75e6a9ce0a538', '', '2023-09-09 08:08:20'),
(20, 'ed-andres28@hotmail.com', '7c9cd8a12a0c124fb0c75e6a9ce0a538', '', '2023-09-09 08:08:20'),
(21, 'ed-andres28@hotmail.com', '7c9cd8a12a0c124fb0c75e6a9ce0a538', '', '2023-09-09 08:08:20'),
(22, 'ed-andres28@hotmail.com', '11ad16261cc6c78cee536af818547c5e', '', '2023-09-09 08:08:40'),
(23, 'ed-andres28@hotmail.com', '11ad16261cc6c78cee536af818547c5e', '', '2023-09-09 08:08:40'),
(24, 'ed-andres28@hotmail.com', '11ad16261cc6c78cee536af818547c5e', '', '2023-09-09 08:08:40'),
(25, 'ed-andres28@hotmail.com', 'a734a0025c5befa08898cc890b2f4d92', '', '2023-09-09 08:08:41'),
(26, 'ed-andres28@hotmail.com', 'a734a0025c5befa08898cc890b2f4d92', '', '2023-09-09 08:08:41'),
(27, 'ed-andres28@hotmail.com', 'a734a0025c5befa08898cc890b2f4d92', '', '2023-09-09 08:08:41'),
(28, 'ed-andres28@hotmail.com', 'fc1ed16ce8bb9c30a78b5bddf78d7e4e', '', '2023-09-09 08:09:01'),
(29, 'ed-andres28@hotmail.com', 'ab2ce42b13708c408f0abb47ecfd3ce1', '', '2023-09-09 08:09:02'),
(30, 'ed-andres28@hotmail.com', 'ab2ce42b13708c408f0abb47ecfd3ce1', '', '2023-09-09 08:09:02'),
(31, 'ed-andres28@hotmail.com', 'ab2ce42b13708c408f0abb47ecfd3ce1', '', '2023-09-09 08:09:02'),
(32, 'ed-andres28@hotmail.com', 'ab2ce42b13708c408f0abb47ecfd3ce1', '', '2023-09-09 08:09:02'),
(33, 'ed-andres28@hotmail.com', 'ab2ce42b13708c408f0abb47ecfd3ce1', '', '2023-09-09 08:09:02'),
(34, 'ed-andres28@hotmail.com', '2c19bf062b520029941df93e2b9ce5ac', 'activo', '2023-09-09 08:09:53'),
(35, 'bryam153@outlook.es', '4ee5a04c59bed36b4629f0fcdebc262f', '', '2023-09-09 08:42:14'),
(36, 'bryam153@outlook.es', '141a002e0a83c99935c52082f87b5bdd', '', '2023-09-09 08:42:26'),
(37, 'bryam153@outlook.es', '141a002e0a83c99935c52082f87b5bdd', '', '2023-09-09 08:42:26'),
(38, 'bryam153@outlook.es', '141a002e0a83c99935c52082f87b5bdd', '', '2023-09-09 08:42:26'),
(39, 'bryam153@outlook.es', 'a812b04b3d6785ff03cc76515400f256', '', '2023-09-09 09:34:05'),
(40, 'bryam153@outlook.es', 'f7d396114f3a8e43f959a95e75d22071', '', '2023-09-09 09:40:05'),
(41, 'bryam153@outlook.es', '3fa4cc14c884d75c6af60547d26a100f', 'activo', '2023-09-09 10:20:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas`
--

CREATE TABLE `vistas` (
  `vts_id` int(11) NOT NULL,
  `vts_description` varchar(50) DEFAULT NULL,
  `vts_activo` tinyint(3) UNSIGNED DEFAULT 1,
  `vts_icono` varchar(45) DEFAULT NULL COMMENT 'Definir icono del modulo',
  `vts_orden` int(11) DEFAULT NULL COMMENT 'Definir orden en que se van a listas',
  `vts_ruta` varchar(45) DEFAULT NULL COMMENT 'Definir la ruta a la que se va a redireccionar',
  `vts_eliminar` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `vistas`
--

INSERT INTO `vistas` (`vts_id`, `vts_description`, `vts_activo`, `vts_icono`, `vts_orden`, `vts_ruta`, `vts_eliminar`) VALUES
(1, 'Usuario', 1, 'fa-users', 1, 'usuario', 1),
(2, 'Roles', 1, 'fa-user-lock', 2, 'roles', 1),
(3, 'Registro', 1, 'fa-laptop', 4, 'registro', 0),
(4, 'Facturación', 1, 'fa-file-invoice-dollar', 3, 'facturacion', 0),
(5, 'Novedades', 1, 'fa-pen-square', 5, 'novedades', 0),
(6, 'Reportes', 1, 'fa-solid  fa-code', 6, 'reportes', 0),
(7, 'Proyectos', 1, 'fa-font', 7, 'proyectos', 0),
(8, 'Entregas', 1, 'fa-calendar-day', 8, 'entregas', 0),
(9, 'Inicio', 1, 'fa-house-user', 0, 'inicio', 0),
(10, 'Ayuda', 1, 'fa-info-circle', 9, 'ayuda', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`acti_id`);

--
-- Indices de la tabla `aprobaciones`
--
ALTER TABLE `aprobaciones`
  ADD PRIMARY KEY (`id_apro`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_paz_salavo` (`id_paz_salavo`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `jefes`
--
ALTER TABLE `jefes`
  ADD PRIMARY KEY (`id_jefe`);

--
-- Indices de la tabla `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_area` (`id_areas`) USING BTREE;

--
-- Indices de la tabla `paz_salvo`
--
ALTER TABLE `paz_salvo`
  ADD PRIMARY KEY (`id_paz_salvo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `aprobado_final` (`aprobado_final`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`cpe_id`),
  ADD KEY `idx_cpe_action_id` (`acti_id`),
  ADD KEY `idx_cpe_role_id` (`perfil_id`) USING BTREE,
  ADD KEY `idx_cpe_module_id` (`vts_id`) USING BTREE;

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `documento_usuario` (`documento_usuario`),
  ADD KEY `id_tipo_doc_usuario` (`id_tipo_doc_usuario`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_jefe` (`id_jefe`);

--
-- Indices de la tabla `validar_usuario_olvidado`
--
ALTER TABLE `validar_usuario_olvidado`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`vts_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `acti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `aprobaciones`
--
ALTER TABLE `aprobaciones`
  MODIFY `id_apro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jefes`
--
ALTER TABLE `jefes`
  MODIFY `id_jefe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `log_login`
--
ALTER TABLE `log_login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paz_salvo`
--
ALTER TABLE `paz_salvo`
  MODIFY `id_paz_salvo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `cpe_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `validar_usuario_olvidado`
--
ALTER TABLE `validar_usuario_olvidado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `vistas`
--
ALTER TABLE `vistas`
  MODIFY `vts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprobaciones`
--
ALTER TABLE `aprobaciones`
  ADD CONSTRAINT `id_paz_salavo` FOREIGN KEY (`id_paz_salavo`) REFERENCES `paz_salvo` (`id_paz_salvo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log_login`
--
ALTER TABLE `log_login`
  ADD CONSTRAINT `log_login_usuarios` FOREIGN KEY (`Id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `id_areas` FOREIGN KEY (`id_areas`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paz_salvo`
--
ALTER TABLE `paz_salvo`
  ADD CONSTRAINT `aprobado_final_usuario` FOREIGN KEY (`aprobado_final`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_usuario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `acti_id_permisos` FOREIGN KEY (`acti_id`) REFERENCES `acciones` (`acti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perfil_id_permisos` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vts_id_permisos` FOREIGN KEY (`vts_id`) REFERENCES `vistas` (`vts_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_jefe` FOREIGN KEY (`id_jefe`) REFERENCES `jefes` (`id_jefe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_tipo_doc_usuario` FOREIGN KEY (`id_tipo_doc_usuario`) REFERENCES `tipo_documento` (`id_tipo_documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
