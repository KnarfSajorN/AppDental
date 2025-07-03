<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $idcliente = decrypt($_GET['cI']);


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $idcliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];
              $edad               =$rowMotorizado['edad_cliente'];
              $fechaNacimiento               =$rowMotorizado['fechaNacimiento'];
              $telefono                =$rowMotorizado['celular_cliente'];
              $genero                  =$rowMotorizado['genero'];
              $whatsapp                  =$rowMotorizado['whatsapp'];
              $email                =$rowMotorizado['correo_cliente'];

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

            //var_dump(calculaedad($fechaNacimiento));


$queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = 1");
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
                $Logo = '<img src="' . $Base . 'logos/' . $LogoF . '" style="height:3cm; width:auto;">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="100" width="150">'; 
              }

}


            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = 1");
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

 

              ?>


<style type="text/css">

body {-webkit-print-color-adjust: exact !important; font-size:10px;}
@media print {
  body {-webkit-print-color-adjust: exact !important; font-size:10px;}
}

</style>




<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR! 
        </button>
    </div>

    <div class="page-footer">
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
                    <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;" >   
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




        
        
      </div>
         <div class="box-body">
           <div class="col-xs-12">

         <div class="col-xs-2">

         
       
   </div>

      <div class="col-xs-10">
 
    </div> </div>

 </div> 

    <div class="col-md-12">
      <table class="table table-bordered" style="font-size: 12px"  style="-webkit-print-color-adjust: exact  !important;">
        <thead>
          <tr>
            <th>Inyección</th>
            <th>Lote</th>
            <th>Fecha Vence Lote</th>
            <th>Nombre Comercial</th>

            <th>Fecha Administración</th>
            <th>Edad paciente</th>

            <th>Dosis</th>
            <th>Vía</th>
            <th>Lugar Aplicación</th>
            <th>Persona que Administra</th>
            <!-- <th>ID Persona que administra</th> -->
         
          </tr>
        </thead>
        <tbody>
          <?php

          $usuario_id = $_SESSION['ID'];

          $queryList=mysqli_query($conn3,"SELECT * FROM grupos_vacunacion");
          $nrowl=mysqli_num_rows($queryList);
          while($Lista=mysqli_fetch_array($queryList))
          {            
           $numero_grupo=$Lista['id'];
           $nombre_grupo=$Lista['Nombre'];

           $contador='0';

           $queryList1=mysqli_query($conn3,"SELECT l_v.id as ListaVacuna,l_v.Id_Vacuna as Id_Vacuna,v_a.Lote as lote,v_a.Fecha_Administracion as Fecha_A,v_a.Fecha_Proxima_Aplicacion as Fecha_P,v_a.Sitio_Anatomico as Sitio_A,v_a.Observacion as Observacion, v_a.Dosis_Aplicada as Dosis ,v_a.via as via, v_a.Persona_Aplica as Persona_Aplica, v_a.edad as edad FROM vacunas_aplicadas as v_a , listado_vacunas as l_v  WHERE v_a.Id_Lista_Vacuna = l_v.id AND l_v.Id_Grupo='$numero_grupo' AND v_a.Id_Cliente = '$idcliente'  ORDER BY v_a.id , v_a.Id_Lista_Vacuna, v_a.Dosis_Aplicada");
           $nrowl=mysqli_num_rows($queryList1);
           while($Lista1=mysqli_fetch_array($queryList1))
           {
            if($contador=="0"){echo '<tr><td colspan="12" style="background-color: beige !important;"><b>'.$nombre_grupo.'</b></td></tr>';}
            $ListaVacuna = $Lista1['ListaVacuna'];
            $Vacuna = $Lista1['Id_Vacuna'];
            $Nombre_Vacuna = funcionMaster($ListaVacuna,'id','Nombre_Vacuna','listado_vacunas');
            $Nombre_C = funcionMaster($Vacuna,'id','Nombre_Comercial','vacunas');

            $via = $Lista1['via'];
            $Dosis = $Lista1['Dosis'];
            $Fecha_A = $Lista1['Fecha_A'];
            $Fecha_P = $Lista1['Fecha_P'];
            $lote= $Lista1['lote'];


            $querylote=mysqli_query($conn3,"SELECT * FROM  lotes where id_vacuna =$Vacuna and descripcion='$lote'");
            $nrowl=mysqli_num_rows($querylote);
            while($rowMotorizado=mysqli_fetch_array($querylote))
            {
              $fechaV_V            =$rowMotorizado['fechaV']; 

            }   



            $Sitio_A = $Lista1['Sitio_A'];
            $Observacion = $Lista1['Observacion'];
            $Persona_Aplica = $Lista1['Persona_Aplica'];
            $edad = $Lista1['edad'];

            echo '<tr><td>'.$Nombre_Vacuna.' </td>
            <td>'.$lote.' </td>
            <td>'.$fechaV_V .' </td>

           <td>'.$Nombre_C .' </td>

            <td>'.$Fecha_A.' </td>
            <td>'.$edad.' </td>

            <td> '.$Dosis.' </td>
            <td> '.$via.' </td>
            <td> '.$Sitio_A .' </td>
           <td> '.$Persona_Aplica.' </td>
           
            </tr>';

            $contador++;
          }

        }
        ?>

        
      </tbody>

    </table>
  </div>

  <div class="col-md-12" style="text-align-last: center;">

<?php
 $direccion = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 echo '<img width="350px" height="350px" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='.$direccion.'&choe=UTF-8" title="Link to Google.com" />';
 echo '<br><br>';
 ?>

</div>







  </div> 
                    <!-- cierre del page-->
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

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>