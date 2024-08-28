<?php
require_once("class.php");
$dat=new Trabajo();

//$tipo=$dat->trae_tipo();
//$ciud=$dat->trae_ciudad();

if (isset($_POST["conf_val"]))
{
	$v1=$_POST["idProveedor"];
	$v2=$_POST["nombre"];
	$v3=$_POST["direccion"];
	$v4=$_POST["nit"];
	$v5=$_POST["telefono"];
	$Reg=$dat->adicion_Proveedor($v1,$v2,$v3,$v4,$v5);
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
 			<h4>Formulario Adición Proveedores</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="idProveedor" id="idProveedor" value="" placeholder="ID Proveedor">
 			<input class="controles" type="text" name="nombre" id="nombre" value="" placeholder="Razón Social">
 			<input class="controles" type="text" name="direccion" id="direccion" value="" placeholder="Direccion">
 			<input class="controles" type="text" name="nit" id="nit" value="" placeholder="NIT">
 			<input class="controles" type="text" name="telefono" id="telefono" value="" placeholder="Nº Telefónico" >
 		
			
 			<br>
 			<input class="botones" type="submit" name="Guardar" value="Agregar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['id_proveed']?>">
 			</form>
 		</section>
 	
 </body>
 </html>