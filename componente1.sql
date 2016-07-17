-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2016 at 06:15 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `componente`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_cat`, `nombre`, `descripcion`) VALUES
(1, 'Ferreteria', 'Articulos de ferreteria en general');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
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
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `rif`, `razon_social`, `telefono`, `email`, `direccion`, `status`) VALUES
(2, 'j-25065787-0', 'Distribuidora Ferretotal', '02443926896', 'jhonny@mail.com', 'villa de cura, avenida bolivar, sector centro, nro 48', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `cod_compra` int(15) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `id_emp` int(10) NOT NULL,
  `fecha_actual` date NOT NULL,
  `forma_pago` enum('efectivo','transferencia','deposito','credito') COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` int(10) NOT NULL,
  `subtot` int(10) NOT NULL,
  `tot` int(10) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`cod_compra`, `id_prov`, `id_emp`, `fecha_actual`, `forma_pago`, `impuesto`, `subtot`, `tot`, `status`) VALUES
(0, 24, 1, '2016-06-08', 'efectivo', 441, 4141, 141, 'activo'),
(1, 24, 1, '2016-06-27', 'transferencia', 30, 250, 280, 'activo'),
(2, 24, 1, '2016-06-27', 'deposito', 138200, 1151670, 1289870, 'activo'),
(3, 24, 1, '2016-06-27', 'efectivo', 9858, 82150, 92008, 'activo'),
(4, 24, 1, '2016-06-27', 'transferencia', 4320, 36000, 40320, 'activo'),
(5, 24, 1, '2016-06-27', 'transferencia', 4320, 36000, 40320, 'activo'),
(6, 24, 1, '2016-06-27', 'efectivo', 2400, 20000, 22400, 'activo'),
(7, 24, 1, '2016-06-27', 'transferencia', 119760, 998001, 1117761, 'activo'),
(8, 24, 1, '2016-06-28', 'efectivo', 84000, 700000, 784000, 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `det_compra`
--

CREATE TABLE `det_compra` (
  `cod_compra` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `det_compra`
--

INSERT INTO `det_compra` (`cod_compra`, `cod_prod`, `cantidad`, `precio`) VALUES
(1, '1', 15, 1),
(1, '213', 15, 1),
(1, '200', 15, 1),
(1, '23', 15, 23),
(1, '2112', 12, 2),
(1, 'ANGCANT006', 10, 10),
(1, 'ANGCANT006', 1, 250),
(2, 'ALDP000001', 123, 290),
(2, 'ALDP000001', 123, 290),
(2, 'ALDP000001', 123, 290),
(2, 'ALDP000001', 123, 290),
(2, 'ANGCANT006', 456, 250),
(2, 'ALAMB00001', 334, 3000),
(3, 'ALAMB00001', 15, 3000),
(3, 'ALDP000001', 85, 290),
(3, 'ANGCANT006', 50, 250),
(3, 'ALAMB00001', 15, 3000),
(3, 'ALDP000001', 85, 290),
(3, 'ANGCANT006', 50, 250),
(4, 'ALAMB00001', 12, 3000),
(4, 'ALAMB00001', 12, 3000),
(5, 'ALAMB00001', 12, 0),
(5, 'ALDP000001', 12, 1500),
(5, 'ANGCANT006', 12, 1500),
(6, 'ALAMB00001', 10, 2000),
(6, 'ALAMB00001', 10, 2000),
(6, 'ALAMB00001', 10, 2000),
(6, 'ALAMB00001', 10, 2000),
(6, 'ALAMB00001', 10, 2000),
(7, 'ANGCANT006', 999, 999),
(7, 'ANGCANT006', 999, 999),
(8, 'ALAMB00001', 100, 2500),
(8, 'ALDP000001', 150, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `det_presu`
--

CREATE TABLE `det_presu` (
  `cod_presu` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `det_venta`
--

CREATE TABLE `det_venta` (
  `cod_venta` int(15) NOT NULL,
  `cod_prod` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `ci_usuario` int(10) NOT NULL,
  `primer_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` enum('Administrador','empleado','','') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id_emp`, `ci_usuario`, `primer_nombre`, `primer_apellido`, `username`, `password`, `rol`) VALUES
(1, 25065787, 'Jhonny', 'Arana', 'jhonny', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `presupuestos`
--

CREATE TABLE `presupuestos` (
  `cod_presu` int(15) NOT NULL,
  `id_cliente` int(15) NOT NULL,
  `id_emp` int(15) NOT NULL,
  `fecha_actual` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `impuesto` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `subtot` int(15) NOT NULL,
  `tot` int(15) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
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
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`cod_prod`, `descripcion`, `modelo`, `peso`, `color`, `garantia`, `p_compra`, `p_venta`, `stock`, `stock_minimo`, `status`, `procedencia`, `id_cat`) VALUES
('ALAMB00001', 'ALAMBRE GALVANIZADO', NULL, '50 KG', NULL, NULL, 2500, 0, 152, 10, 'activo', 'nacional', 1),
('ALDP000001', 'ALDABA PORTACANDADO', '38MM 1 1/2"', NULL, NULL, NULL, 3000, 0, 162, 15, 'activo', 'nacional', 1),
('ANGCANT006', 'ANGULO CANTO', '4" X 4" IMP', NULL, NULL, NULL, 999, 0, 1011, 50, 'activo', 'nacional', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
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
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id_prov`, `rif`, `razon_social`, `telefono`, `email`, `direccion`, `status`) VALUES
(24, '25065787', 'asdasd', '2', 'a@g.cailc.omasad', 'a', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `cod_venta` int(15) NOT NULL,
  `id_cliente` int(15) NOT NULL,
  `id_emp` int(15) NOT NULL,
  `fecha_actual` date NOT NULL,
  `forma_pago` enum('efectivo','transferencia','deposito','credito') COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` int(15) NOT NULL,
  `descuento` int(15) NOT NULL,
  `subtot` int(15) NOT NULL,
  `tot` int(15) NOT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `id_proveedor` (`id_prov`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indexes for table `det_compra`
--
ALTER TABLE `det_compra`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_compra` (`cod_compra`);

--
-- Indexes for table `det_presu`
--
ALTER TABLE `det_presu`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_presu` (`cod_presu`);

--
-- Indexes for table `det_venta`
--
ALTER TABLE `det_venta`
  ADD KEY `cod_prod` (`cod_prod`),
  ADD KEY `cod_venta` (`cod_venta`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`cod_presu`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_prod`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_prov`),
  ADD UNIQUE KEY `rif` (`rif`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`cod_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_emp` (`id_emp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

--
-- Constraints for table `det_compra`
--
ALTER TABLE `det_compra`
  ADD CONSTRAINT `compra_producto_ibfk_1` FOREIGN KEY (`cod_compra`) REFERENCES `compras` (`cod_compra`),
  ADD CONSTRAINT `compra_producto_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `det_presu`
--
ALTER TABLE `det_presu`
  ADD CONSTRAINT `presupuesto_producto_ibfk_1` FOREIGN KEY (`cod_presu`) REFERENCES `presupuestos` (`cod_presu`),
  ADD CONSTRAINT `presupuesto_producto_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`cod_venta`) REFERENCES `ventas` (`cod_venta`),
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuesto_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`),
  ADD CONSTRAINT `presupuesto_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
