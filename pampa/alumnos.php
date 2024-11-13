<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Datos de prueba para la tabla de alumnos
$alumnos = [
    ["nombre" => "Juan Pérez", "dni" => "12345678", "legajo" => "1001", "curso" => "1° A", "estado" => "Activo"],
    ["nombre" => "María López", "dni" => "87654321", "legajo" => "1002", "curso" => "2° B", "estado" => "Inactivo"],
    ["nombre" => "Carlos García", "dni" => "11223344", "legajo" => "1003", "curso" => "3° C", "estado" => "Activo"],
    // Puedes agregar más datos de prueba aquí
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/alumnos.css">
</head>
<body>
<div class="container-fluid px-0">
    <div class="row no-gutters">
        <?php include 'sidebar.php'; ?>

        <main class="col-md-7 ml-sm-auto col-lg-9 px-md-5 mt-4">
          <div class="d-flex align-items-center mb-3">
    <div class="col-6">
        <h1>Alumnos</h1>
    </div>
    <div class="col-6 text-left">
        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addAlumnoModal">
            <i class="fa-solid fa-user-plus"></i>
        </button>
    </div>
</div>
<div class= "row d-flex  justify-content-center p-2 m-0  ">
   <div class="col-sm-12 col-md-10 px-2">
   
    <table class="table-sm table-border table-hover  p-3 m-2">
        <thead class="bg-dark">
            <tr>
                <th>Nombre y Apellido</th>
                <th>DNI</th>
                <th>Legajo</th>
                <th>Curso</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
                <tr class="bg-secondary">
                    <td><?php echo $alumno['nombre']; ?></td>
                    <td><?php echo $alumno['dni']; ?></td>
                    <td><?php echo $alumno['legajo']; ?></td>
                    <td><?php echo $alumno['curso']; ?></td>
                    <td><?php echo $alumno['estado']; ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAlumnoModal" onclick="populateEditModal('<?php echo $alumno['nombre']; ?>', '<?php echo $alumno['dni']; ?>', '<?php echo $alumno['legajo']; ?>', '<?php echo $alumno['curso']; ?>', '<?php echo $alumno['estado']; ?>')">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAlumnoModal" onclick="setDeleteModal('<?php echo $alumno['nombre']; ?>')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>

<!-- Modal Agregar Alumno -->
<div class="modal fade" id="addAlumnoModal" tabindex="-1" role="dialog" aria-labelledby="addAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlumnoModalLabel">Agregar Alumno</h5>
                <button type="button" class="close " data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí irían los campos para agregar un nuevo alumno -->
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre y Apellido</label>
                        <input type="text" class="form-control" id="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="legajo">Legajo</label>
                        <input type="text" class="form-control" id="legajo" required>
                    </div>
                    <div class="form-group">
                        <label for="curso">Curso</label>
                        <input type="text" class="form-control" id="curso" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-regular fa-floppy-disk"></i>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal Agregar Alumno -->
<div class="modal fade" id="addAlumnoModal" tabindex="-1" role="dialog" aria-labelledby="addAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAlumnoModalLabel">Agregar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="nombre">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="legajo">Legajo</label>
                            <input type="text" class="form-control" id="legajo" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="curso">Curso</label>
                            <input type="text" class="form-control" id="curso" required>
                        </div>
                    </div>
                    <div class="form-group col-10 mb-3">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" id="estado" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-regular fa-floppy-disk"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Editar Alumno -->
<!-- Modal Editar Alumno -->
<div class="modal fade" id="editAlumnoModal" tabindex="-1" role="dialog" aria-labelledby="editAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAlumnoModalLabel">Editar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de edición -->
                <form>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="editNombre">Nombre y Apellido</label>
                            <input type="text" class="form-control" id="editNombre" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editDni">DNI</label>
                            <input type="text" class="form-control" id="editDni" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="editLegajo">Legajo</label>
                            <input type="text" class="form-control" id="editLegajo" required>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="editCurso">Curso</label>
                            <input type="text" class="form-control" id="editCurso" required>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="editEstado">Estado</label>
                        <input type="text" class="form-control" id="editEstado" required>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-regular fa-floppy-disk"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Eliminar Alumno -->
<div class="modal fade" id="deleteAlumnoModal" tabindex="-1" role="dialog" aria-labelledby="deleteAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAlumnoModalLabel">Eliminar Alumno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="deleteMessage"></p>
                <button type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function setDeleteModal(nombre) {
        document.getElementById('deleteMessage').innerText = `¿Desea eliminar el alumno ${nombre}?`;
    }

    function populateEditModal(nombre, dni, legajo, curso, estado) {
        document.getElementById('editNombre').value = nombre;
        document.getElementById('editDni').value = dni;
        document.getElementById('editLegajo').value = legajo;
        document.getElementById('editCurso').value = curso;
        document.getElementById('editEstado').value = estado;
    }
</script>

</body>
</html>
