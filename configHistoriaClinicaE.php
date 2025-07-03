<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
//$idHistoria = decrypt($_GET['iCr']);
$idHistoria = $_GET['iCr'];
$line = $_GET['id'];
$ID = $_SESSION['ID'];
$tipo_historia = $_GET['tipo'];
$solicitud = 0 + $_GET['solicitud'];



$queryListhc = mysqli_query($conn3, "SELECT * from configTablasE where id = '$idHistoria'");
// $nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $nombre = $rowhc['nombre'];
    $action = $rowhc['action'];
    $method = $rowhc['method'];
    $name = $rowhc['name'];
    $boton = $rowhc['boton'];
}

$Nombre_Tabla_AutoGuardado=$nombre;



$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];
  } 
}



$queryList = mysqli_query($conn3, "SELECT * FROM  metodos where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
// $nrowl = mysqli_num_rows($queryList);

if ($queryList) {
  while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $idMetodo    = $row_recordset32['idMetodo'];
  }
}


if ($queryList == '') {
    $idM == 1;
} else {
    $idM   = ($idMetodo + 1);
}
?>
<link rel="stylesheet" href="apiVoz.css">
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $nombre ?>, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?>
        </h1>
        <ol class="breadcrumb">
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








                                        <form action="<?php echo $action ?>" method="POST" name="<?php echo  $name ?>" enctype="multipart/form-data" class="row" id="TablaCreadorHistorias">

                                            <?php
                                            $keyTable = $_GET['id'];
            if ($idHistoria == 30) {
                        if ($solicitud == 0) {
                          // solicitud
                          $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalleE where idTabla = $idHistoria and id<2159 and 1=1 and estado = 1
                      order by convert(orden, signed) asc");
                        } else {
                          // informe
                          $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalleE where idTabla = $idHistoria and id>=2159 and 1=1 and estado = 1
                      order by convert(orden, signed) asc");
                        }
                      } else {
                                            $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalleE 
                      where 1=1
                      and idTabla = $idHistoria 
                      and estado = 1
                      order by convert(orden, signed) asc
                      ");
                                        }
                                            // $nrowl = mysqli_num_rows($queryDetalle);
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
                                                $img  = $rowDetalle['img'];






                                                if ($tipoCampo == 'text') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name AS V FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        /*$val[$input_name]*/
                                                        $valor      = $rowMotorizado['V'];
                                                      }
                                                    }
                                                    

                                                    echo '<div class="' . $div_class . '">
                          <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                         <input type="' . $input_type . '" class=" ' . $input_calss . '" name="' . $input_name . '"   placeholder="' . $input_placeholder . '" id = "' . $input_name . '" ' . $input_required . '  value="' . $valor . $input_value . '" >
                     
                     
                     </div>';
                                                }


                                                if ($tipoCampo == 'number') {
                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                    }

                                                    echo '<div class="' . $div_class . '">
<div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                <input type="' . $input_type . '" class=" ' . $input_calss . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" ' . $input_required . '   value="' . $valor . $input_value . '" >
            
            </div>';
                                                }

                                                if ($tipoCampo == 'textarea') {

                                            ?>

                                                    <script type="text/javascript">
                                                        var recognition<?php echo $idCampo; ?>;
                                                        var recognizing<?php echo $idCampo; ?> = false;
                                                        if (!('webkitSpeechRecognition' in window)) {
                                                            alert("¡API no soportada!");
                                                        } else {

                                                            recognition<?php echo $idCampo; ?> = new webkitSpeechRecognition();
                                                            recognition<?php echo $idCampo; ?>.lang = "es-CO";
                                                            recognition<?php echo $idCampo; ?>.continuous = true;
                                                            recognition<?php echo $idCampo; ?>.interimResults = true;

                                                            recognition<?php echo $idCampo; ?>.onstart = function() {
                                                                recognizing<?php echo $idCampo; ?> = true;
                                                                console.log("empezando a eschucar");
                                                            }
                                                            recognition<?php echo $idCampo; ?>.onresult = function(event) {

                                                                for (var i = event.resultIndex; i < event.results.length; i++) {
                                                                    if (event.results[i].isFinal)
                                                                        document.getElementById("<?php echo $input_name; ?>")
                                                                        .value += event.results[i][0].transcript;
                                                                }

                                                                //texto
                                                            }
                                                            recognition<?php echo $idCampo; ?>.onerror = function(event) {}
                                                            recognition<?php echo $idCampo; ?>.onend = function() {
                                                                recognizing<?php echo $idCampo; ?> = false;
                                                                document.getElementById("procesar<?php echo $idCampo; ?>")
                                                                    .innerHTML =
                                                                    "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                                                                console.log("terminó de eschucar, llegó a su fin");

                                                            }

                                                        }

                                                        function procesar<?php echo $idCampo; ?>() {

                                                            if (recognizing<?php echo $idCampo; ?> == false) {
                                                                recognition<?php echo $idCampo; ?>.start();
                                                                recognizing<?php echo $idCampo; ?> = true;
                                                                document.getElementById("procesar<?php echo $idCampo; ?>")
                                                                    .innerHTML =
                                                                    "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
                                                            } else {
                                                                recognition<?php echo $idCampo; ?>.stop();
                                                                recognizing<?php echo $idCampo; ?> = false;
                                                                document.getElementById("procesar<?php echo $idCampo; ?>")
                                                                    .innerHTML =
                                                                    "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                                                            }
                                                        }
                                                    </script>
                                                    <?php


                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // // $nrowl = mysqli_num_rows($queryListhc);
                                                    if ($queryListhc) {
                                                      while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                          $table = $rowhc['name'];
                                                      }
                                                    }
                                                    

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                          $valor      = $rowMotorizado[$input_name];
                                                      }
                                                    }
                                                    

                                                    echo '<div class="' . $div_class . '">
                                <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                                                            <textarea  id="' . $input_name . '" name="' . $input_name . '"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;" >' . $valor . '</textarea>
                                                            <!--<div align="right">
                                                            <a onclick="procesar' . $idCampo . '()" id="procesar' . $idCampo . '"><i title="Iniciar Grabación" style="font-size: 2rem; margin-top:1rem;" class="fa fa-fw fa-microphone"></i></a>
                                                            </div>-->



            </div>';
                                                }







                                                if ($tipoCampo == 'select_si_no') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // // $nrowl = mysqli_num_rows($queryListhc);
                                                    if ($queryListhc) {
                                                      while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                      }
                                                    }
                                                    

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                      }
                                                    }
                                                    

                                                    echo '<style>
    div.btnR {
    display: inline-block;
    border: 2px solid #ccc;
    margin-right: 5px;
    padding: 2px 5px;
    cursor: pointer;
    }
    div.btnR.on {
        background-color: #777;
        color: white;
    }
</style>';

if ($idHistoria >= 30 || $idHistoria <= 40 and $idHistoria <> 34 and $idHistoria <> 35 and $idHistoria <> 39) {
                            echo '<div class="' . $div_class . '">
      <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>



      <select id="' . $input_name . 'Radio"  name="' . $input_name . 'Radio" class="form-control"  style="width: 100%;">

      <option value="Si"> Si </option>

      </select>
      <input type="hidden" id="' . $input_name . '" name="' . $input_name . '"  value="' . $valor . $input_value . '"">
      </div>';
                          } else {
                            echo '<div class="' . $div_class . '">
      <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>



      <select id="' . $input_name . 'Radio"  name="' . $input_name . 'Radio" class="form-control"  style="width: 100%;">
      <option value="No"> No </option>
      <option value="Si"> Si </option>

      </select>
      <input type="hidden" id="' . $input_name . '" name="' . $input_name . '"  value="' . $valor . $input_value . '"">
      </div>';
                          }

                                                    echo "<script>setTimeout(function(){ 
        var data = {};
        $('#" . $input_name . "Radio option').unwrap().each(function(e) {
        data['" . $input_name . "' + e + ''] = '';
        var btnR = $('<div id=\"" . $input_name . "' + e + '\" class=\"btnR\">'+$(this).text()+'</div>');
        //if($(this).is(':checked')) btnR.addClass('on');
        $(this).replaceWith(btnR);

        if($.trim($('#" . $input_name . "' + e + '').html()) == '" . $valor . "')
          $('#" . $input_name . "' + e + '').addClass('on');

        $(document).on('click', '#" . $input_name . "' + e + '', function() {console.log($(this));            
            data['" . $input_name . "' + e + ''] = 'on';
            for(dt in data) $('#' + dt + '').removeClass('on');
            $(this).addClass('on');
            $('#" . $input_name . "').val($(this)[0].outerText);
        });
         
        });
    }, 1000); </script>";
                                                }






                                                if ($tipoCampo == 'select') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                          $valor      = $rowMotorizado[$input_name];
                                                      }
                                                    }
                                                    

                                                    $array = explode(";;", $select_table);

                                                    $arrayCantidad = count($array);


                                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '"> ' . $div_nombre_campo . ' </div>
                 
             <select   name="' . $input_name . '" value="' . $valor . $input_value . '" class="form-control select2"  style="width: 100%;">
                            <option value="--"  selected="selected"> -- </option>';



                                                    for ($i = 0; $i < $arrayCantidad; $i++) {
                                                        echo '<option value="' . $array[$i] . '" ' . (($array[$i] == $valor) ? 'selected=selected' : '') . '> ' . $array[$i] . ' </option>';
                                                    }


                                                    echo '           </select>
            </div>';
                                                }






                                                if ($tipoCampo == 'selectmultiple') {

                                                    $valor = 0;

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                       while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                    }
                                                    }
                                                   

                                                    $data = explode("|", $valor);
                                                    $data2 = array();
                                                    foreach ($data as $k => $v)
                                                        if ($v != '')
                                                            $data2[$v] = $v;

                                                    $array = explode(";;", $select_table);
                                                    $array2 = array();
                                                    foreach ($array as $k => $v)
                                                        $array2[$v] = $v;

                                                    //$arrayCantidad = count($array);

                                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                 
             <select   name="' . $input_name . '[]" class="form-control select2"  style="width: 100%;" multiple>
                            <option value="" select> Seleccionar </option>';

                                                    foreach ($array2 as $k => $v) {
                                                        echo '<option value="' . $array2[$v] . '" ' . (($array2[$data2[$v]] != '') ? 'selected=selected' : '') . '> ' . $array2[$v] . ' </option>';
                                                    }


                                                    echo '           </select>
            </div>';
                                                }







                                                if ($tipoCampo == 'separador') {
                                                    $div = 'separador' . rand(1, 999);

                                                    echo '<div class="' . $div_class . '" align= "center"> <h4> ' . $div_nombre_campo . '</h4></div>';
                                                }

                                                if ($tipoCampo == 'moduloplegable_inicio' or $tipoCampo == 'moduloplegable_final') {
                                                    if ($tipoCampo == 'moduloplegable_inicio') {
                                                        echo $input_value . '<div class="row">';
                                                    }
                                                    if ($tipoCampo == 'moduloplegable_final') {
                                                        echo $input_value . '</div>';
                                                    }
                                                }




                                                if ($tipoCampo == 'imagen') {
                                                    $div = 'imagen' . rand(1, 999);

                                                    /*
                          echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <img src="' . $img . '"  style="' . $style . '">

            </div>';
            */
                                                    echo '<div class="' . $div_class . '">
                 <div align="center">  <img src="' . $div_nombre_campo . '"  style="' . $style . '"></div>
                

            </div>';
                                                }







                                                if ($tipoCampo == 'date') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    if ($queryListhc) {
                                                      while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                      }
                                                    }
                                                    

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                    }
                                                    }
                                                    
                                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <input class="' . $input_calss . '" type="' . $input_type . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" ' . $input_required . ' value="' . $valor . $input_value . '">

            
            </div>';
                                                }






                                                if ($tipoCampo == 'file') {

                                                    $valor = 0;

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablasE where id = $idHistoria");
                                                    // $nrowl = mysqli_num_rows($queryListhc);
                                                    if ($queryListhc) {
                                                      while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                      }
                                                    }
                                                    

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND usuario_id= $usuario_id AND id =$keyTable");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor      = $rowMotorizado[$input_name];
                                                      }
                                                    }
                                                    


                                                    if (strlen($valor) > 0) {

                                                        $file = explode("|", $valor);
                                                        $view = '';
                                                        foreach ($file as $key => $data) {
                                                            if ($key > 0) {
                                                                $borrar = "<a  href='configBorrarFile.php?clienteId=$clienteId&idHistoria=$idHistoria&Nombre_table=$input_name&Tabla=$table&id=$k&file=$key'><i title='Borrar Imagen' style='font-size: 18px;' class='fa fa-trash'> </i></a>";
                                                                $view .= $borrar . '<img src="' . $data . '" height="100">';
                                                            }
                                                        }
                                                    }
                                                }







                                                if ($tipoCampo == 'file') {

                                                    echo '<div class="' . $div_class . '">' . $view . '
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                <input class="' . $input_calss . '" type="' . $input_type . '" name="' . $input_name . '[]" placeholder="' . $input_placeholder . '" id = "' . $input_name . '[]" ' . $input_required . ' multiple="">
            
                        <div class="' . $div_class . '">
                 <div align="' . $div_align . '"></div>
            </div>
            
            </div>';
                                                }


  // diagnosticos  CONSULTA EXTERNA - ANAMNESIS
                        if ($idCampo == '1052') {
                          for ($i = 1; $i <= 4; $i++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $i . ' </label>
                <select class="form-control input-lg" name = "CIE-' . $idCampo . '[' . $i . ']" id = "CIE10-' . $idCampo . '-' . $i . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $i . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $i . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }


                        // // idcampo
                        // // diagnosticos  CONSULTA EXTERNA - ANAMNESIS
                        // if ($idCampo=='1052') {
                        //   for ($i=1; $i <= 4; $i++) {
                        //     echo'
                        //     <div class="col-md-10">
                        //     <label> Código del Diagnóstico N° '.$i.' </label>
                        //     <select class="form-control input-lg" name = "CIE-'.$idCampo.'['.$i.']" id = "CIE10-'.$idCampo.'-'.$i.'" onclick = "Buscar_CIE10_'.$idCampo.'('.$i.');" style = "width:100%"> <option value=""> Seleccione... </option>
                        //     </select>
                        //     </div>
                        //     <div class="col-md-2">
                        //     <label>PRE / DEF</label><br>
                        //     <select name="PRE_'.$idCampo.'['.$i.']" style="width:100%" class="form-control input-lg select2">
                        //     <option disabled selected>---</option>
                        //     <option>PRE</option>
                        //     <option>DEF</option>
                        //     </select>
                        //     </div>
                        //     ';                
                        //   }
                        // }

                        // 1693
                        if ($idCampo == '1693') {
                          echo '<div class="col-md-12"><h2>de ingreso</h2></div>';
                          for ($e1 = 1; $e1 <= 4; $e1++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $e1 . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $e1 . ']" id = "CIE10-' . $idCampo . '-' . $e1 . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $e1 . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $e1 . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                          echo '<div class="col-md-12"><h2>de egreso</h2></div>';
                          for ($e2 = 5; $e2 <= 8; $e2++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $e2 . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $e2 . ']" id = "CIE10-' . $idCampo . '-' . $e2 . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $e2 . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $e2 . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }


                        // 053-
                        if ($idCampo == '3084') {
                          for ($e = 1; $e <= 2; $e++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $e . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $e . ']" id = "CIE10-' . $idCampo . '-' . $e . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $e . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $e . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }

                        // 053-
                        if ($idCampo == '3109') {
                          for ($e = 1; $e <= 2; $e++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $e . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $e . ']" id = "CIE10-' . $idCampo . '-' . $e . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $e . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $e . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }

                        // diagnosticos  INTERCONSULTA
                        if ($idCampo == '1793') {
                          for ($w = 1; $w <= 4; $w++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $w . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $w . ']" id = "CIE10-' . $idCampo . '-' . $w . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $w . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $w . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }

                        // diagnosticos  INTERCONSULTA INFORME
                        if ($idCampo == '2220') {
                          echo '<div class="form-group col-md-12" align="center"> <strong>9 DIAGNOSTICOS</strong></div>';
                          for ($Z = 1; $Z <= 6; $Z++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $Z . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $Z . ']" id = "CIE10-' . $idCampo . '-' . $Z . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $Z . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $Z . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                          echo '<div class="form-group col-md-12" align="center"><BR></div>';
                        }

                        // diagnosticos  IMAGENOLOGIA INFORME
                        if ($idCampo == '2204') {
                          for ($p = 1; $p <= 5; $p++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $p . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $p . ']" id = "CIE10-' . $idCampo . '-' . $p . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $p . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $p . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                          echo '<div class="form-group col-md-12" align="center"><BR></div>';
                        }

                        // diagnosticos  EMERGENCIA PRE
                        if ($idCampo == '2011') {
                          for ($f = 1; $f <= 4; $f++) {
                            echo '
                <div class="col-md-12">
                <label> Código del Diagnóstico N° ' . $f . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $f . ']" id = "CIE10-' . $idCampo . '-' . $f . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $f . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                ';
                          }
                        }
                        // diagnosticos  EMERGENCIA DEF
                        if ($idCampo == '2021') {
                          for ($g = 1; $g <= 4; $g++) {
                            echo '
                <div class="col-md-12">
                <label> Código del Diagnóstico N° ' . $g . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $g . ']" id = "CIE10-' . $idCampo . '-' . $g . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $g . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                ';
                          }
                        }
                        // diagnosticos LABORATORIO CLINICO
                        if ($idCampo == '2139') {
                          for ($h = 1; $h <= 4; $h++) {
                            echo '
                <div class="col-md-10">
                <label> Código del Diagnóstico N° ' . $h . ' </label>
                <select  name = "CIE-' . $idCampo . '[' . $h . ']" id = "CIE10-' . $idCampo . '-' . $h . '" onclick = "Buscar_CIE10_' . $idCampo . '(' . $h . ');" style = "width:100%"> <option value=""> Seleccione... </option>
                </select>
                </div>
                <div class="col-md-2">
                <label>PRE / DEF</label><br>
                <select name="PRE_' . $idCampo . '[' . $h . ']" style="width:100%" class="form-control input-lg select2">
                <option disabled selected>---</option>
                <option>PRE</option>
                <option>DEF</option>
                </select>
                </div>
                ';
                          }
                        }



                                                // aqui los includes
                                                if ($name == 'historia_1_cirugiaplastica54165654312' && $idCampo == 549) {
                                                    echo '<div class="box-body row" style="font-size: 18px;width:100%">';
                                                    $_GET['n'] = 1;
                                                    $_GET['img'] = '';
                                                    $_GET['h'] = '450';
                                                    $_GET['w'] = '700';
                                                    $_GET['timer'] = '5000';
                                                    $_GET['escribir'] = 'si';
                                                    include 'rayado.php';
                                                    echo '</div><hr>';
                                                }



                                                //Includes para la historia de evaluación audiologica [02-08-2023]
                                                //Includes para la historia de evaluación audiologica [02-08-2023]

                                                if ($idHistoria == "34") {

                                                    $ContadorEntradas++;
                                                    if($ContadorEntradas==1){
                                                        echo " <style>
                                                        #alert-msg {
                                                          position: fixed;
                                                          top: 10px;
                                                          right: 10px;
                                                          background-color: red;
                                                          color: white;
                                                          padding: 10px;
                                                          border-radius: 5px;
                                                          display: none;
                                                        }
                                                      </style>
                                                      
                                                      <div id='alert-msg'></div>
                                                      
                                                      <script>
                                                      function showError(message) {
                                                        var alertMsg = document.getElementById('alert-msg');
                                                        alertMsg.textContent = message;
                                                        alertMsg.style.display = 'block';
                                                        alertMsg.style.zIndex ='2';
                                                        setTimeout(hideError, 5000);
                                                      }
                                                  
                                                      function hideError() {
                                                        var alertMsg = document.getElementById('alert-msg');
                                                        alertMsg.style.zIndex ='1';
                                                        alertMsg.style.display = 'none';
                                                      }

                                                      function FuncionValoresGraficas(inputid, minimo, maximo){
                                                        var inputNumero = document.getElementById(inputid);
                                                        
                                                    
                                                        inputNumero.addEventListener('input', function () {

                                                            var alertMsg = document.getElementById('alert-msg');

                                                            var inputValue = inputNumero.value;
                                                            //console.log(inputValue);
                                                            let cleanedValue = inputValue.replace(/[^0-9.-]/g, ''); // Eliminar caracteres no numéricos excepto '.' y '-'
                                                            
                                                            if (cleanedValue.startsWith('-')) {
                                                                // Eliminar todos los - excepto el primero
                                                                cleanedValue = '-' + cleanedValue.replace(/-/g, '');
                                                            } else {
                                                                cleanedValue = cleanedValue.replace(/-/g, ''); // Eliminar cualquier - en el medio del número
                                                            }                                                
                                                        

                                                            if (cleanedValue !== inputValue) {
                                                            inputNumero.value = cleanedValue;
                                                            }
                                                            //console.log(cleanedValue);
                                                            if (cleanedValue === '-') {
                                                                return; // Detiene la ejecución de la función en este punto
                                                            }

                                                            var numero = parseFloat(cleanedValue);
                                                            //console.log(numero);
                                                            if (isNaN(numero)) {
                                                                showError('Ingrese un Número Válido.');
                                                                inputNumero.value = '';
                                                            } else if (numero < minimo || numero > maximo) {
                                                                showError('Ingrese un Número Entre -20 y 120.');
                                                                inputNumero.value = '';
                                                            } else {
                                                                hideError();
                                                            }

                                                        });
                                                    }

                                                    function FuncionValoresGraficas_Logo(inputid, minimo, maximo){
                                                        var inputNumero = document.getElementById(inputid);
                                                        


                                                            var alertMsg = document.getElementById('alert-msg');

                                                            var inputValue = inputNumero.value;
                                                            //console.log(inputValue);
                                                            let cleanedValue = inputValue.replace(/[^0-9.-]/g, ''); // Eliminar caracteres no numéricos excepto '.' y '-'
                                                            
                                                            if (cleanedValue.startsWith('-')) {
                                                                // Eliminar todos los - excepto el primero
                                                                cleanedValue = '-' + cleanedValue.replace(/-/g, '');
                                                            } else {
                                                                cleanedValue = cleanedValue.replace(/-/g, ''); // Eliminar cualquier - en el medio del número
                                                            }                                                
                                                        

                                                            if (cleanedValue !== inputValue) {
                                                            inputNumero.value = cleanedValue;
                                                            }
                                                            //console.log(cleanedValue);
                                                            if (cleanedValue === '-') {
                                                                return; // Detiene la ejecución de la función en este punto
                                                            }

                                                            var numero = parseFloat(cleanedValue);
                                                            //console.log(numero);
                                                            if (isNaN(numero)) {
                                                                showError('Ingrese un Número Válido.');
                                                                inputNumero.value = '';
                                                            } else if (numero < minimo || numero > maximo) {
                                                                showError('Ingrese un Número Entre -20 y 120.');
                                                                inputNumero.value = '';
                                                            } else {
                                                                hideError();
                                                            }

                                                       
                                                    }

                                                    </script>
                                                    ";
                                                    }
                                                   

                                                    if ($idCampo == '2251') {
                                                        $NombreGrafica = "AudiometriaTonalNueva";
                                                        $Modulos_Dinamicos = ["Audiometria Tonal Nueva"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        echo "
                                                        <script>
                                                        
                                                        // Llamada a la función después de que el DOM esté listo
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            FuncionValoresGraficas('Valor{$NombreGrafica}','-20','120');
                                                        });
                                                        
                                                      </script>";
                                                    }

                                                    if ($idCampo == '2254') {
                                                        $Modulos_Dinamicos = ["Logoaudiometria_1"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                        
                                                        //si modifica aqui verificar en Modulos_Historias/HistoriaAudiologia.php y modificar
                                                        ?>

                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                agregarEventos("filas_tabla_dinamica_Funcional", "filas_tabla_dinamica_Funcional",'input');
                                                                agregarEventos("filas_tabla_dinamica_Emocional", "filas_tabla_dinamica_Emocional",'input');
                                                                agregarEventos("filas_tabla_dinamica_Catastrófica", "filas_tabla_dinamica_Catastrófica",'input');   
                                                            });
                                                            
                                                            function agregarEventos(clase, idTotal,tipo) {
                                                                var campos = document.getElementsByClassName(clase);
                                                                for (var i = 0; i < campos.length; i++) {
                                                                    campos[i].addEventListener(tipo, function() {
                                                                        limpiarCaracteresNoNumericos(this);
                                                                        sumarCampos(clase, idTotal);
                                                                    });
                                                                }
                                                            }
                                                            
                                                            function limpiarCaracteresNoNumericos(input) {
                                                                 var cleanedValue = input.value.replace(/[^0-9.-]/g, "");
                                                                    if (cleanedValue.startsWith('-')) {
                                                                    // Eliminar todos los - excepto el primero
                                                                    cleanedValue = '-' + cleanedValue.replace(/-/g, '');
                                                                    } else {
                                                                    cleanedValue = cleanedValue.replace(/-/g, ''); // Eliminar cualquier - en el medio del número
                                                                    }  
                                                                    input.value = cleanedValue;
                                                            }

                                                            function sumarCampos(clase, idTotal) {
                                                                var total = 0;
                                                                var campos = document.getElementsByClassName(clase);
                                                                for (var i = 0; i < campos.length; i++) {
                                                                    if (!isNaN(parseFloat(campos[i].value))) {
                                                                        total += parseFloat(campos[i].value);
                                                                    }
                                                                }
                                                                document.getElementById(idTotal).value = total % 1 === 0 ? total : total.toFixed(2);
                                                                if(clase!="Dinamico_SubEscala_Total"){
                                                                    sumarCampos("Dinamico_SubEscala_Total", "Dinamico_SubEscala_Total");
                                                                }
                                                                
                                                            }

                                                            //////////////////////////////////////////////////////////////////////////////////////////////////////

                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                agregarEventos("Dinamico_SubEscala_Si", "Dinamico_SubEscala_Si","input");
                                                                agregarEventos("Dinamico_SubEscala_Aveces", "Dinamico_SubEscala_Aveces","input");
                                                                agregarEventos("Dinamico_SubEscala_No", "Dinamico_SubEscala_No","input");
                                                                agregarEventos("Dinamico_SubEscala_Total", "Dinamico_SubEscala_Total",'input'); 
                                                            });

                                                        </script>

                                                        <?php
                                                        
                                                    }
                                                    if ($idCampo == '2254') {
                                                        $Modulos_Dinamicos = ["Logoaudiometria Tecnica Europea"];

                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        $Modulos_Dinamicos = ["Logoaudiometria Tecnica Americana"];
                                                        echo "<center style='width:100%'><h4 style='width:100%;text-align:center;'><b>Técnica Americana</b></h4></center> <br>";
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }
                                                    if ($idCampo == '2255') {
                                                        $Modulos_Dinamicos = ["Impedanciometria"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }




                                                    if ($idCampo == '2266') {
                                                        $NombreGrafica = "AltaFrecuencia";
                                                        $Modulos_Dinamicos = ["Alta Frecuencia"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        echo "
                                                        <script>
                                                        
                                                        // Llamada a la función después de que el DOM esté listo
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            FuncionValoresGraficas('Valor{$NombreGrafica}','-20','120');
                                                        });
                                                        
                                                      </script>";
                                                    }

                                                    if ($idCampo == '2274') {
                                                        $NombreGrafica = "AltaFrecuencia_1";
                                                        $Modulos_Dinamicos = ["Alta Frecuencia 1"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        echo "
                                                        <script>
                                                        
                                                        // Llamada a la función después de que el DOM esté listo
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            FuncionValoresGraficas('Valor{$NombreGrafica}','-20','120');
                                                        });
                                                        
                                                      </script>";
                                                    }

                                                    if ($idCampo == '2276') {
                                                        $Modulos_Dinamicos = ["Funciones"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        $NombreGrafica = "GananciaFuncional";
                                                        $Modulos_Dinamicos = ["Ganancia Funcional"];
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        echo "
                                                        <script>
                                                        
                                                        // Llamada a la función después de que el DOM esté listo
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            FuncionValoresGraficas('Valor{$NombreGrafica}','-20','120');
                                                        });
                                                        
                                                      </script>";
                                                    }



                                                    if ($idCampo == '2267') {

                                                        $Modulos_Dinamicos = ["Cuestionario Reacciones Tinnitus"];
                                                        //echo "<center><strong><b> Cuestionario Reacciones Tinnitus </b></strong></center> <br>";
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        $Modulos_Dinamicos = ["Valoracion de Tinnitus"];
                                                        echo "<center><h4><b> Valoración de Tinnitus </b></h4></center> <br>";
                                                        include "Modulos_Historias/HistoriaAudiologia.php";

                                                        $Modulos_Dinamicos = ["Incapacidad de Tinnitus"];
                                                        echo "<center><h4><b> Inventario de Incapacidad del Tinnitus </b></h4><center> <br>";
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }



                                                    if ($idCampo == '2269') {

                                                        $Modulos_Dinamicos = ["Desarrollo Conducta Auditiva"];
                                                        echo "<center><h4><b> Valoración Comportamental </b></h4></center> <br>";
                                                        include "Modulos_Historias/HistoriaAudiologia.php";
                                                    }
                                                }

                                                //Includes para la historia de evaluación audiologica [02-08-2023] [FIN]
                                                //Includes para la historia de evaluación audiologica [02-08-2023] [FIN]



                                            


                                            }
                                            //fin recorrido de los campos

                                            // Para la historia de Fisioterapia Preventiva 
                                            if ($idHistoria == "68") {

                                                //el codigo de aca es para tomar unas litas y calcular en los campos resultado e interpretacion
                                                include 'IncludesCreadorHistorias/Historia_68_Fisioterapia.php';
                                                
                                            }
                                            // Para la historia de Fisioterapia Preventiva [FIN]







                                            //Includes para la historia de Optometria [02-08-2023]
                                                //Includes para la historia de Optometria [02-08-2023]

                                                if ($idHistoria == "59") {

                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $nombre = $rowMotorizado['nombre_cliente'];
                                                        //$FechaHoy=date();
                                                        $CODI_CLIENTE= $rowMotorizado['CODI_CLIENTE'];
                                                        $direccion_cliente = $rowMotorizado['direccion_cliente'];
                                                        $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];
                                                        //$edad = "edad";
                                                        $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
                                                        // Obtener la fecha actual
                                                        $fechaActual = date("Y-m-d");

                                                        // Convertir las fechas en objetos DateTime para cálculos precisos
                                                        $fechaNacimientoObj = new DateTime($fechaNacimiento);
                                                        $fechaActualObj = new DateTime($fechaActual);

                                                        // Calcular la diferencia entre las fechas
                                                        $diferencia = $fechaNacimientoObj->diff($fechaActualObj);

                                                        // Obtener la edad
                                                        $edad = $diferencia->y;

                                                        $genero  = $rowMotorizado['genero'];
                                                        $celular_cliente  = $rowMotorizado['celular_cliente'];
                                                        $correo_cliente  = $rowMotorizado['correo_cliente'];
                                                        $ocupacion  = $rowMotorizado['ocupacion'];  

                                                        $acompananteFamiliar  = $rowMotorizado['acompananteFamiliar'];
                                                        $parentesco_acompanante  = $rowMotorizado['parentesco_acompanante'];
                                                        $telefono_acompanante  = $rowMotorizado['telefono_acompanante'];

                                                        $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
                                                    }
                                                ?>
                                                <script>
                                                // Esperar a que el DOM esté completamente cargado
                                                                var fecha_prep = new Date();
                                                                var year = fecha_prep.getFullYear();
                                                                var month = String(fecha_prep.getMonth() + 1).padStart(2, '0');
                                                                var day = String(fecha_prep.getDate()).padStart(2, '0');

                                                                var formattedDate = `${year}-${month}-${day}`;

                                                            document.addEventListener('DOMContentLoaded', function() {

                                                                setTimeout(function() {

                                                                var campos = ["x96430826061", "x45302224301", "x67597468102", "x82434979145", "x84479322157", "x31055003936", "x22585552195", "x95966854479"
                                                                , "x58160732119", "x22586384856", "x64106926734", "x61172500924", "x5667517109", "x30296204989"];

                                                                var camposRespuesta = ["<?=$nombre;?>", formattedDate, "<?=$CODI_CLIENTE;?>", "<?=$direccion_cliente;?>", "<?=$fechaNacimiento;?>", "<?=$edad;?>", "<?=$genero;?>", "<?=$celular_cliente;?>"
                                                                , "<?=$correo_cliente;?>", "<?=$ocupacion;?>", "<?=$acompananteFamiliar;?>", "<?=$parentesco_acompanante;?>", "<?=$telefono_acompanante;?>", "<?=$enfermedadesPequeno;?>"];

                                                                // Asociar valores de camposRespuesta con los nombres de campos
                                                                var valoresRespuesta = {};
                                                                for (var i = 0; i < campos.length; i++) {
                                                                    document.getElementsByName([campos[i]])[0].value =  camposRespuesta[i];
                                                                }

                                                                }, 2000);

                                                            });
                                                </script>
                                                <?php
                                                }


                                            if ($idCampo == '2630') {
                                                echo


                                                '<div class="col-md-12" align="center"> <h4>Diagnóstico CIE10 </h4></div>                                                    
  
<div class="col-md-12" align="left">
    Código Cie10<br>  </div>                                            

    <div class="" style="width:100%;"> 




<div class="row">
<div class="col-md-3">
<input type="text"  class="form-control input-lg" id="clienteId"  onChange="verlista();" placeholder="Buscar Cie10" >

<input type="hidden"  id="name1"   value="select1" >

</div>
                <div id="div-results1"  class="col-md-9">
                </div>
</div>
</div>


<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>


                                                <div class="" style="width:100%;"> 
<div class="row">
<div class="col-md-3">
<input type="text"  class="form-control input-lg" id="clienteId2"  onChange="verlista2();" placeholder="Buscar Cie10" >

<input type="hidden"  id="name2"   value="select2" >

</div>
                <div id="div-results2"  class="col-md-9">
                </div>
</div>
</div>


<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie2"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>



<div class="" style="width:100%;"> 
<div class="row">

<div class="col-md-3">
<input type="text"  class="form-control input-lg" id="clienteId3"   onChange="verlista3();" placeholder="Buscar Cie10" >

<input type="hidden"  id="name3"   value="select3" >

</div>
                <div id="div-results3"  class="col-md-9">
                </div>
</div>

</div>

<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" rows="2" class="form-control nota" name="notacie3"  id="notacie" placeholder=""> </textarea>
                                                </div>
                                                </div>';
                                            }

   // idcampo
                      
                      


                                            //////////////////se usa para la historia de fisioterapia
                                            if ($idHistoria == "66") {
                                                echo "<script>
                        function calcularIMC_fisioterapia() {
                            console.log('1');
                            m1 = document.getElementsByName('x33061700249')[0].value;
                            m2 = document.getElementsByName('x31435241185')[0].value;
                        
                            r4 = m1 / ((m2 / 100) * (m2 / 100));
                        
                            document.getElementsByName('x12698434469')[0].value = r4.toFixed(2);
                            var ComposicionCorporal4 = '';
                            if (r4.toFixed(2) < 16)
                                ComposicionCorporal4 = 'Infrapeso: Delgadez Severa';
                            else if (r4.toFixed(2) > 16 & r4.toFixed(2) < 16.99)
                                ComposicionCorporal4 = 'Infrapeso: Delgadez moderada';
                            else if (r4.toFixed(2) > 17 & r4.toFixed(2) < 18.49)
                                ComposicionCorporal4 = 'Infrapeso: Delgadez aceptable';
                            else if (r4.toFixed(2) > 18.50 & r4.toFixed(2) < 24.99)
                                ComposicionCorporal4 = 'Peso Normal';
                        
                            else if (r4.toFixed(2) > 25.00 & r4.toFixed(2) < 29.99)
                                ComposicionCorporal4 = 'Sobrepeso';
                        
                            else if (r4.toFixed(2) > 30.00 & r4.toFixed(2) < 34.99)
                                ComposicionCorporal4 = 'Obeso: Tipo I';
                        
                            else if (r4.toFixed(2) > 35.00 & r4.toFixed(2) < 40)
                                ComposicionCorporal4 = 'Obeso: Tipo II';
                        
                            else if (r4.toFixed(2) > 40.00)
                                ComposicionCorporal4 = 'Obeso: Tipo III';
                        
                            document.getElementsByName('x59715156881')[0].value = ComposicionCorporal4;
                        
                        }

                        // Asignar el evento oninput desde JavaScript
                        document.getElementsByName('x33061700249')[0].oninput = calcularIMC_fisioterapia;
                        document.getElementsByName('x31435241185')[0].oninput = calcularIMC_fisioterapia;

                        // Agregar atributo step='any' a los campos
                        document.getElementsByName('x33061700249')[0].setAttribute('step', 'any');
                        document.getElementsByName('x31435241185')[0].setAttribute('step', 'any');
                        document.getElementsByName('x12698434469')[0].setAttribute('step', 'any');

                        </script>";
                                            }


                                            ?>

                 <?php if ($idHistoria == 33) : ?>

                        <div class="col-md-12">
                          <h3 class="center text-center">9 DIAGRAMA TOPOGRÁFICO "Grafico"</h3>
                        </div>
<?php
                        echo '<div class="box-body row" style="font-size: 18px;width:100%">';
                                                    $_GET['n'] = 1;
                                                    $_GET['img'] = '';
                                                    $_GET['h'] = '450';
                                                    $_GET['w'] = '700';
                                                    $_GET['timer'] = '5000';
                                                    $_GET['escribir'] = 'si';
                                                    include 'rayado.php';
                                                    echo '</div><hr>';

                                                    ?>

                      <?php endif ?>

                                            <div class="col-md-12 center text-center">
                                                <hr>
                                                <h2>Agendar Próxima Cita</h2>
                                                <?php include 'agendaCita_Include.php'; ?>
                                                <hr>
                                            </div>



                    <?php if ($solicitud == 0) : ?>
                        <div class="col-md-12" align="left"> Ya terminé <input onclick="verificarRegistros1()" type="checkbox" value="" required></div>
                      <?php else : ?>
                        <div class="col-md-12" align="left"> Ya terminé <input onclick="verificarRegistros2()" type="checkbox" value="" required></div>
                      <?php endif ?>

                                            <input type="hidden" name="line" value="<?php echo $line; ?>">
                                            <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                                            <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                                            <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                            <input type="hidden" name="idHistoria" value="<?php echo $idHistoria ?>">
                                            <input type="hidden" name="clienteId" value="<?= $clienteId ?>">
                                            <input type="hidden" name="receta" value="<?php echo $idR ?>">
                                            <input type="hidden" name="metodo" value="<?php echo $idM ?>">
                                            <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">

                                            <!-- <div align="center">
                        <br>
                        <br>
                        <br>
                        <div class="col-sm-12">
                          <br>
                          <br>
                          <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                              <h2> <strong> <?php echo $boton ?> </strong> </h2>
                            </button></center>

                        </div>
                      </div> -->

                                            <div class="col-md-12">
                                                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="submit">Guardar</button>
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
<!--<script src="apiVoz.js"></script>-->
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>
<script type="text/javascript">
  function verificarRegistros1() {
    // esto si
    var idHistoria = <?php echo $idHistoria ?>;
    console.log(idHistoria);

    //externa 
    if (idHistoria == 30) {
      document.getElementById('xregistroc607').value = 'Si';
    }
    //epicrisis
    if (idHistoria == 31) {
      document.getElementById('xregistroe396').value = 'Si';
    }
    //interconsulta
    if (idHistoria == 32) {
      document.getElementById('xregistroi329').value = 'Si';
    }
    //emergencia
    if (idHistoria == 33) {
      document.getElementById('xregistroe605').value = 'Si';
    }
    //laboratorio
    if (idHistoria == 34) {
      document.getElementById('xregistrol523').value = 'Si';
    }
    //imagenologia
    if (idHistoria == 35) {
      document.getElementById('xregistroi376').value = 'Si';
    }
    //imagenologia informe
    if (idHistoria == 36) {
      document.getElementById('xregistroi298').value = 'Si';
    }
    //interconsulta informe
    if (idHistoria == 37) {
      document.getElementById('xregistroi168').value = 'Si';
    }
    //lab informe
    if (idHistoria == 38) {
      document.getElementById('xregistrol692').value = 'Si';
    }
  }
    </script>


<script>
  // CONSULTA EXTERNA - ANAMNESIS
  function Buscar_CIE10_1052(Valor) {
    $("#CIE10-1052-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_1693(Valor) {
    $("#CIE10-1693-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_1793(Valor) {
    $("#CIE10-1793-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_3109(Valor) {
    $("#CIE10-3109-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_3084(Valor) {
    $("#CIE10-3084-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_2011(Valor) {
    $("#CIE10-2011-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_2021(Valor) {
    $("#CIE10-2021-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_2139(Valor) {
    $("#CIE10-2139-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_2220(Valor) {
    $("#CIE10-2220-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };

  function Buscar_CIE10_2204(Valor) {
    $("#CIE10-2204-" + Valor).select2({
      allowClear: true,
      ajax: {
        url: "IR_Ajax_CIE10.php",
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
  };
  window.onload = function() {
    console.log('ready');
    Buscar_CIE10_3109('1');
    Buscar_CIE10_3109('2');

    Buscar_CIE10_3084('1');
    Buscar_CIE10_3084('2');


    Buscar_CIE10_1052('1');
    Buscar_CIE10_1052('2');
    Buscar_CIE10_1052('3');
    Buscar_CIE10_1052('4');

    Buscar_CIE10_1693('1');
    Buscar_CIE10_1693('2');
    Buscar_CIE10_1693('3');
    Buscar_CIE10_1693('4');
    Buscar_CIE10_1693('5');
    Buscar_CIE10_1693('6');
    Buscar_CIE10_1693('7');
    Buscar_CIE10_1693('8');

    Buscar_CIE10_1793('1');
    Buscar_CIE10_1793('2');
    Buscar_CIE10_1793('3');
    Buscar_CIE10_1793('4');

    Buscar_CIE10_2011('1');
    Buscar_CIE10_2011('2');
    Buscar_CIE10_2011('3');
    Buscar_CIE10_2011('4');

    Buscar_CIE10_2021('1');
    Buscar_CIE10_2021('2');
    Buscar_CIE10_2021('3');
    Buscar_CIE10_2021('4');

    Buscar_CIE10_2139('1');
    Buscar_CIE10_2139('2');
    Buscar_CIE10_2139('3');
    Buscar_CIE10_2139('4');

    Buscar_CIE10_2220('1');
    Buscar_CIE10_2220('2');
    Buscar_CIE10_2220('3');
    Buscar_CIE10_2220('4');
    Buscar_CIE10_2220('5');
    Buscar_CIE10_2220('6');

    Buscar_CIE10_2204('1');
    Buscar_CIE10_2204('2');
    Buscar_CIE10_2204('3');
    Buscar_CIE10_2204('4');
    Buscar_CIE10_2204('5');
  }


</script>

?>