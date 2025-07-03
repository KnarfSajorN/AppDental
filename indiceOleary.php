<?php
include 'header.php';
include 'menu.php';

// echo "<pre>" . var_dump($_POST) . "</pre>";
$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'indiceOleary'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla <= 0) {
  $sql = "CREATE TABLE indiceOleary (
      id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      usuario_id INT NULL DEFAULT NULL,
      cliente_id INT NULL DEFAULT NULL,
      fecha DATE NULL DEFAULT NULL,
      indiceOleary INT NULL DEFAULT NULL,
      marcadas INT NULL DEFAULT NULL,
      sinMarcar INT NULL DEFAULT NULL,
      noTratables INT NULL DEFAULT NULL,
      jsonOleary TEXT NULL DEFAULT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      estado INT NULL DEFAULT(1)
    );";
  $create = mysqli_query($conn3, $sql);
}
if ($_POST) {
  $prepare =  preparePost($_POST, ['guardar', 'idOleary', 'actualizar']);
  if (isset($_POST['guardar'])) {
    $sql = mysqli_query($conn3, "INSERT INTO `indiceOleary` SET {$prepare}");
  } else if (isset($_POST['actualizar'])) {
    $sql = mysqli_query($conn3, "UPDATE `indiceOleary` SET {$prepare} WHERE id = '{$_POST['idOleary']}'");
  }
  if ($sql) {
    echo "<script>window.location.href='indiceOleary.php?clienteId={$_POST['cliente_id']}'</script>";
  } else {
    echo "<script>prompt(`Error, COPIAR y entregar a soporte. Muchas gracias.:`, `" . base64_encode(mysqli_error($conn3)) . "`);</script>";
  }
  exit();
}
$cliente_id = $_GET['clienteId'];
if (isset($_GET['remove'])) {
  $sql = mysqli_query($conn3, "UPDATE `indiceOleary` SET estado = 0 WHERE id = '{$_GET['remove']}'");
  if ($sql) {
    echo "<script>window.location.href='indiceOleary.php?clienteId={$cliente_id}'</script>";
  } else {
    echo "<script>prompt(`Error, COPIAR y entregar a soporte. Muchas gracias.:`, `" . base64_encode(mysqli_error($conn3)) . "`);</script>";
  }
  exit();
}
if (preg_match('/^[0-9]+$/', $cliente_id)) {
  $queryCliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '$cliente_id'");
  $nrow = mysqli_num_rows($queryCliente);
  if ($nrow > 0) {
    while ($row = mysqli_fetch_array($queryCliente)) {
      foreach ($row as $key => $val) {
        $cliente[$key] = $val;
      }
    }
    if (isset($_GET['edit'])) {
      $consultas = mysqli_query($conn3, "SELECT count(*) AS consultas FROM indiceOleary WHERE cliente_id = '{$cliente_id}' AND id <= '{$_GET['edit']}' AND estado = 1")->fetch_assoc();
      $queryOleary = mysqli_query($conn3, "SELECT * FROM indiceOleary WHERE cliente_id = '{$cliente_id}' AND id = '{$_GET['edit']}' AND estado = 1");
      $nrow = mysqli_num_rows($queryOleary);
      while ($row = mysqli_fetch_array($queryOleary)) {
        foreach ($row as $key => $val) {
          $oleary[$key] = $val;
        }
      }
    } else {
      $consultas = mysqli_query($conn3, "SELECT count(*) AS consultas FROM indiceOleary WHERE cliente_id = '{$cliente_id}' AND estado = 1")->fetch_assoc();
    }
  }
}
?>
<style type="text/css">
  .box-titleOleary {
    height: 55px;
    max-height: 100%;
    font-size: 20px;
    font-weight: bold;
  }

  .box-titleOleary.flex {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .box-number {
    width: 70px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
    font-size: 1.2em;
    font-weight: bold;
    background-color: #fff;
    /* border: 1px solid #000; */
  }

  .box-indice {
    width: 70px;
    height: 70px;
    position: relative;
    overflow: hidden;
    border: 1px solid #000;
  }

  .box-indice .box-part {
    width: 70px;
    height: 70px;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
    overflow: hidden;
    cursor: pointer;
    border-right: 1px solid #000;
  }

  .box-indice .box-part.red {
    background-color: #e21837 !important;
  }

  .box-indice .box-part.blue {
    background-color: #104099 !important;
  }

  .box-indice .box-part.purple {
    background: rgb(0, 42, 255);
    background: radial-gradient(circle, rgba(0, 42, 255, 1) 0%, rgba(255, 0, 52, 1) 100%) !important;
  }

  .box-indice.not>.box-part {
    border-right: 2px solid #000099;
  }


  .box-indice .box-part:nth-child(1) {
    transform: translateX(-1%) translateY(-72%) rotate(45deg);
    background-color: #fff;
  }

  .box-indice .box-part:nth-child(2) {
    transform: translateX(70%) translateY(-1%) rotate(135deg);
    background-color: #fff;
  }

  .box-indice .box-part:nth-child(3) {
    transform: translateX(-2%) translateY(69%) rotate(225deg);
    background-color: #fff;
  }

  .box-indice .box-part:nth-child(4) {
    transform: translateX(-73%) translateY(-2%) rotate(-45deg);
    background-color: #fff;
  }

  .content-menu {
    width: 100%;
    min-height: 0px;
    position: relative;
    z-index: 100;
    display: flex;
    flex-flow: column;
  }

  .content-menu .content-config {
    flex: 1;
    min-height: 50px;
    /* height: 20px; */
    /* background-color: #990000; */
    position: relative;
    display: flex;
    flex-flow: row;
    justify-content: space-between;
    align-items: center;
    padding: 2px;
    transition: 1s ease;
  }

  .content-menu .content-config .content-items {
    min-height: 30px;
    /* background-color: #fff; */
    display: flex;
    flex-flow: row;
    align-items: center;
    justify-content: space-around;
    cursor: pointer;
  }

  .content-menu .content-config .content-items:hover {
    background-color: #000;
    opacity: .4;
    font-weight: bold;
    color: #fff;
    border-radius: 10px;
  }

  /* .content-menu .content-config.open {
    width: 150px;
    height: 183px;
  } */

  /* .content-menu .content-config .content-icon {
    width: calc(100%/4);
    width: 100%;
    height: 20px;
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: flex-end;
  } */

  /* 

  .content-menu .content-config .content-icon i {
    cursor: pointer;
  } */

  /* 

  */

  /* .content-menu .content-config .content-items:last-child:hover {
    background-color: transparent !important;
    opacity: 1;
    color: #000;
    z-index: 1000;
  } */

  /* .content-menu .content-config .content-items i {
    width: 20px;
    height: 20px;
    display: flex;
    flex-flow: row;
    align-items: center;
    justify-content: center;
  } */
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="pacientesOleary.php"><i class="fa fa-gears"></i> Lista Pacientes O'leary </a></li>
      <li><a href="#">Indice O'leary</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <section class="content">
        <h4 class="Titulo_Pagina">
          <a href="configPacientes.php?id=40"><i class="fa-solid fa-arrow-up-from-bracket fa-flip-horizontal fa-flip-vertical"></i></a>
          </i> Consulta O'Leary
          <a href="configHistoriaClinica.php?clienteId=<?= $cliente_id ?>&idHistoria=40&tipo=0"><i class="fa-solid fas fa-book-medical fa-flip-horizontal fa-flip-vertical"></i></a>
        </h4>
        <div class="box">
          <div class="box-body">
            <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" id="formOleary">
              <div class="col-xs-12">
                <div class="content-menu">
                  <div class="col-md-12 content-items">
                    <span><button type="button" onclick="($('#jsonOleary') != '' && $('#marcadas') != '' && $('#sinMarcar') != '' && $('#noTratables') != '' && $('#cliente_id') != '' && $('#usuario_id') != '' ? $('#formOleary').submit() : '')" class="btn btn-primary btn-sm btn-block">GUARDAR</button></span>
                  </div>
                  <div class="col-md-12 content-config" id="toggle-menu">
                    <!-- /* <div class="col-md-12 content-icon"><i class="fa fa-cog" aria-hidden="true"></i></div> */ -->
                    <div class="col-md-12 content-items" onclick="pencil = 1">
                      <i class="fa fa-pencil"></i>
                      <span>Lapiz Rojo</span>
                    </div>
                    <div class="col-md-12 content-items" onclick="pencil = 2">
                      <i class="fa fa-pencil"></i>
                      <span>Lapiz Azul</span>
                    </div>
                    <div class="col-md-12 content-items" onclick="pencil = 3">
                      <i class="fa fa-pencil"></i>
                      <span>Lapiz Purple</span>
                    </div>
                    <div class="col-md-12 content-items" onclick="pencil = 4">
                      <i class="fa fa-times"></i>
                      <span>No tratable</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <label for="fecha">Indice de O'Leary</label>
              </div>
              <div class="col-md-12 box-titleOleary">
                <div class="row">
                  <div class="col-md-6 box-titleOleary flex" style="justify-content: flex-start; border: 1px solid #000;">
                    <span><?= ($consultas['consultas'] + (isset($_GET['edit']) ? 0 : 1)) ?>° Consulta <?= (isset($cliente) ? "de {$cliente['nombre_cliente']}" : '') ?></span>
                  </div>
                  <div class="col-md-3 box-titleOleary flex" style="justify-content:space-between; border: 1px solid #000;">
                    <input type="number" name="indiceOleary" id="indiceOleary" class="form-control input-lg" style="width: 250px;" step="any" value="0" readonly>
                    <span>%</span>
                  </div>
                  <div class="col-md-3 box-titleOleary flex" style="border: 1px solid #000;">
                    <input type="date" name="fecha" id="fecha" class="form-control input-lg" value="<?= Date("Y-m-d") ?>">
                  </div>
                  <input type="hidden" name="jsonOleary" id="jsonOleary" value="">
                  <input type="hidden" name="marcadas" id="marcadas" value="">
                  <input type="hidden" name="sinMarcar" id="sinMarcar" value="">
                  <input type="hidden" name="noTratables" id="noTratables" value="">
                  <input type="hidden" name="cliente_id" id="cliente_id" value="<?= $cliente_id ?>">
                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                  <?php if (isset($_GET['edit'])) : ?>
                    <input type="hidden" name="actualizar" id="actualizar" value="true">
                    <input type="hidden" name="idOleary" id="idOleary" value="<?= $oleary['id'] ?>">
                  <?php else : ?>
                    <input type="hidden" name="guardar" id="guardar" value="true">
                  <?php endif; ?>
                </div>
              </div>
            </form>
            <div class="col-md-12" style="width: 100%;">
              <div class="row">
                <hr style="background-color: #000; opacity: .8; height: 1px">
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                  <div class="box-indice" id="8leftSup">
                    <!-- posicion 8 izquierda superior -->
                    <div class="box-part vestibular" onclick="getPart('8 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('8 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('8 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('8 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="7leftSup">
                    <div class="box-part vestibular" onclick="getPart('7 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('7 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('7 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('7 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="6leftSup">
                    <div class="box-part vestibular" onclick="getPart('6 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('6 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('6 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('6 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="5leftSup">
                    <div class="box-part vestibular" onclick="getPart('5 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('5 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('5 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('5 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="4leftSup">
                    <div class="box-part vestibular" onclick="getPart('4 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('4 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('4 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('4 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="3leftSup">
                    <div class="box-part vestibular" onclick="getPart('3 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('3 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('3 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('3 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="2leftSup">
                    <div class="box-part vestibular" onclick="getPart('2 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('2 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('2 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('2 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="1leftSup">
                    <div class="box-part vestibular" onclick="getPart('1 || left || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('1 || left || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('1 || left || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('1 || left || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="1rightSup">
                    <div class="box-part vestibular" onclick="getPart('1 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('1 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('1 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('1 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="2rightSup">
                    <div class="box-part vestibular" onclick="getPart('2 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('2 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('2 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('2 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="3rightSup">
                    <div class="box-part vestibular" onclick="getPart('3 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('3 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('3 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('3 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="4rightSup">
                    <div class="box-part vestibular" onclick="getPart('4 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('4 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('4 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('4 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="5rightSup">
                    <div class="box-part vestibular" onclick="getPart('5 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('5 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('5 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('5 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="6rightSup">
                    <div class="box-part vestibular" onclick="getPart('6 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('6 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('6 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('6 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="7rightSup">
                    <div class="box-part vestibular" onclick="getPart('7 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('7 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('7 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('7 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="8rightSup">
                    <div class="box-part vestibular" onclick="getPart('8 || right || Sup', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('8 || right || Sup', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('8 || right || Sup', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('8 || right || Sup', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                  <div class="box-number">
                    <span>8</span>
                  </div>
                  <div class="box-number">
                    <span>7</span>
                  </div>
                  <div class="box-number">
                    <span>6</span>
                  </div>
                  <div class="box-number">
                    <span>5</span>
                  </div>
                  <div class="box-number">
                    <span>4</span>
                  </div>
                  <div class="box-number">
                    <span>3</span>
                  </div>
                  <div class="box-number">
                    <span>2</span>
                  </div>
                  <div class="box-number">
                    <span>1</span>
                  </div>
                  <div class="box-number">
                    <span>1</span>
                  </div>
                  <div class="box-number">
                    <span>2</span>
                  </div>
                  <div class="box-number">
                    <span>3</span>
                  </div>
                  <div class="box-number">
                    <span>4</span>
                  </div>
                  <div class="box-number">
                    <span>5</span>
                  </div>
                  <div class="box-number">
                    <span>6</span>
                  </div>
                  <div class="box-number">
                    <span>7</span>
                  </div>
                  <div class="box-number">
                    <span>8</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12" style="display: flex; justify-content: center; align-items: center;">
                  <div class="box-indice" id="8leftInf">
                    <!-- posicion 8 izquierda inferior -->
                    <div class="box-part vestibular" onclick="getPart('8 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('8 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('8 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('8 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="7leftInf">
                    <div class="box-part vestibular" onclick="getPart('7 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('7 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('7 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('7 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="6leftInf">
                    <div class="box-part vestibular" onclick="getPart('6 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('6 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('6 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('6 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="5leftInf">
                    <div class="box-part vestibular" onclick="getPart('5 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('5 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('5 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('5 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="4leftInf">
                    <div class="box-part vestibular" onclick="getPart('4 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('4 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('4 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('4 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="3leftInf">
                    <div class="box-part vestibular" onclick="getPart('3 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('3 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('3 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('3 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="2leftInf">
                    <div class="box-part vestibular" onclick="getPart('2 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('2 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('2 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('2 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="1leftInf">
                    <div class="box-part vestibular" onclick="getPart('1 || left || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('1 || left || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('1 || left || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('1 || left || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="1rightInf">
                    <div class="box-part vestibular" onclick="getPart('1 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('1 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('1 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('1 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="2rightInf">
                    <div class="box-part vestibular" onclick="getPart('2 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('2 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('2 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('2 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="3rightInf">
                    <div class="box-part vestibular" onclick="getPart('3 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('3 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('3 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('3 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="4rightInf">
                    <div class="box-part vestibular" onclick="getPart('4 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('4 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('4 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('4 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="5rightInf">
                    <div class="box-part vestibular" onclick="getPart('5 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('5 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('5 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('5 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="6rightInf">
                    <div class="box-part vestibular" onclick="getPart('6 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('6 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('6 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('6 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="7rightInf">
                    <div class="box-part vestibular" onclick="getPart('7 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('7 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('7 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('7 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                  <div class="box-indice" id="8rightInf">
                    <div class="box-part vestibular" onclick="getPart('8 || right || Inf', this, 'vestibular')">
                      <!-- VESTIBULAR -->
                    </div>
                    <div class="box-part distal" onclick="getPart('8 || right || Inf', this, 'distal')">
                      <!-- DISTAL -->
                    </div>
                    <div class="box-part lingual" onclick="getPart('8 || right || Inf', this, 'lingual')">
                      <!-- LINGUAL O PLATINO -->
                    </div>
                    <div class="box-part mesial" onclick="getPart('8 || right || Inf', this, 'mesial')">
                      <!-- MESIAL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <hr style="background-color: #000; opacity: .8; height: 1px">
              </div>
            </div>
            <div class="col-md-12">
              <table class="table table-hover" id="indicesOleary">
                <thead>
                  <tr>
                    <th>Doctor</th>
                    <th>Indice O'leary %</th>
                    <th>Marcadas</th>
                    <th>No Marcadas</th>
                    <th>No Tratables</th>
                    <th>Fecha</th>
                    <th>OP</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
      </section>
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
include 'dataTablePaginacion.php';
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
?>
<script type="text/javascript">
  $(document).ready(function() {
    // COMPORTAMIENTO CLICK ENTRADA SALIDA DESPLEGABLE (ATENCION: USAR EN CASO DE NO QUERAR EL SEGUNDO)
    // $("#toggle-menu").on("click", function() {
    //   $("#toggle-menu").toggleClass("open");
    // });
    // COMPORTAMIENTO HOVER ENTRADA SALIDA DESPLEGABLE (ATENCION: USAR EN CASO DE NO QUERAR EL PRIMERO)
    // $("#toggle-menu").on("mouseleave mouseenter", function() {
    //   $("#toggle-menu").toggleClass("open");
    // });
  });

  window.addEventListener("load", function() {
    let tablaOne = tablaDinamica({
      input: "#indicesOleary", // id del input
      selectFrom: "<?= Encriptar("u.NOMBRE_USUARIO, i.*") ?>", // SELECT la colausa entre estos dos  FROM
      name: "<?= Encriptar("indiceOleary AS i INNER JOIN usuarios AS u ON i.usuario_id = u.ID") ?>", // Nombre de la tabla o en su defecto si se realiza joins y de mas
      camposValue: "<?= Encriptar(json_encode(['NOMBRE_USUARIO', 'indiceOleary', 'marcadas', 'sinMarcar', 'noTratables', 'fecha'])) ?>", // Campos que se mostraran en la tabla ATENCION: en caso de usar inner si presentan porblemas al usar el filtrado por columnas, deberan reflejar cada columna con su sufijo, Ejemplo: c.cliente O en caso de no usar mascara ser directos cliente.cliente_id
      clausula: {
        data: "<?= Encriptar("i.estado = 1 AND i.cliente_id = '{$_GET['clienteId']}'") ?>", // Clausula de la consulta
        value: [''], // Valores de la clausula
      },
      likeWhere: "<?= Encriptar('NOMBRE_USUARIO || indiceOleary || marcadas || sinMarcar || noTratables || fecha') ?>", // campos que se usaran en el buscador (CAMPO LIKE %CAMPO%)
      order: "<?= Encriptar(json_encode(['order by' => '$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
      btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
        btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
          style: false,
          class: "<?= Encriptar("fa fa-edit") ?>",
          id: false,
          href: "<?= Encriptar("indiceOleary.php?clienteId=$0&edit=$1") ?>",
          title: "<?= Encriptar("Agregar Consulta") ?>",
          event: "<?= Encriptar("") ?>",
          target: false, // blank_
          dataPlacement: false,
          dataToggle: false,
          dataOriginalTitle: false,
          value: "<?= Encriptar("cliente_id || id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
        })),
        btn2: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
          style: false,
          class: "<?= Encriptar("fa fa-trash text-danger") ?>",
          id: false,
          href: "<?= Encriptar("indiceOleary.php?clienteId=$0&remove=$1") ?>",
          title: "<?= Encriptar("Remover Consulta") ?>",
          event: "<?= Encriptar("") ?>",
          target: false, // blank_
          dataPlacement: false,
          dataToggle: false,
          dataOriginalTitle: false,
          value: "<?= Encriptar("cliente_id || id") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
        }))
      })),
      carapter: "true", // ACTIVAR O DESACTUVAR UTF8_DECODE
      tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
    });

    <?php if (isset($_GET['edit'])) : ?>
      loadPart();
      // console.log("dataPartPrueba");
    <?php endif; ?>
  });

  function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    const n = !isFinite(+number) ? 0 : +number
    const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    let s = ''
    const toFixedFix = function(n, prec) {
      if (('' + n).indexOf('e') === -1) {
        return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
      } else {
        const arr = ('' + n).split('e')
        let sig = ''
        if (+arr[1] + prec > 0) {
          sig = '+'
        }
        return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
      }
    }
    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || ''
      s[1] += new Array(prec - s[1].length + 1).join('0')
    }
    return s.join(dec)
  }

  var array1 = ["Sup", 'Inf'];
  var array2 = ["left", 'right'];
  var part = {};
  var record = 0;
  do {
    let index2 = 0;
    part[array1[record]] = {};
    while (index2 < array2.length) {
      part[array1[record]][array2[index2]] = {};
      let index = 0;
      while (index < 8) {
        part[array1[record]][array2[index2]][index] = {};
        part[array1[record]][array2[index2]][index]['vestibular'] = 0;
        part[array1[record]][array2[index2]][index]['distal'] = 0;
        part[array1[record]][array2[index2]][index]['lingual'] = 0;
        part[array1[record]][array2[index2]][index]['mesial'] = 0;
        index++;
      }
      index2++;
    }
    record++;
  } while (record <= 1);
  let pencil = 1;
  const getPart = (indice, el, parte) => {
    const color = {
      4: 'remove',
      1: 'red',
      2: 'blue',
      3: 'purple'
    };
    var pencilCache = pencil;
    indice = indice.split(" || ");
    if (part[indice[2]][indice[1]][(indice[0] - 1)]['vestibular'] != 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['distal'] != 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['lingual'] != 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['mesial'] != 4) {
      if ($(el).hasClass("red")) {
        $(el).removeClass("red");
        if (color[pencilCache] != 'red') {
          $(el).addClass(color[pencilCache]);
        } else {
          pencilCache = 0;
        }
      } else if ($(el).hasClass("blue")) {
        $(el).removeClass("blue");
        if (color[pencilCache] != 'blue') {
          $(el).addClass(color[pencilCache]);
        } else {
          pencilCache = 0;
        }
      } else if ($(el).hasClass("purple")) {
        $(el).removeClass("purple");
        if (color[pencilCache] != 'purple') {
          $(el).addClass(color[pencilCache]);
        } else {
          pencilCache = 0;
        }
      } else {
        $(el).addClass(color[pencilCache]);
      }
      part[indice[2]][indice[1]][(indice[0] - 1)][parte] = pencilCache;
    }

    if (pencilCache == 4) {
      if (part[indice[2]][indice[1]][(indice[0] - 1)]['vestibular'] == 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['distal'] == 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['lingual'] == 4 && part[indice[2]][indice[1]][(indice[0] - 1)]['mesial'] == 4) {
        $("#" + indice[0] + indice[1] + indice[2]).removeClass("not");
        pencilCache = 0;
      } else {
        $("#" + indice[0] + indice[1] + indice[2]).addClass("not");
        $("#" + indice[0] + indice[1] + indice[2] + ' .vestibular').removeClass("red blue purple");
        $("#" + indice[0] + indice[1] + indice[2] + ' .distal').removeClass("red blue purple");
        $("#" + indice[0] + indice[1] + indice[2] + ' .lingual').removeClass("red blue purple");
        $("#" + indice[0] + indice[1] + indice[2] + ' .mesial').removeClass("red blue purple");
      }
      part[indice[2]][indice[1]][(indice[0] - 1)]['vestibular'] = pencilCache;
      part[indice[2]][indice[1]][(indice[0] - 1)]['distal'] = pencilCache;
      part[indice[2]][indice[1]][(indice[0] - 1)]['lingual'] = pencilCache;
      part[indice[2]][indice[1]][(indice[0] - 1)]['mesial'] = pencilCache;
    }
    console.log(part[indice[2]][indice[1]][(indice[0] - 1)]);
    indiceOleary();
    console.log(JSON.stringify(part));
    $("#jsonOleary").val(JSON.stringify(part));
  }
  const indiceOleary = () => {
    var arrayCount = {
      'red': 0,
      'blue': 0,
      'purple': 0,
      'noTratable': 0,
      'piezas': 0
    };
    for (const partes in part) {
      for (const lados in part[partes]) {
        for (const dientes in part[partes][lados]) {
          if (part[partes][lados][dientes]['vestibular'] == 0 && part[partes][lados][dientes]['distal'] == 0 && part[partes][lados][dientes]['lingual'] == 0 && part[partes][lados][dientes]['mesial'] == 0) {
            arrayCount['piezas'] = (arrayCount['piezas'] + 4);
          } else if (part[partes][lados][dientes]['vestibular'] == 4 && part[partes][lados][dientes]['distal'] == 4 && part[partes][lados][dientes]['lingual'] == 4 && part[partes][lados][dientes]['mesial'] == 4) {
            arrayCount['noTratable'] = (arrayCount['noTratable'] + 4);
          } else {
            var prueba = [
              "vestibular",
              "distal",
              "lingual",
              "mesial",
            ];
            console.log(part[partes][lados][dientes]);
            let index = 0;
            while (index < 4) {
              console.log(part[partes][lados][dientes][prueba[index]]);
              if (part[partes][lados][dientes][prueba[index]] == 1) {
                arrayCount['red'] = (arrayCount['red'] + 1);
              } else if (part[partes][lados][dientes][prueba[index]] == 2) {
                arrayCount['blue'] = (arrayCount['blue'] + 1);
              } else if (part[partes][lados][dientes][prueba[index]] == 3) {
                arrayCount['purple'] = (arrayCount['purple'] + 1);
              } else if (part[partes][lados][dientes][prueba[index]] == 4) {
                arrayCount['noTratable'] = (arrayCount['noTratable'] + 1);
              } else if (part[partes][lados][dientes][prueba[index]] == 0) {
                arrayCount['piezas'] = (arrayCount['piezas'] + 1);
              }
              index++
            }
          }
        }
      }
    }
    // formula indide oleary = superficies teñidas x 100 entre las piezas existentes
    let totalPiezas = (arrayCount['red'] + arrayCount['blue'] + arrayCount['purple'] + arrayCount['piezas']);
    let indiceOleary = (((arrayCount['red'] + arrayCount['blue'] + arrayCount['purple']) / totalPiezas) * 100);
    $("#marcadas").val((arrayCount['red'] + arrayCount['blue'] + arrayCount['purple']));
    $("#sinMarcar").val(arrayCount['piezas']);
    $("#noTratables").val(arrayCount['noTratable']);
    $("#indiceOleary").val(number_format(indiceOleary, 2, '.', ','));
  };
  const loadPart = () => {
    var dataPart = <?= (isset($oleary['jsonOleary']) ? $oleary['jsonOleary'] : '0') ?>;
    for (const partes in dataPart) {
      for (const lados in dataPart[partes]) {
        for (const dientes in dataPart[partes][lados]) {
          if (dataPart[partes][lados][dientes]['vestibular'] == 4 && dataPart[partes][lados][dientes]['distal'] == 4 && dataPart[partes][lados][dientes]['lingual'] == 4 && dataPart[partes][lados][dientes]['mesial'] == 4) {
            pencil = 4;
            console.log("#" + (parseInt(dientes) + 1) + lados + partes + " .vestibular");
            $("#" + (parseInt(dientes) + 1) + lados + partes + " .vestibular").click();
          } else {
            var prueba = [
              "vestibular",
              "distal",
              "lingual",
              "mesial",
            ];
            let index = 0;
            while (index < 4) {
              if (dataPart[partes][lados][dientes][prueba[index]] == 1) {
                pencil = 1;
                console.log("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]);
                $("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]).click();
              } else if (dataPart[partes][lados][dientes][prueba[index]] == 2) {
                pencil = 2;
                console.log("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]);
                $("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]).click();
              } else if (dataPart[partes][lados][dientes][prueba[index]] == 3) {
                pencil = 3;
                console.log("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]);
                $("#" + (parseInt(dientes) + 1) + lados + partes + " ." + [prueba[index]]).click();
              }
              index++
            }
          }
        }
      }
    }
    pencil = 1;
  }
</script>