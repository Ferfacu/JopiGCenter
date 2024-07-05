<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Verificar las credenciales del usuario
    $sql = "SELECT id_usuario, nombre, contraseña FROM usuarios WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            // Usuario encontrado, verificar la contraseña
            $stmt->bind_result($id, $nombre, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($contraseña, $hashed_password)) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['id'] = $id;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['welcome_message'] = "Bienvenido, $nombre.";
                // Cerrar la consulta preparada
                $stmt->close();
                
                // Retraso de 1 segundos antes de redirigir
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "perfil.php";
                        }, 1000); // 1000 milisegundos = 1 segundos
                     </script>';
                exit();
            } else {
                // Contraseña incorrecta
                $_SESSION['error_message'] = "Contraseña incorrecta.";
                header("Location: login.php");
                exit();
            }
        } else {
            // Email no encontrado
            $_SESSION['error_message'] = "Email no encontrado.";
            header("Location: login.php");
            exit();
        }
        $stmt->close();
    }
}
?>