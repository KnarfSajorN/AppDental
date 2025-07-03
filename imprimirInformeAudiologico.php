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

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha      =$rowMotorizado['Fecha']; 
              $Hora =$rowMotorizado['Hora'];
            
            


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
             // $xentidaddo361 =$rowMotorizado['xentidaddo361'];
              $motivo =$rowMotorizado['x301'];
              $motivo1 =$rowMotorizado['x463'];
              $antecedentes =$rowMotorizado['x482'];
              $antecedentes1 =$rowMotorizado['x116'];
              $otoDer =$rowMotorizado['x431'];
              $otoIzqui =$rowMotorizado['x371'];

               $entidad=$rowMotorizado['xentidaddo361'];

               $N_entidad= funcionMaster($entidad , 'id', 'nombre', 'H_Entidades');

              $equipos =$rowMotorizado['equipos'];
              $logoDer =$rowMotorizado['logoDer'];
              $logoIz =$rowMotorizado['logoIz'];
              $discriDe =$rowMotorizado['discriDe'];
              $discriIz =$rowMotorizado['discriIz'];
              $audioDerecho =$rowMotorizado['x180'];
              $audioIzquierdo =$rowMotorizado['x294'];

            $audioDerecho1 =$rowMotorizado['x498'];
            $audioIzquierdo1 =$rowMotorizado['x334'];
            $timpoDerecho =$rowMotorizado['x137'];
            $timpoIzquierdo =$rowMotorizado['x137r'];

            $timpoDerecho1 =$rowMotorizado['x214'];
            $timpoIzquierdo1 =$rowMotorizado['x214x'];
            $refleDerecho =$rowMotorizado['x798'];
            $refleDerecho1 =$rowMotorizado['x119'];

            $refleIzquierdo =$rowMotorizado['x119x'];
            $refleIzquierdo1 =$rowMotorizado['x798x'];
            $recomendacion =$rowMotorizado['x450'];
            $recomendacion1 =$rowMotorizado['x824'];

            $campos_logometria =$rowMotorizado['campos_logometria'];
            $timpanograma_campos =$rowMotorizado['timpanograma_campos'];
            $reflejos_estapediales_campos=$rowMotorizado['reflejos_estapediales_campos'];

            $grafica_audiometria=$rowMotorizado['grafica_audiometria'];
            $grafica_logometria=$rowMotorizado['grafica_logometria'];

            $grafica_timpanograma_od=$rowMotorizado['grafica_timpanograma_od'];
            $grafica_timpanograma_oi=$rowMotorizado['grafica_timpanograma_oi'];
            $otoDere=$rowMotorizado['x287'];
            $otoIzq=$rowMotorizado['ostocopia'];

            $Grafica_AltaFrecuencia=$rowMotorizado['Grafica_AltaFrecuencia'];
            $Grafica_AltaFrecuencia_1=$rowMotorizado['Grafica_AltaFrecuencia_1'];
           
            $Valoracion_Tinnitus=$rowMotorizado['Valoracion_Tinnitus'];
            $Logoaudiometria_Francesa=$rowMotorizado['Logoaudiometria_Francesa'];
            $Incapacidad_Tinnitus=$rowMotorizado['Incapacidad_Tinnitus'];

            $Desarrollo_Conducta_Auditiva_1=$rowMotorizado['Desarrollo_Conducta_Auditiva_1'];
            $Desarrollo_Conducta_Auditiva_2=$rowMotorizado['Desarrollo_Conducta_Auditiva_2'];
            $Desarrollo_Conducta_Auditiva_3=$rowMotorizado['Desarrollo_Conducta_Auditiva_3'];
            $Desarrollo_Conducta_Auditiva_4=$rowMotorizado['Desarrollo_Conducta_Auditiva_4'];
            $Desarrollo_Conducta_Auditiva_5=$rowMotorizado['Desarrollo_Conducta_Auditiva_5'];
            $Desarrollo_Conducta_Auditiva_6=$rowMotorizado['Desarrollo_Conducta_Auditiva_6'];
            $Desarrollo_Conducta_Auditiva_7=$rowMotorizado['Desarrollo_Conducta_Auditiva_7'];

            $Antecedentes_Personales_Audiologicos=$rowMotorizado['Antecedentes_Personales_Audiologicos'];
            $Antecedentes_Otologicos=$rowMotorizado['Antecedentes_Otologicos'];

            $Caracteristicas_Subjetivas_Audicion=$rowMotorizado['Caracteristicas_Subjetivas_Audicion'];
            $Antecedentes_Laborales_Audiologia=$rowMotorizado['Antecedentes_Laborales_Audiologia'];
            $Habitos_Audiologia=$rowMotorizado['Habitos_Audiologia'];
            $Antecedentes_Extralaborales_Audiologia=$rowMotorizado['Antecedentes_Extralaborales_Audiologia'];
            $Antecedentes_Extralaborales_Audiologia_2=$rowMotorizado['Antecedentes_Extralaborales_Audiologia_2'];

            $AnamnesisTinnitus=$rowMotorizado['AnamnesisTinnitus'];

            $CuestionarioReaccionesTinnitus=$rowMotorizado['CuestionarioReaccionesTinnitus'];
            $ResultadoReaccionesTinnitus=$rowMotorizado['ResultadoReaccionesTinnitus'];
            $TinnitusHandicapInventory=$rowMotorizado['TinnitusHandicapInventory'];
            $SubEscalaTinnitus=$rowMotorizado['SubEscalaTinnitus'];
            $CalificacionTinnitus=$rowMotorizado['CalificacionTinnitus'];

            $GraficaGanancia = $rowMotorizado['GraficaGanancia'];
            $GananciaInformacion = $rowMotorizado['GananciaInformacion'];

 }
  
 
if (strlen(stristr($logoDer,'Curva'))>0) {
   $var1=$discriDe;
}

 
if (strlen(stristr($logoIz,'Curva'))>0) {
 $var2=$discriIz;
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
                $Logo = '<img src="https://medicalsoftplus.com/co515/logos/'.$LogoF.'" height="100" width="100%">'; 
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="https://medicalsoftplus.com/co515/FirmasReg/'.$firma.'" height="100" width="150">'; 
              }


 

            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $usuario_id");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $NOMBRE_USUARIO    =$rowMotorizado['NOMBRE_USUARIO'];
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
              $seguro                     =$rowMotorizado['entidadSalud'];
              
              $direccion_cliente          =$rowMotorizado['ciudad_cliente'];
              $genero =$rowMotorizado['genero'];
              $Ocupacion =$rowMotorizado['ocupacion'];
              $whatsapp =$rowMotorizado['whatsapp'];

              
              
  
            }


   ?>
   
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">

<style type="text/css">
    
.page-header, .page-header-space {
  height: 30px;
}

.page-footer, .page-footer-space {
  height: 30px;

}

.page-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  border-top: 1px solid black; /* for demo */
  background: white; /* for demo */
}

.page-header {
  position: inherit;
  top: 0mm;
  width: 100%;
  border-bottom: 1px solid black; /* for demo */
  background: white; /* for demo */
}

.page {
  page-break-after: always;
  width: 87%;
}

@page {
  margin: 20mm
}

@media print {
   thead {display: table-header-group;} 
   tfoot {display: table-footer-group;}
   
   button {display: none;}
   
   body {margin: 0;}
}
</style>





<body>
  <div class="page-header" style="text-align: center">
    <?php echo $nombreF?>
    <br/>
    <!--
    <button type="button" onClick="window.print()" style="background: pink">
      PRINT ME!
    </button>
    -->
  </div>

  <div class="page-footer">
    Paciente <b><?php echo $nombre_cliente?></b>
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
          <div class="page">













<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg tbody tr td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg thead tr th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg tbody tr td{border-color:inherit;text-align:center;vertical-align:top}
.tg thead tr th{border-color:inherit;text-align:center;vertical-align:top}
</style>
<style type="text/css">
@page{
   margin-top: 30px;
   margin-bottom: 30px;
   margin-right: 0px;
}
@media print { 
 
   .print-friendly{ page-break-inside: avoid;padding-top:20px;}}
</style>

            <!-- /.box-header -->
          



            <div class="row">

              <div class="col-md-12">

                <table class="tg" style="table-layout: fixed; width: 100%">
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
                  <table class="tg" border=1 style="table-layout: fixed; font-size:13px; width: 100%">
                    <tr>
                      <td  width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
                      <td  width="35%" class="residencia">Residencia: <?php echo $direccion_cliente  ?></td>
                      <td  width="15%" class="f.nacimiento">Sexo: <?php echo  $genero ?></td>
                      <td width="20%"  class="edad">Edad:  <?php echo  calculaedad($fechaNacimiento) ?></td>
                    </tr>


                    <tr>
                      <td  class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
                      <td class="seguro">Entidad:<?php echo $seguro  ?></td>
                      <td class="telefono">Telefono: <?php echo $whatsapp?></td>
                      <td class="genero">Ocupación: <?php echo $Ocupacion?></td>
                    </tr>

                  </table>

                </div>
              </div>

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


              }

              ?>

              <div class="row">
                <h4 align="center"><B> EVALUACIÓN AUDIOLÓGICA</B></h4>
                <div class="col-md-12">
                  <div class="col-xs-12">
                    Fecha : <?php echo $Fecha ?>  
                  </div>
                  <div class="col-md-12" style="left: 200px;">
                    <?php if ($grafica_audiometria<>'{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null}}'):?>
                      <iframe src="https://medicalsoftplus.com/co515/ImprimirGraficaAudiometria.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>" width="1140" height="695" class="grafica" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div><br><br><br>
                  <div class="col-md-12" style="left: 200px;">
                    <?php if($grafica_timpanograma_oi<>'{"0":{"x":null,"y":null}}' OR $grafica_timpanograma_od<>'{"0":{"x":null,"y":null}}'):?>
                      <iframe src="https://medicalsoftplus.com/co515/ImprimirGraficaTimpanograma.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>" width="1140" height="480" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div>
                  <div class="col-md-12" align="center"><?php echo $timpanograma_campos;?></div>
                  <div class="col-md-12" align="center"><?php echo $reflejos_estapediales_campos;?></div>
                  
                  <div class="col-md-12" style="left: 200px;">
                    <?php if ($Grafica_AltaFrecuencia<>'{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_aerea_icono":null,"izquierdo_osea_icono":null,"derecho_aerea":null,"derecho_osea":null,"derecho_aerea_icono":null,"derecho_osea_icono":null}}'):?>
                      <iframe src="ImprimirGraficaAltaFrecuencia.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>&tipo=Alta Frecuencia" width="1140" height="695" class="grafica" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div>
                  <div class="col-md-12" style="left: 200px;">
                    <?php if ($Grafica_AltaFrecuencia_1<>'{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_aerea_icono":null,"izquierdo_osea_icono":null,"derecho_aerea":null,"derecho_osea":null,"derecho_aerea_icono":null,"derecho_osea_icono":null}}'):?>
                      <iframe src="ImprimirGraficaAltaFrecuencia.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>&tipo=Alta Frecuencia 1" width="1140" height="695" class="grafica" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div>
                  <div class="col-md-12" style="left: 200px;">
                    <?php if ($grafica_logometria<> '{"0":{"rango":0,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":0},"5":{"rango":5,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":10},"10":{"rango":10,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":50},"15":{"rango":15,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":90},"20":{"rango":20,"izquierdo_aerea":null,"izquierdo_osea":null,"izquierdo_icono_aerea":null,"izquierdo_icono_oseo":null,"derecho_aerea":null,"derecho_osea":null,"derecho_icono_aerea":null,"derecho_icono_oseo":null,"logografica":100}}'):?>
                      <iframe src="https://medicalsoftplus.com/co515/ImprimirGraficaLogometria.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>" width="1140" height="580" class="grafica" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div>
                  <div class="col-md-12" align="center">
                    <?php if(strlen($Logoaudiometria_Francesa)>"644"){echo "<br>LOGOAUDIOMETRIA TECNICA EUROPEA <br><br>".$Logoaudiometria_Francesa;}?>
                  </div>
                  <div class="col-md-12" align="center">
                    <?php if(strpos($campos_logometria, 'style="display:none;"')==false) {
                      echo "<br>LOGOAUDIOMETRIA TECNICA AMERICANA <br>".$campos_logometria;
                      }
                      ?>
                  </div>
                  <div class="col-md-12" style="left: 200px;">
                    <?php if ($GraficaGanancia<> '{"0":{"rango":0,"derecho":null,"derecho_icono":null,"izquierdo":null,"izquierdo_icono":null}}'):?>
                      <iframe src="https://medicalsoftplus.com/co515/ImprimirGraficaGanancia.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>" width="1140" height="580" class="grafica" style="border:none;position: relative;right: 50px;"></iframe>
                    <?php endif;?>
                  </div>
                  <div class="col-md-12" align="center"><?php if(strpos($GananciaInformacion, "style='display:none;'")==false){echo $GananciaInformacion;}?></div>           


                </div>
              </div>
              <hr>
                  

              
              <div class="col-md-12" align="left"> <B>Entidad donde se realiza la evaluación:</B> <?php echo $N_entidad?></div>
              <div class="col-md-12" align="left"> <B>Equipos Utilizados:</B> <?php echo $equipos?></div>


              <div class="col-md-12" align="left"> <B>Motivo de Consulta y Remisión:</B></div>                                                    
                
              <div class="form-group col-md-12"> <?php echo $motivo?> <?php echo $motivo1?></div>

              <div class="col-md-12" align="left"> <B>
              Antecedentes Audiológicos:</B></div>                                                    
                
              <div class="form-group col-md-12"> <?php echo $antecedentes?> <?php echo $antecedentes1?></div>


              <div class="col-md-12" align="left"> <B>
              Otoscopia:</B></div>                                                    
                
              <div class="form-group col-md-12"> Oído Derecho:<?php echo $otoDer?> <br> <?php echo $otoDere?></div>
              <div class="form-group col-md-12"> Oído Izquierdo:<?php echo $otoIzqui?> <br><?php echo $otoIzq?></div>

                
               <table class="tg" border=1 style="table-layout: fixed; font-size:15px; width: 100%"  >
               <tr>
                            <td width="100%">  <h4 align="center"><b> DIAGNÓSTICO AUDIOLÓGICO</b></h4></td>
                          </tr></table>
                       <table class="tg" border=1 style="table-layout: fixed; font-size:15px; width: 100%"  >

                   
              <?php  if ($audioDerecho <>'' or $audioDerecho1  <>'' or $audioIzquierdo  <>'' or $audioIzquierdo1 <>'') { echo 
                         '<tr>
                              <td rowspan="2"  width="20%" align="center"><b><h3>Audiometría</h3></b></td>
                              <td  width="15%">Oído Derecho</td>
                              <td>'.$audioDerecho.' '.$audioDerecho1.'</td>
                          </tr> 
                          <tr>
                              <td width="15%">Oído Izquierdo</td>
                              <td> '.$audioIzquierdo.' '.$audioIzquierdo1.'</td>
                          </tr>';} ?>




                          <?php  if ($logoDer <>'' or $logoIz  <>'') { echo 
                         '<tr>
                              <td rowspan="2"  width="20%" align="center"><b><h3>Logoaudiometría</h3></b></td>
                              <td width="15%">Oído Derecho</td>
                              <td>'.$logoDer.'  '.$var1.'</td>
                          </tr>
                          <tr>
                             <td width="15%">Oído Izquierdo</td>
                              <td>'.$logoIz.'  '.$var2.'</td>
                          </tr>';}?>

                           <?php  if ($timpoDerecho <>'' or $refleDerecho  <>'' or $timpoDerecho1 <>'' or $refleDerecho1  <>''or $timpoIzquierdo <>'' or $refleIzquierdo <>'' or $timpoIzquierdo1<>'' or $refleIzquierdo1<>'') { echo 
                         '<tr>
                              <td rowspan="2"  width="20%" align="center"><b>Impedanciometría</b></td>
                              <td width="15%">Oído Derecho</td>
                              <td> '.$timpoDerecho.' '.$refleDerecho.' '.$timpoDerecho1.' '.$refleDerecho1.'</td>
                          </tr>
                          <tr>
                              <td width="15%">Oído Izquierdo</td>
                              <td>'.$timpoIzquierdo.' '.$refleIzquierdo.' '.$timpoIzquierdo1.' '.$refleIzquierdo1.'</td>
                          </tr>';}?>   
                      </table>

                       <table class="tg" border=1 style="table-layout: fixed; font-size:15px; width: 100%"  >
                        <tr>
                          <td rowspan="1"  width="20%" align="center"><b>Recomendaciones</b></td>
                          <td width="80%"> <?php echo $recomendacion ?> <?php echo $recomendacion1?></td>
                        </tr> 
                      </table>


                      <!--<div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_1, "style='display:none;'")==false){echo "<br>".$Desarrollo_Conducta_Auditiva_1;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_2, "style='display:none;'")==false){echo "".$Desarrollo_Conducta_Auditiva_2;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_3, "style='display:none;'")==false){echo "".$Desarrollo_Conducta_Auditiva_3;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_4, "style='display:none;'")==false){echo "<h4>NIVELES MINIMOS DE RESPUESTA</h4> <br>".$Desarrollo_Conducta_Auditiva_4;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_5, "style='display:none;'")==false){echo "".$Desarrollo_Conducta_Auditiva_5;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_6, "style='display:none;'")==false){echo "".$Desarrollo_Conducta_Auditiva_6;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Desarrollo_Conducta_Auditiva_7, "style='display:none;'")==false){echo "".$Desarrollo_Conducta_Auditiva_7;}?></div>-->

                      <!--<div class="col-md-12" align="center"><?php if(strpos($Antecedentes_Personales_Audiologicos, "style='display:none;'")==false){echo "<br> <h3><b>HISTORIA CLINICA </b></h3><br><br>".$Antecedentes_Personales_Audiologicos;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Antecedentes_Otologicos, "style='display:none;'")==false){echo $Antecedentes_Otologicos;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Caracteristicas_Subjetivas_Audicion, "style='display:none;'")==false){echo $Caracteristicas_Subjetivas_Audicion;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Antecedentes_Laborales_Audiologia, "style='display:none;'")==false){echo $Antecedentes_Laborales_Audiologia;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Habitos_Audiologia, "style='display:none;'")==false){echo $Habitos_Audiologia;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Antecedentes_Extralaborales_Audiologia, "style='display:none;'")==false){echo $Antecedentes_Extralaborales_Audiologia;}?></div>
                      <div class="col-md-12" align="center"><?php if(strpos($Antecedentes_Extralaborales_Audiologia_2, "style='display:none;'")==false){echo $Antecedentes_Extralaborales_Audiologia_2;}?></div>

                      <div class="col-md-12" align="left"><?php if(strpos($AnamnesisTinnitus, "style='display:none;'")==false AND strlen($AnamnesisTinnitus)>"105"){echo "<br> <h3><center><b>AMNESIS TINNITUS </b></center></h3><br><br>".$AnamnesisTinnitus;}?></div>
                      <div class="col-md-12" align="left"><?php if(strpos($CuestionarioReaccionesTinnitus, "style='display:none;'")==false){echo $CuestionarioReaccionesTinnitus;}?></div>
                      <div class="col-md-12" align="left"><?php if(strpos($ResultadoReaccionesTinnitus, "style='display:none;'")==false){echo $ResultadoReaccionesTinnitus;}?></div>
                      <div class="col-md-12" align="left"><?php if(strpos($TinnitusHandicapInventory, "style='display:none;'")==false){echo $TinnitusHandicapInventory;}?></div>
                      <div class="col-md-12" align="left"><?php if(strpos($SubEscalaTinnitus, "style='display:none;'")==false){echo $SubEscalaTinnitus;}?></div>
                      
                      <div class="col-md-12" align="left">
                      <?php if(strlen($CalificacionTinnitus)>"611"){echo "<br>Calificacion <br><br>".$CalificacionTinnitus;}?>
                      </div>

                      <div class="col-md-12" align="center">
                      <?php if(strlen($Valoracion_Tinnitus)>"878"){echo "<br> <h3><b> VALORACION DE TINNITUS </b></h3><br><br>".$Valoracion_Tinnitus;}?>
                      </div>
                      <div class="col-md-12" align="center">
                      <?php if(strlen($Incapacidad_Tinnitus)>"1111"){echo "<br>INVENTARIO DE INCAPACIDAD DEL TINNITUS <br><br>".$Incapacidad_Tinnitus."<br>";}?>
                      </div>-->

                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <style type="text/css">
                    @media all {

                    }

                    @media print{
                       div.curve_chart{
                        display:block;
                        page-break-before:always;
                    }
                    }
                    </style>

              


                <!--<div class="col-xs-6" align="center">-->
                  <div align="center">
                <?php
                echo  $firmaImg;

                ?>
                <br>_______________________________________<br>
                <?php echo $NOMBRE_USUARIO ?><br>
                <?php echo $especialidad?><br>
                <b>* Documento firmado digitalmente *</b>
                </div>


                

                    <!--<div class="col-xs-12" align="center">-->
                      <div align="center">
                  <footer  style="width:100%; margin-left: 0px;"  >


              <div class="copyright" style="background-color: #0d47a1;">
                  <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
                     <p> <?php echo $pieF?></p>

                  </div>
              </div>
            </footer>
          </div>










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

  </table>

</body>

</html>

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

<script type="text/javascript">
setTimeout(printHTML, 1000);
  function printHTML() { 
    if (window.print) { 
      window.print(); 
    } 
  }
</script>