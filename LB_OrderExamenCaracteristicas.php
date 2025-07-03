<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['Reordenar_Orden'])) {

    $id = $_POST['id'];

    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_Examen WHERE id='$id'");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Caracteristicas = $rowMotorizado["Caracteristicas"];
        $listado = json_decode($Caracteristicas, true);

        foreach ($listado as $key => $value) {
            if ($value["id"] != "") {
                $NuevoListado .= "{";
                foreach ($value as $key1 => $value1) {
                    if ($key1 == "id") {
                        $NuevoListado .= '"' . $key1 . '":' . $value1 . ',';
                    } else {
                        $NuevoListado .= '"' . $key1 . '":"' . $value1 . '",';
                    }
                }
                $NuevoListado = trim($NuevoListado, ',');
                $NuevoListado .= "},";
                //$NuevoListado .= '{"id":' . $value["id"] . ',"Nombre_Caracteristica":"' . $value["Nombre_Caracteristica"] . '","Unidades_Referencia":"' . $value["Unidades_Referencia"] . '","Valores_Referencia_Caracteristica":"' . $value["Valores_Referencia_Caracteristica"] . '"},';
            }
        }
    }

    
    $NuevoListado = trim($NuevoListado, ',');
    $NuevoListado1 = "[" . $NuevoListado . "]";

    //echo $NuevoListado1."<br><br>";

    $NuevoListadoArreglo = json_decode($NuevoListado1, true);
    $Ordernar = $_POST['Ordernar'];
    $Contador = 0;
    foreach ($Ordernar as $key => $value) {
        //echo $key . " " . $value . "<br>";
        if($value != ""){
            foreach ($NuevoListadoArreglo as $key1 => $value1) {
                if($value1["id"] == $value){
                    // guardar en una vairable todo el arreglo de la posicion que se encuentra el id
                    $Contador++;
                    $NuevoListadoOrdenado .= "{";
                    foreach ($value1 as $key2 => $value2) {
                        if ($key2 == "id") {
                            $NuevoListadoOrdenado .= '"' . $key2 . '":' . $Contador . ',';
                        } else {
                            $NuevoListadoOrdenado .= '"' . $key2 . '":"' . $value2 . '",';
                        }
                    }
                    $NuevoListadoOrdenado = trim($NuevoListadoOrdenado, ',');
                    $NuevoListadoOrdenado .= "},";
                }
            }
        }
    }

    // update campo caracteristicas en la tabla LB_Examen con el nuevo listado ordenado 
    $NuevoListadoOrdenado = trim($NuevoListadoOrdenado, ',');
    $NuevoListadoOrdenado1 = "[" . $NuevoListadoOrdenado . "]";

    $queryUpdate = mysqli_query($conn3, "UPDATE LB_Examen SET Caracteristicas='$NuevoListadoOrdenado1' WHERE id='$id'");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'> window.location='{$ruta}?id={$id}&msg=Se Actualizo el Orden'</script>";
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


$usuario_id = $_SESSION['ID'];

$id = $_GET["id"];

?>


<style>

.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reordenar Características del Examen </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Reordenar Características del Examen </h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-md-12">
                            <hr style="margin-top:20px;margin-bottom: 10px;">
                        </div>

                        <div class="col-md-12" style="text-align: -webkit-center;">
                            <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]) . "?id={$id}"; ?>' method="POST">

                                <h1>Reordenar las Características del Examen</h1>
                                <ul id="sortable" style="width:100%;padding-inline-start: 0;">
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_Examen WHERE id='$id'");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Caracteristicas = $rowMotorizado["Caracteristicas"];
                                        $listado = json_decode($Caracteristicas, true);

                                        foreach ($listado as $key => $value) {
                                            if ($value["id"] != "") {
                                                $Valorid = $value["id"];
                                                $Nombre = $value["Nombre_Caracteristica"];
                                                echo "<li class='btn btn-block btn-outline-success btn-lg rounded-pill shadow'><input name='Ordernar[]' value='{$Valorid}' style='display:none;'>{$Nombre}</li>";
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                                <hr>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="Reordenar_Orden" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%;"> Reordenar </button>
                            </form>
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

<style>

#sortable > li{
  /*color: #fff;*/
  padding: 20px;
  width: 100%;
  margin: 0px auto;
  margin-bottom:10px;
  cursor: pointer;
  /*background-color: #00a65a;
  border-top: outset;*/
}
</style>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>
    $(function() {
        $("#sortable").sortable({
            placeholder: "ui-sortable-placeholder"
        });
    });
</script>