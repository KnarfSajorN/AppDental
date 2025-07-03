<?php
include 'header.php';
include 'menu.php'; 

function limpiarNombreHistoria($nombre) {
  // Expresión regular para encontrar las palabras "Historia", "historia" y "historias"
  $patron = '/\b(?:Historia de|Historias de|historia de|historias de|Historia|Historias|historia|historias|)\b/i';
  
  // Reemplazar las palabras encontradas por una cadena vacía
  $nombre_limpiado = preg_replace($patron, '', $nombre);
  
  return $nombre_limpiado;
}

$idHistoria = ($_GET['iCr'] != '' ? decrypt($_GET['iCr']) : $_GET['idHistoria']);
$queryListhc = mysqli_query($conn3, "SELECT * from configTablasOC where id = $idHistoria ");
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $Nombre_HistoriaCreador_Limpio = limpiarNombreHistoria($rowhc['nombre']);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Historial del Paciente
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol> -->
  </section>
  <style>
    /* Boton sucess */
    .css-button-sharp--green {
      min-width: 130px;
      height: 40px;
      color: #fff;
      padding: 5px 10px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      display: inline-block;
      outline: none;
      border: 2px solid #117a8b;
      background: #117a8b;
      border-radius: 30px;
    }

    .css-button-sharp--green:hover {
      background: #fff;
      color: #117a8b
    }
  </style>
  <!-- Main content -->
  <section class="content">
    <div class="">

      <?php

      $clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);
      $idHistoria = ($_GET['iCr'] != '' ? decrypt($_GET['iCr']) : $_GET['idHistoria']);
      $usuarioId = $_SESSION['ID'];
      $cliente_id_modulo = $clienteId; //Evoluciones


      $queryListhc = mysqli_query($conn3, "SELECT * from configTablasOC where id = $idHistoria ");
      $nrowl = mysqli_num_rows($queryListhc);
      while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $Tabla = $rowhc['name'];
        $nombre = $rowhc['nombre'];
      }


      ?>





      <div class="card-body">
        <div class="box box-body">


          <?php echo datosPacientes($clienteId); ?>


          <div align="center">
            <!-- <a class="css-button-sharp--green" href="configConsultarTodo.php?clienteId=<?php echo $clienteId; ?>&idHistoria=<?php echo $idHistoria ?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a> -->
            <?php
            echo '<a class="btn btn-outline-info btn-lg rounded-pill shadow" href="cHistoriaOC?cI=' . encrypt($clienteId) . '&iCr=' . encrypt($idHistoria) . '" title="Agregar Consulta para ' . $nombreH . '" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>';
            ?>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="anexosPaciente?cI=<?= encrypt($clienteId); ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
            <?php

            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            if($idHistoria=="51" || $idHistoria=="52" || $idHistoria=="54"){
            $FacturacionTipo="OD_GenerarFactura?clienteId={$Cliente_id}";//Facturacion Odontologia, con esto cambia la ruta del boton
            }
            include 'IncludeBotonesHistorialHistorias.php';
            ?>

          </div>

        </div>





        
        <br>






        <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation"><a href="#Consultas" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de <?=$Nombre_HistoriaCreador_Limpio?></a></li>
                  <li role="presentation"><a href="#Examenes" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Registros de Exámenes </a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">


                  <!-- inicio seccion 1 -->
                  <div role="tabpanel" class="tab-pane fade in active show" id="Consultas">

                    <!--inicio accordion-->
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <!-- <h3>
                  Consultas
                  </h3> -->

                        <?php
                        $queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                          $grafica_audiometria1      = $rowMotorizado['grafica_audiometria'];
                        }

                        $grafica_audiometria = json_decode($grafica_audiometria1, true);
                        $queryConsulta = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc");
                        //ECHO   "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc";
                        $nrowl = mysqli_num_rows($queryConsulta);
                        while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                          $ID = $rowConsulta['id'];
                          $Fecha  = $rowConsulta['Fecha'];
                          $hora  = $rowConsulta['Hora'];
                          $D1 = $rowConsulta['D1'];
                          $D2 = $rowConsulta['D2'];
                          $D3 = $rowConsulta['D3'];
                          $D4 = $rowConsulta['D4'];
                          $D5 = $rowConsulta['D5'];
                          $NOTA1 = $rowConsulta['nota1'];
                          $NOTA2 = $rowConsulta['nota2'];
                          $NOTA3 = $rowConsulta['nota3'];
                          $NOTA4 = $rowConsulta['nota4'];
                          $NOTA5 = $rowConsulta['nota5'];



                        ?>

                          <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $ID ?>" aria-expanded="false" aria-controls="Historia<?php echo $ID ?>">
                                  Fecha <?php echo $Fecha ?>
                                  <!--<button onclick="window.open('cFinalizado?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </button>-->
                                  <button title="Ver Finalizado" onclick="window.open('cFinalizado?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i> </button>
                                  |

                                  <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                  <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>

                                  <!--
                          <button title="Agregar Seguimiento" onclick="window.open('evoluciones?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" ><i class="fa fa-file"></i> </button>
                          |
                          <button title="Ver Seguimientos" onclick="window.open('verEvoluciones?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" ><i class="fa fa-eye"></i> </button>
                          -->
                                  
                                </a>

                              </h4>
                            </div>
                            <div id="Historia<?php echo $ID ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                              <div class="panel-body">




                                <hr align="center" size="10" width="100%" color="#000000">

                                <div align="right">
                                  Fecha <?php echo $Fecha . '-' . $Hora ?>
                                </div>



                                <?php

                                if ($idHistoria == "34") {
                                  echo "Para visualizar la historia, ingresar en el primer icono y darle al botón imprimir evaluación audiológica";
                                }
                                $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalleOC where idTabla = $idHistoria order by convert(orden, signed) asc");
                                $nrowl = mysqli_num_rows($queryDetalle);
                                while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                  $idCampo  = $rowDetalle['id'];
                                  $div_class  = $rowDetalle['div_class'];
                                  $div_align  = $rowDetalle['div_align'];
                                  $div_nombre_campo  = $rowDetalle['div_nombre_campo'];
                                  $input_type  = $rowDetalle['input_type'];
                                  $input_calss  = $rowDetalle['input_calss'];
                                  $input_name  = $rowDetalle['input_name'];
                                  $input_placeholder  = $rowDetalle['input_placeholder'];
                                  $input_id  = $rowDetalle['input_id'];
                                  $input_required  = $rowDetalle['input_required'];
                                  $input_pattern = $rowDetalle['input_pattern'];
                                  $input_onChange  = $rowDetalle['input_onChange'];
                                  $select_table  = $rowDetalle['select_table'];
                                  $style  = $rowDetalle['style'];
                                  $tipoCampo  = $rowDetalle['tipoCampo'];
                                  $input_maxlength  = $rowDetalle['input_maxlength'];
                                  $input_oninput  = $rowDetalle['input_oninput'];
                                  $div_nombre_valor  = $rowDetalle['div_nombre_valor'];
                                  $input_value  = $rowDetalle['input_value'];

                                  if ($idHistoria == "34") {
                                    $tipoCampo = "Ninguno";
                                  }



                                  if ($tipoCampo == 'text') {
                                    $valor = 0;


                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {

                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                    }
                                  }

                                  if ($tipoCampo == 'number') {




                                    $valor = 0;
                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {


                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . ' <p>';
                                    }
                                  }

                                  if ($tipoCampo == 'textarea') {

                                    $valor = 0;

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {



                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                    }
                                  }







                                  if ($tipoCampo == 'select_si_no') {

                                    $valor = 0;

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {

                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                    }
                                  }






                                  if ($tipoCampo == 'select') {


                                    $valor = 0;

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {



                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                    }
                                  }






                                  if ($tipoCampo == 'selectmultiple') {

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    $data = explode("|", $valor);
                                    $view = '';
                                    foreach ($data as $k => $v)
                                      if ($v != '') {
                                        $view .= ' ' . $v . ', ';
                                      }

                                    echo '<p>' . $div_nombre_campo . ' ' . trim($view, ', ') . '<p>';
                                  }






                                  if ($tipoCampo == 'separador') {
                                    $div = 'separador' . rand(1, 999);


                                    echo '<p align= "center"> <strong> ' . $div_nombre_campo . '</strong><p>';
                                  }


                                  if ($idCampo == '2630') {
                                    echo

                                    '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>                        
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>  
            </table>  ';
                                    if ($D1 <> '') {
                                      $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D1 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA1 . '</b></h5> </td>
            </tr> ';
                                    }

                                    if ($D2 <> '') {
                                      $ID2 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D2 . '</b></h5>  </td>
             

<td  colspan="6">
               <b> <h5>' . $NOTA2 . '</b></h5> </td>
            </tr> ';
                                    }

                                    if ($D3 <> '') {
                                      $ID3 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D3 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA3 . '</b></h5> </td>
            </tr> ';
                                    }



                                    $FINTABLA = '</TABLE>';



                                    echo $ID1;
                                    echo $ID2;
                                    echo $ID3;

                                    echo $FINTABLA;
                                  }






                                  if ($tipoCampo == 'date') {

                                    $valor = 0;

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {



                                      echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                    }
                                  }






                                  if ($tipoCampo == 'file') {


                                    $valor = 0;

                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                      $valor      = $rowMotorizado[$input_name];
                                    }

                                    if (strlen($valor) > 0) {

                                      $file = explode("|", $valor);
                                      $view = '';
                                      foreach ($file as $data) {
                                        if ($data != '') {
                                          $view .= '<img src="' . $data . '" height="100">';
                                        }
                                      }

                                      echo '<p>' . $div_nombre_campo . ' ' . $view . '<p>';
                                    }
                                    echo '<div><input  type="hidden" name="grafica" id="grafica" value="' . $grafica_audiometria1 . '"></div>';
                                  }
                                }

                                //$editar = "<div align='right'><a  href='cHistoria?clienteId=$clienteId&idHistoria=$idHistoria&id=$ID'><i title='Borrar Campo' style='font-size: 18px;' class='fa fa-pencil'> </i></a></div>";

                                //echo $editar;
                                ?>




                              </div>
                            </div>
                          </div>


                        <?php }  ?>

                      </div>
                    </div>
                    <!--final accordion-->   
                  </div>
                  <!-- cierre seccion 1-->

                  <?php
                  /*
                  <!-- inicio seccion 2 -->
                  <div role="tabpanel" class="tab-pane fade" id="Examenes">

                    <!--inicio accordion-->
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <hr align="center" size="10" width="100%" color="#000000">
                        <!-- <h3> Registro de Archivos </h3>   -->

                        <table width="100%" border="1">
                          <tr>
                            <th class="tg-c3ow">Resultados</th>
                            <th class="tg-0pky"></th>
                            <th class="tg-0lax"></th>
                            <th class="tg-0lax"></th>
                          </tr>

                          <?php
                          $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1");
                          $nrowlER = mysqli_num_rows($queryImg);
                          while ($resulImg = mysqli_fetch_array($queryImg)) {
                          ?>
                            <tr>
                              <th>

                                <?php echo $resulImg['codigo']; ?>

                              </th>
                              <th>
                                <?php echo $resulImg['fecha']; ?>


                              </th>
                              <th>

                                <a target="blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                  <a href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                  </a>
                                </a>

                              </th>
                              <th>
                                <a target="_blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                  <a href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                  </a>
                                </a>

                              </th>
                            </tr>






                          <?php } ?>

                        </table>

                      </div>

                    </div>
                    <!--final accordion-->   
                  </div>
                  <!-- cierre seccion 2-->
                  */
                  ?>

                  <!-- inicio seccion 2 -->




            <div role="tabpanel" class="tab-pane fade" id="Examenes">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  



                <hr align="center" size="10" width="100%" color="#000000">
                  <link type="text/css" rel="stylesheet" href="css/tabs.css" />

                  <div class="page" style="background-color: aliceblue;padding: 20px;">
                    <!--<h1>Pure CSS Tabs</h1>  -->
                    <!-- tabs -->
                    <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                      <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                      <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                      <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                      <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                      <ul>
                        <li class="tab-content tab-content-first">
                          <h1>Registro de Exámenes</h1>

                          <table class="table table-responsive" style="display:inline-table!important;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre Archivo</th>
                                <th scope="col">Carpeta</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-trash" aria-hidden="true"></i></th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 ");
                              $nrowlER = mysqli_num_rows($queryImg);
                              while ($resulImg = mysqli_fetch_array($queryImg)) {
                                $contador++;
                                $Producto = $resulImg['id'];

                              ?>
                                <tr>
                                  <td>
                                    <?php echo $contador ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['NombreVisual']; ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['descripcion']; ?>
                                  </td>
                                  <td>
                                    <?php echo $resulImg['fecha']; ?>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                      <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                      </a>
                                    </a>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                      <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                      </a>
                                    </a>
                                  </td>
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                      Enviar Archivo <br>
                                    </a>
                                  </td>
                                  <td style="text-align: center;">
                                  <a href="<?php echo $Base; ?>historiaImagenes_eliminar.php?cI=<?= encrypt($clienteId); ?>&iI=<?= encrypt($Producto); ?>">
                                    Eliminar Archivo <br>
                                  </a>
                                </td>

                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>

                        </li><!-- cierre del primer modulo archivos -->

                        <li class="tab-content tab-content-2 typography">
                          <h1 class="txt_rsp">Registro de Carpetas</h1>



                          <table class="table table-responsive" style="display:inline-table!important;">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Carpeta</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php
                              $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 group by descripcion");

                              $nrowlER = mysqli_num_rows($queryarchivo);
                              while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                $descripcion             = $resularchivo['descripcion'];

                              ?>





                                <tr>
                                  <td>
                                    <?php echo $contador ?>
                                  </td>
                                  <td>
                                    <?php echo $descripcion; ?>
                                  </td>
                                  <td>
                                    <?php echo $resularchivo['fecha']; ?>
                                  </td>
                                  <!--   <th>

                                    <a target="blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                                  <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'"download="Archivo">Descargar Archivo    
                                    </a>  
                                                    </a>  

                                    </th>
                                    <th>
                                    <a target="_blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                                      <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'" >Ver Archivo o Imagen     <br>
                                    </a>  
                                                    </a> 

                                      </th> -->
                                  <td style="text-align: center;">
                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivoPaquete.php?cliente=<?php echo $clienteId; ?>&descripcion=<?php echo $descripcion; ?>">
                                      Enviar Archivos <br>
                                    </a>
                                  </td>
                                </tr>

                              <?php } ?>
                            </tbody>
                          </table>



                        </li>


                      </ul>
                    </div>
                    <!--/ tabs -->







                  </div>
                  <!-- cerra class=page -->




                </div>
              </div>
              <!--final accordion-->   
              </div>
              <!-- cierre seccion 2-->













                  <!-- inicio seccion 3 -->
                  <div role="tabpanel" class="tab-pane fade" id="ExamenesEcografias">

                    <!--inicio accordion-->
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <hr align="center" size="10" width="100%" color="#000000">
                        <h3>
                          Registros de Imágenes </h3>

                      </div>
                    </div>
                    <!--final accordion-->   
                  </div>
                  <!-- cierre seccion 3-->



                  <!-- inicio seccion 4 -->
                  <div role="tabpanel" class="tab-pane fade" id="receta">

                    <!--inicio accordion-->
                    <div class="col-md-12">
                      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <hr align="center" size="10" width="100%" color="#000000">
                        <h3>
                          Registros de Recetas </h3>




                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId group by idReceta");
                        $nrowl = mysqli_num_rows($queryList);

                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $ID                 = $row_recordset32['id'];
                          $IDR                 = $row_recordset32['idReceta'];
                          $Producto              = $row_recordset32['codigoProd'];


                          $dosis                 = $row_recordset32['dosis'];
                          $posologia                = $row_recordset32['posologia'];
                          $frecuencia                 = $row_recordset32['frecuencia'];
                          $administracion              = $row_recordset32['administracion'];
                          $dosisdia           = $row_recordset32['dosisdia'];

                          $via   = $row_recordset32['via'];
                          $id_usuario              = $row_recordset32['usuario_id'];
                          $id_cliente              = $row_recordset32['cliente_id'];
                          $total             = $row_recordset32['total'];
                          $dias             = $row_recordset32['dias'];
                          $nota            = $row_recordset32['nota'];
                          //$producto1          = $row_recordset32['producto1'];  
                          $Fecha          = $row_recordset32['fecha'];
                          $idReceta         = $row_recordset32['idReceta'];


                        ?>


                          <div class="panel box box-primary">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                  Fecha: <?php echo $Fecha . 'Receta Número:' . $IDR ?>

                                  <a title="Imprimir" href="imprimirRecetaH.php?idr=<?php echo $IDR ?>&cliente=<?php echo $clienteId ?>" title="Imprimir Receta" target="_blank"><i class="fa fa-print"></i> </a>
                                </a>
                              </h4>
                            </div>
                            <div id="<?php echo $ID ?>" class="panel-collapse collapse">
                              <div class="box-body">
                                <?php
                                $queryReceta = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId and idReceta = '$IDR'");
                                //echo "SELECT * FROM  DetalleReceta where id_cliente = $clienteId ";
                                $nrowl = mysqli_num_rows($queryReceta);

                                while ($rowMedicamento = mysqli_fetch_array($queryReceta)) {
                                  $ID                 = $rowMedicamento['id'];
                                  $IDR                 = $rowMedicamento['idReceta'];
                                  $Producto              = $rowMedicamento['codigoProd'];


                                  $dosis                 = $rowMedicamento['dosis'];
                                  $posologia                = $rowMedicamento['posologia'];
                                  $frecuencia                 = $rowMedicamento['frecuencia'];
                                  $administracion              = $rowMedicamento['administracion'];
                                  $dosisdia           = $rowMedicamento['dosisdia'];

                                  $via   = $rowMedicamento['via'];
                                  $id_usuario              = $rowMedicamento['usuario_id'];
                                  $id_cliente              = $rowMedicamento['cliente_id'];
                                  $total             = $rowMedicamento['total'];
                                  $dias             = $rowMedicamento['dias'];
                                  $nota            = $rowMedicamento['nota'];
                                  //$producto1          = $rowMedicamento['producto1'];  
                                  $Fecha          = $rowMedicamento['fecha'];
                                  $idReceta         = $rowMedicamento['idReceta'];

                                ?>


                                  <hr align="center" size="10" width="100%" color="#000000">
                                  <div align="right">
                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                  </div>

                                  <?php if (strlen($Producto) > 0 or strlen($producto1) > 0) : ?>
                                    <div>
                                      Medicamento Suministrado:
                                      <label> <strong> <?php echo $Producto ?><?php echo $producto1 ?> </strong></label>

                                    </div>
                                  <?php endif ?>


                                  <?php if (strlen($dosis) > 0) : ?>
                                    <div>
                                      Dosis:
                                      <label> <?php echo $dosis ?> <?php echo $posologia ?></label>

                                    </div>
                                  <?php endif ?>

                                  <?php if (strlen($via) > 0) : ?>
                                    <div>
                                      Vía:
                                      <label> <?php echo $via ?></label>

                                    </div>
                                  <?php endif ?>



                                <?php }  ?>



                              </div>
                            </div>
                          </div>

                        <?php }  ?>

                      </div>
                    </div>
                    <!--final accordion-->   
                  </div>
                  <!-- cierre seccion 4 -->







                </div>



              </div>

            </div>
          </div>

        </div>

        <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>