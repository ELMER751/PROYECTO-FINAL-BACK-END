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
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos_proveedor = $oproveedor->listaproveedor();
if ($datos_proveedor){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Proveedores...</h4>
        <a href="agrega_prov.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>RUC</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row = mysqli_fetch_array($datos_proveedor)){
        $id = $row['idProveedor'];
        $nom = $row['nombre_proveedor'];
        $ruc = $row['ruc_proveedor'];
        $dir = $row['direccion_proveedor'];
        $tel = $row['telefono_proveedor'];
        $email = $row['email_proveedor'];
        $fechare = $row['fecha_registro_proveedor'];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $ruc; ?></td>
                    <td><?php echo $dir; ?></td>
                    <td><?php echo $tel; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $fechare; ?></td>
                    <td>
                    <a href="modifica_proveedor.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_prov.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
