   <?php 
   include 'header.php';
   include 'menu.php';?>


<script type="text/javascript">
function mostrar(id) {
  if (id == "servicio1") {
    $("#servicio1").show();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").hide();
    
  }
  
  if (id == "servicio2") {
    $("#servicio1").hide();
    $("#servicio2").show();
    $("#servicio3").hide();
    $("#servicio4").hide();
 
  }
  
  if (id == "servicio3") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").show();
    $("#servicio4").hide();
   
  }

  if (id == "servicio4") {
    $("#servicio1").hide();
    $("#servicio2").hide();
    $("#servicio3").hide();
    $("#servicio4").show();
   
  }
  
 
}
</script>

 
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
                    $celular_cliente=$rowMotorizado['celular_cliente'];
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
                <label>    <?php echo calculaedad($fechaNacimiento);?></label>
                
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


                /*

                   <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />

                */
                ?>


             
 
              </div>  
<br>
 
  <div class="col-md-12">
  <hr>        
          <div class="col-md-6">  
          <h4 class="card-title">Agregar tratamiento</h4>                                 
          </div>
          
          <div class="col-md-6" align="right">  
          <h4 class="card-title"> <?php echo date("d-m-Y h:m")?> </h4>                                 
          </div>
          

          <br>


<div class="col-md-12">

<div align="center"><h2>Tratamiento</h2></div>

<form class="form-horizontal" action="guardarHistoriaClinica2.php" method="POST" enctype="multipart/form-data">
  
<!-- ********************************************************************************************************************************
     ********************************************************    Tratamiento laser    ********************************************
     ******************************************************************************************************************************** -->

        <div> Tratamiento </div>
        <input  type="hidden" name="tratamiento"  value="3">
        
      <div class="form-group col-md-5" align="right">
        <font size="4"> Tipo de tratamiento </font>    
      </div>
      <div class="form-group col-md-7">

        <?php $idUsuario = $_SESSION['ID'];
 
        ?>


        <select   name="tratamiento" class="form-control select2"  style="width: 100%;">
                  <option >Seleccione </option>
                 <?php echo e_serviciosselect($idUsuario) ?>
        </select>
      </div>
 



 

        <div class="form-group col-md-12">
        <textarea id="descripcion" name="descripcion" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
        </div>

 
        <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso4" name="peso" onChange="calcularimc4();" step="any">
              </div>

              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centímetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura4" name="altura" onChange="calcularimc4();" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc4" name="imc" step="any">
              </div>

              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal4" name="ComposicionCorporal">
              </div>

        <div class="form-group col-md-12">
          <div align="left">Procedimiento </div>
        </div>

        
        <div class="box-body pad">
        
          <textarea id="procedimiento" name="procedimiento" class="textarea" placeholder="Procedimiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
       
        </div>
        


              <div class="form-group col-md-12">
                <div align="left">Plan de atención </div>
              </div>
              <div class="box-body pad">
              
                <textarea id="planAtencion" name="planAtencion" class="textarea" placeholder="Plan de atención" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="form-group col-md-12">
                <div align="left">Notas o comentarios </div>
              </div>
              <div class="box-body pad">
              
              <textarea id="nota" name="nota" class="textarea" placeholder="Notas o comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
              </div>



              <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Información de facturación </strong>  </label>
                  </div>
              

<div class="col-sm-6">
  Monto de abono o pago
</div>

<div class="col-sm-6">
   <input type="text" name="abono"  class="form-control input-lg" id="abono" min="1">
</div>



              </div>
 
                <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                  </div>
                   
                </div>
 
                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Fecha </label>
                  </div>
                  <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">

                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                  
                  <div id="div-results"></div>
                </div>


                <div class="col-sm-6">
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
 
                </div>
                 

                 <div class="col-sm-6">
                <br>
                <br>
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" checked>
                 <i class="fa fa-user"></i>  Presencial  
                
                  <input type="radio" name="P" value="1"  class="flat-red"  >
                 <i class="fa fa-video-camera"></i>   Virtual
                </label>
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
                <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                
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



 
function calcularimc1()
{
  m1 = document.getElementById("peso1").value;
  m2 = document.getElementById("altura1").value;

  r1 = m1/((m2/100)*(m2/100));

  document.getElementById("imc1").value = r1.toFixed(2);

  if (r1.toFixed(2) < 16) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez Severa';
  else if
    (r1.toFixed(2) > 16 &  r1.toFixed(2) < 16.99) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez moderada';
  else if 
    (r1.toFixed(2) > 17 & r1.toFixed(2) < 18.49) 
      ComposicionCorporal1 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r1.toFixed(2) > 18.50 & r1.toFixed(2) < 24.99) 
      ComposicionCorporal1 = 'Peso Normal';
  
  else if 
    (r1.toFixed(2) > 25.00 & r1.toFixed(2) < 29.99) 
      ComposicionCorporal1 = 'Sobrepeso';
  
  else if 
    (r1.toFixed(2) > 30.00 & r1.toFixed(2) < 34.99) 
      ComposicionCorporal1 = 'Obeso: Tipo I';
  
  else if 
    (r1.toFixed(2) > 35.00 & r1.toFixed(2) < 40) 
      ComposicionCorporal1 = 'Obeso: Tipo II';
  
  else if 
    (r1.toFixed(2) > 40.00) 
      ComposicionCorporal1 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal1").value = ComposicionCorporal1; 

}

function calcularimc2()
{
  m1 = document.getElementById("peso2").value;
  m2 = document.getElementById("altura2").value;

  r2 = m1/((m2/100)*(m2/100));

  document.getElementById("imc2").value = r2.toFixed(2);

  if (r2.toFixed(2) < 16) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez Severa';
  else if
    (r2.toFixed(2) > 16 &  r2.toFixed(2) < 16.99) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez moderada';
  else if 
    (r2.toFixed(2) > 17 & r2.toFixed(2) < 18.49) 
      ComposicionCorporal2 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r2.toFixed(2) > 18.50 & r2.toFixed(2) < 24.99) 
      ComposicionCorporal2 = 'Peso Normal';
  
  else if 
    (r2.toFixed(2) > 25.00 & r2.toFixed(2) < 29.99) 
      ComposicionCorporal2 = 'Sobrepeso';
  
  else if 
    (r2.toFixed(2) > 30.00 & r2.toFixed(2) < 34.99) 
      ComposicionCorporal2 = 'Obeso: Tipo I';
  
  else if 
    (r2.toFixed(2) > 35.00 & r2.toFixed(2) < 40) 
      ComposicionCorporal2 = 'Obeso: Tipo II';
  
  else if 
    (r2.toFixed(2) > 40.00) 
      ComposicionCorporal2 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal2").value = ComposicionCorporal2; 

}

 
function calcularimc3()
{
  m1 = document.getElementById("peso3").value;
  m2 = document.getElementById("altura3").value;

  r3 = m1/((m2/100)*(m2/100));

  document.getElementById("imc3").value = r3.toFixed(2);

  if (r3.toFixed(2) < 16) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez Severa';
  else if
    (r3.toFixed(2) > 16 &  r3.toFixed(2) < 16.99) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez moderada';
  else if 
    (r3.toFixed(2) > 17 & r3.toFixed(2) < 18.49) 
      ComposicionCorporal3 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r3.toFixed(2) > 18.50 & r3.toFixed(2) < 24.99) 
      ComposicionCorporal3 = 'Peso Normal';
  
  else if 
    (r3.toFixed(2) > 25.00 & r3.toFixed(2) < 29.99) 
      ComposicionCorporal3 = 'Sobrepeso';
  
  else if 
    (r3.toFixed(2) > 30.00 & r3.toFixed(2) < 34.99) 
      ComposicionCorporal3 = 'Obeso: Tipo I';
  
  else if 
    (r3.toFixed(2) > 35.00 & r3.toFixed(2) < 40) 
      ComposicionCorporal3 = 'Obeso: Tipo II';
  
  else if 
    (r3.toFixed(2) > 40.00) 
      ComposicionCorporal3 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal3").value = ComposicionCorporal3; 

}

 
function calcularimc4()
{
  m1 = document.getElementById("peso4").value;
  m2 = document.getElementById("altura4").value;

  r4 = m1/((m2/100)*(m2/100));

  document.getElementById("imc4").value = r4.toFixed(2);

  if (r4.toFixed(2) < 16) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez Severa';
  else if
    (r4.toFixed(2) > 16 &  r4.toFixed(2) < 16.99) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez moderada';
  else if 
    (r4.toFixed(2) > 17 & r4.toFixed(2) < 18.49) 
      ComposicionCorporal4 = 'Infrapeso: Delgadez aceptable';
  else if 
    (r4.toFixed(2) > 18.50 & r4.toFixed(2) < 24.99) 
      ComposicionCorporal4 = 'Peso Normal';
  
  else if 
    (r4.toFixed(2) > 25.00 & r4.toFixed(2) < 29.99) 
      ComposicionCorporal4 = 'Sobrepeso';
  
  else if 
    (r4.toFixed(2) > 30.00 & r4.toFixed(2) < 34.99) 
      ComposicionCorporal4 = 'Obeso: Tipo I';
  
  else if 
    (r4.toFixed(2) > 35.00 & r4.toFixed(2) < 40) 
      ComposicionCorporal4 = 'Obeso: Tipo II';
  
  else if 
    (r4.toFixed(2) > 40.00) 
      ComposicionCorporal4 = 'Obeso: Tipo III';
  
document.getElementById("ComposicionCorporal4").value = ComposicionCorporal4; 

}

 
</script>