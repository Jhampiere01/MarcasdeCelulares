-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2024 a las 22:44:32
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

--
-- Disparadores `administradores`
--
DELIMITER $$
CREATE TRIGGER `TRIGGERADMINISTRADORES_MAX` AFTER INSERT ON `administradores` FOR EACH ROW INSERT INTO auditoria(Usuario,Fecha,Accion)
values(CURRENT_USER(), NOW(),"Se inserto un nuevo administrador")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Accion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`Id`, `Usuario`, `Fecha`, `Accion`) VALUES
(1, 'root@localhost', '2024-07-20', 'Se inserto un nuevo administrador');

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
(262, 'Samsung', 'Galaxy S24 Ultra', 'Samsung S24 Ultra.webp', '2024', 'AMOLED', '200.0 MP', 'Snapdragon', '256GB', '12GB', '5000 mAh', ' 232 gramos', 'S/4,000'),
(263, 'Xiaomi', 'Redmi 13C', 'Xiaomi Redmi 13C.jpg', '2023', 'LCD', '50 MP', 'Helio G85', '256GB', '8GB', '5000 mAh', '192 gramos', 'S/650'),
(265, 'Samsung', 'Samsung A54 5G', 'Samsung A54 5G 2023.webp', '2023', 'Super AMOLED', '50+12+5MP', 'Exynos 1380', '128GB', '8GB ', '5000 mAh', '202 gramos', 'S/1,700'),
(266, 'Apple', 'iPhone 15 Pro Max', 'iPhone 15 pro max.png', '2023', 'OLED  ', '48+12+12MP', 'Apple A17 Pro', '256GB', '8GB', '4441 mAh', '187 gramos', 'S/5,980'),
(267, 'Xiaomi', 'Redmi 14 Pro', 'Xiaomi 14 pro.png', '2023', 'AMOLED', '50 MP', 'Snapdragon 8', '512GB', '16GB', '4880 mAh', '223 gramos', 'S/5,499'),
(269, 'Apple', 'iPhone 12', 'iPhone 12.png', '2020', 'OLED Retina', 'Dual, 12MP', 'Apple A14 Bionic', '256GB', '6GB', '2815 mAh', ' 232 gramos', 'S/2,800');

--
-- Disparadores `modelos`
--
DELIMITER $$
CREATE TRIGGER `TRIGGERMODELOS_MAX` AFTER INSERT ON `modelos` FOR EACH ROW INSERT INTO auditoria(Usuario,Fecha,Accion)
values(CURRENT_USER(), NOW(),"Se inserto un nuevo modelo")
$$
DELIMITER ;

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
(7, 'Alonso', 'Alonso.png', 'alonso123@gamil.com', 'alonso000'),
(8, 'Danna', 'Imagen.jpg', 'dannita@gmail.com', 'danna01');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `TRIGGERUSUARIOS_MAX` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO auditoria(Usuario,Fecha,Accion)
values(CURRENT_USER(), NOW(),"Se inserto un nuevo usuario")
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `Id_modelos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_No_Registrados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
