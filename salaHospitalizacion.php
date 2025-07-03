<?php
include 'header.php';
include 'menu.php';
$usuarioId = $_SESSION['ID'];
$pisoSeleccionado = $_GET['idP'];

if (!isset($pisoSeleccionado) || $pisoSeleccionado == "") {
    $pisoSeleccionado = funcionMaster("Piso 1", "despcripcion", "id", "ho_piso");
}

$LogoF =  funcionMaster($usuarioId, "ID_Usuario", "logoF", "config");
$directorio = $Base.'/'.'logos'.'/'.$LogoF;
$logoImg = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$usuarioActual = $_SESSION['ID'];
$permisosHospitalizacion = funcionMaster($usuarioActual, "ID", "permisosHospitalizacion", "usuarios");

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
          Hospitalizacion
        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#"><i class="fa fa-dashboard"></i> Hospitalizacion </a></li>
          <li><a href="#">Control de Hospitalizacion</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div>
          <div class="col-xs-12">

            <div class="box">
                <h3>Control de hospitalizacion</h3>
                <!-- <h3><?php //echo 'documentosFormulario?cI='. encrypt(114). '&pGi=OsBytGjsOEMQ=='; ?></h3> -->
                <label for="selectPiso">Piso</label>
                <select class="form-control select2" onchange="window.location.href='salaHospitalizacion.php?idP=' + this.value">
                    <option value="">Seleccionar Piso</option>
                    <?php 
                        $queryPiso = mysqli_query($conn3, "SELECT * FROM ho_piso");
                        foreach ($queryPiso as $tablaPiso) {
                          echo "<option value='".$tablaPiso['id']."'>".$tablaPiso['despcripcion']."</option>";
                        }
                    ?>  
                </select>
                
                <div class="row" >
                    <?php $queryHabitacionespiso = mysqli_query($conn3, "SELECT * FROM ho_habitaciones WHERE pisoId = $pisoSeleccionado");
                            //INICIO BUCLE EXTRAER HABITACIONES DE PISO
                            foreach ($queryHabitacionespiso as $tablaHabitaciones) {
                                    $idHabitacion = $tablaHabitaciones["idHabitacion"];
                                ?>
                            <div class="card" style="margin-top: 10px;width:100%">
                            <div class="card-header">
                                <?php echo "<h5> " . funcionMaster($pisoSeleccionado, "id", "despcripcion", "ho_piso")  . " - " .$tablaHabitaciones['descripcion'] . "</h5>" ?>
                            </div>
                            <div class="card-body row">
                                <?php 
                                //INICIO ==> SE ESTRAEN LAS CAMILLAS DE CADA UNO DE LOS PISOS Y SE BUSCAN HOSPITALIZACIONES ACTIVOS DE ESTA CAMILLA
                                $queryCamillasHabs = mysqli_query($conn3, "SELECT * FROM ho_camilla WHERE idHabitacion= $idHabitacion ");
                                    foreach ($queryCamillasHabs as $tablaCamillasHabs){ 
                                        $idCamillaTC = $tablaCamillasHabs["idCamilla"];
                                        $camillaDisponible = $tablaCamillasHabs["disponible"];

                                        if($camillaDisponible == 1){
                                            $colorContornoD = "#77E69C";
                                        }else{
                                            $colorContornoD = "#5B97E5";
                                        }

                                        //INICIO ==> QUERY PARA BUSCAR HOSPITALIZACIONES ACTIVAS SEGUN EL ID DE CAMILLA
                                        if($camillaDisponible == 0){
                                            $queryHospitalizacionesCamilla = mysqli_query($conn3, "SELECT * FROM hoIngresoHospitalizacion WHERE camillaSelect = $idCamillaTC AND hospitalizacionActiva = 1");
                                            foreach($queryHospitalizacionesCamilla  as $tablaHospitalizacionCamilla ){
                                                $clienteHospitalizacion = $tablaHospitalizacionCamilla["cliente_id"];
                                                $idHospitalizacion = $tablaHospitalizacionCamilla["idHospitalizacion"];
                                                $clienteHospitalizacion = $tablaHospitalizacionCamilla["cliente_id"];
                                                $fotoperfil = funcionMaster($clienteHospitalizacion, "cliente_id", "fotoperfil", "cliente");
                                                $genero = funcionMaster($clienteHospitalizacion, "cliente_id", "genero", "cliente");
                                                $nombrePaciente = funcionMaster($clienteHospitalizacion, "cliente_id", "nombre_cliente", "cliente");
    
    
    
    
    
                                                if (strlen($fotoperfil) > 0) {
                                                    $fotoperfil_img = $Base.'pascientes/' . $fotoperfil . '';
                                                } else {
                                                    if ($genero == "F") {
                                                        $fotoperfil_img = $Base .'/css/Mujer.png';
                                                    } else {
                                                        $fotoperfil_img = $Base. '/css/Hombre.jfif';
                                                    }
                                                }
    
    
                                                
                                                ?>
                                                <div class="card col-md-3" style="width: 18rem; border: 2px solid <?php echo $colorContornoD ?>; margin:10px ">
                                                    <img class="card-img-top" src="<?php echo $fotoperfil_img ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h3><?php echo $nombrePaciente ?> </h3>
                                                        <h5 class="card-title">Camilla <?php echo funcionMaster($idCamillaTC, "idCamilla", "descripcion", "ho_camilla") ?></h5>
                                                        
                                                    </div>
                                                    <div class="card-body" style="margin-top:0; padding-top: 0;">
                                                    <?php if (strpos($permisosHospitalizacion, "Suministro de medicamentos") !== false) {?>
                                                        <a style="margin-right:10px" href="accionesHospitalizacion.php?idH=<?php echo $idHospitalizacion?>&tipo=suministroMedicamentos" title="Suministro de Medicamentos"><i class="fa-solid fa-pills"></i></a>
                                                    <?php } ?>

                                                    <?php if (strpos($permisosHospitalizacion, "Suministro de alimentos") !== false) {?>
                                                        <a style="margin-right:10px" href="accionesHospitalizacion.php?idH=<?php echo $idHospitalizacion?>&tipo=suministroAlimentacion" title="Suministro de Alimentos"><i class="fa-solid fa-utensils"></i></a>
                                                    <?php } ?>

                                                    <?php if (strpos($permisosHospitalizacion, "Notas de enfermeria") !== false) {?>
                                                        <a style="margin-right:10px" href="accionesHospitalizacion.php?idH=<?php echo $idHospitalizacion?>&tipo=notasEnfermeria" title="Notas de enfermería"><i class="fa-solid fa-user-nurse"></i></a>
                                                    <?php } ?>

                                                    <?php if (strpos($permisosHospitalizacion, "Registro de visitantes") !== false) {?>
                                                        <a style="margin-right:10px" href="accionesHospitalizacion.php?idH=<?php echo $idHospitalizacion?>&tipo=registroVisitantes" title="Visitantes"><i class="fa-solid fa-user-group"></i></a>
                                                    <?php } ?>

                                                    <?php if (strpos($permisosHospitalizacion, "Trasladar camilla") !== false) {?>
                                                        <a style="margin-right:10px" href="accionesHospitalizacion.php?idH=<?php echo $idHospitalizacion?>&tipo=movimientoCamilla" title="Trasladar al paciente"><i class="fa-solid fa-bed"></i></a>
                                                    <?php } ?>

                                                   <a style="margin-right:10px" href="historialHospitalizacion.php?idH=<?php echo $idHospitalizacion?>" title="Historial"><i class="fa-solid fa-magnifying-glass"></i></a>

                                                    <?php if (strpos($permisosHospitalizacion, "Dar de alta") !== false) {?>
                                                        <a style="margin-right:10px" href="#" title="Cerrar hospitalizacion [No reversible]" onclick="validarAntesDe(<?php echo $idHospitalizacion ?>)"><i class="fa-solid fa-hourglass-end"></i></a>
                                                    <?php } ?>
                                                    </div>
                                                </div>
                                                
                                            <?php }}else{?>
                                                <div class="card col-md-3" style="width: 18rem; border: 2px solid <?php echo $colorContornoD ?>;margin:10px  ">
                                                    <img class="card-img-top" src="css/Hombre.jfif" alt="Card image cap" data-bs-toggle="modal" data-bs-target="#modalAbrirHospitalizacion">
                                                    <div class="card-body">
                                                        <h3 style="color:5B97E5">Disponible</h3>
                                                        <h5 class="card-title">Camilla <?php echo funcionMaster($idCamillaTC, "idCamilla", "descripcion", "ho_camilla") ?></h5>
                                                        
                                                    </div>
                                                    <div class="card-body" style="margin-top:0; padding-top: 0;">
                                                    </div>
                                                </div>
                                                
                                            <?php } ?>
                                        
                                        <!-- //FIN ==> QUERY PARA BUSCAR HOSPITALIZACIONES ACTIVAS SEGUN EL ID DE CAMILLA  -->
                                    <?php }
                                    
                                //FIN ==> SE ESTRAEN LAS CAMILLAS DE CADA UNO DE LOS PISOS Y SE BUSCAN HOSPITALIZACIONES ACTIVOS DE ESTA CAMILLA?>

                                            <script>
                                                function validarAntesDe(idHospitalizacion){
                                                    Swal.fire({
                                                        title: '¿Estás seguro de finalizar esta hospitalizacion?',
                                                        text: 'Esta acción no se puede deshacer',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonText: 'Sí',
                                                        cancelButtonText: 'No'
                                                        }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.href='guardarAccionHospitalizacion.php?idHos=' + idHospitalizacion;
                                                        } else if (result.dismiss === Swal.DismissReason.cancel) {

                                                        }
                                                    });
                                                }
                                            </script>

                            </div>
                            </div>

                                
                            <?php } ?>
                            <!-- //FIN  BUCLE EXTRAER HABITACIONES DE PISO -->
                    
                </div>




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