  <?php 
   include 'header.php';
   include 'menu.php';



 

    $clienteId = $_GET['clienteId'];
    $usuario= $_GET['usuario'];


 
$dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
$DiaSemana = $dias[date('N', strtotime($fecha))];



 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    ?>

  <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="#">Agregar cita</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Agregar cita</h4>
          <br>

<div class="col-xs-12">

<form action="OportunidadCitas.php" method="POST"> 
  <div class="col-xs-6">
<h4><b>Seleccione una fecha probable de cita </b></h4>
<input type="hidden" class="form-control input-lg" name="clienteId" id="clienteId" value="<?php echo $clienteId?>" required>
<input type="hidden" class="form-control input-lg" name="usuario" id="usuario" value="<?php echo $usuario?>" required>
    
     <input type="date"   class="form-control input-lg" name="fecha" id="fecha"   required>
  

  </div> 


<div class="col-xs-6">
    <h4><b>Grupos o categorias de atenciones médicas</b></h4> <font color = 'red'><h5>(Si no selecciona ninguna se mostrará la agenda de todos los especialistas) </h5></font>



                 <select name="grupo" id="grupo"  class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione grupo de Atención</option> ';  
<?php
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

   $queryListC=mysqli_query($conn3,"SELECT * FROM  gruposAtencion ");

            $nrowlC=mysqli_num_rows($queryListC);
            while($rowC=mysqli_fetch_array($queryListC))
            {

            $id   =$rowC['ID'];
            $nombre   =$rowC['nombre'];
           
 echo "<option value='$id'> $nombre </option>";
          } ?> </select> 

</div>

 <!-- <div class="col-xs-3">
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div>  -->

     <div class="form-group col-md-2">
                  <br>
                  <br>

<a href="#"  onclick="cargarFecha();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>   Consultar </strong>  </font> </a>
               </div>








                <br>

                <div class="form-group col-md-12" id="div-results"></div>
</form> 


        </div>

   </div>   </div>   </div>   </div>
















 <script type="text/javascript">

  function cargarFecha(){
        // estas son las variables que enviamos
       

        var idcliente = $("#clienteId").val();
        var fechaE= $("#fecha").val();
        var usuario= $("#usuario").val();
        var grupo= $("#grupo").val();
      
          
        $.ajax({
            type: "POST",
            url: "OportunidadCitas.php",
            data: {fechaE:fechaE, idcliente:idcliente,usuario:usuario, grupo:grupo },
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
      document.getElementById("detalleRecetario").reset();
    };












   function agregarCita1(){
// estas son las variables que enviamos

        var fecha = $("#fecha1").val();
        var Hora = $("#Hora1").val();
        var usuario_id = $("#usuario_id1").val();
        var doctor = $("#doctor1").val();
        var clienteId = $("#clienteId1").val();
        var motivo = $("#motivo1").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results1').html(response);
                 
            }
        });
    };

  function agregarCita2(){
// estas son las variables que enviamos

        var fecha = $("#fecha2").val();
        var Hora = $("#Hora2").val();
        var usuario_id = $("#usuario_id2").val();
        var doctor = $("#doctor2").val();
        var clienteId = $("#clienteId2").val();
        var motivo = $("#motivo2").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results2').html(response);
                 
            }
        });
    };


 function agregarCita3(){
// estas son las variables que enviamos

        var fecha = $("#fecha3").val();
        var Hora = $("#Hora3").val();
        var usuario_id = $("#usuario_id3").val();
        var doctor = $("#doctor3").val();
        var clienteId = $("#clienteId3").val();
        var motivo = $("#motivo3").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results3').html(response);
                 
            }
        });
    };



 function agregarCita4(){
// estas son las variables que enviamos

        var fecha = $("#fecha4").val();
        var Hora = $("#Hora4").val();
        var usuario_id = $("#usuario_id4").val();
        var doctor = $("#doctor4").val();
        var clienteId = $("#clienteId4").val();
        var motivo = $("#motivo4").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };



 function agregarCita5(){
// estas son las variables que enviamos

        var fecha = $("#fecha5").val();
        var Hora = $("#Hora5").val();
        var usuario_id = $("#usuario_id5").val();
        var doctor = $("#doctor5").val();
        var clienteId = $("#clienteId5").val();
        var motivo = $("#motivo5").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results5').html(response);
                 
            }
        });
    };

 function agregarCita6(){
// estas son las variables que enviamos

        var fecha = $("#fecha6").val();
        var Hora = $("#Hora6").val();
        var usuario_id = $("#usuario_id6").val();
        var doctor = $("#doctor6").val();
        var clienteId = $("#clienteId6").val();
        var motivo = $("#motivo6").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results6').html(response);
                 
            }
        });
    };

     function agregarCita7(){
// estas son las variables que enviamos

        var fecha = $("#fecha7").val();
        var Hora = $("#Hora7").val();
        var usuario_id = $("#usuario_id7").val();
        var doctor = $("#doctor7").val();
        var clienteId = $("#clienteId7").val();
        var motivo = $("#motivo7").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results7').html(response);
                 
            }
        });
    };

 function agregarCita8(){
// estas son las variables que enviamos

        var fecha = $("#fecha8").val();
        var Hora = $("#Hora8").val();
        var usuario_id = $("#usuario_id8").val();
        var doctor = $("#doctor8").val();
        var clienteId = $("#clienteId8").val();
        var motivo = $("#motivo8").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results8').html(response);
                 
            }
        });
    };

     function agregarCita9(){
// estas son las variables que enviamos

        var fecha = $("#fecha9").val();
        var Hora = $("#Hora9").val();
        var usuario_id = $("#usuario_id9").val();
        var doctor = $("#doctor9").val();
        var clienteId = $("#clienteId9").val();
        var motivo = $("#motivo9").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results9').html(response);
                 
            }
        });
    };



 function agregarCita10(){
// estas son las variables que enviamos

        var fecha = $("#fecha10").val();
        var Hora = $("#Hora10").val();
        var usuario_id = $("#usuario_id10").val();
        var doctor = $("#doctor10").val();
        var clienteId = $("#clienteId10").val();
        var motivo = $("#motivo10").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results10').html(response);
                 
            }
        });
    };



 function agregarCita11(){
// estas son las variables que enviamos

        var fecha = $("#fecha11").val();
        var Hora = $("#Hora11").val();
        var usuario_id = $("#usuario_id11").val();
        var doctor = $("#doctor11").val();
        var clienteId = $("#clienteId11").val();
        var motivo = $("#motivo11").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results11').html(response);
                 
            }
        });
    };

     function agregarCita12(){
// estas son las variables que enviamos

        var fecha = $("#fecha12").val();
        var Hora = $("#Hora12").val();
        var usuario_id = $("#usuario_id12").val();
        var doctor = $("#doctor12").val();
        var clienteId = $("#clienteId12").val();
        var motivo = $("#motivo12").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results12').html(response);
                 
            }
        });
    };

     function agregarCita13(){
// estas son las variables que enviamos

        var fecha = $("#fecha13").val();
        var Hora = $("#Hora13").val();
        var usuario_id = $("#usuario_id13").val();
        var doctor = $("#doctor13").val();
        var clienteId = $("#clienteId13").val();
        var motivo = $("#motivo13").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results13').html(response);
                 
            }
        });
    };


     function agregarCita13(){
// estas son las variables que enviamos

        var fecha = $("#fecha13").val();
        var Hora = $("#Hora13").val();
        var usuario_id = $("#usuario_id13").val();
        var doctor = $("#doctor13").val();
        var clienteId = $("#clienteId13").val();
        var motivo = $("#motivo13").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results13').html(response);
                 
            }
        });
    };


     function agregarCita14(){
// estas son las variables que enviamos

        var fecha = $("#fecha14").val();
        var Hora = $("#Hora14").val();
        var usuario_id = $("#usuario_id14").val();
        var doctor = $("#doctor14").val();
        var clienteId = $("#clienteId14").val();
        var motivo = $("#motivo14").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results14').html(response);
                 
            }
        });
    };

     function agregarCita15(){
// estas son las variables que enviamos

        var fecha = $("#fecha15").val();
        var Hora = $("#Hora15").val();
        var usuario_id = $("#usuario_id15").val();
        var doctor = $("#doctor15").val();
        var clienteId = $("#clienteId15").val();
        var motivo = $("#motivo15").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results15').html(response);
                 
            }
        });
    };


     function agregarCita16(){
// estas son las variables que enviamos

        var fecha = $("#fecha16").val();
        var Hora = $("#Hora16").val();
        var usuario_id = $("#usuario_id16").val();
        var doctor = $("#doctor16").val();
        var clienteId = $("#clienteId16").val();
        var motivo = $("#motivo16").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results16').html(response);
                 
            }
        });
    };


 function agregarCita17(){
// estas son las variables que enviamos

        var fecha = $("#fecha17").val();
        var Hora = $("#Hora17").val();
        var usuario_id = $("#usuario_id17").val();
        var doctor = $("#doctor17").val();
        var clienteId = $("#clienteId17").val();
        var motivo = $("#motivo17").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results17').html(response);
                 
            }
        });
    };


     function agregarCita18(){
// estas son las variables que enviamos

        var fecha = $("#fecha18").val();
        var Hora = $("#Hora18").val();
        var usuario_id = $("#usuario_id18").val();
        var doctor = $("#doctor18").val();
        var clienteId = $("#clienteId18").val();
        var motivo = $("#motivo18").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results18').html(response);
                 
            }
        });
    };


     function agregarCita19(){
// estas son las variables que enviamos

        var fecha = $("#fecha19").val();
        var Hora = $("#Hora19").val();
        var usuario_id = $("#usuario_id19").val();
        var doctor = $("#doctor19").val();
        var clienteId = $("#clienteId19").val();
        var motivo = $("#motivo19").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results19').html(response);
                 
            }
        });
    };



     function agregarCita20(){
// estas son las variables que enviamos

        var fecha = $("#fecha20").val();
        var Hora = $("#Hora20").val();
        var usuario_id = $("#usuario_id20").val();
        var doctor = $("#doctor20").val();
        var clienteId = $("#clienteId20").val();
        var motivo = $("#motivo20").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results20').html(response);
                 
            }
        });
    };





     function agregarCita21(){
// estas son las variables que enviamos

        var fecha = $("#fecha21").val();
        var Hora = $("#Hora21").val();
        var usuario_id = $("#usuario_id21").val();
        var doctor = $("#doctor21").val();
        var clienteId = $("#clienteId21").val();
        var motivo = $("#motivo21").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results21').html(response);
                 
            }
        });
    };






     function agregarCita22(){
// estas son las variables que enviamos

        var fecha = $("#fecha22").val();
        var Hora = $("#Hora22").val();
        var usuario_id = $("#usuario_id22").val();
        var doctor = $("#doctor22").val();
        var clienteId = $("#clienteId22").val();
        var motivo = $("#motivo22").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results22').html(response);
                 
            }
        });
    };

     function agregarCita23(){
// estas son las variables que enviamos

        var fecha = $("#fecha23").val();
        var Hora = $("#Hora23").val();
        var usuario_id = $("#usuario_id23").val();
        var doctor = $("#doctor23").val();
        var clienteId = $("#clienteId23").val();
        var motivo = $("#motivo23").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results23').html(response);
                 
            }
        });
    };





     function agregarCita24(){
// estas son las variables que enviamos

        var fecha = $("#fecha24").val();
        var Hora = $("#Hora24").val();
        var usuario_id = $("#usuario_id24").val();
        var doctor = $("#doctor24").val();
        var clienteId = $("#clienteId24").val();
        var motivo = $("#motivo24").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results24').html(response);
                 
            }
        });
    };


     function agregarCita25(){
// estas son las variables que enviamos

        var fecha = $("#fecha25").val();
        var Hora = $("#Hora25").val();
        var usuario_id = $("#usuario_id25").val();
        var doctor = $("#doctor25").val();
        var clienteId = $("#clienteId25").val();
        var motivo = $("#motivo25").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results25').html(response);
                 
            }
        });
    };   



 function agregarCita26(){
// estas son las variables que enviamos

        var fecha = $("#fecha26").val();
        var Hora = $("#Hora26").val();
        var usuario_id = $("#usuario_id26").val();
        var doctor = $("#doctor26").val();
        var clienteId = $("#clienteId26").val();
        var motivo = $("#motivo26").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results26').html(response);
                 
            }
        });
    };



 function agregarCita27(){
// estas son las variables que enviamos

        var fecha = $("#fecha27").val();
        var Hora = $("#Hora27").val();
        var usuario_id = $("#usuario_id27").val();
        var doctor = $("#doctor27").val();
        var clienteId = $("#clienteId27").val();
        var motivo = $("#motivo27").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results27').html(response);
                 
            }
        });
    };


     function agregarCita28(){
// estas son las variables que enviamos

        var fecha = $("#fecha28").val();
        var Hora = $("#Hora28").val();
        var usuario_id = $("#usuario_id28").val();
        var doctor = $("#doctor28").val();
        var clienteId = $("#clienteId28").val();
        var motivo = $("#motivo28").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results28').html(response);
                 
            }
        });
    };

     function agregarCita29(){
// estas son las variables que enviamos

        var fecha = $("#fecha29").val();
        var Hora = $("#Hora29").val();
        var usuario_id = $("#usuario_id29").val();
        var doctor = $("#doctor29").val();
        var clienteId = $("#clienteId29").val();
        var motivo = $("#motivo29").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results29').html(response);
                 
            }
        });
    };



     function agregarCita30(){
// estas son las variables que enviamos

        var fecha = $("#fecha30").val();
        var Hora = $("#Hora30").val();
        var usuario_id = $("#usuario_id30").val();
        var doctor = $("#doctor30").val();
        var clienteId = $("#clienteId30").val();
        var motivo = $("#motivo30").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results30').html(response);
                 
            }
        });
    };


     function agregarCita31(){
// estas son las variables que enviamos

        var fecha = $("#fecha31").val();
        var Hora = $("#Hora31").val();
        var usuario_id = $("#usuario_id31").val();
        var doctor = $("#doctor31").val();
        var clienteId = $("#clienteId31").val();
        var motivo = $("#motivo31").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results31').html(response);
                 
            }
        });
    };

     function agregarCita32(){
// estas son las variables que enviamos

        var fecha = $("#fecha32").val();
        var Hora = $("#Hora32").val();
        var usuario_id = $("#usuario_id32").val();
        var doctor = $("#doctor32").val();
        var clienteId = $("#clienteId32").val();
        var motivo = $("#motivo32").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results32').html(response);
                 
            }
        });
    };

     function agregarCita33(){
// estas son las variables que enviamos

        var fecha = $("#fecha33").val();
        var Hora = $("#Hora33").val();
        var usuario_id = $("#usuario_id33").val();
        var doctor = $("#doctor33").val();
        var clienteId = $("#clienteId33").val();
        var motivo = $("#motivo33").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results33').html(response);
                 
            }
        });
    };

     function agregarCita34(){
// estas son las variables que enviamos

        var fecha = $("#fecha34").val();
        var Hora = $("#Hora34").val();
        var usuario_id = $("#usuario_id34").val();
        var doctor = $("#doctor34").val();
        var clienteId = $("#clienteId34").val();
        var motivo = $("#motivo34").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results34').html(response);
                 
            }
        });
    };

     function agregarCita35(){
// estas son las variables que enviamos

        var fecha = $("#fecha35").val();
        var Hora = $("#Hora35").val();
        var usuario_id = $("#usuario_id35").val();
        var doctor = $("#doctor35").val();
        var clienteId = $("#clienteId35").val();
        var motivo = $("#motivo35").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results35').html(response);
                 
            }
        });
    };

     function agregarCita36(){
// estas son las variables que enviamos

        var fecha = $("#fecha36").val();
        var Hora = $("#Hora36").val();
        var usuario_id = $("#usuario_id36").val();
        var doctor = $("#doctor36").val();
        var clienteId = $("#clienteId36").val();
        var motivo = $("#motivo36").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results36').html(response);
                 
            }
        });
    };

     function agregarCita37(){
// estas son las variables que enviamos

        var fecha = $("#fecha37").val();
        var Hora = $("#Hora37").val();
        var usuario_id = $("#usuario_id37").val();
        var doctor = $("#doctor37").val();
        var clienteId = $("#clienteId37").val();
        var motivo = $("#motivo37").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results37').html(response);
                 
            }
        });
    };

     function agregarCita38(){
// estas son las variables que enviamos

        var fecha = $("#fecha38").val();
        var Hora = $("#Hora38").val();
        var usuario_id = $("#usuario_id38").val();
        var doctor = $("#doctor38").val();
        var clienteId = $("#clienteId38").val();
        var motivo = $("#motivo38").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results38').html(response);
                 
            }
        });
    };

     function agregarCita39(){
// estas son las variables que enviamos

        var fecha = $("#fecha39").val();
        var Hora = $("#Hora39").val();
        var usuario_id = $("#usuario_id39").val();
        var doctor = $("#doctor39").val();
        var clienteId = $("#clienteId39").val();
        var motivo = $("#motivo39").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results39').html(response);
                 
            }
        });
    };


     function agregarCita40(){
// estas son las variables que enviamos

        var fecha = $("#fecha40").val();
        var Hora = $("#Hora40").val();
        var usuario_id = $("#usuario_id40").val();
        var doctor = $("#doctor40").val();
        var clienteId = $("#clienteId40").val();
        var motivo = $("#motivo40").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results40').html(response);
                 
            }
        });
    };

     function agregarCita41(){
// estas son las variables que enviamos

        var fecha = $("#fecha41").val();
        var Hora = $("#Hora41").val();
        var usuario_id = $("#usuario_id41").val();
        var doctor = $("#doctor41").val();
        var clienteId = $("#clienteId41").val();
        var motivo = $("#motivo41").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results41').html(response);
                 
            }
        });
    };

     function agregarCita42(){
// estas son las variables que enviamos

        var fecha = $("#fecha42").val();
        var Hora = $("#Hora42").val();
        var usuario_id = $("#usuario_id42").val();
        var doctor = $("#doctor42").val();
        var clienteId = $("#clienteId42").val();
        var motivo = $("#motivo42").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results42').html(response);
                 
            }
        });
    };

     function agregarCita43(){
// estas son las variables que enviamos

        var fecha = $("#fecha43").val();
        var Hora = $("#Hora43").val();
        var usuario_id = $("#usuario_id43").val();
        var doctor = $("#doctor43").val();
        var clienteId = $("#clienteId43").val();
        var motivo = $("#motivo43").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results43').html(response);
                 
            }
        });
    };

     function agregarCita44(){
// estas son las variables que enviamos

        var fecha = $("#fecha44").val();
        var Hora = $("#Hora44").val();
        var usuario_id = $("#usuario_id44").val();
        var doctor = $("#doctor44").val();
        var clienteId = $("#clienteId44").val();
        var motivo = $("#motivo44").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results44').html(response);
                 
            }
        });
    };

     function agregarCita45(){
// estas son las variables que enviamos

        var fecha = $("#fecha45").val();
        var Hora = $("#Hora45").val();
        var usuario_id = $("#usuario_id45").val();
        var doctor = $("#doctor45").val();
        var clienteId = $("#clienteId45").val();
        var motivo = $("#motivo45").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results45').html(response);
                 
            }
        });
    };

     function agregarCita46(){
// estas son las variables que enviamos

        var fecha = $("#fecha46").val();
        var Hora = $("#Hora46").val();
        var usuario_id = $("#usuario_id46").val();
        var doctor = $("#doctor46").val();
        var clienteId = $("#clienteId46").val();
        var motivo = $("#motivo46").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results46').html(response);
                 
            }
        });

          };

         function agregarCita47(){
// estas son las variables que enviamos

        var fecha = $("#fecha47").val();
        var Hora = $("#Hora47").val();
        var usuario_id = $("#usuario_id47").val();
        var doctor = $("#doctor47").val();
        var clienteId = $("#clienteId47").val();
        var motivo = $("#motivo47").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results47').html(response);
                 
            }
        });
    };

     function agregarCita48(){
// estas son las variables que enviamos

        var fecha = $("#fecha48").val();
        var Hora = $("#Hora48").val();
        var usuario_id = $("#usuario_id48").val();
        var doctor = $("#doctor48").val();
        var clienteId = $("#clienteId48").val();
        var motivo = $("#motivo48").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results48').html(response);
                 
            }
        });
    };

     function agregarCita49(){
// estas son las variables que enviamos

        var fecha = $("#fecha49").val();
        var Hora = $("#Hora49").val();
        var usuario_id = $("#usuario_id49").val();
        var doctor = $("#doctor49").val();
        var clienteId = $("#clienteId49").val();
        var motivo = $("#motivo49").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results49').html(response);
                 
            }
        });
    };

     function agregarCita50(){
// estas son las variables que enviamos

        var fecha = $("#fecha50").val();
        var Hora = $("#Hora50").val();
        var usuario_id = $("#usuario_id50").val();
        var doctor = $("#doctor50").val();
        var clienteId = $("#clienteId50").val();
        var motivo = $("#motivo50").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results50').html(response);
                 
            }
        });
    };
  

 function agregarCita51(){
// estas son las variables que enviamos

        var fecha = $("#fecha51").val();
        var Hora = $("#Hora51").val();
        var usuario_id = $("#usuario_id51").val();
        var doctor = $("#doctor51").val();
        var clienteId = $("#clienteId51").val();
        var motivo = $("#motivo51").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results51').html(response);
                 
            }
        });
    };

     function agregarCita52(){
// estas son las variables que enviamos

        var fecha = $("#fecha52").val();
        var Hora = $("#Hora52").val();
        var usuario_id = $("#usuario_id52").val();
        var doctor = $("#doctor52").val();
        var clienteId = $("#clienteId52").val();
        var motivo = $("#motivo52").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results52').html(response);
                 
            }
        });
    };

     function agregarCita53(){
// estas son las variables que enviamos

        var fecha = $("#fecha53").val();
        var Hora = $("#Hora53").val();
        var usuario_id = $("#usuario_id53").val();
        var doctor = $("#doctor53").val();
        var clienteId = $("#clienteId53").val();
        var motivo = $("#motivo53").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results53').html(response);
                 
            }
        });
    };

     function agregarCita54(){
// estas son las variables que enviamos

        var fecha = $("#fecha54").val();
        var Hora = $("#Hora54").val();
        var usuario_id = $("#usuario_id54").val();
        var doctor = $("#doctor54").val();
        var clienteId = $("#clienteId54").val();
        var motivo = $("#motivo54").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results54').html(response);
                 
            }
        });
    };

     function agregarCita55(){
// estas son las variables que enviamos

        var fecha = $("#fecha55").val();
        var Hora = $("#Hora55").val();
        var usuario_id = $("#usuario_id55").val();
        var doctor = $("#doctor55").val();
        var clienteId = $("#clienteId55").val();
        var motivo = $("#motivo55").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results55').html(response);
                 
            }
        });
    };

     function agregarCita56(){
// estas son las variables que enviamos

        var fecha = $("#fecha56").val();
        var Hora = $("#Hora56").val();
        var usuario_id = $("#usuario_id56").val();
        var doctor = $("#doctor56").val();
        var clienteId = $("#clienteId56").val();
        var motivo = $("#motivo56").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results56').html(response);
                 
            }
        });

          };

         function agregarCita57(){
// estas son las variables que enviamos

        var fecha = $("#fecha57").val();
        var Hora = $("#Hora57").val();
        var usuario_id = $("#usuario_id57").val();
        var doctor = $("#doctor57").val();
        var clienteId = $("#clienteId57").val();
        var motivo = $("#motivo57").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results57').html(response);
                 
            }
        });
    };

     function agregarCita58(){
// estas son las variables que enviamos

        var fecha = $("#fecha58").val();
        var Hora = $("#Hora58").val();
        var usuario_id = $("#usuario_id58").val();
        var doctor = $("#doctor58").val();
        var clienteId = $("#clienteId58").val();
        var motivo = $("#motivo58").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results58').html(response);
                 
            }
        });
    };

     function agregarCita59(){
// estas son las variables que enviamos

        var fecha = $("#fecha59").val();
        var Hora = $("#Hora59").val();
        var usuario_id = $("#usuario_id59").val();
        var doctor = $("#doctor59").val();
        var clienteId = $("#clienteId59").val();
        var motivo = $("#motivo59").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results59').html(response);
                 
            }
        });
    };


   function agregarCita60(){
// estas son las variables que enviamos

        var fecha = $("#fecha60").val();
        var Hora = $("#Hora60").val();
        var usuario_id = $("#usuario_id60").val();
        var doctor = $("#doctor60").val();
        var clienteId = $("#clienteId60").val();
        var motivo = $("#motivo60").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results60').html(response);
                 
            }
        });
    };
       function agregarCita61(){
// estas son las variables que enviamos

        var fecha = $("#fecha61").val();
        var Hora = $("#Hora61").val();
        var usuario_id = $("#usuario_id61").val();
        var doctor = $("#doctor61").val();
        var clienteId = $("#clienteId61").val();
        var motivo = $("#motivo61").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results61').html(response);
                 
            }
        });
    };

     function agregarCita62(){
// estas son las variables que enviamos

        var fecha = $("#fecha62").val();
        var Hora = $("#Hora62").val();
        var usuario_id = $("#usuario_id62").val();
        var doctor = $("#doctor62").val();
        var clienteId = $("#clienteId62").val();
        var motivo = $("#motivo62").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results62').html(response);
                 
            }
        });
    };

     function agregarCita63(){
// estas son las variables que enviamos

        var fecha = $("#fecha63").val();
        var Hora = $("#Hora63").val();
        var usuario_id = $("#usuario_id63").val();
        var doctor = $("#doctor63").val();
        var clienteId = $("#clienteId63").val();
        var motivo = $("#motivo63").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results63').html(response);
                 
            }
        });
    };

     function agregarCita64(){
// estas son las variables que enviamos

        var fecha = $("#fecha64").val();
        var Hora = $("#Hora64").val();
        var usuario_id = $("#usuario_id64").val();
        var doctor = $("#doctor64").val();
        var clienteId = $("#clienteId64").val();
        var motivo = $("#motivo64").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results64').html(response);
                 
            }
        });
    };

     function agregarCita65(){
// estas son las variables que enviamos

        var fecha = $("#fecha65").val();
        var Hora = $("#Hora65").val();
        var usuario_id = $("#usuario_id65").val();
        var doctor = $("#doctor65").val();
        var clienteId = $("#clienteId65").val();
        var motivo = $("#motivo65").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results65').html(response);
                 
            }
        });
    };

     function agregarCita66(){
// estas son las variables que enviamos

        var fecha = $("#fecha66").val();
        var Hora = $("#Hora66").val();
        var usuario_id = $("#usuario_id66").val();
        var doctor = $("#doctor66").val();
        var clienteId = $("#clienteId66").val();
        var motivo = $("#motivo66").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results66').html(response);
                 
            }
        });

          };

  function agregarCita67(){
// estas son las variables que enviamos

        var fecha = $("#fecha67").val();
        var Hora = $("#Hora67").val();
        var usuario_id = $("#usuario_id67").val();
        var doctor = $("#doctor67").val();
        var clienteId = $("#clienteId67").val();
        var motivo = $("#motivo67").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results67').html(response);
                 
            }
        });
    };

     function agregarCita68(){
// estas son las variables que enviamos

        var fecha = $("#fecha68").val();
        var Hora = $("#Hora68").val();
        var usuario_id = $("#usuario_id68").val();
        var doctor = $("#doctor68").val();
        var clienteId = $("#clienteId68").val();
        var motivo = $("#motivo68").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results68').html(response);
                 
            }
        });
    };

     function agregarCita69(){
// estas son las variables que enviamos

        var fecha = $("#fecha69").val();
        var Hora = $("#Hora69").val();
        var usuario_id = $("#usuario_id69").val();
        var doctor = $("#doctor69").val();
        var clienteId = $("#clienteId69").val();
        var motivo = $("#motivo69").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results69').html(response);
                 
            }
        });
    };



   function agregarCita70(){
// estas son las variables que enviamos

        var fecha = $("#fecha70").val();
        var Hora = $("#Hora70").val();
        var usuario_id = $("#usuario_id70").val();
        var doctor = $("#doctor70").val();
        var clienteId = $("#clienteId70").val();
        var motivo = $("#motivo70").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results70').html(response);
                 
            }
        });
    };

   function agregarCita71(){
// estas son las variables que enviamos

        var fecha = $("#fecha71").val();
        var Hora = $("#Hora71").val();
        var usuario_id = $("#usuario_id71").val();
        var doctor = $("#doctor71").val();
        var clienteId = $("#clienteId71").val();
        var motivo = $("#motivo71").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results71').html(response);
                 
            }
        });
    };

     function agregarCita72(){
// estas son las variables que enviamos

        var fecha = $("#fecha72").val();
        var Hora = $("#Hora72").val();
        var usuario_id = $("#usuario_id72").val();
        var doctor = $("#doctor72").val();
        var clienteId = $("#clienteId72").val();
        var motivo = $("#motivo72").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results72').html(response);
                 
            }
        });
    };

     function agregarCita73(){
// estas son las variables que enviamos

        var fecha = $("#fecha73").val();
        var Hora = $("#Hora73").val();
        var usuario_id = $("#usuario_id73").val();
        var doctor = $("#doctor73").val();
        var clienteId = $("#clienteId73").val();
        var motivo = $("#motivo73").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results73').html(response);
                 
            }
        });
    };

     function agregarCita74(){
// estas son las variables que enviamos

        var fecha = $("#fecha74").val();
        var Hora = $("#Hora74").val();
        var usuario_id = $("#usuario_id74").val();
        var doctor = $("#doctor74").val();
        var clienteId = $("#clienteId74").val();
        var motivo = $("#motivo74").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results74').html(response);
                 
            }
        });
    };

     function agregarCita75(){
// estas son las variables que enviamos

        var fecha = $("#fecha75").val();
        var Hora = $("#Hora75").val();
        var usuario_id = $("#usuario_id75").val();
        var doctor = $("#doctor75").val();
        var clienteId = $("#clienteId75").val();
        var motivo = $("#motivo75").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results75').html(response);
                 
            }
        });
    };

     function agregarCita76(){
// estas son las variables que enviamos

        var fecha = $("#fecha76").val();
        var Hora = $("#Hora76").val();
        var usuario_id = $("#usuario_id76").val();
        var doctor = $("#doctor76").val();
        var clienteId = $("#clienteId76").val();
        var motivo = $("#motivo76").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results76').html(response);
                 
            }
        });
          };

         function agregarCita77(){
// estas son las variables que enviamos

        var fecha = $("#fecha77").val();
        var Hora = $("#Hora77").val();
        var usuario_id = $("#usuario_id77").val();
        var doctor = $("#doctor77").val();
        var clienteId = $("#clienteId77").val();
        var motivo = $("#motivo77").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results77').html(response);
                 
            }
        });
    };

     function agregarCita78(){
// estas son las variables que enviamos

        var fecha = $("#fecha78").val();
        var Hora = $("#Hora78").val();
        var usuario_id = $("#usuario_id78").val();
        var doctor = $("#doctor78").val();
        var clienteId = $("#clienteId78").val();
        var motivo = $("#motivo78").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results78').html(response);
                 
            }
        });
    };

     function agregarCita79(){
// estas son las variables que enviamos

        var fecha = $("#fecha79").val();
        var Hora = $("#Hora79").val();
        var usuario_id = $("#usuario_id79").val();
        var doctor = $("#doctor79").val();
        var clienteId = $("#clienteId79").val();
        var motivo = $("#motivo79").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results79').html(response);
                 
            }
        });
    };

   function agregarCita80(){
// estas son las variables que enviamos

        var fecha = $("#fecha80").val();
        var Hora = $("#Hora80").val();
        var usuario_id = $("#usuario_id80").val();
        var doctor = $("#doctor80").val();
        var clienteId = $("#clienteId80").val();
        var motivo = $("#motivo80").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results80').html(response);
                 
            }
        });
    };
       function agregarCita81(){
// estas son las variables que enviamos

        var fecha = $("#fecha81").val();
        var Hora = $("#Hora81").val();
        var usuario_id = $("#usuario_id81").val();
        var doctor = $("#doctor81").val();
        var clienteId = $("#clienteId81").val();
        var motivo = $("#motivo81").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results81').html(response);
                 
            }
        });
    };

     function agregarCita82(){
// estas son las variables que enviamos

        var fecha = $("#fecha82").val();
        var Hora = $("#Hora82").val();
        var usuario_id = $("#usuario_id82").val();
        var doctor = $("#doctor82").val();
        var clienteId = $("#clienteId82").val();
        var motivo = $("#motivo82").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results82').html(response);
                 
            }
        });
    };

     function agregarCita83(){
// estas son las variables que enviamos

        var fecha = $("#fecha83").val();
        var Hora = $("#Hora83").val();
        var usuario_id = $("#usuario_id83").val();
        var doctor = $("#doctor83").val();
        var clienteId = $("#clienteId83").val();
        var motivo = $("#motivo83").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results83').html(response);
                 
            }
        });
    };



  function agregarCita83(){
// estas son las variables que enviamos

        var fecha = $("#fecha83").val();
        var Hora = $("#Hora83").val();
        var usuario_id = $("#usuario_id83").val();
        var doctor = $("#doctor83").val();
        var clienteId = $("#clienteId83").val();
        var motivo = $("#motivo83").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results83').html(response);
                 
            }
        });
    };


  function agregarCita84(){
// estas son las variables que enviamos

        var fecha = $("#fecha84").val();
        var Hora = $("#Hora84").val();
        var usuario_id = $("#usuario_id84").val();
        var doctor = $("#doctor84").val();
        var clienteId = $("#clienteId84").val();
        var motivo = $("#motivo84").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results84').html(response);
                 
            }
        });
    };

     function agregarCita85(){
// estas son las variables que enviamos

        var fecha = $("#fecha85").val();
        var Hora = $("#Hora85").val();
        var usuario_id = $("#usuario_id85").val();
        var doctor = $("#doctor85").val();
        var clienteId = $("#clienteId85").val();
        var motivo = $("#motivo85").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results85').html(response);
                 
            }
        });
    };

     function agregarCita86(){
// estas son las variables que enviamos

        var fecha = $("#fecha86").val();
        var Hora = $("#Hora86").val();
        var usuario_id = $("#usuario_id86").val();
        var doctor = $("#doctor86").val();
        var clienteId = $("#clienteId86").val();
        var motivo = $("#motivo86").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results86').html(response);
                 
            }
        });

 };



  function agregarCita87(){
// estas son las variables que enviamos

        var fecha = $("#fecha87").val();
        var Hora = $("#Hora87").val();
        var usuario_id = $("#usuario_id87").val();
        var doctor = $("#doctor87").val();
        var clienteId = $("#clienteId87").val();
        var motivo = $("#motivo87").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results87').html(response);
                 
            }
        });
    };

     function agregarCita88(){
// estas son las variables que enviamos

        var fecha = $("#fecha88").val();
        var Hora = $("#Hora88").val();
        var usuario_id = $("#usuario_id88").val();
        var doctor = $("#doctor88").val();
        var clienteId = $("#clienteId88").val();
        var motivo = $("#motivo88").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results88').html(response);
                 
            }
        });
    };

     function agregarCita89(){
// estas son las variables que enviamos

        var fecha = $("#fecha89").val();
        var Hora = $("#Hora89").val();
        var usuario_id = $("#usuario_id89").val();
        var doctor = $("#doctor89").val();
        var clienteId = $("#clienteId89").val();
        var motivo = $("#motivo89").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results89').html(response);
                 
            }
        });
    };


       function agregarCita90(){
// estas son las variables que enviamos

        var fecha = $("#fecha90").val();
        var Hora = $("#Hora90").val();
        var usuario_id = $("#usuario_id90").val();
        var doctor = $("#doctor90").val();
        var clienteId = $("#clienteId90").val();
        var motivo = $("#motivo90").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results90').html(response);
                 
            }
        });
    };
       function agregarCita91(){
// estas son las variables que enviamos

        var fecha = $("#fecha91").val();
        var Hora = $("#Hora91").val();
        var usuario_id = $("#usuario_id91").val();
        var doctor = $("#doctor91").val();
        var clienteId = $("#clienteId91").val();
        var motivo = $("#motivo91").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results91').html(response);
                 
            }
        });
    };

     function agregarCita92(){
// estas son las variables que enviamos

        var fecha = $("#fecha92").val();
        var Hora = $("#Hora92").val();
        var usuario_id = $("#usuario_id92").val();
        var doctor = $("#doctor92").val();
        var clienteId = $("#clienteId92").val();
        var motivo = $("#motivo92").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results92').html(response);
                 
            }
        });
    };

     function agregarCita93(){
// estas son las variables que enviamos

        var fecha = $("#fecha93").val();
        var Hora = $("#Hora93").val();
        var usuario_id = $("#usuario_id93").val();
        var doctor = $("#doctor93").val();
        var clienteId = $("#clienteId93").val();
        var motivo = $("#motivo93").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results93').html(response);
                 
            }
        });
    };

     function agregarCita94(){
// estas son las variables que enviamos

        var fecha = $("#fecha94").val();
        var Hora = $("#Hora94").val();
        var usuario_id = $("#usuario_id94").val();
        var doctor = $("#doctor94").val();
        var clienteId = $("#clienteId94").val();
        var motivo = $("#motivo94").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results94').html(response);
                 
            }
        });
    };

     function agregarCita95(){
// estas son las variables que enviamos

        var fecha = $("#fecha95").val();
        var Hora = $("#Hora95").val();
        var usuario_id = $("#usuario_id95").val();
        var doctor = $("#doctor95").val();
        var clienteId = $("#clienteId95").val();
        var motivo = $("#motivo95").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results95').html(response);
                 
            }
        });
    };

     function agregarCita96(){
// estas son las variables que enviamos

        var fecha = $("#fecha96").val();
        var Hora = $("#Hora96").val();
        var usuario_id = $("#usuario_id96").val();
        var doctor = $("#doctor96").val();
        var clienteId = $("#clienteId96").val();
        var motivo = $("#motivo96").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results96').html(response);
                 
            }
        });
};

 function agregarCita97(){
// estas son las variables que enviamos

        var fecha = $("#fecha97").val();
        var Hora = $("#Hora97").val();
        var usuario_id = $("#usuario_id97").val();
        var doctor = $("#doctor97").val();
        var clienteId = $("#clienteId97").val();
        var motivo = $("#motivo97").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results97').html(response);
                 
            }
        });
    };

     function agregarCita98(){
// estas son las variables que enviamos

        var fecha = $("#fecha98").val();
        var Hora = $("#Hora98").val();
        var usuario_id = $("#usuario_id98").val();
        var doctor = $("#doctor98").val();
        var clienteId = $("#clienteId98").val();
        var motivo = $("#motivo98").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results98').html(response);
                 
            }
        });
    };

     function agregarCita99(){
// estas son las variables que enviamos

        var fecha = $("#fecha99").val();
        var Hora = $("#Hora99").val();
        var usuario_id = $("#usuario_id99").val();
        var doctor = $("#doctor99").val();
        var clienteId = $("#clienteId99").val();
        var motivo = $("#motivo99").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results99').html(response);
                 
            }
        });
    };


       function agregarCita100(){
// estas son las variables que enviamos

        var fecha = $("#fecha100").val();
        var Hora = $("#Hora100").val();
        var usuario_id = $("#usuario_id100").val();
        var doctor = $("#doctor100").val();
        var clienteId = $("#clienteId100").val();
        var motivo = $("#motivo100").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results100').html(response);
                 
            }
        });
    };
       function agregarCita101(){
// estas son las variables que enviamos

        var fecha = $("#fecha101").val();
        var Hora = $("#Hora101").val();
        var usuario_id = $("#usuario_id101").val();
        var doctor = $("#doctor101").val();
        var clienteId = $("#clienteId101").val();
        var motivo = $("#motivo101").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results101').html(response);
                 
            }
        });
    };

     function agregarCita102(){
// estas son las variables que enviamos

        var fecha = $("#fecha102").val();
        var Hora = $("#Hora102").val();
        var usuario_id = $("#usuario_id102").val();
        var doctor = $("#doctor102").val();
        var clienteId = $("#clienteId102").val();
        var motivo = $("#motivo102").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results102').html(response);
                 
            }
        });
    };

     function agregarCita103(){
// estas son las variables que enviamos

        var fecha = $("#fecha103").val();
        var Hora = $("#Hora103").val();
        var usuario_id = $("#usuario_id103").val();
        var doctor = $("#doctor103").val();
        var clienteId = $("#clienteId103").val();
        var motivo = $("#motivo103").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results103').html(response);
                 
            }
        });
    };

     function agregarCita104(){
// estas son las variables que enviamos

        var fecha = $("#fecha104").val();
        var Hora = $("#Hora104").val();
        var usuario_id = $("#usuario_id104").val();
        var doctor = $("#doctor104").val();
        var clienteId = $("#clienteId104").val();
        var motivo = $("#motivo104").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results104').html(response);
                 
            }
        });
    };

     function agregarCita105(){
// estas son las variables que enviamos

        var fecha = $("#fecha105").val();
        var Hora = $("#Hora105").val();
        var usuario_id = $("#usuario_id105").val();
        var doctor = $("#doctor105").val();
        var clienteId = $("#clienteId105").val();
        var motivo = $("#motivo105").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results105').html(response);
                 
            }
        });
    };

     function agregarCita106(){
// estas son las variables que enviamos

        var fecha = $("#fecha106").val();
        var Hora = $("#Hora106").val();
        var usuario_id = $("#usuario_id106").val();
        var doctor = $("#doctor106").val();
        var clienteId = $("#clienteId106").val();
        var motivo = $("#motivo106").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results106').html(response);
                 
            }
        });
 };


  function agregarCita107(){
// estas son las variables que enviamos

        var fecha = $("#fecha107").val();
        var Hora = $("#Hora107").val();
        var usuario_id = $("#usuario_id107").val();
        var doctor = $("#doctor107").val();
        var clienteId = $("#clienteId107").val();
        var motivo = $("#motivo107").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results107').html(response);
                 
            }
        });
    };

     function agregarCita108(){
// estas son las variables que enviamos

        var fecha = $("#fecha108").val();
        var Hora = $("#Hora108").val();
        var usuario_id = $("#usuario_id108").val();
        var doctor = $("#doctor108").val();
        var clienteId = $("#clienteId108").val();
        var motivo = $("#motivo108").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results108').html(response);
                 
            }
        });
    };

     function agregarCita109(){
// estas son las variables que enviamos

        var fecha = $("#fecha109").val();
        var Hora = $("#Hora109").val();
        var usuario_id = $("#usuario_id109").val();
        var doctor = $("#doctor109").val();
        var clienteId = $("#clienteId109").val();
        var motivo = $("#motivo109").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results109').html(response);
                 
            }
        });
    };


       function agregarCita110(){
// estas son las variables que enviamos

        var fecha = $("#fecha110").val();
        var Hora = $("#Hora110").val();
        var usuario_id = $("#usuario_id110").val();
        var doctor = $("#doctor110").val();
        var clienteId = $("#clienteId110").val();
        var motivo = $("#motivo110").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results110').html(response);
                 
            }
        });
    };
       function agregarCita111(){
// estas son las variables que enviamos

        var fecha = $("#fecha111").val();
        var Hora = $("#Hora111").val();
        var usuario_id = $("#usuario_id111").val();
        var doctor = $("#doctor111").val();
        var clienteId = $("#clienteId111").val();
        var motivo = $("#motivo111").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results111').html(response);
                 
            }
        });
    };

     function agregarCita112(){
// estas son las variables que enviamos

        var fecha = $("#fecha112").val();
        var Hora = $("#Hora112").val();
        var usuario_id = $("#usuario_id112").val();
        var doctor = $("#doctor112").val();
        var clienteId = $("#clienteId112").val();
        var motivo = $("#motivo112").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results112').html(response);
                 
            }
        });
    };

     function agregarCita113(){
// estas son las variables que enviamos

        var fecha = $("#fecha113").val();
        var Hora = $("#Hora113").val();
        var usuario_id = $("#usuario_id113").val();
        var doctor = $("#doctor113").val();
        var clienteId = $("#clienteId113").val();
        var motivo = $("#motivo113").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results113').html(response);
                 
            }
        });
    };

     function agregarCita114(){
// estas son las variables que enviamos

        var fecha = $("#fecha114").val();
        var Hora = $("#Hora114").val();
        var usuario_id = $("#usuario_id114").val();
        var doctor = $("#doctor114").val();
        var clienteId = $("#clienteId114").val();
        var motivo = $("#motivo114").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results114').html(response);
                 
            }
        });
    };

     function agregarCita115(){
// estas son las variables que enviamos

        var fecha = $("#fecha115").val();
        var Hora = $("#Hora115").val();
        var usuario_id = $("#usuario_id115").val();
        var doctor = $("#doctor115").val();
        var clienteId = $("#clienteId115").val();
        var motivo = $("#motivo115").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results115').html(response);
                 
            }
        });
    };

     function agregarCita116(){
// estas son las variables que enviamos

        var fecha = $("#fecha116").val();
        var Hora = $("#Hora116").val();
        var usuario_id = $("#usuario_id116").val();
        var doctor = $("#doctor116").val();
        var clienteId = $("#clienteId116").val();
        var motivo = $("#motivo116").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results116').html(response);
                 
            }
        });

 };


function agregarCita117(){
// estas son las variables que enviamos

        var fecha = $("#fecha117").val();
        var Hora = $("#Hora117").val();
        var usuario_id = $("#usuario_id117").val();
        var doctor = $("#doctor117").val();
        var clienteId = $("#clienteId117").val();
        var motivo = $("#motivo117").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results117').html(response);
                 
            }
        });
    };

     function agregarCita118(){
// estas son las variables que enviamos

        var fecha = $("#fecha118").val();
        var Hora = $("#Hora118").val();
        var usuario_id = $("#usuario_id118").val();
        var doctor = $("#doctor118").val();
        var clienteId = $("#clienteId118").val();
        var motivo = $("#motivo118").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results118').html(response);
                 
            }
        });
    };

     function agregarCita119(){
// estas son las variables que enviamos

        var fecha = $("#fecha119").val();
        var Hora = $("#Hora119").val();
        var usuario_id = $("#usuario_id119").val();
        var doctor = $("#doctor119").val();
        var clienteId = $("#clienteId119").val();
        var motivo = $("#motivo119").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results119').html(response);
                 
            }
        });
    };

       function agregarCita120(){
// estas son las variables que enviamos

        var fecha = $("#fecha120").val();
        var Hora = $("#Hora120").val();
        var usuario_id = $("#usuario_id120").val();
        var doctor = $("#doctor120").val();
        var clienteId = $("#clienteId120").val();
        var motivo = $("#motivo120").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results120').html(response);
                 
            }
        });
    };
       function agregarCita121(){
// estas son las variables que enviamos

        var fecha = $("#fecha121").val();
        var Hora = $("#Hora121").val();
        var usuario_id = $("#usuario_id121").val();
        var doctor = $("#doctor121").val();
        var clienteId = $("#clienteId121").val();
        var motivo = $("#motivo121").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results121').html(response);
                 
            }
        });
    };

     function agregarCita122(){
// estas son las variables que enviamos

        var fecha = $("#fecha122").val();
        var Hora = $("#Hora122").val();
        var usuario_id = $("#usuario_id122").val();
        var doctor = $("#doctor122").val();
        var clienteId = $("#clienteId122").val();
        var motivo = $("#motivo122").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results122').html(response);
                 
            }
        });
    };

     function agregarCita123(){
// estas son las variables que enviamos

        var fecha = $("#fecha123").val();
        var Hora = $("#Hora123").val();
        var usuario_id = $("#usuario_id123").val();
        var doctor = $("#doctor123").val();
        var clienteId = $("#clienteId123").val();
        var motivo = $("#motivo123").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results123').html(response);
                 
            }
        });
    };

     function agregarCita124(){
// estas son las variables que enviamos

        var fecha = $("#fecha124").val();
        var Hora = $("#Hora124").val();
        var usuario_id = $("#usuario_id124").val();
        var doctor = $("#doctor124").val();
        var clienteId = $("#clienteId124").val();
        var motivo = $("#motivo124").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results124').html(response);
                 
            }
        });
    };

     function agregarCita125(){
// estas son las variables que enviamos

        var fecha = $("#fecha125").val();
        var Hora = $("#Hora125").val();
        var usuario_id = $("#usuario_id125").val();
        var doctor = $("#doctor125").val();
        var clienteId = $("#clienteId125").val();
        var motivo = $("#motivo125").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results125').html(response);
                 
            }
        });
    };

     function agregarCita126(){
// estas son las variables que enviamos

        var fecha = $("#fecha126").val();
        var Hora = $("#Hora126").val();
        var usuario_id = $("#usuario_id126").val();
        var doctor = $("#doctor126").val();
        var clienteId = $("#clienteId126").val();
        var motivo = $("#motivo126").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results126').html(response);
                 
            }
        });
 };


   function agregarCita127(){
// estas son las variables que enviamos

        var fecha = $("#fecha127").val();
        var Hora = $("#Hora127").val();
        var usuario_id = $("#usuario_id127").val();
        var doctor = $("#doctor127").val();
        var clienteId = $("#clienteId127").val();
        var motivo = $("#motivo127").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results127').html(response);
                 
            }
        });
    };

     function agregarCita128(){
// estas son las variables que enviamos

        var fecha = $("#fecha128").val();
        var Hora = $("#Hora128").val();
        var usuario_id = $("#usuario_id128").val();
        var doctor = $("#doctor128").val();
        var clienteId = $("#clienteId128").val();
        var motivo = $("#motivo128").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results128').html(response);
                 
            }
        });
    };

     function agregarCita129(){
// estas son las variables que enviamos

        var fecha = $("#fecha129").val();
        var Hora = $("#Hora129").val();
        var usuario_id = $("#usuario_id129").val();
        var doctor = $("#doctor129").val();
        var clienteId = $("#clienteId129").val();
        var motivo = $("#motivo129").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results129').html(response);
                 
            }
        });
    };

       function agregarCita130(){
// estas son las variables que enviamos

        var fecha = $("#fecha130").val();
        var Hora = $("#Hora130").val();
        var usuario_id = $("#usuario_id130").val();
        var doctor = $("#doctor130").val();
        var clienteId = $("#clienteId130").val();
        var motivo = $("#motivo130").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results130').html(response);
                 
            }
        });
    };
       function agregarCita131(){
// estas son las variables que enviamos

        var fecha = $("#fecha131").val();
        var Hora = $("#Hora131").val();
        var usuario_id = $("#usuario_id131").val();
        var doctor = $("#doctor131").val();
        var clienteId = $("#clienteId131").val();
        var motivo = $("#motivo131").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results131').html(response);
                 
            }
        });
    };

     function agregarCita132(){
// estas son las variables que enviamos

        var fecha = $("#fecha132").val();
        var Hora = $("#Hora132").val();
        var usuario_id = $("#usuario_id132").val();
        var doctor = $("#doctor132").val();
        var clienteId = $("#clienteId132").val();
        var motivo = $("#motivo132").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results132').html(response);
                 
            }
        });
    };

     function agregarCita133(){
// estas son las variables que enviamos

        var fecha = $("#fecha133").val();
        var Hora = $("#Hora133").val();
        var usuario_id = $("#usuario_id133").val();
        var doctor = $("#doctor133").val();
        var clienteId = $("#clienteId133").val();
        var motivo = $("#motivo133").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results133').html(response);
                 
            }
        });
    };

     function agregarCita134(){
// estas son las variables que enviamos

        var fecha = $("#fecha134").val();
        var Hora = $("#Hora134").val();
        var usuario_id = $("#usuario_id134").val();
        var doctor = $("#doctor134").val();
        var clienteId = $("#clienteId134").val();
        var motivo = $("#motivo134").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results134').html(response);
                 
            }
        });
    };

     function agregarCita135(){
// estas son las variables que enviamos

        var fecha = $("#fecha135").val();
        var Hora = $("#Hora135").val();
        var usuario_id = $("#usuario_id135").val();
        var doctor = $("#doctor135").val();
        var clienteId = $("#clienteId135").val();
        var motivo = $("#motivo135").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results135').html(response);
                 
            }
        });
    };

     function agregarCita136(){
// estas son las variables que enviamos

        var fecha = $("#fecha136").val();
        var Hora = $("#Hora136").val();
        var usuario_id = $("#usuario_id136").val();
        var doctor = $("#doctor136").val();
        var clienteId = $("#clienteId136").val();
        var motivo = $("#motivo136").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results136').html(response);
                 
            }
        });
 };


   function agregarCita137(){
// estas son las variables que enviamos

        var fecha = $("#fecha137").val();
        var Hora = $("#Hora137").val();
        var usuario_id = $("#usuario_id137").val();
        var doctor = $("#doctor137").val();
        var clienteId = $("#clienteId137").val();
        var motivo = $("#motivo137").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results137').html(response);
                 
            }
        });
    };

     function agregarCita138(){
// estas son las variables que enviamos

        var fecha = $("#fecha138").val();
        var Hora = $("#Hora138").val();
        var usuario_id = $("#usuario_id138").val();
        var doctor = $("#doctor138").val();
        var clienteId = $("#clienteId138").val();
        var motivo = $("#motivo138").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results138').html(response);
                 
            }
        });
    };

     function agregarCita139(){
// estas son las variables que enviamos

        var fecha = $("#fecha139").val();
        var Hora = $("#Hora139").val();
        var usuario_id = $("#usuario_id139").val();
        var doctor = $("#doctor139").val();
        var clienteId = $("#clienteId139").val();
        var motivo = $("#motivo139").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results139').html(response);
                 
            }
        });
    };

       function agregarCita130(){
// estas son las variables que enviamos

        var fecha = $("#fecha130").val();
        var Hora = $("#Hora130").val();
        var usuario_id = $("#usuario_id130").val();
        var doctor = $("#doctor130").val();
        var clienteId = $("#clienteId130").val();
        var motivo = $("#motivo130").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results130').html(response);
                 
            }
        });
    };
       function agregarCita131(){
// estas son las variables que enviamos

        var fecha = $("#fecha131").val();
        var Hora = $("#Hora131").val();
        var usuario_id = $("#usuario_id131").val();
        var doctor = $("#doctor131").val();
        var clienteId = $("#clienteId131").val();
        var motivo = $("#motivo131").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results131').html(response);
                 
            }
        });
    };

     function agregarCita132(){
// estas son las variables que enviamos

        var fecha = $("#fecha132").val();
        var Hora = $("#Hora132").val();
        var usuario_id = $("#usuario_id132").val();
        var doctor = $("#doctor132").val();
        var clienteId = $("#clienteId132").val();
        var motivo = $("#motivo132").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results132').html(response);
                 
            }
        });
    };

     function agregarCita133(){
// estas son las variables que enviamos

        var fecha = $("#fecha133").val();
        var Hora = $("#Hora133").val();
        var usuario_id = $("#usuario_id133").val();
        var doctor = $("#doctor133").val();
        var clienteId = $("#clienteId133").val();
        var motivo = $("#motivo133").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results133').html(response);
                 
            }
        });
    };

     function agregarCita134(){
// estas son las variables que enviamos

        var fecha = $("#fecha134").val();
        var Hora = $("#Hora134").val();
        var usuario_id = $("#usuario_id134").val();
        var doctor = $("#doctor134").val();
        var clienteId = $("#clienteId134").val();
        var motivo = $("#motivo134").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results134').html(response);
                 
            }
        });
    };

     function agregarCita135(){
// estas son las variables que enviamos

        var fecha = $("#fecha135").val();
        var Hora = $("#Hora135").val();
        var usuario_id = $("#usuario_id135").val();
        var doctor = $("#doctor135").val();
        var clienteId = $("#clienteId135").val();
        var motivo = $("#motivo135").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results135').html(response);
                 
            }
        });
    };

     function agregarCita136(){
// estas son las variables que enviamos

        var fecha = $("#fecha136").val();
        var Hora = $("#Hora136").val();
        var usuario_id = $("#usuario_id136").val();
        var doctor = $("#doctor136").val();
        var clienteId = $("#clienteId136").val();
        var motivo = $("#motivo136").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results136').html(response);
                 
            }
        });

         };

         function agregarCita137(){
// estas son las variables que enviamos

        var fecha = $("#fecha137").val();
        var Hora = $("#Hora137").val();
        var usuario_id = $("#usuario_id137").val();
        var doctor = $("#doctor137").val();
        var clienteId = $("#clienteId137").val();
        var motivo = $("#motivo137").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results137').html(response);
                 
            }
        });
    };

     function agregarCita138(){
// estas son las variables que enviamos

        var fecha = $("#fecha138").val();
        var Hora = $("#Hora138").val();
        var usuario_id = $("#usuario_id138").val();
        var doctor = $("#doctor138").val();
        var clienteId = $("#clienteId138").val();
        var motivo = $("#motivo138").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results138').html(response);
                 
            }
        });
    };

     function agregarCita139(){
// estas son las variables que enviamos

        var fecha = $("#fecha139").val();
        var Hora = $("#Hora139").val();
        var usuario_id = $("#usuario_id139").val();
        var doctor = $("#doctor139").val();
        var clienteId = $("#clienteId139").val();
        var motivo = $("#motivo139").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results139').html(response);
                 
            }
        });
    };

       function agregarCita150(){
// estas son las variables que enviamos

        var fecha = $("#fecha150").val();
        var Hora = $("#Hora150").val();
        var usuario_id = $("#usuario_id150").val();
        var doctor = $("#doctor150").val();
        var clienteId = $("#clienteId150").val();
        var motivo = $("#motivo150").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results150').html(response);
                 
            }
        });
    };
       function agregarCita151(){
// estas son las variables que enviamos

        var fecha = $("#fecha151").val();
        var Hora = $("#Hora151").val();
        var usuario_id = $("#usuario_id151").val();
        var doctor = $("#doctor151").val();
        var clienteId = $("#clienteId151").val();
        var motivo = $("#motivo151").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results151').html(response);
                 
            }
        });
    };

     function agregarCita152(){
// estas son las variables que enviamos

        var fecha = $("#fecha152").val();
        var Hora = $("#Hora152").val();
        var usuario_id = $("#usuario_id152").val();
        var doctor = $("#doctor152").val();
        var clienteId = $("#clienteId152").val();
        var motivo = $("#motivo152").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results152').html(response);
                 
            }
        });
    };

     function agregarCita153(){
// estas son las variables que enviamos

        var fecha = $("#fecha153").val();
        var Hora = $("#Hora153").val();
        var usuario_id = $("#usuario_id153").val();
        var doctor = $("#doctor153").val();
        var clienteId = $("#clienteId153").val();
        var motivo = $("#motivo153").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results153').html(response);
                 
            }
        });
    };

     function agregarCita154(){
// estas son las variables que enviamos

        var fecha = $("#fecha154").val();
        var Hora = $("#Hora154").val();
        var usuario_id = $("#usuario_id154").val();
        var doctor = $("#doctor154").val();
        var clienteId = $("#clienteId154").val();
        var motivo = $("#motivo154").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results154').html(response);
                 
            }
        });
    };

     function agregarCita155(){
// estas son las variables que enviamos

        var fecha = $("#fecha155").val();
        var Hora = $("#Hora155").val();
        var usuario_id = $("#usuario_id155").val();
        var doctor = $("#doctor155").val();
        var clienteId = $("#clienteId155").val();
        var motivo = $("#motivo155").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results155').html(response);
                 
            }
        });
    };

     function agregarCita156(){
// estas son las variables que enviamos

        var fecha = $("#fecha156").val();
        var Hora = $("#Hora156").val();
        var usuario_id = $("#usuario_id156").val();
        var doctor = $("#doctor156").val();
        var clienteId = $("#clienteId156").val();
        var motivo = $("#motivo156").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results156').html(response);
                 
            }
        });

         };

         function agregarCita157(){
// estas son las variables que enviamos

        var fecha = $("#fecha157").val();
        var Hora = $("#Hora157").val();
        var usuario_id = $("#usuario_id157").val();
        var doctor = $("#doctor157").val();
        var clienteId = $("#clienteId157").val();
        var motivo = $("#motivo157").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results157').html(response);
                 
            }
        });
    };

     function agregarCita158(){
// estas son las variables que enviamos

        var fecha = $("#fecha158").val();
        var Hora = $("#Hora158").val();
        var usuario_id = $("#usuario_id158").val();
        var doctor = $("#doctor158").val();
        var clienteId = $("#clienteId158").val();
        var motivo = $("#motivo158").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results158').html(response);
                 
            }
        });
    };

     function agregarCita159(){
// estas son las variables que enviamos

        var fecha = $("#fecha159").val();
        var Hora = $("#Hora159").val();
        var usuario_id = $("#usuario_id159").val();
        var doctor = $("#doctor159").val();
        var clienteId = $("#clienteId159").val();
        var motivo = $("#motivo159").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results159').html(response);
                 
            }
        });
    };

       function agregarCita160(){
// estas son las variables que enviamos

        var fecha = $("#fecha160").val();
        var Hora = $("#Hora160").val();
        var usuario_id = $("#usuario_id160").val();
        var doctor = $("#doctor160").val();
        var clienteId = $("#clienteId160").val();
        var motivo = $("#motivo160").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results160').html(response);
                 
            }
        });
    };
       function agregarCita161(){
// estas son las variables que enviamos

        var fecha = $("#fecha161").val();
        var Hora = $("#Hora161").val();
        var usuario_id = $("#usuario_id161").val();
        var doctor = $("#doctor161").val();
        var clienteId = $("#clienteId161").val();
        var motivo = $("#motivo161").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results161').html(response);
                 
            }
        });
    };

     function agregarCita162(){
// estas son las variables que enviamos

        var fecha = $("#fecha162").val();
        var Hora = $("#Hora162").val();
        var usuario_id = $("#usuario_id162").val();
        var doctor = $("#doctor162").val();
        var clienteId = $("#clienteId162").val();
        var motivo = $("#motivo162").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results162').html(response);
                 
            }
        });
    };

     function agregarCita163(){
// estas son las variables que enviamos

        var fecha = $("#fecha163").val();
        var Hora = $("#Hora163").val();
        var usuario_id = $("#usuario_id163").val();
        var doctor = $("#doctor163").val();
        var clienteId = $("#clienteId163").val();
        var motivo = $("#motivo163").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results163').html(response);
                 
            }
        });
    };

     function agregarCita164(){
// estas son las variables que enviamos

        var fecha = $("#fecha164").val();
        var Hora = $("#Hora164").val();
        var usuario_id = $("#usuario_id164").val();
        var doctor = $("#doctor164").val();
        var clienteId = $("#clienteId164").val();
        var motivo = $("#motivo164").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results164').html(response);
                 
            }
        });
    };

     function agregarCita165(){
// estas son las variables que enviamos

        var fecha = $("#fecha165").val();
        var Hora = $("#Hora165").val();
        var usuario_id = $("#usuario_id165").val();
        var doctor = $("#doctor165").val();
        var clienteId = $("#clienteId165").val();
        var motivo = $("#motivo165").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results165').html(response);
                 
            }
        });
    };

     function agregarCita166(){
// estas son las variables que enviamos

        var fecha = $("#fecha166").val();
        var Hora = $("#Hora166").val();
        var usuario_id = $("#usuario_id166").val();
        var doctor = $("#doctor166").val();
        var clienteId = $("#clienteId166").val();
        var motivo = $("#motivo166").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results166').html(response);
                 
            }
        });

         };

         function agregarCita167(){
// estas son las variables que enviamos

        var fecha = $("#fecha167").val();
        var Hora = $("#Hora167").val();
        var usuario_id = $("#usuario_id167").val();
        var doctor = $("#doctor167").val();
        var clienteId = $("#clienteId167").val();
        var motivo = $("#motivo167").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results167').html(response);
                 
            }
        });
    };

     function agregarCita168(){
// estas son las variables que enviamos

        var fecha = $("#fecha168").val();
        var Hora = $("#Hora168").val();
        var usuario_id = $("#usuario_id168").val();
        var doctor = $("#doctor168").val();
        var clienteId = $("#clienteId168").val();
        var motivo = $("#motivo168").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results168').html(response);
                 
            }
        });
    };

     function agregarCita169(){
// estas son las variables que enviamos

        var fecha = $("#fecha169").val();
        var Hora = $("#Hora169").val();
        var usuario_id = $("#usuario_id169").val();
        var doctor = $("#doctor169").val();
        var clienteId = $("#clienteId169").val();
        var motivo = $("#motivo169").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results169').html(response);
                 
            }
        });
    };

       function agregarCita170(){
// estas son las variables que enviamos

        var fecha = $("#fecha170").val();
        var Hora = $("#Hora170").val();
        var usuario_id = $("#usuario_id170").val();
        var doctor = $("#doctor170").val();
        var clienteId = $("#clienteId170").val();
        var motivo = $("#motivo170").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results170').html(response);
                 
            }
        });
    };
       function agregarCita171(){
// estas son las variables que enviamos

        var fecha = $("#fecha171").val();
        var Hora = $("#Hora171").val();
        var usuario_id = $("#usuario_id171").val();
        var doctor = $("#doctor171").val();
        var clienteId = $("#clienteId171").val();
        var motivo = $("#motivo171").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results171').html(response);
                 
            }
        });
    };

     function agregarCita172(){
// estas son las variables que enviamos

        var fecha = $("#fecha172").val();
        var Hora = $("#Hora172").val();
        var usuario_id = $("#usuario_id172").val();
        var doctor = $("#doctor172").val();
        var clienteId = $("#clienteId172").val();
        var motivo = $("#motivo172").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results172').html(response);
                 
            }
        });
    };

     function agregarCita173(){
// estas son las variables que enviamos

        var fecha = $("#fecha173").val();
        var Hora = $("#Hora173").val();
        var usuario_id = $("#usuario_id173").val();
        var doctor = $("#doctor173").val();
        var clienteId = $("#clienteId173").val();
        var motivo = $("#motivo173").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results173').html(response);
                 
            }
        });
    };

     function agregarCita174(){
// estas son las variables que enviamos

        var fecha = $("#fecha174").val();
        var Hora = $("#Hora174").val();
        var usuario_id = $("#usuario_id174").val();
        var doctor = $("#doctor174").val();
        var clienteId = $("#clienteId174").val();
        var motivo = $("#motivo174").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results174').html(response);
                 
            }
        });
    };

     function agregarCita175(){
// estas son las variables que enviamos

        var fecha = $("#fecha175").val();
        var Hora = $("#Hora175").val();
        var usuario_id = $("#usuario_id175").val();
        var doctor = $("#doctor175").val();
        var clienteId = $("#clienteId175").val();
        var motivo = $("#motivo175").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results175').html(response);
                 
            }
        });
    };

     function agregarCita176(){
// estas son las variables que enviamos

        var fecha = $("#fecha176").val();
        var Hora = $("#Hora176").val();
        var usuario_id = $("#usuario_id176").val();
        var doctor = $("#doctor176").val();
        var clienteId = $("#clienteId176").val();
        var motivo = $("#motivo176").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results176').html(response);
                 
            }
        });

         };

         function agregarCita177(){
// estas son las variables que enviamos

        var fecha = $("#fecha177").val();
        var Hora = $("#Hora177").val();
        var usuario_id = $("#usuario_id177").val();
        var doctor = $("#doctor177").val();
        var clienteId = $("#clienteId177").val();
        var motivo = $("#motivo177").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results177').html(response);
                 
            }
        });
    };

     function agregarCita178(){
// estas son las variables que enviamos

        var fecha = $("#fecha178").val();
        var Hora = $("#Hora178").val();
        var usuario_id = $("#usuario_id178").val();
        var doctor = $("#doctor178").val();
        var clienteId = $("#clienteId178").val();
        var motivo = $("#motivo178").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results178').html(response);
                 
            }
        });
    };

     function agregarCita179(){
// estas son las variables que enviamos

        var fecha = $("#fecha179").val();
        var Hora = $("#Hora179").val();
        var usuario_id = $("#usuario_id179").val();
        var doctor = $("#doctor179").val();
        var clienteId = $("#clienteId179").val();
        var motivo = $("#motivo179").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results179').html(response);
                 
            }
        });
    };

       function agregarCita180(){
// estas son las variables que enviamos

        var fecha = $("#fecha180").val();
        var Hora = $("#Hora180").val();
        var usuario_id = $("#usuario_id180").val();
        var doctor = $("#doctor180").val();
        var clienteId = $("#clienteId180").val();
        var motivo = $("#motivo180").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results180').html(response);
                 
            }
        });
    };
       function agregarCita181(){
// estas son las variables que enviamos

        var fecha = $("#fecha181").val();
        var Hora = $("#Hora181").val();
        var usuario_id = $("#usuario_id181").val();
        var doctor = $("#doctor181").val();
        var clienteId = $("#clienteId181").val();
        var motivo = $("#motivo181").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results181').html(response);
                 
            }
        });
    };

     function agregarCita182(){
// estas son las variables que enviamos

        var fecha = $("#fecha182").val();
        var Hora = $("#Hora182").val();
        var usuario_id = $("#usuario_id182").val();
        var doctor = $("#doctor182").val();
        var clienteId = $("#clienteId182").val();
        var motivo = $("#motivo182").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results182').html(response);
                 
            }
        });
    };

     function agregarCita183(){
// estas son las variables que enviamos

        var fecha = $("#fecha183").val();
        var Hora = $("#Hora183").val();
        var usuario_id = $("#usuario_id183").val();
        var doctor = $("#doctor183").val();
        var clienteId = $("#clienteId183").val();
        var motivo = $("#motivo183").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results183').html(response);
                 
            }
        });
    };

     function agregarCita184(){
// estas son las variables que enviamos

        var fecha = $("#fecha184").val();
        var Hora = $("#Hora184").val();
        var usuario_id = $("#usuario_id184").val();
        var doctor = $("#doctor184").val();
        var clienteId = $("#clienteId184").val();
        var motivo = $("#motivo184").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results184').html(response);
                 
            }
        });
    };

     function agregarCita185(){
// estas son las variables que enviamos

        var fecha = $("#fecha185").val();
        var Hora = $("#Hora185").val();
        var usuario_id = $("#usuario_id185").val();
        var doctor = $("#doctor185").val();
        var clienteId = $("#clienteId185").val();
        var motivo = $("#motivo185").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results185').html(response);
                 
            }
        });
    };

     function agregarCita186(){
// estas son las variables que enviamos

        var fecha = $("#fecha186").val();
        var Hora = $("#Hora186").val();
        var usuario_id = $("#usuario_id186").val();
        var doctor = $("#doctor186").val();
        var clienteId = $("#clienteId186").val();
        var motivo = $("#motivo186").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results186').html(response);
                 
            }
        });

         };

         function agregarCita187(){
// estas son las variables que enviamos

        var fecha = $("#fecha187").val();
        var Hora = $("#Hora187").val();
        var usuario_id = $("#usuario_id187").val();
        var doctor = $("#doctor187").val();
        var clienteId = $("#clienteId187").val();
        var motivo = $("#motivo187").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results187').html(response);
                 
            }
        });
    };

     function agregarCita188(){
// estas son las variables que enviamos

        var fecha = $("#fecha188").val();
        var Hora = $("#Hora188").val();
        var usuario_id = $("#usuario_id188").val();
        var doctor = $("#doctor188").val();
        var clienteId = $("#clienteId188").val();
        var motivo = $("#motivo188").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results188').html(response);
                 
            }
        });
    };

     function agregarCita189(){
// estas son las variables que enviamos

        var fecha = $("#fecha189").val();
        var Hora = $("#Hora189").val();
        var usuario_id = $("#usuario_id189").val();
        var doctor = $("#doctor189").val();
        var clienteId = $("#clienteId189").val();
        var motivo = $("#motivo189").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results189').html(response);
                 
            }
        });
    };

       function agregarCita190(){
// estas son las variables que enviamos

        var fecha = $("#fecha190").val();
        var Hora = $("#Hora190").val();
        var usuario_id = $("#usuario_id190").val();
        var doctor = $("#doctor190").val();
        var clienteId = $("#clienteId190").val();
        var motivo = $("#motivo190").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results190').html(response);
                 
            }
        });
    };
       function agregarCita191(){
// estas son las variables que enviamos

        var fecha = $("#fecha191").val();
        var Hora = $("#Hora191").val();
        var usuario_id = $("#usuario_id191").val();
        var doctor = $("#doctor191").val();
        var clienteId = $("#clienteId191").val();
        var motivo = $("#motivo191").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results191').html(response);
                 
            }
        });
    };

     function agregarCita192(){
// estas son las variables que enviamos

        var fecha = $("#fecha192").val();
        var Hora = $("#Hora192").val();
        var usuario_id = $("#usuario_id192").val();
        var doctor = $("#doctor192").val();
        var clienteId = $("#clienteId192").val();
        var motivo = $("#motivo192").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results192').html(response);
                 
            }
        });
    };

     function agregarCita193(){
// estas son las variables que enviamos

        var fecha = $("#fecha193").val();
        var Hora = $("#Hora193").val();
        var usuario_id = $("#usuario_id193").val();
        var doctor = $("#doctor193").val();
        var clienteId = $("#clienteId193").val();
        var motivo = $("#motivo193").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results193').html(response);
                 
            }
        });
    };

     function agregarCita194(){
// estas son las variables que enviamos

        var fecha = $("#fecha194").val();
        var Hora = $("#Hora194").val();
        var usuario_id = $("#usuario_id194").val();
        var doctor = $("#doctor194").val();
        var clienteId = $("#clienteId194").val();
        var motivo = $("#motivo194").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results194').html(response);
                 
            }
        });
    };

     function agregarCita195(){
// estas son las variables que enviamos

        var fecha = $("#fecha195").val();
        var Hora = $("#Hora195").val();
        var usuario_id = $("#usuario_id195").val();
        var doctor = $("#doctor195").val();
        var clienteId = $("#clienteId195").val();
        var motivo = $("#motivo195").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results195').html(response);
                 
            }
        });
    };

     function agregarCita196(){
// estas son las variables que enviamos

        var fecha = $("#fecha196").val();
        var Hora = $("#Hora196").val();
        var usuario_id = $("#usuario_id196").val();
        var doctor = $("#doctor196").val();
        var clienteId = $("#clienteId196").val();
        var motivo = $("#motivo196").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results196').html(response);
                 
            }
        });

         };

         function agregarCita197(){
// estas son las variables que enviamos

        var fecha = $("#fecha197").val();
        var Hora = $("#Hora197").val();
        var usuario_id = $("#usuario_id197").val();
        var doctor = $("#doctor197").val();
        var clienteId = $("#clienteId197").val();
        var motivo = $("#motivo197").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results197').html(response);
                 
            }
        });
    };

     function agregarCita198(){
// estas son las variables que enviamos

        var fecha = $("#fecha198").val();
        var Hora = $("#Hora198").val();
        var usuario_id = $("#usuario_id198").val();
        var doctor = $("#doctor198").val();
        var clienteId = $("#clienteId198").val();
        var motivo = $("#motivo198").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results198').html(response);
                 
            }
        });
    };

     function agregarCita199(){
// estas son las variables que enviamos

        var fecha = $("#fecha199").val();
        var Hora = $("#Hora199").val();
        var usuario_id = $("#usuario_id199").val();
        var doctor = $("#doctor199").val();
        var clienteId = $("#clienteId199").val();
        var motivo = $("#motivo199").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "guardarCitaOportunidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id, doctor:doctor , clienteId:clienteId , motivo:motivo },
            success: function(response) {
                $('#div-results199').html(response);
                 
            }
        });
    };



</script>

   <?php
   include 'footer.php';

   ?>

 <!-- Funciona para consultar disponibilidad -->

