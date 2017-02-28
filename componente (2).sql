-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2017 a las 09:38:21
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `componente`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id_banco` int(3) NOT NULL,
  `nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id_banco`, `nombre`) VALUES
(1, 'Banco Canarias de Venezuela'),
(2, 'Banco de Venezuela'),
(3, 'Corp Banca'),
(4, 'Banco Provincial'),
(6, 'Banco Activo'),
(9, 'Banesco'),
(10, 'BFC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_mov` int(11) NOT NULL,
  `responsable` text NOT NULL,
  `accion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_mov`, `responsable`, `accion`, `fecha`) VALUES
(1, 'osward', 'inicio sesion', '2016-11-08 15:31:17'),
(3, 'Osward', 'Inicio Sesión', '2016-11-08 16:07:12'),
(4, 'Osward', 'Inicio Sesión', '2016-11-08 16:08:19'),
(5, 'Osward', 'Inicio Sesión', '2016-11-08 16:08:44'),
(6, 'Osward', 'Inicio Sesión', '2016-11-08 16:09:33'),
(7, 'Osward', 'Inicio Sesión', '2016-11-08 16:09:41'),
(8, 'Osward', 'Inicio Sesión', '2016-11-08 18:20:17'),
(9, 'Osward', 'Inicio Sesión', '2016-11-08 18:58:49'),
(10, 'Osward', 'Inicio Sesión', '2016-11-08 19:01:36'),
(11, 'Osward', 'Inicio Sesión', '2016-11-08 19:03:22'),
(12, 'Osward', 'Inicio Sesión', '2016-11-08 23:15:00'),
(13, 'Osward', 'Inicio Sesión', '2016-11-09 23:54:18'),
(14, 'Osward', 'Inicio Sesión', '2016-11-10 04:02:00'),
(15, 'Osward', 'Inicio Sesión', '2016-11-10 12:40:20'),
(16, 'Osward', 'Inicio Sesión', '2016-11-11 02:30:08'),
(17, 'Osward', 'Inicio Sesión', '2016-11-11 02:30:09'),
(18, 'Osward', 'Inicio Sesión', '2016-11-11 12:18:58'),
(19, 'Osward', 'Inicio Sesión', '2016-11-11 20:14:37'),
(20, 'Osward', 'Inicio Sesión', '2016-11-11 21:09:48'),
(21, 'Osward', 'Inicio Sesión', '2016-11-12 14:06:06'),
(22, 'Osward', 'Inicio Sesión', '2016-11-12 14:15:35'),
(23, 'Osward', 'Inicio Sesión', '2016-11-12 19:38:41'),
(24, 'Osward', 'Inicio Sesión', '2016-11-12 19:38:43'),
(25, 'Osward', 'Inicio Sesión', '2016-11-12 22:12:39'),
(26, 'Osward', 'Inicio Sesión', '2016-11-13 23:12:55'),
(27, 'Osward', 'Inicio Sesión', '2016-11-13 23:14:22'),
(28, 'Osward', 'Inicio Sesión', '2016-11-13 23:16:16'),
(29, 'Osward', 'Inicio Sesión', '2016-11-14 02:39:39'),
(30, 'Osward', 'Inicio Sesión', '2016-11-18 03:44:49'),
(31, 'Osward', 'Registró un nuevo cliente', '2016-11-18 04:32:42'),
(32, 'Osward', 'Registró un nuevo cliente', '2016-11-18 04:36:35'),
(33, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:41'),
(34, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:43'),
(35, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:45'),
(36, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:47'),
(37, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:49'),
(38, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:51'),
(39, 'Osward', 'Eliminó a un cliente', '2016-11-18 04:42:53'),
(40, 'Osward', 'Actualizó los datos de un cliente', '2016-11-18 05:03:38'),
(41, 'Osward', 'Inició sesión', '2016-11-18 05:13:58'),
(42, 'Osward', 'Creó una nueva categoria', '2016-11-18 05:17:42'),
(43, 'Osward', 'Inició sesión', '2016-11-23 06:55:20'),
(44, 'Osward', 'Inició sesión', '2016-11-25 03:46:48'),
(45, 'Osward', 'Inició sesión', '2016-11-29 01:59:39'),
(46, 'Osward', 'Inició sesión', '2016-11-29 02:09:25'),
(47, 'Osward', 'Registró un nuevo cliente', '2016-11-29 02:20:15'),
(48, 'Osward', 'Registró un nuevo cliente', '2016-11-29 03:20:55'),
(49, 'Osward', 'Realizó una nueva compra', '2016-11-29 04:59:57'),
(50, 'Osward', 'Inició sesión', '2016-11-29 17:01:01'),
(51, 'Osward', 'Inició sesión', '2016-11-30 17:51:31'),
(52, 'Osward', 'Inició sesión', '2016-11-30 18:25:42'),
(53, 'Osward', 'Realizó un presupuesto', '2016-11-30 19:39:35'),
(54, 'Osward', 'Inició sesión', '2016-11-30 22:07:07'),
(55, 'Osward', 'Inició sesión', '2016-12-01 03:59:08'),
(56, 'Osward', 'Inició sesión', '2016-12-01 04:02:16'),
(57, 'Osward', 'Actualizó los datos de un usuario', '2016-12-01 04:17:22'),
(58, 'Osward', 'Registró un nuevo usuario', '2016-12-01 04:25:57'),
(59, 'Osward', 'Registró un nuevo usuario', '2016-12-01 04:26:36'),
(60, 'Osward', 'Eliminó un usuario', '2016-12-01 04:27:45'),
(61, 'Osward', 'Eliminó un usuario', '2016-12-01 04:27:59'),
(62, 'Osward', 'Eliminó un usuario', '2016-12-01 04:30:04'),
(63, 'jhonny', 'Inició sesión', '2016-12-01 04:32:48'),
(64, 'Osward', 'Inició sesión', '2016-12-01 04:39:30'),
(65, 'Osward', 'Inició sesión', '2016-12-01 04:39:56'),
(66, 'Osward', 'Inició sesión', '2016-12-01 04:41:20'),
(67, 'Osward', 'Inició sesión', '2016-12-01 04:42:25'),
(68, 'Osward', 'Registró un nuevo proveedor', '2016-12-01 04:43:55'),
(69, 'Osward', 'Registró un nuevo proveedor', '2016-12-01 04:45:03'),
(70, 'Osward', 'Realizó una nueva compra', '2016-12-01 04:47:16'),
(71, 'Osward', 'Realizó una nueva compra', '2016-12-01 04:50:50'),
(72, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:26'),
(73, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:28'),
(74, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:30'),
(75, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:32'),
(76, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:34'),
(77, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:35'),
(78, 'Osward', 'Eliminó a un cliente', '2016-12-01 05:09:38'),
(79, 'Osward', 'Registró un nuevo proveedor', '2016-12-01 05:16:49'),
(80, 'Osward', 'Registró un nuevo producto', '2016-12-01 05:17:05'),
(81, 'jhonny', 'Inició sesión', '2016-12-01 05:20:05'),
(82, 'Osward', 'Inició sesión', '2016-12-01 05:52:27'),
(83, 'Osward', 'Realizó una nueva compra', '2016-12-01 06:02:27'),
(84, 'Osward', 'Inició sesión', '2016-12-08 13:46:10'),
(85, 'Osward', 'Inició sesión', '2016-12-08 13:47:18'),
(86, 'Osward', 'Eliminó a un cliente', '2016-12-08 13:47:52'),
(87, 'Osward', 'Eliminó a un cliente', '2016-12-08 13:47:57'),
(88, 'Osward', 'Inició sesión', '2016-12-08 14:02:53'),
(89, 'Osward', 'Registró un nuevo proveedor', '2016-12-08 14:04:11'),
(90, 'Osward', 'Realizó una nueva compra', '2016-12-08 14:05:38'),
(91, 'Osward', 'Inició sesión', '2016-12-08 14:07:17'),
(92, 'Osward', 'Realizó un presupuesto', '2016-12-08 14:07:47'),
(93, 'Osward', 'Inició sesión', '2016-12-08 14:26:27'),
(94, 'Osward', 'Actualizó los datos de un producto', '2016-12-08 14:26:36'),
(95, 'Osward', 'Registró un nuevo producto', '2016-12-08 14:29:22'),
(96, 'Osward', 'Inició sesión', '2016-12-08 14:33:36'),
(97, 'Osward', 'Inició sesión', '2016-12-08 14:56:54'),
(98, 'Osward', 'Inició sesión', '2016-12-08 14:56:54'),
(99, 'jhonny', 'Inició sesión', '2016-12-08 15:30:37'),
(100, 'Osward', 'Inició sesión', '2016-12-08 16:06:09'),
(101, 'Osward', 'Inició sesión', '2016-12-08 16:18:37'),
(102, 'Osward', 'Registró un nuevo proveedor', '2016-12-08 16:20:07'),
(103, 'Osward', 'Realizó una nueva compra', '2016-12-08 16:21:56'),
(104, 'Osward', 'Registró un nuevo cliente', '2016-12-08 16:22:59'),
(105, 'Osward', 'Realizó un presupuesto', '2016-12-08 16:25:33'),
(106, 'Osward', 'Actualizó los datos de un cliente', '2016-12-08 16:26:24'),
(107, 'Osward', 'Inició sesión', '2016-12-10 01:14:13'),
(108, 'Osward', 'Inició sesión', '2016-12-10 23:57:48'),
(109, 'Osward', 'Inició sesión', '2016-12-11 00:04:48'),
(110, 'Osward', 'Inició sesión', '2016-12-27 15:21:55'),
(111, 'Osward', 'Inició sesión', '2017-01-02 17:19:30'),
(112, 'Osward', 'Inició sesión', '2017-01-21 00:03:25'),
(113, 'Osward', 'Inició sesión', '2017-01-25 14:45:48'),
(114, 'Osward', 'Inició sesión', '2017-01-27 09:36:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre`, `descripcion`) VALUES
(2, 'Ferretería', '..'),
(3, 'Químicos', 'De todo tipo'),
(4, 'Pinturas', 'pinturas para interiores y exteriores.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `rif` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `rif`, `razon_social`, `telefono`, `email`, `direccion`, `status`) VALUES
(3, 'J-20989357-0', 'Migo, C.A', '0244-3962442', 'ojpr15@gmail.com', 'La Victoria', 'activo'),
(4, 'J-25065787-0', 'Dev services', '0248-3659841', 'admin@gmail.com', 'direccion. ', 'activo'),
(5, 'J-25065787-1', 'a', '0248-3659841', 'admin@gmail.com', 'a', 'inactivo'),
(6, 'J-25065787-2', 'asd', '0248-3659841', 'admin@gmail.com', 'asd', 'inactivo'),
(7, 'J-03842286-0', 'Alicia Vásquez', '0244-4478908', 'Alicia@hotmail.com', 'La Victoria', 'activo'),
(8, 'J-25525110-0', 'Gabriel Flores', '0414-5436789', 'Gf@gmail.com', 'a', 'inactivo'),
(9, 'J-26180853-0', 'Alexis ', '0244-5667894', 'Alexis@gmail.com', 'La Victoria', 'inactivo'),
(10, 'J-25065783-0', 'asd', '0244-2986656', 'asdasd@asd', 'asd', 'inactivo'),
(11, 'J-25065783-0', 'asdasd', '0244-2986656', 'asdasd@asd', 'asdasd', 'inactivo'),
(12, 'J-25065783-0', 'asdsad', '0244-2986656', 'asdasd@asd', 'asdasd', 'inactivo'),
(13, 'J-25065783-0', 'asdsad', '0244-2986656', 'asdasd@asd', 'asdasd', 'inactivo'),
(14, 'J-25065783-0', 'asdsad', '0244-2986656', 'asdasd@asd', 'asdasd', 'inactivo'),
(15, 'J-25065789-0', 'jhonny', '0244-2986656', 'asdasd@asd', 'asdsa', 'inactivo'),
(16, 'J-25065789-0', 'asd', '0244-2986656', 'asdasd@asd', 'asdsa', 'inactivo'),
(17, 'J-25065758-1', 'asd', '0244-2986656', 'asdasd@asd', 'asd', 'inactivo'),
(18, 'J-25658963-0', 'asd', '0244-2986656', 'asdasd@asd', 'aasd', 'inactivo'),
(19, 'J-25658963-0', 'asd', '0244-2986656', 'asdasd@asd', 'aasd', 'inactivo'),
(20, 'J-25658963-0', 'asd', '0244-2986656', 'asdasd@asd', 'aasd', 'inactivo'),
(21, 'J-25065758-4', 'asd', '0244-2986656', 'asdasd@asd', 'asd', 'inactivo'),
(22, 'J-25065783-0', '23', '0244-2986656', 'jhonnyjosearana@gmail.com', 'a', 'inactivo'),
(23, 'J-25065783-5', 'asd', '0244-2986656', 'asdasd@asd', 'a', 'inactivo'),
(24, 'J-10457682-0', 'Ferreteria San Pedro C.A', '0244-3963571', 'ad@sdgd.com', 'Cagua', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `cod_compra` int(15) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_emp` int(10) NOT NULL,
  `fecha_actual` date NOT NULL,
  `forma_pago` enum('efectivo','deposito / transferencia','credito','') COLLATE utf8_spanish_ci NOT NULL,
  `banco` text COLLATE utf8_spanish_ci NOT NULL,
  `nro_cuenta` int(30) NOT NULL,
  `nro_comprobante` int(30) NOT NULL,
  `impuesto` int(10) NOT NULL,
  `subtot` int(10) NOT NULL,
  `tot` int(10) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`cod_compra`, `id_prov`, `id_emp`, `fecha_actual`, `forma_pago`, `banco`, `nro_cuenta`, `nro_comprobante`, `impuesto`, `subtot`, `tot`, `status`) VALUES
(1, 29, 1, '2016-12-01', 'efectivo', '', 0, 0, 750000, 6250000, 7000000, 'activo'),
(2, 29, 1, '2016-12-01', 'deposito / transferencia', 'Banco de Venezuela', 108, 2501637, 510000, 4250000, 4760000, 'activo'),
(3, 29, 1, '2016-12-01', '', '', 0, 0, 3600, 30000, 33600, 'activo'),
(4, 31, 1, '2016-12-08', 'efectivo', '', 0, 0, 6300, 52500, 58800, 'activo'),
(5, 32, 1, '2016-12-08', 'deposito / transferencia', 'Banco de Venezuela', 2147483647, 98324, 62748, 522900, 585648, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_compra`
--

CREATE TABLE `det_compra` (
  `cod_compra` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `det_compra`
--

INSERT INTO `det_compra` (`cod_compra`, `cod_prod`, `cantidad`, `precio`) VALUES
(1, 'CER025', 2500, 2500),
(2, 'CER025', 500, 2500),
(2, 'CORRTEF002', 1000, 3000),
(3, 'CER025', 12, 2500),
(4, 'CER025', 21, 2500),
(5, 'PIEGRIS005', 50, 458),
(5, 'CER025', 200, 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_presu`
--

CREATE TABLE `det_presu` (
  `cod_presu` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `det_presu`
--

INSERT INTO `det_presu` (`cod_presu`, `cod_prod`, `cantidad`, `precio`) VALUES
(1, '0001', 5, 1000),
(2, '0001', 10, 1000),
(3, 'CORRTEF002', 12, 3120),
(3, 'HIERR4421', 23, 2679),
(5, 'CER025', 100, 2500),
(7, 'PIEGRIS005', 20, 458),
(7, 'CORRTEF002', 10, 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_venta`
--

CREATE TABLE `det_venta` (
  `cod_venta` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `det_venta`
--

INSERT INTO `det_venta` (`cod_venta`, `cod_prod`, `cantidad`, `precio`) VALUES
(1, '0001', 5, 1000),
(2, '0001', 5, 1000),
(3, '0001', 10, 1000),
(4, '0001', 5, 1000),
(5, '0001', 5, 1000),
(6, '0001', 5, 1000),
(7, '0001', 5, 1000),
(8, '0001', 5, 1000),
(9, '0001', 5, 1000),
(10, '0001', 5, 1000),
(11, '0001', 5, 1000),
(12, '0001', 5, 1000),
(13, '0001', 23, 1000),
(14, '0001', 12, 1000),
(15, 'PIEGRIS005', 500, 458),
(15, 'CORRTEF002', 1100, 3120),
(16, 'CER025', 3000, 2500),
(18, 'HIERR4421', 1200, 2679),
(20, 'PIEGRIS005', 2500, 458),
(20, 'CER025', 200, 2500),
(22, 'RAMHAIER005', 50, 192);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `ci_usuario` int(10) NOT NULL,
  `primer_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('Administrador','empleado','','') COLLATE utf8_spanish_ci NOT NULL,
  `pregunta` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_emp`, `ci_usuario`, `primer_nombre`, `primer_apellido`, `username`, `password`, `rol`, `pregunta`, `respuesta`, `status`) VALUES
(1, 20989357, 'Osward', 'Jr', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'Nombre de su abuela', 'margarita', 'activo'),
(2, 25065787, 'jhonny', 'arana', 'arana', '21232f297a57a5a743894a0e4a801fc3', 'empleado', 'Lugar de nacimiento de la madre', 'cagua', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `cod_presu` int(15) NOT NULL,
  `id_cliente` int(15) NOT NULL,
  `id_emp` int(15) NOT NULL,
  `fecha_actual` date NOT NULL,
  `fecha_vencimiento` enum('5 Días','','','') COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `subtot` int(15) NOT NULL,
  `tot` int(15) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`cod_presu`, `id_cliente`, `id_emp`, `fecha_actual`, `fecha_vencimiento`, `impuesto`, `descuento`, `subtot`, `tot`, `status`) VALUES
(1, 3, 1, '2016-11-08', '', 600, 0, 5000, 5600, 'activo'),
(2, 4, 1, '2016-11-08', '5 Días', 1200, 0, 10000, 11200, 'activo'),
(3, 3, 1, '2016-11-30', '5 Días', 11887, 0, 99057, 110944, 'activo'),
(5, 3, 1, '2016-12-08', '5 Días', 30000, 0, 250000, 280000, 'activo'),
(7, 24, 1, '2016-12-08', '5 Días', 4699, 0, 39160, 43859, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `peso` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `garantia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `p_compra` int(10) NOT NULL,
  `p_venta` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `stock_minimo` int(10) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL,
  `procedencia` enum('nacional','internacional') COLLATE utf8_spanish_ci NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_prod`, `descripcion`, `modelo`, `peso`, `color`, `garantia`, `p_compra`, `p_venta`, `stock`, `stock_minimo`, `status`, `procedencia`, `id_cat`) VALUES
('0001', 'Tornillos', '.', '', '', '', 5000, 1000, 1050, 100, 'inactivo', 'nacional', 2),
('CER025', 'Cerraduras CISA', 'Embutir 25mm', '', '', '', 2500, 2500, 33, 100, 'activo', 'nacional', 2),
('cod034', 'codo angular', '3 1/2 pulgadas', 'no aplica', 'no aplica', '1 mes', 2500, 3000, 500, 100, 'activo', 'nacional', 2),
('CORRTEF002', 'Corredera Telescópica ', 'Ferrari 30cm', '', '', '', 3000, 3120, 1100, 100, 'activo', 'nacional', 2),
('HIERR4421', 'Herramientas Multiuso', 'Premiun', '5kg', 'Negro', '6 meses', 2679, 2679, 0, 100, 'activo', 'nacional', 2),
('PIEGRIS005', 'Pie de amigo gris', '12x14', '', '', '', 458, 458, 50, 100, 'activo', 'internacional', 2),
('RAMHAIER005', 'Ramplus de hierro', 'Inct 0.5pulg', '', '', '', 192, 192, 950, 100, 'activo', 'internacional', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_prov` int(11) NOT NULL,
  `rif` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `rif`, `razon_social`, `telefono`, `email`, `direccion`, `status`) VALUES
(29, 'J-25068787-0', 'jhonny arana', '0244-2986656', 'jhonnyjosearana@gmail.com', 'cagua', 'activo'),
(31, 'J-20989268-7', 'Ferretotal la villa.', '0244-3967845', 'Ferretotal@hotmail.com', 'villa de cura calle dr manzo numero 43, al lado del banco banesco.', 'activo'),
(32, 'J-10759226-0', 'Ferreteria Fayad', '0244-3962442', 'ejemplo@gmail.com', 'dvgsdfgsd', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utilidades`
--

CREATE TABLE `utilidades` (
  `impuesto` int(4) NOT NULL,
  `ven_presu` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `utilidades`
--

INSERT INTO `utilidades` (`impuesto`, `ven_presu`) VALUES
(12, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `cod_venta` int(15) NOT NULL,
  `id_cliente` int(15) NOT NULL,
  `id_emp` int(15) NOT NULL,
  `fecha_actual` date NOT NULL,
  `forma_pago` enum('efectivo','deposito / transferencia','credito','') COLLATE utf8_spanish_ci NOT NULL,
  `banco` text COLLATE utf8_spanish_ci NOT NULL,
  `nro_cuenta` int(30) NOT NULL,
  `nro_comprobante` int(30) NOT NULL,
  `impuesto` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `subtot` int(15) NOT NULL,
  `tot` int(15) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`cod_venta`, `id_cliente`, `id_emp`, `fecha_actual`, `forma_pago`, `banco`, `nro_cuenta`, `nro_comprobante`, `impuesto`, `descuento`, `subtot`, `tot`, `status`) VALUES
(1, 3, 1, '2016-10-27', '', '', 0, 0, 600, 0, 5000, 5600, 'activo'),
(2, 3, 1, '2016-10-27', '', 'BNC', 2147483647, 6565456, 600, 0, 5000, 5600, 'activo'),
(3, 3, 1, '2016-10-27', '', 'BFC', 2147483647, 77396137, 1200, 0, 10000, 11200, 'activo'),
(4, 3, 1, '2016-10-27', '', '', 0, 0, 600, 0, 5000, 5600, 'activo'),
(5, 3, 1, '2016-10-27', '', 'BNC', 2147483647, 423434343, 600, 0, 5000, 5600, 'activo'),
(6, 3, 1, '2016-10-27', '', 'BFC', 2147483647, 253452, 600, 0, 5000, 5600, 'activo'),
(7, 3, 1, '2016-10-27', '', 'CARONI', 2147483647, 423323233, 600, 0, 5000, 5600, 'activo'),
(8, 3, 1, '2016-10-28', 'efectivo', '', 0, 0, 600, 0, 5000, 5600, 'activo'),
(9, 3, 1, '2016-10-28', 'deposito / transferencia', 'BFC C.A', 2147483647, 2147483647, 600, 0, 5000, 5600, 'activo'),
(10, 3, 1, '2016-10-28', 'credito', '', 0, 0, 600, 0, 5000, 5600, 'activo'),
(11, 3, 1, '2016-10-28', 'efectivo', '', 0, 0, 600, 0, 5000, 5600, 'activo'),
(12, 3, 1, '2016-10-28', 'deposito / transferencia', 'bfc', 2147483647, 2147483647, 600, 0, 5000, 5600, 'activo'),
(13, 3, 1, '2016-11-08', 'deposito / transferencia', 'Banco Canarias de Venezuela', 0, 0, 2760, 207000, 23000, 232760, 'activo'),
(14, 3, 1, '2016-11-08', 'deposito / transferencia', 'Banco de Venezuela', 34343434, 343434, 1440, 108000, 12000, 121440, 'activo'),
(15, 3, 1, '2016-11-08', 'deposito / transferencia', 'Banco de Venezuela', 2147483647, 707876, 439320, 43932000, 3661000, 48032320, 'activo'),
(16, 3, 1, '2016-12-01', 'efectivo', '', 0, 0, 900000, 90000000, 7500000, 98400000, 'activo'),
(18, 8, 1, '2016-12-08', 'efectivo', 'Banco de Venezuela', 0, 0, 385776, 0, 3214800, 3600576, 'activo'),
(20, 24, 1, '2016-12-08', 'efectivo', '', 0, 0, 197400, 0, 1645000, 1842400, 'activo'),
(22, 9, 1, '2017-01-02', 'efectivo', '', 0, 0, 1152, 0, 9600, 10752, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id_banco`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `id_proveedor` (`id_prov`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indices de la tabla `det_compra`
--
ALTER TABLE `det_compra`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_compra` (`cod_compra`);

--
-- Indices de la tabla `det_presu`
--
ALTER TABLE `det_presu`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_presu` (`cod_presu`);

--
-- Indices de la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_venta` (`cod_venta`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`cod_presu`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`),
  ADD UNIQUE KEY `rif` (`rif`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`cod_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_emp` (`id_emp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id_banco` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

--
-- Filtros para la tabla `det_compra`
--
ALTER TABLE `det_compra`
  ADD CONSTRAINT `det_compra_ibfk_1` FOREIGN KEY (`cod_compra`) REFERENCES `compras` (`cod_compra`),
  ADD CONSTRAINT `det_compra_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Filtros para la tabla `det_presu`
--
ALTER TABLE `det_presu`
  ADD CONSTRAINT `det_presu_ibfk_1` FOREIGN KEY (`cod_presu`) REFERENCES `presupuestos` (`cod_presu`),
  ADD CONSTRAINT `det_presu_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Filtros para la tabla `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`cod_venta`) REFERENCES `ventas` (`cod_venta`),
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Filtros para la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuestos_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`),
  ADD CONSTRAINT `presupuestos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
