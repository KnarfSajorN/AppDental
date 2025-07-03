<?php include 'header.php';
include 'menu.php';





$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['GuardarDetalleEntradaActivos'])) {
  date_default_timezone_set('America/Bogota');

  $codigoProd 	= $_POST['codigoProd'];
  $cantidad 		= $_POST['cantidad'];
  $usuario_id 	= $_POST['usuario_id'];
  $precio       = $_POST['base'];
  $descripcion = mysqli_real_escape_string($conn3, funcionMaster($codigoProd, 'ID', 'descripcion', 'sinvetrios'));

  $queryinv = mysqli_query($conn3, "SELECT * FROM  sinvetrios where  ID = $codigoProd");
  while ($rowinv = mysqli_fetch_array($queryinv)) {
    $costo        = $rowinv['costo'];
  }

  $SinvDep_id = $_POST['SinvDep_id'];
  $Deposito_id = $_POST['deposito'];
  $TipoOperacion = "2"; //Operacion Descarga

  $Total = round($cantidad * $precio,2);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$queryList = mysqli_query($conn3, "INSERT INTO Activos_Detalles_Temp (usuario_id, idProducto, Descripcion, Cantidad, Costo, Precio, Total, SinvDep_id, Deposito_id, Tipo) 
                                                    VALUES ('$usuario_id', '$codigoProd','$descripcion', '$cantidad', '$costo', '$precio', '$Total', '$SinvDep_id','$Deposito_id','$TipoOperacion');") or die(mysqli_error($conn3));


  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='IN_ActivosDescargar.php'</script>";
  } else {
    echo "<script language='Javascript'> window.location='IN_ActivosDescargar.php'</script>";
  }
}













if (isset($_POST['GuardarOperacionDecargarActivo'])) {
  

  /////////////////////////////////////////////////////////////////// creacion de la tabla  //////////////////////////////////////////////////////////////////////////

  $Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'NumeroDescargaActivos';");
  $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") {mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `NumeroDescargaActivos` INT(11) NULL DEFAULT '0' COMMENT 'Numeracion Carga Activos *Creado desde modulo de Totalizar Activos IN_ActivosCargar*'");}

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  date_default_timezone_set('America/Bogota');
  $date = date("Y-m-d");
  $usuario_id = $_POST['datos']['usuario_id'];
  $Motivo = $_POST['datos']['Motivo'];

  $QueryUsuario = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = '$usuario_id'");
  while ($RowUsuario = mysqli_fetch_array($QueryUsuario)) {
      $NumeroDescargaActivos      = $RowUsuario['NumeroDescargaActivos'];
  }

  $TipoOperacion = "2"; //1-> Carga de Activos 2-> Descarga de Activos

  $QueryDetalles = mysqli_query($conn3, "SELECT SUM(Cantidad) AS Total_Cantidad, SUM(Costo) AS Total_Costo, SUM(Precio) AS Total_Precio
  FROM Activos_Detalles_Temp 
  WHERE Activo = 1 AND usuario_id = $usuario_id AND Tipo = $TipoOperacion  ORDER BY id");
  while ($RowDetalles = mysqli_fetch_array($QueryDetalles)) {

  $Total_Cantidad = $RowDetalles['Total_Cantidad'];
  
  }

  $NumeroDescargaActivos++;



  $proveedor_id    = $_POST['datos']['proveedor_id'];
  $proveedor_id = (!empty($proveedor_id) ? $proveedor_id : 0);

  mysqli_query($conn3, "INSERT INTO Activos_Operaciones (usuario_id, proveedor_id, NumeroOperacion, Total_Cantidad, Total_Costo, Total_Precio, Motivo, Tipo) 
                                       VALUES ('$usuario_id', '$proveedor_id', '$NumeroDescargaActivos', '$Total_Cantidad', '0', '0', '$Motivo', '$TipoOperacion')");

  $idOperacion = mysqli_insert_id($conn3);

  mysqli_query($conn3, "UPDATE usuarios SET NumeroDescargaActivos = $NumeroDescargaActivos WHERE ID = '$usuario_id'");

  $Total_Precio=0;
  $Total_Costo=0;

  $QueryDetallesTemp = mysqli_query($conn3, "SELECT * FROM  Activos_Detalles_Temp where usuario_id = '$usuario_id'  and Activo = 1 AND Tipo = $TipoOperacion ORDER BY id ASC");
  while ($RowDetallesTemp = mysqli_fetch_array($QueryDetallesTemp)) {

    $id = $RowDetallesTemp['id'];
    $Descripcion = mysqli_real_escape_string($conn3, $RowDetallesTemp['Descripcion']);

    $Total_Costo =$Total_Costo +($RowDetallesTemp['Costo']*$RowDetallesTemp['Cantidad']);
    $Total_Precio = $Total_Precio + ($RowDetallesTemp['Precio']*$RowDetallesTemp['Cantidad']);
    
    $Cantidad = $RowDetallesTemp['Cantidad'];

    $Seriales_Arreglo_id = $RowDetallesTemp['Seriales_Arreglo_id'];

    $queryList = mysqli_query($conn3,
    "INSERT INTO Activos_Detalles (idOperacion,usuario_id,idProducto, Descripcion, Cantidad, Costo, Precio, Total, SinvDep_id, Deposito_id, Tipo) 
                         VALUES ('$idOperacion','$RowDetallesTemp[usuario_id]', '$RowDetallesTemp[idProducto]','$Descripcion', '$RowDetallesTemp[Cantidad]', 
                         '$RowDetallesTemp[Costo]', '$RowDetallesTemp[Precio]', '$RowDetallesTemp[Total]', '$RowDetallesTemp[SinvDep_id]', '$RowDetallesTemp[Deposito_id]', '$TipoOperacion');");

    $Detalle_id = mysqli_insert_id($conn3);

      /////////////////////////////////////////////////////////////////
      $SinvDep_id = $RowDetallesTemp['SinvDep_id'];

      //Actualizacion de la existencias e los productos y los
      $QueryExistencias = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
      while ($RowExistencias = mysqli_fetch_array($QueryExistencias)) {
        $ExistenciaSinvDep = $RowExistencias['existencia'];
      }
      $ExistenciasFinales = $ExistenciaSinvDep-$Cantidad;
      mysqli_query($conn3, "UPDATE SinvDep set existencia = $ExistenciasFinales where id = $SinvDep_id");
      ////////////////////////////////////////////////////////////////
      


      mysqli_query($conn3, "UPDATE Activos_Detalles_Temp set Activo = 2 where id = $id");



      //////////////////////////////////////////////? Segunda parte del apartado de seriales //////////////////////////////////////////////

      $Campo1 = mysqli_query($conn3, "show COLUMNS from SinvSerial WHERE Field = 'DetalleDescarga_id';");
		  $nrowCampo1 = mysqli_num_rows($Campo1);if ($nrowCampo1 == "0") { mysqli_query($conn3, "ALTER TABLE `SinvSerial` ADD `DetalleDescarga_id` INT(11) NULL DEFAULT '0' COMMENT 'si se descargo el activo aqui tendra el id del detalle que lo descargado de la tabla Activos_Detalles *Creado desde modulo de Totalizar IN_ActivosDescargar*'");}


      $ArregloSeriales = json_decode($Seriales_Arreglo_id,true);
      foreach ($ArregloSeriales as $key => $value) {
        $Serial_id = $value['id'];

        $queryList = mysqli_query($conn3, "UPDATE SinvSerial set Activo = 0, DetalleDescarga_id = $Detalle_id where id = $Serial_id LIMIT 1");
      }

      //////////////////////////////////////////////? [FIN] Segunda parte del apartado de seriales //////////////////////////////////////////////

      
 
  }

  $Total_Costo = round($Total_Costo, 2);
  $Total_Precio = round($Total_Precio, 2);

  mysqli_query($conn3, "UPDATE Activos_Operaciones set Total_Costo = $Total_Costo, Total_Precio = $Total_Precio WHERE idOperacion = $idOperacion");



echo "<script language='Javascript'> window.location='IN_ImprimirActivosDescargar.php?id={$idOperacion}';</script>";

}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id="0";
$ID_Usuario  =  $_SESSION['ID'];
//1 Carga , 2 Descarga
$resultado = mysqli_query($conn3, "SELECT * FROM  Activos_Detalles_Temp where Activo = 1 and  usuario_id = $ID_Usuario AND Tipo = '2' order by id");
while ($fila = mysqli_fetch_array($resultado)) {
    $Deposito_id=$fila["Deposito_id"];
}
if($Deposito_id!="0" AND $Deposito_id!=""){
    $DesabilitarDep="readonly";
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////? Modulo Seriales ////////////////////////////////////////////////////

function ConsultarDisponbilidadSerialTipoProducto($Detalle_id){
  include 'funciones/conn3.php';
  $QueryDetalle = mysqli_query($conn3, "SELECT * FROM  Activos_Detalles_Temp WHERE id = $Detalle_id");
  while ($RowDetalle = mysqli_fetch_array($QueryDetalle)) {
      $idProducto = $RowDetalle['idProducto'];
      $SinvDep_id = $RowDetalle['SinvDep_id'];
      $cantidad = $RowDetalle['Cantidad'];
      $Seriales = $RowDetalle['Seriales'];
  }

  $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE ID = $idProducto");
  while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
      $tipo = $RowInventario['tipo'];
  }

  $QueryDepartamento = mysqli_query($conn3, "SELECT * FROM  scategoria WHERE id = $tipo limit 1");
  while ($RowDepartamento = mysqli_fetch_array($QueryDepartamento)) {
      $tipodepartamento = $RowDepartamento['tipo'];
      $maneja_serial = $RowDepartamento['maneja_serial'];
      $caracter_serial = $RowDepartamento['caracter_serial'];
  }

  

      if($tipodepartamento=="6" AND $maneja_serial=="1"){
          if($Seriales==""){
              return '<a onclick="ModalModuloExistenciasActivos_Compras(' . $Detalle_id . ',' . $SinvDep_id . ',\'' . $caracter_serial . '\',' . $cantidad . ')" class="btn btn-outline-info rounded-pill shadow m-1 FaltaLlenarSerial"><i class="fa fa-sticky-note"></i></a>';
          }else{
              return '<a onclick="ModalModuloHistorialExistencias(' . $Detalle_id . ',\'' . $caracter_serial . '\')" class="btn btn-outline-warning rounded-pill shadow m-1"><i class="fa fa-list"></i></a>';
          }
          
      }else{
          return "";
      }

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                        <div class="col-md-3">
                          <a href="IN_Inventario" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo Inventario</a>
                        </div>
                        <div class="col-md-6">
                          <h2>Descarga de Activos</h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?='Nuevo' ?></a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Historial</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                          <!-- nuevo -->
                          <form id="FormularioEntradaInventario" class="form-group row" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="hidden" name="usuario_id" value="<?= $_SESSION['ID'] ?>">

                            <div class="form-group col-md-3">
                              <label><strong> Depósito</strong></label>
                              <select class="input-lg form-control" name="deposito" id="deposito" onchange="ActualizacionDeposito()" <?=$DesabilitarDep;?>  required>
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
                            <div class="form-group col-md-3">
                                <div class="form-group col-md-12">
                                    <div align="left">
                                        <label>Producto</label>
                                    </div>

                                    <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                        <option value="" selected="selected">Seleccione Producto</option>
                                        <?php
                                        //solo deben aparecer los productos activos
                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                        JOIN scategoria sca ON si.tipo = sca.id
                                        WHERE 1=1
                                        AND si.estado = 1
                                        AND sca.tipo in (6)");
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
                                  <label> Precio Unitario</label>
                              </div>
                              <input type="number" step="0.01" class="form-control input-lg" id="Precio_Descarga" name="base" placeholder="Precio"  value="" required>
                            </div>

                            <div class="form-group col-md-3">
                              <label>Cantidad</label>
                              <input type="number" class="form-control input-lg" id="Cantidad_Descarga" name="cantidad" placeholder="Cantidad"  required>
                              <div align="left" id="informacion_existencia"></div>
                            </div>
                            
                            

                            <div class="form-group col-md-12">
                                <br>
                                <button type="submit"  class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="GuardarDetalleEntradaActivos">
                                  <i class="fa fa-plus"></i>
                                  Agregar
                                </button>
                            </div>
                          
                        </form>
                        <!-- nuevo -->


                          <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                              <?php
                              $tableColumna = ['#',
                                'Fecha',
                                'Deposito',
                                'Descripción',
                                'Precio',
                                'Cantidad',
                                'Total',
                                ''
                              ]
                              ?>
                              <thead>
                                <tr>
                                  <?php
                                  foreach ($tableColumna as $columna) {
                                    echo "<th>$columna</th>";
                                  }
                                  ?>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                //1 Carga , 2 Descarga
                                $Contador=0;
                                $queryOpera = "SELECT * FROM  Activos_Detalles_Temp where Activo = 1 and  usuario_id = $ID_Usuario AND Tipo = '2' order by id";
                                $resultOpera = mysqli_query($conn3, $queryOpera);
                                while ($rowOpera = mysqli_fetch_array($resultOpera)) {
                                  $Contador++;

                                  $id = $rowOpera['id'];
                                  $Fecha = $rowOpera['Fecha'];
                                  $Deposito = funcionMaster($rowOpera['Deposito_id'], 'id', 'descripcion', 'dep');
                                  $Descripcion = $rowOpera['Descripcion'];
                                  $Precio = $rowOpera['Precio'];
                                  $Cantidad = $rowOpera['Cantidad'];
                                  $Total = $rowOpera['Total'];

                                  $ruta = htmlentities($_SERVER['PHP_SELF']);

                                  $CampoAdicionalSerial = ConsultarDisponbilidadSerialTipoProducto($rowOpera['id']);

                                  echo "<tr>
                                    <td>$Contador {$CampoAdicionalSerial}</td>
                                    <td>$Fecha</td>
                                    <td>$Deposito</td>
                                    <td>$Descripcion</td>
                                    <td>$Precio</td>
                                    <td>$Cantidad</td>
                                    <td>$Total</td>";

                                    
                                    echo "<td width='1%'><a onclick='EliminarDetalleActivo($id);'><i class='fa fa-trash' style='color:red'></i> </a></td>";
                                ?>

                                <?php
                                }
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <?php
                                  foreach ($tableColumna as $columna) {
                                    echo "<th>$columna</th>";
                                  }
                                  ?>
                                </tr>
                              </tfoot>
                            </table>
                          </div>



                          <!-- no cambiar id se usa para la funcion del codigo y lo de los seriales -->
                          <form id="TotalizarDescargarActivo" method="post" action="IN_ActivosDescargar.php"  class="form-group row" onsubmit="GuardarDescargarActivo();">

                            <input type="hidden" name="datos[usuario_id]" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                            <input type="hidden" name="GuardarOperacionDecargarActivo" value="1">
                            <div class="col-md-12">

                              <div class="form-group col-md-12">
                                <label><strong> Proveedor</strong></label>
                                <select class="input-lg form-control" name="datos[proveedor_id]" id="proveedor_id"   required>
                                <?php
                                $QueryProveedor = mysqli_query($conn3, "SELECT * FROM sproveedores WHERE usuario_id = $_SESSION[ID] AND Activo = 1 ");
                                while ($RowProveedor = mysqli_fetch_array($QueryProveedor)) {
                                    $idP = $RowProveedor['id'];
                                    $Nombre_Proveedor = $RowProveedor['nombre'];

                                  echo '<option value="' . $idP . '">' . $Nombre_Proveedor . '</option>';                     
                                }
                                ?>
                                </select>
                              </div>

                              <label for="">Motivo</label>
                              <textarea name="datos[Motivo]" class="form-control" required></textarea>
                              <hr>
                              <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"  <?= (($Deposito_id!="0" AND $Deposito_id!="") ? '' : 'disabled') ?> >Guardar</button>
                            </div>
                          </form>

                        </div>


                        <div class="tab-pane" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <?php
                                $tableColumna = [
                                  'Fecha',
                                  'Cantidad de Productos',
                                  'Precio Total',
                                  'Motivo',
                                  ''
                                ]
                                ?>
                                <thead>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $queryOpera = "SELECT * from Activos_Operaciones where Tipo = '2'and usuario_id = '{$_SESSION['ID']}' order by idOperacion DESC";
                                  $resultOpera = mysqli_query($conn3, $queryOpera);
                                  while ($rowOpera = mysqli_fetch_array($resultOpera)) {
                                    // los contadores vergatarios
                                  ?>
                                    <tr>
                                      <td><?= $rowOpera['Fecha'] ?></td>
                                      <td><?= $rowOpera['Total_Cantidad'] ?></td>
                                      <td><?= $rowOpera['Total_Precio'] ?></td>
                                      <td><?= $rowOpera['Motivo'] ?></td>
                                      <td>
                                        <a href='IN_ImprimirActivosDescargar.php?id=<?=$rowOpera['idOperacion'];?>' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width: 100%;'><i class='fa fa-print' title='Imprimir'> Imprimir</i></a>
                                      </td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>

                        </div>
                      </div>

                      <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


                    </div>




                </section>

                <?php echo $mensaje_registro_patients; ?>

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->



  <?php include 'footer.php' ?>
  <!-- <script src="./plugins/automaticForm/tokenMaster.js"></script> -->


<script>
  $(document).on('focus', ".blur", function() {
    $(this).blur();
  });
</script>

<?php
//esto es para el apartado de seriales
include 'IncludeModalSerialesActivosDescargar.php';
?>

<script>

function CargarPrecioProducto() {
    var codigoProd = $("#codigoProd").val();
    var deposito = $("#deposito").val();

    ////////////////////////// EVITAR ERRORES ///////////////
    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";
    $('#Cantidad_Descarga').val("");
    document.getElementById('Cantidad_Descarga').removeAttribute('max');
    document.getElementById('informacion_existencia').innerHTML = "";
    /////////////////////////////////////////////////////////

    if(codigoProd != ""){
    $.ajax({
      type: "POST",
      url: "IN_AjaxActivos.php",
      data: {
        codigoProd: codigoProd,
        deposito: deposito,
        Tipo_Consulta: "Cargar Activos"
      },
      success: function(response) {

        var Respuesta = JSON.parse(response);
        //console.log (Respuesta);

      //codigo para el apartado de producto simple
      if(Respuesta.Tipo == "Activos"){
        
        var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
        var Options = Respuesta.Detalles;

        // Crea el elemento input hidden
        /*
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
        */

        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id');
        
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          input.value = item.id;

          var elemento1 = document.getElementById('Cantidad_Descarga');
          elemento1.max = item.Existencia;

          ////////////////////
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        DivCampoPersonalizado.appendChild(input);

        
      }
      // si no tiene un tipo de clasificacion nos indicara este error
      else if(Respuesta.Tipo == "Error"){
        
        alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
        ActualizacionDeposito();
      }


        $('#Precio_Descarga').val(Respuesta.Precio);

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

$('#Cantidad_Descarga').val("");
document.getElementById('Cantidad_Descarga').removeAttribute('max');
$("#codigoProd").val("").trigger('change');

}


function EliminarDetalleActivo(id){
  $.ajax({
      type: "POST",
      url: "IN_AjaxActivos.php",
      data: {
        Detalle_id: id,
        Tipo_Consulta: "Eliminar Detalles Activos"
      },
      success: function(response) {
        window.location.reload();
      }
    });
}

</script>
<?php
// para tokenAutomaticForm
// function tokenAutomaticForm(texto, usuario, numeros, type, table, idUpdate, reload, page, formulario)
$ttext = base64_encode(base64_encode($_SESSION['ID'] . ' - ' . $_SESSION['NOMBRE_USUARIO'] . ', necesita un código de autenticación para la Carga de Activos'));
// $tnumeros = base64_encode(base64_encode('573224399298'));
$tnumeros = base64_encode(base64_encode(funcionMaster($_SESSION['ID'], 'ID_Usuario', 'whatsapp', 'config')));
$tuser = base64_encode(base64_encode($_SESSION['ID']));


?>

<script>
function GuardarDescargarActivo(){
  event.preventDefault(); 

  var usuario_id = $("#usuario_id").val();
  //var cliente_id = $("#id_cliente_totalizar").val();
  var deposito = $("#Deposito_id").val();

  $.ajax({
      type: "POST",
      url: "IN_AjaxActivos.php",
      data: {
        usuario_id: usuario_id,
        deposito:deposito,
        Tipo_Consulta: "Verificar Existencia Operaciones Descargar Activo"
      },
      success: function(response) {
        console.log(response);
        var Respuesta = JSON.parse(response);
        var Detalles = Respuesta.Detalles;
        if(Respuesta.Enviar==false){
          var Mensaje = "";
          var MensajeEstatico = "";
          Object.keys(Detalles).forEach(function(key) {
            var item = Detalles[key];
            if(item.Estado==false){
              Mensaje += item.Nombre+": ";
              Mensaje += "\r\nExistencias: "+item.Existencia+"\r\n";
              Mensaje += "Existencias a descontar en la operacion actual: "+item.Descontar+" . \r\n   ";
              MensajeEstatico = item.Motivo;
            }
            
          });

          Mensaje = Mensaje+" "+MensajeEstatico;

          alert(Mensaje);
        }
        else{
          //alert("Existencia Disponible");
          //document.getElementById('totalizarFactura').submit();

          //$('#totalizar-operacionInv-form').automaticForm({type: 1,table: 'operacioninvHeader', token: 'si', tokenText: '<?= $ttext ?>', tokenUser: '<?= $tuser ?>', tokenNumbers: '<?= $tnumeros ?>', reload:'', page: 'salidadeinventario', post: true});

          tokenMaster('<?= $ttext ?>', '<?= $tuser ?>', '<?= $tnumeros ?>').then((isTokenConfirmed) => {
                    if (isTokenConfirmed) {
                        //console.log('paso');
                        document.getElementById('TotalizarDescargarActivo').submit();
                    } else {
                        //console.log('no paso');
                    }
                });

        }
      }
    });

  

}
</script>
