<?php 
	require_once("class/class.php");
	$dat = new Trabajo();
	//$campos = new Trabajo();
?>

<!DOCTYPE html>
<html lang="en">
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
			<tr bgcolor="#738BD8">
				<th colspan="8"><h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1></th>
			</tr>
			<tr bgcolor="#CEEFF9">
				<th colspan="7"><h2>Listado General de Clientes</h2></th>
				<th>
					<a href="class/adicion_reg.php">
						<img src="imgs/guardar_3.png" alt="Adicion Registro" width="35" height="35" title="Adicionar Un Registro">
					</a>
				</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Nº Telefónico</th>
				<th>Tipo Cliente</th>
				<th>Ciudad</th>
				<th>Opciones</th>
			</tr>			
		</thead>
		<tbody>
			<?php
			if(isset($_GET["pos"])) {
				$inicio = $_GET["pos"];
			} else {
				$inicio = 0;
			}
			$cont = 0;
			$lista = $dat->trae_datos($inicio);
			$limit = min(count($lista), 10); // Limita a 10 registros por página
			
			for($i = 0; $i < $limit; $i++) {
				$v1 = $lista[$i]['id_cliente'];
				$v2 = substr($lista[$i]['nombre_Cli'], 0, 20);
				$v3 = $lista[$i]['apellido_cli'];
				$v4 = substr($lista[$i]['direccion_Cli'], 0, 20);
				$v5 = $lista[$i]['nro_telefono'];
				$v6 = substr($lista[$i]['descripcion_tip'], 0, 12);
				$v7 = $lista[$i]['nombre_Ciu'];
				$cont++;
			?>
				<tr>
					<td align="center"><?php echo $v1; ?></td>
					<td align="center"><?php echo $v2; ?></td>
					<td align="center"><?php echo $v3; ?></td>
					<td align="center"><?php echo $v4; ?></td>
					<td align="center"><?php echo $v5; ?></td>
					<td align="center"><?php echo $v6; ?></td>
					<td align="center"><?php echo $v7; ?></td>
					<td>
						<a href="class/editar_registro.php?id=<?php echo $v1; ?>" style="text-decoration: none;">
							<img src="imgs/editar_1.png" alt="Edicion Registro" width="25" height="25" title="Editar Registro">
						</a>
						&nbsp;&nbsp;
						<a href="class/elimina_reg.php?id=<?php echo $v1; ?>" style="text-decoration: none;">
							<img src="imgs/eliminar_3.png" alt="Eliminacion de Registro" width="33" height="33" title="Eliminar Registro">
						</a>
					</td>
				</tr>
			<?php	
			}
			?> 
					
			<tr>
				<th colspan="8">
					<?php
					if($inicio > 0) {
						$anteriores = $inicio - 10;
					?>
						<a href="?pos=<?php echo $anteriores; ?>" title="Registros Anteriores">Registros Anteriores</a>
					<?php
					}
					?>
					&nbsp;&nbsp;||&nbsp;&nbsp;
					<?php
					if(count($lista) > 10) {
						$proximo = $inicio + 10;
					?>
						<a href="?pos=<?php echo $proximo; ?>" title="Proximos Registros">Proximos Registros</a>
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
