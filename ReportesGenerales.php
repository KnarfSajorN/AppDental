<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Reportes Ocupacional
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reportes Generales </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">



            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte por sexo
                        <form class="row row-md-12" action="ReporteGeneroF.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>

                            <div class="col-md-4 col-xs-12">
                                Sexo

                                <select id="sexo" name="sexo" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>




                                </select>
                            </div>
                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte Generos" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>


                            <!-- <div class="col-md-2 col-xs-12">
                                Edades

                                <select id="edades" name="edades" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">0-1 Mes</option>
                                    <option value="2">1 Mes - 1 Año</option>
                                    <option value="3">1 Año - 5 Años</option>
                                    <option value="4">5 Años - 11 Años</option>
                                    <option value="5">14 Años - 44 Años</option>
                                    <option value="6">Mas de 44 Años</option>




                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Clase de Consulta

                                <select id="consultaC" name="consultaC" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">Control</option>




                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Riesgos
                                <select name="RiesgosG" class="form-control select2" style="width: 100%;" required onchange="Riesgo(this.value)">
                                    <option selected="selected" value="0">Todos</option>
                                    <option value="1">Enfermedad Comun</option>
                                    <option value="2">Maternidad </option>
                                    <option value="3">Riesgo Profesional</option>
                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Riesgo
                                <select id="riesgos" name="riesgos" class="form-control select2" style="width: 100%;">
                                </select>
                            </div> -->

                            <!-- <div class="col-md-2 col-xs-12">
                Enfermedad Comun

                <select id="enfermedadC" name="enfermedadC" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Comun</option>
                  <option value="2">Accidente Comun</option>




                </select>
              </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                Maternidad

                <select id="maternidad" name="maternidad" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Puericultura</option>
                  <option value="2">Maternidad</option>




                </select>
              </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                Riesgo Profesional

                <select id="riesgo" name="riesgo" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Accidente Trabajo</option>
                  <option value="2">Enfermedad profesional</option>




                </select>
              </div> -->
                        </form>


                    </div>
                </div>
            </div>
            <br>

            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte por Edad
                        <form class="row row-md-12" action="ReporteEdadF.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>
                            <!-- <div class="col-md-4 col-xs-12">
                                Edades

                                <select id="edades" name="edades" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">0-1 Mes</option>
                                    <option value="2">1 Mes - 1 Año</option>
                                    <option value="3">1 Año - 5 Años</option>
                                    <option value="4">5 Años - 11 Años</option>
                                    <option value="5">14 Años - 44 Años</option>
                                    <option value="6">Mas de 44 Años</option>




                                </select>
                            </div> -->

                            <!-- <div class="col-md-4 col-xs-12">
                                Sexo

                                <select id="sexo" name="sexo" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>




                                </select>
                            </div> -->

                            <!-- <div class="col-md-4 col-xs-12">
                                Sexo

                                <select id="sexo" name="sexo" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>




                                </select>
                            </div> -->
                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte Generos" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>


                            <!-- <div class="col-md-2 col-xs-12">
                                Edades

                                <select id="edades" name="edades" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">0-1 Mes</option>
                                    <option value="2">1 Mes - 1 Año</option>
                                    <option value="3">1 Año - 5 Años</option>
                                    <option value="4">5 Años - 11 Años</option>
                                    <option value="5">14 Años - 44 Años</option>
                                    <option value="6">Mas de 44 Años</option>




                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Clase de Consulta

                                <select id="consultaC" name="consultaC" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">Control</option>




                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Riesgos
                                <select name="RiesgosG" class="form-control select2" style="width: 100%;" required onchange="Riesgo(this.value)">
                                    <option selected="selected" value="0">Todos</option>
                                    <option value="1">Enfermedad Comun</option>
                                    <option value="2">Maternidad </option>
                                    <option value="3">Riesgo Profesional</option>
                                </select>
                            </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                                Riesgo
                                <select id="riesgos" name="riesgos" class="form-control select2" style="width: 100%;">
                                </select>
                            </div> -->

                            <!-- <div class="col-md-2 col-xs-12">
                Enfermedad Comun

                <select id="enfermedadC" name="enfermedadC" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Comun</option>
                  <option value="2">Accidente Comun</option>




                </select>
              </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                Maternidad

                <select id="maternidad" name="maternidad" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Puericultura</option>
                  <option value="2">Maternidad</option>




                </select>
              </div> -->
                            <!-- <div class="col-md-2 col-xs-12">
                Riesgo Profesional

                <select id="riesgo" name="riesgo" class="form-control select2" style="width: 100%;" required="required">

                  <option value="0" select>Todos</option>
                  <option value="1">Accidente Trabajo</option>
                  <option value="2">Enfermedad profesional</option>




                </select>
              </div> -->
                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte EPS
                        <form class="row row-md-12" action="ReporteEPS.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                EPS
                               <select name="eps" class="form-control select2" id="">
                                <option value="0">Todos</option>
                                <?php $queryEntidades = mysqli_query($conn3, "SELECT * FROM Rips_Entidades");
                                    foreach ($queryEntidades as $tablaEntidades) {
                                        $Nombre = $tablaEntidades['Nombre'];
                                        $id = $tablaEntidades['id'];
                                        echo "<option value='{$id}'>". $Nombre ."</option>";
                                    }
                                ?>
                               </select>
                            </div>

                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>

            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Cargos
                        <form class="row row-md-12" action="ReporteCargos.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Factores de Riesgo
                        <form class="row row-md-12" action="ReporteFactorR.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>

            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Antecedentes Familiares
                        <form class="row row-md-12" action="ReporteAntecedentesF.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Antecedentes Personales
                        <form class="row row-md-12" action="ReporteAntecedentesP.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Sintomas
                        <form class="row row-md-12" action="ReporteSintomas.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Examenes
                        <form class="row row-md-12" action="ReporteExamenes.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Recomendaciones
                        <form class="row row-md-12" action="ReporteRecomendaciones.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte EPS" required>
                            <div class="col-xs-12 col-md-12">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>




                        </form>


                    </div>
                </div>
            </div>
            <br>
            <!-- <div class="col-md-12">

               
                <div class="box-body">


                    <div class="col-xs-12">
                        Control de Enfermedades
                        <form class="row row-md-12" action="ReporteEnfermedades.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <div class="col-xs-12 col-md-4">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>

                            <div class="col-md-2 col-xs-12">
                                Sexo

                                <select id="sexo" name="sexo" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>




                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Edades

                                <select id="edades" name="edades" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">0-1 Mes</option>
                                    <option value="2">1 Mes - 1 Año</option>
                                    <option value="3">1 Año - 5 Años</option>
                                    <option value="4">5 Años - 11 Años</option>
                                    <option value="5">14 Años - 44 Años</option>
                                    <option value="6">Mas de 44 Años</option>




                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Clase de Consulta

                                <select id="consultaC" name="consultaC" class="form-control select2" style="width: 100%;" required="required">

                                    <option value="0" select>Todos</option>
                                    <option value="1">Nuevo</option>
                                    <option value="2">Control</option>




                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Enfermedades

                                <select name="enfermedadC" class="form-control select2" style="width: 100%;">
                                    <option value="0" selected="selected">Todas</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM EnfermedadesRelacion ORDER BY id");
                                    while ($RowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $RowMotorizado['id'];
                                        $Nombre = $RowMotorizado['nombre'];

                                        echo "<option value='$id'> $Nombre </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                         
                         
                        </form>


                    </div>
                </div>
            </div> -->
            <br>
            <!-- <div class="box">

               
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte de Embarazadas
                        <form action="reporteEmbarazada.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <br>

            <!-- <div class="box">

               
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte de Incapacidades
                        <form action="reporteIncapacidades.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>
                                <?php
                                $ID = $_SESSION['ID'];
                                ?>

                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Riesgos
                                <select name="RiesgosG" class="form-control select2" style="width: 100%;" required onchange="Riesgo1(this.value)">
                                    <option selected="selected" value="0">Todos</option>
                                    <option value="1">Enfermedad Comun</option>
                                    <option value="2">Maternidad </option>
                                    <option value="3">Riesgo Profesional</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-xs-12">
                                Riesgo
                                <select id="riesgos1" name="riesgos" class="form-control select2" style="width: 100%;">
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <br>
            <!-- <div class="box">

              
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte rango de Edades
                        <form action="Reporteedades.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <div class="col-xs-12 col-md-4">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>
                        </form>


                    </div>
                </div>
            </div> -->


            <!-- 
            <div class="box">

               
                <div class="box-body">


                    <div class="col-xs-12">
                        Reporte Sexo
                        <form action="Reportesexo.php" method="POST">
                            <div class="col-xs-12 col-md-4">


                                Desde
                                <input type="date" class="form-control input-lg" name="desde" required>


                                <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                Hasta
                                <input type="date" class="form-control input-lg" name="hasta" required>
                            </div>


                            <div class="col-xs-12 col-md-4">
                                <br>
                                <center><button type="submit" class="btn btn-block btn-primary btn-sm">
                                        <h4> <strong> Generar </strong> </h4>
                                    </button></center>
                            </div>
                        </form>


                    </div>
                </div>
            </div> -->







            <br>






            <div align="center">
                <h6>
                    <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
                </h6>
            </div>



            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<script>
    function Riesgo(valor) {
        //ajax para cargar los convenios
        console.log(valor);
        $.ajax({
            type: "POST",
            url: "ajax_Riesgo.php",
            data: {
                riesgo: valor,
            },
            success: function(response) {
                $('#riesgos').html(response);

            }
        });
    }

    function Riesgo1(valor) {
        //ajax para cargar los convenios
        console.log(valor);
        $.ajax({
            type: "POST",
            url: "ajax_Riesgo.php",
            data: {
                riesgo: valor,
            },
            success: function(response) {
                $('#riesgos1').html(response);

            }
        });
    }
</script>