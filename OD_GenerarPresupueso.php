<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica1 = $_GET['historiaClinica1'];
$tipo_historia  = $_GET['tipo_historia'];

$ID_Usuario  =  $_SESSION['ID'];


$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrden'])) {
  date_default_timezone_set('America/Bogota');

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Numerico';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Descuento_Textual';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Numerico';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Numerico` TEXT NULL DEFAULT '0'  COMMENT 'valor numerico del descuento *Creado desde modulo de factura*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Descuento_Textual';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Descuento_Textual` TEXT NULL DEFAULT '0'  COMMENT 'valor Original del descuento *Creado desde modulo de factura*';");
  }



  $idOperacion = 0;
  $fechaRegistro = date("Y-m-d H:i:s");
  $codigoProd = $_POST["codigoProd"];
  $cantidad = $_POST['cantidad'];

  $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
  $base = $_POST["base"];
  $impuesto = 0;

  $subTotal = $_POST["subTotal"];
  $usuario_id = $_POST['usuario_id'];
  $cliente_id = $_POST['cliente_id'];
  $tipo_historia = $_POST['tipo_historia'];
  $historia = $_POST['historia'];

  $descuento_base = $_POST['descuento'];

  $totalbase = $base * $cantidad;

  if (strpos($descuento_base, '%') !== false) {

    $descuentos = str_replace("%", "", "$descuento_base");
    $descuentos = ($descuentos / 100);
    $descuento_final = round(($totalbase * $descuentos), 2);
    //echo "porcentaje";
  } else {
    $descuento_final = $descuento_base;
    //echo "numerico";
  }

  $valor_calculado = $totalbase - $descuento_final;

  if ("$valor_calculado" != "$subTotal") {
    $subtotal = $totalbase - $descuento_final;
    $Mensaje = "[F]";
  }
  $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','6');") or die(mysqli_error($conn3));
  //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";


  $ruta = htmlentities($_SERVER['PHP_SELF']);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }
}

/*
if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];
  $historiaClinica1 = $_GET['historiaClinica1'];
  $tipo_historia  = $_GET['tipo_historia'];


  mysqli_query($conn3, "DELETE FROM sDetalleOperPendites WHERE id = '{$id}' limit 1;");

  $clienteId = $_GET["clienteId"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  echo "<script language='Javascript'>window.location='{$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&error=Se Borro el Producto'</script>";
}
*/





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
  if ($genero == "F") {
    $genero = "Femenino";
  } else {
    $genero = "Masculino";
  }
  $direccion_cliente = $rowMotorizado['direccion_cliente'];
  $telefono_cliente = $rowMotorizado['telefono_cliente'];
  $edad_cliente = $rowMotorizado['edad_cliente'];
  $profesion_cliente = $rowMotorizado['profesion_cliente'];
  $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
  $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
  $antecedentes = $rowMotorizado['antecedentes'];
  $whatsapp = $rowMotorizado['whatsapp'];
  $codigo_ciudad = $rowMotorizado['codigo_ciudad'];
  $fechaNacimiento = $rowMotorizado['fechaNacimiento'];

  $edad =  CalculoEdadPaciente($fechaNacimiento);
}

if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>

<style>
/* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
input[data-readonly_P] {
    pointer-events: none;
    background-color: #eee;
    opacity: 1;
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="box">

    <!-- /.box-header -->
    <div class="box-body">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Generar Presupuesto

        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#">Generar Presupuesto Odontograma</a></li>


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

                    <label for="nombre"><strong>Correo:</strong></label>
                    <label for="nombre"> <?php echo $correo_cliente; ?> </label>
                  </div>

                  <div class="col-md-6">
                    <label for="inputPassword4"><strong>Nombre:</strong></label>
                    <label for="nombre"><?php echo $nombre_cliente; ?> </label>
                  </div>

                  <div class="col-md-6">
                    <label for="inputAddress"><strong>Cédula:</strong></label>
                    <label for="nombre"><?php echo $CODI_CLIENTE; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong>Ciudad:</strong></label>
                    <label for="nombre"><?php echo $codigo_ciudad; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong>Fecha Registro:</strong></label>
                    <label for="nombre"><?php echo $fechar; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong>Genero:</strong></label>
                    <label for="nombre"><?php echo $genero; ?></label>
                  </div>

                  <div class="col-md-6">
                    <label for="inputAddress"><strong> Dirección Cliente:</strong></label>
                    <label for="nombre"><?php echo $direccion_cliente; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong> Teléfono :</strong></label>
                    <label for="nombre"><?php echo $whatsapp; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong> Edad :</strong></label>
                    <label for="nombre"><?php echo $edad; ?></label>
                  </div>
                  <div class="col-md-6">
                    <label for="inputAddress"><strong> Profesión :</strong></label>
                    <label for="nombre"><?php echo $profesion_cliente; ?></label>
                  </div>


                </div>
                <div class="col-md-12">
                    <hr>
                </div>
                <!-- este es un boton de un include -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalPresupuestoOdontograma" style="width:100%">
                 Procedimientos/Servicios Adjuntados para Presupuestar
                </button>
                <div class="col-md-12">
                    <hr>
                </div>

                <h4 class="card-title">Agregar Producto/Servicio</h4>
                <br>



                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" name="formularioActualizarcliente">
                  <div class="form-row">


                    <div class="form-group col-md-12">
                      <div align="left">

                        <label>Producto o Servicio </label>
                      </div>


                      <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id ?>" required>
                      <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="cargarcosto();">
                        <option value="" selected="selected">Seleccione producto</option>
                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios order by descripcion");
                        $nrowl = mysqli_num_rows($queryList);
                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $descripcion     = $row_recordset32['descripcion'];
                          $existencia      = $row_recordset32['existencia'];
                          $cliente_id      = $row_recordset32['cliente_id'];
                          $referencia      = $row_recordset32['referencia'];
                          $ID              = $row_recordset32['ID'];

                          echo "<option value='$ID'>$referencia | $descripcion | $existencia</option>";
                        }

                        ?>

                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Precio</label>
                      <div id="div-results-costo"></div>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="number" class="form-control input-lg" id="1" name="cantidad"   placeholder="cantidad" onChange="multiplicar();" required>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Descuento</label>
                      <input type="text" class="form-control input-lg" id="descuento" name="descuento" placeholder="descuento" value="0" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Subtotal</label>
                      <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="any" data-readonly_P required>
                    </div>
                     <div class="form-group col-md-2" align="center">
                       <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="GuardarDetalleOrden"> <font size="5"> <strong> + </strong>  </font></button></center>
                    </div>
                    <div class="form-group col-md-12" align="center">
                      <label style="color:#3a8bb9;">[si desea el descuento en % debera digitar al final del numero el caracter %, si es valor numerico solo digitar numeros]</label>
                     
                    </div>


                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">







                    <input type="hidden" name="tipo_cliente" valur="1">

                </form>





              </div>
            </div>

          </div>






          <div class="box">
            <div class="box-body">
              <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Descripción del producto</th>

                      <th>
                        <div align="Right">Precio</div>
                      </th>

                      <th>
                        <div align="Right">Cantidad</div>
                      </th>

                      <th>
                        <div align="center">Descuento</div>
                      </th>
                      <th>
                        <div align="Right">Total</div>
                      </th>
                      <th> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php

                      $ID = $_SESSION['ID'];

                      $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where   id_usuario =$ID and  id_cliente = $clienteId order by id");
                      //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                      $check = mysqli_num_rows($q);

                      while ($fila = mysqli_fetch_array($resultado)) {
                        //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                        $Numero++;
                        $ruta = htmlentities($_SERVER['PHP_SELF']);

                        $totalbase = $fila['totalbase'];
                        $subTotal = $fila['subTotal'];

                        $descuentoValor = $totalbase - $subTotal;

                        $detalle_presupuesto_odontograma = $fila['detalle_presupuesto_odontograma'];

                        $MasInformacion="";
                        if($detalle_presupuesto_odontograma != 0){
                            $MasInformacion = "<hr style='margin-top: 5px;margin-bottom: 5px;'>";
                            $Arreglo = json_decode($fila['Mas_Detalles_Odontograma']);
                            foreach ( $Arreglo as $key => $value) {
                                $MasInformacion .= " {$key}: " . $value." ,";
                            }
                        }
                        $MasInformacion = trim($MasInformacion,",");
                        echo '     <tr>
                    <td  width="5%">' . $Numero . ' </td>
                    <td width="30%">' . $fila[5] ." ".$MasInformacion.' </td>
                    <td width="10%"><div align="Right">' . $fila[6] . '' . $moneda . '</div></td>
                    <td width="5%"><div align="Right">' . $fila[4] . '</div></td>
                    <td width="10%"><div align="center">' . $descuentoValor . '' . $moneda . '</div></td>
                    <td width="10%"><div align="Right">' . $fila[9] . '' . $moneda . '</div></td>';

                        $fila_id = $fila["id"];
                        echo "<td width='1%'><a href='#' onclick='BorrarDetallePresupuesto($fila_id)'><i class='fa fa-trash' style='color:red'></i> </a></td>";

                        echo '</tr>';

                        $totalCant += $fila[4];
                        $totalBase +=  $fila[6];
                        $total += $fila[9];

                        $totaldesc += $descuentoValor;
                      }


                      ?>
                    </tr>


                  </tbody>

                  <thead>
                    <tr>

                      <th> </th>
                      <th> <strong>
                          <div align="Right"> Totales </div>
                        </strong>
                      </th>
                      <th>
                        <div align="Right"><?php echo $totalBase . ' ' . $moneda; ?> </div>
                      </th>
                      <th>
                        <div align="Right"><?php echo $totalCant ?></div>
                      </th>

                      <th>
                        <div align="center"><?php echo $totaldesc . ' ' . $moneda; ?> </div>
                      </th>
                      <th>
                        <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                      </th>
                      <th> </th>

                    </tr>

                    <?php
                    if ($impuestoF > 0) {
                      $impuestoF2 = $impuestoF / 100;
                      $total1 =  $total * $impuestoF2;
                      $total =  $total1 + $total;


                    ?>

                      <tr>
                        <th> </th>
                        <td> <strong>
                            <div align="Right"> Total con impuesto <?php echo $impuestoF ?>% </div>
                          </strong> </th>
                        <th>
                          <div align="Right"> </div>
                          </td>
                        <th>
                          <div align="Right"> </div>
                          </td>
                        <th>
                          <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                          </td>
                        <th> </th>

                      </tr>

                    <?php
                    } ?>


                  </thead>


                </table>

              </div>
            </div>
          </div>
          <div class="col-md-12">


            <form action="OD_TotalizarPresupuesto.php" method="POST" name="formularioActualizarcliente">
              <div class="form-row">
                <div class="form-group col-md-6">

                  <label> Fecha de vencimiento</label>
                  <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                  <br> <br>
                  <center><button type="submit" class="btn btn-block btn-danger btn-sm"> <strong> <h1>  Totalizar Presupuesto</h1> </strong> </button></center>

                </div>
                <div class="form-group col-md-6">
                  <label> Observaciones o notas</label>
                  <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                </div>



                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">





                <input type="hidden" name="tipo_cliente" valur="1">
                <input type="hidden" name="tipo" value="2">
                <input type="hidden" name="montoPagado" value="">
              </div>

            </form>


          </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>





  <?php include("footer.php") ?>
  <?php
    //arriba se agrego un boton para el modal
    $cliente_id = $_GET['clienteId']; //necesario para funcionar
    $TipoDetalle_ModalPresupuestos = "Presupuesto";
    include 'OD_ModalPresupuestos.php';
    ?>



  <script type="text/javascript">
    function multiplicar() {

      var descuentos = $("#descuento").val();

      m1 = document.getElementById("1").value;
      m2 = document.getElementById("2").value;
      r = m1 * m2;

      //console.log(descuentos);

      descuentos_final = 0;
      if (descuentos != null) {
        var existe = 0;
        var valor = descuentos.match(/%/g);
        if (valor) {
          existe = valor.length;
        }
        //console.log("existe "+existe+" estado "+valor);

        if (existe > 0) {
          descuentos = descuentos.replace('%', ' ');

          descuentos = parseFloat(descuentos);

          descuentos = (descuentos / 100);
          descuentos_final = r * descuentos;

        } else {
          descuentos_final = descuentos;
        }
      }


      r = (r - descuentos_final).toFixed(2);
      //console.log(r);

      document.getElementById("3").value = r;
    }

    function ValidarInput(campo) {
      if (!campo.checkValidity()) {
        campo.value = campo.value.slice(0, -1);
      }
      var existe = 0;
      var valor = campo.value.match(/\x2E/g);
      if (valor) {
        existe = valor.length;
      }

      var existe1 = 0;
      var valor = campo.value.match(/%/g);
      if (valor) {
        existe1 = valor.length;
      }

      if (existe > 1 || existe1.length > 1) {
        campo.value = campo.value.slice(0, -1);
      }

      if (campo.value.charAt(campo.value.length - 2) == '%') {
        campo.value = campo.value.slice(0, -1);
      }
      //console.log(existe+" "+existe1);
      //console.log(campo.value);

      multiplicar();
    }




    function cargarcosto() {
      var codigoProd = $("#codigoProd").val();
      var usuario_id = $("#usuario_id").val();

      $.ajax({
        type: "POST",
        url: "Ajax_PrecioProductoFactura.php",
        data: {
          codigoProd: codigoProd,
          usuario_id: usuario_id
        },
        success: function(response) {
          $('#div-results-costo').html(response);
        }
      });
    };

    function BorrarDetallePresupuesto(id){
        $.ajax({
            type: "POST",
            url: "OD_Ajax_Presupuesto.php",
            data: {
                id: id,
                Tipo_Consulta: "Eliminar Detalle Presupuesto"
            },
            success: function(response) {
                location.reload();
            }
        });
    }

    /*
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
    */
  </script>
  <script>
  $(document).on('focus', ".blur", function() {
    $(this).blur();
  });
</script>