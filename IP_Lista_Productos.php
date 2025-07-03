<?php
include 'header.php';
include 'menu.php';

/*
   $_POST = DatosIngresarMysqli($_POST);
    
   if(isset($_POST['Guardar_Informacion_Pagina']))
   { 
      foreach ($_POST["Arreglo"] as $key => $value) {$Campos .=$key.',';$Valores .="'{$value}',";}
      $Campos = trim($Campos, ',');$Valores = trim($Valores, ',');

      $usuario_id=$_POST['usuario_id'];
      $queryList=mysqli_query($conn3,"INSERT INTO Inventario_Tipo (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

      $ruta = htmlentities($_SERVER['PHP_SELF']); 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardaron Los Datos Correctamente'</script>";}
   }
   */

?>


<style type="text/css">
  .AlertaSweet1 {
    width: 50% !important;
  }

  .AlertaSweetTexto1 {
    font-size: 15px !important;
    margin-top: -3px !important;
    margin: 0 !important;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lista de Productos
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Lista de Productos </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="content">
        <div class="box">
          <div class="box-body">

            <div class="col-xs-12">
              <a href="IP_Productos.php">
                <button class="btn btn-block btn-primary btn-sm" style="margin-bottom: 10px;">
                  <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registrar inventario </strong></h4>
                </button>
              </a>
            </div>
            <!--
              <div class="col-xs-6">
                <a href="salidadeinventario">
                <button class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Salida de inventario </strong></h4></button>
                </a>
              </div>
              <div class="col-xs-6">
                <a href="entradadeinventario">
                <button class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Entrada de inventario </strong></h4></button>
                </a>
              </div>
              -->


            <div class="col-md-12"><br>
              <table id="example1" class="table table-bordered table-striped" style="font-size: 16px;">
                <thead>
                  <tr style="font-size: 13px;">
                    <th>id</th>
                    <th>Fecha Registro</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Tipo Producto</th>
                    <th>Tipo Paquete</th>
                    <th>Existencia</th>
                    <th>Minimo</th>
                    <th>Maximo</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Fecha Vencimiento</th>
                    <th>Nota</th>
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $usuario_id = $_SESSION['ID'];

                  $contador = 0;
                  $queryList = mysqli_query($conn3, "SELECT * FROM  Inventario where usuario_id=$usuario_id AND Activo=1");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                    $id = $row_recordset32['id'];
                    $Fecha_Registro = $row_recordset32['Fecha_Registro'];
                    $Nombre = $row_recordset32['Nombre'];
                    $Referencia = $row_recordset32['Referencia'];
                    $tipo_id = $row_recordset32['tipo_id'];
                    $paquete_id = $row_recordset32['paquete_id'];
                    $Existencia = $row_recordset32['Existencia'];
                    $Minimo = $row_recordset32['Minimo'];
                    $Maximo = $row_recordset32['Maximo'];
                    $Costo = $row_recordset32['Costo'];
                    $Precio = $row_recordset32['Precio'];
                    $fecha_vencimiento = $row_recordset32['Fecha_Vencimiento'];
                    $Nota = $row_recordset32['Nota'];

                    $fecha_alerta_vencimiento = date("Y-m-d", strtotime($fecha_vencimiento . "- 10 days"));
                    $fecha_actual = date("Y-m-d");

                    if ($fecha_vencimiento <> '') {
                      $fecha_vencimiento = date("Y-m-d", strtotime($row_recordset32['Fecha_Vencimiento']));
                    }

                    $alerta = '';
                    if ($Existencia == '0') {
                      $alerta = 'background-color: red';
                      $alerta_productos_vencido .= $Nombre . ',';
                    } elseif ($Existencia <= $Minimo) {
                      $alerta = 'background-color: #fff037';
                      $alerta_productos .= $Nombre . ',';
                    }

                    if ($fecha_actual == $fecha_vencimiento) {
                      $alerta = 'background-color: red';
                      $alerta_productos_fecha_vencido .= $Nombre . ',';
                    } else if (($fecha_actual >= $fecha_alerta_vencimiento) and ($fecha_actual <= $fecha_vencimiento) AND $fecha_vencimiento != "fecha_vencimiento") {
                      $alerta = 'background-color: #fff037';
                      $alerta_productos_fecha .= $Nombre . ',';
                    }

                    $NombreTipo = funcionMaster($tipo_id, 'id', 'Nombre', 'IP_Inventario_Tipo');
                    $NombrePaquete = funcionMaster($paquete_id, 'id', 'Nombre', 'IP_Inventario_Paquetes');

                    $ruta = "IP_Productos.php";

                    echo '     <tr style="' . $alerta . '">
                      <td>' . $id . ' </td>
                      <td>' . $Fecha_Registro . ' </td>
                      <td>' . $Nombre . ' </td>
                      <td>' . $Referencia . ' </td>
                      <td>' . $NombreTipo . ' </td>
                      <td>' . $NombrePaquete . ' </td>
                      <td>' . $Existencia . ' </td>
                      <td>' . $Minimo . ' </td>
                      <td>' . $Maximo . ' </td>
                      <td>' . $Costo . ' </td>
                      <td>' . $Precio . ' </td>
                      <td>' . $fecha_vencimiento . ' </td>
                      <td>' . $Nota . ' </td>
                      <td>';

                    echo "<font color='#04CC05'> <a href='{$ruta}?Editar={$id}'><i class='fa fa-pencil' title='Editar'> </i></a></font> 
                                            <font> <a href='{$ruta}?Eliminar={$id}'> <i class='fa fa-close' title='Eliminar'> </i></a></font>";

                    echo '</td>

                      </tr>';
                  }

                  if ($alerta_productos <> '') {
                    $mensaje .= 'Los siguientes productos tienen pocas existencias : ' . $alerta_productos;
                    $mensaje_numero = '1';
                  }

                  if ($alerta_productos_vencido <> '') {
                    $mensaje .= '\nLos siguientes productos no tiene existencias : ' . $alerta_productos_vencido;
                    $mensaje_numero = '1';
                  }

                  if ($alerta_productos_fecha_vencido <> '') {
                    $mensaje .= '\nLos siguientes productos estan caducados : ' . $alerta_productos_fecha_vencido;
                    $mensaje_numero = '1';
                  }

                  if ($alerta_productos_fecha <> '') {
                    $mensaje .= '\nLos siguientes productos tienen pronto fecha de caducidad : ' . $alerta_productos_fecha;
                    $mensaje_numero = '1';
                  }

                  ?>


                </tbody>
                <tfoot>
                  <tr style="font-size: 13px;">
                    <th>id</th>
                    <th>Fecha Registro</th>
                    <th>Nombre</th>
                    <th>Referencia</th>
                    <th>Tipo Producto</th>
                    <th>Tipo Paquete</th>
                    <th>Existencia</th>
                    <th>Minimo</th>
                    <th>Maximo</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Fecha Vencimiento</th>
                    <th>Nota</th>
                    <th> </th>
                  </tr>
                  <tr style="font-size: 13px;">
                    <th colspan="7"><i class="fa fa-circle" style="color: red" aria-hidden="true"></i>Sin Existencias/Fecha Caducada</th>
                    <th colspan="7"><i class="fa fa-circle" style="color: #fff037" aria-hidden="true"></i>Pocas Existencias/Fecha Proxima a Caducar</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

if ($mensaje_numero == '1') {
  /*
      echo '<script language="javascript">';
      echo 'alert("'.$mensaje.'"  )';
      echo '</script>';
      */
?>

  <script type="text/javascript" src="plugins/Sweetalert2K/sweetalert2.js"></script>
  <script type="text/javascript">
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 23000,
      timerProgressBar: true,
      customClass: {
        container: "AlertaSweet1",
        title: "AlertaSweetTexto1"
      },
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer)
        toast.addEventListener("mouseleave", Swal.resumeTimer)
        toast.addEventListener("click", Swal.clickConfirm)
      }
    })


    Toast.fire({
      icon: "warning",
      title: "<?php echo $mensaje; ?>"
    })
  </script>

<?php
}
?>