<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");


            $historia = $_GET['historia'];



            $queryList=mysqli_query($conn3,"SELECT * FROM  historia_psicosocial where id = $historia");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['fecha'];
              $Hora            =$rowMotorizado['hora'];

              $edad            =$rowMotorizado['edad'];
              $paridad            =$rowMotorizado['paridad'];
              $antecedentes            =$rowMotorizado['antecedentes'];
              $embarazo            =$rowMotorizado['embarazo'];
              $total_riesgo_1            =$rowMotorizado['total_riesgo_1'];
              $tension_emocional            =$rowMotorizado['tension_emocional'];
              $humor_depresivo            =$rowMotorizado['humor_depresivo'];
              $sintomas_neurovegetativos            =$rowMotorizado['sintomas_neurovegetativos'];
              $total_riesgo_2            =$rowMotorizado['total_riesgo_2'];
              $tiempo_riesgo            =$rowMotorizado['tiempo_riesgo'];
              $espacio_riesgo            =$rowMotorizado['espacio_riesgo'];
              $dinero_riesgo            =$rowMotorizado['dinero_riesgo'];
              $total_riesgo_3            =$rowMotorizado['total_riesgo_3'];
              $total_historia            =$rowMotorizado['total_historia'];
              

          }

/*
    $queryList=mysqli_query($conn3,"SELECT * FROM firmas where historia_id = $historiaClinica1 and cliente_id = $cliente_id and historia_nombre = 0");
   
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              
             $Firma           =$rowMotorizado['firma'];
               
            }
*/

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

                $LogoF               =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

               if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }

    //echo "$usuario_id1 usuario";

    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
    }
}
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['whatsapp'];
              $especialidad        = $rowMotorizado['especialidad'];
              $nit                =$rowMotorizado['nit'];
              

            }


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
              $celular_cliente            =$rowMotorizado['celular_cliente'];
              $entidadSalud                     =$rowMotorizado['entidadSalud'];
              $genero                     =$rowMotorizado['genero'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $etnia=$rowMotorizado['etnia'];
              $discapacidad=$rowMotorizado['tipodiscapacidad'];
              $asignar=$rowMotorizado['asignar'];
          

                
            }

 
   ?>

	<!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $empresaNombre ?> </title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 <!--<link rel="stylesheet" href="style.css">
   <!--<link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/co131/estilopiepagina.css">-->

<!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 estilos css-->
<!--<link rel="stylesheet" href="https://sievensoftcolombia.com/css/bootstrap.css">
 estilos css-->
<!--<link href="https://sievensoftcolombia.com/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">-->


</head>
<body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
            <!-- /.box-header -->
           
          <div class="page-header" style="text-align: center">
  
  <div class="row">

                  <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>

  <tr>
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" ><div align="center"><?php echo $header  ?></div>
    <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion?>  </h9></th>-->
    </tr>

  <tr>
    </tr>
  <tr>
    </tr>
  <tr>
    </tr> 
</table>
<br>
<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
  <tr>
    <td  width="50%" class="nombrePaciente"><h6><B>NOMBRE DEL PACIENTE: <?php echo $nombre_cliente ?></B> </h6></td>
    <td  width="15%" class="documento"><h6>Documento: <?php echo $CODI_CLIENTE ?> </h6></td>
    <td width="15%"  class="edad"><h6>Edad:  <?php echo  calculaedad($fechaNacimiento) ?> </h6> </td>
    <td  width="20%" class="f.nacimiento"><h6>F.Nacimiento: <?php echo  $fechaNacimiento ?> </h6></td>

  </tr>
                
  <tr>
    <td class="residencia"><h6>Residencia: <?php echo $direccion_cliente?></h6></td>
    <td class="seguro"><h6>EPS:<?php echo $entidadSalud  ?> </h6></td>
    <td class="genero"><h6>Genero: <?php echo $genero?></h6></td>
     <td class="telefono"><h6>Asiganado a: <?php echo $asignar?></h6></td>
  </tr></table>
 
</div>
</div></div>



  
        <div class="row">
        <h4 align="center"> HISTORIA CLÍNICA PSICO SOCIAL
        </h4> 
          <div class="col-md-12" align="left"><label> I. HISTORIA REPRODUCTIVA </label> <br>
            <?php echo $edad?>
          </div>
          <div class="col-md-12" align="left">
            <?php echo $paridad?>
          </div>
          <div class="col-md-12" align="left"><label> II. ANTECEDENTES PERSONALES </label> <br>
            <?php echo $antecedentes?>
          </div>
          <div class="col-md-12" align="left"><label> III. EMBARAZO ACTUAL </label> <br>
            <?php echo $embarazo?>
          </div>
          <div class="col-md-12" align="left"><label> TOTAL RIESGO OBSTÉTRICO </label> <br>
            <?php echo $total_riesgo_1;if($total_riesgo_1 >=3)
            {
              echo '<br><label> ALTO RIESGO </label> <br>';
            }
            elseif($total_riesgo_1 <3)
            {
              echo '<br><label> BAJO RIESGO </label> <br>';
            }
            ?>
          </div>
          <div class="col-md-12" align="left"><br><label> IV. RIESGO PSICOSOCIAL </label> <br></div>
          <div class="col-md-12" align="left"> <label> Tensión emocional:  </label> <br>
            <?php echo $tension_emocional?>
          </div>
          <div class="col-md-12" align="left"> <label> Tensión emocional:  </label> <br>
            <?php echo $humor_depresivo?>
          </div>
          <div class="col-md-12" align="left"> <label> Tensión emocional: </label> <br>
            <?php echo $sintomas_neurovegetativos?>
          </div>
          <div class="col-md-12" align="left"> <label> SUB TOTAL: </label>
            <?php echo $total_riesgo_2?>
          </div>
          <div class="col-md-12" align="left"> <label> Tiempo:  </label>
            <?php echo $tiempo_riesgo?>
          </div>
          <div class="col-md-12" align="left"> <label> Espacio: </label>
            <?php echo $espacio_riesgo?>
          </div>
          <div class="col-md-12" align="left"> <label> Dinero: </label>
            <?php echo $dinero_riesgo?>
          </div>
          <div class="col-md-12" align="left">  <label> SUB TOTAL: </label>
            <?php echo $total_riesgo_3?>
          </div>
          <div class="col-md-12" align="left"> <label> TOTAL RIESGO PSICOSOCIAL : </label>
            <?php echo $total_historia; if($total_historia >=2)
            {
              echo '<br><label> ALTO RIESGO </label> <br>';
            }
            elseif($total_historia <2)
            {
              echo '<br><label> BAJO RIESGO </label> <br>';
            }?>
          </div>
        </div>
   











</div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="col-xs-6" align="center">
  <?php echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


               <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>

  </div>


 </div>

  
     
   </div>
          </div>
        </div>
      </div>
     
    </div>
  

      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
      </div>
  </div>
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
  