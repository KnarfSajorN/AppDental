<?php include 'header.php';
include 'menu.php';



function meer_menu($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

///////////////////////////////////////////////////////////////////////////
$Nombre_Tabla = "main_menu";

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        if ($key=="nombre") {
            $value= meer_menu($value);
        }

        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' AND creado_sistema = 1 limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    //$ruta = str_replace('.php', '', $ruta);

    if ($queryList != true) {
        echo "<script language='Javascript'> window.location=Perfiles_RegistrarNuevoMenu.php?error=Hubo Un Error Al Actualizar El Menu'</script>";
    } else {
        echo "<script language='Javascript'> window.location='Perfiles_RegistrarNuevoMenu.php?msg=Se Actualizo Correctamente El Menu'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

$EstadoFinal="show active";

// Ruta del archivo JSON
$rutaJson = 'Perfiles_Menu_Iconos.json';
// Leer el contenido del archivo JSON
$jsonData = file_get_contents($rutaJson);
// Codificar los datos JSON para su uso en JavaScript
$encodedJsonData = json_decode($jsonData, true);

$arreglojson = json_encode($encodedJsonData);

///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id AND creado_sistema = 1 limit 1");
    $numrow = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            if($key=="nombre"){
                $datos["$key"] = meer_menu("$value");
            }else{
                $datos["$key"] = "$value";
            }
            
        }
    }
    if($numrow==0){
        echo "<script language='Javascript'> window.location='Perfiles_MenuCreados_Historial.php?error=Menu No Permitido'</script>";
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
              if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

              if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
                  document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
              } else {

                  var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
                  var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
                  //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
                  if (classe.indexOf("select2") > -1) {
                      $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected", true);
                      $("select[name='" + name + "']").select2();
                      //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
                  } else {
                      $("select[name='" + name + "']").val(Arreglo[index]);
                      //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
                  }

              }
              
              if(index=='icon'){
                //console.log('213123');
                var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
                var selectIcono = $("select[name='Arreglo[icon]']");
                for (var i = 0; i < options.length; i++) {
                    //var option = new Option('<i class="' + options[i] + '"></i> - ' + options[i], options[i], false, false);
                    var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                    option.title = "Icono"
                    //option.setAttribute('data-icon', options[i]);
                    if (options[i] === Arreglo[index]) {
                        option.selected = true; // Aplicar "selected" a la opción correspondiente
                    }

                    selectIcono.append(option);
                }

                var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
                SelectIconos_Class(".IconoMenu", ArregloIconos);

              }



            }

            if(index=='nivel'){
                if(Arreglo[index]=="1"){
                    $("#pantalla_div").hide();
                }
            }

            }
        };
    </script>
<?php


$EstadoFinalEditar="show active";
$EstadoFinal="";
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];



?>






              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                          <h2>Menus Registrados</h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow <?=$EstadoFinalEditar;?> ">Editar</a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow <?=$EstadoFinal;?> ">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane <?=$EstadoFinalEditar;?>" id="tab-eg-0" role="tabpanel">

                          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" style="<?php if(!$_GET['Editar']){echo "display:none";}?>">
                            
                              <div class="form-group col-md-6">
                                  <label>Nombre</label>
                                  <input type="text" class="form-control input-lg" name="Arreglo[nombre]" placeholder="Descripción" required>
                              </div>

                              <div class="form-group col-md-6" id="pantalla_div">
                                <div align="left"> URL </div>
                                <input type="text" class="form-control input-lg" id="pantalla" name="Arreglo[pantalla]" placeholder="Pantalla" required >
                              </div>

                              <div class="form-group col-md-6">
                                <div align="left"> Color </div>
                                <input type="color" class="form-control input-lg" id="color" name="Arreglo[color]" placeholder="Color" >
                              </div>
                              
                              <div class="form-group col-md-6">
                                <div align="left"> Icono </div>
                                <select class="form-control input-lg IconoMenu select2" title="Icono" name="Arreglo[icon]" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                </select>
                              </div>


                              







                              <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                              <?php if ($_GET['Editar'] <> "") : ?>
                                  <div class="col-sm-12">
                                      <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                      <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                              <h2> <strong> A c t u a l i z a r </strong> </h2>
                                          </button></center>
                                  </div>
                              <?php else : ?>
                                  <div class="col-sm-12">
                                      <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                              <h2> <strong> G u a r d a r </strong> </h2>
                                          </button></center>
                                  </div>
                              <?php endif; ?>

                          </form>



                        </div>


                        <div class="tab-pane  <?=$EstadoFinal;?>" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table table-striped table-bordered">
                                <?php
                                $tableColumna = [
                                  'Nombre',
                                  'Tipo',
                                  'Menu Principal',
                                  'URL',
                                  'Color',
                                  'Opciones'
                                ]
                                ?>
                                <thead>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $tabla="main_menu";
                                  $querysinvetrios = "SELECT * from main_menu where creado_sistema = 1 and estado = 1";
                                  $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                                  while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {

                                    switch($rowsinvetrios['nivel']){
                                      case 1:
                                        $Tipo = "Menu";
                                        break;
                                      case 2:
                                        $Tipo = "Sub Menu";
                                        break;
                                    }
                                    $menuPrincipalEstado="";
                                    if($rowsinvetrios['idPrincipal']!="0"){
                                    $menuPrincipal = funcionMaster($rowsinvetrios['idPrincipal'],'id','nombre','main_menu');
                                    $menuPrincipalEstado = funcionMaster($rowsinvetrios['idPrincipal'],'id','estado','main_menu');
                                    if($menuPrincipalEstado=="0"){
                                      $menuPrincipalEstado = "<label style='color:red;border:3px solid black;padding:2px;border-radius:10px;background-color:#80808059;' title='Inactivo por que el menu principal fue eliminado'>(Inactivo)</label>";
                                    }	
                                    }else{
                                      $menuPrincipal = "";
                                    }
                                  ?>
                                    <tr class="center text-center">
                                      <td><?= $rowsinvetrios['nombre'] ?></td>
                                      <td><?= $Tipo." ".$menuPrincipalEstado?></td>
                                      <td><?= $menuPrincipal?></td>
                                      <td><?= $rowsinvetrios['pantalla'] ?></td>
                                      <td>
                                        <?= $rowsinvetrios['color'] ?>
                                      </td>
                                      <td>
                                        <a href="Perfiles_MenuCreados_Historial.php?Editar=<?= ($rowsinvetrios['id']) ?>" class="btn btn-light" title="editar">
                                          <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger" title="eliminar" onclick="alerts({title: 'Seguro que desea eliminar este registro?',text: '',icon:'info',update: `0|/|estado|/|<?= $tabla ?>|/|<?= $rowsinvetrios['id'] ?>|/|Perfiles_MenuCreados_Historial.php` });">
                                          <i class="fas fa-close"></i>
                                        </button>
                                      </td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                </tfoot>
                              </table>
                            </div>
                          </div>

                        </div>
                      </div>

                      <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


                    </div>




                </section>

                <?php echo $mensaje_registro_patients; ?>

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php' ?>

  <?php
// Ruta del archivo JSON
$rutaJson = 'Perfiles_Menu_Iconos.json';
// Leer el contenido del archivo JSON
$jsonData = file_get_contents($rutaJson);
// Codificar los datos JSON para su uso en JavaScript
$encodedJsonData = json_decode($jsonData, true);

$arreglojson = json_encode($encodedJsonData);

?>
<script>

    function SelectIconos_Class(Selecticon, options) {

        $(Selecticon).each(function() {
            var select = $(this);
            
            select.select2({
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: function(data) {
                    var $result = $('<span title="Icono"></span>');
                    $result.html(data.text);

                    return $result;
                },
                width:"100%"
            });
        });

    }

</script>
