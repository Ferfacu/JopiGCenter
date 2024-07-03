<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$total = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $cvv = $_POST['cvv'];

    // Aquí puedes añadir la lógica para procesar el pago con la pasarela de pagos que elijas.

    // Si el pago es exitoso, puedes vaciar el carrito.
    $_SESSION['carrito'] = [];

    header('Location: confirmacion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Jopi G Center</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php"><img src="img/logo1.png" width="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Cerrar Sesión</a>
            </li>
            <?php if (isset($_SESSION['username'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registrarse</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="carrito.php">
                    <i class="fas fa-shopping-cart"></i> Carrito
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Formulario de pago -->
<div class="container mt-5">
    <h1>Checkout</h1>
    <form method="post" action="checkout.php">
        <div class="form-group">
            <label for="nombre">Nombre en la Tarjeta:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="numero_tarjeta">Número de Tarjeta:</label>
            <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required>
        </div>
        <div class="form-group">
            <label for="fecha_expiracion">Fecha de Expiración:</label>
            <input type="text" class="form-control" id="fecha_expiracion" name="fecha_expiracion" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
        </div>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>