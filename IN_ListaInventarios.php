<?php
include 'header.php';
include 'menu.php';
if(isset($_GET['deposito'])){
  $idDepo = $_GET['deposito'];
}else{
  echo "<script>window.location.href='".$Base."/IN_inventarioDepo.php'</script>";
}

$tabla = "sinvetrios";
// $idUpdate = base64_decode($_GET['C']);

$idDepo=$_GET['deposito'];


$queryList = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = '{$_SESSION['ID']}' or ID_Usuario = '{$_SESSION['ID_principal']}')");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $valorCampo = $_POST['campo']; // Reemplaza 'campo' por el nombre de tu campo en la base de datos
  $idFila = $_POST['rowId']; // Recibe el ID de la fila
  // ...

  // Responde con un mensaje de éxito o error
  http_response_code(200); // OK
  // echo "Datos actualizados correctamente";
} else {
  http_response_code(400); // Bad Request
  // echo "Error al procesar la solicitud";
}

?>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <br>

  <section class="content">

    <div class="box box-info" align="center">

      <div class="card-body">

        <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <h2>Lista Inventario</h2>
          </div>
          <div class="col-md-3">
          </div>
        </div>

        <div class="tab-pane" id="tab-eg-1" role="tabpanel">
            <!-- lista -->
            <div class="row">
              <div class="col-md-12 table-responsive">
                <table class="table table-striped table-bordered" id="tablaInv" style="width:100%;">
                  <?php
                  $tableColumna = [
                    'Referencia',
                    'Descripción',
                    'Tipo',
                    'Precio',
                    'Opciones'
                  ]
                  ?>
                  <thead>
                    <tr>
                      <?php
                      foreach ($tableColumna as $columna) {
                        echo "<th>$columna</th>";
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    $querysinvetrios = "SELECT * from sinvetrios where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and estado = 1";
                    $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                    while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {
                      $existencia = 0;
                      $existencia = funcionMaster($idDepo, 'idSinvetrios ="'.$rowsinvetrios['ID'].'" AND idDep' ,'existencia','SinvDep');//verifica existencia en SinvDep
                      $cantidad_minima = $rowsinvetrios['minimo'];
                      $descripcion = $rowsinvetrios['descripcion'];
                      $tipo = funcionMaster($rowsinvetrios['tipo'], 'id', 'descripcion', 'scategoria');
                      $tipoNumero=funcionMaster($rowsinvetrios['tipo'], 'id', 'tipo', 'scategoria');
                      $row_class = '';
                      if (($existencia == 0  || $existencia =='') && $tipoNumero != '2') {
                        $row_class = 'table-danger';
                        $alerta_producto_nostock.=  "<li class='list-group-item'>" . $descripcion.= ' </li>';
                        // $alerta_producto_nostock.= $descripcion.=',';
                      } elseif ($existencia <= $cantidad_minima && $tipoNumero != '2') {
                        $row_class = 'table-warning';
                        $alerta_productos_lowstock.= "<li class='list-group-item'>" . $descripcion.' </li>';
                        // $alerta_productos_lowstock.=$descripcion.',';
                      }
                      if($tipoNumero == '2'){$row_class = 'table-success';}
                    ?>
                      <tr  class="<?= $row_class ?>" clss="center text-center" data-existencia="<?= $existencia ?>" data-quantityMin="<?= $quantityMin ?>">
                        <td><?= $rowsinvetrios['ID'] ?></td>
                        <td><?= $rowsinvetrios['descripcion'] ?></td>
                        <td><?= $tipo ?></td>
                        <td>
                          <p class="text-primary"><strong><?= number_format($rowsinvetrios['precio'], 2, '.', ' ') ?> <?= $moneda; ?> </strong></p>
                        </td>
                        <td >
                          <a href="IN_Inventario?Editar=<?= ($rowsinvetrios['ID']) ?>" class="btn btn-light" title="editar">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="IN_InventarioCategoria?FAID=<?= base64_encode($rowsinvetrios['ID']) ?>" class="btn btn-secondary" title="editar">
                            <i class="fas fa-gear"></i>
                          </a>
                          <button class="btn btn-danger" title="eliminar" onclick="alerts({title: 'Seguro que desea eliminar este registro?',text: '',icon:'info',update: `0|/|estado|/|<?= $tabla ?>|/|<?= $rowsinvetrios['ID'] ?>|/|IN_ListaInventarios` });">
                            <i class="fas fa-close"></i>
                          </button>
                        </td>
                      </tr>
                    <?php
                      
                    }
                    if($alerta_producto_nostock != ''){
                      // $mensaje.= '\nLos siguientes productos ya no tiene existencias :\n '.$alerta_producto_nostock;
                      $mensaje.= '<br> Los siguientes productos ya no tiene existencias : <br> <ul class="list-group">'.$alerta_producto_nostock . "</ul>";
                      $mensaje_numero='1';
                    }
                    if($alerta_productos_lowstock != ''){
                      // $mensaje.= '\n Los siguientes productos tienen existencias por debajo del minimo :\n '.$alerta_productos_lowstock;
                      $mensaje.= '<br> Los siguientes productos tienen existencias por debajo del minimo :<br> <ul class="list-group">'.$alerta_productos_lowstock . "</ul>";
                      $mensaje_numero='1';
                    }

                    if($mensaje_numero=='1') { ?>
                      <script>
                        Swal.fire({
                          icon: 'warning',
                          title: 'Alerta',
                          html: `<?= $mensaje ?>`,
                        })
                      </script>
                      <!-- echo '<script language="javascript">';
                      echo 'alert("'.$mensaje.'"  )';
                      echo '</script>'; -->
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <?php
                      foreach ($tableColumna as $columna) {
                        echo "<th>$columna</th>";
                      }
                      ?>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php' ?>
  <script>
    // // formulario automatico
    // $(document).ready(function() {
    //   timezone = Intl.DateTimeFormat().resolvedOptions().timeZone.split("/");
    //   $('#dep-form').creatorForm({
    //     automaticForm: { // formulario automatico enviamos tipo y el id
    //       type: <?= $idUpdate ? 2 : 1 ?>, // donde 1 es para insertar y 2 es para actualizar
    //       idUpdate: <?= $idUpdate ? $idUpdate : "''" ?>, // este caso solo se llena si es tipo 2 aqui va el id de la tabla
    //     },
    //     sweetalert2: false, // alteras
    //     btnReferences: '#configForm', // ahorita nada
    //     contentReferences: '#dep-form', // formulario que contiene los datos
    //     table: '<?= $tabla ?>', // tabla a gestionar
    //     reload: '', // reload pa actualizar
    //     page: 'IN_tipo_inventarios', // aqui va el php o pantalla para recargar
    //   });


    // })
$(document).ready(function() {
  $('#tablaInv').DataTable({
    "searching": true,
    "paging": true,    
    "ordering": true,
    "info": true    
  });
});
</script>

<!-- Tabla antigua Para ver la tabla antigua busca el archivo 'tablaAntiguaListaInv.php -->