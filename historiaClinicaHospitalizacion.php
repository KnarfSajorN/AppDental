<?php
    include 'header.php';
    include 'menu.php';
  
 
    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
    $ID = $_SESSION['ID'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

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
      $antecedentes     =$rowMotorizado['antecedentes'];
      $fotoperfil       =$rowMotorizado['fotoperfil'];
      $tiposSangre      =$rowMotorizado['tiposSangre'];
      $dis          =$rowMotorizado['dis'];
      $tipodiscapacidad      =$rowMotorizado['tipodiscapacidad'];
      $etnia            =$rowMotorizado['etnia'];
      $esDonante        =$rowMotorizado['esDonante'];
      $tomaMedicamento  =$rowMotorizado['tomaMedicamento'];

      $fechaNacimiento  =$rowMotorizado['fechaNacimiento'];

      $entidadSalud     =$rowMotorizado['entidadSalud'];
      $seguro           =$rowMotorizado['seguro'];

      $nota           =$rowMotorizado['nota'];
      $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno'];
      $alergias           =$rowMotorizado['alergias'];


      $peso           =$rowMotorizado['peso'];
      $altura           =$rowMotorizado['altura'];
      $imc           =$rowMotorizado['imc'];
      $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal'];

        // -----------------------------------------------------------------------

        $ap1            = $rowMotorizado['ap1'];
        $ap2            = $rowMotorizado['ap2'];
        $ap3            = $rowMotorizado['ap3'];
        $ap4            = $rowMotorizado['ap4'];
        $ap5            = $rowMotorizado['ap5'];
        $ap6            = $rowMotorizado['ap6'];
        $ap7            = $rowMotorizado['ap7'];
        $ap8            = $rowMotorizado['ap8'];
        $ap9            = $rowMotorizado['ap9'];

        $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
        $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
        $whatsapp       = $rowMotorizado['whatsapp'];
        $tipoUsuario    = $rowMotorizado['tipoUsuario'];
        $estado         = $rowMotorizado['estado'];
        $ocupacion    = $rowMotorizado['ocupacion'];

    }

  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");


  $nrowl=mysqli_num_rows($queryconfig);
  while($rowconfig=mysqli_fetch_array($queryconfig))
  {
      $cie10 = $rowconfig['cie10'];
      $pro1  = $rowconfig['pro1'];
      $pro2  = $rowconfig['pro2'];
  }

$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }

        if ($queryList =='') {
            $idR == 1; }
             else{
            $idR   = ($idReceta+1);}


 $fecha_hoy = date("Y-m-d");
        ?>


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta médica, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta médica  </a></li>
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
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                            Datos personales
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse">
                        <?php echo datosPacientes($clienteId);?>
                      </div>
                    </div>
        
                    <form action="guardarHistoriaClinicaHospitalizacion.php" method="POST" name="formularioActualizarcliente">

                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                              Historia Clinica Hospitalizacion
                            </a>
                          </h4>
                        </div>
                        <div id="Entrevista" class="panel-collapse collapse">
                          <div class="box-body">
                            
                            <div class="form-group col-md-12" align="left">
                            	<label>Vía de ingreso a la institución</label><br>
                            	<select name="via_ingreso_institucion" id="via_ingreso_institucion" class="form-control select2" style="width: 100%;">

                            		<option selected="selected" value="">Seleccione tipo de consulta</option>
                            		<option value="1">Urgencias</option>
                            		<option value="2">Consulta externa o programada</option>
                            		<option value="3">Remitido</option>
                            		<option value="4">Nacido en la institución</option>


                            	</select> 
                            </div>

                            <div class="form-group col-md-12" align="left">
                            <label>Fecha de ingreso del usuario a la institución</label><br>
                            <input type="date" name="fecha_ingreso_observacion" id="fecha_ingreso_observacion" class="form-control" max="<?php echo $fecha_hoy?>" onChange="FechaUrgencia(this.value)"> 
                            </div>

                            <div class="form-group col-md-12" align="left">
                            <label>Hora de ingreso del usuario a la Institución</label><br>
                            <input type="time" name="hora_ingreso_observacion" id="hora_ingreso_observacion" class="form-control" value="00:00"> 
                            </div>


                            <div class="form-group col-md-12" align="left">
                              <label>Número de Autorización</label><br>
                              <input type="number" name="numero_autorizacion" id="numero_autorizacion" class="form-control" placeholder="Numero de Autorizacion" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                            </div>

                            <div class="form-group col-md-6" align="left">
                            	<label>Causa externa</label>
                            	<select id="causa_externa" name="causa_externa" class="form-control select2" style="width: 100%;">
                            		<option value="" selected> Seleccione</option>
                            		<option value="01" > Accidente de trabajo(Atención del embarazo y el Postparto)</option>
                            		<option value="02" > Accidente de tránsito</option>
                            		<option value="03" > Accidente rábico</option>
                            		<option value="04" > Accidente ofídico</option>
                            		<option value="05" > Otro tipo de accidente</option>
                            		<option value="06" > Evento catatrósfico</option>
                            		<option value="07" > Lesión por agresión</option>
                            		<option value="08" > Lesión auto infligida</option>
                            		<option value="09" > Sospecha de maltrato físico</option>
                            		<option value="10" > Sospecha de abuso sexual</option>
                            		<option value="11" > Sospecha de violencia sexual</option>
                            		<option value="12" > Sospecha de maltrato emocional</option>
                            		<option value="13" > Enfermedad general</option>
                            		<option value="14" > Enfermedad profesional</option>
                            		<option value="15" > Otra</option>
                            	</select>
                            </div>









                            <div class="col-md-12">
                            	<div class="form-group has-#00a65a">
                            		<label>Diagnóstico Cie10</label>
                            	</div>
                            </div>

                            <!-- Funcionando CIE10 -->
                            <div class="form-group col-md-12">
                            	CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)


                            	<!-- cie_10 #1-->
                            	<div class="col-md-12"> 

                            		<div class="col-md-4">
                            			<label id="texto_1">Diagnóstico principal de ingreso </label>
                            			<br> 
                            			<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >

                            			<input type="hidden"  id="name1"   value="select1" >

                            		</div>
                            		<div id="div-results1"  class="col-md-8">
                            		</div>
                            	</div>

                            	<!-- cie_10 #2-->
                            	<div class="col-md-12"> 
                            		<div class="col-md-4">
                            			<label id="texto_2">Diagnóstico principal de egreso</label>
                            			<br> 
                            			<input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >
                            			<input type="hidden"  id="name2"   value="select2" >
                            		</div>
                            		<div id="div-results2"  class="col-md-8"></div><!-- resultado cie-10-->
                            	</div>

                            	<!-- cie_10 #3-->
                            	<div class="col-md-12"> 
                            		<div class="col-md-4">
                            			<label id="texto_3">Diagnóstico relacionado Nro. 1 de egreso</label>
                            			<br> 
                            			<input type="text"  id="clienteId3"  onChange="verlista3();" placeholder="Buscar CIE10" >
                            			<input type="hidden"  id="name3"   value="select3" >
                            		</div>
                            		<div id="div-results3"  class="col-md-8"></div><!-- resultado cie-10-->
                            	</div>

                            	<!-- cie_10 #4-->
                            	<div class="col-md-12"> 
                            		<div class="col-md-4">
                            			<label id="texto_4">Diagnóstico relacionado Nro. 2 de egreso</label>
                            			<br> 
                            			<input type="text"  id="clienteId4"  onChange="verlista4();" placeholder="Buscar CIE10" >
                            			<input type="hidden"  id="name4"   value="select4" >
                            		</div>
                            		<div id="div-results4"  class="col-md-8"></div><!-- resultado cie-10-->
                            	</div>

                            	<!-- cie_10 #5-->
                            	<div class="col-md-12"> 
                            		<div class="col-md-4">
                            			<label id="texto_4">Diagnóstico relacionado Nro. 3 de egreso.</label>
                            			<br> 
                            			<input type="text"  id="clienteId5"  onChange="verlista5();" placeholder="Buscar CIE10" >
                            			<input type="hidden"  id="name5"   value="select5" >
                            		</div>
                            		<div id="div-results5"  class="col-md-8"></div><!-- resultado cie-10-->
                            	</div>
                            </div>

                            <div class="form-group col-md-12" align="left">
                              <label>CIE-10</label>
                              <div class="col-md-12"> 
                                <div class="col-md-4">
                                  <label>Código del Diagnóstico de la Complicacion</label>
                                  <br> 
                                  <input type="text"  id="clienteId6"  onChange="verlista6();" placeholder="Buscar CIE10" >
                                  <input type="hidden"  id="name6"   value="select6" >
                                </div>
                                <div id="div-results6"  class="col-md-8"></div><!-- resultado cie-10-->
                              </div>
                            </div>


                            <div class="form-group col-md-12" align="left">
                            	<label>Estado a la salida</label><br>
                            	<select name="estado_salida_urgencias" id="estado_salida_urgencias" class="form-control select2" style="width: 100%;" onChange="estado_salida(this.value);">

                            		<option selected="selected" value="">Seleccione tipo de consulta</option>
                            		<option value="1">Vivo (a)</option>
                            		<option value="2">Muerto (a)</option>

                            	</select> 
                            </div>

                            <!-- cie_10 #6-->
                            <div class="col-md-12"> 
                              <div class="col-md-4">
                                <label id="texto_4">Diagnóstico de la causa básica de muerte</label>
                                <br> 
                                <input type="text"  id="clienteId7"  onChange="verlista7();" placeholder="Buscar CIE10" >
                                <input type="hidden"  id="name7"   value="select7" >
                              </div>
                              <div id="div-results7"  class="col-md-8"></div><!-- resultado cie-10-->
                            </div>



                            <div class="form-group col-md-12" align="left">
                            <label>Fecha de egreso del usuario a la institución</label><br>
                            <input type="date" name="fecha_salida_urgencias" id="fecha_salida_urgencias" class="form-control"> 
                            </div>

                            <div class="form-group col-md-12" align="left">
                            <label>Hora de egreso del usuario de la institución</label><br>
                            <input type="time" name="hora_salida_urgencias" id="hora_salida_urgencias" class="form-control"> 
                            </div>


                          </div>
                        </div>
                      </div>




						<div class="form-group col-md-12">
                                <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
                              </div>

                          <hr>

                          <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                          <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                          <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                          <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                          <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                          <input  type="hidden" name="receta"  value="<?php echo $idR?>">
                          <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">




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

      </div>

    </div>

  </section>

</div>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>

<script type="text/javascript">





     
function calculardosis(){
  m1 = document.getElementById("frecuencia").value;
  m2 = document.getElementById("administracion").value;
  m3 = document.getElementById("dias").value;

if (m2=="Horas") 
{
 

r= 24/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

if (m2=="Minutos") 
{
 

r= 1440/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Dias") 
{
 

r= 1/m1;  

      

  document.getElementById("dosisdia").value = r;


 }


if (m2=="Semana") 
{
 
a= 7*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Mes") 
{
 
a= 30*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Ano") 
{
 
a= 365*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }
 

  if (m2=="Unica") 
{
 


r= "&uacutenica Dosis";
      

  document.getElementById("dosisdia").value = r;


 }

 rt=r*m3;
document.getElementById("total").value = rt;

 
   }
       
 







 
    function agergarItem(){
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

 var dosis = $("#dosis").val();
 var posologia = $("#posologia").val();
 var frecuencia = $("#frecuencia").val();
 var administracion= $("#administracion").val();
 var dosisdia= $("#dosisdia").val();
 var dias= $("#dias").val();
 var via= $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val(); 
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("#nota2").val();
        var cantidad = $("#cantidad").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2,cantidad:cantidad},
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#dosisdia').val('');
                $('#dias').val('');
                $('#via').val('');
                $('#total').val('');
                $('#nota').val('');
                $('#cantidad').val('');
                
               $('#codigoProd').val('');
               $('#codigoProd1').val('');
                $('#nota').val('');

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
                $('#div-resultsM').html(response);
                 
            }
        });
    };



 function consultas(){
 
        var tipoConsulta = $("#tipoConsulta").val();
      
        $.ajax({
            type: "POST",
            url: "Tipoconsultas.php",
            data: {tipoConsulta:tipoConsulta},
            success: function(response) {
                $('#div-resultsConsultas').html(response);
                 
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

      


function verlista2(){
 
        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results2').html(response);
                 
            }
        });
    };


function verlista3(){
 
        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results3').html(response);
                 
            }
        });
    };


function verlista4(){
 
        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };


function verlista5(){
 
        var clienteId = $("#clienteId5").val();
        var name = $("#name5").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results5').html(response);
                 
            }
        });
    };

function verlista6(){
 
        var clienteId = $("#clienteId6").val();
        var name = $("#name6").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results6').html(response);
                 
            }
        });
    };

function verlista7(){
 
        var clienteId = $("#clienteId7").val();
        var name = $("#name7").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results7').html(response);
                 
            }
        });
    };

      
function verlista_Cup(){
 
        var clienteId = $("#clienteId_Cup").val();
        var name = $("#name1_Cup").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cuplista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results1_Cup').html(response);
                 
            }
        });
    };


function estado_salida(value){
 
        if(value=="2")
        {
          document.getElementById("causa_basica_urgencias").required=true;
        }
        else
        {
          document.getElementById("causa_basica_urgencias").required=false;
        }
    };

function FechaUrgencia(value)
{
  document.getElementById("fecha_salida_urgencias").min=value;
}

function Cambio_Texto()
{
  var respuesta = document.getElementById("tipoConsulta").value;
  if(respuesta == '3')
  {
  document.getElementById("texto_1").innerHTML="Diagnóstico a la salida";
  document.getElementById("texto_2").innerHTML="Diagnóstico relacionado Nro. 1 a la salida";
  document.getElementById("texto_3").innerHTML="Diagnóstico relacionado Nro. 2 a la salida";
  document.getElementById("texto_4").innerHTML="Diagnóstico relacionado Nro. 3 a la salida";
  }
  else
  {
    document.getElementById("texto_1").innerHTML="Código del Diagnóstico principal";
    document.getElementById("texto_2").innerHTML="Código del Diagnóstico relacionado N° 1";
    document.getElementById("texto_3").innerHTML="Código del Diagnóstico relacionado N° 2";
    document.getElementById("texto_4").innerHTML="Código del Diagnóstico relacionado N° 3";
  }
  
  
}
</script>
 

