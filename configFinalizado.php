<?php

include 'header.php';
include 'menu.php';

$historiaClinica1 = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
// $nrowl = mysqli_num_rows($queryListhc);
if ($queryListhc) {
    while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $Tabla = $rowhc['name'];
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
    }
}

$queryListCliente = mysqli_query($conn3, "SELECT * FROM cliente where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and cliente_id = $cliente_id");

if ($queryListCliente) {
    while ($rowMotorizado1 = mysqli_fetch_array($queryListCliente)) {
        $whatsapp = $rowMotorizado1["whatsapp"];
        $correo_cliente = $rowMotorizado1["correo_cliente"];
    }
}

if (isset($_POST['Enviar_Firma'])) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
    // $nrowl = mysqli_num_rows($queryList);
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

            $cliente_id = $rowMotorizado['cliente_id'];
            $usuario_id = $rowMotorizado['usuario_id'];
            // $receta     = $rowMotorizado['receta'];
        }
    }


    $whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
    $nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha sugerido firmar esta historia clinica, para proceder abrir el siguiente link ' . $Base . 'firma/firmardocumento/' . $historiaClinica1 . '/' . $Tabla . '/' . $cliente_id;
    $accion = 0;

    Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);
    // echo "<script language='Javascript'> window.location='Pacientes.php';</script>";

    //$ruta = htmlentities($_SERVER['PHP_SELF']);
    //echo "<script language='Javascript'> window.location='HC_FinalizadoGeneral?&HC=" . encrypt($historiaClinica1) . "';</script>";
    echo "<script language='Javascript'> window.history.back();</script>";
}
if (isset($_POST["Boton_Firmar_Ahora"])) {
   
    echo "<script language='Javascript'> window.location='{$Base}firma/firmardocumento/{$historiaClinica1}/{$Tabla}/{$cliente_id}'</script>";
    
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
    <h1>

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> </a></li>
    </ol>
  </section> -->

    <section class="content box p-4">

        <br>
        <br>
        <div align="center">

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>cPacientes?iCr=<?= encrypt($idHistoria); ?>">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>agregarCitas?cI=<?= encrypt($cliente_id); ?>">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>

            <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>


        </div>



        <hr>


        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>cImprimir?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?= encrypt($idHistoria) ?>">
                <i class="fa fa-print"></i> Imprimir Consulta
            </a>
        </div>

        <?php
       
        $botonesImprimir = [
            ['Consulta', base64_encode($Base . 'cImprimir_plantilla.php?iC=' . encrypt($historiaClinica1) . '&iCr=' . encrypt($idHistoria) . '')],
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
        ?>


        <br>


        <div align="center" id="HistoriaPrincipal">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank"
                href="<?php echo $Base; ?>ConfigEnviarConsulta?iC=<?= encrypt($historiaClinica1) ?>&iCr=<?= encrypt($idHistoria) ?>">
                <i class="fa fa-send-o"></i> Enviar Consulta
            </a>

        </div>

        <?php if ($idHistoria == "34"):
            $HistoriaFiltro = "34";
            include 'configFinalizado_Opciones.php';
            echo "<style>#HistoriaPrincipal{display:none;}</style>";
        endif; ?>

        <div align="center">
            <hr>
        </div>



        <div align="center">




            <?php
            //foreach ($_SERVER as $key => $value) {
            //  echo " $key $value <br>";
            //}


            $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas WHERE historia_nombre='$Tabla' AND historia_id = $historiaClinica1");
            // $nrowl = mysqli_num_rows($queryList);
            if ($queryList) {
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $firma = $rowMotorizado['firma'];
                }
            }

            // echo "SELECT firma FROM  firmas WHERE historia_nombre='$Tabla' AND historia_id = $historiaClinica1" ;
            if (strlen($firma) > 10) {
                echo "<img src='$firma'>";
            } else {

                $ruta = htmlentities($_SERVER['REQUEST_URI']);
                ?>
                <!--
        <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>firma/firmardocumento/<?php echo $historiaClinica1; ?>/<?php echo $idHistoria; ?>/<?php echo $cliente_id; ?>">
          <i class="fa fa-pencil-square-o"></i> Solicitar Firma
        </a>
        -->
                <!-- <form action="<?php echo ($ruta) ?>" method="POST" name="formularioEnvioExamen">
                    <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" name="Enviar_Firma"><i
                            class="fa fa-pencil-square-o"></i>Solicitar
                        Firma</button>
                </form> -->
                <button data-toggle="modal" data-target="#modalEnvio" onclick="EnviarMensaje('<?php echo $cliente_id; ?>','<?php echo $id; ?>','<?php echo $Tabla; ?>','Enviar_Firma');" class="btn btn-outline-info btn-lg rounded-pill shadow"  title="Enviar Firma al Paciente [Whatsapp/Correo Electronico]"><i class="far fa-paper-plane" data-icon="wpf:signature"></i> Solicitar Firma</button>
                <!--<div id="div-results"></div>-->

                <?php

            }






            ?>


        </div>


    </section>









    <!--<div align="center">
  
<a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>configVerCliente.php?clienteId=<?php echo $cliente_id; ?>&historiaClinica=<?php echo $historiaClinica1 ?>&idHistoria=<?php echo $idHistoria ?>"> 
  <i class="fa fa-print"></i> Imprimir Toda la Historia
</a>
 
 

</div>-->





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
<div class="modal fade" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Enviar Documento</h4>
            </div> -->

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="<?php echo ($ruta) ?>" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="number" class="form-control" name="numero_whatsapp" value="<?= $whatsapp ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?= $correo_cliente ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="NombreTablaInformacion" id="NombreTablaInformacion">
                    </div>

                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info rounded-pill submitBtn" id="Boton_Enviar">Enviar</button>
                    <!-- <button type="submit" class="btn btn-outline-success rounded-pill submitBtn" id="Boton_Firmar_Ahora">Firmar ahora</button> -->

                    <div id="Div_Boton_Firmar_Ahora" style="float:right;"></div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("footer.php") ?>

<script type="text/javascript">
    function EnviarMensaje(cliente_id, id, NombreTablaInformacion, boton) {
        document.getElementById("cliente_id").value = cliente_id;
        document.getElementById("id").value = id;
        document.getElementById("NombreTablaInformacion").value = NombreTablaInformacion;
        if (boton == "Enviar_Documento") {
            document.getElementById("Boton_Enviar").name = boton;
            document.getElementById("Boton_Enviar").innerHTML = "Enviar Documento";
            document.getElementById("myModalLabel").innerHTML = "Enviar Documento";
            document.getElementById("Div_Boton_Firmar_Ahora").innerHTML="";
        } else if (boton == "Enviar_Firma") {
            document.getElementById("Boton_Enviar").name = boton;
            document.getElementById("Boton_Enviar").innerHTML = "Enviar Firma";
            // document.getElementById("myModalLabel").innerHTML = "Enviar Firma";

            document.getElementById("Div_Boton_Firmar_Ahora").innerHTML = "<button type='submit' class='btn btn-outline-success rounded-pill submitBtn' Name='Boton_Firmar_Ahora'>Firmar Ahora</button>";
            //document.getElementById("Div_Boton_Firmar_Ahora").innerHTML = "<button type='submit' class='btn btn-primary submitBtn' Name='Boton_Firmar_Ahora' style='background: darkcyan;'>Firmar Ahora</button>";;
        }

    }
</script>


<script type="text/javascript">
    function solicitarFirma1() {
        // estas son las variables que enviamos


        var fecha = $("#id").val();
        //        var Hora = $("#Hora").val();
        //        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "ajax_solicitarFirma.php",
            data: {
                id: id
            },
            success: function (response) {
                $('#div-results').html(response);

            }
        });
    };
</script>