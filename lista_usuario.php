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
include_once('clases/registra_usua.php');

$conexion = connect_db();
$oempleado = new Registro();
$oempleado->conectar_db($conexion);
$datos_emp = $oempleado->listaprodu();

if ($datos_emp) {
    ?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Usuarios</h4>
                <a href="registra_usuario.php" class="btn btn-info add-new">Nuevo</a>
            </div>  
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre de Usuario</th>
                            <th>Contraseña</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($datos_emp)) { 
                            $id = $row["id"];
                            ?>
                            <tr>
                                <td><?php echo $row['usario']; ?></td>
                                <td><?php echo $row['contraseña']; ?></td>
                                <td>  
                                    <a href="elimina_emp.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
include_once('footer.php');
?>
