-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 03:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullgas`
--

-- --------------------------------------------------------

--
-- Table structure for table `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `id_rodada` int(11) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `observaciones` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `enero` int(2) NOT NULL,
  `febrero` int(2) NOT NULL,
  `marzo` int(2) NOT NULL,
  `abril` int(2) NOT NULL,
  `mayo` int(2) NOT NULL,
  `junio` int(2) NOT NULL,
  `julio` int(2) NOT NULL,
  `agosto` int(2) NOT NULL,
  `septiembre` int(2) NOT NULL,
  `octubre` int(2) NOT NULL,
  `noviembre` int(2) NOT NULL,
  `diciembre` int(2) NOT NULL,
  `year` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`id`, `id_piloto`, `enero`, `febrero`, `marzo`, `abril`, `mayo`, `junio`, `julio`, `agosto`, `septiembre`, `octubre`, `noviembre`, `diciembre`, `year`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(3, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(4, 7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(8, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(9, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(11, 5, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2021'),
(14, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(15, 9, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(16, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(17, 10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(18, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2020'),
(19, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(20, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(21, 12, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(22, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(23, 13, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2021'),
(24, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2020'),
(25, 14, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(26, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(27, 15, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(28, 16, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(29, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(30, 17, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(31, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2020'),
(32, 18, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(33, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020'),
(34, 19, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(35, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(36, 20, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2021'),
(37, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(38, 21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2021'),
(39, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(40, 23, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(41, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(42, 24, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(43, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(44, 25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(45, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(46, 26, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2021'),
(47, 27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(48, 27, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(49, 28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2020'),
(50, 28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(52, 29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(53, 29, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, '2021'),
(54, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(55, 30, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(56, 31, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(57, 32, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(58, 32, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021'),
(60, 33, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(61, 33, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(62, 34, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(63, 34, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(64, 35, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '2021'),
(65, 8, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2021'),
(66, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(67, 36, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021'),
(68, 37, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 17, '2020'),
(69, 37, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2021'),
(70, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, '2020'),
(71, 38, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020'),
(72, 35, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '2021'),
(73, 46, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, '2021'),
(74, 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, '2020'),
(75, 47, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2021'),
(76, 48, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, '2021'),
(77, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(78, 10, 5000, 5000, 5000, 5000, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(79, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(80, 25, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2022'),
(81, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(82, 46, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(83, 60, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(84, 66, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2022'),
(85, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021'),
(86, 44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022'),
(87, 48, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2022');

-- --------------------------------------------------------

--
-- Table structure for table `pilotos`
--

CREATE TABLE `pilotos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `numeroIdentificacion` int(11) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_contacto` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `numero_contacto` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `perfil` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `pilotos`
--

INSERT INTO `pilotos` (`id`, `nombres`, `apellidos`, `numeroIdentificacion`, `fecha_nacimiento`, `telefono`, `nombre_contacto`, `numero_contacto`, `fecha_ingreso`, `usuario`, `password`, `perfil`, `foto`, `estado`) VALUES
(1, 'Jhon Alejandro ', 'Betancourth Cardona', 93296581, '2022-04-30', '3145716480', 'Mary Cardona Zapata', '3116486346', '2019-04-01', 'Alejo', '$2a$07$asxx54ahjppf45sd87a5auQx6HjpZ10DBB22d4sf/GgngDIxGI1aG', 'Piloto', '', 1),
(2, 'Diana Maria', 'Aleman Plazas', 52801866, '1981-03-02', '3112716976', 'Alejandro Betancourth ', '3145716480', '2018-11-01', '52801866', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1),
(5, 'Nestor Mauricio', 'Salazar', 123456789, '2022-04-30', '3117917765', NULL, NULL, NULL, '123456789', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(7, 'Jhony Esteven', 'Valencia Estrada', 1088295489, NULL, '3234474011', NULL, NULL, NULL, '1088295489', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(8, 'Steven', 'Blandon Agudelo', 1121930807, NULL, '3118408816', NULL, NULL, NULL, '1121930807', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(9, 'Andres ', 'Calderon', 1088335233, '1996-05-03', '3106167155', 'Nelly', '3122206111', '2022-01-04', '1088335233', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1),
(10, 'Yamid Arcanjel', 'Toro Valencia', 1088536503, NULL, '3137794686', NULL, NULL, NULL, '1088536503', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(11, 'Juan Camilo', 'Leiva Garcia', 1088031423, NULL, '3116000243', NULL, NULL, NULL, '1088031423', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(12, 'Miguel Angel', 'Velez', 1088007387, NULL, '3124833975', NULL, NULL, NULL, '1088007387', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(13, 'Andres Felipe', 'Rodriguez Guzman', 1113524821, NULL, '3135540326', NULL, NULL, NULL, '1113524821', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(14, 'Catalina ', 'Aristizabal Montoya', 1004519257, NULL, '3145455226', NULL, NULL, NULL, '1004519257', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(15, 'Alejandro', 'Castaño Cardona', 1151962315, NULL, '3166352949', NULL, NULL, NULL, '1151962315', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(16, 'Willian Rafael', 'Mercado Paternina', 1102796854, NULL, '3003843600', NULL, NULL, NULL, '1102796854', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(17, 'Joseph Steven', 'Carmona Quintero', 1010119554, NULL, '3116707737', NULL, NULL, NULL, '1010119554', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(18, 'Andres', 'Martinez  Hernandez', 1088009684, NULL, '3137735051', NULL, NULL, NULL, '1088009684', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(19, 'Natalia ', 'Vargas Arias', 1088020917, NULL, '3132124152', NULL, NULL, NULL, '1088020917', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(20, 'Jhon Alexander', 'Gonzales', 18520425, NULL, '3174667777', NULL, NULL, NULL, '18520425', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(21, 'Juan Guillermo', 'Granada Patiño', 1087488013, NULL, '3215120538', NULL, NULL, NULL, '1087488013', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(23, 'Angel Eduardo', 'Barreto Ramirez', 1007605354, '2001-01-23', '3134471307', 'Marisol Ramirez', '3233263562', NULL, '1007605354', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(24, 'Juan Carlos', 'Osorio', 1053801585, NULL, '3167590321', NULL, NULL, NULL, '1053801585', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(25, 'Sandra Milena', 'Araque Cano', 35898141, NULL, '3113327217', NULL, NULL, NULL, '35898141', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(26, 'Diana Marcela', 'Cardona', 1088301876, NULL, '3105407875', NULL, NULL, NULL, '1088301876', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(27, 'Juan Manuel', 'Ocampo', 1088343885, NULL, '3226234719', NULL, NULL, NULL, '1088343885', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(28, 'Brayan Stiven', 'Soto Londoño', 1088039007, NULL, '3112649945', NULL, NULL, NULL, '1088039007', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(29, 'Steven Hernando', 'Pradilla Galindo', 1004627600, '1997-01-07', '3127100462', 'Tatiana Ramirez', '3127756116', '2020-04-01', '1004627600', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(30, 'JUAN DE DIOS', 'HINCAPIE', 10116220, NULL, '3117446420', NULL, NULL, NULL, '10116220', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(31, 'Diana ', 'Vargas Villegas', 1048850458, NULL, '3128647131', NULL, NULL, NULL, '1048850458', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(32, 'Leonardo Fabio', 'Martinez Giraldo', 1118304870, '1995-07-25', '3137484509', 'Leonardo', '3154678147', NULL, '1118304870', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(33, 'Mario Andres', 'Arias Suarez', 10010853, NULL, '3103798609', NULL, NULL, NULL, '10010853', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(34, 'Angelica Maria', 'Bedoya Tabares', 42129173, NULL, '3148275626', NULL, NULL, NULL, '42129173', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(35, 'Edwin Francisco', 'Reyes Delgado', 80036788, NULL, '3042046657', NULL, NULL, NULL, '80036788', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(36, 'Marisol', 'Ceballos Orrego', 1088270540, NULL, '3166712285', NULL, NULL, NULL, '1088270540', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(37, 'Juan Sebastian', 'Lancheros', 1075317314, NULL, '3167504033', NULL, NULL, NULL, '1075317314', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(38, 'Sebastian ', 'Velez', 1088020413, NULL, '3207013393', NULL, NULL, NULL, '1088020413', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(39, 'Juan Esteban', 'Gallego', 1088352440, NULL, '3126354447', NULL, NULL, NULL, '1088352440', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(40, 'Manuel Alfonso ', 'Sanabria Torres', 9866055, NULL, '3106034577', NULL, NULL, NULL, '9866055', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(41, 'Jhon Sadi', 'Garcia', 111277907, NULL, '3206834632', NULL, NULL, NULL, '111277907', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(42, 'Michael ', 'Garcia Sanchez', 1093226206, NULL, '3168672328', NULL, NULL, NULL, '1093226206', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(43, 'Isabela ', 'Cardona Ramirez', 1007192483, NULL, '3154981628', NULL, NULL, NULL, '1007192483', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(44, 'Mayra Alejandra', 'Marin Aguirre', 1004735290, '2001-03-09', '3226211168', 'Leydi Tatiana Marin', '3122534754', '2022-01-01', '1004735290', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1),
(45, 'Jaime Eduardo', 'Escobar Diaz', 1087488309, '1988-11-15', '3003456792', 'Victor Heran Escobar Diaz', '3117107304', NULL, '1087488309', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(46, 'Sebastian ', 'Suarez', 1087486524, '1997-02-17', '3137865544', 'Julian suarez', '3102789141', NULL, '1087486524', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(47, 'Jhonier ', 'Arcila', 94263568, '1985-03-05', '3122496981', 'Andrea Mojica', '3122496981', '2020-04-01', '94263568', '$2a$07$asxx54ahjppf45sd87a5auxJVRQOm/h.2vTAJfvPfdKuOVPt9vj4S', 'Piloto', '', 1),
(48, 'John Andersson', 'Cañon', 1076326903, '1990-04-13', '3177908607', 'Tatiana Salazar Marin', '3148396408', NULL, '1076326903', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(49, 'Alejandro', 'Leon Gaviria', 1088333997, '1996-03-27', '3017016689', 'Diego Londoño', '3124830528', NULL, '1088333997', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(50, 'Santiago ', 'Salgado', 1053824201, '1992-10-14', '3145959300', 'Angela Salgado', '3002115140', NULL, '1053824201', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(51, 'Steven ', 'Rios Rodriguez', 1234989318, '1997-05-06', '3153243528', 'Alba Luz Rodriguez Orozco', '3148279928', NULL, '1234989318', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(52, 'Jhony Andres', 'Rojas Jaramillo', 1116442002, '1993-03-02', '3016103127', 'Natalia', '3023417551', NULL, '1116442002', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(53, 'Gustavo Adolfo', 'Ocampo Jaramillo', 1004718632, '2002-07-14', '3123580912', 'Javier Hoover Ocampo', '3108962431', NULL, '1004718632', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(54, 'Edwin Alexander', 'Garcia  Guarin', 1019043650, '1990-02-28', '3114170540', 'Rubiela Guarin', '3138967679', NULL, '1019043650', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(55, 'Juan Manuel', 'Valencia Rojas', 1086254895, '1981-04-26', '3175075998', 'Ana Maria Rojas', '3175075998', NULL, '1086254895', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(56, 'Brandon ', 'Garcia Marin', 1089930345, '2004-01-23', '3104004892', 'Osman Bayron', '3158662036', NULL, '1089930345', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(57, 'Javier Eduardo', 'Montoya Saldarriaga', 1087994063, '1988-05-11', '3212575507', 'Jorge Andres Montoya', '3148271467', NULL, '1087994063', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(58, 'Leidy Natalia', 'Arango Cabrera', 1004683669, '2002-05-13', '3015584741', 'Leidy Johana Cabrera', '3147917564', NULL, '1004683669', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(59, 'Oscar Andres', 'Lopez Idrobo', 1088342668, '1997-05-26', '3136916172', 'Carlos Arturo Lopez', '3122055948', NULL, '1088342668', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(60, 'Nicol Steven', 'Gomez Marin', 1088358516, '1999-12-13', '3103732538', 'Lina MArcela', '3103732538', NULL, '1088358516', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(61, 'Julian Mauricio', 'Guevara Palacio', 18601413, '1981-10-29', '3124056728', 'Julian Mauricio', '3125923996', NULL, '18601413', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(62, 'Daniel Alexander', 'Lopez Perez', 1088344612, '1997-09-05', '3014569760', 'Juan Carlos Lopez', '3128353412', NULL, '1088344612', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(63, 'Sebastian', 'Castaño', 1088005562, '1991-11-02', '3044880984', 'Sebastian', '3044880984', NULL, '1088005562', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(64, 'Giovanny Andres', 'Murillo Mosquera', 1088292373, '1991-09-10', '3103737184', 'Giovanny Murillo ', '3103737184', NULL, '1088292373', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(65, 'Juan David', 'Quintero', 2147483647, '1989-08-04', '3217827460', 'Lady Mercedes Castro', '3103881377', NULL, '2147483647', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(66, 'Juan David', 'Lopez', 1112779628, '1993-07-23', '3185712681', 'Maria Camila Lopez', '3163559489', '2022-01-16', '1112779628', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(67, 'William Fernando', 'Giraldo Restrepo', 9873412, '1982-03-19', '3127937582', 'No registra', '3219090101', '2022-04-01', '9873412', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', NULL, 1),
(68, 'Juan Andres', 'Betancourth', 93296582, '2022-04-14', '3145716850', 'Diana', '3112796686', '2022-04-19', '93296582', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1),
(69, 'Angel Yesid', 'Montoya Ramirez', 1087557558, '1994-10-29', '3233222133', 'Angel Gabriel Montoya Acebedo', '3207817653', '2022-01-04', '1087557558', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1),
(70, 'Juan Camilo', 'Higuera Restrepo', 108642584, '1980-11-03', '3104733329', 'Mi mama', '3104733329', '2022-04-26', 'juan_camilo', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Piloto', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rodadas`
--

CREATE TABLE `rodadas` (
  `id` int(11) NOT NULL,
  `ruta` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(1) DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usr_crea` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `rodadas`
--

INSERT INTO `rodadas` (`id`, `ruta`, `lugar`, `fecha`, `estado`, `observaciones`, `usr_crea`) VALUES
(9, 'Calarca', 'Hacienda la pradera', '2022-05-01', 0, 'Actividades que se pueden realizar: Mini moto cross, parapente, paintball', '1'),
(10, 'Medellin', 'Feria de las dos Ruedas', '2022-05-13', 0, 'Venta implementos de motos', '1'),
(11, 'Buenaventura', 'Reserva natural San Cipriano', '2022-07-02', 0, 'Montar en brujitas', '1'),
(12, 'Huila', 'Desierto de la tatacoa', '2022-05-28', 0, 'hfghsd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contacto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero_contacto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `identificacion`, `telefono`, `usuario`, `password`, `perfil`, `foto`, `contacto`, `numero_contacto`, `estado`) VALUES
(1, 'Jhon Alejandro Betancourth', '93296581', '3145716480', 'Alejo', '$2a$07$asxx54ahjppf45sd87a5auQx6HjpZ10DBB22d4sf/GgngDIxGI1aG', 'Administrador', 'vistas/img/usuarios/Alejo/562.png', 'Diana Aleman', '3112716976', 1),
(17, 'Diana Maria Aleman', '52175689', '3122716976', 'Diany', '$2a$07$asxx54ahjppf45sd87a5aupyFUstO.TBnPybHPXycmGdCxO7n2Z/O', 'Administrador', 'vistas/img/usuarios/Diany/diany.png', 'Alejo', '3145716480', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `id_piloto` int(11) NOT NULL,
  `marca` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `referencia` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `placa` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `id_piloto`, `marca`, `referencia`, `modelo`, `placa`, `estado`) VALUES
(4, 1, 'Kawasaki', 'Versys 1000 TLF', '2012', 'YJA52C', 1),
(5, 1, 'YAMAHA', 'YBR 125 SS', '2010', 'DAP06C', 1),
(7, 8, 'YAMAHA', 'R15', '2016', 'VLR19C', 1),
(8, 2, 'HONDA', 'CBR250', '2012', 'QYG13C', 1),
(9, 7, 'SUZUKI', 'GIXXER 250', '2020', 'DMN94F', 1),
(10, 5, 'PULSAR', 'NS200', '2016', 'WVI27D', 1),
(11, 9, 'HONDA', 'XRE 190', '2017', 'QQQ73E', 1),
(13, 10, 'SUZUKI', 'GSXS 150', '2018', 'TSB71E', 1),
(14, 11, 'SUZUKI', 'GIXXER 150', '2020', 'DKV09F', 1),
(15, 12, 'SUZUKI', 'GSXS 150', '2020', 'TTH96E', 1),
(16, 13, 'CF MOTORS', 'NK 250', '2019', 'AQR63F', 1),
(17, 14, 'Yamaha', 'R15', '2021', 'HQJ45F', 1),
(18, 15, 'TVS', 'Apache RTR200', '2019', 'TST13E', 1),
(19, 16, 'Auteco', 'Discovery ST 125', '2015', 'SXQ02', 1),
(20, 17, 'AKT', 'CR5 200', '2020', 'HPM71F', 1),
(21, 18, 'AKT', 'EVO150', '2014', 'YTB73C', 1),
(22, 19, 'Auteco', 'PULSAR 220 S', '2012', 'SOZ04C', 1),
(23, 20, 'TVS', 'Apache 200', '2020', 'ARF52F', 1),
(24, 21, 'HONDA', 'XR TORNADO 250', '2013', 'VRH17C', 1),
(26, 23, 'Yamaha', 'MT03', '2016', 'DLF51F', 1),
(27, 24, 'Susuzki', 'GSXS 150', '2020', 'TTK77E', 1),
(28, 25, 'Suzuki', 'GIXXER 250 SF', '2021', 'DMW51F', 1),
(29, 26, 'HONDA', 'CB160F', '2021', 'HQH49F', 1),
(30, 27, 'Suzuki', 'GSXS 150', '2020', 'TTI72E', 1),
(31, 28, 'Auteco', 'Discover ST 150', '2019', 'DMG68E', 1),
(32, 29, 'KTM', 'DUKE390', '2019', 'APS05F', 1),
(33, 30, 'YAMAHA', 'MT09', '2028', 'TSF01E', 1),
(34, 31, 'AKT', 'CR5 180', '2016', 'BJK38E', 1),
(35, 32, 'Yamaha', 'YZF R15', '2021', 'HQR23F', 1),
(36, 33, 'KTM', 'DUKE 250', '2019', 'AQD21F', 1),
(37, 34, 'Susuki', 'Gixxer 150', '2019', 'TRO64E', 1),
(38, 35, 'Yamaha', 'Libero YBR 125 ED', '2018', 'MIL99E', 1),
(39, 36, 'Pulsar', 'NS200', '2017', 'EHD34E', 1),
(40, 37, 'AKT', 'NKD125', '2018', 'JMX69E', 1),
(41, 38, 'Yamaha', 'R6', '2009', 'QFP34B', 1),
(42, 39, 'Suzuki', 'Gixxer', '2020', 'APN50F', 1),
(43, 40, 'Susuki', 'Gixer GSXr150', '2020', 'DKT73F', 1),
(44, 41, 'Kaewasaki', 'Ninja EX250R', '2008', 'KOK35B', 1),
(45, 42, 'Suzuki', 'GSR750', '2016', 'KKR68E', 1),
(46, 43, 'Suzuki', 'GSR750', '2016', 'KKR68E', 1),
(47, 44, 'BAJAJ', 'Pulsar NS 200 FI', '2022', 'RZQ38F', 1),
(48, 45, 'Yamaha', 'XTZ250 LANDER', '2020', 'DLH36F', 1),
(49, 46, 'Honda', 'CB160 DLX', '2022', 'DMW50F', 0),
(50, 47, 'Pulsar', 'NS200', '2018', 'DMW54E', 0),
(51, 48, 'KTM', '390 Adventure', '2021', 'RZK25F', 0),
(52, 50, 'Pulsar', 'NS200', '2016', 'PLM32D', 0),
(53, 49, 'Susuki', 'GIXXER 150', '2019', 'TRT66E', 0),
(54, 51, 'Yamaha', 'FZ800', '2011', 'NMG32C', 0),
(55, 52, 'Suzuki', 'Best', '2012', 'IDS13A', 0),
(56, 53, 'Suzuki', 'Gixxer', '2019', 'TRV59E', 0),
(57, 54, 'AKT', 'CR5200', '2019', 'XVR76E', 1),
(58, 55, 'AKT', 'TT 200', '2021', 'OYI77F', 0),
(59, 56, 'Yamaha', 'FZ25', '2022', 'VRN16F', 0),
(60, 57, 'Suzuki', 'Bandit 650', '2008', 'KGR52B', 0),
(61, 58, 'TVS', 'Apache 160 ', '2022', 'PAI52F', 0),
(62, 59, 'TVS', 'Apache 160', '2016', 'HQT74F', 0),
(63, 60, 'Suzuki', 'Gixxer', '2018', 'TRE94E', 0),
(64, 61, 'Suzuki', 'Gixxer 250', '2022', 'SAO82F', 0),
(65, 62, 'Suzuki', 'Gixxer 250', '2022', 'SAU70F', 0),
(66, 63, 'AKT', 'Adventure 250', '2016', 'WVR79D', 0),
(67, 64, 'KTM', 'DUKE 790', '2018', 'TSL62E', 0),
(68, 65, 'Yamaha', 'MT09', '2020', 'MTT09C', 0),
(69, 66, 'KTM', '390 ADVENTURE', '2021', 'NJK81F', 0),
(70, 70, 'KAWASAKI', 'ERN6N', '2011', 'ONF67C', 1),
(71, 69, 'BAJAJ', 'DOMINAR 400UG', '2021', 'HQL40F', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencia_piloto` (`id_piloto`),
  ADD KEY `asistencia_rodada` (`id_rodada`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagos_piloto` (`id_piloto`);

--
-- Indexes for table `pilotos`
--
ALTER TABLE `pilotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rodadas`
--
ALTER TABLE `rodadas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehiculos_piloto` (`id_piloto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `pilotos`
--
ALTER TABLE `pilotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `rodadas`
--
ALTER TABLE `rodadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencia_piloto` FOREIGN KEY (`id_piloto`) REFERENCES `pilotos` (`id`),
  ADD CONSTRAINT `asistencia_rodada` FOREIGN KEY (`id_rodada`) REFERENCES `rodadas` (`id`);

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_piloto` FOREIGN KEY (`id_piloto`) REFERENCES `pilotos` (`id`);

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_piloto` FOREIGN KEY (`id_piloto`) REFERENCES `pilotos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
