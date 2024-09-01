-- Crear la tabla `ciudad_cli`
CREATE TABLE `ciudad_cli`(
  `id_Ciudad` int(14) NOT NULL AUTO_INCREMENT = 100,
  `nombre_Ciu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_Ciudad`)
);

-- Crear la tabla `clientes`
CREATE TABLE `clientes` (
  `id_cliente` int(14) NOT NULL,
  `nombre_Cli` varchar(50) NOT NULL,
  `apellido_cli` varchar(50) NOT NULL,
  `direccion_Cli` varchar(80) NOT NULL,
  `nro_telefono` varchar(23) NOT NULL,
  `tipo_Cliente` int(4) NOT NULL,
  `ciudad_cli` int(4) NOT NULL,
  `img_Cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  FOREIGN KEY (`tipo_Cliente`) REFERENCES `tipo_cliente` (`id_Tipo`),
  FOREIGN KEY (`ciudad_cli`) REFERENCES `ciudad_cli` (`id_Ciudad`)
);

-- Crear la tabla `detalle_copmp`
CREATE TABLE `detalle_copmp` (
  `Nro_Orden` int(14) NOT NULL,
  `codigo_prod` int(14) NOT NULL,
  `canti_prod_sol` int(6) NOT NULL,
  `canti_prod_ent` int(6) NOT NULL,
  `val_com_pro` decimal(14,0) NOT NULL,
  `valor_imp_uno` DECIMAL(10, 2) NOT NULL DEFAULT 0;
  `valor_imp_dos` DECIMAL(10, 2) NOT NULL DEFAULT 0;
  PRIMARY KEY (`Nro_Orden`, `codigo_prod`),
  FOREIGN KEY (`Nro_Orden`) REFERENCES `orden_compra` (`id_Compra`),
  FOREIGN KEY (`codigo_prod`) REFERENCES `productos` (`id_producto`)
);

-- Crear la tabla `estado_comp`
CREATE TABLE `estado_comp` (
  `id_estado` int(14) NOT NULL,
  `Desc_Esta` varchar(30) NOT NULL,
  PRIMARY KEY (`id_estado`)
);

-- Crear la tabla `impuestos`
CREATE TABLE `impuestos` (
  `id_Impuesto` int(14) NOT NULL,
  `descri_Imp` varchar(60) NOT NULL,
  `estado_Imp` int(4) NOT NULL,
  PRIMARY KEY (`id_Impuesto`)
);

-- Crear la tabla `orden_compra`
CREATE TABLE `orden_compra` (
  `id_Compra` int(14) NOT NULL AUTO_INCREMENT,
  `fecha_ord` date NOT NULL,
  `id_proveed` int(14) NOT NULL,
  `estado_Comp` int(1) NOT NULL,
  `usuario_Sist` int(14) NOT NULL,
  PRIMARY KEY (`id_Compra`),
  FOREIGN KEY (`id_proveed`) REFERENCES `proveedores` (`id_proveed`),
  FOREIGN KEY (`estado_Comp`) REFERENCES `estado_comp` (`id_estado`),
  FOREIGN KEY (`usuario_Sist`) REFERENCES `usuarios_sist` (`id_usuario`)
);

-- Crear la tabla `productos`
CREATE TABLE `productos` (
  `id_producto` int(14) NOT NULL,
  `nombre_prod` varchar(60) NOT NULL,
  `img_produc` varchar(120) NOT NULL,
  `val_Unitario` decimal(14,0) NOT NULL,
  `cant_Exist` int(14) NOT NULL,
  `imp_Uno` int(14) NOT NULL,
  `imp_Dos` int(14) NOT NULL,
  `tipo_produc` int(14) NOT NULL,
  PRIMARY KEY (`id_producto`),
  FOREIGN KEY (`tipo_produc`) REFERENCES `tipo_produc` (`id_tipo`),
  FOREIGN KEY (`imp_Uno`) REFERENCES `impuestos` (`id_Impuesto`),
  FOREIGN KEY (`imp_Dos`) REFERENCES `impuestos` (`id_Impuesto`)
);

-- Crear la tabla `proveedores`
CREATE TABLE `proveedores` (
  `id_proveed` int(14) NOT NULL,
  `nomb_Prov` varchar(60) NOT NULL,
  `direc_Prove` varchar(80) NOT NULL,
  `Nit_Proveed` varchar(20) NOT NULL,
  `Nnro_Telefon` varchar(30) NOT NULL,
  `represe_Prov` int(14) NOT NULL,
  PRIMARY KEY (`id_proveed`)
);

-- Crear la tabla `prov_produ`
CREATE TABLE `prov_produ` (
  `id_proveed` int(14) NOT NULL,
  `cod_produc` int(14) NOT NULL,
  PRIMARY KEY (`id_proveed`, `cod_produc`),
  FOREIGN KEY (`id_proveed`) REFERENCES `proveedores` (`id_proveed`),
  FOREIGN KEY (`cod_produc`) REFERENCES `productos` (`id_producto`)
);

-- Crear la tabla `tipo_cliente`
CREATE TABLE `tipo_cliente` (
  `id_Tipo` int(6) NOT NULL,
  `descripcion_tip` varchar(50) NOT NULL,
  `comentario` varchar(80) NOT NULL,
  PRIMARY KEY (`id_Tipo`)
);

-- Crear la tabla `tipo_produc`
CREATE TABLE `tipo_produc` (
  `id_tipo` int(14) NOT NULL,
  `nombre_Tipo` varchar(50) NOT NULL,
  `estdo_Tipo` int(1) NOT NULL,
  PRIMARY KEY (`id_tipo`)
);

-- Crear la tabla `usuarios_sist`
CREATE TABLE `usuarios_sist` (
  `id_usuario` int(14) NOT NULL AUTO_INCREMENT,
  `login_Usu` varchar(35) NOT NULL,
  `Nomb_Usu` varchar(80) NOT NULL,
  `nro_Identid` int(14) NOT NULL,
  `pass_Usua` varchar(60) NOT NULL,
  `tipo_Usua` int(14) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  FOREIGN KEY (`tipo_Usua`) REFERENCES `usuario_sis` (`id_TipUs`)
);

-- Crear la tabla `usuario_sis`
CREATE TABLE `usuario_sis` (
  `id_TipUs` int(14) NOT NULL AUTO_INCREMENT,
  `desc_Usua` varchar(50) NOT NULL,
  PRIMARY KEY (`id_TipUs`)
);

-- Crear la tabla `vend_empresa`
CREATE TABLE `vend_empresa` (
  `ident_Vend` int(14) NOT NULL,
  `nombres_Vend` varchar(40) NOT NULL,
  `Apell_Vended` varchar(40) NOT NULL,
  `nro_Telefono` varchar(15) NOT NULL,
  `empresa_Rep` int(14) NOT NULL,
  PRIMARY KEY (`ident_Vend`),
  FOREIGN KEY (`empresa_Rep`) REFERENCES `proveedores` (`id_proveed`)
);


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

INSERT INTO `detalle_copmp` (`Nro_Orden`, `codigo_prod`, `canti_prod_sol`, `canti_prod_ent`, `val_com_pro`, `val_impues`) VALUES
(120000, 110123435, 1234, 0, 1200, 1200),
(120000, 110123434, 1234, 0, 2458, 12346),
(1206, 110123435, 1222, 0, 1200, 120),
(1206, 110123434, 1000, 0, 150, 120),
(1206, 110123436, 1222, 0, 1200, 120),
(1206, 110123437, 1000, 0, 150, 120),
(1207, 110123435, 1222, 0, 1200, 120),
(1207, 110123436, 1000, 0, 150, 120),
(1207, 110123437, 1222, 0, 1200, 120),
(1207, 110123436, 1000, 0, 150, 120);

INSERT INTO `estado_comp` (`id_estado`, `Desc_Esta`) VALUES
(1000, 'En Compra'),
(1001, 'Entragada'),
(1002, 'Devuelta'),
(1003, 'Cancelada');

INSERT INTO `impuestos` (`id_Impuesto`, `descri_Imp`, `estado_Imp`) VALUES
(100, 'IVA', 1),
(101, 'ICA', 1);

INSERT INTO `orden_compra` (`id_Compra`, `fecha_ord`, `id_proveed`, `estado_Comp`, `usuario_Sist`) VALUES
(1206, '2024-05-03', 12131416, 1001, 3),
(1207, '2024-05-02', 12131415, 1000, 3),
(1209, '2024-05-03', 12131416, 1001, 3),
(1210, '2024-05-02', 12131415, 1000, 3),
(12002, '2024-05-02', 12131417, 1000, 3),
(12003, '2024-05-10', 12131415, 1000, 3),
(12004, '2024-05-02', 12131417, 1000, 3),
(12005, '2024-05-10', 12131415, 1000, 3),
(120000, '2024-05-07', 12131417, 1000, 4);

INSERT INTO `productos` (`id_producto`, `nombre_prod`, `img_produc`, `val_Unitario`, `cant_Exist`, `imp_Uno`, `imp_Dos`, `tipo_produc`) VALUES
(110123434, 'ACETAMINOFEN DE 200MG', '', 1200, 4500, 100, 101, 2000),
(110123435, 'ACETAMINOFEN DE 200 MG  EN AEROSOL', '', 1305, 35435, 101, 100, 2000),
(110123436, 'ACETAMINOFEN DE 350 MG', '', 1300, 4500, 100, 101, 2000),
(110123437, 'ACETAMINOFEN DE 350 MG  EN AEROSOL', '', 1305, 35435, 101, 100, 2000);

INSERT INTO `proveedores` (`id_proveed`, `nomb_Prov`, `direc_Prove`, `Nit_Proveed`, `Nnro_Telefon`, `represe_Prov`) VALUES
(12131415, 'PROVEEDORA DE DROGAS DE COLOMBIA S.A', 'CRA CON CALLE', '60346182-4', '346758789', 1213145),
(12131416, 'IMPORTADOA DE DROGAS COLOMBIA S.A', 'CALLE CON CARRERA 12', '65345348-1', '34666797', 1213145),
(12131417, 'PROVEEDORA COLOMBIANA DE DROGAS LTDA', 'CRA CON CALLE', '60345568-4', '346758789', 3456789),
(12131418, 'EMPRESA DE DROGAS LA REBAJA', 'CALLE CON CARRERA 12', '65345348-1', '34666797', 3456789);

INSERT INTO `tipo_cliente` (`id_Tipo`, `descripcion_tip`, `comentario`) VALUES
(1, 'SOCIO', ''),
(2, 'ASOCIADO COOPERATIVA', ''),
(3, 'CLIENTE', ''),
(4, 'PROVEEDOR COOPERATIVA', ''),
(5, 'EMPLEADO', ''),
(6, 'CONTRATISTA COOPERATIVA', '');

INSERT INTO `tipo_produc` (`id_tipo`, `nombre_Tipo`, `estdo_Tipo`) VALUES
(2000, 'Medicamento', 1),
(2001, 'suministros', 1),
(2002, 'Imagenes Diagnosticas', 1),
(2003, 'Ortopedicos', 1);

INSERT INTO `usuarios_sist` (`id_usuario`, `login_Usu`, `Nomb_Usu`, `nro_Identid`, `pass_Usua`, `tipo_Usua`) VALUES
(3, 'jomigohu@sistemas', 'Jose Miguel Gomez Hurtado', 19399376, '123456', 5),
(4, 'maria@ventas', 'Maria Fernanda Fontecha Garcia', 41456874, '123456', 3);

INSERT INTO `usuario_sis` (`id_TipUs`, `desc_Usua`) VALUES
(1, 'Mensajero'),
(2, 'Secretaria'),
(3, 'Asistente'),
(4, 'Jefe Departaento'),
(5, 'Asistente Departamento'),
(6, 'Bodegero'),
(7, 'Gerente'),
(8, 'Almacenista');

INSERT INTO `vend_empresa` (`ident_Vend`, `nombres_Vend`, `Apell_Vended`, `nro_Telefono`, `empresa_Rep`) VALUES
(1213145, 'JUAN FRANCISCO', ' PEREZ PERIRA', '5555555555', 12131418),
(3456789, 'JUAN FRANCISCO', ' PEREZ PERIRA', '5555555555', 12131418),
(12121213, 'MARIA DE LOS ANGELES', 'ESTRADA RESTREPO', '47670984', 12131416),
(45678903, 'MARIA DE LOS ANGELES', 'ESTRADA RESTREPO', '47670984', 12131416);






