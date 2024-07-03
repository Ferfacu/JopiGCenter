<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio - Jopi G Center</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
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
    <a class="navbar-brand" href="inicio.php"><img src="img/logo1.png" width="50"></a>
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

<!-- Sección de características -->
<div class="container mt-5">
    <div class="row">
      <!-- Sección de misión y visión -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 style="color:aqua">Misión</h2>
            <p style="color:beige">En nuestra empresa, nos dedicamos a proporcionar accesorios de computadora de alta calidad y soluciones innovadoras para satisfacer las necesidades de nuestros clientes. Nos esforzamos por ofrecer una experiencia de compra en línea conveniente y sin complicaciones, respaldada por un excelente servicio al cliente y un compromiso con la satisfacción del cliente.</p>
        </div>
        <div class="col-md-6">
            <h2 style="color:aqua">Visión</h2>
            <p style="color:beige">Nos visualizamos como líderes en el mercado de accesorios de computadora, reconocidos por nuestra amplia gama de productos de alta calidad, nuestra experiencia en la industria y nuestro compromiso con la excelencia en el servicio al cliente. Buscamos expandir nuestra presencia en línea mediante la implementación continua de tecnologías innovadoras y estrategias de comercio electrónico avanzadas.</p>
        </div>
    </div>
</div>

        <!-- Sección de los fundadores -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 style="color:chartreuse" class="text-center">Nuestros Fundadores</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="img/logof.jpg" width="20px" alt="Fundador 1">
                <div class="card-body">
                    <h5 class="card-title">Huaman Ciprian Diego</h5>
                    <p class="card-text">Breve descripción del fundador 1.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="img/logof.jpg" alt="Fundador 2">
                <div class="card-body">
                    <h5 class="card-title">Ramos  Sarmiento Raymond  Joel  </h5>
                    <p class="card-text">Breve descripción del fundador 2.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="img/logof.jpg" alt="Fundador 3">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Fundador 3</h5>
                    <p class="card-text">Breve descripción del fundador 3.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="img/logof.jpg" alt="Fundador 4">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Fundador 4</h5>
                    <p class="card-text">Breve descripción del fundador 3.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="img/logof.jpg" alt="Fundador 5">
                <div class="card-body">
                    <h5 class="card-title">Nombre del Fundador 5</h5>
                    <p class="card-text">Breve descripción del fundador 3.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center mt-5 py-3">
    <p>      Copyright &copy; Jopi G Center 2024 Todos los derechos reservados </p>
</footer>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
