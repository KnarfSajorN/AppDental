<?php
include 'header.php';
include 'menu.php';

$convenio_id = $_GET['convenio_id'];
$usuarioId = $_GET['usuarioId'];

$ID_Usuario  =  $_SESSION['ID'];


$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleOrden_Lote_Paquete'])) {
  date_default_timezone_set('America/Bogota');

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'convenio_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `convenio_id` INT(11) NULL DEFAULT '0'  COMMENT ' id del convenio solo aplica para facturacion entidad *Creado desde modulo de factura_cliente_entidad*';");
  }


  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'convenio_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `convenio_id` INT(11) NULL DEFAULT '0'  COMMENT ' id del convenio solo aplica para facturacion entidad *Creado desde modulo de factura_cliente_entidad*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'detalle_id_entidad_producto';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `detalle_id_entidad_producto` INT(11) NULL DEFAULT '0'  COMMENT ' id del detalle de la factura de cliente entidad solo aplica para facturacion entidad *Creado desde modulo de factura_cliente_entidad*';");
  }







  $convenio_id = $_POST['convenio_id'];

  foreach ($_POST['DetallesFacturar'] as $key => $value) {
    
    $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id = '$value' ");
    while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {

        $Tarifa_id = $RowDetalle['Tarifa_Convenio'];

        $Copago1 = $RowDetalle['Copago'];
        $Copago = round(100-$Copago1,2);

        $idProducto = $RowDetalle['idProducto'];

        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $codigoProd = $idProducto;
        $cantidad = $RowDetalle['cantidad'];

        $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));

        $base = round($RowDetalle['Valor_Tarifa_Completa']*($Copago/100),2);

        $impuesto = 0;

        $subTotal = $base*$cantidad;
        $usuario_id = $_POST['usuario_id'];
        $cliente_id = $_POST['cliente_id'];

        $descuento_base = "0";

        $totalbase = round($base * $cantidad, 2);

        $SinvDep_id = $RowDetalle['SinvDep_id'];
        $Deposito_id = $RowDetalle['Deposito_id'];

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
        //factura tipo entidad
        $TipoFactura=10;
        $Detalle_id = $RowDetalle['id'];
        $Paquete_id = $RowDetalle['Paquete_id'];
        $Valor_Tarifa_Completa = $RowDetalle['Valor_Tarifa_Completa'];

        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
        subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total
        ,Copago,Tarifa_Convenio,convenio_id,detalle_id_entidad_producto,Paquete_id,Valor_Tarifa_Completa) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
        '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','$TipoFactura','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva'
        ,'$Copago','$Tarifa_id','$convenio_id','$Detalle_id','$Paquete_id','$Valor_Tarifa_Completa');") or die(mysqli_error($conn3));
    
        
        mysqli_query($conn3, "UPDATE sDetalleOper set Estado_Detalle_Convenio = 1 WHERE id = '{$Detalle_id}' limit 1;");
    }


  }
  


  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }
}


if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];

  $id_detalle_original = funcionMaster($id, 'id', 'detalle_id_entidad_producto', 'sDetalleOperPendites');

  mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");
  mysqli_query($conn3, "UPDATE sDetalleOper set Estado_Detalle_Convenio = 0 WHERE id = '{$id_detalle_original}' limit 1;");

  $convenio_id = $_GET["convenio_id"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  echo "<script language='Javascript'>window.location='{$ruta}?convenio_id={$convenio_id}&error=Se Borro el Producto'</script>";
}



















if (isset($_POST['GuardarDetalleOrdenCapitacion'])) {
  date_default_timezone_set('America/Bogota');

  if($_POST['DetallesFacturarConvenio']!=""){

        $idProducto = 0;

        $idOperacion = 0;
        $fechaRegistro = date("Y-m-d H:i:s");
        $codigoProd = $idProducto;
        $cantidad = 1;

        $descripcion = "Contrato Capitacion: ".mysqli_real_escape_string($conn3, funcionMaster($_POST['convenio_id'], 'id', 'Nombre', 'Rips_Convenio'));

        $base = funcionMaster($_POST['convenio_id'], 'id', 'fe_valor_convenio', 'Rips_Convenio');;

        $impuesto = 0;

        $subTotal = $base*$cantidad;
        $usuario_id = $_POST['usuario_id'];
        $cliente_id = $_POST['cliente_id'];

        $descuento_base = "0";

        $totalbase = round($base * $cantidad, 2);

        $SinvDep_id = 0;
        $Deposito_id = 0;

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
        //factura tipo entidad
        $TipoFactura=10;
        $convenio_id = $_POST['convenio_id'];

        $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
        subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total,convenio_id) 
        VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
        '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','$TipoFactura','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva','$convenio_id');") or die(mysqli_error($conn3));

  }

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  $ruta = str_replace('.php', '', $ruta);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?convenio_id={$convenio_id}&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }

}






















$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];
}

$convenio_id_cliente_factura = $convenio_id;

$queryList = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio where id=$convenio_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $Nombre = $rowMotorizado['Nombre'];
  $Codigo = $rowMotorizado['Codigo'];

  $entidad_id = $rowMotorizado['entidad_id'];

  $NombreEntidad = funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades');

}

if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

if($convenio_id == "0" || $convenio_id == ""){
  //alerta que debe ingresar convenio y devolverlo a la pagina EN_TablaPacientes
  echo "<script> alert('Debe Ingresar Un Convenio'); window.location='EN_TablaEntidad.php'; </script>";
}else{
  $MensajeEntidadContrato = "<b>Entidad:</b> [ " . funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades') . " ] | <b>Contrato:</b> [ " . funcionMaster($convenio_id, 'id', 'Nombre', 'Rips_Convenio') . " ] ";
  
  $TipoConvenio = funcionMaster($convenio_id, 'id', 'Tipo_Contrato', 'Rips_Convenio');
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
          Generar Factura Entidad
        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#">Generar Factura Entidad</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div>
          <div class="col-xs-12">

            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">

              </div>

              <div class='col-md-12' align="center">
                                <h2><?= $MensajeEntidadContrato; ?></h2>
              </div>



              <br>

              <?php
                if($TipoConvenio=="2" OR $TipoConvenio=="4"):
              ?>

              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?convenio_id=<?php echo $convenio_id; ?>" method="POST" id="Simple_Formulario">
                <div class="form-row row">

                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descripción del Producto</th>
                    <th>
                      <div align="Right">Valor Tarifa</div>
                    </th>
                    <th>
                      <div align="Right">Valor Paciente</div>
                    </th>
                    <th>
                      <div align="Right">Valor Entidad</div>
                    </th>
                    <th>
                      <div align="Right">Porcentaje IVA</div>
                    </th>
                    <th>
                      <div align="Right">Precio Entidad</div>
                    </th>

                    <th>
                      <div align="Right">Cantidad</div>
                    </th>

                    <th>
                      <div align="Right">Total</div>
                    </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $Numero=0;
                        $QueryOperacion = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where tipo = 9 AND convenio_id = $convenio_id");
                        while ($rowMotorizado = mysqli_fetch_array($QueryOperacion)) {
                          $idOperacion      = $rowMotorizado['idOperacion'];
                          
                          
                          $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = '$idOperacion' AND Estado_Detalle_Convenio!='2' AND Devolucion = 0 ");
                          while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
                            $Numero++;
                            
                            $cantidad = $RowDetalle['cantidad'];
                            $iva = funcionMaster($RowDetalle['idProducto'], 'ID', 'iva', 'sinvetrios');

                            $Descripcion = $RowDetalle['descripcion'];


                            $Copago = $RowDetalle['Copago'];
                            $CopagoEntidad = round(100-$Copago,2);
                            $Precio = round($RowDetalle['Valor_Tarifa_Completa']*($CopagoEntidad/100),2);

                            $Subtotal = $Precio*$RowDetalle['cantidad'];

                            $SinvDep_id = $RowDetalle['SinvDep_id'];
                            $idProductoT = $RowDetalle['idProducto'];
                            $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                            if ($MasDetalles != "") {
                                $Descripcion .= $MasDetalles;
                            }

                            




                            echo '     <tr>
                            <td  width="5%">' . $Numero .' </td>
                            <td width="15%"><div >' . $Descripcion . ' </div></td>
                            <td width="15%"><div align="Right">' . $RowDetalle['Valor_Tarifa_Completa'] . ' </div></td>
                            <td width="15%"><div align="Right">' . $RowDetalle['base'] . ' </div></td>
                            <td width="15%"><div align="Right">' . $Precio . ' </div></td>
                            <td width="5%"><div align="Right">' . $iva . '' . "%" . '  </div></td>                    
                            <td width="10%"><div align="Right">' . number_format($Precio, 2) . '' . $moneda . '</div></td>
                            <td width="5%"><div align="Right">' . $RowDetalle['cantidad'] . '</div></td>
                            <td width="10%"><div align="Right">' . number_format($Subtotal, 2) . '' . $moneda . '</div></td>';
                            if($RowDetalle['Estado_Detalle_Convenio']==0){
                                echo "<td width='1%'><input type='checkbox' name='DetallesFacturar[]' value='" . $RowDetalle['id'] . "'></td>";
                            }
                            

                            echo '</tr>';

                          }

                        }
                    ?>
                </tbody>
              </table>




                  <div class="form-group col-md-12" align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrden_Lote_Paquete">
                      <i class="fa fa-plus"></i> Cargar Detalles
                    </button>
                  </div>



                  <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="cliente_id" value="0">
                  <input type="hidden" name="convenio_id" value="<?php echo $convenio_id ?>">

                </div>
              </form>

              <?php
                endif;
              ?>











<?php
                if($TipoConvenio=="1"):
              ?>

              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?convenio_id=<?php echo $convenio_id; ?>" method="POST" id="Simple_Formulario">
                <div class="form-row row">

                <div class="col-md-12">
                  <hr>
                  <h2 style="text-align:center"> Detalles de Clientes </h2>
                </div>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descripción del Producto</th>
                    <th>
                      <div align="Right">Copago</div>
                    </th>

                    <th>
                      <div align="Right">Precio Paciente</div>
                    </th>
                    <th>
                      <div align="Right">Cantidad</div>
                    </th>
                    <th>
                      <div align="Right">Descuento</div>
                    </th>
                    <th>
                      <div align="Right">Impuesto</div>
                    </th>
                    <th>
                      <div align="Right">Total</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $Numero=0;
                        $QueryOperacion = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where tipo = 9 AND convenio_id = $convenio_id");
                        while ($rowMotorizado = mysqli_fetch_array($QueryOperacion)) {
                          $idOperacion      = $rowMotorizado['idOperacion'];
                          
                          
                          $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = '$idOperacion' AND Estado_Detalle_Convenio!='2' AND Devolucion = 0 ");
                          while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
                            $Numero++;
                            
                            $Descripcion = $RowDetalle['descripcion'];
                            $Copago = $RowDetalle['Copago'];

                            $cantidad = $RowDetalle['cantidad'];
                            $iva = ($RowDetalle['Impuesto_Numerico']);
                            $descuento = ($RowDetalle['Descuento_Numerico']);

                            $Total = $RowDetalle['Total'];



                            $SinvDep_id = $RowDetalle['SinvDep_id'];
                            $idProductoT = $RowDetalle['idProducto'];
                            $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT, $SinvDep_id);
                            if ($MasDetalles != "") {
                                $Descripcion .= $MasDetalles;
                            }

                            




                            echo '     <tr>
                            <td  width="5%">' . $Numero .' </td>
                            <td width="15%"><div >' . $Descripcion . ' </div></td>
                            <td width="15%"><div align="Right">' . $Copago . ' </div></td>
                            <td width="15%"><div align="Right">' . $RowDetalle['base'] . ' </div></td>
                            <td width="15%"><div align="Right">' . $cantidad . ' </div></td>
                            <td width="5%"><div align="Right">' . $descuento . '' . "%" . '  </div></td>                    
                            <td width="10%"><div align="Right">' . number_format($iva, 2) . '' . $moneda . '</div></td>
                            <td width="10%"><div align="Right">' . number_format($Total, 2) . '' . $moneda . '</div></td>';
                            

                            echo '</tr>';

                          }

                        }
                    ?>
                </tbody>
              </table>

              <div class="col-md-12">
                <hr>
                <h2 style="text-align:center"> Detalle de Convenio </h2>
              </div>


                
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>
                      <div align="Right">Valor</div>
                    </th>

                    <th>
                      <div align="Right">Cantidad</div>
                    </th>

                    <th>
                      <div align="Right">Total</div>
                    </th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $Numero=0;
                        $EstadoCrearCapitacion=0;
                        $QueryOperacion = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where tipo = 9 AND convenio_id = $convenio_id");
                        while ($rowMotorizado = mysqli_fetch_array($QueryOperacion)) {
                          $idOperacion      = $rowMotorizado['idOperacion'];
                          
                          
                          $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where idOperacion = '$idOperacion' AND Estado_Detalle_Convenio!='2' AND Devolucion = 0 ");
                          $NumRowDetalle = mysqli_num_rows($QueryDetalle);

                          if($NumRowDetalle>0){
                            $EstadoCrearCapitacion=1;
                          }
                        }

                        $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  convenio_id = $convenio_id AND tipo=10 order by id");
                        $check = mysqli_num_rows($resultado);
                        if($check==0){
                          if($EstadoCrearCapitacion==1){

                            $QuueryDetalle = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio where id=$convenio_id");
                            while ($RowDetalle = mysqli_fetch_array($QuueryDetalle)) {
                              $Numero++;
                              
                              $cantidad = "1";

                              $Descripcion = $RowDetalle['Nombre'];

                              $Subtotal = $RowDetalle['fe_valor_convenio'];

                              echo '     <tr>
                              <td  width="5%">' . $Numero .' </td>
                              <td width="15%"><div > Convenio Capitacion: ' . $Descripcion . ' </div></td>
                              <td width="15%"><div align="Right">' . $Subtotal . ' </div></td>
                              <td width="15%"><div align="Right">' . $cantidad . ' </div></td>
                              <td width="15%"><div align="Right">' . $Subtotal . ' </div></td>';
                              
                                  echo "<td width='1%'><input type='checkbox' name='DetallesFacturarConvenio' value='" . $RowDetalle['id'] . "'></td>";
                              
                              

                              echo '</tr>';

                            }

                          }
                        }
                    ?>
                </tbody>
              </table>



                  <div class="form-group col-md-12" align="center">
                    <br>
                    <button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="GuardarDetalleOrdenCapitacion">
                      <i class="fa fa-plus"></i> Cargar Detalle 
                    </button>
                  </div>


                  <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                  <input type="hidden" name="cliente_id" value="0">
                  <input type="hidden" name="convenio_id" value="<?php echo $convenio_id ?>">

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

                    $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  convenio_id = $convenio_id AND tipo=10 order by id");
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

                      echo "<td width='1%'><a href={$ruta}?convenio_id={$convenio_id}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                      echo '</tr>';

                      $totalCant += $fila['cantidad'];
                      $totalBase +=  $fila['base'];
                      $total += $fila['subTotal'];

                      $totaldesc += $descuentoValor;

                      $ImpuestoDetalles += $fila['Impuesto_Numerico'];
                      $totalFinal = $total;
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

            $resultado1 = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = 0");
            while ($fila1 = mysqli_fetch_array($resultado1)) {
              $Puntos = $fila1['Puntos'];
            }

            $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE idCliente = 0");
            while ($fila2 = mysqli_fetch_array($resultado)) {
              $puntosCanjeados = $fila2['puntosCanjeados'];
            }

            $TotalPuntosP = $Puntos + $puntosCanjeados;


            //tipo 10 -> facturas de entidad
            //Calcular max del campo monto de pago
            $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND convenio_id = $convenio_id AND idOperacion = 0 AND tipo = '10' AND Activo = 1");
            $MontoPagadoDetalle = 0;
            while ($fila = mysqli_fetch_array($resultado)) {
              $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
              $metodo_pago = $fila['metodo_pago'];
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
                      //tipo 10 -> facturas entidades
                      $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND convenio_id = $convenio_id AND idOperacion = 0 AND tipo = '10' AND Activo = 1");
                      $totalMet = 0;
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
                <form action="guardarDetalleMetodoEntidad.php" method="POST" name="formularioActualizarcliente" style="width:100%">




                  <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                  <label>Método de pago</label>
                  <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>
                    <option value="">Seleccione...</option>
                    <?php
                    //aqui se admite el numero de pago con id = 5 para el apartado de puntos
                    $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                    while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                      $MedioPago_id = $RowMedioPago['id'];
                      $Nombre_MedioPago = $RowMedioPago['Nombre'];

                      echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";
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
                  <input type="hidden" name="id_cliente" value="0">
                  <input type="hidden" name="convenio_id" value="<?=$convenio_id;?>">
                  <input type="hidden" name="id_historia" value="<?php echo $historiaClinica1 ?>">
                  <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">

                  <input type="hidden" name="tipo" value="10">

                </form>
              </div>






              <div class="col-md-12">
                <!-- no modificar el id del formulario se usa para varias cosas -->
                <form id="totalizarFactura" action="EN_TotalizarFacturaEntidad.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
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

                    <input type="hidden" name="convenio_id"  value="<?php echo $convenio_id_cliente_factura; ?>">

                    <input type="hidden" name="tipo" value="10">
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

