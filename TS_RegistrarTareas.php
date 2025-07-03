<?php
include 'header.php';
include 'menu.php';
$usuario_id = $_SESSION['ID'];
$ID_principal = $_SESSION['ID_principal'];
if (isset($_POST['Guardar_Tarea'])) {
  $titulo     = trim($_POST['Titulo']);
  $tarea     = trim($_POST['Tarea']);
  $usuario_id     = trim($_POST['usuario_id']);
  $asignado = $_POST['asignado'];
  $fechaR = $_POST['fechaR'];
  $ID_principal = $_POST['ID_principal'];
  $nombre_usuario = funcionMaster($asignado,'ID','NOMBRE_USUARIO','usuarios');
  mysqli_query($conn3, "INSERT INTO TS_Tareas (usuario_id, tarea, titulo, asignado, nombreAuxiliar, fechaR,ID_principal) VALUES ('$usuario_id','$tarea','$titulo','$asignado','$nombre_usuario', '$fechaR','$ID_principal')");
  echo "<script language='Javascript'> window.location='calendarioTareasGestion?msg=Tarea';</script>";
}
?>

<link href="css/input.css" rel="stylesheet" type="text/css" media="all">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Asignacion de Tareas</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Tareas </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <form action="TS_RegistrarTareas.php" method="POST" name="formularioActualizarcliente" id="formularioActualizarcliente">
              <div class="form-group col-md-12">

                <div class="form__group col-md-12 col-xs-offset-12">
                  <input class="form__field" name="Titulo" id="Titulo" type="text" required>
                  <label for="Titulo" class="form__label">Titulo</label>
                </div>
                <div class="form__group col-md-12 col-xs-offset-12">
                  <input class="form__field" name="fechaR" id="fechaR" type="date" required>
                  <label for="Titulo" class="form__label">Fecha</label>
                </div>
                <div class="form__group col-md-12 col-xs-offset-12">
                  <textarea class="form__field" name="Tarea" id="Tarea" style="max-width:100%;"></textarea>
                  <label for="Tarea" class="form__label">Tareas</label>
                </div>
                <div class="form__group col-md-12 col-xs-offset-12">
                  <select class="form__field" name="asignado" style="max-width:100%;">
                    <?php
                    $queryUsuarios = mysqli_query($conn3, "SELECT * FROM usuarios WHERE ID_principal = $usuario_id or ID_principal = $ID_principal");
                    while ($arrayUsuarios = mysqli_fetch_assoc($queryUsuarios)) {
                      
                        echo "<option value='{$arrayUsuarios['ID']}'>" . $arrayUsuarios['NOMBRE_USUARIO'] . "</option>";
                      
                    }
                    
                    ?>
                    <!-- <option value="0">General</option>
                    <option value="1">Auxiliar 1</option>
                    <option value="2">Auxiliar 2</option>
                    <option value="3">Auxiliar 3</option>
                    <option value="4">Auxiliar 4</option> -->
                  </select>
                  <label for="asignado" class="form__label">Asignado a:</label>
                </div>

              </div>
              <input type="hidden" name="ID_principal" value="<?php echo $ID_principal ?>">
              <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
              <div class="form-group col-md-12 col-xs-offset-12">
                <button type="submit" class="btn btn-block btn-outline-info btn-sm pulse rounded-pill " name="Guardar_Tarea" style="left: -8.5px;position: inherit;">
                  <h4> <strong> G u a r d a r </strong> </h4>
                </button>
              </div>
            </form>

            <style type="text/css">
              a:hover,
              a:focus {
                text-decoration: none;
                outline: none;
              }

              #accordion {
                padding-right: 24px;
                padding-left: 24px;
                z-index: 1;
              }

              #accordion .panel {
                border: none;
                box-shadow: none;
              }

              #accordion .panel-heading {
                padding: 0;
                border-radius: 0;
                border: none;
              }

              #accordion .panel-title {
                padding: 0;
              }

              #accordion .panel-title a {
                display: block;
                font-size: 16px;
                font-weight: bold;
                background: #3c8dbc;
                color: white;
                padding: 15px 25px;
                position: relative;
                margin-left: -24px;
                transition: all 0.3s ease 0s;
              }

              #accordion .panel-title a.collapsed {
                background: #3c8dbc87;
                color: #ffffff;
                margin-left: 0;
                transition: all 0.3s ease 0s;
              }

              #accordion .panel-title a:before {
                content: "";
                border-left: 24px solid #3c8dbcf7;
                border-top: 24px solid transparent;
                border-bottom: 24px solid transparent;
                position: absolute;
                top: 0;
                right: -24px;
                transition: all 0.3s ease 0s;
              }

              #accordion .panel-title a.collapsed:before {
                border-left-color: #93bed7d6;
              }

              #accordion .panel-title a:after {
                /*content: "\f106";*/
                content: "▼";
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                position: absolute;
                top: 30%;
                right: 15px;
                font-size: 18px;
                color: white;
              }

              #accordion .panel-title a.collapsed:after {
                /*content: "\f107";*/
                content: "►";
                color: white;
              }

              #accordion .panel-collapse {
                position: relative;
              }

              #accordion .panel-collapse.in:before {
                content: "";
                border-right: 24px solid #3c8dbccf;
                border-bottom: 18px solid transparent;
                position: absolute;
                top: 0;
                left: -24px;
              }

              #accordion .panel-body {
                font-size: 14px;
                color: #333;
                background: #e4e4e4;
                border-top: none;
                z-index: 1;
              }
            </style>
            <?php if ($_SESSION['ID'] <> '') : ?>
              <div class="">
                <div class="col-md-12">
                  <h2 style="left: 38px;position: relative;"><b>Historial de Tareas</b></h2>
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    $arreglo["Ok"] = "#00800066";
                    $arreglo["Con Dificultades"] = "#ffff00";
                    $arreglo["No Realizado"] = "#ff0000cc";
                    $queryList = mysqli_query($conn3, "SELECT * FROM TS_Tareas WHERE (usuario_id = '$usuario_id' or ID_principal = '$ID_principal') AND estado != 2");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $id = $rowMotorizado['id'];
                      $titulo = $rowMotorizado['titulo'];
                      $fecha = $rowMotorizado['fecha'];
                      $fechaR = $rowMotorizado['fechaR'];
                      $tarea = $rowMotorizado['tarea'];
                      $comentarios = "";
                      $queryList2 = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Comentarios where id_tarea = '$id' ORDER BY id ASC ");
                      $nrowl = mysqli_num_rows($queryList2);
                      while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
                        $estado = $rowMotorizado2['estado'];
                        $comentarios .= '<div class="col-md-12 col-sm-12 col-xs-12"><b>Comentarios: </b> ' . $rowMotorizado2['comentario'] . '<br><b>Fecha: </b>' . $rowMotorizado2['fecha'] . '</div><hr style="border-right: solid;border-top: 3px solid ' . $arreglo[$rowMotorizado2['estado']] . ';">';
                      }
                    ?>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Diagnostico<?php echo $id ?>" aria-expanded="false" aria-controls="collapseTwo">
                              <?php echo $id; ?> - <?php echo $titulo; ?> - <?= ($fechaR ? $fechaR : $fecha); ?> <i class="fas fa-heartbeat" style="color:<?php echo $arreglo[$estado] ?>"></i>
                            </a>
                          </h4>
                        </div>
                        <div id="Diagnostico<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <?php
                            echo $comentarios;
                            ?>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </section>
</div>
<?php include("footer.php") ?>