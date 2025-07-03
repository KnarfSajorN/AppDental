<?php 
include '../funciones/conn3.php';
include '../funciones/funciones.php';

$arrayusuario = $_POST['usuario'];
$arraypermisoUsuario = $_POST['permisoUsuario'];


// var_dump($_POST['usuario']);
// echo "<br><br>";
// var_dump($_POST['permisoUsuario']);
// echo "<br><br>";


for ($i=1; $i <= count($arrayusuario) ; $i++) { 
    //RECORREMOS CADA UNO DE LOS PERMISOS DE CADA USUARIO
    $permisosUser = "";
    foreach ($arraypermisoUsuario[$i] as $key => $value) {
        $permisosUser .= $value .  ",";
    }
    $permisosUser = substr($permisosUser, 0, -1);
    $userActualizar = $arrayusuario[$i];
    mysqli_query($conn3, "UPDATE usuarios SET permisosHospitalizacion='$permisosUser' WHERE USUARIO='$userActualizar' ");
    //echo "UPDATE usuarios SET permisosHospitalizacion='$permisosUser' WHERE USUARIO='$userActualizar' ";
}

echo "<script>history.back()</script>";