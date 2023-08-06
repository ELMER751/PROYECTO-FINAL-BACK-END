<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ingresar_sesion.php");
    exit();
}
?>
<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');

$conexion = connect_db();
$olinea = new Linea();
$olinea->conectar_db($conexion);

$datos_linea = $olinea->listalinea();

if ($datos_linea){
    ?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Líneas</h4>
                <a href="agrega_linea.php" class="btn btn-info add-new">Nuevo</a>
            </div>
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre de la Línea</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($datos_linea)){
                            $id = $row["idLinea"];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td>
                                    <a href="modifica_linea.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>
                                    <a href="elimina_linea.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>
