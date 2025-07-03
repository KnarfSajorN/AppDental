<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND idCliente=" . $_SESSION['cI'];
} else {
    $queryCliente = "";
}

?>
<!--
1. Presupuesto normal/ Odontología: 2
2. Presupuesto Facial: 4
3. Presupuesto Corporal: 5
4. Presupuesto odontograma:6
-->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registros de Presupuestos

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Registros de Presupuestos</a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <?php
                $msg = $_GET['msg'];
                if ($msg == '1') {
                    echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
                }

                if ($msg == '2') {
                    echo '
            <div class="callout callout-danger ">
            <h4> Presupuesto Eliminado!</h4>

            <p>   </p>
          </div>';
                }
                ?>

                <div class="box">
                    <?php
                    $menu = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');

                    ?>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <font class="text-dark" style="<?= $menu == 5 ? '' : 'display:none;' ?>"> Presupuesto Facial <i
                                class="fa fa-circle" style="color:#7b41f2"></i> ||</font>
                        <font class="text-dark" style="<?= $menu == 5 ? '' : 'display:none;' ?>"> Presupuesto Corporal
                            <i class="fa fa-circle" style="color:#E375FF"></i> ||
                        </font>
                        <font class="text-dark" style="<?= $menu == 8 ? '' : 'display:none;' ?>"> Presupuesto
                            Odontología
                            <i class="fa fa-circle" style="color:#3d8aa0"></i> ||
                        </font>
                        <font class="text-dark" style="<?= $menu == 8 ? '' : 'display:none;' ?>"> Presupuesto
                            Odontograma
                            <i class="fa fa-circle" style="color:#1bd6e5"></i> ||
                        </font>
                        <font class="text-dark" style="<?= $menu == 40 ? '' : 'display:none;' ?>"> Presupuesto Odontograma <i class="fa fa-circle text-info"></i> ||</font>
                        <font class="text-dark"> Presupuesto Pagado <i class="fa fa-square" style="color:#80e68070"></i>
                        </font>

                        <?php
                        //Armar arreglo con los presupuestos

                        $ArregloPresupuestos[2] = "<i class='fa fa-circle' style='color:#3d8aa0'></i>"; //odontologia
                        $ArregloPresupuestos[4] = "<i class='fa fa-circle' style='color:#7b41f2'></i>"; //Facial
                        $ArregloPresupuestos[5] = "<i class='fa fa-circle' style='color:#E375FF'></i>"; //Corporal
                        $ArregloPresupuestos[6] = "<i class='fa fa-circle' style='color:#1bd6e5'></i>"; //Odontograma
                        $ArregloPresupuestos[7] = "<i class='fa fa-circle' style='color:#1BAFBF'></i>"; //Odontograma 2


                        ?>
                        <!-- <font calss="text-dark"> Presupuesto Pendiente <i class="fa fa-circle" style="color:#ffff border: black"></i> </font>|| -->
                        <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">


                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Número</th>
                                    <th>Cliente</th>
                                    <th>Fecha Presupuesto</th>
                                    <th>Fecha vencimiento</th>
                                    <th>
                                        <div align="right">Total</div>
                                    </th>
                                    <th>
                                        <div align="right">Monto Pagado</div>
                                    </th>
                                    <th>
                                        <div align="right">Monto Faltante</div>
                                    </th>
                                    <th>
                                        <div align="right">Cant.</div>
                                    </th>
                                    <th>
                                        <div align="right">Días</div>
                                    </th>
                                    <th width="10%">Presupuesto</th>
                                    <th width="10%">Abono</th>
                                    <th width="10%">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $ID = $_SESSION['ID'];
                                if (isset($_GET['clienteId']) || isset($_SESSION['cI'])) {
                                    // $idCliente =  $_GET['clienteId'];

                                    if (isset($_GET['clienteId'])) {
                                        $idCliente = decrypt($_GET['clienteId']);
                                    } else {
                                        $idCliente = $_SESSION['cI'];
                                    }


                                    $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv where idEmpresa = '{$_SESSION['ID']}' AND ID_principal = '{$_SESSION['ID_principal']}' and tipo IN (2, 4, 5, 6) and idCliente = '$idCliente' and activo = 1 order by numeroDoc");

                                    // $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idEmpresa = '{$_SESSION['ID']}' and tipo = 2 or tipo = 4 or tipo = 5 or presupuestoFC = 0 and idCliente = '$idCliente' order by numeroDoc");
                                } else {
                                    $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv where  ID_principal = '{$_SESSION['ID_principal']}' and tipo IN (2, 4, 5, 6) and activo = 1 order by numeroDoc");

                                    // $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where   tipo = 2 or tipo = 4 or tipo = 5 or presupuestoFC = 0 order by numeroDoc");
                                }


                                // $check = mysqli_num_rows($q);

                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $firma  = $fila['Firma'];
                                    $tipo   = $fila['tipo'];


                                    $idEmpresa   = $fila['idEmpresa'];
                                    $moneda = funcionMaster($_SESSION['ID_principal'], 'ID_Usuario', 'moneda', 'config');

                                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $fila[2]");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $nombre_cliente             = $rowMotorizado['nombre_cliente'];
                                        $telefono_cliente           = $rowMotorizado['telefono_cliente'];
                                    }
                                    $saldo = $fila['totalNeto'] - $fila['montoPagado'];
                                    $od_presupuesto_id =  $fila['od_presupuesto_id'];

                                    // DEIVYD: En el caso de que venga referenciado con un presupuesto de odontograma nuevo
                                    $estado_presupuesto_odontologia = 0;
                                    if ($od_presupuesto_id <> 0 && $od_presupuesto_id <> "") {
                                        $estado_presupuesto_odontologia = funcionMaster($od_presupuesto_id, "id", "estado_presupuesto", "OP_Presupuesto");
                                        $tipo = 7;
                                    }


                                    $hoy = date("Y-m-d");
                                    $vence =  $fila['fechaVencimiento'];
                                    $date1 = new DateTime($hoy);
                                    $date2 = new DateTime($vence);
                                    $diff = $date1->diff($date2);
                                    $Color = "";
                                    if ($saldo == "0") {
                                        $Color = 'style="background-color:#80e68070"';
                                    } else {
                                        //$Color = 'style="background-color:#ffff"';
                                    }
                                    /*
                  if ($tipo == "4") {
                    $TIPO_P = 'style="background-color:#77F9EF"';
                  } elseif ($tipo == "5") {
                    $TIPO_P = 'style="background-color:#E375FF"';
                  }
                  */

                                    echo '     <tr>
                  <td ' . $Color . '>' . $ArregloPresupuestos[$tipo] . ' </td>
                  <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                  <td ' . $Color . '>' . $nombre_cliente . ' </td>
                  <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                  <td ' . $Color . '>' . $fila['fechaVencimiento'] . '</td>
                  <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2) . ' ' . $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . number_format($fila['montoPagado'], 2) . ' ' . $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . number_format($saldo, 2) . ' ' . $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td>
                  <td ' . $Color . '> <div align="right">  ' . $diff->days . ' </div></td>   
                 ';
                                ?>
                                    <td width='10%' <?php echo $Color  ?>>
                                        <div class='btn-group'>
                                            <button type='button'
                                                class='btn btn-block btn-outline-info rounded-pill shadow m-1 dropdown-toggle'
                                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fa fa-bill'></i> Acciones Presupuesto
                                            </button>
                                            <div class='dropdown-menu'>
                                                <?php if ($tipo <> 7){ ?>
                                                <a class='dropdown-item' href='SclienteAdministracion_AgendarPresupuesto?id=<?= encrypt($fila[0]); ?>' target='_blank'>
                                                    <button type='button'
                                                        class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                        Agendar procedimientos
                                                    </button>
                                                </a>
                                                <?php } ?>
                                                <?php
                                                if ($tipo == 2) {
                                                ?>
                                                    <a class='dropdown-item'
                                                        href='preliminarPresupuesto.php?idOperacion=<?php echo  $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Preliminar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='imprimirPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Imprimir Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='enviarPresupuestoP.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Enviar Presupuesto
                                                        </button>
                                                    </a>
                                                <?php } ?>
                                                <?php
                                                if ($tipo == 4) {
                                                ?>
                                                    <a class='dropdown-item'
                                                        href='preliminarPresupuestoFacial.php?idOperacion=<?php echo  $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Preliminar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='imprimirPresupuestoFacial.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Imprimir Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class="dropdown-item" target="_blank"
                                                        href="<?php echo $Base; ?>preliminarPresupuestoFacial.php?idOperacion=<?php echo $fila[0]; ?>&send=true">
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Enviar Presupuesto
                                                        </button>
                                                    </a>
                                                <?php } ?>
                                                <?php
                                                if ($tipo == 5) {
                                                ?>
                                                    <a class='dropdown-item'
                                                        href='preliminarpresupuestoCorporal.php?idOperacion=<?php echo  $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Preliminar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='imprimirPresupuestoCorporal.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Imprimir Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class="dropdown-item" target="_blank"
                                                        href="<?php echo $Base; ?>preliminarpresupuestoCorporal.php?idOperacion=<?php echo $fila[0]; ?>&send=true">
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Enviar Presupuesto
                                                        </button>
                                                    </a>
                                                <?php } ?>


                                                <?php
                                                if ($tipo == 6) {
                                                ?>
                                                    <a class='dropdown-item'
                                                        href='OD_PreliminarPresupuesto.php?idOperacion=<?php echo  $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Preliminar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='OD_ImprimirPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Imprimir Presupuesto
                                                        </button>
                                                    </a>
                                                <?php } ?>

                                                <?php if ($tipo == 7) { 
                                                    
                                                    $class_bootstrap_btn_plan_atencion = $estado_presupuesto_odontologia == '1' ? 'info' : 'danger';
                                                    
                                                    $QueryCitas = "SELECT soperacioninv_id FROM citas WHERE soperacioninv_id = '{$fila[0]}'";
                                                    $ResultCitas = mysqli_query($conn3, $QueryCitas);
                                                    $numCitasAgendadas = 0;
                                                    if($ResultCitas){
                                                        $numCitasAgendadas = mysqli_num_rows($ResultCitas) ;
                                                    }
                                                    
                                                    $class_bootstrap_btn_plan_atencion = $numCitasAgendadas > 0 ? 'secondary' : $class_bootstrap_btn_plan_atencion;

                                                    ?>
                                                    <a class='dropdown-item' href='OP_Preview?id=<?=encrypt($fila[0]);?>' target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Preliminar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' href='OP_Imprimir?id=<?=encrypt($fila[0]);?>' target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                            Imprimir Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item' <?= $estado_presupuesto_odontologia == '1' ? "href='OP_PlanAtencion?id=". encrypt($fila[0]) ."'" : 'onclick="swalNoDisponible()"' ?> target='_blank'>
                                                        <button type='button' class='btn btn-block btn-outline-<?=$class_bootstrap_btn_plan_atencion?> rounded-pill shadow m-1 btn-block'>
                                                            <?= $estado_presupuesto_odontologia == '1' ? 'Plan de atencion' : 'Plan de atencion no disponible' ?> <?= $numCitasAgendadas > 0 ? ' || Procedimientos ya agendados' : '' ?>
                                                        </button>
                                                    </a>
                                                    <!-- <a class='dropdown-item' <?= $estado_presupuesto_odontologia == '1' ? "href='OP_PlanAtencion?id=". encrypt($fila[0]) ."'" : 'onclick="swalNoDisponible()"' ?> target='_blank'>
                                                        <button <?= $numCitasAgendadas > 0 ? 'disabled' : '' ?> type='button' class='btn btn-block btn-outline-<?=$class_bootstrap_btn_plan_atencion?> rounded-pill shadow m-1 btn-block'>
                                                            <?= $estado_presupuesto_odontologia == '1' ? 'Plan de atencion' : 'Plan de atencion no disponible' ?> <?= $numCitasAgendadas > 0 ? ' || Procedimientos ya agendados' : '' ?>
                                                        </button>
                                                    </a> -->
                                                <?php } ?>

                                                <!--
                          <a class='dropdown-item' href='FacturarPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>' target='_balank' onclick="ModalLlenarSerialesProductos(<?= $fila['idOperacion']; ?>)">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Facturar Presupuesto
                          </button>
                        </a>
                        

                        <a class='dropdown-item'  target='_blank' onclick="ModalLlenarSerialesProductos(<?= $fila['idOperacion']; ?>)">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Facturar Presupuesto
                          </button>
                        </a>-->
                                                <a class='dropdown-item'
                                                    href='FacturarPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>'
                                                    target='_blank'>
                                                    <button type='button'
                                                        class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                                                        Facturar Presupuesto
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td width='10%' <?php echo $Color ?>>
                                        <div class='btn-group'>
                                            <button type='button'
                                                class='btn btn-block btn-outline-success rounded-pill shadow m-1 dropdown-toggle'
                                                data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                <i class='fa fa-bill'></i> Acción Abono
                                            </button>
                                            <div class='dropdown-menu'>
                                                <?php
                                                if ($saldo == 0) {
                                                ?>
                                                    <a href="?msg=3" style="color:green">
                                                        <button type='button' class='btn btn-warning btn-block' disabled>
                                                            Presupuesto Pagado
                                                        </button>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class='dropdown-item'
                                                        href='Abono.php?idOperacion=<?php echo  $fila['idOperacion']; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                            Abonar
                                                        </button>
                                                    </a>
                                                <?php } ?>
                                                <a class='dropdown-item'
                                                    href='HistorialAbono.php?idOperacion=<?php echo $fila[0]; ?>'
                                                    target='_blank'>
                                                    <button type='button'
                                                        class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                                                        Historial de Abono
                                                    </button>
                                                </a>

                                            </div>
                                        </div>
                                    </td>

                                    <td width='10%' <?php echo $Color ?>>
                                        <?php
                                        if ($saldo > 0) {
                                            // echo var_dump($saldo);
                                        ?>
                                            <div class='btn-group'>
                                                <button type='button'
                                                    class='btn btn-block btn-outline-danger rounded-pill shadow m-1 dropdown-toggle'
                                                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='fa fa-bill'></i> Acciones de Edición
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item'
                                                        href='Editar_Presupuesto.php?idOperacion=<?php echo  $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill shadow m-1 btn-block'>
                                                            Editar Presupuesto
                                                        </button>
                                                    </a>
                                                    <a class='dropdown-item'
                                                        href='EliminarPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>'
                                                        target='_blank'>
                                                        <button type='button'
                                                            class='btn btn-block btn-outline-danger rounded-pill shadow m-1 btn-block'>
                                                            Eliminar Presupuesto
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <a href="?msg=3" style="color:green"></a>


                                        <?php } else { ?>
                                            <button type='button' class='btn btn-warning btn-block' disabled>
                                                Cotización no editable
                                            </button>
                                        <?php } ?>

                                    </td>


                                <?php
                                    echo '
                  </tr>';
                                }

                                ?>

                                <a href=""></a>
                            </tbody>
                        </table>
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
<?php include 'footer.php'; ?>

<script>
    function swalNoDisponible() {
        Swal.fire({
            icon: 'error',
            title: 'No disponible',
            text: 'Es necesario realizar la aprobacion respectiva de el presupuesto de odontograma',
        })
    }
</script>