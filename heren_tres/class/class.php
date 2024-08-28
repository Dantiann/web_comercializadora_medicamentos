<?php 
	require_once("conexion.php");
	class Trabajo extends Conexion 
	{ 
		private $datos;

		public function construct()
		{
			parent::construct();
		}

		
		//------------------------------------------------------------------------------
		// CLIENTES

		public function trae_ciudad()
		{
			$sql="SELECT * from ciudad_cli";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			
			return $res;
		}

		public function trae_tipo()
		{
			$sql="SELECT * from tipo_Cliente";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_datos($inicio)
		{
			
			$sql="SELECT * FROM clientes, ciudad_cli, tipo_cliente
				WHERE clientes.tipo_Cliente=tipo_cliente.id_Tipo
				AND clientes.ciudad_cli=ciudad_cli.id_Ciudad 
				ORDER BY id_cliente DESC LIMIT $inicio,11";
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function seleccion_camp($var)
		{
			print_r($_GET);
			die();
		}

		public function trae_uncliente($id)
		{
			$sql="SELECT * FROM clientes, ciudad_cli, tipo_Cliente
			WHERE clientes.id_cliente='$id' AND
			clientes.ciudad_cli=ciudad_cli.id_Ciudad
			AND clientes.tipo_Cliente=tipo_Cliente.id_Tipo";
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;

		}

		public function actualizaDat($v1, $v2, $v3, $v4, $v5, $v6, $v7,)
		{
			
			$sql="update clientes 
			set 
			nombre_Cli='$v2',
			apellido_cli='$v3',
			direccion_Cli='$v4',
			nro_telefono=$v5,
			tipo_Cliente=$v6,
			ciudad_cli=$v7
			WHERE id_cliente=$v1";
			$result=$this->conex->query($sql);
			echo "<script text/javascript>;
			alert('La Actualizacion se ha Realizado Correctamente...');
			window.location='../mostrar_datos.php';
			</script>";
		}

		public function elim_uncliente($v1)
		{
			$sql="delete from clientes WHERE id_cliente='$v1'";
			$consul=$this->conex->query($sql);
			//$res=$consul->fetch_all(MYSQLI_ASSOC);
			echo "<script 'text/javascript'>;
			alert('El registro se Elimino Correctamente');
			window.location='../mostrar_datos.php';
			</script>";
		}

		public function adicion_Cliente($v1, $v2, $v3, $v4, $v5, $v6, $v7)
		{
			$sql="INSERT INTO clientes (id_Cliente, nombre_Cli, apellido_cli, direccion_Cli, nro_telefono, tipo_Cliente, ciudad_cli) 
			VALUES ($v1, '$v2', '$v3', '$v4', $v5, $v6, $v7)";
			
			$consul=$this->conex->query($sql);
			if($consul)
			{
				echo "<script type='text/javascript'>
						alert('El registro se agregó correctamente');
						window.location='../mostrar_datos.php';
					  </script>";
			} 
			
			else
			{
				echo "<script type='text/javascript'>
						alert('Error al agregar el registro');
						window.location='../adicion_reg.php';
					  </script>";
			}
		}


		//------------------------------------------------------------------------------
		// PRODUCTOS
		public function Traer_datos_productos($inicio)
		{
			$sql="SELECT 
				p.id_producto,
				p.nombre_prod,
				p.img_produc,
				p.val_Unitario,
				p.cant_Exist,
				i1.descri_Imp AS nombre_impuestoUno,
				i2.descri_Imp AS nombre_impuestoDos,
				t.nombre_Tipo,
				pro.nomb_Prov
			FROM 
				productos p,
				impuestos i1,
				impuestos i2,
				tipo_produc t,
				prov_produ pp,
				proveedores pro
			WHERE 
				p.imp_Uno = i1.id_impuesto
				AND p.imp_Dos = i2.id_impuesto
				AND p.tipo_produc = t.id_tipo
				AND p.id_producto = pp.cod_produc
				AND pp.id_proveed = pro.id_proveed
			ORDER BY id_producto DESC 
			LIMIT $inicio,11";

			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_unProducto($cod){
			$sql="SELECT * FROM productos
			WHERE id_producto='$cod'";			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_impuestos(){
			$sql="SELECT * FROM impuestos";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_tipo_Producto(){
			$sql="SELECT * FROM tipo_produc";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function traeprove($cod){
			$sql="SELECT * FROM prov_produ WHERE cod_produc='$cod'";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function adicion_produc($v1, $v2, $archivo, $v4, $v5, $v6, $v7, $v8, $v9){
			$nomb=$archivo['name'];
			$tipo=$archivo['type'];
			$tama=$archivo['size'];
			if ($tama < 2200000) 
			{
				if ($tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif' || $tipo == 'image/jpg') 
				{
					$carpeta_dest = $_SERVER['DOCUMENT_ROOT'] . '/heren_tres/imgs/productos/';
					if (move_uploaded_file($archivo['tmp_name'], $carpeta_dest . $nomb)) 
					{
						$sql1="INSERT INTO productos (id_producto, nombre_prod, img_produc, val_Unitario, cant_Exist, imp_Uno, imp_Dos, tipo_produc) 
						VALUES ($v1, '$v2', '".$nomb."',$v4, $v5, $v6, $v7, $v8)";
						$sql2= "INSERT INTO prov_produ (id_proveed, cod_produc) VALUES ($v9, $v1)";
						$consul1=$this->conex->query($sql1);
						$consul2=$this->conex->query($sql2);
						if ($consul1) 
						{
							echo "<script type='text/javascript'>
								alert('Producto Registrado.');
								window.location='../mostrar_productos.php';
								</script>";
						} 
						
						else 
						{
							echo "<script type='text/javascript'>
								alert('Error al registrar la imagen en la base de datos..');
								window.location='../class/adicion_prod.php';
								</script>";
						}
					} 
					
					else
					{
						echo "<script type='text/javascript'>
							alert('Error al cargar el archivo.');
							window.location='../class/adicion_prod.php';
							</script>";
					}

				} 
				
				else
				{
					echo "<script type='text/javascript'>
						alert('El Tipo de Archivo no es Permitido...');
						window.location='../class/adicion_prod.php';
						</script>";
				}

			} 
			
			else
			{
				echo "<script type='text/javascript'>
					alert('El Tamaño del Archivo Supera el Limite...');
					window.location='../class/adicion_prod.php';
					</script>";
			}
		}

		public function actualiza_produc($v1, $v2, $archivo, $v4, $v5, $v6, $v7, $v8, $v9)
		{
			$nomb=$archivo['name'];
			$tipo=$archivo['type'];
			$tama=$archivo['size'];
		
			if(!empty($nomb) && !empty($tipo) && !empty($tama))
			{			
				if ($tama < 2200000) 
				{
					if ($tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif' || $tipo == 'image/jpg') 
					{
						$carpeta_dest = $_SERVER['DOCUMENT_ROOT'] . '/heren_tres/imgs/productos/';
						if (move_uploaded_file($archivo['tmp_name'], $carpeta_dest . $nomb)) 
						{
							$sql1="UPDATE productos
								SET	nombre_prod='$v2', img_produc='".$nomb."', val_Unitario=$v4, cant_Exist=$v5, imp_Uno=$v6, imp_Dos=$v7, tipo_produc=$v8
								WHERE id_producto=$v1";
							$sql2= "UPDATE prov_produ SET id_proveed=$v9 WHERE cod_produc=$v1";
							$consul1=$this->conex->query($sql1);
							$consul2=$this->conex->query($sql2);
							if ($consul1) 
							{
								echo "<script type='text/javascript'>
									alert('Producto Actualizado.');
									window.location='../mostrar_productos.php';
									</script>";
							} 
							
							else 
							{
								echo "<script type='text/javascript'>
									alert('Error al registrar la imagen en la base de datos..');
									window.location='../class/editar_prod.php';
									</script>";
							}
						} 
				
						else
						{
							echo "<script type='text/javascript'>
								alert('Error al cargar el archivo.');
								window.location='../class/editar_prod.php';
								</script>";
						}
					} 

					else 
					{
						echo "<script type='text/javascript'>
							alert('El Tipo de Archivo no es Permitido...');
							window.location='../class/editar_prod.php';
							</script>";
					}
				} 
				
				else 
				{
					echo "<script type='text/javascript'>
						alert('El Tamaño del Archivo Supera el Limite...');
						window.location='../class/editar_prod.php';
						</script>";
				}
			}

			else
			{
				$sql1="UPDATE productos
					SET	nombre_prod='$v2', val_Unitario=$v4, cant_Exist=$v5, imp_Uno=$v6, imp_Dos=$v7, tipo_produc=$v8
					WHERE id_producto=$v1";
				$sql2= "UPDATE prov_produ SET id_proveed=$v9 WHERE cod_produc=$v1";
				$consul1=$this->conex->query($sql1);
				$consul2=$this->conex->query($sql2);
				if ($consul1) 
				{
					echo "<script type='text/javascript'>
						alert('Producto Actualizado.');
						window.location='../mostrar_productos.php';
						</script>";
				} else

				{
					echo "<script type='text/javascript'>
						alert('Error al Actualiza el Producto');
						window.location='../class/editar_prod.php';
						</script>";
				}
			}
		}

		
		public function elimina_produc($v1)
		{
			$sql1="DELETE FROM prov_produ WHERE cod_produc=$v1";
			$sql2="DELETE FROM productos WHERE id_producto=$v1";
			
			$consul1=$this->conex->query($sql1);
			$consul2=$this->conex->query($sql2);
			
			if ($consul2) 
				{
					echo "<script 'text/javascript'>;
						alert('El producto se Elimino Correctamente');
						window.location='../mostrar_productos.php';
						</script>";
				} else

				{
					echo "<script type='text/javascript'>
						alert('Error al Eliminar el Producto');
						window.location='../class/editar_prod.php';
						</script>";
				}
		} 
		

		//------------------------------------------------------------------------------
		// PROVEEDORES

		public function trae_DatosProveedor($inicio)
		{
			$sql="SELECT * FROM proveedores
			ORDER BY id_proveed DESC LIMIT $inicio,12";	
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_Proveedor($id)
		{
			$sql="SELECT * FROM proveedores
			WHERE id_proveed='$id'";
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function adicion_Proveedor($v1, $v2, $v3, $v4, $v5)
		{
			$sql="INSERT INTO proveedores (id_proveed, nomb_Prov, direc_Prove, Nit_Proveed, Nnro_Telefon) 
			VALUES ($v1, '$v2', '$v3', '$v4', '$v5')";
			$consul=$this->conex->query($sql);
			if($consul) 
			{
				echo "<script type='text/javascript'>
						alert('El registro se agregó correctamente');
						window.location='../mostrar_proveedor.php';
					  </script>";
			} 

			else
			{
				echo "<script type='text/javascript'>
						alert('Error al agregar el registro');
						window.location='../adicion_reg.php';
					  </script>";
			}
		}

		public function actualiza_Proveedor($v1, $v2, $v3, $v4, $v5)
		{			
			$sql="UPDATE proveedores
			SET
				nomb_Prov='$v2',
				direc_Prove='$v3',
				Nit_Proveed='$v4',
				Nnro_Telefon='$v5'
			WHERE id_proveed=$v1";
			
			$result=$this->conex->query($sql);
			
			echo "<script text/javascript>;
			alert('La Actualizacion se ha Realizado Correctamente...');
			window.location='../mostrar_proveedor.php';
			</script>";
		}

		public function elimina_Proveedor($v1)
		{
			$sql="DELETE FROM proveedores WHERE id_proveed=$v1";
			
			$consul=$this->conex->query($sql);
			
			//$res=$consul->fetch_all(MYSQLI_ASSOC);
			
			echo "<script 'text/javascript'>;
			alert('El registro se Elimino Correctamente');
			window.location='../mostrar_proveedor.php';
			</script>";
		}


		//------------------------------------------------------------------------------
		// REPRESENTANTE DE VENTAS / PROVEEDORES

		public function trae_datos_representante($inicio)
		{
			$sql="SELECT ident_Vend, CONCAT (nombres_Vend, ' ', Apell_Vended) AS representante, nomb_Prov, nro_telefono 
			FROM vend_empresa, proveedores
			WHERE vend_empresa.empresa_Rep = proveedores.id_proveed
			ORDER BY ident_Vend DESC LIMIT $inicio,12";	
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}
	
		public function trae_Representante($id)
		{
			$sql="SELECT * FROM vend_empresa
			WHERE ident_Vend ='$id'";
			
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}

		public function trae_ListaProveedor()
		{
			$sql="SELECT * FROM proveedores";
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;

		}

		public function adicion_represProvee($v1, $v2, $v3, $v4, $v5)
		{
			$sql="INSERT INTO vend_empresa (ident_Vend, nombres_Vend, Apell_Vended, nro_Telefono, empresa_Rep) 
			VALUES ($v1, '$v2', '$v3', '$v4', $v5)";
			

			$consul=$this->conex->query($sql);
			if($consul) 
			{
				echo "<script type='text/javascript'>
						alert('El registro se agregó correctamente');
						window.location='../mostrar_representante_provee.php';
					  </script>";
			} 
			
			else 
			{
				echo "<script type='text/javascript'>
						alert('Error al agregar el registro');
						window.location='../adicion_represe_provee.php';
					  </script>";
			}
		}


		public function edita_represProvee($v1, $v2, $v3, $v4, $v5)
		{
			
			$sql="UPDATE vend_empresa 
			SET
				nombres_Vend='$v2',
				Apell_Vended='$v3',
				nro_Telefono='$v4',
				empresa_Rep='$v5'
			WHERE
				 ident_Vend=$v1";
			

			$result=$this->conex->query($sql);
			
			echo "<script text/javascript>;
			alert('La Actualizacion se ha Realizado Correctamente...');
			window.location='../mostrar_representante_provee.php';
			</script>";
		}

		public function elimina_represProvee($v1)
		{
			$sql="DELETE FROM vend_empresa WHERE ident_Vend = $v1";
			
			$consul=$this->conex->query($sql);
			
			//$res=$consul->fetch_all(MYSQLI_ASSOC);
			
			echo "<script 'text/javascript'>;
			alert('El registro se Elimino Correctamente');
			window.location='../mostrar_representante_provee.php';
			</script>";
		}


//------------------------------------------------------------------------------
		// MOSTRAR ORDENES DE COMPRA / PROVEEDORES

		public function trae_DatosOrdenCompra($inicio)
		{
			$sql = "SELECT
            oc.id_Compra,
            pv.nomb_Prov,
            ven.nombres_Vend,
            ven.Apell_Vended,
            oc.fecha_ord,
            ec.Desc_Esta,
            usu.Nomb_Usu,
            CONCAT('$', FORMAT(COALESCE(SUM(dc.canti_prod_sol*p.val_Unitario * (1 + (dc.valor_imp_uno / 100) + (dc.valor_imp_dos / 100))), 0), 0)) AS total
			FROM
				orden_compra oc
				LEFT JOIN estado_comp ec ON oc.estado_Comp = ec.id_estado
				LEFT JOIN proveedores pv ON oc.id_proveed = pv.id_proveed
				LEFT JOIN detalle_copmp dc ON oc.id_Compra = dc.Nro_Orden
				LEFT JOIN productos p ON dc.codigo_prod = p.id_producto
				LEFT JOIN vend_empresa ven ON pv.represe_Prov = ven.ident_Vend
				LEFT JOIN usuarios_sist usu ON oc.usuario_Sist = usu.id_usuario
			GROUP BY
				oc.id_Compra,
				pv.nomb_Prov,
				oc.fecha_ord,
				ec.Desc_Esta
			ORDER BY
				oc.id_Compra DESC LIMIT $inicio, 11";

											
			$consul=$this->conex->query($sql);
			$res=$consul->fetch_all(MYSQLI_ASSOC);
			return $res;
		}


		
		//------------------------------------------------------------------------------
		// VER ORDEN DE COMPRA (DETALLES)
	
		public function trae_DetalleOrdenCompra($idCompra, $inicio)
{
    $sql = "SELECT 
                oc.id_Compra,
                oc.fecha_ord,
                ec.Desc_Esta,
                dc.canti_prod_sol,
                dc.valor_imp_uno,
                dc.valor_imp_dos,
                pv.nomb_Prov,
                pv.direc_Prove,
                pv.Nit_Proveed,
                pv.Nnro_Telefon,
                ve.nombres_Vend,
                ve.Apell_Vended,
                ve.ident_Vend,
                ve.nro_Telefono,
                pp.cod_produc,
                p.id_producto,
                p.nombre_prod,
                p.val_Unitario,
                i1.descri_Imp AS imp_Uno,
                i2.descri_Imp AS imp_Dos,
                tp.nombre_Tipo,
                u.Nomb_Usu,
                u.nro_Identid,
                us.desc_Usua,
                (p.val_Unitario * (1 + dc.valor_imp_uno / 100 + dc.valor_imp_dos / 100)) AS subtotal,
                (p.val_Unitario * dc.canti_prod_sol * (1 + dc.valor_imp_uno / 100 + dc.valor_imp_dos / 100)) AS total,
                (SELECT SUM(dc_inner.canti_prod_sol * (p_inner.val_Unitario * (1 + dc_inner.valor_imp_uno / 100 + dc_inner.valor_imp_dos / 100)))
                 FROM detalle_copmp dc_inner
                 JOIN productos p_inner ON dc_inner.codigo_prod = p_inner.id_producto
                 WHERE dc_inner.Nro_Orden = oc.id_Compra) AS suma_total
            FROM 
                orden_compra oc
                LEFT JOIN proveedores pv ON oc.id_proveed = pv.id_proveed
                LEFT JOIN estado_comp ec ON oc.estado_Comp = ec.id_estado
                LEFT JOIN usuarios_sist u ON oc.usuario_Sist = u.id_usuario
                LEFT JOIN usuario_sis us ON u.tipo_Usua = us.id_TipUs
                LEFT JOIN detalle_copmp dc ON oc.id_Compra = dc.Nro_Orden
                LEFT JOIN productos p ON dc.codigo_prod = p.id_producto
                LEFT JOIN impuestos i1 ON p.imp_Uno = i1.id_Impuesto 
                LEFT JOIN impuestos i2 ON p.imp_Dos = i2.id_Impuesto 
                LEFT JOIN tipo_produc tp ON p.tipo_produc = tp.id_tipo
                LEFT JOIN prov_produ pp ON pv.id_proveed = pp.id_proveed AND pp.cod_produc = p.id_producto
                LEFT JOIN vend_empresa ve ON pv.id_proveed = ve.empresa_Rep
            WHERE
                oc.id_Compra = '$idCompra'
            ORDER BY 
                oc.id_Compra DESC LIMIT $inicio, 11";

    $consul = $this->conex->query($sql);
    $res = $consul->fetch_all(MYSQLI_ASSOC);
    return $res;
}

		
		
//------------------------------------------------------------------------------
		// GENERAR ORDEN DE COMPRA
		public function trae_proveedores() {
			$sql = "SELECT pv.id_proveed, pv.nomb_Prov, pv.direc_Prove, pv.Nit_Proveed, pv.Nnro_Telefon
					FROM proveedores pv";
	
			$consul = $this->conex->query($sql);
			$proveedores = $consul->fetch_all(MYSQLI_ASSOC);
	
			foreach ($proveedores as &$proveedor) {
				$id_proveed = $proveedor['id_proveed'];
				$sql_rep = "SELECT ve.ident_Vend, ve.nombres_Vend, ve.Apell_Vended
							FROM vend_empresa ve
							WHERE ve.empresa_Rep = $id_proveed
							ORDER BY RAND()
							LIMIT 1";
	
				$consul_rep = $this->conex->query($sql_rep);
				$representante = $consul_rep->fetch_assoc();
	
				if ($representante) {
					$proveedor['representante'] = $representante;
				} else {
					$proveedor['representante'] = null; // En caso de que no haya representantes
				}
			}
	
			return $proveedores;
		}

		public function trae_estadoCompra()
		{
			$sql = "SELECT id_estado, Desc_Esta FROM estado_comp";
			$consul = $this->conex->query($sql);
			return $consul->fetch_all(MYSQLI_ASSOC);
		}

		public function trae_usuarioSolicitante() 
		{
			$sql = "SELECT * FROM usuarios_sist";
			$consul = $this->conex->query($sql);
			return $consul->fetch_all(MYSQLI_ASSOC);
		}

		
		public function trae_representantes($idprovee)
   		 {
			$sql = "SELECT * FROM vend_empresa WHERE empresa_Rep = '$idprovee'";
			$consul = $this->conex->query($sql);
			return $consul->fetch_all(MYSQLI_ASSOC);
    	}

		public function trae_productos($idprovee, $inicio)
{
    $sql = "SELECT
                pr.id_producto,
                pp.cod_produc,
                pr.nombre_prod,
                tp.nombre_Tipo,
                dc.canti_prod_sol,
                pr.val_Unitario,
                imp1.estado_Imp AS valor_imp_uno,
                imp2.estado_Imp AS valor_imp_dos,
                (pr.val_Unitario * (1 + ((IFNULL(dc.valor_imp_uno, 0) + IFNULL(dc.valor_imp_dos, 0)) / 100))) AS subtotal
            FROM
                proveedores pv
            JOIN
                prov_produ pp ON pv.id_proveed = pp.id_proveed
            JOIN
                productos pr ON pr.id_producto = pp.cod_produc
            JOIN
                tipo_produc tp ON tp.id_tipo = pr.tipo_produc
            LEFT JOIN
                detalle_copmp dc ON pr.id_producto = dc.codigo_prod
            LEFT JOIN
                impuestos imp1 ON pr.imp_Uno = imp1.id_Impuesto
            LEFT JOIN
                impuestos imp2 ON pr.imp_Dos = imp2.id_Impuesto
            WHERE
                pv.id_proveed = '$idprovee'
            ORDER BY pp.cod_produc DESC
            LIMIT $inicio, 11";

    $consul = $this->conex->query($sql);
    return $consul->fetch_all(MYSQLI_ASSOC);
}



		public function insertarOrdenCompra($proveedor, $representante, $fecha, $estadoCompra, $solicitante, $productos)
{
    // Insertar la orden de compra en la tabla orden_compra
    $sql = "INSERT INTO orden_compra(fecha_ord, id_proveed, estado_Comp, usuario_Sist) VALUES('$fecha', '$proveedor', '$estadoCompra', '$solicitante')";
    $this->conex->query($sql);

    $idCompra = $this->conex->insert_id;

    // Insertar los productos en la tabla detalle_copmp
    foreach ($productos as $producto) {
        if (isset($producto['seleccionado']) && $producto['cantidad'] > 0) {
            $cantidad = $producto['cantidad'];
            $codigo_prod = $producto['cod_produc'];
            $subtotal = $producto['subtotal'];
            $val_impues = ($subtotal / $producto['val_Unitario']) * 100 - 100;

            $sql = "INSERT INTO detalle_copmp(Nro_Orden, codigo_prod, canti_prod_sol, val_com_pro, valor_imp_uno, valor_imp_dos) 
			VALUES($idCompra, '$codigo_prod', $cantidad, $subtotal, $val_imp_uno, $val_imp_dos)";
            $this->conex->query($sql);
        }
    }

    return $idCompra;
}


		
		
	}


	
	
 ?>