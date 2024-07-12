<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .alert {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1000;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <img src="img/logo2.png" alt="Logo de la empresa">
        </div>
        <h3 class="text-center">Iniciar sesión</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="login_procesar.php">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
                <div class="text-center mt-3">
                    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['welcome_message'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['welcome_message']; unset($_SESSION['welcome_message']); ?>
        </div>
    <?php elseif (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
        </div>
    <?php endif; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".alert").fadeIn().delay(3000).fadeOut();
        });
    </script>
</body>
</html>
