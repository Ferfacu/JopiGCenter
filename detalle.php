<?php
session_start();



// Verificar si se ha proporcionado el parámetro 'cod'
if (!isset($_GET['add'])) {
    die("Código de producto no especificado.");
}

$cod = htmlspecialchars($_GET['add']);
$url = "https://localhost:7007/api/ProductosGetProductosDetails/" . $cod;

// Inicializar cURL
$ch = curl_init($url);

// Configurar cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Solo para pruebas locales, en producción deberías configurar correctamente SSL

// Ejecutar la solicitud
$response = curl_exec($ch);

// Verificar si hay errores
if (curl_errno($ch)) {
    die('Error en cURL: ' . curl_error($ch));
} else {
    // Decodificar la respuesta JSON
    $producto = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        die('Error al decodificar JSON: ' . json_last_error_msg());
    }
}

// Cerrar cURL
curl_close($ch);

// Verificar si el producto existe
if (empty($producto)) {
    die("Producto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('img/fondo2.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .card-img-container {
            height: 400px; /* Ajusta esta altura según tus necesidades */
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

    <div class="container mt-5">
        <h3 class="text-center">Detalle del Producto</h3>
        <div class="card mb-4">
            <div class="card-img-container">
                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($producto['descripcion']); ?></h5>
                <p class="card-text">$<?php echo htmlspecialchars($producto['precio']); ?></p>
                <a href="carrito.php?add=<?php echo htmlspecialchars($producto['cod']); ?>" class="btn btn-primary">Añadir al Carrito</a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

