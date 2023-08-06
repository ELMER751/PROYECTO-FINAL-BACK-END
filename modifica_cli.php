<?php
include('header.php');
if (isset($_POST['envia_datos'])) {
    $id = $_POST['idcliente'];
    $nom = strtoupper($_POST['nom']);
    $dir = strtoupper($_POST['dir']);
    $ruc = $_POST['ruc'];
    $tel = $_POST['tel'];
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $cliente = new Cliente();
    $cliente->conectar_db($conexion);
    $response = $cliente->modifica_cliente($id, $nom, $ruc, $dir, $tel);

    // Handle the response
    if ($response) {
        header("location: lista_cliente.php");
    } else {
        echo "No se pudo modificar el cliente";
    }
}
?>
