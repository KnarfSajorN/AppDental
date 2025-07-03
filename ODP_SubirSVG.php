<!DOCTYPE html>
<?php 
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "ODP_Iconos_SVG";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'ODP_Iconos_SVG'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `ODP_Iconos_SVG` (
        `id` int(11) NOT NULL,
        `SVG` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `ODP_Iconos_SVG` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `ODP_Iconos_SVG` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $svg_file = file_get_contents($_FILES["SVG"]["tmp_name"]);

    $find_string   = '<svg';
    $position = strpos($svg_file, $find_string);

    $svg_file_new = substr($svg_file, $position);

    $svg_file_new = str_replace("fill=", "fill_old=", $svg_file_new);
    $xml=<<<XML
$svg_file_new
XML;

$carga_xml = simplexml_load_string($xml);
/*
echo "<pre>";
print_r($carga_xml);
echo "</pre>";
echo "<br>";
*/

if($carga_xml->defs->style != NULL){
    $carga_xml->defs->style="";
}

if($carga_xml->attributes()->width != NULL){
    $carga_xml->attributes()->width ='2em';
}else{
    $carga_xml->addAttribute('width', '2em');
}

if($carga_xml->attributes()->height != NULL){
    $carga_xml->attributes()->height ='2em';
}else{
    $carga_xml->addAttribute('height', '2em');
}

if($carga_xml->attributes()->fill != NULL){
    $carga_xml->attributes()->fill ='currentColor';
}else{
    $carga_xml->addAttribute('fill', 'currentColor');
}

/*  
echo "<hr>";
echo "<pre>";
print_r($carga_xml);
echo "</pre>";
echo "<br>";
*/

    $XML = $carga_xml->asXML();
    
    $XML = str_replace('<?xml version="1.0"?>', "", $XML);
    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (SVG) VALUES ('$XML');");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo Los Datos Correctamente'</script>";
    }

}

///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "" AND $_GET['Valid']==1) {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Elimino El Dato Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

// Para subir un icono debe cumplir estos dos requisitos 
// agregar width="2em" height="2em" o actualizarlo a esos valores 
// agregar o actualizar el campo fill a -> fill="currentColor"
// fill="currentColor" width="2em" height="2em"
?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
                        <div class="col-md-3" >
                        <?php if ($_GET['Editar']) : ?>
                          <a href="ODP_subirSVG.php" id="boton_modulo_nuevo" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                        </div>
                        <div class="col-md-6" style="align-self: center;">
                          <h2> Cargar Icono/SVG [Odontopediatria] </h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_informacion" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($_GET['Editar']) ? 'Editar <br>' . funcionMaster($_GET['Editar'], 'id', 'nombre', 'ODP_Iconos_SVG') : 'Nuevo' ?></a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_tabla" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" id="FormularioInformacion">

                                <div class="form-group col-md-12">
                                    <hr>
                                </div>

                                <div class="form-group col-md-12">
                                    <label style="color:red;">* Los iconos deberan ser subidos en archivo tipo .svg ademas de que sean preferiblemente monocolor para su correcto funcionamiento y visualizacion * </label> <br>
                                    <label style="color:green;"> Si desea volver una imagen icono puede hacerlo desde la siguiente pagina <a href="https://picsvg.com/" class="btn btn-outline-info btn-lg rounded-pill shadow">PICSVG</a> </label> <br>
                                    
                                    <label>SVG</label>
                                    <input id="file-input" type="file" accept=".svg" class="form-control input-lg" name="SVG" required>
                                </div>


                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                                
                                <div class="form-group col-md-12">
                                    <hr>
                                </div>

                                <?php if ($_GET['Editar'] <> "") : ?>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                        <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                                
                                                <h2> <i class="fa fa-pencil"></i> <strong> A c t u a l i z a r </strong> </h2>
                                            </button></center>
                                    </div>
                                <?php else : ?>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-lg" name="Guardar_Informacion_Pagina">
                                            
                                            <h2> <i class="fa fa-save"></i> <strong> G u a r d a r </strong> </h2>
                                        </button>
                                    </div>
                                <?php endif; ?>

                           </form>


                        </div>


                        <div class="tab-pane" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">

                              <div class="form-group col-md-12">
                                    <hr>
                              </div>

                              <table class="table table-striped table-bordered" id="example1" style="width:100%">
                                <?php
                                $tableColumna = [
                                  '#',
                                  'Icono',
                                  'Acciones'
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

                                  $QueryTabla = "SELECT * FROM $Nombre_Tabla WHERE Activo = 1";
                                  $QueryExecuteTabla = mysqli_query($conn3, $QueryTabla);
                                  while ($RowTabla = mysqli_fetch_assoc($QueryExecuteTabla)) {

                                    $id = $RowTabla['id'];
                                    $SVG = $RowTabla['SVG'];

                                    $ruta = htmlentities($_SERVER['PHP_SELF']);

                                    echo "<tr>
                                        <th scope='row' width='2%'>{$id}</th>
                                        <td width='20%' align='center'><label>$SVG</label></td>";

                                    echo "<td width='20%' align='center'>
                                            <font color='#04CC05'> <a onclick='EliminarDato(this)' data-href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-trash' title='Eliminar'> Eliminar</i></a></font>
                                            </td>
                                        </tr>";
                                    
                                    

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

                    </div>




                </section>


                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php' ?>

<script>
  function EliminarDato(valor) {
    // Prevenir la redirección predeterminada
    event.preventDefault();
    const url = valor.getAttribute('data-href');
    // Mostrar el SweetAlert de confirmación
    Swal.fire({
      title: '¿Estás Seguro?',
      text: 'Esta Acción Eliminará el Registro. ¿Estás Seguro de Continuar?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sí, Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si el usuario confirmó la eliminación, redirecciona a la URL de eliminación
        window.location.href = url+'&Valid=1';
      }
    });
  }
</script>

<script>
$(document).ready(function() {
  <?php if (isset($_GET['Editar'])) { ?>
    // Agregar clases cuando $_GET['Editar'] está definido

    $('#boton_modulo_nuevo').hide();

    $('#boton_modulo_informacion').addClass('active');
    $('#boton_modulo_tabla').removeClass('active');
    $('#tab-eg-0').addClass('show active');
    $('#tab-eg-1').removeClass('show active');
  <?php } else { ?>
    // Agregar clases cuando $_GET['Editar'] no está definido

    //$('#boton_modulo_nuevo').hide();

    //$('#boton_modulo_informacion').removeClass('active');
    //$('#boton_modulo_informacion').hide();
    //$('#boton_modulo_tabla').addClass('active');
    //$('#tab-eg-0').removeClass('show active');
    //$('#tab-eg-1').addClass('show active');
  <?php } ?>
});
</script>