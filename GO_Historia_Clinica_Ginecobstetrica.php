<?php
include 'header.php';
include 'menu.php';

?>

<script type="text/javascript">
  function mostrar(id) {
    if (id == "servicio1") {
      $("#servicio1").show();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();
    }

    if (id == "servicio2") {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();

    }

    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();

    }

    if (id == "servicio4") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").hide();

    }

    if (id == "servicio5") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();
      $("#servicio7").hide();

    }

    if (id == "servicio6") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();
      $("#servicio7").hide();

    }

    if (id == "servicio7") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
      $("#servicio7").show();

    }
  }
</script>

<?php

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$ID = $_SESSION['ID'];
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


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

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
  $nombre_cliente = $row_recordset32['nombre_cliente'];
  $fechaNacimiento = $row_recordset32['fechaNacimiento'];
}



?>
<style type="text/css">
  input[type=radio]:focus,
  input[type=checkbox]:focus {
    outline: none;
  }

    /* estilos arreglo para antecedentes personales */
    .nav-tabs>li {
    float: left;
    margin-bottom: -1px;
  }
  .nav>li {
    position: relative;
    display: block;
  }

  ul.nav.nav-tabs.fancyTabs{
    display:block
  }
  .nav{
    flex-wrap: nowrap;
  }
  
</style>
<style>

</style>

<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="js/jquery.min-3.2.1.js"></script>
<script src='js/select2.min-4.0.3.js'></script>

<link rel="stylesheet" href="apiVoz.css">

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta médica, Paciente: <?php echo $nombre_cliente . ', Edad: ' . CalculoEdadPaciente($fechaNacimiento); ?> </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta médica </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">


              <div class="box box-solid">
                <!-- /.box-header -->
                <!-- <div class="box-body">
                  <div class="box-group" id="accordion2">
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion2" href="#collapseEstadoIngreso">
                            Estado Ingreso del Paciente
                          </a>
                        </h4>
                      </div>
                      <div id="collapseEstadoIngreso" class="panel-collapse collapse">
                        <div class="col-md-12">
                          <div class="form-group"></div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group"></div>
                          <div class="row">
                            <div class="col-12 col-md-3"></div>
                            <div class="col-12 col-md-6" id="div-Ingresos"></div>
                            <div class="col-12 col-md-3"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <form action="GO_Guardar_Historia_Ginecobstetrica" method="POST" id="FormularioHistoriaClinica">
                  <div class="box-body">

                    <!-- cambiar el estilo del menu desplegable id=accordion , class=panel panel-default, class=panel-heading class=panel-title-->
                    <div class="box-group" id="accordion1">
                      <!-- lista -->
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
                      <!--cierre de lista-->

                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                              Información del acompañante o acudiente
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">

                          <div class="box-body row">

                            <div class="col-md-6">
                              <label>Nombre</label>
                              <input type="text" name="InformacionAcudiente[Nombre Acudiente]" class="form-control">
                            </div>

                            <div class="col-md-6">
                              <label>Parentesco</label>
                              <select class="form-control" name="InformacionAcudiente[Parentesco Acudiente]" class="form-control input-lg">
                                <option value="" selected>Seleccione</option>
                                <option value="Hijos">Hijos</option>
                                <option value="Hermanos">Hermanos</option>
                                <option value="Madre">Madre</option>
                                <option value="Padre">Padre</option>
                                <option value="Tio">Tio</option>
                                <option value="Primo">Primo</option>
                                <option value="Familiar en segundo grado">Familiar en segundo grado</option>
                                <option value="Colega">Colega</option>
                                <option value="Nieto">Nieto</option>
                                <option value="Abuelo">Abuelo</option>
                                <option value="Amigo">Amigo</option>
                                <option value="Primo">Primo</option>
                                <option value="Cónyuge">Cónyuge</option>
                                <option value="Padres">Padres</option>
                                <option value="Otro">Otro</option>
                                <option value="No aplica">No aplica</option>
                                <option value="Ninguno">Ninguno</option>
                              </select>
                            </div>

                            <div class="col-md-6">
                              <label>Teléfono</label>
                              <input type="text" name="InformacionAcudiente[Telefono Acudiente]" class="form-control">
                            </div>

                            <div class="col-md-6">
                              <label>Medico o Institución que remite</label>
                              <input type="text" name="InformacionAcudiente[Medico que remite]" class="form-control">
                            </div>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->





                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
                              Enfermedad actual
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">

                          <div class="box-body row">

                            <div class="col-md-6">
                              <label>Tipo de Consulta</label>
                              <select name="EnfermedadActual[Tipo de Consulta]" class="form-control select2" style="width: 100%;">
                                <option selected="selected" value="">Seleccione tipo de consulta</option>
                                <option>Primera vez</option>
                                <option>Control</option>
                                <option>Otro</option>
                              </select>
                            </div>

                            <div class="col-md-6">
                              <label>Nombre de la consulta</label>
                              <input type="text" name="EnfermedadActual[Nombre de la Consulta]" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                              <label>Motivo consulta</label>
                              <textarea name="EnfermedadActual[Motivo de Consulta]" class="ejemplo" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                              <label> Enfermedad actual</label>
                              <textarea name="EnfermedadActual[Enfermedad Actual]" class="ejemplo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                            </div>


                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->


                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">
                              Antecedentes
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">

                          <br>
                          <!-- esta es la barra del menu-->
                          <div class="tab">
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Personales')">Personales</button>
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Ginecobstetricos')">Gineco-Obstétrico</button>
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Familiares')">Familiares</button>
                          </div>
                          <!-- barra de menu final -->

                          <div id="Personales" class="tabcontent">
                            <h3>Antecedentes Personales</h3><br>

                            <!-- esta es la barra del menu-->

                            <div class="tab" style="display: flex;overflow: auto;">
                              <?php
                              /*

                              //Variables globales
                              $arreglo_editar=[];
                              $arreglo_antecedentes=[];

                              function antecedentes() 
                              {
                                include 'funciones/conn3.php';
                                $QueryAntecedentes=mysqli_query($conn3,"SELECT * FROM  ConfigAntecedentes");
                                while($rowAntecedentes=mysqli_fetch_array($QueryAntecedentes))
                                {
                                  global $arreglo_editar,$arreglo_antecedentes;
                                  $id=$rowAntecedentes['id'];
                                  $Titulo = str_replace(" ", "_", $rowAntecedentes['Nombre']);
                                  //para el editar arreglo
                                  $arreglo_editar[$id] = json_decode($rowAntecedentes['Arreglo']);

                                  //para crear los check
                                  $nombre = $rowAntecedentes['Nombre'];
                                  $arreglo_check[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
                                ?>
                                 <button type="button" class="tablinks1" onclick="MenuAntecedentes_Personales(event, <?php echo "'div_".$Titulo."'";?>)"><?php echo $rowAntecedentes['Nombre']?>
                                  <a data-toggle="modal" data-target="#modalForm1" onclick="EditarAntecedentes(<?php echo $id;?>);" title="Editar Antecedentes"><i class="fa fa-pencil"></i></a>
                                 </button>
                                <?php
                                }
                                ?>

                                <button type="button" class="" onclick="">
                                  <a data-toggle="modal" data-target="#modalForm_add_personales" onclick="" title="Agregar Antecedentes"><i class="fa fa-plus" style="color:white;"></i></a>
                                 </button>

                                <?php
                                //para crear los check
                                $arreglo_antecedentes = json_encode($arreglo_check);

                              }

                              antecedentes();*/
                              ?>
                            </div>
                            <!-- barra de menu final -->


                            <div class="tab_antecedentes">
                              <button type="button" style="position: relative;left: 48.3%;top: 25px;background-color: #d69b9b;">
                                <a data-toggle="modal" data-target="#modalForm_add_personales" onclick="" title="Agregar Antecedentes"><i class="fa fa-plus" style="color:white;"></i></a>
                              </button>
                              <section id="fancyTabWidget" class="tabs t-tabs">
                                <ul class="nav nav-tabs fancyTabs" role="tablist" style="display: flex;overflow-y: hidden;">

                                  <?php

                                  //Variables globales
                                  $arreglo_editar = [];
                                  $arreglo_antecedentes = [];

                                  function antecedentes()
                                  {
                                    include 'funciones/conn3.php';
                                    $QueryAntecedentes = mysqli_query($conn3, "SELECT * FROM  ConfigAntecedentes where activo='1'");
                                    while ($rowAntecedentes = mysqli_fetch_array($QueryAntecedentes)) {
                                      $contador++;
                                      global $arreglo_editar, $arreglo_antecedentes;
                                      $id = $rowAntecedentes['id'];
                                      $Titulo = str_replace(" ", "_", $rowAntecedentes['Nombre']);
                                      //para el editar arreglo
                                      $arreglo_editar[$id] = json_decode($rowAntecedentes['Arreglo']);
                                      //para crear los check
                                      $nombre = $rowAntecedentes['Nombre'];
                                      $arreglo_check[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
                                      if ($contador == "1") {
                                        $GLOBALS["inicial"] = "div_" . $Titulo;
                                      }
                                  ?>

                                      <li class="fancyTab tablinks1" style="min-width: 130px;left: 1px;" onclick="MenuAntecedentes_Personales(event, <?php echo "'div_" . $Titulo . "'"; ?>)" <?php if ($contador == "1") {
                                                                                                                                                                                                echo 'id="principal_antecedentes"';
                                                                                                                                                                                              } ?>>
                                        <div class="arrow-down">
                                          <div class="arrow-down-inner"></div>
                                        </div>

                                        <div style="display: contents"><a data-toggle="modal" data-target="#modalForm1" onclick="EditarAntecedentes(<?php echo $id; ?>);" title="Editar Antecedentes"><i class="fa fa-pencil" style="font-size: 15px;position: absolute;left: 100px;top: 0px;width: 20%;"></i></a>
                                        </div>

                                        <span class="fa fa-heart" onclick="this.className='fa fa-heart animate__animated animate__heartBeat animate__repeat-3';"></span><span><?php echo $nombre ?></span>
                                        <div class="whiteBlock"></div>
                                      </li>

                                  <?php
                                    }
                                    //para crear los check
                                    $arreglo_antecedentes = json_encode($arreglo_check);
                                  };
                                  antecedentes();
                                  ?>

                                </ul>
                                <div id="TabDinamica" class="fancyTabContent">
                                  <!-- aqui el contenido se llena por javascript-->
                                </div>
                              </section>
                            </div>





                          </div>
                          <!-- final div personales -->


                          <!-- div ginecobstetricos -->
                          <div id="Ginecobstetricos" class="tabcontent">
                            <div class="row">
                              <div class="col-md-12">
                                <h3>Antecedentes Gineco-Obstétrico</h3>
                              </div>

                              <div class="col-md-6">
                                <label>Ciclo mestrual</label>
                                <select name="AntecentesGinecobstetricos[Ciclo mestrual]" class="form-control input-lg">
                                  <option value="" selected>Seleccione</option>
                                  <option>Regular </option>
                                  <option>Irregular</option>
                                  <option>No Aplica</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label>Numero de dias</label>
                                <input type="text" name="AntecentesGinecobstetricos[Numero de dias]" class="form-control input-lg">
                              </div>

                              <div class="col-md-12">
                                <h3>Embarazo actual </h3>
                              </div>

                              <div class="col-md-4">
                                <label>FUM </label>
                                <input type="date" name="AntecentesGinecobstetricos[FUM]" id="fechaParto" class="form-control input-lg" onChange="CalcularEdadGestacional();">
                              </div>


                              <div class="form-group col-md-4">
                              <div align="left">Edad Gestacional</div>
                               <input type="text" class="form-control input-lg" id="EdadGestional" name="AntecentesGinecobstetricos[Edad Gestacional]">
                                </div>

                              <div class="form-group col-md-4">
                                <div align="left">Fecha Probable del Parto</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Fecha Probable del Parto]" id="fechaProbableParto">
                              </div>
                             

                              <div class="col-md-4">
                                <label>Vida Sexual Activa</label>
                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Vida Sexual Activa]" value=":  X">
                              </div>

                              <div class="col-md-4">
                                <label>Planificación Familiar</label>
                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Planificación Familiar]" value=":  X">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Método</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Método]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Gestaciones</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Gestaciones]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Partos</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Partos]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Cesáreas</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Cesáreas]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Abortos</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Abortos]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Hijos con Malformación</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Hijos con Malformación]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Hijos vivos</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Hijos vivos]">
                              </div>


                              <div class="form-group col-md-4">
                                <div align="left">Hijos muertos</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Hijos muertos]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Embarazos ectópicos</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Embarazos ectópicos]">
                              </div>


                              <div class="form-group col-md-4">
                                <div align="left">Edad Menarca</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Edad Menarca]">
                              </div>

                              <div class="form-group col-md-6">
                                <div align="left">Edad Menopausia</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Edad Menopausia]">
                              </div>

                              <div class="form-group col-md-6">
                                <div align="left">Dmo</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Dmo]">
                              </div>

                              <div class="form-group col-md-4">

                                <h7>Última Citologia

                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Última Citologia]" value=":  X">

                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Última Citologia(Tiempo)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Última Citologia(Tiempo)]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Última Citologia(Resultado)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Última Citologia(Resultado)]">
                              </div>

                              <div class="form-group col-md-4">

                                <h7>Eco Mamario

                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Eco Mamario]" value=":  X">

                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Eco Mamario(Tiempo)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Eco Mamario(Tiempo)]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Eco Mamario(Resultado)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Eco Mamario(Resultado)]">
                              </div>

                              <div class="form-group col-md-4">

                                <h7>Eco pélvico

                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Eco pélvico]" value=":  X">

                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Eco pélvico(Tiempo)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Eco pélvico(Tiempo)]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Eco pélvico(Resultado)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Eco pélvico(Resultado)]">
                              </div>


                              <div class="form-group col-md-4">

                                <h7>Colposcopia

                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Colposcopia]" value=":  X">

                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Colposcopia(Tiempo)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Colposcopia(Tiempo)]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Colposcopia(Resultado)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Colposcopia(Resultado)]">
                              </div>

                              <div class="form-group col-md-4">

                                <h7>Mamografía

                                </h7><input type="checkbox" name="AntecentesGinecobstetricos[Mamografía]" value=":  X">

                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Mamografía(Tiempo)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Mamografía(Tiempo)]">
                              </div>

                              <div class="form-group col-md-4">
                                <div align="left">Mamografía(Resultado)</div>
                                <input type="text" class="form-control input-lg" name="AntecentesGinecobstetricos[Mamografía(Mamografía(Resultado)]">
                              </div>

                              <div class="col-md-12">
                              <textarea name="AntecentesGinecobstetricos[Observación]" class="textarea" placeholder="Observación" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                              </div>

                            </div>
                          </div>
                          <!-- final div ginecobstetricos -->



                          <!--  div familiares -->
                          <div id="Familiares" class="tabcontent">
                            <div class="row">

                              <div class="col-md-8">
                                <h3>Antecedentes Familiares</h3>
                              </div>
                              <div class="col-md-4">
                                <br>
                                <button type="button" onclick="AgregarFamiliar_Inicial();"> Agregar Familiar </button>
                                <input type="hidden" id="cantidad_AgregarFamiliar" value="0">

                              </div>



                              <style type="text/css">
                                .textarea_noflex {
                                  overflow: scroll;
                                  resize: none;
                                }
                              </style>
                              <div class="table-responsive col-md-12" style="overflow: auto;">
                                <br><br>
                                <table id="example3" class="table table-bordered table-striped" style="width: 100%;">
                                  <thead>
                                    <tr>
                                      <th style="width:15%">Parentesco</th>
                                      <th style="width:10%">Fecha Diagnostico</th>
                                      <th style="width:20%">CIE-10</th>
                                      <th style="width:25%">Diagnostico</th>
                                      <th style="width:28%">Comentarios</th>
                                      <th style="width:2%">Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbody_antecedentesfamiliares">
                                    <script type="text/javascript">
                                      function AgregarFamiliar() {
                                        var tableBody = document.getElementById('tbody_antecedentesfamiliares');
                                        var cantidad = document.getElementById('cantidad_AgregarFamiliar').value;
                                        cantidad++;
                                        for (var i = 0; i < cantidad; i++) {
                                          var tbodys = document.querySelectorAll("#tbody_antecedentesfamiliares > tr");
                                          var trs = tbodys.length;

                                          if ((!document.getElementById("AnteFamiliar_1" + i)) && (!document.getElementById("AnteFamiliar_2" + i)) && (!document.getElementById("AnteFamiliar_3" + i)) && (!document.getElementById("AnteFamiliar_4" + i)) && (!document.getElementById("AnteFamiliar_5" + i)) && (!document.getElementById("AnteFamiliar_6" + i)) && (trs <= cantidad)) {

                                            var tr = document.createElement('tr');
                                            tr.setAttribute("id", "tr_antecedentesfamiliares" + i);

                                            tableBody.appendChild(tr);

                                            var Dato = {};

                                            Dato[0] = '<input type="text" name="AntecedentesFamiliares[' + i + '][Parentesco]" id="AnteFamiliar_1' + i + '" class="form-control input-lg" style="width:100%;">';
                                            Dato[1] = '<input type="date" name="AntecedentesFamiliares[' + i + '][Fecha Diagnostico]" id="AnteFamiliar_2' + i + '" class="form-control input-lg" style="width:100%;">';
                                            Dato[2] = '<select name="AntecedentesFamiliares[' + i + '][CIE-10][]" id="AnteFamiliar_3' + i + '" onclick="BuscarCie10(' + i + ');" style="width:100%" multiple><option value=" ">Seleccione... </option>';
                                            Dato[3] = '<textarea name="AntecedentesFamiliares[' + i + '][Diagnostico]" id="AnteFamiliar_4' + i + '" class="textarea_noflex form-control input-lg" style="width:100%;"></textarea>';
                                            Dato[4] = '<textarea name="AntecedentesFamiliares[' + i + '][Comentarios]" id="AnteFamiliar_5' + i + '" class="textarea_noflex form-control input-lg" style="width:100%;"></textarea>';
                                            Dato[5] = '<a href="#"  style="font-size: 20px;" id="AnteFamiliar_6' + i + '"  onclick="EliminarFamiliar(' + i + ');"><i class="fas fa-trash-alt"></i></a>';

                                            for (var j = 0; j < 6; j++) {
                                              var td = document.createElement('td');
                                              td.setAttribute("style", "text-align: center;vertical-align: middle;");
                                              td.innerHTML = (Dato[j]);
                                              tr.appendChild(td);
                                            }

                                            BuscarCie10(i);
                                          }
                                        }
                                        document.getElementById('cantidad_AgregarFamiliar').value = cantidad;

                                        return "hecho";
                                      }

                                      function EliminarFamiliar(valor) {
                                        document.getElementById("tr_antecedentesfamiliares" + valor).remove();
                                        document.getElementById('cantidad_AgregarFamiliar').value = (document.getElementById('cantidad_AgregarFamiliar').value - 1);
                                      }
                                    </script>

                                  </tbody>

                                </table>

                                <script type="text/javascript">
                                  function BuscarCie10(valor) {


                                    $("#AnteFamiliar_3" + valor).select2({
                                      ajax: {
                                        url: "Ajax_cie10.php",
                                        type: "post",
                                        dataType: 'json',
                                        delay: 250,
                                        data: function(params) {
                                          return {
                                            searchTerm: params.term // search term
                                          };
                                        },
                                        processResults: function(response) {
                                          return {
                                            results: response
                                          };
                                        },
                                        cache: true
                                      }
                                    });

                                  }
                                </script>
                                <script type="text/javascript">
                                  function AgregarFamiliar_Inicial() {

                                    var selects = document.getElementById('cantidad_AgregarFamiliar').value;
                                    $.when(AgregarFamiliar()).then(BuscarCie10(selects));

                                  }
                                </script>

                              </div>
                            </div>

                          </div>
                          <!-- final div familiares -->


                          <br><br>
                        </div>
                      </div>
                      <!--cierre de lista-->






                      <!-- lista -->
                      <!--<div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">
                              Revision por sistemas
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">

                          <br>
                           esta es la barra del menu
                          <button type="button" style="position: relative;left: 47.9%;top: -1px;background-color: #3c8dbc;">
                            <a data-toggle="modal" data-target="#modalForm_add_revision_sistemas" onclick="" title="Agregar Antecedentes"><i class="fa fa-plus" style="color:white;"></i></a>
                          </button>

                          <div style="float:left;display:none" id="prev_nav"><i class="glyphicon glyphicon-chevron-left"></i></div>
                          <div style="float:right;display:none" id="next_nav"><i class="glyphicon glyphicon-chevron-right"></i></div>
                          <div class="tab" id="tab" style="display: flex;overflow: hidden;">
                            <ul class="nav nav-tabs" role="tablist" style="display: flex;overflow: auto;">
                              <style type="text/css">
                                .nav-tabs::-webkit-scrollbar {
                                  height: 6px;
                                  /* Tamaño del scroll en horizontal */
                                }

                                .nav-tabs::-webkit-scrollbar-thumb {
                                  background-color: #00000080;
                                  border-radius: 20px;
                                }
                              </style>
                              <?php

                              $arreglo_editar_revision = [];
                              $arreglo_revision = [];
                              function revision()
                              {
                                include 'funciones/conn3.php';
                                $QueryAntecedentes = mysqli_query($conn3, "SELECT * FROM  ConfigRevisionSistemas");
                                while ($rowAntecedentes = mysqli_fetch_array($QueryAntecedentes)) {
                                  global $arreglo_editar_revision, $arreglo_revision;
                                  $id = $rowAntecedentes['id'];
                                  $Titulo = str_replace(" ", "_", $rowAntecedentes['Nombre']);
                                  //para el editar arreglo
                                  $arreglo_editar_revision[$id] = json_decode($rowAntecedentes['Arreglo']);

                                  //para crear los check
                                  $nombre = $rowAntecedentes['Nombre'];
                                  $arreglo_check[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
                              ?>
                                  <button type="button" class="tablinks2" onclick="MenuRevision(event, <?php echo "'div_" . $Titulo . "'"; ?>)"><?php echo $rowAntecedentes['Nombre'] ?>
                                    <a data-toggle="modal" data-target="#modalForm2" onclick="EditarRevision(<?php echo $id; ?>);" title="Editar Antecedentes"><i class="fa fa-pencil"></i></a>
                                  </button>
                              <?php
                                }

                                //para crear los check
                                $arreglo_revision = json_encode($arreglo_check);
                              }

                              revision();
                              ?>
                            </ul>
                          </div>
                           barra de menu final 

                          <div id="TabDinamica_revision">
                           aqui el contenido se llena por javascript-
                          </div>

                          <br><br>
                        </div>

                      </div>-->
                      <!--cierre de lista-->






                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSix">
                              Signos vitales y medidas antropométricas
                            </a>
                          </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                          <?php
                          $queryList = mysqli_query($conn3, "SELECT * FROM SignosVitalesYAntropometria where cliente_id= '$clienteId' ");
                          while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $Peso = $rowMotorizado['Peso_Corporal'];
                            $Altura = $rowMotorizado['Altura'];
                            $IMC = $rowMotorizado['IMC'];
                            $Perimetro_Cefalico = $rowMotorizado['Perimetro_Cefalico'];
                            $Frecuencia_Respiratoria = $rowMotorizado['Frecuencia_Respiratoria'];
                            $Frecuencia_Cardiaca = $rowMotorizado['Frecuencia_Cardiaca'];
                            $Presion_Arterial_Diastolica = $rowMotorizado['Presion_Arterial_Diastolica'];
                            $Presion_Arterial_Sistolica = $rowMotorizado['Presion_Arterial_Sistolica'];
                            $Temperatura_Corporal = $rowMotorizado['Temperatura_Corporal'];
                            $Saturacion_Oxigeno = $rowMotorizado['Saturacion_Oxigeno'];
                            $Porcentaje_Grasa_Corporal = $rowMotorizado['Porcentaje_Grasa_Corporal'];
                            $Circunferencia_Cintura = $rowMotorizado['Circunferencia_Cintura'];
                            $Circunferencia_Abdominal = $rowMotorizado['Circunferencia_Abdominal'];
                            $Tension_Arterial_Media = $rowMotorizado['Tension_Arterial_Media'];
                          }
                          ?>
                          <div class="box-body row">


                            <div class="col-md-4">
                              <label>Fecha medición</label>
                              <input type="date" name="SignosVitales[Fecha Medición]" class="form-control input-lg">
                            </div>

                            <div class="col-md-4">
                              <label>Temperatura ºC</label>
                              <input type="number" name="SignosVitales[Temperatura ºC]" class="form-control input-lg" step="0.01">
                              <!-- <input type="number" name="SignosVitales[Temperatura Corporal]" class="form-control input-lg" step="0.01" value=""> -->
                            </div>

                            <div class="col-md-4">
                              <label>Presión Alterial (mmhg)</label>
                              <input type="text" name="SignosVitales[Presión Alterial (mmhg)]" class="form-control input-lg" value="">
                              <!-- <input type="number" name="SignosVitales[Presion Arterial Diastolica]" class="form-control input-lg" step="0.01" value=""> -->
                            </div>

                            <div class="col-md-4">
                              <label>Pulso</label>
                              <input type="number" name="SignosVitales[Pulso]" class="form-control input-lg" step="0.01" value="">
                              <!-- <input type="number" name="SignosVitales[Presion Arterial Sistolica]" class="form-control input-lg" step="0.01" value=""> -->
                            </div>

                            <div class="col-md-4">
                              <label>Peso Corporal [Kg]</label>
                              <input type="number" name="SignosVitales[Peso Corporal]" id="KG_peso" class="form-control input-lg" onchange="IMC();" step="any">
                              <!-- <input type="number" name="SignosVitales[Peso Corporal]" id="KG_peso" class="form-control input-lg" onchange="IMC();" step="0.01" value=""> -->

                            </div>
                            <div class="col-md-4">
                              <label>Altura [cm]</label>
                              <input type="number" name="SignosVitales[Altura]" id="CM_altura" class="form-control input-lg" onchange="IMC();" step="any">
                              <!-- <input type="number" name="SignosVitales[Altura]" id="CM_altura" class="form-control input-lg" onchange="IMC();" step="0.01" value=""> -->
                            </div>
                            <div class="col-md-4">
                              <label>IMC</label>
                              <input type="number" name="SignosVitales[IMC]" id="IMC_Paciente" class="form-control input-lg" step="any">
                              <!-- <input type="number" name="SignosVitales[IMC]" id="IMC_Paciente" class="form-control input-lg" step="0.01" value=""> -->
                            </div>
                            <script>
                              function IMC() {
                                m1 = document.getElementById("KG_peso").value;
                                m2 = document.getElementById("CM_altura").value;

                                r = m1 / ((m2 / 100) * (m2 / 100));
                                document.getElementById("IMC_Paciente").value = r.toFixed(2);
                              }
                            </script>

                            <!--<div class="col-md-4">
                              <label>Fecha medición</label>
                              <input type="number" name="SignosVitales[Fecha Medición]" class="form-control input-lg">
                            </div>-->
                            <div class="col-md-4">
                              <label>Frecuencia Respiratoria</label>
                              <input type="number" name="SignosVitales[Frecuencia Respiratoria]" class="form-control input-lg" step="0.01">
                              <!-- <input type="number" name="SignosVitales[Frecuencia Respiratoria]" class="form-control input-lg" step="0.01" value=""> -->
                            </div>
                            <!--<div class="col-md-4">
                              <label>Frecuencia Cardíaca</label>
                              <input type="number" name="SignosVitales[Frecuencia Cardiaca]" class="form-control input-lg" step="0.01" value="<?php echo $Frecuencia_Cardiaca; ?>">
                               <input type="number" name="SignosVitales[Frecuencia Cardiaca]" class="form-control input-lg" step="0.01" value=""> 
                            </div>-->
                            <!--<div class="col-md-4">
                              <label>Presión Alterial (mmhg)</label>
                              <input type="number" name="SignosVitales[Presion Arterial Diastolica]" class="form-control input-lg" step="0.01" value="<?php echo $Presion_Arterial_Diastolica; ?>">
                             <input type="number" name="SignosVitales[Presion Arterial Diastolica]" class="form-control input-lg" step="0.01" value=""> 
                            </div>-->

                            <!--<div class="col-md-4">
                              <label>Pulso</label>
                              <input type="number" name="SignosVitales[Presion Arterial Sistolica]" class="form-control input-lg" step="0.01" value="<?php echo $Presion_Arterial_Sistolica; ?>">
                             <input type="number" name="SignosVitales[Presion Arterial Sistolica]" class="form-control input-lg" step="0.01" value=""> 
                            </div>-->
                            <!--<div class="col-md-4">
                              <label>Temperatura ºC</label>
                              <input type="number" name="SignosVitales[Temperatura Corporal]" class="form-control input-lg" step="0.01" value="<?php echo $Temperatura_Corporal; ?>">
                              
                            </div>-->
                            <!--<div class="col-md-4">
                              <label>Frecuencia Respiratoria</label>
                              <input type="number" name="SignosVitales[Frecuencia Respiratoria]" class="form-control input-lg" step="0.01">
                              
                            </div>-->

                            <!--<div class="col-md-4">
                              <label>Porcentaje de Grasa Corporal [%]</label>
                              <input type="number" name="SignosVitales[Porcentaje de Grasa Corporal]" class="form-control input-lg" step="0.01" value="<?php echo $Porcentaje_Grasa_Corporal; ?>">
                              
                            </div>
                            <div class="col-md-4">
                              <label>Circunferencia Abdominal [cm]</label>
                              <input type="number" name="SignosVitales[Circunferencia Abdominal]" class="form-control input-lg" step="0.01" value="<?php echo $Circunferencia_Abdominal; ?>">
                              <input type="number" name="SignosVitales[Circunferencia Abdominal]" class="form-control input-lg" step="0.01" value=""> 
                            </div>
                            <div class="col-md-4">
                              <label>Circunferencia de Cintura [cm]</label>
                              <input type="number" name="SignosVitales[Circunferencia de Cintura]" class="form-control input-lg" step="0.01" value="<?php echo $Circunferencia_Cintura; ?>">
                              <input type="number" name="SignosVitales[Circunferencia de Cintura]" class="form-control input-lg" step="0.01" value=""> 
                            </div>

                            <div class="col-md-4">
                              <label>Tension Arterial Media</label>
                              <input type="number" name="SignosVitales[Tension Arterial Media]" class="form-control input-lg" step="0.01" value="<?php echo $Tension_Arterial_Media; ?>">
                              <input type="number" name="SignosVitales[Tension Arterial Media]" class="form-control input-lg" step="0.01" value="">
                            </div>-->


                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->





                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSeven">
                              Paraclínicos
                            </a>
                          </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-4">
                              <button type="button" style="display: initial;" data-target="#modalForm3" data-toggle="modal" title="Agregar Paraclinico"><i class="fa fa-plus"> Agregar Paraclínico</i>
                              </button>
                            </div>
                            <div class="col-md-8">&nbsp;</div>

                            <input type="hidden" id="Arreglo_Paraclinicos" name="Arreglo_Paraclinicos" value='{"0":{"Fecha":null}}'>


                            <div class="table-responsive col-md-12" style="overflow: auto;">
                              <br><br>
                              <table id="tabla_paraclinicos" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th style="width:15%">Fecha</th>
                                    <th style="width:10%">Tipo Paraclínico</th>
                                    <th style="width:20%">Valor</th>
                                    <th style="width:25%">Unidades</th>
                                    <th style="width:28%">Clasificación</th>
                                    <th style="width:2%">Comentarios</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>

                                </tfoot>
                              </table>

                              <script type="text/javascript">
                                function tabla_paraclinicos() {

                                  var data = JSON.parse(document.getElementById("Arreglo_Paraclinicos").value);
                                  var arreglo = [];
                                  var contador = "0";

                                  for (index in data) {
                                    var arreglotemporal = {};
                                    arreglotemporal["Fecha"] = data[index].Fecha;
                                    arreglotemporal["Tipo"] = data[index].Tipo;
                                    arreglotemporal["Valor"] = data[index].Valor;
                                    arreglotemporal["Unidades"] = data[index].Unidades;
                                    arreglotemporal["Clasificacion"] = data[index].Clasificacion;
                                    arreglotemporal["Comentarios"] = data[index].Comentarios;

                                    arreglo = arreglo.concat(arreglotemporal);
                                    contador++;
                                  }

                                  let pos = 1;

                                  let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

                                  $("#tabla_paraclinicos").dataTable().fnDestroy()

                                  $('#tabla_paraclinicos').DataTable({
                                    data: arreglo_final,
                                    columns: [{
                                        data: "Fecha"
                                      },
                                      {
                                        data: "Tipo"
                                      },
                                      {
                                        data: "Valor"
                                      },
                                      {
                                        data: "Unidades"
                                      },
                                      {
                                        data: "Clasificacion"
                                      },
                                      {
                                        data: "Comentarios"
                                      },
                                    ]
                                  });


                                }
                              </script>

                            </div>
                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->





                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseEight">
                              Exámenes y Laboratorios
                            </a>
                          </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">

                          <div class="box-body">
                            <label>Seleccione Examen de Imagenología</label>
                            <select id="imagenologia_examen" name="Imagenologia_Examen[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                              <?php
                              $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='1' order by id");
                              $nrowl = mysqli_num_rows($queryList);
                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                $id      = $row_recordset32['id'];
                                $Nombre      = $row_recordset32['Nombre'];
                                echo "<option value='$id'>$Nombre</option>";
                              }
                              ?>
                            </select>

                            <label>Seleccione Examen de Laboratorio</label>
                            <select id="laboratorio_examenes" name="Laboratorio_Examenes[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <?php
                              $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='2' order by id");
                              $nrowl = mysqli_num_rows($queryList);
                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                $id      = $row_recordset32['id'];
                                $Nombre      = $row_recordset32['Nombre'];
                                echo "<option value='$id'>$Nombre</option>";
                              }
                              ?>
                            </select>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->






                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseNine">
                              Examen Físico
                            </a>
                          </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse">

                          <div class="box-body" id="div_examen_fisico">

                            <div class="row">
                              <div class="col-md-12">
                                <div class="panel-group" role="tablist" aria-multiselectable="true" id="ModuloExamenFisico">



                                  <script type="text/javascript">
                                    function CargarModuloExamenFisico() {
                                      var Arreglo = [];
                                      var ArregloId = [];
                                      <?php
                                      $queryList = mysqli_query($conn3, "SELECT Nombre,Plantilla,id FROM  ConfigExamenFisico where activo='1'");
                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Nombre = $rowMotorizado['Nombre'];
                                        $id = $rowMotorizado['id'];
                                        $Plantilla = $rowMotorizado['Plantilla'];

                                        // es un arreglo para el modulo de editar
                                        $arreglo_examenfisico[$id]['Nombre'] = $Nombre;
                                        $arreglo_examenfisico[$id]['Plantilla'] = $Plantilla;

                                      ?>
                                        Arreglo.push(["<?php echo $Nombre ?>"]);
                                        ArregloId.push(["<?php echo $id ?>"]);
                                      <?php
                                      }

                                      ?>

                                      var contador = "1";
                                      var text = '';
                                      for (index in Arreglo) {

                                        text += '<div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><a role="button" data-toggle="collapse"  href="#ExamenFisico' + contador + '" aria-expanded="true" aria-controls="ExamenFisico' + contador + '">' + Arreglo[index] + '</a></h4></div>';

                                        text += '<div id="ExamenFisico' + contador + '" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"><div class="row"><div class="col-md-12"><button type="button" data-toggle="modal" data-target="#modalForm_examen_fisico" onclick="EditarExamenFisico(' + ArregloId[index] + ')" title="Editar Examen Fisico" style="float: right;background-color:#3c8dbc;"><i class="fa fa-pencil" style=""></i></button></div><div class="col-md-4"><br>';

                                        text += '<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico[' + Arreglo[index] + '][]" value="No Evaluado" checked />No Evaluado</label>';
                                        text += '<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico[' + Arreglo[index] + '][]" value="Normal" />Normal</label>';
                                        text += '<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico[' + Arreglo[index] + '][]" value="Anormal" />Anormal</label><br></div>';

                                        text += '<div class="col-md-8"><br><textarea name="ExamenFisico[' + Arreglo[index] + '][]"  id="ExamenFisicoTextArea' + ArregloId[index] + '" class="form-control input-lg" placeholder="Hallazgos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea><a onclick="Plantilla_ExamenFisico(' + ArregloId[index] + ')" title="Mostrar Plantilla" style="float: right;top: -150px;left: 30px;position: relative;"><i class="iconify" data-icon="ri:file-paper-2-line"></i></button></div></div>';

                                        text += '</div>';

                                        contador++;
                                      }
                                      document.getElementById("ModuloExamenFisico").innerHTML = text;
                                    }

                                    function Plantilla_ExamenFisico(valor) {
                                      let editar = <?php echo json_encode($arreglo_examenfisico) ?>;
                                      console.log(editar);
                                      console.log(editar[valor]['Plantilla']);
                                      document.getElementById("ExamenFisicoTextArea" + valor).value = editar[valor]['Plantilla'];
                                    }
                                    CargarModuloExamenFisico();
                                  </script>


                                  <div class="col-md-12"><button type="button" data-toggle="modal" data-target="#modalForm_agregar_examen_fisico" title="Agregar Examen Fisico" style="float: right;background-color:#3c8dbc;"><i class="fa fa-plus" style=""></i>Agregar Mas Examenes Fisicos</button></div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                      <!--cierre de lista-->

                      <!-- lista -->

                      <!--
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFifty">
                              Escala de Tanner
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFifty" class="panel-collapse collapse">

                          <div class="box-body">
                            <div class="col-md-12">
                              <?php
                              $queryGenero = mysqli_query($conn3, "SELECT * from cliente where cliente_id = '$clienteId'");
                              $fetchGenero = mysqli_fetch_array($queryGenero);
                              $VALGENERO = $fetchGenero['genero'];

                              $optiongen1 = "";
                              $optiongen2 = "";
                              if ($VALGENERO == "M" || $VALGENERO == "M") {
                                $optiongen2 = "style='display:none;'";
                              } else if ($VALGENERO == "F" || $VALGENERO == "F") {
                                $optiongen1 = "style='display:none;'";
                              } else {
                                $optiongen1 = "";
                                $optiongen2 = "";
                              }
                              ?>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th colspan="2">Escala de Tanner</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th <?= $optiongen2 ?>>Niñas</th>
                                    <th <?= $optiongen1 ?>>Niños</th>
                                  </tr>
                                  <tr>
                                    <td <?= $optiongen1 ?>>
                                      <div> <input type="radio" value="1" name="niño2">
                                        <img src="img/EscalaTanner/nino1.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 1</b>. Sin vello púbico, Testículos y Pene infantil. </p>
                                      </div>
                                    </td>
                                    <td <?= $optiongen2 ?>>
                                      <div>
                                        <input type="radio" value="1" name="niña2">
                                        <img src="img/EscalaTanner/nina1.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 1</b>. Pecho infantil, no vello púbico.</p>
                                      </div>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td <?= $optiongen1 ?>>
                                      <div>
                                        <input type="radio" value="2" name="niño2">
                                        <img src="img/EscalaTanner/nino2.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 2</b>. Aumento del escroto y testículos, piel del escroto enrojecida y arrugada, pene infantil vello púbico escaso en la base del pene.</p>
                                      </div>
                                    </td>
                                    <td <?= $optiongen2 ?>>
                                      <div>
                                        <input type="radio" value="2" name="niña2">
                                        <img src="img/EscalaTanner/nina2.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 2</b>. Botón mamario, vello púbico no rizado escaso, en labios mayores.</p>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td <?= $optiongen1 ?>>
                                      <div>
                                        <input type="radio" value="3" name="niño2">
                                        <img src="img/EscalaTanner/nino3.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 3</b>. Alargamiento y engrosamiento del pene. Aumento de testículos y escroto. Vello sobre pubis rizado, grueso y oscuro.</p>
                                      </div>
                                    </td>
                                    <td <?= $optiongen2 ?>>
                                      <div>
                                        <input type="radio" value="3" name="niña2">
                                        <img src="img/EscalaTanner/nina3.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 3</b>. Aumento y elevación de pecho y areola. Vello rizado, basto y oscuro sobre pubis.</p>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td <?= $optiongen1 ?>>
                                      <div>
                                        <input type="radio" value="4" name="niño2">
                                        <img src="img/EscalaTanner/nino4.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 4</b>. Ensanchamiento del pene y del glande, aumento de testículos, aumento y oscurecimiento del escroto. Vello púbico adulto que no cubre los muslos.</p>
                                      </div>
                                    </td>
                                    <td <?= $optiongen2 ?>>
                                      <div>
                                        <input type="radio" value="4" name="niña2">
                                        <img src="img/EscalaTanner/nina4.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 4</b>. Areola y pezón sobreelevado sobre mama. Vello púbico tipo adulto no sobre muslos.</p>
                                      </div>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td <?= $optiongen1 ?>>
                                      <div>
                                        <input type="radio" value="5" name="niño2">
                                        <img src="img/EscalaTanner/nino5.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 5</b>. Genitales Adultos. Vello adulto que se extiende a zona medial de muslos.</p>
                                      </div>

                                    </td>
                                    <td <?= $optiongen2 ?>>
                                      <div>
                                        <input type="radio" value="5" name="niña2">
                                        <img src="img/EscalaTanner/nina5.jpg" alt="" style="width: 200px;">
                                        <p><b>Estado 5</b>. Pecho Adulto, areola no sobreelevada. Vello adulto zona medial muslo.</p>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                            </div>

                          </div>

                        </div>
                      </div>
                      -->
                      <!--cierre de lista-->






                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTen">
                              Órganos de los Sentidos
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">

                          <div class="box-body row">

                            <div class="col-md-6">
                              <label>Ojos</label><textarea name="OrganoSentidos[Ojos]" class="form-control input-lg" placeholder="Ojos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Oídos</label><textarea name="OrganoSentidos[Oídos]" class="form-control input-lg" placeholder="Oidos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Lengua/Sabores</label><textarea name="OrganoSentidos[Lengua/Sabores]" class="form-control input-lg" placeholder="Lengua/Sabores" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->




                      <!-- lista -->
                      <!--<div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseEleven">
                              Sintomas Generales
                            </a>
                          </h4>
                        </div>
                        <div id="collapseEleven" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-6">
                              <label>Deseos</label><textarea name="SintomasGenerales[Deseos]" class="form-control input-lg" placeholder="Deseos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Sed</label><textarea name="SintomasGenerales[Sed]" class="form-control input-lg" placeholder="Sed" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Transpiracion</label><textarea name="SintomasGenerales[Transpiracion]" class="form-control input-lg" placeholder="Transpiracion" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Aversiones</label><textarea name="SintomasGenerales[Aversiones]" class="form-control input-lg" placeholder="Aversiones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Calor Vital</label><textarea name="SintomasGenerales[Calor Vital]" class="form-control input-lg" placeholder="Calor Vital" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Sueños</label><textarea name="SintomasGenerales[Sueños]" class="form-control input-lg" placeholder="Sueños" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                          </div>

                        </div>
                      </div>-->
                      <!--cierre de lista-->





                      <!-- lista
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwelve">
                              Diagnostico de Acupuntura
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwelve" class="panel-collapse collapse">

                          <div class="box-body">


                            <div class="col-md-6">
                              <label>MADERA H/V ojos,lagrimas tendones, uñas,agrio,colera</label>
                            </div>
                            <div class="col-md-6">
                              <label>FUEGO Czon/I.D lengua, sudor vasos/piel cara alegria, amargo</label>
                            </div>
                            <div class="col-md-6">
                              <label>TIERRA Baz/Est boca, saliva clara carne extremi labios, reflexion dulces</label>
                            </div>
                            <div class="col-md-6">
                              <label>METAL Pul/I.G mocos piel/vellos tristeza,pena picante</label>
                            </div>
                            <div class="col-md-6">
                              <label>AGUA Riñ/Veji orejas, saliva espe huesos/ arti cabello, miedo salado</label>
                            </div>
                            <div class="col-md-6">
                              <label>&nbsp;</label>
                            </div>

                            <div class="col-md-3">
                              <br>
                              <label>MOVIMIENTO</label>
                            </div>

                            <div class="col-md-9">
                              <br>
                              <label>DIAGNOSTICO</label>
                            </div>

                            <div class="col-md-12">
                              <div class="col-md-3" style="height: 80px;display: flex;justify-content: center;align-items: center;">
                                <label>MADERA</label>
                              </div>
                              <div class="col-md-9">
                                <textarea name="DiagnosticoAcupuntura[Madera]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-3" style="height: 80px;display: flex;justify-content: center;align-items: center;">
                                <label>FUEGO</label>
                              </div>
                              <div class="col-md-9">
                                <textarea name="DiagnosticoAcupuntura[Fuego]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-3" style="height: 80px;display: flex;justify-content: center;align-items: center;">
                                <label>TIERRA</label>
                              </div>
                              <div class="col-md-9">
                                <textarea name="DiagnosticoAcupuntura[Tierra]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-3" style="height: 80px;display: flex;justify-content: center;align-items: center;">
                                <label>METAL</label>
                              </div>
                              <div class="col-md-9">
                                <textarea name="DiagnosticoAcupuntura[Metal]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-3" style="height: 80px;display: flex;justify-content: center;align-items: center;">
                                <label>AGUA</label>
                              </div>
                              <div class="col-md-9">
                                <textarea name="DiagnosticoAcupuntura[Agua]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label>General</label>
                                <textarea name="DiagnosticoAcupuntura[General]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
                     cierre de lista-->





                      <!-- lista -->
                      <!--
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThirteen">
                              Diagnóstico
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThirteen" class="panel-collapse collapse">

                          <div class="box-body">
                            <h3 style="width: 100%;text-align: center;">Modalidad de la consulta</h3>
                            <div class="col-md-12">
                              <label class="col-md-3">
                                <input type="radio" class="option-input radio" name="DiagnosticoConsulta[Modalidad]" value="Convencional/Presencial"  />
                                Convencional/Presencial
                              </label>
                              <label class="col-md-3">
                                <input type="radio" class="option-input radio" name="DiagnosticoConsulta[Modalidad]" value="Telemedicina" />
                                Telemedicina
                              </label>
                              <label class="col-md-3">
                                <input type="radio" class="option-input radio" name="DiagnosticoConsulta[Modalidad]" value="Asistida" />
                                Asistida
                              </label>
                              <label class="col-md-3">
                                <input type="radio" class="option-input radio" name="DiagnosticoConsulta[Modalidad]" value="No aplica" />
                                No aplica
                              </label>
                            </div>

                            <div class="col-md-6">
                              <br>
                              <label>Causa Externa</label>
                              <select name="DiagnosticoConsulta[Causa Externa]"  class="form-control input-lg">
                                <option value="" selected>Seleccione</option>
                                <option>Accidente de trabajo</option>
                                <option>Accidente de transito</option>
                                <option>Accidente rabico</option>
                                <option>Accidente ofidico</option>
                                <option>Otro tipo de accidente</option>
                                <option>Evento catastrofico</option>
                                <option>Lesión por agresion</option>
                                <option>Lesion auto infligida</option>
                                <option>Sospecha de maltrato físico</option>
                                <option>Sospecha de abuso sexual</option>
                                <option>Sospecha de violencia sexual</option>
                                <option>Sospecha de maltrato emocional</option>
                                <option>Enfermedad general</option>
                                <option>Enfermedad laboral</option>
                                <option>Otra</option>
                              </select>
                            </div>

                            <div class="col-md-6">
                              <br>
                              <label>Diagnostico Principal</label>
                              <select name="DiagnosticoConsulta[CIE10][]" id="AnteFamiliar_3acupuntura" onclick="BuscarCie10('acupuntura');" style="width:100%" multiple><option value=" ">Seleccione... </option>

                            </select>
                            </div>

                            

                            <div class="col-md-6">
                              <label>Fecha</label>
                              <input type="date" name="DiagnosticoConsulta[Fecha]"  class="form-control input-lg">
                            </div>

                            <div class="col-md-6">
                              <label>Tipo de Diagnostico</label>
                              <select name="DiagnosticoConsulta[Tipo de Diagnostico][]"  class="form-control input-lg select2" multiple="multiple" style="width:100%">

                                <option>Quirurgico</option>
                                <option>Toxico</option>
                                <option>Alergico</option>
                                <option>Clinico</option>
                                <option>Patologia</option>
                                <option>Farmacologico</option>
                                <option>Hospitalario</option>
                                <option>Traumático</option>
                                <option>Otro</option>
                                <option>No Aplica</option>

                              </select>
                            </div>

                          </div>

                        </div>
                      </div>
                      -->
                      <!--cierre de lista-->




                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFourteen">
                              Impresión
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFourteen" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-12">
                              <textarea name="Impresion[Impresión]" class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->




                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteen">
                              Plan de manejo
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFiveteen" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-12">
                              <textarea name="PlanManejo[Plan de Manejo]" class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;"></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->


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



                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteenE">
                              Historial de Vacunas
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFiveteenE" class="panel-collapse collapse">

                          <div class="box-body">

                            <button type="button" onclick="AgregarVacunas_Inicial();"> Agregar Vacuna </button>
                            <input type="hidden" id="cantidad_AgregarVacuna" value="0">
                            <br>

                            <div id="vacunas_general" class="table-responsive col-md-12 row" style="overflow: auto;">

                              <script type="text/javascript">
                                function AgregarVacuna() {
                                  var tableBody = document.getElementById('vacunas_general');
                                  var cantidad = document.getElementById('cantidad_AgregarVacuna').value;
                                  cantidad++;
                                  for (var i = 0; i < cantidad; i++) {
                                    var tbodys = document.querySelectorAll("#vacunas_general > div");
                                    var trs = tbodys.length;
                                    console.log(trs);
                                    console.log(cantidad);
                                    if ((!document.getElementById("div_vacuna" + i)) && (trs < cantidad)) {

                                      var div = document.createElement('div');
                                      div.setAttribute("class", "row");
                                      div.setAttribute("id", "div_vacuna" + i);

                                      var Dato = '';

                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Vacuna</div>';
                                      Dato += '<input type="text" class="vacunas form-control input-lg" id="Vacunacion'+i+'Vacuna" name="Vacunacion[' + i + '][Vacuna]" >';
                                      Dato += '</div>';

                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Dosis</div>';
                                      Dato += '<input type="text" class="vacunas form-control input-lg" id="Vacunacion'+i+'Dosis" name="Vacunacion[' + i + '][Dosis]" >';
                                      Dato += '</div>';


                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Fecha</div>';
                                      Dato += '<input type="date" class="vacunas form-control input-lg" id="Vacunacion'+i+'Fecha" name="Vacunacion[' + i + '][Fecha Vacuna]" >';
                                      Dato += '</div>';


                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Lote</div>';
                                      Dato += '<input type="text" class="vacunas form-control input-lg" id="Vacunacion'+i+'Lote" name="Vacunacion[' + i + '][Lote]" >';
                                      Dato += '</div>';

                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Responsable Vacuna</div>';
                                      Dato += '<input type="text" class="vacunas form-control input-lg" id="Vacunacion'+i+'RV"  name="Vacunacion[' + i + '][Responsable Vacuna]" >';
                                      Dato += '</div>';

                                      Dato += '<div class="form-group col-md-4">';
                                      Dato += '<div align="left">Establecimiento de Salud</div>';

                                      Dato += '<select name="Vacunacion[' + i + '][Establecimiento Salud]" id="Vacunacion'+i+'Estabelcimiento" class="vacunas form-control input-lg select" style="width: 100%;">';
                                      Dato += '<option></option>';
                                      Dato += '<option>PRIVADO</option>';
                                      Dato += '<option>MSP</option>';
                                      Dato += '<option>OTRO</option>';
                                      Dato += '</select>';

                                      Dato += '</div>';

                                      Dato += '<div class="form-group col-md-12">';
                                      Dato += '<div align="left"><a href="#"  style="font-size: 20px;"  onclick="EliminarVacuna(' + i + ');"><i class="fas fa-trash-alt"></i> Eliminar Vacuna </a></div>';
                                      Dato += '</div>';

                                      div.innerHTML = Dato;
                                      tableBody.appendChild(div);

                                    }
                                  }
                                  document.getElementById('cantidad_AgregarVacuna').value = cantidad;


                                }
                              </script>





                              <script type="text/javascript">
                                function EliminarVacuna(valor) {
                                  document.getElementById("div_vacuna" + valor).remove();
                                  document.getElementById('cantidad_AgregarVacuna').value = (document.getElementById('cantidad_AgregarVacuna').value - 1);
                                }


                                function AgregarVacunas_Inicial() {
                                  var selects = document.getElementById('cantidad_AgregarVacuna').value;
                                  AgregarVacuna();
                                }
                              </script>

                            </div>

                          </div>
                        </div>

                      </div>
                      <!--cierre de lista-->



                      <!-- lista -->
                      <!--<div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFiveteenEc">
                              Ecografías
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFiveteenEc" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Registro de Ecografías</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option >Seleccione tipo...</option>
                        <option value="servicio1">Ecografía obstétrica</option>
                        <option value="servicio2">Ecografía morfológica</option> 
                        <option value="servicio3">Colposcopia</option> 
                        <option value="servicio4">Renal</option>
                        <option value="servicio5">Mamas</option> 
                        <option value="servicio6">Abdominal</option>
                        <option value="servicio7">Ecografia Ultra Pelvica</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6" >  
                    <h4 align="right"> <?php echo date("d-m-Y h:m") ?> </h4>                                 
                  </div>
                </div>


                <div id="servicio1" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía obstétrica</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Obstetrica">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Feto</label>
                          <select class="form-control" name="feto"  >
                            <option>Seleccione..</option>
                            <option value="Único">Único</option>
                            <option value="Mùltiple">Mùltiple</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Situación</label>
                          <select class="form-control" name="situacion">
                            <option>Seleccione..</option>
                            <option value="Longitudinal">Longitudinal</option>
                            <option value="Transverso ">Transverso</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Presentación</label>
                          <select class="form-control" name="presentacion"  >
                            <option>Seleccione..</option>
                            <option value="Cefálica">Cefálica</option>
                            <option value="Podálica">Podálica</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <select class="form-control" name="posicion">
                            <option>Seleccione..</option>
                            <option value="Izquierda">Izquierda</option>
                            <option value="Derecha">Derecha</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Dorso</label>
                          <select class="form-control" name="dorso"  >
                            <option>Seleccione..</option>
                            <option value="Lateral">Lateral</option>
                            <option value="Anterior">Anterior</option>
                            <option value="Posterior">Posterior</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Biometría</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">LCN (mm)</label>
                          <input class="form-control" type="text"  name="LCN" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem1" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">DBP (mm)</label>
                          <input class="form-control" type="text" name="DBP" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem2" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC (mm)</label>
                          <input class="form-control" type="text" name="AC"  >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input class="form-control" type="text" name="sem3" >
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">SG (mm)</label>
                          <input type="text" name="SG" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem4" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">HC (mm)</label>
                          <input type="text" name="HC" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem5" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">LF (mm)</label>
                          <input type="text" name="LF" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem6" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">VV (mm)</label>
                          <input type="text" name="VV" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sem7" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>

                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Ponderado Fetal  (+/- 10 % gr)</label>
                          <input type="text" name="ponderado_f" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Percentil</label>
                          <input type="text" name="percentil"  class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Espesor (mm)</label>
                          <input type="text" name="espesor" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Circular de cordón</label>
                          <select name="circulacion_cordon" class="form-control"  style="width: 100%;">
                            <option >Seleccione </option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Frecuencia Cardiaca  ( x min)</label>
                          <input type="text" name="frecuencia_cardiaca" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Líquido Amniótico ILA (cm)</label>
                          <input type="text" name="liquido_amniotico"  class="form-control" >
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Placenta</label>
                          <select   name="placenta" class="form-control">
                            <option >Seleccione </option>
                            <option value="Anterior">Anterior</option>
                            <option value="Posterior">Posterior</option>
                            <option value="Previa">Previa</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grado</label>
                          <select   name="grado" class="form-control"  style="width: 100%;">
                            <option >Seleccione </option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label"> Malformaciones Fetales</label>
                          <select   name="malformaciones_fetales" class="form-control">
                            <option >Seleccione </option>
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Sexo</label>
                          <select   name="sexo" class="form-control">
                            <option >Seleccione </option>
                            <option value="Masculino">Masculino   </option>
                            <option value="Femenino">Femenino      </option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Fecha probable de parto</label>
                           <input type="date" name="fechaParto" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusiones</label>
                          <textarea class="form-control" id="procedimiento" name="conclusion" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Información de facturación</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-horizontal">
                          <label class="col-md-5 control-label">Monto de abono o pago</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="abono" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>


                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                          </div>



                          <div id="servicio2" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografía morfológica</h2>
                    </div>
                    <br>

                    <div class="box-header with-border">
                      <h2 class="box-title">La imagen ultrasonografica muestra</h2>
                    </div>
                    <br>

                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Morfologica">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Situación</label>
                          <input type="text" name="situacion1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Presentación</label>
                          <input type="text" name="presentacion1" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <input type="text" name="posicion1" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">BPD-Diámetro Biparietal (mm)</label>
                          <input type="text" name="BPD" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">HC-Perimétro Cefálico (mm)</label>
                          <input type="text" name="HC" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema2" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">AC-Circunferencia Abdominal (mm)</label>
                          <input type="text" name="AC2" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema3" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">FL-longitud de Femúr (mm)</label>
                          <input type="text" name="FL" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Semanas</label>
                          <input type="text" name="sema4" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group col-md-6">
                          <label class="control-label">Peso Fetal Aproximado (Grs)</label>
                          <input type="text" name="peso_fetal_apro" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label class="control-label">Percentil</label>
                          <input type="text" name="percentil2" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h2 class="box-title">Anatomía fetal</h2>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Craneo</label>
                          <textarea name="craneo" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema nervioso central</label>
                          <textarea name="sistema_nervioso_central" class="form-control" rows="3" placeholder="">
ANCHURA VENTRICULO LATERAL  - ASTA ANTERIOR:   mm
ANCHURA VENTRICULO LATERAL  -  ATRIO:   mm (VN: < 10 mm)
ANCHURA DEL CAVUN SEPTUM PELLUCIDUM:   mm
ANCHURA DEL TALAMO:   mm.
DIAMETRO CEREBELO:   mm.
EDAD GESTACIONAL:   . 
CISTERNA MAGNA:   mm
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Columna vertebral</label>
                          <textarea name="columna_vertebral" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cara</label>
                          <textarea name="cara" class="form-control" rows="3" placeholder="">
FRENTE: 
HUESOS NASALES: 
NARIZ: 
LABIO SUPERIOR: 
LABIO INFERIOR: 
BARBILLA: 
ORBITAS:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Corazón</label>
                          <textarea name="corazon" class="form-control" rows="3" placeholder="">
PROYECCION DE CUATRO CAMARAS:  
PROYECCION DE TRES CAMARAS:  
TRACTO DE SALIDA DEL VENTRICULO IZQUIERDO: PERMEABLE:   mm.
TRACTO DE SALIDA DEL VENTRICULO DERECHO: PERMEABLE:   mm.
ARCO AORTICO: 
ARCO DUCTAL:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tórax</label>
                          <textarea name="torax" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Pared Abdominal Anterior</label>
                          <textarea name="pared_abdominal" class="form-control" rows="3" placeholder="">
INTEGRIDAD DE LA PARED ABDOMINAL
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tracto Gastro Intestinal</label>
                          <textarea name="tracto_gastro" class="form-control" rows="3" placeholder="">
INTEGRIDAD DE LA PARED ABDOMINAL
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema Urinario</label>
                          <textarea name="sistema_urinario" class="form-control" rows="3" placeholder="">
LONGITUD RENAL:    
DIAMETRO VESICAL:   mm.
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Sistema Musculo-Esquelético</label>
                          <textarea name="sistema_musculo_esqueletico" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Bienestar fetal</label>
                          <textarea name="bienestar_fetal" class="form-control" rows="3" placeholder="">
FRECUENCIA CARDIACA:  
MOVIMIENTOS FETALES:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Placenta</label>
                          <textarea name="placenta2" class="form-control" rows="3" placeholder="">
POSICION:    
ESPESOR:               
GRADO:
                          </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Liquido Amniótico</label>
                          <textarea name="liquido_amniotico2" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cordon umbilical</label>
                          <textarea name="cordon_umbilical" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusión Notas o comentarios</label>
                          <textarea name="conclusion" class="form-control" rows="3" placeholder="Notas y Comentarios"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Información de facturación</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-horizontal">
                          <label class="col-md-5 control-label">Monto de abono o pago</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="abono2" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>

                   <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen11" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen22" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen33" class="form-control">
                        </div>
                      </div>
                    </div>
                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control"  name="diagnostico2" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>



                        </div>


                         <div id="servicio3" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Colposcopia</h2>
                    </div>
                    <br>

                       *********************************** Tratamiento laser  ********************************************** 

                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Colposcopia">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Resultado PVH</th>
                            <th colspan="4" class="text-center">Resultado de Citología</th>
                          </tr>
                          <tr>
                            <td>
                              Negativo: <input type="radio" name="PVH" value="Negativo" class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="PVH" value="Positivo" class="minimal">
                            </td>
                            <td>
                              <label class="control-label">ASC-US:
                                Si <input type="radio" name="ASC_US" value="Si" class="minimal"> &nbsp; No <input type="radio" name="ASC_US" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE BG:
                                Si <input type="radio" name="LIE_BG" value="Si" class="minimal"> &nbsp; No <input type="radio" name="LIE_BG" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">LIE AG:
                                Si <input type="radio" name="LIE_AG" value="Si" class="minimal"> &nbsp; No <input type="radio" name="LIE_AG" value="No" class="minimal">
                              </label>
                            </td>
                            <td>
                              <label class="control-label">Carcinoma:
                                Si <input type="radio" name="carcinoma" value="Si" class="minimal"> &nbsp; No <input type="radio" name="carcinoma" value="No" class="minimal">
                              </label>
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">IVAA Inspección Visual con Ácido Acético</th>
                          </tr>

                          <tr>
                            <td>
                              Negativo: <input type="radio" name="IVAA" value="Negativo"  class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="IVAA" value="Positivo"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blanco Rápido: <input type="radio" name="IVAA2" value="Aceto Blanco Rápido - Menor a 15 Segundos" class="minimal">  Menor a 15 Segundos
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Aceto Blando Duradero: <input type="radio" name="IVAA2" value="Aceto Blando Duradero - Más de 120 Segundos"  class="minimal">  Más de 120 Segundos
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th class="text-center">Tipos de Sona de Transformación</th>
                          </tr>

                          <tr>
                            <td>
                              I UEC Completamente Visible: <input type="radio" name="Tipos_Sona_T" value="I UEC Completamente Visible"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              II UEC Parcialmente Visible: <input type="radio" name="Tipos_Sona_T" value="II UEC Parcialmente Visible"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              III UEC No Visible: <input type="radio" name="Tipos_Sona_T" value="III UEC No Visible"  class="minimal">
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Test de SHILLER</th>
                          </tr>
                          <tr>
                            <td>
                              Negativo: <input type="radio" name="SHILLER" value="Negativo" class="minimal">
                            </td>
                            <td>
                               Positivo: <input type="radio" name="SHILLER" value="Positivo" class="minimal">
                            </td>
                          </tr>
                        </table>

                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Cervix</th>
                          </tr>
                          <tr>
                            <td>
                              Biopsia: Si <input type="radio" name="biopsia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="biopsia" value="No" class="minimal">
                            </td>
                            <td>
                              Curetaje: Si <input type="radio" name="curetaje" value="Si" class="minimal"> &nbsp; No <input type="radio" name="curetaje" value="No" class="minimal">
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr><th colspan="2" class="text-center">Tamaño de la Lesión</th></tr>
                          <tr>
                            <td>Número de Cuadrantes: </td>
                            <td><input type="text" class="form-control" name="tam_les"  placeholder=""></td>
                          </tr>
                          <tr>
                            <td>Porcentaje de Cérvix: </td>
                            <td><input type="text" class="form-control" name="por_cervix"  placeholder=""></td>
                          </tr>
                        </table>
                      </div>

                      <br>
                      <div class="col-md-12"><hr style="border-color:blue;"></div>

                      <div class="col-md-12">
                        <div class="box-header with-border">
                          <h1 class="box-title">Hallazgos Colposcópicos</h1>
                        </div>
                      </div>
                      
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">Hallazgos Normales</th>
                          </tr>
                          
                          <tr>
                            <td>
                              Epitelio Escamoso Original:
                              Maduro <input type="radio" name="epit_esca_original" value="Maduro" class="minimal">
                              Atrófico <input type="radio" name="epit_esca_original" value="Atrofico" class="minimal">
                            </td>
                            <td>
                              Epitelio Columnar:
                              Ectópico <input type="radio" name="epitelio_columnar" value="Ectópico" class="minimal">
                              Ectropión <input type="radio" name="epitelio_columnar" value="Ectropion" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Epitelio Escamoso Metaplasico: Si <input type="radio" name="epitelio_escamoso_metaplasico" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="epitelio_escamoso_metaplasico" value="No"  class="minimal">
                            </td>
                            <td>
                              Criptas Abiertas: Si <input type="radio" name="criptas_abiertas" value="Si" class="minimal"> &nbsp; No <input type="radio" name="criptas_abiertas" value="No" class="minimal">
                            </td>
                          </tr>
                           <tr>
                            <td colspan="2">
                              Deciduosis del Embarazo: Si <input type="radio" name="deciduosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="deciduosis" value="No" class="minimal">
                            </td>
                            
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="2" class="text-center">Hallazgos Anormales</th>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th colspan="2" class="text-center">LIE Bajo Grado</th>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Epitelio Aceto Blanco Delgado: Si <input type="radio" name="epitelioAcetoBlancoDelgado" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="epitelioAcetoBlancoDelgado" value="No"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Borde Irregular: Si <input type="radio" name="borde_irregular" value="Si"  class="minimal"> &nbsp; No <input type="radio" name="borde_irregular" value="No"  class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Mosaico Fino: Si <input type="radio" name="mosaico_fino" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mosaico_fino" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              Punteado Fino: Si <input type="radio" name="punteado_fino" value="Si" class="minimal"> &nbsp; No <input type="radio" name="punteado_fino" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr><th colspan="2" class="text-center">Lesiones No Específicas</th></tr>
                          <tr>
                            <td>
                             Leucoplasia: Si <input type="radio" name="leucoplasia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="leucoplasia" value="No" class="minimal"> 
                            </td>
                            <td>
                             Erosión: Si <input type="radio" name="erosion" value="Si" class="minimal"> &nbsp; No <input type="radio" name="erosion" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                             Shiller: Si <input type="radio" name="shiller1" value="Si" class="minimal"> &nbsp; No <input type="radio" name="shiller1" value="No" class="minimal"> 
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-6">
                        <table class="table table-bordered" >
                          <tr >
                            <th class="text-center">LIE Alto Grado</th>
                          </tr>
                          <tr>
                            <td>
                              Epitelio Aceto Blanco Grueso: Si <input type="radio" name="epitelioAcetoBlancoGrueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="epitelioAcetoBlancoGrueso" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Menor a 15 Segundos: Si <input type="radio" name="menor15seg" value="Si" class="minimal"> &nbsp; No <input type="radio" name="menor15seg" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Más de 120 Segundos:  Si <input type="radio" name="mas120seg" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mas120seg" value="No" class="minimal">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Mosaico Grueso: Si <input type="radio" name="mosaico_grueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="mosaico_grueso" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                             Punteado Grueso: Si <input type="radio" name="punteado_grueso" value="Si" class="minimal"> &nbsp; No <input type="radio" name="punteado_grueso" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo del Limite del Borde Interno: Si <input type="radio" name="signolimiteBorderInterno" value="Si" class="minimal"> &nbsp; No <input type="radio" name="signolimiteBorderInterno" value="No" class="minimal"> 
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Signo de la Cresta: Si <input type="radio" name="signoCresta" value="Si" class="minimal"> &nbsp; No <input type="radio" name="signoCresta" value="No" class="minimal">
                            </td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Signos de Invasión</th>
                          </tr>
                          <tr>
                            <td>Vasos Atípicos: Si <input type="radio" name="vasosAtipicos" value="Si" class="minimal"> &nbsp; No <input type="radio" name="vasosAtipicos" value="No" class="minimal"></td>
                            <td>Superficie Irregular: Si <input type="radio" name="superficieIrregular" value="Si" class="minimal"> &nbsp; No <input type="radio" name="superficieIrregular" value="No" class="minimal"></td>
                            <td>Necrosis: Si <input type="radio" name="necrosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="necrosis" value="No" class="minimal"></td>
                            <td>Tumor: Si <input type="radio" name="tumor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="tumor" value="No" class="minimal"></td>
                          </tr>
                          <tr>
                            <td>Vasos Frágiles: Si <input type="radio" name="vasosFragiles" value="Si" class="minimal"> &nbsp; No <input type="radio" name="vasosFragiles" value="No" class="minimal"></td>
                            <td>Lesión Exofitica: Si <input type="radio" name="lesionExofitica" value="Si" class="minimal"> &nbsp; No <input type="radio" name="lesionExofitica" value="No" class="minimal"></td>
                            <td colspan="2">Ulceración: Si <input type="radio" name="ulceracion" value="Si" class="minimal"> &nbsp; No <input type="radio" name="ulceracion" value="No" class="minimal"></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="5" class="text-center">Resultados de Biopsia</th>
                          </tr>
                          <tr>
                            <td>Negativo: Si <input type="radio" name="resultadoBiopsia"  class="minimal"> &nbsp; No <input type="radio" name="resultadoBiopsia"  class="minimal"></td>
                            <td>NIC I: Si <input type="radio" name="NIC_I" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_I" value="No" class="minimal"></td>
                            <td>NIC II: Si <input type="radio" name="NIC_II" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_II" value="No" class="minimal"></td>
                            <td>NIC III: Si <input type="radio" name="NIC_III" value="Si" class="minimal"> &nbsp; No <input type="radio" name="NIC_III" value="No" class="minimal"></td>
                            <td>CIS: Si <input type="radio" name="CIS" value="Si" class="minimal"> &nbsp; No <input type="radio" name="CIS" value="No" class="minimal"></td>
                          </tr>
                          <tr>
                            <td>CA Invasor: Si <input type="radio" name="CA_Invasor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="CA_Invasor" value="No" class="minimal"></td>
                            <td>Adenosis: Si <input type="radio" name="Adenosis" value="Si" class="minimal"> &nbsp; No <input type="radio" name="Adenosis" value="No" class="minimal"></td>
                            <td>Adeno CA Invasor: Si <input type="radio" name="adeno_CAInvasor" value="Si" class="minimal"> &nbsp; No <input type="radio" name="adeno_CAInvasor" value="No" class="minimal"></td>
                            <td colspan="2">Otros: <input type="radio" name="otros"  value="otros" class="minimal"></td>
                          </tr>
                        </table>
                      </div>

                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="2" class="text-center">Tratamiento</th>
                          </tr>
                          <tr>
                            <td>Crioterapia: Si <input type="radio" name="crioterapia" value="Si" class="minimal"> &nbsp; No <input type="radio" name="crioterapia" value="No" class="minimal"></td>
                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-7">
                                  <input type="date" class="form-control" name="fecha_crioterapia" >
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Escisión:<br>
                              Tipo I - Reseca completamente la ectocervix <input type="radio" name="escision" value="Tipo I - Reseca completamente la ectocervix" class="minimal">  <br>
                              Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical <input type="radio" name="escision" value="Tipo II - Reseca la zona de transformación y una pequeña cantidad de epitelio endocervical" class="minimal"> <br>
                              Tipo III . Reseca endocervical <input type="radio" name="escision" value="Tipo III - Reseca endocervical" class="minimal"> 
                            </td>


                            <td>
                              <div class="form-horizontal">
                                <label class="col-md-3 control-label">Fecha: </label>
                                <div class="col-md-7">
                                  <input type="date" class="form-control" name="fecha_escision" >
                                </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>

                    <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen_1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen_2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen_3" class="form-control">
                        </div>
                      </div>
                     
                    </div>

                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control"  name="diagnostico3" placeholder="" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                </div>



                <div id="servicio4" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Renal</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Renal">

                    <<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Riñón Izquierdo</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="rinon_izquierdo">
De situación y movilidad           , de          mm de longitud (V.N=90-130mm), de bordes            , y a los cortes ecográficos su parénquima es        ,      se aprecian imagenes expansivas,        se aprecia dilatación de sistema pielocalicial.
Parenquima renal de aspecto       y corteza de tamaño       mm.(V.N=9-11mm),        se aprecian imágenes litiasicas en su interior.
Relación cortico medular:    </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Riñón Derecho</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="rinon_derecho">
De situación y movilidad           , de          mm de longitud (V.N=90-130mm), de bordes            , y a los cortes ecográficos su parénquima es        ,      se aprecian imagenes expansivas,        se aprecia dilatación de sistema pielocalicial.
Parenquima renal de aspecto       y corteza de tamaño       mm.(V.N=9-11mm),        se aprecian imágenes litiasicas en su interior.
Relación cortico medular:    </textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Vejiga</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="vejiga">
Paredes de aspecto      , de     mm de espesor       se aprecian imágenes invasivas ni infiltrativas, Volumen  Pre miccional    cc, Volumen Post Miccional    cc.</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Prostata</label>
                          <textarea class="form-control"  rows="5" placeholder="" name="prostata">
Aspecto ecográfico   , volumen    cc (V.N=20cc), peso    gramos (V.N=20gr)</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Vesículas Seminales Visibles:</label>
                          <select class="form-control" name="vesicula_seminales_visibles">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Cuerpos Amiláceos Visibles:</label>
                          <select class="form-control" name="cuerpos_amilaceos_visibles" >
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona Periférica</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_perifericas">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona de Transición</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_de_transicion">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Zona Central:</label>
                          <input type="text" class="form-control"  placeholder="" name="zona_central">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusiones del Informe</label>
                          <textarea class="form-control" id="procedimiento" name="conclusiones" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                   <div class="form-group col-md-12"><hr style="border-color:blue;"></div>
                    <br>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="to5" class="form-control" name="imagen-1" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen3" class="form-control" name="imagen-2">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen3" class="form-control" name="imagen-3">
                        </div>
                      </div>
                     
                    </div>

                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="procedimiento" name="diagnostico4" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    </div>



                    <div id="servicio5" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Mamas</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Mamaria">

                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Posición</label>
                          <select class="form-control" name="posicion"  >
                            <option>Seleccione..</option>
                            <option value="Frontal">Frontal</option>
                            <option value="Lateral">Lateral</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">I.- Mama Derecha</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Piel</label>
                          <input type="text" name="piel" class="form-control">
                          <span class="help-block">mm de espesor N=2-3*</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Grasa</label>
                          <select class="form-control" name="grasa"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Glandular</label>
                          <select class="form-control" name="tejido_glandular"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Conectivo de Sosten</label>
                          <input type="text" name="TCS" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Conductos Mamarios</label>
                          <input type="text" name="cond_m" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pezon</label>
                          <select class="form-control" name="pezon"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ligamentos de Cooper</label>
                          <input type="text" name="Lig_Coo" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Costillas:<br> Hipoecogenico
                          <input type="radio" name="costillas" value="Hipoecogenico"  class="minimal"  ></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">se observan a intervalos regulares en el corte</label>
                          <input type="text" name="corte" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Masas</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_masas"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Forma</label>
                          <select class="form-control" name="form"  >
                            <option>Seleccione..</option>
                            <option value="Ovalada">Ovalada</option>
                            <option value="Redondeada">Redondeada</option>
                            <option value="Irregular">Irregular</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Orientación</label>
                          <select class="form-control" name="orientacion"  >
                            <option>Seleccione..</option>
                            <option value="Paralela">Paralela</option>
                            <option value="Anti Paralela">Anti Paralela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Márgenes</label>
                          <select class="form-control" name="margenes"  >
                            <option>Seleccione..</option>
                            <option value="Circunscritos">Circunscritos</option>
                            <option value="No Circunscritos">No Circunscritos</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Periferia</label>
                          <select class="form-control" name="periferia"  >
                            <option>Seleccione..</option>
                            <option value="Interface Abrupta">Interface Abrupta</option>
                            <option value="Halo Ecogenico">Halo Ecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ecogenicidad</label>
                          <select class="form-control" name="ecogenicidad"  >
                            <option>Seleccione..</option>
                            <option value="Anecogenico">Anecogenico</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Isoecogenico">Isoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Caracteristicas Ultrasonográfias Posteriores</label>
                          <select class="form-control" name="caracteristicas_ultrasonograficas_posteriores"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tejido Adyacente</label>
                          <textarea class="form-control" rows="3" placeholder="" name="tejido_adyacente"></textarea>
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Calcificaciones</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_calcificaciones"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Macrocalcificaciones</label>
                          <select class="form-control" name="macro_calc"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por fuera de la masa</label>
                          <select class="form-control" name="micro_calc_fuera"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Mayor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por dentro de la masa</label>
                          <select class="form-control" name="macro_calc_dentro"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Menor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Casos Especiales</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Micro Quistes Complicados</label>
                          <input type="text"  class="form-control" name="micro_quistes_complicados">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Quistes Complicados</label>
                          <input type="text"  class="form-control" name="quistes_complicados">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Masa en Piel</label>
                          <input type="text" class="form-control" name="masa_en_piel">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cuerpo Extraño</label>
                          <input type="text" class="form-control" name="cuerpo_extraño">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Intramamaria</label>
                          <input type="text"  class="form-control" name="adenopatia_intramamaria">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Axilar</label>
                          <input type="text"  class="form-control" name="adenopatia_axilar" >
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Vascularización</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">No presente / No Evaluada</label>
                          <select class="form-control" name="presente_vascularizacion"  >
                            <option>Seleccione..</option>
                            <option value="No Presente">No Presente</option>
                            <option value="No Evaluada">No Evaluada</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente dentro de la lesión</label>
                          <select class="form-control" name="presente_dentro"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente adyacente de la lesión</label>
                          <select class="form-control" name="presente_adyacente"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente en tejido adyacente</label>
                          <select class="form-control" name="presente_en_tejido_adyacente"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">II.- Mama Izquierda</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Piel</label>
                          <input type="text" name="pi" class="form-control">
                          <span class="help-block">mm de espesor N=2-3*</span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Grasa</label>
                          <select class="form-control" name="grasa1"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Glandular</label>
                          <select class="form-control" name="tejido_glandular1"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Tejido Conectivo de Sosten</label>
                          <input type="text" name="TCS1" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Conductos Mamarios</label>
                          <input type="text" name="cond_m1" class="form-control"  >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pezon</label>
                          <select class="form-control" name="pezon1"  >
                            <option>Seleccione..</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ligamentos de Cooper</label>
                          <input type="text" name="Lig_Coo1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Costillas:<br> Hipoecogenico
                          <input type="radio" name="costillas1" value="Hipoecogenico"  class="minimal"  ></label>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">se observan a intervalos regulares en el corte</label>
                          <input type="text" name="corte1" class="form-control">
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Masas</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_masas1"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Forma</label>
                          <select class="form-control" name="forma1"  >
                            <option>Seleccione..</option>
                            <option value="Ovalada">Ovalada</option>
                            <option value="Redondeada">Redondeada</option>
                            <option value="Irregular">Irregular</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Orientación</label>
                          <select class="form-control" name="orientacion1"  >
                            <option>Seleccione..</option>
                            <option value="Paralela">Paralela</option>
                            <option value="Anti Paralela">Anti Paralela</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Márgenes</label>
                          <select class="form-control" name="margenes1"  >
                            <option>Seleccione..</option>
                            <option value="Circunscritos">Circunscritos</option>
                            <option value="No Circunscritos">No Circunscritos</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Periferia</label>
                          <select class="form-control" name="periferia1"  >
                            <option>Seleccione..</option>
                            <option value="Interface Abrupta">Interface Abrupta</option>
                            <option value="Halo Ecogenico">Halo Ecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ecogenicidad</label>
                          <select class="form-control" name="ecogenicidad1"  >
                            <option>Seleccione..</option>
                            <option value="Anecogenico">Anecogenico</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Hipoecogenico">Hipoecogenico</option>
                            <option value="Isoecogenico">Isoecogenico</option>
                            <option value="Hiperecogenico">Hiperecogenico</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Caracteristicas Ultrasonográfias Posteriores</label>
                          <select class="form-control" name="caracteristicas_ultrasonograficas_posteriores1"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tejido Adyacente</label>
                          <textarea class="form-control" rows="3" placeholder="" name="tejido_adyacente1"></textarea>
                        </div>
                      </div>
                    </div>

                    <br>

                    <div class="box-header with-border">
                      <h1 class="box-title">Calcificaciones</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente</label>
                          <select class="form-control" name="presente_calcificaciones1"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Macrocalcificaciones</label>
                          <select class="form-control" name="macro_calc1"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por fuera de la masa</label>
                          <select class="form-control" name="micro_calc_fuera1"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Mayor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="control-label">Microcalcificaciones por dentro de la masa</label>
                          <select class="form-control" name="macro_calc_dentro1"  >
                            <option>Seleccione..</option>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                          </select>
                          <span class="help-block">Menor a 0.5mm</span>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Casos Especiales</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Micro Quistes Complicados</label>
                          <input type="text"  class="form-control" name="micro_quistes_complicados1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Quistes Complicados</label>
                          <input type="text"  class="form-control" name="quistes_complicados1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Masa en Piel</label>
                          <input type="text" class="form-control" name="masa_en_piel1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cuerpo Extraño</label>
                          <input type="text" class="form-control" name="cuerpo_extraño1">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Intramamaria</label>
                          <input type="text"  class="form-control" name="adenopatia_intramamaria1">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Adenopatía Axilar</label>
                          <input type="text"  class="form-control" name="adenopatia_axilar1" >
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border">
                      <h1 class="box-title">Vascularización</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">No presente / No Evaluada</label>
                          <select class="form-control" name="presente_vascularizacion1"  >
                            <option>Seleccione..</option>
                            <option value="No Presente">No Presente</option>
                            <option value="No Evaluada">No Evaluada</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente dentro de la lesión</label>
                          <select class="form-control" name="presente_dentro1"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente adyacente de la lesión</label>
                          <select class="form-control" name="presente_adyacente1"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Presente en tejido adyacente</label>
                          <select class="form-control" name="presente_en_tejido_adyacente1"  >
                            <option>Seleccione..</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                          </select>
                        </div>
                      </div>
                    </div>

                   <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen1_1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen1_2" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen1_3" class="form-control">
                        </div>
                      </div>
                     
                    </div>

                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" id="procedimiento1" name="diagnostico6" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>


                    </div>

                      <div id="servicio6" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Abdominal</h2>
                    </div>
                    <br>
                    <input  type="hidden" name="tipo_ecografia"  value="Ecografia Abdominal">

                    <?php $idUsuario = $_SESSION['ID']; ?>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Higado</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Morfología</td>
                            <td><input type="text" class="form-control" name="morfologica1"></td>
                            <td><input type="text" class="form-control" name="morfologica2"></td>
                            <td><input type="text" class="form-control" name="morfologica3"></td>
                          </tr>
                          <tr>
                            <td>Bordes</td>
                            <td><input type="text" class="form-control" name="bordes1"></td>
                            <td><input type="text" class="form-control" name="bordes2"></td>
                            <td><input type="text" class="form-control" name="bordes3"></td>
                          </tr>
                          <tr>
                            <td>Dimensiones</td>
                            <td><input type="text" class="form-control" name="dimensiones1"></td>
                            <td><input type="text" class="form-control" name="dimensiones2"></td>
                            <td><input type="text" class="form-control" name="dimensiones3" value="280-150mm"></td>
                          </tr>
                          <tr>
                            <td>Ecogenisidad</td>
                            <td><input type="text" class="form-control" name="ecocigenidad4"></td>
                            <td><input type="text" class="form-control" name="ecocigenidad5"></td>
                            <td><input type="text" class="form-control" name="ecocigenidad6"></td>
                          </tr>
                          <tr>
                            <td>Imagen Expansiva</td>
                            <td><input type="text" class="form-control" name="imagen_ex1"></td>
                            <td><input type="text" class="form-control" name="imagen_ex2"></td>
                            <td><input type="text" class="form-control" name="imagen_ex3"></td>
                          </tr>
                          <tr>
                            <td>Colédoco</td>
                            <td><input type="text" class="form-control" name="coledoco1"></td>
                            <td><input type="text" class="form-control" name="coledoco2"></td>
                            <td><input type="text" class="form-control" name="coledoco3" value="< 5mm"></td>
                          </tr>
                          <tr>
                            <td>Vena Porta</td>
                            <td><input type="text" class="form-control" name="vena_porta1"></td>
                            <td><input type="text" class="form-control" name="vena_porta2"></td>
                            <td><input type="text" class="form-control" name="vena_porta3" value="< 13mm"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" placeholder="" name="observacion_higado"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Vesicula Biliar</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Forma</td>
                            <td><input type="text" class="form-control" name="form1"></td>
                            <td><input type="text" class="form-control" name="form2"></td>
                            <td><input type="text" class="form-control" name="form3"></td>
                          </tr>
                          <tr>
                            <td>Paredes</td>
                            <td><input type="text" class="form-control" name="paredes1"></td>
                            <td><input type="text" class="form-control" name="paredes2"></td>
                            <td><input type="text" class="form-control" name="paredes3"></td>
                          </tr>
                          <tr>
                            <td>Tamaño</td>
                            <td><input type="text" class="form-control" name="tamaño1"></td>
                            <td><input type="text" class="form-control" name="tamaño2"></td>
                            <td><input type="text" class="form-control" name="tamaño3" value="280-150mm"></td>
                          </tr>
                          <tr>
                            <td>Barro Biliar</td>
                            <td><input type="text" class="form-control" name="barro_biliar1"></td>
                            <td><input type="text" class="form-control" name="barro_biliar2"></td>
                            <td><input type="text" class="form-control" name="barro_biliar3"></td>
                          </tr>
                          <tr>
                            <td>Imagen Expansiva</td>
                            <td><input type="text" class="form-control" name="imagen_ex4"></td>
                            <td><input type="text" class="form-control" name="imagen_ex5"></td>
                            <td><input type="text" class="form-control" name="imagen_ex6"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" name="observacion_vesicula" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" >
                          <tr>
                            <th colspan="4" class="text-center">Pancreas</th>
                          </tr>
                          <tr class="text-center">
                            <th></th>
                            <th>Normal</th>
                            <th>Anormal</th>
                            <th>Valor Normal</th>
                          </tr>
                          <tr>
                            <td>Forma</td>
                            <td><input type="text" class="form-control" name="form4"></td>
                            <td><input type="text" class="form-control" name="form5"></td>
                            <td><input type="text" class="form-control" name="form6"></td>
                          </tr>
                          <tr>
                            <td>Ecogenisidad</td>
                            <td><input type="text" class="form-control" name="ecogenicidad7"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad8"></td>
                            <td><input type="text" class="form-control" name="ecogenicidad9"></td>
                          </tr>
                          <tr>
                            <td>Cabeza</td>
                            <td><input type="text" class="form-control" name="cabeza1"></td>
                            <td><input type="text" class="form-control" name="cabeza2"></td>
                            <td><input type="text" class="form-control" name="cabeza3" value="<30mm"></td>
                          </tr>
                          <tr>
                            <td>Cuerpo</td>
                            <td><input type="text" class="form-control" name="cuerpo1"></td>
                            <td><input type="text" class="form-control" name="cuerpo2"></td>
                            <td><input type="text" class="form-control" name="cuerpo3" value="<25mm"></td>
                          </tr>
                          <tr>
                            <td>Cola</td>
                            <td><input type="text" class="form-control" name="cola1"></td>
                            <td><input type="text" class="form-control" name="cola2"></td>
                            <td><input type="text" class="form-control" name="cola3" value="<25mm"></td>
                          </tr>
                          <tr>
                            <td>Wirsung</td>
                            <td><input type="text" class="form-control" name="wirsung1"></td>
                            <td><input type="text" class="form-control" name="wirsung2"></td>
                            <td><input type="text" class="form-control" name="wirsung3" value="<3mm"></td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Observación</label>
                          <textarea class="form-control" rows="3" name="observacion_pancreas" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">Bazo</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Morfología, Ecogenisidad y Movilidad</label>
                          <textarea class="form-control" rows="3" placeholder="" name="MEM"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Tamaño</label>
                          <input type="text" class="form-control" name="tamaño4" value="" placeholder="">
                          <span class="help-block">(V.N < 130mm)</span>
                        </div>
                      </div>
                    </div>

                    <br>
                    <div class="box-header with-border">
                      <h1 class="box-title">Arteria Aorta, Vena Cava y Vena Porta</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Calibre</label>
                          <select class="form-control" name="calibre1"  >
                            <option>Seleccione..</option>
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Flujo</label>
                          <select class="form-control" name="flujo1"  >
                            <option>Seleccione..</option>
                            <option value="Normal">Normal</option>
                            <option value="Anormal">Anormal</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Pared Gástrica</label>
                          <textarea class="form-control" rows="3" placeholder="" name="paredes_gastricas"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Liquido Libre</label>
                          <textarea class="form-control" rows="3" placeholder="" name="liquido_libre"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Conclusión del Informe</label>
                          <textarea class="form-control" rows="3" placeholder="" name="conclusion_informe"></textarea>
                        </div>
                      </div>
                    </div>

                   <div class="box-header with-border text-center">
                      <h1 class="box-title">Anexar Imagenes</h1>
                    </div>
                    <br>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 1</label>
                          <input type="file" id="to5" name="imagen44" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 2</label>
                          <input type="file" name="imagen45" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Imagen 3</label>
                          <input type="file" name="imagen46" class="form-control">
                        </div>
                      </div>
                     
                    </div>

                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico</label>
                          <textarea class="form-control" rows="3" placeholder="" name="diagnostico6"></textarea>
                        </div>
                      </div>
                    </div>

                  </div>

              <div id="servicio7" class="panel box box-secundary element" style="display: none;">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Ecografia Ultra Pelvica</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_ecografia"  value="Ecografia Ultra Pelvica">

                     
                   <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">


                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Motivo del Estudio:</label>
                          <textarea class="form-control" id="motivo_estudio" name="motivo_estudio" placeholder="Motivo del Estudio" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Se realiza ultrasonografia pelvica, con equipo acuson NX2 elite transductor</label>
                          <select class="form-control" name="realiza"  >
                            <option>Seleccione..</option>
                            <option value="Endocavitario">Endocavitario</option>
                            <option value="Convexo">Convexo</option>
                          </select>
                        </div>
                      </div>
                    </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">SE REALIZA ULTRASONOGRAFIA PELVICA, CON EQUIPO ACUSON NX2 ELITE TRANSDUCTOR ENDOCAVITARIO:</label>
                          <textarea class="form-control" id="realiza" name="realiza" placeholder="Procedimiento" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">UTERO</h1><br>

                      <h1 class="box-title">Dimensiones</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group col-md-4">
                          <label class="control-label">L:</label>
                          <input class="form-control" type="text"  name="dimensiones" >
                        </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">AP:</label>
                          <input class="form-control" type="text" name="ap" >
                        </div>

                        <div class="form-group col-md-4">
                          <label class="control-label">T:</label>
                          <input class="form-control" type="text" name="t" >
                        </div>
                      </div>
                    </div>
                  

                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Posición:</label>
                          <input type="text" name="posicion" class="form-control">
                        </div>
                      </div>
                    </div>
                   

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Descripción:</label>
                          <textarea class="form-control" id="descripcion_1" name="descripcion_1" placeholder="Descripción" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Cervix</label>
                          <select class="form-control" name="cervix">
                            <option>Seleccione..</option>
                            <option value="Sano">Sano</option>
                            <option value="Con quistes de naboth">Con quistes de naboth</option>
                            <option value="Con cambios post radioterapia">Con cambios post radioterapia</option>
                          </select>
                        </div>
                      </div>
                    <br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group col-md-12">
                          <label class="control-label">OVARIO DERECHO:</label>
                          <input class="form-control" type="text"  name="ovariod" >
                        </div>
                        <div class="form-group col-md-12">
                          <label class="control-label">OVARIO IZQUIERDO:</label>
                          <input class="form-control" type="text" name="ovarioi" >
                        </div>

                        <div class="form-group col-md-12">
                          <label class="control-label">FONDO DEL SACO:</label>
                          <input class="form-control" type="text" name="fondosaco" >
                        </div>

                        <div class="form-group col-md-12">
                          <label class="control-label">CUPULA:</label>
                          <input class="form-control" type="text" name="cupula" >
                        </div>
                      </div>
                    </div>

                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label" for="inputSuccess">Diagnóstico:</label>
                          <textarea class="form-control" id="diagnostico" name="diagnostico7" placeholder="Diagnóstico" rows="3" ></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="box-header with-border text-center">
                      <h1 class="box-title">Información de facturación</h1>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-horizontal">
                          <label class="col-md-5 control-label">Monto de abono o pago</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="abono" id="abono" min="1" placeholder="">
                          </div>
                        </div>
                      </div>
                    </div>


                    <h4 class="card-title">Agregar Archivos</h4>                                 
          <br>
         
 
                                                                                         
            <div class="form-row">
 
                <div class="form-group col-md-12">
                <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Descripcion" >
              </div>
              <div class="col-md-12">
              
<h4 class="text-center">Cargar Archivos</h4>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Archivos</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
              </div>

  </div>   </div>   </div>

</div>

                      </div>
                      </div>

                    </div>-->
                      <!--cierre de lista-->







                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSixteen">
                              Prescripciones
                            </a>
                          </h4>
                        </div>
                        <div id="collapseSixteen" class="panel-collapse collapse">

                          <br>
                          <!-- esta es la barra del menu-->
                          <div class="tab">
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Incapacidades')">Incapacidades</button>
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Medicamentos')">Medicamentos</button>
                            <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Insumos')">Insumos</button>
                          </div>
                          <!-- barra de menu final -->


                          <!-- Submodulo Incapacidades -->
                          <div id="Incapacidades" class="tabcontent">


                            <div class="col-md-4">
                              <br><br>
                              <button type="button" style="display: initial;" data-target="#modalForm4" data-toggle="modal" title="Agregar Incapacidades"><i class="fa fa-plus"> Agregar Incapacidades</i>
                              </button>
                            </div>
                            <div class="col-md-8">&nbsp;</div>

                            <input type="hidden" id="Arreglo_Incapacidades" name="Arreglo_Incapacidades" value='{"0":{"Area_Tratamiento":null}}'>

                            <div class="table-responsive col-md-12" style="overflow: auto;">
                              <br><br>
                              <table id="tabla_incapacidades" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th style="width:20%">Area de Tratamiento</th>
                                    <th style="width:20%">Recurrencia</th>
                                    <th style="width:20%">Fecha Inicial Incapacidad</th>
                                    <th style="width:20%">Fecha Final Incapacidad</th>
                                    <th style="width:20%">Comentarios</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                </tfoot>
                              </table>

                              <script type="text/javascript">
                                function tabla_incapacidades() {

                                  var data = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
                                  var arreglo = [];
                                  var contador = "0";
                                  for (index in data) {
                                    var arreglotemporal = {};

                                    arreglotemporal["Area Tratamiento"] = data[index]["Area Tratamiento"];
                                    arreglotemporal["Recurrencia"] = data[index].Recurrencia;
                                    arreglotemporal["Fecha Inicial Incapacidad"] = data[index]["Fecha Inicial Incapacidad"];
                                    arreglotemporal["Fecha Final Incapacidad"] = data[index]["Fecha Final Incapacidad"];
                                    arreglotemporal["Comentarios"] = data[index].Comentarios;

                                    arreglo = arreglo.concat(arreglotemporal);
                                    contador++;
                                  }

                                  let pos = 1;

                                  let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden


                                  $("#tabla_incapacidades").dataTable().fnDestroy();

                                  $('#tabla_incapacidades').DataTable({
                                    data: arreglo_final,
                                    columns: [{
                                        data: "Area Tratamiento"
                                      },
                                      {
                                        data: "Recurrencia"
                                      },
                                      {
                                        data: "Fecha Inicial Incapacidad"
                                      },
                                      {
                                        data: "Fecha Final Incapacidad"
                                      },
                                      {
                                        data: "Comentarios"
                                      },
                                    ]
                                  });


                                }
                              </script>

                            </div>

                          </div>
                          <!-- Cierre Submodulo Incapacidades -->

                          <!-- Submodulo Medicamentos -->

                          <div id="Medicamentos" class="tabcontent">

                            <div class="box-body">

                              <?php
                              $cliente_id = $clienteId;
                              $usuario_id = $_SESSION['ID'];
                              include 'RM_Receta.php'
                              ?>
                              <style>
                                /* estos es impoortante para que cuando se muestre el desplegable no genere error con el desplegable siguiente que no se podria seleccionar hasta que se cierre este desplegable en el que esta el recetario, esto lo soluciona */
                                .card-big-shadow:before {
                                  bottom:-25px!important;
                                }
                              </style>
                              <?php
                              /*
                              <!--
                              <div class="col-md-12 content-card">
                                <div class="card-big-shadow">
                                    <div class="card card-just-text" data-background="color" data-color="azul">
                                        <div class="content">
                                            <h4 class="title"><a href="#"><h2> Agregar Receta</h2></a></h4>
                                            <div class="description">

                                              <form id="detalleRecetario" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                                                      <div class="form-row">

                                                      
                                                        <div class="form-group col-md-6">
                                                        <div align="left"> Agregar Medicamento </div>
                                                          <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id?>">
                                                          <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                                                              <option value="" selected="selected">Seleccione Medicamento</option>
                                                              <?php
                                                              //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                                                echo selectMaster("","id","descripcion,concentracion","pos");
                                                              ?>
                                                              
                                                          </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                          <div align="left"> Cantidad </div>
                                                          <input type="text" class="form-control input-lg" name="cantidad"  id="cantidad" placeholder="Cantidad">
                                                          <div id="div-results-cedula"></div>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                          <div align="left"> Presentacion</div>
                                                            <select class="form-control posologia select2" name="posologia" id="posologia" style="width: 100%;" >
                                                              <option value=" ">Seleccione...</option>
                                                               <option value="Miligramos">Miligramos </option>
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
                                                               <option value="Geles y jaleas- Espuma">Geles y jaleas- Espuma</option>
                                                               <option value="Loción">Loción</option>
                                                               <option value="Jabones y champú">Jabones y champú</option>
                                                               <option value="Unguento">Unguento</option>
                                                               <option value="Otras soluciones">Otras soluciones</option>
                                                               <option value="Ampolla">Ampolla</option>
                                                               <option value="Anillo">Anillo</option>
                                                               <option value="Aplicador">Aplicador</option>
                                                               <option value="Atomizador(spray)">Atomizador(spray)</option>
                                                               <option value="Barra">Barra</option>
                                                               <option value="Bolo">Bolo</option>
                                                               <option value="Bolsa">Bolsa</option>
                                                               <option value="Caja">Caja</option>
                                                               <option value="Cartón">Cartón</option>
                                                               <option value="Cartucho">Cartucho</option>
                                                               <option value="Cilindro">Cilindro</option>
                                                               <option value="Contenedor">Contenedor</option>
                                                               <option value="Disco">Disco</option>
                                                               <option value="Esponja">Esponja</option>
                                                               <option value="Estuche">Estuche</option>
                                                               <option value="Frasco">Frasco</option>
                                                               <option value="Generador">Generador</option>
                                                               <option value="Gotas">Gotas</option>
                                                               <option value="Implante">Implante</option>
                                                               <option value="Inhalador">Inhalador</option>
                                                               <option value="Jarra">Jarra</option>
                                                               <option value="Jeringa">Jeringa</option>
                                                               <option value="Kit">Kit</option>
                                                               <option value="Lata">Lata</option>
                                                               <option value="Litro">Litro</option>
                                                               <option value="Parche">Parche</option>
                                                               <option value="Pluma">Pluma</option>
                                                               <option value="Supositorio">Supositorio</option>
                                                               <option value="Tampón">Tampón</option>
                                                               <option value="Tanque">Tanque</option>
                                                               <option value="Tira">Tira</option>
                                                               <option value="Unidades">Unidades</option>
                                                               <option value="Vial">Vial</option>
                                                             </select>
                                                        </div>
                                                                   
                                                        <div class="form-group col-md-3">
                                                            <div align="left">Duración Prescripción</div>
                                                            <input type="text" name="duracion" id="duracion" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Método de administración</div>
                                                            <input type="text" name="metodo" id="metodo" class="form-control"  pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Frecuencia de administración</div>
                                                            <input type="text" name="frecuencia" id="frecuencia" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <div align="left">Dosis</div>
                                                            <input type="text" name="dosis" id="dosis" class="form-control" pattern="[^'\x22]+" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)"> 
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                          <div align="left">  Indicaciones </div>
                                                          <textarea  name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" ></textarea>
                                                        </div>


                                                        <div class="form-group col-md-6">
                                                          <div align="left">  Indicaciones generales de la Recetas </div>
                                                          <textarea  name="nota2" id="nota2"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL." ></textarea>
                                                        </div>
                              

                                                        <div class="form-group col-md-12">

                                                        <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                                                        <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
                                                        <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idR?>">
                                                          
                                                        <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">
                                                        <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">

                                                        <center><button type="button" onclick="agergarItem();" class="btn btn-block btn-primary btn-sm">Guardar</button></center>

                                                        </div>
                                                      </div>
                                              </form>
                                            </div><!-- cierre de la descripcion-->
                                        </div>
                                    </div> <!-- end card -->
                                </div>
                              </div>

                                    <script type="text/javascript">
                                     function Medicamento()
                                      {
                                          $("#codigoProd").select2({
                                           ajax: { 
                                            url: "Ajax_Poslista.php",
                                            type: "post",
                                            dataType: 'json',
                                            delay: 250,
                                            data: function (params) {
                                             return {
                                               searchTerm: params.term // search term
                                             };
                                            },
                                            processResults: function (response) {
                                              return {
                                                 results: response
                                              };
                                            },
                                            cache: true
                                           }
                                          });
                                        
                                      } 


                                    </script>

                                    <br>
                                    <div class="form-group col-md-12" id="div-results" style="overflow:auto"></div>
                                    <br>
                                    <br>

                                    */
                              ?>
                            </div>
                          </div>
                          <!-- Cierre Submodulo Medicamentos -->



                          <!-- Submodulo Insumos -->
                          <div id="Insumos" class="tabcontent">

                            <div class="col-md-4">
                              <br><br>
                              <button type="button" style="display: initial;" data-target="#modalForm5" data-toggle="modal" title="Agregar Insumos"><i class="fa fa-plus"> Agregar Insumos</i>
                              </button>
                            </div>
                            <div class="col-md-8">&nbsp;</div>

                            <input type="hidden" id="Arreglo_Insumos" name="Arreglo_Insumos" value='{"0":{"Tipo_Insumo":null}}'>

                            <div class="table-responsive col-md-12" style="overflow: auto;">
                              <br><br>
                              <table id="tabla_insumos" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th style="width:20%">Tipo Insumo</th>
                                    <th style="width:20%">Cantidad Solicitada</th>
                                    <th style="width:20%">Recomendaciones</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                </tfoot>
                              </table>

                              <script type="text/javascript">
                                function tabla_insumos() {

                                  var data = JSON.parse(document.getElementById("Arreglo_Insumos").value);
                                  var arreglo = [];
                                  var contador = "0";
                                  for (index in data) {
                                    var arreglotemporal = {};

                                    arreglotemporal["Tipo Insumo"] = data[index]["Tipo Insumo"];
                                    arreglotemporal["Cantidad Solicitada"] = data[index]["Cantidad Solicitada"];
                                    arreglotemporal["Comentarios"] = data[index].Comentarios;

                                    arreglo = arreglo.concat(arreglotemporal);
                                    contador++;
                                  }

                                  let pos = 1;

                                  let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

                                  $("#tabla_insumos").dataTable().fnDestroy();

                                  $('#tabla_insumos').DataTable({
                                    data: arreglo_final,
                                    columns: [{
                                        data: "Tipo Insumo"
                                      },
                                      {
                                        data: "Cantidad Solicitada"
                                      },
                                      {
                                        data: "Comentarios"
                                      },
                                    ]
                                  });

                                }
                              </script>

                            </div>

                          </div>
                          <!-- Cierre Submodulo Insumos -->

                        </div>
                      </div>
                      <!--cierre de lista-->

                      <input type="hidden" name="receta" value="<?php echo $idR ?>">
                      <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                      <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                      <div class="form-group col-md-12">
                        <div class="col-md-12">
                          <!--
                          <div class="col-md-12">
                            <a style="padding-right:5px;" href="GO_Controles_Ecografia.php?clienteId=<?php echo $clienteId ?>" title="Agregar Ecografía" target="_blank" class="btn btn-block btn-danger btn-block">Agregar Ecografía</a>
                          </div>
                          -->
                        </div>
                        <label>Ya terminé <input type="checkbox" value="" required=""></label>
                        <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="verificarformulario()">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>
                  </div>

                </form>
                <!--cierre vbox body-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!--
<?php $javascriptocultar = "1"; ?>

<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
<script type="text/javascript">
function verificarformulario()
{
  var elem = document.querySelectorAll("select, input, textarea");   
  console.log($( "#KG_peso" ));  
  elem.forEach(function(userItem) {
    //console.log($( "#KG_peso" ));
    $( "#KG_peso" ).css( "border-color", "red" )
    
    if(userItem.required || userItem.invalid){
      if(userItem.value=="")
        {
          alert('Falta por llenar el campo : '+userItem.getAttribute('data-name'));
       }
    }
  
  }); 
}
</script>
-->


























<!-- modal antecedentes-->

<div class="modal fade" id="modalForm1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Antecedentes</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label for="arreglo_editar">Antecedentes Separados por Comas</label>
          <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
          <input type="text" class="form-control" id="arreglo_editar" name="arreglo_editar" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
          <input type="hidden" name="id_configantecedente" id="id_configantecedente">
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="ActualizarAntecedentes();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
        <a href="#" onclick="EliminarAntecedentes();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>


      </div>
    </div>
  </div>
</div>

<!-- modal agregar mas antecedentes principales -->

<div class="modal fade" id="modalForm_add_personales" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Antecedentes</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Nombre del Antecedente Principal</label>
          <input type="text" class="form-control" id="modal_antecendente_principal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

          <label for="arreglo_editar">Antecedentes Separados por Comas</label>
          <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
          <input type="text" class="form-control" id="modal_antecendente_arreglo" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="CrearAntecedentes();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


      </div>
    </div>
  </div>
</div>

<!-- modal revision-->

<div class="modal fade" id="modalForm2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label for="arreglo_editar">Revision Separados por Comas</label>
          <h5 style="color:red">*Si Actualiza la revision, la pagina se recargara y perdera los datos ingresados*</h5>
          <input type="text" class="form-control" id="arreglo_editar1" name="arreglo_editar1" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
          <input type="hidden" name="id_configantecedente1" id="id_configantecedente1">
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="ActualizarRevision();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
        <a href="#" onclick="EliminarRevision();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>


      </div>
    </div>
  </div>
</div>


<!-- modal agregar mas revisiones principales -->

<div class="modal fade" id="modalForm_add_revision_sistemas" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Nombre Revision Principal</label>
          <input type="text" class="form-control" id="modal_revision_principal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

          <label for="arreglo_editar">Revision Separados por Comas</label>
          <h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
          <input type="text" class="form-control" id="modal_revision_arreglo" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="CrearRevisiones();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


      </div>
    </div>
  </div>
</div>

<!-- modal paraclinico-->

<div class="modal fade" id="modalForm3" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Editar Paraclínicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group row" id="form_div">

          <div class="col-md-6">
            <label>Fecha</label>
            <input type="date" name="Paraclinicos[Fecha]" class="form-control input-lg Paraclinicos_modal" data-title="Fecha">
          </div>
          <div class="col-md-6">
            <label>Tipo de Paraclínico</label>
            <input type="text" name="Paraclinicos[Tipo de Paraclinico]" class="form-control input-lg Paraclinicos_modal" data-title="Tipo">
          </div>

          <div class="col-md-6">
            <label>Valor del Paraclínico</label>
            <input type="number" name="Paraclinicos[Valor]" class="form-control input-lg Paraclinicos_modal" data-title="Valor">
          </div>
          <div class="col-md-6">
            <label>Unidades</label>
            <select name="Paraclinicos[Unidades]" class="form-control input-lg Paraclinicos_modal" data-title="Unidades">
              <option> </option>
              <option>Minuto</option>
              <option>Horas</option>
              <option>Dias</option>
              <option>mm3</option>
              <option>g</option>
              <option>kg</option>
              <option>mg</option>
              <option>ml</option>
              <option>mm</option>
              <option>mmHg</option>
            </select>
          </div>

          <div class="col-md-12">
            <label>Clasificación</label>
            <select name="Paraclinicos[Clasificacion]" class="form-control input-lg Paraclinicos_modal" data-title="Clasificacion">
              <option> </option>
              <option>Positivo</option>
              <option>Negativo</option>
              <option>No Concluyente</option>
              <option>Reactivo</option>
              <option>No Reactivo</option>
              <option>Normal</option>
              <option>Anormal</option>
              <option>Benigno</option>
              <option>Maligno</option>
              <option>Otro</option>
              <option>No Aplica</option>
              <option>Desconocido</option>
            </select>
          </div>

          <div class="col-md-12">
            <label>Comentarios</label>
            <textarea name="Paraclinicos[Comentarios]" class="Paraclinicos_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
            <br><br>
          </div>

        </div>

        <center>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="user-data-next-button" class="btn my-button" onclick="$.when(GuardarParaclinico()).then(tabla_paraclinicos());" disabled>Guardar</button>
        </center>

      </div>
      <script type="text/javascript">
        $(document).ready(function() {
          //Siempre que salgamos de un campo de texto, se chequeará esta función
          $("#form_div input").change(function() {
            var form = $(this).parents("#form_div");
            var check = checkCampos(form);
            //console.log(check);
            if (check) {
              $("#user-data-next-button").prop("disabled", false);
            } else {
              $("#user-data-next-button").prop("disabled", true);
            }
          });
        });

        //Función para comprobar los campos de texto
        function checkCampos(obj) {
          var camposRellenados = true;
          obj.find("input").each(function() {
            var $this = $(this);
            //alert($this.val());
            if ($this.val().length <= 0) {
              camposRellenados = false;
              return false;
            }
          });
          if (camposRellenados == false) {
            return false;
          } else {
            return true;
          }
        }
      </script>
    </div>
  </div>
</div>




<!-- modal incapacidad-->

<div class="modal fade" id="modalForm4" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Crear Incapacidad</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Area de Tratamiento</label>
          <input type="text" class="form-control incapacidad_modal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" data-title="Area Tratamiento" />
          <label>Recurrencia</label>
          <select class="form-control input-lg incapacidad_modal" data-title="Recurrencia">
            <option> </option>
            <option>Unica</option>
            <option>Recurrente</option>
          </select>
          <label>Fecha Inicial Incapacidad</label>
          <input type="date" class="form-control input-lg incapacidad_modal" data-title="Fecha Inicial Incapacidad">
          <label>Fecha Final Incapacidad</label>
          <input type="date" class="form-control input-lg incapacidad_modal" data-title="Fecha Final Incapacidad">
          <label>Comentarios</label>
          <textarea class="incapacidad_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
          <br><br>

          <input type="hidden" name="id_configincapacidad" id="id_configincapacidad">
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="$.when(GuardarIncapacidad()).then(tabla_incapacidades());" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


      </div>
    </div>
  </div>
</div>



<!-- modal insumos-->

<div class="modal fade" id="modalForm5" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Crear Insumos</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Tipo de Insumo</label>
          <input type="text" class="form-control insumo_modal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" data-title="Tipo Insumo" />
          <label>Cantidad Solicitada</label>
          <input type="number" class="form-control insumo_modal" value="" data-title="Cantidad Solicitada" />
          <label>Comentarios</label>
          <textarea class="insumo_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
          <br><br>

          <input type="hidden" name="id_configincapacidad" id="id_configincapacidad">id_configexamenfisico
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="$.when(GuardarInsumos()).then(tabla_insumos());" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


      </div>
    </div>
  </div>
</div>

<!-- modal editar examen fisico -->

<div class="modal fade" id="modalForm_examen_fisico" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Examen Fisico</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" id="nombre_editar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

          <label for="arreglo_editar">Plantilla</label>
          <h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
          <textarea class="form-control" id="plantilla_editar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
          <input type="hidden" name="id_configexamenfisico" id="id_configexamenfisico">
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="ActualizarExamenFisico();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
        <a href="#" onclick="EliminarExamenFisico();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>


      </div>
    </div>
  </div>
</div>

<!-- modal agregar mas examenes fisicos -->

<div class="modal fade" id="modalForm_agregar_examen_fisico" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Editar Revision por Sistemas</h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p class="statusMsg"></p>

        <div class="form-group">
          <label>Nombre</label>
          <input type="text" class="form-control" id="nombre_agregar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" />

          <label for="arreglo_editar">Plantilla</label>
          <h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
          <textarea class="form-control" id="plantilla_agregar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
        </div>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="#" onclick="CrearExamenFisico();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>


      </div>
    </div>
  </div>
</div>


<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>


<?php $rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
if ($rips_activo != 1) : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#FormularioHistoriaClinica").submit(function(e) {
        e.preventDefault();
        if ($(`#CIE10-Principal`).val().trim() != '') {
          $(this).off().submit()
        } else {
          alert("No es posible continuar, el campo 'CÓDIGO DEL DIAGNÓSTICO PRINCIPAL' no se ha seleccionado.");
          $(`a[href='#collapseRIPS']`).click();
        };
      });
    });
  </script>
<?php endif; ?>

<script type="text/javascript">
  CargarDatosAntecedentes();


  function MenuAntecedentes(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";

  }

  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  /////////////// antecedentes (dinamicos) ///////////////////
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////

  function MenuAntecedentes_Personales(evt, tabla) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent1");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks1");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabla).style.display = "flex";
    evt.currentTarget.className += " active";


  }

  function CargarDatosAntecedentes() {

    var Arreglo = <?php echo $arreglo_antecedentes ?>;

    var text = '';
    for (index in Arreglo) {
      var titulo = index.replaceAll(" ", "_");
      text += '<div id="div_' + titulo + '" class="tabcontent1 row"><br>';

      for (i = 0; i <= Arreglo[index].length; i++) {
        if (Arreglo[index][i] !== undefined) {
          text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Antecedentes[' + index + '][]" value="' + Arreglo[index][i] + '" /> ' + Arreglo[index][i] + ' </label></div>';
        }
      }
      text += '<div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Antecedentes[' + index + '][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';

    }
    document.getElementById("TabDinamica").innerHTML = text;
  }



  function EditarAntecedentes(id) {
    var editar = <?php echo json_encode($arreglo_editar) ?>;
    var id_arreglo = id;
    var rango = "";
    editar[id_arreglo].forEach(element => rango += element + ',');
    document.getElementById("arreglo_editar").value = rango;
    document.getElementById("id_configantecedente").value = id;
  };

  function ActualizarAntecedentes() {
    // estas son las variables que enviamos
    var arreglo = $("#arreglo_editar").val();
    var id = $("#id_configantecedente").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarAntecedentes.php",
      data: {
        arreglo: arreglo,
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Antecedente_Tipo: "Editar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function CrearAntecedentes() {
    var Antecendente_Principal = document.getElementById('modal_antecendente_principal').value;
    var Antecendente_Arreglo = document.getElementById('modal_antecendente_arreglo').value;
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarAntecedentes.php",
      data: {
        Antecendente_Principal: Antecendente_Principal,
        Antecendente_Arreglo: Antecendente_Arreglo,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Antecedente_Tipo: "Crear"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function EliminarAntecedentes() {
    var id = $("#id_configantecedente").val();
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarAntecedentes.php",
      data: {
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Antecedente_Tipo: "Eliminar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  }

  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  /////////////// revision sistema (dinamico)//////////////////
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////

  CargarDatosRevision();

  function MenuRevision(evt, table) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks2");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(table).style.display = "block";
    evt.currentTarget.className += " active";
  }

  function CargarDatosRevision() {

    var Arreglo = <?php echo $arreglo_revision ?>;

    var text = '';
    for (index in Arreglo) {
      var titulo = index.replaceAll(" ", "_");
      text += '<div id="div_' + titulo + '" class="tabcontent2 row"><br>';

      for (i = 0; i <= Arreglo[index].length; i++) {
        if (Arreglo[index][i] !== undefined) {
          text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Revision[' + titulo + '][]" value="' + Arreglo[index][i] + '" /> ' + Arreglo[index][i] + ' </label></div>';
        }
      }
      text += '<br><div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Revision[' + titulo + '][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';
    }
    document.getElementById("TabDinamica_revision").innerHTML = text;
  }

  function EditarRevision(id) {
    var editar = <?php echo json_encode($arreglo_editar_revision) ?>;
    var id_arreglo = id;
    var rango = "";
    editar[id_arreglo].forEach(element => rango += element + ',');
    document.getElementById("arreglo_editar1").value = rango;
    document.getElementById("id_configantecedente1").value = id;
  };

  function ActualizarRevision() {
    // estas son las variables que enviamos
    var arreglo = $("#arreglo_editar1").val();
    var id = $("#id_configantecedente1").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarRevision.php",
      data: {
        arreglo: arreglo,
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Editar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function CrearRevisiones() {
    var Revision_Principal = document.getElementById('modal_revision_principal').value;
    var Revision_Arreglo = document.getElementById('modal_revision_arreglo').value;
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarRevision.php",
      data: {
        Revision_Principal: Revision_Principal,
        Revision_Arreglo: Revision_Arreglo,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Crear"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  }

  function EliminarRevision() {
    var id = $("#id_configantecedente1").val();
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarRevision.php",
      data: {
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Eliminar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  }

  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  // llenar paraclinicos//
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////

  function GuardarParaclinico() {

    var multi = $('.Paraclinicos_modal');
    var contador = "0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Paraclinicos").value);
    for (index in puntos) {
      arreglo[contador] = {};
      arreglo[contador]["Fecha"] = puntos[index].Fecha;
      arreglo[contador]["Tipo"] = puntos[index].Tipo;
      arreglo[contador]["Valor"] = puntos[index].Valor;
      arreglo[contador]["Unidades"] = puntos[index].Unidades;
      arreglo[contador]["Clasificacion"] = puntos[index].Clasificacion;
      arreglo[contador]["Comentarios"] = puntos[index].Comentarios;
      contador++;
    }

    arreglo[contador] = {};
    $.each(multi, function(index, item) {

      arreglo[contador][$(item).data('title')] = $(item).val();
    });

    document.getElementById("Arreglo_Paraclinicos").value = JSON.stringify(arreglo);


    $('#modalForm3').modal('hide');

    return "Correcto";
  }

  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  // llenar incapacidades//
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////

  function GuardarIncapacidad() {

    var multi = $('.incapacidad_modal');
    var contador = "0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
    for (index in puntos) {
      arreglo[contador] = {};
      arreglo[contador]["Area Tratamiento"] = puntos[index]["Area Tratamiento"];
      arreglo[contador]["Recurrencia"] = puntos[index].Recurrencia;
      arreglo[contador]["Fecha Inicial Incapacidad"] = puntos[index]["Fecha Inicial Incapacidad"];
      arreglo[contador]["Fecha Final Incapacidad"] = puntos[index]["Fecha Final Incapacidad"];
      arreglo[contador]["Comentarios"] = puntos[index].Comentarios;
      contador++;
    }

    arreglo[contador] = {};
    $.each(multi, function(index, item) {

      arreglo[contador][$(item).data('title')] = $(item).val();
    });

    document.getElementById("Arreglo_Incapacidades").value = JSON.stringify(arreglo);


    $('#modalForm4').modal('hide');
  }



  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  // llenar insumos//
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////

  function GuardarInsumos() {

    var multi = $('.insumo_modal');
    var contador = "0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Insumos").value);
    for (index in puntos) {
      arreglo[contador] = {};
      arreglo[contador]["Tipo Insumo"] = puntos[index]["Tipo Insumo"];
      arreglo[contador]["Cantidad Solicitada"] = puntos[index]["Cantidad Solicitada"];
      arreglo[contador]["Comentarios"] = puntos[index].Comentarios;

      contador++;
    }

    arreglo[contador] = {};
    $.each(multi, function(index, item) {

      arreglo[contador][$(item).data('title')] = $(item).val();
    });

    document.getElementById("Arreglo_Insumos").value = JSON.stringify(arreglo);


    $('#modalForm5').modal('hide');
  }

  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////
  // editar examen fisico//
  ////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////


  function EditarExamenFisico(id) {
    let editar = <?php echo json_encode($arreglo_examenfisico) ?>;

    document.getElementById("nombre_editar_examenfisico").value = editar[id]['Nombre'];
    document.getElementById("plantilla_editar_examenfisico").innerHTML = editar[id]["Plantilla"];
    document.getElementById("id_configexamenfisico").value = id;
  };

  function ActualizarExamenFisico() {
    // estas son las variables que enviamos
    var nombre = $("#nombre_editar_examenfisico").val();
    var plantilla = $("#plantilla_editar_examenfisico").val();
    var id = $("#id_configexamenfisico").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarExamenFisico.php",
      data: {
        nombre: nombre,
        plantilla: plantilla,
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Editar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function CrearExamenFisico() {
    var nombre = document.getElementById('nombre_agregar_examenfisico').value;
    var plantilla = document.getElementById('plantilla_agregar_examenfisico').value;
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarExamenFisico.php",
      data: {
        nombre: nombre,
        plantilla: plantilla,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Crear"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  }

  function EliminarExamenFisico() {
    var id = $("#id_configexamenfisico").val();
    var usuario_id = $("#usuario_id").val();
    $.ajax({
      type: "POST",
      url: "Ajax_ActualizarExamenFisico.php",
      data: {
        id: id,
        usuario_id: usuario_id,
        Ruta: "<?php echo $enlace_actual?>",
        Revision_Tipo: "Eliminar"
      },
      success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  }
</script>


<script type="text/javascript">
  // mover una lista de izquierda a derecha en un nav por medio de botones //
  $('#next_nav').click(function() {
    $("#tab").animate({
      scrollLeft: '+=156px'
    });
  });
  $('#prev_nav').click(function() {
    $("#tab").animate({
      scrollLeft: '-=156px'
    });
  });

  $(document).ready(function() {
    BuscarCie10('acupuntura');
    //el menu de antecedentes despliegue el primero
    MenuAntecedentes_Personales(event, "<?php echo $inicial; ?>");
    var x = document.getElementById('principal_antecedentes');
    x.classList.add("active");
  });
</script>

















<script type="text/javascript">
  //antiguo 
  function verPos() {
    var clientepos = $("#clientepos").val();
    var codigoProd = $("#codigoProd").val();
    $.ajax({
      type: "POST",
      url: "Poslista.php",
      data: {
        clientepos: clientepos,
        codigoProd: codigoProd
      },
      success: function(response) {
        $('#div-resultsM').html(response);
      }
    });
  };

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
        $('#div-results1').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     

      }
    });
  };
  window.onload = listaItem;
  /*
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
  */
  function agergarItem() {
    // estas son las variables que enviamos
    var codigoProd = $("#codigoProd").val();

    var dosis = $("#dosis").val();
    var posologia = $("#posologia").val();
    var frecuencia = $("#frecuencia").val();
    var administracion = $("#administracion").val();
    var duracion = $("#duracion").val();
    var metodo = $("#metodo").val();
    var dosisdia = $("#dosisdia").val();
    var dias = $("#dias").val();
    var via = $("#via").val();
    var total = $("#total").val();
    var nota = $("#nota").val();
    var usuario_id = $("#id_usuario").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();
    var codigoProd1 = $("#codigoProd1").val();
    var nota2 = $("nota2").val();
    var cantidad = $("#cantidad").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "ajax_agregarItemrecetario.php",
      data: {
        codigoProd: codigoProd,
        dosis: dosis,
        posologia: posologia,
        frecuencia: frecuencia,
        duracion: duracion,
        metodo: metodo,
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
        cantidad: cantidad
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo  

      }
    });

    $('#dosis').val('');
    //$('#posologia').val('');
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

    $('#codigoProd').val(null).trigger('change');
    $('#posologia').val(null).trigger('change');
    //$('#codigoProd').val('');
    $('#codigoProd1').val('');
    $('#nota2').val('');

  };

  function eliminarItem(valor) {
    // estas son las variables que enviamos
    var idOper = $("#idOper" + valor).val();
    var usuario_id = $("#id_usuario").val();
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

  function CalcularEdadGestacional(valor) {
    var fechaParto = $("#fechaParto").val();
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "ajax_edadGestacional1.php",
      data: {
        fechaParto: fechaParto
      },
      success: function(response) {
        $('#EdadGestional').val(response);
      }
    });
  }

  var fechaParto =  document.getElementById("fechaParto");
  fechaParto.addEventListener("change", function () {
      var fechaParto = $("#fechaParto").val();
      // aqui enviamos el mensaje por medio de un arreglo     
      $.ajax({
        type: "POST",
        url: "calcularFechaParto.php",
        data: {
          fechaParto: fechaParto
        },
        success: function(response) {
          $('#fechaProbableParto').val(response);
        }
      });
  })

  // window.addEventListener('load', () => {
  //   verIngresos({
  //     cliente_id: <?= $clienteId ?>,
  //     usuario_id: <?= $_SESSION['ID'] ?>
  //   });
  // });

  // function funcionDinamica() {
  //   Select2Dinamico(
  //     "#tipoIngreso", {
  //       selectFrom: "<?= Encriptar("*") ?>",
  //       name: "<?= Encriptar("estadosIngreso") ?>",
  //       value: "<?= Encriptar("id") ?>",
  //       text: "<?= Encriptar("nombreEstado") ?>",
  //       likeWhere: "<?= Encriptar("nombreEstado") ?>",
  //       order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
  //       clausula: {
  //         data: "<?= Encriptar("estado = 1") ?>",
  //         value: [''],
  //       },
  //       carapter: "true",
  //       campoCreador: btoa(JSON.stringify({
  //         nombreCreador: false,
  //         conditionInsert: false,
  //         conditionSelect: false,
  //       })),
  //     }, false, false
  //   );
  // }

  // function verIngresos(data) {
  //   data.cargarCard = "cargarCard";
  //   $.ajax({
  //     type: "POST",
  //     url: "consultarClienteIngresos.php",
  //     data: data,
  //     success: function(response) {
  //       $('#div-Ingresos').html(response);
  //       $("#form-ingresos").submit(function(e) {
  //         e.preventDefault();
  //         var data = new FormData(this);
  //         addEstado(data);
  //       });
  //     }
  //   });
  // };

  // function addEstado(data) {
  //   $.ajax({
  //     type: "POST",
  //     url: "consultarClienteIngresos.php",
  //     processData: false,
  //     contentType: false,
  //     data: data,
  //     success: function(response) {
  //       // console.log(response);
  //       let datos = JSON.parse(response);
  //       if (datos.status == 1) {
  //         verIngresos({
  //           cliente_id: atob(datos.cliente_id),
  //           usuario_id: <?= $_SESSION['ID'] ?>
  //         });
  //       } else {
  //         alert("El estado no fue agregado");
  //       }
  //     }
  //   });
  // }

  // function verEstado(data) {
  //   data.cargarEstadoTipo = "cargarEstadoTipo";
  //   $.ajax({
  //     type: "POST",
  //     url: "consultarClienteIngresos.php",
  //     data: data,
  //     success: function(response) {
  //       $('#div-campoAdicional').html(response);
  //     }
  //   });
  // };

  // function cerrarEstado(data) {
  //   data.cerrarEstado = "cerrarEstado";
  //   $.ajax({
  //     type: "POST",
  //     url: "consultarClienteIngresos.php",
  //     data: data,
  //     success: function(response) {
  //       let datos = JSON.parse(response);
  //       if (datos.status) {
  //         verIngresos({
  //           cliente_id: atob(datos.cliente_id),
  //           usuario_id: <?= $_SESSION['ID'] ?>
  //         });
  //       } else {
  //         console.log(response);
  //         alert("El estado no se ha Cerrado");
  //       }
  //     }
  //   });
  // };
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';

$rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
include 'IR_ModalRips.php';
?>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php 
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Ginecologia";//nombre de la tabla de la base de datos de la historia
/* include 'AutoGuardados/Ginecologia/AutoGuardado_Historia.php'; */
include 'AutoGuardado_Historia.php';
?>