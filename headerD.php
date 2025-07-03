<!-- ----------------------- -->
<!-- NO EDITAR ESTE ARCHIVO  -->
<!-- VER headerAdds.php      -->
<!-- ----------------------- -->
<?php session_start();?> 


<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sistema ?></title>
    <link rel="icon" type="image/vnd.microsoft.icon" href="https://medicalsoftplus.com/iconoms.ico">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <!-- datatables y botones -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <!-- AutoFill -->
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.5.3/css/autoFill.bootstrap4.min.css">
    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.bootstrap4.min.css">
    <!-- responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <!-- datatables y botones - fin -->

    <!-- Iconify-->
    <script src="js/iconify.min.js"></script>

    <script src="plugins/SweetAlert2K/Sweetalert2.11.1.5.js"></script>
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="plugins/morris/morris.css">

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="plugins/FontAwesomeK Free 6.0/css/all.css">
  <script src="js/kit.fontawesome.js" crossorigin="anonymous"></script>

  <!-- CodeMirror -->
  <link rel="stylesheet" href="plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php 
       // $animation = rand(0,1)
        ?>

        <!--
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="<?= ($animation == 1 ? 'animation__shake' : 'animation__wobble')?>" src="img/logoSolo.png" alt="Logo" style="width:6rem; height:auto;">
        </div>
        -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" id="topNav">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" onclick="closeNav()"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item" id="itemDinamico"></li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Pantalla Completa">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button" title="Personalizar">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>


                <li class="nav-item" title="Sucursales">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#ModalSucursales">
                        <i class="fa fa-university"></i>
                    </a>
                </li>
                <?php
                $posibilidades = array('idCliente', 'idcliente', 'clienteId', 'clienteid', 'cliente_id', 'cliente_Id');
                $clienteExtraido = 0;
                for ($i = 0; $i < count($posibilidades); $i++) {
                    if (isset($_GET[$posibilidades[$i]])) {
                        if (is_numeric($_GET[$posibilidades[$i]])) {
                            $clienteExtraido = $_GET[$posibilidades[$i]];
                        } else {
                            $clienteExtraido = base64_decode($_GET[$posibilidades[$i]]);
                        }
                    }
                }
                if (!empty($clienteExtraido) && $clienteExtraido > 0) :
                ?>
                    <li class="nav-item" title="Estado de Ingreso">
                        <a class="nav-link" href="#" onclick="$('#my-modal-Estado-Ingreso').modal('show');">
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                <?php endif; ?>


                <li class="nav-item" title="Soporte" id="MenuSuperiorSoporte_MenuMedical">
                    <a class="nav-link" href="soporte">
                        <i class="fa-solid fa-life-ring"></i>
                    </a>
                </li>

                <li class="nav-item" title="Perfil" id="MenuSuperiorPerfil_MenuMedical">
                    <a class="nav-link" href="config">
                        <i class="fa fa-gears"></i>
                    </a>
                </li>

                <li class="nav-item" title="Salir">
                    <a class="nav-link btn btn-danger btn-sm text-white" href="funciones/salir.php">
                        <i class="fa fa-close"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
        

        <?php include 'headerAdds.php'; ?>
        <?php 
            include "modalHeaderClientes.php";
            include "li_HeaderClientes.php";
        ?>

