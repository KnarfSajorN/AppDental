<!DOCTYPE html>

<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);

$id_plantilla = decrypt($_GET["i"]);
$Nombre_Tabla = funcionMaster($id_plantilla,'id','Nombre_Tabla','PP_Plantillas_Principales');
$Nombre_Tabla_Informacion = funcionMaster($id_plantilla,'id','Nombre_Tabla_Informacion','PP_Plantillas_Principales');
$Nombre_Titulo = funcionMaster($id_plantilla,'id','Nombre','PP_Plantillas_Principales'); 

$tabladinamica = mysqli_query($conn3,"SHOW COLUMNS FROM {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");

if ($tabladinamica) {
    $rowtabladinamica= mysqli_num_rows($tabladinamica);//verificar si es un tabla creada dinamicamente
}else{
    $rowtabladinamica = 0;
}



if (isset($_POST['Guardar_Informacion_Pagina'])) {

  $Arreglo = $_POST['Arreglo'];
  $tabla = mysqli_query($conn3,"SHOW TABLES LIKE '{$Nombre_Tabla}'");
  $nrowtabla = mysqli_num_rows($tabla);
  if($nrowtabla==0)
  {
    foreach ($Arreglo as $key => $value) { $Campos .= "`{$key}` text DEFAULT '',"; }
    $Campos = trim($Campos, ',');

    $query ="CREATE TABLE `{$Nombre_Tabla}` (
      `id` int(11) NOT NULL,
      `usuario_id` int(11) NOT NULL,
      `Fecha_Registro` date DEFAULT current_timestamp(),
      {$Campos},
      `Creacion_Dinamica` text DEFAULT '0',
      `Activo` VARCHAR(5) NULL DEFAULT '1'
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1,COMMENT='Plantilla Secundaria';";

    $creaciontabla = mysqli_query($conn3,$query);
    if(!$creaciontabla){ echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";}
    else
    { 
        mysqli_query($conn3,"ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
        mysqli_query($conn3,"ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;"); 

        $query1 ="CREATE TABLE `{$Nombre_Tabla_Informacion}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `cliente_id` int(11) NOT NULL,
        `Fecha_Registro` datetime DEFAULT current_timestamp(),
        `Titulo` text DEFAULT '0',
        `Plantilla` longtext null default null,
        `Plantilla_id` VARCHAR(10) NULL DEFAULT '0',
        `Firma` text DEFAULT '0', 
        `Firma_Informacion` text DEFAULT '0',
        `Creacion_Dinamica` text DEFAULT '0',
        `Activo` VARCHAR(5) NULL DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1,COMMENT='Plantilla Informacion';";
        $creaciontabla1 = mysqli_query($conn3,$query1);

        if(!$creaciontabla1){ echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";}
        else
        { 
            mysqli_query($conn3,"ALTER TABLE `{$Nombre_Tabla_Informacion}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3,"ALTER TABLE `{$Nombre_Tabla_Informacion}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;"); 
        }
    }
    $rowtabladinamica="1";
  }
  else
  {
    if($rowtabladinamica==1)
    {
      foreach ($Arreglo as $key => $value) {
        $Campo = mysqli_query($conn3,"show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
        $nrowCampo = mysqli_num_rows($Campo);
        if($nrowCampo==0){mysqli_query($conn3,"ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");}
      }
    }
  }

  foreach ($Arreglo as $key => $value) 
  {
    $Nombre_Campo.="{$key},";
    $Valor_Campo.="'{$value}',";
  }
  $Nombre_Campo = trim($Nombre_Campo, ',');
  $Valor_Campo = trim($Valor_Campo, ',');

  $usuario_id = $_POST['usuario_id'];

  if($rowtabladinamica==1)
  {
  $queryList = mysqli_query($conn3,"INSERT INTO {$Nombre_Tabla} (usuario_id,{$Nombre_Campo}) VALUES ('$usuario_id', {$Valor_Campo});");
  }

  $ruta = 'editarConsentimiento';
  $id_plantilla_ = encrypt($id_plantilla);
  if ($queryList != true) {echo "<script language='Javascript'> window.location='{$ruta}?i={$id_plantilla_}&error=Hubo Un Error Al Guardar Los Datos'</script>";}
  else { echo "<script language='Javascript'> window.location='{$ruta}?i={$id_plantilla_}&msg=Se Guardaron Los Datos Correctamente'</script>";}

}
//////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = decrypt($_POST['arreglo_id']);
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $plantilla_id = $_POST["Arreglo"]["Plantilla_id"];
    $plantilla_id_ = encrypt($plantilla_id);
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
    $ruta = 'editarConsentimiento';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?i={$plantilla_id_}&error=Hubo Un Error Al Editar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?i={$plantilla_id_}&msg=Se Actualizaron Los Datos Correctamente'</script>";
    }
}

if ($_GET['Eliminar'] <> "") {
    $id = decrypt($_GET['Eliminar']);
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $plantilla_id= decrypt($_GET["i"]);
    $plantilla_id_ = encrypt($plantilla_id);
    $ruta = 'editarConsentimiento';
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?i={$plantilla_id_}&error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?i={$plantilla_id_}&msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}

if (isset($_GET['Editar'])) {
    $id = decrypt($_GET['Editar']);
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
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
            }
        };
    </script>
<?php
}

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"><?php echo $Nombre_Titulo; ?></a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina"> <?php echo $Nombre_Titulo; ?></h4>
                <div class="box">
                    <div class="col-md-12 row">
                     <br>
                     <?php 
                     $Campos=["[[NOMBRE_PACIENTE]]","[[DOCUMENTO]]","[[NOMBRE_DOCTOR]]","[[EDAD]]","[[FECHAACTUAL]]","[[FECHANACIMIENTO]]","[[TELEFONO]]","[[CORREOELECTORNICO]]","[[CIUDAD]]"];
                     foreach ($Campos as $key => $value) 
                     {
                        echo "<div class='col-md-3 col-xs-6'>";
                        echo "<p id='{$key}' style='float: left;'>{$value}</p>";
                        echo "<button onclick='copiarAlPortapapeles({$key})' style='background-color: #81d1ff9e'>  <i class='fa fa-copy' title='Copiar' name='Copiar'></i>  </button>";  
                        echo "</div>";
                     }
                     ?>
                    </div>

                    <div class="box-body">
                        <form action="<?php echo 'editarConsentimiento'.'?i='.encrypt($id_plantilla); ?>" method="POST">
                        
                            <div class="form-group col-md-12">
                                <label>Titulo</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Titulo]"  placeholder="Titulo" maxlength="120" pattern="^[A-Za-z0-9_ ]+$" oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)" required>
                            </div>

                            <div class="form-group col-md-12">
                                <textarea class="editorJR" name="Arreglo[Plantilla]" ></textarea>
                            </div>

                            <input type="hidden" name="Arreglo[Plantilla_id]" value="<?php echo $id_plantilla; ?>">

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>
                    </div>
                </div>
                <h4 class="Titulo_Pagina" style="left: 50%;position: sticky;">Lista <?php echo $Nombre_Titulo; ?></h4>
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-12">
                            
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE  Activo='1' AND usuario_id='{$usuario_id}' ORDER BY id DESC");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        //$contador++;
                                        $id = $rowMotorizado['id'];
                                        $Titulo = $rowMotorizado['Titulo'];
                                        $Plantilla = $rowMotorizado['Plantilla'];

                                        $ruta = 'editarConsentimiento';
                                        $id_plantilla_ = encrypt($id_plantilla);
                                        $id_ = encrypt($id);

                                        echo "<tr width='2%'><th scope='row'>{$id}</th>
                                         <td width='20%' align='center'>{$Titulo}</td>
                                         <td width='20%' align='center'>{$Plantilla}</td>
                                         <td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?i={$id_plantilla_}&Editar={$id_}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                            <font> <a href='{$ruta}?i={$id_plantilla_}&Eliminar={$id_}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font>                                            
                                         </td></tr>";
                                    }

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
</section>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
/*
CREATE TABLE `PP_Plantillas` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `usuario_id` INT(11) NOT NULL , `cliente_id` INT(11) NOT NULL , `Fecha` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , `Nombre` VARCHAR(120) NOT NULL DEFAULT '' , `Descripcion` TEXT NULL DEFAULT '' , `Activo` VARCHAR(5) NULL DEFAULT '1' COMMENT '1:activo / 0: inactivo' , PRIMARY KEY (`id`)) ENGINE = MyISAM;
*/
?>
<script>
function copiarAlPortapapeles(id_elemento) {

  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);

}
</script>