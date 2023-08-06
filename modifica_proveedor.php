<?php include_once('header.php'); ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos = $oproveedor->consulta($codigo);
?>

<div class="container p-12">
    <div class="row">
        <div class="card card-body">
            <form action="modifica_prov.php" method="post">
                <div class="form-group">
                    <div class="col-md-4">Código:</div>
                    <div class="col-md-4">
                        <input type="text" name="idproveedor" class="form-control" value="<?php echo $codigo; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Nombre:</div>
                    <div class="col-md-4">
                        <input type="text" name="nom" class="form-control" value="<?php echo $datos['nombre_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Dirección:</div>
                    <div class="col-md-4">
                        <input type="text" name="dir" class="form-control" value="<?php echo $datos['direccion_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">RUC:</div>
                    <div class="col-md-4">
                        <input type="text" name="ruc" class="form-control" value="<?php echo $datos['ruc_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Email:</div>
                    <div class="col-md-4">
                        <input type="text" name="email" class="form-control" value="<?php echo $datos['email_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Teléfono:</div>
                    <div class="col-md-4">
                        <input type="text" name="tel" class="form-control" value="<?php echo $datos['telefono_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Fecha de Registro:</div>
                    <div class="col-md-4">
                        <input type="text" name="fechare" class="form-control" value="<?php echo $datos['fecha_registro_proveedor']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>
