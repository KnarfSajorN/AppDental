
<!-- Left side column. contains the logo and sidebar -->
<?php 
include 'header.php';
include 'menu.php';

$ID = $_SESSION['ID'];

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$tipo_reporte="Reporte de Balance de Comprobacion";
?>
<style type="text/css">
.col-xs-3
{
  padding-bottom: 20px;
}
</style>
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
            <li><a href="#"> Reportes Sistema </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Reportes Sistema </h4>
                <div class="box">
                    <div class="box-body">





                  <div class="m-3">
                   <div class="">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="col-md-12">
                        <h2 align="center"><?php echo $tipo_reporte?></h2>
                        <div class="table table-responsive">
                          <table id="Tabla_Inteligente" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                              <td rowspan="2">Numero de Cuenta</td>
                              <td rowspan="2">Concepto</td>
                              <td rowspan="1" colspan="2" align="center">Saldos</td>
                              </tr>
                              <tr>
                              <td rowspan="1" colspan="1">Deudor</td>
                              <td rowspan="1" colspan="1">Acreedor</td>

                              </tr> 
                            </thead>
                          </table>
                        </div>

                      </div>



                      <!-- /.col -->
                    </div>
                    <!-- /.row -->


                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>


<script>//version 2 tabla dinamica <table id="Tabla_Inteligente">
var data_table = [];//datos que recibe la tabla
var titulo_tabla = "<?php echo $tipo_reporte;?>";//titulo de la tabla para las impresiones


  <?php
      //query para sacar la informacion se pone el filtro de $tipo_reporte

  $queryList=mysqli_query($conn3,"SELECT * FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) group by cuenta ");
  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $cuenta=$rowMotorizado['cuenta'];

    $queryList1=mysqli_query($conn3,"SELECT SUM(monto_debe) as monto_debe,SUM(monto_haber) as monto_haber FROM  CCompDiarioMov  where  (fecha BETWEEN '$desde' and '$hasta' ) AND cuenta='$cuenta'");
    while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {
        $monto_debe = $rowMotorizado1["monto_debe"];
        $monto_haber = $rowMotorizado1["monto_haber"];
    }
    $cuentanombre=funcionMaster($cuenta,'id','descripcion','CCuentas');

    $monto_debe_total += $monto_debe;
    $monto_haber_total += $monto_haber;
    ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ "<?php echo $cuenta;?>", 
        "<?php echo $cuentanombre;?>",
        "<?php echo number_format($monto_debe,2);?>",
        "<?php echo number_format($monto_haber,2);?>", 
        ] );
        
      <?php
    }
    ?>
    data_table.push( [ "Total", 
        "",
        "<?php echo number_format($monto_debe_total,2);?>",
        "<?php echo number_format($monto_haber_total,2);?>", 
        ] );

</script>


<?php
include 'footer.php';
?>

<!-- plugin datatables inteligente print/pdf/excel etc -->
<!-- <link rel="stylesheet" type="text/css" href="plugins/datatablesK/datatables.css"/>
<script type="text/javascript" src="plugins/datatablesK/pdfmake.js"></script>
<script type="text/javascript" src="plugins/datatablesK/vfs_fonts.js"></script>
<script type="text/javascript" src="plugins/datatablesK/datatables.js"></script> -->
<!-- need <script src="js/jquery-3.5.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.select.min.js"></script>-->

<style type="text/css">.btn-primary1 {color: #fff !important;background-color: #337ab7!important;border-color: #2e6da4!important;}</style>
<script type="text/javascript">
  $(function () {
    // esto va en el footer
    //tabla inteligente
    if(typeof data_table !== 'undefined')
    {
      var Tabla_Inteligente=$('#Tabla_Inteligente').DataTable( {

        data:           data_table,
        deferRender:    true,
        scrollY:        1200,
        scrollCollapse: true,
        scroller:       true,
        processing: true,
        lengthMenu: [10, 20, 50, 100, 200, 500],
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
          },
          buttons: {
            pageLength: {
              _: "Mostrando %d <br> Elementos",
              '-1': "Ver Todo"
            }
          }
        },

        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'collection',
          text: '<i class="fa fa-cog" aria-hidden="true"></i>',
          className: 'btn btn-primary1',
          buttons: [
          {
            extend: 'print',
            text: 'Imprimir',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            text: 'Copiar',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            text: 'Excel',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            text: 'CSV',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdf',
            text: 'PDF',
            title: titulo_tabla,
            orientation: 'landscape',
            exportOptions: {
              columns: ':visible'
            }
          },
          { extend: 'pageLength' },
          { extend: 'colvis', text: 'Modificar Columnas' }
          ]
        }
        ],

      } );
    }
    
  });
// fin de tabla inteligente
</script>