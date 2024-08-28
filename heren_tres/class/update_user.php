<?php
include 'class/conexion.php';

// Verificar si se recibió un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Crear una instancia de la clase Conexion para establecer la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion();

    // Consulta SQL para obtener los datos del usuario específico
    $sql_select = "SELECT * FROM usuarios_sist WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql_select);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
    } else {
        // Si no se encontró el usuario, redirigir o mostrar un mensaje de error
        echo "<script>alert('Usuario no encontrado'); window.location.href='read_users.php';</script>";
        exit();
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conn->close();
} else {
    // Si no se recibió un ID válido por GET, redirigir o mostrar un mensaje de error
    echo "<script>alert('ID de usuario no válido'); window.location.href='read_users.php';</script>";
    exit();
}

// Función para obtener el tipo de usuario según el valor numérico
function obtenerTipoUsuario($tipo) {
    switch ($tipo) {
        case 1:
            return 'Mensajero';
        case 2:
            return 'Bodeguero';
        case 3:
            return 'Almacenista';
        default:
            return 'Desconocido';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="estilos/formularioRe.css">
</head>
<body>
    <div class="contenedor">
        <h2>Actualizar Usuario</h2>

        <form action="update_user.php" method="POST" class="formulario">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id_usuario']); ?>">

            <div class="input-contenedor">
                <input type="text" id="login" name="login" required value="<?php echo htmlspecialchars($usuario['login_Usu']); ?>" autocomplete="off">
                <label for="login">Nombre de Usuario:</label>
            </div>

            <div class="input-contenedor">
                <input type="text" id="nombre" name="nombre" required value="<?php echo htmlspecialchars($usuario['Nomb_Usu']); ?>" autocomplete="off">
                <label for="nombre">Nombre Completo:</label>
            </div>

            <div class="input-contenedor">
                <input type="number" id="nro_identidad" name="nro_identidad" required value="<?php echo htmlspecialchars($usuario['nro_Identid']); ?>" autocomplete="off">
                <label for="nro_identidad">Número de Identidad:</label>
            </div>

            <div class="input-contenedor">
                <input type="password" id="contrasena" name="contrasena" autocomplete="off">
                <label for="contrasena">Nueva Contraseña:</label>
                <small>Dejar en blanco si no se desea cambiar</small>
            </div>

            <div class="input-contenedor">
                <select id="tipo_usuario" name="tipo_usuario" required autocomplete="off">
                    <option value="1" <?php echo $usuario['tipo_Usua'] == 1 ? 'selected' : ''; ?>>Mensajero</option>
                    <option value="2" <?php echo $usuario['tipo_Usua'] == 2 ? 'selected' : ''; ?>>Bodeguero</option>
                    <option value="3" <?php echo $usuario['tipo_Usua'] == 3 ? 'selected' : ''; ?>>Almacenista</option>
                </select>
                <label for="tipo_usuario">Tipo de Usuario:</label>
            </div>

            <button type="submit" name="submit">Actualizar Usuario</button>
        </form>
    </div>
</body>
</html>
