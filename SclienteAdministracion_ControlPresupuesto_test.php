<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>
<!--
1. Presupuesto normal/ Odontología: 2
2. Presupuesto Facial: 4
3. Presupuesto Corporal: 5
4. Presupuesto odontograma:6
-->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
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
    <div >
      <div class="col-xs-12">
        <?php
        $msg = $_GET['msg'];
        if ($msg == '1') {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
        }

        if ($msg == '2') {
          echo '
            <div class="callout callout-danger ">
            <h4> Presupuesto Eliminado!</h4>

            <p>   </p>
          </div>';
        }
        ?>

        <div class="box">
          <?php 
          $menu = funcionMaster($_SESSION['ID'],'ID','menu','usuarios');
          
          ?> 
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <font class="text-dark" style="<?=$menu == 5 ? '' : 'display:none;'?>"> Presupuesto Facial <i class="fa fa-circle" style="color:#7b41f2"></i> ||</font>
            <font class="text-dark" style="<?=$menu == 5 ? '' : 'display:none;'?>"> Presupuesto Corporal <i class="fa fa-circle" style="color:#E375FF"></i> ||</font>
            <font class="text-dark" style="<?=$menu == 8 ? '' : 'display:none;'?>"> Presupuesto Odontología <i class="fa fa-circle" style="color:#3d8aa0"></i> ||</font>
            <font class="text-dark" style="<?=$menu == 8 ? '' : 'display:none;'?>"> Presupuesto Odontograma <i class="fa fa-circle" style="color:#1bd6e5"></i> ||</font>
            <font class="text-dark"> Presupuesto Pagado <i class="fa fa-square" style="color:#80e68070"></i> </font>

            <?php
            //Armar arreglo con los presupuestos

            $ArregloPresupuestos[2]="<i class='fa fa-circle' style='color:#3d8aa0'></i>";//odontologia
            $ArregloPresupuestos[4]="<i class='fa fa-circle' style='color:#7b41f2'></i>";//Facial
            $ArregloPresupuestos[5]="<i class='fa fa-circle' style='color:#E375FF'></i>";//Corporal
            $ArregloPresupuestos[6]="<i class='fa fa-circle' style='color:#1bd6e5'></i>";//Odontograma


            ?>
            <!-- <font calss="text-dark"> Presupuesto Pendiente <i class="fa fa-circle" style="color:#ffff border: black"></i> </font>|| -->
            <table id="example1" class="table table-bordered table-striped" style="font-size: 15px;">


              <thead>
                <tr>
                  <th></th>
                  <th>Número</th>
                  <th>Cliente</th>
                  <th>Fecha Presupuesto</th>
                  <th>Fecha vencimiento</th>
                  <th>
                    <div align="right">Total</div>
                  </th>
                  <th>
                    <div align="right">Monto Pagado</div>
                  </th>
                  <th>
                    <div align="right">Monto Faltante</div>
                  </th>
                  <th>
                    <div align="right">Cant.</div>
                  </th>
                  <th>
                    <div align="right">Días</div>
                  </th>
                  <th width="10%">Presupuesto</th>
                  <th width="10%">Abono</th>
                  <th width="10%">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $ID = $_SESSION['ID'];
                if (decrypt($_GET['clienteId'])) {
                  // $idCliente =  $_GET['clienteId'];
                  $idCliente = decrypt($_GET['clienteId']);
                  $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idEmpresa = '{$_SESSION['ID']}' and tipo IN (2, 4, 5, 6) and idCliente = '$idCliente' order by numeroDoc");
                  // $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idEmpresa = '{$_SESSION['ID']}' and tipo = 2 or tipo = 4 or tipo = 5 or presupuestoFC = 0 and idCliente = '$idCliente' order by numeroDoc");
                } else {
                  $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idEmpresa = '{$_SESSION['ID']}' and tipo IN (2, 4, 5, 6) order by numeroDoc");
                  // $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where   tipo = 2 or tipo = 4 or tipo = 5 or presupuestoFC = 0 order by numeroDoc");
                }
                $check = mysqli_num_rows($q);

                while ($fila = mysqli_fetch_array($resultado)) {
                  $firma  = $fila['Firma'];
                  $tipo   = $fila['tipo'];
                  $idEmpresa   = $fila['idEmpresa'];
                  $moneda = funcionMaster($idEmpresa,'ID_Usuario','moneda','config');

                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $fila[2]");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                    $nombre_cliente             = $rowMotorizado['nombre_cliente'];

                    $telefono_cliente           = $rowMotorizado['telefono_cliente'];
                  }
                  $saldo = $fila['totalNeto'] - $fila['montoPagado'];



                  $hoy = date("Y-m-d");
                  $vence =  $fila['fechaVencimiento'];
                  $date1 = new DateTime($hoy);
                  $date2 = new DateTime($vence);
                  $diff = $date1->diff($date2);
                  $Color = "";
                  if ($saldo == "0") {
                    $Color = 'style="background-color:#80e68070"';
                  } else {
                    //$Color = 'style="background-color:#ffff"';
                  }
                  /*
                  if ($tipo == "4") {
                    $TIPO_P = 'style="background-color:#77F9EF"';
                  } elseif ($tipo == "5") {
                    $TIPO_P = 'style="background-color:#E375FF"';
                  }
                  */

                  echo '     <tr>
                  <td ' . $Color . '>'.$ArregloPresupuestos[$tipo]. ' </td>
                  <td ' . $Color . '>' . $fila['numeroDoc']. ' </td>
                  <td ' . $Color . '>' . $nombre_cliente . ' </td>
                  <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                  <td ' . $Color . '>' . $fila['fechaVencimiento'] . '</td>
                  <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2).' '. $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . number_format($fila['montoPagado'], 2).' '. $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . number_format($saldo, 2).' '. $moneda . '</div></td>
                  <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td>
                  <td ' . $Color . '> <div align="right">  ' . $diff->days . ' </div></td>   
                 ';
                ?>
                  <td width='10%' <?php echo $Color  ?>>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-bill'></i> Acciones Presupuesto
                      </button>
                      <div class='dropdown-menu'>
                      <?php
                        if ($tipo == 2) {
                        ?>
                        <a class='dropdown-item' href='preliminarPresupuesto.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Preliminar Presupuesto
                          </button>
                        </a>
                        <a class='dropdown-item' href='imprimirPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Imprimir Presupuesto
                          </button>
                        </a>
                        <a class='dropdown-item' href='enviarPresupuestoP.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Enviar Presupuesto
                          </button>
                        </a>
                        <?php } ?>
                        <?php
                        if ($tipo == 4) {
                        ?>
                        <a class='dropdown-item' href='preliminarPresupuestoFacial.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Preliminar Presupuesto
                          </button>
                        </a>
                        <a class='dropdown-item' href='imprimirPresupuestoFacial.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Imprimir Presupuesto
                          </button>
                        </a>
                        <a class="dropdown-item" target="_blank" href="<?php echo $Base; ?>preliminarPresupuestoFacial.php?idOperacion=<?php echo $fila[0]; ?>&send=true">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Enviar Presupuesto
                          </button>
                        </a>
                        <?php } ?>
                        <?php
                        if ($tipo == 5) {
                        ?>
                        <a class='dropdown-item' href='preliminarpresupuestoCorporal.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Preliminar Presupuesto
                          </button>
                        </a>
                        <a class='dropdown-item' href='imprimirPresupuestoCorporal.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Imprimir Presupuesto
                          </button>
                        </a>
                        <a class="dropdown-item" target="_blank" href="<?php echo $Base; ?>preliminarpresupuestoCorporal.php?idOperacion=<?php echo $fila[0]; ?>&send=true">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Enviar Presupuesto
                          </button>
                        </a>
                        <?php } ?>
                        

                        <?php
                        if ($tipo == 6) {
                        ?>
                        <a class='dropdown-item' href='OD_PreliminarPresupuesto.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Preliminar Presupuesto
                          </button>
                        </a>
                        <a class='dropdown-item' href='OD_ImprimirPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Imprimir Presupuesto
                          </button>
                        </a>
                        <?php } ?>
                        
                        <!--
                          <a class='dropdown-item' href='FacturarPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank' onclick="ModalLlenarSerialesProductos(<?=$fila['idOperacion'];?>)">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Facturar Presupuesto
                          </button>
                        </a>
                        -->

                        <a class='dropdown-item'  target='_blank' onclick="ModalLlenarSerialesProductos(<?=$fila['idOperacion'];?>)">
                          <button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1 btn-block'>
                            Facturar Presupuesto
                          </button>
                        </a>

                      </div>
                    </div>
                  </td>
                  <td width='10%' <?php echo $Color ?>>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-block btn-outline-success rounded-pill shadow m-1 dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fa fa-bill'></i> Acción Abono
                      </button>
                      <div class='dropdown-menu'>
                        <?php
                        if ($saldo == 0) {
                        ?>
                          <a href="?msg=3" style="color:green">
                          <button type='button' class='btn btn-warning btn-block' disabled>
                            Presupuesto Pagado
                          </button>
                          </a>
                        <?php } else { ?>
                          <a class='dropdown-item' href='Abono.php?idOperacion=<?php echo  $fila['idOperacion']; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                              Abonar
                            </button>
                          </a>
                        <?php } ?>
                        <a class='dropdown-item' href='HistorialAbono.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                          <button type='button' class='btn btn-block btn-outline-success rounded-pill shadow m-1 btn-block'>
                            Historial de Abono
                          </button>
                        </a>
                        
                      </div>
                    </div>
                  </td>

                  <td width='10%' <?php echo $Color ?>>
                    <?php
                    if ($saldo > 0) {
                      // echo var_dump($saldo);
                    ?>
                      <div class='btn-group'>
                        <button type='button' class='btn btn-block btn-outline-danger rounded-pill shadow m-1 dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                          <i class='fa fa-bill'></i> Acciones de Edición
                        </button>
                        <div class='dropdown-menu'>
                          <a class='dropdown-item' href='Editar_Presupuesto.php?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill shadow m-1 btn-block'>
                              Editar Presupuesto
                            </button>
                          </a>
                          <a class='dropdown-item' href='EliminarPresupuesto.php?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill shadow m-1 btn-block'>
                              Eliminar Presupuesto
                            </button>
                          </a>
                        </div>
                      </div>
                      <a href="?msg=3" style="color:green"></a>


                    <?php } else { ?>
                      <button type='button' class='btn btn-warning btn-block' disabled>
                        Cotización no editable
                      </button>
                    <?php } ?>

                  </td>


                <?php
                  echo '
                  </tr>';
                }

                ?>

                <a href=""></a>
              </tbody>
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

<script>
  function ModalLlenarSerialesProductos(idOperacion){
    $("#ModalLlenarSerialesProductos").modal("show");

    $.ajax({
    type: "POST",
    url: "IN_AjaxSeriales.php",
    data: {
        idOperacion: idOperacion,
        Tipo_Consulta: "Consultar Seriales Operaciones"
    },
    success: function(response) {
        var Arreglo = JSON.parse(response);
        console.log(Arreglo);
        /*
        var Caracter = Arreglo[0];

         // Construir las opciones para el select
         var options = ['<option value="">Seleccione</option>']; // Agregar la opción "Seleccione" al principio

         options = options.concat(Arreglo.map(function (item) {
            return '<option value="' + item.id + '">' + item.Serial + '</option>';
          }));


        var Campos = "";
        for (let index = 1; index <= ValorExistencias; index++) {
            
            Campos += `
            <div class="col-md-12">
                <div align="left"> Serial - #`+index+`</div>
                <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">`+Caracter+`</span>
                    </div>
                    <select class="form-control input-lg campo-serial" name="ArregloExistencias[`+index+`]"  onchange="verificarCampo(this)" required >
                        
                    </select>
                    <br>
                </div>
            </div>
            `;

        }
        */

        // Inicializar Campos
        var Campos = "";

        // Recorrer cada clave en el objeto Arreglo
        Object.keys(Arreglo).forEach(function (key) {
            var Datos = Arreglo[key].Datos;

            // Construir las opciones para el select
            var options = ['<option value="">Seleccione</option>']; // Agregar la opción "Seleccione" al principio
            options = options.concat(Datos.map(function (item) {
                return '<option value="' + item.id + '">' + item.Serial + '</option>';
            }));

            // Agregar el bloque de HTML para cada key
            Campos += `
                <div class="col-md-12">
                    <div align="left"> ${Arreglo[key].Descripcion} - Serial - #` + key + `</div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">${Arreglo[key].Caracter}</span>
                        </div>
                        <select class="form-control input-lg" name="ArregloExistencias[${key}]" onchange="verificarCampo(this)" required >
                            ${options.join('')}
                        </select>
                        <br>
                    </div>
                </div>
            `;
        });

        // Agregar los campos al documento
        $("#Div_CamposSeriales").html(Campos); 


    }
    });

  }
</script>

<div class="modal fade" id="ModalLlenarSerialesProductos">
    <div class="modal-dialog modal-lg" style="margin-top: 170px;">
        <div class="modal-content">

        <!-- Encabezado del Modal -->
        <div class="modal-header">
            <h5 class="modal-title">Modulo Seriales</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Contenido del Modal -->
        <form onsubmit="GuardarDatosExistenciasSeriales();" id="FormularioExistenciasSerial" method="POST">
        <div class="modal-body row" id="ModalCamposSerialExistencias">

            <div class="form-group col-md-12">
            
            <div class="form-group col-md-12" id="Div_CamposSeriales">

            </div>

            <input type="hidden" name="DetalleSerialCargar" id="DetalleProducto_Modal" >
            <input type="hidden" name="SinvDep" id="SinvDep_Modal" >
            <input type="hidden" name="caracter_serial" id="caracter_serial_Modal" >
            <input type="hidden" name="usuario_id" id="usuario_id_modal" value="<?php echo $_SESSION['ID'] ?>">
        </div>
        
        <!-- Pie del Modal -->
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow" >Guardar</button>
        </div>
        </form>
        
        </div>
    </div>
</div>
