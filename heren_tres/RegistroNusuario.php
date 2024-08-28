<?php
session_start(); // Iniciar la sesión para usar $_SESSION

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'class/conexion.php'; // Incluir archivo de conexión a la base de datos

    // Obtener los datos del formulario enviado por el método POST
    $login = htmlspecialchars($_POST['login']); // nombre de usuario
    $nombre = htmlspecialchars($_POST['nombre']); // nombre completo
    $nro_identidad = htmlspecialchars($_POST['nro_identidad']); // número de identidad
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Encripta la contraseña usando bcrypt
    $tipo_usuario = $_POST['tipo_usuario']; // Obtener el tipo de usuario seleccionado desde el formulario

    // Crear una instancia de la clase Conexion para establecer la conexión
    $conexion = new Conexion();
    $conn = $conexion->getConexion(); // Obtener la conexión utilizando el método getConexion()

    // Verificar si el usuario ya existe antes de insertar
    $sql_verificar = "SELECT * FROM usuarios_sist WHERE login_Usu = '$login'";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        $error = "El usuario ya está registrado";
    } else {
        // Crear la consulta SQL para insertar un nuevo registro en la tabla usuarios_sist
        $sql_insertar = "INSERT INTO usuarios_sist (login_Usu, Nomb_Usu, nro_Identid, pass_Usua, tipo_Usua) 
                            VALUES ('$login', '$nombre', '$nro_identidad', '$contrasena', '$tipo_usuario')";

        // Ejecutar la consulta SQL y verificar si fue exitosa
        if ($conn->query($sql_insertar) === TRUE) {
            echo "<script type='text/javascript'>
                    alert('Registro exitoso'); // Cambia el texto del mensaje si lo deseas
                    window.location.href = 'ingreso_sist.php'; // Redirigir a la página principal
                </script>";
            exit(); // Asegurarse de que no se ejecute más código después de redirigir
        } else {
            $error = "Error: " . $sql_insertar . "<br>" . $conn->error; // Si hay un error en la consulta, muestra el mensaje de error y el detalle específico
        }
    }
    // Cerrar la conexión a la base de datos después de ejecutar la consulta
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="estilos/formularioRe.css">
</head>
<body>
    <div class="contenedor">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formulario">
            <h2>Registro de usuario</h2>

            <?php if(isset($error)) { ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>

            <div class="input-contenedor">
                <input type="text" id="login" name="login" required value="<?php echo isset($login) ? htmlspecialchars($login) : ''; ?>" autocomplete="off">
                <label for="login">Nombre de Usuario:</label>
            </div>

            <div class="input-contenedor">
                <input type="text" id="nombre" name="nombre" required value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" autocomplete="off">
                <label for="nombre">Nombre Completo:</label>
            </div>

            <div class="input-contenedor">
                <input type="number" id="nro_identidad" name="nro_identidad" required value="<?php echo isset($nro_identidad) ? htmlspecialchars($nro_identidad) : ''; ?>" autocomplete="off">
                <label for="nro_identidad">Número de Identidad:</label>
            </div>

            <div class="input-contenedor">
                <input type="password" id="contrasena" name="contrasena" required autocomplete="off">
                <label for="contrasena">Contraseña:</label>
            </div>

            <div class="input-contenedor">
                <select id="tipo_usuario" name="tipo_usuario" required autocomplete="off">
                    <option value="1">Mensajero</option>
                    <option value="2">Bodeguero</option>
                    <option value="3">Almacenista</option>
                </select>

                <label for="tipo_usuario">Tipo de Usuario:</label>
            </div>

            <button type="submit" name="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
