<?php
include 'header.php';
include 'menu.php';
?>

<style>
  div.btn {
    display: inline-block;
    border: 2px solid #ccc;
    margin-right: 5px;
    padding: 2px 5px;
    cursor: pointer;
  }

  div.btn.on {
    background-color: #777;
    color: white;
  }
</style>

<script type="text/javascript">
  function mostrar(id) {
    for (var i = 0; i <= 50; i++) {
      $("#servicio" + [i]).hide();
    }
    $("#" + id).show();
  }



  // function mostrar(id) {
  //   if (id == "servicio1") {


  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();
  //  }

  //  if (id == "servicio2") {
  //    $("#servicio1").hide();
  //    $("#servicio2").show();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();


  //  }

  //  if (id == "servicio3") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").show();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }

  //  if (id == "servicio4") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").show();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //    $('#interpretRadio option').unwrap().each(function(e) {
  //        var btn = $('<div class="btn">'+$(this).text()+'</div>');
  //        if($(this).is(':checked')) btn.addClass('off');
  //        $(this).replaceWith(btn);
  //    });

  //    $(document).on('click', '.btn', function() {
  //        $('.btn').removeClass('on');
  //        $(this).addClass('on');
  //    });

  //  }
  //   if (id == "servicio5") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").show();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  //  if (id == "servicio6") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").show();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  //  if (id == "servicio7") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").show();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  //  if (id == "servicio8") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").show();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio9") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").show();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio10") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").show();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio11") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").show();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio12") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").show();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio13") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").show();
  //    $("#servicio14").hide();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio14") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").show();
  //    $("#servicio15").hide();

  //  }
  // if (id == "servicio15") {
  //    $("#servicio1").hide();
  //    $("#servicio2").hide();
  //    $("#servicio3").hide();
  //    $("#servicio4").hide();
  //    $("#servicio5").hide();
  //    $("#servicio6").hide();
  //    $("#servicio7").hide();
  //    $("#servicio8").hide();
  //    $("#servicio9").hide();
  //    $("#servicio10").hide();
  //    $("#servicio11").hide();
  //    $("#servicio12").hide();
  //    $("#servicio13").hide();
  //    $("#servicio14").hide();
  //    $("#servicio15").show();

  //  }


  // }
</script>


<?php
$Nombre_table = $_GET['Nombre_table'];
$Tabla = $_GET['Tabla'];


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  configTablas where id = $Tabla");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $titulo = $rowMotorizado['titulo'];
  $name = $rowMotorizado['name'];
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo $titulo ?></h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#"><?php echo $titulo ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12" align="center">

              <h1> <?php echo $titulo ?> </h1>
            </div>





            <br>

            <div class="col-md-12">
              <hr>

              <div class="col-md-12">
                <h4 class="card-title">-</h4>
              </div>



              <div class="panel box box-danger">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#datos1">
                      Datos del paciente
                    </a>
                  </h4>
                </div>
                <div id="datos1" class="panel-collapse collapse">
                  <div class="box-body">

                    Datos del paciente



                  </div>
                </div>
              </div>


              <?php



              $query2 = mysqli_query($conn3, "SELECT count(id) as cuantosregistros FROM  $name");
              $nrowl = mysqli_num_rows($query2);
              while ($rowCuantios = mysqli_fetch_array($query2)) {

                $cuantosregistros  = $rowCuantios['cuantosregistros'];
              }



              $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $Tabla order by id asc");
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
                $img  = $rowDetalle['img'];



                $borrar = "<a  href='configBorrarCampo.php?Nombre_table=$name&Tabla=$Tabla&campo=$input_name'><i title='Borrar Campo' style='font-size: 18px;' class='fa fa-trash'> </i></a>";



                if ($tipoCampo == 'text') {





                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <input type="' . $input_type . '" class="' . $div_class . ' ' . $input_calss . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" maxlength="' . $input_maxlength . '" ' . $input_required . '>

            </div>'; //style="width: '.$input_maxlength.'em;"
                }

                if ($tipoCampo == 'number') {


                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <input type="' . $input_type . '" class="' . $div_class . ' ' . $input_calss . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" maxlength="' . $input_maxlength . '" ' . $input_required . '>
        
            
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
                            document.getElementById("<?php echo $input_name; ?>").value += event.results[i][0].transcript;
                        }

                        //texto
                      }
                      recognition<?php echo $idCampo; ?>.onerror = function(event) {}
                      recognition<?php echo $idCampo; ?>.onend = function() {
                        recognizing<?php echo $idCampo; ?> = false;
                        document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                        console.log("terminó de eschucar, llegó a su fin");

                      }

                    }

                    function procesar<?php echo $idCampo; ?>() {

                      if (recognizing<?php echo $idCampo; ?> == false) {
                        recognition<?php echo $idCampo; ?>.start();
                        recognizing<?php echo $idCampo; ?> = true;
                        document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
                      } else {
                        recognition<?php echo $idCampo; ?>.stop();
                        recognizing<?php echo $idCampo; ?> = false;
                        document.getElementById("procesar<?php echo $idCampo; ?>").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                      }
                    }
                  </script>
              <?php



                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>


                                                            <div align="right">
                                                            <a onclick="procesar' . $idCampo . '()" id="procesar' . $idCampo . '"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
                                                            </div>

                                                            <textarea  id="' . $input_name . '" name="' . $input_name . '"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

            </div>';
                }







                if ($tipoCampo == 'select_si_no') {

                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                
 

             <select   name="' . $input_name . '" class="form-control select2"  style="width: 100%;">
                            <option value="" select> Seleccionar </option>
                            <option value="No"> No </option>
                            <option value="Si"> si </option>
                            
                        </select>

                    

            </div>';
                }


                if ($tipoCampo == 'linea') {

                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <hr>


                    

            </div>';
                }




                if ($tipoCampo == 'select') {



                  $array = explode(";;", $select_table);

                  $arrayCantidad = count($array);

                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                
 

             <select   name="' . $input_name . '" class="form-control select2"  style="width: 100%;">
                            <option value="" select> Seleccionar </option>';


                  for ($i = 0; $i < $arrayCantidad; $i++) {
                    echo '<option value="' . $array[$i] . '"> ' . $array[$i] . ' </option>';
                  }


                  echo '           </select>

                       
            
            </div>';
                }







                if ($tipoCampo == 'selectmultiple') {



                  $array = explode(";;", $select_table);

                  $arrayCantidad = count($array);
                  //class="form-control select2"
                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                
 

             <select   name="' . $input_name . '"  class="form-control select2"  style="width: 100%;" multiple>
                            <option value="" select> Seleccionar </option>';


                  for ($i = 0; $i < $arrayCantidad; $i++) {
                    echo '<option value="' . $array[$i] . '"> ' . $array[$i] . ' </option>';
                  }


                  echo '           </select>

                       
            
            </div>';
                }







                if ($tipoCampo == 'separador') {
                  $div = 'separador' . rand(1, 999);


                  echo '<div class="' . $div_class . '" align= "center"> <strong> ' . $div_nombre_campo . ' ' . $borrar . '</strong>

                                                           </div>';
                }







                if ($tipoCampo == 'imagen') {




                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <img src="' . $img . '" style="' . $style . '">

            </div>';
                }







                if ($tipoCampo == 'date') {

                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $borrar . '</div>
                <input type="' . $input_type . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" ' . $input_required . '>

            
            </div>';
                }







                if ($tipoCampo == 'file') {

                  echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' </div>
                <input type="' . $input_type . '" name="' . $input_name . '" placeholder="' . $input_placeholder . '" id = "' . $input_id . '" ' . $input_required . ' multiple="multiple">
            
                        <div class="' . $div_class . '">
                 <div align="' . $div_align . '">' . $borrar . ' </div>
            </div>
            
            </div>';
                }

                if ($tipoCampo == 'moduloplegable_inicio') {
                  echo $input_value;
                  $plegable = "1";
                }

                if ($tipoCampo == 'moduloplegable_final') {
                  echo $input_value;
                  $plegable = "1";
                }
              }
              if ($plegable = "1") {
                echo "</div>

                      </div>
                    </div>
                    <!--cierre de lista-->";
              }



              ?>

              <br>

            </div>
            <div class="col-md-12" align="center">

              <font color="red">
                <strong> -------------------------------------------------------------------------------------------------------------------------------------------- </strong> <br>
                <strong> Fin de Formulario </strong> <br>
                <strong> -------------------------------------------------------------------------------------------------------------------------------------------- </strong>

              </font>
            </div>
            <br>
            <div class="col-md-12">
              <label>Seleccionar tipo de campo</label>

              <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 40%;">
                <option>Seleccione </option>
                <option value="servicio1">Campo de texto simple</option>
                <option value="servicio2">Campo Numérico </option>
                <option value="servicio9">Campo Fecha </option>
                <option value="servicio3">Campo de texto Grande </option>
                <option value="servicio10">Campo Imagen </option>
                <option value="servicio4">lista desplegable de si o no </option>
                <option value="servicio5">Lista Desplegable </option>
                <option value="servicio6">Selección Múltiple </option>
                <option value="servicio7">Separador o Titulo de sección </option>
                <option value="servicio8">Imagen Directa </option>

                <option value="servicio11">Inicio Modulo Plegable </option>
                <option value="servicio12">Fin del Modulo Plegable </option>

              </select>
            </div>
            <div id="servicio1" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">campo de texto simple </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    <input type="text" class="form-control input-lg" value="Ejemplo de tipo de campo">
                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-1"> 1 columna </option>
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>

                  <div class="col-md-4">
                    <label><span style="color:red;">*</span> cantidad de caracteres maximo</label>

                    <input type="number" class="form-control input-lg" name="input_maxlength" max="200" min="1" required>


                  </div>
                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="text">
                  <input type="hidden" name="tipo" value="1">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control input-lg">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>


            <div id="servicio2" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">campo numerico </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    <input type="number" class="form-control input-lg" value="1">
                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-1"> 1 columna </option>
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>

                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>

                  <div class="col-md-4">
                    <label><span style="color:red;">*</span> cantidad de caracteres maximo </label>

                    <input type="number" class="form-control input-lg" name="input_maxlength" max="200" min="1" required>


                  </div>

                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="number">
                  <input type="hidden" name="tipo" value="2">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control input-lg">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>



            <div id="servicio3" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">campo de texto grande </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">

                    <script type="text/javascript">
                      var recognition;
                      var recognizing = false;
                      if (!('webkitSpeechRecognition' in window)) {
                        alert("¡API no soportada!");
                      } else {

                        recognition = new webkitSpeechRecognition();
                        recognition.lang = "es-CO";
                        recognition.continuous = true;
                        recognition.interimResults = true;

                        recognition.onstart = function() {
                          recognizing = true;
                          console.log("empezando a eschucar");
                        }
                        recognition.onresult = function(event) {

                          for (var i = event.resultIndex; i < event.results.length; i++) {
                            if (event.results[i].isFinal)
                              document.getElementById("motivoConsulta").value += event.results[i][0].transcript;
                          }

                          //texto
                        }
                        recognition.onerror = function(event) {}
                        recognition.onend = function() {
                          recognizing = false;
                          document.getElementById("procesar").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                          console.log("terminó de eschucar, llegó a su fin");

                        }

                      }

                      function procesar() {

                        if (recognizing == false) {
                          recognition.start();
                          recognizing = true;
                          document.getElementById("procesar").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
                        } else {
                          recognition.stop();
                          recognizing = false;
                          document.getElementById("procesar").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
                        }
                      }
                    </script>

                    <div align="right">
                      <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                    </div>


                    <textarea id="motivoConsulta" name="motivoConsulta" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>


                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>


                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="textarea">
                  <input type="hidden" name="tipo" value="3">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="textarea">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>




            <div id="servicio4" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">campo numerico </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    Pregunta de si o no
                    <select id="interpretRadio" class="form-control" style="width: 100%;">
                      <option value=""> Si </option>
                      <option value=""> No </option>

                    </select>

                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>


                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="select_si_no">
                  <input type="hidden" name="tipo" value="4">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>







            <div id="servicio5" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">Lista Desplegable </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    Pregunta de si o no
                    <select class="form-control select2" style="width: 100%;">
                      <option value=""> opción 1 </option>
                      <option value=""> opción 2 </option>
                      <option value=""> opción 3 </option>
                      <option value=""> opción 4 </option>
                      <option value=""> opción 4 </option>
                      <option value=""> opción .... </option>


                    </select>

                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>
                  <div class="col-md-12">

                    <label> Valores. Separar por comas cada valor, Ejemplo: opción 1;; Opción 2;; Opción 3 ;; ... </label>

                    <textarea id="nota" name="select_table" class="textarea" placeholder="opción 1;; Opción 2;; Opción 3;; ..." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>

                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="select">
                  <input type="hidden" name="tipo" value="5">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>














            <div id="servicio6" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">Lista Desplegable </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">


                    <hr>
                    <h2> Lista Desplegable </h2>
                    <hr>


                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>
                  <div class="col-md-12">

                    <label> Valores. Separar por comas cada valor, Ejemplo: opción 1; Opción 2; Opción 3 ; ... </label>

                    <textarea id="nota" name="select_table" class="textarea" placeholder="opción 1; Opción 2; Opción 3 ; ..." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                  </div>

                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="selectmultiple">
                  <input type="hidden" name="tipo" value="5">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>






















            <div id="servicio7" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center"> Separador de sección </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">


                    <hr>
                    <h3>
                      <div align="center">
                        Separador de sección
                      </div>
                    </h3>
                    <hr>


                  </div>

                  <div class="col-md-12">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">

                      <option value="form-group col-md-1"> 1 columnas </option>
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-12">

                    <label> texto del separador</label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="500" required="required">


                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="separador">
                  <input type="hidden" name="tipo" value="7">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>























            <div id="servicio8" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">Imagen Directa </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">


                    <hr>
                    <h3>
                      <div align="center">
                        Imagen Directa
                      </div>
                    </h3>
                    <hr>


                  </div>

                  <div class="col-md-12">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">

                      <option value="form-group col-md-6"> 6 columnas </option>

                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-12">

                    <label> Imagen</label>
                    <!-- 
                            input_name
                          -->

                    <input type="file" class="form-control input-lg" name="div_nombre_campo" maxlength="200" required="required">


                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="imagen">
                  <input type="hidden" name="tipo" value="8">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="img img-responsive w-100">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>























            <div id="servicio9" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">Campo Fecha </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    <input type="number" class="form-control input-lg" value="1">
                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-1"> 1 columna </option>
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>


                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="date">
                  <input type="hidden" name="tipo" value="9">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control input-lg">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>























            <div id="servicio10" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center">Campo Imagen </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">
                    <input type="number" class="form-control input-lg" value="1">
                  </div>

                  <div class="col-md-4">

                    <label> Columnas </label>

                    <select name="div_class" class="form-control select2" style="width: 100%;">
                      <option value="form-group col-md-1"> 1 columna </option>
                      <option value="form-group col-md-2"> 2 columnas </option>
                      <option value="form-group col-md-3"> 3 columnas </option>
                      <option value="form-group col-md-4"> 4 columnas </option>
                      <option value="form-group col-md-5"> 5 columnas </option>
                      <option value="form-group col-md-6"> 6 columnas </option>
                      <option value="form-group col-md-7"> 7 columnas </option>
                      <option value="form-group col-md-8"> 8 columnas </option>
                      <option value="form-group col-md-9"> 9 columnas </option>
                      <option value="form-group col-md-10"> 10 columnas </option>
                      <option value="form-group col-md-11"> 11 columnas </option>
                      <option value="form-group col-md-12"> 12 columnas </option>

                    </select>

                  </div>
                  <div class="col-md-4">

                    <label> Nombre del campo </label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="120">


                  </div>


                  <div class="col-md-4">

                    <label> Campo Obligatorio </label>

                    <select name="input_required" class="form-control select2" style="width: 100%;">
                      <option value="0"> No </option>
                      <option value="required"> si </option>

                    </select>

                  </div>




                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="file">
                  <input type="hidden" name="tipo" value="10">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control input-lg">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>

            <div id="servicio11" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center"> Inicio Modulo Plegable </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">


                    <hr>
                    <!-- lista -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                            Prueba
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">

                        <div class="box-body">
                          <label>texto dentro del modulo plegable</label>

                        </div>

                      </div>
                    </div>
                    <!--cierre de lista-->
                    <hr>


                  </div>


                  <div class="col-md-12">

                    <label> titulo del modulo plegable</label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="500" required="required">


                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="moduloplegable_inicio">
                  <input type="hidden" name="tipo" value="11">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>

            <div id="servicio12" class="element" style="display: none;">
              <div class="col-md-12">
                <h2 class="text-center"> Final Modulo Plegable </h2>
                <form action="configGuardarCampo.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="control" value="Signos Vitales">

                  <strong> Ejemplo de tipo de campo </strong>
                  <div class="col-md-12">


                    <hr>
                    <!-- lista -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                            Prueba
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse">

                        <div class="box-body">
                          <label>texto dentro del modulo plegable</label>

                        </div>

                      </div>
                    </div>
                    <!--cierre de lista-->
                    <hr>


                  </div>


                  <div class="col-md-12">

                    <label> titulo del modulo plegable</label>
                    <!-- 
                            input_name
                          -->

                    <input type="text" class="form-control input-lg" name="div_nombre_campo" maxlength="500"  disabled>


                  </div>

                  <input type="hidden" name="idTablas" value="<?php echo $Tabla ?>">
                  <input type="hidden" name="Nombre_table" value="<?php echo $Nombre_table ?>">
                  <input type="hidden" name="input_type" value="moduloplegable_final">
                  <input type="hidden" name="tipo" value="12">
                  <input type="hidden" name="div_align" value="left">
                  <input type="hidden" name="input_calss" value="form-control select2">


                  <br>
                  <div class="col-md-12">
                    <br><br>
                    <center><button type="submit" class="btn btn-block btn-primary btn-md">
                        <h2> <strong> G u a r d a r </strong> </h2>
                      </button></center>
                  </div>

                </form>
              </div>
            </div>






















          </div>

        </div>

      </div>

    </div>

  </section>

</div>


<?php include("footer.php") ?>