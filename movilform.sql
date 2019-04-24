-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2019 a las 09:40:41
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `movilform`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_fantasia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_comercial` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo_cliente`, `razon_social`, `nombre_fantasia`, `direccion_comercial`) VALUES
('193620469', 'super', 'super 12131', 'concha y toro 1340');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `codigo_contrato` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `latitud_geografica_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `longitud_geografica_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_contacto_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_contacto_contrato` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email_contacto_contrato` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_cliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`codigo_contrato`, `nombre_contrato`, `direccion_contrato`, `latitud_geografica_contrato`, `longitud_geografica_contrato`, `nombre_contacto_contrato`, `telefono_contacto_contrato`, `email_contacto_contrato`, `codigo_cliente`) VALUES
('123456', 'iphone', 'david garcia 1065, puente alto, region metrop', '-33.6111452', '-70.59255050000002', 'jorge', '123456789', 'hola@gmail.com pablo@gmail.com ', '193620469'),
('123456789', 'telefonos', 'balmaceda 27-105, puente alto, region metropo', '-33.6113755', '-70.574522', 'sdfgdsf', 'sfdgsdf', 'dsfgfsg@fsdfd.com ', '193620469'),
('gabriel', 'computadores', 'concha y toro 1340', '-33.5985298', '-70.57887549999998', 'sdfgdsf', 'sfdgsdf', 'dsfgfsg@fsdfd.com ', '193620469'),
('pablo', 'televisores', 'concha y toro 1340', '-33.5985298', '-70.57887549999998', 'sdfgdsf', 'sfdgsdf', 'dsfgfsg@fsdfd.com ', '193620469');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo_cliente`),
  ADD UNIQUE KEY `codigo_cliente_UNIQUE` (`codigo_cliente`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`codigo_contrato`,`codigo_cliente`),
  ADD UNIQUE KEY `codigo_contrato_UNIQUE` (`codigo_contrato`),
  ADD KEY `fk_CONTRATO_CLIENTE_idx` (`codigo_cliente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `fk_CONTRATO_CLIENTE` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
