<?php
?>




<!DOCTYPE html>



<html>



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="icon" href="../img/favicon.ico">

    <title>CompuNotas</title>

    <!-- Custom fonts for this template-->

    <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this page -->

    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this page -->

    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/camara.css">

    <link rel="stylesheet" type="text/css" href="../css/loader.css">

</head>



<style type="text/css">
    @font-face {

        font-family: compunotas;

        src: url(../css/nasalization_rg-webfont.woff);

    }

    html body {

        font-family: compunotas;

    }

    #visualizar img {

        display: block;

        max-width: 100%;

        height: auto;

    }

    .icono:hover {

        color: green;

    }

    .text-compu {

        color: rgb(77, 200, 244);

    }

    .btn-compu {

        background-color: rgb(77, 200, 244);

        color: white;

    }

    #subir {

        display: none;

    }

    }
</style>



<body id="page-top">

    <!-- Begin Page Content -->

    <div class="container-fluid center justify-center">

        <div class="card mt-4">

            <div class="card-header text-center">

                <h4><img src="../img/logo-cn.png" class="" style="height: 1.5em;"> <strong class="text-DARK">Compu</strong> <strong class="text-compu">Notas</strong></h4>

            </div>

            <div class="card-body">

                <p class="text-primary m-0"><?php echo "Colegio: " . $datos[0]->nom_col ?></p>

                <p class="text-gray-800 m-0"><?php echo "Nombres: " . $datos[0]->nombres ?></p>

                <p class="text-gray-800 m-0"><?php echo "Apellidos: " . $datos[0]->apellidos ?></p>

                <p class="text-gray-800 m-0"><?php echo "Curso: " . $datos[0]->grado . " " . $datos[0]->curso ?></p>

                <form id='formimagen' method='post' action='#' ENCTYPE='multipart/form-data'>

                    <div class="image-upload img img-responsive text-center">

                        <label for="file-input" class="text-compu icono">

                            <i class="fas fa-camera-retro fa-10x"></i>

                            <p><i class="fas fa-arrow-right"></i><strong> Tomar foto </strong><i class="fas fa-arrow-left"></i></p>

                        </label>

                        <input id="file-input" type="file" accept="image/*" capture="camera" name="foto" style="display: none;" />

                        <div id="visualizar" class="border border-compu rounded-lg border-2 justify-center text-center"></div>

                        <div>
                            <p id="texto" class="text-danger mt-2"></p>
                        </div>

                        <div id="subir"><input type="submit" class="btn btn-compu btn-block mt-4" name="Subir" value="Subir" onclick="showAlert()"></div>

                        <input type='hidden' name='imagen' id='imagen' />

                        <input type='hidden' name='codigo' id='codigo' />

                        <?php echo "<input type='hidden' name='cod_col_gral' value='" . $datos[0]->cod_col_gral . "' />"; ?>

                        <?php echo "<input type='hidden' name='cod_col' value='" . $datos[0]->cod_col . "' />"; ?>

                        <?php echo "<input type='hidden' name='documento' value='" . $datos[0]->documento . "' />"; ?>

                </form>

                <script type="text/javascript">
                    document.getElementById("file-input").onchange = function(e) {

                        // Creamos el objeto de la clase FileReader

                        let reader = new FileReader();

                        // Leemos el archivo subido y se lo pasamos a nuestro fileReader

                        reader.readAsDataURL(e.target.files[0]);

                        // Le decimos que cuando este listo ejecute el código interno

                        reader.onload = function() {

                            let visualizar = document.getElementById('visualizar'),

                                image = document.createElement('img');

                            image.src = reader.result;

                            visualizar.innerHTML = '';

                            visualizar.append(image);

                        };

                        document.getElementById('subir');

                        subir.style.display = 'block';

                    }

                    function showAlert() {

                        document.getElementById("texto").innerHTML = "Por favor espere mientras se carga su foto . . .";

                    }
                </script>

            </div>

        </div>

    </div>

    <!-- Modal -->

    <div class="modal fade in" id="myModal" role="dialog">

        <div class="modal-dialog">
            <!-- Modal content-->

            <div class="modal-content">

                <div class="modal-body">

                    <div class="w-100 text-center justify-center">

                        <p class="m-0">Recuerda</p>

                        <p class="m-0"><small>Preferiblemente utilizar fondo blanco</small></p>

                        <img class="img img-responsive w-100" src="../img/preview.jpg">

                        <p class="m-0">Esta es la manera correcta para tomar la foto</p>

                        <button class="btn btn-default btn-compu" data-dismiss="modal" type="button">Ok</button>

                    </div>

                </div>

            </div>

        </div>

    </div>







    <!-- /.container-fluid -->



    <script src="../vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Bootstrap core JavaScript-->

    <script src="../vendor/jquery/jquery.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.js"></script>



    <!-- Core plugin JavaScript-->

    <script src="../vendor/jquery-easing/jquery.easing.js"></script>



    <!-- Custom scripts for all pages-->

    <script src="../js/sb-admin-2.js"></script>



    <!-- Page level plugins -->

    <script src="../vendor/chart.js/Chart.js"></script>



    <!-- Page level custom scripts -->

    <script src="../js/baseDev/chart-area-demo.js"></script>

    <script src="../js/baseDev/chart-pie-demo.js"></script>



    <!-- Page level plugins -->

    <script src="../vendor/datatables/jquery.dataTables.js"></script>

    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>



    <!-- Page level custom scripts -->

    <script src="../js/baseDev/datatables-demo.js"></script>

    <script type="text/javascript">
        $(function() {

            $("#myModal").modal();

        });
    </script>











</body>



</html>