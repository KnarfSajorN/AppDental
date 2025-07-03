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


 
        ?>


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quiropráctica, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Quiropráctica  </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">


      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <!--<div class="col-md-12">
              <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option>Consulta externa</option>
                <option>Urgencia</option>
                <option>Ambulatorio </option>
              </select>-->

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
                    <form action="GO_GuardarQuiropractica.php" method="POST" name="formularioActualizarcliente" id="FormularioHistoriaClinica">
                        <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
         



















                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                       Razón(es) Primaria (as) Para Buscar Consulta Quiropráctica
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                         
<div class="row">
              <div class="form-group col-md-12">
              <div align="left">  Razón Primaria (Malestar Principal) </div>
                <input type="text" class="form-control input-lg" id="razon_primaria" name="razon_primaria"  placeholder=" Razón primaria (malestar principal)" >
              </div> 

              <div class="form-group col-md-12">
              <div align="left">  Razón Secundaria   </div>
                <input type="text" class="form-control input-lg" id="razon_secundaria" name="razon_secundaria" placeholder="Razón Secundaria" >
              </div>
              </div> 
                     </div>
                  </div>
                </div>






                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                       Malestar Principal
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                     
                         
<div class="row">
              <div class="form-group col-md-6">
              <div align="left">  Localización del Malestar  </div>
                <input type="text" class="form-control input-lg" id="localizacion" name="localizacion"  placeholder=" Localización del Malestar " >
              </div> 

              <div class="form-group col-md-6">
              <div align="left">¿Cómo y Cuándo Comienza el Malestar?    </div>
                <input type="text" class="form-control input-lg" id="malestar" name="malestar" placeholder="¿Cómo y Cuándo Comienza el Malestar?" >
              </div> 


                <div class="col-md-6">
                      <label> Seleccionar la Calidad del Dolor/Queja  </label>
                      <select id="calidad" name="calidad" class="form-control select2" style="width: 100%;">
                      <option value="Débil" selected="selected">Débil</option>
                      <option value="Doloroso" >Doloroso  </option>
                      <option value="Punsante">Punsante </option>
                      <option value="Disparado" >Disparado </option>
                      <option value="Quemante" >Quemante </option>
                      <option value="Palpitante" >Palpitante </option>
                      <option value="Profundo" >Profundo </option>
                      <option value="Molesto" >Molesto </option>
                       
                        
                      </select>

                    </div>          


              <div class="form-group col-md-6">
              <div align="left">La Queja/Dolor se Irradia o Viaja a Otra Area de su Cuerpo?, ¿Cúal Área?     </div>
                <input type="text" class="form-control input-lg" id="area" name="area" placeholder="La Queja/Dolor se Irradia o Viaja a Otra Area de su Cuerpo?, ¿Cúal Área?" >
              </div> 

 

              <div class="form-group col-md-6">
              <div align="left">¿Tiene Algún Entumecimiento en su Cuerpo?, ¿Donde?</div>
                <input type="text" class="form-control input-lg" id="entumecimiento" name="entumecimiento" placeholder="¿Tiene Algún Entumecimiento en su Cuerpo?, ¿Donde?" >
              </div> 

 
                  <div class="col-md-6">
                      <label> Grado de la Intensidad/Severidad del Dolor, de 0 (Ninguna Queja/Dolor) Hasta 10 (El Peor Dolor/Queja Imaginable) </label>
                      <select id="intensidas" name="intensidad" class="form-control select2" style="width: 100%;" required="required">
                      <option value="1" selected="selected"> 1</option>
                      <option value="2" >2  </option>
                      <option value="3">3 </option>
                      <option value="4" >4 </option>
                      <option value="5" >5 </option>
                      <option value="6" >6 </option>
                      <option value="7" >7 </option>
                      <option value="8" >8 </option>
                      <option value="8" >8 </option>
                      <option value="9" >9 </option>
                      <option value="10" >10 </option>
                       
                        
                      </select>

                  </div>



              <div class="form-group col-md-6">
              <div align="left">¿Con que Frecuencia Siente el Dolor?, ¿Cuánto Duró la Última vez que Ocurrió?</div>
                <input type="text" class="form-control input-lg" id="frecuencia" name="frecuencia" placeholder="¿Con que Frecuencia Siente el Dolor?, ¿Cuánto Duró la Última vez que Ocurrió?" >
              </div> 

 

              <div class="form-group col-md-6">
              <div align="left">¿Algo Agrava el Malestar?  </div>
                <input type="text" class="form-control input-lg" id="agrada_malestar" name="agrada_malestar" placeholder="¿Algo Agrava el Malestar?" >
              </div> 

            </div>






                     
                     </div>
                  </div>
                </div>













                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      Intervenciones Previas
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                     
                         

<div class="form-group col-md-12">
<div align="left"> Intervenciones previas, Tratamientos, Medicaciones, Cirugías u Otros Xuidados que Usted Haya Buscado Para su Malestar
</div>
 <textarea id="nota" name="nota"  class="textarea"   style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
</div> 
 






                     
                     </div>
                  </div>
                </div>












  




                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                      Evaluación Funcional 
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">
<div class="row">
                    <div class="col-md-4">
                      <label> Intensidad de Dolor </label>
                      <select id="intensidad_dolor" name="intensidad_dolor" class="form-control select2" style="width: 100%;">
                      <option value="0-Ningun dolor" selected="selected">0-Ningun dolor </option>
                      <option value="1-Dolor ligero" >1-Dolor ligero </option>
                      <option value="2- Dolor moderado" >2- Dolor moderado </option>
                      <option value="3-Dolor severo" >3-Dolor severo </option>
                      <option value="4-El peor dolor posible" >4-El peor dolor posible </option>
                        
                      </select>

                    </div>
                     
                    <div class="col-md-4">
                      <label> Sueño </label>
                      <select id="sueno" name="sueno" class="form-control select2" style="width: 100%;">
                      <option value="0-Sueño perfecto" selected="selected"> 0-Sueño perfecto </option>
                      <option value="1-Disturbios ligeros"> 1-Disturbios ligeros </option>
                      <option value="2-Disturbio moderado"> 2-Disturbio moderado </option>
                      <option value="3-Gran disturbio">3-Gran disturbio  </option>
                      <option value="4-Sueño totalmente disturbado"> 4-Sueño totalmente disturbado </option>
                   
                      
                        
                      </select>

                    </div>
                     

                      
                    <div class="col-md-4">
                      <label>  Cuidados Personales (Baños, Vestimenta, etc.)  </label>
                      <select id="cuidados" name="cuidados" class="form-control select2" style="width: 100%;">
                      <option value=" 0-Ningún dolor, ninguna restricción" selected="selected">  0-Ningún dolor, ninguna restricción  </option>
                      <option value="1-Dolor ligero ninguna restricción"> 1- Dolor ligero ninguna restricción</option>
                      <option value="2-Dolor moderado en grandres recorridos"> 2-Dolor moderado en grandres recorridos </option>
                      <option value="3- Dolor moderado en rrecorridos cortos">3- Dolor moderado en rrecorridos cortos  </option>
                      <option value="4-Dolor severo en recorridos cortos">4-Dolor severo en recorridos cortos </option>
                      
                        
                      </select>

                    </div>
                     

                    
                      
                    <div class="col-md-4">
                      <label>  Desplazamiento (Conducción, etc.)  </label>
                      <select id="desplazamiento" name="desplazamiento" class="form-control select2" style="width: 100%;">
                      <option value="0-Ningún dolor en grandes rrecorridos" selected="selected">0-Ningún dolor en grandes rrecorridos </option>
                      <option value=" 1-Dolor ligero en grandes rrecorridos"> 1-Dolor ligero en grandes rrecorridos </option>
                      <option value=" 2-Dolor moderado en grandres recorridos"> 2-Dolor moderado en grandres recorridos </option>
                      <option value=" 3- Dolor moderado en rrecorridos cortos">  3- Dolor moderado en rrecorridos cortos </option>
                      <option value=" 4-Dolor severo en recorridos cortos"> 4-Dolor severo en recorridos cortos  </option>
                       
                        
                      </select>

                    </div>
                     

                    

                    
                      
                    <div class="col-md-4">
                      <label> Trabajo </label>
                      <select id="trabajo" name="trabajo" class="form-control select2" style="width: 100%;">
                      <option value="0-Usual + Extra" selected="selected">0-Usual + Extra  </option>
                      <option value="1-Usual , Ningún Extra  ">  1-Usual , Ningún Extra  </option>
                       <option value="2-50% del usual">2-50% del usual  </option>
                      <option value="3-25% del usual"> 3-25% del usual </option>
                      <option value="4- No puede trabajar"> 4- No puede trabajar </option>
                     
                        
                      </select>

                    </div>
                     

                
                      
                    <div class="col-md-4">
                      <label>  Recreación </label>
                      <select id="recreacion" name="recreacion" class="form-control select2" style="width: 100%;" >
                      <option value="0- Todas las actividades   " selected="selected">0- Todas las actividades     </option>
                      <option value="1-Muchas actividades"> 1-Muchas actividades </option>
                       <option value="2-Algunas actividades">2-Algunas actividades  </option>
                      <option value="3-Pocas actividades"> 3-Pocas actividades </option>
                      <option value="4-Ninguna actividad">4-Ninguna actividad  </option>
                      
                      </select>

                    </div>
                     

                    
                      
                    <div class="col-md-4">
                      <label>  Frecuencia del Dolor </label>
                      <select id="frecuencia_dolor" name="frecuencia_dolor" class="form-control select2" style="width: 100%;">
                      <option value="0-Ningún dolor" selected="selected"> 0-Ningún dolor </option>
                      <option value="1-Ocasional (25%)"> 1-Ocasional (25%) </option>
                       <option value="2-Intermitente (50%)">2-Intermitente (50%)  </option>
                      <option value="3-Frecuente (75%)">  3-Frecuente (75%)</option>
                      <option value="4-Constante (100%)">4-Constante (100%)  </option>
                      
                        
                      </select>

                    </div>
                     

                    


                     
                      
                    <div class="col-md-4">
                      <label> Levantamiento</label>
                      <select id="levantamiento" name="levantamiento" class="form-control select2" style="width: 100%;">
                      <option value=" 0- Ningún dolor con gran peso" selected="selected"> 0- Ningún dolor con gran peso </option>
                      <option value=" 1-Dolor incrementado con gran peso"> 1-Dolor incrementado con gran peso </option>
                       <option value="2-Dolor incrementado con peso moderado"> 2-Dolor incrementado con peso moderado </option>
                      <option value=" 3- Dolor incrementado con peso ligero">  3- Dolor incrementado con peso ligero  </option>
                      <option value="  4- Dolor incrementado con cualquier peso">  4- Dolor incrementado con cualquier peso </option>
                      
                      </select>

                    </div>
                     

                    




                    
                      
                    <div class="col-md-4">
                      <label> Caminata</label>
                      <select id="caminata" name="caminata" class="form-control select2" style="width: 100%;">
                      <option value=" 0-Ningún dolor con cualquier distancia" selected="selected"> 0-Ningún dolor con cualquier distancia  </option>
                      <option value=" 1-Incrementa el dolor después de una milla"> 1-Incrementa el dolor después de una milla </option>
                       <option value=" 2- Incrementa el dolor después de media milla"> 2- Incrementa el dolor después de media milla </option>
                      <option value="3-Dolor incrementado después de 1/4 de milla">3-Dolor incrementado después de 1/4 de milla  </option>
                      <option value=" 4- Dolor incrementado en cualquier distancia">  4- Dolor incrementado en cualquier distancia  </option>
                      
                      </select>

                    </div>
                     
 
 


                    
                      
                    <div class="col-md-4">
                      <label> Actitud de Pie</label>
                      <select id="actitud" name="actitud" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Ningún dolor en cualquier momento" selected="selected">0-Ningún dolor en cualquier momento  </option>
                      <option value="1-Dolor incrementado después de unas horas">1-Dolor incrementado después de unas horas  </option>
                       <option value="2-Dolor incrementado después de una hora">2-Dolor incrementado después de una hora  </option>
                      <option value="3-Dolor incrementado después de 1/2 hora"> 3-Dolor incrementado después de 1/2 hora </option>
                      <option value="4-Inmediato incremento del dolor">  4-Inmediato incremento del dolor</option>
                      
                        
                      </select>

                    </div>
                     


                    <div class="col-md-4">
                      <label> Total   
                        <input type="text" class="form-control input-lg" name="total"></label>
                      
                    </div>
                   
                    <div class="col-md-4">
                      
                      <label> Índice de evaluación funcional    
                        <input type="text" class="form-control input-lg" name="indice"></label>
                    </div>

                  </div>
                     

  
                    </div>
                  </div>
                </div>

                <input  type="checkbox" style="margin:10px" required>Ya terminé


              </div>
            </div>
            <!-- /.box-body -->


                          <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                          <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                          <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                          <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                          <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                          <input  type="hidden" name="receta"  value="<?php echo $idR?>">
                          <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">

                          <div align="center" class="col-md-12">
                            <br>
                            <br>
                            <br>
                            <div class="col-md-12">
                              <br>
                              <br>
                              <center class="col-md-12"><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>

                            </div>
                          </div>

                          <input type="hidden"  name="tipo_cliente"   valur="1">
                        </div>

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
 var duracion= $("#duracion").val();
 var metodo= $("#metodo").val();
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
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia,duracion:duracion,metodo:metodo, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2,cantidad:cantidad},
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#duracion').val('');
                $('#metodo').val('');
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






</script>
 
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
?>