<?php include 'header.php';
include 'menu.php';

////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////?IMPORTATE SI AGREGAN CAMPOS EN LA TABLA DE VACUNACION/INYECTOLOGIA QUE PUEDA SER NULL YA QUE ESTAS TABLAS SE USARAN TANTO EN VACUNACION COMO INYECTOLOGIA ////////////////////////////////////////////

$grupo = decrypt($_GET['eD']);

?>

 <style type="text/css">
    .select2-container .select2-selection--single 
    {
      height: 43px!important;
      padding: 10px!important;
    }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
         <li  class="active"> Registrar Vacuna a Grupo </li>
      </ol>
    </section>
  
<br> 


<section class="content">






 
<div  class=" box-info" align="center">

 

 <div class="box">
  <div class="box-body">
     <div class="form-group col-md-12" align="center"> <B> <h4>Grupo <?php echo funcionMaster($grupo, 'id', 'Nombre', 'grupos_vacunacion') ?></h4> </B></div> 

              <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">
                <thead>
                <tr>
                <th>Id</th>
                  <th>Nombre Grupo</th>
                  <th>Nombre Vacuna</th>
                  <th>Dosis</th>
                  <th>Edad</th>
                  <th>Protege Contra</th>
                  <th>   </th>
                </tr>
                </thead>
                <tbody>
                  <?php

                  $usuario_id = $_SESSION['ID'];                                                 
                  $queryList=mysqli_query($conn3,"SELECT * FROM listado_vacunas where Id_Grupo='$grupo' and activo=1");
                 
                  $nrowl=mysqli_num_rows($queryList);
                  while($Lista1=mysqli_fetch_array($queryList))
                  {
                    $id = $Lista1['id'];
                    $Nombre_Grupo = $Lista1['Nombre_Grupo'];
                    $Nombre_Vacuna = $Lista1['Nombre_Vacuna'];
                    $Protege_Contra = $Lista1['Protege_Contra'];
                    $Edad = $Lista1['Edad'];
                    $Dosis = $Lista1['Dosis'];

                    echo '     <tr>
                    <td>'.$id.' </td>
                    <td>'.$Nombre_Grupo.' </td>
                    <td>'.$Nombre_Vacuna.' </td>
                    <td>'.$Dosis.' </td>
                    <td>'.$Edad.' </td>
                    <td>'.$Protege_Contra.' </td>
                    <td>    

 <a href="vacunacionRegistroVAG?eD='.encrypt($id).'&grupo='.encrypt($grupo).'" title="Editar Vacuna"><i class="fa fa-pencil"></i> </a> |

<a href="vacunacionEliminarVacunasGrupos?v='.encrypt($id).'&grupo='.encrypt($grupo).'" title="Eliminar Vacuna"><i class="fa fa-trash"></i> </a> 
                    </td>

                    </tr>';

                  }


                  ?>

 
                </tbody>
                <tfoot>
                <tr>
                <th>Id</th>
                  <th>Nombre Grupo</th>
                  <th>Nombre Vacuna</th>
                  <th>Dosis</th>
                  <th>Edad</th>
                  <th>Protege Contra</th>
                  <th>   </th>
                </tr>
                </tfoot>
              </table>
            </div>
  </div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include 'footer.php';

?>

<script type="text/javascript">



    function agergarItem(){
        // estas son las variables que enviamos
        var grupo = $("#grupo").val();
  
        $.ajax({
            type: "POST",
            url: "ajax_agregarGrupo.php",
            data: {grupo:grupo},
            success: function(response) {

                $('#grupo').val('');
              

                $('#div-results').html(response);
             
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };













</script>