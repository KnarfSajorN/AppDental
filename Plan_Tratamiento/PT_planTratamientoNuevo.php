<?php
include '../header.php';
include '../menu.php';

// recibir el id del paciente
$idCliente = $_GET['clienteId'];
$ID = $_SESSION['ID'];
$ID_principal = $_SESSION['ID_principal'];




$moneda = funcionMaster($ID_principal, 'ID', 'moneda', 'config');

// arreglo con los detalles del plan
$arrayPiezas = [
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '18'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '17'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '16'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '15-55'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '14-54'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '13-53'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '12-52'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '11-51'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '21-61'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '22-62'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '23-63'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '24-64'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '25-65'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '26'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '27'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '28'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '38'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '37'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '36'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '35-75'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '34-74'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '33-73'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '32-72'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '31-71'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '41-81'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '42-82'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image2.png', 'nombrePieza' => '43-83'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '44-84'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '45-85'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '46'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '47'],
    ['img' => '' . $Base . 'Plan_Tratamiento/img/image1.png', 'nombrePieza' => '48'],


];


    $queryInventario = mysqli_query($conn3, "SELECT *, s.ID as idvalue, s.descripcion as nombreProducto from sinvetrios s
    left join scategoria sca on s.tipo = sca.id 
    where s.ID_principal = $ID_principal and estado = 1
    and sca.tipo = 2");
    while ($row = mysqli_fetch_assoc($queryInventario)) {
        $inventario[] = $row;
    }


$resultado = true;
$FAID = base64_decode($_GET['FAID']);
var_dump($FAID);

// validación
$queryPlanes = mysqli_query($conn3, "SELECT * from planesTratamiento where idCliente = $idCliente and abierto = 1 limit 1");

if (mysqli_num_rows($queryPlanes) > 0) {
    $planresult = mysqli_fetch_assoc($queryPlanes);
    $idPlanCliente = $planresult['id'];

} else {

    $resultado = false;
}

if (!isset($_GET['FAID']) && $resultado == false) {
    //     // es un plan nuevo y se debe insertar
    //     // se inserta con los datos actuales
    $queryInsert = mysqli_query($conn3, "INSERT INTO planesTratamiento (idUsuario,idCliente,ID_principal,notas) values ( $ID,$idCliente, $ID_principal,'')");
    $FAID = mysqli_insert_id($conn3);
    //     // se insertan los detalles del plan
    foreach ($arrayPiezas as $pieza) {
        $nombrePieza = $pieza['nombrePieza'];
        // insertar 1 a 1
        $queryInsert = mysqli_query($conn3, "INSERT INTO planesTratamientoDetalles  (idPlan, nombrePieza) values ($FAID, '$nombrePieza')");
    }
    $queryinsertProcedimiento = mysqli_query($conn3, "INSERT INTO planesProcedimiento (idPlan,idUsuario,idCliente,ID_principal) values ($FAID,$ID,$idCliente,$ID_principal)");
}else{
    //sino hacemos un redirect a la misma pagina con clienteId y FAID
    if(!isset($_GET['FAID'])){
        echo "<script>window.location.href = 'PT_NuevoPlanTratamiento?clienteId=$idCliente&FAID=".base64_encode($idPlanCliente)."';</script>";
    }
    
    
}

if (isset($_POST['Enviar_Firma'])) {
    $idPieza = $_POST['id'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  planesTratamiento where ID = $FAID");
    // $nrowl = mysqli_num_rows($queryList);
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $cliente_id = $rowMotorizado['idCliente'];
            $usuario_id = $rowMotorizado['idUsuario'];
            // $receta     = $rowMotorizado['receta'];
        }
    }


    $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    // $mensajeW= 'hola wapo';
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar el Plan de Tratamiento, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $idPieza . '/planesTratamientoDetalles/' . $cliente_id;
    $accion = 0;

    whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
}
// tenemos un plan y vamos a consultar
// consulta a la cabecera
$queryHeader = mysqli_query($conn3, "SELECT * from planesTratamiento where id = $FAID");
$resultheader = mysqli_fetch_assoc($queryHeader);


// // consulta al detalle
$queryDetail = "SELECT * from planesTratamientoDetalles where idPlan = $FAID order by id";
$rowDetalles = mysqli_query($conn3, $queryDetail);
$detalles = [];
while ($row = mysqli_fetch_assoc($rowDetalles)) {
    $detalles[] = $row;
}
// var_dump($detalles);
// var_dump($resultheader);
// echo "SELECT * from planesTratamiento where id = $FAID";
// echo "SELECT * from planesTratamientoDetalles where idPlan = $FAID";
?>

<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="formLogo" method="POST">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <label for="">Plan de Tratamiento</label>
                                </div>
                                <?php  ?>
                            </div>
                            <div class="card-body">
                                <div class="row table-responsive">
                                    <h1 class="text-center"> Plan de Tratamiento</h1>
                                    <table class="table  table-bordered table-striped" id="tablaInventario" style="width:100%">

                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td>Piezas</td>
                                                <td>Diagnostico</td>
                                                <td>Tratamiento</td>
                                                <td>Costo</td>
                                                <td>Firma</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($detalles as $pieza) {
                                                $piezaId = $pieza['id'];
                                                $img = $arrayPiezas[array_search($pieza['nombrePieza'], array_column($arrayPiezas, 'nombrePieza'))]['img'];
                                                $nombrePieza = $pieza['nombrePieza'];
                                                $tratamiento = $pieza['tratamiento'];
                                                echo "<tr>";
                                                echo "<td><img src='$img' width='50px' height='25px'></td>";
                                                echo "<td>$nombrePieza</td>";
                                                echo "<td><input type='text' name='diagnostico' class='form-control' onchange='automaticUpdate(this.value, \"diagnostico\", \"planesTratamientoDetalles\", \"$piezaId\")' value='{$pieza['diagnostico']}'></td>";
                                                echo "<td> <input type='text' name='tratamiento' class='form-control' onchange='automaticUpdate(this.value, \"tratamiento\", \"planesTratamientoDetalles\", \"$piezaId\")' value='$tratamiento'></td>";
                                                echo "<td><input type='number' name='costo' class='form-control ' onchange='automaticUpdate(this.value, \"costo\", \"planesTratamientoDetalles\", \"$piezaId\"), updateTotal()' value='" . (($pieza['costo'] != '' && $pieza['costo'] != null) ? $pieza['costo']  : 0) . "' ></td>";
                                                echo "<td>";
    
                                                $queryList = mysqli_query($conn3, "SELECT firma FROM firmas WHERE historia_nombre='planesTratamientoDetalles' AND historia_id = $piezaId");
                                                if ($queryList) {
                                                    $firma = '';
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        $firma = $rowMotorizado['firma'];
                                                    }
                                                }
                                            
                                                if (strlen($firma) > 10) {
                                                    echo "<img src='$firma' style='width: 55px; height: 35px;'>";
                                                } else {
                                                    $ruta = htmlentities($_SERVER['REQUEST_URI']);
                                                    echo '<form action="' . $ruta . '" method="POST" name="formularioEnvioExamen">';
                                                    echo '<button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma">';
                                                    echo '<i class="fa fa-pencil-square-o"></i>Solicitar Firma</button>';
                                                    echo '<input type="hidden" name="id" value="' . $piezaId . '">';
                                                    echo '</form>';
                                                }
                                            
                                                echo "</td>"; 
                                                echo "</tr>";
                                            }

                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-right">Costo Total</td>
                                                <td id="totalCosto" class="text-center"></td>
                                                <td></td>


                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 form-group p-3">
                                <label for="">EN CASO DE EXISTIR TRABAJOS ESPECIALES, ADICIONALES, EXPLICACIONES GRAFICAS U OTROS Y/O A REALIZAR, ANOTAR AQUÍ:</label>
                                <textarea name="" id="" onchange="automaticUpdate(this.value, 'notas', 'planesTratamiento', <?= $FAID ?>)" class="form-control" rows="4"><?= $resultheader['notas'] ?></textarea>

                            </div>
                            <div class="col-md-12 form-group p-3">
                                <label for="">Dias Validos</label>
                                <input type="text" id="" onchange="automaticUpdate(this.value, 'fVencimiento', 'planesTratamiento', <?= $FAID ?>)" class="form-control" value = "<?= $resultheader['fVencimiento'] ?>">

                            </div>
                            <?php
                            $faid2 = base64_encode($FAID);
                            ?>
                            <button type="button" class="btn btn-outline-info btn-lg rounded-pill shadow" onclick="automaticUpdate(0, 'abierto', 'planesTratamiento', '<?= $FAID ?>', 'PT_finalizadoPlan?FAID=<?=$faid2?>')" >Guardar</button>
                         
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include '../footer.php';
?>

<script>
    function updateTotal() {
        let total = 0;
        const costos = document.querySelectorAll('input[name="costo"]');
        costos.forEach(input => {
            total += parseFloat(input.value) || 0; // Sumar el costo, manejar NaN
        });
        document.getElementById('totalCosto').innerText = total.toFixed(2) + ' ' + '<?php echo $moneda ?>'; // Mostrar el total con 2 decimales
    }

    $(document).ready(function() {
        setTimeout(function() {
            updateTotal();
        }, 1000);

    });
</script>