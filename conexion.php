<?php
$servername ='localhost:3306'; 
$username = 'root';
$password = '';
$dbname = 'jopi';

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequear la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>