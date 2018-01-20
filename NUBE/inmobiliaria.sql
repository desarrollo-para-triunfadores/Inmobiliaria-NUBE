-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2017 a las 02:28:19
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
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `privado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id`, `nombre`, `localidad_id`, `privado`, `created_at`, `updated_at`) VALUES
(1, 'Centro', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(2, 'Don Rafael', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(3, 'Prosperidad', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(4, 'Centenario', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(5, 'J.B. Alberdi', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(6, 'Centenario', 1, 0, '2017-03-11 17:38:54', '2017-03-11 17:38:54'),
(7, 'La California', 1, 1, '2017-03-11 17:39:30', '2017-03-11 17:39:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `nombre`, `tipo_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Piso de parquet', 1, 'piso lujoso', '2017-10-23 02:38:07', '2017-11-07 04:43:50'),
(2, 'Pileta', 1, NULL, '2017-11-07 04:44:00', '2017-11-07 04:44:00'),
(3, 'Playa cercana', 1, NULL, '2017-11-07 04:44:13', '2017-11-07 04:44:13'),
(4, 'Balcón', 1, NULL, '2017-11-07 04:44:26', '2017-11-07 04:44:26'),
(5, 'Terraza', 1, NULL, '2017-11-07 04:44:35', '2017-11-07 04:44:35'),
(6, 'Terraza compartida', 1, 'Terraza compartida (con reserva previa)', '2017-04-20 05:30:15', '2017-04-20 05:30:15'),
(7, 'Terraza privada', 1, NULL, '2017-04-20 05:30:37', '2017-04-20 05:30:37'),
(8, 'Wi-Fi Libre', 1, 'Puntos de internet gratuitos en espacios comunes', '2017-04-20 05:32:17', '2017-04-20 05:32:17'),
(9, 'Pileta', 2, NULL, '2017-04-20 05:33:17', '2017-04-20 05:33:17'),
(10, 'Pileta compartida', 1, 'Pileta compartida para inquilinos y huespedes', '2017-04-20 05:34:12', '2017-04-20 05:34:12'),
(11, 'Pileta privada', 1, 'Pileta en departamento', '2017-04-20 05:35:24', '2017-04-20 05:35:24'),
(12, 'Cocina amueblada', 1, NULL, '2017-04-18 08:12:43', '2017-04-18 08:12:43'),
(14, 'Parquet', 2, 'Piso de parquet', '2017-04-20 05:27:23', '2017-04-20 05:27:23'),
(15, 'Centrico', 1, 'Playa a menos de 200m', '2017-04-20 05:28:59', '2017-04-20 05:28:59'),
(16, 'Terraza compartida', 1, 'Terraza compartida (con reserva previa)', '2017-04-20 05:30:15', '2017-04-20 05:30:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica_edificios`
--

CREATE TABLE `caracteristica_edificios` (
  `id` int(10) UNSIGNED NOT NULL,
  `caracteristica_id` int(10) UNSIGNED NOT NULL,
  `edificio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica_inmuebles`
--

CREATE TABLE `caracteristica_inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `caracteristica_id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caracteristica_inmuebles`
--

INSERT INTO `caracteristica_inmuebles` (`id`, `caracteristica_id`, `inmueble_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-01 01:00:34', '2017-11-01 01:00:34'),
(3, 1, 4, '2017-11-07 04:46:42', '2017-11-07 04:46:42'),
(4, 2, 18, '2017-11-08 01:50:58', '2017-11-08 01:50:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(11) UNSIGNED NOT NULL,
  `inquilino_id` int(11) UNSIGNED NOT NULL,
  `garante_id` int(11) UNSIGNED NOT NULL,
  `fecha_desde` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_hasta` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto_basico` double NOT NULL,
  `tipo_renta` enum('fija','creciente') COLLATE utf8_spanish_ci DEFAULT NULL,
  `incremento` double DEFAULT NULL,
  `periodos` int(11) DEFAULT NULL,
  `comision_propietario` double DEFAULT NULL,
  `comision_inquilino` double DEFAULT NULL,
  `gastos_administrativos` double DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `inmueble_id`, `inquilino_id`, `garante_id`, `fecha_desde`, `fecha_hasta`, `monto_basico`, `tipo_renta`, `incremento`, `periodos`, `comision_propietario`, `comision_inquilino`, `gastos_administrativos`, `descripcion`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 2, '23/11/2017', '13/11/2019', 2560, 'fija', 9, 15, NULL, 10, 63000, NULL, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(4, 1, 1, 2, '06/11/2017', '30/11/2021', 1000, 'fija', 10, 6, NULL, 5, 8400, NULL, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(5, 18, 2, 4, '09/10/2017', '09/04/2018', 2500, 'fija', 10, 6, 10, 7, 8400, NULL, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(6, 19, 3, 5, '10/09/2017', '10/09/2018', 2500, 'creciente', 5, 4, 13, 5, 1800, NULL, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(7, 20, 4, 4, '01/12/2017', '01/12/2018', 3050, 'creciente', 5, 6, 13, 5, 3000, NULL, '2017-11-06 19:27:53', '2017-11-06 19:27:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE `edificios` (
  `id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_habilitacion` timestamp NULL DEFAULT NULL,
  `foto_perfil` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cant_deptos` int(11) DEFAULT NULL,
  `costo_sueldos_personal` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cant_ascensores` int(11) DEFAULT NULL,
  `valor_ascensores` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo_mant_ascensores` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo_limpieza` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `costo_seguro` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cochera` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio_id` int(10) UNSIGNED DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`id`, `direccion`, `nombre`, `longitud`, `latitud`, `fecha_habilitacion`, `foto_perfil`, `cant_deptos`, `costo_sueldos_personal`, `cant_ascensores`, `valor_ascensores`, `costo_mant_ascensores`, `costo_limpieza`, `costo_seguro`, `cochera`, `descripcion`, `barrio_id`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, 'General Paz 205', 'San Martin', NULL, NULL, NULL, 'sin imagen', 20, '15000', 2, '75000', '1500', '5000', NULL, 1, 'nada', 1, 1, '2017-11-01 00:43:23', '2017-11-01 00:43:23'),
(2, 'Salta 289', 'Torre Vista', NULL, NULL, '2016-02-18 03:00:00', 'sin imagen', 30, '20000', 1, '20000000', '1500', '3750', NULL, 0, 'este espacio es para añadir una descripcion del edificio', 1, 1, '2017-11-07 03:12:21', '2017-11-07 03:12:21'),
(3, 'San Martin 212', 'Toba', NULL, NULL, NULL, 'sin imagen', 15, '8.500,00', 1, '925.000,00', '650,00', '1.530,00', NULL, 0, 'Es un pequeño condominio para estudiantes becados por la UNNE', 3, 1, '2017-11-07 04:09:57', '2017-11-07 04:09:57'),
(4, 'JD Perón 1415', 'Torres Sarmiento', NULL, NULL, NULL, 'sin imagen', 80, '28.000,00', 2, '2.850,00', '2.150,00', '4.800,00', NULL, 1, 'Edificios Privados en el predio del Club Sarmiento', 6, 1, '2017-11-07 04:15:19', '2017-11-07 04:15:19'),
(5, 'Monteagudo 695', 'Condominio del Este', NULL, NULL, NULL, 'sin imagen', 20, '16.000,00', 1, '1.250,00', '1.500,00', '19.500,00', NULL, 1, 'Excelente ubicacion, ambiente tranquilo, supermercado y centros deportivos en el barrio.', 1, 1, '2017-11-07 04:23:07', '2017-11-07 04:23:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE `espacios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `espacios`
--

INSERT INTO `espacios` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Cocina', NULL, NULL),
(2, 'Comedor', NULL, NULL),
(3, 'Closet', NULL, NULL),
(4, 'Baño', NULL, NULL),
(5, 'Garage', NULL, NULL),
(6, 'Living', NULL, NULL),
(7, 'Salón de Juegos', NULL, NULL),
(8, 'Habitación 1', NULL, NULL),
(9, 'Habitación 2', NULL, NULL),
(10, 'Habitación 3', NULL, NULL),
(11, 'Baño 1', NULL, NULL),
(12, 'Baño 2', NULL, NULL),
(13, 'Baño 3', NULL, NULL),
(14, 'Terraza', NULL, NULL),
(15, 'Quincho', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantes`
--

CREATE TABLE `garantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `garantes`
--

INSERT INTO `garantes` (`id`, `persona_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2017-07-01 21:25:38', '2017-07-01 21:25:38'),
(2, 8, NULL, '2017-07-01 21:38:47', '2017-07-01 21:38:47'),
(4, 21, 'Padre de Nahir', NULL, NULL),
(5, 12, 'Padrino de Omar Bauernfeind', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_inmuebles`
--

CREATE TABLE `imagen_inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_imagen` enum('slider','portada','planoMin','planoMax','detalle','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `espacio_id` int(11) UNSIGNED DEFAULT NULL,
  `inmueble_id` int(10) UNSIGNED DEFAULT NULL,
  `proyecto_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagen_inmuebles`
--

INSERT INTO `imagen_inmuebles` (`id`, `nombre`, `seccion_imagen`, `espacio_id`, `inmueble_id`, `proyecto_id`, `created_at`, `updated_at`) VALUES
(1, 'INube_1510029727.jpg', 'portada', NULL, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(2, 'INube_slide1500132465.jpg', 'slider', NULL, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(3, 'INube_detalle1_1500132465.jpg', 'detalle', 6, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(4, 'INube_detalle2_1500132465.jpg', 'detalle', 4, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(5, 'INube_detalle3_1500132465.jpg', 'detalle', 8, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(6, 'INube_detalle4_1500132465.jpg', 'detalle', 1, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(7, 'INube_plano1_1500132465.jpg', 'planoMin', NULL, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(8, 'INube_plano2_1500132465.jpg', 'planoMin', NULL, 1, NULL, '2017-07-15 18:27:45', '2017-07-15 18:27:45'),
(9, 'INube_1500216401.jpg', 'portada', NULL, 16, NULL, '2017-07-16 17:46:41', '2017-07-16 17:46:41'),
(10, 'INube_slide1500216401.jpg', 'slider', NULL, 16, NULL, '2017-07-16 17:46:41', '2017-07-16 17:46:41'),
(11, 'INube_detalle1_1500216401.jpg', 'detalle', 8, 16, NULL, '2017-07-16 17:46:41', '2017-07-16 17:46:41'),
(12, 'INube_detalle2_1500216401.jpg', 'detalle', 4, 16, NULL, '2017-07-16 17:46:41', '2017-07-16 17:46:41'),
(13, 'INube_plano1_1500216401.jpg', 'planoMin', NULL, 16, NULL, '2017-07-16 17:46:42', '2017-07-16 17:46:42'),
(16, 'INube_1500267163.jpg', 'portada', NULL, 17, NULL, '2017-07-17 07:52:43', '2017-07-17 07:52:43'),
(17, 'INube_slide1500267163.jpg', 'slider', NULL, 17, NULL, '2017-07-17 07:52:43', '2017-07-17 07:52:43'),
(18, 'INube_detalle1_1500267163.jpg', 'detalle', 15, 17, NULL, '2017-07-17 07:52:43', '2017-07-17 07:52:43'),
(19, 'INube_detalle2_1500267163.jpg', 'detalle', 4, 17, NULL, '2017-07-17 07:52:43', '2017-07-17 07:52:43'),
(20, 'INube_detalle3_1500267164.jpg', 'detalle', 8, 17, NULL, '2017-07-17 07:52:44', '2017-07-17 07:52:44'),
(21, 'INube_detalle4_1500267164.jpg', 'detalle', 9, 17, NULL, '2017-07-17 07:52:44', '2017-07-17 07:52:44'),
(22, 'INube_plano1_1500267164.jpg', 'planoMin', NULL, 17, NULL, '2017-07-17 07:52:44', '2017-07-17 07:52:44'),
(23, 'sinimagen.jpg', 'slider', NULL, 2, NULL, NULL, NULL),
(24, 'INube_1500132242.jpg', 'portada', NULL, 2, NULL, NULL, NULL),
(25, 'INube_slide1492977397.jpg', 'slider', NULL, 3, NULL, NULL, NULL),
(27, 'ppt001i11734f037t1.jpg', 'slider', NULL, 4, NULL, NULL, NULL),
(29, 'INube_1510029727.jpg', 'portada', NULL, 4, NULL, '2017-09-13 03:00:00', NULL),
(31, 'INube_1493159869.jpg', 'portada', NULL, 3, NULL, '2017-09-13 03:00:00', NULL),
(32, 'INube_1510105858.jpg', 'portada', NULL, 18, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(33, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 18, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(34, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 18, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(35, 'INube_slide1492975841.jpg', 'slider', NULL, 18, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(36, 'INube_1510105858.jpg', 'portada', NULL, 19, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(37, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 19, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(38, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 19, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(39, 'INube_slide1492975841.jpg', 'slider', NULL, 19, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(40, 'INube_1510105858.jpg', 'portada', NULL, 20, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(41, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 20, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(42, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 20, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(43, 'INube_slide1492975841.jpg', 'slider', NULL, 20, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(44, 'INube_slide1492975841.jpg', 'slider', NULL, 21, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(45, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 21, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(46, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 21, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(47, 'INube_1510105858.jpg', 'portada', NULL, 21, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(48, 'INube_slide1492975841.jpg', 'slider', NULL, 22, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(49, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 22, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(50, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 22, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(51, 'INube_1510105858.jpg', 'portada', NULL, 22, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(52, 'INube_1510105858.jpg', 'portada', NULL, 23, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(53, 'INube_detalle1_1510105859.jpg', 'detalle', 8, 23, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(54, 'INube_detalle2_1510105859.jpg', 'detalle', 4, 23, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59'),
(55, 'INube_slide1492975841.jpg', 'slider', NULL, 23, NULL, '2017-11-08 01:50:59', '2017-11-08 01:50:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` enum('alquiler','venta','alquiler/venta') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valorVenta` double DEFAULT NULL,
  `valorAlquiler` double DEFAULT NULL,
  `valorReal` double DEFAULT NULL,
  `superficie` double DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numDepto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaHabilitacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaFinContrato` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkVideo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidadAmbientes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidadBaños` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidadGarages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidadDormitorios` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disponible` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edificio_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED DEFAULT NULL,
  `propietario_id` int(10) UNSIGNED DEFAULT NULL,
  `barrio_id` int(10) UNSIGNED DEFAULT NULL,
  `localidad_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `condicion`, `valorVenta`, `valorAlquiler`, `valorReal`, `superficie`, `direccion`, `piso`, `numDepto`, `fechaHabilitacion`, `fechaFinContrato`, `linkVideo`, `longitud`, `latitud`, `cantidadAmbientes`, `cantidadBaños`, `cantidadGarages`, `cantidadDormitorios`, `disponible`, `descripcion`, `edificio_id`, `tipo_id`, `propietario_id`, `barrio_id`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, 'alquiler', 100000, 5000, 200000, 500, 'Echagüe 781', '4', '2', '31/10/2017', '31/10/2021', NULL, NULL, NULL, '4', '1', '1', '2', NULL, 'nada', 1, 1, 1, 1, 1, '2017-11-01 01:00:34', '2017-11-06 19:27:53'),
(2, 'alquiler', 2000000, 10000, 1500000, 500, 'General Paz 205', '10', '8', '02/11/2017', NULL, NULL, NULL, NULL, '5', '1', '1', '2', NULL, NULL, 1, 1, 1, 2, 2, '2017-11-02 20:55:10', '2017-11-03 03:59:19'),
(3, 'venta', 950000, NULL, NULL, 80, 'Güiraldes 2744', '2', '5', '2012-03-11', NULL, 'www.youtube.com/mivideo', '-58.930046249145505', '-27.486529335603144', '4', '1', '1', '1', 'si', 'Esta es una descripción del inmueble', 1, 1, 4, NULL, 2, '2017-07-15 18:27:44', '2017-07-15 18:27:44'),
(4, 'alquiler', 1896000, 350000, 1896000, 65, 'Hernandarias 1003', '2', '3', '10/02/2015', NULL, NULL, '-59.00277967736815', '-27.452966647854453', '3', '1', '1', '2', 'si', 'Excelente departamento 3 ambientes con balcón con vista al río en inmejorable ubicación cerca de Avenida, estación de tren y colegios, zona muy residencial y tranquila, orientación oeste , muy luminoso , pisos parquet y cerámicos, azulejos lisos, dormitorios con placard, muebles de cocina completos .-', 2, 1, 3, 3, 1, '2017-11-07 04:46:42', '2017-11-07 04:46:42'),
(16, 'alquiler', NULL, 4500, NULL, 75, 'Los Lapachos 156', '2', '5', '2017-07-16', NULL, NULL, NULL, NULL, '4', '1', '1', '2', 'no', 'descruocion', 1, 2, 5, NULL, 7, '2017-07-16 17:46:41', '2017-07-16 17:46:41'),
(17, 'alquiler/venta', 950000, 7100, 1520000, 95, 'Coronel Dorrego 455', '3', '5', '2017-07-17', NULL, 'www.video.com/lacasa', '-58.977974608398426', '-27.47855520481307', '5', '2', '1', '2', 'si', 'Es una casa muy acogedora', 1, 1, 6, 2, 1, '2017-07-17 07:52:43', '2017-07-17 07:52:43'),
(18, 'alquiler', 1500000, 3500, 1200, 55, 'Salta 219', '2', '3', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58'),
(19, 'alquiler', 1500000, 350000, 1200, 55, 'Salta 219', '2', '2', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58'),
(20, 'alquiler', 1850000, 3500, 1200, 55, 'Salta 219', '2', '1', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58'),
(21, 'alquiler', 1500000, 3500, 1200, 55, 'Salta 219', '1', '2', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58'),
(22, 'alquiler', 1500000, 350000, 1200, 55, 'Salta 219', '3', '1', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58'),
(23, 'alquiler', 1850000, 3500, 1200, 55, 'Salta 219', '4', '4', '01/11/2017', NULL, 'https://www.youtube.com/inmueble', NULL, NULL, '4', '1', '1', '1', 'si', NULL, 2, 1, 5, 1, 1, '2017-11-08 01:50:58', '2017-11-08 01:50:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilinos`
--

CREATE TABLE `inquilinos` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inquilinos`
--

INSERT INTO `inquilinos` (`id`, `persona_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 14, 'Jugador de futbol ', '2017-07-01 22:22:30', '2017-07-01 22:22:30'),
(2, 20, 'Estudiante de la UNNE', NULL, NULL),
(3, 24, 'Estudiente de Ingenieria', NULL, NULL),
(4, 25, 'Estudiente de Ingenieria y profesor de musica oriental', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones_mensuales`
--

CREATE TABLE `liquidaciones_mensuales` (
  `id` int(10) UNSIGNED NOT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `alquiler` decimal(10,0) DEFAULT NULL,
  `fecha_pago` timestamp NULL DEFAULT NULL,
  `vencimiento` timestamp NULL DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `saldo_periodo` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `abono` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones_mensuales_conceptos`
--

CREATE TABLE `liquidaciones_mensuales_conceptos` (
  `id` int(11) UNSIGNED NOT NULL,
  `serviciocontrato_id` int(10) UNSIGNED NOT NULL,
  `liquidacionmensual_id` int(10) UNSIGNED DEFAULT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `periodo` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_vencimiento` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL,
  `segundo_vencimiento` varchar(191) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `liquidaciones_mensuales_conceptos`
--

INSERT INTO `liquidaciones_mensuales_conceptos` (`id`, `serviciocontrato_id`, `liquidacionmensual_id`, `monto`, `periodo`, `primer_vencimiento`, `segundo_vencimiento`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '500', '10/2017', '11/02/2017', '20/02/2017', '2017-11-04 12:40:32', '2017-11-04 12:40:32'),
(2, 2, NULL, '200', '11/2017', '11/02/2017', '20/02/2017', '2017-11-04 12:40:32', '2017-11-04 12:40:32'),
(3, 3, NULL, '300', '11/2017', '11/02/2017', '20/02/2017', '2017-11-04 12:40:32', '2017-11-04 12:40:32'),
(4, 1, NULL, '500', '12/2017', '12/10/2017', '22/10/2017', '2017-11-04 18:17:23', '2017-11-04 18:17:23'),
(5, 2, NULL, '600', '12/2017', '12/10/2017', '12/10/2017', '2017-11-04 18:17:23', '2017-11-04 18:17:23'),
(6, 3, NULL, '250', '12/2017', '12/10/2017', '12/10/2017', '2017-11-04 18:17:23', '2017-11-04 18:17:23'),
(7, 1, NULL, '89', '12/2017', '12/02/2017', '12/02/2017', '2017-11-04 18:41:42', '2017-11-04 18:41:42'),
(8, 1, NULL, '548', '10/2017', '14/11/2017', '05/12/2017', '2017-11-06 23:44:04', '2017-11-06 23:44:04'),
(9, 2, NULL, '256', '10/2017', '14/11/2017', '05/12/2017', '2017-11-06 23:44:04', '2017-11-06 23:44:04'),
(10, 3, NULL, '857', '07/2017', '15/11/2017', '06/12/2017', '2017-11-06 23:44:04', '2017-11-06 23:44:04'),
(11, 3, NULL, '1560', '10/2017', '11/11/2017', '15/12/2017', '2017-11-06 23:48:01', '2017-11-06 23:48:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provincia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `cod_postal`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'Resistencia', '3500', 1, '2017-03-11 17:38:42', '2017-03-11 17:38:42'),
(2, 'Barranqueras', '3510', 1, '2017-03-11 17:38:42', '2017-03-11 17:38:42'),
(3, 'Villa Angela', '3513', 1, '2017-03-11 17:38:42', '2017-03-11 17:38:42'),
(4, 'Fontana', '3519', 1, '2017-03-11 17:38:45', '2017-03-11 17:38:45'),
(6, 'Saenz Peña', '0', 1, '2017-03-23 17:12:08', '2017-03-23 17:12:08'),
(7, 'Posadas', '3300', 2, '2017-03-30 23:14:35', '2017-03-30 23:14:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_15_152832_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_05_05_224622_add_tipos_table', 1),
(5, '2016_04_09_182805_add_paises_table', 1),
(6, '2016_04_09_183257_add_provincias_table', 1),
(7, '2016_04_09_183830_add_localidades_table', 1),
(8, '2016_04_10_005930_barrios', 1),
(9, '2016_04_11_232924_create_edificios_table', 1),
(10, '2016_04_15_113555_create_personas_table', 1),
(11, '2016_04_9_182805_add_espacios_table', 1),
(12, '2017_03_08_183830_add_caracteristicas_table', 1),
(13, '2017_04_11_114213_create_proyectos_table', 1),
(14, '2017_04_17_000646_create_caracteristica_edificios_table', 1),
(15, '2017_05_16_203716_create_propietarios_table', 1),
(16, '2017_06_11_114213_create_inmuebles_table', 1),
(17, '2017_06_11_114215_create_imagen_inmuebles_table', 1),
(18, '2017_06_12_000635_create_caracteristica_inmuebles_table', 1),
(19, '2017_07_09_182805_add_inquilinos_table', 1),
(20, '2017_07_10_182805_garantes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Argentina', '2017-03-11 17:38:41', '2017-03-11 17:38:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED DEFAULT NULL,
  `pais_id` int(10) UNSIGNED DEFAULT NULL,
  `foto_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `sexo`, `dni`, `fecha_nac`, `telefono`, `telefono_contacto`, `email`, `localidad_id`, `pais_id`, `foto_perfil`, `direccion`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Horacio Alejandro', 'Kuszniruk', 'Masculino', '34448004', '19/05/2017', '3764241905', '3764159803', 'hacho.kuszniruk@gmail.com', 7, 1, 'persona_1498944971.', 'Av. Corrientes 2247', NULL, '2017-05-21 16:05:42', '2017-07-01 21:36:11'),
(4, 'Juan Pablo', 'Cáceres', 'Masculino', '34478385', '10/05/1989', '3743499820', '3764159803', 'jpcaceres.nea@gmail.com', 1, 1, 'persona_1495396940.jpg', 'Monteagudo 695', NULL, '2017-05-21 20:02:20', '2017-05-21 20:02:20'),
(5, 'Lionel', 'Messi', 'Masculino', '34444433', '06/14/2017', '123123', '123123', 'hacho_kuszniruk@hotmail.com', 1, 1, 'persona_1497179718.', 'asdasdasd', NULL, '2017-06-11 09:46:04', '2017-06-11 11:44:05'),
(8, 'Marcelo', 'Menendez', 'Masculino', '28564074', '17/05/1974', '3764241905', '3764159803', 'mmarcenendez@gmail.com', 1, 1, 'persona_1498945201.', 'Corrientes 2247', NULL, '2017-07-01 21:38:47', '2017-07-01 21:40:01'),
(9, 'Brad', 'Pitt', 'Masculino', '12457856', '26/06/2017', '3764241905', NULL, 'hacho_kuszniruk@hotmail.com', 1, 1, 'persona_1498947362.', 'Corrientes 2247', NULL, '2017-07-01 22:16:02', '2017-07-01 22:16:02'),
(11, 'Silvia', 'Ott', 'Femenino', '24852089', '27/11/1972', '3764241905', NULL, 'silviaott@gmail.com', 1, 1, 'silvia_ott.jpg', 'Corrientes 2247', NULL, '2017-07-01 22:17:12', '2017-07-01 22:17:12'),
(12, 'Jorge', 'Strumia', 'Masculino', '12312312', '01/07/1965', '3764241905', NULL, 'jorge.strumia@gmail.com', 1, 1, 'sin imagen', 'Lopez y Planes 1674', NULL, '2017-07-01 22:20:46', '2017-07-01 22:20:46'),
(14, 'Edinson', 'Cavani', 'Masculino', '12124573', '01/07/2017', '3764241905', NULL, 'hacho_k@outlook.com', 1, 1, 'persona_1498947784.', 'Corrientes 2247', NULL, '2017-07-01 22:22:30', '2017-11-04 00:58:55'),
(15, 'Angel', 'Da Fonseca', 'Masculino', '23859875', '28/06/2017', '3764241905', '3764159803', 'fafafonseca@hotmail.com', 7, 1, 'persona_1498948853.', 'Corrientes 2247', NULL, '2017-07-01 22:40:53', '2017-07-01 22:41:09'),
(19, 'Pablo', 'Alarcón', 'Masculino', '29468525', '18/02/1982', '3624585694', '-', 'alarcon@gmail.com', 4, 1, 'pablo_alarcon.jpg', 'Sargento Grant 1899', 'Excelente departamento 3 ambientes con balcón con vista al río en inmejorable ubicación cerca de Avenida, estación de tren y colegios, zona muy residencial y tranquila, orientación oeste , muy luminoso , pisos parquet y cerámicos, azulejos lisos, dormitorios con placard, muebles de cocina completos .-', '2017-11-07 04:46:42', '2017-11-07 04:46:42'),
(20, 'Nahir', 'De León', 'Femenino', '39555874', '27/02/1993', '3624585632', '-', 'nahiragostina@gmail.com', 4, 1, 'nahir.jpg', '-', '', '2017-11-07 04:46:42', '2017-11-07 04:46:42'),
(21, 'Mario', 'De León', 'Masulino', '24652308', '05/05/1963', '375564584', NULL, 'mariodeleon@gmail.com', 7, 1, 'mario_de_leon.jpg', 'Cervantes 777', 'Padre de Nahir De Leon', NULL, NULL),
(24, 'Omar', 'Bauernfeind', 'Masculino', '35854012', '12/03/1989', '3764254684', NULL, 'omarbaud@gmail.com', 1, 1, 'omar_bauerfeind.jpg', NULL, 'Estudiante de ingenieria electromecanica', NULL, NULL),
(25, 'Kevin', 'Uberti', 'Masculino', '33789645', '11/01/1988', '3624247895', NULL, 'kevinuber@gmail.com', 6, 1, 'kevin_uberti.jpg', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id`, `persona_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 15, NULL, '2017-07-01 22:40:53', '2017-07-01 22:40:53'),
(3, 19, 'Excelente departamento 3 ambientes con balcón con vista al río en inmejorable ubicación cerca de Avenida, estación de tren y colegios, zona muy residencial y tranquila, orientación oeste , muy luminoso , pisos parquet y cerámicos, azulejos lisos, dormitorios con placard, muebles de cocina completos .-', '2017-11-07 04:46:42', '2017-11-07 04:46:42'),
(4, 12, NULL, '2017-06-14 03:00:00', NULL),
(5, 8, NULL, NULL, NULL),
(6, 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `pais_id`, `created_at`, `updated_at`) VALUES
(1, 'Chaco', 1, '2017-03-11 17:38:41', '2017-03-11 17:38:41'),
(2, 'Misiones', 1, '2017-03-11 17:38:41', '2017-03-11 17:38:41'),
(5, 'Formosa', 1, '2017-03-23 16:54:49', '2017-03-23 16:54:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` enum('Alquiler','Venta','Alquiler/Venta') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorVenta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorAlquiler` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superficie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numDepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHabilitacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaFinContrato` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadAmbientes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadBa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadGarages` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponible` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `barrio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modulos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `modulos`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Todos', '2017-03-11 17:38:40', '2017-03-11 17:38:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Luz', 'Servicio de Electricidad', '2017-07-14 02:59:23', NULL),
(2, 'Gas', 'Servicio de gas comunitario del edificio', '2017-07-14 02:59:23', NULL),
(4, 'Internet', 'Pago del servicio de internet de un tercero', '2017-07-14 03:52:42', '2017-07-14 03:52:42'),
(5, 'Telefonía', 'Servicio de telefono (fijo)', '2017-07-14 03:36:26', '2017-07-14 03:36:26'),
(6, 'Pago de Impuesto inmobiliario', 'El administrador se encarga de abonar éste impuesto municipal', '2017-07-14 03:41:40', '2017-07-14 03:41:40'),
(7, 'Agua', NULL, '2017-07-14 03:53:49', '2017-07-14 03:53:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_contrato`
--

CREATE TABLE `servicios_contrato` (
  `id` int(11) UNSIGNED NOT NULL,
  `servicio_id` int(10) UNSIGNED NOT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios_contrato`
--

INSERT INTO `servicios_contrato` (`id`, `servicio_id`, `contrato_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(2, 2, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(3, 4, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(4, 5, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(5, 6, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(6, 7, 3, '2017-11-03 03:59:19', '2017-11-03 03:59:19'),
(7, 1, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(8, 2, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(9, 4, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(10, 5, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(11, 6, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53'),
(12, 7, 4, '2017-11-06 19:27:53', '2017-11-06 19:27:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Departamento', NULL, '2017-10-23 02:36:15', '2017-10-23 02:36:15'),
(2, 'Casa', NULL, '2016-04-30 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `imagen`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', 'usuario_1499775381.jpg', '$2y$10$E.492JtVHpG8MGXa1U4lIe7d/ByAd/87hU8oxyX8O0Jnlnw5h0LWO', 1, NULL, '2017-03-11 17:38:41', '2017-03-11 17:38:41'),
(2, 'Juan Pablo Cáceres', 'jpcaceres.nea@gmail.com', 'usuario_1499215225.jpg', '$2y$10$r.aRXk/wS8M..AckSe71Z.SF8woMcX5w2umoAb4LH5gUi/ZXNRl5i', 1, NULL, '2017-04-18 16:49:07', '2017-04-25 21:17:57'),
(3, 'Juan Rubio', 'juanrubio_96@hotmail.com', 'usuario_1499775474.jpg', '$2y$10$vr/Eza4JV1HSBxa0YSk3UOzXQGVO6nUc6CrdYIh.xQE9xoRJt/STC', 1, NULL, '2017-05-14 19:59:28', '2017-05-14 19:59:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barrios_localidad_id_foreign` (`localidad_id`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caracteristicas_tipo_id_foreign` (`tipo_id`);

--
-- Indices de la tabla `caracteristica_edificios`
--
ALTER TABLE `caracteristica_edificios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caracteristica_edificios_caracteristica_id_foreign` (`caracteristica_id`),
  ADD KEY `caracteristica_edificios_edificio_id_foreign` (`edificio_id`);

--
-- Indices de la tabla `caracteristica_inmuebles`
--
ALTER TABLE `caracteristica_inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caracteristica_inmuebles_caracteristica_id_foreign` (`caracteristica_id`),
  ADD KEY `caracteristica_inmuebles_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmueble_id` (`inmueble_id`),
  ADD KEY `inquilino_id` (`inquilino_id`),
  ADD KEY `garante_id` (`garante_id`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edificios_barrio_id_foreign` (`barrio_id`),
  ADD KEY `edificios_localidad_id_foreign` (`localidad_id`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `garantes`
--
ALTER TABLE `garantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garantes_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `imagen_inmuebles`
--
ALTER TABLE `imagen_inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `espacio_id` (`espacio_id`),
  ADD KEY `inmueble_id` (`inmueble_id`),
  ADD KEY `proyecto_id` (`proyecto_id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmuebles_edificio_id_foreign` (`edificio_id`),
  ADD KEY `inmuebles_tipo_id_foreign` (`tipo_id`),
  ADD KEY `inmuebles_propietario_id_foreign` (`propietario_id`),
  ADD KEY `inmuebles_barrio_id_foreign` (`barrio_id`);

--
-- Indices de la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquilinos_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liquidacion_mensual_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `liquidaciones_mensuales_conceptos`
--
ALTER TABLE `liquidaciones_mensuales_conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrato_id` (`liquidacionmensual_id`),
  ADD KEY `servicio_id` (`serviciocontrato_id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localidades_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_dni_unique` (`dni`),
  ADD KEY `personas_localidad_id_foreign` (`localidad_id`),
  ADD KEY `personas_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propietarios_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_pais_id_foreign` (`pais_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyectos_tipo_id_foreign` (`tipo_id`),
  ADD KEY `proyectos_localidad_id_foreign` (`localidad_id`),
  ADD KEY `proyectos_barrio_id_foreign` (`barrio_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_contrato`
--
ALTER TABLE `servicios_contrato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contrato_id` (`contrato_id`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `caracteristica_edificios`
--
ALTER TABLE `caracteristica_edificios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `caracteristica_inmuebles`
--
ALTER TABLE `caracteristica_inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `edificios`
--
ALTER TABLE `edificios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `garantes`
--
ALTER TABLE `garantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen_inmuebles`
--
ALTER TABLE `imagen_inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidaciones_mensuales_conceptos`
--
ALTER TABLE `liquidaciones_mensuales_conceptos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicios_contrato`
--
ALTER TABLE `servicios_contrato`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD CONSTRAINT `barrios_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `caracteristicas_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `caracteristica_edificios`
--
ALTER TABLE `caracteristica_edificios`
  ADD CONSTRAINT `caracteristica_edificios_caracteristica_id_foreign` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristicas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `caracteristica_edificios_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `caracteristica_inmuebles`
--
ALTER TABLE `caracteristica_inmuebles`
  ADD CONSTRAINT `caracteristica_inmuebles_caracteristica_id_foreign` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristicas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `caracteristica_inmuebles_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contrato_inmuble_id` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD CONSTRAINT `edificios_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `edificios_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `garantes`
--
ALTER TABLE `garantes`
  ADD CONSTRAINT `garantes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagen_inmuebles`
--
ALTER TABLE `imagen_inmuebles`
  ADD CONSTRAINT `imagen_inmuebles_ibfk_1` FOREIGN KEY (`espacio_id`) REFERENCES `espacios` (`id`),
  ADD CONSTRAINT `imagen_inmuebles_ibfk_2` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`),
  ADD CONSTRAINT `imagen_inmuebles_ibfk_3` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `inmuebles_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  ADD CONSTRAINT `inquilinos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  ADD CONSTRAINT `liquidacion_mensual_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`);

--
-- Filtros para la tabla `liquidaciones_mensuales_conceptos`
--
ALTER TABLE `liquidaciones_mensuales_conceptos`
  ADD CONSTRAINT `liquidacionmensual_id_foreign` FOREIGN KEY (`liquidacionmensual_id`) REFERENCES `liquidaciones_mensuales` (`id`),
  ADD CONSTRAINT `serviciocontrato_concepto_id_foreign` FOREIGN KEY (`serviciocontrato_id`) REFERENCES `servicios_contrato` (`id`);

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD CONSTRAINT `propietarios_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyectos_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyectos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
