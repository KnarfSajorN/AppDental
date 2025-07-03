<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinica1 = $_GET['historiaClinica1'];
  $historiaClinica2 = $_GET['historiaClinica2'];
  $historiaClinica3 = $_GET['historiaClinica3'];
  $historiaClinica4 = $_GET['historiaClinica4'];
  $historiaClinica5 = $_GET['historiaClinica5'];



 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];             
              $receta     =$rowMotorizado['receta'];             
            }
 
?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
 
 <br>
 <br>
 <div align="center">
  
<a class="btn btn-app" href="<?php echo $Base;?>buscarpaciente"> 
  <i class="fa fa-heartbeat"></i> Nuevo consulta
</a>

<a class="btn btn-app" href="<?php echo $Base;?>calendarioagenda"> 
  <i class="fa fa-calendar-check-o"></i> Agregar Cita
</a>

<a class="btn btn-app" href="<?php echo $Base;?>SclienteAdministracion_facturas"> 
  <i class="fa fa-plus"></i> Facturas
</a>
 

</div>



<hr>  


<div align="center">
   <!--
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirRecetaH.php?idr=<?php echo $receta?>&cliente=<?php echo $cliente_id ?>"> 
  <i class="fa fa-print"></i> Imprimir Receta medica 
</a>

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> 

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirDiscapacidad.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Incapacidad
</a>


<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Examenes
</a>   -->
 
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirHistoriaN.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Consulta
</a>

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirtest.php?historiaClinica1=<?php echo $historiaClinica3;?>"> 
  <i class="fa fa-print"></i> Imprimir Test Coronavirus
</a> 

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirOrdenLab.php?historiaClinica1=<?php echo $historiaClinica2;?>"> 
  <i class="fa fa-print"></i> Imprimir orden laboratorio
</a>  
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirImagenologia.php?historiaClinica1=<?php echo $historiaClinica4;?>"> 
  <i class="fa fa-print"></i> Imprimir Imagenologia 
</a>

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirRecetaH.php?idr=<?php echo $receta?>&cliente=<?php echo $cliente_id ?>"> 
  <i class="fa fa-print"></i> Imprimir Receta medica 
</a>
</div>


<div align="center">


<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>pruebareceta.php?idr=<?php echo $receta?>&cliente=<?php echo $cliente_id ?>"> 
  <i class="fa fa-send-o"></i> Enviar Receta 
</a> 
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>enviarLaboratorio.php?historiaClinica1=<?php echo $historiaClinica2;?>">
  <i class="fa fa-send-o"></i> Enviar Orden Laboratorio
</a>
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>enviarImagenologia.php?historiaClinica1=<?php echo $historiaClinica4;?>">
  <i class="fa fa-send-o"></i> Enviar Imagenologia
</a>

</div>


  <!--
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirTratamiento.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-print"></i> Imprimir Tratamiento
</a> 

<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>enviarIncapacidadH.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-send-o"></i> Enviar Incapacidad
</a>


<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>enviarExamenesH.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-send-o"></i> Enviar Examenes
</a>
 
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>enviarConsultaH.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-send-o"></i> Enviar Consulta
</a>
</div>  -->
 
<div align="center">
   <hr>



</div>


   
  <div align="center">
   



<?php

$queryList=mysqli_query($conn3,"SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = '0'");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $firma = $rowMotorizado['firma']; 
}

if (strlen($firma)>10) 
{
    //echo "<img src='$firma'>";
}

else
{

?>

<a class="btn btn-app" target="_blank"  href="<?php echo $Base;?>firma/firmardocumento/<?php echo $historiaClinica1;?>/0/<?php echo $cliente_id;?>" > 
    <i class="fa fa-pencil-square-o" ></i> Solicitar Firma 
  </a>

  <!--<div id="div-results"></div>-->

<?php

}
 




 
  ?> 
 
   
  </div>






<!--
<div align="center">
 
 
  <a class="btn btn-app" target="_blank" href="<?php echo $Base;?>firma/firmar.php?id=<?php echo $historiaClinica1;?>" > 

  
 <input type="number" name="numeroW"> 
  
 <a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimirExamenes.php?historiaClinica1=<?php echo $historiaClinica1;?>"> 
  <i class="fa fa-pencil-square-o"></i> Enviar Solicitud a whatsapp 
</a>
  
</div>
 
-->
  </section>




<!--

<div align="center">
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>vercliente.php?clienteId=<?php echo $cliente_id;?>"> 
  <i class="fa fa-print"></i> Imprimir Toda la Historia
</a>
 


</div>


 -->

     
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
           
<?php include("footer.php")?>




 <script type="text/javascript">


      function solicitarFirma1(){
// estas son las variables que enviamos


        var fecha = $("#id").val();
//        var Hora = $("#Hora").val();
//        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_solicitarFirma.php",
            data: {id:id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };
  
 
</script>    



