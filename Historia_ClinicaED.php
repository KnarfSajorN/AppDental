<?php
include 'header.php';
include 'menu.php';
// atencion
$a = $_GET['a'];
$clienteId = decrypt($_GET['cI']);
$idAtencion = $_GET['idAtencion'];
$ID = $_SESSION['ID'];

// consulta la historia
$queryList = mysqli_query($conn3, "SELECT * from atenciones WHERE id=$idAtencion");

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $val) {
            $resultado[$key] = $val;
        }
    } 
}


function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Escalas Dermatologicas</a></li>
        </ol>
    </section> -->
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Escalas Dermatológicas - <?= funcionMaster($clienteId, 'cliente_id', 'nombre_cliente', 'cliente') ?> / <?= funcionMaster($clienteId, 'cliente_id', 'CODI_CLIENTE', 'cliente') ?></h4>

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo datosPacientes($clienteId);
                        ?>
                        <div class="box-body table-responsive no-padding">

                            <div class="col-md-12">
                                <!-- empeiza la caja de navegacion -->
                                <div class="card">
                                    <div class="card-header">
                                    <!-- la lista de los tabs o titulos -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#tab_1" data-toggle="tab" class="nav-link">Fototipo</a></li>
                                        <li class="nav-item"><a href="#tab_2" data-toggle="tab" class="nav-link">Dermatitis Atópica</a></li>
                                        <li class="nav-item"><a href="#tab_3" data-toggle="tab" class="nav-link">Calidad de Vida</a></li>
                                        <li class="nav-item"><a href="#tab_4" data-toggle="tab" class="nav-link">Hirsutismo</a></li>
                                        <li class="nav-item"><a href="#tab_5" data-toggle="tab" class="nav-link">Psoriasis</a></li>
                                        <li class="nav-item"><a href="#tab_6" data-toggle="tab" class="nav-link">Melasma</a></li>
                                        <li class="nav-item"><a href="#tab_7" data-toggle="tab" class="nav-link">Cicatrices</a></li>
                                        <li class="nav-item"><a href="#tab_8" data-toggle="tab" class="nav-link">Alopecia</a></li>
                                        <li class="nav-item"><a href="#tab_9" data-toggle="tab" class="nav-link">Net</a></li>
                                        <li class="nav-item"><a href="#tab_10" data-toggle="tab" class="nav-link">Hidradenitis</a></li>
                                    </ul>
                                    </div>

                                    <div class="tab-content card-body">
                                        <!-- tab_1 -->
                                        <div class="tab-pane" id="tab_1">
                                            <form action="hcedGuardar" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_1">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala Fitzpartick","Todas","Escala que sirve para clasificar la piel humana según su comportamiento frente al bronceado","","0 al 85");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <label for="">¿Cuál es el color natural de su piel cuando no está bronceado(a)?</label>
                                                    <input type="hidden" name="arreglo[F_01_nombre]" value="¿Cuál es el color natural de su piel cuando no está bronceado(a)?">
                                                    <select class="form-control input-lg " name="arreglo[F_01_valor]" id="F_01" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option>
                                                        <?php
                                                        $titulos = array("Rojiza a Blanca", "Blanca a Beige", "Beige", "Marrón clara", "Negra");
                                                        $valores = array("0", "2", "4", "8", "12");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿De que color natural es su pelo?</label>
                                                    <input type="hidden" name="arreglo[F_02_nombre]" value="¿De que color natural es su pelo?">
                                                    <select class="form-control input-lg " name="arreglo[F_02_valor]" id="F_02" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Pelirrojo a Rubio claro ","Rubio a Castaño claro","Castaño","Castaño oscuro","Castaño oscuro a Negro","Negro");
                                                        $valores = array("0","2","4","8","12","16");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿De qué color tiene los ojos?</label>
                                                    <input type="hidden" name="arreglo[F_03_nombre]" value="¿De qué color tiene los ojos?">
                                                    <select class="form-control input-lg " name="arreglo[F_03_valor]" id="F_03" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Azul claro Verde claro o Gris claro","Azules Verdes Grises","Grises Marrón claro","Marrones","Marrón oscuro","Negros");
                                                        $valores = array("0","2","4","8","12","16");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿Cuantas pecas tiene de manera natural en el cuerpo cuando no está bronceado(a)?</label>
                                                    <input type="hidden" name="arreglo[F_04_nombre]" value="¿Cuantas pecas tiene de manera natural en el cuerpo cuando no está bronceado(a)?">
                                                    <select class="form-control input-lg " name="arreglo[F_04_valor]" id="F_04" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Muchas","Algunas","Unas cuantas","Ninguna");
                                                        $valores = array("0","4","6","8");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿Qué categoría describe mejor su herencla genética?</label>
                                                    <input type="hidden" name="arreglo[F_05_nombre]" value="¿Qué categoría describe mejor su herencla genética?">
                                                    <select class="form-control input-lg " name="arreglo[F_05_valor]" id="F_05" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Raza blanca de piel muy blanca","Raza blanca de piel clara","Raza blanca de piel morena (Mediterráneo)","Oriente medio, Hindú, Asiatico, Hispano-Americano","Aborigen, Africano, Afroamericano");
                                                        $valores = array("0","2","4","8","12");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿Qué categoría describe mejor su potencial de quemadura después de exponerse al sol una hora en verano?</label>
                                                    <input type="hidden" name="arreglo[F_06_nombre]" value="¿Qué categoría describe mejor su potencial de quemadura después de exponerse al sol una hora en verano?">
                                                    <select class="form-control input-lg " name="arreglo[F_06_valor]" id="F_06" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Siempre se quema y no se broncea nunca","Habitualmente se quema, pero puede bronceaste ligeramente","Se quema ocasionalmente, pero se broncea moderadamente","Nunca se quema y se broncea con facilidad","Raramente se quema y se broncea profundamente","Nunca se quema");
                                                        $valores = array("0","2","4","8","10","12");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">¿Que categoría describe mejor su potencial de bronceado?</label>
                                                    <input type="hidden" name="arreglo[F_07_nombre]" value="¿Que categoría describe mejor su potential de bronceado?">
                                                    <select class="form-control input-lg " name="arreglo[F_07_valor]" id="F_07" onchange="calcularFototipo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Nunca se broncea","Se puede broncear ligeramente","Se puede broncear moderadamente","Se puede broncear profundamente");
                                                        $valores = array("0","2","4","8");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Puntaje Total: </th>
                                                            <input type="hidden" name="arreglo[F_08_nombre]" value="Puntaje Total:">
                                                            <td><input type="text" name="arreglo[F_08_valor]" id="F_08" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Fototipo: </th>
                                                            <input type="hidden" name="arreglo[F_09_nombre]" value="Fototipo:">
                                                            <td><input type="text" name="arreglo[F_09_valor]" id="F_09" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_10_nombre]" value="Observacion:">
                                                            <td><input type="text" name="arreglo[F_10_valor]" id="F_10" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_fototipo">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="tab_2">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_2">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Definición del Score", "Número de variables","Valores esperados");
                                                        $valores_escala = array("SCORAD","Todas","Pacientes con Dermatitis Atopica","Escala que se utiliza a nivel clínico para conocer el grado, intensidad y severidad del eccema atópico","3", "0 al 103");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <th>EXTENSION:</th>
                                                    <input type="hidden" name="arreglo[F_0027_nombre]" value="EXTENSION:"><br>
                                                    <th>ZONA ANTERIOR:</th>
                                                    <input type="hidden" name="arreglo[F_0028_nombre]" value="ZONA ANTERIOR:"><br>
                                                    <label for="">Cara</label>
                                                    <input type="hidden" name="arreglo[F_001_nombre]" value="Cara ">
                                                    <select class="form-control input-lg " name="arreglo[F_001_valor]" id="F_001" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_002_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_002_valor]" id="F_002" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Pelirrojo a Rubio claro ","Rubio a Castaño claro","Castaño","Castaño oscuro","Castaño oscuro a Negro","Negro");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Tronco </label>
                                                    <input type="hidden" name="arreglo[F_003_nombre]" value="Tronco ">
                                                    <select class="form-control input-lg " name="arreglo[F_003_valor]" id="F_003" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Azul claro Verde claro o Gris claro","Azules Verdes Grises","Grises Marrón claro","Marrones","Marrón oscuro","Negros");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0", "9.5", "10.0", "10.5", "11.0", "11.5", "12.0", "12.5", "13.0", "13.5", "14.0", "14.5", "15.0", "15.5", "16.0", "16.5", "17.0", "17.5", "18.0", "18.5", "19.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Manos</label>
                                                    <input type="hidden" name="arreglo[F_004_nombre]" value="Manos">
                                                    <select class="form-control input-lg " name="arreglo[F_004_valor]" id="F_004" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Muchas","Algunas","Unas cuantas","Ninguna");
                                                        $valores = array("0.0","0.5","1.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_005_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_005_valor]" id="F_005" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Raza blanca de piel muy blanca","Raza blanca de piel clara","Raza blanca de piel morena (Mediterraneo)","Oriente medio, Hindú, Asiatico, Hispano-Americano","Aborigen, Africano, Afroamericano");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0", "9.5", "10.0", "10.5", "11.0", "11.5", "12.0", "12.5", "13.0", "13.5", "14.0", "14.5", "15.0", "15.5", "16.0", "16.5", "17.0", "17.5", "18.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Genitales</label>
                                                    <input type="hidden" name="arreglo[F_006_nombre]" value="Genitales">
                                                    <select class="form-control input-lg " name="arreglo[F_006_valor]" id="F_006" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Siempre se quema y no se broncea nunca","Habitualmente se quema, pero puede bronceatse ligeramente","Se quema ocasionalmente, pero se broncea moderadamente","Nunca se quema y se broncea con facilidad","Raramente se quema y se broncea profundamente","Nunca se quema");
                                                        $valores = array("0.0","0.5","1.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <th>ZONA POSTERIOR:</th>
                                                    <input type="hidden" name="arreglo[F_0026_nombre]" value="ZONA POSTERIOR:"><br>
                                                    <label for="">Cabeza</label>
                                                    <input type="hidden" name="arreglo[F_007_nombre]" value="Cabeza">
                                                    <select class="form-control input-lg "  name="arreglo[F_007_valor]" id="F_007" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Raza blanca de piel muy blanca","Raza blanca de piel clara","Raza blanca de piel morena (Mediterraneo)","Oriente medio, Hindú, Asiatico, Hispano-Americano","Aborigen, Africano, Afroamericano");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                           
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_008_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_008_valor]" id="F_008" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Nunca se broncea","Se puede broncear ligeramente","Se puede broncear moderadamente","Se puede broncear profundamente");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Tronco</label>
                                                    <input type="hidden" name="arreglo[F_009_nombre]" value="Tronco">
                                                    <select class="form-control input-lg " name="arreglo[F_009_valor]" id="F_009" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Nunca se broncea","Se puede broncear ligeramente","Se puede broncear moderadamente","Se puede broncear profundamente");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0", "9.5", "10.0", "10.5", "11.0", "11.5", "12.0", "12.5", "13.0", "13.5", "14.0", "14.5", "15.0", "15.5", "16.0", "16.5", "17.0", "17.5", "18.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_0010_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0010_valor]" id="F_0010" onchange="calcularDermatitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        //$titulos = array("Nunca se broncea","Se puede broncear ligeramente","Se puede broncear moderadamente","Se puede broncear profundamente");
                                                        $valores = array("0.0", "0.5", "1.0", "1.5", "2.0", "2.5", "3.0", "3.5", "4.0", "4.5", "5.0", "5.5", "6.0", "6.5", "7.0", "7.5", "8.0", "8.5", "9.0", "9.5", "10.0", "10.5", "11.0", "11.5", "12.0", "12.5", "13.0", "13.5", "14.0", "14.5", "15.0", "15.5", "16.0", "16.5", "17.0", "17.5", "18.0");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <th>INTENSIDAD:</th>
                                                    <input type="hidden" name="arreglo[F_0025_nombre]" value="INTENSIDAD:"><br>
                                                    <label for="">Eritema</label>
                                                    <input type="hidden" name="arreglo[F_0011_nombre]" value="Eritema">
                                                    <select class="form-control input-lg " name="arreglo[F_0011_valor]" id="F_0011" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Edema</label>
                                                    <input type="hidden" name="arreglo[F_0012_nombre]" value="Edema">
                                                    <select class="form-control input-lg " name="arreglo[F_0012_valor]" id="F_0012" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Exudado</label>
                                                    <input type="hidden" name="arreglo[F_0013_nombre]" value="Exudado">
                                                    <select class="form-control input-lg " name="arreglo[F_0013_valor]" id="F_0013" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Excoriación</label>
                                                    <input type="hidden" name="arreglo[F_0014_nombre]" value="Excoriación">
                                                    <select class="form-control input-lg " name="arreglo[F_0014_valor]" id="F_0014" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Liquenificación</label>
                                                    <input type="hidden" name="arreglo[F_0015_nombre]" value="Liquenificación">
                                                    <select class="form-control input-lg " name="arreglo[F_0015_valor]" id="F_0015" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Xerosis</label>
                                                    <input type="hidden" name="arreglo[F_0016_nombre]" value="Xerosis">
                                                    <select class="form-control input-lg " name="arreglo[F_0016_valor]" id="F_0016" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <th>SÍNTOMAS SUBJETIVOS:</th>
                                                    <input type="hidden" name="arreglo[F_0024_nombre]" value="SINTOMAS SUBJETIVOS:"><br>
                                                    <label for="">Prurito</label>
                                                    <input type="hidden" name="arreglo[F_0017_nombre]" value="Prurito">
                                                    <select class="form-control input-lg " name="arreglo[F_0017_valor]" id="F_0017" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Insomnio</label>
                                                    <input type="hidden" name="arreglo[F_0018_nombre]" value="Insomnio">
                                                    <select class="form-control input-lg " name="arreglo[F_0018_valor]" id="F_0018" onchange="calcularDermatitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Sin afectación","Leve","Moderado","Grave");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Extensión: </th>
                                                            <input type="hidden" name="arreglo[F_0019_nombre]" value="Extension:">
                                                            <td><input type="text" name="arreglo[F_0019_valor]" id="F_0019" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Intensidad: </th>
                                                            <input type="hidden" name="arreglo[F_0020_nombre]" value="Intensidad:">
                                                            <td><input type="text" name="arreglo[F_0020_valor]" id="F_0020" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Síntomas Subjetivos: </th>
                                                            <input type="hidden" name="arreglo[F_0021_nombre]" value="Sintomas Subjetivos:">
                                                            <td><input type="text" name="arreglo[F_0021_valor]" id="F_0021" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>SCORAD: </th>
                                                            <input type="hidden" name="arreglo[F_0022_nombre]" value="SCORAD:">
                                                            <td><input type="text" name="arreglo[F_0022_valor]" id="F_0022" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_0023_nombre]" value="Observacion:">
                                                            <td><input type="text" name="arreglo[F_0023_valor]" id="F_0023" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_dermatitis">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_3">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_3">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala Fitzpartick","Todas","Escala que sirve para clasificar la piel humana según su comportamiento frente al bronceado","","0 al 85");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿cuánta picazón, dolor, inflamación o ardor ha tenido su piel?</label>
                                                    <input type="hidden" name="arreglo[F_0001_nombre]" value="Durante la última semana, ¿cuánta picazón, dolor, inflamación o ardor ha tenido su piel?">
                                                    <select class="form-control input-lg " name="arreglo[F_0001_valor]" id="F_0001" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿Se ha sentido incomodo o cohibido debido a los problemas de su piel?</label>
                                                    <input type="hidden" name="arreglo[F_0002_nombre]" value="Durante la última semana, ¿Se ha sentido incomodo o cohibido debido a los problemas de su piel?">
                                                    <select class="form-control input-lg " name="arreglo[F_0002_valor]" id="F_0002" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿Cuánto ha interferido el problema de su piel con que usted vaya de compras, cuide de su hogar o jardín?</label>
                                                    <input type="hidden" name="arreglo[F_0003_nombre]" value="Durante la última semana, ¿Cuánto ha interferido el problema de su piel con que usted vaya de compras, cuide de su hogar o jardín?">
                                                    <select class="form-control input-lg " name="arreglo[F_0003_valor]" id="F_0003" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿cuánto ha influido su problema de la piel en la ropa que usa?</label>
                                                    <input type="hidden" name="arreglo[F_0004_nombre]" value="Durante la última semana, ¿cuánto ha influido su problema de la piel en la ropa que usa?">
                                                    <select class="form-control input-lg " name="arreglo[F_0004_valor]" id="F_0004" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿Su problema de piel a las actividades sociales o tiempo libre?</label>
                                                    <input type="hidden" name="arreglo[F_0005_nombre]" value="Durante la última semana, ¿Su problema de piel a las actividades sociales o tiempo libre?">
                                                    <select class="form-control input-lg " name="arreglo[F_0005_valor]" id="F_0005" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿Qué tanto le ha afectado poder hacer algún deporte a causa de su condición de la piel?</label>
                                                    <input type="hidden" name="arreglo[F_0006_nombre]" value="Durante la última semana, ¿Qué tanto le ha afectado poder hacer algún deporte a causa de su condición de la piel?">
                                                    <select class="form-control input-lg " name="arreglo[F_0006_valor]" id="F_0006" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                               <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿su piel le impidió trabajar o estudiar?</label>
                                                    <input type="hidden" name="arreglo[F_0007_nombre]" value="Durante la última semana, ¿su piel le impidió trabajar o estudiar?">
                                                    <select class="form-control input-lg " name="arreglo[F_0007_valor]" id="F_0007" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿Qué tanto ha creado su piel problemas con su pareja o cualquiera de sus amigos cercanos o Parientes?</label>
                                                    <input type="hidden" name="arreglo[F_0008_nombre]" value="Durante la última semana, ¿Qué tanto ha creado su piel problemas con su pareja o cualquiera de sus amigos cercanos o Parientes?">
                                                    <select class="form-control input-lg " name="arreglo[F_0008_valor]" id="F_0008" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿cuánto le ha causado su piel alguna dificultad sexual?</label>
                                                    <input type="hidden" name="arreglo[F_0009_nombre]" value="Durante la última semana, ¿cuánto le ha causado su piel alguna dificultad sexual?">
                                                    <select class="form-control input-lg " name="arreglo[F_0009_valor]" id="F_0009" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


<div class="col-md-12">
                                                    <label for="">Durante la última semana, ¿cuantos problemas le ha causado el tratamiento de su piel, por ejemplo, toma mucho tiempo, o ase su casa desorganizada?</label>
                                                    <input type="hidden" name="arreglo[F_00010_nombre]" value="Durante la última semana, ¿cuantos problemas le ha causado el tratamiento de su piel, por ejemplo, toma mucho tiempo, o ase su casa desorganizada?">
                                                    <select class="form-control input-lg " name="arreglo[F_00010_valor]" id="F_00010" onchange="calcularCalidad()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Un poco", "Bastante", "Mucho");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>



 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>DLQI: </th>
                                                            <input type="hidden" name="arreglo[F_00011_nombre]" value="DLQI:">
                                                            <td><input type="text" name="arreglo[F_00011_valor]" id="F_00011" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_00012_nombre]" value="Observacion:">
                                                            <td><input type="text" name="arreglo[F_00012_valor]" id="F_00012" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_calidad">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>



                                        <!-- tab_1 -->
                                        <div class="tab-pane" id="tab_4">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_4">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala Ferriman y Gallwey","Hirsutismo","Escala que sirve para clasificar el grado de severidad del cuadro de Hirsutismo","4 en 4 areas: Total: 16","0 al 24");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <label for="">LABIO SUPERIOR</label>
                                                    <input type="hidden" name="arreglo[F_00001_nombre]" value="LABIO SUPERIOR">
                                                    <select class="form-control input-lg " name="arreglo[F_00001_valor]" id="F_00001" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pocos pelos en márgenes externos", "Pequeño bigote en márgenes externos", "Bigote desde la mitad del labio a márgenes externos", "Cubierto");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">MEJILLA</label>
                                                    <input type="hidden" name="arreglo[F_00002_nombre]" value="MEJILLA">
                                                    <select class="form-control input-lg " name="arreglo[F_00002_valor]" id="F_00002" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelos aislados", "Pequeñas acumulaciones de pelo", "Casi completamente cubierta", "Completamente cubierta");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">TÓRAX</label>
                                                    <input type="hidden" name="arreglo[F_00003_nombre]" value="TÓRAX">
                                                    <select class="form-control input-lg " name="arreglo[F_00003_valor]" id="F_00003" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos","Pelos peri areolares","Además algunos en línea media","Fusión de las anteriores, con ¾ partes cubiertas","Completamente cubierto");
                                                        $valores = array("0","1","2","3","4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">ESPALDA SUPERIOR</label>
                                                    <input type="hidden" name="arreglo[F_00004_nombre]" value="ESPALDA SUPERIOR">
                                                    <select class="form-control input-lg " name="arreglo[F_00004_valor]" id="F_00004" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelos aislados", "Algunos más", "Casi completamente cubierta", "Completamente cubierta");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">ESPALDA INFERIOR</label>
                                                    <input type="hidden" name="arreglo[F_00005_nombre]" value="ESPALDA INFERIOR">
                                                    <select class="form-control input-lg " name="arreglo[F_00005_valor]" id="F_00005" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Mechón de pelos en sacro", "Con extensión lateral", "¾ partes cubiertas", "Completamente cubierta");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

 
                                                <div class="col-md-12">
                                                    <label for="">ABDOMEN SUPERIOR</label>
                                                    <input type="hidden" name="arreglo[F_00006_nombre]" value="ABDOMEN SUPERIOR">
                                                    <select class="form-control input-lg " name="arreglo[F_00006_valor]" id="F_00006" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pocos pelos en línea media", "Algunos más en línea media", "Cubierto casi totalmente", "Cubierto totalmente");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">ABDOMEN INFERIOR</label>
                                                    <input type="hidden" name="arreglo[F_00007_nombre]" value="ABDOMEN INFERIOR">
                                                    <select class="form-control input-lg " name="arreglo[F_00007_valor]" id="F_00007" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pocos pelos en línea media", "Algunos más en línea media", "Cubierto casi totalmente", "Cubierto totalmente");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">BRAZO</label>
                                                    <input type="hidden" name="arreglo[F_00008_nombre]" value="BRAZO">
                                                    <select class="form-control input-lg " name="arreglo[F_00008_valor]" id="F_00008" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelo sin afectar más de ¼ de la superficie", "Cubierto, aunque no completo", "Casi completamente cubierto", "Completamente cubierto");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">ANTEBRAZO</label>
                                                    <input type="hidden" name="arreglo[F_00009_nombre]" value="ANTEBRAZO">
                                                    <select class="form-control input-lg " name="arreglo[F_00009_valor]" id="F_00009" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelos aislado en región dorsal", "Pelos aislado", "Pelo mas abundante", "Casi cubierto en región dorsal");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">MUSLO</label>
                                                    <input type="hidden" name="arreglo[F_000010_nombre]" value="MUSLO">
                                                    <select class="form-control input-lg " name="arreglo[F_000010_valor]" id="F_000010" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelo sin afectar más de ¼ de la superficie", "Cubierto, aunque no completo", "Casi completamente cubierto", "Completamente cubierto");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">PIERNA</label>
                                                    <input type="hidden" name="arreglo[F_000011_nombre]" value="PIERNA">
                                                    <select class="form-control input-lg " name="arreglo[F_000011_valor]" id="F_000011" onchange="calcularHirsutismo()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin pelos", "Pelos aislado en región dorsal", "Pelos aislado", "Pelo mas abundante", "Casi cubierto en región dorsal");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>INDICE HIRSUTISMO: </th>
                                                            <input type="hidden" name="arreglo[F_000012_nombre]" value="INDICE HIRSUTISMO:">
                                                            <td><input type="text" name="arreglo[F_000012_valor]" id="F_000012" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_000013_nombre]" value="Observacion:">
                                                            <td><input type="text" name="arreglo[F_000013_valor]" id="F_000013" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_hirsutismo">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_5">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_5">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala PASI","Psoriasis","Escala que sirve para clasificar el grado de severidad del cuadro de Psoriasis","4 en 4 areas: Total: 16","0 al 24");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                	<th>% afectado:</th>
                                                    <input type="hidden" name="arreglo[F_000001_nombre]" value="% afectado:"><br>
                                                    <label for="">Cabeza y cuello</label>
                                                    <input type="hidden" name="arreglo[F_000002_nombre]" value="Cabeza y cuello">
                                                    <select class="form-control input-lg " name="arreglo[F_000002_valor]" id="F_000002" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("0%", "1%-9%", "10%-29%", "30%-49%", "50%-69%", "70%-89%", "90%-100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_000003_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_000003_valor]" id="F_000003" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("0%", "1%-9%", "10%-29%", "30%-49%", "50%-69%", "70%-89%", "90%-100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Tronco</label>
                                                    <input type="hidden" name="arreglo[F_000004_nombre]" value="Tronco">
                                                    <select class="form-control input-lg " name="arreglo[F_000004_valor]" id="F_000004" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("0%", "1%-9%", "10%-29%", "30%-49%", "50%-69%", "70%-89%", "90%-100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_000005_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_000005_valor]" id="F_000005" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                         $titulos = array("0%", "1%-9%", "10%-29%", "30%-49%", "50%-69%", "70%-89%", "90%-100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                               <div class="col-md-12">
                                               	<th>Eritema:</th>
                                                    <input type="hidden" name="arreglo[F_000006_nombre]" value="Eritema:"><br>
                                                    <label for="">Cabeza y cuello</label>
                                                    <input type="hidden" name="arreglo[F_000007_nombre]" value="Cabeza y cuello">
                                                    <select class="form-control input-lg " name="arreglo[F_000007_valor]" id="F_000007" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_000008_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_000008_valor]" id="F_000008" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Tronco</label>
                                                    <input type="hidden" name="arreglo[F_000009_nombre]" value="Tronco">
                                                    <select class="form-control input-lg " name="arreglo[F_000009_valor]" id="F_000009" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_0000010_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0000010_valor]" id="F_0000010" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                	<th>Induración:</th>
                                                    <input type="hidden" name="arreglo[F_0000011_nombre]" value="Induracion:"><br>
                                                    <label for="">Cabeza y cuello</label>
                                                    <input type="hidden" name="arreglo[F_0000012_nombre]" value="Cabeza y cuello">
                                                    <select class="form-control input-lg " name="arreglo[F_0000012_valor]" id="F_0000012" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">                                                	
                                                   <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_0000013_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0000013_valor]" id="F_0000013" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">
                                                    <label for="">Tronco</label>
                                                    <input type="hidden" name="arreglo[F_0000014_nombre]" value="Tronco">
                                                    <select class="form-control input-lg " name="arreglo[F_0000014_valor]" id="F_0000014" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_0000015_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0000015_valor]" id="F_0000015" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                	<th>Descamación:</th>
                                                    <input type="hidden" name="arreglo[F_0000016_nombre]" value="Induracion:"><br>
                                                    <label for="">Cabeza y cuello</label>
                                                    <input type="hidden" name="arreglo[F_0000017_nombre]" value="Cabeza y cuello">
                                                    <select class="form-control input-lg " name="arreglo[F_0000017_valor]" id="F_0000017" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Extremidades superiores</label>
                                                    <input type="hidden" name="arreglo[F_0000018_nombre]" value="Extremidades superiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0000018_valor]" id="F_0000018" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Tronco</label>
                                                    <input type="hidden" name="arreglo[F_0000019_nombre]" value="Tronco">
                                                    <select class="form-control input-lg " name="arreglo[F_0000019_valor]" id="F_0000019" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Extremidades inferiores</label>
                                                    <input type="hidden" name="arreglo[F_0000020_nombre]" value="Extremidades inferiores">
                                                    <select class="form-control input-lg " name="arreglo[F_0000020_valor]" id="F_0000020" onchange="calcularPsoriasis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente", "Leve", "Moderado", "Severo", "Muy severo");
                                                        $valores = array("0", "1", "2", "3", "4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>B1: </th>
                                                            <input type="hidden" name="arreglo[F_0000021_nombre]" value="B1:">
                                                            <td><input type="text" name="arreglo[F_0000021_valor]" id="F_0000021" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>B2: </th>
                                                            <input type="hidden" name="arreglo[F_0000022_nombre]" value="B2:">
                                                            <td><input type="text" name="arreglo[F_0000022_valor]" id="F_0000022" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>B3: </th>
                                                            <input type="hidden" name="arreglo[F_00000023_nombre]" value="B3:">
                                                            <td><input type="text" name="arreglo[F_0000023_valor]" id="F_0000023" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>B4: </th>
                                                            <input type="hidden" name="arreglo[F_0000024_nombre]" value="B4:">
                                                            <td><input type="text" name="arreglo[F_0000024_valor]" id="F_0000024" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>C1: </th>
                                                            <input type="hidden" name="arreglo[F_0000025_nombre]" value="C1:">
                                                            <td><input type="text" name="arreglo[F_0000025_valor]" id="F_0000025" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                         <tr>
                                                            <th>C2: </th>
                                                            <input type="hidden" name="arreglo[F_0000026_nombre]" value="C2:">
                                                            <td><input type="text" name="arreglo[F_0000026_valor]" id="F_0000026" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                         <tr>
                                                            <th>C3: </th>
                                                            <input type="hidden" name="arreglo[F_0000027_nombre]" value="C3:">
                                                            <td><input type="text" name="arreglo[F_0000027_valor]" id="F_0000027" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                         <tr>
                                                            <th>C4: </th>
                                                            <input type="hidden" name="arreglo[F_0000028_nombre]" value="C4:">
                                                            <td><input type="text" name="arreglo[F_0000028_valor]" id="F_0000028" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>PASI: </th>
                                                            <input type="hidden" name="arreglo[F_0000029_nombre]" value="PASI:">
                                                            <td><input type="text" name="arreglo[F_0000029_valor]" id="F_0000029" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_0000030_nombre]" value="Observacion:">
                                                            <td><input type="text" name="arreglo[F_0000030_valor]" id="F_0000030" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_psoriasis">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_6">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_6">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("MASI (Melasma Area and Severity Index)","Melasma","Escala que sirve para clasificar la piel humana según su comportamiento frente al bronceado","2","0 al 24");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                	<th>Área comprometida:</th>
                                                    <input type="hidden" name="arreglo[F_0000001_nombre]" value="Área comprometida:"><br>
                                                    <label for="">Frente (f) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000002_nombre]" value="Frente (f) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000002_valor]" id="F_0000002" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin compromiso", "< 10%", "10–29%", "30–49%", "50–69%", "70–89%", "90–100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">
                                                    <label for="">Región Malar Derecha (rm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000003_nombre]" value="Región Malar Derecha (rm) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000003_valor]" id="F_0000003" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin compromiso", "< 10%", "10–29%", "30–49%", "50–69%", "70–89%", "90–100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región Malar Izquierda (lm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000004_nombre]" value="Región Malar Izquierda (lm) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000004_valor]" id="F_0000004" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin compromiso", "< 10%", "10–29%", "30–49%", "50–69%", "70–89%", "90–100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">
                                                    <label for="">Barbilla (c) 10%</label>
                                                    <input type="hidden" name="arreglo[F_0000005_nombre]" value="Barbilla (c) 10%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000005_valor]" id="F_0000005" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Sin compromiso", "< 10%", "10–29%", "30–49%", "50–69%", "70–89%", "90–100%");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                	<th>Densidad:</th>
                                                    <input type="hidden" name="arreglo[F_0000006_nombre]" value="Densidad:"><br>
                                                    <label for="">Frente (f) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000007_nombre]" value="Frente (f) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000007_valor]" id="F_0000007" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Ausente","Mínimo","Leve","Marcado","Máximo");
                                                        $valores = array("0","1","2","3","4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                 <div class="col-md-12">
                                                    <label for="">Región Malar Derecha (rm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000008_nombre]" value="Región Malar Derecha (rm) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000008_valor]" id="F_0000008" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                         $titulos = array("Ausente","Mínimo","Leve","Marcado","Máximo");
                                                        $valores = array("0","1","2","3","4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Región Malar Izquierda (lm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_0000009_nombre]" value="Región Malar Izquierda (lm) 30%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000009_valor]" id="F_0000009" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                         $titulos = array("Ausente","Mínimo","Leve","Marcado","Máximo");
                                                        $valores = array("0","1","2","3","4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>



                                                <div class="col-md-12">
                                                    <label for="">Barbilla (c) 10%</label>
                                                    <input type="hidden" name="arreglo[F_00000010_nombre]" value="Barbilla (c) 10%">
                                                    <select class="form-control input-lg " name="arreglo[F_00000010_valor]" id="F_00000010" onchange="calcularMelasma()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                         $titulos = array("Ausente","Mínimo","Leve","Marcado","Máximo");
                                                        $valores = array("0","1","2","3","4");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                 <div class="col-md-12">
                                                	<th>Suma parcial:</th>
                                                    <input type="hidden" name="arreglo[F_00000011_nombre]" value="Densidad:"><br>
                                                    <label for="">Frente (f) 30%</label>
                                                    <input type="hidden" name="arreglo[F_00000012_nombre]" value="Frente (f) 30%">
                                                    <input type="text" name="arreglo[F_00000012_valor]" id="F_00000012" class="form-control input-lg">
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Región Malar Derecha (rm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_00000013_nombre]" value="Región Malar Derecha (rm) 30%">
                                                    <input type="text" name="arreglo[F_00000013_valor]" id="F_00000013" class="form-control input-lg">
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Región Malar Izquierda (lm) 30%</label>
                                                    <input type="hidden" name="arreglo[F_00000014_nombre]" value="Región Malar Izquierda (lm) 30%">
                                                    <input type="text" name="arreglo[F_00000014_valor]" id="F_00000014" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Barbilla (c) 10%</label>
                                                    <input type="hidden" name="arreglo[F_00000015_nombre]" value="Barbilla (c) 10%">
                                                    <input type="text" name="arreglo[F_00000015_valor]" id="F_00000015" class="form-control input-lg">
                                                </div>
 

                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>MASI TOTAL: </th>
                                                            <input type="hidden" name="arreglo[F_00000016_nombre]" value="MASI TOTAL:">
                                                            <td><input type="text" name="arreglo[F_00000016_valor]" id="F_00000016" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Observación: </th>
                                                            <input type="hidden" name="arreglo[F_00000017_nombre]" value="Observación:">
                                                            <td><input type="text" name="arreglo[F_00000017_valor]" id="F_00000017" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_melasma">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_7">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_7">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala Vancouver","Cicatrices","Escala que sirve para clasificar la calidad de la cicatrización de una herida","4","0 al 24");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <label for="">PIGMENTACIÓN (0-3)</label>
                                                    <input type="hidden" name="arreglo[F_00000001_nombre]" value="PIGMENTACIÓN (0-3)">
                                                    <select class="form-control input-lg " name="arreglo[F_00000001_valor]" id="F_00000001" onchange="calcularCicatrices()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Normal", "Hipopigmentación", "Mixta", "Hiperpigmentación");
                                                        $valores = array("0", "1", "2", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">VASCULARIZACIÓN (0-3)</label>
                                                    <input type="hidden" name="arreglo[F_00000002_nombre]" value="VASCULARIZACIÓN (0-3)">
                                                    <select class="form-control input-lg " name="arreglo[F_00000002_valor]" id="F_00000002" onchange="calcularCicatrices()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Normal","Rosada","Roja","Purpura");
                                                        $valores = array("0","1","2","3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">FLEXIBILIDAD/CONSISTENCIA (0-5)</label>
                                                    <input type="hidden" name="arreglo[F_00000003_nombre]" value="FLEXIBILIDAD/CONSISTENCIA (0-5)">
                                                    <select class="form-control input-lg " name="arreglo[F_00000003_valor]" id="F_00000003" onchange="calcularCicatrices()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Normal","Flexible","Blanda","Firme","Bandas","Contracturas");
                                                        $valores = array("0","1","2","3","4","5");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">ALTURA (0-3)</label>
                                                    <input type="hidden" name="arreglo[F_00000004_nombre]" value="ALTURA (0-3)">
                                                    <select class="form-control input-lg " name="arreglo[F_00000004_valor]" id="F_00000004" onchange="calcularCicatrices()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("Plana","< 2 mm","2 - 5 mm","> 5 mm");
                                                        $valores = array("0","1","2","3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                              
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>INDICE VANCOUVER: </th>
                                                            <input type="hidden" name="arreglo[F_00000005_nombre]" value="INDICE VANCOUVER:">
                                                            <td><input type="text" name="arreglo[F_00000005_valor]" id="F_00000005" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_cicatrices">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_8">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_8">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala SALT I","Alopecia","Escala que sirve para evaluar la severidad de un cuadro de alopecia","4","0 al 100");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                	<th>SALT I:</th>
                                                    <input type="hidden" name="arreglo[F_000000001_nombre]" value="SALT I:"><br>
                                                    <label for="">Lado Derecho 0% - 18%</label>
                                                    <input type="hidden" name="arreglo[F_000000002_nombre]" value="Lado Derecho 0% - 18%">
                                                    <select class="form-control input-lg " name="arreglo[F_000000002_valor]" id="F_000000002" onchange="calcularAlopecia()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_000000003_valor]" id="F_000000003" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Lado izquierdo 0% - 18%</label>
                                                    <input type="hidden" name="arreglo[F_000000004_nombre]" value="Lado izquierdo 0% - 18%">
                                                    <select class="form-control input-lg " name="arreglo[F_000000004_valor]" id="F_000000004" onchange="calcularAlopecia()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_000000005_valor]" id="F_000000005" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Arriba 0% - 40%</label>
                                                    <input type="hidden" name="arreglo[F_000000006_nombre]" value="Arriba 0% - 40%">
                                                    <select class="form-control input-lg " name="arreglo[F_000000006_valor]" id="F_000000006" onchange="calcularAlopecia()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_000000007_valor]" id="F_000000007" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Atrás 0% - 24%</label>
                                                    <input type="hidden" name="arreglo[F_000000008_nombre]" value="Atrás 0% - 24%">
                                                    <select class="form-control input-lg " name="arreglo[F_000000008_valor]" id="F_000000008" onchange="calcularAlopecia()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_000000009_valor]" id="F_000000009" class="form-control input-lg">
                                                </div>

                                              
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>SALT I: </th>
                                                            <input type="hidden" name="arreglo[F_0000000010_nombre]" value="INDICE VANCOUVER:">
                                                            <td><input type="text" name="arreglo[F_0000000010_valor]" id="F_0000000010" class="form-control input-lg" readonly></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Observaciones: </th>
                                                            <input type="hidden" name="arreglo[F_0000000011_nombre]" value="Observaciones:">
                                                            <td><input type="text" name="arreglo[F_0000000011_valor]" id="F_0000000011" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                	<th>SALT II:</th>
                                                    <input type="hidden" name="arreglo[F_0000000012_nombre]" value="SALT II:"><br>
                                                    <label for="">Lado Derecho 0% - 18%</label>
                                                    <input type="hidden" name="arreglo[F_0000000013_nombre]" value="Lado Derecho 0% - 18%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000013_valor]" id="F_0000000013" onchange="calcularAlopecia1()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_0000000014_valor]" id="F_0000000014" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Lado izquierdo 0% - 18%</label>
                                                    <input type="hidden" name="arreglo[F_0000000015_nombre]" value="Lado izquierdo 0% - 18%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000015_valor]" id="F_0000000015" onchange="calcularAlopecia1()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_0000000016_valor]" id="F_0000000016" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Arriba 0% - 40%</label>
                                                    <input type="hidden" name="arreglo[F_0000000017_nombre]" value="Arriba 0% - 40%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000017_valor]" id="F_0000000017" onchange="calcularAlopecia1()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_0000000018_valor]" id="F_0000000018" class="form-control input-lg">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Atrás 0% - 24%</label>
                                                    <input type="hidden" name="arreglo[F_0000000019_nombre]" value="Atrás 0% - 24%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000019_valor]" id="F_0000000019" onchange="calcularAlopecia1()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("Normal", "Hipopigmentada", "Mixta", "Hiperpigmentada");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59", "60", "61", "62", "63", "64", "65", "66", "67", "68", "69", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80", "81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "91", "92", "93", "94", "95", "96", "97", "98", "99", "100");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="text" name="arreglo[F_0000000020_valor]" id="F_0000000020" class="form-control input-lg">
                                                </div>

                                              
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>SALT II: </th>
                                                            <input type="hidden" name="arreglo[F_0000000021_nombre]" value="INDICE VANCOUVER:">
                                                            <td><input type="text" name="arreglo[F_0000000021_valor]" id="F_0000000021" class="form-control input-lg" readonly></td>
                                                        </tr>

                                                        <tr>
                                                            <th>Observaciones: </th>
                                                            <input type="hidden" name="arreglo[F_0000000022_nombre]" value="Observaciones:">
                                                            <td><input type="text" name="arreglo[F_0000000022_valor]" id="F_0000000022" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_alopecia">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>



                                        <div class="tab-pane" id="tab_9">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_9">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala SCORTEN","Necrolisis Epidermica Tóxica, Sindrome Steven Johnson","Escala que sirve para evaluar el riesgo de mortalidad en paciente con NET o con SSJ","7","0 al 7");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                    <label for="">Edad > 40 años</label>
                                                    <input type="hidden" name="arreglo[F_0000000001_nombre]" value="Edad > 40 años">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000001_valor]" id="F_0000000001" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Frecuencia cardíaca >120 lpm</label>
                                                    <input type="hidden" name="arreglo[F_0000000002_nombre]" value="Frecuencia cardíaca >120 lpm">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000002_valor]" id="F_0000000002" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Presencia de Neoplasia solida o hematológica</label>
                                                    <input type="hidden" name="arreglo[F_0000000003_nombre]" value="Presencia de Neoplasia solida o hematológica">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000003_valor]" id="F_0000000003" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">ASC descamada >10%</label>
                                                    <input type="hidden" name="arreglo[F_0000000004_nombre]" value="ASC descamada >10%">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000004_valor]" id="F_0000000004" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Urea plasmática > 60 mg/dL</label>
                                                    <input type="hidden" name="arreglo[F_0000000005_nombre]" value="Urea plasmática > 60 mg/dL">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000005_valor]" id="F_0000000005" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Bicarbonato plasmático <20 mmol/L</label>
                                                    <input type="hidden" name="arreglo[F_0000000006_nombre]" value="Bicarbonato plasmático <20 mmol/L">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000006_valor]" id="F_0000000006" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Glucemia >252 mg/dL</label>
                                                    <input type="hidden" name="arreglo[F_0000000007_nombre]" value="Glucemia >252 mg/dL">
                                                    <select class="form-control input-lg " name="arreglo[F_0000000007_valor]" id="F_0000000007" onchange="calcularnet()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "1");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                              
 
                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Scorten: </th>
                                                            <input type="hidden" name="arreglo[F_0000000008_nombre]" value="Scorten:">
                                                            <td><input type="text" name="arreglo[F_0000000008_valor]" id="F_0000000008" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Probabilidad de muerte: </th>
                                                            <input type="hidden" name="arreglo[F_0000000009_nombre]" value="Observación:">
                                                            <td><input type="text" name="arreglo[F_0000000009_valor]" id="F_0000000009" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_net">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab_10">
                                            <form action="Historia_ClinicaED_guardar.php" method="post" enctype="multipart/form" id="FormularioHistoriaClinica_10">
                                                <div class="col-md-12">
                                                    <h4>Datos de la escala</h4>
                                                    <table class="table table-bordered table-striped">
                                                        <?php 
                                                        $titulos_escala = array ("Nombre del Score","Condiciones a la que aplica","Definición del Score","Número de variables","Valores esperados");
                                                        $valores_escala = array("Escala Sartorius modificada","Hidradenitis Supurativa","Escala que sirve para evaluar la gravedad de la Hidradenitis Supurativa y realizar seguimiento","6","0 al 7");
                                                        // contar el numero de elementos de la tabla
                                                        $numero_elementos = count($titulos_escala);
                                                        $numero_elementos2 = count($valores_escala);
                                                         // si esta bien el arreglo empezamos
                                                         if ($numero_elementos == $numero_elementos2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero_elementos; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<tr>";
                                                                echo "<th>".$titulos_escala[$i]."</>";
                                                                echo "<td>".$valores_escala[$i]."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </table>
                                                </div>        

                                                <div class="col-md-12">
                                                	<th>Es zona afectada?:</th>
                                                    <input type="hidden" name="arreglo[F_00000000001_nombre]" value="Es zona afectada?:"><br>
                                                    <label for="">Axila derecha </label>
                                                    <input type="hidden" name="arreglo[F_00000000002_nombre]" value="Axila derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000002_valor]" id="F_00000000002" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Axila izquierda </label>
                                                    <input type="hidden" name="arreglo[F_00000000003_nombre]" value="Axila izquierda ">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000003_valor]" id="F_00000000003" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle derecha</label>
                                                    <input type="hidden" name="arreglo[F_00000000004_nombre]" value="Ingle derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000004_valor]" id="F_00000000004" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle izquierda</label>
                                                    <input type="hidden" name="arreglo[F_00000000005_nombre]" value="Ingle izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000005_valor]" id="F_00000000005" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea derecha</label>
                                                    <input type="hidden" name="arreglo[F_00000000006_nombre]" value="Región glútea derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000006_valor]" id="F_00000000006" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea izquierda</label>
                                                    <input type="hidden" name="arreglo[F_00000000007_nombre]" value="Región glútea izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000007_valor]" id="F_00000000007" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Otras localizaciones</label>
                                                    <input type="hidden" name="arreglo[F_00000000008_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_00000000008_valor]" id="F_00000000008" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("0", "3");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        
                                                            <th>Total : </th>
                                                            <input type="hidden" name="arreglo[F_000000000052_nombre]" value="Total:">
                                                            <td><input type="text" name="arreglo[F_000000000052_valor]" id="F_000000000052" class="form-control input-lg" readonly></td>
                                                        </tr>                                                        
                                                    </table>
                                                </div>


                                                <div class="col-md-12">
                                                	<th>Cantidad de nodulos:</th>
                                                    <input type="hidden" name="arreglo[F_00000000009_nombre]" value="Cantidad de fistulas:"><br>
                                                    <label for="">Axila derecha </label>
                                                    <input type="hidden" name="arreglo[F_000000000010_nombre]" value="Axila derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000010_valor]" id="F_000000000010" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Axila izquierda </label>
                                                    <input type="hidden" name="arreglo[F_000000000011_nombre]" value="Axila izquierda ">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000011_valor]" id="F_000000000011" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000012_nombre]" value="Ingle derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000012_valor]" id="F_000000000012" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000013_nombre]" value="Ingle izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000013_valor]" id="F_000000000013" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000014_nombre]" value="Región glútea derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000014_valor]" id="F_000000000014" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000016_nombre]" value="Región glútea izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000016_valor]" id="F_000000000016" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Otras localizaciones</label>
                                                    <input type="hidden" name="arreglo[F_000000000017_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000017_valor]" id="F_000000000017" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>



                                               

                                                <div class="col-md-12">
                                                	<th>Cantidad de fistulas:</th>
                                                    <input type="hidden" name="arreglo[F_000000000018_nombre]" value="Cantidad de fistulas:"><br>
                                                    <label for="">Axila derecha </label>
                                                    <input type="hidden" name="arreglo[F_000000000019_nombre]" value="Axila derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000019_valor]" id="F_000000000019" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Axila izquierda </label>
                                                    <input type="hidden" name="arreglo[F_000000000020_nombre]" value="Axila izquierda ">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000020_valor]" id="F_000000000020" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000021_nombre]" value="Ingle derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000021_valor]" id="F_000000000021" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000022_nombre]" value="Ingle izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000022_valor]" id="F_000000000022" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000023_nombre]" value="Región glútea derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000023_valor]" id="F_000000000023" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000024_nombre]" value="Región glútea izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000024_valor]" id="F_000000000024" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Otras localizaciones</label>
                                                    <input type="hidden" name="arreglo[F_000000000025_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000025_valor]" id="F_000000000025" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                        	<th>Número y gravedad de las lesiones: </th>
                                                            <input type="hidden" name="arreglo[F_000000000044_nombre]" value="Número y gravedad de las lesiones:">
                                                            <th>Axila derecha: </th>
                                                            <input type="hidden" name="arreglo[F_000000000045_nombre]" value="Axila derecha:">
                                                            <td><input type="text" name="arreglo[F_000000000045_valor]" id="F_000000000045" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Axila izquierda : </th>
                                                            <input type="hidden" name="arreglo[F_000000000046_nombre]" value="Axila izquierda:">
                                                            <td><input type="text" name="arreglo[F_000000000046_valor]" id="F_000000000046" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ingle derecha: </th>
                                                            <input type="hidden" name="arreglo[F_000000000047_nombre]" value="Ingle derecha:">
                                                            <td><input type="text" name="arreglo[F_000000000047_valor]" id="F_000000000047" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Ingle izquierda: </th>
                                                            <input type="hidden" name="arreglo[F_000000000048_nombre]" value="Ingle izquierda:">
                                                            <td><input type="text" name="arreglo[F_000000000048_valor]" id="F_000000000048" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Región glútea derecha: </th>
                                                            <input type="hidden" name="arreglo[F_000000000049_nombre]" value="Región glútea derecha:">
                                                            <td><input type="text" name="arreglo[F_000000000049_valor]" id="F_000000000049" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Región glútea izquierda: </th>
                                                            <input type="hidden" name="arreglo[F_000000000050_nombre]" value="Región glútea izquierda:">
                                                            <td><input type="text" name="arreglo[F_000000000050_valor]" id="F_000000000050" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Otras localizaciones: </th>
                                                            <input type="hidden" name="arreglo[F_000000000051_nombre]" value="Otras localizaciones:">
                                                            <td><input type="text" name="arreglo[F_000000000051_valor]" id="F_000000000051" class="form-control input-lg" readonly></td>
                                                        </tr>

                                                        <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Total : </th>
                                                            <input type="hidden" name="arreglo[F_000000000056_nombre]" value="Total:">
                                                            <td><input type="text" name="arreglo[F_000000000056_valor]" id="F_000000000056" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        


                                                <div class="col-md-12">
                                                	<th>Distancia mayor entre 2 lesiones relevantes (o tamaño si la lesión es única):</th>
                                                    <input type="hidden" name="arreglo[F_000000000026_nombre]" value="Distancia mayor entre 2 lesiones relevantes (o tamaño si la lesión es única):"><br>
                                                    <label for="">Axila derecha </label>
                                                    <input type="hidden" name="arreglo[F_000000000027_nombre]" value="Axila derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000027_valor]" id="F_000000000027" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Axila izquierda </label>
                                                    <input type="hidden" name="arreglo[F_000000000028_nombre]" value="Axila izquierda ">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000028_valor]" id="F_000000000028" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000029_nombre]" value="Ingle derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000029_valor]" id="F_000000000029" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000030_nombre]" value="Ingle izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000030_valor]" id="F_000000000030" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000031_nombre]" value="Región glútea derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000031_valor]" id="F_000000000031" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000032_nombre]" value="Región glútea izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000032_valor]" id="F_000000000032" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Otras localizaciones</label>
                                                    <input type="hidden" name="arreglo[F_000000000033_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000033_valor]" id="F_000000000033" onchange="calcularHidradenitis()">
                                                    <option value="0">Seleccione</option>
                                                        <?php
                                                        $titulos = array("<5cm", "5 - 10 cm", ">10 cm");
                                                        $valores = array("1", "3", "9");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Total : </th>
                                                            <input type="hidden" name="arreglo[F_000000000053_nombre]" value="Total:">
                                                            <td><input type="text" name="arreglo[F_000000000053_valor]" id="F_000000000053" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>


                                                 <div class="col-md-12">
                                                	<th>Lesiones claramente separadas por piel normal:</th>
                                                    <input type="hidden" name="arreglo[F_000000000034_nombre]" value="Lesiones claramente separadas por piel normal:"><br>
                                                    <label for="">Axila derecha </label>
                                                    <input type="hidden" name="arreglo[F_000000000035_nombre]" value="Axila derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000035_valor]" id="F_000000000035" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Axila izquierda </label>
                                                    <input type="hidden" name="arreglo[F_000000000036_nombre]" value="Axila izquierda ">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000036_valor]" id="F_000000000036" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000037_nombre]" value="Ingle derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000037_valor]" id="F_000000000037" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Ingle izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000038_nombre]" value="Ingle izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000038_valor]" id="F_000000000038" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea derecha</label>
                                                    <input type="hidden" name="arreglo[F_000000000039_nombre]" value="Región glútea derecha">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000039_valor]" id="F_000000000039" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Región glútea izquierda</label>
                                                    <input type="hidden" name="arreglo[F_000000000040_nombre]" value="Región glútea izquierda">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000040_valor]" id="F_000000000040" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="">Otras localizaciones</label>
                                                    <input type="hidden" name="arreglo[F_000000000041_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000041_valor]" id="F_000000000041" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        $titulos = array("No", "Si");
                                                        $valores = array("9", "0");
                                                        // contar el numero de elementos del array
                                                        $numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i] - $titulos[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Total : </th>
                                                            <input type="hidden" name="arreglo[F_000000000054_nombre]" value="Total:">
                                                            <td><input type="text" name="arreglo[F_000000000054_valor]" id="F_000000000054" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Número de forúnculos durante el último mes</label>
                                                    <input type="hidden" name="arreglo[F_000000000042_nombre]" value="Otras localizaciones">
                                                    <input type="text" name="arreglo[F_000000000042_valor]" id="F_000000000042" class="form-control input-lg">
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="">Dolor de la lesión más sintomática</label>
                                                    <input type="hidden" name="arreglo[F_000000000043_nombre]" value="Otras localizaciones">
                                                    <select class="form-control input-lg " name="arreglo[F_000000000043_valor]" id="F_000000000043" onchange="calcularHidradenitis()">
                                                    <option value="0.">Seleccione</option><!--se agrega el punto paraque funcione correctamente el autoguardado-->
                                                        <?php
                                                        //$titulos = array("No", "Si");
                                                        $valores = array("0","1", "2", "3", "4", "5", "6", "7", "8", "9", "10");
                                                        // contar el numero de elementos del array
                                                        //$numero = count($titulos);
                                                        $numero2 = count($valores);
                                                        // si esta bien el arreglo empezamos
                                                        if ($numero2 == $numero2) {
                                                            // recorremos el arreglo
                                                            for ($i = 0; $i < $numero2; $i++) {
                                                                // imprimimos cada elemento del arreglo
                                                                echo "<option value='$valores[$i]'>$valores[$i]</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>


                                                <div class="col-md-12">
                                                    <table class="table table-bordered table-striped">
                                                        <tr>
                                                            <th>Total : </th>
                                                            <input type="hidden" name="arreglo[F_000000000055_nombre]" value="Total:">
                                                            <td><input type="text" name="arreglo[F_000000000055_valor]" id="F_000000000055" class="form-control input-lg" readonly></td>
                                                        </tr>
                                                    </table>
                                                </div>



                                                <div class="col-md-12">
                                                    <hr>
                                                    <input type="hidden" name="tabla" value="Historia_ClinicaED_hidradentis">
                                                    <input type="hidden" name="arreglo[usuario_id]" value="<?=$ID?>">
                                                    <input type="hidden" name="idusuario" value="<?=$ID?>">
                                                    <input type="hidden" name="arreglo[cliente_id]" value="<?=$clienteId?>">
                                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                                </div>
                                            </form>
                                        </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<?php
include 'footer.php';
?>

<script>
    window.onload = function() {


    }

    function calcularFototipo() {
        var F_01 = parseInt(document.getElementById("F_01").value);
        console .log(F_01);
        var F_02 = parseInt(document.getElementById("F_02").value);
        var F_03 = parseInt(document.getElementById("F_03").value);
        var F_04 = parseInt(document.getElementById("F_04").value);
        var F_05 = parseInt(document.getElementById("F_05").value);
        var F_06 = parseInt(document.getElementById("F_06").value);
        var F_07 = parseInt(document.getElementById("F_07").value);

        var total = F_01 + F_02 + F_03 + F_04 + F_05 + F_06 + F_07;
        console .log(total);

        document.getElementById("F_08").value = total;

        if (total >= 0 && total <= 7) {
            document.getElementById("F_09").value = "Fototipo I";
            document.getElementById("F_10").value = "Muy sensible a la luz solar";
        } else if (total >= 8 && total <= 21) {
            document.getElementById("F_09").value = "Fototipo II";
            document.getElementById("F_10").value = "Sensible a la luz solar";
        } else if (total >= 22 && total <= 42) {
            document.getElementById("F_09").value = "Fototipo III";
            document.getElementById("F_10").value = "Sensibilidad normal a la luz solar";
        } else if (total >= 43 && total <= 68) {
            document.getElementById("F_09").value = "Fototipo IV";
            document.getElementById("F_10").value = "La piel tiene tolerancia a la luz solar 69-84 Fototipo V La piel es oscura y su tolerancia es alta";
        } else if (total >= 68 && total <= 84) {
            document.getElementById("F_09").value = "Fototipo V";
            document.getElementById("F_10").value = "La piel es oscura y su tolerancia es alta";
        } else if (total >= 85) {
            document.getElementById("F_09").value = "Fototipo VI";
            document.getElementById("F_10").value = "La piel es negra y su tolerancia es altísima";
        }


    }


    function calcularDermatitis() {
        var F_001 = document.getElementById("F_001").value;
        var F_002 = document.getElementById("F_002").value;
        var F_003 = document.getElementById("F_003").value;
        var F_004 = document.getElementById("F_004").value;
        var F_005 = document.getElementById("F_005").value;
        var F_006 = document.getElementById("F_006").value;
        var F_007 = document.getElementById("F_007").value;
        var F_008 = document.getElementById("F_008").value;
        var F_009 = document.getElementById("F_009").value;
        var F_0010 = document.getElementById("F_0010").value;
       

        var total1 = parseFloat(F_001) + parseFloat(F_002) + parseFloat(F_003) + parseFloat(F_004) + parseFloat(F_005) + parseFloat(F_006) + parseFloat(F_007) + parseFloat(F_008) + parseFloat(F_009) + parseFloat(F_0010);
        console .log(total1);

        document.getElementById("F_0019").value = total1/5;

        var F_0011 = parseFloat(document.getElementById("F_0011").value);
        var F_0012 = parseFloat(document.getElementById("F_0012").value);
        var F_0013 = parseFloat(document.getElementById("F_0013").value);
        var F_0014 = parseFloat(document.getElementById("F_0014").value);
        var F_0015 = parseFloat(document.getElementById("F_0015").value);
        var F_0016 = parseFloat(document.getElementById("F_0016").value);

        var total2 = F_0011 + F_0012 + F_0013 + F_0014 + F_0015 + F_0016;
        console .log(total2);

        document.getElementById("F_0020").value =(total2)*7/2;

         var F_0017 = parseFloat(document.getElementById("F_0017").value);
        var F_0018 = parseFloat(document.getElementById("F_0018").value);

        var total3 = F_0017 + F_0018;
        console .log(total3);

        document.getElementById("F_0021").value =total3;


        var F_0019 = parseFloat(document.getElementById("F_0019").value);
        var F_0020 = parseFloat(document.getElementById("F_0020").value);
        var F_0021 = parseFloat(document.getElementById("F_0021").value);

        var total4 = F_0019 + F_0020 + F_0021;
        console .log(total4);

        document.getElementById("F_0022").value =total4;

        if (total4 >= 0 && total4 <= 14) {
            document.getElementById("F_0023").value = "Dermatitis atópica leve";
        } else if (total4 >= 15 && total4 <= 40) {
            document.getElementById("F_0023").value = "Dermatitis atópica moderada";
        } else if (total4 >= 41) {
            document.getElementById("F_0023").value = "Dermatitis atópica severa";
        } 


    }


     function calcularCalidad() {
        var F_0001 = document.getElementById("F_0001").value;
        var F_0002 = document.getElementById("F_0002").value;
        var F_0003 = document.getElementById("F_0003").value;
        var F_0004 = document.getElementById("F_0004").value;
        var F_0005 = document.getElementById("F_0005").value;
        var F_0006 = document.getElementById("F_0006").value;
        var F_0007 = document.getElementById("F_0007").value;
        var F_0008 = document.getElementById("F_0008").value;
        var F_0009 = document.getElementById("F_0009").value;
        var F_00010 = document.getElementById("F_00010").value;
       

        var total1 = parseFloat(F_0001) + parseFloat(F_0002) + parseFloat(F_0003) + parseFloat(F_0004) + parseFloat(F_0005) + parseFloat(F_0006) + parseFloat(F_0007) + parseFloat(F_0008) + parseFloat(F_0009) + parseFloat(F_00010);
        console .log(total1);

        document.getElementById("F_00011").value = total1;

        if (total1 >= 0 && total1 <= 1) {
            document.getElementById("F_00012").value = "No afectación";
        } else if (total1 >= 2 && total1 <= 5) {
            document.getElementById("F_00012").value = "Insignificante";
        } else if (total1 >= 6 && total1 <= 10) {
            document.getElementById("F_00012").value = "Moderada";
        } else if (total1 >= 11 && total1 <= 20) {
            document.getElementById("F_00012").value = "Considerable";
        } else if (total1 >= 21 && total1 <= 30) {
            document.getElementById("F_00012").value = "Considerable";
        } 

    }


    function calcularHirsutismo() {
        var F_00001 = document.getElementById("F_00001").value;
        var F_00002 = document.getElementById("F_00002").value;
        var F_00003 = document.getElementById("F_00003").value;
        var F_00004 = document.getElementById("F_00004").value;
        var F_00005 = document.getElementById("F_00005").value;
        var F_00006 = document.getElementById("F_00006").value;
        var F_00007 = document.getElementById("F_00007").value;
        var F_00008 = document.getElementById("F_00008").value;
        var F_00009 = document.getElementById("F_00009").value;
        var F_000010 = document.getElementById("F_000010").value;
        var F_000011 = document.getElementById("F_000011").value;
       

        var total1 = parseFloat(F_00001) + parseFloat(F_00002) + parseFloat(F_00003) + parseFloat(F_00004) + parseFloat(F_00005) + parseFloat(F_00006) + parseFloat(F_00007) + parseFloat(F_00008) + parseFloat(F_00009) + parseFloat(F_000010) +  parseFloat(F_000011);
        console .log(total1);

        document.getElementById("F_000012").value = total1;

        if (total1 >= 0 && total1 <= 7) {
            document.getElementById("F_000013").value = "No patológico";
        } else if (total1 >= 8 && total1 <= 11) {
            document.getElementById("F_000013").value = "Hirsutismo leve";
        } else if (total1 >= 12 && total1 <= 19) {
            document.getElementById("F_000013").value = "Hirsutismo moderado";
        } else if (total1 >= 21) {
            document.getElementById("F_000013").value = "Hirsutismo grave";
        } 

    }


    function calcularPsoriasis() {
        var F_000007 = document.getElementById("F_000007").value;
        var F_0000012 = document.getElementById("F_0000012").value;
        var F_0000017 = document.getElementById("F_0000017").value;

        var total1 = parseFloat(F_000007) + parseFloat(F_0000012) + parseFloat(F_0000017);
        console .log(total1);

        document.getElementById("F_0000021").value = total1*0.1;


        var F_000008 = document.getElementById("F_000008").value;
        var F_0000013 = document.getElementById("F_0000013").value;
        var F_0000018 = document.getElementById("F_0000018").value;

        var total1 = parseFloat(F_000008) + parseFloat(F_0000013) + parseFloat(F_0000018);
        console .log(total1);

        document.getElementById("F_0000022").value = total1*0.2;


        var F_000009 = document.getElementById("F_000009").value;
        var F_0000014 = document.getElementById("F_0000014").value;
        var F_0000019 = document.getElementById("F_0000019").value;

        var total1 = parseFloat(F_000009) + parseFloat(F_0000014) + parseFloat(F_0000019);
        console .log(total1);

        document.getElementById("F_0000023").value = total1*0.3;


        var F_0000010 = document.getElementById("F_0000010").value;
        var F_0000015 = document.getElementById("F_0000015").value;
        var F_0000020 = document.getElementById("F_0000020").value;

        var total1 = parseFloat(F_0000010) + parseFloat(F_0000015) + parseFloat(F_0000020);
        console .log(total1);

        document.getElementById("F_0000024").value = total1*0.4;


        var F_0000021 = document.getElementById("F_0000021").value;
        var F_000002 = document.getElementById("F_000002").value;

        var total1 = parseFloat(F_0000021) * parseFloat(F_000002);
        console .log(total1);

        document.getElementById("F_0000025").value = total1;

        var F_0000022 = document.getElementById("F_0000022").value;
        var F_000003 = document.getElementById("F_000003").value;

        var total1 = parseFloat(F_0000022) * parseFloat(F_000003);
        console .log(total1);

        document.getElementById("F_0000026").value = total1;

        var F_0000023 = document.getElementById("F_0000023").value;
        var F_000004 = document.getElementById("F_000004").value;

        var total1 = parseFloat(F_0000023) * parseFloat(F_000004);
        console .log(total1);

        document.getElementById("F_0000027").value = total1;

        var F_0000024 = document.getElementById("F_0000024").value;
        var F_000005 = document.getElementById("F_000005").value;

        var total1 = parseFloat(F_0000024) * parseFloat(F_000005);
        console .log(total1);

        document.getElementById("F_0000028").value = total1;

        var F_0000025 = document.getElementById("F_0000025").value;
        var F_0000026 = document.getElementById("F_0000026").value;
        var F_0000027 = document.getElementById("F_0000027").value;
        var F_0000028 = document.getElementById("F_0000028").value;

        var total1 = parseFloat(F_0000025) + parseFloat(F_0000026)+ parseFloat(F_0000027) + parseFloat(F_0000028);
        console .log(total1);

        document.getElementById("F_0000029").value = total1;

        if (total1 >= 0 && total1 <= 5) {
            document.getElementById("F_0000030").value = "Leve";
        } else if (total1 >= 5.1 && total1 <= 10) {
            document.getElementById("F_0000030").value = "Moderada";

        } else if (total1 >= 10.1) {
            document.getElementById("F_0000030").value = "Grave";
        } 

    }



    function calcularMelasma() {

        var F_0000002 = document.getElementById("F_0000002").value;
        var F_0000007 = document.getElementById("F_0000007").value;


         var total1 = parseInt(F_0000002) * parseInt(F_0000007);
        console .log(total1);

        document.getElementById("F_00000012").value = total1*0.3;



        var F_0000003 = document.getElementById("F_0000003").value;
        var F_0000008 = document.getElementById("F_0000008").value;

        var total1 = parseFloat(F_0000003) * parseFloat(F_0000008);
        console .log(total1);

        document.getElementById("F_00000013").value = total1*0.3;

        var F_0000004 = document.getElementById("F_0000004").value;
        var F_0000009 = document.getElementById("F_0000009").value;


        var total1 = parseFloat(F_0000004) * parseFloat(F_0000009);
        console .log(total1);

        document.getElementById("F_00000014").value = total1*0.3;


        var F_0000005 = document.getElementById("F_0000005").value;
        var F_00000010 = document.getElementById("F_00000010").value;
       

        var total1 = parseFloat(F_0000005) * parseFloat(F_00000010);
        console .log(total1);

        document.getElementById("F_00000015").value = total1*0.1;


        var F_00000012 = document.getElementById("F_00000012").value;
        var F_00000013 = document.getElementById("F_00000013").value;
        var F_00000014 = document.getElementById("F_00000014").value;
        var F_00000015 = document.getElementById("F_00000015").value;
       

        var total1 = parseFloat(F_00000012) + parseFloat(F_00000013) + parseFloat(F_00000014) + parseFloat(F_00000015);
        console .log(total1);

        document.getElementById("F_00000016").value = total1;

        if (total1 == 0) {
            document.getElementById("F_00000017").value = "Ausente";
        } else if (total1 >= 1 && total1 <= 6) {
            document.getElementById("F_00000017").value = "Leve";
        } else if (total1 >= 7 && total1 <= 15) {
            document.getElementById("F_00000017").value = "Moderado";
        } else if (total1 >= 21 && total1 <= 24) {
            document.getElementById("F_00000017").value = "Severo";
        } 

    }


    function calcularCicatrices() {
        var F_00000001 = parseInt(document.getElementById("F_00000001").value);
        var F_00000002 = parseInt(document.getElementById("F_00000002").value);
        var F_00000003 = parseInt(document.getElementById("F_00000003").value);
        var F_00000004 = parseInt(document.getElementById("F_00000004").value);
        

        var total = F_00000001 + F_00000002 + F_00000003 + F_00000004;
        console .log(total);

        document.getElementById("F_00000005").value = total;

        


    }

    function calcularAlopecia() {
        var F_000000002 = parseInt(document.getElementById("F_000000002").value);
        

        var total = F_000000002 * 0.18;
        console .log(total);

        document.getElementById("F_000000003").value = total;


        var F_000000004 = parseInt(document.getElementById("F_000000004").value);
        

        var total = F_000000004 * 0.18;
        console .log(total);

        document.getElementById("F_000000005").value = total;


        var F_000000006 = parseInt(document.getElementById("F_000000006").value);
        

        var total = F_000000006 * 0.4;
        console .log(total);

        document.getElementById("F_000000007").value = total;


        var F_000000008 = parseInt(document.getElementById("F_000000008").value);
        

        var total = F_000000008 * 0.24;
        console .log(total);

        document.getElementById("F_000000009").value = total;


        var F_000000003 = (document.getElementById("F_000000003").value);
        var F_000000005 = (document.getElementById("F_000000005").value);
        var F_000000007 = (document.getElementById("F_000000007").value);
        var F_000000009 = (document.getElementById("F_000000009").value);
        

        var total = parseFloat(F_000000003) + parseFloat(F_000000005) + parseFloat(F_000000007) + parseFloat(F_000000009);

        document.getElementById("F_0000000010").value = total;


        if (total == 0) {
            document.getElementById("F_0000000011").value = "S0";
        } else if (total >= 1 && total <= 24) {
            document.getElementById("F_0000000011").value = "S1";
        } else if (total >= 25 && total <= 49) {
            document.getElementById("F_0000000011").value = "S2";
        } else if (total >= 50 && total <= 74) {
            document.getElementById("F_0000000011").value = "S3";
        }
        else if (total >= 75 && total <= 99) {
            document.getElementById("F_0000000011").value = "S4";
        }
        else if (total >= 100) {
            document.getElementById("F_0000000011").value = "S5";
        }

        


    }


    function calcularAlopecia1() {
        var F_0000000013 = parseInt(document.getElementById("F_0000000013").value);
        

        var total = F_0000000013 * 0.18;
        console .log(total);

        document.getElementById("F_0000000014").value = total;


        var F_0000000015 = parseInt(document.getElementById("F_0000000015").value);
        

        var total = F_0000000015 * 0.18;
        console .log(total);

        document.getElementById("F_0000000016").value = total;


        var F_0000000017 = parseInt(document.getElementById("F_0000000017").value);
        

        var total = F_0000000017 * 0.4;
        console .log(total);

        document.getElementById("F_0000000018").value = total;


        var F_0000000019 = parseInt(document.getElementById("F_0000000019").value);
        

        var total = F_0000000019 * 0.24;
        console .log(total);

        document.getElementById("F_0000000020").value = total;


        var F_0000000014 = (document.getElementById("F_0000000014").value);
        var F_0000000016 = (document.getElementById("F_0000000016").value);
        var F_0000000018 = (document.getElementById("F_0000000018").value);
        var F_0000000020 = (document.getElementById("F_0000000020").value);
        

        var total = parseFloat(F_0000000014) + parseFloat(F_0000000016) + parseFloat(F_0000000018) + parseFloat(F_0000000020);

        document.getElementById("F_0000000021").value = total;


        if (total == 0) {
            document.getElementById("F_0000000022").value = "S0";
        } else if (total >= 1 && total <= 24) {
            document.getElementById("F_0000000022").value = "S1";
        } else if (total >= 25 && total <= 49) {
            document.getElementById("F_0000000022").value = "S2";
        } else if (total >= 50 && total <= 74) {
            document.getElementById("F_0000000022").value = "S3";
        }
        else if (total >= 75 && total <= 99) {
            document.getElementById("F_0000000022").value = "S4";
        }
        else if (total >= 100) {
            document.getElementById("F_0000000022").value = "S5";
        }

        


    }


    function calcularnet() {
        var F_0000000001 = parseInt(document.getElementById("F_0000000001").value);
        var F_0000000002 = parseInt(document.getElementById("F_0000000002").value);
        var F_0000000003 = parseInt(document.getElementById("F_0000000003").value);
        var F_0000000004 = parseInt(document.getElementById("F_0000000004").value);
        var F_0000000005 = parseInt(document.getElementById("F_0000000005").value);
        var F_0000000006 = parseInt(document.getElementById("F_0000000006").value);
        var F_0000000007 = parseInt(document.getElementById("F_0000000007").value);

        var total = F_0000000001 + F_0000000002 + F_0000000003 + F_0000000004 + F_0000000005 + F_0000000006 + F_0000000007;
        console .log(total);

        document.getElementById("F_0000000008").value = total;

        if (total == 0) {
            document.getElementById("F_0000000009").value = "1,16%";
        } else if (total ==1 ) {
            document.getElementById("F_0000000009").value = "3,88%";
        } else if (total == 2) {
            document.getElementById("F_0000000009").value = "12,2%";
        } else if (total == 3) {
            document.getElementById("F_0000000009").value = "32,37%";
        } else if (total == 4) {
            document.getElementById("F_0000000009").value = "62,25%";
        } else if (total == 5) {
            document.getElementById("F_0000000009").value = "85,03%";
        }
        else if (total == 6) {
            document.getElementById("F_0000000009").value = "95,14%";
        }
        else if (total == 7) {
            document.getElementById("F_0000000009").value = "98,54%";
        }


    }

    function calcularHidradenitis() {
        var F_000000000010 = parseInt(document.getElementById("F_000000000010").value);
        var F_000000000019 = parseInt(document.getElementById("F_000000000019").value);
        
        var total = (F_000000000010*1) + (F_000000000019*6);
        console .log(total);

        document.getElementById("F_000000000045").value = total;


        var F_000000000011 = parseInt(document.getElementById("F_000000000011").value);
        var F_000000000020 = parseInt(document.getElementById("F_000000000020").value);
        
        var total = (F_000000000011*1) + (F_000000000020*6);
        console .log(total);

        document.getElementById("F_000000000046").value = total;


        var F_000000000012 = parseInt(document.getElementById("F_000000000012").value);
        var F_000000000021 = parseInt(document.getElementById("F_000000000021").value);
        
        var total = (F_000000000012*1) + (F_000000000021*6);
        console .log(total);

        document.getElementById("F_000000000047").value = total;


        var F_000000000013 = parseInt(document.getElementById("F_000000000013").value);
        var F_000000000022 = parseInt(document.getElementById("F_000000000022").value);
        
        var total = (F_000000000013*1) + (F_000000000022*6);
        console .log(total);

        document.getElementById("F_000000000048").value = total;

        var F_000000000014 = parseInt(document.getElementById("F_000000000014").value);
        var F_000000000023 = parseInt(document.getElementById("F_000000000023").value);
        
        var total = (F_000000000014*1) + (F_000000000023*6);
        console .log(total);

        document.getElementById("F_000000000049").value = total;

        var F_000000000016 = parseInt(document.getElementById("F_000000000016").value);
        var F_000000000024 = parseInt(document.getElementById("F_000000000024").value);
        
        var total = (F_000000000016*1) + (F_000000000024*6);
        console .log(total);

        document.getElementById("F_000000000050").value = total;

        var F_000000000017 = parseInt(document.getElementById("F_000000000017").value);
        var F_000000000025 = parseInt(document.getElementById("F_000000000025").value);
        
        var total = (F_000000000017*1) + (F_000000000025*6);
        console .log(total);

        document.getElementById("F_000000000051").value = total;


        var F_000000000045 = parseInt(document.getElementById("F_000000000045").value);
        var F_000000000046 = parseInt(document.getElementById("F_000000000046").value);
        var F_000000000047 = parseInt(document.getElementById("F_000000000047").value);
        var F_000000000048 = parseInt(document.getElementById("F_000000000048").value);
        var F_000000000049 = parseInt(document.getElementById("F_000000000049").value);
        var F_000000000050 = parseInt(document.getElementById("F_000000000050").value);
        var F_000000000051 = parseInt(document.getElementById("F_000000000051").value);
        
        var total = F_000000000045 + F_000000000046 + F_000000000047 + F_000000000048 + F_000000000049 + F_000000000050 + F_000000000051;
        console .log(total);

        document.getElementById("F_000000000056").value = total;


        var F_00000000002 = parseInt(document.getElementById("F_00000000002").value);
        var F_00000000003 = parseInt(document.getElementById("F_00000000003").value);
        var F_00000000004 = parseInt(document.getElementById("F_00000000004").value);
        var F_00000000005 = parseInt(document.getElementById("F_00000000005").value);
        var F_00000000006 = parseInt(document.getElementById("F_00000000006").value);
        var F_00000000007 = parseInt(document.getElementById("F_00000000007").value);
        var F_00000000008 = parseInt(document.getElementById("F_00000000008").value);
        
        var total = F_00000000002 + F_00000000003 + F_00000000004 + F_00000000005 + F_00000000006 + F_00000000007 + F_00000000008;
        console .log(total);

        document.getElementById("F_000000000052").value = total;


        var F_000000000027 = parseInt(document.getElementById("F_000000000027").value);
        var F_000000000028 = parseInt(document.getElementById("F_000000000028").value);
        var F_000000000029 = parseInt(document.getElementById("F_000000000029").value);
        var F_000000000030 = parseInt(document.getElementById("F_000000000030").value);
        var F_000000000031 = parseInt(document.getElementById("F_000000000031").value);
        var F_000000000032 = parseInt(document.getElementById("F_000000000032").value);
        var F_000000000033 = parseInt(document.getElementById("F_000000000033").value);
        
        var total = F_000000000027 + F_000000000028 + F_000000000029 + F_000000000030 + F_000000000031 + F_000000000032 + F_000000000033;
        console .log(total);

        document.getElementById("F_000000000053").value = total;


        var F_000000000035 = parseInt(document.getElementById("F_000000000035").value);
        var F_000000000036 = parseInt(document.getElementById("F_000000000036").value);
        var F_000000000037 = parseInt(document.getElementById("F_000000000037").value);
        var F_000000000038 = parseInt(document.getElementById("F_000000000038").value);
        var F_000000000039 = parseInt(document.getElementById("F_000000000039").value);
        var F_000000000040 = parseInt(document.getElementById("F_000000000040").value);
        var F_000000000041 = parseInt(document.getElementById("F_000000000041").value);
        
        var total = F_000000000035 + F_000000000036 + F_000000000037 + F_000000000038 + F_000000000039 + F_000000000040 + F_000000000041;
        console .log(total);

        document.getElementById("F_000000000054").value = total;



        var F_000000000056 = parseInt(document.getElementById("F_000000000056").value);
        var F_000000000052 = parseInt(document.getElementById("F_000000000052").value);
        var F_000000000053 = parseInt(document.getElementById("F_000000000053").value);
        var F_000000000054 = parseInt(document.getElementById("F_000000000054").value);
        var F_000000000042 = parseInt(document.getElementById("F_000000000042").value);
        var F_000000000043 = parseInt(document.getElementById("F_000000000043").value);
        
        
        var total = F_000000000056 + F_000000000052 + F_000000000053 + F_000000000054 + F_000000000042 + F_000000000043;
        console .log(total);

        document.getElementById("F_000000000055").value = total;

        

    }

        

</script>


<script src="plugins/LottieK/lottie.min.js"></script>
<?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "Historia_ClinicaED";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";

$HistoriasClinicasAutoguardado_id='"FormularioHistoriaClinica_1", "FormularioHistoriaClinica_2", "FormularioHistoriaClinica_3","FormularioHistoriaClinica_4","FormularioHistoriaClinica_5","FormularioHistoriaClinica_6","FormularioHistoriaClinica_7","FormularioHistoriaClinica_8","FormularioHistoriaClinica_9","FormularioHistoriaClinica_10"';//importante para las historias multiples, mantener estructura de comillas simples y dobles
include 'AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Historia_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado

?>
    