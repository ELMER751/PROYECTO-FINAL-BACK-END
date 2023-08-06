<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/Registro_Ventas.php');
$conexion = connect_db();
$documento = new Registro_Ventas();
$documento->conectar_db($conexion);
$res = $documento->borrar($codigo);
if ($res) {
    header("Location: lista_docu.php");
} else {
    echo "Error: No se pudo eliminar el documento.";
}
?>
