<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    //Aquí creamos la tabla del corte 
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Cortes'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `Cortes` ( 
            `id` INT(11) NOT NULL AUTO_INCREMENT , 
            `Fecha` DATE NULL DEFAULT CURRENT_TIMESTAMP ,
            `Hora` TIME NULL DEFAULT CURRENT_TIMESTAMP ,
            `usuario_id` INT(11) NULL DEFAULT '0' , 
            `Turno` TEXT NULL  ,
            `descuentos` TEXT NULL,
            `impuestoBase` TEXT NULL,
            `totalBruto` TEXT NULL,
            `totalNeto` TEXT NULL,
            `montoPagado` TEXT NULL,
            `MediosPago` TEXT NULL,
            `Pos` INT(11) NULL DEFAULT '0' ,
            `Firma` LONGTEXT NULL ,
            `Notas` TEXT NULL ,
            `NumeroEnvioFirma` TEXT NULL ,
            `Ip_Local` TEXT NULL,
            `Ip_Publica` TEXT NULL,
            `Activo` INT(11) NULL DEFAULT '1' COMMENT '1-> Activo 0-> Inactivo',  
            PRIMARY KEY (`id`)) ENGINE = MyISAM;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "error en la creacion de la tabla";
            exit();
        }
    }

    $fecha = date("Y-m-d");
    $hora = date("h:i:s");

    $turno = $_POST['Turno'];
    $idUsuario = $_POST['usuario_id'];
    $descuentos = $_POST['descuentos'];
    $impuestoBase = $_POST['impuestoBase'];
    $totalNeto = $_POST['totalNeto'];
    $totalBruto = $_POST['totalBruto'];
    $montoPagado = $_POST['montoPagado'];

    $pos = $_POST['Pos']; 
    $nota = $_POST['Notas'];

    $publicIP = file_get_contents('https://ipinfo.io/ip');
    $localIP = $_SERVER['REMOTE_ADDR'];

    // tarea es la firma digital del usuario
    $tarea = $_POST['tarea']; 
    $NumeroEnvioFirma = $_POST['NumeroEnvioFirma'];
    $MedioPago = json_encode($_POST['MedioPago']);
    $AperturaCaja_id = $_POST['AperturaCaja_id'];

    $queryList = mysqli_query($conn3,"INSERT INTO Cortes (Fecha, Hora, Turno, usuario_id, descuentos, impuestoBase, totalNeto, totalBruto, montoPagado, MediosPago,Pos,Firma,notas,Ip_Local,Ip_Publica,NumeroEnvioFirma) 
                                VALUES ('$fecha', '$hora', '$turno', '$idUsuario', '$descuentos', '$impuestoBase', '$totalNeto',  '$totalBruto', '$montoPagado', '$MedioPago', '$pos', '$tarea', '$nota','$localIP','$publicIP','$NumeroEnvioFirma');") or die (mysqli_error($conn3));

    $cortex_id = mysqli_insert_id($conn3);

    mysqli_query($conn3,"UPDATE sOperacionInv set Corte = '$cortex_id' where Pos = '$pos' and Corte = '0' and idEmpresa = '$idUsuario';");

    if($tarea==""){

        $tabla_encriptado = encrypt("Cortes"); //nombre de la tabla
        $detalle_id_encriptado = encrypt($cortex_id); // nombre del id de la tabla (llave primaria)

        $mensajeW = " Sr(a) *" . trim(funcionMaster($idUsuario, 'ID', 'NOMBRE_USUARIO', 'usuarios')," ")."* Se ha Cerrado la Caja ,Para Firmarla Utilizar el Siguiente Link, Link: {$Base}ModuloFirma/Firmar.php?id={$detalle_id_encriptado}&tb={$tabla_encriptado}";
        $action = 0;

        Whatsapp_sent_cliente($linkkey, $NumeroEnvioFirma, $mensajeW, '0', $idUsuario, $NumeroEnvioFirma, $action);

    }

    $QueryApertura = mysqli_query($conn3,"UPDATE AperturaCaja set CierreCaja_id = '$cortex_id', Activo = 2 where id = '$AperturaCaja_id';");
    if ($QueryApertura) {
        if (mysqli_affected_rows($conn3) > 0) {
        } else {
            echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error con la tabla de Apertura'</script>";;
        }
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error con la tabla de Apertura'</script>";
    }
    

    //$queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error'</script>";
    } else {
        echo "<script language='Javascript'> window.location='POS_ImprimirCortePOS?id=$cortex_id'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];
$Pos = $_SESSION['POS'];

$QueryAperturaCaja = mysqli_query($conn3, "SELECT * FROM AperturaCaja WHERE usuario_id='$usuario_id' AND Pos='$Pos' AND Activo = 1 LIMIT 1");
$NrowApertura=mysqli_num_rows($QueryAperturaCaja);

if($NrowApertura>0){
    $RowAperturaCaja = mysqli_fetch_assoc($QueryAperturaCaja);
    // Acceder a los valores de montoApertura e id
    $MontoApertura = $RowAperturaCaja['MontoApertura'];
    $AperturaCaja_id = $RowAperturaCaja['id'];
}else{
  echo "
  <style>
    .blurCampo1 {
        filter: blur(5px); /* Ajusta el valor de blur según tus preferencias */
        pointer-events: none;
    }
    </style>

  <script language='Javascript'> 
  window.onload = function() {
  var corteX = document.getElementById('corteX');
  if (corteX) {
      corteX.classList.add('blurCampo1');
  }
  Swal.fire({
    title: 'Realizar Apertura de Caja',
    text: 'Espere unos segundos antes de ser redirigido a POS',
    showConfirmButton: true,
    allowOutsideClick: false, // Evita hacer clic fuera del SweetAlert para cerrarlo
    timer: 5000, // Auto-cierre después de 5 segundos
    icon: 'info'
}).then(function() {
    // Redirecciona a pos.php
    window.location.href = 'pos.php';
});

}
</script>"; 
}

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
            <li><a href="#"> Registro de Corte X </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro de Corte X </h4>
                <div class="box" id="corteX">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="control-label">Usuario de Caja</label>
                                <input class="form-control input-lg" type="text" disabled="" value="<?php echo $NOMBRE_USUARIO; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Turno</label>
                                <select id="turno" name="Turno" class="form-control select2 input-lg" style="width: 100%;" required>
                                     <option value="" selected>Seleccione un Turno </option>
                                    <option value="Matutino">Matutino </option>
                                    <option value="Vespertino">Vespertino </option>
                                    <option value="Nocturno A">Nocturno A </option>
                                    <option value="Nocturno B">Nocturno B</option>
                                    <option value="Otros">Otros </option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label">Notas</label>
                                <textarea name="Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>


                            <input type="hidden" name="Pos" value="<?php echo $Pos ?>">
                            <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['ID'] ?>">
                            <?php

                            $queryList = mysqli_query($conn3, "SELECT sum(descuentos) as descuentos,
                            sum(impuestoBase) as impuestoBase , sum(totalNeto) as totalNeto ,
                            sum(totalBruto) as totalBruto, sum(montoPagado) as montoPagado FROM  sOperacionInv where Pos = $Pos
                            and Corte = 0 and idEmpresa = '$usuario_id' ");
                            $nrowl = mysqli_num_rows($queryList);
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $impuestoBase = $rowMotorizado['impuestoBase'];
                                $totalNeto = $rowMotorizado['totalNeto'];
                                $totalBruto = $rowMotorizado['totalBruto'];
                                $montoPagado = $rowMotorizado['montoPagado'];
                                $descuentos = $rowMotorizado['descuentos'];
                            }
                            ?>
                            <input type="hidden" name="descuentos" value="<?=$descuentos?>">
                            <input type="hidden" name="impuestoBase" value="<?=$impuestoBase?>">
                            <input type="hidden" name="totalNeto" value="<?=$totalNeto?>">
                            <input type="hidden" name="totalBruto" value="<?=$totalBruto?>">
                            <input type="hidden" name="montoPagado" value="<?=$montoPagado?>">

                            Facturas Relacionadas: 
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where Pos = $Pos
                            and Corte = 0 and idEmpresa = '$usuario_id' ");
                            $nrowl = mysqli_num_rows($queryList);
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $numeroDoc = $rowMotorizado['numeroDoc'];

                                echo "#".$numeroDoc." ,";
                            }
                            ?>
                            <hr>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group card-btm-border border-success'>
                                            <label class='control-label'>Monto Apertura Caja</label>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <input type='number' class='form-control tipoPago'  name='MontoAperturaCaja' placeholder='Monto Apertura' value='<?=$MontoApertura;?>' min='0' readonly>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>

                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Medio de Pago</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Total en Caja </label>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                            while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                $MedioPago_id = $RowMedioPago['id'];
                                $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                echo "<div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group card-btm-border border-success'>
                                            <label class='control-label'>{$Nombre_MedioPago}</label>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <input type='number' class='form-control tipoPago' onchange='SumarMediosPago()' name='MedioPago[$MedioPago_id]' placeholder='{$Nombre_MedioPago}' value='0' min='0' required>
                                        </div>
                                    </div>
                                </div>";

                            }
                            ?>

                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group card-btm-border border-success">
                                        <label class="control-label"><strong>Total</strong></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" step="0.01" required="" name="" disabled="" id="totalPago1" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-12">
                                <label><strong>Firmar Corte de Caja</strong></label>
                                <div class="card card-shadow-focus border-focus p-3" style="background-color: #80808038;">
                                    



                                    <div id="signature-pad" class="signature-pad center" align="center">
                                        <div align="center"  class="signature-pad--actions">
                                        <div>
                                            <button  type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-action="clear" onclick="EliminarFirmaCorte()">Borrar</button>

                                            <button style="display:none;" type="hidden" class="btn btn-primary" data-action="change-color">Cambiar Color</button> 

                                            <button style="display:none;" type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-action="undo" onclick="verGuardar()" >Borrar Ultimo Trazo</button>
                                            <br><br>
                                        </div> 

                                    </div> 
                                    <div class="signature-pad--body">
                                        <canvas style="min-height: 300px;"></canvas>
                                    </div>
                                    <div class="signature-pad--footer">

                                        <div>
                                            <br> 
                                            <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-action="save-png" onclick="verGuardar()">Guardar Firma</button>
                                        </div>

                                    </div>
                                    <font size="1"> 
                                        <div id="div-mostrarFimra" align="center" ></div>
                                    </font>



                                    <div align="center">

                                        <input type="hidden"  name="tarea" id="tarea"   required>
                                    </div>
                                

                                    <script src="<?php echo $Base ?>firma/js/signature_pad.umd.js"></script>
                                    <script src="<?php echo $Base ?>firma/js/app.js"></script>






                                </div>
                                <hr>
                            </div>

                            <div class='col-md-12'>
                                <div class='form-group'>
                                    <label><strong>Numero para Envió de Modulo de Firma</strong></label>
                                    <input type='text' class='form-control' name='NumeroEnvioFirma' id='NumeroEnvioFirma' placeholder='57300....' oninput="verGuardar()" >
                                    <label style="color:red;font-size:14px;"><strong>*El Mensaje Solo Sera Enviado si no se Registro Firma en la Parte Superior*</strong></label>
                                </div>
                            </div>



                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="AperturaCaja_id" value="<?=$AperturaCaja_id;?>">
                            


                                <div class="col-sm-12">
                                    <br>
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Guardar_Informacion_Pagina" id="SubmitCorte" style="display:none;">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                        <br>
                                </div>

                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

if (!isset($_SESSION['POS']) || $_SESSION['POS'] == 0) {
    //echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<style>
    .blurCampo {
        filter: blur(5px); /* Ajusta el valor de blur según tus preferencias */
        pointer-events: none;
    }
    </style>

    <script>
            Swal.fire({
                title: "Iniciar Sesión en POS",
                text: "Debe Iniciar Sesión con la Lista POS Para Acceder a Esta Función.",
                icon: "warning",
                confirmButtonText: "Aceptar",
                customClass: {
                    confirmButton: "btn btn-outline-info rounded-pill shadow",
                    cancelButton: "btn btn-outline-danger rounded-pill shadow"
                },
            }).then(function() {
                
            });

            var corteX = document.getElementById("corteX");
            if (corteX) {
                corteX.classList.add("blurCampo");
            }

          </script>';
}
?>

<?php
include 'footer.php';
?>
<script>
    function SumarMediosPago() {
        let valor = 0;
        $(".tipoPago").each(function() {
            valor += Number($(this).val());
        });
        $("#totalPago1").val(valor);
    }

    function verGuardar() {
        setTimeout(function() {
            var tarea = document.getElementById('tarea').value;
            // console.log(confirmar);
            var NumeroEnvioFirma = document.getElementById('NumeroEnvioFirma').value;

            if (tarea.length > 0 || NumeroEnvioFirma.length > 0) {
                // Mostrar ambos campos si cualquiera de los dos está lleno
                document.getElementById('SubmitCorte').style.display = 'block';
            } else {
                // Ocultar ambos campos si ambos están vacíos
                document.getElementById('SubmitCorte').style.display = 'none';
            }
        }, 100);
    }

    function EliminarFirmaCorte(){
        document.getElementById('tarea').value="";
        verGuardar();
    }
    $(document).ready(function() {
        SumarMediosPago();
    });
</script>