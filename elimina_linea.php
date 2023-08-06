<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');

// Verificar si se proporcionó el id de la línea
if (isset($_GET['codigo'])) {
    $conexion = connect_db(); // Obtener la conexión a la base de datos
    $linea = new Linea();
    $linea->conectar_db($conexion);
    $idLinea = $_GET['codigo'];

    // Eliminar la línea de la base de datos
    if ($linea->eliminarlinea($idLinea)) {
        // La línea se eliminó correctamente
        header("Location: lista_linea.php");
        exit();
    } else {
        // Ocurrió un error al eliminar la línea
        echo "Error al eliminar la línea.";
    }
} else {
    // Redirigir al listado de líneas si no se proporcionó el id de la línea
    header("Location: lista_linea.php");
    exit();
}
?>