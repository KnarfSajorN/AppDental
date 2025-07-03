<?php
 
    include 'header.php';
    include 'menu.php';

  $historia = $_GET['historia'];



 $queryList=mysqli_query($conn3,"SELECT * FROM  historia_psicosocial where id = $historia");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];                        
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

<hr>  

 
<div align="center">
 
<a class="btn btn-app" target="_blank" href="<?php echo $Base;?>imprimir_historia_PsicoSocial.php?historia=<?php echo $historia;?>"> 
  <i class="fa fa-print"></i> Imprimir Historia
</a>

</div>


<div align="center">
   <hr>



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



