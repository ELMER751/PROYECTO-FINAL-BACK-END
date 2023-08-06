<?php
include('clases/Registro_Ventas.php');
include_once('includes/acceso.php');
if (isset($_POST['registra'])){
    // Obtener los valores del formulario
    $vendedor = strtoupper($_POST['Usuario']);
    $documento = $_POST['Documento'];
    $nor_venta = $_POST['Nro'];
    $cliente = $_POST['Cliente'];
    $tipo_venta = $_POST['Tipo_Venta'];
    $fecha = $_POST['Fecha'];
    $conexion = connect_db();
    $oproducto = new Registro_Ventas();
    $oproducto->conectar_db($conexion);
    
    $response = $oproducto->agrega_registro($vendedor,$documento,$nor_venta,$cliente,$tipo_venta,$fecha);

    // Cerrar la conexión
    mysqli_close($conexion);

    if ($response) {
        header("location: lista_producto.php");
    } else {
        echo "No se pudo agregar la venta";
    }
}
else{
    // Obtener los valores del formulario
    $vendedor = strtoupper($_POST['Usuario']);
    $documento = $_POST['Documento'];
    $nor_venta = $_POST['Nro'];
    $cliente = $_POST['Cliente'];
    $tipo_venta = $_POST['Tipo_Venta'];
    $fecha = $_POST['Fecha'];
    
    $conexion = connect_db();
    $oproducto = new Registro_Ventas();
    $oproducto->conectar_db($conexion);
    
    $response = $oproducto->agrega_registro($vendedor,$documento,$nor_venta,$cliente,$tipo_venta,$fecha);


    if ($response) {
        header("location: lista_producto.php");
    } else {
        echo "No se pudo agregar la venta";
    }
}
?>