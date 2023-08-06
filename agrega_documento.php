<?php
include('header.php');

if (isset($_POST['envia_datos'])) {
    $nom = strtoupper($_POST['nom']);

    include_once('includes/acceso.php');
    include_once('clases/documento.php');
    $conexion = connect_db();
    $documento = new Documentos();
    $documento->conectar_db($conexion);

    $response = $documento->agregarDocumento($nom);

    if ($response) {
        header("location: lista_docu.php");
    } else {
        echo "No se pudo agregar el documento";
    }
}
?>
