<?php
 
/*
rol = 0 = IPS demo 
rol = 1 = medicos
ros = 2 = Estetico
ros = 3 = inyectologia
ros = 4 = Medico estetico
ros = 5 = Ecografia
ros = 6 = Laboral
ros = 7 = IPS, Estetica, Cirujano plastico


*/
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 
// ****************************************************** ROL 0 ****************************************************** 


/*

 if ($_SESSION['rol'] == 0) 
    {

    
  
    ?>

    <?php   */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] >= 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_testdenver.php">
                <i class="fa fa-user"></i> <span>Test de Denver</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


             <li class="treeview">
              <a href="<?php echo $Base;?>pacientesRecetario.php">
                <i class="fa fa-user"></i> <span>Recetario</span>
                  
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes2.php">
                <i class="fa fa-user"></i> <span>Curvas de Crecimiento</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_cardiologia.php">
                <i class="fa fa-user"></i> <span>Historia Cardiologia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

          <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica Pediatria</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica2.php">
                <i class="fa fa-user"></i> <span>Centro Estético</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>clientesCentroEstetico.php">
                <i class="fa fa-user"></i> <span>Centro Estético V2</span>
                  
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5.php">
                <i class="fa fa-user"></i> <span>Medicina Estética</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesMedicinaEstetica">
                <i class="fa fa-user"></i> <span>Medicina Estética v2</span>
                 
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


<li class="treeview">
              <a href="<?php echo $Base;?>pacientes_accionesAcondicionamiento.php">
                <i class="fa fa-user"></i> <span>Acciones Socieducativas<br>  Acondicionamiento</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
<li class="treeview">
              <a href="<?php echo $Base;?>pacientes_terapiaOcupacional.php">
                <i class="fa fa-user"></i> <span>Terapia Ocupacional</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



<li class="treeview">
              <a href="<?php echo $Base;?>pacientes_psiquiatra.php">
                <i class="fa fa-user"></i> <span>Psicologia v2</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



<li class="treeview">
              <a href="<?php echo $Base;?>pacientes_ControlesPsiquiatria.php">
                <i class="fa fa-user"></i> <span>Psiquiatria</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            
<li class="treeview">
              <a href="<?php echo $Base;?>pacientes_trabajosocial.php">
                <i class="fa fa-user"></i> <span>Trabajo social</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_operador.php">
                <i class="fa fa-user"></i> <span>Entrevista <br>Operador terapeutico</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_plantasMedicinales.php">
                <i class="fa fa-user"></i> <span>Registro de Medicación </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>







           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_ginecologia.php">
                <i class="fa fa-user"></i> <span>Ginecólogia</span>
                  
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_fisioterapia.php">
                <i class="fa fa-user"></i> <span>Fisioterapia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica8_traumatologia.php">
                <i class="fa fa-user"></i> <span>Traumatología</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


          <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica7_laboral.php">
                <i class="fa fa-user"></i> <span>Medicina Ocupacional </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_quirurgico.php">
                <i class="fa fa-user"></i> <span>Informe Quirúrgico </span>
                 
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

 <li class="treeview">
              <a href="<?php echo $Base;?>pacientesEcografias.php">
                <i class="fa fa-user"></i> <span>Ecografias Nuevo </span>
                 
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>





            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_ecografias.php">
                <i class="fa fa-user"></i> <span>Ecografias</span>
                 
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_psicologo">
                <i class="fa fa-user"></i> <span>Historia Psicológica</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


 



            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_PH.php">
                <i class="fa fa-user"></i> <span>Pre Hospitalario</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


 

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica15_podologia.php">
                <i class="fa fa-user"></i> <span>Historia Podologo</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>





 

            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesPosOperatorio.php">
                <i class="fa fa-user"></i> <span>Historia Post Operatorio</span>
                   
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>








 

            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesUrologia.php">
                <i class="fa fa-user"></i> <span>Historia Urologia</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesTerapiaRespiratoria.php">
                <i class="fa fa-user"></i> <span>Terapia Respiratoria</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>









            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_controles.php">
                <i class="fa fa-user"></i> <span>Controles Enfermeria</span>
                  
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             


  



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Laboratorio </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>pacientesLaboratorio"><i class="fa fa-circle-o"></i>Cargar Orden</a></li>
                
                 
                </ul>
            </li>
            



          <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_consentimiento.php">
                <i class="fa fa-user"></i> <span> Consentimientos  </span>
                  
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Presupuestos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_presupuestos"><i class="fa fa-circle-o"></i>Realizar Presupuestos</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_ControlPresupuesto"><i class="fa fa-circle-o"></i>Control de Presupuestos</a></li> 
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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

  <li>
      
         <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="100" width="100">
    </div>  
          


  </li>
 

     
          </ul>


        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }


 


/*

}  */

 











 
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************
// ****************************************************** ROL 1 ******************************************************

/*


            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_psicologo">
                <i class="fa fa-user"></i> <span>Historia Psicológica</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_psiquiatrico">
                <i class="fa fa-user"></i> <span>Historia Psiquiatrica</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




*/




/*


 if ($_SESSION['rol'] == 1 or $_SESSION['rol'] == 4) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 
/*
Estetica
Medicina Estetica
Cirujanos plasticos
Centro anti envejecimiento

*/
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************
// ****************************************************** ROL 2 ******************************************************







/*

if ($_SESSION['rol'] == 2) 
    {

    if ($_SESSION['TIPO'] == 1) 
    {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Estética</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

             <li class="treeview">
              <a href="<?php echo $Base;?>pacientesMedicinaEstetica">
                <i class="fa fa-user"></i> <span>Medicina Estética</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





   <?php  
    }

// *********************************************  if es Usuario Comun este Menu  *********************************************
// *********************************************  if es Usuario Comun este Menu  *********************************************
// *********************************************  if es Usuario Comun este Menu  *********************************************

    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 
            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

   
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica2.php">
                <i class="fa fa-user"></i> <span>Centro Estético</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



            


   
            <li class="treeview">
              <a href="<?php echo $Base;?>clientesCentroEstetico.php">
                <i class="fa fa-user"></i> <span>Centro Estético V2</span>
                  
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5.php">
                <i class="fa fa-user"></i> <span>Medicina Estética</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesMedicinaEstetica">
                <i class="fa fa-user"></i> <span>Medicina Estética v2</span>
                 
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?  
    }
}





 
/*

 

*/


// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 
// ****************************************************** ROL 3 ****************************************************** 






/*

if ($_SESSION['rol'] == 3) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





   <?php  
    }

// *********************************************  if es Usuario Comun este Menu  *********************************************
// *********************************************  if es Usuario Comun este Menu  *********************************************
// *********************************************  if es Usuario Comun este Menu  *********************************************

    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>pacientesVacunar">
                <i class="fa fa-user"></i> <span> Pacientes </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

            <li class="treeview">
              <a href="<?php echo $Base;?>empresa">
                <i class="fa fa-user"></i> <span> Cliente/Empresa </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="<?php echo $Base;?>v_SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
              <li><a href="<?php echo $Base;?>v_SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
              <li><a href="<?php echo $Base;?>v_SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
              <li><a href="<?php echo $Base;?>registrosGastos"><i class="fa fa-circle-o"></i>Registros de gastos</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>v_Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?  
    }
}
 





















/*
Psiquiatra
Psicologos

*/


 
// ****************************************************** ROL 4 ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 
// **************************************************    Psiquiatra  ************************************************* 
// **************************************************    Psicologos  ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 
// ****************************************************** ROL 4 ****************************************************** 






/*
 
 if ($_SESSION['rol'] == 4) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




 
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_psicologo">
                <i class="fa fa-user"></i> <span>Historia Psicológica</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 


            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_psiquiatrico">
                <i class="fa fa-user"></i> <span>Historia Psiquiatrica</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}


























 

// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// *************************************************  E C O G R A F O  ***********************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
// ****************************************************** ROL 5 ******************************************************
 if ($_SESSION['rol'] == 5) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>




           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_ecografias">
                <i class="fa fa-user"></i> <span>Ecografias</span>
                 <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 



// ****************************************************** ROL 8 ****************************************************** 
// ****************************************************** ROL 8 ****************************************************** 
// ****************************************************** ROL 8 ****************************************************** 
// ****************************************************** ROL 8 ****************************************************** 
// ****************************************************** ROL 8 ****************************************************** 
// ****************************************************** ROL 8 ******************************************************

// ****************************************************  LABORAL *****************************************************

// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************
// ****************************************************** ROL 8 ******************************************************

 if ($_SESSION['rol'] == 8) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
            

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes_laboral.php">
                <i class="fa fa-user"></i> <span>Historia clínica General Laboral</span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 




















// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ***************************************** M E D I C I N A  E S T E T I C A*****************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************
// ****************************************************** ROL 7 ******************************************************


 if ($_SESSION['rol'] == 7) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }

 


    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  <?php echo $_SESSION['rol'];?>
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 

            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 
            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   


            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica2.php">
                <i class="fa fa-user"></i> <span>Centro Estético</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5.php">
                <i class="fa fa-user"></i> <span>Cirujano Plástico </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

  
           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica9_quirurgico.php">
                <i class="fa fa-user"></i> <span>Informe Quirúrgico </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
              



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 



















// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// ****************************************************** ROL 6 ****************************************************** 
// *********************************************** G I N E C O L O G I A *********************************************
// *********************************************** G I N E C O L O G I A *********************************************
// *********************************************** G I N E C O L O G I A *********************************************
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  
// ****************************************************** ROL 6 ******************************************************  

 




 if ($_SESSION['rol'] == 6) 
    {
    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>  <?php echo $_SESSION['rol'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    
 


           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia.php">
                <i class="fa fa-user"></i> <span>Ginecólogia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

 
 



           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia_preNatal_1.php">
                <i class="fa fa-user"></i> <span> Pre natal</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia_preNatal.php">
                <i class="fa fa-user"></i> <span>Control Pre natal</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

 
 
 



            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_ecografias.php">
                <i class="fa fa-user"></i> <span>Ecografias</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 





// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************** ROL 9 ******************************************************  
// ****************************************************  Pre hospitalario ******************************************** 
// **************************************************** servicios de hambulancias ************************************ 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 
// ****************************************************** ROL 9 ****************************************************** 

 if ($_SESSION['rol'] == 9) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
            

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_PH.php">
                <i class="fa fa-user"></i> <span>Pre Hospitalaria</span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 































// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 

// ******************************************* Traumatologia ******************************************************
// ******************************************* Fisioterapia ******************************************************
// ******************************************* Reabilitacion ******************************************************
 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 
// ****************************************************** ROL 10 ****************************************************** 



 if ($_SESSION['rol'] == 10) 
    {

    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p> <?php echo $_SESSION['username'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <?  
    }
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************


    if ($_SESSION['TIPO'] == 0) {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">





     
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>

    </font> 


            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>

 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
            

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica8_traumatologia.php">
                <i class="fa fa-user"></i> <span>Traumatologia</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
              </a>
            </li>
           


            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_fisioterapia.php">
                <i class="fa fa-user"></i> <span>Fisioterapia</span>
                <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 
















// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// **********************************************  C A R D I O L O G I A **********************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  
// ****************************************************** ROL 11 ******************************************************  




 if ($_SESSION['rol'] == 11) 
    {

      /*
    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>  <?php echo $_SESSION['rol'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <? 
  }
     */
  
/*    ?>

    <?php    */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************







/*
    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   



               <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica14_cardiologia.php">
                <i class="fa fa-user"></i> <span>Historia Cardiologia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 






 

































 
















// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ************************************************** P O D O L O G O **********************************************
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 
// ****************************************************** ROL 15 ****************************************************** 




 if ($_SESSION['rol'] == 15) 
    {

      /*
    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>  <?php echo $_SESSION['rol'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <? 
  }
     */
  
/*    ?>

    <?php   */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************




    /*


    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   



               <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica15_podologia.php">
                <i class="fa fa-user"></i> <span>Historia Podologo</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}




 



























 

































 
















// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ********************************************** O D O N T O L O G I A **********************************************
// ********************************************** G I N E C O L O G I A **********************************************
// **********************************************  E C O G R A F I A S  **********************************************
// ************************************** C O N T R O L   P R E   N A T A L **********************************************
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 
// ****************************************************** ROL 91  ****************************************************** 





 if ($_SESSION['rol'] == 91) 
    {

      /*
    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>  <?php echo $_SESSION['rol'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <? 
  }
     */
  
/*    ?>

    <?php   */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************






/*
    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   



           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_Odonto.php">
                <i class="fa fa-user"></i> <span>Historia Odontologia</span>
                   
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_odonto_ortodoncia.php">
                <i class="fa fa-user"></i> <span>Ortodoncia </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






 



           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia.php">
                <i class="fa fa-user"></i> <span>Ginecologia  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 




           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia_preNatal_1.php">
                <i class="fa fa-user"></i> <span>Prenatal </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 






           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_ginecologia_preNatal.php">
                <i class="fa fa-user"></i> <span>Control Prenatal  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 




           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_ecografias.php">
                <i class="fa fa-user"></i> <span>Ecografias  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>







           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica13_posoperatorio.php">
                <i class="fa fa-user"></i> <span>Control PostOperatorio  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 






 










































 






 



























 

































 
















// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ********************************************** O  D O N T O L O G I A **********************************************
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 
// ****************************************************** ROL 16 ****************************************************** 





 if ($_SESSION['rol'] == 16) 
    {

      /*
    if ($_SESSION['TIPO'] == 1) {

    $id = $_SESSION['id'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM usuariosSegundarios WHERE id = $id");
                      $nrowl=mysqli_num_rows($queryList);
                      while($row_recordset32=mysqli_fetch_array($queryList))
                      {
                          $m1      = $row_recordset32['m1'];
                          $m2      = $row_recordset32['m2'];
                          $m3      = $row_recordset32['m3'];
                          $m4      = $row_recordset32['m4'];
                          $m5      = $row_recordset32['m5'];
                          $m6      = $row_recordset32['m6'];
                          $m7      = $row_recordset32['m7'];
                          $m8      = $row_recordset32['m8'];
                      }




    ?>
     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">


              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>  <?php echo $_SESSION['rol'];?> </p>
              <a href="<?php echo $Base;?>#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
       
       
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu  
       
               

            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
     
     
    <?php if ($m1 == 1): ?>
      

            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
    <?php endif ?>        
    <?php if ($m2 == 1): ?>        
            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Control de Citas</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             



    <?php endif ?>        
    <?php if ($m3 == 1): ?>    
          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m4 == 1): ?>    



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            

    <?php endif ?>        
    <?php if ($m5 == 1): ?>    


            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            
    <?php endif ?>        
    <?php if ($m6 == 1): ?>    


           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
                <i class="fa fa-video-camera"></i> <span>Video Consulta</span>
                <span class="pull-right-container">
                   <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>

    <?php endif ?>        
    <?php if ($m7 == 1): ?>    

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


    <?php endif ?>    



               <li class="treeview">
              <a href="<?php echo $Base;?>funciones/salir.php">
                <i class="fa fa-close"></i> <span>Salir</span>
                <span class="pull-right-container">
                
                </span>
              </a>
            </li>


    <div align="center">
      <br>
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  



     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>





    <? 
  }
     */
  
/*    ?>

    <?php  */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************




    /*


    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   



           <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_Odonto.php">
                <i class="fa fa-user"></i> <span>Historia Odontologia</span>
                   
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_odonto_ortodoncia.php">
                <i class="fa fa-user"></i> <span>Ortodoncia </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






 



           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_odonto_implantologia.php">
                <i class="fa fa-user"></i> <span>Implantologia </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista </strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>







           <li class="treeview">
              <a  target="_blank" href="https://medicalsoftplus.com/solicitar-demostracion/">
                <i class="fa fa-user"></i> <span>Periodoncia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             




          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}

 































 if ($_SESSION['rol'] == 14) 
    {

      /*
  
     */
  


/*      ?>

    <?php    */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************








/*
    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica14_cardiologia.php">
                <i class="fa fa-user"></i> <span>Historia Cardiologia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



          <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica7_laboral.php">
                <i class="fa fa-user"></i> <span>Medicina Ocupacional </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica9_quirurgico.php">
                <i class="fa fa-user"></i> <span>Informe Quirúrgico </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 



            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_PH.php">
                <i class="fa fa-user"></i> <span>Pre Hospitalario</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



 

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica13_posoperatorio.php">
                <i class="fa fa-user"></i> <span>Historia Post Operatorio</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica20_terapiaRespiratoria.php">
                <i class="fa fa-user"></i> <span>Terapia Respiratoria</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>





















            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes19_controles.php">
                <i class="fa fa-user"></i> <span>Controles Enfermeria</span>
                   
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>












   
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica2_v2.php">
                <i class="fa fa-user"></i> <span>Centro Estético</span>
                   <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5.php">
                <i class="fa fa-user"></i> <span>Medicina Estética</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_v2.php">
                <i class="fa fa-user"></i> <span> Antienvejecimiento  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>













            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_consentimiento.php">
                <i class="fa fa-user"></i> <span> Consentimientos  </span>
                  
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             


  



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Laboratorio </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>pacientesLaboratorio"><i class="fa fa-circle-o"></i>Cargar Orden</a></li>
                
                 
                </ul>
            </li>
            



          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Presupuestos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_presupuestos"><i class="fa fa-circle-o"></i>Realizar Presupuestos</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_ControlPresupuesto"><i class="fa fa-circle-o"></i>Control de Presupuestos</a></li> 
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}






 

















































 if ($_SESSION['rol'] == 99) 
    {

      /*
  
     */
  
/*   ?>

    <?php  */

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************





/*

    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia de certificados</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
      
 








            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_consentimiento.php">
                <i class="fa fa-user"></i> <span> Certificados  </span>
                  
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             
 

          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
      
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            
   



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Cartera </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
          
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Presupuestos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_presupuestos"><i class="fa fa-circle-o"></i>Realizar Presupuestos</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_ControlPresupuesto"><i class="fa fa-circle-o"></i>Control de Presupuestos</a></li> 
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Estudiantes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>
 
                </ul>
            </li>
            

 

 
 


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}









 if ($_SESSION['rol'] == 14) 
    {

      /*
  
     */
  
    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************








/*
    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
   
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica14_cardiologia.php">
                <i class="fa fa-user"></i> <span>Historia Cardiologia</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



          <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica7_laboral.php">
                <i class="fa fa-user"></i> <span>Medicina Ocupacional </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>






           <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica9_quirurgico.php">
                <i class="fa fa-user"></i> <span>Informe Quirúrgico </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>
 



            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica_PH.php">
                <i class="fa fa-user"></i> <span>Pre Hospitalario</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>

                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>



 

            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica13_posoperatorio.php">
                <i class="fa fa-user"></i> <span>Historia Post Operatorio</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica20_terapiaRespiratoria.php">
                <i class="fa fa-user"></i> <span>Terapia Respiratoria</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>





















            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes19_controles.php">
                <i class="fa fa-user"></i> <span>Controles Enfermeria</span>
                   
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>












   
            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica2_v2.php">
                <i class="fa fa-user"></i> <span>Centro Estético</span>
                   <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>




            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5.php">
                <i class="fa fa-user"></i> <span>Medicina Estética</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


            <li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica5_v2.php">
                <i class="fa fa-user"></i> <span> Antienvejecimiento  </span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>













            <li class="treeview">
              <a href="<?php echo $Base;?>pacientes_consentimiento.php">
                <i class="fa fa-user"></i> <span> Consentimientos  </span>
                  
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             


  



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Laboratorio </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>pacientesLaboratorio"><i class="fa fa-circle-o"></i>Cargar Orden</a></li>
                
                 
                </ul>
            </li>
            



          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_Controlfacturas"><i class="fa fa-circle-o"></i>Control de Facturas</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Presupuestos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_presupuestos"><i class="fa fa-circle-o"></i>Realizar Presupuestos</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_ControlPresupuesto"><i class="fa fa-circle-o"></i>Control de Presupuestos</a></li> 
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Pacientes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>

                <li><a href="<?php echo $Base;?>#"><i class="fa fa-circle-o"></i>RIPS</a></li> 

                 
                </ul>
            </li>
            



           <li class="treeview">
              <a href="<?php echo $Base;?>clienteAdministracion_VideoChat">
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
    <img src="https://sievensoft.com/alte/alte2.png" title="ALTE" height="200px" width="200px">
    </div>  


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>




    <?php  
    }
}






 

















































 if ($_SESSION['rol'] == 15) 
    {

      /*
  
     */
  
/*    ?>

    <?php

    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************
    // *********************************************  if es Usuario Comun este Menu  *********************************************



/*

    if ($_SESSION['TIPO'] == 0) 
    {
    ?>

     <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"> <div align="center">  <font color="#fff" size="2"> Menú   <?php echo $_SESSION['TIPO'];?>
     
            <?php if ($_SESSION['sucursal'] <> '')            
              {
                echo '<br><font color="#fff" size="3"> <strong>'.$_SESSION['sucursal'].'-'.sucursal($_SESSION['sucursal']).'</strong></font>';
              }
            ?>
    </font> 
            </div>  </li>
            
            <li class="treeview">
              <a href="<?php echo $Base;?>portada">
                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>
 
            <li class="treeview">
              <a href="<?php echo $Base;?>config">
                <i class="fa fa-gears"></i> <span>Configuración y perfil</span>
                <span class="pull-right-container">
                 <i class="fa fa-angle-right pull-right"></i>
                </span> 
              </a>
            </li>



            <li class="treeview">
              <a href="<?php echo $Base;?>patientes">
                <i class="fa fa-user"></i> <span>Historia clínica General General</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
            </li>


<li class="treeview">
              <a href="<?php echo $Base;?>historiaClinica7_laboral.php">
                <i class="fa fa-user"></i> <span>Medicina Ocupacional</span>
                  <span class="pull-right-container">
                  <small class="label pull-right bg-green"> <strong>Vista</strong></small>
                </span>
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
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>agregarCitas"><i class="fa fa-circle-o"></i>Registrar Citas</a></li>
                <li><a href="<?php echo $Base;?>controlCitas"><i class="fa fa-circle-o"></i>Gestionar Citas</a></li>
                <li><a href="<?php echo $Base;?>calendarioagenda"><i class="fa fa-circle-o"></i>Ver calendario</a></li>
                 
                </ul>
            </li>
             
 

          



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Facturas </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_facturas"><i class="fa fa-circle-o"></i>Realizar Facturas</a></li>
      
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            
   



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Cartera </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
          
                <li><a href="<?php echo $Base;?>SclienteAdministracion_cuentasAcobrar"><i class="fa fa-circle-o"></i>Cuentas a cobrar</a></li>
                
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Presupuestos </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>SclienteAdministracion_presupuestos"><i class="fa fa-circle-o"></i>Realizar Presupuestos</a></li>
                <li><a href="<?php echo $Base;?>SclienteAdministracion_ControlPresupuesto"><i class="fa fa-circle-o"></i>Control de Presupuestos</a></li> 
                
                 
                </ul>
            </li>
            



            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i> <span>Inventarios</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>inventario"><i class="fa fa-circle-o"></i>Registro productos</a></li>
                <li><a href="<?php echo $Base;?>tipoinventarios"><i class="fa fa-circle-o"></i>Registro departamentos</a></li>
                <li><a href="<?php echo $Base;?>listaInventario"><i class="fa fa-circle-o"></i>Lista de productos</a></li>
                <li><a href="<?php echo $Base;?>salidadeinventario"><i class="fa fa-circle-o"></i>Salida de inventario </a></li>
                <li><a href="<?php echo $Base;?>entradadeinventario"><i class="fa fa-circle-o"></i>Entrada de inventario </a></li> 
                 
                </ul>
            </li>
            




            <li class="treeview">
              <a href="#">
                <i class="fa fa-print"></i> <span>Reportes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo $Base;?>Reportespacientes"><i class="fa fa-circle-o"></i>Estudiantes</a></li> 
                <li><a href="<?php echo $Base;?>Reportescitas"><i class="fa fa-circle-o"></i>Citas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesfacturacion"><i class="fa fa-circle-o"></i>Facturas</a></li> 
                <li><a href="<?php echo $Base;?>Reportesinventario"><i class="fa fa-circle-o"></i>Inventarios</a></li>
 
                </ul>
            </li>
            

 

 
 


     
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>
*/


/*
    <?php    ?>
    } 
}  





 


