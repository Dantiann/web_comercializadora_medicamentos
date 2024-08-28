-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 06:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ejercicio_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ciudad_cli`
--

CREATE TABLE `ciudad_cli` (
  `id_Ciudad` int(14) NOT NULL,
  `nombre_Ciu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `ciudad_cli`
--

INSERT INTO `ciudad_cli` (`id_Ciudad`, `nombre_Ciu`) VALUES
(1, 'BOGOTA'),
(2, 'MEDELLIN'),
(3, 'CALI'),
(4, 'BARRANQUILLA'),
(5, 'CARTAGENA'),
(6, 'CUCUTA');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(14) NOT NULL,
  `nombre_Cli` varchar(50) NOT NULL,
  `apellido_cli` varchar(50) NOT NULL,
  `direccion_Cli` varchar(80) NOT NULL,
  `nro_telefono` varchar(23) NOT NULL,
  `tipo_Cliente` int(4) NOT NULL,
  `ciudad_cli` int(4) NOT NULL,
  `img_Cliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_Cli`, `apellido_cli`, `direccion_Cli`, `nro_telefono`, `tipo_Cliente`, `ciudad_cli`, `img_Cliente`) VALUES
(1004, 'MIGUEL Eduardo', 'ESTRADA RESTREPO', 'CRA CON CALLE NO LO SE POR QUE NO VIVO ALLI', '456457567', 6, 6, ''),
(1006, 'JUAN SEBASTIAN DE LA CRUZ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 2, 2, ''),
(1007, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 2, 3, ''),
(1008, 'JUAN MANUEL ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1009, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 4, 4, 'paisaje1.jpg'),
(1011, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 1, 1, ''),
(1012, 'JUAN SEBASTIAN DE LA CRUZ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 2, 1, ''),
(1014, 'JUAN MANUEL ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1015, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 4, 4, ''),
(1016, 'MIGUEL ANGEL, ', 'ESTRADA RESTREPO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1017, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 1, 1, ''),
(1018, 'JUAN SEBASTIAN DE LA CRUZ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 2, 1, ''),
(1019, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 2, 3, ''),
(1020, 'JUAN MANUEL ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1021, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 4, 4, ''),
(1022, 'MIGUEL ANGEL, ', 'ESTRADA RESTREPO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1023, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 1, 1, ''),
(1024, 'JUAN SEBASTIAN DE LA CRUZ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 2, 1, ''),
(1025, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 2, 3, ''),
(1026, 'JUAN MANUEL ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1027, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 4, 4, ''),
(1028, 'MIGUEL ANGEL, ', 'ESTRADA RESTREPO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1029, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 1, 1, ''),
(1030, 'JUAN SEBASTIAN DE LA CRUZ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 2, 1, ''),
(1031, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 2, 3, ''),
(1032, 'JUAN MANUEL ', 'ESPITIA CUADRADO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1033, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 4, 4, ''),
(1034, 'MIGUEL ANGEL, ', 'ESTRADA RESTREPO', 'CRA CON CALLE NO LO SE POR QUE  NO VIVO ALLI', '456457567', 3, 4, ''),
(1035, 'MARIA DELFINA', 'CERQUERA SALCEDO', 'CALLE 35 46 34 INTERIOR 4 APTO 45', '12445467', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_copmp`
--

CREATE TABLE `detalle_copmp` (
  `Nro_Orden` int(14) NOT NULL,
  `codigo_prod` int(14) NOT NULL,
  `canti_prod_sol` int(6) NOT NULL,
  `canti_prod_ent` int(6) NOT NULL,
  `val_com_pro` decimal(14,0) NOT NULL,
  `valor_imp_uno` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_imp_dos` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `detalle_copmp`
--

INSERT INTO `detalle_copmp` (`Nro_Orden`, `codigo_prod`, `canti_prod_sol`, `canti_prod_ent`, `val_com_pro`, `valor_imp_uno`, `valor_imp_dos`) VALUES
(120000, 110123435, 1234, 0, 1200, 1200.00, 0.00),
(120000, 110123434, 1234, 0, 2458, 12346.00, 0.00),
(1206, 110123435, 1222, 0, 1200, 120.00, 0.00),
(1206, 110123434, 1000, 0, 150, 120.00, 0.00),
(1206, 110123436, 1222, 0, 1200, 120.00, 0.00),
(1206, 110123437, 1000, 0, 150, 120.00, 0.00),
(1207, 110123435, 1222, 0, 1200, 120.00, 0.00),
(1207, 110123436, 1000, 0, 150, 120.00, 0.00),
(1207, 110123437, 1222, 0, 1200, 120.00, 0.00),
(1207, 110123436, 1000, 0, 150, 120.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `estado_comp`
--

CREATE TABLE `estado_comp` (
  `id_estado` int(14) NOT NULL,
  `Desc_Esta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `estado_comp`
--

INSERT INTO `estado_comp` (`id_estado`, `Desc_Esta`) VALUES
(1000, 'En Compra'),
(1001, 'Entragada'),
(1002, 'Devuelta'),
(1003, 'Cancelada');

-- --------------------------------------------------------

--
-- Table structure for table `impuestos`
--

CREATE TABLE `impuestos` (
  `id_Impuesto` int(14) NOT NULL,
  `descri_Imp` varchar(60) NOT NULL,
  `valor_Imp` decimal(14,2) NOT NULL,
  `estado_Imp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `impuestos`
--

INSERT INTO `impuestos` (`id_Impuesto`, `descri_Imp`, `valor_Imp`, `estado_Imp`) VALUES
(100, 'IVA', 3.00, 1),
(101, 'ICA', 1.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orden_compra`
--

CREATE TABLE `orden_compra` (
  `id_Compra` int(14) NOT NULL,
  `fecha_ord` date NOT NULL,
  `id_proveed` int(14) NOT NULL,
  `estado_Comp` int(1) NOT NULL,
  `usuario_Sist` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `orden_compra`
--

INSERT INTO `orden_compra` (`id_Compra`, `fecha_ord`, `id_proveed`, `estado_Comp`, `usuario_Sist`) VALUES
(1206, '2024-05-03', 12131416, 1001, 3),
(1207, '2024-05-02', 12131415, 1000, 3),
(1209, '2024-05-03', 12131416, 1001, 3),
(1210, '2024-05-02', 12131415, 1000, 3),
(12002, '2024-05-02', 12131417, 1000, 3),
(12003, '2024-05-10', 12131415, 1000, 3),
(12004, '2024-05-02', 12131417, 1000, 3),
(12005, '2024-05-10', 12131415, 1000, 3),
(120000, '2024-05-07', 12131417, 1000, 4),
(120001, '2024-06-21', 12131418, 1000, 6),
(120002, '2024-06-21', 12131418, 1000, 6),
(120003, '2024-06-21', 12131418, 1000, 6),
(120004, '2024-06-21', 12131418, 1000, 3),
(120005, '2024-06-21', 12131418, 1001, 4),
(120006, '2024-06-21', 12131418, 1002, 3),
(120007, '2024-06-21', 12131418, 1002, 3),
(120008, '2024-06-21', 12131416, 1001, 4),
(120009, '2024-07-06', 12131418, 1001, 8),
(120010, '2024-07-06', 12131418, 1001, 8),
(120011, '2024-07-06', 12131418, 1001, 8),
(120012, '2024-06-21', 12131418, 1001, 6),
(120013, '2024-06-21', 12131418, 1001, 6),
(120014, '2024-06-21', 12131418, 1001, 6),
(130000, '2024-06-21', 12131418, 1002, 4),
(130001, '2024-06-21', 12131418, 1002, 4),
(130002, '2024-07-06', 12131418, 1003, 7),
(130003, '2024-06-21', 12131418, 1003, 8),
(130004, '2024-06-21', 12131418, 1003, 8),
(130005, '2024-06-22', 12131418, 1003, 7),
(130006, '2024-06-22', 12131418, 1000, 5),
(130007, '2024-06-22', 12131418, 1000, 6),
(130008, '2024-06-23', 12131418, 1000, 6),
(130009, '2024-06-22', 12131418, 1000, 6),
(130010, '2024-06-23', 12131416, 1000, 3),
(130011, '2024-06-23', 12131417, 1000, 5),
(130012, '2024-06-23', 12131417, 1000, 5),
(130013, '2024-06-23', 12131417, 1000, 4),
(130014, '2024-06-23', 12131417, 1000, 4),
(130015, '2024-06-23', 12131417, 1000, 8),
(130016, '2024-06-23', 12131417, 1000, 6),
(130017, '2024-06-23', 12131417, 1000, 3),
(130018, '2024-06-23', 12131418, 1000, 9),
(130019, '2024-06-23', 12131417, 1000, 4),
(130020, '2024-06-23', 12131417, 1001, 9),
(130021, '2024-06-23', 12131417, 1001, 9),
(130022, '2024-06-23', 12131417, 1001, 9),
(130023, '2024-06-23', 12131417, 1001, 9),
(130024, '2024-06-23', 12131417, 1001, 9),
(130025, '2024-06-23', 12131417, 1000, 9),
(130026, '2024-06-23', 12131417, 1001, 5),
(130027, '2024-06-23', 12131417, 1000, 3),
(130028, '2024-06-23', 12131417, 1001, 6),
(130029, '2024-06-23', 12131417, 1001, 6),
(130030, '2024-06-23', 12131417, 1001, 6),
(130031, '2024-06-23', 12131417, 1001, 6),
(130032, '2024-06-23', 12131417, 1001, 3),
(130033, '2024-06-23', 12131417, 1000, 4),
(130034, '2024-06-23', 12131417, 1000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(14) NOT NULL,
  `nombre_prod` varchar(60) NOT NULL,
  `img_produc` varchar(120) NOT NULL,
  `val_Unitario` decimal(14,0) NOT NULL,
  `cant_Exist` int(14) NOT NULL,
  `imp_Uno` int(14) NOT NULL,
  `imp_Dos` int(14) NOT NULL,
  `tipo_produc` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_prod`, `img_produc`, `val_Unitario`, `cant_Exist`, `imp_Uno`, `imp_Dos`, `tipo_produc`) VALUES
(111000, 'A10', '118c3b27f57d889b4b8ffd377149a5f3.png', 1000, 1000, 100, 101, 2001),
(111001, 'A20', 'aullenPharma.png', 1002, 2000, 100, 101, 2003),
(1211515, 'Algodón', 'Favicon_Mot-111.jpg', 10000, 1000, 100, 101, 2000),
(11013439, 'producto 2 de prueba', 'producto 1 de prueba', 1500, 1000, 100, 101, 2000),
(11013441, 'producto 4 de prueba', 'producto 1 de prueba', 1500, 1000, 100, 101, 2000),
(11013443, 'producto 5 de prueba', 'producto 1 de prueba', 1500, 1000, 100, 101, 2000),
(110103445, 'producto 7 de prueba', 'producto 1 de prueba', 1500, 1000, 100, 101, 2000),
(110103447, 'producto 9 de prueba', 'producto 1 de prueba', 1500, 1000, 100, 101, 2000),
(110103448, 'producto 9 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103450, 'producto 11 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103452, 'producto 12 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103454, 'producto 14 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103456, 'producto 131 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103458, 'producto 113 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103460, 'producto 11 de prueba', 'producto 21 de prueba', 1500, 1000, 100, 101, 2000),
(110103462, 'producto 23 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110103464, 'producto 25 de prueba', 'producto 9 de prueba', 1500, 1000, 100, 101, 2000),
(110123434, 'ACETAMINOFEN DE 200MG', '', 1200, 4500, 100, 101, 2000),
(110123435, 'ACETAMINOFEN DE 200 MG  EN AEROSOL', '', 1305, 35435, 101, 100, 2000),
(110123436, 'ACETAMINOFEN DE 350 MG', '', 1300, 4500, 100, 101, 2000),
(110123437, 'ACETAMINOFEN DE 350 MG  EN AEROSOL', '', 1305, 35435, 101, 100, 2000),
(110123438, 'producto 1 de prueba', 'elemento de prueba', 2355, 1000, 100, 101, 2000),
(110123440, 'producto 3 de prueba', 'elemento de prueba', 2355, 1000, 100, 101, 2000),
(110123442, 'producto 4 de prueba', 'elemento de prueba', 2355, 1000, 100, 101, 2000),
(110123444, 'producto 6 de prueba', 'elemento de prueba', 2355, 1000, 100, 101, 2000),
(110123446, 'producto 8 de prueba', 'elemento de prueba', 2355, 1000, 100, 101, 2000),
(110123447, 'producto 8 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123449, 'producto 10 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123451, 'producto 11 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123453, 'producto 13 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123455, 'producto 134 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123457, 'producto 144 de prueba', 'producto 18 de prueba', 2355, 1000, 100, 101, 2000),
(110123459, 'producto 20 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123461, 'producto 22 de prueba', 'producto 8 de prueba', 2355, 1000, 100, 101, 2000),
(110123463, 'producto 25 de prueba', '118c3b27f57d889b4b8ffd377149a5f3.png', 2355, 1000, 100, 101, 2000),
(110123503, 'ALGODÓN', '118c3b27f57d889b4b8ffd377149a5f3.png', 100, 1000, 100, 101, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveed` int(14) NOT NULL,
  `nomb_Prov` varchar(60) NOT NULL,
  `direc_Prove` varchar(80) NOT NULL,
  `Nit_Proveed` varchar(20) NOT NULL,
  `Nnro_Telefon` varchar(30) NOT NULL,
  `represe_Prov` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id_proveed`, `nomb_Prov`, `direc_Prove`, `Nit_Proveed`, `Nnro_Telefon`, `represe_Prov`) VALUES
(10012155, 'DROGAS SAN JORGE LTDA', 'CLL 18 105  31', '1000000-14', '3008242425', 0),
(12131415, 'PROVEEDORA DE DROGAS DE COLOMBIA S.A', 'CRA CON CALLE', '60346182-4', '346758789', 1213145),
(12131416, 'IMPORTADOA DE DROGAS COLOMBIA S.A', 'CALLE CON CARRERA 12', '65345348-1', '34666797', 1213145),
(12131417, 'PROVEEDORA COLOMBIANA DE DROGAS LTDA', 'CRA CON CALLE', '60345568-4', '346758789', 3456789),
(12131418, 'EMPRESA DE DROGAS LA REBAJA', 'CALLE CON CARRERA 12', '65345348-1', '34666797', 3456789);

-- --------------------------------------------------------

--
-- Table structure for table `prov_produ`
--

CREATE TABLE `prov_produ` (
  `id_proveed` int(14) NOT NULL,
  `cod_produc` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `prov_produ`
--

INSERT INTO `prov_produ` (`id_proveed`, `cod_produc`) VALUES
(12131418, 110123435),
(12131418, 110123436),
(12131418, 110123440),
(12131418, 11013439),
(12131418, 110103450),
(12131418, 110123451),
(12131418, 110103454),
(12131418, 110103456),
(12131418, 110103458),
(12131418, 110103460),
(12131418, 110103462),
(12131418, 110103464),
(12131418, 110123440),
(12131418, 110123442),
(12131418, 110123442),
(12131418, 110123444),
(12131418, 110123446),
(12131418, 110123447),
(12131418, 110123449),
(12131418, 110123451),
(12131418, 110123453),
(12131418, 110123455),
(12131418, 110123457),
(12131418, 110123459),
(12131418, 110123461),
(12131418, 110123463),
(12131418, 110103452),
(12131418, 1211515),
(12131418, 110123503),
(12131417, 111000),
(12131417, 111001);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id_Tipo` int(6) NOT NULL,
  `descripcion_tip` varchar(50) NOT NULL,
  `comentario` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id_Tipo`, `descripcion_tip`, `comentario`) VALUES
(1, 'SOCIO', ''),
(2, 'ASOCIADO COOPERATIVA', ''),
(3, 'CLIENTE', ''),
(4, 'PROVEEDOR COOPERATIVA', ''),
(5, 'EMPLEADO', ''),
(6, 'CONTRATISTA COOPERATIVA', '');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_produc`
--

CREATE TABLE `tipo_produc` (
  `id_tipo` int(14) NOT NULL,
  `nombre_Tipo` varchar(50) NOT NULL,
  `estdo_Tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tipo_produc`
--

INSERT INTO `tipo_produc` (`id_tipo`, `nombre_Tipo`, `estdo_Tipo`) VALUES
(2000, 'Medicamento', 1),
(2001, 'suministros', 1),
(2002, 'Imagenes Diagnosticas', 1),
(2003, 'Ortopedicos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_sist`
--

CREATE TABLE `usuarios_sist` (
  `id_usuario` int(14) NOT NULL,
  `login_Usu` varchar(35) NOT NULL,
  `Nomb_Usu` varchar(80) NOT NULL,
  `nro_Identid` int(14) NOT NULL,
  `pass_Usua` varchar(60) NOT NULL,
  `tipo_Usua` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuarios_sist`
--

INSERT INTO `usuarios_sist` (`id_usuario`, `login_Usu`, `Nomb_Usu`, `nro_Identid`, `pass_Usua`, `tipo_Usua`) VALUES
(3, 'jomigohu@sistemas', 'Jose Miguel Gomez Hurtado', 19399376, '123456', 5),
(4, 'maria@ventas', 'Maria Fernanda Fontecha Garcia', 41456874, '123456', 3),
(5, 'Alejandro', 'Diaz', 7969, '$2y$10$8BuGTAa7ehfVLR4STcpGRehOqnYbJ1jTInxVLI5T6NER2Pb0hpu4a', 3),
(6, 'Alexander', 'Alexander Garnica', 79800, '$2y$10$HMTgtoUO1j4L6lrW4/UwOuY885HJC0W3LLVO3L.OFe.nyH0TEPSnS', 1),
(7, 'alexander@gmail.com', 'Alexander Garnica', 79800, '$2y$10$r7MUN5Q2/..yjmf8ozGsNunf/9BBBG7N5ts/gBrpQfxPWIjAsLpl2', 1),
(8, 'alexander@hotmail.com', 'Alejandro Casemiro', 79900, '$2y$10$bLDWnJMkjzs7xsrhAH4DeOM3kpXXGs2NbOmSphbxxgrjNPJVDCDqW', 2),
(9, 'alexander123@gmail.com', 'Caro Peñuela', 8000, '$2y$10$0wAlHbFUv/pHYGM2nsbZve2RkPF1JzlSbj/N6NLHs0u5muuCfMSlO', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuario_sis`
--

CREATE TABLE `usuario_sis` (
  `id_TipUs` int(14) NOT NULL,
  `desc_Usua` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuario_sis`
--

INSERT INTO `usuario_sis` (`id_TipUs`, `desc_Usua`) VALUES
(1, 'Mensajero'),
(2, 'Secretaria'),
(3, 'Asistente'),
(4, 'Jefe Departaento'),
(5, 'Asistente Departamento'),
(6, 'Bodegero'),
(7, 'Gerente'),
(8, 'Almacenista');

-- --------------------------------------------------------

--
-- Table structure for table `vend_empresa`
--

CREATE TABLE `vend_empresa` (
  `ident_Vend` int(14) NOT NULL,
  `nombres_Vend` varchar(40) NOT NULL,
  `Apell_Vended` varchar(40) NOT NULL,
  `nro_Telefono` varchar(15) NOT NULL,
  `empresa_Rep` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `vend_empresa`
--

INSERT INTO `vend_empresa` (`ident_Vend`, `nombres_Vend`, `Apell_Vended`, `nro_Telefono`, `empresa_Rep`) VALUES
(1213145, 'JUAN FRANCISCO', ' PEREZ PERIRA', '5555555555', 12131418),
(3456789, 'JUAN FRANCISCO', ' PEREZ PERIRA', '5555555555', 12131418),
(12115189, 'Luisa ', 'Maracaibo', '3112218888', 12131417),
(12121213, 'MARIA', 'ESTRADA DIAZ', '3243151561', 12131416),
(45678903, 'MARIA DE LOS ANGELES', 'ESTRADA RESTREPO', '47670984', 12131418),
(78989898, 'Laisa', 'Rayo', '3154589899', 12131417);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudad_cli`
--
ALTER TABLE `ciudad_cli`
  ADD PRIMARY KEY (`id_Ciudad`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `tipo_Cliente` (`tipo_Cliente`),
  ADD KEY `ciudad_cli` (`ciudad_cli`);

--
-- Indexes for table `detalle_copmp`
--
ALTER TABLE `detalle_copmp`
  ADD KEY `codigo_prod` (`codigo_prod`),
  ADD KEY `Nro_Orden` (`Nro_Orden`);

--
-- Indexes for table `estado_comp`
--
ALTER TABLE `estado_comp`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id_Impuesto`);

--
-- Indexes for table `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`id_Compra`),
  ADD KEY `id_proveed` (`id_proveed`),
  ADD KEY `estado_Comp` (`estado_Comp`),
  ADD KEY `usuario_Sist` (`usuario_Sist`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `tipo_produc` (`tipo_produc`),
  ADD KEY `imp_Uno` (`imp_Uno`),
  ADD KEY `imp_Dos` (`imp_Dos`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveed`);

--
-- Indexes for table `prov_produ`
--
ALTER TABLE `prov_produ`
  ADD KEY `cod_produc` (`cod_produc`),
  ADD KEY `id_proveed` (`id_proveed`);

--
-- Indexes for table `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id_Tipo`);

--
-- Indexes for table `tipo_produc`
--
ALTER TABLE `tipo_produc`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `usuarios_sist`
--
ALTER TABLE `usuarios_sist`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_Usua` (`tipo_Usua`);

--
-- Indexes for table `usuario_sis`
--
ALTER TABLE `usuario_sis`
  ADD PRIMARY KEY (`id_TipUs`);

--
-- Indexes for table `vend_empresa`
--
ALTER TABLE `vend_empresa`
  ADD PRIMARY KEY (`ident_Vend`),
  ADD KEY `empresa_Rep` (`empresa_Rep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `id_Compra` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130036;

--
-- AUTO_INCREMENT for table `usuarios_sist`
--
ALTER TABLE `usuarios_sist`
  MODIFY `id_usuario` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuario_sis`
--
ALTER TABLE `usuario_sis`
  MODIFY `id_TipUs` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`tipo_Cliente`) REFERENCES `tipo_cliente` (`id_Tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`ciudad_cli`) REFERENCES `ciudad_cli` (`id_Ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_copmp`
--
ALTER TABLE `detalle_copmp`
  ADD CONSTRAINT `detalle_copmp_ibfk_1` FOREIGN KEY (`Nro_Orden`) REFERENCES `orden_compra` (`id_Compra`),
  ADD CONSTRAINT `detalle_copmp_ibfk_2` FOREIGN KEY (`codigo_prod`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `orden_compra_ibfk_3` FOREIGN KEY (`id_proveed`) REFERENCES `proveedores` (`id_proveed`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orden_compra_ibfk_4` FOREIGN KEY (`estado_Comp`) REFERENCES `estado_comp` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orden_compra_ibfk_5` FOREIGN KEY (`usuario_Sist`) REFERENCES `usuarios_sist` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tipo_produc`) REFERENCES `tipo_produc` (`id_tipo`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`imp_Uno`) REFERENCES `impuestos` (`id_Impuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`imp_Dos`) REFERENCES `impuestos` (`id_Impuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prov_produ`
--
ALTER TABLE `prov_produ`
  ADD CONSTRAINT `prov_produ_ibfk_1` FOREIGN KEY (`id_proveed`) REFERENCES `proveedores` (`id_proveed`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prov_produ_ibfk_2` FOREIGN KEY (`cod_produc`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios_sist`
--
ALTER TABLE `usuarios_sist`
  ADD CONSTRAINT `usuarios_sist_ibfk_1` FOREIGN KEY (`tipo_Usua`) REFERENCES `usuario_sis` (`id_TipUs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vend_empresa`
--
ALTER TABLE `vend_empresa`
  ADD CONSTRAINT `vend_empresa_ibfk_1` FOREIGN KEY (`empresa_Rep`) REFERENCES `proveedores` (`id_proveed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
