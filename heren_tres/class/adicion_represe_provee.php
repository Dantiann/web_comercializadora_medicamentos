<?php
require_once("class.php");

$dat=new Trabajo();
$provee=$dat->trae_ListaProveedor();

if (isset($_POST["conf_val"]))
{
	$v1 = $_POST["id"];
	$v2 = $_POST["nombres"];
	$v3 = $_POST["apellidos"];
	$v4 = $_POST["telefono"];
	$v5 = $_POST["proveedor"];
	$Reg = $dat->adicion_represProvee($v1, $v2, $v3, $v4, $v5);
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
 			<h4>Formulario Adición Representantes de Ventas / Proveedor</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="id" id="id" value="" placeholder="Numero de identidad">
 			<input class="controles" type="text" name="nombres" id="nombres" value="" placeholder="Nombres del Representante">
 			<input class="controles" type="text" name="apellidos" id="apellidos" value="" placeholder="Apellidos del Representante">
 			
 			
			<input class="controles" type="text" name="telefono" id="telefono" value="" placeholder="Nro Telefónico" >
 		
			<select class="controles" name="proveedor" id="proveedor">
				<option value="">Seleccione un Proveedor</option>
					<?php 
						for($i=0;$i<sizeof($provee);$i++)
						{
					?>
							<option value="<?php echo $provee[$i]["id_proveed"]; ?>"><?php echo $provee[$i]["nomb_Prov"]; ?></option>
					<?php					
						}
					?>				
			</select>
			
 			<br>
 			<input class="botones" type="submit" name="Guardar" value="Agregar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['ident_Vend']?>">
 			</form>
 		</section>
 	
 </body>
 </html>