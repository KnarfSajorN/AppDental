   <?php 
   include 'header.php';
   include 'menu.php'; 



            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 

 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
                    $nombre_cliente=$rowMotorizado['nombre_cliente'];
                    $celular =$rowMotorizado['celular_cliente'];
                    $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
                    $correo_cliente=$rowMotorizado['correo_cliente'];
                    $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
                    $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
                    $tipo_cliente=$rowMotorizado['tipo_cliente'];
                    $fechar=$rowMotorizado['fechar'];
                    $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
                    $activo=$rowMotorizado['activo'];
                    $genero=$rowMotorizado['genero'];
                    $direccion_cliente=$rowMotorizado['direccion_cliente'];
                    $telefono_cliente=$rowMotorizado['telefono_cliente'];
                    $edad_cliente=$rowMotorizado['edad_cliente'];
                    $profesion_cliente=$rowMotorizado['profesion_cliente'];
                    $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
                    $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
                    $antecedentes     =$rowMotorizado['antecedentes'];   
                    $fotoperfil       =$rowMotorizado['fotoperfil']; 
                    $tiposSangre      =$rowMotorizado['tiposSangre']; 
                    $esDonante        =$rowMotorizado['esDonante']; 
                    $tomaMedicamento  =$rowMotorizado['tomaMedicamento']; 
                    
                    $fechaNacimiento  =$rowMotorizado['fechaNacimiento']; 
                 
                    $entidadSalud     =$rowMotorizado['entidadSalud']; 
                    $seguro           =$rowMotorizado['seguro']; 
                    
                    $nota           =$rowMotorizado['nota']; 
                    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno']; 
                    $alergias           =$rowMotorizado['alergias']; 

 
          $peso           =$rowMotorizado['peso']; 
          $altura           =$rowMotorizado['altura']; 
          $imc           =$rowMotorizado['imc']; 
          $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal']; 
     // ----------------------------------------------------------------------------------------------------------------------------
       

        $ap1            = $rowMotorizado['ap1'];
        $ap2            = $rowMotorizado['ap2'];
        $ap3            = $rowMotorizado['ap3'];
        $ap4            = $rowMotorizado['ap4'];
        $ap5            = $rowMotorizado['ap5'];
        $ap6            = $rowMotorizado['ap6'];
        $ap7            = $rowMotorizado['ap7'];
        $ap8            = $rowMotorizado['ap8'];
        $ap9            = $rowMotorizado['ap9'];

        $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
        $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
        $whatsapp       = $rowMotorizado['whatsapp'];
        $tipoUsuario    = $rowMotorizado['tipoUsuario'];
        $estado         = $rowMotorizado['estado'];
        
        }


      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Documentos
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Documentos</a></li>

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">



       <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente;?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular;?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente;?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar;?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_CLIENTE;?></label>
               
               <br>
                <label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante;?></label>
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud;?></label>
               
              

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php echo calculaedad($fechaNacimiento);?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente ;?></label>

                <br>
                  <label><strong>Tipo de sangre :</strong></label>
                  <label><?php echo $tiposSangre ;?></label>   

                <br>

               <br>
                <label><strong>Seguro :</strong></label>
                <label><?php echo $seguro;?></label>
               
                 

              </div>

              <div class="col-md-2">

                <?php
                // echo strlen($logoF);
                if (strlen($fotoperfil) > 0) { 
                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                }
                else
                {

                echo '';
                }
 
                ?>


             
 
              </div>  
<br>
 
  <div class="col-md-12">
  <hr>  
<form action="Documentos.php" method="get">
  
<select id="idconsentimiento" name="idconsentimiento" class="form-control select2" required style="width: 40%;" onchange="this.form.submit()">

  <!--
    onChange="verconsentimiento();" 
  -->
          <option >Seleccione </option>
         

          <?php
         
              $queryListhc=mysqli_query($conn3,"SELECT * from configDocumentos where activo = 1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $id=$rowhc['id'];
                $nombre=$rowhc['nombre'];
               
                $name=$rowhc['fecha'];
        
              echo "<option value='$id'>$nombre </option> ";
               }
          ?>



          </select>

          <input type="hidden" name="clienteId" value="<?php echo $clienteId?>">
    
</form>
 


              </div>  

            
</div>



<?php if ($_GET['idconsentimiento']): ?>
  


  <?php
$idconsentimiento =  $_GET['idconsentimiento']; 
 $query_=mysqli_query($conn3,"SELECT * from configDocumentos where id = $idconsentimiento");
              $nrowl=mysqli_num_rows($query_);
              while($row_consen=mysqli_fetch_array($query_))
              {
                $id=$row_consen['id'];
                $nombreConsentimiento=$row_consen['nombre'];
               
                $textoConsentimiento=$row_consen['consentimiento'];

}
 $clienteId = $_GET['clienteId'];
  ?>


<div class="element" >
    <div  class="form-group col-md-12" align="center"><h2><?php echo $nombreConsentimiento?> </h2>

    </div>

    <form class="form-horizontal" action="guardarDocumento.php" method="POST" enctype="multipart/form-data">
     <div class="classol-md-11">

 
 
                          <textarea id="editor1" name="consentimiento" >
<?php echo cambiarVariables($textoConsentimiento, $clienteId, $idUsuario)?>
                          </textarea>
                      </div>




            <input  type="hidden" name="tipo" value="1">
           
            <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
            <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
            <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
            <input  type="hidden" name="operador"  value="<?php echo $_SESSION['username']?>">
       
            <div align="center"> 
                       <br>
                <br>
                <br>
                 <div class="col-sm-12">
                    <br>
                <br>
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G e n e r a r  </strong> </h2> </button></center>
                
                </div>
            </div>
              
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
    </form>



</div>

<?php endif ?>



 

 






  






 

 











 

 











 


 









 
 








  </div>  
 

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>




 <script type="text/javascript">


      function verconsentimiento(){
// estas son las variables que enviamos

        var idconsentimiento = $("#idconsentimiento").val();
        var usuario_id = $("#usuario_id").val();
       

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "configMostrarConsentimiento.php",
            data: {idconsentimiento:idconsentimiento, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };
</script>

