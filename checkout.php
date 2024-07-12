<?php
session_start();
require 'conexion.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$productos = [];
$total = 0;

if (!empty($carrito)) {
    $ids = implode(',', array_keys($carrito));
    $sql = "SELECT * FROM productos WHERE id_producto IN ($ids)";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $row['cantidad'] = $carrito[$row['id_producto']];
        $productos[] = $row;
        $total += $row['precio'] * $carrito[$row['id_producto']];
    }
}

// Guardar el total del pedido en la sesión
$_SESSION['total_pedido'] = $total;

// Verificar si el usuario está autenticado y obtener su ID de usuario (sustituye esto con tu lógica de autenticación)
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

if (!$id_usuario) {
    // Manejar el caso cuando el usuario no está autenticado
    echo "Error: Usuario no autenticado.";
    exit;
}

// Redirigir a confirmacion.php después de establecer todas las variables de sesión necesarias
header("Location: confirmacion.php");
exit;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Inicio.php">Inicio</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="somos.php">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactenos.php">Contáctenos</a>
                    </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php">Registrarse</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="carrito.php">
                        <i class="fas fa-shopping-cart"></i> Carrito
                        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
                            <span class="badge badge-pill badge-danger"><?php echo count($_SESSION['carrito']); ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container mt-5">
        <h3 class="text-center">Checkout</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td>$<?php echo $producto['precio']; ?></td>
                        <td>$<?php echo $producto['precio'] * $producto['cantidad']; ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td>$<?php echo $total; ?></td>
                </tr>
            </tbody>
        </table>
        <form action="confirmacion.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            <button type="submit" class="btn btn-primary">Confirmar Compra</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
