<?php
    include 'header.php';
    include 'menu.php';
date_default_timezone_set('America/Bogota');
$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 
 
        $filtro = $_GET['filtro'];
        $tabla = $_GET['tabla'];
        
        $Columna = $_GET['Columna'];
        $origen = $_GET['origen'];
        $idUsuario = $_GET['idUsuario'];

        $campoEditado = $_GET['campoEditado'];
        $columnaEditado = $_GET['columnaEditado'];

   
  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 






if ($_GET['actualiza']==1)
{
  echo '---------------------------------1';

         $autorizaFecha = date("Y-m-d");
        $autorizaHora = date("H:i:s");
$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 
 
        $autorizar = $_GET['autorizar'];
        $filtro = $_GET['filtro'];
        $tabla = $_GET['tabla'];
        
        $Columna = $_GET['Columna'];
        $origen = $_GET['origen'];
        $idUsuario = $_GET['idUsuario'];

        $campoEditado = $_GET['campoEditado'];
        $columnaEditado = $_GET['columnaEditado'];
            
 $query = 'update  '.$tabla.' set '.$columnaEditado.' = "'.$autorizar.'"  WHERE '.$Columna.' = '.$filtro.'';
       
       mysqli_query($conn3, $query);
       mssql_query($query);
  
 
auditorMaster($idUsuario, '3', $enlace_actual, $query);

 
    echo "<script language='Javascript'> window.location='$origen';</script>";

}








?>
 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
     
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Editor </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
            
              <div class="box box-solid">

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion1">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div align="center">
                      
                    <font color="blue">
                  <h3> 
            Editar </h3>
                    
                  </font>  
                    </div>
<?php
 echo 'Editaremos: <strong> '. $campoEditado.'</strong><br>';
 
?>



<hr>


                    <form action="masterEditor.php" method="GET" >
 
                    <div class="form-group col-md-12">
                              
<div class="form-group col-md-12">
        

                              <div align="left">Por </div>                      
                              <div align="right">
                            <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                            </div>
                        
                        <div class="box-body pad">
                          <textarea id="enfermedadActual" name="autorizar" class="textarea" placeholder="Nota comentarios
" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                              
                            </div>

 
                          <input  type="hidden" name="filtro" value="<?php echo $filtro;?>">
                          <input  type="hidden" name="tabla"  value="<?php echo $tabla;?>">
                          <input  type="hidden" name="Columna"  value="<?php echo $Columna;?>">
                          <input  type="hidden" name="origen"  value="<?php echo $origen;?>">
                          <input  type="hidden" name="campoEditado"  value="<?php echo $campoEditado;?>">
                          <input  type="hidden" name="columnaEditado"  value="<?php echo $columnaEditado;?>">
                          <input  type="hidden" name="idUsuario"  value="<?php echo $idUsuario;?>">
                     
                          <input  type="hidden" name="actualiza"  value="1">
                           
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
                        </div>

                      </div>

                    </form>

                  </div>

                 

      </div>

    </div>

  </section>

</div>


<?php include("footer.php")?>

 

