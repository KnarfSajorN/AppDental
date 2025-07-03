
<?php



include 'header.php';
include 'menu.php';



#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$clienteId = $_GET['clienteId'];

$QueryCliente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($QueryCliente);
while ($RowCliente = mysqli_fetch_array($QueryCliente)) {

    $nombre_cliente = $RowCliente['nombre_cliente'];
    $fechaNacimiento = $RowCliente['fechaNacimiento'];

    $genero = $RowCliente['genero'];
}

function calcularDiasDesdeNacimiento($fechaNacimiento) {
    // Fecha actual
    $fechaActual = new DateTime();
    // Fecha de nacimiento convertida a objeto DateTime
    $fechaNacimiento = new DateTime($fechaNacimiento);
    // Calcular la diferencia entre la fecha actual y la fecha de nacimiento
    $diferencia = $fechaNacimiento->diff($fechaActual);
    // Obtener el número total de días de diferencia
    $diasTotales = $diferencia->format('%a');
    return $diasTotales;
}

function calcularMesesDesdeNacimiento($fechaNacimiento) {
    // Fecha actual
    $fechaActual = new DateTime();
    // Fecha de nacimiento convertida a objeto DateTime
    $fechaNacimiento = new DateTime($fechaNacimiento);
    // Calcular la diferencia entre la fecha actual y la fecha de nacimiento
    $diferencia = $fechaNacimiento->diff($fechaActual);
    
    // Calcular la edad en meses
    $mesesTotales = $diferencia->format('%y') * 12 + $diferencia->format('%m');

    return $mesesTotales;
}

/*
// Fecha actual
$fechaActual = new DateTime();
// Crear una fecha con 5 años, 11 meses y 29 días a partir de la fecha actual
$fechaLimite = clone $fechaActual;
$fechaLimite->add(new DateInterval('P5Y11M29D'));
// Calcular la diferencia en días entre la fecha límite y 8 días después
$fechaInicio = clone $fechaActual;
$fechaInicio->add(new DateInterval('P8D'));
$interval = $fechaInicio->diff($fechaLimite);
$diasEntreFechas = $interval->days;
echo "La cantidad de días entre 8 días y 5 años, 11 meses y 29 días es: $diasEntreFechas días.";
*/








//$EdadCompleeta = Funcion_Edad_Paciente_Completa($fechaNacimiento);




$DiasNacido_Paciente = calcularDiasDesdeNacimiento($fechaNacimiento);//importante no quitar
$MesesNacio_Paciente = calcularMesesDesdeNacimiento($fechaNacimiento);//importante no quitar

//Primera Infancia 8 días a 5 años, 11 meses y 29 días 
//Primera Infancia -> 1
$TipoHistoriaModuloAplicar = "0";
$TipoTextoHistoriaModuloAplicar="";
if($DiasNacido_Paciente>=8 AND $DiasNacido_Paciente<= 2190){
  $TipoHistoriaModuloAplicar = "1";
  $TipoTextoHistoriaModuloAplicar = "Primera Infancia";
  $RedireccionHistoria="RIAS_GuardarHistorias.php";
}
// Infancia 6 años a 11 años 11 meses y 29 días 
// Infancia -> 1
else if($DiasNacido_Paciente>=2191 AND $DiasNacido_Paciente<= 4382){
  $TipoHistoriaModuloAplicar = "2";
  $TipoTextoHistoriaModuloAplicar = "Infancia";
  $RedireccionHistoria="RIAS_GuardarHistoria_Infancia.php";
}

// Adolescencia 12 años a 17 años 11 meses y 29 días 
// Adolescencia -> 1
else if($DiasNacido_Paciente>=4383 AND $DiasNacido_Paciente<= 6573){
    $TipoHistoriaModuloAplicar = "3";
    $TipoTextoHistoriaModuloAplicar = "Adolescencia";
    $RedireccionHistoria="RIAS_GuardarHistoria_Adolescencia.php";
  }
// Juventud 18 años a  < 27 años 11 meses y 29 días
// Juventud -> 1
else if($DiasNacido_Paciente>=6574 AND $DiasNacido_Paciente<= 10226){
    $TipoHistoriaModuloAplicar = "4";
    $TipoTextoHistoriaModuloAplicar = "Juventud";
    $RedireccionHistoria="RIAS_GuardarHistoria_Juventud.php";
  }
// Adultez 28  años a 58 años 11 meses y 29 días
// Adultez -> 1
else if($DiasNacido_Paciente>=10227 AND $DiasNacido_Paciente<= 21548){
    $TipoHistoriaModuloAplicar = "5";
    $TipoTextoHistoriaModuloAplicar = "Adultez";
    $RedireccionHistoria="RIAS_GuardarHistoria_Adultez.php";
  }
// Vejez 59 a;os hasta adelante 
// Vejez -> 1
else if($DiasNacido_Paciente>=21549 ){
    $TipoHistoriaModuloAplicar = "6";
    $TipoTextoHistoriaModuloAplicar = "Vejez";
    $RedireccionHistoria="RIAS_GuardarHistoria_Vejez.php";
  }
else{
    echo "<script>alert('Para la edad del paciente no se encuentra historia');window.location='portada';</script>";
}

//2555 DIAS -> 6 a;os y 11 meses 29 dias
?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-bottom: 10px;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

</style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historia de <?=$TipoTextoHistoriaModuloAplicar;?>  </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Historia de <b><u><?=$TipoTextoHistoriaModuloAplicar;?></b></u> del Paciente <?=$nombre_cliente. " wqw ".$DiasNacido_Paciente?> </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?=$RedireccionHistoria;?>" method="POST" id="Formulario_Historia_RIAS">







                            <!-- Collapse Exterior -->
                            <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">



                                <!-- Accordion 1-->
                                <div class="box-header with-border" style="padding: 15px;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_1" style="color:#3c8dbc;">
                                            Datos Personales
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_1" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <?php echo datosPacientesReducido($clienteId); ?>

                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->



                                <!-- Accordion 1-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_2" style="color:#3c8dbc;">
                                            1. Anamnesis
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_2" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php

                                        //Para Todas las historias
                                        include 'ModulosRIAS/DatosGenerales/AnamnesisGeneral.php';


                                        //Anamnesis Primera Infancia
                                        if($TipoHistoriaModuloAplicar=="1"){

                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_PrimeraInfancia.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_PruebasTamizaje.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_HitosDesarrolloNino.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_AlimentacionNinoMenor6.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_AlimentacionNinoMayor6.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_IdentificacionFactoresRiesgo.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_RutinasHabitosSaludables.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_PracticasCrianzaCuidado.php';

                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_ValoracionConformacionFamiliar.php';
                                            include 'ModulosRIAS/PrimeraInfancia/Antecedentes_ValoracionCondicionVida.php';
                                            ///////////////////////////////////////////////////////////////////////////////

                                        }








                                        
                                        //Anamnesis Infancia
                                        if($TipoHistoriaModuloAplicar=="2"){

                                            include 'ModulosRIAS/Infancia/Antecedentes_Infancia.php';
                                            include 'ModulosRIAS/Infancia/Antecedentes_ConsumoHabitosAlimentarios.php';
                                            include 'ModulosRIAS/Infancia/Antecedentes_PracticaHabitosSaludables.php';
                                            include 'ModulosRIAS/Infancia/Antecedentes_DesarolloAprendizaje.php';
                                            include 'ModulosRIAS/Infancia/Antecedentes_PracticasCrianzaCuidado.php';
                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/Infancia/Antecedentes_ConformacionDinamicaFamiliar.php';
                                            include 'ModulosRIAS/Infancia/Antecedentes_ValoracionCondicionesVida.php';
                                            //////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Infancia/Antecedentes_SeguimientoCompromiso.php';

                                        }








                                        //Anamnesis Adolescencia
                                        if($TipoHistoriaModuloAplicar=="3"){

                                            include 'ModulosRIAS/Adolescencia/Antecedentes_Adolescencia.php';
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_DerechosSexualesReproductivos.php';

                                            include 'ModulosRIAS/Adolescencia/Antecedentes_ValoracionDerechosSexuales.php';

                                            include 'ModulosRIAS/Adolescencia/Antecedentes_ConsumoHabitosAlimentarios.php';
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_PracticaHabitosSaludables.php';
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_PracticasCrianzaCuidado.php';
                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_ConformacionDinamicaFamiliar.php';  
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_ValoracionCondicionesVida.php';
                                            /////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Adolescencia/Antecedentes_SeguimientoCompromiso.php';

                                        }


                                        //Anamnesis Juventud
                                        if($TipoHistoriaModuloAplicar=="4"){

                                            include 'ModulosRIAS/Juventud/Antecedentes_Adolescencia.php';
                                            include 'ModulosRIAS/Juventud/Antecedentes_DerechosSexualesReproductivos.php';

                                            include 'ModulosRIAS/Juventud/Antecedentes_ConsumoHabitosAlimentarios.php';
                                            include 'ModulosRIAS/Juventud/Antecedentes_PracticaHabitosSaludables.php';
                                            include 'ModulosRIAS/Juventud/Antecedentes_PracticasCrianzaCuidado.php';
                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/Juventud/Antecedentes_ConformacionDinamicaFamiliar.php';  
                                            include 'ModulosRIAS/Juventud/Antecedentes_ValoracionCondicionesVida.php';
                                            /////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Juventud/Antecedentes_SeguimientoCompromiso.php';

                                        }



                                        //Anamnesis Adultez
                                        if($TipoHistoriaModuloAplicar=="5"){

                                            include 'ModulosRIAS/Adultez/Antecedentes_Adolescencia.php';
                                            include 'ModulosRIAS/Adultez/Antecedentes_DerechosSexualesReproductivos.php';

                                            include 'ModulosRIAS/Adultez/Antecedentes_ConsumoHabitosAlimentarios.php';
                                            include 'ModulosRIAS/Adultez/Antecedentes_PracticaHabitosSaludables.php';
                                            include 'ModulosRIAS/Adultez/Antecedentes_PracticasCrianzaCuidado.php';
                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/Adultez/Antecedentes_ConformacionDinamicaFamiliar.php';  
                                            include 'ModulosRIAS/Adultez/Antecedentes_ValoracionCondicionesVida.php';
                                            /////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Adultez/Antecedentes_SeguimientoCompromiso.php';

                                        }

                                        //Anamnesis Vejez
                                        if($TipoHistoriaModuloAplicar=="6"){

                                            include 'ModulosRIAS/Vejez/Antecedentes_Adolescencia.php';
                                            include 'ModulosRIAS/Vejez/Antecedentes_DerechosSexualesReproductivos.php';

                                            include 'ModulosRIAS/Adultez/Antecedentes_ConsumoHabitosAlimentarios.php';
                                            include 'ModulosRIAS/Vejez/Antecedentes_PracticaHabitosSaludables.php';
                                            include 'ModulosRIAS/Vejez/Antecedentes_PracticasCrianzaCuidado.php';
                                            ///////////////////////////////////////////////////////////////////////////////
                                            $ClienteFami_Eco = $clienteId;//se usara para el familiograma y el ecomapa
                                            include 'ModulosRIAS/Vejez/Antecedentes_ConformacionDinamicaFamiliar.php';  
                                            include 'ModulosRIAS/Vejez/Antecedentes_ValoracionCondicionesVida.php';
                                            /////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Vejez/Antecedentes_SeguimientoCompromiso.php';

                                        }      
                                        
                                        

                                        ?>
                                        
                            
                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->




                                <!-- Accordion 2-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_3" style="color:#3c8dbc;">
                                            2. Examen Físico
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_3" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php
                                        //Examen Fisico Primera Infancia
                                        if($TipoHistoriaModuloAplicar=="1"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_SignosVitales.php';

                                            
                                            ///////////////////////////////////////////////////////////////////////////
                                            $fechaNacimiento = $fechaNacimiento;//para este modulo
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionDesarrollo.php';
                                            ///////////////////////////////////////////////////////////////////////////

                                            ////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            
                                            ////////////////////////////////////////////////////////////////////////////
                                            
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionSaludSexual.php';
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionSaludVisual.php';
                                            
                                            ////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            ////////////////////////////////////////////////////////////////////////////
                                            
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionSaludBucal.php';
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_ValoracionSaludMental.php';
                                            include 'ModulosRIAS/PrimeraInfancia/ExamenFisico_OtrosAspectos.php';
                                            
                                        }
                                              
                                        
                                        
                                        //Examen Fisico Infancia
                                        if($TipoHistoriaModuloAplicar=="2"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            $GeneroTablaPresionArterial = $genero;//para este modulo
                                            include 'ModulosRIAS/Infancia/ExamenFisico_SignosVitales.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo9 = $MesesNacio_Paciente;//para este modulo   
                                            include 'ModulosRIAS/Infancia/ExamenFisico_DesarolloRendimientoEscolar.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $GeneroTanner = $genero;//para este modulo
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionVidaSexual.php';
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionSaludVisual.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionSaludBucal.php';
                                            include 'ModulosRIAS/Infancia/ExamenFisico_ValoracionSaludMental.php';
                                            
                                            include 'ModulosRIAS/Infancia/ExamenFisico_OtrosAspectos.php';
                                        }





                                        
                                        //Examen Fisico Adolescencia
                                        if($TipoHistoriaModuloAplicar=="3"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            $GeneroTablaPresionArterial = $genero;//para este modulo
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_SignosVitales.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                              
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionDesarollo.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $GeneroTanner = $genero;//para este modulo
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionVidaSexual.php';
                                            ////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionSaludVisual.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionSaludBucal.php';

                                            ////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_AnexoRQC_SRQ = $MesesNacio_Paciente;//para este modulo 
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_ValoracionSaludMental.php';

                                            ///////////////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Adolescencia/ExamenFisico_OtrosAspectos.php';

                                        }
                                        



                                        //Examen Fisico Juventud
                                        if($TipoHistoriaModuloAplicar=="4"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            $GeneroTablaPresionArterial = $genero;//para este modulo
                                            include 'ModulosRIAS/Juventud/ExamenFisico_SignosVitales.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                              
                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionDesarollo.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            $DiasNacido_Paciente_G = $DiasNacido_Paciente;
                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $GeneroTanner = $genero;//para este modulo
                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionVidaSexual.php';
                                            ////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionSaludVisual.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionSaludBucal.php';

                                            ////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_AnexoRQC_SRQ = $MesesNacio_Paciente;//para este modulo 
                                            include 'ModulosRIAS/Juventud/ExamenFisico_ValoracionSaludMental.php';

                                            ///////////////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Juventud/ExamenFisico_OtrosAspectos.php';

                                        }

                                        
                                        //Examen Fisico Adultez
                                        if($TipoHistoriaModuloAplicar=="5"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            $GeneroTablaPresionArterial = $genero;//para este modulo
                                            include 'ModulosRIAS/Adultez/ExamenFisico_SignosVitales.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                              
                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionDesarollo.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            $DiasNacido_Paciente_G = $DiasNacido_Paciente;
                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $GeneroTanner = $genero;//para este modulo
                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionVidaSexual.php';
                                            ////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionSaludVisual.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionSaludBucal.php';

                                            ////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_AnexoRQC_SRQ = $MesesNacio_Paciente;//para este modulo 
                                            include 'ModulosRIAS/Adultez/ExamenFisico_ValoracionSaludMental.php';

                                            ///////////////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Adultez/ExamenFisico_OtrosAspectos.php';

                                        }
                                        
                                        //Examen Fisico Vejez
                                        if($TipoHistoriaModuloAplicar=="6"){
                                            //se usara esto $MesesNacio_Paciente
                                            $MesesSignosVitales=$MesesNacio_Paciente;
                                            $cliente_SignosVitales=$clienteId;//para este modulo
                                            $GeneroTablaPresionArterial = $genero;//para este modulo
                                            include 'ModulosRIAS/Vejez/ExamenFisico_SignosVitales.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                              
                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionDesarollo.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $clienteId_Grafica = $clienteId;//para este modulo
                                            $genero_Grafica = $genero;//para este modulo
                                            $DiasNacido_Paciente_G = $DiasNacido_Paciente;
                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionNutricionalAntropometricos.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $GeneroTanner = $genero;//para este modulo
                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionVidaSexual.php';
                                            ////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionSaludVisual.php';

                                            /////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_Anexo4=$MesesNacio_Paciente;
                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionAuditivaComunicativa.php';
                                            /////////////////////////////////////////////////////////////////////////////////////////

                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionSaludBucal.php';

                                            ////////////////////////////////////////////////////////////////////////////////////////
                                            $MesesNacido_AnexoRQC_SRQ = $MesesNacio_Paciente;//para este modulo 
                                            include 'ModulosRIAS/Vejez/ExamenFisico_ValoracionSaludMental.php';

                                            ///////////////////////////////////////////////////////////////////////////////////////
                                            include 'ModulosRIAS/Vejez/ExamenFisico_OtrosAspectos.php';

                                        }
                                        
                                        ?>

                                        

                                    </div>
                                </div>
                                <!-- Accordion 2 [FIN]-->














                                <!-- Accordion 3-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_4" style="color:#3c8dbc;">
                                            3. Educación
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_4" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php
                                        //Educacion Primera Infancia

                                        
                                        if($TipoHistoriaModuloAplicar=="1"){

                                            include 'ModulosRIAS/PrimeraInfancia/Educacion_General.php';

                                        }
                                        
                                        //Educacion Infancia
                                        if($TipoHistoriaModuloAplicar=="2"){

                                            include 'ModulosRIAS/Infancia/Educacion_General.php';

                                        }
                                        
                                        //Educacion Infancia
                                        if($TipoHistoriaModuloAplicar=="3"){

                                            include 'ModulosRIAS/Adolescencia/Educacion_General.php';

                                        }
                                        
                                        //Educacion Juventud
                                        if($TipoHistoriaModuloAplicar=="4"){

                                            include 'ModulosRIAS/Juventud/Educacion_General.php';

                                        }

                                        
                                        //Educacion Adultez
                                        if($TipoHistoriaModuloAplicar=="5"){

                                            include 'ModulosRIAS/Adultez/Educacion_General.php';

                                        }

                                        //Educacion Vejez
                                        if($TipoHistoriaModuloAplicar=="6"){

                                            include 'ModulosRIAS/Vejez/Educacion_General.php';

                                        }
                                        
                                        
                                        ?>

                                        

                                    </div>
                                </div>
                                <!-- Accordion 3 [FIN]-->

                                <!-- Accordion 4-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_5" style="color:#3c8dbc;">
                                            4. Plan de Cuidados
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_5" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php

                                        

                                        //Educacion Primera Infancia

                                        
                                        if($TipoHistoriaModuloAplicar=="1"){

                                            include 'ModulosRIAS/PrimeraInfancia/PlanCuidados_General.php';

                                        }
                                           
                                        
                                        //Educacion Infancia
                                        if($TipoHistoriaModuloAplicar=="2"){

                                            include 'ModulosRIAS/Infancia/PlanCuidados_General.php';

                                        }
                                        
                                        //Educacion Adolescencia
                                        if($TipoHistoriaModuloAplicar=="3"){

                                            include 'ModulosRIAS/Adolescencia/PlanCuidados_General.php';

                                        }
                                        
                                        //Educacion Juventud
                                        if($TipoHistoriaModuloAplicar=="4"){

                                            include 'ModulosRIAS/Juventud/PlanCuidados_General.php';

                                        }

                                        
                                        //Educacion Adultez
                                        if($TipoHistoriaModuloAplicar=="5"){

                                            include 'ModulosRIAS/Adultez/PlanCuidados_General.php';

                                        }

                                        //Educacion Vejez
                                        if($TipoHistoriaModuloAplicar=="6"){

                                            include 'ModulosRIAS/Vejez/PlanCuidados_General.php';

                                        }
                                        
                                        

                                        ?>

                                        

                                    </div>
                                </div>
                                <!-- Accordion 4 [FIN]-->

                                
                                

                                <!-- Accordion 5-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_6" style="color:#3c8dbc;">
                                            5. Diagnosticos
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_6" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php
                                         include 'ModulosRIAS/DatosGenerales/DiagnosticosModulo.php';
                                        ?>

                                    </div>
                                </div>
                                <!-- Accordion 5 [FIN]-->




                                 <!-- Accordion 6-->
                                 <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_7" style="color:#3c8dbc;">
                                            6. Mas informacion
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_7" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <?php
                                         include 'ModulosRIAS/DatosGenerales/MasInformacionGeneral.php';
                                        ?>

                                    </div>
                                </div>
                                <!-- Accordion 6 [FIN]-->




                                <!-- Accordion 7-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_8" style="color:#3c8dbc;">
                                            7. Recetario
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_8" class="panel-collapse collapse">
                                    <div class="panel-body">


                                        <div class='form-group col-md-12'>
                                        <?php
                                        
                                        $cliente_id = $clienteId;
                                        $usuario_id = $_SESSION['ID'];
                                        include 'RM_Receta.php'
                                        
                                        ?>
                                        <style>
                                            /* estos es impoortante para que cuando se muestre el desplegable no genere error con el desplegable siguiente que no se podria seleccionar hasta que se cierre este desplegable en el que esta el recetario, esto lo soluciona */
                                            .card-big-shadow:before {
                                            bottom: -25px !important;
                                            }
                                        </style>



                                        </div>
                                        

                                    </div>
                                </div>
                                <!-- Accordion 7 [FIN]-->

                                



                               




                            </div>
                            <!-- Fin del Collapse Exterior -->











































                            <h4 style="text-align:center;color:red">Importante: *Llenar primero la remision y la finalidad de consulta debido a que si deben crear un nuevo campo en remision o finalidad de la consulta deberan refrecar la pagina*</h4>
                        
                            <input type="hidden" name="cliente_id" value="<?php echo $_GET['clienteId'];; ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">

                            
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            

                        </form>
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

<?php
//codigo para que funcionen las graficas en Primera Infancia

if($TipoHistoriaModuloAplicar=="1"){
    include 'ModulosRIAS/PrimeraInfancia/Include_GraficasCrecimientoZ_2.php';
}

//codigo para que funcionen las graficas en Infancia
if($TipoHistoriaModuloAplicar=="2"){
    include 'ModulosRIAS/Infancia/Include_GraficasCrecimientoZ_2.php';
}


//codigo para que funcionen las graficas en Adolescencia
if($TipoHistoriaModuloAplicar=="3"){
    include 'ModulosRIAS/Adolescencia/Include_GraficasCrecimientoZ_2.php';
}

//codigo para que funcionen las graficas en Adolescencia
if($TipoHistoriaModuloAplicar=="4"){
    include 'ModulosRIAS/Juventud/Include_GraficasCrecimientoZ_2.php';
}


?>
<script>

//Eto es para validar los campos requeridos ocultos
document.getElementById('Formulario_Historia_RIAS').addEventListener('submit', function(event) {
    var camposOcultos = [
        { id: 'familiograma_xml', mensaje: 'Llenar el familiograma' },
        { id: 'ecomapa_xml', mensaje: 'Llenar el ecomapa' }
    ];

    var camposIncompletos = camposOcultos.filter(function(campo) {
        return document.getElementById(campo.id).value === '';
    });

    if (camposIncompletos.length > 0) {
        event.preventDefault(); // Evitar que el formulario se envíe
        var mensajes = camposIncompletos.map(function(campo) {
            return campo.mensaje;
        }).join('\n');
        alert('Por favor, completar los siguientes campos:\n' + mensajes);
        return false;
    }
});



function agregarRequiredACampos(clase) {
    var radios = document.querySelectorAll('.' + clase);

    radios.forEach(function(radio) {
        radio.setAttribute('required', 'required');
    });
}

function agregarRequiredACamposESPECIAL(clase) {
    var divs = document.querySelectorAll('.' + clase);

    divs.forEach(function(div) {
        var inputs = div.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.setAttribute('required', 'required');
        });
    });
}


<?php

if($TipoHistoriaModuloAplicar=="1"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredMCHART_Radio');
agregarRequiredACampos('RequiredVALECESTRUCTURAL_Radio');";

echo "agregarRequiredACamposESPECIAL('RequiredESCALAABREVIADADESAROLLO_ESPECIALBG');";
echo "agregarRequiredACampos('RequiredFACTORESRIESGO1_Radio');";

echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALES_Radio');";
echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALESTODOS_Radio');";

echo "agregarRequiredACampos('RequiredVALEVALORACION_Radio');";

}


if($TipoHistoriaModuloAplicar=="2"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredGOODENOUGH_Radio');
agregarRequiredACampos('RequiredVALECESTRUCTURAL_Radio');
agregarRequiredACampos('RequiredRQC_Radio');";

echo "agregarRequiredACamposESPECIAL('RequiredESCALAABREVIADADESAROLLO_ESPECIALBG');";
echo "agregarRequiredACampos('RequiredFACTORESRIESGO1_Radio');";


echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALES_Radio');";
echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALESTODOS_Radio');";

echo "agregarRequiredACampos('RequiredVALEVALORACION_Radio');";
}


if($TipoHistoriaModuloAplicar=="3"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredVALECESTRUCTURAL_Radio');
agregarRequiredACampos('RequiredASSIST_Select');
agregarRequiredACampos('RequiredAUDIT_Select');";

echo "agregarRequiredACampos('RequiredFACTORESRIESGO1_Radio');";

echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALES_Radio');";
echo "agregarRequiredACampos('RequiredVALERIESGOSGENERALESTODOS_Radio');";

echo "agregarRequiredACampos('RequiredVALEVALORACION_Radio');";


echo "agregarRequiredACampos('RequiredSRQ_Radio');";
echo "agregarRequiredACampos('RequiredRQC_Radio');";

}


if($TipoHistoriaModuloAplicar=="4"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredASSIST_Select');
agregarRequiredACampos('RequiredAUDIT_Select');";

echo "agregarRequiredACampos('RequiredSRQ_Radio');";

}


if($TipoHistoriaModuloAplicar=="5"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredASSIST_Select');
agregarRequiredACampos('RequiredAUDIT_Select');";

echo "agregarRequiredACampos('RequiredSRQ_Radio');";

}

if($TipoHistoriaModuloAplicar=="6"){
    echo "agregarRequiredACampos('RequiredAPGAR_Radio');
agregarRequiredACampos('RequiredASSIST_Select');
agregarRequiredACampos('RequiredAUDIT_Select');";

echo "agregarRequiredACampos('RequiredSRQ_Radio');";

}

?>



$(document).ready(function() {
    // Agrega un evento 'invalid' a todos los elementos de formulario
    $('#Formulario_Historia_RIAS :input').on('invalid', function() {
        // Encuentra el panel collapse que contiene el campo de formulario inválido
        var panelCollapse = $(this).closest('.collapse');
        // Verifica si el panel collapse está cerrado
        if (!panelCollapse.hasClass('show')) {
            // Abre el panel collapse
            panelCollapse.collapse('show');
        }
    });
});

</script>


<?php

//para que funcione el modulo 6 de mas informacion
include 'ModulosRIAS/DatosGenerales/MasInformacionGeneralJS.php';
// para que funcione el modulo 5
echo "<script>$(document).ready(function() {
    Modulo_CIE10_Registro(0);
    Modulo_CIE10_Registro(1);
    Modulo_CIE10_Registro(2);
});</script>";

?>





<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php



$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];

if($TipoHistoriaModuloAplicar=="1"){
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaPrimeraInfancia";//Nombre de la tabla de la base de datos de la historia 
}
if ($TipoHistoriaModuloAplicar == "2") {
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaInfancia";//Nombre de la tabla de la base de datos de la historia
}
if ($TipoHistoriaModuloAplicar == "3") {
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaAdolescencia";//Nombre de la tabla de la base de datos de la historia
}
if ($TipoHistoriaModuloAplicar == "4") {
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaJuventud";//Nombre de la tabla de la base de datos de la historia
}
if ($TipoHistoriaModuloAplicar == "5") {
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaAdultez";//Nombre de la tabla de la base de datos de la historia
}
if ($TipoHistoriaModuloAplicar == "6") {
    $Nombre_Tabla_autoguardado = "RIAS_HistoriaVejez";//Nombre de la tabla de la base de datos de la historia
}
include 'RIAS_AutoGuardado.php';//usar esta para  la historia de medicina estetica

?>