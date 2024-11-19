-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3310
-- Tiempo de generación: 20-11-2024 a las 00:22:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `voting`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos_est`
--

CREATE TABLE `candidatos_est` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `carrera` enum('Ingeniería de Software','Ingeniería Eléctrica','Ingeniería de Alimentos','Ingeniería Ambiental','Salud y Seguridad en el Trabajo') NOT NULL,
  `total_votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidatos_est`
--

INSERT INTO `candidatos_est` (`id`, `nombre`, `correo`, `descripcion`, `carrera`, `total_votos`) VALUES
(8, 'Ana Martinez', 'ana@gmail.com', 'Estudiante dedicada, con excelente desempeño académico y habilidades en liderazgo. Apasionada por la investigación y el aprendizaje continuo, busca contribuir al desarrollo de proyectos innovadores en el ámbito universitario. Se destaca por su responsabilidad, trabajo en equipo y compromiso con la excelencia.', 'Ingeniería de Software', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos_prof`
--

CREATE TABLE `candidatos_prof` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `carrera` enum('Ingeniería de Software','Ingeniería Eléctrica','Ingeniería de Alimentos','Ingeniería Ambiental','Salud y Seguridad en el Trabajo') NOT NULL,
  `total_votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidatos_prof`
--

INSERT INTO `candidatos_prof` (`id`, `nombre`, `correo`, `descripcion`, `carrera`, `total_votos`) VALUES
(3, 'mm', 'M@GM.COM', 'mm', 'Ingeniería Eléctrica', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userdata`
--

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ident` varchar(20) NOT NULL,
  `password` varchar(253) NOT NULL,
  `standard` enum('Estudiante','Profesor') NOT NULL,
  `standard1` enum('Ingeniería de Software','Ingeniería Eléctrica','Ingeniería de Alimentos','Ingeniería Ambiental','Salud y Seguridad en el Trabajo') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `ident`, `password`, `standard`, `standard1`, `status`) VALUES
(5, 'Juan', '1234567899', '$2y$10$DyrFdo74rXiJ0CLU5Et9wezKnCTrJPdhIVwWM4CkWB8KJSHKdsE0i', 'Estudiante', 'Ingeniería de Software', 1),
(6, 'Julia', 'nmdfdfdndf', '$2y$10$ZKU/bRyq407nI6l33wtRPOkMgy6al4LNbvEbqSzBtAbyd.hOXB8gG', 'Estudiante', 'Ingeniería de Software', 0),
(7, 'brayan', 'sof2024176', '$2y$10$1OX/YYvvBBAAeiUy7H3di.SJ4Vi41KQF8.YeoHx6PXykRrmPaiFAO', 'Estudiante', 'Ingeniería de Software', 1),
(10, 'MarolyFranklin', 'SOF1234567', '$2y$10$uOcmWqVYTmnqtCYB3E0NuelQaLk5cfWSkyDEmsvNbjjG2ITu.ObXm', 'Estudiante', 'Ingeniería de Software', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `candidatos_est`
--
ALTER TABLE `candidatos_est`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `candidatos_prof`
--
ALTER TABLE `candidatos_prof`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `candidatos_est`
--
ALTER TABLE `candidatos_est`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `candidatos_prof`
--
ALTER TABLE `candidatos_prof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
