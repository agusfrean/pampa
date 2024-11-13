<?php
session_start();

// Verificación de credenciales 
$valid_email = "admin@gmail.com";
$valid_password = "12345";

// Manejo del mensaje de error
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validar credenciales
    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['email'] = $email;
        header("Location: home.php"); // Redirige a otra página si el login es correcto
        exit();
    } else {
        $error = "Email o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
     <link rel="stylesheet" href="css/login.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-container col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 p-3 p-md-5 my-5 py-5">
        <div class="row justify-content-center">
            <div>
                <div class=" pt-0 mt-0">
                <h2 class="logo text-center"><i class="fab fa-gitlab mx-3"></i> PamPa</h2>
                </div>
                <div class="triangle-divider"></div>
                <h3 class="text-center pt-2 mt-2">Log In</h3>
                <form action="login.php" method="POST">
                    <div class="form-group p-0 m-0">
                        <label for="email"></label>
                        <input type="text" class="form-control custom-input pt-3" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group p-0 m-0">
                        <label for="password"></label>
                        <input type="password" class="form-control custom-input" id="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <?php if ($error): ?>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-common mt-5">Ingresar</button>
                </form>
                <div class="text-center link-common mt-3">
                    ¿Primera vez? <a href="signup.php">Registrate</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6a26404ef4.js" crossorigin="anonymous"></script>
</body>
</html>
