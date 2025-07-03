<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = $_GET['clienteId']; 
    $saludocupacional_id = $_GET['id']; 

    $Usuario_id= $_SESSION['ID'];

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
      while($rowMotorizado=mysqli_fetch_array($queryList))
      {
        $nombre_cliente=$rowMotorizado['nombre_cliente'];
        $empresaAfilidad_id = $rowMotorizado['idEmpresa'];
      }
    }
    


    $querySelectEmpresa = mysqli_query($conn3, "SELECT * FROM empresasAfiliadas WHERE id = $empresaAfilidad_id LIMIT 1");
    if ($querySelectEmpresa) {
      while($rowMotorizado=mysqli_fetch_array($querySelectEmpresa))
      {
        $conoceProfesiograma=$rowMotorizado['conoceProfesiograma'];
      }
    }
      


    if ($saludocupacional_id != "") {
        $existeCertificado = mysqli_query($conn3, "SELECT * FROM historiaclinica6_labora where certificado = '{$saludocupacional_id}' ORDER BY id LIMIT 1") or die(var_dump(mysqli_error_list($conn3)));
        $nrowl = mysqli_num_rows($existeCertificado);
        if ($nrowl > 0) {
          $existeCertificado = $existeCertificado->fetch_array();
          $procesoCertificado = mysqli_query($conn3, "SELECT * FROM conceptolaboral WHERE idHistoria = '{$existeCertificado['ID']}' ORDER BY id LIMIT 1") or die(var_dump(mysqli_error_list($conn3)));
          $nrowlPC = mysqli_num_rows($procesoCertificado);
          if ($nrowlPC > 0) {
            $procesoCertificado = $procesoCertificado->fetch_array();
            if ($procesoCertificado['proceso'] == 1) {
              echo "<script>;";
              echo "alert('No posee Certificado sin Procesar.');";
              echo "window.location.href = 'SO_SalaControl?idCliente={$clienteId}';";
              echo "</script>";
            } else if ($procesoCertificado['proceso'] == 0) {
            }
          }
        } else {
          echo "<script>;";
          echo "alert('No posee Certificado.');";
          echo "window.location.href = 'SO_SalaControl?idCliente={$clienteId}';";
          echo "</script>";
        }
      } else if ($saludocupacional_id == "") {
        echo "<script>;";
        echo "alert('Para generar Certificado, debera generarse una historia Ocupacional.');";
        echo "window.location.href = 'SO_SalaControl?idCliente={$clienteId}';";
        echo "</script>";
      }


if(!$_GET['editar']){

      $queryList=mysqli_query($conn3,"SELECT * FROM conceptolaboral WHERE AND id = $saludocupacional_id ORDER BY id DESC LIMIT 1");
      if ($queryList) {
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
          $idHistoria=$rowMotorizado['idHistoria'];
        }
      }
      

      $queryList=mysqli_query($conn3,"SELECT rEnfermedadactual AS examenTipo FROM historiaclinica6_labora WHERE cliente_id = {$clienteId} AND ID = '$saludocupacional_id'  ORDER BY id DESC LIMIT 1");
      if ($queryList) {
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
          $examenTipo=$rowMotorizado['examenTipo'];
        }
      }
      
      
      $ArregloComplementarios="";
      $exaCompl = mysqli_query($conn3, "SELECT Visiometria, Audiometria, Espirometria, Optometria, Electrocardiogrma, Psicofisico, Psicometrico, Radiografia FROM historiaclinica6_labora WHERE cliente_id = {$clienteId} AND ID = '$saludocupacional_id' ");
      $nrowEXC = mysqli_num_rows($exaCompl);
      if ($nrowEXC > 0 && $exaCompl == true) {
        while ($rowEXC = mysqli_fetch_array($exaCompl)) {
          if ($rowEXC['Visiometria'] != "") {
            $ArregloComplementarios.="Visiometría ||  ";
          }
          if ($rowEXC['Audiometria'] != "") {
            $ArregloComplementarios.="Audiometría ||  ";
          }
          if ($rowEXC['Espirometria'] != "") {
            $ArregloComplementarios.="Espirometría ||  ";
          }
          if ($rowEXC['Optometria'] != "") {
            $ArregloComplementarios.="Optometría ||  ";
          }
          if ($rowEXC['Electrocardiogrma'] != "") {
            $ArregloComplementarios.="Electrocardiograma ||  ";
          }
          if ($rowEXC['Psicofisico'] != "") {
            $ArregloComplementarios.="Psicofísico ||  ";
          }
          if ($rowEXC['Psicometrico'] != "") {
            $ArregloComplementarios.="Psicométrico ||  ";
          }
          if ($rowEXC['Radiografia'] != "") {
            $ArregloComplementarios.="Radiografía ||  ";
          }
        }
      }

    }
elseif($_GET['editar']=="1"){
    
  $camposPermitidos = ["xtipodeexa690", "xinformaci281", "xaptitudoc588", "xaptitudoc267",'xaptitudoc161','xexaacutem307'
,'xrecomenda954','xelpresent728','xincluiren405','xtipodepro824','recomendacion_general','consentimiento','recomendacion_particular'];

  $CamposConsultar="";
  foreach ($camposPermitidos as $key => $value) {
    $CamposConsultar.="$value,";
  }
  $CamposConsultar = trim($CamposConsultar,',');

  $queryList = mysqli_query($conn3, "SELECT $CamposConsultar FROM conceptolaboral where id = $saludocupacional_id limit 1");
  $rowMotorizado = mysqli_fetch_assoc($queryList);

  // Convierte el arreglo PHP en una cadena JSON
  $rowMotorizadoJSON = json_encode($rowMotorizado);

}
      /*
    $clienteData = mysqli_query($conn3, "SELECT idEmpresa FROM cliente where cliente_id = {$clienteId}")->fetch_array();
    $conoceProfesiograma = funcionMaster($clienteData['idEmpresa'], 'id', 'conoceProfesiograma', 'empresasAfiliadas');
      */

?>
    
  <link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta, Paciente: <?php echo $nombre_cliente; ?> </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Concepto Laboral</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="col-md-12">

        <div class="">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">

              <div class=" box-solid">

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion1">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                            Datos Personales
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse">
                        <?php echo datosPacientes($clienteId); ?>
                      </div>
                    </div>

                    <br> 
                        <form action="SO_Guardar_Concepto_Laboral" method="POST" name="FormularioHistoriaClinica" id="FormularioHistoriaClinica">
            
                        <!-- inicio accordion -->
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">Tipo de Examen</a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  
                                    <div class="form-group col-md-12">
                                        <div align="left">  Tipo de Examen  </div>
                                            <select name="xtipodeexa690[]" id="xtipodeexa690" class="form-control select2" style="width: 100%;" multiple="" tabindex="-1" aria-hidden="true">
                                            <option value="" select=""> Seleccionar </option>
                                            <option value="Ingreso"> Ingreso </option>
                                            <option value="Periodico"> Periodico </option>
                                            <option value="Egreso"> Egreso </option>
                                            <option value="Post Incapacidad"> Post Incapacidad </option>
                                            <option value="Reubicacion"> Reubicacion </option>
                                            <option value="Revision De Recomendaciones"> Revision De Recomendaciones </option>
                                            </select>
                                    </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- final accoridon -->
                        





                        <!-- inicio accordion -->
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseThree">Información del Concepto Laboral</a>
                            </h4>
                          </div>
                          <div id="CollapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  
                                <div class="form-group col-md-12">
                                    <div align="left">  Información del Concepto Laboral   </div>
                                        <select name="xinformaci281[]" id="xinformaci281" class="form-control select2" style="width: 100%;" multiple="" tabindex="-1" aria-hidden="true">
                                        <option value="" select=""> Seleccionar </option>
                                        <option value="Apto Para El Cargo"> Apto Para El Cargo </option>
                                        <option value="Apto Para Manipulación De Alimentos"> Apto Para Manipulación De Alimentos </option>
                                        <option value="Periódico No Satisfactorio"> Periódico No Satisfactorio </option>
                                        <option value="Apto Con Recomendaciones"> Apto Con Recomendaciones </option>
                                        <option value="Apto Para Trabajo En Espacio Confinado"> Apto Para Trabajo En Espacio Confinado </option>
                                        <option value="Egreso Satisfactorio"> Egreso Satisfactorio </option>
                                        <option value="Apto Con Restricciones"> Apto Con Restricciones </option>
                                        <option value="Apto Para Trabajo En Campo De Hidrocarburos"> Apto Para Trabajo En Campo De Hidrocarburos</option>
                                        <option value="Egreso No Satisfactorio"> Egreso No Satisfactorio </option>
                                        <option value="Apto Para Trabajo En Alturas"> Apto Para Trabajo En Alturas </option>
                                        <option value="Periódico  Satisfactorio"> Periódico  Satisfactorio </option>
                                        <option value="Aplazado"> Aplazado </option>
                                        <option value="No Aplica Concepto"> No Aplica Concepto </option>
                                        <option value="Aplazado Para Trabajo En Alturas"> Aplazado Para Trabajo En Alturas </option>
                                        <option value=" No Apto Para Trabajo En Alturas">  No Apto Para Trabajo En Alturas </option>
                                        <option value="Aplazado Para Manipulación De Alimentos"> Aplazado Para Manipulación De Alimentos </option>
                                        <option value="No Apto Para Manipulación De Alimentos"> No Apto Para Manipulación De Alimentos </option>
                                        <option value="Aplazado Para Trabajo En Espacios Confinados"> Aplazado Para Trabajo En Espacios Confinados </option>
                                        <option value="No Apto Para Trabajo En Espacios Confinados"> No Apto Para Trabajo En Espacios Confinados </option>
                                        <option value="Aplazado Para Trabajo En Campos De Hidrocarburos"> Aplazado Para Trabajo En Campos De Hidrocarburos </option>
                                        <option value="No Apto Para Trabajo En Campos De Hidrocarburos"> No Apto Para Trabajo En Campos De Hidrocarburos </option>
                                        <option value="No Apto"> No Apto </option>
                                    </select>
                                    
                                    </div>
                                    
                                    <h4 class="box-title">Recomendaciones Particulares</h4>
                                    <div class="form-group col-md-12" align="left">
                                        <textarea id="recomendacion_particular" name="recomendacion_particular"> Cumplir con las Normas Emitidas por el Ministerio de Salud en Relación con el COVID-19. Se Aplico la Encuesta de COVID-19.</textarea>
                                    </div>                            
                                        
                                        <div class="form-group col-md-12">
                                            <div align="left"> Aptitud Ocupacional de Ingreso </div>
                                            <select name="xaptitudoc588[]" id="xaptitudoc588" class="form-control select2" style="width: 100%;" multiple>
                                                <option value="" select=""> Seleccionar </option>
                                                <option value="Examen Ocupacional sin Alteración Aparente al Momento del Examen"> Examen Ocupacional sin Alteración Aparente al Momento del Examen</option>
                                                <option value="Al Examen Médico Presenta Alteraciones, Pero no es Limitante para Desempeñarse en su Labor"> Al Examen Médico Presenta Alteraciones, Pero no es Limitante para Desempeñarse en su Labor </option>
                                                <option value="Al Examen Médico Presenta Condiciones de Salud que Deben ser Tratadas Antes del Ingreso"> Al Examen Médico Presenta Condiciones de Salud que Deben ser Tratadas Antes del Ingreso</option>                              
                                            </select>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <div align="left"> Aptitud Ocupacional Periódico </div>
                                            <select name="xaptitudoc267[]" id="xaptitudoc267" class="form-control select2" style="width: 100%;" multiple="" tabindex="-1" aria-hidden="true">
                                                <option value="" select=""> Seleccionar </option>
                                                <option value="Examen Médico Satisfactorio, Puede Seguir Desempeñando sus Labores"> Examen Médico Satisfactorio, Puede Seguir Desempeñando sus Labores </option>
                                                <option value="Al Examen Médico Presenta Enfermedad(es), pero no es Limitante Para Seguir Desempeñandose en sus Labores"> Al Examen Médico Presenta Enfermedad(es), pero no es Limitante Para Seguir Desempeñandose en sus Labores </option>
                                                <option value="Al Examen Médico Presenta Enfermedad que Requiere Remisión a EPS"> Al Examen Médico Presenta Enfermedad que Requiere Remisión a EPS </option>
                                                <option value="Al Examen Médico Presenta Enfermedad que Requiere Remisión a ARL"> Al Examen Médico Presenta Enfermedad que Requiere Remisión a ARL </option>                              
                                            </select>
                                    
                                        </div>
                                                            
                                        <div class="form-group col-md-12">
                                            <div align="left"> Aptitud Ocupacional de Retiro </div>
                                            <select name="xaptitudoc161[]" id="xaptitudoc161"class="form-control select2" style="width: 100%;" multiple="" tabindex="-1" aria-hidden="true">
                                                <option value="" select=""> Seleccionar </option>
                                                <option value="Al Examen Médico no se Encuentran Alteraciones ni Patologías que Limiten su Capacidad Laboral"> Al Examen Médico no se Encuentran Alteraciones ni Patologías que Limiten su Capacidad Laboral</option>
                                                <option value="Al Examen Médico se Encuentran Alteraciones Pero no es Limitante Para Desempeñarse en su Nueva Labor"> Al Examen Médico se Encuentran Alteraciones Pero no es Limitante Para Desempeñarse en su Nueva Labor</option>
                                                <option value="Al Examen Médico Presenta Enfermedad(es) que Requieren Remisión a EPS"> Al Examen Médico Presenta Enfermedad(es) que Requieren Remisión a EPS </option>
                                                <option value="Al Examen Médico Presenta Enfermedad(es) que Requieren Remisión a ARL"> Al Examen Médico Presenta Enfermedad(es) que Requieren Remisión a ARL </option>
                                            </select>
                                        </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- final accoridon -->



                        <!-- inicio accordion -->
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseFour">Exámenes Complementarios</a>
                            </h4>
                          </div>
                          <div id="CollapseFour" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  
                                <div class="form-group col-md-12">
                                <div align="left">  Exámenes Complementarios   </div>
                                    <select name="xexaacutem307[]" id="xexaacutem307" class="form-control select2" style="width: 100%;" multiple="" >
                                    <option value="" select=""> Seleccionar </option>

                                    <?php
                                    
                                    $idHistoriaClinica = funcionMaster($saludocupacional_id, 'certificado', 'ID', 'historiaclinica6_labora');
                                    $exaCompl = mysqli_query($conn3, "SELECT e.id AS idExamen, go.idDoctor, e.nombreExamen, 
                                      go.idHistoria, go.estado, go.cargado, go.created_at, go.updated_at FROM 
                                      generarOrden AS go LEFT JOIN examanesAsignados AS ea ON 
                                      go.id = ea.idOrden LEFT JOIN examenesLB AS e ON ea.idExamen = e.id 
                                      WHERE go.idCliente = {$clienteId} AND idHistoria = '{$idHistoriaClinica}';
                                    ");
                                    $nrowEXC = mysqli_num_rows($exaCompl);
                                    if ($nrowEXC > 0 && $exaCompl == true) {
                                      while ($rowEXC = mysqli_fetch_array($exaCompl)) {
                                        echo '<option value="' . $rowEXC['nombreExamen'] . '" selected> ' . $rowEXC['nombreExamen'] . ' </option>';
                                      }
                                    }

                                    ?>

                                    <option value="Visiometría" > Visiometría </option>
                                    <option value="Audiometría" > Audiometría </option>
                                    <option value="Espirometría" > Espirometría </option>
                                    <option value="Optometría" > Optometría </option>
                                    <option value="Electrocardiograma" > Electrocardiograma </option>
                                    <option value="Psicofísico" > Psicofísico </option>
                                    <option value="Psicométrico" > Psicométrico </option>
                                    <option value="Radiografía" > Radiografía </option>
                                </select>
                                
                                </div>
                                
                                <div class="form-group col-md-12">
                                <div align="left">  Recomendaciones </div>
                                    <select name="xrecomenda954[]" id="xrecomenda954" class="form-control select2" style="width: 100%;" multiple="">
                                    <option value="" select=""> Seleccionar </option>
                                    <option value="Control Medico (Ocupacional)"> Control Medico (Ocupacional) </option>
                                    <option value="Control Nutrición Y Dietética"> Control Nutrición Y Dietética </option>
                                    <option value="Pausas Saludables Mmii"> Pausas Saludables Mmii </option>
                                    <option value="Actividad Física Mayor 30´"> Actividad Física Mayor 30´ </option>
                                    <option value="Control Optometría (Ocupacional)"> Control Optometría (Ocupacional) </option>
                                    <option value="Dieta Baja en Carbohidratos"> Dieta Baja en Carbohidratos </option>
                                    <option value="Pausas Saludables Vocales"> Pausas Saludables Vocales </option>
                                    <option value="Capacitación Trabajo Seguro"> Capacitación Trabajo Seguro </option>
                                    <option value="Control Audiometría (Ocupacional)"> Control Audiometría (Ocupacional) </option>
                                    <option value="Dieta Baja en Grasas Y Sal"> Dieta Baja en Grasas Y Sal </option>
                                    <option value="Pausas Saludables Visuales"> Pausas Saludables Visuales </option>
                                    <option value="Plan de Emergencia"> Plan de Emergencia </option>
                                    <option value="Control por Neurología"> Control por Neurología </option>
                                    <option value="Pausas Saludables Mmss"> Pausas Saludables Mmss </option>
                                    <option value="Uso Epp"> Uso Epp </option>
                                    <option value="Otros"> Otros </option>
                                </select>
                                
                                </div>
                                <?php
                                  if($conoceProfesiograma==1){$Radio1 = "checked";}else{$Radio2 = "checked";}
                                  ?>
                                <div class="form-group col-md-12">
                                    <div align="left">  El Presente Concepto de Aptitud Laboral se Expide Según el Profesiograma o Perfil del Cargo Conocido por la IPS </div>
                                    <label>
                                        <input type="radio" name="xelpresent728" id="xelpresent728" value="Si"<?=$Radio1;?> > Si
                                    </label>
                                    <label>
                                        <input type="radio" name="xelpresent728" id="xelpresent728" value="No" <?=$Radio2;?>> No
                                    </label>
                                
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left"> Incluir en Programa de Vigilancia Epidemiológica </div>
                                    <label>
                                        <input type="radio" name="xincluiren405" id="xincluiren405" value="Si"> Si
                                    </label>
                                    <label>
                                        <input type="radio" name="xincluiren405" id="xincluiren405" value="No"> No
                                    </label>
                                
                                </div>

                                <div class="form-group col-md-12">
                                    <div align="left">  Tipo de Programa de Vigilancia Epidemiológica a Incluir  </div>
                                        <select name="xtipodepro824[]" id="xtipodepro824" class="form-control select2" style="width: 100%;" multiple>
                                    <option value="" select=""> Seleccionar </option>
                                    <option value="Visual"> Visual </option>
                                    <option value="Auditivo"> Auditivo </option>
                                    <option value="Respiratorio"> Respiratorio </option>
                                    <option value="Cardiovascular"> Cardiovascular </option>
                                    <option value="Nutrición"> Nutrición </option>
                                    <option value="Osteomuscular"> Osteomuscular </option>
                                    <option value="Manejo De Voz"> Manejo De Voz </option>
                                    <option value="Psicolaboral"> Psicolaboral </option>
                                </select>
                                
                                </div>

                                <div class="form-group col-md-12" align="left">
                                        <textarea id="recomendacion_general" name="recomendacion_general"> Higiene Postural, Pausas Saludables por 10 Minutos c/2 Horas de Miembros Superiores e Inferiores, Uso de los Elementos de Protección Personal Acorde a su Labor y Riesgos de Exposición, Capacitación sobre Trabajo Seguro, Plan de Emergencias y Riesgo Ergonómico, Realizar Actividad Física Mínimo 30 Minutos, Cultura de Estilo de Vida y Hábitos Saludables </textarea>
                                </div>


                            

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- final accoridon -->




                        <!-- inicio accordion -->
                        <div class="panel box box-success">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseFive">Consentimiento Informado del Aspirante o Trabajador </a>
                            </h4>
                          </div>
                          <div id="CollapseFive" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12">
                                  
                                <h4 class="box-title">Consentimiento Informado del Aspirante o Trabajador</h4>


                                    <div class="form-group col-md-12" align="left">
          
                                       <textarea id="consentimiento" name="consentimiento"> Autorizo Expresamente a el (la) Doctor(a) Mencionado(a) en el Presente Documento, A Realizar en Mí, El Examen Médico y/o Paraclínico(s) Ocupacional(es) Registrado(s) en Este Documento.  Y que Tuve la Oportunidad de Retirar mi Consentimiento en Cualquier Momento Antes de que se Realizara el Examen. Fui Informado(a) sobre la Confidencialidad de la Información Personal por mi Suministrada los Resultados Paraclínicos. Autorizo a la Unidad Médica a Suministrar la Información Aquí Registrada a las Entidades Contempladas en la Legislación Vigente para Dar Cumplimiento del Programa de Seguridad y Salud en el Trabajo y Todo lo que se Derive de la Legislación Colombiana. Los Derechos que me Asisten como Titular de la Información son los Contemplados por la Ley, entre Ellos el Derecho a Conocer, Actualizar y Rectificar la Información que de mí se Tiene en Bases Públicas o Privadas, Tales Derechos podrían Ejercerse Mediante Comunicación Escrita al Correo Revisaviae@yahoo.es o Comunicación Escrita en Nuestras Oficinas. Finalmente, Manifiesto que Estoy en Capacidad de Expresar mi Consentimiento.  Así Mismo, Declaro que se me ha Explicado la Naturaleza y Propósito del Examen Médico y/o Paraclínico(s) Ocupacional(es), Entendiendo que esta Prueba es Voluntaria y no he Omitido Información sobre mi Estado de Salud. De Igual Forma, Afirmo que he Recibido y Entendido las Recomendaciones y Concepto Laboral del Presente Documento, en Especial Aceptando que Este Examen no es Válido para Licencia de Conducción Automotriz, ni Buceo, ni Porte ni Tenencia de Armas.</textarea>
                                     </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- final accoridon -->

                        


                          <div class="col-md-12" align="left">
                            <br>
                            Ya Terminé <input type="checkbox" value="" required>
                          </div>


                            <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                            <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                            <input type="hidden" name="historia_salud_ocupacional_id" id="historia_salud_ocupacional_id" value="<?php echo $_GET['id']?>">
                          <div align="center"> 
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-12">
                  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h2> <strong> G u a r d a r </strong> </h2>
                    </button></center>

                </div>
                          </div>
                          <input type="hidden"  name="tipo_cliente"   valur="1">
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
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Suponiendo que tienes la variable PHP $p en JavaScript
            var p = "<?=$examenTipo;?>";

            // Dividir la variable p en un array de opciones
            var opciones = p.split("||").map(function (opcion) {
                return opcion.trim(); // Elimina espacios en blanco alrededor de las opciones
            });

            // Obtener el elemento select por su id
            var select = document.getElementById("xtipodeexa690");

            // Iterar sobre las opciones del select
            for (var i = 0; i < select.options.length; i++) {
                var option = select.options[i];
                if (opciones.indexOf(option.value) !== -1) {
                    // Si la opción está en el array de opciones, establece el atributo selected
                    option.selected = true;
                }
            }







            var p1 = "<?=$ArregloComplementarios;?>";

            // Dividir la variable p en un array de opciones
            var opciones1 = p1.split("||").map(function (opcion1) {
                return opcion1.trim(); // Elimina espacios en blanco alrededor de las opciones
            });

            // Obtener el elemento select por su id
            var select1 = document.getElementById("xexaacutem307");

            // Iterar sobre las opciones del select
            for (var i = 0; i < select1.options.length; i++) {
                var option1 = select1.options[i];
                if (opciones1.indexOf(option1.value) !== -1) {
                    // Si la opción está en el array de opciones, establece el atributo selected
                    option1.selected = true;
                }
            }

        });
    </script>
<script>
  // Pasa la cadena JSON a JavaScript
var rowMotorizado = <?php echo $rowMotorizadoJSON; ?>;

// Recorrer el objeto
for (var key in rowMotorizado) {
    if (rowMotorizado.hasOwnProperty(key)) {
        // Determinar el tipo de campo
        var elemento = document.getElementById(key);

        if (elemento) {
            if (elemento.tagName === "SELECT") {
                // Si es un select, dividir el valor por '||' y agregar las opciones
                var opciones = rowMotorizado[key].split("||");
                for (var i = 0; i < opciones.length; i++) {
                    
                    var opcionExistente = elemento.querySelector('option[value="' + opciones[i] + '"]');
                    if (opcionExistente) {
                        // Si la opción ya existe, establecerla como seleccionada
                        opcionExistente.selected = true;
                    } else {
                        // Si no existe, crear la opción y establecerla como seleccionada
                        var opcionNueva = document.createElement("option");
                        opcionNueva.text = opciones[i];
                        opcionNueva.value = opciones[i];
                        opcionNueva.selected = true;
                        elemento.add(opcionNueva);
                    }

                }
            } else if (elemento.tagName === "INPUT") {
                var tipoInput = elemento.getAttribute("type");
                if (tipoInput === "text") {
                    // Si es un input de tipo texto, establecer el valor
                    elemento.value = rowMotorizado[key];
                } else if (tipoInput === "radio") {
                    // Si es un radio button, seleccionar la opción con el valor correspondiente
                    var radioButtons = document.getElementsByName(key);
                    for (var i = 0; i < radioButtons.length; i++) {
                        if (radioButtons[i].value === rowMotorizado[key]) {
                            radioButtons[i].checked = true;
                            break;
                        }
                    }
                }
            } else if (elemento.tagName === "TEXTAREA") {
                // Si es un textarea, establecer el valor
                elemento.value = rowMotorizado[key];
            } else {
                console.log(key + " es un elemento desconocido.");
            }
        } else {
            console.log(key + " no tiene un campo correspondiente en el DOM.");
        }
    }
}

</script>