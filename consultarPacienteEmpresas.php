

<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!



$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

include 'funciones/seguridad.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
$ID = $_SESSION['id'];
$ususario_id = $_SESSION['ID'];
$tipo = $_SESSION['tipo'];

// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql
 

auditorMaster($ususario_id, '2', $enlace_actual, '-');




                            $queryList=mysqli_query($conn3,"SELECT * FROM v_clienteE where id=$ID ");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $nombre_empresa     = $row_recordset32['nombre'];
                                   

                            }










  $clienteId = $_GET['clienteId']; 


        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {

            $nombre_cliente=$rowMotorizado['nombre_cliente']; }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  <?php echo $sistema?>  </title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- para el tema de los acentos con mysql -->

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <!-- para el tema de los acentos con mysql -->


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="plugins/morris/morris.css">
   
 <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">   -->
<link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load.
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">  -->

 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->

<!--End of Zendesk Chat Script-->
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>





</head>
<body  class="hold-transition skin-blue sidebar-mini" >
 
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <!--<a href="" class="logo">
       <span class="logo-mini">  <img src="img/logoSolo.png" width="90%" height="90%"></span>
   
   
    <span class="logo-lg">  <img src="logos/logoSolo.png" width="90%" height="90%"> </span>
      <
    </a>-->

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     

    
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
        <li >
             <font color="#3c8dbc"> <h4 align="center"> <b> <?php echo $nombre_empresa?> </b>  </h4></font> 
 </li>
          <li  title="Salir">
            <a href="funciones/salirEmpresa.php">
              <i class="fa fa-close"> Cerrar Sesión</i>
            </a>
          </li>
          
       
          
        </ul>
      </div>

    </nav>
  </header>
               
               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Conceptos Ocupacional</a></li>
            
              <li><a href="#ExamenesEcografias" data-toggle="tab">Certificado Aptitud Laboral</a></li>
               <!--<li><a href="#receta" data-toggle="tab">Informe Medico</a></li>-->
                <li><a href="#Examenes" data-toggle="tab">Registros de  Archivos Imágenes</a></li>

            

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
         
           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Conceptos Ocupacional
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaclinica6_labora where cliente_id = $clienteId order by id DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['ID'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                  


                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="imprimirCertificado.php?historiaClinica1=<?php echo $ID?>" title="Ver Concepto" target="_blank"><i class="fa fa-file-text-o"></i> </a> 
                      </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                
                  </div>
                </div>
 
              
            <?php }  ?>



              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        








      </div>
              <!-- /.tab-pane -->
              
 
      
  <div class="tab-pane" id="Examenes">
  <hr align="center" size="10" width="100%" color="#000000">
           <h3> Registro de Archivos </h3>  
 
                 <table width="100%" border="1" >
  <tr>
    <th class="tg-c3ow">Resultados</th>
    <th class="tg-0pky"></th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax"></th>
    <th class="tg-0lax"></th>
  </tr>

                      <?php  
 $queryImg=mysqli_query($conn3,"SELECT * FROM archivos  where cliente_id = '$clienteId'");
                  $nrowlER=mysqli_num_rows($queryImg);
                  while($resulImg=mysqli_fetch_array($queryImg))
                  {

                     $Producto              = $resulImg['id'];
                    ?>
  <tr>
    <th>

    <?php echo $resulImg['descripcion']; ?>
      
    </th>
    <th>
    <?php echo $resulImg['fecha']; ?>
      

    </th>
    <th>
      
       <a target="blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                            <a href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>"download="Archivo">Descargar Archivo    
</a>  
                              </a>  

    </th>
    <th>
        <a target="_blank" href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base;?>/archivos/<?php echo $resulImg['codigo']; ?>" >Ver Archivo o Imagen     <br>
</a>  
                              </a> 

    </th>

      <th>
       <a   target="_blank" href="<?php echo $Base;?>enviarArchivo.php?cliente=<?php echo $clienteId;?>&id=<?php echo $Producto ;?>"> 
                               Enviar Archivo   <br>
</a>  
                              </a> 

    </th>
  </tr>

                            

                              


                            <?php } ?>

                            </table>
       
  </div>

              
            







    <div class="tab-pane" id="ExamenesEcografias">
      <hr align="center" size="10" width="100%" color="#000000">
          <h3>
           Certificado Laboral
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  conceptolaboral where cliente_id = $clienteId  order by id DESC");
                //echo  "SELECT * FROM  visiometria where idCliente = $clienteId  and estado ='1' order by ID DESC";

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['id'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                  


                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="configImprimirConsulta.php?historiaClinica=<?php echo $ID?>&idHistoria=38" title="Ver Certificado" target="_blank"><i class="fa fa-file-text-o"></i> </a> 
                      </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                
                  </div>
                </div>
 
              
            <?php }  ?>



              </div>

          

<div class="tab-pane" id="receta">
      <hr align="center" size="10" width="100%" color="#000000">
          <h3>
           Conceptos Optometría
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  informemedico where cliente_id = $clienteId  order by id DESC");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                      $ID                 = $row_recordset32['id'];                
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                  


                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?> <a href="configImprimirConsulta.php?historiaClinica=<?php echo $ID?>&idHistoria=56" title="Ver Informe" target="_blank"><i class="fa fa-file-text-o"></i> </a>
                      </a>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                
                  </div>
                </div>
 
              
            <?php }  ?>



              </div>
            



   
  
              </div>































        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footerregistro.php';

   ?>