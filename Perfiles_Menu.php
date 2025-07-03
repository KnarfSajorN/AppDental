<?php
include 'header.php';
include 'menu.php';
//include 'Perfiles_Menu_Visual.php';

$_POST = DatosIngresarMysqli($_POST);

if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from grupos WHERE Field = 'Arreglo_Grupos';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `grupos` ADD `Arreglo_Grupos` TEXT NULL DEFAULT '' COMMENT '*Creado desde modulo de Perfiles_Menu*'");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from grupos WHERE Field = 'Arreglo_Grupos_Orden';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `grupos` ADD `Arreglo_Grupos_Orden` TEXT NULL DEFAULT '' COMMENT '*Creado desde modulo de Perfiles_Menu*'");
    }

    $Nombre_Perfil = $_POST['Nombre_Perfil'];
    $usuario_id = $_POST['usuario_id'];
    $CheckGrupos = $_POST['CheckGrupos'];
    $CheckGrupos_Orden = $_POST['CheckGrupos_Orden'];
    /*
    foreach ($CheckGrupos_Orden as $key => $value) {
        //$Arreglo_Grupos_Orden[] = $value;
        echo $value." <br>";
        $Entro=0;
        foreach ($CheckGrupos as $key1 => $value1) {
            //$Arreglo_Grupos_Orden[] = $value;
            if($value==$value1){
                $Arreglo_Grupos_Orden[$value] = "1";
                $Entro=1;
            }
        }
        if($Entro==0){
            $Arreglo_Grupos_Orden[$value] = 0;
        }

    } 
    */
    echo "<hr>";
    
    foreach ($CheckGrupos as $key => $value) {
        //$Arreglo_Grupos_Orden[] = $value;
        echo $value." <br>";
    } 

    echo "<hr>";

    echo "<pre>";
    print_r($Arreglo_Grupos_Orden);
    echo "</pre>";
    //exit();

    //$Arreglo_Grupos_Orden = json_encode($Arreglo_Grupos_Orden);
    $Arreglo_Grupos_Orden = json_encode($CheckGrupos_Orden);
    $Arreglo_Grupos = json_encode($CheckGrupos);
    $queryList = mysqli_query($conn3, "INSERT INTO grupos (nombre,Arreglo_Grupos,Arreglo_Grupos_Orden) VALUES ('$Nombre_Perfil','$Arreglo_Grupos','$Arreglo_Grupos_Orden')");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardaron Los Datos Correctamente'</script>";
    }
}



if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $arreglo_id = $_POST['arreglo_id'];

    $Nombre_Perfil = $_POST['Nombre_Perfil'];
    $usuario_id = $_POST['usuario_id'];
    $CheckGrupos = $_POST['CheckGrupos'];
    $Arreglo_Grupos = json_encode($CheckGrupos);

    $CheckGrupos_Orden = $_POST['CheckGrupos_Orden'];
    $Arreglo_Grupos_Orden = json_encode($CheckGrupos_Orden);
    //$queryList = mysqli_query($conn3, "INSERT INTO grupos (nombre,Arreglo_Grupos) VALUES ('$Nombre_Perfil','$Arreglo_Grupos')");
    //update de lo de arriba 
    $queryList = mysqli_query($conn3, "UPDATE grupos SET nombre='$Nombre_Perfil',Arreglo_Grupos='$Arreglo_Grupos',Arreglo_Grupos_Orden='$Arreglo_Grupos_Orden' WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizaron Los Datos Correctamente'</script>";
    }
}

if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $categoria_id = $_GET['Categoria'];

    $queryList = mysqli_query($conn3, "UPDATE grupos SET estado='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}

if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  grupos where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $datos = $rowMotorizado["Arreglo_Grupos_Orden"];
        $datos_checks = $rowMotorizado["Arreglo_Grupos"];
        $nombre = $rowMotorizado["nombre"];
    }
    $datos_json = json_encode($datos, true);
    $datos_checks = json_encode($datos_checks, true);
    //echo $datos_json;
    if($datos_json == '""'){
        $datos_json = "'{}'";
    }

    if($datos_checks == '""'){
        $datos_checks = "'{}'";
    }

    $MovimientoEditar = "$(document).ready(function() {
        var inputElement = $('#LABELPERFIL');
        $('html, body').animate({
          scrollTop: inputElement.offset().top
        }, 1000);
      });";
?>
<script>


    function orderTableRows(arregloIDs) {
        var tabla = document.getElementById("Tabla_Grupos");
        var tbody = tabla.getElementsByTagName("tbody")[0];
        var filas = tbody.getElementsByTagName("tr");
        
        // Convertir las filas en un arreglo para poder ordenarlas
        var filasArray = Array.from(filas);
        
        //console.log(filasArray);
        // Ordenar las filas según el arreglo de IDs
        filasArray.sort(function(a, b) {
            var idA = parseInt(a.id.split("_")[1]);
            var idB = parseInt(b.id.split("_")[1]);
            
            // Comparar los IDs y retornar el resultado de la comparación
            return arregloIDs.indexOf(idA.toString()) - arregloIDs.indexOf(idB.toString());
        });
        
        // Remover las filas existentes
        while (tbody.firstChild) {
            tbody.removeChild(tbody.firstChild);
        }
        
        // Agregar las filas en el nuevo orden
        filasArray.forEach(function(fila) {
            tbody.appendChild(fila);
        });
    }


</script>

    <script>
        window.onload = function() {
            var Arreglo = JSON.parse(<?php echo $datos_json ?>);
            var Arreglo_Grupos = JSON.parse(<?php echo $datos_checks ?>);
            var Nombre = "<?php echo $nombre ?>";
            for (index in Arreglo_Grupos) {

                //console.log(Arreglo[index]);
                if (document.getElementById("Grupo_" + Arreglo_Grupos[index]) != null) {
                    document.getElementById("Grupo_" + Arreglo_Grupos[index]).checked = true;
                }
            }

            document.getElementById("Nombre_Perfil").value = Nombre;
            orderTableRows(Arreglo);

            // Obtener la referencia al elemento input
            var inputElement = document.getElementById('LABELPERFIL');
            // Realizar el desplazamiento hacia el elemento input
            inputElement.scrollIntoView({ behavior: 'smooth' });
        };
    </script>
<?php
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$categoria_id = $_GET["Categoria"];
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
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Perfiles</h2>
                                        <table id="example2" class="table table-bordered table-striped" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Perfil</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * from grupos where estado = 1");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['nombre'];

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr ><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' style='width: 50%;' ><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                        <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width: 50%;' > <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>

                                                        <font> <a onclick='DuplicarPerfil($id)' class='btn btn-block btn-outline-secondary btn-lg rounded-pill shadow' style='width: 50%;' > <i class='fa fa-copy' title='Duplicar'> Duplicar</i></a></font><br>

                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                        /*
                        $queryList = mysqli_query($conn3, "SELECT * from main_menu GROUP BY icon");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    $Arreglo[] = $rowMotorizado['icon'];
                                                }
                                            
                        echo "<pre>";
                        print_r($Arreglo);
                        echo "</pre>";

                        echo json_encode($Arreglo);
                        */
                        ?>
                        <hr>

                        <button type="button" class="btn btn-outline-info rounded-pill" style="width:100%" data-toggle="modal" data-target="#administrarGruposModal" onclick="window.location='Perfiles_Menu_Grupos.php'">
                         <h1>      Administrar Grupos</h1>
                        </button>

                        <hr>

                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>' method="POST">
                        
                            <div class="form-group col-md-12">
                                <label id="LABELPERFIL">Nombre del Perfil</label>
                                <input type="text" class="form-control input-lg" name="Nombre_Perfil" id="Nombre_Perfil" data-name="Nombre del Perfil" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            
                            <h2 style="text-align: center;font-weight: bold;"> Grupos</h2>

                            <script>
                                function moveTableRowUp(rowId) {
                                    var row = document.getElementById('Tr_' + rowId);
                                    var previousRow = row.previousElementSibling;
                                    if (previousRow && previousRow.tagName === 'TR') {
                                        row.parentNode.insertBefore(row, previousRow);
                                    }
                                }

                                function moveTableRowDown(rowId) {
                                    var row = document.getElementById('Tr_' + rowId);
                                    var nextRow = row.nextElementSibling;
                                    if (nextRow && nextRow.tagName === 'TR') {
                                        row.parentNode.insertBefore(nextRow, row);
                                    }
                                }
                            </script>

                            <table id="Tabla_Grupos" class="table table-bordered table-striped casilla" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th align="center">Activo</th>
                                        <th align="center">Módulo</th>
                                        <th align="center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $QueryMenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE Activo = 1");
                                    while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                                        $Nombre_Grupo = $RowMenu['Nombre_Grupo'];
                                        $id = $RowMenu["id"];

                                        echo "<tr id='Tr_$id'>";
                                        echo "<td align='center'> <input type='checkbox'  class='checkbox' name='CheckGrupos[]' value='$id' id='Grupo_$id' > <input type='hidden'  name='CheckGrupos_Orden[]' value='$id' > </td>";
                                        echo "<td align='center'> $Nombre_Grupo </td>";

                                        echo '<td align="center">
                                        <button class="btn btn-outline-info rounded-pill btn-sm" type="button" onclick="moveTableRowUp('.$id.')">
                                            <i class="fas fa-arrow-up"></i>
                                        </button>
                                        <button class="btn btn-outline-info rounded-pill btn-sm" type="button" onclick="moveTableRowDown('.$id.')">
                                            <i class="fas fa-arrow-down"></i>
                                        </button>
                                    </td>';
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                            <input type="hidden" name="categoria_id" value="<?php echo $categoria_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-sm" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-sm" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>




                    </div>
                </div>
            </div>
        
    </section>
    <!-- /.content -->
</div>


<!--
<div class="modal fade" id="administrarGruposModal" tabindex="-1" role="dialog" aria-labelledby="administrarGruposModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="administrarGruposModalLabel">Administrar Grupos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='#' method="POST" id="FormularioGrupos" onsubmit="event.preventDefault();GuardarActualizar_Grupo();">
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
                    <div id="Modulos_Menu" style="height: 427px;overflow-y: scroll;">

                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div id="Grupo_Accion">
                        <div class="col-sm-12">
                            <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-sm" name="Guardar_Informacion_Menu">
                                    <h2> <strong> G u a r d a r </strong> </h2>
                                </button></center>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>

                </form>
                <div id="Modulos_Menu">
                    <div class="col-md-12">
                        <h2 style="text-align: center;font-weight: bold;"> Grupos</h2>
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th>
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
                                    $Descripcion_Grupo = $rowMotorizado['Descripcion_Grupo'];
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
                                                        <td width='20%' align='center'>{$Descripcion_Grupo}</td>
                                                        <td width='20%' align='center' class='table-modulos-activos'>{$ModulosActivos}</td>
                                                        <td width='20%' align='center'><font color='#04CC05'> <a onclick='EditarGrupo({$id})' class='btn btn-outline-info rounded-pill' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                            <font> <a onclick='EliminarGrupo({$id})'class='btn btn-outline-info rounded-pill' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                                        </td></tr>";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .table-modulos-activos{
        height: 200px;
    overflow-y: scroll;
    display: block;
    width: 100%;
    }
</style>
-->




<!-- El Modal -->
<div class="modal fade" id="ModalDuplicado">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Encabezado del Modal -->
      <div class="modal-header">
        <h5 class="modal-title">Duplicar Perfil</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Contenido del Modal -->
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Nombre del Perfil Duplicado</label>
          <input type="text" class="form-control" id="Nombre_Perfil_Duplicado" name="Nombre_Perfil_Duplicado" placeholder="Menu">
        </div>
        <input  type="hidden" id="Perfil_Duplicar_id" >
      </div>
      
      <!-- Pie del Modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-outline-info btn-lg rounded-pill shadow" onclick ="Duplicar_Perfil();">Crear Duplicado</button>
      </div>
      
    </div>
  </div>
</div>


<?php
include 'footer.php';
?>

<script>
<?php echo $MovimientoEditar; ?>
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter '
$(document).on('input', 'input,textarea', function() {
  $(this).val($(this).val().replace(/['"]/g, ''));
});
</script>
<?php
// Ruta del archivo JSON
$rutaJson = 'Perfil_Menu_Iconos.json';
// Leer el contenido del archivo JSON
$jsonData = file_get_contents($rutaJson);
// Codificar los datos JSON para su uso en JavaScript
$encodedJsonData = json_decode($jsonData, true);

$arreglojson = json_encode($encodedJsonData);

//echo "<pre>";
//print_r($encodedJsonData);
//echo "</pre>";

//echo $encodedJsonData;
?>
<script>
/*
    function SelectIconos_Class(Selecticon, options) {
        $(Selecticon).each(function() {
            var select = $(this);
            select.select2({
                escapeMarkup: function(markup) {
                    return markup;
                },
                templateResult: function(data) {
                    var $result = $('<span></span>');
                    $result.html(data.text);
                    return $result;
                },
                width:"100%"
            });
        });


    }
    */
</script>



<script type="text/javascript">
    /*
    //que tengan los mismo campos tanto esta funcion como la de editar
    function CargarTablaMenus(datos) {

        var contenedorTabla = document.getElementById("Modulos_Menu");

        // Crear la tabla
        var tabla = document.createElement("table");
        tabla.classList.add("table", "text-center");

        // Crear la fila de encabezado
        var encabezado = tabla.createTHead().insertRow();
        var encabezadoColumnas = ["Activo", "Nombre", "Color", "Icono",""];

        // Crear las celdas del encabezado
        for (var i = 0; i < encabezadoColumnas.length; i++) {
            var encabezadoCelda = document.createElement("th");
            encabezadoCelda.textContent = encabezadoColumnas[i];
            if (encabezadoColumnas[i] == "Activo" || encabezadoColumnas[i] == "Color") {
                encabezadoCelda.style.width = "10%";
            } else {
                encabezadoCelda.style.width = "40%";
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
            var celdaMover = fila.insertCell(); 

            // Agregar la clase "align-middle" a las celdas para centrar su contenido verticalmente
            celdaActivo.classList.add("align-middle");
            celdaNombre.classList.add("align-middle");
            celdaColor.classList.add("align-middle");
            celdaIcono.classList.add("align-middle");
            celdaMover.classList.add("align-middle");

            // Aplicar estilos personalizados a las celdas
            celdaActivo.style.width = "10%";
            celdaColor.style.width = "10%";
            celdaNombre.style.width = "30%"; 
            celdaIcono.style.width = "30%"; 
            celdaMover.style.width = "20%";

            // Crear checkbox para la columna "Activo"
            var checkboxActivo = document.createElement("input");
            checkboxActivo.type = "checkbox";
            checkboxActivo.name = "Arreglo[Activo][" + elemento.id + "]"; // Agregar el atributo "name"
            checkboxActivo.value = "1"; // Check
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
            inputColor.value = "#32373d";
            celdaColor.appendChild(inputColor);

            // Crear select para la columna "Icono"
            var selectIcono = document.createElement("select");
            selectIcono.name = "Arreglo[Icono][" + elemento.id + "]"; // Agregar el atributo "name"
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.id = "ListaIconos";

            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                var option = new Option('<i class="' + options[i] + '"></i> - ' + options[i], options[i], false, false);
                //option.setAttribute('data-icon', options[i]);
                if (options[i] === elemento.Icono) {
                    option.selected = true; // Aplicar "selected" a la opción correspondiente
                }
                
                selectIcono.append(option);
            }
            
            
            //var opcionesIcono = ["icon-desktop-pulse-24-filled", "icon-cogs"]; // Opciones de ejemplo
            //opcionesIcono.forEach(function(opcion) {
           //     var opcionElemento = document.createElement("option");
            //    opcionElemento.value = opcion;
            //    opcionElemento.textContent = opcion;
            //    selectIcono.appendChild(opcionElemento);
            //});
            
            celdaIcono.appendChild(selectIcono);


            
            // Crear botón para mover la fila hacia arriba
            var botonMoverArriba = document.createElement("button");
            botonMoverArriba.innerHTML = '<i class="fas fa-arrow-up"></i>';
            botonMoverArriba.classList.add("btn", "btn-outline-info rounded-pill", "btn-sm");
            botonMoverArriba.type = "button"; // Agregar el atributo "type"
            botonMoverArriba.addEventListener("click", function() {
                moveTableRow(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
            });
            celdaMover.appendChild(botonMoverArriba);

            // Crear botón para mover la fila hacia abajo
            var botonMoverAbajo = document.createElement("button");
            botonMoverAbajo.innerHTML = '<i class="fas fa-arrow-down"></i>';
            botonMoverAbajo.classList.add("btn", "btn-outline-info rounded-pill", "btn-sm");
            botonMoverAbajo.type = "button"; // Agregar el atributo "type"
            botonMoverAbajo.addEventListener("click", function() {
                moveTableRow(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
            });
            celdaMover.appendChild(botonMoverAbajo);

            // Asignar un ID único a la fila
            fila.id = "row_" + elemento.id;



        });

        // Agregar la tabla al contenedor
        contenedorTabla.appendChild(tabla);

        //SelectIconosConJSON('#ListaIconos', 'Perfil_Menu_Iconos.json');
        var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
        //console.log(ArregloIconos);
        SelectIconos_Class(".IconoMenu", ArregloIconos);
    }

    function EditarTablaMenus(datos,datos_input,datos_descripcion) {

        var contenedorTabla = document.getElementById("Modulos_Menu");

        // Crear la tabla
        var tabla = document.createElement("table");
        tabla.classList.add("table", "text-center");

        // Crear la fila de encabezado
        var encabezado = tabla.createTHead().insertRow();
        var encabezadoColumnas = ["Activo", "Nombre", "Color", "Icono",""];

        // Crear las celdas del encabezado
        for (var i = 0; i < encabezadoColumnas.length; i++) {
            var encabezadoCelda = document.createElement("th");
            encabezadoCelda.textContent = encabezadoColumnas[i];
            if (encabezadoColumnas[i] == "Activo" || encabezadoColumnas[i] == "Color") {
                encabezadoCelda.style.width = "10%";
            } else {
                encabezadoCelda.style.width = "40%";
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
            var celdaMover = fila.insertCell(); 

            // Agregar la clase "align-middle" a las celdas para centrar su contenido verticalmente
            celdaActivo.classList.add("align-middle");
            celdaNombre.classList.add("align-middle");
            celdaColor.classList.add("align-middle");
            celdaIcono.classList.add("align-middle");
            celdaMover.classList.add("align-middle");

            // Aplicar estilos personalizados a las celdas
            celdaActivo.style.width = "10%";
            celdaColor.style.width = "10%";
            celdaNombre.style.width = "30%"; 
            celdaIcono.style.width = "30%"; 
            celdaMover.style.width = "20%";

            // Crear checkbox para la columna "Activo"
            var checkboxActivo = document.createElement("input");
            checkboxActivo.type = "checkbox";
            checkboxActivo.name = "Arreglo[Activo][" + elemento.id + "]"; // Agregar el atributo "name"
            checkboxActivo.value = "1"; // Check

            if (elemento.Activo == "1") {
                checkboxActivo.checked = true;
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
            celdaColor.appendChild(inputColor);

            
            // Crear select para la columna "Icono"
            //var selectIcono = document.createElement("select");
            //selectIcono.name = "Arreglo[Icono][" + elemento.id + "]"; // Agregar el atributo "name"
            //var opcionesIcono = ["icon-desktop-pulse-24-filled", "icon-cogs"]; // Opciones de ejemplo
            //opcionesIcono.forEach(function(opcion) {
            //    var opcionElemento = document.createElement("option");
            //    opcionElemento.value = opcion;
            //    opcionElemento.textContent = opcion;
            //    selectIcono.appendChild(opcionElemento);
            //});
            //celdaIcono.appendChild(selectIcono);
            

            var selectIcono = document.createElement("select");
            selectIcono.name = "Arreglo[Icono][" + elemento.id + "]"; // Agregar el atributo "name"
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.id = "ListaIconos";

            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                var option = new Option('<i class="' + options[i] + '"></i> - ' + options[i], options[i], false, false);
                //option.setAttribute('data-icon', options[i]);
                if (options[i] === elemento.Icono) {
                    option.selected = true; // Aplicar "selected" a la opción correspondiente
                }

                selectIcono.append(option);
            }
            celdaIcono.appendChild(selectIcono);



            // Crear botón para mover la fila hacia arriba
            var botonMoverArriba = document.createElement("button");
            botonMoverArriba.innerHTML = '<i class="fas fa-arrow-up"></i>';
            botonMoverArriba.classList.add("btn", "btn-outline-info rounded-pill", "btn-sm");
            botonMoverArriba.type = "button"; // Agregar el atributo "type"
            botonMoverArriba.addEventListener("click", function() {
                moveTableRow(fila.id, -1); // Llama a la función moveTableRow para mover la fila hacia arriba
            });
            celdaMover.appendChild(botonMoverArriba);

            // Crear botón para mover la fila hacia abajo
            var botonMoverAbajo = document.createElement("button");
            botonMoverAbajo.innerHTML = '<i class="fas fa-arrow-down"></i>';
            botonMoverAbajo.classList.add("btn", "btn-outline-info rounded-pill", "btn-sm");
            botonMoverAbajo.type = "button"; // Agregar el atributo "type"
            botonMoverAbajo.addEventListener("click", function() {
                moveTableRow(fila.id, 1); // Llama a la función moveTableRow para mover la fila hacia abajo
            });
            celdaMover.appendChild(botonMoverAbajo);

            // Asignar un ID único a la fila
            fila.id = "row_" + elemento.id;
            







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
                        //console.log(datos);
                        document.getElementById("Modulos_Menu").innerHTML = "";
                        EditarTablaMenus(datos);

                        $("#Nombre_Grupo").val(Respuesta.Nombre);
                        $("#Descripcion_Grupo").val(Respuesta.Descripcion);

                        var inputNombreOriginal = document.createElement("input");
                        inputNombreOriginal.type = "hidden";
                        inputNombreOriginal.name = "Grupo_edicion_id"; // Agregar el atributo "name"
                        inputNombreOriginal.value = id; // Agregar el atributo "value"
                        document.getElementById("Modulos_Menu").appendChild(inputNombreOriginal);

                        document.getElementById("Grupo_Accion").innerHTML = '<div class="col-sm-12"><center><button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-sm" id="Actualizar_Informacion_Menu" name="Actualizar_Informacion_Menu"><h2> <strong> A c t u a l i z a r </strong> </h2></button></center></div>';
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
    */
</script>
<script>
    /*
    // Función para mover una fila hacia arriba o hacia abajo
function moveTableRow(rowId, direction) {
  var tableBody = document.getElementById("myTableBody");
  var rows = tableBody.getElementsByTagName("tr");
  var currentIndex = Array.from(rows).findIndex(row => row.id === rowId);

  if (currentIndex > -1) {
    var newIndex = currentIndex + direction;

    if (newIndex >= 0 && newIndex < rows.length) {
      var currentRow = rows[currentIndex];
      var newRow = rows[newIndex];

      if (direction === -1) {
        tableBody.insertBefore(currentRow, newRow);
      } else {
        tableBody.insertBefore(newRow, currentRow);
      }
    }
  }
}
*/
</script>
<script>
function DuplicarPerfil(valor){

    $('#ModalDuplicado').modal('show');
    $('#Perfil_Duplicar_id').val(valor);
}

function Duplicar_Perfil(){
    var Nombre_Perfil_Duplicado = $('#Nombre_Perfil_Duplicado').val();
    var Perfil_Duplicar_id = $('#Perfil_Duplicar_id').val();
    $.ajax({
            type: "POST",
            url: "Perfiles_Menu_Duplicados_Ajax.php",
            data: {
                
                "Nombre_Perfil_Duplicado": Nombre_Perfil_Duplicado,
                "Perfil_Duplicar_id": Perfil_Duplicar_id,
                "Tipo_Consulta": "Duplicar Perfil"
            },
            success: function(response) {
                var Respuesta = JSON.parse(response);
                if(Respuesta.Estado=="true"){
                    Swal.fire(
                    'Completado!',
                    'Se han Duplicaron los Datos Correctamente!',
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