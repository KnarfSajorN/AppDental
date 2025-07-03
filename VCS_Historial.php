<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];

if (isset($_GET['Aplicar'])) {
  $id = $_GET['Aplicar'];

  ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////

  $Campo1 = mysqli_query($conn3, "show COLUMNS from VCS_VacunasAplicadas WHERE Field = 'Fecha_Aplicado';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
      mysqli_query($conn3, "ALTER TABLE `VCS_VacunasAplicadas` ADD `Fecha_Aplicado` text NULL DEFAULT '' COMMENT ' Fecha que se aplico la vacuna *Creado desde modulo de Vacunas*'");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from VCS_VacunasAplicadas WHERE Field = 'Recordatorio_Enviado';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
      mysqli_query($conn3, "ALTER TABLE `VCS_VacunasAplicadas` ADD `Recordatorio_Enviado` text NULL DEFAULT 'No' COMMENT ' Recordatorio Vacuna *Creado desde modulo de Vacunas*'");
  }
  ////////////////////////////// FIN CREACION DE TABLAS ///////////////////////////////////////////////
  //fecha de hoy
  $fecha = date("Y-m-d");

  $queryList = mysqli_query($conn3, "UPDATE VCS_VacunasAplicadas SET Aplicado='Si', Fecha_Aplicado='{$fecha}' WHERE id = '{$id}' limit 1;");

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$clienteId}&error=Hubo Un Error Al Actualizar Los Datos'</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$clienteId}&msg=Se Actualizo La Vacuna Correctamente'</script>";
  }
}


if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Clinico</a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12" style="height: 280px;">
        <?php include 'Modulos_Estilos/DatosPersonales.php';
        echo Datos_Personales($clienteId);
        ?>
      </div>
      <div class="box" style="display: grid;">
        <div class="card-body">
          <div align="center">
            <a class="btn btn-primary" href="VCS_AplicarVacuna.php?clienteId=<?php echo $clienteId; ?>" role="button" style="margin-top: 15px;"> <i class="fa fa-heartbeat"></i> Aplicar Nueva Vacuna </a>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>
  <style>
    .table-striped>tbody>tr:nth-of-type(odd) {
      background-color: aliceblue;
    }
  </style>
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Vacunas a aplicar </a></li>
            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Vacunas Aplicadas</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">

                <table class="table table-striped table-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" style='width: 10%;text-align:center;'>Fecha</th>
                      <th scope="col" style='width: 10%;text-align:center;'>Nombre</th>
                      <th scope="col" style='width: 30%;text-align:center;'># Dosis</th>
                      <th scope="col" style='width: 50%;text-align:center;'>Accion</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: aliceblue;">
                    <?php
                    $Numero_Operacion_tmp = mysqli_fetch_array(mysqli_query($conn3, "SELECT MAX(Numero_Operacion) FROM VCS_VacunasAplicadas WHERE cliente_id = $clienteId"))[0] + 1;
                    $queryList = mysqli_query($conn3, "SELECT * FROM  VCS_VacunasAplicadas WHERE cliente_id = '{$clienteId}' AND Activo='1' AND Aplicado='No' ORDER BY Numero_Operacion DESC");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                     
                      $id = $rowMotorizado['id'];
                      $Nombre = $rowMotorizado['Nombre'];
                      $Fecha = $rowMotorizado['Fecha'];
                      $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                      $Numero_Aplicacion = $rowMotorizado['Numero_Aplicacion'];
                      $Numero_Operacion = $rowMotorizado['Numero_Operacion'];
                      $Observaciones = $rowMotorizado['Observaciones'];

                      if ($Numero_Operacion_tmp > $Numero_Operacion) {
                        $Contador=0;
                        $Numero_Operacion_tmp = $Numero_Operacion;
                        echo "<tr>";
                        echo "<td colspan='4' style='text-align:center;background-color:#4cbd4f24'><b> Operacion: " . $Numero_Operacion . "</b> <i class='far fa-calendar-alt'></i> $Fecha_Registro </td>";
                        echo "</tr>";

                        //sql cantidad de campos que tiene comofiltro Numero_Operacion
                        $queryList2 = mysqli_query($conn3, "SELECT * FROM  VCS_VacunasAplicadas WHERE cliente_id = '{$clienteId}' AND Activo='1' AND Aplicado='No' AND Numero_Operacion = '{$Numero_Operacion}'");
                        $nrowVacunas = mysqli_num_rows($queryList2);
                      }
                      $Contador++;

                      echo "<tr>";
                      echo "<td style='text-align:center;'>" . $Fecha . "</td>";
                      echo "<td style='text-align:center;'>" . $Nombre . "</td>";
                      echo "<td style='text-align:center;'>" . $Numero_Aplicacion . "</td>";
                      echo "<td style='text-align:center;'><a class='btn btn-primary' href='VCS_Historial.php?clienteId={$clienteId}&Aplicar={$id}' role='button' style='margin-top: 15px;'> <i class='fa fa-heartbeat'></i> Aplicar Vacuna </a></td>";
                      echo "</tr>";

                      if($nrowVacunas==$Contador){
                        if($Observaciones!=""){
                          echo "<tr>";
                          echo "<td colspan='4' style='text-align:center;background-color:#5f686024'><b> Observaciones: <br> " . $Observaciones . "</b> </td>";
                          echo "</tr>";
                        }
                      }
                    }
                    
                    ?>
                  </tbody>
                </table>

              </div>
              <!--final accordion-->   




            </div>
            <!-- cierre seccion 1-->



            <!-- inicio seccion 2 -->
            <div role="tabpanel" class="tab-pane fade" id="Section2">

              <div class="panel panel-default" style="background: #f1f1f1;">
                <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                  <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#TablaVacunacion" aria-expanded="false" aria-controls="TablaVacunacion">
                     Tabla Vacunación
                    </a>
                  </h4>
                </div>
                <div id="TablaVacunacion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                  <div class="panel-body">
                    
                  <table class="table table-striped table-dark">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" style='width: 10%;text-align:center;'>Edad [Categoria]</th>
                          <th scope="col" style='width: 30%;text-align:center;'>Vacuna</th>
                          <th scope="col" style='width: 50%;text-align:center;'>Dosis</th>
                          <th scope="col" style='width: 50%;text-align:center;'>Fecha Aplicación</th>
                        </tr>
                      </thead>
                      <tbody style="background-color: aliceblue;">

                      <?php
                        $Numero_Operacion_tmp = mysqli_fetch_array(mysqli_query($conn3, "SELECT MAX(Numero_Operacion) FROM VCS_VacunasAplicadas WHERE cliente_id = $clienteId  "))[0] + 1;
                        $queryList = mysqli_query($conn3, "SELECT * FROM  VCS_VacunasAplicadas WHERE cliente_id = '{$clienteId}' AND Activo='1' AND Aplicado='Si' ORDER BY Numero_Operacion DESC");
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                          $id = $rowMotorizado['id'];
                          
                          $categoria_id = $rowMotorizado['categoria_id'];
                          $Nombre = $rowMotorizado['Nombre'];
                          $Numero_Aplicacion = $rowMotorizado['Numero_Aplicacion'];
                          $Fecha_Aplicado = $rowMotorizado['Fecha_Aplicado'];

                          //arreglo multidimensional CategoriaVacunas[$categoria_id] = push array
                          $CategoriaVacunas[$categoria_id][] = array(
                            'id' => $id,
                            'Nombre' => $Nombre,
                            'Numero_Aplicacion' => $Numero_Aplicacion,
                            'Fecha_Aplicado' => $Fecha_Aplicado
                          );
                        }

                        //echo arreglo
                        /*
                        echo "<pre>";
                        print_r($CategoriaVacunas);
                        echo "</pre>";*/

                        foreach ($CategoriaVacunas as $key => $value) {
                          //legth del arreglo $value
                          $length = count($value);
                          //tr colspan legth con el $key=funcionMaster
                          echo "<tr>";
                          echo "<td rowspan='{$length}' style='text-align:center;background-color:#4cbd4f24'><b>" .funcionMaster($key,'id','Nombre','VCS_Categoria'). "</b> </td>";
                          echo "";
                          //foreach $value
                          foreach ($value as $key2 => $value2) {
                            //echo $value2['Nombre'];
                            
                            echo "<td style='text-align:center;'>" . $value2['Nombre'] . "</td>";
                            echo "<td style='text-align:center;'>" . $value2['Numero_Aplicacion'] . "</td>";
                            echo "<td style='text-align:center;'>" . $value2['Fecha_Aplicado'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                          }
                        }
                        ?>
                        
                      </tbody>
                      </table>

                      

                  </div>
                </div>
              </div>
              <!--inicio accordion-->
              <div class="col-md-12">
                <button onclick="window.location.href='VCS_ImprimirVacunas.php?clienteId=<?php echo $clienteId;?>'" style="font-size: 20px;width: 100%;" class="btn btn-primary" ><i class="iconify" data-icon="gridicons:print"></i> Imprimir </button>
                <table class="table table-striped table-dark">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" style='width: 10%;text-align:center;'>Fecha</th>
                      <th scope="col" style='width: 30%;text-align:center;'># Dosis</th>
                      <th scope="col" style='width: 50%;text-align:center;'>Fecha de aplicacion de la vacuna</th>
                    </tr>
                  </thead>
                  <tbody style="background-color: aliceblue;">

                    <?php
                    $Numero_Operacion_tmp = mysqli_fetch_array(mysqli_query($conn3, "SELECT MAX(Numero_Operacion) FROM VCS_VacunasAplicadas WHERE cliente_id = $clienteId  "))[0] + 1;
                    $queryList = mysqli_query($conn3, "SELECT * FROM  VCS_VacunasAplicadas WHERE cliente_id = '{$clienteId}' AND Activo='1' AND Aplicado='Si' ORDER BY Numero_Operacion DESC");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $id = $rowMotorizado['id'];
                      $Nombre = $rowMotorizado['Nombre'];
                      $Fecha = $rowMotorizado['Fecha'];
                      $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                      $Numero_Aplicacion = $rowMotorizado['Numero_Aplicacion'];
                      $Numero_Operacion = $rowMotorizado['Numero_Operacion'];
                      $Observaciones = $rowMotorizado['Observaciones'];
                      $Fecha_Aplicado = $rowMotorizado['Fecha_Aplicado'];

                      if ($Numero_Operacion_tmp > $Numero_Operacion) {
                        $Numero_Operacion_tmp = $Numero_Operacion;
                        echo "<tr>";
                        //icono date fontawesome
                        echo "<td colspan='3' style='text-align:center;background-color:#4cbd4f24'><b> Operacion: " . $Numero_Operacion . "</b> <i class='far fa-calendar-alt'></i> $Fecha_Registro </td>";
                        echo "</tr>";
                      }

                      echo "<tr>";
                      echo "<td style='text-align:center;'>" . $Fecha . "</td>";
                      echo "<td style='text-align:center;'>" . $Numero_Aplicacion . "</td>";
                      echo "<td style='text-align:center;'>{$Fecha_Aplicado}</td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>


              </div>

            </div>
            <!-- cierre seccion 2-->   

          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>
</div>


<?php
include 'footer.php';

?>