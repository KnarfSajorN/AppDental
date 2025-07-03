<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

                       
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

             $historiaClinica = $_GET['historiaClinica'];
            $idHistoria = $_GET['idHistoria'];

           
            $queryListhc=mysqli_query($conn3,"SELECT * from configTablas where id = $idHistoria ");
          // echo  "SELECT * from configTablas where id = $idHistoria ";
              $nrowl=mysqli_num_rows($queryListhc);
              while($rowhc=mysqli_fetch_array($queryListhc))
              {
                $Tabla=$rowhc['name'];
                $nombre =$rowhc['nombre'];
              }   
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha      =$rowMotorizado['Fecha']; 
              $Hora =$rowMotorizado['Hora'];
            
              $peso =$rowMotorizado['peso'];
              $talla =$rowMotorizado['altura'];
              $imc =$rowMotorizado['imc'];
              $cc =$rowMotorizado['corporal'];


              $D1 =$rowMotorizado['D1'];
              $D2 =$rowMotorizado['D2'];
              $D3 =$rowMotorizado['D3'];
              $D4 =$rowMotorizado['D4'];
              $D5 =$rowMotorizado['D5'];
              $NOTA1 =$rowMotorizado['nota1'];
              $NOTA2 =$rowMotorizado['nota2'];
              $NOTA3 =$rowMotorizado['nota3'];
              $NOTA4 =$rowMotorizado['nota4'];
              $NOTA5 =$rowMotorizado['nota5'];
              $abd =$rowMotorizado['abdomen'];
              $perineal =$rowMotorizado['perineal'];
              $exploracion =$rowMotorizado['exploracion'];
              $tacto =$rowMotorizado['tacto'];
              $resultado =$rowMotorizado['resultado'];
              $resultado1 =$rowMotorizado['resultado'];
              $interpretacion =$rowMotorizado['interpretacion'];
              $V1 =$rowMotorizado['x942'];
              $V2 =$rowMotorizado['x524'];
              $V3 =$rowMotorizado['x486'];
              $V4 =$rowMotorizado['x791'];
              $V5 =$rowMotorizado['x598'];
              $V6 =$rowMotorizado['x330'];
              $V7 =$rowMotorizado['x870'];
              $V8 =$rowMotorizado['x618'];
              $V9 =$rowMotorizado['x417'];
              $V10 =$rowMotorizado['x806'];
              $antecenentes =$rowMotorizado['antecedentes'];
              $peso1 =$rowMotorizado['peso'];
              $talla1 =$rowMotorizado['talla'];
              $imc1 =$rowMotorizado['imc'];
              $corporal1 =$rowMotorizado['corporal'];
              $otros1 =$rowMotorizado['otros'];
              $observacion1 =$rowMotorizado['observacion'];
              $idMetodo =$rowMotorizado['idMetodo'];
              

              
            }
  
 if ($V1=='Independiente, capaz de comer por si solo en un tiempo razonable. La comida puede ser cocinada y servida por otras personas.') {$valor1= 10;}
  if ($V1=='Necesita ayuda para cortar la carne, extender la mantequilla, pero es capaz de comer por si mismo.') {$valor1= 5;}
   if ($V1=='Dependiente. Necesita ser alimentado por otra persona.') {$valor1= 0;}

//echo'-----------------valor1-------->>>'.$valor1;

 if ($V2=='Independiente, capaz de ba&ntilde;arse entero, de entrar y salir del ba&ntilde;o sin ayuda y de hacerlo sin que una persona lo supervise.') {$valor2= 5;}
  if ($V2=='Dependiente. Necesita alg&uacute;n tipo de ayuda o supervisi&oacute;n.') {$valor2= 0;}
   
//echo'--------------------valor2----->>>'.$valor2;

if ($V3=='Independiente, capaz de ponerse y quitarse la ropa sin ayuda.') {$valor3= 10;}
  if ($V3=='Necesita ayuda. Realiza sin ayuda m&aacute;s de la mitad de estas tareas  en un tiempo razonable.') {$valor3= 5;}
   if ($V3=='Dependiente. Necesita ayuda para las mismas.') {$valor3= 0;}

//echo'-------------------valor3------>>>'.$valor3;



if ($V4=='Independiente, realiza todas las actividades personales sin ayuda alguna, los complementos necesarios pueden ser provistos por alguna persona.') {$valor4= 5;}
  if ($V4=='Dependiente. Necesita ayuda para las mismas.') {$valor4= 0;}
//echo'------------------valor4------->>>'.$valor4;

 

if ($V5=='Continente. No presenta episodios de incontinencia.') {$valor5= 10;}
  if ($V5=='Accidente ocasional. Menos de una vez por semana o necesita ayuda para colocar enemas o supositorios.') {$valor5= 5;}
   if ($V5=='Incontinente. M&aacute;s de un episodio semanal.') {$valor5= 0;}

//echo'-----------valor5-------------->>>'.$valor5;



if ($V6=='Continente. No presenta episodios. Capaz de utilizar cualquier dispositivo por si solo (botella, sonsa, pato).') {$valor6= 10;}
  if ($V6=='Accidente ocasional. Presenta m&aacute;ximo un episodio en 24 horas o requiere ayuda para la manipulaci&oacute;n de sondas u otros dispositivos.') {$valor6= 5;}
   if ($V6=='Incontinente. M&aacute;s de un episodio en 24 horas.') {$valor6= 0;}

//echo'-----------valor6-------------->>>'.$valor6;

if ($V7=='Independiente. Entra y sale solo y no necesita ayuda alguna de otra persona.') {$valor7= 10;}
  if ($V7=='Necesita ayuda. Capaz de manejarse con una peque&ntilde;a ayuda, es capaz de usar el cuarto de ba&ntilde;o y puede asearse solo.') {$valor7= 5;}
   if ($V7=='Dependiente. Incapaz de acceder al ba&ntilde;o o de utilizarlo sin ayuda.') {$valor7= 0;}

//echo'------------------valor7------->>>'.$valor7;

if ($V8=='independiente. No requiere ayuda para sentarse o levantarse de una silla o para entrar o salir de la cama.') {$valor8= 15;}
  if ($V8=='M&iacute;nima ayuda. Incluye una supervisi&oacute;n o una peque&ntilde;a ayuda f&iacute;sica.') {$valor8= 10;}
   if ($V8=='Gran ayuda. precisa ayuda de una persona fuerte o entrenada.') {$valor8= 5;}
   if ($V8=='Dependiente. Necesita de una gr&uacute;a o el apoyo de m&aacute;s de una persona. Es incapaz de permanecer sentado.') {$valor8= 0;}
//echo'-----------------valor8-------->>>'.$valor8;



if ($V9=='Independiente, puede andar 50 mts o su equivalente en casa sin ayuda o supervisi&oacute;n. Puede utilizar cualquier ayuda mec&aacute;nica excepto un caminador. Si utiliza una pr&oacute;tesis puede pon&eacute;rsela o quit&aacute;rsela solo.') {$valor9= 15;}
  if ($V9=='Necesita ayuda. Necesita supervisi&oacute;n o una peque&ntilde;a ayuda f&iacute;sica por parte de otra persona.') {$valor9= 10;}
   if ($V9=='Independiente en silla de ruedas. No requiere ayuda ni supervisi&oacute;n.') {$valor9= 5;}
   if ($V9=='Dependiente en silla de ruedas. Requiere ayuda para el desplazamiento.') {$valor9= 0;}

//echo'-------------------valor9------>>>'.$valor9;



if ($V10=='Independiente. Capaz de subir un piso sin ayuda y supervisi&oacute;n de otra persona.') {$valor10= 10;}
  if ($V10=='Necesita ayuda o supervisi&oacute;n.') {$valor10= 5;}
   if ($V10=='Dependiente. Es incapaz de subir o bajar escalones.') {$valor10= 0;}

//echo'------------------valor10------->>>'.$valor10;


$sumavalores=$valor1+$valor2+$valor3+$valor4+$valor5+$valor6+$valor7+$valor8+$valor9+$valor10;

if ($sumavalores < 45) {$valoracion= 'Severa';}
if ($sumavalores  >= 45 & $sumavalores <= 59 ) {$valoracion= 'Grave';}
if ($sumavalores >= 60 & $sumavalores <= 80 ) {$valoracion= 'Moderada';}
if ($sumavalores >= 81 & $sumavalores <= 100 ) {$valoracion= 'Ligera';}
           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF      =$rowMotorizado['nombreF'];
                $telefonoF    =$rowMotorizado['telefonoF'];
                $direccionF   =$rowMotorizado['direccionF'];
                $emailF       = $rowMotorizado['emailF'];
                $ciudadPaisF  =$rowMotorizado['ciudadPaisF'];
                $licenciaF    =$rowMotorizado['licenciaF'];
                $pieF         =$rowMotorizado['pieF'];
                $header       = $rowMotorizado['header'];

                $LogoF           =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

               if (strlen($LogoF) > 0) {
    $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
  }


  if (strlen($firma) > 0) {
      $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
  }

}
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $Nombre      =$rowMotorizado['NOMBRE_USUARIO'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $especialidad               =$rowMotorizado['especialidad'];
              

              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
             $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
           $telefono                =$rowMotorizado['celular_cliente'];
                
            } 

  $queryList=mysqli_query($conn3,"SELECT * FROM firmas where historia_id = $historiaClinica and cliente_id = $cliente_id and historia_nombre =$idHistoria");

 
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              
             $Firma           =$rowMotorizado['firma'];
               
            }

 

   $cie1=mysqli_query($conn3,"SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ");

 
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= $Base ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
    

<div class="row table-responsive" width="100%">
 <div class="row">

                <div class="col-md-12"> <div class="col-md-12">
                
                  <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                  <colgroup>
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
<col style="width:  100%">
</colgroup>


 <tr align="center">
    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
    <th class="titulo" colspan="4" rowspan="4" align="center"> 
      <div align="center"><?php echo $header  ?></div>

    <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion?>  </h9></th>-->
  </tr>

  <tr>
    </tr>
  <tr>
    </tr>
  <tr>
    </tr> 
</table>
<br>
<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
  <tr>
    <td  width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
    <td  width="20%" class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
    <td  width="30%" class="f.nacimiento">F.Nacimiento: <?php echo  $fechaNacimiento ?></td>
    <td width="20%"  class="edad">Edad:  <?php echo  calculaedad($fechaNacimiento) ?></td>
  </tr>
                
  <tr>
    <td class="residencia">Residencia: <?php echo $direccion_cliente  ?></td>
    <td class="seguro">EPS:<?php echo $seguro  ?></td>
    <td class="telefono">Telefono: <?php echo $telefono?></td>
    <td class="genero">Genero: <?php echo $genero?></td>
  </tr></table>
  
</div> </div>
</div>





        <div class="row">
        <h4 align="center"> <?php echo $nombre?></h4>
                <div class="col-md-12">
          </div>
        </div>
   
      
      <div class="row table-responsive" width="100%">
        <div class="col-xs-12"> <div class="col-xs-12">
       <hr>
<p>
  Fecha : 
    <?php echo $Fecha ?>
 
  
</p>
 













<?php
 
                 $queryDetalle=mysqli_query($conn3,"SELECT * FROM  configTablaDetalle where idTabla = $idHistoria order by id asc");
                  $nrowl=mysqli_num_rows($queryDetalle);
                  while($rowDetalle=mysqli_fetch_array($queryDetalle))
                  {
 
                    $idCampo  =$rowDetalle['id'];
                    $div_class  =$rowDetalle['div_class'];
                    $div_align  =$rowDetalle['div_align'];
                    $div_nombre_campo  =$rowDetalle['div_nombre_campo'];
                    $input_type  =$rowDetalle['input_type'];
                    $input_calss  =$rowDetalle['input_calss'];
                    $input_name  =$rowDetalle['input_name'];
                    $input_placeholder  =$rowDetalle['input_placeholder'];
                    $input_id  =$rowDetalle['input_id'];
                    $input_required  =$rowDetalle['input_required'];
                    $input_pattern =$rowDetalle['input_pattern'];
                    $input_onChange  =$rowDetalle['input_onChange'];
                    $select_table  =$rowDetalle['select_table'];
                    $style  =$rowDetalle['style'];
                    $tipoCampo  =$rowDetalle['tipoCampo'];
                    $input_maxlength  =$rowDetalle['input_maxlength'];
                    $input_oninput  =$rowDetalle['input_oninput'];
                    $div_nombre_valor  =$rowDetalle['div_nombre_valor'];
                    $input_value  =$rowDetalle['input_value'];





if($idCampo=='699')
 {echo $antecenentes;

echo ' <br><div class="col-md-12" align="center"> <b>EXAMEN FÍSICO</B>  </DIV> <br>';
echo 'PESO:'.$peso1.' TALLA:'.$talla1.' IMC: '.$imc1.' COMPOSICIÓN CORPORAL: '.$corporal1.' ';
echo $otros1.'<br>';
echo $observacion1;
 }










if($idCampo=='816')
 {echo '<div class="col-md-12"> <div class="col-md-12"> <br>Estado de Forma:'.$resultado.'<div></DIV>';}



if($idCampo=='887')
 { 
echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Metodo  </th> <th> Usado antes </th> <th> salud </th> <th> Ecónomica </th> <th> Estilo vida </th> <th> Elegible </th> <th> Observación</th>  ';
$cont = 0;
$queryList=mysqli_query($conn3,"SELECT * FROM  metodos where cliente_id ='$cliente_id' and idMetodo= '$idMetodo'");

$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $cont++;
  $idOper1     =$rowMotorizado['id'];
  $metodo =$rowMotorizado['metodo'];
  $usado  =$rowMotorizado['usado'];
  $salud  =$rowMotorizado['salud'];
  $economica    =$rowMotorizado['economica'];
  $estilo   =$rowMotorizado['estilo'];
  $elegible    =$rowMotorizado['elegible'];
  $observacion   =$rowMotorizado['observacion'];
  




echo '<tr> <th> <input type="hidden"  value="'.$idOper1.'" class="form-control input-lg" id="idOper'.$cont.'" name="idOper" >   <a href="#"  onclick="eliminarItem'.$cont.'();"> <font size="5">   </font> </a>    
  '.$metodo.'</th><th>'.$usado.'  </th> <th>'.$salud.'  </th> <th> '.$economica.'</th> <th> '.$estilo.'</th> <th> '.$elegible.'</th> <th> '.$observacion.'</th>
  ';

}
//echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
      
   echo '</table></h6>';
;}





if($idCampo=='95')
 { echo

  '<h5 align="center"> <b>DIAGNÓSTICO </b></h5> <BR>                        
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>DIAGNÓSTICO  CIE 10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>OBSERVACIONES</b></h5> </td>
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


if($idCampo=='127')
 { echo

  '<h5 align="center"> <b>DIAGNÓSTICO </b></h5> <BR>                        
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>DIAGNÓSTICO  CIE 10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>OBSERVACIONES</b></h5> </td>
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






if ( $tipoCampo == 'text') 
{
$valor = 0;


            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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

if ( $tipoCampo == 'number') 
{




$valor = 0;
            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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

if ( $tipoCampo == 'textarea') 
{

 $valor = 0;

            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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







if ( $tipoCampo == 'select_si_no') 
{
 
$valor = 0;

            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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






if ( $tipoCampo == 'select') 
{
    

$valor = 0;

            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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








if ( $tipoCampo == 'selectmultiple') 
{
    
 $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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










if ( $tipoCampo == 'separador') 
{
$div = 'separador'.rand(1,999);    

  $queryList=mysqli_query($conn3,"SELECT xtipohisto468 FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $valor      =$rowMotorizado['xtipohisto468'];
             
              
            }

  if ($idCampo== '1295' AND $valor == "0" AND $idHistoria == "23") { $div_nombre_campo = "<br><br><br><br><br><br><br><br><br><br><br><br><br>&nbsp;";}
    if ($idCampo== '1286' AND $valor == "0" AND $idHistoria == "23") { $div_nombre_campo = "&nbsp;";}

    if ($idCampo== '1293' AND $valor == "1" AND $idHistoria == "23") { $div_nombre_campo = "<br><br>&nbsp;";}
    if ($idCampo== '1287' AND $valor == "1" AND $idHistoria == "23") { $div_nombre_campo = "&nbsp;";}
                                            
  //echo '<p align= "center"> <strong> '.$div_nombre_campo.'</strong><p>';
 
 echo '<div class="'.$div_class.'">
                 <div align="'.$div_align.'"">  <b> '.$div_nombre_campo.'</b></div>                

            </div>';


}


// esta parte sirve para arreglar el formulario de consumo alcohol/ drogas en el cual agrego un div 12 
//despues del campo via administracion

if($tipoCampo == 'separador' AND $idCampo=='10086')
{

  echo '
        <div class="form-group col-md-12">

        ';
}

// esta parte sirve para arreglar el formulario de consumo alcohol/ drogas en el cual agrego un div 12 
//despues del campo select 
if($tipoCampo == 'select' AND $idCampo=='10090'){echo '<div class="col-md-12"></div>';}

if($tipoCampo == 'select' AND $idCampo=='10094'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10098'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10103'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10107'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10111'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10115'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10119'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10124'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10128'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10132'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10136'){echo '<div class="col-md-12"> </div>';}

if($tipoCampo == 'select' AND $idCampo=='10140'){echo '<div class="col-md-12"> </div>';}



if ( $tipoCampo == 'imagen') 
{
$div = 'separador'.rand(1,999);    

                                            
  //echo '<p align= "center"> <strong> '.$div_nombre_campo.'</strong><p>';
 
 echo '<div class="'.$div_class.'">
                 <div align="'.$div_align.'"> '.$div_nombre_campo.' </div>                

            </div>';


}

 

if ( $tipoCampo == 'date') 
{

 $valor = 0;

            $queryList=mysqli_query($conn3,"SELECT $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
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






if ( $tipoCampo == 'file') 
{


$valor = 0;

            $queryList=mysqli_query($conn3,"SELECT id, $input_name FROM  $Tabla where id = $historiaClinica");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $k      =$rowMotorizado['id'];
              $valor      =$rowMotorizado[$input_name];
             
              
            }
    
if (strlen($valor) > 0) {

$file = explode("|", $valor);
$view = '';
foreach($file AS $data){
  if($data != ''){
     $view .= '<img src="'.$data.'" height="100">';
  }
}
 
//echo '<p>'.$div_nombre_campo.': '.$view.'<p>';
echo '<div class="'.$div_class.'">
                 <div align="'.$div_align.'">  '.$div_nombre_campo.' '.$view.'</div>
                        
            
            </div>';

}



}





        }
if ($idHistoria == 17) {
echo '<div class="col-md-12"> <div class="col-md-12"> <br>Resultado:'.$resultado1.'<div></DIV>';
echo '<div class="col-md-12"> <div class="col-md-12"> <br>INTERPRETACIÓN DE HAMILTON  - PUNTUACIÓN TOTAL NIVELES DE ANSIEDAD :'.$interpretacion.'<div></DIV>'; }
if ($idHistoria == 18) {
echo '<div class="col-md-12"> <div class="col-md-12"> <br>Resultado:<b>'.$sumavalores.'</b>&nbsp&nbsp&nbsp&nbsp';
echo 'INCAPACIDAD FUNCIONAL: <b>'.$valoracion.'</b><div></DIV>'; }

?>



 



<hr>
        </div> </div>
     

<div class="col-xs-6" align="center">
  <?php echo $Fecha ?> 
  </div>

<div class="col-xs-6" align="center">
  <?php echo $ciudadPaisF?>
  </div>


             
  <div class="col-xs-6" align="center">
   <div class="col-xs-6">

  <strong>Firma del Paciente (o persona autorizada para firmar para el Paciente):</strong>  <br>
        <div class="col-xs-12">
      <?php if (strlen($Firma)>10) 
{
    echo "<img src='$Firma' height='100' width='200'>";  }
?> <br>
            Nombre: <?php echo $nombre_cliente;?>   <br>
    C.C. <?php echo $CODI_CLIENTE;?>
         
        </div>

  </div>
  </div>

               <div class="col-xs-6" align="center">
  <?php
  echo  $firmaImg;

  ?>
  <br>_______________________________________<br>
  <?php echo $nombreF?><br>
  <?php echo $especialidad?><br>
  <b>* Documento firmado digitalmente *</b>
  </div>

  </div>


 </div>

  
     
   </div>
          </div>
        </div>
      </div>
     
    </div>

                 
                  


              </div>
              </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <!--<div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
  

        </div>
      </div>-->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>






