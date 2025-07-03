<?php
include 'funciones/funciones.php';
$Nombre_Campo = '';
$Valor_Campo = '';
$arreglo = $_POST['arreglo'];

$tabla = $_POST['tabla'];

$idusuario = $_POST['idusuario'];

// verificamos que la tabla existe 
$sql = "SELECT * FROM $tabla LIMIT 1";
$resultado = mysqli_query($conn3, $sql);
if (mysqli_num_rows($resultado) == 0) {
    // si no existe la creamos con un id primary key , usuario_id, cliente_id, fecha 
    $sql = "CREATE TABLE $tabla (
        id int not null AUTO_INCREMENT, 
        usuario_id int null default 0,
        cliente_id int null default 0,
        fecha timestamp default current_timestamp,
        PRIMARY KEY (id)
        )";
    mysqli_query($conn3, $sql);
} else {
    // existe
}



// post
foreach ($arreglo as $key => $value) {
  // para el insert final
  $Nombre_Campo .= "{$key},";
  $Valor_Campo .= "'{$value}',";
  // echo '<hr>' . $key . ' - ' . $value;
  $Update_campo .= "{$key} = '{$value}',";
  $Insert_campo .= "{$key},";
  $Insert_valor .= "'{$value}',";



  // verificar si existe la cloumna sino la creamos
  $columna = mysqli_query($conn3, "SELECT ".$key."  from $tabla limit 0");
  if ($columna == '') {
    echo "ALTER table $tabla add column ".$key." longtext null default null;<hr>";
    mysqli_query($conn3, "ALTER table $tabla add column " . $key . " longtext null default null;");
    $columna = '';
  } else {
    echo '<br>columna ' . $key . ' existe';
    $columna = '';
  }
}
$decode = str_replace("'", '', explode(",", $Valor_Campo));
$emailF = $decode[3];
$pantalla = $decode[0];
$Nombre_Campo = substr($Nombre_Campo, 0, -1);
$Valor_Campo = substr($Valor_Campo, 0, -1);
$Update_campo = substr($Update_campo, 0, -1);

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$Insert_campo = '(' . substr($Insert_campo, 0, -1) . ')';
$Insert_valor = '(' . substr($Insert_valor, 0, -1) . ')';

$queryAuditor = "INSERT INTO $tabla $Insert_campo VALUES $Insert_valor";
$queryAuditor = str_replace("'", '', $queryAuditor);
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$enlace_actual = str_replace('.php', '', $enlace_actual);
//echo $queryAuditor;

auditorMaster($idusuario, '1', $enlace_actual, $queryAuditor);

mysqli_query($conn3, "INSERT INTO $tabla $Insert_campo VALUES $Insert_valor");
echo "<br>INSERT INTO $tabla $Insert_campo VALUES $Insert_valor";


// retornamos el ultimo id insertado
$sql = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 1";
$resultado = mysqli_query($conn3, $sql);
$row = mysqli_fetch_assoc($resultado);
$historiaClinica1 = $row['id'];


//////////////////AUTOGUARDADO///////////////////////////////////////////////////////////////
if($_POST['Ruta_Historia_AutoGuardado']!=""){
  $cliente_id = $_POST['arreglo']['cliente_id'];
	$Ruta_Historia_AutoGuardado = $_POST['Ruta_Historia_AutoGuardado'];

	$query = "UPDATE AutoGuardado SET Estado='0',Nombre_Tabla = '$tabla' WHERE cliente_id = '$cliente_id' and usuario_id = '$idusuario' and Ruta = '$Ruta_Historia_AutoGuardado' AND Estado = '1' ";
	mysqli_query($conn3, $query);

}

?>

<script>
  // redireccionamos a la pagina de la historia clinica
  window.location.href = 'hcedImprimir?iC=<?=encrypt($historiaClinica1) ?>&tB=<?= base64_encode($tabla); ?>';
</script>