 <?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");


            $historiaClinica1 = $_GET['historiaClinica1'];


            $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica where id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $cliente_id = $rowMotorizado['cliente_id'];
              $usuario_id = $rowMotorizado['usuario_id'];
              $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
              $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
              $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
              $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
              $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
              $Checks_Revision = $rowMotorizado['Checks_Revision'];
              $SignosVitales = $rowMotorizado['SignosVitales'];
              $Paraclinicos = $rowMotorizado['Paraclinicos'];
              $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
              $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
              $ExamenFisico = $rowMotorizado['ExamenFisico'];
              $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
              $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
              $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
              $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
              $Impresion = $rowMotorizado['Impresion'];
              $PlanManejo = $rowMotorizado['PlanManejo'];
              $Incapacidades = $rowMotorizado['Incapacidades'];
              $Insumos = $rowMotorizado['Insumos'];
              $RecetaId = $rowMotorizado['RecetaId'];

            }

             $queryList=mysqli_query($conn3,"SELECT * FROM  informacion_rips  where id_historia = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $CUPS      =$rowMotorizado['CUPS'];
              $finalidad_consulta     =$rowMotorizado['finalidad_consulta'];
              $causa_externa          =$rowMotorizado['causa_externa'];

              $ambito_procedimiento           =$rowMotorizado['ambito_procedimiento'];
              $finalidad_procedimiento =$rowMotorizado['finalidad_procedimiento'];
              $realizacion_quirurgico  =$rowMotorizado['realizacion_quirurgico'];
              $cie10_complicacion     =$rowMotorizado['cie10_complicacion'];
            $cie10_1=$rowMotorizado['cie10_1']; 
            $cie10_2=$rowMotorizado['cie10_2']; 
            $cie10_3=$rowMotorizado['cie10_3']; 
            $cie10_4=$rowMotorizado['cie10_4']; 

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
$cie1=mysqli_query($conn3,"SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ");

//ECHO "SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ";

 
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
                    <th class="titulo" colspan="4" rowspan="4" ><div align="right"><h4><?php echo $header  ?></h4></div>
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
                      <td  width="50%" class="nombrePaciente"><h6><b>Nombre del paciente:</b> <?php echo $nombre_cliente ?> </h6></td>
                      <td  width="15%" class="documento"><h6><b>Documento:</b> <?php echo $CODI_CLIENTE ?> </h6></td>
                      <td width="15%"  class="edad"><h6><b>Edad:</b>  <?php echo  calculaedad($fechaNacimiento) ?> </h6> </td>
                      <td  width="20%" class="f.nacimiento"><h6><b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?> </h6></td>

                    </tr>

                    <tr>
                      <td class="residencia"><h6><b>Residencia:</b> <?php echo $direccion_cliente?></h6></td>
                      <td class="seguro"><h6><b>EPS:</b><?php echo $entidadSalud  ?> </h6></td>
                      <td class="genero"><h6><b>Genero:</b> <?php echo $genero?></h6></td>
                      <td class="telefono"><h6><b>Telefono:</b> <?php echo $celular_cliente?></h6></td>
                    </tr></table>

                  </div>
                </div>
              </div>
              
              <?php
              if($_GET['tipo']=='consulta'):
              ?>
              <div class="row">
                <h4 align="center"> CONSULTA GENERAL </h4>
                <div class="col-md-12">
                <?php
                echo 'Informacion del Acudiente<br><br>'.$InformacionAcudiente.'<br>';
                echo 'Enfermedad Actual<br><br>'.$EnfermedadActual.'<br>';
                echo 'Antecedentes <br><br>'.$Checks_Antecedentes.'<br>';
                echo 'Antecedentes Ginecobstetricos<br><br>'.$AntecentesGinecobstetricos.'<br>';
                echo 'Antecedentes Familiares<br><br>'.$AntecedentesFamiliares.'<br>';
                echo 'Revision por Sistemas<br><br>'.$Checks_Revision.'<br>';
                echo 'Signos vitales y medidas antropométricas<br><br>'.$SignosVitales.'<br>';
                echo 'Paraclínicos<br><br>'.$Paraclinicos.'<br>';
                echo 'Examenes<br><br>';
               ?>

               <table class="table table-responsive">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Examenes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador=0;
                  $Examen_Paciente = explode(",", $Imagenologia_Examen);
                  foreach ($Examen_Paciente as $value) {$contador++;
                    if(funcionMaster($value,'id','Nombre','examenes_historia')<>""):
                    echo '<tr><td>'.$contador.'</td><td>'.funcionMaster($value,'id','Nombre','examenes_historia').'</td></tr>';
                    endif;
                  }
                  ?>
                </tbody>
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Laboratorios</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador=0;
                  $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                foreach ($Laboratorio_Paciente as $value) {$contador++;
                    if(funcionMaster($value,'id','Nombre','examenes_historia')<>""):
                    echo '<tr><td>'.$contador.'</td><td>'.funcionMaster($value,'id','Nombre','examenes_historia').'</td></tr>';
                    endif;
                  }
                  ?>
                </tbody>
              </table>

               <?php
                echo 'Examen Físico<br><br>'.$ExamenFisico.'<br>';
                echo 'Organos de los Sentidos<br><br>'.$OrganoSentidos.'<br>';
                echo 'Sintomas Generales<br><br>'.$SintomasGenerales.'<br>';
                echo 'Diagnostico de Acupuntura<br><br>'.$DiagnosticoAcupuntura.'<br>';
                echo 'Diagnóstico<br><br>'.$cie10_1.'<br>';
                echo ''.$cie10_2.'<br>';
                echo ''.$cie10_3.'<br>';
                echo ''.$cie10_4.'<br>';
                echo 'Impresion<br><br>'.$Impresion.'<br>';
                echo 'Plan de manejo<br><br>'.$PlanManejo.'<br>';
                echo 'Incapacidades<br><br>'.$Incapacidades.'<br>';
                echo 'Insumos<br><br>'.$Insumos.'<br>';
                ?>
                </div>
              </div>
              <?php
              endif;
              ?>


              <?php
              if($_GET['tipo']=='examenes'):
              ?>

              <table class="table table-responsive">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Examenes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador=0;
                  $Examen_Paciente = explode(",", $Imagenologia_Examen);
                  foreach ($Examen_Paciente as $value) {$contador++;
                    if(funcionMaster($value,'id','Nombre','examenes_historia')<>""):
                    echo '<tr><td>'.$contador.'</td><td>'.funcionMaster($value,'id','Nombre','examenes_historia').'</td></tr>';
                    endif;
                  }
                  ?>
                </tbody>
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Laboratorios</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador=0;
                  $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                foreach ($Laboratorio_Paciente as $value) {$contador++;
                    if(funcionMaster($value,'id','Nombre','examenes_historia')<>""):
                    echo '<tr><td>'.$contador.'</td><td>'.funcionMaster($value,'id','Nombre','examenes_historia').'</td></tr>';
                    endif;
                  }
                  ?>
                </tbody>
              </table>










              <!--
              <div class="row">
                <h4 align="center"> Examenes </h4>
                <div class="col-md-12">
                <?php
                echo 'Examenes<br>';
                $Examen_Paciente = explode(",", $Imagenologia_Examen);
                foreach ($Examen_Paciente as $value) {
                  echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                }
                echo 'Laboratorios<br>';
                $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                foreach ($Laboratorio_Paciente as $value) {
                  echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                }
                ?>
                </div>
              </div>
              -->

              <?php
              endif;
              ?>

              <?php
              if($_GET['tipo']=='incapacidad'):
              ?>
              <div class="row">
                <h4 align="center"> Incapacidad </h4>
                <div class="col-md-12">
                <?php
                echo 'Incapacidades<br>'.$Incapacidades.'<br>';
                ?>
                </div>
              </div>
              <?php
              endif;
              ?>

              <?php
              if($_GET['tipo']=='receta'):
              ?>

              <div class="row">
                <h4 align="center"> Receta </h4>
                <div class="col-md-12">


                   <?php


                   $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$RecetaId");
                   
                   $nrowl=mysqli_num_rows($querydeta);
                   while($rowDetalle=mysqli_fetch_array($querydeta))
                   {
                     $Producto = funcionMaster($rowDetalle['codigoProd'],'id','descripcion','pos');
                     $posologia                =$rowDetalle['posologia'];
                     $cantidad          =$rowDetalle['cantidad'];
                     $duracion          =$rowDetalle['duracion'];
                     $metodo          =$rowDetalle['metodo'];
                     $nota            =$rowDetalle['nota'];
                     $nota2         =$rowDetalle['nota2'];
                     $administracion_posologia  =$rowDetalle['administracion_posologia'];
                     $duracion_tratamiento         =$rowDetalle['duracion_tratamiento'];

                     $dosis                 =$rowDetalle['dosis'];
                     
                     $frecuencia                 =$rowDetalle['frecuencia'];
                     $administracion              =$rowDetalle['administracion'];
                     $dosisdia           =$rowDetalle['dosisdia'];
                     $via   =$rowDetalle['via'];
                     $id_usuario              =$rowDetalle['id_usuario'];
                     $id_cliente              =$rowDetalle['idcliente']; 
                     $total             =$rowDetalle['total']; 
                     $dias             =$rowDetalle['dias']; 
                     
                     $producto1          =$rowDetalle['producto1']; 
                     
                     
                     
                     $numero++;

                     ?>
                     
                     <table id="example1" class="table table-bordered table-striped" style="zoom:0.7">
                      <tr>
                       <th style="width:20%"><h6 align="center"> MEDICAMENTO</h6></th>
                       <th style="width:20%"><h6 align="center"> FRECUENCIA DE ADMINISTRACIÓN</h6></th>  
                       <th style="width:10%"><h6 align="center"> DOSIS</h6></th>
                       <th style="width:20%"><h6 align="center"> DURACIÓN DE PRESCRIPCIÓN</h6></th>
                       <th style="width:20%"><h6 align="center"> METODO DE ADMINISTRACIÓN</h6></th>
                       <th style="width:10%"><h6 align="center"> CANTIDAD TOTAL DE DESPACHO</h6></th>
                       <th style="width:10%"><h6 align="center"> INDICACIONES DE ADMINISTRACIÓN</h6></th>
                       <th style="width:10%"><h6 align="center"> OBSERVACIONES</h6></th>
                     </tr>
                     <tr>
                        <td style="width:20%"><h5> <?php echo $Producto;?></h5> </td>
                        <td style="width:20%"> <h5><?php echo $frecuencia?> </h5></td>
                        <td style="width:10%"> <h5><?php echo $dosis?></h5> </td>
                        <td style="width:20%"> <h5><?php echo $duracion?></h5> </td>
                        <td style="width:20%"> <h5><?php echo $metodo?></h5> </td>
                        <td style="width:10%"> <h5><?php echo $cantidad.$posologia?></h5> </td>
                        <td style="width:10%"> <h5><?php echo wordwrap($nota, 30, "\n", true)?></h5> </td>
                        <td style="width:10%"> <h5><?php echo wordwrap($nota2, 30, "\n", true)?></h5> </td>
                      </tr>
                      </table>
                    <?php

                  }

                  ?>

                </div>
              </div>
              <?php
              endif;
              ?>




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
  