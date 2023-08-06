<?php include_once('header.php'); ?>
<div class="container p-12">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="agregar_cli.php" method="post">
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre cliente" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="dir" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ruc" class="form-control" placeholder="RUC">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tel" class="form-control" placeholder="Teléfono">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  

<?php
// Include the necessary code for the footer
include_once('footer.php');
?>