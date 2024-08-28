<?php
	require_once("class.php");
	$dat=new Trabajo();
	
    if(!isset($_GET["id"]))
	{
		echo "<script type='text/javascript'>
		alert('Debe Indicar el Codigo del Cliente');
		window.location='../mostrar_proveedor.php';
		</script>";
	}else
	{
		$cod=$_GET["id"];

		$campos=new Trabajo();
		$val=$campos->trae_Proveedor($cod);
	
		
	}
	if(isset($_POST["conf_val"])=="si")
	{
		$v1=$_POST["nvoval"];
		$v2=$_POST["nombre"];
		$v3=$_POST["direccion"];
		$v4=$_POST["nit"];
		$v5=$_POST["telefono"];
		$resp=$dat->actualiza_Proveedor($v1, $v2, $v3, $v4, $v5);		
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
 			<h4>Formulario Actualizar Proveedor</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="id" id="idProveedor" value="<?php echo $val[0]['id_proveed']?>" disabled>
 			<input class="controles" type="text" name="nombre" id="nombreProveedor" value="<?php echo $val[0]['nomb_Prov']?>">
 			<input class="controles" type="text" name="direccion" id="direccionProveedor" value="<?php echo $val[0]['direc_Prove']?>">
 			<input class="controles" type="text" name="nit" id="nitProveedor" value="<?php echo $val[0]['Nit_Proveed']?>">
 			<input class="controles" type="text" name="telefono" id="telefProveedor" value="<?php echo $val[0]['Nnro_Telefon']?>" >

			
 			<br>
 			<input class="botones" type="submit" name="actualizar" value="Actualizar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['id_proveed']?>">
 			</form>
 		</section>
 	
 </body>
 </html>
