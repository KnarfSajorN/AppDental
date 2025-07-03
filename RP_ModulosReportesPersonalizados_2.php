<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

$ID = $_SESSION['ID'];
$Tipo = $_GET['Tipo'];
?>
<style type="text/css">
  .col-xs-3
  {
    padding-bottom: 20px;
  }

  .btn-anim {
     /*top: 50%;
     left: 50%;*/
     transform: translate(-50%, -50%);
     position: absolute;
     padding: 20px 60px; /*si se cambia el tam;a;o osea el padding del boton cambiar en heigth de btn-anim i */
     display: inline-block;
     text-decoration: none;
     text-transform: uppercase;
     overflow: hidden;
     cursor: pointer;
     font: 16px/24px Arial, sans-serif;
     background-color: #39c27c;
     transition: box-shadow 0.4s ease, background-color 0.4s ease, color 0.4s ease;
     box-shadow: 0 0 2px 0 rgba(73, 115, 255, .1), 0 0 4px 0 rgba(73, 115, 255, .2), 0 0 6px 0 rgba(73, 115, 255, .3), 0 0 8px 0 rgba(73, 115, 255, .4), 0 0 12px 0 rgba(73, 115, 255, .5), 0 0 18px 0 rgba(73, 115, 255, .6);
  }
   .btn-anim:hover {
     background-color: #ea3 c;
     /*box-shadow: 0 0 2px 0 rgba(238, 170, 51, 0.1), 0 0 4px 0 rgba(238, 170, 51, 0.2), 0 0 6px 0 rgba(238, 170, 51, 0.3), 0 0 8px 0 rgba(238, 170, 51, 0.4), 0 0 12px 0 rgba(238, 170, 51, 0.5), 0 0 18px 0 rgba(238, 170, 51, 0.6), 0 0 4px 0 rgba(238, 170, 51, 0.7);*/
     box-shadow: 0 0 2px 0 rgb(238 170 51 / 10%), 0 0 4px 0 rgb(238 170 51 / 20%), 0 0 6px 0 rgb(74 100 132), 0 0 8px 0 rgb(51 65 238 / 40%), 0 0 12px 0 rgb(51 74 238 / 50%), 0 0 18px 0 rgb(51 74 238 / 60%), 0 0 4px 0 rgb(51 83 238 / 70%);
  }
   .btn-anim span {
     position: relative;
     z-index: 1;
     color: #fff;
     letter-spacing: 8px;
  }
   .btn-anim i {
     position: absolute;
     left: 0;
     top: 50%;
     transform: translateY(-50%);
     width: 100%;
     height: 500px;/*si se cambia el tam;a;o osea el padding del boton cambiar tambien aca */
     background-color: inherit;
     box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
     transition: transform 0.4s linear, top 1s linear;
     overflow: hidden;
  }
   .btn-anim i:before, .btn-anim i:after {
     content: "";
     position: absolute;
     width: 200%;
     height: 200%;
     top: -380px;/* tama;o de las olas */
     left: 50%;
     transform: translate(-50%, -75%);
  }
   .btn-anim i:before {
     border-radius: 46%;
     background-color: rgba(33, 2, 205, 0.5);
     animation: animate 15s linear infinite;
  }
   .btn-anim i:after {
     border-radius: 40%;
     background-color: rgba(2, 3, 205, 0.5);
     animation: animate 20s linear infinite;
  }
   @keyframes animate {
     0% {
       transform: translate(-50%, -75%) rotate(0deg);
    }
     100% {
       transform: translate(-50%, -75%) rotate(360deg);
    }
  }

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reporte </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <div class="box">
                    <div class="box-body">






                                    <div class="m-3">
                                        <div class="box">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="col-xs-12">
                                                    <div class="card-header-tab card-header" style="justify-content: center;">
                                                        <h2 align="center" id="Titulo_Reporte">
                                                            <!-- se llena por ajax -->
                                                        </h2>
                                                    </div>
                                                    <form action="RP_ReportePersonalizado.php" method="POST" enctype="multipart/form-data" id="Form_Reportes">

                                                        <div id="Div_CargaAjaxReportes">
                                                            <!-- se llena por ajax -->
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <hr>
                                                            <br>
                                                            <center style="padding: 20px;"><br><br><button type="submit" class="btn btn-pill btn-anim" name="BotonActualizar" style="width:67vw;" id="BotonGenerar" disabled><span>Generar</span><i></i></button></center>
                                                            <br>
                                                        </div>
                                                    </form>
                                                </div>

                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
    







                                            </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>



    <?php
    include 'footer.php';

    ?>

    <script>
        function TipoBusqueda(valor) {
            if (valor == "Rango") {
                document.getElementById("div_fechas").style.display = "block";
                document.getElementById("div_meses").style.display = "none";

                if (document.getElementById("mesbusqueda")) {
                    document.getElementById("mesbusqueda").value = "";
                }
                if (document.getElementById("anualbusqueda")) {
                    document.getElementById("anualbusqueda").value = "";
                }

            } else {
                document.getElementById("div_fechas").style.display = "none";
                document.getElementById("div_meses").style.display = "block";

                document.getElementById("desde").value = "";
                document.getElementById("hasta").value = "";
            }

            if (document.getElementById("RangoFechasGuia")) {
                document.getElementById("RangoFechasGuia").innerHTML = "";
            }

        }

        function ConfigurarFecha() {

            var mes = document.getElementById("mesbusqueda").value;
            var anual = document.getElementById("anualbusqueda").value;

            if (mes != "" && anual != "") {

                var diasMes = new Date(anual, mes, 0).getDate();
                var diasSemana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

                for (var dia = 1; dia <= diasMes; dia++) {

                    var ultimodia = dia;
                }
                console.log(ultimodia)
                var fechainicio = new Date(anual, mes - 1, "01");
                var fechafinal = new Date(anual, mes - 1, ultimodia);
                console.log("inicio " + fechainicio + " final " + fechafinal);
                document.getElementById("desde").value = fechainicio.toJSON().slice(0, 10);
                document.getElementById("hasta").value = fechafinal.toJSON().slice(0, 10);

                if (document.getElementById("RangoFechasGuia")) {
                    document.getElementById("RangoFechasGuia").innerHTML = "<hr> <label> Fecha <br> [" + fechainicio.toJSON().slice(0, 10) + " - " + fechafinal.toJSON().slice(0, 10) + "]</label>";
                }
            }
        }

        function CargarFiltros(Tipo1) {
            $.ajax({
                type: "POST",
                url: "RP_Ajax_2.php",
                data: {
                    Tipo: Tipo1,
                },
                success: function(response) {
                    $('#Div_CargaAjaxReportes').html(response);
                    if (response != "") {
                        document.getElementById('BotonGenerar').disabled = false;
                        document.getElementById('Titulo_Reporte').innerHTML = "Reporte de <?= $Tipo; ?>";
                    } else {
                        document.getElementById('BotonGenerar').disabled = true;
                        document.getElementById('Titulo_Reporte').innerHTML = "";
                    }
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            CargarFiltros("<?= $Tipo; ?>");
        })
    </script>