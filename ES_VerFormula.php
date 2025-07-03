<?php
    include 'header.php';
    include 'menu.php';
    $ID_formula = $_GET['id'];

    if ($_GET["msg"] != "") {
        include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
    }
    if ($_GET["error"] != "") {
        include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
    }
?>

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
      <li><a href="#"> Procedimiento </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <h4 class="Titulo_Pagina"> <a href='<?php echo "{$Base}ES_PaquetesProcedimiento"; ?>'> <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i></a> &nbsp;&nbsp;Procedimiento </h4>
    <div class="">
      <div class="">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
            
              <div class="box box-solid">

                <div class="row">
                        <div class="form-group col-md-12">
                            <div align="left"><H4> Paquete: <B><?php echo funcionMaster($ID_formula,'id','nombre','ES_Paquete');?></B> </H4></div>
                        </div>   
               
    
                        <div class="form-group col-md-12">
                            <div align="left">Agregar Tratamiento</div>

                            <select id="formula" name="formula" class="form-control select2" style="width: 100%;" >
                                <option value="" selected="selected">Seleccione ...</option>
                                <?php                                                              
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  sinvetrios WHERE estado = 1");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($row_recordset32=mysqli_fetch_array($queryList))
                                    {   
                                        $ID      = $row_recordset32['ID'];
                                        $descripcion      = $row_recordset32['descripcion'];
                                        $tipo = $row_recordset32['tipo'];
                                        $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
                                        while ($rowinv = mysqli_fetch_array($queryinv)) {
                                            $TipoInventario = $rowinv['tipo'];
                                        }
                                        
                                        if($TipoInventario=="1" OR $TipoInventario=="2"){
                                            echo "<option value='$ID'> $descripcion </option>";
                                        }
                                        
                                        
                                    }
                                    ?>
                            </select>


                             <!--   <input type="text" class="form-control input-lg" id="formula" name="formula" placeholder="Escriba el nombre del medicamento" > -->

                        </div>



                        <div class="form-group col-md-6">
                            <div align="left">Numero de Sesiones</div>
                            <input type="text" class="form-control input-lg" id="numerosesiones" name="numerosesiones" placeholder="Escriba el numero de Sesiones" > 
                        </div>

                        <div class="form-group col-md-6">
                            <div align="left">Precio Total</div>
                            <input type="text" class="form-control input-lg" id="precio" name="precio" placeholder="Precio" > 
                        </div>

                        <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
                        <input type="hidden" name="ID_formula" id="ID_formula"  value="<?php echo $ID_formula?>">
             
            
                        <div class="form-group col-md-12">
                            <a href="#"  onclick="agergarItem();" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar Procedimiento</strong> </a>
                        </div>



                </div>




                <br>



                <div class="box-body col-md-12">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tratamiento o Procedimiento</th>
                                <th>Numero de Sesiones</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                                                
                            $queryList=mysqli_query($conn3,"SELECT * FROM  ES_Paquete_Procedimientos where paquete_id =$ID_formula and Activo='1' ");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $ID_FM     = $row_recordset32['id'];
                                          $ID_FORM     = $row_recordset32['paquete_id'];
                                          $numerosesiones     = $row_recordset32['Numerosesiones'];
                                         
                                          $descripcion      = funcionMaster($row_recordset32['inventario_id'], 'ID', 'descripcion', 'sinvetrios');
                                          $precio      = $row_recordset32['Precio'];
                                          $Fecha      = $row_recordset32['Fecha'];
                                    
  
                                        echo '     <tr>
                                        <td>'.$Fecha.' </td>
                                        <td>'.$descripcion.' </td>
                                        <td>'.$numerosesiones.' </td>
                                        <td>'.$precio.' </td>
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
                            <th></th>
                            <th></th>
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


    function agergarItem(){
        // estas son las variables que enviamos
        var formula = $("#formula").val();
        var id_usuario = $("#id_usuario").val();
        var ID_formula = $("#ID_formula").val();
        var numerosesiones = $("#numerosesiones").val();
        var precio = $("#precio").val();

        if(formula=="" || numerosesiones=="" || precio==""){
            console.log(formula);
            console.log(numerosesiones);
            console.log(precio);
            alert('Rellene Todos los Campos');
            return;
        }

 
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ES_ajax_agregarProcedimientos.php",
            data: {formula :formula , id_usuario:id_usuario,ID_formula:ID_formula, numerosesiones:numerosesiones, precio:precio, Tipo_Consulta:"Agregar Formula"},
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
                    url: "ES_ajax_agregarProcedimientos.php",
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
</script>

