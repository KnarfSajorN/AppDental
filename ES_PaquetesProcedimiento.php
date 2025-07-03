<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
    $ID = $_SESSION['ID'];

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
      <li><a href="#"> Paquete de Procedimientos </a></li>
    </ol>
  </section>
  <!-- Main content -->
  
  <section class="content">
  <h4 class="Titulo_Pagina"> &nbsp;&nbsp;Paquete de Procedimientos </h4>
    <div class="">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">
            
              <div class="box box-solid">

               
                    <form action="#" method="POST" name="formularioActualizarcliente">

                        <div class="form-group col-md-12">
                            <div align="left">Crear Paquete</div>
                            <input type="text" class="form-control input-lg" id="formula" name="formula" placeholder="Escriba el Nombre del Paquete" >
                        </div>
                        <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
             
            
                        <div class="form-group col-md-12">
                            <br>
                   
                            <a href="#"  onclick="agergarItem();" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Agregar </strong> </a>
                        </div>                    

                        <br>

                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Paquetes</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                    <?php                                         
                        $queryList=mysqli_query($conn3,"SELECT * FROM  ES_Paquete WHERE Activo='1' AND usuario_id='$_SESSION[ID]'");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {



                                          $id      = $row_recordset32['id'];
                                         
                                          $Nombre      = $row_recordset32['Nombre'];
                                          $Fecha      = $row_recordset32['Fecha'];
                                          $numero++;
                                    
  
                                        echo '     <tr>
                                        <td>'.$numero.' </td>
                                        <td>'.$Nombre.' </td>
                                        <td>'.$Fecha.' </td>
                                        
                                        
                                        <td>    
                                            
                                        <a href="ES_VerFormula?id='.$id.'" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"  title="Ver/Editar Paquetes"><i class="fa fa-eye"></i>Ver Paquete/Procedimientos </a> <br> 
                                        
                        
                                        <a onclick="EliminarPaquete('.$id.')"  class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" title="Eliminar"><i class="fa fa-remove"> Eliminar Paquete</i> </a> </td>
                                
                                        </tr>';

                                    }
                    ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                
                                <th>   </th>
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
    });
});
</script>

<script type="text/javascript">




 







 
    function agergarItem(){
        // estas son las variables que enviamos
        var formula = $("#formula").val();
        var id_usuario = $("#id_usuario").val();

        if(formula==""){
            alert('Rellene el Campo');
            return;
        }

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ES_ajax_agregarPaquete.php",
            data: {formula :formula , id_usuario:id_usuario, Tipo_Consulta:"Agregar Paquete"},
            success: function(Respuesta) {
                var response = JSON.parse(Respuesta);
                window.location=response.Estado;
             
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };

</script>
<script>
    function EliminarPaquete(id) {

        Swal.fire({
            title: 'Esta Seguro que Desea Eliminar el Paquete?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',

        }).then((result) => {

            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "ES_ajax_agregarPaquete.php",
                    data: {
                        Tipo_Consulta: "Eliminar Paquete",
                        id: id,

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
 