<?php
//PARA VALIDAR 
if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
  $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
} else {
  $queryCliente = "";
}
?>

<link href="plugins/IcomonK/style.css" rel="stylesheet" type="text/css" media="all">
<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- <img id="sideBgImg" src="asidebg.png" style="height: 100%;"> -->

  <!-- Brand Logo -->
  <a href="portada" class="brand-link bg-light" id="logoNav">
    <!--
    <img src="isologoDental.png" alt="Logo" class="brand-image img-circle" style="opacity: .8">
-->

    <img src="isologoDental.png" alt="Logo" class="brand-image img-circle">
    <span class="brand-text font-weight-blue"> <strong> Dentalsoft +</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar" id="sideBg" style="background-color: rgba(255,255,255,.95);">
    <div class="moving-bg"></div>

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <?php
      $usuarioId = $_SESSION['ID'];
      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
      $queryList = mysqli_query($conn3, "SELECT * FROM  config where   ID_Usuario=$usuarioId");
      $nrowl = mysqli_num_rows($queryList);
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $logoF = $rowMotorizado['logoF'];
      }

      if (strlen($logoF) > 1) {
        $logo = '<img src="' . $Base . '/logos/' . $logoF . '" height="50%" width="50%" class="user-image" alt="User Image">';
      } else {
        $logo = '<img src="img/logoSolo.png" class="user-image" alt="User Image">';
      }

      $QueryUsuarios = mysqli_query($conn3, "SELECT * FROM  usuarios where   ID = $usuarioId");
      while ($RowUsuarios = mysqli_fetch_array($QueryUsuarios)) {
        $MENU_NOMBRE_USUARIO = $RowUsuarios['NOMBRE_USUARIO'];
        $permisos = $RowUsuarios['permisos'];
      }
      ($permisos <> '' && $permisos <> NULL) ? $permisos = explode('|/|', $permisos) : $permisos = '';
      ?>
      <div class="image">
        <?php echo $logo; ?>
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?php echo $MENU_NOMBRE_USUARIO; ?>
          <br>
        </a>
      </div>
    </div>

    <!-- busqueda -->
    <div class="form-inline">
      <div class="input-group botonSearch" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li style="padding: 10px;text-align: center;">
          <?php
          // var_dump(($permisos == ''));
          
          $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');
          $tituloMenu = funcionMaster($grupo, 'id', 'nombre', 'grupos');
          //aqui solo aparecera para cuando se elija una opcion de la lista de pos en el index del sistema         
          ?>
          <span id="tituloMenu" class="brand-text font-weight-light"><strong><?= $tituloMenu ?></strong></span>
        </li>
        <?php
        // query
        $QueryMenu = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id = '$grupo'");
        while ($RowMenu = mysqli_fetch_array($QueryMenu)) {

          $Arreglo_Grupos = json_decode($RowMenu['Arreglo_Grupos']);

          foreach ($Arreglo_Grupos as $key => $value) {
              
            if ((is_array($permisos)? in_array($value, $permisos) : ($permisos == ''))){
               
              $ArregloMenuFinal = [];
              $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
              while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
                $ArregloMenu = json_decode($RowSubMenu['Arreglo'], true);
              }

              foreach ($ArregloMenu as $key1 => $value1) {
                $Activo = funcionMaster($value1["id"], "id", "estado", "main_menu");
                if ($value1["Activo"] == "1" and $Activo == "1") {

                  $idPrincipal = funcionMaster($value1["id"], "id", "idPrincipal", "main_menu");
                  //echo $idPrincipal." @@ <br>"; 

                  $Arreglo["id"] = $value1["id"];
                  $Arreglo["Nombre"] = $value1["Nombre"];
                  $Arreglo["Icono"] = $value1["Icono"];
                  $Arreglo["Color"] = $value1["Color"];
                  $Arreglo["Ruta"] = funcionMaster($value1["id"], "id", "pantalla", "main_menu");

                  if ($idPrincipal == 0) {


                    $ArregloMenuFinal[$value1["id"]]["Principal"] = $Arreglo;
                  } else {
                    $ArregloMenuFinal[$idPrincipal][] = $Arreglo;
                  }
                }
              }

              foreach ($ArregloMenuFinal as $key => $value) {
                # code...
                $numeroCampos = count($value);

                //echo $numeroCampos;
                if ($numeroCampos == 1) {

                  $Ruta = $value["Principal"]["Ruta"];
                  $Icono = $value["Principal"]["Icono"];
                  $Nombre = $value["Principal"]["Nombre"];
                  $Color = $value["Principal"]["Color"];


                  if ($_SESSION["vencido"] == 1) {
                    if (!in_array($Ruta, $listaModulosPermitidos) && !in_array($Nombre, $listaModulosPermitidos)) {
                      $Color = "#cccccc"; // gris
                    }
                  }

                  $id = $value["Principal"]["id"];

                  if ($Ruta != "#") { ?>
                    <li class="nav-item">
                      <a class="nav-link " <?= (substr($Ruta, 0, 4) == "http" || substr($Ruta, 0, 3) == "www" ? 'target="_blank"' : '') ?> href='<?= (substr($Ruta, 0, 4) == "http" || substr($Ruta, 0, 3) == "www" ? '' : $Base) ?><?= $Ruta ?>' style='color:black; background: <?= $Color ?>47;' onMouseOver="this.style.color='white';this.style.background='<?= $Color ?>'" onMouseOut="this.style.color='black' ;this.style.background='<?= $Color ?>47'">
                        <i style='height:1rem; width:auto; margin-right:8px;' class='nav-icon <?= $Icono ?> fa-2x'></i>
                        <p><?= $Nombre ?></p>
                      </a>
                    </li>
                  <?php  } else { ?>
                    <li class="nav-item">
                      <a class="nav-link " href='#' style='color:black; background: <?= $Color ?>47;' onMouseOver="this.style.color='white';this.style.background='<?= $Color ?>'" onMouseOut="this.style.color='black' ;this.style.background='<?= $Color ?>47'">
                        <i style='height:1rem; width:auto; margin-right:8px;' class='nav-icon <?= $Icono ?> fa-2x'></i>
                        <p><?= $Nombre ?></p>
                      </a>
                    <?php
                  }
                } else {


                  $Ruta = $value["Principal"]["Ruta"];
                  $Icono = $value["Principal"]["Icono"];
                  $Nombre = $value["Principal"]["Nombre"];
                  $Color = $value["Principal"]["Color"];

                  if ($_SESSION["vencido"] == 1) {
                    if (!in_array($Ruta, $listaModulosPermitidos) && !in_array($Nombre, $listaModulosPermitidos)) {
                      $Color = "#cccccc"; // gris
                    }
                  }


                    ?>
                    <li class="nav-item">
                      <a class="nav-link " href='#' style='color:black; background: <?= $Color ?>47;' onMouseOver="this.style.color='white';this.style.background='<?= $Color ?>'" onMouseOut="this.style.color='black' ;this.style.background='<?= $Color ?>47'">
                        <i style='height:1rem; width:auto; margin-right:8px;' class='nav-icon <?= $Icono ?> fa-2x'></i>
                        <p>
                          <?= $Nombre ?>
                          <i class='fas fa-angle-left right'></i>
                        </p>
                      </a>
                      <?php
                      unset($value["Principal"]);

                      ?>
                      <ul class='nav nav-treeview'>
                        <?php

                        foreach ($value as $subkey => $subvalue) {
                          $SubRuta = $subvalue["Ruta"];
                          $SubIcono = $subvalue["Icono"];
                          $SubNombre = $subvalue["Nombre"];
                          $SubColor = $subvalue["Color"];

                          if ($_SESSION["vencido"] == 1) {
                            if (!in_array($Ruta, $listaModulosPermitidos) && !in_array($Nombre, $listaModulosPermitidos)) {
                              $SubColor = "#cccccc"; // gris
                            }
                          }

                        ?>

                          <li class="nav-item">
                            <a class="nav-link " href='<?= $Base ?><?= $SubRuta ?>' style='color:black; background: <?= $SubColor ?>47;  padding: 12px 5px 12px 15px;' onMouseOver="this.style.background='<?= $SubColor ?>'" onMouseOut="this.style.color='black' ;this.style.background='<?= $SubColor ?>47'">
                              <i style='height:1rem; width:auto; margin-right:8px;' class='nav-icon <?= $SubIcono ?> fa-2x'></i>
                              <p><?= $SubNombre ?></p>
                            </a>
                          </li>
              <?php
                        }
                        echo "
                                 </ul>
                                </li>";
                      }
                    }
                  }
                }
              }
              ?>


                      </ul>
    </nav>
    <!-- /.sidebar-menu -->

<?php if (isset($_SESSION['tipoLic']))
{
?>

<?php if ($_SESSION['tipoLic']== 4)
{
?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6426827197761135"
     crossorigin="anonymous"></script>
<!-- dental menu -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6426827197761135"
     data-ad-slot="1995270269"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

<?php } ?>
<?php } ?>
  </div>

  <!-- /.sidebar -->
</aside>
<style>
  .nav-sidebar .nav-link>.right,
  .nav-sidebar .nav-link>p>.right {
    right: 0.7rem;
  }
</style>
<style>
  .fondoDinamico {
    background-color: #ecf0f5;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<!-- empieza contenido -->
<div class="fondoDinamico">




