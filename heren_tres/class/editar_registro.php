<?php
	require_once("class.php");
	$dat=new Trabajo();
	if(!isset($_GET["id"]))
	{
		echo "<script type='text/javascript'>
		alert('Debe Indicar el Codigo del Cliente');
		window.location='../mostrar_datos.php';
		</script>";
	}else
	{
		$cod=$_GET["id"];

		$campos=new Trabajo();
		$val=$campos->trae_uncliente($cod);
		//print_r($val);
		$ciud=$campos->trae_ciudad();

		$tipo=$campos->trae_tipo();
		
	}
	if(isset($_POST["conf_val"])=="si")
	{
		$v1=$_POST["nvoval"];
		$v2=$_POST["nombres"];
		$v3=$_POST["apellidos"];
		$v4=$_POST["direc"];
		$v5=$_POST["telefono"];
		$v6=$_POST["tip"];
		$v7=$_POST["ciu"];
		$resp=$dat->actualizaDat($v1, $v2, $v3, $v4, $v5, $v6, $v7);		
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
 			<h4>Formulario Actualizacion Datos</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="identifica" id="identifica" value="<?php echo $val[0]['id_cliente']?>" disabled>
 			<input class="controles" type="text" name="nombres" id="nombre" value="<?php echo $val[0]['nombre_Cli']?>">
 			<input class="controles" type="text" name="apellidos" id="apellido" value="<?php echo $val[0]['apellido_cli']?>">
 			<input class="controles" type="text" name="direc" id="direc" value="<?php echo $val[0]['direccion_Cli']?>">
 			<input class="controles" type="text" name="telefono" id="telefono" value="<?php echo $val[0]['nro_telefono']?>" >

			<select class="controles" name="tip" id="tip">
  <?php
  for($i=0;$i<sizeof($tipo);$i++)
  {
    $selected = ($val[0]['tipo_Cliente'] == $tipo[$i]["id_Tipo"]) ? 'selected="selected"' : '';
    echo "<option value=\"{$tipo[$i]["id_Tipo"]}\" {$selected}>{$tipo[$i]["descripcion_tip"]}</option>";
  }
  ?>
</select>



<select class="controles" name="ciu" id="ciu">
  <?php
  for($i=0;$i<sizeof($ciud);$i++)
  {
    $selected = ($val[0]['ciudad_cli'] == $ciud[$i]["id_Ciudad"]) ? 'selected="selected"' : '';
    echo "<option value=\"{$ciud[$i]["id_Ciudad"]}\" {$selected}>{$ciud[$i]["nombre_Ciu"]}</option>";
  }
  ?>
</select>



 			<br>
 			<input class="botones" type="submit" name="actualizar" value="Actualizar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['id_cliente']?>">
 			</form>
 		</section>
 	
 </body>
 </html>

