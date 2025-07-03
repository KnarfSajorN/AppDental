<?php
/*
<!DOCTYPE html>
<html>
<head>
  <title>Ejemplo Handsontable</title>
  <!-- Agrega las referencias a Handsontable y su CSS -->
  <script src="https://cdn.jsdelivr.net/npm/handsontable@7.4.2/dist/handsontable.full.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/handsontable@7.4.2/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <div id="tablaContenedor"></div>

  <!-- Asegúrate de tener jQuery cargado antes de este script -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Agrega la referencia a Handsontable -->
  <script src="https://cdn.jsdelivr.net/npm/handsontable@7.4.2/dist/handsontable.full.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/handsontable@7.4.2/dist/handsontable.full.min.css" rel="stylesheet" media="screen">

    <div id="hot"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var data = [
                ['', 'Title 1', 'Title 2', 'Title 3'],
                ['Row 1', '', '', ''],
                ['Row 2', '', '', '']
            ];

            var container = document.getElementById('hot');

            var hot = new Handsontable(container, {
                data: data,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                beforeContextMenuShow: function (event) {
                    var selectedCell = hot.getSelected();
                    if (selectedCell) {
                        var currentType = hot.getCellMeta(selectedCell[0], selectedCell[1]).type;
                        var options = ['text', 'numeric', 'dropdown'];

                        var contextMenu = hot.getPlugin('contextMenu');
                        var choices = options.map(function (option) {
                            return {
                                name: option,
                                callback: function () {
                                    var selectedOption = option;
                                    hot.setCellMeta(selectedCell[0], selectedCell[1], 'type', selectedOption);
                                    hot.render(); // Actualizar la tabla después de cambiar el tipo de columna
                                }
                            };
                        });

                        contextMenu.menu.items = choices;
                    } else {
                        event.preventDefault(); // Evitar que el menú aparezca si no hay celda seleccionada
                    }
                },
                cells: function (row, col) {
                    var cellProperties = {};
                    if (row === 0) {
                        cellProperties.readOnly = true;
                    }
                    return cellProperties;
                }
            });
        });
    </script>
</body>
</html>
*/?>
<!DOCTYPE html>
<html>
<head>
  <!-- Handsontable CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@9.0.2/dist/handsontable.full.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- Handsontable container -->
  <div id="hot"></div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lista desplegable seleccionada</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="inputValue">Ingrese los nombres separados por "|":</label>
          <input type="text" id="inputValue" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="btnAddOption">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Agregar jQuery primero -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Handsontable JS -->
  <script src="https://cdn.jsdelivr.net/npm/handsontable@9.0.2/dist/handsontable.full.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var data = [
        ['', '', ''],
        ['', '', ''],
        ['', '', '']
      ];

      var container = document.getElementById('hot');
      var hot = new Handsontable(container, {
        data: data,
        contextMenu: {
          items: {
            custom_option: {
              name: 'Lista desplegable',
              callback: function (key, selection, clickEvent) {
                var selectedCell = hot.getSelected();
                if (selectedCell) {
                  var row = selectedCell[0];
                  var col = selectedCell[1];
                  $('#myModal').modal('show'); // Mostrar el modal
                  $("#btnAddOption").off().on("click", function() {
                    var inputValue = $("#inputValue").val();
                    var options = inputValue.split("|").map(function(item) {
                      return item.trim();
                    });

                    // Verificar que las opciones sean válidas antes de guardarlas en la celda
                    var isValidOptions = options.length > 0 && options.every(option => option !== "");

                    if (isValidOptions) {
                      var cellValue = options.join("|");
                      hot.setDataAtRowProp(row, hot.colToProp(col), cellValue);
                      hot.setCellMeta(row, col, 'type', 'dropdown');
                      hot.setCellMeta(row, col, 'source', options);
                    } else {
                      // Si las opciones no son válidas, cambiar el tipo de celda a texto
                      hot.setDataAtRowProp(row, hot.colToProp(col), "");
                      hot.setCellMeta(row, col, 'type', 'text');
                      hot.setCellMeta(row, col, 'source', null);
                    }
                    hot.render();
                    $('#myModal').modal('hide');
                  });
                }
              }
            }
          }
        }
      });
    });
  </script>
</body>
</html>




























