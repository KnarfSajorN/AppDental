<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
// // $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $idOperacion      = $rowMotorizado['idOperacion'];
        $idCliente      = $rowMotorizado['idCliente'];
        $idEmpresa      = $rowMotorizado['idEmpresa'];
        $fechaOperacion      = $rowMotorizado['fechaOperacion'];
        $totalBruto      = $rowMotorizado['totalBruto'];
        $montoPagado      = $rowMotorizado['montoPagado'];
    }   
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombreF = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];
    $emailF = $rowMotorizado['emailF'];
    $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
    $licenciaF = $rowMotorizado['licenciaF'];
    $pieF = $rowMotorizado['pieF'];

    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;float: right;'>";
    }

    $Color_Resultados = $rowMotorizado['Color_Resultados'];
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nit                = $rowMotorizado['nit'];
}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

    $correo_cliente             = $rowMotorizado['correo_cliente'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $whastapp           = $rowMotorizado['whastapp'];
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$idCliente");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $whatsapp = $rowMotorizado["whatsapp"];
    $correo_cliente = $rowMotorizado["correo_cliente"];
    }
}


if (isset($_POST["Enviar_Laboratorio"])) {

    $Whatsapp = $_POST["numero_whatsapp"];
    $Correo = $_POST["correo"];

    $cliente_id = $_POST["cliente_id"];
    $id = $_POST["id"];

    $usuario_id = funcionMaster($id, 'idOperacion', 'idEmpresa', 'sOperacionInv');

    $mensajeW = " Sr(a) *" . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente') . "* Se le ha generado los resultados de la orden del laboratorio de la Empresa " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para visualizarla entrar en el siguiente link, Link: {$Base}LB_ImpresionResultadoOrden?idOperacion={$id}";
    $action = 0;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $idCliente, $usuario_id, $Whatsapp, $action);

    /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
    include 'PlantillaCorreo/funcionesPlantillas.php';

    $usuario_id = funcionMaster($id, 'idOperacion', 'idEmpresa', 'sOperacionInv');
    $titulo = "Documentos";
    $subtitulo = "Documentos Medicos - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $texto = $mensajeW . ' o puede darle click al boton que dice Resultados, Muchas gracias por su tiempo';;
    $url = ["{$Base}LB_ImpresionResultadoOrden?idOperacion={$id}"];
    $botonurl = ["Resultados"];

    $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
    ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
    $para = "{$Correo}"; //Correo

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

    // Enviarlo
    mail($para, $subtitulo, $mensaje, $cabeceras);

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    echo "<script language='Javascript'> window.location='{$ruta}?idOperacion={$id}&msg=Se ha enviado el documento correctamente'</script>";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>

<link rel="stylesheet" href="Modulos_Estilos/DatosFactura.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Orden de Laboratorio </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <div class="col-md-12">
                    <article class="postcard light red">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="<?php echo $Base ?>/Modulos_Estilos/Imagenes/IconoFactura.jpg" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h1 class="postcard__title red"><a href="#">Orden de Laboratorio</a><?php echo $Logo ?> </h1>
                            <div class="postcard__subtitle small">
                                <time>
                                    <i class="fas fa-calendar-alt mr-2"></i> <?php echo $fechaOperacion; ?>
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">

                                <div class="row invoice-info">
                                    <div class="col-sm-6 invoice-col">
                                        Empresa
                                        <address>
                                            <br>
                                            <strong> <?php echo $nombreF ?></strong><br>
                                            Licencia: <strong> <?php echo $licenciaF ?></strong><br>
                                            Nit: <?php echo $nit ?><br>
                                            Dirección: <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                                            Teléfono: <?php echo $telefonoF ?><br>
                                            Email: <?php echo $emailF ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6 invoice-col">
                                        Paciente
                                        <address>
                                            <br>
                                            <strong><?php echo $nombre_cliente ?> </strong><br>
                                            Dirección: <?php echo $direccion_cliente ?><br>
                                            Ciudad: <?php echo $ciudad_cliente ?><br>
                                            WhatsApp: <?php echo $whastapp ?><br>
                                            Email: <?php echo $correo_cliente ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                </div>

                            </div>
                            <ul class="postcard__tagbox">
                                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Laboratorio</li>
                                <!--<li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                <li class="tag__item play red">
                                    <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                                </li>-->
                            </ul>
                        </div>
                    </article>
                </div>
                <h4 class="Titulo_Pagina" style="background-color: initial;padding: 1px;"></h4>
                <div class="box">
                    <div class="box-body">

                        <table id="Tabla_Examenes" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">Nombre</th>
                                    <th scope="col" width="10%">Resultado</th>
                                    <th scope="col" width="10%">Unidades de Referencia</th>
                                    <th scope="col" width="10%">Valor de Referencia</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $queryList = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$idOperacion' AND Activo = 1 ORDER BY id ASC");
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                    $contador++;

                                    $id = $rowMotorizado['id'];
                                    $examen_id = $rowMotorizado['examen_id'];
                                    $Resultado = $rowMotorizado['Resultado'];
                                    $Nombre = $rowMotorizado['Nombre'];
                                    $Unidades_Referencia = $rowMotorizado['Unidades_Referencia'];
                                    $Valores_Referencia = PonerComillasyOtrosCaracteres($rowMotorizado['Valores_Referencia']);
                                    $CaracteristicaExamen = $rowMotorizado['CaracteristicaExamen'];
                                    $Resultado = $rowMotorizado['Resultado'];

                                    $examenrelacion_id = $rowMotorizado['examenrelacion_id'];


                                    $Arreglo_Mas_Informacion = json_decode($rowMotorizado['Arreglo_Mas_Informacion'], true);
                                    foreach ($Arreglo_Mas_Informacion as $key => $value) {
                                        if ($key == "Campo_Resultado" and $value == "Subtitulo") {
                                            $Resultado = "No Aplica Resultado Subtitulo";
                                        }
                                    }


                                    if ($Resultado == "No Aplica Resultado") {
                                        $contador = "1"; 
                                        
                                        $id_observaciones = $id;
                                        $ResultadoObservaciones = $rowMotorizado['Observaciones'];
                                        $queryList1 = mysqli_query($conn3, "SELECT examen_id, COUNT(*) as Cantidad FROM LB_ExamenCargado where examen_id='$examen_id' and examenrelacion_id='{$examenrelacion_id}' AND idOperacion = '$idOperacion' AND Activo = 1 GROUP BY examen_id");
                                        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                            $CantidadCaracteristicas = $rowMotorizado1["Cantidad"];
                                        }
                                        echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'> $Nombre</b></td></tr>";
                                    } 
                                    else if ($Resultado == "No Aplica Resultado Subtitulo") {
                                        echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                    } 
                                    else if ($Resultado == "Subtitulo") {
                                        echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'>$Nombre</b></td></tr>";
                                    }

                                    else if ($CaracteristicaExamen == "No") {
                                        $contador = "1";
                                        $CantidadCaracteristicas="1";
                                        $ResultadoObservaciones = $rowMotorizado['Observaciones'];
                                        echo "<tr><td colspan='4' align='center'><b style='font-size: 22px;'> $Nombre</b></td></tr>";
                                        echo "<tr>
                                        <td>$Nombre</td>
                                        <td class='ValorExamenColor' id='{$id}' onchange='PintarValor(this)' >$Resultado</td>
                                        <td>$Unidades_Referencia</td>
                                        <td class='valoresreferencia'>$Valores_Referencia</td>
                                                    </tr>";
                                    } else {
                                        
                                        echo "<tr>
                                        <td>$Nombre</td>
                                        <td class='ValorExamenColor' id='{$id}' onchange='PintarValor(this)' >$Resultado</td>
                                        <td>$Unidades_Referencia</td>
                                        <td class='valoresreferencia'>$Valores_Referencia</td>
                                                    </tr>";
                                    }

                                    if ($CantidadCaracteristicas == $contador and $ResultadoObservaciones != "") {
                                        echo "<tr><td colspan='4' align='center'><hr><b style='font-size: 22px;'>Observaciones:</b><br>{$ResultadoObservaciones}</td></tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <link rel="stylesheet" href="plugins/DataEditor/ckeditor.css"><!-- para que se vean las tablas del ckeditor-->
                        <br>
                        <center><button data-toggle="modal" data-target="#modalEnvio" onclick="EnviarMensaje('<?php echo $idCliente; ?>','<?php echo $idOperacion; ?>','historiaHospitalizacion','Enviar_Documento');" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow" title="Enviar Documento [WhatsApp/Correo Electronico]"><i class="iconify" data-icon="ri:whatsapp-fill" style="position: relative;right: -2px;"></i><i class="iconify" data-icon="fluent:mail-alert-16-filled" style="position: relative;left: -0.5px;"></i> <strong> Enviar Examen al Correo/WhatsApp </strong> </button> </center>
                        <br>
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_ImprimirEtiqueta?idOperacion=<?php echo $idOperacion; ?>'; "> <i class="fa fa-print"></i> <strong> Imprimir Etiquetas </strong> </button></center>
                        <br>
                        <center style="width: 100%;"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="window.location.href='LB_ImprimirEtiquetaCategorias?idOperacion=<?php echo $idOperacion; ?>'; "> <i class="fa fa-print"></i> <strong> Imprimir Etiquetas [Categorías] </strong> </button></center><br>
                         
                        <!--<center><button type="button" class="btn btn-block btn-sm btn-primary" onclick="window.location.href='LB_ImpresionResultadoOrden.php?idOperacion=<?php echo $idOperacion; ?>';"> <strong> Imprimir </strong> </button></center>-->
                        <center><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="SeleccionarDatosImprimir('<?php echo $idOperacion; ?>','LB_ExamenCargado')"> <strong> Imprimir </strong> </button></center>
                        <br>
                        <center><button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" onclick="window.location.href='LB_PacientesOrdenes?Tipo=OrdenCargada';"> <strong> Salir </strong> </button></center>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Enviar Resultados del Laboratorio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="LB_ResultadoOrden?idOperacion=<?php echo $cliente_id ?>" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="number" class="form-control" name="numero_whatsapp" value="<?php echo $whatsapp ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?php echo $correo_cliente ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <input type="hidden" name="id" id="id">
                    </div>

                    <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow submitBtn" Name="Enviar_Laboratorio">Enviar</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function EnviarMensaje(cliente_id, id) {
        document.getElementById("cliente_id").value = cliente_id;
        document.getElementById("id").value = id;
    }
</script>


<?php
include 'footer.php';
include 'LB_FiltrarExamenes.php';
?>

<script>
    function PintarValor(ValorCampo) {
       //console.log(id.innerHTML);
       var valor = ValorCampo.innerHTML;
       var id = ValorCampo.id;

        $.ajax({
            url: "LB_Ajax.php",
            method: "POST",
            data: {
                Tipo: "Buscar Valores Referencia",
                id: id,
                Valor: valor,
                Cliente_id: "<?php echo $idCliente; ?>"
            },
            success: function(data) {
                if(valor!=""){
                    $(ValorCampo).css('color', data);
                }
                console.log(data);
                //console.log(data);
            }
        })

    }

    $(document).ready(function() {
        var ValorExamenColor = document.getElementsByClassName("ValorExamenColor");
        console.log(ValorExamenColor);
        
        for (let i = 0; i < ValorExamenColor.length; i++) {
            ValorExamenColor[i].onchange();
        }
        
    });
    

</script>