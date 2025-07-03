<?php
date_default_timezone_set('America/Bogota');
 
 
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';
             
            $historiaClinica = $_GET['historiaClinica'];
            $idHistoria = $_GET['idHistoria'];

            $queryListhc=mysqli_query($conn3,"SELECT * from configTablas where id = $idHistoria ");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $Tabla=$rowhc['name'];
                $nombre =$rowhc['nombre'];
              }   
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha      =$rowMotorizado['Fecha']; 
              $Hora =$rowMotorizado['Hora'];
            
            


              $D1 =$rowMotorizado['D1'];
              $D2 =$rowMotorizado['D2'];
              $D3 =$rowMotorizado['D3'];
              $D4 =$rowMotorizado['D4'];
              $D5 =$rowMotorizado['D5'];
              $NOTA1 =$rowMotorizado['nota1'];
              $NOTA2 =$rowMotorizado['nota2'];
              $NOTA3 =$rowMotorizado['nota3'];
              $NOTA4 =$rowMotorizado['nota4'];
              $NOTA5 =$rowMotorizado['nota5'];
              $equipos =$rowMotorizado['equipos'];
              $logoDer =$rowMotorizado['logoDer'];
              $logoIz =$rowMotorizado['logoIz'];
              $discriDe =$rowMotorizado['discriDe'];
              $discriIz =$rowMotorizado['discriIz'];
              $audioDerecho =$rowMotorizado['x180'];
              $audioIzquierdo =$rowMotorizado['x294'];
          $audioDerecho1 =$rowMotorizado['x498'];
          $audioIzquierdo1 =$rowMotorizado['x334'];
          $timpoDerecho =$rowMotorizado['x137'];
          $timpoIzquierdo =$rowMotorizado['x137r'];

          $timpoDerecho1 =$rowMotorizado['x214'];
          $timpoIzquierdo1 =$rowMotorizado['x214x'];
          $refleDerecho =$rowMotorizado['x798'];
          $refleDerecho1 =$rowMotorizado['x119'];
           $refleIzquierdo =$rowMotorizado['x119x'];
           $refleIzquierdo1 =$rowMotorizado['x798x'];
           $recomendacion =$rowMotorizado['x450'];
           $recomendacion1 =$rowMotorizado['x824'];


      

 }
  
 
if (strlen(stristr($logoDer,'Curva'))>0) {
   $var1=$discriDe;
}

 
if (strlen(stristr($logoIz,'Curva'))>0) {
 $var2=$discriIz;
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

              $NUSUARIO     =$rowMotorizado['NOMBRE_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
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
              $seguro                     =$rowMotorizado['entidadSalud'];
              
              $direccion_cliente          =$rowMotorizado['ciudad_cliente'];
              $genero =$rowMotorizado['genero'];
              $Ocupacion =$rowMotorizado['ocupacion'];

              
  
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

  <style>


    @page {
    size: A4;
    margin: 40px;
}


    @media print {
    html,
    body {
        width: 210mm;
        height: 297mm;
    }
    @-moz-document url-prefix() {}
    .col-sm-1,
    .col-sm-2,
    .col-sm-3,
    .col-sm-4,
    .col-sm-5,
    .col-sm-6,
    .col-sm-7,
    .col-sm-8,
    .col-sm-9,
    .col-sm-10,
    .col-sm-11,
    .col-sm-12,
    .col-md-1,
    .col-md-2,
    .col-md-3,
    .col-md-4,
    .col-md-5,
    .col-md-6,
    .col-md-7,
    .col-md-8,
    .col-md-9,
    .col-md-10,
    .col-md-11,
    .col-smdm-12 {
        float: left;
    }
    .col-sm-12,
    .col-md-12 {
        width: 100%;
    }
    .col-sm-11,
    .col-md-11 {
        width: 91.66666667%;
    }
    .col-sm-10,
    .col-md-10 {
        width: 83.33333333%;
    }
    .col-sm-9,
    .col-md-9 {
        width: 75%;
    }
    .col-sm-8,
    .col-md-8 {
        width: 66.66666667%;
    }
    .col-sm-7,
    .col-md-7 {
        width: 58.33333333%;
    }
    .col-sm-6,
    .col-md-6 {
        width: 50%;
    }
    .col-sm-5,
    .col-md-5 {
        width: 41.66666667%;
    }
    .col-sm-4,
    .col-md-4 {
        width: 33.33333333%;
    }
    .col-sm-3,
    .col-md-3 {
        width: 25%;
    }
    .col-sm-2,
    .col-md-2 {
        width: 16.66666667%;
    }
    .col-sm-1,
    .col-md-1 {
        width: 8.33333333%;
    }
    .col-sm-pull-12 {
        right: 100%;
    }
    .col-sm-pull-11 {
        right: 91.66666667%;
    }
    .col-sm-pull-10 {
        right: 83.33333333%;
    }
    .col-sm-pull-9 {
        right: 75%;
    }
    .col-sm-pull-8 {
        right: 66.66666667%;
    }
    .col-sm-pull-7 {
        right: 58.33333333%;
    }
    .col-sm-pull-6 {
        right: 50%;
    }
    .col-sm-pull-5 {
        right: 41.66666667%;
    }
    .col-sm-pull-4 {
        right: 33.33333333%;
    }
    .col-sm-pull-3 {
        right: 25%;
    }
    .col-sm-pull-2 {
        right: 16.66666667%;
    }
    .col-sm-pull-1 {
        right: 8.33333333%;
    }
    .col-sm-pull-0 {
        right: auto;
    }
    .col-sm-Push-12 {
        left: 100%;
    }
    .col-sm-Push-11 {
        left: 91.66666667%;
    }
    .col-sm-Push-10 {
        left: 83.33333333%;
    }
    .col-sm-Push-9 {
        left: 75%;
    }
    .col-sm-Push-8 {
        left: 66.66666667%;
    }
    .col-sm-Push-7 {
        left: 58.33333333%;
    }
    .col-sm-Push-6 {
        left: 50%;
    }
    .col-sm-Push-5 {
        left: 41.66666667%;
    }
    .col-sm-Push-4 {
        left: 33.33333333%;
    }
    .col-sm-Push-3 {
        left: 25%;
    }
    .col-sm-Push-2 {
        left: 16.66666667%;
    }
    .col-sm-Push-1 {
        left: 8.33333333%;
    }
    .col-sm-Push-0 {
        left: auto;
    }
    .col-sm-offset-12 {
        margin-left: 100%;
    }
    .col-sm-offset-11 {
        margin-left: 91.66666667%;
    }
    .col-sm-offset-10 {
        margin-left: 83.33333333%;
    }
    .col-sm-offset-9 {
        margin-left: 75%;
    }
    .col-sm-offset-8 {
        margin-left: 66.66666667%;
    }
    .col-sm-offset-7 {
        margin-left: 58.33333333%;
    }
    .col-sm-offset-6 {
        margin-left: 50%;
    }
    .col-sm-offset-5 {
        margin-left: 41.66666667%;
    }
    .col-sm-offset-4 {
        margin-left: 33.33333333%;
    }
    .col-sm-offset-3 {
        margin-left: 25%;
    }
    .col-sm-offset-2 {
        margin-left: 16.66666667%;
    }
    .col-sm-offset-1 {
        margin-left: 8.33333333%;
    }
    .col-sm-offset-0 {
        margin-left: 0%;
    }
    .visible-xs {
        display: none !important;
    }
    .hidden-xs {
        display: block !important;
    }
    table.hidden-xs {
        display: table;
    }
    tr.hidden-xs {
        display: table-row !important;
    }
    th.hidden-xs,
    td.hidden-xs {
        display: table-cell !important;
    }
    .hidden-xs.hidden-print {
        display: none !important;
    }
    .hidden-sm {
        display: none !important;
    }
    .visible-sm {
        display: block !important;
    }
    table.visible-sm {
        display: table;
    }
    tr.visible-sm {
        display: table-row !important;
    }
    th.visible-sm,
    td.visible-sm {
        display: table-cell !important;
    }
}
  </style>
  
</head>
 
      <body onload="window.print();">
<div class="wrapper">
   <div class="col-md-12">
           
          <div class="box box-solid">
            <!-- /.box-header -->
          



  <div class="row">

                <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>


 <tr align="center">
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" align="center"> 
      <div align="center"><?php echo $header  ?></div>

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
<table class="tg" border=1 style="undefined;table-layout: fixed; font-size:13px; width: 100%"  >
  <tr>
    <td  width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
    <!-- <td  width="35%" class="residencia">Residencia: <?php echo $direccion_cliente  ?></td> -->
    <td  width="15%" class="f.nacimiento">Sexo: <?php echo  $genero ?></td>
    <td width="20%"  class="edad">Edad:  <?php echo  calculaedad($fechaNacimiento) ?></td>
  </tr>
                
    
  <tr>
    <td  class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
    <!-- <td class="seguro">Entidad:<?php echo $seguro  ?></td> -->
    <td class="telefono">Telefono: <?php echo $telefono?></td>
    <!-- <td class="genero">Ocupación: <?php echo $Ocupacion?></td> -->
  </tr>


</table>
 
</div>
</div>





        <div class="row">
        <h4 align="center"><b> DIAGNÓSTICO AUDIOLÓGICO</b></h4>
                <div class="col-md-12">
          </div>
        </div>
   
      
      <div class="row">
        <div class="col-xs-12">
      
<p>
  Fecha : 
    <?php echo $Fecha ?>


         <table class="tg" border=1 style="undefined;table-layout: fixed; font-size:15px; width: 100%"  >
          <?php  if ($audioDerecho <>'' or $audioDerecho1  <>'' or $audioIzquierdo  <>'' or $audioIzquierdo1 <>'') { echo 
           '<tr>
                <td rowspan="2"  width="20%" align="center"><b>Audiometría</b></td>
                <td  width="15%">Oído Derecho</td>
                <td>'.$audioDerecho.' '.$audioDerecho1.'</td>
            </tr> 
            <tr>
                <td width="15%">Oído Izquierdo</td>
                <td> '.$audioIzquierdo.' '.$audioIzquierdo1.'</td>
            </tr>';} ?>

            <?php  if ($logoDer <>'' or $logoIz  <>'') { echo 
           '<tr>
                <td rowspan="2"  width="20%" align="center"><b>Logoaudiometría</b></td>
                <td width="15%">Oído Derecho</td>
                <td>'.$logoDer.'  '.$var1.'</td>
            </tr>
            <tr>
               <td width="15%">Oído Izquierdo</td>
                <td>'.$logoIz.'  '.$var2.'</td>
            </tr>';}?>

             <?php  if ($timpoDerecho <>'' or $refleDerecho  <>'' or $timpoDerecho1 <>'' or $refleDerecho1  <>''or $timpoIzquierdo <>'' or $refleIzquierdo <>'' or $timpoIzquierdo1<>'' or $refleIzquierdo1<>'') { echo 
           '<tr>
                <td rowspan="2"  width="20%" align="center"><b>Impedanciometría</b></td>
                <td width="15%">Oído Derecho</td>
                <td> '.$timpoDerecho.' '.$refleDerecho.' '.$timpoDerecho1.' '.$refleDerecho1.'</td>
            </tr>
            <tr>
                <td width="15%">Oído Izquierdo</td>
                <td>'.$timpoIzquierdo.' '.$refleIzquierdo.' '.$timpoIzquierdo1.' '.$refleIzquierdo1.'</td>
            </tr>';}?>

            
           
        </table>
         <table class="tg" border=1 style="undefined;table-layout: fixed; font-size:15px; width: 100%"  >
 </tr>
                <td rowspan="1"  width="20%" align="center"><b>Recomendaciones</b></td>
                
                <td width="80%"> <?php echo $recomendacion ?> <?php echo $recomendacion1?></td>
            </tr> </table>
</p>


        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->




<hr>

<!--<div class="col-xs-6" align="center">-->
  <div align="center">
  <?php //echo $Fecha ?> 
  </div>

<!--<div class="col-xs-6" align="center">-->
  <div align="center">
  <?php echo $ciudadPaisF?>
  </div>


  <!--<div class="col-xs-6" align="center">-->
    <div align="center">
  
  </div>

  <!--<div class="col-xs-6" align="center">-->
    <div align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo  $NUSUARIO?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>


  

      <!--<div class="col-xs-12" align="center">-->
        <div align="center">
    <footer  style="width:100%; margin-left: 0px;"  >


<div class="copyright" style="background-color: #0d47a1;">
    <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
       <p> <?php echo $pieF?></p>

    </div>
</div>
      </footer> </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
  

        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
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




