-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2016 at 10:58 AM
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
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_prov`) REFERENCES `proveedores` (`id_prov`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

--
-- Constraints for table `det_compra`
--
ALTER TABLE `det_compra`
  ADD CONSTRAINT `det_compra_ibfk_1` FOREIGN KEY (`cod_compra`) REFERENCES `compras` (`cod_compra`),
  ADD CONSTRAINT `det_compra_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `det_presu`
--
ALTER TABLE `det_presu`
  ADD CONSTRAINT `det_presu_ibfk_1` FOREIGN KEY (`cod_presu`) REFERENCES `presupuestos` (`cod_presu`),
  ADD CONSTRAINT `det_presu_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `det_venta`
--
ALTER TABLE `det_venta`
  ADD CONSTRAINT `det_venta_ibfk_1` FOREIGN KEY (`cod_venta`) REFERENCES `ventas` (`cod_venta`),
  ADD CONSTRAINT `det_venta_ibfk_2` FOREIGN KEY (`cod_prod`) REFERENCES `productos` (`cod_prod`);

--
-- Constraints for table `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuestos_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`),
  ADD CONSTRAINT `presupuestos_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_emp`) REFERENCES `empleados` (`id_emp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
