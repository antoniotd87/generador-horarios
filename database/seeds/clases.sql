-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2022 a las 05:45:33
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_id` bigint(20) UNSIGNED NOT NULL,
  `materia_id` bigint(20) UNSIGNED NOT NULL,
  `grupo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `maestro_id`, `materia_id`, `grupo_id`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 11, '2022-05-27 07:43:52', '2022-05-27 07:43:52'),
(2, 1, 14, 12, '2022-05-27 07:44:01', '2022-05-27 07:44:01'),
(3, 1, 15, 15, '2022-05-27 07:44:09', '2022-05-27 07:44:09'),
(4, 1, 15, 16, '2022-05-27 07:44:17', '2022-05-27 07:44:17'),
(5, 2, 16, 3, '2022-05-27 07:44:41', '2022-05-27 07:44:41'),
(6, 2, 16, 4, '2022-05-27 07:44:50', '2022-05-27 07:44:50'),
(8, 2, 17, 7, '2022-05-27 07:45:10', '2022-05-27 07:45:10'),
(9, 2, 17, 8, '2022-05-27 07:45:20', '2022-05-27 07:45:20'),
(10, 3, 18, 3, '2022-05-27 07:50:12', '2022-05-27 07:50:12'),
(11, 3, 18, 4, '2022-05-27 07:50:21', '2022-05-27 07:50:21'),
(12, 3, 3, 3, '2022-05-27 07:50:44', '2022-05-27 07:50:44'),
(13, 3, 19, 11, '2022-05-27 07:50:54', '2022-05-27 07:50:54'),
(14, 3, 19, 12, '2022-05-27 07:51:04', '2022-05-27 07:51:04'),
(15, 4, 20, 11, '2022-05-27 07:52:28', '2022-05-27 07:52:28'),
(16, 4, 20, 12, '2022-05-27 07:52:36', '2022-05-27 07:52:36'),
(17, 4, 1, 16, '2022-05-27 07:52:45', '2022-05-27 07:52:45'),
(18, 4, 1, 15, '2022-05-27 07:53:45', '2022-05-27 07:53:45'),
(19, 12, 5, 3, '2022-05-27 07:57:43', '2022-05-27 07:57:43'),
(20, 12, 5, 4, '2022-05-27 07:57:50', '2022-05-27 07:57:50'),
(21, 12, 6, 11, '2022-05-27 07:58:03', '2022-05-27 07:58:03'),
(22, 12, 6, 12, '2022-05-27 07:58:14', '2022-05-27 07:58:14'),
(23, 12, 7, 15, '2022-05-27 07:58:27', '2022-05-27 07:58:27'),
(24, 12, 7, 16, '2022-05-27 07:58:41', '2022-05-27 07:58:41'),
(26, 11, 3, 4, '2022-05-27 08:17:50', '2022-05-27 08:17:50'),
(27, 11, 4, 15, '2022-05-27 08:18:03', '2022-05-27 08:18:03'),
(28, 11, 4, 16, '2022-05-27 08:18:11', '2022-05-27 08:18:11'),
(29, 10, 12, 7, '2022-05-27 08:23:05', '2022-05-27 08:23:05'),
(30, 10, 12, 8, '2022-05-27 08:23:16', '2022-05-27 08:23:16'),
(31, 10, 13, 11, '2022-05-27 08:23:26', '2022-05-27 08:23:26'),
(32, 10, 13, 12, '2022-05-27 08:23:39', '2022-05-27 08:23:39'),
(33, 5, 21, 7, '2022-05-27 08:25:45', '2022-05-27 08:25:45'),
(34, 5, 21, 8, '2022-05-27 08:25:53', '2022-05-27 08:25:53'),
(35, 5, 22, 15, '2022-05-27 08:26:11', '2022-05-27 08:26:11'),
(36, 5, 22, 16, '2022-05-27 08:26:19', '2022-05-27 08:26:19'),
(37, 9, 10, 3, '2022-05-27 08:27:05', '2022-05-27 08:27:05'),
(38, 9, 10, 4, '2022-05-27 08:27:14', '2022-05-27 08:27:14'),
(39, 9, 11, 15, '2022-05-27 08:28:01', '2022-05-27 08:28:01'),
(40, 9, 11, 16, '2022-05-27 08:28:08', '2022-05-27 08:28:08'),
(41, 6, 23, 7, '2022-05-27 08:30:20', '2022-05-27 08:30:20'),
(42, 6, 23, 8, '2022-05-27 08:30:29', '2022-05-27 08:30:29'),
(43, 6, 24, 11, '2022-05-27 08:30:41', '2022-05-27 08:30:41'),
(44, 6, 24, 12, '2022-05-27 08:30:48', '2022-05-27 08:30:48'),
(45, 7, 25, 7, '2022-05-27 08:42:05', '2022-05-27 08:42:05'),
(46, 7, 25, 8, '2022-05-27 08:42:20', '2022-05-27 08:42:20'),
(47, 8, 8, 3, '2022-05-27 08:44:45', '2022-05-27 08:44:45'),
(48, 8, 8, 4, '2022-05-27 08:44:54', '2022-05-27 08:44:54'),
(49, 8, 9, 7, '2022-05-27 08:45:11', '2022-05-27 08:45:11'),
(50, 8, 9, 8, '2022-05-27 08:45:22', '2022-05-27 08:45:22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clases_materia_id_grupo_id_unique` (`materia_id`,`grupo_id`),
  ADD KEY `clases_maestro_id_foreign` (`maestro_id`),
  ADD KEY `clases_grupo_id_foreign` (`grupo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `clases_maestro_id_foreign` FOREIGN KEY (`maestro_id`) REFERENCES `maestros` (`id`),
  ADD CONSTRAINT `clases_materia_id_foreign` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
