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
    <h1>Control Prenatal, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Control Prenatal  </a></li>
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
                    <form action="GO_GuardarControlPrenatal.php" method="POST" name="formularioActualizarcliente" id="FormularioHistoriaClinica">
                        <div class="row">

                            <div class="form-group col-md-12">
                                <div align="left"> Fecha </div>
                                <input type="date" class="form-control input-lg" id="fecha_consulta" name="fecha_consulta" placeholder="Fecha" value="<?php echo date("Y-m-d")?>">
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title" style="color: #007bff;">Antecedentes Familiares</h4>
                            </div>
                            <div class="row col-md-12">
                              <div class="form-group col-md-3">
                                <label><input type="checkbox" name="ant1" value="Diabetes" > Diabetes</label>
                              </div>
                              <div class="form-group col-md-3">
                                <label><input type="checkbox" name="ant2" value="Tbc Pulmonar" > Tbc Pulmonar </label>
                              </div>
                              <div class="form-group col-md-3">
                                <label><input type="checkbox" name="ant3" value="Gemelares" > Gemelares </label>
                              </div>
                              <div class="form-group col-md-3">
                                <label><input type="checkbox" name="ant4" value="Otros" > Otros </label>
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                                <h4 class="box-title" style="color: #007bff;">Personales Obstétricos</h4>
                            </div>

                            <div class="col-md-12 row">
                              <div class="form-group col-md-4">
                                <label><input type="checkbox" name="antg1" value="Tbc" > Tbc </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg2" value="Diabetes" > Diabetes </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg3" value="Hipertensión crónica" > Hipertensión crónica</label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg4" value="Cirugía pélvico-uterina" > Cirugía pélvico-uterina</label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg5" value="Infertilidad" > Infertilidad </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg6" value="Otros" > Otros </label>
                              </div>

                            </div>


                            <div class="col-md-12 row">
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg7" value="Embarazo múltiple" > Embarazo múltiple </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg8" value="Hipertensión previa" > Hipertensión previa </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg9" value="Preeclampsia" > Preeclampsia </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg10" value="Eclampsia" > Eclampsia </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg11" value="Cardiopatía" > Cardiopatía</label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg12" value="Infección urinaria" > Infección urinaria </label>
                              </div>

                            </div>


                             <div class="col-md-12 row">
                              <!--
                              <div class="form-group col-md-4">
                                <label>Embarazo múltiple: <input type="checkbox" name="antg13" value="Embarazo múltiple" ></label>
                              </div>
                              -->
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg14" value="Diabetes" > Diabetes </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg15" value="Amenaza parto prematura" > Amenaza parto prematura </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg16" value="Desproporción Cef. pelv" > Desproporción Cef. pelv.</label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg17" value="Hemorragia 1er. trim" > Hemorragia 1er. trim. </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg18" value="Hemorragia 2°. trim" > Hemorragia 2°. trim. </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg19" value="Hemorragia 3er. trim" > Hemorragia 3er. trim. </label>
                              </div>
                            </div>


                            <div class="col-md-12 row">
                              
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg20" value="Anemia crónica" > Anemia crónica </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg21" value="Ruptura prematura membranas" > Ruptura prematura membranas</label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg22" value="Infección puerperal" > Infección puerperal. </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg23" value="Hemorragia puerperal" > Hemorragia puerperal. </label>
                              </div>
                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg24" value="Otra" > Otra</label>
                              </div>

                              <div class="form-group col-md-4">
                                <label> <input type="checkbox" name="antg25" value="Ninguna" > Ninguna</label>
                              </div>

                            </div>

                            <div class="col-md-12">
                              <hr>
                            </div>
                            <div class="form-group col-md-6">
              <div align="left"> Última Menstruación </div>
              <input type="date" class="form-control input-lg" id="ultima_mestruaccion" name="ultima_mestruaccion" placeholder="Ultima Mestruacción" onchange="calcularFechaProbable()">
            </div>


            <div class="form-group col-md-6">
              <div align="left"> Probable Parto </div>
              <input type="date" class="form-control input-lg" id="probable" name="probable" placeholder="Probable Parto">
            </div>



            <script>
              function calcularFechaProbable() {
                  var ultimaMestruaccion = new Date(document.getElementById("ultima_mestruaccion").value);
                  if (!isNaN(ultimaMestruaccion)) {
                      var fechaProbable = new Date(ultimaMestruaccion);
                      fechaProbable.setDate(fechaProbable.getDate() + 7);
                      fechaProbable.setMonth(fechaProbable.getMonth() - 3);

                      document.getElementById("probable").valueAsDate = fechaProbable;
                  }
              }
            </script>


            <div class="form-group col-md-6">
                              Dudas
                              <input value="SI"  type="radio" name="dudas" id="lt" > SI
                              <input value="NO" type="radio" name="dudas" id="lt" > NO
                            </div>


               <div class="form-group col-md-6">
                              Vacuna Antitetánica 
                              <input value="1°"  type="radio" name="vacunas" id="lt" > 1°
                              <input value="2°/R" type="radio" name="vacunas" id="lt" > 2°/R
                            </div>

                <div class="form-group col-md-6">
                Internación Embarazo
                              <input value="SI"  type="radio" name="internacion" id="lt" > SI
                              <input value="NO" type="radio" name="internacion" id="lt" > NO
                            </div>

           <div class="form-group col-md-6">
              <div align="left">Mes embarazo </div> 
              <input type="text" class="form-control input-lg" id="mes_embarazo" name="mes_embarazo" placeholder="Mes embarazo">
            </div>

            <div class="form-group col-md-4">
              <div align="left">Días</div>
              <input type="text" class="form-control input-lg" id="dias" name="dias" placeholder="Días">
            </div>

             <div class="form-group col-md-4">
              <div align="left">Gestaciones</div>
                <input type="text" class="form-control input-lg" id="gesta" name="gesta" placeholder="Gestaciones">
              </div>

              <div class="form-group col-md-4">
              <div align="left">Abortos</div>
                <input type="text" class="form-control input-lg" id="abortos" name="abortos" placeholder="Abortos">
              </div> 

              <div class="form-group col-md-4">
              <div align="left">Partos</div>
                <input type="text" class="form-control input-lg" id="parto" name="parto" placeholder="Partos">
              </div> 

              <div class="form-group col-md-4">
              <div align="left">Ninguno o Más de 3 Partos</div>
                <input type="text" class="form-control input-lg" id="ninguno" name="ninguno" placeholder="Ninguno o Más de 3 Partos">
              </div>


              <div class="form-group col-md-4">
              <div align="left">Vaginales</div>
                <input type="text" class="form-control input-lg" id="vaginales" name="vaginales" placeholder="Vaginales">
              </div>


              <div class="form-group col-md-4">
              <div align="left">Cesáreas</div>
                <input type="text" class="form-control input-lg" id="cesarea" name="cesarea" placeholder="Cesáreas">
              </div>

              <div class="form-group col-md-4">
              <div align="left">Nac. vivos</div>
                <input type="text" class="form-control input-lg" id="hijosvivos" name="hijosvivos" placeholder="Nac. vivos">
              </div>

              
              <div class="form-group col-md-4">
              <div align="left">Nac. muertos</div>
                <input type="text" class="form-control input-lg" id="hijosmuertos" name="hijosmuertos" placeholder="Nac. muertos">
              </div>

              <div class="form-group col-md-4">
              <div align="left">Viven</div>
                <input type="text" class="form-control input-lg" id="viven" name="viven" placeholder="Viven">
              </div>

              <div class="form-group col-md-4">
              <div align="left">Mueren</div>
                <input type="text" class="form-control input-lg" id="mueren" name="mueren" placeholder="Mueren">
              </div>

              <div class="form-group col-md-4">
              <div align="left">Mueren Después 1ra semana</div>
                <input type="text" class="form-control input-lg" id="mueren_semana" name="mueren_semana" placeholder="Mueren Después 1ra semana">
              </div>

              <div class="form-group col-md-12">
                              Algún Recién Nacido en peso menos de 2500 g
                              <input value="SI"  type="radio" name="recien_nacido" id="lt" > SI
                              <input value="NO" type="radio" name="recien_nacido" id="lt" > NO
                            </div>


                <div class="form-group col-md-12">
              <div align="left">Fecha Terminación anterior embarazo </div>
              <input type="date" class="form-control input-lg" id="fecha_terminacion" name="fecha_terminacion" placeholder="Fecha Terminación anterior embarazo">
            </div>

            <div class="form-group col-md-3">
              <div align="left"> P.A </div>
              <input type="text" class="form-control input-lg" id="pa" name="pa" placeholder="P.A">
            </div>

            <div class="form-group col-md-3">
              <div align="left"> Peso </div>
              <input type="text" class="form-control input-lg" id="peso" name="peso" placeholder="Peso">
            </div>

            <div class="form-group col-md-3">
              <div align="left"> Edema </div>
              <input type="text" class="form-control input-lg" id="edema" name="edema" placeholder="Edema">
            </div>


            <div class="form-group col-md-3">
              <div align="left"> Várices </div>
              <input type="text" class="form-control input-lg" id="varices" name="varices" placeholder="Varices">
            </div>


            <div class="form-group col-md-3">
              <div align="left"> Presentación </div>
              <input type="text" class="form-control input-lg" id="presentacion" name="presentacion" placeholder="Presentación">
            </div>

            <div class="form-group col-md-3">
              <div align="left"> Tonos Fetales </div>
              <input type="text" class="form-control input-lg" id="tonos" name="tonos" placeholder="Tonos Fetales">
            </div>


            <div class="form-group col-md-3">
              <div align="left"> Au </div>
              <input type="text" class="form-control input-lg" id="au" name="au" placeholder="Au">
            </div>


            <div class="form-group col-md-3">
              <div align="left"> Cefalea </div>
              <input type="text" class="form-control input-lg" id="cefalea" name="cefalea" placeholder="Cefalea">
            </div>


            <div class="form-group col-md-6">
              <div align="left"> Semanas </div>
              <input type="text" class="form-control input-lg" id="semanas" name="semanas" placeholder="Semanas">
            </div>


            <div class="form-group col-md-6">
              <div align="left"> Médico </div>
              <input type="text" class="form-control input-lg" id="medico" name="medico" placeholder="Medico">
            </div>


            <h4 class="box-title">Resultado de Laboratorio</h4>

            <div class="form-group col-md-12">
              <div align="left"> Hemoglobina </div>
              <input type="text" class="form-control input-lg" id="hemoglobina" name="hemoglobina" placeholder="Hemoglobina">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Tipaje </div>
              <input type="text" class="form-control input-lg" id="tipaje" name="tipaje" placeholder="Tipaje">
            </div>


            <div class="form-group col-md-12">
              <div align="left"> Rh </div>
              <input type="text" class="form-control input-lg" id="rh" name="rh" placeholder="Rh">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Orina </div>
              <input type="text" class="form-control input-lg" id="orina" name="orina" placeholder="Orina">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Vdrl </div>
              <input type="text" class="form-control input-lg" id="vdrl" name="vdrl" placeholder="Vdrl">
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Glicemia </div>
              <input type="text" class="form-control input-lg" id="glicemia" name="glicemia" placeholder="Glicemia">
            </div>


            <div class="form-group col-md-12">
              <div align="left">Alfafetoproteína</div>
              <input type="text" class="form-control input-lg" id="alfafeto" name="alfafeto" placeholder="Alfafeto proteina">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Citomegalovirus</div>
              <input type="text" class="form-control input-lg" id="citomega" name="citomega" placeholder="Citomegalovirus">
            </div>


             <div class="form-group col-md-12">
              <div align="left">U.S.G</div>
              <input type="text" class="form-control input-lg" id="usg" name="usg" placeholder="U.S.G">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Combs R.B.N.S</div>
              <input type="text" class="form-control input-lg" id="combs" name="combs" placeholder="Combs R.B.N.S">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Miscelaneos</div>
              <input type="text" class="form-control input-lg" id="miscelanos" name="miscelanos" placeholder="Miscelaneos">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Pap</div>
              <input type="text" class="form-control input-lg" id="pap" name="pap" placeholder="Pap">
            </div>


            <div class="form-group col-md-12">
              <div align="left">Tóxoplasmosis</div>
              <input type="text" class="form-control input-lg" id="toxoplasma" name="toxoplasma" placeholder="Tóxoplasmosis">
            </div>

            <div class="form-group col-md-12">
              <div align="left">Rubéola</div>
              <input type="text" class="form-control input-lg" id="rubela" name="rubela" placeholder="Rubela">
            </div>

                      
<div class="form-group col-md-12">
                              <div align="left">Observaciones</div>

                              <textarea  id="observaciones" name="observaciones"  class="textarea" placeholder="Observaciones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>

<div class="form-group col-md-12">
                                <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
                              </div>

                          <hr>




                          <!--<div class="col-sm-12">
                            <div align="center">
                              <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div align="left">
                              <label>Fecha </label>
                            </div>
                            <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                            <div id="div-results"></div>
                          </div>

                          <div class="col-sm-6">
                            <div align="left">
                              <label>Hora </label>
                            </div>
                            <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                            <div id="div-resultsHora"></div>
                          </div>

                          <div class="col-sm-6">
                            <div align="left">
                              <label>Motivo consulta</label>
                            </div>
                            <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                          </div>

                          <div class="col-sm-6">
                            <label>Especialista </label>
                            <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" ="">
                            <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                                                        <?php
                                                        usuariosAselect($ID);

                                                        ?>
                            </select>

                          </div>

                          <div class="col-sm-6">

                            <br>
                            <br>
                            <label>
                              <input type="radio" name="P" value="0" class="flat-red" >
                              <i class="fa fa-user"></i>  Presencial

                              <input type="radio" name="P" value="1"   class="flat-red"  >
                              <i class="fa fa-video-camera"></i>   Virtual
                            </label>
                          </div>-->

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
<script src="plugins/LottieK/lottie.min.js"></script>
<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Control_Prenatal";
include 'AutoGuardado_Historia.php';
?>