<?php 
  include 'header.php';
  include 'menu.php';

  $_POST = DatosIngresarMysqli($_POST);

  $Nombre_Tabla = "Inventario";
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

    foreach ($_POST["Arreglo"] as $key => $value) {
      $Campos .=$key.',';
      $Valores .="'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id=$_POST['usuario_id'];
    $queryList=mysqli_query($conn3,"INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']); 
    if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";}
    else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardaron Los Datos Correctamente'</script>";}
  }
   
   if(isset($_POST['Actualizar_Informacion_Pagina']))
   {
      $arreglo_id = $_POST['arreglo_id'];
      foreach ($_POST["Arreglo"] as $key => $value) {$Campos.="{$key} = '{$value}',";}
      $Campos = trim($Campos, ',');

      $queryList=mysqli_query($conn3,"UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
      //$ruta = htmlentities($_SERVER['PHP_SELF']);
      $ruta = "IP_Lista_Productos.php"; 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizaron Los Datos Correctamente'</script>";}
   }

   if ($_GET['Eliminar']<>"") 
   {
      $id = $_GET['Eliminar'];
      $queryList=mysqli_query($conn3,"UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

      //$ruta = htmlentities($_SERVER['PHP_SELF']);
      $ruta = "IP_Lista_Productos.php";
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
          valor = Arreglo[index];
          if(index=="tipo")
          {
            console.log(valor);
            $("#tipo > option[value='"+valor+"']").attr("selected",true);
            $('#tipo').select2();
          }
          if(index=="paquete")
          {
            console.log(valor);
            $("#paquete > option[value='"+valor+"']").attr("selected",true);
            $('#paquete').select2();
          }
        }
      };
      </script>
      <?php
   }

   if ($_GET["msg"] != "") {include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";}
   if ($_GET["error"] != "") {include "plugins/SweetAlert2K/AlertaErrorOperacion.php";}

   $usuario_id = $_SESSION['ID'];

?>

  <style type="text/css">
    .select2-container .select2-selection--single 
    {
      height: 45px!important;
      padding: 15px!important;
    }
</style>
  
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
                <div class="form-group col-md-6"> 
                  <label>Nombre del Producto</label>  
                  <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Referencia</label>      
                  <input type="text" class="form-control input-lg" name="Arreglo[Referencia]" placeholder="Referencia" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Tipo de Producto</label> <a href="IP_Tipo_Productos.php"><i class="fa fa-cog"></i></a>
                  <select name="Arreglo[tipo_id]" id="tipo" class="form-control select2" style="width: 100%;" required>
                    <option value="" selected="selected">Seleccione </option>    
                    <?php
                      
                      $QueryCategoria=mysqli_query($conn3,"SELECT * FROM IP_Inventario_Tipo WHERE usuario_id = $usuario_id");
                      $Nrow=mysqli_num_rows($QueryCategoria);
                      while($RowCategoria=mysqli_fetch_array($QueryCategoria))
                      {
                          $id = $RowCategoria['id'];
                          $Nombre = $RowCategoria['Nombre'];

                          echo "<option value='$id'> $Nombre</option>";
                      }                                      
                      echo "</select>";
                      if ($Nrow==0) 
                      {
                      echo '<h6 style="position: absolute;bottom: 4px;left: 30px;background-color: white;"> <font color="red"> No a registrado ningún tipo de producto <a href="IP_Tipo_Productos.php"> <strong>  Registrar Tipo de Producto </strong></a> </font></h6>';  

                      }
                    ?>
                </div>

                <div class="form-group col-md-6"> 
                  <label>Paquete</label> <a href="IP_Paquetes.php"><i class="fa fa-cog"></i></a>
                  <select name="Arreglo[paquete_id]" id="paquete" class="form-control select2" style="width: 100%;" required>
                    <option value="0" selected="selected"> Ninguno </option>    
                    <?php
                      
                      $QueryPaquete=mysqli_query($conn3,"SELECT * FROM IP_Inventario_Paquetes WHERE usuario_id = $usuario_id");
                      $Nrow=mysqli_num_rows($QueryPaquete);
                      while($RowPaquete=mysqli_fetch_array($QueryPaquete))
                      {
                          $id = $RowPaquete['id'];
                          $Nombre = $RowPaquete['Nombre'];

                          echo "<option value='$id'> $Nombre</option>";
                      }                                      
                      echo "</select>";
                      if ($Nrow==0) 
                      {
                      echo '<h6 style="position: absolute;bottom: 4px;left: 30px;background-color: white;"> <font color="red"> No a registrado ningún paquete <a href="IP_Paquetes.php"> <strong>  Registrar Paquete </strong></a> </font></h6>';  

                      }
                    ?>
                </div>

                <div class="form-group col-md-6"> 
                  <label>Fecha de Vencimiento</label>      
                  <input type="date" class="form-control input-lg" name="Arreglo[Fecha_Vencimiento]" placeholder="Nombre" maxlength="10" value="0001-01-01" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Existencias</label>      
                  <input type="number" class="form-control input-lg" name="Arreglo[Existencia]" placeholder="Existencias" maxlength="10" value="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Minimo</label>      
                  <input type="number" class="form-control input-lg" name="Arreglo[Minimo]" placeholder="Minimo" maxlength="10" value="1" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Maximo</label>      
                  <input type="number" class="form-control input-lg" name="Arreglo[Maximo]" placeholder="Maximo" maxlength="10" value="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Costo</label>      
                  <input type="number" class="form-control input-lg" name="Arreglo[Costo]" step="0.01" placeholder="Costo" maxlength="10"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>

                <div class="form-group col-md-6"> 
                  <label>Precio</label>      
                  <input type="number" class="form-control input-lg" name="Arreglo[Precio]" step="0.01" placeholder="Precio" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required> 
                </div>


                <div class="form-group col-md-12"> 
                  <label>Descripcion</label>      
                  <textarea name="Arreglo[Nota]" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
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
                <div class="col-sm-12">
                  <br>
                   <center><button type="button" class="btn btn-block btn-primary btn-sm" style="background-color:#3cbc7b"><a href="IP_Lista_Productos.php" style="color: aliceblue;"><h4> <strong>  Ver Productos  </strong> </h4></a></button></center>
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

   <script type="text/javascript">

   </script>