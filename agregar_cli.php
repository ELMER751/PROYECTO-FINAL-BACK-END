<?php
include('header.php');

if (isset($_POST['envia_datos'])) {
    $nom = strtoupper($_POST['nom']);
    $dir = strtoupper($_POST['dir']);
    $ruc = $_POST['ruc'];
    $tel = $_POST['tel'];

    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $cliente = new Cliente();
    $cliente->conectar_db($conexion);

    $response = $cliente->agrega_cliente($nom, $dir, $ruc, $tel);

    if ($response) {
        header("location: lista_cliente.php");
        exit();
    } else {
        echo "No se pudo agregar el cliente";
    }
}
?>