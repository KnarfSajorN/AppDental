   <?php
    include 'header.php';
    include 'menu.php';

    $idproveedor = 0;
    $idproveedor = $_GET['idproveedor'];

    $IDconfig = $_SESSION['ID'];


    $msg = $_GET['msg'];
    if ($msg == 1) {
      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 2) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 3) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';
    } elseif ($msg == 4) {

      $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';
    } elseif ($msg == 5) {

      $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';
    }




    if (isset($_GET['editar_proveedor'])) {



      $codigo     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_proveedor'])));

      $usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));

      $proveedor = $usuario_id . 'proveedor';



      $queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and id = '$codigo'");
      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $nombre = $rowMotorizado['nombre'];
        $rut = $rowMotorizado['rut'];
        $correo = $rowMotorizado['correo'];

        $direccion = $rowMotorizado['direccion'];
        $telefono = $rowMotorizado['telefono'];
        $vendedor = $rowMotorizado['vendedor'];
        $nota = $rowMotorizado['nota'];
        $idE = $rowMotorizado['id'];

        $whatsapp = $rowMotorizado['whatsapp'];
        $correo_2 = $rowMotorizado['correo_2'];
        $contacto = $rowMotorizado['contacto'];
        $tipo_persona = $rowMotorizado['tipo_persona'];
        $descuento_pronto_pago = $rowMotorizado['descuento_pronto_pago'];


        $descuentos_cuantos_dias = $rowMotorizado['descuentos_cuantos_dias'];
        $tipo_proveedor_nacionalidad = $rowMotorizado['tipo_proveedor_nacionalidad'];
        $productos_distribuidos = json_decode($rowMotorizado['productos_distribuidos']);
        $sitio_web = $rowMotorizado['sitio_web'];
        $codigo_pais = $rowMotorizado['codigo_pais'];
        $codigo_ciudad = $rowMotorizado['codigo_ciudad'];
        $codigo_departamento = $rowMotorizado['codigo_departamento'];

        $dias_credito = $rowMotorizado['dias_credito'];
        $limite_credito = $rowMotorizado['limite_credito'];
        $porcentaje_retencion_base = $rowMotorizado['porcentaje_retencion_base'];
        $porcentaje_retencion_iva = $rowMotorizado['porcentaje_retencion_iva'];
        $informacion_envio = $rowMotorizado['informacion_envio'];
        $formas_envio = $rowMotorizado['formas_envio'];
        $dias_entrega = $rowMotorizado['dias_entrega'];
      }
    }


    ?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper p-3">
     <!-- Content Header (Page header) -->
     <section class="content-header">

       <ol class="breadcrumb">
         <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
         <li><a href="entradadeinventario"><i class="fa fa-gears"></i> Entrada de inventarios</a></li>
         <li><a href="#">Proveedores</a></li>


       </ol>
     </section>

     <!-- Main content -->
     <section class="content">
       <div>
         <div class="box col-xs-12">


           <div class="card-body">
             <h4 class="card-title">Proveedores</h4>
             <br>













             <form action="proveedores" method="POST" enctype="multipart/form-data">
               <div class="form-row">
                 <div class="col-md-12">
                   <?php echo $respuesta; ?>
                 </div>
                 <div class="form-group col-md-3">
                   RUT/NIT
                   <input type="text" class="form-control input-lg" name="rut" value="<?php echo $rut ?>" pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" onblur="onRutBlur(this);" required />


                   <div id="div-results"></div>

                 </div>
                 <div class="form-group col-md-9">
                   Nombre/Razón Social
                   <input type="text" class="form-control input-lg" name="nombre" value="<?php echo $nombre ?>" id="descripcion" required>
                   <div id="div-resultsHora"></div>
                 </div>
















                 <div class="form-group col-md-6">
                   Correo
                   <input type="email" class="form-control input-lg" name="correo" id="correo" value="<?php echo $correo ?>">
                 </div>
                 <div class="form-group col-md-6">
                   Teléfono
                   <input type="text" class="form-control input-lg" name="telefono" id="telefono" value="<?php echo $telefono ?>">
                 </div>
                 <div class="form-group col-md-6">

                   Vendedor

                   <input type="text" class="form-control input-lg" name="vendedor" id="vendedor" value="<?php echo $vendedor ?>">
                 </div>




                 <div class="form-group col-md-6">
                   Dirección

                   <input type="text" class="form-control input-lg" name="direccion" id="direccion" value="<?php echo $direccion ?>">
                 </div>



                 <div class="form-group col-md-12">
                   Notas

                   <textarea class="form-control input-lg" name="nota" id="nota" placeholder=" " style="height:120px;"><?php echo $nota ?></textarea>
                 </div>

                 <div class="form-group col-md-12">
                   <hr>
                 </div>

                 <div class="form-group col-md-6">
                   WhatsApp

                   <input type="text" class="form-control input-lg" name="whatsapp" id="whatsapp" value="<?php echo $whatsapp ?>">
                 </div>

                 <div class="form-group col-md-6">
                   Correo 2

                   <input type="text" class="form-control input-lg" name="correo_2" id="correo_2" value="<?php echo $correo_2 ?>">
                 </div>

                 <div class="form-group col-md-6">
                   Contacto

                   <input type="text" class="form-control input-lg" name="contacto" id="contacto" value="<?php echo $contacto ?>">
                 </div>

                 <div class="form-group col-md-6">


                   <div align="left">Tipo Persona <a href="PV_TipoPersona"><i class="fa fa-cog"></i>
                     </a> </div>
                   <select name="tipo_persona" class="form-control select2" style="width: 100%;" required>
                     <?php

                      $QueryProveedorTP = mysqli_query($conn3, "SELECT * FROM  Proveedor_TipoPersona WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");

                      while ($RowProvedorTP = mysqli_fetch_array($QueryProveedorTP)) {

                        $id = $RowProvedorTP['id'];
                        $Nombre = $RowProvedorTP['Nombre'];

                        if ($tipo_persona == $id) {
                          echo "<option value='$id' selected> $Nombre </option>";
                        } else {
                          echo "<option value='$id'> $Nombre </option>";
                        }
                      }
                      ?>

                   </select>
                 </div>

                 <div class="form-group col-md-6">

                   <div align="left">Descuentos por Pronto Pago </div>
                   <select name="descuento_pronto_pago" id="DescuentoProntoPago" class="form-control select2" style="width: 100%;" onchange="mostrarDias()" required>
                     <option value='0'> No </option>
                     <option value='1'> Si </option>

                     <?php
                      if ($descuento_pronto_pago == "1") {
                        echo "<option value='1' selected> Si </option>";
                      } elseif ($descuento_pronto_pago == "0") {
                        echo "<option value='0' selected> No </option>";
                      }
                      ?>
                   </select>
                 </div>

                 <div class="form-group col-md-6">

                   <div align="left"> Tipo Proveedor</div>
                   <select name="tipo_proveedor_nacionalidad" class="form-control select2" style="width: 100%;" required>
                     <option value='Nacional'> Nacional </option>
                     <option value='Extranjero'> Extranjero </option>

                     <?php
                      if ($tipo_proveedor_nacionalidad == "Nacional") {
                        echo "<option value='Nacional' selected> Nacional </option>";
                      } elseif ($tipo_proveedor_nacionalidad == "Extranjero") {
                        echo "<option value='Extranjero' selected> Extranjero </option>";
                      }
                      ?>

                   </select>
                 </div>

                 <div class="form-group col-md-12" id="Div_DescuentoProntoPago">

                 </div>

                 <div class="form-group col-md-6">


                   <div align="left">Productos Distribuidos por el Proveedor</div>
                   <select name="productos_distribuidos[]" class="form-control select2" style="width: 100%;" multiple>
                     <?php

                      $QueryInventario = mysqli_query($conn3, "SELECT * FROM  sinvetrios WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and estado = 1");

                      if ($productos_distribuidos == "") {
                        $productos_distribuidos = [];
                      }
                      while ($RowInventario = mysqli_fetch_array($QueryInventario)) {

                        $id = $RowInventario['ID'];
                        $descripcion = $RowInventario['descripcion'];

                        // Verificar si $id está en $productos_distribuidos


                        if (in_array($id, $productos_distribuidos)) {
                          echo "<option value='$id' selected>$descripcion</option>";
                        } else {
                          echo "<option value='$id'> $descripcion </option>";
                        }
                      }
                      ?>

                   </select>
                 </div>

                 <div class="form-group col-md-6">
                   <div align="left">Sitio Web</div>
                   <input type="text" class="form-control input-lg" name="sitio_web" id="sitio_web" value="<?php echo $sitio_web ?>">
                 </div>




                 <div class="form-group col-md-6" id="pais_div">
                   <div align="left">País</div>
                   <select class="form-control select2" name="Arreglo[codigo_pais]" id="PaisResidencia" onchange="paises(this.value,'','');" style="width:100%;" required>
                     <option value="" selected> Seleccione </option>
                     <?php
                      //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                      echo selectMaster("", "iso2", "name", "paises");
                      ?>
                   </select>
                 </div>



                 <div class="form-group col-md-6" id="ciudad_div">
                   <div align="left">Ciudad Residencia</div>
                   <select class="form-control select2" name="Arreglo[codigo_ciudad]" id="CiudadResidencia" style="width:100%;" required>
                     <option value="" selected> Seleccione </option>

                   </select>
                 </div>



                 <div class="form-group col-md-12">
                   <hr>
                 </div>


                 <div class="form-group col-md-6" id="ciudad_div">
                   <div align="left">Dias Crédito</div>
                   <input type="number" step="1" class="form-control input-lg" name="dias_credito" id="dias_credito" value="<?php echo $dias_credito ?>">
                 </div>


                 <div class="form-group col-md-6" id="ciudad_div">
                   <div align="left">Limite Crédito</div>
                   <input type="number" step="1" class="form-control input-lg" name="limite_credito" id="limite_credito" value="<?php echo $limite_credito ?>">
                 </div>


                 <div class="form-group col-md-6" id="ciudad_div">
                   <div align="left">Porcentaje de Retención Sobre la Base</div>
                   <input type="number" step="1" class="form-control input-lg" name="porcentaje_retencion_base" step="0.01" id="porcentaje_retencion_base" value="<?php echo $porcentaje_retencion_base ?>">
                 </div>


                 <div class="form-group col-md-6" id="ciudad_div">
                   <div align="left">Porcentaje de Retención Sobre el IVA </div>
                   <input type="number" step="1" class="form-control input-lg" name="porcentaje_retencion_iva" step="0.01" id="porcentaje_retencion_iva" value="<?php echo $porcentaje_retencion_iva ?>">
                 </div>


                 <div class="form-group col-md-12">
                   <div align="left">Información de Envió</div>
                   <textarea class="form-control input-lg" name="informacion_envio" id="informacion_envio" placeholder=" " style="height:120px;"><?php echo $informacion_envio ?></textarea>
                 </div>


                 <div class="form-group col-md-6">
                   <div align="left">Formas de Envió</div>
                   <input type="text" class="form-control input-lg" name="formas_envio" id="formas_envio" placeholder=" " value="<?php echo $formas_envio ?>">
                 </div>

                 <div class="form-group col-md-6">
                   <div align="left">Dias para Entrega</div>
                   <input type="number" step="1" class="form-control input-lg" name="dias_entrega" id="dias_entrega" placeholder=" " value="<?php echo $dias_entrega ?>">
                 </div>











                 <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                 <input type="hidden" name="id" value="<?php echo $idE ?>">

               </div>

               <center>
                 <?php
                  if ($idE > 0) {
                    echo '<button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="actualizar_proveedor"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
                  } else {
                    echo '<button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" name="registro_proveedor"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
                  }
                  ?>


             </form>


           </div>


           <br>
           <div class="box-body">
             <table id="example1" class="table table-bordered table-striped">
               <thead>
                 <tr>

                   <th class="text-center">Nombre</th>
                   <th class="text-center">RUT/RUC</th>
                   <th class="text-center">Correo </th>
                   <th class="text-center">Teléfono</th>
                   <th class="text-center">Vendedor</th>
                   <th class="text-center">Dirección</th>
                   <th class="text-center"> </th>

                 </tr>
               </thead>
               <tbody>
                 <?php

                  $ID = $_SESSION['ID'];


                  $queryListA = mysqli_query($conn3, "SELECT * FROM  sproveedores where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1 ");
                  $nrowl = mysqli_num_rows($queryListA);

                  while ($row_recordset32A = mysqli_fetch_array($queryListA)) {
                    $id = $row_recordset32A['id'];
                    $nombre = $row_recordset32A['nombre'];
                    $rut = $row_recordset32A['rut'];
                    $correo = $row_recordset32A['correo'];

                    $telefono = $row_recordset32A['telefono'];

                    $vendedor = $row_recordset32A['vendedor'];
                    $direccion = $row_recordset32A['direccion'];
                    $nota = $row_recordset32A['nota'];






                    echo '      
                      <tr>
                      <td> ' . $nombre . '</td>
                      <td> ' . $rut . '</td>
                      <td> ' . $correo . '</td>
                      <td> ' . $telefono . '</td>
                      <td> ' . $vendedor . '</td>
                      <td> ' . $direccion . '</td>
                     
                      <td>

                      <form method>
                      
                      <font color="#04CC05"> <a class="btn btn-block btn-outline-info rounded-pill shadow" href="proveedores?editar_proveedor=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i> Editar </a></font> <br>
                      <font color="#04CC05"> <a class="btn btn-block btn-outline-danger rounded-pill shadow" href="proveedores?borrar_proveedor=' . $id . '&usuario_id=' . $ID . '"> <i class="fa fa-trash" title="Borrar" name="Borrar"></i> Borrar </a></font> <br>
                      <font color="#04CC05"> <a class="btn btn-block btn-outline-success rounded-pill shadow" href="PV_Documentos?id=' . $id . '"> <i class="fa fa-file" title="Adjuntar" name="Virtual"></i> Adjuntar Documentos </a></font><br>
                      </td>
                      </tr>';
                  }


                  ?>



               </tbody>
               <tfoot>
                 <tr>

                   <th class="text-center">Nombre</th>
                   <th class="text-center">RUT </th>
                   <th class="text-center">Correo </th>
                   <th class="text-center">Teléfono</th>
                   <th class="text-center">Vendedor</th>
                   <th class="text-center">Dirección</th>
                   <th class="text-center"> </th>

                 </tr>
               </tfoot>
             </table>
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
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

   <?php
    if ($codigo_pais != "" and $codigo_pais != "0") {
      echo "<script>window.onload = function() {
                        var name = document.getElementsByName('Arreglo[codigo_pais]')[0].name;
                        var classe = document.getElementsByName('Arreglo[codigo_pais]')[0].className;

                        if (classe.indexOf('select2') > -1) {
                            $('select[id=\"PaisResidencia\"] > option[value=\"{$codigo_pais}\"]').attr('selected', true);
                            $('select[id=\"PaisResidencia\"]').select2();
                        } 

              paises('{$codigo_pais}', '{$codigo_departamento}', '{$codigo_ciudad}');
            };</script>";
    }
    ?>
   <?php
    if ($descuento_pronto_pago == "1") {
      echo "<script>$(document).ready(function() {
              mostrarDias();
              //console.log('2131232');
            });</script>";
    }
    ?>


   <!-- Funciona para consultar disponibilidad -->
   <script type="text/javascript">
     function validar() {
       // estas son las variables que enviamos

       var codigo = $("#codigo").val();
       var usuario_id = $("#usuario_id").val();


       // aqui enviamos el mensaje por medio de un arreglo     

       $.ajax({
         type: "POST",
         url: "ajax_proveedor_verificar.php",
         data: {
           codigo: codigo,
           usuario_id: usuario_id
         },
         success: function(response) {
           $('#div-results').html(response);

         }
       });
     };
   </script>


   <script>
     function mostrarDias() {
       var selectElement = document.getElementById("DescuentoProntoPago");
       var divDescuentoProntoPago = document.getElementById("Div_DescuentoProntoPago");

       // Verificar si se seleccionó "Sí"
       if (selectElement.value === '1') {
         // Crear un label y un input numérico
         var Texto =
           `<div align="left">Cuantos Días</div>     
            <input type="number"  class="form-control input-lg" name="descuentos_cuantos_dias"  id="descuentos_cuantos_dias" step="1" value="<?php echo $descuentos_cuantos_dias ?>" > `;

         // Agregar el label y el input al div
         divDescuentoProntoPago.innerHTML = Texto;

       } else {
         // Si no se seleccionó "Sí", borrar el contenido del div
         divDescuentoProntoPago.innerHTML = "";
       }
     }
   </script>

   <script>
    function ajax_departamentos_colombia(departamento, valor){
        $.ajax({
           type: "POST",
           url: "ajax_select.php",
           data: {
            where: "WHERE country_code='" + valor + "'",
             value: "name",
             texto: "name",
             tabla: "paisesEstados"
           },
           success: function(response) {
             $('#DepartamentoResidencia').html("<option value='' selected>Seleccione</option>" +
               response);
             if (departamento != "") {
               $("select[id='DepartamentoResidencia'] > option[value='" + departamento + "']").attr(
                 "selected", true);
               $("select[id='DepartamentoResidencia']").select2();
             }
           }
         });
    }

    function ajax_ciudades(ciudad, valor){
        $.ajax({
           type: "POST",
           url: "ajax_select.php",
           data: {
             where: "WHERE country_code='" + valor + "'",
             value: "name",
             texto: "name",
             tabla: "paisesCiudades"
           },
           success: function(response) {
             $('#CiudadResidencia').html("<option value='' selected>Seleccione</option>" + response);
             if (ciudad != "") {
               $("select[id='CiudadResidencia'] > option[value='" + ciudad + "']").attr("selected",
                 true);
               $("select[id='CiudadResidencia']").select2();
             }

           }
         });
    }


     function paises(valor, departamento, ciudad) {
       if (valor == "CO") {

         var pais = document.getElementById('pais_div');
         var select = document.createElement("div");
         select.innerHTML = "<div align='left'>Departamento de Residencia</div>";
         select.innerHTML +=
           "<select class='form-control select2' name='Arreglo[codigo_departamento]' id='DepartamentoResidencia' onchange='departamento_ciudad(this.value,);' style='width:100%' required></select>";


         //select.innerHTML = '<div align="left">  Departamento </div><select name="departamento" id="departamento"  class="form-control input-lg select2" onchange="departamento_ciudad(this.value)"style="width: 100%;"></select>'
         select.setAttribute('id', 'departamento_div');
         select.setAttribute('class', 'form-group col-md-6');
         pais.insertAdjacentElement("afterend", select);
         //K.C
         document.getElementById('ciudad_div').className = 'form-group col-md-12';
         $('#DepartamentoResidencia').select2();

         ajax_departamentos_colombia(departamento, valor)
         ajax_ciudades(ciudad, valor)

         if (departamento != "") {
           departamento_ciudad(departamento, ciudad);
         } else {
           $('#CiudadResidencia').empty();
         }

       } else {

         document.getElementById('ciudad_div').className = 'form-group col-md-6';
         ajax_ciudades(ciudad, valor)

         var departamento = document.getElementById('departamento_div');
         if (typeof(departamento) != 'undefined' && departamento != null) {
           departamento.remove();
         }
       }
     }

     function departamento_ciudad(valor, ciudad) {
    //    $.ajax({
    //      type: "POST",
    //      url: "ajax_select.php",
    //      data: {
    //        where: "WHERE Codigo_Departamento='" + valor + "'",
    //        value: "id",
    //        texto: "Nombre_Tildes",
    //        tabla: "Ciudades"
    //      },
    //      success: function(response) {
    //        $('#CiudadResidencia').html("<option value='' selected>Seleccione</option>" + response);
    //        if (ciudad != "") {
    //          $("select[id='CiudadResidencia'] > option[value='" + ciudad + "']").attr("selected", true);
    //          $("select[id='CiudadResidencia']").select2();
    //        }
    //      }
    //    });
     }
   </script>