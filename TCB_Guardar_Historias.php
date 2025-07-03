<?php  
include "funciones/conn3.php";
include "funciones/funciones.php";

if (isset($_POST['key'])) {
    $tablas = [
        0 => "HT_OndasChoque",
        1 => "HT_OndasChoqueBilateral",
        2 => "sesionesAplicadas",
        3 => "evolucionesTratamiento"
    ];
    
    if ($_POST['tipoHistoria'] <= 2) {
        function removeEmptyElements(&$element)
        {
            if (is_array($element)) {
                if ($key = key($element)) {
                    $element[$key] = array_filter($element);
                }
    
                if (count($element) != count($element, COUNT_RECURSIVE)) {
                    $element = array_filter(current($element), __FUNCTION__);
                }
    
                $element = array_filter($element);
    
                return $element;
            } else {
                return empty($element) ? false : $element;
            }
        }
    
        $incapacidades_arreglo = json_decode($_POST['Arreglo_Incapacidades'], true);
        foreach (array_filter($incapacidades_arreglo, 'removeEmptyElements') as $key => $value) {
            $Incapacidades .= '<b>Incapacidades #' . $key . '</b>:<br>';
            foreach ($value as $key1 => $value1) {
                $Incapacidades .= $key1 . " : " . $value1 . '<br>';
            }
        }

        $_POST['incapacidades'] = $Incapacidades;
        
        if ($_POST['citaAgendada']['agendarCita'] == 1) {
            include "./agendarCitasInclude.php";
            if ($_POST['citaAgendada']['confirmaAgenda']) {
                $_POST['idCitas'] = $_POST['citaAgendada']['idCita'];
                $_POST['citaAgendada'] = json_encode($_POST['citaAgendada']);
            }
        }

        $_POST['finalidad'] = json_encode($_POST['finalidad']);
        $_POST['ambitoRealizacion'] = json_encode($_POST['ambitoRealizacion']);
        $_POST['personaAtiende'] = json_encode($_POST['personaAtiende']);
        $_POST['realizacionActoQuirurgico'] = json_encode($_POST['realizacionActoQuirurgico']);
        $_POST["opcion1"] = !empty($_POST["opcion1"]) ? $_POST["opcion1"] : '';
        $_POST["opcion2"] = !empty($_POST["opcion2"]) ? $_POST["opcion2"] : '';
        $_POST["opcion3"] = !empty($_POST["opcion3"]) ? $_POST["opcion3"] : '';
        $_POST["opcion4"] = !empty($_POST["opcion4"]) ? $_POST["opcion4"] : '';
        $_POST["opcion5"] = !empty($_POST["opcion5"]) ? $_POST["opcion5"] : '';
        $_POST["opcion6"] = !empty($_POST["opcion6"]) ? $_POST["opcion6"] : '';
        $_POST["opcion7"] = !empty($_POST["opcion7"]) ? $_POST["opcion7"] : '';

        foreach ($_POST['Imagenologia_Examen'] as $key => $value) {
            $Imagenologia_Examen .= $value . ',';
        }
        $_POST['Imagenologia_Examen_array'] = json_encode($_POST['Imagenologia_Examen']);
        $_POST['Imagenologia_Examen'] = $Imagenologia_Examen;
        //echo $Imagenologia_Examen.'<br>';

        foreach ($_POST['Laboratorio_Examenes'] as $key => $value) {
            $Laboratorio_Examenes .= $value . ',';
        }
        $_POST['Laboratorio_Examenes_array'] = json_encode($_POST['Laboratorio_Examenes']);
        $_POST['Laboratorio_Examenes'] = $Laboratorio_Examenes;
        //echo $Laboratorio_Examenes.'<br>';
    }

    

    if ($_POST['key'] == "insert") {
        $idusuario = $_POST['usuario_id'];
        $tabla = $tablas[$_POST['tipoHistoria']];
        $prepare = preparePost($_POST, ['key', 'tipoHistoria', 'tabla_incapacidades_length']);

$queryAuditor = "INSERT INTO {$tabla} SET {$prepare}";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);
//exit();

        $insert = mysqli_query($conn3, "INSERT INTO {$tabla} SET {$prepare}") or die(mysqli_error($conn3));
        if ($insert) {
            $idHistoria = mysqli_insert_id($conn3);
            if ($_POST['tipoHistoria'] == 2) {
                $tabla = $tablas[$_POST['historia_tipo']];
                $historia = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$_POST['historia_id']}'") or die(mysqli_error($conn3));
                if (!empty(mysqli_num_rows($historia))) {
                    $historia = mysqli_fetch_assoc($historia);
                    if ($historia['numeroSesiones'] == $_POST['sesion']) {
                        $update = mysqli_query($conn3, "UPDATE {$tabla} SET activo = 0 WHERE id = '{$_POST['historia_id']}'") or die(mysqli_error($conn3));
                    }
                }
            }

                //////////////////? AUTOGUARDADO/////////////////
                if($_POST['Ruta_Historia_AutoGuardado']!=""){
                    $Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];
                    $cliente_id = $_POST['cliente_id'];
                    $usuario_id = $_POST['usuario_id'];
                    $query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
                    mysqli_query($conn3, $query);
                }
                //////////////////? AUTOGUARDADO/////////////////

            echo "<script type='text/javascript'>window.location.href='TCB_Finalizado_Historias?id={$idHistoria}&tipoHistoria={$_POST['tipoHistoria']}'</script>";
        }
    }
    if ($_POST['key'] == "update") {
        $tabla = $tablas[$_POST['tipoHistoria']];
        $prepare = preparePost($_POST, ['key', 'tipoHistoria', 'tabla_incapacidades_length']);
        $prepareWhere = preparePost(["id" => $_POST['id']]);
        $update = mysqli_query($conn3, "UPDATE {$tabla} SET {$prepare} WHERE {$prepareWhere}") or die(mysqli_error($conn3));
        if ($update) {

            //////////////////? AUTOGUARDADO/////////////////
            if($_POST['Ruta_Historia_AutoGuardado']!=""){
                $Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];
                $cliente_id = $_POST['cliente_id'];
                $usuario_id = $_POST['usuario_id'];
                $query = "UPDATE AutoGuardado SET Estado='0' WHERE cliente_id = '$cliente_id' and usuario_id = '$usuario_id' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
                mysqli_query($conn3, $query);
            }
            //////////////////? AUTOGUARDADO/////////////////
            
            echo "<script type='text/javascript'>window.location.href='TCB_Finalizado_Historias?id={$_POST['id']}&tipoHistoria={$_POST['tipoHistoria']}'</script>";
        }
    }
}

exit();
?>