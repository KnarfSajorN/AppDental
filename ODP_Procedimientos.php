<?php 

include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "ODP_Procedimiento";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {


    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'ODP_Iconos_SVG'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `ODP_Iconos_SVG` (
        `id` int(11) NOT NULL,
        `SVG` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `ODP_Iconos_SVG` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `ODP_Iconos_SVG` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $Arreglo = $_POST["Arreglo"];
    if(!isset($Arreglo["Icono"])){$Arreglo["Icono"]="";}
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        {$Campos},
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    } else {
        if ($nrowtabla == 1) {

            $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($Arreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $Examenes = $_POST['Examenes'];

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo Los Datos Correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "" AND $_GET['Valid']==1) {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Elimino El Dato Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];

    $NombreEditar= funcionMaster($_GET['Editar'], 'id', 'Nombre', "{$Nombre_Tabla}");

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
?>
    <script>
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    
                    if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "radio") {
                        document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];

                        if(index == "Color"){
                            CambioColor(Arreglo[index]);
                        }
                    }else
                    {
                        if(index == "Icono"){
                            //$('[name="Arreglo[Icono]"][value="'+Arreglo[index]+'"]').prop("checked", true);
                            //let procesado;
                            //procesado = Arreglo[index].split(" ").join("");
                            //console.log($('[name="Arreglo[Icono]"][value="'+Arreglo[index]+'"]'));
                            //console.log(procesado);
                            document.getElementById("Icono_"+Arreglo[index]).checked = true;
                            //console.log(document.getElementById("Icono_"+procesado));
                        }
                        if(index == "inventario_id"){
                            $("#inventario_id").val(Arreglo[index]).trigger('change');
                        
                        
                        }
                        
                    }
                }
            }
        };
    </script>
<?php
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>
<style>
.icon_svg > svg{
    width: 20px;
    height: 20px;
    zoom: 1.5;
}
</style>
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">

                <br>

                <section class="content">

                  <div class="box box-info" align="center">

                    <div class="card-body">

                      <div class="card-header-title font-size-lg text-capitalize font-weight-normal row" style="background-color:#17a2b812;padding: 20px;">
                        <div class="col-md-3" >

                          <a href="ODP_SubirSVG">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Icono </strong></h4>
                            </button>
                          </a>

                        <?php if ($_GET['Editar']) : ?>
                          <a href="ODP_Procedimientos" id="boton_modulo_nuevo" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
                        <?php endif ?>
                        </div>
                        <div class="col-md-6" style="align-self: center;">
                          <h2>Procedimientos de Odontopediatría</h2>
                        </div>
                        <div class="col-md-3">
                          <ul class="nav nav-justified">
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_informacion" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($_GET['Editar']) ? 'Editar <br>' . $NombreEditar : 'Nuevo' ?></a></li>
                            <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" id="boton_modulo_tabla" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li>
                          </ul>
                        </div>
                      </div>

                      <div class="tab-content">
                        <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data" id="FormularioInformacion">

                                <div class="form-group col-md-12">
                                    <hr>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                </div>

                                
                                <div class="form-group col-md-12">
                                    <label>Color</label>
                                    <input type="color" name="Arreglo[Color]" class="form-control input-lg" required onChange="CambioColor(this.value)">
                                </div>
                                

                                <div class="form-group col-md-12">
                                    <label>Icono</label>
                                    <div class="row col-md-12" style="height:300px;overflow-y: scroll;">
                                        <?php
                                            $queryList = mysqli_query($conn3, "SELECT * FROM  ODP_Iconos_SVG WHERE Activo='1' order by ID ASC ");
                                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                $id_svg = $rowMotorizado["id"];
                                                $SVG = $rowMotorizado["SVG"];
                                                echo "<div class='col-md-1 icon_svg' style='text-align: -webkit-center;padding-top: 20px;'>
                                                <input type='radio' id='Icono_$id_svg' name='Arreglo[Icono]' value='$id_svg' required>
                                                $SVG
                                                </div>";

                                            }
                                        ?>
                                    </div>
                                </div>
                                <br>


                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
                                <input type="hidden" name="Arreglo[ID_principal]" value="<?=$_SESSION['ID_principal']?>">
                                
                                <div class="form-group col-md-12">
                                    <hr>
                                </div>

                                <?php if ($_GET['Editar'] <> "") : ?>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                        <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                                
                                                <h2> <i class="fa fa-pencil"></i> <strong> A c t u a l i z a r </strong> </h2>
                                            </button></center>
                                    </div>
                                <?php else : ?>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-lg" name="Guardar_Informacion_Pagina">
                                            
                                            <h2> <i class="fa fa-save"></i> <strong> G u a r d a r </strong> </h2>
                                        </button>
                                    </div>
                                <?php endif; ?>

                           </form>


                        </div>


                        <div class="tab-pane" id="tab-eg-1" role="tabpanel">
                          <!-- lista -->
                          <div class="row">
                            <div class="col-md-12">

                              <div class="form-group col-md-12">
                                    <hr>
                              </div>

                              <table class="table table-striped table-bordered" id="example1" style="width:100%">
                                <?php
                                $tableColumna = [
                                  '#',
                                  'Nombre',
                                  'Icono',
                                  'Acciones'
                                ]
                                ?>
                                <thead>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

                                  $QueryTabla = "SELECT * FROM $Nombre_Tabla WHERE Activo = 1 and ID_principal = '{$_SESSION['ID_principal']}' ";
                                  $QueryExeecuteTabla = mysqli_query($conn3, $QueryTabla);
                                  while ($RowTabla = mysqli_fetch_assoc($QueryExeecuteTabla)) {

                                    $id = $RowTabla['id'];
                                    $Nombre = $RowTabla['Nombre'];
                                    $Color = $RowTabla['Color'];
                                    $Icono = funcionMaster($RowTabla['Icono'],'id','SVG','ODP_Iconos_SVG');

                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                    echo "<tr><th scope='row' width='2%'>{$id}</th>
                                    <td width='20%' align='center'>{$Nombre}</td>
                                    <td width='20%' align='center'><label style='width:30px;color:{$Color}'>$Icono</label></td>";

                                    echo "<td width='20%' align='center'>";

                                    echo "<font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' ><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                    <font> <a onclick='EliminarDato(this)' data-href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' > <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>";
                                    echo"
                                    </td></tr>";
                                    
                                    

                                  }
                                  ?>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <?php
                                    foreach ($tableColumna as $columna) {
                                      echo "<th>$columna</th>";
                                    }
                                    ?>
                                </tfoot>
                              </table>
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>




                </section>


                <!-- /.content -->
              </div>
              <!-- /.content-wrapper -->


  <?php include 'footer.php' ?>

<script>
  function EliminarDato(valor) {
    // Prevenir la redirección predeterminada
    event.preventDefault();
    const url = valor.getAttribute('data-href');
    // Mostrar el SweetAlert de confirmación
    Swal.fire({
      title: '¿Estás Seguro?',
      text: 'Esta Acción Eliminará el Registro. ¿Estás Seguro de Continuar?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sí, Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        // Si el usuario confirmó la eliminación, redirecciona a la URL de eliminación
        window.location.href = url+'&Valid=1';
      }
    });
  }
</script>

<script>
$(document).ready(function() {
  <?php if (isset($_GET['Editar'])) { ?>
    // Agregar clases cuando $_GET['Editar'] está definido

    $('#boton_modulo_nuevo').hide();

    $('#boton_modulo_informacion').addClass('active');
    $('#boton_modulo_tabla').removeClass('active');
    $('#tab-eg-0').addClass('show active');
    $('#tab-eg-1').removeClass('show active');
  <?php } else { ?>
    // Agregar clases cuando $_GET['Editar'] no está definido

    //$('#boton_modulo_nuevo').hide();

    //$('#boton_modulo_informacion').removeClass('active');
    //$('#boton_modulo_informacion').hide();
    //$('#boton_modulo_tabla').addClass('active');
    //$('#tab-eg-0').removeClass('show active');
    //$('#tab-eg-1').addClass('show active');
  <?php } ?>
});
</script>
<script>

    function CambioColor(este){
        var color = este;
        $(".icon_svg > SVG").css("color", color);
        //console.log($(".icon_svg > SVG"));
    }

</script>