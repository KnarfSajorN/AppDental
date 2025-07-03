
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Registros de Presupuestos
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Registros de Presupuestos</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
$msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-danger ">
            <h4> Presupuesto Eliminado!</h4>

            <p>   </p>
          </div>'; 


 
        }
      ?>

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                      <th>Numero</th>
                  <th>Cliente</th>
                  <th>Fecha Presupuesto</th>
                  <th>Fecha vencimiento</th>
                  <th><div align="right">Total</div></th>
                  <th><div align="right">Monto Pagado</div></th>
                  <th><div align="right">Monto Faltante</div></th>
                  <th><div align="right">Cant.</div></th>
                  <th><div align="right">Dias</div></th>
                    <th width="10%">   </th>
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];
 
                    if ($_GET['clienteId']) {
                    $idCliente =  $_GET['clienteId'];
                      $resultado=mysql_query("SELECT * FROM  sOperacionInv where tipo = 2  and activo='1' and idCliente = '$idCliente' order by numeroDoc");

                    }
                    else
                    {
                      $resultado=mysql_query("SELECT * FROM  sOperacionInv where  tipo = 2 and activo='1' order by numeroDoc");

                    }

                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado)) {
                     $firma  =$fila['Firma'];

                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                         $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $fila[2]");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];

                
            }
$saldo = $fila['totalNeto']-$fila['montoPagado'];


$hoy = date("Y-m-d");
$vence =  $fila['fechaVencimiento'];






$date1 = new DateTime($hoy);
$date2 = new DateTime($vence);
$diff = $date1->diff($date2);
// will output 2 days
//echo $diff->days . ' days ';


                  
                  $Color="";
                  if($saldo=="0"){$Color = 'style="background-color:#80e68070"';}else{$Color = 'style="background-color:#ffffff00"';}
                  

                  echo '     <tr '.$Color.'>
                  <td>'.$fila['numeroDoc'].' </td>
                  <td>'.$nombre_cliente.' </td>
                  <td>'.$fila['fechaOperacion'].'</td>
                  <td>'.$fila['fechaVencimiento'].'</td>
                  <td><div align="right">'.number_format($fila['totalNeto'], 0, ',', '.').'</div></td>
                  <td><div align="right">'.$fila['montoPagado'].'</div></td>
                  <td><div align="right">'.$saldo.'</div></td>
                  <td><div align="right">'.$fila['cantidadProduc'].'</div></td>
                  <td> <div align="right">  '.$diff->days.' </div></td>
                  <td>    
                      
                      <a href="imprimirPresupuesto.php?idOperacion='.$fila['idOperacion'].'" target="_blank"><i class="fa fa-print"   title = "Imprimir" ></i> </a>    | 
                      <a href="preliminarPresupuesto.php?idOperacion='.$fila['idOperacion'].'" target="_blank"><i class="fa fa-eye"   title = "Ver presupuesto "></i>  </a> |' ;
                    if(strlen($firma)>1) {
                      echo ' <a ><i style="color:RED" class=""></i> Firmado </a> |'; 
                    } else {
                      echo  '<a href="EnviarPresupuesto.php?idOperacion='.$fila['idOperacion'].'" target="_blank"><i class="fa fa-opencart"   title = "Firmar"></i>  </a>   <br>';
                    }

                 echo   '<a href="FacturarPresupuesto.php?idOperacion='.$fila['idOperacion'].'" target="_blank"><i class="fa fa-dollar"   title = "Facturar"></i>  </a>  | <a 
                      <a href="HistorialAbono.php?idOperacion='.$fila['idOperacion'].'" target="_blank"><i class="fa fa-file-text-o"   title = "Historial de Abono"></i>  </a>  | ';
                  
 


                  if($saldo=="0")
                  {
                    echo '<a href="?msg=3" style="color:green"><i class="fa fa-money" style="color:green" title = "Ya se abonó la totalidad del presupuesto"></i>  </a>  |  
                      ';
                  }
                  else
                  {
                  echo '<a href="Abono.php?idOperacion='.$fila['idOperacion'].'" ><i class="fa fa-money" style="color:red" title = "Abonar Presupuesto"></i>  </a>   |  <a class="editar" href="Editar_Presupuesto.php?idOperacion='.$fila['idOperacion'].'" ><i class="fa fa-pencil" style="color:blue" title = "Editar"></i>  </a>
                      ';
                  } 
                     
                  echo ' <a class="eliminar" href="EliminarPresupuesto.php?idOperacion='.$fila['idOperacion'].'" ><i class="fa fa-times" style="color:RED" title = "Eliminar Presupuesto"></i>  </a> 
                   
                      </td>
                      </tr>';
 }


 ?>


 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Numero</th>
                  <th>Cliente</th>
                  <th>Fecha Presupuesto</th>
                  <th>Fecha vencimiento</th>
                  <th><div align="right">Total</div></th>
                  <th><div align="right">Monto Pagado</div></th>
                  <th><div align="right">Monto Faltante</div></th>
                  <th><div align="right">Cant.</div></th>
                  <th><div align="right">Dias</div></th>
                  <th>   </th>
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