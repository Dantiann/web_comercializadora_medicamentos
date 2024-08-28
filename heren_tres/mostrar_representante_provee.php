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
	<style> 
		a {
			border: none;
			text-decoration: none;
			outline: none;
		}
		img {
			border: none;
		}
	</style>

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
				<tr bgcolor="#CEEHH9">
					<th colspan="5"><h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1></th>
				</tr>
				<tr bgcolor="#CIAGG9">
					<th colspan="4"><h2>Listado General de Representantes de Ventas / Proveedores</h2></th>
					<th>
						<a href="class/adicion_represe_provee.php">
							<img src="imgs/guardar_3.png" alt="Adicion Registro" width="35" height="35" title="Adicionar Un Registro">
						</a>
					</th>
				</tr>
				<tr>
					<th>Nº de Identificación</th>
					<th>Representantes de Ventas</th>
					<th>Proveedores</th>
					<th>Nº Telefónico</th>
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
				$lista = $dat->trae_datos_representante($inicio);
				
				for($i = 0; $i < sizeof($lista); $i++) {
					$v1 = $lista[$i]['ident_Vend'];
					$v2 = $lista[$i]['representante'];
					$v3 = $lista[$i]['nomb_Prov'];
					$v4 = $lista[$i]['nro_telefono'];
					$cont++;
				?>
					<tr>
						<td align="center"><?php echo $v1; ?></td>
						<td align="center"><?php echo $v2; ?></td>
						<td align="center"><?php echo $v3; ?></td>
						<td align="center"><?php echo $v4; ?></td>
						<td>
							<a href="class/edita_represe_provee.php?id=<?php echo $v1; ?>">
								<img src="imgs/editar_1.png" alt="Edicion Registro" width="25" height="25" title="Editar Un Registro">  
							</a>	
							&nbsp;&nbsp;
							<a href="class/elimina_represe_provee.php?id=<?php echo $v1; ?>">
								<img src="imgs/eliminar_3.png" alt="Eliminacion de Registro" width="33" height="35" title="Eliminar Un Registro">
							</a>
						</td>
					</tr>
				<?php
				}
				?> 
				<tr>
					<th colspan="5">
						<?php 
						if($inicio == 0) {
						?>
							Registros Anteriores
						<?php
						} else {
							$anteriores = $inicio - 12;
						?>
							<a href="?pos=<?php echo $anteriores; ?>" title="Registros Anteriores">Registros Anteriores</a>
						<?php
						}
						?>
						&nbsp;&nbsp;||&nbsp;&nbsp;
						<?php 
						if(count($lista) == 12) {
							$proximo = $inicio + 12;
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

