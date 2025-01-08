<?php
session_start();
include 'conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);
	if($result->num_rows >0){
		$_SESSION['username'] = $username;
		header("Location: ventas.php");
		exit();
	} else{
		echo "nombre de usuario o contraseña incorrectos";
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet"href="estilologin.css">
<meta charset="UTF-8">
<title>LOGIN</title>
</head>

<body>
<br>
<br>
<h2>INICIAR SESION</h2>
<br>
<form method="POST" action="login.php">
<br>
<br>
<input type="text" name="username" required placeholder="&#129489;USUARIO">
<br>
<br>

<input type="password" name="password" required placeholder="&#128274;CONTRASEÑA">
<br>
<br>
<button type="submit"> Ingresar </button>
</form>
</body>
</html>