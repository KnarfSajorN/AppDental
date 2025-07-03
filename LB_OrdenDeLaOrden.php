<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['Reordenar_Orden'])) {

    $idOperacion  = $_POST["idOperacion"];
    $ArregloId=[];
    foreach ($_POST as $key => $value) {
        
        if($key=="Ordernar"){

            foreach($value as $key2 => $value2){
                echo "echo '$key2 = $value2<br>';";
                
                $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND id='{$value2}' And Activo = '1' ORDER BY id ASC");
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $examen_id = $rowMotorizado["examen_id"];
                    $examenrelacion_id = $rowMotorizado['examenrelacion_id'];
                    $contador=0;
                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND examen_id='{$examen_id}' AND examenrelacion_id='{$examenrelacion_id}' And Activo = '1' ORDER BY id ASC");
                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1, MYSQLI_ASSOC)) {
                        $contador++;
                        $Campos="";
                        $Valor="";
                        foreach ($rowMotorizado1 as $key3 => $value3) {
                            if($key3!="id"){
                                $Campos.="$key3,";
                                $Valor.="'$value3',";
                            }
                            
                        }
                        $Campos = trim($Campos, ",");
                        $Valor = trim($Valor, ",");
            
                        $ArregloId[]=$rowMotorizado1["id"];
                        mysqli_query($conn3, "INSERT INTO LB_ExamenCargado ({$Campos}) VALUES ({$Valor});");
                        
                        if($contador==1){
                            $id_principal_examen = mysqli_insert_id($conn3);
                            mysqli_query($conn3, "UPDATE LB_ExamenCargado set examenrelacion_id = '$id_principal_examen' where id='{$id_principal_examen}';");

                        }else{
                            $id_examen_secundarios = mysqli_insert_id($conn3);
                            mysqli_query($conn3, "UPDATE LB_ExamenCargado set examenrelacion_id = '$id_principal_examen' where id='{$id_examen_secundarios}';");
                        }
                        //echo "INSERT INTO LB_ExamenCargado ({$Campos}) VALUES ({$Valor}); <br>";
                    }
                }
            }
        }
    }

    foreach ($ArregloId as $key => $value) {
        //echo "DELETE FROM LB_ExamenCargado WHERE id='{$value}';";
        //mysqli_query($conn3, "DELETE FROM LB_ExamenCargado WHERE id='{$value}';");
        mysqli_query($conn3, "UPDATE LB_ExamenCargado set Activo = '0' where id='{$value}';");
    }


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='LB_PacientesOrdenes?Tipo=CargarOrden&error=Hubo Un Error Al Modificar El Orden Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='LB_PacientesOrdenes?Tipo=CargarOrden&msg=Se Reordeno la Orden'</script>";
    }
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


$idsCategory = explode(",", base64_decode($_GET['categorias']));
$usuario_id = $_SESSION['ID'];

$idOperacion = $_GET["idOperacion"];
$clienteId = funcionMaster($idOperacion, 'idOperacion', 'cliente_id', 'LB_ExamenCargado');

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
            <li><a href="#"> Reordenar Exámenes </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <div class="col-md-12" style="height: 280px;">
                    <?php include 'Modulos_Estilos/DatosPersonales.php';
                    echo Datos_Personales($clienteId);
                    ?>
                </div>
                <h4 class="Titulo_Pagina"> Reordenar Exámenes </h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-md-12">
                            <hr style="margin-top:20px;margin-bottom: 10px;">
                        </div>

                        <div class="col-md-12" style="text-align: -webkit-center;">
                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]) . "?idOperacion={$idOperacion}"; ?>' method="POST">
                            
                        <h1>Reordenar los Exámenes</h1>
                            <ul id="sortable" style="width:100%;padding-inline-start: 0;">
                                <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND CaracteristicaExamen='No' AND Activo = 1 ORDER BY id ASC");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Nombre = $rowMotorizado["Nombre"];
                                        $id = $rowMotorizado["id"];
                                        echo "<li class='btn btn-block btn-outline-success btn-lg rounded-pill shadow'><input name='Ordernar[]' value='{$id}' style='display:none;' >{$Nombre}</li>";
                                    }
                                ?>
                            </ul> 
                            <hr>
                            <input type="hidden" name="idOperacion" value="<?php echo $idOperacion; ?>">
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
        $( "#sortable" ).sortable({   
            placeholder: "ui-sortable-placeholder"   
        });  
    });  
</script>