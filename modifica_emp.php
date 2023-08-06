<?php
include_once('header.php');

if (isset($_POST['envia_datos'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    include_once('includes/acceso.php');
    include_once('clases/empleados.php');
    $conexion = connect_db();
    $oempleado = new Empleados();
    $oempleado->conectar_db($conexion);

    $response = $oempleado->modificarEmpleado($id, $nombre, $telefono);

    if ($response) {
        header("Location: lista_usuario.php");
    } else {
        echo "No se pudo modificar el empleado";
    }
}

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    include_once('includes/acceso.php');
    include_once('clases/empleados.php');
    $conexion = connect_db();
    $oempleado = new Empleados();
    $oempleado->conectar_db($conexion);
    $datos = $oempleado->consultarEmpleado($codigo);
}
?>

<div class="container p-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="modifica_emp.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $codigo; ?>">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono']; ?>">
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
