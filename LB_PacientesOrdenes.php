<?php
include 'header.php';
include 'menu.php';

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
    $queryClienteLab = " AND sOperacionInv.idCliente=" . $_SESSION['cI'];
  }else{
    $queryClienteLab = "";
  }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Órdenes de Laboratorio</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina"> Órdenes de Laboratorio</h4>


                <div class="box">
                    <div class="box-header">
                        <a href="nuevoPaciente">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Rapida_MP" class="table table-bordered table-striped casilla" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <?php if ($_GET["Tipo"] == "CargarOrden") : ?>
                                            <th width="5%" style='text-align:center'>Número de la Orden</th>
                                            <th width="30%" style='text-align:center'>Nombre</th>
                                            <th width="10%" style='text-align:center'>Fecha de la Orden</th>
                                            <th width="30%" style='text-align:center'>Exámenes</th>
                                            <th width="10%" style='text-align:center'>Acciones</th>
                                        <?php endif; ?>
                                        <?php if ($_GET["Tipo"] == "GenerarOrden") : ?>
                                            <th>Nombre</th>
                                            <th>Cédula</th>
                                            <th>Dirección (Casa)</th>
                                            <th>Celular (Contacto)</th>
                                            <th>Celular (WhatsApp)</th>
                                            <th>Correo</th>
                                            <th> </th>
                                        <?php endif; ?>
                                        <?php if ($_GET["Tipo"] == "OrdenCargada") : ?>
                                            <th width="5%" style='text-align:center'>Número de la Orden</th>
                                            <th width="30%" style='text-align:center'>Nombre</th>
                                            <th width="10%" style='text-align:center'>Fecha de la Orden</th>
                                            <th width="10%" style='text-align:center'>Fecha Entrega de la Orden</th>
                                            <th width="30%" style='text-align:center'>Exámenes</th>
                                            <th width="10%" style='text-align:center'>Acciones</th>
                                        <?php endif; ?>

                                    </tr>
                                </thead>

                                <?php if ($_GET["Tipo"] == "CargarOrden") : ?>
                                    <tbody id="Laboratorio4"></tbody>
                                <?php endif; ?>
                                <?php if ($_GET["Tipo"] == "OrdenCargada") : ?>
                                    <tbody id="Laboratorio5"></tbody>
                                <?php endif; ?>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if ($_GET["Tipo"] == "CargarOrden") : ?>
    <script>
        //version 1 tabla dinamica <table id="Tabla_Rapida_MP"></table>

        var data_table = []; //datos que recibe la tabla
        var titulo_tabla = "Pacientes"; //titulo de la tabla para las impresiones
        <?php
        include 'funciones/conn3.php';

        //query para sacar la informacion
        $ID = $_SESSION['ID'];
        if ($_SESSION['vista'] == 0) {
            $queryList = mysqli_query($conn3, "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion  AND sOperacionInv.Estado_Orden != 'Cerrado' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;");

            // echo "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion  AND sOperacionInv.Estado_Orden != 'Cerrado' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;";
        } elseif ($_SESSION['vista'] == 1) {
            $queryList = mysqli_query($conn3, "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion AND sOperacionInv.idEmpresa = '$ID' AND sOperacionInv.Estado_Orden != 'Cerrado' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;");

            // echo "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion AND sOperacionInv.idEmpresa = '$ID' AND sOperacionInv.Estado_Orden != 'Cerrado' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;";

        }
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $boton1 = '';
            $idCliente = $rowMotorizado['idCliente'];
            $idOperacion = $rowMotorizado['idOperacion'];
            $fechaOperacion = $rowMotorizado['fechaOperacion'];
            $Examenes = '';

            $queryExamen = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND Activo = 1 ORDER BY id ASC;");
            while ($rowExamen = mysqli_fetch_array($queryExamen)) {
                $CaracteristicasExamen = $rowExamen["CaracteristicaExamen"];
                if ($CaracteristicasExamen == 'No') {
                    $Examenes .= mysqli_real_escape_string($conn3, $rowExamen["Nombre"]) . "<br>";
                }
                /*
            $CaracteristicasExamen=$rowExamen["CaracteristicaExamen"];
            if($CaracteristicasExamen=='No'){
                $Examenes .= mysqli_real_escape_string($conn3, $rowExamen["Nombre"]) . "<br>";
            }
            else {
                $Examenes .= "<li>".mysqli_real_escape_string($conn3, $rowExamen["Nombre"]) . "</li><br>";
            }
            */
            }
            $nombre_Cliente = mysqli_real_escape_string($conn3, funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente'));

            $boton1 .= "<a href='LB_CargarOrden?idOperacion={$idOperacion}' title='Agregar Resultados' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;'><i class='fa-solid fa-flask'></i> Cargar Resultados </a><br>";
            $boton1 .= "<a href='LB_EditarOrden?idOperacion={$idOperacion}' title='Editar Exámenes' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;color:#6b3cbc;border-color:#6b3cbc'><i class='fa-solid fa-file-invoice-dollar'></i> Editar Exámenes </a>";
            $boton1 .= "<a href='LB_OrdenDeLaOrden?idOperacion={$idOperacion}' title='Editar El Orden' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;color:#bc833c;border-color:#bc833c'><i class='fa-solid fa-pencil'></i> Cambiar el Orden </a>";

        ?>
            //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
            data_table.push(["<?php echo $idOperacion ?>", "<?php echo $nombre_Cliente ?>", "<?php echo $fechaOperacion ?>", "<?php echo $Examenes ?>", "<?php echo $boton1; ?>"]);
        <?php
        }
        ?>
    </script>
<?php endif; ?>



<?php if ($_GET["Tipo"] == "GenerarOrden") : ?>
    <script>
        //version 1 tabla dinamica <table id="Tabla_Rapida_MP"></table>
        var data_table = []; //datos que recibe la tabla
        var titulo_tabla = "Pacientes"; //titulo de la tabla para las impresiones
        <?php
        include 'funciones/conn3.php';

        //query para sacar la informacion
        $ID = $_SESSION['ID'];
        if ($_SESSION['vista'] == 0) {
            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE 1=1 $queryCliente order by cliente_id");
        } elseif ($_SESSION['vista'] == 1) {
            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where usuario_id =$ID $queryCliente order by cliente_id");
        }
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $boton1 = '';
            $cliente_id = $rowMotorizado['cliente_id'];
            $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
            $nombre_cliente = str_replace('"', "'", $rowMotorizado['nombre_cliente']);
            $direccion_cliente = str_replace('"', "'", $rowMotorizado['direccion_cliente']);
            $telefono_cliente = str_replace('"', "'", $rowMotorizado['telefono_cliente']);
            $whatsapp = str_replace('"', "'", $rowMotorizado['whatsapp']);
            $correo_cliente = str_replace('"', "'", $rowMotorizado['correo_cliente']);

            $boton1 .= "<a href='LB_GenerarOrdenLaboratorio?clienteId={$cliente_id}' title='Generar Orden de Laboratorio' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa-solid fa-receipt'></i> Generar Orden </a><br>";
            $boton1 .= "<a href='LB_HistorialPaciente?clienteId={$cliente_id}' title='Historial Paciente' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' style='width: 100%;margin-top: 5px;'><i class='fa-solid fa-book'></i> Historial de Órdenes </a>";

        ?>
            //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
            data_table.push(["<?php echo $nombre_cliente ?>", "<?php echo $CODI_CLIENTE ?>", "<?php echo $direccion_cliente ?>", "<?php echo $telefono_cliente ?>", "<?php echo $whatsapp ?>", "<?php echo $correo_cliente ?>", "<?php echo $boton1; ?>"]);
        <?php
        }
        ?>
    </script>
<?php endif; ?>


<?php if ($_GET["Tipo"] == "OrdenCargada") : ?>
    <script>
        //version 1 tabla dinamica <table id="Tabla_Rapida_MP"></table>

        var data_table = []; //datos que recibe la tabla
        var titulo_tabla = "Pacientes"; //titulo de la tabla para las impresiones
        <?php
        include 'funciones/conn3.php';

        //query para sacar la informacion
        $ID = $_SESSION['ID'];
        if ($_SESSION['vista'] == 0) {
            $queryList = mysqli_query($conn3, "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion,sOperacionInv.fechaEntrega FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion  AND sOperacionInv.Estado_Orden != 'Abierto' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;");
        } elseif ($_SESSION['vista'] == 1) {
            $queryList = mysqli_query($conn3, "SELECT count(*),sOperacionInv.idOperacion,sOperacionInv.idCliente,sOperacionInv.fechaOperacion,sOperacionInv.fechaEntrega FROM sOperacionInv INNER JOIN LB_ExamenCargado ON sOperacionInv.idOperacion = LB_ExamenCargado.idOperacion AND sOperacionInv.idEmpresa = '$ID' AND sOperacionInv.Estado_Orden != 'Abierto' AND sOperacionInv.idEmpresa='$_SESSION[ID]' $queryClienteLab GROUP BY sOperacionInv.idOperacion;");
        }
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $boton1 = '';
            $idCliente = $rowMotorizado['idCliente'];
            $idOperacion = $rowMotorizado['idOperacion'];
            $fechaOperacion = $rowMotorizado['fechaOperacion'];
            $fechaEntrega = $rowMotorizado['fechaEntrega'];
            $Examenes = '';

            $queryExamen = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND Activo = 1 ");
            while ($rowExamen = mysqli_fetch_array($queryExamen)) {
                $CaracteristicasExamen = $rowExamen["CaracteristicaExamen"];
                if ($CaracteristicasExamen == 'No') {
                    $Examenes .= mysqli_real_escape_string($conn3, $rowExamen["Nombre"]) . "<br>";
                }
            }
            $nombre_Cliente = funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');

            $boton1 .= "<a href='LB_ResultadoOrden?idOperacion={$idOperacion}' title='Ver Resultados' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;'><i class='fa-solid fa-flask'></i></i>&nbsp;&nbsp;Ver Resultados </a><br>";
            $boton1 .= "<a href='LB_CargarOrden?idOperacion={$idOperacion}&Editar=Si' title='Editar Resultados' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;color:#6b3cbc;border-color:#6b3cbc;'><i class='fa-solid fa-bong'></i>&nbsp;&nbsp;Editar Resultados </a><br>";
            $boton1 .= "<a href='LB_PreliminarOrden?idOperacion={$idOperacion}&Lectura=Si' title='Ver Factura' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;margin-bottom: 5px;color:#00c767de;border-color:#00c767de;'><i class='fa-solid fa-file-invoice-dollar'></i></i>&nbsp;&nbsp;Ver Factura </a>";

        ?>
            //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
            data_table.push(["<?php echo $idOperacion ?>", "<?php echo $nombre_Cliente ?>", "<?php echo $fechaOperacion ?>", "<?php echo $fechaEntrega ?>", "<?php echo $Examenes ?>", "<?php echo $boton1; ?>"]);
        <?php
        }
        ?>
    </script>
<?php endif; ?>


<?php
include 'footer.php';
?>

<style>
    #Laboratorio4>tr>td:nth-child(4) {
        overflow-y: scroll;
        height: 200px;
        display: block;
        /*width: 100vh;*/
    }

    #Laboratorio5>tr>td:nth-child(5) {
        overflow-y: scroll;
        height: 200px;
        display: block;
        /*width: 100vh;*/
    }
</style>