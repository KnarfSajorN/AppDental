<?php 
   include 'header.php';
   include 'menu.php';

   $_POST = DatosIngresarMysqli($_POST);
   $Nombre_Tabla= "IP_Inventario_Paquetes";
   if(isset($_POST['Guardar_Informacion_Pagina']))
   {
      $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
      $nrowtabla = mysqli_num_rows($tabla);
      if ($nrowtabla == 0) {
        foreach ($_POST["Arreglo"] as $key => $value) {
          $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
          `id` int(11) NOT NULL,
          `usuario_id` int(11) NOT NULL,
          `Fecha_Registro` datetime DEFAULT current_timestamp(),
          {$Campos},
          `Creacion_Dinamica` text DEFAULT '0',
          `Activo` VARCHAR(5) NULL DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1,COMMENT='Modulo Inventarios';";

        $Campos = "";
        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
          echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
          mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
          mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
        $rowtabladinamica = "1";
      } else {
        if ($rowtabladinamica == 1) {
          foreach ($Arreglo as $key => $value) {
            $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{key}';");
            $nrowCampo = mysqli_num_rows($Campo);
            if ($nrowCampo == 0) {
              mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
            }
          }
        }
      }

      foreach ($_POST["Arreglo"] as $key => $value) {$Campos .=$key.',';$Valores .="'{$value}',";}
      $Campos = trim($Campos, ',');$Valores = trim($Valores, ',');

      $usuario_id=$_POST['usuario_id'];
      $queryList=mysqli_query($conn3,"INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

      $ruta = htmlentities($_SERVER['PHP_SELF']); 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardaron Los Datos Correctamente'</script>";}
   }

   if(isset($_POST['Actualizar_Informacion_Pagina']))
   {
      $arreglo_id = $_POST['arreglo_id'];
      foreach ($_POST["Arreglo"] as $key => $value) {$Campos.="{$key} = '{$value}',";}
      $Campos = trim($Campos, ',');

      $queryList=mysqli_query($conn3,"UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
      $ruta = htmlentities($_SERVER['PHP_SELF']); 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizaron Los Datos Correctamente'</script>";}
   }

   if ($_GET['Eliminar']<>"") 
   {
      $id = $_GET['Eliminar'];
      $queryList=mysqli_query($conn3,"UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

      $ruta = htmlentities($_SERVER['PHP_SELF']);
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";}

   }

   if(isset($_GET['Editar']))
   { 
      $id = $_GET['Editar'];
      $queryList=mysqli_query($conn3,"SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
      while($rowMotorizado=mysqli_fetch_array($queryList)){
        foreach ($rowMotorizado as $key => $value) {$datos["$key"]="$value";}  
      }
      $datos_json = json_encode($datos);
      ?>
      <script>
      window.onload = function() {
        var Arreglo = <?php echo $datos_json?>;
        for(index in Arreglo) 
        {
          if(document.getElementsByName("Arreglo["+index+"]")[0]!=undefined)
          {
            document.getElementsByName("Arreglo["+index+"]")[0].value=Arreglo[index];
          }
        }
      };
      </script>
      <?php
   }

   if ($_GET["msg"] != "") {include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";}
   if ($_GET["error"] != "") {include "plugins/SweetAlert2K/AlertaErrorOperacion.php";}

   //$usuario_id = $_GET["usuario_id"];
   $usuario_id = $_SESSION['ID'];
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paquetes de Productos 
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paquetes de Productos </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">      

        <div class="content">
          <div class="box">
            <div class="box-body">
              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group col-md-12"> 
                  <label>Nombre del Paquete</label>      
                  <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
                </div>

                <div class="form-group col-md-12"> 
                  <label>Descripcion</label>      
                  <textarea name="Arreglo[Descripcion]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
                </div>

                <input  type="hidden" name="usuario_id"  value="<?php echo $usuario_id?>">

                <?php if($_GET['Editar']<>""):?>
                <div class="col-sm-12">
                   <input  type="hidden" name="arreglo_id"  value="<?php echo $_GET['Editar']?>">
                   <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Actualizar_Informacion_Pagina"> <h2> <strong>  A c t u a l i z a r  </strong> </h2> </button></center>
                </div>
                <?php else:?>
                <div class="col-sm-12">
                   <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Guardar_Informacion_Pagina"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                </div>
                <?php endif;?>

              </form>


              <div class="col-xs-12">
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

                                $queryList=mysqli_query($conn3,"SELECT * FROM  {$Nombre_Tabla} where Activo=1 AND usuario_id='$usuario_id'");
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                   //$contador++;
                                  $id = $rowMotorizado['id'];
                                  $Nombre = $rowMotorizado['Nombre'];
                                  $Descripcion = $rowMotorizado['Descripcion'];

                                  $ruta = htmlentities($_SERVER['PHP_SELF']); 
                                  echo "<tr width='2%'><th scope='row'>{$id}</th>
                                         <td width='20%' align='center'>{$Nombre}</td>
                                         <td width='20%' align='center'>{$Descripcion}</td>
                                         <td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                            <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font>
                                            
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
      </div>
    </section>

    <!-- /.content -->
  </div>

  

  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>