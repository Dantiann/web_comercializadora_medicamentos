<?php
require_once("class.php");

$datos = new Trabajo();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $proveedor = $_POST["proveedor"];
    $representante = $_POST["representante"];
    $fecha = $_POST["fecha"];
    $estadoCompra = $_POST["estadoCompra"];
    $solicitante = $_POST["solicitante"];
    $productos = $_POST["productos"];

    $idCompra = $datos->insertarOrdenCompra($proveedor, $representante, $fecha, $estadoCompra, $solicitante, $productos);

    // Redirigir a la página de éxito o realizar otras acciones
    header("mostrar_orden_compra.php?idCompra=$idCompra");
}

?>