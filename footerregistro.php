<!-- ----------------------- -->
<!-- NO EDITAR ESTE ARCHIVO  -->
<!-- VER footerAdds.php      -->
<!-- ----------------------- -->

<!-- termina contenido -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
 
    <script>
        function visualizarTema(tema){
            // hay que ubicar el header side y logo
            $('[id="topNav"]').attr('class', 'main-header navbar navbar-expand navbar-light bg-'+tema);
            $('.botonSearch').attr('class', 'input-group botonSearch p-1 br-1 rounded bg-'+tema);
            $('[id="logoNav"]').attr('class', 'brand-link bg-'+tema);
            $('[id="temaNav"]').attr('class', 'custom-select mb-3 bg-'+tema);
        }
    </script>
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<?php 
//////////////////////////////? IMPORTANTEEEEEEEEEEE  no quitar  se usa para la historia de audiologia los campos de graficas//////////////////////////////
if($Campo_Javascript_Historia_Audiologia!=true){?>
<script src="plugins/jquery/jquery.min.js"></script>
<?php
//////////////////////////////? IMPORTANTEEEEEEEEEEE  no quitar  se usa para la historia de audiologia los campos de graficas//////////////////////////////
}?>

<?php
        // Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a portada los redirija a POS y ademas se usara para quitar los botones superiores de soporte y configuracion y perfil
        $grupo = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');

        $QueyrGrupoMenu = mysqli_query($conn3, "SELECT * FROM  grupos  where id = $grupo ");
        while ($RowGrupoMenu = mysqli_fetch_array($QueyrGrupoMenu)) {
            $PortadaPOS = $RowGrupoMenu['PortadaPOS'];
        }
        if($PortadaPOS==1){
            echo "<script> 
            var soporteMenuItem = document.getElementById('MenuSuperiorSoporte_MenuMedical');
            var perfilMenuItem = document.getElementById('MenuSuperiorPerfil_MenuMedical');
          
            // Verifica si los elementos existen antes de aplicar el estilo
            if (soporteMenuItem) {
              soporteMenuItem.style.display = 'none';
            }
          
            if (perfilMenuItem) {
              perfilMenuItem.style.display = 'none';
            }
            </script>";
        }
        // [FIN] Este codigo funciona para cuando en el grupos_menu se pone 1 en PortadaPOS es para que cada vez que ingresen a portada los redirija a POS y ademas se usara para quitar los botones superiores de soporte y configuracion y perfil


        ?>
        

<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!-- datatables y botones -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<!-- AutoFill -->
<script src="https://cdn.datatables.net/autofill/2.5.3/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.5.3/js/autoFill.bootstrap4.min.js"></script>
<!-- Buttons -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<!-- responsive -->
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<!-- datatables y botones - fin -->

<!-- select2 -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
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

<!--Sparklines-->
<script src="assets/js/vendors/charts/charts-sparklines.js"></script>
<script src="assets/js/scripts-init/charts/charts-sparklines.js"></script>


<!--Sparklines-->
<script src="assets/js/vendors/charts/charts-sparklines.js"></script>
<script src="assets/js/scripts-init/charts/charts-sparklines.js"></script>

<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>





<!-- aquí va el código adicional -->
<?php include "footerAdds.php" ?>
</body>

</html>