<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
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

               
                    <form action="guardarHistoriaClinica.php" method="POST" name="formularioActualizarcliente">

<div class="form-group col-md-12">
                              <div align="left">Nueva Fórmula</div>


                                <input type="text" class="form-control input-lg" id="formula" name="formula" placeholder="Escriba el nombre de la fórmula (Paquete)" >

</div>
              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
             
            
             <div class="form-group col-md-2">
                  <br>
                   
<a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>



              </div>
<script type="text/javascript">
    $(document).ready(function() 
    {
      $('#limpiar').click(function() {
        $('.formula').val('');
       
         
      });
    });
    </script>

            <br>

            <div class="form-group col-md-12" id="div-results"></div>  
                <br>
                <br>


      <div class="box-body">

                            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 
                  <th>Fórmulas</th>
                 
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                                                                  
                        $queryList=mysqli_query($conn3,"SELECT * FROM  nombre_formulas ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID      = $row_recordset32['ID'];
                                         
                                          $descripcion      = $row_recordset32['nombre'];
                                    
  
                  echo '     <tr>
                  <td>'.$descripcion.' </td>
                 
                  
                  <td>    
                      
                   <a href="verFormula.php?ID='.$ID.'" title="Ver/Editar Fórmula"><i class="fa fa-eye"></i> </a> |  
                  
 
                 <a  title="Eliminar" target="_blank"><i class="fa fa-trash" onclick="confirmation('.$ID.')" ></i> </a> </td>
           
                </tr>';

 }


 ?>

 
                </tbody>
                <tfoot>
                <tr>
               
                  <th></th>
                 
                  <th>   </th>
                </tr>
                </tfoot>
              </table>
                          
             </div>
                                            
 
                
                        


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

 
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarFormula.php",
            data: {formula :formula , id_usuario:id_usuario},
            success: function(response) {

                $('#formula').val('');
                
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
      if(confirm("Desea Eliminar Fórmula?"))
      {
       return window.location="masterEliminar.php?&tabla=nombre_formulas&Columna=ID&origen=formulas.php&filtro="+valor;

      }
     else
     {
       return false;
     }
   }

 
  





</script>
 

