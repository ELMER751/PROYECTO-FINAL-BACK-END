<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$documento = new documentos();
$documento->conectar_db($conexion);
$datos = $documento->consultarDocumento($codigo);
?>

<div class="container p-12">
    <div class="row">
        <div class="card card-body">
            <form action="modifica_doc.php" method="post">
                <div class="form-group">
                    <div class="col-md-4">Código:</div>
                    <div class="col-md-4">
                        <input type="text" name="idDocumento" class="form-control" value="<?php echo $codigo; ?>" readonly>
                    </div>
                    <div class="col-md-4">Nombre:</div>
                    <div class="col-md-4">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('footer.php') ?>
