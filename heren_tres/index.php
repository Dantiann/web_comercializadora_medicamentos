<?php 
require_once("class/class.php");
$dat = new Trabajo();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROVEEDORES FARMACÉUTICOS AULEN PHARMA</title>
    <link rel="stylesheet" href="estilos/index.css">
   
</head>
<body>
    <header>
        <div class="container">
            <h1>PROVEEDORES FARMACÉUTICOS AULLEN PHARMA</h1>
            <nav>
                <ul>
                    <li><a href="mostrar_datos.php" class="link">Lista de Clientes</a></li>
                    <li><a href="mostrar_representante_provee.php" class="link">Lista de Representantes de Ventas</a></li>
                    <li><a href="mostrar_productos.php" class="link">Lista de Productos</a></li>
                    <li><a href="mostrar_orden_compra.php" class="link">Órdenes de Compra</a></li>
                    <li><a href="mostrar_proveedor.php" class="link">Proveedores</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <p>Seleccione una de las opciones en el menú para comenzar.</p>
            <img src="imgs/quimicaFarmaceutica.jpg" alt="Productos Farmacéuticos">
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Proveedores Farmacéuticos Aullen Pharma. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>

