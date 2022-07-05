-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-06-2022 a las 03:13:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm_ace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Managed explicit emulation', 'Tempore dolohrum et tenetur nostrum aut. Quo dolor accusamus voluptates voluptatem magnam non ea temporibus. Sit maiores quis quia nihil est aut est. Est aperiam non culpa rerum quasi eligendi officiis. Neque quis sint sunt voluptatem nostrum. In ut autem id laboriosam rerum necessitatibus. Odit id aut laboriosam. Odit et corrupti quisquam asperiores ipsa et. Incidunt aut ullam enim delectus. Officiis qui officia et. Animi ea voluptas modi omnis aut. Maxime deserunt illum repellat qui minus. Quisquam beatae voluptate quis molestiae. Recusandae incidunt quia ut non. Assumenda ex quos quae ut.', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, 'Proactive content-based moratorium', 'Qui itaque vero nam quia vero praesentium. Debitis molestiae cum nihil libero in. Laboriosam qui ut voluptas voluptatem quaerat dicta quasi. Incidunt illum iure sunt. Qui delectus et culpa odio aut debitis. Praesentium commodi est magnam enim perferendis. Quae sequi nisi cum distinctio labore laboriosam. Quod quas distinctio itaque et velit beatae maiores. Quo porro quos quisquam maiores aut ea. Quo deserunt aliquam excepturi deserunt voluptas quia earum. Repellendus dolores beatae excepturi. Delectus consectetur quam ut qui.', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, 'Mandatory incremental project', 'Tempore sint quisquam voluptas ut eum. Unde sapiente ut magnam sed. Dolores enim provident voluptatem accusantium officiis enim corporis ullam. Inventore ipsam totam voluptas. Esse nam ut perspiciatis et nisi. Libero et modi sint enim. Est eligendi quia accusamus earum eum numquam. Eos occaecati laboriosam magnam accusantium nostrum. Alias asperiores molestiae saepe nam. Consequuntur est consequatur reiciendis rem quia. Quibusdam sit a officia deleniti quia ut quo. Corporis voluptatem iste ut ut libero. Aut et omnis ut.', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, 'Visionary high-level synergy', 'Minima quae laboriosam et ratione consequatur optio est. Tempore sapiente quae voluptas qui omnis labore et. Accusamus dolores dignissimos aut ipsum. Officia amet velit quasi totam. Numquam minima cum enim recusandae veniam rerum cupiditate. Porro placeat est voluptates harum ut delectus blanditiis. Numquam explicabo sed eveniet aliquid. Quidem est explicabo laboriosam distinctio. Qui doloremque quasi voluptatem animi ullam. Et accusantium maxime sed dignissimos.', '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(10) UNSIGNED NOT NULL,
  `dia` date NOT NULL,
  `turno` int(11) NOT NULL,
  `contratacion_id` int(11) NOT NULL,
  `tratamiento_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `centro_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_profesional`
--

CREATE TABLE `cita_profesional` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cita_id` bigint(20) UNSIGNED NOT NULL,
  `profesional_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrataciones`
--

CREATE TABLE `contrataciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `tratamiento_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `valor_pagado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalaciones`
--

CREATE TABLE `instalaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instalacion_tipo_id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion_tipo`
--

CREATE TABLE `instalacion_tipo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_25_174656_create_tratamientos_table', 1),
(5, '2021_09_26_194016_create_contrataciones_table', 1),
(6, '2021_09_26_194605_create_clientes_table', 1),
(7, '2021_09_26_194908_create_citas_table', 1),
(8, '2021_09_26_195143_create_pacientes_table', 1),
(9, '2021_10_08_190307_create_profesionales_table', 1),
(10, '2021_10_08_201845_create_citas_profesionales', 1),
(11, '2021_10_10_131404_create_salons_table', 1),
(12, '2021_10_10_131927_create_salon_horario_table', 1),
(13, '2021_10_10_132000_create_instalacion_tipo_table', 1),
(14, '2021_10_10_132306_create_profesional_horario_table', 1),
(15, '2021_10_10_132651_create_instalaciones_table', 1),
(16, '2021_10_10_134156_create_profesional_tratamiento_table', 1),
(17, '2021_10_14_015609_create_pacientes_datos_personales_table', 1),
(18, '2021_11_13_150445_create_areas_table', 1),
(19, '2022_03_26_014456_create_pensamientos_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'luis ledesma', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, 'rodrigo valdivia', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, 'alejandro mascarenas', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, 'samuel trejo', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(5, 'ignacio escamilla', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(6, 'ornela bustos', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(7, 'victoria chapa', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(8, 'juan jose romo', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(9, 'silvana henriquez', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(10, 'michelle guardado', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(11, 'thiago angulo', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(12, 'nicole villagomez', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(13, 'jose colunga', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(14, 'carlos chavarria', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(15, 'ashley concepcion', '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_datos_personales`
--

CREATE TABLE `pacientes_datos_personales` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_principal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_emergencias` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes_datos_personales`
--

INSERT INTO `pacientes_datos_personales` (`id`, `dni`, `fecha_nacimiento`, `domicilio`, `telefono_principal`, `telefono_emergencias`, `genero`, `paciente_id`, `created_at`, `updated_at`) VALUES
(1, '84947277', '18/4/1932', 'Javier Juárez 122,Gral. Antonio', '+5980116611615', '+73721582930', '2', 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, '63225365', '13/3/1963', 'Jacobo Colón 7261,Ariana del Oeste', '+493382501522', '+298902726', '1', 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, '39498953', '1/4/1992', 'Madrid Valentino 7206,Puerto Rafaela del Este', '+903849805015', '+35093654188', '1', 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, '62134088', '23/12/1997', 'Matías Sara 1859,Casárez del Sur', '+93502097394', '+644153446855', '2', 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(5, '97016632', '27/6/1953', 'Juan Pablo Abrego 7931,Cantú del Norte', '+247462119', '+3536420003563', '2', 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(6, '32467376', '18/3/1991', 'Valdez Bruno 2971,Villa Juan José', '+258918893211', '+9645870401015', '2', 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(7, '71313122', '7/4/1988', 'Ríos Saldivar 8266,Puerto Ricardo', '+594175653650', '+995246707354', '2', 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(8, '95796369', '25/7/1979', 'Flórez Manuela 8176,Agustina del Norte', '+255140262083', '+29001229', '2', 8, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(9, '61272811', '2/7/1973', 'Lara Luis 6334,Alma del Mar', '+460684722393', '+449700602542', '1', 9, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(10, '07073243', '23/12/1958', 'Figueroa Santiago 7844,Don Olivia del Este', '+224393946233', '+878678670132768', '1', 10, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(11, '95742885', '24/2/1917', 'Contreras Amador 5596,San Daniela', '+50968319669', '+818549383149', '1', 11, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(12, '61663404', '2/7/1963', 'Paula Valladares 102,Ocampo del Oeste', '+3588702744317', '+9763022792876', '2', 12, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(13, '80784807', '12/8/1930', 'Hidalgo Velasco 3362,Horacio del Mar', '+97316260698', '+243114466925', '2', 13, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(14, '68954482', '13/11/1902', 'Alejandro Ortega 5300,Villa Manuela', '+22879433705', '+3588530853898', '2', 14, '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(15, '56753165', '24/7/1978', 'Jorge Jesús 958,Arce del Sur', '+968768804891', '+6790519432', '1', 15, '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensamientos`
--

CREATE TABLE `pensamientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `texto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pensamientos`
--

INSERT INTO `pensamientos` (`id`, `texto`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'es mi nueva aplicacion', '[\"gorilamind\"]', '2022-04-07 22:56:01', '2022-04-07 22:56:01'),
(2, 'se utiliza para tomar notas', '[\"gorilamind\"]', '2022-04-07 22:56:06', '2022-04-07 22:56:06'),
(3, 'es como una aplicación de chat personal', '[\"gorilamind\"]', '2022-04-07 22:56:12', '2022-04-07 22:56:12'),
(4, 'tendría que agregar un autocompletador de hashtags', '[\"gorilamind\",\"todo\",\"hecho\"]', '2022-04-07 22:56:30', '2022-04-12 00:54:23'),
(5, 'para que ayude a la hora de anotar uno nuevo', '[\"gorilamind\"]', '2022-04-07 22:56:39', '2022-04-07 22:56:55'),
(6, 'esc debería borrar el último tag ingresado', '[\"gorilamind\",\"todo\",\"hecho\",\"done\"]', '2022-04-07 22:56:48', '2022-04-14 05:11:53'),
(7, 'hola amigo', '[\"test\",\"prueba2\",\"prueba3\"]', '2022-04-07 23:02:55', '2022-04-08 16:20:54'),
(8, 'quiero entretenerme con algo', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:06:58', '2022-04-07 23:06:58'),
(9, 'pero no se con que', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:00', '2022-04-07 23:07:00'),
(10, 'jugar videojuegos está bien', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:05', '2022-04-07 23:07:05'),
(11, 'pero no se hasta que punto está bien', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:09', '2022-04-07 23:07:09'),
(12, 'hay videojuegos buenos', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:13', '2022-04-07 23:07:13'),
(13, 'hay videojuegos malos', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:17', '2022-04-07 23:07:17'),
(14, 'tambien me gusta programar', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:22', '2022-04-07 23:07:22'),
(15, 'pero programar me consume energía', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:29', '2022-04-07 23:07:29'),
(16, 'el trabajo de Fashiophile viene bien', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:33', '2022-04-07 23:07:33'),
(17, 'podría ir mejor', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:35', '2022-04-07 23:07:35'),
(18, 'pero viene bien', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:37', '2022-04-07 23:07:37'),
(19, 'no se como podría ir mejor', '[\"preocupacion\",\"2022-04-07\"]', '2022-04-07 23:07:43', '2022-04-07 23:07:43'),
(20, 'arreglar: filtro negativo no está funcionando correctamente', '[\"gorilamind\",\"todo\",\"hecho\",\"done\"]', '2022-04-08 15:56:56', '2022-04-14 05:11:53'),
(21, 'add tag multiple elements simultaniously', '[\"gorilamind\",\"todo\",\"done\"]', '2022-04-08 16:00:49', '2022-04-14 05:11:53'),
(22, 'edit window should accept changes by default (either esc or save, shouldnt have a cancel)', '[\"gorilamind\",\"todo\",\"done\"]', '2022-04-08 16:01:23', '2022-04-14 05:11:53'),
(23, 'Moments', '[\"planning\"]', '2022-04-08 17:54:29', '2022-04-08 17:54:29'),
(24, 'Day', '[\"planning\"]', '2022-04-08 17:54:30', '2022-04-08 17:54:30'),
(25, 'Week', '[\"planning\"]', '2022-04-08 17:54:32', '2022-04-08 17:54:32'),
(26, 'Month', '[\"planning\"]', '2022-04-08 17:54:34', '2022-04-08 17:54:34'),
(27, 'Year', '[\"planning\"]', '2022-04-08 17:54:36', '2022-04-08 17:54:36'),
(28, 'Decade', '[\"planning\"]', '2022-04-08 17:54:37', '2022-04-08 17:54:37'),
(29, 'Half century', '[\"planning\"]', '2022-04-08 17:55:33', '2022-04-08 17:55:33'),
(30, 'Century', '[\"planning\"]', '2022-04-08 17:55:45', '2022-04-08 17:55:45'),
(31, 'Human', '[\"planning\"]', '2022-04-08 17:58:43', '2022-04-08 17:58:43'),
(32, 'Family', '[\"planning\"]', '2022-04-08 17:58:45', '2022-04-08 17:58:45'),
(33, 'Clan', '[\"planning\"]', '2022-04-08 17:58:46', '2022-04-08 17:58:46'),
(34, 'Town', '[\"planning\"]', '2022-04-08 17:58:52', '2022-04-08 17:58:52'),
(35, 'City', '[\"planning\"]', '2022-04-08 17:58:53', '2022-04-08 17:58:53'),
(36, 'Province', '[\"planning\"]', '2022-04-08 17:58:58', '2022-04-08 17:58:58'),
(37, 'State', '[\"planning\"]', '2022-04-08 17:59:01', '2022-04-08 17:59:01'),
(38, 'Alliance', '[\"planning\"]', '2022-04-08 17:59:08', '2022-04-08 17:59:08'),
(39, 'World', '[\"planning\"]', '2022-04-08 17:59:11', '2022-04-08 17:59:11'),
(40, '#limitcart', '[\"fashionphile\",\"cart\",\"limitcart\"]', '2022-04-08 19:58:07', '2022-04-08 19:58:07'),
(41, 'limit to a 100', '[\"fashionphile\",\"cart\",\"limitcart\",\"todo\",null,\"done\",\"useraccess\"]', '2022-04-08 19:58:11', '2022-05-15 23:51:16'),
(42, 'first in first out', '[\"fashionphile\",\"cart\",\"limitcart\"]', '2022-04-08 19:58:14', '2022-04-08 19:58:14'),
(43, 'clear carts?', '[\"fashionphile\",\"cart\",\"limitcart\"]', '2022-04-08 20:03:01', '2022-04-08 20:03:01'),
(44, 'send an email to shopers if we clean carts', '[\"fashionphile\",\"cart\",\"limitcart\"]', '2022-04-08 20:03:17', '2022-04-08 20:03:17'),
(45, 'send an email with the items id that we removed', '[\"fashionphile\",\"cart\",\"limitcart\"]', '2022-04-08 20:03:34', '2022-04-08 20:03:34'),
(46, 'create a refund endpoint', '[\"fashionphile\",\"refund\"]', '2022-04-08 21:24:13', '2022-04-08 21:24:13'),
(47, 'frontend calls from the webhook anything but 200', '[\"fashionphile\",\"refund\"]', '2022-04-08 21:25:14', '2022-04-08 21:25:14'),
(48, 'backend create endpoint with security_token where refund is done', '[\"fashionphile\",\"refund\"]', '2022-04-08 21:27:00', '2022-04-08 21:27:00'),
(49, 'failorder', '[\"fashionphile\",\"refund\"]', '2022-04-08 21:28:03', '2022-04-08 21:28:03'),
(50, 'risecondition', '[\"fashionphile\",\"refund\"]', '2022-04-08 21:28:06', '2022-04-08 21:28:06'),
(51, 'Dark Dubstep tiene onda.', '[\"musica\",\"aprender\",\"copado\"]', '2022-04-10 17:35:17', '2022-04-10 22:11:20'),
(52, 'Chill Bass es un genero que parece que funciona', '[\"musica\"]', '2022-04-10 17:37:33', '2022-04-10 17:37:33'),
(54, 'molecula', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:19', '2022-04-11 17:20:19'),
(55, 'celula', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:21', '2022-04-11 17:20:21'),
(56, 'organo', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:23', '2022-04-11 17:20:23'),
(57, 'sistema', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:25', '2022-04-11 17:20:25'),
(58, 'animal', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:27', '2022-04-11 17:20:27'),
(59, 'humano', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:29', '2022-04-11 17:20:29'),
(60, 'familia', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:40', '2022-04-11 17:20:40'),
(61, 'clan', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:20:41', '2022-04-11 17:20:41'),
(62, 'pueblo', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:20:44', '2022-04-14 05:08:44'),
(63, 'ciudad', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:20:47', '2022-04-14 05:08:44'),
(64, 'provincia', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:20:54', '2022-04-14 05:08:44'),
(65, 'pais', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:20:57', '2022-04-14 05:08:44'),
(66, 'región', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:21:01', '2022-04-14 05:08:44'),
(67, 'mundo', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-11 17:21:10', '2022-04-14 05:08:44'),
(68, 'revolución agricola', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:21:18', '2022-04-11 17:21:18'),
(69, 'revolución industrial (I, II, III)', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:21:27', '2022-04-11 17:21:27'),
(70, 'revolución financiera', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:21:31', '2022-04-11 17:21:31'),
(71, 'revolución de las comunicaciones (I, II, III)', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-11 17:21:45', '2022-04-11 17:21:45'),
(72, 'pasar por oficinas de rrhh Juan Manuel de Rosas 635, Lomas del Mirador, PBA', '[\"telecentro\",\"documentacion\",\"renuncia\"]', '2022-04-11 19:12:31', '2022-04-11 19:12:31'),
(73, '9 a 18', '[\"telecentro\",\"documentacion\",\"renuncia\"]', '2022-04-11 19:12:43', '2022-04-11 19:12:43'),
(74, 'jueves si', '[\"telecentro\",\"documentacion\",\"renuncia\"]', '2022-04-11 19:13:21', '2022-04-11 19:13:21'),
(75, 'David de RRHH', '[\"telecentro\",\"documentacion\",\"renuncia\"]', '2022-04-11 19:17:12', '2022-04-11 19:17:12'),
(76, '1156133468', '[\"telecentro\",\"documentacion\",\"renuncia\"]', '2022-04-11 19:17:42', '2022-04-11 19:17:42'),
(77, 'ir a las oficinas', '[\"telecentro\",\"documentacion\",\"renuncia\",\"todo\",\"done\",null,\"useraccess\"]', '2022-04-11 19:21:17', '2022-05-15 23:51:16'),
(94, 'En los próximos 40 años, 20 podrían ser gobernados por Kirchneristas.', '[\"pensamiento\",\"argentina\",\"politica\"]', '2022-04-12 19:11:06', '2022-04-12 19:11:06'),
(95, 'Hay que armar un estado donde los kirchneristas puedan hacer la menor cantidad de daño posible.', '[\"pensamiento\",\"argentina\",\"politica\"]', '2022-04-12 19:11:18', '2022-04-12 19:11:18'),
(96, 'why are operations going thru it when it has been disabled', '[\"fashionphile\",\"stripe\",\"rules\",\"3dsecure\"]', '2022-04-12 19:41:42', '2022-04-12 19:41:42'),
(97, 'see sentry for errors', '[\"fashionphile\",\"user\",\"login\",\"todo\",\"done\",null,\"useraccess\"]', '2022-04-12 19:43:27', '2022-05-15 23:51:16'),
(98, 'user access', '[\"gorilamind\",\"todo\"]', '2022-04-13 04:29:49', '2022-04-13 04:29:49'),
(99, 'online access', '[\"gorilamind\",\"todo\"]', '2022-04-13 04:29:51', '2022-04-13 04:29:51'),
(100, 'territorio', '[\"planning\",\"pensamiento\",\"simulacion\",\"lugar\"]', '2022-04-14 02:41:59', '2022-04-16 03:22:18'),
(101, 'sociedad', '[\"planning\",\"pensamiento\",\"simulacion\"]', '2022-04-14 02:42:04', '2022-04-14 02:42:04'),
(106, 'voluntad', '[\"simulacion\",\"recursos\",\"planning\",\"pensamiento\"]', '2022-04-15 19:30:57', '2022-04-16 03:31:25'),
(107, 'conocimientos', '[\"simulacion\",\"recursos\",\"planning\"]', '2022-04-15 19:30:58', '2022-04-16 03:31:06'),
(108, 'inteligencia', '[\"simulacion\",\"recursos\",\"planning\"]', '2022-04-15 19:30:59', '2022-04-16 03:31:06'),
(109, 'change from payment_intent.succeeded to payment_intent-amount_capturable_updated', '[\"fashionphile\",\"cc2328\",\"done\"]', '2022-04-15 19:46:05', '2022-04-20 19:50:25'),
(110, 'check logs on CheckoutControllert', '[\"fashionphile\",\"cc2328\",\"done\"]', '2022-04-15 20:04:28', '2022-04-20 19:50:25'),
(111, 'empresa', '[\"simulacion\",\"organizaciones\",\"planning\"]', '2022-04-16 03:25:39', '2022-04-16 03:31:06'),
(112, 'gobierno', '[\"simulacion\",\"organizaciones\",\"planning\"]', '2022-04-16 03:25:42', '2022-04-16 03:31:06'),
(113, 'clima', '[\"simulacion\",\"planning\"]', '2022-04-16 03:34:55', '2022-04-16 03:34:55'),
(114, 'recursos naturales', '[\"simulacion\",\"planning\"]', '2022-04-16 03:35:05', '2022-04-16 03:35:05'),
(115, 'instalaciones', '[\"simulacion\",\"planning\"]', '2022-04-16 03:35:12', '2022-04-16 03:35:12'),
(116, 'En el planeta tierra, en el presente.', '[\"simulacion\"]', '2022-04-16 03:41:34', '2022-04-16 03:41:34'),
(117, 'Aprovechando todos las cosas que existen.', '[\"simulacion\"]', '2022-04-16 03:41:36', '2022-04-16 03:41:36'),
(118, 'Defendiendo de todas las cosas que pueden afectar.', '[\"simulacion\"]', '2022-04-16 03:41:45', '2022-04-16 03:41:45'),
(119, 'diseñar y construir un producto que la gente quiera pagar a un ratio eficiente', '[\"simulacion\"]', '2022-04-16 03:56:14', '2022-04-16 03:56:14'),
(121, 'CRC Class Responsability Colaboration', '[\"estudio\",\"todo\",\"crcd\",\"crc\",\"proyecto\",\"card\",null]', '2022-04-17 23:20:34', '2022-04-17 23:24:19'),
(122, 'software de evaluacion de opciones', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:25:03', '2022-04-17 23:26:29'),
(123, 'el usuario crea Tarjetas/Cartas', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:25:12', '2022-04-17 23:26:29'),
(124, 'las cartas tienen una serie de valores que el usuario puede completar', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:25:26', '2022-04-17 23:26:29'),
(125, 'las tarjetas vienen \"predefinidas\", quitandole trabajo de diseño al usuario', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:25:38', '2022-04-17 23:26:29'),
(126, 'las tarjetas pueden ser ordenadas mediante el uso de Drag and Drop', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:25:47', '2022-04-17 23:26:29'),
(127, 'Se pueden crear Cuadrantes en el plano donde se incertan las tarjetas para organizar el contenido', '[\"todo\",\"proyecto\",\"card\"]', '2022-04-17 23:26:05', '2022-04-17 23:26:29'),
(129, 'visa eeuu adrian', '[\"todo\",\"done\"]', '2022-04-18 05:27:29', '2022-05-16 00:00:49'),
(130, 'merge Affirm returns ticket', '[\"todo\",\"fashionphile\",\"done\"]', '2022-04-18 19:47:20', '2022-05-16 00:00:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Dante Domínguez', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, 'Constanza Aranda', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, 'Sara Sofía Abrego', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, 'María Téllez', '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional_horario`
--

CREATE TABLE `profesional_horario` (
  `id` int(10) UNSIGNED NOT NULL,
  `profesional_id` bigint(20) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED NOT NULL,
  `dia` date DEFAULT NULL,
  `hora_inicio` int(11) NOT NULL,
  `hora_fin` int(11) NOT NULL,
  `dia_semana` int(11) NOT NULL,
  `atiende` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesional_horario`
--

INSERT INTO `profesional_horario` (`id`, `profesional_id`, `salon_id`, `dia`, `hora_inicio`, `hora_fin`, `dia_semana`, `atiende`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 540, 1200, 1, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, 1, 1, NULL, 540, 1200, 2, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, 1, 1, NULL, 540, 1200, 3, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, 1, 1, NULL, 540, 1200, 4, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(5, 1, 1, NULL, 540, 1200, 5, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(6, 1, 1, NULL, 540, 1200, 6, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(7, 1, 1, NULL, 0, 0, 7, 'No', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(8, 2, 1, NULL, 540, 1200, 1, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(9, 2, 1, NULL, 540, 1200, 2, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(10, 2, 1, NULL, 540, 1200, 3, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(11, 2, 1, NULL, 540, 1200, 4, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(12, 2, 1, NULL, 540, 1200, 5, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(13, 2, 1, NULL, 540, 1200, 6, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(14, 2, 1, NULL, 0, 0, 7, 'No', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(15, 3, 1, NULL, 540, 1200, 1, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(16, 3, 1, NULL, 540, 1200, 2, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(17, 3, 1, NULL, 540, 1200, 3, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(18, 3, 1, NULL, 540, 1200, 4, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(19, 3, 1, NULL, 540, 1200, 5, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(20, 3, 1, NULL, 540, 1200, 6, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(21, 3, 1, NULL, 0, 0, 7, 'No', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(22, 4, 1, NULL, 540, 1200, 1, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(23, 4, 1, NULL, 540, 1200, 2, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(24, 4, 1, NULL, 540, 1200, 3, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(25, 4, 1, NULL, 540, 1200, 4, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(26, 4, 1, NULL, 540, 1200, 5, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(27, 4, 1, NULL, 540, 1200, 6, 'Si', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(28, 4, 1, NULL, 0, 0, 7, 'No', '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesional_tratamiento`
--

CREATE TABLE `profesional_tratamiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `profesional_id` bigint(20) UNSIGNED NOT NULL,
  `tratamiento_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salones`
--

CREATE TABLE `salones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salones`
--

INSERT INTO `salones` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ocasio Solano 837', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(2, 'Archuleta Alessandra 7353', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(3, 'Linares Hinojosa 7135', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(4, 'Horacio Ignacio 4261', '2022-03-26 04:45:17', '2022-03-26 04:45:17'),
(5, 'Molina Gómez 5485', '2022-03-26 04:45:17', '2022-03-26 04:45:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon_horario`
--

CREATE TABLE `salon_horario` (
  `id` int(10) UNSIGNED NOT NULL,
  `salon_id` bigint(20) UNSIGNED NOT NULL,
  `dia` date DEFAULT NULL,
  `hora_inicio` int(11) NOT NULL,
  `hora_fin` int(11) NOT NULL,
  `dia_semana` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `abierto` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salon_horario`
--

INSERT INTO `salon_horario` (`id`, `salon_id`, `dia`, `hora_inicio`, `hora_fin`, `dia_semana`, `created_at`, `updated_at`, `abierto`) VALUES
(1, 1, NULL, 540, 1200, 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(2, 1, NULL, 540, 1200, 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(3, 1, NULL, 540, 1200, 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(4, 1, NULL, 540, 1200, 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(5, 1, NULL, 540, 1200, 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(6, 1, NULL, 540, 1200, 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(7, 1, NULL, 0, 0, 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'No'),
(8, 2, NULL, 540, 1200, 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(9, 2, NULL, 540, 1200, 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(10, 2, NULL, 540, 1200, 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(11, 2, NULL, 540, 1200, 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(12, 2, NULL, 540, 1200, 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(13, 2, NULL, 540, 1200, 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(14, 2, NULL, 0, 0, 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'No'),
(15, 3, NULL, 540, 1200, 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(16, 3, NULL, 540, 1200, 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(17, 3, NULL, 540, 1200, 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(18, 3, NULL, 540, 1200, 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(19, 3, NULL, 540, 1200, 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(20, 3, NULL, 540, 1200, 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(21, 3, NULL, 0, 0, 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'No'),
(22, 4, NULL, 540, 1200, 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(23, 4, NULL, 540, 1200, 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(24, 4, NULL, 540, 1200, 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(25, 4, NULL, 540, 1200, 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(26, 4, NULL, 540, 1200, 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(27, 4, NULL, 540, 1200, 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(28, 4, NULL, 0, 0, 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'No'),
(29, 5, NULL, 540, 1200, 1, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(30, 5, NULL, 540, 1200, 2, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(31, 5, NULL, 540, 1200, 3, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(32, 5, NULL, 540, 1200, 4, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(33, 5, NULL, 540, 1200, 5, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(34, 5, NULL, 540, 1200, 6, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'Si'),
(35, 5, NULL, 0, 0, 7, '2022-03-26 04:45:17', '2022-03-26 04:45:17', 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_corta` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_principal` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sesiones` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id`, `nombre`, `descripcion`, `descripcion_corta`, `imagen_principal`, `sesiones`, `duracion`, `area_id`, `valor`, `activo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Enhanced systematic migration', 'Sed sed odio eius explicabo. Atque velit reiciendis doloremque accusamus et rerum id eveniet. Quia sed suscipit sapiente quia voluptas velit. Asperiores est esse veritatis vero nostrum vitae debitis. Nemo necessitatibus est ut laboriosam ea eos voluptatem. Nostrum omnis odit voluptatem. Assumenda est ex et et quae est. Sit et voluptas ipsam perferendis ut asperiores aut dolorum. Provident dicta nam error. Ut ullam dolorem possimus saepe odio quis ab. Adipisci architecto non laboriosam ullam. Et sit molestias itaque et.', 'Id porro expedita ipsam quia pariatur necessitatibus libero. Voluptas sequi autem optio veritatis suscipit in. Non incidunt quibusdam voluptatem sit quod accusamus temporibus repudiandae.', '2.jpg', 4, 95, 4, 2000, 1, NULL, NULL, NULL),
(2, 'User-centric fault-tolerant access', 'Aut adipisci voluptatem neque iusto nihil rerum. Fugiat ullam dolor rem unde. Et amet hic qui quia. Dolorum aut et eaque quo iure. Rem reprehenderit rerum iusto recusandae iure. Iure ipsa qui maxime ut at quam illo eveniet. Impedit consequatur sit dolores vitae natus aut. Sit incidunt reiciendis repellat. Rerum dolores recusandae adipisci inventore pariatur in non. Iusto ipsa est dicta debitis. Quia adipisci accusantium aliquid facilis ea. Inventore aut incidunt iure et et. Voluptates repudiandae nam libero et autem officia nobis. Et omnis nostrum omnis maiores sunt.', 'Architecto neque unde minus. Odio cupiditate nesciunt nostrum eligendi eligendi dolor nihil. Quas laboriosam fugit aliquid consequatur. Et quia veritatis minima debitis nam enim vel placeat.', '2.jpg', 6, 30, 2, 8000, 1, NULL, NULL, NULL),
(3, 'Customizable regional analyzer', 'Quia corporis est dolorum non id eum. Aperiam optio error voluptatum. Ad amet quidem veritatis veritatis ipsum architecto qui. Non ut quis eius distinctio eos. Fugit sit sint est delectus. Repellat quidem quia vel omnis corporis consequuntur similique voluptas. Repellat repellat quis omnis enim. Consequuntur velit praesentium tempore explicabo eos. Adipisci nisi possimus impedit veniam voluptatem. Vel odit quaerat perspiciatis iure eveniet provident. Perspiciatis eligendi nulla ut corporis maiores.', 'Inventore praesentium alias quia modi dolorem. Aut vitae recusandae et illum illo omnis aut. Suscipit animi doloribus aut nihil tenetur.', '5.jpg', 8, 55, 3, 2700, 0, NULL, NULL, NULL),
(4, 'Team-oriented local utilisation', 'Atque repellendus aliquid tenetur. Qui in et qui provident. Ad sint eaque facilis quis rem. Amet voluptate et dolorem voluptate quo distinctio voluptatibus. Accusamus qui et et enim laborum. Voluptatem est facere omnis accusantium qui velit. Laborum ipsum molestiae hic est quisquam. Maiores voluptatem aperiam cum et. Nulla quaerat beatae odit laboriosam est asperiores quia. Incidunt velit ipsum dolor excepturi qui.', 'Voluptas eos iste rem id mollitia magni necessitatibus. Nesciunt earum ut labore. Doloribus excepturi voluptatem distinctio sunt animi excepturi temporibus.', '2.jpg', 16, 85, 4, 220, 0, NULL, NULL, NULL),
(5, 'Profound attitude-oriented policy', 'Ipsam nisi sit corrupti tenetur. Tempore nisi consequatur reiciendis quia vel ullam sed praesentium. Sint quam quo saepe quo vel nisi. Ut odio neque dignissimos sit. Et molestiae minus assumenda sint consequatur illo. Illo eius veniam placeat placeat. Perferendis magnam sit id in aspernatur eum. Numquam harum et voluptatem omnis eius maxime ex. Quo consequuntur aut architecto ut tempore nulla et. Qui qui illo nam quaerat ratione inventore. Tenetur sint eligendi est omnis vitae. Aut dolore nam id aut.', 'Omnis reprehenderit eum quis tempora inventore dolores tenetur. Doloremque quia maiores enim est non assumenda sequi in. Quia voluptatem temporibus laboriosam optio.', '5.jpg', 1, 85, 1, 2400, 1, NULL, NULL, NULL),
(6, 'Configurable explicit productivity', 'Porro deleniti aliquam pariatur consectetur enim libero. Praesentium odit atque ipsam rerum placeat. Atque enim culpa quibusdam quia voluptatem odio unde quas. Ex tempora voluptas eaque mollitia ut. Reiciendis reprehenderit sapiente cum. Illum autem ullam dolores. Consectetur corporis tenetur impedit ut. Vel architecto et atque tempora voluptatem dolorum voluptatibus. Autem omnis consequatur cumque laboriosam sed. Ut ipsum magni ex ut nihil a. Voluptas aspernatur omnis ducimus. Nostrum non nesciunt amet deserunt facere. Voluptatem perferendis optio hic non eum.', 'Vel praesentium eius qui. Tempore sint sint blanditiis id ducimus. Et qui aut sequi atque dolor dolorem earum facilis. Ullam ratione aut et et et.', '3.jpg', 8, 70, 2, 14000, 1, NULL, NULL, NULL),
(7, 'Managed human-resource instructionset', 'Non magnam sapiente eligendi mollitia esse. At animi minima quis et aut corrupti suscipit. Veritatis sed repudiandae omnis inventore nam dolorem omnis provident. Inventore vero porro quis ab quia maiores dolor similique. Nihil consequatur qui laborum facere rem rem debitis. Dolor non ea expedita enim. Est dolores alias nemo ut sed nulla rerum. Recusandae totam omnis minima in est aut et odit. Officia commodi repellendus dolorum laudantium illum temporibus similique dolor.', 'Velit magnam tenetur assumenda voluptatum ea quas dolorem eius. Ut fugiat voluptas aut. Ullam dolores saepe corrupti et magnam asperiores. Vitae enim qui aut.', '1.jpg', 12, 40, 4, 130, 0, NULL, NULL, NULL),
(8, 'Cross-platform executive project', 'Doloribus et earum qui placeat. Quia magnam minus ut praesentium repudiandae. Ut esse ullam amet ullam. Ab vero quia et et. Enim eveniet corporis dolor ea facilis. Sit at amet aut laborum quo molestiae. Et pariatur quia odit qui velit animi. Aliquid dicta quis enim nostrum. Autem fugiat vitae ut veritatis eum suscipit. Molestiae est quod animi sunt provident incidunt. Eveniet quidem et aut. Odio dolores sit minus et. Libero consectetur quidem alias similique accusantium. Molestias dolorem consequuntur quasi illo. Vel aut sunt expedita ea aut ipsa.', 'Deleniti ut et ut non impedit. Sunt molestias sint dolorem aut. Et est sed et quaerat vel. Doloremque est ut officia neque earum aut voluptas.', '5.jpg', 12, 70, 4, 100, 0, NULL, NULL, NULL),
(9, 'Extended global attitude', 'Voluptatem nulla debitis perferendis. Et qui officia quia ad placeat. Culpa amet soluta ab dolorem. Enim ipsam minus unde. Vero nostrum voluptatem eum magni voluptate. Assumenda omnis quo rerum quis consequatur. Doloremque et et est et qui praesentium omnis facilis. Ut id facere ipsam dignissimos incidunt rerum. Eligendi repellat ut corrupti id accusantium. Iusto dolor velit qui repellendus ipsa. Quis veniam quia ab distinctio. Ipsam est dolores voluptas. Vel maxime deserunt consequatur perspiciatis.', 'Id est qui corporis facilis possimus. Explicabo esse cupiditate hic dolorem et.', '2.jpg', 9, 75, 4, 140, 0, NULL, NULL, NULL),
(10, 'Robust local groupware', 'Rerum et facilis quaerat eligendi quis unde. Omnis illum non doloremque quia veniam. Aut harum officiis illum qui rerum. Molestias totam sit aliquid unde rerum veniam id. Id qui qui vel laboriosam est et libero. Libero alias magnam distinctio consectetur. Eaque quaerat et aut voluptatem amet dolor. Quae a dicta et alias nemo sint. Omnis cupiditate porro nesciunt aut vel. Atque voluptatum ex pariatur deleniti earum necessitatibus. Natus similique aut nemo labore adipisci illo provident. Accusantium architecto sed quos sed ipsum sed. Explicabo aut alias repellat.', 'Eum excepturi qui culpa minima recusandae aut laborum. Alias dolorum rem magni ut officiis et deleniti. Minima voluptas placeat enim autem quia tempora aut. Velit dolorum totam minus.', '2.jpg', 2, 90, 2, 1000, 1, NULL, NULL, NULL),
(11, 'Robust solution-oriented access', 'Eum qui labore omnis commodi impedit. Aut vel et iusto. Qui ratione ipsam quod sint quis consequatur. Voluptatem magnam dolorem quaerat occaecati assumenda. Voluptatem ipsa eum id temporibus fuga tempore aut. Aspernatur fugiat rerum ratione quo sunt eos. Ex sit sed est vitae. Praesentium quia sunt impedit porro accusantium. Voluptatum ut ea aut. Et quas voluptas molestias voluptas. Nesciunt neque odio et. Architecto placeat non sit quia ratione non. Molestias aut eius doloremque quidem exercitationem accusantium illum. Optio quos et impedit occaecati. Aspernatur accusantium at ea in.', 'Dolor aut eum illum fugit aut hic. In optio culpa aut atque. Ea et praesentium vitae voluptate rerum repellat sed accusamus.', '5.jpg', 2, 65, 2, 8000, 1, NULL, NULL, NULL),
(12, 'Future-proofed multimedia monitoring', 'Ea saepe soluta sint soluta et voluptatibus quis minus. Similique sed iusto eaque repudiandae. Atque voluptates aut aspernatur voluptas iure ipsam. Enim velit qui tempore eum quos officiis. Dolor illo dicta magnam maxime aliquam qui iste. Non accusamus ut saepe quis incidunt a quo enim. Enim alias sed qui distinctio asperiores et fuga. Soluta quas itaque officiis dolor earum repellat et. Maiores quia iste magnam assumenda molestiae. Tempore tempora tempore incidunt doloremque. Tempora quo aut distinctio consequatur. Maxime aspernatur quis illum dignissimos numquam.', 'Molestias sint laudantium non sed. Nihil nulla tempore explicabo autem. Exercitationem qui officia nemo ut ex rerum.', '3.jpg', 12, 45, 4, 28000, 0, NULL, NULL, NULL),
(13, 'Ergonomic zerotolerance knowledgeuser', 'Fugiat earum vel voluptatem quo voluptate sed et rerum. Molestias reprehenderit ut libero ea. Ipsa quisquam placeat libero. Dolores voluptatem voluptates dolorem totam voluptas. Aut quis quia rerum odio eaque. Et assumenda id quia quia quas fugiat. Atque voluptatem aliquam aut officia voluptatum molestiae ad. Quisquam aperiam vel commodi placeat consequatur perferendis deleniti iste. Explicabo adipisci adipisci sit possimus. Rerum omnis nulla consequatur provident dolorem autem inventore. Nam molestiae accusantium et. Recusandae id dicta blanditiis.', 'At facilis porro molestias ratione ratione vero. Cupiditate vero quasi dolor labore maxime. Rerum voluptates dolorem delectus.', '1.jpg', 3, 100, 4, 40, 1, NULL, NULL, NULL),
(14, 'Synergistic discrete core', 'Est a dolor veniam ad aut. Rem qui omnis similique. Veritatis repellat minima voluptatem et sunt ratione. Omnis quas enim laboriosam dolorem. Vel alias voluptatibus unde laboriosam vitae qui qui. Quaerat reiciendis ad provident maiores at expedita iure. Vel quam distinctio voluptatem et rem cumque. Iusto quaerat in impedit voluptatibus quos nam sit. Et quisquam cumque enim dolores ipsam autem voluptatem. Praesentium sit aliquid officiis similique qui et occaecati. Qui in neque aliquam. Cum modi quis quas accusamus repellendus dolorem aut temporibus. Beatae distinctio dolores aliquid nihil.', 'Consequatur saepe illum alias in. Dolore ipsam repudiandae libero quasi labore qui consectetur. Est illum tenetur alias odio.', '4.jpg', 4, 120, 1, 29000, 1, NULL, NULL, NULL),
(15, 'Extended optimal opensystem', 'Et in voluptas error quasi animi. Dolores quo quaerat facilis consequatur dolor. Doloribus quia facilis molestiae. Incidunt accusantium harum expedita rerum aut ut est optio. Blanditiis dolore et saepe id magni. Necessitatibus cumque iusto itaque minima sed earum. Eligendi aut illum totam dolorem. Consequuntur et et ea sed corrupti. Tempora ipsa aut ipsa nulla. Nisi porro et ipsam quisquam est. Culpa natus quae ad consequatur magni. Sint accusamus excepturi odio quidem non delectus debitis nemo. Magnam incidunt mollitia dolorem perspiciatis necessitatibus.', 'Ullam nemo omnis iure non exercitationem. Eius corporis autem accusamus sit inventore omnis. Rerum totam distinctio nam animi.', '2.jpg', 2, 65, 3, 21000, 0, NULL, NULL, NULL),
(16, 'De-engineered tangible time-frame', 'Qui error totam quidem assumenda quia. Ipsa dolor nesciunt doloribus eveniet ex nobis ducimus quia. Consequatur ipsum repudiandae numquam magnam. Alias sit repudiandae enim et quaerat sint. Autem consequuntur et voluptatem sunt. Et ab quam mollitia inventore aut sint est. Qui tempore suscipit distinctio culpa voluptatem harum.', 'Velit est nihil suscipit qui illo quam nihil. Exercitationem maiores illo earum sint. Error laudantium dolores deleniti itaque repellat quae. Tempora non quos ea odit.', '5.jpg', 12, 90, 4, 280, 0, NULL, NULL, NULL),
(17, 'Profound local paradigm', 'Illo placeat nesciunt magnam qui dolorem qui. Sapiente enim maxime suscipit. Quia sit ut eveniet sit ipsa dolore. Ut velit fuga consequatur ut. Blanditiis natus fugiat quia laudantium placeat iusto provident. Facilis cumque culpa molestiae excepturi facilis tenetur quia quia. Voluptatem voluptas est ad autem magnam laborum soluta. Quos ducimus et fuga. Temporibus est est sit qui. Illum quibusdam expedita nemo reprehenderit assumenda cumque. Quidem velit voluptates labore voluptates tenetur qui.', 'Culpa laudantium omnis sit incidunt fuga repellat non. Nemo id voluptatem ea maxime expedita. Quos consequuntur voluptas dolor. Possimus molestiae maxime quas velit aut quos nemo non.', '3.jpg', 12, 120, 2, 1700, 1, NULL, NULL, NULL),
(18, 'Optimized impactful concept', 'Iusto perferendis veritatis sed deserunt. Dolor quo consequuntur qui quidem. Consectetur aliquam dolor vel et et ipsa aliquam qui. Quam nesciunt ut aperiam dolore sed. Autem doloribus perferendis reprehenderit eos sit facilis. Nihil architecto libero et provident provident et. Facere eum eum nostrum vel ratione accusamus. Dolorem doloremque rem voluptas rerum. Et iure accusamus quisquam qui reprehenderit qui. Sit dolores ex est qui autem non ea. Magnam aperiam odit adipisci ut. Vel numquam qui quidem nihil debitis.', 'Vero dolorem rerum et velit. Et similique dolorum soluta vero nemo. Qui ut suscipit et iste vel amet occaecati. Culpa est est non et consequatur aliquid eos.', '3.jpg', 3, 75, 4, 11000, 0, NULL, NULL, NULL),
(19, 'Up-sized background attitude', 'Sed est dolor quia quis. Perspiciatis odio et aut et eius officia. Quia quia architecto ad fugiat. In sed non molestiae eum. Iusto consequuntur aut laboriosam velit non aut omnis. Optio sint non natus. Totam vel minima aut. Sequi eveniet neque at sit qui totam. Optio natus esse molestias eveniet reiciendis molestiae. Magni sit similique qui. Voluptatem aut iusto omnis atque iusto voluptates. Dolorem et saepe quaerat rem sit voluptatem. Officiis incidunt et vero voluptatem porro asperiores ut. Perspiciatis maiores vel dolorum officia. Dolor odit vel at nobis voluptas sequi est.', 'Nihil adipisci quia nesciunt omnis. Ut alias laboriosam maiores et maiores iste facilis. Minus aliquam amet aperiam. Ut itaque dolor itaque fugit.', '5.jpg', 4, 110, 3, 300, 0, NULL, NULL, NULL),
(20, 'Up-sized foreground array', 'Facere sit neque impedit harum illo officia in. Saepe quis non quam. Veniam culpa illum molestias aut. Voluptas labore consequatur ex sapiente dicta odio. Quisquam sapiente ea beatae quia. Doloremque adipisci consequatur accusamus. Ullam minima accusantium nam. Ea ad et dolor quidem. Modi recusandae non nulla sapiente maxime eius et. Quidem repudiandae in quia enim quo aperiam. Omnis excepturi voluptatem ut eos et consequuntur. Nulla vel repellendus laboriosam porro.', 'Sed soluta est rem rerum quia ut. Eum error odit rerum est. Asperiores culpa vero nostrum nihil. Eveniet aut eaque voluptas consequatur. Tempore rerum et vel adipisci cupiditate expedita eligendi.', '2.jpg', 16, 85, 4, 50, 1, NULL, NULL, NULL),
(21, 'Organic client-driven neural-net', 'Impedit illo beatae inventore ut rerum. Laborum et nesciunt incidunt tempora dolorem. Omnis numquam omnis temporibus est quas. Et corrupti vero non sit voluptatem nulla. Doloremque magni velit architecto reiciendis repellat commodi vero. Nesciunt quod omnis autem expedita autem consequatur. Quaerat sed praesentium quisquam qui similique et voluptatem. Ut laudantium necessitatibus sapiente sint laboriosam ratione. Illum quod qui repudiandae iusto perspiciatis modi. Corporis quibusdam saepe ad exercitationem autem nemo.', 'Et qui aut dolore aspernatur ut. Sint ut autem id expedita omnis. Fuga ullam et quia ut. Incidunt dignissimos ducimus nostrum a.', '2.jpg', 4, 100, 1, 18000, 0, NULL, NULL, NULL),
(22, 'Extended high-level initiative', 'Aut nemo voluptatum voluptatem ut dolore distinctio qui. Quia nesciunt alias sit assumenda omnis. Commodi saepe qui sed consequatur quia. Cumque in dignissimos ut rerum provident rerum quia. Et rerum ut repellendus quibusdam suscipit dolorem recusandae. Explicabo est est vero qui suscipit voluptatum non eum. Corporis aut deserunt alias est quibusdam. Qui qui aut et nisi accusantium quidem. Culpa impedit ad vel omnis non. Architecto sunt est laborum molestias soluta eligendi. Ad dolores sit qui aut exercitationem rerum. Architecto molestiae aperiam alias occaecati eveniet eaque.', 'Nostrum voluptas qui cumque. Illo modi in repudiandae et sed minima. Veritatis illo consequatur aut modi ipsa ut aut. Et libero qui libero soluta dolor.', '4.jpg', 6, 40, 1, 5000, 0, NULL, NULL, NULL),
(23, 'Reactive stable circuit', 'Libero voluptates aut repellendus qui. Exercitationem aperiam nam minima autem velit explicabo. Amet sed necessitatibus magni sequi. Qui vel ducimus repellat. Sunt animi dolorem eligendi. Consectetur voluptatem labore saepe laboriosam. Quo saepe sed nobis aspernatur et id. Facere et voluptatem odit illo magnam officia. Animi est corporis nam ducimus dicta minus. Rerum asperiores animi dolorum qui tenetur. Aut et assumenda porro est.', 'Et odit tempora id quo ducimus fugit fuga. Sequi quia voluptatem rerum commodi asperiores veritatis. Non qui ea magni aut. Qui molestiae quis ipsa non vel.', '5.jpg', 2, 50, 2, 800, 0, NULL, NULL, NULL),
(24, 'Digitized incremental interface', 'Ea voluptas ea molestias recusandae omnis suscipit. Molestiae qui dolore quasi sint. Debitis magnam ut ut aut autem eveniet nihil. Aliquam consectetur eligendi molestiae quam aliquam suscipit. Laudantium sed eligendi rerum nulla aliquam ullam. Error ex quisquam vero. Vel sit praesentium minus non et. Deleniti est sequi fuga rerum ducimus voluptas omnis quasi. Consequatur aut omnis magnam dolorum cupiditate hic. Nobis voluptas voluptatem iste qui nemo laudantium. Expedita itaque ut error dolorem fuga.', 'Officia aut ut molestias eos aliquid et. Quo voluptatum qui reprehenderit et fuga quaerat. Et explicabo quos dolor dolore velit molestiae.', '2.jpg', 9, 85, 4, 18000, 1, NULL, NULL, NULL),
(25, 'Pre-emptive radical parallelism', 'Dolore incidunt consequuntur provident omnis excepturi aut eum. Deleniti id natus fugit aut perferendis perspiciatis. Sed laboriosam tempore veritatis laborum quo. Placeat nihil et nesciunt necessitatibus voluptate aut. Voluptatum libero eligendi ullam. Facilis labore sed officiis rerum natus molestiae. Ipsam incidunt est quaerat. Laborum quos quia rerum maiores. Rerum molestias cupiditate qui eligendi accusantium hic natus.', 'Voluptate accusantium quod enim aut labore est corrupti aperiam. Molestiae sit occaecati consequatur consectetur. Aut placeat qui ducimus et aut dolor. Nobis quis id ratione perspiciatis.', '1.jpg', 4, 115, 2, 180, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$TtYZdwtZe/5/a..Ka5qVLuwqRibm50EzA16fSIjRupBV2YRCIKPYS', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita_profesional`
--
ALTER TABLE `cita_profesional`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instalacion_tipo`
--
ALTER TABLE `instalacion_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes_datos_personales`
--
ALTER TABLE `pacientes_datos_personales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesional_horario`
--
ALTER TABLE `profesional_horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesional_horario_profesional_id_foreign` (`profesional_id`),
  ADD KEY `profesional_horario_salon_id_foreign` (`salon_id`);

--
-- Indices de la tabla `profesional_tratamiento`
--
ALTER TABLE `profesional_tratamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesional_tratamiento_profesional_id_foreign` (`profesional_id`),
  ADD KEY `profesional_tratamiento_tratamiento_id_foreign` (`tratamiento_id`);

--
-- Indices de la tabla `salones`
--
ALTER TABLE `salones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salon_horario`
--
ALTER TABLE `salon_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita_profesional`
--
ALTER TABLE `cita_profesional`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrataciones`
--
ALTER TABLE `contrataciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalaciones`
--
ALTER TABLE `instalaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalacion_tipo`
--
ALTER TABLE `instalacion_tipo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pacientes_datos_personales`
--
ALTER TABLE `pacientes_datos_personales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pensamientos`
--
ALTER TABLE `pensamientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `profesional_horario`
--
ALTER TABLE `profesional_horario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `profesional_tratamiento`
--
ALTER TABLE `profesional_tratamiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salones`
--
ALTER TABLE `salones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `salon_horario`
--
ALTER TABLE `salon_horario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `profesional_horario`
--
ALTER TABLE `profesional_horario`
  ADD CONSTRAINT `profesional_horario_profesional_id_foreign` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`),
  ADD CONSTRAINT `profesional_horario_salon_id_foreign` FOREIGN KEY (`salon_id`) REFERENCES `salones` (`id`);

--
-- Filtros para la tabla `profesional_tratamiento`
--
ALTER TABLE `profesional_tratamiento`
  ADD CONSTRAINT `profesional_tratamiento_profesional_id_foreign` FOREIGN KEY (`profesional_id`) REFERENCES `profesionales` (`id`),
  ADD CONSTRAINT `profesional_tratamiento_tratamiento_id_foreign` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamientos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
