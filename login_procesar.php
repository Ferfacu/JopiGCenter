<?php
session_start();
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT id_usuario, nombre, contraseña FROM usuarios WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $nombre, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($contraseña, $hashed_password)) {
                $_SESSION['id'] = $id;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['username'] = $nombre;

                $stmt->close();
                
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 1000);
                     </script>';
                exit();
            } else {
                $_SESSION['error_message'] = "Contraseña incorrecta.";
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Email no encontrado.";
            header("Location: login.php");
            exit();
        }
        $stmt->close();
    }
}
?>
