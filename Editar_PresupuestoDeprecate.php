   <?php 
   include 'header.php';
   include 'menu.php';

   $idOperacion = $_GET['idOperacion'];

               $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
            echo   "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion";
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $idOperacion      =$rowMotorizado['idOperacion'];
              $numeroDoc      =$rowMotorizado['numeroDoc'];//
              $idCliente      =$rowMotorizado['idCliente'];//
              $idEmpresa      =$rowMotorizado['idEmpresa'];
              $fechaOperacion      =$rowMotorizado['fechaOperacion'];//
              $fechaVencimiento      =$rowMotorizado['fechaVencimiento'];
              //$subTotal      =$rowMotorizado['subTotal'];
              $impuesto      =$rowMotorizado['impuesto'];
              $totalNeto      =$rowMotorizado['totalNeto'];
              $totalBruto      =$rowMotorizado['totalBruto'];
              $cantidadProduc      =$rowMotorizado['cantidadProduc'];
              $descuentos      =$rowMotorizado['descuentos'];
              $montoPagado      =$rowMotorizado['montoPagado'];
              $nota      =$rowMotorizado['nota'];

              $descuentos = $rowMotorizado['descuentos'];
              $total_con_descuento = $rowMotorizado['total_con_descuento'];
              $id_medico_relacionado = $rowMotorizado['id_medico_relacionado'];
            }

            $totalInicial = $total_con_descuento+$descuentos;


            $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $idEmpresa");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $emailF=$rowMotorizado['emailF'];//
              $ciudadPaisF=$rowMotorizado['ciudadPaisF'];//


              $LogoF               =$rowMotorizado['logoF'];

              if (strlen($LogoF) > 0) 
              {
              $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="15%" width="70%">';// 
              }

            }
 


            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $idEmpresa");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $ciudad             =$rowMotorizado['ciudad'];//
              $NOMBRE_USUARIO     =$rowMotorizado['NOMBRE_USUARIO'];//
            }

            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];//
              $ciudad_cliente             =$rowMotorizado['ciudad_cliente'];//
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];//
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];//
              $CODI_CLIENTE               =$rowMotorizado['CODI_CLIENTE'];//
                
            }


$saldo = $totalBruto-$montoPagado;


if ($saldo == 0) {
$pagado = '<div align="center"><img src="https://'.$Base.'/pagado.png" height="10%" width="30%"></div>'; 

}
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Presupuesto
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Editar Presupuesto</a></li>
      </ol>
    </section>

  <section class="invoice">
    <div class="row">

      <div class="col-md-12">
        <div class="col-md-4" style="text-align-last: center;">
          <h2>
          <?php echo $Logo ?> 
          </h2>
        </div>
        <div class="col-md-8" style="text-align-last: center;">
          <h2 class="page-header" style="font-size: 25px;"><br>
            <small class="pull-center"><?php echo $header ?></small>
            <small class="pull-center"> <?php echo $ciudad?></small> 
            <small class="pull-center"><?php echo $ciudadPaisF?></small>
            <small class="pull-center"><?php echo $emailF?></small>
          </h2>
        </div>
      </div>

      <div class="col-md-12">
        <hr style="border-top: 1px solid #000;">
        

        <div class="col-xs-6" style="text-align-last: center;">
            <h1 class="page-header" style="font-size: 30px;">
              PRESUPUESTO #<?php echo $numeroDoc ?>
            </h1>
        </div>

        <div class="col-xs-6">
            <h2 class="page-header" style="font-size: 20px;">
              <small class="pull-center"><strong>Fecha :</strong> <?php echo $fechaOperacion?></small>
              <small class="pull-center"><strong>Usuario :</strong> <?php echo $NOMBRE_USUARIO?></small>

            </h2>
        </div>

        
        <hr><hr><hr><hr>
        <hr style="border-top: 1px solid #000;">

      </div>

      <div class="col-md-12">

        <div class="col-md-6 invoice-col" style="font-size: 14px;">
          <address>
            <strong>Id Paciente </strong><?php echo $idCliente ?><br>
            <strong>Nombres </strong><?php echo $nombre_cliente ?><br>
            <strong>Cedula </strong><?php echo $CODI_CLIENTE ?><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-md-6 invoice-col" style="font-size: 14px;">
          <address>
            <strong>Ciudad </strong><?php echo $ciudad_cliente ?><br>
            <strong>Direccion </strong><?php echo $direccion_cliente ?><br>
            <strong>Telefonos </strong><?php echo $telefono_cliente ?><br>
          </address>
        </div>

        <hr><hr><hr>
        <hr style="border-top: 1px solid #000;">

      </div>

      <div class="col-md-12">
        <form action="ActualizarPresupuesto.php" method="POST" name="ActualizarPresupuesto">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Descripción</th>
               <!-- <th>Pieza / Patologia</th> -->
                <th><div align="center">Cantidad</div></th>
                <th><div align="center">Precio</div></th>
                <th><div align="center">Subtotal </div></th>
                <th style="width: 5%;"><div align="Right"></div></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $resultado=mysqli_query($conn3,"SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
              $check=mysqli_num_rows($q);

              while ($fila = mysqli_fetch_array($resultado)) {
                $Numero++;

                echo '<tr>
                <td  width="5%">'.$Numero.' </td>
                <td width="40%">
                <input type="text" name="Producto['.$Numero.'][descripcion]" class="form-control input-lg" value="'.$fila['descripcion'].'" required>
                </td>
              <!--  <td width="10%"> 
                <input type="text" name="Producto['.$Numero.'][informacion]" class="form-control input-lg" value="'.$fila['informacion'].'" required>
                </td> -->
                <td width="5%"><div align="Right">
                <input type="text" name="Producto['.$Numero.'][cantidad]" id="cantidad'.$Numero.'" class="form-control input-lg" value="'.$fila['cantidad'].'" required onChange="Subtotal('.$Numero.')">
                </div></td>
                <td width="10%"><div align="Right">
                <input type="text" name="Producto['.$Numero.'][base]" id="base'.$Numero.'" class="form-control input-lg" value="'.$fila['base'].'" required onChange="Subtotal('.$Numero.')">
                </div></td>
                <td width="10%"><div align="Right">
                <input type="text" name="Producto['.$Numero.'][subTotal]" id="subtotal'.$Numero.'" class="form-control input-lg" value="'.$fila['subTotal'].'" required readonly>
                </div>

                <input  type="hidden" name="Producto['.$Numero.'][id]" value="'.$fila['id'].'">
                
                </td>
                <td  class="text-center"><a href="EliminarItemPresupuesto.php?&idOperacion='.$idOperacion.'&idsDetalleOper='.$fila['id'].'"><i class="fa fa-times"></i> </td>
                </tr>';


              }
              ?>
               <tr>
                <td colspan="3"></td>
                <td colspan="1">Subtotal :</td>
                <td colspan="1"><?php echo $totalBruto?> $</td>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td colspan="1">Impuesto :</td>
                <td colspan="1"><?php echo $impuesto?> $</td>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td colspan="1">Total :</td>
                <td colspan="1"><?php echo $totalNeto?> $</td>
                <td colspan="2"></td>
              </tr>
            </tbody>
          </table>
          <input  type="hidden" name="idOperacion" value="<?php echo $idOperacion?>">
          <input  type="hidden" name="id_usuario" value="<?php echo $_SESSION["ID"]?>'">
          <br>
          <label>Nota</label>
          <textarea id="nota" name="nota" class="" placeholder="Observaciones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota;?></textarea>
          <br><br>
          <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  A c t u a l i z a r </strong> </h2> </button></center>
        </div>
        </form>
      </div>

    </div>
  </section>
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>

<script type="text/javascript">
  function Subtotal(valor)
  {
    var base = document.getElementById("base"+valor).value;
    var cantidad = document.getElementById("cantidad"+valor).value;

    document.getElementById("subtotal"+valor).value = base*cantidad;
  }
</script>