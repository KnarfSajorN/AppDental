<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['cliente'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];
if ($idHistoria == '') {
    $idHistoria = 0;
}
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $antecedentes     = $rowMotorizado['antecedentes'];
    $fotoperfil       = $rowMotorizado['fotoperfil'];
    $tiposSangre      = $rowMotorizado['tiposSangre'];
    $dis          = $rowMotorizado['dis'];
    $tipodiscapacidad      = $rowMotorizado['tipodiscapacidad'];
    $etnia            = $rowMotorizado['etnia'];
    $esDonante        = $rowMotorizado['esDonante'];
    $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

    $entidadSalud     = $rowMotorizado['entidadSalud'];
    $seguro           = $rowMotorizado['seguro'];

    $nota           = $rowMotorizado['nota'];
    $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
    $alergias           = $rowMotorizado['alergias'];


    $peso           = $rowMotorizado['peso'];
    $altura           = $rowMotorizado['altura'];
    $imc           = $rowMotorizado['imc'];
    $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];

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

$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$ID");


$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
$nrowl = mysqli_num_rows($queryList);

while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $idReceta    = $row_recordset32['idReceta'];
}

if ($queryList == '') {
    $idR == 1;
} else {
    $idR   = ($idReceta + 1);
}



?>


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Consulta médica, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?> </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Consulta médica </a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
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
                                                <?php echo datosPacientes($clienteId); ?>
                                            </div>
                                        </div>

                                        <form action="GO_Guardar_Evolucion_Ginecobstetrica" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                            <!--Div de  Imagenologia-->
                                            <div class=" box-group box-primary">
                                                <div class="box-group">
                                                    <!--<div class="panel box box-danger">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#imagen">
                                         Imagenologia
                                    </a>
                                </h4>
                            </div>
                            <div id="imagen" class="panel-collapse collapse">
                                <div class="box-body">



                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#estudio">
                                                    Estudio solicitado
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="estudio" class="panel-collapse collapse">
                                            <div class="box-body">


                                                <div class="row">
                                                    <div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">RX CONVENCIONAL                                                 

                                                        </h7 ><input type="checkbox"  name="anteCt1" value=":X" > 

                                                    </div>



                                                    <div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">TOMOGRAFIA                                                              

                                                        </h7 ><input type="checkbox"  name="anteCt2" value=":X" > 

                                                    </div><div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">RESONANCIA

                                                        </h7 ><input type="checkbox"  name="anteCt3" value=":X" > 

                                                    </div><div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">ECOGRAFÍA                                                                       

                                                        </h7 ><input type="checkbox"  name="anteCt4" value=":X" > 

                                                    </div><div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">PROCEDIMIENTO                           
                                                        </h7 ><input type="checkbox"  name="anteCt5" value=":X" > 

                                                    </div><div class="form-group col-md-2">

                                                        <h7 style="background: #A4A4A4">OTROS                           

                                                        </h7 ><input type="checkbox"  name="anteCt6" value=":X" > 

                                                    </div>

                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div align="left" style="background: #A4A4A4" > DESCRIPCION</div>



                                                    <div align="right">
                                                      <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                  </div>
                                                  <textarea id="enfermedadActual" name="estudio"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea> </div>



                                                  <div class="form-group col-md-6">


                                                    <h7 style="background: #A4A4A4">PUEDE MOVILIZARSE

                                                    </h7 ><input type="checkbox"  name="anteCt7" value=":X" > 

                                                </div>



                                                <div class="form-group col-md-6">

                                                    <h7 style="background: #A4A4A4">PUEDE RETIRARSE VENDAS, APOSITOS O YESOS
                                                        PARCIAL (TTP)
                                                    </h7 ><input type="checkbox"  name="anteCt8" value=":X" > 

                                                </div><div class="form-group col-md-6">

                                                    <h7 style="background: #A4A4A4">EL MEDICO ESTARA PRESENTE EN EL EXAMEN

                                                    </h7 ><input type="checkbox"  name="anteCt9" value=":X" > 

                                                </div><div class="form-group col-md-6">

                                                    <h7 style="background: #A4A4A4">TOMA DE RADIOLOGIA EN LA CAMA
                                                    </h7 ><input type="checkbox"  name="anteCt10" value=":X" > 

                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                    <div class="panel box box-danger">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#motivo">
                                                    Motivo solicitud
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="motivo" class="panel-collapse collapse">
                                            <div class="box-body">
                                                <b>REGISTRAR LAS RAZONES PARA SOLICITAR ACLARACION DE DIAGNOSTICO</b>



                                                <div class="form-group col-md-12">



                                                    <div align="right">
                                                        <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                    </div>


                                                    <textarea  id="motivoConsulta" name="motivosolicitud"  class="textarea" placeholder="Motivo solicitud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                                                </div>

                                            </div>

                                        </div> </div>

                                        <div class="panel box box-danger">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion1" href="#resumen">
                                                        Resumen clínico
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="resumen" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <div class="form-group col-md-12">



                                                        <div align="right">
                                                          <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                      </div>
                                                      <textarea id="notasadicionales" name="resumenclinico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



                                                  </div>
                                              </div> </div> </div>

                         </div>

                      </div>
                                            
                    
                    </div>  -->
                                                    <!---div de Endoscopias-->

                                                    <!-- <div class=" box-group box-primary">
                         <div class="box-group" >
                             
                          <div class="panel box box-danger">
                              <div class="box-header with-border">
                                  <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion1" href="#Endoscopias">
                                         Endoscopias
                                      </a>
                                  </h4>
                              </div>
                              <div id="Endoscopias" class="panel-collapse collapse">
                                  <div class="box-body">



                                      <div class="panel box box-success">
                                          <div class="box-header with-border">
                                              <h4 class="box-title">
                                                  <a data-toggle="collapse" data-parent="#accordion1" href="#estudio_1">
                                                      Estudio solicitado
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="estudio_1" class="panel-collapse collapse">
                                              <div class="box-body">


                                                  <div class="row">
                                                      <div class="form-group col-md-2">

                                                          <h7 style="background: #A4A4A4">ENDOSCOPIA ALTA                                                

                                                          </h7 ><input type="checkbox"  name="endoscopia_1" value=":X" > 

                                                      </div>



                                                      <div class="form-group col-md-2">

                                                          <h7 style="background: #A4A4A4">ANOSCOPIAS                                                              

                                                          </h7 ><input type="checkbox"  name="endoscopia_2" value=":X" > 

                                                      </div><div class="form-group col-md-2">

                                                          <h7 style="background: #A4A4A4">RECTOSIGMOIDEOSCOPIA

                                                          </h7 ><input type="checkbox"  name="endoscopia_3" value=":X" > 

                                                      </div><div class="form-group col-md-2">

                                                          <h7 style="background: #A4A4A4">COLONOSCOPIA                            
                                                          </h7 ><input type="checkbox"  name="endoscopia_4" value=":X" > 

                                                      </div><div class="form-group col-md-2">

                                                          <h7 style="background: #A4A4A4">OTROS                           

                                                          </h7 ><input type="checkbox"  name="endoscopia_5" value=":X" > 

                                                      </div>

                                                  </div>

                                                  <div class="form-group col-md-12">
                                                      <div align="left" style="background: #A4A4A4" > DESCRIPCION</div>



                                                      <div align="right">
                                                        <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                    </div>
                                                    <textarea id="endoscopia_otros" name="endoscopia_otros"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea> </div>



                                                    

                                              </div>


                                          </div>

                                      </div>

                                      <div class="panel box box-danger">
                                          <div class="box-header with-border">
                                              <h4 class="box-title">
                                                  <a data-toggle="collapse" data-parent="#accordion1" href="#motivo_1">
                                                      Motivo solicitud
                                                  </a>
                                              </h4>
                                          </div>
                                          <div id="motivo_1" class="panel-collapse collapse">
                                              <div class="box-body">
                                                  <b>REGISTRAR LAS RAZONES PARA SOLICITAR ACLARACION DE DIAGNOSTICO</b>



                                                  <div class="form-group col-md-12">



                                                      <div align="right">
                                                          <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                      </div>


                                                      <textarea  id="endoscopia_motivosolicitud" name="endoscopia_motivosolicitud"  class="textarea" placeholder="Motivo solicitud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                                                  </div>

                                              </div>

                                          </div> </div>

                                          <div class="panel box box-danger">
                                              <div class="box-header with-border">
                                                  <h4 class="box-title">
                                                      <a data-toggle="collapse" data-parent="#accordion1" href="#resumen_1">
                                                          Resumen clínico
                                                      </a>
                                                  </h4>
                                              </div>
                                              <div id="resumen_1" class="panel-collapse collapse">
                                                  <div class="box-body">
                                                      <div class="form-group col-md-12">



                                                          <div align="right">
                                                            <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                        </div>
                                                        <textarea id="-" name="endoscopia_resumenclinico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



                                                    </div>
                                                </div> </div> </div>

                                            </div> </div> </div>

                         </div>
                      </div>
                    </div>-->

                                                    <!--Div de  Epidemiologia-->

                                                    <!--<div class="panel box box-danger">
                                                                                                                            <div class="box-header with-border">
                                                                                                                                <h4 class="box-title">
                                                                                                                                    <a data-toggle="collapse" data-parent="#accordion1" href="#labo">
                                                                                                                                        Orden de laboratorio
                                                                                                                                    </a>
                                                                                                                                </h4>
                                                                                                                            </div>
                                                                                                                            <div id="labo" class="panel-collapse collapse">
                                                                                                                                <div class="box-body">

                                                                                                  
                                                <div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#encabezado">
                                                                                                                        Datos de encabezado
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="encabezado" class="panel-collapse collapse">
                                                                                                        <div class="box-body">

                                                                                                                                                                                                                                
<div class="form-group col-md-4">
<div align="left">      INSTITUCIÓN DEL SISTEMA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="INSTITUCION">

</div>

<div class="form-group col-md-4">
<div align="left">      ORDEN </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="ORDEN" name="ORDEN">

</div>


<div class="form-group col-md-4">
<div align="left">      HISTORIA CLINICA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="HISTORIA">

</div>
<div class="form-group col-md-12">
<div align="left">      LOCALIZACIÓN </div>
        <div class="form-group col-md-4">                                                                                                       
 <input type="text" class="form-control input-lg" id="temperatura" name="PARROQUIA" placeholder="Parroquía">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="CANTON" placeholder="Cantón">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="PROVINCIA" placeholder="Provincia">
</div>

</div>

<div class="form-group col-md-4">
<div align="left">      SERVICIO SOLICITADO </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="SERVICIO">

</div>

<div class="form-group col-md-4">
<div align="left">      SALA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="SALA">

</div>


<div class="form-group col-md-4">
<div align="left">      CAMA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="CAMA">

</div>

<div class="form-group col-md-4">
                        <div align="left">      PRIORIDAD</div>
                                                                                                                                                
  <select name="PRIORIDAD" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Urgente</option>
                <option>Normal</option>
                <option>Control</option>
                      </select>

</div>

<div class="form-group col-md-4">
<div align="left">      FECHA DE TOMA </div>
                                                                                                                
 <input type="date" class="form-control " id="temperatura" name="FTOMA">

</div>

                                                            </div>
                                                                                                                </div>
                                                                                                </div>
                                                                                        
                                                                                

                                                                                        <div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#labor">
                                                                                                                Laboratorios
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                        <div id="labor" class="panel-collapse collapse">
                                                                                            <div class="box-body">      

                                                                                                <div class="row"  style="background: #A4A4A4">
                                                                                                    <div class="form-group col-md-8" style="border:1">
                                                                                                        <div align="left"><b>   1.HEMATOLOGÍA </b> </div> 
                                                                                                    </div>  
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <div align="left"><b>   2. UROÁNALISIS </b> </div>
                                                                                                    </div>
                                                                                                </div>




                                                                                                <div class="form-group col-md-4">
                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>BIOMETRIA HEMATICA                                                          

                                                                                                        </h7><input type="checkbox"  name="ante1" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>



                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>SEDIMENTACION                                                                       

                                                                                                        </h7><input type="checkbox"  name="ante2" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>GRUPO SANGUÍNEO Y
                                                                                                            FACTOR RH                                                       

                                                                                                        </h7><input type="checkbox"  name="ante3" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>RETICULOCITOS                                                                       

                                                                                                        </h7><input type="checkbox"  name="ante4" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>HEMATOZOARIO                                
                                                                                                        </h7><input type="checkbox"  name="ante5" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>HCG-B CUANTITATIVA                                  

                                                                                                        </h7><input type="checkbox"  name="ante6" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>






                                                                                                </div>



                                                                                                <div class="form-group col-md-4">
                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>TIEMPO DE

                                                                                                            PROTROMBINA (TP)                                                

                                                                                                        </h7><input type="checkbox"  name="ante7" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>



                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>T. TROMBOPLASTINA

                                                                                                            PARCIAL (TTP)
                                                                                                        </h7><input type="checkbox"  name="ante8" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>COOMBS DIRECTO

                                                                                                        </h7><input type="checkbox"  name="ante9" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>COOMBS INDIRECTO
                                                                                                        </h7><input type="checkbox"  name="ante10" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>HEMOGLOBINA

                                                                                                            GLICOSILADA (HBA1C)             
                                                                                                        </h7><input type="checkbox"  name="ante11" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>



                                                                                                </div>




                                                                                                <div class="form-group col-md-4">
                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>ELEMENTAL Y MICROSCOPICO

                                                                                                        </h7><input type="checkbox"  name="ante12" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>



                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>PROTEINURIA 24 HORAS
                                                                                                        </h7><input type="checkbox"  name="ante13" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div><div class="form-group col-md-12">

                                                                                                        <h7>MICROALBUMINURIA

                                                                                                        </h7><input type="checkbox"  name="ante14" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>
                                                                                                    <div class="form-group col-md-12">

                                                                                                        <h7>UROCULTIVO
                                                                                                        </h7><input type="checkbox"  name="ante15" value=" <font color=red> <B> X</B></font>" > 

                                                                                                    </div>

                                                                                                </div>




                                                                                                <div class="row">
                                                                                                    <div class="form-group col-md-12" style="background: #A4A4A4">
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div align="left"><b>1 A MARCADORES TUMORALES </b> </div> 
                                                                                                        </div>  
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div align="left"><b>3.COPROLOGICO </b> </div>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div align="left"></div>
                                                                                                        </div>
                                                                                                    </div> </div>



                                                                                                    <div class="form-group col-md-4">
                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>AFP

                                                                                                            </h7><input type="checkbox"  name="ante16" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>



                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>CEA
                                                                                                            </h7><input type="checkbox"  name="ante17" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div><div class="form-group col-md-12">

                                                                                                            <h7>CA 19-9

                                                                                                            </h7><input type="checkbox"  name="ante18" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>
                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>CA 125
                                                                                                            </h7><input type="checkbox"  name="ante19" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <div class="form-group col-md-4">
                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>COPROPARASITORIO SIMPLE

                                                                                                            </h7><input type="checkbox"  name="ante20" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>



                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>SERIADO X 3
                                                                                                            </h7><input type="checkbox"  name="ante21" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div><div class="form-group col-md-12">

                                                                                                            <h7>SANGRE OCULTA

                                                                                                            </h7><input type="checkbox"  name="ante22" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>
                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>POLIMORFONUCLEARES
                                                                                                            </h7><input type="checkbox"  name="ante23" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>
                                                                                                        <div class="form-group col-md-12">

                                                                                                            <h7>ERRADICACION DE H. PYLORI
                                                                                                                (ANTIGENO)
                                                                                                            </h7><input type="checkbox"  name="ante24" value=" <font color=red> <B> X</B></font>" > 

                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="row">
                                                                                                        <div class="form-group col-md-12" style="background: #A4A4A4">
                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div align="left"><b>4 QUIMICA SANGUINEA</b> </div> 
                                                                                                            </div>  
                                                                                                            <div class="form-group col-md-8">
                                                                                                                <div align="left"> </div>
                                                                                                            </div>

                                                                                                        </div> </div>

                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>GLUCOSA EN AYUNAS

                                                                                                                </h7><input type="checkbox"  name="ante25" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>



                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>GLUCOSA POST PRANDIAL
                                                                                                                </h7><input type="checkbox"  name="ante26" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div><div class="form-group col-md-12">

                                                                                                                <h7>BUN (NITROGENO UREICO)

                                                                                                                </h7><input type="checkbox"  name="ante27" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>CREATININA
                                                                                                                </h7><input type="checkbox"  name="ante28" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>


                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>BILIRUBINA TOTAL
                                                                                                                </h7><input type="checkbox"  name="ante29" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>BILIRUBINA DIRECTA
                                                                                                                </h7><input type="checkbox"  name="ante30" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>ACIDO URICO
                                                                                                                </h7><input type="checkbox"  name="ante31" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>PROTEINA TOTAL
                                                                                                                </h7><input type="checkbox"  name="ante32" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                        </div>




                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>ALBUMINA

                                                                                                                </h7><input type="checkbox"  name="ante33" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>



                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>FERRITINA
                                                                                                                </h7><input type="checkbox"  name="ante34" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div><div class="form-group col-md-12">

                                                                                                                <h7>NA - K - CL

                                                                                                                </h7><input type="checkbox"  name="ante35" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>CA IONICO
                                                                                                                </h7><input type="checkbox"  name="ante36" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>


                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>TRANSAMINASA PIRUVICA
                                                                                                                </h7><input type="checkbox"  name="ante37" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>TRANSAMINASA OXALACETICA
                                                                                                                    (AST)
                                                                                                                </h7><input type="checkbox"  name="ante38" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>FOSFATASA ALCALINA
                                                                                                                </h7><input type="checkbox"  name="ante39" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>GAMA GLUTIL TRANSPEPTIDASA
                                                                                                                    (GGT)
                                                                                                                </h7><input type="checkbox"  name="ante40" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                        </div>



                                                                                                        <div class="form-group col-md-4">
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>COLESTEROL TOTAL

                                                                                                                </h7><input type="checkbox"  name="ante41" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>



                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>COLESTEROL HDL
                                                                                                                </h7><input type="checkbox"  name="ante42" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div><div class="form-group col-md-12">

                                                                                                                <h7>COLESTEROL LDL

                                                                                                                </h7><input type="checkbox"  name="ante43" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>TRIGLICERIDOS
                                                                                                                </h7><input type="checkbox"  name="ante44" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>


                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>AMILASA
                                                                                                                </h7><input type="checkbox"  name="ante45" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>LIPASA

                                                                                                                </h7><input type="checkbox"  name="ante46" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>
                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>LACTATO DESHIDROGENSA (LDH)
                                                                                                                </h7><input type="checkbox"  name="ante47" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                            <div class="form-group col-md-12">

                                                                                                                <h7>CITOMEGALOVIRUS IGM
                                                                                                                    (GGT)
                                                                                                                </h7><input type="checkbox"  name="ante48" value=" <font color=red> <B> X</B></font>" > 

                                                                                                            </div>

                                                                                                        </div>


                                                                                                        <div class="row">
                                                                                                            <div class="form-group col-md-12" style="background: #A4A4A4">
                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <div align="left"><b>5 SEROLOGÍA</b> </div> 
                                                                                                                </div>  
                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <div align="left"><b>6 BACTERIOLOGÍA </b></div>
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-4">
                                                                                                                    <div align="left"><b>7 OTROS </b></div>
                                                                                                                </div>

                                                                                                            </div> </div>


                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>VDRL

                                                                                                                    </h7><input type="checkbox"  name="ante49" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>HIV
                                                                                                                    </h7><input type="checkbox"  name="ante50" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div><div class="form-group col-md-12">

                                                                                                                    <h7>PCR SEMICUANTITATIVO

                                                                                                                    </h7><input type="checkbox"  name="ante51" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>PSA TOTAL / LIBRE
                                                                                                                    </h7><input type="checkbox"  name="ante52" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ANTICUERPOS
                                                                                                                        ANTINUCLEARES (ANA)
                                                                                                                    </h7><input type="checkbox"  name="ante53" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>

                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>AC. ANTIPEROXIDASA

                                                                                                                        (ANTI-TPO)

                                                                                                                    </h7><input type="checkbox"  name="ante54" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>HAV IGM
                                                                                                                    </h7><input type="checkbox"  name="ante55" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>




                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>LATEX
                                                                                                                    </h7><input type="checkbox"  name="LATEX" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>FACTOR REUMATODEO
                                                                                                                    </h7><input type="checkbox"  name="FACTOR" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>SEDIMENTACIÓN
                                                                                                                    </h7><input type="checkbox"  name="SEDI" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>PCR
                                                                                                                    </h7><input type="checkbox"  name="PCR" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ANTI CCP
                                                                                                                    </h7><input type="checkbox"  name="CCP" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>

                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ANA
                                                                                                                    </h7><input type="checkbox"  name="ANA" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ANTI DNA
                                                                                                                    </h7><input type="checkbox"  name="ANTI" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>

                                                                                                            </div>



                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>GRAM

                                                                                                                    </h7><input type="checkbox"  name="ante56" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ZIEHL
                                                                                                                    </h7><input type="checkbox"  name="ante57" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div><div class="form-group col-md-12">

                                                                                                                    <h7>KOH

                                                                                                                    </h7><input type="checkbox"  name="ante58" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>FRESCO
                                                                                                                    </h7><input type="checkbox"  name="ante59" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>CULTIVO
                                                                                                                    </h7><input type="checkbox"  name="ante60" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>

                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>ANTIBIOGRAMA
                                                                                                                        ANTINUCLEARES (ANA)
                                                                                                                    </h7><input type="checkbox"  name="ante60a" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>



                                                                                                            </div>



                                                                                                            <div class="form-group col-md-4">
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>TSH

                                                                                                                    </h7><input type="checkbox"  name="ante61" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>FT4
                                                                                                                    </h7><input type="checkbox"  name="ante62" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7>CORONAVIRUS PRUEBA RAPIDA

                                                                                                                    </h7><input type="checkbox"  name="ante63" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <h7> PRUEBA PCR DE CORONAVIRUS

                                                                                                                    </h7><input type="checkbox"  name="ante65" value=" <font color=red> <B> X</B></font>" > 

                                                                                                                </div>


                                                                                                                     <div class="form-group col-md-12">

                                                                                                                        <h7>PCR, VSG, RA TES ACIDO URICO BIOMETRIA
</h7><input type="checkbox"  name="ante64" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
</div> 
</div>



<div class="row">

    <div class="form-group col-md-12" style="background: #A4A4A4">
        <div align="left" ><b>8 HORMONAS </b></div>
    </div>

</div> 



<div class="form-group col-md-4">
    <div class="form-group col-md-12">

        <h7>FSH

        </h7><input type="checkbox"  name="ante65a" value=" <font color=red> <B> X</B></font>" > 

    </div>


    <div class="form-group col-md-12">

        <h7>LH
        </h7><input type="checkbox"  name="ante66" value=" <font color=red> <B> X</B></font>" > 

    </div><div class="form-group col-md-12">

        <h7>ATG ATPO

        </h7><input type="checkbox"  name="ante67" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>T3 LIBRE
        </h7><input type="checkbox"  name="ante68" value=" <font color=red> <B> X</B></font>" > 

    </div>








    <div class="form-group col-md-12">

        <h7>ESTRADIOL
        </h7><input type="checkbox"  name="ante68a" value=" <font color=red> <B> X</B></font>" > 

    </div>







    <div class="form-group col-md-12">

        <h7>HORMONA DE CRECIMIENTO

        </h7><input type="checkbox"  name="ante69" value=" <font color=red> <B> X</B></font>" > 

    </div>


    <div class="form-group col-md-12">

        <h7>PROLACTINA

        </h7><input type="checkbox"  name="ante70" value=" <font color=red> <B> X</B></font>" > 

    </div>


</div>




<div class="form-group col-md-4">
    <div class="form-group col-md-12">                                                                                                              



        <h7>PROCALCITONINA

        </h7><input type="checkbox"  name="ante72" value=" <font color=red> <B> X</B></font>" > 

    </div>


    <div class="form-group col-md-12">

        <h7>PROGESTERONA

        </h7><input type="checkbox"  name="ante73" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>DIMERO D

        </h7><input type="checkbox"  name="ante74" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>INTERLEUQUINA C

        </h7><input type="checkbox"  name="ante75" value=" <font color=red> <B> X</B></font>" > 

    </div>


    <div class="form-group col-md-12">

        <h7>INSULINA AYUNA Y POST PRANDRIAL

        </h7><input type="checkbox"  name="ante76" value=" <font color=red> <B> X</B></font>" > 

    </div>



    <div class="form-group col-md-12">

        <h7>FRUCTOSAMINA 

        </h7><input type="checkbox"  name="ante77" value=" <font color=red> <B> X</B></font>" > 

    </div>




    <div class="form-group col-md-12">

        <h7> PEPTIDO C

        </h7><input type="checkbox"  name="ante78" value=" <font color=red> <B> X</B></font>" > 

    </div>






</div> 

<div class="form-group col-md-4">






    <div class="form-group col-md-12">

        <h7>HBA1C

        </h7><input type="checkbox"  name="ante79" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">      



        <h7>CORTISOL

        </h7><input type="checkbox"  name="ante80" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>AM Y 4PM

        </h7><input type="checkbox"  name="ante81" value=" <font color=red> <B> X</B></font>" > 

    </div>          


    <div class="form-group col-md-12">

        <h7>DHEA

        </h7><input type="checkbox"  name="ante82" value=" <font color=red> <B> X</B></font>" > 

    </div>


    <div class="form-group col-md-12">

        <h7>DHEAS

        </h7><input type="checkbox"  name="ante83" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>ANDROSTENEDIONA

        </h7><input type="checkbox"  name="ante84" value=" <font color=red> <B> X</B></font>" > 

    </div>
    <div class="form-group col-md-12">

        <h7>ACTH

        </h7><input type="checkbox"  name="ante71" value=" <font color=red> <B> X</B></font>" > 

    </div>


</div> 





<div class="form-group col-md-6">


    <div class="form-group col-md-12">

        <h7>ATG DE TIROIDES

        </h7><input type="checkbox"  name="ante85" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">      



        <h7>INSULINA

        </h7><input type="checkbox"  name="ante86" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>ANTIGAD

        </h7><input type="checkbox"  name="ante87" value=" <font color=red> <B> X</B></font>" > 

    </div>          


    <div class="form-group col-md-12">

        <h7>ANTI ISLOTES PANCREATICOS

        </h7><input type="checkbox"  name="ante88" value=" <font color=red> <B> X</B></font>" > 

    </div>




</div>



<div class="form-group col-md-6">


    <div class="form-group col-md-12">

        <h7>ANTI IN SULINA DE DIABETES

        </h7><input type="checkbox"  name="ante89" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">      



        <h7>PROCALCITONINA

        </h7><input type="checkbox"  name="ante90" value=" <font color=red> <B> X</B></font>" > 

    </div>

    <div class="form-group col-md-12">

        <h7>INTERLEUQUINA DE COVID

        </h7><input type="checkbox"  name="ante91" value=" <font color=red> <B> X</B></font>" > 

    </div>          



</div> 














</div></div> -->





                                                    <div class="panel box box-primary">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">
                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteen">
                                                                    Nota de Evolución
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFiveteen" class="panel-collapse collapse">

                                                            <div class="box-body">

                                                                <div class="form-group col-md-12">
                                                                    <div align="left">Nota de Evolución</div>


                                                                    <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>



                                                    <div class="panel box box-primary">
                                                        <div class="box-header with-border">
                                                            <h4 class="box-title">
                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteen1">
                                                                    Medicamentos
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFiveteen1" class="panel-collapse collapse">

                                                            <div class="box-body">

                                                                <?php
                                                                $cliente_id = $clienteId;
                                                                $usuario_id = $_SESSION['ID'];
                                                                include 'RM_Receta.php'
                                                                ?>


                                                            </div>

                                                        </div>
                                                    </div>


                                                    <!--<div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseCITA">
                              Agendar Cita
                            </a>
                          </h4>
                        </div>
                        <div id="collapseCITA" class="panel-collapse collapse">

                          <div class="box-body">

                            <?php //include 'agendaCita_Include.php'; 
                            ?>

                          </div>

                        </div>
                      </div>-->


                                                    
                                                    <br>



                                                    <div class="col-md-12">
                                                        <h4 class="text-center">Cargar Archivos</h4>
                                                        <div class="form-group col-md-12">
                                                            <label>Nombre del Archivo</label>
                                                            <input type="text" class="form-control" id="NombreC" name="NombreC" placeholder="Descripcion">
                                                        </div>
                                                        <div class="col-md-12">

                                                            

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label">Archivos</label>
                                                                <div class="col-sm-12">
                                                                    <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!-- <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Cie10</label>
                                        </div>
      </div>

                                     Funcionando CIE10 
                                      <div class="form-group col-md-12">
                                        CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)

 <div class="col-md-12"> 





<div class="col-md-3">
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name1"   value="select1" >

</div>
                <div id="div-results1"  class="col-md-9">
                </div>
</div>



<div class="col-md-12"> 
<div class="col-md-3">
<br> 
<input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name2"   value="select2" >

</div>
                <div id="div-results2"  class="col-md-9">
                </div>
</div>

<div class="col-md-12"> 
<div class="col-md-3">
<br> 
<input type="text"  id="clienteId3"  onChange="verlista3();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name3"   value="select3" >

</div>
                <div id="div-results3"  class="col-md-9">
                </div>
</div>

<div class="col-md-12"> 
<div class="col-md-3">
<br> 
<input type="text"  id="clienteId4"  onChange="verlista4();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name4"   value="select4" >

</div>
                <div id="div-results4"  class="col-md-9">
                </div>
</div>-->



                                                    <!--<div class="form-row">
      

<div class="form-group col-md-12"> RECETA
<div align="left">  

  <label>Medicamento e indicaciones</label> </div>

              
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id ?>">
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione Medicamento</option>
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT * FROM  pos");


                    $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        $descripcion     = $row_recordset32['descripcion'];
                        $concentracion    = $row_recordset32['concentracion'];

                        $formafarmaceutica  = $row_recordset32['formafarmaceutica'];
                        $codigo  = $row_recordset32['codigo'];
                        $ID              = $row_recordset32['id'];

                        echo "<option value=' $codigo | $descripcion | $formafarmaceutica' > $descripcion | $concentracion | $formafarmaceutica </option>";
                    }

                    ?>

                  <input type="text" name="codigoProd1" id="codigoProd1" class="form-control input-lg"> 
 
                </select>

              </div>

 

<div class="col-md-6">
                                                  <div class="form-group">
                                                  <label>Cantidad</label><br>
                                                  <input type="number" name="cantidad" id="cantidad" class="form-control input-lg dosis" placeholder="obligatorio**"  > 
                                                </div>
                                                
</div>

                                             <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Dosis</label><br>
                                                  <input type="number" name="dosis" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> 

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Presentación</label>
                                                  <select class="form-control input-lg posologia" name="posologia" id="posologia" >
                                                     <option value=" "> </option>
                          <option value="Miligramos">Miligramos </option
                            <option value="Milimetros">Milimetros</option>
                            <option value="Microgramos">Microgramos</option>
                            <option value="Gramos">Gramos</option>
                            <option value="Milimetros">CC</option>
                            <option value="Unidad">Unidad</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Frasco">Frasco</option>
                            <option value="Onza">Onza</option> 
                            <option value="Tabletas">Tabletas</option>
                            <option value="Ampollas">Ampollas</option>
                            <option value="Capsulas">Cápsulas</option>
                            <option value="Comprimidos">Comprimidos</option>
                            <option value="Crema">Crema</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Ovulos">Ovulos</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Tubo">Tubo</option>
                            <option value="Gotas">Gotas</option>
                            <option value="Loción crema">Loción crema</option>
                            <option value="Aceite">Aceite</option>
                            <option value="Supositorio">Supositorio</option>
                            <option value="Frasco">Frasco</option>
                            
                            
                          </select>
                                                </div>  
                                             </div> 
                                           <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Indicaciones</label><br>
                                                  <textarea type="text" class="form-control nota" name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMNETO"> </textarea>
                                                </div></div>




                                                </div>
                                            

                                            
 
               
 
              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID'] ?>">
              <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId ?>">
              <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idR ?>">
              <input type="hidden" name="idHistoriaCliente" id="idHistoriaCliente" value="<?php echo $historiaClinica ?>">
              
            <input type="hidden" name="nomedicamento" value="<?php echo $descripcion ?>">

           
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
 
            
             <div class="form-group col-md-2">
                  <br>
                   
<a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>

   

<a href="#"  onclick="limpiar();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Limpiar </strong>  </font> </a>
    <input type="button" onclick="limpiarFormulario()" value="Limpiar formulario">

               
              </div>
<script type="text/javascript">
    $(document).ready(function() 
    {
      $('#limpiar').click(function() {
        $('.dosis').val('');
        $('.posologia').val('');
        $('.frecuencia').val('');
        $('.administracion').val('');
        $('.dosisdia').val('');
        $('.dias').val('');
        $('.via').val('');
        $('.total').val('');
        $('.nota').val('');
        $('.nota2').val('');
         
      });
    });
    </script>

            <br>

                <div class="form-group col-md-12" id="div-results"></div>
                <br>
                <br>


               
          </form>
               

<div class="form-group col-md-12">
                <div align="left">Notas Adicionales </div>


                <div align="right">
                  <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="notasadicionales" name="notasadicionales"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>-->


                                                    <hr>


                                                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                                                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                                                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                                                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                                                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                                                    <input type="hidden" name="receta" value="<?php echo $idR ?>">
                                                    <input type="hidden" name="idHistoria" value="<?php echo $idHistoria ?>">
                                                    <input type="hidden" name="historiaClinica" value="<?php echo $historiaClinica ?>">
                                                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                                                    <div align="center">
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <div class="col-sm-12">
                                                            <br>
                                                            <br>
                                                            <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                                    <h2> <strong> G u a r d a r </strong> </h2>
                                                                </button></center>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="tipo_cliente" valur="1">
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


<?php include("footer.php") ?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="apiVoz.js"></script>

<script type="text/javascript">
    function calculardosis() {
        m1 = document.getElementById("frecuencia").value;
        m2 = document.getElementById("administracion").value;
        m3 = document.getElementById("dias").value;

        if (m2 == "Horas") {


            r = 24 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Minutos") {


            r = 1440 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Dias") {


            r = 1 / m1;



            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Semana") {

            a = 7 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Mes") {

            a = 30 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Ano") {

            a = 365 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Unica") {



            r = "&uacutenica Dosis";


            document.getElementById("dosisdia").value = r;


        }

        rt = r * m3;
        document.getElementById("total").value = rt;


    }










    function agergarItem() {
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

        var dosis = $("#dosis").val();
        var posologia = $("#posologia").val();
        var frecuencia = $("#frecuencia").val();
        var administracion = $("#administracion").val();
        var dosisdia = $("#dosisdia").val();
        var dias = $("#dias").val();
        var via = $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("#nota2").val();
        var cantidad = $("#cantidad").val();

        var id_historia = $("#idHistoriaCliente").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {
                codigoProd: codigoProd,
                dosis: dosis,
                posologia: posologia,
                frecuencia: frecuencia,
                administracion: administracion,
                dosisdia: dosisdia,
                dias: dias,
                via: via,
                total: total,
                nota: nota,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta,
                codigoProd1: codigoProd1,
                nota2: nota2,
                cantidad: cantidad,
                id_historia: id_historia
            },
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



    <?php

    for ($i = 1; $i <= 10; $i++) {
    ?>

        function eliminarItem<?php echo $i ?>() {
            // estas son las variables que enviamos
            var idOper = $("#idOper<?php echo $i ?>").val();
            var usuario_id = $("#usuario_id").val();
            var idcliente = $("#idcliente").val();
            var idReceta = $("#idReceta").val();

            // aqui enviamos el mensaje por medio de un arreglo     
            $.ajax({
                type: "POST",
                url: "eliminarItemRecetario.php",
                data: {
                    idOper: idOper,
                    usuario_id: usuario_id,
                    idcliente: idcliente,
                    idReceta: idReceta
                },
                success: function(response) {
                    $('#div-results').html(response);
                    // aqui enviamos el mensaje por medio de un arreglo               
                }
            });
        };



    <?
    }


    ?>

    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo     

            }
        });
    };
    window.onload = listaItem;








    function verlista() {

        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results1').html(response);

            }
        });
    };




    function verlista2() {

        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results2').html(response);

            }
        });
    };

    function verlista3() {

        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results3').html(response);

            }
        });
    };

    function verlista4() {

        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results4').html(response);

            }
        });
    };



    function calcularimc() {



        m1 = document.getElementById("peso").value;
        m2 = document.getElementById("altura").value;

        r = m1 / ((m2 / 100) * (m2 / 100));



        document.getElementById("imc").value = r.toFixed(2);


        if (r.toFixed(2) < 16)

            ComposicionCorporal = 'Infrapeso: Delgadez Severa';
        else if (r.toFixed(2) > 16 & r.toFixed(2) < 16.99)

            ComposicionCorporal = 'Infrapeso: Delgadez moderada';
        else if (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

            ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
        else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

            ComposicionCorporal = 'Peso Normal';

        else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

            ComposicionCorporal = 'Sobrepeso';

        else if (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

            ComposicionCorporal = 'Obeso: Tipo I';

        else if (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

            ComposicionCorporal = 'Obeso: Tipo II';

        else if (r.toFixed(2) > 40.00)

            ComposicionCorporal = 'Obeso: Tipo III';




        document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
    }

    function calcularprematuriedad() {
        try {
            var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
            var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
            document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
        } catch (e) {}
    }

    function calcularEdadCorregida() {
        try {
            var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
            var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
            document.formularioActualizarcliente.edadCorregida.value = b - a;
        } catch (e) {}
    }
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';
?>