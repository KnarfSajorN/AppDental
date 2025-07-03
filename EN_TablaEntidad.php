<?php
include 'header.php';
include 'menu.php'; 

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

?>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Facturacion Entidad</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina"> Facturacion Entidad</h4>

                <div class="box">

                    <div class="box-header">
                        <div class="">

                            <div class="col-xs-12">


                            </div>

                        </div>





                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <h4 id="TituloTabla" style="text-align:center"></h4>
                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Nombre Entidad</th>
                                        <th>Codigo</th>
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


<!-- Modal -->
<div class="modal fade" id="ModalFacturacionEntidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipo Facturacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="Tabla_EntidadesConvenios">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<script>
        //version 2 tabla rapida id="Tabla_Rapida_AJAX"
  var titulo_tabla = "Pacientes";

       query_tabla_ajax = "<?php echo "SELECT * FROM  Rips_Entidades WHERE Activo = 1 "; ?>";

  columnas = ['id', 'Nombre', 'Codigo'];

  columnastablas = [{
      "data": "Nombre"
    },
    {
      "data": "Codigo"
    },
    {
      "data": function(row, type, set) {
        botones = "";
        botones += "<button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' data-toggle='modal' data-target='#ModalFacturacionEntidad' onclick='AbrirModalEntidadFacturacion("+row.id+")' style='width:100%;'> Ver Contratos a Facturar </button><br>";
        return botones;
      }
    }
  ];

</script>
<?php
include("footer.php");
?>

<script>
    function AbrirModalEntidadFacturacion(entidad_id) {

      $.ajax({
        type: "POST",
        url: "EN_AjaxFacturacion.php",
        data: {
          entidad_id: entidad_id,
          Tipo_Consulta: "Tabla Facturacion Entidad Tipo Contrato"
        },
        success: function(response) {
          $('#Tabla_EntidadesConvenios').html(response);
        }
      });

    }
  </script>