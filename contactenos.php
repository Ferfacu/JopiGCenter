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


    <!-- Contactanos -->
    <div class="container mt-5">
        <!-- Columna del formulario de contacto -->
         <div class="col-md-10">
            <div class="container mt-0">
                <h2>Contáctenos</h2>
                <form action="inicio.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <div class="col-md-10">
                <!-- Aquí va el código del mapa -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d409.8820986029891!2d-76.93558568329877!3d-12.215903261184414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105bbe1ffbcf3af%3A0x44ca5a95b06b02b2!2sBOTICA%20JOPI%20CENTER!5e0!3m2!1ses!2spe!4v1720122477146!5m2!1ses!2spe" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    

    

    <!-- Footer -->
    <footer class="footer bg-dark text-white text-center mt-5 py-3">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Jopi G Center 2024 Todos los derechos reservados.</p>
        </div>
    </footer>
    
</body>
</html>