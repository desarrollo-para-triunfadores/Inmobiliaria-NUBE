-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2018 a las 03:13:37
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones_mensuales`
--

CREATE TABLE `liquidaciones_mensuales` (
  `id` int(10) UNSIGNED NOT NULL,
  `alquiler` double(10,2) DEFAULT NULL,
  `fecha_pago` timestamp NULL DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT NULL,
  `saldo_periodo` double(10,2) DEFAULT NULL,
  `abono` tinyint(1) DEFAULT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `liquidaciones_mensuales`
--

INSERT INTO `liquidaciones_mensuales` (`id`, `alquiler`, `fecha_pago`, `vencimiento`, `total`, `subtotal`, `saldo_periodo`, `abono`, `contrato_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-01-10 23:01:13', NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-01-10 23:01:13', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liquidaciones_mensuales_contrato_id_foreign` (`contrato_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  ADD CONSTRAINT `liquidaciones_mensuales_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
