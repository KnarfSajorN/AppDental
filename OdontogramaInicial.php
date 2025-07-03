   <?php 
   include 'header.php';
   include 'menu.php';

   

   $IDconfig = $_SESSION['ID'];
 
$clienteId = $_GET['clienteId'];
   
if ($clienteId>0) {

include 'funciones/conn3.php';

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
           

           }


//     $_SESSION['NOMBRE_USUARIO']

}


   $msg = $_GET['msg'];
if ($msg == 1) 
{
$respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 2) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 3) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 4) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';

}
elseif ($msg == 5) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';

}




if(isset($_GET['editar_estado']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_estado'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 

  


      $queryList=mysqli_query($conn3,"SELECT * FROM  piezas_estado where id= '$codigo'");
 
        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $pieza= $rowMotorizado['pieza'];
            $Vestibular1 = $rowMotorizado['vestibular'];
            $Mesial1 = $rowMotorizado['mesial'];
            $Lingual1 = $rowMotorizado['lingual'];
            $Distal1 = $rowMotorizado['distal'];
            $Oclusal1 = $rowMotorizado['oclusal'];
           
            $idE = $rowMotorizado['id'];
          
        }



                 
      $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Vestibular1'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
           $Vestibular = $rowMotorizado['nombre'];
            
          }

              
      $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Mesial1'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $Mesial= $rowMotorizado['nombre'];
            
          }
                  
 $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Lingual1'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
          $Lingual= $rowMotorizado['nombre'];
            
          }


 $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Distal1'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
           $Distal= $rowMotorizado['nombre'];
            
          }

      $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Oclusal1'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
           $Oclusal= $rowMotorizado['nombre'];
            
          }









}


      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Odontograma Inicial</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Odontograma Inicial</h4>
          <br>




           <form action="OdontogramaInicial.php?clienteId=<?php echo $clienteId?>" method="POST">
            <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>



         
    <div class="form-group col-md-2">
    Seleccione la Pieza
         
           <select id="pieza"   name="pieza" class="form-control select2" onChange="validar();"   style="width: 100%;">

   <option value="<?php echo  $pieza;?>" select> <?php echo $pieza?></option> 
 
<?php
      
                        $queryLista=mysqli_query($conn3,"SELECT * FROM piezas ");

                 

                                      $nrowl=mysqli_num_rows($queryLista);
                                      while($row_recordset32=mysqli_fetch_array($queryLista))
                                      {
                                         
                                          $nombre= $row_recordset32['nombre'];
                     
                                         
                                          echo "<option value='$nombre'> $nombre </option>";
                                      }

                    ?>









<!--
<?php
                        $queryList=mysqli_query($conn3,"SELECT p.nombre FROM piezas_estado e, piezas p where e.pieza <> p.nombre group by nombre ");

                 

                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                         
                                          $nombre= $row_recordset32A['nombre'];

echo "<option value='$nombre'> $nombre </option>";
                                       

                                        } ?>

-->


<!--
<?php
                        $queryList=mysqli_query($conn3,"SELECT * FROM piezas_estado");

                 

                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                         
                                          $pieza1= $row_recordset32A['pieza'];
                     
                                         
                              
                        $queryLista=mysqli_query($conn3,"SELECT * FROM piezas where nombre <> '$pieza1' group by nombre ");

                 

                                      $nrowl=mysqli_num_rows($queryLista);
                                      while($row_recordset32=mysqli_fetch_array($queryLista))
                                      {
                                         
                                          $nombre= $row_recordset32['nombre'];
                     
                                         
                                          echo "<option value='$nombre'> $nombre </option>";
                                      }
}
                    ?>

                -->
 
                </select>


          </div>  

<input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $clienteId?>">
              
  
   


 <?php if ($idE >0 ) { echo'
 <div class="form-group col-md-2">
    
         Vestibular 1
         
                
           <select id="vestibular"   name="vestibular" class="form-control select2" style="width: 100%;" >

   <option value="'.$Vestibular1.'" select>'.$Vestibular.' </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
       echo '    </select>

          </div> 






<div class="form-group col-md-2">
    
         Mesial
         
                
           <select id="Mesial"   name="Mesial" class="form-control select2" style="width: 100%;" >

   <option value="'.$Mesial1.'" select> '.$Mesial.' </option> ';

 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}

echo '
                   
            </select>

          </div> 



<div class="form-group col-md-2">
    
         Lingual
         
                
           <select id="Lingual"   name="Lingual" class="form-control select2" style="width: 100%;" >

   <option value=" '.$Lingual1.' " select> '.$Lingual.' </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}
echo '

                   
            </select>

          </div> 


<div class="form-group col-md-2">
    
         Distal
         
                
           <select id="Distal"   name="Distal" class="form-control select2" style="width: 100%;" >

   <option value="'.$Distal1.'" select> '.$Distal.' </option> ';


 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


                   
       echo '   </select>

          </div> 


<div class="form-group col-md-2">
    
         Oclusal
         
                
           <select id="Oclusal"   name="Oclusal" class="form-control select2" style="width: 100%;" >

   <option value="'.$Oclusal1.'"  select> '.$Oclusal.' </option>  ';



 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];

              echo "<option value='$id'> $nombre </option>";
}


   echo   '           
            </select>

          </div> ';

}

else { echo '<div id="div-results"></div>';}




 ?>
               
              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $clienteId?>">
              
              <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_odontograma"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_odontograma"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Pieza</th>
                    <th class="text-center">Vestibular </th>
                    <th class="text-center"> Mesial  </th>
                    <th class="text-center"> lingual  </th>
                    <th class="text-center"> Distal  </th>
                    <th class="text-center"> Oclusal </th>
                    <th class="text-center">  </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 

                 $queryListA=mysqli_query($conn3,"SELECT * FROM piezas_estado where cliente ='$clienteId'");

                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($rowMotorizado=mysqli_fetch_array($queryListA))

                  {
                      $id= $rowMotorizado['id'];
                      $pieza= $rowMotorizado['pieza'];
            $Vestibular = $rowMotorizado['vestibular'];
            if ($Vestibular == 0) { $vesti = ' ';}
            $Mesial = $rowMotorizado['mesial'];
            if ($Mesial  == 0) { $mesi = ' ';}
            $Lingual = $rowMotorizado['lingual'];
            if ($Lingual  == 0) { $lin = ' ';}
            $Distal = $rowMotorizado['distal'];
            if ($Distal  == 0) { $dis = ' ';}
            $Oclusal = $rowMotorizado['oclusal'];
            if ($Oclusal == 0) { $oclu = ' ';}



                    
      $queryList1=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Vestibular'");

        $nrowl=mysqli_num_rows($queryList1);

        while($rowMotorizado1=mysqli_fetch_array($queryList1))

        {
      
            $vesti = $rowMotorizado1['nombre'];
            
          }

              
      $queryList2=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Mesial'");

        $nrowl=mysqli_num_rows($queryList2);

        while($rowMotorizado2=mysqli_fetch_array($queryList2))

        {
      
            $mesi= $rowMotorizado2['nombre'];
            
          }



                  
 $queryList3=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Lingual'");

        $nrowl=mysqli_num_rows($queryList3);

        while($rowMotorizado3=mysqli_fetch_array($queryList3))

        {
      
            $lin= $rowMotorizado3['nombre'];
            
          }


 $queryList4=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Distal'");

        $nrowl=mysqli_num_rows($queryList4);

        while($rowMotorizado4=mysqli_fetch_array($queryList4))

        {
      
            $dis= $rowMotorizado4['nombre'];
            
          }



      $queryList5=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$Oclusal'");
        $nrowl=mysqli_num_rows($queryList5);

        while($rowMotorizado5=mysqli_fetch_array($queryList5))

        {
      
            $oclu= $rowMotorizado5['nombre'];
            
          }
 


      echo '      
                      <tr>
                      <td> '.$pieza.'</td>
                      <td> '.$vesti.'</td>
                      <td> '.$mesi.'</td>
                      <td> '.$lin.'</td>
                      <td> '.$dis.'</td>
                      <td> '.$oclu.'</td>
                     
                      <td>

                      <form method>
                      
                      <font color="#04CC05"> <a href="OdontogramaInicial.php?clienteId='.$clienteId.'&editar_estado='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                     <th class="text-center">Pieza</th>
                    <th class="text-center">Vestibular </th>
                    <th class="text-center"> Mesial  </th>
                    <th class="text-center"> lingual  </th>
                    <th class="text-center"> Distal  </th>
                    <th class="text-center"> Oclusal </th>
               
       
                    <th class="text-center">   </th>
                </tr>
                </tfoot>
              </table>
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
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>

 <!-- Funciona para consultar disponibilidad -->

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">


  function validar(){
// estas son las variables que enviamos

        var pieza = $("#pieza").val();
        var cliente_id= $("#cliente_id").val();
      
// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_odonto_verificar.php",
            data: {pieza:pieza, cliente_id:cliente_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

 
</script>