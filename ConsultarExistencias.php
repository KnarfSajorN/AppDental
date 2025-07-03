<?php 
include 'header.php';
include 'menu.php';

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $_SESSION[ID]");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
}



?>

              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                          <h2>Existencias de Productos</h2>
                        </div>
                        <div class="col-md-3">
                        </div>
                      </div>

                      <div class="tab-content">

                        <div class="tab-pane active" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            

                            <!-- Agrega el campo input en tu HTML -->

                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" id="NombreProducto">
                                <span class="input__label">
                                    <label for="NombreProducto">Nombre</label>
                                </span>
                            </div>

                            
                            <div class="input col-md-6 webflow-style-input">
                                <input type="text" class="input__field" id="ReferenciaProducto">
                                <span class="input__label">
                                    <label for="ReferenciaProducto">Referencia</label>
                                </span>
                            </div>
                            
                            <div class="input col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-12">
                              <table id="TablaExistencias" class="table table-striped table-bordered">
                                <?php
                                $tableColumna = [
                                  'Nombre',
                                  'Referencia',
                                  'Deposito',
                                  'Existencia',
                                  'Tipo',
                                  'Mas Información'
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
                                  $querysinvetrios = "SELECT * from sinvetrios where estado = 1";
                                  $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                                  while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {

                                    $inventario_id = $rowsinvetrios['ID'];
                                    $totalExistencia="0";

                                    $TipoInventarioCodigo = funcionMaster($rowsinvetrios['tipo'], 'id', 'tipo', 'scategoria');

                                    if($TipoInventarioCodigo=="1" || $TipoInventarioCodigo=="2" || $TipoInventarioCodigo=="5"){


                                        switch ($TipoInventarioCodigo){
                                            case '1':
                                                $TipoProducto="Producto Simple";
                                                break;
                                            case '2':
                                                $TipoProducto="Servicios";
                                                break;
                                            case '5':
                                                $TipoProducto="Producto con Lotes";
                                                break;
                                        }
    
                                            $QueryInvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where idSinvetrios = '$inventario_id'");
                                            while ($RowInvDep = mysqli_fetch_assoc($QueryInvDep)) {
    
                                                    $Referencia = $rowsinvetrios['referencia'];
                                                    $Descripcion = $rowsinvetrios['descripcion'];
                                                    
                                                    $Deposito = funcionMaster($RowInvDep['idDep'],'id','descripcion','dep');
                                                    $Existencias = $RowInvDep['existencia'];

                                                    $Mensaje="";
                                                    $Lote = $RowInvDep['lote'];
                                                    if($Lote!=""){
                                                        $Mensaje.="Lote: $Lote <br>";
                                                    }
                                                    $fechaExpedicion = $RowInvDep['fechaExpedicion'];
                                                    if($fechaExpedicion!=""){
                                                        $Mensaje.="Fecha de Expedición: $fechaExpedicion <br>";
                                                    }
                                                    $fechaVencimiento = $RowInvDep['fechaVencimiento'];
                                                    if($fechaVencimiento!=""){
                                                        $Mensaje.="Fecha de Vencimiento: $fechaVencimiento <br>";
                                                    }

                                                    echo "<tr class='center text-center'>
                                                            <td>$Descripcion</td>
                                                            <td>$Referencia</td>
                                                            <td>$Deposito</td>
                                                            <td>$Existencias</td>
                                                            <td>$TipoProducto</td>
                                                            <td>$Mensaje</td>
                                                        </tr>
                                                    ";
                                                
    
                                            }

                                    }
                                    

                                    
                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th style='text-align: center;'>$columna</th>";
                                    }
                                    ?>
                                </tfoot>
                              </table>
                            </div>
                          </div>

                        </div>
                      </div>


                    </div>




                </section>

                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php' ?>

<script>

$(document).ready(function() {
    var table = new DataTable('#TablaExistencias', {
        responsive: true,
        responsivePriority: 1
    });

   $('#NombreProducto').on('input', function() {
        var filtro = $(this).val();
        // Si el valor seleccionado es vacío, muestra todos los datos
        if (filtro === '') {
            table.column(0).search('').draw();
        } else {
            // Aplica el filtro a la columna 4 (índice 3) con el valor seleccionado
            table.column(0).search(filtro).draw();
        }
    });

    $('#ReferenciaProducto').on('input', function() {
        var filtro = $(this).val();
        // Si el valor seleccionado es vacío, muestra todos los datos
        if (filtro === '') {
            table.column(1).search('').draw();
        } else {
            // Aplica el filtro a la columna 4 (índice 3) con el valor seleccionado
            table.column(1).search(filtro).draw();
        }
    });

});

</script>
<link rel="stylesheet" href="css/CamposInput.css">
