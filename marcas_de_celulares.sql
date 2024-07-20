-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2024 a las 06:59:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marcas_de_celulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `Id_admin` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`Id_admin`, `Usuario`, `Contraseña`) VALUES
(1, 'Harith', 'd56f2c5566908cf158faa468b31db0e5'),
(2, 'Gabriel', '267c7114096454a2c64044fded697434');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `Id_modelos` int(11) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `Imagen` varchar(50) NOT NULL,
  `Lanzamiento` varchar(100) NOT NULL,
  `Pantalla` varchar(100) NOT NULL,
  `Camara` varchar(100) NOT NULL,
  `Procesador` varchar(100) NOT NULL,
  `Memoria` varchar(100) NOT NULL,
  `RAM` varchar(100) NOT NULL,
  `Bateria` varchar(100) NOT NULL,
  `Peso` varchar(100) NOT NULL,
  `Precio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`Id_modelos`, `Marca`, `Modelo`, `Imagen`, `Lanzamiento`, `Pantalla`, `Camara`, `Procesador`, `Memoria`, `RAM`, `Bateria`, `Peso`, `Precio`) VALUES
(262, 'Samsung', 'Galaxy S24 Ultra', 'Samsung S24 Ultra.webp', '2024', 'Quad HD+  AMOLED ', '200.0 MP + 50.0 MP', 'Qualcomm Snapdragon', '256gb', '12gb', '5000 mAh', ' 232 gramos', 'S/4.000'),
(263, 'Xiaomi', 'Redmi 13C', 'Xiaomi Redmi 13C.jpg', '2023', 'LCD 6,74\"  HD+  90 Hz', '50 MP f/1.8  2 MP f/2.4 macro', 'Helio G85', '256GB', '8GB', '5.000 mAh', '192 gramos', 'S/650'),
(265, 'Samsung', 'Samsung A54 5G', 'Samsung A54 5G 2023.webp', '2023', 'Super AMOLED de 6.4 pulgadas', '50+12+5MP', 'Exynos 1380', '128GB', '8GB ', '5000 mAh', '202 gr', 'S/1700.00'),
(266, 'Apple', 'iphone 15 pro max', 'iPhone 15 pro max.png', '2023', 'Super Retina 6.7 XDR OLED  ', '48+12+12MP', 'Apple A17 Pro (3 nm)', '256GB', '8GB', '4441 mAh', '187 g', 'S/5980.00'),
(267, 'Xiaomi', 'Redmi 14 Pro', 'Xiaomi 14 pro.png', '2023', 'LTPO AMOLED, 68B colors, 120Hz, Dolby Vision, HDR10+, 3000 nits ', '50 MP, f/2.2, 14mm, 115˚ (ultrawide), AF', 'Snapdragon 8 Gen 3', '512GB', '16GB', '4880mAh', '223g', 'S/5499.00'),
(269, 'Apple', 'iPhone 12', 'iPhone 12.png', '2020', 'OLED Retina', 'Dual, 12MP+12MP', 'Apple A14 Bionic', '64 / 128 / 256 GB', '6gb', '2815 mAh', ' 232 gramos', 'S/2.800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_No_Registrados` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Imagen` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_No_Registrados`, `Usuario`, `Imagen`, `Correo`, `Contraseña`) VALUES
(1, 'Harith', 'yo.jpg', 'harith.992004@gmail.com', 'hanzo000'),
(3, 'Mathias', 'mathias.jpg', 'mathi-kun@gmail.com', 'mathisan01'),
(7, 'Alonso', 'Alonso.png', 'alonso123@gamil.com', 'alonso000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`Id_modelos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_No_Registrados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `Id_modelos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_No_Registrados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
