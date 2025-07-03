<?php
include 'header.php';
include 'menu.php';
$idHistoria = 0;
$idHistoria = ($_GET['iCr'] != "" ? decrypt($_GET['iCr']) : $_GET['id']);

$paciente = 0+ $_GET['clienteId'];
   if ($paciente>0) {
     $condicion = ' cliente_id='.$paciente.' ';
   }else{$condicion = ' ';}


$queryListhc = mysqli_query($conn3, "SELECT * from configTablasE where id = $idHistoria");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
  $menuNombre = $rowhc['menuNombre'];
  $nombreH = $rowhc['nombre'];
  $idHistoria = $rowhc['id'];
  $name = $rowhc['name'];
}

if ($idHistoria == 0) {
  header("Location: portada");
}


if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
  $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
}else{
  $queryCliente = "";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pacientes / <?php echo $nombreH ?>

    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Pacientes</a></li>
    </ol> -->
  </section>



  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">


        <div class="box">
          <div class="box-header">
            <a href="CrearPaciente.php">
              <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registrar Pacientes </strong></h4>
              </button>
            </a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


           <?php if ($idHistoria==30): ?>
                <div class="box-body table-responsive no-padding">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Seguro</th>
                        <th style="width: 25em;">   </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ID = $_SESSION['ID'];
                      $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $ID ");
                      $nrowl=mysqli_num_rows($queryList);
                      while($rowMotorizado=mysqli_fetch_array($queryList)){

                        $vista      =$rowMotorizado['vista'];
                        $TIPO   =$rowMotorizado['TIPO'];

                      }
                      if ($paciente>0) {
                        $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente where 1=1 $condicion $queryCliente order by cliente_id");
                      }else{
                        if ($vista == 0){
                         $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente WHERE 1=1 $queryCliente order by cliente_id"); 
                       }
                       elseif ($vista  == 1){
                        $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID $queryCliente order by cliente_id");
                      }
                      elseif ($vista  == 1 and  $TIPO == 1){
                        $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id = 1 $queryCliente order by cliente_id");
                      }  
                    }

                    $nrowl=mysqli_num_rows($queryPaciente);
                    while($rowPacientes=mysqli_fetch_array($queryPaciente))
                    {
                      $cliente_id=$rowPacientes['cliente_id'];
                      $nombre_cliente=$rowPacientes['nombre_cliente'];
                      $CODI_CLIENTE=$rowPacientes['CODI_CLIENTE'];
                      $seguro=$rowPacientes['seguro'];
                      echo '<tr>';
                      echo'<td><a href="cHistoriaE?cI='.encrypt($cliente_id).'&iCr='.encrypt($idHistoria).'&solicitud=0" title="'.$nombreH.'">'.$nombre_cliente.' </a></td>';
                      echo '<td>'.$CODI_CLIENTE.'</td>';
                      echo '<td>'.$seguro.'</td>';
                      echo '<td  style="font-size:23px;text-align:center">';    
                      // echo '<a href="configHistoriaClinica.php?clienteId='.$cliente_id.'&idHistoria='.$idHistoria.'&solicitud=0&tipo=0" title="Agregar Consulta para '.$nombreH.' Niños y Adolecentes "><i class="fa fa-heartbeat"></i> </a>';

                      $queryVerificar=mysqli_query($conn3,"SELECT count(id) as hay from SignosVitalesYAntropometria where cliente_id = $cliente_id;");
                      $nrowl=mysqli_num_rows($queryVerificar);
                      while($rowMotorizado=mysqli_fetch_array($queryVerificar)){
                        $hay      =$rowMotorizado['hay'];
                      }
                      ?>
                      <?php if ($hay>0): ?>
                        <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#exampleModalScrollable<?=$cliente_id?>">
                          Nuevo ...
                        </button>
                      <?php else: ?>
                        <a type="button" lass="btn btn-block btn-outline-info btn-lg rounded-pill shadow" href="SignosVitales_Antropometricas.php?cI=<?php echo encrypt($cliente_id) ?>">
                        No hay Signos vitales / Cargar
                      </a>
                      <?php endif ?>
                      
                      <div class="modal fade" id="exampleModalScrollable<?=$cliente_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalScrollableTitle">Nuevo Formulario</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">      
                              <?php if ($ID=='253'): ?>
                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=37&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"> <h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 007 - Interconsulta INFORME</strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=38&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 010 - Laboratorio Clinico INFORME</strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=36&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 012 - Imagenologia INFORME</strong></h4></a>
                              <?php else: ?>
                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=30&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 002 - Consulta Externa / Formulario 003 - Anamnesis </strong></h4></a>

                                <!-- <a  href="configHistoriaClinica.php?clienteId=<?php echo $cliente_id ?>&idHistoria=30&solicitud=0&tipo=0" class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 003 - Anamnesis </strong></h4></a> -->

                                <!-- <a  href="configHistoriaClinica.php?clienteId=<?php echo $cliente_id ?>&idHistoria=<?php echo $idHistoria ?>&solicitud=0&tipo=0" class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 004 - Signos Vitales </strong></h4></a> -->

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=31&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 006 - Epicrisis </strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=32&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 007 - Interconsulta </strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=33&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 008 - Emergencia </strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=34&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 010 - Laboratorio Clinico </strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=35&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 012 - Imagenologia </strong></h4></a>

                                <a  href="cHistoriaE?cI=<?php echo encrypt($cliente_id) ?>&iCr=39&solicitud=0&tipo=0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Formulario 053 - referencia, derivación, contrareferencia... </strong></h4></a>

                              <?php endif ?>


                            </div>

                          </div>
                        </div>
                      </div>

                      <?php 

                      // signos vitales
                      echo'<a href="SignosVitales_Antropometricas.php?cI='.encrypt($cliente_id).'" title="Agregar Signos Vitales y Antropometria"><i class="fas fa-user-nurse" style="color:#29951ccf;"></i></a> |  ';

                      // opciones
                      echo '<a href="cVerPacienteE?cI='.encrypt($cliente_id).'&iCr='.encrypt($idHistoria).'" title="Ver Historias de '.$nombreH.'"><i class="fa fa-search"></i> </a> ';
                      echo '<a href="nuevoPaciente?cI='.encrypt($cliente_id).'" title="Editar Cliente"><i class="fa fa-pencil"></i> </a> ';
                      echo '<a href="agregarCitas?cI='.encrypt($cliente_id).'" title="Agregar Cita"><i class="fa fa-calendar"></i> </a>  ';
                      echo '<a href="anexosPaciente?cI='.encrypt($cliente_id).'" title="Agregar Examenes"><i class="fa fa-folder-open-o"></i> </a>';  
                      echo '</td>
                      </tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            <?php else: ?>
              <div class="box-body table-responsive no-padding">
                <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Cedula</th>
                      <th>Celular</th>
                      <th>Email</th>
                      <th>Teléfono Fijo</th>
                      <th>Entidad de Salud</th>
                      <th>Seguro</th>
                      <th>   </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ID = $_SESSION['ID'];
                    $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $ID ");
                    $nrowl=mysqli_num_rows($queryList);
                    while($rowMotorizado=mysqli_fetch_array($queryList)){

                      $vista      =$rowMotorizado['vista'];
                      $TIPO   =$rowMotorizado['TIPO'];

                    }
                    if ($vista == 0){
                     $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente order by cliente_id"); 
                   }
                   elseif ($vista  == 1){
                    $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
                  }
                  elseif ($vista  == 1 and  $TIPO == 1){
                    $queryPaciente=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id = 1 order by cliente_id");
                  }
                  $nrowl=mysqli_num_rows($queryPaciente);
                  while($rowPacientes=mysqli_fetch_array($queryPaciente))
                  {
                    $cliente_id=$rowPacientes['cliente_id'];
                    $nombre_cliente=$rowPacientes['nombre_cliente'];
                    $CODI_CLIENTE=$rowPacientes['CODI_CLIENTE'];
                    $celular_cliente=$rowPacientes['celular_cliente'];
                    $correo_cliente=$rowPacientes['correo_cliente'];
                    $telefono_cliente=$rowPacientes['telefono_cliente'];
                    $entidadSalud=$rowPacientes['entidadSalud'];
                    $seguro=$rowPacientes['seguro'];
                    echo '     <tr>';
                    echo'<td><a href="cHistoriaE?cI='.encrypt($cliente_id).'&iCr='.encrypt($idHistoria).'&solicitud=0" title="'.$nombreH.'">'.$nombre_cliente.' </a></td>';
                    echo '<td>'.$CODI_CLIENTE.'</td>
                    <td>'.$celular_cliente.'</td>
                    <td>'.$correo_cliente.'</td>
                    <td>'.$telefono_cliente.'</td>
                    <td>'.$entidadSalud.'</td>
                    <td>'.$seguro.'</td>
                    <td style="width: 120px;font-size:23px;text-align:center">';    
                    echo '<a href="cHistoriaE?cI='.encrypt($cliente_id).'&iCr='.encrypt($idHistoria).'&solicitud=0&tipo=0" title="Agregar Consulta para '.$nombreH.' Niños y Adolecentes "><i class="fa fa-heartbeat"></i> </a>';
                    echo'<a href="SignosVitales_Antropometricas.php?cI='.encrypt($cliente_id).'" title="Agregar Signos Vitales y Antropometria"><i class="fas fa-user-nurse" style="color:#29951ccf;"></i> </a> ';
                    echo '<a href="cVerPacienteE?cI='.encrypt($cliente_id).'&iCr='.encrypt($idHistoria).'" title="Ver Historias de '.$nombreH.'"><i class="fa fa-search"></i> </a> ';
                    echo '<a href="nuevoPaciente?cI='.encrypt($cliente_id).'" title="Editar Cliente"><i class="fa fa-pencil"></i> </a> ';
                    echo '<a href="agregarCitas?cI='.encrypt($cliente_id).'" title="Agregar Cita"><i class="fa fa-calendar"></i> </a>  ';
                    echo '<a href="anexosPaciente?cI='.encrypt($cliente_id).'" title="Agregar Examenes"><i class="fa fa-folder-open-o"></i> </a>';  
                    echo '</td>
                    </tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Teléfono Fijo</th>
                    <th>Entidad de Salud</th>
                    <th>Seguro</th>
                    <th>   </th>
                  </tr>
                </tfoot>
              </table>
            </div>

          <?php endif ?>

          </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
</div>

<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>
<script type="text/javascript">
  function funcionDinamica() {
    Select2Dinamico(
      "#tipoIngreso", {
        selectFrom: "<?= Encriptar("*") ?>",
        name: "<?= Encriptar("estadosIngreso") ?>",
        value: "<?= Encriptar("id") ?>",
        text: "<?= Encriptar("nombreEstado") ?>",
        likeWhere: "<?= Encriptar("nombreEstado") ?>",
        order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
        clausula: {
          data: "<?= Encriptar("estado = 1") ?>",
          value: [''],
        },
        carapter: "true",
        campoCreador: btoa(JSON.stringify({
          nombreCreador: false,
          conditionInsert: false,
          conditionSelect: false,
        })),
      }, false, false
    );
  }

  function verIngresos(data) {
    data.cargarCard = "cargarCard";
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      data: data,
      success: function(response) {
        $('#div-Ingresos').html(response);
        $("#form-ingresos").submit(function(e) {
          e.preventDefault();
          var data = new FormData(this);
          addEstado(data);
        });
      }
    });
  };

  function addEstado(data) {
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      processData: false,
      contentType: false,
      data: data,
      success: function(response) {
        // console.log(response);
        let datos = JSON.parse(response);
        if (datos.status == 1) {
          verIngresos({
            cliente_id: atob(datos.cliente_id),
            usuario_id: <?= $_SESSION['ID'] ?>
          })
        } else {
          alert("El estado no fue agregado");
        }
      }
    });
  }

  function verEstado(data) {
    data.cargarEstadoTipo = "cargarEstadoTipo";
    $.ajax({
      type: "POST",
      url: "consultarClienteIngresos.php",
      data: data,
      success: function(response) {
        $('#div-campoAdicional').html(response);
      }
    });
  };
</script>