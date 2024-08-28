<?php
	require_once("class.php");
	$dat=new Trabajo();
	if(!isset($_GET["id"])){
		echo "<script type='text/javascript'>
		alert('Debe Indicar el Codigo del Cliente');
		window.location='../mostrar_productos.php';
		</script>";
	}else{
		$cod=$_GET["id"];
		$campos=new Trabajo();
		$val=$campos->trae_unProducto($cod);
		$impuestos=$campos->trae_impuestos();
		$tipoProducto=$campos->trae_tipo_Producto();
		$proveedor=$dat->trae_ListaProveedor();
		$prove=$dat->traeprove($cod);
	}

	if(isset($_POST["conf_val"])=="si"){
		$v1 = $_POST["nvoval"];
		$v2 = $_POST["nombre"];
		$archivo=$_FILES['imagen'];
		$v4 = $_POST["valor"];
		$v5 = $_POST["cantidad"];
		$v6 = $_POST["impuestoUno"];
		$v7 = $_POST["impuestoDos"];
		$v8 = $_POST["tipo"];
		$v9 = $_POST["proveedor"];
		$Reg = $dat->actualiza_produc($v1, $v2, $archivo, $v4, $v5, $v6, $v7, $v8, $v9);
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Consulta Elementos </title>
		<link rel="stylesheet" href="../estilos/estilos.css">
	</head>

	<body>
		<section class="formulario_registro">
			<h4>Formulario Actualiza Producto <?echo $prove['id_proveed']?></h4>
			<form action="" method="post" enctype="multipart/form-data">
			<input class="controles" type="text" name="id" id="id" value="<?php echo $val[0]['id_producto']?>" disabled>
			<input class="controles" type="text" name="nombre" id="nombre" value="<?php echo $val[0]['nombre_prod']?>">
			<label>Imagen del Producto</label><br><br>
			<th><img src="/heren_tres/imgs/productos/<?php echo $val[0]['img_produc'];?>" height="100" width="100" style="display: block; margin-left: auto; margin-right: auto;"/></th>
			<input type="file" name="imagen" id="imagen" size="20"><br><br>
			<input class="controles" type="text" name="valor" id="valor" value="<?php echo $val[0]['val_Unitario'];?>">
			<input class="controles" type="text" name="cantidad" id="cantidad" value="<?php echo $val[0]['cant_Exist'];?>">
					
			<select class="controles" name="impuestoUno" id="impuestoUno">
				<option value="">Seleccione un Impuesto</option>
					<?php 
						for($i=0;$i<sizeof($impuestos);$i++)
						{
							$selected = ($val[0]['imp_Uno'] == $impuestos[$i]["id_Impuesto"]) ? 'selected="selected"' : '';
    						echo "<option value=\"{$impuestos[$i]["id_Impuesto"]}\" {$selected}>{$impuestos[$i]["descri_Imp"]}</option>";
						}
					?>				
			</select>

			<select class="controles" name="impuestoDos" id="impuestoDos">
				<option value="">Seleccione un Impuesto</option>
					<?php 
						for($i=0;$i<sizeof($impuestos);$i++)
						{
							$selected = ($val[0]['imp_Dos'] == $impuestos[$i]["id_Impuesto"]) ? 'selected="selected"' : '';
    						echo "<option value=\"{$impuestos[$i]["id_Impuesto"]}\" {$selected}>{$impuestos[$i]["descri_Imp"]}</option>";				
						}
					?>				
			</select>

			<select class="controles" name="tipo" id="tipo">
				<option value="">Seleccione una Categoría</option>
					<?php 
						for($i=0;$i<sizeof($tipoProducto);$i++)
						{
							$selected = ($val[0]['tipo_produc'] == $tipoProducto[$i]["id_tipo"]) ? 'selected="selected"' : '';
    						echo "<option value=\"{$tipoProducto[$i]["id_tipo"]}\" {$selected}>{$tipoProducto[$i]["nombre_Tipo"]}</option>";						
						}
					?>				
			</select>

			<select class="controles" name="proveedor" id="proveedor">
				<option value="">Seleccione un Proveedor</option>
					<?php 
						for($i=0;$i<sizeof($proveedor);$i++)
						{
							$selected = ($prove[0]["id_proveed"] == $proveedor[$i]["id_proveed"]) ? 'selected="selected"' : '';
    						echo "<option value=\"{$proveedor[$i]["id_proveed"]}\" {$selected}>{$proveedor[$i]["nomb_Prov"]}</option>";
						}
					?>				
			</select>
			
			<br>
			<input class="botones" type="submit" name="Guardar" value="Actualizar">
			<input type="hidden" name="conf_val" value="si">
			<input type="hidden" name="nvoval" value="<?php echo $val[0]['id_producto']?>">
			</form>
		</section>		
	</body>
 </html>