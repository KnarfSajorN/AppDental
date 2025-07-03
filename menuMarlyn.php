<body  onload="startTime()">
<!-- estilos para el menu nuevo de la izquierda -->
<link href="css/menu1.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="plugins/IcomonK/style.css" rel="stylesheet" type="text/css" media="all">

    


<div id="clockdate">
  <div class="clockdate-wrapper">
    <div id="clock"></div>
    <div id="date"></div>
  </div>
</div>

<style>
  .txt_rsp {
    font-size: 2vw !important;
  }

  @media screen and (max-width: 766px) {
    .txt_rsp {
      font-size: 4vw !important;
    }
  }

  .Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
  }

  .select2-selection--multiple.select2-selection--multiple.select2-selection--multiple {
    min-height: 45px !important;
    padding: 5px !important;
  }

  .select2-container .select2-selection--single {
    height: 45px !important;
    padding: 15px !important;
  }
</style>


<!-- final // estilos para el menu nuevo de la izquierda -->

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section id="sidebar" class="sidebar sidebar-nav_izquierdo">

    <ul class="sidebar-menu list-unstyled components mb-5">

      <li style="padding: 10px;text-align: center;">
        <label class="">Menú <?php echo $_SESSION['TIPO']; ?></label>
      </li>

      <li>
        <a href="<?php echo $Base; ?>portada"><span class="icon-desktop-pulse-24-filled"></span><label>Escritorio</label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>config"><span class="icon-cogs"></span><label>Configuración y perfil</label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>CrearPaciente.php"><span class="fa-solid fa-person"></span><label>Registro Paciente</label></a>
      </li>





      <li>
        <a href="<?php echo $Base; ?>clienteNotaEnfermeria.php"><span class="icon-clinical-fe"></span><label>Notas Enfermeria</label></a>
      </li>
      <li>
        <a href="<?php echo $Base; ?>Pacientes.php"><span class="icon-clinical-fe"></span><label>Historia Clinica</label></a>
      </li>
      <li>
        <a href="<?php echo $Base; ?>PacientesEmergenciaHospitalizacion.php"><span class="icon-clinical-fe"></span><label>Historia Emergencia <br> Hospitalizacion</label></a>
      </li>

      <!--
      <li>
        <a href="<?php echo $Base; ?>PacientesGraficasCrecimiento_OMS.php"><span class="icon-clinical-fe"></span><label>Graficas de Crecimiento</label></a>
      </li>
      -->


      <li>
        <a href="<?php echo $Base; ?>VCS_Pacientes.php"><i class="fas fa-syringe"></i><label>Modulo Vacunación</label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>pacientes_fisioterapia.php"><span class="icon-clinical-fe"></span><label>Historia Fisioterapia</label></a>
      </li>

    <li>
        <a href="<?php echo $Base; ?>pacientesOdontograma.php"><span class="icon-clinical-fe"></span><label>Odontograma Inicial</label></a>
      </li>

      <!--<li>
          <a href="<?php echo $Base; ?>pacientesOdontograma.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Odontograma Inicial</span></a>
            </li>-->


      <li>
        <a href="<?php echo $Base; ?>pacientesObstetrica.php"><i class="icon-clinical-fe"></i> <label>Historia Gineco-Obstetrica</label></a>
      </li>

      <!--  <li>
          <a href="<?php echo $Base; ?>pacientes_fisioterapia.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Fisioterapia</span></a>
        </li>-->

      <!--<li>
          <a href="<?php echo $Base; ?>Pacientes_General.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Historia Clinica</span></a>
        </li>

        <li>
          <a href="<?php echo $Base; ?>Clientes_procedimientos.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Formulario procedimientos</span></a>
        </li>

        <li>
          <a href="<?php echo $Base; ?>Clientes_Hospitalizacion.php"><i class="iconify" data-icon="ion:person"></i> <span class="">Formulario Hospitalizacion</span></a>
        </li>-->

      <!-- <li>
          <a href="<?php echo $Base; ?>patientes"><i class="iconify" data-icon="ion:id-card"></i> <span class="">Historia Clinica V1</span></a>
        </li> -->

      <li>
        <a href="<?php echo $Base; ?>pacientes_psiquiatra.php"><i class="icon-clinical-fe"></i> <label>Psicologia</label></a>
      </li>



      <li>
        <a href="<?php echo $Base; ?>pacientes_ControlesPsiquiatria.php"><i class="icon-clinical-fe"></i> <label>Psiquiatria</label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>pacientesMedicinaEstetica"><i class="icon-clinical-fe"></i> <label>Medicina Estética </label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>clientesCentroEstetico.php"><i class="icon-clinical-fe"></i> <label>Centro Estético </label></a>
      </li>


      <li>
        <a href="<?php echo $Base; ?>pacientes_quirurgico.php"><i class="icon-clinical-fe"></i> <label>Informe Quirúrgico </label></a>
      </li>
      <li>
        <a href="<?php echo $Base; ?>Rips_Entidades.php"><span class="icon-business"></span><label>Entidades</label></a>
      </li>



      <?php
      include 'configMenu.php';
      include 'PP_Menu.php';
      include 'GC_Menu.php';
      ?>



      <li>
        <a><span class="icon-laboratory"></span><label>Laboratorio</label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>LB_PacientesOrdenes.php?Tipo=GenerarOrden"><span class="icon-formula-svgrepo-com"></span><label> Generar Orden </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>LB_PacientesOrdenes.php?Tipo=CargarOrden"><span class="icon-flasks-chemistry-svgrepo-com"></span><label> Cargar Resultados </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>LB_PacientesOrdenes.php?Tipo=OrdenCargada"><span class="icon-blood-test-svgrepo-com"></span><label> Resultados Cargados </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>LB_CrearCategorias.php"><span class="icon-experimentation-flask-tool-svgrepo-com"></span><label> Cargar Examenes </label></a>
          </li>

          <li>
            <a href="<?php echo $Base; ?>LB_CrearPaquetes.php"><span class="icon-experimentation-flask-tool-svgrepo-com"></span><label> Crear Paquetes </label></a>
          </li>

        </ul>
      </li>

      <li>
        <a><span class="icon-medicine-bottle-fill"></span><label> Recetario </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>RM_PacientesRecetas.php"><span class="icon-formula-svgrepo-com"></span><label> Agregar Receta </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>RM_Medicamentos.php"><span class="icon-medical-drugs-svgrepo-com"></span><label> Agregar Medicamentos </label></a>
          </li>
          <!--
          <li>
            <a href="<?php echo $Base; ?>formulas.php"><span class="icon-medical-result-svgrepo-com"></span><label> Gestionar Formulas </label></a>
          </li>
          -->
        </ul>
      </li>

      <li>
        <a><span class="icon-people-team-toolbox-20-filled"></span><label> Control de Citas </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>agregarCitas"><span class="icon-i-schedule-school-date-time"></span><label> Registrar Citas </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>controlCitas"><span class="icon-book-open-page-variant-outline"></span><label> Gestionar Citas </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>CL_Calendario.php"><span class="icon-calendar-alt-fill"></span><label> Ver Calendario </label></a>
          </li>
        </ul>
      </li>

  
      <li>
        <a><span class="icon-people-team-toolbox-20-filled"></span><label> Oportunidad de Citas </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>gruposAtencion.php"><span class="icon-people-circle-sharp"></span><label> Grupos de Atencion </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>vista1.php"><span class="icon-calendar-alt-fill"></span><label> Agenda General </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>portada2.php"><span class="icon-calendar-user"></span><label> Citas por Cliente </label></a>
          </li>
        </ul>
      </li>
      

      <li>
        <a><span class="icon-file-invoice"></span><label> Presupuestos </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>SclienteAdministracion_presupuestos"><span class="icon-file-invoice"></span><label> Realizar Presupuesto </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>SclienteAdministracion_ControlPresupuesto"><span class="icon-building-retail-money-24-filled"></span><label> Control de Presupuestos </label></a>
          </li>
        </ul>
      </li>

      <!--
      <li>
        <a><i class="iconify" data-icon="fa-solid:file-invoice"></i> <span>Presupuestos V.2</span></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>Pacientes_Presupuestos.php"><i class="iconify" data-icon="fluent:receipt-money-20-filled"></i><span>Realizar Presupuestos</span></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>Pacientes_Control_Presupuesto.php"><i class="iconify" data-icon="fluent:building-retail-money-24-filled"></i><span>Control de Presupuestos</span></a>
          </li>
        </ul>
      </li>
      -->




      <li>
        <a><span class="icon-file-invoice-dollar"></span><label> Facturas </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>SclienteAdministracion_facturas"><span class="icon-file-invoice-dollar"></span><label> Realizar Factura </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>SclienteAdministracion_Controlfacturas"><span class="icon-building-retail-money-24-filled"></span><label> Control de Facturas </label></a>
          </li>


          <li>
            <a href="<?php echo $Base; ?>SclienteAdministracion_cuentasAcobrar"><span class="icon-building-retail-money-24-filled"></span><label> Cuentas a Cobrar </label>></a>
          </li>
        </ul>
      </li>





      <li>
        <a><span class="icon-twotone-inventory-2" style="display: inline-flex;"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><label> Inventarios </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>inventario"><span class="icon-product-downloadable"></span><label> Registro de Productos </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>tipoinventarios"><span class="icon-business"></span><label> Registro de Departamentos </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>listaInventario"><span class="icon-chemistry-svgrepo-com"></span><label> Lista de Productos </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>salidadeinventario"><span class="icon-twotone-inventory-2" style="display: inline-flex;"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span><label> Salida de Inventarios </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>entradadeinventario"><span class="icon-box-remove"></span><label> Entrada de Inventarios </label></a>
          </li>
        </ul>
      </li>

      <!--
      <li>
        <a><i class="iconify" data-icon="ic:twotone-inventory-2"></i> <span>Inventario V.2</span></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>IP_Productos.php"><i class="iconify" data-icon="gridicons:product-downloadable"></i><span>Registro productos</span></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>IP_Paquetes.php"><i class="iconify" data-icon="ion:business"></i><span>Registro de Paquetes</span></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>IP_Tipo_Productos.php"><i class="iconify" data-icon="fluent:clipboard-task-list-ltr-20-filled"></i><span>Tipo de Productos</span></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>IP_Lista_Productos.php"><i class="iconify" data-icon="icomoon-free:box-remove"></i><span>Lista de Productos</span></a>
          </li>
        </ul>
      </li>
      -->

      <li>
        <a><span class="icon-book-open-page-variant-outline"></span><label> Reportes </label></a>
        <ul class="nav-flyout">
          <li>
            <a href="<?php echo $Base; ?>Reportespacientes"><span class="icon-patient-24-filled"></span><label> Pacientes </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>Reportescitas"><span class="icon-calendar-alt"></span><label> Citas </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>Reportesfacturacion"><span class="icon-receipt-money-20-filled"></span><label> Facturas </label></a>
          </li>
          <li>
            <a href="<?php echo $Base; ?>Reportesinventario"><span class="icon-box-open"></span><label> Inventarios </label></a>
          </li>
          <!--<li>
            <a href="<?php echo $Base; ?>Rips.php"><span class="icon-book-open"></span><label> Rips </label></a>
          </li>-->
        </ul>
      </li>

      <li>
        <a href="<?php echo $Base; ?>clienteAdministracion_VideoChat"><span class="icon-bxs-video-recording"></span><label> Video Consulta </label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>anuncio"><span class="icon-book-half"></span><label> Directorio Medico </label></a>
      </li>

      <li>
        <a href="<?php echo $Base; ?>funciones/salir.php"><span class="icon-exit-outline"></span><label> Salir </label></a>
      </li>

    </ul>

  </section>
</aside>
</body>
<script>
        function startTime() {
      var today = new Date();
      var hr = today.getHours();
      var min = today.getMinutes();
      var sec = today.getSeconds();
      ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
      hr = (hr == 0) ? 12 : hr;
      hr = (hr > 12) ? hr - 12 : hr;
      // Se agrega un cero delante de <10
      hr = checkTime(hr);
      min = checkTime(min);
      sec = checkTime(sec);
      document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

      var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
      var days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', ];
      var curWeekDay = days[day.getDay()];
      var curDay = today.getDate();
      var curMonth = months[today.getMoth()];
      var curYear = today.getFullYear();
      var date = curWeekDay +", "+curDay+" "+curMonth+" " +curYear;
      document.getElementById("date").innerHTML = date;

      var time = setTimeout(function() {
          startTime()
        },
        500);
    }

function checkTime(i) {

if (i < 10){

  i= "0" + i;
}
return i;

}



</script>