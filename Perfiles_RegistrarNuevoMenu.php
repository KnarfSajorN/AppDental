
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

function reem_menu($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$repl = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$find = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$repl = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

#Inicio
if (isset($_POST['Guardar_Informacion_MenuSimple'])) {

    $usuario_id = $_POST['usuario_id'];

    $Campo1 = mysqli_query($conn3, "show COLUMNS from main_menu WHERE Field = 'usuario_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `main_menu` ADD `usuario_id` INT(11) NULL DEFAULT '0' COMMENT '*Creado desde modulo de crear menus*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from main_menu WHERE Field = 'creado_sistema';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `main_menu` ADD `creado_sistema` INT(11) NULL DEFAULT '0' COMMENT '0-> creado desde tabla | 1-> creado por un usuario desde el sistema *Creado desde modulo de crear menus*'");
    }

    /*
    echo "<pre>";
    print_r($_POST['ArregloMenuSimple']);
    echo '</pre>';
    */

    foreach ($_POST["ArregloMenuSimple"] as $key => $value) {
        $nombre = reem_menu($value["Nombre"]);
        $url = $value["URL"];
        $icono = $value["Icono"];
        $color = $value["Color"];

        // Realiza una consulta SQL para insertar los valores en la base de datos
        $sql = "INSERT INTO main_menu ( nombre, pantalla, nivel, icon,color,usuario_id,creado_sistema) VALUES ( '$nombre', '$url', '1', '$icono','$color','$usuario_id','1')";
        $queryList = mysqli_query($conn3, $sql);
    }

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo un Error al Guardar el Menu'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo el Menu Correctamente'</script>";
    }
    
}

///////////////////////////////////////////////////////////////////////////

#Inicio
if (isset($_POST['Guardar_Informacion_MenuSubmenus'])) {

    $usuario_id = $_POST['usuario_id'];

    $Campo1 = mysqli_query($conn3, "show COLUMNS from main_menu WHERE Field = 'usuario_id';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `main_menu` ADD `usuario_id` INT(11) NULL DEFAULT '0' COMMENT '*Creado desde modulo de crear menus*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from main_menu WHERE Field = 'creado_sistema';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `main_menu` ADD `creado_sistema` INT(11) NULL DEFAULT '0' COMMENT '0-> creado desde tabla | 1-> creado por un usuario desde el sistema *Creado desde modulo de crear menus*'");
    }

    foreach ($_POST["ArregloMenu"] as $key => $value) {
        $nombre = reem_menu($value["Nombre"]);
        $url = "#";
        $icono = $value["Icono"];
        $color = $value["Color"];

        // Realiza una consulta SQL para insertar los valores en la base de datos
        $sql = "INSERT INTO main_menu ( nombre, pantalla, nivel, icon,color,usuario_id,creado_sistema) VALUES ( '$nombre', '$url', '1', '$icono','$color','$usuario_id','1')";
        $queryList = mysqli_query($conn3, $sql);

        $Menu_id = mysqli_insert_id($conn3);
    }


    foreach ($_POST["ArregloSubMenus"] as $key => $value) {
        $nombre = reem_menu($value["Nombre"]);
        $url = $value["URL"];
        $icono = $value["Icono"];
        $color = $value["Color"];

        // Realiza una consulta SQL para insertar los valores en la base de datos
        $sql = "INSERT INTO main_menu ( nombre, pantalla, nivel, icon,color,usuario_id,idPrincipal,creado_sistema) VALUES ( '$nombre', '$url', '2', '$icono','$color','$usuario_id','$Menu_id','1')";
        $queryList = mysqli_query($conn3, $sql);
    }

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo un Error al Guardar el Menu'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo el Menu Correctamente'</script>";
    }
    
}

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
#loadingAnimation {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
#loadingOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6); /* Color de fondo gris semi-transparente */
    z-index: 9999; /* Asegura que esté encima de otros elementos */
    display: none; /* Inicialmente oculto */
}

#MenuGeneral{
    border: 4px solid #9cc3db;
}

#TituloMenu{
    text-align-last: center;
    align-self: center;
    font-size: 26px;
}

#MenuPrincipal{
    padding-bottom: 15px;
    margin-top: 15px;
    border-bottom: 4px solid #9cc3db;
    margin-bottom: 15px;
}
</style>

<script src="plugins/LottieK/lottie.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Menus </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro de Menus </h4>
                <div class="box">
                    <div class="box-body">

                    <div class="row">

                        <div class="col-md-12"  >
                            <button  class="btn btn-block btn-outline-secondary mb-2 rounded-pill" onclick='window.location="Perfiles_MenuCreados_Historial.php";'>
                                <h4><strong><i class="fa fa-glyphicon glyphicon-plus"></i> Historial Menus Creados</strong></h4>
                            </button>
                        </div>

                        <div class="col-md-6">
                            <button id="btnAgregarMenuSimple" class="btn btn-block btn-outline-info mb-2 rounded-pill">
                                <h4><strong><i class="fa fa-glyphicon glyphicon-plus"></i> Agregar Menú Simple</strong></h4>
                            </button>
                        </div>

                        <div class="col-md-6" style="display:none;" id="btnRefrescar" >
                            <button  class="btn btn-block btn-outline-secondary mb-2 rounded-pill" onclick='window.location.reload();'>
                                <h4><strong><i class="fa fa-glyphicon glyphicon-plus"></i> Refrescar</strong></h4>
                            </button>
                        </div>


                        <div class="col-md-6">
                            <button id="btnAgregarMenuConSubmenus" class="btn btn-block btn-outline-info mb-2 rounded-pill">
                                <h4><strong><i class="fa fa-glyphicon glyphicon-plus"></i> Agregar Menú con Submenús</strong></h4>
                            </button>
                        </div>

                        <div class="col-md-6" style="display:none;" id="btnsubmenus" >
                            <button  id="AgregarDetalleSubMenu" class="btn btn-block btn-outline-success mb-2 rounded-pill" >
                                <h4><strong><i class="fa fa-glyphicon glyphicon-plus"></i> Agregar Detalle SubMenu</strong></h4>
                            </button>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>


                    <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>' method="POST" enctype="multipart/form-data" class="row">
                        <div id="InformacionMenus" class="col-md-12">
                                
                        </div>
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">
                        <div class="col-sm-12">
                            <br>
                            <center>
                                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_MenuSimple" id="btnGuardar" style="display:none;"><h2> <strong> G u a r d a r <i class="fas fa-angle-down float-right mt-2"></i></strong> </h2></button>
                            </center>

                            <center>
                                <button type="submit" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow" name="Guardar_Informacion_MenuSubmenus" id="btnGuardarSubMenu" style="display:none;"><h2> <strong> G u a r d a r <i class="fas fa-angle-down float-right mt-2"></i></strong> </h2></button>
                            </center>

                        </div>
                    </form>

                    <div id="loadingOverlay"></div>

                    <div id="loadingAnimation" class="text-center">
                        <lottie-player src="https://lottie.host/198605e5-79df-4bc1-b77d-f49e48ccd28d/CbSxvqurdT.json" mode="bounce" background="transparent" speed="0.5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                    </div>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
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

<script>
        // Función para agregar campos de menú
        var ContadorCamposSimples = 0;
        function agregarCamposMenu() {
            // Crea un nuevo div con las clases de Bootstrap
            var nuevoMenu = $('<div class="row mb-2">');
            
            // Agrega campos de nombre, URL, icono y color
            nuevoMenu.append('<div class="col-md-3"><input type="text" name="ArregloMenuSimple['+ContadorCamposSimples+'][Nombre]" class="form-control" placeholder="Nombre" required></div>');
            nuevoMenu.append('<div class="col-md-3"><input type="text" name="ArregloMenuSimple['+ContadorCamposSimples+'][URL]" class="form-control" placeholder="URL" required></div>');

            // Crear select para la columna "Icono"
            var selectIcono = document.createElement("select");
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.title = "Icono";
            selectIcono.name = 'ArregloMenuSimple['+ContadorCamposSimples+'][Icono]';
            
            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                option.title = "Icono";
                selectIcono.append(option);
            }

            var DivContenedor = document.createElement("div");
            DivContenedor.classList.add("col-md-3");
            DivContenedor.append(selectIcono);

            nuevoMenu.append(DivContenedor);

            nuevoMenu.append('<div class="col-md-1"><input type="color" name="ArregloMenuSimple['+ContadorCamposSimples+'][Color]" class="form-control" placeholder="Color"></div>');
            
            // Agrega un botón para eliminar el menú
            nuevoMenu.append('<div class="col-md-2"><button class="btn btn-block btn-outline-danger mb-2 rounded-pill btnEliminarMenu">Eliminar</button></div>');
            
            // Agrega el nuevo menú al div InformacionMenus
            $('#InformacionMenus').append(nuevoMenu);

            ContadorCamposSimples++;
            
            var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            SelectIconos_Class(".IconoMenu", ArregloIconos);
        }


        function MostrarGuardar() {
            var camposMenu = $('#InformacionMenus .row');
            //console.log(camposMenu.length);
            if (camposMenu.length > 0) {
                // Si hay campos de menú, muestra el botón de guardar
                $('#btnGuardar').show();
            } else {
                // Si no hay campos de menú, oculta el botón de guardar
                $('#btnGuardar').hide();
            }
        }














        var ContadorCamposSimplesSubMenu = 0;
        function agregarCamposSubMenu() {
            // Crea un nuevo div con las clases de Bootstrap

            var nuevoMenu = $('<div class="row col-md-12">');
            
            // Agrega campos de nombre, URL, icono y color
            nuevoMenu.append('<div class="col-md-3"><input type="text" name="ArregloSubMenus['+ContadorCamposSimplesSubMenu+'][Nombre]" class="form-control" placeholder="Nombre del Submenu" required></div>');
            nuevoMenu.append('<div class="col-md-3"><input type="text" name="ArregloSubMenus['+ContadorCamposSimplesSubMenu+'][URL]" class="form-control" placeholder="URL" required></div>');

            // Crear select para la columna "Icono"
            var selectIcono = document.createElement("select");
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.title = "Icono";
            selectIcono.name = 'ArregloSubMenus['+ContadorCamposSimplesSubMenu+'][Icono]';
            
            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                option.title = "Icono";
                selectIcono.append(option);
            }

            var DivContenedor = document.createElement("div");
            DivContenedor.classList.add("col-md-3");
            DivContenedor.append(selectIcono);

            nuevoMenu.append(DivContenedor);

            nuevoMenu.append('<div class="col-md-1"><input type="color" name="ArregloSubMenus['+ContadorCamposSimplesSubMenu+'][Color]" class="form-control" placeholder="Color"></div>');
            
            // Agrega un botón para eliminar el menú
            nuevoMenu.append('<div class="col-md-2"><button type="button" class="btn btn-block btn-outline-danger mb-2 rounded-pill " onclick="EliminarSubMenu(this)" >Eliminar</button></div>');
            
            // Agrega el nuevo menú al div InformacionMenus
            $('#MenuGeneral').append(nuevoMenu);

            ContadorCamposSimplesSubMenu++;
            
            var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            SelectIconos_Class(".IconoMenu", ArregloIconos);
        }

        function AgregarMenu(){
            var ContadorMenu=0;
            var nuevoMenu = $('<div class="row col-md-12" id="MenuPrincipal">');
            

            nuevoMenu.append('<div class="col-md-3" id="TituloMenu">Menu</div>');

            // Agrega campos de nombre, URL, icono y color
            nuevoMenu.append('<div class="col-md-3"><input type="text" name="ArregloMenu['+ContadorMenu+'][Nombre]" class="form-control" placeholder="Nombre del Menu" required></div>');

            // Crear select para la columna "Icono"
            var selectIcono = document.createElement("select");
            selectIcono.classList.add("form-control", "input-lg", "IconoMenu");
            selectIcono.style.width = "100%";
            selectIcono.title = "Icono";
            selectIcono.name = 'ArregloMenu['+ContadorMenu+'][Icono]';
            
            var options = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            for (var i = 0; i < options.length; i++) {
                var option = new Option('<i class="' + options[i] + '"></i>', options[i], false, false);
                option.title = "Icono";
                selectIcono.append(option);
            }

            var DivContenedor = document.createElement("div");
            DivContenedor.classList.add("col-md-3");
            DivContenedor.append(selectIcono);

            nuevoMenu.append(DivContenedor);

            nuevoMenu.append('<div class="col-md-3"><input type="color" name="ArregloMenu['+ContadorMenu+'][Color]" class="form-control" placeholder="Color"></div>');
            
            // Agrega un botón para eliminar el menú
            

            var DivContenedorMenu = document.createElement("div");
            DivContenedorMenu.classList.add("col-md-12");
            DivContenedorMenu.id = 'MenuGeneral';
            
            // Agrega el nuevo menú al div InformacionMenus
            $('#InformacionMenus').append(DivContenedorMenu);

            $('#MenuGeneral').append(nuevoMenu);
            
            var ArregloIconos = JSON.parse(<?php echo json_encode($arreglojson); ?>);
            SelectIconos_Class(".IconoMenu", ArregloIconos);

            agregarCamposSubMenu();
        }


        function MostrarGuardarSubMenus() {
            var camposMenu = $('#MenuGeneral .row');
            console.log(camposMenu.length);
            if (camposMenu.length > 0) {
                // Si hay campos de menú, muestra el botón de guardar
                $('#btnGuardarSubMenu').show();
            } else {
                // Si no hay campos de menú, oculta el botón de guardar
                $('#btnGuardarSubMenu').hide();
            }
        }

        


        // Manejadores de eventos
        function EliminarSubMenu(valor){
                $(valor).closest('.row').remove();
                MostrarGuardarSubMenus();
        }

        var contadormenu="0";
        $(document).ready(function () {
            $('#btnAgregarMenuSimple').click(function () {
                contadormenu++;

                agregarCamposMenu();

                if(contadormenu=="1"){
                    $('#btnAgregarMenuConSubmenus').hide();

                    // Mostrar el fondo gris y la animación Lottie
                    $('#loadingOverlay').show();
                    $('#loadingAnimation').show();

                    // Ocultar el fondo gris y la animación Lottie después de 1 segundo
                    setTimeout(function () {
                        $('#loadingOverlay').hide();
                        $('#loadingAnimation').hide();
                    }, 1000); // 1000 milisegundos (1 segundo)

                    $('#btnRefrescar').show();
                }
                
                MostrarGuardar();
            });

            // Manejador de eventos para eliminar menús
            $('#InformacionMenus').on('click', '.btnEliminarMenu', function () {
                $(this).closest('.row').remove();
                MostrarGuardar();
            });











            $('#btnAgregarMenuConSubmenus').click(function () {
                AgregarMenu();
                $('#btnAgregarMenuSimple').hide();
                $('#btnAgregarMenuConSubmenus').hide();

                // Mostrar el fondo gris y la animación Lottie
                $('#loadingOverlay').show();
                    $('#loadingAnimation').show();

                    // Ocultar el fondo gris y la animación Lottie después de 1 segundo
                    setTimeout(function () {
                        $('#loadingOverlay').hide();
                        $('#loadingAnimation').hide();
                    }, 1000); // 1000 milisegundos (1 segundo)

                //btnsubmenus show
                $('#btnsubmenus').show();
                $('#btnRefrescar').show();
            });

            $('#AgregarDetalleSubMenu').click(function () {
                agregarCamposSubMenu();
                MostrarGuardarSubMenus();
            });
            

        });
    </script>