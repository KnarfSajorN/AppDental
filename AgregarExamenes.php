<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];

$msg = $_GET['msg'];

if (isset($_POST['guardar_laboratorio'])) {

  $laboratorio     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['laboratorio'])));
  $id_usuario     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id_usuario'])));

  mysqli_query($conn3, "INSERT INTO examenes_historia (id_usuario, Nombre, Tipo, usuario_id) 
     VALUES ('$id_usuario', '$laboratorio', '2', '{$_SESSION['ID']}');");

  echo "<script language='Javascript'> window.location='AgregarExamenes.php?msg=1_1';</script>";
}

if (isset($_POST['guardar_imagenologia'])) {

  $imagenologia     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['imagenologia'])));
  $id_usuario     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id_usuario'])));

  mysqli_query($conn3, "INSERT INTO examenes_historia (id_usuario, Nombre, Tipo, usuario_id) 
     VALUES ('$id_usuario', '$imagenologia', '1', '{$_SESSION['ID']}');");

  echo "<script language='Javascript'> window.location='AgregarExamenes.php?msg=2_1';</script>";
}


if (isset($_POST['actualizar_examen'])) {

  $laboratorio     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['laboratorio'])));
  $imagenologia     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['imagenologia'])));
  $id_usuario     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id_usuario'])));
  $id_examen     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_POST['id_examen'])));

  if ($laboratorio <> "") {
    mysqli_query($conn3, "update examenes_historia set id_usuario = '$id_usuario' , Nombre = '$laboratorio' where id='$id_examen' limit 1 ");
  } elseif ($imagenologia <> "") {
    mysqli_query($conn3, "update examenes_historia set id_usuario = '$id_usuario' , Nombre = '$imagenologia' where id='$id_examen' limit 1 ");
  }


  echo "<script language='Javascript'> window.location='AgregarExamenes.php?msg=2';</script>";
}

if (isset($_GET['editar'])) {
  $id_examen = $_GET['editar'];
  $valor = funcionMaster($id_examen, 'id', 'Nombre', 'examenes_historia');
}

if (isset($_GET['borrar_examenes'])) {
  $id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['borrar_examenes'])));

  mysqli_query($conn3, "DELETE FROM examenes_historia WHERE id = '$id' limit 1;");

  echo    "<script language='Javascript'> window.location='AgregarExamenes.php?msg=3';</script>";
}


?>

<style type="text/css">
.select2-container .select2-selection--single {
    height: 47px !important;
    padding: 15px !important;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil </a></li>
        <li><a href="#"> Comision </a></li>
      </ol>
      <br>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <?php
    if ($msg == "1_1") {
      echo  '<div class="callout callout-info">
                    <h4> Examen Laboratorio Creado </h4>
                     <p></p>
                  </div>';
    } elseif ($msg == "2_1") {
      echo  '<div class="callout callout-info">
                    <h4> Examen Imagenología Creado </h4>
                     <p></p>
                  </div>';
    } elseif ($msg == "2") {
      echo  '<div class="callout callout-info">
                    <h4> Examen Actualizado </h4>
                     <p></p>
                  </div>';
    } elseif ($msg == "3") {
      echo  '<div class="callout callout-danger">
                    <h4> Examen Eliminado </h4>
                     <p></p>
                  </div>';
    }
    ?>
        <form action="AgregarExamenes.php" method="POST">
            <div class="box">
                <div class="box-body">
                    <div class="container">

                        <?php if ($_GET['examen'] == "laboratorio") {
              echo '<div class="form-group col-md-12" align="center">
                      <h2>Agregar Examenes de Laboratorio</b></h2>
                    </div>

                    <div class="col-md-12">
                        <label>Nombre del Examen de Laboratorio</label>
                        <input type="text" name="laboratorio"  class="form-control input-lg"  placeholder="Examen"  maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="' . $valor . '" > 
                    </div>
                    <input  type="hidden" name="id_usuario"  value="' . $_SESSION['ID'] . '">';
              if (isset($_GET['editar'])) {
                echo '<div class="col-md-12">
                        <input  type="hidden" name="id_examen"  value="' . $id_examen . '">
                        <br>
                        <br>
                        <center><button type="submit" name="actualizar_examen" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  A C T U A L I Z A R  </strong> </h2> </button></center>
                      </div>';
              } else {
                echo '<div class="col-md-12">
                        <br>
                        <br>
                        <center><button type="submit" name="guardar_laboratorio" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G U A R D A R  </strong> </h2> </button></center>
                      </div>';
              }
            } elseif ($_GET['examen'] == "imagenologia") {
              echo '<div class="form-group col-md-12" align="center">
                      <h2>Agregar Examenes de Imagenología</b></h2>
                    </div>

                    <div class="col-md-12">
                        <label>Nombre del Examen de Imagenología</label>
                        <input type="text" name="imagenologia"  class="form-control input-lg"  placeholder="Examen"  maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="' . $valor . '" > 
                    </div>
                    <input  type="hidden" name="id_usuario"  value="' . $_SESSION['ID'] . '">';

              if (isset($_GET['editar'])) {
                echo '<div class="col-md-12">
                        <input  type="hidden" name="id_examen"  value="' . $id_examen . '">
                        <br>
                        <br>
                        <center><button type="submit" name="actualizar_examen" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  A C T U A L I Z A R  </strong> </h2> </button></center>
                      </div>';
              } else {
                echo '<div class="col-md-12">
                        <br>
                        <br>
                        <center><button type="submit" name="guardar_imagenologia" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h2> <strong>  G U A R D A R  </strong> </h2> </button></center>
                      </div>';
              }
            } else {
              echo '<div class="form-group col-md-12" align="center">
                        <h2>Examenes</b></h2>
                      </div>';
            }
            ?>
                    </div>
                </div>
            </div>
        </form>
        <div class="box">
            <div class="box-body row">
                <div class="col-md-6" align="center">
                    <h2>Laboratorio</h2>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

              $ID = $_SESSION['ID'];

              $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
              $queryListA = mysqli_query($conn3, "SELECT * FROM  examenes_historia where Tipo = 2 and (usuario_id = 0 or usuario_id = '$ID') ");
              $nrowl = mysqli_num_rows($queryListA);
              while ($Row_Examenes = mysqli_fetch_array($queryListA)) {
                $id = $Row_Examenes['id'];
                $Nombre  = $Row_Examenes['Nombre'];

                echo '      
                    <tr>
                    <td> ' . $id . '</td>

                    <td> ' . $Nombre . '</td>
                    <td>
                    <font color="#04CC05"> <a href="AgregarExamenes.php?examen=laboratorio&editar=' . $id . '"> <i class="fa fa-pencil" title="Editar Examen"></i>  </a></font>|
                    <font color="#04CC05"> <a href="AgregarExamenes.php?borrar_examenes=' . $id . '"> <i class="fa fa-trash" title="Borrar Examen"></i>  </a></font
                    </td>
                    </tr>';
              }
              ?>

                        </tbody>

                    </table>
                    <div class="col-md-12">
                        <br>
                        <br>
                        <center><button type="button"
                                onclick="window.location.href='AgregarExamenes.php?examen=laboratorio'"
                                class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h2> <strong> A G R E G A R + </strong> </h2>
                            </button></center>
                    </div>
                </div>

                <div class="col-md-6" align="center">
                    <h2>Imagenología</h2>
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

              $ID = $_SESSION['ID'];

              $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
              $queryListA = mysqli_query($conn3, "SELECT * FROM  examenes_historia where Tipo = 1 and (usuario_id = 0 or usuario_id = '$ID') ");
              $nrowl = mysqli_num_rows($queryListA);
              while ($Row_Examenes = mysqli_fetch_array($queryListA)) {
                $id = $Row_Examenes['id'];
                $Nombre  = $Row_Examenes['Nombre'];

                echo '      
                    <tr>
                    <td> ' . $id . '</td>

                    <td> ' . $Nombre . '</td>
                    <td>
                    <font color="#04CC05"> <a href="AgregarExamenes.php?examen=imagenologia&editar=' . $id . '"> <i class="fa fa-pencil" title="Editar Examen"></i>  </a></font>|
                    <font color="#04CC05"> <a href="AgregarExamenes.php?borrar_examenes=' . $id . '"> <i class="fa fa-trash" title="Borrar Examen"></i>  </a></font
                    </td>
                    </tr>';
              }
              ?>

                        </tbody>

                    </table>
                    <div class="col-md-12">
                        <br>
                        <br>
                        <center><button type="button"
                                onclick="window.location.href='AgregarExamenes.php?examen=imagenologia'"
                                class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h2> <strong> A G R E G A R + </strong> </h2>
                            </button></center>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>