<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $nombre, $email, $password);
        if ($stmt->execute()) {
            $_SESSION['welcome_message'] = "Registro exitoso. Bienvenido!";
            header("Location: login.php");
        } else {
            $_SESSION['error_message'] = "Error en el registro.";
            header("Location: registro.php");
        }
        $stmt->close();
    }
}
?>
