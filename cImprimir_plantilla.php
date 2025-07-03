
<?php
date_default_timezone_set('America/Bogota');


include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

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

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $Fecha      = $rowMotorizado['Fecha'];
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
if ($sumavalores  >= 45 & $sumavalores <= 59) {
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

  $nombreF      = $rowMotorizado['nombreF'];
  $telefonoF    = $rowMotorizado['telefonoF'];
  $direccionF   = $rowMotorizado['direccionF'];
  $emailF       = $rowMotorizado['emailF'];
  $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
  $licenciaF    = $rowMotorizado['licenciaF'];
  $pieF         = $rowMotorizado['pieF'];
  $header       = $rowMotorizado['header'];


  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];
 

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

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $especialidad        = $rowMotorizado['especialidad'];
    $nit                = $rowMotorizado['nit'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
    $celular_cliente            = $rowMotorizado['celular_cliente'];
    $seguro                     = $rowMotorizado['seguro'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $genero = $rowMotorizado['genero'];
    $discapacidad = $rowMotorizado['tipodiscapacidad'];

    $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
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


    $Firma           = $rowMotorizado['firma'];
  }
}


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

              $idCampo  = $rowDetalle['id'];
              $div_class  = $rowDetalle['div_class'];
              $div_align  = $rowDetalle['div_align'];
              $div_nombre_campo  = $rowDetalle['div_nombre_campo'];
              $input_type  = $rowDetalle['input_type'];
              $input_calss  = $rowDetalle['input_calss'];
              $input_name  = $rowDetalle['input_name'];
              $input_placeholder  = $rowDetalle['input_placeholder'];
              $input_id  = $rowDetalle['input_id'];
              $input_required  = $rowDetalle['input_required'];
              $input_pattern = $rowDetalle['input_pattern'];
              $input_onChange  = $rowDetalle['input_onChange'];
              $select_table  = $rowDetalle['select_table'];
              $style  = $rowDetalle['style'];
              $tipoCampo  = $rowDetalle['tipoCampo'];
              $input_maxlength  = $rowDetalle['input_maxlength'];
              $input_oninput  = $rowDetalle['input_oninput'];
              $div_nombre_valor  = $rowDetalle['div_nombre_valor'];
              $input_value  = $rowDetalle['input_value'];

              
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
                    $valor      = $rowMotorizado[$input_name];
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
                    $valor      = $rowMotorizado[$input_name];
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
                    $valor      = $rowMotorizado[$input_name];
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
                    $valor      = $rowMotorizado[$input_name];
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
                    $valor      = $rowMotorizado[$input_name];
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

                    $valor      = $rowMotorizado[$input_name];
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
                // // $nrowl = mysqli_num_rows($queryList);
                if ($queryList) {
                   while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                  $valor      = $rowMotorizado['xtipohisto468'];
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
                if($div_nombre_campo=="<hr>"){
                  $div_class = $div_class." clear-both"; 
                }
                //echo '<p align= "center"> <strong> '.$div_nombre_campo.'</strong><p>';

                echo '<div class="' . $div_class . '">
                 <div align="' . $div_align . '" valor="'.$idCampo.'">  <b> ' . $div_nombre_campo . '</b></div>                
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



              if($idCampo=='2630')
 { echo

  '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>                        
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>  
            </table>  ';
if ($D1 <> '') { $ID1= '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">  
             <b> <h5>'.$D1.'</b></h5>  </td>

<td  colspan="6">
               <b> <h5>'.$NOTA1.'</b></h5> </td>
            </tr> ';}

if ($D2 <> '') { $ID2= '
 <tr>
           <td colspan="5">  
             <b> <h5>'.$D2.'</b></h5>  </td>
             

<td  colspan="6">
               <b> <h5>'.$NOTA2.'</b></h5> </td>
            </tr> ';}

if ($D3 <> '') { $ID3= '
 <tr>
           <td colspan="5">  
             <b> <h5>'.$D3.'</b></h5>  </td>

<td  colspan="6">
               <b> <h5>'.$NOTA3.'</b></h5> </td>
            </tr> ';}
 


$FINTABLA= '</TABLE>';



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
                    $valor      = $rowMotorizado[$input_name];
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

                    $k      = $rowMotorizado['id'];
                    $valor      = $rowMotorizado[$input_name];
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
              if ($Tabla == 'historia_1_cirugiaplastica54165654312' && $idCampo == 549){                          
                echo '<div class="box-body col-md-12 center text-center" style="font-size: 18px">';
                echo '<img src="'.funcionMaster($historiaClinica,'id','rayado_img1',$Tabla).'" style="width:60%; height:auto">';
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
                echo "<img src='.".$Base . $Firma."' height='100' width='330'> <br>__________________________________ <br>";
                echo "Nombre: {$nombre_cliente}<br>
                C.C. {$CODI_CLIENTE}<br>
                <b>Firma del Paciente (o persona autorizada para firmar para el Paciente)</b> <br>";
              }
              ?>
              
            </div>
            
              
          </div>
          <div class="col-md-6" align="center">
            <?php
            echo  $firmaImg;

            ?>
            <br>_______________________________________<br>
            <?php echo $nombreF ?><br>
            <?php echo $especialidad ?><br>
            <b>* Documento firmado digitalmente *</b>
          </div>
        </div>