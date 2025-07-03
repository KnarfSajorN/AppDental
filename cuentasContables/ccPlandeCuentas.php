<?php
include '../header.php';
include '../menu.php';

if ($_GET) {
  $modificar=base64_decode($_GET['m']);
  if ($modificar<>'') {
    $disabled='disabled=""';
    $display="style='display:none;'";
    $queryList0=mysqli_query($conn3,"SELECT * from CCuentas where id='$modificar'");
    $nrowl=mysqli_num_rows($queryList0);
    while($rowMotorizado0=mysqli_fetch_array($queryList0))
    {     
      $descripcion_=$rowMotorizado0['descripcion'];
      $detalle_=$rowMotorizado0['detalle'];
      $fechaReg_=$rowMotorizado0['fechaReg'];
      $horaReg_=$rowMotorizado0['horaReg'];
      $ajuste_fiscal_=$rowMotorizado0['ajuste_fiscal'];
      $saldo_inicial_=$rowMotorizado0['saldo_inicial'];
      $saldo_actual_=$rowMotorizado0['saldo_actual'];
      $ccosto_fijo_=$rowMotorizado0['ccosto_fijo'];
      $ccosto_=$rowMotorizado0['ccosto'];
      $tipo_actividad_=$rowMotorizado0['tipo_actividad'];
      $c1_=$rowMotorizado0['c1'];
      $c2_=$rowMotorizado0['c2'];
      $c3_=$rowMotorizado0['c3'];
      $c4_=$rowMotorizado0['c4'];
      $c5_=$rowMotorizado0['c5'];
      $c6_=$rowMotorizado0['c6'];
      $tap_=$rowMotorizado0['tap'];
      $ppc_=$rowMotorizado0['ppc'];
    }



  }else{$disabled="";
  $display="style='display:block;'";}
}
?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Plan de cuentas</h4>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6 table table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $ID = $_SESSION['ID'];

                                            $queryList = mysqli_query($conn3, "SELECT * from CCuentas  order by id");
                                            $nrowl = mysqli_num_rows($queryList);
                                            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                $Cid = $rowMotorizado['id'];
                                                $Cdescripcion = $rowMotorizado['descripcion'];
                                                $Cdetalle = $rowMotorizado['detalle'];
                                                $CfechaReg = $rowMotorizado['fechaReg'];
                                                $ChoraReg = $rowMotorizado['horaReg'];
                                                $Cajuste_fiscal = $rowMotorizado['ajuste_fiscal'];
                                                $Csaldo_inicial = $rowMotorizado['saldo_inicial'];
                                                $Csaldo_actual = $rowMotorizado['saldo_actual'];
                                                $Cccosto_fijo = $rowMotorizado['ccosto_fijo'];
                                                $Cccosto = $rowMotorizado['ccosto'];
                                                $Ctipo_actividad = $rowMotorizado['tipo_actividad'];
                                                $Cc1 = $rowMotorizado['c1'];
                                                $Cc2 = $rowMotorizado['c2'];
                                                $Cc3 = $rowMotorizado['c3'];
                                                $Cc4 = $rowMotorizado['c4'];
                                                $Cc5 = $rowMotorizado['c5'];
                                                $Cc6 = $rowMotorizado['c6'];
                                                $Ctap = $rowMotorizado['tap'];
                                                $Cppc = $rowMotorizado['ppc'];
                                                $Cactivo = $rowMotorizado['activo'];

                                                if ($Cactivo == 1) {
                                                    echo '
                                    <tr>
                                    <td>' . $Cid . '<br><a href="./cuentasContables/registroCcuentas.php?a=' . base64_encode($Cid) . '&t=0"> <i class="fa fa-close text-danger" title="Inactivar"></i>  </a> - <a href="ccPlandeCuentas?m=' . base64_encode($Cid) . '"> <i class="fa fa-pencil" title="Modificar" name="Modificar"></i>  </a> - ' . $Cdescripcion . '</td>
                                    </tr>
                                    ';
                                                } else {
                                                    echo '
                                    <tr>
                                    <td>' . $Cid . '<br><a href="./cuentasContables/registroCcuentas.php?a=' . base64_encode($Cid) . '&t=1"> <i class="fa fa-check text-success" title="Activar"></i>  </a> - <a href="ccPlandeCuentas?m=' . base64_encode($Cid) . '"> <i class="fa fa-pencil" title="Modificar" name="Modificar"></i>  </a> - ' . $Cdescripcion . '</td>
                                    </tr>
                                    ';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>


                                <div class="col-md-6 card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-success border-success">
                                    <form action="./cuentasContables/registroCcuentas.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-12 center text-center">
                                                <h4>Registro Plan de Cuentas</h4>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Código <strong class="text-danger">*</strong></label><br>
                                                <button class="btn btn-info btn-sm right" <?php echo $display ?> onclick="limpiar()">limpiar</button>
                                                <input autocomplete="off" type="text" maxlength="16" onkeyup="planCuentasInput(this)" required placeholder="Codigo" name="codigo" id="codigo" class="form-control input-lg" list="codigos" oninput="<?php echo $soloNumero ?>" <?php echo $disabled ?> value="<?php echo $modificar ?>">
                                                <datalist id="codigos">
                                                    <?php
                                                    $queryList2 = mysqli_query($conn3, "SELECT * from CCuentas");
                                                    $nrowl = mysqli_num_rows($queryList2);
                                                    while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
                                                        $Cid_ = $rowMotorizado2['id'];
                                                        $Cdescripcion_ = $rowMotorizado2['descripcion'];
                                                        echo '
                                        <option value="' . $Cid_ . '">' . $Cid_ . ' - ' . $Cdescripcion_ . '</option>  
                                        ';
                                                    }
                                                    ?>

                                                </datalist>
                                                <div id="div-cuenta" style="display:none;"></div>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Tipo de Actividad <strong class="text-danger">*</strong></label><br>
                                                <select name="Tipo" class="form-control input-lg select">
                                                    <option value="<?php echo $tipo_actividad_ ?>"><?php echo $tipo_actividad_ ?></option>
                                                    <option value="1">1 Operacional</option>
                                                    <option value="2">2 Inversión</option>
                                                    <option value="3">3 Financiero</option>
                                                    <option value="4">4 Caja</option>
                                                    <option value="0">0 Sin Definir</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Descripción <strong class="text-danger">*</strong></label><br>
                                                <input type="text" required placeholder="Descripcion" name="Descripcion" class="form-control input-lg" value="<?php echo $descripcion_ ?>" oninput='VerificarCaracteres(this)'>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Saldo Inicial <strong class="text-danger">*</strong></label><br>
                                                <input type="number" required placeholder="Saldo" name="SaldoInicial" class="form-control input-lg" value="<?php echo $saldo_inicial_ ?>">
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label>Detalle <strong class="text-danger">*</strong></label><br>
                                                <textarea class="form-control input-lg" name="Detalle" rows="4"><?php echo $detalle_ ?></textarea>
                                            </div>
                                            <div class="col-md-12 mt-3 ">
                                                <label>Características <strong class="text-danger">*</strong></label><br>
                                                <div class="position-relative form-group">
                                                    <div>
                                                        <?php if ($c1_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c1" id="c1" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c1">Cuenta de Movimiento</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c1" id="c1" class="custom-control-input">
                                                                <label class="custom-control-label" for="c1">Cuenta de Movimiento</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($c2_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c2" id="c2" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c2">Activa</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c2" id="c2" class="custom-control-input">
                                                                <label class="custom-control-label" for="c2">Activa</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($c3_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c3" id="c3" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c3">Maneja F. Efectivo</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c3" id="c3" class="custom-control-input">
                                                                <label class="custom-control-label" for="c3">Maneja F. Efectivo</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($c4_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c4" id="c4" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c4">Maneja Terceros</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c4" id="c4" class="custom-control-input">
                                                                <label class="custom-control-label" for="c4">Maneja Terceros</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($c5_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c5" id="c5" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c5">Maneja Centro de Costo</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c5" id="c5" class="custom-control-input">
                                                                <label class="custom-control-label" for="c5">Maneja Centro de Costo</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($c6_ > 0) : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c6" id="c6" class="custom-control-input" checked="">
                                                                <label class="custom-control-label" for="c6">Maneja Bases</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                                <input type="checkbox" value="1" name="c6" id="c6" class="custom-control-input">
                                                                <label class="custom-control-label" for="c6">Maneja Bases</label>
                                                            </div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-3">
                                                <label>Tipo Activo/Pasivo <strong class="text-danger">*</strong></label><br>
                                                <div class="position-relative form-group">
                                                    <div>
                                                        <?php if ($tap_ == 1) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="1" type="radio" class="form-check-input" checked="">Corriente</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="1" type="radio" class="form-check-input">Corriente</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($tap_ == 2) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="2" type="radio" class="form-check-input" checked="">No Corriente</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="2" type="radio" class="form-check-input">No Corriente</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($tap_ == 3) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="3" type="radio" class="form-check-input" checked="">C. / No C.</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="tap" value="3" type="radio" class="form-check-input">C. / No C.</label>
                                                            </div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-3">
                                                <label>Patrimonio de Propietario de la Compañía <strong class="text-danger">*</strong></label><br>
                                                <div class="position-relative form-group">
                                                    <div>
                                                        <?php if ($ppc_ == 1) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="1" type="radio" class="form-check-input" checked="">Atribuible</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="1" type="radio" class="form-check-input">Atribuible</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($ppc_ == 2) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="2" type="radio" class="form-check-input" checked="">No Atribuible</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="2" type="radio" class="form-check-input">No Atribuible</label>
                                                            </div>
                                                        <?php endif ?>

                                                        <?php if ($ppc_ == 3) : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="3" type="radio" class="form-check-input" checked="">A. / No A.</label>
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="position-relative form-check">
                                                                <label class="form-check-label"><input name="ppc" value="3" type="radio" class="form-check-input">A. / No A.</label>
                                                            </div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12 mt-3 ">
                                    <label>Saldos <strong class="text-danger"></strong></label><br>
                                  </div> -->
                                            <!-- <div class="col-md-6 mt-3">
                                    <label>Saldo inicial <strong class="text-danger">*</strong></label><br>
                                    <input type="number" onchange="calculaSaldo()" step="0.1" name="si" id="si" class="form-control input-lg">
                                    <label>Saldo Actual <strong class="text-danger"></strong></label><br>
                                    <input type="number" disabled="" step="0.1" name="sa" id="sa" class="form-control input-lg">
                                  </div>
                                  <div class="col-md-6 mt-3">
                                    <label>Debitos Acumulados <strong class="text-danger"></strong></label><br>
                                    <input type="number" onchange="calculaSaldo()" step="0.1" name="da" id="da" class="form-control input-lg">
                                    <label>Creditos Acumulados <strong class="text-danger"></strong></label><br>
                                    <input type="number" onchange="calculaSaldo()" step="0.1" name="ca" id="ca" class="form-control input-lg">
                                  </div> -->
                                            <input type="hidden" name="cuenta_id" value="<?php echo $modificar ?>">

                                        </div>
                                        <hr><br>
                                        <?php if ($modificar <> '') : ?>

                                            <button type="submit" class="btn btn-info rounded-pill m-2 btn-block">Actualizar</button>
                                        <?php else : ?>
                                            <button type="submit" class="btn btn-primary rounded-pill m-2 btn-block">Guardar!</button>
                                        <?php endif ?>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include '../footer.php';
?>

<script>
    function VerificarCaracteres(input) {
        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");
    }
</script>

<script type="text/javascript">
    function limpiar() {
        document.getElementById('codigo').value = '';
    }

    function calculaSaldo() {
        si = document.getElementById('si').value;
        da = document.getElementById('da').value;
        ca = document.getElementById('ca').value;
        sum = Number(si) + Number(da) - Number(ca);
        document.getElementById('sa').value = sum;

    }
</script>

<script type="text/javascript">
	// ejemplo
	// 1.1.1.02.01.005
	// 1110201005
	// max 10
	function planCuentasInput(input) {
		var value = input.value;
		value = value.split('.').join('');
		// if (value.length > 0) {
		value_n = '';
		console.log(value.length);

		switch (value.length) {

			case 8:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2) + '.' + value.substr(4, 2) + '.' + value.substr(6, 2)
				break;

			case 7:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2) + '.' + value.substr(4, 2) + '.' + value.substr(6, 1)
				break;
			case 6:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2) + '.' + value.substr(4, 2)
				break;
			case 5:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2) + '.' + value.substr(4, 1)
				break;
			case 4:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2)
				break;

			case 3:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 1)
				break;

			case 2:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1)
				break;

			case 1:
				value_n = value.substr(0, 1)
				break;


			default:
				value_n = value.substr(0, 1) + '.' + value.substr(1, 1) + '.' + value.substr(2, 2) + '.' + value.substr(4, 2) + '.' + value.substr(6, 2) + '.' + value.substr(8)
				break;
		}
		input.value = value_n;

		// verificamos si ese valor ya existe, no se puede crear un codigo nuevo si no tiene un padre directo
		var largo_codigo = value_n.length;
		var nuevo_codigo = value_n;
		console.log('largo_codigo ' + largo_codigo);
		result = nuevo_codigo.split('.').join(',');
		// if (result.substr(-1, 1) == ',') {
		// 	result = result.slice(0, -1);
		// }
		console.log('nuevo_codigo ' + nuevo_codigo);
		console.log('result ' + result);
		let arreglo = result.split(',');
		console.log('arreglo ' + arreglo);
		console.log('arreglo largo ' + arreglo.length);
		console.log('asd ' + arreglo[(arreglo.length - 2)]);
		console.log(nuevo_codigo);

		// verificamos si existe el codigo
		var valor = 0;
		var substr = 0;
		valor = arreglo[(arreglo.length - 2)];
		substr = arreglo.length;

		$.ajax({
			type: "POST",
			url: "ajax_Ccuentas.php",
			data: {
				valor: valor,
				substr: substr,
				nuevo_codigo: nuevo_codigo
			},
			success: function(response) {
				$('#div-cuenta').html(response);
				document.getElementById('div-cuenta').style.display = 'Block';
			}
		});
	}
</script>