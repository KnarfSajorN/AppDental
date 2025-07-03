    <?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
            
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $historiaClinica1 = decrypt($_GET['id']);



            $queryList=mysqli_query($conn3,"SELECT * FROM  Evoluciones_Generales where id = $historiaClinica1");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
             
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
                $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'FirmasReg/'.$firma.'" height="80" width="150">'; 
              }





// Nuevos campos 


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


            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $nombre_cliente = $rowMotorizado['nombre_cliente'];
                $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
                $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
                $direccion_cliente = $rowMotorizado['direccion_cliente'];
                $entidadSalud = $rowMotorizado['entidadSalud'];
                $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
                $celular_cliente = $rowMotorizado['celular_cliente'];
                $genero = $rowMotorizado['genero'];

                if ($genero == "M") {
                    $genero = "Masculino";
                } elseif ($genero == "F") {
                    $genero = "Femenino";
                }
            }
 
   ?>


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

                        <h4 align="center"> Nota de Evolución </h4>

                        <div class="col-md-12">


                            <?php  echo $notas1  ?>
                            <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = $motivoConsulta.'<hr>';} ?>
                            <?php  echo $motivoConsulta1  ?>

                            <!--<?php  if ($notas<> '') {$notas1 = 'Notas adicionales: '.$notas.'<hr>' ;} ?>
                            <?php  echo $notas1  ?>-->
                        </div>

                        <?php
                                $QueryImagesEvolutions  = "SELECT ruta FROM image_evolutions WHERE evolucion_id = '$historiaClinica1'";
                                $ResultImagesEvolutions = mysqli_query($conn3, $QueryImagesEvolutions);
                                if ($ResultImagesEvolutions) {
                                    if (mysqli_num_rows($ResultImagesEvolutions) > 0) { ?>
                                    <h4 class="text-center">Imagenes</h4>
                                    <div id="list-images" class="my-3">
                                        <?php 
                                        foreach ($ResultImagesEvolutions as $Row) {
                                            $path =  $Row['ruta'];?>
                                            <div class="preview-item">
                                            <img src="<?=$path?>" alt="">
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                    <?php }
                                }
                                ?>



        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="col-md-6" align="center">
        <?php echo $Fecha ?>
    </div>

    <div class="col-md-6" align="center">
        <?php echo $ciudadPaisF?>
    </div>



    <div class="col-md-6" align="center">
        <?php
 // echo  $firmaImg;

  ?>
    </div>

    <div class="col-md-6" align="center">
        <?php
  echo  $firmaImg;

  ?>
        <br>_______________________________________<br>
        <?php echo $nombreF?><br>
        <b>* Documento firmado digitalmente *</b>
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

<style>
    #list-images {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .preview-item {
        position: relative;
        display: inline-block;
    }

    .preview-item img {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

</style>