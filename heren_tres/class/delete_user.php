<?php
include 'class/conexion.php';

// Inicializar variable para mensaje de confirmación
$confirmacion = '';

// Verificar si se recibió un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Crear una instancia de la clase Conexion para establecer la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Consulta SQL para verificar la existencia del usuario
    $sql_select = "SELECT * FROM usuarios_sist WHERE id_usuario = $id_usuario";
    $resultado_select = $conn->query($sql_select);

    if ($resultado_select->num_rows > 0) {
        // Usuario encontrado, proceder con la eliminación
        $sql_delete = "DELETE FROM usuarios_sist WHERE id_usuario = $id_usuario";

        // Ejecutar la consulta de eliminación
        if ($conn->query($sql_delete) === TRUE) {
            // Mensaje de confirmación
            $confirmacion = "Usuario eliminado correctamente";

            // Redireccionar a read_users.php después de 2 segundos
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'read_users.php';
                    }, 2000); // 2 segundos
                  </script>";
        } else {
            echo "Error al eliminar usuario: " . $conn->error;
        }
    } else {
        // Si no se encontró el usuario, mostrar un mensaje de error
        echo "No se encontró el usuario con el ID especificado";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibió un ID válido por GET, mostrar un mensaje de error
    echo "ID de usuario no válido";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
</head>
<body>
    <div class="contenedor">
       
        <p><?php echo $confirmacion; ?></p>
    </div>
</body>
</html>

