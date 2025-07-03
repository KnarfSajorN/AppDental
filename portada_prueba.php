<?php
include 'header.php';
include 'menu.php';

?>
<style>
.content-wrapper {
    background: white;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!--100vh para que quede bien el footer-->
    <!-- Content Header (Page header) -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/js/bootstrap.min.js"></script>

    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>

        </ol>
    </section>
<style type="text/css">
.content-wrapper {
    min-height: 100% !important;
}

    /* CARDS */

.cards {
  display: flex;
  flex-wrap: wrap;
  /*justify-content: space-between;*/
  place-content: center;
  justify-content: center;
}

.card {
  margin: 20px;
  padding: 20px;
  width: 90%;
  min-height: 200px;
  display: grid;
  grid-template-rows: 20px 50px 1fr 50px;
  border-radius: 10px;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
  transition: all 0.9s;
}

.card:hover {
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
  transform: scale(1.05);
}

.card__link,
.card__exit,
.card__icon {
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.9);
}

.card__link::after {
  position: absolute;
  top: 25px;
  left: 0;
  content: "";
  width: 0%;
  height: 3px;
  background-color: rgba(255, 255, 255, 0.6);
  transition: all 0.9s;
}

.card__link:hover::after {
  width: 100%;
}

.card__exit {
  grid-row: 1/2;
  justify-self: end;
}

.card__icon {
  grid-row: 2/3;
  font-size: 30px;
  text-align: center;
}

.card__title {
  grid-row: 3/4;
  font-weight: 400;
  color: #ffffff;
  justify-self: center;
}

.card__apply {
  grid-row: 4/5;
  align-self: center;
}

/* CARD BACKGROUNDS */

.card-1 {
  background: radial-gradient(#17b5c3, #3c8dbc);
}

.card-2 {
  background: radial-gradient(#fbc1cc, #fa99b2);
}

.card-3 {
  background: radial-gradient(#76b2fe, #b69efe);
}

.card-4 {
  background: radial-gradient(#60efbc, #58d5c9);
}

.card-5 {
  background: radial-gradient(#f588d8, #c0a3e5);
}

</style>

<?php
/*
$perfil = funcionMaster($_SESSION['ID'],'ID','menu','usuarios');

$QueryFondo = mysqli_query($conn3, "SELECT * FROM  fondosSistemas WHERE perfil = '$perfil'");
while ($RowFondo = mysqli_fetch_array($QueryFondo)) {
    $contador++;
    $Arreglo1[$contador]=$RowFondo["ruta"];
}

$indiceAleatorio = array_rand($Arreglo1);
$valorAleatorio = $Arreglo1[$indiceAleatorio];
//echo $valorAleatorio;
if($valorAleatorio!=""){
    $Background = "background-image: url($valorAleatorio);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;";
}

echo "<style>
    .content-wrapper{
        $Background
    }
    </style>";
*/
?>



    <div class="content">

            <div class="main-container">
                <div class="cards">
                    <div class="card card-1">
                    <div class="card__icon"><i class="fa-solid fa-link"></i> Accesos Directos <i class="fa-solid fa-link"></i> </div>
                    <h2 class="card__title">
                        <?php
                            $grupo = funcionMaster($_SESSION['ID'],'ID','menu','usuarios');

                            $QueryMenu = mysqli_query($conn3, "SELECT * FROM  grupos WHERE id = '$grupo'");
                            while ($RowMenu = mysqli_fetch_array($QueryMenu)) {
                                
                                $Arreglo_Grupos = json_decode($RowMenu['Arreglo_Grupos']);

                                foreach ($Arreglo_Grupos as $key => $value) {
                                //echo $value;  
                                $ArregloMenuFinal=[];
                                $querySubmenu = mysqli_query($conn3, "SELECT * FROM  Grupos_Menu WHERE id = '$value'");
                                while ($RowSubMenu = mysqli_fetch_array($querySubmenu)) {
                                    $ArregloMenu = json_decode($RowSubMenu['Arreglo'],true);
                                }

                                foreach ($ArregloMenu as $key1 => $value1) {
                                    if($value1["Portada"]=="1"){
                                    
                                        $Arreglo["id"]= $value1["id"];
                                        $Arreglo["Nombre"] = $value1["Nombre"];
                                        $Arreglo["Icono"] = $value1["Icono"];
                                        $Arreglo["Color"] = $value1["Color"];
                                        $Arreglo["Ruta"] = funcionMaster($value1["id"],"id","pantalla","main_menu");
                                        $Arreglo["Orden"] = $value1["Orden"];

                                        $ArregloMenuFinal[$value1["Orden"]] = $Arreglo;
                                    
                                    }
                                }


                                foreach ($ArregloMenuFinal as $key => $value) {
                                    $ColorBoton="";
                                    if($value["Color"]!=""){
                                        $ColorBoton = "background-color:".$value["Color"].";";
                                    }
                                    echo "<button class='btn btn-primary btn-sm' title='$value[Nombre]' style='width: 50px;display: inline;height: 30px;margin-right: 10px;{$ColorBoton}' onclick=\"window.location.href='$value[Ruta]'\"><i class='$value[Icono]'></i> </button>";
                                }
                                

                            }
                        }

                        ?>
                    </h2>
                    <p class="card__apply">
                        <!--<a class="card__link" href="#">Apply Now <i class="fas fa-arrow-right"></i></a>-->
                    </p>
                    </div>
                </div>
            </div>

        <div class="box" style="background-color:white;padding: 20px;">

            <div class="box-body row">

                <!---->
                <div class="col-md-6">
                    <button class="btn btn-block btn-primary btn-sm" onclick="toggleContent()">Crear Citas</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-block btn-primary btn-sm" onclick="toggleContent1()">Crear Pacientes</button>
                </div>
                <div id="myContent" style="display: none;">
                    <div align="center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="GET" action="agregarCitas.php">
                                    <div class="col-md-12">
                                        <hr size="100" width="100%" color="#0000FF">
                                    </div>
                                    <div class="col-md-9">
                                        <select id="clienteId" name="clienteId" class="form-control select2"
                                            style="width: 100%;" required="required" onChange="verHistoria();">
                                            <option value="" selected="selected">Seleccione un Paciente</option>
                                            <?php
                      $queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente");
                      $nrowl = mysqli_num_rows($queryList);
                      while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                        $nombre_cliente      = $row_recordset32['nombre_cliente'];
                        $cliente_id      = $row_recordset32['cliente_id'];
                        $CODI_CLIENTE      = $row_recordset32['CODI_CLIENTE'];
                        echo "<option value='$cliente_id'> $CODI_CLIENTE - $nombre_cliente</option>";
                      }
                      ?>
                                        </select>
                                        <div id="div-results"></div>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-block btn-primary btn-sm"> <i
                                                class="fa fa-glyphicon glyphicon-plus"></i> Agendar cita </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </div>

                <script>
                function toggleContent() {
                    var content = document.getElementById("myContent");
                    if (content.style.display === "none") {
                        content.style.display = "block";
                    } else {
                        content.style.display = "none";
                    }
                }
                </script>


                <!---->
                <div class="col-md-12">
                    <hr size="100" width="100%" color="#0000FF">
                </div>
                <!---->


                <div id="myContent1" style="display: none;">

                    <?php
          $queryList = mysqli_query($conn3, "SELECT rips FROM config where ID_Usuario = $ID");
          $nrowl = mysqli_num_rows($queryList);
          while ($row_recordset32 = mysqli_fetch_array($queryList)) {
            $ID = $row_recordset32['ID'];
            $rips = $row_recordset32['rips'];
            $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
          }
          $Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5).'_'.$idcliente;
          $Clave_Web = $CODI_CLIENTE.$idcliente;
          
          mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");
          
          $q=mysqli_query($conn3,"select MAX(cliente_id) as cliente_id from cliente");
          $data=mysqli_fetch_array($q);
          $clienteId = $data['cliente_id'];
          if ($rips == 0) { ?>
                    <div class="col-md-12 content-card">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" data-background="color" data-color="blue">
                                <div class="content">
                                    <h4 class="title"><a href="#">
                                            <h2> Registrar paciente</h2>
                                        </a></h4>

                                    <div class="description">
                                        <form action="guardarCliente_escritorio.php" method="POST"
                                            name="formularioActualizarcliente" enctype="multipart/form-data">

                                            <div class="form-group col-md-3">
                                                <div align="left"> Tipo </div>
                                                <select id="tipo" name="tipo" class="form-control input-lg select"
                                                    style="width: 100%;" required>
                                                    <option value=""> Seleccione</option>
                                                    <option value="CC"> CC - Cédula de ciudadanía</option>
                                                    <option value="CE"> CE - Cédula de extranjería</option>
                                                    <option value="TI"> TI - Tarjeta de identidad</option>
                                                    <option value="RC"> RC - Registro Civil</option>
                                                    <option value="CD"> CD - Cédula Digital</option>
                                                    <option value="CN"> CN - Comprobante del tramite del documento
                                                    </option>
                                                    <option value="NU"> NU - Número Único de identificación</option>
                                                    <option value="NI"> NI - Carnet de identidad - Documento nacional de
                                                        identidad </option>
                                                    <option value="PE"> PE - Permiso especial de permanencia</option>
                                                    <option value="PA"> PA - Pasaporte</option>
                                                    <option value="SC"> SC - Salvoconducto</option>
                                                    <option value="AS"> AS - Adulto sin identidad</option>
                                                    <option value="MS"> MS - Menor sin identificación</option>
                                                    <option value="PT"> PT - Permiso por Protección Temporal </option>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <div align="left"> Número de Cédula/ID</div>
                                                <input type="text" class="form-control input-lg" name="CODI_CLIENTE"
                                                    id="CODI_CLIENTE" placeholder="Cedula" required
                                                    onChange="VerificarDocumento;">
                                                <div id="div-results-cedula"></div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left"> Fecha de nacimiento </div>
                                                <input type="date" class="form-control input-lg" id="fechaNacimiento"
                                                    name="fechaNacimiento" placeholder="Edad" onChange="verEdad();"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div align="left"> Edad <div id="div-edad"></div>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left">Nombre</div>
                                                <input type="text" class="form-control input-lg" id="primer_nombre"
                                                    name="primer_nombre" placeholder="Nombre" required>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left">Apellido</div>
                                                <input type="text" class="form-control input-lg" id="primer_apellido"
                                                    name="primer_apellido" placeholder="Apellido" required>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <div align="left"> Género </div>
                                                <select id="genero" name="genero" class="form-control input-lg select"
                                                    style="width: 100%;" required>
                                                    <option value="" selected> Seleccione </option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="I">Indeterminado</option>
                                                    <option value="O">Otro</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left">Sucursal del Paciente</div>

                                                <select id="sucursal_cliente" name="sucursal_cliente"
                                                    class="form-control input-lg select" style="width: 100%;">
                                                    <option value=""> Seleccione </option>
                                                    <?php sucursalesSelect($_SESSION['ID']);  ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <div align="left"> Email </div>
                                                <input type="email" class="form-control input-lg" id="correo_cliente"
                                                    name="correo_cliente" placeholder="Correo">
                                            </div>


                                            <div class="form-group col-md-4" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Indicativo</strong> </font>
                                                </div>
                                                <select id="indicativo" name="indicativo" class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("", "numero", "numero,nombre", "indicativos");
                            ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-8" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Número de Celular notificaciones
                                                            Whatsapp</strong></font>
                                                </div>
                                                <input type="number" class="form-control input-lg" id="Whatsapp"
                                                    name="whatsapp" placeholder="">
                                            </div>
                                            <div class="form-group col-md-12">


                                                <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                                <br>
                                                <center><button type="submit"
                                                        class="btn btn-block btn-primary btn-sm">Guardar</button>
                                                </center>

                                            </div>

                                        </form>

                                    </div><!-- cierre de la descripcion-->
                                </div>
                            </div> <!-- end card -->
                        </div>
                    </div>
                    <?php } else { 
            $Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5).'_'.$idcliente;
            $Clave_Web = $CODI_CLIENTE.$idcliente;
            
            mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");
            
            $q=mysqli_query($conn3,"select MAX(cliente_id) as cliente_id from cliente");
            $data=mysqli_fetch_array($q);
            $clienteId = $data['cliente_id'];
            ?>

                    <div class="col-md-12 content-card">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" data-background="color" data-color="blue">
                                <div class="content">
                                    <h4 class="title"><a href="#">
                                            <h2> Registrar paciente</h2>
                                        </a></h4>
                                    <div class="description">

                                        <form action="guardarCliente_escritorio.php" method="POST"
                                            name="formularioActualizarcliente" enctype="multipart/form-data">
                                            <div class="form-group col-md-3">
                                                <div align="left"> Tipo </div>
                                                <select id="tipo" name="tipo" class="form-control input-lg select"
                                                    style="width: 100%;" required>
                                                    <option value=""> Seleccione</option>
                                                    <option value="RC"> RC - Registro Civil</option>
                                                    <option value="TI"> TI - Tarjeta de identidad</option>
                                                    <option value="CC"> CC - Cédula de ciudadanía</option>
                                                    <option value="CE"> CE - Cédula de extranjería</option>
                                                    <option value="PA"> PA - Pasaporte</option>
                                                    <option value="MS"> MS - Menor sin identificación</option>
                                                    <option value="AS"> AS - Adulto sin identidad</option>
                                                </select>

                                            </div>

                                            <div class="form-group col-md-3">
                                                <div align="left"> Número de Cédula/ID</div>
                                                <input type="text" class="form-control input-lg" name="CODI_CLIENTE"
                                                    id="CODI_CLIENTE" placeholder="Cedula" required
                                                    onChange="VerificarDocumento(this);">
                                                <div id="div-results-cedula"></div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left"> Fecha de nacimiento </div>
                                                <input type="date" class="form-control input-lg" id="fechaNacimiento"
                                                    name="fechaNacimiento" placeholder="Edad" onChange="verEdad();"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div align="left"> Edad <div id="div-edad"></div>
                                                </div>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left">Primer Nombre</div>
                                                <input type="text" class="form-control input-lg" id="primer_nombre"
                                                    name="primer_nombre" placeholder="Nombre" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div align="left"> Segundo Nombre </div>
                                                <input type="text" class="form-control input-lg" id="segundo_nombre"
                                                    name="segundo_nombre" placeholder="Segundo Nombre">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div align="left">Primer Apellido</div>
                                                <input type="text" class="form-control input-lg" id="primer_apellido"
                                                    name="primer_apellido" placeholder="Apellido" required>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <div align="left"> Segundo Apellido </div>
                                                <input type="text" class="form-control input-lg" id="segundo_apellido"
                                                    name="segundo_apellido" placeholder="Segundo Apellido">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left"> Género </div>
                                                <select id="genero" name="genero" class="form-control input-lg select"
                                                    style="width: 100%;" required>
                                                    <option value="" selected> Seleccione </option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="I">Indeterminado</option>
                                                    <option value="O">Otro</option>
                                                </select>
                                            </div>



                                            <div class="col-md-4" id="pais_div">
                                                <div align="left"> Pais </div>
                                                <select name="pais" id="pais" class="form-control input-lg select2"
                                                    style="width: 100%;" onchange="paises(this.value);" required>
                                                    <option value="">Elegir opción</option>

                                                    <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("", "Codigo", "Pais", "Paises");
                            ?>

                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <div align="left"> Ciudad </div>
                                                <select name="ciudad" id="ciudad" class="form-control input-lg select2"
                                                    style="width: 100%;" required>


                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left">Zona residencial </div>

                                                <select id="zona" name="zona" class="form-control input-lg select"
                                                    style="width: 100%;" required="">
                                                    <option>Urbana</option>
                                                    <option>Rural</option>

                                                </select>

                                            </div>

                                            <div class="form-group col-md-4">
                                                <div align="left">Tipo Afiliado</div>
                                                <select class="form-control input-lg select" name="tipoUsuario"
                                                    required>
                                                    <option value=""> Seleccione </option>
                                                    <option>Contributivo</option>
                                                    <option>Subsidiado</option>
                                                    <option>Vinculado</option>
                                                    <option>Particular</option>
                                                    <option>Otro</option>

                                                </select>
                                            </div>


                                            <div class="form-group col-md-4" style="margin: auto;">
                                                <div align="left">Entidad de Salud </div>
                                                <!--     <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud">-->
                                                <select id="cie" name="entidadSalud" class="form-control select2"
                                                    style="width: 100%;">
                                                    <option value="" selected="selected">Seleccione ...</option>
                                                    <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM administradora");


                            $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                              $cod = $row_recordset32A['codigo'];
                              $nombre = $row_recordset32A['nombre'];


                              echo "<option value='$cod'>$cod -- $nombre </option>";
                            }

                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div align="left">Sucursal del Paciente</div>

                                                <select id="sucursal_cliente" name="sucursal_cliente"
                                                    class="form-control input-lg select" style="width: 100%;">
                                                    <option value=""> Seleccione </option>
                                                    <?php sucursalesSelect($_SESSION['ID']);  ?>
                                                </select>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <div align="left"> Email </div>
                                                <input type="email" class="form-control input-lg" id="correo_cliente"
                                                    name="correo_cliente" placeholder="Correo">
                                            </div>


                                            <div class="form-group col-md-4" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Indicativo</strong> </font>
                                                </div>
                                                <select id="indicativo" name="indicativo" class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("", "numero", "numero,nombre", "indicativos");
                            ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4" style="margin-bottom: auto;">
                                                <div align="left">
                                                    <font color="green"> <strong>Número de Celular notificaciones
                                                            Whatsapp</strong></font>
                                                </div>
                                                <input type="number" class="form-control input-lg" id="Whatsapp"
                                                    name="whatsapp" placeholder="">
                                            </div>


                                            <div class="form-group col-md-12">


                                                <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                                                <br>
                                                <center><button type="submit"
                                                        class="btn btn-block btn-primary btn-sm">Guardar</button>
                                                </center>

                                            </div>

                                        </form>

                                    </div><!-- cierre de la descripcion-->
                                </div>
                            </div> <!-- end card -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <script>
                function toggleContent1() {
                    var content = document.getElementById("myContent1");
                    if (content.style.display === "none") {
                        content.style.display = "block";
                    } else {
                        content.style.display = "none";
                    }
                }
                </script>
                <!---->
                <div class="row" style="text-align: center">
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <?php
            session_start();
            $ID = $_SESSION['ID'];

            $arrayDatos = [];

            $resultado = mysqli_query($conn3, "SELECT * FROM sinvetrios");
            while ($fila = mysqli_fetch_array($resultado)) {
              $Numero++;
              // que vamos a poner en la grafica
              array_push($arrayDatos, [$Numero . '-' . $fila[2], $fila[5]]);
            }
            ?>

                        <?php
            $_GET['n'] = 1;
            $_GET['nombre'] = 'Grafica Inventario';
            $_GET['Tiempo'] = '800';
            $_GET['datos'] = json_encode($arrayDatos);
            ?>

                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Inventarios (Existencia)</h3>
                        </strong>

                    </div>

                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <tbody>
                            <?php
              session_start();
              $ID = $_SESSION['ID'];
              $arrayDatosA = [];
              $resultado = mysqli_query($conn3, "SELECT * FROM cliente");
              $contadorM = 0; // Variable para contar los registros masculinos
              $contadorF = 0; // Variable para contar los registros femeninos

              while ($fila = mysqli_fetch_array($resultado)) {
                $Sexo_P = $fila['11'];

                if ($Sexo_P == 'M') {
                  $contadorM++;
                } else {
                  $contadorF++;
                }
              }
              // Agregar los datos a la gráfica
              array_push($arrayDatosA, ['Masculino', $contadorM]);
              array_push($arrayDatosA, ['Femenino', $contadorF]);
              ?>
                            <?php
              $_GET['n'] = 2;
              $_GET['nombre'] = 'Grafica Sexo';
              $_GET['Tiempo'] = '900';
              $_GET['datos'] = json_encode($arrayDatosA);
              ?>
                            <?php include 'generarGrafica.php' ?>


                            <strong>
                                <h3>Pacientes (Sexo)</h3>
                            </strong>

                    </div>
                    <div class="col-md-6">
                        <!-- /.form-group -->
                        <?php
            session_start();
            $ID = $_SESSION['ID'];
            $arrayDatosB = [];
            $resultado = mysqli_query($conn3, "SELECT * FROM cliente");
            $paises = []; // Array para almacenar los países
            $contadorPaises = []; // Array para almacenar los contadores de cada país

            while ($fila = mysqli_fetch_array($resultado)) {
              $pais = $fila[66];

              // Verificar si el país ya está en el array
              if (in_array($pais, $paises)) {
                // Obtener el índice del país en el array
                $indice = array_search($pais, $paises);
                // Incrementar el contador correspondiente al país
                $contadorPaises[$indice]++;
              } else {
                // Agregar el país al array
                array_push($paises, $pais);
                // Inicializar el contador del país en 1
                array_push($contadorPaises, 1);
              }
            }

            // Agregar los datos a la gráfica
            for ($i = 0; $i < count($paises); $i++) {
              $nombrePais = $paises[$i];
              $contador = $contadorPaises[$i];
              array_push($arrayDatosB, [$nombrePais, $contador]);
            }
            ?>


                        <?php
            $_GET['n'] = 3;
            $_GET['nombre'] = 'Grafica Ciudad';
            $_GET['Tiempo'] = '1000';
            $_GET['datos'] = json_encode($arrayDatosB);
            ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Pacientes (País)</h3>
                        </strong>

                    </div>
                    <!---->
                    <div class="col-md-6">
                        <!-- /.form-group -->

                        <?php
            session_start();
            $ID = $_SESSION['ID'];

            $arrayDatosC = [];

            $resultado = mysqli_query($conn3, "SELECT * FROM cliente");
            $conteoEdad = []; // Array asociativo para contar las edades

            while ($fila = mysqli_fetch_array($resultado)) {
              $fechaNacimiento = $fila[30];

              if (!empty($fechaNacimiento)) {
                $edad = CalculoEdadPaciente($fechaNacimiento); // Calcular la edad a partir de la fecha de nacimiento

                if (!isset($conteoEdad[$edad])) {
                  $conteoEdad[$edad] = 1;
                } else {
                  $conteoEdad[$edad]++;
                }
              }
            }

            // Mostrar el total de edades en el resumen
            $totalEdades = array_sum($conteoEdad);
            // echo "Total de edades: " . $totalEdades . "<br>";

            foreach ($conteoEdad as $edad => $conteo) {
              array_push($arrayDatosC, [$edad, $conteo]);
            }


            ?>


                        <?php
            $_GET['n'] = 4;
            $_GET['nombre'] = 'Grafica Rango de Edades';
            $_GET['Tiempo'] = '1100';
            $_GET['datos'] = json_encode($arrayDatosC);
            ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Pacientes (Rango de Edad)</h3>
                        </strong>

                    </div>
                    <!---->
                    <!---->
                    <div class="col-md-6">

                        <?php
            session_start();
            $ID = $_SESSION['ID'];

            $arrayDatosD = [];

            $fechaInicio = "2023-01-01"; // Fecha de inicio del rango
            $fechaFin = "2023-12-31"; // Fecha de fin del rango

            $resultado = mysqli_query($conn3, "SELECT fecha, COUNT(*) AS total_citas FROM citas WHERE fecha BETWEEN '$fechaInicio' AND '$fechaFin' GROUP BY fecha");
            while ($fila = mysqli_fetch_array($resultado)) {
              $Numero++;
              // Formatear la fecha en el formato "DD/MM/AAAA"
              $fechaFormateada = date("d/m/Y", strtotime($fila[0]));
              // que vamos a poner en la grafica
              array_push($arrayDatosD, [$Numero . '-' . $fechaFormateada, $fila['total_citas']]);
            }
            ?>

                        <?php
            $_GET['n'] = 5;
            $_GET['nombre'] = 'Grafica Citas Generadas';
            $_GET['Tiempo'] = '1100';
            $_GET['datos'] = json_encode($arrayDatosD);
            ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Citas Generadas</h3>
                        </strong>

                    </div>
                    <!---->
                    <!---->
                    <div class="col-md-6">

                        <?php
            session_start();
            $ID = $_SESSION['ID'];

            $arrayDatosE = [];

            $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica");
            $conteoDiagnosticos = []; // Array asociativo para contar los diagnósticos por código

            while ($fila = mysqli_fetch_array($resultado)) {
              for ($i = 27; $i <= 30; $i++) {
                $codigo = $fila[$i];

                if (!empty($codigo)) {
                  if (!isset($conteoDiagnosticos[$codigo])) {
                    $conteoDiagnosticos[$codigo] = 1;
                  } else {
                    $conteoDiagnosticos[$codigo]++;
                  }
                }
              }
            }

            // Mostrar el total de diagnósticos en el resumen
            $totalDiagnosticos = array_sum($conteoDiagnosticos);
            // echo "Total de diagnósticos: " . $totalDiagnosticos . "<br>";

            foreach ($conteoDiagnosticos as $codigo => $conteo) {
              array_push($arrayDatosE, [$codigo, $conteo]);
            }

            ?>

                        <?php
            $_GET['n'] = 6;
            $_GET['nombre'] = 'Grafica CIE-10';
            $_GET['Tiempo'] = '1000';
            $_GET['datos'] = json_encode($arrayDatosE);
            ?>
                        <?php include 'generarGrafica.php' ?>

                        <strong>
                            <h3>Reporte de CIE-10</h3>
                        </strong>

                    </div>
                    <!---->
                    <!----->
                    <div class="col-md-12" style="text-align: center">
                        <strong>Panel de Encuestas</strong>
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <title>Gráfica Mixed</title>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <style>
                            canvas {
                                max-width: 800px;
                                max-height: 400px;
                            }
                            </style>
                        </head>

                        <body>
                            <div style="display: flex; justify-content: center;">
                                <canvas id="donaChart"></canvas>
                            </div>
                            <script>
                            <?php
                        //Se toma de la tabla de citas, el puntaje y se hace un calculo global mostrando el promedio de satisfacción
                        // Al momento de darle "ASISTIO" al cliente le llegar un mensaje con la encuesta y al llenarla se verá reflejada en este apartado
                        //by: Emma 20.06.2023
                        $ID = $_SESSION['ID'];
                        $clienteId = $_GET['clienteId'];
                        $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                        FROM citas
                        WHERE c_puntaje > '' AND fecha <= CURDATE() AND estado = 3
                        GROUP BY MONTH(fecha)
                        ");

                        // Preparar los datos para la gráfica
                        $labels = [];
                        $values = [];

                        while ($fila = mysqli_fetch_array($resultado)) {
                          $mes = $fila['mes'];
                          $cantidad = $fila['cantidad'];
                          $promedio = $fila['promedio'];

                          // Verificar que el promedio sea válido
                          if ($promedio >= 1 && $promedio <= 5) {
                            $labels[] = obtenerNombreMes($mes); // Agregar el nombre del mes al array de etiquetas
                            $values[] = $promedio; // Agregar el promedio al array de valores

                            // Actualizar el promedio global y la cantidad total de pacientes
                            $totalPuntajes += $promedio * $cantidad;
                            $cantidadCitas += $cantidad;
                          }
                        }
                        // Calcular el promedio global
                        if ($cantidadCitas > 0) {
                          $promedioGlobal = $totalPuntajes / $cantidadCitas;
                        } else {
                          $promedioGlobal = 0;
                        }
                        // Función para obtener el nombre del mes en base a su número
                        function obtenerNombreMes($numeroMes)
                        {
                          $nombresMeses = [
                            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                            'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                          ];
                          return $nombresMeses[$numeroMes - 1];
                        }
                        ?>
                            // Crea la gráfica utilizando Chart.js
                            var ctx = document.getElementById('donaChart').getContext('2d');
                            var mixedChart = new Chart(ctx, {
                                type: 'line', // Cambiar el tipo de gráfico a 'line'
                                data: {
                                    labels: <?php echo json_encode($labels); ?>,
                                    datasets: [{
                                        label: 'Nivel de Satisfacción',
                                        data: <?php echo json_encode($values); ?>,
                                        backgroundColor: 'rgba(108, 196, 54, 97)',
                                        borderColor: 'rgba(108, 196, 54, 97)',
                                        borderWidth: 2,
                                        pointRadius: 4,
                                        pointHoverRadius: 6
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            max: 5,
                                            stepSize: 1
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: true,
                                            labels: {
                                                usePointStyle: true,
                                            }
                                        }
                                    }
                                }
                            });
                            </script>
                            <div>
                                <div class="col-md-3">
                                    <p><strong> PROMEDIO MENSUAL:</strong>
                                        <?php echo number_format($promedio, 1); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> CANTIDAD DE PACIENTES ENCUESTADOS (MES ACTUAL):</strong>
                                        <?php echo $cantidad; ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> PROMEDIO GLOBAL:</strong>
                                        <?php echo number_format($promedioGlobal, 1); ?></p>
                                </div>
                                <div class="col-md-3">
                                    <p><strong> CANTIDAD DE PACIENTES ENCUESTADOS (GLOBAL):</strong>
                                        <?php echo $cantidadCitas; ?></p>
                                </div>


                            </div>
                        </body>

                        </html>
                    </div>

                    <!----->
                    <!---->

                </div>
                <!--nUEVO-->

                <!--NUEVO-->
            </div>
            <br>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<br>
<br>
<br>
<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
  $Sc = base64_decode("keyMaster");
  $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
  return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>

<script type="text/javascript">
// SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente"
window.addEventListener('load', () => {
    Select2Dinamico(
        "#clienteIngreso", {
            selectFrom: "<?= Encriptar("*") ?>",
            name: "<?= Encriptar("cliente") ?>",
            value: "<?= Encriptar("cliente_id") ?>",
            text: "<?= Encriptar("nombre_cliente || CODI_CLIENTE") ?>",
            likeWhere: "<?= Encriptar("nombre_cliente || CODI_CLIENTE") ?>",
            order: "<?= Encriptar(json_encode(['order by' => 'nombre_cliente'])) ?>",
            clausula: {
                data: "<?= Encriptar("") ?>",
                value: [''],
            },
            carapter: "false",
            campoCreador: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
                nombreCreador: false,
                conditionInsert: false,
                conditionSelect: false,
            })),
        }, false, false
    );
});

function funcionDinamica() {
    Select2Dinamico(
        "#tipoIngreso", {
            selectFrom: "<?= Encriptar("*") ?>",
            name: "<?= Encriptar("estadosIngreso") ?>",
            value: "<?= Encriptar("id") ?>",
            text: "<?= Encriptar("nombreEstado") ?>",
            likeWhere: "<?= Encriptar("nombreEstado") ?>",
            order: "<?= Encriptar(json_encode(['group by' => 'id'])) ?>",
            clausula: {
                data: "<?= Encriptar("estado = 1") ?>",
                value: [''],
            },
            carapter: "true",
            campoCreador: btoa(JSON.stringify({
                nombreCreador: false,
                conditionInsert: false,
                conditionSelect: false,
            })),
        }, false, false
    );
}

function verIngresos(data) {
    data.cargarCard = "cargarCard";
    $.ajax({
        type: "POST",
        url: "consultarClienteIngresos.php",
        data: data,
        success: function(response) {
            $('#div-Ingresos').html(response);
            $("#form-ingresos").submit(function(e) {
                e.preventDefault();
                var data = new FormData(this);
                addEstado(data);
            });
        }
    });
};

function addEstado(data) {
    $.ajax({
        type: "POST",
        url: "consultarClienteIngresos.php",
        processData: false,
        contentType: false,
        data: data,
        success: function(response) {
            let datos = JSON.parse(response);
            if (datos.status == 1) {
                verIngresos({
                    cliente_id: atob(datos.cliente_id),
                    usuario_id: <?= $_SESSION['ID'] ?>
                })
            } else {
                alert("El estado no fue agregado");
            }
        }
    });
}

function verEstado(data) {
    data.cargarEstadoTipo = "cargarEstadoTipo";
    $.ajax({
        type: "POST",
        url: "consultarClienteIngresos.php",
        data: data,
        success: function(response) {
            $('#div-campoAdicional').html(response);
        }
    });
};

function cerrarEstado(data) {
    data.cerrarEstado = "cerrarEstado";
    $.ajax({
        type: "POST",
        url: "consultarClienteIngresos.php",
        data: data,
        success: function(response) {
            let datos = JSON.parse(response);
            if (datos.status) {
                verIngresos({
                    cliente_id: atob(datos.cliente_id),
                    usuario_id: <?= $_SESSION['ID'] ?>
                });
            } else {
                console.log(response);
                alert("El estado no se ha Cerrado");
            }
        }
    });
};

function removerEstado(data) {
    data.removerEstado = "removerEstado";
    $.ajax({
        type: "POST",
        url: "consultarClienteIngresos.php",
        data: data,
        success: function(response) {
            let datos = JSON.parse(response);
            if (datos.status) {
                verIngresos({
                    cliente_id: atob(datos.cliente_id),
                    usuario_id: <?= $_SESSION['ID'] ?>
                });
            } else {
                console.log(response);
                alert("El estado no se ha Removido");
            }
        }
    });
};
</script>
<script type="text/javascript">
//Para que se vea los paises
function paises(valor) {
    if (valor == "CO") {

        var pais = document.getElementById('pais_div');

        var select = document.createElement("div");
        select.innerHTML =
            '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
        select.setAttribute('id', 'departamento_div');
        select.setAttribute('class', 'col-md-4');

        pais.insertAdjacentElement("afterend", select);
        //K.C

        $('#departamento').select2();

        $.ajax({
            type: "POST",
            url: "ajax_select.php",
            data: {
                where: "",
                value: "codigo",
                texto: "nombre",
                tabla: "departamentos"
            },
            success: function(response) {
                $('#departamento').html(response);

            }
        });

        $('#ciudad').empty();
    } else {

        $.ajax({
            type: "POST",
            url: "ajax_select.php",
            data: {
                where: "WHERE Codigo_Pais='" + valor + "'",
                value: "Nombre",
                texto: "Nombre_Tildes",
                tabla: "Ciudades"
            },
            success: function(response) {
                $('#ciudad').html(response);

            }
        });

        var departamento = document.getElementById('departamento_div');
        if (typeof(departamento) != 'undefined' && departamento != null) {
            departamento.remove();
        }


    }
}

function departamento_ciudad(valor) {
    $.ajax({
        type: "POST",
        url: "ajax_select.php",
        data: {
            where: "WHERE Codigo_Departamento='" + valor + "'",
            value: "id",
            texto: "Nombre_Tildes",
            tabla: "Ciudades"
        },
        success: function(response) {
            $('#ciudad').html(response);

        }
    });
}




























function verHistoria() {
    // estas son las variables que enviamos

    var clienteId = $("#clienteId").val();


    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
        type: "POST",
        url: "consultarCliente.php",
        data: {
            clienteId: clienteId
        },
        success: function(response) {
            $('#div-results').html(response);

        }
    });
};


$(document).ready(function() {

    //   $('#btn1').on('click', function(){






    $('#btn2').on('click', function() {
        $.ajax({
            type: "POST",
            url: "adios.php",
            success: function(response) {
                $('#div-results').html(response);
            }
        });
    });




});

function Convenio(valor) {
    //ajax para cargar los convenios
    $.ajax({
        type: "POST",
        url: "ajax_rips.php",
        data: {
            entidad_id: valor,
        },
        success: function(response) {
            $('#convenio').html(response);

        }
    });
}
//esta funcion verifica el documento si esta repetido muestra mensaje y borra el documento 
function VerificarDocumento(valor) {
    var CODI_CLIENTE = valor.value;
    var cliente_id = $("#cliente_id").val(); // trae el clienteId

    $.ajax({
        type: "POST",
        url: "Ajax_VerificarDocumento.php",
        data: {
            CODI_CLIENTE: CODI_CLIENTE,
            cliente_id: cliente_id
        },
        success: function(response) {

            var arreglo = JSON.parse(response);
            $("#div-results-cedula").html(arreglo.Mensaje);
            if (arreglo.Estado != "True") {
                $(valor).val("");
            }
        }
    });
};
/* jquery onchange input[id="CODI_CLIENTE"] */
$("#CODI_CLIENTE").on('change', function() {
    VerificarDocumento(this);
});


function verEdad() {
    // estas son las variables que enviamos

    var fechaNacimiento = $("#fechaNacimiento").val();


    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
        type: "POST",
        url: "ajax_edad.php",
        data: {
            fechaNacimiento: fechaNacimiento
        },
        success: function(response) {
            $('#div-edad').html(response);

        }
    });
};


$(window).on("load", function() {
    $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
    $('#indicativo').select2();
});
</script>