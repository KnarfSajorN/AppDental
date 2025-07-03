<?php 
   include 'header.php';
   include 'menu.php';

   include 'Informacion_Adicional_Modulos_Arreglo.php';
   $Tabla=$_GET["Tabla"];

   $_POST = DatosIngresarMysqli($_POST);
    
   if(isset($_POST['Guardar_Informacion_Pagina']))
   { 
      foreach ($_POST["Arreglo"] as $key => $value) {$Campos .=$key.',';$Valores .="'{$value}',";}
      $Campos = trim($Campos, ',');$Valores = trim($Valores, ',');

      $usuario_id=$_POST['usuario_id'];
      $queryList=mysqli_query($conn3,"INSERT INTO {$Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

      $ruta = htmlentities($_SERVER['PHP_SELF']); 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&error=Hubo Un Error Al Guardar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&msg=Se Guardaron Los Datos Correctamente'</script>";}
   }

   if(isset($_POST['Actualizar_Informacion_Pagina']))
   {
      $arreglo_id = $_POST['arreglo_id'];
      foreach ($_POST["Arreglo"] as $key => $value) {$Campos.="{$key} = '{$value}',";}
      $Campos = trim($Campos, ',');

      $queryList=mysqli_query($conn3,"UPDATE {$Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");
      $ruta = htmlentities($_SERVER['PHP_SELF']); 
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&error=Hubo Un Error Al Editar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&msg=Se Actualizaron Los Datos Correctamente'</script>";}
   }

   if ($_GET['Eliminar']<>"") 
   {
      $id = $_GET['Eliminar'];
      $queryList=mysqli_query($conn3,"UPDATE {$Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

      $ruta = htmlentities($_SERVER['PHP_SELF']);
      if($queryList!=true){echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&error=Hubo Un Error Al Eliminar Los Datos'</script>";}
      else{echo "<script language='Javascript'> window.location='{$ruta}?Tabla={$Tabla}&msg=Se Eliminaron Los Datos Correctamente'</script>";}

   }

   if(isset($_GET['Editar']))
   { 
      $id = $_GET['Editar'];
      $queryList=mysqli_query($conn3,"SELECT * FROM  {$Tabla} where id=$id limit 1");
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

   if ($_GET["msg"] != "") {include "plugins/Sweetalert2K/AlertaCorrectaOperacion.php";}
   if ($_GET["error"] != "") {include "plugins/Sweetalert2K/AlertaErrorOperacion.php";}

   //$usuario_id = $_GET["usuario_id"];
   $usuario_id = $_SESSION['ID'];
?>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $Tablas_Base_Datos[$Tabla."_Titulo"];?> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> <?php echo $Tablas_Base_Datos[$Tabla."_Titulo"];?>  </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div>      

        <div class="content">
          <div class="box">
            <div class="box-body">
              <form action="<?php echo htmlentities($_SERVER['PHP_SELF'].'?Tabla='.$Tabla); ?>" method="POST">

              <?php
              
                foreach ($Tablas_Base_Datos[$Tabla] as $key => $value) {
                    echo "<div class=\"form-group col-md-12\">";
                    echo "<label>{$key}</label>";
                    
                    $Nombre_Campo = $value["Campo"];
                    $Valor_Campo = $value["Valor"];
                    $Tipo_Campo = $value["Tipo"];
                    $Filtro = $value["Filtro"];
                    switch ($Tipo_Campo) 
                    {
                        case "text":
                        case "number":
                        case "date":
                        case "email":
                          echo "<input type=\"{$Tipo_Campo}\" class=\"form-control input-lg\" name=\"Arreglo[{$Nombre_Campo}]\" placeholder=\"{$key}\" value=\"{$Valor_Campo}\" maxlength=\"120\" oninput=\"if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);\" {$Filtro}>";
                          break;
                        case "select":
                          //echo "Your favorite color is blue!";
                          break;
                        case "textarea":
                          echo "<textarea name=\"Arreglo[{$Nombre_Campo}]\" style=\"width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;\" {$Filtro}>{$Valor_Campo}</textarea> ";
                          break;
                        default:
                          echo "<p style=\"color:red;\"> el tipo de dato esta incorrecto revisar el arreglo </p>";
                    }
                        echo "</div>";
                    $Tabla_Titulo.="<th scope=\"col\">{$key}</th>";  
                }

              ?>

                <input  type="hidden" name="usuario_id"  value="<?php echo $usuario_id?>">
                <?php if(isset($Tablas_Base_Datos[$Tabla])){?>
                    <?php if($_GET['Editar']<>""):?>
                    <div class="col-sm-12">
                    <input  type="hidden" name="arreglo_id"  value="<?php echo $_GET['Editar']?>">
                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill" name="Actualizar_Informacion_Pagina"> <h2> <strong>  A c t u a l i z a r  </strong> </h2> </button></center>
                    </div>
                    <?php else:?>
                    <div class="col-sm-12">
                    <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill" name="Guardar_Informacion_Pagina"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
                    </div>
                    <?php endif;?>
                <?php }?>
              </form>
            </div>
          </div>
                 <div class="box">
                    <div class="box-body">
                       <div class="col-md-12">
                          <h2 align="center" style="border-bottom-style: ridge;"> <?php echo $Tablas_Base_Datos[$Tabla."_Titulo"];?> <i class="fa fa-user"></i> </h2>
                          <table id="example1" class="table table-bordered table-striped">
                             <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <?php echo $Tabla_Titulo; ?>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

                                $queryList=mysqli_query($conn3,"SELECT * FROM  {$Tabla} where Activo=1 AND usuario_id='$usuario_id'");
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                  $id = $rowMotorizado['id'];$datos="";
                                  foreach ($Tablas_Base_Datos[$Tabla] as $key => $value) {
                                    $Nombre_Campo = $rowMotorizado[$value["Campo"]];
                                    $datos.="<td width='20%' align='center'>{$Nombre_Campo}</td>";
                                  }

                                  $ruta = htmlentities($_SERVER['PHP_SELF']); 
                                  echo "<tr><th width='2%' scope='row'>{$id}</th>
                                         {$datos}
                                         <td width='20%' align='center'><font> <a href='{$ruta}?Tabla={$Tabla}&Editar={$id}' class='btn btn-outline-success rounded-pill' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> </i> Editar</a></font><br>
                                            <font> <a href='{$ruta}?Tabla={$Tabla}&Eliminar={$id}' class='btn btn-outline-danger rounded-pill' style='width: 200px;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> </i> Eliminar</a></font>
                                            
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
    </section>

    <!-- /.content -->
  </div>

  

  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>