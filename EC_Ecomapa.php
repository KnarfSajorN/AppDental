
<?php

include 'header.php';
include 'menu.php';

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
$clienteId = $_GET['clienteId'];

$QueryCliente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($QueryCliente);
while ($RowCliente = mysqli_fetch_array($QueryCliente)) {

    $nombre_cliente = $RowCliente['nombre_cliente'];
    $fechaNacimiento = $RowCliente['fechaNacimiento'];

    $genero = $RowCliente['genero'];
}

?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-bottom: 10px;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

</style>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Ecomapa  </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Ecomapa del Paciente <?=$nombre_cliente;?> </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="EC_GuardarEcomapa" method="POST" id="">







                            <!-- Collapse Exterior -->
                            <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">



                                <!-- Accordion 1-->
                                <div class="box-header with-border" style="padding: 15px;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_1" style="color:#3c8dbc;">
                                            Datos Personales
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_1" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <?php echo datosPacientesReducido($clienteId); ?>

                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->



                                <!-- Accordion 1-->
                                <div class="box-header with-border" style="padding: 15px;border-top: 3px solid #78a1f3;">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#Collapse_Principal_2" style="color:#3c8dbc;">
                                            Ecomapa
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_2" class="panel-collapse collapse show">
                                    <div class="panel-body">


                                        <script src="MapaConceptual/diagram-editor.js"></script>

                                        <?php
                                        $QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $_GET[clienteId]");
                                        while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

                                            $Ecomapa_Fami_Eco = $RowPaciente['Ecomapa_Archivo'];
                                            $Familiograma_Fami_Eco = $RowPaciente['Familiograma_Archivo'];
                                        }
                                        $DisplayEcomapa = "";
                                        if ($Familiograma_Fami_Eco == "") {
                                            $Familiograma_Fami_Eco = "data:image/svg+xml;base64,";
                                            $DisplayEcomapa = "display:none;";
                                        }
                                        ?>

                                        <input id="familiograma_xml" name="familiograma_xml" type="hidden" value="<?=$Familiograma_Fami_Eco;?>">

                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">
                                            <button type="button" class="btn btn-block btn-outline-primary btn-lg rounded-pill shadow" onclick="agregarEcomapaDuplicado()"> Agregar Familiograma Actual del Paciente al Ecomapa </button>
                                        </div>


                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">
                                        <img id="MapaConceptual_Ecomapa" class="nocargarimagenpredeterminada" onclick='DiagramEditor.editElement(this);'  src="<?=$Ecomapa_Fami_Eco;?>" style="cursor:pointer;<?=$DisplayEcomapa;?>">
                                        </div>

                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">

                                        <button type="button" class="btn btn-block btn-outline-primary btn-lg rounded-pill shadow" style="width: 90%;    display: inline-block;" onclick="Ecomapa_Agregar()"> Agregar/Modificar Ecomapa </button>
                                        <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" style="width: 10%;    width: 10%; float: right; height: 47px; margin-top: 0;"onclick="LimpiarEcomapa()"> <i class="fa fa-trash"></i></button>

                                        </div>

                                        <input id="ecomapa_xml" name="ecomapa_xml" type="hidden">







                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->





                            </div>
                            <!-- Fin del Collapse Exterior -->




                            <input type="hidden" name="cliente_id" value="<?php echo $_GET['clienteId']; ?>">
                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']; ?>">


                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<script>

function agregarEcomapaDuplicado(){

var familiograma_xml = $('#familiograma_xml').val();
  
Swal.fire({
              title: 'Aplicar cambios al ecomapa', 
              text: 'Desea agregar la estructura del familiograma al Ecomapa ?',
              icon: 'warning',
              showDenyButton: false,
              showCancelButton: true,
              confirmButtonText: 'Aplicar',
              customClass: {
                  container: 'custom-swal-container',
              },
          }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {

                  Swal.fire({
                      title: "Ecomapa",
                      text: "Se Actualizo el Ecomapa",
                      icon: "success",
                      customClass: {
                          container: 'custom-swal-container',
                      },
                      allowOutsideClick: false, // Evita que el usuario cierre la alerta haciendo clic fuera de ella.
                      allowEscapeKey: false, // Evita que el usuario cierre la alerta presionando la tecla Esc.
                      showConfirmButton: false, // Oculta el botón de confirmación.

                      // Aquí utilizamos el temporizador para hacer el envío del formulario después de 3 segundos.
                      timer: 1000, // 3000 milisegundos (3 segundos).
                      timerProgressBar: true, // Muestra una barra de progreso durante el temporizador.
                  }).then(() => {

                      document.getElementById('MapaConceptual_Ecomapa').src = familiograma_xml;
                      document.getElementById('MapaConceptual_Ecomapa').style.display = 'block';
                  });
              }
          })
}

    function Ecomapa_Agregar() {
        // Obtener referencia a la imagen
        const EcomapaImg = document.getElementById('MapaConceptual_Ecomapa');

        // Ejecutar el evento onclick directamente
        if (EcomapaImg.onclick) {
            EcomapaImg.onclick();
            EcomapaImg.style.display = 'block';
        }
    }


     function LimpiarEcomapa(){

     Swal.fire({
                     title: 'Ecomapa',
                     text: 'Desea limpiar el Ecomapa ?',
                     icon: 'danger',
                     showDenyButton: false,
                     showCancelButton: true,
                     confirmButtonText: 'Aceptar',
                     customClass: {
                         container: 'custom-swal-container',
                     },
                 }).then((result) => {
                     /* Read more about isConfirmed, isDenied below */
                     if (result.isConfirmed) {

                          Swal.fire({
                               title: "Ecomapa",
                               text: "Se limpio el Ecomapa",
                               icon: "success",
                               customClass: {
                                   container: 'custom-swal-container',
                               },
                               allowOutsideClick: false, // Evita que el usuario cierre la alerta haciendo clic fuera de ella.
                               allowEscapeKey: false, // Evita que el usuario cierre la alerta presionando la tecla Esc.
                               showConfirmButton: false, // Oculta el botón de confirmación.
                               // Aquí utilizamos el temporizador para hacer el envío del formulario después de 3 segundos.
                               timer: 1500, // 3000 milisegundos (3 segundos).
                        });

                        document.getElementById('MapaConceptual_Ecomapa').src = "data:image/svg+xml;base64,";
                        document.getElementById('ecomapa_xml').value = "";

                    }
                })

    }



</script>
<script>
    // Obtener referencias a la imagen y al input
     const EcomapaImg = document.getElementById('MapaConceptual_Ecomapa');
    const EcomapaXmlInput = document.getElementById('ecomapa_xml');

    // Agregar un event listener para el cambio de src en la imagen
    EcomapaImg.addEventListener('load', function() {
    // Actualizar el valor del input con el nuevo src
    EcomapaXmlInput.value = EcomapaImg.src;
    });
</script>