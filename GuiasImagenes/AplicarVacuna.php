<?php include 'header.php';
include 'menu.php';



////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////

$idcliente = decrypt($_GET['cI']);
$Nombre = funcionMaster($idcliente, 'cliente_id', 'nombre_cliente', 'cliente');

$fecha = date("Y-m-d");

?>

<style type="text/css">
  .select2-container .select2-selection--single {
    height: 43px !important;
    padding: 10px !important;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>

      <li class="active"> Registrar Vacuna a <?php echo $Nombre; ?> </li>
    </ol>
  </section>

  <br>
  <section class="content">

    <div class="box box-info" align="center">

      <div class="card-body">
        <h4 class="card-title"> Registrar Vacuna a <?php echo $Nombre; ?> </h4>
        <br>
        <div class="content">
          <div class="">

            <form class="row" action="GuardarAplicarVacuna.php" method="POST" name="formularioGuardarVacuna" enctype="multipart/form-data">

              <div class="form-group col-md-6">
                <div align="left"> Grupo </div>

                <select id="esquema_vacunacion" name="esquema_vacunacion" class="form-control select2" style="width: 100%;" required onchange="MostrarVacunas(this.value)">
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='$Id_Grupo'> $Nombre_Grupo</option>";
                  } else {
                    echo "<option value=''> Seleccione uno ...</option>";
                  }
                  ?>

                  <?php



                  $queryList = mysqli_query($conn3, "SELECT * FROM grupos_vacunacion where activo = 1 ORDER BY grupos_vacunacion.id ASC");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowLista = mysqli_fetch_array($queryList)) {

                    $id = $rowLista['id'];
                    $Nombre = $rowLista['Nombre'];

                    echo "<option value='$id'> $Nombre</option>";
                  }

                  ?>
                </select>

              </div>

              <div class="form-group col-md-6" id="campo_vacuna">
                <div align="left"> Vacuna </div>
                <select id="vacuna" name="vacuna" class="form-control select2" style="width: 100%;" required onchange="Vacunas_Dosis(this.value)">

                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Lote </div>
                <select id="lote" name="lote" class="form-control select2" style="width: 100%;" required="">

                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Dosis </div>
                <select id="dosis" name="dosis" class="form-control select2" style="width: 100%;" required>

                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Médico que la Indica </div>


                <input type="text" class="form-control input-lg" name="doctor"  id="doctor" placeholder="Nombre Doctor" >


             <!-- <textarea  id="doctor" name="doctor"  class="textarea" placeholder="Nombre Doctor" style="width: 100%;" ></textarea> -->



                <!-- <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                  <option>Seleccione</option>
                  <?php
                  SelectInterconsulta(1);
                  ?>
                </select> -->


              </div>

              <div class="form-group col-md-6">
                <div align="left"> Persona que lo Administra </div>

                     <input type="text" class="form-control input-lg" name="persona_administra"  id="persona_administra" placeholder="Nombre Persona" >
<!--
            <textarea  id="persona_administra" name="persona_administra"  class="textarea" placeholder="Nombre Persona" style="width: 100%;" ></textarea> -->


                <!-- <select id="persona_administra" name="persona_administra" class="form-control select2" style="width: 100%;" required="required">
                  <option>Seleccione</option>
                  <?php
                  SelectInterconsulta(2);
                  ?>
                </select> -->

              </div>

              <div class="form-group col-md-6">
                <div align="left"> Fecha de Administración </div>
                <input type="date" class="form-control input-lg" id="fecha_administracion" name="fecha_administracion" value="<?php echo $fecha ?>">
              </div>

                 <div class="form-group col-md-6">
                 <div align="left">  Fecha de Próxima Aplicación </div>
                <input type="date" class="form-control input-lg" id="fecha_proxima_aplicacion" name="fecha_proxima_aplicacion" placeholder="Fecha Vencimiento"  value="<?php echo $fecha ?>">
              </div>
             
             <!-- <div class="form-group col-md-6">
                <div align="left"> Lote </div>
                <input type="text" class="form-control input-lg" id="lote" name="lote" placeholder="Lote">
              </div>
				-->
              <div class="form-group col-md-6">
                <div align="left"> Sitio Anatómico de Aplicación </div>


                <select id="sitio_anatomico" name="sitio_anatomico" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Oral</option>
                  <option>Miembro Superior Derecho</option>
                  <option>Miembro Superior Izquierdo</option>
                  <option>Miembro Inferior Derecho</option>
                  <option>Miembro Inferior Izquierdo</option>


                </select>
              </div>
              <div class="form-group col-md-6">
                <div align="left"> Vía de Administración </div>

                <select id="via" name="via" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Intramuscular</option>
                  <option>Oral</option>
                  <option>Subcutánea</option>
                  <option>Intradérmica</option>
                  <option>Otros</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Observaciones </div>
                <textarea id="observaciones" name="observaciones" class="textarea" placeholder="Describir" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>
              <div class="form-group col-md-6">
                <div align="left"> Efecto Adverso </div>
                <textarea id="efecto_adverso" name="efecto_adverso" class="textarea" placeholder="Describir" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
              </div>

              <div class="col-sm-12">
                <br>
                <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                <br>
              </div>


              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
              <input type="hidden" name="id_cliente" id="id_cliente" value="<?php echo $idcliente ?>">

              <div class="form-group col-md-12">
                <center><button type="submit" name="Guardar" class="btn btn-block btn-outline-info rounded-pill">Guardar</button></center>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="box row">
      <br>
      <div class="form-group col-md-12">
        <center><a href="ImprimirVacunacion?cI=<?= encrypt($idcliente) ?>" class="btn btn-outline-info rounded-pill btn-block btn-sm">Imprimir Esquema de Vacunación</a></center>


      </div>

      <div class="form-group col-md-6">


        <center><a href="HistorialVacunacion?cI=<?= encrypt($idcliente) ?>" class="btn btn-outline-info rounded-pill btn-block btn-sm"><i class="fa fa-print"></i> Imprimir Historial de Vacunación</a></center>
      </div>


      <div class="form-group col-md-6">
        <center><a href="enviarHistorial?iC=<?= encrypt($idcliente) ?>" class="btn btn-outline-info rounded-pill btn-block btn-sm"><i class="fa fa-paper-plane"></i> Enviar Historial (Correo / WhatsApp) </a></center>


      </div>
    </div>








    <div class="box">
      <br>
      <div class="box-body">
        <table class="table table-bordered" style="font-size: 15px;width:100%">
          <thead>
            <tr>
              <th>Vacuna</th>
              <th>Dosis</th>
              <th>Fecha Administración</th>
              <th>Fecha Próxima Aplicación</th>
              <th>Sitio Anatómico</th>
              <th>Observaciones</th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php

            $usuario_id = $_SESSION['ID'];

            $queryList = mysqli_query($conn3, "SELECT * FROM grupos_vacunacion");
            $nrowl = mysqli_num_rows($queryList);
            while ($Lista = mysqli_fetch_array($queryList)) {
              $numero_grupo = $Lista['id'];
              $nombre_grupo = $Lista['Nombre'];

              $contador = '0';

              $queryList1 = mysqli_query($conn3, "SELECT l_v.id as ListaVacuna,v_a.Fecha_Administracion as Fecha_A,v_a.Fecha_Proxima_Aplicacion as Fecha_P,v_a.Sitio_Anatomico as Sitio_A,v_a.Observacion as Observacion, v_a.Dosis_Aplicada as Dosis, v_a.id as id_vacunacion 
              FROM vacunas_aplicadas as v_a 
              , listado_vacunas as l_v  
              WHERE v_a.Id_Lista_Vacuna = l_v.id AND l_v.Id_Grupo='$numero_grupo' AND v_a.Id_Cliente = '$idcliente' and v_a.activo = 1  ORDER BY v_a.id , v_a.Id_Lista_Vacuna, v_a.Dosis_Aplicada");
              $nrowl = mysqli_num_rows($queryList1);
              while ($Lista1 = mysqli_fetch_array($queryList1)) {
                if ($contador == "0") {
                  echo '<tr><td colspan="7" style="background-color: beige;"><b>' . $nombre_grupo . '</b></td></tr>';
                }
                $ListaVacuna = $Lista1['ListaVacuna'];
                $Nombre_Vacuna = funcionMaster($ListaVacuna, 'id', 'Nombre_Vacuna', 'listado_vacunas');

                $Dosis = $Lista1['Dosis'];
                $Fecha_A = $Lista1['Fecha_A'];
                $Fecha_P = $Lista1['Fecha_P'];

                $Sitio_A = $Lista1['Sitio_A'];
                $Observacion = $Lista1['Observacion'];

                echo '<tr><td>' . $Nombre_Vacuna . ' </td>
                        <td> Dosis ' . $Dosis . ' </td>
                        <td>' . $Fecha_A . ' </td>
                        <td>' . $Fecha_P . ' </td>
                        <td>' . $Sitio_A . ' </td>
                        <td>' . $Observacion . ' </td>
                        <td>
                        <a href="ComprobanteVacunacion?iD=' . encrypt($Lista1['id_vacunacion'])  . '" title="Comprobante de Registro"><i class="fa fa-file-o"></i> </a> | 
                        <a href="certificadoVacunas?iD=' . encrypt($Lista1['id_vacunacion']) . '" title="Certificado vacunas"><i class="fa fa-file-text-o"></i> </a>  |
                        <a href="enviarcertificado?iD=' . encrypt($Lista1['id_vacunacion']) . '&iC=' . encrypt($idcliente) . '" title="Enviar Certificado"><i class="fa fa-paper-plane"></i> </a>  |';
                if ($_SESSION['TIPO'] == '99') {

                  echo '
                        <a title="Eliminar Vacuna"><i class="fa fa-trash-o" onclick="confirmation(' . $Lista1['id_vacunacion'] . ')"></i> </a> ';
                }

                echo '
                        </td>
                        

                        </tr>';

                $contador++;
              }
            }
            ?>


          </tbody>
          <!-- <tfoot>
            <tr>
              <th>Vacuna</th>
              <th>Dosis</th>
              <th>Fecha Administración</th>
              <th>Fecha Próxima Aplicación</th>
              <th>Sitio Anatómico</th>
              <th>Observaciones</th>
              <th> </th>
            </tr>
          </tfoot> -->
        </table>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'footer.php';

?>

<script type="text/javascript">
  function confirmation(valor) {
    if (confirm("Seguro desea eliminar el este registro?")) {
      return window.location = "EliminarVacunas.php?idV=<?=salt()?>" + btoa(valor);
    } else {
      return false;
    }
  }


















  function MostrarVacunas(value) {
    var id_listavacuna = value;
    $.ajax({
      type: "POST",
      url: 'Ajax_VacunaXLista.php',

      data: {
        id_listavacuna: id_listavacuna
      },
      success: function(d) {
        $('#vacuna').html(d);

      }


    });
  }
</script>

<script type="text/javascript">
  function Vacunas_Dosis(values) {
    var id_listavacunas = values;
    var id_cliente = document.getElementById("id_cliente").value;

    $.ajax({
      type: "POST",
      url: 'Ajax_DosisVacuna.php',

      data: {
        id_listavacunas: id_listavacunas,
        id_cliente: id_cliente
      },
      success: function(d) {
        $('#dosis').html(d);

      }


    });

    $.ajax({
      type: "POST",
      url: 'Ajax_loteVacuna.php',

      data: {
        id_listavacunas: id_listavacunas
      },
      success: function(d) {
        $('#lote').html(d);

      }


    });



  }







  function Vacunas_lotes(values) {
    var id_listavacunas = values;

    $.ajax({
      type: "POST",
      url: 'Ajax_loteVacuna.php',

      data: {
        id_listavacunas: id_listavacunas
      },
      success: function(d) {
        $('#lote').html(d);

      }


    });
  }
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>