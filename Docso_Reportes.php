<?php
include 'header.php';
include 'menu.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <br>
  <section class="content">
    <div class="box box-info" align="center">
      <div class="card-body">
        <div class="card-header-title font-size-lg  font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="align-self: center;">
            <h2>Reportes de Documentos Soporte </b>
            </h2>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-justified"></ul>
          </div>
        </div>
        <div class="tab-content">
          <div class="tab-pane Principal_Modulo_V" id="Tab_Formulario" role="tabpanel"></div>
          <div class="tab-pane active" id="Tab_Historial" role="tabpanel">
            <!-- lista -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group col-md-12">
                  <hr>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <div class="float-left">
                          <h4>Reporte Detallado Documento Soporte</h4>
                        </div>
                      </div>
                      <form action="Docso_Reporte_Detallado.php" method="POST">
                        <div class="card-body row">
                          <div class="form-group col-md-12">
                            <div class="row m-0 p-0">
                              <div class="col-md-4">
                                <label for="">Fecha Desde</label>
                                <input type="date" class="form-control" name="Desde" required value="<?= date('Y-m-01') ?>">
                              </div>
                              <div class="col-md-4">
                                <label for="">Fecha Hasta</label>
                                <input type="date" class="form-control" name="Hasta" required value="<?= date('Y-m-d') ?>">
                              </div>
                              <div class="col-md-4">
                                <label for="">Proveedor</label>
                                <select name="proveedor_id" class="form-control select2">
                                    <option value="Todos">Todos</option> 
                                    <?php
                                        $QueryProveedor = mysqli_query($conn3, "SELECT * FROM sproveedores WHERE Activo = 1 ");
                                        while ($RowProveedor = mysqli_fetch_array($QueryProveedor)) {
                                            $idP = $RowProveedor['id'];
                                            $Nombre_Proveedor = $RowProveedor['nombre'];

                                        echo '<option value="' . $idP . '">' . $Nombre_Proveedor . '</option>';                     
                                        }
                                        ?> 
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="Tipo_Reporte" value="Reporte Detallado Documento Soporte">
                          <button class="btn btn-outline-info rounded-pill" type="submit" style="width: 100%;">
                            <i class="fa fa-print"></i> Generar Reporte </button>
                        </div>
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
<?php include 'footer.php' ?>