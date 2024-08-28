<?php
require_once("class.php");

$dat=new Trabajo();
$impuestos=$dat->trae_impuestos();
$tipoProducto=$dat->trae_tipo_Producto();
$proveedor=$dat->trae_ListaProveedor();
if (isset($_POST["conf_val"]))
{
	$v1 = $_POST["id"];
	$v2 = $_POST["nombre"];
	$archivo=$_FILES['imagen'];
	$v4 = $_POST["valor"];
	$v5 = $_POST["cantidad"];
	$v6 = $_POST["impuestoUno"];
	$v7 = $_POST["impuestoDos"];
	$v8 = $_POST["tipo"];
	$v9 = $_POST["proveedor"];
	$Reg = $dat->adicion_produc($v1, $v2, $archivo, $v4, $v5, $v6, $v7, $v8, $v9);
}
 ?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Consulta Elementos </title>
 	<link rel="stylesheet" href="../estilos/estilos.css">
 </head>

 <body>
	<section class="formulario_registro">
		<h4>Formulario Adición Producto</h4>
		<form action="" method="post" enctype="multipart/form-data">
			<input class="controles" type="text" name="id" id="id" value="" placeholder="Id del Producto">
			<input class="controles" type="text" name="nombre" id="nombre" value="" placeholder="Nombre del Producto">
			<label>Imagen del Producto</label><br><br>
			<input type="file" name="imagen" id="imagen" size="20"><br><br>
			<input class="controles" type="text" name="valor" id="valor" value="" placeholder="Valor del Producto">
			<input class="controles" type="text" name="cantidad" id="cantidad" value="" placeholder="Cantidad del Producto">
					
			<select class="controles" name="impuestoUno" id="impuestoUno">
				<option value="">Seleccione un Impuesto</option>
					<?php 
						for($i=0;$i<sizeof($impuestos);$i++)
						{
					?>
							<option value="<?php echo $impuestos[$i]["id_Impuesto"]; ?>"><?php echo $impuestos[$i]["descri_Imp"]; ?></option>
					<?php					
						}
					?>				
			</select>

			<select class="controles" name="impuestoDos" id="impuestoDos">
				<option value="">Seleccione un Impuesto</option>
					<?php 
						for($i=0;$i<sizeof($impuestos);$i++)
						{
					?>
							<option value="<?php echo $impuestos[$i]["id_Impuesto"]; ?>"><?php echo $impuestos[$i]["descri_Imp"]; ?></option>
					<?php					
						}
					?>				
			</select>

			<select class="controles" name="tipo" id="tipo">
				<option value="">Seleccione una Categoría</option>
					<?php 
						for($i=0;$i<sizeof($tipoProducto);$i++)
						{
					?>
							<option value="<?php echo $tipoProducto[$i]["id_tipo"]; ?>"><?php echo $tipoProducto[$i]["nombre_Tipo"]; ?></option>
					<?php					
						}
					?>				
			</select>

			<select class="controles" name="proveedor" id="proveedor">
				<option value="">Seleccione un Proveedor</option>
					<?php 
						for($i=0;$i<sizeof($proveedor);$i++)
						{
					?>
							<option value="<?php echo $proveedor[$i]["id_proveed"]; ?>"><?php echo $proveedor[$i]["nomb_Prov"]; ?></option>
					<?php					
						}
					?>				
			</select>
			<br>
			<input class="botones" type="submit" name="Guardar" value="Agregar">
			<input type="hidden" name="conf_val" value="si">
		</form>
	</section>
 </body>
 </html>