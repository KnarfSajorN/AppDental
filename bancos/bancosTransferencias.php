<?php
include '../header.php';
include '../menu.php';


if ($_GET['i']) {
    // editar la vaina
    $idBanco = base64_decode($_GET['i']);
    $queryBanco = "SELECT * from Sbancos where id='$idBanco' limit 1";
    $resultBancos = mysqli_query($conn3, $queryBanco);
    $rowBanco = mysqli_fetch_array($resultBancos);
}

?>
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Movimientos Bancarias</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label>Banco: </label>
                                        Código - N. Cuenta
                                        <select id="banco" name="banco" class="form-control" style="width: 100%;" onchange="filtro()">
                                            <option value="" selected="selected">Seleccione Banco</option>
                                            <?php

                                            $queryList = mysqli_query($conn3, "SELECT * FROM Sbancos order by descripcion ASc");
                                            $nrowl = mysqli_num_rows($queryList);
                                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                $idBanco = $row_recordset32['id'];
                                                $fechaRegBanco = $row_recordset32['fechaReg'];
                                                $nCuentaBanco = $row_recordset32['nCuenta'];
                                                $descripcionBanco = $row_recordset32['descripcion'];
                                                $tipoBanco = $row_recordset32['tipo'];
                                                echo "<option value='$idBanco'>$nCuentaBanco | $descripcionBanco  </option>";
                                            }

                                            ?>

                                        </select>
                                        <br>
                                        <div class="div-result-opciones" id="div-result-opciones"> </div>

                                    </div>
                                    <div class="col-md-4 mb-3 " align="">
                                        <div id="div-result-banco" class="bg-light p-3"></div>
                                    </div>
                                </div>
                                <div class="div-result-filtro" id="div-result-filtro"> </div>

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
<!-- /.content-wrapper -->

<?php
include '../footer.php';
?>


<script type="text/javascript">
    function filtro(){
      var banco = $("#banco").val();
      // detalle de movimientos
      $.ajax({
        type : "POST",
        url: "./bancos/ajax_transBan.php",
        data: {banco:banco},
        success: function(response){
          $('#div-result-filtro').html(response);
        }
      });
      // opciones del banco ej conciliacion - operaciones bancarias
      $.ajax({
        type : "POST",
        url: "./bancos/ajax_transBanOpciones.php",
        data: {banco:banco,usuario_id:"<?=$_SESSION['ID'];?>"},
        success: function(response){
          $('#div-result-opciones').html(response);

        }
      });
      // resumen saldos diferidos - creditos - debitos
      $.ajax({
        type : "POST",
        url: "./bancos/ajax_infobanco.php",
        data: {banco:banco},
        success: function(response){
          $('#div-result-banco').html(response);
        }
      });
    };
  </script>
