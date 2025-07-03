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

    }

	$queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
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
					<div class="box-body">
 </div>  

                      <div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Peso, Historia del Peso y Talla</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 
                <input type="hidden" class="form-control input-lg" name="edadMeses" value="<?php echo calculaedadMeses($fechanacimiento)?>"   step="any">
													<input type="hidden" class="form-control input-lg" name="edadanos" value="<?php echo calculaedadAnos($fechanacimiento)?>"   step="any">    
                              

 <div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Actual(kg):</label>
                          <input type="text" name="PesoActual" id="PesoActual" class="form-control input-lg" onChange="calcular();"  step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Usual (kg):</label>
                          <input type="text" name="PesoUsual"  id="PesoUsual"  class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Minimo:</label>
                          <input type="text" name="PesoMinimo" id="PesoMinimo" class="form-control">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Maximo:</label>
                          <input type="text" name="PesoMaximo"id="PesoMaximo" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Talla(cm):</label>
                          <input type="text" name="Talla"   id="Talla"  class="form-control input-lg" onChange="calcular();"  step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-2">
															<div align="left">perímetro cefalico</div>
															<input type="text" class="form-control input-lg" id="sat" name="perimetrocefalico"  value="0" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>
 

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones" class="form-control">
                        </div>
                      </div>



              
                                        </div>




<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Perímetros (Cm)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cuello:</label>
                          <input type="text" name="Cuello" id="Cuello" class="form-control">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pecho/Tórax:</label>
                          <input type="text"  class="form-control input-lg"name="Pecho"  name="pecho" onChange="calcular();"  step="any"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Relajado:</label>
                          <input type="text"   class="form-control input-lg"name="brazoR" id="brazoR"  onChange="calcular();"step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Contraído:</label>
                          <input type="text" name="BrazoC" id="BrazoC"   onChange="calcular();" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Antebrazo:</label>
                          <input type="text"  class="form-control input-lg"name="Antebrazo" id="Antebrazo"   onChange="calcular();" step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muñeca:</label>
                          <input type="text" name="Muneca" id="Muneca" class="form-control input-lg" onChange="calcular();" step="any">
                        </div>
                      </div>



              
                                        </div>



<div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cintura:</label>
                          <input type="text" name="Cintura" id="Cintura"class="form-control input-lg" onChange="calcular();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Abdómen:</label>
                          <input type="text" name="Abdomen"  id="Abdomen" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cadera</label>
                          <input type="text" name="Cadera" id="Cadera" class="form-control input-lg" onChange="calcular();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo" id="Muslo"  class="form-control input-lg"  onChange="calcular();"  step="any"> 
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pantorrilla:</label>
                          <input type="text" name="Pantorrilla" id="Pantorrilla"  onChange="calcular();" class="form-control input-lg"  step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones1" class="form-control">
                        </div>
                      </div>



              
                                        </div>





<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Pliegues Cútaneos (mm)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div>

 <div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Biceps:</label>
                          <input type="text" name="Biceps"  id="Biceps"class="form-control input-lg"  onChange="calcular();" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Triceps:</label>
                          <input type="text" name="riceps" id="riceps" class="form-control input-lg"  onChange="calcular();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Subescapular</label>
                          <input type="text" name="Subescapular" id="Subescapular"class="form-control input-lg"  onChange="calcular();"  step="any"> 
                        </div>
                      </div>

              <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cresta Iliaca:</label>
                          <input type="text" name="Cresta" id="Cresta" class="form-control input-lg"  onChange="calcular();" step="any">
                        </div>
                      </div>
                                        </div>


<div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Supraespinal:</label>
                          <input type="text" name="Supraespinal" id="Supraespinal" class="form-control input-lg"  onChange="calcular();"  step="any">  
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Abdominal:</label>
                          <input type="text" name="Abdominal"  id="Abdominal" class="form-control input-lg"  onChange="calcular();" step="any"> 
                          

                          <input type="hidden" name="genero"  id="genero" value="<?php echo $genero?>" class="form-control input-lg"   onChange="calcular();" onChange="calcularmasapiel();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo1" id="Muslo1" class="form-control input-lg"  onChange="calcular();"   step="any"> 
                        </div>
                      </div>
<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Pierna Media:</label>
                          <input type="text" name="Pierna"id="Pierna" class="form-control input-lg"  onChange="calcular();" step="any"> 
                        </div>
                      </div>
              
                                        </div>



 <div class="row"><div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones2" class="form-control">
                        </div>
                      </div>
                                        </div>



<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Fuerza Muscular</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Dinanómetro:</label>
                          <input type="text" name="Dinanometro"  id="Dinanometro" class="form-control">
                        </div>
                      </div>


</div>


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Resultados</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">IMC:</label>
                          <input type="text" name="IMC" id="IMC" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Estructura:</label>
                          <input type="text" name="Estructura" id="Estructura" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Saludable:</label>
                          <input type="text" name="Peso" id="Peso" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Relación Cintura/Cadera:</label>
                          <input type="text" name="Relacion" id="Relacion" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

	<div class="form-group col-md-6">
															<div align="left">Composición corporal</div>
															<input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
														</div>

	</div>


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> % Grasas(YUHASZ)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">
 	<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grasa:</label>
                          <input type="text" name="grasapor" id="grasapor"  class="form-control input-lg"  onChange="calcular();"   step="any">
                        </div>
                      </div>

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Suma Pliegues:</label>
                          <input type="text" name="Pliegues" id="Pliegues"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">    
                        <div class="form-group">
                          <label class="control-label">Peso Graso:</label>
                          <input type="text" name="Graso"  id="Graso" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Magro:</label>
                          <input type="text" name="Magro" id="Magro" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">IAKS:</label>
                          <input type="text" name="IAKS" id="IAKS" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-6">
															<div align="left">Interpretación de Grasa </div>
															<input type="text" class="form-control input-lg" id="interpretacion" name="interpretacion">
														</div>
</div>


														


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> Analis de Composición Corporal</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">
 	<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Piel:</label>
                          <input type="text" name="masap" id="masap"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>

  <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Adiposa:</label>
                          <input type="text" name="masaA" id="masaA"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Peso Muscular:</label>
                          <input type="text" name="pesom"  id="pesom" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 
</div>


														</div></div>


 

</div>


<?php include("footer.php")?>
  
 
<script type="text/javascript"> 

 
   

   // ******************************************************************* bien  *******************************************************************
 function calcular()
    {



        m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

        r = m1/((m2/100)*(m2/100));


        document.getElementById("IMC").value = r.toFixed(2);


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







        m3 = document.getElementById("Talla").value;
        m4 = document.getElementById("Muneca").value;
// calcularestructura
        cc = m3/m4;

        document.getElementById("Estructura").value = cc.toFixed(2);



 

 //calcularRelacion
        m5 = document.getElementById("Cintura").value;
        m6 = document.getElementById("Cadera").value;

        cc2 = m1/m2;

        document.getElementById("Relacion").value = cc2.toFixed(2);
 
 


        m7 = document.getElementById("Biceps").value;
        m8 = document.getElementById("riceps").value;
        m9 = document.getElementById("Subescapular").value;
        m10= document.getElementById("Cresta").value;
        m11= document.getElementById("Supraespinal").value;
        m12= document.getElementById("Abdominal").value;
        m13= document.getElementById("Muslo1").value;
        m14= document.getElementById("Pierna").value;





        p = parseFloat(m7)+parseFloat(m8)+parseFloat(m9)+parseFloat(m10)+parseFloat(m11)+parseFloat(m12)+ parseFloat(m13)+parseFloat(m14);

        text= p;  
    
   document.getElementById("Pliegues").innerHTML = text;  


      document.getElementById("Pliegues").value = p.toFixed(2);










// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
 
 ma= parseFloat(m8)+parseFloat(m9)+parseFloat(m11)+parseFloat(m12)+ parseFloat(m13)+parseFloat(m14);
 
 text= ma;  
    
   document.getElementById("masaA").innerHTML = text;  


        document.getElementById("masaA").value = ma.toFixed(2);



// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************


 
        m29 = document.getElementById("Talla").value;
        m210= document.getElementById("brazoR").value;
        m211= document.getElementById("Antebrazo").value;
        m212= document.getElementById("pecho").value;
        m213= document.getElementById("Muslo").value;
        m214= document.getElementById("Pantorrilla").value;
 
         




        
//pm = (m210-(((3.1416*m8)/10)+10));
pm = 3.1416*m8;
       

//pm = ((((((m10-(3,1416*m2/10))+m11+(m12-(3,1416*m3/10))+(m7-(3,1416*m13/10))+(m14-(3,1416*m8/10)))*(170,18/m9)-207,21)/13,74)*5,4)+24,5)/((170,18/m9)^3);

        document.getElementById("pesom").value = pm.toFixed(2);








    }

// ******************************************************************* bien  *******************************************************************
   /* 
 function calcularestructura()
    {


    }
*/
// ******************************************************************* bien  *******************************************************************
/*
     function calcularRelacion()
    {
    }

    */
/*
function calculargrasa()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        genero = document.getElementById("genero").value;

if (genero==M)

             ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))* 0,1051)+2,58;

        document.getElementById("grasapor").value = ge.toFixed(2);


  if (ge.toFixed(2) <= 10)

            interpretacion = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 11 &  ge.toFixed(2) <= 14)

            interpretacion = 'Bueno';
        else if
        (ge.toFixed(2) >= 15 & ge.toFixed(2) <=20)

            interpretacion = 'Aceptable';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <= 27)

            interpretacion = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 27)

            interpretacion = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion;



 else if

          ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*0,1548)+3,58;
	   
         document.getElementById("grasapor").value = ge.toFixed(2);


 if (ge.toFixed(2) <= 15)

            interpretacion1 = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 16 &  ge.toFixed(2) <= 20)

            interpretacion1 = 'Bueno';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <=26)

            interpretacion1 = 'Aceptable';
        else if
        (ge.toFixed(2) >= 27 & ge.toFixed(2) <= 33)

            interpretacion1 = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 34)

            interpretacion1 = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion1;


    }
*/


// ******************************************************************* bien  *******************************************************************

    function calcularpliegues()
    {







    }

// ******************************************************************* bien  *******************************************************************


    function calcularpesograso()
    {


        m1 = document.getElementById("grasapor").value;
        m2 = document.getElementById("PesoActual").value;
        m3 = document.getElementById("Talla").value;

        pg= (m1*m2)/100;

        document.getElementById("Graso").value = pg.toFixed(2);

/*
    }


// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************


    function calcularpesomagro()
    {

        p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;
*/


        pm = ((m1*m2)/100)+10;

        /*pma= p2-pm; */

        document.getElementById("Magro").value = pm.toFixed(2);

/*
    }


function calcularIAKS()
    {
*/






/*
        p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;
        
        pg= (p1*p2)/100;
*/





      //  m1 = document.getElementById("PesoActual").value;
        //m2 = document.getElementById("Graso").value;







// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************










        iaks= ((m1-pg)+1000000)/(m3*m3*m3);

        document.getElementById("IAKS").value = iaks.toFixed(2);


    }

/*
function calcularmasapiel()
    {

       m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

genero=document.getElementById("genero").value;

if (genero==M)


             mp= ((68,308* (m1^0,425)*(m2^0,725))/10000)*2,07*1,05;

        document.getElementById("masap").value = mp.toFixed(2);

 else if

          mp= ((73,704* (m1^0,425)*(m2^0,725))/10000)*1,96*1,05;

        document.getElementById("masap").value = mp.toFixed(2);


    } */








// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
// ******************************************      se unifico las dos funciones  ******************************************************
/*
 function calcularadiposa()
    {

 
          m2 = document.getElementById("riceps").value;
       m3 = document.getElementById("Subescapular").value;
      
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;

        
 ma= parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8);


//ma= m2*m3*m5*m6*m7*m8;


// ma = (((((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*(170,18/m9)-116,41)/34,79)*5,85)+25,6)/((170,18/m9)^3);

 text= ma;  
    
   document.getElementById("masaA").innerHTML = text;  


        document.getElementById("masaA").value = ma.toFixed(2);


    }
*/








/*





function calcularpliegues()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;
        m10= document.getElementById("brazoR").value;
        m11= document.getElementById("Antebrazo").value;
        m12= document.getElementById("pecho").value;
        m13= document.getElementById("Muslo").value;
        m14= document.getElementById("Pantorrilla").value;
        
pm = (3.1416*m2)/10;
       

//pm = ((((((m10-(3,1416*m2/10))+m11+(m12-(3,1416*m3/10))+(m7-(3,1416*m13/10))+(m14-(3,1416*m8/10)))*(170,18/m9)-207,21)/13,74)*5,4)+24,5)/((170,18/m9)^3);

        document.getElementById("pesom").value = pm.toFixed(2);


    }


*/
 




     </script>

