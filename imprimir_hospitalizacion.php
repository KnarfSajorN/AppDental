<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $historiaClinica = $_GET['historiaClinica1'];

            $queryList=mysqli_query($conn3,"SELECT * FROM  informacion_rips where id = '$historiaClinica'");
            $nrowl=mysqli_num_rows($queryList);
            while($rowLista=mysqli_fetch_array($queryList))
            {

              $id=$rowLista['id'];
              $cliente_id=$rowLista['id_cliente'];
              $usuario_id=$rowLista['id_usuario'];
              $via_ingreso_institucion=$rowLista['via_ingreso_institucion'];
              $fecha_ingreso_observacion=$rowLista['fecha_ingreso_observacion'];
              $hora_ingreso_observacion=$rowLista['hora_ingreso_observacion'];
              $numero_autorizacion=$rowLista['numero_autorizacion'];
              $causa_externa=$rowLista['causa_externa'];
              $cie10_1=$rowLista['cie10_1'];
              $cie10_1_egreso=$rowLista['cie10_1_egreso'];
              $cie10_2=$rowLista['cie10_2'];
              $cie10_3=$rowLista['cie10_3'];
              $cie10_4=$rowLista['cie10_4'];
              $cie10_complicacion=$rowLista['cie10_complicacion'];
              $estado_salida_urgencias=$rowLista['estado_salida_urgencias'];
              $diagnostico_muerte=$rowLista['diagnostico_muerte'];
              $fecha_salida_urgencias=$rowLista['fecha_salida_urgencias'];
              $hora_salida_urgencias=$rowLista['hora_salida_urgencias'];

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
          

                
            }

            $nombre_cup = funcionMaster($cup_1,'codigo','descripcion','cups')
 
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

</head>
<body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
            <!-- /.box-header -->
           <div class="box-body">
            <div class="row">
            </div>
          </div>
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
    <td  width="50%" class="nombrePaciente"><h6>Nombre del paciente: <?php echo $nombre_cliente ?> </h6></td>
    <td  width="15%" class="documento"><h6>Documento: <?php echo $CODI_CLIENTE ?> </h6></td>
    <td width="15%"  class="edad"><h6>Edad:  <?php echo  calculaedad($fechaNacimiento) ?> </h6> </td>
    <td  width="20%" class="f.nacimiento"><h6>F.Nacimiento: <?php echo  $fechaNacimiento ?> </h6></td>

  </tr>
                
  <tr>
    <td class="residencia"><h6>Residencia: <?php echo $direccion_cliente?></h6></td>
    <td class="seguro"><h6>EPS:<?php echo $entidadSalud  ?> </h6></td>
    <td class="genero"><h6>Genero: <?php echo $genero?></h6></td>
     <td class="telefono"><h6>Telefono: <?php echo $celular_cliente?></h6></td>
  </tr></table>
 
</div>
</div></div>



  
        <div class="row">
        <h4 align="center"> Historia Hospitalizacion </h4>
                <div class="col-md-12">
          </div>
        </div>
<div class="col-xs-12" align="left">
 <b>Vía de ingreso a la institución </b><?php echo $via_ingreso_institucion ?> <br>
</div>   
<div class="col-xs-12" align="left">
 <b>Fecha de ingreso del usuario a observación </b><?php echo $fecha_ingreso_observacion ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b>Hora de ingreso del usuario a observación </b><?php echo $hora_ingreso_observacion ?> <br>
</div>

<div class="col-xs-12" align="left">
 <b> Número de autorización </b><?php echo $numero_autorizacion ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Causa externa </b><?php echo $causa_externa ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Diagnóstico principal de ingreso </b><?php echo $cie10_1 ?> <br>
 <b> Diagnóstico principal de egreso </b><?php echo $cie10_1_egreso ?> <br>
 <b> Diagnóstico relacionado Nro. 1 de egreso </b><?php echo $cie10_2 ?> <br>
 <b> Diagnóstico relacionado Nro. 2 de egreso </b><?php echo $cie10_3 ?> <br>
 <b> Diagnóstico relacionado Nro. 3 de egreso.</b><?php echo $cie10_4 ?> <br>
 <b> Diagnóstico de la complicación </b><?php echo $cie10_complicacion ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Estado a la salida </b><?php echo $estado_salida_urgencias ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Diagnóstico de la causa básica de muerte </b><?php echo $diagnostico_muerte ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Estado a la salida </b><?php echo $fecha_salida_urgencias ?> <br>
</div>
<div class="col-xs-12" align="left">
 <b> Hora de egreso del usuario de la institución </b><?php echo $hora_salida_urgencias ?> <br>
</div>

 


<hr>  


<div class="col-xs-6" align="center">
  <?php echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


             
  <div class="col-xs-6" align="center">
  <?php
 // echo  $firmaImg;

  ?>
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
  