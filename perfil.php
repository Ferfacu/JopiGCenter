<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!-- Sección productos -->
<?php
    session_start();
    $productos = [
    ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 10.00, 'descripcion' => 'Descripción del producto 1'],
    ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 20.00, 'descripcion' => 'Descripción del producto 2'],
    ['id' => 3, 'nombre' => 'Producto 3', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 3'],
    ['id' => 4, 'nombre' => 'Producto 4', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 4'],
    ['id' => 5, 'nombre' => 'Producto 5', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 5'],
    ['id' => 6, 'nombre' => 'Producto 6', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 6'],
    ['id' => 7, 'nombre' => 'Producto 7', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 7'],
    ['id' => 8, 'nombre' => 'Producto 8', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 8'],
    ['id' => 9, 'nombre' => 'Producto 9', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 9'],
    ['id' => 10, 'nombre' => 'Producto 10', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 10'],
    ['id' => 11, 'nombre' => 'Producto 11', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 11'],
    ['id' => 12, 'nombre' => 'Producto 12', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 12'],
    ['id' => 13, 'nombre' => 'Producto 13', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 13'],
    ['id' => 14, 'nombre' => 'Producto 14', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 14'],
    ['id' => 15, 'nombre' => 'Producto 15', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 15'],
    ['id' => 16, 'nombre' => 'Producto 16', 'precio' => 30.00, 'descripcion' => 'Descripción del producto 16'],
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

        header('Location: carrito.php');
        exit;
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body{
        background-image: url('img/fondo2.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
      
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Nombre de tu Sitio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Inicio</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carusel de imagenes -->
    <div class="container mt-5">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/carusel1.jpeg" class="d-block w-100" alt="carusel1">
            </div>
            <div class="carousel-item">
            <img src="img/carusel2.jpeg" class="d-block w-100" alt="carusel2">
            </div>
            <div class="carousel-item">
            <img src="img/carusel3.jpeg" class="d-block w-100" alt="carusel3">
            </div>
            <div class="carousel-item">
            <img src="img/carusel4.jpeg" class="d-block w-100" alt="carusel4">
            </div>
            <div class="carousel-item">
            <img src="img/carusel5.jpeg" class="d-block w-100" alt="carusel5">
            </div>
            <div class="carousel-item">
            <img src="img/carusel6.jpeg" class="d-block w-100" alt="carusel6">
            </div>
            <div class="carousel-item">
            <img src="img/carusel7.jpeg" class="d-block w-100" alt="carusel7">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

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

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center mt-5 py-3">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Jopi G Center 2024 Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>