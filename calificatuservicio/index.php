<?php

include '../../masterFunciones.php';

include '../funciones/funciones.php';

include '../funciones/funcionesUtilidades.php';

include '../funciones/conn3.php';

$idCitas = base64_decode($_GET['Ci']);

$idBitacora = base64_decode($_GET['Cl']);


$correo = '';

$ubicacion = '';


if ($idBitacora == '') 

{

    $idBitacora = funcionMaster($idCitas, 'idCitas', 'idCliente', 'citas');

}

if ($idBitacora == '') {



// ECHO '*/-**-*-*-*';

    // ******** buscamos el codigo del cliente


        // ******** con el codigo buscamos el id bitacora

        $idBitacora = funcionMaster($codigoPrincipal, 'cliente_id', 'cliente_id', 'cliente');



// ECHO 'codigoPrincipal: '.$codigoPrincipal.'/';

// ECHO 'idBitacora: '.$idBitacora;

}








// if cita es mayor que 0 entonces es calificaion de una cita 

if ($idCitas > 0) {

    $query = "SELECT * from comentarios_demo_sieven where idCitas = '$idCitas'";

    $result = mysqli_query($conn3, $query);

    if($result){
        $row = mysqli_fetch_array($result);

        $c_estado = $row['c_estado'];
    }
    

}



// recibimos el dato por post

if ($_POST) {



    $c_comentario = $_POST['c_comentario'];

    $c_puntaje = $_POST['c_puntaje'];

    $idCitas = $_POST['idCitas'];

    $idBitacora = $_POST['idBitacora'];


    $queryCorreoUsuario = $conn3 -> query("SELECT c2.emailF, c2.ubicaciion  FROM citas c join config c2 
    ON c.doctor = c2.ID_Usuario and c.idCitas = $idCitas");
    if($queryCorreoUsuario){
        $row = mysqli_fetch_array($queryCorreoUsuario);
        $correo = $row['emailF'];
        $ubicacion = $row['ubicaciion'];
    }

    $fecha = date("Y-m-d");


if ($idBitacora>0) {$banderaB = 'B'; }

if ($idCitas>0) {$banderaC = 'C'; }





    $nombre = funcionMaster($idBitacora, 'cliente_id', 'nombre_cliente', 'cliente');

    $especialidad = funcionMaster($idBitacora, 'cliente_id', 'profesion_cliente', 'cliente');

    $pais = funcionMaster($idBitacora, 'cliente_id', 'codigo_ciudad', 'cliente');

    $telefono = funcionMaster($idBitacora, 'cliente_id', 'whatsapp', 'cliente');

    $para = funcionMaster($idBitacora, 'cliente_id', 'correo_cliente', 'cliente');





  




    if ($c_puntaje >= 3) {



        $mensajeW = 'Muchas gracias *' . $nombre . '*  por tomarte esos minutos para darnos tu comentario. Para nosotros es importante, recuerda que trabajamos por y para ti
nos has calificado con *' . $c_puntaje . '* Estrellas.

Tu Comentario ha sido *' . $c_comentario . '*.

Si desconoce esto por  favor informar al ' . $correo . '

*sería de gran ayuda si nos dejas tu comentario en google, te tomará menos de 1 minuto, para nosotros será una eternidad de agradecimientos*

Visítanos en Google Maps

' . $ubicacion . '

Atte: 

ALTE' . $idBitacora.$banderaB.$banderaC;







$mensaje = 'Muchas gracias ' . $nombre . ' por tomarte esos minutos para darnos tu comentario, para nosotros es importante, recuerda que trabajamos por y para ti.

Nos has calificado con ' . $c_puntaje . ' Estrellas <br>

Tu Comentario ha sido ' . $c_comentario . '<br>

Si desconoce esto, por favor informar al correo ' . $correo . '<br>

Sería de gran ayuda si nos dejas tu comentario en Google, te tomará menos de 1 minuto, para nosotros será una eternidad de agradecimientos
<br>

Visítanos en Google Maps<br>

' . $ubicacion . '


Attee <br>


ALTE' . $idBitacora.$banderaB.$banderaC;



        // $telefono2 = '573209126751';

        // $telefono3 = '573243507733';

        // $telefono4 = '573136062706';

        $accion = 0;

        Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, 0, $telefono, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono2, $mensajeW, $idBitacora, 0, $telefono2, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono3, $mensajeW, $idBitacora, 0, $telefono3, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono4, $mensajeW, $idBitacora, 0, $telefono4, $accion);

        // Para enviar un correo HTML, debe establecerse la cabecera Content-type

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales

        $cabeceras .= 'To: sievensoft <pqr@sievensoft.com>' . "\r\n";

        $cabeceras .= 'From: Recibimos tu calificación   <pqr@sievensoft.com>' . "\r\n";

        $cabeceras .= 'Cc: pqr@sievensoft.com' . "\r\n";

        $cabeceras .= 'Bcc: pqr@sievensoft.com' . "\r\n";

        // Enviarlo

        mail($para, $titulo, $mensaje, $cabeceras);

    }

    if ($c_puntaje < 3) {



        $mensajeW = 'Muchas gracias ' . $nombre . '  por tomarte esos minutos para darnos tu comentario, para nosotros es importante, recuerda que trabajamos por y para ti

has calificado con *' . $c_puntaje . '* Estrellas  :( 

Comentario a sido *' . $c_comentario . '*

Si desconoce esto por  favor informar al 
correo ' . $correo . '


Pronto estaremos en contacto con tigo

Atte

ALTE

' . $idBitacora.$banderaB.$banderaC;



        // $telefono2 = '573209126751';

        // $telefono3 = '573243507733';

        // $telefono4 = '573136062706';



        $accion = 0;



        Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, 0, $telefono, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono2, $mensajeW, $idBitacora, 0, $telefono2, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono3, $mensajeW, $idBitacora, 0, $telefono3, $accion);

        Whatsapp_sent_cliente($linkkey, $telefono4, $mensajeW, $idBitacora, 0, $telefono4, $accion);

    }





    if ($idCitas > 0) {

        $c_comentario = reem($_POST['c_comentario']);

        $c_puntaje = $_POST['c_puntaje'];

        $idCitas = $_POST['idCitas'];

        $idBitacora = $_POST['idBitacora'];

        $tipo = 3;

// echo $idBitacora;

        $query = "UPDATE citas SET c_comentario = '$c_comentario', c_puntaje = '$c_puntaje', c_estado = '3' WHERE idCitas = '$idCitas'";

        $result = mysqli_query($conn3, $query);



        $nombre = funcionMaster($idBitacora,'cliente_id','nombre_cliente','cliente');

        $especialidad = funcionMaster($idBitacora,'cliente_id','ocupacion','cliente');

        $pais = funcionMaster($idBitacora,'cliente_id','codigo_ciudad','cliente');

// echo "--------------------------------------------------------------------------------------------------";
// echo $nombre;
// echo "<br>";
// echo $especialidad;
// echo "<br>";
// echo $pais;
// echo "--------------------------------------------------------------------------------------------------";



        $query = "INSERT INTO comentarios_demo_sieven(comentario, stars, estado, fecha, nombre, especialidad, autorizo, pais,
         idOperacion, tipo) VALUES 

        ('$c_comentario', '$c_puntaje', '0', '$fecha', '$nombre', '$especialidad', '0', '$pais', '$idCitas', $tipo);";
    //     echo "INSERT INTO comentarios_demo_sieven(comentario, stars, estado, fecha, nombre, especialidad, autorizo, pais,
    //     idOperacion, tipo) VALUES 

    //    ('$c_comentario', '$c_puntaje', '0', '$fecha', '$nombre', '$especialidad', '0', '$pais', '$idCitas', $tipo);";

        $result = mysqli_query($conn3, $query);









        $queryReg = "SELECT max(id) as reg from comentarios_demo_sieven limit 1";
    //    echo "SELECT max(id) as reg from comentarios_demo_sieven limit 1";
        $resultReg = mysqli_query($conn3, $queryReg);

        if($resultReg){
            $rowReg = mysqli_fetch_array($resultReg);

            $reg = $rowReg['reg'];
        }
        

// echo var_dump($reg);

        echo "<script>window.location.href='gracias.php?r=$reg';</script>";

    } elseif ($idCitas == 0) {

        $c_comentario = reem($_POST['c_comentario']);

        $c_puntaje = $_POST['c_puntaje'];

        $idCitas = $_POST['idCitas'];

        $idBitacora = $_POST['idBitacora'];



        if ($idBitacora > 0) {

            $tipo = 3;

        }











        $nombre = funcionMaster($idBitacora, 'cliente_id', 'nombre_cliente', 'cliente');

        $especialidad = funcionMaster($idBitacora, 'cliente_id', 'profesion_cliente', 'cliente');
    
        $pais = funcionMaster($idBitacora, 'cliente_id', 'codigo_ciudad', 'cliente');
    
        $telefono = funcionMaster($idBitacora, 'cliente_id', 'whatsapp', 'cliente');
    
        $para = funcionMaster($idBitacora, 'cliente_id', 'correo_cliente', 'cliente');







        $query = "INSERT INTO comentarios_demo_sieven 

        (comentario, stars,       estado, fecha, nombre, especialidad, autorizo, pais, idOperacion, tipo) VALUES 

        ('$c_comentario', '$c_puntaje', '0', '$fecha', '$nombre', '$especialidad', '0', '$pais', '$idBitacora', $tipo);";

        $result = mysqli_query($conn3, $query);



        $queryReg = "SELECT max(id) as reg from comentarios_demo_sieven limit 1 ";

        $resultReg = mysqli_query($conn3, $queryReg);

        if($resultReg){
            $rowReg = mysqli_fetch_array($resultReg);

            $reg = $rowReg['reg'];
        }
        



        echo "<script>window.location.href='gracias.php?r=$reg';</script>";

    }


}



// si el estado de la cita es mayor a 0 entonces redireccionar a pa pagina de gracias

if ($c_estado > 0) {

    echo "<script>window.location.href='gracias.php';</script>";

}

?>

<!DOCTYPE html>

<html lang="es">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <!-- ICONO -->

    <!-- <link rel="shortcut icon" type="image/x-icon" href="https://medicalsoftplus.com/{$Base}/icono.ico"> -->
    <link rel="apple-touch-icon" sizes="57x57" href="../packFaviconsDentalsoft/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../packFaviconsDentalsoft/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../packFaviconsDentalsoft/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../packFaviconsDentalsoft/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../packFaviconsDentalsoft/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../packFaviconsDentalsoft/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../packFaviconsDentalsoft/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../packFaviconsDentalsoft/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../packFaviconsDentalsoft/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../packFaviconsDentalsoft/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../packFaviconsDentalsoft/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../packFaviconsDentalsoft/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../packFaviconsDentalsoft/favicon-16x16.png">
    <link rel="manifest" href="../packFaviconsDentalsoft/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- ICONO -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="keywords"
        content="medical, medicos, salud, directorio medico, sievensoft, medicalsoft, latam, veterinarios" />

    <!-- <meta NAME="description" CONTENT="Sea parte de de sievensoft de LATAM ❤️ para el mundo, mas de 15 años, mas de 1 millon de usuarios, estamos en mas de 

23 países siendo medicalsoftplus, petsoftplus, dentalsoftplus, hellomedical, ponkys y sievenca. ven y forma parte de nuestra familia "> -->

    <meta NAME="description"
        CONTENT="Sievensoft, de LATAM ❤️ para el mundo. Mas de 15 años, mas de 1 millón de usuarios, con presencia en mas de 23 paises, ven y forma parte de nuestra familia">

    <meta NAME="Author" CONTENT="Sievensoft">

    <meta NAME="Date" CONTENT="01/07/2007">

    <meta NAME="Copyright" CONTENT="Sievensoft company sas">

    <title>MedicalSoft Calificanos!!</title>

    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom styles for this template-->

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<style>
@media only screen and (max-width: 600px) {

    #show {

        display: none;

    }

}
</style>

<style>
.waves {

    position: relative;

    width: 100%;

    height: 16vh;

    margin-bottom: -7px;

    /*Fix for safari gap*/

    min-height: 30em;

    max-height: 40em;

}



.waves.waves-sm {

    height: 20em;

    min-height: 20em;

}



.waves.no-animation .moving-waves>use {

    animation: none;

}



.wave-rotate {

    transform: rotate(180deg);

}



/* Animation for the waves */

.moving-waves>use {

    animation: move-forever 40s cubic-bezier(0.55, 0.5, 0.45, 0.5) infinite;

}



.moving-waves>use:nth-child(1) {

    animation-delay: -2s;

    animation-duration: 11s;

}



.moving-waves>use:nth-child(2) {

    animation-delay: -4s;

    animation-duration: 13s;

}



.moving-waves>use:nth-child(3) {

    animation-delay: -3s;

    animation-duration: 15s;

}



.moving-waves>use:nth-child(4) {

    animation-delay: -4s;

    animation-duration: 20s;

}



.moving-waves>use:nth-child(5) {

    animation-delay: -4s;

    animation-duration: 25s;

}



.moving-waves>use:nth-child(6) {

    animation-delay: -3s;

    animation-duration: 30s;

}



@keyframes move-forever {

    0% {

        transform: translate3d(-90px, 0, 0);

    }



    100% {

        transform: translate3d(85px, 0, 0);

    }

}
</style>

<style>
.rating {

    display: inline-block;

    position: relative;

}



.rating label {

    position: absolute;

    top: 0;

    left: 0;

    cursor: pointer;

}



.rating label:last-child {

    position: static;

}



.rating label:nth-child(1) {

    z-index: 5;

}



.rating label:nth-child(2) {

    z-index: 4;

}



.rating label:nth-child(3) {

    z-index: 3;

}



.rating label:nth-child(4) {

    z-index: 2;

}



.rating label:nth-child(5) {

    z-index: 1;

}



.rating label input {

    position: absolute;

    top: 0;

    left: 0;

    opacity: 0;

}



.rating label .icon {

    float: left;

    color: transparent;

}



.rating label:last-child .icon {

    color: #000;

}



.rating:not(:hover) label input:checked~.icon,

.rating:hover label:hover input~.icon {

    color: #4e73df;

}



.rating label input:focus:not(:checked)~.icon:last-child {

    color: #000;

    text-shadow: 0 0 5px #4e73df;

}
</style>



<body class="bg-gradient-primary">

    <div class="position-absolute w-100 z-index-1 bottom-0" style="bottom: 0; position:fixed !important;">

        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">

            <defs>

                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />

            </defs>

            <!-- las olitas bonitas :3 -->

            <g class="moving-waves">

                <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />

                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />

                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />

                <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />

                <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />

                <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />

            </g>

            <!-- fin de las olitas bonitas :3 -->

        </svg>

    </div>
    <?php
   $query1=mysqli_query($conn3,"SELECT * FROM  comentarios_demo_sieven where idOperacion = '$idCitas'");  
   $nrowl=mysqli_num_rows($query1);

   if($query1){
    while($row_1=mysqli_fetch_array($query1))

   {
    $tipo = $row_1['tipo'];    
    }
   }
   
//   echo $stars;
    if ($tipo == 3) { 
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '¡Ya has realizado la Encuesta!'
    }).then(function() {
        window.close();
    });
    </script>
    <?php
}
?>


    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-4">

            <div class="card-body p-0">

                <!-- Nested Row within Card Body -->

                <div class="row">

                    <div class="col-lg-3 d-none d-lg-block center text-center align-center">
                        <img class="img-responsive mt-5" style="width:90%"
                            src="<?=$Base ?>logoDental.png">
                    </div>

                    <div class="col-lg-9">

                        <div class="p-3">

                            <div class="text-center">

                                <h1 class="h4 text-gray-900 mb-3"><strong class="">Dentalsoft</strong>

                                    <p class="h6"><br>Hola

                                        <?php echo $nombre = funcionMaster($idBitacora, 'cliente_id', 'nombre_cliente', 'cliente'); ?>,
                                        Tu <strong>valoración es muy importante</strong> para nosotros, nos ayudas a
                                        seguir creciendo. <br> <i><strong> Trabajamos mano a mano contigo!!</strong></i>
                                    </p>

                                </h1>

                            </div>

                            <form class="" action="index.php" method="post">

                                <div class="form-group row">

                                    <div class="col-sm-12 mb-3 mb-sm-0">

                                        <label class="mb-4 font-weight-bolder">Comentario</label>

                                        <textarea name="c_comentario" id="c_comentario" class="form-control" rows="3"
                                            required="required"></textarea>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-12 mb-3 mb-sm-0">

                                        <label class="mb-4 font-weight-bolder">Calificación</label>

                                        <br>

                                        <div class="rating">

                                            <?php

                                            for ($i = 1; $i <= 5; $i++) {

                                                echo '<label>';

                                                echo '<input type="radio" name="c_puntaje" value="' . $i . '" required />';

                                                for ($o = 1; $o <= $i; $o++) {

                                                    echo '<span class="icon fa fa-star fa-3x"></span>';

                                                }

                                                echo '</label>';

                                            }

                                            ?>

                                        </div>

                                    </div>

                                </div>

                                <hr>

                                <input type="hidden" name="idCitas" value="<?php echo $idCitas; ?>">

                                <input type="hidden" name="idBitacora" value="<?php echo $idBitacora; ?>">

                                <div class="form-group">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="autorizo" value="1"
                                            id="defaultCheck1" required style="float: none;">

                                        <label class="form-check-label" for="defaultCheck1">Autorizo publicación de mi
                                            comentario en la web <a href="https://sievensoft.com/Ley_de_habeas_Data.pdf"
                                                target="_blank">Habeas
                                                Data</a>

                                        </label>

                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">

                                    <h1> Enviar comentario! </h1>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="../vendor/jquery/jquery.min.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="../js/sb-admin-2.min.js"></script>

</body>



</html>

<?php

$icono = rand(1, 7);

$ArrayIcono = array('1', '2', '3', '4', '5', '6', '7');

$ArrayIcono_ = array('fa-stethoscope', 'fa-heartbeat', 'fa-plus-square', 'fa-heart', 'fa-medkit', 'fa-hospital', 'fa-wheelchair');

$icono_ = str_replace($ArrayIcono, $ArrayIcono_, $icono);

$rotate = 20;

?>

<div style="position: absolute; bottom: 2em;" id="show">

    <i style="transform: rotate(<?= $rotate ?>deg);" class="fa <?= $icono_ ?> fa-10x m-5 text-primary"></i>

    <i style="transform: rotate(-<?= $rotate ?>deg);" class="fa <?= $icono_ ?> fa-6x text-primary"></i>

</div>

<?php

?>