<?php
include 'class/conexion.php';

// Crear una instancia de la clase Conexion para establecer la conexión
$conexion = new Conexion();
$conn = $conexion->getConexion();

// Consulta SQL para obtener todos los usuarios
$sql_select = "SELECT id_usuario, login_Usu, Nomb_Usu, nro_Identid, tipo_Usua FROM usuarios_sist";
$resultado = $conn->query($sql_select);

// Cerrar la conexión a la base de datos
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 8px;
            border: 1px solid #000;
        }

        th {
            background-color: #CEEFF9;
        }

        .right-align {
            text-align: right;
        }

        .center-align {
            text-align: center;
        }

        .form-actions {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h2>Listado de Usuarios</h2>
        <a href="RegistroNusuario.php">Crear Nuevo Usuario</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Nombre</th>
                <th>Número de Identidad</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
            </tr>
            <?php while($usuario = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo isset($usuario['id_usuario']) ? $usuario['id_usuario'] : ''; ?></td>
                    <td><?php echo isset($usuario['login_Usu']) ? $usuario['login_Usu'] : ''; ?></td>
                    <td><?php echo isset($usuario['Nomb_Usu']) ? $usuario['Nomb_Usu'] : ''; ?></td>
                    <td><?php echo isset($usuario['nro_Identid']) ? $usuario['nro_Identid'] : ''; ?></td>
                    <td><?php echo isset($usuario['tipo_Usua']) ? obtenerTipoUsuario($usuario['tipo_Usua']) : ''; ?></td>
                    <td>
                        <a href="update_user.php?id=<?php echo isset($usuario['id_usuario']) ? $usuario['id_usuario'] : ''; ?>">Editar</a>
                        <a href="delete_user.php?id=<?php echo isset($usuario['id_usuario']) ? $usuario['id_usuario'] : ''; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php
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
