<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $usuarioId = $_GET['usuarioId']; 

 $ID = $_SESSION['ID'];

 


$idConsentimiento = $_GET['idConsentimiento'];


if ($_GET['idConsentimiento']) {

    $queryList=mysqli_query($conn3,"SELECT * FROM  configDocumentos where id=$idConsentimiento");
    $nrowl=mysqli_num_rows($queryList);
    while($rowMotorizado=mysqli_fetch_array($queryList))
    {
        $nombre=$rowMotorizado['nombre'];
        $consentimiento=$rowMotorizado['consentimiento'];
        $firma=$rowMotorizado['firma'];
                         
    }
      
}



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Documentos
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Documetos </a></li>
        

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

<script type="text/javascript">
function copiarAlPortapapeles(id_elemento) {
  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);
}
</script>


          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
          






 <div class="col-md-12" align="center">


Variables Disponibles:   

</div>




 <div class="col-md-3">



<table>
<thead>
  <tr>
    <th><p id="p11">[[NOMBRE_PACIENTE]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p11')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>


 <div class="col-md-3">



<table>
<thead>
  <tr>
    <th><p id="p10">[[DOCUMENTO]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p10')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 <div class="col-md-3">



<table>
<thead>
  <tr>
    <th><p id="p9">[[NOMBRE_DOCTOR]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p9')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p8">[[EDAD]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p8')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 

 
 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p6">[[NOMBRE_DOCTOR]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p6')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 
 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p5">[[FECHAACTUAL]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p5')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 
 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p4">[[FECHANACIMIENTO]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p4')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 

 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p3">[[TELEFONO]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p3')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 

 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p2">[[CORREOELECTORNICO]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p2')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>

 <div class="col-md-3">
 
<table>
<thead>
  <tr>
    <th><p id="p12">[[CIUDAD]]</p></th>
    <th> <button onclick="copiarAlPortapapeles('p12')">  <i class="fa fa-copy" title="Copiar" name="Copiar"></i>  </button>
</th>
  </tr>
</thead>
</table>
</div>
 
</strong>  



<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- ********************************* Formulario para Editar    ******************************** -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
 <?php if ($_GET['idConsentimiento']): ?>
 
 

 <form action="configActualizarDocumentos.php" method="POST">

 

              <div class="box-body">
                      
            
              <div class="col-md-12"> <font size="1"> <h3 align="center">Editar Documento </h3> </font></div>
              <div class="form-group col-md-9">
                  <div align="left">Título</div>
                  <input type="text" class="form-control input-lg" id="fimico" name="titulo" value="<?php echo $nombre?>" placeholder="">
              </div>

                 <div class="form-group col-md-3">
                  <div align="left">Firma</div>
<?php
if ($firma == 0 ) {  $FirmaText = 'Sin Firma';}
if ($firma == 1 ) {  $FirmaText = 'Con Firma';}
?>
                  <select class="form-control input-lg" id="fimico" name="firma">

                    <option value="<?php echo $nombre?>"><?php echo $FirmaText?></option>
                    <option value="0">Sin Firma</option>
                    <option value="1" selected>Con Firma</option>
                  </select>
                  
                </div>

                <div class="form-group col-md-12">
<textarea id="editor1" name="consentimiento" ><?php echo $consentimiento?></textarea>
 
 </div>
                </div>

   </div>


      
                    
            <input  type="hidden" name="usuario"  value="<?php echo $_SESSION['ID']?>">
            <input  type="hidden" name="idConsentimiento"  value="<?php echo $idConsentimiento?>">
                    
             <div class="col-sm-12">
             
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  A C T U A L I Z A R  </strong> </h2> </button></center>
            
            </div>
           
              
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
          </form>
   
 <?php endif ?>











<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- ************************* Formulario para Registrar Nuevo   ******************************** -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<!-- *********************************************  ********************************************* -->
<?php if ($idConsentimiento == ''): ?>
 
 <form action="configGuardarDocumentos.php" method="POST">
 

              <div class="box-body">
                      
            
              <div class="col-md-12"> <font size="1"> <h3 align="center">Agregar Nuevo Documento </h3> </font></div>
              <div class="form-group col-md-9">
                  <div align="left">Título</div>
                  <input type="text" class="form-control input-lg" id="fimico" name="titulo"  placeholder="">
              </div>

                 <div class="form-group col-md-3">
                  <div align="left">Firma</div>
 
                  <select class="form-control input-lg" id="fimico" name="firma">

                     <option value="0">Sin Firma</option>
                    <option value="1" selected>Con Firma</option>
                  </select>
                  
                </div>

                <div class="form-group col-md-12">
<textarea id="editor1" name="consentimiento" >
                                         
   <center><strong aling="center"> Titulo </strong></center>


  Fecha: <?php echo date("d-m-Y") ?> Hora: <?php echo date("h:m") ?>
  <br><br>
 








                          </textarea>
 
 </div>
                </div>

   </div>


      
                    
            <input  type="hidden" name="usuario"  value="<?php echo $_SESSION['ID']?>">
                    
             <div class="col-sm-12">
             
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
            
            </div>
           
              
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
          </form>
   
 <?php endif ?>
 

<br>

  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Titulo </th>
                    <th class="text-center">Fecha </th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                      
              $queryListhc=mysqli_query($conn3,"SELECT * from configDocumentos where activo = 1");
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $id=$rowhc['id'];
                $nombre=$rowhc['nombre'];
               
                $name=$rowhc['fecha'];
               
                 
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$name.'</td>
                     
                      <td>

                      <form method>
                     
                      <font color="#04CC05"> <a href="configDocumentos.php?idConsentimiento='.$id.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>

                       <font color="#04CC05"> <a href="configPreliminarDocumento.php?id='.$id.'"> <i class="fa fa-eye" title="ver" name="Virtual"></i>  </a></font>


                      </td>
                      </tr>';
                  } 
 ?>
 
                </tbody>
                <tfoot>
                <tr>
                   <th class="text-center">nombre </th>
                    <th class="text-center">tabla </th>
                    <th class="text-center">   </th>
                
                </tr>
                </tfoot>
              </table>
            </div>







    </div>
    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>  
          
          
        
     

<?php include("footer.php")?>

