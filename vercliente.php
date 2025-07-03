 
<?php
        
            $clienteId = $_GET['clienteId']; 
            $usuarioId = $_GET['usuarioId']; 


date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include("funciones/conn3.php");

                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
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
            $antecedentes=$rowMotorizado['antecedentes'];
          }

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

               

              $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $especialidad        = $rowMotorizado['especialidad'];
              $nit                =$rowMotorizado['nit'];

              $LogoF               =$rowMotorizado['logoF'];
              $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="175" width="175">'; 
              }
              

            
   if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="200">'; 
              }

// Nuevos campos 
 
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
               $Logo = '<img src="'.$Base.'logos/'.$LogoF.'" height="100" width="100%">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="150" width="150">'; 
              }





// Nuevos campos 


            }
 

  

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado1=mysqli_fetch_array($queryList))
            { 

              $nombre_cliente             =$rowMotorizado1['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado1['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado1['fechaNacimiento'];
              $celular_cliente            =$rowMotorizado1['celular_cliente'];
              $seguro                     =$rowMotorizado1['entidadSalud'];
              $direccion_cliente          =$rowMotorizado1['direccion_cliente'];
                 $etnia=$rowMotorizado['etnia'];
              $discapacidad=$rowMotorizado['tipodiscapacidad'];
            }

 
   ?>

  <!DOCTYPE html>
<html> 
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $empresaNombre ?> </title>





<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!-- estilos css-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<!-- estilos css-->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">
   <!--<link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/co131/estilopiepagina.css">-->

</head>





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
    <td  width="45%" class="nombrePaciente"><h6>Nombre del paciente: <?php echo $nombre_cliente ?> </h6></td>
    <td  width="15%" class="documento"><h6>Documento: <?php echo $CODI_CLIENTE ?> </h6></td>
    <td width="15%"  class="edad"><h6>Edad:  <?php echo  calculaedad($fechaNacimiento) ?> </h6> </td>
    <td  width="25%" class="f.nacimiento"><h6>F.Nacimiento: <?php echo  $fechaNacimiento ?> </h6></td>

  </tr>
                
  <tr>
    <td class="residencia"><h6>Residencia: <?php echo $direccion_cliente?></h6></td>
    <td class="seguro"><h6>EPS:<?php echo $seguro  ?> </h6></td>
    <td class="genero"><h6>Genero: <?php echo $genero?></h6></td>
     <td class="telefono"><h6>Telefono: <?php echo $celular_cliente?></h6></td>
  </tr></table>
</div>
</div>
        <div class="row">
        <h4 align="center"> Historia Clinica </h4>
                <div class="col-md-12">
          </div>
        </div>


 
      <div class="card" style="width: 100%; margin-left: auto; margin-right: auto;">


 


          <!--<?php 
echo '  <a href="consultaCliente.php?clienteId='.$clienteId.'" title="Ver Historia" class="btn btn-default">  Regresar</a>   ';

          ?> 
          <!--<a href='javascript:window.print(); void 0;'  class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        <div class="card-body">
           <div class="form-row">-->


          
         <!-- <h4 class="card-title">Historia Clinica General</h4>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
                                                                                               
            
              <div class="col-md-6">
                 <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id;?>" required>
                 <input type="hidden" id="usuarioId" name="usuarioId" value="<?php echo $usuarioId;?>" required>

               <label for="nombre" class="col-form-label"><strong>Correo:</strong></label>
                <label for="nombre" class="col-form-label"> <?php echo $correo_cliente;?>  </label>
              </div>

              <div class="col-md-6">
                <label for="inputPassword4" class="col-form-label"><strong>Nombre:</strong></label>
                 <label for="nombre" class="col-form-label"><?php echo $nombre_cliente;?> </label>
              </div>

              <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Celular:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $CODI_CLIENTE;?></label>
              </div>
               
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Fecha Registro:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $fechar;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Genero:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $genero;?></label>
              </div>
       
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>  Direccion:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $direccion_cliente ;?></label>
              </div>
              <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong>Ciudad:</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $ciudad_cliente;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Telefono :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $telefono_cliente ;?></label>
              </div>
               <div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Edad :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $edad_cliente ;?></label>
              </div>
               <!--<div class="col-md-6">
                <label for="inputAddress" class="col-form-label"><strong> Profesion :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $profesion_cliente ;?></label>
              </div>-->
               <!--<div class="col-md-12">
                <label for="inputAddress" class="col-form-label"><strong>Antecedentes  :</strong></label>
                <label for="nombre" class="col-form-label"><?php echo $antecedentes;?></label>
              </div>-->
               
            </div>
          
   <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Historia  Clinica   
        </a>-->
      </h5>
    </div>

<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
<div class="card-block">



 <div class="form-row">
 
 

                    <?php 
             
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica1 where cliente_id = $clienteId order by ID DESC");
               //  echo "SELECT * FROM  historiaClinica1 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))
 
                  {
                      $Fecha                 = $row_recordset32['Fecha'];                
                      $Hora                  = $row_recordset32['Hora'];                
                      $motivoConsulta        = $row_recordset32['motivoConsulta'];
                      $enfermedadActual      = $row_recordset32['enfermedadActual'];  
                      $rSistema              = $row_recordset32['rSistema']; 
                      $antecedentesPers      = $row_recordset32['antecedentesPers'];  
                      $antecedentesFami      = $row_recordset32['antecedentesFami'];         
                      $diagnosticoMsalud     = $row_recordset32['diagnosticoMsalud'];      
                      $tratamiento           = $row_recordset32['tratamiento'];
                      $incapacidades   =$row_recordset32['incapacidades']; 
           
                     ?>
               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right"  class="col-md-12">
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              <h5> ENTREVISTA INICIAL  <br> 
              <div  class="col-md-12">
              <label>Motivo Consulta:</label>
              <label><?php echo $motivoConsulta?></label>
              </div>
               
              <div class="col-md-12">
              <label>Enfermedad Actual:</label>
              <label><?php echo $enfermedadActual?></label>
              </div>
              

              <h5> REVISION POR SISTEMA <br> 
              <div class="col-md-12">
              <label>Revision por Sistema:</label>
              <label><?php echo $rSistema?></label>
              </div>
              
              <h5> ANTECEDENTES  <br> 
               <div class="col-md-12">
              <label> Antecedentes Personales:</label>
              <label><?php echo $antecedentesPers?></label> 
              </div>

               <div class="col-md-12">
              <label> Antecedentes Familiares:</label>
              <label><?php echo $antecedentesFami?></label> 
              </div>

               <h5> DIAGNOSTICO MINISTERIO DE SALUD   <br> 
              <div class="col-md-12">
              <label> Diagnostico :</label>
              <label><?php echo $diagnosticoMsalud?></label> 
              </div>
              

               <h5> TRATAMIENTO (PLAN DE ATENCION)   <br> 
              <div class="col-md-12">
               <label> Tratamiento:</label>
                <label><?php echo $tratamiento?></label>
              </div>

              <h5> INCAPACIDADES <br> 
              <div class="col-md-12">
               <label> Incapaciadad:</label>
                <label><?php echo $incapacidades?></label>
              </div>
                 
               
            <?php }  ?>

              </div>
              <!-- /.tab-pane -->
            
           
      
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          
          Documentos y examenes   
        
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="card-block">
  <div class="form-row">
      
      
      


                  <?php 
               
                  mysqli_select_db($database_yapo, $con);

                  $query_recordset32 = "SELECT * FROM  historiaImagen where cliente_id = $clienteId order by IM_id DESC";
                  
                  $recordset32 = mysqli_query($con,$query_recordset32) or die(mysqli_error());
                  
                  $row_recordset32 = mysqli_fetch_assoc($recordset32);
                  $totalRows_recordset32 = mysqli_num_rows($recordset32);
                  do {
                      $cliente_id                    = $row_recordset32['clienteid'];
                      $usuario_id                    = $row_recordset32['usuario_id'];              
                      $usuario_id                    = $row_recordset32['usuario_id'];                   
                      $CODI_CLIENTE                  = $row_recordset32['CODI_CLIENTE'];                 
                      $Fecha                         = $row_recordset32['Fecha'];                        
                      $nombre_img                         = $row_recordset32['nombre_img'];                        
                                   
                      $Descripcion                = $row_recordset32['Descripcion'];               
                   
                             
                                    
                     ?>

                    <hr align="center" size="10" width="100%" color="#000000">

                   

              <div class="col-md-12">
              <div align="right" >
              Fecha <?php echo $Fecha?>
              </div>


              </div>
             
        
              
              <label><strong>  Descripcion  </strong></label><br>
              <label>           
              <?php echo $Descripcion?>    </label>  <br>
              <div  class="col-md-12" align="center">
               
              <img src="uploads/<?php echo $nombre_img; ?>" alt="" width="80%" height="90%"/>
              
              </div>

              
             <?php 
           } while ($row_recordset32 = mysqli_fetch_assoc($recordset32)); ?>
</div>
</div>
 <div class="col-xs-12" align="center">
    <footer  style="width:100%; margin-left: 0px;"  >


<div class="copyright" style="background-color: #0d47a1;">
    <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
       <p> <?php echo $pieF?></p>

    </div>
</div>
      </footer> </div>
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

          
        
 