<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Odontograma Pediátrico</a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="ODP_Odontopediatria?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Actualizar Odontograma Pediátrico</a>
            
            <!-- Botón para abrir el modal impresiones -->
            <button type="button" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" data-toggle="modal" data-target="#ModalImpresionOdontgrama">
                        Impresiones Odontograma Pediátrico
            </button>

                        <!-- HTML para el modal -->
                        <div class="modal fade" id="ModalImpresionOdontgrama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Impresiones Odontograma Pediátrico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="display: inline-table;width:100%">
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=1&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Temporal </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=2&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Permanentes </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=3&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Completo </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        

            <?php
            include 'estadoFacturaPresupuestoCliente.php';
            ?>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historial del Odontograma Pediátrico </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  <?php

                    echo "<table id='TablaOdontograma' class='table table-bordered table-striped' style='text-align-last: center;'>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Usuario</th>
                            <th>Icono</th>
                            <th>Diente</th>
                            <th>Procedimiento</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>";
                            
                    $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM ODP_OdontogramaMasterDetalle WHERE cliente_id = '$clienteId' AND usuario_id = '$usuarioId' AND Activo = 1 ORDER BY id DESC");
                    while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

                    $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Icono','ODP_Procedimiento'),'id','SVG','ODP_Iconos_SVG');
                    $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Color','ODP_Procedimiento');
                    $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);

                    echo "<tr>
                        <td width='10%'>
                            ".$RowOdontogramaMaster["Fecha"]."
                        </td>
                        <td width='10%'>
                            ".$RowOdontogramaMaster["Hora"]."
                        </td>
                        <td width='15%'>
                        ".funcionMaster($RowOdontogramaMaster["usuario_id"],'ID','NOMBRE_USUARIO','usuarios')."
                        </td>
                        <td  width='20%'style='text-align: -webkit-center;'>
                            <div style='width:40px'>
                            ".$SVG." 
                            </div>
                            <br>
                            Cara: ".$RowOdontogramaMaster["NombreCara"]."
                        </td>
                        <td width='10%'>
                            ".$RowOdontogramaMaster["Numero_Diente"]."
                        </td>
                        <td width='10%'>
                            ".funcionMaster($RowOdontogramaMaster["Procedimiento"],"id","Nombre","ODP_Procedimiento")."
                        </td>
                        <td width='45%'>
                            ".$RowOdontogramaMaster["Detalle"]."
                        </td>
                    </tr>";
                    }

                    echo "</tbody>
                    </table>";


                  ?>

                </div>
              </div>
              <!--final accordion-->   
            </div>
            <!-- cierre seccion 1-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>


<?php
include 'footer.php';
?>

<script>
$(document).ready(function() {
  var table = $('#TablaOdontograma').DataTable({
    "language": {
            "url": "plugins/DataTablesK2/Es.json"
      },
    searchPanes: {
        viewCount: true,
        cascadePanes: true,
        initCollapsed: false,
        show:true
      },
    dom: 'Plfrtip',
    columnDefs: [{
                searchPanes: {
                    show: true
                },
                targets: [0,4,5]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [1,2,3,6]
            }
        ]
  });


});
</script>