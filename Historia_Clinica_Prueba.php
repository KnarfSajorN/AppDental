<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
    $ID = $_SESSION['ID'];

  $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


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

$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{
  $nombre_cliente=$row_recordset32['nombre_cliente'];
  $fechaNacimiento=$row_recordset32['fechaNacimiento'];
}



?>
<style type="text/css">
    .select2-selection--multiple.select2-selection--multiple.select2-selection--multiple
    {
      min-height: 47px!important;
      padding: 5px!important;
    }
    input[type=radio]:focus,input[type=checkbox]:focus {
    outline: none;}

    .select2-container .select2-selection--single 
    {
      height: 47px!important;
      padding: 15px!important;
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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta médica, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta médica  </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
              

              <div class="box box-solid">
                <!-- /.box-header -->
                <form action="Guardar_Historia_Clinica_Prueba.php" method="POST" name="formularioActualizarcliente">
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
	                        <?php echo datosPacientes($clienteId);?>

                          <div class="form-group">
                              <div align="left">Motivo consulta</div>


                              <div align="right">
                              <!-- el numero del id tanto del boton(boton"0"),textarea(ReconocimientoVoz0) y la funcion [toggleStartStop(0)] sirve para relacionar el boton con el textarea correspondiente-->
                              <!--
                              <button type="button" id="boton0" class="reconocimiento_de_voz" onclick="toggleStartStop(0)" style="float: right;position: relative;top: 50px;padding: 5px;margin-bottom: 10px;"></button>-->
                              </div>  


                              <textarea  id="ReconocimientoVoz0" name="motivoConsulta"  class="" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>

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

	                        <div class="box-body">

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
	                              <option value="Conyuge">Conyuge</option>
	                              <option value="Padres">Padres</option>
	                              <option value="Otro">Otro</option>
	                              <option value="No aplica">No aplica</option>
	                              <option value="Ninguno">Ninguno</option>
	                            </select>
	                          </div>

	                          <div class="col-md-6">
	                            <label>Telefono</label>
	                            <input type="text" name="InformacionAcudiente[Telefono Acudiente]" class="form-control">
	                          </div>

	                          <div class="col-md-6">
	                            <label>Medico o Institucion que remite</label>
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
	                        
	                        <div class="box-body">

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
	                              <textarea  name="EnfermedadActual[Motivo de Consulta]" class="ejemplo"placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" ></textarea>
	                          </div>
	                          
	                          <div class="form-group col-md-12">
	                            <label> Enfermedad actual</label>
	                            <textarea name="EnfermedadActual[Enfermedad Actual]"  class="ejemplo"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" ></textarea>
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
	                          <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Ginecobstetricos')">Ginecobstetricos</button>
	                          <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Familiares')">Familiares</button>
	                        </div>
	                        <!-- barra de menu final -->

	                        <div id="Personales" class="tabcontent">
	                          <h3>Antecedentes Personales</h3><br>

	                          <!-- esta es la barra del menu-->
                            
	                          <div class="tab" style="display: flex;overflow: auto;">
	                          	<?php/*

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
                              $arreglo_editar=[];
                              $arreglo_antecedentes=[];

                              function antecedentes() 
                              {
                                include 'funciones/conn3.php';
                                $QueryAntecedentes=mysqli_query($conn3,"SELECT * FROM  ConfigAntecedentes");
                                while($rowAntecedentes=mysqli_fetch_array($QueryAntecedentes))
                                {
                                  $contador++;
                                  global $arreglo_editar,$arreglo_antecedentes;
                                  $id=$rowAntecedentes['id'];
                                  $Titulo = str_replace(" ", "_", $rowAntecedentes['Nombre']);
                                  //para el editar arreglo
                                  $arreglo_editar[$id] = json_decode($rowAntecedentes['Arreglo']);
                                  //para crear los check
                                  $nombre = $rowAntecedentes['Nombre'];
                                  $arreglo_check[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
                                  if($contador=="1"){$GLOBALS["inicial"]="div_".$Titulo;}
                                ?>

                                 <li class="fancyTab tablinks1" style="min-width: 130px;left: 1px;" onclick="MenuAntecedentes_Personales(event, <?php echo "'div_".$Titulo."'";?>)" <?php if($contador=="1"){echo 'id="principal_antecedentes"';}?>>
                                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>

                                    <div style="display: contents"><a data-toggle="modal" data-target="#modalForm1" onclick="EditarAntecedentes(<?php echo $id;?>);" title="Editar Antecedentes"><i class="fa fa-pencil" style="font-size: 15px;position: absolute;left: 100px;top: 0px;width: 20%;"></i></a>
                                    </div>

                                    <span class="fa fa-heart" onclick="this.className='fa fa-heart animate__animated animate__heartBeat animate__repeat-3';"></span><span><?php echo $nombre?></span>
                                    <div class="whiteBlock"></div>
                                  </li>

                                <?php
                                }
                                //para crear los check
                                $arreglo_antecedentes = json_encode($arreglo_check);
                              }
                              ;
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
		                          <h3>Antecedentes Ginecobstetricos</h3>
                              </div>

                              <div class="col-md-3">
                              <label>Fecha de ultimo parto</label>
                              <input type="date" name="AntecentesGinecobstetricos[Fecha de ultimo parto]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-3">
                              <label>Fecha de ultima menstruacion</label>
                              <input type="date" name="AntecentesGinecobstetricos[Fecha de ultima menstruacion]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-3">
                              <label>Metodo de planificacion</label>
                              <select name="AntecentesGinecobstetricos[Metodo de planificacion]"  class="form-control input-lg">
                                <option value="" selected>Seleccione</option>
                                <option>Barrera</option>
                                <option>Anticonceptivos Orales</option>
                                <option>Anticonceptivos Inyectables</option>
                                <option>DIU</option>
                                <option>Naturales</option>
                                <option>Quirurgicos</option>
                                <option>Implantes Subdermicos</option>
                                <option>No Planifica</option>
                                <option>No Aplica</option>
                              </select>
                              </div>
                              <div class="col-md-3">
                              <label>Confiable</label>
                              <select name="AntecentesGinecobstetricos[Confiable]"  class="form-control input-lg">
                                <option value="" selected>Seleccione</option>
                                <option>Si</option>
                                <option>No</option>
                              </select>
                              </div>

                              <div class="col-md-12">
                              <textarea  name="AntecentesGinecobstetricos[Mas detalles del metodo de planificacion]"    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="Mas detalles del metodo de planificacion"></textarea>
                              </div>

                              <div class="col-md-12">
                              <h3>Perfil Obstetrico</h3>
                              </div>

                              <div class="col-md-4">
                              <label>Nacimientos</label>
                              <input type="number" name="AntecentesGinecobstetricos[Nacimientos]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-4">
                              <label>Embarazos</label>
                              <input type="number" name="AntecentesGinecobstetricos[Embarazos]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-4">
                              <label>Partos</label>
                              <input type="number" name="AntecentesGinecobstetricos[Partos]"  class="form-control input-lg">
                              </div>

                              <div class="col-md-4">
                              <label>Cesareas</label>
                              <input type="number" name="AntecentesGinecobstetricos[Cesareas]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-4">
                              <label>Abortos</label>
                              <input type="number" name="AntecentesGinecobstetricos[Abortos]"  class="form-control input-lg">
                              </div>
                              <div class="col-md-4">
                              <label>Molas</label>
                              <input type="number" name="AntecentesGinecobstetricos[Molas]"  class="form-control input-lg">
                              </div>

                              <div class="col-md-4">
                              <label>Ectopicos</label>
                              <input type="number" name="AntecentesGinecobstetricos[Ectopicos]"  class="form-control input-lg">
                              </div>

                              <div class="col-md-12">
                              <button type="button" data-toggle="collapse" data-target="#masdetallesginecologicos">Mas Detalles</button>
                              </div>

                              <div id="masdetallesginecologicos" class="collapse col-md-12">
                                <div class="col-md-4">
                                <label>Menarquia (Edad)</label>
                                <input type="number" name="AntecentesGinecobstetricos[Menarquia]"  class="form-control input-lg">
                                </div>
                                <div class="col-md-4">
                                <label>Pubarquia (Edad)</label>
                                <input type="number" name="AntecentesGinecobstetricos[Pubarquia]"  class="form-control input-lg">
                                </div>
                                <div class="col-md-4">
                                <label>Telarquia (Edad)</label>
                                <input type="number" name="AntecentesGinecobstetricos[Molas]"  class="form-control input-lg">
                                </div>

                                <div class="col-md-6">
                                <label>Sexarquia (Edad)</label>
                                <input type="number" name="AntecentesGinecobstetricos[Sexarquia]"  class="form-control input-lg">
                                </div>
                                <div class="col-md-6">
                                <label>Compañeros Sexuales (Cantidad)</label>
                                <input type="number" name="AntecentesGinecobstetricos[Compañeros Sexuales]"  class="form-control input-lg">
                                </div>

                                <div class="col-md-12">
                                <textarea  name="AntecentesGinecobstetricos[Mas detalles ciclos menstruales y demas]"    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="Mas detalles ciclos menstruales y demas" ></textarea>
                                </div>

                                <div class="col-md-3">
                                <label>Regularidad Ciclo Menstrual</label>
                                <select name="AntecentesGinecobstetricos[Regularidad Ciclo Menstrual]"  class="form-control input-lg">
                                  <option value="" selected>Seleccione</option>
                                  <option>Si</option>
                                  <option>No</option>
                                </select>
                                </div>
                                <div class="col-md-4">
                                <label>Fecha de Ultima Citologia</label>
                                <input type="date" name="AntecentesGinecobstetricos[Fecha de Ultima Citologia]"  class="form-control input-lg">
                                </div>
                                <div class="col-md-3">
                                <label>Embarazada Actualmente</label>
                                <select name="AntecentesGinecobstetricos[Embarazada Actualmente]"  class="form-control input-lg">
                                  <option value="" selected>Seleccione</option>
                                  <option>Si</option>
                                  <option>No</option>
                                </select>
                                </div>

                                <div class="col-md-12">
                                <textarea  name="AntecentesGinecobstetricos[Observaciones de gestaciones anteriores]"    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;" placeholder="Observaciones de gestaciones anteriores" ></textarea>
                                </div>

                              </div>
                              <!-- cierre div mas detalles-->

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
                              


                              <style type="text/css"> .textarea_noflex {overflow: scroll;resize: none;}</style>
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
                                      <th style="width:2%">Accion</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbody_antecedentesfamiliares">
                                    <script type="text/javascript">
                                      function AgregarFamiliar()
                                      {
                                      var tableBody = document.getElementById('tbody_antecedentesfamiliares');
                                      var cantidad = document.getElementById('cantidad_AgregarFamiliar').value;
                                      cantidad++;
                                        for (var i = 0; i < cantidad; i++) 
                                        {
                                          var tbodys = document.querySelectorAll("#tbody_antecedentesfamiliares > tr");
                                          var trs = tbodys.length;

                                          if ((!document.getElementById("AnteFamiliar_1"+i)) && (!document.getElementById("AnteFamiliar_2"+i)) && (!document.getElementById("AnteFamiliar_3"+i)) && (!document.getElementById("AnteFamiliar_4"+i)) && (!document.getElementById("AnteFamiliar_5"+i)) && (!document.getElementById("AnteFamiliar_6"+i)) && (trs<=cantidad)) 
                                          {

                                            var tr = document.createElement('tr');
                                            tr.setAttribute("id", "tr_antecedentesfamiliares"+i);
                                            
                                            tableBody.appendChild(tr);

                                            var Dato={};

                                             Dato[0]='<input type="text" name="AntecedentesFamiliares['+i+'][Parentesco]" id="AnteFamiliar_1'+i+'" class="form-control input-lg" style="width:100%;">';
                                             Dato[1]='<input type="date" name="AntecedentesFamiliares['+i+'][Fecha Diagnostico]" id="AnteFamiliar_2'+i+'" class="form-control input-lg" style="width:100%;">';
                                             Dato[2]='<select name="AntecedentesFamiliares['+i+'][CIE-10][]" id="AnteFamiliar_3'+i+'" onclick="BuscarCie10('+i+');" style="width:100%" multiple><option value=" ">Seleccione... </option>';
                                             Dato[3]='<textarea name="AntecedentesFamiliares['+i+'][Diagnostico]" id="AnteFamiliar_4'+i+'" class="textarea_noflex form-control input-lg" style="width:100%;"></textarea>';
                                             Dato[4]='<textarea name="AntecedentesFamiliares['+i+'][Comentarios]" id="AnteFamiliar_5'+i+'" class="textarea_noflex form-control input-lg" style="width:100%;"></textarea>';
                                             Dato[5]='<a href="#"  style="font-size: 20px;" id="AnteFamiliar_6'+i+'"  onclick="EliminarFamiliar('+i+');"><i class="fas fa-trash-alt"></i></a>';

                                            for (var j = 0; j < 6; j++) {
                                              var td = document.createElement('td');
                                              td.setAttribute("style","text-align: center;vertical-align: middle;");
                                              td.innerHTML= (Dato[j]);
                                              tr.appendChild(td);
                                            }

                                            BuscarCie10(i);
                                          }
                                        }
                                      document.getElementById('cantidad_AgregarFamiliar').value=cantidad;

                                      return "hecho";
                                      }

                                      function EliminarFamiliar(valor)
                                      {
                                        document.getElementById("tr_antecedentesfamiliares"+valor).remove();
                                        document.getElementById('cantidad_AgregarFamiliar').value=(document.getElementById('cantidad_AgregarFamiliar').value-1);
                                      }
                                      
                                     
                                    </script>

                                  </tbody>
                                  
                                </table>

                                <script type="text/javascript">
                                  function BuscarCie10(valor)
                                  {
                                    

                                     $("#AnteFamiliar_3"+valor).select2({
                                      ajax: { 
                                       url: "Ajax_cie10.php",
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
                                <script type="text/javascript">
                                  function AgregarFamiliar_Inicial()
                                  {
                                    
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
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">
                              Revision por sistemas
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">

                          <br>  
                           <!-- esta es la barra del menu-->
                            <button type="button" style="position: relative;left: 47.9%;top: -1px;background-color: #3c8dbc;">
                              <a data-toggle="modal" data-target="#modalForm_add_revision_sistemas" onclick="" title="Agregar Antecedentes"><i class="fa fa-plus" style="color:white;"></i></a>
                            </button>

                           <div style="float:left;display:none" id="prev_nav"><i class="glyphicon glyphicon-chevron-left"></i></div>
                           <div style="float:right;display:none" id="next_nav"><i class="glyphicon glyphicon-chevron-right"></i></div>
                            <div class="tab" id="tab" style="display: flex;overflow: hidden;">
                              <ul class="nav nav-tabs" role="tablist" style="display: flex;overflow: auto;">
                              <style type="text/css">
                                .nav-tabs::-webkit-scrollbar {
                                height: 6px;    /* Tamaño del scroll en horizontal */
                              }
                              .nav-tabs::-webkit-scrollbar-thumb {
                                    background-color: #00000080;
                                    border-radius: 20px;
                              }
                              </style>
                              <?php

                              $arreglo_editar_revision=[];
                              $arreglo_revision=[];
                              function revision() 
                              {
                                include 'funciones/conn3.php';
                                $QueryAntecedentes=mysqli_query($conn3,"SELECT * FROM  ConfigRevisionSistemas");
                                while($rowAntecedentes=mysqli_fetch_array($QueryAntecedentes))
                                {
                                  global $arreglo_editar_revision,$arreglo_revision;
                                  $id=$rowAntecedentes['id'];
                                  $Titulo = str_replace(" ", "_", $rowAntecedentes['Nombre']);
                                  //para el editar arreglo
                                  $arreglo_editar_revision[$id] = json_decode($rowAntecedentes['Arreglo']);

                                  //para crear los check
                                  $nombre = $rowAntecedentes['Nombre'];
                                  $arreglo_check[$nombre]  = json_decode($rowAntecedentes['Arreglo']);
                                ?>
                                 <button type="button" class="tablinks2" onclick="MenuRevision(event, <?php echo "'div_".$Titulo."'";?>)"><?php echo $rowAntecedentes['Nombre']?>
                                  <a data-toggle="modal" data-target="#modalForm2" onclick="EditarRevision(<?php echo $id;?>);" title="Editar Antecedentes"><i class="fa fa-pencil"></i></a>
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
                            <!-- barra de menu final -->

                            <div id="TabDinamica_revision">
                              <!-- aqui el contenido se llena por javascript-->
                            </div>

                          <br><br>
                        </div>

                      </div>
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

                          <div class="box-body">

                            <div class="col-md-4">
                              <label>Peso Corporal [Kg]</label>
                              <input type="number" name="SignosVitales[Peso Corporal]" id="KG_peso" class="form-control input-lg" onchange="IMC();">
                            </div>
                            <div class="col-md-4">
                              <label>Altura [cm]</label>
                              <input type="number" name="SignosVitales[Altura]" id="CM_altura" class="form-control input-lg" onchange="IMC();">
                            </div>
                            <div class="col-md-4">
                              <label>IMC</label>
                              <input type="number" name="SignosVitales[IMC]" id="IMC_Paciente" class="form-control input-lg" step="0.01">
                            </div>
                            <script>
                              function IMC()
                              {
                                m1 = document.getElementById("KG_peso").value;
                                m2 = document.getElementById("CM_altura").value;
                                r = m1/((m2/100)*(m2/100));
                                document.getElementById("IMC_Paciente").value = r.toFixed(2);
                              }
                            </script>

                            <div class="col-md-4">
                              <label>Frecuencia Respiratoria</label>
                              <input type="number" name="SignosVitales[Frecuencia Respiratoria]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Frecuencia Cardiaca</label>
                              <input type="number" name="SignosVitales[Frecuencia Cardiaca]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Presion Arterial Diastolica [mmHg]</label>
                              <input type="number" name="SignosVitales[Presion Arterial Diastolica]"  class="form-control input-lg">
                            </div>

                            <div class="col-md-4">
                              <label>Presion Arterial Sistolica [mmHg]</label>
                              <input type="number" name="SignosVitales[Presion Arterial Sistolica]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Temperatura Corporal [C°]</label>
                              <input type="number" name="SignosVitales[Temperatura Corporal]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Saturacion Oxigeno [%]</label>
                              <input type="number" name="SignosVitales[Saturacion Oxigeno]"  class="form-control input-lg">
                            </div>

                            <div class="col-md-4">
                              <label>Porcentaje de Grasa Corporal [%]</label>
                              <input type="number" name="SignosVitales[Porcentaje de Grasa Corporal]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Circunferencia Abdominal [cm]</label>
                              <input type="number" name="SignosVitales[Circunferencia Abdominal]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Circunferencia de Cintura [cm]</label>
                              <input type="number" name="SignosVitales[Circunferencia de Cintura]"  class="form-control input-lg">
                            </div>

                            <div class="col-md-4">
                              <label>Tension Arterial Media</label>
                              <input type="number" name="SignosVitales[Tension Arterial Media]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Peso / Edad</label>
                              <input type="number" name="SignosVitales[Peso / Edad]"  class="form-control input-lg">
                            </div>
                            <div class="col-md-4">
                              <label>Peso / Altura</label>
                              <input type="number" name="SignosVitales[Peso / Altura]"  class="form-control input-lg">
                            </div>
                          

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
                              <button type="button" style="display: initial;" data-target="#modalForm3" data-toggle="modal" title="Agregar Paraclinico"><i class="fa fa-plus"> Agregar Paraclinico</i>
                              </button>
                            </div>
                            <div class="col-md-8">&nbsp;</div>

                            <input  type="hidden" id="Arreglo_Paraclinicos" name="Arreglo_Paraclinicos" value='{"0":{"Fecha":null}}'>


                            <div class="table-responsive col-md-12" style="overflow: auto;">
                              <br><br>
                              <table id="tabla_paraclinicos" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                  <tr>
                                    <th style="width:15%">Fecha</th>
                                    <th style="width:10%">Tipo Paraclinico</th>
                                    <th style="width:20%">Valor</th>
                                    <th style="width:25%">Unidades</th>
                                    <th style="width:28%">Clasificacion</th>
                                    <th style="width:2%">Comentarios</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>

                                </tfoot>
                              </table>

                              <script type="text/javascript">

                                function tabla_paraclinicos()
                                {
                                  
                                    var data = JSON.parse(document.getElementById("Arreglo_Paraclinicos").value);
                                    var arreglo=[];
                                    var contador="0";
                                    
                                    for(index in data) 
                                    {
                                      var arreglotemporal = {};
                                      arreglotemporal["Fecha"]=data[index].Fecha;
                                      arreglotemporal["Tipo"]=data[index].Tipo;
                                      arreglotemporal["Valor"]=data[index].Valor;
                                      arreglotemporal["Unidades"]=data[index].Unidades;
                                      arreglotemporal["Clasificacion"]=data[index].Clasificacion;
                                      arreglotemporal["Comentarios"]=data[index].Comentarios;
                                      
                                      arreglo = arreglo.concat(arreglotemporal);
                                      contador++;
                                    }

                                    let pos = 1;

                                    let arreglo_final = arreglo.splice(pos, contador);// para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

                                    $("#tabla_paraclinicos").dataTable().fnDestroy()

                                      $('#tabla_paraclinicos').DataTable( {
                                          data: arreglo_final,
                                          columns: [
                                              { data: "Fecha" },
                                              { data: "Tipo" },
                                              { data: "Valor" },
                                              { data: "Unidades" },
                                              { data: "Clasificacion" },
                                              { data: "Comentarios" },
                                          ]
                                      } );

                                  
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
                              Examenes y Laboratorios
                            </a>
                          </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse">

                          <div class="box-body">
                            <label>Seleccione Examen de Imagenologia</label>
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
                                                 function CargarModuloExamenFisico()
                                                 {
                                                 		var Arreglo = [];
                                                 		var ArregloId = [];
                                                 	 <?php
                                                 	 $queryList=mysqli_query($conn3,"SELECT Nombre,Plantilla,id FROM  ConfigExamenFisico");
                                                 	 while($rowMotorizado=mysqli_fetch_array($queryList))
                                                 	 {
                                                 	   $Nombre=$rowMotorizado['Nombre'];
                                                 	   $id=$rowMotorizado['id'];
                                                 	   $Plantilla=$rowMotorizado['Plantilla'];

                                                 	   // es un arreglo para el modulo de editar
                                                 	   $arreglo_examenfisico[$id]['Nombre']=$Nombre;
                                                 	   $arreglo_examenfisico[$id]['Plantilla']=$Plantilla;

                                                 	 ?>
                                                 	 Arreglo.push( [ "<?php echo $Nombre?>"]);
                                                 	 ArregloId.push( [ "<?php echo $id?>"]);
                                                 	 <?php
                                                 	 }
                                                 	 
                                                 	 ?>
                                                   
                                                   var contador="1";
                                                   var text='';
                                                   for(index in Arreglo) 
                                                   {
                                                   
                                                     text += '<div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><a role="button" data-toggle="collapse"  href="#ExamenFisico'+contador+'" aria-expanded="true" aria-controls="ExamenFisico'+contador+'">'+Arreglo[index]+'</a></h4></div>';
                                                       
                                                     text += '<div id="ExamenFisico'+contador+'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"><div class="row"><div class="col-md-12"><button type="button" data-toggle="modal" data-target="#modalForm_examen_fisico" onclick="EditarExamenFisico('+ArregloId[index]+')" title="Editar Examen Fisico" style="float: right;background-color:#3c8dbc;"><i class="fa fa-pencil" style=""></i></button></div><div class="col-md-4"><br>';

                                                     text +='<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico['+Arreglo[index]+'][]" value="No Evaluado" checked />No Evaluado</label>';
                                                     text +='<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico['+Arreglo[index]+'][]" value="Normal" />Normal</label>';
                                                     text +='<label style="display:block"><input type="radio" class="option-input radio" name="ExamenFisico['+Arreglo[index]+'][]" value="Anormal" />Anormal</label><br></div>';

                                                     text += '<div class="col-md-8"><br><textarea name="ExamenFisico['+Arreglo[index]+'][]"  id="ExamenFisicoTextArea'+ArregloId[index]+'" class="form-control input-lg" placeholder="Hallazgos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea><a onclick="Plantilla_ExamenFisico('+ArregloId[index]+')" title="Mostrar Plantilla" style="float: right;top: -150px;left: 30px;position: relative;"><i class="iconify" data-icon="ri:file-paper-2-line"></i></button></div></div>';

                                                     text += '</div>';

                                                     contador++;
                                                   }
                                                   document.getElementById("ModuloExamenFisico").innerHTML = text;
                                                 }

                                                 function Plantilla_ExamenFisico(valor)
                                                 {
                                                 	  let editar = <?php echo json_encode($arreglo_examenfisico)?>;
                                                 	  console.log(editar);
                                                 	  console.log(editar[valor]['Plantilla']);
                                                 	  document.getElementById("ExamenFisicoTextArea"+valor).value =editar[valor]['Plantilla'];  	
                                                 }
                                                 CargarModuloExamenFisico();
                                                </script>


                                             <div class="col-md-12"><button type="button" data-toggle="modal" data-target="#modalForm_agregar_examen_fisico"  title="Agregar Examen Fisico" style="float: right;background-color:#3c8dbc;"><i class="fa fa-plus" style=""></i>Agregar Mas Examenes Fisicos</button></div>
                                        </div>
                                    </div>
                                </div>
                            
                          </div>
                        </div>
                      </div>
                       <!--cierre de lista-->





                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTen">
                              Organos de los Sentidos
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-6">
                              <label>Ojos</label><textarea name="OrganoSentidos[Ojos]"  class="form-control input-lg" placeholder="Ojos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Oidos</label><textarea name="OrganoSentidos[Oidos]"  class="form-control input-lg" placeholder="Oidos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Lengua/Sabores</label><textarea name="OrganoSentidos[Lengua/Sabores]"  class="form-control input-lg" placeholder="Lengua/Sabores" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
                      <!--cierre de lista-->




                      <!-- lista -->
                      <div class="panel box box-primary">
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
                              <label>Deseos</label><textarea name="SintomasGenerales[Deseos]"  class="form-control input-lg" placeholder="Deseos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Sed</label><textarea name="SintomasGenerales[Sed]"  class="form-control input-lg" placeholder="Sed" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Transpiracion</label><textarea name="SintomasGenerales[Transpiracion]"  class="form-control input-lg" placeholder="Transpiracion" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Aversiones</label><textarea name="SintomasGenerales[Aversiones]"  class="form-control input-lg" placeholder="Aversiones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Calor Vital</label><textarea name="SintomasGenerales[Calor Vital]"  class="form-control input-lg" placeholder="Calor Vital" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                            <div class="col-md-6">
                              <label>Sueños</label><textarea name="SintomasGenerales[Sueños]"  class="form-control input-lg" placeholder="Sueños" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
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
                              <select name="DiagnosticoConsulta[CIE10][]" id="AnteFamiliar_3acupuntura"onclick="BuscarCie10('acupuntura');" style="width:100%" multiple><option value=" ">Seleccione... </option>

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
                      <!--cierre de lista-->




                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFourteen">
                              Impresion
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFourteen" class="panel-collapse collapse">

                          <div class="box-body">

                            <div class="col-md-12">
                              <textarea name="Impresion[Impresion]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
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
                              <textarea name="PlanManejo[Plan de Manejo]"  class="form-control input-lg" placeholder="" style="width: 100%; min-height: 60px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;max-width: 100%;" ></textarea>
                            </div>

                          </div>

                        </div>
                      </div>
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

                            <input  type="hidden" id="Arreglo_Incapacidades" name="Arreglo_Incapacidades" value='{"0":{"Area_Tratamiento":null}}'>

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
                                <tbody >

                                </tbody>
                                <tfoot>
                                </tfoot>
                              </table>

                              <script type="text/javascript">

                                function tabla_incapacidades()
                                {
                                  
                                    var data = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
                                    var arreglo=[];
                                    var contador="0";
                                    for(index in data) 
                                    {
                                      var arreglotemporal = {};

                                      arreglotemporal["Area Tratamiento"]=data[index]["Area Tratamiento"];
                                      arreglotemporal["Recurrencia"]=data[index].Recurrencia;
                                      arreglotemporal["Fecha Inicial Incapacidad"]=data[index]["Fecha Inicial Incapacidad"];
                                      arreglotemporal["Fecha Final Incapacidad"]=data[index]["Fecha Final Incapacidad"];
                                      arreglotemporal["Comentarios"]=data[index].Comentarios;
                                      
                                      arreglo = arreglo.concat(arreglotemporal);
                                      contador++;
                                    }

                                    let pos = 1;

                                    let arreglo_final = arreglo.splice(pos, contador);// para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden


                                    $("#tabla_incapacidades").dataTable().fnDestroy();

                                      $('#tabla_incapacidades').DataTable( {
                                          data: arreglo_final,
                                          columns: [
                                              { data: "Area Tratamiento" },
                                              { data: "Recurrencia" },
                                              { data: "Fecha Inicial Incapacidad" },
                                              { data: "Fecha Final Incapacidad" },
                                              { data: "Comentarios" },
                                          ]
                                      } );

                                  
                                }
                                
                              </script>

                            </div>

                          </div>
                          <!-- Cierre Submodulo Incapacidades -->

                          <!-- Submodulo Medicamentos -->

                          <div id="Medicamentos" class="tabcontent">

                            <div class="box-body">                    

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

                            <input  type="hidden" id="Arreglo_Insumos" name="Arreglo_Insumos" value='{"0":{"Tipo_Insumo":null}}'>

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
                                <tbody >

                                </tbody>
                                <tfoot>
                                </tfoot>
                              </table>

                              <script type="text/javascript">

                                function tabla_insumos()
                                {
                                  
                                    var data = JSON.parse(document.getElementById("Arreglo_Insumos").value);
                                    var arreglo=[];
                                    var contador="0";
                                    for(index in data) 
                                    {
                                      var arreglotemporal = {};

                                      arreglotemporal["Tipo Insumo"]=data[index]["Tipo Insumo"];
                                      arreglotemporal["Cantidad Solicitada"]=data[index]["Cantidad Solicitada"];
                                      arreglotemporal["Comentarios"]=data[index].Comentarios;
                                      
                                      arreglo = arreglo.concat(arreglotemporal);
                                      contador++;
                                    }

                                    let pos = 1;

                                    let arreglo_final = arreglo.splice(pos, contador);// para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

                                    $("#tabla_insumos").dataTable().fnDestroy();

                                      $('#tabla_insumos').DataTable( {
                                          data: arreglo_final,
                                          columns: [
                                              { data: "Tipo Insumo" },
                                              { data: "Cantidad Solicitada" },
                                              { data: "Comentarios" },
                                          ]
                                      } );
                                  
                                }
                                
                              </script>

                            </div>

                          </div>
                          <!-- Cierre Submodulo Insumos -->

                        </div>
                      </div>
                      <!--cierre de lista-->



                      <input  type="hidden" name="receta"  value="<?php echo $idR?>">
                      <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                      <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                      <div class="form-group col-md-12">
                        <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
                        <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
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
                        <label for="arreglo_editar">Antecedentes Separados por Comas</label><h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
                        <input type="text" class="form-control" id="arreglo_editar" name="arreglo_editar" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>
                        <input  type="hidden" name="id_configantecedente" id="id_configantecedente">
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="ActualizarAntecedentes();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                    <a href="#"  onclick="EliminarAntecedentes();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>

                
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
                        <input type="text" class="form-control" id="modal_antecendente_principal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>

                        <label for="arreglo_editar">Antecedentes Separados por Comas</label><h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
                        <input type="text" class="form-control" id="modal_antecendente_arreglo" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="CrearAntecedentes();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>

                
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
                        <label for="arreglo_editar">Revision Separados por Comas</label><h5 style="color:red">*Si Actualiza la revision, la pagina se recargara y perdera los datos ingresados*</h5>
                        <input type="text" class="form-control" id="arreglo_editar1" name="arreglo_editar1" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>
                        <input  type="hidden" name="id_configantecedente1" id="id_configantecedente1">
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="ActualizarRevision();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                    <a href="#"  onclick="EliminarRevision();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>

                
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
                        <input type="text" class="form-control" id="modal_revision_principal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>

                        <label for="arreglo_editar">Revision Separados por Comas</label><h5 style="color:red">*Si Actualiza los antecedentes, la pagina se recargara y perdera los datos ingresados*</h5>
                        <input type="text" class="form-control" id="modal_revision_arreglo" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="CrearRevisiones();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>

                
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
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Editar Paraclinicos</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                
                    <div class="form-group" id="form_div">

                      <div class="col-md-6">
                        <label>Fecha</label>
                        <input type="date" name="Paraclinicos[Fecha]"  class="form-control input-lg Paraclinicos_modal" data-title="Fecha">
                      </div>
                      <div class="col-md-6">
                        <label>Tipo de Paraclinico</label>
                        <input type="text" name="Paraclinicos[Tipo de Paraclinico]"  class="form-control input-lg Paraclinicos_modal" data-title="Tipo">
                      </div>

                      <div class="col-md-6">
                        <label>Valor del Paraclinico</label>
                        <input type="number" name="Paraclinicos[Valor]"  class="form-control input-lg Paraclinicos_modal" data-title="Valor">
                      </div>
                      <div class="col-md-6">
                        <label>Unidades</label>
                        <select name="Paraclinicos[Unidades]"  class="form-control input-lg Paraclinicos_modal" data-title="Unidades">
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
                        <label>Clasificacion</label>
                        <select name="Paraclinicos[Clasificacion]"  class="form-control input-lg Paraclinicos_modal" data-title="Clasificacion">
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
                        <textarea  name="Paraclinicos[Comentarios]" class="Paraclinicos_modal"style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
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
                  if(check) {
                    $("#user-data-next-button").prop("disabled", false);
                  }
                  else {
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
                  if( $this.val().length <= 0 ) {
                    camposRellenados = false;
                    return false;
                  }
                });
                if(camposRellenados == false) {
                  return false;
                }
                else {
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
                        <input type="text" class="form-control incapacidad_modal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" data-title="Area Tratamiento"/>
                        <label>Recurrencia</label>
                        <select class="form-control input-lg incapacidad_modal" data-title="Recurrencia">
                          <option> </option>
                          <option>Unica</option>
                          <option>Recurrente</option>
                        </select>
                        <label>Fecha Inicial Incapacidad</label>
                        <input type="date"   class="form-control input-lg incapacidad_modal" data-title="Fecha Inicial Incapacidad">
                        <label>Fecha Final Incapacidad</label>
                        <input type="date"   class="form-control input-lg incapacidad_modal" data-title="Fecha Final Incapacidad">
                        <label>Comentarios</label>
                        <textarea   class="incapacidad_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
                        <br><br>

                        <input  type="hidden" name="id_configincapacidad" id="id_configincapacidad">
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
                        <input type="text" class="form-control insumo_modal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" data-title="Tipo Insumo"/>
                        <label>Cantidad Solicitada</label>
                        <input type="number" class="form-control insumo_modal"  value="" data-title="Cantidad Solicitada"/>
                        <label>Comentarios</label>
                        <textarea   class="insumo_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones de gestaciones anteriores" data-title="Comentarios"></textarea>
                        <br><br>

                        <input  type="hidden" name="id_configincapacidad" id="id_configincapacidad">id_configexamenfisico
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
                        <input type="text" class="form-control" id="nombre_editar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>

                        <label for="arreglo_editar">Plantilla</label><h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
                        <textarea class="form-control" id="plantilla_editar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
                        <input  type="hidden" name="id_configexamenfisico" id="id_configexamenfisico">
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="ActualizarExamenFisico();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>
                    <a href="#"  onclick="EliminarExamenFisico();" class="btn btn-danger" style="float: right;"> <i class="fa fa-trash"></i> <strong> Eliminar </strong></a>

                
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
                      <input type="text" class="form-control" id="nombre_agregar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""/>

                      <label for="arreglo_editar">Plantilla</label><h5 style="color:red">*Si Actualiza, la pagina se recargara y perdera los datos ingresados*</h5>
                      <textarea class="form-control" id="plantilla_agregar_examenfisico" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value=""></textarea>
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <a href="#"  onclick="CrearExamenFisico();" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Crear </strong></a>

                
            </div>
        </div>
    </div>
</div>


<?php include("footer.php")?>

<script type="text/javascript">

CargarDatosAntecedentes();


function MenuAntecedentes(evt, cityName) 
{
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

function MenuAntecedentes_Personales(evt, tabla) 
{
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks1");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabla).style.display = "block";
  evt.currentTarget.className += " active";

  
}

function CargarDatosAntecedentes()
{

  var Arreglo = <?php echo $arreglo_antecedentes?>;
   
  var text='';
  for(index in Arreglo) 
  {
  	var titulo = index.replaceAll(" ", "_");
  	text +='<div id="div_'+titulo+'" class="tabcontent1 row"><br>';
  
  	for (i = 0; i <= Arreglo[index].length; i++) 
  	{
  		if(Arreglo[index][i]!==undefined)
  		{
        text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Antecedentes['+index+'][]" value="'+Arreglo[index][i]+'" /> '+Arreglo[index][i]+' </label></div>';
  		}
  	}
  	text += '<div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Antecedentes['+index+'][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';

  }
  document.getElementById("TabDinamica").innerHTML = text;
}



function EditarAntecedentes(id)
{
	var editar = <?php echo json_encode($arreglo_editar)?>;
	var id_arreglo = id;
	var rango ="";
	editar[id_arreglo].forEach(element => rango+=element+',');
	document.getElementById("arreglo_editar").value=rango;
	document.getElementById("id_configantecedente").value=id;
};

function ActualizarAntecedentes()
      {
// estas son las variables que enviamos
        var arreglo = $("#arreglo_editar").val();
        var id = $("#id_configantecedente").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {arreglo:arreglo, id:id, Antecedente_Tipo:"Editar"},
            success: function(response) {
 				location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

function CrearAntecedentes()
{
  var Antecendente_Principal = document.getElementById('modal_antecendente_principal').value;
  var Antecendente_Arreglo = document.getElementById('modal_antecendente_arreglo').value;
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {Antecendente_Principal:Antecendente_Principal, Antecendente_Arreglo:Antecendente_Arreglo, Antecedente_Tipo:"Crear"},
            success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
};

function EliminarAntecedentes()
{
  var id = $("#id_configantecedente").val();
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarAntecedentes.php",
            data: {id:id, Antecedente_Tipo:"Eliminar"},
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

function MenuRevision(evt, table)
{
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

function CargarDatosRevision()
{

  var Arreglo = <?php echo $arreglo_revision?>;
   
  var text='';
  for(index in Arreglo) 
  {
    var titulo = index.replaceAll(" ", "_");
    text +='<div id="div_'+titulo+'" class="tabcontent2 row"><br>';
  
    for (i = 0; i <= Arreglo[index].length; i++) 
    {
      if(Arreglo[index][i]!==undefined)
      {
        text += '<div class="col-md-4"><label style="padding-bottom: 10px;margin-bottom: 0px;"><input type="checkbox" class="option-input checkbox" name="Checks_Revision['+titulo+'][]" value="'+Arreglo[index][i]+'" /> '+Arreglo[index][i]+' </label></div>';
      }
    }
    text += '<br><div class="col-md-12"><br><br><label>Otros</label><textarea name="Checks_Revision['+titulo+'][Otros]"  class="form-control input-lg" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea></div></div>';
  }
  document.getElementById("TabDinamica_revision").innerHTML = text;
}

function EditarRevision(id)
{
  var editar = <?php echo json_encode($arreglo_editar_revision)?>;
  var id_arreglo = id;
  var rango ="";
  editar[id_arreglo].forEach(element => rango+=element+',');
  document.getElementById("arreglo_editar1").value=rango;
  document.getElementById("id_configantecedente1").value=id;
};

function ActualizarRevision()
{
  // estas son las variables que enviamos
  var arreglo = $("#arreglo_editar1").val();
  var id = $("#id_configantecedente1").val();

  // aqui enviamos el mensaje por medio de un arreglo     
  $.ajax({
    type: "POST",
    url: "Ajax_ActualizarRevision.php",
    data: {arreglo:arreglo, id:id,Revision_Tipo:"Editar"},
    success: function(response) {
      location.reload(true);
          // aqui enviamos el mensaje por medio de un arreglo               
        }
      });
};

function CrearRevisiones()
{
  var Revision_Principal = document.getElementById('modal_revision_principal').value;
  var Revision_Arreglo = document.getElementById('modal_revision_arreglo').value;
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarRevision.php",
            data: {Revision_Principal:Revision_Principal, Revision_Arreglo:Revision_Arreglo, Revision_Tipo:"Crear"},
            success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
}

function EliminarRevision()
{
  var id = $("#id_configantecedente1").val();
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarRevision.php",
            data: {id:id, Revision_Tipo:"Eliminar"},
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

function GuardarParaclinico()
{
    
    var multi = $('.Paraclinicos_modal');
    var contador="0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Paraclinicos").value);
    for(index in puntos) 
      {
        arreglo[contador] = {};
        arreglo[contador]["Fecha"]=puntos[index].Fecha;
        arreglo[contador]["Tipo"]=puntos[index].Tipo;
        arreglo[contador]["Valor"]=puntos[index].Valor;
        arreglo[contador]["Unidades"]=puntos[index].Unidades;
        arreglo[contador]["Clasificacion"]=puntos[index].Clasificacion;
        arreglo[contador]["Comentarios"]=puntos[index].Comentarios;
        contador++;
      }

    arreglo[contador] = {};
    $.each(multi, function (index, item) {

        arreglo[contador][$(item).data('title')]=$(item).val();
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

function GuardarIncapacidad()
{
    
    var multi = $('.incapacidad_modal');
    var contador="0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
    for(index in puntos) 
      {
        arreglo[contador] = {};
        arreglo[contador]["Area Tratamiento"]=puntos[index]["Area Tratamiento"];
        arreglo[contador]["Recurrencia"]=puntos[index].Recurrencia;
        arreglo[contador]["Fecha Inicial Incapacidad"]=puntos[index]["Fecha Inicial Incapacidad"];
        arreglo[contador]["Fecha Final Incapacidad"]=puntos[index]["Fecha Final Incapacidad"];
        arreglo[contador]["Comentarios"]=puntos[index].Comentarios;
        contador++;
      }

    arreglo[contador] = {};
    $.each(multi, function (index, item) {

        arreglo[contador][$(item).data('title')]=$(item).val();
    });

    document.getElementById("Arreglo_Incapacidades").value = JSON.stringify(arreglo);

    
    $('#modalForm4').modal('hide');
}



////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// llenar insumos//
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////

function GuardarInsumos()
{
    
    var multi = $('.insumo_modal');
    var contador="0";
    var arreglo = {};
    var puntos = JSON.parse(document.getElementById("Arreglo_Insumos").value);
    for(index in puntos) 
      {
        arreglo[contador] = {};
        arreglo[contador]["Tipo Insumo"]=puntos[index]["Tipo Insumo"];
        arreglo[contador]["Cantidad Solicitada"]=puntos[index]["Cantidad Solicitada"];
        arreglo[contador]["Comentarios"]=puntos[index].Comentarios;

        contador++;
      }

    arreglo[contador] = {};
    $.each(multi, function (index, item) {

        arreglo[contador][$(item).data('title')]=$(item).val();
    });

    document.getElementById("Arreglo_Insumos").value = JSON.stringify(arreglo);

    
    $('#modalForm5').modal('hide');
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// editar examen fisico//
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////


function EditarExamenFisico(id)
{
  let editar = <?php echo json_encode($arreglo_examenfisico)?>;

  document.getElementById("nombre_editar_examenfisico").value=editar[id]['Nombre'];
  document.getElementById("plantilla_editar_examenfisico").innerHTML=editar[id]["Plantilla"];
  document.getElementById("id_configexamenfisico").value=id;
};

function ActualizarExamenFisico()
{
  // estas son las variables que enviamos
  var nombre = $("#nombre_editar_examenfisico").val();
  var plantilla = $("#plantilla_editar_examenfisico").val();
  var id = $("#id_configexamenfisico").val();

  // aqui enviamos el mensaje por medio de un arreglo     
  $.ajax({
    type: "POST",
    url: "Ajax_ActualizarExamenFisico.php",
    data: {nombre:nombre,plantilla:plantilla,id:id,Revision_Tipo:"Editar"},
    success: function(response) {
      location.reload(true);
          // aqui enviamos el mensaje por medio de un arreglo               
        }
      });
};

function CrearExamenFisico()
{
  var nombre = document.getElementById('nombre_agregar_examenfisico').value;
  var plantilla = document.getElementById('plantilla_agregar_examenfisico').value;
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarExamenFisico.php",
            data: {nombre:nombre, plantilla:plantilla, Revision_Tipo:"Crear"},
            success: function(response) {
        location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
}

function EliminarExamenFisico()
{
  var id = $("#id_configexamenfisico").val();
  $.ajax({
            type: "POST",
            url: "Ajax_ActualizarExamenFisico.php",
            data: {id:id, Revision_Tipo:"Eliminar"},
            success: function(response) {
        		location.reload(true);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
}

</script>


<script type="text/javascript">
  // mover una lista de izquierda a derecha en un nav por medio de botones //
 $('#next_nav').click(function () {
   $( "#tab" ).animate({
     scrollLeft: '+=156px'
   });
 });
 $('#prev_nav').click(function () {
   $( "#tab" ).animate({
     scrollLeft: '-=156px'
   });
 });        


 $(window).load(function () {
       
      BuscarCie10(0);
      BuscarCie10('acupuntura');
      Medicamento();

      //el menu de antecedentes despliegue el primero
      MenuAntecedentes_Personales(event,"<?php echo $inicial;?>");
      var x = document.getElementById('principal_antecedentes');
      x.classList.add("active");
  });




 </script>

















<script type="text/javascript">
 //antiguo 
  function verPos(){
    var clientepos = $("#clientepos").val();
    var codigoProd = $("#codigoProd").val();
    $.ajax({
      type: "POST",
      url: "Poslista.php",
      data: {clientepos:clientepos, codigoProd:codigoProd},
      success: function(response) {
      $('#div-resultsM').html(response);       
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
                $('#div-results1').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem; 
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
        var nota2 = $("nota2").val();
        var cantidad = $("#cantidad").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia,duracion:duracion,metodo:metodo, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2, cantidad:cantidad},
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

    function eliminarItem(valor)
      {
// estas son las variables que enviamos
        var idOper = $("#idOper"+valor).val();
        var usuario_id = $("#id_usuario").val();
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

</script>



<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>