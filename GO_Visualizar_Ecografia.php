<?php 
  include 'header.php';
  include 'menu.php';
?>
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content <p><?php  $diagnostico ?></p><br>
                    <p><?php  $nombreeco ?></p><br>-->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Visualizar 
            <small>Ecografias</small>
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
                <?php
                    
                    $historiaClinicaEcografia = $_GET['ecografia'];

                    $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_ecografias where ID = $historiaClinicaEcografia");
                    
                    $nrowl=mysqli_num_rows($queryList);
                    while($rowMotorizado=mysqli_fetch_array($queryList))
                    {

                      $cliente_id      =$rowMotorizado['cliente_id'];
                      $usuario_id      =$rowMotorizado['usuario_id'];
                      $Fecha           =$rowMotorizado['Fecha'];

                      $Hora            =$rowMotorizado['Hora'];
                      $eco             =$rowMotorizado['ecografiaDetalle'];
                      $diagnostico     =$rowMotorizado['diagnostico'];
                      $nombreeco       =$rowMotorizado['nombreEcografia'];
                      $nombreecotilde       =$rowMotorizado['nombreEcografiaTilde'];
                    }

                    if($nombreecotilde!=""){
                      $NombreEcografia = $nombreecotilde;
                    }else{
                      $NombreEcografia = $nombreeco;
                    }
    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
                
            } 


                  ?>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">

                    <div class="col-md-12">

                      <h2 align="center">Historia Clínica de <?php echo $NombreEcografia ?></h2>

                      <br>

                      <table class="table table-bordered">
                        <tr>
                          <td>Fecha: <?php echo $Fecha ?></td>
                          <td>Hora: <?php echo $Hora ?></td>
                        </tr>
                      </table>

                      <table class="table table-bordered">
                        <tr>
                          <td>Paciente: <?php echo $nombre_cliente ?></td>
                          <td>DNI: <?php echo $CODI_CLIENTE ?></td>
                          <td>Fecha de Nacimiento: <?php echo $fechaNacimiento ?></td>
                          <td>Edad: <?php echo  calculaedad($fechaNacimiento)  ?></td>
                        </tr>
                      </table>

                      <?php echo $eco ?>

                      <?php  $img=mysqli_query($conn3,"SELECT * FROM archivos where  cliente_id = '$cliente_id' and historia_id='$historiaClinicaEcografia' and Realizado_Desde = 'historiaClinica_ecografias' and Campo_Input='ImagenesHistoriaEcografias'");  
                        $contador=0;
                        while ($ReImg=mysqli_fetch_assoc($img)) { 
                          $contador++;
                          if($contador==1){
                            echo "<h3>Imágenes Ciclos de Embarazo</h3>";
                          }
                          ?>
                            
                <div class="col-md-3" >
                  <img style="border: 1px solid #3c8dbc;border-radius: 5px; padding-left: 10px;padding-right: 11px;box-shadow: 0px 0px 15px -1px rgb(60, 141, 188);"  width="150" height="130" src="archivos/<?php echo $ReImg['codigo']; ?>" alt="" >
                </div>
           



              <?php }  ?>

                      <table class="table table-bordered">
                        <tr>
                          <th colspan="4">Diagnóstico General</th>
                        </tr>
                        <tr><td><?php echo $diagnostico ?></td></tr>
                      </table>


    
   <?php  $img=mysqli_query($conn3,"SELECT * FROM archivos where  cliente_id = '$cliente_id' and historia_id='$historiaClinicaEcografia' and Realizado_Desde = 'historiaClinica_ecografias' and Campo_Input IS NULL");  
  $contador=0;
                        while ($ReImg=mysqli_fetch_assoc($img)) { 
                          $contador++;
                          if($contador==1){
                            echo "<h3>Archivos</h3>";
                          }
                          ?>
                            
                <div class="col-md-3" >
                  <img style="border: 1px solid #3c8dbc;border-radius: 5px; padding-left: 10px;padding-right: 11px;box-shadow: 0px 0px 15px -1px rgb(60, 141, 188);"  width="150" height="130" src="archivos/<?php echo $ReImg['codigo']; ?>" alt="" >
                </div>
           



              <?php }  ?>

                  





                          <table class="table table-bordered">
                       


                        <tr><td>
 <?php if( $nombreeco =='Ecografia Obstetrica' or $nombreeco =='Ecografia Morfologica' or $nombreeco =='Ecografia Genetica' )
{
 echo
'IMPORTANTE: La precision diagnostica del examen ecografico es de 85%; y depende de factores , como: tiempo de gestacion posicion fetal, obesidad materna, cantidad de liquido anmiotico, tipo de anomalia existente, etc. POR TANTO: Recuerde que la ecografia, por si sola, NO EXCLUYE, que su bebe nazca sin alteraciones o sin retardo mental';
}
else
  {  echo ''; 
}
?>


</td></tr>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    
      <!-- /.content-wrapper -->
    
      

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

