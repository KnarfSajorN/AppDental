<?php
include 'header.php';
include 'menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
  $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
}else{
  $queryCliente = "";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Pacientes</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="col-md-12">
        <h4 class="Titulo_Pagina">Pacientes Historia Medicina Estética</h4>


        <div class="box">
          <div class="box-header row">

            <div class="col-md-12">
                     <a href="nuevoPaciente">
              <button   class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" ><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Pacientes </strong></h4></button>
              </a>
            </div>

            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <div class="box-body table-responsive no-padding">
              <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Dirección (Casa)</th>
                    <th>Celular (Contacto)</th>
                    <th>Celular (WhatsApp)</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th> </th>
                  </tr>
                </thead>
              </table>
            </div>
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


<div id="my-modal-Estado-Ingreso" class="modal fade" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 10px;background: transparent !important;">
      <div class="modal-header" style="margin: 0;padding: 0;border: none;"></div>
      <div class="modal-body" style="margin: 0;">
        <div class="col-md-12">
          <div class="row">
            <div class="form-group">
              <div class="col-md-12 text-center" id="div-Ingresos">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="margin: 0;padding: 0;border: none;"></div>
    </div>
  </div>
</div> 
<script>
  //version 2 tabla rapida id="Tabla_Rapida_AJAX"
  var titulo_tabla = "Pacientes";
     <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
        $filtro = (($_SESSION['vista'] == 1) ? "(ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}' ) AND " : ''); ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' $queryCliente ORDER BY cliente_id"; ?>";
        // query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' ORDER BY cliente_id"; ?>";

     <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? "(ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}'  ) AND " : ''); ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE  {$filtro} $queryCliente ORDER BY cliente_id"; ?>";
     <?php } ?>
  columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'estado'];

  columnastablas = [{
      "data": "nombre_cliente"
    },
    {
      "data": "CODI_CLIENTE"
    },
    {
      "data": "direccion_cliente"
    },
    {
      "data": "telefono_cliente"
    },
    {
      "data": "whatsapp"
    },
    {
      "data": "correo_cliente"
    },
    {
      "data": "estado"
    },
    {
      "data": function(row, type, set) {
        botones = "";
        botones += "<a href='hcme?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
        botones += "<a href='hcmeVerPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Ver Historial'><i class='fas fa-book-medical'></i> </a>";
        botones += "<a href='agregarCitas?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
        botones += "<a href='nuevoPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
        botones += "<a href='anexosPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Anexar Archivos'><i class='fa fa-folder-open'></i> </a>";
        botones += "<a href='fotosPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Antes, durante y después'><i class='far fa-images text-info'></i> </a>";
        botones += "<a href='#usuarioModal' data-toggle='modal' data-target='#my-modal-Estado-Ingreso' title='Procedimientos' onclick=\"verIngresos({cliente_id: " + row.cliente_id + ", usuario_id: <?= $_SESSION['ID'] ?>})\"><i class='fa fa-user text-danger'></i> </a>";
        return botones;
      }
    }
  ]; 

<?php
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
?>
  

</script>




<?php
include("footer.php");
include("ajaxCreadorSelect.php");
?>

<script type="text/javascript">
  function funcionDinamica() {
    Select2Dinamico(
      "#tipoIngreso", {
        selectFrom: "<?= Encriptar("*") ?>",
        name: "<?= Encriptar("estadosIngreso") ?>",
        value: "<?= Encriptar("id") ?>",
        text: "<?= Encriptar("nombreEstado") ?>",
        likeWhere: "<?= Encriptar("nombreEstado") ?>",
        order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
        clausula: {
          data: "<?= Encriptar("estado = 1") ?>",
          value: [''],
        },
        carapter: "true",
        campoCreador: btoa(JSON.stringify({
          nombreCreador: false,
          conditionInsert: false,
          conditionSelect: false,
        })),
      }, false, false
    );
  }

  function verIngresos(data) {
    console.log('entro');
    //console.log(data);
    data.cargarCard = "cargarCard";
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      data: data,
      success: function(response) {
        $('#div-Ingresos').html(response);
        console.log("entro");
        $("#form-ingresos").submit(function(e) {
          e.preventDefault();
          var data = new FormData(this);
          addEstado(data);
        });
      }
    });
  };

  function addEstado(data) {
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      processData: false,
      contentType: false,
      data: data,
      success: function(response) {
        // console.log(response);
        let datos = JSON.parse(response);
        if (datos.status == 1) {
          verIngresos({
            cliente_id: atob(datos.cliente_id),
            usuario_id: <?= $_SESSION['ID'] ?>
          })
        } else {
          alert("El estado no fue agregado");
        }
      }
    });
  }

  function verEstado(data) {
    data.cargarEstadoTipo = "cargarEstadoTipo";
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      data: data,
      success: function(response) {
        $('#div-campoAdicional').html(response);
      }
    });
  };

  function cerrarEstado(data) {
    data.cerrarEstado = "cerrarEstado";
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      data: data,
      success: function(response) {
        let datos = JSON.parse(response);
        if (datos.status) {
          verIngresos({
            cliente_id: atob(datos.cliente_id),