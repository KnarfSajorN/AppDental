<?php
include 'funciones/header.php';

if ($idUsuario < 1) {
 echo "<script>alert('Debes de iniciar sesión'); window.location='login'</script>";
}
?>


<br>
<br>
<hr>

<!-- Start Content -->
<div id="content" class="section-padding">
  <div class="container">
    <div class="row">
     <?php include"menu.php" ?>

        <div class="col-sm-12 col-md-8 col-lg-9">
          <div class="page-content">
            <div class="inner-box">
              <div class="dashboard-box">
                <h2 class="dashbord-title">Citas agendadas</h2>
              </div>
              <div class="dashboard-wrapper">





<!--
                  <div class="dashboard-sections">
                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-write"></i></div>
                          <div class="contentbox">
                            <h2><a href="#">Total Ad Posted</a></h2>
                            <h3>480 Add Posted</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-add-files"></i></div>
                          <div class="contentbox">
                            <h2><a href="#">Featured Ads</a></h2>
                            <h3>80 Add Posted</h3>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
                        <div class="dashboardbox">
                          <div class="icon"><i class="lni-support"></i></div>
                          <div class="contentbox">
                            <h2><a href="#">Offers / Messages</a></h2>
                            <h3>2040 Messages</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                -->


                <table class="table table-responsive dashboardtable tablemyads w-100">
                  <thead>
                    <tr>

                      <th>Medico   </th>
                      <th>Fecha    </th>
                      <th>Hora     </th>
                      <th>Motivo   </th>

                      <th> -       </th>
                    </tr>
                  </thead>



                  <tbody>



                    <?php

        // $queryList=mysqli_query($conn3,"SELECT * FROM  c_citas where cliente_id = $idUsuario");
                    $queryList=mysqli_query($conn3,"SELECT c.*,ccl.id,u.empresaNombre from  citas c 
                      inner join cliente cl on c.idCliente=cl.cliente_id
                      inner join c_cliente ccl on cl.correo_cliente=ccl.usuarios
                      join usuarios u on c.doctor=u.id
                      where ccl.id=$idUsuario
                      ;");
                    $nrowl=mysqli_num_rows($queryList);
                    while($rowMotorizado=mysqli_fetch_array($queryList))
                    {


                      $idCitas=$rowMotorizado['idCitas'];
                      $doctor=$rowMotorizado['doctor'];
                      $fecha=$rowMotorizado['fecha'];
                      $Hora=$rowMotorizado['Hora'];
                      $nombre=$rowMotorizado['nombre'];
                      $telefono=$rowMotorizado['telefono'];
                      $correo=$rowMotorizado['correo'];
                      $motivoConsulta=$rowMotorizado['motivoConsulta'];
                      $estado=$rowMotorizado['estado'];
                      $registrado=$rowMotorizado['registrado'];
                      $usuario_id=$rowMotorizado['usuario_id'];
                      $tipo=$rowMotorizado['tipo'];
                      $idCliente=$rowMotorizado['idCliente'];
                      $videoPaciente=$rowMotorizado['videoPaciente'];
                      $videoDoctor=$rowMotorizado['videoDoctor'];
                      $estadoVideo=$rowMotorizado['estadoVideo'];
                      $autorizaFecha=$rowMotorizado['autorizaFecha'];
                      $autorizaHora=$rowMotorizado['autorizaHora'];
                      $autorizaIdUsuario=$rowMotorizado['autorizaIdUsuario'];
                      $autorizaNota=$rowMotorizado['autorizaNota'];
                      $id=$rowMotorizado['id'];
                      $empresaNombre=$rowMotorizado['empresaNombre'];

                      if ($tipo == 0) {
                        $tipoD = ' <a class="btn-action btn-view" title="Cita presencial " >P</a>';
                      }
                      elseif ($tipo == 1) {
                        $tipoD = ' <a class="btn-action btn-view" title="Cita Virtual " >V</a>';
                      }
                      elseif ($tipo == 2) {
                        $tipoD = ' <a class="btn-action btn-view" title="Cita Domiciliaria " >D</a>';
                      }

                      ?>

                      <tr data-category="active">
                        <td>
                          <?php echo $empresaNombre ?>
                        </td>
                        <td> 
                          <?php echo $fecha?>

                        </td>
                        <td>
                          <?php echo substr_replace($Hora, 0, 4)?>
                        </td>

                        <td data-title="Title">
                          <?php echo $motivoConsulta?>
                        </td>



                        <td data-title="Action">
                          <div class="btns-actions">

                            <?php echo $tipoD?>


                          </div>
                        </td>
                      </tr>

                      <?php
                    }
//  <a class="btn-action btn-delete" title="Cancelar cita" href="#"><i class="lni-trash"></i></a>
                    ?>








                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>      
  </div>
  <!-- End Content -->

  <?php
  include 'funciones/footer.php';
  ?>
