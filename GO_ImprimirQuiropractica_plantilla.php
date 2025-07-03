<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

$Historia_id = decrypt($_GET['historiaClinica1']);

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Quiropractica where id = $Historia_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id = $rowMotorizado['id'];
    $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];

        $razon_primaria                = $rowMotorizado['razon_primaria'];
        $razon_secundaria                   = $rowMotorizado['razon_secundaria'];
        $localizacion                  = $rowMotorizado['localizacion'];
        $malestar                    = $rowMotorizado['malestar'];
        $calidad                    = $rowMotorizado['calidad'];
        $area                    = $rowMotorizado['area'];
        $entumecimiento                    = $rowMotorizado['entumecimiento'];
        $intensidad                    = $rowMotorizado['intensidad'];
        $frecuencia                    = $rowMotorizado['frecuencia'];
        $agrada_malestar                    = $rowMotorizado['agrada_malestar'];
        $nota                    = $rowMotorizado['nota'];
        $intensidad_dolor                    = $rowMotorizado['intensidad_dolor'];
        $sueno                    = $rowMotorizado['sueno'];
        $cuidados                    = $rowMotorizado['cuidados'];
        $desplazamiento                    = $rowMotorizado['desplazamiento'];
        $trabajo                    = $rowMotorizado['trabajo'];
        $recreacion                    = $rowMotorizado['recreacion'];
        $frecuencia_dolor                   = $rowMotorizado['frecuencia_dolor'];
        $levantamiento                    = $rowMotorizado['levantamiento'];
        $caminata                    = $rowMotorizado['caminata'];
        $actitud                    = $rowMotorizado['actitud'];
        $total                   = $rowMotorizado['total'];
        $indice                    = $rowMotorizado['indice'];
    
}


if($nrowl == '') {
    $queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar where historia_id= '$Historia_id'");

 
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
   $Imagenologia_Examen = $rowMotorizado['ecografia'];
    $Laboratorio_Examenes = $rowMotorizado['laboratorio'];
      $cliente_id = $rowMotorizado['cliente_id'];
    $usuario_id = $rowMotorizado['usuario_id'];

     }

 }







$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $genero = $rowMotorizado['genero'];

    if ($genero == "M") {
        $genero = "Masculino";
    } elseif ($genero == "F") {
        $genero = "Femenino";
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $nombreF       = $rowMotorizado['nombreF'];

    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
    }


    if (strlen($firma) > 0) {
        $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='150' width='300'>";
    }
}





  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica'");
    
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
      }

      if (strlen($firmaP) > 10) {
     $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 





      $imgEscalaTanner1 = "<img src='img/EscalaTanner/niño1.jpg' height='auto' width='300'>";
      $imgEscalaTanner2 = "<img src='img/EscalaTanner/niño2.jpg' height='auto' width='300'>";
      $imgEscalaTanner3 = "<img src='img/EscalaTanner/niño3.jpg' height='auto' width='300'>";
      $imgEscalaTanner4 = "<img src='img/EscalaTanner/niño4.jpg' height='auto' width='300'>";
      $imgEscalaTanner5 = "<img src='img/EscalaTanner/niño5.jpg' height='auto' width='300'>";
      $imgEscalaTanner6 = "<img src='img/EscalaTanner/niña1.jpg' height='auto' width='300'>";
      $imgEscalaTanner7 = "<img src='img/EscalaTanner/niña2.jpg' height='auto' width='300'>";
      $imgEscalaTanner8 = "<img src='img/EscalaTanner/niña3.jpg' height='auto' width='300'>";
      $imgEscalaTanner9 = "<img src='img/EscalaTanner/niña4.jpg' height='auto' width='300'>";
      $imgEscalaTanner10 = "<img src='img/EscalaTanner/niña5.jpg' height='auto' width='300'>";








?>
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
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Telefono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Genero:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">

                        <!-- comienzo de la impresion de la informacion-->
                        <?php //$tabla[3] = "<div class='col-3' style='padding-bottom: 10px;'>";
                        //$tabla[6] = "<div class='col-6' style='padding-bottom: 10px;'>";
                        //$tabla[12] = "<div class='col-12' style='padding-bottom: 10px;'>"; ?>

                        <?php
                        if ($_GET['tipo'] == 'consulta') :
                        ?>
                            <h3 align="center">Quiropráctica</h3><br>
                            
                            <?php
                            $Historia_Nombre = "Historia_Quiropractica";
                            $Historia_id = $Historia_id;
                            //include 'IR_Imprimir.php';
                            ?>

                            <!-- <hr style="border-top: 1px solid black;opacity: 1;"> -->

                            <?php
                            if (strlen($razon_primaria) > "0") {?>
                                <!-- <div class='col-3' style='padding-bottom: 10px;'> -->
                                    <h4 style="font-size:15px">Razón(es) Primaria (as) Para Buscar Consulta Quiropráctica:</h4> <p><?=  $razon_primaria ?></p> 
                                <!-- </div> -->
                            <?php }
                            if (strlen($razon_secundaria) > "0") { ?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Razn Secundaria:</b> <?= $razon_secundaria ?> </div>
                            <?php }

                            if(strlen($localizacion) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">Localización del Malestar:</b> <?= $localizacion ?> </div>   
                            <?php }
                            if (strlen($malestar) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">¿Cómo y Cuándo Comienza el Malestar?:</b> <?= $malestar ?></div>
                            <?php }
                            if (strlen($calidad) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">Calidad del Dolor/Queja:</b> <?= $calidad ?> </div>
                            <?php }
                            if (strlen($area) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">La Queja/Dolor se Irradia o Viaja a Otra Area de su Cuerpo?, ¿Cúal Área?:</b> <?= $area ?> </div>
                            <?php }
                            if (strlen($entumecimiento) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">¿Tiene Algún Entumecimiento en su Cuerpo?, ¿Donde?:</b> <?= $entumecimiento ?> </div>
                            <?php }

                            if (strlen($intensidad) > "0") { ?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Grado de la Intensidad/Severidad del Dolor, de 0 (Ninguna Queja/Dolor) Hasta 10 (El Peor Dolor/Queja Imaginable):</b> <?= $intensidad ?> </div>
                            <?php }

                            if (strlen($frecuencia) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">¿Con que Frecuencia Siente el Dolor?, ¿Cuánto Duró la Última vez que Ocurrió?:</b> <?= $frecuencia ?> </div>
                            <?php }


                            if (strlen($agrada_malestar) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">¿Algo Agrava el Malestar?:</b> <?= $agrada_malestar ?> </div>
                            <?php }

                            if (strlen($nota) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Intervenciones previas, Tratamientos, Medicaciones, Cirugías u Otros Xuidados que Usted Haya Buscado Para su Malestar:</b><?=  $nota ?> </div>
                            <?php }

                            if (strlen($intensidad_dolor) > "0") {?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">Intensidad de Dolor:</b> <?= $intensidad_dolor ?> </div>
                            <?php }

                            if (strlen($sueno) > "0") { ?>
                                <div class='col-3' style='padding-bottom: 10px;'> <b style="font-size:15px">Sueño:</b> <?= $sueno ?> </div>
                            <?php }

                            if (strlen($cuidados) > "0") {?>
                               <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Cuidados Personales (Baños, Vestimenta, etc.):</b> <?= $cuidados ?> </div>
                            <?php }

                            if (strlen($desplazamiento) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Desplazamiento (Conducción, etc.) :</b> <?= $desplazamiento ?></div>
                            <?php }

                            if (strlen($trabajo) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Trabajo:</b> <?= $trabajo ?></div>
                            <?php }

                            if (strlen($recreacion) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Recreación:</b> <?= $recreacion ?></div>
                            <?php }

                            if (strlen($frecuencia_dolor) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Frecuencia del Dolor:</b> <?= $frecuencia_dolor ?></div>
                            <?php }

                            if (strlen($levantamiento) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Levantamiento:</b> <?= $levantamiento ?></div>
                            <?php }

                            if (strlen($caminata) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Caminata:</b> <?= $caminata ?></div>
                            <?php }

                            if (strlen($actitud) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Actitud de Pie :</b> <?= $actitud ?></div>
                            <?php }

                            if (strlen($total) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Total:</b> <?= $total ?></div>
                            <?php }

                            if (strlen($indice) > "0") {?>
                                 <div class='col-3' style='padding-bottom: 10px;'><b style="font-size:15px">Índice de evaluación funcional :</b> <?= $indice ?></div>
                            <?php }
                           
                            ?>

                        <?php
                        endif;
                        ?>

                      

                       

                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6" align="center"></div>
                        <div class="col-md-6" align="center">
                            <?php
                            echo  $firmaImg;

                            ?>
                            <br>_______________________________________<br>
                            <?php echo $nombreF ?><br>
                            <b>* Documento firmado digitalmente *</b>
                        </div>
                    </div>
                </div>
