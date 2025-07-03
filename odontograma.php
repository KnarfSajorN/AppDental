   <?php
    include 'header.php';
    include 'menu.php';



    $IDconfig = $_SESSION['ID'];

    $clienteId = $_GET['clienteId'];

    if ($clienteId > 0) {

        include 'funciones/conn3.php';

        $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $usuario_id = $rowMotorizado['usuario_id'];
            $nombre_cliente = $rowMotorizado['nombre_cliente'];
        }


        //     $_SESSION['NOMBRE_USUARIO']

    }


    $msg = $_GET['msg'];
    if ($msg == 1) {
        $respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 2) {

        $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 3) {

        $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 4) {

        $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';
    } elseif ($msg == 5) {

        $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';
    }




    if (isset($_GET['editar_estado'])) {



        $codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_estado'])));

        $usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));





        $queryList = mysqli_query($conn3, "SELECT * FROM  piezas_estado where id= '$codigo'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $pieza = $rowMotorizado['pieza'];
            $Vestibular1 = $rowMotorizado['vestibular'];
            $Mesial1 = $rowMotorizado['mesial'];
            $Lingual1 = $rowMotorizado['lingual'];
            $Distal1 = $rowMotorizado['distal'];
            $Oclusal1 = $rowMotorizado['oclusal'];

            $idE = $rowMotorizado['id'];
        }




        $queryList = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Vestibular1'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $Vestibular = $rowMotorizado['nombre'];
        }


        $queryList = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Mesial1'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $Mesial = $rowMotorizado['nombre'];
        }

        $queryList = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Lingual1'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $Lingual = $rowMotorizado['nombre'];
        }


        $queryList = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Distal1'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $Distal = $rowMotorizado['nombre'];
        }

        $queryList = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Oclusal1'");

        $nrowl = mysqli_num_rows($queryList);

        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $Oclusal = $rowMotorizado['nombre'];
        }
    }


    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <section class="content-header">

           <ol class="breadcrumb">
               <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
               <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración </a></li>
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




                       <form action="odontograma.php?clienteId=<?php echo $clienteId ?>" method="POST">
                           <div class="form-row">
                               <div class="col-md-12">
                                   <?php echo $respuesta; ?>
                               </div>






                               <?php







                                $queryLista = mysqli_query($conn3, "SELECT * FROM piezas ");
                                $nrowl = mysqli_num_rows($queryLista);
                                while ($row_recordset32 = mysqli_fetch_array($queryLista)) {

                                    $nombrePieza = $row_recordset32['nombre'];


                                    $numero++;


                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM piezas_estado  where cliente=$clienteId and pieza= '$nombrePieza'");


                                    $nrowl1 = mysqli_num_rows($queryList1);

                                    if ($nrowl1 == '') {
                                        //  echo "<option value='$nombre'> $nombre </option>";  
                                        echo ' <div class="form-group col-md-1"><b>' . $nombrePieza . ' </b> </div>
    

 <div class="form-group col-md-2">
    
         Vestibular 
         
                
           <select id="vestibular' . $numero . '"   name="vestibular' . $numero . '" class="form-control select2" style="width: 100%;" >

   <option value="' . $Vestibular1 . '" select>' . $Vestibular . ' </option> ';


                                        $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                        $nrowl = mysqli_num_rows($queryListA);

                                        while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                            $id = $row_recordset32A['id'];
                                            $nombre = $row_recordset32A['nombre'];
                                            $color = $row_recordset32A['color'];

                                            echo "<option value='$id'> $nombre </option>";
                                        }




                                        echo '    </select>

          </div> 






<div class="form-group col-md-2">
    
         Mesial
         
                
           <select id="Mesial' . $numero . '"   name="Mesial' . $numero . '" class="form-control select2" style="width: 100%;" >

   <option value="' . $Mesial1 . '" select> ' . $Mesial . ' </option> ';

                                        $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                        $nrowl = mysqli_num_rows($queryListA);

                                        while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                            $id = $row_recordset32A['id'];
                                            $nombre = $row_recordset32A['nombre'];
                                            $color = $row_recordset32A['color'];

                                            echo "<option value='$id'> $nombre </option>";
                                        }

                                        echo '
                   
            </select>

          </div> 



<div class="form-group col-md-2">
    
         Lingual x
         
                
           <select id="Lingual' . $numero . '"   name="Lingual' . $numero . '" class="form-control select2" style="width: 100%;" >

   <option value=""> </option> ';


                                        $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                        $nrowl = mysqli_num_rows($queryListA);

                                        while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                            $id = $row_recordset32A['id'];
                                            $nombre = $row_recordset32A['nombre'];
                                            $color = $row_recordset32A['color'];

                                            echo "<option value='$id'> $nombre </option>";
                                        }
                                        echo '

                   
            </select>

          </div> 


<div class="form-group col-md-2">
    
         Distal
         
                
           <select id="Distal' . $numero . '"   name="Distal' . $numero . '" class="form-control select2" style="width: 100%;" >

   <option value="' . $Distal1 . '" select> ' . $Distal . ' </option> ';


                                        $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                        $nrowl = mysqli_num_rows($queryListA);

                                        while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                            $id = $row_recordset32A['id'];
                                            $nombre = $row_recordset32A['nombre'];
                                            $color = $row_recordset32A['color'];

                                            echo "<option value='$id'> $nombre </option>";
                                        }



                                        echo '   </select>

          </div> 


<div class="form-group col-md-2">
    
         Oclusal
         
                
           <select id="Oclusal' . $numero . '"   name="Oclusal' . $numero . '" class="form-control select2" style="width: 100%;" >

   <option value="' . $Oclusal1 . '"  select> ' . $Oclusal . ' </option>  ';



                                        $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                        $nrowl = mysqli_num_rows($queryListA);

                                        while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                            $id = $row_recordset32A['id'];
                                            $nombre = $row_recordset32A['nombre'];
                                            $color = $row_recordset32A['color'];

                                            echo "<option value='$id'> $nombre </option>";
                                        }


                                        echo   '           
            </select>

          </div> 




 
              <input type="hidden" name="funciones" id="funciones"  value= "' . $numero . '">
             
            
              <input type="hidden" name="pieza' . $numero . '" id="pieza' . $numero . '" value="' . $nombrePieza . '">    
              <input type="hidden" name="cliente_id" id="cliente_id' . $numero . '" value="' . $clienteId . '">
              <input type="hidden" name="usuario_id" id="usuario_id' . $numero . '" value="' . $IDconfig . '"> ';


                                        echo '
<div class="form-group col-md-1">
  
<a href="#"  onclick="agregarPieza' . $numero . '();"> <font size="3">  <strong><br> Guardar</strong>  </font> </a>
             </div>
  <div class="form-group col-md-1" id="div-results' . $numero . '"></div>';
                                    } else {
                                        echo '';
                                    }
                                }





                                ?>









                               <!--
<?php
$queryList = mysqli_query($conn3, "SELECT p.nombre FROM piezas_estado e, piezas p where e.pieza <> p.nombre group by nombre ");



$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32A = mysqli_fetch_array($queryList)) {

    $nombre = $row_recordset32A['nombre'];

    echo "<option value='$nombre'> $nombre </option>";
} ?>

-->


                               <!--
<?php
$queryList = mysqli_query($conn3, "SELECT * FROM piezas_estado");



$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32A = mysqli_fetch_array($queryList)) {

    $pieza1 = $row_recordset32A['pieza'];



    $queryLista = mysqli_query($conn3, "SELECT * FROM piezas where nombre <> '$pieza1' group by nombre ");



    $nrowl = mysqli_num_rows($queryLista);
    while ($row_recordset32 = mysqli_fetch_array($queryLista)) {

        $nombre = $row_recordset32['nombre'];


        echo "<option value='$nombre'> $nombre </option>";
    }
}
?>

                -->

                               </select>


                           </div>

                           <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $clienteId ?>">





                           <?php if ($idE > 0) {
                                echo '
 <div class="form-group col-md-2">
    
         Vestibular 1
         
                
           <select id="vestibular"   name="vestibular" class="form-control select2" style="width: 100%;" >

   <option value="' . $Vestibular1 . '" select>' . $Vestibular . ' </option> ';


                                $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                $nrowl = mysqli_num_rows($queryListA);

                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $color = $row_recordset32A['color'];

                                    echo "<option value='$id'> $nombre </option>";
                                }



                                echo '    </select>

          </div> 






<div class="form-group col-md-2">
    
         Mesial
         
                
           <select id="Mesial"   name="Mesial" class="form-control select2" style="width: 100%;" >

   <option value="' . $Mesial1 . '" select> ' . $Mesial . ' </option> ';

                                $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                $nrowl = mysqli_num_rows($queryListA);

                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $color = $row_recordset32A['color'];

                                    echo "<option value='$id'> $nombre </option>";
                                }

                                echo '
                   
            </select>

          </div> 



<div class="form-group col-md-2">
    
         Lingual
         
                
           <select id="Lingual"   name="Lingual" class="form-control select2" style="width: 100%;" >

   <option value=" ' . $Lingual1 . ' " select> ' . $Lingual . ' </option> ';


                                $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                $nrowl = mysqli_num_rows($queryListA);

                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $color = $row_recordset32A['color'];

                                    echo "<option value='$id'> $nombre </option>";
                                }
                                echo '

                   
            </select>

          </div> 


<div class="form-group col-md-2">
    
         Distal
         
                
           <select id="Distal"   name="Distal" class="form-control select2" style="width: 100%;" >

   <option value="' . $Distal1 . '" select> ' . $Distal . ' </option> ';


                                $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                $nrowl = mysqli_num_rows($queryListA);

                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $color = $row_recordset32A['color'];

                                    echo "<option value='$id'> $nombre </option>";
                                }



                                echo '   </select>

          </div> 


<div class="form-group col-md-2">
    
         Oclusal
         
                
           <select id="Oclusal"   name="Oclusal" class="form-control select2" style="width: 100%;" >

   <option value="' . $Oclusal1 . '"  select> ' . $Oclusal . ' </option>  ';



                                $queryListA = mysqli_query($conn3, "SELECT * FROM OdontogramaEstados");


                                $nrowl = mysqli_num_rows($queryListA);

                                while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['nombre'];
                                    $color = $row_recordset32A['color'];

                                    echo "<option value='$id'> $nombre </option>";
                                }


                                echo   '           
            </select>

          </div> ';
                            } else {
                                echo '<div id="div-results"></div>';
                            }




                            ?>

                           <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                           <input type="hidden" name="cliente_id" id="cliente_id" value="<?php echo $clienteId ?>">

                           <input type="hidden" name="id" value="<?php echo $idE ?>">

                   </div>

                   <center>
                       <?php
                        if ($idE > 0) {
                            echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_odontograma"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
                        } else {
                            echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_odontograma"> <h4> <strong>  Guardar  Todo</strong> </h4> </button></center>';
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
                               <th class="text-center"> Mesial </th>
                               <th class="text-center"> lingual </th>
                               <th class="text-center"> Distal </th>
                               <th class="text-center"> Oclusal </th>
                               <th class="text-center"> </th>

                           </tr>
                       </thead>
                       <tbody>
                           <?php

                            $ID = $_SESSION['ID'];

                            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


                            $queryListA = mysqli_query($conn3, "SELECT * FROM piezas_estado where cliente ='$clienteId'");



                            $nrowl = mysqli_num_rows($queryListA);

                            while ($rowMotorizado = mysqli_fetch_array($queryListA)) {
                                $id = $rowMotorizado['id'];
                                $pieza = $rowMotorizado['pieza'];
                                $Vestibular = $rowMotorizado['vestibular'];
                                if ($Vestibular == 0) {
                                    $vesti = ' ';
                                }
                                $Mesial = $rowMotorizado['mesial'];
                                if ($Mesial  == 0) {
                                    $mesi = ' ';
                                }
                                $Lingual = $rowMotorizado['lingual'];
                                if ($Lingual  == 0) {
                                    $lin = ' ';
                                }
                                $Distal = $rowMotorizado['distal'];
                                if ($Distal  == 0) {
                                    $dis = ' ';
                                }
                                $Oclusal = $rowMotorizado['oclusal'];
                                if ($Oclusal == 0) {
                                    $oclu = ' ';
                                }




                                $queryList1 = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Vestibular'");

                                $nrowl = mysqli_num_rows($queryList1);

                                while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {

                                    $vesti = $rowMotorizado1['nombre'];
                                }


                                $queryList2 = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Mesial'");

                                $nrowl = mysqli_num_rows($queryList2);

                                while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {

                                    $mesi = $rowMotorizado2['nombre'];
                                }




                                $queryList3 = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Lingual'");

                                $nrowl = mysqli_num_rows($queryList3);

                                while ($rowMotorizado3 = mysqli_fetch_array($queryList3)) {

                                    $lin = $rowMotorizado3['nombre'];
                                }


                                $queryList4 = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Distal'");

                                $nrowl = mysqli_num_rows($queryList4);

                                while ($rowMotorizado4 = mysqli_fetch_array($queryList4)) {

                                    $dis = $rowMotorizado4['nombre'];
                                }



                                $queryList5 = mysqli_query($conn3, "SELECT * FROM  OdontogramaEstados where id = '$Oclusal'");
                                $nrowl = mysqli_num_rows($queryList5);

                                while ($rowMotorizado5 = mysqli_fetch_array($queryList5)) {

                                    $oclu = $rowMotorizado5['nombre'];
                                }



                                echo '      
                      <tr>
                      <td> ' . $pieza . '</td>
                      <td> ' . $vesti . '</td>
                      <td> ' . $mesi . '</td>
                      <td> ' . $lin . '</td>
                      <td> ' . $dis . '</td>
                      <td> ' . $oclu . '</td>
                     
                      <td>

                      <form method>
                      
                      <font color="#04CC05"> <a href="OdontogramaInicial.php?clienteId=' . $clienteId . '&editar_estado=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';
                            }


                            ?>



                       </tbody>
                       <tfoot>
                           <tr>
                               <th class="text-center">Pieza</th>
                               <th class="text-center">Vestibular </th>
                               <th class="text-center"> Mesial </th>
                               <th class="text-center"> lingual </th>
                               <th class="text-center"> Distal </th>
                               <th class="text-center"> Oclusal </th>


                               <th class="text-center"> </th>
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
       function validar() {
           // estas son las variables que enviamos

           var pieza = $("#pieza").val();
           var cliente_id = $("#cliente_id").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "ajax_odonto_verificar.php",
               data: {
                   pieza: pieza,
                   cliente_id: cliente_id
               },
               success: function(response) {
                   $('#div-results').html(response);

               }
           });
       };


       function agregarPieza1() {
           // estas son las variables que enviamos

           var pieza = $("#pieza1").val();
           var vestibular = $("#vestibular1").val();
           var usuario_id = $("#usuario_id1").val();
           var Mesial = $("#Mesial1").val();
           var cliente_id = $("#cliente_id1").val();
           var Lingual = $("#Lingual1").val();
           var Distal = $("#Distal1").val();
           var Oclusal = $("#Oclusal1").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results1').html(response);

               }
           });
       };

       function agregarPieza2() {
           // estas son las variables que enviamos

           var pieza = $("#pieza2").val();
           var vestibular = $("#vestibular2").val();
           var usuario_id = $("#usuario_id2").val();
           var Mesial = $("#Mesial2").val();
           var cliente_id = $("#cliente_id2").val();
           var Lingual = $("#Lingual2").val();
           var Distal = $("#Distal2").val();
           var Oclusal = $("#Oclusal2").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results2').html(response);

               }
           });
       };


       function agregarPieza3() {
           // estas son las variables que enviamos

           var pieza = $("#pieza3").val();
           var vestibular = $("#vestibular3").val();
           var usuario_id = $("#usuario_id3").val();
           var Mesial = $("#Mesial3").val();
           var cliente_id = $("#cliente_id3").val();
           var Lingual = $("#Lingual3").val();
           var Distal = $("#Distal3").val();
           var Oclusal = $("#Oclusal3").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results3').html(response);

               }
           });
       };



       function agregarPieza4() {
           // estas son las variables que enviamos

           var pieza = $("#pieza4").val();
           var vestibular = $("#vestibular4").val();
           var usuario_id = $("#usuario_id4").val();
           var Mesial = $("#Mesial4").val();
           var cliente_id = $("#cliente_id4").val();
           var Lingual = $("#Lingual4").val();
           var Distal = $("#Distal4").val();
           var Oclusal = $("#Oclusal4").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results4').html(response);

               }
           });
       };



       function agregarPieza5() {
           // estas son las variables que enviamos

           var pieza = $("#pieza5").val();
           var vestibular = $("#vestibular5").val();
           var usuario_id = $("#usuario_id5").val();
           var Mesial = $("#Mesial5").val();
           var cliente_id = $("#cliente_id5").val();
           var Lingual = $("#Lingual5").val();
           var Distal = $("#Distal5").val();
           var Oclusal = $("#Oclusal5").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results5').html(response);

               }
           });
       };

       function agregarPieza6() {
           // estas son las variables que enviamos

           var pieza = $("#pieza6").val();
           var vestibular = $("#vestibular6").val();
           var usuario_id = $("#usuario_id6").val();
           var Mesial = $("#Mesial6").val();
           var cliente_id = $("#cliente_id6").val();
           var Lingual = $("#Lingual6").val();
           var Distal = $("#Distal6").val();
           var Oclusal = $("#Oclusal6").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results6').html(response);

               }
           });
       };

       function agregarPieza7() {
           // estas son las variables que enviamos

           var pieza = $("#pieza7").val();
           var vestibular = $("#vestibular7").val();
           var usuario_id = $("#usuario_id7").val();
           var Mesial = $("#Mesial7").val();
           var cliente_id = $("#cliente_id7").val();
           var Lingual = $("#Lingual7").val();
           var Distal = $("#Distal7").val();
           var Oclusal = $("#Oclusal7").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results7').html(response);

               }
           });
       };

       function agregarPieza8() {
           // estas son las variables que enviamos

           var pieza = $("#pieza8").val();
           var vestibular = $("#vestibular8").val();
           var usuario_id = $("#usuario_id8").val();
           var Mesial = $("#Mesial8").val();
           var cliente_id = $("#cliente_id8").val();
           var Lingual = $("#Lingual8").val();
           var Distal = $("#Distal8").val();
           var Oclusal = $("#Oclusal8").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results8').html(response);

               }
           });
       };

       function agregarPieza9() {
           // estas son las variables que enviamos

           var pieza = $("#pieza9").val();
           var vestibular = $("#vestibular9").val();
           var usuario_id = $("#usuario_id9").val();
           var Mesial = $("#Mesial9").val();
           var cliente_id = $("#cliente_id9").val();
           var Lingual = $("#Lingual9").val();
           var Distal = $("#Distal9").val();
           var Oclusal = $("#Oclusal9").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results9').html(response);

               }
           });
       };



       function agregarPieza10() {
           // estas son las variables que enviamos

           var pieza = $("#pieza10").val();
           var vestibular = $("#vestibular10").val();
           var usuario_id = $("#usuario_id10").val();
           var Mesial = $("#Mesial10").val();
           var cliente_id = $("#cliente_id10").val();
           var Lingual = $("#Lingual10").val();
           var Distal = $("#Distal10").val();
           var Oclusal = $("#Oclusal10").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results10').html(response);

               }
           });
       };



       function agregarPieza11() {
           // estas son las variables que enviamos

           var pieza = $("#pieza11").val();
           var vestibular = $("#vestibular11").val();
           var usuario_id = $("#usuario_id11").val();
           var Mesial = $("#Mesial11").val();
           var cliente_id = $("#cliente_id11").val();
           var Lingual = $("#Lingual11").val();
           var Distal = $("#Distal11").val();
           var Oclusal = $("#Oclusal11").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results11').html(response);

               }
           });
       };

       function agregarPieza12() {
           // estas son las variables que enviamos

           var pieza = $("#pieza12").val();
           var vestibular = $("#vestibular12").val();
           var usuario_id = $("#usuario_id12").val();
           var Mesial = $("#Mesial12").val();
           var cliente_id = $("#cliente_id12").val();
           var Lingual = $("#Lingual12").val();
           var Distal = $("#Distal12").val();
           var Oclusal = $("#Oclusal12").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results12').html(response);

               }
           });
       };

       function agregarPieza13() {
           // estas son las variables que enviamos

           var pieza = $("#pieza13").val();
           var vestibular = $("#vestibular13").val();
           var usuario_id = $("#usuario_id13").val();
           var Mesial = $("#Mesial13").val();
           var cliente_id = $("#cliente_id13").val();
           var Lingual = $("#Lingual13").val();
           var Distal = $("#Distal13").val();
           var Oclusal = $("#Oclusal13").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results13').html(response);

               }
           });
       };




       function agregarPieza14() {
           // estas son las variables que enviamos

           var pieza = $("#pieza14").val();
           var vestibular = $("#vestibular14").val();
           var usuario_id = $("#usuario_id14").val();
           var Mesial = $("#Mesial14").val();
           var cliente_id = $("#cliente_id14").val();
           var Lingual = $("#Lingual14").val();
           var Distal = $("#Distal14").val();
           var Oclusal = $("#Oclusal14").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results14').html(response);

               }
           });
       };

       function agregarPieza15() {
           // estas son las variables que enviamos

           var pieza = $("#pieza15").val();
           var vestibular = $("#vestibular15").val();
           var usuario_id = $("#usuario_id15").val();
           var Mesial = $("#Mesial15").val();
           var cliente_id = $("#cliente_id15").val();
           var Lingual = $("#Lingual15").val();
           var Distal = $("#Distal15").val();
           var Oclusal = $("#Oclusal15").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results15').html(response);

               }
           });
       };


       function agregarPieza16() {
           // estas son las variables que enviamos

           var pieza = $("#pieza16").val();
           var vestibular = $("#vestibular16").val();
           var usuario_id = $("#usuario_id16").val();
           var Mesial = $("#Mesial16").val();
           var cliente_id = $("#cliente_id16").val();
           var Lingual = $("#Lingual16").val();
           var Distal = $("#Distal16").val();
           var Oclusal = $("#Oclusal16").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results16').html(response);

               }
           });
       };


       function agregarPieza17() {
           // estas son las variables que enviamos

           var pieza = $("#pieza17").val();
           var vestibular = $("#vestibular17").val();
           var usuario_id = $("#usuario_id17").val();
           var Mesial = $("#Mesial17").val();
           var cliente_id = $("#cliente_id17").val();
           var Lingual = $("#Lingual17").val();
           var Distal = $("#Distal17").val();
           var Oclusal = $("#Oclusal17").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results17').html(response);

               }
           });
       };


       function agregarPieza18() {
           // estas son las variables que enviamos

           var pieza = $("#pieza18").val();
           var vestibular = $("#vestibular18").val();
           var usuario_id = $("#usuario_id18").val();
           var Mesial = $("#Mesial18").val();
           var cliente_id = $("#cliente_id18").val();
           var Lingual = $("#Lingual18").val();
           var Distal = $("#Distal18").val();
           var Oclusal = $("#Oclusal18").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results18').html(response);

               }
           });
       };


       function agregarPieza19() {
           // estas son las variables que enviamos

           var pieza = $("#pieza19").val();
           var vestibular = $("#vestibular19").val();
           var usuario_id = $("#usuario_id19").val();
           var Mesial = $("#Mesial19").val();
           var cliente_id = $("#cliente_id19").val();
           var Lingual = $("#Lingual19").val();
           var Distal = $("#Distal19").val();
           var Oclusal = $("#Oclusal19").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results19').html(response);

               }
           });
       };



       function agregarPieza20() {
           // estas son las variables que enviamos

           var pieza = $("#pieza20").val();
           var vestibular = $("#vestibular20").val();
           var usuario_id = $("#usuario_id20").val();
           var Mesial = $("#Mesial20").val();
           var cliente_id = $("#cliente_id20").val();
           var Lingual = $("#Lingual20").val();
           var Distal = $("#Distal20").val();
           var Oclusal = $("#Oclusal20").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results20').html(response);

               }
           });
       };





       function agregarPieza21() {
           // estas son las variables que enviamos

           var pieza = $("#pieza21").val();
           var vestibular = $("#vestibular21").val();
           var usuario_id = $("#usuario_id21").val();
           var Mesial = $("#Mesial21").val();
           var cliente_id = $("#cliente_id21").val();
           var Lingual = $("#Lingual21").val();
           var Distal = $("#Distal21").val();
           var Oclusal = $("#Oclusal21").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results21').html(response);

               }
           });
       };






       function agregarPieza22() {
           // estas son las variables que enviamos

           var pieza = $("#pieza22").val();
           var vestibular = $("#vestibular22").val();
           var usuario_id = $("#usuario_id22").val();
           var Mesial = $("#Mesial22").val();
           var cliente_id = $("#cliente_id22").val();
           var Lingual = $("#Lingual22").val();
           var Distal = $("#Distal22").val();
           var Oclusal = $("#Oclusal22").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results22').html(response);

               }
           });
       };

       function agregarPieza23() {
           // estas son las variables que enviamos

           var pieza = $("#pieza23").val();
           var vestibular = $("#vestibular23").val();
           var usuario_id = $("#usuario_id23").val();
           var Mesial = $("#Mesial23").val();
           var cliente_id = $("#cliente_id23").val();
           var Lingual = $("#Lingual23").val();
           var Distal = $("#Distal23").val();
           var Oclusal = $("#Oclusal23").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results23').html(response);

               }
           });
       };





       function agregarPieza24() {
           // estas son las variables que enviamos

           var pieza = $("#pieza24").val();
           var vestibular = $("#vestibular24").val();
           var usuario_id = $("#usuario_id24").val();
           var Mesial = $("#Mesial24").val();
           var cliente_id = $("#cliente_id24").val();
           var Lingual = $("#Lingual24").val();
           var Distal = $("#Distal24").val();
           var Oclusal = $("#Oclusal24").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results24').html(response);

               }
           });
       };


       function agregarPieza25() {
           // estas son las variables que enviamos

           var pieza = $("#pieza25").val();
           var vestibular = $("#vestibular25").val();
           var usuario_id = $("#usuario_id25").val();
           var Mesial = $("#Mesial25").val();
           var cliente_id = $("#cliente_id25").val();
           var Lingual = $("#Lingual25").val();
           var Distal = $("#Distal25").val();
           var Oclusal = $("#Oclusal25").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results25').html(response);

               }
           });
       };



       function agregarPieza26() {
           // estas son las variables que enviamos

           var pieza = $("#pieza26").val();
           var vestibular = $("#vestibular26").val();
           var usuario_id = $("#usuario_id26").val();
           var Mesial = $("#Mesial26").val();
           var cliente_id = $("#cliente_id26").val();
           var Lingual = $("#Lingual26").val();
           var Distal = $("#Distal26").val();
           var Oclusal = $("#Oclusal26").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results26').html(response);

               }
           });
       };



       function agregarPieza27() {
           // estas son las variables que enviamos

           var pieza = $("#pieza27").val();
           var vestibular = $("#vestibular27").val();
           var usuario_id = $("#usuario_id27").val();
           var Mesial = $("#Mesial27").val();
           var cliente_id = $("#cliente_id27").val();
           var Lingual = $("#Lingual27").val();
           var Distal = $("#Distal27").val();
           var Oclusal = $("#Oclusal27").val();
           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results27').html(response);

               }
           });
       };


       function agregarPieza28() {
           // estas son las variables que enviamos

           var pieza = $("#pieza28").val();
           var vestibular = $("#vestibular28").val();
           var usuario_id = $("#usuario_id28").val();
           var Mesial = $("#Mesial28").val();
           var cliente_id = $("#cliente_id28").val();
           var Lingual = $("#Lingual28").val();
           var Distal = $("#Distal28").val();
           var Oclusal = $("#Oclusal28").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results28').html(response);

               }
           });
       };

       function agregarPieza29() {
           // estas son las variables que enviamos

           var pieza = $("#pieza29").val();
           var vestibular = $("#vestibular29").val();
           var usuario_id = $("#usuario_id29").val();
           var Mesial = $("#Mesial29").val();
           var cliente_id = $("#cliente_id29").val();
           var Lingual = $("#Lingual29").val();
           var Distal = $("#Distal29").val();
           var Oclusal = $("#Oclusal29").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results29').html(response);

               }
           });
       };



       function agregarPieza30() {
           // estas son las variables que enviamos

           var pieza = $("#pieza30").val();
           var vestibular = $("#vestibular30").val();
           var usuario_id = $("#usuario_id30").val();
           var Mesial = $("#Mesial30").val();
           var cliente_id = $("#cliente_id30").val();
           var Lingual = $("#Lingual30").val();
           var Distal = $("#Distal30").val();
           var Oclusal = $("#Oclusal30").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results30').html(response);

               }
           });
       };


       function agregarPieza31() {
           // estas son las variables que enviamos

           var pieza = $("#pieza31").val();
           var vestibular = $("#vestibular31").val();
           var usuario_id = $("#usuario_id31").val();
           var Mesial = $("#Mesial31").val();
           var cliente_id = $("#cliente_id31").val();
           var Lingual = $("#Lingual31").val();
           var Distal = $("#Distal31").val();
           var Oclusal = $("#Oclusal31").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results31').html(response);

               }
           });
       };

       function agregarPieza32() {
           // estas son las variables que enviamos

           var pieza = $("#pieza32").val();
           var vestibular = $("#vestibular32").val();
           var usuario_id = $("#usuario_id32").val();
           var Mesial = $("#Mesial32").val();
           var cliente_id = $("#cliente_id32").val();
           var Lingual = $("#Lingual32").val();
           var Distal = $("#Distal32").val();
           var Oclusal = $("#Oclusal32").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results32').html(response);

               }
           });
       };

       function agregarPieza33() {
           // estas son las variables que enviamos

           var pieza = $("#pieza33").val();
           var vestibular = $("#vestibular33").val();
           var usuario_id = $("#usuario_id33").val();
           var Mesial = $("#Mesial33").val();
           var cliente_id = $("#cliente_id33").val();
           var Lingual = $("#Lingual33").val();
           var Distal = $("#Distal33").val();
           var Oclusal = $("#Oclusal33").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results33').html(response);

               }
           });
       };

       function agregarPieza34() {
           // estas son las variables que enviamos

           var pieza = $("#pieza34").val();
           var vestibular = $("#vestibular34").val();
           var usuario_id = $("#usuario_id34").val();
           var Mesial = $("#Mesial34").val();
           var cliente_id = $("#cliente_id34").val();
           var Lingual = $("#Lingual34").val();
           var Distal = $("#Distal34").val();
           var Oclusal = $("#Oclusal34").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results34').html(response);

               }
           });
       };

       function agregarPieza35() {
           // estas son las variables que enviamos

           var pieza = $("#pieza35").val();
           var vestibular = $("#vestibular35").val();
           var usuario_id = $("#usuario_id35").val();
           var Mesial = $("#Mesial35").val();
           var cliente_id = $("#cliente_id35").val();
           var Lingual = $("#Lingual35").val();
           var Distal = $("#Distal35").val();
           var Oclusal = $("#Oclusal35").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results35').html(response);

               }
           });
       };

       function agregarPieza36() {
           // estas son las variables que enviamos

           var pieza = $("#pieza36").val();
           var vestibular = $("#vestibular36").val();
           var usuario_id = $("#usuario_id36").val();
           var Mesial = $("#Mesial36").val();
           var cliente_id = $("#cliente_id36").val();
           var Lingual = $("#Lingual36").val();
           var Distal = $("#Distal36").val();
           var Oclusal = $("#Oclusal36").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results36').html(response);

               }
           });
       };

       function agregarPieza37() {
           // estas son las variables que enviamos

           var pieza = $("#pieza37").val();
           var vestibular = $("#vestibular37").val();
           var usuario_id = $("#usuario_id37").val();
           var Mesial = $("#Mesial37").val();
           var cliente_id = $("#cliente_id37").val();
           var Lingual = $("#Lingual37").val();
           var Distal = $("#Distal37").val();
           var Oclusal = $("#Oclusal37").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results37').html(response);

               }
           });
       };

       function agregarPieza38() {
           // estas son las variables que enviamos

           var pieza = $("#pieza38").val();
           var vestibular = $("#vestibular38").val();
           var usuario_id = $("#usuario_id38").val();
           var Mesial = $("#Mesial38").val();
           var cliente_id = $("#cliente_id38").val();
           var Lingual = $("#Lingual38").val();
           var Distal = $("#Distal38").val();
           var Oclusal = $("#Oclusal38").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results38').html(response);

               }
           });
       };

       function agregarPieza39() {
           // estas son las variables que enviamos

           var pieza = $("#pieza39").val();
           var vestibular = $("#vestibular39").val();
           var usuario_id = $("#usuario_id39").val();
           var Mesial = $("#Mesial39").val();
           var cliente_id = $("#cliente_id39").val();
           var Lingual = $("#Lingual39").val();
           var Distal = $("#Distal39").val();
           var Oclusal = $("#Oclusal39").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results39').html(response);

               }
           });
       };


       function agregarPieza40() {
           // estas son las variables que enviamos

           var pieza = $("#pieza40").val();
           var vestibular = $("#vestibular40").val();
           var usuario_id = $("#usuario_id40").val();
           var Mesial = $("#Mesial40").val();
           var cliente_id = $("#cliente_id40").val();
           var Lingual = $("#Lingual40").val();
           var Distal = $("#Distal40").val();
           var Oclusal = $("#Oclusal40").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results40').html(response);

               }
           });
       };

       function agregarPieza41() {
           // estas son las variables que enviamos

           var pieza = $("#pieza41").val();
           var vestibular = $("#vestibular41").val();
           var usuario_id = $("#usuario_id41").val();
           var Mesial = $("#Mesial41").val();
           var cliente_id = $("#cliente_id41").val();
           var Lingual = $("#Lingual41").val();
           var Distal = $("#Distal41").val();
           var Oclusal = $("#Oclusal41").val();
           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results41').html(response);

               }
           });
       };

       function agregarPieza42() {
           // estas son las variables que enviamos

           var pieza = $("#pieza42").val();
           var vestibular = $("#vestibular42").val();
           var usuario_id = $("#usuario_id42").val();
           var Mesial = $("#Mesial42").val();
           var cliente_id = $("#cliente_id42").val();
           var Lingual = $("#Lingual42").val();
           var Distal = $("#Distal42").val();
           var Oclusal = $("#Oclusal42").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results42').html(response);

               }
           });
       };

       function agregarPieza43() {
           // estas son las variables que enviamos

           var pieza = $("#pieza43").val();
           var vestibular = $("#vestibular43").val();
           var usuario_id = $("#usuario_id43").val();
           var Mesial = $("#Mesial43").val();
           var cliente_id = $("#cliente_id43").val();
           var Lingual = $("#Lingual43").val();
           var Distal = $("#Distal43").val();
           var Oclusal = $("#Oclusal43").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results43').html(response);

               }
           });
       };

       function agregarPieza44() {
           // estas son las variables que enviamos

           var pieza = $("#pieza44").val();
           var vestibular = $("#vestibular44").val();
           var usuario_id = $("#usuario_id44").val();
           var Mesial = $("#Mesial44").val();
           var cliente_id = $("#cliente_id44").val();
           var Lingual = $("#Lingual44").val();
           var Distal = $("#Distal44").val();
           var Oclusal = $("#Oclusal44").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results44').html(response);

               }
           });
       };

       function agregarPieza45() {
           // estas son las variables que enviamos

           var pieza = $("#pieza45").val();
           var vestibular = $("#vestibular45").val();
           var usuario_id = $("#usuario_id45").val();
           var Mesial = $("#Mesial45").val();
           var cliente_id = $("#cliente_id45").val();
           var Lingual = $("#Lingual45").val();
           var Distal = $("#Distal45").val();
           var Oclusal = $("#Oclusal45").val();
           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results45').html(response);

               }
           });
       };

       function agregarPieza46() {
           // estas son las variables que enviamos

           var pieza = $("#pieza46").val();
           var vestibular = $("#vestibular46").val();
           var usuario_id = $("#usuario_id46").val();
           var Mesial = $("#Mesial46").val();
           var cliente_id = $("#cliente_id46").val();
           var Lingual = $("#Lingual46").val();
           var Distal = $("#Distal46").val();
           var Oclusal = $("#Oclusal46").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results46').html(response);

               }
           });

       };

       function agregarPieza47() {
           // estas son las variables que enviamos

           var pieza = $("#pieza47").val();
           var vestibular = $("#vestibular47").val();
           var usuario_id = $("#usuario_id47").val();
           var Mesial = $("#Mesial47").val();
           var cliente_id = $("#cliente_id47").val();
           var Lingual = $("#Lingual47").val();
           var Distal = $("#Distal47").val();
           var Oclusal = $("#Oclusal47").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results47').html(response);

               }
           });
       };

       function agregarPieza48() {
           // estas son las variables que enviamos

           var pieza = $("#pieza48").val();
           var vestibular = $("#vestibular48").val();
           var usuario_id = $("#usuario_id48").val();
           var Mesial = $("#Mesial48").val();
           var cliente_id = $("#cliente_id48").val();
           var Lingual = $("#Lingual48").val();
           var Distal = $("#Distal48").val();
           var Oclusal = $("#Oclusal48").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results48').html(response);

               }
           });
       };

       function agregarPieza49() {
           // estas son las variables que enviamos

           var pieza = $("#pieza49").val();
           var vestibular = $("#vestibular49").val();
           var usuario_id = $("#usuario_id49").val();
           var Mesial = $("#Mesial49").val();
           var cliente_id = $("#cliente_id49").val();
           var Lingual = $("#Lingual49").val();
           var Distal = $("#Distal49").val();
           var Oclusal = $("#Oclusal49").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results49').html(response);

               }
           });
       };

       function agregarPieza50() {
           // estas son las variables que enviamos

           var pieza = $("#pieza50").val();
           var vestibular = $("#vestibular50").val();
           var usuario_id = $("#usuario_id50").val();
           var Mesial = $("#Mesial50").val();
           var cliente_id = $("#cliente_id50").val();
           var Lingual = $("#Lingual50").val();
           var Distal = $("#Distal50").val();
           var Oclusal = $("#Oclusal50").val();

           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results50').html(response);

               }
           });
       };


       function agregarPieza51() {
           // estas son las variables que enviamos

           var pieza = $("#pieza51").val();
           var vestibular = $("#vestibular51").val();
           var usuario_id = $("#usuario_id51").val();
           var Mesial = $("#Mesial51").val();
           var cliente_id = $("#cliente_id51").val();
           var Lingual = $("#Lingual51").val();
           var Distal = $("#Distal51").val();
           var Oclusal = $("#Oclusal51").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results51').html(response);

               }
           });
       };

       function agregarPieza52() {
           // estas son las variables que enviamos

           var pieza = $("#pieza52").val();
           var vestibular = $("#vestibular52").val();
           var usuario_id = $("#usuario_id52").val();
           var Mesial = $("#Mesial52").val();
           var cliente_id = $("#cliente_id52").val();
           var Lingual = $("#Lingual52").val();
           var Distal = $("#Distal52").val();
           var Oclusal = $("#Oclusal52").val();


           // aqui enviamos el mensaje por medio de un arreglo     

           $.ajax({
               type: "POST",
               url: "guardarPieza.php",
               data: {
                   pieza: pieza,
                   vestibular: vestibular,
                   Mesial: Mesial,
                   Lingual: Lingual,
                   Distal: Distal,
                   Oclusal: Oclusal,
                   cliente_id: cliente_id,
                   usuario_id: usuario_id
               },
               success: function(response) {
                   $('#div-results52').html(response);

               }
           });
       };
   </script>