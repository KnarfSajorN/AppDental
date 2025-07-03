<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
$hoyEs = date('Y-m-d');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      Reportes de Rips
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Reportes de Rips </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box">



      <br>

      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-md-12 row">
            <div class="col-md-2">
              Fecha Inicial
              <input type="date" class="form-control input-lg" id="desde" required onchange="preparar();">
            </div>
            <div class="col-md-2">
             Fecha Final
              <input type="date" class="form-control input-lg" id="hasta" required onchange="preparar();">
            </div>


            <div class="form-group col-md-2">
              <div align="left">Profesional </div>
              <select id="doctor" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
               
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 and ID_principal = '{$_SESSION['ID_principal']}' ");
                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                  $ID = $row_recordset32A['ID'];
                  $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                  echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                }
                ?>
              </select>
            </div>

       









<div class="form-group col-md-2">
    <div align="left"> Administradora </div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" onchange="BuscarConvenio()" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 and ID_principal = '{$_SESSION['ID_principal']}' ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $codigo= $RowEntidad['codigo'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>


    <div class="form-group col-md-2">
              <div align="left">Convenio </div>
          
                <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();"> 
                  </select>
  
               
              <!--   <option value="">Seleccione</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
              </select> -->
            </div>





            <div class="form-group col-md-2">
              <div align="left"> Nacionalidad </div>
              <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
              <select id="paciente" class="form-control input-lg select2" style="width: 100%;" required="" onchange="preparar();">
                <option value="" selected="selected">Seleccione</option>
                <option value="1">Colombianos</option>
                <option value="0">Extranjeros</option>
              </select>

            </div>


           


            <div class="col-md-4">
              Fecha Remisión
              <input type="date" class="form-control input-lg" name="fechaRemision" id="fechaRemision" value= "<?php echo $hoyEs?>" required onchange="preparar();">
            </div>

              <div class="col-md-4">
             Número Factura (Una factura para todo el reporte)
              <input type="text" class="form-control input-lg" name="factura" id="factura"  onchange="preparar();">
            </div>

              <div class="col-md-4">
             Número Contrato (Opcional)
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



            <div class="col-xs-12">
              <p id="success" class="text text-primary" style="display:none;">Listo para Generar!</p>
            </div>

          </div>
        </div>
      </div>



      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Usuarios en TXT</strong><br><br>
            <form action="Rips_US_txt.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>
<div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora<</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>



              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>

                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"  onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>




              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>




      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Usuarios en XML</strong><br><br>
            <form action="Rips_US_Xml.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2"  style="display:none;">
                  <div align="left"> Entidad Administradora<</div>
                            <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Particular</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group col-md-2" style="display:none;" >
                  <div align="left"> Convenio </div>
                            <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Todos</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>

                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"  onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>




              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>    
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Usuarios en JSON</strong><br><br>
            <form action="Rips_US_JSON.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2"  style="display:none;">
                  <div align="left"> Entidad Administradora<</div>
                            <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Particular</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group col-md-2" style="display:none;" >
                  <div align="left"> Convenio </div>
                            <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Todos</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>

                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"  onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>




              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>   

      <div class="col-md-12"> <br><br><hr><br><br> </div>




      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Consulta AC en TXT</strong><br><br>
            <form action="Rips_AC_txt.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura" onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>


     




      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Consulta AC en XML</strong><br><br>
            <form action="Rips_AC_Xml.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
              <div align="left"> Entidad Administradora</div>
                        <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
            
                  <option value="" selected="selected">Seleccione</option>
                  <option value="0">Particular</option>
                  <?php
                  $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
                  while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                      $id = $RowEntidad['id'];
                      $Nombre = $RowEntidad['Nombre'];
                      echo "<option value='$id'>$Nombre</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2" style="display:none;" >
                  <div align="left"> Convenio </div>
                            <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Todos</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura" onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Consulta AC en JSON</strong><br><br>
            <form action="Rips_AC_JSON.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
              <div align="left"> Entidad Administradora</div>
                        <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
            
                  <option value="" selected="selected">Seleccione</option>
                  <option value="0">Particular</option>
                  <?php
                  $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
                  while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                      $id = $RowEntidad['id'];
                      $Nombre = $RowEntidad['Nombre'];
                      echo "<option value='$id'>$Nombre</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-2" style="display:none;" >
                  <div align="left"> Convenio </div>
                            <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required >
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Todos</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura" onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>



      <div class="col-md-12"> <br><br><hr><br><br> </div>





      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Transacciones AF en TXT</strong><br><br>
            <form action="Rips_AF_txt.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12" style="display:block;">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>




      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Transacciones AF en XML</strong><br><br>
            <form action="Rips_AF_Xml.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>


              

             <div class="form-group col-md-2"  style="display:none;">
              <div align="left"> Entidad Administradora</div>
                <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
            
                    <option value="" selected="selected">Seleccione</option>
                    <option value="0">Particular</option>
                    <?php
                    $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
                    while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                        $id = $RowEntidad['id'];
                        $Nombre = $RowEntidad['Nombre'];
                        echo "<option value='$id'>$Nombre</option>";
                    }
                    ?>
                </select>
              </div>
              <div class="form-group col-md-2" style="display:none;" >
                  <div align="left"> Convenio </div>
                            <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
                
                      <option value="" selected="selected">Seleccione</option>
                      <option value="0">Todos</option>
                      <?php
                      $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
                      while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
                          $id = $RowEntidad['id'];
                          $Nombre = $RowEntidad['Nombre'];
                          echo "<option value='$id'>$Nombre</option>";
                      }
                      ?>
                  </select>
              </div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12" style="display:block;">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Transacciones AF en JSON</strong><br><br>
            <form action="Rips_AF_JSON.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Desde
                <input type="date" class="form-control input-lg" name="desde" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <div class="col-xs-2" style="display:none;">
                Hasta
                <input type="date" class="form-control input-lg" name="hasta" required>
              </div>


              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>
              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>


                </select>

              </div>

              <div class="col-xs-4" style="display:none;">
                Fecha Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
              </div>


                <div class="col-xs-4" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-4" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>



              <div class="col-xs-12" style="display:block;">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>


      
      <div class="col-md-12"> <br><br><hr><br><br> </div>





      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Control CT en TXT</strong><br><br>
            <form action="Rips_CT_txt.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Fecha de Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <!-- <div class="col-xs-2" style="display:none;">
            Hasta
            <input type="date" class="form-control input-lg" name="hasta" required>
          </div> -->

              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>
                </select>

              </div>


                <div class="col-xs-6" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-6" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>

              <!-- <div class="col-xs-2" style="display:none;">
          Fecha Remisión
          <input type="date" class="form-control input-lg" name="fechaRemision" required>
        </div> -->


              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>





      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Control CT en XML</strong><br><br>
            <form action="Rips_CT_Xml.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Fecha de Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <!-- <div class="col-xs-2" style="display:none;">
            Hasta
            <input type="date" class="form-control input-lg" name="hasta" required>
          </div> -->

              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>
                </select>

              </div>


                <div class="col-xs-6" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-6" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>

              <!-- <div class="col-xs-2" style="display:none;">
          Fecha Remisión
          <input type="date" class="form-control input-lg" name="fechaRemision" required>
        </div> -->


              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col-xs-12">
            <strong>Reporte Rips Control CT en JSON</strong><br><br>
            <form action="Rips_CT_JSON.php" method="POST">
              <div class="col-xs-2" style="display:none;">
                Fecha de Remisión
                <input type="date" class="form-control input-lg" name="fechaRemision" required>
                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
              </div>
              <!-- <div class="col-xs-2" style="display:none;">
            Hasta
            <input type="date" class="form-control input-lg" name="hasta" required>
          </div> -->

              <div class="form-group col-md-2" style="display:none;">
                <div align="left">Seleccione Usuario </div>
                <select id="doctor" name="doctor" class="form-control  select2 input-lg" style="width: 100%;" required>
                  <option value="" selected="selected">Seleccione</option>
                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where activo =1 ");
                  while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                    $ID = $row_recordset32A['ID'];
                    $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                    echo "<option value='$ID'> $NOMBRE_USUARIO </option>";
                  }
                  ?>
                </select>
              </div>

             <div class="form-group col-md-2"  style="display:none;">
    <div align="left"> Entidad Administradora</div>
              <select id="tipoUsuario" name="tipoUsuario" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Particular</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Entidades WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group col-md-2" style="display:none;" >
    <div align="left"> Convenio </div>
              <select id="convenio" name="convenio" class="form-control  select2 input-lg" style="width: 100%;" required onchange="preparar();">
  
        <option value="" selected="selected">Seleccione</option>
        <option value="0">Todos</option>
        <?php
        $queryEntidad = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio WHERe Activo = 1 ");
        while ($RowEntidad = mysqli_fetch_array($queryEntidad)) {
            $id = $RowEntidad['id'];
            $Nombre = $RowEntidad['Nombre'];
            echo "<option value='$id'>$Nombre</option>";
        }
        ?>
    </select>
</div>

              <div class="form-group col-md-2" style="display:none;">
                <div align="left"> Nacionalidad </div>
                <!-- <input type="text" class="form-control input-lg" name="tipo" placeholder="Tipo" required> -->
                <select name="paciente" class="form-control input-lg select2" style="width: 100%;" required="">
                  <option value="" selected="selected">Seleccione</option>
                  <option value="1">Colombianos</option>
                  <option value="0">Extranjeros</option>
                </select>

              </div>


                <div class="col-xs-6" style="display:none;">
             Número Factura
              <input type="text" class="form-control input-lg" name="factura" id="factura"   onchange="preparar();">
            </div>

              <div class="col-xs-6" style="display:none;">
             Número Contrato
              <input type="text" class="form-control input-lg" name="contrato" id="contrato"  onchange="preparar();">
            </div>

              <!-- <div class="col-xs-2" style="display:none;">
          Fecha Remisión
          <input type="date" class="form-control input-lg" name="fechaRemision" required>
        </div> -->


              <div class="col-xs-12">
                <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                    <h4> <strong> Generar </strong> </h4>
                  </button></center>
              </div>
            </form>
          </div>
        </div>
      </div>


        










      <div align="center">
        <h6>
          <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
        </h6>
      </div>



      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<script>
  function preparar() {
    var desde = document.getElementById("desde").value;
    var hasta = document.getElementById("hasta").value;
    var doctor = document.getElementById("doctor").value;
    var tipoUsuario = document.getElementById("tipoUsuario").value;
    var fechaRemision = document.getElementById("fechaRemision").value;
    var paciente = document.getElementById("paciente").value;
    var contrato = document.getElementById("contrato").value;
    var factura = document.getElementById("factura").value;
    var convenio = document.getElementById("convenio").value;

    // si todos los campos estan llenos
    if (desde != "" && hasta != "" && doctor != "" && tipoUsuario != "" && fechaRemision != "") {
      // mostramos success
      document.getElementById("success").style.display = "block";
    } else {
      // ocultamos success
      document.getElementById("success").style.display = "none";
    }

    // a todos los input con name desde colocar el valor de desde
    document.getElementsByName("desde").forEach(function(element) {
      element.value = desde;
    });
    // a todos los input con name hasta colocar el valor de hasta
    document.getElementsByName("hasta").forEach(function(element) {
      element.value = hasta;
    });
    // a todos los input con name doctor colocar el valor de doctor
    document.getElementsByName("doctor").forEach(function(element) {
      element.value = doctor;
    });
    // a todos los input con name tipoUsuario colocar el valor de tipoUsuario
    document.getElementsByName("tipoUsuario").forEach(function(element) {
      element.value = tipoUsuario;
    });
    document.getElementsByName("entidadSalud").forEach(function(element) {
      element.value = 0;
    });

    // a todos los input con name fechaRemision colocar el valor de fechaRemision
    document.getElementsByName("fechaRemision").forEach(function(element) {
      element.value = fechaRemision;
    });
    // a todos los input con name paciente colocar el valor de paciente
    document.getElementsByName("paciente").forEach(function(element) {
      element.value = paciente;
    });

     // a todos los input con name facture colocar el valor de 
    document.getElementsByName("factura").forEach(function(element) {
      element.value = factura;
    });

     // a todos los input con name contrato colocar el valor de 
    document.getElementsByName("contrato").forEach(function(element) {
      element.value = contrato;
    });

     // a todos los input con name convenio colocar el valor de 
    document.getElementsByName("convenio").forEach(function(element) {
      element.value = convenio;
    });

    // al primer document.getElementsByName("desde")[0] colocar el valor de desde
    //document.getElementsByName("desde")[0].value = fechaRemision;
  }
</script>

<script>
    function BuscarConvenio(valorinicial) {
        var valor = $("#tipoUsuario").val();
        console.log(valor);
        $.ajax({
            type: "POST",
            url: "FE_Ajax.php",
            data: {
                valor: valor,
                Tipo_Consulta: "Busqueda Convenio"
            },
            success: function(response) {
                $('#convenio').html(response);
                if (valorinicial != "") {
                    $("select[id='convenio'] > option[value='" + valorinicial + "']").attr("selected", true);
                    //$("select[id='fe_convenio']").select2();
                }
            }
        });

    }
</script>