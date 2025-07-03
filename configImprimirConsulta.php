<?php
date_default_timezone_set('America/Bogota');


include ("funciones/funciones.php");
include ("funciones/funcionesUtilidades.php");

$historiaClinica = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
// $nrowl = mysqli_num_rows($queryListhc);
if ($queryListhc) {
    while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $Tabla = $rowhc['name'];
        $nombre = $rowhc['nombre'];
    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $activo = $rowMotorizado['activo'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
        $Fecha = $rowMotorizado['Fecha'];
        $Hora = $rowMotorizado['Hora'];

        $peso = $rowMotorizado['peso'];
        $talla = $rowMotorizado['altura'];
        $imc = $rowMotorizado['imc'];
        $cc = $rowMotorizado['corporal'];


        $D1 = $rowMotorizado['D1'];
        $D2 = $rowMotorizado['D2'];
        $D3 = $rowMotorizado['D3'];
        $D4 = $rowMotorizado['D4'];
        $D5 = $rowMotorizado['D5'];
        $NOTA1 = $rowMotorizado['nota1'];
        $NOTA2 = $rowMotorizado['nota2'];
        $NOTA3 = $rowMotorizado['nota3'];
        $NOTA4 = $rowMotorizado['nota4'];
        $NOTA5 = $rowMotorizado['nota5'];
        $abd = $rowMotorizado['abdomen'];
        $perineal = $rowMotorizado['perineal'];
        $exploracion = $rowMotorizado['exploracion'];
        $tacto = $rowMotorizado['tacto'];
        $resultado = $rowMotorizado['resultado'];
        $resultado1 = $rowMotorizado['resultado'];
        $interpretacion = $rowMotorizado['interpretacion'];
        $V1 = $rowMotorizado['x942'];
        $V2 = $rowMotorizado['x524'];
        $V3 = $rowMotorizado['x486'];
        $V4 = $rowMotorizado['x791'];
        $V5 = $rowMotorizado['x598'];
        $V6 = $rowMotorizado['x330'];
        $V7 = $rowMotorizado['x870'];
        $V8 = $rowMotorizado['x618'];
        $V9 = $rowMotorizado['x417'];
        $V10 = $rowMotorizado['x806'];
        $antecenentes = $rowMotorizado['antecedentes'];
        $peso1 = $rowMotorizado['peso'];
        $talla1 = $rowMotorizado['talla'];
        $imc1 = $rowMotorizado['imc'];
        $corporal1 = $rowMotorizado['corporal'];
        $otros1 = $rowMotorizado['otros'];
        $observacion1 = $rowMotorizado['observacion'];
        $idMetodo = $rowMotorizado['idMetodo'];

        $Tipo_Pie = $rowMotorizado['Tipo_Pie'];
        $Planta_Pie = $rowMotorizado['Planta_Pie'];
    }
}


if ($V1 == 'Independiente, capaz de comer por si solo en un tiempo razonable. La comida puede ser cocinada y servida por otras personas.') {
    $valor1 = 10;
}
if ($V1 == 'Necesita ayuda para cortar la carne, extender la mantequilla, pero es capaz de comer por si mismo.') {
    $valor1 = 5;
}
if ($V1 == 'Dependiente. Necesita ser alimentado por otra persona.') {
    $valor1 = 0;
}

//echo'-----------------valor1-------->>>'.$valor1;

if ($V2 == 'Independiente, capaz de ba&ntilde;arse entero, de entrar y salir del ba&ntilde;o sin ayuda y de hacerlo sin que una persona lo supervise.') {
    $valor2 = 5;
}
if ($V2 == 'Dependiente. Necesita alg&uacute;n tipo de ayuda o supervisi&oacute;n.') {
    $valor2 = 0;
}

//echo'--------------------valor2----->>>'.$valor2;

if ($V3 == 'Independiente, capaz de ponerse y quitarse la ropa sin ayuda.') {
    $valor3 = 10;
}
if ($V3 == 'Necesita ayuda. Realiza sin ayuda m&aacute;s de la mitad de estas tareas  en un tiempo razonable.') {
    $valor3 = 5;
}
if ($V3 == 'Dependiente. Necesita ayuda para las mismas.') {
    $valor3 = 0;
}

//echo'-------------------valor3------>>>'.$valor3;



if ($V4 == 'Independiente, realiza todas las actividades personales sin ayuda alguna, los complementos necesarios pueden ser provistos por alguna persona.') {
    $valor4 = 5;
}
if ($V4 == 'Dependiente. Necesita ayuda para las mismas.') {
    $valor4 = 0;
}
//echo'------------------valor4------->>>'.$valor4;



if ($V5 == 'Continente. No presenta episodios de incontinencia.') {
    $valor5 = 10;
}
if ($V5 == 'Accidente ocasional. Menos de una vez por semana o necesita ayuda para colocar enemas o supositorios.') {
    $valor5 = 5;
}
if ($V5 == 'Incontinente. M&aacute;s de un episodio semanal.') {
    $valor5 = 0;
}

//echo'-----------valor5-------------->>>'.$valor5;



if ($V6 == 'Continente. No presenta episodios. Capaz de utilizar cualquier dispositivo por si solo (botella, sonsa, pato).') {
    $valor6 = 10;
}
if ($V6 == 'Accidente ocasional. Presenta m&aacute;ximo un episodio en 24 horas o requiere ayuda para la manipulaci&oacute;n de sondas u otros dispositivos.') {
    $valor6 = 5;
}
if ($V6 == 'Incontinente. M&aacute;s de un episodio en 24 horas.') {
    $valor6 = 0;
}

//echo'-----------valor6-------------->>>'.$valor6;

if ($V7 == 'Independiente. Entra y sale solo y no necesita ayuda alguna de otra persona.') {
    $valor7 = 10;
}
if ($V7 == 'Necesita ayuda. Capaz de manejarse con una peque&ntilde;a ayuda, es capaz de usar el cuarto de ba&ntilde;o y puede asearse solo.') {
    $valor7 = 5;
}
if ($V7 == 'Dependiente. Incapaz de acceder al ba&ntilde;o o de utilizarlo sin ayuda.') {
    $valor7 = 0;
}

//echo'------------------valor7------->>>'.$valor7;

if ($V8 == 'independiente. No requiere ayuda para sentarse o levantarse de una silla o para entrar o salir de la cama.') {
    $valor8 = 15;
}
if ($V8 == 'M&iacute;nima ayuda. Incluye una supervisi&oacute;n o una peque&ntilde;a ayuda f&iacute;sica.') {
    $valor8 = 10;
}
if ($V8 == 'Gran ayuda. precisa ayuda de una persona fuerte o entrenada.') {
    $valor8 = 5;
}
if ($V8 == 'Dependiente. Necesita de una gr&uacute;a o el apoyo de m&aacute;s de una persona. Es incapaz de permanecer sentado.') {
    $valor8 = 0;
}
//echo'-----------------valor8-------->>>'.$valor8;



if ($V9 == 'Independiente, puede andar 50 mts o su equivalente en casa sin ayuda o supervisi&oacute;n. Puede utilizar cualquier ayuda mec&aacute;nica excepto un caminador. Si utiliza una pr&oacute;tesis puede pon&eacute;rsela o quit&aacute;rsela solo.') {
    $valor9 = 15;
}
if ($V9 == 'Necesita ayuda. Necesita supervisi&oacute;n o una peque&ntilde;a ayuda f&iacute;sica por parte de otra persona.') {
    $valor9 = 10;
}
if ($V9 == 'Independiente en silla de ruedas. No requiere ayuda ni supervisi&oacute;n.') {
    $valor9 = 5;
}
if ($V9 == 'Dependiente en silla de ruedas. Requiere ayuda para el desplazamiento.') {
    $valor9 = 0;
}

//echo'-------------------valor9------>>>'.$valor9;



if ($V10 == 'Independiente. Capaz de subir un piso sin ayuda y supervisi&oacute;n de otra persona.') {
    $valor10 = 10;
}
if ($V10 == 'Necesita ayuda o supervisi&oacute;n.') {
    $valor10 = 5;
}
if ($V10 == 'Dependiente. Es incapaz de subir o bajar escalones.') {
    $valor10 = 0;
}

//echo'------------------valor10------->>>'.$valor10;


$sumavalores = $valor1 + $valor2 + $valor3 + $valor4 + $valor5 + $valor6 + $valor7 + $valor8 + $valor9 + $valor10;

if ($sumavalores < 45) {
    $valoracion = 'Severa';
}
if ($sumavalores >= 45 & $sumavalores <= 59) {
    $valoracion = 'Grave';
}
if ($sumavalores >= 60 & $sumavalores <= 80) {
    $valoracion = 'Moderada';
}
if ($sumavalores >= 81 & $sumavalores <= 100) {
    $valoracion = 'Ligera';
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $moneda = $rowMotorizado['moneda'];
        $impuestoF = $rowMotorizado['impuestoF'];

        // Nuevos campos

        $nombreF = $rowMotorizado['nombreF'];
        $telefonoF = $rowMotorizado['telefonoF'];
        $direccionF = $rowMotorizado['direccionF'];
        $emailF = $rowMotorizado['emailF'];
        $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
        $licenciaF = $rowMotorizado['licenciaF'];
        $pieF = $rowMotorizado['pieF'];
        $header = $rowMotorizado['header'];


        $LogoF = $rowMotorizado['logoF'];
        $firma = $rowMotorizado['firma'];


        if (strlen($LogoF) > 0) {
            $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
        }


        if (strlen($firma) > 0) {
            $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
        }

    }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $empresaNombre = $rowMotorizado['empresaNombre'];
        $pais = $rowMotorizado['pais'];

        $ciudad = $rowMotorizado['ciudad'];
        $direccion = $rowMotorizado['direccion'];
        $telefono = $rowMotorizado['telefono'];
        $especialidad = $rowMotorizado['especialidad'];
        $nit = $rowMotorizado['nit'];
    }

}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $seguro = $rowMotorizado['seguro'];
        $direccion_cliente = $rowMotorizado['direccion_cliente'];
        $genero = $rowMotorizado['genero'];
        $discapacidad = $rowMotorizado['tipodiscapacidad'];

        $entidadSalud = funcionMaster($rowMotorizado['entidad_id'], 'id', 'Nombre', 'Rips_Entidades');
    }
}



$queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
// $nrowl = mysqli_num_rows($queryListhc);
if ($queryListhc) {
    while ($rowhc = mysqli_fetch_array($queryListhc)) {
        $Tabla = $rowhc['name'];
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM firmas where historia_id = $historiaClinica and cliente_id = $cliente_id and historia_nombre = '$Tabla' ");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Firma = $rowMotorizado['firma'];
    }
}


?>

<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>


<?php  if ($activo == 0) { ?>
<script>
    // alert("Historia clinica no válida");
</script>
<?php 

// die();
} ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $empresaNombre ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">


    <style>
        @page {
            size: A4;
            margin: 40px;
        }


        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            @-moz-document url-prefix() {}

            .col-sm-1,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-md-1,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-md-10,
            .col-md-11,
            .col-smdm-12 {
                float: left;
            }

            .col-sm-12,
            .col-md-12 {
                width: 100%;
            }

            .col-sm-11,
            .col-md-11 {
                width: 91.66666667%;
            }

            .col-sm-10,
            .col-md-10 {
                width: 83.33333333%;
            }

            .col-sm-9,
            .col-md-9 {
                width: 75%;
            }

            .col-sm-8,
            .col-md-8 {
                width: 66.66666667%;
            }

            .col-sm-7,
            .col-md-7 {
                width: 58.33333333%;
            }

            .col-sm-6,
            .col-md-6 {
                width: 50%;
            }

            .col-sm-5,
            .col-md-5 {
                width: 41.66666667%;
            }

            .col-sm-4,
            .col-md-4 {
                width: 33.33333333%;
            }

            .col-sm-3,
            .col-md-3 {
                width: 25%;
            }

            .col-sm-2,
            .col-md-2 {
                width: 16.66666667%;
            }

            .col-sm-1,
            .col-md-1 {
                width: 8.33333333%;
            }

            .col-sm-pull-12 {
                right: 100%;
            }

            .col-sm-pull-11 {
                right: 91.66666667%;
            }

            .col-sm-pull-10 {
                right: 83.33333333%;
            }

            .col-sm-pull-9 {
                right: 75%;
            }

            .col-sm-pull-8 {
                right: 66.66666667%;
            }

            .col-sm-pull-7 {
                right: 58.33333333%;
            }

            .col-sm-pull-6 {
                right: 50%;
            }

            .col-sm-pull-5 {
                right: 41.66666667%;
            }

            .col-sm-pull-4 {
                right: 33.33333333%;
            }

            .col-sm-pull-3 {
                right: 25%;
            }

            .col-sm-pull-2 {
                right: 16.66666667%;
            }

            .col-sm-pull-1 {
                right: 8.33333333%;
            }

            .col-sm-pull-0 {
                right: auto;
            }

            .col-sm-Push-12 {
                left: 100%;
            }

            .col-sm-Push-11 {
                left: 91.66666667%;
            }

            .col-sm-Push-10 {
                left: 83.33333333%;
            }

            .col-sm-Push-9 {
                left: 75%;
            }

            .col-sm-Push-8 {
                left: 66.66666667%;
            }

            .col-sm-Push-7 {
                left: 58.33333333%;
            }

            .col-sm-Push-6 {
                left: 50%;
            }

            .col-sm-Push-5 {
                left: 41.66666667%;
            }

            .col-sm-Push-4 {
                left: 33.33333333%;
            }

            .col-sm-Push-3 {
                left: 25%;
            }

            .col-sm-Push-2 {
                left: 16.66666667%;
            }

            .col-sm-Push-1 {
                left: 8.33333333%;
            }

            .col-sm-Push-0 {
                left: auto;
            }

            .col-sm-offset-12 {
                margin-left: 100%;
            }

            .col-sm-offset-11 {
                margin-left: 91.66666667%;
            }

            .col-sm-offset-10 {
                margin-left: 83.33333333%;
            }

            .col-sm-offset-9 {
                margin-left: 75%;
            }

            .col-sm-offset-8 {
                margin-left: 66.66666667%;
            }

            .col-sm-offset-7 {
                margin-left: 58.33333333%;
            }

            .col-sm-offset-6 {
                margin-left: 50%;
            }

            .col-sm-offset-5 {
                margin-left: 41.66666667%;
            }

            .col-sm-offset-4 {
                margin-left: 33.33333333%;
            }

            .col-sm-offset-3 {
                margin-left: 25%;
            }

            .col-sm-offset-2 {
                margin-left: 16.66666667%;
            }

            .col-sm-offset-1 {
                margin-left: 8.33333333%;
            }

            .col-sm-offset-0 {
                margin-left: 0%;
            }

            .visible-xs {
                display: none !important;
            }

            .hidden-xs {
                display: block !important;
            }

            table.hidden-xs {
                display: table;
            }

            tr.hidden-xs {
                display: table-row !important;
            }

            th.hidden-xs,
            td.hidden-xs {
                display: table-cell !important;
            }

            .hidden-xs.hidden-print {
                display: none !important;
            }

            .hidden-sm {
                display: none !important;
            }

            .visible-sm {
                display: block !important;
            }

            table.visible-sm {
                display: table;
            }

            tr.visible-sm {
                display: table-row !important;
            }

            th.visible-sm,
            td.visible-sm {
                display: table-cell !important;
            }
        }

        /* esta clase sirve para cuando un div se monta por que los anteriores son mas largos con esto se pone la clase en la tabla de clases y lo corrige */
        .clear-both {
            clear: both;
        }
    </style>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<style>
    @media print {
        hr {
            display: block;
            border: 1px solid #000;
            /* Línea horizontal de 2px de grosor y color negro */
            margin: 10px 10px;
            /* Espaciado antes y después de la línea horizontal */
        }
    }
</style>

<body>

    <div class="page-header row" style="text-align: center;z-index: 1;">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()"
            style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer" style="z-index: 1;">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw;">
                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?php echo $nombre_cliente ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <h2 align="center"> <?php echo $nombre ?></h2>
                        <p>Fecha :<?php echo $Fecha ?></p>





                        <?php

                        $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria AND estado = 1 order by convert(orden, signed)  asc");
                        // $nrowl = mysqli_num_rows($queryDetalle);
                        while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                            $idCampo = $rowDetalle['id'];
                            $div_class = $rowDetalle['div_class'];
                            $div_align = $rowDetalle['div_align'];
                            $div_nombre_campo = $rowDetalle['div_nombre_campo'];
                            $input_type = $rowDetalle['input_type'];
                            $input_calss = $rowDetalle['input_calss'];
                            $input_name = $rowDetalle['input_name'];
                            $input_placeholder = $rowDetalle['input_placeholder'];
                            $input_id = $rowDetalle['input_id'];
                            $input_required = $rowDetalle['input_required'];
                            $input_pattern = $rowDetalle['input_pattern'];
                            $input_onChange = $rowDetalle['input_onChange'];
                            $select_table = $rowDetalle['select_table'];
                            $style = $rowDetalle['style'];
                            $tipoCampo = $rowDetalle['tipoCampo'];
                            $input_maxlength = $rowDetalle['input_maxlength'];
                            $input_oninput = $rowDetalle['input_oninput'];
                            $div_nombre_valor = $rowDetalle['div_nombre_valor'];
                            $input_value = $rowDetalle['input_value'];


                            /*
                            if ($idCampo == '699') {
                              echo $antecenentes;

                              echo ' <br><div class="col-md-12" align="center"> <b>EXAMEN FÍSICO</B>  </DIV> <br>';
                              echo 'PESO:' . $peso1 . ' TALLA:' . $talla1 . ' IMC: ' . $imc1 . ' COMPOSICIÓN CORPORAL: ' . $corporal1 . ' ';
                              echo $otros1 . '<br>';
                              echo $observacion1;
                            }
                            */








                            /*
                            if ($idCampo == '816') {
                              echo '<div class="col-md-12"> <div class="col-md-12"> <br>Estado de Forma:' . $resultado . '<div></DIV>';
                            }
                            */

                            /*
                            if ($idCampo == '887') {
                              echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
              <tr> <th>  Metodo  </th> <th> Usado antes </th> <th> salud </th> <th> Ecónomica </th> <th> Estilo vida </th> <th> Elegible </th> <th> Observación</th>  ';
                              $cont = 0;
                              $queryList = mysqli_query($conn3, "SELECT * FROM  metodos where cliente_id ='$cliente_id' and idMetodo= '$idMetodo'");

                              // $nrowl = mysqli_num_rows($queryList);
                              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                $cont++;
                                $idOper1     = $rowMotorizado['id'];
                                $metodo = $rowMotorizado['metodo'];
                                $usado  = $rowMotorizado['usado'];
                                $salud  = $rowMotorizado['salud'];
                                $economica    = $rowMotorizado['economica'];
                                $estilo   = $rowMotorizado['estilo'];
                                $elegible    = $rowMotorizado['elegible'];
                                $observacion   = $rowMotorizado['observacion'];





                                echo '<tr> <th> <input type="hidden"  value="' . $idOper1 . '" class="form-control input-lg" id="idOper' . $cont . '" name="idOper" >   <a href="#"  onclick="eliminarItem' . $cont . '();"> <font size="5">   </font> </a>
                ' . $metodo . '</th><th>' . $usado . '  </th> <th>' . $salud . '  </th> <th> ' . $economica . '</th> <th> ' . $estilo . '</th> <th> ' . $elegible . '</th> <th> ' . $observacion . '</th>
                ';
                              }
                              //echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';

                              echo '</table></h6>';;
                            }
                            */




                            /*if ($idCampo == '95') {
                              echo

                              '<h5 align="center"> <b>DIAGNÓSTICO </b></h5> <BR>




               <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

               <tr>
                         <td colspan="5">
                           <b> <h5>DIAGNÓSTICO  CIE 10</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>OBSERVACIONES</b></h5> </td>
                          </tr>
                          </table>  ';
                              if ($D1 <> '') {
                                $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D1 . '</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>' . $NOTA1 . '</b></h5> </td>
                          </tr> ';
                              }

                              if ($D2 <> '') {
                                $ID2 = '
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D2 . '</b></h5>  </td>


              <td  colspan="6">
                             <b> <h5>' . $NOTA2 . '</b></h5> </td>
                          </tr> ';
                              }

                              if ($D3 <> '') {
                                $ID3 = '
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D3 . '</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>' . $NOTA3 . '</b></h5> </td>
                          </tr> ';
                              }



                              $FINTABLA = '</TABLE>';



                              echo $ID1;
                              echo $ID2;
                              echo $ID3;

                              echo $FINTABLA;
                            }


                            if ($idCampo == '127') {
                              echo

                              '<h5 align="center"> <b>DIAGNÓSTICO </b></h5> <BR>




               <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

               <tr>
                         <td colspan="5">
                           <b> <h5>DIAGNÓSTICO  CIE 10</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>OBSERVACIONES</b></h5> </td>
                          </tr>
                          </table>  ';
                              if ($D1 <> '') {
                                $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D1 . '</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>' . $NOTA1 . '</b></h5> </td>
                          </tr> ';
                              }

                              if ($D2 <> '') {
                                $ID2 = '
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D2 . '</b></h5>  </td>


              <td  colspan="6">
                             <b> <h5>' . $NOTA2 . '</b></h5> </td>
                          </tr> ';
                              }

                              if ($D3 <> '') {
                                $ID3 = '
               <tr>
                         <td colspan="5">
                           <b> <h5>' . $D3 . '</b></h5>  </td>

              <td  colspan="6">
                             <b> <h5>' . $NOTA3 . '</b></h5> </td>
                          </tr> ';
                              }



                              $FINTABLA = '</TABLE>';



                              echo $ID1;
                              echo $ID2;
                              echo $ID3;

                              echo $FINTABLA;
                            }*/





                            /*
              if ( $tipoCampo == 'text')
              {
              $valor = 0;


                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              if (strlen($valor) > 0) {

              //echo '<p>'.$div_nombre_campo.':'.$valor.'<p>';

                echo ' <div class="'.$div_class.'">
                               <div align="'.$div_align.'" value="'.$valor.$input_value.'">  '.$div_nombre_campo.' '.$valor.'</div>
                          </div>';

              }
              }
              */
                            if ($tipoCampo == 'text') {
                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                /*
                    if (strlen($valor) > 0 and ($valor != "" and $valor != " ")) {
                      echo ' <div class="' . $div_class . '">
                                 <div align="' . $div_align . '" value="' . $valor . $input_value . '">  ' . $div_nombre_campo . ': ' . $valor . '</div>
                            </div>';
                    } elseif ($div_class == "form-group col-md-12") {
                      echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                    } else {
                      echo "<div class='{$div_class}' style='margin-bottom:0px!important;'>&nbsp;</div>";
                    }
                    */

                                //este primer if es para tablas de odontologia o cualquier otra para que mantengan sus espacios
                                if ($input_onChange == "Tabla" and $valor == "") {
                                    echo "<div class='{$div_class}' style='margin-bottom: 40px;'>{$valor}</div>";
                                }
                                //este es para el odontograma solucionar un salto de linea en un campo en especifico
                                elseif ($div_nombre_campo == "x917") {
                                    echo "<div class='{$div_class}' style='margin-bottom: 20px !important;'>{$valor}</div>";
                                } elseif (strlen($valor) > 0 and ($valor != "" and $valor != " ")) {
                                    echo ' <div class="' . $div_class . '">
                 <div align="' . $div_align . '" value="' . $valor . $input_value . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:15px!important;{$tipoCampo}-{$idCampo}'>&nbsp;</div>";
                                }
                            }




                            /*
              if ( $tipoCampo == 'number')
              {




              $valor = 0;
                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {
                            $valor      =$rowMotorizado[$input_name];
                          }

              if (strlen($valor) > 0) {


              //echo '<p>'.$div_nombre_campo.': '.$valor.' <p>';
                echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$valor.'</div>
                          </div>';

              }





              }
              */

                            if ($tipoCampo == 'number') {
                                $valor = 0;
                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }

                                if (strlen($valor) > 0 and ($valor != "" and $valor != " ")) {
                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;{$tipoCampo}-{$idCampo}'>&nbsp;</div>";
                                }
                            }


                            /*
              if ( $tipoCampo == 'textarea')
              {

               $valor = 0;

                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              if (strlen($valor) > 0) {



              //echo '<p>'.$div_nombre_campo.' :'.$valor.'<p>';

                echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$valor.'</div>



                          </div>';



              }





              }
              */

                            if ($tipoCampo == 'textarea') {

                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                if (
                                    strlen($valor) > 0 and ($valor != "" and $valor != " ")
                                ) {

                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;{$tipoCampo}-{$idCampo}'>&nbsp;</div>";
                                }
                            }





                            /*
              if ( $tipoCampo == 'select_si_no')
              {

              $valor = 0;

                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              if (strlen($valor) > 0)
              {

              //echo '<p>'.$div_nombre_campo.': '.$valor.'<p>';
                echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$valor.'</div>
                          </div>';

              }

              }
              */

                            if (
                                $tipoCampo == 'select_si_no'
                            ) {

                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                if (
                                    strlen($valor) > 0 and $valor != "" and $valor != "0"
                                ) {
                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;'>&nbsp;</div>";
                                }
                            }





                            /*
              if ( $tipoCampo == 'select')
              {


              $valor = 0;

                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              if (strlen($valor) > 0) {



              //echo '<p>'.$div_nombre_campo.': '.$valor.'<p>';
                echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$valor.'</div>
                          </div>';

              }







              }
              */

                            if ($tipoCampo == 'select') {
                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                if (strlen($valor) > 0 and ($valor != "" and $valor != " " and $valor != "--")) {

                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;'>&nbsp;</div>";
                                }
                            }


                            /*
              if ( $tipoCampo == 'selectmultiple')
              {

               $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              $data = explode("|", $valor);
              $view = '';
              foreach ($data AS $k=>$v)
                  if($v!= ''){
                      $view .=' '.$v.', ';
                    }

              //echo '<p>'.$div_nombre_campo.': '.$view.'<p>';

                    echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.trim($view, ', ').'</div>

                          </div>';





              }
              */
                            if ($tipoCampo == 'selectmultiple') {

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                $data = explode("|", $valor);
                                $view = '';
                                foreach ($data as $k => $v)
                                    if ($v != '') {
                                        $view .= ' ' . $v . ', ';
                                    }

                                //echo '<p>'.$div_nombre_campo.': '.$view.'<p>';
                                if (strlen($valor) > 0 and ($valor != "" and $valor != "|" and $valor != "--")) {
                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . trim($view, ', ') . '</div>

            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;'>&nbsp;</div>";
                                }
                            }









                            if ($tipoCampo == 'separador') {
                                $div = 'separador' . rand(1, 999);

                                $queryList = mysqli_query($conn3, "SELECT xtipohisto468 FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);

                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $valor = $rowMotorizado['xtipohisto468'];
                                    }

                                }


                                if ($idCampo == '1295' and $valor == "0" and $idHistoria == "23") {
                                    $div_nombre_campo = "<br><br><br><br><br><br><br><br><br><br><br><br><br>&nbsp;";
                                }
                                if ($idCampo == '1286' and $valor == "0" and $idHistoria == "23") {
                                    $div_nombre_campo = "&nbsp;";
                                }

                                if ($idCampo == '1293' and $valor == "1" and $idHistoria == "23") {
                                    $div_nombre_campo = "<br><br>&nbsp;";
                                }
                                if ($idCampo == '1287' and $valor == "1" and $idHistoria == "23") {
                                    $div_nombre_campo = "&nbsp;";
                                }


                                ////////////////////////////// 2023 base nueva este es uyna modificacion para el hr para la historia de oftamologia II  id=22//////////////////
                                if ($div_nombre_campo == "<hr>") {
                                    $div_class = $div_class . " clear-both";
                                }
                                //echo '<p align= "center"> <strong> '.$div_nombre_campo.'</strong><p>';

                                echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '" valor="' . $idCampo . '">  <b> ' . $div_nombre_campo . '</b></div>
            </div>';

                                /*
                      echo '<div class="'.$div_class.'">
                                 <div align="'.$div_align.'"">  <b> '.$div_nombre_campo.'</b></div>
                            </div>';*/
                            }


                            // esta parte sirve para arreglar el formulario de consumo alcohol/ drogas en el cual agrego un div 12
                            //despues del campo via administracion

                            if ($tipoCampo == 'separador' and $idCampo == '10086') {

                                echo '
        <div class="form-group col-md-12">

        ';
                            }

                            // esta parte sirve para arreglar el formulario de consumo alcohol/ drogas en el cual agrego un div 12
                            //despues del campo select
                            if ($tipoCampo == 'select' and $idCampo == '10090') {
                                echo '<div class="col-md-12"></div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10094') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10098') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10103') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10107') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10111') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10115') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10119') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10124') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10128') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10132') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10136') {
                                echo '<div class="col-md-12"> </div>';
                            }

                            if ($tipoCampo == 'select' and $idCampo == '10140') {
                                echo '<div class="col-md-12"> </div>';
                            }



                            if ($tipoCampo == 'imagen') {
                                $div = 'separador' . rand(1, 999);

                                //echo '<p align= "center"> <strong> '.$div_nombre_campo.'</strong><p>';

                                /*echo '<div class="' . $div_class . '">
                                 <div align="' . $div_align . '"> ' . $div_nombre_campo . ' </div>

                            </div>';*/
                                echo '<div class="' . $div_class . '">
            <div align="center">  <img src="' . $div_nombre_campo . '"  style="' . $style . '"></div>
       </div>';

                            }



                            if ($idCampo == '2630') {
                                echo

                                    '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>




 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>
            </table>  ';
                                if ($D1 <> '') {
                                    $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">
             <b> <h5>' . $D1 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA1 . '</b></h5> </td>
            </tr> ';
                                }

                                if ($D2 <> '') {
                                    $ID2 = '
 <tr>
           <td colspan="5">
             <b> <h5>' . $D2 . '</b></h5>  </td>


<td  colspan="6">
               <b> <h5>' . $NOTA2 . '</b></h5> </td>
            </tr> ';
                                }

                                if ($D3 <> '') {
                                    $ID3 = '
 <tr>
           <td colspan="5">
             <b> <h5>' . $D3 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA3 . '</b></h5> </td>
            </tr> ';
                                }



                                $FINTABLA = '</TABLE>';



                                echo $ID1;
                                echo $ID2;
                                echo $ID3;

                                echo $FINTABLA;

                            }


                            /*
              if ( $tipoCampo == 'date')
              {

               $valor = 0;

                          $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                          // $nrowl=mysqli_num_rows($queryList);
                          while($rowMotorizado=mysqli_fetch_array($queryList))
                          {

                            $valor      =$rowMotorizado[$input_name];


                          }

              if (strlen($valor) > 0) {



              //echo '<p>'.$div_nombre_campo.': '.$valor.'<p>';
                 echo '<div class="'.$div_class.'">
                               <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$valor.'</div>
                          </div>';



              }



              }
              */
                            if ($tipoCampo == 'date') {
                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                if (strlen($valor) > 0 and ($valor != "" and $valor != " " and $valor != "0000-00-00")) {
                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $valor . '</div>
            </div>';
                                } elseif ($div_class == "form-group col-md-12") {
                                    echo "<div class='{$div_class}' style='display:none'>&nbsp;</div>";
                                } else {
                                    echo "<div class='{$div_class}' style='margin-bottom:0px!important;'>&nbsp;</div>";
                                }
                            }





                            if ($tipoCampo == 'file') {


                                $valor = 0;

                                $queryList = mysqli_query($conn3, "SELECT id, $input_name FROM  $Tabla where id = $historiaClinica");
                                // $nrowl = mysqli_num_rows($queryList);
                                if ($queryList) {
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $k = $rowMotorizado['id'];
                                        $valor = $rowMotorizado[$input_name];
                                    }
                                }


                                if (strlen($valor) > 0) {

                                    $file = explode("|", $valor);
                                    $view = '';
                                    foreach ($file as $data) {
                                        if ($data != '') {
                                            $view .= '<img src="' . $data . '" height="100">';
                                        }
                                    }

                                    //echo '<p>'.$div_nombre_campo.': '.$view.'<p>';
                                    echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '">  ' . $div_nombre_campo . ' ' . $view . '</div>


            </div>';
                                }
                            }

                            // las modificaciones
                            if ($Tabla == 'historia_1_cirugiaplastica54165654312' && $idCampo == 549) {
                                echo '<div class="box-body col-md-12 center text-center" style="font-size: 18px">';
                                echo '<img src="' . funcionMaster($historiaClinica, 'id', 'rayado_img1', $Tabla) . '" style="width:60%; height:auto">';
                                echo '</div><hr>';
                            }
                            if ($Tabla == 'historia_9_podologia71250991924' && $idCampo == 2991) {
                                echo '<div style="display: flex; justify-content: space-between;">';
                                echo '<div style="float: left; width: 50%;">';
                                echo '<br><span style="font-weight:bold; margin-left: 12">Tipo de Pie:</span>   <b><img src="' . $Tipo_Pie . '" alt="" style="width:15%; height:auto">';
                                echo '</div>';
                            }

                            if ($Tabla == 'historia_9_podologia71250991924' && $idCampo == 2993) {
                                echo '<div style="float: right; width: 50%; margin-left: 27">';
                                echo '<br>Tipo de Planta de Pie :   <b><img src="' . $Planta_Pie . '" alt="" style="width:15%; height:auto; margin-left: 16">';
                                echo '</div>';
                                echo '</div>';
                            }

                        }
                        if ($idHistoria == 17) {
                            echo '<div class="col-md-12"> <div class="col-md-12"> <br>Resultado:' . $resultado1 . '<div></DIV>';
                            echo '<div class="col-md-12"> <div class="col-md-12"> <br>INTERPRETACIÓN DE HAMILTON  - PUNTUACIÓN TOTAL NIVELES DE ANSIEDAD :' . $interpretacion . '<div></DIV>';
                        }
                        if ($idHistoria == 18) {
                            echo '<div class="col-md-12"> <div class="col-md-12"> <br>Resultado:<b>' . $sumavalores . '</b>&nbsp&nbsp&nbsp&nbsp';
                            echo 'INCAPACIDAD FUNCIONAL: <b>' . $valoracion . '</b><div></DIV>';
                        }




                        ?>
                        <br>
                        <hr>
                        <br>


                        <!--<div class="col-xs-6" align="center">-->
                        <div class="col-md-12" align="center">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <?php if (strlen($Firma) > 10) {
                                        echo "<img src='$Firma' height='100' width='330'> <br>__________________________________ <br>";
                                        echo "Nombre: {$nombre_cliente}<br>
                C.C. {$CODI_CLIENTE}<br>
                <b>Firma del Paciente (o persona autorizada para firmar para el Paciente)</b> <br>";
                                    }
                                    ?>

                                </div>


                            </div>
                            <div class="col-md-6" align="center">
                                <?php
                                echo $firmaImg;

                                ?>
                                <br>_______________________________________<br>
                                <?php echo $nombreF ?><br>
                                <?php echo $especialidad ?><br>
                                <b>* Documento firmado digitalmente *</b>
                            </div>
                        </div>



                        <!--cerra el div con clase page-->
                    </div>
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

        <!-- cerrar la tabla principal -->
    </table>
</body>





<!-- this row will not appear when printing -->
<!--
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="#" class="btn btn-default"  style="border: 1px solid black;" onclick="window.print()"><i class="fa fa-print"></i> Imprimir</a>
            </div>
          </div>
            -->

<style>
    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>