<?php
session_start();

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    $carrito_vacio = true;
} else {
    $carrito_vacio = false;
}

function calcular_total($carrito) {
    $total = 0;
    foreach ($carrito as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }
    return $total;
}

if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['carrito'] as $key => $producto) {
        if ($producto['id'] == $id) {
            unset($_SESSION['carrito'][$key]);
        }
    }
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
    header('Location: carrito.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Jopi G Center</title>
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

<!-- Contenido del carrito -->
<div class="container mt-5">
    <h1>Carrito de Compras</h1>
    <?php if ($carrito_vacio): ?>
        <p>Tu carrito está vacío.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['carrito'] as $producto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio']); ?>$</td>
                        <td><?php echo htmlspecialchars($producto['cantidad']); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio'] * $producto['cantidad']); ?>$</td>
                        <td>
                            <form method="post" action="carrito.php">
                                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-right">
            <h4>Total: <?php echo calcular_total($_SESSION['carrito']); ?>$</h4>
            <a href="checkout.php" class="btn btn-primary">Proceder al Pago</a>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>