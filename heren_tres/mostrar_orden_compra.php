<?php 
    require_once("class/class.php");
    $dat = new Trabajo();
    //$campos=new Trabajo()
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
    <table>
        <thead>
            <tr bgcolor="#148BD1">
                <th colspan="8"><h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1></th>
            </tr>
            <tr bgcolor="#148BD1">
                <th colspan="7"><h2>Listado de Ordenes de Compra</h2></th>
                <th>
                    <a href="generar_orden_compra.php">
                        <img src="imgs/guardar_3.png" alt="Adicion Registro" width="35" height="35" title="Adicionar Un Registro">
                    </a>
                </th>
            </tr>
            <tr>
                <th>Nº Orden de Compra</th>
                <th>Proveedor</th>
                <th>Representante de Ventas</th>
                <th>Fecha de la Orden </th>
                <th>Estado</th>
                <th>Solicitante de la Orden</th>
                <th>Total</th>
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
                $lista = $dat->trae_DatosOrdenCompra($inicio);

                for($i = 0; $i < sizeof($lista); $i++) {
                    $v1 = $lista[$i]['id_Compra'];
                    $v2 = $lista[$i]['nomb_Prov'];
                    $v3 = $lista[$i]['nombres_Vend'];
                    $v4 = $lista[$i]['Apell_Vended'];
                    $v5 = $lista[$i]['fecha_ord'];
                    $v6 = $lista[$i]['Desc_Esta'];
                    $v7 = $lista[$i]['Nomb_Usu'];
                    $v8 = $lista[$i]['total'];
                    $cont++;
            ?>
                <tr>
                    <td align="center"><a href="ver_orden_compra.php?id_Compra=<?php echo $v1; ?>"><?php echo $v1; ?></a></td>
                    <td><?php echo $v2; ?></td>
                    <td align="center"><?php echo $v3," ",$v4; ?></td>
                    <td align="center"><?php echo $v5; ?></td>
                    <td align="center"><?php echo $v6; ?></td>
                    <td align="center"><?php echo $v7; ?></td>
                    <td align="right"><?php echo $v8; ?></td>
                    <td align="center">
                        <a href="class/edita_orden_compra.php?id=<?php echo $v1; ?>" style="text-decoration: none;">
                            <img src="imgs/editar_1.png" alt="Edicion Registro" width="25" height="25" title="Editar Un Registro">  
                        </a>
                        &nbsp;&nbsp;
                        <a href="class/elimina_orden_compra.php?id=<?php echo $v1; ?>" style="text-decoration: none;">
                            <img src="imgs/eliminar_3.png" alt="Eliminacion de Registro" width="33" height="35" title="Eliminar Un Registro">
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
