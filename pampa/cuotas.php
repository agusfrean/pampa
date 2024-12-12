<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuotas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/cuotas.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container col-12 col-lg-10 mx-auto ms-lg-5">
                <div class="container mt-4">
                    <div class="titulo col-12 text-left my-5">
                        <h1 class="minimal-title-with-line">Cuotas</h1>
                    </div>

                    <!-- Sección superior: buscador y botones -->
                    <div class="row mb-3 mx-0">
                        <!-- Buscador -->
                        <div class="col-md-6 my-2 py-2">
                            <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="busqueda" placeholder="Buscar alumno por nombre o DNI">
                                    <button class="btn btn-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>

                        <?php $cursoSeleccionado = $_GET['curso'] ?? 'todos'; ?>

                        <!-- Dropdown para cursos -->
                        <div class="col-lg-3 col-md-6 col-sm-12 text-right my-2">
                            <div class="dropdown my-2">
                                <button class="btn btn-outline-secondary dropdown-toggle mx-1" type="button" id="dropdownCursos" data-toggle="dropdown">
                                    Filtrar por curso
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownCursos">
                                    <li><a class="dropdown-item" href="?curso=todos">Todos los cursos</a></li>
                                    <li><a class="dropdown-item" href="?curso=Curso%201">Curso 1</a></li>
                                    <li><a class="dropdown-item" href="?curso=Curso%202">Curso 2</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Botonera -->
                        <div class="col-lg-3 col-md-6 text-end d-flex flex-wrap justify-content-end my-2">
                            <button id="btnEnviarPagosEduc" class="btn btn-outline-success mx-1 my-2">Enviar a PagosEduc</button>
                        </div>
                    </div>

                    <!-- Listado de alumnos -->
                    <!-- Tabla para pantallas grandes -->
                    <div class="table-responsive-sm d-none d-sm-block mx-0 px-0">
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Nombre</th>
                                    <th>Curso</th>
                                    <th>Monto a Facturar</th>
                                    <th><i class="fa-solid fa-circle-exclamation"></i></th>
                                </tr>
                            </thead>
                            <tbody id="tabla-alumnos" class="text-center">
                                <?php
                                $alumnos = [
                                    ['nombre' => 'Juan Pérez', 'curso' => 'Curso 1', 'monto' => 5000],
                                    ['nombre' => 'María López', 'curso' => 'Curso 2', 'monto' => 4500],
                                    ['nombre' => 'Ana García', 'curso' => 'Curso 1', 'monto' => 5200],
                                ];

                                $cursoFiltro = $_GET['curso'] ?? 'todos';
                                if ($cursoFiltro !== 'todos') {
                                    $alumnos = array_filter($alumnos, fn($a) => $a['curso'] === $cursoFiltro);
                                }

                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['busqueda'])) {
                                    $busqueda = strtolower($_POST['busqueda']);
                                    $alumnos = array_filter($alumnos, fn($a) => strpos(strtolower($a['nombre']), $busqueda) !== false);
                                }

                                foreach ($alumnos as $index => $alumno) {
                                    echo "<tr data-id='{$index}' data-nombre='{$alumno['nombre']}' data-curso='{$alumno['curso']}' data-monto='{$alumno['monto']}'>
                                        <td><input type='checkbox' class='select-alumno'></td>
                                        <td>{$alumno['nombre']}</td>
                                        <td>{$alumno['curso']}</td>
                                        <td>$ {$alumno['monto']}</td>
                                        <td>
                                            <button class='btn btn-primary btn-sm editar' data-toggle='modal' data-target='#modalEditar'>
                                                <i class='fas fa-edit'></i>
                                            </button>
                                            <button class='btn btn-danger btn-sm eliminar'>
                                                <i class='fas fa-trash-alt'></i>
                                            </button>
                                        </td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
 <!-- Cards para pantallas pequeñas -->
 <div class="d-block d-sm-none ">
        <?php foreach ($alumnos as $index => $alumno): ?>
        <div id="card-alumno" class=" card shadow-sm bg-light m-3" 
            data-id="<?= $index ?>" 
            data-nombre="<?= $alumno['nombre'] ?>"
            data-curso="<?= $alumno['curso'] ?>"
            data-monto="<?= $alumno['monto'] ?>">
             <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title"><?= $alumno['nombre'] ?></h5>
                    <input type="checkbox" class="select-alumno">
                </div>
                <p class="card-text">
                    <strong>Curso:</strong> <?= $alumno['curso'] ?><br>
                    <strong>Monto a Facturar:</strong> $<?= $alumno['monto'] ?>
                </p>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm me-2 editar" data-toggle="modal" data-target="#modalEditar">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="eliminar btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
  <span aria-hidden="true">&times;</span>
</button>
            </div>
            <div class="modal-body">
                <form id="formEditar">
                    <div class="mb-3">
                        <label for="nombreAlumno" class="form-label">Nombre y Apellido</label>
                        <input type="text" class="form-control" id="nombreAlumno" required>
                    </div>
                    <div class="mb-3">
                        <label for="cursoAlumno" class="form-label">Curso</label>
                        <input type="text" class="form-control" id="cursoAlumno" required>
                    </div>
                    <div class="mb-3">
                        <label for="montoAlumno" class="form-label">Monto a Facturar</label>
                        <input type="number" class="form-control" id="montoAlumno" required>
                    </div>
                    <div class="text-right">
                    <button type="submit" class="btn btn-success"><i class="fa-regular fa-floppy-disk"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
               <!-- Modal Enviar a pagos educ-->
             
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmacionLabel">Mensaje</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="mensajeConfirmacion"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCancelarEnvio" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnConfirmarEnvio" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Editar Alumno
    document.querySelectorAll('.editar').forEach(btn => {
        btn.addEventListener('click', function () {
            const fila = this.closest('tr');
            document.getElementById('nombreAlumno').value = fila.getAttribute('data-nombre');
            document.getElementById('cursoAlumno').value = fila.getAttribute('data-curso');
            document.getElementById('montoAlumno').value = fila.getAttribute('data-monto');
        });
    });

    // Eliminar Alumno
    document.querySelectorAll('.eliminar').forEach(btn => {
        btn.addEventListener('click', function () {
            const fila = this.closest('tr');
        });
            const nombre = fila.getAttribute('data-nombre');
            if (confirm(`¿Estás seguro de que deseas eliminar a ${nombre}?`)) {
                fila.remove();
            }
        });
    
    
    </script>

<script>
        // Seleccionar todos los checkboxes
        document.getElementById('selectAll').addEventListener('change', function () {
            const checkboxes = document.querySelectorAll('.select-alumno');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        // Filtrar por curso dinámicamente (si no se usa recarga)
        function filtrarCurso(curso) {
            document.getElementById('dropdownCursos').textContent = curso === 'todos' ? 'Todos los cursos' : curso;
            const filas = document.querySelectorAll('#tabla-alumnos tr, card-alumno');
            filas.forEach(fila => {
                const cursoFila = fila.getAttribute('data-curso');
                fila.style.display = (curso === 'todos' || cursoFila === curso) ? '' : 'none';
            });
        }
        document.addEventListener("DOMContentLoaded", function () {
        const urlParams = new URLSearchParams(window.location.search);
        const curso = urlParams.get("curso") || "Todos los cursos";
        document.getElementById("dropdownCursos").textContent = curso === "todos" ? "Todos los cursos" : curso;
    });
   
    document.getElementById('btnEnviarPagosEduc').addEventListener('click', function () {
    // Seleccionar todos los checkboxes marcados
    const checkboxes = document.querySelectorAll('.select-alumno:checked');
    const modal = new bootstrap.Modal(document.getElementById('modalConfirmacion'));

     // Limpiar botones en cada llamada
     const btnConfirmarEnvio = document.getElementById('btnConfirmarEnvio');
        const btnCancelarEnvio = document.getElementById('btnCancelarEnvio');
        btnConfirmarEnvio.classList.add('d-none');
        btnCancelarEnvio.classList.add('d-none');

    if (checkboxes.length === 0) {
          document.getElementById('mensajeConfirmacion').textContent = 'No ha seleccionado ningún alumno.';
            modal.show();
            return;
    }

    // Obtener los nombres de los alumnos seleccionados
    const nombresSeleccionados = Array.from(checkboxes).map(checkbox => {
        const container = checkbox.closest('tr') || checkbox.closest('.card'); 
        return container.dataset.nombre; // Obtener el nombre del alumno
    });

        // Configurar el mensaje en el modal
        document.getElementById('mensajeConfirmacion').innerHTML = `¿Está seguro que quiere enviar a los siguientes alumnos a PagosEduc?<br><strong>${nombresSeleccionados.join(', ')}</strong>`;
        btnConfirmarEnvio.classList.remove('d-none');
        btnCancelarEnvio.classList.remove('d-none');
        modal.show();

        // Confirmar envío
        btnConfirmarEnvio.onclick = function () {
            console.log(`Enviando a los siguientes alumnos a PagosEduc: ${nombresSeleccionados.join(', ')}`);
            modal.hide();
        };
    
});
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
