<?php
session_start();
include '../../../whatsappPersonalizadoList.php';
include '../buscarWhatsapp.php';
include '../../funciones/conn3.php';

if ($tieneWhatsApp == true) {
  // se consulta 
  $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
  $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: $denysServer

  // conexion a denysbot
  // $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');
  // conexion denys nueva 16 10 2023
  $connDenys = mysqli_connect("$denysServer:3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema");
  // var_dump($connDenys);

  $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
  $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
  $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
  // si hay resultados armamos la conexión al cliente
  if (mysqli_num_rows($resultConsultaDenys) > 0) {
    // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
    $connDenysCliente = mysqli_connect("$denysServer:3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
  }
} else {
  echo '
  <script>
      alert("No tienes WhatsApp personalizado Activo");
      window.location.href="portada";
  </script>
  ';
}

// saludo
$querychat_saludo = mysqli_query($connDenysCliente, "SELECT * FROM chat_saludo where activo = 1 limit 1");
$fetchchat_saludo = mysqli_fetch_array($querychat_saludo);

// buscar el bot que vamos a modificar
$idBot = base64_decode($_GET['iB']);
$queryBotHeader = mysqli_query($connDenysCliente, "SELECT * FROM chat_menu_header where id = '{$idBot}' limit 1");
$rowBotHeader = mysqli_fetch_array($queryBotHeader);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Denysbot - Diagrama de BOT</title>
  <!-- bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-language_tools.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ext-themelist.js"></script>
</head>

<body>
  <script src="moduloMasivos/denysbot/dist/drawflow.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="moduloMasivos/denysbot/src/drawflow.css" />
  <link rel="stylesheet" type="text/css" href="moduloMasivos/denysbot/docs/beautiful.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>



  <header>
    <h2><?= $_SESSION['NOMBRE_USUARIO'] ?>
      <span class="text-muted"> / <?= $rowConsultaDenys['id_denys'] ?>-<?= $rowConsultaDenys['name_denys'] ?> </span>
    </h2>
  </header>
  <div class="wrapper">

    <div class="col">
      <div class="p-1 text-muted d-none d-md-block">
        <p>Arrastra y suelta las <strong>Herramientas</strong> a la pantalla para modificar las interacciones del BOT.</p>
      </div>
      <?php
      $options = [
        ['titulo' => 'Saludo', 'icono' => 'fas fa-handshake'],
        ['titulo' => 'Mensaje', 'icono' => 'fas fa-comment-dots'],
        ['titulo' => 'Opción', 'icono' => 'fas fa-question-circle'],
        ['titulo' => 'Formulario', 'icono' => 'fas fa-file-signature'],
        ['titulo' => 'Chatea con un usuario', 'icono' => 'fas fa-comments'],
        // ['titulo' => 'Registro de paciente', 'icono' => 'fas fa-user-plus'],
        // ['titulo' => 'Agendar una cita', 'icono' => 'fas fa-calendar-plus'],
      ];
      ?>
      <?php foreach ($options as $option) : ?>
        <div class="drag-drawflow p-0 m-0" draggable="true" ondragstart="drag(event)" data-node="<?= $option['titulo'] ?>" title="<?= $option['titulo'] ?>">
          <i style="opacity: 0.5" class="<?= $option['icono'] ?>" title="<?= $option['titulo'] ?>"></i><span> <?= $option['titulo'] ?></span>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-right">
      <div class="menu">
        <ul>
          <li class="selected">Diagrama del BOT</li>
        </ul>
      </div>
      <div id="drawflow" ondrop="drop(event)" ondragover="allowDrop(event)">
        <!-- <div class="btn-export" onclick="Swal.fire({ title: 'Export',
        html: '<pre><code>'+JSON.stringify(editor.export(), null,4)+'</code></pre>'
        })">Export</div> -->
        <div class="btn-export" onclick="guardarBot();">Guardar</div>
        <div class="btn-clear" onclick="editor.clearModuleSelected()">Borrar Todo</div>
        <div class="btn-lock">
          <i id="lock" class="fas fa-lock" onclick="editor.editor_mode='fixed'; changeMode('lock');"></i>
          <i id="unlock" class="fas fa-lock-open" onclick="editor.editor_mode='edit'; changeMode('unlock');" style="display:none;"></i>
        </div>
        <div class="bar-zoom">
          <i style="font-size:20px !important;" class="fas fa-search-minus" onclick="editor.zoom_out()"></i>
          <i style="font-size:20px !important; width:auto;" class="fas fa-search" onclick="editor.zoom_reset()"></i>
          <i style="font-size:20px !important; width:auto;" class="fas fa-search-plus" onclick="editor.zoom_in()"></i>
        </div>
      </div>
    </div>
  </div>

  <script>
    var id = document.getElementById("drawflow");
    const editor = new Drawflow(id);
    editor.reroute = true;
    editor.reroute_fix_curvature = true;
    editor.force_first_input = false;

    /*
      editor.createCurvature = function(start_pos_x, start_pos_y, end_pos_x, end_pos_y, curvature_value, type) {
        var center_x = ((end_pos_x - start_pos_x)/2)+start_pos_x;
        return ' M ' + start_pos_x + ' ' + start_pos_y + ' L '+ center_x +' ' +  start_pos_y  + ' L ' + center_x + ' ' +  end_pos_y  + ' L ' + end_pos_x + ' ' + end_pos_y;
      }*/

    var dataToImportHeader = <?= (base64_decode($rowBotHeader['json']) != null ? base64_decode($rowBotHeader['json']) : '0') ?>;
    // console.log(dataToImportHeader);

    if (dataToImportHeader != 0) {
      const dataToImport = dataToImportHeader;

      // ahora vamos a ver dentro de drawflow, home, data, recorrer cada elemento
      // console.log(Object.entries(dataToImport['drawflow']['Home']['data']));
      for (const [key, value] of Object.entries(dataToImport['drawflow']['Home']['data'])) {
        // console.log(key, value);
        // si el name es formulario, entonces es un input
        if (value['name'] == 'formulario') {

          // if dataToImport['drawflow']['Home']['data'][key]['html'] contains "<div class="box edited">"
          for (const [keyData, valueData] of Object.entries(value['data']['pregunta'])) {
            let insertar = '';
            // console.log(keyData, valueData);
            insertar += `<div class="input-group mb-3 esPregunta px-3" bis_skin_checked="1"><div class="input-group-prepend" bis_skin_checked="1"></div><input type="text" class="form-control input-lg" placeholder="Pregunta" name="pregunta[]" df-pregunta-${keyData}="" value="${valueData}"></div>`;

            // buscar insertar en dataToImport['drawflow']['Home']['data'][key]['html'] antes de concatenar
            if (dataToImport['drawflow']['Home']['data'][key]['html'].includes(`df-pregunta-${keyData}`)) {
              // no se concatena
            } else {
              // se concatena              
              dataToImport['drawflow']['Home']['data'][key]['html'] += insertar;
            }
          }
        }
      }
      editor.start();
      editor.import(dataToImport);
    } else {
      const dataToImport = {
        "drawflow": {
          "Home": {
            "data": {
              "1": {
                "id": 1,
                "name": "welcome",
                "data": {},
                "class": "welcome",
                "html": "\n    <div>\n      <div class=\"title-box\">👏 Hola!!</div>\n      <div class=\"box\">\n        <p>Bienvenido al editor de flujo para su BOT de <strong>WhatsApp</strong>, utilizando las herramientas del panel lateral puede agregar, modificar y eliminar acciones para controlar las interacciones del BOT.</p><br><p class='text-muted'>Puede quitar este y cualquier cuadro pulsando click derecho sobre el mismo y luego en el icono (X)</p>",
                "typenode": false,
                "inputs": {},
                "outputs": {},
                "pos_x": 25,
                "pos_y": 25
              },
            }
          },
        }
      }
      editor.start();
      editor.import(dataToImport);
    }






    /*
    var welcome = `
    <div>
      <div class="title-box">👏 Welcome!!</div>
      <div class="box">
        <p>Simple flow library <b>demo</b>
        <a href="https://github.com/jerosoler/Drawflow" target="_blank">Drawflow</a> by <b>Jero Soler</b></p><br>

        <p>Multiple input / outputs<br>
           Data sync nodes<br>
           Import / export<br>
           Modules support<br>
           Simple use<br>
           Type: Fixed or Edit<br>
           Events: view console<br>
           Pure Javascript<br>
        </p>
        <br>
        <p><b><u>Shortkeys:</u></b></p>
        <p>🎹 <b>Delete</b> for remove selected<br>
        💠 Mouse Left Click == Move<br>
        ❌ Mouse Right == Delete Option<br>
        🔍 Ctrl + Wheel == Zoom<br>
        📱 Mobile support<br>
        ...</p>
      </div>
    </div>
    `;
    */


    //editor.addNode(name, "typenode": false,  inputs, outputs, posx, posy, class, data, html);
    /*editor.addNode('welcome', 0, 0, 50, 50, 'welcome', {}, welcome );
    editor.addModule('Other');
    */

    // Events!
    editor.on('nodeCreated', function(id) {
      // console.log("Node created " + id);
    })

    editor.on('nodeRemoved', function(id) {
      // console.log("Node removed " + id);
    })

    editor.on('nodeSelected', function(id) {
      // console.log("Node selected " + id);
    })

    editor.on('moduleCreated', function(name) {
      // console.log("Module Created " + name);
    })

    editor.on('moduleChanged', function(name) {
      // console.log("Module Changed " + name);
    })

    editor.on('connectionCreated', function(connection) {
      // console.log('Connection created');
      // console.log(connection);
    })

    editor.on('connectionRemoved', function(connection) {
      // console.log('Connection removed');
      // console.log(connection);
    })
    /*
        editor.on('mouseMove', function(position) {
          console.log('Position mouse x:' + position.x + ' y:'+ position.y);
        })
    */
    editor.on('nodeMoved', function(id) {
      // console.log("Node moved " + id);
    })

    editor.on('zoom', function(zoom) {
      // console.log('Zoom level ' + zoom);
    })

    editor.on('translate', function(position) {
      // console.log('Translate x:' + position.x + ' y:' + position.y);
    })

    editor.on('addReroute', function(id) {
      // console.log("Reroute added " + id);
    })

    editor.on('removeReroute', function(id) {
      // console.log("Reroute removed " + id);
    })
    /* DRAG EVENT */

    /* Mouse and Touch Actions */

    var elements = document.getElementsByClassName('drag-drawflow');
    for (var i = 0; i < elements.length; i++) {
      elements[i].addEventListener('touchend', drop, false);
      elements[i].addEventListener('touchmove', positionMobile, false);
      elements[i].addEventListener('touchstart', drag, false);
    }

    var mobile_item_selec = '';
    var mobile_last_move = null;

    function positionMobile(ev) {
      mobile_last_move = ev;
    }

    function allowDrop(ev) {
      ev.preventDefault();
    }

    function drag(ev) {
      if (ev.type === "touchstart") {
        mobile_item_selec = ev.target.closest(".drag-drawflow").getAttribute('data-node');
      } else {
        ev.dataTransfer.setData("node", ev.target.getAttribute('data-node'));
      }
    }

    function drop(ev) {
      if (ev.type === "touchend") {
        var parentdrawflow = document.elementFromPoint(mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY).closest("#drawflow");
        if (parentdrawflow != null) {
          addNodeToDrawFlow(mobile_item_selec, mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY);
        }
        mobile_item_selec = '';
      } else {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("node");
        addNodeToDrawFlow(data, ev.clientX, ev.clientY);
      }
    }

    function addNodeToDrawFlow(name, pos_x, pos_y) {
      if (editor.editor_mode === 'fixed') {
        return false;
      }
      pos_x = pos_x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)) - (editor.precanvas.getBoundingClientRect().x * (editor.precanvas.clientWidth / (editor.precanvas.clientWidth * editor.zoom)));
      pos_y = pos_y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)) - (editor.precanvas.getBoundingClientRect().y * (editor.precanvas.clientHeight / (editor.precanvas.clientHeight * editor.zoom)));

      const options = [{
          titulo: 'Saludo',
          icono: 'fas fa-handshake'
        },
        {
          titulo: 'Mensaje',
          icono: 'fas fa-comment-dots'
        },
        {
          titulo: 'Opción',
          icono: 'fas fa-question-circle'
        },
        {
          titulo: 'Formulario',
          icono: 'fas fa-file-signature'
        },
        {
          titulo: 'Chatea con un usuario',
          icono: 'fas fa-comments'
        },
        {
          titulo: 'Registro de paciente',
          icono: 'fas fa-user-plus'
        },
        {
          titulo: 'Agendar una cita',
          icono: 'fas fa-calendar-plus'
        },
      ];

      // según el name buscarlo en options
      const option = options.find(item => item.titulo === name);

      switch (name) {

        case 'Saludo':
          var Saludo = `
        <div>
          <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
          <div class="box">
            <p><?= $fetchchat_saludo['descripcion'] ?></p>
          </div>
        </div>
        `;
          editor.addNode('Saludo', 0, 1, pos_x, pos_y, 'Saludo', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'titulo': '',
            'tipo': '2',
            'hashtag': '',
            'mensaje': ''
          }, Saludo);
          break;

        case 'Mensaje':
          var mensaje = `
            <div>
              <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
              <div class="box">
                <textarea df-mensaje></textarea>
                Envía un mensaje personalizado
              </div>
            </div>
            `;
          editor.addNode('mensaje', 1, 1, pos_x, pos_y, 'mensaje', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'titulo': '',
            'tipo': '2',
            'hashtag': '',
            'mensaje': ''
          }, mensaje);
          break;

        case 'Opción':
          var opcion = `
          <div>
            <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
            <div class="box">
              <p>Digite la opción</p>
              <input type="text" df-hashtag placeholder="Ej: 1, 2, 3">
              <p>Titulo para la Opción</p>
              <input type="text" df-titulo placeholder="Titulo">
            </div>
          </div>
          `;
          editor.addNode('opcion', 1, 1, pos_x, pos_y, 'opcion', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'tipo': '1',
            'hashtag': '',
            'titulo': '',
            'mensaje': ''
          }, opcion);
          break;


        case 'Formulario':
          var formulario = `
        <div>
          <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
          <div class="box">
            <p>Nombre del Formulario</p>
            <input type="text" df-nodeForm placeholder="Nombre">
            <button class="btn btn-primary btn-block mt-3" onclick="agregarPregunta(this)">
              Nueva Pregunta
            </button>
            <hr>
            <p class="text-muted">Para retirar una pregunta solo deje el espacio de esta en blanco y esta no sera cargada</p>
          </div>
        </div>
        `;
          editor.addNode('formulario', 1, 1, pos_x, pos_y, 'formulario', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'tipo': '3',
            'hashtag': '',
            'titulo': '',
            'mensaje': '',
            'nodeFormName': `${option.titulo +'_'+ Math.floor(Math.random() * 999999999)}`
          }, formulario);
          break;

        case 'Chatea con un usuario':
          var opcion = `
          <div>
            <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
            <div class="box">
              <p>Palabra clave para activar opciones de chat</p>
              <input type="text" df-hashtag placeholder="Ej: chat">
              <p>Mensaje informativo</p>
              <textarea df-titulo></textarea>
              <p class="text-muted">Ej: Solicita atención personalizada escribiendo *<strong>palabra clave<strong>*</p>
            </div>
          </div>
          `;
          editor.addNode('salaChat', 1, 0, pos_x, pos_y, 'salaChat', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'tipo': '1',
            'hashtag': '',
            'titulo': '',
            'mensaje': ''
          }, opcion);
          break;

        case 'Registro de paciente':
          var formulario = `
        <div>
          <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
          <div class="box">
            <p class="text-muted">Este registro guardara la información directamente en la base de datos de pacientes</p>
            <hr>
            <p>Datos del paciente</p>
            <ul>
              <li>Documento.</li>
              <li>Nombre Completo.</li>
              <li>Dirección.</li>
              <li>Correo.</li>
              <li>Teléfono.</li>
            </ul>
          </div>
        </div>
        `;
          editor.addNode('registroPaciente', 1, 1, pos_x, pos_y, 'registroPaciente', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'tipo': '3',
            'hashtag': '',
            'titulo': '',
            'mensaje': '',
            'nodePregunta': 'Documento|/|Nombre completo|/|Dirección|/|Correo|/|Teléfono',
            'codigo': '<?= $dbname ?>',
            'nodeForm': 'Registro de paciente',
            'nodeFormName': `${'RegistroPaciente_'+ Math.floor(Math.random() * 999999999)}`
          }, formulario);
          break;

        case 'Agendar una cita':
          var mensaje = `
            <div>
              <div class="title-box"><i class="${option.icono}"></i> ${option.titulo}</div>
              <div class="box">
                <p class="text-muted">Este registro sirve para agendar una cita medical a un paciente</p>
                <hr>
                <p>Información solicitada</p>
                <ul>
                  <li>Especialista</li>
                  <li>Fecha.</li>
                  <li>Hora.</li>
                  <li>Nombre paciente.</li>
                  <li>Correo.</li>
                  <li>Motivo de consulta.</li>
                </ul>
              </div>
            </div>
            `;
          editor.addNode('agendarCita', 1, 1, pos_x, pos_y, 'agendarCita', {
            'estado': '1',
            'codigoPrincipal': '0',
            'refCodigo': '0',
            'titulo': '',
            'tipo': '2',
            'hashtag': '',
            'mensaje': '',
            'codigo': '<?= $dbname ?>',
          }, mensaje);
          break;



        default:
      }
    }

    var transform = '';

    function showpopup(e) {
      e.target.closest(".drawflow-node").style.zIndex = "9999";
      e.target.children[0].style.display = "block";
      //document.getElementById("modalfix").style.display = "block";

      //e.target.children[0].style.transform = 'translate('+translate.x+'px, '+translate.y+'px)';
      transform = editor.precanvas.style.transform;
      editor.precanvas.style.transform = '';
      editor.precanvas.style.left = editor.canvas_x + 'px';
      editor.precanvas.style.top = editor.canvas_y + 'px';
      // console.log(transform);

      //e.target.children[0].style.top  =  -editor.canvas_y - editor.container.offsetTop +'px';
      //e.target.children[0].style.left  =  -editor.canvas_x  - editor.container.offsetLeft +'px';
      editor.editor_mode = "fixed";

    }

    function closemodal(e) {
      e.target.closest(".drawflow-node").style.zIndex = "2";
      e.target.parentElement.parentElement.style.display = "none";
      //document.getElementById("modalfix").style.display = "none";
      editor.precanvas.style.transform = transform;
      editor.precanvas.style.left = '0px';
      editor.precanvas.style.top = '0px';
      editor.editor_mode = "edit";
    }

    function changeModule(event) {
      var all = document.querySelectorAll(".menu ul li");
      for (var i = 0; i < all.length; i++) {
        all[i].classList.remove('selected');
      }
      event.target.classList.add('selected');
    }

    function changeMode(option) {

      //console.log(lock.id);
      if (option == 'lock') {
        lock.style.display = 'none';
        unlock.style.display = 'block';
      } else {
        lock.style.display = 'block';
        unlock.style.display = 'none';
      }

    }
  </script>

  <!-- <script>
    function agregarPregunta(div){
      var input = document.createElement('input');
      input.type = 'text';
      input.placeholder = 'Pregunta';
      input.name = 'pregunta[]';
      input.classList.add('form-control');
      // ahora un botoncito para borrar
      var button = document.createElement('button');
      button.type = 'button';
      button.classList.add('btn');
      button.classList.add('btn-danger');
      button.classList.add('btn-sm');
      button.classList.add('borrar');
      button.innerHTML = 'X';
      button.onclick = function(){
        div.parentElement.removeChild(input);
        div.parentElement.removeChild(button);
      };      
      div.parentElement.appendChild(input);
      div.parentElement.appendChild(button);
    }
  </script> -->

  <script>
    function agregarPregunta(div) {
      // el ultimo elemento con atributo 'df-pregunta-'
      var preguntas = document.querySelectorAll('[name="pregunta[]"]');
      // cual es el ultimo?
      var numPreguntas = preguntas.length;
      var ultimaPregunta = preguntas[(numPreguntas == 0) ? 0 : numPreguntas - 1];
      if (ultimaPregunta != undefined) {
        var num = parseInt(ultimaPregunta.attributes[4].name.split('-')[2]) + 1;
      } else {
        var num = 1;
      }


      var inputGroup = document.createElement('div');
      inputGroup.classList.add('input-group');
      inputGroup.classList.add('mb-3'); // Agrega la clase "mb-3" al div principal
      inputGroup.classList.add('esPregunta');
      inputGroup.classList.add('px-3');

      var inputGroupPrepend = document.createElement('div');
      inputGroupPrepend.classList.add('input-group-prepend');

      // var span = document.createElement('span');
      // span.classList.add('input-group-text');
      // span.classList.add('p-0');
      // span.classList.add('px-2');
      // span.innerHTML = 'x';


      var input = document.createElement('input');
      input.type = 'text';
      input.classList.add('form-control');
      input.classList.add('input-lg');
      input.placeholder = 'Pregunta';
      input.name = 'pregunta[]';
      input.setAttribute('df-pregunta-' + num, '');



      // inputGroupPrepend.appendChild(span);
      inputGroup.appendChild(inputGroupPrepend);
      inputGroup.appendChild(input);

      // span.onclick = function(){
      //     input.value = '';
      //     div.parentElement.parentElement.parentElement.removeChild(inputGroup);          
      //   };  

      div.parentElement.parentElement.parentElement.appendChild(inputGroup);
    }
  </script>

  <script>
    function guardarBot() {
      const data = editor.export();
      // enviar esto por post a un php
      let form = document.createElement('form');
      form.method = 'POST';
      form.action = './moduloMasivos/cargarBot.php';
      form.style.display = 'none';
      let input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'data';
      input.value = JSON.stringify(data);
      form.appendChild(input);
      document.body.appendChild(form);
      let input2 = document.createElement('input');
      input2.type = 'hidden';
      input2.name = 'iB';
      input2.value = '<?= ($rowBotHeader != null ? $rowBotHeader['id'] : 0) ?>';
      form.appendChild(input2);
      form.submit();
    }
  </script>

</body>

</html>