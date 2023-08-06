
<!DOCTYPE html>
<html>
<head>
<title>Iniciar Sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.win.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/loginn.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="wrapper">
 <form method="POST" action="ingresar.php">
 <h1> Ingresar </h1>
<div class="input-box">
<input id="Nombre_de_Usuario"type="text" name = "Nombre_de_Usuario" placeholder="Nombre de Usuario" required>
</div>
<div class="input-box">
<input id="Contraseña"type="password" name = "Contraseña" placeholder="Contraseña" required>
</div>
<div class="remember-forgot">
<label><input type="checkbox"> Recordar</label>
<a href="recu.php">¿Olvidaste tu contraseña?</a>
</div>
<button type="submit" value="ingresar "class="btn">Ingresar</button>

<div class="register-link">
<p>¿No tienes una cuenta? <a href="registra_usuario.php">Registrar</a></p>
</div>
</form>
</body>
</html>