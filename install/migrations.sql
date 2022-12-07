-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:26 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `modelos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesorios`
--

INSERT INTO `accesorios` (`id`, `tipo`, `modelos`) VALUES
(1, 'Funda anti-shock', '7/8'),
(2, 'Funda anti-shock', '7/8 PLUS'),
(3, 'Funda anti-shock', 'X/XS'),
(4, 'Funda anti-shock', 'XS MAX'),
(5, 'Funda anti-shock', 'XR'),
(6, 'Funda anti-shock', '11'),
(7, 'Funda anti-shock', '11 PRO'),
(8, 'Funda anti-shock', '11 PRO MAX'),
(9, 'Funda anti-shock', '12/12 PRO'),
(10, 'Funda anti-shock', '12 PRO MAX'),
(11, 'Funda anti-shock', '13'),
(12, 'Funda anti-shock', '13 PRO'),
(13, 'Funda anti-shock', '13 PRO MAX'),
(14, 'Funda anti-shock', '14'),
(15, 'Funda anti-shock', '14 PRO'),
(16, 'Funda anti-shock', '14 PRO MAX'),
(17, 'Silicone Case', '7/8'),
(18, 'Silicone Case', '7/8 PLUS'),
(19, 'Silicone Case', 'X/XS'),
(20, 'Silicone Case', 'XS MAX'),
(21, 'Silicone Case', 'XR'),
(22, 'Silicone Case', '11'),
(23, 'Silicone Case', '11 PRO'),
(24, 'Silicone Case', '11 PRO MAX'),
(25, 'Silicone Case', '12/12 PRO'),
(26, 'Silicone Case', '12 PRO MAX'),
(27, 'Silicone Case', '13'),
(28, 'Silicone Case', '13 PRO'),
(29, 'Silicone Case', '13 PRO MAX'),
(30, 'Puffer Case', '7/8'),
(31, 'Puffer Case', '7/8 PLUS'),
(32, 'Puffer Case', 'XS MAX'),
(33, 'Puffer Case', 'X/XS'),
(34, 'Puffer Case', 'XR'),
(35, 'Puffer Case', '11 '),
(36, 'Puffer Case', '11 PRO'),
(37, 'Puffer Case', '11 PRO MAX'),
(38, 'Puffer Case', '12/12 PRO'),
(39, 'Puffer Case', '12 PRO MAX'),
(40, 'Puffer Case', '13 '),
(41, 'Puffer Case', '13 PRO'),
(42, 'Puffer Case', '13 PRO MAX'),
(43, 'Puffer Case', '14'),
(44, 'Puffer Case', '14 PRO'),
(45, 'Puffer Case', '14 PRO MAX'),
(46, 'Vidrio 9D', '7/8'),
(47, 'Vidrio 9D', '7/8 PLUS'),
(48, 'Vidrio 9D', 'X/XS/11 PRO'),
(49, 'Vidrio 9D', 'XS MAX/11 PRO MAX'),
(50, 'Vidrio 9D', 'XR/11'),
(51, 'Vidrio 9D', '12/12 PRO'),
(52, 'Vidrio 9D', '12 PRO MAX'),
(53, 'Vidrio 9D', '13/13 PRO'),
(54, 'Vidrio 9D', '13 PRO MAX'),
(55, 'Fuente 5W', NULL),
(56, 'Fuente 20W', NULL),
(57, 'Cable 1M', NULL),
(58, 'Cable tipo C', NULL),
(59, 'Airpods', NULL),
(60, 'Airtag', NULL),
(61, 'Funda Magsafe', '13'),
(62, 'Funda Magsafe', '13 PRO'),
(63, 'Funda Magsafe', '13 PRO MAX'),
(64, 'Glass Camara', '11'),
(65, 'Glass Camara', '11 Pro'),
(66, 'Glass Camara', '12'),
(67, 'Glass Camara', '13'),
(68, 'Glass Camara', '13 PRO'),
(69, 'Glass Camara', '13 PRO MAX');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `suma` float DEFAULT NULL,
  `resta` float DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `n_comisionista` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `telefono`, `ciudad`, `n_comisionista`) VALUES
(6, 'Pepito', '', '', ''),
(7, 'Josesito', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `gastos_fijos`
--

CREATE TABLE `gastos_fijos` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` float NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `fecha_vencimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gastos_fijos`
--

INSERT INTO `gastos_fijos` (`id`, `concepto`, `monto`, `fecha_pago`, `fecha_vencimiento`) VALUES
(26, 'Seguro', 350, '0000-00-00 00:00:00', '2022-12-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gastos_variables`
--

CREATE TABLE `gastos_variables` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` float NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `fecha_vencimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_sale` tinyint(1) DEFAULT NULL,
  `is_canje` tinyint(1) DEFAULT NULL,
  `product` int(11) NOT NULL,
  `seller` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_vencimiento` datetime DEFAULT NULL,
  `por_pagar_a_proveedores` tinyint(1) DEFAULT NULL,
  `por_cobrar` tinyint(1) DEFAULT NULL,
  `monto` float NOT NULL,
  `proveedor` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `from_module` varchar(255) NOT NULL,
  `pagado_cobrado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `concepto`, `creado`, `fecha_vencimiento`, `por_pagar_a_proveedores`, `por_cobrar`, `monto`, `proveedor`, `cliente`, `from_module`, `pagado_cobrado`) VALUES
(18, 'Seguro', '2022-12-06 22:58:32', '2022-12-09 00:00:00', 1, 0, 300, NULL, NULL, 'gastos_fijos', 1),
(19, 'Variable 1', '2022-12-07 01:13:16', '2022-12-07 00:00:00', 1, 0, 324, NULL, NULL, 'gastos_variables', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stock_accesorios`
--

CREATE TABLE `stock_accesorios` (
  `id` int(11) NOT NULL,
  `id_accesorio` int(11) NOT NULL,
  `costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `vendido` tinyint(1) NOT NULL,
  `fecha_venta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_accesorios`
--

INSERT INTO `stock_accesorios` (`id`, `id_accesorio`, `costo`, `precio_venta`, `vendido`, `fecha_venta`) VALUES
(7, 2, 200, 300, 1, '2022-12-06 21:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `stock_telefonos`
--

CREATE TABLE `stock_telefonos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `imei` int(11) DEFAULT NULL,
  `bateria` int(11) DEFAULT NULL,
  `capacidad` varchar(255) NOT NULL,
  `precio_lista` float NOT NULL,
  `precio_mayorista` float NOT NULL,
  `precio_venta` float NOT NULL,
  `costo` float NOT NULL,
  `producto_sellado` tinyint(4) NOT NULL,
  `plan_canje` tinyint(1) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `vendido` tinyint(1) NOT NULL,
  `fecha_venta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nombre`, `telefono`) VALUES
(5, 'Proovedor 1', ''),
(24, 'Proveedor2', 'cuenta corriente');

-- --------------------------------------------------------

--
-- Table structure for table `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telefonos`
--

INSERT INTO `telefonos` (`id`, `nombre`, `modelo`, `color`) VALUES
(1, 'iPhone', '8', 'Silver'),
(2, 'iPhone', '8', 'Space Grey'),
(3, 'iPhone', '8', 'Gold'),
(4, 'iPhone', '8 Plus', 'Silver'),
(5, 'iPhone', '8 Plus', 'Space Grey'),
(6, 'iPhone', '8 Plus', 'Gold'),
(7, 'iPhone', '8 Plus', 'Product Red'),
(8, 'iPhone', 'X', 'Silver'),
(9, 'iPhone', 'X', 'Space Grey'),
(10, 'iPhone', 'XR', 'Product Red'),
(11, 'iPhone', 'XR', 'Yellow'),
(12, 'iPhone', 'XR', 'White'),
(13, 'iPhone', 'XR', 'Coral'),
(14, 'iPhone', 'XR', 'Black'),
(15, 'iPhone', 'XR', 'Blue'),
(16, 'iPhone', 'XS', 'Silver'),
(17, 'iPhone', 'XS', 'Space Grey'),
(18, 'iPhone', 'XS', 'Gold'),
(19, 'iPhone', 'XS Max', 'Gold'),
(20, 'iPhone', 'XS Max', 'Silver'),
(21, 'iPhone', 'XS Max', 'Space Grey'),
(22, 'iPhone', '11', 'Purple'),
(23, 'iPhone', '11', 'Green'),
(24, 'iPhone', '11', 'White'),
(25, 'iPhone', '11', 'Black'),
(26, 'iPhone', '11', 'Yellow'),
(27, 'iPhone', '11', 'Product Red'),
(28, 'iPhone', '11 Pro', 'Silver'),
(29, 'iPhone', '11 Pro', 'Space Grey'),
(30, 'iPhone', '11 Pro', 'Gold'),
(31, 'iPhone', '11 Pro', 'Midnight Green'),
(32, 'iPhone', '11 Pro Max', 'Silver'),
(33, 'iPhone', '11 Pro Max', 'Space Grey'),
(34, 'iPhone', '11 Pro Max', 'Gold'),
(35, 'iPhone', '11 Pro Max', 'Midnight Green'),
(36, 'iPhone', '12', 'Black'),
(37, 'iPhone', '12', 'White'),
(38, 'iPhone', '12', 'Blue'),
(39, 'iPhone', '12', 'Green'),
(40, 'iPhone', '12', 'Product Red'),
(41, 'iPhone', '12', 'Purple'),
(42, 'iPhone', '12 Mini', 'Black'),
(43, 'iPhone', '12 Mini', 'White'),
(44, 'iPhone', '12 Mini', 'Blue'),
(45, 'iPhone', '12 Mini', 'Green'),
(46, 'iPhone', '12 Mini', 'Product Red'),
(47, 'iPhone', '12 Mini', 'Purple'),
(48, 'iPhone', '12 Pro', 'Gold'),
(49, 'iPhone', '12 Pro', 'Pacific Blue'),
(50, 'iPhone', '12 Pro', 'Silver'),
(51, 'iPhone', '12 Pro', 'Graphite'),
(52, 'iPhone', '12 Pro Max', 'Gold'),
(53, 'iPhone', '12 Pro Max', 'Pacific Blue'),
(54, 'iPhone', '12 Pro Max', 'Silver'),
(55, 'iPhone', '12 Pro Max', 'Graphite'),
(56, 'iPhone', '13', 'Pink'),
(57, 'iPhone', '13', 'Blue'),
(58, 'iPhone', '13', 'Midnight'),
(59, 'iPhone', '13', 'Starlight'),
(60, 'iPhone', '13', 'Product Red'),
(61, 'iPhone', '13 Mini', 'Pink'),
(62, 'iPhone', '13 Mini', 'Blue'),
(63, 'iPhone', '13 Mini', 'Midnight'),
(64, 'iPhone', '13 Mini', 'Starlight'),
(65, 'iPhone', '13 Mini', 'Product Red'),
(66, 'iPhone', '13 Pro', 'Graphite'),
(67, 'iPhone', '13 Pro', 'Gold'),
(68, 'iPhone', '13 Pro', 'Sierra Blue'),
(69, 'iPhone', '13 Pro', 'Silver'),
(70, 'iPhone', '13 Pro Max', 'Graphite'),
(71, 'iPhone', '13 Pro Max', 'Gold'),
(72, 'iPhone', '13 Pro Max', 'Sierra Blue'),
(73, 'iPhone', '13 Pro Max', 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `uid`) VALUES
(1, 'facuquero@gmail.com', 'Facu Quero', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ventas_accesorios`
--

CREATE TABLE `ventas_accesorios` (
  `id` int(11) NOT NULL,
  `id_accesorio_stock_vendido` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `valor_cobrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ventas_accesorios`
--

INSERT INTO `ventas_accesorios` (`id`, `id_accesorio_stock_vendido`, `id_vendedor`, `valor_cobrado`) VALUES
(10, 7, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_plan_canje`
--

CREATE TABLE `ventas_plan_canje` (
  `id` int(255) NOT NULL,
  `id_stock_vendido` int(255) NOT NULL,
  `id_stock_recibido` int(255) NOT NULL,
  `id_client` int(255) NOT NULL,
  `id_vendedor` int(255) NOT NULL,
  `valor_cobrado` float NOT NULL,
  `pago_en_efectivo` float NOT NULL,
  `pago_en_CC` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos_variables`
--
ALTER TABLE `gastos_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `seller` (`seller`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_accesorios`
--
ALTER TABLE `stock_accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas_accesorios`
--
ALTER TABLE `ventas_accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas_plan_canje`
--
ALTER TABLE `ventas_plan_canje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `gastos_variables`
--
ALTER TABLE `gastos_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `stock_accesorios`
--
ALTER TABLE `stock_accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventas_accesorios`
--
ALTER TABLE `ventas_accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ventas_plan_canje`
--
ALTER TABLE `ventas_plan_canje`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `product` FOREIGN KEY (`product`) REFERENCES `telefonos` (`id`),
  ADD CONSTRAINT `seller` FOREIGN KEY (`seller`) REFERENCES `users` (`id`);

--
-- Constraints for table `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `telefonos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
