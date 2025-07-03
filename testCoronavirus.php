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
	    $dis     		  =$rowMotorizado['dis'];
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
							<select name="tipoConsulta" class="form-control select2" style="width: 100%;">
								<option selected="selected" value="">Seleccione tipo de consulta</option>
								<option>Consulta externa</option>
								<option>Urgencia</option>
								<option>Ambulatorio </option>
							</select>

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
										<form action="guardarTestCorona.php" method="POST" name="formularioActualizarcliente">

										

														<div class="form-group col-md-12">
															
<div class="form-group col-md-12">
				

															<div align="left">¿Qué síntomas tienes?</div>											
															<div align="right">
														<a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
												
												<div class="box-body pad">
													<textarea id="enfermedadActual" name="enfermedadActual" class="textarea" placeholder="Síntomas" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>
															
														</div>



<div class="form-group col-md-12">
<div align="left">	¿Tienes sensación de falta de aire de inicio brusco (en ausencia
de cualquier otra patología que justifique este síntoma)? </div>
														
  <select name="ant6" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">	¿Tienes fiebre? (+38°C)</div>
														
  <select name="ant7" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>


<div class="form-group col-md-4">
<div align="left">¿Tienes tos seca y persistente?</div>
														
  <select name="ant8" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>


<div class="form-group col-md-4">
<div align="left">¿Has tenido contacto estrecho con algún paciente positivo
confirmado?</div>
														
  <select name="ant9" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>
			

<div class="form-group col-md-4">
<div align="left">¿Tienes mucosidad en la nariz?</div>
														
  <select name="ant10" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>



<div class="form-group col-md-4">
<div align="left">¿Tienes dolor muscular?</div>
														
  <select name="ant11" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Tienes sintomatología gastrointestinal?</div>
														
  <select name="ant12" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Llevas más de 20 días con estos síntomas?</div>
														
  <select name="ant13" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>



														</div>


													
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

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };


             

            $ID_Usuario  =  $_SESSION['ID'];
      function eliminarItem()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente },
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
			var	b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
			document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
		} catch (e) {
  		}
	}
	function calcularEdadCorregida(){
		try {
			var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
			var	b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
			document.formularioActualizarcliente.edadCorregida.value = b - a;
		} catch (e) {
  		}
	}
</script>
 

