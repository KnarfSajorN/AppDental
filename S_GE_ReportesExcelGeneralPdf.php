<?php session_start();
include 'funciones/conn3.php';


$idPrincipal =$_SESSION['ID_principal'];
$desde = date("Y-m-d", strtotime($_POST['fecha_inicial']));
$hasta = date("Y-m-d",strtotime($_POST['fecha_final']));
$usuario_id = $_POST['usuario_id'];
$queryReporte = "SELECT * FROM S_GE_nuevo WHERE (usuario_id ='$usuario_id' or usuario_id ='$idPrincipal') AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY id DESC";
$sqlQueryReporte = mysqli_query($conn3, $queryReporte);

?>
<table class="table" border='1' cellpadding='2' cellspacing='0' width='100%'>
                <thead class="bg-dark">
                    <tr>
                        <th scope="col">H. de Creacion</th>
                        <th scope="col">F. de Creacion </th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Tipo</th>
                        
                    </tr>
                </thead>
                <tbody>

                <?php
                    while ($datos = $sqlQueryReporte->fetch_object()) {
                        if ($datos->tipo == 1) {
                            $tipo = "GASTO";
                        } else {
                            $tipo = "EGRESO";
                        }
                            ?>
                        <tr>
                            <td scope="row"><?= $datos->hora_creacion ?></td>
                            <td><?= $datos->fecha_creacion ?></td>
                            <td><?= $datos->descripcion ?></td>
                            <td><?=$tipo?></td>
                        </tr>
                    <?php }
                    ?>
                    <tr>
                </tbody>
            </table>
<script>
    // $(document).ready(function() {
    //     window.print();
    // });

    document.addEventListener("DOMContentLoaded", function() {
        print();
    });
</script>


<?php include 'PiedePaginasReportes.php'; 
?>