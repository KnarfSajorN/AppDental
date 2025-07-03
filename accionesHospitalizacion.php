<?php
include 'header.php';
include 'menu.php';
$usuarioId = $_SESSION['ID'];
$idH = $_GET['idH'];
$tipoAccion = $_GET['tipo'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<style>
 
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <div>

    <!-- /.box-header -->
    <div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Acciones de Hospitalizacion
        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#"><i class="fa fa-dashboard"></i> Hospitalizacion </a></li>
          <li><a href="#"><i class="fa fa-dashboard"></i>Control de Hospitalizacion</a></li>
          <li><a href="#"><i class="fa fa-dashboard"></i>Acciones</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div>
          <div class="col-xs-12">
            <div class="box">
                
                <!-- ============== FORMULARIO SUMINISTRO DE MEDICAMENTOS ===================== -->
                <?php if ($tipoAccion=='suministroMedicamentos') {?>
                    <form action="guardarAccionHospitalizacion.php" method="POST">
                    <div class="panel box box-danger">
                    <div class="box-header with-border">
                    <h3>Suministro de medicamentos</h3>
                    </div>
                    <div id="div-medicamentos-consulta" class="">
                        <div class="box-body">
                        <button type="button" class="btn btn-success" onclick="addContent()">+Añadir</button>

                        <input type="hidden" name="tipoGuardado" value="Medicamentos">
                        <input type="hidden" name="hospitalizacionId" value="<?php echo $idH?>">
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']?>">


                        <div id="content-medicamentos-consulta">

                        <div class="row" >
                            <div class="col-md-3">
                            <label>Medicamento:</label>
                            <input type="text" class="form-control input-lg" name="medicamentos[0][medicamento]">
                            </div>
                            <div class="col-md-3">
                            <label>Dosis:</label>
                            <input type="text" class="form-control input-lg" name="medicamentos[0][dosis]">
                            </div>
                            <div class="col-md-3">
                            <label>Frecuencia:</label>
                            <input type="text" class="form-control input-lg" name="medicamentos[0][frecuencia]">
                            </div>
                            <div class="col-md-3">
                            <label>Vía:</label>
                            <input type="text" class="form-control input-lg" name="medicamentos[0][via]">
                            </div>
                        </div>

                        <script type="text/javascript">
                        var contadorProductos = 0;

                        function addContent() {
                        contadorProductos = Number(contadorProductos) + 1;
                        var content_medicamentos = document.getElementById('content-medicamentos-consulta');
                        var nuevoCampo = `<div class="row" >
                                            <div class="col-md-3">
                                            <label>Medicamento:</label>
                                            <input type="text" class="form-control input-lg" name="medicamentos[`+ contadorProductos +`][medicamento]">
                                            </div>
                                            <div class="col-md-3">
                                            <label>Dosis:</label>
                                            <input type="text" class="form-control input-lg" name="medicamentos[`+ contadorProductos +`][dosis]">
                                            </div>
                                            <div class="col-md-3">
                                            <label>Frecuencia:</label>
                                            <input type="text" class="form-control input-lg" name="medicamentos[`+ contadorProductos +`][frecuencia]">
                                            </div>
                                            <div class="col-md-3">
                                            <label>Vía:</label>
                                            <input type="text" class="form-control input-lg" name="medicamentos[`+ contadorProductos +`][via]">
                                            </div>
                                        </div>`;

                        $("#content-medicamentos-consulta").append(nuevoCampo);

                        }
                        </script>
                        </div>



                        </div>
                        
                    </div>
                    </div>


                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">G U A R D A R</button>
                    </div>


                    <!-- |=|=|=|=|=|=|= MEDICAMENTOS REGISTRADOS EN LA CITA |=|=|=|=|=|=|========== -->
                    </div>
                    </form>
                <?php } ?> 
                <!-- ============== FORMULARIO SUMINISTRO DE MEDICAMENTOS ===================== -->



                <!-- ============== FORMULARIO SUMINISTRO DE ALIMENTACION ===================== -->
                <?php if ($tipoAccion=='suministroAlimentacion') {?>
                    <form action="guardarAccionHospitalizacion.php" method="POST">
                    <div class="panel box box-danger">
                    <div class="box-header with-border">
                    <h3>Suministro de alimentacion</h3>
                    </div>
                    <div id="div-medicamentos-consulta" class="">
                        <div class="box-body">
                        <button type="button" class="btn btn-success" onclick="addContentAlimentos()">+Añadir</button>

                        <input type="hidden" name="tipoGuardado" value="Alimentacion">
                        <input type="hidden" name="hospitalizacionId" value="<?php echo $idH?>">
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']?>">
                        

                        <div id="content-alimentos-consulta">

                        <div class="row" >
                            <div class="col-md-3">
                            <label>Tipo:</label>
                            <select name="alimento[0][tipo]" class="form-control select2">
                                <option value="">Seleccione</option>  
                                <option value="Desayuno">Desayuno</option>
                                <option value="Almuerzo">Almuerzo</option>  
                                <option value="Cena">Cena</option>
                                <option value="Otro">Otro</option>
                            </select>
                            </div>
                            <div class="col-md-3">
                            <label>Hora:</label>
                            <input type="time" class="form-control input-lg" name="alimento[0][hora]">
                            </div>
                            <div class="col-md-3">
                            <label>Detalles:</label>
                            <input type="text" class="form-control input-lg" name="alimento[0][detalles]">
                            </div>
                        
                        </div>

                        <script type="text/javascript">
                        var contadorProductosAlimentos = 0;

                        function addContentAlimentos() {
                        contadorProductosAlimentos = Number(contadorProductosAlimentos) + 1;
                        var content_medicamentos = document.getElementById('content-medicamentos-consulta');
                        var nuevoCampoAlimentos = `<div class="row" >
                                            <div class="col-md-3">
                                            <label>Tipo:</label>
                                            <select name="alimento[`+ contadorProductosAlimentos +`][tipo]"  class="form-control select2">
                                                <option value="">Seleccione</option>  
                                                <option value="Desayuno">Desayuno</option>
                                                <option value="Almuerzo">Almuerzo</option>  
                                                <option value="Cena">Cena</option>  
                                                <option value="Otro">Otro</option>
                                            </select>
                                            </div>
                                            <div class="col-md-3">
                                            <label>Hora:</label>
                                            <input type="time" class="form-control input-lg" name="alimento[`+ contadorProductosAlimentos +`][hora]">
                                            </div>
                                            <div class="col-md-3">
                                            <label>Detalles:</label>
                                            <input type="text" class="form-control input-lg" name="alimento[`+ contadorProductosAlimentos +`][detalles]">
                                            </div>
                                        
                                        </div>`;

                        $("#content-alimentos-consulta").append(nuevoCampoAlimentos);

                        }
                        </script>
                        </div>



                        </div>
                        
                    </div>
                    </div>
                    


                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">G U A R D A R</button>
                    </div>


                    <!-- |=|=|=|=|=|=|= MEDICAMENTOS REGISTRADOS EN LA CITA |=|=|=|=|=|=|========== -->
                    </div>
                    </form>
                <?php } ?> 
                <!-- ============== FORMULARIO SUMINISTRO DE ALIMENTACION ===================== -->


                <!-- ================ FORMULARIO NOTAS DE ENFERMERIA ===================== -->
                <?php if ($tipoAccion=='notasEnfermeria') {?>

                    <form action="guardarAccionHospitalizacion.php" method="POST">
                    <div class="panel box box-danger">
                    <div class="box-header with-border">
                    <h3>Nota de enfermería</h3>
                    </div>
                    <div id="div-nota-enfermeria" class="">
                        <div class="box-body">

                        <input type="hidden" name="tipoGuardado" value="notaEnfermeria">
                        <input type="hidden" name="hospitalizacionId" value="<?php echo $idH?>">
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']?>">

                        <label>Ingresar nueva nota de enfermería</label>
                        <textarea name="notaEnfermeria" class="form-control" style="height: 200px;"></textarea>
                        </div>
                        
                    </div>
                    </div>
                    


                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">G U A R D A R</button>
                    </div>


                    <!-- |=|=|=|=|=|=|= MEDICAMENTOS REGISTRADOS EN LA CITA |=|=|=|=|=|=|========== -->
                    </div>
                    </form>
                
                <?php } ?>
                <!-- ================ FORMULARIO NOTAS DE ENFERMERIA ===================== -->


                <!-- ================ FORMULARIO VISITANTES ===================== -->
                <?php if ($tipoAccion=='registroVisitantes') {?>

                    <form action="guardarAccionHospitalizacion.php" method="POST">
                    <div class="panel box box-danger">
                    <div class="box-header with-border">
                    <h3>Registro de Visitantes</h3>
                    </div>
                    <div id="div-visitantes" class="">
                        <div class="box-body">

                        <input type="hidden" name="tipoGuardado" value="visitantes">
                        <input type="hidden" name="hospitalizacionId" value="<?php echo $idH?>">
                        <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']?>">

                        <button type="button" class="btn btn-success" onclick="addVisitor()">+Añadir</button>


                        <div class="row" >
                            <div class="col-md-3">
                            <label>Nombre del Visitante:</label>
                            <input type="text" class="form-control input-lg" name="visitantes[0][nombreVisitante]">
                            </div>

                            <div class="col-md-3">
                            <label>Parentesco que sostiene con el paciente</label>
                            <select name="visitantes[0][parentesco]" class="form-control select2">
                                <option value="">Seleccione</option>  
                                <option value="Hijos">Hijos</option>
                                <option value="Hermanos">Hermanos</option>
                                <option value="Madre">Madre</option>
                                <option value="Padre">Padre</option>
                                <option value="Tío">Tio</option>
                                <option value="Primo">Primo</option>
                                <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                <option value="Colega">Colega</option>
                                <option value="Nieto">Nieto</option>
                                <option value="Abuelo">Abuelo</option>
                                <option value="Amigo">Amigo</option>
                                <option value="Primo">Primo</option>
                                <option value="Cónyuge">Cónyuge</option>
                                <option value="Padres">Padres</option>
                                <option value="Otro">Otro</option>
                                <option value="No aplica">No aplica</option>
                                <option value="Ninguno">Ninguno</option>
                            </select>
                            </div>

                            <div class="col-md-3">
                            <label>Hora de Ingreso</label>
                            <input type="time" class="form-control input-lg" name="visitantes[0][horaIngreso]">
                            </div>

                            <div class="col-md-3">
                            <label>Hora estimada de salida</label>
                            <input type="time" class="form-control input-lg" name="visitantes[0][horaEstimadaSalida]">
                            </div>

                        </div>





                        
                        
                    </div>
                    </div>
                    <script>

                    var contadorVisitantes = 0;
                    
                    function addVisitor() {
                    contadorVisitantes = Number(contadorVisitantes) + 1;
                    var nuevoCampoVisitante = `<div class="row" >
                                                    <div class="col-md-3">
                                                    <label>Nombre del Visitante:</label>
                                                    <input type="text" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][nombreVisitante]">
                                                    </div>
                                                    <div class="col-md-3">
                                                    <label>Parentesco que sostiene con el paciente</label>
                                                    <select name="visitantes[`+ contadorVisitantes +`][parentesco]" class="form-control select2">
                                                        <option value="">Seleccione</option>
                                                        <option value="Hijos">Hijos</option>
                                                        <option value="Hermanos">Hermanos</option>
                                                        <option value="Madre">Madre</option>
                                                        <option value="Padre">Padre</option>
                                                        <option value="Tío">Tio</option>
                                                        <option value="Primo">Primo</option>
                                                        <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                                        <option value="Colega">Colega</option>
                                                        <option value="Nieto">Nieto</option>
                                                        <option value="Abuelo">Abuelo</option>
                                                        <option value="Amigo">Amigo</option>
                                                        <option value="Primo">Primo</option>
                                                        <option value="Cónyuge">Cónyuge</option>
                                                        <option value="Padres">Padres</option>
                                                        <option value="Otro">Otro</option>
                                                        <option value="No aplica">No aplica</option>
                                                        <option value="Ninguno">Ninguno</option>
                                                        
                                                    </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                    <label>Hora de Ingreso</label>
                                                    <input type="time" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][horaIngreso]">
                                                    </div>
                                                    <div class="col-md-3">
                                                    <label>Hora estimada de salida</label>
                                                    <input type="time" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][horaEstimadaSalida]">
                                                    </div>
                                                </div>`;

                    $("#div-visitantes").append(nuevoCampoVisitante);

                        }
                    </script>



                    <div class="col-xs-12" style="margin-top: 10px">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">G U A R D A R</button>
                    </div>


                    <!-- |=|=|=|=|=|=|= VISITANTES |=|=|=|=|=|=|========== -->
                    </div>
                    </form>

                    <?php } ?>
                <!-- ================ FORMULARIO VISITANTES ===================== -->


                <!--========= FORMULARIO MOVIMIENTO DE CAMILLA =================  -->

                <?php if ($tipoAccion=='movimientoCamilla') {?>

<form action="guardarAccionHospitalizacion.php" method="POST">
<div class="panel box box-danger">
<div class="box-header with-border">
<h3>Movimiento de camilla</h3>
</div>
<div id="div-movimiento-camilla" class="">
    <div class="box-body">

    <input type="hidden" name="tipoGuardado" value="movimientoCamilla">
    <input type="hidden" name="hospitalizacionId" value="<?php echo $idH?>">
    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']?>">


    <div class="row" >
        <div class="col-md-12">
        <h5>Camilla Actual</h5>
        <?php
            $camillaHospitalizacion = funcionMaster($idH, "idHospitalizacion", "camillaSelect", "hoIngresoHospitalizacion");
            $PisoHospitalizacion = funcionMaster($idH, "idHospitalizacion", "pisoSelect", "hoIngresoHospitalizacion");
            $HabitacionHospitalizacion = funcionMaster($idH, "idHospitalizacion", "habitacionSelect", "hoIngresoHospitalizacion");           
        ?>
        <label>Piso:</label><?php echo funcionMaster($PisoHospitalizacion, "id","despcripcion", "ho_piso");?> <br>
        <label>Habitación:</label><?php echo funcionMaster($HabitacionHospitalizacion, "idHospitalizacion", "habitacionSelect", "hoIngresoHospitalizacion");?><br>
        <label>Camilla:</label><?php echo funcionMaster($camillaHospitalizacion, "idCamilla","descripcion", "ho_camilla");?><br>

        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="width:33%">Piso</th>
                    <th scope="col" style="width:33%">Habitacion</th>
                    <th scope="col" style="width:33%">Camilla</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                    <select name="pisoSelect" id="pisoSelect" class="form-control select2" onchange="traerHabitaciones(this.value)" required>
                        <option value="">Seleccione</option>
                        <?php $queryPisos = mysqli_query($conn3, "SELECT * FROM ho_piso");
                            foreach ($queryPisos as $tablaPiso) {
                                echo "<option value=". $tablaPiso["id"] .">".$tablaPiso["despcripcion"]."</option>";
                            }

                        ?>
                    </select>
                    
                    </td>
                    <td>
                    <select name="habitacionSelect" id="habitacionSelect" class="form-control select2" onchange="traerCamillas(this.value)" required></select>
                    </td>
                    <td>
                    <select name="camillaSelect" id="camillaSelect" class="form-control select2" onchange="validarCamilla(this.value)" required></select>
                    </td>
                </tr>
                </tbody>
            </table>
            <label>Motivo del movimiento de camilla</label> 
            <textarea name="motivoMovimiento" class="form-control" required></textarea>
            

        </div>
        <script type="text/javascript">
            function traerHabitaciones(pisoSeleccionado) {
            $.ajax({
                type: "POST",
                url: "Ajax_Habitaciones_Hospitalizacion.php",
                data: {
                    pisoSeleccionado:pisoSeleccionado, 
                    tipo:"mostrarHabitaciones"
                },
                success: function(response) {
                    $('#habitacionSelect').html(response);
                    //alert(response)
                        
                }
            });
            }


            function traerCamillas(habitacionSeleccionada) {
            $.ajax({
                type: "POST",
                url: "Ajax_Habitaciones_Hospitalizacion.php",
                data: {
                    habitacionSeleccionada:habitacionSeleccionada, 
                    tipo:"mostrarCamillas"
                },
                success: function(response) {
                    $('#camillaSelect').html(response);
                    //alert(response)
                        
                }
            });
            }



        </script>

    </div>





    
    
</div>
</div>
<script>

var contadorVisitantes = 0;

function addVisitor() {
contadorVisitantes = Number(contadorVisitantes) + 1;
var nuevoCampoVisitante = `<div class="row" >
                                <div class="col-md-3">
                                <label>Nombre del Visitante:</label>
                                <input type="text" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][nombreVisitante]">
                                </div>
                                <div class="col-md-3">
                                <label>Parentesco que sostiene con el paciente</label>
                                <select name="visitantes[`+ contadorVisitantes +`][parentesco]" class="form-control select2">
                                    <option value="">Seleccione</option>
                                    <option value="Hijos">Hijos</option>
                                    <option value="Hermanos">Hermanos</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Tío">Tio</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                    <option value="Colega">Colega</option>
                                    <option value="Nieto">Nieto</option>
                                    <option value="Abuelo">Abuelo</option>
                                    <option value="Amigo">Amigo</option>
                                    <option value="Primo">Primo</option>
                                    <option value="Cónyuge">Cónyuge</option>
                                    <option value="Padres">Padres</option>
                                    <option value="Otro">Otro</option>
                                    <option value="No aplica">No aplica</option>
                                    <option value="Ninguno">Ninguno</option>
                                    
                                </select>
                                </div>
                                <div class="col-md-3">
                                <label>Hora de Ingreso</label>
                                <input type="time" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][horaIngreso]">
                                </div>
                                <div class="col-md-3">
                                <label>Hora estimada de salida</label>
                                <input type="time" class="form-control input-lg" name="visitantes[`+ contadorVisitantes +`][horaEstimadaSalida]">
                                </div>
                            </div>`;

$("#div-visitantes").append(nuevoCampoVisitante);

    }
</script>



<div class="col-xs-12" style="margin-top: 10px">
    <button type="submit" class="btn btn-primary" style="width: 100%;">G U A R D A R</button>
</div>


<!-- |=|=|=|=|=|=|= VISITANTES |=|=|=|=|=|=|========== -->
</div>
</form>

<?php } ?>



                <!--========= FORMULARIO MOVIMIENTO DE CAMILLA =================  -->



                

            </div>
          </div>

        </div>



          </div>
        </div>






    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>





<?php include("footer.php") ?>