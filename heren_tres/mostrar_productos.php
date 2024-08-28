<?php 
	require_once("class/class.php");
	$dat=new Trabajo();
	//$campos=new Trabajo();
	?>

	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="estilos/mostrar.css">
	</head>
	
	<body>
	<header>
		<nav class="nav-left">
			<a href="index.php">
				<img src="imgs/aullenPharma.png" alt="Icono Home" class="icono-home" title="Inicio"></a>
		</nav>
			
		<nav class="nav-right">	
			<ul>
				<li>
					<a href="index.php">Inicio</a> &nbsp;&nbsp;&nbsp;
					<a href="#">Dependencias</a> &nbsp;&nbsp;&nbsp;
					<a href="#">Salir</a> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
				</li>
			</ul>
		</nav>	
	</header>
	<div class="table-container">			
		<table class="styled-table">
			<thead>
				<tr >
					<th colspan="9"><h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1> </th>
				</tr>
				<tr >
					<th colspan="8"><h2>Listado General de Productos</h2></th>
					<th>
						<a href="class/adicion_prod.php">
							<img src="imgs/guardar_3.png" alt="Adicion Registro" width="35" height="35" title="Adicionar Un Registro">
						</a>
					</th>
				</tr>
				<tr>
				<th>ID</th><th>Nombre Producto</th><th>Imagen Producto</th><th>Valor Unitario</th><th>Cantidad Existente</th><th>Impuestos</th><th>Tipo Producto</th><th>Proveedores</th><th>Opciones</th>
				</tr>			
			</thead>
			<tbody>
				<?php
				if(isset($_GET["pos"]))
				{
					$inicio=$_GET["pos"];
				}else
				{
					$inicio=0;
				}
				$cont=0;
				$lista=$dat->Traer_datos_productos($inicio);
				if (sizeof($lista)>10){
					$limit=10;
				}
				else{
					$limit=sizeof($lista);
				}
				for($i=0;$i<$limit;$i++)
				{
					$v1=$lista[$i]['id_producto'];
					$v2=substr($lista[$i]['nombre_prod'],0,20);
					$V3=$lista[$i]['img_produc'];
					$v4=substr($lista[$i]['val_Unitario'],0,20);
					$v5=$lista[$i]['cant_Exist'];
					$v6=$lista[$i]['nombre_impuestoUno'];
					$v7=$lista[$i]['nombre_impuestoDos'];
					$v8=$lista[$i]['nombre_Tipo'];
					$v9=$lista[$i]['nomb_Prov'];
					$cont++;
					?>
					<tr>
						<td align="center"><?php echo $v1;?></td>
						<td align="center"><?php echo $v2;?></td>
						<td align="center"><a href="/heren_tres/imgs/productos/<?php echo $lista[$i]['img_produc'];?>"><img src="/heren_tres/imgs/productos/<?php echo $lista[$i]['img_produc'];?>" height="50" width="50"/></a></td>
						<td align="right"><?php echo '$'.number_format($v4, 2, ',', '.'); ?></td>
						<td align="center"><?php echo $v5;?></td>
						<td align="center"><?php echo $v6," + ",$v7;?></td>
						<td align="center"><?php echo $v8;?></td>
						<td align="center"><?php echo $v9;?></td>
						<td align="center">
							<a href="class/editar_prod.php?id=<?php echo $v1;?>" style="text-decoration: none;">
								<img src="imgs/editar_1.png" alt="Edicion Registro" width="25" height="25" title="Editar Registro">
							</a>
							&nbsp;&nbsp;
							<a href="class/elimina_prod.php?id=<?php echo $v1;?>" style="text-decoration: none;">
								<img src="imgs/eliminar_3.png" alt="Eliminacion de Registro" width="33" height="35" title="Eliminar Registro">
							</a>
						</td>
					</tr>
				<?php	
				}
				?> 
				<tr>
					<th colspan="9">
						<?php
						if($inicio>0){
							$anteriores=$inicio-10;
							?>
							<a href="?pos=<?php echo $anteriores;?>" title="Registros Anteriores">Registros Anteriores</a>
							<?php
						}
						?>
						&nbsp;&nbsp;||&nbsp;&nbsp;	<!- &nbsp; es una entidad HTML que representa un espacio en blanco no separable (non-breaking space)->
						<?php
						if(count($lista)>10){
							$proximo=$inicio+10;
							?>
							<a href="?pos=<?php  echo $proximo;?>" title="Proximos Registros">Proximos Registros</a>
							<?php
						}
						?>
					</th>
				</tr>
			</tbody>
		</table>
	</div>		
		<footer>
			<div class="container">
				<p>&copy; 2024 Proveedores Farmacéuticos Aullen Pharma. Todos los derechos reservados.</p>
			</div>
    	</footer>
	</body>
</html>