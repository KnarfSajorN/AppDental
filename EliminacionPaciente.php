<?php
include 'funciones/conn3.php';


$id = $_GET["id"];
$nombrehistoria = "cliente";

$tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'Log_Datos_Eliminados'");
$nrowtabla = mysqli_num_rows($tabla);
if ($nrowtabla == 0) {
    $query = "CREATE TABLE `Log_Datos_Eliminados` ( 
        `id` INT(11) NOT NULL AUTO_INCREMENT , 
        `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
        `tabla_id` INT(11) NULL DEFAULT '0' ,
        `Nombre_Historia` TEXT NULL DEFAULT '' ,
        `Datos_Historia` TEXT NULL DEFAULT '',  
        PRIMARY KEY (`id`)) ENGINE = MyISAM;";

    $creaciontabla = mysqli_query($conn3, $query);
    if (!$creaciontabla) {
        echo "<script language='Javascript'> alert('error en la creacion de la tabla');
        window.location='portada';</script>";

        exit();
    }
}

$resultado1 = mysqli_query($conn3, "SHOW COLUMNS FROM $nombrehistoria");
$Nresultado1 = mysqli_num_rows($resultado1);
while ($rowMotorizado1 = mysqli_fetch_array($resultado1)) {
    $campo_tabla = $rowMotorizado1['Field'];


    $resultado2 = mysqli_query($conn3, "SELECT $campo_tabla FROM $nombrehistoria where cliente_id = '$id'");
    $Nresultado2 = mysqli_num_rows($resultado2);
    while ($rowMotorizado2 = mysqli_fetch_array($resultado2)) {

        $repuesta_campo = $rowMotorizado2[$campo_tabla];

        if ($campo_tabla == 'cliente_id' or $campo_tabla == 'ID' or $campo_tabla == 'id') {
            $id_historia = $repuesta_campo;
        }
    }

    $repuesta_campo = str_replace("'", '"', $repuesta_campo);
    $campos_historia .= $campo_tabla . ',';
    $datos_historia .= '"' . $repuesta_campo . '",';
}
$datos_historia = trim($datos_historia, ',');
$campos_historia = trim($campos_historia, ',');
$datos_historia = mysqli_real_escape_string($conn3, $datos_historia);
$total_historia = $nombrehistoria . '(' . $campos_historia . ') VALUES (' . $datos_historia . ');';

$resultado1 = mysqli_query($conn3, "INSERT INTO Log_Datos_Eliminados (tabla_id,Nombre_Historia,Datos_Historia) VALUES ('$id_historia','$nombrehistoria','$total_historia')");
echo "INSERT INTO Log_Datos_Eliminados (tabla_id,Nombre_Historia,Datos_Historia) VALUES ('$id_historia','$nombrehistoria','$total_historia')";

if (!$resultado1) {
    echo "<script language='Javascript'>
    alert('Error al eliminar la historia');
</script>";
    echo "<script language='Javascript'>
   window.history.back();
</script>";
} else {
    //$resultado1 = mysqli_query($conn3, "DELETE FROM $nombrehistoria WHERE cliente_id='$id'");
    echo "<script language='Javascript'>
    window.history.back();
</script>";
}

/*

<script src="plugins/SweetAlert2K/sweetalert2.js"></script>
   <script>
     function PacienteEliminar(value) {

       const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
           confirmButton: 'btn btn-success',
           cancelButton: 'btn btn-danger'
         },
         buttonsStyling: false
       })

       swalWithBootstrapButtons.fire({
         title: 'Esta Seguro?',
         text: "Si elimina este paciente no podra ser recuperado",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Si, Eliminarlo!',
         cancelButtonText: 'No, Cancelar!',
         reverseButtons: true
       }).then((result) => {
         if (result.isConfirmed) {
           swalWithBootstrapButtons.fire(

             'Eliminando!',
             'El paciente se esta eliminando completamente del sistema.',
             'success'
           )

           setInterval(function() {
             window.location = 'EliminacionPaciente.php?id='+value;
           }, 3000);


         } else if (

           result.dismiss === Swal.DismissReason.cancel
         ) {
           swalWithBootstrapButtons.fire(
             'Cancelado',
             'El paciente no sera eliminado',
             'error'
           )
         }
       })

     }
   </script>
   */