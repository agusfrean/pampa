<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>




<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <?php include 'sidebar.php'; ?>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-3 pt-3 pb-2 mb-3">
            </div>

            <div class="row">
                <!-- Card Alumnos -->
                <div class="col-sm-6 col-lg-3">
                    <a href="alumnos.php">
                        <div class="card mb-3">
                            <div class="card-header h5">
                                <i class="fa-solid fa-graduation-cap fa-2x" style="color: #ffb400;"></i>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title" style="color: white;">Cantidad de Alumnos</h6>
                                <p class="card-text"><?php echo rand(100, 500); ?> alumnos</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card Cuotas Pagas con gráfico de torta -->
                <div class="col-sm-6 col-lg-3">
                    <a href="#cuotas">
                        <div class="card mb-3">
                            <div class="card-header h5">
                                <i class="fa-solid fa-chart-line fa-2x" style="color: #ffb400;"></i>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title" style="color: white;">Estado de Cuotas</h6>
                                <div style="width: 100%">
                                    <canvas id="grafica"></canvas>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card Facturación -->
                <div class="col-sm-6 col-lg-3">
                    <a href="#facturacion">
                        <div class="card mb-3">
                            <div class="card-header h5">
                                <i class="fa-solid fa-file-invoice fa-2x" style="color: #ffb400;"></i>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title" style="color: white;">Total Facturado</h6>
                                <p class="card-text">$<?php echo number_format(rand(10000, 50000), 2); ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card Pagos Futuros -->
                <div class="col-sm-6 col-lg-3">
                    <a href="#pagos">
                        <div class="card mb-3">
                            <div class="card-header h5">
                                <i class="fa-regular fa-clipboard fa-2x" style="color: #ffb400;"></i>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title" style="color: white;">Próximos Pagos</h6>
                                <ul class="list-group">
                                    <li class="list-group-item bg-transparent text-white">Salarios</li>
                                    <li class="list-group-item bg-transparent text-white">Servicios</li>
                                    <li class="list-group-item bg-transparent text-white">Mantenimiento</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Código JavaScript de Chart.js -->
<script>
const labels = ['Cuotas Pagas', 'Cuotas sin pagar'];
const colors = ['rgb(244, 208, 63)', 'rgb(215, 219, 221)'];

const graph = document.querySelector("#grafica");

const data = {
    labels: labels,
    datasets: [{
        data: [1, 2],
        backgroundColor: colors
    }]
};

const config = {
    type: 'pie',
    data: data,
};

new Chart(graph, config);
</script>
</body>
</html>
