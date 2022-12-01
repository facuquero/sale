-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2022 a las 01:42:51
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project_sale`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `modelos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id`, `tipo`, `modelos`) VALUES
(1, 'Funda anti-shock  ', '7/8'),
(3, 'Funda anti-shock  ', '7/8 PLUS'),
(4, 'Funda anti-shock  ', 'X/XS'),
(5, 'Funda anti-shock  ', 'XS MAX'),
(6, 'Silicone Case', '7/8'),
(7, 'Silicone Case', '7/8 PLUS'),
(8, 'Silicone Case', 'X/XS'),
(9, 'Silicone Case', 'XS MAX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `suma` float DEFAULT NULL,
  `resta` float DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `n_comisionista` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `telefono`, `ciudad`, `n_comisionista`) VALUES
(6, 'Pepito', '', '', ''),
(7, 'a', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_fijos`
--

CREATE TABLE `gastos_fijos` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` float NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `fecha_vencimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos_fijos`
--

INSERT INTO `gastos_fijos` (`id`, `concepto`, `monto`, `fecha_pago`, `fecha_vencimiento`) VALUES
(12, 'Mutual', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Alquiler departamento', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Expensas departamento', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Agua departamento', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Wi fi departamento', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Luz departamento', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Alquiler oficina', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Expensas oficina', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Agua oficina', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Luz oficina', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Jano', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Otro', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos_variables`
--

CREATE TABLE `gastos_variables` (
  `id` int(11) NOT NULL,
  `concepto` varchar(255) NOT NULL,
  `monto` float NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `fecha_vencimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gastos_variables`
--

INSERT INTO `gastos_variables` (`id`, `concepto`, `monto`, `fecha_pago`, `fecha_vencimiento`) VALUES
(5, 'Variable 2', 563.65, '0000-00-00 00:00:00', '2022-11-19 00:00:00'),
(6, 'Variable ', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '3', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '5', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'd', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'a', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
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
-- Estructura de tabla para la tabla `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `creado` datetime NOT NULL DEFAULT current_timestamp(),
  `por_pagar_a_proveedores` tinyint(1) NOT NULL DEFAULT current_timestamp(),
  `por_cobrar` tinyint(1) NOT NULL,
  `monto` float NOT NULL,
  `proveedor` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_telefonos`
--

CREATE TABLE `stock_telefonos` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `imei` int(11) DEFAULT NULL,
  `bateria` int(11) DEFAULT NULL,
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

--
-- Volcado de datos para la tabla `stock_telefonos`
--

INSERT INTO `stock_telefonos` (`id`, `product_id`, `imei`, `bateria`, `precio_lista`, `precio_mayorista`, `precio_venta`, `costo`, `producto_sellado`, `plan_canje`, `fecha_ingreso`, `vendido`, `fecha_venta`) VALUES
(1, 2, 123, 12, 123123, 123123, 1212, 123123, 1, 0, '2022-11-21 00:00:00', 0, NULL),
(2, 2, 121111111, 12, 1, 1, 1, 1, 0, 0, '2022-11-24 00:00:00', 0, NULL),
(3, 3, 1111, 111, 111, 111, 111, 111, 1, 0, '2022-11-16 00:00:00', 0, NULL),
(4, 3, 1111, 111, 111, 111, 111, 111, 1, 0, '2022-11-16 00:00:00', 0, NULL),
(5, 2, 2147483647, 1, 12, 13, 14, 15, 1, 0, '2022-11-25 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `supplier`
--

INSERT INTO `supplier` (`id`, `nombre`, `telefono`) VALUES
(5, 'Proovedor 1', ''),
(24, 'Proveedor2', 'cuenta corriente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `categoria` enum('telefono','accesorio') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telefonos`
--

INSERT INTO `telefonos` (`id`, `nombre`, `modelo`, `color`, `capacidad`, `categoria`) VALUES
(1, 'Iphone', '11 PRO', 'Gold', 64, 'telefono'),
(2, 'Iphone', '13 PRO', 'Black', 256, 'telefono'),
(3, 'Iphone', '11 Pro', 'Gold', 54, 'telefono'),
(6, 'Iphone', '3232', 'Gold', 21, 'telefono');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `uid`) VALUES
(1, 'facuquero@gmail.com', 'Facu Quero', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_plan_canje`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gastos_variables`
--
ALTER TABLE `gastos_variables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product` (`product`),
  ADD KEY `seller` (`seller`);

--
-- Indices de la tabla `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_plan_canje`
--
ALTER TABLE `ventas_plan_canje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `gastos_fijos`
--
ALTER TABLE `gastos_fijos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `gastos_variables`
--
ALTER TABLE `gastos_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas_plan_canje`
--
ALTER TABLE `ventas_plan_canje`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `product` FOREIGN KEY (`product`) REFERENCES `telefonos` (`id`),
  ADD CONSTRAINT `seller` FOREIGN KEY (`seller`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `stock_telefonos`
--
ALTER TABLE `stock_telefonos`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `telefonos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
