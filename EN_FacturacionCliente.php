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

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Copago';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Copago` TEXT NULL DEFAULT '0'  COMMENT 'valor procentaje copago solo aplica para facturacion cliente_entidad *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Tarifa_Convenio';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Tarifa_Convenio` TEXT NULL DEFAULT '0'  COMMENT 'id de la tarifa rips_tarifa *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Copago';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Copago` TEXT NULL DEFAULT '0'  COMMENT 'valor procentaje copago solo aplica para facturacion cliente_entidad *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Tarifa_Convenio';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Tarifa_Convenio` TEXT NULL DEFAULT '0'  COMMENT 'id de la tarifa rips_tarifa *Creado desde modulo de factura_cliente_entidad*';");
  }



  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Valor_Tarifa_Completa';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Valor_Tarifa_Completa` TEXT NULL DEFAULT '0'  COMMENT 'valor de la tarifa completa *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Valor_Tarifa_Completa';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Valor_Tarifa_Completa` TEXT NULL DEFAULT '0'  COMMENT 'valor de la tarifa completa *Creado desde modulo de factura_cliente_entidad*';");
  }






  $Tarifa_id = $_POST['Tarifa_id'];
  $Copago = funcionMaster($Tarifa_id, 'id', 'Copago', 'Rips_Tarifa');

  $idProducto = funcionMaster($Tarifa_id, 'id', 'inventario_id', 'Rips_Tarifa');

  $idOperacion = 0;
  $fechaRegistro = date("Y-m-d H:i:s");
  $codigoProd = $idProducto;
  $cantidad = $_POST['cantidad'];

  $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
  $base = $_POST["base"];

  $Valor_Tarifa_Completa = funcionMaster($Tarifa_id, 'id', 'Valor', 'Rips_Tarifa');

  $impuesto = 0;

  $subTotal = $_POST["subTotal"];
  $usuario_id = $_POST['usuario_id'];
  $cliente_id = $_POST['cliente_id'];

  $descuento_base = $_POST['descuento'];

  $totalbase = round($base * $cantidad, 2);

  $SinvDep_id = funcionMaster($Tarifa_id, 'id', 'SinvDep_id', 'Rips_Tarifa');
  $Deposito_id = $_POST['dep'];

  if (strpos($descuento_base, '%') !== false) {

    $descuentos = str_replace("%", "", "$descuento_base");
    $descuentos = ($descuentos / 100);
    $descuento_final = round(($totalbase * $descuentos), 2);
    //echo "porcentaje";
  } else {
    $descuento_final = $descuento_base;
    //echo "numerico";
  }

  $valor_calculado = round($totalbase - $descuento_final, 2);

  if ("$valor_calculado" != "$subTotal") {
    $subtotal = round($totalbase - $descuento_final, 2);
    $Mensaje = "[F]";
  }


  ////////////////////apartado iva
  $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
  if ($iva != "" and $iva != "0") {
    // Calcular el monto del IVA
    $ivaMonto = round((($subTotal * $iva) / 100), 2);

    // Sumar el monto del IVA al subtotal
    $totalConIva = round($subTotal + $ivaMonto, 2);
  } else {
    $iva = 0;
    $ivaMonto = 0;
    $totalConIva = round($subTotal, 2);
  }
  //////////////////////////////////

  $TipoFactura=9;  

  $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total
  ,Copago,Tarifa_Convenio,Valor_Tarifa_Completa) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','$TipoFactura','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva'
  ,'$Copago','$Tarifa_id','$Valor_Tarifa_Completa');") or die(mysqli_error($conn3));


  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }
}


if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];


  mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");

  $clienteId = $_GET["clienteId"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  echo "<script language='Javascript'>window.location='{$ruta}?clienteId={$clienteId}&error=Se Borro el Producto'</script>";
}



















if (isset($_POST['GuardarDetalleOrdenPaquete'])) {
  date_default_timezone_set('America/Bogota');

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Paquete_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Paquete_id` TEXT NULL DEFAULT '0'  COMMENT 'id del paquete rips_paquete *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Paquete_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Paquete_id` TEXT NULL DEFAULT '0'  COMMENT 'id del paquete rips_paquete *Creado desde modulo de factura_cliente_entidad*';");
  }

  
  $queryList=false;

  $Paquete_id = $_POST['Paquete_id'];
  $Deposito_id = $_POST['dep'];
  $cliente_id = $_POST['cliente_id'];

  $QueryTarifas = mysqli_query($conn3, "SELECT * FROM Rips_Tarifa WHERE paquete_id = '$Paquete_id' AND deposito_id = '$Deposito_id' AND Activo = '1' ");
  if ($QueryTarifas) {
  
  while ($RowTarifas = mysqli_fetch_array($QueryTarifas)) {

    $Tarifa_id = $RowTarifas['id'];
    $Copago = $RowTarifas['Copago'];
    $idProducto = $RowTarifas['inventario_id'];

    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $codigoProd = $idProducto;
    $cantidad = "1";

    $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));

    $Valor_Tarifa_Completa = funcionMaster($Tarifa_id, 'id', 'Valor', 'Rips_Tarifa');

    $Valor = $RowTarifas['Valor'];
    $Copago = $RowTarifas['Copago'];

    $ValorFinal = round($Valor*($Copago/100),2);
    $base = $ValorFinal;
    $impuesto = 0;

    $subTotal = $ValorFinal*$cantidad;
    $usuario_id = $_POST['usuario_id'];
    $cliente_id = $_POST['cliente_id'];

    $descuento_base = "0";

    $totalbase = round($base * $cantidad, 2);

    $SinvDep_id = funcionMaster($Tarifa_id, 'id', 'SinvDep_id', 'Rips_Tarifa');
    

    if (strpos($descuento_base, '%') !== false) {

      $descuentos = str_replace("%", "", "$descuento_base");
      $descuentos = ($descuentos / 100);
      $descuento_final = round(($totalbase * $descuentos), 2);
      //echo "porcentaje";
    } else {
      $descuento_final = $descuento_base;
      //echo "numerico";
    }

    $valor_calculado = round($totalbase - $descuento_final, 2);

    if ("$valor_calculado" != "$subTotal") {
      $subtotal = round($totalbase - $descuento_final, 2);
      $Mensaje = "[F]";
    }


    ////////////////////apartado iva
    $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
    if ($iva != "" and $iva != "0") {
      // Calcular el monto del IVA
      $ivaMonto = round((($subTotal * $iva) / 100), 2);

      // Sumar el monto del IVA al subtotal
      $totalConIva = round($subTotal + $ivaMonto, 2);
    } else {
      $iva = 0;
      $ivaMonto = 0;
      $totalConIva = round($subTotal, 2);
    }
    //////////////////////////////////

    $TipoFactura=9;  

    ////////////////////?filtro si es lote pero vencido no se deja agregar /////////////////////////////
    $Crear="0";
    $FechaHoy = date('Y-m-d');

    $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $idProducto");
    if ($QueryInventario) {
      while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
           $tipo = $RowInventario['tipo'];
       }
    }
       

       $TipoInventarioCodigo = funcionMaster($tipo,'id','tipo','scategoria');

       $FechaVencimiento="";
       if($TipoInventarioCodigo=="5"){
        $FechaVencimiento = funcionMaster($SinvDep_id, 'id', 'fechaVencimiento', 'SinvDep');

        // Añade la condición para verificar si la fecha de vencimiento es mayor que hoy
        if (strtotime($FechaVencimiento) > strtotime($FechaHoy)) {
          $Crear="1";
        }else{
          $Crear="0";
        }
       }
       else{
        $Crear="1";
       }

       if($Crear=="1"){

        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
        subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total
        ,Copago,Tarifa_Convenio,Paquete_id,Valor_Tarifa_Completa) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
        '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','$TipoFactura','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva'
        ,'$Copago','$Tarifa_id', '$Paquete_id','$Valor_Tarifa_Completa');") or die(mysqli_error($conn3));
       }
  }
}

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }

}






















$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];
}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];

  $entidad_id = $rowMotorizado['entidad_id'];
  $convenio_id = $rowMotorizado['convenio_id'];
  $convenio_id_cliente_factura = $rowMotorizado['convenio_id'];
}
}


if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

if($convenio_id == "0" || $convenio_id == ""){
  //alerta que debe ingresar convenio y devolverlo a la pagina EN_TablaPacientes
  echo "<script> alert('Debe Ingresar Un Convenio'); window.location='EN_TablaPacientes.php'; </script>";
}else{
  $MensajeEntidadContrato = "<b>Entidad:</b> [ " . funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades') . " ] | <b>Contrato:</b> [ " . funcionMaster($convenio_id, 'id', 'Nombre', 'Rips_Convenio') . " ] ";
  
  $TipoConvenio = funcionMaster($convenio_id, 'id', 'Tipo_Contrato', 'Rips_Convenio');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id = "0";
//9-> factura convenios cliente
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = $clienteId AND tipo = '9' order by id");
if ($resultado) {
  while ($fila = mysqli_fetch_array($resultado)) {
  $Deposito_id = $fila["Deposito_id"];
  }
}

if ($Deposito_id != "0" and $Deposito_id != "") {
  $DesabilitarDep = "readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<style>
  /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
  input[data-readonly_P] {
    pointer-events: none;
    background-color: #eee;
    opacity: 1;
  }

  /* no eliminar  IMPORTANTE */
  input[data-readonly_MontoRestante] {
    pointer-events: none;
    background-color: #eee;
    opacity: 1;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <div>

    <!-- /.box-header -->
    <div>

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Generar Factura Cliente Entidad
        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#">Generar Factura Cliente Entidad</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div>
          <div class="col-xs-12">

            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">

                <?php echo datosPacientesReducido($clienteId); ?>

              </div>

              <div class='col-md-12' align="center">
                                <h2><?= $MensajeEntidadContrato; ?></h2>
              </div>



              <br>

              <?php
                if($TipoConvenio=="1" OR $TipoConvenio=="4"):
              ?>

              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Simple_Formulario">
                <div class="form-row row">




                
                  <div class="form-group col-md-12">
                    <label><strong> Depósito</strong></label>
                    <select class="input-lg form-control select2" name="dep" id="deposito" onchange="BuscarTarifasConDeposito()" <?= $DesabilitarDep; ?> required>
                      <?php
                      $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                      if ($queryListDP) {
                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                          $idDP = $rowMotorizadoDP['id'];
                          $descripcionDP = $rowMotorizadoDP['descripcion'];

                          if ($Deposito_id != "" and $Deposito_id == $idDP) {
                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                          } else {
                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                          }
                        }
                      }
                      
                      ?>
                    </select>
                    <?php
                    if ($DesabilitarDep != "") {
                      echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                            e.preventDefault(); // Evita que se abra el menú desplegable
                            this.blur(); // Quítale el enfoque al elemento
                        });
                        window.onload = function () {
                          BuscarTarifasConDeposito();
                        }
                        </script>';
                    }
                    ?>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                      <div align="left">
                        <label>Tarifa</label>
                      </div>

                      <select id="Tarifa_id" name="Tarifa_id" class="form-control select2" style="width: 100%;" required="required" onchange="CargarPrecio()">
                        <option value="" selected="selected">Seleccione Tarifa</option> 

                      </select>
                    </div>
                    <div id="Campo_Adicional_Producto" class="col-md-12">

                    </div>
                  </div>

                  <div class="form-group col-md-3">
                    <div align="left">
                      <label> Precio </label>
                    </div>
                    <input type="number" step="0.01" class="form-control input-lg blur" id="2" name="base" placeholder="precio" onchange="multiplicar();" value="" data-readonly_P required>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Cantidad</label>
                    <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" required>
                    <div align="left" id="informacion_existencia"></div>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Descuento</label>
                    <input type="text" class="form-control input-lg" id="descuento" value="0" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Subtotal</label>
                    <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                  </div>




                  <div class="form-group col-md-2" align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrden">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>




                  <div class="form-group col-md-12" align="center">
                    <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                  </div>


                  <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                </div>
              </form>

              <?php
                endif;
              ?>











<?php
                if($TipoConvenio=="2"):
              ?>

              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Simple_Formulario">
                <div class="form-row row">




                
                  <div class="form-group col-md-12">
                    <label><strong> Depósito</strong></label>
                    <select class="input-lg form-control select2" name="dep" id="deposito" onchange="BuscarPaquetesConDeposito()" <?= $DesabilitarDep; ?> required>
                      <?php
                      $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                      if ($queryListDP) {
                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                          $idDP = $rowMotorizadoDP['id'];
                          $descripcionDP = $rowMotorizadoDP['descripcion'];

                          if ($Deposito_id != "" and $Deposito_id == $idDP) {
                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                          } else {
                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                          }
                        }
                      }
                      
                      ?>
                    </select>
                    <?php
                    if ($DesabilitarDep != "") {
                      echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                            e.preventDefault(); // Evita que se abra el menú desplegable
                            this.blur(); // Quítale el enfoque al elemento
                        });
                        window.onload = function () {
                          BuscarPaquetesConDeposito();
                        }
                        </script>';
                    }
                    ?>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                      <div align="left">
                        <label>Paquete</label>
                      </div>

                      <select id="Paquete_id" name="Paquete_id" class="form-control select2" style="width: 100%;" required="required" onchange="BuscarTarifasPorPaquete();">
                        <option value="" selected="selected">Seleccione Paquete</option> 

                      </select>
                    </div>
                    <div id="Campo_Adicional_Producto" class="col-md-12">

                    </div>

                    <div id="Campo_Adicional_Paquete" class="col-md-12">

                    </div>

                    <div class="form-group col-md-12" align="center">
                    <label style="color:red;">Si algun lote no se agrega sera debido a que tiene la fecha de vencimiento expirada</label>
                  </div>
                  </div>

                  <div class="form-group col-md-12" align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrdenPaquete">
                      <i class="fa fa-plus"></i> Agregar Paquete
                    </button>
                  </div>


                  <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">

                </div>
              </form>

              <?php
                endif;
              ?>






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
                    <th>Descripción del Producto</th>
                    <th>
                      <div align="Right">Copago</div>
                    </th>
                    <th>
                      <div align="Right">Porcentaje IVA</div>
                    </th>
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

                    $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = $clienteId AND tipo=9 order by id");
                    if ($resultado) {
                    while ($fila = mysqli_fetch_array($resultado)) {

                      $Numero++;
                      $ruta = htmlentities($_SERVER['PHP_SELF']);

                      $totalbase = $fila['totalbase'];
                      $subTotal = $fila['subTotal'];
                      $PuntosT = funcionMaster($fila['idProducto'], 'ID', 'puntos', 'sinvetrios');
                      $cantidad = $fila['cantidad'];
                      $iva = funcionMaster($fila['idProducto'], 'ID', 'iva', 'sinvetrios');

                      $Descripcion = $fila['descripcion'];
                      //Apartado de paquetes
                      if ($fila["PaqueteProcedimiento_id"] != "0") {
                        $Paquete_id = funcionMaster($fila["PaqueteProcedimiento_id"], 'id', 'paquete_id', 'ES_Paquete_Procedimientos');
                        $PaqueteNombre = funcionMaster($Paquete_id, 'id', 'Nombre', 'ES_Paquete');
                        $Descripcion .= ' [' . $PaqueteNombre . ']';
                      }
                      $PuntosTotal = $cantidad * $PuntosT;

                      $descuentoValor = $fila['Descuento_Numerico'];

                      $SinvDep_id = $fila['SinvDep_id'];
                      $idProductoT = $fila['idProducto'];
                      $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                      if ($MasDetalles != "") {
                        $Descripcion .= $MasDetalles;
                      }

                      $Copago = $fila['Copago'];

                      echo '     <tr>
                    <td  width="5%">' . $Numero .' '.$CampoAdicionalSerial. ' </td>
                    <td width="15%"><div >' . $Descripcion . ' </div></td>
                    <td width="15%"><div align="Right">' . $Copago . '% </div></td>
                    <td width="5%"><div align="Right">' . $iva . '' . "%" . '  </div></td>                    
                    <td width="10%"><div align="Right">' . number_format($fila['base'], 2) . '' . $moneda . '</div></td>
                    <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                    <td width="10%"><div align="center">' . number_format($descuentoValor, 2) . '' . $moneda . '</div></td>
                    <td width="10%"><div align="Right">' . number_format($fila['subTotal'], 2) . '' . $moneda . '</div></td>';

                      echo "<td width='1%'><a href={$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                      echo '</tr>';

                      $totalCant += $fila['cantidad'];
                      $totalBase +=  $fila['base'];
                      $total += $fila['subTotal'];

                      $totaldesc += $descuentoValor;

                      $ImpuestoDetalles += $fila['Impuesto_Numerico'];
                      $totalFinal = $total;
                    }
                    }

                    ?>
                  </tr>


                </tbody>

                <thead>
                  <tr>

                    <th> </th>
                    <th> </th>
                    <th></th>
                    <th> <strong>
                        <div align="Right"> Totales </div>
                      </strong>
                    </th>
                    <th>
                      <div align="Right"><?php echo number_format($totalBase, 2) . ' ' . $moneda; ?> </div>
                    </th>
                    <th>
                      <div align="Right"><?php echo $totalCant ?></div>
                    </th>

                    <th>
                      <div align="center"><?php echo number_format($totaldesc, 2) . ' ' . $moneda; ?> </div>
                    </th>
                    <th>
                      <div align="Right"><?php echo number_format($total, 2) . ' ' . $moneda; ?> </div>
                    </th>
                    <th> </th>


                  </tr>

                  <?php
                  if ($ImpuestoDetalles > 0) {
                    $total = $total + $ImpuestoDetalles;
                  ?>
                    <tr>
                      <th></th>
                      <th colspan="5"> <strong>
                          <div align="Right"> Impuesto </div>
                        </strong>
                      </th>
                      <th>
                        <div align="Right"><?php echo $ImpuestoDetalles  . ' ' . $moneda; ?> </div>
                      </th>
                    </tr>
                    <tr>
                      <th></th>
                      <th colspan="5"> <strong>
                          <div align="Right"> Total con Impuesto </div>
                        </strong>
                      </th>

                      <th>
                        <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                      </th>
                    </tr>
                  <?php
                  } ?>
                </thead>
              </table>

            </div>
          </div>
        </div>

        <div class="box">
          <div class="box-body">


            <?php
            $ID = $_SESSION['ID'];

            $resultado1 = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = $clienteId");
            if ($resultado1) {
              while ($fila1 = mysqli_fetch_array($resultado1)) {
                $Puntos = $fila1['Puntos'];
              }
            }
            

            $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE idCliente = $clienteId");
            if ($resultado) {
              while ($fila2 = mysqli_fetch_array($resultado)) {
                $puntosCanjeados = $fila2['puntosCanjeados'];
              }
            }
            

            $TotalPuntosP = $Puntos + $puntosCanjeados;


            //tipo 1 -> facturas
            //Calcular max del campo monto de pago
            $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '9' AND Activo = 1");
            $MontoPagadoDetalle = 0;
            if ($resultado) {
              while ($fila = mysqli_fetch_array($resultado)) {
                $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                $metodo_pago = $fila['metodo_pago'];
              }
            }
            

            $MontoDebe = round($total - $MontoPagadoDetalle, 2);
            // echo "El total es: " . $totalMet;
            ?>


            <div class="row">


              <div class="col-md-6">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>
                        <div>Método de Pago</div>
                      </th>
                      <th>
                        <div align="Right">Monto</div>
                      </th>
                      <th>
                        <div align="center"><i class='fa fa-trash'></div></i>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $ID = $_SESSION['ID'];
                      //tipo 1 -> facturas
                      $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND id_cliente = $clienteId AND idOperacion = 0 AND tipo = '9' AND Activo = 1");
                      $totalMet = 0;
                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          $Numero++;
                          $Valor_Pago = $fila['nota_pago'];
                          $Nombre_Pago = funcionMaster($fila['metodo_pago'], 'id', 'Nombre', 'Medios_Pago');

                          echo '<tr>
                              <td>' . $Numero . '</td>
                              <td>' . $Nombre_Pago . '</td>
                              <td><div align="Right">' . number_format($Valor_Pago, 2)  . '' . $moneda . '</div></td>';

                          echo "<td align='center'><a onclick='EliminarMedioPago({$fila['id']})'><i class='fa fa-trash' style='color:red'></i> </a></td>";

                          echo '</tr>';


                          $totalMet += $fila['nota_pago'];
                        }
                      }
                      


                      // echo "El total es: " . $totalMet;
                      ?>
                    </tr>
                  </tbody>
                  <thead>
                    <tr>
                      <th></th>
                      <th> <strong>
                          <div align="Right"> Total </div>
                        </strong>
                      </th>
                      <th>
                        <div align="Right"><?php echo number_format($totalMet, 2) . ' ' . $moneda; ?> </div>
                      </th>
                      <th></th>
                    </tr>

                    <?php

                    if ($metodo_pago == '5') {

                      $totalpuntos += $PuntosTotal;
                      echo '
			   <tr><th> <strong>
                            <div align="Right"> Total Puntos</div>
                          </strong>
                        </th>
                        <th>
                        <div align="Right">
                        ' . $totalpuntos . '
                        </div></th></tr>


                        <tr><th> <strong>
                            <div align="Right"> Total Puntos Paciente</div>
                          </strong>
                        </th>
                        <th>
                        <div align="Right">
                        ' . $TotalPuntosP . '
                        </div></th></tr>';
                    }
                    ?>




                    <tr>
                      <th></th>
                      <th> <strong>
                          <div align="Right">
                            <h3> Cambio</h3>
                          </div>
                        </strong>
                      </th>
                      <th>
                        <div align="Right">
                          <h3><?php echo  number_format(round($totalMet - $total, 2), 2)    ?></h3>
                        </div>
                      </th>



                    </tr>
                  </thead>

                </table>

              </div>


              <div class="col-md-6">
                <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente" style="width:100%">




                  <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                  <label>Método de pago</label>
                  <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select select2" style="width: 100%;" required>
                    <option value="">Seleccione...</option>
                    <?php
                    //aqui se admite el numero de pago con id = 5 para el apartado de puntos
                    $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                    if ($QueryMedioPago) {
                      while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                        $MedioPago_id = $RowMedioPago['id'];
                        $Nombre_MedioPago = $RowMedioPago['Nombre'];

                        echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";
                      }
                    }
                    
                    ?>
                  </select>

                  <label>Monto</label>
                  <input type="number" id="nota_pago" name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoDebe, 2); ?>"><br>
                  <button type="submit" class="btn btn-block btn-outline-primary rounded-pill">
                    <i class="fas fa-coins mr-1"></i>
                    Pagar
                  </button>



                  <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                  <input type="hidden" name="id_historia" value="<?php echo $historiaClinica1 ?>">
                  <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">


                  <input type="hidden" name="tipo_cliente" valur="1">
                  <input type="hidden" name="tipo" value="9">

                </form>
              </div>






              <div class="col-md-12">
                <!-- no modificar el id del formulario se usa para varias cosas -->
                <form id="totalizarFactura" action="EN_TotalizarFactura.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                  <div class="row">

                    <div class="form-group col-md-6">
                      <label> Observaciones o notas</label>
                      <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    </div>

                    <div class="col-md-6">
                      <label> Monto Pendiente </label>

                      <?php

                      $pendiente = round($total - $totalMet, 2);
                      if ($pendiente < 0) {
                        $pendiente = 0;
                      }
                      ?>

                      <!--<input type="number" name="montoPagado" placeholder="Monto Pagado" class="form-control input-lg" step="0.01" value="<?= $pendiente; ?>" required readonly> <br>-->
                      <input type="number" name="montoPendiente" id="montoPendiente" placeholder="Monto Pagado" class="form-control input-lg blur" step="0.01" min="0" value="<?= $pendiente; ?>" required data-readonly_MontoRestante> <br>

                      <label> Fecha de vencimiento</label>
                      <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                      <br>

                      <div class="form-group">
                        <label>Documentos</label> <br>
                        <input type="file" name="Documentos[]" multiple />
                      </div>


                      <?php
                      if ($totalpuntos > $TotalPuntosP) {
                      } else {
                        echo '<button type="submit" class="btn btn-block btn-outline-danger rounded-pill">
                          <i class="fas fa-dollar-sign mr-1"></i>
                          Totalizar Factura
                        </button>';
                      }



                      ?>
                    </div>






                    <input type="hidden" name="id_usuario" id="id_usuario_totalizar" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="id_cliente" id="id_cliente_totalizar" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                    <input type="hidden" name="totalpuntos" value="<?php echo $totalpuntos ?>">
                    <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id; ?>">

                    <input type="hidden" name="convenio_id"  value="<?php echo $convenio_id_cliente_factura; ?>">

                    <input type="hidden" name="tipo" value="9">
                  </div>
                </form>
              </div>
















            </div>
















          </div>
        </div>






    </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>





<?php include("footer.php") ?>


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


</script>

<script>
  /* no eliminar IMPORTANTE */
  $(document).on('focus', ".blur", function() {
    $(this).blur();
  });
</script>

<script>
  function EliminarMedioPago(id) {

    $.ajax({
      type: "POST",
      url: "Ajax_EliminarMedioPago.php",
      data: {
        id: id,
        Tipo_Consulta: "Eliminar Medio Pago"
      },
      success: function(response) {
        //console.log(response);
        window.location.reload();
      }
    });

  }
</script>

<script>


  function BuscarTarifasConDeposito() {

    $('#Tarifa_id').empty();
    $('#Tarifa_id').append('<option value="">Seleccione</option>');
    document.getElementById('2').value = "";

    var deposito = $("#deposito").val();
    var convenio = "<?=$convenio_id_cliente_factura;?>";

    $.ajax({
      type: "POST",
      url: "EN_AjaxFacturacion.php",
      data: {
        convenio_id: convenio,
        deposito_id: deposito,
        Tipo_Consulta: "Consultar Tarifas"
      },
      success: function(response) {
        var Arreglo = JSON.parse(response);
        //console.log(Arreglo);
        
        // Agregar las nuevas opciones desde el arreglo
        for (var i = 0; i < Arreglo.Datos.length; i++) {
            $('#Tarifa_id').append(Arreglo.Datos[i]);
        }

      }
    });


  }

  function BuscarPaquetesConDeposito(){

    $('#Paquete_id').empty();
    $('#Paquete_id').append('<option value="">Seleccione</option>');


    //var deposito = $("#deposito").val();
    var convenio = "<?=$convenio_id_cliente_factura;?>";

    $.ajax({
      type: "POST",
      url: "EN_AjaxFacturacion.php",
      data: {
        convenio_id: convenio,
        Tipo_Consulta: "Consultar Paquetes"
      },
      success: function(response) {
        var Arreglo = JSON.parse(response);
        //console.log(Arreglo);
        
        // Agregar las nuevas opciones desde el arreglo
        for (var i = 0; i < Arreglo.Datos.length; i++) {
            $('#Paquete_id').append(Arreglo.Datos[i]);
        }

      }
    });

  }

  function BuscarTarifasPorPaquete(){

   var Paquete = $('#Paquete_id').val();
   var deposito = $("#deposito").val();

   $('#Campo_Adicional_Paquete').html('');

    $.ajax({
      type: "POST",
      url: "EN_AjaxFacturacion.php",
      data: {
        paquete_id: Paquete,
        deposito_id: deposito,
        Tipo_Consulta: "Consultar Tarifas Paquetes"
      },
      success: function(response) {
        var Arreglo = JSON.parse(response);

        //Campo_Adicional_Paquete
        if(Arreglo.Datos != null){
          $('#Campo_Adicional_Paquete').html(Arreglo.Datos);
        }
        

      }
    });

  }


  function CargarPrecio(){

    var selectElement = document.getElementById('Tarifa_id'); 
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    var ValorPrecio = selectedOption.getAttribute('data-value');

    var CampoPrecio = document.getElementById('2');
    CampoPrecio.value = ValorPrecio;

  }

  //////////////////////////////////////Validar Existencias //////////////////////////////////////
  // si no necesitan validar las existencias comentar este codigo
  document.getElementById('totalizarFactura').addEventListener('submit', function(event) {
    event.preventDefault(); // Detiene el envío predeterminado del formulario

    var usuario_id = $("#id_usuario_totalizar").val();
    var cliente_id = $("#id_cliente_totalizar").val();
    var deposito = $("#Deposito_id").val();
    var tipo = "9"; //1-> Factura General | revisar el campo tipo de soperacioninv
    $.ajax({
      type: "POST",
      url: "EN_AjaxFacturacion.php",
      data: {
        usuario_id: usuario_id,
        cliente_id: cliente_id,
        deposito: deposito,
        tipo: tipo,
        Tipo_Consulta: "Verificar Existencia"
      },
      success: function(response) {
        console.log(response);
        var Respuesta = JSON.parse(response);
        var Detalles = Respuesta.Detalles;
        if (Respuesta.Enviar == false) {
          var Mensaje = "";
          var MensajeEstatico = "";
          Object.keys(Detalles).forEach(function(key) {
            var item = Detalles[key];
            if (item.Estado == false) {
              Mensaje += item.Nombre + ": ";
              Mensaje += "\r\nExistencias: " + item.Existencia + "\r\n";
              Mensaje += "Existencias a descontar en la factura actual: " + item.Descontar + " . \r\n   ";
              MensajeEstatico += item.Motivo;
            }

          });

          Mensaje = Mensaje + " " + MensajeEstatico;

          alert(Mensaje);
        } else {
          //alert("Existencia Disponible");
            document.getElementById('totalizarFactura').submit();
        }
      }
    });

  });
  //////////////////////////////////////Validar Existencias //////////////////////////////////////
</script>


<?php

?>