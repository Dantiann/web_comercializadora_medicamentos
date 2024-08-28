<?php
require_once("class/class.php");

$datos = new Trabajo();

$proveedores = $datos->trae_proveedores();
$estadoCompra = $datos->trae_estadoCompra();
$solicitantes = $datos->trae_usuarioSolicitante();

$representantes = [];
$listas = [];
$totalProductos = 0;

if (isset($_POST["proveedor"])) {
    $idprovee = $_POST["proveedor"];
    $representantes = $datos->trae_representantes($idprovee);
    //$productos = $datos->trae_productos($idprovee);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Orden de Compra</title>
    <link rel="stylesheet" href="estilos/generarOrdenCompra.css">

    <script>



  
</script>


</head>
<body>
    <div class="container">
        <!-- Selección de proveedor -->
        <form method="POST" action="">
            <table>
                <thead>
                    <tr>
                        <th colspan="6"><h1>Gestión de Ordenes de Compra</h1></th>
                    </tr>
                    <tr>
                        <th style="padding: 20px;">
                            <select class="controles" name="proveedor" id="proveedor" onchange="this.form.submit()">
                                <option value="">Seleccione un Proveedor</option>
                                <?php foreach ($proveedores as $proveedor) { ?>
                                    <option value="<?php echo $proveedor['id_proveed']; ?>" <?php if (isset($idprovee) && $idprovee == $proveedor['id_proveed']) echo 'selected'; ?>>
                                        <?php echo $proveedor['nomb_Prov']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </th>
                    </tr>
                </thead>
            </table>
        </form>
    </div> 

    <?php 
    if (isset($idprovee)) {
    ?>
        <div class="container">
            <!-- Formulario completo -->
            <form method="POST" action="class/adicion_orden_compra.php">
                <input type="hidden" name="proveedor" value="<?php echo $idprovee; ?>">
                <table>
                    <thead>
                        <tr>
                            <th>Representante del Proveedor</th>
                            <th>Fecha de Creación Orden</th>
                            <th>Estado de la Orden</th>
                            <th>Solicitante</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="controles" name="representante" id="representante">
                                    <option value="">Seleccione un Representante</option>
                                    <?php foreach ($representantes as $representante) { ?>
                                        <option value="<?php echo $representante['ident_Vend']; ?>"><?php echo $representante['nombres_Vend'] . ' ' . $representante['Apell_Vended']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input class="controles" type="date" name="fecha" id="fecha" required>
                                </div>
                            </td>
                            <td>
                                <select class="controles" name="estadoCompra" id="estadoCompra">
                                    <option value="">Seleccione un Estado de la Compra</option>
                                    <?php foreach ($estadoCompra as $estado) { ?>
                                        <option value="<?php echo $estado["id_estado"]; ?>"><?php echo $estado["Desc_Esta"]; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="controles" name="solicitante" id="solicitante">
                                    <option value="">Nombre del Solicitante</option>
                                    <?php foreach ($solicitantes as $solicitante) { ?>
                                        <option value="<?php echo $solicitante["id_usuario"]; ?>"><?php echo $solicitante["Nomb_Usu"]; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                                        
                <table>
                    <thead>
                        <tr>
                            <th colspan="10"><h2>Lista de Productos</h2></th>
                        </tr>
                        <tr>
                            <th rowspan="2">Opción</th>
                            <th rowspan="2">Código</th>
                            <th rowspan="2">Producto</th>
                            <th rowspan="2">Tipo</th>
                            <th rowspan="2">V. Unitario</th>
                            <th colspan="2">V. Impuestos</th>    
                            <th rowspan="2">Cantidad Solicitud</th>
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
                            if(isset($_POST["pos"]))
                            {
                                $inicio=$_POST["pos"];
                            }
                            
                            else
                            {
                                $inicio=0;
                            }
                            
                            $cont=0;
                            $listas=$datos->trae_productos($idprovee, $inicio);
                            
                            if (sizeof($listas)>10)
                            {
                                $limit=10;
                            }
                            
                            else
                            {
                                $limit=sizeof($listas);
                            }

                            $cont = 0;
                             
                            foreach ($listas as $producto) 
                            { 
                        ?>
                                <tr>
                                    <td align="center"><input type="checkbox" name="productos[<?php echo $cont; ?>][seleccionado]" onchange="actualizarTotal(<?php echo $cont; ?>, <?php echo $producto['subtotal']; ?>)"></td>
                                    <td align="center"><?php echo $producto['cod_produc']; ?></td>
                                    <td align="center"><?php echo $producto['nombre_prod']; ?></td>
                                    <td align="center"><?php echo $producto['nombre_Tipo']; ?></td>
                                    <td align="right"><?php echo '$' . number_format($producto['val_Unitario'], 2, '.', ','); ?></td>
                                    <td align="center"><?php echo number_format($producto['valor_imp_uno'], 2, '.', ',') . '%'?> </td>
                                    <td align="center"><?php echo number_format($producto['valor_imp_dos'], 2, '.', ',') . '%'?> </td>
                                    <td align="center">
                                        <input class="controles" type="number" name="productos[<?php echo $cont; ?>][cantidad]" id="cantidad<?php echo $cont; ?>" value="0" onchange="actualizarTotal(<?php echo $cont; ?>, <?php echo $producto['subtotal']; ?>)" required>
                                    </td>
                                    <td align="right"><?php echo '$' . number_format($producto['subtotal'], 2, '.', ','); ?></td>
                                    <td align="right">
                                        <div id="total<?php echo $cont; ?>">$0.00</div>
                                    </td>

                                    <!-- agregar un campo oculto para almacenar el ID del producto -->
                                    <input type="hidden" name="productos[<?php echo $cont; ?>][cod_produc]" value="<?php echo $producto['cod_produc']; ?>">
                                    <!-- agregar un campo oculto para almacenar el subtotal del producto -->
                                    <input type="hidden" name="productos[<?php echo $cont; ?>][subtotal]" id="subtotal<?php echo $cont; ?>" value="<?php echo $producto['subtotal']; ?>">
                                </tr>
                            <?php $cont++;
                             } ?>
                     </tbody>
                </table>

                <div class="pagination">
                    <tr>
                        <th colspan="10">
                            <?php
                            if($inicio>0){
                                $anteriores=$inicio-10;
                                ?>
                                <a href="?pos=<?php echo $anteriores;?>" title="Registros Anteriores">Registros Anteriores</a>
                                <?php
                            }
                            ?>
                            &nbsp;&nbsp;||&nbsp;&nbsp;
                            <?php
                            if(count($listas)>10){
                                $proximo=$inicio+10;
                                ?>
                                <a href="?pos=<?php  echo $proximo;?>" title="Próximos Registros">Próximos Registros</a>
                                <?php
                            }
                            ?>
                        </th>
                    </tr>    
                </div>

                <div class="button-container">
                    <button type="submit">Generar Orden de Compra</button>
                    <div class="icono-home">
                        <a href="mostrar_orden_compra.php" title="Lista Ordenes de Compra"> 
                            <img src="imgs/arriba-a-la-izquierda.png" alt="Icono Home">
                        </a>
                    </div>
                </div>
                
            </form>
        </div>
    <?php } ?>
        <script>
        function actualizarTotal(index, subtotal) {
            var cantidad = document.getElementById('cantidad' + index).value;
            var total = subtotal * cantidad;
            document.getElementById('total' + index).innerText = '$' + total.toFixed(2);
        }
    </script>
</body>
</html>
