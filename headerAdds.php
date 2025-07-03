<script src="editorNuevo.js"></script>
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    // Invocamos cada 5 segundos ;)
    const milisegundos = 300 * 1000;
    setInterval(function() {
      // No esperamos la respuesta de la petición porque no nos importa
      fetch("refrescar.php").then((response) => {
          return response.text();
        })
        .then((myContent) => {
          //alert(myContent);
          console.log(myContent);
        });

    }, milisegundos);
  });
</script>

<?php
//ini_set('session.cookie_lifetime', 0);
// Establecer configuraciones de sesión antes de iniciarla
//ini_set('session.gc_maxlifetime', 0); // 1 hora, por ejemplo
//ini_set('session.cookie_lifetime', 0);
// Luego iniciar la sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

include 'funciones/seguridad.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';
include 'funciones/conn3.php';

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$ID = $_SESSION['ID'];
$ususario_id = $_SESSION['ID'];
//$tipo = $_SESSION['tipo'];
if (isset($_SESSION['tipo'])) {
    $tipo = $_SESSION['tipo'];
} else {
    $tipo = null; // o algún valor por defecto
}
ob_start(); 
// para el tema de los acentos con mysql
//header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql


auditorMaster($ususario_id, '2', $enlace_actual, '-');


?>



<?php
include 'SeleccionSucursal.php';
// verificar si $_SESSION['sucursal'] es diferente de 0 para filtrar por sucursal
if ($_SESSION['sucursal'] >= 0) {
  $sucursal = $_SESSION['sucursal'];
  $QueryWhereSucursal = " sucursal = $sucursal";
} else {
  $QueryWhereSucursal = "";
}
?>


<?php
$pacientesRegistrados = funcionMaster($_SESSION['ID'], 'usuario_id', 'count(*)', 'cliente');

////////////////////imagen de fondo
$perfil = funcionMaster($_SESSION['ID'], 'ID', 'menu', 'usuarios');
$contador=0;
$QueryFondo = mysqli_query($conn3, "SELECT * FROM  fondosSistemas WHERE perfil = '2'");
while ($RowFondo = mysqli_fetch_array($QueryFondo)) {
  $contador++;
  $Arreglo1[$contador] = $RowFondo["ruta"];
}

$indiceAleatorio = array_rand($Arreglo1);
$valorAleatorio = $Arreglo1[$indiceAleatorio];
//echo $valorAleatorio;
if ($valorAleatorio != "") {
  $Background = "background-image: url($valorAleatorio);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;";
}

// echo "<style>
//     .content-wrapper{
//         $Background
//     }
//     </style>";
////////////////////imagen de fondo 

//include 'Iconos Personalizados/iconos.css';
?>
<!--<link rel="stylesheet" href="Iconos Personalizados/iconos.css">-->
<style>
  .content-wrapper {
    background-color: rgba(255, 255, 255, 0.9) !important;
  }

  .box {
    padding: 10px;
    background-color: white;
    border-top: 3px solid #d2d6de;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  .breadcrumb>li {
    margin-right: 10px;
  }

  .row {
    margin-right: 0px !important;
    margin-left: 0px !important;
  }

  /*
  .fondoDinamico{
    background: url("https://ofertasmedicalsoft.com/web/wp-content/uploads/2023/06/Software-Medico-6.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
    width: 100%;
  }
  */

  .content-wrapper{
    background-color: #ecf0f5!important;
  }

</style>


<!-- animacion -->
<style>
  /* Animation for the waves */
  .moving-bg {
    background: url(bgMenuDental.png);
    /* background: url(asidebg.png); */
    height: 200%;
    width: 200%;
    position: absolute;
    top: 0;
    opacity: .03;
    background-repeat: repeat;
    animation: move-forever 10s cubic-bezier(0.8, 0.8, 0.8, 0.8) infinite;
  }


  @keyframes move-forever {
    0% {
      transform: translate3d(-100px, 0, 0);
    }

    100% {
      transform: translate3d(100px, 0, 0);
    }
  }
</style>


<style>
  /* nuevo boton */
  .css-button-shadow-border-sliding--sky {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border-radius: 5px;
    border: none;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
    background: #4433ff;
    z-index: 1;
  }

  .css-button-shadow-border-sliding--sky:hover:after {
    width: 100%;
    left: 0;
  }

  .css-button-shadow-border-sliding--sky:after {
    border-radius: 5px;
    position: absolute;
    content: "";
    width: 0;
    height: 100%;
    top: 0;
    z-index: -1;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
    transition: all 0.3s ease;
    background-color: #3a86ff;
    right: 0;
  }

  .css-button-shadow-border-sliding--sky:active {
    top: 2px;
  }
</style>
<style>
	/* Boton finalizado */
.css-button-sharp--green {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #57cc99;
    background: #57cc99;
	border-radius: 30px;
}

.css-button-sharp--green:hover {
    background: #fff;
    color: #57cc99
}
</style>
<style>
  /* para la lista del modal de procedimientos */
  #tipoIngreso + .select2 > span > .select2-selection {
  height: 40px;
}
</style>
<style>
  /* estilo para el select2 */
.select2-container--default .select2-selection--single {
  height: 40px!important;
}
</style>

<!-- <link rel="stylesheet" href="assets/now-ui-kit-master/assets/css/now-ui-kit.css"> -->


<script>
  console.log('<?=$linkkey?>');
</script>