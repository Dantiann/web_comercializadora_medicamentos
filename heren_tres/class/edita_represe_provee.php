<?php
	require_once("class.php");
	$dat=new Trabajo();
	
    if(!isset($_GET["id"]))
	{
		echo "<script type='text/javascript'>
		alert('Debe Indicar el Codigo del Cliente');
		window.location='../edita_represe_provee.php';
		</script>";
	}else
	{
		$cod=$_GET["id"];

		$campos=new Trabajo();
	        		
        $provee = $campos->trae_ListaProveedor();
    	$val = $campos->trae_Representante($cod);
        		
	}
	if(isset($_POST["conf_val"])=="si")
	{
		$v1=$_POST["nvoval"];
        $v2 = $_POST["nombres"];
        $v3 = $_POST["apellidos"];
        $v4 = $_POST["telefono"];
        $v5 = $_POST["proveedor"];
		$resp=$dat->edita_represProvee($v1, $v2, $v3, $v4, $v5);		
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
 			<h4>Formulario Actualizacion Datos del Representante / PROVEEDOR</h4>
 			<form action="" method="post">
 			<input class="controles" type="text" name="id" id="identifica" value="<?php echo $val[0]['ident_Vend']?>" disabled>
 			<input class="controles" type="text" name="nombres" id="nombres" placeholder="Nombres Del Representante" value="<?php echo $val[0]['nombres_Vend']?>">
 			<input class="controles" type="text" name="apellidos" id="apellidos" placeholder="Apellidos Del Representante" value="<?php echo $val[0]['Apell_Vended']?>">
 			<input class="controles" type="text" name="telefono" id="telefono" placeholder="Nº telefónico" value="<?php echo $val[0]['nro_Telefono']?>">
 				
            

             <select class="controles" name="proveedor" id="proveedor">
    <?php
        for($i=0; $i<sizeof($provee); $i++) {
            $selected = ($val[0]["empresa_Rep"] == $provee[$i]["id_proveed"]) ? 'selected' : '';
    ?>
            <option value="<?php echo $provee[$i]["id_proveed"]; ?>" <?php echo $selected; ?>><?php echo $provee[$i]["nomb_Prov"]; ?></option>
    <?php
        }
    ?>
</select>


</select>

 			<br>
 			<input class="botones" type="submit" name="actualizar" value="Actualizar">
 			<input type="hidden" name="conf_val" value="si">
 			<input type="hidden" name="nvoval" value="<?php echo $val[0]['ident_Vend']?>">
 			</form>
 		</section>
 	
 </body>
 </html>

