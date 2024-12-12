<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Datos de prueba para la tabla de alumnos
$alumnos = [
  
        [
            "nombre" => "Juan Pérez",
            "dni" => "12345678",
            "legajo" => "1001",
            "curso" => "1° A",
            "estado" => "Activo",
            "cuotas" => 5000,
            "bonificacion" => 10,
            "total_facturar" => 5000 - (5000 * 10 / 100),
            "madre_nombre" => "Ana Gómez",
            "madre_dni" => "12312312",
            "madre_cel" => "111111111",
            "madre_email" => "ana.gomez@gmail.com",
            "padre_nombre" => "Luis Pérez",
            "padre_dni" => "32132132",
            "padre_cel" => "222222222",
            "padre_email" => "luis.perez@gmail.com"
        ],
        [
            "nombre" => "María López",
            "dni" => "87654321",
            "legajo" => "1002",
            "curso" => "2° B",
            "estado" => "Inactivo",
            "cuotas" => 5000,
            "bonificacion" => 25,
            "total_facturar" => 5000 - (5000 * 25 / 100),
            "madre_nombre" => "Laura Martínez",
            "madre_dni" => "23423423",
            "madre_cel" => "333333333",
            "madre_email" => "laura.martinez@gmail.com",
            "padre_nombre" => "Carlos López",
            "padre_dni" => "43243243",
            "padre_cel" => "444444444",
            "padre_email" => "carlos.lopez@gmail.com"
        ],
        [
            "nombre" => "Carlos García",
            "dni" => "11223344",
            "legajo" => "1003",
            "curso" => "3° C",
            "estado" => "Activo",
            "cuotas" => 5000,
            "bonificacion" => 50,
            "total_facturar" => 5000 - (5000 * 50 / 100),
            "madre_nombre" => "María González",
            "madre_dni" => "34534534",
            "madre_cel" => "555555555",
            "madre_email" => "maria.gonzalez@gmail.com",
            "padre_nombre" => "José García",
            "padre_dni" => "54354354",
            "padre_cel" => "666666666",
            "padre_email" => "jose.garcia@gmail.com"
        ]
    
    ];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Alumnos</title>
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Antonio:wght@100..700&family=Architects+Daughter&family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ruda:wght@400..900&display=swap');
    </style>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Datatable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="css/alumnos.css">
    <link rel="stylesheet" href="css/sidebar.css">


    <!-- Cargar jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Cargar DataTables -->
<script src="https://cdn.datatables.net/2.1.8/js/jquery.dataTables.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>



    <?php
	include("modales/modalgenerico.php");
	?>
</head>
<body class="">
    <div class="container-fluid ">
        <div class="row ">
            <?php include 'sidebar.php'; ?>

            <main class="container col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="col-12 col-lg-10 mx-auto ms-lg-5">
                <div class="container mt-4">
                    <div class="col-12">
                        <h1 class="minimal-title-with-line titulo col-12 text-left my-5">Alumnos</h1>
                    </div>
                    <div class="col-12 text-right ">
                        <button class="btn btn-sm btn-success mr-5" onclick="mostrarmodal()" type="button">
                            <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="container mt-4 px-0 mx-0">
                    <div class="dropdown mb-3 mx-5 text-right ml-5">
                    <button class="btn btn-outline-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-labelledby="false">
                         Selecciona un curso
                     </button>
                        <ul class="dropdown-menu hover" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#" onclick="filtrarCurso('1° A')">1° A</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filtrarCurso('2° B')">2° B</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filtrarCurso('3° C')">3° C</a></li>
                            <li><a class="dropdown-item" href="#" onclick="filtrarCurso('todos')">Todos</a></li>
                        </ul>
                    </div>
                    
                    <div class="row d-flex justify-content-center p-0 mx-0 mt-3">
                        <div class="col-sm-12 col-md-10 px-0 m-0">
                        <div class="table-responsive d-none d-md-block">
                            <table id="table" class="table table-hover table-striped table-bordered">
                                <thead class=" text-center">
                                    <tr>
                                        <th class=" text-left">Nombre</th>
                                        <th>DNI</th>
                                        <th>Legajo</th>
                                        <th>Curso</th>
                                        <th>Estado</th>
                                        <th><i class="fa-solid fa-circle-exclamation"></i></th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    <?php foreach ($alumnos as $alumno): ?>
                                        <tr class="bg-light" data-curso="<?php echo $alumno['curso']; ?>">
                                            <td class="align-middle"><?php echo $alumno['nombre']; ?></td>
                                            <td class="text-center align-middle"><?php echo $alumno['dni']; ?></td>
                                            <td class="text-center align-middle"><?php echo $alumno['legajo']; ?></td>
                                            <td class="text-center align-middle"><?php echo $alumno['curso']; ?></td>
                                            <td class="text-center align-middle"><?php echo $alumno['estado']; ?></td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-info btn-sm align-middle" data-toggle="modal" data-target="#modalgenerico" 
                                            onclick="populateEditModal(
                                                '<?php echo $alumno['nombre']; ?>', 
                                                '<?php echo $alumno['dni']; ?>', 
                                                '<?php echo $alumno['legajo']; ?>', 
                                                '<?php echo $alumno['curso']; ?>', 
                                                '<?php echo $alumno['estado']; ?>',
                                                '<?php echo $alumno['madre_nombre']; ?>', 
                                                '<?php echo $alumno['madre_dni']; ?>', 
                                                '<?php echo $alumno['madre_cel']; ?>', 
                                                '<?php echo $alumno['madre_email']; ?>', 
                                                '<?php echo $alumno['padre_nombre']; ?>', 
                                                '<?php echo $alumno['padre_dni']; ?>', 
                                                '<?php echo $alumno['padre_cel']; ?>', 
                                                '<?php echo $alumno['padre_email']; ?>', 
                                                '<?php echo $alumno['cuotas']; ?>', 
                                                '<?php echo $alumno['bonificacion']; ?>',
                                                '<?php echo $alumno['total_facturar']; ?>','3')">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                                <button class="btn btn-primary btn-sm align-middle" data-toggle="modal" data-target="#editAlumnoModal" 
                                                onclick="populateEditModal( '<?php echo $alumno['nombre']; ?>', 
                                                '<?php echo $alumno['dni']; ?>', 
                                                '<?php echo $alumno['legajo']; ?>', 
                                                '<?php echo $alumno['curso']; ?>', 
                                                '<?php echo $alumno['estado']; ?>',
                                                '<?php echo $alumno['madre_nombre']; ?>', 
                                                '<?php echo $alumno['madre_dni']; ?>', 
                                                '<?php echo $alumno['madre_cel']; ?>', 
                                                '<?php echo $alumno['madre_email']; ?>', 
                                                '<?php echo $alumno['padre_nombre']; ?>', 
                                                '<?php echo $alumno['padre_dni']; ?>', 
                                                '<?php echo $alumno['padre_cel']; ?>', 
                                                '<?php echo $alumno['padre_email']; ?>', 
                                                '<?php echo $alumno['cuotas']; ?>', 
                                                '<?php echo $alumno['bonificacion']; ?>',
                                                '<?php echo $alumno['total_facturar']; ?>','2')"><i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm align-middle" data-toggle="modal" data-target="#deleteAlumnoModal" onclick="setDeleteModal('<?php echo $alumno['nombre']; ?>')">
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
                    </div>
                </div>
              
              
               <!--cards en pantallas pequeñas-->

               <div class="row d-flex flex-wrap" id="tabla-alumnos">
    <?php foreach ($alumnos as $alumno): ?>
    <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex d-block d-md-none">
        <div class="card w-100 shadow-sm bg-light"  data-id= "<?= $index ?>" data-nombre="<?= $alumno['nombre'] ?>" data-dni="<?= $alumno['dni'] ?>" data-legajo="<?= $alumno['legajo'] ?>"data-curso="<?= $alumno['curso'] ?>"data-estado="<?= $alumno['estado'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $alumno['nombre']; ?></h5>
                <div class="row mt-4">
                    <p class="card-text col-6">DNI: <?php echo $alumno['dni']; ?></p>
                    <p class="card-text col-6 text-right">Legajo: <?php echo $alumno['legajo']; ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-6">Curso: <?php echo $alumno['curso']; ?></p>
                    <p class="card-text col-6 text-right">Estado: <?php echo $alumno['estado']; ?></p>
                </div>
               
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-info btn-sm mr-2"  onclick="populateEditModal('<?php echo $alumno['nombre']; ?>', '<?php echo $alumno['dni']; ?>', '<?php echo $alumno['legajo']; ?>', '<?php echo $alumno['curso']; ?>', '<?php echo $alumno['estado']; ?>', '<?php echo $alumno['madre_nombre']; ?>',
                                                '<?php echo $alumno['madre_dni']; ?>','<?php echo $alumno['madre_cel']; ?>', '<?php echo $alumno['madre_email']; ?>', '<?php echo $alumno['padre_nombre']; ?>', '<?php echo $alumno['padre_dni']; ?>', '<?php echo $alumno['padre_cel']; ?>', '<?php echo $alumno['padre_email']; ?>','<?php echo $alumno['cuotas']; ?>',
                                                '<?php echo $alumno['bonificacion']; ?>','<?php echo $alumno['total_facturar']; ?>','3')"><i class="fas fa-info-circle"></i></button>

                    <button class="btn btn-primary btn-sm mr-2"  onclick="populateEditModal('<?php echo $alumno['nombre']; ?>', '<?php echo $alumno['dni']; ?>', '<?php echo $alumno['legajo']; ?>', '<?php echo $alumno['curso']; ?>', '<?php echo $alumno['estado']; ?>', '<?php echo $alumno['madre_nombre']; ?>',
                                                '<?php echo $alumno['madre_dni']; ?>','<?php echo $alumno['madre_cel']; ?>', '<?php echo $alumno['madre_email']; ?>', '<?php echo $alumno['padre_nombre']; ?>', '<?php echo $alumno['padre_dni']; ?>', '<?php echo $alumno['padre_cel']; ?>', '<?php echo $alumno['padre_email']; ?>','<?php echo $alumno['cuotas']; ?>',
                                                '<?php echo $alumno['bonificacion']; ?>','<?php echo $alumno['total_facturar']; ?>','2')"> <i class="fas fa-edit"></i></button>

                    <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#deleteAlumnoModal" onclick="setDeleteModal('<?php echo $alumno['nombre']; ?>')"> <i class="fas fa-trash"></i></button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
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



<script>
    //Modal
    jQuery(document).ready(function($) {
   table=$('#table').DataTable;
});

function populateEditModal(nombre, dni, legajo, curso, estado, madre_nombre, madre_dni, madre_cel, madre_email, padre_nombre, padre_dni, padre_cel, padre_email, cuotas, bonificacion, total_facturar,tipo) {

    $.ajax({
			type: "POST",
			url: "ajax/modal_alumno.php",
			data:{
                tipo:2,
                nombre:nombre,
                dni:dni,
                legajo:legajo,
                curso:curso,
                estado:estado,
                madre_nombre:madre_nombre,
                madre_dni:madre_dni,
                madre_cel:madre_cel,
                madre_email:madre_email,
                padre_nombre:padre_nombre,
                padre_dni:padre_dni,
                padre_cel:padre_cel,
                padre_email:padre_email,
                cuotas:cuotas,
                bonificacion:bonificacion,
                total_facturar:total_facturar,

            },
			success: function(datos) {
				$('#modalgen').html("Alumno");
				$('#modalgenerico .modal-body').html(datos);
				$('#modalgenerico').modal({
					backdrop: 'static',
					keyboard: false
				});
				// Display Modal
				$('#modalgenerico').modal('show');
			}
		});

}
    function mostrarmodal() {
	
		$.ajax({
			type: "POST",
			url: "ajax/modal_alumno.php",
			data:{tipo:1},
			success: function(datos) {
				$('#modalgen').html("Agregar Alumno");
				$('#modalgenerico .modal-body').html(datos);
				$('#modalgenerico').modal({
					backdrop: 'static',
					keyboard: false
				});
				// Display Modal
				$('#modalgenerico').modal('show');
			}
		});
	}
    function mostrarMasInformacion(nombre, dni, legajo, curso, estado, madre_nombre, madre_dni, madre_cel, madre_email, padre_nombre, padre_dni, padre_cel, padre_email, cuotas, bonificacion, total_facturar) {
    $.ajax({
        type: "POST",
        url: "ajax/modal_alumno.php",
        data: {
            tipo:3,
            nombre: nombre,
            dni: dni,
            legajo: legajo,
            curso: curso,
            estado: estado,
            madre_nombre: madre_nombre,
            madre_dni: madre_dni,
            madre_cel: madre_cel,
            madre_email: madre_email,
            padre_nombre: padre_nombre,
            padre_dni: padre_dni,
            padre_cel: padre_cel,
            padre_email: padre_email,
            cuotas: cuotas,
            bonificacion: bonificacion,
            total_facturar: total_facturar,
        },
        success: function(datos) {
            $('#modalgen').html("Más Información");
            $('#modalgenerico .modal-body').html(datos);
            $('#modalgenerico').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#modalgenerico').modal('show');
        }
    });
}

</script>
<!-- Script para filtrar dropdown-->
<script>
    function filtrarCurso(curso) {
    
        // Cambiar el texto del dropdown
        document.getElementById('dropdownMenuButton').textContent = curso === 'todos' ? 'Todos los cursos' : curso;

        // Obtener todas las filas de la tabla
        const filas = document.querySelectorAll('#tabla-alumnos tr');

        // Mostrar/Ocultar filas según el curso
        filas.forEach(fila => {
            const cursoFila = fila.getAttribute('data-curso');
            if (curso === 'todos' || cursoFila === curso) {
                fila.style.display = ''; // Mostrar
            } else {
                fila.style.display = 'none'; // Ocultar
            }
        });
    }
   
</script>

</body>
</html>
