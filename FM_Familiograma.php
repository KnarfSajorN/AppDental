
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
            <li><a href="#"> Familiograma  </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> Familiograma del Paciente <?=$nombre_cliente;?> </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="FM_GuardarFamiliograma" method="POST" id="">







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
                                            Familiograma
                                        </a>
                                    </h4>
                                </div>
                                <div id="Collapse_Principal_2" class="panel-collapse collapse show">
                                    <div class="panel-body">


                                        <script src="MapaConceptual/diagram-editor.js"></script>

                                        <?php
                                        $QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $_GET[clienteId]");
                                        while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

                                            $Familiograma_Fami_Eco = $RowPaciente['Familiograma_Archivo'];
                                        }
                                        $DisplayFamiliograma = "";
                                        if($Familiograma_Fami_Eco==""){
                                            $Familiograma_Fami_Eco="data:image/svg+xml;base64,";
                                            $DisplayFamiliograma = "display:none;";
                                        }
                                        ?>

                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">
                                        <img id="MapaConceptual_Familiograma" class="nocargarimagenpredeterminada" onclick='DiagramEditor.editElement(this);'  src="<?=$Familiograma_Fami_Eco;?>" style="cursor:pointer;<?=$DisplayFamiliograma;?>">
                                        </div>
                                        <br>
                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">
                                        <button type="button" class="btn btn-block btn-outline-primary btn-lg rounded-pill shadow" style="width: 90%; display: inline-block;" onclick="agregarFamiliograma()"> Agregar/Modificar Familiograma </button>
                                        <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" style="width: 10%; width: 10%; float: right; height: 47px; margin-top: 0;"onclick="LimpiarFamiliograma()"> <i class="fa fa-trash"></i></button>
                                        </div>

                                        <input id="familiograma_xml" name="familiograma_xml" type="hidden">
                                        <div class="form-group col-md-12" style="text-align: -webkit-center;">
                                        <br>
                                        </div>




                            
                                    </div>
                                </div>
                                <!-- Accordion 1 [FIN]-->

                            



                            </div>
                            <!-- Fin del Collapse Exterior -->




                            <input type="hidden" name="cliente_id" value="<?php echo $_GET['clienteId'];; ?>">
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
     function agregarFamiliograma() {
      // Obtener referencia a la imagen
      const familiogramaImg = document.getElementById('MapaConceptual_Familiograma');

      // Ejecutar el evento onclick directamente
      if (familiogramaImg.onclick) {
        familiogramaImg.onclick();
        familiogramaImg.style.display = 'block';
      }
    }

    function LimpiarFamiliograma(){
      
      Swal.fire({
                    title: 'Familiograma', 
                    text: 'Desea limpiar el Familiograma ?',
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
                            title: "Familiograma",
                            text: "Se limpio el Familiograma",
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

                        document.getElementById('MapaConceptual_Familiograma').src = "data:image/svg+xml;base64,";
                        document.getElementById('familiograma_xml').value = "";
                        document.getElementById('MapaConceptual_Familiograma').style.display = 'none';

                    }
                })

    }

</script>

<script>
    // Obtener referencias a la imagen y al input
    const familiogramaImg = document.getElementById('MapaConceptual_Familiograma');
    const familiogramaXmlInput = document.getElementById('familiograma_xml');

    // Agregar un event listener para el cambio de src en la imagen
    familiogramaImg.addEventListener('load', function() {
      // Actualizar el valor del input con el nuevo src
      familiogramaXmlInput.value = familiogramaImg.src;
    });
</script>
