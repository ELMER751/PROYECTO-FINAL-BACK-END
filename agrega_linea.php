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
    $nombre = $_POST['nombre'];

    // Validar los datos (puedes agregar tus propias validaciones aquí)

    // Agregar la línea a la base de datos
    if ($linea->agregarlinea($nombre)) {
        // La línea se agregó correctamente
        header("Location: lista_linea.php");
        exit();
    } else {
        // Ocurrió un error al agregar la línea
        echo "Error al agregar la línea.";
    }
}
?>

<!-- HTML del formulario para agregar una línea -->
<form method="POST" action="">
    <div class="form-group">
        <label for="nombre">Nombre de la Línea:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Agregar Línea</button>
</form>