<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId']; 
   $usuarioId = $_SESSION['ID'];
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Historial Otorrino</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HO_Historia_Otorrino.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId);?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar Exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br><br>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Otorrino</a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica_Otorrino where cliente_id = $clienteId AND usuario_id = '$usuarioId' order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                    $id = $rowMotorizado['id'];

                                    $cliente_id      =$rowMotorizado['cliente_id'];
                                    $usuario_id      =$rowMotorizado['usuario_id'];
                                    $Fecha           =$rowMotorizado['Fecha'];

                                    $Hora            =$rowMotorizado['Hora'];
                                    $motivoConsulta  =$rowMotorizado['motivoConsulta'];
                                    $motivoConsulta_nariz  =$rowMotorizado['motivoConsulta_nariz'];
                                    $columella  =$rowMotorizado['columella'];
                                    $Observaciones_nariz     =$rowMotorizado['Observaciones_nariz'];
                                    $motivoconsulta_desorden     =$rowMotorizado['motivoconsulta_desorden'];
                                    $rdesordenes           =$rowMotorizado['rdesordenes'];
                                    $peso          =$rowMotorizado['peso'];
                                    $altura     =$rowMotorizado['altura'];
                                    $imc   =$rowMotorizado['imc'];
                                    $desorden         =$rowMotorizado['desorden'];
                                    $antecedentes  =$rowMotorizado['antecedentes'];
                                    $Nariz_desorde  =$rowMotorizado['Nariz_desorde'];
                                    $Friedman  =$rowMotorizado['Friedman'];
                                    $Paladar  =$rowMotorizado['Paladar'];
                                    $Hpertro =$rowMotorizado['Hpertro'];
                                    $lengua =$rowMotorizado['lengua'];
                                    $relacion_columela =$rowMotorizado['relacion_columela'];

                                    $base_desorde  =$rowMotorizado['base_desorde'];
                                    $Nasoendo  =$rowMotorizado['Nasoendo'];
                                    $tipo_desorde  =$rowMotorizado['tipo_desorde'];
                                    $Hpertro =$rowMotorizado['Hpertro'];
                                    $Maniobra =$rowMotorizado['Maniobra'];
                                    $Hipotesis =$rowMotorizado['Hipotesis'];

                                    $Epoglo  =$rowMotorizado['Epoglo'];
                                    $Estadio_desorden  =$rowMotorizado['Estadio_desorden'];
                                    $pronostico  =$rowMotorizado['pronostico'];
                                    $estudio9 =$rowMotorizado['estudio9'];
                                    $Adaptacion =$rowMotorizado['Adaptacion'];

                                    $Trauma  =$rowMotorizado['Trauma'];
                                    $Resultados  =$rowMotorizado['Resultados'];
                                    $comentarios_desordenes  =$rowMotorizado['comentarios_desordenes'];
                                    $motivoConsulta_oido =$rowMotorizado['motivoConsulta_oido'];
                                    $Reflejo =$rowMotorizado['Reflejo'];

                                    $Seguimiento_oido  =$rowMotorizado['Seguimiento_oido'];
                                    $Giro  =$rowMotorizado['Giro'];
                                    $Notas_oidos  =$rowMotorizado['Notas_oidos'];
                                    $faringe =$rowMotorizado['faringe'];
                                    $Examen_Fisico =$rowMotorizado['Examen_Fisico'];

                                    $pilares  =$rowMotorizado['pilares'];
                                    $Lesiones  =$rowMotorizado['Lesiones'];
                                    $faringe_otros  =$rowMotorizado['faringe_otros'];
                                    $faringe =$rowMotorizado['faringe'];
                                    $notas_faringe =$rowMotorizado['notas_faringe'];

                                    $motivoConsulta_Laringe  =$rowMotorizado['motivoConsulta_Laringe'];
                                    $lesiones  =$rowMotorizado['lesiones'];
                                    $faringe =$rowMotorizado['faringe'];
                                    $notas_faringe =$rowMotorizado['notas_faringe'];

                                    $notas_laringe  =$rowMotorizado['notas_laringe'];
                                    $motivoconsulta_glandulas  =$rowMotorizado['motivoconsulta_glandulas'];
                                    $notas_glandulas  =$rowMotorizado['notas_glandulas'];
                                    $notas_lagrimal =$rowMotorizado['notas_lagrimal'];
                                    $motivoconsulta_cuello =$rowMotorizado['motivoconsulta_cuello'];
                                    $notas_cuello =$rowMotorizado['notas_cuello'];
                                    $Apneas_Vividas =$rowMotorizado['Apneas_Vividas'];
                                    $motivoConsulta_Faringe =$rowMotorizado['motivoConsulta_Faringe'];
                                    $motivoconsulta_lagrimal =$rowMotorizado['motivoconsulta_lagrimal'];
                                    


                                        $obstruccion=str_replace('|','<br>',$rowMotorizado['obstruccion']);
                                    $obstruccion_intensa=str_replace('|','<br>',$rowMotorizado['obstruccion_intensa']);
                                    $estornudos=str_replace('|','<br>',$rowMotorizado['estornudos']);
                                    $secreccion_nasal=str_replace('|','<br>',$rowMotorizado['secreccion_nasal']);
                                    $prurito=str_replace('|','<br>',$rowMotorizado['prurito']);
                                    $epistaxis=str_replace('|','<br>',$rowMotorizado['epistaxis']);
                                    $olfato=str_replace('|','<br>',$rowMotorizado['olfato']);
                                    $cefalea=str_replace('|','<br>',$rowMotorizado['cefalea']);
                                    $simetria=str_replace('|','<br>',$rowMotorizado['simetria']);
                                    $piramide_nasal=str_replace('|','<br>',$rowMotorizado['piramide_nasal']);
                                    $dorso_nasal=str_replace('|','<br>',$rowMotorizado['dorso_nasal']);
                                    $punta_nasal=str_replace('|','<br>',$rowMotorizado['punta_nasal']);
                                    $angulo_naso=str_replace('|','<br>',$rowMotorizado['angulo_naso']);
                                    $angulo_fronto=str_replace('|','<br>',$rowMotorizado['angulo_fronto']);
                                    $base_nasal=str_replace('|','<br>',$rowMotorizado['base_nasal']);
                                    $puntos_paranasales=str_replace('|','<br>',$rowMotorizado['puntos_paranasales']);
                                    $septum_nasal=str_replace('|','<br>',$rowMotorizado['septum_nasal']);
                                    $mucosa_nasal=str_replace('|','<br>',$rowMotorizado['mucosa_nasal']);
                                    $cornete_bulloso=str_replace('|','<br>',$rowMotorizado['cornete_bulloso']);

                                    $lengua=str_replace('|','<br>',$rowMotorizado['lengua']);
                                    $palador_blando=str_replace('|','<br>',$rowMotorizado['palador_blando']);
                                    $uvula=str_replace('|','<br>',$rowMotorizado['uvula']);
                                    $perfil_cara=str_replace('|','<br>',$rowMotorizado['perfil_cara']);
                                    $clasificacion=str_replace('|','<br>',$rowMotorizado['clasificacion']);
                                    $articulacion_temporo=str_replace('|','<br>',$rowMotorizado['articulacion_temporo']);
                                    $apertura_bucal=str_replace('|','<br>',$rowMotorizado['apertura_bucal']);
                                    $lugar_obstrccion=str_replace('|','<br>',$rowMotorizado['lugar_obstrccion']);
                                    $perfil_oido=str_replace('|','<br>',$rowMotorizado['perfil_oido']);
                                    $otoscopia=str_replace('|','<br>',$rowMotorizado['otoscopia']);
                                    $microscopia=str_replace('|','<br>',$rowMotorizado['microscopia']);
                                    $audiometria=str_replace('|','<br>',$rowMotorizado['audiometria']);
                                    $timpanograma=str_replace('|','<br>',$rowMotorizado['timpanograma']);
                                    $audiometria_voca=str_replace('|','<br>',$rowMotorizado['audiometria_voca']);
                                    $petc=str_replace('|','<br>',$rowMotorizado['petc']);
                                    $seguimiento_onda=str_replace('|','<br>',$rowMotorizado['seguimiento_onda']);
                                    $otoemisiones=str_replace('|','<br>',$rowMotorizado['otoemisiones']);
                                    $indice_nariz=str_replace('|','<br>',$rowMotorizado['indice_nariz']);
                                    $perfil_romberg=str_replace('|','<br>',$rowMotorizado['perfil_romberg']);

                                    $romberg_sensible=str_replace('|','<br>',$rowMotorizado['romberg_sensible']);
                                    $marcha=str_replace('|','<br>',$rowMotorizado['marcha']);
                                    $barracoa=str_replace('|','<br>',$rowMotorizado['barracoa']);
                                    $nistagus_provocacion=str_replace('|','<br>',$rowMotorizado['nistagus_provocacion']);
                                    $perfil_uvula=str_replace('|','<br>',$rowMotorizado['perfil_uvula']);
                                    $perfil_amigdalas=str_replace('|','<br>',$rowMotorizado['perfil_amigdalas']);
                                    $amigdalas_linguales=str_replace('|','<br>',$rowMotorizado['amigdalas_linguales']);
                                    $perfil_rinofaringe=str_replace('|','<br>',$rowMotorizado['perfil_rinofaringe']);
                                    $perfil_orofaringe=str_replace('|','<br>',$rowMotorizado['perfil_orofaringe']);
                                    $perfil_hipofaringe=str_replace('|','<br>',$rowMotorizado['perfil_hipofaringe']);
                                    $perfil_epiglotis=str_replace('|','<br>',$rowMotorizado['perfil_epiglotis']);
                                    $perfil_laringe=str_replace('|','<br>',$rowMotorizado['perfil_laringe']);
                                    $perfil_congestion=str_replace('|','<br>',$rowMotorizado['perfil_congestion']);
                                    $perfil_edem=str_replace('|','<br>',$rowMotorizado['perfil_edem']);
                                    $perfil_lesiones=str_replace('|','<br>',$rowMotorizado['perfil_lesiones']);
                                    $perfil_lesionesmuco=str_replace('|','<br>',$rowMotorizado['perfil_lesionesmuco']);
                                    $perfil_cancer=str_replace('|','<br>',$rowMotorizado['perfil_cancer']);
                                    $perfil_paralisis=str_replace('|','<br>',$rowMotorizado['perfil_paralisis']);
                                    $perfil_cierrepli=str_replace('|','<br>',$rowMotorizado['perfil_cierrepli']);
                                    $perfil_subglotis=str_replace('|','<br>',$rowMotorizado['perfil_subglotis']);

                                    $perfil_glandula=str_replace('|','<br>',$rowMotorizado['perfil_glandula']);
                                    $perfil_sialo=str_replace('|','<br>',$rowMotorizado['perfil_sialo']);
                                    $perfil_ecografia=str_replace('|','<br>',$rowMotorizado['perfil_ecografia']);
                                    $perfil_lagrimal=str_replace('|','<br>',$rowMotorizado['perfil_lagrimal']);
                                    $perfil_secresion=str_replace('|','<br>',$rowMotorizado['perfil_secresion']);
                                    $perfil_obstruccion=str_replace('|','<br>',$rowMotorizado['perfil_obstruccion']);
                                    $perfil_cuello=str_replace('|','<br>',$rowMotorizado['perfil_cuello']);
                                    $cornetes_nasal=str_replace('|','<br>',$rowMotorizado['cornetes_nasal']);
                                    $pang_rotemberg=str_replace('|','<br>',$rowMotorizado['pang_rotemberg']);
                                    $paladar_oseo=str_replace('|','<br>',$rowMotorizado['paladar_oseo']);
                                    $perfil_pierna=str_replace('|','<br>',$rowMotorizado['perfil_pierna']);
                                    $perfil_sangrado=str_replace('|','<br>',$rowMotorizado['perfil_sangrado']);
                                    $perfil_edema=str_replace('|','<br>',$rowMotorizado['perfil_edema']);


                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaOtorrino<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaOtorrino<?php echo $id?>">
                                        Fecha <?php echo $Fecha .'-'.$Hora.' ';?>

                                        <button onclick="window.location.href='HO_Finalizado_Historia_Otorrino?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaOtorrino<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <div align="right" >
                                        Fecha <?php echo $Fecha .'-'.$Hora?>
                                        </div>


                                        <div>

                                        <h5> <center><b>Nariz</b></center> </h5><br> <br>
                                        <p>
                                        <?php  if ($motivoConsulta_nariz <> '') {$motivoConsulta_nariz1 = 'Motivo de Consulta:<br> '.$motivoConsulta_nariz;} ?>
                                        <?php  echo $motivoConsulta_nariz1  ?>
                                        </p>

                                        <p>
                                        <?php  if ($obstruccion <> '') {$obstruccion1 = 'Obstrucción Nasal:<br> '.$obstruccion;} ?>
                                        <?php  echo $obstruccion1  ?>
                                        </p>

                                        <p>

                                        <?php  if ($obstruccion_intensa <> '') {$obstruccion_intensa1 = 'Obstrucción Más Intensa:<br> '.$obstruccion_intensa;} ?>
                                        <?php  echo $obstruccion_intensa1  ?>

                                        </p>

                                        <p>
                                        <?php  if ($estornudos <> '') {$estornudos1 = 'Estornudos:<br> '.$estornudos;} ?>
                                        <?php  echo $estornudos1  ?>
                                        </p>

                                        <p>

                                        <?php  if ($secreccion_nasal <> '') {$secreccion_nasal1 = 'Secreción Nasal:<br> '.$secreccion_nasal;} ?>
                                        <?php  echo $secreccion_nasal1  ?>

                                        </p>

                                        <p>

                                        <?php  if ($prurito <> '') {$prurito1 = 'Prurito:<br> '.$prurito;} ?>
                                        <?php  echo $prurito1  ?>

                                        </p>

                                        <p>
                                        <?php  if ($epistaxis <> '') {$epistaxis1 = 'Epistaxis:<br> '.$epistaxis;} ?>
                                        <?php  echo $epistaxis1  ?>

                                        </p>

                                        <p>

                                        <?php  if ($olfato <> '') {$olfato1 = 'Olfato:<br> '.$olfato;} ?>
                                        <?php  echo $olfato1  ?>

                                        </p>

                                        <p>

                                            <?php  if ($cefalea <> '') {$cefalea1 = 'Cefalea:<br> '.$cefalea;} ?>
                                        <?php  echo $cefalea1  ?>

                                        </p>

                                        <br><h5><b>Inspección</b></h5><br>

                                        <p>  <?php  if ($simetria<> '') {$simetria1 = ' '.$simetria;} ?>
                                        <?php  echo  $simetria1?>
                                        </p>

                                        <p>  <?php  if ($piramide_nasal<> '') {$piramide_nasal1 = 'Pirámide Nasal: <br>'.$piramide_nasal;} ?>
                                        <?php  echo  $piramide_nasal1?>
                                        </p>

                                        <p>  <?php  if ($dorso_nasal<> '') {$dorso_nasal1 = 'Dorso Nasal: <br>'.$dorso_nasal;} ?>
                                        <?php  echo  $dorso_nasal1?>
                                        </p>

                                        <p>  <?php  if ($punta_nasal<> '') {$punta_nasal1 = 'Punta Nasal: <br>'.$punta_nasal;} ?>
                                        <?php  echo  $punta_nasal1?>
                                        </p>

                                        <p>  <?php  if ($angulo_naso<> '') {$angulo_naso1 = 'Ángulo Naso-Labial: <br>'.$angulo_naso;} ?>
                                        <?php  echo  $angulo_naso1?>
                                        </p>

                                        <p>  <?php  if ($angulo_fronto<> '') {$angulo_fronto1 = 'Ángulo Fronto – Nasal: <br>'.$angulo_fronto;} ?>
                                        <?php  echo  $angulo_fronto1?>
                                        </p>

                                        <p>  <?php  if ($columella<> '') {$columella1 = 'Columela: <br>'.$columella;} ?>
                                        <?php  echo  $columella1?>
                                        </p>

                                        <p>  <?php  if ($relacion_columela<> '') {$relacion_columela1 = 'Relación Columela – Punta: <br>'.$relacion_columela;} ?>
                                        <?php  echo  $relacion_columela1?>
                                        </p>

                                        <p>  <?php  if ($puntos_paranasales<> '') {$puntos_paranasales1 = 'Puntos Paranasales Dolorosos: <br>'.$puntos_paranasales;} ?>
                                        <?php  echo  $puntos_paranasales1?>
                                        </p>

                                        <p>  <?php  if ($base_nasal<> '') {$base_nasal1 = 'Base Nasal: <br>'.$base_nasal;} ?>
                                        <?php  echo  $base_nasal1?>
                                        </p>

                                        <br><h5><b>Rinoscopia Anterior</b></h5><br>
                                        
                                            <p>
                                            <?php  if ( $septum_nasal<> '') { $septum_nasal1 = 'Séptum Nasal: <br>'. $septum_nasal;} ?>
                                        <?php  echo  $septum_nasal1 ?>

                                        </p>
                                        <p>
                                            <?php  if ( $mucosa_nasal<> '') { $mucosa_nasal1 = 'Mucosa Nasal: <br>'. $mucosa_nasal;} ?>
                                        <?php  echo  $mucosa_nasal1 ?>
                                        </p>

                                        <p>
                                            <?php  if ( $cornetes_nasal<> '') { $cornetes_nasal1 = 'Cornetes Nasales: <br>'. $cornetes_nasal;} ?>
                                        <?php  echo  $cornetes_nasal1 ?>
                                        </p>

                                        <p>
                                            <?php  if ( $cornete_bulloso<> '') { $cornete_bulloso1 = 'Cornete Medio Bulloso: <br>'. $cornete_bulloso;} ?>
                                        <?php  echo  $cornete_bulloso1 ?>
                                        </p>

                                        <p>
                                            <?php  if ( $Observaciones_nariz<> '') { $Observaciones_nariz1 = 'Observaciones: <br>'. $Observaciones_nariz;} ?>
                                        <?php  echo  $Observaciones_nariz1 ?>
                                        </p>

                                        <h5> <center><b>Desórdenes de Sueño</b></center></h5> <br> <br>
                                        
                                        <p>
                                            <?php  if ( $motivoconsulta_desorden<> '') { $motivoconsulta_desorden1 = 'Motivo de Consulta: <br>'. $motivoconsulta_desorden."<br><br>";} ?>
                                        <?php  echo  $motivoconsulta_desorden1 ?>
                                        <?php  if ($peso <> '') {$peso1 = 'Peso en Kg: '.$peso.'&nbsp';} ?>
                                        <?php  echo  $peso1?> 
                                        <?php  if ($altura <> '') {$altura1 = 'Talla en Centímetros: '.$altura.'&nbsp';} ?>
                                        <?php  echo  $altura1?> 
                                        <?php  if ($imc <> '') {$imc1 = 'IMC: '.$imc;} ?>
                                        <?php  echo  $imc1?> <br><br>
                                        <?php  if ($rdesordenes <> '') {$rdesordenes1 = 'Otros:'.$rdesordenes.'<br>';} ?>
                                        <?php  echo  $rdesordenes1?> <br>
                                        <?php  if ($desorden <> '') {$desorden1 = ''.$desorden .'<br><br>' ;} ?>
                                        <?php  echo  $desorden1?>    
                                        <?php  if ($Apneas_Vividas<> '') {$Apneas_Vividas1 = ''.$Apneas_Vividas.'<br><br>' ;} ?>
                                        <?php  echo  $Apneas_Vividas1?> 
                                        <?php  if ($antecedentes<> '') {$antecedentes1 ='Antecedentes: '.$antecedentes.'<br><br>' ;} ?>
                                        <?php  echo  $antecedentes1?> 
                                        <?php  if ($pang_rotemberg <> '') {$pang_rotemberg1 ='Examen Físico: <br> Pang Rotemberg: '.$pang_rotemberg  .'<br>' ;} ?>
                                        <?php  echo  $pang_rotemberg1?> 
                                        <?php  if ($Nariz_desorde<> '') {$Nariz_desorde1 ='Nariz: '.$Nariz_desorde .'<br>' ;} ?>
                                        <?php  echo  $Nariz_desorde1?> 
                                        <?php  if ($Friedman <> '') {$Friedman1 ='Lengua: '.$Friedman.'<br><br>' ;} ?>
                                        <?php  echo  $Friedman1?> 
                                        <?php  if ($Paladar <> '') {$Paladar1 ='Paladar: '.$Paladar.'<br><br>' ;} ?>
                                        <?php  echo  $Paladar1?> 
                                        <?php  if ($Hpertro <> '') {$Hpertro1 ='Amígdalas: '.$Hpertro .'<br>' ;} ?>
                                        <?php  echo  $Hpertro1?>

                                        <br><h5><b>Boca y Orofaringe</b></h5><br>

                                        <?php  if ( $lengua <> '') { $lengua1 ='Lengua: <br>'. $lengua.'<br>' ;} ?>
                                        <?php  echo $lengua1?> 

                                        <?php  if ( $paladar_oseo <> '') { $paladar_oseo1 ='Paladar Óseo: <br>'.$paladar_oseo.'<br>' ;} ?>
                                        <?php  echo $paladar_oseo1?> 
                                        <?php  if ( $palador_blando <> '') {$palador_blando1 ='Paladar Blando: <br>'.$palador_blando.'<br>' ;} ?>
                                        <?php  echo $palador_blando1?> 
                                        <?php  if ( $uvula<> '') {$uvula1 ='Úvula: <br>'.$uvula.'<br>' ;} ?>
                                        <?php  echo $uvula1?> 
                                        <?php  if ($base_desorde<> '') {$base_desorde1 =''.$base_desorde.'<br>' ;} ?>
                                        <?php  echo $base_desorde1?> 
                                        <?php  if ($perfil_cara<> '') {$perfil_cara1 ='Perfil Cara: <br>'.$perfil_cara.'<br>' ;} ?>
                                        <?php  echo $perfil_cara1?> 
                                        <?php  if ($clasificacion<> '') {$clasificacion1 ='Clasificación (Angle): <br>'.$clasificacion.'<br>' ;} ?>
                                        <?php  echo $clasificacion1?> 
                                        <?php  if ($articulacion_temporo<> '') {$articulacion_temporo1 ='Articulación Temporo-Mandibular: <br>'.$articulacion_temporo.'<br>' ;} ?>
                                        <?php  echo $articulacion_temporo1?> 
                                        <?php  if ($apertura_bucal<> '') {$apertura_bucal1 ='Apertura Bucal: <br>'.$apertura_bucal.'<br>' ;} ?>
                                        <?php  echo $apertura_bucal1?> 
                                        <?php  if ($Nasoendo<> '') {$Nasoendo1 =' '.$Nasoendo.'<br>' ;} ?>
                                        <?php  echo $Nasoendo1?> 
                                        <?php  if ($lugar_obstrccion<> '') {$lugar_obstrccion1 ='Lugar de Obstrucción: <br> '.$lugar_obstrccion.'<br>' ;} ?>
                                        <?php  echo $lugar_obstrccion1?> 
                                        <?php  if ($tipo_desorde<> '') {$tipo_desorde1 =''.$tipo_desorde.'<br>' ;} ?>
                                        <?php  echo $tipo_desorde1?> 

                                        <br><h5><b>Maniobra: Mejora Apertura</b></h5><br>

                                        <?php  if ($Maniobra<> '') {$Maniobra1 =''.$Maniobra.'<br><br>' ;} ?>
                                        <?php  echo $Maniobra1?> 

                                        <?php  if ($amigdalas_linguales<> '') {$amigdalas_linguales1 ='Amígdalas Linguales: (L.T.H. Friedman): <br>'.$amigdalas_linguales.'<br>' ;} ?>
                                        <?php  echo $amigdalas_linguales1?> 

                                        <?php  if ($Epoglo<> '') {$Epoglo1 =' '.$Epoglo.'<br>' ;} ?>
                                        <?php  echo $Epoglo1?> 

                                        <br><h5><b>Pronóstico: Escala de Friedman</b></h5><br>

                                        <?php  if ($Estadio_desorden<> '') {$Estadio_desorden1 ='Estadio o Fase: '.$Estadio_desorden.'<br>' ;} ?>
                                        <?php  echo $Estadio_desorden1?>

                                        <?php  if ($pronostico<> '') {$pronostico1 =''.$pronostico.'<br>' ;} ?>
                                        <?php  echo $pronostico1?>

                                            <?php  if ($estudio9<> '') {$estudio91 =''.$estudio9.'<br>' ;} ?>
                                        <?php  echo $estudio91?>

                                        <?php  if ($Adaptacion<> '') {$Adaptacion1 ='Adaptación:<br>'.$Adaptacion.'<br>' ;} ?>
                                        <?php  echo $Adaptacion1?>

                                        <?php  if ($Hipotesis<> '') {$Hipotesis1 ='Hipótesis Diagnóstica:<br>'.$Hipotesis.'<br>' ;} ?>
                                        <?php  echo $Hipotesis1?>

                                        <?php  if ($Resultados<> '') {$Resultados1 ='Resultado de Estudios:<br>'.$Resultados.'<br>' ;} ?>
                                        <?php  echo $Resultados1?>


                                        <?php  if ($comentarios_desordenes<> '') {$comentarios_desordenes1 ='<br>Comentarios:<br>'.$comentarios_desordenes.'<br>' ;} ?>
                                        <?php  echo $comentarios_desordenes1?>



                                        
                                                
                                        </p>

                                        <h5><center><b>Oído</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoConsulta_oido<> '') { $motivoConsulta_oido1 = 'Motivo de Consulta: <br>'. $motivoConsulta_oido.'<br>';} ?>
                                        <?php  echo  $motivoConsulta_oido1 ?>
                                        <?php  if ($perfil_oido <> '') {$perfil_oido1 = '<br>Tipo:<br> '.$perfil_oido.'<br>';} ?>
                                        <?php  echo  $perfil_oido1?> 
                                        <?php  if ($Trauma <> '') {$Trauma1 = ''.$Trauma.'<br>';} ?>
                                        <?php  echo  $Trauma1?> 
                                        <?php  if ($otoscopia <> '') {$otoscopia1 = '<br>Otoscopía:<br>'.$otoscopia;} ?>
                                        <?php  echo  $otoscopia1?> 
                                        <?php  if ($microscopia <> '') {$microscopia1 = '<br>Microscopía:<br>'.$microscopia.'';} ?>
                                        <?php  echo  $microscopia1?> 
                                        <?php  if ($audiometria <> '') {$audiometria1 = '<br>Audiometría:<br> '.$audiometria .'' ;} ?>
                                        <?php  echo  $audiometria1?>    
                                        <?php  if ($timpanograma<> '') {$timpanograma1 = '<br>Timpanograma:<br> '.$timpanograma.'' ;} ?>
                                        <?php  echo  $timpanograma1?> 
                                        <?php  if ($Reflejo<> '') {$Reflejo1 ='<br>'.$Reflejo.'<br>' ;} ?>
                                        <?php  echo  $Reflejo1?> 
                                        <?php  if ($audiometria_voca <> '') {$audiometria_voca1 ='<br>Audiometría Vocal:<br> '.$audiometria_voca  .'' ;} ?>
                                        <?php  echo  $audiometria_voca1?> 
                                        <?php  if ($petc<> '') {$petc1 ='<br>PETC:<br> '.$petc.'' ;} ?>
                                        <?php  echo  $petc1?> 
                                        <?php  if ($seguimiento_onda <> '') {$seguimiento_onda1 ='<br>Seguimiento Onda V:<br> '.$seguimiento_onda.'' ;} ?>
                                        <?php  echo  $seguimiento_onda1?> 
                                        <?php  if ($otoemisiones <> '') {$otoemisiones1 ='<br>Otoemisiones Acústicas:<br> '.$otoemisiones.'' ;} ?>
                                        <?php  echo  $otoemisiones1?> 
                                        <?php  if ($indice_nariz <> '') {$indice_nariz1 ='<br>Índice Nariz:<br> '.$indice_nariz .'' ;} ?>
                                        <?php  echo  $indice_nariz1?>
                                        <?php  if ($Seguimiento_oido <> '') {$Seguimiento_oido1 ='<br> '.$Seguimiento_oido .'<br>' ;} ?>
                                        <?php  echo  $Seguimiento_oido1?>
                                        <?php  if ($perfil_pierna <> '') {$perfil_pierna1 ='<br>Pierna:<br> '.$perfil_pierna.'' ;} ?>
                                        <?php  echo  $perfil_pierna1?>
                                        <?php  if ($perfil_romberg <> '') {$perfil_romberg1 ='<br>Romberg:<br> '.$perfil_romberg.'' ;} ?>
                                        <?php  echo  $perfil_romberg1?>
                                        <?php  if ($romberg_sensible <> '') {$romberg_sensible1 ='<br>Romberg Sensible:<br> '.$romberg_sensible.'' ;} ?>
                                        <?php  echo  $romberg_sensible1?>
                                        <?php  if ($marcha <> '') {$marcha1 ='<br>Marcha:<br> '.$marcha .'<br>' ;} ?>
                                        <?php  echo  $marcha1?>

                                        <br><h5><b>Giro Brusco Cabeza</b></h5><br>

                                        <?php  if ( $Giro <> '') { $Giro1 =''. $Giro.'<br>' ;} ?>
                                        <?php  echo $Giro1?> 

                                        <br><h5><b>Maniobras de Provocación</b></h5><br>

                                        <?php  if ( $barracoa <> '') { $barracoa1 ='Barbacoa: <br>'.$barracoa.'<br>' ;} ?>
                                        <?php  echo $barracoa1?> 
                                        <?php  if ( $nistagus_provocacion <> '') {$nistagus_provocacion1 ='Nistagmus Provocación: <br>'.$nistagus_provocacion.'<br>' ;} ?>
                                        <?php  echo $nistagus_provocacion1?> 
                                        <?php  if ( $Notas_oidos<> '') {$Notas_oidos1 ='Notas: '.$Notas_oidos.'<br>' ;} ?>
                                        <?php  echo $Notas_oidos1?> 
                                        
                                        </p>

                                        <h5><center><b>Faringe</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoConsulta_Faringe<> '') { $motivoConsulta_Faringe1 = 'Motivo de Consulta: <br>'. $motivoConsulta_Faringe.'<br>';} ?>
                                        <?php  echo  $motivoConsulta_Faringe1 ?>
                                        <?php  if ($faringe <> '') {$faringe1 = '<br>'.$faringe.'<br>';} ?>
                                        <?php  echo  $faringe1?> 
                                        <?php  if ($Examen_Fisico <> '') {$Examen_Fisico1 = '<br>Examen Físico: <br>'.$Examen_Fisico.'<BR>';} ?>
                                        <?php  echo  $Examen_Fisico1?> 
                                        <?php  if ($pilares <> '') {$pilares1 = '<br>Pilares Anteriores-Folículos Linf: <br>'.$pilares;} ?>
                                        <?php  echo  $pilares1?> <br>
                                        <?php  if ($Lesiones <> '') {$Lesiones1 = ''.$Lesiones.'';} ?>
                                        <?php  echo  $Lesiones1?> <br>
                                        <?php  if ($perfil_sangrado <> '') {$perfil_sangrado1 = '<br>Sangrado:<br>'.$perfil_sangrado.'';} ?>
                                        <?php  echo  $perfil_sangrado1?> <br>
                                        
                                        <?php  if ($perfil_uvula <> '') {$perfil_uvula1 = 'Úvula: <br>'.$perfil_uvula .'' ;} ?>
                                        <?php  echo  $perfil_uvula1?>    
                                        <?php  if ($perfil_amigdalas<> '') {$perfil_amigdalas1 = '<br>Amígdalas: <br>'.$perfil_amigdalas.'' ;} ?>
                                        <?php  echo  $perfil_amigdalas1?> 
                                        <?php  if ($faringe_otros<> '') {$faringe_otros1 =''.$faringe_otros.'<br>' ;} ?>
                                        <?php  echo  $faringe_otros1?> 
                                        
                                        <br><h5><b>Naso-Faringo-Laringoscopia</b></h5><br>

                                        <?php  if ( $perfil_rinofaringe <> '') { $perfil_rinofaringe1 ='Rinofaringe:<br>'. $perfil_rinofaringe.'<br>' ;} ?>
                                        <?php  echo $perfil_rinofaringe1?> 

                                        <?php  if ( $perfil_orofaringe <> '') { $perfil_orofaringe1 ='Orofaringe: <br>'. $perfil_orofaringe.'<br>' ;} ?>
                                        <?php  echo $perfil_orofaringe1?>

                                        <?php  if ( $perfil_hipofaringe <> '') { $perfil_hipofaringe1 ='Hipofaringe: <br>'. $perfil_hipofaringe.'<br>' ;} ?>
                                        <?php  echo $perfil_hipofaringe1?>

                                        <?php  if ( $perfil_epiglotis <> '') { $perfil_epiglotis1 ='Epiglotis: <br>'. $perfil_epiglotis.'<br>' ;} ?>
                                        <?php  echo $perfil_epiglotis1?>

                                        <?php  if ( $notas_faringe <> '') { $notas_faringe1 ='Notas: <br>'. $notas_faringe.'<br>' ;} ?>
                                        <?php  echo $notas_faringe1?>

                                        
                                        </p>

                                        <h5><center><b>Laringe</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoConsulta_Laringe<> '') { $motivoConsulta_Laringe1 = 'Motivo de Consulta: <br>'. $motivoConsulta_Laringe."<br>";} ?>
                                        <?php  echo  $motivoConsulta_Laringe1 ?>
                                        <?php  if ($perfil_laringe <> '') {$perfil_laringe1 = 'Tipo: '.$perfil_laringe.'&nbsp<br>';} ?>
                                        <?php  echo  $perfil_laringe1?> 
                                        
                                        <br><h5><b>Laringoscopia Indirecta</b></h5><br>

                                        <?php  if ( $perfil_congestion <> '') { $perfil_congestion1 ='Congestión: <br>'. $perfil_congestion.'<br>' ;} ?>
                                        <?php  echo $perfil_congestion1?> 

                                        <?php  if ( $perfil_edema <> '') { $perfil_edema1 ='Edema de Pliegues Vocales: <br>'. $perfil_edema.'<br>' ;} ?>
                                        <?php  echo $perfil_edema1?>

                                        <?php  if ( $perfil_lesiones <> '') { $perfil_lesiones1 ='Lesiones Submucosas: <br>'. $perfil_lesiones.'<br>' ;} ?>
                                        <?php  echo $perfil_lesiones1?>

                                        <?php  if ( $perfil_lesionesmuco <> '') { $perfil_lesionesmuco1 ='Lesiones Mucosas: <br>'. $perfil_lesionesmuco.'<br>' ;} ?>
                                        <?php  echo $perfil_lesionesmuco1?>

                                        <?php  if ( $perfil_cancer <> '') { $perfil_cancer1 ='Cáncer: <br>'. $perfil_cancer.'<br>' ;} ?>
                                        <?php  echo $perfil_cancer1?>

                                        <?php  if ( $perfil_paralisis <> '') { $perfil_paralisis1 ='Parálisis: <br>'. $perfil_paralisis.'<br>' ;} ?>
                                        <?php  echo $perfil_paralisis1?>

                                        <?php  if ( $perfil_cierrepli <> '') { $perfil_cierrepli1 ='Cierre de Pliegues Vocales: <br>'. $perfil_cierrepli.'<br>' ;} ?>
                                        <?php  echo $perfil_cierrepli1?>

                                        <?php  if ( $perfil_subglotis <> '') { $perfil_subglotis1 ='Subglotis: <br>'. $perfil_subglotis.'<br>' ;} ?>
                                        <?php  echo $perfil_subglotis1?>

                                        <?php  if ( $notas_laringe <> '') { $notas_laringe1 ='Notas:'. $notas_laringe.'<br>' ;} ?>
                                        <?php  echo $notas_laringe1?>

                                        
                                        </p>

                                        <h5><center><b>Glándulas Salivales</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoconsulta_glandulas<> '') { $motivoconsulta_glandulas1 = 'Motivo de Consulta: <br>'. $motivoconsulta_glandulas."<br>";} ?>
                                        <?php  echo  $motivoconsulta_glandulas1 ?><BR>
                                        <?php  if ($perfil_glandula <> '') {$perfil_glandula1 = 'Tipo: <br>'.$perfil_glandula.'<BR>';} ?>
                                        <?php  echo  $perfil_glandula1?> 


                                        <?php  if ( $perfil_sialo <> '') { $perfil_sialo1 ='Sialo-Tomografía: <br>'. $perfil_sialo.'<br>' ;} ?>
                                        <?php  echo $perfil_sialo1?> 

                                        <?php  if ( $perfil_ecografia <> '') { $perfil_ecografia1 ='Ecografía: <br>'. $perfil_ecografia.'<br>' ;} ?>
                                        <?php  echo $perfil_ecografia1?>
                                        

                                        <?php  if ( $notas_glandulas <> '') { $notas_glandulas1 ='Notas:'. $notas_glandulas.'<br>' ;} ?>
                                        <?php  echo $notas_glandulas1?>

                                        
                                        </p>

                                        </p>

                                        <h5><center><b>Vía Lagrimal</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoconsulta_lagrimal<> '') { $motivoconsulta_lagrimal1 = 'Motivo de Consulta: <br>'. $motivoconsulta_lagrimal.'<br>';} ?>
                                        <?php  echo  $motivoconsulta_lagrimal1 ?><BR>
                                        
                                        <?php  if ($perfil_lagrimal <> '') {$perfil_lagrimal1 = 'Tipo: <br>'.$perfil_lagrimal.'<BR>';} ?>
                                        <?php  echo  $perfil_lagrimal1?> 


                                        <?php  if ( $perfil_secresion <> '') { $perfil_secresion1 ='Secreción: <br>'. $perfil_secresion.'<br>' ;} ?>
                                        <?php  echo $perfil_secresion1?> 

                                        <?php  if ( $perfil_obstruccion <> '') { $perfil_obstruccion1 ='Obstrucción: <br>'. $perfil_obstruccion.'<br>' ;} ?>
                                        <?php  echo $perfil_obstruccion1?>
                                        

                                        <?php  if ( $notas_lagrimal <> '') { $notas_lagrimal1 ='Notas: <br>'. $notas_lagrimal.'<br>' ;} ?>
                                        <?php  echo $notas_lagrimal1?>

                                        
                                        </p>


                                        <h5><center><b>Cuello</b></center></h5><br> 
                                        
                                        <p>
                                            <?php  if ( $motivoconsulta_cuello<> '') { $motivoconsulta_cuello1 = 'Motivo de Consulta: <br>'. $motivoconsulta_cuello.'<br>';} ?>
                                        <?php  echo  $motivoconsulta_cuello1 ?>
                                        </p>
                                        <P>
                                        <?php  if ($perfil_cuello <> '') {$perfil_cuello1 = 'Tipo: <br>'.$perfil_cuello.'&nbsp <br>';} ?>
                                        <?php  echo  $perfil_cuello1?> 
                                        </P>
                                        <P>
                                        <?php  if ( $notas_cuello <> '') { $notas_cuello1 ='Notas:'. $notas_cuello.'<br>' ;} ?>
                                        <?php  echo $notas_cuello1?>

                                        
                                        </p>
                                        
                                        <div class="col-md-12 row">
<?php
                                            
                                            $queryArchivos = mysqli_query($conn3, "SELECT * FROM  archivos where cliente_id = $cliente_id AND historia_id = $id AND Realizado_Desde = 'Historia_Clinica_Otorrino'");
                                            while ($RowArchivos = mysqli_fetch_array($queryArchivos)) {

                                            $codigoimagen             = $RowArchivos['codigo'];

                                                if($codigoimagen!=""){
                                                    echo "<div class='col-md-4'><img src='{$Base}archivos/$codigoimagen' width='250px' height='250px'></div>";
                                                }
                                            }
                                            
                                            ?>
</div>

                                        </div>


                                    </div>
                                  </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 1-->



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                            </div>
                          </div>
                          <!--final accordion--> 


                        </div>
                        <!-- cierre seccion 2-->



                        




                    </div>
                </div>
            </div>
        </div>
    </div>

        















      </div>
    </section>
  </div>
           

   <?php
    include 'footer.php';

   ?>