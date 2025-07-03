<?php

include 'VistaSalaEspera.php';


//  $idCitas = $_POST['idCitas'];
//   $UpdateCita = $_POST['UpdateCita'];

//  if($_POST['idCitas'] != ''){
//     $idCitas = $_POST['idCitas'];
     
//  }else{
//     $idCitas = 0;
//  }
// // Obtener lista de sucursales desde la base de datos MySQL
// $sql1 = 'UPDATE citas SET estado = 7 WHERE idCitas = ' . $idCitas;
// $resultado1 = mysqli_query($conn3, $sql1);
// $sql = 'SELECT * FROM citas WHERE estado <> 4 and estado <> 3 and estado <> 7 ';
// $resultado = mysqli_query($conn3, $sql);
// $citas = array();
// while ($fila = mysqli_fetch_assoc($resultado)) {
//     $citas[] = $fila;
// }
// $idCitas = 0;
// if (isset($_POST['idCitas'])) {
//     $idCitas = $_POST['idCitas'];

   
//     $sql = 'UPDATE citas SET estado = 7 WHERE idCitas = ' . $idCitas;
//     $resultado = mysqli_query($conn3, $sql);

  
//     $sql = 'SELECT * FROM citas WHERE estado <> 4 and estado <> 3 and estado <> 7 ';
//     $resultado = mysqli_query($conn3, $sql);

   
//     $citas = array();
//     while ($fila = mysqli_fetch_assoc($resultado)) {
//         $citas[] = $fila;
//     }
//     echo json_encode($citas);
// } else {
   
//     $sql = 'SELECT * FROM citas WHERE estado <> 4 and estado <> 3 and estado <> 7 ';
//     $resultado = mysqli_query($conn3, $sql);

  
//     $citas = array();
//     while ($fila = mysqli_fetch_assoc($resultado)) {
//         $citas[] = $fila;
//     }
//     echo json_encode($citas);
// }

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listado de citas</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
        }

        h3 {
            margin-top: 0;
        }

        p {
            font-size: 160px;
        }

        .contenido {
            height: 3000px;
            /* altura suficiente para hacer scroll */
        }

        .fab.fab-icon-holder.bg-primary.ball {
            display: none;
        }
    </style>
    
</head>

<body>

<!-- <div style="background: #0095FF;color:white">
                    <h2 class="text-center">Sala de Espera</h2>
                </div> -->
    <div class="wrapper" id="mi-div">
    <div style="background: #0095FF;color:white">
                    <h2 class="text-center">Sala de Espera</h2>
                </div>
    
    <div class="row">
    
            
               
                <div class="box-body">
      
                <div class="wrapper"  id="citas">
        

        
    
    </div>
    </div>
    </div>
    </div>


</body>
<!-- <script src="scriptsala.js"></script>
<script>
  mostrarInfoPaciente('Juan', 'Dolor de cabeza', 'Dr. Pérez');
</script> -->
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
   
//     var citas = <?php echo json_encode($citas); ?>; // Obtener el arreglo de citas desde PHP
        
// //   var nombre = '<?php echo $cita['nombre']; ?>';
// //   var motivoConsulta = '<?php echo $cita['motivoConsulta']; ?>';
// //   var Doctor = '<?php echo $Doctor; ?>';
// //   console.log(nombre);

//   var citasHtml = '';
//   for (var i = 0; i < citas.length; i++) {
//     var cita = citas[i];
      
    
//       citasHtml += '<div class="col-md-12 d-flex">';
//       citasHtml += '<div class="info-box bg-aqua" style=" color: black;border: solid 5px #0d6efd; border-radius:2em;"><i class="fa-solid fa-bed-empty"></i>';
//       citasHtml += '<span class="info-box-icon bg-aqua" style="color: black;border-radius:0.5em;"><i class="fa fa-bed"></i></span>';
//       citasHtml += '<div class="info-box-content cajita" style=" color: black;border-radius:0.5em;background-color: primary;" align="center">';
//       citasHtml += '<p class="info-box-number" style="color: black;">';
//       citasHtml += '<h1>' + cita.nombre + '</h1></p>';
//       citasHtml += '<p class="info-box-number" style="color: #006400;">';
//       citasHtml += '<h1>' + cita.motivoConsulta + '</h1></p>';
//       citasHtml += '<p class="info-box-number" style="color: #006400;">';
//       citasHtml += '<h1>' + cita.doctor + '</h1></p>';
//       citasHtml += '</div>';
//       citasHtml += '</div>';
//       citasHtml += '</div>';
      
//   }
// //   document.getElementById('mi-div').appendChild(div);
//   document.getElementById('citas').innerHTML = citasHtml;
function getNombre(doctorId) {
    let data = {
            key: "NombreDoctor",
            doctorId: doctorId
        };
    var doctorName = '';
    $.ajax({
        url: 'SE_AjaxCitas.php',
        type: 'POST',
        data: data,
        async: false,
        success: function(data) {
            doctorName = data;
        }
    });
    return doctorName;
}
function getNombre1(motivoId) {
    let data = {
            key: "NombreMotivo",
            motivoId: motivoId
        };
    var motivoName = '';
    $.ajax({
        url: 'SE_AjaxCitas.php',
        type: 'POST',
        data: data,
        async: false,
        success: function(data) {
            motivoName = data;
        }
    });
    return motivoName;
}
function reloadCitas() {
   
    var idCitas = 0;
    // console.log(citas);

    let data = {
            key: "VerificarActualizacion",
            idCitas: idCitas
        };
    $.ajax({
        url: "SE_AjaxCitas.php",
        type: "POST",
        data: data,
        success: function(data) {
            // Parse the JSON data returned from the server
            // console.log(data);
            var citas = JSON.parse(data);

            // Generate the HTML content for the new citas data
            var citasHtml = '';
            for (var i = 0; i < citas.length; i++) {
                var cita = citas[i];
                citasHtml += '<div class="col-md-12 d-flex">';
                citasHtml += '<div class="info-box bg-aqua" style=" color: black;border: solid 5px #0d6efd; border-radius:2em;"><i class="fa-solid fa-bed-empty"></i>';
                citasHtml += '<span class="info-box-icon bg-aqua" style="color: black;border-radius:0.5em;"><i class="fa fa-bed"></i></span>';
                citasHtml += '<div class="info-box-content cajita" style=" color: black;border-radius:0.5em;background-color: primary;" align="center">';
                citasHtml += '<p class="info-box-number" style="color: black;">';
                citasHtml += '<h1>PACIENTE: ' + cita.nombre + '</h1></p>';
                citasHtml += '<p class="info-box-number" style="color: #006400;">';
                citasHtml += '<h1>Motivo de Consulta: ' + getNombre1(cita.motivoConsulta)+ '</h1></p>';
                citasHtml += '<p class="info-box-number" style="color: #006400;">';
                citasHtml += '<h1>Especialista: ' + getNombre(cita.doctor) + '</h1></p>';
                citasHtml += '<p class="info-box-number" style="color: #006400;">';
                citasHtml += '<h1>Consultorio: ' + cita.Consultorio + '</h1></p>';
                citasHtml += '</div>';
                citasHtml += '</div>';
                citasHtml += '</div>';
            }

            // Update the HTML content with the new citas data
            document.getElementById('citas').innerHTML = citasHtml;
            // location.reload(); // Recargar la página después de actualizar la cita
        },
       
    });
};



</script>
<script>
    $(document).ready(function() {
    // Call the reloadCitas function on page load
    // reloadCitas();
    setInterval(reloadCitas, 3000);
});

</script>


















<?php
//   include 'footer.php';
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    // selecciona el div por su id
    var div = document.getElementById("mi-div");

    // función para hacer scroll lento
    function hacerScroll() {
        // comprueba si el div ha alcanzado el final
        if (div.scrollTop + div.clientHeight >= div.scrollHeight) {
            // si ha alcanzado el final, desplázate hacia arriba lentamente
            div.scrollTop = 0;
        } else {
            // de lo contrario, desplázate hacia abajo lentamente
            div.scrollTop += 1;
        }
    }

    // llama a la función hacerScroll repetidamente cada 30 milisegundos
    setInterval(hacerScroll, 300);
</script>