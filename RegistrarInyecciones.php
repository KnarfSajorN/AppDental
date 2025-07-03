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


if($_GET['eD']<>"")
{
  include 'funciones/conn3.php';
  $idvacuna= decrypt($_GET["eD"]);
  $queryListhc=mysqli_query($conn3,"SELECT * from vacunas where id='$idvacuna'");
  $nrowl=mysqli_num_rows($queryListhc);
  while($Lista=mysqli_fetch_array($queryListhc))
  {
    $nombre= $Lista['Nombre'];
    $nombre_comercial= $Lista['Nombre_Comercial'];
    $lote= $Lista['Lote'];
    $fecha_vencimiento= $Lista['Fecha_Vencimiento'];
    $origen= $Lista['Origen'];
    $laboratorio= $Lista['Laboratorio'];
    $factura= $Lista['Factura'];
    $fecha_compra= $Lista['Fecha_Compra'];

  }  

}


?>

 <style type="text/css">
    .select2-container .select2-selection--single 
    {
      height: 43px!important;
      padding: 10px!important;
    }
  </style>

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
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
         <li  class="active"> Registrar Nueva Inyección </li>
      </ol>
    </section>
  
<br>       
<section class="content">
<h4 class="Titulo_Pagina">Registrar Nueva Inyección </h4>
<div  class="box box-info" align="center">
 
 <div class="card-body">
    <h4 class="card-title"> </h4>
    <br><br>
    <div class="content">
    
      <div class="">

           <form action="GuardarInyeccion.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data" class="row">

              <div class="form-group col-md-6">
                <div align="left"> Nombre </div>
                
                <input type="text" class="form-control input-lg" id="nombre" name="nombre" placeholder="Nombre"  value="<?php echo $nombre?>" required>
              </div>

              <div class="form-group col-md-6">
                 <div align="left">  Nombre Comercial </div>
                <input type="text" class="form-control input-lg" id="nombre_comercial" name="nombre_comercial" placeholder="Nombre Comercial" value="<?php echo $nombre_comercial?>">
              </div>

            

<?php if($_GET['eD']=="")
{
         echo ' <div class="form-group col-md-6">
                <div align="left"> Lote </div>
                
                <input type="text" class="form-control input-lg" id="lote" name="lote" placeholder="Lote" >
              </div>

 <div class="form-group col-md-6">
                <div align="left"> Cantidad</div>
                
                <input type="text" class="form-control input-lg" id="cantidad" name="cantidad" placeholder="Cantidad" >
              </div> ';} ?>



              <div class="form-group col-md-6">
                 <div align="left">Origen</div>

                  <select id="origen" name="origen" class="form-control select2" style="width: 100%;" >
                  <?php 
                  if($_GET['eD']=="")
                  {
                    echo '<option value="" selected="selected">Seleccione</option>';
                  }
                  else
                  {
                    if($origen=='1')
                    {echo '<option value="1" selected="selected">Ministerio de Salud</option>';}
                    elseif($origen=='2')
                    {echo '<option value="2" selected="selected">Compra Particular</option>';}
                    else
                    {echo '<option value="" selected="selected">Seleccione</option>';} 
                  }
                  ?>
                    
                    <option value="1">Ministerio de Salud</option>
                    <option value="2">Compra Particular</option>
                  </select>
              </div>

              <div class="form-group col-md-6">
                <div align="left"> Laboratorio </div>
                
                <input type="text" class="form-control input-lg" id="laboratorio" name="laboratorio" placeholder="Laboratorio" value="<?php echo $laboratorio?>">
              </div>

              <div class="form-group col-md-6">
                 <div align="left">  Factura </div>
                <input type="text" class="form-control input-lg" id="factura" name="factura" placeholder="Factura" value="<?php echo $factura?>">
              </div>

              <div class="form-group col-md-6">
                 <div align="left">  Fecha Compra </div>
                <input type="date" class="form-control input-lg" id="fecha_compra" name="fecha_compra" value="<?php echo $fecha_compra?>" >
              </div> 

                <div class="form-group col-md-6">
                 <div align="left">  Fecha Caducidad </div>
                <input type="date" class="form-control input-lg" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha Vencimiento" value="<?php echo $fecha_vencimiento?>" >
              </div>
              
              <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID']?>">
              
              <div class="form-group col-md-12">
                <?php
                if($_GET['eD']=="")
                {
                ?>
                <center><button type="submit" name="Guardar"class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button></center>
                <?php
                }
                else
                {
                ?>
                <input type="hidden" name="id_vacuna" value="<?= decrypt($_GET['eD'])?>">
                <center><button type="submit" name="Actualizar" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Actualizar</button></center>
                <?php
                }
                ?>
              </div>

          </form>
          </div>
          </div>
</div>
 </div>
 <div class="box">
  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">
                <thead>
                <tr>
                <th>Id</th>
                  <th>Nombre</th>
                  <th>Nombre Comercial</th>
                  <th>Lotes</th>
                  <th>Fecha de Vencimiento</th>                
                  <th>Laboratorio</th>
                  <th>Factura</th>
                  <th>Fecha de Compra</th>
                  <th>   </th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php

                  $usuario_id = $_SESSION['ID'];                                                 
                  $queryList=mysqli_query($conn3,"SELECT * FROM vacunas where activo = 1 ORDER BY id ASC");
                  $nrowl=mysqli_num_rows($queryList);
                  while($Lista=mysqli_fetch_array($queryList))
                  {
                    $id = $Lista['id'];
                    $Nombre = $Lista['Nombre'];
                    $Nombre_Comercial = $Lista['Nombre_Comercial'];
                    $Lote = $Lista['Lote'];
                    $Fecha_Vencimiento = $Lista['Fecha_Vencimiento'];
                    $Origen = $Lista['Origen'];
                    $Laboratorio = $Lista['Laboratorio'];
                    $Factura = $Lista['Factura'];
                    $Fecha_Compra = $Lista['Fecha_Compra'];
                    $Protege_contra=$Lista['Protege_Contra'];
                    $Edad=$Lista['Edad'];



         echo ' <tr>
                    <td>'.$id.' </td>
                    <td>'.$Nombre.' </td>
                    <td>'.$Nombre_Comercial.' </td>
                    <td>'.funcionLotes($id, 'id_vacuna', 'descripcion', 'lotes').'</td>
                    <td>'.funcionLotes($id, 'id_vacuna', 'fechaV', 'lotes').'</td>
                   
                    <td>'.$Laboratorio.' </td>
                    <td>'.$Factura.' </td>
                    <td>'.$Fecha_Compra.' </td>
                    <td>' ;
if ($_SESSION['TIPO'] ==99) { ECHO '

                    <a href="RegistrarInyecciones?eD='.encrypt($id).'" title="Editar Inyección"><i class="fa fa-pencil"></i> </a> |
                    <a href="lotesInyeccion?eD='.encrypt($id).'" title="Agregar Lote"><i class="fa fa-plus-square"></i> </a> |
         <a class="eliminar" href="EliminarInyeccion.php?v='.encrypt($id).'" ><i class="fa fa-trash" style="color:RED" title = "Eliminar"></i>  </a>  </td>

                    </tr>'; }




                  }


                  ?>

 
                </tbody>
              </table>
            </div>
  </div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'?>

<script type="text/javascript">


</script>

 