<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'funciones/conn3.php';

// var_dump($conn3);
// echo "Se importaron las funciones";

$Historia_id = decrypt($_GET['historiaClinica1']);
// $Historia_id = base64_decode(substr($Historia_id, 10, strlen($Historia_id)));
// $Historia_id = 27;

$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Fisioterapia_1 where id = $Historia_id");
// echo "SELECT * FROM  Historia_Clinica_Fisioterapia_1 where id = $Historia_id";
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $id = $rowMotorizado['id'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $usuario_id = $rowMotorizado['usuario_id'];
        $usuario_id1 = $rowMotorizado['usuario_id'];

        $imagen = $rowMotorizado['imagen'];
        $nota = $rowMotorizado['nota'];
        $servicioContent = $rowMotorizado['servicioContent'];
        $indicacionesclinicas = $rowMotorizado['indicacionesclinicas'];
        $comentariosgeneral = $rowMotorizado['comentariosgeneral'];

    }
}




$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id ");
if ($queryList) {
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
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id1");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $pieF         = $rowMotorizado['pieF'];
        $header       = $rowMotorizado['header'];

        $nombreF       = $rowMotorizado['nombreF'];

        $LogoF               = $rowMotorizado['logoF'];
        $firma               = $rowMotorizado['firma'];

        if (strlen($LogoF) > 0) {
            $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
        }

        //echo "$usuario_id1 usuario";

        if (strlen($firma) > 0) {
            $firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='80' width='150'>";
        }
    }

}





  $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $Historia_id and historia_nombre = 'Historia_Clinica_Fisioterapia_1'");
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $firmaP = $rowMotorizado['firma'];
        }
    }  
    

      if (strlen($firmaP) > 10) {
     $firmaPaciente = "<img src='$firmaP' height='125' width='125'> <br>__________________________________ <br>$nombre_cliente<br>$CODI_CLIENTE";

      } 

      //echo "Antes de la creacion de la tabla";
?>
                    <!-- <div class="" style="" >    -->
                    <table class="table" style="margin-top: 3px;">
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
                    
                    <?php if (strlen($imagen) > 1) : ?>
                    <table class="table">
                        <tr>
                            <td>
                                <div>
                                    <?php echo "<div class='col-md-12' align='center'>
                                                                    <img src='".$Base .$imagen."' height='200' width='400'>
                                                                    
                                                                    
                                                                    
                                                                    </div>"; ?>    
                                </div>
                            </td>
                        </tr>
                    </table>
                        
                    <?php endif ?>
                        <?php if (strlen($nota) > 0) : ?>
                            <div>
    
                                <label> <b>Nota Imagen:</b> <br> <?php echo $nota ?></label>
    
                            </div>
                        <?php endif ?>

                        <?php if (strlen($servicioContent) > 0) : ?>
                            <table class="table" style="margin-top: 3px;">
                                <tr>
                                    <td>
                                    <div>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Extremidades</th>
                                                <th>Profundidad Masaje</th>
                                                <th>Nivel Dolor Masaje</th>
                                                <th>Intensidad Percutor</th>
                                                <th>Nivel Dolor Percutor</th>
                                                <th>Herramientas</th>
                                                <th>Comentarios</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $partes = explode("&nbsp;|&nbsp;", $servicioContent);
                                        foreach ($partes as $key => $value) {
                                            $partes1 = explode("|", $value);
                                            echo "<tr>";
                                            foreach ($partes1 as $key1 => $value1) {
                                                if($key1==0){
                                                    $value1 = str_replace(",", "", $value1);
                                                }
                                                echo "<td>$value1</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                            
                        <?php endif ?>

                        <?php if (strlen($comentariosgeneral) > 0) : ?>
                            <table class="table" style="margin-top: 3px;">
                                <tr>
                                    <td>
                                         <div>
                                            <label><b>Comentarios</b></label><br>
                                            <label><?php echo $comentariosgeneral ?></label>
                
                                        </div>
                                    </td>
                                </tr>
                            </table>
                           
                        <?php endif ?>

                        <?php if (strlen($indicacionesclinicas) > 0) : ?>
                            <table class="table" style="margin-top: 3px;">
                                <tr>
                                    <td>
                                        <div>
                                            <label><b>Indicaciones Clínicas</b></label><br>
                                            <label><?php echo $indicacionesclinicas ?></label>
                
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                        <?php endif ?>

                    <table class="table" style="">
                        <tr>
                            <td>
                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6" align="center">
                                            <?php
                                        echo  $firmaPaciente;

                                            ?>
                                        </div>

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
                            </td>
                        </tr>
                    </table>
                    


                    <!-- </div>  -->
                    <!-- cierre del page-->