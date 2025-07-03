<?php
include 'header.php';
include 'menu.php';

if ($_POST) {
  $accion = $_POST['accion'];
  $arreglo = $_POST['arreglo'];





  //////////////////////////////////////////////////////? Crear nuevo Campo ///////////////////////////////////////////////////////
  //cajaMenor
  
  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenor WHERE Field = 'activo';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenor` ADD `activo` TEXT NULL DEFAULT '1' COMMENT ' *Creado desde Caja Mejor*'");
  }
  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenor WHERE Field = 'saldo_inicial';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenor` ADD `saldo_inicial` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenorDetalle WHERE Field = 'proveedor_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenorDetalle` ADD `proveedor_id` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }
  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenorDetalle WHERE Field = 'cuenta_debe';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenorDetalle` ADD `cuenta_debe` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }
  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenorDetalle WHERE Field = 'cuenta_haber';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenorDetalle` ADD `cuenta_haber` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenorDetalle WHERE Field = 'Movimiento_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenorDetalle` ADD `Movimiento_id` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiario WHERE Field = 'Hora';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `CCompDiario` ADD `Hora` TIME NULL DEFAULT CURRENT_TIMESTAMP  COMMENT ' *Creado desde Caja Mejor*'");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from cajaMenorDetalle WHERE Field = 'idUsuario';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `cajaMenorDetalle` ADD `idUsuario` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Caja Mejor*'");
  }

  // recorreo el arreglo y lo guardo en una variable para insertarlo en la base de datos
  $cadena = "";
  foreach ($arreglo as $key => $value) {
    // si el campo que recibo es fecha lo guardo en formato yyyy-mm-dd hh:mm:ss
    if (stristr($key, 'fecha') === FALSE) {
      $cadena .= "'" . $value . "',";
    } else {
      $cadena .= "'" . date('Y-m-d', strtotime($value)) . " " . date('H:i:s') . "',";
    }
    $titulos .= $key . ",";
  }
  $cadena = substr($cadena, 0, -1);
  $titulos = substr($titulos, 0, -1);

  // accion 1 - Nuevo registro a cajaMenor
  // accion 2 - Nuevo registro a cajaMenorDetalle

  /*
  if ($accion == 1) {
    $tabla = "cajaMenor";
  } else if ($accion == 2) {
    $tabla = "cajaMenorDetalle";
  } else if ($accion == 3) {
    $tabla = "asdasdasdasdas";
  }
  */
  

  if ($accion == 1) {

    $tabla = "cajaMenor";
    $sql = "INSERT INTO $tabla ($titulos,saldo_inicial) VALUES ($cadena,'$arreglo[saldo]')";
    // inserto el arreglo en la base de datos
    $result = mysqli_query($conn3, $sql) or die ("Error en la consulta: " . mysqli_error($conn3));
    // recibimos el ultimo id insertado
    $id = mysqli_insert_id($conn3);


    // si se creo la caja menor, entonces se crea el primer detalle de apertura
    $sql = "INSERT INTO cajaMenorDetalle (idCajaMenor, fecha, documento, descripcion, monto, tipo, saldo, cuenta_debe,cuenta_haber,idUsuario) 
    VALUES
    ('$id', now(), 'Apertura', 'Apertura de caja menor', '$arreglo[saldo]', '/', '$arreglo[saldo]', '$_POST[cuenta]', '$_POST[cuenta_haber]', '$arreglo[idUsuario]')";
    $result = mysqli_query($conn3, $sql);
    $idDetalleCaja = mysqli_insert_id($conn3);
    if ($result) {
      
      $idCaja = $id;
      $idOrigen = $id;
      // **********************************
      foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
        //Validamos que el archivo exista
        if ($_FILES["archivo"]["name"][$key]) {
          $NombreVisual = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
          $filename = strtotime("now") . "_" . $_FILES["archivo"]["name"][$key]; //le agregamos la hora unix actual para que no se repita
          $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
          $directorio = 'archivosCajaMenor'; //Declaramos un  variable con la ruta donde guardaremos los archivos
          //Validamos si la ruta de destino existe, en caso de no existir la creamos
          if (!file_exists($directorio)) {
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
          }
          $dir = opendir($directorio); //Abrimos el directorio de destino
          $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
          //Movemos y validamos que el archivo se haya cargado correctamente
          //El primer campo es el origen y el segundo el destino
          if (move_uploaded_file($source, $target_path)) {
            // area => 1 => proveedores
            // area => 2 => facturacion
            // area => 3 => bancos
            // area => 4 => cajaMenor
            $prepare = preparePost([
              'idOrigen' => $idOrigen,
              'ruta' => $target_path,
              'area' => 4,
              'nameArea' => 'cajaMenor'
            ]);
            mysqli_query($conn3, "INSERT INTO ArchivosAdministrativos SET {$prepare}") or die(mysqli_error($conn3));
          } else {
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
          }
          closedir($dir); //Cerramos el directorio de destino
        }
      }
      // **********************************


      ////////////////////////////? Generar Comprobante ///////////////////////////////////////////////////////

      $queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 0");
      while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $ultimo = $row_recordset32['ultimo'];
      }
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $queryList = mysqli_query($conn3, "SELECT numero FROM CCompDiario where id = $ultimo");
      while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $ComprobanteNumero = $row_recordset32['numero'];
      }
      $Comprobante_array = explode("-", $ComprobanteNumero);
      $valornumerico = (int)$Comprobante_array[1];
      $actual = $valornumerico + 1;
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $fechaComprobante = date("Y-m-d");
      $numerocomprobante = "CD-" . str_pad($actual, 6, "0", STR_PAD_LEFT);

      ////////////////////////////? Generar Comprobante ///////////////////////////////////////////////////////




      //////////////////////////////? Generar Movimiento General //////////////////////////////////////////////

      $SaldoGeneral = $arreglo['saldo'];
      $Movimientos = "2";
      $idCentroCosto = "0";
      $id_usuario = $arreglo['idUsuario'];
      $tercero_id = "0";
      mysqli_query($conn3, "INSERT INTO CCompDiario 
      (numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
      values 
      ('$numerocomprobante','$fechaComprobante',0,0,'Apertura Caja Menor #{$idCaja}','$SaldoGeneral','$SaldoGeneral','$Movimientos','','0','$idCentroCosto','0','$id_usuario', '$tercero_id', '0')") or die(mysqli_error($conn3));
      $ultimoCompDiarios = mysqli_insert_id($conn3);

      //update cajaMenorDetalle id = $idDetalleCaja
        mysqli_query($conn3,"UPDATE cajaMenorDetalle SET Movimiento_id = '$ultimoCompDiarios' WHERE id = '$idDetalleCaja' LIMIT 1");

      //////////////////////////////? Generar Movimiento //////////////////////////////////////////////

      
      $cuenta_arreglo = $_POST['cuenta'];
      $descripcion_arreglo = funcionMaster($_POST['cuenta'],'id','descripcion','CCuentas');
      $debe_arreglo = $arreglo["saldo"]; 
      $haber_arreglo = "0";
      $referencia_arreglo = "Caja Menor Cuenta Debe";

      mysqli_query($conn3, "INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
      ('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));
      
      //////////////////////////////? Generar Movimiento #2 //////////////////////////////////////////////

      $cuenta_arreglo = $_POST['cuenta_haber'];
      $descripcion_arreglo = funcionMaster($_POST['cuenta_haber'],'id','descripcion','CCuentas');
      $debe_arreglo = "0";
      $haber_arreglo = $arreglo["saldo"]; 
      $referencia_arreglo = "Caja Menor Cuenta Haber";

      mysqli_query($conn3, "INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
      ('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));

      //////////////////////////////? [CIERRE]  Generar Movimiento //////////////////////////////////////////////

    }
  } else if ($accion == 2) {


    $tabla = "cajaMenorDetalle";
    $sql = "INSERT INTO $tabla ($titulos,cuenta_debe,cuenta_haber) VALUES ($cadena, '$_POST[cuenta]', '$_POST[cuenta_haber]')" or die (mysqli_error($conn3));
    $result = mysqli_query($conn3, $sql);
    $idDetalleCaja = mysqli_insert_id($conn3);


    // si se inserta otro detalle a la caja leemos el id anterior y lo sumamos o restamos segun el tipo de operacion y se lo asignamos al saldo en cajaMenor y cajaMenorDetalle
    
    // traemos el saldo anterior de cajaMenor
    $sql = "SELECT saldo FROM cajaMenor WHERE id = '$arreglo[idCajaMenor]'";
    $result = mysqli_query($conn3, $sql);
    $row = mysqli_fetch_assoc($result);
    $saldoAnterior = $row['saldo'];

    // sumamos o restamos segun el tipo de operacion
    if ($arreglo['tipo'] == 'Entrada') {
      $saldo = round($saldoAnterior + $arreglo['monto'],2);
    } else if ($arreglo['tipo'] == 'Salida') {
      $saldo = round($saldoAnterior - $arreglo['monto'],2);
    }

    // actualizamos el saldo en cajaMenor
    $sql = "UPDATE cajaMenor SET saldo = '$saldo' WHERE id = '$arreglo[idCajaMenor]'";
    $result = mysqli_query($conn3, $sql);

    // actualizamos el saldo en cajaMenorDetalle
    $sql = "UPDATE cajaMenorDetalle SET saldo = '$saldo' WHERE id = '$idDetalleCaja'";
    $result = mysqli_query($conn3, $sql);


    $idOrigen = $idDetalleCaja;
    // **********************************
    foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
      //Validamos que el archivo exista
      if ($_FILES["archivo"]["name"][$key]) {
        $NombreVisual = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
        $filename = strtotime("now") . "_" . $_FILES["archivo"]["name"][$key]; //le agregamos la hora unix actual para que no se repita
        $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $directorio = 'archivosCajaMenor'; //Declaramos un  variable con la ruta donde guardaremos los archivos
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if (!file_exists($directorio)) {
          mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }
        $dir = opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if (move_uploaded_file($source, $target_path)) {
          // area => 1 => proveedores
          // area => 2 => facturacion
          // area => 3 => bancos
          // area => 4 => cajaMenor
          $prepare = preparePost([
            'idOrigen' => $idOrigen,
            'ruta' => $target_path,
            'area' => 4,
            'nameArea' => 'cajaMenor'
          ]);
          mysqli_query($conn3, "INSERT INTO ArchivosAdministrativos SET {$prepare}") or die(mysqli_error($conn3));
        } else {
          echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
      }
    }
    // **********************************


    if($result){
      

      ////////////////////////////? Generar Comprobante ///////////////////////////////////////////////////////

      $queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 0");
      while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $ultimo = $row_recordset32['ultimo'];
      }
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $queryList = mysqli_query($conn3, "SELECT numero FROM CCompDiario where id = $ultimo");
      while ($row_recordset32 = mysqli_fetch_array($queryList)) {
        $ComprobanteNumero = $row_recordset32['numero'];
      }
      $Comprobante_array = explode("-", $ComprobanteNumero);
      $valornumerico = (int)$Comprobante_array[1];
      $actual = $valornumerico + 1;
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $fechaComprobante = date("Y-m-d");
      $numerocomprobante = "CD-" . str_pad($actual, 6, "0", STR_PAD_LEFT);

      ////////////////////////////? Generar Comprobante ///////////////////////////////////////////////////////




      //////////////////////////////? Generar Movimiento General //////////////////////////////////////////////
      $idCajaMenor = $arreglo['idCajaMenor'];
      $Tipo = $arreglo['tipo'];
      $SaldoGeneral = $arreglo['monto'];
      $Movimientos = "2";
      $idCentroCosto = "0";
      $id_usuario = $arreglo['idUsuario'];
      $tercero_id = $arreglo['proveedor_id'];
      mysqli_query($conn3, "INSERT INTO CCompDiario 
      (numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
      values 
      ('$numerocomprobante','$fechaComprobante',0,0,'Detalle Caja Menor #{$idCajaMenor}','$SaldoGeneral','$SaldoGeneral','$Movimientos','','0','$idCentroCosto','0','$id_usuario', '$tercero_id', '2')") or die(mysqli_error($conn3));
      $ultimoCompDiarios = mysqli_insert_id($conn3);

      //update cajaMenorDetalle id = $idDetalleCaja
        mysqli_query($conn3,"UPDATE cajaMenorDetalle SET Movimiento_id = '$ultimoCompDiarios' WHERE id = '$idDetalleCaja' LIMIT 1");

      //////////////////////////////? Generar Movimiento //////////////////////////////////////////////

      
      $cuenta_arreglo = $_POST['cuenta'];
      $descripcion_arreglo = funcionMaster($_POST['cuenta'],'id','descripcion','CCuentas');
      $debe_arreglo = $arreglo["monto"]; 
      $haber_arreglo = "0";
      $referencia_arreglo = "Caja Menor Cuenta Debe | ".$arreglo['descripcion'];

      mysqli_query($conn3, "INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
      ('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));
      
      //////////////////////////////? Generar Movimiento #2 //////////////////////////////////////////////

      $cuenta_arreglo = $_POST['cuenta_haber'];
      $descripcion_arreglo = funcionMaster($_POST['cuenta_haber'],'id','descripcion','CCuentas');
      $debe_arreglo = "0";
      $haber_arreglo = $arreglo["monto"]; 
      $referencia_arreglo = "Caja Menor Cuenta Haber | ".$arreglo['descripcion'];

      mysqli_query($conn3, "INSERT INTO CCompDiarioMov  (numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante) values  
      ('$numerocomprobante','$fechaComprobante',0,0,0,'$cuenta_arreglo',0,'$descripcion_arreglo','$debe_arreglo','$haber_arreglo','$referencia_arreglo','$ultimoCompDiarios')") or die(mysqli_error($conn3));

      //////////////////////////////? [CIERRE]  Generar Movimiento //////////////////////////////////////////////

      
    }









  } else if ($accion == 3) {
    // cerrar caja menor
    $id = $_POST['id'];
    $query = "UPDATE cajaMenor set activo = 0 where id = $id";
    $result = mysqli_query($conn3, $query);
  }

  if ($result) {
    echo "<script>window.alert('Registro insertado correctamente')</script>";
  } else {
    echo "<script>window.alert('Error al insertar registro')</script>";
  }

  // recargamos la pagina
  echo "<script>window.location.href='Caja_Menor'</script>";
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
            <li><a href="#"> Caja Menor </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Caja Menor </h4>
                <div class="box" id="corteX">
                    <div class="box-body">





                    <div class="box-body">
                          <?php
                          $idUsuario = $_SESSION['ID'];
                          // consulta a cajaMenor
                          $date = date('Y-m-d');
                          // $query = "SELECT * from cajaMenor where '$date' >= fechaInicio and '$date' <= fechaFin and idUsuario = $idUsuario limit 1";
                          $query = "SELECT * from cajaMenor where  idUsuario = $idUsuario and activo = 1 limit 1";

                          $result = mysqli_query($conn3, $query);
                          $row = mysqli_fetch_assoc($result);
                          $id = $row['id'];
                          $fechaInicio = date('Y-m-d', strtotime($row['fechaInicio']));
                          $fechaFin = date('Y-m-d', strtotime($row['fechaFin']));
                          $motivo = $row['motivo'];
                          $saldo = $row['saldo'];

                          // consulta de totales de cajaMenorDetalle
                          $totalEntradas = 0;
                          $totalSalidas = 0;
                          $query = "SELECT * from cajaMenorDetalle where idCajaMenor = '$id'";
                          $result = mysqli_query($conn3, $query);
                          while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['tipo'] == 'Entrada') {
                              $totalEntradas += $row['monto'];
                            } else if ($row['tipo'] == 'Salida') {
                              $totalSalidas += $row['monto'];
                            }
                          }




                          if ($id > 0) {
                          ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#modelId">
                              Ingreso a Caja Menor <i class="fas fa-plus-circle"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Caja Menor - <strong>#<?= $id ?></strong> <br> Vigencia: <strong><?= $fechaInicio ?></strong> a <strong><?= $fechaFin ?></strong></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="Caja_Menor" method="POST" enctype="multipart/form-data">

                                      <div class="form-group">
                                        <label for="">Proveedor</label>
                                        <select class="form-control input-lg select" name="arreglo[proveedor_id]" required >
                                          <option value="" selected disabled>Seleccione</option>
                                          <?php
                                          $resultProveedor = mysqli_query($conn3, "SELECT * FROM sproveedores WHERE Activo = '1' ");
                                          while ($rowProveedor = mysqli_fetch_array($resultProveedor)) {
                                            echo '<option value="' . $rowProveedor['id'] . '">' . $rowProveedor['nombre'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="">Fecha Inicio</label>
                                        <input type="date" class="form-control" name="arreglo[fecha]" value="<?= date('Y-m-d') ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Documento</label>
                                        <input type="text" class="form-control" name="arreglo[documento]" value="N/A" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Descripción</label>
                                        <input type="text" class="form-control" name="arreglo[descripcion]" required>
                                      </div>

                                      <div class="form-group">
                                        <label for="">Tipo</label>
                                        <select name="arreglo[tipo]" id="tipo" class="form-control" onchange="ActualizarMonto()">
                                          <option value="Salida">Salida</option>
                                          <option value="Entrada">Entrada</option>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="">Monto</label>
                                        <input type="number" step="0.01" class="form-control" name="arreglo[monto]" id="monto" max='<?=$saldo;?>'  required>

                                        <input type="hidden" step="0.01" class="form-control" name="monto_estatico" id="monto_estatico" value='<?=$saldo;?>'  required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Categoria</label>
                                        <select required class="form-control" id="categoria" name="arreglo[categoria]">
                                          <?php
                                          $query = mysqli_query($conn3, "SELECT * FROM cajaMenorCategorias WHERE estado='1'");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id'] . '">' . $row['descripcion'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="archivo">Documentos</label>
                                        <input type="file" placeholder="archivos" name="archivo[]" id="archivo" class="form-control input-lg" multiple>
                                      </div>
                                      

                                      <div class="form-group">
                                        <label for="cuenta">Cuenta *Debe*</label>
                                        <select name="cuenta" id="cuenta" class="form-control input-lg select2" style="width: 100%" required>
                                          <option value="" selected disabled>Seleccione..</option>
                                          <?php
                                          $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id'] . '">' .$row['id']." - ". $row['descripcion'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="cuenta">Cuenta *Haber*</label>
                                        <select name="cuenta_haber" id="cuenta_haber" class="form-control input-lg select2" style="width: 100%" required>
                                          <option value="" selected disabled>Seleccione..</option>
                                          <?php
                                          $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id'] . '">' .$row['id']." - ".$row['descripcion'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>


                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-block btn-outline-primary btn-lg rounded-pill shadow">Agregar</button>
                                    <input type="hidden" name="accion" value="2">
                                    <input type="hidden" name="arreglo[idCajaMenor]" value="<?= $id ?>">
                                    <input type="hidden" name="arreglo[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                          } else {
                          ?>
                            <!-- Button trigger modal -->
                            <h5>No hay Caja Menor activa</h5>
                            <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#modalNuevo">
                              Nueva Caja Menor <i class="fas fa-plus"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Nueva Caja Menor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="Caja_Menor" method="POST" enctype="multipart/form-data">

                                      

                                      <div class="form-group">
                                        <label for="">Fecha Inicio</label>
                                        <input type="date" class="form-control" name="arreglo[fechaInicio]" value="<?= date('Y-m-d') ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Fecha Fin</label>
                                        <input type="date" class="form-control" name="arreglo[fechaFin]" value="<?= date('Y-m-t') ?>" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Titulo / Motivo</label>
                                        <input type="text" class="form-control" name="arreglo[motivo]" value="Caja Menor: " required>
                                      </div>
                                      <div class="form-group">
                                        <label for="">Saldo Inicial</label>
                                        <input type="number" value="0" step="0.01" class="form-control" name="arreglo[saldo]" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="archivo">Documentos</label>
                                        <input type="file" placeholder="archivos" name="archivo[]" id="archivo" class="form-control input-lg" multiple>
                                      </div>
                                      <div class="form-group">
                                        <label for="cuenta">Cuenta *Debe*</label>
                                        <select name="cuenta" id="cuenta" class="form-control input-lg select2" style="width: 100%" required>
                                          <option value="" selected disabled>Seleccione..</option>
                                          <?php
                                          $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id'] . '">' .$row['id']." - ". $row['descripcion'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="cuenta">Cuenta *Haber*</label>
                                        <select name="cuenta_haber" id="cuenta_haber" class="form-control input-lg select2" style="width: 100%" required>
                                          <option value="" selected disabled>Seleccione..</option>
                                          <?php
                                          $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                          while ($row = mysqli_fetch_array($query)) {
                                            echo '<option value="' . $row['id'] . '">' .$row['id']." - ".$row['descripcion'] . '</option>';
                                          }
                                          ?>
                                        </select>
                                      </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-block btn-outline-primary btn-lg rounded-pill shadow">Agregar</button>
                                    <input type="hidden" name="accion" value="1">
                                    <input type="hidden" name="arreglo[activo]" value="1">
                                    <input type="hidden" name="arreglo[idUsuario]" value="<?= $_SESSION['ID'] ?>">
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                          }
                          ?>

                          <div class="col-md-12">
                            <?php
                            if ($id > 0) {
                            ?>
                              <br>
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" data-toggle="modal" data-target="#cerrarCaja">
                                Cerrar Caja <i class="fa fa-close"></i>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="cerrarCaja" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Cerrar Caja Actual</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <span class="text text-danger">Seguro que desea la caja actual?</span>
                                    </div>
                                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                      <div class="modal-footer">
                                        <input type="hidden" name="accion" value="3">
                                        <input type="hidden" name="id" value="<?= $id ?>">
                                        <button type="button" class="btn btn-block btn-outline-warning btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow">Cerrar Caja</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              <h5>
                                Caja Menor - <strong>#<?= $id ?></strong> <br> Vigencia: <strong><?= $fechaInicio ?></strong> a <strong><?= $fechaFin ?></strong>
                              </h5>
                              <table class="table table-bordered table-striped">
                                <tr>
                                  <th>Totales</th>
                                </tr>
                                <tr>
                                  <td>Entrada: <?= number_format($totalEntradas, 2, ',', '.') ?> </td>
                                  <td>Salida: <?= number_format($totalSalidas, 2, ',', '.') ?> </td>
                                  <td>Saldo: <?= number_format($saldo, 2, ',', '.') ?> </td>
                                </tr>
                              </table>
                              <hr>
                              <table id="" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th>Fecha</th>
                                    <th>Documento</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Tipo</th>
                                    <th>Saldo</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $sql = "SELECT * FROM cajaMenorDetalle WHERE idCajaMenor = '$id'";
                                  $result = mysqli_query($conn3, $sql);
                                  while ($row = mysqli_fetch_array($result)) {
                                  ?>
                                    <tr>
                                      <td><?= $row['fecha'] ?></td>
                                      <td><?= $row['documento'] ?></td>
                                      <td><?= $row['descripcion'] ?></td>
                                      <td><?= number_format($row['monto'], 2, ',', '.') ?></td>
                                      <td><?= $row['tipo'] ?></td>
                                      <td><?= number_format($row['saldo'], 2, ',', '.') ?></td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>

                            <?php
                            } else {
                            }
                            ?>
                            <hr>
                            <a href="Caja_Menor_historico" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              Histórico de Caja Menor <i class="fas fa-file"></i>
                            </a>
                            <a href="Reporte_CajaMenor" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                              Reportes de Caja Menor <i class="fas fa-file"></i>
                            </a>

                          </div>



                        </div>
                        <!-- /.box-body -->





                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include 'footer.php';
?>

<script>

  function ActualizarMonto(){
    var valor = $("#tipo").val();

      $("#monto").removeAttr("max");
      $("#monto").val("");
      if(valor == "Salida") {
        $("#monto").attr("max", $("#monto_estatico").val());
      }

  }
</script>