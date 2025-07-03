<?php
include 'funciones/conn3.php';
$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent)
{

    if (strpos($user_agent, 'MSIE') !== FALSE)

        return 'Internet explorer';

    elseif (strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge

        return 'Microsoft Edge';

    elseif (strpos($user_agent, 'Trident') !== FALSE) //IE 11

        return 'Internet explorer';

    elseif (strpos($user_agent, 'Opera Mini') !== FALSE)

        return "Opera Mini";

    elseif (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)

        return "Opera";

    elseif (strpos($user_agent, 'Firefox') !== FALSE)

        return 'Mozilla Firefox';

    elseif (strpos($user_agent, 'Chrome') !== FALSE)

        return 'Google Chrome';

    elseif (strpos($user_agent, 'Safari') !== FALSE)

        return "Safari";

    else

        return 'No hemos podido detectar su navegador';
}


$navegador = getBrowser($user_agent);

if ($navegador <> "Google Chrome") {

    echo "<div align='center'>";

    echo "El navegador con el que estas visitando esta web es: " . $navegador;

    echo "<br>";

    echo "Para un correcto Funcionamiento te recomedamos Utilizar Google Chrome ";

    echo "  <a href='https://www.google.es/chrome/browser/desktop/'>Descargar Aqui</a>";

    echo "</div>";
}

$usuario_id = $_GET['i'];

$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $LogoF               = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="'.$Base.'/logos/' . $LogoF . '" style="height: 3.5cm;width: auto;">';
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SievenSoft</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">

    <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <script type="text/javascript">
        window.$zopim || (function(d, s) {
            var z = $zopim = function(c) {
                    z._.push(c)
                },
                $ = z.s =
                d.createElement(s),
                e = d.getElementsByTagName(s)[0];
            z.set = function(o) {
                z.set.
                _.push(o)
            };
            z._ = [];
            z.set._ = [];
            $.async = !0;
            $.setAttribute("charset", "utf-8");
            $.src = "https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";
            z.t = +new Date;
            $.
            type = "text/javascript";
            e.parentNode.insertBefore($, e)
        })(document, "script");
    </script>
    <style>
        .centrar {
            position: absolute;
            /*nos posicionamos en el centro del navegador*/
            top: 20%;
            left: 50%;
            /*determinamos una anchura*/
            width: 400px;
            /*indicamos que el margen izquierdo, es la mitad de la anchura*/
            margin-left: -200px;
            /*determinamos una altura*/
            height: 300px;
            /*indicamos que el margen superior, es la mitad de la altura*/
            margin-top: -150px;
        }
    </style>


    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body style="background-color:#E6E6FA">




    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->


        <div class='centrar'>


            <!--      <img src="img/logo.png" height="20%" width="60%">-->
            <div class="box box-info" align="center">
                <div class="box-header with-border">
                    <!--<img src="https://medicalsoftplus.com/co224//logos/logodralbuja.png" height="40%" width="60%">-->


                    <h3 class="box-title"> </h3>
                </div>
                <div class="col-sm-12" align="">

                    <?php echo $Logo ?>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="verificarPaciente.php" method="POST">
                    <div class="box-body">


                        <div class="form-group" align="left">
                            <label for="inputEmail3" align="left" class="col-sm-12 control-label">Por favor ingrese su usuario</label>

                            <div class="col-sm-12">
                                <input type="email" name="mail" class="form-control" id="mail" placeholder="# Documento">
                            </div>
                        </div>

                        <div class="form-group" aling="left">
                            <label for="inputEmail3" align="left" class="col-sm-12 control-label">Ingrese su contraseña</label>

                            <div class="col-sm-12">
                                <input type="text" name="clave" class="form-control" id="clave" placeholder="Clave">
                            </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-block btn-primary btn-sm">
                                <h4> Acceder </h4>
                            </button>
                        </div>

                        <div class="form-group col-md-12">
                            <br>
                            <br>

                            <a href="#" onclick="validar();">
                                <font size="3"> <strong> clic aquí para cambiar su contraseña </strong> </font>
                            </a>
                        </div>
                        <div class="col-sm-12">
                            <div id="div-results"> </div>
                            <input type="hidden" name="usuario_id_relacionado" id="usuario_id_relacionado" value="<?=$_GET['i'];?>">
                </form>
            </div>

            <div align="center">

                <br>
                Desarrollado por <strong> <a target="_blank" href="https://www.sievensoft.com">SievenSoft</a> </strong>
            </div>

        </div>





        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>

<script type="text/javascript">
    function validar() {
        // estas son las variables que enviamos

        var nit = $("#nit").val();


        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_cliente_verificar.php",
            data: {
                nit: nit
            },
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };
</script>