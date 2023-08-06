<?php include_once('header.php'); ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$cliente = new Cliente();
$cliente->conectar_db($conexion);
$datos = $cliente->consulta($codigo);
?>

<div class="container p-12">
    <div class="row">
        <div class="card card-body">
            <form action="modifica_cli.php" method="post">
                <div class="form-group">
                    <div class="col-md-4">Código:</div>
                    <div class="col-md-4">
                        <input type="text" name="idcliente" class="form-control" value="<?php echo $codigo; ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Nombre:</div>
                    <div class="col-md-4">
                        <input type="text" name="nom" class="form-control" value="<?php echo $datos['nombre']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Dirección:</div>
                    <div class="col-md-4">
                        <input type="text" name="dir" class="form-control" value="<?php echo $datos['dircliente']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">RUC:</div>
                    <div class="col-md-4">
                        <input type="text" name="ruc" class="form-control" value="<?php echo $datos['ruc']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">Teléfono:</div>
                    <div class="col-md-4">
                        <input type="text" name="tel" class="form-control" value="<?php echo $datos['telcliente']; ?>">
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

<?php

include_once('footer.php');
?>
