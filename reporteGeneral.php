
<!-- Left side column. contains the logo and sidebar -->
<?php 
include 'header.php';
include 'menu.php';

$ID = $_SESSION['ID'];

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['tipo'];
//
$orden = $_POST['orden'];
$manera = $_POST['manera'];

$tipo_reporte = $_POST['tipo_reporte'];

?>
<style type="text/css">
.col-xs-3
{
  padding-bottom: 20px;
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
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Reportes Sistema </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Reportes Sistema </h4>
                <div class="box">
                    <div class="box-body">



                    <div class="box-body">
                      <div class="col-md-12">
                        <h2 align="center"><?php echo $tipo_reporte?></h2>
                        <div class="table table-responsive">
                          <table id="Tabla_Inteligente" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <?php
                              //Reporte de Ventas
                                $Cabezera["Reporte de Ventas"]=["TIPO DOCUMENTO","NUMERO DOC","FECHA","RUC","NOMBRE","VTA.BTA","% DESCUENTO","VTA.NET","VENTA BASE 0%","VENTA BASE 12%","I.V.A.","TOTAL"];

                              //Reporte de Compras
                                $Cabezera["Reporte de Compras"]=["TIPO DOCUMENTO","NUM.DOC. SISTEMA/DIARIO CONTABLE","FECHA","IDENT. PROVEEDOR","NOMBRE","NUMERO DOC PROVEEDOR","CMP.BTA.","DSCTO.","COMPRA NETA","COMPRA BASE 0%","COMPRA BASE 12%","I.V.A.","I.C.E.","TOTAL"];

                              //Reporte de Retenciones
                                $Cabezera["Reporte de Retenciones"]=["TIPO DOCUMENTO","NUMERO DOC","FECHA","RUC","PROVEEDOR","FAC.PRO","NUM.RET","CMP.NET.","I.V.A.","SIN IVA","I.V.A.","BASE ","CONCEPTO","%  RETENC","VALOR RETENCION","IMP."];

                              //Reporte de Mayores Contables
                                $Cabezera["Reporte de Mayores Contables"]=["TIPO DOCUMENTO","NUMERO DOC CONTABLE","FECHA","DETALLE","DEBITO","CREDITO","SALDO"," No.CHEQUE/DOC BANC"];

                              //Reporte de Cuentas Por Pagar
                                $Cabezera["Reporte de Cuentas Por Pagar"]=["ID PROVEEDOR","NOMBRE PROVEEDOR","NUM. DOC CONTABLE","NUM FACT","DETALLE","FEC FACT","TOT DOC.","FEC VENC","DIAS V","SALDO"];

                              //Reporte de Cuentas Por Cobrar
                                $Cabezera["Reporte de Cuentas Por Cobrar"]=["ID CLIENTE","NOMBRE PROVEEDOR","NUM. DOC CONTABLE","NUM FACT","DETALLE","FEC FACT","TOT DOC.","FEC VENC","DIAS V","SALDO"];

                              //Reporte de Activos
                                $Cabezera["Reporte de Activos"]=["FECHA DE ADQUISICION","VALOR DE ADQUISICION","VALOR A DEPRECIAR","VIDA UTIL (meses)","VIDA UTIL (meses)","ACUMULADO DE DEPRECIACION","VALOR ACTUAL(al corte)","ESTADO"];

                              //Reporte Resumen de Compras
                                $Cabezera["Reporte Resumen de Compras"]=["ID", "FECHA", "TOTAL DE PRODUCTOS", "COSTO", "PROVEEDOR", "RUT", "DEPOSITO DESTINO", "CANTIDAD DE PRODUCTOS TOTALES", "FECHA EMISION", "FECHA LIBRO", "FECHA VENCIMIENTO", "NOTAS"];

                              //Reporte de Ordenes de Compra pendientes
                                $Cabezera["Reporte de Ordenes de Compra pendientes"]=["N.","Fecha","Cant. producto","Proveedor","Estado"];

                              //Reporte de Ordenes de Compra aprobadas
                                $Cabezera["Reporte de Ordenes de Compra aprobadas"]=["N.","Fecha","Cant. producto","Proveedor","Estado"];

                              //Reporte de Ordenes de Compra rechazadas
                                $Cabezera["Reporte de Ordenes de Compra rechazadas"]=["N.","Fecha","Cant. producto","Proveedor","Estado"];

                              //Reporte de Ordenes de Compra rechazadas
                                $Cabezera["Reporte de Ordenes de Compra procesadas"]=["N.","Fecha","Cant. producto","Proveedor","Estado"];

                              //Reporte de Clientes con Cuenta contable
                                $Cabezera["Reporte de Clientes con Cuenta contable"]=["NUMERO INTERNO","NOMBRE","CELULAR","CIUDAD","CORREO","FECH REGISTRO","GENERO","DIRECCION","TELEFONO","EDAD","PROFESION","CUENTA CONTABLE"];

                              //Reporte de Clientes con Centro de Costos
                                $Cabezera["Reporte de Clientes con Centro de Costos"]=["NUMERO INTERNO","NOMBRE","CELULAR","CIUDAD","CORREO","FECH REGISTRO","GENERO","DIRECCION","TELEFONO","EDAD","PROFESION","CENTRO DE COSTOS"];

                              //Reporte de Clientes Completo
                                $Cabezera["Reporte de Clientes Completo"]=["NUMERO INTERNO","NOMBRE","CELULAR","CIUDAD","CORREO","FECH REGISTRO","GENERO","DIRECCION","TELEFONO","EDAD","PROFESION","CUENTA CONTABLE","CENTRO DE COSTOS"];

                              //Balance General
                                $Cabezera["Balance General"]=["DESCRIPCION","SALDO ACTUAL"];

                                //Reporte General
                                $Cabezera["Reporte General"]=["CODIGO","DESCRIPCION","COSTO","EXISTENCIA","VALOR INVENTARIO"];

                                //Reporte de Caja menor
                                $Cabezera["Reporte de Caja menor"] = ["# CAJA", "FECHA", "DOCUMENTO", "DESCRIPCION", "ENTRADA", "SALIDA", "SALDO"];

                                $Cabezera["Reporte de Caja menor Detalles"] = ["# CAJA", "FECHA", "DOCUMENTO", "DESCRIPCION", "ENTRADA", "SALIDA", "SALDO"];

                                foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                                  echo "<td>{$value}</td>";
                                }


                                ?>

                              </tr> 
                            </thead>
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

<script>//version 2 tabla dinamica <table id="Tabla_Inteligente">
var data_table = [];//datos que recibe la tabla
var titulo_tabla = "<?php echo $tipo_reporte;?>";//titulo de la tabla para las impresiones

if (titulo_tabla=="Reporte de Ventas") 
{  
  <?php
      //query para sacar la informacion se pone el filtro de $tipo_reporte
  if ($tipo == 0 AND $tipo_reporte=="Reporte de Ventas") 
  {                           
    $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where   tipo = 1 AND fechaOperacion BETWEEN '$desde' and '$hasta' order by fechaOperacion asc ");
  }
  elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Ventas") 
  {
    $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where  tipo = 1 AND idCliente = $tipo and (fechaOperacion BETWEEN '$desde' and '$hasta' ) order by fechaOperacion asc ");
  }

  // // $nrowl=mysqli_num_rows($queryList);

  while($rowMotorizado=mysqli_fetch_array($queryList))
  {
    $cliente_id=$rowMotorizado['cliente_id'];
    $numeroDoc=$rowMotorizado['numeroDoc'];
    $fechaOperacion=$rowMotorizado['fechaOperacion'];
    $descuento=$rowMotorizado['descuento'];
    $subTotal=$rowMotorizado['subTotal'];
    $impuesto=$rowMotorizado['impuesto'];
    $nombreCliente=funcionMaster($rowMotorizado['idCliente'],'cliente_id','nombre_cliente','cliente');
    $rucCliente=funcionMaster($rowMotorizado['idCliente'],'cliente_id','CODI_CLIENTE','cliente');

    if($impuesto<>"0"){$v12=$subTotal;$v0="0";}
    else{$v0=$subTotal;$v12="0";}

    $totalNeto=$rowMotorizado['totalBruto'];
    $totalBruto=$rowMotorizado['totalNeto'];

    ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ "<?php echo 'Ventas';?>", 
        "<?php echo $numeroDoc;?>",
        "<?php echo $fechaOperacion;?>",
        "<?php echo $rucCliente;?>", 
        "<?php echo $nombreCliente;?>",
        "<?php echo $totalBruto;?>",
        "<?php echo $descuento;?>",
        "<?php echo $totalNeto;?>",
        "<?php echo $v0;?>",
        "<?php echo $v12;?>",
        "<?php echo $impuesto;?>",
        "<?php echo $totalNeto;?>"
        ] );
      <?php
    }
    ?>

  }
  else if (titulo_tabla==="Reporte de Compras")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Compras") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT * from opracioninvheader oh inner join operacioninv oi on oi.nOperaheader=oh.id WHERE oh.fechaReg BETWEEN '$desde' and '$hasta' order by oi.nOperaheader asc");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Compras") 
    {
      $queryList1=mysqli_query($conn3,"SELECT * from opracioninvheader oh inner join operacioninv oi on oi.nOperaheader=oh.id WHERE oh.fechaReg BETWEEN '$desde' AND '$hasta' AND idTercero = '$tipo' order by oi.nOperaheader asc");
    }
    // // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
      {
        $tipoDoc=$rowMotorizado1['tipoDoc'];
        $fechaemision=$rowMotorizado1['fechaemision'];
        $fechaReg=$rowMotorizado1['fechaReg'];
        $nOperaheader=$rowMotorizado1['nOperaheader'];
        $numdocprovedor=funcionMaster($rowMotorizado1['idTercero'],'id','rut','sproveedores');
        $nombreprovedor=funcionMaster($rowMotorizado1['idTercero'],'id','nombre','sproveedores');
        $totalCosto=$rowMotorizado1['totalCosto'];
        $impuesto=$rowMotorizado1['impuesto'];

        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ "<?php echo 'Compras';?>", 
          "<?php echo $nOperaheader;?>",
          "<?php echo $fechaReg;?>",
          "<?php echo 'RUC';?>", 
          "<?php echo $nombreprovedor ;?>",
          "<?php echo $numdocprovedor;?>",
          "<?php echo 'CMP.BTA.';?>",
          "<?php echo 'DSCTO.';?>",
          "<?php echo $totalCosto;?>",
          "<?php echo $totalCosto;?>",
          "<?php echo "0";?>",
          "<?php echo "0";?>",
          "<?php echo "0";?>",
          "<?php echo $totalCosto;?>"
          ] );
        <?php
      }
    }
    
    ?>
  }
  else if (titulo_tabla=="Reporte de Retenciones")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Retenciones") 
    {                           
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where   fechaOperacion BETWEEN '$desde' and '$hasta' order by fechaOperacion asc ");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Retenciones") 
    {
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where  idCliente = $tipo and (fechaOperacion BETWEEN '$desde' and '$hasta' ) order by fechaOperacion asc ");
    }

    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
        while($rowMotorizado=mysqli_fetch_array($queryList))
      {
        $cliente_id=$rowMotorizado['cliente_id'];
        $numeroDoc=$rowMotorizado['numeroDoc'];
        $fechaOperacion=$rowMotorizado['fechaOperacion'];
        $descuento=$rowMotorizado['descuento'];
        $subTotal=$rowMotorizado['subTotal'];
        $impuesto=$rowMotorizado['impuesto'];

        if($impuesto<>"0"){$v12=$subTotal;$v0="0";}
        else{$v0=$subTotal;$v12="0";}

        $totalBruto=$rowMotorizado['totalBruto'];

        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ "<?php echo 'Ventas';?>", 
          "<?php echo $numeroDoc;?>",
          "<?php echo $fechaOperacion;?>",
          "<?php echo 'RUC';?>", 
          "<?php echo 'NOMBRE';?>",
          "<?php echo 'VTA.BTA';?>",
          "<?php echo $descuento;?>",
          "<?php echo 'VTA.NET';?>",
          "<?php echo $v0;?>",
          "<?php echo $v12;?>",
          "<?php echo $impuesto;?>",
          "<?php echo $impuesto;?>",
          "<?php echo $impuesto;?>",
          "<?php echo $impuesto;?>",
          "<?php echo $impuesto;?>",
          "<?php echo $totalBruto;?>"
          ] );
        <?php
      }
    }
    
    ?>
  }
  else if (titulo_tabla=="Reporte de Mayores Contables")
  {

    <?php
    //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Mayores Contables") 
    {                           
      $queryList=mysqli_query($conn3,"SELECT * FROM  CCuentasMayor  where   fecha BETWEEN '$desde' and '$hasta' order by fecha asc ");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Mayores Contables") 
    {
      $queryList=mysqli_query($conn3,"SELECT * FROM  CCuentasMayor  where  fecha  BETWEEN '$desde' and '$hasta'  order by fecha asc ");
    }

    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
      while($rowMotorizado=mysqli_fetch_array($queryList))
      {
        $idCC=$rowMotorizado['id'];
        $tipo_docCC=$rowMotorizado['tipo_doc'];
        $idCuentaCC=$rowMotorizado['idCuenta'];
        $fechaCC=$rowMotorizado['fecha'];
        $detalleCC=$rowMotorizado['detalle'];
        $debeCC=$rowMotorizado['debe'];
        $haberCC=$rowMotorizado['haber'];
        $saldoCC=$rowMotorizado['saldo'];
        $nCHCC=$rowMotorizado['nCH'];
        if($impuesto<>"0"){$v12=$subTotal;$v0="0";}
        else{$v0=$subTotal;$v12="0";}
        $totalBruto=$rowMotorizado['totalBruto'];
        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ 
          "<?php echo $tipo_docCC;?>",
          "<?php echo $idCuentaCC;?>",
          "<?php echo $fechaCC;?>",
          "<?php echo $detalleCC;?>",
          "<?php echo $debeCC;?>",
          "<?php echo $haberCC;?>",
          "<?php echo $saldoCC;?>",
          "<?php echo $nCHCC;?>"
          ] );
        <?php
      }
    }
    
    ?>

  }
  else if (titulo_tabla=="Reporte de Cuentas Por Pagar")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Cuentas Por Pagar") 
    {                           
        //$queryList=mysqli_query($conn3,"SELECT * from opracioninvheader oh inner join sproveedores sp on sp.id=oh.idTercero WHERE oh.fechaReg BETWEEN '$desde' and '$hasta' order by oh.fechaReg asc");
      $queryList=mysqli_query($conn3,"SELECT * from opracioninvheader WHERE fechaReg BETWEEN '$desde' and '$hasta' order by fechaReg asc");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Cuentas Por Pagar") 
    {
        //$queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where  idCliente = $tipo and (fechaOperacion BETWEEN '$desde' and '$hasta' ) order by fechaOperacion asc ");
      $queryList=mysqli_query($conn3,"SELECT * from opracioninvheader WHERE idTercero = $tipo and fechaReg BETWEEN '$desde' and '$hasta' order by fechaReg asc");
    }

    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
      while($rowMotorizado=mysqli_fetch_array($queryList))
      {
        $id=$rowMotorizado['id'];
        $idTercero=$rowMotorizado['idTercero'];
        $nombre=$rowMotorizado['nombre'];
        $numero=$rowMotorizado['numero'];
        $nota=$rowMotorizado['nota'];
        $fechaemision=$rowMotorizado['fechaemision'];
        $montoDocumento=$rowMotorizado['montoDocumento'];
        $fechavencimiento=$rowMotorizado['fechavencimiento'];
        $diasvencimiento = ((strtotime($fechavencimiento)-strtotime($fechaemision))/86400);
        $saldoDocumento=$rowMotorizado['saldoDocumento'];

        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ "<?php echo $idTercero;?>", 
          "<?php echo $nombre;?>",
          "<?php echo $numero;?>",
          "<?php echo $id;?>", 
          "<?php echo $nota;?>",
          "<?php echo $fechaemision;?>",
          "<?php echo $montoDocumento;?>",
          "<?php echo $fechavencimiento;?>",
          "<?php echo $diasvencimiento;?>",
          "<?php echo $saldoDocumento;?>"
          ] );
        <?php
      }
    }
    
    ?>

  }
  else if (titulo_tabla=="Reporte de Cuentas Por Cobrar")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Cuentas Por Cobrar") 
    {                           
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where   tipo = 1 AND fechaOperacion BETWEEN '$desde' and '$hasta' order by fechaOperacion asc ");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Cuentas Por Cobrar") 
    {
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where  tipo = 1 AND idCliente = $tipo and (fechaOperacion BETWEEN '$desde' and '$hasta' ) order by fechaOperacion asc ");
    }

    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
      while($rowMotorizado=mysqli_fetch_array($queryList))
      {
        $idCliente=$rowMotorizado['idCliente'];
        $nombre = funcionMaster($idCliente,'cliente_id','nombre_cliente','cliente');
        $numeroDoc=$rowMotorizado['numeroDoc'];
        $nota=$rowMotorizado['nota'];
        $fechaOperacion=$rowMotorizado['fechaOperacion'];
        $totalBruto=$rowMotorizado['totalBruto'];
        $fechaVencimiento=$rowMotorizado['fechaVencimiento'];
        $diasvencimiento = ((strtotime($fechaVencimiento)-strtotime($fechaOperacion))/86400);
        //$montoPagado=$rowMotorizado['montoPagado'];
        $idOperacion = $rowMotorizado['idOperacion'];

        $queryList1=mysqli_query($conn3,"SELECT * FROM  sCuentasCobrar  where  idDocumento = $idOperacion ");
        $rowMotorizado1=mysqli_fetch_array($queryList1);
        $montoPendiente=$rowMotorizado1['montoPendiente'];

        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ "<?php echo $idCliente;?>", 
          "<?php echo $nombre;?>",
          "<?php echo '0';?>",
          "<?php echo $numeroDoc;?>", 
          "<?php echo $nota;?>",
          "<?php echo $fechaOperacion;?>",
          "<?php echo $totalBruto;?>",
          "<?php echo $fechaVencimiento;?>",
          "<?php echo $diasvencimiento;?>",
          "<?php echo $montoPendiente;?>"
          ] );
        <?php
      }
    }
    
    ?>

  }
  else if (titulo_tabla=="Reporte de Activos")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Activos") 
    {                           
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where   fechaOperacion BETWEEN '$desde' and '$hasta' order by fechaOperacion asc ");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Activos") 
    {
      $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv  where  idCliente = $tipo and (fechaOperacion BETWEEN '$desde' and '$hasta' ) order by fechaOperacion asc ");
    }

    // $nrowl=mysqli_num_rows($queryList);
    if ($queryList) {
      while($rowMotorizado=mysqli_fetch_array($queryList))
    {
      $cliente_id=$rowMotorizado['cliente_id'];
      $numeroDoc=$rowMotorizado['numeroDoc'];
      $fechaOperacion=$rowMotorizado['fechaOperacion'];
      $descuento=$rowMotorizado['descuento'];
      $subTotal=$rowMotorizado['subTotal'];
      $impuesto=$rowMotorizado['impuesto'];

      if($impuesto<>"0"){$v12=$subTotal;$v0="0";}
      else{$v0=$subTotal;$v12="0";}

      $totalBruto=$rowMotorizado['totalBruto'];

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ "<?php echo 'Ventas';?>", 
        "<?php echo $numeroDoc;?>",
        "<?php echo $fechaOperacion;?>",
        "<?php echo 'RUC';?>", 
        "<?php echo 'NOMBRE';?>",
        "<?php echo 'VTA.BTA';?>",
        "<?php echo $descuento;?>",
        "<?php echo 'VTA.NET';?>",
        "<?php echo $v0;?>",
        "<?php echo $v12;?>",
        "<?php echo $impuesto;?>",
        "<?php echo $totalBruto;?>"
        ] );
      <?php
    }
    }
    
    ?>

  }else if (titulo_tabla==="Reporte Resumen de Compras")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte Resumen de Compras") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT 
        oh.id,oh.fechaReg, oh.cantidadReg,oh.totalCosto,oh.nombre,oh.rut,d.descripcion as destino,sum(oi.cantidad) as cantidad, oh.fechaemision,oh.fechalibro,oh.fechavencimiento,oh.notas
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        join dep d on oh.destino=d.id
        where oh.fechaemision BETWEEN '$desde' and '$hasta'
        group by oh.id");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte Resumen de Compras") 
    {
      $queryList1=mysqli_query($conn3,"SELECT 
        oh.id,oh.fechaReg, oh.cantidadReg,oh.totalCosto,oh.nombre,oh.rut,d.descripcion as destino,sum(oi.cantidad) as cantidad, oh.fechaemision,oh.fechalibro,oh.fechavencimiento,oh.notas
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        join dep d on oh.destino=d.id
        where oh.fechaemision BETWEEN '$desde' and '$hasta'
        group by oh.id");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
      {
        $idRC=$rowMotorizado1['id'];
        $fechaRegRC=$rowMotorizado1['fechaReg'];
        $cantidadRegRC=$rowMotorizado1['cantidadReg'];
        $totalCostoRC=$rowMotorizado1['totalCosto'];
        $nombreRC=$rowMotorizado1['nombre'];
        $rutRC=$rowMotorizado1['rut'];
        $destinoRC=$rowMotorizado1['destino'];
        $cantidadRC=$rowMotorizado1['cantidad'];
        $fechaemisionRC=$rowMotorizado1['fechaemision'];
        $fechalibroRC=$rowMotorizado1['fechalibro'];
        $fechavencimientoRC=$rowMotorizado1['fechavencimiento'];
        $notasRC=$rowMotorizado1['notas'];

        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push( [ 
          "<?php echo $idRC;?>",
          "<?php echo $fechaRegRC;?>",
          "<?php echo $cantidadRegRC;?>",
          "<?php echo $totalCostoRC;?>",
          "<?php echo $nombreRC;?>",
          "<?php echo $rutRC;?>",
          "<?php echo $destinoRC;?>",
          "<?php echo $cantidadRC;?>",
          "<?php echo $fechaemisionRC;?>",
          "<?php echo $fechalibroRC;?>",
          "<?php echo $fechavencimientoRC;?>",
          "<?php echo $notasRC;?>"
          ] );
        <?php
      }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Ordenes de Compra pendientes")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Ordenes de Compra pendientes") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 0                
        group by oh.id;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Ordenes de Compra pendientes") 
    {
      $queryList1=mysqli_query($conn3,"SELECT 
        SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 0        
        group by oh.id;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {
      $idO=$rowMotorizado1['id'];
      $usuario_idO=$rowMotorizado1['usuario_id'];
      $cantidadRegO=$rowMotorizado1['cantidadReg'];
      $totalCostoO=$rowMotorizado1['totalCosto'];
      $nombreO=$rowMotorizado1['nombre'];
      $destinoO=$rowMotorizado1['destino'];
      $cantidadO=$rowMotorizado1['cantidad'];
      $fechaRegO=$rowMotorizado1['fechaReg'];
      $estadoOrdenO=$rowMotorizado1['estadoOrden'];
      if ($estadoOrdenO==0) {
        $estadoOrdenO_='PENDIENTE';
      }ELSE if ($estadoOrdenO==1) {
        $estadoOrdenO_='APROBADO';
      }ELSE if ($estadoOrdenO==2) {
        $estadoOrdenO_='';
      }ELSE if ($estadoOrdenO==3) {
        $estadoOrdenO_='RECHAZADA';
      }ELSE if ($estadoOrdenO==4) {
        $estadoOrdenO_='PROCESADA';
      }

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $idO;?>",
        "<?php echo $fechaRegO;?>",
        "<?php echo $cantidadO;?>",
        "<?php echo $nombreO;?>",
        "<?php echo $estadoOrdenO_;?>"
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Ordenes de Compra aprobadas")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Ordenes de Compra aprobadas") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 1                
        group by oh.id;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Ordenes de Compra aprobadas") 
    {
      $queryList1=mysqli_query($conn3,"SELECT 
        SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 1        
        group by oh.id;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {
      $idO=$rowMotorizado1['id'];
      $usuario_idO=$rowMotorizado1['usuario_id'];
      $cantidadRegO=$rowMotorizado1['cantidadReg'];
      $totalCostoO=$rowMotorizado1['totalCosto'];
      $nombreO=$rowMotorizado1['nombre'];
      $destinoO=$rowMotorizado1['destino'];
      $cantidadO=$rowMotorizado1['cantidad'];
      $fechaRegO=$rowMotorizado1['fechaReg'];
      $estadoOrdenO=$rowMotorizado1['estadoOrden'];
      if ($estadoOrdenO==0) {
        $estadoOrdenO_='PENDIENTE';
      }ELSE if ($estadoOrdenO==1) {
        $estadoOrdenO_='APROBADO';
      }ELSE if ($estadoOrdenO==2) {
        $estadoOrdenO_='';
      }ELSE if ($estadoOrdenO==3) {
        $estadoOrdenO_='RECHAZADA';
      }ELSE if ($estadoOrdenO==4) {
        $estadoOrdenO_='PROCESADA';
      }

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $idO;?>",
        "<?php echo $fechaRegO;?>",
        "<?php echo $cantidadO;?>",
        "<?php echo $nombreO;?>",
        "<?php echo $estadoOrdenO_;?>"
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Ordenes de Compra rechazadas")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Ordenes de Compra rechazadas") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 3                
        group by oh.id;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Ordenes de Compra rechazadas") 
    {
      $queryList1=mysqli_query($conn3,"SELECT 
        SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 3       
        group by oh.id;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {
      $idO=$rowMotorizado1['id'];
      $usuario_idO=$rowMotorizado1['usuario_id'];
      $cantidadRegO=$rowMotorizado1['cantidadReg'];
      $totalCostoO=$rowMotorizado1['totalCosto'];
      $nombreO=$rowMotorizado1['nombre'];
      $destinoO=$rowMotorizado1['destino'];
      $cantidadO=$rowMotorizado1['cantidad'];
      $fechaRegO=$rowMotorizado1['fechaReg'];
      $estadoOrdenO=$rowMotorizado1['estadoOrden'];
      if ($estadoOrdenO==0) {
        $estadoOrdenO_='PENDIENTE';
      }ELSE if ($estadoOrdenO==1) {
        $estadoOrdenO_='APROBADO';
      }ELSE if ($estadoOrdenO==2) {
        $estadoOrdenO_='';
      }ELSE if ($estadoOrdenO==3) {
        $estadoOrdenO_='RECHAZADA';
      }ELSE if ($estadoOrdenO==4) {
        $estadoOrdenO_='PROCESADA';
      }

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $idO;?>",
        "<?php echo $fechaRegO;?>",
        "<?php echo $cantidadO;?>",
        "<?php echo $nombreO;?>",
        "<?php echo $estadoOrdenO_;?>"
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Ordenes de Compra procesadas")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Ordenes de Compra procesadas") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 4                
        group by oh.id;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Ordenes de Compra procesadas") 
    {
      $queryList1=mysqli_query($conn3,"SELECT 
        SELECT oh.estadoOrden,oh.id, oh.usuario_id,oh.cantidadReg,oh.totalCosto,oh.nombre,oh.destino,sum(oi.cantidad) as cantidad, 
        oh.fechaReg 
        from opracioninvheader oh 
        inner join operacioninv oi on oi.nOperaheader=oh.id 
        where oh.fechaReg BETWEEN '$desde' and '$hasta'
        and oh.estadoOrden = 4        
        group by oh.id;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {
      $idO=$rowMotorizado1['id'];
      $usuario_idO=$rowMotorizado1['usuario_id'];
      $cantidadRegO=$rowMotorizado1['cantidadReg'];
      $totalCostoO=$rowMotorizado1['totalCosto'];
      $nombreO=$rowMotorizado1['nombre'];
      $destinoO=$rowMotorizado1['destino'];
      $cantidadO=$rowMotorizado1['cantidad'];
      $fechaRegO=$rowMotorizado1['fechaReg'];
      $estadoOrdenO=$rowMotorizado1['estadoOrden'];
      if ($estadoOrdenO==0) {
        $estadoOrdenO_='PENDIENTE';
      }ELSE if ($estadoOrdenO==1) {
        $estadoOrdenO_='APROBADO';
      }ELSE if ($estadoOrdenO==2) {
        $estadoOrdenO_='';
      }ELSE if ($estadoOrdenO==3) {
        $estadoOrdenO_='RECHAZADA';
      }ELSE if ($estadoOrdenO==4) {
        $estadoOrdenO_='PROCESADA';
      }

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $idO;?>",
        "<?php echo $fechaRegO;?>",
        "<?php echo $cantidadO;?>",
        "<?php echo $nombreO;?>",
        "<?php echo $estadoOrdenO_;?>"
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Clientes con Cuenta contable")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Clientes con Cuenta contable") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' ;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Clientes con Cuenta contable") 
    {
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' and cliente_id = '$tipo' ;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {     
      $cliente_id = $rowMotorizado1['cliente_id'];
      $usuario_id = $rowMotorizado1['usuario_id'];
      $nombre_cliente = $rowMotorizado1['nombre_cliente'];
      $celular_cliente = $rowMotorizado1['celular_cliente'];
      $ciudad_cliente = $rowMotorizado1['ciudad_cliente'];
      $edad_cliente = $rowMotorizado1['edad_cliente'];
      $correo_cliente = $rowMotorizado1['correo_cliente'];
      $profesion_cliente = $rowMotorizado1['profesion_cliente'];
      $CODI_CLIENTE = $rowMotorizado1['CODI_CLIENTE'];
      $genero = $rowMotorizado1['genero'];
      $direccion_cliente = $rowMotorizado1['direccion_cliente'];
      $telefono_cliente = $rowMotorizado1['telefono_cliente'];
      $fechaNacimiento = $rowMotorizado1['fechaNacimiento'];
      $whatsapp = $rowMotorizado1['whatsapp'];
      $fechar = $rowMotorizado1['fechar'];
      $nacionalidad = $rowMotorizado1['nacionalidad'];
      $categoria = $rowMotorizado1['categoria'];
      $idCuentaContable = $rowMotorizado1['idCuentaContable'];

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $cliente_id;?>",
        "<?php echo $nombre_cliente;?>",
        "<?php echo $celular_cliente;?>",
        "<?php echo $ciudad_cliente;?>",
        "<?php echo $correo_cliente;?>",
        "<?php echo $fechar;?>",
        "<?php echo $genero;?>",
        "<?php echo $direccion_cliente;?>",
        "<?php echo $telefono_cliente;?>",
        "<?php echo $edad_cliente;?>",
        "<?php echo $profesion_cliente;?>",
        "<?php echo $idCuentaContable;?>",
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Clientes con Centro de Costos")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Clientes con Centro de Costos") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' ;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Clientes con Centro de Costos") 
    {
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' and cliente_id = '$tipo' ;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {     
      $cliente_id = $rowMotorizado1['cliente_id'];
      $usuario_id = $rowMotorizado1['usuario_id'];
      $nombre_cliente = $rowMotorizado1['nombre_cliente'];
      $celular_cliente = $rowMotorizado1['celular_cliente'];
      $ciudad_cliente = $rowMotorizado1['ciudad_cliente'];
      $edad_cliente = $rowMotorizado1['edad_cliente'];
      $correo_cliente = $rowMotorizado1['correo_cliente'];
      $profesion_cliente = $rowMotorizado1['profesion_cliente'];
      $CODI_CLIENTE = $rowMotorizado1['CODI_CLIENTE'];
      $genero = $rowMotorizado1['genero'];
      $direccion_cliente = $rowMotorizado1['direccion_cliente'];
      $telefono_cliente = $rowMotorizado1['telefono_cliente'];
      $fechaNacimiento = $rowMotorizado1['fechaNacimiento'];
      $whatsapp = $rowMotorizado1['whatsapp'];
      $fechar = $rowMotorizado1['fechar'];
      $nacionalidad = $rowMotorizado1['nacionalidad'];
      $categoria = $rowMotorizado1['categoria'];
      $idCentroCosto = $rowMotorizado1['idCentroCosto'];
      $codigoCentroCosto = funcionMaster($idCentroCosto,'id','codigo','CcentroCostos');
      $nombreCentroCosto = funcionMaster($idCentroCosto,'id','descripcion','CcentroCostos');
      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $cliente_id;?>",
        "<?php echo $nombre_cliente;?>",
        "<?php echo $celular_cliente;?>",
        "<?php echo $ciudad_cliente;?>",
        "<?php echo $correo_cliente;?>",
        "<?php echo $fechar;?>",
        "<?php echo $genero;?>",
        "<?php echo $direccion_cliente;?>",
        "<?php echo $telefono_cliente;?>",
        "<?php echo $edad_cliente;?>",
        "<?php echo $profesion_cliente;?>",
        "<?php echo $codigoCentroCosto;?> - <?php echo $nombreCentroCosto;?>",
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte de Clientes Completo")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Reporte de Clientes Completo") 
    {                           
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' ;");
    }
    elseif ($tipo <> 0 AND $tipo_reporte=="Reporte de Clientes Completo") 
    {
      $queryList1=mysqli_query($conn3,"SELECT * from cliente where substr(fechar,1,10) BETWEEN '$desde' and '$hasta' and cliente_id = '$tipo' ;");
    }

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {     
      $cliente_id = $rowMotorizado1['cliente_id'];
      $usuario_id = $rowMotorizado1['usuario_id'];
      $nombre_cliente = $rowMotorizado1['nombre_cliente'];
      $celular_cliente = $rowMotorizado1['celular_cliente'];
      $ciudad_cliente = $rowMotorizado1['ciudad_cliente'];
      $edad_cliente = $rowMotorizado1['edad_cliente'];
      $correo_cliente = $rowMotorizado1['correo_cliente'];
      $profesion_cliente = $rowMotorizado1['profesion_cliente'];
      $CODI_CLIENTE = $rowMotorizado1['CODI_CLIENTE'];
      $genero = $rowMotorizado1['genero'];
      $direccion_cliente = $rowMotorizado1['direccion_cliente'];
      $telefono_cliente = $rowMotorizado1['telefono_cliente'];
      $fechaNacimiento = $rowMotorizado1['fechaNacimiento'];
      $whatsapp = $rowMotorizado1['whatsapp'];
      $fechar = $rowMotorizado1['fechar'];
      $nacionalidad = $rowMotorizado1['nacionalidad'];
      $categoria = $rowMotorizado1['categoria'];
      $idCuentaContable = $rowMotorizado1['idCuentaContable'];
      $idCentroCosto = $rowMotorizado1['idCentroCosto'];
      $codigoCentroCosto = funcionMaster($idCentroCosto,'id','codigo','CcentroCostos');
      $nombreCentroCosto = funcionMaster($idCentroCosto,'id','descripcion','CcentroCostos');
      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $cliente_id;?>",
        "<?php echo $nombre_cliente;?>",
        "<?php echo $celular_cliente;?>",
        "<?php echo $ciudad_cliente;?>",
        "<?php echo $correo_cliente;?>",
        "<?php echo $fechar;?>",
        "<?php echo $genero;?>",
        "<?php echo $direccion_cliente;?>",
        "<?php echo $telefono_cliente;?>",
        "<?php echo $edad_cliente;?>",
        "<?php echo $profesion_cliente;?>",
        "<?php echo $idCuentaContable;?>",
        "<?php echo $codigoCentroCosto;?> - <?php echo $nombreCentroCosto;?>",
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla==="Balance General")
  {
    <?php
      //query para sacar la informacion
    if ($tipo == 0 AND $tipo_reporte=="Balance General") 
      {$groupby='group by inicial';}
    elseif ($tipo <> 0 AND $tipo_reporte=="Balance General") 
      {$groupby='group by inicial';}

    $queryList1=mysqli_query($conn3,"SELECT cc.id, cc.descripcion,substr(cc.id,1,1) as inicial  from CCuentas cc ".$groupby);
    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
      {     
      $id = $rowMotorizado1['id'];
      $inicial = $rowMotorizado1['inicial'];
      $descripcion = $rowMotorizado1['descripcion'];

      if ($tipo == 0 AND $tipo_reporte=="Balance General") 
        {$queryList2=mysqli_query($conn3,"SELECT sum(ccm.debe) as debe, sum(ccm.haber) as haber from CCuentasMayor ccm where substr(idCuenta,1,1) = '$inicial' ");}
      elseif ($tipo <> 0 AND $tipo_reporte=="Balance General") 
        {$queryList2=mysqli_query($conn3,"SELECT sum(ccm.debe) as debe, sum(ccm.haber) as haber from CCuentasMayor ccm where substr(idCuenta,1,1) = '$inicial' ");}

      // $nrowl=mysqli_num_rows($queryList2);
      if ($queryList2) {
        while($rowMotorizado2=mysqli_fetch_array($queryList2))
      {     
        $debe = $rowMotorizado2['debe'];
        $haber = $rowMotorizado2['haber'];
      }
      }
      

      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $inicial;?> - <?php echo $id;?> - <?php echo $descripcion;?>",
        "<?php echo $debe;?> - <?php echo $haber;?>"
        ] );
      <?php
      }
    }
    
    ?>
  }
  else if (titulo_tabla==="Reporte General")
  {

    <?php
      //query para sacar la informacion
    if ($tipo == '*') {
      $queryList1=mysqli_query($conn3,"SELECT * from sinvetrios order by $orden $manera ");  
    }else{
      $queryList1=mysqli_query($conn3,"SELECT * from sinvetrios where id = $tipo order by $orden $manera ");  
    }
    

    // $nrowl=mysqli_num_rows($queryList1);
    if ($queryList1) {
      while($rowMotorizado1=mysqli_fetch_array($queryList1))
    {     
      
      $ID = $rowMotorizado1['ID'];
      $usuario_id = $rowMotorizado1['usuario_id'];
      $descripcion = $rowMotorizado1['descripcion'];
      $referencia = $rowMotorizado1['referencia'];
      $tipo = $rowMotorizado1['tipo'];
      $minimo = $rowMotorizado1['minimo'];
      $maximo = $rowMotorizado1['maximo'];
      $costo = $rowMotorizado1['costo'];
      $precio = $rowMotorizado1['precio'];
      $nota = $rowMotorizado1['nota'];
      $Fecha = $rowMotorizado1['Fecha'];
      $pos = $rowMotorizado1['pos'];
      $dep1 = $rowMotorizado1['dep1'];
      $dep2 = $rowMotorizado1['dep2'];
      $dep3 = $rowMotorizado1['dep3'];
      $dep4 = $rowMotorizado1['dep4'];
      $dep5 = $rowMotorizado1['dep5'];
      $dep6 = $rowMotorizado1['dep6'];
      $dep7 = $rowMotorizado1['dep7'];
      $dep8 = $rowMotorizado1['dep8'];
      $dep9 = $rowMotorizado1['dep9'];
      $dep10 = $rowMotorizado1['dep10'];
      $sum = $dep1 + $dep2 + $dep3 + $dep4 + $dep5 + $dep6 + $dep7 + $dep8 + $dep9 + $dep10;
      $valor = $costo * $sum;
      $iva = $rowMotorizado1['iva'];
      $tieneLote = $rowMotorizado1['tieneLote'];
      $idCuentaContable = $rowMotorizado1['idCuentaContable'];
      $idCentroCosto = $rowMotorizado1['idCentroCosto'];
      $codigoCentroCosto = funcionMaster($idCentroCosto,'id','codigo','CcentroCostos');
      $nombreCentroCosto = funcionMaster($idCentroCosto,'id','descripcion','CcentroCostos');
      ?>
      //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
      data_table.push( [ 
        "<?php echo $ID;?> - <?php echo $referencia;?>",
        "<?php echo $descripcion;?>",
        "<?php echo $costo;?>",
        "<?php echo $sum;?>",
        "$ - <?php echo $valor;?>",        
        ] );
      <?php
    }
    }
    
    ?>
  }
  else if (titulo_tabla === "Reporte de Caja menor Detalles") {
      <?php
      $caja = $_POST['caja'];
      //query para sacar la informacion
      // $usuario = $_POST['usuario'];
      // if ($usuario > 0) {
      //   $andUsuario = " and idUsuario = $usuario ";
      // } else {
      //   $andUsuario = "";
      // }

      // $categoria = $_POST['categoria'];
      // if ($categoria > 0) {
      //   $andCategoria = " and categoria = $categoria ";
      // } else {
      //   $andCategoria = "";
      // }

      $queryList1 = mysqli_query($conn3, "SELECT * FROM cajaMenor WHERE id = '{$caja}'");
      // $queryList1 = mysqli_query($conn3, "SELECT * FROM cajaMenor WHERE substr(fechaInicio,1,10) BETWEEN '$desde' and '$hasta' and substr(fechaFin,1,10) BETWEEN '$desde' and '$hasta' AND id = $caja $andUsuario ");
      // $nrowl = mysqli_num_rows($queryList1);
      if ($queryList1) {
       while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
        $id = $rowMotorizado1['id'];
        $idUsuario = $rowMotorizado1['idUsuario'];
        $fechaInicio = $rowMotorizado1['fechaInicio'];
        $fechaFin = $rowMotorizado1['fechaFin'];
        $motivo = $rowMotorizado1['motivo'];
        $saldo = $rowMotorizado1['saldo'];

        // segundo query
        $queryList2 = mysqli_query($conn3, "SELECT * from cajaMenorDetalle where idCajaMenor = $id ORDER BY id ASC");
        // $nrowl = mysqli_num_rows($queryList2);
        while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
          $id_ = $rowMotorizado2['id'];
          $idCajaMenor_ = $rowMotorizado2['idCajaMenor'];
          $fecha_ = $rowMotorizado2['fecha'];
          $documento_ = $rowMotorizado2['documento'];
          $descripcion_ = $rowMotorizado2['descripcion'];
          $monto_ = $rowMotorizado2['monto'];
          $tipo_ = $rowMotorizado2['tipo'];
          $saldo_ = $rowMotorizado2['saldo'];
          $categoria_ = $rowMotorizado2['categoria'];
          if ($tipo_ == "Entrada") {
            $entrada = $monto_;
            $salida = "0";
          } else if ($tipo_ == "Salida") {
            $entrada = "0";
            $salida = $monto_;
          } else {
            $entrada = "0";
            $salida = "0";
          }
      ?>
          data_table.push([
            "Caja # <?= $id; ?>",
            "<?= date('Y-m-d H:i:s', strtotime($fecha_)) ?>",
            "<?= $documento_ ?>",
            "<?= $descripcion_ ?>",
            "<?= number_format($entrada, 2, ',', '.') ?>",
            "<?= number_format($salida, 2, ',', '.') ?>",
            "<?= number_format($saldo_, 2, ',', '.') ?>",
          ]);
        <?php
        }
      }
      
        ?>
        //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
        data_table.push([
          "<strong>Caja # <?= $id; ?></strong>",
          "<strong>Desde: <?= date('Y-m-d', strtotime($fechaInicio)) ?> <br> Hasta: <?= date('Y-m-d', strtotime($fechaFin)) ?></strong>",
          "<strong></strong>",
          "<strong></strong>",
          "<strong></strong>",
          "<strong></strong>",
          "<strong>Saldo Final: <?= number_format($saldo, 2, ',', '.') ?></strong>",
        ]);
      <?php
      }
      ?>

    } else if (titulo_tabla === "Reporte de Caja menor") {

      <?php
      $caja = ($_POST['caja'] != 0 ? "'{$_POST['caja']}'" : 'id');
      //query para sacar la informacion
      $usuario = $_POST['usuario'];
      if ($usuario > 0) {
        $andUsuario = " and idUsuario = $usuario ";
      } else {
        $andUsuario = "";
      }

      $categoria = $_POST['categoria'];
      if ($categoria > 0) {
        $andCategoria = " and categoria = $categoria ";
      } else {
        $andCategoria = "";
      }

      $queryList1 = mysqli_query($conn3, "SELECT * FROM cajaMenor WHERE substr(fechaInicio,1,10) BETWEEN '$desde' and '$hasta' and substr(fechaFin,1,10) BETWEEN '$desde' and '$hasta' AND id = $caja $andUsuario ");
      // $nrowl = mysqli_num_rows($queryList1);
      if ($queryList1) {
        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
          $id = $rowMotorizado1['id'];
          $idUsuario = $rowMotorizado1['idUsuario'];
          $fechaInicio = $rowMotorizado1['fechaInicio'];
          $fechaFin = $rowMotorizado1['fechaFin'];
          $motivo = $rowMotorizado1['motivo'];
          $saldo = $rowMotorizado1['saldo'];
  
          // segundo query
          $queryList2 = mysqli_query($conn3, "SELECT * from cajaMenorDetalle where idCajaMenor = $id $andCategoria ");
          // $nrowl = mysqli_num_rows($queryList2);
          if ($queryList2) {
            while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
            $id_ = $rowMotorizado2['id'];
            $idCajaMenor_ = $rowMotorizado2['idCajaMenor'];
            $fecha_ = $rowMotorizado2['fecha'];
            $documento_ = $rowMotorizado2['documento'];
            $descripcion_ = $rowMotorizado2['descripcion'];
            $monto_ = $rowMotorizado2['monto'];
            $tipo_ = $rowMotorizado2['tipo'];
            $saldo_ = $rowMotorizado2['saldo'];
            $categoria_ = $rowMotorizado2['categoria'];
            if ($tipo_ == "Entrada") {
              $entrada = $monto_;
              $salida = "0";
            } else if ($tipo_ == "Salida") {
              $entrada = "0";
              $salida = $monto_;
            } else {
              $entrada = "0";
              $salida = "0";
            }
        ?>
            data_table.push([
              "Caja # <?= $id; ?>",
              "<?= date('Y-m-d H:i:s', strtotime($fecha_)) ?>",
              "<?= $documento_ ?>",
              "<?= $descripcion_ ?>",
              "<?= number_format($entrada, 2, ',', '.') ?>",
              "<?= number_format($salida, 2, ',', '.') ?>",
              "<?= number_format($saldo_, 2, ',', '.') ?>",
            ]);
          <?php
          }
          }
          
          ?>
          //accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
          data_table.push([
            "<strong>Caja # <?= $id; ?></strong>",
            "<strong>Desde: <?= date('Y-m-d', strtotime($fechaInicio)) ?> <br> Hasta: <?= date('Y-m-d', strtotime($fechaFin)) ?></strong>",
            "<strong></strong>",
            "<strong></strong>",
            "<strong></strong>",
            "<strong></strong>",
            "<strong>Saldo Final: <?= number_format($saldo, 2, ',', '.') ?></strong>",
          ]);
        <?php
        }
      }
     
      ?>
    }


</script>


<?php
include 'footer.php';
?>

<!-- plugin datatables inteligente print/pdf/excel etc -->
<!-- <link rel="stylesheet" type="text/css" href="plugins/datatablesK/datatables.css"/>
<script type="text/javascript" src="plugins/datatablesK/pdfmake.js"></script>
<script type="text/javascript" src="plugins/datatablesK/vfs_fonts.js"></script>
<script type="text/javascript" src="plugins/datatablesK/datatables.js"></script> -->
<!-- need <script src="js/jquery-3.5.1.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.select.min.js"></script>-->

<style type="text/css">.btn-primary1 {color: #fff !important;background-color: #337ab7!important;border-color: #2e6da4!important;}</style>
<script type="text/javascript">
  $(function () {
    // esto va en el footer
    //tabla inteligente
    if(typeof data_table !== 'undefined')
    {
      var Tabla_Inteligente=$('#Tabla_Inteligente').DataTable( {

        data:           data_table,
        deferRender:    true,
        scrollY:        1200,
        scrollCollapse: true,
        scroller:       true,
        processing: true,
        lengthMenu: [10, 20, 50, 100, 200, 500],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          },
          buttons: {
            pageLength: {
              _: "Mostrando %d <br> Elementos",
              '-1': "Ver Todo"
            }
          }
        },

        dom: 'Bfrtip',
        buttons: [
        {
          extend: 'collection',
          text: '<i class="fa fa-cog" aria-hidden="true"></i>',
          className: 'btn btn-primary1',
          buttons: [
          {
            extend: 'print',
            text: 'Imprimir',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'copy',
            text: 'Copiar',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'excel',
            text: 'Excel',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'csv',
            text: 'CSV',
            title: titulo_tabla,
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdf',
            text: 'PDF',
            title: titulo_tabla,
            orientation: 'landscape',
            exportOptions: {
              columns: ':visible'
            }
          },
          { extend: 'pageLength' },
          { extend: 'colvis', text: 'Modificar Columnas' }
          ]
        }
        ],

      } );
    }
    
  });
// fin de tabla inteligente
</script>