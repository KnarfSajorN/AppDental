<?php
date_default_timezone_set('America/Bogota');
 
 
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
             
            $historiaClinica = $_GET['historiaClinica'];
            $idHistoria = $_GET['idHistoria'];

            $queryListhc=mysqli_query($conn3,"SELECT * from configTablas where id = $idHistoria ");
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
              $ID =$rowMotorizado['id'];
              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];

              $horaingreso =$rowMotorizado['horaingreso'];
              $horasalida =$rowMotorizado['horasalida'];
              $Fecha_atencion =$rowMotorizado['Fecha_atencion'];
              $Fecha      =$rowMotorizado['Fecha']; 
              $Hora =$rowMotorizado['Hora'];

              $proximacita = $rowMotorizado['proximacita'];
            
              $hora["Hora de ingreso"]= $rowMotorizado['horaingreso'];  
              $hora["Hora de salida"]= $rowMotorizado['horasalida'];
              $hora["Fecha de Atención"]= $rowMotorizado['Fecha_atencion'];
              //$hora["Proxima cita"]= $rowMotorizado['proximacita'];         
            
              $datosgenerales[0]["Nombre"] = $rowMotorizado['x157'];
              $datosgenerales[0]["Celular"] = $rowMotorizado['xcelular452'];
              $datosgenerales[0]["Direccion"] = $rowMotorizado['xdireccion810'];
              $datosgenerales[0]["Parentesco"] = $rowMotorizado['xparentesc353'];

              $datosgenerales[1]["Nombre"] = $rowMotorizado['x775'];
              $datosgenerales[1]["Celular"] = $rowMotorizado['xcelular586'];
              $datosgenerales[1]["Direccion"] = $rowMotorizado['xdireccion674'];
              $datosgenerales[1]["Parentesco"] = $rowMotorizado['xparentesc397'];

              $datosgenerales_1["Motivo de Consulta"] = $rowMotorizado['xmotivodec412'];

              $datosgenerales_2["Familiares"] = $rowMotorizado['xfamiliare808'];
              $datosgenerales_2["Personales"] = $rowMotorizado['xpersonale117'];
              $datosgenerales_2["Laborales"] = $rowMotorizado['xlaborales519'];
              $datosgenerales_2["Oculares"] = $rowMotorizado['antecedentesoculares'];
              $datosgenerales_2["Evento"] = $rowMotorizado['x852'];
              $datosgenerales_2["Ultimo control visual"] = $rowMotorizado['xultimocon927'];

              $datosgenerales_3["OD"] = $rowMotorizado['xod924'];
              $datosgenerales_3["OI"] = $rowMotorizado['xoi170'];
              $datosgenerales_3["ADD"] = $rowMotorizado['xadd138'];

              $datosgenerales_4[0]["SC"] = $rowMotorizado['x868'];
              $datosgenerales_4[0]["CC"] = $rowMotorizado['x425'];
              $datosgenerales_4[0]["PH"] = $rowMotorizado['x627'];
              $datosgenerales_4[1]["SC"] = $rowMotorizado['x419'];
              $datosgenerales_4[1]["CC"] = $rowMotorizado['x620'];
              $datosgenerales_4[1]["PH"] = $rowMotorizado['x228'];

              $datosgenerales_4_1[0]["SC"] = $rowMotorizado['x993'];
              $datosgenerales_4_1[0]["CC"] = $rowMotorizado['x231'];
              $datosgenerales_4_1[0]["PH"] = $rowMotorizado['x225'];
              $datosgenerales_4_1[1]["SC"] = $rowMotorizado['x709'];
              $datosgenerales_4_1[1]["CC"] = $rowMotorizado['x858'];
              $datosgenerales_4_1[1]["PH"] = $rowMotorizado['x333'];




              $datosgenerales_5["Examen externo"] = $rowMotorizado['xexamenext948'];
              $datosgenerales_5["Oftalmoscopia"] = $rowMotorizado['xoftalmosc437'];

              $datosgenerales_6[0]["Horizontal"] = $rowMotorizado['x846'];
              $datosgenerales_6[0]["Vertical"] = $rowMotorizado['x183'];
              $datosgenerales_6[0]["Eje"] = $rowMotorizado['x308'];
              $datosgenerales_6[0]["Dif"] = $rowMotorizado['x496'];

              $datosgenerales_6[1]["Horizontal"] = $rowMotorizado['x357'];
              $datosgenerales_6[1]["Vertical"] = $rowMotorizado['x850'];
              $datosgenerales_6[1]["Eje"] = $rowMotorizado['x757'];
              $datosgenerales_6[1]["Dif"] = $rowMotorizado['x463'];

              $datosgenerales_7[0]["OD"] = $rowMotorizado['x664'].'mmHG';
              $datosgenerales_7[0]["Miras"] = $rowMotorizado['x451'];

              $datosgenerales_7[1]["OI"] = $rowMotorizado['x932'].'mmHG';
              $datosgenerales_7[1]["Miras"] = $rowMotorizado['x731'];

              $datosgenerales_8[0]["Esfera"] = $rowMotorizado['x355'];
              $datosgenerales_8[0]["Cilindro"] = $rowMotorizado['x549'];
              $datosgenerales_8[0]["Eje"] = $rowMotorizado['x650'];
              $datosgenerales_8[0]["Adicion"] = $rowMotorizado['x493'];

              $datosgenerales_8[1]["Esfera"] = $rowMotorizado['x900'];
              $datosgenerales_8[1]["Cilindro"] = $rowMotorizado['cilindro'];
              $datosgenerales_8[1]["Eje"] = $rowMotorizado['x957'];
              $datosgenerales_8[1]["Adicion"] = $rowMotorizado['x354'];

              $datosgenerales_9["Tipo"] = $rowMotorizado['x185'];
              $datosgenerales_9["Reflejos"] = $rowMotorizado['xreflejos197'];
              $datosgenerales_9["Vision cromatica"] = $rowMotorizado['xvisioncro934'];
              $datosgenerales_9["Estereopsis"] = $rowMotorizado['xestereops594'];

              $datosgenerales_10[0]["Esfera"] = $rowMotorizado['x169'];
              $datosgenerales_10[0]["Cilindro"] = $rowMotorizado['x974'];
              $datosgenerales_10[0]["Eje"] = $rowMotorizado['x431'];
              $datosgenerales_10[0]["ADD"] = $rowMotorizado['x584'];
              $datosgenerales_10[0]["DP"] = $rowMotorizado['x448'];

              $datosgenerales_10[1]["Esfera"] = $rowMotorizado['x589'];
              $datosgenerales_10[1]["Cilindro"] = $rowMotorizado['x128'];
              $datosgenerales_10[1]["Eje"] = $rowMotorizado['x570'];
              $datosgenerales_10[1]["ADD"] = $rowMotorizado['x146'];
              $datosgenerales_10[1]["DP"] = $rowMotorizado['x848'];

              $datosgenerales_11[0]["Lejos"] = $rowMotorizado['lejos'];
              $datosgenerales_11[0]["Cerca"] = $rowMotorizado['x953'];

              $datosgenerales_11[1]["Lejos"] = $rowMotorizado['x734'];
              $datosgenerales_11[1]["Cerca"] = $rowMotorizado['x153'];

              $datosgenerales_12["Motilidad ocular"] = $rowMotorizado['x899'];
              $datosgenerales_12["VL"] = $rowMotorizado['x997'];
              $datosgenerales_12["40 cm"] = $rowMotorizado['x466'].' '.$rowMotorizado['x754'];
              $datosgenerales_12["20 cm"] = $rowMotorizado['x689'].' '.$rowMotorizado['x362'];

              $datosgenerales_13["Disposición"] = $rowMotorizado['xdisposici923'];
              $datosgenerales_13["Recomendación"] = $rowMotorizado['xrecomenda627'];
              $datosgenerales_13["Diagnostico"] = $rowMotorizado['xdiagnosti734'];

              $datosgenerales_14["Diagnostico Principal #1"] = $rowMotorizado['select1'];
              $datosgenerales_14["Descripcion #1"] = $rowMotorizado['notacie1'];
              $datosgenerales_14["Diagnostico Principal #2"] = $rowMotorizado['select2'];
              $datosgenerales_14["Descripcion #2"] = $rowMotorizado['notacie2'];
              $datosgenerales_14["Diagnostico Principal #3"] = $rowMotorizado['select3'];
              $datosgenerales_14["Descripcion #3"] = $rowMotorizado['notacie3'];
              $datosgenerales_14["Causa externa"] = $rowMotorizado['causaexterna'];
              $datosgenerales_14["Diagnostico"] = $rowMotorizado['diagnostico'];
              $datosgenerales_14["Finalidad"] = $rowMotorizado['finalidad'];
              $datosgenerales_14["Profesional"] = $rowMotorizado['xprofesion533'];
              $datosgenerales_14["Observacion"] = $rowMotorizado['xobservaci146'];
              $datosgenerales_14["Forma de uso"] = $rowMotorizado['xobservaci146'];








              $datosgenerales_15["Diagnostico #1"] = $rowMotorizado['D1'];
              $datosgenerales_15["Descripcion #1"] = $rowMotorizado['nota1'];
              $datosgenerales_15["Diagnostico #2"] = $rowMotorizado['D2'];
              $datosgenerales_15["Descripcion #2"] = $rowMotorizado['nota2'];
              $datosgenerales_15["Diagnostico #3"] = $rowMotorizado['D3'];
              $datosgenerales_15["Descripcion #3"] = $rowMotorizado['nota3'];


              $datosgenerales_16["Tipo De Lente"] = $rowMotorizado['xtipodelen527'];


              $datosgenerales_17["Tipo"] = $rowMotorizado['x185'];
              $datosgenerales_17["Reflejos"] = $rowMotorizado['xreflejos197'];

            /*
              $x169            =$rowMotorizado['x169'];
              $x974               =$rowMotorizado['x974'];
              $x431               =$rowMotorizado['x431'];
              $x584            =$rowMotorizado['x584'];
              $x448               =$rowMotorizado['x448'];
              $x589               =$rowMotorizado['x589'];
              $x128            =$rowMotorizado['x128'];
              $x570               =$rowMotorizado['x570'];
              
              $x146               =$rowMotorizado['x146'];
              $x848            =$rowMotorizado['x848'];
              $lejos               =$rowMotorizado['lejos'];
              $x953               =$rowMotorizado['x953'];
              $x734            =$rowMotorizado['x734'];  
              $x153               =$rowMotorizado['x153'];


              $causaexterna = $rowMotorizado['causaexterna'];
              $diagnostico = $rowMotorizado['diagnostico'];
              $finalidad = $rowMotorizado['finalidad'];

              $xformadeus885 = $rowMotorizado['xformadeus885'];
              $xrecomenda627 = $rowMotorizado['xrecomenda627'];
              $xobservaci146 = $rowMotorizado['xobservaci146'];
            */
              $receta = $rowMotorizado['receta'];

            }
  
 

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


                $LogoF               =$rowMotorizado['logoF'];
                $firma               =$rowMotorizado['firma'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="https://medicalsoftplus.com/co388/logos/'.$LogoF.'" height="100" width="100%">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="https://medicalsoftplus.com/co388/FirmasReg/'.$firma.'" height="100" width="150">'; 
              }


 

            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];
              $especialidad        = $rowMotorizado['especialidad'];
              $nit                =$rowMotorizado['nit'];

            }

    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $cliente_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $fechaNacimiento            =$rowMotorizado['fechaNacimiento'];
              $celular_cliente            =$rowMotorizado['celular_cliente'];
              $seguro                     =$rowMotorizado['seguro'];
              $genero                     =$rowMotorizado['genero'];
              $entidadSalud               =$rowMotorizado['entidadSalud']; 
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              
              
  
            }

 
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title> <?php echo $empresaNombre ?>   </title>
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

 
  
</head>
<style>


    @page {
    size: A4;
    margin: 40px;
}


    @media print {
    html,
    body {
        width: 100%;
        height: 100%;
        padding: 10px;
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
  </style>
<body onload="window.print();" style="zoom:0.7;">

    <table>
      <tbody>
        <tr style="zoom: 1.1;">
          <td style="width:30%;">
                <?php echo $Logo ?>
          </td>
          <td style="width:70%;" colspan="3"> 
                <div align="right"><?php echo $header  ?></div>
          </td>
        </tr>

        <tr style="zoom: 1.1;">
            <td colspan="4"><hr></td>
        </tr>

        <tr style="zoom: 1.1;">
            
            <td  width="30%" >Nombre del paciente: <?php echo $nombre_cliente ?><hr></td>
            <td  width="20%" >Documento: <?php echo $CODI_CLIENTE ?><hr></td>
            <td  width="30%" >F.Nacimiento: <?php echo  $fechaNacimiento ?><hr></td>
            <td width="20%"  >Edad:  <?php echo  calculaedad($fechaNacimiento) ?><hr></td>
                      
        </tr >

        <tr style="zoom: 1.1;">
            <td >Residencia: <?php echo $direccion_cliente  ?><hr></td>
            <td >EPS:<?php echo $entidadSalud  ?><hr></td>
            <td >Telefono: <?php echo $telefono?><hr></td>
            <td >Genero: <?php echo $genero?><hr></td>
        </tr>

        </tbody>
    </table>

    <style type="text/css">
        div>b
        {
            font-size: 20px;
        }
    </style>
    <?php

    function array_remove_null($array) {
    foreach ($array as $key => $value)
    {
        if(is_null($value))
            unset($array[$key]);
        if(is_string($value) && (empty($value) OR $value==" " OR $value=="" OR $value=="mmHG" OR $value=="--" OR $value==" --"))
            unset($array[$key]);
        if(is_array($value))
            $array[$key] = array_remove_null($value);
        if(isset($array[$key]) && count($array[$key])==0)
            unset($array[$key]);
    }
    return $array;
    }

    if(count(array_remove_null($hora))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($hora as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    if(count(array_remove_null($datosgenerales))>"0"):
    echo '<div class="col-md-12" align="center"><b>Datos Generales</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales[0] as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr><tr>";
    foreach ($datosgenerales[1] as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    ///
    //motivo de consulta
    if(count(array_remove_null($datosgenerales_1))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($datosgenerales_1 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    if(count(array_remove_null($datosgenerales_16))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($datosgenerales_16 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_2))>"0"):
    echo '<div class="col-md-12" align="center"><b>Antecedentes</b><br></div><div class="col-md-12">';
    echo '<table class="table"><tbody><tr>';
    $c=0;
    foreach ($datosgenerales_2 as $key => $value){$c++;
        if($c>2)
                {echo'</tr><tr>';$c=1;}
        if($value<>""):if($value<>" "):if($value<>"--"):
            echo '<td>'.$key.': '.$value.'</td>';
        endif;endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_3))>"0"):
    echo '<div class="col-md-12" align="center"><b>Lensometría</b><br></div><div class="col-md-12">';
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_3 as $key => $value){if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_4))>"0"):
    echo '<div class="col-md-12">';
    echo '<div class="col-md-6" align="center"><b>Agudeza Visual Lejana</b>';
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_4[0] as $key => $value){
      echo '<td>'.$key.'</td>';
    }
    echo '</tr><tr>';
    foreach ($datosgenerales_4[0] as $key => $value){
      echo '<td>'.$value.'</td>';
    }
    echo '</tr><tr>';
    foreach ($datosgenerales_4_1[0] as $key => $value){
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table>";
    echo '</div>';

    echo '<div class="col-md-6" align="center"><b>Agudeza Visual Cercana</b>';
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_4[1] as $key => $value){
      echo '<td>'.$key.'</td>';
    }
    echo '</tr><tr>';
    foreach ($datosgenerales_4[1] as $key => $value){
      echo '<td>'.$value.'</td>';
    }
     echo '</tr><tr>';
    foreach ($datosgenerales_4_1[1] as $key => $value){
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table>";
    echo "</div></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_5))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($datosgenerales_5 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_6))>"0"):
    echo '<div class="col-md-12" align="center"><b>Queratometría</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_6[0] as $key => $value) {
      echo '<td>'.$key.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_6[0] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_6[1] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_7))>"0"):
    echo '<div class="col-md-12" align="center"><b>Presión Intraocular</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_7[0] as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_7[1] as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_8))>"0"):
    echo '<div class="col-md-12" align="center"><b>Refracción</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_8[0] as $key => $value) {
      echo '<td>'.$key.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_8[0] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_8[1] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_9))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($datosgenerales_9 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_10))>"0"):
    echo '<div class="col-md-12" align="center"><b>Subjetivo</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    foreach ($datosgenerales_10[0] as $key => $value) {
      echo '<td>'.$key.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_10[0] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr><tr>";
    foreach ($datosgenerales_10[1] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_11))>"0"):
    echo '<div class="col-md-12" align="center"><b>Agudeza visual</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody><tr>';
    echo '<td></td>';
    foreach ($datosgenerales_11[0] as $key => $value) {
      echo '<td>'.$key.'</td>';
    }
    echo "</tr><tr>";
    echo '<td>20/</td>';
    foreach ($datosgenerales_11[0] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr><tr>";
    echo '<td>20/</td>';
    foreach ($datosgenerales_11[1] as $key => $value) {
      echo '<td>'.$value.'</td>';
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_12))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody><tr>';
    foreach ($datosgenerales_12 as $key => $value) {if($value<>""):if($value<>" "):if($value<>"--"):
      echo '<td>'.$key.': '.$value.'</td>';endif;endif;endif;
    }
    echo "</tr></tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_13))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody>';
    foreach ($datosgenerales_13 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<tr><td>'.$key.': '.$value.'</td></tr>';endif;endif;
    }
    echo "</tbody></table></div>";
    endif;

    //

    if(count(array_remove_null($datosgenerales_14))>"0"):
    echo '<div class="col-md-12"><table class="table"><tbody>';
    foreach ($datosgenerales_14 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<tr><td>'.$key.': '.$value.'</td></tr>';endif;endif;
    }
    echo "</tbody></table></div>";
    endif;
    //

    



    if(count(array_remove_null($datosgenerales_15))>"0"):
    echo '<div class="col-md-12" align="center"><b>Diagnostico CIE-10</b></div><div class="col-md-12">';    
    echo '<table class="table"><tbody>';
    foreach ($datosgenerales_15 as $key => $value) {if($value<>""):if($value<>" "):
      echo '<tr><td>'.$key.': '.$value.'</td></tr>';endif;endif;
    }
    echo "</tbody></table></div>";
    endif;



    ?>

                
                <div align="center">
                <?php
                echo  $firmaImg;

                ?>
                <br>_______________________________________<br>
                <?php echo $nombreF?><br>
                <?php echo $especialidad?><br>
                <b>* Documento firmado digitalmente *</b>
                </div>
</body>





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
</body>
</html>




