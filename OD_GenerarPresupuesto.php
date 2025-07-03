<?php

try {

include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$historiaClinica1 = $_GET['historiaClinica1'];
$tipo_historia  = $_GET['tipo_historia'];
$ID_UsuarioP = $_SESSION['ID_principal'];
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
  $SinvDep_id = $_POST['SinvDep_id'];
  $Deposito_id = $_POST['dep'];


  if( $codigoProd == '0'){
    $descripcion = mysqli_real_escape_string($conn3, $_POST['codigoProd_Texto']);
    $SinvDep_id = "0";
    $Deposito_id = "0";
  }else{
    $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
  }
  
  $base = $_POST["base"];
  $impuesto = 0;

  $subTotal = $_POST["subTotal"];
  $usuario_id = $_POST['usuario_id'];
  $cliente_id = $_POST['cliente_id'];
  $tipo_historia = $_POST['tipo_historia'];
  $historia = $_POST['historia'];

  $descuento_base = $_POST['descuento'];


  $totalbase = round($base * $cantidad, 2);

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

  $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','6','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
  //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";


  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
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
  }
  
}

if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id = "0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID_Usuario and  id_cliente = $clienteId AND tipo = '6' order by id");
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
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <div>

    <!-- /.box-header -->
    <div>

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
        <div>
          <div class="col-xs-12">

            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">



                <div class="col-md-12">
                  <?php echo datosPacientesReducido($clienteId); ?>

                </div>
                <div class="col-md-12">
                  <hr>
                </div>
                <!-- este es un boton de un include -->
                <button type="button" class="btn btn-block btn-outline-info rounded-pill shadow m-1" data-toggle="modal" data-target="#ModalPresupuestoOdontograma" style="width:100%">
                  Procedimientos/Servicios Adjuntados para Presupuestar
                </button>
                <div class="col-md-12">
                  

                  <hr>
                  <div align="left" style="padding-bottom: 15px;padding-top: 15px;">
                    <a style="padding-left: 15px;" class='btn btn-outline-info  rounded-pill btn-md' onclick="MostrarTipoFactura('Simple_Formulario');">Producto Inventario</a>
                    <a onclick="MostrarTipoFactura('Abierto_Formulario');" style="" class='btn btn-outline-info  rounded-pill btn-md'>Producto Libre</a>
                  </div>
                </div>

                <h4 class="card-title">Agregar Producto/Servicios</h4>
                <br><br>



                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" name="formularioActualizarcliente" id="Simple_Formulario">
                  <div class="form-row">


                    <div class="form-group col-md-12">
                      <label><strong> Depósito</strong></label>
                      <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?= $DesabilitarDep; ?> required>
                        <?php

                        $OpcionesModalSwalDeposito = "";
                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') AND activo = 1 ORDER BY id ASC");
                        
                        if ($queryListDP) {
                          while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                            $idDP = $rowMotorizadoDP['id'];
                            $descripcionDP = $rowMotorizadoDP['descripcion'];
  
                            if ($Deposito_id != "" and $Deposito_id == $idDP) {
                              echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                              $OpcionesModalSwalDeposito_temporal_selected .= '<option value="' . $idDP . '" selected>' . str_replace(array('"', "'"), '', $descripcionDP) . '</option>'; // importante para el modal
                            } else {
                              echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
  
                              $OpcionesModalSwalDeposito_temporal .= '<option value="' . $idDP . '">' . str_replace(array('"', "'"), '', $descripcionDP) . '</option>'; // importante para el modal
  
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
                            });</script>';

                        $OpcionesModalSwalDeposito = $OpcionesModalSwalDeposito_temporal_selected;
                      } else {
                        $OpcionesModalSwalDeposito = $OpcionesModalSwalDeposito_temporal;
                      }
                      ?>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="form-group col-md-12">
                        <div align="left">
                          <label>Producto o Servicio</label>
                        </div>

                        <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                          <option value="" selected="selected">Seleccione Producto</option>
                          <?php
                          $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE (ID_principal = '{$_SESSION['ID']}' OR ID_principal = '{$_SESSION['ID_principal']}')");

                          if ($queryList) {
                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                              $tipo = $rowMotorizado['tipo'];

                              $queryinv = mysqli_query($conn3, "SELECT * FROM scategoria WHERE (ID_principal = '{$_SESSION['ID']}' OR ID_principal = '{$_SESSION['ID_principal']}') AND id = $tipo LIMIT 1");

                              if ($queryinv) {
                                while ($rowinv = mysqli_fetch_array($queryinv)) {
                                  $TipoInventario = $rowinv['tipo'];
                                }
                                
                              }

                              if ($TipoInventario == "1" or $TipoInventario == "2" or $TipoInventario == "3") {
                                echo "<option value='{$rowMotorizado['ID']}'> {$rowMotorizado['descripcion']} </option>";
                              }
                            }
                            
                          }
                          ?>
                        </select>
                      </div>
                      <div id="Campo_Adicional_Producto" class="col-md-12">

                      </div>
                    </div>



                    <div class="form-group col-md-3">
                      <div align="left">
                        <label> Precio </label>
                      </div>
                      <input type="number" step="0.01" class="form-control input-lg" id="2" name="base" placeholder="Precio" onchange="multiplicar();" value="" required>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="Cantidad" onChange="multiplicar();" required>
                      <div align="left" id="informacion_existencia"></div>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Descuento</label>
                      <input type="text" class="form-control input-lg" id="descuento" name="descuento" placeholder="Descuento" value="0" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Subtotal</label>
                      <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="SubTotal" min="0" step="any" data-readonly_P required>
                    </div>
                    <div class="form-group col-md-2" align="center" style="margin-top: 27px;">
                      <center><button type="submit" class="tn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrden">
                          <font size="5"> <strong> + </strong> </font>
                        </button></center>
                    </div>
                    <div class="form-group col-md-12" align="center">
                      <label style="color:#3a8bb9;">[si desea el descuento en % debera digitar al final del numero el caracter %, si es valor numerico solo digitar numeros]</label>
                    </div>


                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">







                    <input type="hidden" name="tipo_cliente" valur="1">
                  </div>
                </form>


                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" name="formularioActualizarcliente" id="Abierto_Formulario" style="display: none;">
                  <div class="form-row">

                    <div class="form-group col-md-12">
                      <label><strong> Descripcion</strong></label>
                      <input type="text" class="form-control input-lg" id="descripcion" name="codigoProd_Texto" placeholder="descripcion" required>
                    </div>

                    <div class="form-group col-md-3">
                      <div align="left">
                        <label> Precio </label>
                      </div>
                      <input type="number" step="0.01" class="form-control input-lg" id="2_Libre" name="base" placeholder="precio" onchange="multiplicarProductoLibre();" value="" required>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="number" class="form-control input-lg" id="1_Libre" name="cantidad" placeholder="cantidad" onchange="multiplicarProductoLibre();" required min="1">
                      <div align="left" id="informacion_existencia"></div>
                    </div>

                    <div class="form-group col-md-2">

                      <input type="hidden" class="form-control input-lg" id="descuento_Libre" name="descuento" value="0">
                    </div>

                    <div class="form-group col-md-3">
                      <label>Subtotal</label>
                      <input type="number" class="form-control input-lg blur" id="3_Libre" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                    </div>
                    <div class="form-group col-md-2 self-align-center" align="center" style="margin-top: 26px">
                      <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="GuardarDetalleOrden">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <div class="form-group col-md-12" align="center">
                      <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>

                    </div>

                    
                    
                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="codigoProd" value="0">
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                    
                    <div class="form-group col-md-12"><br>
                      <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="GuardarDetalleServiciosEmpresaAfiliada" style="font-size: 18px;">Guardar</button></center>
                    </div>
                  </div>
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
                      <th>Descripción del Producto</th>

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

                      $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where   id_usuario = $ID and  id_cliente = $clienteId AND estado = 1 AND tipo = 6 order by id");
                      if ($resultado) {
                        
                        while ($fila = mysqli_fetch_array($resultado)) {
                          $Numero++;
                          $ruta = htmlentities($_SERVER['PHP_SELF']);

                          $totalbase = $fila['totalbase'];
                          $subTotal = $fila['subTotal'];

                          $descuentoValor = $fila['Descuento_Numerico'];

                          $detalle_presupuesto_odontograma = $fila['detalle_presupuesto_odontograma'];

                          $MasInformacion = "";
                          if ($detalle_presupuesto_odontograma != 0) {
                            $MasInformacion = "<hr style='margin-top: 5px;margin-bottom: 5px;'>";
                            $Arreglo = json_decode($fila['Mas_Detalles_Odontograma']);
                            foreach ($Arreglo as $key => $value) {
                              $MasInformacion .= " {$key}: " . $value . " ,";
                            }
                          }
                          $MasInformacion = trim($MasInformacion, ",");

                          $Descripcion = $fila['descripcion'];

                          $SinvDep_id = $fila['SinvDep_id'];
                          $idProductoT = $fila['idProducto'];
                          $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                          if ($MasDetalles != "") {
                            $Descripcion .= $MasDetalles;
                          }

                          echo '     <tr>
                      <td  width="5%">' . $Numero . ' </td>
                      <td width="30%">' . $Descripcion . " " . $MasInformacion . ' </td>
                      <td width="10%"><div align="Right">' . $fila['base'] . '' . $moneda . '</div></td>
                      <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                      <td width="10%"><div align="center">' . $descuentoValor . '' . $moneda . '</div></td>
                      <td width="10%"><div align="Right">' . $fila['subTotal'] . '' . $moneda . '</div></td>';

                          $fila_id = $fila["id"];
                          echo "<td width='1%'><a href='#' onclick='BorrarDetallePresupuesto($fila_id)'><i class='fa fa-trash' style='color:red'></i> </a></td>";

                          echo '</tr>';

                          $totalCant += $fila['cantidad'];
                          $totalBase +=  $fila['base'];
                          $total += $fila['subTotal'];

                          $ImpuestoDetalles += $fila['Impuesto_Numerico'];
                          $totaldesc += $descuentoValor;
                        }
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
                    if ($ImpuestoDetalles > 0) {
                      $total = $total + $ImpuestoDetalles;
                    ?>
                      <tr>
                        <th colspan="5"> <strong>
                            <div align="Right"> Impuesto </div>
                          </strong>
                        </th>
                        <th>
                          <div align="Right"><?php echo $ImpuestoDetalles  . ' ' . $moneda; ?> </div>
                        </th>
                      </tr>
                      <tr>
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

              <div class="col-md-12">
                <form action="OD_TotalizarPresupuesto" method="POST" name="formularioActualizarcliente">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <?php
                      //query para obtener los usuarios y mostrarlos en el select
                      $queryDoctor = "SELECT * FROM usuarios WHERE ID_principal = $ID_UsuarioP ";
                      $queryDocList = mysqli_query($conn3, $queryDoctor);
                      $docsRow = null;
                      while ($docsQueryResult = mysqli_fetch_assoc($queryDocList)) {
                        $docsRow[] = $docsQueryResult;
                      }
                      ?>

                      <label> Fecha de vencimiento</label>
                      <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                      <br>
                      <label for="">Factura a nombre del Doctor </label>
                      <select name="id_usuario" class="form-control input-lg select">
                        <option value="<?php echo $_SESSION['ID'] ?>"><?= $_SESSION['NOMBRE_USUARIO'] ?></option>
                        <?php
                        //mostrar cada usuario dandole el valor de su ID y su nombre
                        foreach ($docsRow as $doc) {
                          echo '<option value="' . $doc['ID'] . '">' . $doc['NOMBRE_USUARIO'] . '</option>';
                        }
                        ?>
                      </select>
                      <br>
                      <center><button type="submit" class="btn btn-block btn-outline-danger rounded-pill shadow m-1"> <strong>
                            <h1> Totalizar Presupuesto</h1>
                          </strong> </button></center>

                    </div>
                    <div class="form-group col-md-6">
                      <label> Observaciones o notas</label>
                      <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    </div>

                    <!-- <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>"> -->
                    <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                    <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id; ?>">

                    <input type="hidden" name="tipo_cliente" valur="1">
                    <input type="hidden" name="tipo" value="2">
                    <input type="hidden" name="montoPagado" value="">
                    
                  </div>
                </form>
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
</div>
</div>





<?php include("footer.php") ?>
<?php
//arriba se agrego un boton para el modal
$cliente_id = $_GET['clienteId']; //necesario para funcionar
$usuario_id = $_SESSION['ID'];
$TipoDetalle_ModalPresupuestos = "Presupuesto";
include 'OD_ModalPresupuestos.php';

} catch (\Throwable $th) {
  echo "<script>alert(`". $th->getMessage() ." Line: ". $th->getLine() ."`)</script>";
}

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



  /*
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
  */

  function BorrarDetallePresupuesto(id) {
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



<script>
  function CargarPrecioProducto() {
    var codigoProd = $("#codigoProd").val();
    var deposito = $("#deposito").val();

    ////////////////////////// EVITAR ERRORES ///////////////
    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";
    $('#3').val("");
    $('#2').val("");
    $('#1').val("");
    $('#descuento').val("");
    document.getElementById('informacion_existencia').innerHTML = "";
    /////////////////////////////////////////////////////////


    if (codigoProd != "") {
      $.ajax({
        type: "POST",
        url: "FA_Ajax_CargarPrecioYLista.php",
        data: {
          codigoProd: codigoProd,
          deposito: deposito,
          Tipo_Consulta: "Cargar Precio"
        },
        success: function(response) {

          var Respuesta = JSON.parse(response);
          //console.log (Respuesta);

          // codigo para el apartado de lotes
          if (Respuesta.Lista == true && Respuesta.Tipo == "Lotes") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            // Crea el elemento select
            var selectElement = document.createElement('select');
            selectElement.className = "form-control input-lg";
            selectElement.setAttribute('required', 'required');
            selectElement.setAttribute('name', 'SinvDep_id');
            selectElement.setAttribute('width', '100%');

            var optionElement = document.createElement('option');
            optionElement.value = '';
            optionElement.textContent = 'Seleccione';
            selectElement.appendChild(optionElement);

            // Crea el elemento label
            var labelElement = document.createElement('label');
            labelElement.textContent = 'Lotes';

            DivCampoPersonalizado.appendChild(labelElement);
            DivCampoPersonalizado.appendChild(document.createElement('br'));

            var Options = Respuesta.Detalles;
            //console.log(Options);
            // Recorre el JSON y agrega opciones al select
            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              var optionElement = document.createElement('option');
              optionElement.value = item.id;
              optionElement.textContent = item.Nombre + ` [${item.Existencia}] [${item.Vencimiento}] `;
              optionElement.dataset.existencias = item.Existencia;

              if (parseInt(item.Existencia) <= 0) {
                //optionElement.disabled = true;
                optionElement.style.backgroundColor = '#ff00004d';
              }
              // Obtiene la fecha de hoy
              var fechaHoy = new Date();
              var fechaSeleccionada = new Date(item.Vencimiento);
              // Compara las fechas
              if (fechaSeleccionada <= fechaHoy) {
                optionElement.disabled = true;
              }

              selectElement.appendChild(optionElement);
            });

            // Agrega la función onchange al select
            selectElement.onchange = function() {
              var selectedOption = this.options[this.selectedIndex];
              var existencias = selectedOption.dataset.existencias;

              //////////////////////////////////////////////////////////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + existencias + "</b></u>";
              //info de las existencias informacion_existencia
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              ///////////////////////////////////////////////////////////////////////////

            };

            DivCampoPersonalizado.appendChild(selectElement);

          }
          //codigo para el apartado de producto simple
          else if (Respuesta.Tipo == "Simple") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);

            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'SinvDep_id');

            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              input.value = item.id;
              ////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              //////////////////////

            });
            DivCampoPersonalizado.appendChild(input);

          }
          //codigo para el apartado del producto compuesto
          else if (Respuesta.Tipo == "Compuesto") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);
            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'SinvDep_id');

            var labelElement = document.createElement('label');

            Object.keys(Options).forEach(function(key) {
              var item = Options[key];
              input.value = "0";

              labelElement.textContent = item.Nombre;

              ////////////////////
              var Mensaje = "Existencia Disponible: <u><b>" + item.Existencia + "</b></u>";
              document.getElementById('informacion_existencia').innerHTML = Mensaje;
              //////////////////////

            });

            DivCampoPersonalizado.appendChild(input);
            DivCampoPersonalizado.appendChild(labelElement);
          } else if (Respuesta.Tipo == "Servicio") {

            var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
            var Options = Respuesta.Detalles;
            //console.log(Options);

            // Crea el elemento input hidden
            var input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'SinvDep_id');

            input.value = "0";
            ////////////////////
            var Mensaje = "<u><b>Servicio</b></u>";
            document.getElementById('informacion_existencia').innerHTML = Mensaje;
            //////////////////////

            DivCampoPersonalizado.appendChild(input);

          }
          // si no tiene un tipo de clasificacion nos indicara este error
          else if (Respuesta.Tipo == "Error") {

            alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
            ActualizacionDeposito();
          }


          $('#2').val(Respuesta.Precio);

        }
      });
    } else {
      $("#codigoProd").val("").trigger('change');
    }

  }

  function ActualizacionDeposito() {

    var divPersonalizado = document.getElementById('Campo_Adicional_Producto');
    divPersonalizado.innerHTML = "";
    $('#3').val("");
    $('#2').val("");
    $('#1').val("");
    $('#descuento').val("");
    //document.getElementById('1').removeAttribute('max');
    $("#codigoProd").val("").trigger('change');

  }
</script>
<script>
        function MostrarTipoFactura(valor) {

            if (valor == "Simple_Formulario") {
                document.getElementById(valor).style.display = "block";
                document.getElementById("Abierto_Formulario").style.display = "none";
            } else if (valor == "Abierto_Formulario") {
                document.getElementById(valor).style.display = "block";
                document.getElementById("Simple_Formulario").style.display = "none";
                console.log(valor);
            }
        }
    </script>
<script>
  function multiplicarProductoLibre() {

    var descuentos = $("#descuento_Libre").val();

    m1 = document.getElementById("1_Libre").value;
    m2 = document.getElementById("2_Libre").value;
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

    document.getElementById("3_Libre").value = r;

  }
</script>

<script>
  function ValidarInputProductoLibre(campo) {
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
    multiplicarProductoLibre();
  }
</script>