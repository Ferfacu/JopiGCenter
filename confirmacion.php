<?php
session_start();

// Verificar si las claves están definidas en la sesión
if (!isset($_SESSION['id_usuario']) || !isset($_SESSION['total_pedido'])) {
    // Manejo del error si las claves no están definidas
    echo "Error: Datos de sesión no disponibles.";
    exit;
}

// Obtener los datos de sesión
$id_usuario = $_SESSION['id_usuario'];
$total_pedido = $_SESSION['total_pedido'];

// Preparar la consulta SQL para insertar en la tabla pedidos
$sql = "INSERT INTO pedidos (id_usuario, total) VALUES (?, ?)";

// Conectar a la base de datos (reemplaza estos valores con tus datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jopi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Preparar y ejecutar la consulta usando sentencias preparadas
$stmt = $conn->prepare($sql);
$stmt->bind_param("id", $id_usuario, $total_pedido);

if ($stmt->execute()) {
    // Éxito al insertar el pedido
    echo "Pedido registrado correctamente.";
    // Limpiar la sesión o realizar otras acciones necesarias
    unset($_SESSION['carrito']); // Limpiar carrito, por ejemplo
} else {
    // Error al ejecutar la consulta
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();
?>
