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


    <!-- Sección de características -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2 style="color:aqua">Quienes Somos</h2>
                <p style="color:beige">Somos una botica con un firme compromiso con la salud y el bienestar de nuestra comunidad. Ofrecemos una amplia gama de productos farmacéuticos, que incluyen medicamentos de prescripción y de venta libre, productos de cuidado personal, suplementos nutricionales y equipos médicos. Nuestro establecimiento se destaca por su enfoque en la calidad y la seguridad, garantizando que cada producto en nuestras estanterías cumpla con los más altos estándares de la industria farmacéutica.</p>
                <p style="color:beige">Contamos con un equipo de farmacéuticos y profesionales de la salud altamente capacitados y comprometidos con brindar un servicio excepcional. Ofrecemos asesoramiento personalizado, ayudando a nuestros clientes a entender sus tratamientos, gestionar sus medicamentos y adoptar hábitos saludables. Además, proporcionamos servicios adicionales como la toma de presión arterial, control de glucosa, y programas de adherencia a la medicación.</p>
                <p style="color:beige">Estamos dedicados a fomentar una cultura de salud preventiva, promoviendo la educación sanitaria a través de talleres, charlas y materiales informativos. Creemos que una comunidad bien informada es una comunidad saludable, y trabajamos continuamente para ser una fuente confiable de información y apoyo.</p>
            </div>
            <div class="col-md-6">
                <img src="img/atencion.jpg" alt="atencion">
            </div>
            <!-- Sección de misión y visión -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h3 style="color:aqua">Misión</h3>
                        <p style="color:beige">Nuestra misión es proporcionar productos farmacéuticos de alta calidad y servicios de atención médica accesibles y confiables a nuestra comunidad. Nos comprometemos a ofrecer asesoramiento experto y soluciones personalizadas que promuevan el bienestar y la salud integral de nuestros clientes. Trabajamos con ética, profesionalismo y dedicación para mejorar la calidad de vida de quienes confían en nosotros.</p>
                    </div>
                    <div class="col-md-6">
                    <h3 style="color:aqua">Visión</h3>
                    <p style="color:beige">Ser la botica líder en nuestra región, reconocida por nuestra excelencia en el servicio al cliente y nuestro compromiso con la salud de la comunidad. Aspiramos a ser un referente en la innovación farmacéutica y en la educación sanitaria, promoviendo prácticas sostenibles y colaborativas que contribuyan al desarrollo de una sociedad más saludable y consciente.</p>
                    </div>
                </div>
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