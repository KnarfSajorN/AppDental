<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "OD_Iconos_SVG";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $svg_file = file_get_contents($_FILES["SVG"]["tmp_name"]);

    $find_string = '<svg';
    $position = strpos($svg_file, $find_string);

    $svg_file_new = substr($svg_file, $position);

    $svg_file_new = str_replace("fill=", "fill_old=", $svg_file_new);
    $xml = <<<XML
$svg_file_new
XML;

    $carga_xml = simplexml_load_string($xml);
    /*
    echo "<pre>";
    print_r($carga_xml);
    echo "</pre>";
    echo "<br>";
    */

    //var_dump($carga_xml->defs->style);
    if ($carga_xml->defs->style != NULL) {
        $carga_xml->defs->style = "";
    }

    if ($carga_xml->attributes()->width != NULL) {
        $carga_xml->attributes()->width = '2em';
    } else {
        $carga_xml->addAttribute('width', '2em');
    }

    if ($carga_xml->attributes()->height != NULL) {
        $carga_xml->attributes()->height = '2em';
    } else {
        $carga_xml->addAttribute('height', '2em');
    }

    if ($carga_xml->attributes()->fill != NULL) {
        $carga_xml->attributes()->fill = 'currentColor';
    } else {
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
if ($_GET['Eliminar'] <> "") {
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
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Cargar SVG </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Cargar Icono/SVG </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label style="color:red;">* Los iconos deberan ser subidos en archivo tipo .svg ademas
                                    de que sean preferiblemente monocolor para su correcto funcionamiento y
                                    visualizacion * </label> <br>
                                <label style="color:green;"> Si desea volver una imagen icono puede hacerlo desde la
                                    siguiente pagina <a href="https://picsvg.com/"
                                        class="btn btn-outline-info btn-lg rounded-pill shadow">PICSVG</a> </label> <br>

                                <label>SVG</label>
                                <input id="file-input" type="file" accept=".svg" class="form-control input-lg"
                                    name="SVG" required>
                            </div>

                            <br>
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> ""): ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-12">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Estados </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Icono</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");
                                                if ($queryList) {
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        //$contador++;
                                                        $id = $rowMotorizado['id'];
                                                        $SVG = $rowMotorizado['SVG'];

                                                        $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                        echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'><label>$SVG</label></td>";

                                                        echo "<td width='20%' align='center'>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                                    </td></tr>";
                                                    }
                                                }


                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<script>

    function CambioColor(este) {
        var color = este;
        $(".icon_svg > SVG").css("color", color);
        //console.log($(".icon_svg > SVG"));
    }

</script>