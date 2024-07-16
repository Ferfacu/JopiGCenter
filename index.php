<?php
session_start();

$url = "https://localhost:7007/api/ProductosGetAllProductos";

// Inicializar cURL
$ch = curl_init($url);

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Solo para pruebas locales, en producción deberías configurar correctamente SSL

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar si hay errores
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
    $productos = [];
} else {
    // Decodificar la respuesta JSON
    $productos = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Error al decodificar JSON: ' . json_last_error_msg();
        $productos = [];
    }
}

// Cerrar cURL
curl_close($ch);

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
        <h3 class="text-center">Nuestros Productos</h3>
        <div class="row">
            <?php if (empty($productos)): ?>
                <p class="text-center">No hay productos disponibles en este momento.</p>
            <?php else: ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-img-container">
                                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <a href="detalle.php?add=<?php echo htmlspecialchars($producto['cod']); ?>" class="btn btn-primary">Mas detalle</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
