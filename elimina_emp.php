<?php
include_once('includes/acceso.php');
include_once('clases/registra_usua.php');
$conexion = connect_db();
$oempleado = new Registro();
$oempleado->conectar_db($conexion);

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    $response = $oempleado->borrar($codigo);

    if ($response) {
        header("Location: lista_usuario.php");
    } else {
        echo "No se pudo eliminar el empleado";
    }
}
?>
