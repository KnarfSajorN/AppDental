
<!-- Left side column. contains the logo and sidebar -->
<?php 
include 'header.php';
include 'menu.php';

$ID = $_SESSION['ID'];

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];

$nombre_cuenta = $_POST['nombre_cuenta'];
$centro_costos = $_POST['centro_costos'];


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


                <!-- Main content -->
                <section class="content">
                  <div class="m-3">
                   <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="col-xs-12">
                        <h2 align="center"><?php echo $tipo_reporte?></h2>

                        <table id="Tabla_Inteligente" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <td colspan="3">NOMBRE DE CUENTA</td>
                              <td colspan="3">CODIGO</td>
                              <td colspan="3">CATEGORIA</td>
                            </tr>
                            <tr>
                              <td>TIPO DOC</td>
                              <td>NUMERO</td>
                              <td>RG</td>
                              <td>FECHA</td>
                              <td>DEBITO</td>
                              <td>CREDITO</td>
                              <td>SALDO</td>
                              <td>CENTRO COSTOS</td>
                              <td>DETALLE</td>
                            </tr> 
                          </thead>
                          <tbody>
                            
                            <?php
                                //query para sacar la informacion se pone el filtro de $tipo_reporte
                            if ($nombre_cuenta == 0 AND $nombre_cuenta == 0 AND $centro_costos==0) 
                            {                           
                              $queryList=mysqli_query($conn3,"SELECT CM.tipo_doc,CM.idCuenta,CM.fecha,CM.debe,CM.haber,CM.saldo,CS.codigo,CS.descripcion,CM.detalle from CCuentasMayor CM inner join CCuentas CC on CM.idCuenta=CC.id left join CcentroCostos CS on CC.ccosto=CS.id where CM.fecha BETWEEN '$desde' and '$hasta'");
                              echo "1";
                            }
                            elseif ($nombre_cuenta <> 0 AND $centro_costos == 0) 
                            {
                              $queryList=mysqli_query($conn3,"SELECT CM.tipo_doc,CM.idCuenta,CM.fecha,CM.debe,CM.haber,CM.saldo,CS.codigo,CS.descripcion,CM.detalle from CCuentasMayor CM inner join CCuentas CC on CM.idCuenta=CC.id left join CcentroCostos CS on CC.ccosto=CS.id where CM.fecha BETWEEN '$desde' and '$hasta' AND CC.id='$nombre_cuenta' ");
                              echo "2 ";
                            }
                            elseif ($nombre_cuenta <> 0 OR $centro_costos <> 0) 
                            {
                              $queryList=mysqli_query($conn3,"SELECT CM.tipo_doc,CM.idCuenta,CM.fecha,CM.debe,CM.haber,CM.saldo,CS.codigo,CS.descripcion,CM.detalle from CCuentasMayor CM inner join CCuentas CC on CM.idCuenta=CC.id left join CcentroCostos CS on CC.ccosto=CS.id where CM.fecha BETWEEN '$desde' and '$hasta' AND (CC.id='$nombre_cuenta' OR CS.id='$centro_costos')");
                              echo "3";
                            }
                            
                            if ($queryList) {
                              while($rowMotorizado=mysqli_fetch_array($queryList))
                              {
                                $tipo_doc=$rowMotorizado['tipo_doc'];
                                $idCuenta=$rowMotorizado['idCuenta'];
                                $x=$rowMotorizado['x'];
                                $fecha=$rowMotorizado['fecha'];
                                $debe=$rowMotorizado['debe'];
                                $haber=$rowMotorizado['haber'];
                                $saldo=$rowMotorizado['saldo'];
                                $codigo=$rowMotorizado['codigo'];
                                $descripcion=$rowMotorizado['descripcion'];
                                $detalle=$rowMotorizado['detalle'];
                                if ($tipo_doc=='FC') {
                                  $tipo_doc_='FACTURA DE COMPRA';
                                }else if ($tipo_doc=='CD') {
                                  $tipo_doc_='COMPROBANTE DE DIARIO';
                                }else if ($tipo_doc=='EG') {
                                  $tipo_doc_='EGRESO';
                                }else if ($tipo_doc=='CI') {
                                  $tipo_doc_='COMPROBANTE DE INGRESO';
                                }

                                echo "<tr><td>{$tipo_doc}-{$tipo_doc_}</td>
                                      <td>{$idCuenta}</td>
                                      <td>-</td>
                                      <td>{$fecha}</td>
                                      <td>{$debe}</td>
                                      <td>{$haber}</td>
                                      <td>{$saldo}</td>
                                      <td>{$codigo}-{$descripcion}</td>
                                      <td>{$detalle}</td></tr>";

                              }
                            }
                            
                              ?>

                          </tbody>
                        </table>

                      </div>


                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </section>







            </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>

<script>//version 2 tabla dinamica <table id="Tabla_Inteligente">

</script>


<?php
include 'footer.php';
?>

<!-- plugin datatables inteligente print/pdf/excel etc -->
<link rel="stylesheet" type="text/css" href="plugins/datatablesK/datatables.css"/>
<script type="text/javascript" src="plugins/datatablesK/pdfmake.js"></script>
<script type="text/javascript" src="plugins/datatablesK/vfs_fonts.js"></script>
<script type="text/javascript" src="plugins/datatablesK/datatables.js"></script>
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