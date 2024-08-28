<?php
require_once("class.php");

$dat=new Trabajo();
$tipo=$dat->trae_tipo();
$ciud=$dat->trae_ciudad();

if (isset($_POST["conf_val"]))
{
	$v1=$_POST["id"];
	$v2=$_POST["nombres"];
	$v3=$_POST["apellidos"];
	$v4=$_POST["direccion"];
	$v5=$_POST["telefono"];
	$v6=$_POST["tipo"];
	$v7=$_POST["ciudad"];
	$Reg=$dat->adicion_Cliente($v1,$v2,$v3,$v4,$v5,$v6,$v7);
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
 			<h4>Formulario Adición Clientes</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="id" id="id" value="" placeholder="Numero de identidad">
 			<input class="controles" type="text" name="nombres" id="nombres" value="" placeholder="Nombres Cliente">
 			<input class="controles" type="text" name="apellidos" id="apellidos" value="" placeholder="Apellidos Cliente">
 			<input class="controles" type="text" name="direccion" id="direccion" value="" placeholder="Direccion Cliente">
 			<input class="controles" type="text" name="telefono" id="telefono" value="" placeholder="Nro Telefonico" >
 		
			<select class="controles" name="tipo" id="tipo">
				<option value="">Seleccione un tipo de cliente</option>
					<?php 
						for($i=0;$i<sizeof($tipo);$i++)
						{
					?>
							<option value="<?php echo $tipo[$i]["id_Tipo"];?>"><?php echo $tipo[$i]["descripcion_tip"];?></option>
					<?php					
						}
					?>				
			</select>
						
 			<select class="controles" name="ciudad" id="ciudad">
			 <option value="">Seleccione una ciudad</option>
 				<?php 
					for($i=0;$i<sizeof($ciud);$i++)
					{
				?>
						<option value="<?php echo $ciud[$i]["id_Ciudad"];?>"><?php echo $ciud[$i]["nombre_Ciu"];?></option>
				<?php					
					}
				?>				
			</select>


 			<br>
 			<input class="botones" type="submit" name="Guardar" value="Agregar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['id_cliente']?>">
 			</form>
 		</section>
 	
 </body>
 </html>