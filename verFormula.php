<?php
    include 'header.php';
    include 'menu.php';

    $ID_formula = $_GET['ID'];
   


    $ID = $_SESSION['ID'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Fórmulas médicas    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Fórmulas médicas   </a></li>
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

               



                  <?php

                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  nombre_formulas where ID= '$ID_formula' ");
                    

                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                         
                                          $descripcion      = $row_recordset32['nombre'];
                                    
  
                 

 }


 ?>

 
               
    
<div class="form-group col-md-12">
                              <div align="left"><H4><B><?php echo $descripcion?></B> </H4></div>


</div>                      







<div class="form-group col-md-12">
                              <div align="left">Agregar Medicamentos a la Fórmula</div>

<select id="formula" name="formula" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione ...</option>
<?php

                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  pos");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID      = $row_recordset32['id'];
                                         
                                          $descripcion      = $row_recordset32['descripcion'];
                                    
  
                echo "<option value='$descripcion'> $descripcion </option>";

 }


 ?>
</select>


                             <!--   <input type="text" class="form-control input-lg" id="formula" name="formula" placeholder="Escriba el nombre del medicamento" > -->

</div>





<div class="form-group col-md-12">
    
<input type="text" class="form-control input-lg" id="indicacion" name="indicacion" placeholder="Escriba la indicación del medicamento" > </div>





              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="ID_formula" id="ID_formula"  value="<?php echo $ID_formula?>">
             
            
             <div class="form-group col-md-12">
                
                   
<a href="#"  onclick="agergarItem();"> <font size="4">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar Medicamento e Indicación a la Fórmula</strong>  </font> </a>



              </div>


<script type="text/javascript">
    $(document).ready(function() 
    {
      $('#limpiar').click(function() {
        $('.formula').val('');
        $('.indicacion').val('');
       
         
      });
    });
    </script>

            <br>

            <div class="form-group col-md-12" id="div-results"></div>  
                <br>
                <br>

<form action="guardarIndicacion.php" method="POST" name="formularioActualizarcliente">

<div class="form-group col-md-12">
<hr>
                              <textarea  id="indicaciones" name="indicaciones"  class="textarea" placeholder="Indicaciones generales de la Receta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>

  <input type="hidden" name="ID_formula" id="ID_formula"  value="<?php echo $ID_formula?>">

 <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h5> <strong>  Guardar indicaciones generales</strong> </h5> </button></center> 



                          </form>



         <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Medicamentos</th>
                  <th>Indicaciones</th>
                  <th></th>
                 
                 
               
                </tr>
                </thead>
                <tbody>
                  <?php

                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  formula_medicamentos where ID_formula =$ID_formula ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID_FM     = $row_recordset32['ID'];
                                          $indicacion     = $row_recordset32['indicacion'];
                                         
                                          $descripcion      = $row_recordset32['nombre'];
                                    
  
                  echo '     <tr>
                  <td>'.$descripcion.' </td>
                  <td>'.$indicacion.' </td>
                  <td><a  title="Eliminar" target="_blank"><i class="fa fa-trash" onclick="confirmation('.$ID_FM.')" ></i> </a> </td>
                 
           
                </tr>';

 }


 ?>

 
                </tbody>
                <tfoot>
                <tr>
               
                  <th></th>
                  <th></th>
                  <th></th>
                 
                
                </tr>
                </tfoot>
              </table>
                          
             </div>              
 
            <div class="form-group col-md-12"> 



 <?php

                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  nombre_formulas where ID =$ID_formula ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                         
                                          $descripcion      = $row_recordset32['indicacion'];
                                    
  
                  echo '<b>INDICACIONES GENERALES</b> <BR>' .$descripcion;

 }


 ?>







            </div>


    

                          <div align="center">
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-12">
                              <br>
                              <br>
                     

                            </div>
                          </div>

                          <input type="hidden"  name="tipo_cliente"   valur="1">
                        </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

     

  </section>

</div>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>

<script type="text/javascript">




 







 
    function agergarItem(){
        // estas son las variables que enviamos
        var formula = $("#formula").val();
        var id_usuario = $("#id_usuario").val();
        var ID_formula = $("#ID_formula").val();
        var indicacion = $("#indicacion").val();


 
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarMedicamentosformula.php",
            data: {formula :formula , id_usuario:id_usuario,ID_formula:ID_formula, indicacion:indicacion},
            success: function(response) {

                $('#formula').val('');
                $('#indicacion').val('');
                
                $('#div-results').html(response);
             
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };


 
     /* document.getElementById("detalleRecetario").reset(); */

function eliminarItem1()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper1").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

      function eliminarItem3()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper3").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

       function eliminarItem4()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper4").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

        
       function eliminarItem5()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper5").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

         
        
       function eliminarItem6()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper6").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };            

    function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem;   
           

    function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem;   
 


 

 function verPos(){
 
        var clientepos = $("#clientepos").val();
        var codigoProd = $("#codigoProd").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Poslista.php",
            data: {clientepos:clientepos, codigoProd:codigoProd},
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };












    function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);

            }
        });
    };

    function calcularimc()
    {



        m1 = document.getElementById("peso").value;
        m2 = document.getElementById("altura").value;

        r = m1/((m2/100)*(m2/100));



        document.getElementById("imc").value = r.toFixed(2);


        if (r.toFixed(2) < 16)

            ComposicionCorporal = 'Infrapeso: Delgadez Severa';
        else if
        (r.toFixed(2) > 16 &  r.toFixed(2) < 16.99)

            ComposicionCorporal = 'Infrapeso: Delgadez moderada';
        else if
        (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

            ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
        else if
        (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

            ComposicionCorporal = 'Peso Normal';

        else if
        (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

            ComposicionCorporal = 'Sobrepeso';

        else if
        (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

            ComposicionCorporal = 'Obeso: Tipo I';

        else if
        (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

            ComposicionCorporal = 'Obeso: Tipo II';

        else if
        (r.toFixed(2) > 40.00)

            ComposicionCorporal = 'Obeso: Tipo III';




        document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
    }

  function calcularprematuriedad(){
    try {
      var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
      var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
      document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
    } catch (e) {
      }
  }
  function calcularEdadCorregida(){
    try {
      var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
      var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
      document.formularioActualizarcliente.edadCorregida.value = b - a;
    } catch (e) {
      }
  }


function verlista(){
 
        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results1').html(response);
                 
            }
        });
    };

      


   function confirmation(valor) 
     {
      if(confirm("Desea Eliminar Medicamento de la Fórmula?"))
      {
       return window.location="masterEliminar.php?&tabla=formula_medicamentos&Columna=ID&origen=verFormula.php?ID=<?php echo $ID_formula?>&filtro="+valor;

      }
     else
     {
       return false;
     }
   }






</script>
 

