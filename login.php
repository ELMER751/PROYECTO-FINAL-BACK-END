<?php
include_once ('includes/acceso.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

   <body>
    <form method="post" antion="lo.php">
        <table>
        <tr><td colspan="2"><label>Iniciar Sesión</td></tr>
        <tr><td aling="center" rowspan="5"><img src="img/SV.png"></td><td><label>Usario</td></tr>
        <tr><td><input type="text" name="usuario"/></td></tr>
        <tr><td><label>Contraseña</label></td></tr>
        <tr><td><input type="contraseña" name="contraseña"/></td></tr>
        <tr><td><input type="submit" value="ingresar"/></td></tr>
</table>
</form>
</body> 

    
</html>
