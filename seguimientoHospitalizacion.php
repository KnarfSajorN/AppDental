<?php
include 'header.php';
header('Content-type: text/html; charset=UTF-8');
include 'menu.php'; ?>
<?php
//  $clienteId = $_GET['clienteId']; 
$usuarioId = $_GET['usuarioId'];

$ID_Usuario  =  $_SESSION['ID'];
$fecha    = date("Y-m-d");
$hora     = date("H:i:s");

$historiaClinica1 = $_GET['historiaClinica1'];
$clienteId = $_GET['cliente'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

if ($_POST['evolucion'] && !$_POST['editar']) {
    $historiaClinica1 = $_POST['historiaid'];
    $idDoctor = $_POST['id_usuario'];
    $idCliente = $_POST['idcliente'];
    $evolucion = $_POST['evolucion'];
    $queryResult = mysqli_query($conn3, "INSERT INTO seguimientoHospitalizacion SET idCliente = $idCliente, idDoctor = $idDoctor, idHistoria = $historiaClinica1, evolucion = '$evolucion'");
    if (!$queryResult) {
        var_dump(mysqli_error_list($conn3));
    } else {
        echo '<script>location.href = "seguimientoHospitalizacion.php?historiaClinica1=' . $historiaClinica1 . '&cliente=' . $clienteId . '"</script>';
    }
}

if ($_POST['editar']) {
    $historiaClinica1 = $_POST['historiaid'];
    $idDoctor = $_POST['id_usuario'];
    $idCliente = $_POST['idcliente'];
    $evolucion = $_POST['evolucion'];
    $id = $_POST['editar'];
    $queryResult = mysqli_query($conn3, "UPDATE seguimientoHospitalizacion SET evolucion = '$evolucion' WHERE id = $id AND idCliente = $idCliente AND idDoctor = $idDoctor AND idHistoria = $historiaClinica1");
    if (!$queryResult) {
        var_dump(mysqli_error_list($conn3));
    } else {
        echo '<script>location.href = "seguimientoHospitalizacion.php?historiaClinica1=' . $historiaClinica1 . '&cliente=' . $clienteId . '"</script>';
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
}

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $empresa = $rowMotorizado['empresa'];

    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $antecedentes     = $rowMotorizado['antecedentes'];
    $fotoperfil       = $rowMotorizado['fotoperfil'];
    $tiposSangre      = $rowMotorizado['tiposSangre'];
    $esDonante        = $rowMotorizado['esDonante'];
    $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

    $entidadSalud     = $rowMotorizado['entidadSalud'];
    $seguro           = $rowMotorizado['seguro'];

    $nota           = $rowMotorizado['nota'];
    $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
    $alergias           = $rowMotorizado['alergias'];

    $peso           = $rowMotorizado['peso'];
    $altura           = $rowMotorizado['altura'];
    $imc           = $rowMotorizado['imc'];
    $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];

    $ap1            = $rowMotorizado['ap1'];
    $ap2            = $rowMotorizado['ap2'];
    $ap3            = $rowMotorizado['ap3'];
    $ap4            = $rowMotorizado['ap4'];
    $ap5            = $rowMotorizado['ap5'];
    $ap6            = $rowMotorizado['ap6'];
    $ap7            = $rowMotorizado['ap7'];
    $ap8            = $rowMotorizado['ap8'];
    $ap9            = $rowMotorizado['ap9'];

    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
    $whatsapp       = $rowMotorizado['whatsapp'];
    $tipoUsuario    = $rowMotorizado['tipoUsuario'];
    $estado         = $rowMotorizado['estado'];
    $nacionalidad        = $rowMotorizado['nacionalidad'];
    $estadocivil = $rowMotorizado['estado'];
}


if ($_GET['edit']) {
    $id = $_GET['edit'];
    $queryList = mysqli_query($conn3, "SELECT * FROM seguimientoHospitalizacion where id = $id AND idCliente= '$clienteId' and  idHistoria='$historiaClinica1' order by id desc");
    //  echo "SELECT * FROM  historiaClinica1 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC";
    $nrowl = mysqli_num_rows($queryList);

    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $evolucion          = $row_recordset32['evolucion'];
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">

        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
        </head>
        <h1>
            Seguimientos
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
            <li><a href="#">Generar Registro de seguimiento</a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="form-row">


                            <div class="col-md-6">
                                <label for="inputPassword4"><strong>Nombre:</strong></label>
                                <label for="nombre"><?php echo $nombre_cliente; ?> </label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Cédula o ID:</strong></label>
                                <label for="nombre"><?php echo $CODI_CLIENTE; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong> Edad :</strong></label>
                                <label for="nombre"><?php echo calculaedad($fechaNacimiento); ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong> Dirección:</strong></label>
                                <label for="nombre"><?php echo $direccion_cliente; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong> Teléfono:</strong></label>
                                <label for="nombre"><?php echo $telefono_cliente; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Genero:</strong></label>
                                <label for="nombre"><?php echo $genero; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Fecha Nacimiento:</strong></label>
                                <label for="nombre"><?php echo $fechaNacimiento; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Nacionalidad:</strong></label>
                                <label for="nombre"><?php echo $nacionalidad; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Estado Civil:</strong></label>
                                <label for="nombre"><?php echo $estadocivil; ?></label>
                            </div>


                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Correo:</strong></label>
                                <label for="nombre"><?php echo $correo_cliente; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Ciudad:</strong></label>
                                <label for="nombre"><?php echo $ciudad_cliente; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Fecha de Registro:</strong></label>
                                <label for="nombre"><?php echo $fechar; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>Entidad de Salud:</strong></label>
                                <label for="nombre"><?php echo $entidadSalud; ?></label>
                            </div>

                            <div class="col-md-6">
                                <label for="inputAddress"><strong>¿Como se enteró?:</strong></label>
                                <label for="nombre"><?php echo $acompananteFamiliar; ?></label>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <br> <br>
                            <label><strong>Toma algún medicamento:</strong></label> <br>
                            <label><?php echo $tomaMedicamento; ?></label>
                        </div>
                        <div class="form-group col-md-2" align="right">
                            Alergias a las aines <?php echo sino($ap1) ?>
                        </div>

                        <div class="form-group col-md-2" align="right">
                            Asma <?php echo sino($ap2) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            HTA <?php echo sino($ap3) ?>
                        </div>

                        <div class="form-group col-md-2" align="right">
                            Diabetes <?php echo sino($ap4) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            Hipotiroidismo <?php echo sino($ap5) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            Tabaquismo <?php echo sino($ap6) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            Licor <?php echo sino($ap7) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            Otras Alergias <?php echo sino($ap8) ?>

                        </div>

                        <div class="form-group col-md-2" align="right">
                            Cirugías <?php echo sino($ap9) ?>

                        </div>

                        <form action="seguimientoHospitalizacion.php?historiaClinica1=<?= $historiaClinica1 ?>&cliente=<?= $clienteId ?>" method="POST" name="formularioActualizarcliente " enctype="multipart/form-data">
                            <div class="row" style="margin: 0 0 10px 0;">
                                <div class="col-md-12">
                                    <label for="evolucion">Evolucion</label>
                                    <textarea name="evolucion" class="form-control input-lg" id="evolucion" cols="15" rows="10" style="height: 200px;"><?= $evolucion ?></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                            <input type="hidden" name="idcliente" value="<?php echo $clienteId ?>">
                            <input type="hidden" name="historiaid" value="<?php echo $historiaClinica1 ?>">
                            <?php
                            if ($_GET['edit']) {
                            ?>
                                <input type="hidden" name="editar" value="<?= $_GET['edit'] ?>">
                            <?php
                            }
                            ?>
                            <input type="hidden" name="tipo_cliente" valur="1">
                            <div class="col-md-12" align="center">
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div>
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">

                        <div class="form-row">

                            <?php

                            $queryList = mysqli_query($conn3, "SELECT * FROM seguimientoHospitalizacion where idCliente= '$clienteId' and  idHistoria='$historiaClinica1' order by id desc");
                            //  echo "SELECT * FROM  historiaClinica1 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC";
                            $nrowl = mysqli_num_rows($queryList);

                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                $Fecha              = explode(" ", $row_recordset32['created_at']);
                                $evolucion          = $row_recordset32['evolucion'];
                                $id          = $row_recordset32['id'];
                            ?>
                                <hr align="center" size="10" width="100%" color="#000000">

                                <div align="right" class="col-md-12">
                                    Fecha <?php echo $Fecha[0] . '-' . $Fecha[1] ?>
                                </div>

                                <div class="container-fluid row">
                                    <div class="col-md-12">
                                        <?php if (strlen($evolucion) > 0) : ?>
                                            <div>
                                                <label>Seguimiento:</label>
                                                <?php echo $evolucion ?>
                                            </div> <br>
                                        <?php endif ?>
                                    </div>
                                </div>


                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">

                                        <td width="100%">

                                            <!--<a href="confirmarEliminarSeguimiento.php?IDm='.$idm.'&cliente='.$idC.'&historia='.$idH.'"  title="Eliminar Seguimiento"><i class="fa fa-remove"></i> </a>  -->
                                            <a href="seguimientoHospitalizacion.php?historiaClinica1=<?= $historiaClinica1 ?>&cliente=<?= $clienteId ?>&edit=<?= $id ?>" title="Modificar Seguimiento"><i class="fa fa-pencil"></i> MODIFICAR SEGUIMIENTO</a>
                                            <!-- <a href="imprimirSeguimientoCirugia.php?IDm='.$idm.'&cliente='.$idC.'&historia='.$idH.'"  title="Imprimir Seguimiento"><i class="fa fa-print"></i> </a> -->

                                        </td>

                                        </tr>
                                    </table>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                        <!-- /.tab-pane -->

                    </div>

                </div>
            </div>




            <!--
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Fecha</th>
              
              <th>SEGUIMIENTO</th>
              <th>EVOLUCION</th>
              <th>TAREAS</th>
              <th>COMPROMISOS</th>
              <th>ARCHIVOS</th>

             
              <?php echo $historia;
                ?>

              <th> </th>
               
            </tr>
            </thead>
            <tbody>
              <tr>
<?php

$ID = $_SESSION['ID'];
$cliente = $_GET['cliente'];



$resultado = mysql_query("SELECT * FROM  seguimiento s, archivos a  where s.cliente_id= '$clienteId' and  s.historia_id='$historiaClinica1' and s.id=a.idsegui");
echo "SELECT * FROM  seguimiento s, archivos a  where s.cliente_id= '$clienteId' and  s.historia_id='$historiaClinica1' and s.id=a.idsegui";
//$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
$check = mysql_num_rows($q);

while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
    $idm = $fila[0];
    $idC = $fila[1];
    $idH = $fila[3];

    $Numero++;

    echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="10%">' . $fila[4] . ' </td>
                   <td width="10%">' . $fila[8] . ' </td>
                 
                  <td width="15%">' . $fila[5] . ' </td>
                  <td width="20%">' . $fila[6] . ' </td>
                  <td width="20%">' . $fila[7] . ' </td>
                 <td width="20%">' . $fila[13] . ' </td>
                  <td width="10%">  
                   
                   <a href="confirmarEliminarSeguimiento.php?IDm=' . $idm . '&cliente=' . $idC . '&historia=' . $idH . '"  title="Eliminar Seguimiento"><i class="fa fa-remove"></i> </a>  
                  

                  </td>
           
                </tr>';
}


?>
           </tr>

 
            </tbody>

             

          </table>

        </div> -->






            <!--<div align="left" class="form-group col-md-12">
<label> Observaciones o notas</label>
     <textarea id="nota" name="nota"  class="textarea" placeholder="Observaciones o Notas" 
     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
             
              </div>  -->

            <!--  <div align="center">
  
<a class="btn btn-app" target="_blank" href="<?php echo $Base; ?>imprimirRecetario.php?cliente=<?php echo $clienteId; ?>"> 
  <i class="fa fa-print"></i> Imprimir Receta
</a>

 
 

</div> -->



            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>





<?php include("footer.php") ?>




<script type="text/javascript">
    function multiplicar() {
        m1 = document.getElementById("1").value;
        m2 = document.getElementById("2").value;
        r = m1 * m2;




        document.getElementById("3").value = r;
    }




    function cargarcosto() {
        var codigoProd = $("#codigoProd").val();
        var usuario_id = $("#usuario_id").val();

        $.ajax({
            type: "POST",
            url: "ajax_cargarPrecio.php",
            data: {
                codigoProd: codigoProd,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results-costo').html(response);
            }
        });
    };

    function agergarItem() {

        // estas son las variables que enviamos

        var codigoProd = $("#codigoProd").val();
        var cantidad = $("#cantidad").val();
        var valor = $("#valor").val();

        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_agregarItem.php",
            data: {
                codigoProd: codigoProd,
                cantidad: cantidad,
                usuario_id: usuario_id,
                valor: valor
            },
            success: function(response) {
                $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo     



            }
        });
    };

    function eliminarItem() {

        // estas son las variables que enviamos

        var idOper = $("#idOper").val();

        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "eliminarItem.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo     



            }
        });
    };

    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo     
            }
        });
    };
    window.onload = listaItem;
</script>