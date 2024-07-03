<?php
session_start();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Guardar el usuario en la sesión
$_SESSION['username'] = $nombre;
$_SESSION['email'] = $email;

// Redirigir al usuario a la página de productos
header('Location: productos.php');
exit;
?>