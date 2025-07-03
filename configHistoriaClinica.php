<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
$idHistoria = decrypt($_GET['iCr']);

$line = $_GET['id'];
$ID = $_SESSION['ID'];
$tipo_historia = $_GET['tipo'];


//echo "<script>alert(".$idHistoria.")</script>";



$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = '$idHistoria'");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $nombre = $rowhc['nombre'];
    $action = $rowhc['action'];
    $method = $rowhc['method'];
    $name = $rowhc['name'];
    $boton = $rowhc['boton'];
}

$Nombre_Tabla_AutoGuardado = $nombre;



$queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  metodos where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
$nrowl = mysqli_num_rows($queryList);

while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $idMetodo = $row_recordset32['idMetodo'];
}

if ($queryList == '') {
    $idM == 1;
} else {
    $idM = ($idMetodo + 1);
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
                                                    <a data-toggle="collapse" data-parent="#accordion1"
                                                        href="#collapseOne">
                                                        Datos Personales
                                                    </a>
                                                </h4>
                                            </div>



                                            <div id="collapseOne" class="panel-collapse collapse">

                                                <?php echo datosPacientes($clienteId); ?>

                                            </div>
                                        </div>

                                        <form action="<?php echo $action ?>" method="POST" name="<?php echo $name ?>"
                                            enctype="multipart/form-data" class="row" id="TablaCreadorHistorias">
                                            <div class="box-body">

                                        <!-- cambiar el estilo del menu desplegable id=accordion , class=panel panel-default, class=panel-heading class=panel-title-->
                                        <div class="box-group" id="accordion1">
                                            <div class="row">

                                            <?php
                                            $keyTable = (isset($_GET['id'])) ? $_GET['id'] : "0";

                                            $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle
                                            where 1=1
                                            and idTabla = $idHistoria
                                            and estado = 1
                                            order by convert(orden, signed) asc
                                            ");
                                            $nrowl = mysqli_num_rows($queryDetalle);
                                            while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                                $idCampo = $rowDetalle['id'];
                                                $div_class = $rowDetalle['div_class'];
                                                $div_align = $rowDetalle['div_align'];
                                                $div_nombre_campo = $rowDetalle['div_nombre_campo'];
                                                $input_type = $rowDetalle['input_type'];
                                                $input_calss = $rowDetalle['input_calss'];
                                                $input_name = $rowDetalle['input_name'];
                                                $input_placeholder = $rowDetalle['input_placeholder'];
                                                $input_id = $rowDetalle['input_id'];
                                                $input_required = $rowDetalle['input_required'];
                                                $input_pattern = $rowDetalle['input_pattern'];
                                                $input_onChange = $rowDetalle['input_onChange'];
                                                $select_table = $rowDetalle['select_table'];
                                                $style = $rowDetalle['style'];
                                                $tipoCampo = $rowDetalle['tipoCampo'];
                                                $input_maxlength = $rowDetalle['input_maxlength'];
                                                $input_oninput = $rowDetalle['input_oninput'];
                                                $div_nombre_valor = $rowDetalle['div_nombre_valor'];
                                                $input_value = $rowDetalle['input_value'];
                                                $img = $rowDetalle['img'];






                                                if ($tipoCampo == 'text') {

                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    // $queryList = mysqli_query($conn3, "SELECT $input_name AS V FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $queryList = mysqli_query($conn3, "SELECT $input_name AS V FROM  $table WHERE cliente_id = $clienteId AND (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    //echo "SELECT $input_name AS V FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable";

                                                    //$nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        /*$val[$input_name]*/
                                                        $valor = $rowMotorizado['V'];
                                                    }

                                                    echo '<div class="' . $div_class . '">
                          <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                         <input type="' . $input_type . '" class=" ' . $input_calss . '" name="' . $input_name . '"   placeholder="' . $input_placeholder . '" id = "' . $input_name . '" ' . $input_required . '  value="' . $valor . $input_value . '" >
                     
                     
                     </div>';
                                                }


                                                if ($tipoCampo == 'number') {
                                                    $table = '';
                                                    $valor = '';
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);

                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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

                                                            recognition<?php echo $idCampo; ?>.onstart = function () {
                                                                recognizing<?php echo $idCampo; ?> = true;
                                                                console.log("empezando a eschucar");
                                                            }
                                                            recognition<?php echo $idCampo; ?>.onresult = function (event) {

                                                                for (var i = event.resultIndex; i < event.results.length; i++) {
                                                                    if (event.results[i].isFinal)
                                                                        document.getElementById("<?php echo $input_name; ?>")
                                                                            .value += event.results[i][0].transcript;
                                                                }

                                                                //texto
                                                            }
                                                            recognition<?php echo $idCampo; ?>.onerror = function (event) { }
                                                            recognition<?php echo $idCampo; ?>.onend = function () {
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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                
 

             <select id="' . $input_name . 'Radio"  name="' . $input_name . 'Radio" class="form-control"  style="width: 100%;">
                            <option value="No"> No </option>
                            <option value="Si"> Si </option>
                            
                        </select>
                        <input type="hidden" id="' . $input_name . '" name="' . $input_name . '"  value="' . $valor . $input_value . '" class="Botones_Creador_Historia"><!-- no quitar esta clase ya que se usa para el autoguardado -->
            </div>';

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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    $queryListhc = mysqli_query($conn3, "SELECT name FROM configTablas where id = $idHistoria");
                                                    $nrowl = mysqli_num_rows($queryListhc);
                                                    while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                                        $table = $rowhc['name'];
                                                    }

                                                    $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $table WHERE cliente_id = $clienteId AND (usuario_id= '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND id =$keyTable");
                                                    $nrowl = mysqli_num_rows($queryList);
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                        $valor = $rowMotorizado[$input_name];
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
                                                    if ($ContadorEntradas == 1) {
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
                                                            document.addEventListener("DOMContentLoaded", function () {
                                                                agregarEventos("filas_tabla_dinamica_Funcional", "filas_tabla_dinamica_Funcional", 'input');
                                                                agregarEventos("filas_tabla_dinamica_Emocional", "filas_tabla_dinamica_Emocional", 'input');
                                                                agregarEventos("filas_tabla_dinamica_Catastrófica", "filas_tabla_dinamica_Catastrófica", 'input');
                                                            });

                                                            function agregarEventos(clase, idTotal, tipo) {
                                                                var campos = document.getElementsByClassName(clase);
                                                                for (var i = 0; i < campos.length; i++) {
                                                                    campos[i].addEventListener(tipo, function () {
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
                                                                if (clase != "Dinamico_SubEscala_Total") {
                                                                    sumarCampos("Dinamico_SubEscala_Total", "Dinamico_SubEscala_Total");
                                                                }

                                                            }

                                                            //////////////////////////////////////////////////////////////////////////////////////////////////////

                                                            document.addEventListener("DOMContentLoaded", function () {
                                                                agregarEventos("Dinamico_SubEscala_Si", "Dinamico_SubEscala_Si", "input");
                                                                agregarEventos("Dinamico_SubEscala_Aveces", "Dinamico_SubEscala_Aveces", "input");
                                                                agregarEventos("Dinamico_SubEscala_No", "Dinamico_SubEscala_No", "input");
                                                                agregarEventos("Dinamico_SubEscala_Total", "Dinamico_SubEscala_Total", 'input');
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

                                                //Includes para la historia de Podología [27-10-2023] [INICIO]
                                                //Includes para la historia de Podología [27-10-2023] [INICIO]

                                                if ($idHistoria == "78") {

                                                    if ($idCampo == '2991') {
                                                        $Modulos_Podologia = ["Tipo de Pie"];
                                                        include "Modulos_Historias/HistoriaPodologia.php";
                                                    }

                                                    if ($idCampo == '2993') {
                                                        $Modulos_Podologia = ["Tipo de Planta de Pie"];
                                                        include "Modulos_Historias/HistoriaPodologia.php";
                                                    }
                                                }



                                                // Para la historia de Ficha Medica Preocupacioanl 
                                                if ($idHistoria == "74" and $idCampo == '2701') {

                                                    //agregar unas funciones especiales con botones para agregar campos
                                                    $TipoAccion_Preocupacional_74 = "HabitosToxicos";
                                                    include 'IncludesCreadorHistorias/Historia_74_PreOcupacional.php';

                                                }

                                                if ($idHistoria == "74" and $idCampo == '2774') {

                                                    //agregar unas funciones especiales con botones para agregar campos
                                                    $TipoAccion_Preocupacional_74 = "EstiloVida";
                                                    include 'IncludesCreadorHistorias/Historia_74_PreOcupacional.php';

                                                }

                                                if ($idHistoria == "74" and $idCampo == '2702') {

                                                    //agregar unas funciones especiales con botones para agregar campos
                                                    $TipoAccion_Preocupacional_74 = "AntecedentesTrabajo";
                                                    include 'IncludesCreadorHistorias/Historia_74_PreOcupacional.php';

                                                }

                                                if ($idHistoria == "74" and $idCampo == '2775') {

                                                    //agregar unas funciones especiales con botones para agregar campos
                                                    $TipoAccion_Preocupacional_74 = "FactoresRiesgos";
                                                    include 'IncludesCreadorHistorias/Historia_74_PreOcupacional.php';

                                                }

                                                // Para la historia de Ficha Medica Preocupacioanl [FIN]









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
                                                    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
                                                    $direccion_cliente = $rowMotorizado['direccion_cliente'];
                                                    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
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

                                                    $genero = $rowMotorizado['genero'];
                                                    $celular_cliente = $rowMotorizado['celular_cliente'];
                                                    $correo_cliente = $rowMotorizado['correo_cliente'];
                                                    $ocupacion = $rowMotorizado['ocupacion'];

                                                    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
                                                    $parentesco_acompanante = $rowMotorizado['parentesco_acompanante'];
                                                    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];

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

                                                    document.addEventListener('DOMContentLoaded', function () {

                                                        setTimeout(function () {

                                                            var campos = ["x96430826061", "x45302224301", "x67597468102", "x82434979145", "x84479322157", "x31055003936", "x22585552195", "x95966854479"
                                                                , "x58160732119", "x22586384856", "x64106926734", "x61172500924", "x5667517109", "x30296204989"];

                                                            var camposRespuesta = ["<?= $nombre; ?>", formattedDate, "<?= $CODI_CLIENTE; ?>", "<?= $direccion_cliente; ?>", "<?= $fechaNacimiento; ?>", "<?= $edad; ?>", "<?= $genero; ?>", "<?= $celular_cliente; ?>"
                                                                , "<?= $correo_cliente; ?>", "<?= $ocupacion; ?>", "<?= $acompananteFamiliar; ?>", "<?= $parentesco_acompanante; ?>", "<?= $telefono_acompanante; ?>", "<?= $enfermedadesPequeno; ?>"];

                                                            // Asociar valores de camposRespuesta con los nombres de campos
                                                            var valoresRespuesta = {};
                                                            for (var i = 0; i < campos.length; i++) {
                                                                document.getElementsByName([campos[i]])[0].value = camposRespuesta[i];
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
                                            <?php


                                            if ($idHistoria == "78") {

                                            } else {
                                                echo '<div class="col-md-12 center text-center">';
                                                echo '<hr>';
                                                echo '<h2>Agendar Próxima Cita</h2>';
                                                include 'agendaCita_Include.php';
                                                echo '<hr>';
                                                echo '</div>';
                                            }
                                            ?>






                                            <div class="col-md-12" align="left">
                                                <br>
                                                Ya terminé <input type="checkbox" value="" required>
                                            </div>

                                            <input type="hidden" name="line" value="<?php echo $line; ?>">
                                            <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                                            <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                                            <input type="hidden" name="telefono"
                                                value="<?php echo $telefono_cliente; ?>">
                                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                            <input type="hidden" name="idHistoria" value="<?php echo $idHistoria ?>">
                                            <input type="hidden" name="clienteId" value="<?= $clienteId ?>">
                                            <input type="hidden" name="receta" value="<?php echo $idR ?>">
                                            <input type="hidden" name="metodo" value="<?php echo $idM ?>">
                                            <input type="hidden" name="NOMBRE_USUARIO"
                                                value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">

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
                                                <button
                                                    class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                                    type="submit">Guardar</button>
                                            </div>

                                            <input type="hidden" name="tipo_cliente" valur="1">
                                    </div>

                                </div>
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


<?php include ("footer.php") ?>
<!--<script src="apiVoz.js"></script>-->
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php'; ?>
<script type="text/javascript">
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
            success: function (response) {
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
            success: function (response) {
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
            success: function (response) {
                $('#div-results3').html(response);

            }
        });
    };




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




    function calcularvalor() {



        m1 = document.getElementById("x402").value;
        m2 = document.getElementById("x652").value;
        m3 = document.getElementById("x119").value;


        v1 = parseFloat(m1) + parseFloat(m2) + parseFloat(m3);
        v2 = v1 - 200;
        r = v2 / 10;





        document.getElementById("x677").value = r.toFixed(2);


        if (r.toFixed(2) <= 0)

            ComposicionCorporal = 'Excelente! Deportista de Élite';
        else if (r.toFixed(2) >= 0.1 & r.toFixed(2) <= 5)

            ComposicionCorporal = 'Muy bueno';
        else if (r.toFixed(2) >= 5.1 & r.toFixed(2) <= 10)

            ComposicionCorporal = 'Bueno';
        else if (r.toFixed(2) >= 10.1 & r.toFixed(2) <= 15)

            ComposicionCorporal = 'Insuficiente';

        else if (r.toFixed(2) >= 15.0 & r.toFixed(2) <= 20)

            ComposicionCorporal = 'Malo';


        else if (r.toFixed(2) > 20)

            ComposicionCorporal = 'Sin respuesta';



        document.getElementById("respuestatest").value = ComposicionCorporal;
    }



    function calculartest() {



        m1 = document.getElementById("1").value;
        m2 = document.getElementById("2").value;
        m3 = document.getElementById("3").value;
        m4 = document.getElementById("4").value;
        m5 = document.getElementById("5").value;
        m6 = document.getElementById("6").value;
        m7 = document.getElementById("7").value;
        m8 = document.getElementById("8").value;
        m9 = document.getElementById("9").value;
        m10 = document.getElementById("10").value;
        m11 = document.getElementById("11").value;
        m12 = document.getElementById("12").value;
        m13 = document.getElementById("13").value;
        m14 = document.getElementById("14").value;


        r = parseFloat(m1) + parseFloat(m2) + parseFloat(m3) + parseFloat(m4) + parseFloat(m5) + parseFloat(m6) +
            parseFloat(m7) + parseFloat(m8) + parseFloat(m9) + parseFloat(m10) + parseFloat(m11) + parseFloat(m12) +
            parseFloat(m13) + parseFloat(m14);






        document.getElementById("respuestatest1").value = r.toFixed(2);


        if (r.toFixed(2) < 6)

            ComposicionCorporal = 'Ausencia';
        else if (r.toFixed(2) >= 6 & r.toFixed(2) <= 14)

            ComposicionCorporal = 'Leve';
        else if (r.toFixed(2) >= 15 & r.toFixed(2) <= 25)

            ComposicionCorporal = 'Moderado';
        else if (r.toFixed(2) >= 26 & r.toFixed(2) <= 39)

            ComposicionCorporal = 'Alto';

        else if (r.toFixed(2) >= 40)

            ComposicionCorporal = 'Muy Alto';





        document.getElementById("respuestatestx").value = ComposicionCorporal;
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
        var nota = $("#nota").val();
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
                nota: nota
            },
            success: function (response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#dosisdia').val('');
                $('#dias').val('');
                $('#via').val('');
                $('#total').val('');
                $('#nota').val('');

                $('#codigoProd').val('');
                $('#codigoProd1').val('');
                $('#nota').val('');

                $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };



    /* document.getElementById("detalleRecetario").reset(); */


    // function listaItem() {
    //     // estas son las variables que enviamos
    //     var usuario_id = $("#usuario_id").val();
    //     // aqui enviamos el mensaje por medio de un arreglo     
    //     $.ajax({
    //         type: "POST",
    //         url: "listaItem.php",
    //         data: {
    //             usuario_id: usuario_id
    //         },
    //         success: function(response) {
    //             $('#div-results').html(response);
    //             // aqui enviamos el mensaje por medio de un arreglo     

    //         }
    //     });
    // };
    // window.onload = listaItem;



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
        } catch (e) { }
    }

    function calcularEdadCorregida() {
        try {
            var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
            var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
            document.formularioActualizarcliente.edadCorregida.value = b - a;
        } catch (e) { }
    }





    function agergarMetodo() {
        // estas son las variables que enviamos
        var metodo = $("#metodo").val();

        var usado = $("#usado").val();
        var salud = $("#salud").val();
        var economica = $("#economica").val();
        var estilo = $("#estilo").val();
        var elegible = $("#elegible").val();
        var observacion = $("#observacion").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idMetodo = $("#idMetodo").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarMetodo.php",
            data: {
                metodo: metodo,
                usado: usado,
                salud: salud,
                economica: economica,
                estilo: estilo,
                elegible: elegible,
                observacion: observacion,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idMetodo: idMetodo
            },
            success: function (response) {

                $('#metodo').val('');
                $('#usado').val('');
                $('#salud').val('');
                $('#economica').val('');
                $('#estilo').val('');
                $('#elegible').val('');
                $('#observacion').val('');


                $('#div-results1').html(response);

                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };
</script>
<script>
    <?php
    // solo aplica para la historia de Historia Optometria
    if ($idHistoria == '59') {
        ?>
        $(document).ready(function () {
            // Obtener todos los campos de entrada, áreas de texto y campos de número del formulario
            const campos = $('#TablaCreadorHistorias input[type="text"], #TablaCreadorHistorias textarea, #TablaCreadorHistorias input[type="number"]');
            //campos.val(0);

            console.log("entro optometria");

            campos.each(function () {
                const id = $(this).attr('id');
                if (id !== 'nombre' && id !== 'doctor' && id !== 'celular') {
                    $(this).val(0);
                }
            });


        });

        <?php
    }
    ?>
</script>
<script>
    // no quitar para evitar problemas de que guarde con este caracter " ' "
    $(document).on('input', 'input[type="text"], textarea', function () {
        $(this).val($(this).val().replace(/[']/g, ''));
    });
</script>


<script>
    <?php
    // solo aplica para la historia de Historia gastroenterologia
    if ($idHistoria == '5') {
        ?>
        // calcul oimc para histroia de gastroenterologia
        let peso = document.getElementById('xpeso147');
        let talla = document.getElementById('xtalla546');
        // on input de peso y talla
        peso.oninput = function () {
            calcularimcGastro();
        }
        talla.oninput = function () {
            calcularimcGastro();
        }

        function calcularimcGastro() {

            m1 = document.getElementById("xpeso147").value;
            m2 = document.getElementById("xtalla546").value;

            if (m1 === "" || m2 === "") {
                return; // No realiza cálculos ni muestra nada en ximc619
            }

            var r = m1 / ((m2 / 100) * (m2 / 100));

            //document.getElementById("ximc619").value = r.toFixed(2);
            if (isNaN(r) || !isFinite(r)) {
                document.getElementById("ximc619").value = "0"; // Mostrar espacio en blanco
            } else {
                document.getElementById("ximc619").value = r.toFixed(2);
            }

        }
        <?php
    }
    ?>
</script>


<script src="plugins/LottieK/lottie.min.js"></script>
<?php

$usuariod_id_autoguardado = $_SESSION["ID"];

$cliente_id_autoguardado = decrypt($_GET['cI']);
if (
    $idHistoria == "63" || $idHistoria == "68" || $idHistoria == "70" || $idHistoria == "66" || $idHistoria == "20" || $idHistoria == "59"
    || $idHistoria == "22" || $idHistoria == "7" || $idHistoria == "50" || $idHistoria == "55" || $idHistoria == "45" || $idHistoria == "46"
    || $idHistoria == "47" || $idHistoria == "51" || $idHistoria == "52" || $idHistoria == "54" || $idHistoria == "5"
    || $idHistoria == "78"
) {


    $Nombre_Tabla_autoguardado = $Nombre_Tabla_AutoGuardado;//nombre de la tabla de la base de datos de la historia


    $cl_Normal = decrypt($_GET['cI']);//codificada
    $iCr_Normal = decrypt($_GET['iCr']);//codificada
    $tipo_Normal = ($_GET['tipo']);//esta viene sin codificar

    $RutaFinal_SoloCreadorHistorias = $_SERVER['REDIRECT_URL'] . "?cl=$cl_Normal&iCr=$iCr_Normal&tipo=$tipo_Normal";

    include 'AutoGuardados/CreadorHistorias/AutoGuardado_Historia_Generico.php';//usar esta si es necesario modificar el codigo del autoguardado
    //include 'AutoGuardado_Historia.php';//usar esta si no tienen que modificar el archivo y la ruta no tiene el get codificado

}

if ($idHistoria == "51") { ?>
    <!-- <script>
        //x83238713857
        // Seleccionar el elemento por su nombre
        function cargarCIE_10(selectIncluir) {
            console.log("El select es...");
            var select = document.getElementsByName(selectIncluir)[0];
            console.log(select);

            $.ajax({
                url: "Ajax_CIE10_Select.php", // Reemplaza esto con la URL de tu servidor
                type: "POST",
                success: function (response) {
                    // console.log("Solicitud exitosa:", response);
                    $(select).html(response); // Utiliza el método de jQuery para establecer el contenido HTML
                },
                error: function (error) {
                    console.error("Error en la soresponselicitud:", error);
                    // Manejar errores si es necesario
                }
            });

            console.log("El select es...");
            console.log(select);
        }



        setTimeout(() => {
            cargarCIE_10('x83238713857');
        }, 1000);


    </script> -->


<?php }
/*
if($idHistoria=="66"){

    $Nombre_Tabla_autoguardado = $Nombre_Tabla_AutoGuardado;//nombre de la tabla de la base de datos de la historia

    $cl_Normal=decrypt($_GET['cl']);//codificada
    $iCr_Normal=decrypt($_GET['iCr']);//codificada
    $tipo_Normal=decrypt($_GET['tipo']);//esta viene sin codificar

    $RutaFinal_SoloCreadorHistorias = $_SERVER['REDIRECT_URL']."?cl=$cl_Normal&iCr=$iCr_Normal&tipo=$tipo_Normal";

    include 'AutoGuardados/CreadorHistorias/AutoGuardado_Historia_Generico.php';//usar esta si es necesario modificar el codigo del autoguardado
    //include 'AutoGuardado_Historia.php';//usar esta si no tienen que modificar el archivo y la ruta no tiene el get codificado



}
*/

?>

<?php $rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
if ($rips_activo != 1 && $idHistoria <> '82') : ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#TablaCreadorHistorias").submit(function(e) {
        e.preventDefault();
        if ($(`#CIE10-Principal`).val().trim() != '') {
          $(this).off().submit()
        } else {
        // alert(
        //     "No es posible continuar, el campo 'CÓDIGO DEL DIAGNÓSTICO PRINCIPAL' no se ha seleccionado."
        //   );
          $(`a[href='#collapseRIPS']`).click();
        };
      });
    });
  </script>
  <?php
$rips_activo = funcionMaster($_SESSION["ID"], 'ID_Usuario', 'rips', 'config');
include 'IR_ModalRips.php';
?>
<?php endif; ?>

