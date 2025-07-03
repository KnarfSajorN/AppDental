
<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<style type="text/css">
  .grid-stack {
    background: gray;
    border-radius: 0.5rem;
  }

  .grid-stack-item-content {
    background-color: white;
    border-radius: 0.5rem;
  }
</style>
<style>
  .position-fixed {
    position: fixed !important;
    right: 0 !important;
  }

  /* en telefono no cambiar anda */
  @media (max-width: 767px) {
    .position-fixed {
      position: relative !important;
    }
  }
  .form-group {
    margin-bottom: 0 !important;
  }
</style>
<?php
// recibimos el get
// $idUsuario = base64_decode($_GET['iu']);
$idHistoria = base64_decode($_GET['ih']);
$iCr = encrypt($idHistoria);

// query a configTablas 
$queryConfigTablas = "SELECT * from configTablas where id = $idHistoria limit 1";
$resultConfigTablas = mysqli_query($conn3, $queryConfigTablas);
$rowConfigTablas = mysqli_fetch_array($resultConfigTablas);

// --------------------------------------------------------
// verificar si la tabla existe y si esta en el menu
// --------------------------------------------------------

// verificar si la tabla existe
// SELECT * from $rowConfigTablas[name] limit 1
$queryVerificar = "SELECT count(*) as regi FROM information_schema.tables 
WHERE 
TABLE_SCHEMA = '$NOMBRE_DB_GLOBAL' 
and table_name = '{$rowConfigTablas['name']}'";

// var_dump($queryVerificar);
$resultVerificar = mysqli_query($conn3, $queryVerificar);
$rowVerificar = mysqli_fetch_array($resultVerificar);
// var_dump($rowVerificar);
if ($rowVerificar['regi'] == 0) {
  $tabla = reemTilde($rowConfigTablas['name']);
  $queryCrearTabla = "CREATE TABLE $tabla  (
      id int not null auto_increment
    , cliente_id int not null default 0
    , usuario_id int not null default 0
    , Fecha date not null default '0000-00-00'
    , Hora time not null default '00:00:00'
    , firma text null default null
    , primary key (id)
  )";
  $result = mysqli_query($conn3, $queryCrearTabla);
  $tituloReem = reem($rowConfigTablas['titulo']);

  // como la primera vez se va a crear la tabla de la historia aprovechamos en crear la opción en main_menu
  $insert = "INSERT into main_menu set
          nombre = '{$tituloReem}',
          nivel = 1,
          pantalla = 'cPacientes?iCr={$iCr}',
          idPrincipal = 0,
          estado = 1,
          icon = 'icon-clinical-fe',
          color = '#2322e6',
          orden = '99',
          tabla = '{$rowConfigTablas['name']}'
          ";
  $queryInsert = mysqli_query($conn3, $insert);
}

// --------------------------------------------------------
// verificar si la tabla existe y si esta en el menu - fin
// --------------------------------------------------------




// consulta a la tabla con el detalle de esta historia para pre-cargarla
$queryConsulta = "SELECT 
id, fecha, hora, idTabla, div_class, div_align, div_nombre_campo, input_type, input_calss, replace(input_name,'	','') as input_name , input_placeholder, input_id, input_required, input_pattern, input_onChange, select_table, style, tipoCampo, input_maxlength, input_oninput, div_nombre_valor, input_value, img, titulo, maxlength, orden, estado
from configTablaDetalle 
where 1=1
and idTabla = $idHistoria 
and estado = 1
order by convert(orden, signed);";
$resultConsulta = mysqli_query($conn3, $queryConsulta);
$arrayDivs = [];
while ($row = mysqli_fetch_assoc($resultConsulta)) {
  $arrayDivs[] = $row;
}
$arrayDivs = json_encode($arrayDivs);


?>

<script src="gridstack/dist/gridstack-all.js"></script>
<link href="gridstack/dist/gridstack.min.css" rel="stylesheet" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-8">
          <div id="grid">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Historia - <strong><?= funcionMaster($idHistoria, 'id', 'titulo', 'configTablas') ?></strong></h3>
              </div>
              <div class="card-body">
                <div class="grid-stack gs-12" gs-current-cols="12">
                  <div class="p-5">
                    <h2 style="padding:5rem; color:rgba(255,255,255,0.5);">Arrastra los campos que necesites para tu historia desde el menu lateral</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 position-fixed" >
          <div class="card card-info" style="height:30rem;">
            <div class="card-header">
              <h3 class="card-title">Opciones</h3>
            </div>
            <div class="card-body" style="overflow: auto;">
              <?php
              $arrayOpciones = [
                ['name' => 'Encabezado', 'parameters' => [
                  ['data-titulo', 'Encabezado'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'separador'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'separador'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Texto Simple', 'parameters' => [
                  ['data-titulo', 'Texto Simple'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'text'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'text'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Números', 'parameters' => [
                  ['data-titulo', 'Números'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'number'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'number'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Texto Amplio', 'parameters' => [
                  ['data-titulo', 'Texto Amplio'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'textarea'],
                  ['data-input_calss', 'textarea'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'textarea'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Fecha', 'parameters' => [
                  ['data-titulo', 'Fecha'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'date'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'date'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Anexar archivo / imagen', 'parameters' => [
                  ['data-titulo', 'Anexar archivo / imagen'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'file'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'file'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Lista Simple', 'parameters' => [
                  ['data-titulo', 'Lista Simple'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'select'],
                  ['data-input_calss', 'form-control input-lg select2'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'select'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Lista Multiple', 'parameters' => [
                  ['data-titulo', 'Lista Multiple'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'selectmultiple'],
                  ['data-input_calss', 'form-control input-lg select2'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'selectmultiple'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Modulo Plegable - Inicio', 'parameters' => [
                  ['data-titulo', 'Modulo Plegable - Inicio'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'card'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'moduloplegable_inicio'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'moduloplegable_inicio'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Modulo Plegable - Fin', 'parameters' => [
                  ['data-titulo', 'Modulo Plegable - Fin'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'card'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'moduloplegable_final'],
                  ['data-input_calss', 'form-control input-lg'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'moduloplegable_final'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
                ['name' => 'Imagen Directa', 'parameters' => [
                  ['data-titulo', 'Imagen Directa'],
                  ['data-idTabla', $idHistoria],
                  ['data-div_class', 'form-group col-md-12'],
                  ['data-div_align', 'left'],
                  ['data-div_nombre_campo', ''],
                  ['data-input_type', 'imagen'],
                  ['data-input_calss', 'img img-responsive w-100'],
                  ['data-input_name', ''],
                  ['data-input_placeholder', ''],
                  ['data-input_required', 0],
                  ['data-tipoCampo', 'imagen'],
                  ['data-maxlength', ''],
                  ['data-orden', 0],
                  ['data-fecha', date('Y-m-d')],
                  ['data-hora', date('h:i:s')],
                  ['data-input_onChange', 0],
                  ['data-input_maxlength', ''],
                  ['data-input_oninput', ''],
                  ['data-id', 0],
                  ['data-estado', 1],
                  ['data-select_table', ''],

                ]],
              ];
              ?>
              <div class="list-group">
                <?php foreach ($arrayOpciones as $opcion) : ?>
                  <?php
                  // cuadrar todos los parametros en una variable sola
                  $parametros = '';
                  for ($i = 0; $i < count($opcion['parameters']); $i++) {
                    $parametros .= $opcion['parameters'][$i][0] . '="' . $opcion['parameters'][$i][1] . '"';
                  }
                  ?>
                  <div class="newWidget grid-stack-item" gs-w="<?= ($opcion['name'] == 'Modulo Plegable - Fin' || $opcion['name'] == 'Modulo Plegable - Inicio' ? '12' : '12') ?>" gs-h="2" <?= $parametros ?> <?= ($opcion['name'] == 'Modulo Plegable - Fin' || $opcion['name'] == 'Modulo Plegable - Inicio' ? 'gs-no-resize="true"' : '') ?>>
                    <div class="grid-stack-item-content" style="padding: 1rem;">
                      <div>
                        <span><strong><?= $opcion['name'] ?></strong></span>
                      </div>
                      <div class="inner-form"></div>
                    </div>
                  </div>
                  <div style="margin-top: 1rem;  border-top: 1px solid #bbb;  border-radius: 5px;"></div>
                <?php endforeach ?>
              </div>
              
            </div>
            <div class="card-footer">
              <button id="trash" class="btn btn-danger btn-block btn-lg">
                <i class="fas fa-trash-alt fa-lg"></i>
                <p>Suelta aquí para eliminar!</p>                 
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php include 'footer.php'; ?>

<script type="text/javascript">
  let grid = GridStack.init({
    cellHeight: 100,
    acceptWidgets: true,
    removable: '#trash', // arrastra aquí y se borra palco
    resizable: {
      handles: 'e'
    },
    disableOneColumnMode: true,
  });
  GridStack.setupDragIn('.newWidget', {
    appendTo: 'body',
    handle: '.grid-stack-item-content',
    helper: 'clone',
  });

  // cargar los elementos de la historia

  // organizar el grid
  grid.on('added removed change', function(e, items) {

    reOrdenarGrid();

    // // console.log(items);

    items.forEach(function(item) {
      // // console.log(item);
      // console.log(item.el.dataset);

      let data = item.el.dataset;
      data = Object.entries(data);
      console.log(data);
      // // console.log(item);
      let inner = item.el.children[0].children[1];
      let idCampo = (data[7][1] == '') ? Math.floor(Math.random() * 99999999999) : data[7][1];
      // fin attr item
      data[2][1] = 'form-group col-md-' + item.w; // ando 
      item.el.dataset.div_class = 'form-group col-md-' + item.w; // ando ;

      // actualizar estado solo si fue removido
      if (e.type == 'removed') {
        data[19][1] = 0;
        item.el.dataset.estado = 0;
      }

      formulario = `<form id="form-${idCampo}">`;
      for (let i = 0; i < data.length; i++) {
        formulario += `<input type="hidden" name="datos[${data[i][0]}]" value="${data[i][1]}">`;
      }
      if (data[5][1] != 'moduloplegable_final') {
        formulario += `<div class="form-group">
        <input type="text" class="form-control" name="nombreCampo" value="${data[4][1]}" onchange="actualizarDatosGrid('${idCampo}');" required placeholder="Nombre del campo">
      </div>`;
      }

      if (data[5][1] == 'select' || data[5][1] == 'selectmultiple') {
        formulario += `<div class="form-group">
        <small>Separar con [;;] cada valor, Ejemplo: opción 1;; Opción 2;; Opción 3</small>
          <input type="text" class="form-control" id="select" name="datos[${data[20][0]}]" value="${data[20][1]}" onchange="actualizarDatosGrid('${idCampo}');" required">
        </div>`;
      }
      if (data[5][1] == 'moduloplegable_inicio') {
        formulario += `<input type='hidden' name='datos[input_value]' value='<div class="col-md-12"><div class="card box box-primary" style="">
                       <div class="box-header with-border">
                         <h4 class="box-title">
                           <a data-toggle="collapse" data-parent="#accordion1" href="#${idCampo}">
                           ${data[4][1]}
                           </a>
                         </h4>
                       </div>
                       <div id="${idCampo}" class="card-collapse collapse">
 
                         <div class="box-body">'>`;
      }
      if (data[5][1] == 'moduloplegable_final') {
        formulario += `<input type="hidden" name="datos[input_value]" value="</div></div></div></div>" > `;
      }
      formulario += `</form>`;
      // console.log(item.el.children[0]);

      // ahora una preliminar de cada tipo de campo
      if (data[5][1] == 'text' || data[5][1] == 'date') {
        formulario += `<div class="form-group">
          <small>${data[5][1]}</small>
          <input type="${data[5][1]}" class="form-control" placeholder="Ejemplo de campo" disabled>        
        </div>`;
      }
      if (data[5][1] == 'number') {
        formulario += `<div class="form-group">
          <small>${data[5][1]}</small>
          <input type="${data[5][1]}" class="form-control" placeholder="1234" disabled>        
        </div>`;
      }
      if (data[5][1] == 'textarea') {
        formulario += `<div class="form-group">
          <small>${data[5][1]}</small>
          <${data[5][1]} class="form-control" disabled>Ejemplo de campo</${data[5][1]}>
        </div>`;
      }
      if (data[5][1] == 'file') {
        formulario += `<div class="form-group">
          <small>${data[5][1]}</small>
          <input type="file" class="form-control" disabled>
        </div>`;
      }
      if (data[5][1] == 'select') {
        // formulario += `<div class="form-group select2">
        //   <small>${data[5][1]}</small>
        //   <select class="form-control select2">
        //     <option value="1">Opción 1</option>
        //     <option value="2">Opción 2</option>
        //     <option value="3">Opción 3</option>
        //   </select>
        // </div>`;
      }
      if (data[5][1] == 'selectmultiple') {
        // formulario += `<div class="form-group">
        //   <small>${data[5][1]}</small>
        //   <select class="form-control select2 multiple" multiple>
        //     <option value="1">Opción 1</option>
        //     <option value="2">Opción 2</option>
        //     <option value="3">Opción 3</option>
        //   </select>
        // </div>`;
      }
      if (data[5][1] == 'separador') {
        formulario += `<div class="form-group">
          <small>Ejemplo</small>
          <h2>${data[4][1]}</h2>
        </div>`;
      }
      if (data[5][1] == 'moduloplegable_inicio') {
        formulario += `
        <div class='card box box-primary'>
                       <div class='box-header with-border'>
                         <h4 class='box-title'>
                           <a data-toggle='collapse' data-parent='#accordion1' href='#${idCampo}'>
                             Inicio modulo plegable
                           </a>
                         </h4>
                       </div>
                       <div id='${idCampo}' class='card-collapse collapse'>
 
                         <div class='box-body'>
                     `;
      }




      inner.innerHTML = formulario;

      // actualizar datos del grid
      if (e.type == 'added' || e.type == 'change') {
        actualizarDatosGrid(idCampo);
      }

      if (e.type == 'removed') {
        // // console.log('removed', data[19][1], item.el.dataset.estado);
        actualizarDatosGrid(idCampo);
      }
      // // actualizar datos del grid - fin


    });
  });
</script>

<script>
  $(document).ready(function() {

    let arregloParametros = [
      ['data-titulo', ''],
      ['data-idTabla', ''],
      ['data-div_class', ''],
      ['data-div_align', ''],
      ['data-div_nombre_campo', ''],
      ['data-input_type', ''],
      ['data-input_calss', ''],
      ['data-input_name', ''],
      ['data-input_placeholder', ''],
      ['data-input_required', 0],
      ['data-tipoCampo', ''],
      ['data-maxlength', ''],
      ['data-orden', 0],
      ['data-fecha', ''],
      ['data-hora', ''],
      ['data-input_onChange', 0],
      ['data-input_maxlength', ''],
      ['data-input_oninput', ''],
      ['data-id', 0],
      ['data-estado', ''],
      ['data-select_table', ''],

    ];

    let arrayDiv = <?= $arrayDivs ?>;
    // // // console.log(arrayDiv);
    // // // console.log(arrayDiv.length);
    for (let i = 0; i < arrayDiv.length; i++) {
      let dataInArray = arrayDiv[i];
      console.log('aqui voy ' + dataInArray);
      // dataInArray = Object.entries(dataInArray);

      let divParametros = '';
      for (let e = 0; e < arregloParametros.length; e++) {
        console.log(arregloParametros[e][0], arregloParametros[e][0].substr(5), dataInArray[arregloParametros[e][0].substr(5)]);

        divParametros += `${arregloParametros[e][0]}="${dataInArray[arregloParametros[e][0].substr(5)]}" `;
      }

      let div = `
      <div class="newWidget grid-stack-item" gs-w="${arrayDiv[i]['div_class'].split('-')[3]}" gs-h="2" ${divParametros}>
        <div class="grid-stack-item-content" style="padding: 1rem;" >
          <div>
            <span><strong>${arrayDiv[i]['titulo']}</strong></span>
          </div>
          <div class="inner-form">
          </div>
        </div>
      </div>
      `;
      grid.addWidget(div);
    }
  })
</script>

<script>
  function actualizarDatosGrid(id) { // // console.log(id);
    let targetForm = $('#form-' + id);
    let elPapa = targetForm[0].parentElement.parentElement.parentElement;
    let nombre = '';

    if ($('#form-' + id + ' [name="nombreCampo"]')[0]) {
      nombre = $('#form-' + id + ' [name="nombreCampo"]')[0].value;
    }


    // si hay un id dentro del formulario que sea select
    if ($('#form-' + id + ' [id="select"]')[0]) {
      let select = ($('#form-' + id + ' [id="select"]')[0].value);
      targetForm.find('[name="datos[select_table]"]').val(select);
      elPapa.dataset.select_table = select;
    }

    let name = 'x' + nombre.toLowerCase().replace(/\s+/g, '') + Math.floor(Math.random() * 99999999999);

    targetForm.find('[name="datos[div_nombre_campo]"]').val(nombre);
    elPapa.dataset.div_nombre_campo = nombre;

    // si el id solo es numerico entonces se cambia por el name pero si es alfanumerico entonces no se cambia
    let tipo;
    let idUpdate;
    if (isNaN(id)) {
      // si es alfanumerico entonces no se cambia
      tipo = 2; // automaticForm para aActualizar campo
      idUpdate = elPapa.dataset.id;

    } else {
      targetForm.find('[name="datos[input_name]"]').val(name);
      elPapa.dataset.input_name = name;
      tipo = 1; // automaticForm para insertar nuevo campo
      idUpdate = '';

      document.getElementById('form-' + id).id = 'form-' + name;
      targetForm.find('[onchange]').attr('onchange', `actualizarDatosGrid('${name}')`);
    }

    // actualizar o insertar
    // para crear los campos
    // new formData
    formData = new FormData();
    formData.append(`datos[${targetForm.find('[name="datos[input_name]"]').val()}]`, '');
    $.ajax(
      `./plugins/automaticForm/automaticForm.php?table=<?= $rowConfigTablas['name'] ?>&type=2&idUpdate=&db=<?= $NOMBRE_DB_GLOBAL ?>`, {
        type: "POST",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
      }
    );

    $.ajax(
      `./plugins/automaticForm/automaticForm.php?table=configTablaDetalle&type=${tipo}&idUpdate=${idUpdate}&db=<?= $NOMBRE_DB_GLOBAL ?>`, {
        type: "POST",
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        data: new FormData(targetForm[0]),
        success: function(data) {
          if (data.status == true && data.FAID != undefined) {
            // con el resultado actualizamos el id en el grid
            targetForm.find('[name="datos[id]"]').val(atob(data.FAID));
            elPapa.dataset.id = atob(data.FAID);

          }
        }
      }
    );



    // fin ajax 

    reOrdenarGrid();
  }
</script>

<script>
  function reOrdenarGrid() {
    // buscar todos los elementos del grid y guardar el x y el y en un array
    let arrayGridBox = [];
    grid.el.querySelectorAll('.grid-stack-item').forEach(item => {
      let attrs = item.attributes;
      // en item hay dos atributos gs-x y gs-y     
      arrayGridBox.push({
        x: parseInt(attrs['gs-x'].value),
        y: parseInt(attrs['gs-y'].value),
      });
    })

    // ordenar el array de menor a mayor, esto para saber quien esta de primero y poder ordenar los campos
    arrayGridBox.sort(function(a, b) {
      if (a.y === b.y) {
        return a.x - b.x;
      }
      return a.y - b.y;
    });

    for (let i = 0; i < arrayGridBox.length; i++) {
      grid.el.querySelector('[gs-x="' + arrayGridBox[i].x + '"][gs-y="' + arrayGridBox[i].y + '"]').dataset['orden'] = i;
    }
  }
</script>



<!-- Modal -->
<div class="modal fade" id="modalCampo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar campo </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>