<?php
include 'header.php';
include 'menu.php';
// este mensaje sale despues de crear al paciente o editarlo 
if (isset($_GET["msg"])) {
    if ($_GET["msg"] != "") {
        include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
    }
}
if (isset($_GET["error"])) {
    if ($_GET["error"] != "") {
        include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
    }
}
// Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a portada los redirija a POS, se agrega manualmente el valor en ese tabla
// $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');
$grupo = funcionMaster($_SESSION['ID_principal'], 'ID', 'menu', 'usuarios');

$QueyrGrupoMenu = mysqli_query($conn3, "SELECT * FROM  grupos  where id = $grupo ");
while ($RowGrupoMenu = mysqli_fetch_array($QueyrGrupoMenu)) {
    $PortadaPOS = $RowGrupoMenu['PortadaPOS'];
}
if ($PortadaPOS == 1) {
    echo "<script language='Javascript'> window.location='pos';</script>";
}
// [FIN] Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a portada los redirija a POS, se agrega manualmente el valor en ese tabla



$fechacitashoy = date("Y-m-d");

$queryList = mysqli_query($conn3, "SELECT * FROM  citas  where estado = 8 and estadoEspera=1  AND fecha = '$fechacitashoy' and (doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}') order by fecha asc ");
$nrowl = mysqli_num_rows($queryList);
// Verificar si hay resultados en la consulta
if ($nrowl > 0) {
    // Mostrar alerta flotante en forma de campana con la cantidad de citas
    echo '<div class="alerta-flotante" data-toggle="modal" data-target="#exampleModal">
    <span class="icono-campana">&#128276;</span>
    <span class="cantidad-citas">' . $nrowl . '</span>
  </div>';

    // Estilos CSS para la alerta flotante
    echo '<style>
    .alerta-flotante {
      position: fixed;
      top: 50px;
      right: 20px;
      width: 50px;
      height: 50px;
      background-color: #1976D2;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      z-index: 9999;
    }

    .icono-campana {
      color: white;
      font-size: 24px;
    }

    .cantidad-citas {
      position: absolute;
      bottom: -10px;
      right: -10px;
      background-color: white;
      color: #1976D2;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: bold;
    }
  </style>';
}

// ...

// JavaScript para abrir y cerrar el modal
echo '<script>
  function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  }

  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
</script>
';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-4">
    <!--100vh para que quede bien el footer-->
    <!-- Content Header (Page header) -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/js/bootstrap.min.js"></script> -->

    <!-- <section class="content-header">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>

        </ol>
    </section> -->
    <style>
        .modalcolor {
            background-color: #3390FF;
            color: white;
        }

        .cita-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }

        .cita-info {
            flex-grow: 1;
        }

        .cita-fecha-hora {
            font-weight: bold;
        }

        .cita-nombre {
            margin-top: 5px;
        }

        .cita-motivo {
            margin-top: 5px;
        }

        .btn-custom {
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-green {
            background-color: #c0ffb3;
            color: #333333;
        }

        .btn-green:hover {
            background-color: #a6e699;
        }
    </style>


    <br>
    <br>

    <div class="modal  bd-example-modal-lg" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 70vw;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agenda para Hoy <?php echo date('Y-m-d'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="card-deck row">
                        <?php

                        $ID = $_SESSION['ID'];
                        $fechahoycita = date('Y-m-d');

                        $queryList = mysqli_query($conn3, "SELECT * FROM citas WHERE estado = 8 AND estadoEspera = 1 AND (doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}') AND fecha = '$fechahoycita' ORDER BY fecha ASC");
                        $nrowl = mysqli_num_rows($queryList);
                        // $colors = ["bg-warning", "bg-primary", "bg-success", "bg-danger", "bg-secondary"]; // Colores de fondo para las citas

                        $colors = [
                            "bg-warning",
                            "bg-primary",
                            "bg-success",
                            "bg-danger",
                            "bg-secondary",
                            "bg-info",

                            "bg-primary-dark",
                            "bg-purple",
                            "bg-pink",
                            "bg-teal",
                            "bg-indigo",
                            "bg-yellow",
                            "bg-cyan",
                            "bg-gray",
                            "bg-orange"
                        ];

                        $index = 0;
                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                            $idCitas = $row_recordset32['idCitas'];
                            $doctor = $row_recordset32['doctor'];
                            $fecha = $row_recordset32['fecha'];
                            $Hora = $row_recordset32['Hora'];
                            $nombre = $row_recordset32['nombre'];
                            $telefono = $row_recordset32['telefono'];
                            $correo = $row_recordset32['correo'];
                            $motivoConsulta = funcionMaster($row_recordset32['motivoConsulta'], 'id', 'descripcion', 'Motivos_Consulta');

                            $estado = $row_recordset32['estado'];
                            $estadoAtencion = $row_recordset32['estadoAtencion'];

                            $cliente_id = $row_recordset32['idCliente'];
                            $cliente_id_codificado = encrypt($cliente_id);
                            echo '<div class="col-md-6">
                            <div class="col-12">
                              <div class="card ' . $colors[$index % count($colors)] . ' mb-4">
                                <div class="card-body" >
                                  <h5 class="card-title" style="color: black;">' . $fecha . ' - ' . $Hora . '</h5>
                                  <div><br><br></div>
                                  <h4 class=" mb-2 " style="color: black;text-align:center;">' . $nombre . '</h4>
                                  <h4 <p class="card-text " style="color: black;text-align:center;">' . $motivoConsulta . '</p> </h4><div><br></div>';

                            if ($estadoAtencion == 0) {
                                echo '<button class="btn btn-block btn-success btn-lg rounded-pill shadow" style="border-color: black;" onclick="TomarCita(' . $idCitas . ')"><strong>Tomar Cita</strong></button>';
                            } else {
                                echo ' <button class="btn btn-block btn-danger btn-lg rounded-pill shadow" style="border-color: black;" onclick="CerrarCita(' . $idCitas . ')"><strong>Cerrar Cita</strong></button>';
                                if ($cliente_id > 0) {
                                    echo '<button class="btn btn-block btn-primary btn-lg rounded-pill shadow" style="border-color: black;" onclick="window.location=\'HC_HistorialGeneral?cI=' . $cliente_id_codificado . '\'"><strong>Ver Historial</strong></button>';
                                }
                                echo ' <button class="btn btn-block btn-warning btn-lg rounded-pill shadow" style="border-color: black;" onclick="EnviarAlertaDenuevo(' . $idCitas . ')"><strong>Enviar Alerta</strong></button>';
                            }
                            echo '
                                </div>
                              </div>
                            </div>
                          </div>';
                            $index++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="content">

        <div class="card card-light">
            <div class="card-header bg-gradient-gray text-light">
                <h4 class="card-title">Accesos Directos</h3>
            </div>
            <div class="card-body center text-center row" style="justify-content: center !important;">
                <?php
                // $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');
                $grupo = funcionMaster($_SESSION['ID_principal'], 'ID', 'menu', 'usuarios');

                $QueryMenu = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id = '$grupo'");
                while ($RowMenu = mysqli_fetch_array($QueryMenu)) {

                    $Arreglo_Grupos = json_decode($RowMenu['Arreglo_Grupos']);

                    foreach ($Arreglo_Grupos as $key => $value) {
                        //echo $value;  
                        $ArregloMenuFinal = [];
                        $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
                        while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
                            $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
                        }

                        foreach ($ArregloMenu as $key1 => $value1) {
                            if ($value1["Portada"] == "1") {

                                $Arreglo["id"] = $value1["id"];
                                $Arreglo["Nombre"] = $value1["Nombre"];
                                $Arreglo["Icono"] = $value1["Icono"];
                                $Arreglo["Color"] = $value1["Color"];
                                $Arreglo["Ruta"] = funcionMaster($value1["id"], "id", "pantalla", "main_menu");
                                $Arreglo["Orden"] = $value1["Orden"];

                                $ArregloMenuFinal[$value1["Orden"]] = $Arreglo;
                            }
                        }

                        //var_dump($ArregloMenuFinal);
                        foreach ($ArregloMenuFinal as $key => $value) {
                            $ColorBoton = "";
                            if ($value["Color"] != "") {
                                $ColorBoton = "background-color:" . $value["Color"] . ";";
                            }
                            echo "<div class='col-md-1 col-sm-3 col-xs-3 col-3 p-1'>";
                            echo "<button class=' btn btn-primary btn-block w-100 h-100' title='$value[Nombre]' style='{$ColorBoton};' onclick=\"window.location.href='$value[Ruta].php'\">
                            <i class='$value[Icono]' style='font-size: 30px;'></i> 
                            </button>
                            ";
                            echo "</div>";
                        }
                    }
                }

                ?>

            </div>
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-danger">
                    <div class="inner">
                        <?php
                        $vista = funcionMaster($_SESSION['ID'], 'ID', 'vista', 'usuarios');
                        // if ($vista == "0") {
                        //     $query = mysqli_query($conn3, "SELECT COUNT(*) AS total FROM cliente WHERE 1=1 ");
                        //     //$queryCliente
                        // } else {
                        //     $query = mysqli_query($conn3, "SELECT COUNT(*) AS total FROM cliente where usuario_id = '{$_SESSION['ID']}' ");
                        //     //$queryCliente
                        // }
                        $query = mysqli_query($conn3, "SELECT COUNT(*) AS total FROM cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') ");

                        $row = mysqli_fetch_assoc($query);
                        $totalRegistros = $row['total'];
                        $monei = funcionMaster($_SESSION['ID_principal'], 'ID', 'moneda', 'config');
                        // echo "El total de registros en la tabla de clientes es: $totalRegistros";
                        ?>


                        <h4>
                            <?php echo $totalRegistros ?>
                        </h4>

                        <p class="text-bold">Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-green"> 
                    <div class="inner">
                        <?php
                        $query = mysqli_query($conn3, "SELECT SUM(montoPagado) AS totalMensual FROM sOperacionInv
                        WHERE MONTH(fechaOperacion) = MONTH(CURRENT_DATE())
                        and (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')
                        ");
                        $row = mysqli_fetch_assoc($query);
                        $totalMensualVentas = $row['totalMensual'];
                        ?>

                        <h4>
                            <?php echo number_format($totalMensualVentas) ?>
                            <?php echo $monei ?>
                        </h4>
                        <p class="text-bold">Ventas del Mes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                <style>
                    /* body{
                                background-color: ;
                            } */
                </style>


                <!-- small box -->
                <div class="small-box bg-gradient-info">
                    <div class="inner">
                        <?php
                        $query = mysqli_query($conn3, "SELECT SUM(montoPagado) AS totalMensual1 FROM sOperacionInv WHERE
                                    YEAR(fechaOperacion) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) 
                                    AND MONTH(fechaOperacion) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)
                                    and (idEmpresa = '{$_SESSION['ID']}' or idEmpresa = '{$_SESSION['ID_principal']}')
                                    ");

                        $row = mysqli_fetch_assoc($query);
                        $totalMensualVentas1 = $row['totalMensual1'];
                        ?>

                        <h4>
                            <?php echo number_format($totalMensualVentas1) ?>
                            <?php echo $monei ?>
                        </h4>

                        <p class="text-bold">Ventas del Mes Anterior</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-12">
                <!-- small box -->
                <div class="small-box bg-gradient-blue">
                    <div class="inner">
                        <?php
                        /*
                        $query = mysqli_query($conn3, "SELECT
                                (COUNT(CASE WHEN c_puntaje >= 4 AND c_puntaje <= 5 THEN 1 END) / COUNT(*) * 100) AS positivo,
                                (COUNT(CASE WHEN c_puntaje >= 1 AND c_puntaje <= 3 THEN 1 END) / COUNT(*) * 100) AS negativo
                                FROM citas where usuario_id = '{$_SESSION['ID']}'");
                        $row = mysqli_fetch_assoc($query);
                        $positivo = $row['positivo'];
                        $negativo = $row['negativo'];

                        // Ajustar los porcentajes para que sumen 100%
                        $total = $positivo + $negativo;
                        if ($total > 100) {
                            $positivo = $positivo / $total * 100;
                            $negativo = $negativo / $total * 100;
                        } elseif ($total < 100) {
                            $restante = 100 - $total;
                            if ($positivo > $negativo) {
                                $positivo += $restante;
                            } else {
                                $negativo += $restante;
                            }
                        }
                        */

                        $QueryPuntaje = mysqli_query($conn3, "SELECT c_puntaje,idCitas
                        FROM citas where ((doctor = '{$_SESSION['ID']}' or doctor = '{$_SESSION['ID_principal']}'))");
                        //$row = mysqli_fetch_assoc($query);
                        $ArregloPuntajes = []; // 👈 Inicializar
                        while ($RowPuntaje = mysqli_fetch_array($QueryPuntaje)) {
                            if ($RowPuntaje['c_puntaje'] != "") {
                                //$ArregloPuntajes[$RowPuntaje['c_puntaje']] = $ArregloPuntajes[$RowPuntaje['c_puntaje']] + 1;
                                $ArregloPuntajes[$RowPuntaje['c_puntaje']] = ($ArregloPuntajes[$RowPuntaje['c_puntaje']] ?? 0) + 1;
                            }
                        }

                        $Negativo = 0;
                        $Positivo = 0;
                        $Total = 0;
                        foreach ($ArregloPuntajes as $key => $value) {
                            if ($key <= "3") {
                                $Negativo = $Negativo + $value;
                            } else if ($key >= "4") {
                                $Positivo = $Positivo + $value;
                            }
                            $Total = $Total + $value;
                        }

                        if ($Total != 0) {
                            $PorcentajeNegativo = ($Negativo / $Total) * 100;
                            $PorcentajePositivo = ($Positivo / $Total) * 100;
                        } else {
                            // Evitar división por cero si el arreglo está vacío
                            $PorcentajeNegativo = 0;
                            $PorcentajePositivo = 0;
                        }

                        ?>





                        <h4>
                            + <?php echo number_format($PorcentajePositivo, 2) ?>%/
                            - <?php echo number_format($PorcentajeNegativo, 2) ?>%
                        </h4>

                        <p class="text-bold">Encuestas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- ./col -->



        <div class="box" style="background-color:white;padding:20px;">

            <div class="box-body ">
                <div class="row">


                    <!---->
                    <div class="col-md-6">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="toggleContent()">Crear Citas <i class="fas fa-angle-down float-right mt-2"></i></button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="toggleContent1()">Crear Pacientes <i class="fas fa-angle-down float-right mt-2"></i></button>
                    </div>


                </div>
                <div id="myContent" style="display: none;">
                    <div align="center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="GET" action="agregarCitas">
                                    <div class="col-md-12">
                                        <hr size="100" width="100%" color="#0000FF">
                                    </div>
                                    <div class="col-md-9">
                                        <select id="clienteId" name="clienteId" class="form-control select2" style="width: 100%;" required="required" onChange="verHistoria();">
                                            <option value="" selected="selected">Seleccione un Paciente</option>
                                            <?php
                                            $queryList = mysqli_query($conn3, "SELECT * FROM cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') order by nombre_cliente");
                                            $nrowl = mysqli_num_rows($queryList);
                                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                $nombre_cliente = $row_recordset32['nombre_cliente'];
                                                $cliente_id = $row_recordset32['cliente_id'];
                                                $CODI_CLIENTE = $row_recordset32['CODI_CLIENTE'];
                                                echo "<option value='$cliente_id'> $CODI_CLIENTE - $nombre_cliente</option>";
                                            }
                                            ?>
                                        </select>
                                        <div id="div-results"></div>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <i class="fa fa-glyphicon glyphicon-plus"></i> Agendar Cita <i class="fas fa-angle-down float-right mt-2"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>

                <script>
                    function toggleContent() {
                        var content = document.getElementById("myContent");
                        if (content.style.display === "none") {
                            content.style.display = "block";
                        } else {
                            content.style.display = "none";
                        }
                    }
                </script>


                <!---->
                <div class="col-md-12">
                    <hr size="100" width="100%" color="#0000FF">
                </div>
                <!---->


                <div id="myContent1" style="display: none;">

                    <?php
                    $queryList = mysqli_query($conn3, "SELECT rips FROM config where ID_Usuario = $ID");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        $ID = $row_recordset32['ID'];
                        $rips = $row_recordset32['rips'];
                        $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
                    }
                    $Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5) . '_' . $idcliente;
                    $Clave_Web = $CODI_CLIENTE . $idcliente;

                    mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");

                    $q = mysqli_query($conn3, "select MAX(cliente_id) as cliente_id from cliente");
                    $data = mysqli_fetch_array($q);
                    $clienteId = $data['cliente_id'];
                    //if ($rips == 0) { 
                    ?>
                    <div class="col-md-12 content-card">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" data-background="color" data-color="blue">
                                <div class="content">
                                    <h4 class="title p-3">
                                        Registrar Paciente
                                    </h4>

                                    <div class="description">
                                        <form action="guardarCliente_escritorio.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data" class="row p-3">
                                            <input type="hidden" name="ID_principal" value="<?= $_SESSION['ID_principal'] ?>">

                                            <div class="form-group col-md-3">
                                                <div align="left"> Tipo </div>
                                                <select id="tipo" name="tipo" class="form-control input-lg select" style="width: 100%;" required>
                                                    <option value=""> Seleccione</option>
                                                    <?= selectMaster("", "codigo", "nombre", "tipoDocumento") ?>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <div align="left"> Número de Cédula/ID</div>
                                                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" id="CODI_CLIENTE" placeholder="" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>


                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left"> Fecha de Nacimiento </div>
                                                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" onChange="verEdad();" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div align="left"> Edad <div id="div-edad"></div>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left">Nombre</div>
                                                <input type="text" class="form-control input-lg" id="primer_nombre" name="primer_nombre" placeholder="Nombre" required>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left">Apellido</div>
                                                <input type="text" class="form-control input-lg" id="primer_apellido" name="primer_apellido" placeholder="Apellido" required>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <div align="left"> Género </div>
                                                <select id="genero" name="genero" class="form-control input-lg select" style="width: 100%;" required onchange="VisualizarGenero(this.value)">
                                                    <option value="" selected> Seleccione </option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="I">Indeterminado</option>
                                                    <option value="O">Otro</option>
                                                </select>
                                            </div>

                                            <div id="Div_PreguntasFemenino" class="col-md-12 row" style="display:none;width:100%">

                                                <div class="form-group col-md-6">
                                                    <div align="left"> Fecha de ultimo parto </div>
                                                    <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Ultimo_Parto]" id="FechaUltimoParto">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div align="left"> Fecha de ultima menstruación </div>
                                                    <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Ultima_Mestruacion]" id="FechaUltimaMestruacion">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div align="left"> Numero de Embarazos </div>
                                                    <input type="number" class="form-control input-lg" name="Arreglo[Numero_Embarazos]" id="NumeroEmbarazos">
                                                </div>

                                            </div>

                                            <script>
                                                function VisualizarGenero(Genero) {
                                                    if (Genero == "F") {
                                                        document.getElementById("Div_PreguntasFemenino").style.display =
                                                            "flex";
                                                    } else {
                                                        document.getElementById("Div_PreguntasFemenino").style.display =
                                                            "none";
                                                    }
                                                }
                                            </script>



                                            <div class="form-group col-md-4">
                                                <div align="left">Sucursal del Paciente</div>

                                                <select id="sucursal_cliente" name="sucursal_cliente" class="form-control input-lg select" style="width: 100%;">
                                                    <option value=""> Seleccione </option>
                                                    <?php sucursalesSelect($_SESSION['ID']); ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <div align="left"> Correo Electrónico </div>
                                                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo">
                                            </div>


                                            <div class="form-group col-md-4" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Indicativo</strong> </font>
                                                </div>
                                                <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;" required>
                                                    <?php
                                                    //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                                                    echo selectMaster("", "numero", "numero,nombre", "indicativos");
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-8" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Número de Celular notificaciones
                                                            WhatsApp</strong></font>
                                                </div>
                                                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="">
                                            </div>
                                            <div class="form-group col-md-12">


                                                <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                                <br>
                                                <center>

                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                        <i class="fa fa-glyphicon glyphicon-plus"></i>Guardar <i class="fas fa-angle-down float-right mt-2"></i></button>


                                                </center>

                                            </div>

                                        </form>

                                    </div><!-- cierre de la descripcion-->
                                </div>
                            </div> <!-- end card -->
                        </div>
                    </div>
                    <?php /*} else {
$Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5) . '_' . $idcliente;
$Clave_Web = $CODI_CLIENTE . $idcliente;

mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");

$q = mysqli_query($conn3, "select MAX(cliente_id) as cliente_id from cliente");
$data = mysqli_fetch_array($q);
$clienteId = $data['cliente_id'];
?>

<div class="col-md-12 content-card">
<div class="card-big-shadow">
   <div class="card card-just-text" data-background="color" data-color="blue">
       <div class="content">
           <h4 class="title"><a href="#">
                   <h2> Registrar paciente</h2>
               </a></h4>
           <div class="description">

               <form action="guardarCliente_escritorio.php" method="POST"
                   name="formularioActualizarcliente" enctype="multipart/form-data">
                   <div class="form-group col-md-3">
                       <div align="left"> Tipo </div>
                       <select id="tipo" name="tipo" class="form-control input-lg select"
                           style="width: 100%;" required>
                           <option value=""> Seleccione</option>
                           <option value="RC"> RC - Registro Civil</option>
                           <option value="TI"> TI - Tarjeta de identidad</option>
                           <option value="CC"> CC - Cédula de ciudadanía</option>
                           <option value="CE"> CE - Cédula de extranjería</option>
                           <option value="PA"> PA - Pasaporte</option>
                           <option value="MS"> MS - Menor sin identificación</option>
                           <option value="AS"> AS - Adulto sin identidad</option>
                       </select>

                   </div>

                   <div class="form-group col-md-3">
                       <div align="left"> Número de Cédula/ID</div>
                       <input type="text" class="form-control input-lg" name="CODI_CLIENTE"
                           id="CODI_CLIENTE" placeholder="Cédula" required
                           onChange="VerificarDocumento(this);">
                       <div id="div-results-cedula"></div>
                   </div>

                   <div class="form-group col-md-4">
                       <div align="left"> Fecha de nacimiento </div>
                       <input type="date" class="form-control input-lg" id="fechaNacimiento"
                           name="fechaNacimiento" placeholder="Edad" onChange="verEdad();"
                           required>
                   </div>
                   <div class="form-group col-md-2">
                       <div align="left"> Edad <div id="div-edad"></div>
                       </div>
                   </div>


                   <div class="form-group col-md-6">
                       <div align="left">Primer Nombre</div>
                       <input type="text" class="form-control input-lg" id="primer_nombre"
                           name="primer_nombre" placeholder="Nombre" required>
                   </div>
                   <div class="form-group col-md-6">
                       <div align="left"> Segundo Nombre </div>
                       <input type="text" class="form-control input-lg" id="segundo_nombre"
                           name="segundo_nombre" placeholder="Segundo Nombre">
                   </div>

                   <div class="form-group col-md-6">
                       <div align="left">Primer Apellido</div>
                       <input type="text" class="form-control input-lg" id="primer_apellido"
                           name="primer_apellido" placeholder="Apellido" required>
                   </div>


                   <div class="form-group col-md-6">
                       <div align="left"> Segundo Apellido </div>
                       <input type="text" class="form-control input-lg" id="segundo_apellido"
                           name="segundo_apellido" placeholder="Segundo Apellido">
                   </div>

                   <div class="form-group col-md-4">
                       <div align="left"> Género </div>
                       <select id="genero" name="genero" class="form-control input-lg select"
                           style="width: 100%;" required>
                           <option value="" selected> Seleccione </option>
                           <option value="M">Masculino</option>
                           <option value="F">Femenino</option>
                           <option value="I">Indeterminado</option>
                           <option value="O">Otro</option>
                       </select>
                   </div>



                   <div class="col-md-4" id="pais_div">
                       <div align="left"> País </div>
                       <select name="pais" id="pais" class="form-control input-lg select2"
                           style="width: 100%;" onchange="paises(this.value);" required>
                           <option value="">Elegir opción</option>

                           <?php
                               //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                               echo selectMaster("", "Codigo", "Pais", "Paises");
                               ?>

                       </select>
                   </div>

                   <div class="col-md-4">
                       <div align="left"> Ciudad </div>
                       <select name="ciudad" id="ciudad" class="form-control input-lg select2"
                           style="width: 100%;" required>


                       </select>
                   </div>

                   <div class="form-group col-md-4">
                       <div align="left">Zona residencial </div>

                       <select id="zona" name="zona" class="form-control input-lg select"
                           style="width: 100%;" required="">
                           <option>Urbana</option>
                           <option>Rural</option>

                       </select>

                   </div>

                   <div class="form-group col-md-4">
                       <div align="left">Tipo Afiliado</div>
                       <select class="form-control input-lg select" name="tipoUsuario"
                           required>
                           <option value=""> Seleccione </option>
                           <option>Contributivo</option>
                           <option>Subsidiado</option>
                           <option>Vinculado</option>
                           <option>Particular</option>
                           <option>Otro</option>

                       </select>
                   </div>


                   <div class="form-group col-md-4" style="margin: auto;">
                       <div align="left">Entidad de Salud </div>
                       <!--     <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud">-->
                       <select id="cie" name="entidadSalud" class="form-control select2"
                           style="width: 100%;">
                           <option value="" selected="selected">Seleccione ...</option>
                           <?php
                               $queryList = mysqli_query($conn3, "SELECT * FROM administradora");


                               $nrowl = mysqli_num_rows($queryList);
                               while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                   $cod = $row_recordset32A['codigo'];
                                   $nombre = $row_recordset32A['nombre'];


                                   echo "<option value='$cod'>$cod -- $nombre </option>";
                               }

                               ?>
                       </select>
                   </div>
                   <div class="form-group col-md-4">
                       <div align="left">Sucursal del Paciente</div>

                       <select id="sucursal_cliente" name="sucursal_cliente"
                           class="form-control input-lg select" style="width: 100%;">
                           <option value=""> Seleccione </option>
                           <?php sucursalesSelect($_SESSION['ID']); ?>
                       </select>
                   </div>


                   <div class="form-group col-md-4">
                       <div align="left"> Email </div>
                       <input type="email" class="form-control input-lg" id="correo_cliente"
                           name="correo_cliente" placeholder="Correo">
                   </div>


                   <div class="form-group col-md-4" style="margin-bottom: auto;">
                       <div align="left">
                           <font color="green"> <strong>Indicativo</strong> </font>
                       </div>
                       <select id="indicativo" name="indicativo" class="form-control select2"
                           style="width: 100%;" required>
                           <?php
                               //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                               echo selectMaster("", "numero", "numero,nombre", "indicativos");
                               ?>
                       </select>
                   </div>

                   <div class="form-group col-md-4" style="margin-bottom: auto;">
                       <div align="left">
                           <font color="green"> <strong>Número de Celular notificaciones
                                   WhatsApp</strong></font>
                       </div>
                       <input type="number" class="form-control input-lg" id="Whatsapp"
                           name="whatsapp" placeholder="">
                   </div>


                   <div class="form-group col-md-12">


                       <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                       <br>
                       <center><button type="submit"
                               class="btn btn-block btn-primary btn-sm">Guardar</button>
                       </center>

                   </div>

               </form>

           </div><!-- cierre de la descripcion-->
       </div>
   </div> <!-- end card -->
</div>
</div>
<?php } */ ?>
                </div>
                <script>
                    function toggleContent1() {
                        var content = document.getElementById("myContent1");
                        if (content.style.display === "none") {
                            content.style.display = "block";
                        } else {
                            content.style.display = "none";
                        }
                    }
                </script>
                <!---->
                <div class="row" style="text-align: center">
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <?php
                        //session_start();
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }
                        $ID = $_SESSION['ID'];

                        $arrayDatos = [];
                        $Numero = 0;
                        $resultado = mysqli_query($conn3, "SELECT * FROM sinvetrios where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and estado = 'Activo'");
                        while ($fila = mysqli_fetch_array($resultado)) {
                            $Numero++;
                            // que vamos a poner en la grafica
                            array_push($arrayDatos, [$Numero . '-' . $fila[2], $fila[5]]);
                        }
                        ?>

                        <?php
                        $_GET['n'] = 1;
                        $_GET['nombre'] = 'Grafica Inventario';
                        $_GET['Tiempo'] = '800';
                        $_GET['datos'] = json_encode($arrayDatos);
                        ?>

                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Inventarios (Existencia)</h3>
                        </strong>

                    </div>

                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <tbody>
                            <?php
                            //session_start();
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                            $ID = $_SESSION['ID'];
                            $arrayDatosA = [];
                            $resultado = mysqli_query($conn3, "SELECT * FROM cliente where (ID_principal = '{$_SESSION['ID']}' || ID_principal = '{$_SESSION['ID_principal']}')");
                            $contadorM = 0; // Variable para contar los registros masculinos
                            $contadorF = 0; // Variable para contar los registros femeninos

                            while ($fila = mysqli_fetch_array($resultado)) {
                                $Sexo_P = $fila['11'];

                                if ($Sexo_P == 'M') {
                                    $contadorM++;
                                } else {
                                    $contadorF++;
                                }
                            }
                            // Agregar los datos a la gráfica
                            array_push($arrayDatosA, ['Masculino', $contadorM]);
                            array_push($arrayDatosA, ['Femenino', $contadorF]);
                            ?>
                            <?php
                            $_GET['n'] = 2;
                            $_GET['nombre'] = 'Grafica Sexo';
                            $_GET['Tiempo'] = '900';
                            $_GET['datos'] = json_encode($arrayDatosA);
                            ?>
                            <?php include 'generarGrafica.php' ?>


                            <strong>
                                <h3>Pacientes (Sexo)</h3>
                            </strong>

                    </div>
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <?php
                        //session_start();
                          if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                        $ID = $_SESSION['ID'];
                        $arrayDatosB = [];
                        $resultado = mysqli_query($conn3, "SELECT * FROM cliente where (ID_principal = '$_SESSION[ID]' or ID_principal = '$_SESSION[ID_principal]')");
                        $paises = []; // Array para almacenar los países
                        $contadorPaises = []; // Array para almacenar los contadores de cada país

                        while ($fila = mysqli_fetch_array($resultado)) {
                            $pais = $fila[66];

                            // Verificar si el país ya está en el array
                            if (in_array($pais, $paises)) {
                                // Obtener el índice del país en el array
                                $indice = array_search($pais, $paises);
                                // Incrementar el contador correspondiente al país
                                $contadorPaises[$indice]++;
                            } else {
                                // Agregar el país al array
                                array_push($paises, $pais);
                                // Inicializar el contador del país en 1
                                array_push($contadorPaises, 1);
                            }
                        }

                        // Agregar los datos a la gráfica
                        for ($i = 0; $i < count($paises); $i++) {
                            $nombrePais = $paises[$i];
                            $contador = $contadorPaises[$i];
                            array_push($arrayDatosB, [$nombrePais, $contador]);
                        }
                        ?>


                        <?php
                        $_GET['n'] = 3;
                        $_GET['nombre'] = 'Grafica Ciudad';
                        $_GET['Tiempo'] = '1000';
                        $_GET['datos'] = json_encode($arrayDatosB);
                        ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Pacientes (País)</h3>
                        </strong>

                    </div>
                    <!---->
                    <div class="col-md-6">
                        <!-- /.form-group -->

                        <?php
                        //session_start();
                         if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                        $ID = $_SESSION['ID'];

                        $arrayDatosC = [];

                        $resultado = mysqli_query($conn3, "SELECT * FROM cliente where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')");
                        $conteoEdad = []; // Array asociativo para contar las edades

                        while ($fila = mysqli_fetch_array($resultado)) {
                            $fechaNacimiento = $fila[30];

                            if (!empty($fechaNacimiento)) {
                                $edad = CalculoEdadPaciente($fechaNacimiento); // Calcular la edad a partir de la fecha de nacimiento

                                if (!isset($conteoEdad[$edad])) {
                                    $conteoEdad[$edad] = 1;
                                } else {
                                    $conteoEdad[$edad]++;
                                }
                            }
                        }

                        // Mostrar el total de edades en el resumen
                        $totalEdades = array_sum($conteoEdad);
                        // echo "Total de edades: " . $totalEdades . "<br>";

                        foreach ($conteoEdad as $edad => $conteo) {
                            array_push($arrayDatosC, [$edad, $conteo]);
                        }


                        ?>


                        <?php
                        $_GET['n'] = 4;
                        $_GET['nombre'] = 'Grafica Rango de Edades';
                        $_GET['Tiempo'] = '1100';
                        $_GET['datos'] = json_encode($arrayDatosC);
                        ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Pacientes (Rango de Edad)</h3>
                        </strong>

                    </div>
                    <!---->
                    <!---->
                    <div class="col-md-6">

                        <?php
                        //session_start();
                          if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                        $ID = $_SESSION['ID'];

                        $arrayDatosD = [];

                        $fechaInicio = "2023-01-01"; // Fecha de inicio del rango
                        $fechaFin = "2023-12-31"; // Fecha de fin del rango

                        $resultado = mysqli_query($conn3, "SELECT fecha, COUNT(*) AS total_citas 
                        FROM citas 
                        WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' 
                        and (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')
                        GROUP BY fecha");
                        while ($fila = mysqli_fetch_array($resultado)) {
                            $Numero++;
                            // Formatear la fecha en el formato "DD/MM/AAAA"
                            $fechaFormateada = date("d/m/Y", strtotime($fila[0]));
                            // que vamos a poner en la grafica
                            array_push($arrayDatosD, [$Numero . '-' . $fechaFormateada, $fila['total_citas']]);
                        }
                        ?>

                        <?php
                        $_GET['n'] = 5;
                        $_GET['nombre'] = 'Grafica Citas Generadas';
                        $_GET['Tiempo'] = '1100';
                        $_GET['datos'] = json_encode($arrayDatosD);
                        ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Citas Generadas</h3>
                        </strong>

                    </div>
                    <!---->
                    <!---->
                    <div class="col-md-6">

                        <?php
                        //session_start();
                          if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                        $ID = $_SESSION['ID'];

                        $arrayDatosE = [];

                        $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");
                        $conteoDiagnosticos = []; // Array asociativo para contar los diagnósticos por código

                        while ($fila = mysqli_fetch_array($resultado)) {
                            for ($i = 27; $i <= 30; $i++) {
                                $codigo = $fila[$i];

                                if (!empty($codigo)) {
                                    if (!isset($conteoDiagnosticos[$codigo])) {
                                        $conteoDiagnosticos[$codigo] = 1;
                                    } else {
                                        $conteoDiagnosticos[$codigo]++;
                                    }
                                }
                            }
                        }

                        // Mostrar el total de diagnósticos en el resumen
                        $totalDiagnosticos = array_sum($conteoDiagnosticos);
                        // echo "Total de diagnósticos: " . $totalDiagnosticos . "<br>";

                        foreach ($conteoDiagnosticos as $codigo => $conteo) {
                            array_push($arrayDatosE, [$codigo, $conteo]);
                        }

                        ?>

                        <?php
                        $_GET['n'] = 6;
                        $_GET['nombre'] = 'Grafica CIE-10';
                        $_GET['Tiempo'] = '1000';
                        $_GET['datos'] = json_encode($arrayDatosE);
                        ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Reporte de CIE-11</h3>
                        </strong>

                    </div>
                    <!---->
                    <!----->
                    <div class="col-md-12" style="text-align: center">
                        <strong>Panel de Encuestas</strong>
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <title>Gráfica Mixed</title>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <style>
                                canvas {
                                    max-width: 800px;
                                    max-height: 400px;
                                }
                            </style>
                        </head>

                        <body>
                            <div style="display: flex; justify-content: center;">
                                <canvas id="donaChart"></canvas>
                            </div>
                            <script>
                                <?php
                                //Se toma de la tabla de citas, el puntaje y se hace un calculo global mostrando el promedio de satisfacción
                                // Al momento de darle "ASISTIO" al cliente le llegar un mensaje con la encuesta y al llenarla se verá reflejada en este apartado
                                //by: Emma 20.06.2023


                                $fechaActual = new DateTime();
                                // Obtener el último día del mes actual
                                $ultimoDiaMes = clone $fechaActual;
                                $ultimoDiaMes->modify('last day of this month');
                                // Formatear la fecha como una cadena
                                $ultimoDiaMesString = $ultimoDiaMes->format('Y-m-d');
                                //echo "Fecha actual: " . $fechaActual->format('Y-m-d') . "<br>";
                                //echo "Último día del mes actual: " . $ultimoDiaMesString;

                                $ID = $_SESSION['ID'];
                                //$clienteId = $_GET['clienteId'];
                                if (isset($_GET['clienteId'])) {
                                    $clienteId = $_GET['clienteId'];
                                    // Procesar clienteId
                                } else {
                                    $clienteId = 0;
                                    // Manejar caso cuando no se pasa clienteId
                                }
                                /*
                            $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                            FROM citas
                            WHERE c_puntaje > '' AND fecha <= CURDATE() AND estado = 3
                            GROUP BY MONTH(fecha)
                            ");*/

                                if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
                                    $queryClienteC = " AND idCliente=" . $_SESSION['cI'];
                                } else {
                                    $queryClienteC = "";
                                }

                                $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                                FROM citas
                                WHERE c_puntaje > '' AND fecha <= '$ultimoDiaMesString' $queryClienteC
                                and (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')
                                GROUP BY MONTH(fecha)
                                ");

                                // Preparar los datos para la gráfica
                                $labels = [];
                                $values = [];
                                $totalPuntajes=0;
                                $cantidadCitas=0;

                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $mes = $fila['mes'];
                                    $cantidad = $fila['cantidad'];
                                    $promedio = $fila['promedio'];

                                    // Verificar que el promedio sea válido
                                    if ($promedio >= 1 && $promedio <= 5) {
                                        $labels[] = obtenerNombreMes($mes); // Agregar el nombre del mes al array de etiquetas
                                        $values[] = $promedio; // Agregar el promedio al array de valores

                                        // Actualizar el promedio global y la cantidad total de pacientes
                                        $totalPuntajes += $promedio * $cantidad;
                                        $cantidadCitas += $cantidad;
                                    }
                                }
                                // Calcular el promedio global
                                if ($cantidadCitas > 0) {
                                    $promedioGlobal = $totalPuntajes / $cantidadCitas;
                                } else {
                                    $promedioGlobal = 0;
                                }
                                // Función para obtener el nombre del mes en base a su número
                                function obtenerNombreMes($numeroMes)
                                {
                                    $nombresMeses = [
                                        'Enero',
                                        'Febrero',
                                        'Marzo',
                                        'Abril',
                                        'Mayo',
                                        'Junio',
                                        'Julio',
                                        'Agosto',
                                        'Septiembre',
                                        'Octubre',
                                        'Noviembre',
                                        'Diciembre'
                                    ];
                                    return $nombresMeses[$numeroMes - 1];
                                }
                                ?>
                                // Crea la gráfica utilizando Chart.js
                                var ctx = document.getElementById('donaChart').getContext('2d');
                                var mixedChart = new Chart(ctx, {
                                    type: 'line', // Cambiar el tipo de gráfico a 'line'
                                    data: {
                                        labels: <?php echo json_encode($labels); ?>,
                                        datasets: [{
                                            label: 'Nivel de Satisfacción',
                                            data: <?php echo json_encode($values); ?>,
                                            backgroundColor: 'rgba(108, 196, 54, 97)',
                                            borderColor: 'rgba(108, 196, 54, 97)',
                                            borderWidth: 2,
                                            pointRadius: 4,
                                            pointHoverRadius: 6
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: 5,
                                                stepSize: 1
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: true,
                                                labels: {
                                                    usePointStyle: true,
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>
                            <div class="row">
                                <div class="col-md-3">
                                    <p><strong> PROMEDIO MENSUAL:</strong>
                                        <?php echo number_format($promedio, 1); ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> CANTIDAD DE PACIENTES ENCUESTADOS (MES ACTUAL):</strong>
                                        <?php echo $cantidad; ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> PROMEDIO GLOBAL:</strong>
                                        <?php echo number_format($promedioGlobal, 1); ?>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> CANTIDAD DE PACIENTES ENCUESTADOS (GLOBAL):</strong>
                                        <?php echo $cantidadCitas; ?>
                                    </p>
                                </div>


                            </div>
                        </body>

                        </html>
                    </div>

                    <!----->
                    <!---->

                </div>
                <!--nUEVO-->

                <!--NUEVO-->
            </div>
            <br>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<br>
<br>
<br>
<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
   // $Sc = base64_decode("keyMaster");
   // $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
   // return $Texto;
    $clave = base64_decode("keyMaster"); // Asegúrate que esto sea una clave válida de 32 bytes para AES-256
    $metodo = "AES-256-CBC";

    // Generar un IV del tamaño adecuado
    $iv_length = openssl_cipher_iv_length($metodo);
    $iv = openssl_random_pseudo_bytes($iv_length);

    // Cifrar
    $cifrado = openssl_encrypt($valor, $metodo, $clave, 0, $iv);

    // Guardar IV junto con el texto cifrado (por ejemplo: cifrado|iv)
    return urlencode(base64_encode($cifrado . '::' . base64_encode($iv)));
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>

<script type="text/javascript">
    // SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente"
    window.addEventListener('load', () => {
        // Select2Dinamico(
        //     "#clienteIngreso", {
        //         // ... (otras configuraciones)
        //     }, false, false
        // );

        // // Agregar el evento onchange después de configurar Select2Dinamico
        // $("#clienteIngreso").on('change', function() {
        //     // Crear el objeto data con la propiedad cargarCard
        //     var data = {
        //         cliente_id: $(this).val(),
        //         usuario_id: <?= $_SESSION['ID'] ?>,
        //         cargarCard: "cargarCard" // Asegúrate de que cargarCard esté definido
        //     };

        //     verIngresos(data);
        // });
    });


    function funcionDinamica() {
        Select2Dinamico(
            "#tipoIngreso", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("estadosIngreso") ?>",
                value: "<?= Encriptar("id") ?>",
                text: "<?= Encriptar("nombreEstado") ?>",
                likeWhere: "<?= Encriptar("nombreEstado") ?>",
                order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("estado = 1") ?>",
                    value: [''],
                },
                carapter: "true",
                campoCreador: btoa(JSON.stringify({
                    nombreCreador: false,
                    conditionInsert: false,
                    conditionSelect: false,
                })),
            }, false, false
        );
    }

    function verIngresos(data) {
        data.cargarCard = "cargarCard";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function(response) {
                $('#div-Ingresos').html(response);
                $("#form-ingresos").submit(function(e) {
                    e.preventDefault();
                    var data = new FormData(this);
                    addEstado(data);
                });
            }
        });
    };

    function addEstado(data) {
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            processData: false,
            contentType: false,
            data: data,
            success: function(response) {
                let datos = JSON.parse(response);
                if (datos.status == 1) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    })
                } else {
                    alert("El estado no fue agregado");
                }
            }
        });
    }

    function verEstado(data) {
        data.cargarEstadoTipo = "cargarEstadoTipo";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function(response) {
                $('#div-campoAdicional').html(response);
            }
        });
    };

    function cerrarEstado(data) {
        data.cerrarEstado = "cerrarEstado";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function(response) {
                let datos = JSON.parse(response);
                if (datos.status) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                } else {
                    console.log(response);
                    alert("El estado no se ha Cerrado");
                }
            }
        });
    };

    function removerEstado(data) {
        data.removerEstado = "removerEstado";
        $.ajax({
            type: "POST",
            url: "consultarClienteIngresos.php",
            data: data,
            success: function(response) {
                let datos = JSON.parse(response);
                if (datos.status) {
                    verIngresos({
                        cliente_id: atob(datos.cliente_id),
                        usuario_id: <?= $_SESSION['ID'] ?>
                    });
                } else {
                    console.log(response);
                    alert("El estado no se ha Removido");
                }
            }
        });
    };
</script>
<script type="text/javascript">
    //Para que se vea los paises
    function paises(valor) {
        if (valor == "CO") {

            var pais = document.getElementById('pais_div');

            var select = document.createElement("div");
            select.innerHTML =
                '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
            select.setAttribute('id', 'departamento_div');
            select.setAttribute('class', 'col-md-4');

            pais.insertAdjacentElement("afterend", select);
            //K.C

            $('#departamento').select2();

            $.ajax({
                type: "POST",
                url: "ajax_select.php",
                data: {
                    where: "",
                    value: "codigo",
                    texto: "nombre",
                    tabla: "departamentos"
                },
                success: function(response) {
                    $('#departamento').html(response);

                }
            });

            $('#ciudad').empty();
        } else {

            $.ajax({
                type: "POST",
                url: "ajax_select.php",
                data: {
                    where: "WHERE Codigo_Pais='" + valor + "'",
                    value: "Nombre",
                    texto: "Nombre_Tildes",
                    tabla: "Ciudades"
                },
                success: function(response) {
                    $('#ciudad').html(response);

                }
            });

            var departamento = document.getElementById('departamento_div');
            if (typeof(departamento) != 'undefined' && departamento != null) {
                departamento.remove();
            }


        }
    }

    function departamento_ciudad(valor) {
        $.ajax({
            type: "POST",
            url: "ajax_select.php",
            data: {
                where: "WHERE Codigo_Departamento='" + valor + "'",
                value: "id",
                texto: "Nombre_Tildes",
                tabla: "Ciudades"
            },
            success: function(response) {
                $('#ciudad').html(response);

            }
        });
    }




























    function verHistoria() {
        // estas son las variables que enviamos

        var clienteId = $("#clienteId").val();


        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "consultarCliente.php",
            data: {
                clienteId: clienteId
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };


    $(document).ready(function() {

        //   $('#btn1').on('click', function(){






        $('#btn2').on('click', function() {
            $.ajax({
                type: "POST",
                url: "adios.php",
                success: function(response) {
                    $('#div-results').html(response);
                }
            });
        });




    });

    function Convenio(valor) {
        //ajax para cargar los convenios
        $.ajax({
            type: "POST",
            url: "ajax_rips.php",
            data: {
                entidad_id: valor,
            },
            success: function(response) {
                $('#convenio').html(response);

            }
        });
    }
    //esta funcion verifica el documento si esta repetido muestra mensaje y borra el documento
    function VerificarDocumento(valor) {
        var CODI_CLIENTE = valor;
        $.ajax({
            type: "POST",
            url: "Ajax_VerificarDocumento.php",
            data: {
                CODI_CLIENTE: CODI_CLIENTE,
            },
            dataType: "json", // Especifica que esperas una respuesta en formato JSON
            success: function(response) {
                if (response.Encontrado) {
                    // Mostrar un mensaje de éxito
                    Swal.fire({
                        title: "Éxito",
                        text: response.mensaje,
                        icon: "success",
                    }).then(() => {
                        // Recargar la página actual después de hacer clic en "OK"
                        location.reload();
                    });
                }
            }
        });
    };
    $("#CODI_CLIENTE").on('change', function() {
        VerificarDocumento(this.value);
    });


    function verEdad() {
        // estas son las variables que enviamos

        var fechaNacimiento = $("#fechaNacimiento").val();


        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "ajax_edad.php",
            data: {
                fechaNacimiento: fechaNacimiento
            },
            success: function(response) {
                $('#div-edad').html(response);

            }
        });
    };


    $(window).on("load", function() {
        $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
        $('#indicativo').select2();
    });
</script>

<script type="text/javascript">
    function TomarCita(idCita) {
        let data = {
            key: "TomarCita",
            idCitas: idCita,
            idUser: '<?= $_SESSION['ID'] ?>'

        };
        $.ajax({
            url: 'SE_AjaxCitas.php',
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    };

    function CerrarCita(idCita) {
        let data = {
            key: "cerrarCita",
            idCitas: idCita,
            idUser: '<?= $_SESSION['ID'] ?>'
        };
        $.ajax({
            url: 'SE_AjaxCitas.php',
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    };


    function EnviarAlertaDenuevo(idCita) {
        let data = {
            key: "EnviarAlertaDenuevo",
            idCitas: idCita

        };
        $.ajax({
            url: 'SE_AjaxCitas.php',
            type: 'POST',
            data: data,
            success: function(data) {
                console.log(data);
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    };
</script>