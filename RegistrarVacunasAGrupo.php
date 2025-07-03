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

$grupo = decrypt($_GET['grupo']);

if ($_GET['eD'] <> "") {
  include 'funciones/conn3.php';

  $accion = ' Editar vacuna asociada a grupo';
  $idlistavacuna = decrypt($_GET["eD"]);
  $queryListhc = mysqli_query($conn3, "SELECT * from listado_vacunas where id='$idlistavacuna'");
  $nrowl = mysqli_num_rows($queryListhc);
  while ($Lista = mysqli_fetch_array($queryListhc)) {
    $Id_Vacuna = $Lista['Id_Vacuna'];
    $Nombre_Vacuna = $Lista['Nombre_Vacuna'];

    $Id_Grupo = $Lista['Id_Grupo'];
    $Nombre_Grupo = $Lista['Nombre_Grupo'];

    $protege_contra = $Lista['Protege_Contra'];
    $edad = $Lista['Edad'];

    $dosis = $Lista['Dosis'];
  }


  $tabla .= ' <b>INFORMACIÓN REGISTRADA DE LA VACUNA ' . $Nombre_Vacuna . ' PARA EL GRUPO ' . $Nombre_Grupo . '</b> ';


  $tabla .= '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%" id="tablaParaBorrar">
<tr><th>  Dosis </th> <th> Tiempo de aplicación </th> ';
  $cont = 0;
  $queryList = mysqli_query($conn3, "SELECT * FROM  dosis  where grupo = '$grupo'  and vacuna ='$Id_Vacuna' and activo = 1");
  //echo "SELECT * FROM  operacionRecetario  where usuario_id = '$usuario_id'  and cliente_id ='$idcliente' and idReceta= '$idR'";
  $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $cont++;
    $idOper1     = $rowMotorizado['id'];
    $dosis = $rowMotorizado['dosis'];
    $meses   = $rowMotorizado['tiempoMeses'];
    $anos = $rowMotorizado['tiempoAnos'];
    $dias = $rowMotorizado['tiempoDias'];

    if ($meses <> 100) {
      $var = 'Meses';
      $tiempo = $meses;
    }
    if ($anos <> 100) {
      $var = 'Años';
      $tiempo = $anos;
    }
    if ($dias <> 100) {
      $var = 'Dias';
      $tiempo = $dias;
    }

    if ($dosis < 10) {
      $noD = $dosis . ' Dosis';
    }
    //else if($dosis == 6 ) {$noD='Dosis única';} 
    //else if($dosis == 7 ) {$noD='Refuerzo';} 
    //else  {$noD='Dosis Anual';} 


    $tabla .= ' <tr>     
<th> <input type="hidden"  value="' . $idOper1 . '" class="form-control input-lg" id="idOper' . $cont . '" name="idOper" >   <a href="#"  onclick="eliminarItem(' . $cont . ',' . $grupo . ',' . $Id_Vacuna . ');"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a> ' . $noD . ' </th> <th>' . $tiempo . ' ' . $var . ' </th> 
  ';
  }


  $tabla .= '</table></h6>';
} else {

  $accion = ' Registrar vacuna a grupo';
}


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

      <li class="active"> Registrar vacuna a grupo </li>
    </ol>
  </section>

  <br>
  <section class="content">


    <div class="box box-info" align="center">
      <h4 class="card-header"> Agregar nuevo grupo </h4>
      <div class="form-group col-md-12">

        <div class="form-group col-md-10">
          <div align="left"> Nombre del grupo </div>

          <input type="text" class="form-control input-lg" id="grupo" name="grupo" placeholder="">
        </div>


        <div class="form-group col-md-2">
          <br>

          <a href="#" onclick="agergarItem();" class="btn btn-outline-info rounded-pill">
            Agregar y refrescar
          </a>

        </div>

        <div class="form-group col-md-12" id="div-results"></div>




        <hr width=100% align="right" size="20" color="#FF0000">



      </div>


















      <div class="card-body">
        <h4 class="card-header">
          <hr> <?php echo $accion ?>
        </h4>
        <br>
        <div class="content">
          <div class="">



            <?php echo $tabla ?>







            <form action="GuardarVacunasAGrupo.php" method="POST" name="formularioGuardarVacunaAGrupo" enctype="multipart/form-data" class="row">

              <div class="form-group col-md-6">
                <div align="left"> Grupo </div>

                <select id="esquema_vacunacion" name="esquema_vacunacion" class="form-control select2" style="width: 100%;" required>
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

              <div class="form-group col-md-6">
                <div align="left"> Vacuna </div>
                <select id="vacuna" name="vacuna" class="form-control select2" style="width: 100%;" required>

                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='$Id_Vacuna'> $Nombre_Vacuna</option>";
                  } else {
                    echo "<option value=''> Seleccione uno ...</option>";
                  }
                  ?>

                  <?php
                  $queryList = mysqli_query($conn3, "SELECT * FROM  vacunas where activo = 1   ORDER BY vacunas.id ASC");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowLista = mysqli_fetch_array($queryList)) {
                    $id = $rowLista['id'];
                    $Nombre = $rowLista['Nombre'];
                    $NombreC = $rowLista['Nombre_Comercial'];

                    echo "<option value='$id'>$Nombre -- $NombreC</option>";
                  }

                  ?>
                </select>
              </div>

              <div class="form-group col-md-6">
                &nbsp;
              </div>
              <div class="form-group col-md-6">
                <div align="left">Esquema: Cantidad total de dosis </div>
                <select id="cantidad_dosis" name="cantidad_dosis" class="form-control select2" style="width: 100%;" required>
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='$dosis'> $dosis Dosis </option>";
                  } else {
                    echo "<option value=''> Seleccione uno ...</option>";
                  }
                  ?>
                  <option value='Dosis Unica'> Dosis única </option>

                  <option value='1'> 1 Dosis </option>
                  <option value='2'> 2 Dosis </option>
                  <option value='3'> 3 Dosis </option>
                  <option value='4'> 4 Dosis </option>
                  <option value='5'> 5 Dosis </option>

                  <option value='6'> 6 Dosis</option>

                  <!--    <option value='Dosis Anual'> Dosis Anual </option> -->



                </select>
              </div>



              <div class="col-md-12" align="center">

                <h4> <b>Especificaciones de cada dosis</b> </h4>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Tipo dosis </div>
                <select id="cantidadosis" name="cantidadosis" class="form-control select2" style="width: 100%;">
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='$dosis'> $dosis Dosis </option>";
                  } else {
                    echo "<option value=''> Seleccione uno ...</option>";
                  }
                  ?>
                  <option value='8'> Dosis única </option>

                  <option value='1'> 1° Dosis </option>
                  <option value='2'> 2° Dosis </option>
                  <option value='3'> 3° Dosis </option>
                  <option value='4'> 4° Dosis </option>
                  <option value='5'> 5° Dosis </option>
                  <!--  <option value='6'> 6. Dosis Anual </option> -->

                  <option value='Refuerzo'> Refuerzo </option>

                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Tiempo de aplicación (En Días)</div>
                <select id="tiempo_dosis2" name="tiempo_dosis2" class="form-control select2" style="width: 100%;">
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  } else {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  }
                  ?>
                  <option value='0'> 0 </option>
                  <option value='1'> 1 </option>
                  <option value='2'> 2 </option>
                  <option value='3'> 3 </option>
                  <option value='4'> 4 </option>
                  <option value='5'> 5 </option>
                  <option value='6'> 6 </option>
                  <option value='7'> 7 </option>
                  <option value='8'> 8 </option>
                  <option value='9'> 9 </option>
                  <option value='10'> 10 </option>
                  <option value='11'> 11 </option>
                  <option value='12'> 12 </option>
                  <option value='13'> 13 </option>
                  <option value='14'> 14 </option>
                  <option value='15'> 15 </option>
                  <option value='16'> 16 </option>
                  <option value='17'> 17 </option>
                  <option value='18'> 18 </option>
                  <option value='19'> 19 </option>
                  <option value='20'> 20 </option>
                  <option value='21'> 21 </option>
                  <option value='22'> 22 </option>
                  <option value='23'> 23 </option>
                  <option value='24'> 24 </option>
                  <option value='25'> 25 </option>
                  <option value='26'> 26 </option>
                  <option value='27'> 27 </option>
                  <option value='28'> 28 </option>
                  <option value='29'> 29 </option>
                  <option value='30'> 30 </option>
                  <option value='31'> 31 </option>
                  <option value='32'> 32 </option>
                  <option value='33'> 33 </option>
                  <option value='34'> 34 </option>
                  <option value='35'> 35 </option>
                  <option value='36'> 36 </option>
                  <option value='37'> 37 </option>
                  <option value='38'> 38 </option>
                  <option value='39'> 39 </option>
                  <option value='40'> 40 </option>
                  <option value='41'> 41 </option>
                  <option value='42'> 42 </option>
                  <option value='43'> 43 </option>
                  <option value='44'> 44</option>
                  <option value='45'> 45 </option>
                </select>
              </div>


              <div class="form-group col-md-6">
                <div align="left"> Tiempo de aplicación (En meses)</div>
                <select id="tiempo_dosis" name="tiempo_dosis" class="form-control select2" style="width: 100%;">
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  } else {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  }
                  ?>
                  <option value='0'> 0 </option>
                  <option value='1'> 1 </option>
                  <option value='2'> 2 </option>
                  <option value='3'> 3 </option>
                  <option value='4'> 4 </option>
                  <option value='5'> 5 </option>
                  <option value='6'> 6 </option>
                  <option value='7'> 7 </option>
                  <option value='8'> 8 </option>
                  <option value='9'> 9 </option>
                  <option value='10'> 10 </option>
                  <option value='11'> 11 </option>
                  <option value='12'> 12 </option>
                  <option value='13'> 13 </option>
                  <option value='14'> 14 </option>
                  <option value='15'> 15 </option>
                  <option value='16'> 16 </option>
                  <option value='17'> 17 </option>
                  <option value='18'> 18 </option>
                  <option value='19'> 19 </option>
                  <option value='20'> 20 </option>
                  <option value='21'> 21 </option>
                  <option value='22'> 22 </option>
                  <option value='23'> 23 </option>
                  <option value='24'> 24 </option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Tiempo de aplicación (en años)</div>
                <select id="tiempo_dosis1" name="tiempo_dosis1" class="form-control select2" style="width: 100%;">
                  <?php
                  if ($_GET['editar'] <> "") {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  } else {
                    echo "<option value='100'> Seleccione uno ...</option>";
                  }
                  ?>
                  <option value='0'> 0 </option>
                  <option value='1'> 1 </option>
                  <option value='2'> 2 </option>
                  <option value='3'> 3 </option>
                  <option value='4'> 4 </option>
                  <option value='5'> 5 </option>
                  <option value='6'> 6 </option>
                  <option value='7'> 7 </option>

                </select>
              </div>


              <div class="form-group col-md-12">
                <br>

                <a href="#" onclick="agergardosis();" class="btn btn-outline-info rounded-pill">
                  Agregar dosis
                </a>



              </div>

              <script type="text/javascript">
                $(document).ready(function() {
                  $('#limpiar').click(function() {
                    $('.cantidad_dosis1').val('');
                    $('.tiempo_dosis').val('');
                    $('.tiempo_dosis1').val('');
                    $('.tiempo_dosis2').val('');
                  });
                });
              </script>









              <br>

              <div class="form-group col-md-12" id="div-results1"></div>
              <br>
              <br>








              <div class="form-group col-md-6">
                <div align="left"> Protege contra </div>
                <textarea id="protege_contra" name="protege_contra" class="textarea" placeholder="Describir..." style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $protege_contra ?></textarea>
              </div>
              <div class="form-group col-md-6">
                <div align="left"> Edad </div>
                <textarea id="edad" name="edad" class="textarea" placeholder="Describir" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $edad ?></textarea>
              </div>
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">

              <div class="form-group col-md-12">
                <?php
                if ($_GET['editar'] == "") {
                ?>
                  <center><button type="submit" name="Guardar" class="btn btn-block btn-outline-info rounded-pill">Guardar</button></center>
                <?php
                } else {
                ?>
                  <input type="hidden" name="id_lista_vacuna" value="<?php echo $_GET['editar'] ?>">
                  <input type="hidden" name="grupo" value="<?php echo $grupo ?>">

                  <center><button type="submit" name="Actualizar" class="btn btn-block btn-primary btn-sm">Actualizar</button></center>
                  <br>
                  <center><a href="RegistrarVacunasAGrupo.php" class="btn btn-block btn-primary btn-sm">Nueva vacuna a grupo</a></center>
                <?php
                }
                ?>
              </div>

            </form>
          </div>
        </div>


      </div>
    </div>

    <div class="box">
      <div class="box-body">
        <div class="form-group col-md-12" align="center"> <B>
            <H4>Grupos de vacunacion</H4>
          </B></div>

        <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre Grupo</th>

              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php

            $usuario_id = $_SESSION['ID'];
            $queryList = mysqli_query($conn3, "SELECT * FROM grupos_vacunacion where activo = 1 ");
            $nrowl = mysqli_num_rows($queryList);
            while ($Lista1 = mysqli_fetch_array($queryList)) {
              $id = $Lista1['id'];
              $Nombre_Grupo = $Lista1['Nombre'];

              echo '     <tr>
                    <td>' . $id . ' </td>
                    <td>' . $Nombre_Grupo . ' </td>
                   
                    <td>    

                    <a href="vacunacionGrupos?eD=' . encrypt($id) . '" title="Ver/Editar grupo"><i class="fa fa-pencil"></i> </a> |

<a href="vacunacionEliminarVacunasGrupos?eD=' . encrypt($id) . '" title="Eliminar"><i class="fa fa-trash"></i> </a> 

                    </td>

                    </tr>';
            }


            ?>


          </tbody>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Nombre Grupo</th>


              <th> </th>
            </tr>
          </tfoot>
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
  function agergarItem() {
    // estas son las variables que enviamos
    var grupo = $("#grupo").val();

    $.ajax({
      type: "POST",
      url: "ajax_agregarGrupo.php",
      data: {
        grupo: grupo
      },
      success: function(response) {

        $('#grupo').val('');


        $('#div-results').html(response);

        // aqui enviamos el mensaje por medio de un arreglo      
        
        window.location.reload();
      }
    });

  };






  function agergardosis() {
    // estas son las variables que enviamos
    var cantidadosis = $("#cantidadosis").val();

    var tiempo_dosis2 = $("#tiempo_dosis2").val();
    var tiempo_dosis = $("#tiempo_dosis").val();
    var tiempo_dosis1 = $("#tiempo_dosis1").val();
    var esquema_vacunacion = $("#esquema_vacunacion").val();
    var vacuna = $("#vacuna").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "ajax_agregarDosis.php",
      data: {
        cantidadosis: cantidadosis,
        tiempo_dosis: tiempo_dosis,
        tiempo_dosis1: tiempo_dosis1,
        tiempo_dosis2: tiempo_dosis2,
        esquema_vacunacion: esquema_vacunacion,
        vacuna: vacuna
      },
      success: function(response) {

        // $('#cantidadosis').val('');
        //$('#tiempo_dosis').val('');
        // $('#tiempo_dosis1').val('');
        // $('#tiempo_dosis2').val('');
        // $('#esquema_vacunacion').val('');
        // $('#vacuna').val('');


        $('#div-results1').html(response);
        $('#tablaParaBorrar').html('');
        

        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });

  };





  function eliminarItem(id, esquema_vacunacion, vacuna) {
    // estas son las variables que enviamos
    var idOper = $("#idOper" + id).val();
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemDosis.php",
      data: {
        idOper: idOper,
        esquema_vacunacion: esquema_vacunacion,
        vacuna: vacuna
      },
      success: function(response) {
        $('#div-results1').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
        window.location.reload();          
      }
    });
  };
</script>