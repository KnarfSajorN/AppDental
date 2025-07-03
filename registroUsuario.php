<?php
include 'funciones/funciones.php';
include 'funciones/conn3.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicalsoft | Registro</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" type="image/vnd.microsoft.icon" href="https://medicalsoftplus.com/iconoms.ico">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="index2.html">Medicalsoft</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Regístrate para iniciar el sistema</p>

                <form action="registroUsuarioGuardar.php" method="post">
                    <div class="input-group mb-3 border-primary">
                        <input required type="text" class="form-control" placeholder="Nombre completo" name="NOMBRE_USUARIO">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 border-primary">
                        <input required type="number" class="form-control" placeholder="Teléfono" name="telefono">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 border-primary">
                        <input required type="text" class="form-control" placeholder="Usuario" name="nombre_cliente">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 border-primary">
                        <input required type="text" class="form-control" placeholder="Contraseña" name="PASS">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-primary"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group mb-3 border-primary">
                        <input required type="text" class="form-control" placeholder="Dirección" name="direccion">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map text-info"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 border-primary">
                        <input required type="text" class="form-control" placeholder="Ciudad" name="ciudad">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-city text-info"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Especialidad</label>
                    <div class="input-group mb-3 border-primary">
                        <select class="form-control" name="especialidad1" id="">
                            <?php categoriaselect() ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-stethoscope text-success"></span>
                            </div>
                        </div>
                    </div>
                    <label for="">Software</label>
                    <div class="input-group mb-3 border-primary">
                        <select class="form-control" name="menu" id="">
                            <?php
                            $query = "SELECT * from grupos where estado = 1";
                            $result = mysqli_query($conn3, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-laptop-medical text-success"></span>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-info btn-block rounded-pill">
                                <i class="fas fa-user-plus mr-2"></i>
                                Registrar
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>