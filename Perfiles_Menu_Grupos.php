<?php
include 'header.php';
include 'menu.php';
//include 'Perfiles_Menu_Visual1.php';

$usuario_id = $_SESSION['ID'];
$categoria_id = $_GET["Categoria"];

if($_GET["tipo"]=="plantillas"){
    $_GET["msg"] = "Se Registro Correctamente la plantilla";
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
    
}
?>


<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Control de Perfiles </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        
            <div class="content">
                <h4 class="Titulo_Pagina"> &nbsp;&nbsp;Control de Perfiles</h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-xs-12">
                            <div class="box">
                            <div class="box-header">
                                <a href="Perfiles_RegistrarNuevoMenu">
                                <button   class="btn btn-block btn-outline-info mb-2 rounded-pill "><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Nuevo Menu </strong></h4></button>
                                </a>

                            </div>

                                <div class="box-body">
                                    
                                <div class="modal-body">

                                    <div id="Modulos_Grupos">
                                        <div class="col-md-12">
                                            <h2 style="text-align: center;font-weight: bold;" id="LABELPERFIL"> Grupos</h2><!-- no quitar id importante-->
                                            <?php
                                            if($_GET['tipo']=="plantillas"){
                                                echo "<h4 style='text-align: center;font-weight: bold;color:red'> Como registro una plantilla/documento deberá seleccionar el grupo en el cual desea activar la nueva plantilla para ello deberá dirigirse a la tabla de grupos que esta aquí abajo, luego buscar el grupo el cual quiere editar y darle al botón editar, luego dirigirse al módulo que se llama * Plantillas / Documentos * 
                                                darle al botón [Submódulos Adjuntos] y se desplegaran todas las plantillas de ahí buscar la nueva plantilla creada y darle check/click al botón izquierdo al lado del nombre de la plantilla que desea activar y después dirigirse a la parte inferior y darle Actualizar, con esto abra activado la plantilla en el menú
</h4> ";
                                            }
                                            ?>
                                            <table id="GruposTabla" class="table table-bordered table-striped max-height-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Modulos</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo='1'");
                                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                        //$contador++;
                                                        $id = $rowMotorizado['id'];
                                                        $Nombre = $rowMotorizado['Nombre_Grupo'];
                                                        //$Descripcion_Grupo = $rowMotorizado['Descripcion_Grupo'];
                                                        $Arreglo = json_decode($rowMotorizado['Arreglo'], true);

                                                        $ModulosActivos = "";
                                                        foreach ($Arreglo as $key => $value) {

                                                            if ($value["Activo"] == "1") {
                                                                $ModulosActivos .= $value["Nombre"] . " <br> ";
                                                            }
                                                        }
                                                        $ModulosActivos = trim($ModulosActivos, " <br> ");

                                                        echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                                            <td width='20%' align='center'>{$Nombre}</td>
                                                                            <td width='20%' align='center' class='table-modulos-activos'>{$ModulosActivos}</td>
                                                                            <td width='20%' align='center'><font color='#04CC05'> <a onclick='EditarGrupo({$id})' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> </i> Editar</a></font><br>
                                                                                <font> <a onclick='EliminarGrupo({$id})'class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 200px;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> </i> Eliminar</a></font><br>

                                                                                <font> <a onclick='DuplicarGrupo($id)' class='btn btn-block btn-outline-secondary btn-lg rounded-pill shadow' style='width: 200px;' > <i class='fa fa-copy' title='Duplicar'> Duplicar</i></a></font><br>

                                                                            </td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <form action='#' method="POST" id="FormularioGrupos" onsubmit="event.preventDefault();GuardarActualizar_Grupo();" style="text-align: center;">
                                        <h2>Grupos </h2>
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Grupo:</label>
                                            <input type="text" class="form-control" id="Nombre_Grupo" name="Nombre_Grupo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción del Grupo:</label>
                                            <textarea class="form-control" id="Descripcion_Grupo" name="Descripcion_Grupo"></textarea>
                                        </div>

                                        <div>
                                            <hr>
                                        </div>

                                        <div style="width: 90%;left:5%;position: relative;">
                                            <div id="Modulos_Menu" class="col-md-12" style="height: 747px;overflow-y: scroll;text-align: center;padding:15px;background-color: #d9d9d9;">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" viewBox="0 0 50 50">
                                            <path fill="#3c8dbc" d="M25,5A20.14,20.14,0,0,1,45,22.88a2.51,2.51,0,0,0,2.49,2.26h0A2.52,2.52,0,0,0,50,22.33a25.14,25.14,0,0,0-50,0,2.52,2.52,0,0,0,2.5,2.81h0A2.51,2.51,0,0,0,5,22.88,20.14,20.14,0,0,1,25,5Z">
                                                <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.5s" repeatCount="indefinite"/>
                                            </path>
                                            </svg>

                                            </div>
                                        </div>

                                        <div class="col-md-12" id="GuardarActualizar_Grupo">

                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div id="Grupo_Accion">
                                            <div class="col-sm-12">
                                                <center><button type="submit" class="btn btn-block btn-info rounded-pill btn-sm" name="Guardar_Informacion_Menu">
                                                        <h2> <strong> G u a r d a r </strong> </h2>
                                                    </button></center>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12" >
                                            <hr>
                                        </div>

                                    </form>
                                    
                                    

                                </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        
    </section>
    <!-- /.content -->
</div>






<!-- El Modal -->
<div class="modal fade" id="ModalDuplicado">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Encabezado del Modal -->
      <div class="modal-header">
        <h5 class="modal-title">Duplicar Grupo</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Contenido del Modal -->
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Nombre del Grupo Duplicado</label>
          <input type="text" class="form-control" id="Nombre_Grupo_Duplicado" name="Nombre_Grupo_Duplicado" placeholder="Grupo">
        </div>
        <input  type="hidden" id="Grupo_Duplicar_id" >
      </div>
      
      <!-- Pie del Modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info btn-lg rounded-pill shadow" onclick ="Duplicar_Grupo();">Crear Duplicado</button>
      </div>
      
    </div>
  </div>
</div>








<style>
    .table-modulos-activos{
        height: 111px;
    overflow-y: scroll;
    display: block;
    width: auto;
    }

    .subMenuClass{
        padding: 50px!important;
    }

    .subMenuButton{
        padding-top: 60px!important;
    }

        .float {
            position: fixed;
            width: 50px;
            height: 50px;
            top: 140px;
            right: 0px;
            background-color: #3c8dbc;
            color: #FFF;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            border-radius: 10px 0px 0px 10px;

            background: rgb(250, 235, 215);
            background: -moz-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: -webkit-radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
            background: radial-gradient(circle, rgb(80 98 171) 30%, rgba(60, 141, 176, 1) 100%);
        }

        .float .my-float {
            margin-top: 17px;
        }
    
    .input-portada{
        font-size: 18px;
        line-height: 1.3333333;
        border-radius: 6px;
        padding: 4px;
        height: 45px;
    }
</style>

<a href="#GuardarActualizar_Grupo" class="float"  id="floatButton">
    <i class="my-float fa fa-check"></i>
</a>

<script>
  var floatButton = document.getElementById('floatButton');

floatButton.addEventListener('mouseover', function() {
  floatButton.innerHTML = '<i class="my-float fa fa-check"></i> Ir a Actualizar/Guardar';
  floatButton.style.width = '250px';
  floatButton.style.color = 'white';
  floatButton.style.transition = '0.5s';
});

floatButton.addEventListener('mouseout', function() {
  floatButton.innerHTML = '<i class="my-float fa fa-check"></i>';
  floatButton.style.width = '';
  floatButton.style.color = 'white';
  floatButton.style.transition = '';
});

</script>

<?php
include 'footer.php';
?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter '
$(document).on('input', 'input,textarea', function() {
  $(this).val($(this).val().replace(/['"]/g, ''));
});
</script>
<?php
// Ruta del archivo JSON
$rutaJson = 'Perfiles_Menu_Iconos.json';
// Leer el contenido del archivo JSON
$jsonData = file_get_contents($rutaJson);
// Codificar los datos JSON para su uso en JavaScript
$encodedJsonData = json_decode($jsonData, true);

$arreglojson = json_encode($encodedJsonData);

?>
<script>

    function SelectIconos_Class(Selecticon, options) {

        $(Selecticon).each(function() {
            var select = $(this);
            
            select.select2({
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: function(data) {
                    var $result = $('<span title="Icono"></span>');
                    $result.html(data.text);

                    return $result;
                },
                width:"100%"
            });
        });

    }
</script>



<script type="text/javascript">
    //que tengan los mismo campos tanto esta funcion como la de editar
    function CargarTablaMenus(datos) {
        

        var contenedorTabla = document.getElementById("Modulos_Menu");

        // Crear la tabla
        var tabla = document.createElement("table");
        tabla.classList.add("table", "text-center");

        // Crear la fila de encabezado
        var encabezado = tabla.createTHead().insertRow();
        var encabezadoColumnas = ["Activo", "Nombre", "Color", "Icono","Portada",""];

        // Crear las celdas del encabezado
        for (var i = 0; i < encabezadoColumnas.length; i++) {
            var encabezadoCelda = document.createElement("th");
            encabezadoCelda.textContent = encabezadoColumnas[i];
            if (encabezadoColumnas[i] == "Activo" || encabezadoColumnas[i] == "Color") {
                encabezadoCelda.style.width = "2%";
            } 
            else if (encabezadoColumnas[i] == "" ) {
                encabezadoCelda.style.width = "1%";
            }
            else if (encabezadoColumnas[i] == "Icono" ) {
                encabezadoCelda.style.width = "5%";
            } 
            else {
                encabezadoCelda.style.width = "90%";
            }


            encabezado.appendChild(encabezadoCelda);
        }

        // Crear el cuerpo de la tabla
        var cuerpoTabla = tabla.createTBody();
        cuerpoTabla.id = "myTableBody";
        // Recorrer los datos y crear las filas
        Object.values(datos).forEach(function(elemento) {
            var fila = cuerpoTabla.insertRow();

            // Crear celdas para cada columna
            var celdaActivo = fila.insertCell();
            var celdaNombre = fila.insertCell();
            var celdaColor = fila.insertCell();
            var celdaIcono = fila.insertCell();
            var celdaPortada = fila.insertCell();
            var celdaMover = fila.insertCell(); 

            // Agregar la clase "align-middle" a las celdas para centrar su contenido verticalmente
            celdaActivo.classList.add("align-middle");
            celdaNombre.classList.add("align-middle");
            celdaColor.classList.add("align-middle");
            celdaIcono.classList.add("align-middle");
            celdaPortada.classList.add("align-middle");
            celdaMover.classList.add("align-middle");

            if(elemento.idPrincipal != 0){
                celdaActivo.classList.add("subMenuClass");
                celdaNombre.classList.add("subMenuClass");
                celdaColor.classList.add("subMenuClass");
                celdaIcono.classList.add("subMenuClass");
                celdaPortada.classList.add("subMenuClass");
                celdaMover.classList.add("subMenuButton");
            }

            // Aplicar estilos personalizados a las celdas
            celdaActivo.style.width = "1%";
            celdaColor.style.width = "2%";
            celdaNombre.style.width = "90%"; 
            celdaIcono.style.width = "3%";
            celdaPortada.style.width = "3%"
            celdaMover.style.width = "1%";

            // Crear checkbox para la columna "Activo"
            var checkboxActivo = document.createElement("input");
            checkboxActivo.type = "checkbox";
            checkboxActivo.name = "Arreglo[Activo][" + elemento.id + "]"; // Agregar el atributo "name"
            checkboxActivo.value = "1"; // Check
            if(elemento.Editable=="0"){
                checkboxActivo.disabled = true;
            }
            celdaActivo.appendChild(checkboxActivo);

            // Crear input de texto para la columna "Nombre"
            var inputNombre = document.createElement("input");
            inputNombre.type = "text";
            inputNombre.value = elemento.Nombre;
            inputNombre.name = "Arreglo[Nombre][" + elemento.id + "]"; // Agregar el atributo "name"
            inputNombre.classList.add("form-control", "input-lg");
            celdaNombre.appendChild(inputNombre);

            // Crear label para mostrar el valor del inputNombre
            var labelNombre = document.createElement("label");
            labelNombre.textContent = inputNombre.value;
            labelNombre.style.fontSize = "13px";
            labelNombre.style.display = "flex";
            celdaNombre.appendChild(labelNombre);

            // Crear input hidden para el nombre original
            var inputNombreOriginal = document.createElement("input");
            inputNombreOriginal.type = "hidden";
            inputNombreOriginal.name = "Arreglo[Nombre_Original][" + elemento.id + "]"; // Agregar el atributo "name"
            inputNombreOriginal.value = elemento.Nombre; // Agregar el atributo "value"
            celdaNombre.appendChild(inputNombreOriginal);



            // Crear input de color para la columna "Color"
            var inputColor = document.createElement("input");
            inputColor.type = "color";
            inputColor.name = "Arreglo[Color][" + elemento.id + "]"; // Agregar el atributo "name"
            //Actualizacion de color
            if(elemento.Color){
                inputColor.value = elemento.Color;
            }else{
                inputColor.value = "#32373d";
            }
            inputColor.title = "Color";
            celdaColor.appendChild(inputColor);

            // Crear select para la columna "Icono"
            var selectIcono = document.createElement("select");
            selectIcono.name = "Arreglo[Icono][" + elemento.id + "]"; // Agregar el atributo "name"
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.title = "Icono";
            selectIcono.id = "ListaIconos";

            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                //var option = new Option('<i class="' + options[i] + '"></i> - ' + options[i], options[i], false, false);
                var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                option.title = "Icono";
                //option.setAttribute('data-icon', options[i]);
                if (options[i] === elemento.Icono) {
                    option.selected = true; // Aplicar "selected" a la opción correspondiente
                }
                
                selectIcono.append(option);
            }
            celdaIcono.appendChild(selectIcono);

            // Crear select para la columna "Portada"
            var selectPortada = document.createElement("select");
            selectPortada.name = "Arreglo[Portada][" + elemento.id + "]"; // Agregar el atributo "name"
            selectPortada.classList.add("input-portada");
            //selectPortada.style.width = "100%";
            selectPortada.title = "Portada";

            var option = new Option('No', '0', false, false);
            option.title = "Portada";
            selectPortada.append(option);

            var option = new Option('Si', '1', false, false);
            option.title = "Portada";
            selectPortada.append(option);

            if(elemento.NoAplicaPortada=="1"){
                selectPortada.style.display = "none";
            }

            celdaPortada.appendChild(selectPortada);

            
            // Crear botón para mover la fila hacia arriba
            var botonMoverArriba = document.createElement("button");
            botonMoverArriba.innerHTML = '<i class="fas fa-arrow-up"></i>';
            botonMoverArriba.classList.add("btn", "btn-info", "rounded-pill", "btn-sm", "BotonAccion");
            botonMoverArriba.type = "button"; // Agregar el atributo "type"
            botonMoverArriba.title = "Subir";
            //botonMoverArriba.addEventListener("click", function() {
            //    moveTableRow(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
            //});
            //celdaMover.appendChild(botonMoverArriba);

            // Crear botón para mover la fila hacia abajo
            var botonMoverAbajo = document.createElement("button");
            botonMoverAbajo.innerHTML = '<i class="fas fa-arrow-down"></i>';
            botonMoverAbajo.classList.add("btn", "btn-info", "rounded-pill", "btn-sm", "BotonAccion");
            botonMoverAbajo.type = "button"; // Agregar el atributo "type"
            botonMoverAbajo.title = "Bajar";
            //botonMoverAbajo.addEventListener("click", function() {
            //    moveTableRow(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
            //});
            //celdaMover.appendChild(botonMoverAbajo);

            // Asignar un ID único a la fila
            fila.id = "row_" + elemento.id;
            if(elemento.idPrincipal == 0){
                fila.classList.add("orden_"+elemento.id);
                fila.classList.add("GrupoModulo_"+elemento.id);
                fila.classList.add("Modulo_Principal_Tabla");

                if(elemento.Submenus != 0 ){
                    
                    // Crear botón para mover la fila hacia arriba
                    var BotonSubmenu = document.createElement("button");
                    BotonSubmenu.innerHTML = '<i class="fa fa-plus">  </i> Submodulos Adjuntos';
                    BotonSubmenu.classList.add("btn", "btn-info", "rounded-pill", "btn-lg", "BotonSubmodulo");
                    BotonSubmenu.style.width = "100%";
                    BotonSubmenu.style.padding = "5px";
                    BotonSubmenu.style.fontSize = "17px";
                    BotonSubmenu.type = "button"; // Agregar el atributo "type"
                    BotonSubmenu.title = "Abrir SubModulos";
                    BotonSubmenu.addEventListener("click", function() {
                        VisualizarSubmodulos("maxorden_"+elemento.id,this); // Llama a la función moveTableRow para mover la fila hacia arriba
                    });
                    celdaNombre.appendChild(BotonSubmenu);

                }
                
                botonMoverArriba.addEventListener("click", function() {
                    EjecutarAccionMoverModulos(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
                });
                celdaMover.appendChild(botonMoverArriba);
                botonMoverAbajo.addEventListener("click", function() {
                    EjecutarAccionMoverModulos(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
                });
                celdaMover.appendChild(botonMoverAbajo);

            }else{
                fila.classList.add("maxorden_"+elemento.idPrincipal);
                fila.classList.add("GrupoModulo_"+elemento.idPrincipal);
                fila.style.display = "none";

                botonMoverArriba.addEventListener("click", function() {
                    MoverSubModulos(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
                });
                celdaMover.appendChild(botonMoverArriba);
                botonMoverAbajo.addEventListener("click", function() {
                    MoverSubModulos(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
                });
                celdaMover.appendChild(botonMoverAbajo);

            }


        });
        document.getElementById("Modulos_Menu").innerHTML = "";

        // Agregar la tabla al contenedor
        contenedorTabla.appendChild(tabla);

        //SelectIconosConJSON('#ListaIconos', 'Perfil_Menu_Iconos.json');
        var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
        //console.log(ArregloIconos);
        SelectIconos_Class(".IconoMenu", ArregloIconos);
    }










    function EditarTablaMenus(datos,datos_input,datos_descripcion) {

        //window.scrollTo({
        //    top: 0,
        //    behavior: 'smooth' // Opcional: hace el desplazamiento de forma suave
        //});

        var contenedorTabla = document.getElementById("Modulos_Menu");
        
        contenedorTabla.scrollTop = 0;
        // Crear la tabla
        var tabla = document.createElement("table");
        tabla.classList.add("table", "text-center");

        // Crear la fila de encabezado
        var encabezado = tabla.createTHead().insertRow();
        var encabezadoColumnas = ["Activo", "Nombre", "Color", "Icono","Portada",""];

        // Crear las celdas del encabezado
        // Crear las celdas del encabezado
        for (var i = 0; i < encabezadoColumnas.length; i++) {
            var encabezadoCelda = document.createElement("th");
            encabezadoCelda.textContent = encabezadoColumnas[i];
            if (encabezadoColumnas[i] == "Activo" || encabezadoColumnas[i] == "Color") {
                encabezadoCelda.style.width = "2%";
            } 
            else if (encabezadoColumnas[i] == "" ) {
                encabezadoCelda.style.width = "1%";
            }
            else if (encabezadoColumnas[i] == "Icono" ) {
                encabezadoCelda.style.width = "5%";
            } 
            else {
                encabezadoCelda.style.width = "90%";
            }

            encabezado.appendChild(encabezadoCelda);
        }

        // Crear el cuerpo de la tabla
        var cuerpoTabla = tabla.createTBody();
        cuerpoTabla.id = "myTableBody";
        // Recorrer los datos y crear las filas
        Object.values(datos).forEach(function(elemento) {
            var fila = cuerpoTabla.insertRow();

            // Crear celdas para cada columna
            var celdaActivo = fila.insertCell();
            var celdaNombre = fila.insertCell();
            var celdaColor = fila.insertCell();
            var celdaIcono = fila.insertCell();
            var celdaPortada = fila.insertCell();
            var celdaMover = fila.insertCell(); 

            // Agregar la clase "align-middle" a las celdas para centrar su contenido verticalmente
            celdaActivo.classList.add("align-middle");
            celdaNombre.classList.add("align-middle");
            celdaColor.classList.add("align-middle");
            celdaIcono.classList.add("align-middle");
            celdaPortada.classList.add("align-middle");
            celdaMover.classList.add("align-middle");

            if(elemento.idPrincipal != 0){
                celdaActivo.classList.add("subMenuClass");
                celdaNombre.classList.add("subMenuClass");
                celdaColor.classList.add("subMenuClass");
                celdaIcono.classList.add("subMenuClass");
                celdaPortada.classList.add("subMenuClass");
                celdaMover.classList.add("subMenuButton");
            }

            // Aplicar estilos personalizados a las celdas
            celdaActivo.style.width = "1%";
            celdaColor.style.width = "2%";
            celdaNombre.style.width = "90%"; 
            celdaIcono.style.width = "3%";
            celdaPortada.style.width = "3%"
            celdaMover.style.width = "1%";

            // Crear checkbox para la columna "Activo"
            var checkboxActivo = document.createElement("input");
            checkboxActivo.type = "checkbox";
            checkboxActivo.name = "Arreglo[Activo][" + elemento.id + "]"; // Agregar el atributo "name"
            checkboxActivo.value = "1"; // Check

            if (elemento.Activo == "1") {
                checkboxActivo.checked = true;
            }

            if(elemento.editable=="0"){
                checkboxActivo.disabled = true;
            }


            celdaActivo.appendChild(checkboxActivo);

            // Crear input de texto para la columna "Nombre"
            var inputNombre = document.createElement("input");
            inputNombre.type = "text";
            inputNombre.value = elemento.Nombre;
            inputNombre.name = "Arreglo[Nombre][" + elemento.id + "]"; // Agregar el atributo "name"
            inputNombre.classList.add("form-control", "input-lg");
            celdaNombre.appendChild(inputNombre);

            // Crear label para mostrar el valor del inputNombre
            var labelNombre = document.createElement("label");
            labelNombre.textContent = elemento.Nombre_Original;
            labelNombre.style.fontSize = "13px";
            labelNombre.style.display = "flex";
            celdaNombre.appendChild(labelNombre);

            // Crear input hidden para el nombre original
            var inputNombreOriginal = document.createElement("input");
            inputNombreOriginal.type = "hidden";
            inputNombreOriginal.name = "Arreglo[Nombre_Original][" + elemento.id + "]"; // Agregar el atributo "name"
            inputNombreOriginal.value = elemento.Nombre_Original; // Agregar el atributo "value"
            celdaNombre.appendChild(inputNombreOriginal);



            // Crear input de color para la columna "Color"
            var inputColor = document.createElement("input");
            inputColor.type = "color";
            inputColor.name = "Arreglo[Color][" + elemento.id + "]"; // Agregar el atributo "name"
            inputColor.value = elemento.Color;
            inputColor.title = "Color";
            celdaColor.appendChild(inputColor);


            var selectIcono = document.createElement("select");
            selectIcono.name = "Arreglo[Icono][" + elemento.id + "]"; // Agregar el atributo "name"
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.id = "ListaIconos";

            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                //var option = new Option('<i class="' + options[i] + '"></i> - ' + options[i], options[i], false, false);
                var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                option.title = "Icono"
                //option.setAttribute('data-icon', options[i]);
                if (options[i] === elemento.Icono) {
                    option.selected = true; // Aplicar "selected" a la opción correspondiente
                }

                selectIcono.append(option);
            }
            celdaIcono.appendChild(selectIcono);



            // Crear select para la columna "Portada"
            var selectPortada = document.createElement("select");
            selectPortada.name = "Arreglo[Portada][" + elemento.id + "]"; // Agregar el atributo "name"
            selectPortada.classList.add("input-portada");
            //selectPortada.style.width = "100%";
            selectPortada.title = "Portada";

            var option = new Option('No', '0', false, false);
            option.title = "Portada";
            selectPortada.append(option);

            var option = new Option('Si', '1', false, false);
            option.title = "Portada";
            if(elemento.Portada=="1"){
                option.selected = true; 
            }
            selectPortada.append(option);

            if(elemento.NoAplicaPortada=="1"){
                selectPortada.style.display = "none";
            }

            celdaPortada.appendChild(selectPortada);


            // Crear botón para mover la fila hacia arriba
            var botonMoverArriba = document.createElement("button");
            botonMoverArriba.innerHTML = '<i class="fas fa-arrow-up"></i>';
            botonMoverArriba.classList.add("btn", "btn-info", "rounded-pill", "btn-sm", "BotonAccion");
            botonMoverArriba.type = "button"; // Agregar el atributo "type"
            botonMoverArriba.title = "Subir";
            //botonMoverArriba.addEventListener("click", function() {
            //    moveTableRow(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
            //});
            celdaMover.appendChild(botonMoverArriba);

            // Crear botón para mover la fila hacia abajo
            var botonMoverAbajo = document.createElement("button");
            botonMoverAbajo.innerHTML = '<i class="fas fa-arrow-down"></i>';
            botonMoverAbajo.classList.add("btn", "btn-info", "rounded-pill", "btn-sm", "BotonAccion");
            botonMoverAbajo.type = "button"; // Agregar el atributo "type"
            botonMoverArriba.title = "Bajar";
            //botonMoverAbajo.addEventListener("click", function() {
            //    moveTableRow(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
            //});
            celdaMover.appendChild(botonMoverAbajo);


            // Asignar un ID único a la fila
            fila.id = "row_" + elemento.id;
            if(elemento.idPrincipal == 0){
                fila.classList.add("orden_"+elemento.id);
                fila.classList.add("GrupoModulo_"+elemento.id);
                fila.classList.add("Modulo_Principal_Tabla");

                if(elemento.Submenus != 0 ){
                    
                    // Crear botón para mover la fila hacia arriba
                    var BotonSubmenu = document.createElement("button");
                    BotonSubmenu.innerHTML = '<i class="fa fa-plus">  </i> Submodulos Adjuntos';
                    BotonSubmenu.classList.add("btn", "btn-info", "rounded-pill", "btn-lg", "BotonSubmodulo");
                    BotonSubmenu.style.width = "100%";
                    BotonSubmenu.style.padding = "5px";
                    BotonSubmenu.style.fontSize = "17px";
                    BotonSubmenu.title = "Abrir SubModulos";
                    BotonSubmenu.type = "button"; // Agregar el atributo "type"
                    BotonSubmenu.addEventListener("click", function() {
                        VisualizarSubmodulos("maxorden_"+elemento.id,this); // Llama a la función moveTableRow para mover la fila hacia arriba
                    });
                    celdaNombre.appendChild(BotonSubmenu);

                }
                
                botonMoverArriba.addEventListener("click", function() {
                    EjecutarAccionMoverModulos(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
                });
                celdaMover.appendChild(botonMoverArriba);
                botonMoverAbajo.addEventListener("click", function() {
                    EjecutarAccionMoverModulos(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
                });
                celdaMover.appendChild(botonMoverAbajo);

            }else{
                fila.classList.add("maxorden_"+elemento.idPrincipal);
                fila.classList.add("GrupoModulo_"+elemento.idPrincipal);
                fila.style.display = "none";

                botonMoverArriba.addEventListener("click", function() {
                    MoverSubModulos(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
                });
                celdaMover.appendChild(botonMoverArriba);
                botonMoverAbajo.addEventListener("click", function() {
                    MoverSubModulos(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
                });
                celdaMover.appendChild(botonMoverAbajo);

            }




        });

        var LabelTitulo = document.createElement("label");
        LabelTitulo.textContent = "Edicion";
        LabelTitulo.style.fontSize = "23px";
        LabelTitulo.style.display = "flex";
        contenedorTabla.appendChild(LabelTitulo);

        // Agregar la tabla al contenedor
        contenedorTabla.appendChild(tabla);

        //SelectIconosConJSON('#ListaIconos', 'Perfil_Menu_Iconos.json');
        var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
        //console.log(ArregloIconos);
        SelectIconos_Class(".IconoMenu", ArregloIconos);

    }



    function CargarAdministrarGrupos() {

        $.ajax({
            url: "Perfiles_Menu_Ajax.php",
            type: "POST",
            data: {
                "Tipo_Consulta": "Cargar Modulos Menu",
                "usuario_id": <?php echo $_SESSION['ID']; ?>
            },
            success: function(data) {
                var datos = JSON.parse(data);
                //console.log(data);
                //console.log(datos);

                CargarTablaMenus(datos);
            }
        });
        
        $(document).ready(function() {
        var inputElement = $('#LABELPERFIL');
        $('html, body').animate({
          scrollTop: inputElement.offset().top
        }, 1000);
      });


    }


    function GuardarActualizar_Grupo() {

        if (document.getElementById("Actualizar_Informacion_Menu") != null) {
            var data_form = $("#FormularioGrupos").serialize() + '&Tipo_Consulta=Actualizar Grupo' + '&usuario_id=' + <?php echo $_SESSION['ID']; ?>;
        } else {
            var data_form = $("#FormularioGrupos").serialize() + '&Tipo_Consulta=Agregar Grupo' + '&usuario_id=' + <?php echo $_SESSION['ID']; ?>;
        }

        //console.log(document.getElementById("Actualizar_Informacion_Menu"));

        $.ajax({
            type: "POST",
            url: "Perfiles_Menu_Ajax.php",
            data: data_form,
            success: function(response) {
                //console.log(response);
                window.location.reload();
            }
        });

    }

    function EditarGrupo(id) {
        // Obtener la referencia al elemento input
        var inputElement = document.getElementById('Nombre_Grupo');
        
        // Realizar el desplazamiento hacia el elemento input
        inputElement.scrollIntoView({ behavior: 'smooth' });


        var Respuesta = "";

        $.ajax({
            type: "POST",
            url: "Perfiles_Menu_Ajax.php",
            data: {
                "Tipo_Consulta": "Editar Modulos Menu Inputs",
                "id": id,
                "usuario_id": <?php echo $_SESSION['ID']; ?>
            },
            success: function(response1) {
                Respuesta = JSON.parse(response1);

                $.ajax({
                    type: "POST",
                    url: "Perfiles_Menu_Ajax.php",
                    data: {
                        "Tipo_Consulta": "Editar Modulos Menu",
                        "id": id,
                        "usuario_id": <?php echo $_SESSION['ID']; ?>
                    },
                    success: function(response) {
                        var datos = JSON.parse(response);
                        console.log(datos);
                        document.getElementById("Modulos_Menu").innerHTML = "";
                        EditarTablaMenus(datos);

                        $("#Nombre_Grupo").val(Respuesta.Nombre);
                        $("#Descripcion_Grupo").val(Respuesta.Descripcion);

                        var inputNombreOriginal = document.createElement("input");
                        inputNombreOriginal.type = "hidden";
                        inputNombreOriginal.name = "Grupo_edicion_id"; // Agregar el atributo "name"
                        inputNombreOriginal.value = id; // Agregar el atributo "value"
                        document.getElementById("Modulos_Menu").appendChild(inputNombreOriginal);

                        document.getElementById("Grupo_Accion").innerHTML = '<div class="col-sm-12"><center><button type="submit" class="btn btn-block btn-info rounded-pill btn-sm" id="Actualizar_Informacion_Menu" name="Actualizar_Informacion_Menu"><h2> <strong> A c t u a l i z a r </strong> </h2></button></center></div>';
                    }
                });

            }
        });
        

    }

    function EliminarGrupo(id) {
        
        $.ajax({
            type: "POST",
            url: "Perfiles_Menu_Ajax.php",
            data: {
                "Tipo_Consulta": "Eliminar Modulos Menu",
                "id": id
            },
            success: function(response) {
                //console.log(response);
                window.location.reload();
            }
        });

    }

    function VisualizarSubmodulos(subModulos,botonSubmenu_actual) {

        
        //console.log(botonSubmenu_actual);

        if (botonSubmenu_actual != undefined) {

            var BotonSubMenu = document.getElementsByClassName("BotonSubmodulo");
            for (var i = 0; i < BotonSubMenu.length; i++) {
                BotonSubMenu[i].disabled = true;
            }

            if (botonSubmenu_actual.classList.contains("Activo")) {
                var BotonSubMenu = document.getElementsByClassName("BotonSubmodulo");
                for (var i = 0; i < BotonSubMenu.length; i++) {
                    BotonSubMenu[i].disabled = false;
                }

                botonSubmenu_actual.classList.remove("Activo");

                var Submodulos = document.getElementsByClassName(subModulos);
                for (var i = 0; i < Submodulos.length; i++) {
                    Submodulos[i].style.display = "none";
                }

                var ModulosPrincipales = document.getElementsByClassName("Modulo_Principal_Tabla");
                for (var i = 0; i < ModulosPrincipales.length; i++) {
                    
                    var BotonesPrincipales = ModulosPrincipales[i].getElementsByClassName("BotonAccion");
                    for (var j = 0; j < BotonesPrincipales.length; j++) {
                        BotonesPrincipales[j].style.display = "block";
                    }

                }
            }
            else{

                botonSubmenu_actual.disabled = false;
                botonSubmenu_actual.classList.add("Activo");

                //console.log(subModulos);
                var BotonesAccion = document.getElementsByClassName("BotonAccion");
                for (var i = 0; i < BotonesAccion.length; i++) {
                    BotonesAccion[i].style.display = "none";
                }

                var Submodulos = document.getElementsByClassName(subModulos);
                var PosicionFinal = 0;
                var PosicionFinalizacion = 0;
                for (var i = 0; i < Submodulos.length; i++) {
                    Submodulos[i].style.display = "revert";
                    //console.log(Submodulos[i]);
                    var BotonesAccionHabilitados = Submodulos[i].getElementsByClassName("BotonAccion");
                    for (var j = 0; j < BotonesAccionHabilitados.length; j++) {
                        BotonesAccionHabilitados[j].style.display = "block";
                        BotonesAccionHabilitados[j].onclick = function() {
                            VisualizarSubmodulos(subModulos);
                        };
            
                        PosicionFinalizacion = j;
                    }
                }
                //console.log(BotonesAccionHabilitados[PosicionFinalizacion]);
                if(BotonesAccionHabilitados[PosicionFinalizacion]!=undefined){
                BotonesAccionHabilitados[PosicionFinalizacion].style.display = "none";
                }
                //console.log(BotonesAccionHabilitados)

            }
        }
        else{

            //=botonSubmenu_actual.disabled = false;
            //botonSubmenu_actual.classList.add("Activo");

            //console.log(subModulos);
            var BotonesAccion = document.getElementsByClassName("BotonAccion");
            for (var i = 0; i < BotonesAccion.length; i++) {
                BotonesAccion[i].style.display = "none";
            }

            var Submodulos = document.getElementsByClassName(subModulos);
            var PosicionFinal = 0;
            for (var i = 0; i < Submodulos.length; i++) {
                Submodulos[i].style.display = "revert";
                //console.log(Submodulos[i]);
                var BotonesAccionHabilitados = Submodulos[i].getElementsByClassName("BotonAccion");
                for (var j = 0; j < BotonesAccionHabilitados.length; j++) {
                    BotonesAccionHabilitados[j].style.display = "block";
                    BotonesAccionHabilitados[j].onclick = function() {
                        VisualizarSubmodulos(subModulos);
                    };
        
                    PosicionFinalizacion = j;
                }
            }
            BotonesAccionHabilitados[PosicionFinalizacion].style.display = "none";

        }
        

    }
</script>
<script>
    // Función para mover una fila hacia arriba o hacia abajo

function EjecutarAccionMoverModulos(rowId, direction) {
  MoverModulos(rowId)
    .then(function(datos) {
      AccionMoverModulos(rowId, direction,datos);
    })
    .catch(function(error) {
      console.log("Error: " + error);
    });
}


function MoverModulos(rowId) {
    return new Promise(function(resolve, reject) {
        var row = document.getElementById(rowId);
        var tableBody = document.getElementById("myTableBody");
        var rows = tableBody.getElementsByTagName("tr");

        var clase_class = row.className;
        var claseporencima = clase_class.split(' ');

        var ClasePrincipal = claseporencima[1];

        var ColeccionFilas = document.getElementsByClassName(ClasePrincipal);
        //console.log(ColeccionFilas);
        
        resolve(ColeccionFilas);
    }
    );
}



function AccionMoverModulos(rowId, direction, ColeccionFilas){

    //console.log(ColeccionFilas);
    if(direction == 1){


        var nuevoArreglo = [];
        var Ultimo = 0;
        for (var i = 0; i < ColeccionFilas.length; i++) {
            //console.log(ColeccionFilas[i]);
            nuevoArreglo.push(ColeccionFilas[i]);
            Ultimo = i;
        }

        //console.log(nuevoArreglo);
        if (ColeccionFilas[Ultimo].nextElementSibling && ColeccionFilas[Ultimo].nextElementSibling.tagName === 'TR'){
            //console.log(ColeccionFilas[Ultimo].nextElementSibling);
            var clase_class_next = ColeccionFilas[Ultimo].nextElementSibling.className;
            var claseporencima_next = clase_class_next.split(' ');

            var ClasePrincipal_Next = claseporencima_next[1];

            var ColeccionFilas_Next = document.getElementsByClassName(ClasePrincipal_Next);
            var Ultimo_Next = 0;
            for (var i = 0; i < ColeccionFilas_Next.length; i++) {
                //console.log(ColeccionFilas_Next[i]);
                Ultimo_Next = i;
            }

            var Ultima_Fila = ColeccionFilas_Next[Ultimo_Next]; // Obtener el elemento <tr> con id="p1"
            var Filas_Agregar = nuevoArreglo; // Obtener todos los elementos <tr> con la clase "p2"

            for (var i = Filas_Agregar.length - 1; i >= 0; i--) {
                //console.log(Filas_Agregar[i]);
                Ultima_Fila.parentNode.insertBefore(Filas_Agregar[i], Ultima_Fila.nextSibling);
            }

        }


    }else{

        var nuevoArreglo = [];
        var Ultimo = 0;
        for (var i = 0; i < ColeccionFilas.length; i++) {
            //console.log(ColeccionFilas[i]);
            nuevoArreglo.push(ColeccionFilas[i]);
        }

        //console.log(nuevoArreglo);
        if (ColeccionFilas[Ultimo].previousElementSibling  && ColeccionFilas[Ultimo].previousElementSibling .tagName === 'TR'){
            //console.log(ColeccionFilas[Ultimo].nextElementSibling);
            var clase_class_next = ColeccionFilas[Ultimo].previousElementSibling.className;
            var claseporencima_next = clase_class_next.split(' ');

            var ClasePrincipal_Next = claseporencima_next[1];

            var ColeccionFilas_Next = document.getElementsByClassName(ClasePrincipal_Next);
            var Ultimo_Next = 0;
            for (var i = 0; i < ColeccionFilas_Next.length; i++) {
                //console.log(ColeccionFilas_Next[i]);
                //Ultimo_Next = i;
            }

            var Ultima_Fila = ColeccionFilas_Next[Ultimo_Next]; // Obtener el elemento <tr> con id="p1"
            var Filas_Agregar = nuevoArreglo; // Obtener todos los elementos <tr> con la clase "p2"

            console.log(Ultima_Fila);
            for (var i = 0; i < Filas_Agregar.length; i++) {
                console.log(Filas_Agregar[i]);
                //Ultima_Fila.parentNode.insertAfter(Filas_Agregar[i], Ultima_Fila.nextSibling);
                //Ultima_Fila.insertAdjacentElement('afterend', Filas_Agregar[i])
                Ultima_Fila.parentNode.insertBefore(Filas_Agregar[i], Ultima_Fila);



            }


        }


    }
    

}




function MoverSubModulos(rowId, direction) {
  var tableBody = document.getElementById("myTableBody");
  var rows = tableBody.getElementsByTagName("tr");
  var currentIndex = Array.from(rows).findIndex(row => row.id === rowId);

  if (currentIndex > -1) {
    var newIndex = currentIndex + direction;

    if (newIndex >= 0 && newIndex < rows.length) {
      var currentRow = rows[currentIndex];
      var newRow = rows[newIndex];
    
        var claseporencima_clase = currentRow.className;
        var claseporencima = claseporencima_clase.split(' ');
        var claseasubir_clase = newRow.className;
        var claseasubir = claseasubir_clase.split(' ');

        claseporencima = claseporencima[0];
        claseasubir = claseasubir[0];


        var NombreClaseEncima = claseporencima.split('_')[0];
        var NombreClaseSubir = claseasubir.split('_')[0];

        var NumeroClaseEncima = claseporencima.split('_')[1];
        var NumeroClaseSubir = claseasubir.split('_')[1];

      if (direction === -1) {
        //console.log(newRow);
        //console.log(currentRow);

        if(claseporencima=="maxorden_"+NumeroClaseEncima && claseasubir=="orden_"+NumeroClaseSubir && NumeroClaseEncima==NumeroClaseSubir){
            //console.log("no se puede subir");
            //console.log(claseporencima);
            //console.log(claseasubir);
            //console.log("-");
            //console.log(claseporencima+'=="maxorden_"'+NumeroClaseEncima+' '+claseasubir+'=="orden_"'+NumeroClaseSubir);

        }else{
            tableBody.insertBefore(currentRow, newRow);
        }

      } else {
       //console.log(newRow);
        //console.log(currentRow);

        //console.log(claseporencima+'=="maxorden_"'+NumeroClaseEncima+' '+claseasubir+'=="orden_"'+NumeroClaseSubir);

        if(claseporencima=="orden_"+NumeroClaseEncima && claseasubir=="maxorden_"+NumeroClaseSubir && NumeroClaseEncima==NumeroClaseSubir){
            //console.log("no se puede subir");
            //console.log(claseporencima);
            //console.log(claseasubir);
            //console.log("-");
            //console.log(claseporencima+'=="maxorden_"'+NumeroClaseEncima+' '+claseasubir+'=="orden_"'+NumeroClaseSubir);

        }else{
            tableBody.insertBefore(newRow, currentRow);
        }

        //tableBody.insertBefore(newRow, currentRow);
      }
    }
  }
}



</script>
<script>
  $(document).ready(function() {
    $('#GruposTabla').DataTable({
      // Opciones adicionales de DataTables
      pageLength: 5,
      responsive: true,
      responsivePriority: 1

      //scrollY: '547px', // Especifica la altura máxima para el desplazamiento
      //scrollCollapse: true, // Permite el colapso de la tabla cuando el contenido es menor que la altura máxima
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        CargarAdministrarGrupos();
    })
</script>


<script>
    function DuplicarGrupo(valor){

$('#ModalDuplicado').modal('show');
$('#Grupo_Duplicar_id').val(valor);
}

function Duplicar_Grupo(){
var Nombre_Grupo_Duplicado = $('#Nombre_Grupo_Duplicado').val();
var Grupo_Duplicar_id = $('#Grupo_Duplicar_id').val();
$.ajax({
        type: "POST",
        url: "Perfiles_Menu_Duplicados_Ajax.php",
        data: {
            
            "Nombre_Grupo_Duplicado": Nombre_Grupo_Duplicado,
            "Grupo_Duplicar_id": Grupo_Duplicar_id,
            "usuario_id": '<?=$_SESSION['ID']?>',
            "Tipo_Consulta": "Duplicar Grupo"
        },
        success: function(response) {
            var Respuesta = JSON.parse(response);
            if(Respuesta.Estado=="true"){
                Swal.fire(
                'Completado!',
                'Se han Duplicado los Datos Correctamente!',
                'success'
                );

                setTimeout(function() {
    window.location.reload();
}, 2000); // 5000 milisegundos (5 segundos)
            }else{
                Swal.fire(
                'Error!',
                Respuesta.Mensaje,
                'danger'
                );

                setTimeout(function() {
    window.location.reload();
}, 3000); // 5000 milisegundos (5 segundos)

            }
        }
    });

}
</script>
