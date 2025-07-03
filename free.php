<?php session_start();
include 'funciones/seguridad.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
$ID = $_SESSION['ID'];
//include("../conexiones/conexionYapo.php");

// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  <?php echo $sistema?>  </title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- para el tema de los acentos con mysql -->

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <!-- para el tema de los acentos con mysql -->


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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





<!-- WhatsHelp.io widget -->
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
<!-- /WhatsHelp.io widget -->







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
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


    
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
         
          <!-- Notifications: style can be found in dropdown.less -->
 
       



          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>

 </li>
          <li  title="Soporte">
            <a href="#" >
              <i class="fa fa-support"></i>
            </a>
          </li>


          <li  title="Perfil">
            <a href="#" > 
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
       
           <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> 
         
              

            <span class="hidden-xs">         <?php echo $_SESSION['username']?>            </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
 
              </li>
              
              <!-- Menu Body -->
              <li class="user-body">
            
                
              </li>
              <!-- Menu Footer-->
              
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header><body>
 

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">





 
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú </font> </div>  </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Escritorio</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-right pull-right"></i>
            </span> 
          </a>
        </li>






        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-right pull-right"></i>
            </span> 
          </a>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Historia clínica</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
       
        </li>
         




      



        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
        



        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        




        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        



       <li class="treeview">
          <a href="#">
            <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>


 <li class="treeview" style="

  display:block; 
  width:100%;
  padding: 3px 0px;
  color:#000;
  background-color:red;
  text-decoration:none;
    
    ">
          <a href="<?php echo $Base;?>anuncio">
            <font color="#fff">  <strong>
            <i class="fa fa-chrome"></i> <span>Directorio médico</span>  </strong></font>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"> <strong>new</strong></small>
            </span>
             
          </a>
        </li>



           <li class="treeview">
          <a href="<?php echo $Base;?>funciones/salir.php">
            <i class="fa fa-close"></i> <span>Salir</span>
            <span class="pull-right-container">
            
            </span>
          </a>
        </li>


<div align="center">
  <br>
<img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="20%" width="60%">
</div>  


 
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
<section class="content">
<div align="center"> 
 


 <div class="col-lg-6 col-xs-12" align="center">
  <img src="img/demo.jpg" width="70%" height="50%">

<h4> 
  <font color="red">
Se a vencido tu plan gratuito</font>, para continuar disfrutando  de todas las opciones de tu software selecciona un plan <a href="planes/<?php echo $_SESSION['username']?>"> <strong>ver planes </strong>  </a> <br> 
Continuaras disfrutando de los beneficios de nuestro directorio médico y pagina web. sin las opciones de agenda, control de citas y consultas virtuales.
<br>
Mas información contactamos www.hellomedical.net 
</h4>


       
      
</div>
 





 <div class="col-lg-6 col-xs-12" align="center">
         <div class="col-lg-12 col-xs-12" align="center">
<h5>  Dentalsoft  </h5>
  <iframe width="60%" height="30%" src="https://www.youtube.com/embed/SXt0PdQ8m_4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
  <div class="col-lg-12 col-xs-12" align="center"> 
    <h5>  HelloMedical.net  </h5>

  <iframe width="60%" height="30%" src="https://www.youtube.com/embed/FtYYIBbstts" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>


















</div> 
 













</section>

<br>
<br> 









 
    <!-- /.content -->
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

<footer class="main-footer">

    <div class="pull-right hidden-xs">
    
   


<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'ar,en,es,fr,pt,ru,zh-TW', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        



   <!--             -->  
    </div>
    <strong>Copyright &copy; 2018 <?php echo $sistema?>.</strong> All rights
    reserved. <strong>Diseñado por <a target="_blank" href="https://sievensoft.com">SievenSoft</a> </strong>

         


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


 