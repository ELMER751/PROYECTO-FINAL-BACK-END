<?php
include_once('header.php');

if (isset($_POST['envia_datos'])) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    include_once('includes/acceso.php');
    include_once('clases/empleados.php');
    $conexion = connect_db();
    $oempleado = new Empleados();
    $oempleado->conectar_db($conexion);

    $response = $oempleado->agregarEmpleado($nombre, $telefono);

    if ($response) {
        header("Location: lista_usuario.php");
    } else {
        echo "No se pudo agregar el empleado";
    }
}
?>

<div class="container p-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="agrega_emp.php" method="post">
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del empleado" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>
