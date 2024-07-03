<?php
session_start();
$productos = [
    ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 10.00, 'descripcion' => 'Descripción del producto 1'],
    ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 20.00, 'descripcion' => 'Descripción del producto 2'],
    ['id' => 3, 'nombre' => 'Producto 3', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 3'],
];

if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    $producto_encontrado = false;

    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            $producto_encontrado = true;
            $producto_agregar = $producto;
            break;
        }
    }

    if ($producto_encontrado) {
        $producto_agregar['cantidad'] = $cantidad;

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $producto_existe = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $producto_agregar['id']) {
                $item['cantidad'] += $cantidad;
                $producto_existe = true;
                break;
            }
        }

        if (!$producto_existe) {
            $_SESSION['carrito'][] = $producto_agregar;
        }
    }

    header('Location: productos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Jopi G Center</title>
    <!-- Bootstrap CSS -->
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

<!-- Listado de productos -->
<div class="container mt-5">
    <h1>Productos</h1>
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($producto['precio']); ?>$</p>
                        <form method="post" action="productos.php">
                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" class="form-control" name="cantidad" value="1" min="1">
                            </div>
                            <button type="submit" name="agregar" class="btn btn-primary">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>