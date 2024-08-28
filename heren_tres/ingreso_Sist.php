<?php

require_once("class/class.php");

if(isset($_POST['valida'])&& ($_POST['valida'])=="si")
{
    $v1=$_POST["usuario"];
    $v2=$_POST["passwd"]; 
    $tra=new Trabajo();
    $dato=$tra->trae_veri($v1, $v2);
    
    if(!isset($dato[0]['pass_Usua']))
        {
            echo "<script type='text/javascript'>
                alert('Verifique sus Datos... Gracias');
                window.location='ingreso_sist.php';
            </script>";
        }else
        {
            $_SESSION["usuario"]=$dato[0]['Nomb_Usu'];
            
            echo "<script type='text/javascript'>
                alert('Bienvenido al sistema estimado Usuario');
                window.location='mostrar_datos.php';
            </script>";
        }   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/5db38e9727.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/login.css">
</head>
<body>
    <section>
        <div class="main-container">
            <div class="info-section">
                <div class="text-bg">
                    <h1>Gestor de ventas.</h1>
                    <span>Somos un sistema de ventas efectivo que facilita las transacciones comerciales y también mejoramos
                     la eficiencia operativa  proporcionando una experiencia de compra satisfactoria para todos nuestros usuarios, lo cual contribuye al 
                     crecimiento y éxito del negocio en línea.</span>
                    <a class="read_more" href="#">Leer más</a>
                </div>
                <div class="image-section">
                    <figure><img src="images/dinero.png" alt=""/></figure>
                </div>
            </div>
            <div class="form-section">
                <div class="contenedor">
                    <div class="formulario">
                        <h2>Inicio de Sesión</h2>
                        <form action="ingreso_sist.php" method="POST">
                            <input type="hidden" name="valida" value="si">
                            <div class="input-contenedor">
                                <i class="fa-regular fa-envelope"></i>
                                <input type="email" name="usuario" required>
                                <label for="usuario">Login Usuario</label>
                            </div>
                            <div class="input-contenedor">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" name="passwd" required>
                                <label for="passwd">Contraseña</label>
                            </div>
                            <div class="olvidar">
                                <label>
                                    <input type="checkbox">Recordar
                                    <a href="#">Olvidé la contraseña</a>
                                </label>
                            </div>
                            <button type="submit">Acceder</button>
                            <div class="registrar">
                                <p>No tengo cuenta <a href="RegistroNusuario.php">Crear una</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
