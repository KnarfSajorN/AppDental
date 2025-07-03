   <?php 
   include 'header.php';
   include 'menu.php';?>

 
 
<?php


 

            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 

 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

                  $queryList=mysqli_query($conn3,"SELECT * FROM  v_cliente where  id=$clienteId");
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
        Procedimiento
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Procedimiento</a></li>

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
                <label>    <?php $edad = calculaedad($fechaNacimiento); echo $edad?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

             

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


                /*
                <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
                onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
                */
                ?>
   <h4 class="card-title"> <?php echo date("d-m-Y h:m")?> </h4>  
              </div>  
<br>


  <div class="col-md-12">
  <hr>    




   <div class="col-md-12">
<?php
$cuantasVacunas = 0;


echo '<br><strong> Vacunas aplicadas </strong><br>';
echo ' <table border="1"   style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Nombre  </th><th> Aplicada </th><th>Fecha </th>  </tr>';

 $queryinv2=mysqli_query($conn3,"SELECT * FROM  v_historiaClinica3 where cliente_id = '$clienteId' order by fecha ASC");

$nrowl2=mysqli_num_rows($queryinv2);
while($rowinv2=mysqli_fetch_array($queryinv2))
{
$cuantasVacunas++;

$id       =$rowinv2['id']; 
$vacuna_id       =$rowinv2['vacuna_id']; 
$aplicada        =$rowinv2['aplicada']; 
$fecha           =$rowinv2['fecha']; 


echo '<tr> <th>'.v_servicios($vacuna_id).' </th><th> '.aplicadas($aplicada).'  </th><th>'.$fecha .' </th>     </tr>';


}
echo '</table> ';
if ($cuantasVacunas == 0) {
  echo '<strong> NO se le a aplicada ninguna vacuna </strong>';
}
else
{ 
  echo $cuantasVacunas;
}



?>
</div>

 
 
<div class="col-md-12">

<div align="center"><h2>Vacunas</h2></div>

<form class="form-horizontal" action="v_guardarHistoriaClinica3.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->

    
      <div class="form-group col-md-12">
        <font size="4"> Vacunas permitidas </font>    
        <?php $idUsuario = $_SESSION['ID']; ?>


        <select  id="vacuna"  name="vacuna" class="form-control select2"  style="width: 100%;" onChange="cargarInformacion();">
          <option >Seleccione </option>
          <?php echo v_serviciosselect($idUsuario, $edad) ?>
        </select>
      </div>
    
<div class="form-group col-md-12">
    <div  id="div-results-Informacion"></div>


Programar de manera automatica ? 
  <input value="1" type="radio" name="programar" id="lt" class="flat-red"/> SI  
  <input value="2" type="radio" name="programar" id="lt" class="flat-red"/> NO  
 
</div>

 

              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>


 
                <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                  </div>
                   
                </div>
 
                <div class="col-sm-4">
                  <div align="left"> 
                    <label>Fecha </label>
                  </div>
                  <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">

                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                  
                  <div id="div-results"></div>
                </div>


                <div class="col-sm-2">
                  <div align="left"> 
                    <label>Hora </label>
                  </div>
                 <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                <div id="div-resultsHora"></div>

                </div>
                  
                <div class="col-sm-6">

                   <div align="left"> 
                    <label>Motivo consulta</label>
                  </div>
                  <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                  <input  type="hidden" name="P" value="0">
 
                </div>
                 
 
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
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong> A P L I C A D A </strong> </h2> </button></center>
                
                </div>
            </div>



                 



           
            <input type="hidden"  name="tipo_cliente"   valur="1">
             
            
          </form>

</div>
 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
          
     

<?php include("footer.php")?>



<script type="text/javascript">


      function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };


    function cargarInformacion(){
            var vacuna = $("#vacuna").val();
            var usuario_id = $("#usuario_id").val();
            var clienteId = $("#clienteId").val();




              $.ajax({
                  type : "POST",
                  url: "ajax_v_cargarInformacion.php",
                  data: {vacuna:vacuna, usuario_id:usuario_id, clienteId:clienteId},
                  success: function(response){
                    $('#div-results-Informacion').html(response);
                  }
              });
        };

 

</script>