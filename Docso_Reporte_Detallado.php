<?php
include 'header.php';
include 'menu.php';

if ($_POST) {
    $Tipo_Reporte = $_POST['Tipo_Reporte']; // tipo de reporte para las gráficas

    switch ($Tipo_Reporte) {

        case 'Reporte Detallado Documento Soporte':
            $Desde = $_POST['Desde'];
            $Hasta = $_POST['Hasta'];
            $proveedor_id = $_POST['proveedor_id'];

            $Query="";
            if($proveedor_id!="Todos"){
                $Query.="AND OP.proveedor_id = '$proveedor_id' ";
            }
            

            $QueryOperacion = "SELECT 
                (SELECT nombre from sproveedores where sproveedores.id = OP.proveedor_id) as Proveedor_Nombre,
                OP.proveedor_id,
                OP.FechaOperacion,
                OP.NumeroDocumentoSoporte,
                DET.Descripcion,
                DET.Cantidad,
                DET.Base,
                DET.Subtotal,
                DET.Impuesto_Numerico,
                DET.Total
                FROM DocumentoSoporte_Operacion OP
                JOIN DocumentoSoporte_Detalles DET ON OP.idOperacion = DET.idOperacion
                WHERE (OP.FechaOperacion BETWEEN '{$Desde}' AND '{$Hasta}') $Query";


            $Columnas_Tablas = [
                'Fecha Operacion' => 'FechaOperacion',
                'Proveedor' => 'Proveedor_Nombre',
                'Numero Documento Soporte ' => 'NumeroDocumentoSoporte',
                'Producto' => 'Descripcion',
                'Precio' => 'Base',
                'Cantidad' => 'Cantidad',
                'Subtotal' => 'Subtotal',
                'Impuesto' => 'Impuesto_Numerico',
                'Total' => 'Total',
            ];

            $ImprimirTabla=true;
        break;

        default:

        break;
    }

}
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
            <h2>Reporte Detallado Documento Soporte </b>
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

                <div class="col-md-12">

                    <?php if ($ImprimirTabla) : ?>
                        <table id="TablaColecciones_1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($Columnas_Tablas as $key => $value) : ?>
                                        <th><?= $key ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $QueryTabla = mysqli_query($conn3, $QueryOperacion);
                                while ($RowTabla = mysqli_fetch_array($QueryTabla)) {
                                ?>
                                    <tr>
                                        <?php foreach ($Columnas_Tablas as $key => $value) : ?>
                                            <?php
                                            $print = '';
                                            if (is_array($value)) {
                                                for ($a = 0; $a < count($value); $a++) {
                                                    $print .= $RowTabla[$value[$a]] . ' ';
                                                }
                                            } else {
                                                $print = $RowTabla[$value];
                                            }
                                            ?>
                                            <td><?= $print ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php endif ?>
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

<link rel="stylesheet" type="text/css" href="plugins/DataTablesK2/datatables.css" />
<script type="text/javascript" src="plugins/DataTablesK2/datatables.js"></script>

<style>
    div.dt-button-collection {
        padding: 4px 17px 0 4px!important;
    }
</style>
<script>
  for (var t = 1; t <= 10; t++) {
    $('#TablaColecciones_' + [t]).DataTable({
      responsive: true,
      responsivePriority: 1,
      dom: 'Bfrtip',
      buttons: [{
        extend: 'collection',
        text: '<i class="fa fa-cog" aria-hidden="true"></i>',
        className: 'btn btn-primary',
        buttons: [{
            extend: 'print',
            text: 'Imprimir',
            title: 'Datos',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            text: 'Copiar',
            title: 'Datos',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            text: 'Excel',
            title: 'Datos',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            text: 'CSV',
            title: 'Datos',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdf',
            text: 'PDF',
            title: 'Datos',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pageLength'
          },
          {
            extend: 'colvis',
            text: 'Modificar Columnas'
          }
        ]
      }],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
    });
  }
</script>