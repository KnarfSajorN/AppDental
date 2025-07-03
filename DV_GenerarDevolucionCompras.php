<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $ID_Empresa      = $rowMotorizado['ID_Empresa'];
  $Deposito_id      = $rowMotorizado['Deposito_id'];

  $MontoPagado = $rowMotorizado['montoPagado'];
  $MontoDevuelto = $rowMotorizado['MontoDevolucion'];

  $MontoPagadoMaximo = round($MontoPagado-$MontoDevuelto,2);

  $IdOperacion_CuentaContableDevolucion= $rowMotorizado['idCuentaContableCXP'];
}
$NombreDeposito = funcionMaster($Deposito_id,'id','descripcion','dep');


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Devolución de Compra </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Devolución de Compra </h4>
                <div class="box">
                    <div class="box-body">



                        <div class="col-xs-12">
                            <div class="box">

                            <div class="box-body">

                            <?php echo datosProveedorReducido($ID_Empresa); ?>

                            </div>

                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Detalles de la Compra </h2>
                                        <form action="DV_TotalizarDevolucionFactura.php" method="POST" id="FormularioDevolucion">

                                            <table id="" class="table table-bordered table-striped">
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
                                                    <div align="Right">Subtotal</div>
                                                    </th>

                                                    <th>
                                                    <div align="Right">Impuesto</div>
                                                    </th>

                                                    <th>
                                                    <div align="Right">Total</div>
                                                    </th>
                                                    <th><div align="center">Devolución?</div></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $CantidadLlenadosDetallesModal=0;//contabilidad
                                                    
                                                    $idOperacion = $_GET['idOperacion'];
                                                    $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 AND ID_Empresa = $ID_Empresa AND idOperacion = $idOperacion order by id ASC");
                                                    while ($fila = mysqli_fetch_array($resultado)) {

                                                    $Detalle_id = $fila['id'];
                                                    $Numero++;
                                                    $Descuento = $fila['Descuento_Numerico'];
                                                    $Descripcion = $fila['descripcion'];


                                                    if($fila["Mas_Detalles"]!=""){
                                                        $Descripcion.= ' '.$fila["Mas_Detalles"].'';
                                                    }
                                                    $Devolucion = $fila['Devolucion'];
                                                    //IMPORTANTE No quitar la clase DetallesDevolver ya que se usa para la validacion de que haya mas de 1 campo checked para que totalice 
                                                    echo '     <tr>
                                                        <td  width="5%">' . $Numero . ' </td>
                                                        <td width="30%">' .$Descripcion. ' </td>
                                                        
                                                        <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                                        <td width="13%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                                                        <td width="13%"><div align="Right">' . number_format($Descuento,2) . '' . $moneda . '</div></td>
                                                        <td width="13%"><div align="Right">' . number_format($fila['subTotal'],2) . '' . $moneda . '</div></td>
                                                        <td width="13%"><div align="Right">' . number_format($fila['Impuesto_Numerico'],2) . '' . $moneda . '</div></td>
                                                        <td width="13%"><div align="Right">' . number_format($fila['Total'],2) . '' . $moneda . '</div></td>
                                                        <td width="13%"><div align="center">';
                                                    if($Devolucion=="0"){
                                                    echo'    <input type="checkbox"class="DetallesDevolver" name="DetallesDevolver['.$Detalle_id.']" data-valor="'.$fila['Total'].'" ></div>';
                                                    }else{
                                                        $CantidadLlenadosDetallesModal++;
                                                    }

                                                    echo'</td></tr>';

                                                    $totalCant += $fila['cantidad'];
                                                    $totalBase +=  $fila['base'];
                                                    $total += $fila['subTotal'];
                                                    }

                                                    $CantidadDetallesModal = $Numero;//contabilidad

                                                    ?>
                                                </tbody>
                                            </table>
                                            
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label> Observaciones o Notas</label>
                                                    <textarea id="nota" name="nota" class="textarea" placeholder="Observaciones o Notas" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label> Deposito: <u><?=$NombreDeposito;?></u></label>
                                                    <label> Monto Pagado: <u><?=$MontoPagado;?></u></label><br>
                                                    <label> Monto Devuelto: <u><?=$MontoDevuelto;?></u></label><br>
                                                    

                                                    <div class="form-group col-md-12" id="Div_Pagos">
                                                        <label style="width:100%;">Medio de Pago Devolucion</label>
                                                        <select class="input-lg form-control select2" name="MedioPago" id="MedioPago" style="width:100%;" required>
                                                            <option value="" selected>Seleccione</option>
                                                            <?php
                                                            $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1'");
                                                            while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                                                $MedioPago_id = $RowMedioPago['id'];
                                                                $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                                                echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";

                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12" id="Div_Monto">
                                                        <label style="width:100%;">Monto</label>
                                                        <input type="number" id="Monto_Devolucion_Modal" name="MontoDevolucion" placeholder="Monto" class="form-control input-lg" step="0.01" min="0" max="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- contabilidad -->
                                            <input type="hidden" name="CantidadTotalDetalles" id="CantidadTotalDetalles" value="<?=$CantidadDetallesModal;?>">
                                            <input type="hidden" name="CantidadLLenados" id="CantidadLLenados" value="<?=$CantidadLlenadosDetallesModal;?>">
                                            <input type="hidden" name="MontoPagadoMaximo" id="MontoPagadoMaximo" value="<?=$MontoPagadoMaximo;?>">
                                            <!-- contabilidad -->
                                            
                                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                            <input type="hidden" name="ID_Empresa" id="ID_Empresa" value="<?php echo $ID_Empresa ?>"><!-- Proveedor -->
                                            <input type="hidden" name="TipoOperacion" id="TipoOperacion" value="Compra">
                                            <input type="hidden" name="idOperacion_Principal" id="idOperacion_Principal" value="<?php echo $_GET['idOperacion'] ?>">

                                            <button type="submit" class="btn btn-block btn-outline-danger rounded-pill">
                                            <i class="fas fa-dollar-sign mr-1"></i> Totalizar Devolución
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script>

    $(document).ready(function() {


    const formulario = document.getElementById('FormularioDevolucion');
    
    formulario.addEventListener('submit', function(event) {
        const detallesDevolverCheckboxes = document.querySelectorAll('input[class="DetallesDevolver"]:checked');
        
        // Verificar si al menos un checkbox está marcado
        if (detallesDevolverCheckboxes.length === 0) {
            event.preventDefault(); // Detener el envío del formulario
            alert('Debes seleccionar al menos una opción para continuar.');
        }


        <?php
          $QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
          $NrowContabilidad = mysqli_num_rows($QueryContabilidad);
          //if($NrowContabilidad>0 && $_GET['clienteId']=='115'){
          if($NrowContabilidad>0){
            echo "event.preventDefault();";
            echo "ModalModuloContabilidadDevolucion();";
          }else{
            //echo "document.getElementById('totalizarFactura').submit();";
          }
          ?>

    });


    $(document).on("change", ".DetallesDevolver", function() {
        // Ejecutar la función CantidadDevolucion
     CantidadDevolucion();
    });


});


function CantidadDevolucion(){
        var CantidadTotalDetalles = parseFloat(document.getElementById("CantidadTotalDetalles").value);
        var CantidadLLenados = parseFloat(document.getElementById("CantidadLLenados").value);
        var MontoPagadoMaximo = parseFloat(document.getElementById("MontoPagadoMaximo").value);
        
        var valorTotal = 0;
        var valorTotalDetalleSinSeleccion = 0;
        var CamposChecked= 0;
        var detallesDevolverElements = document.getElementsByClassName("DetallesDevolver");

        for (var i = 0; i < detallesDevolverElements.length; i++) {
            var detalle = detallesDevolverElements[i];
            if (detalle.checked) {
            var dataValor = detalle.getAttribute("data-valor");
            if (dataValor) {
                valorTotal += parseFloat(dataValor);
                CamposChecked ++;
            }
            }
            else{
                var dataValor = detalle.getAttribute("data-valor");
                if (dataValor) {
                    valorTotalDetalleSinSeleccion += parseFloat(dataValor);
                    //CamposChecked ++;
            }
            }
        }

        var Monto_Devolucion_Modal = document.getElementById("Monto_Devolucion_Modal");
        Monto_Devolucion_Modal.max = valorTotal;

        var CamposFinales = Number(CamposChecked+CantidadLLenados);
        if(valorTotal>MontoPagadoMaximo){

            Monto_Devolucion_Modal.max = MontoPagadoMaximo;
            if(CamposFinales==CantidadTotalDetalles){
            Monto_Devolucion_Modal.min = MontoPagadoMaximo;
            }else{
            
                if(valorTotalDetalleSinSeleccion<=MontoPagadoMaximo){
                   

                   // Calcular el valor de Monto_Devolucion_Modal
                   var Monto_Devolucion_Modal1 = MontoPagadoMaximo - valorTotalDetalleSinSeleccion;

                   // Formatear el resultado con dos decimales si es un número decimal
                   if (Number.isInteger(Monto_Devolucion_Modal1)) {
                       // Si es un número entero, déjalo sin cambios
                       Monto_Devolucion_Modal.min = Monto_Devolucion_Modal1.toFixed(0);
                   } else {
                       // Si es decimal, formatea con dos decimales
                       Monto_Devolucion_Modal.min = Monto_Devolucion_Modal1.toFixed(2);
                   }

               }else{
                   Monto_Devolucion_Modal.min = 0;
               }

            }
        }else{
            if(CamposFinales==CantidadTotalDetalles){
            Monto_Devolucion_Modal.min = valorTotal;
            }else{
            
                if(valorTotalDetalleSinSeleccion<=MontoPagadoMaximo){
                   

                   // Calcular el valor de Monto_Devolucion_Modal
                   var Monto_Devolucion_Modal1 = MontoPagadoMaximo - valorTotalDetalleSinSeleccion;

                   // Formatear el resultado con dos decimales si es un número decimal
                   if (Number.isInteger(Monto_Devolucion_Modal1)) {
                       // Si es un número entero, déjalo sin cambios
                       Monto_Devolucion_Modal.min = Monto_Devolucion_Modal1.toFixed(0);
                   } else {
                       // Si es decimal, formatea con dos decimales
                       Monto_Devolucion_Modal.min = Monto_Devolucion_Modal1.toFixed(2);
                   }

               }else{
                   Monto_Devolucion_Modal.min = 0;
               }
               
            }
        }
        
    }

</script>
<?php
$QueryContabilidad = mysqli_query($conn3, "SELECT * FROM  Config_Contabilidad WHERE Activo = 1");
$NrowContabilidad = mysqli_num_rows($QueryContabilidad);
//if($NrowContabilidad>0 && $_GET['clienteId']=='115'){
if($NrowContabilidad>0){
    include 'Include_DevolucionContabilidad.php';
}
?>