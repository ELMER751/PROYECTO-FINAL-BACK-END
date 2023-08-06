<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');

// Verificar si se envió el formulario
if (isset($_POST['submit'])) {
    $conexion = connect_db(); // Obtener la conexión a la base de datos
    $linea = new Linea();
    $linea->conectar_db($conexion);

    // Obtener los datos del formulario
    $idLinea = $_POST['idLinea'];
    $nombre = $_POST['nombre'];

    // Validar los datos (puedes agregar tus propias validaciones aquí)

    // Modificar la línea en la base de datos
    if ($linea->modificarlinea($idLinea, $nombre)) {
        // Redirigir al listado de líneas si se modificó correctamente
        header("Location: lista_linea.php");
        exit();
    } else {
        // Ocurrió un error al modificar la línea, puedes mostrar un mensaje de error o redirigir a una página de error
        echo "Error al modificar la línea.";
    }
}

// Obtener el id de la línea a modificar
if (isset($_GET['codigo'])) {
    $conexion = connect_db(); // Obtener la conexión a la base de datos
    $linea = new Linea();
    $linea->conectar_db($conexion);
    $idLinea = $_GET['codigo'];

    // Obtener los datos de la línea
    $datos_linea = $linea->obtenerlinea($idLinea);

    // Verificar si se encontró la línea
    if ($datos_linea) {
        $nombre = $datos_linea['nombre'];
    } else {
        // Redirigir al listado de líneas si no se encontró la línea
        header("Location: lista_linea.php");
        exit();
    }
} else {
    // Redirigir al listado de líneas si no se proporcionó el id de la línea
    header("Location: lista_linea.php");
    exit();
}
?>

<!-- HTML del formulario para modificar una línea -->
<form method="POST" action="">
    <input type="hidden" name="idLinea" value="<?php echo $idLinea; ?>">
    <div class="form-group">
        <label for="nombre">Nombre de la Línea:</label>
        <input type="text" name="nombre" class="form-control" required value="<?php echo $nombre; ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Guardar Cambios</button>
</form>