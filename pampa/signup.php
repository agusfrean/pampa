<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesa los datos de registro aquí.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Redireccionamiento después del registro
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="signup-container col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 p-3 p-md-5 mt-5 py-5">
        <div class="logo pt-0 mt-0">
            <h3><i class="fab fa-gitlab"></i> PamPa</h3>
        </div>
        <div class="triangle-divider"></div>
        <h3 class="text-center pt-5 mt-5">Registrate</h3>
        <form action="signup.php" method="POST">
            <div class="form-group p-0 m-0">
                <label for="email"></label>
                <input type="text" class="form-control custom-input" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group p-0 m-0">
                <label for="password"></label>
                <input type="password" class="form-control custom-input" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group p-0 m-0">
                <label for="confirm_password"></label>
                <input type="password" class="form-control custom-input" id="confirm_password" name="confirm_password" placeholder="Confirma tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-signup mt-5">Registrarse</button>
        </form>
        <div class="text-center link-login mt-3">
            ¿Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6a26404ef4.js" crossorigin="anonymous"></script>
</body>
</html>
