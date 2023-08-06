<?php
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sis_ventas";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

$nombre = $_POST['Nombre_de_Usuario'];
$pass = $_POST['Contraseña'];
$query = mysqli_query($conn, "SELECT * FROM login WHERE usario = '".$nombre."' AND contraseña = '".$pass."'");
$nr = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);
$passs = $row['contraseña'];

if ($nr == 1) {

    if (($pass == $passs)) {
        // Credenciales válidas, iniciar sesión
        $_SESSION['username'] = $row['usario'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: lista_docu.php");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta. <a href='ingresar_sesion.php'>Volver</a>";
    }
} else if ($nr == 0) {
    // Usuario no encontrado
    echo "Usuario no encontrado. <a href='ingresar_sesion.php'>Volver</a>";
}

$conn->close();
?>