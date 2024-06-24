-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2024 a las 08:30:01
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
-- Base de datos: `pelu_patitas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Cod_cat` int(11) NOT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Cod_cat`, `Tipo`, `Descripcion`) VALUES
(4, 'comida', 'comestible'),
(5, 'objeto', 'no comestible \r\n'),
(6, 'Juguetes', 'Entretenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_por_producto`
--

CREATE TABLE `categoria_por_producto` (
  `Cod_cat_por_producto` int(11) NOT NULL,
  `Cod_cat_Categoria` int(11) NOT NULL,
  `Cod_producto_Producto` int(11) NOT NULL,
  `Procedencia` varchar(30) DEFAULT NULL,
  `Etapa_de_vida_dirigido` varchar(30) DEFAULT NULL,
  `Tamano_dirigido` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria_por_producto`
--

INSERT INTO `categoria_por_producto` (`Cod_cat_por_producto`, `Cod_cat_Categoria`, `Cod_producto_Producto`, `Procedencia`, `Etapa_de_vida_dirigido`, `Tamano_dirigido`) VALUES
(2, 4, 1, 'pollo', 'cachorro', 'grande '),
(3, 5, 2, 'cuero', 'general', 'general'),
(4, 4, 1, 'res', 'cachorro', 'grande '),
(5, 6, 1, 'res', 'cachorro', 'general'),
(6, 6, 1, 'res', 'cachorro', 'general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cod_cliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Nombre_repre` varchar(30) DEFAULT NULL,
  `DNI_repre` varchar(10) DEFAULT NULL,
  `Direccion_local` varchar(30) DEFAULT NULL,
  `Ciudad` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `Pais` varchar(15) DEFAULT NULL,
  `Codigo_postal` varchar(15) DEFAULT NULL,
  `DNI_Empleado` int(11) DEFAULT NULL,
  `Correo_electronico` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cod_cliente`, `Nombre`, `Nombre_repre`, `DNI_repre`, `Direccion_local`, `Ciudad`, `Region`, `Pais`, `Codigo_postal`, `DNI_Empleado`, `Correo_electronico`) VALUES
(1, 'pelupatitas', 'sante', '12345678', 'micasa', 'Arequipa', 'Arequipa', 'Peru', '666', NULL, 'luciel@ucsp.com'),
(2, 'Pelupatitas', 'karolina', '88888888', 'selva alegre', 'arequipa', 'arequipa', 'Perú', '666', NULL, 'karolina@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantes`
--

CREATE TABLE `comprobantes` (
  `cod_comprobante` int(11) NOT NULL,
  `Cod_Pedido` int(11) NOT NULL,
  `Fecha_pedido` date NOT NULL,
  `Monto_total` decimal(15,2) NOT NULL,
  `Tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comprobantes`
--

INSERT INTO `comprobantes` (`cod_comprobante`, `Cod_Pedido`, `Fecha_pedido`, `Monto_total`, `Tipo`) VALUES
(1, 2, '2024-06-24', 683.00, 'Boleta'),
(2, 3, '2024-06-24', 224.00, 'Boleta'),
(3, 4, '2024-06-24', 224.00, 'Factura'),
(4, 10, '2024-06-24', 224.00, 'Boleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependientes`
--

CREATE TABLE `dependientes` (
  `Cod_depen` int(11) NOT NULL,
  `DNI_Empleado` int(11) NOT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Parentesco` varchar(50) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dependientes`
--

INSERT INTO `dependientes` (`Cod_depen`, `DNI_Empleado`, `Nombres`, `Parentesco`, `Sexo`) VALUES
(0, 999999999, 'cristina', 'hermano', 'femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `Cod_producto` int(11) NOT NULL,
  `Cod_Pedido` int(11) NOT NULL,
  `Cantidad_prod` int(11) DEFAULT NULL,
  `Precio_unid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `Cod_producto` varchar(15) NOT NULL,
  `Cod_Pedido` int(11) NOT NULL,
  `Cantidad_prod` int(11) DEFAULT NULL,
  `Precio_unid` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedido`
--

INSERT INTO `detalles_pedido` (`Cod_producto`, `Cod_Pedido`, `Cantidad_prod`, `Precio_unid`) VALUES
('1', 0, 16, 8.00),
('1', 2, 1, 8.00),
('2', 0, 1, 3.00),
('2', 2, 1, 3.00),
('3', 2, 3, 224.00),
('3', 3, 1, 224.00),
('3', 4, 1, 224.00),
('3', 10, 1, 224.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `RUC` int(11) NOT NULL,
  `Correo_electronico` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`RUC`, `Correo_electronico`, `Direccion`) VALUES
(123456789, 'distribuidor@example.com', 'Dirección de ejemplo'),
(666666666, 'nicki@gmail.com', 'hunter');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `DNI` int(11) NOT NULL,
  `DNI_Jefe` int(11) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Sueldo` int(11) DEFAULT NULL,
  `Cargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`DNI`, `DNI_Jefe`, `Nombre`, `Apellido`, `Direccion`, `Sueldo`, `Cargo`) VALUES
(123456789, NULL, 'Paco', 'Retamozo', 'pacoretamozo@gmail.com', 10000, 'Gerente'),
(222222222, NULL, 'Luis', '', '', 500, 'empleado'),
(999999999, NULL, 'daniel', 'paredes', 'miraflores', 600, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `Codigo_Horario` int(11) NOT NULL,
  `Hora_inicio` time NOT NULL,
  `Hora_fin` time NOT NULL,
  `Dia` varchar(20) NOT NULL,
  `DNI_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`Codigo_Horario`, `Hora_inicio`, `Hora_fin`, `Dia`, `DNI_Empleado`) VALUES
(1, '01:08:00', '04:13:00', '3', 999999999),
(2, '01:36:00', '17:40:00', '3', 999999999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Cod_pedido` int(11) NOT NULL,
  `Cod_Cliente` int(11) NOT NULL,
  `Fecha_esperada` date DEFAULT (curdate() + interval 30 day),
  `Fecha_entrega` date DEFAULT NULL,
  `Estado` varchar(20) DEFAULT 'Pendiente',
  `Comentarios` varchar(255) DEFAULT 'sin comentarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Cod_pedido`, `Cod_Cliente`, `Fecha_esperada`, `Fecha_entrega`, `Estado`, `Comentarios`) VALUES
(1, 2, '2024-07-23', NULL, 'Pendiente', 'sin comentarios'),
(2, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(3, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(4, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(5, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(6, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(7, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(8, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(9, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios'),
(10, 2, '2024-07-24', NULL, 'Pendiente', 'sin comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Cod_producto` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Fecha_de_Vencimiento` date DEFAULT NULL,
  `Precio_de_venta` int(11) DEFAULT NULL,
  `Precio_de_distribuidor` int(11) DEFAULT NULL,
  `Stock_Disponible` int(11) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `RUC_Distribuidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Cod_producto`, `Nombre`, `Fecha_de_Vencimiento`, `Precio_de_venta`, `Precio_de_distribuidor`, `Stock_Disponible`, `Descripcion`, `RUC_Distribuidor`) VALUES
(1, 'hueso', '2024-06-05', 8, 5, 3, 'madera', 123456789),
(2, 'pelota', '2024-05-29', 3, 6, 2, 'plastico', 123456789),
(3, 'casita', '2024-05-27', 224, 144, 7, 'madera', 123456789),
(4, 'croquetas', '2024-05-29', 45, 30, 8, 'deliciosas', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_de_dependiente`
--

CREATE TABLE `telefonos_de_dependiente` (
  `Telefono` varchar(20) NOT NULL,
  `Cod_depen` int(11) NOT NULL,
  `DNI_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_de_cliente`
--

CREATE TABLE `telefono_de_cliente` (
  `Telefono` varchar(20) NOT NULL,
  `Cod_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono_de_cliente`
--

INSERT INTO `telefono_de_cliente` (`Telefono`, `Cod_Cliente`) VALUES
('789789789', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_de_distribuidor`
--

CREATE TABLE `telefono_de_distribuidor` (
  `telefono` int(11) NOT NULL,
  `RUC_Distribuidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_de_empleado`
--

CREATE TABLE `telefono_de_empleado` (
  `Telefono` varchar(20) NOT NULL,
  `DNI_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Cod_cat`);

--
-- Indices de la tabla `categoria_por_producto`
--
ALTER TABLE `categoria_por_producto`
  ADD PRIMARY KEY (`Cod_cat_por_producto`),
  ADD KEY `Cod_cat_Categoria` (`Cod_cat_Categoria`),
  ADD KEY `Cod_producto_Producto` (`Cod_producto_Producto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cod_cliente`),
  ADD KEY `DNI_Empleado` (`DNI_Empleado`);

--
-- Indices de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD PRIMARY KEY (`cod_comprobante`,`Cod_Pedido`),
  ADD KEY `Cod_Pedido` (`Cod_Pedido`);

--
-- Indices de la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD PRIMARY KEY (`Cod_depen`,`DNI_Empleado`),
  ADD KEY `DNI_Empleado` (`DNI_Empleado`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`Cod_producto`,`Cod_Pedido`),
  ADD KEY `Cod_Pedido` (`Cod_Pedido`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`Cod_producto`,`Cod_Pedido`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`RUC`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `DNI_Jefe` (`DNI_Jefe`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`Codigo_Horario`,`DNI_Empleado`),
  ADD KEY `DNI_Empleado` (`DNI_Empleado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Cod_pedido`),
  ADD KEY `Cod_Cliente` (`Cod_Cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Cod_producto`),
  ADD KEY `RUC_Distribuidor` (`RUC_Distribuidor`);

--
-- Indices de la tabla `telefonos_de_dependiente`
--
ALTER TABLE `telefonos_de_dependiente`
  ADD PRIMARY KEY (`Telefono`,`Cod_depen`,`DNI_Empleado`),
  ADD KEY `Cod_depen` (`Cod_depen`),
  ADD KEY `DNI_Empleado` (`DNI_Empleado`);

--
-- Indices de la tabla `telefono_de_cliente`
--
ALTER TABLE `telefono_de_cliente`
  ADD PRIMARY KEY (`Telefono`,`Cod_Cliente`),
  ADD KEY `Cod_Cliente` (`Cod_Cliente`);

--
-- Indices de la tabla `telefono_de_distribuidor`
--
ALTER TABLE `telefono_de_distribuidor`
  ADD PRIMARY KEY (`telefono`,`RUC_Distribuidor`),
  ADD KEY `RUC_Distribuidor` (`RUC_Distribuidor`);

--
-- Indices de la tabla `telefono_de_empleado`
--
ALTER TABLE `telefono_de_empleado`
  ADD PRIMARY KEY (`Telefono`,`DNI_Empleado`),
  ADD KEY `DNI_Empleado` (`DNI_Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Cod_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria_por_producto`
--
ALTER TABLE `categoria_por_producto`
  MODIFY `Cod_cat_por_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  MODIFY `cod_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `Codigo_Horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_por_producto`
--
ALTER TABLE `categoria_por_producto`
  ADD CONSTRAINT `categoria_por_producto_ibfk_1` FOREIGN KEY (`Cod_cat_Categoria`) REFERENCES `categoria` (`Cod_cat`),
  ADD CONSTRAINT `categoria_por_producto_ibfk_2` FOREIGN KEY (`Cod_producto_Producto`) REFERENCES `producto` (`Cod_producto`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`DNI_Empleado`) REFERENCES `empleado` (`DNI`);

--
-- Filtros para la tabla `comprobantes`
--
ALTER TABLE `comprobantes`
  ADD CONSTRAINT `comprobantes_ibfk_1` FOREIGN KEY (`Cod_Pedido`) REFERENCES `pedido` (`Cod_pedido`);

--
-- Filtros para la tabla `dependientes`
--
ALTER TABLE `dependientes`
  ADD CONSTRAINT `dependientes_ibfk_1` FOREIGN KEY (`DNI_Empleado`) REFERENCES `empleado` (`DNI`);

--
-- Filtros para la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD CONSTRAINT `detalles_ibfk_1` FOREIGN KEY (`Cod_producto`) REFERENCES `producto` (`Cod_producto`),
  ADD CONSTRAINT `detalles_ibfk_2` FOREIGN KEY (`Cod_Pedido`) REFERENCES `pedido` (`Cod_pedido`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`DNI_Jefe`) REFERENCES `empleado` (`DNI`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`DNI_Empleado`) REFERENCES `empleado` (`DNI`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`RUC_Distribuidor`) REFERENCES `distribuidor` (`RUC`);

--
-- Filtros para la tabla `telefonos_de_dependiente`
--
ALTER TABLE `telefonos_de_dependiente`
  ADD CONSTRAINT `telefonos_de_dependiente_ibfk_1` FOREIGN KEY (`Cod_depen`) REFERENCES `dependientes` (`Cod_depen`),
  ADD CONSTRAINT `telefonos_de_dependiente_ibfk_2` FOREIGN KEY (`DNI_Empleado`) REFERENCES `dependientes` (`DNI_Empleado`);

--
-- Filtros para la tabla `telefono_de_cliente`
--
ALTER TABLE `telefono_de_cliente`
  ADD CONSTRAINT `telefono_de_cliente_ibfk_1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `cliente` (`Cod_cliente`);

--
-- Filtros para la tabla `telefono_de_distribuidor`
--
ALTER TABLE `telefono_de_distribuidor`
  ADD CONSTRAINT `telefono_de_distribuidor_ibfk_1` FOREIGN KEY (`RUC_Distribuidor`) REFERENCES `distribuidor` (`RUC`);

--
-- Filtros para la tabla `telefono_de_empleado`
--
ALTER TABLE `telefono_de_empleado`
  ADD CONSTRAINT `telefono_de_empleado_ibfk_1` FOREIGN KEY (`DNI_Empleado`) REFERENCES `empleado` (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
