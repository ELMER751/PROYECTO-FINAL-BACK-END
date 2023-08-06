<?php
include('header.php');

if (isset($_POST['envia_datos'])) {
    $nom = strtoupper($_POST['nom']);
    $dir = strtoupper($_POST['dir']);
    $ruc = $_POST['ruc'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $fechare = $_POST['fechare'];

    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    $conexion = connect_db();
    $oproveedor = new Proveedor();
    $oproveedor->conectar_db($conexion);

    $response = $oproveedor->agrega_proveedor($nom, $dir, $ruc, $email, $tel, $fechare);

    if ($response) {
        header("location: lista_proveedor.php");
    } else {
        echo "No se pudo agregar el proveedor";
    }
}
?>
