<?php
require_once("class.php");

if(!isset($_GET["id"]))
{
    echo "<script type='text/javascript'>
            alert('Debe indicar el código del cliente');
            window.location='../mostrar_representante_provee.php';
          </script>";
}
else 
{
    $v1 = $_GET["id"];
    $campos = new Trabajo();

    // Verificar permisos del usuario
    if(isset($_GET["conf"]) && $_GET["conf"] == "si")
    {
        $resultado = $campos->elimina_represProvee($v1);
        if($resultado) 
        {
            echo "<script type='text/javascript'>
                    alert('El registro se eliminó correctamente');
                    window.location='../mostrar_representante_provee.php';
                  </script>";
        }
        else
        {
            echo "<script type='text/javascript'>
                    alert('Error al eliminar el registro');
                    window.location='../mostrar_representante_provee.php';
                  </script>";
        }
    }
    else
    {
        // Mostrar confirmación al usuario
        echo "<script type='text/javascript'>
                if(confirm('¿Está seguro de que desea eliminar este registro?')) {
                    window.location='elimina_represe_provee.php?id=".$v1."&conf=si';
                } else {
                    window.location='../mostrar_representante_provee.php';
                }
              </script>";
    }
}
?>
