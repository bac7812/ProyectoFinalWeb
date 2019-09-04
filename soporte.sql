-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2019 a las 14:55:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignadas`
--

CREATE TABLE `asignadas` (
  `id` int(11) NOT NULL,
  `asignada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `asignadas`
--

INSERT INTO `asignadas` (`id`, `asignada`) VALUES
(1, 0),
(2, 1),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `estado`) VALUES
(1, 'Material', 1),
(2, 'Vechículo', 1),
(3, 'Inform&aacute;tico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'Abierta'),
(2, 'Asignada'),
(3, 'En estudio'),
(4, 'En desarrollo'),
(5, 'Finalizada'),
(6, 'Reabierta'),
(7, 'Cerrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `fecha_apertura` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_cerrada` datetime NOT NULL,
  `solicitante` int(11) NOT NULL,
  `asignada` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `validacion` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `adjunto` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `opcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `titulo` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `opcion`, `titulo`, `menu`) VALUES
(2, 'acceder', 'Iniciar sesión', 1),
(2, 'nuevacontrasena', 'Nueva contraseña', 0),
(2, 'recuperar', 'Recuperar contraseña', 0),
(2, 'salir', '', 0),
(3, 'editar', 'Editar incidencia', 0),
(3, 'eliminar', '', 0),
(3, 'mostrar', 'Incidencias', 1),
(3, 'solicitar', 'Solicitar incidencia', 0),
(3, 'ver', 'Ver incidencia 	', 0),
(4, 'categorias', 'Editar categorias', 0),
(4, 'contrasena', 'Editar contraseña', 0),
(4, 'editarCategoria', 'Editar categoria', 0),
(4, 'editarTipo', 'Editar tipo', 0),
(4, 'editarUsuario', 'Editar usuario', 0),
(4, 'eliminarCategoria', '', 0),
(4, 'eliminarTipo', '', 0),
(4, 'eliminarUsuario', '', 0),
(4, 'insertarCategoria', 'Insertar categoria', 0),
(4, 'insertarTipo', 'Insertar tipo', 0),
(4, 'insertarUsuario', 'Insertar usuario', 0),
(4, 'perfil', 'Editar perfil', 1),
(4, 'tipos', 'Editar tipos', 0),
(4, 'usuarios', 'Editar usuarios', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `ver` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL,
  `mostrar` int(11) NOT NULL,
  `configurar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `ver`, `editar`, `eliminar`, `mostrar`, `configurar`) VALUES
(1, 0, 0, 0, 1, 1),
(2, 1, 1, 0, 1, 0),
(3, 1, 0, 0, 1, 0),
(10, 1, 0, 0, 0, 1),
(12, 1, 0, 0, 0, 0),
(13, 1, 1, 1, 0, 1),
(14, 1, 1, 1, 0, 1),
(15, 1, 0, 0, 0, 0),
(16, 1, 0, 1, 0, 0),
(17, 1, 0, 0, 0, 0),
(18, 0, 1, 0, 0, 0),
(19, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0),
(22, 1, 1, 1, 0, 1),
(29, 0, 0, 0, 0, 1),
(30, 0, 1, 0, 0, 0),
(33, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE `prioridades` (
  `id` int(11) NOT NULL,
  `prioridad` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id`, `prioridad`) VALUES
(1, 'Baja'),
(2, 'Media'),
(3, 'Alta'),
(4, 'Muy alta'),
(5, 'Urgente'),
(6, 'Inmediata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL,
  `seccion` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id`, `seccion`) VALUES
(1, 'inicio'),
(2, 'acceso'),
(3, 'incidencias'),
(4, 'configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id` int(11) NOT NULL,
  `incidencia` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text COLLATE latin1_spanish_ci NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id`, `incidencia`, `fecha`, `descripcion`, `usuario`) VALUES
(1, 1, '2019-09-02 02:00:00', 'sgsfg', 1),
(2, 1, '2019-09-02 02:03:48', 'eee', 1),
(3, 1, '2019-09-02 03:07:45', 'fff', 1),
(4, 1, '2019-09-02 19:51:43', '', 1),
(5, 1, '2019-09-02 19:52:05', '', 1),
(7, 1, '2019-09-02 19:52:35', '', 1),
(8, 1, '2019-09-02 19:53:09', '', 1),
(9, 1, '2019-09-02 19:53:12', '', 1),
(10, 1, '2019-09-02 19:55:00', '', 1),
(13, 1, '2019-09-02 21:07:06', '', 1),
(16, 1, '2019-09-02 21:09:34', 'eee', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`, `estado`) VALUES
(1, 'Incidencia', 1),
(2, 'Solicitud', 1),
(3, 'Error', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `correoelectronico` mediumtext COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `nombre`, `apellidos`, `correoelectronico`, `estado`) VALUES
(1, 'administracion', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'Administraci&oacute;n', 'Soporte', 'administracion@localhost', 1),
(2, 'gestion', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'Gesti&oacute;n', 'Soporte', 'gestion@localhost', 1),
(3, 'usuario', 'e8dc8ccd5e5f9e3a54f07350ce8a2d3d', 'Usuario', 'Soporte', 'usuario@localhost', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validaciones`
--

CREATE TABLE `validaciones` (
  `id` int(11) NOT NULL,
  `validacion` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `validaciones`
--

INSERT INTO `validaciones` (`id`, `validacion`) VALUES
(1, 'Pendiente'),
(2, 'Aceptado'),
(3, 'Rechazado'),
(4, 'Finalizada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignadas`
--
ALTER TABLE `asignadas`
  ADD PRIMARY KEY (`id`,`asignada`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`categoria`),
  ADD KEY `idPrioridad` (`prioridad`),
  ADD KEY `idEstado` (`estado`),
  ADD KEY `idValidacion` (`validacion`),
  ADD KEY `idTipo` (`tipo`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`,`opcion`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`,`ver`,`editar`,`eliminar`,`configurar`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idUsuarioPermiso` (`id`) USING BTREE;

--
-- Indices de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idIncidencia` (`incidencia`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`,`usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `validaciones`
--
ALTER TABLE `validaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `validaciones`
--
ALTER TABLE `validaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignadas`
--
ALTER TABLE `asignadas`
  ADD CONSTRAINT `idUsuarioRol` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `idCategoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `idEstado` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `idPrioridad` FOREIGN KEY (`prioridad`) REFERENCES `prioridades` (`id`),
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`),
  ADD CONSTRAINT `idValidacion` FOREIGN KEY (`validacion`) REFERENCES `validaciones` (`id`);

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `idSeccion` FOREIGN KEY (`id`) REFERENCES `secciones` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `idIncidencia` FOREIGN KEY (`incidencia`) REFERENCES `incidencias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
