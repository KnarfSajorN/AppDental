<?php
 
    include 'header.php';
    include 'menu.php';

  $historiaClinica1 = $_GET['historiaClinica1'];



 $queryList=mysqli_query($conn3,"SELECT * FROM procedimientos where ID = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

               $cliente_id      =$rowMotorizado['id_cliente'];
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

 

  </section>





<div align="center">
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>SgenerarFactura.php?historiaClinica1=<?php echo $historiaClinica1;?>&clienteId=<?php echo $cliente_id;?>&tipo_historia=1 "> 
  <i class=""></i> Facturar Procedimiento
</a>
 
 

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



