<?php
    include 'header.php';
    include 'menu.php';

  
    $empresa= $_GET['empresa'];
    $ID = $_SESSION['ID'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                                              $queryList = mysqli_query($conn3, "SELECT * FROM v_clienteE where id ='$empresa' ");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcioncc      = $row_recordset32['nombre'];
                                                 
                                              
                                                echo "<option value='$descripcioncc'> $descripcioncc</option>";
                                              }

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Agregar convenios para  empresa: <?php echo $descripcioncc; ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Convenios  </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
   <div class="box box-solid">

          

<form action="guardarNuevoConvenio.php" method="POST" name="formularioActualizarcliente">

                    

                            <div class="form-group col-md-12">
                      <b> <h4> Agregar nueva empresa convenio </h4>   <b>    
 <input type="hidden" name="empresa" id="empresa"  value="<?php echo $empresa; ?>">
  <div class="form-group col-md-12">
               
                <input   type="text"   class="form-control input-lg" id="" name="nombreConvenio" placeholder=" Nombre de la empresa convenio">
                
              </div>

</div>




<div class="col-sm-12">
                          <br> <br> 
                              <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>  Guardar </strong> </h4> </button></center>

                            </div>



</form>





<br> <br>


<form action="guardarConvenio.php" method="POST">


        
<div class="form-group col-md-8" align="left">
          <h4> Seleccionar empresa para convenio </h4>
       </div>
                
              
 <select  name="convenio"  id="convenio" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione convenio</option>

                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM convenio");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcionc      = $row_recordset32['nombre'];
                                                 $idConvenio     = $row_recordset32['ID'];
                                              
                                                echo "<option value='$idConvenio'> $descripcionc</option>";
                                              }
                                              ?>
 
                </select>  


 <input type="hidden" name="empresa" id="empresa"  value="<?php echo $empresa; ?>">
     
         




             <div class="form-group col-md-12">
                  <br>
                   
<a href="#"  onclick="agregarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar convenios a la empresa. </strong>  </font> </a>
            
              </div>

               <br><br>

 <div class="form-group col-md-12" id="div-results"></div>

        </div>
   <div class="col-md-12" align="center">
  
<a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"  href="<?php echo $Base;?>convenios.php?&empresa=<?php echo $empresa;?>"> 
  <i class=""></i> <font size="4">  Actualizar la lista de convenios con la empresa <?php echo $descripcioncc; ?>  </font>
</a>
<br>
</div>


<?php
echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th aling="center" colspan= "12"> <h4 aling="center" >  Convenios asosiados </h4></th> </tr> ';

$cont = 0;
$queryList=mysqli_query($conn3,"SELECT * FROM  entidadconvenio where   idEmpresa ='$empresa' ");

$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
        $cont++;
    $idOper1     =$rowMotorizado['ID'];
    $nombre_convenio   =$rowMotorizado['nombre_convenio'];
  




echo '<tr> <th colspan= "10"> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" >   <a href="#"  onclick="eliminarItem'.$cont.'();"> <font size="5"> <strong> <i class="fa fa-trash"> </i>   </strong>  </font> </a>    
    '.$nombre_convenio.'</th> <!--<td colspan= "2"><font color="#04CC05"> <a href="examenes.php?convenio='.$idOper1.'&empresa='.$empresa.'"> <i class=""fa fa-plus" title="Agregar examen" name="Virtual"></i> Agregar y ver examenes </a></font></td>--></tr>
    ';

}
        
   echo '</table></h6>';

           //  echo "<script language='Javascript'> window.location='ordenLaboratorio.php?clienteId=$clienteId';</script>"; 
   
              
                                                                        
      ?>

  <!--   <div class="modal-footer">
          
          <input type="submit" class="btn btn-primary waves-effect waves-light " value="Guardar Convenio" name="guardarEmpresa">
        </div> -->
      </div>
    </div>
  </div>

</form>

</section>

</div>


<?php include("footer.php")?>

<script type="text/javascript">

    function agregarItem(){
       
 var empresa = $("#empresa").val();
 var idConvenio= $("#idConvenio").val();
 var convenio= $("#convenio").val();

        $.ajax({
            type: "POST",
            url: "guardarConvenio.php",
            data: {empresa:empresa, idConvenio:idConvenio, convenio:convenio},
            success: function(response) {

               
                $('#div-results').html(response);
                  
            }
        });

    };


    <?php

for ($i = 1; $i <= 10; $i++) {
 ?>

      function eliminarItem<?php echo $i?>()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper<?php echo $i?>").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var empresa = $("#empresa").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemConvenio.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, empresa:empresa},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };



<?
}

?>             

</script>
