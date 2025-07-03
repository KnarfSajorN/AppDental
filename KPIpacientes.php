<?php
include 'header.php';
include 'menu.php';
?>

<style>
    .content-wrapper {
        background: white;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!--100vh para que quede bien el footer-->
    <!-- Content Header (Page header) -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>

        </ol>
    </section>
    <br>
    <br>
    <style type="text/css">
        .content-wrapper {
            min-height: 100% !important;
        }
    </style>

    <?php /*foreach ($_SESSION as $key => $value) {
echo $key.':'.$value;
}*/
    ?>

    <div align="center">
        <div class="col-md-12">
            <div class="form-group">
                <!-- /.form-group -->
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Fecha de Consulta</th>
                                <th>CIE_10</th>
                                <th>2.CIE_10</th>
                                <th>3.CIE_10</th>
                                <th>4.CIE_10</th>
                                <th>Recetas</th>
                                <th>Exámenes Imagenologia</th>
                                <th>Exámenes Laboratorio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $ID = $_SESSION['ID'];
                            $clienteId = $_GET['clienteId'];

                            $arrayDatos = [];

                            $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");

                            $totalRegistrosFila12 = 0; // Variable para mantener el conteo de registros en la fila 12
                            $totalRegistrosFila13 = 0; // Variable para mantener el conteo de registros en la fila 12

                            while ($fila = mysqli_fetch_array($resultado)) {
                                $Numero++;
                                $fecha_Consulta = $fila['fecha'];
                                $totalRecetas = funcionMaster($fila['receta_id'], 'receta_id', 'COUNT(*)', 'RM_Recetario');
                                // $nombreIMG = funcionMaster($fila['Imagenologia_Examen'], 'id','Nombre', 'examenes_historia');
                                $totalMet = 0;

                                if (!empty($fila[27])) {
                                    $totalMet++;
                                }

                                if (!empty($fila[28])) {
                                    $totalMet++;
                                }

                                if (!empty($fila[29])) {
                                    $totalMet++;
                                }

                                if (!empty($fila[30])) {
                                    $totalMet++;
                                }

                                if (!empty($fila[12])) {
                                    $registrosFila12 = explode(',', $fila[12]); // Divide la cadena en un arreglo utilizando la coma como separador
                                    
                                    // Filtrar registros no vacíos
                                    $registrosNoVaciosFila12 = array_filter($registrosFila12, function($valor) {
                                        return !empty($valor);
                                    });
                                    
                                    $totalRegistrosFila12 = count($registrosNoVaciosFila12); // Obtener la cantidad de registros no vacíos en la fila 12
                                    
                                    
                                }
                                if (!empty($fila[13])) {
                                    $registrosFila13 = explode(',', $fila[13]); // Divide la cadena en un arreglo utilizando la coma como separador
                                    
                                    // Filtrar registros no vacíos
                                    $registrosNoVaciosFila13 = array_filter($registrosFila13, function($valor) {
                                        return !empty($valor);
                                    });
                                    
                                    $totalRegistrosFila13 = count($registrosNoVaciosFila13); // Obtener la cantidad de registros no vacíos en la fila 12
                                    
                                    
                                }
                                


                                echo '<tr>
                                <td width="5%">' . $Numero . '</td>
                                <td width="13%"><div align="Right">' . $fecha_Consulta . '</div></td>
                                <td width="13%"><div align="Right">' . $fila[27] . '</div></td>
                                <td width="13%"><div align="Right">' . $fila[28] . '</div></td>
                                <td width="13%"><div align="Right">' . $fila[29] . '</div></td>
                                <td width="13%"><div align="Right">' . $fila[30] . '</div></td>
                                <td width="13%"><div align="Right">' . $fila[31] . '</div></td>
                                <td width="5%">' . $fila[12] . '</td>
                                <td width="5%">' . $fila[13] . '</td>
                                </tr>';
                                // echo $totalRegistrosFila13; // Muestra la cantidad de registros no vacíos en la fila 12
                                // array_push($arrayDatos, [$Numero . 'Diagnósticos:' . $totalMet. 'Receta:'. $totalRecetas. 'Exámenes Img:'. $totalRegistrosFila12. 'Exámenes Lab:', $totalRegistrosFila13]);
                                array_push($arrayDatos, [
                                    "Número de HC: " .$Numero.  " -Diagnósticos: " . $totalMet. ' -Recetas:' . $totalRecetas,$Numero]);
                            }

                          
                            ?>




                        </tbody>
                    </table>
                </div>

                <?php
                $_GET['n'] = 1;
                $_GET['nombre'] = 'Gráfica KPI';
                $_GET['datos'] = json_encode($arrayDatos);
                ?>
                <?php include 'generarGrafica.php' ?>


            </div>
        </div>
        <br>
    </div>
    <!-- /.content -->

    <!-- /.content-wrapper -->


    <?php
    include("footer.php");
    include("ajaxCreadorSelect.php");
    function Encriptar($valor)
    {
        $Sc = base64_decode("keyMaster");
        $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
        return $Texto;
    }
    // El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
    // selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
    // selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
    // name: nombre de la tabla al cual se hara la consulta SQL
    // value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
    // value se separara con | en el value del option
    // text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
    // text se separara con • en el texto del option
    // likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
    // order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
    // clausula: este objeto contendra dos objetos, 
    // data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
    // value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
    // ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
    // carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
    // campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
    // El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
    ?>