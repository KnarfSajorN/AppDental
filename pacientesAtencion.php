<?php
include 'header.php';
include 'menu.php'; 

if( isset( $_GET['fI']) || isset($_GET['fF'])){
  $fI = base64_decode($_GET['fI']);
  $fF = base64_decode($_GET['fF']);
}else{
  $fI = date("Y-m-d");
  $fF = date("Y-m-d");
}


$queryT = '';
if (isset($_GET['t'])) {
  $tipo = base64_decode($_GET['t']);

  if ($tipo == 1) {
    $queryT = ' AND activo=1';
  }else if ($tipo==2) {
    $queryT = ' AND activo=2';
  }

}



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Pacientes en Atención</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-md-12">
        <h4 class="Titulo_Pagina">Pacientes en Atención</h4>
        <div class="box">
          <div class="box-header">
            <!-- <a href="nuevoPaciente">
              <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
              </button>
            </a> -->
            <hr>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12 row" style="margin-bottom: 20px">
              <div class="col-md-3">
                <label for="">Fecha Incio</label>
                <input type="date" class="form-control" value="<?= date("Y-m-d") ?>" id="fInicio">
              </div>
              <div class="col-md-3">
                <label for="">Fecha Fin</label>
                <input type="date" class="form-control" value="<?= date("Y-m-d") ?>" id="fFin">
              </div>
              <div class="col-md-3">
                <label for="">Tipo</label>
                <select class="form-control" id="tipo">
                    <option value="0">Todos</option>
                    <option value="1">Activos</option>
                    <option value="2">Finalizados</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="">&nbsp;</label>
                <button onclick="consultar()" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><i class="fa-solid fa-magnifying-glass"></i>Consultar</button>
              </div>
            </div>

            <script>
              function consultar() {
                var fInicio = document.getElementById('fInicio').value;
                var fFin = document.getElementById('fFin').value;
                var tipo = document.getElementById('tipo').value;

                var ruta = 'pacientesAtencion.php?fI=' + btoa(fInicio) + '&fF=' + btoa(fFin) + "&t=" + btoa(tipo);

                window.location.href=ruta;

              }
            </script>

              <style>
                .scroll-p::-webkit-scrollbar{
                    width: 10px;
                    background-color: #D4D4D4;
                }
                .scroll-p::-webkit-scrollbar-thumb {
                  background: #17A2B8;
                  border-radius: 5px;
                }
              </style>
            
            <div class="col-md-12 row overflow-auto scroll-p" style="max-height:500px; overflow-y: scroll" >
              <!-- <table id="tablaA" class="table table-bordered table-striped" style="font-size:18px">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Fecha y hora de ingreso</th>
                    <th>Tiempo transcurrido</th>
                    <th>Doctor</th>
                    <th>Estado</th>
                  </tr>
                </thead>
                <tbody> -->
                    <?php 
                    $fechaHoy = date("Y-m-d");
                    $arrayDoctoresPresentes = array();
                    $queryAtendidos = mysqli_query($conn3, "SELECT * FROM paciente_atencion WHERE fecha BETWEEN '$fI' AND  '$fF'  $queryT ");
                    foreach ($queryAtendidos as $tablaAtendidos) {

                          if (!in_array($tablaAtendidos['usuarioId'] , $arrayDoctoresPresentes) ) {
                            array_push($arrayDoctoresPresentes, $tablaAtendidos['usuarioId']);
                          }

                          if ($tablaAtendidos['horaSalida'] <> '') {
                            //$horaComparar = $tablaAtendidos['horaSalida'];
                            $diferenciaMinutos = diferenciaHorasEnMinutos($tablaAtendidos['hora'],  $tablaAtendidos['horaSalida']);
                          }else{
                            $diferenciaMinutos = diferenciaHorasEnMinutos($tablaAtendidos['hora'],  date("H:i:s"));
                            //$horaComparar = date("Y-m-d");
                          }

                          
                          $fotoperfil = funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "fotoperfil", "cliente");
                          $genero = funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "genero", "cliente");

                          if (strlen($fotoperfil) > 0) {
                            $fotoperfil_img_U = $Base . 'pascientes/' . $fotoperfil . '';
                          } else {
                            if ($genero == "F") {
                              $fotoperfil_img_U = $Base . 'css/Mujer.png';
                            } else {
                              $fotoperfil_img_U = $Base . 'css/Hombre.jfif';
                            }
                          }



                          if ($tablaAtendidos['activo'] == 1) {
                              $icon = "<i class='fas fa-info' style='color:blue'></i> Activo";
                          }else{
                              $icon = "<i class='fas fa-check' style='color:green'></i> Finalizado";
                          }

                          ?>

                          <div class="card col-md-4">
                            <img src="<?= $fotoperfil_img_U ?>" style="width:95%;height:300px" class="card-img-top" alt="">
                            <div class="card-body">
                              <h5 class=""><?= funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "nombre_cliente", "cliente") ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Ingreso</b> <?= $tablaAtendidos['fecha']. " " . $tablaAtendidos['hora'] ?></li>
                              <li class="list-group-item"><b>Atendido por:</b> <?= funcionMaster($tablaAtendidos['usuarioId'], "ID", "NOMBRE_USUARIO", "usuarios") ?> </li>
                              <li class="list-group-item"><b>Estado:</b> <?= $icon  ?> </li>
                              <li class="list-group-item"></li>
                              <li class="list-group-item"></li>
                            </ul>

                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>CC.</b> <?= funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "CODI_CLIENTE", "cliente") ?></li>
                              <li class="list-group-item"><b>F. Nacimiento</b> <?= funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "fechaNacimiento", "cliente") ?></li>
                              <li class="list-group-item"> <b>Whatsapp</b> <?= funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "CODI_CLIENTE", "cliente") ?></li>
                              <li class="list-group-item"></li>
                            </ul>
                            <div class="card-body">
                              <a href="HC_HistorialGeneral?cI=<?= encrypt($tablaAtendidos['clienteId']) ?>" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Ver historial</a>
                              <a href="SgenerarFactura?clienteId=<?= $tablaAtendidos['clienteId']?>" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Facturar</a>
                            </div>
                          </div>

                        <!-- // echo "<tr>
                        //         <td>".funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "nombre_cliente", "cliente")."</td>
                        //         <td>".funcionMaster($tablaAtendidos['clienteId'], "cliente_id", "CODI_CLIENTE", "cliente")."</td>
                        //         <td>".$tablaAtendidos['fecha']. " " . $tablaAtendidos['hora'] ."</td>
                        //         <td>".$diferenciaMinutos ." Minutos </td>
                        //         <td>".funcionMaster($tablaAtendidos['usuarioId'], "ID", "NOMBRE_USUARIO", "usuarios")."</td>
                        //         <td>".$icon."</td>
                        //     </tr>"; -->
                    <?php }
                    
                    ?>
                <!-- </tbody>
              </table> -->
            </div>
            <br>
            <h4 class="Titulo_Pagina">Tiempo promedio de atención por especialista</h4>
            <div class="col-md-12 row">
              <?php 
                foreach ($arrayDoctoresPresentes as $idDoctor) {
                  $queryCitasUsuario = mysqli_query($conn3, "SELECT * FROM paciente_atencion WHERE usuarioId ='$idDoctor' and fecha BETWEEN '$fI' AND  '$fF'  $queryT ");

                  $totalAtenciones = mysqli_num_rows($queryCitasUsuario);
                  $totalDiferenciaMinutos = 0;
                  foreach ($queryCitasUsuario as $tablaAtenciones) {
                    if ($tablaAtendidos['horaSalida'] <> '') {
                      //$horaComparar = $tablaAtendidos['horaSalida'];
                      $diferenciaMinutos = diferenciaHorasEnMinutos($tablaAtenciones['hora'],  $tablaAtenciones['horaSalida']);
                    }else{
                      $diferenciaMinutos = diferenciaHorasEnMinutos($tablaAtenciones['hora'],  date("H:i:s"));
                      //$horaComparar = date("Y-m-d");
                    }
                    // echo $diferenciaMinutos;

                    // $diferenciaMinutos = diferenciaHorasEnMinutos($tablaAtendidos['hora'],  $tablaAtendidos['horaSalida']);

                    $totalDiferenciaMinutos += $diferenciaMinutos;
                  }
                  
                  if($totalAtenciones <> 0){
                    $promedioConsulta = intval($totalDiferenciaMinutos) / intval($totalAtenciones);
                  }else{
                    $promedioConsulta = 0;
                  }
                  
                  
                  ?>
                <div class="card border-info col-md-4" >
                  <div class="card-header bg-info border-info"><?= strtoupper(reem_alreves(funcionMaster($idDoctor, "ID", "NOMBRE_USUARIO", "usuarios"))) ?></div>
                  <div class="card-body text-dark">
                    <h5 class="">Numero de atenciones</h5>
                    <h4 class=""><?= $totalAtenciones ?></h3>
                    <h5 class="">Tiempo promedio de consulta</h5>
                    <h4 class=""><?= round($promedioConsulta) . " minutos" ?></h3>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  </div>
                </div>


          <?php } ?>
            </div>


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>


$(document).ready(function() {
    $('#tablaA').DataTable(); // Inicializar DataTables en la tabla con el id "miTabla"
});
</script>

<?php
include("footer.php");
