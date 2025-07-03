
<?php
include 'header.php';
include 'menu.php';


$cI = decrypt($_GET['cI']);

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}
$usuario_id = $_SESSION['ID'];

if (isset( $_POST['Guardar_Informacion_Pagina'] )) {


    $directorioPrincipal = "STL_Carpetas";

    //PARA EL CASO DE QUE LA CARPETA MO ESTE CREADA
    if (!is_dir($directorioPrincipal)) {
        //CREA LA CARPETA PRINCIPAL
        if (mkdir($directorioPrincipal)) {

            $nombreCarpetaBD = $_POST['nombreCarpeta'] . "_" . date("YmdHis");
            $directorioCrear = $directorioPrincipal. "/" .$nombreCarpetaBD;
            //echo "<script>alert(".$directorioCrear.")</script>";

            //EVALUA SI EL DIRECTORIO QUE SE ESTA INTENTANDO CREAR YA EXISTE
            if (!is_dir($directorioCrear)) {
                if (mkdir($directorioCrear)) {

                    $fechaActual = date("Y-m-d");
                    $cI = $_POST['cI'];
                    //INSERTA EL NOMBRE DE LA CARPETA EN LA BASE DE DATOS
                    mysqli_query($conn3, "INSERT INTO STL_Carpetas (descripcion, fechaCreacion,usuarioId,clienteId) VALUES('$nombreCarpetaBD', '$fechaActual', '$usuario_id', '$cI')");

                    echo "<script>window.location.href='STL_CargarArchivos.php?cI=". encrypt($cI) ."&msg=Carpeta creada correctamente'</script>";
                }else{
                    echo "<script>alert('Error al crear el directorio ".$directorioCrear."')</script>";
                }
            //SI NO ESTA CREADO EL DIRECTORIO INDICADO    
            }else{
                echo "<script>alert(Directorio ".$directorioCrear." ya existe')</script>";
            }
        
        //EN EL CASO DE QUE NO SE CREE EL DIRECTORIO PRINCIPAL
        }else{
            echo "<script>alert('Error al crear el directorio principal')</script>";
        }

    //PARA EL CASO DE QUE EL DIRECTORIO PRINCIPAL YA ESTE CREADO    
    }else{
        $nombreCarpetaBD = $_POST['nombreCarpeta'] . "_" . date("YmdHis");
        $cI = $_POST['cI'];
        $directorioCrear = $directorioPrincipal. "/" .$nombreCarpetaBD;
        //echo "<script>alert(".$directorioCrear.")</script>";

        //EVALUA SI EL DIRECTORIO QUE SE ESTA INTENTANDO CREAR YA EXISTE
        if (!is_dir($directorioCrear)) {
            if (mkdir($directorioCrear)) {

                $fechaActual = date("Y-m-d");
                //INSERTA EL NOMBRE DE LA CARPETA EN LA BASE DE DATOS
                mysqli_query($conn3, "INSERT INTO STL_Carpetas (descripcion, fechaCreacion,usuarioId,clienteId) VALUES('$nombreCarpetaBD', '$fechaActual', '$usuario_id', '$cI')");
                //echo "INSERT INTO STL_Carpetas (descripcion, fechaCreacion,usuarioId,clienteId) VALUES('$nombreCarpetaBD', '$fechaActual', '$usuario_id', '$cI')";

                echo "<script>window.location.href='STL_CargarArchivos.php?cI=". encrypt($cI) ."&msg=Carpeta creada correctamente'</script>";
            }else{
                echo "<script>alert('Error al crear el directorio ".$directorioCrear."')</script>";
            }
        //SI NO ESTA CREADO EL DIRECTORIO INDICADO    
        }else{
            echo "<script>alert(Directorio ".$directorioCrear." ya existe')</script>";
        }
    }

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
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Archivos STL </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Archivos STL </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group col-md-12">
                                <label>Nombre de la Carpeta</label>
                                <input type="hidden" name="cI" value="<?php echo $cI ?>">
                                <input type="text" class="form-control input-lg" name="nombreCarpeta" placeholder="Nombre de la carpeta" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Entidades </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre de la carpeta</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $queryCarpetas = mysqli_query($conn3, "SELECT * FROM STL_Carpetas WHERE clienteId='$cI' ");
                                                    
                                                    
                                                    foreach ($queryCarpetas as $tablaCarpetas) {
                                                        $desCarpeta = $tablaCarpetas['descripcion'];
                                                        $IDCarpeta = $tablaCarpetas['ID'];
                                                        echo "<tr>
                                                                    <td>" .$IDCarpeta  . "</td>
                                                                        <td>" .$desCarpeta  . "</td>
                                                                    <td>
                                                                        <button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' onclick='setValue(".$IDCarpeta.")' data-toggle='modal' data-target='#myModal'>Agregar archivo</button>
                                                                        <button type='button' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow' onclick='traerArchivos(".$IDCarpeta.")'>Ver Archivos</button>
                                                                    </td>
                                                            </tr>";
                                                    }


                                                    // $directorioPrincipal = "STL_Carpetas";

                                                    // $carpetasDir = scandir($directorioPrincipal);
                                                    // $consecutivo = 0;

                                                    // // Iterar sobre la lista con un bucle foreach
                                                    // foreach ($carpetasDir as $carpetas) {

                                                    //     //var_dump($carpetas);
                                                    //     // Excluir los directorios especiales '.' y '..'
                                                    //     if ($carpetas != "." && $carpetas != "..") {
                                                    //         // Verificar si el elemento es una carpeta
                                                    //         if (is_dir($directorioPrincipal . '/' . $carpetas)) {
                                                    //             $consecutivo += 1;
                                                    //         echo    "<tr>
                                                    //                     <td>" .$consecutivo  . "</td>
                                                    //                     <td>" .$carpetas  . "</td>
                                                    //                     <td>
                                                    //                         <button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' onclick='setValue(".$consecutivo.")' data-toggle='modal' data-target='#myModal'>Agregar archivo</button></td>
                                                    //                 </tr>";
                                                    //             //var_dump($carpetas);
                                                    //         }
                                                    //     }
                                                    // }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cargar archivo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    <style>
        #modal-form-ab *{
            margin-top:15px
        }
    </style>

      <div class="modal-body">
            <form action="STL_G" id="modal-form-ab" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="idCarpeta" name="idCarpeta">
                <input type="hidden" id="usuarioId" name="usuarioId" value="<?php echo $_SESSION['ID'] ?>">
                <input type="hidden" id="clienteId" name="clienteId" value="<?php echo $cI ?>">
                <input type="text" required name="descripcionArchivo" class="form-control" placeholder="Nombre/Descripcion del archivo">
                <input type="file" name="archivoCargar" class="form-control" >
                <button style="margin-top:15px" type='submit' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'>Guardar</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
    function setValue(valor) {
        $('#idCarpeta').val(valor);
    }

    ///////// FUNCION PARA TRAER ARCHIVOS ////////////////
    function traerArchivos(idCarpeta) {
        $.ajax({
            url: 'STL_Ajax_TraerArchivo.php',  // Reemplaza 'tu_script.php' con la URL correcta de tu script PHP
            type: 'POST',
            data: {
                idCarpeta: idCarpeta
            },
            success: function(response) {
                Swal.fire({
                    title: 'Archivos cargados',
                    html: response,
                    // icon: 'info',
                    confirmButtonText: 'OK'
                });
                // Manejar la respuesta exitosa
                console.log(response);
                // Puedes redirigir o hacer cualquier otra cosa aquí
            },
            error: function(error) {
                // Manejar errores
                console.error(error);
            }
        });
    }


    function enviarArchivoSTL(carpeta,archivo) {
        window.location.href="stl_viewer-master/index.php?archivo=" + archivo + "&carpeta=" + carpeta;
    }



</script>


<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>