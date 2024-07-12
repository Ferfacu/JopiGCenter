<?php
session_start();
?>

<!-- Sección productos -->
    <?php
    $productos = [
    ['id' => 1, 'precio' => 80.00, 'descripcion' => 'Acetazolamida 250mg Tableta cjax100 AC farma', 'imagen' => 'img/productos/acetazolamida.jpg'],
    ['id' => 2, 'precio' => 24.40, 'descripcion' => 'Aci-Tip 800mg-60mg/10ml Suspensión – Frasco 200 ML', 'imagen' => 'img/productos/acitip.jpg'],
    ['id' => 3, 'precio' => 90.00, 'descripcion' => 'Amiodarona 200mg Tableta Recubierta cjax100 AC Farma', 'imagen' => 'img/productos/amiodarona.jpg'],
    ['id' => 4, 'precio' => 0.95, 'descripcion' => 'Anaflex Mujer NF 200mg Cápsula Blanda', 'imagen' => 'img/productos/anaflex.jpg'],
    ['id' => 5, 'precio' => 410.00, 'descripcion' => 'ANTIAF 2.5 MG CAJA X 100 TAB RECUB', 'imagen' => 'img/productos/antiaf.jpg'],
    ['id' => 6, 'precio' => 18.00, 'descripcion' => 'Banes Forte 200Mg/5Ml Suspensión Oral', 'imagen' => 'img/productos/banes.jpg'],
    ['id' => 7, 'precio' => 25.80, 'descripcion' => 'Bedoyecta Tri Solución Inyectable', 'imagen' => 'img/productos/bedoyecta.jpg'],
    ['id' => 8, 'precio' => 60.00, 'descripcion' => 'Bisacodilo 5mg Tabletas Cjax100 AC Farma', 'imagen' => 'img/productos/bisacodilo.jpg'],
    ['id' => 9, 'precio' => 27.60, 'descripcion' => 'Bismutol 87.33mg /5ml Suspensión Oral Sin Azúcar – Frasco 340 ML', 'imagen' => 'img/productos/bismutol.jpg'],
    ['id' => 10, 'precio' => 30.00, 'descripcion' => 'Bonazol 20 Mg – Caja 30 UN', 'imagen' => 'img/productos/bonazol.jpg'],
    ['id' => 11, 'precio' => 85.00, 'descripcion' => 'Castatina 500mg (Citicolina) Tableta – Cajax 10und', 'imagen' => 'img/productos/castatina.jpg'],
    ['id' => 12, 'precio' => 80.00, 'descripcion' => 'Cetirizina IQ 10mg Tableta Recubierta', 'imagen' => 'img/productos/cetirizina.jpg'],
    
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
    <title>Inicio - Jopi G Center</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      body{
        background-image: url('img/fondo2.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }
      .card-img-container {
        height: 200px; /* Ajusta esta altura según tus necesidades */
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .card-img-top {
            max-height: 100%;
            width: auto;
            object-fit: cover;
        }
      
    </style>
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

    <!-- Jumbotron de bienvenida -->
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Bienvenido a Jopi G Center</h1>
            <?php if (isset($_SESSION['username'])): ?>
                <p class="lead">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>. ¡Has iniciado sesión exitosamente!</p>
            <?php else: ?>
                <p class="lead">Tienda virtual de productos farmacéuticos</p>
            <?php endif; ?>
        </div>
    </div>

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
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card mb-4">
                        <div class="card-img-container">
                        <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                            <p class="card-text">S/. <?php echo htmlspecialchars($producto['precio']); ?> </p>
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
