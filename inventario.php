<?php include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      <li class="active"> Registro de inventario </li>
    </ol>
  </section>

  <br>

  <section class="content">

    <div class="box box-info" align="center">
      <br>
      <br>
      <div class="card-body">
        <h4 class="card-title"> Registro de inventario </h4>
        <br>
        <form action="inventarioG.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-12">
              <div align="left"> Tipo</div>

              <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" onChange="inventario();" required="required">
                <option value="" selected="selected">Seleccione </option>
                <?php
                $contador = 0;
                $queryList = mysqli_query($conn3, "SELECT * FROM scategoria WHERE usuario_id = $ID order by descripcion");
                $nrowl = mysqli_num_rows($queryList);
                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                  $id      = $row_recordset32['id'];
                  $descripcion      = $row_recordset32['descripcion'];
                  $contador++;

                  echo "<option value='$id'> $descripcion</option>";
                }

                ?>
              </select>
              <?php
              if ($contador == 0) {
                echo '<h6> <font color="red"> No a registrado ningún tipo o categoría <a href="tipoinventarios"> <strong>  registrar </strong></a>  </font></h6>
                ';
              }
              ?>
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Descripción </div>

              <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeholder="Descripcion" required>
            </div>

            <div class="form-group col-md-12">
              <div align="left"> Referencia </div>
              <input type="text" class="form-control input-lg" id="referencia" name="referencia" placeholder="referencia" required>
            </div>

            <div class="form-group col-md-12" id="ocultar">
              <div align="left"> Fecha de Vencimiento </div>
              <input type="date" class="form-control input-lg" id="fecha_vencimiento" name="fecha_vencimiento" required>
            </div>


            <br>
            <div class="form-group col-md-12">
              <hr>
            </div>

            <div class="form-group col-md-4" id="ocultar1">
              <div align="left">Existencia</div>
              <input type="number" class="form-control input-lg" id="existencia" name="existencia" required>
            </div>
            <div class="form-group col-md-4" id="ocultar2">
              <div align="left"> Mínimo</div>
              <input type="number" class="form-control input-lg" id="minimo" name="minimo" required>
            </div>

            <div class="form-group col-md-4" id="ocultar3">
              <div align="left"> Máximo</div>
              <input type="number" class="form-control input-lg" id="maximo" name="maximo" required>
            </div>

            <div class="form-group col-md-12" id="ocultar4">
              <div align="left"> Costo </div>
              <input type="number" class="form-control input-lg" id="costo" name="costo" required>
            </div>


            <div class="form-group col-md-6">
              <div align="left"> Precio </div>
              <input type="number" class="form-control input-lg" id="precio" name="precio" required>
            </div>

             <div class="form-group col-md-6">
              <div align="left"> Puntos </div>
              <input type="number" class="form-control input-lg" id="puntos" name="puntos" step="any" required>
            </div>



            <div class="form-group col-md-12">
              <div align="left">Notas</div>
              <textarea id="nota" name="nota" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </div>
            <!-- /.box-header -->


            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">







            <div class="form-group col-md-12">
            <center style="width:100%"><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%">Guardar</button></center>
            </div>

            <input type="hidden" name="tipo_cliente" valur="1">

        </form>
      </div>



      <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">


    </div>




  </section>

  <?php echo $mensaje_registro_patients; ?>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php include 'footer.php' ?>
<script>
  function inventario() {

    var tipo = $("#tipo").val();
    let hidden;
    $.ajax({
      type: "POST",
      url: "inventario.php",
      data: {
        tipo: tipo
      },
      success: function(response) {
        $('#div-resultsConsultas').html(response);
        // hidden = document.getElementsByName("hidden").var;
        //  window.location.href = window.location.href + "&hidden=" + hidden;
        //  document.getElementById("id_configantecedente1").value = id;
        if (tipo == "19" || tipo == "20" || tipo == "16") {
          $('#ocultar').hide();
          $('#ocultar1').hide();
          $('#ocultar2').hide();
          $('#ocultar3').hide();
          $('#ocultar4').hide();
          $('#ocultar5').hide();
          $('#ocultar6').hide();
          $('#ocultar7').hide();
          $('#ocultar8').hide();
          $('#ocultar9').hide();
          $('#ocultar10').hide();
          $('#ocultar11').hide();
          $('#ocultar12').hide();

        } else {
          $('#ocultar').show();
          $('#ocultar1').show();
          $('#ocultar2').show();
          $('#ocultar3').show();
          $('#ocultar4').show();
          $('#ocultar5').show();
          $('#ocultar6').show();
          $('#ocultar7').show();
          $('#ocultar8').show();
          $('#ocultar9').show();
          $('#ocultar10').show();
          $('#ocultar11').show();
          $('#ocultar12').show();

        }
      }
    });
  };
</script>