<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Verificar las credenciales del usuario
    $sql = "SELECT id_usuario, nombre FROM usuarios WHERE email = ? AND contraseña = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $email, $contraseña);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            // Usuario autenticado correctamente, iniciar sesión
            $stmt->bind_result($id, $nombre);
            $stmt->fetch();
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
            header("Location: inicio.php"); // Redirigir al usuario a la página de inicio después del inicio de sesión exitoso
        } else {
            // Credenciales incorrectas
            echo "Email o contraseña incorrectos.";
        }
        $stmt->close();
    }
}
?>