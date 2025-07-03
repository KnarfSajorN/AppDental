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
      <li><a href="#">Historial Odontograma</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="OD_Odontograma?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Actualizar Odontograma </a>
            <a href="OD_Impresion?clienteId=<?=$clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
              <button class="btn btn-outline-info btn-lg rounded-pill shadow m-1 ">
                <strong> <i class="fa-solid fa-teeth"></i> Imprimir Odontograma </strong>
              </button>
            </a>

            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            $FacturacionTipo="OD_GenerarFactura?clienteId={$Cliente_id}";//Facturacion Odontologia, con esto cambia la ruta del boton
            include 'IncludeBotonesHistorialHistorias.php'; 
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
            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historial del Odontograma </a></li>
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
                            <th>Estado/Firma</th>
                        </tr>
                    </thead>
                    <tbody>";
                            
                    $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE cliente_id = '$clienteId' AND (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') ORDER BY id DESC");
                    while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

                    $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Icono','OD_Procedimiento'),'id','SVG','OD_Iconos_SVG');
                    $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Color','OD_Procedimiento');
                    $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);

                    $EstadoFirma = funcionMaster($RowOdontogramaMaster["id"], 'detalle_id', 'id', 'OD_FirmaDetalle');
                    $Estado_Procedimiento = $RowOdontogramaMaster["Estado_Procedimiento"];
                    $Estado_Procedimiento_Detalle = $RowOdontogramaMaster["Estado_Procedimiento_Detalle"];

                    if ($EstadoFirma != "") {
                      $EstadoFirma = "<label style='color:green;'>Firmado</label>";
                      
                  } else {
                      $EstadoFirma = "<label style='color:red;'>Sin Firma</label>";
                  }

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
                            ".funcionMaster($RowOdontogramaMaster["Procedimiento"],"id","Nombre","OD_Procedimiento")."
                        </td>
                        <td width='45%'>
                            ".$RowOdontogramaMaster["Detalle"]."
                        </td>
                        <td >
                            Firma: ".$EstadoFirma."
                            <hr>
                            Estado: ".$Estado_Procedimiento." <br>
                            ".$Estado_Procedimiento_Detalle."
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