<!-- Left side column. contains the logo and sidebar -->
<?php
require_once '../header.php';
require_once '../menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
  $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
} else {
  $queryCliente = "";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-4">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Presupuestos Odontograma

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Presupuestos Odontograma</a></li>


    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">
        <?php
        $msg = $_GET['msg'];
        if ($msg == '1') {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
        }

        if ($msg == '2') {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>';
        }
        ?>

        <div class="box">

          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <div class="my-2">
              <button class="btn btn-success">Aprobado</button>
              <button class="btn btn-danger">No aprobado</button>
              <button class="btn btn-danger" style="border: 0.1px solid black; background-color: transparent; color: black">Pendiente</button>
            </div>
            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nombre Cliente</th>
                  <th>Fecha</th>
                  <th>N° Items</th>
                  <th>Valor abonado</th>
                  <th>Valor total</th>
                  <th></th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php $cols = "OP.id, OP.fecha_registro, OP.cliente_id, OP.total_neto, OP.monto_pagado, OP.cantidad_items, OP.estado_presupuesto ,OP.firma, OP.soperacioninv_id,cli.nombre_cliente"; ?>
<script>
  //version 2 tabla rapida id="Tabla_Rapida_AJAX"
  var titulo_tabla = "Pacientes";
  const query_tabla_ajax = `<?= "SELECT {$cols} FROM  OP_Presupuesto OP 
                              INNER JOIN cliente cli 
                              ON cli.cliente_id = OP.cliente_id
                              WHERE 1=1 
                              AND (OP.ID_principal = '{$_SESSION['ID']}' or OP.ID_principal = '{$_SESSION['ID_principal']}') 
                              ORDER BY OP.fecha_registro"; ?>`;

  columnas = ['fecha_registro', 'cliente_id', 'total_neto', 'monto_pagado', 'cantidad_items', 'nombre_cliente', 'firma', 'estado_presupuesto', 'id', 'soperacioninv_id'];

  columnastablas = [{
      "data": "nombre_cliente"
    },
    {
      "data": "fecha_registro"
    },
    {
      "data": "cantidad_items"
    },
    {
      "data": "monto_pagado"
    },
    {
      "data": "total_neto"
    },
    {
      "data": function(row, type, set) {

        let classAdd = ``;
        switch (row.estado_presupuesto) {
          case "0":
            classAdd = ``;
            break;
          case "1":
            classAdd = `btn-aprobado`;
            break;
          case "2":
            classAdd = `btn-no-aprobado`;
            break;
            
            default:
            classAdd = ``;
            break;
        }


        botones = "";
        botones += `<a title="Ver detalle" class="${classAdd}" onclick="verDetalle('${btoa(row.id)}')"> <i class='fas fa-eye text-primary'></i></a>`;

        if (row.firma == '' || row.firma == null && row.estado_presupuesto == '0') {
          botones += `<a title="Autorizar" onclick="enviarFirma(${row.id})"> <i class='fas fa-file-contract text-primary'></i></a>`;
        }

        // if ( (row.estado_presupuesto == '1' || row.estado_presupuesto == '0') && ( row.soperacioninv_id == '0' || row.soperacioninv_id == '' ) ) {
        if ( (row.estado_presupuesto == '1' || row.estado_presupuesto == '0') && !row.soperacioninv_id  ) {
          botones += ` <a  title="${!row.firma ? 'Por favor autorice este presupuesto antes de generar' : 'Generar presupuesto corriente'}"  href="${!row.firma ? '#' : `OP_GenerarPresupuestoCorriente?id=<?= salt() ?>${btoa(row.id)}`}" > <i class="fas fa-file-invoice"></i></a>`;
        }


        return botones;
      }
    }

  ];
</script>
<?php require_once '../footer.php'; ?>

<script>
  function enviarFirma(id) {
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'Al confirmar esta accion se enviará un mensaje via Whatsapp al cliente/paciente para firmar y autorizar',
      icon: 'info',
      showCancelButton: true,
      confirmButtonText: 'Sí',
      cancelButtonText: 'No',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php",
          method: 'POST',
          data: {
            id,
            Tipo_Consulta: 'Enviar_Confirmacion'
          },
          success: function(result) {
            console.log(result);

            const response = JSON.parse(result);
            const { error, status, message } = response;

            Swal.fire({
              icon: status ? 'success' : 'error',
              title: status ? 'Correcto' : 'Error',
              text: message
            });

          }
        });
      }
    });
  }


  function verDetalle(idEncrypted) {
    const id = atob(idEncrypted);
    $.ajax({
      url: "<?= $Base ?>OdontoPresupuesto/ajax/OP_Ajax.php",
      method: 'POST',
      data: {
        id,
        Tipo_Consulta: 'Consultar'
      },
      success: function(result) {

        const response = JSON.parse(result);
        const {
          error,
          status,
          message,
          data
        } = response;

        const html = dataToHtml(data);

        if (!status) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: message
          });
          return;
        }

        $("#modal-detalle-body").html(html);
        $("#modalDetalle").modal('show');

      }
    });
  }


  function dataToHtml(data) {
    const {
      fecha_registro,
      fecha_vencimiento
    } = data;
    const {
      nombre_usuario,
      nombre_cliente,
      detalle
    } = data;

    let html = `<table class="table">
                    <thead>
                      <tr>
                        <th>Fecha Registro</th>
                        <th>Fecha de vencimiento</th>
                      </tr>
                      <tr>
                        <td>${fecha_registro}</td>
                        <td>${fecha_vencimiento}</td>
                      </tr>
                      <tr>
                        <th>Realizado por</th>
                        <th>Realizado a </th>
                      </tr>
                      <tr>
                        <td>${nombre_usuario}</td>
                        <td>${nombre_cliente}</td>
                      </tr>
                    </thead>
                  </table>`;

    html += `<table class="table">
                <thead>
                  <tr>
                    <th colspan="5" class="text-center">Detalle</th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>Pieza</th>
                    <th>Cara</th>
                    <th>Procedimiento</th>
                    <th>Valor</th>
                  </tr>
                </thead>
                <tbody>`;

    detalle.forEach(det => {
      console.log("det => ", det);

      const {
        pieza_id,
        cara,
        descripcion,
        procedimiento,
        precio_total_base,
        procedimientoIcon
      } = det;
      html += ` <tr>
                  <td><img style="max-width:20px" src="<?= $Base ?>OD_ImagenOdontograma/${pieza_id}.png"></td>
                  <td>${descripcion}</td>
                  <td>${cara}</td>
                  <td>${procedimientoIcon} ${procedimiento}</td>
                  <td>$ ${precio_total_base}</td>
                </tr>`;
    });

    html += `</tbody></table>`;
    return html;
  }


  $(document).ready(function() {
    // setTimeout(() => {

    $('#Tabla_Rapida_AJAX').on('draw.dt', function() {
        // let numFilas = $('#miTabla').DataTable().rows().count();
        // console.log(`⚡ La tabla ahora tiene ${numFilas} filas.`);
        $(`.btn-aprobado`).each(function() {
          const elemento = $(this);
          const abuelo = $(this).parent().parent();
          // console.log("abuelo 1" , abuelo);
          abuelo.addClass("table-success");
        })
      
        $(`.btn-no-aprobado`).each(function() {
          const elemento = $(this);
          const abuelo = $(this).parent().parent();
          // console.log("abuelo 2" , abuelo);
          abuelo.addClass("table-danger");
        })
    });

      
    // }, 2000);

    
  })




</script>

<div id="modalDetalle" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> <i class="fas fa-file-invoice"></i> Detalle de Presupuesto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modal-detalle-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fas fa-xmark"></i> Cerrar</button>
      </div>
    </div>

  </div>
</div>

<style>
  .modal-body {
    max-height: 400px;
    overflow-y: auto;
  }
</style>