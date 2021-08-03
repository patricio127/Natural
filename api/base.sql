-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2021 a las 00:12:42
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adm_natural`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(13) UNSIGNED NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `categoria`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Clasicos', 'California', 'Kanikama-palta', '380.00', 'prueba.jpg'),
(2, 'Especiales', 'Japan', 'Palmito, hongo shitake, zanahoria con panko exterior.', '760.00', 'tunacream.jpg'),
(3, 'Hot Rolls', 'Hot Cali', 'Roll caliente apanado', '600.00', 'medium-siberian.jpg'),
(4, 'Vegeterianos', 'Vegetarian Roll', 'Roll relleno de vegetales salteados', '500.00', 'Combinado-Veggie.jpg'),
(7, 'Especiales', 'Sushi Especial de la casa', 'Salmon rosado especiado, arroz, plata, rebosado y frito', '1250.00', 'siberian.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `text` tinytext NOT NULL
) DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `text`) VALUES
(1, 4.1, 'Muy buen servicio y comida el personal muy gentil y servicial respondió a todo y ayudó asesoró y fue simpática lo mismo que el gerente'),
(2, 4.5, 'El sushi es riquisimo! Super fresco y sabroso. Me lo habian recomendado ya varias personas, y finalmente pude probarlo! Lo recomiendo y volveria a ir :)'),
(3, 4, 'Hermosa experiencia! Gran calidad de servicio y comida deliciosa. No veo la hora de volver. Muchas gracias!'),
(4, 4.9, 'Fui directamente a conocer el \"bar secreto\". La verdad es un lugar increible. La ambientacion , la decoracion y la atencion superaron mis expectativas.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
