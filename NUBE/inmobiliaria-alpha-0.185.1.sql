-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2018 a las 00:23:42
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

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
  `privado` tinyint(1) NOT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`id`, `nombre`, `privado`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, '13 de Diciembre', 0, 1, '2018-05-12 14:05:07', NULL),
(2, '17 de Octubre', 0, 1, '2018-05-12 14:05:07', NULL),
(3, 'América', 0, 1, '2018-05-12 14:05:07', NULL),
(4, 'Aramburu', 0, 1, '2018-05-12 14:05:07', NULL),
(5, 'Asunción', 0, 1, '2018-05-12 14:05:07', NULL),
(6, 'Atlántico Sur', 0, 1, '2018-05-12 14:05:07', NULL),
(7, 'Barrio Santa Clara', 0, 1, '2018-05-12 14:05:07', NULL),
(8, 'Barberán', 0, 1, '2018-05-12 14:05:07', NULL),
(9, 'Barrio San Javier', 0, 1, '2018-05-12 14:05:07', NULL),
(10, 'Belgrano', 0, 1, '2018-05-12 14:05:07', NULL),
(11, 'Bittel Deolindo F.', 0, 1, '2018-05-12 14:05:07', NULL),
(12, 'Borrini', 0, 1, '2018-05-12 14:05:07', NULL),
(13, 'Caraguatá', 0, 1, '2018-05-12 14:05:07', NULL),
(14, 'Centro', 0, 1, '2018-05-12 14:05:07', NULL),
(15, 'Cristo Rey', 0, 1, '2018-05-12 14:05:07', NULL),
(16, 'Don Alberto', 0, 1, '2018-05-12 14:05:07', NULL),
(17, 'Don Bosco', 0, 1, '2018-05-12 14:05:07', NULL),
(18, 'Duarte', 0, 1, '2018-05-12 14:05:07', NULL),
(19, 'Aria Eva', 0, 1, '2018-05-12 14:05:07', NULL),
(20, 'El Bolson', 0, 1, '2018-05-12 14:05:07', NULL),
(21, 'El Timbo', 0, 1, '2018-05-12 14:05:07', NULL),
(22, 'España', 0, 1, '2018-05-12 14:05:07', NULL),
(23, 'Facundo', 0, 1, '2018-05-12 14:05:07', NULL),
(24, 'Favaloro René Gerónimo', 0, 1, '2018-05-12 14:05:07', NULL),
(25, 'Foecyt', 0, 1, '2018-05-12 14:05:07', NULL),
(26, 'Fortines Argentinos', 0, 1, '2018-05-12 14:05:08', NULL),
(27, 'Giraldes', 0, 1, '2018-05-12 14:05:08', NULL),
(28, 'Gob. Luzuriaga', 0, 1, '2018-05-12 14:05:08', NULL),
(29, 'Golf Club', 0, 1, '2018-05-12 14:05:08', NULL),
(30, 'General Obligado', 0, 1, '2018-05-12 14:05:08', NULL),
(31, 'Hipólito Irigoyen (Ch. 204)', 0, 1, '2018-05-12 14:05:08', NULL),
(32, 'Hipólito Irigoyen (Ch. 208)', 0, 1, '2018-05-12 14:05:08', NULL),
(33, 'Insssep', 0, 1, '2018-05-12 14:05:08', NULL),
(34, 'Italia', 0, 1, '2018-05-12 14:05:08', NULL),
(35, 'Itatí', 0, 1, '2018-05-12 14:05:08', NULL),
(36, 'Jesús María', 0, 1, '2018-05-12 14:05:08', NULL),
(37, 'Jorge Newbery', 0, 1, '2018-05-12 14:05:08', NULL),
(38, 'Juan Bautista Alberdi', 0, 1, '2018-05-12 14:05:08', NULL),
(39, 'Juan Domingo Perón', 0, 1, '2018-05-12 14:05:08', NULL),
(40, 'Juana Azurduy', 0, 1, '2018-05-12 14:05:08', NULL),
(41, 'La Fabril', 0, 1, '2018-05-12 14:05:09', NULL),
(42, 'La Rance', 0, 1, '2018-05-12 14:05:09', NULL),
(43, 'La Liguria', 0, 1, '2018-05-12 14:05:10', NULL),
(44, 'Llaponagat', 0, 1, '2018-05-12 14:05:10', NULL),
(45, 'Los Troncos', 0, 1, '2018-05-12 14:05:10', NULL),
(46, 'Los Cisnes', 0, 1, '2018-05-12 14:05:10', NULL),
(47, 'Los Pinos', 0, 1, '2018-05-12 14:05:10', NULL),
(48, 'Malvinas', 0, 1, '2018-05-12 14:05:10', NULL),
(49, 'Monseñor de Carlos', 0, 1, '2018-05-12 14:05:10', NULL),
(50, 'Mujeres Argentinas', 0, 1, '2018-05-12 14:05:10', NULL),
(51, 'Nazareth', 0, 1, '2018-05-12 14:05:10', NULL),
(52, 'Padre Fyrnys', 0, 1, '2018-05-12 14:05:10', NULL),
(53, 'Parque Autódromo', 0, 1, '2018-05-12 14:05:10', NULL),
(54, 'Parque Independencia', 0, 1, '2018-05-12 14:05:10', NULL),
(55, 'Paykin', 0, 1, '2018-05-12 14:05:10', NULL),
(56, 'Perrando', 0, 1, '2018-05-12 14:05:10', NULL),
(57, 'Picilli', 0, 1, '2018-05-12 14:05:10', NULL),
(58, 'Policial', 0, 1, '2018-05-12 14:05:10', NULL),
(59, 'Provincial', 0, 1, '2018-05-12 14:05:10', NULL),
(60, 'Provincias Unidas', 0, 1, '2018-05-12 14:05:10', NULL),
(61, 'Raota', 0, 1, '2018-05-12 14:05:10', NULL),
(62, 'República de Ucrania', 0, 1, '2018-05-12 14:05:10', NULL),
(63, 'Resto', 0, 1, '2018-05-12 14:05:10', NULL),
(64, 'Roger Balet', 0, 1, '2018-05-12 14:05:10', NULL),
(65, 'San Antonio', 0, 1, '2018-05-12 14:05:10', NULL),
(66, 'San Cayetano', 0, 1, '2018-05-12 14:05:10', NULL),
(67, 'San Fernando', 0, 1, '2018-05-12 14:05:10', NULL),
(68, 'San Miguel', 0, 1, '2018-05-12 14:05:10', NULL),
(69, 'San Valentín', 0, 1, '2018-05-12 14:05:10', NULL),
(70, 'Santa Catalina', 0, 1, '2018-05-12 14:05:10', NULL),
(71, 'Santa Bárbara', 0, 1, '2018-05-12 14:05:10', NULL),
(72, 'Santa Inés', 0, 1, '2018-05-12 14:05:10', NULL),
(73, 'Santa Lucía', 0, 1, '2018-05-12 14:05:11', NULL),
(74, 'Santa Rita', 0, 1, '2018-05-12 14:05:11', NULL),
(75, 'Toba', 0, 1, '2018-05-12 14:05:11', NULL),
(76, 'U.P.C.P.', 0, 1, '2018-05-12 14:05:11', NULL),
(77, 'Valusi', 0, 1, '2018-05-12 14:05:11', NULL),
(78, 'Vargas II', 0, 1, '2018-05-12 14:05:11', NULL),
(79, 'Velez Sarfield', 0, 1, '2018-05-12 14:05:11', NULL),
(80, 'Villa 25 de Mayo y Pezzini', 0, 1, '2018-05-12 14:05:11', NULL),
(81, 'Villa Adelante', 0, 1, '2018-05-12 14:05:11', NULL),
(82, 'Villa Aeropuerto', 0, 1, '2018-05-12 14:05:11', NULL),
(83, 'Villa Alta', 0, 1, '2018-05-12 14:05:11', NULL),
(84, 'Villa Altambe', 0, 1, '2018-05-12 14:05:11', NULL),
(85, 'Villa Alvear', 0, 1, '2018-05-12 14:05:11', NULL),
(86, 'Villa Avalos', 0, 1, '2018-05-12 14:05:12', NULL),
(87, 'Villa Barbetti', 0, 1, '2018-05-12 14:05:12', NULL),
(88, 'Villa Camila', 0, 1, '2018-05-12 14:05:12', NULL),
(89, 'Villa Camors', 0, 1, '2018-05-12 14:05:12', NULL),
(90, 'Villa Centenario', 0, 1, '2018-05-12 14:05:12', NULL),
(91, 'Villa Central Norte', 0, 1, '2018-05-12 14:05:12', NULL),
(92, 'Villa Chica', 0, 1, '2018-05-12 14:05:12', NULL),
(93, 'Villa Cortés', 0, 1, '2018-05-12 14:05:12', NULL),
(94, 'Villa del Carmen', 0, 1, '2018-05-12 14:05:12', NULL),
(95, 'Villa del Oeste', 0, 1, '2018-05-12 14:05:12', NULL),
(96, 'Villa del Parque', 0, 1, '2018-05-12 14:05:12', NULL),
(97, 'Villa Don Andrés', 0, 1, '2018-05-12 14:05:12', NULL),
(98, 'Villa Don Enrique', 0, 1, '2018-05-12 14:05:12', NULL),
(99, 'Villa Don Rafael', 0, 1, '2018-05-12 14:05:12', NULL),
(100, 'Villa Don Santiago', 0, 1, '2018-05-12 14:05:12', NULL),
(101, 'Villa Donovan', 0, 1, '2018-05-12 14:05:12', NULL),
(102, 'Villa El Dorado', 0, 1, '2018-05-12 14:05:12', NULL),
(103, 'Villa el Tala', 0, 1, '2018-05-12 14:05:13', NULL),
(104, 'Villa Elba', 0, 1, '2018-05-12 14:05:13', NULL),
(105, 'Villa Lisa', 0, 1, '2018-05-12 14:05:13', NULL),
(106, 'Villa Gonzalito', 0, 1, '2018-05-12 14:05:13', NULL),
(107, 'Villa Gral. Mitre', 0, 1, '2018-05-12 14:05:13', NULL),
(108, 'Villa Jardín', 0, 1, '2018-05-12 14:05:13', NULL),
(109, 'Villa Juan de Garay', 0, 1, '2018-05-12 14:05:13', NULL),
(110, 'Villa la Isla', 0, 1, '2018-05-12 14:05:13', NULL),
(111, 'Villa Libertad', 0, 1, '2018-05-12 14:05:14', NULL),
(112, 'Villa los Lirios', 0, 1, '2018-05-12 14:05:14', NULL),
(113, 'Villa Luisa', 0, 1, '2018-05-12 14:05:14', NULL),
(114, 'Villa María', 0, 1, '2018-05-12 14:05:14', NULL),
(115, 'Villa Mariano Moreno', 0, 1, '2018-05-12 14:05:14', NULL),
(116, 'Villa Marín', 0, 1, '2018-05-12 14:05:14', NULL),
(117, 'Villa Ministro Rawson', 0, 1, '2018-05-12 14:05:14', NULL),
(118, 'Villa Miranda Galindo', 0, 1, '2018-05-12 14:05:14', NULL),
(119, 'Villa Nueva', 0, 1, '2018-05-12 14:05:14', NULL),
(120, 'Villa Odorico', 0, 1, '2018-05-12 14:05:14', NULL),
(121, 'Villa Palermo I', 0, 1, '2018-05-12 14:05:15', NULL),
(122, 'Villa Palermo II', 0, 1, '2018-05-12 14:05:15', NULL),
(123, 'Villa Pegoraro', 0, 1, '2018-05-12 14:05:15', NULL),
(124, 'Villa Progreso', 0, 1, '2018-05-12 14:05:15', NULL),
(125, 'Villa Prosperidad', 0, 1, '2018-05-12 14:05:15', NULL),
(126, 'Villa Luppo', 0, 1, '2018-05-12 14:05:15', NULL),
(127, 'Villa Río Negro', 0, 1, '2018-05-12 14:05:15', NULL),
(128, 'Villa Río Araza', 0, 1, '2018-05-12 14:05:15', NULL),
(129, 'Villa San Juan', 0, 1, '2018-05-12 14:05:15', NULL),
(130, 'Villa San MArtín', 0, 1, '2018-05-12 14:05:15', NULL),
(131, 'Villa Seitor', 0, 1, '2018-05-12 14:05:15', NULL),
(132, 'Villa Sto. Domingo', 0, 1, '2018-05-12 14:05:15', NULL),
(133, 'Villa Te. Saavedra', 0, 1, '2018-05-12 14:05:15', NULL),
(134, 'Villa Universidad', 0, 1, '2018-05-12 14:05:15', NULL),
(135, 'Villa del Loudes', 0, 1, '2018-05-12 14:05:15', NULL),
(136, 'Zona Monte Alto', 0, 1, '2018-05-12 14:05:15', NULL),
(137, 'Zona Terminal', 0, 1, '2018-05-12 14:05:15', NULL),
(138, 'Centro', 0, 5, '2018-05-12 14:05:15', NULL),
(139, 'Itaimbe Mini', 0, 5, '2018-05-12 14:05:15', NULL),
(140, 'Villa Sarita', 0, 5, '2018-05-12 14:05:15', NULL),
(141, 'Ñu Porá', 0, 5, '2018-05-12 14:05:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `nombre`, `descripcion`, `tipo_id`, `created_at`, `updated_at`) VALUES
(1, 'Piso de parquet', NULL, 1, '2018-05-12 14:05:17', NULL),
(2, 'Pileta', NULL, 1, '2018-05-12 14:05:17', NULL),
(3, 'Playa cercana', NULL, 1, '2018-05-12 14:05:17', NULL),
(4, 'Balcón', NULL, 1, '2018-05-12 14:05:17', NULL),
(5, 'Terraza', NULL, 1, '2018-05-12 14:05:17', NULL),
(6, 'Terraza compartida', NULL, 1, '2018-05-12 14:05:17', NULL),
(7, 'Terraza privada', NULL, 1, '2018-05-12 14:05:17', NULL),
(8, 'Wi-Fi Libre', NULL, 1, '2018-05-12 14:05:17', NULL),
(9, 'Picina', NULL, 2, '2018-05-12 14:05:17', NULL),
(10, 'Picina compartida', NULL, 1, '2018-05-12 14:05:17', NULL),
(11, 'Picina privada', NULL, 1, '2018-05-12 14:05:17', NULL),
(12, 'Cocina amueblada', NULL, 1, '2018-05-12 14:05:17', NULL),
(13, 'Parquet', NULL, 2, '2018-05-12 14:05:17', NULL),
(14, 'Céntrico', NULL, 1, '2018-05-12 14:05:17', NULL),
(15, 'Terraza compartida', NULL, 1, '2018-05-12 14:05:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos_liquidaciones_mensuales`
--

CREATE TABLE `conceptos_liquidaciones_mensuales` (
  `id` int(10) UNSIGNED NOT NULL,
  `monto` double(10,2) DEFAULT NULL,
  `periodo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_vencimiento` date DEFAULT NULL,
  `segundo_vencimiento` date DEFAULT NULL,
  `servicio_abonado` tinyint(1) DEFAULT NULL,
  `liquidacionmensual_id` int(10) UNSIGNED DEFAULT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `servicio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conceptos_liquidaciones_mensuales`
--

INSERT INTO `conceptos_liquidaciones_mensuales` (`id`, `monto`, `periodo`, `primer_vencimiento`, `segundo_vencimiento`, `servicio_abonado`, `liquidacionmensual_id`, `contrato_id`, `servicio_id`, `created_at`, `updated_at`) VALUES
(1, 345.50, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 1, '2018-05-12 14:05:37', NULL),
(2, 240.00, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 2, '2018-05-12 14:05:37', NULL),
(3, 1180.60, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 3, '2018-05-12 14:05:37', NULL),
(4, 500.25, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 4, '2018-05-12 14:05:37', NULL),
(5, 180.15, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 5, '2018-05-12 14:05:37', NULL),
(6, 98.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 6, '2018-05-12 14:05:37', NULL),
(7, 198.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 7, '2018-05-12 14:05:37', NULL),
(8, 88.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 8, '2018-05-12 14:05:37', NULL),
(9, 106.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 9, '2018-05-12 14:05:37', NULL),
(10, 298.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 10, '2018-05-12 14:05:37', NULL),
(11, 106.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 11, '2018-05-12 14:05:37', NULL),
(12, 298.75, '1/2018', '2018-01-10', '2018-01-20', 1, 1, 1, 12, '2018-05-12 14:05:38', NULL),
(13, 550.60, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 1, '2018-05-12 14:05:38', NULL),
(14, 240.00, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 2, '2018-05-12 14:05:38', NULL),
(15, 1550.00, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 3, '2018-05-12 14:05:38', NULL),
(16, 400.00, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 4, '2018-05-12 14:05:38', NULL),
(17, 180.15, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 5, '2018-05-12 14:05:38', NULL),
(18, 136.40, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 6, '2018-05-12 14:05:38', NULL),
(19, 198.75, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 7, '2018-05-12 14:05:38', NULL),
(20, 88.75, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 8, '2018-05-12 14:05:38', NULL),
(21, 106.75, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 9, '2018-05-12 14:05:38', NULL),
(22, 298.75, '1/2018', '2018-01-10', '2018-01-20', 1, 2, 2, 10, '2018-05-12 14:05:38', NULL),
(23, 500.00, '2/2018', '2018-03-08', NULL, 1, NULL, 2, 1, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(24, 355.00, '2/2018', '2018-03-09', NULL, 1, NULL, 2, 2, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(25, 675.00, '2/2018', '2018-03-16', NULL, 1, NULL, 2, 3, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(26, 100.00, '2/2018', '2018-03-09', NULL, 1, NULL, 2, 4, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(27, 550.00, '2/2018', '2018-05-10', NULL, 1, NULL, 2, 5, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(28, 675.00, '2/2018', '2018-05-01', NULL, 1, NULL, 2, 6, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(29, 50.00, '2/2018', '2018-05-01', NULL, 1, NULL, 2, 7, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(30, 4000.00, '2/2018', NULL, NULL, 1, NULL, 2, 8, '2018-05-20 17:51:46', '2018-05-20 17:51:46'),
(31, 480.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 1, '2018-05-20 23:05:54', '2018-05-20 23:05:54'),
(32, 345.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 2, '2018-05-20 23:05:54', '2018-05-20 23:05:55'),
(33, 765.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 3, '2018-05-20 23:05:54', '2018-05-20 23:05:55'),
(34, 275.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 4, '2018-05-20 23:05:54', '2018-05-20 23:05:55'),
(35, 150.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 5, '2018-05-20 23:05:54', '2018-05-20 23:05:55'),
(36, 340.00, '1/2018', '2018-05-20', NULL, 1, 3, 4, 6, '2018-05-20 23:05:54', '2018-05-20 23:05:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_renta` enum('fija','creciente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodos` int(11) DEFAULT NULL,
  `fecha_desde` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `incremento` double DEFAULT NULL,
  `comision_propietario` double DEFAULT NULL,
  `comision_inquilino` double DEFAULT NULL,
  `monto_basico` double DEFAULT NULL,
  `sujeto_a_gastos_compartidos` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquilino_id` int(10) UNSIGNED DEFAULT NULL,
  `inmueble_id` int(10) UNSIGNED DEFAULT NULL,
  `garante_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contratos`
--

INSERT INTO `contratos` (`id`, `tipo_renta`, `periodos`, `fecha_desde`, `fecha_hasta`, `incremento`, `comision_propietario`, `comision_inquilino`, `monto_basico`, `sujeto_a_gastos_compartidos`, `descripcion`, `inquilino_id`, `inmueble_id`, `garante_id`, `created_at`, `updated_at`) VALUES
(1, 'creciente', 6, '2018-01-01', '2020-01-01', 10, 9, 3.15, 15000, 1, NULL, 1, 1, 1, '2018-05-12 14:05:31', NULL),
(2, 'fija', 6, '2018-01-01', '2020-01-01', 10, 9, 3.15, 14500, 1, NULL, 7, 2, 2, '2018-05-12 14:05:32', NULL),
(3, 'creciente', 6, '2018-01-01', '2022-01-01', 10, 9, 3.15, 13000, 1, NULL, 3, 3, 3, '2018-05-12 14:05:32', NULL),
(4, 'creciente', 6, '2018-01-01', '2020-01-01', 10, 9, 3.15, 12000, 0, NULL, 4, 4, 4, '2018-05-12 14:05:32', NULL),
(5, 'fija', 6, '2018-01-01', '2022-01-01', 10, 9, 3.15, 17000, 0, NULL, 5, 5, 5, '2018-05-12 14:05:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos_periodos`
--

CREATE TABLE `contratos_periodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `inicio_periodo` int(10) UNSIGNED NOT NULL,
  `fin_periodo` int(10) UNSIGNED NOT NULL,
  `monto_fijo` double(10,2) DEFAULT NULL,
  `monto_incremental` double(10,2) DEFAULT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contratos_periodos`
--

INSERT INTO `contratos_periodos` (`id`, `inicio_periodo`, `fin_periodo`, `monto_fijo`, `monto_incremental`, `contrato_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 17403.75, 15000.00, 1, '2018-05-12 14:05:35', NULL),
(2, 7, 12, 17403.75, 16500.00, 1, '2018-05-12 14:05:35', NULL),
(3, 13, 18, 17403.75, 18150.00, 1, '2018-05-12 14:05:35', NULL),
(4, 19, 24, 17403.75, 19965.00, 1, '2018-05-12 14:05:35', NULL),
(5, 1, 6, 16823.63, 14500.00, 2, '2018-05-12 14:05:35', NULL),
(6, 7, 12, 16823.63, 15950.00, 2, '2018-05-12 14:05:35', NULL),
(7, 13, 18, 16823.63, 17545.00, 2, '2018-05-12 14:05:35', NULL),
(8, 19, 24, 16823.63, 19299.50, 2, '2018-05-12 14:05:35', NULL),
(9, 1, 6, 13923.00, 12000.00, 4, '2018-05-12 14:05:35', NULL),
(10, 7, 12, 13923.00, 13200.00, 4, '2018-05-12 14:05:35', NULL),
(11, 13, 18, 13923.00, 14520.00, 4, '2018-05-12 14:05:35', NULL),
(12, 19, 24, 13923.00, 15972.00, 4, '2018-05-12 14:05:35', NULL),
(13, 1, 6, 13923.00, 12000.00, 4, '2018-05-12 14:05:35', NULL),
(14, 7, 12, 13923.00, 13200.00, 4, '2018-05-12 14:05:35', NULL),
(15, 13, 18, 13923.00, 14520.00, 4, '2018-05-12 14:05:35', NULL),
(16, 19, 24, 13923.00, 15972.00, 4, '2018-05-12 14:05:35', NULL),
(17, 1, 6, 18583.32, 13000.00, 3, '2018-05-12 14:05:36', NULL),
(18, 7, 12, 18583.32, 14300.00, 3, '2018-05-12 14:05:36', NULL),
(19, 13, 18, 18583.32, 15730.00, 3, '2018-05-12 14:05:36', NULL),
(20, 19, 24, 18583.32, 17303.00, 3, '2018-05-12 14:05:36', NULL),
(21, 25, 30, 18583.32, 19033.30, 3, '2018-05-12 14:05:36', NULL),
(22, 31, 36, 18583.32, 20936.63, 3, '2018-05-12 14:05:36', NULL),
(23, 37, 42, 18583.32, 23030.29, 3, '2018-05-12 14:05:36', NULL),
(24, 43, 48, 18583.32, 25333.32, 3, '2018-05-12 14:05:36', NULL),
(25, 1, 6, 24301.26, 17000.00, 5, '2018-05-12 14:05:36', NULL),
(26, 7, 12, 24301.26, 18700.00, 5, '2018-05-12 14:05:36', NULL),
(27, 13, 18, 24301.26, 20570.00, 5, '2018-05-12 14:05:36', NULL),
(28, 19, 24, 24301.26, 22627.00, 5, '2018-05-12 14:05:36', NULL),
(29, 25, 30, 24301.26, 24889.70, 5, '2018-05-12 14:05:36', NULL),
(30, 31, 36, 24301.26, 27378.67, 5, '2018-05-12 14:05:36', NULL),
(31, 37, 42, 24301.26, 30116.54, 5, '2018-05-12 14:05:36', NULL),
(32, 43, 48, 24301.26, 33128.19, 5, '2018-05-12 14:05:36', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos_servicios`
--

CREATE TABLE `contratos_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `servicio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contratos_servicios`
--

INSERT INTO `contratos_servicios` (`id`, `contrato_id`, `servicio_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-05-12 14:05:32', NULL),
(2, 1, 2, '2018-05-12 14:05:32', NULL),
(3, 1, 3, '2018-05-12 14:05:33', NULL),
(4, 1, 4, '2018-05-12 14:05:33', NULL),
(5, 1, 5, '2018-05-12 14:05:33', NULL),
(6, 1, 6, '2018-05-12 14:05:33', NULL),
(7, 1, 7, '2018-05-12 14:05:33', NULL),
(8, 1, 8, '2018-05-12 14:05:33', NULL),
(9, 1, 9, '2018-05-12 14:05:33', NULL),
(10, 1, 10, '2018-05-12 14:05:34', NULL),
(11, 1, 11, '2018-05-12 14:05:34', NULL),
(12, 1, 12, '2018-05-12 14:05:34', NULL),
(13, 2, 1, '2018-05-12 14:05:34', NULL),
(14, 2, 2, '2018-05-12 14:05:34', NULL),
(15, 2, 3, '2018-05-12 14:05:34', NULL),
(16, 2, 4, '2018-05-12 14:05:34', NULL),
(17, 2, 5, '2018-05-12 14:05:34', NULL),
(18, 2, 6, '2018-05-12 14:05:34', NULL),
(19, 2, 7, '2018-05-12 14:05:34', NULL),
(20, 2, 8, '2018-05-12 14:05:34', NULL),
(21, 2, 9, '2018-05-12 14:05:34', NULL),
(22, 2, 10, '2018-05-12 14:05:34', NULL),
(23, 2, 11, '2018-05-12 14:05:34', NULL),
(24, 2, 12, '2018-05-12 14:05:34', NULL),
(25, 3, 1, '2018-05-12 14:05:34', NULL),
(26, 3, 2, '2018-05-12 14:05:34', NULL),
(27, 3, 3, '2018-05-12 14:05:34', NULL),
(28, 3, 4, '2018-05-12 14:05:34', NULL),
(29, 3, 5, '2018-05-12 14:05:34', NULL),
(30, 3, 6, '2018-05-12 14:05:34', NULL),
(31, 3, 7, '2018-05-12 14:05:34', NULL),
(32, 3, 8, '2018-05-12 14:05:34', NULL),
(33, 3, 9, '2018-05-12 14:05:34', NULL),
(34, 3, 10, '2018-05-12 14:05:34', NULL),
(35, 3, 11, '2018-05-12 14:05:34', NULL),
(36, 3, 12, '2018-05-12 14:05:34', NULL),
(37, 4, 1, '2018-05-12 14:05:34', NULL),
(38, 4, 2, '2018-05-12 14:05:34', NULL),
(39, 4, 3, '2018-05-12 14:05:35', NULL),
(40, 4, 4, '2018-05-12 14:05:35', NULL),
(41, 4, 5, '2018-05-12 14:05:35', NULL),
(42, 4, 6, '2018-05-12 14:05:35', NULL),
(43, 5, 1, '2018-05-12 14:05:35', NULL),
(44, 5, 2, '2018-05-12 14:05:35', NULL),
(45, 5, 3, '2018-05-12 14:05:35', NULL),
(46, 5, 4, '2018-05-12 14:05:35', NULL),
(47, 5, 5, '2018-05-12 14:05:35', NULL),
(48, 5, 6, '2018-05-12 14:05:35', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conversaciones`
--

INSERT INTO `conversaciones` (`id`, `created_at`, `updated_at`) VALUES
(1, '2018-05-12 14:05:39', NULL),
(2, '2018-05-14 00:21:04', '2018-05-14 00:21:04'),
(3, '2018-05-26 16:06:09', '2018-05-26 16:06:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE `edificios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `administrado_por_sistema` tinyint(1) DEFAULT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cochera` tinyint(1) DEFAULT NULL,
  `cant_ascensores` int(11) DEFAULT NULL,
  `cant_deptos` int(11) DEFAULT NULL,
  `costo_sueldos_personal` double(10,2) DEFAULT NULL,
  `valor_ascensores` double(10,2) DEFAULT NULL,
  `costo_mant_ascensores` double(10,2) DEFAULT NULL,
  `costo_limpieza` double(10,2) DEFAULT NULL,
  `costo_seguro` double(10,2) DEFAULT NULL,
  `fecha_habilitacion` date DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barrio_id` int(10) UNSIGNED DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `edificios`
--

INSERT INTO `edificios` (`id`, `nombre`, `direccion`, `longitud`, `latitud`, `administrado_por_sistema`, `imagen`, `cochera`, `cant_ascensores`, `cant_deptos`, `costo_sueldos_personal`, `valor_ascensores`, `costo_mant_ascensores`, `costo_limpieza`, `costo_seguro`, `fecha_habilitacion`, `descripcion`, `barrio_id`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, 'Modena', 'Entre Ríos 142', '-27.4605598', '-58.9838905', 1, 'sin_imagen.png', 1, 2, 18, 10000.00, 500000.00, 7000.00, 8000.00, 7500.00, '2010-10-01', 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.', 1, 1, '2018-05-12 14:05:15', NULL),
(2, 'Condominio del Este', 'Monteagudo 695', '-27.4605598', '-58.9838905', 0, 'sin_imagen.png', 1, 1, 17, 22000.00, 1500000.00, 4000.00, 1000.00, 7500.00, '2005-10-01', 'Situado en zona centrica de Resistencia, Condominio del Este es un apart residencial con patio frontal, terraza con parrillas y seguridad las 24hs del día.', 2, 1, '2018-05-12 14:05:15', NULL),
(3, 'Los Robles', 'Av. Ávalos y Entre Rios', '-27.4605598', '-58.9838905', 1, 'sin_imagen.png', 1, 2, 25, 7500.00, 500000.00, 7000.00, 8000.00, 7500.00, '2010-10-01', 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.', 3, 1, '2018-05-12 14:05:15', NULL),
(4, 'Torres Sarmiento', 'Juan D. Perón al 1400', '-27.4605598', '-58.9838905', 0, 'sin_imagen.png', 1, 2, 18, 7500.00, 500000.00, 7000.00, 8000.00, 7500.00, '2010-10-01', 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.', 4, 1, '2018-05-12 14:05:15', NULL),
(5, 'Torre Vista', 'Salta 289', '-27.4605598', '-58.9838905', 0, 'sin_imagen.png', 1, 2, 26, 7500.00, 500000.00, 7000.00, 8000.00, 7500.00, '2010-10-01', 'La nueva sede del BCE es un conjunto arquitectónico formado por tres elementos principales: el Grossmarkthalle (antiguo mercado mayorista de Fráncfort), dotado de nuevas estructuras internas; un rascacielos formado por dos torres de oficinas conectadas por un atrio; y el edificio de entrada, que crea una conexión visual entre el Grossmarkthalle y el rascacielos y es el acceso principal al BCE desde la calle Sonnemannstrasse.', 5, 1, '2018-05-12 14:05:15', NULL),
(6, 'Torre Kuszniruk', 'Corrientes 2247', '-27.4605598', '-58.9838905', 1, 'sin_imagen.png', 0, 0, 6, 0.00, 0.00, 0.00, 0.00, 0.00, '2005-10-01', 'Edificio autoadministrado', 138, 5, '2018-05-12 14:05:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios_caracteristicas`
--

CREATE TABLE `edificios_caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `caracteristica_id` int(10) UNSIGNED NOT NULL,
  `edificio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `edificios_caracteristicas`
--

INSERT INTO `edificios_caracteristicas` (`id`, `caracteristica_id`, `edificio_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2018-05-12 14:05:22', NULL),
(2, 9, 1, '2018-05-12 14:05:22', NULL),
(3, 14, 1, '2018-05-12 14:05:23', NULL),
(4, 8, 2, '2018-05-12 14:05:23', NULL),
(5, 9, 2, '2018-05-12 14:05:23', NULL),
(6, 14, 2, '2018-05-12 14:05:23', NULL),
(7, 8, 3, '2018-05-12 14:05:23', NULL),
(8, 9, 3, '2018-05-12 14:05:23', NULL),
(9, 14, 3, '2018-05-12 14:05:23', NULL),
(10, 8, 4, '2018-05-12 14:05:23', NULL),
(11, 9, 4, '2018-05-12 14:05:23', NULL),
(12, 14, 4, '2018-05-12 14:05:23', NULL),
(13, 8, 5, '2018-05-12 14:05:23', NULL),
(14, 9, 5, '2018-05-12 14:05:23', NULL),
(15, 14, 5, '2018-05-12 14:05:23', NULL);

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
(1, 'Cocina', '2018-05-12 14:05:22', NULL),
(2, 'Comedor', '2018-05-12 14:05:22', NULL),
(3, 'Closet', '2018-05-12 14:05:22', NULL),
(4, 'Baño', '2018-05-12 14:05:22', NULL),
(5, 'Garage', '2018-05-12 14:05:22', NULL),
(6, 'Living', '2018-05-12 14:05:22', NULL),
(7, 'Salón de juegos', '2018-05-12 14:05:22', NULL),
(8, 'Habitación 1', '2018-05-12 14:05:22', NULL),
(9, 'Habitación 2', '2018-05-12 14:05:22', NULL),
(10, 'Habitación 3', '2018-05-12 14:05:22', NULL),
(11, 'Baño 1', '2018-05-12 14:05:22', NULL),
(12, 'Baño 2', '2018-05-12 14:05:22', NULL),
(13, 'Baño 3', '2018-05-12 14:05:22', NULL),
(14, 'Terraza', '2018-05-12 14:05:22', NULL),
(15, 'Quincho', '2018-05-12 14:05:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_oportunidades`
--

CREATE TABLE `estados_oportunidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_oportunidades`
--

INSERT INTO `estados_oportunidades` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Inicial', '2018-05-12 14:05:30', NULL),
(2, 'En negociación', '2018-05-12 14:05:30', NULL),
(3, 'Prospecto', '2018-05-12 14:05:30', NULL),
(4, 'En trámite', '2018-05-12 14:05:30', NULL),
(5, 'Eliminada', '2018-05-12 14:05:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_users_mensajes`
--

CREATE TABLE `estado_users_mensajes` (
  `id` int(10) UNSIGNED NOT NULL,
  `mensaje_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `leido` tinyint(1) DEFAULT NULL,
  `enviado` tinyint(1) DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT NULL,
  `papelera` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_users_mensajes`
--

INSERT INTO `estado_users_mensajes` (`id`, `mensaje_id`, `user_id`, `leido`, `enviado`, `destacado`, `papelera`, `created_at`, `updated_at`) VALUES
(9, 5, 47, NULL, 1, NULL, NULL, '2018-05-14 00:32:16', '2018-05-14 00:32:16'),
(10, 5, 5, NULL, NULL, NULL, NULL, '2018-05-14 00:32:16', '2018-05-14 00:32:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantes`
--

CREATE TABLE `garantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `garantes`
--

INSERT INTO `garantes` (`id`, `descripcion`, `persona_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 11, '2018-05-12 14:05:21', NULL),
(2, NULL, 12, '2018-05-12 14:05:21', NULL),
(3, NULL, 13, '2018-05-12 14:05:21', NULL),
(4, NULL, 14, '2018-05-12 14:05:21', NULL),
(5, NULL, 15, '2018-05-12 14:05:21', NULL),
(6, NULL, 16, '2018-05-12 14:05:21', NULL),
(7, NULL, 17, '2018-05-12 14:05:21', NULL),
(8, NULL, 18, '2018-05-12 14:05:21', NULL),
(9, NULL, 19, '2018-05-12 14:05:21', NULL),
(10, NULL, 20, '2018-05-12 14:05:21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias_oportunidades`
--

CREATE TABLE `historias_oportunidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_previo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_actual` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cambio_estado` tinyint(1) DEFAULT NULL,
  `oportunidad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` enum('alquiler','venta','alquiler/venta') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorReal` double NOT NULL,
  `valorVenta` double NOT NULL,
  `valorAlquiler` double NOT NULL,
  `superficie` double NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numDepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHabilitacion` date DEFAULT NULL,
  `linkVideo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadAmbientes` int(11) NOT NULL,
  `cantidadBaños` int(11) NOT NULL,
  `cantidadGarages` int(11) NOT NULL,
  `cantidadDormitorios` int(11) NOT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edificio_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `propietario_id` int(10) UNSIGNED DEFAULT NULL,
  `barrio_id` int(10) UNSIGNED DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id`, `condicion`, `valorReal`, `valorVenta`, `valorAlquiler`, `superficie`, `direccion`, `piso`, `numDepto`, `fechaHabilitacion`, `linkVideo`, `longitud`, `latitud`, `cantidadAmbientes`, `cantidadBaños`, `cantidadGarages`, `cantidadDormitorios`, `disponible`, `descripcion`, `edificio_id`, `tipo_id`, `propietario_id`, `barrio_id`, `localidad_id`, `created_at`, `updated_at`) VALUES
(1, 'alquiler', 3330000, 4000000, 15000, 85, 'Entre Ríos 142', '4', '5', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 2, 1, 2, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 1, 1, 11, 14, 1, '2018-05-12 14:05:21', NULL),
(2, 'alquiler', 2250000, 3000000, 14500, 80, 'Entre Ríos 142', '2', '9', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 2, 1, 2, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 1, 1, 13, 14, 1, '2018-05-12 14:05:21', NULL),
(3, 'alquiler', 3500000, 4500000, 13000, 95, 'Av. Ávalos y Entre Rios', '3', '10', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 4, 2, 1, 2, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 3, 1, 3, 14, 1, '2018-05-12 14:05:21', NULL),
(4, 'alquiler', 2500000, 3100000, 12000, 90, 'Juan D. Perón al 1400', '3', '7', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 2, 1, 3, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 4, 1, 4, 14, 1, '2018-05-12 14:05:21', NULL),
(5, 'alquiler', 5000000, 8000000, 17000, 110, 'Salta 289', '5', '8', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 2, 1, 3, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 5, 1, 13, 14, 1, '2018-05-12 14:05:22', NULL),
(6, 'alquiler', 1200000, 2000000, 5000, 85, 'Monteagudo 695', '3', '3', '2006-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 3, 1, 1, 1, 1, 'Depto de Juan Pablo Cáceres', 2, 1, 12, 14, 1, '2018-05-12 14:05:22', NULL),
(7, 'alquiler', 1200000, 2000000, 5000, 85, 'Monteagudo 695', '3', '4', '2006-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 3, 1, 1, 1, 1, 'Depto de Juan Pablo Cáceres', 2, 1, 6, 14, 1, '2018-05-12 14:05:22', NULL),
(8, 'alquiler', 1200000, 2000000, 5000, 85, 'Monteagudo 695', '2', '3', '2006-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 3, 1, 1, 1, 1, '', 2, 1, 6, 14, 1, '2018-05-12 14:05:22', NULL),
(9, 'alquiler', 1200000, 2000000, 5000, 85, 'Monteagudo 695', '1', '5', '2006-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 3, 1, 1, 1, 1, '', 2, 1, 6, 14, 1, '2018-05-12 14:05:22', NULL),
(10, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '3', '1', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(11, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '2', '1', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(12, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '2', '2', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(13, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '1', '1', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(14, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '1', '2', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(15, 'alquiler', 9805000, 1200000, 4000, 75, 'Corrientes 2247', '1', '3', '2014-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 1, 0, 2, 1, 'Departamento de prueba HACHO -- Edificio CloudProp', 6, 1, 11, 138, 5, '2018-05-12 14:05:22', NULL),
(16, 'alquiler', 2750000, 3300000, 9500, 70, 'Av. Ávalos y Entre Rios', '2', '4', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 4, 2, 1, 2, 0, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 3, 1, 9, 14, 1, '2018-05-12 14:05:22', NULL),
(17, 'alquiler', 3100000, 3750000, 9500, 75, 'Av. Ávalos y Entre Rios', '5', '5', '2018-01-01', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', '-27.4605598', '-58.9838905', 5, 2, 1, 2, 0, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 3, 1, 10, 14, 1, '2018-05-12 14:05:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_caracteristicas`
--

CREATE TABLE `inmuebles_caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `caracteristica_id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles_caracteristicas`
--

INSERT INTO `inmuebles_caracteristicas` (`id`, `caracteristica_id`, `inmueble_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-05-12 14:05:23', NULL),
(2, 2, 1, '2018-05-12 14:05:23', NULL),
(3, 3, 1, '2018-05-12 14:05:23', NULL),
(4, 4, 1, '2018-05-12 14:05:23', NULL),
(5, 5, 1, '2018-05-12 14:05:23', NULL),
(6, 1, 2, '2018-05-12 14:05:23', NULL),
(7, 2, 2, '2018-05-12 14:05:23', NULL),
(8, 3, 2, '2018-05-12 14:05:23', NULL),
(9, 4, 2, '2018-05-12 14:05:23', NULL),
(10, 5, 2, '2018-05-12 14:05:23', NULL),
(11, 1, 3, '2018-05-12 14:05:23', NULL),
(12, 2, 3, '2018-05-12 14:05:24', NULL),
(13, 3, 3, '2018-05-12 14:05:24', NULL),
(14, 4, 3, '2018-05-12 14:05:24', NULL),
(15, 5, 3, '2018-05-12 14:05:24', NULL),
(16, 1, 4, '2018-05-12 14:05:24', NULL),
(17, 2, 4, '2018-05-12 14:05:24', NULL),
(18, 3, 4, '2018-05-12 14:05:24', NULL),
(19, 4, 4, '2018-05-12 14:05:24', NULL),
(20, 5, 4, '2018-05-12 14:05:24', NULL),
(21, 1, 5, '2018-05-12 14:05:24', NULL),
(22, 2, 5, '2018-05-12 14:05:24', NULL),
(23, 3, 5, '2018-05-12 14:05:24', NULL),
(24, 4, 5, '2018-05-12 14:05:24', NULL),
(25, 5, 5, '2018-05-12 14:05:24', NULL),
(26, 1, 6, '2018-05-12 14:05:24', NULL),
(27, 2, 6, '2018-05-12 14:05:24', NULL),
(28, 3, 6, '2018-05-12 14:05:24', NULL),
(29, 4, 6, '2018-05-12 14:05:24', NULL),
(30, 5, 6, '2018-05-12 14:05:25', NULL),
(31, 1, 7, '2018-05-12 14:05:25', NULL),
(32, 2, 7, '2018-05-12 14:05:25', NULL),
(33, 3, 7, '2018-05-12 14:05:25', NULL),
(34, 4, 7, '2018-05-12 14:05:26', NULL),
(35, 5, 7, '2018-05-12 14:05:26', NULL),
(36, 1, 8, '2018-05-12 14:05:26', NULL),
(37, 2, 8, '2018-05-12 14:05:26', NULL),
(38, 3, 8, '2018-05-12 14:05:27', NULL),
(39, 4, 8, '2018-05-12 14:05:27', NULL),
(40, 5, 8, '2018-05-12 14:05:27', NULL),
(41, 1, 9, '2018-05-12 14:05:27', NULL),
(42, 2, 9, '2018-05-12 14:05:27', NULL),
(43, 3, 9, '2018-05-12 14:05:27', NULL),
(44, 4, 9, '2018-05-12 14:05:27', NULL),
(45, 5, 9, '2018-05-12 14:05:27', NULL),
(46, 1, 10, '2018-05-12 14:05:27', NULL),
(47, 2, 10, '2018-05-12 14:05:27', NULL),
(48, 3, 10, '2018-05-12 14:05:27', NULL),
(49, 4, 10, '2018-05-12 14:05:27', NULL),
(50, 5, 10, '2018-05-12 14:05:27', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_imagenes`
--

CREATE TABLE `inmuebles_imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion_imagen` enum('slider','portada','planoMin','planoMax','detalle') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inmueble_id` int(10) UNSIGNED DEFAULT NULL,
  `espacio_id` int(10) UNSIGNED DEFAULT NULL,
  `proyecto_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inmuebles_imagenes`
--

INSERT INTO `inmuebles_imagenes` (`id`, `nombre`, `seccion_imagen`, `inmueble_id`, `espacio_id`, `proyecto_id`, `created_at`, `updated_at`) VALUES
(1, 'INube_1510029727.jpg', 'portada', 1, NULL, NULL, '2018-05-12 14:05:28', NULL),
(2, 'INube_slide1500132465.jpg', 'slider', 1, NULL, NULL, '2018-05-12 14:05:28', NULL),
(3, 'INube_detalle1_1500132465.jpg', 'detalle', 1, 6, NULL, '2018-05-12 14:05:28', NULL),
(4, 'INube_detalle2_1500132465.jpg', 'detalle', 1, 4, NULL, '2018-05-12 14:05:28', NULL),
(5, 'INube_detalle3_1500132465.jpg', 'detalle', 1, 8, NULL, '2018-05-12 14:05:28', NULL),
(6, 'INube_detalle4_1500132465.jpg', 'detalle', 1, 1, NULL, '2018-05-12 14:05:28', NULL),
(7, 'INube_plano1_1500132465.jpg', 'planoMin', 1, NULL, NULL, '2018-05-12 14:05:28', NULL),
(8, 'INube_plano2_1500132465.jpg', 'planoMin', 1, NULL, NULL, '2018-05-12 14:05:28', NULL),
(9, 'INube_1500132242.jpg', 'portada', 2, NULL, NULL, '2018-05-12 14:05:28', NULL),
(10, 'INube_slide14929773971.jpg', 'slider', 2, NULL, NULL, '2018-05-12 14:05:28', NULL),
(11, 'INube_1493159869.jpg', 'portada', 3, NULL, NULL, '2018-05-12 14:05:28', NULL),
(12, 'INube_slide1492977397.jpg', 'slider', 3, NULL, NULL, '2018-05-12 14:05:28', NULL),
(13, 'INube_1510029727.jpg', 'portada', 4, NULL, NULL, '2018-05-12 14:05:28', NULL),
(14, 'INube_slide14929687678.jpg', 'slider', 4, NULL, NULL, '2018-05-12 14:05:28', NULL),
(15, 'INube_1495472610.jpg', 'slider', NULL, NULL, 1, '2018-05-12 14:05:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquilinos`
--

CREATE TABLE `inquilinos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inquilinos`
--

INSERT INTO `inquilinos` (`id`, `descripcion`, `persona_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2018-05-12 14:05:17', NULL),
(2, NULL, 3, '2018-05-12 14:05:17', NULL),
(3, NULL, 2, '2018-05-12 14:05:17', NULL),
(4, NULL, 4, '2018-05-12 14:05:17', NULL),
(5, NULL, 35, '2018-05-12 14:05:18', NULL),
(6, NULL, 6, '2018-05-12 14:05:18', NULL),
(7, NULL, 7, '2018-05-12 14:05:18', NULL),
(8, NULL, 8, '2018-05-12 14:05:18', NULL),
(9, NULL, 9, '2018-05-12 14:05:18', NULL),
(10, NULL, 10, '2018-05-12 14:05:18', NULL),
(11, NULL, 32, '2018-05-12 14:05:18', NULL),
(12, NULL, 33, '2018-05-12 14:05:18', NULL),
(13, NULL, 34, '2018-05-12 14:05:18', NULL),
(14, NULL, 35, '2018-05-12 14:05:18', NULL),
(15, NULL, 36, '2018-05-12 14:05:18', NULL),
(16, NULL, 37, '2018-05-12 14:05:18', NULL),
(17, NULL, 38, '2018-05-12 14:05:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidaciones_mensuales`
--

CREATE TABLE `liquidaciones_mensuales` (
  `id` int(10) UNSIGNED NOT NULL,
  `periodo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alquiler` double(10,2) DEFAULT NULL,
  `gastos_administrativos` double(10,2) DEFAULT NULL,
  `comision_a_propietario` double(10,2) DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `total` double(10,2) DEFAULT NULL,
  `subtotal` double(10,2) DEFAULT NULL,
  `saldo_periodo` double(10,2) DEFAULT NULL,
  `abonado` double(10,2) DEFAULT NULL,
  `fecha_cobro_inquilino` datetime DEFAULT NULL,
  `fecha_pago_propietario` datetime DEFAULT NULL,
  `fecha_cobro_propietario` datetime DEFAULT NULL,
  `contrato_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `liquidaciones_mensuales`
--

INSERT INTO `liquidaciones_mensuales` (`id`, `periodo`, `alquiler`, `gastos_administrativos`, `comision_a_propietario`, `vencimiento`, `total`, `subtotal`, `saldo_periodo`, `abonado`, `fecha_cobro_inquilino`, `fecha_pago_propietario`, `fecha_cobro_propietario`, `contrato_id`, `created_at`, `updated_at`) VALUES
(1, '1/2018', 15000.00, 472.50, 1350.00, NULL, 16822.50, 16822.50, NULL, NULL, '2018-05-10 00:00:00', NULL, '2018-05-14 00:00:00', 1, '2018-06-12 14:05:36', NULL),
(2, '1/2018', 15000.00, 472.50, 1350.00, '2018-03-10', 16822.50, 16822.50, 0.00, 37412.50, '2018-05-20 15:06:10', NULL, NULL, 2, '2018-05-12 14:05:37', '2018-05-20 18:06:10'),
(3, '1/2018', 12000.00, 378.00, 1080.00, '2018-04-20', 14733.00, 14733.00, NULL, NULL, NULL, NULL, NULL, 4, '2018-05-20 23:05:54', '2018-05-20 23:06:58');

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
(1, 'Resistencia', '3500', 6, '2018-05-12 14:05:06', NULL),
(2, 'Barranqueras', '3510', 6, '2018-05-12 14:05:06', NULL),
(3, 'Villa Ángela', '3513', 6, '2018-05-12 14:05:06', NULL),
(4, 'Fontana', '3519', 6, '2018-05-12 14:05:07', NULL),
(5, 'Posadas', '3300', 1, '2018-05-12 14:05:07', NULL),
(6, 'Sáenz Peña', '3700', 6, '2018-05-12 14:05:07', NULL),
(7, 'Corrientes', '3400', 2, '2018-05-12 14:05:07', NULL),
(8, 'Ituzaingó', '3302', 2, '2018-05-12 14:05:07', NULL),
(9, 'Puerto Vilelas', '3503', 6, '2018-05-12 14:05:07', NULL),
(10, 'Colonia Baranda', '3733', 6, '2018-05-12 14:05:07', NULL),
(11, 'Puerto Tirol', '3505', 6, '2018-05-12 14:05:07', NULL),
(12, 'Colonia Benitez', '3505', 6, '2018-05-12 14:05:07', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(10) UNSIGNED NOT NULL,
  `conversacion_id` int(10) UNSIGNED NOT NULL,
  `mensaje` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `conversacion_id`, `mensaje`, `created_at`, `updated_at`) VALUES
(5, 2, 'Hola Mirta, para cuando estas necesitando que vaya a ver tu balcon?', '2018-05-14 00:32:16', '2018-05-14 00:32:16');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_07_194421_create_table_paises', 1),
(4, '2017_12_07_194455_create_table_provincias', 1),
(5, '2017_12_07_194527_create_table_localidades', 1),
(6, '2017_12_07_194615_create_table_barrios', 1),
(7, '2017_12_07_195112_create_table_edificios', 1),
(8, '2017_12_07_195316_create_table_personas', 1),
(9, '2017_12_07_195808_create_table_tipos', 1),
(10, '2017_12_07_195813_create_table_caracteristicas', 1),
(11, '2017_12_07_200151_create_table_inquilinos', 1),
(12, '2017_12_07_200212_create_table_propietarios', 1),
(13, '2017_12_07_200233_create_table_garantes', 1),
(14, '2017_12_07_200435_create_table_inmuebles', 1),
(15, '2017_12_07_200612_create_table_espacios', 1),
(16, '2017_12_07_200804_create_table_proyectos', 1),
(17, '2017_12_07_201006_create_table_inmuebles_imagenes', 1),
(18, '2017_12_07_201131_create_table_edificios_caracteristicas', 1),
(19, '2017_12_07_201308_create_table_inmuebles_caracteristicas', 1),
(20, '2017_12_08_194212_create_table_servicios', 1),
(21, '2017_12_08_194447_create_table_estados_oportunidades', 1),
(22, '2017_12_08_194611_create_table_oportunidades', 1),
(23, '2017_12_08_195002_create_table_contratos', 1),
(24, '2017_12_08_195302_create_table_contratos_periodos', 1),
(25, '2017_12_08_195356_create_table_contratos_servicios', 1),
(26, '2017_12_08_195645_create_table_liquidaciones_mensuales', 1),
(27, '2017_12_08_195743_create_table_conceptos_liquidaciones_mensuales', 1),
(28, '2017_12_08_200101_create_table_historias_oportunidades', 1),
(29, '2017_12_09_164600_create_table_responiva', 1),
(30, '2017_12_09_164605_create_table_configs', 1),
(31, '2018_01_04_091744_create_permission_tables', 1),
(32, '2018_03_10_200151_create_table_rubrostecnicos', 1),
(33, '2018_03_17_200152_create_table_tecnicos', 1),
(34, '2018_03_20_200875_create_table_solicitudesServicio', 1),
(35, '2018_04_09_124230_create_table_conversaciones', 1),
(36, '2018_04_09_124305_create_table_users_conversaciones', 1),
(37, '2018_04_09_124324_create_table_mensajes', 1),
(38, '2018_04_09_124411_create_table_detalle_mensajes', 1),
(39, '2018_04_19_200341_create_table_visitas', 1),
(40, '2018_04_20_122233_create_table_movimientos', 1),
(41, '2018_05_19_064518_create_table_notificaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_id`, `model_type`) VALUES
(1, 2, 'App\\User'),
(1, 3, 'App\\User'),
(2, 6, 'App\\User'),
(2, 7, 'App\\User'),
(2, 8, 'App\\User'),
(2, 9, 'App\\User'),
(2, 10, 'App\\User'),
(2, 11, 'App\\User'),
(2, 12, 'App\\User'),
(2, 13, 'App\\User'),
(2, 14, 'App\\User'),
(2, 15, 'App\\User'),
(2, 16, 'App\\User'),
(2, 17, 'App\\User'),
(2, 18, 'App\\User'),
(2, 19, 'App\\User'),
(2, 20, 'App\\User'),
(2, 21, 'App\\User'),
(2, 22, 'App\\User'),
(2, 23, 'App\\User'),
(2, 24, 'App\\User'),
(2, 25, 'App\\User'),
(2, 26, 'App\\User'),
(2, 27, 'App\\User'),
(2, 28, 'App\\User'),
(2, 29, 'App\\User'),
(2, 30, 'App\\User'),
(2, 31, 'App\\User'),
(2, 32, 'App\\User'),
(2, 33, 'App\\User'),
(2, 34, 'App\\User'),
(2, 35, 'App\\User'),
(2, 36, 'App\\User'),
(2, 37, 'App\\User'),
(2, 38, 'App\\User'),
(2, 39, 'App\\User'),
(2, 40, 'App\\User'),
(2, 41, 'App\\User'),
(2, 42, 'App\\User'),
(3, 1, 'App\\User'),
(3, 43, 'App\\User'),
(3, 45, 'App\\User'),
(3, 47, 'App\\User'),
(4, 5, 'App\\User'),
(5, 4, 'App\\User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `tipo_movimiento` enum('entrada','salida') COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` double(10,2) NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `inquilino_id` int(10) UNSIGNED DEFAULT NULL,
  `tecnico_id` int(10) UNSIGNED DEFAULT NULL,
  `propietario_id` int(10) UNSIGNED DEFAULT NULL,
  `liquidacion_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo_mov_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `fecha_hora`, `tipo_movimiento`, `monto`, `descripcion`, `user_id`, `inquilino_id`, `tecnico_id`, `propietario_id`, `liquidacion_id`, `tipo_mov_id`, `created_at`, `updated_at`) VALUES
(1, '2018-05-14 00:00:00', 'salida', 5945.31, 'Pago de honorarios a martillero público', 2, NULL, NULL, NULL, NULL, 0, '2018-05-14 21:24:40', '2018-05-14 21:24:40'),
(2, '2018-05-19 00:00:00', 'salida', 2974.51, 'campaña marketing mayo', 2, NULL, NULL, NULL, NULL, 1, '2018-05-19 20:51:44', '2018-05-19 20:51:44'),
(3, '2018-05-20 00:00:00', 'entrada', 37412.50, 'Se recibe un pago por $37412.5. Correspondiente a la liquidación del periodo 1/2018.', 4, NULL, NULL, NULL, 2, NULL, '2018-05-20 18:06:10', '2018-05-20 18:06:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `mensaje` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` enum('agenda','oportunidad','pago','vencimiento','confirmacion_visita','visita','calificacion','visita_del_dia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_leido` tinyint(1) DEFAULT NULL,
  `ocultar` tinyint(1) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `visita_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `mensaje`, `tipo`, `estado_leido`, `ocultar`, `user_id`, `visita_id`, `created_at`, `updated_at`) VALUES
(1, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-12 14:45:38', '2018-05-20 22:57:43'),
(2, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-13 19:56:40', '2018-05-20 22:57:43'),
(3, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 4, NULL, '2018-05-14 02:49:02', '2018-05-20 22:57:43'),
(4, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-14 21:07:24', '2018-05-20 22:57:43'),
(5, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-15 03:02:33', '2018-05-20 22:57:43'),
(6, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-16 03:03:44', '2018-05-20 22:57:43'),
(7, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-17 20:01:09', '2018-05-20 22:57:43'),
(8, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-18 17:03:11', '2018-05-20 22:57:43'),
(9, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-19 03:19:06', '2018-05-20 22:57:43'),
(10, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 4, NULL, '2018-05-20 03:00:13', '2018-05-20 22:57:43'),
(11, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-20 17:34:24', '2018-05-20 22:57:43'),
(12, 'Estimado cliente le informamos que la boleta correspondiente al periodo 1/2018 ya se encuentra lista. La misma vence el 2018-03-10 00:00:00.', 'pago', 1, 0, 7, NULL, '2018-05-20 17:52:41', '2018-05-20 22:57:43'),
(13, 'Estimado cliente le informamos que se encuentra disponible el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a acercarse a nuestras instalaciones para poder retirar el saldo correspondiente.', 'pago', 1, 0, 32, NULL, '2018-05-20 18:06:10', '2018-05-20 22:57:43'),
(14, 'Se encuentra disponible la liquidación para el inquilino Andrea  Ríos Lópezpor el periodo 1/2018. Cuando se le asigne una fecha de vencimiento se informará al inquilino de su diponibilidad', 'pago', 1, 0, 2, NULL, '2018-05-20 23:05:54', '2018-05-20 23:06:05'),
(15, 'Estimado cliente le informamos que la boleta correspondiente al periodo 1/2018 ya se encuentra lista. La misma vence el 2018-04-20 00:00:00.', 'pago', 1, 0, 4, NULL, '2018-05-20 23:06:58', '2018-05-28 20:54:10'),
(16, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 1, 0, 4, NULL, '2018-05-20 23:12:30', '2018-05-28 20:54:10'),
(17, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-24 02:05:25', '2018-05-28 20:54:10'),
(18, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 1, 0, 4, NULL, '2018-05-24 02:10:29', '2018-05-28 20:54:10'),
(19, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 4, NULL, '2018-05-24 02:10:29', '2018-05-28 20:54:10'),
(20, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-24 03:17:08', '2018-05-28 20:54:10'),
(21, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 1, 0, 4, NULL, '2018-05-24 03:25:04', '2018-05-28 20:54:11'),
(22, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 4, NULL, '2018-05-24 03:25:05', '2018-05-28 20:54:11'),
(23, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-25 16:05:24', '2018-05-28 20:54:11'),
(24, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-26 03:17:07', '2018-05-28 20:54:11'),
(25, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-27 04:06:11', '2018-05-28 20:54:11'),
(26, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 1, 0, 2, NULL, '2018-05-28 20:32:50', '2018-05-28 20:54:11'),
(27, 'Estimado cliente le informamos que se agendó una visita a su inmueble para atender la solicitud que usted realizó para 29/5/2018 00:00. Le solicitamos que confirme la visita para que el profesional proceda.', 'confirmacion_visita', 0, 0, 4, 2, '2018-05-28 22:07:03', '2018-05-28 22:07:03'),
(28, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 0, 0, 4, NULL, '2018-05-28 22:07:53', '2018-05-28 22:07:53'),
(29, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 0, 0, 4, NULL, '2018-05-28 22:07:54', '2018-05-28 22:07:54'),
(30, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 0, 0, 2, NULL, '2018-05-29 22:26:29', '2018-05-29 22:26:29'),
(31, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 0, 0, 4, NULL, '2018-05-31 02:38:11', '2018-05-31 02:38:11'),
(32, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 0, 0, 4, NULL, '2018-05-31 02:38:11', '2018-05-31 02:38:11'),
(33, 'Estimado cliente le recordamos que adeuda el pago de la mensualidad correspondiente al periodo 1/2018. Le invitamos a contactarse con nosotros para regularizar su situación y así evitar más cargos por mora.', 'vencimiento', 0, 0, 4, NULL, '2018-06-01 02:31:21', '2018-06-01 02:31:21'),
(34, 'Existen 12 solicitudes de visitas a inmuebles. Ingresa a la sección oportunidades para darle tratamiento.', 'oportunidad', 0, 0, 4, NULL, '2018-06-01 02:31:21', '2018-06-01 02:31:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oportunidades`
--

CREATE TABLE `oportunidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_interesado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solicitud_atendida` tinyint(1) DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensaje` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `inmueble_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oportunidades`
--

INSERT INTO `oportunidades` (`id`, `nombre_interesado`, `solicitud_atendida`, `telefono`, `mensaje`, `email`, `estado_id`, `inmueble_id`, `created_at`, `updated_at`) VALUES
(1, 'Juancho Tacorta', NULL, '(362) 442 - 6005', 'Buenas, estoy interezado en el departamento 5 del inmueble de Entre Ríos 142', 'juribe@idiomas.udea.edu.co', 1, 1, '2018-05-12 14:05:30', NULL),
(2, 'Martín Zapiola', NULL, '(362) 443 - 2168', 'Buenas, estoy interezado en el departamento número 5 del inmueble de Av. Ávalos y Entre Rios', 'vivian_981@yahoo.com', 1, 2, '2018-05-12 14:05:31', NULL),
(3, 'Carlos Vergara', NULL, '(362) 447 - 4779', 'Buenas, estoy interezado en el departamento número 10 del inmueble de Av. Ávalos y Entre Rios', 'domini26@latinmail.com', 1, 3, '2018-05-12 14:05:31', NULL),
(4, 'Diego Manzo', NULL, '(362) 442 - 8475', 'Buenas, estoy interezado en el departamento número 2 del inmueble de Juan D. Perón al 1400. El departamento del cuato piso.', 'julianaparis@hotmail.com', 1, 4, '2018-05-12 14:05:31', NULL),
(5, 'Carlos Zapiola', NULL, '(362) 444 - 6512', 'Buenas, estoy interezado en el departamento 7 del edificio de Juan D. Perón al 1400', 'yessy_39@hotmail.com', 1, 5, '2018-05-12 14:05:31', NULL),
(6, 'Gustavo Sandoval', NULL, '(362) 443 - 8482', 'Buenas, estoy interezado en el departamento número 4 del inmueble de Av. Ávalos y Entre Rios', 'ashida_barak@yahoo.com', 1, 6, '2018-05-12 14:05:31', NULL),
(7, 'Quico Valenzuela', NULL, '(362) 442 - 8797', 'Buenas, estoy interezado en el departamento 9 de inmueble de Av. Las Heras 2055', 'hacho_k@gmail.com', 1, 7, '2018-05-12 14:05:31', NULL),
(8, 'Juan Moreira', NULL, '(362) 443 - 8325', 'Buenas, estoy interezado en el departamento 9 del inmueble de Entre Ríos 142', 'menadel@hotmail.com', 1, 8, '2018-05-12 14:05:31', NULL),
(9, 'Florencia Kozlowski', NULL, '(362) 443 - 0300', 'Buenas, estoy interezado en el departamento 7 del inmueble de Av. Las Heras 2055', 'acampadaalcoy@gmail.com', 1, 9, '2018-05-12 14:05:31', NULL),
(10, 'Ivana Caravajal', NULL, '(362) 443 - 8325', 'Buenas, estoy interezado en el departamento 7 del inmueble de Av. Las Heras 2055', 'reinald_34@hotmail.com', 1, 9, '2018-05-12 14:05:31', NULL),
(11, 'Lidia Sosa', NULL, '(362) 443 - 5004', 'Buenas, estoy interezado en el departamento 5 del inmueble de Entre Ríos 142', 'm.fdez_87@hotmail.com', 1, 10, '2018-05-12 14:05:31', NULL),
(12, 'Nicolás Carpo', NULL, '(362) 444 - 7177', 'Buenas, estoy interezado en el departamento 9 de inmueble de Av. Las Heras 2055', 'kristian_siempre_azul@hotmail.com', 1, 1, '2018-05-12 14:05:31', NULL);

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
(1, 'Argentina', '2018-05-12 14:05:05', NULL),
(2, 'Brasil', '2018-05-12 14:05:05', NULL),
(3, 'Paraguay', '2018-05-12 14:05:05', NULL),
(4, 'Uruguay', '2018-05-12 14:05:05', NULL),
(5, 'Chile', '2018-05-12 14:05:05', NULL),
(6, 'Bolivia', '2018-05-12 14:05:05', NULL),
(7, 'Colombia', '2018-05-12 14:05:05', NULL),
(8, 'Alemania', '2018-05-12 14:05:05', NULL),
(9, 'Inglaterra', '2018-05-12 14:05:05', NULL),
(10, 'Venezuela', '2018-05-12 14:05:05', NULL),
(11, 'Ecuador', '2018-05-12 14:05:05', NULL),
(12, 'México', '2018-05-12 14:05:05', NULL),
(13, 'China', '2018-05-12 14:05:05', NULL),
(14, 'Japón', '2018-05-12 14:05:05', NULL),
(15, 'Corea del Sur', '2018-05-12 14:05:05', NULL),
(16, 'Holanda', '2018-05-12 14:05:05', NULL),
(17, 'Estados Unidos', '2018-05-12 14:05:05', NULL),
(18, 'Canadá', '2018-05-12 14:05:05', NULL),
(19, 'España', '2018-05-12 14:05:05', NULL),
(20, 'Portugal', '2018-05-12 14:05:05', NULL),
(21, 'Sudáfrica', '2018-05-12 14:05:05', NULL),
(22, 'Senegal', '2018-05-12 14:05:05', NULL),
(23, 'Turquía', '2018-05-12 14:05:05', NULL),
(24, 'Arabia Saudita', '2018-05-12 14:05:05', NULL),
(25, 'Israel', '2018-05-12 14:05:05', NULL),
(26, 'Francia', '2018-05-12 14:05:05', NULL),
(27, 'Rusia', '2018-05-12 14:05:05', NULL);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'acceso a usuarios', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(2, 'acceso a roles', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(3, 'acceso a servicios', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(4, 'acceso a paises', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(5, 'acceso a provincias', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(6, 'acceso a localidades', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(7, 'acceso a barrios', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(8, 'acceso a caracteristicas', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(9, 'acceso a tipos de caracteristicas', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(10, 'acceso a inmuebles', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(11, 'acceso a edificios', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(12, 'acceso a proyectos', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(13, 'acceso a propiearios', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(14, 'acceso a inquilinos', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(15, 'acceso a garantes', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(16, 'acceso a oportunidades', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(17, 'acceso a agenda', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(18, 'acceso a contratos', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(19, 'acceso a impuestos', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(20, 'alta de impuestos', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(21, 'alta de liquidaciones', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(22, 'cobro de liquidaciones', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56'),
(23, 'pagos de liquidaciones', 'web', '2018-05-12 14:11:56', '2018-05-12 14:11:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` enum('Femenino','Masculino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `pais_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `sexo`, `dni`, `fecha_nac`, `telefono`, `telefono_contacto`, `email`, `foto_perfil`, `direccion`, `descripcion`, `localidad_id`, `pais_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Horacio Alejandro', 'Kuszniruk', 'Masculino', '35777888', '1991-12-16', '3752499820', '3752499820', 'hacho.kuszniruk@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 1, '2018-05-12 14:05:16', NULL),
(2, 'Juan Pablo', 'Cáceres', 'Masculino', '34478385', '1989-05-10', '3743499820', '3743499820', 'jpaulnava@gmail.com', 'sin_imagen.png', 'Monteagudo 695', NULL, 1, 1, 2, '2018-05-12 14:05:16', NULL),
(3, 'Juán', 'Rubio', 'Masculino', '27555634', '1967-11-15', '3743002233', '3743002233', 'juanrubio@gmail.com', 'sin_imagen.png', 'San Luis 387', NULL, 1, 1, 3, '2018-05-12 14:05:16', NULL),
(4, 'Andrea ', 'Ríos López', 'Femenino', '27535614', '1967-11-15', '3743002233', '3743002233', 'rioslopezandrea@gmail.com', 'sin_imagen.png', 'San Luis 387', NULL, 1, 1, 4, '2018-05-12 14:05:16', NULL),
(5, 'Mirta', 'Larsson', 'Femenino', '28555614', '1979-08-03', '3752002233', '3752002233', 'm.larsson@gmail.com', 'sin_imagen.png', 'Remedios de Escalada 555', NULL, 5, 1, 5, '2018-05-12 14:05:16', NULL),
(6, 'Norma G', 'Alvarez Rodriguez', 'Femenino', '42146964', '1957-10-15', '(362) 443 - 8084', '(362) 443 - 0300', 'juribe@idiomas.udea.edu.co', 'sin_imagen.png', NULL, NULL, 1, 1, 6, '2018-05-12 14:05:16', NULL),
(7, 'Rubens', 'Sambueza', 'Masculino', '40673760', '1967-02-22', '(362) 442 - 6145', '(362) 442 - 6005', 'hersy@epm.net.co', 'sin_imagen.png', NULL, NULL, 1, 1, 7, '2018-05-12 14:05:16', NULL),
(8, 'Analia L', 'Eginini Rodriguez', 'Femenino', '42532753', '1988-11-22', '(362) 447 - 6394', '(362) 443 - 2168', 'urestrepo@idiomas.udea.edu.co', 'sin_imagen.png', NULL, NULL, 1, 1, 8, '2018-05-12 14:05:16', NULL),
(9, 'Isaac E', 'Martinez Rodriguez', 'Masculino', '43278119', '1968-05-12', '(362) 445 - 1406', '(362) 447 - 4779', 'vivian_981@yahoo.com', 'sin_imagen.png', NULL, NULL, 1, 1, 9, '2018-05-12 14:05:16', NULL),
(10, 'Carmen E', 'Gonzales', 'Femenino', '71241786', '1978-12-11', '(362) 446 - 0306', '(362) 442 - 8475', 'julianaparis@hotmail.com', 'sin_imagen.png', NULL, NULL, 1, 1, 10, '2018-05-12 14:05:16', NULL),
(11, 'Roque G', 'Gonzales', 'Masculino', '45743257', '1990-12-31', '(362) 443 - 2363', '(362) 444 - 6512', 'domini26@latinmail.com', 'sin_imagen.png', NULL, NULL, 1, 1, 11, '2018-05-12 14:05:16', NULL),
(12, 'Alberto A', 'Espinoza', 'Masculino', '46202533', '1987-11-13', '(362) 446 - 2756', '(362) 443 - 8482', 'julianaparis@hotmail.com', 'sin_imagen.png', NULL, NULL, 1, 1, 12, '2018-05-12 14:05:16', NULL),
(13, 'Carlos R', 'Espinoza', 'Masculino', '42264899', '1955-09-10', '(362) 443 - 5921', '(362) 443 - 8482', 'yessy_39@hotmail.com', 'sin_imagen.png', NULL, NULL, 1, 1, 13, '2018-05-12 14:05:16', NULL),
(14, 'Graciela L', 'Espinoza', 'Femenino', '32476447', '1971-01-02', '(362) 444 - 9305', '(362) 442 - 8797', 'ashida_barak@yahoo.com', 'sin_imagen.png', NULL, NULL, 1, 1, 14, '2018-05-12 14:05:16', NULL),
(15, 'Jose', 'Espinoza', 'Masculino', '23230565', '1956-03-13', '(362) 446 - 1367', '(362) 442 - 4022', 'menadel@hotmail.com', 'sin_imagen.png', NULL, NULL, 1, 1, 15, '2018-05-12 14:05:16', NULL),
(16, 'Hector Ruben', 'Espinoza', 'Masculino', '78682726', '1989-10-10', '(362) 446 - 3838', '(362) 443 - 8325', 'm.fdez_87@hotmail.com', 'sin_imagen.png', 'Juan Domingo Perón 396', NULL, 1, 1, 16, '2018-05-12 14:05:16', NULL),
(17, 'Martha', 'Werle', 'Femenino', '12270734', '1981-04-05', '(362) 446 - 1311', '(362) 443 - 8325', 'reinald_34@hotmail.com', 'sin_imagen.png', 'Donovan 174', NULL, 1, 1, 17, '2018-05-12 14:05:16', NULL),
(18, 'Albertina G De', 'Galarza', 'Femenino', '12682277', '1963-04-10', '(362) 443 - 5004', '(362) 446 - 1311', 'ibrahin@cied.rimed.cu', 'sin_imagen.png', 'Juan Domingo Perón 455', NULL, 1, 1, 18, '2018-05-12 14:05:16', NULL),
(19, 'Carlos', 'Gonzalez', 'Masculino', '16351202', '1989-08-08', '(362) 444 - 7177', '(362) 443 - 5004', 'acampadaalcoy@gmail.com', 'sin_imagen.png', 'Salta 446', NULL, 1, 1, 19, '2018-05-12 14:05:16', NULL),
(20, 'Carolina E', 'Galarza', 'Femenino', '13115783', '1981-09-02', '(362) 446 - 3069', '(362) 444 - 7177', 'acampada.algeciras@gmail.com', 'sin_imagen.png', 'Av. Belgrano 410', NULL, 1, 1, 20, '2018-05-12 14:05:16', NULL),
(21, 'Julio N', 'Fernandez Nuñez', 'Masculino', '27390202', '1955-07-16', '(362) 446 - 3069', '(362) 446 - 7445', 'difusio.acampadabdn@gmail.com', 'sin_imagen.png', 'Av. Manuel Belgrano 511', NULL, 1, 1, 21, '2018-05-12 14:05:16', NULL),
(22, 'Magdalena N De', 'Gomez Nuñez', 'Femenino', '12075202', '1965-07-09', '(362) 447 - 9854', '(362) 442 - 3393', 'dryburgos@gmail.com', 'sin_imagen.png', 'Jujuy 715', NULL, 1, 1, 22, '2018-05-12 14:05:16', NULL),
(23, 'Narvajas', 'Gomez Nunez', 'Masculino', '59427123', '1971-02-06', '(362) 442 - 3177', '(362) 442 - 4040', 'castello15m@gmail.com', 'sin_imagen.png', 'Moreno 940', NULL, 1, 1, 23, '2018-05-12 14:05:16', NULL),
(24, 'Emilio Alberto', 'Rached', 'Masculino', '27789946', '1925-06-23', '(362) 443 - 8052', '(362) 443 - 2640', 'iabarcae@yahoo.es', 'sin_imagen.png', 'Santiago del Estero, 3500', NULL, 1, 1, 24, '2018-05-12 14:05:16', NULL),
(25, 'Natalia Gabriela ', 'Neme', 'Femenino', '30231555', '1956-12-03', '(362) 443 - 2640', '(362) 446 - 7319', 'alexus3@hotmail.com', 'sin_imagen.png', 'Av. 25 de Mayo 980', NULL, 1, 1, 25, '2018-05-12 14:05:16', NULL),
(26, ' Marcelo Ramon de la Santisima Trinidad', 'Lugones', 'Masculino', '18758730', '1991-11-22', '(362) 446 - 7319', '(362) 448 - 8882', 'luuuuuuci@hotmail.com', 'sin_imagen.png', 'S B D Mte Alto 55', NULL, 1, 1, 26, '2018-05-12 14:05:16', NULL),
(27, 'Juan', 'Gonzales', 'Masculino', '17333490', '1994-06-13', '(362) 444 - 6866', '(362) 448 - 8882', 'kristian_siempre_azul@hotmail.com', 'sin_imagen.png', 'Calle Corrientes 905', NULL, 1, 1, 27, '2018-05-12 14:05:16', NULL),
(28, 'Paola Anabel', 'Griggio', 'Femenino', '34662263', '1989-11-11', '(362) 442 - 7958', '(362) 447 - 3172', 'mapuchin@hotmail.com', 'sin_imagen.png', 'Marcelo T. de Alvear 1097', NULL, 1, 1, 28, '2018-05-12 14:05:16', NULL),
(29, 'Guillermo Antonio', 'Novara', 'Masculino', '38082134', '1992-01-02', '(362) 446 - 6439', '(362) 447 - 3172', 'arahuetes@manquehue.net', 'sin_imagen.png', 'Marcelo T. de Alvear 1301', NULL, 1, 1, 29, '2018-05-12 14:05:16', NULL),
(30, 'Ricardo Luis', 'Corbalan', 'Masculino', '30226561', '1985-12-16', '(362) 476 - 4523', '(362) 443 - 5252', 'eduardo.arancibia@grange.cl', 'sin_imagen.png', 'San Fernando 335', NULL, 1, 1, 30, '2018-05-12 14:05:16', NULL),
(31, 'Elba Cristina', 'Alvarez', 'Femenino', '13934021', '1987-05-06', '(362) 441 - 7610', '(362) 446 - 6439', 'leonor.araya@gmail.com', 'sin_imagen.png', 'Av. Rivadavia 1130', NULL, 1, 1, 31, '2018-05-12 14:05:16', NULL),
(32, 'Ramón', 'Goitea', 'Masculino', '23423358', '1976-09-11', '(362) 444 - 0105', '(362) 441 - 7610', 'paulifran@hotmail.com', 'sin_imagen.png', 'La Rioja 1199', NULL, 1, 1, 32, '2018-05-12 14:05:16', NULL),
(33, 'Guillermo Elias Ruben', 'Ganón', 'Masculino', '20596506', '1980-02-06', '(362) 443 - 4581', '(362) 444 - 0105', 'bad.girl.-@hotmail.es', 'sin_imagen.png', 'Fotheringam 45', NULL, 1, 1, 33, '2018-05-12 14:05:16', NULL),
(34, 'Omar D', 'Avalos Fernandez', 'Masculino', '26387675', '1956-02-03', '(362) 441 - 7610', '(362) 476 - 4523', 'aargomedo@hecsa.cl', 'sin_imagen.png', 'Jujuy 1870', NULL, 1, 1, 34, '2018-05-12 14:05:16', NULL),
(35, 'Rodrigo', 'Alvarez Fernandez', 'Masculino', '24771656', '1985-01-14', '(362) 445 - 1462', '(362) 476 - 4523', 'joy_pao_@hotmail.com', 'sin_imagen.png', 'Mendoza 2662', NULL, 1, 1, 35, '2018-05-12 14:05:16', NULL),
(36, 'Gabriel N', 'Banquero Fernandez', 'Masculino', '27872450', '1975-08-10', '(362) 442 - 1576', '(362) 497 - 2426', 'Sergio.Aspe@adretail.cl', 'sin_imagen.png', 'García Merou 2901', NULL, 1, 1, 36, '2018-05-12 14:05:16', NULL),
(37, 'Marcelo', 'Marin', 'Masculino', '32444888', '1987-12-16', '3752499740', '3752499740', 'marcemarin@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 37, '2018-05-12 14:05:16', NULL),
(38, 'Alejandro', 'Rodriguez', 'Masculino', '36777888', '1991-10-21', '3752887411', '3752887411', 'ale.rodriguez@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 38, '2018-05-12 14:05:16', NULL),
(39, 'Damian', 'Freidenberger', 'Masculino', '33223882', '1987-03-06', '3752112233', '3752112233', 'damian.freidenberger@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 39, '2018-05-12 14:05:16', NULL),
(40, 'Alejandro', 'Alba Posse', 'Masculino', '36005888', '1991-04-16', '3752895623', '3752895623', 'ale.alba@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 40, '2018-05-12 14:05:16', NULL),
(41, 'Sergio', 'Sanabria', 'Masculino', '36021954', '1991-08-20', '3752748596', '3752748596', 'sergio.sanab@gmail.com', 'sin_imagen.png', 'Corientes 2247', NULL, 5, 1, 41, '2018-05-12 14:05:16', NULL),
(42, 'Claudia', 'Menéndez', 'Femenino', '27555614', '1967-11-15', '3743002233', '3743002233', 'claudiana@gmail.com', 'sin_imagen.png', 'San Luis 387', NULL, 1, 1, 42, '2018-05-12 14:05:17', NULL),
(43, 'Lucas', 'Ibañez', 'Masculino', '35811425', '1995-04-26', '3624789412', NULL, 'ibanez@gmail.com', 'persona_1526140423.png', '9 de Julio 1417', NULL, 1, 1, 47, '2018-05-12 15:53:46', '2018-05-26 14:33:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id`, `descripcion`, `persona_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 21, '2018-05-12 14:05:18', NULL),
(2, NULL, 22, '2018-05-12 14:05:18', NULL),
(3, NULL, 23, '2018-05-12 14:05:18', NULL),
(4, NULL, 24, '2018-05-12 14:05:18', NULL),
(5, NULL, 25, '2018-05-12 14:05:19', NULL),
(6, NULL, 26, '2018-05-12 14:05:19', NULL),
(7, NULL, 27, '2018-05-12 14:05:19', NULL),
(8, NULL, 28, '2018-05-12 14:05:19', NULL),
(9, NULL, 29, '2018-05-12 14:05:20', NULL),
(10, NULL, 30, '2018-05-12 14:05:20', NULL),
(11, NULL, 5, '2018-05-12 14:05:20', NULL),
(12, NULL, 40, '2018-05-12 14:05:20', NULL),
(13, NULL, 32, '2018-05-12 14:05:21', NULL);

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
(1, 'Misiones', 1, '2018-05-12 14:05:05', NULL),
(2, 'Corrientes', 1, '2018-05-12 14:05:05', NULL),
(3, 'Entre Rios', 1, '2018-05-12 14:05:05', NULL),
(4, 'Buenos Aires', 1, '2018-05-12 14:05:05', NULL),
(5, 'La Pampa', 1, '2018-05-12 14:05:05', NULL),
(6, 'Chaco', 1, '2018-05-12 14:05:05', NULL),
(7, 'Formosa', 1, '2018-05-12 14:05:05', NULL),
(8, 'Salta', 1, '2018-05-12 14:05:05', NULL),
(9, 'Tucumán', 1, '2018-05-12 14:05:06', NULL),
(10, 'Santiago del Estero', 1, '2018-05-12 14:05:06', NULL),
(11, 'Córdoba', 1, '2018-05-12 14:05:06', NULL),
(12, 'San Luis', 1, '2018-05-12 14:05:06', NULL),
(13, 'San Juan', 1, '2018-05-12 14:05:06', NULL),
(14, 'Mendoza', 1, '2018-05-12 14:05:06', NULL),
(15, 'Neuquén', 1, '2018-05-12 14:05:06', NULL),
(16, 'Chubut', 1, '2018-05-12 14:05:06', NULL),
(17, 'Río Negro', 1, '2018-05-12 14:05:06', NULL),
(18, 'Santa Cruz', 1, '2018-05-12 14:05:06', NULL),
(19, 'Tierra del Fuego', 1, '2018-05-12 14:05:06', NULL),
(20, 'Santa Fe', 1, '2018-05-12 14:05:06', NULL),
(21, 'Catamarca', 1, '2018-05-12 14:05:06', NULL),
(22, 'La Rioja', 1, '2018-05-12 14:05:06', NULL),
(23, 'Jujuy', 1, '2018-05-12 14:05:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` enum('Alquiler','Venta','Alquiler/Venta') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorVenta` double(10,2) NOT NULL,
  `valorAlquiler` double(10,2) NOT NULL,
  `superficie` double(10,2) NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numDepto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHabilitacion` date NOT NULL,
  `longitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitud` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkVideo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadAmbientes` int(11) NOT NULL,
  `cantidadBaños` int(11) NOT NULL,
  `cantidadGarages` int(11) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `descripcion1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `localidad_id` int(10) UNSIGNED NOT NULL,
  `barrio_id` int(10) UNSIGNED DEFAULT NULL,
  `edificio_id` int(10) UNSIGNED DEFAULT NULL,
  `propietario_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `condicion`, `valorVenta`, `valorAlquiler`, `superficie`, `direccion`, `piso`, `numDepto`, `fechaHabilitacion`, `longitud`, `latitud`, `linkVideo`, `cantidadAmbientes`, `cantidadBaños`, `cantidadGarages`, `disponible`, `descripcion1`, `descripcion2`, `tipo_id`, `localidad_id`, `barrio_id`, `edificio_id`, `propietario_id`, `created_at`, `updated_at`) VALUES
(1, 'Alquiler', 4000000.00, 15000.00, 85.00, 'Entre Ríos 142', '4', '5', '2018-01-01', '-27.4605598', '-58.9838905', 'https://www.youtube.com/watch?v=TgeX-AF7_DE', 5, 2, 1, 1, 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 'Excelente departamento Torre MAIOR BARRANCAS 3 Ambientes con 2 Suites, Amplio estar comedor con 2 salidas a balcon con vista al Rio en piso Alto, Toilette de recepcion, Gran cocina comedor mas lavadero independiente, Cochera fija en Subsuelo mas amplia baulera. Amenities: Gran Piscina con solarium , Jacuzzi , Gimnasio - Sauna , Spa. , Pergolas en sector d ePiscina, S.U.M. Comedor para reuniones familiares, Microcine, Amplio jardín en Planta Baja rodeando el SUM con parrilla.', 1, 1, 14, 1, 1, '2018-05-12 14:05:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responiva`
--

CREATE TABLE `responiva` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2018-05-12 14:11:54', '2018-05-12 14:11:54'),
(2, 'Cliente', 'web', '2018-05-12 14:11:54', '2018-05-12 14:11:54'),
(3, 'Personal', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(4, 'Propietario', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55'),
(5, 'Inquilino', 'web', '2018-05-12 14:11:55', '2018-05-12 14:11:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 5),
(3, 1),
(3, 5),
(4, 1),
(4, 5),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 5),
(8, 1),
(8, 5),
(9, 1),
(9, 5),
(10, 1),
(10, 5),
(11, 1),
(11, 5),
(12, 1),
(12, 5),
(13, 1),
(13, 5),
(14, 1),
(14, 5),
(15, 1),
(15, 5),
(16, 1),
(16, 5),
(17, 1),
(17, 5),
(18, 1),
(18, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(21, 5),
(22, 1),
(22, 5),
(23, 1),
(23, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubrostecnicos`
--

CREATE TABLE `rubrostecnicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rubrostecnicos`
--

INSERT INTO `rubrostecnicos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Plomero', NULL, '2018-05-12 14:05:38', NULL),
(2, 'Electricista', NULL, '2018-05-12 14:05:38', NULL),
(3, 'Albañil', NULL, '2018-05-12 14:05:38', NULL),
(4, 'Carpintero', NULL, '2018-05-12 14:05:38', NULL),
(5, 'Decorador de interiores', NULL, '2018-05-12 14:05:39', NULL),
(6, 'Jardinero', NULL, '2018-05-12 14:05:39', NULL),
(7, 'Refrigeraciones', NULL, '2018-05-12 14:05:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicio_compartido` tinyint(1) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `servicio_compartido`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Luz', 0, 'Servicio de electricidad', '2018-05-12 14:05:28', NULL),
(2, 'Gas', 0, 'Servicio de gas comunitario', '2018-05-12 14:05:29', NULL),
(3, 'Internet', 0, 'Pago del servicio de internet de un tercero', '2018-05-12 14:05:29', NULL),
(4, 'Telefonía', 0, 'Servicio de telefonía fija', '2018-05-12 14:05:29', NULL),
(5, 'Pago de impuesto inmobiliario', 0, 'El administrador se encarga de abonar éste impuesto municipal', '2018-05-12 14:05:29', NULL),
(6, 'Agua', 0, 'Servicio de agua potable', '2018-05-12 14:05:29', NULL),
(7, 'Periódico', 0, 'Servicio de canillita', '2018-05-12 14:05:30', NULL),
(8, 'Limpieza lugares comunes', 1, 'Servicio de limpieza en lugares comunes', '2018-05-12 14:05:30', NULL),
(9, 'Seguro', 1, 'Pago del seguro', '2018-05-12 14:05:30', NULL),
(10, 'Valor ascensores', 1, 'Valor ascensores', '2018-05-12 14:05:30', NULL),
(11, 'Mantenimiento infraestructura', 1, 'Contempla el mantenimiento de los ascensores y otros arreglos circunstanciales', '2018-05-12 14:05:30', NULL),
(12, 'Sueldo personal', 1, 'Sueldo para el sereno y otros empleados del edificio', '2018-05-12 14:05:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesservicio`
--

CREATE TABLE `solicitudesservicio` (
  `id` int(10) UNSIGNED NOT NULL,
  `tecnico_id` int(10) UNSIGNED DEFAULT NULL,
  `contrato_id` int(10) UNSIGNED NOT NULL,
  `rubrotecnico_id` int(10) UNSIGNED NOT NULL,
  `liquidacionmensual_id` int(10) UNSIGNED DEFAULT NULL,
  `responsable` enum('propietario','inquilino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('inicial','tomada','concluida','finalizada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_final` double(10,2) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_cierre` date DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudesservicio`
--

INSERT INTO `solicitudesservicio` (`id`, `tecnico_id`, `contrato_id`, `rubrotecnico_id`, `liquidacionmensual_id`, `responsable`, `motivo`, `estado`, `monto_final`, `fecha_inicio`, `fecha_cierre`, `calificacion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, 'inquilino', 'la canilla del baño gotea', 'tomada', NULL, NULL, NULL, NULL, '2018-05-12 14:05:40', NULL),
(2, 2, 1, 3, NULL, 'propietario', 'Necesito unos arreglos grandes en mi balcón', 'concluida', 5940.00, NULL, '2018-05-26', 3, '2018-05-13 01:24:25', '2018-05-28 22:21:22'),
(3, 2, 4, 3, NULL, 'inquilino', 'Hola, necesito un cerrajero pero el sistema no me da esa opcion. Podes ayudarme?', 'concluida', 1355.00, NULL, '2018-05-28', 5, '2018-05-20 23:33:18', '2018-05-28 22:18:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `rubroTecnico_id` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id`, `rubroTecnico_id`, `estado`, `persona_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 42, '2018-05-12 14:05:39', NULL),
(2, 3, NULL, 43, '2018-05-12 15:53:46', '2018-05-12 15:53:46');

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
(1, 'Departamento', NULL, '2018-05-12 14:05:17', NULL),
(2, 'Casa', NULL, '2018-05-12 14:05:17', NULL),
(3, 'Barrio', NULL, '2018-05-12 14:05:17', NULL),
(4, 'Terreno', NULL, '2018-05-12 14:05:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_movimiento`
--

CREATE TABLE `tipos_movimiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_movimiento`
--

INSERT INTO `tipos_movimiento` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(0, 'Otros', '2018-05-19 22:03:35', '0000-00-00 00:00:00'),
(1, 'Marketing', '2018-05-19 20:48:57', '0000-00-00 00:00:00'),
(2, 'Impuestos', '2018-05-19 20:48:57', '0000-00-00 00:00:00'),
(3, 'Seguro Inmobiliario', '2018-05-19 20:48:57', '0000-00-00 00:00:00'),
(4, 'Mto y Reparaciones', '2018-05-19 20:48:57', '0000-00-00 00:00:00');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `imagen`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hacho Kuszniruk', 'hacho_k@outlook.com', 'usuario_1499775381.jpg', '$2y$10$oQkAbc9gQD8TT6hkm6IqheFb8bZ4nwPTv4w5PPW6puSeDeISjDUjG', NULL, '2018-05-12 14:11:48', '2018-05-12 14:11:48'),
(2, 'Juan Pablo Cáceres', 'jpcaceres.nea@gmail.com', 'usuario_1499215225.jpg', '$2y$10$FLV86gGMojzQeWrNSQkzf.yhaZjr7IjogrrnL5Eb7n1ro/spq/.Zu', 'gxNTWm8Gtr2p20ODdt3pi88Q5xsSDGse9q8JUONRyfpqFQW1Fni1V3OpmR1P', '2018-05-12 14:11:48', '2018-05-12 14:11:48'),
(3, 'Juan Rubio', 'juanrubio_96@hotmail.com', 'usuario_1499775474.jpg', '$2y$10$BspjAWjQG09eGqoV421IOOpqsL1fwU2XGtsQyNpBk3J7Ec/jeTw3y', NULL, '2018-05-12 14:11:48', '2018-05-12 14:11:48'),
(4, 'Andrea Ríos López', 'rioslopezandrea@gmail.com', 'andrea_rioslopez.png', '$2y$10$FLV86gGMojzQeWrNSQkzf.yhaZjr7IjogrrnL5Eb7n1ro/spq/.Zu', NULL, '2018-05-12 14:11:48', '2018-05-12 14:11:48'),
(5, 'Mirta Larsson', 'm.larsson@hotmail.com', 'mirta_larsson.png', '$2y$10$FLV86gGMojzQeWrNSQkzf.yhaZjr7IjogrrnL5Eb7n1ro/spq/.Zu', 'jlkMUdlgODr1xpG2Uq33cYy1Bgpk24eKfAYGpQIsBlZcthPwQBW10icLPwJb', '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(6, 'Norma G', 'juribe@idiomas.udea.edu.co', 'sin_imagen.png', '$2y$10$QYn5upL1wmsZZOp.8Qy.ieskLU64/v/YYtwB6pajZb21L8iCjCJCC', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(7, 'Rubens', 'hersy@epm.net.co', 'sin_imagen.png', '$2y$10$c/x8L0dNYmnYJdaGhYgHkujM7VNxDRr2QzyQajmOcFZ9ke6bKPsBe', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(8, 'Analia L', 'urestrepo@idiomas.udea.edu.co', 'sin_imagen.png', '$2y$10$tCHHiDmC5jILDodcTYkxgemuTjkODk/NrxVeNdjrLTCAAjcP5LoRy', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(9, 'Isaac E', 'vivian_981@yahoo.com', 'sin_imagen.png', '$2y$10$xapeMlhHd1caDMI/.ZLsLuTWZCIiOX7Fq7zu.hz/1b4Psw6ccU3Fy', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(10, 'Carmen E', 'julianaparis2@hotmail.com', 'sin_imagen.png', '$2y$10$X2N9Vbzl5htf6xNPdve56eMFPgwmP8TSx0XerUJH/JOpQn5HBITV6', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(11, 'Roque G', 'domini26@latinmail.com', 'sin_imagen.png', '$2y$10$glfmR7.DOokb2BaW6K9e6.bwqJwAz1YBAlpBIUSi9Rdg3K5p/zPl.', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(12, 'Alberto A', 'julianaparis@hotmail.com', 'sin_imagen.png', '$2y$10$7fvkEqT.nkjR6GinF4JnN.Lr9qP8xwoRd443Wyy.cLGfVFjRJ2Vbi', NULL, '2018-05-12 14:11:49', '2018-05-12 14:11:49'),
(13, 'Carlos R', ' yessy_39@hotmail.com', 'sin_imagen.png', '$2y$10$4iPcASg5kO9rrWre.izmjOie3wVs3cnVpa7Nd7cgIOEYQteIBMHza', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(14, 'Graciela L', 'ashida_barak@yahoo.com', 'sin_imagen.png', '$2y$10$WLGPF0buIjnMIOkbJ2MTe.NOYPJ994jSukDWUOgefmv.CDyfmk7vm', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(15, 'Jose', 'menadel@hotmail.com', 'sin_imagen.png', '$2y$10$5KHgdzdkfMvndzPrB.1zxuSso3FWTaidUW6FC0YdthEa3Yq37NPKq', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(16, 'Hector Ruben', 'm.fdez_87@hotmail.com', 'sin_imagen.png', '$2y$10$ceW2auKKL3JpR/nD1QsJheAoiVMwGjRlTEdbiv99gIk8Qo1cdIjRK', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(17, 'Martha', 'reinald_34@hotmail.com', 'sin_imagen.png', '$2y$10$NbYKqIkgCluRGPp0Ew.LAuFmPvdnKN8mZjeV5a/IPAC34UhOjqymS', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(18, 'Albertina G De', 'ibrahin@cied.rimed.cu', 'sin_imagen.png', '$2y$10$Ai8TiTeop9I8slcfDR4rxee64ymyk1coyfdkRCMFnDHnZsN1CDL8O', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(19, 'Carlos', 'acampadaalcoy@gmail.com', 'sin_imagen.png', '$2y$10$4BCn88cZaHMpUf6cHLk3kO0bpttqHTDj3LLWbB9MHnWkG55vge9yC', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(20, 'Carolina E', 'acampada.algeciras@gmail.com', 'sin_imagen.png', '$2y$10$1NPfw19MKqbZLZtJ5bGGieUAbcooPgE6X44xu4NnLcqoHou.GzIja', NULL, '2018-05-12 14:11:50', '2018-05-12 14:11:50'),
(21, 'Julio N', 'difusio.acampadabdn@gmail.com', 'sin_imagen.png', '$2y$10$Eb0DL43KORjN.X9sReWM/O1DIC8C.YRwwoV4MjxaxCVheylPKHtpa', NULL, '2018-05-12 14:11:51', '2018-05-12 14:11:51'),
(22, 'Magdalena N De', 'dryburgos@gmail.com', 'sin_imagen.png', '$2y$10$TIoYR3RpsqlQdzYdJSJ8NeeLXzerLMKbOPuDb7l.z8D0V278BhSK6', NULL, '2018-05-12 14:11:51', '2018-05-12 14:11:51'),
(23, 'Narvajas', 'castello15m@gmail.com', 'sin_imagen.png', '$2y$10$QBX.khbOsmMYpcvicwWXzOEnSGaJSvCA.I4Ll/weNdi6esWGCrBhu', NULL, '2018-05-12 14:11:51', '2018-05-12 14:11:51'),
(24, 'Emilio Alberto', 'iabarcae@yahoo.es', 'sin_imagen.png', '$2y$10$TpWW/RFQN.tWL/FlYqqt9uTrFjGlrlrxlnjN4K6gX9uMCHZw8RFH6', NULL, '2018-05-12 14:11:51', '2018-05-12 14:11:51'),
(25, 'Natalia Gabriela ', 'alexus3@hotmail.com', 'sin_imagen.png', '$2y$10$4SmQVac2oRVDqUUc2Qw8o.9kB33.4xcun5R9gLCxrQ9z1Pr7VS4P2', NULL, '2018-05-12 14:11:51', '2018-05-12 14:11:51'),
(26, 'Marcelo Ramon de la Santisima Trinidad', 'luuuuuuci@hotmail.com', 'sin_imagen.png', '$2y$10$r22gUjm1rdOamnqvaogFEeE5hf8JY57Hy5g6GeYpBzTvckp0k79/C', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(27, 'Juan', 'kristian_siempre_azul@hotmail.com', 'sin_imagen.png', '$2y$10$fSo7GM9f2X70rniJWVw3kewRQ6kg43RUmTsBH8PaaIkdmem4WqrFS', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(28, 'Paola Anabel', 'mapuchin@hotmail.com', 'sin_imagen.png', '$2y$10$NbNK.aPdPZAc7L0jNzchl.GN.GBOIUk7jueZHTahpFsVnrgW7qNX2', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(29, 'Guillermo Antonio', 'arahuetes@manquehue.net', 'sin_imagen.png', '$2y$10$gAKRoh9b1iH9npzi994rsOt8AfYdKYZMswofYGLyXBTgMGpJnNR.u', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(30, 'Ricardo Luis', 'eduardo.arancibia@grange.cl', 'sin_imagen.png', '$2y$10$tSHrvJ.0qKEjxz4/7vBbWuHJJcAx5PbF9vgItZrqJTIjn6aa3VhW.', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(31, 'Elba Cristina', 'leonor.araya@gmail.com', 'sin_imagen.png', '$2y$10$g4LWK3X.flxQi/UkbqEtWOEmTW/F7HTYZr2APkF3UcPbm7i3I4n7u', NULL, '2018-05-12 14:11:52', '2018-05-12 14:11:52'),
(32, 'Ramón', 'paulifran@hotmail.com', 'sin_imagen.png', '$2y$10$U5hGa8XvQUiEmk1/enT2FeEclHMtpeiQQYtWQxoyuLYrrvn1WUzqq', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(33, 'Guillermo Elias Ruben', 'bad.girl.-@hotmail.es', 'sin_imagen.png', '$2y$10$gReO1tz54aX90yL.OOzSI.Y6qC7c0dQGGK5OZOqYPmuUvRvM2BnvO', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(34, 'Omar D', 'aargomedo@hecsa.cl', 'sin_imagen.png', '$2y$10$8wWnVNMf7G8vqmK.cqR5au/clxQHT7DsNpf6ix4cFNShpzKvkc4l6', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(35, 'Rodrigo', 'joy_pao_@hotmail.com', 'sin_imagen.png', '$2y$10$7cLGv8NCz/1DcXWIYIboVuSDDsMSC92.SznVcLvH14oXrxGp4B3Iq', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(36, 'Gabriel N', 'Sergio.Aspe@adretail.cl', 'sin_imagen.png', '$2y$10$6cV3pPpEzDEeF61Jhd38cu/hTq2/NAJzrXkAhBTICy3EQHj75b1nm', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(37, 'Marcelo', 'marcemarin@gmail.com', 'sin_imagen.png', '$2y$10$vHe9GV1SiLNM5IRgyfVsf.9hPKX/lvCir6SD9LqZ/4KErLp37yqIu', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(38, 'Alejandro', 'ale.rodriguez@gmail.com', 'sin_imagen.png', '$2y$10$egVVWasi2maZ/oLfAjO2F.2W2DIbZGxtuCtCsBy6yFCUVPmJ34Xzm', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(39, 'Damian', 'damian.freidenberger@gmail.com', 'sin_imagen.png', '$2y$10$aRDv9DxDyX0KNj8uNay6Pe6JxHZlRyv.FLzzaXrQLw/4Yh.bsshuO', NULL, '2018-05-12 14:11:53', '2018-05-12 14:11:53'),
(40, 'Alejandro', 'ale.alba@gmail.com', 'sin_imagen.png', '$2y$10$Y1gAqsF/mUR/EJ9SZD4cPOIm4Y8ILVbIa/X5kqztWL5SPJyCGgEc6', NULL, '2018-05-12 14:11:54', '2018-05-12 14:11:54'),
(41, 'Sergio', 'sergio.sanab@gmail.com', 'sin_imagen.png', '$2y$10$cUr6E265O6cxjJ.k9VZfvepUoZuKOuV7TvBVX8qLI/p0Jm4qp4naW', NULL, '2018-05-12 14:11:54', '2018-05-12 14:11:54'),
(42, 'Claudia', 'tecnico@gmail.com', 'sin_imagen.png', '$2y$10$YyGvuWeqbxMGqbILtNaGBOMHa3bIuNb6W.hznxJqrdF7oY.2fW02G', NULL, '2018-05-12 14:11:54', '2018-05-12 14:11:54'),
(47, 'Lucas Ibañez', 'ibanez@gmail.com', 'persona_1526140423.png', '$2y$10$FLV86gGMojzQeWrNSQkzf.yhaZjr7IjogrrnL5Eb7n1ro/spq/.Zu', 'F6cO377cnqeGTrdOoUFYCpRUT2by7ugVqhtKwzer74LWH8bA7eNZfg41LDZO', '2018-05-12 15:53:43', '2018-05-12 15:53:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_conversaciones`
--

CREATE TABLE `users_conversaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `bandera_escritura` tinyint(1) DEFAULT NULL,
  `conversacion_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_conversaciones`
--

INSERT INTO `users_conversaciones` (`id`, `bandera_escritura`, `conversacion_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, '2018-05-12 14:05:39', NULL),
(2, NULL, 1, 2, '2018-05-12 14:05:39', NULL),
(3, 1, 2, 47, '2018-05-14 00:21:04', '2018-05-14 00:35:08'),
(4, NULL, 2, 5, '2018-05-14 00:21:04', '2018-05-14 00:21:04'),
(5, NULL, 3, 47, '2018-05-26 16:06:09', '2018-05-26 16:06:09'),
(6, NULL, 3, 4, '2018-05-26 16:06:09', '2018-05-26 16:06:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `backgroundColor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borderColor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmada` int(10) UNSIGNED DEFAULT NULL,
  `realizada` int(10) UNSIGNED DEFAULT NULL,
  `oportunidad_id` int(10) UNSIGNED DEFAULT NULL,
  `solicitudservicio_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `title`, `start`, `end`, `allDay`, `backgroundColor`, `borderColor`, `confirmada`, `realizada`, `oportunidad_id`, `solicitudservicio_id`, `created_at`, `updated_at`) VALUES
(1, 'Se va a ver que materiales hacen falta para la sol', '2018-05-27 00:05:00', '2018-05-26 14:05:00', NULL, '#1E8449', '#1E8449', 1, 1, NULL, 2, '2018-05-26 16:00:11', '2018-05-27 04:24:55'),
(2, 'Juan D. Perón al 1400. Ríos López Andrea . ', '2018-05-29 00:05:00', '2018-05-24 19:05:00', NULL, '#1E8449', '#1E8449', 1, 1, NULL, 3, '2018-05-28 22:07:03', '2018-05-28 22:14:36');

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
-- Indices de la tabla `conceptos_liquidaciones_mensuales`
--
ALTER TABLE `conceptos_liquidaciones_mensuales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conceptos_liquidaciones_mensuales_liquidacionmensual_id_foreign` (`liquidacionmensual_id`),
  ADD KEY `conceptos_liquidaciones_mensuales_contrato_id_foreign` (`contrato_id`),
  ADD KEY `conceptos_liquidaciones_mensuales_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_inquilino_id_foreign` (`inquilino_id`),
  ADD KEY `contratos_inmueble_id_foreign` (`inmueble_id`),
  ADD KEY `contratos_garante_id_foreign` (`garante_id`);

--
-- Indices de la tabla `contratos_periodos`
--
ALTER TABLE `contratos_periodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_periodos_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `contratos_servicios`
--
ALTER TABLE `contratos_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_servicios_contrato_id_foreign` (`contrato_id`),
  ADD KEY `contratos_servicios_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edificios_barrio_id_foreign` (`barrio_id`),
  ADD KEY `edificios_localidad_id_foreign` (`localidad_id`);

--
-- Indices de la tabla `edificios_caracteristicas`
--
ALTER TABLE `edificios_caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edificios_caracteristicas_caracteristica_id_foreign` (`caracteristica_id`),
  ADD KEY `edificios_caracteristicas_edificio_id_foreign` (`edificio_id`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_oportunidades`
--
ALTER TABLE `estados_oportunidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_users_mensajes`
--
ALTER TABLE `estado_users_mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado_users_mensajes_mensaje_id_foreign` (`mensaje_id`),
  ADD KEY `estado_users_mensajes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `garantes`
--
ALTER TABLE `garantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `garantes_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `historias_oportunidades`
--
ALTER TABLE `historias_oportunidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historias_oportunidades_oportunidad_id_foreign` (`oportunidad_id`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmuebles_edificio_id_foreign` (`edificio_id`),
  ADD KEY `inmuebles_tipo_id_foreign` (`tipo_id`),
  ADD KEY `inmuebles_propietario_id_foreign` (`propietario_id`),
  ADD KEY `inmuebles_barrio_id_foreign` (`barrio_id`),
  ADD KEY `inmuebles_localidad_id_foreign` (`localidad_id`);

--
-- Indices de la tabla `inmuebles_caracteristicas`
--
ALTER TABLE `inmuebles_caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmuebles_caracteristicas_caracteristica_id_foreign` (`caracteristica_id`),
  ADD KEY `inmuebles_caracteristicas_inmueble_id_foreign` (`inmueble_id`);

--
-- Indices de la tabla `inmuebles_imagenes`
--
ALTER TABLE `inmuebles_imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmuebles_imagenes_inmueble_id_foreign` (`inmueble_id`),
  ADD KEY `inmuebles_imagenes_espacio_id_foreign` (`espacio_id`),
  ADD KEY `inmuebles_imagenes_proyecto_id_foreign` (`proyecto_id`);

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
  ADD KEY `liquidaciones_mensuales_contrato_id_foreign` (`contrato_id`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `localidades_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mensajes_conversacion_id_foreign` (`conversacion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_user_id_foreign` (`user_id`),
  ADD KEY `movimientos_inquilino_id_foreign` (`inquilino_id`),
  ADD KEY `movimientos_tecnico_id_foreign` (`tecnico_id`),
  ADD KEY `movimientos_propietario_id_foreign` (`propietario_id`),
  ADD KEY `movimientos_liquidacion_id_foreign` (`liquidacion_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificaciones_user_id_foreign` (`user_id`),
  ADD KEY `notificaciones_visita_id_foreign` (`visita_id`);

--
-- Indices de la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oportunidades_estado_id_foreign` (`estado_id`),
  ADD KEY `oportunidades_inmueble_id_foreign` (`inmueble_id`);

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
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personas_dni_unique` (`dni`),
  ADD KEY `personas_localidad_id_foreign` (`localidad_id`),
  ADD KEY `personas_pais_id_foreign` (`pais_id`),
  ADD KEY `personas_user_id_foreign` (`user_id`);

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
  ADD KEY `proyectos_barrio_id_foreign` (`barrio_id`),
  ADD KEY `proyectos_edificio_id_foreign` (`edificio_id`),
  ADD KEY `proyectos_propietario_id_foreign` (`propietario_id`);

--
-- Indices de la tabla `responiva`
--
ALTER TABLE `responiva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `rubrostecnicos`
--
ALTER TABLE `rubrostecnicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudesservicio`
--
ALTER TABLE `solicitudesservicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudesservicio_tecnico_id_foreign` (`tecnico_id`),
  ADD KEY `solicitudesservicio_contrato_id_foreign` (`contrato_id`),
  ADD KEY `solicitudesservicio_rubrotecnico_id_foreign` (`rubrotecnico_id`),
  ADD KEY `solicitudesservicio_liquidacionmensual_id_foreign` (`liquidacionmensual_id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tecnicos_persona_id_foreign` (`persona_id`),
  ADD KEY `tecnicos_rubrotecnico_id_foreign` (`rubroTecnico_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_movimiento`
--
ALTER TABLE `tipos_movimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_conversaciones`
--
ALTER TABLE `users_conversaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_conversaciones_conversacion_id_foreign` (`conversacion_id`),
  ADD KEY `users_conversaciones_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitas_oportunidad_id_foreign` (`oportunidad_id`),
  ADD KEY `visitas_solicitudservicio_id_foreign` (`solicitudservicio_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrios`
--
ALTER TABLE `barrios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `conceptos_liquidaciones_mensuales`
--
ALTER TABLE `conceptos_liquidaciones_mensuales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contratos_periodos`
--
ALTER TABLE `contratos_periodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `contratos_servicios`
--
ALTER TABLE `contratos_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `edificios`
--
ALTER TABLE `edificios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `edificios_caracteristicas`
--
ALTER TABLE `edificios_caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `estados_oportunidades`
--
ALTER TABLE `estados_oportunidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_users_mensajes`
--
ALTER TABLE `estado_users_mensajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `garantes`
--
ALTER TABLE `garantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historias_oportunidades`
--
ALTER TABLE `historias_oportunidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `inmuebles_caracteristicas`
--
ALTER TABLE `inmuebles_caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `inmuebles_imagenes`
--
ALTER TABLE `inmuebles_imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `responiva`
--
ALTER TABLE `responiva`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rubrostecnicos`
--
ALTER TABLE `rubrostecnicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `solicitudesservicio`
--
ALTER TABLE `solicitudesservicio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipos_movimiento`
--
ALTER TABLE `tipos_movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `users_conversaciones`
--
ALTER TABLE `users_conversaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `conceptos_liquidaciones_mensuales`
--
ALTER TABLE `conceptos_liquidaciones_mensuales`
  ADD CONSTRAINT `conceptos_liquidaciones_mensuales_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conceptos_liquidaciones_mensuales_liquidacionmensual_id_foreign` FOREIGN KEY (`liquidacionmensual_id`) REFERENCES `liquidaciones_mensuales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conceptos_liquidaciones_mensuales_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_garante_id_foreign` FOREIGN KEY (`garante_id`) REFERENCES `garantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contratos_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contratos_inquilino_id_foreign` FOREIGN KEY (`inquilino_id`) REFERENCES `inquilinos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contratos_periodos`
--
ALTER TABLE `contratos_periodos`
  ADD CONSTRAINT `contratos_periodos_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contratos_servicios`
--
ALTER TABLE `contratos_servicios`
  ADD CONSTRAINT `contratos_servicios_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contratos_servicios_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD CONSTRAINT `edificios_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `edificios_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `edificios_caracteristicas`
--
ALTER TABLE `edificios_caracteristicas`
  ADD CONSTRAINT `edificios_caracteristicas_caracteristica_id_foreign` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristicas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `edificios_caracteristicas_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `estado_users_mensajes`
--
ALTER TABLE `estado_users_mensajes`
  ADD CONSTRAINT `estado_users_mensajes_mensaje_id_foreign` FOREIGN KEY (`mensaje_id`) REFERENCES `mensajes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `estado_users_mensajes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `garantes`
--
ALTER TABLE `garantes`
  ADD CONSTRAINT `garantes_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historias_oportunidades`
--
ALTER TABLE `historias_oportunidades`
  ADD CONSTRAINT `historias_oportunidades_oportunidad_id_foreign` FOREIGN KEY (`oportunidad_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD CONSTRAINT `inmuebles_barrio_id_foreign` FOREIGN KEY (`barrio_id`) REFERENCES `barrios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmuebles_caracteristicas`
--
ALTER TABLE `inmuebles_caracteristicas`
  ADD CONSTRAINT `inmuebles_caracteristicas_caracteristica_id_foreign` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristicas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_caracteristicas_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmuebles_imagenes`
--
ALTER TABLE `inmuebles_imagenes`
  ADD CONSTRAINT `inmuebles_imagenes_espacio_id_foreign` FOREIGN KEY (`espacio_id`) REFERENCES `espacios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_imagenes_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inmuebles_imagenes_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inquilinos`
--
ALTER TABLE `inquilinos`
  ADD CONSTRAINT `inquilinos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `liquidaciones_mensuales`
--
ALTER TABLE `liquidaciones_mensuales`
  ADD CONSTRAINT `liquidaciones_mensuales_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_conversacion_id_foreign` FOREIGN KEY (`conversacion_id`) REFERENCES `conversaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_inquilino_id_foreign` FOREIGN KEY (`inquilino_id`) REFERENCES `inquilinos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_liquidacion_id_foreign` FOREIGN KEY (`liquidacion_id`) REFERENCES `liquidaciones_mensuales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_tecnico_id_foreign` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notificaciones_visita_id_foreign` FOREIGN KEY (`visita_id`) REFERENCES `visitas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `oportunidades`
--
ALTER TABLE `oportunidades`
  ADD CONSTRAINT `oportunidades_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados_oportunidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `oportunidades_inmueble_id_foreign` FOREIGN KEY (`inmueble_id`) REFERENCES `inmuebles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `personas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `proyectos_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyectos_localidad_id_foreign` FOREIGN KEY (`localidad_id`) REFERENCES `localidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyectos_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proyectos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitudesservicio`
--
ALTER TABLE `solicitudesservicio`
  ADD CONSTRAINT `solicitudesservicio_contrato_id_foreign` FOREIGN KEY (`contrato_id`) REFERENCES `contratos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitudesservicio_liquidacionmensual_id_foreign` FOREIGN KEY (`liquidacionmensual_id`) REFERENCES `liquidaciones_mensuales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitudesservicio_rubrotecnico_id_foreign` FOREIGN KEY (`rubrotecnico_id`) REFERENCES `rubrostecnicos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitudesservicio_tecnico_id_foreign` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `tecnicos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `tecnicos_rubrotecnico_id_foreign` FOREIGN KEY (`rubroTecnico_id`) REFERENCES `rubrostecnicos` (`id`);

--
-- Filtros para la tabla `users_conversaciones`
--
ALTER TABLE `users_conversaciones`
  ADD CONSTRAINT `users_conversaciones_conversacion_id_foreign` FOREIGN KEY (`conversacion_id`) REFERENCES `conversaciones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_conversaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_oportunidad_id_foreign` FOREIGN KEY (`oportunidad_id`) REFERENCES `oportunidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visitas_solicitudservicio_id_foreign` FOREIGN KEY (`solicitudservicio_id`) REFERENCES `solicitudesservicio` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
