<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           
          <!-- Notifications: style can be found in dropdown.less -->
           
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            
           
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
       
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        
         
         
       
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
            <form action="" method="">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                          1. <ins>Recuperación</ins>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label">Tipo de Recuperación</label>
                              <select class="form-control">
                                <option>Buena</option>
                                <option>Regular</option>
                                <option>Mala</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Paro Cardiáco</label>
                              <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Vómitos</label>
                              <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Laringoespasmo</label>
                              <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label">Intubado</label>
                              <select class="form-control">
                                <option>Traqueal</option>
                                <option>Mayo</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Aspiración</label>
                              <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Oliguría</label>
                              <select class="form-control">
                                <option>Si</option>
                                <option>No</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel box box-secundary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          I. <ins>Score de Aldrete</ins>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="box-body">
                        <table class="table table-bordered" >
                          <tr>
                            <th style="width: 40px">Punt.</th>
                            <th style="width: 100px">Criterios</th>
                            <th style="width: 30px">Ingreso</th>
                            <th style="width: 30px">15Min</th>
                            <th style="width: 30px">30Min</th>
                            <th style="width: 30px">45Min</th>
                            <th style="width: 30px">1H</th>
                            <th style="width: 30px">1H 15 Min</th>
                            <th style="width: 30px">1H 30 Min</th>
                            <th style="width: 30px">1H 45 Min</th>
                            <th style="width: 30px">2H</th>
                            <th style="width: 30px">Egreso</th>
                          </tr>

                          <tr>
                            <td colspan="12" class="text-center"><b> ACTIVIDAD </b></td>
                          </tr>

                          <tr>
                            <td>2</td>
                            <td>Mueve las cuatro extremidades de forma voluntaria o cuando se le ordena </td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>1</td>
                            <td>Mueve solo dos extremidades de forma voluntaria o cuando se le ordena  </td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>0</td>
                            <td>Incapaz de mover las cuatro extremidades de forma voluntaria o cuando se le ordena</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td colspan="12" class="text-center"><b> RESPIRACIÓN </b></td>
                          </tr>

                          <tr>
                            <td>2</td>
                            <td>Capaz de respirar profundamente, toser o llorar.</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>1</td>
                            <td>Respiración limitada o disneico. </td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>0</td>
                            <td>Apnea</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td colspan="12" class="text-center"><b> CIRCULACIÓN </b></td>
                          </tr>

                          <tr>
                            <td>2</td>
                            <td>Tensión arterial ±20% del valor preanestésico</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>1</td>
                            <td>Tensión arterial ±21 a 49% del valor preanestésico</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>

                          <tr>
                            <td>0</td>
                            <td>Tensión arterial ±50% del valor preanestésico.</td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                            <td><input type="radio" name="r3" class="flat-green"></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
            <!-- /.box -->
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>

<script>
  $(function () {

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-green').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-red'
    })
  });

</script>
</body>
</html>
