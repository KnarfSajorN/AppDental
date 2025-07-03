y<?php
    include 'header.php';
    include 'menu.php';
    $ID_formula = $_GET['id'];
    $ID = $_SESSION['ID'];
    $ID_principal = $_SESSION['ID_principal'];

    if ($_GET["msg"] != "") {
        include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
    }
    if ($_GET["error"] != "") {
        include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
    }
?>
<link href="Modulos_Estilos/ModuloReceta.css" rel="stylesheet" type="text/css" media="all">
<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Paquete Medicamento </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}RM_PaquetesMedicamentos.php"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a> &nbsp;&nbsp;Medicamento </h4>
    <div class="">
      <div class="">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
            
              <div class="box box-solid">

                <div class="row">
                        <div class="form-group col-md-12">
                            <div align="left"><H4> Paquete: <B><?php echo funcionMaster($ID_formula,'id','nombre','RM_Paquete');?></B> </H4></div>
                        </div>   
               
    
                        <div class="form-group col-md-12">
                            <div align="left">Agregar Medicamentos</div>

                            <select id="formula" name="formula" class="form-control select2" style="width: 100%;" onchange="CargarInformacionMedicamento(this.value)">
                                <option value="" selected="selected">Seleccione ...</option>
                                <?php                                                              
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  RM_Medicamentos WHERE Activo = 1 and (ID_principal = $ID_principal or ID_principal = $ID) ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($row_recordset32=mysqli_fetch_array($queryList))
                                    {   
                                        $ID      = $row_recordset32['id'];
                                        $descripcion      = $row_recordset32['Nombre'];
                                     
                                       
                                        
                                        
                                            echo "<option value='$ID'> $descripcion </option>";
                                        
                                        
                                        
                                    }
                                    ?>
                            </select>


                             <!--   <input type="text" class="form-control input-lg" id="formula" name="formula" placeholder="Escriba el nombre del medicamento" > -->

                        </div>

                        <div class="form-group col-md-6">
                                <div align="left"> Cantidad </div>
                                <input type="number" class="form-control input-lg" id="Cantidad"  placeholder="1"
                                    value="1">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Presentación </div>
                                <select class="form-control input-lg" id="Presentacion" 
                                    placeholder="Presentacion del Medicamento" style="width:100%" >
                                    <?php
                                    $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Presentacion_Receta' LIMIT 1");
                                    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
                                       
                                        $Opciones = $RowSelect['Opciones'];
                                        $Listado = json_decode($Opciones, true);
                                        echo "Listado" . json_encode($Listado);
                                        foreach ($Listado as $key => $value) {
                                            echo "<option value='$value'>{$value}</option>";
                                        }

                                        echo "<option value='' selected> Seleccione </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="Presentacion">Presentación <a
                                        href="Global_ModuloSelect.php?Tipo=Presentacion_Receta"><i
                                            class="fa fa-cog"></i></a></label>
                                <select class="form-control input-lg" name="Arreglo[Presentacion]" id="Presentacion"
                                    placeholder="Presentacion del Medicamento">
                                    <option value="">Seleccione...</option>
                                </select>
                            </div> -->

                            <div class="form-group col-md-6">
                                <div align="left">Vía de Administración</div>
                                <select class="form-control input-lg " id="Via_Administracion" 
                                    placeholder="Via de Administracion del Medicamento" style="width:100%">
                                    <?php
                                    $QuerySelect = mysqli_query($conn3, "SELECT * FROM  Global_Select WHERE Nombre='Via_Administracion_Receta' LIMIT 1");
                                    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {

                                        $Opciones = $RowSelect['Opciones'];
                                        $Listado = json_decode($Opciones, true);
                                        foreach ($Listado as $key => $value) {
                                            echo "<option value='$value'>{$value}</option>";
                                        }

                                        echo "<option value='' selected> Seleccione </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Composición</div>
                                <input type="text" class="form-control input-lg" id="Composicion" 
                                    placeholder="Composicion del Medicamento" value="" maxlength="240"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-6">
                                <div align="left">Dosis</div>
                                <input type="text" class="form-control input-lg" id="Dosis" 
                                    placeholder="Dosis del Medicamento" value="" maxlength="120"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left">&nbsp;</div>
                                
                            </div>


                            <div class="form-group col-md-6">
                                <div align="left"> Indicaciones </div>
                                <textarea id="Indicaciones"  placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO"
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                            </div>


                            <div class="form-group col-md-6">
                                <div align="left"> Indicaciones generales de la Recetas </div>
                                <textarea id="Indicaciones_Generales" 
                                    style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"
                                    placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL."></textarea>
                            </div>

                        <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                        <input type="hidden" name="ID_formula" id="ID_formula"  value="<?php echo $ID_formula?>">
             
            
                        <div class="form-group col-md-12">
                            <a href="#"  onclick="agergarItem();" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar Medicamento</strong> </a>
                        </div>



                </div>




                <br>



                <div class="box-body col-md-12">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Medicamento</th>
                                <!-- <th>Numero de Sesiones</th>
                                <th>Precio</th> -->
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                                                
                            $queryList=mysqli_query($conn3,"SELECT * FROM  RM_Paquetes_Medicamentos where paquete_id =$ID_formula and Activo='1'
                            and (ID_principal = $ID_principal or ID_principal = $ID) ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID_FM     = $row_recordset32['id'];
                                          $ID_FORM     = $row_recordset32['paquete_id'];
                                          $numerosesiones     = $row_recordset32['Numerosesiones'];
                                         
                                          $descripcion      = funcionMaster($row_recordset32['inventario_id'], 'id', 'Nombre', 'RM_Medicamentos');
                                          $precio      = $row_recordset32['Precio'];
                                          $Fecha      = $row_recordset32['Fecha'];
                                    
  
                                        echo '     <tr>
                                        <td>'.$Fecha.' </td>
                                        <td>'.$descripcion.' </td>
                                      <!--  <td>'.$numerosesiones.' </td>
                                        <td>'.$precio.' </td> -->
                                        <td> <a onclick="EliminarFormula('.$ID_FM.','.$ID_FORM.')" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" title="Eliminar"><i class="fa fa-remove"></i> Eliminar </a></td>
                                        
                                
                                        </tr>';
                                    }
                        ?>

 
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <!-- <th></th>
                            <th></th> -->
                        </tr>
                        </tfoot>
                    </table>
                          
             </div>              
 

                        </div>

                      </div>

                    </form>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

     

  </section>

</div>


<?php include("footer.php")?>


<script type="text/javascript">
    $(document).ready(function() 
    {
      $('#limpiar').click(function() {
        $('.formula').val('');
        $('.indicacion').val('');
       
         
      });
    });
    </script>

<script>
$(document).ready(function () {
  
    $("#precio").on("input", function () {
    let valor = $(this).val();
    // Reemplazar cualquier carácter no válido con una cadena vacía
    valor = valor.replace(/[^0-9.]/g, '');

    const partes = valor.split('.');
    if (partes.length > 2) {
      valor = partes[0] + '.' + partes.slice(1).join('');
    }


    if (valor.startsWith(".")) {
      valor = "0" + valor;
    }

    $(this).val(valor);
  });

});
</script>

<script type="text/javascript">
 function CargarInformacionMedicamento(Valor) {

var medicamento_id = Valor;
console.log(medicamento_id);
$.ajax({
    type: "POST",
    url: "RM_Ajax.php",
    Ruta: "<?php echo $enlace_actual?>",
    data: {
        medicamento_id: medicamento_id,
        Tipo: "Llenar Modulo Medicamentos"
    },
    success: function (response) {

        var json = response;

        // Converting JSON-encoded string to JS object
        var Arreglo = JSON.parse(json);
        for (index in Arreglo) {
            if (document.getElementById(index) != undefined) {
                document.getElementById(index).value = Arreglo[index];
            }

            valor = Arreglo[index];
            if (index == "Presentacion") {
                $("#Presentacion > option[value='" + valor + "']").attr("selected", true);
                $("#Presentacion").change();
            }
            if (index == "Via_Administracion") {
                $("#Via_Administracion > option[value='" + valor + "']").attr("selected", true);
                $("#Via_Administracion").change();
            }
        }

    }
});
}

    function agergarItem(){
        // estas son las variables que enviamos
        var formula = $("#formula").val();
        var id_usuario = $("#id_usuario").val();
        var ID_formula = $("#ID_formula").val();
        var numerosesiones = $("#numerosesiones").val();
        var precio = $("#precio").val();
        var Cantidad = $("#Cantidad").val();
        var Presentacion = $("#Presentacion").val();
        var Via_Administracion = $("#Via_Administracion").val();
        var Composicion = $("#Composicion").val();
        var Dosis = $("#Dosis").val();
        var Indicaciones = $("#Indicaciones").val();
        var Indicaciones_Generales = $("#Indicaciones_Generales").val();
        var ID_principal = <?= $ID_principal ?>;
      console.log(Indicaciones_Generales);
      console.log(Indicaciones);
      console.log(Composicion);
      console.log(Via_Administracion);
      console.log(Presentacion);
      console.log(Dosis);
      console.log(Cantidad);
        

        if(formula=="" || numerosesiones=="" || precio=="" || Cantidad=="" || Presentacion=="" || Via_Administracion=="" || Composicion=="" || Dosis=="" || Indicaciones=="" ){
         
            alert('Rellene Todos los Campos');
            return;
        }

 
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "RM_ajax_agregarMedicamentos.php",
            data: {formula :formula , id_usuario:id_usuario,ID_formula:ID_formula, Cantidad:Cantidad, Dosis:Dosis, Presentacion:Presentacion, Via_Administracion:Via_Administracion, Composicion:Composicion, Indicaciones:Indicaciones, Indicaciones_Generales:Indicaciones_Generales,ID_principal:ID_principal,Tipo_Consulta:"Agregar Formula"},
            success: function(Respuesta) {
                var response = JSON.parse(Respuesta);
                window.location=response.Estado;
            }
        });

    };

</script>
<script>
    function EliminarFormula(idmedicamento,idformula) {

        Swal.fire({
            title: 'Esta Seguro que Desea Eliminar el Procedimiento?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',

        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "RM_ajax_agregarMedicamentos.php",
                    data: {
                        Tipo_Consulta: "Eliminar Formula",
                        idmedicamento: idmedicamento,
                        idformula: idformula,
                    }
                }).done(function(Respuesta) {
                    var response = JSON.parse(Respuesta);
                    if (response.Estado == true) {
                        Swal.fire(
                            'Eliminado!',
                        );
                        setTimeout(function() {
                            window.location=response.Ruta;
                        }, 500);
                    } else {
                        Swal.fire(
                            'Error al Eliminar!',
                        );
                        setTimeout(function() {
                            window.location=response.Ruta;
                        }, 500);
                    }
                });

            }
        })

}

$(document).ready(function () {
        $(".select2").select2();

        $('#Presentacion').select2({
            tags: true,
            createTag: function (params) {
                // Don't offset to create a tag if there is no @ symbol
                /*
                if (params.term.indexOf('@') === -1) {
                    // Return null to disable tag creation
                    return null;
                }
                */

                return {
                    id: params.term,
                    text: params.term
                }
            }
        }).on('select2:close', function () {
            var element = $(this);
            var new_category = $.trim(element.val());

            console.log(new_category);
            if (new_category != '') {
                $.ajax({
                    url: "Global_Ajax.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        Tipo_Select_Global: "Presentacion_Receta",
                        Usuario_Select_Global: "<?php echo $usuario_id; ?>"
                    },
                    success: function (data) {
                        console.log(data);
                        data = data.trim(); // fue necesario ya que el dato devuelto se recivia con espacios BY: JHOE
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>').val(data).change();
                        }
                    }
                })
            } else {
                console.log("Error");
            }

        });

        $('#Via_Administracion').select2({
            tags: true,
            createTag: function (params) {
                // Don't offset to create a tag if there is no @ symbol
                /*
                if (params.term.indexOf('@') === -1) {
                    // Return null to disable tag creation
                    return null;
                }
                */

                return {
                    id: params.term,
                    text: params.term
                }
            }
        }).on('select2:close', function () {
            var element = $(this);
            var new_category = $.trim(element.val());

            console.log(new_category);
            if (new_category != '') {
                $.ajax({
                    url: "Global_Ajax.php",
                    method: "POST",
                    data: {
                        Nueva_Opcion_Select_Global: new_category,
                        Tipo_Select_Global: "Via_Administracion_Receta",
                        Usuario_Select_Global: "<?php echo $usuario_id; ?>"
                    },
                    success: function (data) {
                        console.log(data);
                        data = data.trim(); // fue necesario ya que el dato devuelto se recivia con espacios BY: JHOE
                        if (data == 'Error') {
                            alert("Error al crear un nuevo dato");
                        } else if (data == 'Creado') {
                            console.log("existe dato");
                        } else {
                            //element.append('<option value="' + data + '">' + new_category + '</option>').val(data).change();
                            element.append('<option value="' + data + '">' + data + '</option>').val(data).change();
                        }
                    }
                })
            }

        });
    });
</script>

