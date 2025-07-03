<!-- --------------------------------------- -->
<!-- todo lo adicional, pagination, plugins  -->
<!-- --------------------------------------- -->

<!-- 20 06 2026 - JRodriguez -->
<!-- automaticForm -->
<!-- agrego plugins automaticForm para cruds automáticos -->
<script src="plugins/automaticForm/personalizado.js"></script>
<script src="plugins/automaticForm/automaticForm.js"></script>
<script src="plugins/automaticForm/tokenMaster.js"></script>
<script src="plugins/automaticForm/systemConfigForm.js"></script>
<!-- 20 06 2026 - JRodriguez -->




<!-- page script -->
<script>
  // spinner para cargar
  // Crear el div del loader
  var loader = document.createElement("div");
  loader.id = "loader";
  document.body.appendChild(loader);

  // Establecer los estilos del loader
  loader.style.position = "fixed";
  loader.style.top = "0";
  loader.style.left = "0";
  loader.style.width = "100%";
  loader.style.height = "100%";
  loader.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
  loader.style.zIndex = "9999";
  loader.style.display = "none";
  loader.style.justifyContent = "center";
  loader.style.alignItems = "center";

  // Crear el contenido del loader
  var spinner = document.createElement("div");
  spinner.style.width = "40px";
  spinner.style.height = "40px";
  spinner.style.borderRadius = "50%";
  spinner.style.border = "4px solid #f3f3f3";
  spinner.style.borderTop = "4px solid #3498db";
  spinner.style.animation = "spin 1s linear infinite";
  loader.appendChild(spinner);

  // Función para mostrar el loader
  function mostrarLoader() {
    console.log("mostrar loader");
    loader.style.display = "flex";
  }

  // Función para ocultar el loader
  function ocultarLoader() {
    loader.style.display = "none";
  }


  $(function() {

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    //Initialize Select2 Elements
    <?php if (!isset($javascriptocultarselect)) { ?>
      $(".select2").select2();
      // maraña para el select2 2.0
      let forceFocusFn = function() {
        // aja agarramos el input del select 2 que va saliendo
        var searchInput = document.querySelector('.select2-container--open .select2-search__field');
        // y si existe se hace focus
        if (searchInput)
          searchInput.focus();
      };

      // cada que se abre un select2 lo escuchamos para mandar la funcion con un timeout por si las dudas
      $(document).on('select2:open', () => {
        setTimeout(() => forceFocusFn(), 200);
      });

    <?php } ?>
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      "placeholder": "dd/mm/yyyy"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      "placeholder": "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      format: 'MM/DD/YYYY h:mm A'
    });
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });



  });
</script>
<script type="text/javascript">
  for (let index = 0; index < 5; index++) { // que primero busque entre los primeros 4 para ejecutarse porque ta pesao el codigo y se pone lento todo
    if (document.getElementById(`editor${index}`)) {
      for (var i = 1; i <= 50; i++) {
        // editor
        CKEDITOR.replace('editor' + [i]);
        $(".textarea").wysihtml5();
      }
    }
  }
</script>

<script>
  for (var t = 1; t <= 10; t++) {
    $('#example' + [t]).DataTable({
      responsive: true,
      responsivePriority: 1,
      dom: 'Bfrtip',
      buttons: [{
        extend: 'collection',
        text: '<i class="fa fa-cog" aria-hidden="true"></i>',
        className: 'btn btn-primary',
        buttons: [{
            extend: 'print',
            text: 'Imprimir',
            title: 'Pacientes',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            text: 'Copiar',
            title: 'Pacientes',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            text: 'Excel',
            title: 'Pacientes',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            text: 'CSV',
            title: 'Pacientes',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdf',
            text: 'PDF',
            title: 'Pacientes',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pageLength'
          },
          {
            extend: 'colvis',
            text: 'Modificar Columnas'
          }
        ]
      }],
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      },
    });
  }
</script>

<!-- Esteban -->
<script>
  $(function() {
    document.querySelectorAll("[maxLength]").forEach(maxLength => {
      maxLength.setAttribute("onInput", "Maxlength(this);" + (maxLength.getAttribute("onInput") !== null ? maxLength.getAttribute("onInput") : ''));
    });
  });

  function Maxlength(campo) {
    if (campo.value.length >= campo.maxLength) {
      campo.value = campo.value.slice(0, campo.maxLength);
    }
  }
</script>
<script>
  /*
  $(function() {
    document.querySelectorAll("img[src]").forEach(allImg => {
      allImg.onerror = function(e) {
        // allImg.src = "img/sievensoft.jpeg"; // imagen por defecto para las imagenes rotas
        allImg.src = "img/sievensoft.png"; // imagen por defecto para las imagenes rotas
      }
    });
  });*/


  $(function() {
    document.querySelectorAll("img[src]").forEach(allImg => {
      if (!allImg.classList.contains("nocargarimagenpredeterminada")) {
        allImg.onerror = function(e) {
          allImg.src = "isologoDental.png";
          // allImg.title = "Ero"; // imagen por defecto para las imágenes rotas
          // allImg.src = "img/sievensoft.png"; // imagen por defecto para las imágenes rotas
        }
      }
    });
  });
</script>
<!-- Esteban -->

<script>
  function closeNav() {
    // verificar si existe un localstorage
    if (localStorage.getItem("nav") == "-") {
      localStorage.setItem('nav', 'sidebar-collapse');
      // $('body').classList.add('sidebar-collapse');
      document.querySelector('div[class="info"]').style.whiteSpace = "nowrap";
    } else {
      localStorage.setItem('nav', '-');
      document.querySelector('div[class="info"]').style.whiteSpace = "normal";
    }
    // const tituloMenu = document.querySelector('#tituloMenu');
    // if (tituloMenu.style.writingMode == "vertical-lr") {
    //   tituloMenu.style.writingMode = "horizontal-tb";
    // } else {
    //   tituloMenu.style.writingMode = "vertical-lr";
    // }
    // if (tituloMenu.style.textOrientation == "upright") {
    //   tituloMenu.style.textOrientation = "sideways";
    // } else {
    //   tituloMenu.style.textOrientation = "upright";
    // }
  }
</script>
<script>
  $(document).ready(function() {
    // cambiar clases del body
    document.querySelector('body').classList.toggle(localStorage.getItem("nav"));
  })
</script>

<script>
  $(document).ready(function() {
    // clientes periodo de prueba
    // tiene 3 Dias de demo desde la fecha de su registro
    let cuantos = '<?= $pacientesRegistrados ?>';
    let activo = '<?= $_SESSION['ACTIVO'] ?>';
    // - 3 dias
    let hoy = '<?= date('Y-m-d H:i:s') ?>';
    let fecha = '<?= date('Y-m-d H:i:s', strtotime("+3 day", strtotime(funcionMaster($_SESSION['ID'], 'ID', 'fec_ingreso', 'usuarios')))) ?>';
    let usuario = '<?= $_SESSION['NOMBRE_USUARIO'] ?>';

    // console.log('fecha '+fecha);
    // console.log('hoy '+hoy);

    if (usuario != 'admin' || usuario != 'master' || usuario != 'estetica') {
      // console.log('1');
      if (activo == 1) {
        // console.log('2');
        // validar si ya pasaron 3 Dias
        if (1 == 2) {
          if (confirm('Ha terminado su periodo de prueba de 3 Dias, por favor adquiera una licencia para continuar con el servicio.')) {
            window.location.href = "https://ofertasmedicalsoft.com/demos/plan?id=6&ts=81&tp=85&u=1&t=2";
          } else {
            window.location.href = "https://ofertasmedicalsoft.com/demos/plan?id=6&ts=81&tp=85&u=1&t=2";
          }
        }
      }
    }
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {
    // esto va en el footer
    //tabla inteligente
    if (typeof data_table !== 'undefined') {
      var Tabla_Inteligente = $('#Tabla_Rapida_MP').DataTable({

        data: data_table,
        deferRender: true,
        responsive: true,
        processing: true,
        paging: true,
        autoWidth: false,
        responsivePriority: 1,
        lengthMenu: [10, 20, 50, 100, 200, 500],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          buttons: {
            pageLength: {
              _: "Mostrando %d <br> Elementos",
              '-1': "Ver Todo"
            }
          }
        },

        dom: 'Bfrtip',
        buttons: [{
          extend: 'collection',
          text: '<i class="fa fa-cog" aria-hidden="true"></i>',
          className: 'btn Config',
          buttons: [{
              extend: 'print',
              text: 'Imprimir',
              title: titulo_tabla,
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'copy',
              text: 'Copiar',
              title: titulo_tabla,
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'excel',
              text: 'Excel',
              title: titulo_tabla,
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'csv',
              text: 'CSV',
              title: titulo_tabla,
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pdf',
              text: 'PDF',
              title: titulo_tabla,
              exportOptions: {
                columns: ':visible'
              }
            },
            {
              extend: 'pageLength'
            },
            {
              extend: 'colvis',
              text: 'Modificar Columnas'
            }
          ]
        }],

      });
    }


    if (typeof query_tabla_ajax !== 'undefined') {
      $(document).ready(function() {

        var dataTable1 = $('#Tabla_Rapida_AJAX').DataTable({

          deferRender: true,
          responsive: true,
          processing: true,
          paging: true,
          autoWidth: false,
          responsivePriority: 1,
          lengthMenu: [10, 20, 50, 100, 200, 500],
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            },
            buttons: {
              pageLength: {
                _: "Mostrando %d <br> Elementos",
                '-1': "Ver Todo"
              }
            }
          },

          dom: 'Bfrtip',
          buttons: [{
            extend: 'collection',
            text: '<i class="fa fa-cog" aria-hidden="true"></i>',
            className: 'btn Config',
            buttons: [{
                extend: 'print',
                text: 'Imprimir',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'copy',
                text: 'Copiar',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'excel',
                text: 'Excel',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'csv',
                text: 'CSV',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'pdf',
                text: 'PDF',
                title: titulo_tabla,
                exportOptions: {
                  columns: ':visible'
                }
              },
              {
                extend: 'pageLength'
              },
              {
                extend: 'colvis',
                text: 'Modificar Columnas'
              }
            ]
          }],
          "ajax": {
            url: "Ajax_Tabla_Rapida.php",
            type: "post",
            data: {
              query: query_tabla_ajax,
              columnas: columnas
            }
          },
          "columns": columnastablas,
        });
      });
    }
  });
  // fin de tabla inteligente
</script>

<script>
  $(document).ready(function() {
    // cambiar tema
    let tema = '<?= $_SESSION['tema'] ?>';
    if (tema != '' && tema != null) {
      $('[id="topNav"]').attr('class', 'main-header navbar navbar-expand navbar-light bg-' + tema);
      $('.botonSearch').attr('class', 'input-group botonSearch p-1 br-1 rounded bg-' + tema);
      $('[id="logoNav"]').attr('class', 'brand-link bg-' + tema);
      $('[id="temaNav"]').attr('class', 'custom-select mb-3 bg-' + tema);
    }
  })
</script>
<script>
  function funcionMaster(filtro, campoFiltrar, campoImprimir, tabla, imprimir) {
    // descripción de parámetros
    // filtro: valor a filtrar
    // campoFiltrar: campo el cual se va a filtrar con el valor de filtro
    // campoImprimir: campo el cual se va a retornar o imprimir de la respuesta de la consulta
    // tabla: tabla a consultar
    // imprimir: id o clase del elemento donde se va a imprimir

    $.ajax({
      type: "POST",
      url: "ajax_funcionMaster.php",
      data: {
        filtro: filtro,
        campoFiltrar: campoFiltrar,
        campoImprimir: campoImprimir,
        tabla: tabla
      },
      success: function(data) {
        // $(imprimir).html(data);
        if ($(imprimir).is("input")) {
          $(imprimir).val(data); // Si es un input, asigna el valor usando .val()
        } else {
          $(imprimir).html(data); // Si no es un input, asigna el HTML usando .html()
        }
      }
    });
  }
</script>

<script>
  $(function() {
    // CodeMirror
    const codemirror = document.querySelectorAll('.CodeMirror');
    for (let index = 0; index < codemirror.length; index++) {
      codemirror[index].CodeMirror = CodeMirror.fromTextArea(codemirror[index], {
        mode: "htmlmixed",
        theme: "monokai"
      });
    }
  })
</script>

<script>
  // Definir la función selectMaster
  $.fn.selectMaster = function(config = null) {
    this.select2();
    this.empty();
    this.append('<option value="0" >-- Seleccione --</option>');
    var $select = $(this);
    // // console.log($select);
    let camposValue = config['campoValue'].split(',');
    let camposTexto = config['campoTexto'].split(',');

    function buscarDatos(open = false) {
      // // console.log($select);
      $.ajax({
        url: '<?= $Base ?>/ajax_selectMaster.php',
        type: 'POST',
        data: {
          where: btoa(config['where']),
          campoValue: btoa(config['campoValue']),
          campoTexto: btoa(config['campoTexto']),
          tabla: btoa(config['tabla']),
          valorInput: btoa(config['valorInput']),
          selected: (config['selected'] != '0' ? btoa(config['selected']) : '0'),
        },
        success: function(response) {
          let data = JSON.parse(response);
          // console.log(data);


          for (let i = 0; i < data.length; i++) {
            let camposValuePrint = '';
            let camposTextoPrint = '';

            camposValue.forEach((element, index) => {
              camposValuePrint += atob(data[i][btoa(camposValue[index])]) + ' | ';
            });
            camposValuePrint = camposValuePrint.substring(0, camposValuePrint.length - 3);

            camposTexto.forEach((element, index) => {
              camposTextoPrint += atob(data[i][btoa(camposTexto[index])]) + ' | ';
            });
            camposTextoPrint = camposTextoPrint.substring(0, camposTextoPrint.length - 3);

            // console.log(camposValuePrint, camposTextoPrint);



            if (config['selected'] == atob(data[i][btoa(camposValue[0])])) {
              $select.append('<option value="' + camposValuePrint + '" selected>' + camposTextoPrint + '</option>');
            } else {
              $select.append('<option value="' + camposValuePrint + '">' + camposTextoPrint + '</option>');
            }
          }
          // Destruir instancia select2 y volver a aplicar
          $select.select2('destroy').select2();
          // abrirlo de nuevo y cargar el input de busqueda con el valor
          if (open) {
            $select.select2('open');
          }
          $select.data('select2').dropdown.$search.val(config['valorInput']);
        }
      });
    }

    // Definir una función de debouncing
    function debounce(func, delay) {
      let timer;
      return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(() => {
          func.apply(context, args);
        }, delay);
      };
    }

    this.on('select2:open', function(e) {
      // Verificar que todos los datos de config existan
      if (config && config['campoValue'] && config['campoTexto'] && config['tabla']) {
        // console.log(config['valorInput']);
        // buscarDatos(true);
        var $searchField = $select.data('select2').dropdown.$search || $select.data('select2').dropdown.$searchbox;
        // Evento input para el campo de búsqueda con debouncing
        $searchField.off('input').on('input', debounce(function() {
          var searchText = $(this).val();
          config['valorInput'] = searchText;
          $select.empty();
          $select.append('<option value="0" >-- Seleccione --</option>');

          if (searchText != undefined && searchText != null) {
            buscarDatos(true); // Realizar búsqueda incluso si el texto no está vacío
          }
        }, 500));

        if (config['valorInput'] == undefined) {
          config['valorInput'] = '';
          buscarDatos(true);
        }
      }
    });

    if (config['selected'] && config['selected'] != '0') {
      buscarDatos();
    }
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
  function generarRespaldos(query) {
    $.ajax({
      type: 'POST',
      url: '<?= $Base ?>/ajax_generarRespaldos.php',
      data: {
        query: query
      },
      success: function(data) {
        // Decodificar la respuesta base64
        data = atob(data);

        // Crear un elemento de tabla oculto para insertar los datos
        var table = document.createElement("table");
        table.innerHTML = data;
        table.id = 'tableBackup';
        table.style.display = 'none';
        document.body.appendChild(table);

        // Obtener todas las filas de la tabla
        var filas = table.querySelectorAll('tr');

        // Crear una nueva tabla para exportar
        var nuevaTabla = document.createElement('table');

        // Filtrar y agregar encabezados
        var encabezados = table.querySelectorAll('thead th');
        var trEncabezado = document.createElement('tr');
        encabezados.forEach(function(encabezado, i) {
          if (!encabezado.classList.contains('noExport')) {
            var th = document.createElement('th');
            th.innerText = encabezado.innerText;
            trEncabezado.appendChild(th);
          }
        });
        nuevaTabla.appendChild(trEncabezado);

        // Filtrar y agregar filas de datos
        filas.forEach(function(fila) {
          var celdas = fila.querySelectorAll('td');
          var tr = document.createElement('tr');
          celdas.forEach(function(celda, i) {
            var encabezado = encabezados[i];
            if (!encabezado.classList.contains('noExport')) {
              var td = document.createElement('td');
              td.innerText = celda.innerText;
              tr.appendChild(td);
            }
          });
          nuevaTabla.appendChild(tr);
        });

        // Convertir la tabla filtrada a un libro de Excel
        var wb = XLSX.utils.table_to_book(nuevaTabla, {
          sheet: "Hoja1"
        });

        // Generar el archivo Excel y descargarlo
        let newDate = new Date().getTime();
        XLSX.writeFile(wb, "Respaldo_" + newDate + ".xlsx");
      },
      error: function(xhr, status, error) {
        console.error("Error al generar el respaldo:", error);
        alert("Ocurrió un error al generar el respaldo. Por favor, intenta de nuevo.");
      },
      beforeSend: function() {
        console.log("Enviando...");
        mostrarLoader();
      },
      complete: function() {
        console.log("Completado");
        ocultarLoader();
      }
    });
  }
</script>
