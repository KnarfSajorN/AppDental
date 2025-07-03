<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

            $historiaClinica1 = $_GET['historiaClinica1'];




                $queryList=mysqli_query($conn3,"SELECT * FROM  Ordenlaboratorio where ID =  $historiaClinica1");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos        =$rowMotorizado['datos'];
                  $laboratorio        =$rowMotorizado['laboratorio'];
                  $detallar        =$rowMotorizado['detallar'];

                  $hematologia_final=str_replace('|','<br>',$rowMotorizado['hematologia_final']);
                  $drogasabuso_final=str_replace('|','<br>',$rowMotorizado['drogasabuso_final']);
                  $serologia_final=str_replace('|','<br>',$rowMotorizado['serologia_final']);
                  $autoinmunidad_final=str_replace('|','<br>',$rowMotorizado['autoinmunidad_final']);
                  $coproanalisis_final=str_replace('|','<br>',$rowMotorizado['coproanalisis_final']);
                  $coagulacion_final=str_replace('|','<br>',$rowMotorizado['coagulacion_final']);
                  $enzimas_final=str_replace('|','<br>',$rowMotorizado['enzimas_final']);
                  $biologiamolecular_final=str_replace('|','<br>',$rowMotorizado['biologiamolecular_final']);
                  $electro_final=str_replace('|','<br>',$rowMotorizado['electro_final']);
                  $anticuerpos_final=str_replace('|','<br>',$rowMotorizado['anticuerpos_final']);
                  $bacteriologia_final=str_replace('|','<br>',$rowMotorizado['bacteriologia_final']);
                  $quimica_final=str_replace('|','<br>',$rowMotorizado['quimica_final']);
                  $marcadores_final=str_replace('|','<br>',$rowMotorizado['marcadores_final']);
                  $drogas_final=str_replace('|','<br>',$rowMotorizado['drogas_final']);
                  $pruebashor_final=str_replace('|','<br>',$rowMotorizado['pruebashor_final']);
                  $inmuno_final=str_replace('|','<br>',$rowMotorizado['inmuno_final']);
                  $orina_final=str_replace('|','<br>',$rowMotorizado['orina_final']);
                  $patologia_final=str_replace('|','<br>',$rowMotorizado['patologia_final']);
                  $otrosexa_final=str_replace('|','<br>',$rowMotorizado['otrosexa_final']);
                  $otros_laboratorios=str_replace('|','<br>',$rowMotorizado['otros_laboratorios']);
                 
                        
                }





 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaObstetrica  where Fecha = '$Fecha' and cliente_id= '$cliente_id' and usuario_id='$usuario_id'  and Hora= '$Hora' "  );

//echo "SELECT * FROM  historiaClinicaN  where Fecha = '$Fecha' and cliente_id= '$cliente_id' and usuario_id='$usuario_id'  and Hora= '$Hora' "  ;
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                 // $cliente_id      =$rowMotorizado['cliente_id'];
                 // $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  
                  $CIE1         =$rowMotorizado['CIE1'];
                  $CIE2       =$rowMotorizado['CIE2'];
                  $CIE3        =$rowMotorizado['CIE3'];
                  $D         = $rowMotorizado['diagnostico1'];
                  $D1         =$rowMotorizado['diagnostico1'];
                  $D2       =$rowMotorizado['diagnostico2'];
                  $D3        =$rowMotorizado['diagnostico3'];
                        
                }






           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

                $LogoF           =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $Nombre      =$rowMotorizado['USUARIO_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
            $genero                =$rowMotorizado['genero'];
                

                
            } 

 

              ?>
              <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
    <div class="wrapper">
       
      <div class="row">
        <div class="col-md-12">

          <div class="box box-solid">


            <!-- /.box-header -->
            <div class="box-body">
<div class="row">
     <div class="col-xs-12" border="1">    
 
 <!-- <div class="col-xs-4" border="1">
  <h6 align="center">  INSTITUCIÓN DEL SISTEMA </h6>
         
     
          
        </div> -->

         <div class="col-xs-4">
  <h6 align="left"> <?php echo $Logo ?>  </h6>
         
        </div> 

        <!--<div class="col-xs-6" align="center">
         
          <h6 align="center">  LOCALIZACIÓN <br>
           <div class="col-xs-3" align="left"><h6> PARROQUIA  </h6> </div> <div class="col-xs-3" align="left"><h6> CANTÓN </h6> </div> <div class="col-xs-3" align="left"><h6>PROVINCIA </h6> </div>
        </div>-->
         <!-- <div class="col-xs-4" align="left">
         
          <h6 align="left"> ORDEN DE LABORATORIO </h6>
         <?php echo $CODI_CLIENTE?> 
           
        </div> -->
        
      </div>  </div> 

  <table class="table table-bordered">
                    
                     <tr>
                     
                      <td colspan="12">Nombre del Paciente: <?php echo $nombre_cliente ?></td>  </tr>
                     <tr>  <td colspan="4">Sexo: <?php echo $genero?></td>
                      <td colspan="4">Edad: <?php echo  calculaedad($fechaNacimiento) ?></td>
                       <td colspan="4">HCI/CI: <?php echo $CODI_CLIENTE?> </td>
                      
                  
                    </tr>
                  </table> 


      <!-- donde esta el nuevo logo que se coloco o la nueva informacion perdon   la informacion la puse  aca mismo, en el modulo de impresion de receta sale todo bie. Aca es q no me funciona -->

              <div class="row">

                <div class="col-md-12">

         <br><br>

       <p>
        <?php  if ( $hematologia_final<> '') { echo '<b>HEMATOLOGÍA</b> <br>'.$hematologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogasabuso_final<> '') { echo '<b>DROGAS DE ABUSO</b> <br>'.$drogasabuso_final;} ?> 
      </p>
      <p>
        <?php  if ( $serologia_final<> '') { echo '<b>SEROLOGÍA</b> <br>'.$serologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $autoinmunidad_final<> '') { echo '<b>AUTOINMUNIDAD</b> <br>'.$autoinmunidad_final;} ?> 
      </p>
      <p>
        <?php  if ( $coproanalisis_final<> '') { echo '<b>COPROANÁLISIS</b> <br>'.$coproanalisis_final;} ?> 
      </p>
      <p>
        <?php  if ( $coagulacion_final<> '') { echo '<b>COAGULACIÓN</b> <br>'.$coagulacion_final;} ?> 
      </p>
      <p>
        <?php  if ( $enzimas_final<> '') { echo '<b>ENZIMAS</b> <br>'.$enzimas_final;} ?> 
      </p>
      <p>
        <?php  if ( $biologiamolecular_final<> '') { echo '<b>BIOLOGÍA MOLECULAR</b> <br>'.$biologiamolecular_final;} ?> 
      </p>
      <p>
        <?php  if ( $electro_final<> '') { echo '<b>ELECTROLITOS</b> <br>'.$electro_final;} ?> 
      </p>
      <p>
        <?php  if ( $anticuerpos_final<> '') { echo '<b>ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</b> <br>'.$anticuerpos_final;} ?> 
      </p>

      <p>
        <?php  if ( $bacteriologia_final<> '') { echo '<b>BACTERIOLOGIA</b> <br>'.$bacteriologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $quimica_final<> '') { echo '<b>QUIMICA SANGUINEA</b> <br>'.$quimica_final;} ?> 
      </p>
      <p>
        <?php  if ( $marcadores_final<> '') { echo '<b>MARCADORES ONCOLÓGICOS</b> <br>'.$marcadores_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogas_final<> '') { echo '<b>DROGAS TERAPÉUTICAS</b> <br>'.$drogas_final;} ?> 
      </p>
      <p>
        <?php  if ( $pruebashor_final<> '') { echo '<b>PRUEBAS HORMONALES</b> <br>'.$pruebashor_final;} ?> 
      </p>

      <p>
        <?php  if ( $inmuno_final<> '') { echo '<b>INMUNO DIAGNÓSTICO</b> <br>'.$inmuno_final;} ?> 
      </p>
      <p>
        <?php  if ( $orina_final<> '') { echo '<b>ORINA</b> <br>'.$orina_final;} ?> 
      </p>
      <p>
        <?php  if ( $patologia_final<> '') { echo '<b>PATOLOGÍA-CITOLOGÍA</b> <br>'.$patologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $otrosexa_final<> '') { echo '<b>OTROS</b> <br>'.$otrosexa_final;} ?> 
      </p>
      <p>
        <?php  if ( $otros_laboratorios<> '') { echo '<b>OTROS LABORATORIOS</b> <br>'.$otros_laboratorios;} ?> 
      </p>

                 
                  


              </div>
              </div>

<br><br>

<div class="row">
  <div class="col-xs-12"><h4><b>Diagnóstico CIE 10:</b><br><?php
  echo  $CIE1 ;?> <br><?php
  echo  $CIE2 ;?><br><?php
  echo  $CIE3 ;?> <br><?php
  echo  $D1 ;?> <br><?php
  echo  $D2 ;?><br><?php
  echo  $D3;?> </h4>









</div>

</div>



<div class="row">
              <div class="col-xs-4">   <h6 align="justify">FECHA:<?php echo $Fecha?>  </h6> </div>
               <div class="col-xs-8">   <h6 align="justify">PROFESIONAL<?php echo $Nombre?>  </h6> 

 <?php
  echo  $firmaImg;

  ?>
               </div>
               
        </div>

        <div class="row">
              
               <div class="col-xs-4">   <h6 > LABORATORIO CLINICO - SOLICITUD</h6> </div>
               
        </div>
 
</div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->





  </div>

 </div>

            </div>
          </div>
        </div>
      </div>
     
    </div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
 
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>
</html>
