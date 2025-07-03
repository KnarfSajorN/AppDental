<?php 
include 'header.php'

?>
<body>
<?php include 'menu.php'?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
      </ol>
    </section>


 
<section class="content">
 

 

<?php

// $clienteId = $_GET['clienteId'];
$clienteId = decrypt($_GET['cI']);
$ID = $_SESSION['ID'];




  echo '

<div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">

                      <!-- Modal content-->
                      <div class="modal-content">
                      <div class="modal-header" style="background-color:#3c8dbc;">
                      <button type="button" class="close" style="color:red;" data-dismiss="modal">&times; SALIR</button> 
                        <h4 class="modal-title" style="color:white;">Exámenes y Laboratorios</h4>
                      </div>

                      <div class="modal-body">  
                      <form action="guardarExamnes.php" method="POST" name="formularioEnvioExamen">
                      <div class="row"> 


                        <div class="box-body">
                            <label>Seleccione Examen de Imagenologia</label>
                            <select id="imagenologia_examen" name="Imagenologia_Examen[]" class="form-control select2" multiple="multiple" style="width: 100%;"> ';
                             
                              $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='1' order by id");
                              $nrowl = mysqli_num_rows($queryList);
                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                $id      = $row_recordset32['id'];
                                $Nombre      = $row_recordset32['Nombre'];
                                echo "<option value='$id'>$Nombre</option>";
                              }
                              ?>

                            <?php
  echo ' 
                            </select>

                            <label>Seleccione Examen de Laboratorio</label>
                            <select id="laboratorio_examenes" name="Laboratorio_Examenes[]" class="form-control select2" multiple="multiple" style="width: 100%;"> ';
                            
                              $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='2' order by id");
                              $nrowl = mysqli_num_rows($queryList);
                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                $id      = $row_recordset32['id'];
                                $Nombre      = $row_recordset32['Nombre'];
                                echo "<option value='$id'>$Nombre</option>";
                              }
                              ?>


                            <?php




  echo ' 
                            </select>

                          </div>
                          <input type="hidden" name="ID" id="ID" value= "'.$ID.'">
                        <input type="hidden" name="clienteId" id="clienteId" value="'.$clienteId.'">

    <button type="submit" class="btn btn-block btn-primary btn-sm"> <h5> <strong>  G u a r d a r  </strong> </h5> </button>
    <br>

     </form>
<!--   <center><button type="button" class="btn btn-warning" data-dismiss="modal" >Salir</button > </center> --> 

      </div>   
    </div><br></div>





 ';


 ?>

 

</section>

<!--
<?php include 'footer.php';?>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script> -->