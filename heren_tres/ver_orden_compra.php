<?php
require_once("class/class.php");
$dat = new Trabajo();

// Obtener el ID de la Orden de Compra de la URL
if (isset($_GET['id_Compra'])) {
    $idCompra = $_GET['id_Compra'];
} else {
    // Redirigir a la lista de órdenes si no se proporciona el id de la orden
    header("Location: mostrar_orden_compra.php");
    exit();
}

// Obtener el valor de $inicio para la paginación
if (isset($_GET["pos"])) {
    $inicio = $_GET["pos"];
} else {
    $inicio = 0;
}

// Obtener los detalles de la orden de compra con paginación
$lista = $dat->trae_DetalleOrdenCompra($idCompra, $inicio);

// Verificar si se debe generar el PDF
$is_pdf = isset($_GET['pdf']) && $_GET['pdf'] == 1;

if ($is_pdf) {
    // Incluir la librería mPDF solo si se va a generar un PDF
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
}

// Generar el contenido HTML
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Orden de Compra</title>
    <?php if ($is_pdf) { ?>
        <link rel="stylesheet" href="estilos/pdf.css">
    <?php } else { ?>
        <link rel="stylesheet" href="estilos/verOrdenCompra.css">
    <?php } ?>
</head>
<body>
<div class="container">
    <!-- Primera sección: Detalles de la orden -->
    <?php if (count($lista) > 0) { 
        $detalle = $lista[0]; // Utilizamos el primer elemento para los detalles generales
    ?>
    <h1>Orden de Compra #<?php echo $detalle['id_Compra']; ?></h1>
    <div class="order-details">
        <div style="text-align: center; margin-bottom: 20px;">
            <div class="icono-home">
                <a href="index.php" title="Inicio"> 
                    <img src="imgs/aullenPharma.png" alt="Icono Home" class="icono-home" title="Inicio">
                </a>
            </div>
        </div>
        <div>
            <h2>Información General</h2>
            <p><strong>Fecha de la Orden:</strong> <?php echo $detalle['fecha_ord']; ?></p>
            <p><strong>Estado:</strong> <?php echo $detalle['Desc_Esta']; ?></p>
            <p><strong>Solicitante de la Orden:</strong> <?php echo $detalle['Nomb_Usu']; ?></p>
            <p><strong>Cargo:</strong> <?php echo $detalle['desc_Usua']; ?></p>
            <p><strong>Impuestos:</strong> <?php echo $detalle['imp_Uno'] . ' + ' . $detalle['imp_Dos'];?></p>
           
        </div>
        <div>
            <h2>Información del Proveedor</h2>
            <p><strong>Proveedor:</strong> <?php echo $detalle['nomb_Prov']; ?></p>
            <p><strong>Dirección del Proveedor:</strong> <?php echo $detalle['direc_Prove']; ?></p>
            <p><strong>NIT del Proveedor:</strong> <?php echo $detalle['Nit_Proveed']; ?></p>
            <p><strong>Teléfono del Proveedor:</strong> <?php echo $detalle['Nnro_Telefon']; ?></p>
            <p><strong>Representante de Ventas:</strong> <?php echo $detalle['nombres_Vend'] . ' ' . $detalle['Apell_Vended']; ?></p>
            <p><strong>Teléfono del Vendedor:</strong> <?php echo $detalle['nro_Telefono']; ?></p>
        </div>
    </div>
    
    <!-- Segunda sección: Tabla de productos -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th colspan="8"><h2>Lista de Productos</h2></th>
                    <th>
                        <?php if (!$is_pdf) { ?>
                            <a href="?id_Compra=<?php echo $idCompra; ?>&pdf=1">
                                <img src="imgs/pdf.png" alt="Generar PDF" width="50" height="50" title="Generar PDF">
                            </a>
                        <?php } ?>
                    </th>
                </tr>
                <tr>
                    <th rowspan="2">Código</th>
                    <th rowspan="2">Producto</th>
                    <th rowspan="2">Tipo de Producto</th>
                    <th rowspan="2">Precio Unidad</th>
                    <th colspan="2">V. Impuestos</th>
                    <th rowspan="2">Cantidad</th>
                    <th rowspan="2">Subtotal</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    <th>IVA</th>
                    <th>ICA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($lista as $producto) {
                        $v1 = $producto['id_producto'];
                        $v2 = $producto['nombre_prod'];
                        $v3 = $producto['nombre_Tipo'];
                        $v4 = $producto['val_Unitario'];
                        $v5 = $producto['valor_imp_uno'];
                        $v6 = $producto['valor_imp_dos'];
                        $v7 = $producto['canti_prod_sol'];
                        $v8 = $producto['subtotal'];
                        $v9 = $producto['total'];
                ?>
                <tr>
                    <td class="center-align"><?php echo $v1; ?></td>
                    <td><?php echo $v2; ?></td>
                    <td class="center-align"><?php echo $v3; ?></td>
                    <td class="right-align"><?php echo '$' . number_format($v4, 2, '.', ',') ?></td>
                    <td class="center-align"><?php echo number_format($v5, 2, '.', ',') . '%' ?></td>
                    <td class="center-align"><?php echo number_format($v6, 2, '.', ',') . '%' ?></td>
                    <td class="center-align"><?php echo $v7; ?></td>
                    <td class="right-align"><?php echo '$' . number_format($v8, 2, '.', ','); ?></td>
                    <td class="right-align"><?php echo '$' . number_format($v9, 2, '.', ','); ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <th colspan="8" style="text-align: right;">Total de la Orden:</th>
                    <th><?php echo '$' . number_format($detalle['suma_total'], 2, '.', ','); ?></th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="10" class="pagination">
                        <?php
                        if ($inicio > 0) {
                            $anteriores = $inicio - 10;
                        ?>
                            <a href="?id_Compra=<?php echo $idCompra; ?>&pos=<?php echo $anteriores; ?>" title="Registros Anteriores">Registros Anteriores</a>
                        <?php } ?>
                        <div class="icon-back">
                            <a href="mostrar_orden_compra.php" title="Lista Ordenes de Compra">
                                <img src="imgs/arriba-a-la-izquierda.png" alt="Icono Atrás">
                            </a>
                        </div>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
                        <?php
                        if (count($lista) > 10) {
                            $proximo = $inicio + 10;
                        ?>
                            <a href="?id_Compra=<?php echo $idCompra; ?>&pos=<?php echo $proximo; ?>" title="Próximos Registros">Próximos Registros</a>
                        <?php } ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php } else { ?>
        <p>No se encontraron detalles para esta orden de compra.</p>
    <?php } ?>
</div>
</body>
</html>

<?php
$html = ob_get_clean();

if ($is_pdf) {
    // Establecer las propiedades del PDF
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;

    // Escribir el contenido HTML en el PDF
    $mpdf->WriteHTML($html);

    // Generar el PDF y enviarlo al navegador para su descarga
    $mpdf->Output('orden_compra_' . $detalle['id_Compra'] . '.pdf', 'D');
} else {
    // Mostrar la página HTML generada
    echo $html;
}
?>


