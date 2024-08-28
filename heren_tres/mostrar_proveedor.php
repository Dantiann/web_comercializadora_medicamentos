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
			<tr bgcolor="#CEEFF9">
				<th colspan="6"><h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1></th>
			</tr>
			<tr bgcolor="#CEEFF9">
				<th colspan="5"><h2>Listado General de Proveedores</h2></th>
				<th>
					<a href="class/adicion_prov.php">
						<img src="imgs/guardar_3.png" alt="Adicion Registro" width="35" height="35" title="Adicionar Un Registro">
					</a>
				</th>
			</tr>
			<tr>
				<th>Id</th>
				<th>Razón Social</th>
				<th>Dirección</th>
				<th>Nit</th>
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
				$lista = $dat->trae_DatosProveedor($inicio);
				
				for($i = 0; $i < sizeof($lista); $i++) {
					$v1 = $lista[$i]['id_proveed'];
					$v2 = $lista[$i]['nomb_Prov'];
					$v3 = $lista[$i]['direc_Prove'];
					$v4 = $lista[$i]['Nit_Proveed'];
					$v5 = $lista[$i]['Nnro_Telefon'];
					$cont++;
			?>
				<tr>
					<td align="left"><?php echo $v1; ?></td>
					<td align="left"><?php echo $v2; ?></td>
					<td><?php echo $v3; ?></td>
					<td><?php echo $v4; ?></td>
					<td><?php echo $v5; ?></td>
					<td>
						<a href="class/editar_prov.php?id=<?php echo $v1; ?>">
							<img src="imgs/editar_1.png" alt="Edicion Registro" width="25" height="25" title="Editar Un Registro">  
						</a> 
						&nbsp;&nbsp;&nbsp;
						<a href="class/elimina_prov.php?id=<?php echo $v1; ?>">
							<img src="imgs/eliminar_3.png" alt="Eliminacion de Registro" width="33" height="35" title="Eliminar Un Registro">
						</a>
					</td>
				</tr>
			<?php
				}
			?> 
					
			<tr>
				<th colspan="6">
					<?php 
					if($inicio == 0) {
						echo "Registros Anteriores";
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
