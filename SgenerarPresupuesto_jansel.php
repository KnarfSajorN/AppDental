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

  $totalbase = round($base * $cantidad,2);

  $SinvDep_id = $_POST['SinvDep_id'];
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

  $valor_calculado = round($totalbase - $descuento_final,2);

  if ("$valor_calculado" != "$subTotal") {
    $subtotal = round($totalbase - $descuento_final,2);
    $Mensaje = "[F]";
  }

  ////////////////////apartado iva
  $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
  if($iva!="" AND $iva != "0") {
      // Calcular el monto del IVA
      $ivaMonto = round((($subTotal * $iva) / 100),2);

      // Sumar el monto del IVA al subtotal
      $totalConIva = round($subTotal + $ivaMonto,2);
  }else{
        $iva=0;
        $ivaMonto=0;
        $totalConIva = round($subTotal,2);  
  }
  //////////////////////////////////

  $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
  subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
  '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','2','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
  //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";


  $ruta = htmlentities($_SERVER['PHP_SELF']);
  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }
}



if (isset($_GET['borrar'])) {
  $id = $_GET['borrar'];
  $historiaClinica1 = $_GET['historiaClinica1'];
  $tipo_historia  = $_GET['tipo_historia'];


  // mysqli_query($conn3, "DELETE FROM sDetalleOperPendites WHERE id = '{$id}' limit 1;");
  mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE id = '{$id}' limit 1;");


  $clienteId = $_GET["clienteId"];
  $ruta = htmlentities($_SERVER['PHP_SELF']);
  echo "<script language='Javascript'>window.location='{$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&error=Se Borro el Producto'</script>";
}



if(isset($_POST['GuardarDetalleServiciosEmpresaAfiliada'])){


  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOperPendites WHERE Field = 'Servicio_EmpresaAfiliadas_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOperPendites` ADD `Servicio_EmpresaAfiliadas_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla empresasAfiliadas_Servicios *Creado desde modulo de factura*';");
  }

  $Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'Servicio_EmpresaAfiliadas_id';");
  $nrowCampo1 = mysqli_num_rows($Campo1);
  if ($nrowCampo1 == "0") {
    mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `Servicio_EmpresaAfiliadas_id` INT(11) NULL DEFAULT '0'  COMMENT 'este campo es el id de la tabla empresasAfiliadas_Servicios *Creado desde modulo de factura*';");
  }

  date_default_timezone_set('America/Bogota');

  $ProductoEmpresaAfiliada = $_POST["ProductoEmpresaAfiliada"];
  $Deposito_id = $_POST['deposito_SaludOcupacional'];

  $usuario_id = $_POST['usuario_id'];
  $cliente_id = $_POST['cliente_id'];
  $tipo_historia = $_POST['tipo_historia'];
  $historia = $_POST['historia'];

  $cantidad = $_POST['cantidad'];


  $queryListPaquetes = mysqli_query($conn3, "SELECT * FROM  empresasAfiliadas_Servicios where id = $ProductoEmpresaAfiliada and Activo='1' ");
  if($queryListPaquetes){
  while ($row_recordset32 = mysqli_fetch_array($queryListPaquetes)) {
    $Servicio_EmpresaAfiliadas_id_1 = $row_recordset32["id"];
    $idOperacion = 0;
    $fechaRegistro = date("Y-m-d H:i:s");
    $codigoProd = $row_recordset32["inventario_id"];
    $precio = $row_recordset32['Precio'];

    $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));
    $base = $precio;
    $impuesto = 0;

    


    $descuento_base = "0";

    $totalbase = round($base * $cantidad,2);
    $subTotal = $totalbase;

    $TipoProducto = funcionMaster($codigoProd, 'ID', 'tipo', 'sinvetrios');
    $ClasificacionTipo = funcionMaster($TipoProducto, 'id', 'tipo', 'scategoria');

    
    $SinvDep_id = "0";
    $QueryInvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where idDep = $Deposito_id AND idSinvetrios = '$codigoProd'");
    if($QueryInvDep){
      while ($RowInvDep = mysqli_fetch_array($QueryInvDep)) {
        $SinvDep_id = $RowInvDep['id'];
      }
    }
    

    if (strpos($descuento_base, '%') !== false) {

      $descuentos = str_replace("%", "", "$descuento_base");
      $descuentos = ($descuentos / 100);
      $descuento_final = round(($totalbase * $descuentos), 2);
      //echo "porcentaje";
    } else {
      $descuento_final = $descuento_base;
      //echo "numerico";
    }

    $valor_calculado = round($totalbase - $descuento_final,2);

    if ("$valor_calculado" != "$subTotal") {
      $subtotal = round($totalbase - $descuento_final,2);
      $Mensaje = "[F]";
    }

    ////////////////////apartado iva
    $iva = funcionMaster($codigoProd, 'ID', 'iva', 'sinvetrios');
    if($iva!="" AND $iva != "0") {
        // Calcular el monto del IVA
        $ivaMonto = round((($subTotal * $iva) / 100),2);

        // Sumar el monto del IVA al subtotal
        $totalConIva = round($subTotal + $ivaMonto,2);
    }else{
          $iva=0;
          $ivaMonto=0;
          $totalConIva = round($subTotal,2);  
    }
    //////////////////////////////////


    if($ClasificacionTipo=="1" OR $ClasificacionTipo=="2"){
      $queryList = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, 
      subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,tipo,Servicio_EmpresaAfiliadas_id,Tipo_Producto,SinvDep_id,Deposito_id,Impuesto_Numerico,Impuesto_Textual,Total) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base',
      '$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base','2','$Servicio_EmpresaAfiliadas_id_1','Inventario_Empresa_Afiliada','$SinvDep_id','$Deposito_id','$ivaMonto','$iva','$totalConIva');") or die(mysqli_error($conn3));
      //echo "INSERT INTO sDetalleOperPendites (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual) VALUES ('$idOperacion','$fechaRegistro', '$codigoProd','$cantidad','$descripcion','$base','$impuesto', '$totalbase', '$subTotal', '$usuario_id', '$cliente_id','$descuento_final','$descuento_base');";
    }

  }
}






  $ruta = htmlentities($_SERVER['PHP_SELF']);

  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&error=Hubo Un Error Al Guardar Los Datos $Mensaje '</script>";
  } else {
    echo "<script language='Javascript'> window.location='{$ruta}?clienteId={$cliente_id}&tipo_historia=$tipo_historia&historiaClinica1=$historia&msg=Se Guardaron Los Datos Correctamente $Mensaje '</script>";
  }



}








$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $ID_Usuario");
// $nrowl = mysqli_num_rows($queryList);
if($queryList){
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
  }
}


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
// $nrowl = mysqli_num_rows($queryList);
if($queryList){
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
    $empresaAfiliada_id = $rowMotorizado['idEmpresa'];
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
$Deposito_id="0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = $clienteId AND tipo = '2' order by id");
if($resultado){
  while ($fila = mysqli_fetch_array($resultado)) {
      $Deposito_id=$fila["Deposito_id"];
  }
}

if($Deposito_id!="0" AND $Deposito_id!=""){
    $DesabilitarDep="readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////






//////////////////////////////////////////////////////////////////////////////////////////////////////////////



function MostrarBotonesFacturacionAdicional($Nombre,$Usuario_id){

  include 'funciones/conn3.php';

  $queryList = mysqli_query($conn3, "SELECT * FROM main_menu WHERE tabla = '$Nombre'");
                if($queryList){
                  while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                    $menu_id_paquete = $row_recordset32['id'];
                  }
                }
                

                $MenuActivo = 0;
                $grupo = funcionMaster($Usuario_id, 'ID', 'menu', 'usuarios');
                $QueryMenu = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id = '$grupo'");
                if($QueryMenu){
                  while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                    $Arreglo_Grupos = json_decode($RowMenu['Arreglo_Grupos']);
                    foreach ($Arreglo_Grupos as $key => $value) {
                      $ArregloMenuFinal = [];
                      $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
                      if($querySubmenu){
                        while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
                          $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
                        }
                      }
                      
                      foreach ($ArregloMenu as $key1 => $value1) {
                        if ($value1["Activo"] == "1" and $value1["id"] == "$menu_id_paquete") {
                          $MenuActivo = "1";
                        }
                      }
                    }
                  }
                }
                

                return $MenuActivo;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
<style>

  .select2-selection--multiple.select2-selection--multiple.select2-selection--multiple {
    min-height: 45px !important;
    padding: 5px !important;
  }

  .select2-container .select2-selection--single {
    height: 45px !important;
    padding: 15px !important;
  }
  </style>
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
  <div class="">

    <!-- /.box-header -->
    <div class="">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Generar Presupuesto

        </h1>
        <ol class="breadcrumb">
          <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
          <li><a href="#">Generar Presupuesto</a></li>


        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="">
          <div class="col-xs-12">

            <div class="box">

              <!-- /.box-header -->
              <div class="box-body">

              <?php echo datosPacientesReducido($clienteId); ?>
              

              </div>

                <div align="left" style="padding-bottom: 15px;padding-top: 15px;display:flex; flex-direction: row; align-items:center; width:100%">
                <a style="padding-left: 15px;margin:10px" class='btn btn-outline-info  rounded-pill shadow' onclick="MostrarTipoFactura('Simple_Formulario');">Seleccionar Por Producto</a>
                <?php

                $MenuEmpresaAfiliadas=0;
                $MenuEmpresaAfiliadas = MostrarBotonesFacturacionAdicional("empresasAfiliadas",$_SESSION['ID']);


                if ($MenuEmpresaAfiliadas == "1") {
                  ?>
                    || <a onclick="MostrarTipoFactura('Servicios_EmpresasAfiliadas_SaludOcupacional');" style="margin:10px" class='btn btn-outline-info  rounded-pill shadow'>Seleccionar Por Empresa Afiliada [Salud Ocupacional]</a>
                  <?php
                  }

                ?>
                                  <div align="left" style="padding-bottom: 15px;padding-top: 15px;">
                                    <a style="padding-left: 15px;" class='btn btn-outline-info  rounded-pill btn-sm' onclick="MostrarTipoFactura('Simple_Formulario');">Producto Inventario</a>
                                    <a onclick="MostrarTipoFactura('Abierto_Formulario');" style="" class='btn btn-outline-info  rounded-pill btn-sm'>Cuenta Contable</a>
                                </div>
                    

              </div>




                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" name="formularioActualizarcliente" id="Simple_Formulario">
                  <div class="form-row">

                      <div class="form-group col-md-12">
                        <label><strong> Depósito</strong></label>
                        <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?=$DesabilitarDep;?> required>
                        <?php
                        $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                        while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                            $idDP = $rowMotorizadoDP['id'];
                            $descripcionDP = $rowMotorizadoDP['descripcion'];

                            if($Deposito_id!="" AND $Deposito_id == $idDP){
                            echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                            }else{
                            echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                            }
                                                        
                        }
                        ?>
                        </select>
                        <?php
                        if($DesabilitarDep!=""){
                            echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                                e.preventDefault(); // Evita que se abra el menú desplegable
                                this.blur(); // Quítale el enfoque al elemento
                            });</script>';
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

                                  //el filtro es para que los productos tipos activos [tipo=>6] no se deben facturar 
                                  $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                  JOIN scategoria sca ON si.tipo = sca.id
                                  WHERE 1=1
                                  AND si.estado = 1
                                  AND sca.tipo in (1,2,3,5)");
                                  while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                      $descripcion     = $row_recordset32['descripcion'];
                                      $ID              = $row_recordset32['ID'];

                                      echo "<option value='$ID'> $descripcion </option>";
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
                          <input type="number" step="0.01" class="form-control input-lg" id="2" name="base" placeholder="precio" onchange="multiplicar();" value="" required>
                      </div>

                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="number" class="form-control input-lg" id="1" name="cantidad"   placeholder="cantidad" onChange="multiplicar();" required>
                      <div align="left" id="informacion_existencia"></div>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Descuento</label>
                      <input type="text" class="form-control input-lg" id="descuento" name="descuento" placeholder="descuento" value="0" pattern="[0-9.%]+" step="any" oninput="ValidarInput(this)" required>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Subtotal</label>
                      <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
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
                    <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                    <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                    <input type="hidden" name="tipo_cliente" valur="1">
                    </div>
                </form>










                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?clienteId=<?php echo $clienteId; ?>" method="POST" id="Servicios_EmpresasAfiliadas_SaludOcupacional" style="display:none;">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                      <label><strong> Descripcion</strong></label>
                      <input type="text" class="form-control input-lg" id="descripcion" name="codigoProod_texto" placeholder="descripcion" required>
                  </div>

                  <div class="form-group col-md-3">
                          <div align="left">
                              <label> Precio </label>
                          </div>
                          <input type="number" step="0.01" class="form-control input-lg" id="2" name="2_Libre" placeholder="precio" onchange="multiplicarProductoLibre();" value="" required>
                      </div>

                    <div class="form-group col-md-2">
                      <label>Cantidad</label>
                      <input type="number" class="form-control input-lg" id="1_Libre" name="cantidad"   placeholder="cantidad" onchange="multiplicarProductoLibre();" required>
                      <div align="left" id="informacion_existencia"></div>
                    </div>

                    <div class="form-group col-md-2">
                      
                      <input type="hidden" class="form-control input-lg" id="descuento_libre" name="descuento" value="0">
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
                <table class="table table-striped TablaDetalle">
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


                      $id_usuario_detalle = $_SESSION['ID'];

                      $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where  estado = 1 and  id_usuario =$id_usuario_detalle and  id_cliente = $clienteId AND tipo=2 order by id");
                      //$check = mysqli_num_rows($q);
                      while ($fila = mysqli_fetch_array($resultado)) {
                        //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                        $Numero++;
                        $ruta = htmlentities($_SERVER['PHP_SELF']);

                        $totalbase = $fila['totalbase'];
                        $subTotal = $fila['subTotal'];

                        $descuentoValor = $fila['Descuento_Numerico'];

                        $Descripcion = $fila['descripcion'];

                        $SinvDep_id = $fila['SinvDep_id'];
                        $idProductoT = $fila['idProducto'];
                        $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT,$SinvDep_id);
                        if($MasDetalles!=""){
                          $Descripcion .= $MasDetalles;
                        }


                        echo '     <tr>
                    <td  width="5%">' . $Numero .' '.$CampoAdicionalSerial. ' </td>
                    <td width="20%">' . $Descripcion. ' </td>
                    <td width="15%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                    <td width="10%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                    <td width="15%"><div align="center">' . number_format($descuentoValor,2) . '' . $moneda . '</div></td>
                    <td width="15%"><div align="Right">' . number_format($fila['subTotal'],2) . '' . $moneda . '</div></td>';

                        echo "<td width='1%'><a href={$ruta}?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                        echo '</tr>';

                        $totalCant += $fila['cantidad'];
                        $totalBase +=  $fila['base'];
                        $total += $fila['subTotal'];

                        $ImpuestoDetalles += $fila['Impuesto_Numerico'];
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
                        <div align="Right"><?php echo number_format($totalBase,2) . ' ' . $moneda; ?> </div>
                      </th>
                      <th>
                        <div align="Right"><?php echo $totalCant ?></div>
                      </th>

                      <th>
                        <div align="center"><?php echo number_format($totaldesc,2) . ' ' . $moneda; ?> </div>
                      </th>
                      <th>
                        <div align="Right"><?php echo number_format($total,2) . ' ' . $moneda; ?> </div>
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


            <form action="totalizarPresupuesto.php" method="POST" name="formularioActualizarcliente" id="FormularioTotalizarPresupuesto">
              <div class="form-row">
                <div class="form-group col-md-6">

                  <label> Fecha de vencimiento</label>
                  <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                  <br> <br>
                  

                  <button type="submit" class="btn btn-block btn-outline-danger rounded-pill btn-lg">
                    <strong> <i class="fas fa-dollar-sign"></i>  Totalizar Presupuesto </strong> 
                </button>

                </div>
                <div class="form-group col-md-6">
                  <label> Observaciones o notas</label>
                  <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                </div>



                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                <input type="hidden" name="id_cliente" value="<?php echo $clienteId ?>">
                <input type="hidden" name="historia" value="<?php echo $historiaClinica1 ?>">
                <input type="hidden" name="tipo_historia" value="<?php echo $tipo_historia ?>">
                <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id;?>">




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
    window.onload = listaItem;*/
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


    if(codigoProd != ""){
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
        if(Respuesta.Lista == true && Respuesta.Tipo == "Lotes"){

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
          optionElement.textContent = item.Nombre+` [${item.Existencia}] [${item.Vencimiento}] `;
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
          var Mensaje = "Existencia Disponible: <u><b>"+existencias+"</b></u>";
          //info de las existencias informacion_existencia
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
          ///////////////////////////////////////////////////////////////////////////

        };

        DivCampoPersonalizado.appendChild(selectElement);

      }
      //codigo para el apartado de producto simple
      else if(Respuesta.Tipo == "Simple"){
        
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
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        DivCampoPersonalizado.appendChild(input);
        
      }
      //codigo para el apartado del producto compuesto
      else if(Respuesta.Tipo == "Compuesto"){
        
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
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        
        DivCampoPersonalizado.appendChild(input);
        DivCampoPersonalizado.appendChild(labelElement);
      }
      else if(Respuesta.Tipo == "Servicio"){
        
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
      else if(Respuesta.Tipo == "Error"){
        
        alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
        ActualizacionDeposito();
      }


        $('#2').val(Respuesta.Precio);

      }
    });
  }
  else{
    $("#codigoProd").val("").trigger('change');
  }

}

function ActualizacionDeposito(){

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
  document.getElementById("Servicios_EmpresasAfiliadas_SaludOcupacional").style.display = "none";
}else if (valor == "Servicios_EmpresasAfiliadas_SaludOcupacional") {
  document.getElementById(valor).style.display = "block";
  document.getElementById("Simple_Formulario").style.display = "none";

}
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