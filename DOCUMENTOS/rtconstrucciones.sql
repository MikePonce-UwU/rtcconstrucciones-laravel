-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2022 a las 05:08:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rtconstrucciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `ID_ALQUILER` int(11) NOT NULL,
  `NOMBRE_EMPRESA` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TELEFONO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_ALQUILER` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TOTAL_PAGAR` decimal(8,2) DEFAULT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`ID_ALQUILER`, `NOMBRE_EMPRESA`, `DIRECCION`, `TELEFONO`, `FECHA_ALQUILER`, `TOTAL_PAGAR`, `ID_ESTADO`) VALUES
(1, 'JMaquinaria', 'Aguas turbias, calle 3', '22448866', '2021-11-24 23:36:19', '270.00', 1),
(2, 'empresa ejemplo', 'direccion', '12345678', '2022-01-24 17:19:43', '1000.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega_proyecto`
--

CREATE TABLE `bodega_proyecto` (
  `ID_BODEGA_PROYECTO` int(11) NOT NULL,
  `NOMBRE_BODEGA` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_CREACION` timestamp NULL DEFAULT NULL,
  `FECHA_CIERRE` timestamp NULL DEFAULT NULL,
  `CAPACIDAD` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CAPACIDAD_DISPONIBLE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ID_PROYECTO` bigint(20) UNSIGNED NOT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL,
  `ID_USUARIO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `bodega_proyecto`
--

INSERT INTO `bodega_proyecto` (`ID_BODEGA_PROYECTO`, `NOMBRE_BODEGA`, `DIRECCION`, `FECHA_CREACION`, `FECHA_CIERRE`, `CAPACIDAD`, `CAPACIDAD_DISPONIBLE`, `ID_PROYECTO`, `ID_ESTADO`, `ID_USUARIO`) VALUES
(1, 'Bodega proyecto Bello horizonte', 'Bello Horizonte, 3c. al sur, 1c. arriba, 1/2c. sur', '2021-10-22 21:08:34', '2021-11-24 21:08:37', '80x70x90mts', 'TOTAL', 1, 1, 1),
(2, 'bodega de prueba', 'direccion', '2022-01-24 17:10:44', '2022-03-23 17:10:50', 'capacidad', 'TOTAL', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bodega_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `bodega_usuario` (
`NOMBRE_BODEGA` varchar(50)
,`name` varchar(191)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Maquinaria', 'Máquinas pesadas de construcción '),
(2, 'Herramienta', 'Herramientas de mano'),
(3, 'Material', 'Material que usa en los proyectos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_COMPRA` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_COMPRA` timestamp NULL DEFAULT NULL,
  `GASTO_TOTAL` decimal(8,2) DEFAULT NULL,
  `ID_BODEGA_PROYECTO` bigint(20) UNSIGNED NOT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_COMPRA`, `DESCRIPCION`, `FECHA_COMPRA`, `GASTO_TOTAL`, `ID_BODEGA_PROYECTO`, `ID_ESTADO`) VALUES
(1, 'Compra de material de construcción', '2021-10-23 21:25:23', '533.00', 1, 1),
(2, 'Compra de nueva maquinaria', '2021-10-23 13:37:49', '7200.00', 1, 1),
(3, 'descripcion de prueba', '2022-01-25 17:35:05', '300.00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_alquiler`
--

CREATE TABLE `detalle_alquiler` (
  `ID_DETALLE_ALQUILER` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `HORAS_ALQUILER` int(11) DEFAULT NULL,
  `HORAS_EXCEDIDAS` int(11) DEFAULT NULL,
  `PAGO_HORA` decimal(8,2) DEFAULT NULL,
  `PAGO_EXCEDIDO` decimal(8,2) DEFAULT NULL,
  `SUBTOTAL` decimal(8,2) DEFAULT NULL,
  `ID_BODEGA_PROYECTO` bigint(20) UNSIGNED NOT NULL,
  `ID_ALQUILER` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_alquiler`
--

INSERT INTO `detalle_alquiler` (`ID_DETALLE_ALQUILER`, `NOMBRE`, `CANTIDAD`, `HORAS_ALQUILER`, `HORAS_EXCEDIDAS`, `PAGO_HORA`, `PAGO_EXCEDIDO`, `SUBTOTAL`, `ID_BODEGA_PROYECTO`, `ID_ALQUILER`) VALUES
(1, 'Cinta métrica', 1, 6, 1, '20.00', '20.00', '120.00', 1, 1),
(2, 'Martillo', 1, 5, 2, '10.00', '20.00', '70.00', 1, 1),
(5, 'Pegamento PVC 100ml', 5, 6, 2, '10.00', '20.00', '80.00', 1, 1),
(6, 'Taladro', 12, 8, 5, '25.00', NULL, NULL, 1, 1),
(7, 'maquinaria', 10, 10, 1, '20.00', '20.00', '220.00', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `ID_DETALLE_COMPRA` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO` decimal(8,2) DEFAULT NULL,
  `ID_COMPRA` bigint(20) UNSIGNED NOT NULL,
  `ID_CATEGORIA` bigint(20) UNSIGNED NOT NULL,
  `ID_UND_MEDIDA` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`ID_DETALLE_COMPRA`, `NOMBRE`, `CANTIDAD`, `PRECIO`, `ID_COMPRA`, `ID_CATEGORIA`, `ID_UND_MEDIDA`) VALUES
(1, 'Aplanadora', 1, '123.00', 1, 1, 1),
(2, 'Arena Marlon°', 30, '12.00', 1, 3, 2),
(3, 'Pegamento PVC 100ml', 5, '10.00', 1, 3, 1),
(4, 'Grúa brazo', 2, '3600.00', 2, 1, 1),
(5, 'cemento', 3, '100.00', 3, 3, 1);

--
-- Disparadores `detalle_compra`
--
DELIMITER $$
CREATE TRIGGER `NuevoTotal` AFTER INSERT ON `detalle_compra` FOR EACH ROW UPDATE compra SET compra.GASTO_TOTAL = (SELECT SUM(detalle_compra.CANTIDAD*detalle_compra.PRECIO) from detalle_compra WHERE new.ID_COMPRA = detalle_compra.ID_COMPRA) WHERE compra.ID_COMPRA = new.ID_COMPRA
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `borrarCompra` AFTER DELETE ON `detalle_compra` FOR EACH ROW UPDATE compra SET compra.GASTO_TOTAL = (SELECT SUM(detalle_compra.CANTIDAD*detalle_compra.PRECIO) from detalle_compra WHERE old.ID_COMPRA = detalle_compra.ID_COMPRA) WHERE compra.ID_COMPRA = old.ID_COMPRA
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrada`
--

CREATE TABLE `detalle_entrada` (
  `ID_DETALLE_ENTRADA` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ID_PRODUCTO` bigint(20) UNSIGNED NOT NULL,
  `ID_ENTRADA` bigint(20) UNSIGNED NOT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_entrada`
--

INSERT INTO `detalle_entrada` (`ID_DETALLE_ENTRADA`, `CANTIDAD`, `ID_PRODUCTO`, `ID_ENTRADA`, `ID_ESTADO`) VALUES
(2, 100, 1, 1, 1),
(3, 50, 4, 1, 4);

--
-- Disparadores `detalle_entrada`
--
DELIMITER $$
CREATE TRIGGER `DeleteCantidadProductoEntrada` AFTER DELETE ON `detalle_entrada` FOR EACH ROW UPDATE producto a
SET a.CANTIDAD = (a.CANTIDAD - old.CANTIDAD) WHERE a.ID_PRODUCTO = old.ID_PRODUCTO
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `InsertCantidadProductoEntrada` BEFORE INSERT ON `detalle_entrada` FOR EACH ROW UPDATE producto a 
SET a.CANTIDAD = (a.CANTIDAD + new.CANTIDAD)
WHERE a.ID_PRODUCTO = new.ID_PRODUCTO
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida`
--

CREATE TABLE `detalle_salida` (
  `ID_DETALLE_SALIDA` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_SALIDA` bigint(20) UNSIGNED NOT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_salida`
--

INSERT INTO `detalle_salida` (`ID_DETALLE_SALIDA`, `CANTIDAD`, `ID_PRODUCTO`, `ID_SALIDA`, `ID_ESTADO`) VALUES
(1, 100, 1, 1, 1),
(2, 40, 4, 2, 3);

--
-- Disparadores `detalle_salida`
--
DELIMITER $$
CREATE TRIGGER `DeleteCantidadProductoSalida` AFTER DELETE ON `detalle_salida` FOR EACH ROW UPDATE producto a 
SET a.CANTIDAD = (a.CANTIDAD + old.CANTIDAD)
WHERE a.ID_PRODUCTO = old.ID_PRODUCTO
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `InsertCantidadProductoSalida` AFTER INSERT ON `detalle_salida` FOR EACH ROW UPDATE producto a 
SET a.CANTIDAD = (a.CANTIDAD - new.CANTIDAD)
WHERE a.ID_PRODUCTO = new.ID_PRODUCTO
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `ID_ENTRADA` int(11) NOT NULL,
  `DESCRIPCION_ENTRADA` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_ENTRADA` timestamp NULL DEFAULT NULL,
  `ID_USUARIO` bigint(20) UNSIGNED DEFAULT NULL,
  `ID_BODEGA_PROYECTO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`ID_ENTRADA`, `DESCRIPCION_ENTRADA`, `FECHA_ENTRADA`, `ID_USUARIO`, `ID_BODEGA_PROYECTO`) VALUES
(1, 'Prueba Entrada', '2021-11-25 00:09:58', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_ESTADO`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Activo', 'Proyecto activo'),
(2, 'Inactivo', 'Proyecto inactivo'),
(3, 'Nuevo', 'Item nuevo'),
(4, 'Usado', 'Item usado'),
(5, 'Nuevo/usado', 'Item nuevo pero usado'),
(6, 'Dañado', 'Item dañado'),
(7, 'Habilitado', 'Usuario'),
(8, 'Deshabilitado', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_25_235528_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2021-10-22 17:03:19', '2021-10-22 17:03:19'),
(2, 'user-create', 'web', '2021-10-22 17:03:19', '2021-10-22 17:03:19'),
(3, 'user-edit', 'web', '2021-10-22 17:03:19', '2021-10-22 17:03:19'),
(4, 'user-delete', 'web', '2021-10-22 17:03:19', '2021-10-22 17:03:19'),
(5, 'role-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(6, 'role-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(7, 'role-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(8, 'role-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(9, 'permission-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(10, 'permission-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(11, 'permission-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(12, 'bodega-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(13, 'bodega-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(14, 'bodega-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(15, 'bodega-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(16, 'proyecto-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(17, 'proyecto-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(18, 'proyecto-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(19, 'proyecto-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(20, 'entrada-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(21, 'entrada-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(22, 'entrada-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(23, 'entrada-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(24, 'salida-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(25, 'salida-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(26, 'salida-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(27, 'salida-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(28, 'alquiler-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(29, 'alquiler-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(30, 'alquiler-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(31, 'alquiler-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(32, 'producto-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(33, 'producto-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(34, 'producto-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(35, 'producto-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(36, 'compra-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(37, 'compra-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(38, 'compra-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(39, 'compra-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(40, 'categoria-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(41, 'categoria-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(42, 'categoria-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(43, 'categoria-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(44, 'estado-list', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(45, 'estado-create', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(46, 'estado-edit', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20'),
(47, 'estado-delete', 'web', '2021-10-22 17:03:20', '2021-10-22 17:03:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL,
  `ID_CATEGORIA` bigint(20) UNSIGNED NOT NULL,
  `ID_UND_MEDIDA` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE`, `CANTIDAD`, `ID_ESTADO`, `ID_CATEGORIA`, `ID_UND_MEDIDA`) VALUES
(1, 'Cemento', 300, 3, 3, 2),
(2, 'Grúa de pala', 10, 1, 1, 1),
(3, 'Pegamento PVC 100ml', 50, 5, 3, 1),
(4, 'martillo', 40, 3, 2, 1),
(5, 'Lamina Lisa De Aluminio', 100, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `ID_PROYECTO` int(11) NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_INICIO` timestamp NULL DEFAULT NULL,
  `FECHA_FINALIZACION` timestamp NULL DEFAULT NULL,
  `ID_TIPO_PROYECTO` bigint(20) UNSIGNED NOT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`ID_PROYECTO`, `NOMBRE`, `DESCRIPCION`, `DIRECCION`, `FECHA_INICIO`, `FECHA_FINALIZACION`, `ID_TIPO_PROYECTO`, `ID_ESTADO`) VALUES
(1, 'Proyecto bello horizonte', 'Proyecto donde se llevará a cabo la construcción de un puente en la rotonda de bello horizonte', 'Bello Horizonte, 3c. al sur, 1c. arriba, 1/2c. sur', '2021-10-20 19:04:20', '2021-11-24 19:04:22', 3, 1),
(2, 'proyecto de prueba', 'descripcion', 'direccion', '2022-01-23 17:13:37', '2022-03-10 17:13:40', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-10-22 17:03:26', '2021-10-22 17:03:26'),
(2, 'Proyecto', 'web', '2021-11-02 18:54:46', '2021-11-02 18:54:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `ID_SALIDA` int(11) NOT NULL,
  `DESCRIPCION_SALIDA` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `FECHA_SALIDA` timestamp NULL DEFAULT NULL,
  `ID_USUARIO` bigint(20) UNSIGNED NOT NULL,
  `ID_BODEGA_PROYECTO` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`ID_SALIDA`, `DESCRIPCION_SALIDA`, `FECHA_SALIDA`, `ID_USUARIO`, `ID_BODEGA_PROYECTO`) VALUES
(1, 'Nuevo material puente bello horizonte', '2021-11-18 13:49:11', 1, 1),
(2, 'añadir productos', '2022-01-25 17:39:41', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `ID_TIPO_PROYECTO` int(11) NOT NULL,
  `NOMBRE` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_proyecto`
--

INSERT INTO `tipo_proyecto` (`ID_TIPO_PROYECTO`, `NOMBRE`, `DESCRIPCION`) VALUES
(1, 'Horizontal', 'Caminos, calles, carreteras, andenes, etc.'),
(2, 'Vertical', 'Edificios, casas, etc.'),
(3, 'Puente', 'Puentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `und_medida`
--

CREATE TABLE `und_medida` (
  `ID_UND_MEDIDA` int(11) NOT NULL,
  `ABREVIACION` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DESCRIPCION` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `und_medida`
--

INSERT INTO `und_medida` (`ID_UND_MEDIDA`, `ABREVIACION`, `DESCRIPCION`) VALUES
(1, 'U', 'Unidad'),
(2, 'KG', 'Kilogramo'),
(3, 'LB', 'Libra'),
(4, 'MT', 'Metro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_ESTADO` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `ID_ESTADO`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$X7TRY0DUkdKR8nkJXtF95eeNvrHaUTiKvh10acA1HOZWCJpVCl6Nu', '2zk3naYMVdUQO6448u9sB5G9BolFGtLuZRXI7YYA2ZfPX4icH1INeHrKaSXe', 7, '2021-10-22 17:03:26', '2022-05-02 18:21:58'),
(2, 'Mike Ponce', 'mvallecillo101@gmail.com', NULL, '$2y$10$gLwgmnYHS0qEYs6E.gV5RO9eaYJGreUO8a7xThp454zqWVUd9NOj6', NULL, 7, '2021-11-02 18:55:19', '2022-05-02 18:07:33'),
(3, 'Tester', 'tester@tester.com', NULL, '$2y$10$tkUzxczaaJMwcJ6sFM/ua.Kz3deA6N.U0p75JuBhYHfAF9TI/bMKu', NULL, 7, '2022-04-09 04:49:35', '2022-05-02 18:07:48');

-- --------------------------------------------------------

--
-- Estructura para la vista `bodega_usuario`
--
DROP TABLE IF EXISTS `bodega_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bodega_usuario`  AS SELECT `b`.`NOMBRE_BODEGA` AS `NOMBRE_BODEGA`, `u`.`name` AS `name` FROM (`bodega_proyecto` `b` left join `users` `u` on(`u`.`id` = `b`.`ID_USUARIO`)) ORDER BY `b`.`ID_BODEGA_PROYECTO` ASC LIMIT 0, 25 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`ID_ALQUILER`),
  ADD KEY `RefESTADO29` (`ID_ESTADO`);

--
-- Indices de la tabla `bodega_proyecto`
--
ALTER TABLE `bodega_proyecto`
  ADD PRIMARY KEY (`ID_BODEGA_PROYECTO`),
  ADD KEY `RefPROYECTO19` (`ID_PROYECTO`),
  ADD KEY `RefESTADO31` (`ID_ESTADO`),
  ADD KEY `RefUSUARIO1` (`ID_USUARIO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_COMPRA`),
  ADD KEY `RefBODEGA_PROYECTO13` (`ID_BODEGA_PROYECTO`),
  ADD KEY `RefESTADO30` (`ID_ESTADO`);

--
-- Indices de la tabla `detalle_alquiler`
--
ALTER TABLE `detalle_alquiler`
  ADD PRIMARY KEY (`ID_DETALLE_ALQUILER`),
  ADD KEY `RefBODEGA_PROYECTO23` (`ID_BODEGA_PROYECTO`),
  ADD KEY `RefALQUILER24` (`ID_ALQUILER`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`ID_DETALLE_COMPRA`),
  ADD KEY `RefCOMPRA15` (`ID_COMPRA`),
  ADD KEY `RefCATEGORIA20` (`ID_CATEGORIA`),
  ADD KEY `RefUND_MEDIDA28` (`ID_UND_MEDIDA`);

--
-- Indices de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  ADD PRIMARY KEY (`ID_DETALLE_ENTRADA`),
  ADD KEY `RefENTRADA5` (`ID_ENTRADA`),
  ADD KEY `RefPRODUCTO18` (`ID_PRODUCTO`),
  ADD KEY `RefESTADO25` (`ID_ESTADO`);

--
-- Indices de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  ADD PRIMARY KEY (`ID_DETALLE_SALIDA`),
  ADD KEY `RefPRODUCTO3` (`ID_PRODUCTO`),
  ADD KEY `RefSALIDA4` (`ID_SALIDA`),
  ADD KEY `RefESTADO26` (`ID_ESTADO`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`ID_ENTRADA`),
  ADD UNIQUE KEY `refUsuario2` (`ID_USUARIO`),
  ADD KEY `RefBODEGA_PROYECTO10` (`ID_BODEGA_PROYECTO`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_ESTADO`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `RefESTADO1` (`ID_ESTADO`),
  ADD KEY `RefCATEGORIA2` (`ID_CATEGORIA`),
  ADD KEY `RefUND_MEDIDA27` (`ID_UND_MEDIDA`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`ID_PROYECTO`),
  ADD KEY `RefTIPO_PROYECTO22` (`ID_TIPO_PROYECTO`),
  ADD KEY `RefESTADO32` (`ID_ESTADO`);

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
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`ID_SALIDA`),
  ADD KEY `RefBODEGA_PROYECTO9` (`ID_BODEGA_PROYECTO`),
  ADD KEY `refusuario_salida` (`ID_USUARIO`);

--
-- Indices de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  ADD PRIMARY KEY (`ID_TIPO_PROYECTO`);

--
-- Indices de la tabla `und_medida`
--
ALTER TABLE `und_medida`
  ADD PRIMARY KEY (`ID_UND_MEDIDA`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `ID_ALQUILER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bodega_proyecto`
--
ALTER TABLE `bodega_proyecto`
  MODIFY `ID_BODEGA_PROYECTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_alquiler`
--
ALTER TABLE `detalle_alquiler`
  MODIFY `ID_DETALLE_ALQUILER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `ID_DETALLE_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_entrada`
--
ALTER TABLE `detalle_entrada`
  MODIFY `ID_DETALLE_ENTRADA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_salida`
--
ALTER TABLE `detalle_salida`
  MODIFY `ID_DETALLE_SALIDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `ID_ENTRADA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `ID_PROYECTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `ID_SALIDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  MODIFY `ID_TIPO_PROYECTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `und_medida`
--
ALTER TABLE `und_medida`
  MODIFY `ID_UND_MEDIDA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
