<?php
include 'header.php';
include 'menu.php';

$historiaClinica1 = $_GET['historiaClinica1'];



$queryList = mysqli_query($conn3, "SELECT * FROM  evoluciones where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $id_historiaClinica     = $rowMotorizado['id_historiaClinica'];
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
    <div class="box-body">
    <br>
    <br>
    <div align="center">

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>GO_Pacientes_Ginecobstetrica">
        <i class="fa fa-heartbeat"></i> Nueva Consulta
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>agregarCitas">
        <i class="fa fa-calendar-check-o"></i> Agregar Cita
      </a>

      <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
        <i class="fa fa-plus"></i> Facturas
      </a>


    </div>



    <hr>


    <div align="center">



      <!--<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> -->


      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>GO_Imprimir_Evoluciones_Ginecobstetricas?historiaClinica1=<?php echo $historiaClinica1; ?>">
        <i class="fa fa-print"></i> Imprimir Evolución
      </a>


      <!--<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirRecetaSeguimiento.php?id_historiaClinica=<?php echo $id_historiaClinica ?>&idr=<?php echo $receta ?>&cliente=<?php echo $cliente_id ?>&historia=<?php echo $historiaClinica1 ?>"> 
  <i class="fa fa-print"></i> Imprimir Receta medica 
</a>


<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirOrdenLab.php?historiaClinica1=<?php echo $historiaClinica2; ?>"> 
  <i class="fa fa-print"></i> Imprimir orden de laboratorio
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirImagenologia.php?historiaClinica1=<?php echo $historiaClinica4; ?>"> 
  <i class="fa fa-print"></i> Imprimir Imagenologia 
</a>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirendoscopia.php?historiaClinica1=<?php echo $historiaClinica4; ?>"> 
  <i class="fa fa-print"></i> Imprimir Endoscopia 
</a>-->



    </div>

    <!--
    <div align="center">
      <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>EnviarEvolucion.php?historiaClinica1=<?php echo $historiaClinica1 ?>">
        <i class="fa fa-send-o"></i> Enviar Consulta
      </a>

    </div>
    -->
    <!-- tabs -->
    <div class="container" style="background: aliceblue;">
      <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
        <ul>
          <li>
            <h1 class="txt_rsp">Archivos de Consulta</h1>
            <table class="table table-responsive" style="display: inline-table!important;">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre Archivo</th>
                  <th scope="col">Fecha</th>
                  <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-camera" aria-hidden="true"></i></th>
                  <!--<th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>-->
                </tr>
              </thead>
              <tbody>
                <?php
                // $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$cliente_id'");
                $queryImg = mysqli_query($conn3, "SELECT * FROM archivos WHERE historia_id = '$historiaClinica1' and estado='1' and Realizado_Desde = 'evoluciones'");
                $nrowlER = mysqli_num_rows($queryImg);
                while ($resulImg = mysqli_fetch_array($queryImg)) {
                  $contador++;
                  $Producto = $resulImg['id'];
                  // $NombreC = $resulImg['NombreC'];
                ?>
                  <tr>
                    <td>
                      <?php echo $contador ?>
                    </td>
                    <!-- <td>
                   <?php echo $resulImg['NombreVisual']; ?>
                 </td> -->
                    <td>
                      <?php
                      if (empty($resulImg['NombreVisual'])) {
                        echo $resulImg['NombreC'];
                      } else {
                        echo $resulImg['NombreVisual'];
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $resulImg['fecha']; ?>
                    </td>
                    <td style="text-align: center;">
                      <a> <img src="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" width="100" height="100" alt="" /></a>
                    </td>
                    <!--
                    <td style="text-align: center;">
                      <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $cliente_id; ?>&id=<?php echo $Producto; ?>">
                        Enviar Archivo <br>
                      </a>
                    </td>
                    -->
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </li>
        </ul>
      </div>
    </div>

    <!--/ tabs -->


    <!--
<div align="center">

<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>enviarRecetaH.php?idr=<?php echo $receta ?>&cliente=<?php echo $cliente_id ?>"> 
  <i class="fa fa-send-o"></i> Enviar Receta medica 
</a>
 
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> 
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>enviarIncapacidadH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Incapacidad
</a>


<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>enviarExamenesH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Examenes
</a>
 
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>enviarConsultaH.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-send-o"></i> Enviar Consulta
</a>
</div> 

 


   
  <div align="center">
   



<?php

$queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = '0'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $firma = $rowMotorizado['firma'];
}

if (strlen($firma) > 10) {
  //echo "<img src='$firma'>";
} else {

?>

<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"  href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/0/<?php echo $cliente_id; ?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma 
  </a>

  <!--<div id="div-results"></div>

<?php

}






?> 
 
   
  </div>



-->


    <!--
<div align="center">
 
 
  <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>firma/firmar.php?id=<?php echo $historiaClinica1; ?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1; ?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 

  






<div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>vercliente.php?clienteId=<?php echo $cliente_id; ?>"> 
  <i class="fa fa-print"></i> Imprimir Toda la Historia
</a>
 
 

</div>


-->
</div>
</div>
</section>

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

<?php include("footer.php") ?>




<script type="text/javascript">
  function solicitarFirma1() {
    // estas son las variables que enviamos


    var fecha = $("#id").val();
    //        var Hora = $("#Hora").val();
    //        var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "ajax_solicitarFirma.php",
      data: {
        id: id
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };
</script>