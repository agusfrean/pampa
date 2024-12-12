<?php
$nombre="";
$dni="";
$legajo="";
$curso="";
$estado="";
$madre_nombre="";
$madre_dni="";
$madre_cel="";
$madre_email="";
$padre_nombre="";
$padre_dni="";
$padre_cel="";
$padre_email="";
$cuotas="";
$bonificacion="";
$total_facturar="";

if($_POST['tipo']!=1){
    $nombre=$_POST['nombre'];
    $dni=$_POST['dni'];
    $legajo=$_POST['legajo'];
    $curso=$_POST['curso'];
    $estado=$_POST['estado'];
    $madre_nombre=$_POST['madre_nombre'];
    $madre_dni=$_POST['madre_dni'];
    $madre_cel=$_POST['madre_cel'];
    $madre_email=$_POST['madre_email'];
    $padre_nombre=$_POST['padre_nombre'];
    $padre_dni=$_POST['padre_dni'];
    $padre_cel=$_POST['padre_cel'];
    $padre_email=$_POST['padre_email'];
    $cuotas=$_POST['cuotas'];
    $bonificacion=$_POST['bonificacion'];
    $total_facturar=$_POST['total_facturar'];
}
?>

                <form>
                <h4 class=" my-3">Alumno</h4>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="nombre">Nombre</label>
                            <input value="<?php echo $nombre;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="dni">DNI</label>
                            <input value="<?php echo $dni;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="dni" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="legajo">Legajo</label>
                            <input value="<?php echo $legajo;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="legajo" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="curso">Curso</label>
                            <input value="<?php echo $curso;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="curso" required>
                        </div>
                    </div>
                    <div class="form-group col-10 mb-3">
                        <label for="estado">Estado</label>
                        <input value="<?php echo $estado;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="estado" required>
                    </div>
                    <hr>
                    <h4  class=" my-3">Cuota</h4>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="cuotas">Cuotas</label>
                            <input value="<?php echo $cuotas;?>" type="number" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="cuotas" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="bonificacion">Bonificación (%)</label>
                            <input value="<?php echo $bonificacion;?>" type="number" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="bonificacion" required>
                        </div>
                    </div>
                    </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for='total_facturar'>Total a Facturar</label>
                            <input value="<?php echo $total_facturar;?>" type="number" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="total_facturar" required>
                        </div>
                    </div>
                    <hr>
                    <h4  class=" my-3">Madre</h4>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="madre_nombre">Nombre</label>
                            <input value="<?php echo $madre_nombre;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="madre_nombre" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="madre_dni">DNI</label>
                            <input value="<?php echo $madre_dni;?>"  type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="madre_dni" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="madre_cel">Cel</label>
                            <input value="<?php echo $madre_cel;?>"  type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="madre_cel" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="madre_email">Email</label>
                            <input value="<?php echo $madre_email;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="madre_email" required>
                        </div>
                    </div>
                    <hr>
                    <h4 class=" my-3">Padre</h4>
                    <div class="form-row">
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="padre_nombre">Nombre</label>
                            <input value="<?php echo $padre_nombre;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="padre_nombre" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="padre_dni">DNI</label>
                            <input value="<?php echo $padre_dni;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="padre_dni" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="padre_cel">Cel</label>
                            <input value="<?php echo $padre_cel;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="padre_cel" required>
                        </div>
                        <div class="form-group col-10 col-md-6 mb-3">
                            <label for="padre_email">Email</label>
                            <input value="<?php echo $padre_email;?>" type="text" <?php if($_POST['tipo']==3){echo "disabled";}?> class="form-control" id="padre_email" required>
                        </div>
                    </div>
                    
                    <div class="text-right">
                        <button type="submit" <?php if($_POST['tipo']==3){echo "hide";}?> class="btn btn-success">
                            <i class="fa-regular fa-floppy-disk"></i>
                        </button>
                    </div>
                </form>
           