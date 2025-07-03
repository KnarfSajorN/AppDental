<?php include 'header.php';
include 'menu.php';

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $_SESSION[ID]");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
}



$step = "0.01";
$EstiloOcultar = "";


function CargarFotos_Inventario($idproducto, $Documentos)
{
  include 'funciones/conn3.php';
  if (!empty($Documentos['name'])) {

    define('UPLOAD_DIR', 'FotosInventario/');
    $img = $Documentos['tmp_name'];
    $name = $Documentos['name'];
    $name = str_replace(' ', '', $name);
    $name = str_replace('__', '_', $name);
    $name = str_replace("'", "", $name);
    if ($img <> "") {
      $fechahora = date("Y-m-d_H-i-s");
      $nombre_foto = "{$idproducto}__{$fechahora}__{$name}";
      $success = move_uploaded_file($Documentos['tmp_name'], UPLOAD_DIR . $nombre_foto);
      if (!empty($success)) {
        $ArregloDocumentos["Nombre"] = $nombre_foto;
      }
    }



    return $ArregloDocumentos;
  } else {
    return 'No se han seleccionado archivos para subir.<br>';
  }
}





$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "sinvetrios";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

  $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
  $nrowtabla = mysqli_num_rows($tabla);
  if ($nrowtabla == 1) {
    foreach ($_POST["Arreglo"] as $key => $value) {
      $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
      $nrowCampo = mysqli_num_rows($Campo);
      if ($nrowCampo == 0) {
        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL  COMMENT 'creado desde in_inventario';");
      }
    }
  }

  $Campos = "";
  $Valores = "";
  foreach ($_POST["Arreglo"] as $key => $value) {
    $Campos .= $key . ',';
    //$Valores .= "'{$value}',";
    $ValoresArray = array();
    if (is_array($value)) {
      foreach ($value as $key1 => $value1) {
        $ValoresArray[] = $value1;
      }
      $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
      $Valores .= "'{$ListaFinal}',";
    } else {
      $Valores .= "'{$value}',";
    }
  }
  $Campos = trim($Campos, ',');
  $Valores = trim($Valores, ',');

  $usuario_id = $_POST['usuario_id'];

  $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  //$ruta = str_replace('.php', '', $ruta);
  $idInventario_sincodificar = (mysqli_insert_id($conn3));
  $idInventario = base64_encode(mysqli_insert_id($conn3));

  for ($i = 0; $i < 4; $i++) {
    if ($_FILES["Documentos_$i"]['name'] != "") {
      $DatosDocumentos = CargarFotos_Inventario($idInventario_sincodificar, $_FILES["Documentos_$i"]);

      $Doc_Nombre = $DatosDocumentos["Nombre"];

      $Respuesta = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET img$i='$Doc_Nombre' WHERE id = '$idInventario_sincodificar' LIMIT 1;");
    }
  }

  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar el inventario'</script>";
  } else {
    echo "<script language='Javascript'> window.location='IN_InventarioCategoria?FAID=$idInventario'</script>";
  }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
  $arreglo_id = $_POST['arreglo_id'];
  foreach ($_POST["Arreglo"] as $key => $value) {
    $ValoresArray = array();
    if (is_array($value)) {
      foreach ($value as $key1 => $value1) {
        $ValoresArray[] = $value1;
      }
      $value = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
    } else {
      $value = $value;
    }

    $Campos .= "{$key} = '{$value}',";
  }
  $Campos = trim($Campos, ',');

  $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");


  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if ($_POST["Arreglo"]["sustitutos"] == null) {
    $queryList1 = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET sustitutos='' WHERE id = '{$arreglo_id}' limit 1;");
  }

  if ($_POST["Arreglo"]["proveedores"] == null) {
    $queryList1 = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET proveedores='' WHERE id = '{$arreglo_id}' limit 1;");
  }
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  for ($i = 0; $i < 4; $i++) {
    if ($_FILES["Documentos_$i"]['name'] != "") {
      $DatosDocumentos = CargarFotos_Inventario($arreglo_id, $_FILES["Documentos_$i"]);
      $Doc_Nombre = $DatosDocumentos["Nombre"];

      $Respuesta = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET img$i='$Doc_Nombre' WHERE id = '$arreglo_id' LIMIT 1;");
    }
  }
  //exit();

  $ruta = htmlentities($_SERVER['PHP_SELF']);
  //$ruta = str_replace('.php', '', $ruta);
  $idInventario = base64_encode($arreglo_id);

  if ($queryList != true) {
    echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
  } else {
    echo "<script language='Javascript'> window.location='IN_InventarioCategoria?FAID=$idInventario'</script>";
  }
}
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
  $id = $_GET['Editar'];
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


      //ingresar al campo llamado tipo de la variable Arreglo
      var Departamento_TipoProducto = Arreglo['tipo'];
      document.getElementsByName("Arreglo[tipo]")[0].value = Departamento_TipoProducto;
      ConsultarTipo();




      for (index in Arreglo) {
        if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

          if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
            document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
          } else {

            var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
            var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
            //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
            if (classe.indexOf("select2") > -1) {
              $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected", true);
              $("select[name='" + name + "']").select2();
              //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
            } else {
              $("select[name='" + name + "']").val(Arreglo[index]);
              //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
            }

          }



        }


        if (index == "sustitutos") {

          var select = document.querySelector('select[id="' + index + '"]');
          if (select) {
            //console.log(valorCampo);
            if (Arreglo[index] != "") {
              var Valor = JSON.parse(Arreglo[index]);
              var Clases = select.className;
              //console.log(Valor+" "+nombreCampo);

              // Si el select usa clase select2 ejecutar esta funcion
              if (Clases.indexOf("select2") > -1) {
                if (Valor != undefined) {
                  Valor.forEach(function(elemento) {
                    $('select[id="' + index + '"] > option[value="' + elemento + '"]').attr("selected", true);
                  })

                  $('select[id="' + index + '"]').select2();
                }

              }

            }
          }

        }
        if (index == "proveedores") {

          var select = document.querySelector('select[id="' + index + '"]');
          if (select) {
            //console.log(valorCampo);
            if (Arreglo[index] != "") {
              var Valor = JSON.parse(Arreglo[index]);

              var Clases = select.className;
              //console.log(Valor+" "+nombreCampo);

              // Si el select usa clase select2 ejecutar esta funcion
              if (Clases.indexOf("select2") > -1) {
                if (Valor != undefined) {
                  Valor.forEach(function(elemento) {
                    $('select[id="' + index + '"] > option[value="' + elemento + '"]').attr("selected", true);
                  })

                  $('select[id="' + index + '"]').select2();
                }

              }
            }
          }


        }

        if (index == "img0") {
          var valorInput = "FotosInventario/" + Arreglo[index];

          if (Arreglo[index] != "") {
            var imagen = document.createElement("img");
            imagen.src = valorInput;
            imagen.style.width = "100%";
            $("#" + "foto_0").append(imagen);
          }

        }

        if (index == "img1") {

          var valorInput = "FotosInventario/" + Arreglo[index];

          if (Arreglo[index] != "") {
            var imagen = document.createElement("img");
            imagen.src = valorInput;
            imagen.style.width = "100%";
            $("#" + "foto_1").append(imagen);
          }

        }

        if (index == "img2") {

          var valorInput = "FotosInventario/" + Arreglo[index];

          if (Arreglo[index] != "") {
            var imagen = document.createElement("img");
            imagen.src = valorInput;
            imagen.style.width = "100%";
            $("#" + "foto_2").append(imagen);
          }

        }

        if (index == "img3") {

          var valorInput = "FotosInventario/" + Arreglo[index];

          if (Arreglo[index] != "") {
            var imagen = document.createElement("img");
            imagen.src = valorInput;
            imagen.style.width = "100%";
            $("#" + "foto_3").append(imagen);
          }

        }

      }

      CalcularCostoAnteriorEditar(<?= $id; ?>);

      CalcularCostoPromedioEditar(<?= $id; ?>);



    };
  </script>
<?php


  $EstiloOcultar = "style='display:none;'";
}
#Cierre
if ($_GET["msg"] != "") {
  include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
  include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];


function ConsultarOpcionesSelect($Query){

    include 'funciones/conn3.php';

    $text = "";
    $query = mysqli_query($conn3, $Query);
    while ($row = mysqli_fetch_array($query)) {
        $text .= "<option value='{$row[id]}'>{$row[Nombre]}</option>";
    }
    return  $text;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <br>

  <section class="content">

    <div class="box box-info" align="center">

      <div class="card-body col-md-12">

        <div class="card-header-title font-size-lg text-capitalize font-weight-normal row">
          <div class="col-md-3">
            <?php if ($_GET['Editar']) : ?>
              <a href="IN_Inventario" class="btn btn-block btn-outline-success btn-lg rounded-pill shadow">Nuevo</a>
            <?php endif ?>
          </div>
          <div class="col-md-6">
            <h2>Inventario</h2>
          </div>
          <div class="col-md-3">
            <ul class="nav nav-justified">
              <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-0" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow active"><?= ($_GET['Editar']) ? 'Editar ' . funcionMaster($_GET['Editar'], 'id', 'descripcion', 'sinvetrios') : 'Nuevo' ?></a></li>
              <li class="nav-item col-md-12" style="display: contents;"><a data-toggle="tab" style="margin-bottom: 10px;" href="#tab-eg-1" class="btn btn-block btn-outline-secondary btn-lg rounded-pill shadow">Ver Todos</a></li>
            </ul>
          </div>
        </div>

        <div class="tab-content">
          <div class="tab-pane show active" id="tab-eg-0" role="tabpanel">

            <form id="formularioInventario" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row" enctype="multipart/form-data">
              

                      <div align="left" class="form-group col-md-12">
                        <label>Nombre/Procedimiento</label>
                        <input type="text" class="form-control input-lg" name="Arreglo[descripcion]" placeholder="Descripción" required>
                      </div>

                      <div class="form-group col-md-12">
                        <div align="left" <?= $EstiloOcultar; ?>> Tipo </div>
                        <select name="Arreglo[tipo]" id="tipo" class="form-control input-lg" onchange="ConsultarTipo();" <?= $EstiloOcultar; ?>>
                          <?php
                          $queryTipo = "SELECT * from scategoria where Activo = 1;";
                          $resultTipo = mysqli_query($conn3, $queryTipo);
                          while ($rowTipo = mysqli_fetch_assoc($resultTipo)) {
                          ?>
                            <option value="<?= $rowTipo['id'] ?>" data-tipo="<?= $rowTipo['tipo'] ?>">|| T<?= $rowTipo['tipo'] ?> || <?= $rowTipo['descripcion'] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group col-md-12 row" id="Div_CamposAdicionales">

                      </div>


                        <div class="form-group col-md-6">
                            <div align="left"> CUPS</div>
                            <select name="Arreglo[CUPS]" id="CUPS_id" class="form-control input-lg select2" required >

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div align="left"> Nivel </div>
                            <input type="number" class="form-control input-lg" id="Nivel" name="Arreglo[Nivel]" placeholder="Nivel">
                        </div>

                        <div class="form-group col-md-6">
                            <div align="left"> Grupo </div>
                            <input type="number" class="form-control input-lg" id="Grupo" name="Arreglo[Grupo]" placeholder="Grupo">
                        </div>

                        <div class="form-group col-md-6">
                           <label>Cuenta Evento  </label>
                           <select class="form-control select2" style="width:100%;" name="Arreglo[Cuenta_Evento]">
                               <option value="" selected >Seleccione</option>

                               <?php
                               $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
                               $nrowl = mysqli_num_rows($queryList);
                               while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                   $idC = $row_recordset32['id'];
                                   $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                }
                               ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                           <label>Cuenta Paquete  </label>
                           <select class="form-control select2" style="width:100%;" name="Arreglo[Cuenta_Paquete]">
                               <option value="" selected >Seleccione</option>

                               <?php
                               $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
                               $nrowl = mysqli_num_rows($queryList);
                               while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                   $idC = $row_recordset32['id'];
                                   $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                }
                               ?>

                            </select>
                        </div>

                        <div class="form-group col-md-6">
                           <label>Cuenta Devolucion  </label>
                           <select class="form-control select2" style="width:100%;" name="Arreglo[Cuenta_Devolucion]">
                               <option value="" selected >Seleccione</option>

                               <?php
                               $queryList = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo = 1 order by id ASC");
                               $nrowl = mysqli_num_rows($queryList);
                               while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                   $idC = $row_recordset32['id'];
                                   $descripcionC = utf8_encode($row_recordset32['descripcion']);
                                echo "<option value='$idC'>$idC | $descripcionC  </option>";
                                }
                               ?>

                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <div align="left"> Referencia </div>
                            <input type="text" class="form-control input-lg" id="referencia" name="Arreglo[referencia]" placeholder="Referencia"  onchange="VerificarReferencia(this.value);">
                        </div>

                        <div class="form-group col-md-6">
                            <div align="left"> UVR </div>
                            <input type="number" class="form-control input-lg" id="UVR" name="Arreglo[UVR]" placeholder="UVR">
                        </div>

                        <div class="form-group col-md-12" id="ref_Div">

                        </div>
                        
                        
                        

                        <div class="form-group col-md-12 row">
                            <div class="form-group col-md-6">
                                <label>Consulta</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Consulta]" value="1" style="width: 38px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Laboratorio</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Laboratorio]" value="1" style="width: 38px;">
                            </div>


                            <div class="form-group col-md-6">
                                <label>Terapia</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Terapia]" value="1" style="width: 38px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Cirugia</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Cirugia]" value="1" style="width: 38px;">
                            </div>


                            <div class="form-group col-md-6">
                                <label>No-POS</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_NoPos]" value="1" style="width: 38px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Citologia</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Citologia]" value="1" style="width: 38px;">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Dinamico</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Dinamico]" value="1" style="width: 38px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Control</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_Control]" value="1" style="width: 38px;">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Alto Costo</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[C_AltoCosto]" value="1" style="width: 38px;">
                            </div>
                            <div class="form-group col-md-6">
                                <label>PAD Domiciliario</label>
                                <input type="checkbox" class="form-control input-lg" name="Arreglo[PAD_Domiciliario]" value="1" style="width: 38px;">
                            </div>

                        </div>

                        <div class="form-group col-md-6">
                             <label>Especialidad de Procedimiento <a href="S_Select_EspecialidadProcedimiento" target="_blank"><i class="fa fa-cog"></i> </a> </label>
                             <select class="form-control select2" style="width:100%;" name="Arreglo[Especialidad_Procedimiento]" id="Lista_Especialidad_Procedimiento" >
                                <option value="" selected >Seleccione</option>
                                                                                                                        
                                   <?php
                                   echo ConsultarOpcionesSelect("SELECT * FROM IN_EspecialidadProcedimiento WHERE Activo = 1");
                                   ?>

                               </select>
                        </div>

                        <div class="form-group col-md-6">
                                <label>Centro de Costo </label>
                                <select class="form-control" name="Arreglo[Centro_Costo]"  >
                                    <option value="" selected >Seleccione</option>
                                    <?php
                                    
                                    $queryList = mysqli_query($conn3, "SELECT * FROM CcentroCostos WHERE estado = 1");
                                    while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                          $id= $row_recordset32A['id'];
                                          $descripcion= $row_recordset32A['descripcion'];
                                         
                                          echo "<option value='$id'> $descripcion </option>";
                                    }

                                    ?>
                                </select>
                        </div>

                        <div class="form-group col-md-6">
                             <label>Finalidad de Procedimiento <a href="S_Select_FinalidadProcedimiento" target="_blank"><i class="fa fa-cog"></i> </a> </label>
                             <select class="form-control select2" style="width:100%;" name="Arreglo[Finalidad_Procedimiento]" id="Lista_Finalidad_Procedimiento" >
                                <option value="" selected >Seleccione</option>
                                                                                                                        
                                   <?php
                                   echo ConsultarOpcionesSelect("SELECT * FROM IN_FinalidadProcedimiento WHERE Activo = 1");
                                   ?>

                               </select>
                        </div>

                        <div class="form-group col-md-6">
                             <label>Personal que Atiende <a href="S_Select_PersonalAtiende" target="_blank"><i class="fa fa-cog"></i> </a> </label>
                             <select class="form-control select2" style="width:100%;" name="Arreglo[Personal_Atiende]" id="Lista_Personal_Atiende" >
                                <option value="" selected >Seleccione</option>
                                                                                                                        
                                   <?php
                                   echo ConsultarOpcionesSelect("SELECT * FROM IN_PersonalAtiende WHERE Activo = 1");
                                   ?>

                               </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"> Nombre Secundario </div>
                            <input type="text" class="form-control input-lg" id="Nombre_Secundario" name="Arreglo[Nombre_Secundario]" placeholder="Nombre Secundario" >
                        </div>



                        <!--
                        <div class="form-group col-md-6">
                            <div align="left"> Sustitutos</div>
                                <select name="Arreglo[sustitutos][]" id="sustitutos" class="form-control input-lg select2" multiple>

                                <?php
                                $QueryInventario = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE estado = 1 ");
                                while ($RowInventario = mysqli_fetch_array($QueryInventario)) {
                                    $ID = $RowInventario['ID'];
                                    $descripcion = $RowInventario['descripcion'];

                                    echo "<option value='$ID'> $descripcion </option>";
                                }
                                ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left"> Proveedores </div>
                                <select name="Arreglo[proveedores][]" id="proveedores" class="form-control input-lg select2" multiple>
                                <?php
                                $queryList = mysqli_query($conn3, "SELECT * FROM sproveedores WHERE Activo = 1 ");
                                while ($RowProveedor = mysqli_fetch_array($queryList)) {
                                    $id = $RowProveedor['id'];
                                    $nombre = $RowProveedor['nombre'];

                                    echo "<option value='$id'> $nombre </option>";
                                }
                                ?>
                                </select>
                            </div>




                            <div class="form-group col-md-6">
                                <div align="left"> Mínimo </div>
                                <input type="number" step="1" class=" form-control input-lg" id="minimo" name="Arreglo[minimo]" placeholder="Mínimo" required>
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left"> Máximo </div>
                                <input type="number" step="1" class=" form-control input-lg" id="maximo" name="Arreglo[maximo]" placeholder="Máximo" required>
                            </div>

                            -->

                            <div class="form-group col-md-12">
                                <hr>
                            </div>

                            
                            
                            <!--
                            <div class="form-group col-md-4">
                                <div align="left"> Costo Anterior</div>
                                <input type="number" value="0" step="0.01" class=" form-control input-lg" id="costo_anterior" name="Arreglo[costo_anterior]" placeholder="Costo Anterior" required value="0" min="0">
                                <label id="costo_anterior_mensaje"></label>
                            </div>

                            <div class="form-group col-md-4">
                                <div align="left"> Costo Promedio</div>
                                <input type="number" value="0" step="0.01" class=" form-control input-lg" id="costo_promedio" name="Arreglo[costo_promedio]" placeholder="Costo Promedio" readonly value="0" min="0">
                                <label id="costo_promedio_mensaje"></label>
                            </div>
                            -->




                            <div class="form-group col-md-6">
                                <div align="left"> Notas [información adicional] </div>
                                <textarea name="Arreglo[nota]" class="form-control" id="" cols="10" rows="10"></textarea>
                            </div>


                            <div class="form-group col-md-6">

                                
                                <div align="left"> Costo </div>
                                <input type="number" value="0" step="0.01" class=" form-control input-lg" id="costo" name="Arreglo[costo]" placeholder="Costo" required min="0">
                                
                                <div align="left"> Precio </div>
                                <input type="number" value="0" step="0.01" class=" form-control input-lg" id="precio" name="Arreglo[precio]" placeholder="Precio" required min="0">

                                
                                <div align="left"> Iva </div>
                                <select name="Arreglo[Iva_id]" id="Iva_id" class="form-control input-lg select2" onchange="CargarValorIva()">
                                <option value="0" data-valor='0' selected>Sin Iva</option>
                                <?php
                                $QueryIva = mysqli_query($conn3, "SELECT * FROM Siva WHERE Activo = 1 ");
                                while ($RowIva = mysqli_fetch_array($QueryIva)) {
                                    $id = $RowIva['id'];
                                    $nombre = $RowIva['nombre'];
                                    if ($nombre != "") {
                                    $nombre = $nombre . " - %" . $RowIva['valor'];
                                    } else {
                                    $nombre = "%" . $RowIva['valor'];
                                    }


                                    echo "<option value='$id' data-valor='$RowIva[valor]'> $nombre </option>";
                                }
                                ?>
                                </select>
                            

                            
                                <div align="left"> IVA Valor</div>
                                <input type="number" step="0.01" class=" form-control input-lg" id="valor-iva" name="Arreglo[iva]" value="0" readonly>
                            

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
                  <center><button id="btnInventario" type="submit" class="btn btn-block btn-outline-info rounded-pill shadow" name="Guardar_Informacion_Pagina">
                      <h2> <strong> G u a r d a r </strong> </h2>
                    </button></center>
                </div>
              <?php endif; ?>
            </form>
          </div>


          <div class="tab-pane" id="tab-eg-1" role="tabpanel">
            <!-- lista -->
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped table-bordered">
                  <?php
                  $tableColumna = [
                    'Referencia',
                    'Descripción',
                    'Tipo',
                    'Precio',
                    'Opciones'
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
                    $querysinvetrios = "SELECT * from sinvetrios where estado = 1";
                    $resultsinvetrios = mysqli_query($conn3, $querysinvetrios);
                    while ($rowsinvetrios = mysqli_fetch_assoc($resultsinvetrios)) {
                    ?>
                      <tr class="center text-center">
                        <td><?= $rowsinvetrios['referencia'] ?></td>
                        <td><?= $rowsinvetrios['descripcion'] ?></td>
                        <td><?= funcionMaster($rowsinvetrios['tipo'], 'id', 'descripcion', 'scategoria') ?></td>
                        <td>
                          <p class="text-primary"><strong><?= number_format($rowsinvetrios['precio'], 2, '.', ' ') ?> <?= $moneda; ?> </strong></p>
                        </td>
                        <td>
                          <a href="IN_Inventario?Editar=<?= ($rowsinvetrios['ID']) ?>" class="btn btn-light" title="editar">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="IN_InventarioCategoria?FAID=<?= base64_encode($rowsinvetrios['ID']) ?>" class="btn btn-secondary" title="editar">
                            <i class="fas fa-gear"></i>
                          </a>
                          <button class="btn btn-danger" title="eliminar" onclick="alerts({title: 'Seguro que desea eliminar este registro?',text: '',icon:'info',update: `0|/|estado|/|<?= $tabla ?>|/|<?= $rowsinvetrios['ID'] ?>|/|IN_Inventario` });">
                            <i class="fas fa-close"></i>
                          </button>
                        </td>
                      </tr>
                    <?php
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
        <input type="hidden" name="ID_Doctor" class="form-control input-lg input-lg" value="<?php echo $_SESSION['ID'] ?>">
      </div>
  </section>

  <?php echo $mensaje_registro_patients; ?>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include 'footer.php' ?>
<script>
    $(document).ready(function() {
    $("#CUPS_id").select2({
            allowClear: true,
            ajax: {
                url: "IR_Ajax_Rips.php",
                dataType: 'json',
                type: 'POST',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term,
                        contrato: window.contrato,
                        Tipo: "CUP"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>
<script>
  function calcularUtilidad(quienCambio) {
    // recibimos costo precio y utilidad
    let costo = parseFloat(0 + document.getElementById('costo').value);
    let precio = parseFloat(0 + document.getElementById('precio').value);
    let utilidad = parseFloat(0 + document.getElementById('u-utilidad').value);
    let iva = "0";
    //let iva = $('#iva').find(":selected").text();
    // separarlo por ||
    //iva = iva.split("||")[1];
    // quitar %
    //iva = iva.replace("%", "");
    // quitar espacios
    //iva = iva.trim();
    // calculamos utilidad


    // dependeniendo de quien cambio de hace de una manera u otra
    if (quienCambio == 'costo') {

      precio = costo + ((costo * utilidad) / 100);
      utilidad = ((precio - costo) / costo) * 100;
      //iva = (precio * iva) / 100;
    } else if (quienCambio == 'precio') {
      precio = precio;
      utilidad = ((precio - costo) / costo) * 100;
      //iva = (precio * iva) / 100;
    } else if (quienCambio == 'utilidad') {
      utilidad = utilidad;
      precio = costo + ((costo * utilidad) / 100);
      //iva = (precio * iva) / 100;
    } else {
      precio = costo + ((costo * utilidad) / 100);
      utilidad = ((precio - costo) / costo) * 100;
      //iva = (precio * iva) / 100;
    }

    let precioFinal = parseFloat(precio) + parseFloat(iva);

    // 13 05 2023
    // se redondean todos con 2 decimales
    precioFinal = precioFinal.toFixed("2");
    precio = precio.toFixed("2");
    utilidad = utilidad.toFixed("2");


    document.getElementById('precio').value = precio;
    document.getElementById('u-utilidad').value = utilidad;
    //document.getElementById('u-iva').value = iva;
    document.getElementById('u-precioFinal').value = precioFinal;
  }
</script>



<script>
  function ConsultarTipo() {
    var SelectTipo = document.getElementById('tipo');
    var OptionSelected = SelectTipo.options[SelectTipo.selectedIndex];
    var DataTipo = OptionSelected.getAttribute('data-tipo');


    /////////////////////////
    var Div_CamposAdicionales = document.getElementById('Div_CamposAdicionales');
    Div_CamposAdicionales.innerHTML = '';
    Div_CamposAdicionales.style = '';
    ///////////////////////
    if (DataTipo == '2') {
      // readonly minimo y maximo
      document.getElementById('minimo').readOnly = true;
      document.getElementById('minimo').value = 0;
      document.getElementById('maximo').readOnly = true;
      document.getElementById('maximo').value = 0;
    } else if (DataTipo == '6') {

      Div_CamposAdicionales.innerHTML = `
        
        <div class="form-group col-md-12">
          <div align="left" style="text-align: center;font-size: 20px;"> Mas Información </div>
        </div>

        <div class="form-group col-md-6">
          <div align="left"> Fecha de Compra </div>
          <input type="date" class="form-control input-lg" id="fecha_compra" name="Arreglo[fecha_compra]" required >
        </div>

        <div class="form-group col-md-6">
          <div align="left"> Depreciación %</div>
          <input type="number" class="form-control input-lg" id="depreciacion" name="Arreglo[depreciacion]" step="0.01" required >
        </div>

        <div class="form-group col-md-12">
          <div align="left" style="text-align: center;font-size: 20px;"> Vida Util </div>
        </div>
        <div class="form-group col-md-6">
          <div align="left"> Años </div>
          <input type="number" class="form-control input-lg" id="VidaUtilAnual" name="Arreglo[VidaUtilAnual]" step="1" min="0" value="0" required >
        </div>
        <div class="form-group col-md-6">
          <div align="left"> Mes </div>
          <input type="number" class="form-control input-lg" id="VidaUtilMes" name="Arreglo[VidaUtilMes]" step="1" min="0" max="11" value="0" required >
        </div>
                            
        `;

      //agregar estos estilos al campo Div_CamposAdicionales background-color: aliceblue;padding: 20px;
      Div_CamposAdicionales.style = "background-color: aliceblue;padding: 20px;";


    } else {
      document.getElementById('minimo').readOnly = false;
      document.getElementById('maximo').readOnly = false;

    }

  };
</script>
<script>
  function VerificarReferencia(valor) {
    var Referencia = valor;
    var idProducto = "<?= base64_decode($_GET['C']); ?>";
    $.ajax({
      type: "POST",
      url: "IN_Ajax_Referencia.php",
      data: {
        Referencia: Referencia,
        idProducto: idProducto
      },
      success: function(response) {
        $("#ref_Div").html(response);
      }
    });
  };
</script>

<script>
  function CalcularCostoPromedio() {
    // Obtener los valores de los dos primeros inputs
    var costoActual = parseFloat(document.getElementById("costo").value);
    var costoAnterior = parseFloat(document.getElementById("costo_anterior").value);

    // Calcular el costo promedio
    var costoPromedio = (costoActual + costoAnterior) / 2;

    // Mostrar el costo promedio en el tercer input
    if (costoPromedio === parseInt(costoPromedio, 10)) {
      document.getElementById("costo_promedio").value = costoPromedio;
    } else {
      document.getElementById("costo_promedio").value = costoPromedio.toFixed(2);
    }
  }


  function CalcularCostoAnteriorEditar(idProducto) {

    $.ajax({
      type: "POST",
      url: "IN_Ajax.php",
      data: {
        idProducto: idProducto,
        Tipo_Consulta: "Cargar Costo Anterior"
      },
      success: function(response) {
        //console.log(response);
        var Respuesta = JSON.parse(response);

        if (Respuesta.Base == "NULL") {

        } else if (Respuesta.Base != "NULL") {
          $('#costo_anterior').val(Respuesta.Base);
          $('#costo_anterior_mensaje').html('Campo Actualizado');
        }
      }
    });

  }

  function CalcularCostoPromedioEditar(idProducto) {

    $.ajax({
      type: "POST",
      url: "IN_Ajax.php",
      data: {
        idProducto: idProducto,
        Tipo_Consulta: "Cargar Costo Todas Compras"
      },
      success: function(response) {
        //console.log(response);
        var Respuesta = JSON.parse(response);

        if (Respuesta.Promedio == "0") {

        } else if (Respuesta.Promedio != "0") {
          $('#costo_promedio').val(Respuesta.Promedio);
          $('#costo_promedio_mensaje').html('Campo Actualizado');
        }
      }
    });

  }
</script>
<script>
  function CargarValorIva() {
    var selectElement = document.getElementById('Iva_id');
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var valoriva = selectedOption.getAttribute('data-valor');
    if (valoriva == "" || valoriva == null) {
      valoriva = "0";
    }
    var campoFinal = document.getElementById('valor-iva');
    campoFinal.value = valoriva;
  }
</script>
<script>
  $(document).ready(function() {
    // Verificar si $_GET['Editar'] existe
    var editar = <?php echo isset($_GET['Editar']) ? 'true' : 'false'; ?>;

    if (editar) {
      // Si existe $_GET['Editar'], quitar el required y poner readonly al campo costo_anterior.
      $("#costo_anterior").prop('readonly', true);
      $("#costo_anterior").removeAttr('required');
    }

    // Agregar evento onchange para CalcularCostoPromedio a los campos costo y costo_anterior
    $("#costo, #costo_anterior").on('change', function() {
      CalcularCostoPromedio();
    });

  });
</script>





