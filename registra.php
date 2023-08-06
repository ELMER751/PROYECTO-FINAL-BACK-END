<?php


if (isset($_POST['registra'])){
    $nom = $_POST['Nombre_d_Usuario'];
    $pas = $_POST['Contraseñaa'];

    
    include_once('includes/acceso.php');
    include_once('clases/registra_usua.php');
    $conexion = connect_db();
    $oproduct = new Registro();
    $oproduct->conectar_db($conexion);
    
    $response = $oproduct->registrar_usuario($nom,$pas);

    if($response) {
        header("location: ingresar_sesion.php");
    } else
    header("location: registra_usuario.php");
    echo "No se pudo agregar el producto";
    
}
else{

    $nom =$_POST['Nombre_d_Usuario'];
    $pas = $_POST['Contraseñaa'];

    
    include_once('includes/acceso.php');
    include_once('clases/registra_usua.php');
    $conexion = connect_db();
    $oproduct = new Registro();
    $oproduct->conectar_db($conexion);
    
    $response = $oproduct->registrar_usuario($nom,$pas);

    if($response) {
        header("location: ingresar_sesion.php");
    } else
    header("location: registra_usuario.php");
    echo "No se pudo agregar el producto";
}
?>